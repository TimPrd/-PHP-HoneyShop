<?php

class cartController {

	private $cartManager;
	private $cart;
    private $productManager;


    public function __construct() {

    require_once('./Model/model.Cart2.php');

        $this->cart = new Cart([
            // Can add unlimited number of item to cart
            'cartMaxItem' => 0,

            // Set maximum quantity allowed per item to 99
            'itemMaxQuantity' => 99,

            // Do not use cookie, cart data will lost when browser is closed
            'useCookie' => false,
        ]);
    }
    public function remove()
    {
        $id = $_GET['value'];
        unset($_SESSION['cart'][$id]);
        $page = 'cart';
        require('./View/default.php');

    }

    public function removeOne()
    {
        $id = $_GET['value'];
        if ($_SESSION['cart'][$id]['qt']-1 >= 1)
        {
            $_SESSION['cart'][$id]['qt'] = $_SESSION['cart'][$id]['qt']-1;
            $page = 'cart';
            require('./View/default.php');
        }
        else
            if ($_SESSION['cart'][$id]['qt']-1 == 0)
                $this->remove();

    }

    public function addOne()
    {
        $id = $_GET['value'];
        if ($_SESSION['cart'][$id]['qt']+1 >= 1 && $_SESSION['cart'][$id]['qt']+1 <= 99)
            $_SESSION['cart'][$id]['qt'] = $_SESSION['cart'][$id]['qt']+1;
        $page = 'cart';
        require('./View/default.php');

    }

    public function show() {
        if (isset($_SESSION['user']))
            $page = 'cart';
        else
            $page = 'login';
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