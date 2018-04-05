<?php

$total = 0;
$line = 1;
if (isset($_SESSION['cart'])) {
?>
<div class="container">
<table class="table table-hover text-center"">
<thead>
<tr>
    <th>N°</th>
    <th>Nom</th>
    <th>Quantité</th>
    <th>Prix</th>
    <th>Supprimer</th>
    <th>Totale (<i class="fas fa-euro-sign" aria-hidden="true"></i>)</th>

</tr>
</thead>
<tbody>
<?php
    foreach ($_SESSION['cart'] as $id => $product) {
        echo '<tr>' .
            '<th scope="row">' . $line . '</th>' .
            '<td>' . $product['name'] . '</td>' .
            //todo desactivate sign link blue + activate hover
            '<td>' .
            '<a class="sign_link" href="index.php?ctrl=cart&action=removeOne&value=' . $id . '">
                <span class="fas fa-minus"></span>
            </a>'
            . $product['qt'] .
            '<a class="sign_link" href="index.php?ctrl=cart&action=addOne&value=' . $id . '">
                <span class="fas fa-plus"></span>
            </a>' .
            '</td>' .
            '<td>' . $product['price'] . '<i class="fas fa-euro-sign" aria-hidden="true"></i>' . '</td>' .
            '<td>' . '<a class="sign_link" href="index.php?ctrl=cart&action=remove&value=' . $id . '"><span class="fas fa-trash-alt"></span></a></a>' . '</td>' .
            '<td>' . $product['price'] * $product['qt'] . '</td>' .

            '</tr>';
        $line++;
        $total += $product['qt'] * $product['price'];
    }

    if ($total > 0) {
        echo '<td class="color_total" colspan="5">Total</td>
    <td  class="color_total" colspan="1">' . $total . '<i class="fas fa-euro-sign" aria-hidden="true"></i>' . '</td>';
    } else {
        echo '<td class="color_total" colspan="6">Panier vide ! <span class="fas fa-frown"></span></td>';
    }
}
else
{
    echo '<h2>Aucun article acheté !! <span class="fas fa-frown"></span></h2>';
}
?>


</tbody>
</table>
</div>