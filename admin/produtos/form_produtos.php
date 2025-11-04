<div class="container-fluid mt-3">
    <h2>Cadástro do Produto</h2>
    <hr>
</div>
<form action="?pg=produtos/cadastra_produtos" method="post">
    <div class="mb-3">
        <label class="form-label">Nome do produto:</label>
        <input class="form-control" type="text" name="nome" placeholder="Digite o nome..">
    </div>
    <div class="mb-3">
        <label class="form-label">Quantidade:</label>
        <input class="form-control" type="number" name="quantidade" placeholder="---">
    </div>
    <div class="mb-3">
        <label class="form-label">Preço:</label>
        <input class="form-control" type="number" name="preco" placeholder="0,00">
    </div>
    <input class="btn btn-primary" type="submit" value="Cadastrar">
    <a class="btn btn-secondary" href='?pg=produtos/admin_produtos'>Voltar</a>
</form>