<?php
/**
 * summary
 */
class ProductRange extends Database
{
    /**
     * the function get product_range list
     * @return array product_range
     */
    public function all()
    {
    	$sql = "
			SELECT pr.*, ct.name as ct_name
            FROM product_range pr, category ct
            WHERE pr.id_category = ct.id
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * the function find a product_range
     * @param  string $id 
     * @return a product_range
     */
    public function find($id)
    {
    	$sql = "
			SELECT * FROM product_range
			WHERE id = $id
		";
		$this->setQuery($sql);
		return $this->loadRow();
    }

    public function findColumn($col, $val)
    {
        $sql = "
            SELECT * FROM product_range
            WHERE $col = '$val'
        ";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    public function fetchColumn($col, $val)
    {
    	$sql = "
			SELECT * FROM product_range
			WHERE $col = '$val'
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    public function changeActive($active, $id)
    {
        $sql = "
                UPDATE product_range
                SET active = ?
                WHERE id = ?
        ";
        $this->setQuery($sql);
        return $this->execute([$active, $id]);
    }

    public function insert($name, $slug, $category)
    {
    	$sql = "
				INSERT INTO product_range (name, slug, id_category)
				VALUES (?, ?, ?);
		";
		$this->setQuery($sql);
		return $this->execute([$name, $slug, $category]);
    }

    public function update($name, $slug, $category, $id)
    {
    	$sql = "
				UPDATE product_range
				SET name = ?, slug = ?, id_category = ? 
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$name, $slug, $category, $id]);
    }

    public function delete($id)
    {
    	$sql = "
				DELETE FROM product_range
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$id]);
    }
}