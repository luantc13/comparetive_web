<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class ProductRangeController extends BaseController
{
    public function indexAction()
    {
        // load model, library and helper
        $this->model->load('productRange');

        $list = $this->model->productRange->all();
        
        // load view
        $data = [
            'page' => 'productRange',
            'chilPage' => 'list'
        ];
        $this->load_header($data);

        $data = [
            'list' => $list
        ];
        $this->view->load('product_range/list', $data);

        $this->load_footer();
    }
    
    public function changeActiveAction()
    {
        // load model, library and helper
        $this->model->load('productRange');

        // get value of column active
        $id = $_GET['id'];
        $productRange = $this->model->productRange->find($id);
        $active = $productRange->active == 1 ? 0 : 1;

        // change value of column active
        $change = $this->model->productRange->changeActive($active, $id);
        if (isset($change)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Thay đổi trạng thái thành công';
            header('location: admin.php?c=productRange');
        } else {
            $_SESSION['error'] = 'Thay đổi trạng thái thất bại';
            header('location: admin.php?c=productRange');
        }        
    }

    public function getAddAction()
    {
        // load model, library and helper
        $this->model->load('category');
        $category = $this->model->category->all();

        // load view
        $data = [
            'page' => 'productRange',
            'chilPage' => 'add',
        ];
        $this->load_header($data);

        $data = [
            'category' => $category
        ];
        $this->view->load('product_range/add', $data);

        $this->load_footer();
    }

    public function postAddAction()
    {
        // load model, library and helper
        $this->model->load('productRange');
        $this->helper->load('string');

        $name = $_POST['txtName'];
        $slug = '';
        $category = $_POST['cbbCategory'];      

        $error = [];

        // process name
        if (!required($name)) {
            $error[] = 'Tên dòng sản phẩm không được để trống';
        }

        if (!required($category)) {
            $error[] = 'Hãng sản xuất phải được chọn';
        }

        $unique = $this->model->productRange->findColumn('name', $name);

        if ($unique) {
            $error[] = 'Tên dòng sản phẩm đã tồn tại';
        } else {
            $slug = changeTitle($name);

            $insert = $this->model->productRange->insert($name, $slug, $category);
            if (isset($insert)) {
                $_SESSION['success'] = [];
                $_SESSION['success'][] = 'Thêm mới thành công';
            } else {
                $error[] = 'Thêm mới thất bại';
            }
        }         

        $_SESSION['error'] = $error;

        if (isset($_SESSION['success'])) {
            header('location: admin.php?c=productrange');
        } else {
            header('location: admin.php?c=productrange&a=getadd');
        }     
    }

    public function getEditAction()
    {
        // load model, library and helper
        $this->model->load('productRange');
        $this->model->load('category');

        $id = $_GET['id'];
        $productRange = $this->model->productRange->find($id);
        $category = $this->model->category->all();

        // load view
        $data = [
            'page' => 'productRange',
        ];
        $this->load_header($data);

        $data = [
            'productRange' => $productRange,
            'category' => $category
        ];
        $this->view->load('product_range/edit', $data);

        $this->load_footer();
    }

    public function postEditAction()
    {
        // load model, library and helper
        $this->model->load('productRange');
        $this->helper->load('string');

        $id = $_GET['id'];
        $productRange = $this->model->productRange->find($id);

        $name = $_POST['txtName']; 
        $slug = '';
        $category = $_POST['cbbCategory'];     

        $error = [];

        // check name
        if (!required($name)) {
            $error[] = 'Tên dòng sản phẩm không được để trống';
        }

        // check category
        if (!required($category)) {
            $error[] = 'Hãng sản xuất phải được chọn';
        }

        // check and process unique
        $unique = $this->model->productRange->findColumn('name', $name);

        if ($unique && $name != $productRange->name) {
            $error[] = 'Tên dòng sản phẩm đã tồn tại';
        } else {
            $slug = changeTitle($name);

            // update
            $update = $this->model->productRange->update($name, $slug, $category, $id);
            if (isset($update)) {
                $_SESSION['success'] = [];
                $_SESSION['success'][] = 'Sửa thành công';
            } else {
                $error[] = 'Sửa thất bại';
            }
        }         

        $_SESSION['error'] = $error;
        
        if (isset($_SESSION['success'])) {
            header('location: admin.php?c=productrange');
        } else {
            header('location: admin.php?c=productrange&a=getedit&id='.$id);
        }
    }

    public function deleteAction()
    {
        // load model, library and helper
        $this->model->load('productRange');
        $this->model->load('product');
        $this->model->load('imageProduct');
        $this->model->load('comparetiveLink');

        $id = $_GET['id'];       
        $product = $this->model->product->fetchColumn('id_range', $id);

        foreach ($product as $item) {
            $imageProduct = $this->model->imageProduct->fetchColumn('id_product', $item->id);
            $comparetiveLink = $this->model->comparetiveLink->fetchColumn('id_product', $item->id);

            foreach ($imageProduct as $item2) {
                unlink(PATH.'/upload/product/'.$item2->name);
                $delete = $this->model->imageProduct->delete($item2->id);
            }

            foreach ($comparetiveLink as $item2) {
                $delete = $this->model->comparetiveLink->delete($item2->id);
            }

            $delete = $this->model->product->delete($item->id);
        }

        // delete
        $delete = $this->model->productRange->delete($id);
        if (isset($delete)) {
            $_SESSION['success'] = [];
            $_SESSION['success'][] = 'Xóa thành công';
            header('location: admin.php?c=productrange');
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
            header('location: admin.php?c=productrange');
        }
    }
}