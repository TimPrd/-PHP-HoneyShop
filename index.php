<?php session_start()?>
    <?php
        session_start();
        require ('./Model/model.Connexion.php');
        require ('./Model/model.UserManager.php');
        require ('./Model/model.User.php');

        $pdoBuilder = new Connection();
        $db = $pdoBuilder->getDb(); 

        
        if (
            ( isset($_GET['ctrl']) && !empty($_GET['ctrl']) ) &&
            ( isset($_GET['action']) && !empty($_GET['action']) )
        ) {

            $ctrl = $_GET['ctrl'];
            $action = $_GET['action'];
            require_once('./Controller/' . $ctrl  . 'controller.class.php');

            $ctrl = $ctrl . 'Controller';
            $controller = new $ctrl($db);
            $controller->$action();
        }
        else
        {
            require ('./View/home.php');
        }


       

     
        
         
    ?>

    </body>
</html>