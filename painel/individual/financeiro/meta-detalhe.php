<?php
// painel/individual/financeiro/meta-detalhe.php - Detalhes da Meta
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Detalhes da Meta';
$pagina_atual = 'metas';

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($total_metas)) $total_metas = 5;

// ============================================
// OBTER ID DA META
// ============================================
$id_meta = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - META ATUAL
// ============================================
$meta = [
    'id' => $id_meta,
    'nome' => 'Meta Mensal de Faturamento',
    'descricao' => 'Atingir Kz 4.000.000 em faturamento durante o mês de Fevereiro de 2026. Esta meta representa um crescimento de 15% em relação ao mês anterior e tem como objetivo consolidar a carteira de clientes empresariais.',
    'categoria' => 'Faturamento',
    'categoria_icon' => 'fa-coins',
    'categoria_color' => '#00FFA3',
    'tipo' => 'valor', // valor | numero | percentual
    'periodo' => 'Mensal',
    'data_inicio' => '2026-02-01',
    'data_fim' => '2026-02-28',
    'valor_atual' => 3450000,
    'valor_meta' => 4000000,
    'valor_faltante' => 550000,
    'percentual' => 86,
    'status' => 'em_andamento',
    'status_label' => 'Em Andamento',
    'prioridade' => 'alta',
    'prioridade_label' => 'Alta',
    'cor' => '#00FFA3',
    'responsavel' => 'Carlos Mendes',
    'responsavel_avatar' => 'avatar-1.png',
    'data_criacao' => '2026-01-28 10:30:00',
    'data_atualizacao' => '2026-02-18 14:20:00',
    'notas' => 'Focar nos clientes empresariais e projetos de grande porte para atingir a meta.',
    'dias_restantes' => 10,
    'media_diaria_necessaria' => 55000,
    'media_diaria_atual' => 191666,
    'projecao_final' => 4320000,
    'tendencia' => 'positiva', // positiva | negativa | estavel
];

// ============================================
// HISTÓRICO DE PROGRESSO
// ============================================
$historico_progresso = [
    [
        'id' => 1,
        'data' => '2026-02-01',
        'valor' => 0,
        'percentual' => 0,
        'observacao' => 'Início da meta'
    ],
    [
        'id' => 2,
        'data' => '2026-02-05',
        'valor' => 520000,
        'percentual' => 13,
        'observacao' => 'Primeiro pagamento recebido'
    ],
    [
        'id' => 3,
        'data' => '2026-02-10',
        'valor' => 1450000,
        'percentual' => 36,
        'observacao' => 'Projeto Zona Norte aprovado'
    ],
    [
        'id' => 4,
        'data' => '2026-02-15',
        'valor' => 2450000,
        'percentual' => 61,
        'observacao' => 'Pagamento de dois projetos'
    ],
    [
        'id' => 5,
        'data' => '2026-02-18',
        'valor' => 3450000,
        'percentual' => 86,
        'observacao' => 'Atualização atual'
    ]
];

// ============================================
// TRANSAÇÕES RELACIONADAS
// ============================================
$transacoes_relacionadas = [
    [
        'id' => 1,
        'descricao' => 'Pagamento Projeto Zona Norte',
        'cliente' => 'Construtora ABC',
        'valor' => 350000,
        'data' => '2026-02-18 14:20:00',
        'tipo' => 'receita',
        'metodo' => 'Transferência'
    ],
    [
        'id' => 2,
        'descricao' => 'Pagamento Mapeamento GIS',
        'cliente' => 'Indústria Luanda',
        'valor' => 480000,
        'data' => '2026-02-17 10:15:00',
        'tipo' => 'receita',
        'metodo' => 'Multicaixa'
    ],
    [
        'id' => 3,
        'descricao' => 'Assinatura Plano Pro',
        'cliente' => 'Agro Negócios Lda',
        'valor' => 25000,
        'data' => '2026-02-16 11:00:00',
        'tipo' => 'receita',
        'metodo' => 'Multicaixa'
    ],
    [
        'id' => 4,
        'descricao' => 'Projeto Topográfico - Zona Sul',
        'cliente' => 'Construtora XYZ',
        'valor' => 420000,
        'data' => '2026-02-15 16:30:00',
        'tipo' => 'receita',
        'metodo' => 'Transferência'
    ],
    [
        'id' => 5,
        'descricao' => 'Licenciamento GIS',
        'cliente' => 'Instituto Geográfico',
        'valor' => 350000,
        'data' => '2026-02-14 09:00:00',
        'tipo' => 'receita',
        'metodo' => 'Depósito'
    ]
];

// ============================================
// METAS RELACIONADAS
// ============================================
$metas_relacionadas = [
    [
        'id' => 2,
        'nome' => 'Meta de Novos Clientes',
        'percentual' => 80,
        'cor' => '#00D2FF',
        'status' => 'em_andamento'
    ],
    [
        'id' => 3,
        'nome' => 'Meta de Projetos Concluídos',
        'percentual' => 80,
        'cor' => '#6C2BD9',
        'status' => 'em_andamento'
    ],
    [
        'id' => 4,
        'nome' => 'Meta de Faturamento Anual',
        'percentual' => 42,
        'cor' => '#FFD93D',
        'status' => 'em_andamento'
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

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'em_andamento' => 'status-em-andamento',
            'concluida' => 'status-concluida',
            'pendente' => 'status-pendente',
            'cancelada' => 'status-cancelada',
            'expirada' => 'status-expirada'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getStatusIcon')) {
    function getStatusIcon($status) {
        $icons = [
            'em_andamento' => 'fa-spinner',
            'concluida' => 'fa-check-circle',
            'pendente' => 'fa-clock',
            'cancelada' => 'fa-ban',
            'expirada' => 'fa-hourglass-end'
        ];
        return isset($icons[$status]) ? $icons[$status] : 'fa-clock';
    }
}

if (!function_exists('getPrioridadeClass')) {
    function getPrioridadeClass($prioridade) {
        $classes = [
            'alta' => 'prioridade-alta',
            'media' => 'prioridade-media',
            'baixa' => 'prioridade-baixa'
        ];
        return isset($classes[$prioridade]) ? $classes[$prioridade] : 'prioridade-media';
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
                        <i class="fas fa-bullseye icon" style="color: <?php echo $meta['cor']; ?>;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status <?php echo getStatusClass($meta['status']); ?>">
                            <i class="fas <?php echo getStatusIcon($meta['status']); ?>"></i>
                            <?php echo $meta['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="metas.php">Metas</a>
                        <span class="separator">/</span>
                        <span><?php echo $meta['nome']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="metas.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== META HEADER ===== -->
            <section class="meta-header animate-fade-up" style="--meta-color: <?php echo $meta['cor']; ?>;">
                <div class="meta-header-main">
                    <div class="meta-header-badges">
                        <span class="badge-categoria" style="background: <?php echo $meta['categoria_color']; ?>15; color: <?php echo $meta['categoria_color']; ?>; border-color: <?php echo $meta['categoria_color']; ?>30;">
                            <i class="fas <?php echo $meta['categoria_icon']; ?>"></i>
                            <?php echo $meta['categoria']; ?>
                        </span>
                        <span class="badge-periodo">
                            <i class="fas fa-calendar"></i>
                            <?php echo $meta['periodo']; ?>
                        </span>
                        <span class="badge-prioridade <?php echo getPrioridadeClass($meta['prioridade']); ?>">
                            <i class="fas fa-flag"></i>
                            Prioridade <?php echo $meta['prioridade_label']; ?>
                        </span>
                    </div>
                    <h2 class="meta-header-titulo"><?php echo $meta['nome']; ?></h2>
                    <p class="meta-header-descricao"><?php echo $meta['descricao']; ?></p>
                </div>

                <div class="meta-header-acoes">
                    <a href="meta-editar.php?id=<?php echo $meta['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <button class="btn btn-outline" onclick="actualizarProgresso()">
                        <i class="fas fa-sync-alt"></i> Actualizar
                    </button>
                    <a href="meta-excluir.php?id=<?php echo $meta['id']; ?>" 
                       class="btn btn-danger" 
                       onclick="return confirmarExclusao(event, '<?php echo addslashes($meta['nome']); ?>', <?php echo $meta['id']; ?>)">
                        <i class="fas fa-trash"></i> Excluir
                    </a>
                </div>
            </section>

            <!-- ===== PROGRESSO PRINCIPAL ===== -->
            <section class="progresso-principal animate-fade-up" style="animation-delay: 0.1s;">
                <div class="progresso-card">
                    <div class="progresso-header">
                        <div class="progresso-titulo">
                            <i class="fas fa-chart-line"></i>
                            <span>Progresso Actual</span>
                        </div>
                        <div class="progresso-percent-big" style="color: <?php echo $meta['cor']; ?>;">
                            <?php echo $meta['percentual']; ?>%
                        </div>
                    </div>

                    <div class="progresso-barra-big">
                        <div class="progresso-preenchimento-big" 
                             style="width: <?php echo $meta['percentual']; ?>%; background: linear-gradient(90deg, <?php echo $meta['cor']; ?> 0%, <?php echo $meta['cor']; ?>99 100%);">
                        </div>
                    </div>

                    <div class="progresso-valores">
                        <div class="progresso-valor-item">
                            <span class="progresso-valor-label">Actual</span>
                            <span class="progresso-valor-numero" style="color: <?php echo $meta['cor']; ?>;">
                                Kz <?php echo formatMoney($meta['valor_atual']); ?>
                            </span>
                        </div>
                        <div class="progresso-valor-item progresso-valor-faltante">
                            <span class="progresso-valor-label">Faltante</span>
                            <span class="progresso-valor-numero" style="color: #FF6B6B;">
                                Kz <?php echo formatMoney($meta['valor_faltante']); ?>
                            </span>
                        </div>
                        <div class="progresso-valor-item">
                            <span class="progresso-valor-label">Meta</span>
                            <span class="progresso-valor-numero" style="color: #00FFA3;">
                                Kz <?php echo formatMoney($meta['valor_meta']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.15s;">
                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div class="value"><?php echo $meta['dias_restantes']; ?> dias</div>
                    <div class="label">Dias Restantes</div>
                    <div class="trend neutral">
                        <i class="fas fa-calendar-check"></i> Até <?php echo formatDate($meta['data_fim']); ?>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($meta['media_diaria_atual']); ?></div>
                    <div class="label">Média Diária Actual</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> Boa performance
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($meta['media_diaria_necessaria']); ?></div>
                    <div class="label">Média Diária Necessária</div>
                    <div class="trend neutral">
                        <i class="fas fa-info-circle"></i> Para atingir a meta
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($meta['projecao_final']); ?></div>
                    <div class="label">Projeção Final</div>
                    <div class="trend <?php echo $meta['projecao_final'] >= $meta['valor_meta'] ? 'up' : 'down'; ?>">
                        <i class="fas fa-arrow-<?php echo $meta['projecao_final'] >= $meta['valor_meta'] ? 'up' : 'down'; ?>"></i>
                        <?php echo $meta['projecao_final'] >= $meta['valor_meta'] ? 'Meta será atingida' : 'Abaixo da meta'; ?>
                    </div>
                </div>
            </section>

            <!-- ===== CONTEÚDO PRINCIPAL ===== -->
            <div class="detalhe-grid">

                <!-- ===== COLUNA PRINCIPAL ===== -->
                <div class="detalhe-coluna-principal">

                    <!-- ===== GRÁFICO DE EVOLUÇÃO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-chart-area" style="color: <?php echo $meta['cor']; ?>;"></i>
                                Evolução do Progresso
                            </h3>
                        </div>
                        <div class="chart-container-meta">
                            <canvas id="chartEvolucaoMeta"></canvas>
                        </div>
                    </div>

                    <!-- ===== HISTÓRICO DE PROGRESSO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.25s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-history" style="color: #00D2FF;"></i>
                                Histórico de Progresso
                                <span class="badge-count"><?php echo count($historico_progresso); ?></span>
                            </h3>
                        </div>
                        <div class="historico-progresso-container">
                            <?php foreach (array_reverse($historico_progresso) as $index => $item): ?>
                                <div class="historico-progresso-item">
                                    <div class="historico-progresso-icon" style="background: <?php echo $meta['cor']; ?>15; color: <?php echo $meta['cor']; ?>;">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                    <div class="historico-progresso-content">
                                        <div class="historico-progresso-header">
                                            <span class="historico-progresso-data">
                                                <i class="far fa-calendar"></i>
                                                <?php echo formatDate($item['data']); ?>
                                            </span>
                                            <span class="historico-progresso-percent" style="color: <?php echo $meta['cor']; ?>;">
                                                <?php echo $item['percentual']; ?>%
                                            </span>
                                        </div>
                                        <div class="historico-progresso-barra">
                                            <div class="historico-progresso-fill" 
                                                 style="width: <?php echo $item['percentual']; ?>%; background: <?php echo $meta['cor']; ?>;">
                                            </div>
                                        </div>
                                        <div class="historico-progresso-meta">
                                            <span class="historico-progresso-valor">
                                                <i class="fas fa-coins"></i>
                                                Kz <?php echo formatMoney($item['valor']); ?>
                                            </span>
                                            <span class="historico-progresso-obs">
                                                <?php echo $item['observacao']; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== TRANSAÇÕES RELACIONADAS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.3s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-exchange-alt" style="color: #00FFA3;"></i>
                                Transações Relacionadas
                                <span class="badge-count"><?php echo count($transacoes_relacionadas); ?></span>
                            </h3>
                            <a href="transacoes.php" class="btn btn-sm btn-outline">Ver todas</a>
                        </div>
                        <div class="transacoes-relacionadas-list">
                            <?php foreach ($transacoes_relacionadas as $transacao): ?>
                                <div class="transacao-relacionada-item">
                                    <div class="transacao-relacionada-icon receita">
                                        <i class="fas fa-arrow-down"></i>
                                    </div>
                                    <div class="transacao-relacionada-content">
                                        <span class="transacao-relacionada-descricao"><?php echo $transacao['descricao']; ?></span>
                                        <span class="transacao-relacionada-cliente">
                                            <i class="fas fa-user"></i> <?php echo $transacao['cliente']; ?>
                                        </span>
                                    </div>
                                    <div class="transacao-relacionada-info">
                                        <span class="transacao-relacionada-valor">+Kz <?php echo formatMoney($transacao['valor']); ?></span>
                                        <span class="transacao-relacionada-data">
                                            <i class="far fa-clock"></i> <?php echo timeAgo($transacao['data']); ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== NOTAS ===== -->
                    <?php if (!empty($meta['notas'])): ?>
                    <div class="card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-sticky-note" style="color: #FFD93D;"></i>
                                Notas
                            </h3>
                        </div>
                        <div class="notas-content">
                            <p class="notas-texto"><?php echo $meta['notas']; ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- ===== COLUNA LATERAL ===== -->
                <div class="detalhe-coluna-lateral">

                    <!-- ===== CARD DO RESPONSÁVEL ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-user-tie" style="color: #6C2BD9;"></i>
                                Responsável
                            </h3>
                        </div>
                        <div class="responsavel-detalhe">
                            <div class="responsavel-avatar-grande">
                                <img src="../../../assets/images/<?php echo $meta['responsavel_avatar']; ?>" 
                                     alt="<?php echo $meta['responsavel']; ?>"
                                     onerror="this.src='<?php echo getAvatarUrl($meta['responsavel']); ?>'">
                            </div>
                            <h4><?php echo $meta['responsavel']; ?></h4>
                            <span class="responsavel-badge">Profissional Certificado</span>

                            <div class="responsavel-acoes">
                                <a href="mailto:<?php echo strtolower(str_replace(' ', '.', $meta['responsavel'])); ?>@geonnexus.com" class="btn btn-sm btn-outline">
                                    <i class="fas fa-envelope"></i> Contactar
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- ===== INFORMAÇÕES DA META ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.45s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-info-circle" style="color: #00D2FF;"></i>
                                Informações
                            </h3>
                        </div>
                        <div class="info-meta-list">
                            <div class="info-meta-item">
                                <span class="info-meta-label">
                                    <i class="fas fa-calendar-plus" style="color: #00D2FF;"></i>
                                    Data de Início
                                </span>
                                <span class="info-meta-value"><?php echo formatDate($meta['data_inicio']); ?></span>
                            </div>
                            <div class="info-meta-item">
                                <span class="info-meta-label">
                                    <i class="fas fa-calendar-check" style="color: #FF6B6B;"></i>
                                    Data Limite
                                </span>
                                <span class="info-meta-value"><?php echo formatDate($meta['data_fim']); ?></span>
                            </div>
                            <div class="info-meta-item">
                                <span class="info-meta-label">
                                    <i class="fas fa-clock" style="color: #FFD93D;"></i>
                                    Criada em
                                </span>
                                <span class="info-meta-value"><?php echo formatDate($meta['data_criacao']); ?></span>
                            </div>
                            <div class="info-meta-item">
                                <span class="info-meta-label">
                                    <i class="fas fa-sync-alt" style="color: #00FFA3;"></i>
                                    Última Actualização
                                </span>
                                <span class="info-meta-value"><?php echo timeAgo($meta['data_atualizacao']); ?></span>
                            </div>
                            <div class="info-meta-item">
                                <span class="info-meta-label">
                                    <i class="fas fa-tag" style="color: #6C2BD9;"></i>
                                    Tipo de Meta
                                </span>
                                <span class="info-meta-value">
                                    <?php 
                                    $tipos = ['valor' => 'Valor (Kz)', 'numero' => 'Número', 'percentual' => 'Percentual'];
                                    echo $tipos[$meta['tipo']] ?? 'Valor';
                                    ?>
                                </span>
                            </div>
                            <div class="info-meta-item">
                                <span class="info-meta-label">
                                    <i class="fas fa-chart-pie" style="color: <?php echo $meta['cor']; ?>;"></i>
                                    Progresso
                                </span>
                                <span class="info-meta-value" style="color: <?php echo $meta['cor']; ?>; font-weight: 700;">
                                    <?php echo $meta['percentual']; ?>%
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ESTATÍSTICAS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.5s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-chart-simple" style="color: #00FFA3;"></i>
                                Estatísticas
                            </h3>
                        </div>
                        <div class="estatisticas-meta-list">
                            <div class="estatistica-meta-item">
                                <div class="estatistica-meta-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div class="estatistica-meta-info">
                                    <span class="estatistica-meta-label">Projeção Final</span>
                                    <span class="estatistica-meta-value">Kz <?php echo formatMoney($meta['projecao_final']); ?></span>
                                </div>
                            </div>
                            <div class="estatistica-meta-item">
                                <div class="estatistica-meta-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <div class="estatistica-meta-info">
                                    <span class="estatistica-meta-label">Média Diária Actual</span>
                                    <span class="estatistica-meta-value">Kz <?php echo formatMoney($meta['media_diaria_atual']); ?></span>
                                </div>
                            </div>
                            <div class="estatistica-meta-item">
                                <div class="estatistica-meta-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                                    <i class="fas fa-hourglass-half"></i>
                                </div>
                                <div class="estatistica-meta-info">
                                    <span class="estatistica-meta-label">Média Diária Necessária</span>
                                    <span class="estatistica-meta-value">Kz <?php echo formatMoney($meta['media_diaria_necessaria']); ?></span>
                                </div>
                            </div>
                            <div class="estatistica-meta-item">
                                <div class="estatistica-meta-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <div class="estatistica-meta-info">
                                    <span class="estatistica-meta-label">Valor Faltante</span>
                                    <span class="estatistica-meta-value">Kz <?php echo formatMoney($meta['valor_faltante']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== METAS RELACIONADAS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.55s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-bullseye" style="color: #FFD93D;"></i>
                                Outras Metas
                            </h3>
                        </div>
                        <div class="metas-relacionadas-list">
                            <?php foreach ($metas_relacionadas as $outra_meta): ?>
                                <a href="meta-detalhe.php?id=<?php echo $outra_meta['id']; ?>" class="meta-relacionada-item">
                                    <div class="meta-relacionada-header">
                                        <span class="meta-relacionada-nome"><?php echo $outra_meta['nome']; ?></span>
                                        <span class="meta-relacionada-percent" style="color: <?php echo $outra_meta['cor']; ?>;">
                                            <?php echo $outra_meta['percentual']; ?>%
                                        </span>
                                    </div>
                                    <div class="meta-relacionada-barra">
                                        <div class="meta-relacionada-fill" 
                                             style="width: <?php echo $outra_meta['percentual']; ?>%; background: <?php echo $outra_meta['cor']; ?>;">
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="metas-relacionadas-footer">
                            <a href="metas.php" class="btn btn-sm btn-outline" style="width: 100%; justify-content: center;">
                                <i class="fas fa-list"></i> Ver Todas as Metas
                            </a>
                        </div>
                    </div>

                    <!-- ===== AÇÕES ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.6s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                                Ações
                            </h3>
                        </div>
                        <div class="acoes-list">
                            <a href="meta-editar.php?id=<?php echo $meta['id']; ?>" class="acao-item">
                                <div class="acao-icon" style="background: rgba(0, 210, 255, 0.1); color: #00D2FF;">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <span>Editar Meta</span>
                            </a>
                            <button class="acao-item" onclick="actualizarProgresso()">
                                <div class="acao-icon" style="background: rgba(0, 255, 163, 0.1); color: #00FFA3;">
                                    <i class="fas fa-sync-alt"></i>
                                </div>
                                <span>Actualizar Progresso</span>
                            </button>
                            <button class="acao-item" onclick="gerarRelatorio()">
                                <div class="acao-icon" style="background: rgba(108, 43, 217, 0.1); color: #6C2BD9;">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <span>Gerar Relatório</span>
                            </button>
                            <button class="acao-item" onclick="partilharMeta()">
                                <div class="acao-icon" style="background: rgba(255, 217, 61, 0.1); color: #FFD93D;">
                                    <i class="fas fa-share-alt"></i>
                                </div>
                                <span>Partilhar Meta</span>
                            </button>
                            <a href="meta-excluir.php?id=<?php echo $meta['id']; ?>" 
                               class="acao-item acao-item-danger"
                               onclick="return confirmarExclusao(event, '<?php echo addslashes($meta['nome']); ?>', <?php echo $meta['id']; ?>)">
                                <div class="acao-icon" style="background: rgba(255, 107, 107, 0.1); color: #FF6B6B;">
                                    <i class="fas fa-trash"></i>
                                </div>
                                <span>Excluir Meta</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO                       -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Exclusão
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="modalConfirmacaoBody">
                <div class="modal-alerta-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>Esta ação é irreversível!</strong>
                        <span>A meta e todo o seu histórico serão permanentemente excluídos.</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-danger" id="modalConfirmacaoBtn">
                    <i class="fas fa-check"></i> Excluir
                </button>
            </div>
        </div>
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
        // GRÁFICO DE EVOLUÇÃO
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Chart === 'undefined') return;

            const ctx = document.getElementById('chartEvolucaoMeta');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode(array_map(fn($h) => date('d/m', strtotime($h['data'])), $historico_progresso)); ?>,
                        datasets: [{
                            label: 'Progresso (Kz)',
                            data: <?php echo json_encode(array_column($historico_progresso, 'valor')); ?>,
                            backgroundColor: '<?php echo $meta['cor']; ?>15',
                            borderColor: '<?php echo $meta['cor']; ?>',
                            borderWidth: 3,
                            pointBackgroundColor: '<?php echo $meta['cor']; ?>',
                            pointRadius: 5,
                            tension: 0.4,
                            fill: true
                        }, {
                            label: 'Meta',
                            data: <?php echo json_encode(array_fill(0, count($historico_progresso), $meta['valor_meta'])); ?>,
                            borderColor: '#00FFA3',
                            borderWidth: 2,
                            borderDash: [5, 5],
                            pointRadius: 0,
                            fill: false
                        }]
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
        });

        // ============================================
        // AÇÕES
        // ============================================
        function actualizarProgresso() {
            mostrarToast('A actualizar o progresso da meta...', 'info');
            setTimeout(() => mostrarToast('Progresso actualizado!', 'success'), 1500);
        }

        function gerarRelatorio() {
            mostrarToast('A gerar relatório da meta...', 'info');
            setTimeout(() => mostrarToast('Relatório gerado com sucesso!', 'success'), 1500);
        }

        function partilharMeta() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                mostrarToast('Link da meta copiado para a área de transferência!', 'success');
            }).catch(() => {
                mostrarToast('Erro ao copiar. Copie manualmente.', 'error');
            });
        }

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, nome, id) {
            event.preventDefault();
            
            const modal = document.getElementById('modalConfirmacao');
            const body = document.getElementById('modalConfirmacaoBody');
            
            body.innerHTML = `
                <div class="modal-alerta-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>Excluir Meta</strong>
                        <span>Tem certeza que deseja excluir a meta "${nome}"? Esta ação não pode ser desfeita e todo o histórico será perdido.</span>
                    </div>
                </div>
            `;
            
            document.getElementById('modalConfirmacaoBtn').onclick = function() {
                fecharModal('modalConfirmacao');
                mostrarToast('Meta excluída!', 'error');
                setTimeout(() => window.location.href = 'meta-excluir.php?id=' + id, 800);
            };
            
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            return false;
        }

        // ============================================
        // MODAL
        // ============================================
        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModal('modalConfirmacao');
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
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #FFD93D; font-size: 0.85em; }

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
        /* META HEADER                                */
        /* ========================================== */
        .meta-header {
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
            overflow: hidden;
        }

        .meta-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--meta-color) 0%, var(--meta-color)99 100%);
        }

        .meta-header-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .meta-header-badges {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .badge-categoria, .badge-periodo, .badge-prioridade {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            border: 1px solid var(--border-color);
            white-space: nowrap;
        }

        .badge-periodo {
            background: var(--bg-input);
            color: var(--text-secondary);
        }

        .badge-prioridade.prioridade-alta {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
            border-color: rgba(255, 107, 107, 0.2);
        }

        .badge-prioridade.prioridade-media {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
            border-color: rgba(255, 217, 61, 0.2);
        }

        .badge-prioridade.prioridade-baixa {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
            border-color: rgba(0, 210, 255, 0.2);
        }

        .meta-header-titulo {
            font-family: var(--font-title);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
            word-break: break-word;
        }

        .meta-header-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
            word-break: break-word;
        }

        .meta-header-acoes {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .meta-header-acoes .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 16px;
            font-size: var(--text-sm);
            font-weight: 500;
            border-radius: var(--radius-md);
            white-space: nowrap;
            height: 42px;
        }

        /* ========================================== */
        /* PROGRESSO PRINCIPAL                        */
        /* ========================================== */
        .progresso-principal {
            margin-bottom: var(--space-lg);
        }

        .progresso-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-xl);
            position: relative;
            overflow: hidden;
        }

        .progresso-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--meta-color) 0%, var(--meta-color)99 100%);
        }

        .progresso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .progresso-titulo {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-h4);
            font-weight: 600;
            color: var(--text-primary);
        }

        .progresso-titulo i {
            color: var(--meta-color);
        }

        .progresso-percent-big {
            font-family: var(--font-display);
            font-size: var(--text-h1);
            font-weight: 700;
            line-height: 1;
        }

        .progresso-barra-big {
            height: 16px;
            background: var(--bg-input);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: var(--space-lg);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .progresso-preenchimento-big {
            height: 100%;
            border-radius: 8px;
            transition: width 1s ease;
            box-shadow: 0 0 20px var(--meta-color);
            position: relative;
        }

        .progresso-preenchimento-big::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.3) 50%, transparent 100%);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .progresso-valores {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
        }

        .progresso-valor-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            text-align: center;
        }

        .progresso-valor-faltante {
            background: rgba(255, 107, 107, 0.04);
            border-color: rgba(255, 107, 107, 0.15);
        }

        .progresso-valor-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .progresso-valor-numero {
            font-family: var(--font-display);
            font-size: var(--text-h3);
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
        .stat-card .icon.aurora { background: rgba(108, 43, 217, 0.15); color: #6C2BD9; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h3);
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
        /* DETALHE GRID                               */
        /* ========================================== */
        .detalhe-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 380px);
            gap: var(--space-lg);
            align-items: start;
        }

        .detalhe-coluna-principal,
        .detalhe-coluna-lateral {
            min-width: 0;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
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

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 24px;
            height: 24px;
            padding: 0 8px;
            background: var(--bg-input);
            color: var(--text-muted);
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            font-family: var(--font-display);
        }

        /* ========================================== */
        /* CHART                                      */
        /* ========================================== */
        .chart-container-meta {
            height: 320px;
            padding: var(--space-lg);
            position: relative;
        }

        /* ========================================== */
        /* HISTÓRICO DE PROGRESSO                     */
        /* ========================================== */
        .historico-progresso-container {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
            max-height: 500px;
            overflow-y: auto;
        }

        .historico-progresso-item {
            display: flex;
            gap: var(--space-md);
            position: relative;
        }

        .historico-progresso-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 15px;
            top: 36px;
            width: 2px;
            height: calc(100% + var(--space-md) - 20px);
            background: var(--border-color);
        }

        .historico-progresso-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            flex-shrink: 0;
            position: relative;
            z-index: 1;
        }

        .historico-progresso-content {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-bottom: var(--space-sm);
        }

        .historico-progresso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .historico-progresso-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .historico-progresso-percent {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
        }

        .historico-progresso-barra {
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .historico-progresso-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .historico-progresso-meta {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            align-items: center;
        }

        .historico-progresso-valor {
            font-size: var(--text-xs);
            font-weight: 700;
            color: var(--text-primary);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .historico-progresso-valor i { color: #00FFA3; }

        .historico-progresso-obs {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-style: italic;
        }

        /* ========================================== */
        /* TRANSAÇÕES RELACIONADAS                    */
        /* ========================================== */
        .transacoes-relacionadas-list {
            padding: var(--space-md) var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .transacao-relacionada-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .transacao-relacionada-item:hover {
            border-color: #00FFA3;
            transform: translateX(4px);
        }

        .transacao-relacionada-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .transacao-relacionada-icon.receita {
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
        }

        .transacao-relacionada-content {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .transacao-relacionada-descricao {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .transacao-relacionada-cliente {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .transacao-relacionada-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
            flex-shrink: 0;
        }

        .transacao-relacionada-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #00FFA3;
        }

        .transacao-relacionada-data {
            font-size: 10px;
            color: var(--text-muted);
        }

        /* ========================================== */
        /* NOTAS                                      */
        /* ========================================== */
        .notas-content {
            padding: var(--space-lg);
        }

        .notas-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
            padding: var(--space-md);
            background: rgba(255, 217, 61, 0.04);
            border-left: 3px solid #FFD93D;
            border-radius: var(--radius-sm);
            word-break: break-word;
        }

        /* ========================================== */
        /* RESPONSÁVEL                                */
        /* ========================================== */
        .responsavel-detalhe {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: var(--space-md);
        }

        .responsavel-avatar-grande img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #6C2BD9;
            box-shadow: 0 0 0 4px rgba(108, 43, 217, 0.1);
        }

        .responsavel-detalhe h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .responsavel-badge {
            display: inline-flex;
            padding: 4px 12px;
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
        }

        .responsavel-acoes {
            width: 100%;
            display: flex;
            gap: var(--space-sm);
        }

        .responsavel-acoes .btn {
            flex: 1;
            justify-content: center;
        }

        /* ========================================== */
        /* INFO META LIST                             */
        /* ========================================== */
        .info-meta-list {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .info-meta-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) 0;
            border-bottom: 1px solid var(--border-color);
        }

        .info-meta-item:last-child {
            border-bottom: none;
        }

        .info-meta-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-meta-label i { font-size: 12px; }

        .info-meta-value {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            text-align: right;
        }

        /* ========================================== */
        /* ESTATÍSTICAS                               */
        /* ========================================== */
        .estatisticas-meta-list {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .estatistica-meta-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .estatistica-meta-item:hover {
            border-color: #FFD93D;
            transform: translateX(4px);
        }

        .estatistica-meta-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .estatistica-meta-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .estatistica-meta-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .estatistica-meta-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* METAS RELACIONADAS                         */
        /* ========================================== */
        .metas-relacionadas-list {
            padding: var(--space-md) var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .meta-relacionada-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .meta-relacionada-item:hover {
            border-color: #FFD93D;
            transform: translateX(4px);
        }

        .meta-relacionada-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
        }

        .meta-relacionada-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .meta-relacionada-percent {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
        }

        .meta-relacionada-barra {
            height: 6px;
            background: var(--bg-card);
            border-radius: 3px;
            overflow: hidden;
        }

        .meta-relacionada-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .metas-relacionadas-footer {
            padding: 0 var(--space-lg) var(--space-lg) var(--space-lg);
        }

        /* ========================================== */
        /* AÇÕES                                      */
        /* ========================================== */
        .acoes-list {
            padding: var(--space-md);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .acao-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: transparent;
            border: 1px solid transparent;
            border-radius: var(--radius-md);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: left;
            width: 100%;
        }

        .acao-item:hover {
            background: var(--bg-input);
            color: var(--text-primary);
            border-color: var(--border-color);
        }

        .acao-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .acao-item span {
            flex: 1;
            min-width: 0;
            word-break: break-word;
        }

        .acao-item-danger { color: #FF6B6B; }
        .acao-item-danger:hover {
            background: rgba(255, 107, 107, 0.08);
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        /* ========================================== */
        /* BADGES STATUS                              */
        /* ========================================== */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-status.status-em-andamento { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-status.status-concluida { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-cancelada { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }
        .badge-status.status-expirada { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        .badge-status.status-em-andamento i { animation: spin 2s linear infinite; }

        /* ========================================== */
        /* MODAL                                      */
        /* ========================================== */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999999;
            align-items: center;
            justify-content: center;
        }

        .modal.active { display: flex; }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 107, 107, 0.3);
            z-index: 10;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-danger {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.15) 0%, rgba(255, 107, 107, 0.05) 100%);
            border-bottom-color: rgba(255, 107, 107, 0.3);
        }

        .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px;
            line-height: 1;
        }

        .modal-close:hover { color: var(--text-primary); transform: rotate(90deg); }

        .modal-body { padding: 24px; }

        .modal-alerta-danger {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border: 1px solid rgba(255, 107, 107, 0.25);
            border-radius: var(--radius-md);
        }

        .modal-alerta-danger i {
            font-size: 24px;
            color: #FF6B6B;
            flex-shrink: 0;
        }

        .modal-alerta-danger div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .modal-alerta-danger strong {
            font-size: var(--text-sm);
            color: #FF6B6B;
        }

        .modal-alerta-danger span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 120px; justify-content: center; }

        .btn-danger {
            background: #FF6B6B;
            color: #FFFFFF;
            border: none;
        }

        .btn-danger:hover {
            background: #E55555;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 107, 107, 0.4);
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .detalhe-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .meta-header { flex-direction: column; }
            .meta-header-acoes { width: 100%; }
            .meta-header-acoes .btn { flex: 1; justify-content: center; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h4); }
            
            .progresso-valores { grid-template-columns: 1fr; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            .meta-header-titulo { font-size: var(--text-h3); }
            
            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .meta-header-badges { flex-direction: column; align-items: stretch; }
            .meta-header-acoes { flex-direction: column; }
            .meta-header-acoes .btn { width: 100%; }
            .progresso-valor-numero { font-size: var(--text-h4); }
            .progresso-percent-big { font-size: var(--text-h2); }
        }
    </style>

</body>

</html>