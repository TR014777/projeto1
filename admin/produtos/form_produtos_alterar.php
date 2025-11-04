<?php
    require_once "config.inc.php";
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);

    while ($produto = mysqli_fetch_array($resultado)){
        $id = $produto['id'];
        $nome = $produto['nome'];
        $quantidade = $produto['quantidade'];
        $preco = $produto['preco'];
    }
?>

<div class="container-fluid mt-3">
    <h2>Alteração do Produto</h2>
    <hr>
</div>
<form action="?pg=produtos/altera_produtos" method="post">
    <div class="mb-3">
        <label class="form-label">Nome do produto:</label>
        <input class="form-control" type="text" name="nome" placeholder="Digite o nome..">
    </div>
    <div class="mb-3">
        <label class="form-label">Quantidade:</label>
        <input class="form-control" type="number" name="quantidade" placeholder="---">
    </div>
    <div class="mb-3">
        <label class="form-label">Preço:</label>
        <input class="form-control" type="number" name="preco" placeholder="0,00">
    </div>
    <input class="btn btn-primary" type="submit" value="Cadastrar">
    <a class="btn btn-secondary" href='?pg=produtos/admin_produtos'>Voltar</a>
</form>