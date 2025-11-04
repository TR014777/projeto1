<?php

require_once "admin/config.inc.php";

$sql = "SELECT * FROM fornecedores ORDER BY id DESC";
$resultado = mysqli_query($conexao, $sql);
?>
<div class="container mt-3">
  <h2>Fornecedores</h2>
  <p>Lista de fornecedores (somente visualização).</p>

  <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Empresa</th>
          <th>Telefone</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = mysqli_fetch_assoc($resultado)): ?>
        <tr>
          <td><?= htmlspecialchars($row['nome']) ?></td>
          <td><?= htmlspecialchars($row['empresa']) ?></td>
          <td><?= htmlspecialchars($row['telefone']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>Nenhum fornecedor encontrado.</p>
  <?php endif; ?>
</div>
