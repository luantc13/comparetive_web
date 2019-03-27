<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

use \Curl\Curl;

class ProductController extends BaseController
{
    public function indexAction()
    {
        // load model, library and helper
        $this->model->load('product');

        $list = $this->model->product->all();
        // var_dump($list); die();
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
        $this->model->load('product');
        $this->model->load('imageProduct');
        $this->model->load('comparetiveLink');
        $this->model->load('provider');
        $this->helper->load('string');

        $idRange = $_POST['cbbProductRange'];
        $name = $_POST['txtName'];
        $providers = $_POST['cbbProvider'];
        $links = $_POST['txtLink'];
        $fileUpload = $_FILES['fleImage'];

        $imageName = $_FILES['fleImage']['name'];
        $imageTmpName = $_FILES['fleImage']['tmp_name'];
        $imageType = $_FILES['fleImage']['type'];
        $imageError = $_FILES['fleImage']['error'];

        if (!$this->isValidAddData($idRange, $name, $providers, $links, $fileUpload, $imageError)) {
            header('location: admin.php?c=product&a=getadd');

            return;
        }

        $slug = changeTitle($name);
        $isActive = $_POST['rdoActive'];   

        $isInsertProductSuccess = $this->insertProduct($name, $slug, $idRange, $isActive);

        if (!isset($isInsertProductSuccess)) {
            header('location: admin.php?c=product&a=getadd');

            return;
        }

        $product = $this->model->product->findColumn('name', $name);

        $this->insertComparetiveLinks($providers, $links, $product);
        

        $this->insertImages($imageName, $imageTmpName, $product);


        $_SESSION['success'] = [];
        $_SESSION['success'][] = 'Thêm mới thành công';  

        header('location: admin.php?c=product');   
    }

    public function isValidAddData($idRange, $name, $providers, $links, $fileUpload, $imageError) {
        if (!required($idRange)) {
            $_SESSION['error'] = [];
            $_SESSION['error'][] = 'Dòng sản phẩm phải được chọn';

            return false;
        }

        if (!required($name)) {
            $_SESSION['error'] = [];
            $_SESSION['error'][] = 'Tên sản phẩm không được để trống';

            return false;
        }

        if ($this->isExistedProduct($name)) {
            $_SESSION['error'] = [];
            $_SESSION['error'][] = 'Tên sản phẩm đã tồn tại';

            return false;
        }

        if (!$this->isValidComparetiveLinks($providers, $links)) {
            $_SESSION['error'] = [];
            $_SESSION['error'][] = 'Nhà cung cấp và đường dẫn không hợp lệ';

            return false;
        }

        foreach ($providers as $key => $value) {
            $provider = $this->model->provider->find($value);

            if (strlen(strstr($links[$key], $provider->link)) <= 0) {
                $_SESSION['error'] = [];
                $_SESSION['error'][] = 'Đường dẫn '.$links[$key].' không thuộc nhà cung cấp '.$provider->name;

                return false;
            }
        }

        if (empty($fileUpload)) {
            $_SESSION['error'] = [];
            $_SESSION['error'][] = 'Hình ảnh cho sản phẩm là bắt buộc';

            return false;
        }

        if (empty($imageError)) {
            $_SESSION['error'] = [];
            $_SESSION['error'][] = 'Gặp lỗi khi upload ảnh';

            return false;
        }

        return true;
    }

    public function isExistedProduct($name) {
        return $this->model->product->findColumn('name', $name);
    }

    public function isValidComparetiveLinks($providers, $links) {
        return required($providers) && required($links) && count($providers) == count($links);
    }

    public function insertProduct($name, $slug, $idRange, $isActive) {
        $isInsertProductSuccess = $this->model->product->insert($name, $slug, $idRange, $isActive);

        if (!isset($isInsertProductSuccess)) {
            $_SESSION['error'] = [];
            $_SESSION['error'][] = 'Thêm mới thật bại';

            return false;
        }

        return true;
    }

    public function insertComparetiveLinks($providers, $links, $product) {
        require PATH.'/vendor/autoload.php';

        $curl = new Curl();
        $curl->setOpt(CURLOPT_ENCODING, '');

        foreach ($providers as $key => $value) {
            $provider = $this->model->provider->find($value);

            $curl->get($links[$key]);

            if (!$curl->error) {
                $name = $this->getComparetiveName($provider->name_pattern, $curl->response);
                $price = $this->getComparetivePrice($provider->price_pattern, $curl->response);

                $insertComparetiveLink = $this->model->comparetiveLink->insert($product->id, $value, $name, $price, $links[$key]);
            }

        }
    }

    public function getComparetiveName($pattern, $response) {
        $name = '';
        preg_match_all($pattern, $response, $name);

        return $name[1][0];
    }

    public function getComparetivePrice($pattern, $response) {
        $price = null;
        preg_match_all($pattern, $response, $price);
        $price[1][0] = str_replace('.', '', $price[1][0]);
        $price[1][0] = str_replace(',', '', $price[1][0]);

        return $price[1][0];
    }

    public function insertImages($imageName, $imageTmpName, $product) {
        $path = PATH."/upload/product/";

        foreach ($imageName as $key => $value) {
            $name = $this->getImageName($value, $path);

            $extension = pathinfo($name, PATHINFO_EXTENSION);

            if ($this->isValidFile($extension)) {
                $insert = $this->model->imageProduct->insert($name, $product->id);

                if (isset($insert)) {
                    move_uploaded_file($imageTmpName[$key], $path.$name);
                }
            }
        }
    }

    public function getImageName($name, $path) {
        $name = random().'_'.$name;
        while (file_exists($path.$name)) {
            $name = random().'_'.$name;
        }

        return $name;
    }

    public function isValidFile($extension) {
        $allowExtension = ['jpg', 'jpeg', 'png'];

        return in_array($extension, $allowExtension);
    }

    public function getEditImageAction()
    {
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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
        // load model, library and helper
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