<?php
/**
 * summary
 */
class Slide extends Database
{
    /**
     * the function get slide list
     * @return array slide
     */
    public function all()
    {
    	$sql = "
			SELECT * FROM slide
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * the function find a slide
     * @param  string $id 
     * @return a slide
     */
    public function find($id)
    {
    	$sql = "
			SELECT * FROM slide
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
				UPDATE slide
				SET active = ?
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $id]);
    }

    public function insert($link, $image, $active)
    {
    	$sql = "
				INSERT INTO slide (link, image, active)
				VALUES (?, ?, ?);
		";
		$this->setQuery($sql);
		return $this->execute([$link, $image, $active]);
    }

    public function update($link, $image, $active, $id)
    {
    	$sql = "
				UPDATE slide
				SET active = ?, link = ?, image = ? 
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$active, $link, $image, $id]);
    }

    public function delete($id)
    {
    	$sql = "
				DELETE FROM slide
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$id]);
    }
}