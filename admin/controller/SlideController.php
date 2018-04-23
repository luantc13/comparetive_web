<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class SlideController extends BaseController
{
    public function indexAction()
    {
        // load model and library
        $this->model->load('slide');

        $list = $this->model->slide->all();
        
        // load view
        $data = [
            'page' => 'slide',
            'chilPage' => 'list'
        ];
        $this->load_header($data);

        $data = [
            'list' => $list
        ];
        $this->view->load('slide/list', $data);

        $this->load_footer();
    }
     
    public function changeActiveAction()
    {
        // load model and library
        $this->model->load('slide');

        // get value of column active
        $id = $_GET['id'];
        $slide = $this->model->slide->find($id);
        $active = $slide->active == 1 ? 0 : 1;

        // change value of column active
        $change = $this->model->slide->changeActive($active, $id);
        if (isset($change)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Thay đổi trạng thái thành công';
            header('location: admin.php?c=slide');
        } else {
            $_SESSION['error'] = 'Thay đổi trạng thái thất bại';
            header('location: admin.php?c=slide');
        }        
    }

    public function getAddAction()
    {
        // load view
        $data = [
            'page' => 'slide',
            'chilPage' => 'add'
        ];
        $this->load_header($data);

        $this->view->load('slide/add', $data);

        $this->load_footer();
    }

    public function postAddAction()
    {
        // load model and library
        $this->model->load('slide');
        $this->helper->load('string');

        $link = $_POST['txtLink'];
        $image = ''; 
        $active = $_POST['rdoActive'];      

        $error = [];

        // check name
        if (!required($link)) {
            $error[] = 'Liên kết không được để trống';
        }

        // check and process image
        if (!empty($_FILES['fleImage'])) {
            $imageName = $_FILES['fleImage']['name'];
            $imageTmpName = $_FILES['fleImage']['tmp_name'];
            $imageType = $_FILES['fleImage']['type'];
            $imageError = $_FILES['fleImage']['error'];

            if ($imageError == 0) {
                $part = PATH."/upload/slide/";

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
                $insert = $this->model->slide->insert($link, $image, $active);
                if (isset($insert)) {
                    move_uploaded_file($imageTmpName, $part.$imageName);

                    $_SESSION['success'] = [];
                    $_SESSION['success'][] = 'Thêm mới thành công';
                } else {
                    $error[] = 'Thêm mới thất bại';
                }
            } 
        } else {
            $error[] = 'Hình ảnh cho Slide là bắt buộc';
        }  

        $_SESSION['error'] = $error;

        if (isset($_SESSION['success'])) {
            header('location: admin.php?c=slide');
        } else {
            header('location: admin.php?c=slide&a=getadd');
        }     
    }

    public function getEditAction()
    {
        // load model and library
        $this->model->load('slide');

        $id = $_GET['id'];
        $slide = $this->model->slide->find($id);

        // load view
        $data = [
            'page' => 'slide',
        ];
        $this->load_header($data);

        $data = [
            'slide' => $slide
        ];
        $this->view->load('slide/edit', $data);

        $this->load_footer();
    }

    public function postEditAction()
    {
        // load model and library
        $this->model->load('slide');
        $this->helper->load('string');

        $id = $_GET['id'];
        $slide = $this->model->slide->find($id);

        $link = $_POST['txtLink']; 
        $image = ''; 
        $active = $_POST['rdoActive'];      

        $error = [];

        // process name
        if (!required($link)) {
            $error[] = 'Liên kết không được để trống';
        }

        // process image
        if (!empty($_FILES['fleImage']['name'])) {
            $imageName = $_FILES['fleImage']['name'];
            $imageTmpName = $_FILES['fleImage']['tmp_name'];
            $imageType = $_FILES['fleImage']['type'];
            $imageError = $_FILES['fleImage']['error'];

            if ($imageError == 0) {
                $part = PATH."/upload/slide/";

                $imageName = random().'_'.$imageName;
                while (file_exists(PATH.'/upload/slide/'.$imageName)) {
                    $imageName = random().'_'.$imageName;
                }

                $image = $imageName;
            }

            // check extension of file
            $ext = pathinfo($imageName, PATHINFO_EXTENSION);

            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                $error[] = 'File được chọn phải là hình ảnh';
            } else {
                unlink(PATH.'/upload/slide/'.$slide->image);

                $update = $this->model->slide->update($link, $image, $active, $id);

                if (isset($update)) {
                    move_uploaded_file($imageTmpName, $part.$imageName);

                    $_SESSION['success'] = [];
                    $_SESSION['success'][] = 'Sửa thành công';
                } else {
                    $error[] = 'Sửa thất bại';
                }
            } 
        } else {
            $image = $slide->image;

            $update = $this->model->slide->update($link, $image, $active, $id);
            if (isset($update)) {
                $_SESSION['success'] = [];
                $_SESSION['success'][] = 'Sửa thành công';
            } else {
                $error[] = 'Sửa thất bại';
            }
        }       

        $_SESSION['error'] = $error;
        
        if (isset($_SESSION['success'])) {
            header('location: admin.php?c=slide');
        } else {
            header('location: admin.php?c=slide&a=getedit&id='.$id);
        }
    }

    public function deleteAction()
    {
        // load model and library
        $this->model->load('slide');

        $id = $_GET['id'];
        $slide = $this->model->slide->find($id);

        unlink(PATH.'/upload/slide/'.$slide->image);

        // delete
        $delete = $this->model->slide->delete($id);
        if (isset($delete)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Xóa thành công';
            header('location: admin.php?c=slide');
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
            header('location: admin.php?c=slide');
        }
    }
}