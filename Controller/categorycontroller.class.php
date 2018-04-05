<?php

/**
 * Class categoryController
 * Permet d'avoir un controlleur pour les categories
 */
class categoryController {

	private $categoryManager;
	private $product;

    public function __construct($db1) {

    require_once('./Model/model.Category.php');
	require_once('./Model/model.CategoryManager.php');
	$this->categoryManager = new CategoryManager($db1);

        $this->db = $db1 ;
    }

    /**
     * Recupère toute les catégories
     */
    public function findAll()
    {
        $products = $this->categoryManager->findAll();
        $page = 'products';
        require('./View/default.php');
    }

    /**
     * Récupère une seule catégorie passé dans l'url
     */
    public function cat()
    {
        $id = $_GET['val'];
        $products = $this->categoryManager->cat($id);
        $page = 'products';
        require('./View/default.php');
    }

    
}
?>