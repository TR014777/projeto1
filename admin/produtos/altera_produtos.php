<?php

    require_once "config.inc.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $sql = "UPDATE produtos SET
            nome = '$nome',
            quantidade = '$quantidade',
            preco = '$preco'
            WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "<h2>Cadastro alterado com sucesso!</h2>";
        echo "<a class='btn btn-primary' href='?pg=produtos/admin_produtos'>Voltar</a>";
    }else{
        echo "<h2>Houve um erro na alteração.</h2>";
        echo "<a class='btn btn-primary' href='?pg=produtos/admin_produtos'>Voltar</a>";
    }