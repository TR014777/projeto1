<?php

    require_once "config.inc.php";

    $sql = "INSERT INTO  produtos (nome, quantidade, preco)VALUES (
            '$_POST[nome]','$_POST[quantidade]','$_POST[preco]')";

    $execute = mysqli_query($conexao, $sql);

    if ($execute) {
        echo "<br><h2>Produto cadastrado com sucesso!</h2><br>";
        echo "<a class='btn btn-primary' href='?pg=produtos/admin_produtos'>Voltar</a>";
    }else{
        echo "<h2>Houve um erro ao cadastrar o produto!</h2><br>";
    }