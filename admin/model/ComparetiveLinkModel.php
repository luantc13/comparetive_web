<?php
/**
 * summary
 */
class ComparetiveLink extends Database
{
    /**
     * the function get comparetive_link list
     * @return array comparetive_link
     */
    public function all()
    {
    	$sql = "
			SELECT * FROM comparetive_link
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * the function find a comparetive_link
     * @param  string $id 
     * @return a comparetive_link
     */
    public function find($id)
    {
    	$sql = "
			SELECT * FROM comparetive_link
			WHERE id = $id
		";
		$this->setQuery($sql);
		return $this->loadRow();
    }

    public function fetchColumn($col, $val)
    {
    	$sql = "
			SELECT cp.*, pv.image AS provider_image
            FROM comparetive_link cp, provider pv
            WHERE cp.id_provider = pv.id AND pv.active = 1 AND cp.$col = $val 
		";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    public function insert($idProduct, $idProvider, $name, $price, $link)
    {
    	$sql = "
				INSERT INTO comparetive_link (id_product, id_provider, name, price, link)
				VALUES (?, ?, ?, ?, ?);
		";
		$this->setQuery($sql);
		return $this->execute([$idProduct, $idProvider, $name, $price, $link]);
    }

    public function update($idProvider, $name, $price, $link, $id)
    {
    	$sql = "
				UPDATE comparetive_link
				SET id_provider = ?, name = ?, price = ?, link = ?
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$idProvider, $name, $price, $link, $id]);
    }

    public function delete($id)
    {
    	$sql = "
				DELETE FROM comparetive_link
				WHERE id = ?
		";
		$this->setQuery($sql);
		return $this->execute([$id]);
    }
}