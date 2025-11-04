<div class="container-fluid mt-3">
    <h2>Lista de Clientes</h2>
    <hr>
</div>
<div class="container mt-3">
    <table class="table table-light table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th></th>
            <th><a class="btn btn-primary" href="?pg=form_clientes">Cadastrar novo cliente</a></th>
        </tr>
        </thead>
        <tbody>
        <?php
            require_once "config.inc.php";

            $sql = "SELECT * FROM clientes ";

            $resultado = mysqli_query($conexao, $sql);

            while($dados = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?=$dados['id']?></td>
            <td><?=$dados['nome']?></td>
            <td><?=$dados['cidade']?></td>
            <td><?=$dados['estado']?></td>
            <td><a class="btn btn-secondary" href='?pg=form_clientes_alterar&id=<?=$dados['id']?>'>Alterar</a></td>
            <td><a class="btn btn-secondary" href='?pg=delete_cliente&id=<?=$dados['id']?>'>Excluir</a></td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>