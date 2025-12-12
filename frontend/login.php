<?php

require_once 'db.php';

// Função que faz o login simples
function fazerLogin($usuario, $senha) {
    $con = conectarBanco();

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        return true; // Login válido
    } else {
        return false; // Dados incorretos
    }
}
