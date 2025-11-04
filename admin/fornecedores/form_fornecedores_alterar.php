<?php

require_once "../config.inc.php";

$id = $_REQUEST['id'];
$sql = "SELECT * FROM fornecedores WHERE id = $id"; //seleciona o fornecedor com o id, * indica a visualização de todas as colunas
$resultado = mysqli_query($conexao, $sql);

while ($fornecedor = mysqli_fetch_array($resultado)) {
    $nome = $fornecedor['nome'];
    $empresa = $fornecedor['empresa'];
    $telefone = $fornecedor['telefone'];
    $email = $fornecedor['email'];
}
?>

<form action="?pg=fornecedores/altera_fornecedores" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Nome do fornecedor:</label>
    <input type="text" name="nome" value="<?=$nome?>" required>

    <label>Empresa:</label>
    <input type="text" name="empresa" value="<?=$empresa?>">

    <label>Telefone:</label>
    <input type="text" name="telefone" value="<?=$telefone?>">

    <label>Email:</label>
    <input type="email" name="email" value="<?=$email?>">

    <input type="submit" value="Salvar alterações">
</form>
