<?php

    require_once "config.inc.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "UPDATE clientes SET
            nome = '$nome',
            cidade = '$cidade',
            estado = '$estado'
            WHERE id = '$id'";

    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        echo "<h2>Cadastro Alterado com sucesso!</h2>";
        echo "<a class='btn btn-primary' href='?pg=admin_clientes'>Voltar</a>";
    }else{
        echo "<h2>Houve um erro na alteração.</h2>";
        echo "<a class='btn btn-primary' href='?pg=admin_clientes'>Voltar</a>";
    }