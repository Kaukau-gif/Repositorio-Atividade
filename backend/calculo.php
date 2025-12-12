<?php
/*

	fix(backend):

*/
session_start();

$total = 0;

if (!empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $produto) {
        $total += $produto['preco'] * $produto['quantidade'];
    }
}

echo $total;
?>
