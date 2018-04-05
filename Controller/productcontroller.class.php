<?php

/**
 * Class productController
 * Controlleur des produits
 */
class productController {

	private $productManager;
	private $product;

    public function __construct($db1) {

    require_once('./Model/model.Product.php');
	require_once('./Model/model.ProductManager.php');
	$this->productManager = new ProductManager($db1);

        $this->db = $db1 ;
    }

    /**
     * Ajout d'un item choisi dans le panier (cf schéma UML)
     */
    public function addToCart()
    {
        // Si on a pas d'utilisateur alors on le dirige vers la connexion
        if (!isset($_SESSION['user'])) {
            $page = 'login';
        }
        else { //Si il est connecter
            //On ajoute a son panier son produit
            $page = 'cart';

            //On recupère l'id du produit
            $id = $_GET['value'];

            //On récupère le produit via son id
            $req = $this->productManager->findOne($id);

            //On recréer le produit avec la réponse de la requête
            $product = new Product($id,$req['name'],$req['description'],$req['price'],$req['img'],$req['id_cat']);

            //Si on a deja l'artcile dans le panier on incrémente sa qt sinon on l'ajoute
            if (isset($_SESSION['cart'][$id]))
            {
                $_SESSION['cart'][$id]['qt'] = $_SESSION['cart'][$id]['qt']+1;
            }
            else {
                $_SESSION['cart'][$id] = array(
                    'name' => $product->getName(),
                    'qt' => 1,
                    'price' => $product->getPrice()
                );
            }

        }
        require('./View/default.php');

    }

    //Permet l'affichage d'un prod
    public function display() {
        $id = $_GET['value'];
        $product = $this->productManager->findOne($id);
        $page = 'product';
        require('./View/default.php');
    }








    public function login() {
        $page = 'login';
        require('./View/default.php');
    }
    
    public function gestion() 
    {
        
        $usr = $this->productManager->findByEmail($_SESSION['user']);
   
        if($usr && $usr['admin'] == 1)
        {
            $users = $this->productManager->findAll();
            
            $page = 'gestion';
            require('./View/default.php');
        }
        else
        {
            $page = 'error';
            require('./View/default.php');
        }
        
    }


    public function doLogin() {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $user = $_POST['email'];
            $pwd = $_POST['password'];
            $result = $this->productManager->login($user, $pwd);
        }
    	if($result) {
            
            $info = "Connexion reussie";
            $_SESSION['user'] = $result['email'];
            $page = 'home';
        }
        else {
            $error = "ERROR : login or password incorrect !";
            $page = 'login';
        }
        require('./View/default.php');
    }

    public function doCreate()
    {
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = new User($_POST['email'], $_POST['password'], $_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['city'], $_POST['postalcode'], $_POST['country'],0);
        $this->productManager->create($user);
        $this->login();
        
    }
    public function create() {
        $page = 'create';
        require('./View/default.php');
    }
    
    
    public function home() {
        $page = 'home';
        $products = $this->productManager->findAll();
        require('./View/default.php');
    }
    
    
    public function logout() {
// Finalement, on détruit la session.
        session_destroy();
        $page = 'home';
        require('./View/default.php');
    }
    
}
?>