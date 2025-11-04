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
        echo "Cadastro Alterado com sucesso!";
        echo "<a class='btn btn-primary' href='?pg=admin_clientes'>Voltar</a>";
    }else{
        echo "Houve um erro na alteração.";
        echo "<a class='btn btn-primary' href='?pg=admin_clientes'>Voltar</a>";
    }