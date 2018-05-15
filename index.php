<?php
 
// Đường dẫn tới hệ  thống
define('PATH', __DIR__);
define('PATH_SYSTEM', __DIR__ .'/system');
define('PATH_APPLICATION', __DIR__ . '/site');
 
// Lấy thông số cấu hình
require (PATH_SYSTEM . '/config/config.php');
 
//mở file FT_Common.php, file này chứa hàm FT_Load() chạy hệ thống
include_once PATH_SYSTEM . '/core/Common.php';
 
// Chương trình chính
load();