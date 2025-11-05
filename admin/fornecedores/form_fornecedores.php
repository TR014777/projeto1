<div class="container-fluid mt-3">
    <h2>Cadástro do Fornecedor</h2>
    <hr>
</div>
<form action="?pg=fornecedores/cadastra_fornecedores" method="post">
    <div class="mb-3">
        <label class="form-label">Nome do fornecedor:</label>
        <input class="form-control" type="text" name="nome" placeholder="Digite o nome..">
    </div>
    <div class="mb-3">
        <label class="form-label">Empresa:</label>
        <input class="form-control" type="text" name="empresa" placeholder="Digite qual empresa..">
    </div>
    <div class="mb-3">
        <label class="form-label">Telefone:</label>
        <input class="form-control" type="tel" name="telefone" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}"placeholder="88 98888-8888">
    </div>
    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input class="form-control" type="email" name="email" placeholder="Digite o email..">
    </div>
    <input class="btn btn-primary" type="submit" value="Cadastrar">
    <a class="btn btn-secondary" href='?pg=fornecedores/admin_fornecedores'>Voltar</a>
</form>