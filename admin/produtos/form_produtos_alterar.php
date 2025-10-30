<?php
    require_once "config.inc.php";
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);

    while ($produto = mysqli_fetch_array($resultado)){
        $id = $produto['id'];
        $nome = $produto['produto'];
        $quantidade = $produto['quantidade'];
        $preco = $produto['preco'];
    }
?>

<form action="?pg=altera_produtos" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Nome do produto:</label>
    <input type="text" name="produto" value="<?=$nome?>">
    <label>Quantidade:</label>
    <input type="text" name="quantidade" value="<?=$quantidade?>">
    <label>Preço:</label>
    <input type="text" name="preco" value="<?=$preco?>">
    <input type="submit" value="Cadastrar">
</form>