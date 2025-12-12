<?php
// Arquivo de conexão com o banco

function conectarBanco() {
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'ecommerce';

    $conexao = mysqli_connect($host, $usuario, $senha, $banco);

    if (!$conexao) {
        die('Erro na conexão: ' . mysqli_connect_error());
    }

    return $conexao;
}

// Função que busca produtos no banco
function buscarProdutos() {
    $con = conectarBanco();

    $sql = "SELECT * FROM produtos";

    $resultado = mysqli_query($con, $sql);

    $produtos = [];

    if ($resultado) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $produtos[] = $linha;
        }
    }

    return $produtos;
}
