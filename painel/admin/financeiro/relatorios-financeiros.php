<?php
// painel/admin/financeiro/relatorios-financeiros.php - Relatórios Financeiros
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Relatórios Financeiros';
$pagina_atual = 'relatorios-financeiros';

// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS MOCKADOS PARA RELATÓRIOS =====
$resumo_financeiro = [
    'receita_total' => 8450000,
    'receita_mes' => 1245000,
    'receita_ano' => 8450000,
    'despesas_total' => 3250000,
    'despesas_mes' => 420000,
    'despesas_ano' => 3250000,
    'lucro_total' => 5200000,
    'lucro_mes' => 825000,
    'lucro_ano' => 5200000,
    'taxa_crescimento' => 15.2,
];

$dados_mensais = [
    ['mes' => 'Jan', 'receita' => 720000, 'despesa' => 350000],
    ['mes' => 'Fev', 'receita' => 680000, 'despesa' => 320000],
    ['mes' => 'Mar', 'receita' => 750000, 'despesa' => 380000],
    ['mes' => 'Abr', 'receita' => 800000, 'despesa' => 360000],
    ['mes' => 'Mai', 'receita' => 780000, 'despesa' => 340000],
    ['mes' => 'Jun', 'receita' => 850000, 'despesa' => 390000],
    ['mes' => 'Jul', 'receita' => 820000, 'despesa' => 370000],
    ['mes' => 'Ago', 'receita' => 900000, 'despesa' => 410000],
    ['mes' => 'Set', 'receita' => 880000, 'despesa' => 380000],
    ['mes' => 'Out', 'receita' => 920000, 'despesa' => 400000],
    ['mes' => 'Nov', 'receita' => 950000, 'despesa' => 420000],
    ['mes' => 'Dez', 'receita' => 1000000, 'despesa' => 450000],
];

$top_clientes = [
    ['cliente' => 'Construtora ABC', 'valor' => 2500000, 'percentual' => 29.6],
    ['cliente' => 'Mineração Progresso', 'valor' => 1800000, 'percentual' => 21.3],
    ['cliente' => 'Instituto Técnico de Luanda', 'valor' => 1200000, 'percentual' => 14.2],
    ['cliente' => 'Energia Futuro', 'valor' => 850000, 'percentual' => 10.1],
    ['cliente' => 'Carlos Mendes', 'valor' => 650000, 'percentual' => 7.7],
];

$distribuicao_categorias = [
    ['categoria' => 'Assinaturas', 'valor' => 5200000, 'percentual' => 61.5],
    ['categoria' => 'Projetos', 'valor' => 1800000, 'percentual' => 21.3],
    ['categoria' => 'Licenças', 'valor' => 850000, 'percentual' => 10.1],
    ['categoria' => 'Comissões', 'valor' => 350000, 'percentual' => 4.1],
    ['categoria' => 'Outros', 'valor' => 250000, 'percentual' => 3.0],
];

$metodos_pagamento = [
    ['metodo' => 'Multicaixa', 'valor' => 3200000, 'percentual' => 37.9],
    ['metodo' => 'Transferência Bancária', 'valor' => 2800000, 'percentual' => 33.1],
    ['metodo' => 'Cartão de Crédito', 'valor' => 1500000, 'percentual' => 17.8],
    ['metodo' => 'Depósito Bancário', 'valor' => 950000, 'percentual' => 11.2],
];

// ===== FUNÇÕES AUXILIARES =====
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y', strtotime($date));
}

function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

// Verificar página atual para o sidebar
$pagina_atual_sidebar = $pagina_atual;
?>
<!DOCTYPE html>
<html lang="pt">
<?php include "../../../includes/admin-financeiro-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR FINANCEIRO                         -->
        <!-- ========================================== -->
        <?php include "../../../includes/admin-financeiro-sidebar.php"; ?>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-file-alt icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Relatórios</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <a href="relatorio-gerar.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Gerar Relatório
                        </a>
                        <button class="btn btn-outline" onclick="exportarRelatorio()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                        <button class="btn btn-outline" onclick="window.location.reload()">
                            <i class="fas fa-sync-alt"></i> Atualizar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== PERÍODO ===== -->
            <div class="periodo-container">
                <div class="periodo-grid">
                    <div class="periodo-item">
                        <label class="periodo-label"><i class="fas fa-calendar-alt"></i> Período</label>
                        <select class="form-control" id="periodoRelatorio">
                            <option value="ultimo_mes">Último Mês</option>
                            <option value="ultimo_trimestre">Último Trimestre</option>
                            <option value="ultimo_semestre">Último Semestre</option>
                            <option value="ultimo_ano" selected>Último Ano</option>
                            <option value="personalizado">Personalizado</option>
                        </select>
                    </div>
                    <div class="periodo-item periodo-datas">
                        <div class="periodo-data">
                            <label class="periodo-label">De</label>
                            <input type="date" class="form-control" id="dataInicio" value="2025-01-01">
                        </div>
                        <div class="periodo-data">
                            <label class="periodo-label">Até</label>
                            <input type="date" class="form-control" id="dataFim" value="2025-12-31">
                        </div>
                    </div>
                    <div class="periodo-item periodo-actions">
                        <button class="btn btn-primary" onclick="aplicarFiltro()">
                            <i class="fas fa-filter"></i> Aplicar
                        </button>
                        <button class="btn btn-outline" onclick="limparFiltro()">
                            <i class="fas fa-times"></i> Limpar
                        </button>
                    </div>
                </div>
            </div>

            <!-- ===== CARDS RESUMO ===== -->
            <section class="stats-grid">
                <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                    <div class="icon blue"><i class="fas fa-arrow-up"></i></div>
                    <div class="value">Kz <?php echo formatMoney($resumo_financeiro['receita_total']); ?></div>
                    <div class="label">Receita Total</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> <?php echo $resumo_financeiro['taxa_crescimento']; ?>%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                    <div class="icon red"><i class="fas fa-arrow-down"></i></div>
                    <div class="value">Kz <?php echo formatMoney($resumo_financeiro['despesas_total']); ?></div>
                    <div class="label">Despesas Total</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 8.3%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                    <div class="icon green"><i class="fas fa-chart-line"></i></div>
                    <div class="value">Kz <?php echo formatMoney($resumo_financeiro['lucro_total']); ?></div>
                    <div class="label">Lucro Total</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 22.5%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                    <div class="icon yellow"><i class="fas fa-percent"></i></div>
                    <div class="value"><?php echo round(($resumo_financeiro['lucro_total'] / $resumo_financeiro['receita_total']) * 100); ?>%</div>
                    <div class="label">Margem de Lucro</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 5.2%</div>
                </div>
            </section>

            <!-- ===== GRÁFICOS ===== -->
            <div class="relatorios-grid">
                <!-- Gráfico: Evolução Mensal -->
                <div class="relatorio-card">
                    <div class="relatorio-card-header">
                        <h3><i class="fas fa-chart-bar"></i> Evolução Mensal</h3>
                        <span class="relatorio-periodo">Ano 2025</span>
                    </div>
                    <div class="relatorio-card-body">
                        <canvas id="chartEvolucaoMensal" height="200"></canvas>
                    </div>
                </div>

                <!-- Gráfico: Top Clientes -->
                <div class="relatorio-card">
                    <div class="relatorio-card-header">
                        <h3><i class="fas fa-users"></i> Top Clientes</h3>
                        <span class="relatorio-periodo">Por receita</span>
                    </div>
                    <div class="relatorio-card-body">
                        <canvas id="chartTopClientes" height="200"></canvas>
                    </div>
                </div>

                <!-- Gráfico: Distribuição por Categoria -->
                <div class="relatorio-card">
                    <div class="relatorio-card-header">
                        <h3><i class="fas fa-tags"></i> Por Categoria</h3>
                        <span class="relatorio-periodo">Distribuição</span>
                    </div>
                    <div class="relatorio-card-body">
                        <canvas id="chartCategorias" height="200"></canvas>
                    </div>
                </div>

                <!-- Gráfico: Métodos de Pagamento -->
                <div class="relatorio-card">
                    <div class="relatorio-card-header">
                        <h3><i class="fas fa-credit-card"></i> Métodos de Pagamento</h3>
                        <span class="relatorio-periodo">Distribuição</span>
                    </div>
                    <div class="relatorio-card-body">
                        <canvas id="chartMetodosPagamento" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- ===== TABELA DE DADOS MENSAIS ===== -->
            <div class="relatorio-container">
                <div class="section-header">
                    <h3><i class="fas fa-table"></i> Dados Mensais</h3>
                    <div class="section-actions">
                        <span class="dados-total">Total: <strong>Kz <?php echo formatMoney($resumo_financeiro['receita_total']); ?></strong></span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-relatorio">
                        <thead>
                            <tr>
                                <th>Mês</th>
                                <th style="text-align: right;">Receita</th>
                                <th style="text-align: right;">Despesa</th>
                                <th style="text-align: right;">Lucro</th>
                                <th style="text-align: center;">Crescimento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $lucro_anterior = 0;
                            foreach ($dados_mensais as $dado): 
                                $lucro = $dado['receita'] - $dado['despesa'];
                                $crescimento = $lucro_anterior > 0 ? round((($lucro - $lucro_anterior) / $lucro_anterior) * 100, 1) : 0;
                                $lucro_anterior = $lucro;
                            ?>
                            <tr>
                                <td><strong><?php echo $dado['mes']; ?></strong></td>
                                <td style="text-align: right; color: #00D2FF;">Kz <?php echo formatMoney($dado['receita']); ?></td>
                                <td style="text-align: right; color: #FF6B6B;">Kz <?php echo formatMoney($dado['despesa']); ?></td>
                                <td style="text-align: right; font-weight: 600; color: #00FFA3;">Kz <?php echo formatMoney($lucro); ?></td>
                                <td style="text-align: center;">
                                    <?php if ($crescimento > 0): ?>
                                        <span style="color: #00FFA3;"><i class="fas fa-arrow-up"></i> <?php echo $crescimento; ?>%</span>
                                    <?php elseif ($crescimento < 0): ?>
                                        <span style="color: #FF6B6B;"><i class="fas fa-arrow-down"></i> <?php echo abs($crescimento); ?>%</span>
                                    <?php else: ?>
                                        <span style="color: var(--text-muted);">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td style="text-align: right; font-weight: 700; color: #00D2FF;">
                                    Kz <?php echo formatMoney(array_sum(array_column($dados_mensais, 'receita'))); ?>
                                </td>
                                <td style="text-align: right; font-weight: 700; color: #FF6B6B;">
                                    Kz <?php echo formatMoney(array_sum(array_column($dados_mensais, 'despesa'))); ?>
                                </td>
                                <td style="text-align: right; font-weight: 700; color: #00FFA3;">
                                    Kz <?php echo formatMoney(array_sum(array_column($dados_mensais, 'receita')) - array_sum(array_column($dados_mensais, 'despesa'))); ?>
                                </td>
                                <td style="text-align: center;">—</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- ===== BOTÕES DE AÇÃO ===== -->
            <div class="relatorio-actions">
                <button class="btn btn-primary" onclick="gerarRelatorioPDF()">
                    <i class="fas fa-file-pdf"></i> Gerar PDF
                </button>
                <button class="btn btn-success" onclick="gerarRelatorioExcel()">
                    <i class="fas fa-file-excel"></i> Gerar Excel
                </button>
                <button class="btn btn-outline" onclick="exportarRelatorio()">
                    <i class="fas fa-file-export"></i> Exportar CSV
                </button>
                <button class="btn btn-outline" onclick="imprimirRelatorio()">
                    <i class="fas fa-print"></i> Imprimir
                </button>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../../assets/js/main.js"></script>
    <script>
        

        // ==========================================
        // DADOS PARA GRÁFICOS
        // ==========================================
        const dadosMensais = <?php echo json_encode($dados_mensais); ?>;
        const topClientes = <?php echo json_encode($top_clientes); ?>;
        const distribuicaoCategorias = <?php echo json_encode($distribuicao_categorias); ?>;
        const metodosPagamento = <?php echo json_encode($metodos_pagamento); ?>;

        // ==========================================
        // INICIALIZAR GRÁFICOS
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            iniciarGraficos();
        });

        function iniciarGraficos() {
            // Gráfico 1: Evolução Mensal
            const ctx1 = document.getElementById('chartEvolucaoMensal').getContext('2d');
            const meses = dadosMensais.map(d => d.mes);
            const receitas = dadosMensais.map(d => d.receita);
            const despesas = dadosMensais.map(d => d.despesa);
            const lucros = dadosMensais.map(d => d.receita - d.despesa);

            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: meses,
                    datasets: [
                        {
                            label: 'Receita',
                            data: receitas,
                            backgroundColor: 'rgba(0, 210, 255, 0.7)',
                            borderColor: '#00D2FF',
                            borderWidth: 2,
                            borderRadius: 4
                        },
                        {
                            label: 'Despesa',
                            data: despesas,
                            backgroundColor: 'rgba(255, 107, 107, 0.7)',
                            borderColor: '#FF6B6B',
                            borderWidth: 2,
                            borderRadius: 4
                        },
                        {
                            label: 'Lucro',
                            data: lucros,
                            type: 'line',
                            backgroundColor: 'rgba(0, 255, 163, 0.1)',
                            borderColor: '#00FFA3',
                            borderWidth: 3,
                            pointBackgroundColor: '#00FFA3',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: '#8A94A6',
                                usePointStyle: true,
                                padding: 12,
                                boxWidth: 10
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(255,255,255,0.05)' },
                            ticks: {
                                color: '#8A94A6',
                                callback: function(value) {
                                    return 'Kz ' + value.toLocaleString('pt-PT');
                                }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: '#8A94A6' }
                        }
                    }
                }
            });

            // Gráfico 2: Top Clientes
            const ctx2 = document.getElementById('chartTopClientes').getContext('2d');
            const cores = ['#00D2FF', '#FFD93D', '#FF6B6B', '#6C2BD9', '#00FFA3'];

            new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: topClientes.map(c => c.cliente),
                    datasets: [{
                        data: topClientes.map(c => c.valor),
                        backgroundColor: cores.slice(0, topClientes.length),
                        borderWidth: 2,
                        borderColor: 'transparent'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#8A94A6',
                                usePointStyle: true,
                                padding: 10,
                                boxWidth: 10,
                                font: { size: 11 }
                            }
                        }
                    },
                    cutout: '65%'
                }
            });

            // Gráfico 3: Distribuição por Categoria
            const ctx3 = document.getElementById('chartCategorias').getContext('2d');
            const coresCategorias = ['#00D2FF', '#FFD93D', '#6C2BD9', '#FF6B6B', '#00FFA3'];

            new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: distribuicaoCategorias.map(c => c.categoria),
                    datasets: [{
                        data: distribuicaoCategorias.map(c => c.valor),
                        backgroundColor: coresCategorias,
                        borderWidth: 2,
                        borderColor: 'transparent'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#8A94A6',
                                usePointStyle: true,
                                padding: 10,
                                boxWidth: 10,
                                font: { size: 11 }
                            }
                        }
                    }
                }
            });

            // Gráfico 4: Métodos de Pagamento
            const ctx4 = document.getElementById('chartMetodosPagamento').getContext('2d');
            const coresMetodos = ['#00D2FF', '#FFD93D', '#6C2BD9', '#00FFA3'];

            new Chart(ctx4, {
                type: 'doughnut',
                data: {
                    labels: metodosPagamento.map(m => m.metodo),
                    datasets: [{
                        data: metodosPagamento.map(m => m.valor),
                        backgroundColor: coresMetodos,
                        borderWidth: 2,
                        borderColor: 'transparent'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#8A94A6',
                                usePointStyle: true,
                                padding: 10,
                                boxWidth: 10,
                                font: { size: 11 }
                            }
                        }
                    },
                    cutout: '60%'
                }
            });
        }

        // ==========================================
        // TOGGLE SIDEBAR
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.toggle('open');
                    if (overlay) overlay.classList.toggle('active');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                });
            }

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal.active').forEach(modal => {
                        fecharModal(modal.id);
                    });
                }
            });
        });

        // ==========================================
        // TOGGLE SIDEBAR MOBILE
        // ==========================================
        function toggleSidebarMobile(event) {
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }

            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (sidebar) {
                sidebar.classList.toggle('open');
                if (overlay) overlay.classList.toggle('active');

                const menuBtn = document.getElementById('bottomMenuToggle');
                if (menuBtn) {
                    const icon = menuBtn.querySelector('i');
                    icon.className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
                }
            }
        }

        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.getElementById('bottomMenuToggle');

            if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
                if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
                    sidebar.classList.remove('open');
                    document.getElementById('sidebarOverlay')?.classList.remove('active');
                    if (menuBtn) {
                        const icon = menuBtn.querySelector('i');
                        if (icon) icon.className = 'fas fa-bars';
                    }
                }
            }
        });

        // ==========================================
        // NOTIFICAÇÕES
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            const btnNotif = document.getElementById('btnNotificacoes');
            const dropdown = document.getElementById('notificacoesDropdown');

            if (btnNotif && dropdown) {
                btnNotif.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                    if (dropdown.classList.contains('active')) {
                        carregarNotificacoes();
                    }
                });

                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }
        });

        function carregarNotificacoes() {
            const list = document.getElementById('notifList');
            if (!list) return;

            const naoLidas = mockNotificacoes.filter(n => !n.lida);
            const todas = mockNotificacoes;

            let html = '';

            if (naoLidas.length > 0) {
                html += '<div class="notif-group"><span class="notif-group-label">Não lidas</span>';
                naoLidas.forEach(n => {
                    html += criarNotificacaoItem(n);
                });
                html += '</div>';
            }

            const lidas = mockNotificacoes.filter(n => n.lida);
            if (lidas.length > 0) {
                html += '<div class="notif-group"><span class="notif-group-label">Lidas</span>';
                lidas.forEach(n => {
                    html += criarNotificacaoItem(n);
                });
                html += '</div>';
            }

            if (todas.length === 0) {
                html = `
                    <div class="notificacao-vazia">
                        <i class="fas fa-bell-slash"></i>
                        <p>Nenhuma notificação</p>
                    </div>
                `;
            }

            list.innerHTML = html;
        }

        function criarNotificacaoItem(notif) {
            return `
                <div class="notificacao-item ${notif.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${notif.id})">
                    <div class="notif-icon ${notif.icon_class}">
                        <i class="fas ${notif.icon}"></i>
                    </div>
                    <div class="notif-conteudo">
                        <p>${notif.mensagem}</p>
                        <span class="notif-tempo">${notif.tempo}</span>
                    </div>
                    ${!notif.lida ? '<span class="notif-dot"></span>' : ''}
                </div>
            `;
        }

        function marcarNotificacaoLida(id) {
            const notif = mockNotificacoes.find(n => n.id === id);
            if (notif) {
                notif.lida = true;
                atualizarBadge();
                carregarNotificacoes();
                mostrarToast('Notificação marcada como lida', 'info');
            }
        }

        function marcarTodasLidas() {
            mockNotificacoes.forEach(n => n.lida = true);
            atualizarBadge();
            carregarNotificacoes();
            mostrarToast('Todas as notificações foram marcadas como lidas', 'success');
            closeNotifications();
        }

        function atualizarBadge() {
            const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
            const badge = document.getElementById('notifBadge');
            const bottomBadge = document.getElementById('bottomNotifBadge');

            if (badge) {
                badge.textContent = naoLidas;
                badge.style.display = naoLidas > 0 ? 'flex' : 'none';
            }

            if (bottomBadge) {
                bottomBadge.textContent = naoLidas;
                bottomBadge.style.display = naoLidas > 0 ? 'flex' : 'none';
            }
        }

        function closeNotifications() {
            const dropdown = document.getElementById('notificacoesDropdown');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }

        // ==========================================
        // PERFIL
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            const btnPerfil = document.getElementById('btnPerfil');
            const dropdown = document.getElementById('perfilDropdown');

            if (btnPerfil && dropdown) {
                btnPerfil.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                });

                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnPerfil.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }

            const themeToggle = document.querySelector('.perfil-dropdown .theme-toggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('btnTheme')?.click();
                    dropdown.classList.remove('active');
                });
            }
        });

        // ==========================================
        // THEME DARK/LIGHT
        // ==========================================
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const btnTheme = document.getElementById('btnTheme');
            if (btnTheme) {
                btnTheme.addEventListener('click', function(e) {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    const themeLabel = document.querySelector('.perfil-dropdown .theme-toggle');
                    if (themeLabel) {
                        themeLabel.innerHTML = newTheme === 'dark' ?
                            '<i class="fas fa-moon"></i> Tema Escuro' :
                            '<i class="fas fa-sun"></i> Tema Claro';
                    }

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ==========================================
        // TOAST
        // ==========================================
        function mostrarToast(mensagem, tipo = 'success') {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const icons = {
                success: 'fa-check-circle',
                error: 'fa-exclamation-circle',
                warning: 'fa-exclamation-triangle',
                info: 'fa-info-circle'
            };

            const colors = {
                success: '#00FFA3',
                error: '#FF6B6B',
                warning: '#FFD93D',
                info: '#00D2FF'
            };

            const toast = document.createElement('div');
            toast.className = 'toast toast-' + tipo;
            toast.innerHTML = `
                <div class="toast-content">
                    <i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i>
                    <span>${mensagem}</span>
                </div>
                <button class="toast-close" onclick="this.parentElement.remove()">&times;</button>
            `;

            container.appendChild(toast);

            requestAnimationFrame(() => {
                toast.style.transform = 'translateX(0)';
                toast.style.opacity = '1';
            });

            setTimeout(() => {
                if (toast.parentElement) {
                    toast.style.transform = 'translateX(100%)';
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 300);
                }
            }, 4000);
        }

        // ==========================================
        // AÇÕES DO RELATÓRIO
        // ==========================================
        function aplicarFiltro() {
            mostrarToast('Filtro aplicado com sucesso!', 'success');
        }

        function limparFiltro() {
            document.getElementById('periodoRelatorio').value = 'ultimo_ano';
            document.getElementById('dataInicio').value = '2025-01-01';
            document.getElementById('dataFim').value = '2025-12-31';
            mostrarToast('Filtros limpos', 'info');
        }

        function exportarRelatorio() {
            mostrarToast('A exportar relatório...', 'info');
            setTimeout(() => {
                mostrarToast('Relatório exportado com sucesso!', 'success');
            }, 1500);
        }

        function gerarRelatorioPDF() {
            mostrarToast('A gerar PDF...', 'info');
            setTimeout(() => {
                mostrarToast('PDF gerado com sucesso!', 'success');
            }, 1500);
        }

        function gerarRelatorioExcel() {
            mostrarToast('A gerar Excel...', 'info');
            setTimeout(() => {
                mostrarToast('Excel gerado com sucesso!', 'success');
            }, 1500);
        }

        function imprimirRelatorio() {
            window.print();
        }

        // ==========================================
        // MODAIS
        // ==========================================
        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        function abrirModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }
    </script>

    <style>
        /* ========================================== */
        /* RELATÓRIOS FINANCEIROS - CSS               */
        /* ========================================== */

        /* ===== PERÍODO ===== */
        .periodo-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .periodo-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .periodo-grid {
            display: grid;
            grid-template-columns: 1fr 2fr auto;
            gap: var(--space-md);
            align-items: end;
        }

        .periodo-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .periodo-label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .periodo-label i {
            font-size: 12px;
        }

        .periodo-datas {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
        }

        .periodo-actions {
            display: flex;
            flex-direction: row;
            gap: var(--space-sm);
            padding-bottom: 1px;
        }

        .periodo-actions .btn {
            white-space: nowrap;
        }

        /* ===== RELATÓRIOS GRID ===== */
        .relatorios-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .relatorio-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .relatorio-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .relatorio-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .relatorio-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .relatorio-card-header h3 i {
            color: #FFD93D;
        }

        .relatorio-periodo {
            font-size: var(--text-xs);
            color: var(--text-muted);
            background: var(--bg-input);
            padding: 2px 10px;
            border-radius: var(--radius-full);
        }

        .relatorio-card-body {
            padding: 20px;
            height: 240px;
            position: relative;
        }

        /* ===== TABELA RELATÓRIO ===== */
        .relatorio-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .relatorio-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .table-relatorio {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
        }

        .table-relatorio thead {
            background: var(--bg-input);
        }

        .table-relatorio thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 10px 14px;
            border-bottom: 2px solid var(--border-color);
        }

        .table-relatorio tbody td {
            padding: 8px 14px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
        }

        .table-relatorio tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-relatorio tbody tr:last-child td {
            border-bottom: none;
        }

        .table-relatorio tfoot td {
            padding: 10px 14px;
            border-top: 2px solid var(--border-color);
            font-weight: 600;
            color: var(--text-primary);
        }

        /* ===== BOTÕES DE AÇÃO ===== */
        .relatorio-actions {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            margin-bottom: var(--space-lg);
        }

        .relatorio-actions .btn {
            padding: 8px 20px;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1200px) {
            .relatorios-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 992px) {
            .periodo-grid {
                grid-template-columns: 1fr 1fr;
            }
            .periodo-datas {
                grid-column: 1 / 3;
            }
            .periodo-actions {
                grid-column: 1 / 3;
                justify-content: flex-end;
            }
        }

        @media (max-width: 768px) {
            .relatorios-grid {
                grid-template-columns: 1fr;
            }

            .periodo-grid {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }
            .periodo-datas {
                grid-column: 1;
            }
            .periodo-actions {
                grid-column: 1;
                justify-content: stretch;
            }
            .periodo-actions .btn {
                flex: 1;
                justify-content: center;
            }

            .relatorio-card-body {
                height: 200px;
            }

            .relatorio-actions {
                flex-direction: column;
            }
            .relatorio-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .periodo-container {
                padding: var(--space-sm);
            }
            .relatorio-container {
                padding: var(--space-sm);
            }
            .relatorio-card-body {
                height: 180px;
                padding: 14px;
            }
            .relatorio-card-header {
                padding: 12px 14px;
            }
        }

        /* ========================================== */
        /* SCROLLBAR PERSONALIZADO                    */
        /* ========================================== */

        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }

        ::-webkit-scrollbar-thumb {
            background: #FFD93D;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #F5C842;
        }

        /* ========================================== */
/* PERÍODO - FILTROS CORRIGIDOS               */
/* ========================================== */

.periodo-container {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--space-lg);
    border: 1px solid var(--border-color);
    margin-bottom: var(--space-lg);
    transition: var(--transition-smooth);
}

.periodo-container:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.periodo-grid {
    display: grid;
    grid-template-columns: 1fr 2fr auto;
    gap: var(--space-md);
    align-items: end;
}

.periodo-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.periodo-label {
    font-size: var(--text-xs);
    font-weight: 500;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 6px;
}

.periodo-label i {
    font-size: 12px;
}

.periodo-datas {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-sm);
}

.periodo-data {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.periodo-data .periodo-label {
    font-size: var(--text-xs);
    font-weight: 500;
    color: var(--text-muted);
}

.periodo-actions {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: var(--space-sm);
    padding-bottom: 1px;
    flex-wrap: wrap;
}

.periodo-actions .btn {
    white-space: nowrap;
    padding: 8px 16px;
}

/* ===== FORMULÁRIO - COMPATIBILIDADE ===== */
.form-control {
    width: 100%;
    background: var(--bg-input);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-sm);
    padding: 8px 12px;
    font-size: var(--text-sm);
    color: var(--text-primary);
    font-family: var(--font-body);
    transition: var(--transition-smooth);
}

.form-control:focus {
    outline: none;
    border-color: #FFD93D;
    box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
}

.form-control::placeholder {
    color: var(--text-muted);
}

select.form-control {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 36px;
    cursor: pointer;
}

select.form-control option {
    background: var(--bg-card);
    color: var(--text-primary);
    padding: 8px;
}

input[type="date"].form-control {
    min-height: 38px;
}

/* ========================================== */
/* RESPONSIVIDADE - PERÍODO                   */
/* ========================================== */

@media (max-width: 1200px) {
    .periodo-grid {
        grid-template-columns: 1fr 2fr auto;
    }
}

@media (max-width: 992px) {
    .periodo-grid {
        grid-template-columns: 1fr 1fr;
    }
    .periodo-datas {
        grid-column: 1 / 3;
    }
    .periodo-actions {
        grid-column: 1 / 3;
        justify-content: flex-end;
    }
}

@media (max-width: 768px) {
    .periodo-grid {
        grid-template-columns: 1fr;
        gap: var(--space-sm);
    }
    
    .periodo-item {
        width: 100%;
    }
    
    .periodo-datas {
        grid-column: 1;
        grid-template-columns: 1fr 1fr;
    }
    
    .periodo-actions {
        grid-column: 1;
        justify-content: stretch;
        flex-wrap: wrap;
    }
    
    .periodo-actions .btn {
        flex: 1;
        justify-content: center;
        min-width: 80px;
    }

    .periodo-container {
        padding: var(--space-sm);
    }
}

@media (max-width: 480px) {
    .periodo-datas {
        grid-template-columns: 1fr;
    }
    
    .periodo-actions {
        flex-direction: column;
        width: 100%;
    }
    
    .periodo-actions .btn {
        width: 100%;
        flex: none;
    }

    .periodo-container {
        padding: var(--space-sm);
    }
}
    </style>
</body>
</html>