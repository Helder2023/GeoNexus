<?php
// painel/individual/servicos/estatisticas.php - Estatísticas dos Serviços
include "../../../includes/individual/notificacoes-servicos-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Estatísticas dos Serviços';
$pagina_atual = 'estatisticas';

// ============================================
// KPIs PRINCIPAIS
// ============================================
$kpis = [
    'visualizacoes_total' => 2456,
    'visualizacoes_mes' => 512,
    'visualizacoes_variacao' => 18.5,
    'contratacoes_total' => 68,
    'contratacoes_mes' => 14,
    'contratacoes_variacao' => 12.3,
    'taxa_conversao' => 2.77,
    'taxa_conversao_variacao' => 8.4,
    'receita_total' => 8750000,
    'receita_mes' => 1850000,
    'receita_variacao' => 22.1,
    'avaliacao_media' => 4.8,
    'avaliacao_variacao' => 2.5,
    'tempo_medio_resposta' => 4.2,
    'tempo_medio_resposta_variacao' => -15.8,
    'clientes_ativos' => 42,
    'clientes_ativos_variacao' => 9.5
];

// ============================================
// DADOS PARA GRÁFICO DE RECEITA MENSAL
// ============================================
$receita_mensal = [
    'labels' => ['Set', 'Out', 'Nov', 'Dez', 'Jan', 'Fev'],
    'values' => [620000, 780000, 950000, 1120000, 1480000, 1850000]
];

// ============================================
// DADOS PARA GRÁFICO DE VISUALIZAÇÕES
// ============================================
$visualizacoes_mensal = [
    'labels' => ['Set', 'Out', 'Nov', 'Dez', 'Jan', 'Fev'],
    'values' => [180, 220, 290, 340, 410, 512]
];

// ============================================
// TOP SERVIÇOS MAIS VENDIDOS
// ============================================
$top_servicos = [
    [
        'id' => 5,
        'nome' => 'Levantamento com Drone',
        'categoria' => 'Drones',
        'categoria_icon' => 'fa-drone',
        'categoria_color' => '#FF6B6B',
        'visualizacoes' => 312,
        'contratacoes' => 20,
        'receita' => 6400000,
        'avaliacao' => 5.0,
        'taxa_conversao' => 6.4
    ],
    [
        'id' => 3,
        'nome' => 'Levantamento Planialtimétrico',
        'categoria' => 'Topografia',
        'categoria_icon' => 'fa-mountain',
        'categoria_color' => '#6C2BD9',
        'visualizacoes' => 156,
        'contratacoes' => 15,
        'receita' => 4200000,
        'avaliacao' => 4.7,
        'taxa_conversao' => 9.6
    ],
    [
        'id' => 1,
        'nome' => 'Levantamento Topográfico',
        'categoria' => 'Topografia',
        'categoria_icon' => 'fa-mountain',
        'categoria_color' => '#6C2BD9',
        'visualizacoes' => 245,
        'contratacoes' => 12,
        'receita' => 4200000,
        'avaliacao' => 4.9,
        'taxa_conversao' => 4.9
    ],
    [
        'id' => 2,
        'nome' => 'Mapeamento GIS',
        'categoria' => 'GIS',
        'categoria_icon' => 'fa-globe',
        'categoria_color' => '#00FFA3',
        'visualizacoes' => 189,
        'contratacoes' => 8,
        'receita' => 3840000,
        'avaliacao' => 4.8,
        'taxa_conversao' => 4.2
    ],
    [
        'id' => 4,
        'nome' => 'Cadastro Rural',
        'categoria' => 'Cadastro',
        'categoria_icon' => 'fa-home',
        'categoria_color' => '#FFD93D',
        'visualizacoes' => 134,
        'contratacoes' => 6,
        'receita' => 1170000,
        'avaliacao' => 4.6,
        'taxa_conversao' => 4.5
    ]
];

// ============================================
// DISTRIBUIÇÃO POR CATEGORIA
// ============================================
$distribuicao_categorias = [
    ['nome' => 'Topografia', 'icon' => 'fa-mountain', 'color' => '#6C2BD9', 'servicos' => 2, 'contratacoes' => 27, 'percentual' => 39.7],
    ['nome' => 'Drones', 'icon' => 'fa-drone', 'color' => '#FF6B6B', 'servicos' => 1, 'contratacoes' => 20, 'percentual' => 29.4],
    ['nome' => 'GIS', 'icon' => 'fa-globe', 'color' => '#00FFA3', 'servicos' => 1, 'contratacoes' => 8, 'percentual' => 11.8],
    ['nome' => 'Cadastro', 'icon' => 'fa-home', 'color' => '#FFD93D', 'servicos' => 1, 'contratacoes' => 6, 'percentual' => 8.8],
    ['nome' => 'Agricultura', 'icon' => 'fa-tractor', 'color' => '#6BCB77', 'servicos' => 1, 'contratacoes' => 4, 'percentual' => 5.9],
    ['nome' => 'Urbanismo', 'icon' => 'fa-city', 'color' => '#A29BFE', 'servicos' => 1, 'contratacoes' => 2, 'percentual' => 2.9],
    ['nome' => 'Engenharia', 'icon' => 'fa-ruler-combined', 'color' => '#00D2FF', 'servicos' => 1, 'contratacoes' => 1, 'percentual' => 1.5]
];

// ============================================
// PERFORMANCE POR PERÍODO
// ============================================
$performance_diaria = [
    'labels' => ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
    'visualizacoes' => [45, 62, 58, 71, 89, 34, 28],
    'contratacoes' => [2, 3, 4, 5, 6, 1, 0]
];

// ============================================
// HORÁRIOS DE PICO
// ============================================
$horarios_pico = [
    ['hora' => '00h-06h', 'visualizacoes' => 45, 'percentual' => 3.5],
    ['hora' => '06h-09h', 'visualizacoes' => 187, 'percentual' => 14.6],
    ['hora' => '09h-12h', 'visualizacoes' => 542, 'percentual' => 42.3],
    ['hora' => '12h-15h', 'visualizacoes' => 398, 'percentual' => 31.1],
    ['hora' => '15h-18h', 'visualizacoes' => 245, 'percentual' => 19.1],
    ['hora' => '18h-21h', 'visualizacoes' => 156, 'percentual' => 12.2],
    ['hora' => '21h-00h', 'visualizacoes' => 89, 'percentual' => 6.9]
];

// ============================================
// CLIENTES MAIS ATIVOS
// ============================================
$clientes_top = [
    ['nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'avatar' => 'instituicao-1.png', 'contratacoes' => 15, 'receita' => 4200000, 'avaliacao' => 5.0],
    ['nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'avatar' => 'empresa-1.png', 'contratacoes' => 12, 'receita' => 3500000, 'avaliacao' => 4.9],
    ['nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'avatar' => 'empresa-2.png', 'contratacoes' => 8, 'receita' => 2200000, 'avaliacao' => 4.6],
    ['nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'avatar' => 'empresa-3.png', 'contratacoes' => 6, 'receita' => 2880000, 'avaliacao' => 4.8],
    ['nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'avatar' => 'empresa-4.png', 'contratacoes' => 4, 'receita' => 1200000, 'avaliacao' => 4.7]
];

// ============================================
// COMPARATIVO COM MÊS ANTERIOR
// ============================================
$comparativo = [
    'visualizacoes' => ['atual' => 512, 'anterior' => 432, 'variacao' => 18.5],
    'contratacoes' => ['atual' => 14, 'anterior' => 12, 'variacao' => 16.7],
    'receita' => ['atual' => 1850000, 'anterior' => 1480000, 'variacao' => 25.0],
    'avaliacao' => ['atual' => 4.8, 'anterior' => 4.7, 'variacao' => 2.1],
    'clientes_novos' => ['atual' => 6, 'anterior' => 5, 'variacao' => 20.0],
    'taxa_conversao' => ['atual' => 2.77, 'anterior' => 2.54, 'variacao' => 9.1]
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('formatMoneyShort')) {
    function formatMoneyShort($value) {
        if ($value >= 1000000) {
            return number_format($value / 1000000, 1, ',', '.') . 'M';
        }
        if ($value >= 1000) {
            return number_format($value / 1000, 0, ',', '.') . 'K';
        }
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00FFA3&color=fff&size=80';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../../includes/individual/servicos-head.php" ?>

<body>
    <div class="app-container">
        <!-- Toast Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Overlay para sidebar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR SERVIÇOS                           -->
        <!-- ========================================== -->
        <?php include "../../../includes/individual/servicos-sidebar.php" ?>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-chart-line icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Serviços</a>
                        <span class="separator">/</span>
                        <span>Estatísticas</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-servicos.php" ?>

                    <button class="btn btn-outline" onclick="exportarEstatisticas()">
                        <i class="fas fa-download"></i> Exportar
                    </button>
                    <a href="index.php" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== FILTRO DE PERÍODO ===== -->
            <section class="periodo-selector animate-fade-up">
                <div class="periodo-label">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Período:</span>
                </div>
                <div class="periodo-opcoes">
                    <button class="periodo-btn" data-periodo="7d" onclick="mudarPeriodo('7d')">Últimos 7 dias</button>
                    <button class="periodo-btn" data-periodo="30d" onclick="mudarPeriodo('30d')">Últimos 30 dias</button>
                    <button class="periodo-btn active" data-periodo="6m" onclick="mudarPeriodo('6m')">Últimos 6 meses</button>
                    <button class="periodo-btn" data-periodo="1a" onclick="mudarPeriodo('1a')">Último ano</button>
                    <button class="periodo-btn" data-periodo="custom" onclick="abrirPeriodoCustom()">
                        <i class="fas fa-calendar"></i> Personalizado
                    </button>
                </div>
            </section>

            <!-- ===== KPIs PRINCIPAIS ===== -->
            <section class="kpis-grid animate-fade-up" style="animation-delay: 0.1s;">
                <!-- Receita -->
                <div class="kpi-card kpi-receita">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="kpi-variacao <?php echo $kpis['receita_variacao'] >= 0 ? 'positiva' : 'negativa'; ?>">
                            <i class="fas fa-arrow-<?php echo $kpis['receita_variacao'] >= 0 ? 'up' : 'down'; ?>"></i>
                            <?php echo number_format(abs($kpis['receita_variacao']), 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value">Kz <?php echo formatMoneyShort($kpis['receita_total']); ?></div>
                    <div class="kpi-label">Receita Total</div>
                    <div class="kpi-footer">
                        <i class="fas fa-arrow-up"></i>
                        Kz <?php echo formatMoneyShort($kpis['receita_mes']); ?> este mês
                    </div>
                </div>

                <!-- Visualizações -->
                <div class="kpi-card kpi-visualizacoes">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="kpi-variacao <?php echo $kpis['visualizacoes_variacao'] >= 0 ? 'positiva' : 'negativa'; ?>">
                            <i class="fas fa-arrow-<?php echo $kpis['visualizacoes_variacao'] >= 0 ? 'up' : 'down'; ?>"></i>
                            <?php echo number_format(abs($kpis['visualizacoes_variacao']), 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo number_format($kpis['visualizacoes_total']); ?></div>
                    <div class="kpi-label">Visualizações Totais</div>
                    <div class="kpi-footer">
                        <i class="fas fa-arrow-up"></i>
                        <?php echo number_format($kpis['visualizacoes_mes']); ?> este mês
                    </div>
                </div>

                <!-- Contratações -->
                <div class="kpi-card kpi-contratacoes">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="kpi-variacao <?php echo $kpis['contratacoes_variacao'] >= 0 ? 'positiva' : 'negativa'; ?>">
                            <i class="fas fa-arrow-<?php echo $kpis['contratacoes_variacao'] >= 0 ? 'up' : 'down'; ?>"></i>
                            <?php echo number_format(abs($kpis['contratacoes_variacao']), 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo $kpis['contratacoes_total']; ?></div>
                    <div class="kpi-label">Contratações</div>
                    <div class="kpi-footer">
                        <i class="fas fa-arrow-up"></i>
                        <?php echo $kpis['contratacoes_mes']; ?> este mês
                    </div>
                </div>

                <!-- Taxa de Conversão -->
                <div class="kpi-card kpi-conversao">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <div class="kpi-variacao <?php echo $kpis['taxa_conversao_variacao'] >= 0 ? 'positiva' : 'negativa'; ?>">
                            <i class="fas fa-arrow-<?php echo $kpis['taxa_conversao_variacao'] >= 0 ? 'up' : 'down'; ?>"></i>
                            <?php echo number_format(abs($kpis['taxa_conversao_variacao']), 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo number_format($kpis['taxa_conversao'], 2); ?>%</div>
                    <div class="kpi-label">Taxa de Conversão</div>
                    <div class="kpi-footer">
                        <i class="fas fa-info-circle"></i>
                        Visualizações → Contratações
                    </div>
                </div>
            </section>

            <!-- ===== SEGUNDA LINHA DE KPIs ===== -->
            <section class="kpis-grid-secundaria animate-fade-up" style="animation-delay: 0.15s;">
                <div class="kpi-mini">
                    <div class="kpi-mini-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="kpi-mini-content">
                        <div class="kpi-mini-value"><?php echo $kpis['avaliacao_media']; ?></div>
                        <div class="kpi-mini-label">Avaliação Média</div>
                    </div>
                    <div class="kpi-mini-variacao positiva">
                        <i class="fas fa-arrow-up"></i> <?php echo number_format($kpis['avaliacao_variacao'], 1); ?>%
                    </div>
                </div>

                <div class="kpi-mini">
                    <div class="kpi-mini-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="kpi-mini-content">
                        <div class="kpi-mini-value"><?php echo $kpis['tempo_medio_resposta']; ?>h</div>
                        <div class="kpi-mini-label">Tempo de Resposta</div>
                    </div>
                    <div class="kpi-mini-variacao positiva">
                        <i class="fas fa-arrow-down"></i> <?php echo number_format(abs($kpis['tempo_medio_resposta_variacao']), 1); ?>%
                    </div>
                </div>

                <div class="kpi-mini">
                    <div class="kpi-mini-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="kpi-mini-content">
                        <div class="kpi-mini-value"><?php echo $kpis['clientes_ativos']; ?></div>
                        <div class="kpi-mini-label">Clientes Ativos</div>
                    </div>
                    <div class="kpi-mini-variacao positiva">
                        <i class="fas fa-arrow-up"></i> <?php echo number_format($kpis['clientes_ativos_variacao'], 1); ?>%
                    </div>
                </div>
            </section>

            <!-- ===== GRÁFICOS PRINCIPAIS ===== -->
            <section class="charts-grid animate-fade-up" style="animation-delay: 0.2s;">
                <!-- Gráfico de Receita -->
                <div class="chart-card">
                    <div class="chart-card-header">
                        <div>
                            <h3><i class="fas fa-chart-line" style="color: #00FFA3;"></i> Evolução de Receita</h3>
                            <p>Receita gerada ao longo do tempo</p>
                        </div>
                        <div class="chart-stats">
                            <span class="chart-stat-value">Kz <?php echo formatMoneyShort(array_sum($receita_mensal['values'])); ?></span>
                            <span class="chart-stat-label">Total do período</span>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartReceita"></canvas>
                    </div>
                </div>

                <!-- Gráfico de Visualizações -->
                <div class="chart-card">
                    <div class="chart-card-header">
                        <div>
                            <h3><i class="fas fa-chart-area" style="color: #00D2FF;"></i> Visualizações</h3>
                            <p>Evolução de visualizações dos serviços</p>
                        </div>
                        <div class="chart-stats">
                            <span class="chart-stat-value"><?php echo number_format(array_sum($visualizacoes_mensal['values'])); ?></span>
                            <span class="chart-stat-label">Total do período</span>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartVisualizacoes"></canvas>
                    </div>
                </div>
            </section>

            <!-- ===== DISTRIBUIÇÃO POR CATEGORIA ===== -->
            <section class="distribuicao-grid animate-fade-up" style="animation-delay: 0.25s;">
                <!-- Gráfico Doughnut -->
                <div class="chart-card">
                    <div class="chart-card-header">
                        <div>
                            <h3><i class="fas fa-chart-pie" style="color: #FFD93D;"></i> Contratações por Categoria</h3>
                            <p>Distribuição de contratações por setor</p>
                        </div>
                    </div>
                    <div class="chart-container chart-container-doughnut">
                        <canvas id="chartCategorias"></canvas>
                    </div>
                </div>

                <!-- Lista de Categorias -->
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-list" style="color: #6C2BD9;"></i> Detalhes por Categoria</h3>
                    </div>
                    <div class="categorias-lista">
                        <?php foreach ($distribuicao_categorias as $cat): ?>
                            <div class="categoria-item">
                                <div class="categoria-icon-box" style="background: <?php echo $cat['color']; ?>20; color: <?php echo $cat['color']; ?>;">
                                    <i class="fas <?php echo $cat['icon']; ?>"></i>
                                </div>
                                <div class="categoria-info-box">
                                    <div class="categoria-info-header">
                                        <span class="categoria-nome"><?php echo $cat['nome']; ?></span>
                                        <span class="categoria-contratacoes"><?php echo $cat['contratacoes']; ?> contratos</span>
                                    </div>
                                    <div class="categoria-barra">
                                        <div class="categoria-barra-fill" style="width: <?php echo $cat['percentual']; ?>%; background: <?php echo $cat['color']; ?>;"></div>
                                    </div>
                                </div>
                                <div class="categoria-percentual" style="color: <?php echo $cat['color']; ?>;">
                                    <?php echo number_format($cat['percentual'], 1); ?>%
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== TOP SERVIÇOS ===== -->
            <section class="top-servicos-section animate-fade-up" style="animation-delay: 0.3s;">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-trophy" style="color: #FFD93D;"></i>
                            Top 5 Serviços com Melhor Desempenho
                        </h3>
                        <a href="index.php" class="btn btn-sm btn-outline">Ver Todos</a>
                    </div>
                    <div class="top-servicos-table">
                        <div class="top-servicos-header">
                            <div class="ts-col-pos">#</div>
                            <div class="ts-col-servico">Serviço</div>
                            <div class="ts-col-num">Views</div>
                            <div class="ts-col-num">Contratos</div>
                            <div class="ts-col-num">Taxa</div>
                            <div class="ts-col-receita">Receita</div>
                            <div class="ts-col-avaliacao">Avaliação</div>
                        </div>
                        <?php foreach ($top_servicos as $index => $servico): ?>
                            <div class="top-servicos-row">
                                <div class="ts-col-pos">
                                    <div class="pos-badge pos-<?php echo $index + 1; ?>">
                                        <?php if ($index === 0): ?>
                                            <i class="fas fa-crown"></i>
                                        <?php elseif ($index === 1): ?>
                                            <i class="fas fa-medal"></i>
                                        <?php elseif ($index === 2): ?>
                                            <i class="fas fa-award"></i>
                                        <?php else: ?>
                                            <?php echo $index + 1; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="ts-col-servico">
                                    <div class="ts-servico-info">
                                        <div class="ts-servico-icon" style="background: <?php echo $servico['categoria_color']; ?>20; color: <?php echo $servico['categoria_color']; ?>;">
                                            <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                        </div>
                                        <div class="ts-servico-detalhes">
                                            <span class="ts-servico-nome"><?php echo $servico['nome']; ?></span>
                                            <span class="ts-servico-categoria"><?php echo $servico['categoria']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ts-col-num">
                                    <i class="fas fa-eye"></i>
                                    <?php echo number_format($servico['visualizacoes']); ?>
                                </div>
                                <div class="ts-col-num">
                                    <i class="fas fa-handshake"></i>
                                    <?php echo $servico['contratacoes']; ?>
                                </div>
                                <div class="ts-col-num">
                                    <span class="taxa-badge"><?php echo number_format($servico['taxa_conversao'], 1); ?>%</span>
                                </div>
                                <div class="ts-col-receita">
                                    Kz <?php echo formatMoneyShort($servico['receita']); ?>
                                </div>
                                <div class="ts-col-avaliacao">
                                    <i class="fas fa-star"></i>
                                    <?php echo $servico['avaliacao']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== PERFORMANCE E HORÁRIOS ===== -->
            <section class="performance-grid animate-fade-up" style="animation-delay: 0.35s;">
                <!-- Performance Diária -->
                <div class="chart-card">
                    <div class="chart-card-header">
                        <div>
                            <h3><i class="fas fa-calendar-week" style="color: #00FFA3;"></i> Performance Semanal</h3>
                            <p>Distribuição por dia da semana</p>
                        </div>
                    </div>
                    <div class="chart-container chart-container-small">
                        <canvas id="chartSemanal"></canvas>
                    </div>
                </div>

                <!-- Horários de Pico -->
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-clock" style="color: #FFD93D;"></i> Horários de Pico</h3>
                    </div>
                    <div class="horarios-lista">
                        <?php foreach ($horarios_pico as $horario): ?>
                            <div class="horario-item">
                                <span class="horario-hora"><?php echo $horario['hora']; ?></span>
                                <div class="horario-barra">
                                    <div class="horario-barra-fill" style="width: <?php echo $horario['percentual']; ?>%;"></div>
                                </div>
                                <span class="horario-count"><?php echo $horario['visualizacoes']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== CLIENTES MAIS ATIVOS ===== -->
            <section class="clientes-top-section animate-fade-up" style="animation-delay: 0.4s;">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-users" style="color: #6C2BD9;"></i>
                            Clientes Mais Ativos
                        </h3>
                        <a href="../financeiro/clientes.php" class="btn btn-sm btn-outline">Ver Todos</a>
                    </div>
                    <div class="clientes-top-lista">
                        <?php foreach ($clientes_top as $index => $cliente): ?>
                            <div class="cliente-top-item">
                                <div class="cliente-top-pos"><?php echo $index + 1; ?></div>
                                <div class="cliente-top-avatar">
                                    <img src="../../../assets/images/<?php echo $cliente['avatar']; ?>"
                                         alt="<?php echo $cliente['nome']; ?>"
                                         onerror="this.src='<?php echo getAvatarUrl($cliente['nome']); ?>'">
                                </div>
                                <div class="cliente-top-info">
                                    <span class="cliente-top-nome"><?php echo $cliente['nome']; ?></span>
                                    <span class="cliente-top-tipo"><?php echo $cliente['tipo']; ?></span>
                                </div>
                                <div class="cliente-top-stats">
                                    <div class="cliente-top-stat">
                                        <i class="fas fa-handshake"></i>
                                        <span><?php echo $cliente['contratacoes']; ?> contratos</span>
                                    </div>
                                    <div class="cliente-top-stat">
                                        <i class="fas fa-coins"></i>
                                        <span>Kz <?php echo formatMoneyShort($cliente['receita']); ?></span>
                                    </div>
                                </div>
                                <div class="cliente-top-avaliacao">
                                    <i class="fas fa-star"></i>
                                    <?php echo $cliente['avaliacao']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== COMPARATIVO MENSAL ===== -->
            <section class="comparativo-section animate-fade-up" style="animation-delay: 0.45s;">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-exchange-alt" style="color: #00D2FF;"></i>
                            Comparativo com Mês Anterior
                        </h3>
                    </div>
                    <div class="comparativo-grid">
                        <?php foreach ($comparativo as $key => $comp): 
                            $labels = [
                                'visualizacoes' => ['label' => 'Visualizações', 'icon' => 'fa-eye', 'format' => 'number'],
                                'contratacoes' => ['label' => 'Contratações', 'icon' => 'fa-handshake', 'format' => 'number'],
                                'receita' => ['label' => 'Receita', 'icon' => 'fa-coins', 'format' => 'money'],
                                'avaliacao' => ['label' => 'Avaliação', 'icon' => 'fa-star', 'format' => 'decimal'],
                                'clientes_novos' => ['label' => 'Novos Clientes', 'icon' => 'fa-user-plus', 'format' => 'number'],
                                'taxa_conversao' => ['label' => 'Taxa Conversão', 'icon' => 'fa-percentage', 'format' => 'percent']
                            ];
                            $info = $labels[$key];
                            
                            $formatValue = function($val, $format) {
                                switch ($format) {
                                    case 'money': return 'Kz ' . formatMoneyShort($val);
                                    case 'percent': return number_format($val, 2) . '%';
                                    case 'decimal': return number_format($val, 1);
                                    default: return number_format($val);
                                }
                            };
                        ?>
                            <div class="comparativo-item">
                                <div class="comparativo-header">
                                    <div class="comparativo-icon">
                                        <i class="fas <?php echo $info['icon']; ?>"></i>
                                    </div>
                                    <span class="comparativo-label"><?php echo $info['label']; ?></span>
                                </div>
                                <div class="comparativo-values">
                                    <div class="comparativo-atual">
                                        <?php echo $formatValue($comp['atual'], $info['format']); ?>
                                    </div>
                                    <div class="comparativo-anterior">
                                        <span class="anterior-label">vs</span>
                                        <?php echo $formatValue($comp['anterior'], $info['format']); ?>
                                    </div>
                                </div>
                                <div class="comparativo-variacao <?php echo $comp['variacao'] >= 0 ? 'positiva' : 'negativa'; ?>">
                                    <i class="fas fa-arrow-<?php echo $comp['variacao'] >= 0 ? 'up' : 'down'; ?>"></i>
                                    <?php echo number_format(abs($comp['variacao']), 1); ?>%
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // ============================================
        // DADOS DOS GRÁFICOS
        // ============================================
        const receitaData = {
            labels: <?php echo json_encode($receita_mensal['labels']); ?>,
            values: <?php echo json_encode($receita_mensal['values']); ?>
        };

        const visualizacoesData = {
            labels: <?php echo json_encode($visualizacoes_mensal['labels']); ?>,
            values: <?php echo json_encode($visualizacoes_mensal['values']); ?>
        };

        const categoriasData = {
            labels: <?php echo json_encode(array_column($distribuicao_categorias, 'nome')); ?>,
            values: <?php echo json_encode(array_column($distribuicao_categorias, 'contratacoes')); ?>,
            colors: <?php echo json_encode(array_column($distribuicao_categorias, 'color')); ?>
        };

        const semanalData = {
            labels: <?php echo json_encode($performance_diaria['labels']); ?>,
            visualizacoes: <?php echo json_encode($performance_diaria['visualizacoes']); ?>,
            contratacoes: <?php echo json_encode($performance_diaria['contratacoes']); ?>
        };

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
                if (existingToasts.length >= 5) {
                    existingToasts[0].remove();
                }

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
        // FILTRO DE PERÍODO
        // ============================================
        function mudarPeriodo(periodo) {
            document.querySelectorAll('.periodo-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.periodo === periodo);
            });

            const labels = {
                '7d': 'Últimos 7 dias',
                '30d': 'Últimos 30 dias',
                '6m': 'Últimos 6 meses',
                '1a': 'Último ano',
                'custom': 'Período Personalizado'
            };

            mostrarToast('Período alterado para: ' + labels[periodo], 'info');
        }

        function abrirPeriodoCustom() {
            mostrarToast('Seletor de datas personalizado em desenvolvimento', 'info');
        }

        // ============================================
        // EXPORTAR ESTATÍSTICAS
        // ============================================
        function exportarEstatisticas() {
            mostrarToast('A preparar exportação...', 'info');
            
            setTimeout(() => {
                mostrarToast('Estatísticas exportadas com sucesso!', 'success');
            }, 1500);
        }

        // ============================================
        // INICIALIZAR GRÁFICOS
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Chart === 'undefined') {
                console.warn('Chart.js não carregado');
                return;
            }

            // Configurações globais de tema
            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
            const textColor = isDark ? '#B8C6D4' : '#4A5A6A';
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.06)' : 'rgba(0, 0, 0, 0.06)';

            Chart.defaults.color = textColor;
            Chart.defaults.borderColor = gridColor;
            Chart.defaults.font.family = "'Inter', sans-serif";

            // ============================================
            // GRÁFICO DE RECEITA
            // ============================================
            const receitaCtx = document.getElementById('chartReceita');
            if (receitaCtx) {
                const gradient = receitaCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
                gradient.addColorStop(0, 'rgba(0, 255, 163, 0.3)');
                gradient.addColorStop(1, 'rgba(0, 255, 163, 0.01)');

                new Chart(receitaCtx, {
                    type: 'line',
                    data: {
                        labels: receitaData.labels,
                        datasets: [{
                            label: 'Receita (Kz)',
                            data: receitaData.values,
                            backgroundColor: gradient,
                            borderColor: '#00FFA3',
                            borderWidth: 3,
                            pointBackgroundColor: '#00FFA3',
                            pointBorderColor: '#FFFFFF',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: 'rgba(10, 22, 40, 0.95)',
                                titleColor: '#FFFFFF',
                                bodyColor: '#B8C6D4',
                                padding: 12,
                                cornerRadius: 8,
                                displayColors: false,
                                callbacks: {
                                    label: function(context) {
                                        return 'Kz ' + context.parsed.y.toLocaleString('pt-AO');
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: gridColor },
                                ticks: {
                                    callback: function(value) {
                                        return 'Kz ' + (value / 1000000).toFixed(1) + 'M';
                                    }
                                }
                            },
                            x: {
                                grid: { display: false }
                            }
                        }
                    }
                });
            }

            // ============================================
            // GRÁFICO DE VISUALIZAÇÕES
            // ============================================
            const visualizacoesCtx = document.getElementById('chartVisualizacoes');
            if (visualizacoesCtx) {
                const gradient = visualizacoesCtx.getContext('2d').createLinearGradient(0, 0, 0, 300);
                gradient.addColorStop(0, 'rgba(0, 210, 255, 0.3)');
                gradient.addColorStop(1, 'rgba(0, 210, 255, 0.01)');

                new Chart(visualizacoesCtx, {
                    type: 'line',
                    data: {
                        labels: visualizacoesData.labels,
                        datasets: [{
                            label: 'Visualizações',
                            data: visualizacoesData.values,
                            backgroundColor: gradient,
                            borderColor: '#00D2FF',
                            borderWidth: 3,
                            pointBackgroundColor: '#00D2FF',
                            pointBorderColor: '#FFFFFF',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: 'rgba(10, 22, 40, 0.95)',
                                titleColor: '#FFFFFF',
                                bodyColor: '#B8C6D4',
                                padding: 12,
                                cornerRadius: 8,
                                displayColors: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: gridColor }
                            },
                            x: {
                                grid: { display: false }
                            }
                        }
                    }
                });
            }

            // ============================================
            // GRÁFICO DE CATEGORIAS (DOUGHNUT)
            // ============================================
            const categoriasCtx = document.getElementById('chartCategorias');
            if (categoriasCtx) {
                new Chart(categoriasCtx, {
                    type: 'doughnut',
                    data: {
                        labels: categoriasData.labels,
                        datasets: [{
                            data: categoriasData.values,
                            backgroundColor: categoriasData.colors,
                            borderWidth: 0,
                            hoverOffset: 10
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle',
                                    font: { size: 12 }
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(10, 22, 40, 0.95)',
                                titleColor: '#FFFFFF',
                                bodyColor: '#B8C6D4',
                                padding: 12,
                                cornerRadius: 8,
                                callbacks: {
                                    label: function(context) {
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percent = ((context.parsed / total) * 100).toFixed(1);
                                        return context.label + ': ' + context.parsed + ' (' + percent + '%)';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // ============================================
            // GRÁFICO SEMANAL (BAR)
            // ============================================
            const semanalCtx = document.getElementById('chartSemanal');
            if (semanalCtx) {
                new Chart(semanalCtx, {
                    type: 'bar',
                    data: {
                        labels: semanalData.labels,
                        datasets: [
                            {
                                label: 'Visualizações',
                                data: semanalData.visualizacoes,
                                backgroundColor: '#00FFA3',
                                borderRadius: 6,
                                borderSkipped: false
                            },
                            {
                                label: 'Contratações',
                                data: semanalData.contratacoes,
                                backgroundColor: '#00D2FF',
                                borderRadius: 6,
                                borderSkipped: false
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
                                    pointStyle: 'circle',
                                    font: { size: 12 }
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(10, 22, 40, 0.95)',
                                titleColor: '#FFFFFF',
                                bodyColor: '#B8C6D4',
                                padding: 12,
                                cornerRadius: 8
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: gridColor },
                                ticks: { stepSize: 2 }
                            },
                            x: {
                                grid: { display: false }
                            }
                        }
                    }
                });
            }
        });
    </script>

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO                             -->
    <!-- ========================================== -->
    <style>
        /* ========================================== */
        /* TOAST NOTIFICATIONS                        */
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
            background: linear-gradient(180deg, #00FFA3 0%, #00D2FF 100%);
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

        .header-left h1 .icon { color: #00FFA3; font-size: 0.85em; }

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
        .header-left .breadcrumb a:hover { color: #00FFA3; }
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

        .btn-theme:hover { border-color: #00FFA3; color: #00FFA3; }
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
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            flex-shrink: 0;
        }

        .periodo-label i { color: #00FFA3; }

        .periodo-opcoes {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            flex: 1;
        }

        .periodo-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .periodo-btn:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
        }

        .periodo-btn.active {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            border-color: transparent;
            font-weight: 600;
        }

        /* ========================================== */
        /* KPIs PRINCIPAIS                            */
        /* ========================================== */
        .kpis-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-md);
        }

        .kpi-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .kpi-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
        }

        .kpi-receita::before { background: linear-gradient(90deg, #00FFA3 0%, #00FFA3 100%); }
        .kpi-visualizacoes::before { background: linear-gradient(90deg, #00D2FF 0%, #00D2FF 100%); }
        .kpi-contratacoes::before { background: linear-gradient(90deg, #FFD93D 0%, #FFD93D 100%); }
        .kpi-conversao::before { background: linear-gradient(90deg, #6C2BD9 0%, #6C2BD9 100%); }

        .kpi-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
            transform: translateY(-2px);
        }

        .kpi-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: var(--space-sm);
        }

        .kpi-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .kpi-variacao {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .kpi-variacao.positiva {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .kpi-variacao.negativa {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .kpi-value {
            font-family: var(--font-display);
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1;
            letter-spacing: -0.5px;
        }

        .kpi-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .kpi-footer {
            display: flex;
            align-items: center;
            gap: 6px;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: auto;
        }

        .kpi-footer i {
            color: #00FFA3;
            font-size: 10px;
        }

        /* ========================================== */
        /* KPIs SECUNDÁRIOS                           */
        /* ========================================== */
        .kpis-grid-secundaria {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .kpi-mini {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .kpi-mini:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .kpi-mini-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .kpi-mini-content {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .kpi-mini-value {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .kpi-mini-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-weight: 500;
        }

        .kpi-mini-variacao {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 8px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .kpi-mini-variacao.positiva {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        /* ========================================== */
        /* CHARTS GRID                                */
        /* ========================================== */
        .charts-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .chart-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .chart-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .chart-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
            flex-wrap: wrap;
        }

        .chart-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 4px 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .chart-card-header p {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin: 0;
        }

        .chart-stats {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
            flex-shrink: 0;
        }

        .chart-stat-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        .chart-stat-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        .chart-container-doughnut {
            height: 320px;
        }

        .chart-container-small {
            height: 260px;
        }

        /* ========================================== */
        /* CARDS                                      */
        /* ========================================== */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            overflow: hidden;
        }

        .card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
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
        /* DISTRIBUIÇÃO POR CATEGORIA                 */
        /* ========================================== */
        .distribuicao-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .categorias-lista {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .categoria-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .categoria-icon-box {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .categoria-info-box {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .categoria-info-header {
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

        .categoria-contratacoes {
            font-size: var(--text-xs);
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

        .categoria-percentual {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            min-width: 60px;
            text-align: right;
            flex-shrink: 0;
        }

        /* ========================================== */
        /* TOP SERVIÇOS                               */
        /* ========================================== */
        .top-servicos-section {
            margin-bottom: var(--space-lg);
        }

        .top-servicos-table {
            padding: var(--space-md);
            overflow-x: auto;
        }

        .top-servicos-header,
        .top-servicos-row {
            display: grid;
            grid-template-columns: 60px 2fr 100px 100px 100px 120px 100px;
            gap: var(--space-md);
            align-items: center;
            min-width: 900px;
        }

        .top-servicos-header {
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .top-servicos-row {
            padding: var(--space-md);
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .top-servicos-row:last-child {
            border-bottom: none;
        }

        .top-servicos-row:hover {
            background: var(--bg-input);
            border-radius: var(--radius-md);
        }

        .pos-badge {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 14px;
            font-weight: 700;
            margin: 0 auto;
        }

        .pos-1 { background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%); color: #0A1628; box-shadow: 0 4px 12px rgba(255, 217, 61, 0.4); }
        .pos-2 { background: linear-gradient(135deg, #E8ECF1 0%, #B8C6D4 100%); color: #0A1628; box-shadow: 0 4px 12px rgba(232, 236, 241, 0.3); }
        .pos-3 { background: linear-gradient(135deg, #CD7F32 0%, #8B5A2B 100%); color: #FFFFFF; box-shadow: 0 4px 12px rgba(205, 127, 50, 0.4); }
        .pos-4, .pos-5 { background: var(--bg-input); color: var(--text-muted); }

        .ts-servico-info {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            min-width: 0;
        }

        .ts-servico-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .ts-servico-detalhes {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .ts-servico-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ts-servico-categoria {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .ts-col-num {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .ts-col-num i {
            color: #00FFA3;
            font-size: 12px;
        }

        .taxa-badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
        }

        .ts-col-receita {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #00FFA3;
        }

        .ts-col-avaliacao {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .ts-col-avaliacao i {
            color: #FFD93D;
            font-size: 12px;
        }

        /* ========================================== */
        /* PERFORMANCE                                */
        /* ========================================== */
        .performance-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .horarios-lista {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .horario-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .horario-hora {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-weight: 500;
            min-width: 70px;
            flex-shrink: 0;
        }

        .horario-barra {
            flex: 1;
            height: 8px;
            background: var(--bg-input);
            border-radius: 4px;
            overflow: hidden;
        }

        .horario-barra-fill {
            height: 100%;
            background: linear-gradient(90deg, #FFD93D 0%, #FF9F43 100%);
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .horario-count {
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 700;
            color: var(--text-primary);
            min-width: 40px;
            text-align: right;
            flex-shrink: 0;
        }

        /* ========================================== */
        /* CLIENTES TOP                               */
        /* ========================================== */
        .clientes-top-section {
            margin-bottom: var(--space-lg);
        }

        .clientes-top-lista {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .cliente-top-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .cliente-top-item:hover {
            border-color: #00FFA3;
            transform: translateX(4px);
        }

        .cliente-top-pos {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 13px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .cliente-top-avatar {
            flex-shrink: 0;
        }

        .cliente-top-avatar img {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #00FFA3;
        }

        .cliente-top-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .cliente-top-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cliente-top-tipo {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cliente-top-stats {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            flex-shrink: 0;
        }

        .cliente-top-stat {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .cliente-top-stat i {
            color: #00FFA3;
            font-size: 11px;
        }

        .cliente-top-avaliacao {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 6px 12px;
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            flex-shrink: 0;
        }

        /* ========================================== */
        /* COMPARATIVO                                */
        /* ========================================== */
        .comparativo-section {
            margin-bottom: var(--space-lg);
        }

        .comparativo-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            padding: var(--space-lg);
        }

        .comparativo-item {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .comparativo-item:hover {
            border-color: #00D2FF;
            transform: translateY(-2px);
        }

        .comparativo-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .comparativo-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .comparativo-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .comparativo-values {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .comparativo-atual {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .comparativo-anterior {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .anterior-label {
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            font-size: 9px;
        }

        .comparativo-variacao {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 8px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
            width: fit-content;
        }

        .comparativo-variacao.positiva {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .comparativo-variacao.negativa {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .kpis-grid { grid-template-columns: repeat(2, 1fr); }
            .kpis-grid-secundaria { grid-template-columns: 1fr; }
            .charts-grid { grid-template-columns: 1fr; }
            .distribuicao-grid { grid-template-columns: 1fr; }
            .performance-grid { grid-template-columns: 1fr; }
            .comparativo-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .comparativo-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .kpis-grid { grid-template-columns: 1fr; }
            .kpi-value { font-size: 28px; }
            
            .periodo-selector { flex-direction: column; align-items: stretch; }
            .periodo-opcoes {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 4px;
            }
            .periodo-btn { white-space: nowrap; flex-shrink: 0; }
            
            .chart-container { height: 250px; }
            .chart-container-doughnut { height: 280px; }
            
            .top-servicos-header,
            .top-servicos-row { grid-template-columns: 50px 2fr 80px 80px 80px 100px 80px; }
            
            .cliente-top-stats { width: 100%; justify-content: flex-start; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
            
            .categorias-lista,
            .horarios-lista,
            .clientes-top-lista,
            .comparativo-grid { padding: var(--space-md); }
        }

        @media (max-width: 480px) {
            .kpi-value { font-size: 24px; }
            .chart-stat-value { font-size: var(--text-h4); }
            
            .cliente-top-item { flex-wrap: wrap; }
            .cliente-top-info { width: calc(100% - 100px); }
            
            .cliente-top-stats { font-size: 10px; }
            
            .page-header { padding: var(--space-sm) var(--space-md); }
            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
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