<?php

class HelperLoader
{
    /**
     * Load helper
     * 
     * @param   string
     * @desc    hàm load helper, tham số truyền vào là tên của helper
     */
    public function load($helper)
    {
        $helper = ucfirst($helper);
        require_once(PATH_SYSTEM . '/helper/' . $helper . '.php');
    }
}