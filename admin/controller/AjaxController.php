<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class AjaxController extends BaseController
{
    public function changeCategoryAction()
    {
        // load model, library and helper
        $this->model->load('category');
        $this->model->load('productRange');

        $id = $_GET['id'];
        $category = $this->model->category->find($id);
        $productRange = $this->model->productRange->fetchColumn('id_category', $category->id);

        foreach($productRange as $item) {
            echo '<option value="'.$item->id.'">'.$item->name.'</option>';
        }
    }
}