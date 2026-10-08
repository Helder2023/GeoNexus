<?php
// painel/individual/financeiro/fluxo-caixa.php - Fluxo de Caixa
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Fluxo de Caixa';
$pagina_atual = 'fluxo-caixa';

// ============================================
// GARANTIR VARIÁVEIS
// ============================================
if (!isset($valor_receber))              $valor_receber = 850000;
if (!isset($total_faturas_pendentes))    $total_faturas_pendentes = 12;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// PERÍODO SELECIONADO
// ============================================
$periodo = isset($_GET['periodo']) ? $_GET['periodo'] : 'mes';
$periodos = [
    'hoje' => 'Hoje',
    'semana' => 'Esta Semana',
    'mes' => 'Este Mês',
    'trimestre' => 'Este Trimestre',
    'ano' => 'Este Ano',
];

// ============================================
// DADOS DO FLUXO DE CAIXA
// ============================================
$saldo_inicial = 1850000;
$entradas = 4850000;
$saidas = 1400000;
$saldo_final = $saldo_inicial + $entradas - $saidas;

// ============================================
// MOVIMENTAÇÕES DO PERÍODO
// ============================================
$movimentacoes = [
    [
        'id' => 1,
        'data' => '2026-02-18',
        'descricao' => 'Pagamento Projeto Zona Norte',
        'categoria' => 'Projetos',
        'tipo' => 'entrada',
        'valor' => 350000,
        'saldo' => 2200000,
        'metodo' => 'Transferência',
        'cliente' => 'Construtora ABC'
    ],
    [
        'id' => 2,
        'data' => '2026-02-18',
        'descricao' => 'Comissão Indicação',
        'categoria' => 'Comissões',
        'tipo' => 'entrada',
        'valor' => 45000,
        'saldo' => 2245000,
        'metodo' => 'Multicaixa',
        'cliente' => 'Indústria Luanda'
    ],
    [
        'id' => 3,
        'data' => '2026-02-17',
        'descricao' => 'Compra Equipamento GPS',
        'categoria' => 'Equipamentos',
        'tipo' => 'saida',
        'valor' => 180000,
        'saldo' => 2065000,
        'metodo' => 'Transferência',
        'cliente' => 'Fornecedor Topografia Lda'
    ],
    [
        'id' => 4,
        'data' => '2026-02-17',
        'descricao' => 'Assinatura Plano Pro',
        'categoria' => 'Assinaturas',
        'tipo' => 'entrada',
        'valor' => 25000,
        'saldo' => 2090000,
        'metodo' => 'Multicaixa',
        'cliente' => 'Agro Negócios Lda'
    ],
    [
        'id' => 5,
        'data' => '2026-02-16',
        'descricao' => 'Reembolso Deslocação',
        'categoria' => 'Reembolsos',
        'tipo' => 'saida',
        'valor' => 35000,
        'saldo' => 2055000,
        'metodo' => 'Numerário',
        'cliente' => 'Carlos Mendes'
    ],
    [
        'id' => 6,
        'data' => '2026-02-15',
        'descricao' => 'Pagamento Levantamento GIS',
        'categoria' => 'Projetos',
        'tipo' => 'entrada',
        'valor' => 480000,
        'saldo' => 2535000,
        'metodo' => 'Transferência',
        'cliente' => 'Município de Luanda'
    ],
    [
        'id' => 7,
        'data' => '2026-02-14',
        'descricao' => 'Combustível e Deslocações',
        'categoria' => 'Operacional',
        'tipo' => 'saida',
        'valor' => 45000,
        'saldo' => 2490000,
        'metodo' => 'Numerário',
        'cliente' => 'Diversos'
    ],
    [
        'id' => 8,
        'data' => '2026-02-13',
        'descricao' => 'Fatura Mapeamento Cadastral',
        'categoria' => 'Projetos',
        'tipo' => 'entrada',
        'valor' => 195000,
        'saldo' => 2685000,
        'metodo' => 'Multicaixa',
        'cliente' => 'Agro Negócios Lda'
    ],
];

// ============================================
// GRÁFICO - FLUXO DOS ÚLTIMOS 7 DIAS
// ============================================
$grafico_fluxo = [
    'labels' => ['12 Fev', '13 Fev', '14 Fev', '15 Fev', '16 Fev', '17 Fev', '18 Fev'],
    'entradas' => [0, 195000, 0, 480000, 0, 370000, 395000],
    'saidas' => [0, 0, 45000, 0, 35000, 180000, 0],
    'saldos' => [1850000, 2045000, 2000000, 2480000, 2445000, 2635000, 3030000]
];

// ============================================
// RESUMO POR CATEGORIA
// ============================================
$categorias_resumo = [
    ['nome' => 'Projetos', 'icon' => 'fa-project-diagram', 'color' => '#6C2BD9', 'entradas' => 1025000, 'saidas' => 0],
    ['nome' => 'Assinaturas', 'icon' => 'fa-crown', 'color' => '#FFD93D', 'entradas' => 25000, 'saidas' => 0],
    ['nome' => 'Comissões', 'icon' => 'fa-handshake', 'color' => '#00D2FF', 'entradas' => 45000, 'saidas' => 0],
    ['nome' => 'Equipamentos', 'icon' => 'fa-tools', 'color' => '#FF6B6B', 'entradas' => 0, 'saidas' => 180000],
    ['nome' => 'Operacional', 'icon' => 'fa-gas-pump', 'color' => '#FF9F43', 'entradas' => 0, 'saidas' => 45000],
    ['nome' => 'Reembolsos', 'icon' => 'fa-undo', 'color' => '#A29BFE', 'entradas' => 0, 'saidas' => 35000],
];

// ============================================
// PREVISÃO - PRÓXIMOS 30 DIAS
// ============================================
$previsao = [
    ['data' => '2026-02-25', 'descricao' => 'Fatura FT-2026-0156', 'tipo' => 'entrada', 'valor' => 480000, 'cliente' => 'Município de Luanda'],
    ['data' => '2026-02-28', 'descricao' => 'Fatura FT-2026-0158', 'tipo' => 'entrada', 'valor' => 195000, 'cliente' => 'Energia Futuro'],
    ['data' => '2026-03-01', 'descricao' => 'Pagamento Fornecedor GPS', 'tipo' => 'saida', 'valor' => 95000, 'cliente' => 'Topografia Lda'],
    ['data' => '2026-03-05', 'descricao' => 'Assinatura Plano Pro', 'tipo' => 'entrada', 'valor' => 25000, 'cliente' => 'Agro Negócios Lda'],
    ['data' => '2026-03-10', 'descricao' => 'Fatura FT-2026-0160', 'tipo' => 'entrada', 'valor' => 320000, 'cliente' => 'Construtora XYZ'],
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

if (!function_exists('formatDateShort')) {
    function formatDateShort($date) {
        if (empty($date)) return 'N/A';
        $dias = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
        $d = strtotime($date);
        return $dias[date('w', $d)] . ', ' . date('d/m', $d);
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
                        <i class="fas fa-chart-line icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Fluxo de Caixa</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <button class="btn btn-outline" onclick="window.print()">
                        <i class="fas fa-print"></i> Imprimir
                    </button>
                </div>
            </header>

            <!-- ===== FILTRO DE PERÍODO ===== -->
            <section class="periodo-selector animate-fade-up">
                <span class="periodo-label">
                    <i class="fas fa-calendar-alt"></i>
                    Período:
                </span>
                <div class="periodo-tabs">
                    <?php foreach ($periodos as $key => $label): ?>
                        <a href="?periodo=<?php echo $key; ?>" 
                           class="periodo-tab <?php echo $periodo === $key ? 'active' : ''; ?>">
                            <?php echo $label; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <button class="btn btn-sm btn-outline" onclick="exportarFluxo()">
                    <i class="fas fa-download"></i> Exportar
                </button>
            </section>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="stat-card stat-saldo">
                    <div class="icon blue">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($saldo_final); ?></div>
                    <div class="label">Saldo Atual</div>
                    <div class="stat-info">
                        <span class="stat-info-inicial">Inicial: Kz <?php echo formatMoney($saldo_inicial); ?></span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div class="value" style="color: #00FFA3;">+Kz <?php echo formatMoney($entradas); ?></div>
                    <div class="label">Total de Entradas</div>
                    <div class="stat-progresso">
                        <div class="stat-progresso-barra">
                            <div class="stat-progresso-fill green" style="width: <?php echo ($entradas / ($entradas + $saidas)) * 100; ?>%;"></div>
                        </div>
                        <span class="stat-progresso-label"><?php echo round(($entradas / ($entradas + $saidas)) * 100); ?>% do total</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="value" style="color: #FF6B6B;">-Kz <?php echo formatMoney($saidas); ?></div>
                    <div class="label">Total de Saídas</div>
                    <div class="stat-progresso">
                        <div class="stat-progresso-barra">
                            <div class="stat-progresso-fill red" style="width: <?php echo ($saidas / ($entradas + $saidas)) * 100; ?>%;"></div>
                        </div>
                        <span class="stat-progresso-label"><?php echo round(($saidas / ($entradas + $saidas)) * 100); ?>% do total</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="value" style="color: #00FFA3;">+Kz <?php echo formatMoney($entradas - $saidas); ?></div>
                    <div class="label">Resultado do Período</div>
                    <div class="stat-info">
                        <span class="stat-info-margem">
                            <i class="fas fa-arrow-up"></i> 
                            Margem <?php echo round((($entradas - $saidas) / $entradas) * 100); ?>%
                        </span>
                    </div>
                </div>
            </section>

            <!-- ===== GRÁFICO ===== -->
            <section class="chart-section animate-fade-up" style="animation-delay: 0.15s;">
                <div class="chart-card">
                    <div class="header">
                        <h3>
                            <i class="fas fa-chart-area" style="color: #00D2FF;"></i>
                            Evolução do Fluxo de Caixa
                        </h3>
                        <div class="chart-legend">
                            <span class="legend-item">
                                <span class="legend-dot" style="background: #00FFA3;"></span>
                                Entradas
                            </span>
                            <span class="legend-item">
                                <span class="legend-dot" style="background: #FF6B6B;"></span>
                                Saídas
                            </span>
                            <span class="legend-item">
                                <span class="legend-dot" style="background: #00D2FF;"></span>
                                Saldo
                            </span>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartFluxo"></canvas>
                    </div>
                </div>
            </section>

            <!-- ===== TWO COLUMNS ===== -->
            <section class="two-columns animate-fade-up" style="animation-delay: 0.2s;">
                <!-- Resumo por Categoria -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-layer-group" style="color: #6C2BD9;"></i>
                            Resumo por Categoria
                        </h3>
                    </div>
                    <div class="categorias-list">
                        <?php foreach ($categorias_resumo as $cat): 
                            $total_cat = $cat['entradas'] + $cat['saidas'];
                            $percent = $total_cat > 0 ? round(($total_cat / ($entradas + $saidas)) * 100) : 0;
                        ?>
                            <div class="categoria-item">
                                <div class="categoria-icon" style="background: <?php echo $cat['color']; ?>20; color: <?php echo $cat['color']; ?>;">
                                    <i class="fas <?php echo $cat['icon']; ?>"></i>
                                </div>
                                <div class="categoria-conteudo">
                                    <div class="categoria-header">
                                        <span class="categoria-nome"><?php echo $cat['nome']; ?></span>
                                        <span class="categoria-percent"><?php echo $percent; ?>%</span>
                                    </div>
                                    <div class="categoria-barra">
                                        <div class="categoria-barra-fill" style="width: <?php echo $percent; ?>%; background: <?php echo $cat['color']; ?>;"></div>
                                    </div>
                                    <div class="categoria-valores">
                                        <?php if ($cat['entradas'] > 0): ?>
                                            <span class="categoria-valor entrada">
                                                <i class="fas fa-arrow-up"></i> Kz <?php echo formatMoney($cat['entradas']); ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($cat['saidas'] > 0): ?>
                                            <span class="categoria-valor saida">
                                                <i class="fas fa-arrow-down"></i> Kz <?php echo formatMoney($cat['saidas']); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Previsão Próximos 30 dias -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-calendar-alt" style="color: #FFD93D;"></i>
                            Previsão - Próximos 30 Dias
                        </h3>
                        <?php 
                        $total_previsto_entradas = 0;
                        $total_previsto_saidas = 0;
                        foreach ($previsao as $prev) {
                            if ($prev['tipo'] === 'entrada') $total_previsto_entradas += $prev['valor'];
                            else $total_previsto_saidas += $prev['valor'];
                        }
                        $saldo_previsto = $saldo_final + $total_previsto_entradas - $total_previsto_saidas;
                        ?>
                        <span class="badge-info-previsto">
                            Saldo Previsto: <strong>Kz <?php echo formatMoney($saldo_previsto); ?></strong>
                        </span>
                    </div>
                    <div class="previsao-list">
                        <?php foreach ($previsao as $prev): ?>
                            <div class="previsao-item <?php echo $prev['tipo']; ?>">
                                <div class="previsao-data">
                                    <span class="previsao-dia"><?php echo formatDateShort($prev['data']); ?></span>
                                </div>
                                <div class="previsao-conteudo">
                                    <span class="previsao-descricao"><?php echo $prev['descricao']; ?></span>
                                    <span class="previsao-cliente">
                                        <i class="fas fa-user"></i> <?php echo $prev['cliente']; ?>
                                    </span>
                                </div>
                                <div class="previsao-valor <?php echo $prev['tipo']; ?>">
                                    <?php echo $prev['tipo'] === 'entrada' ? '+' : '-'; ?>
                                    Kz <?php echo formatMoney($prev['valor']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== MOVIMENTAÇÕES DO PERÍODO ===== -->
            <section class="movimentacoes-section animate-fade-up" style="animation-delay: 0.25s;">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-list-alt" style="color: #00D2FF;"></i>
                            Movimentações do Período
                            <span class="badge badge-primary"><?php echo count($movimentacoes); ?></span>
                        </h3>
                        <div class="header-filters">
                            <button class="btn btn-sm btn-outline active" onclick="filtrarMovimentacoes('todos', this)">
                                Todas
                            </button>
                            <button class="btn btn-sm btn-outline" onclick="filtrarMovimentacoes('entrada', this)">
                                <i class="fas fa-arrow-up" style="color: #00FFA3;"></i> Entradas
                            </button>
                            <button class="btn btn-sm btn-outline" onclick="filtrarMovimentacoes('saida', this)">
                                <i class="fas fa-arrow-down" style="color: #FF6B6B;"></i> Saídas
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table-movimentacoes">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Descrição</th>
                                    <th>Categoria</th>
                                    <th>Cliente</th>
                                    <th>Método</th>
                                    <th style="text-align: right;">Valor</th>
                                    <th style="text-align: right;">Saldo</th>
                                </tr>
                            </thead>
                            <tbody id="movimentacoesBody">
                                <?php foreach ($movimentacoes as $mov): ?>
                                    <tr data-tipo="<?php echo $mov['tipo']; ?>">
                                        <td>
                                            <span class="mov-data"><?php echo formatDate($mov['data']); ?></span>
                                        </td>
                                        <td>
                                            <div class="mov-descricao">
                                                <div class="mov-icon <?php echo $mov['tipo']; ?>">
                                                    <i class="fas fa-arrow-<?php echo $mov['tipo'] === 'entrada' ? 'up' : 'down'; ?>"></i>
                                                </div>
                                                <span><?php echo $mov['descricao']; ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="mov-categoria"><?php echo $mov['categoria']; ?></span>
                                        </td>
                                        <td>
                                            <span class="mov-cliente"><?php echo $mov['cliente']; ?></span>
                                        </td>
                                        <td>
                                            <span class="mov-metodo">
                                                <i class="fas fa-credit-card"></i> <?php echo $mov['metodo']; ?>
                                            </span>
                                        </td>
                                        <td style="text-align: right;">
                                            <span class="mov-valor <?php echo $mov['tipo']; ?>">
                                                <?php echo $mov['tipo'] === 'entrada' ? '+' : '-'; ?>
                                                Kz <?php echo formatMoney($mov['valor']); ?>
                                            </span>
                                        </td>
                                        <td style="text-align: right;">
                                            <span class="mov-saldo">Kz <?php echo formatMoney($mov['saldo']); ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ===== AÇÕES RÁPIDAS ===== -->
            <section class="quick-actions animate-fade-up" style="animation-delay: 0.3s;">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                            Ações Rápidas
                        </h3>
                    </div>
                    <div class="quick-actions-grid">
                        <a href="transacao-criar.php?tipo=receita" class="quick-action-card">
                            <div class="quick-action-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="quick-action-info">
                                <strong>Registar Entrada</strong>
                                <span>Adicionar nova receita</span>
                            </div>
                        </a>
                        <a href="transacao-criar.php?tipo=despesa" class="quick-action-card">
                            <div class="quick-action-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                                <i class="fas fa-minus-circle"></i>
                            </div>
                            <div class="quick-action-info">
                                <strong>Registar Saída</strong>
                                <span>Adicionar nova despesa</span>
                            </div>
                        </a>
                        <a href="fatura-criar.php" class="quick-action-card">
                            <div class="quick-action-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="quick-action-info">
                                <strong>Emitir Fatura</strong>
                                <span>Criar nova fatura</span>
                            </div>
                        </a>
                        <a href="relatorios-financeiros.php" class="quick-action-card">
                            <div class="quick-action-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="quick-action-info">
                                <strong>Relatórios</strong>
                                <span>Ver análises detalhadas</span>
                            </div>
                        </a>
                    </div>
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
        // GRÁFICO DE FLUXO
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Chart === 'undefined') {
                console.warn('Chart.js não carregado');
                return;
            }

            const ctxFluxo = document.getElementById('chartFluxo');
            if (ctxFluxo) {
                new Chart(ctxFluxo, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($grafico_fluxo['labels']); ?>,
                        datasets: [
                            {
                                label: 'Entradas',
                                data: <?php echo json_encode($grafico_fluxo['entradas']); ?>,
                                backgroundColor: 'rgba(0, 255, 163, 0.1)',
                                borderColor: '#00FFA3',
                                borderWidth: 3,
                                pointBackgroundColor: '#00FFA3',
                                pointRadius: 5,
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Saídas',
                                data: <?php echo json_encode($grafico_fluxo['saidas']); ?>,
                                backgroundColor: 'rgba(255, 107, 107, 0.1)',
                                borderColor: '#FF6B6B',
                                borderWidth: 3,
                                pointBackgroundColor: '#FF6B6B',
                                pointRadius: 5,
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Saldo',
                                data: <?php echo json_encode($grafico_fluxo['saldos']); ?>,
                                backgroundColor: 'rgba(0, 210, 255, 0.08)',
                                borderColor: '#00D2FF',
                                borderWidth: 3,
                                borderDash: [5, 5],
                                pointBackgroundColor: '#00D2FF',
                                pointRadius: 5,
                                tension: 0.4,
                                fill: true
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: {
                            mode: 'index',
                            intersect: false
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = context.dataset.label || '';
                                        if (label) label += ': ';
                                        label += 'Kz ' + context.parsed.y.toLocaleString('pt-AO').replace(/,/g, '.');
                                        return label;
                                    }
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
        });

        // ============================================
        // FILTRAR MOVIMENTAÇÕES
        // ============================================
        function filtrarMovimentacoes(tipo, btn) {
            document.querySelectorAll('.header-filters .btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const rows = document.querySelectorAll('#movimentacoesBody tr');
            rows.forEach(row => {
                if (tipo === 'todos' || row.dataset.tipo === tipo) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // ============================================
        // EXPORTAR FLUXO
        // ============================================
        function exportarFluxo() {
            mostrarToast('A preparar exportação do fluxo de caixa...', 'info');
            setTimeout(() => {
                mostrarToast('Fluxo de caixa exportado com sucesso!', 'success');
            }, 1500);
        }
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
        /* PERIODO SELECTOR                           */
        /* ========================================== */
        .periodo-selector {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            flex-wrap: wrap;
        }

        .periodo-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-muted);
            white-space: nowrap;
        }

        .periodo-label i { color: #00D2FF; }

        .periodo-tabs {
            display: flex;
            gap: 4px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 4px;
            flex: 1;
            min-width: 200px;
            overflow-x: auto;
        }

        .periodo-tab {
            padding: 8px 16px;
            background: transparent;
            border: none;
            border-radius: var(--radius-sm);
            color: var(--text-muted);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .periodo-tab:hover {
            color: var(--text-primary);
            background: var(--bg-card-hover);
        }

        .periodo-tab.active {
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.25);
        }

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
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .stat-card.stat-saldo::before { background: linear-gradient(90deg, #00D2FF, #6C2BD9); }
        .stat-card:nth-child(2)::before { background: linear-gradient(90deg, #00FFA3, #00D2FF); }
        .stat-card:nth-child(3)::before { background: linear-gradient(90deg, #FF6B6B, #FF9F43); }
        .stat-card:nth-child(4)::before { background: linear-gradient(90deg, #FFD93D, #FF9F43); }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
            transform: translateY(-4px);
        }

        .stat-card:hover::before { opacity: 1; }

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

        .stat-info {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .stat-info-inicial {
            font-weight: 500;
        }

        .stat-info-margem {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: #00FFA3;
            font-weight: 600;
        }

        /* ===== PROGRESSO ===== */
        .stat-progresso {
            display: flex;
            flex-direction: column;
            gap: 4px;
            margin-top: 4px;
        }

        .stat-progresso-barra {
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .stat-progresso-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .stat-progresso-fill.green { background: linear-gradient(90deg, #00FFA3, #00D2FF); }
        .stat-progresso-fill.red { background: linear-gradient(90deg, #FF6B6B, #FF9F43); }

        .stat-progresso-label {
            font-size: 10px;
            color: var(--text-muted);
            text-align: right;
        }

        /* ========================================== */
        /* CHART                                      */
        /* ========================================== */
        .chart-section {
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

        .chart-legend {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .legend-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-weight: 500;
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .chart-container {
            height: 320px;
            position: relative;
        }

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
        /* CATEGORIAS                                 */
        /* ========================================== */
        .categorias-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .categoria-item {
            display: flex;
            gap: var(--space-md);
            align-items: flex-start;
        }

        .categoria-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .categoria-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .categoria-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
        }

        .categoria-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .categoria-percent {
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 700;
            color: var(--text-muted);
        }

        .categoria-barra {
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .categoria-barra-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .categoria-valores {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .categoria-valor {
            font-size: var(--text-xs);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .categoria-valor.entrada { color: #00FFA3; }
        .categoria-valor.saida { color: #FF6B6B; }

        /* ========================================== */
        /* PREVISÃO                                   */
        /* ========================================== */
        .badge-info-previsto {
            padding: 6px 12px;
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-info-previsto strong {
            color: #00D2FF;
            font-family: var(--font-display);
        }

        .previsao-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .previsao-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .previsao-item:hover { transform: translateX(4px); }
        .previsao-item.entrada:hover { border-color: rgba(0, 255, 163, 0.3); }
        .previsao-item.saida:hover { border-color: rgba(255, 107, 107, 0.3); }

        .previsao-data {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 70px;
            flex-shrink: 0;
        }

        .previsao-dia {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .previsao-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .previsao-descricao {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .previsao-cliente {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .previsao-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            white-space: nowrap;
        }

        .previsao-valor.entrada { color: #00FFA3; }
        .previsao-valor.saida { color: #FF6B6B; }

        /* ========================================== */
        /* TABELA MOVIMENTAÇÕES                       */
        /* ========================================== */
        .movimentacoes-section {
            margin-bottom: var(--space-lg);
        }

        .header-filters {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .header-filters .btn.active {
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            border-color: transparent;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0 calc(var(--space-lg) * -1);
            padding: 0 var(--space-lg);
        }

        .table-movimentacoes {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 900px;
        }

        .table-movimentacoes thead {
            background: var(--bg-input);
        }

        .table-movimentacoes thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 10px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .table-movimentacoes tbody td {
            padding: 12px 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-movimentacoes tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-movimentacoes tbody tr:last-child td {
            border-bottom: none;
        }

        .mov-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .mov-descricao {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .mov-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            flex-shrink: 0;
        }

        .mov-icon.entrada {
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
        }

        .mov-icon.saida {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
        }

        .mov-descricao span {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mov-categoria {
            display: inline-block;
            padding: 3px 10px;
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .mov-cliente {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
            display: block;
        }

        .mov-metodo {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
        }

        .mov-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            white-space: nowrap;
        }

        .mov-valor.entrada { color: #00FFA3; }
        .mov-valor.saida { color: #FF6B6B; }

        .mov-saldo {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
        }

        /* ========================================== */
        /* QUICK ACTIONS                              */
        /* ========================================== */
        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
        }

        .quick-action-card {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .quick-action-card:hover {
            border-color: #00D2FF;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 210, 255, 0.15);
        }

        .quick-action-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .quick-action-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .quick-action-info strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
        }

        .quick-action-info span {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .two-columns { grid-template-columns: 1fr; }
            .quick-actions-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .chart-container { height: 260px; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            .periodo-selector { flex-direction: column; align-items: stretch; }
            .periodo-tabs { width: 100%; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
            .chart-container { height: 220px; }
            .card-header { flex-direction: column; align-items: flex-start; }
            .header-filters { width: 100%; }
            .header-filters .btn { flex: 1; }
            .table-responsive { margin: 0 calc(var(--space-md) * -1); padding: 0 var(--space-md); }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .quick-actions-grid { grid-template-columns: 1fr; }
            .previsao-item { flex-wrap: wrap; }
            .previsao-valor { width: 100%; text-align: right; margin-top: 4px; }
            .categoria-valores { flex-direction: column; gap: 4px; }
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

        /* ===== PRINT ===== */
        @media print {
            .sidebar,
            .bottom-nav,
            .header-right,
            .periodo-selector,
            .quick-actions {
                display: none !important;
            }

            .main-content {
                margin-left: 0;
                padding: 0;
            }

            .card, .chart-card, .stat-card {
                break-inside: avoid;
                box-shadow: none;
            }
        }
    </style>

</body>

</html>

