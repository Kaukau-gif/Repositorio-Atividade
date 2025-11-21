<?php

// carrinho usando sessão

session_start();
require_once 'db.php';

// cria o carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// adiciona item
function adicionarAoCarrinho($idProduto, $quantidade = 1)
{
    // se já existe, soma
    if (isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto] += $quantidade;
    } else {
        // se não existe, cria
        $_SESSION['carrinho'][$idProduto] = $quantidade;
    }
}

// remove item
function removerDoCarrinho($idProduto)
{
    if (isset($_SESSION['carrinho'][$idProduto])) {
        unset($_SESSION['carrinho'][$idProduto]);
    }
}

// limpa tudo
function limparCarrinho()
{
    $_SESSION['carrinho'] = [];
}

// lista itens
function listarCarrinho()
{
    $itens = [];

    foreach ($_SESSION['carrinho'] as $id => $qtd) {

        $con = conectarBanco();
        $id = intval($id);

        $sql = "SELECT * FROM produtos WHERE id = $id";
        $res = mysqli_query($con, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            $p = mysqli_fetch_assoc($res);
            $p['quantidade'] = $qtd;
            $p['subtotal'] = $p['preco'] * $qtd;
            $itens[] = $p;
        }
    }

    return $itens;
}

// soma total
function calcularTotal()
{
    $total = 0;
    $items = listarCarrinho();

    foreach ($items as $item) {
        // substituição correta:
        $total += floatval($item['subtotal']);
    }

    return $total;
}
