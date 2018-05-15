<?php
/**
 * summary
 */
class Page extends Database
{
    /**
     * the function get cateroty list
     * @return array category
     */
    public function getCategory()
    {
    	$sql = "
			SELECT * FROM category
            WHERE active = 1
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * the function get menu
     * @return array menu
     */
    public function getMenu()
    {
        $sql = "
            SELECT ct.*, GROUP_CONCAT( DISTINCT pr.id, '||', pr.name, '||', pr.slug) AS product_range
            FROM category ct, product_range pr
            WHERE ct.id = pr.id_category AND ct.active = 1 AND pr.active = 1
            GROUP BY ct.id
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get slide
     * @return array slide
     */
    public function getSlide()
    {
        $sql = "
            SELECT * FROM slide
            WHERE active = 1
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get banner1
     * @return array banner1
     */
    public function getBanner1()
    {
        $sql = "
            SELECT * FROM category
            WHERE active = 1
            LIMIT 0, 3
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get banner2
     * @return array banner2
     */
    public function getBanner2()
    {
        $sql = "
            SELECT * FROM category
            WHERE active = 1
            LIMIT 2, 3
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get latest product list
     * @return array product
     */
    public function getLatestProduct($qty = 8)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp
            WHERE pd.active = 1 AND pd.id = cp.id_product
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            ORDER BY pd.created_at DESC
            LIMIT 0, $qty
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get rating product list
     * @return array product
     */
    public function getRatingProduct($qty = 8)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp
            WHERE pd.active = 1 AND pd.id = cp.id_product
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            ORDER BY pd.rating DESC
            LIMIT 0, $qty
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get image
     * @return array image
     */
    public function getImage($idProduct)
    {
        $sql = "
            SELECT *
            FROM image_product
            WHERE id_product = $idProduct
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get all product
     * @return array product
     */
    public function getAllProduct($orderBy, $min, $max)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp
            WHERE pd.active = 1 AND pd.id = cp.id_product
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            HAVING price >= $min AND price <= $max
            ORDER BY $orderBy
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get all paged product
     * @return array product
     */
    public function getPagedProduct($orderBy, $min, $max, $position, $limit)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp
            WHERE pd.active = 1 AND pd.id = cp.id_product
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            HAVING price >= $min AND price <= $max
            ORDER BY $orderBy
            LIMIT $position, $limit
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function find product
     * @return object category
     */
    public function findCategory($id)
    {
        $sql = "
            SELECT * FROM category
            WHERE active = 1 AND id = $id
        ";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    /**
     * the function get product range list
     * @return array product range
     */
    public function getProductRangeByCategory($idCategory)
    {
        $sql = "
            SELECT * FROM product_range
            WHERE active = 1 AND id_category = $idCategory
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get all product by category
     * @return array product
     */
    public function getAllProductByCategory($orderBy, $idCategory, $min, $max)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp, product_range pr
            WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.id_range = pr.id AND pr.id_category = $idCategory
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            HAVING price >= $min AND price <= $max
            ORDER BY $orderBy
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get paged product by category
     * @return array product
     */
    public function getPagedProductByCategory($orderBy, $idCategory, $min, $max, $position, $limit)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp, product_range pr
            WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.id_range = pr.id AND pr.id_category = $idCategory
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            HAVING price >= $min AND price <= $max
            ORDER BY $orderBy
            LIMIT $position, $limit
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function find product range
     * @return object product range
     */
    public function findProductRange($id)
    {
        $sql = "
            SELECT * FROM product_range
            WHERE id = $id AND active = 1
        ";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    /**
     * the function get all product by product range
     * @return array product
     */
    public function getAllProductByProductRange($orderBy, $idRange, $min, $max)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp
            WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.id_range = $idRange
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            HAVING price >= $min AND price <= $max
            ORDER BY $orderBy
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get paged product by product range
     * @return array product
     */
    public function getPagedProductByProductRange($orderBy, $idRange, $min, $max, $position, $limit)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp
            WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.id_range = $idRange
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            HAVING price >= $min AND price <= $max
            ORDER BY $orderBy
            LIMIT $position, $limit
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get all product by keyword
     * @return array product
     */
    public function getAllProductByKeyword($keyword, $orderBy, $idCategory, $min, $max)
    {   
        if ($idCategory == '*') {
            $sql = "
                SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
                FROM product pd, comparetive_link cp
                WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.name LIKE '%$keyword%'
                GROUP BY pd.id, pd.name, pd.slug, pd.rating
                HAVING price >= $min AND price <= $max
                ORDER BY $orderBy
            ";
        } else {
            $sql = "
                SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
                FROM product pd, comparetive_link cp, product_range pr
                WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.name LIKE '%$keyword%' AND pd.id_range = pr.id AND pr.id_category = $idCategory
                GROUP BY pd.id, pd.name, pd.slug, pd.rating
                HAVING price >= $min AND price <= $max
                ORDER BY $orderBy
            ";
        }
            
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get paged product by keyword
     * @return array product
     */
    public function getPagedProductByKeyword($keyword, $orderBy, $idCategory, $min, $max, $position, $limit)
    {   
        if ($idCategory == '*') {
            $sql = "
                SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
                FROM product pd, comparetive_link cp
                WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.name LIKE '%$keyword%'
                GROUP BY pd.id, pd.name, pd.slug, pd.rating
                HAVING price >= $min AND price <= $max
                ORDER BY $orderBy
                LIMIT $position, $limit
            ";
        } else {
            $sql = "
                SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
                FROM product pd, comparetive_link cp, product_range pr
                WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.name LIKE '%$keyword%' AND pd.id_range = pr.id AND pr.id_category = $idCategory
                GROUP BY pd.id, pd.name, pd.slug, pd.rating
                HAVING price >= $min AND price <= $max
                ORDER BY $orderBy
                LIMIT $position, $limit
            ";
        }
            
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function find product
     * @return object product
     */
    public function findProduct($id)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.id_range, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp
            WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.id = $id
            GROUP BY pd.id, pd.name, pd.slug, pd.id_range, pd.rating
        ";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    /**
     * the function get all review
     * @return array review
     */
    public function getAllReview($idProduct)
    {
        $sql = "
            SELECT *
            FROM review_product
            WHERE id_product = $idProduct
            ORDER BY created_at DESC
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get paged review
     * @return array review
     */
    public function getPagedReview($idProduct, $position, $limit)
    {
        $sql = "
            SELECT *
            FROM review_product
            WHERE id_product = $idProduct
            ORDER BY created_at DESC
            LIMIT $position, $limit
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function get related product
     * @return array product
     */
    public function getRelatedProduct($idRange, $qty = 4)
    {
        $sql = "
            SELECT pd.id, pd.name, pd.slug, pd.rating, MIN(cp.price) AS price
            FROM product pd, comparetive_link cp
            WHERE pd.active = 1 AND pd.id = cp.id_product AND pd.id_range = $idRange
            GROUP BY pd.id, pd.name, pd.slug, pd.rating
            ORDER BY pd.created_at DESC
            LIMIT 0, $qty
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function insert review
     */
    public function insertReview($name, $email, $content, $rating, $idProduct)
    {
        $sql = "
                INSERT INTO review_product (name, email, content, rating, id_product)
                VALUES (?, ?, ?, ?, ?);
        ";
        $this->setQuery($sql);
        return $this->execute([$name, $email, $content, $rating, $idProduct]);
    }

    /**
     * the function update rating
     */
    public function updateRating($rating, $id)
    {
        $sql = "
                UPDATE product
                SET rating = ?
                WHERE id = ?
        ";
        $this->setQuery($sql);
        return $this->execute([$rating, $id]);
    }

    /**
     * the function get comparetive link
     * @return array comparetive link
     */
    public function getComparetiveLink($idProduct)
    {
        $sql = "
            SELECT cp.*, pv.link AS pv_link, pv.image AS pv_image, pv.name_pattern AS name_pattern, pv.price_pattern AS price_pattern
            FROM comparetive_link cp, provider pv
            WHERE cp.id_provider = pv.id AND id_product = $idProduct
        ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    /**
     * the function update rating
     */
    public function updateComparetiveLink($name, $price, $id)
    {
        $sql = "
                UPDATE comparetive_link
                SET name = ?, price = ?
                WHERE id = ?
        ";
        $this->setQuery($sql);
        return $this->execute([$name, $price, $id]);
    }
}