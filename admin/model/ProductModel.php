<?php
/**
 * summary
 */
class Product extends Database
{
    /**
     * the function get product list
     * @return array product
     */
    public function all()
    {
    	$sql = "
			SELECT pd.*, GROUP_CONCAT( DISTINCT im.id, '@', im.name) AS image, GROUP_CONCAT( DISTINCT cp.id, '@', cp.name, '@',  cp.price, '@', cp.link, '@', pv.name, '@', pv.image) AS comparetive
            FROM product pd, image_product im, comparetive_link cp, provider pv
            WHERE pd.id = im.id_product AND pd.id = cp.id_product AND cp.id_provider = pv.id
            GROUP BY pd.id
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * the function find a product
     * @param  string $id 
     * @return a product
     */
    public function find($id)
    {
    	$sql = "
			SELECT * FROM product
			WHERE id = $id
		";
		$this->setQuery($sql);
		return $this->loadRow();
    }

    public function findColumn($col, $val)
    {
        $sql = "
            SELECT * FROM product
            WHERE $col = '$val'
        ";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    public function fetchColumn($col, $val)
    {
    	$sql = "
			SELECT * FROM product
			WHERE $col = '$val'
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    public function changeActive($active, $id)
    {
    	$sql = "
				UPDATE product
				SET active = ?
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $id]);
    }

    public function insert($name, $slug, $idRange, $active)
    {
    	$sql = "
				INSERT INTO product (name, slug, id_range, active)
				VALUES (?, ?, ?, ?);
		";
		$this->setQuery($sql);
		return $this->execute([$name, $slug, $idRange, $active]);
    }

    public function update($name, $slug, $idRange, $active, $id)
    {
    	$sql = "
				UPDATE product
				SET active = ?, name = ?, slug = ?, id_range = ? 
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $name, $slug, $idRange, $id]);
    }

    public function delete($id)
    {
    	$sql = "
				DELETE FROM product
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$id]);
    }
}