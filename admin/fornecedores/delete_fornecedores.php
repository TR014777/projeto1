<?php

require_once "../config.inc.php";

$id = $_GET['id'];

$sql = "DELETE FROM fornecedores WHERE id = '$id'";
$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    echo "<h2>Fornecedor excluído com sucesso!</h2>";
    echo "<a href='?pg=admin_fornecedores'>Voltar</a>";
}else {
    echo "<h2>Erro ao excluir fornecedor!</h2>";
    echo "<a href='?pg=admin_fornecedores'>Voltar</a>";
}
?>
