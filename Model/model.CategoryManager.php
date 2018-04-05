<?php

/**
 * Class CategoryManager
 */
class CategoryManager
{
    private $db;
    public function __construct($db1)
    {
        $this->db = $db1;
    }

    /**
     * @return toute les produits
     */
    public function findAll()
    {
        $req = $this->db->prepare(
            'SELECT * FROM products where id');
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * @param $id
     * @return la catégorie en fonction de l'id catégorie donnée
     */
    public function cat($id)
    {
        $req = $this->db->prepare(
            "SELECT * FROM products where id_cat=:id_cat");
        $req->bindParam(':id_cat', $id);
        $req->execute();
        return $req->fetchAll();

    }
}

?>