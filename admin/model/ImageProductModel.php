<?php
/**
 * summary
 */
class ImageProduct extends Database
{
    /**
     * the function get image_product list
     * @return array image_product
     */
    public function all()
    {
    	$sql = "
			SELECT * FROM image_product
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * the function find a image_product
     * @param  string $id 
     * @return a image_product
     */
    public function find($id)
    {
    	$sql = "
			SELECT * FROM image_product
			WHERE id = $id
		";
		$this->setQuery($sql);
		return $this->loadRow();
    }

    public function fetchColumn($col, $val)
    {
    	$sql = "
			SELECT * FROM image_product
			WHERE $col = '$val'
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    public function changeActive($active, $id)
    {
    	$sql = "
				UPDATE image_product
				SET active = ?
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $id]);
    }

    public function insert($name, $idProduct)
    {
    	$sql = "
				INSERT INTO image_product (name, id_product)
				VALUES (?, ?);
		";
		$this->setQuery($sql);
		return $this->execute([$name, $idProduct]);
    }

    public function update($name, $slug, $image, $active, $id)
    {
    	$sql = "
				UPDATE image_product
				SET active = ?, name = ?, slug = ?, image = ? 
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $name, $slug, $image, $id]);
    }

    public function delete($id)
    {
    	$sql = "
				DELETE FROM image_product
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$id]);
    }
}