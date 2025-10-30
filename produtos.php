<?php

    require_once "admin/config.inc.php";
    $sql = "SELECT * FROM clientes";
    $resultado = mysqli_query($conexao, $sql);

?>
<div class="container mt-3">
    <h2>Produtos fornecidos pela Empresa</h2>
    <p>Estoque e preço de nossos produtos</p>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Qtd</th>
            <th>Preço</th>
        </tr>
        </thead>
        <tbody>
        <?php
            while($cliente = mysqli_fetch_array($resultado)){
        ?>
        <tr>
            <td><?=$cliente['produto']?></td>
            <td><?=$cliente['quantidade']?></td>
            <td><?=$cliente['preco']?></td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>