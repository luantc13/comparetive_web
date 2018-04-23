<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

use \Curl\Curl;

class IndexController extends BaseController
{
    public function indexAction()
    {
        
        // load view
        $data = [
            'page' => 'dashboard'
        ];
        $this->load_header($data);

        $this->view->load('dashboard');
        
        $this->load_footer();
    }

    public function testCurlAction()
    {
        require PATH.'/vendor/autoload.php';

        // use \Curl\Curl;

        $curl = new Curl();
        $curl->setOpt(CURLOPT_ENCODING, '');
        // $curl->get('https://laptopnew.vn/dell-inspiron-7567-70138766');
        // $curl->get('http://laptopno1.com/Dell-Inspiron-7567-Intel-c2-ae-CoreTM-i7-_7700HQ-_8GB-_1TB-_128GB-SSD-_GeForce-c2-ae-GTX1050Ti-4GB-_Win-1O-_Full-HD/29023');
        // $curl->get('http://www.hangchinhhieu.vn/san-pham/dell-inspiron-7577-n7577c-12708-5690');
        // $curl->get('https://phongvu.vn/may-tinh-xach-tay/laptop-dell/dell-inspiron/may-xach-tay-laptop-dell-inspiron-15-7577-n7577a-den.html');
        $curl->get('https://www.thegioididong.com/laptop/dell-vostro-3568-p63f002');
        // $curl->get('https://fptshop.com.vn/may-tinh-xach-tay/dell-inspiron-n3567c');

        if ($curl->error) {
            echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        } else {
            // // name laptopnew
            // $pattern = '#<h1 class="title">(.*?)</h1>#';
            // preg_match_all($pattern, $curl->response, $data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            // // price laptopnew
            // $pattern = '#<span id="product_price">(.*?)<i class="sy">đ</i> </span>#';
            // preg_match_all($pattern, $curl->response, $data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

//             // name laptopno1
//             $pattern = '#<h1 itemprop="name" class="product-name">
//     <a href=".*?" onclick="return false;" title=".*?" itemprop="url">
//         (.*?)
//     </a>
// </h1>#';
//             preg_match_all($pattern, $curl->response, $data);
//             echo '<pre>';
//             print_r($data);
//             echo '</pre>';

//             // price laptopno1
//             $pattern = '#<div class="price" itemprop="price">(.*?)</div>#';
//             preg_match_all($pattern, $curl->response, $data);
//             echo '<pre>';
//             print_r($data);
//             echo '</pre>';

            // // name hangchinhhieu
            // $pattern = '#<div class=\'title\'><h1> (.*?)</h1></div>#';
            // preg_match_all($pattern, $curl->response, $data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            // // price hangchinhhieu
            // $pattern = '#<span class=\'gia\'>(.*?) VNĐ <span style=\'font-size:12px; color:\#000\'>#';
            // preg_match_all($pattern, $curl->response, $data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            // // name phongvu
            // $pattern = '#<h1 class="detail-product-name">(.*?)</h1>#';
            // preg_match_all($pattern, $curl->response, $data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            // // price phongvu
            // $pattern = '#<div class="detail-product-final-price">(.*?) ₫</div>#';
            // preg_match_all($pattern, $curl->response, $data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            
            // name thegioididong
            $pattern = '#<h1>(.*?)</h1>#';
            preg_match_all($pattern, $curl->response, $data);
            echo '<pre>';
            print_r($data);
            echo '</pre>';

            // price thegioididong
            $pattern = '#<div class="area_price">
                <strong>(.*?)₫</strong>#';

            preg_match_all($pattern, $curl->response, $data);
            echo '<pre>';
            print_r($data);
            echo '</pre>';
                
            // name fptshop
            // $pattern = '#<h1 class="fs-dttname">(.*?) <span class="nosku">.*?</span></h1>#';
            // preg_match_all($pattern, $curl->response, $data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            // // price fptshop
            // $pattern = '#<span class="fs-gsocit">
            //                             <b>Mua online giá sốc</b> <strong>(.*?)₫</strong> <i></i>
            //                         </span>#';
            // preg_match_all($pattern, $curl->response, $data);
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>'; 

        }
        // echo $curl->response;

        curl_close($curl->curl);
    }
}