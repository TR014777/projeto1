<?php

require_once "config.inc.php";

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
<div class="container-fluid mt-3">
    <h2>Alteração do Fornecedor</h2>
    <hr>
</div>
<form action="?pg=fornecedores/altera_fornecedores" method="post">
    <div class="mb-3">
        <label class="form-label">Nome do fornecedor:</label>
        <input class="form-control" type="text" name="nome" placeholder="Digite o nome..">
    </div>
    <div class="mb-3">
        <label class="form-label">Empresa:</label>
        <input class="form-control" type="text" name="nome" placeholder="Digite qual empresa..">
    </div>
    <div class="mb-3">
        <label class="form-label">Telefone:</label>
        <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}"placeholder="88 98888-8888">
    </div>
    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input class="form-control" type="email" name="email" placeholder="Digite o email..">
    </div>
    <input class="btn btn-primary" type="submit" value="Alterar">
    <a class="btn btn-secondary" href='?pg=fornecedores/admin_fornecedores'>Voltar</a>
</form>
