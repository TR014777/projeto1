<?php

    require_once "config.inc.php";

    $sql = "INSERT INTO  produtos (produto, quantidade, preco)VALUES (
            '$_POST[produto]','$_POST[quantidade]','$_POST[preco]')";

    $execute = mysqli_query($conexao, $sql);

    if ($execute) {
        echo "<br><h2>produto cadastrado com sucesso!</h2><br>";
        echo "<a href='?pg=admin_produtos'>Voltar</a>";
    }else{
        echo "<h2>Houve um erro ao cadastrar o produto!</h2><br>";
    }