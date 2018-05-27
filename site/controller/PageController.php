<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

use \Curl\Curl;

class PageController extends BaseController
{
    public function indexAction()
    {
        if (isset($_GET['txtKeyword']) && isset($_GET['cbbCategory'])) {
            header('location: index.php?c=page&a=search&txtKeyword='.$_GET['txtKeyword'].'&cbbCategory='.$_GET['cbbCategory']);
        }
        // load model, library and helper
        $this->model->load('page');

        $category = $this->model->page->getCategory();
        $menu = $this->model->page->getMenu();
        $slide = $this->model->page->getSlide();
        $banner1 = $this->model->page->getBanner1();
        $banner2 = $this->model->page->getBanner2();
        $latestProduct = $this->model->page->getLatestProduct();
        $ratingProduct = $this->model->page->getRatingProduct();

        // get image for latest product
        foreach ($latestProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // get image for rating product
        foreach ($ratingProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // load view
        $data = [
            'page' => 'Trang chủ',
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'menu' => $menu,
            'slide' => $slide,
            'banner1' => $banner1,
            'banner2' => $banner2,
            'latestProduct' => $latestProduct,
            'ratingProduct' => $ratingProduct,
        ];

        $this->view->load('page/index', $data);
        
        $data = [
            'category' => $category,
            'action' => 'index',
        ];
        $this->load_footer($data);
    }

    public function AboutAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $category = $this->model->page->getCategory();
        $menu = $this->model->page->getMenu();

        // load view
        $data = [
            'page' => 'Giới thiệu',
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'menu' => $menu
        ];

        $this->view->load('page/about', $data);
        
        $data = [
            'category' => $category,
            'action' => 'about',
        ];
        $this->load_footer($data);
    }

    public function ContactAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $category = $this->model->page->getCategory();
        $menu = $this->model->page->getMenu();

        // load view
        $data = [
            'page' => 'Liên hệ',
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'menu' => $menu
        ];

        $this->view->load('page/contact', $data);
        
        $data = [
            'category' => $category,
            'action' => 'contact',
        ];
        $this->load_footer($data);
    }

    public function DeliveryAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $category = $this->model->page->getCategory();
        $menu = $this->model->page->getMenu();

        // load view
        $data = [
            'page' => 'Giao & Nhận',
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'menu' => $menu
        ];

        $this->view->load('page/delivery', $data);
        
        $data = [
            'category' => $category,
            'action' => 'delivery',
        ];
        $this->load_footer($data);
    }

    public function FaqAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $category = $this->model->page->getCategory();
        $menu = $this->model->page->getMenu();

        // load view
        $data = [
            'page' => 'FAQ',
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'menu' => $menu
        ];

        $this->view->load('page/faq', $data);
        
        $data = [
            'category' => $category,
            'action' => 'faq',
        ];
        $this->load_footer($data);
    }

    public function allProductAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'latest';
        $show = (isset($_GET['show'])) ? $_GET['show'] : 9;
        $min = (isset($_GET['min'])) ? $_GET['min'] : 5000000;
        $max = (isset($_GET['max'])) ? $_GET['max'] : 200000000;

        $category = $this->model->page->getCategory();
        $menu = $this->model->page->getMenu();
        $latestProduct = $this->model->page->getLatestProduct(4);
        $allProduct = $this->model->page->getAllProduct('pd.created_at DESC', $min, $max);

        // pagination
        $currentPage = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $this->library->load('pagination', [count($allProduct), $currentPage, $show, 3]);
        $pagination = $this->library->pagination;
        $paginationHTML = $pagination->showPagination();
        $limit = $pagination->get_nItemOnPage();
        $position = ($currentPage - 1) * $limit;
        switch ($sort) {
            case 'latest':
                $pagedProduct = $this->model->page->getPagedProduct('pd.created_at DESC', $min, $max, $position, $limit);
                break;
            
            case 'oldest':
                $pagedProduct = $this->model->page->getPagedProduct('pd.created_at ASC', $min, $max, $position, $limit);
                break;

            case 'rating':
                $pagedProduct = $this->model->page->getPagedProduct('pd.rating DESC', $min, $max, $position, $limit);
                break;

            case 'price-desc':
                $pagedProduct = $this->model->page->getPagedProduct('price DESC', $min, $max, $position, $limit);
                break;

            case 'price-asc':
                $pagedProduct = $this->model->page->getPagedProduct('price ASC', $min, $max, $position, $limit);
                break;

            default:
                $pagedProduct = $this->model->page->getPagedProduct('pd.created_at DESC', $min, $max, $position, $limit);
                break;
        }

        // get image for latest product
        foreach ($latestProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // get image for all paged product
        foreach ($pagedProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // load view
        $data = [
            'page' => 'Tất cả sản phẩm',
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'category' => $category,
            'menu' => $menu,
            'latestProduct' => $latestProduct,
            'paginationHTML' => $paginationHTML,
            'pagedProduct' => $pagedProduct,
            'sort' => $sort,
            'show' => $show,
            'min' => $min,
            'max' => $max,
        ];

        $this->view->load('page/allProduct', $data);
        
        $data = [
            'category' => $category,
            'action' => 'allproduct',
            'min' => $min,
            'max' => $max,
        ];
        $this->load_footer($data);
    }

    public function categoryAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $id = $_GET['id'];
        $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'latest';
        $show = (isset($_GET['show'])) ? $_GET['show'] : 9;
        $min = (isset($_GET['min'])) ? $_GET['min'] : 5000000;
        $max = (isset($_GET['max'])) ? $_GET['max'] : 200000000;

        $category = $this->model->page->getCategory();
        $currentCategory = $this->model->page->findCategory($id);
        $productRange = $this->model->page->getProductRangeByCategory($id);
        $menu = $this->model->page->getMenu();
        $latestProduct = $this->model->page->getLatestProduct(4);
        $allProduct = $this->model->page->getAllProductByCategory('pd.created_at DESC', $id, $min, $max);

        // pagination
        $currentPage = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $this->library->load('pagination', [count($allProduct), $currentPage, $show, 3]);
        $pagination = $this->library->pagination;
        $paginationHTML = $pagination->showPagination();
        $limit = $pagination->get_nItemOnPage();
        $position = ($currentPage - 1) * $limit;
        switch ($sort) {
            case 'latest':
                $pagedProduct = $this->model->page->getPagedProductByCategory('pd.created_at DESC', $id, $min, $max, $position, $limit);
                break;
            
            case 'oldest':
                $pagedProduct = $this->model->page->getPagedProductByCategory('pd.created_at ASC', $id, $min, $max, $position, $limit);
                break;

            case 'rating':
                $pagedProduct = $this->model->page->getPagedProductByCategory('pd.rating DESC', $id, $min, $max, $position, $limit);
                break;

            case 'price-desc':
                $pagedProduct = $this->model->page->getPagedProductByCategory('price DESC', $id, $min, $max, $position, $limit);
                break;

            case 'price-asc':
                $pagedProduct = $this->model->page->getPagedProductByCategory('price ASC', $id, $min, $max, $position, $limit);
                break;

            default:
                $pagedProduct = $this->model->page->getPagedProductByCategory('pd.created_at DESC', $id, $min, $max, $position, $limit);
                break;
        }

        // get image for latest product
        foreach ($latestProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // get image for all paged product
        foreach ($pagedProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // load view
        $data = [
            'page' => $currentCategory->name,
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'currentCategory' => $currentCategory,
            'productRange' => $productRange,
            'menu' => $menu,
            'latestProduct' => $latestProduct,
            'paginationHTML' => $paginationHTML,
            'pagedProduct' => $pagedProduct,
            'sort' => $sort,
            'show' => $show,
            'min' => $min,
            'max' => $max,
        ];

        $this->view->load('page/category', $data);
        
        $data = [
            'category' => $category,
            'action' => 'category',
            'min' => $min,
            'max' => $max,
            'id' => $id,
            'slug' => $currentCategory->slug
        ];
        $this->load_footer($data);
    }

    public function productRangeAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $id = $_GET['id'];
        $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'latest';
        $show = (isset($_GET['show'])) ? $_GET['show'] : 9;
        $min = (isset($_GET['min'])) ? $_GET['min'] : 5000000;
        $max = (isset($_GET['max'])) ? $_GET['max'] : 200000000;

        $category = $this->model->page->getCategory();
        $currentProductRange = $this->model->page->findProductRange($id);
        $currentCategory = $this->model->page->findCategory($currentProductRange->id_category);
        $productRange = $this->model->page->getProductRangeByCategory($currentCategory->id);
        $menu = $this->model->page->getMenu();
        $latestProduct = $this->model->page->getLatestProduct(4);
        $allProduct = $this->model->page->getAllProductByProductRange('pd.created_at DESC', $id, $min, $max);

        // pagination
        $currentPage = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $this->library->load('pagination', [count($allProduct), $currentPage, $show, 3]);
        $pagination = $this->library->pagination;
        $paginationHTML = $pagination->showPagination();
        $limit = $pagination->get_nItemOnPage();
        $position = ($currentPage - 1) * $limit;
        switch ($sort) {
            case 'latest':
                $pagedProduct = $this->model->page->getPagedProductByProductRange('pd.created_at DESC', $id, $min, $max, $position, $limit);
                break;
            
            case 'oldest':
                $pagedProduct = $this->model->page->getPagedProductByProductRange('pd.created_at ASC', $id, $min, $max, $position, $limit);
                break;

            case 'rating':
                $pagedProduct = $this->model->page->getPagedProductByProductRange('pd.rating DESC', $id, $min, $max, $position, $limit);
                break;

            case 'price-desc':
                $pagedProduct = $this->model->page->getPagedProductByProductRange('price DESC', $id, $min, $max, $position, $limit);
                break;

            case 'price-asc':
                $pagedProduct = $this->model->page->getPagedProductByProductRange('price ASC', $id, $min, $max, $position, $limit);
                break;

            default:
                $pagedProduct = $this->model->page->getPagedProductByProductRange('pd.created_at DESC', $id, $min, $max, $position, $limit);
                break;
        }

        // get image for latest product
        foreach ($latestProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // get image for all paged product
        foreach ($pagedProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // load view
        $data = [
            'page' => $currentProductRange->name,
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'currentCategory' => $currentCategory,
            'currentProductRange' => $currentProductRange,
            'productRange' => $productRange,
            'menu' => $menu,
            'latestProduct' => $latestProduct,
            'paginationHTML' => $paginationHTML,
            'pagedProduct' => $pagedProduct,
            'sort' => $sort,
            'show' => $show,
            'min' => $min,
            'max' => $max,
        ];

        $this->view->load('page/productRange', $data);
        
        $data = [
            'category' => $category,
            'action' => 'productRange',
            'min' => $min,
            'max' => $max,
            'id' => $id,
            'slug' => $currentProductRange->slug
        ];
        $this->load_footer($data);
    }

    public function searchAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $keyword = $_GET['txtKeyword'];
        $idCategory = $_GET['cbbCategory'];
        $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'latest';
        $show = (isset($_GET['show'])) ? $_GET['show'] : 9;
        $min = (isset($_GET['min'])) ? $_GET['min'] : 5000000;
        $max = (isset($_GET['max'])) ? $_GET['max'] : 200000000;

        $category = $this->model->page->getCategory();
        $menu = $this->model->page->getMenu();
        $latestProduct = $this->model->page->getLatestProduct(4);
        $allProduct = $this->model->page->getAllProductByKeyword($keyword,'pd.created_at DESC', $idCategory, $min, $max);

        // pagination
        $currentPage = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $this->library->load('pagination', [count($allProduct), $currentPage, $show, 3]);
        $pagination = $this->library->pagination;
        $paginationHTML = $pagination->showPagination();
        $limit = $pagination->get_nItemOnPage();
        $position = ($currentPage - 1) * $limit;
        switch ($sort) {
            case 'latest':
                $pagedProduct = $this->model->page->getPagedProductByKeyword($keyword, 'pd.created_at DESC', $idCategory, $min, $max, $position, $limit);
                break;
            
            case 'oldest':
                $pagedProduct = $this->model->page->getPagedProductByKeyword($keyword, 'pd.created_at ASC', $idCategory, $min, $max, $position, $limit);
                break;

            case 'rating':
                $pagedProduct = $this->model->page->getPagedProductByKeyword($keyword, 'pd.rating DESC', $idCategory, $min, $max, $position, $limit);
                break;

            case 'price-desc':
                $pagedProduct = $this->model->page->getPagedProductByKeyword($keyword, 'price DESC', $idCategory, $min, $max, $position, $limit);
                break;

            case 'price-asc':
                $pagedProduct = $this->model->page->getPagedProductByKeyword($keyword, 'price ASC', $idCategory, $min, $max, $position, $limit);
                break;

            default:
                $pagedProduct = $this->model->page->getPagedProductByKeyword($keyword, 'pd.created_at DESC', $idCategory, $min, $max, $position, $limit);
                break;
        }

        // get image for latest product
        foreach ($latestProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // get image for all paged product
        foreach ($pagedProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // load view
        $data = [
            'page' => 'Tìm kiếm',
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'category' => $category,
            'menu' => $menu,
            'latestProduct' => $latestProduct,
            'paginationHTML' => $paginationHTML,
            'pagedProduct' => $pagedProduct,
            'sort' => $sort,
            'show' => $show,
            'min' => $min,
            'max' => $max,
            'keyword' => $keyword,
        ];

        $this->view->load('page/search', $data);
        
        $data = [
            'category' => $category,
            'action' => 'search',
            'min' => $min,
            'max' => $max,
            'keyword' => $keyword,
            'idCategory' => $idCategory,
        ];
        $this->load_footer($data);
    }

    public function productAction()
    {
        // load model, library and helper
        $this->model->load('page');

        $id = $_GET['id'];

        $category = $this->model->page->getCategory();
        $menu = $this->model->page->getMenu();
        $product = $this->model->page->findProduct($id);
        $currentProductRange = $this->model->page->findProductRange($product->id_range);
        $currentCategory = $this->model->page->findCategory($currentProductRange->id_category);
        $imageProduct = $this->model->page->getImage($product->id);
        $comparetiveLink = $this->model->page->getComparetiveLink($product->id);
        $relatedProduct = $this->model->page->getRelatedProduct($product->id_range);
        $allReview = $this->model->page->getAllReview($product->id);

        // pagination
        $currentPage = (isset($_GET["page"])) ? $_GET["page"] : 1;
        $this->library->load('pagination', [count($allReview), $currentPage, 3, 3]);
        $pagination = $this->library->pagination;
        $paginationHTML = $pagination->showPagination();
        $limit = $pagination->get_nItemOnPage();
        $position = ($currentPage - 1) * $limit;

        $pagedReview = $this->model->page->getPagedReview($product->id, $position, $limit);

        // get image for related product
        foreach ($relatedProduct as $item) {
            $image = $this->model->page->getImage($item->id);
            $item->image = $image[0]->name;
        }

        // check link and update price
        require PATH.'/vendor/autoload.php';

        $curl = new Curl();
        $curl->setOpt(CURLOPT_ENCODING, '');

        foreach ($comparetiveLink as $item) {
            $curl->get($item->link);

            if ($curl->error) {
                    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
            } elseif ($curl->response != '') {
                // name
                $pattern = $item->name_pattern;
                preg_match_all($pattern, $curl->response, $name);
                if ($name[1][0] != '' && $name[1][0] != $item->name) {
                    $item->name = $name[1][0];
                    $update = $this->model->page->updateComparetiveLink($item->name, $item->price, $item->id);
                }

                // price
                $pattern = $item->price_pattern;
                preg_match_all($pattern, $curl->response, $price);
                if (!empty($price[1])) {
                    $price[1][0] = str_replace('.', '', $price[1][0]);
                    $price[1][0] = str_replace(',', '', $price[1][0]);
                    if ($price[1][0] != '' && $price[1][0] != $item->price) {
                        $item->price = $price[1][0];
                        $update = $this->model->page->updateComparetiveLink($item->name, $item->price, $item->id);
                    }
                }  
            }
        }
        
        // load view
        $data = [
            'page' => $product->name,
            'category' => $category
        ];
        $this->load_header($data);

        $data = [
            'category' => $category,
            'menu' => $menu,
            'relatedProduct' => $relatedProduct,
            'product' => $product,
            'currentProductRange' => $currentProductRange,
            'currentCategory' => $currentCategory,
            'imageProduct' => $imageProduct,
            'comparetiveLink' => $comparetiveLink,
            'paginationHTML' => $paginationHTML,
            'pagedReview' => $pagedReview,
        ];

        $this->view->load('page/product', $data);
        
        $data = [
            'category' => $category,
            'action' => 'product',
        ];
        $this->load_footer($data);
    }

    public function postReviewAction()
    {
        // load model, libraby and helper
        $this->model->load('page');
        $this->helper->load('string');

        $idProduct = $_GET['id'];
        $name = $_POST['txtName'];
        $email = $_POST['txtEmail'];
        $content = $_POST['txtContent'];
        $rating = $_POST['rdoRating']; 

        $error = [];

        // check name, email and content
        if (!required($name)) {
            $error[] = 'Họ tên không được để trống';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Email không đúng định dạng";
        }

        if (!required($content)) {
            $error[] = 'Nội dung không được để trống';
        }

        // insert review
        if (empty($error)) {
            $insert = $this->model->page->insertReview($name, $email, $content, $rating, $idProduct);
            if (isset($insert)) {
                $_SESSION['success'] = [];
                $_SESSION['success'][] = 'Thêm mới đánh giá thành công';

                // update rating
                $review = $this->model->page->getAllReview($idProduct);
                $rating = 0;
                foreach ($review as $item) {
                    $rating += $item->rating;
                }
                $rating /= count($review);
                $update = $this->model->page->updateRating($rating, $idProduct);
            } else {
                $error[] = 'Thêm mới đánh giá thất bại';
            }
        }

        $_SESSION['error'] = $error;  
        header('location: index.php?c=page&a=product&id='.$idProduct);
    }
}