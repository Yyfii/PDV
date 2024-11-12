<?php

include '../conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM `Produto` WHERE produto_id = $id";

// Exibe a query para verificar (apenas para debug)
if($conexao){
   if(mysqli_query($conexao, $sql)){
    mysqli_close($conexao);
    header("Location: ../../product/listar.php");
    exit;
    
} 
}
else{
    echo 'Erro de conexao';
}
?>
