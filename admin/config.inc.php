<?php
// Conecta ao servidor MySQL
$conexao = mysqli_connect("localhost", "root", "");

// Verifica se a conexão foi bem-sucedida
if (!$conexao) {
    die("Conexão com o servidor falhou: " . mysqli_connect_error());
}

// Seleciona o banco de dados
$bd = mysqli_select_db($conexao, "projeto1");

// Verifica se o banco foi encontrado
if (!$bd) {
    die("Banco de dados não encontrado!");
}

// Se chegou até aqui, deu tudo certo
echo "Conexão com o banco 'projeto1' estabelecida com sucesso!";
?>