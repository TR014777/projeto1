<p>
    <a href="?pg=form_fornecedores">Cadastrar novo fornecedor</a>
</p>

<h2>Lista de Fornecedores</h2>

<?php

    require_once "config.inc.php";

    $sql = "SELECT * FROM fornecedores";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($dados = mysqli_fetch_array($resultado)) {


            echo "<br>===============<br>";
            echo "ID: {$dados['id']} | ";
            echo "Nome: {$dados['nome']} | ";
            echo "Empresa: {$dados['empresa']} | ";
            echo "Telefone: {$dados['telefone']} | ";
            echo "Email: {$dados['email']}";
            echo " | <a href='?pg=fornecedores/form_fornecedores_alterar&id={$dados['id']}'>Alterar</a>";
            echo " | <a href='?pg=fornecedores/delete_fornecedores&id={$dados['id']}'>Excluir</a>";
            echo "<br>=============<br>";
        }
    }else {
        echo "<br><h2>Nenhum fornecedor encontrado!</h2><br>";
    }
?>
