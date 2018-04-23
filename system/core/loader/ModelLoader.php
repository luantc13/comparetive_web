<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class ModelLoader
{
    /**
     * Load model
     * 
     * @param   string
     * @param   array
     * @desc    hàm load model, tham số truyền vào là tên của model và 
     *          danh sách các biến trong hàm khởi tạo (nếu có)
     */
    public function load($model, $agrs = [])
    {
        // Nếu thư viện chưa được load thì thực hiện load
        if ( empty($this->{$model}) )
        {
            // Chuyển chữ hoa đầu và thêm hậu tố Model
            $class = ucfirst($model);
            require_once(PATH_APPLICATION . '/model/' . $class . 'Model.php');
            $this->{$model} = new $class($agrs);
            $this->{$model}->connection();
        }
    }
}