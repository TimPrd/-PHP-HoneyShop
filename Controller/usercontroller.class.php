<?php

class userController {

	private $userManager;
	private $productManager;
	private $user;

    public function __construct($db1) {

    require_once('./Model/model.User.php');
	require_once('./Model/model.UserManager.php');
    require_once('./Model/model.ProductManager.php');

	$this->userManager = new UserManager($db1);
    $this->productManager = new ProductManager($db1);

    $this->db = $db1 ;
    }

    public function login() {
        $page = 'login';
        require('./View/default.php');
    }
    
    public function gestion() 
    {
        $usr = $this->userManager->findByEmail($_SESSION['user']);
   
        if($usr && $usr['admin'] == 1)
        {
            $users = $this->userManager->findAll();
            
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
            $result = $this->userManager->login($user, $pwd);
        }
    	if($result) {
            
            $info = "Connexion reussie";
            $_SESSION['user'] = $result['email'];
            $page = 'home';
            require  'Model/model.Cart2.php';
            $cart = new Cart([
                // Can add unlimited number of item to cart
                'cartMaxItem' => 0,

                // Set maximum quantity allowed per item to 99
                'itemMaxQuantity' => 99,

                // Do not use cookie, cart data will lost when browser is closed
                'useCookie' => true,
            ]);
        }
        else {
            $error = "ERROR : login or password incorrect !";
            $this->login();
            //
            //$page = 'login';
        }
        require('./View/default.php');
    }

    public function doCreate()
    {
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = new User($_POST['email'], $_POST['password'], $_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['city'], $_POST['postalcode'], $_POST['country'],0);
        $this->userManager->create($user);
        $this->login();
        
    }
    public function create() {
        $page = 'create';
        require('./View/default.php');
    }
    

    public function home() {
        $products = $this->productManager->findAll();
        $page = 'home';
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