<?php
require_once "config.inc.php";

// Total de clientes
$sql_cli_total = "SELECT COUNT(*) AS total_clientes FROM clientes";
$res_cli = mysqli_query($conexao, $sql_cli_total);
$total_clientes = mysqli_fetch_assoc($res_cli)['total_clientes'] ?? 0;

// Total de fornecedores
$sql_forn = "SELECT COUNT(*) AS total_fornecedores FROM fornecedores";
$res_forn = mysqli_query($conexao, $sql_forn);
$total_fornecedores = mysqli_fetch_assoc($res_forn)['total_fornecedores'] ?? 0;

// Total de produtos
$sql_prod = "SELECT COUNT(*) AS total_produtos FROM produtos";
$res_prod = mysqli_query($conexao, $sql_prod);
$total_produtos = mysqli_fetch_assoc($res_prod)['total_produtos'] ?? 0;

// Labels simulando meses ou períodos para o gráfico
/*$labels = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun"];

// Dados simulando crescimento para testes do gráfico
$dados_clientes = [2, 4, 6, 8, 10, $total_clientes];
$dados_produtos = [1, 2, 3, 5, 7, $total_produtos];
$dados_fornecedores = [1, 1, 2, 3, 4, $total_fornecedores];
?> */

// Dados do gráfico
$labels = ["Clientes", "Produtos", "Fornecedores"];
$dados_clientes = [$total_clientes, $total_produtos, $total_fornecedores];
$dados_produtos = [$total_produtos, $total_produtos, $total_produtos]; // criando mais dois arrays para o chartjs poder interpretar e criar as linhas do gráfico
$dados_fornecedores = [$total_fornecedores, $total_fornecedores, $total_fornecedores];

<div class="container mt-3">
  <h3 class="mb-4 text-center text-secondary">Dashboard</h3>

  <!-- Cards-->
  <div class="row text-center mb-4">
    <div class="col-md-4 mb-3">
      <div class="card border-0 shadow-sm" style="background-color: #e8f0fe;">
        <div class="card-body py-3">
          <h6 class="text-muted mb-1">Clientes</h6>
          <h4 class="fw-bold text-dark mb-0"><?= $total_clientes ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card border-0 shadow-sm" style="background-color: #e8f0fe;">
        <div class="card-body py-3">
          <h6 class="text-muted mb-1">Fornecedores</h6>
          <h4 class="fw-bold text-dark mb-0"><?= $total_fornecedores ?></h4>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <div class="card border-0 shadow-sm" style="background-color: #e8f0fe;">
        <div class="card-body py-3">
          <h6 class="text-muted mb-1">Data Atual</h6>
          <h4 class="fw-bold text-dark mb-0"><?= date('d/m/Y') ?></h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Gráfico-->
  <div class="card border-0 shadow-sm mb-5">
    <div class="card-body">
      <h6 class="text-muted mb-3">Gráfico de Crescimento do Sistema</h6>
      <canvas id="graficoLinha" height="100"></canvas>
    </div>
  </div>
</div>

<!-- Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('graficoLinha').getContext('2d');

new Chart(ctx, {
  type: 'line', // Gráfico de linha
  data: {
    labels: <?= json_encode($labels) ?>,
    datasets: [
      {
        label: 'Clientes',
        data: <?= json_encode($dados_clientes) ?>,
        borderColor: '#007bff',
        backgroundColor: 'rgba(0,123,255,0.3)',
        tension: 0.4,
        fill: true,
        pointRadius: 5
      },
      {
        label: 'Produtos',
        data: <?= json_encode($dados_produtos) ?>,
        borderColor: '#28a745',
        backgroundColor: 'rgba(40,167,69,0.3)',
        tension: 0.4,
        fill: true,
        pointRadius: 5
      },
      {
        label: 'Fornecedores',
        data: <?= json_encode($dados_fornecedores) ?>,
        borderColor: '#ffc107',
        backgroundColor: 'rgba(255,193,7,0.3)',
        tension: 0.4,
        fill: true,
        pointRadius: 5
      }
    ]
  },
  options: {
    plugins: {
      legend: { position: 'top' }
    },
    scales: {
      x: { grid: { display: false } },
      y: { beginAtZero: true, stacked: true, grid: { color: '#eee' } }
    }
  }
});
</script>