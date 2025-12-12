<?php
/*

refactor(backend):

*/
session_start();


//Garante que o carrinho exista na sessão

function iniciarCarrinho() {
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
}



// Adiciona um produto ao carrinho
function adicionarProduto($id, $nome, $preco) {
    iniciarCarrinho();

    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]['quantidade']++;
    } else {
        $_SESSION['carrinho'][$id] = [
            'id' => $id,
            'nome' => $nome,
            'preco' => $preco,
            'quantidade' => 1
        ];
    }
}


 //Soma total dos preços do carrinho
function calcularTotalCarrinho() {
    iniciarCarrinho();

    $total = 0;

    foreach ($_SESSION['carrinho'] as $produto) {
        $total += $produto['preco'] * $produto['quantidade'];
    }

    return $total;
}
?>
