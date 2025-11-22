<?php
/*

feat(backend)

*/
function buscarProdutos() {
    // Configuração da conexão
    $servername = "localhost";
    $username = "root";
    $password = "";
    $vrname = "loja";

    // Conectando ao banco
    $conn = new mysqli($servername, $username, $password, $vrname);

    // Verifica conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Query para buscar produtos
    $sql = "SELECT id, nome, preco FROM produtos";
    $result = $conn->query($sql);

    // Array para armazenar resultados
    $produtos = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }
    }

    $conn->close();
    return $produtos;
}
?>
// PARTE 02
<?php

/*

feat(backend)

*/
$lista = buscarProdutos();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>

<h2>Produtos cadastrados</h2>

<?php if (empty($lista)): ?>
    <p>Nenhum produto encontrado.</p>
<?php else: ?>
    <ul>
        <?php foreach ($lista as $produto): ?>
            <li>
                <strong><?php echo $produto['nome']; ?></strong> -
                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
