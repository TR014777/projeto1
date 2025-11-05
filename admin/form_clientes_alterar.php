<?php
    require_once "config.inc.php";
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM clientes WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);

    while ($cliente = mysqli_fetch_array($resultado)){
        $id = $cliente['id'];
        $nome = $cliente['nome'];
        $cidade = $cliente['cidade'];
        $estado = $cliente['estado'];
    }
?>
<div class="container-fluid mt-3">
    <h2>Alteração do Cliente</h2>
    <hr>
</div>
<form action="?pg=cadastra_clientes" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="mb-3">
        <label class="form-label">Nome do cliente:</label>
        <input class="form-control" type="text" name="nome" value="<?=$nome?>" placeholder="Digite o nome..">
    </div>
    <div class="mb-3">
        <label>Cidade:</label>
        <input class="form-control" type="text" name="cidade" value="<?=$cidade?>" placeholder="Digite a cidade..">
    </div>
    <div class="mb-3">
        <label>Estado:</label>
        <input class="form-control" type="text" name="estado" value="<?=$estado?>" placeholder="Digite o estado..">
    </div>
    <input class="btn btn-primary" type="submit" value="Alterar">
    <a class="btn btn-secondary" href='?pg=admin_clientes'>Voltar</a>
</form>