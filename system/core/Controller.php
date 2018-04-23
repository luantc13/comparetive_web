<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Controller
{
    // Đối tượng view
    protected $view     = NULL;
     
    // Đối tượng model
    protected $model    = NULL;
     
    // Đối tượng library
    protected $library  = NULL;
     
    // Đối tượng helper
    protected $helper   = NULL;
     
    // Đối tượng config
    protected $config   = NULL;
     
    /**
     * Hàm khởi tạo
     * 
     * @desc    Load các thư viện cần thiết
     */
    public function __construct($is_controller = true) 
    {
         // Loader Config
        require_once PATH_SYSTEM . '/core/loader/ConfigLoader.php';
        $this->config   = new ConfigLoader();
        $this->config->load('config');

        // Loader Library
        require_once PATH_SYSTEM . '/core/loader/LibraryLoader.php';
        $this->library = new LibraryLoader();

        // Load Helper
        require_once PATH_SYSTEM . '/core/loader/HelperLoader.php';
        $this->helper = new HelperLoader();

        // Load View
        require_once PATH_SYSTEM . '/core/loader/ViewLoader.php';
        $this->view = new ViewLoader();

        // Load Model
        require_once PATH_SYSTEM . '/core/loader/ModelLoader.php';
        $this->model = new ModelLoader();
    }
}