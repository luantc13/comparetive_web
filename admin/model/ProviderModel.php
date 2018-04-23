<?php
/**
 * summary
 */
class Provider extends Database
{
    /**
     * the function get provider list
     * @return array provider
     */
    public function all()
    {
    	$sql = "
			SELECT * FROM provider
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * the function find a provider
     * @param  string $id 
     * @return a provider
     */
    public function find($id)
    {
    	$sql = "
			SELECT * FROM provider
			WHERE id = $id
		";
		$this->setQuery($sql);
		return $this->loadRow();
    }

    public function findColumn($col, $val)
    {
    	$sql = "
			SELECT * FROM provider
			WHERE $col = '$val'
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    public function changeActive($active, $id)
    {
    	$sql = "
				UPDATE provider
				SET active = ?
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $id]);
    }

    public function insert($name, $slug, $link, $image, $namePattern, $pricePattern, $active)
    {
        // var_dump($link);
        // die();
    	$sql = "
				INSERT INTO provider (name, slug, link, image, name_pattern, price_pattern, active)
				VALUES (?, ?, ?, ?, ?, ?, ?);
		";
		$this->setQuery($sql);
		return $this->execute([$name, $slug, $link, $image, $namePattern, $pricePattern, $active]);
    }

    public function update($name, $slug, $link, $image, $namePattern, $pricePattern, $active, $id)
    {
    	$sql = "
				UPDATE provider
				SET active = ?, name = ?, slug = ?, link = ?, name_pattern = ?, price_pattern = ? , image = ?
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $name, $slug, $link, $namePattern, $pricePattern, $image, $id]);
    }

    public function delete($id)
    {
    	$sql = "
				DELETE FROM provider
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$id]);
    }
}