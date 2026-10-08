<?php
// painel/individual/financeiro/index.php - Dashboard Financeiro
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Dashboard Financeiro';
$pagina_atual = 'financeiro';

// ============================================
// GARANTIR QUE AS VARIÁVEIS EXISTEM (FALLBACK)
// ============================================
if (!isset($valor_receber))              $valor_receber = 850000;
if (!isset($valor_pagar))                $valor_pagar = 320000;
if (!isset($saldo_atual))                $saldo_atual = 2150000;
if (!isset($faturamento_mes))            $faturamento_mes = 3450000;
if (!isset($faturamento_total))          $faturamento_total = 28500000;
if (!isset($total_transacoes))           $total_transacoes = 156;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;
if (!isset($total_faturas_pendentes))    $total_faturas_pendentes = 12;
if (!isset($total_orcamentos))           $total_orcamentos = 24;
if (!isset($total_clientes))             $total_clientes = 18;
if (!isset($total_metas))                $total_metas = 5;

// ============================================
// ESTATÍSTICAS FINANCEIRAS
// ============================================
$total_receitas = 4850000;
$total_despesas = 1400000;
$lucro_liquido = $total_receitas - $total_despesas;
$margem_lucro = round(($lucro_liquido / $total_receitas) * 100, 1);

$faturamento_mes_atual = 3450000;
$faturamento_mes_anterior = 2800000;
$variacao_mes = round((($faturamento_mes_atual - $faturamento_mes_anterior) / $faturamento_mes_anterior) * 100, 1);

// ============================================
// DADOS PARA GRÁFICOS
// ============================================
$faturamento_mensal = [
    'labels' => ['Set', 'Out', 'Nov', 'Dez', 'Jan', 'Fev'],
    'receitas' => [1800000, 2200000, 1950000, 2600000, 2900000, 3450000],
    'despesas' => [650000, 780000, 720000, 890000, 950000, 1050000]
];

$distribuicao_categorias = [
    'labels' => ['Projetos', 'Assinaturas', 'Comissões', 'Formação', 'Outros'],
    'values' => [1850000, 850000, 420000, 230000, 100000],
    'colors' => ['#6C2BD9', '#00D2FF', '#00FFA3', '#FFD93D', '#FF9F43']
];

// ============================================
// TRANSAÇÕES RECENTES
// ============================================
$transacoes_recentes = [
    [
        'id' => 1,
        'descricao' => 'Pagamento de Projeto - Zona Norte',
        'cliente' => 'Construtora ABC',
        'valor' => 350000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência',
        'data' => '2026-02-18 14:20:00',
        'status' => 'concluido'
    ],
    [
        'id' => 2,
        'descricao' => 'Comissão - Indicação Indústria Luanda',
        'cliente' => 'Indústria Luanda',
        'valor' => 45000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Multicaixa',
        'data' => '2026-02-18 10:15:00',
        'status' => 'concluido'
    ],
    [
        'id' => 3,
        'descricao' => 'Compra de Equipamento GPS',
        'cliente' => 'Fornecedor Topografia Lda',
        'valor' => 180000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'metodo' => 'Transferência',
        'data' => '2026-02-17 16:30:00',
        'status' => 'concluido'
    ],
    [
        'id' => 4,
        'descricao' => 'Assinatura Plano Pro - Mensal',
        'cliente' => 'Agro Negócios Lda',
        'valor' => 25000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Multicaixa',
        'data' => '2026-02-17 11:00:00',
        'status' => 'concluido'
    ],
    [
        'id' => 5,
        'descricao' => 'Reembolso - Deslocação Huambo',
        'cliente' => 'Carlos Mendes',
        'valor' => 35000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'metodo' => 'Numerário',
        'data' => '2026-02-16 15:45:00',
        'status' => 'pendente'
    ]
];

// ============================================
// FATURAS PENDENTES
// ============================================
$faturas_pendentes = [
    [
        'id' => 1,
        'numero' => 'FT-2026-0156',
        'cliente' => 'Município de Luanda',
        'valor' => 480000,
        'data_vencimento' => '2026-02-25',
        'status' => 'pendente',
        'dias_restantes' => 7
    ],
    [
        'id' => 2,
        'numero' => 'FT-2026-0150',
        'cliente' => 'Construtora XYZ',
        'valor' => 320000,
        'data_vencimento' => '2026-02-15',
        'status' => 'vencida',
        'dias_restantes' => -3
    ],
    [
        'id' => 3,
        'numero' => 'FT-2026-0158',
        'cliente' => 'Energia Futuro',
        'valor' => 195000,
        'data_vencimento' => '2026-02-28',
        'status' => 'pendente',
        'dias_restantes' => 10
    ]
];

// ============================================
// METAS FINANCEIRAS
// ============================================
$metas = [
    [
        'nome' => 'Meta Mensal de Faturamento',
        'valor_atual' => 3450000,
        'valor_meta' => 4000000,
        'percentual' => 86,
        'cor' => '#00FFA3'
    ],
    [
        'nome' => 'Meta de Novos Clientes',
        'valor_atual' => 8,
        'valor_meta' => 10,
        'percentual' => 80,
        'cor' => '#00D2FF'
    ],
    [
        'nome' => 'Meta de Projetos Concluídos',
        'valor_atual' => 12,
        'valor_meta' => 15,
        'percentual' => 80,
        'cor' => '#6C2BD9'
    ]
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date) {
        if (empty($date)) return 'N/A';
        return date('d/m/Y', strtotime($date));
    }
}

if (!function_exists('formatDateTime')) {
    function formatDateTime($datetime) {
        if (empty($datetime)) return 'N/A';
        return date('d/m/Y H:i', strtotime($datetime));
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo($datetime) {
        if (empty($datetime)) return 'N/A';
        $diff = time() - strtotime($datetime);
        if ($diff < 60) return 'há ' . $diff . 's';
        if ($diff < 3600) return 'há ' . floor($diff / 60) . 'min';
        if ($diff < 86400) return 'há ' . floor($diff / 3600) . 'h';
        if ($diff < 604800) return 'há ' . floor($diff / 86400) . ' dias';
        return date('d/m/Y', strtotime($datetime));
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../../includes/individual/financeiro-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <?php include "../../../includes/individual/financeiro-sidebar.php" ?>

        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-chart-pie icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Financeiro</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="transacao-criar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nova Transação
                    </a>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($total_receitas / 1000000, 1); ?>M</div>
                    <div class="label">Total de Receitas</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> +<?php echo $variacao_mes; ?>%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($total_despesas / 1000000, 1); ?>M</div>
                    <div class="label">Total de Despesas</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> -5.2%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($lucro_liquido / 1000000, 1); ?>M</div>
                    <div class="label">Lucro Líquido</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> Margem <?php echo $margem_lucro; ?>%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($valor_receber / 1000, 0); ?>k</div>
                    <div class="label">Valor a Receber</div>
                    <div class="trend down">
                        <i class="fas fa-clock"></i> <?php echo $total_faturas_pendentes; ?> faturas
                    </div>
                </div>
            </section>

            <!-- ===== CHARTS ===== -->
            <section class="charts-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="chart-card">
                    <div class="header">
                        <h3>
                            <i class="fas fa-chart-line" style="color: #00D2FF;"></i>
                            Receitas vs Despesas
                        </h3>
                        <select class="chart-period" id="chartPeriod">
                            <option value="6" selected>Últimos 6 meses</option>
                            <option value="12">Últimos 12 meses</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartReceitasDespesas"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <div class="header">
                        <h3>
                            <i class="fas fa-chart-pie" style="color: #00D2FF;"></i>
                            Distribuição por Categoria
                        </h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartDistribuicao"></canvas>
                    </div>
                </div>
            </section>

            <!-- ===== METAS ===== -->
            <section class="metas-section animate-fade-up" style="animation-delay: 0.15s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-bullseye" style="color: #FFD93D;"></i>
                        Metas Financeiras
                    </h3>
                    <a href="metas.php" class="btn btn-sm btn-outline">Ver todas</a>
                </div>
                <div class="metas-grid">
                    <?php foreach ($metas as $meta): ?>
                        <div class="meta-card">
                            <div class="meta-header">
                                <span class="meta-nome"><?php echo $meta['nome']; ?></span>
                                <span class="meta-percent" style="color: <?php echo $meta['cor']; ?>;">
                                    <?php echo $meta['percentual']; ?>%
                                </span>
                            </div>
                            <div class="meta-progresso">
                                <div class="meta-progresso-barra">
                                    <div class="meta-progresso-fill" 
                                         style="width: <?php echo $meta['percentual']; ?>%; background: <?php echo $meta['cor']; ?>;">
                                    </div>
                                </div>
                            </div>
                            <div class="meta-info">
                                <span class="meta-atual">
                                    <?php 
                                    if (is_numeric($meta['valor_atual']) && $meta['valor_atual'] > 1000) {
                                        echo 'Kz ' . formatMoney($meta['valor_atual']);
                                    } else {
                                        echo $meta['valor_atual'];
                                    }
                                    ?>
                                </span>
                                <span class="meta-target">
                                    de 
                                    <?php 
                                    if (is_numeric($meta['valor_meta']) && $meta['valor_meta'] > 1000) {
                                        echo 'Kz ' . formatMoney($meta['valor_meta']);
                                    } else {
                                        echo $meta['valor_meta'];
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ===== TWO COLUMNS ===== -->
            <section class="two-columns animate-fade-up" style="animation-delay: 0.2s;">
                <!-- Transações Recentes -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-exchange-alt" style="color: #00D2FF;"></i>
                            Transações Recentes
                        </h3>
                        <a href="transacoes.php" class="btn btn-sm btn-outline">Ver todas</a>
                    </div>
                    <div class="transacoes-list">
                        <?php foreach ($transacoes_recentes as $transacao): ?>
                            <div class="transacao-item" onclick="location.href='transacao-detalhe.php?id=<?php echo $transacao['id']; ?>'">
                                <div class="transacao-icon <?php echo $transacao['tipo']; ?>">
                                    <i class="fas fa-arrow-<?php echo $transacao['tipo'] === 'receita' ? 'up' : 'down'; ?>"></i>
                                </div>
                                <div class="transacao-conteudo">
                                    <span class="transacao-descricao"><?php echo $transacao['descricao']; ?></span>
                                    <span class="transacao-cliente">
                                        <i class="fas fa-user"></i> <?php echo $transacao['cliente']; ?>
                                    </span>
                                    <div class="transacao-meta">
                                        <span class="transacao-metodo">
                                            <i class="fas fa-credit-card"></i> <?php echo $transacao['metodo']; ?>
                                        </span>
                                        <span class="transacao-tempo">
                                            <i class="far fa-clock"></i> <?php echo timeAgo($transacao['data']); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="transacao-valor <?php echo $transacao['tipo']; ?>">
                                    <?php echo $transacao['tipo'] === 'receita' ? '+' : '-'; ?>
                                    Kz <?php echo formatMoney($transacao['valor']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Faturas Pendentes -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-file-invoice" style="color: #FFD93D;"></i>
                            Faturas Pendentes
                            <span class="badge badge-warning"><?php echo count($faturas_pendentes); ?></span>
                        </h3>
                        <a href="faturas.php" class="btn btn-sm btn-outline">Ver todas</a>
                    </div>
                    <div class="faturas-list">
                        <?php foreach ($faturas_pendentes as $fatura): 
                            $urgente = $fatura['dias_restantes'] <= 3;
                            $vencida = $fatura['dias_restantes'] < 0;
                        ?>
                            <div class="fatura-item <?php echo $vencida ? 'fatura-vencida' : ($urgente ? 'fatura-urgente' : ''); ?>"
                                 onclick="location.href='fatura-detalhe.php?id=<?php echo $fatura['id']; ?>'">
                                <div class="fatura-icon">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                                <div class="fatura-conteudo">
                                    <span class="fatura-numero"><?php echo $fatura['numero']; ?></span>
                                    <span class="fatura-cliente">
                                        <i class="fas fa-user"></i> <?php echo $fatura['cliente']; ?>
                                    </span>
                                    <div class="fatura-meta">
                                        <span class="fatura-vencimento">
                                            <i class="far fa-calendar"></i> <?php echo formatDate($fatura['data_vencimento']); ?>
                                        </span>
                                        <span class="fatura-dias <?php echo $vencida ? 'text-danger' : ($urgente ? 'text-warning' : ''); ?>">
                                            <?php 
                                            if ($vencida) {
                                                echo '<i class="fas fa-exclamation-triangle"></i> Vencida há ' . abs($fatura['dias_restantes']) . ' dias';
                                            } else {
                                                echo '<i class="fas fa-clock"></i> ' . $fatura['dias_restantes'] . ' dias restantes';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="fatura-valor">
                                    Kz <?php echo formatMoney($fatura['valor']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== QUICK ACTIONS ===== -->
            <section class="quick-actions animate-fade-up" style="animation-delay: 0.3s;">
                <h3>
                    <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                    Ações Rápidas
                </h3>
                <div class="actions-grid">
                    <a href="transacao-criar.php" class="action-item">
                        <div class="action-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <span class="action-label">Nova Transação</span>
                    </a>
                    <a href="fatura-criar.php" class="action-item">
                        <div class="action-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <span class="action-label">Emitir Fatura</span>
                    </a>
                    <a href="orcamento-criar.php" class="action-item">
                        <div class="action-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <span class="action-label">Novo Orçamento</span>
                    </a>
                    <a href="pagamento-criar.php" class="action-item">
                        <div class="action-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <span class="action-label">Registar Pagamento</span>
                    </a>
                    <a href="cliente-cadastrar.php" class="action-item">
                        <div class="action-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="action-label">Novo Cliente</span>
                    </a>
                    <a href="meta-criar.php" class="action-item">
                        <div class="action-icon" style="background: rgba(255, 159, 67, 0.15); color: #FF9F43;">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <span class="action-label">Nova Meta</span>
                    </a>
                    <a href="fluxo-caixa.php" class="action-item">
                        <div class="action-icon" style="background: rgba(0, 206, 201, 0.15); color: #00CEC9;">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <span class="action-label">Fluxo de Caixa</span>
                    </a>
                    <a href="relatorios-financeiros.php" class="action-item">
                        <div class="action-icon" style="background: rgba(107, 203, 119, 0.15); color: #6BCB77;">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <span class="action-label">Relatórios</span>
                    </a>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // TOGGLE SIDEBAR
        // ============================================
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
        });

        // ============================================
        // PERFIL DROPDOWN
        // ============================================
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
        });

        // ============================================
        // THEME
        // ============================================
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const btnTheme = document.getElementById('btnTheme');
            if (btnTheme) {
                btnTheme.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ============================================
        // TOAST
        // ============================================
        if (typeof window.mostrarToast === 'undefined') {
            window.mostrarToast = function(mensagem, tipo = 'success') {
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

                const existingToasts = container.querySelectorAll('.toast');
                if (existingToasts.length >= 5) existingToasts[0].remove();

                const toast = document.createElement('div');
                toast.className = 'toast toast-' + tipo;
                toast.innerHTML = `
                    <div class="toast-content">
                        <i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i>
                        <span>${mensagem}</span>
                    </div>
                    <button class="toast-close" onclick="this.parentElement.remove()" aria-label="Fechar">&times;</button>
                `;

                container.appendChild(toast);

                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        toast.classList.add('show');
                    });
                });

                const timeout = setTimeout(function() {
                    if (toast.parentElement) {
                        toast.classList.remove('show');
                        setTimeout(function() {
                            if (toast.parentElement) toast.remove();
                        }, 400);
                    }
                }, 4000);

                const closeBtn = toast.querySelector('.toast-close');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function() {
                        clearTimeout(timeout);
                    });
                }
            };
        }
        var mostrarToast = window.mostrarToast;

        // ============================================
        // GRÁFICOS
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Chart === 'undefined') {
                console.warn('Chart.js não carregado');
                return;
            }

            // Gráfico Receitas vs Despesas
            const ctxReceitas = document.getElementById('chartReceitasDespesas');
            if (ctxReceitas) {
                new Chart(ctxReceitas, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($faturamento_mensal['labels']); ?>,
                        datasets: [
                            {
                                label: 'Receitas',
                                data: <?php echo json_encode($faturamento_mensal['receitas']); ?>,
                                backgroundColor: 'rgba(0, 255, 163, 0.08)',
                                borderColor: '#00FFA3',
                                borderWidth: 3,
                                pointBackgroundColor: '#00FFA3',
                                pointRadius: 4,
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Despesas',
                                data: <?php echo json_encode($faturamento_mensal['despesas']); ?>,
                                backgroundColor: 'rgba(255, 107, 107, 0.08)',
                                borderColor: '#FF6B6B',
                                borderWidth: 3,
                                pointBackgroundColor: '#FF6B6B',
                                pointRadius: 4,
                                tension: 0.4,
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
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Kz ' + (value / 1000000).toFixed(1) + 'M';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Gráfico Distribuição
            const ctxDistribuicao = document.getElementById('chartDistribuicao');
            if (ctxDistribuicao) {
                new Chart(ctxDistribuicao, {
                    type: 'doughnut',
                    data: {
                        labels: <?php echo json_encode($distribuicao_categorias['labels']); ?>,
                        datasets: [{
                            data: <?php echo json_encode($distribuicao_categorias['values']); ?>,
                            backgroundColor: <?php echo json_encode($distribuicao_categorias['colors']); ?>,
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            }
                        },
                        cutout: '65%'
                    }
                });
            }

            // Período do gráfico
            const chartPeriod = document.getElementById('chartPeriod');
            if (chartPeriod) {
                chartPeriod.addEventListener('change', function() {
                    mostrarToast('Período: ' + this.options[this.selectedIndex].text, 'info');
                });
            }
        });
    </script>

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO                             -->
    <!-- ========================================== -->
    <style>
        /* ========================================== */
        /* TOAST                                      */
        /* ========================================== */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 999999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
            width: calc(100% - 40px);
            pointer-events: none;
        }

        .toast {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 18px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            transform: translateX(120%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: auto;
            position: relative;
            overflow: hidden;
            min-width: 280px;
        }

        .toast::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
        }

        .toast.toast-success::before { background: #00FFA3; }
        .toast.toast-error::before { background: #FF6B6B; }
        .toast.toast-warning::before { background: #FFD93D; }
        .toast.toast-info::before { background: #00D2FF; }

        .toast .toast-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .toast .toast-content i { font-size: 1.3rem; flex-shrink: 0; }
        .toast .toast-content span { font-size: var(--text-sm); color: var(--text-primary); font-weight: 500; }
        .toast .toast-close {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 1.4rem;
            cursor: pointer;
            padding: 0 4px;
            line-height: 1;
            flex-shrink: 0;
        }
        .toast .toast-close:hover { color: var(--text-primary); }
        .toast.show { transform: translateX(0); opacity: 1; }

        /* ========================================== */
        /* PAGE HEADER                                */
        /* ========================================== */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: var(--space-lg);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            flex-wrap: wrap;
            position: relative;
            overflow: visible;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #00D2FF 0%, #6C2BD9 100%);
            border-radius: var(--radius-lg) 0 0 var(--radius-lg);
        }

        .header-left {
            flex: 1;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .header-left h1 {
            font-family: var(--font-title);
            font-size: var(--text-h1);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #00D2FF; font-size: 0.85em; }

        .header-left .breadcrumb {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: var(--transition-smooth); }
        .header-left .breadcrumb a:hover { color: #00D2FF; }
        .header-left .breadcrumb .separator { color: var(--text-muted); opacity: 0.5; }

        .header-right {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
            flex-wrap: wrap;
        }

        .btn-theme {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            background: var(--bg-input);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: var(--transition-smooth);
            position: relative;
        }

        .btn-theme:hover { border-color: #00D2FF; color: #00D2FF; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* STATS CARDS                                */
        /* ========================================== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .stat-card .icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.red { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .stat-card .trend {
            font-size: var(--text-xs);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 8px;
            border-radius: var(--radius-full);
            font-weight: 600;
            width: fit-content;
        }

        .stat-card .trend.up { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .stat-card .trend.down { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        /* ========================================== */
        /* CHARTS                                     */
        /* ========================================== */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .chart-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .chart-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .chart-card .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .chart-card .header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .chart-container {
            height: 280px;
            position: relative;
        }

        .chart-period {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 6px 12px;
            font-size: var(--text-xs);
            color: var(--text-primary);
            font-family: var(--font-body);
            cursor: pointer;
        }

        .chart-period:focus {
            outline: none;
            border-color: #00D2FF;
        }

        /* ========================================== */
        /* METAS                                      */
        /* ========================================== */
        .metas-section {
            margin-bottom: var(--space-lg);
        }

        .section-header-inline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .section-header-inline h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .metas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
        }

        .meta-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            transition: var(--transition-smooth);
        }

        .meta-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .meta-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-sm);
            gap: var(--space-sm);
        }

        .meta-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .meta-percent {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
        }

        .meta-progresso {
            margin-bottom: var(--space-sm);
        }

        .meta-progresso-barra {
            height: 8px;
            background: var(--bg-input);
            border-radius: 4px;
            overflow: hidden;
        }

        .meta-progresso-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .meta-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: var(--text-xs);
        }

        .meta-atual { color: var(--text-primary); font-weight: 600; }
        .meta-target { color: var(--text-muted); }

        /* ========================================== */
        /* TWO COLUMNS                                */
        /* ========================================== */
        .two-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        /* ========================================== */
        /* TRANSAÇÕES LIST                            */
        /* ========================================== */
        .transacoes-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .transacao-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .transacao-item:hover {
            border-color: #00D2FF;
            transform: translateX(4px);
        }

        .transacao-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .transacao-icon.receita {
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
        }

        .transacao-icon.despesa {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
        }

        .transacao-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .transacao-descricao {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .transacao-cliente {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .transacao-meta {
            display: flex;
            gap: var(--space-sm);
            font-size: 10px;
            color: var(--text-muted);
        }

        .transacao-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            white-space: nowrap;
        }

        .transacao-valor.receita { color: #00FFA3; }
        .transacao-valor.despesa { color: #FF6B6B; }

        /* ========================================== */
        /* FATURAS LIST                               */
        /* ========================================== */
        .faturas-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .fatura-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .fatura-item:hover {
            border-color: #FFD93D;
            transform: translateX(4px);
        }

        .fatura-item.fatura-vencida {
            border-color: rgba(255, 107, 107, 0.3);
            background: rgba(255, 107, 107, 0.04);
        }

        .fatura-item.fatura-urgente {
            border-color: rgba(255, 217, 61, 0.3);
            background: rgba(255, 217, 61, 0.04);
        }

        .fatura-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .fatura-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .fatura-numero {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .fatura-cliente {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .fatura-meta {
            display: flex;
            gap: var(--space-sm);
            font-size: 10px;
            color: var(--text-muted);
        }

        .fatura-dias.text-danger { color: #FF6B6B; font-weight: 600; }
        .fatura-dias.text-warning { color: #FFD93D; font-weight: 600; }

        .fatura-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #FFD93D;
            white-space: nowrap;
        }

        /* ========================================== */
        /* QUICK ACTIONS                              */
        /* ========================================== */
        .quick-actions {
            margin-bottom: var(--space-lg);
        }

        .quick-actions h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 var(--space-md) 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: var(--space-sm);
        }

        .action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-card);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            text-decoration: none;
            transition: var(--transition-smooth);
            text-align: center;
        }

        .action-item:hover {
            border-color: #00D2FF;
            transform: translateY(-2px);
            box-shadow: var(--glass-shadow);
        }

        .action-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .action-label {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            font-weight: 500;
            line-height: 1.3;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .charts-grid { grid-template-columns: 1fr; }
            .metas-grid { grid-template-columns: 1fr; }
            .actions-grid { grid-template-columns: repeat(4, 1fr); }
        }

        @media (max-width: 992px) {
            .two-columns { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            .actions-grid { grid-template-columns: repeat(3, 1fr); }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
            .chart-container { height: 220px; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .actions-grid { grid-template-columns: repeat(2, 1fr); }
            .transacao-item { flex-wrap: wrap; }
            .transacao-valor { width: 100%; text-align: right; }
            .fatura-item { flex-wrap: wrap; }
            .fatura-valor { width: 100%; text-align: right; }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>