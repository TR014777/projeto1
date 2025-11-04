<?php

require_once "config.inc.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$empresa = $_POST['empresa'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$sql = "UPDATE fornecedores SET
        nome = '$nome',
        empresa = '$empresa',
        telefone = '$telefone',
        email = '$email'
        WHERE id = '$id'";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    
    echo "<h2>Fornecedor alterado com sucesso!</h2>";
    echo "<a class='btn btn-primary' href='?pg=fornecedores/admin_fornecedores'>Voltar</a>";
}else {
    echo "<h2>Erro ao alterar fornecedor!</h2>";
    echo "<a class='btn btn-primary' href='?pg=fornecedores/admin_fornecedores'>Voltar</a>";
}
?>
