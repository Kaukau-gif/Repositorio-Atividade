<?php

// controla o carrinho na sessão

session_start();

require_once 'db.php';

// garante que o carrinho exista

function iniciarCarrinho()
{
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }
}

// adiciona um produto ao carrinho

function adicionarAoCarrinho($idProduto, $quantidade = 1)
{
    iniciarCarrinho();

    $idProduto = (int) $idProduto;
    $quantidade = (int) $quantidade;

    if ($quantidade < 1) {
        return;
    }

    if (!isset($_SESSION['carrinho'][$idProduto])) {
        $_SESSION['carrinho'][$idProduto] = 0;
    }

    $_SESSION['carrinho'][$idProduto] += $quantidade;
}

// remove um produto do carrinho

function removerDoCarrinho($idProduto)
{
    iniciarCarrinho();

    $idProduto = (int) $idProduto;

    if (isset($_SESSION['carrinho'][$idProduto])) {
        unset($_SESSION['carrinho'][$idProduto]);
    }
}

// limpa o carrinho inteiro

function limparCarrinho()
{
    iniciarCarrinho();
    $_SESSION['carrinho'] = [];
}

// lista os itens do carrinho com dados do banco

function listarCarrinho()
{
    iniciarCarrinho();

    // se não tiver nada, já retorna vazio

    if (empty($_SESSION['carrinho'])) {
        return [];
    }

    $con = conectarBanco();

    // pega só os ids do carrinho

    $ids = array_keys($_SESSION['carrinho']);

    // deixa os ids segurs: só números

    $ids = array_map('intval', $ids);

    // monta "1,2,3" para o SQL

    $listaIds = implode(',', $ids);

    $sql = "SELECT id, nome, preco FROM produtos WHERE id IN ($listaIds)";
    $resultado = mysqli_query($con, $sql);

    $itens = [];

    if ($resultado) {
        while ($p = mysqli_fetch_assoc($resultado)) {
            $id = $p['id'];
            $qtd = isset($_SESSION['carrinho'][$id]) ? $_SESSION['carrinho'][$id] : 0;

            // quantidade e subtotal calculados aqui

            $p['quantidade'] = $qtd;
            $p['subtotal']   = $p['preco'] * $qtd;

            $itens[] = $p;
        }
    }

    return $itens;
}

// soma o total do carrinho

function calcularTotal()
{
    $total = 0;
    $itens = listarCarrinho();

    foreach ($itens as $item) {
        $total += floatval($item['subtotal']);
    }

    return $total;
}
