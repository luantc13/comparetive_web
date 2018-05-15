<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class BaseController extends Controller
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function load_header($data = [])
    {
        // Load nội dung header
        $this->view->load('layout/header', $data);
    }
     
    public function load_footer($data = [])
    {
        // Load nội dung header
        $this->view->load('layout/footer', $data);
    }
     
    // Hàm hủy này có nhiệm vụ show nội dung của view, lúc này các controller
    // không cần gọi đến $this->view->show nữa
    public function __destruct() 
    {
        $this->view->show();
    }
}