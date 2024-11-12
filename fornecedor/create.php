<?php
include '../model/conexao.php';
//CREATE/INSERT PRODUCT

//Receber variáveis
$name = $_POST['nome_fornecedor'];
$email = $_POST['email'];
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2'];
$pix = $_POST['pix'];
$setor_id = $_POST['setor_id'];

if (!is_numeric($setor_id) || !is_numeric($tel1) || !is_numeric($tel2)) {
    die('Erro: Todos os campos numéricos devem conter valores válidos.');
}

$sql = "INSERT INTO Fornecedor(nome,email,telefone1,setor_id, pix,telefone2) VALUES ('$name','$email','$tel1','$setor_id','$pix','$tel2')";
$inserir = mysqli_query($conexao, $sql);


if ($inserir) {
    header("Location: listar.php");
    exit;
} else {
    echo "Erro ao inserir produto: " . mysqli_error($conexao);
}
?>