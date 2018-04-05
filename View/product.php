<?php
/**
 * Created by PhpStorm.
 * User: timot
 * Date: 08/01/2018
 * Time: 14:46
 */

?>
<div class="container">
    <h1 class="fonti">Informations</h1>
    <div class="under">
        <p class=" fonti " data-text="<?php echo $product['name'] ?>"><?php echo $product['name'] ?></p>
    </div>
    <hr>
    <div class="prod text-center">
        <p><?php echo $product['description']; ?></p>

        <p> Prix : <?php echo $product['price'] ?> <i class="fas fa-euro-sign" aria-hidden="true"></i></p>
    </div>
    <hr>

    <div class="buy_btn">
        <a href="index.php?ctrl=product&action=addToCart&value=<?php echo $product['id'] ?>"
           class="rainbow-button"><div class="fonti font_buy"> Acheter </div></a>
    </div>
</div>