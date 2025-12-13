<?php
$carrinho = ["Arroz", "Feijão", "Macarrão"];

$itemRemover = "Feijão";

if (($key = array_search($itemRemover, $carrinho)) !== false) {
    unset($carrinho[$key]);
}

foreach ($carrinho as $item) {
    echo $item . "<br>";
}
?>

