<?php
/**
 * Created by PhpStorm.
 * User: timot
 * Date: 08/01/2018
 * Time: 14:46
 */

?>

<h2 class="fonti">Produits</h2>
<ul id="hexGrid">

    <?php
    $list = array();

    if (isset($products))

        foreach ($products as $product) {
            array_push($list, $product['id']);

            ?>

            <li class="hex">
                <div class=" hexIn">
                    <a class="hexLink" href="index.php?ctrl=product&action=display&value=<?php echo $product['id'] ?>">
                        <img src="<?php echo $product['img'] ?>" alt=""/>
                        <h1><?php echo $product['name'] . '' ?></h1>
                        <p><?php echo $product['description'] . '<br/>' . $product['price'] . '<i class="fas fa-euro-sign" aria-hidden="true"></i>' ?> </p>

                    </a>


                </div>



            </li>


            <?php

        }
    ?>
</ul>
