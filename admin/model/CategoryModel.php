<?php
/**
 * summary
 */
class Category extends Database
{
    /**
     * the function get category list
     * @return array category
     */
    public function all()
    {
    	$sql = "
			SELECT * FROM category
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * the function find a category
     * @param  string $id 
     * @return a category
     */
    public function find($id)
    {
    	$sql = "
			SELECT * FROM category
			WHERE id = $id
		";
		$this->setQuery($sql);
		return $this->loadRow();
    }

    public function findColumn($col, $val)
    {
    	$sql = "
			SELECT * FROM category
			WHERE $col = '$val'
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    public function changeActive($active, $id)
    {
    	$sql = "
				UPDATE category
				SET active = ?
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $id]);
    }

    public function insert($name, $slug, $image, $active)
    {
    	$sql = "
				INSERT INTO category (name, slug, image, active)
				VALUES (?, ?, ?, ?);
		";
		$this->setQuery($sql);
		return $this->execute([$name, $slug, $image, $active]);
    }

    public function update($name, $slug, $image, $active, $id)
    {
    	$sql = "
				UPDATE category
				SET active = ?, name = ?, slug = ?, image = ? 
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $name, $slug, $image, $id]);
    }

    public function delete($id)
    {
    	$sql = "
				DELETE FROM category
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$id]);
    }
}