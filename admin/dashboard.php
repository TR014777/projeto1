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

// Total de estoque
$sql = "SELECT nome, quantidade FROM produtos";
$res = mysqli_query($conexao, $sql);

$nomes_produtos = [];
$quantidades_produtos = [];
$total_estoque = 0;

while ($row = mysqli_fetch_assoc($res)) {
    $nomes_produtos[] = $row['nome'];
    $quantidades_produtos[] = $row['quantidade'];
    $total_estoque += $row['quantidade'];
}

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

?>

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
          <h6 class="text-muted mb-1">Produtos</h6>
          <h4 class="fw-bold text-dark mb-0"><?= $total_produtos ?></h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Gráfico-->
  <div class="row text-center mb-4">
  <div class="card border-0 shadow-sm mb-8 col-md-9">
    <div class="card-body">
      <h6 class="text-muted mb-3">Gráfico de Crescimento do Sistema</h6>
      <canvas id="graficoBarra" height="100"></canvas>
    </div>
  </div>
  
  <div class="col-md-3">
    <div class="card-body">
      <h6 class="text-muted mb-3">Distribuição do Estoque por Produto</h6>
      <canvas id="graficoEstoque" style="height: 30px; width: 30px;"></canvas>
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
</div>



<!-- Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('graficoBarra').getContext('2d');
// Gráfico de barras 
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($labels) ?>,
    datasets: [
      {
        label: 'Clientes',
        data: <?= json_encode($dados_clientes) ?>,
        backgroundColor: 'rgba(0, 123, 255, 0.7)',
        borderColor: '#007bff',
        borderWidth: 1,
        borderRadius: 5
      },
      {
        label: 'Produtos',
        data: <?= json_encode($dados_produtos) ?>,
        backgroundColor: 'rgba(40, 167, 69, 0.7)',
        borderColor: '#28a745',
        borderWidth: 1,
        borderRadius: 5
      },
      {
        label: 'Fornecedores',
        data: <?= json_encode($dados_fornecedores) ?>,
        backgroundColor: 'rgba(255, 193, 7, 0.8)',
        borderColor: '#ffc107',
        borderWidth: 1,
        borderRadius: 5
      }
    ]
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'bottom',
        labels: {
          color: '#555',
          boxWidth: 14,
          usePointStyle: true,
          pointStyle: 'rectRounded'
        }
      },
      title: {
        display: true,
        text: 'Crescimento de Clientes, Produtos e Fornecedores',
        color: '#333',
        font: {
          size: 16,
          weight: 'bold'
        }
      }
    },
    scales: {
      x: {
        grid: { display: false },
        ticks: { color: '#666' }
      },
      y: {
        beginAtZero: true,
        grid: { color: '#eee' },
        ticks: { color: '#666' }
      }
    }
  }
});

const textoCentro = {
  id: 'textoCentro',
  afterDraw(chart, args, options) {
    const {ctx, chartArea: {width, height}} = chart;
    ctx.save();
    ctx.font = 'bold 55px Arial';
    ctx.fillStyle = '#333';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(options.text, width / 2, height / 2);
  }
};

const ctxEstoque = document.getElementById('graficoEstoque').getContext('2d');

new Chart(ctxEstoque, {
  type: 'doughnut',
  data: {
    labels: <?= json_encode($nomes_produtos) ?>,
    datasets: [{
      data: <?= json_encode($quantidades_produtos) ?>,
      backgroundColor: [
        'rgba(0,123,255,0.6)',
        'rgba(40,167,69,0.6)',
        'rgba(255,193,7,0.6)',
        'rgba(255,99,132,0.6)',
        'rgba(153,102,255,0.6)',
        'rgba(255,159,64,0.6)',
        'rgba(23,162,184,0.6)',
        'rgba(111,66,193,0.6)',
        'rgba(255,205,86,0.6)'
      ],
      borderColor: '#fff',
      borderWidth: 2
    }]
  },
  options: {
    plugins: {
      legend: { position: 'bottom' },
      tooltip: {
        callbacks: {
          label: function(context) {
            return `${context.label}: ${context.formattedValue} unidades`;
          }
        }
      },
      textoCentro: {
        text: '<?= $total_estoque ?>'  // total no centro
      }
    },
    cutout: '50%' // tamanho do buraco central
  },
  plugins: [textoCentro]
});
</script>