<?php
// painel/individual/financeiro/assinatura-historico.php - Histórico de Assinaturas
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Histórico de Assinaturas';
$pagina_atual = 'assinatura';

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($valor_receber)) $valor_receber = 850000;
if (!isset($total_faturas_pendentes)) $total_faturas_pendentes = 12;

// ============================================
// DADOS MOCKADOS - ASSINATURA ATUAL
// ============================================
$assinatura_atual = [
    'id' => 1,
    'plano' => 'Pro',
    'plano_icon' => 'fa-crown',
    'plano_color' => '#FFD93D',
    'valor' => 25000,
    'periodo' => 'Mensal',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_inicio' => '2025-06-15',
    'data_proximo_pagamento' => '2026-02-28',
    'dias_restantes' => 10
];

// ============================================
// HISTÓRICO DE ASSINATURAS (PAGAMENTOS)
// ============================================
$historico_assinaturas = [
    [
        'id' => 1,
        'referencia' => 'PAG-2026-0125',
        'plano' => 'Pro',
        'plano_icon' => 'fa-crown',
        'plano_color' => '#FFD93D',
        'periodo_faturado' => 'Janeiro 2026',
        'valor' => 25000,
        'metodo' => 'Multicaixa Express',
        'metodo_icon' => 'fa-credit-card',
        'metodo_color' => '#00D2FF',
        'data_pagamento' => '2026-01-28 10:30:00',
        'data_inicio_periodo' => '2026-01-15',
        'data_fim_periodo' => '2026-02-15',
        'status' => 'confirmado',
        'status_label' => 'Confirmado',
        'comprovativo' => 'comprovativo-001.pdf',
        'fatura' => 'FT-2026-0125',
        'processado_por' => 'Sistema Automático',
        'notas' => null
    ],
    [
        'id' => 2,
        'referencia' => 'PAG-2025-0892',
        'plano' => 'Pro',
        'plano_icon' => 'fa-crown',
        'plano_color' => '#FFD93D',
        'periodo_faturado' => 'Dezembro 2025',
        'valor' => 25000,
        'metodo' => 'Transferência Bancária',
        'metodo_icon' => 'fa-university',
        'metodo_color' => '#6C2BD9',
        'data_pagamento' => '2025-12-28 14:20:00',
        'data_inicio_periodo' => '2025-12-15',
        'data_fim_periodo' => '2026-01-15',
        'status' => 'confirmado',
        'status_label' => 'Confirmado',
        'comprovativo' => 'comprovativo-002.pdf',
        'fatura' => 'FT-2025-0892',
        'processado_por' => 'Admin - Carlos Silva',
        'notas' => 'Pagamento validado com sucesso'
    ],
    [
        'id' => 3,
        'referencia' => 'PAG-2025-0745',
        'plano' => 'Pro',
        'plano_icon' => 'fa-crown',
        'plano_color' => '#FFD93D',
        'periodo_faturado' => 'Novembro 2025',
        'valor' => 25000,
        'metodo' => 'Multicaixa Express',
        'metodo_icon' => 'fa-credit-card',
        'metodo_color' => '#00D2FF',
        'data_pagamento' => '2025-11-28 09:15:00',
        'data_inicio_periodo' => '2025-11-15',
        'data_fim_periodo' => '2025-12-15',
        'status' => 'confirmado',
        'status_label' => 'Confirmado',
        'comprovativo' => 'comprovativo-003.pdf',
        'fatura' => 'FT-2025-0745',
        'processado_por' => 'Sistema Automático',
        'notas' => null
    ],
    [
        'id' => 4,
        'referencia' => 'PAG-2025-0612',
        'plano' => 'Pro',
        'plano_icon' => 'fa-crown',
        'plano_color' => '#FFD93D',
        'periodo_faturado' => 'Outubro 2025',
        'valor' => 25000,
        'metodo' => 'Transferência Bancária',
        'metodo_icon' => 'fa-university',
        'metodo_color' => '#6C2BD9',
        'data_pagamento' => '2025-10-28 16:45:00',
        'data_inicio_periodo' => '2025-10-15',
        'data_fim_periodo' => '2025-11-15',
        'status' => 'confirmado',
        'status_label' => 'Confirmado',
        'comprovativo' => 'comprovativo-004.pdf',
        'fatura' => 'FT-2025-0612',
        'processado_por' => 'Sistema Automático',
        'notas' => null
    ],
    [
        'id' => 5,
        'referencia' => 'PAG-2025-0489',
        'plano' => 'Pro',
        'plano_icon' => 'fa-crown',
        'plano_color' => '#FFD93D',
        'periodo_faturado' => 'Setembro 2025',
        'valor' => 25000,
        'metodo' => 'Multicaixa Express',
        'metodo_icon' => 'fa-credit-card',
        'metodo_color' => '#00D2FF',
        'data_pagamento' => '2025-09-28 11:00:00',
        'data_inicio_periodo' => '2025-09-15',
        'data_fim_periodo' => '2025-10-15',
        'status' => 'confirmado',
        'status_label' => 'Confirmado',
        'comprovativo' => 'comprovativo-005.pdf',
        'fatura' => 'FT-2025-0489',
        'processado_por' => 'Sistema Automático',
        'notas' => null
    ],
    [
        'id' => 6,
        'referencia' => 'PAG-2025-0345',
        'plano' => 'Básico',
        'plano_icon' => 'fa-user',
        'plano_color' => '#00D2FF',
        'periodo_faturado' => 'Agosto 2025',
        'valor' => 15000,
        'metodo' => 'Multicaixa Express',
        'metodo_icon' => 'fa-credit-card',
        'metodo_color' => '#00D2FF',
        'data_pagamento' => '2025-08-28 09:30:00',
        'data_inicio_periodo' => '2025-08-15',
        'data_fim_periodo' => '2025-09-15',
        'status' => 'confirmado',
        'status_label' => 'Confirmado',
        'comprovativo' => 'comprovativo-006.pdf',
        'fatura' => 'FT-2025-0345',
        'processado_por' => 'Sistema Automático',
        'notas' => 'Upgrade para plano Pro efetuado em Setembro'
    ],
    [
        'id' => 7,
        'referencia' => 'PAG-2025-0218',
        'plano' => 'Básico',
        'plano_icon' => 'fa-user',
        'plano_color' => '#00D2FF',
        'periodo_faturado' => 'Julho 2025',
        'valor' => 15000,
        'metodo' => 'Transferência Bancária',
        'metodo_icon' => 'fa-university',
        'metodo_color' => '#6C2BD9',
        'data_pagamento' => '2025-07-28 15:20:00',
        'data_inicio_periodo' => '2025-07-15',
        'data_fim_periodo' => '2025-08-15',
        'status' => 'confirmado',
        'status_label' => 'Confirmado',
        'comprovativo' => 'comprovativo-007.pdf',
        'fatura' => 'FT-2025-0218',
        'processado_por' => 'Admin - Ana Costa',
        'notas' => null
    ],
    [
        'id' => 8,
        'referencia' => 'PAG-2025-0102',
        'plano' => 'Básico',
        'plano_icon' => 'fa-user',
        'plano_color' => '#00D2FF',
        'periodo_faturado' => 'Junho 2025',
        'valor' => 15000,
        'metodo' => 'Multicaixa Express',
        'metodo_icon' => 'fa-credit-card',
        'metodo_color' => '#00D2FF',
        'data_pagamento' => '2025-06-15 10:00:00',
        'data_inicio_periodo' => '2025-06-15',
        'data_fim_periodo' => '2025-07-15',
        'status' => 'confirmado',
        'status_label' => 'Confirmado',
        'comprovativo' => 'comprovativo-008.pdf',
        'fatura' => 'FT-2025-0102',
        'processado_por' => 'Sistema Automático',
        'notas' => 'Primeira assinatura - Ativação de conta'
    ],
    [
        'id' => 9,
        'referencia' => 'PAG-2026-0150',
        'plano' => 'Pro',
        'plano_icon' => 'fa-crown',
        'plano_color' => '#FFD93D',
        'periodo_faturado' => 'Fevereiro 2026',
        'valor' => 25000,
        'metodo' => 'Multicaixa Express',
        'metodo_icon' => 'fa-credit-card',
        'metodo_color' => '#00D2FF',
        'data_pagamento' => '2026-02-14 11:30:00',
        'data_inicio_periodo' => '2026-02-15',
        'data_fim_periodo' => '2026-03-15',
        'status' => 'pendente',
        'status_label' => 'Em Análise',
        'comprovativo' => 'comprovativo-009.pdf',
        'fatura' => 'FT-2026-0156',
        'processado_por' => 'Aguarda validação',
        'notas' => 'Aguarda confirmação do comprovativo'
    ],
    [
        'id' => 10,
        'referencia' => 'PAG-2025-0954',
        'plano' => 'Pro',
        'plano_icon' => 'fa-crown',
        'plano_color' => '#FFD93D',
        'periodo_faturado' => 'Janeiro 2026',
        'valor' => 25000,
        'metodo' => 'Multicaixa Express',
        'metodo_icon' => 'fa-credit-card',
        'metodo_color' => '#00D2FF',
        'data_pagamento' => '2026-01-10 14:00:00',
        'data_inicio_periodo' => '2026-01-15',
        'data_fim_periodo' => '2026-02-15',
        'status' => 'rejeitado',
        'status_label' => 'Rejeitado',
        'comprovativo' => 'comprovativo-010.pdf',
        'fatura' => 'FT-2026-0110',
        'processado_por' => 'Admin - Carlos Silva',
        'notas' => 'Comprovativo ilegível. Reenvio solicitado.'
    ]
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_pagamentos = count($historico_assinaturas);
$pagamentos_confirmados = count(array_filter($historico_assinaturas, fn($p) => $p['status'] === 'confirmado'));
$pagamentos_pendentes = count(array_filter($historico_assinaturas, fn($p) => $p['status'] === 'pendente'));
$pagamentos_rejeitados = count(array_filter($historico_assinaturas, fn($p) => $p['status'] === 'rejeitado'));

$valor_total_pago = array_sum(array_map(fn($p) => $p['status'] === 'confirmado' ? $p['valor'] : 0, $historico_assinaturas));
$valor_total_pendente = array_sum(array_map(fn($p) => $p['status'] === 'pendente' ? $p['valor'] : 0, $historico_assinaturas));

// Meses como cliente
$data_primeiro_pagamento = '2025-06-15';
$data_hoje = date('Y-m-d');
$meses_cliente = round((strtotime($data_hoje) - strtotime($data_primeiro_pagamento)) / (30 * 24 * 3600));

// Duração média entre pagamentos
$duracao_media_dias = 30;

// ============================================
// MÉTODOS ÚNICOS
// ============================================
$metodos_unicos = [];
$planos_unicos = [];
foreach ($historico_assinaturas as $p) {
    $metodos_unicos[$p['metodo']] = $p['metodo'];
    $planos_unicos[$p['plano']] = $p['plano'];
}

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
        if ($diff < 2592000) return 'há ' . floor($diff / 604800) . ' semanas';
        return date('d/m/Y', strtotime($datetime));
    }
}

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'confirmado' => 'status-confirmado',
            'pendente' => 'status-pendente',
            'rejeitado' => 'status-rejeitado',
            'cancelado' => 'status-cancelado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getStatusIcon')) {
    function getStatusIcon($status) {
        $icons = [
            'confirmado' => 'fa-check-circle',
            'pendente' => 'fa-clock',
            'rejeitado' => 'fa-times-circle',
            'cancelado' => 'fa-ban'
        ];
        return isset($icons[$status]) ? $icons[$status] : 'fa-clock';
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
                        <i class="fas fa-history icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $total_pagamentos; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Histórico de Assinaturas</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="pagar-assinatura.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Novo Pagamento
                    </a>
                    <a href="index.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== ASSINATURA ATUAL ===== -->
            <section class="assinatura-atual animate-fade-up">
                <div class="assinatura-atual-card">
                    <div class="assinatura-atual-icon" style="background: <?php echo $assinatura_atual['plano_color']; ?>20; color: <?php echo $assinatura_atual['plano_color']; ?>;">
                        <i class="fas <?php echo $assinatura_atual['plano_icon']; ?>"></i>
                    </div>
                    <div class="assinatura-atual-info">
                        <span class="assinatura-atual-label">Plano Atual</span>
                        <h3 class="assinatura-atual-plano"><?php echo $assinatura_atual['plano']; ?></h3>
                        <span class="assinatura-atual-status">
                            <i class="fas fa-check-circle"></i> <?php echo $assinatura_atual['status_label']; ?>
                        </span>
                    </div>
                    <div class="assinatura-atual-valor">
                        <span class="assinatura-atual-valor-numero">Kz <?php echo formatMoney($assinatura_atual['valor']); ?></span>
                        <span class="assinatura-atual-valor-periodo">/ <?php echo $assinatura_atual['periodo']; ?></span>
                    </div>
                    <div class="assinatura-atual-proximo">
                        <span class="assinatura-atual-proximo-label">Próximo Pagamento</span>
                        <span class="assinatura-atual-proximo-data"><?php echo formatDate($assinatura_atual['data_proximo_pagamento']); ?></span>
                        <span class="assinatura-atual-proximo-dias"><?php echo $assinatura_atual['dias_restantes']; ?> dias</span>
                    </div>
                </div>
            </section>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $pagamentos_confirmados; ?></div>
                    <div class="label">Pagamentos Confirmados</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> <?php echo round(($pagamentos_confirmados / $total_pagamentos) * 100); ?>% do total
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $pagamentos_pendentes; ?></div>
                    <div class="label">Em Análise</div>
                    <div class="trend neutral">
                        <i class="fas fa-hourglass-half"></i> Aguarda validação
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="value"><?php echo $pagamentos_rejeitados; ?></div>
                    <div class="label">Rejeitados</div>
                    <div class="trend down">
                        <i class="fas fa-exclamation-triangle"></i> Requer atenção
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($valor_total_pago / 1000, 0); ?>k</div>
                    <div class="label">Valor Total Pago</div>
                    <div class="trend up">
                        <i class="fas fa-calendar"></i> <?php echo $meses_cliente; ?> meses como cliente
                    </div>
                </div>
            </section>

            <!-- ===== RESUMO FINANCEIRO ===== -->
            <section class="resumo-financeiro animate-fade-up" style="animation-delay: 0.15s;">
                <div class="resumo-item">
                    <div class="resumo-icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Total Pago</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_total_pago); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Em Análise</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_total_pendente); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon blue">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Duração Média</span>
                        <span class="resumo-valor"><?php echo $duracao_media_dias; ?> dias/período</span>
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.2s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchHistorico" placeholder="Buscar por referência, plano ou fatura..." 
                               oninput="filtrarHistorico()">
                    </div>
                    <div class="filtros-actions">
                        <button class="btn btn-sm btn-outline" onclick="abrirFiltrosAvancados()">
                            <i class="fas fa-filter"></i> Filtros
                        </button>
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="timeline" onclick="mudarView('timeline')" title="Timeline">
                                <i class="fas fa-stream"></i>
                            </button>
                            <button class="view-btn" data-view="table" onclick="mudarView('table')" title="Tabela">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filtros rápidos por status -->
                <div class="filtros-status">
                    <button class="filtro-status active" data-status="todos" onclick="filtrarPorStatus('todos')">
                        Todos <span class="count"><?php echo $total_pagamentos; ?></span>
                    </button>
                    <button class="filtro-status" data-status="confirmado" onclick="filtrarPorStatus('confirmado')">
                        <i class="fas fa-check-circle" style="color: #00FFA3;"></i> Confirmados <span class="count"><?php echo $pagamentos_confirmados; ?></span>
                    </button>
                    <button class="filtro-status" data-status="pendente" onclick="filtrarPorStatus('pendente')">
                        <i class="fas fa-clock" style="color: #FFD93D;"></i> Em Análise <span class="count"><?php echo $pagamentos_pendentes; ?></span>
                    </button>
                    <button class="filtro-status" data-status="rejeitado" onclick="filtrarPorStatus('rejeitado')">
                        <i class="fas fa-times-circle" style="color: #FF6B6B;"></i> Rejeitados <span class="count"><?php echo $pagamentos_rejeitados; ?></span>
                    </button>
                </div>

                <!-- Filtros avançados -->
                <div class="filtros-avancados" id="filtrosAvancados" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Plano</label>
                            <select class="form-control" id="filtroPlano" onchange="filtrarHistorico()">
                                <option value="">Todos os planos</option>
                                <?php foreach ($planos_unicos as $plano): ?>
                                    <option value="<?php echo $plano; ?>"><?php echo $plano; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Método</label>
                            <select class="form-control" id="filtroMetodo" onchange="filtrarHistorico()">
                                <option value="">Todos os métodos</option>
                                <?php foreach ($metodos_unicos as $metodo): ?>
                                    <option value="<?php echo $metodo; ?>"><?php echo $metodo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Período</label>
                            <select class="form-control" id="filtroPeriodo" onchange="filtrarHistorico()">
                                <option value="">Todos os períodos</option>
                                <option value="2026">2026</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="filtros-avancados-actions">
                        <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount">
                            <?php echo $total_pagamentos; ?> resultado(s)
                        </span>
                    </div>
                </div>
            </section>

            <!-- ===== HISTÓRICO (TIMELINE) ===== -->
            <section class="historico-container animate-fade-up" style="animation-delay: 0.25s;">
                <div class="timeline-view" id="timelineView">
                    <?php foreach ($historico_assinaturas as $index => $pagamento): ?>
                        <div class="timeline-item-historico" 
                             data-id="<?php echo $pagamento['id']; ?>"
                             data-status="<?php echo $pagamento['status']; ?>"
                             data-plano="<?php echo $pagamento['plano']; ?>"
                             data-metodo="<?php echo $pagamento['metodo']; ?>"
                             data-periodo="<?php echo date('Y', strtotime($pagamento['data_pagamento'])); ?>"
                             data-busca="<?php echo strtolower($pagamento['referencia'] . ' ' . $pagamento['plano'] . ' ' . $pagamento['fatura'] . ' ' . $pagamento['periodo_faturado']); ?>">
                            
                            <div class="timeline-ponto timeline-ponto-<?php echo $pagamento['status']; ?>" 
                                 style="--status-color: <?php 
                                     echo $pagamento['status'] === 'confirmado' ? '#00FFA3' : 
                                         ($pagamento['status'] === 'pendente' ? '#FFD93D' : '#FF6B6B'); 
                                 ?>;">
                                <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                            </div>

                            <div class="timeline-card-historico">
                                <div class="timeline-card-header">
                                    <div class="timeline-card-title">
                                        <div class="timeline-plano-icon" style="background: <?php echo $pagamento['plano_color']; ?>20; color: <?php echo $pagamento['plano_color']; ?>;">
                                            <i class="fas <?php echo $pagamento['plano_icon']; ?>"></i>
                                        </div>
                                        <div class="timeline-plano-info">
                                            <span class="timeline-plano-nome">Plano <?php echo $pagamento['plano']; ?></span>
                                            <span class="timeline-periodo"><?php echo $pagamento['periodo_faturado']; ?></span>
                                        </div>
                                    </div>
                                    <div class="timeline-card-status">
                                        <span class="badge-status <?php echo getStatusClass($pagamento['status']); ?>">
                                            <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                                            <?php echo $pagamento['status_label']; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="timeline-card-body">
                                    <div class="timeline-info-grid">
                                        <div class="timeline-info-item">
                                            <span class="timeline-info-label">
                                                <i class="fas fa-hashtag"></i>
                                                Referência
                                            </span>
                                            <span class="timeline-info-value"><?php echo $pagamento['referencia']; ?></span>
                                        </div>
                                        <div class="timeline-info-item">
                                            <span class="timeline-info-label">
                                                <i class="fas fa-file-invoice"></i>
                                                Fatura
                                            </span>
                                            <span class="timeline-info-value"><?php echo $pagamento['fatura']; ?></span>
                                        </div>
                                        <div class="timeline-info-item">
                                            <span class="timeline-info-label">
                                                <i class="fas fa-calendar-check"></i>
                                                Data de Pagamento
                                            </span>
                                            <span class="timeline-info-value"><?php echo formatDateTime($pagamento['data_pagamento']); ?></span>
                                        </div>
                                        <div class="timeline-info-item">
                                            <span class="timeline-info-label">
                                                <i class="fas fa-credit-card"></i>
                                                Método
                                            </span>
                                            <span class="timeline-info-value">
                                                <i class="fas <?php echo $pagamento['metodo_icon']; ?>" style="color: <?php echo $pagamento['metodo_color']; ?>;"></i>
                                                <?php echo $pagamento['metodo']; ?>
                                            </span>
                                        </div>
                                        <div class="timeline-info-item">
                                            <span class="timeline-info-label">
                                                <i class="fas fa-calendar-alt"></i>
                                                Período
                                            </span>
                                            <span class="timeline-info-value">
                                                <?php echo formatDate($pagamento['data_inicio_periodo']); ?> 
                                                → 
                                                <?php echo formatDate($pagamento['data_fim_periodo']); ?>
                                            </span>
                                        </div>
                                        <div class="timeline-info-item">
                                            <span class="timeline-info-label">
                                                <i class="fas fa-user-check"></i>
                                                Processado por
                                            </span>
                                            <span class="timeline-info-value"><?php echo $pagamento['processado_por']; ?></span>
                                        </div>
                                    </div>

                                    <?php if (!empty($pagamento['notas'])): ?>
                                        <div class="timeline-nota">
                                            <i class="fas fa-sticky-note"></i>
                                            <span><?php echo $pagamento['notas']; ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="timeline-card-footer">
                                    <div class="timeline-valor">
                                        <span class="timeline-valor-label">Valor Pago</span>
                                        <span class="timeline-valor-numero" style="color: <?php echo $pagamento['status'] === 'confirmado' ? '#00FFA3' : ($pagamento['status'] === 'pendente' ? '#FFD93D' : '#FF6B6B'); ?>;">
                                            Kz <?php echo formatMoney($pagamento['valor']); ?>
                                        </span>
                                    </div>
                                    <div class="timeline-actions">
                                        <?php if ($pagamento['comprovativo']): ?>
                                            <button class="btn-action" onclick="verComprovativo('<?php echo $pagamento['comprovativo']; ?>')" title="Ver Comprovativo">
                                                <i class="fas fa-file-pdf"></i>
                                            </button>
                                        <?php endif; ?>
                                        <a href="fatura-detalhe.php?fatura=<?php echo $pagamento['fatura']; ?>" 
                                           class="btn-action" title="Ver Fatura">
                                            <i class="fas fa-file-invoice"></i>
                                        </a>
                                        <button class="btn-action" onclick="descarregarRecibo(<?php echo $pagamento['id']; ?>)" title="Descarregar Recibo">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <?php if ($pagamento['status'] === 'rejeitado'): ?>
                                            <a href="pagar-assinatura.php" class="btn-action btn-action-warning" title="Reenviar Pagamento">
                                                <i class="fas fa-redo"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Empty State -->
                    <div class="empty-state-historico" id="emptyStateHistorico" style="display: none;">
                        <i class="fas fa-search"></i>
                        <h3>Nenhum registo encontrado</h3>
                        <p>Tente ajustar os filtros de pesquisa</p>
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar Filtros
                        </button>
                    </div>
                </div>

                <!-- ===== VISTA TABELA (escondida por defeito) ===== -->
                <div class="table-view" id="tableView" style="display: none;">
                    <div class="table-responsive">
                        <table class="table-historico">
                            <thead>
                                <tr>
                                    <th>Referência</th>
                                    <th>Plano</th>
                                    <th>Período</th>
                                    <th>Valor</th>
                                    <th>Método</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody id="historicoBody">
                                <?php foreach ($historico_assinaturas as $pagamento): ?>
                                    <tr data-status="<?php echo $pagamento['status']; ?>"
                                        data-plano="<?php echo $pagamento['plano']; ?>"
                                        data-metodo="<?php echo $pagamento['metodo']; ?>"
                                        data-periodo="<?php echo date('Y', strtotime($pagamento['data_pagamento'])); ?>"
                                        data-busca="<?php echo strtolower($pagamento['referencia'] . ' ' . $pagamento['plano'] . ' ' . $pagamento['fatura'] . ' ' . $pagamento['periodo_faturado']); ?>">
                                        <td>
                                            <span class="table-ref"><?php echo $pagamento['referencia']; ?></span>
                                            <span class="table-fatura"><?php echo $pagamento['fatura']; ?></span>
                                        </td>
                                        <td>
                                            <span class="table-plano">
                                                <i class="fas <?php echo $pagamento['plano_icon']; ?>" style="color: <?php echo $pagamento['plano_color']; ?>;"></i>
                                                <?php echo $pagamento['plano']; ?>
                                            </span>
                                        </td>
                                        <td><?php echo $pagamento['periodo_faturado']; ?></td>
                                        <td>
                                            <span class="table-valor" style="color: <?php echo $pagamento['status'] === 'confirmado' ? '#00FFA3' : ($pagamento['status'] === 'pendente' ? '#FFD93D' : '#FF6B6B'); ?>;">
                                                Kz <?php echo formatMoney($pagamento['valor']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="table-metodo">
                                                <i class="fas <?php echo $pagamento['metodo_icon']; ?>" style="color: <?php echo $pagamento['metodo_color']; ?>;"></i>
                                                <?php echo $pagamento['metodo']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="table-data"><?php echo formatDate($pagamento['data_pagamento']); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge-status <?php echo getStatusClass($pagamento['status']); ?>">
                                                <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                                                <?php echo $pagamento['status_label']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <?php if ($pagamento['comprovativo']): ?>
                                                    <button class="btn-action-sm" onclick="verComprovativo('<?php echo $pagamento['comprovativo']; ?>')" title="Ver Comprovativo">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <button class="btn-action-sm" onclick="descarregarRecibo(<?php echo $pagamento['id']; ?>)" title="Descarregar Recibo">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ===== RESUMO ANUAL ===== -->
            <section class="resumo-anual animate-fade-up" style="animation-delay: 0.3s;">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-chart-bar" style="color: #00D2FF;"></i>
                            Resumo por Ano
                        </h3>
                    </div>
                    <div class="resumo-anual-grid">
                        <div class="resumo-anual-item">
                            <div class="resumo-anual-ano">2026</div>
                            <div class="resumo-anual-valor">Kz 75.000</div>
                            <div class="resumo-anual-count">3 pagamentos</div>
                        </div>
                        <div class="resumo-anual-item">
                            <div class="resumo-anual-ano">2025</div>
                            <div class="resumo-anual-valor">Kz 170.000</div>
                            <div class="resumo-anual-count">7 pagamentos</div>
                        </div>
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
        // FILTROS
        // ============================================
        let filtroStatusAtual = 'todos';

        function filtrarPorStatus(status) {
            filtroStatusAtual = status;
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === status);
            });
            filtrarHistorico();
        }

        function filtrarHistorico() {
            const search = (document.getElementById('searchHistorico')?.value || '').toLowerCase().trim();
            const plano = document.getElementById('filtroPlano')?.value || '';
            const metodo = document.getElementById('filtroMetodo')?.value || '';
            const periodo = document.getElementById('filtroPeriodo')?.value || '';

            // Filtrar Timeline
            const timelineItems = document.querySelectorAll('.timeline-item-historico');
            // Filtrar Tabela
            const tableRows = document.querySelectorAll('#historicoBody tr');

            let visiveis = 0;

            // Timeline
            timelineItems.forEach(item => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && item.dataset.status !== filtroStatusAtual) mostrar = false;
                if (mostrar && plano && item.dataset.plano !== plano) mostrar = false;
                if (mostrar && metodo && item.dataset.metodo !== metodo) mostrar = false;
                if (mostrar && periodo && item.dataset.periodo !== periodo) mostrar = false;
                if (mostrar && search && !item.dataset.busca.includes(search)) mostrar = false;

                item.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            // Tabela
            tableRows.forEach(row => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && row.dataset.status !== filtroStatusAtual) mostrar = false;
                if (mostrar && plano && row.dataset.plano !== plano) mostrar = false;
                if (mostrar && metodo && row.dataset.metodo !== metodo) mostrar = false;
                if (mostrar && periodo && row.dataset.periodo !== periodo) mostrar = false;
                if (mostrar && search && !row.dataset.busca.includes(search)) mostrar = false;

                row.style.display = mostrar ? '' : 'none';
            });

            // Atualizar contador
            const count = document.getElementById('resultadosCount');
            if (count) count.textContent = visiveis + ' resultado(s)';

            // Empty state
            const emptyState = document.getElementById('emptyStateHistorico');
            if (visiveis === 0) {
                if (emptyState) emptyState.style.display = 'block';
            } else {
                if (emptyState) emptyState.style.display = 'none';
            }
        }

        function limparFiltros() {
            document.getElementById('searchHistorico').value = '';
            const fPlano = document.getElementById('filtroPlano');
            const fMetodo = document.getElementById('filtroMetodo');
            const fPeriodo = document.getElementById('filtroPeriodo');
            if (fPlano) fPlano.value = '';
            if (fMetodo) fMetodo.value = '';
            if (fPeriodo) fPeriodo.value = '';
            filtroStatusAtual = 'todos';
            
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === 'todos');
            });
            
            filtrarHistorico();
        }

        function abrirFiltrosAvancados() {
            const filtros = document.getElementById('filtrosAvancados');
            const isHidden = filtros.style.display === 'none';
            filtros.style.display = isHidden ? 'block' : 'none';
        }

        // ============================================
        // MUDAR VIEW
        // ============================================
        function mudarView(view) {
            const timelineView = document.getElementById('timelineView');
            const tableView = document.getElementById('tableView');

            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === view);
            });

            if (view === 'table') {
                timelineView.style.display = 'none';
                tableView.style.display = 'block';
            } else {
                timelineView.style.display = 'block';
                tableView.style.display = 'none';
            }

            localStorage.setItem('geonnexus-historico-view', view);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedView = localStorage.getItem('geonnexus-historico-view');
            if (savedView) mudarView(savedView);
        });

        // ============================================
        // AÇÕES
        // ============================================
        function verComprovativo(nome) {
            mostrarToast('A abrir comprovativo: ' + nome, 'info');
        }

        function descarregarRecibo(id) {
            mostrarToast('A descarregar recibo #' + id + '...', 'info');
            setTimeout(() => mostrarToast('Recibo descarregado com sucesso!', 'success'), 1200);
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
            background: linear-gradient(180deg, #FFD93D 0%, #FF9F43 100%);
            border-radius: var(--radius-lg) 0 0 var(--radius-lg);
        }

        .header-left {
            flex: 1;
            min-width: 0;
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

        .header-left h1 .icon { color: #FFD93D; font-size: 0.85em; }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.3);
        }

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
        .header-left .breadcrumb a:hover { color: #FFD93D; }
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

        .btn-theme:hover { border-color: #FFD93D; color: #FFD93D; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* ASSINATURA ATUAL                           */
        /* ========================================== */
        .assinatura-atual {
            margin-bottom: var(--space-lg);
        }

        .assinatura-atual-card {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            padding: var(--space-lg);
            background: linear-gradient(135deg, rgba(255, 217, 61, 0.08) 0%, rgba(255, 159, 67, 0.04) 100%);
            border: 2px solid rgba(255, 217, 61, 0.25);
            border-radius: var(--radius-lg);
            flex-wrap: wrap;
        }

        .assinatura-atual-icon {
            width: 64px;
            height: 64px;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        .assinatura-atual-info {
            flex: 1;
            min-width: 150px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .assinatura-atual-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .assinatura-atual-plano {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .assinatura-atual-status {
            font-size: var(--text-xs);
            color: #00FFA3;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
        }

        .assinatura-atual-valor {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
            padding: 0 var(--space-lg);
            border-left: 1px solid var(--border-color);
            border-right: 1px solid var(--border-color);
        }

        .assinatura-atual-valor-numero {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: #FFD93D;
        }

        .assinatura-atual-valor-periodo {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .assinatura-atual-proximo {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
        }

        .assinatura-atual-proximo-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .assinatura-atual-proximo-data {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
        }

        .assinatura-atual-proximo-dias {
            font-size: var(--text-xs);
            color: #FFD93D;
            font-weight: 700;
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
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .stat-card .icon.red { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }

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
        .stat-card .trend.neutral { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        /* ========================================== */
        /* RESUMO FINANCEIRO                          */
        /* ========================================== */
        .resumo-financeiro {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .resumo-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .resumo-item:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .resumo-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .resumo-icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .resumo-icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .resumo-icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }

        .resumo-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .resumo-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .resumo-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* FILTROS                                    */
        /* ========================================== */
        .filtros {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .filtros-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 10px 14px 10px 42px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .search-box input:focus {
            outline: none;
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .search-box input::placeholder { color: var(--text-muted); }

        .filtros-actions {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
        }

        .view-toggle {
            display: flex;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 2px;
            gap: 2px;
        }

        .view-btn {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            border: none;
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
        }

        .view-btn:hover { color: var(--text-primary); background: var(--bg-card-hover); }
        .view-btn.active { background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%); color: #0A1628; }

        .filtros-status {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .filtro-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
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

        .filtro-status:hover { border-color: #FFD93D; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-color: transparent;
        }

        .filtro-status .count {
            background: rgba(255, 255, 255, 0.2);
            padding: 1px 6px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
        }

        .filtro-status:not(.active) .count {
            background: var(--bg-card);
            color: var(--text-muted);
        }

        .filtros-avancados {
            padding-top: var(--space-md);
            margin-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .filtros-avancados .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: var(--space-md);
        }

        .filtros-avancados-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .resultados-count {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
        }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 10px 14px;
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

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        select.form-control option {
            background: var(--bg-card);
            color: var(--text-primary);
        }

        /* ========================================== */
        /* HISTÓRICO - TIMELINE                       */
        /* ========================================== */
        .historico-container {
            margin-bottom: var(--space-lg);
        }

        .timeline-view {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
            position: relative;
            padding-left: 40px;
        }

        .timeline-view::before {
            content: '';
            position: absolute;
            left: 19px;
            top: 20px;
            bottom: 20px;
            width: 2px;
            background: linear-gradient(180deg, #00FFA3 0%, #FFD93D 50%, #FF6B6B 100%);
            opacity: 0.3;
        }

        .timeline-item-historico {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 0;
            animation: fadeUp 0.5s ease forwards;
        }

        .timeline-ponto {
            position: absolute;
            left: -40px;
            top: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            background: var(--bg-card);
            border: 2px solid var(--status-color);
            color: var(--status-color);
            z-index: 1;
            box-shadow: 0 0 0 4px var(--bg-card), 0 0 20px var(--status-color)40;
        }

        .timeline-card-historico {
            flex: 1;
            min-width: 0;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition-smooth);
            max-width: 100%;
        }

        .timeline-card-historico:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
            border-color: var(--color-aurora);
        }

        .timeline-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            border-bottom: 1px solid var(--border-color);
            background: rgba(0, 210, 255, 0.02);
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .timeline-card-title {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            min-width: 0;
        }

        .timeline-plano-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .timeline-plano-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .timeline-plano-nome {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .timeline-periodo {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .badge-status.status-confirmado { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-rejeitado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-cancelado { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        .timeline-card-body {
            padding: var(--space-md);
        }

        .timeline-info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
        }

        .timeline-info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 0;
        }

        .timeline-info-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .timeline-info-label i { color: #FFD93D; font-size: 10px; }

        .timeline-info-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
            word-break: break-word;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .timeline-nota {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: rgba(255, 217, 61, 0.04);
            border-left: 3px solid #FFD93D;
            border-radius: var(--radius-sm);
            margin-top: var(--space-md);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .timeline-nota i {
            color: #FFD93D;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .timeline-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            border-top: 1px solid var(--border-color);
            background: var(--bg-input);
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .timeline-valor {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .timeline-valor-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .timeline-valor-numero {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
        }

        .timeline-actions {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .btn-action:hover {
            border-color: #FFD93D;
            color: #FFD93D;
            background: rgba(255, 217, 61, 0.05);
            transform: scale(1.05);
        }

        .btn-action-warning {
            border-color: rgba(255, 159, 67, 0.3);
            color: #FF9F43;
        }

        .btn-action-warning:hover {
            border-color: #FF9F43;
            background: rgba(255, 159, 67, 0.1);
        }

        /* ========================================== */
        /* EMPTY STATE                                */
        /* ========================================== */
        .empty-state-historico {
            text-align: center;
            padding: 60px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px dashed var(--border-color);
        }

        .empty-state-historico i {
            font-size: 56px;
            color: var(--text-muted);
            opacity: 0.4;
            margin-bottom: var(--space-md);
            display: block;
        }

        .empty-state-historico h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .empty-state-historico p {
            color: var(--text-muted);
            margin: 0 0 var(--space-lg) 0;
        }

        /* ========================================== */
        /* TABELA                                     */
        /* ========================================== */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            max-width: 100%;
        }

        .table-historico {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 800px;
        }

        .table-historico thead {
            background: var(--bg-input);
        }

        .table-historico thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .table-historico tbody td {
            padding: 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-historico tbody tr {
            transition: var(--transition-smooth);
        }

        .table-historico tbody tr:hover {
            background: var(--bg-input);
        }

        .table-historico tbody tr:last-child td {
            border-bottom: none;
        }

        .table-ref {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .table-fatura {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .table-plano {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .table-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
        }

        .table-metodo {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .table-data {
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .table-actions {
            display: flex;
            gap: 4px;
        }

        .btn-action-sm {
            width: 30px;
            height: 30px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .btn-action-sm:hover {
            border-color: #FFD93D;
            color: #FFD93D;
            background: rgba(255, 217, 61, 0.05);
        }

        /* ========================================== */
        /* RESUMO ANUAL                               */
        /* ========================================== */
        .resumo-anual {
            margin-bottom: var(--space-lg);
        }

        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            overflow: hidden;
            max-width: 100%;
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
            flex-wrap: wrap;
        }

        .resumo-anual-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-md);
            padding: var(--space-lg);
        }

        .resumo-anual-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: var(--space-lg);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .resumo-anual-item:hover {
            border-color: #FFD93D;
            transform: translateY(-2px);
        }

        .resumo-anual-ano {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: #FFD93D;
        }

        .resumo-anual-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        .resumo-anual-count {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .resumo-financeiro { grid-template-columns: 1fr; }
            .timeline-info-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .assinatura-atual-card { flex-direction: column; align-items: stretch; text-align: center; }
            .assinatura-atual-valor { border-left: none; border-right: none; border-top: 1px solid var(--border-color); border-bottom: 1px solid var(--border-color); padding: var(--space-md) 0; align-items: center; }
            .assinatura-atual-proximo { align-items: center; }
            .assinatura-atual-info { align-items: center; }
            .filtros-avancados .form-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            
            .filtros-top { flex-direction: column; align-items: stretch; }
            .filtros-actions { justify-content: space-between; }
            
            .filtros-status {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 4px;
            }
            
            .filtro-status { white-space: nowrap; flex-shrink: 0; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            
            .timeline-view { padding-left: 32px; }
            .timeline-view::before { left: 15px; }
            .timeline-ponto { left: -32px; width: 32px; height: 32px; font-size: 13px; }
            
            .timeline-info-grid { grid-template-columns: 1fr; }
            .timeline-card-footer { flex-direction: column; align-items: stretch; }
            .timeline-actions { justify-content: flex-end; }
            
            .resumo-anual-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .timeline-actions .btn-action { flex: 1; }
        }
    </style>

</body>

</html>