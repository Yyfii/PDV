<?php
include '../conexao.php';
if (!$conexao) {
    die("Erro de conexão: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql1 = "DELETE FROM `Produto` WHERE fornecedor_id = $id";
$sql2 = "DELETE FROM `Fornecedor` WHERE fornecedor_id = $id";
if($conexao){
    if(mysqli_query($conexao, $sql1)){
        if(mysqli_query($conexao, $sql2)){
            header("Location: ../../fornecedor/listar.php");
            exit;
        }
    }
    else{
        echo "Erro ao deletar: " . mysqli_error($conexao);
    }
}

mysqli_close($conexao);
?>
