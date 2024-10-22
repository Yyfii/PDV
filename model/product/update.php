<?php

include '../conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome_produto'];
$preco = $_POST['preco_produto'];
$qtd = $_POST['qtd_produto'];
$categoria_id = $_POST['categoria_id'];
$fornecedor_id = $_POST['fornecedor'];

// Inicializa a query
$sql = "UPDATE `Produto` SET ";

// Adiciona campos apenas se eles têm valor
$updates = [];

if (!empty($nome)) {
    $updates[] = "`nome` = '$nome'";
}

if (!empty($preco)) {
    $updates[] = "`preco` = $preco";
}

if (!empty($qtd)) {
    $updates[] = "`qtd` = $qtd";
}

if (!empty($categoria_id)) {
    $updates[] = "`categoria_id` = $categoria_id";
}

if (!empty($fornecedor_id)) {
    $updates[] = "`fornecedor_id` = $fornecedor_id";
}

// Junta as atualizações e completa a query
$sql .= implode(", ", $updates);
$sql .= " WHERE produto_id = $id";

// Exibe a query para verificar (apenas para debug)
if($conexao){
   $update = mysqli_query($conexao, $sql); 
}
else{
    echo 'Erro de conexao';
}
?>
<h1>Atualizado com sucesso!</h1>
<a href="../../product/listar.php">Lista de produtos</a>
