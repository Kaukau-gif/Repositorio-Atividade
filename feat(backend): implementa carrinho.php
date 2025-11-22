<?php
/*

feat(backend)

*/
session_start();

// Se o carrinho ainda não existir, cria um array
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// ID do produto que veio da página (GET ou POST)
$id_produto = $_POST['id'] ?? null;

// Verifica se veio um id válido
if ($id_produto) {

    // Se o produto já estiver no carrinho, aumenta a quantidade
    if (isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto]['quantidade']++;
    } else {
        // Senão, adiciona o produto com quantidade = 1
        $_SESSION['carrinho'][$id_produto] = [
            'id' => $id_produto,
            'quantidade' => 1
        ];
    }

    echo "Produto $id_produto adicionado ao carrinho!";
} else {
    echo "ID inválido!";
}
?>

//PARTE 02

<?php
/*

feat(backend)

*/
session_start();

echo "<h2>Carrinho</h2>";

if (empty($_SESSION['carrinho'])) {
    echo "Carrinho vazio.";
} else {
    foreach ($_SESSION['carrinho'] as $produto) {
        echo "Produto: " . $produto['id'] . 
             " | Quantidade: " . $produto['quantidade'] . "<br>";
    }
}
?>

