<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class ProviderController extends BaseController
{
    public function indexAction()
    {
        // load model and library
        $this->model->load('provider');

        $list = $this->model->provider->all();
        
        // load view
        $data = [
            'page' => 'provider',
            'chilPage' => 'list'
        ];
        $this->load_header($data);

        $data = [
            'list' => $list
        ];
        $this->view->load('provider/list', $data);

        $this->load_footer();
    }
     
    public function changeActiveAction()
    {
        // load model and library
        $this->model->load('provider');

        // get value of column active
        $id = $_GET['id'];
        $provider = $this->model->provider->find($id);
        $active = $provider->active == 1 ? 0 : 1;

        // change value of column active
        $change = $this->model->provider->changeActive($active, $id);
        if (isset($change)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Thay đổi trạng thái thành công';
            header('location: admin.php?c=provider');
        } else {
            $_SESSION['error'] = 'Thay đổi trạng thái thất bại';
            header('location: admin.php?c=provider');
        }        
    }

    public function getAddAction()
    {
        // load view
        $data = [
            'page' => 'provider',
            'chilPage' => 'add'
        ];
        $this->load_header($data);

        $this->view->load('provider/add');

        $this->load_footer();
    }

    public function postAddAction()
    {
        // load model and library
        $this->model->load('provider');
        $this->helper->load('string');

        $name = $_POST['txtName'];
        $slug = '';
        $link = $_POST['txtLink'];
        $image = '';
        $namePattern = $_POST['txtNamePattern']; 
        $pricePattern = $_POST['txtPricePattern']; 
        $active = $_POST['rdoActive'];     

        $error = [];

        // check name
        if (!required($name)) {
            $error[] = 'Tên nhà cung cấp không được để trống';
        }

        // check link
        if (!required($link)) {
            $error[] = 'Đường dẫn không được để trống';
        }

        // check name pattern
        if (!required($link)) {
            $error[] = 'Mẫu lấy tên không được để trống';
        }

        // check price pattern
        if (!required($link)) {
            $error[] = 'Mẫu lấy giá không được để trống';
        }

        // check and process unique
        $unique = $this->model->provider->findColumn('name', $name);

        if ($unique) {
            $error[] = 'Tên nhà cung cấp đã tồn tại';
        } else {
            $slug = changeTitle($name);

            // check and process image
            if (!empty($_FILES['fleImage'])) {
                $imageName = $_FILES['fleImage']['name'];
                $imageTmpName = $_FILES['fleImage']['tmp_name'];
                $imageType = $_FILES['fleImage']['type'];
                $imageError = $_FILES['fleImage']['error'];

                if ($imageError == 0) {
                    $part = PATH."/upload/provider/";

                    $imageName = random().'_'.$imageName;
                    while (file_exists($part.$imageName)) {
                        $imageName = random().'_'.$imageName;
                    }

                    $image = $imageName;
                }

                // check extension of file
                $ext = pathinfo($imageName, PATHINFO_EXTENSION);

                if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                    $error[] = 'File được chọn phải là hình ảnh';
                } else {
                    // insert
                    $insert = $this->model->provider->insert($name, $slug, $link, $image, $namePattern, $pricePattern, $active);
                    if (isset($insert)) {
                        move_uploaded_file($imageTmpName, $part.$imageName);

                        $_SESSION['success'] = [];
                        $_SESSION['success'][] = 'Thêm mới thành công';
                    } else {
                        $error[] = 'Thêm mới thất bại';
                    }
                } 
            } else {
                $error[] = 'Hình ảnh cho hãng sản xuất là bắt buộc';
            }
        }         

        $_SESSION['error'] = $error;

        if (isset($_SESSION['success'])) {
            header('location: admin.php?c=provider');
        } else {
            header('location: admin.php?c=provider&a=getadd');
        }     
    }

    public function getEditAction()
    {
        // load model and library
        $this->model->load('provider');

        $id = $_GET['id'];
        $provider = $this->model->provider->find($id);

        // load view
        $data = [
            'page' => 'provider',
        ];
        $this->load_header($data);

        $data = [
            'provider' => $provider
        ];
        $this->view->load('provider/edit', $data);

        $this->load_footer();
    }

    public function postEditAction()
    {
        // load model and library
        $this->model->load('provider');
        $this->helper->load('string');

        $id = $_GET['id'];
        $provider = $this->model->provider->find($id);

        $name = $_POST['txtName']; 
        $slug = '';
        $link = $_POST['txtLink'];
        $image = ''; 
        $namePattern = $_POST['txtNamePattern']; 
        $pricePattern = $_POST['txtPricePattern'];
        $active = $_POST['rdoActive'];      

        $error = [];

        // process name
        if (!required($name)) {
            $error[] = 'Tên nhà cung cấp không được để trống';
        }

        // process name
        if (!required($link)) {
            $error[] = 'Đường dẫn không được để trống';
        }

        $unique = $this->model->provider->findColumn('name', $name);

        if ($unique && $name != $provider->name) {
            $error[] = 'Tên nhà cung cấp đã tồn tại';
        } else {
            $slug = changeTitle($name);

            // process image
            if (!empty($_FILES['fleImage']['name'])) {
                $imageName = $_FILES['fleImage']['name'];
                $imageTmpName = $_FILES['fleImage']['tmp_name'];
                $imageType = $_FILES['fleImage']['type'];
                $imageError = $_FILES['fleImage']['error'];

                if ($imageError == 0) {
                    $part = PATH."/upload/provider/";

                    $imageName = random().'_'.$imageName;
                    while (file_exists(PATH.'/upload/provider/'.$imageName)) {
                        $imageName = random().'_'.$imageName;
                    }

                    $image = $imageName;
                }

                // check extension of file
                $ext = pathinfo($imageName, PATHINFO_EXTENSION);

                if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                    $error[] = 'File được chọn phải là hình ảnh';
                } else {
                    unlink(PATH.'/upload/provider/'.$provider->image);

                    $update = $this->model->provider->update($name, $slug, $link, $image, $namePattern, $pricePattern, $active, $id);

                    if (isset($update)) {
                        move_uploaded_file($imageTmpName, $part.$imageName);

                        $_SESSION['success'] = [];
                        $_SESSION['success'][] = 'Sửa thành công';
                    } else {
                        $error[] = 'Sửa thất bại';
                    }
                } 
            } else {
                $image = $provider->image;

                $update = $this->model->provider->update($name, $slug, $link, $image, $namePattern, $pricePattern, $active, $id);
                if (isset($update)) {
                    $_SESSION['success'] = [];
                    $_SESSION['success'][] = 'Sửa thành công';
                } else {
                    $error[] = 'Sửa thất bại';
                }
            }
        }         

        $_SESSION['error'] = $error;
        
        if (isset($_SESSION['success'])) {
            header('location: admin.php?c=provider');
        } else {
            header('location: admin.php?c=provider&a=getedit&id='.$id);
        }
    }

    public function deleteAction()
    {
        // load model and library
        $this->model->load('provider');
        $this->model->load('comparetiveLink');

        $id = $_GET['id'];
        $provider = $this->model->provider->find($id);
        $comparetiveLink = $this->model->comparetiveLink->fetchColumn('id_provider', $id);

        foreach ($comparetiveLink as $item) {
            $delete = $this->model->comparetiveLink->delete($item->id);
        }

        // delete
        unlink(PATH.'/upload/provider/'.$provider->image);
        $delete = $this->model->provider->delete($id);
        if (isset($delete)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Xóa thành công';
            header('location: admin.php?c=provider');
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
            header('location: admin.php?c=provider');
        }
    }
}