<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class CategoryController extends BaseController
{
    public function indexAction()
    {
        // load model, library and helper
        $this->model->load('category');

        $list = $this->model->category->all();
        
        // load view
        $data = [
            'page' => 'category',
            'chilPage' => 'list'
        ];
        $this->load_header($data);

        $data = [
            'list' => $list
        ];
        $this->view->load('category/list', $data);

        $this->load_footer();
    }
     
    public function changeActiveAction()
    {
        // load model, library and helper
        $this->model->load('category');

        // get value of column active
        $id = $_GET['id'];
        $category = $this->model->category->find($id);
        $active = $category->active == 1 ? 0 : 1;

        // change value of column active
        $change = $this->model->category->changeActive($active, $id);
        if (isset($change)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Thay đổi trạng thái thành công';
            header('location: admin.php?c=category');
        } else {
            $_SESSION['error'] = 'Thay đổi trạng thái thất bại';
            header('location: admin.php?c=category');
        }        
    }

    public function getAddAction()
    {
        // load view
        $data = [
            'page' => 'category',
            'chilPage' => 'add'
        ];
        $this->load_header($data);

        $this->view->load('category/add');

        $this->load_footer();
    }

    public function postAddAction()
    {
        // load model, library and helper
        $this->model->load('category');
        $this->helper->load('string');

        $name = $_POST['txtName'];
        $slug = '';
        $image = ''; 
        $active = $_POST['rdoActive'];      

        $error = [];

        // check name
        if (!required($name)) {
            $error[] = 'Tên hãng sản xuất không được để trống';
        }

        // check and process unique
        $unique = $this->model->category->findColumn('name', $name);

        if ($unique) {
            $error[] = 'Tên hãng sản xuất đã tồn tại';
        } else {
            $slug = changeTitle($name);

            // check and process image
            if (!empty($_FILES['fleImage'])) {
                $imageName = $_FILES['fleImage']['name'];
                $imageTmpName = $_FILES['fleImage']['tmp_name'];
                $imageType = $_FILES['fleImage']['type'];
                $imageError = $_FILES['fleImage']['error'];

                if ($imageError == 0) {
                    $part = PATH."/upload/category/";

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
                    $insert = $this->model->category->insert($name, $slug, $image, $active);
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
            header('location: admin.php?c=category');
        } else {
            header('location: admin.php?c=category&a=getadd');
        }     
    }

    public function getEditAction()
    {
        // load model, library and helper
        $this->model->load('category');

        $id = $_GET['id'];
        $category = $this->model->category->find($id);

        // load view
        $data = [
            'page' => 'category',
        ];
        $this->load_header($data);

        $data = [
            'category' => $category
        ];
        $this->view->load('category/edit', $data);

        $this->load_footer();
    }

    public function postEditAction()
    {
        // load model, library and helper
        $this->model->load('category');
        $this->helper->load('string');

        $id = $_GET['id'];
        $category = $this->model->category->find($id);

        $name = $_POST['txtName']; 
        $slug = '';
        $image = ''; 
        $active = $_POST['rdoActive'];      

        $error = [];

        // process name
        if (!required($name)) {
            $error[] = 'Tên hãng sản xuất không được để trống';
        }

        $unique = $this->model->category->findColumn('name', $name);

        if ($unique && $name != $category->name) {
            $error[] = 'Tên hãng sản xuất đã tồn tại';
        } else {
            $slug = changeTitle($name);

            // process image
            if (!empty($_FILES['fleImage']['name'])) {
                $imageName = $_FILES['fleImage']['name'];
                $imageTmpName = $_FILES['fleImage']['tmp_name'];
                $imageType = $_FILES['fleImage']['type'];
                $imageError = $_FILES['fleImage']['error'];

                if ($imageError == 0) {
                    $part = PATH."/upload/category/";

                    $imageName = random().'_'.$imageName;
                    while (file_exists(PATH.'/upload/category/'.$imageName)) {
                        $imageName = random().'_'.$imageName;
                    }

                    $image = $imageName;
                }

                // check extension of file
                $ext = pathinfo($imageName, PATHINFO_EXTENSION);

                if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                    $error[] = 'File được chọn phải là hình ảnh';
                } else {
                    unlink(PATH.'/upload/category/'.$category->image);

                    $update = $this->model->category->update($name, $slug, $image, $active, $id);

                    if (isset($update)) {
                        move_uploaded_file($imageTmpName, $part.$imageName);

                        $_SESSION['success'] = [];
                        $_SESSION['success'][] = 'Sửa thành công';
                    } else {
                        $error[] = 'Sửa thất bại';
                    }
                } 
            } else {
                $image = $category->image;

                $update = $this->model->category->update($name, $slug, $image, $active, $id);
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
            header('location: admin.php?c=category');
        } else {
            header('location: admin.php?c=category&a=getedit&id='.$id);
        }
    }

    public function deleteAction()
    {
        // load model, library and helper
        $this->model->load('category');
        $this->model->load('productRange');
        $this->model->load('product');
        $this->model->load('imageProduct');
        $this->model->load('comparetiveLink');

        $id = $_GET['id'];
        $category = $this->model->category->find($id);
        $productRange = $this->model->productRange->fetchColumn('id_category', $id);

        foreach ($productRange as $item) {
            $product = $this->model->product->fetchColumn('id_range', $item->id);

            foreach ($product as $item2) {
                $imageProduct = $this->model->imageProduct->fetchColumn('id_product', $item2->id);
                $comparetiveLink = $this->model->comparetiveLink->fetchColumn('id_product', $item2->id);

                foreach ($imageProduct as $item3) {
                    unlink(PATH.'/upload/product/'.$item3->name);
                    $delete = $this->model->imageProduct->delete($item3->id);
                }

                foreach ($comparetiveLink as $item3) {
                    $delete = $this->model->comparetiveLink->delete($item3->id);
                }

                $delete = $this->model->product->delete($item2->id);
            }

            $delete = $this->model->productRange->delete($item->id);
        }

        // delete
        unlink(PATH.'/upload/category/'.$category->image);
        $delete = $this->model->category->delete($id);
        if (isset($delete)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Xóa thành công';
            header('location: admin.php?c=category');
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
            header('location: admin.php?c=category');
        }
    }
}