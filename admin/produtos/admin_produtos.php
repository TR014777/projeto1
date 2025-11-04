<div class="container-fluid mt-3">
    <h2>Lista de Produtos</h2>
    <hr>
</div>
<div class="container mt-3">
    <table class="table table-light table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th></th>
            <th><a class="btn btn-primary" href="?pg=produtos/form_produtos">Cadastrar novo produto</a></th>
        </tr>
        </thead>
        <tbody>
        <?php
            require_once "config.inc.php";

            $sql = "SELECT * FROM produtos ";

            $resultado = mysqli_query($conexao, $sql);

            while($dados = mysqli_fetch_array($resultado)) {
        ?>
        <tr>
            <td><?=$dados['id']?></td>
            <td><?=$dados['nome']?></td>
            <td><?=$dados['quantidade']?></td>
            <td><?=$dados['preco']?></td>
            <td><a class="btn btn-secondary" href='?pg=produtos/form_produtos_alterar&id=<?=$dados['id']?>'>Alterar</a></td>
            <td><a class="btn btn-secondary" href='?pg=produtos/delete_produtos&id=<?=$dados['id']?>'>Excluir</a></td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>