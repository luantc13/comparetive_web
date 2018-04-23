<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

use \Curl\Curl;

class ProductController extends BaseController
{
    public function indexAction()
    {
        // load model and library
        $this->model->load('product');

        $list = $this->model->product->all();
        
        // load view
        $data = [
            'page' => 'product',
            'chilPage' => 'list'
        ];
        $this->load_header($data);

        $data = [
            'list' => $list
        ];
        $this->view->load('product/list', $data);

        $this->load_footer();
    }
     
    public function changeActiveAction()
    {
        // load model and library
        $this->model->load('product');

        // get value of column active
        $id = $_GET['id'];
        $product = $this->model->product->find($id);
        $active = $product->active == 1 ? 0 : 1;

        // change value of column active
        $change = $this->model->product->changeActive($active, $id);
        if (isset($change)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Thay đổi trạng thái thành công';
            header('location: admin.php?c=product');
        } else {
            $_SESSION['error'] = 'Thay đổi trạng thái thất bại';
            header('location: admin.php?c=product');
        }        
    }

    public function getAddAction()
    {
        // load model and library
        $this->model->load('category');
        $this->model->load('productRange');
        $this->model->load('provider');

        $category = $this->model->category->all();
        $productRange = $this->model->productRange->fetchColumn('id_category', $category[0]->id);
        $provider = $this->model->provider->all();

        // load view
        $data = [
            'page' => 'product',
            'chilPage' => 'add',
        ];
        $this->load_header($data);

        $data = [
            'category' => $category,
            'productRange' => $productRange,
            'provider' => $provider    
        ];
        $this->view->load('product/add', $data);

        $data = [
            'page' => 'product',
            'chilPage' => 'add',
            'provider' => $provider
        ];
        $this->load_footer($data);
    }

    public function postAddAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('imageProduct');
        $this->model->load('comparetiveLink');
        $this->model->load('provider');
        $this->helper->load('string');
       
        $name = $_POST['txtName'];
        $slug = '';
        $idRange = $_POST['cbbProductRange'];
        $active = $_POST['rdoActive'];      

        $error = [];

        // check product range
        if (!required($idRange)) {
            $error[] = 'Dòng sản phẩm phải được chọn';
        }

        // check name
        if (!required($name)) {
            $error[] = 'Tên sản phẩm không được để trống';
        }

        // check and process unique
        $unique = $this->model->product->findColumn('name', $name);

        if ($unique) {
            $error[] = 'Tên sản phẩm đã tồn tại';
        } else {
            $slug = changeTitle($name);

            $provider = $_POST['cbbProvider'];
            $link = $_POST['txtLink'];

            for ($i = 0; $i < count($provider); $i++) {
                // check product range
                if (!required($provider[$i])) {
                    $error[] = 'Nhà cung cấp phải được chọn';
                }
                
                // check product range
                if (!required($link[$i])) {
                    $error[] = 'Đường dẫn không được để trống';
                }

                // check link belongs to provider
                $pv = $this->model->provider->find($provider[$i]);
                if (strlen(strstr($link[$i], $pv->link)) <= 0) {
                    $error[] = 'Đường dẫn '.$link[$i].' không thuộc nhà cung cấp '.$provider[$i];
                }
            }

            if (empty($error)) {
                // check and process image
                if (!empty($_FILES['fleImage'])) {
                    $imageName = $_FILES['fleImage']['name'];
                    $imageTmpName = $_FILES['fleImage']['tmp_name'];
                    $imageType = $_FILES['fleImage']['type'];
                    $imageError = $_FILES['fleImage']['error'];
                    
                    if (!empty($imageError)) {
                        // insert product
                        $insertProduct = $this->model->product->insert($name, $slug, $idRange, $active);
                        if (isset($insertProduct)) {
                            $product = $this->model->product->findColumn('name', $name);
                            
                            require PATH.'/vendor/autoload.php';

                            $curl = new Curl();
                            $curl->setOpt(CURLOPT_ENCODING, '');

                            // insert comparetive link
                            for ($i = 0; $i < count($provider); $i++) {
                                $pv = $this->model->provider->find($provider[$i]);

                                $curl->get($link[$i]);

                                if ($curl->error) {
                                        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
                                } else {
                                    // name
                                    $pattern = $pv->name_pattern;
                                    preg_match_all($pattern, $curl->response, $name);

                                    // price
                                    $pattern = $pv->price_pattern;
                                    preg_match_all($pattern, $curl->response, $price);
                                    $price[1][0] = str_replace('.', '', $price[1][0]);
                                    $price[1][0] = str_replace(',', '', $price[1][0]);
                                }

                                $insertComparetiveLink = $this->model->comparetiveLink->insert($product->id, $provider[$i], $name[1][0], $price[1][0], $link[$i]);                                }
                            
                            // process image
                            $part = PATH."/upload/product/";

                            for ($i = 0; $i < count($imageName); $i++) {
                                $imageName[$i] = random().'_'.$imageName[$i];
                                while (file_exists($part.$imageName[$i])) {
                                    $imageName[$i] = random().'_'.$imageName[$i];
                                }

                                // check extension of file
                                $ext = pathinfo($imageName[$i], PATHINFO_EXTENSION);

                                if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                                    $error[] = 'File được chọn phải là hình ảnh';
                                } else {
                                    // insert image
                                    $insert = $this->model->imageProduct->insert($imageName[$i], $product->id);
                                    if (isset($insert)) {
                                        move_uploaded_file($imageTmpName[$i], $part.$imageName[$i]);
                                    }
                                }
                            }

                            $_SESSION['success'] = [];
                            $_SESSION['success'][] = 'Thêm mới thành công';
                        } else {
                            $error[] = 'Thêm mới thất bại';
                        }
                    }                           
                } else {
                    $error[] = 'Hình ảnh cho sản phẩm là bắt buộc';
                }
            }            
        }         

        $_SESSION['error'] = $error;

        if (isset($_SESSION['success'])) {
            header('location: admin.php?c=product');
        } else {
            header('location: admin.php?c=product&a=getadd');
        }     
    }

    public function getEditImageAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('imageProduct');

        $id = $_GET['id'];
        $product = $this->model->product->find($id);
        $image = $this->model->imageProduct->fetchColumn('id_product', $id);

        // load view
        $data = [
            'page' => 'product',
        ];
        $this->load_header($data);

        $data = [
            'product' => $product,
            'image' => $image  
        ];
        $this->view->load('product/editImage', $data);

        $this->load_footer($data);
    }

    public function postEditImageAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('imageProduct');
        $this->helper->load('string');

        $idProduct = $_GET['idproduct'];

        $error = [];

        if (!empty($_FILES['fleImage'])) {
            $imageName = $_FILES['fleImage']['name'];
            $imageTmpName = $_FILES['fleImage']['tmp_name'];
            $imageType = $_FILES['fleImage']['type'];
            $imageError = $_FILES['fleImage']['error'];
            
            if (!empty($imageError)) {
                $part = PATH."/upload/product/";

                for ($i = 0; $i < count($imageName); $i++) {
                    $imageName[$i] = random().'_'.$imageName[$i];
                    while (file_exists($part.$imageName[$i])) {
                        $imageName[$i] = random().'_'.$imageName[$i];
                    }

                    // check extension of file
                    $ext = pathinfo($imageName[$i], PATHINFO_EXTENSION);

                    if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                        $error[] = 'File được chọn phải là hình ảnh, những file không phải hình ảnh sẽ không được upload.';
                    } else {
                        // insert image
                        $insert = $this->model->imageProduct->insert($imageName[$i], $idProduct);
                        if (isset($insert)) {
                            move_uploaded_file($imageTmpName[$i], $part.$imageName[$i]);
                        }
                    }
                }

                $_SESSION['success'] = [];
                $_SESSION['success'][] = 'Thêm mới ảnh thành công';
            } else {
                $error[] = 'Thêm mới thất bại';
            }                           
        }

        $_SESSION['error'] = $error;

        if (!empty($_SESSION['error'])) {
            header('location: admin.php?c=product&a=geteditimage&id='.$idProduct);
        } else {
            header('location: admin.php?c=product');
        } 
    }

    public function deleteImageAction()
    {
        // load model and library
        $this->model->load('imageProduct');

        $idProduct = $_GET['idproduct'];
        $idImage = $_GET['idimage'];
        $image = $this->model->imageProduct->find($idImage);

        unlink(PATH.'/upload/product/'.$image->name);

        // delete
        $delete = $this->model->imageProduct->delete($idImage);
        if (isset($delete)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Xóa ảnh thành công';
            header('location: admin.php?c=product&a=geteditimage&id='.$idProduct);
        } else {
            $_SESSION['error'] = 'Xóa ảnh thất bại';
            header('location: admin.php?c=product&a=geteditimage&id='.$idProduct);
        }
    }

    public function listComparetiveLinkAction()
    {
        // load model and library
        $this->model->load('comparetiveLink');
        $this->model->load('product');

        $id = $_GET['id'];
        $product = $this->model->product->find($id);
        $listComparetiveLink = $this->model->comparetiveLink->fetchColumn('id_product', $id);

        // load view
        $data = [
            'page' => 'product',
        ];
        $this->load_header($data);

        $data = [
            'product' => $product,
            'listComparetiveLink' => $listComparetiveLink   
        ];
        $this->view->load('product/listComparetiveLink', $data);

        $this->load_footer();
    }

    public function getAddComparetiveLinkAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('provider');
        $this->model->load('comparetiveLink');

        $id = $_GET['id'];
        $product = $this->model->product->find($id);
        $listProvider = $this->model->provider->all();

        // load view
        $data = [
            'page' => 'product',
        ];
        $this->load_header($data);

        $data = [
            'product' => $product,
            'listProvider' => $listProvider   
        ];
        $this->view->load('product/addComparetiveLink', $data);

        $this->load_footer();
    }

    public function postAddComparetiveLinkAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('comparetiveLink');
        $this->model->load('provider');
        $this->helper->load('string');

        $idProduct = $_GET['id'];
        $provider = $_POST['cbbProvider'];
        $link = $_POST['txtLink'];

        $provider = $this->model->provider->find($provider);

        // check product range
        if (!required($provider)) {
            $error[] = 'Nhà cung cấp phải được chọn';
        }
        
        // check product range
        if (!required($link)) {
            $error[] = 'Đường dẫn không được để trống';
        }

        // check link belongs to provider
        if (strlen(strstr($link, $provider->link)) <= 0) {
            $error[] = 'Đường dẫn '.$link.' không thuộc nhà cung cấp '.$provider->name;
        }

        if (empty($error)) {
            require PATH.'/vendor/autoload.php';

            $curl = new Curl();
            $curl->setOpt(CURLOPT_ENCODING, '');

            $curl->get($link);

            if ($curl->error) {
                    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
            } else {
                // name
                $pattern = $provider->name_pattern;
                preg_match_all($pattern, $curl->response, $name);

                // price
                $pattern = $provider->price_pattern;
                preg_match_all($pattern, $curl->response, $price);
                $price[1][0] = str_replace('.', '', $price[1][0]);
                $price[1][0] = str_replace(',', '', $price[1][0]);
            }

            $update = $this->model->comparetiveLink->insert($idProduct, $provider->id, $name[1][0], $price[1][0], $link);
            if (isset($update)) {
                $_SESSION['success'] = [];
                $_SESSION['success'][] = 'Thêm mới thành công';
            } else {
                $error[] = 'Thêm mới thất bại';
            }
        }

        $_SESSION['error'] = $error;

        if (!empty($_SESSION['error'])) {
            header('location: admin.php?c=product&a=getaddcomparetivelink&id='.$idProduct);
        } else {
            header('location: admin.php?c=product&a=listcomparetivelink&id='.$idProduct);
        } 
       
    }

    public function getEditComparetiveLinkAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('provider');
        $this->model->load('comparetiveLink');

        $idProduct = $_GET['idproduct'];
        $idComparetiveLink = $_GET['idcomparetivelink'];
        $product = $this->model->product->find($idProduct);
        $comparetiveLink = $this->model->comparetiveLink->find($idComparetiveLink);
        $listProvider = $this->model->provider->all();

        // load view
        $data = [
            'page' => 'product',
        ];
        $this->load_header($data);

        $data = [
            'product' => $product,
            'comparetiveLink' => $comparetiveLink,
            'listProvider' => $listProvider   
        ];
        $this->view->load('product/editComparetiveLink', $data);

        $this->load_footer();
    }

    public function postEditComparetiveLinkAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('comparetiveLink');
        $this->model->load('provider');
        $this->helper->load('string');

        $idProduct = $_GET['idproduct'];
        $idComparetiveLink = $_GET['idcomparetivelink'];
        $provider = $_POST['cbbProvider'];
        $link = $_POST['txtLink'];

        $comparetiveLink = $this->model->comparetiveLink->find($idComparetiveLink);
        $provider = $this->model->provider->find($provider);

        // check product range
        if (!required($provider)) {
            $error[] = 'Nhà cung cấp phải được chọn';
        }
        
        // check product range
        if (!required($link)) {
            $error[] = 'Đường dẫn không được để trống';
        }

        // check link belongs to provider
        if (strlen(strstr($link, $provider->link)) <= 0) {
            $error[] = 'Đường dẫn '.$link.' không thuộc nhà cung cấp '.$provider->name;
        }

        if (empty($error)) {
            require PATH.'/vendor/autoload.php';

            $curl = new Curl();
            $curl->setOpt(CURLOPT_ENCODING, '');

            $curl->get($link);

            if ($curl->error) {
                    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
            } else {
                // name
                $pattern = $provider->name_pattern;
                preg_match_all($pattern, $curl->response, $name);

                // price
                $pattern = $provider->price_pattern;
                preg_match_all($pattern, $curl->response, $price);
                $price[1][0] = str_replace('.', '', $price[1][0]);
                $price[1][0] = str_replace(',', '', $price[1][0]);
            }

            $update = $this->model->comparetiveLink->update($provider->id, $name[1][0], $price[1][0], $link, $idComparetiveLink);
            if (isset($update)) {
                $_SESSION['success'] = [];
                $_SESSION['success'][] = 'Sửa thành công';
            } else {
                $error[] = 'Sửa thất bại';
            }
        }

        $_SESSION['error'] = $error;

        if (!empty($_SESSION['error'])) {
            header('location: admin.php?c=product&a=geteditcomparetivelink&idcomparetivelink='.$idComparetiveLink.'&idproduct='.$idProduct);
        } else {
            header('location: admin.php?c=product&a=listcomparetivelink&id='.$idProduct);
        } 
       
    }

    public function deleteComparetiveLinkAction()
    {
        // load model and library
        $this->model->load('comparetiveLink');

        $idProduct = $_GET['idproduct'];
        $idComparetiveLink = $_GET['idcomparetivelink'];

        // delete
        $delete = $this->model->comparetiveLink->delete($idComparetiveLink);
        if (isset($delete)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Xóa thành công';
            header('location: admin.php?c=product&a=listcomparetivelink&id='.$idProduct);
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
            header('location: admin.php?c=product&a=listcomparetivelink&id='.$idProduct);
        }
    }

    public function getEditAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('productRange');
        $this->model->load('category');

        $id = $_GET['id'];
        $product = $this->model->product->find($id);
        $currentProductRange = $this->model->productRange->find($product->id_range);
        $currentCategory = $this->model->category->find($currentProductRange->id_category);
        $category = $this->model->category->all();
        $productRange = $this->model->productRange->fetchColumn('id_category', $currentCategory->id);

        // load view
        $data = [
            'page' => 'product',
            'chilPage' => 'edit',
        ];
        $this->load_header($data);

        $data = [
            'product' => $product,
            'productRange' => $productRange,
            'category' => $category,
            'currentProductRange' => $currentProductRange,
            'currentCategory' => $currentCategory,
        ];
        $this->view->load('product/edit', $data);

        $data = [
            'page' => 'product',
            'chilPage' => 'edit',
        ];
        $this->load_footer($data);
    }

    public function postEditAction()
    {
        // load model and library
        $this->model->load('product');
        $this->helper->load('string');

        $id = $_GET['id'];
        $product = $this->model->product->find($id);
       
        $name = $_POST['txtName'];
        $slug = '';
        $idRange = $_POST['cbbProductRange'];
        $active = $_POST['rdoActive'];      

        $error = [];

        // check product range
        if (!required($idRange)) {
            $error[] = 'Dòng sản phẩm phải được chọn';
        }

        // check name
        if (!required($name)) {
            $error[] = 'Tên sản phẩm không được để trống';
        }

        // check and process unique
        $unique = $this->model->product->findColumn('name', $name);

        if ($unique && $product->name != $name) {
            $error[] = 'Tên sản phẩm đã tồn tại';
        } else {
            $slug = changeTitle($name);

            // update product
            $updateProduct = $this->model->product->update($name, $slug, $idRange, $active, $id);
            if (isset($updateProduct)) {
                $_SESSION['success'] = [];
                $_SESSION['success'][] = 'Sửa thành công';
            } else {
                $error[] = 'Sửa thất bại';
            }            
        }         

        $_SESSION['error'] = $error;

        if (isset($_SESSION['success'])) {
            header('location: admin.php?c=product');
        } else {
            header('location: admin.php?c=product&a=getadd');
        }
    }

    public function deleteAction()
    {
        // load model and library
        $this->model->load('product');
        $this->model->load('imageProduct');
        $this->model->load('comparetiveLink');

        $id = $_GET['id'];
        $product = $this->model->product->find($id);
        $imageProduct = $this->model->imageProduct->fetchColumn('id_product', $id);
        $comparetiveLink = $this->model->comparetiveLink->fetchColumn('id_product', $id);

        foreach ($imageProduct as $item) {
            unlink(PATH.'/upload/product/'.$item->name);
            $delete = $this->model->imageProduct->delete($item->id);
        }

        foreach ($comparetiveLink as $item) {
            $delete = $this->model->comparetiveLink->delete($item->id);
        }

        // delete
        $delete = $this->model->product->delete($id);
        if (isset($delete)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Xóa thành công';
            header('location: admin.php?c=product');
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
            header('location: admin.php?c=product');
        }
    }
}