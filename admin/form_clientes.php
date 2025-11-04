<div class="container-fluid mt-3">
    <h2>Cadástro do Cliente</h2>
    <hr>
</div>
<form action="?pg=cadastra_clientes" method="post">
    <div class="mb-3">
        <label class="form-label">Nome do cliente:</label>
        <input class="form-control" type="text" name="nome" placeholder="Digite o nome..">
    </div>
    <div class="mb-3">
        <label>Cidade:</label>
        <input class="form-control" type="text" name="cidade" placeholder="Digite a cidade..">
    </div>
    <div class="mb-3">
        <label>Estado:</label>
        <input class="form-control" type="text" name="estado" placeholder="Digite o estado..">
    </div>
    <input class="btn btn-primary" type="submit" value="Cadastrar">
    <a class="btn btn-secondary" href='?pg=admin_clientes'>Voltar</a>
</form>