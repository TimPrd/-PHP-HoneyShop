<?php

class ProductManager
{
    private $db;


    public function __construct($db1)
    {
        $this->db = $db1;
    }


    public function findAll()
    {
        $req = $this->db->prepare(
            'SELECT * FROM products');
        $req->execute();

        return $req->fetchAll();
    }

    public final function findOne($id)
    {
        $req = $this->db->prepare(
            "SELECT * FROM products where id=:id");
        $req->bindParam(':id', $id);
        $req->execute();

        return $req->fetch();
    }

    public final function findByCategory($id)
    {
        $req = $this->db->prepare(
            'SELECT * FROM products where id_cat = :cat ');
        $req->execute(
            array(
                'cat' => $id,
            )
        );
        $products = $req->fetch();
        return $products;
    }
}


?>