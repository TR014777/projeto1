<?php

    require_once "config.inc.php";

    $sql = "INSERT INTO fornecedores (nome, empresa, telefone, email)
        VALUES ('{$_POST['nome']}', '{$_POST['empresa']}', '{$_POST['telefone']}', '{$_POST['email']}')";

    $execute = mysqli_query($conexao, $sql);

    if ($execute) {
    
    echo "<h2>Fornecedor cadastrado com sucesso!</h2>";
    echo "<a class='btn btn-primary' href='?pg=fornecedores/admin_fornecedores'>Voltar</a>";
    }else {
    echo "<h2>Erro ao cadastrar fornecedor!</h2>";
    echo "<a class='btn btn-primary' href='?pg=fornecedores/admin_fornecedores'>Voltar</a>";
    }
?>
