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
