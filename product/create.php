<?php
include '../model/conexao.php';
//CREATE/INSERT PRODUCT

//Receber variáveis
$name = $_POST['nome_produto'];
$preco = $_POST['preco_produto'];
$qtd = $_POST['qtd_produto'];
$categoria_id = $_POST['categoria_id'];
$fornecedor_id = $_POST['fornecedor_id'];


if (!is_numeric($preco) || !is_numeric($qtd) || !is_numeric($categoria_id) || !is_numeric($fornecedor_id)) {
    die('Erro: Todos os campos numéricos devem conter valores válidos.');
}

$sql = "INSERT INTO Produto(nome,preco,categoria_id,fornecedor_id,qtd) VALUES ('$name', $preco,$categoria_id,$fornecedor_id, $qtd)";
$inserir = mysqli_query($conexao, $sql);


if ($inserir) {
    echo "Produto inserido com sucesso.";
    /*Redirect to all products */
    echo "<a href='listar.php'>Voltar</a>";
} else {
    echo "Erro ao inserir produto: " . mysqli_error($conexao);
}
?>