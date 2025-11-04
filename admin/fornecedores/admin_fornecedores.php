<div class="container-fluid mt-3">
    <h2>Lista de Fornecedores</h2>
    <hr>
</div>
<div class="container mt-3">
    <table class="table table-light table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Empresa</th>
            <th>Telefone</th>
            <th>Email</th>
            <th></th>
            <th><a class="btn btn-primary" href="?pg=fornecedores/form_fornecedores">Cadastrar novo fornecedor</a></th>
        </tr>
        </thead>
        <tbody>
        <?php
            require_once "config.inc.php";

            $sql = "SELECT * FROM fornecedores ";

            $resultado = mysqli_query($conexao, $sql);

            while($dados = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?=$dados['id']?></td>
            <td><?=$dados['nome']?></td>
            <td><?=$dados['empresa']?></td>
            <td><?=$dados['telefone']?></td>
            <td><?=$dados['email']?></td>
            <td><a class="btn btn-secondary" href="?pg=fornecedores/form_fornecedores_alterar&id=<?=$dados['id']?>">Alterar</a></td>
            <td><a class="btn btn-secondary" href="?pg=fornecedores/delete_fornecedores&id=<?=$dados['id']?>">Excluir</a></td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
