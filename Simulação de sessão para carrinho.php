<?php
session_start();

$_SESSION['carrinho'][] = "Arroz";
$_SESSION['carrinho'][] = "Feijão";

foreach ($_SESSION['carrinho'] as $item) {
    echo "Item: $item<br>";
}
?>
