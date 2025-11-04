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
        echo "Cadastro Alterado com sucesso!";
        echo "<a class='btn btn-primary' href='?pg=produtos/admin_produtos'>Voltar</a>";
    }else{
        echo "Houve um erro na alteração.";
        echo "<a class='btn btn-primary' href='?pg=produtos/admin_produtos'>Voltar</a>";
    }