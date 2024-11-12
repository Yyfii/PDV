<?php
include '../conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome_fornecedor'];
$email = $_POST['email'];
$tel1 = $_POST['tel1'];
$setor_id = $_POST['setor_id'];
$pix = $_POST['pix'];
$tel2 = $_POST['tel2'];

// Verifica se a conexão foi estabelecida
if (!$conexao) {
    die("Erro de conexão: " . mysqli_connect_error());
}

// Inicializa a query
$sql = "UPDATE `Fornecedor` SET ";

// Adiciona campos apenas se eles têm valor
$updates = [];

if (!empty($nome)) {
    $updates[] = "`nome` = '$nome'";
}

if (!empty($email)) {
    $updates[] = "`email` = '$email'";
}

if (!empty($tel1)) {
    $updates[] = "`telefone1` = '$tel1'";
}

if (!empty($setor_id)) {
    $updates[] = "`setor_id` = '$setor_id'";
}

if (!empty($pix)) {
    $updates[] = "`pix` = '$pix'";
}

if (!empty($tel2)) {
    $updates[] = "`telefone2` = '$tel2'";
}

// Verifica se há atualizações a serem feitas
if (!empty($updates)) {
    // Junta as atualizações e completa a query
    $sql .= implode(", ", $updates);
    $sql .= " WHERE fornecedor_id = '$id'";

    // Executa a query
    if (mysqli_query($conexao, $sql)) {
        header("Location: ../../fornecedor/listar.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }
} else {
    echo "<h1>Nenhuma atualização foi realizada!</h1>";
}

mysqli_close($conexao);
?>

<a href="../../fornecedor/listar.php">Lista de fornecedores</a>
