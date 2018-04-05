<?php session_start() ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Online Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/5.0.0/css/font-awesome.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js"></script>
    <link rel="stylesheet" href="View/css/honeycomb.css">
    <link rel="stylesheet" href="View/css/style.css">

    <link rel="preload" href="fonts/Monoton.woff2" as="font" type="font/woff2" crossorigin>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php?ctrl=product&action=home"><img src="View/img/honey.png" height="50"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="divider-vertical"></li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?ctrl=category&action=findAll">Toute catégorie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?ctrl=category&action=cat&val=1">Gelée Royale</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?ctrl=category&action=cat&val=2">Pollen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?ctrl=category&action=cat&val=3">Miel</a>
            </li>

            <li class="divider-vertical"></li>


            <li class="nav-item">
                <a class="nav-link" href="index.php?ctrl=cart&action=show">Panier</a>
            </li>


        </ul>
        <?php


        if (!isset($_SESSION['user'])) {
            ?>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php?ctrl=user&action=login">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?ctrl=user&action=create">Inscription</a>
                </li>

            </ul>
        <?php } else {
            ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?ctrl=user&action=logout">Déconnexion</a>
                </li>
            </ul>


            <?php
        }
        ?>


    </div>
</nav>


<?php
if (isset($page)) {
    require("./View/" . $page . ".php");
}
?>

</body>
</html>