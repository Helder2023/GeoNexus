<?php
// painel/individual/servicos/contratacoes.php - Contratações dos Serviços
include "../../../includes/individual/notificacoes-servicos-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Contratações';
$pagina_atual = 'contratacoes';

// ============================================
// KPIs DE CONTRATAÇÕES
// ============================================
$kpis = [
    'total_contratacoes' => 68,
    'contratacoes_mes' => 14,
    'contratacoes_variacao' => 16.7,
    'contratacoes_ativas' => 8,
    'contratacoes_concluidas' => 55,
    'contratacoes_pendentes' => 5,
    'receita_total' => 8750000,
    'receita_mes' => 1850000,
    'receita_variacao' => 22.1,
    'ticket_medio' => 128676,
    'ticket_medio_variacao' => 4.8,
    'taxa_conclusao' => 80.9,
    'tempo_medio' => 18
];

// ============================================
// LISTA DE CONTRATAÇÕES
// ============================================
$contratacoes = [
    [
        'id' => 1,
        'codigo' => 'CTR-2026-0001',
        'cliente' => 'Município de Luanda',
        'cliente_tipo' => 'Instituição',
        'avatar' => 'instituicao-1.png',
        'email' => 'geral@luanda.gov.ao',
        'telefone' => '+244 222 567 890',
        'servico_id' => 5,
        'servico_nome' => 'Levantamento com Drone',
        'servico_categoria' => 'Drones',
        'servico_icon' => 'fa-drone',
        'servico_color' => '#FF6B6B',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'progresso' => 65,
        'valor' => 320000,
        'valor_pago' => 160000,
        'data_inicio' => '2026-02-12',
        'data_fim' => '2026-03-05',
        'data_criacao' => '2026-02-10 08:30:00',
        'prazo_dias' => 21,
        'avaliacao' => null,
        'local' => 'Luanda, Angola',
        'modalidade' => 'Presencial'
    ],
    [
        'id' => 2,
        'codigo' => 'CTR-2026-0002',
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-1.png',
        'email' => 'contato@construtoraabc.ao',
        'telefone' => '+244 222 345 678',
        'servico_id' => 1,
        'servico_nome' => 'Levantamento Topográfico',
        'servico_categoria' => 'Topografia',
        'servico_icon' => 'fa-mountain',
        'servico_color' => '#6C2BD9',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'progresso' => 45,
        'valor' => 350000,
        'valor_pago' => 175000,
        'data_inicio' => '2026-02-01',
        'data_fim' => '2026-03-15',
        'data_criacao' => '2026-01-28 10:30:00',
        'prazo_dias' => 42,
        'avaliacao' => null,
        'local' => 'Luanda, Angola',
        'modalidade' => 'Presencial'
    ],
    [
        'id' => 3,
        'codigo' => 'CTR-2026-0003',
        'cliente' => 'Indústria Luanda',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-2.png',
        'email' => 'contato@industrialuanda.ao',
        'telefone' => '+244 222 456 789',
        'servico_id' => 2,
        'servico_nome' => 'Mapeamento GIS',
        'servico_categoria' => 'GIS',
        'servico_icon' => 'fa-globe',
        'servico_color' => '#00FFA3',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'progresso' => 30,
        'valor' => 480000,
        'valor_pago' => 144000,
        'data_inicio' => '2026-02-10',
        'data_fim' => '2026-04-20',
        'data_criacao' => '2026-02-08 14:15:00',
        'prazo_dias' => 69,
        'avaliacao' => null,
        'local' => 'Luanda, Angola',
        'modalidade' => 'Remoto + Presencial'
    ],
    [
        'id' => 4,
        'codigo' => 'CTR-2026-0004',
        'cliente' => 'Agro Negócios Lda',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-3.png',
        'email' => 'info@agronegocios.ao',
        'telefone' => '+244 222 678 901',
        'servico_id' => 6,
        'servico_nome' => 'Análise de Solo Agrícola',
        'servico_categoria' => 'Agricultura',
        'servico_icon' => 'fa-tractor',
        'servico_color' => '#6BCB77',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'progresso' => 45,
        'valor' => 220000,
        'valor_pago' => 110000,
        'data_inicio' => '2026-02-05',
        'data_fim' => '2026-03-30',
        'data_criacao' => '2026-02-03 15:20:00',
        'prazo_dias' => 53,
        'avaliacao' => null,
        'local' => 'Huambo, Angola',
        'modalidade' => 'Presencial'
    ],
    [
        'id' => 5,
        'codigo' => 'CTR-2026-0005',
        'cliente' => 'Mineração Progresso',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-4.png',
        'email' => 'contato@mineracaoprogresso.ao',
        'telefone' => '+244 222 567 890',
        'servico_id' => 3,
        'servico_nome' => 'Levantamento Planialtimétrico',
        'servico_categoria' => 'Topografia',
        'servico_icon' => 'fa-mountain',
        'servico_color' => '#6C2BD9',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'progresso' => 0,
        'valor' => 280000,
        'valor_pago' => 0,
        'data_inicio' => '2026-03-01',
        'data_fim' => '2026-04-15',
        'data_criacao' => '2026-02-20 09:00:00',
        'prazo_dias' => 45,
        'avaliacao' => null,
        'local' => 'Catoca, Angola',
        'modalidade' => 'Presencial'
    ],
    [
        'id' => 6,
        'codigo' => 'CTR-2025-0089',
        'cliente' => 'Energia Futuro',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-5.png',
        'email' => 'financas@energiafuturo.ao',
        'telefone' => '+244 222 678 901',
        'servico_id' => 8,
        'servico_nome' => 'Modelação 3D de Terreno',
        'servico_categoria' => 'Engenharia',
        'servico_icon' => 'fa-ruler-combined',
        'servico_color' => '#00D2FF',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'progresso' => 100,
        'valor' => 275000,
        'valor_pago' => 275000,
        'data_inicio' => '2025-12-15',
        'data_fim' => '2026-01-20',
        'data_criacao' => '2025-12-10 11:00:00',
        'prazo_dias' => 36,
        'avaliacao' => 2.0,
        'local' => 'Lubango, Angola',
        'modalidade' => 'Remoto'
    ],
    [
        'id' => 7,
        'codigo' => 'CTR-2025-0088',
        'cliente' => 'Instituto Geográfico',
        'cliente_tipo' => 'Instituição',
        'avatar' => 'instituicao-2.png',
        'email' => 'financas@igeo.ao',
        'telefone' => '+244 222 890 123',
        'servico_id' => 1,
        'servico_nome' => 'Levantamento Topográfico',
        'servico_categoria' => 'Topografia',
        'servico_icon' => 'fa-mountain',
        'servico_color' => '#6C2BD9',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'progresso' => 100,
        'valor' => 320000,
        'valor_pago' => 320000,
        'data_inicio' => '2025-12-01',
        'data_fim' => '2026-01-10',
        'data_criacao' => '2025-11-28 08:30:00',
        'prazo_dias' => 40,
        'avaliacao' => 5.0,
        'local' => 'Luanda, Angola',
        'modalidade' => 'Presencial'
    ],
    [
        'id' => 8,
        'codigo' => 'CTR-2025-0087',
        'cliente' => 'Construtora Silva',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-6.png',
        'email' => 'financeiro@construtorasilva.ao',
        'telefone' => '+244 222 789 012',
        'servico_id' => 3,
        'servico_nome' => 'Levantamento Planialtimétrico',
        'servico_categoria' => 'Topografia',
        'servico_icon' => 'fa-mountain',
        'servico_color' => '#6C2BD9',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'progresso' => 100,
        'valor' => 195000,
        'valor_pago' => 195000,
        'data_inicio' => '2025-11-15',
        'data_fim' => '2025-12-20',
        'data_criacao' => '2025-11-10 14:00:00',
        'prazo_dias' => 35,
        'avaliacao' => 5.0,
        'local' => 'Luanda, Angola',
        'modalidade' => 'Presencial'
    ],
    [
        'id' => 9,
        'codigo' => 'CTR-2025-0086',
        'cliente' => 'Município de Luanda',
        'cliente_tipo' => 'Instituição',
        'avatar' => 'instituicao-1.png',
        'email' => 'geral@luanda.gov.ao',
        'telefone' => '+244 222 567 890',
        'servico_id' => 9,
        'servico_nome' => 'Consultoria em Urbanismo',
        'servico_categoria' => 'Urbanismo',
        'servico_icon' => 'fa-city',
        'servico_color' => '#A29BFE',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'progresso' => 100,
        'valor' => 450000,
        'valor_pago' => 450000,
        'data_inicio' => '2025-11-01',
        'data_fim' => '2025-12-15',
        'data_criacao' => '2025-10-28 10:00:00',
        'prazo_dias' => 44,
        'avaliacao' => 1.0,
        'local' => 'Luanda, Angola',
        'modalidade' => 'Presencial'
    ],
    [
        'id' => 10,
        'codigo' => 'CTR-2025-0085',
        'cliente' => 'Agro Negócios Lda',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-3.png',
        'email' => 'info@agronegocios.ao',
        'telefone' => '+244 222 678 901',
        'servico_id' => 5,
        'servico_nome' => 'Levantamento com Drone',
        'servico_categoria' => 'Drones',
        'servico_icon' => 'fa-drone',
        'servico_color' => '#FF6B6B',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'progresso' => 100,
        'valor' => 180000,
        'valor_pago' => 180000,
        'data_inicio' => '2025-10-15',
        'data_fim' => '2025-11-05',
        'data_criacao' => '2025-10-10 09:00:00',
        'prazo_dias' => 21,
        'avaliacao' => 4.0,
        'local' => 'Huambo, Angola',
        'modalidade' => 'Presencial'
    ]
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_contratacoes = count($contratacoes);
$contratacoes_em_andamento = count(array_filter($contratacoes, fn($c) => $c['status'] === 'em_andamento'));
$contratacoes_concluidas = count(array_filter($contratacoes, fn($c) => $c['status'] === 'concluido'));
$contratacoes_pendentes = count(array_filter($contratacoes, fn($c) => $c['status'] === 'pendente'));
$contratacoes_canceladas = count(array_filter($contratacoes, fn($c) => $c['status'] === 'cancelado'));

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
        if ($diff < 60) return 'há ' . $diff . ' segundos';
        if ($diff < 3600) return 'há ' . floor($diff / 60) . ' minutos';
        if ($diff < 86400) return 'há ' . floor($diff / 3600) . ' horas';
        if ($diff < 604800) return 'há ' . floor($diff / 86400) . ' dias';
        return date('d/m/Y', strtotime($datetime));
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00FFA3&color=fff&size=80';
    }
}

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'em_andamento' => 'status-em-andamento',
            'concluido' => 'status-concluido',
            'pendente' => 'status-pendente',
            'cancelado' => 'status-cancelado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getPrioridadeClass')) {
    function getPrioridadeClass($prioridade) {
        $classes = [
            'urgente' => 'prioridade-urgente',
            'alta' => 'prioridade-alta',
            'media' => 'prioridade-media',
            'baixa' => 'prioridade-baixa'
        ];
        return isset($classes[$prioridade]) ? $classes[$prioridade] : 'prioridade-media';
    }
}

if (!function_exists('diasRestantes')) {
    function diasRestantes($data_fim) {
        $hoje = new DateTime();
        $fim = new DateTime($data_fim);
        $diff = $hoje->diff($fim);
        
        if ($fim < $hoje) {
            return ['texto' => 'Atrasado ' . $diff->days . ' dias', 'class' => 'atrasado'];
        }
        if ($diff->days === 0) {
            return ['texto' => 'Termina hoje', 'class' => 'urgente'];
        }
        if ($diff->days <= 7) {
            return ['texto' => $diff->days . ' dias restantes', 'class' => 'urgente'];
        }
        return ['texto' => $diff->days . ' dias restantes', 'class' => 'normal'];
    }
}

if (!function_exists('renderEstrelas')) {
    function renderEstrelas($avaliacao) {
        if ($avaliacao === null) return '';
        $html = '';
        $cheias = floor($avaliacao);
        $meia = ($avaliacao - $cheias) >= 0.5;
        
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $cheias) {
                $html .= '<i class="fas fa-star"></i>';
            } elseif ($i == $cheias + 1 && $meia) {
                $html .= '<i class="fas fa-star-half-alt"></i>';
            } else {
                $html .= '<i class="far fa-star"></i>';
            }
        }
        return $html;
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
                        <i class="fas fa-handshake icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $total_contratacoes; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Serviços</a>
                        <span class="separator">/</span>
                        <span>Contratações</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-servicos.php" ?>

                    <button class="btn btn-outline" onclick="exportarContratacoes()">
                        <i class="fas fa-download"></i> Exportar
                    </button>
                    <a href="index.php" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== KPIs ===== -->
            <section class="kpis-grid animate-fade-up">
                <!-- Total de Contratações -->
                <div class="kpi-card kpi-total">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="kpi-variacao positiva">
                            <i class="fas fa-arrow-up"></i>
                            <?php echo number_format($kpis['contratacoes_variacao'], 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo $kpis['total_contratacoes']; ?></div>
                    <div class="kpi-label">Total de Contratações</div>
                    <div class="kpi-footer">
                        <i class="fas fa-arrow-up"></i>
                        <?php echo $kpis['contratacoes_mes']; ?> este mês
                    </div>
                </div>

                <!-- Receita -->
                <div class="kpi-card kpi-receita">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                            <i class="fas fa-coins"></i>
                        </div>
                        <div class="kpi-variacao positiva">
                            <i class="fas fa-arrow-up"></i>
                            <?php echo number_format($kpis['receita_variacao'], 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value">Kz <?php echo formatMoneyShort($kpis['receita_total']); ?></div>
                    <div class="kpi-label">Receita Total</div>
                    <div class="kpi-footer">
                        <i class="fas fa-arrow-up"></i>
                        Kz <?php echo formatMoneyShort($kpis['receita_mes']); ?> este mês
                    </div>
                </div>

                <!-- Ticket Médio -->
                <div class="kpi-card kpi-ticket">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                            <i class="fas fa-tag"></i>
                        </div>
                        <div class="kpi-variacao positiva">
                            <i class="fas fa-arrow-up"></i>
                            <?php echo number_format($kpis['ticket_medio_variacao'], 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value">Kz <?php echo formatMoney($kpis['ticket_medio']); ?></div>
                    <div class="kpi-label">Ticket Médio</div>
                    <div class="kpi-footer">
                        <i class="fas fa-info-circle"></i>
                        Valor médio por contratação
                    </div>
                </div>

                <!-- Taxa de Conclusão -->
                <div class="kpi-card kpi-conclusao">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="kpi-variacao positiva">
                            <?php echo number_format($kpis['taxa_conclusao'], 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo $contratacoes_concluidas; ?></div>
                    <div class="kpi-label">Concluídas</div>
                    <div class="kpi-progresso">
                        <div class="kpi-progresso-barra">
                            <div class="kpi-progresso-fill" style="width: <?php echo $kpis['taxa_conclusao']; ?>%; background: #6C2BD9;"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ===== KPIs SECUNDÁRIOS ===== -->
            <section class="kpis-grid-secundaria animate-fade-up" style="animation-delay: 0.05s;">
                <div class="kpi-mini kpi-em-andamento">
                    <div class="kpi-mini-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="kpi-mini-content">
                        <div class="kpi-mini-value"><?php echo $contratacoes_em_andamento; ?></div>
                        <div class="kpi-mini-label">Em Andamento</div>
                    </div>
                </div>

                <div class="kpi-mini kpi-pendentes">
                    <div class="kpi-mini-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="kpi-mini-content">
                        <div class="kpi-mini-value"><?php echo $contratacoes_pendentes; ?></div>
                        <div class="kpi-mini-label">Pendentes</div>
                    </div>
                </div>

                <div class="kpi-mini kpi-concluidas">
                    <div class="kpi-mini-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="kpi-mini-content">
                        <div class="kpi-mini-value"><?php echo $contratacoes_concluidas; ?></div>
                        <div class="kpi-mini-label">Concluídas</div>
                    </div>
                </div>

                <div class="kpi-mini kpi-tempo">
                    <div class="kpi-mini-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="kpi-mini-content">
                        <div class="kpi-mini-value"><?php echo $kpis['tempo_medio']; ?> dias</div>
                        <div class="kpi-mini-label">Tempo Médio</div>
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.1s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchContratacao" placeholder="Buscar por cliente, código ou serviço..." 
                               oninput="filtrarContratacoes()">
                    </div>
                    <div class="filtros-actions">
                        <select class="filtro-select" id="filtroServico" onchange="filtrarContratacoes()">
                            <option value="">Todos os serviços</option>
                            <option value="Levantamento com Drone">Levantamento com Drone</option>
                            <option value="Levantamento Topográfico">Levantamento Topográfico</option>
                            <option value="Mapeamento GIS">Mapeamento GIS</option>
                            <option value="Análise de Solo Agrícola">Análise de Solo Agrícola</option>
                            <option value="Levantamento Planialtimétrico">Levantamento Planialtimétrico</option>
                        </select>
                        <select class="filtro-select" id="filtroPrioridade" onchange="filtrarContratacoes()">
                            <option value="">Todas as prioridades</option>
                            <option value="alta">Alta</option>
                            <option value="media">Média</option>
                            <option value="baixa">Baixa</option>
                        </select>
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="grid" onclick="mudarView('grid')" title="Grid">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="view-btn" data-view="list" onclick="mudarView('list')" title="Lista">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filtros rápidos por status -->
                <div class="filtros-status">
                    <button class="filtro-status active" data-status="todos" onclick="filtrarPorStatus('todos')">
                        Todas <span class="count"><?php echo $total_contratacoes; ?></span>
                    </button>
                    <button class="filtro-status" data-status="em_andamento" onclick="filtrarPorStatus('em_andamento')">
                        <i class="fas fa-spinner"></i> Em Andamento <span class="count"><?php echo $contratacoes_em_andamento; ?></span>
                    </button>
                    <button class="filtro-status" data-status="pendente" onclick="filtrarPorStatus('pendente')">
                        <i class="fas fa-clock"></i> Pendentes <span class="count"><?php echo $contratacoes_pendentes; ?></span>
                    </button>
                    <button class="filtro-status" data-status="concluido" onclick="filtrarPorStatus('concluido')">
                        <i class="fas fa-check-circle"></i> Concluídas <span class="count"><?php echo $contratacoes_concluidas; ?></span>
                    </button>
                </div>
            </section>

            <!-- ===== LISTA DE CONTRATAÇÕES ===== -->
            <section class="contratacoes-container animate-fade-up" style="animation-delay: 0.15s;">
                <?php if (empty($contratacoes)): ?>
                    <div class="empty-state">
                        <i class="fas fa-handshake"></i>
                        <h3>Nenhuma contratação encontrada</h3>
                        <p>As contratações dos seus serviços aparecerão aqui</p>
                    </div>
                <?php else: ?>
                    <div class="contratacoes-grid" id="contratacoesGrid">
                        <?php foreach ($contratacoes as $contratacao): 
                            $dias = diasRestantes($contratacao['data_fim']);
                            $percentual_pago = $contratacao['valor'] > 0 ? round(($contratacao['valor_pago'] / $contratacao['valor']) * 100) : 0;
                        ?>
                            <div class="contratacao-card" 
                                 data-id="<?php echo $contratacao['id']; ?>"
                                 data-status="<?php echo $contratacao['status']; ?>"
                                 data-prioridade="<?php echo $contratacao['prioridade']; ?>"
                                 data-servico="<?php echo $contratacao['servico_nome']; ?>"
                                 data-busca="<?php echo strtolower($contratacao['cliente'] . ' ' . $contratacao['codigo'] . ' ' . $contratacao['servico_nome']); ?>">
                                
                                <!-- ===== HEADER DO CARD ===== -->
                                <div class="contratacao-card-header" style="--servico-color: <?php echo $contratacao['servico_color']; ?>;">
                                    <div class="contratacao-codigo">
                                        <i class="fas fa-hashtag"></i>
                                        <?php echo $contratacao['codigo']; ?>
                                    </div>
                                    <div class="contratacao-header-badges">
                                        <span class="badge-status <?php echo getStatusClass($contratacao['status']); ?>">
                                            <i class="fas fa-circle"></i>
                                            <?php echo $contratacao['status_label']; ?>
                                        </span>
                                        <span class="badge-prioridade <?php echo getPrioridadeClass($contratacao['prioridade']); ?>">
                                            <i class="fas fa-flag"></i>
                                            <?php echo $contratacao['prioridade_label']; ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- ===== CORPO DO CARD ===== -->
                                <div class="contratacao-card-body">
                                    
                                    <!-- Cliente -->
                                    <div class="contratacao-cliente">
                                        <div class="cliente-avatar">
                                            <img src="../../../assets/images/<?php echo $contratacao['avatar']; ?>"
                                                 alt="<?php echo $contratacao['cliente']; ?>"
                                                 onerror="this.src='<?php echo getAvatarUrl($contratacao['cliente']); ?>'">
                                        </div>
                                        <div class="cliente-dados">
                                            <span class="cliente-nome"><?php echo $contratacao['cliente']; ?></span>
                                            <span class="cliente-tipo"><?php echo $contratacao['cliente_tipo']; ?></span>
                                        </div>
                                    </div>

                                    <!-- Serviço -->
                                    <div class="contratacao-servico">
                                        <div class="servico-icon" style="background: <?php echo $contratacao['servico_color']; ?>20; color: <?php echo $contratacao['servico_color']; ?>;">
                                            <i class="fas <?php echo $contratacao['servico_icon']; ?>"></i>
                                        </div>
                                        <div class="servico-info">
                                            <span class="servico-categoria"><?php echo $contratacao['servico_categoria']; ?></span>
                                            <span class="servico-nome"><?php echo $contratacao['servico_nome']; ?></span>
                                        </div>
                                    </div>

                                    <!-- Info Grid -->
                                    <div class="contratacao-info-grid">
                                        <div class="info-item">
                                            <span class="info-label">
                                                <i class="fas fa-calendar-play"></i>
                                                Início
                                            </span>
                                            <span class="info-value"><?php echo formatDate($contratacao['data_inicio']); ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">
                                                <i class="fas fa-calendar-check"></i>
                                                Término
                                            </span>
                                            <span class="info-value"><?php echo formatDate($contratacao['data_fim']); ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">
                                                <i class="fas fa-map-marker-alt"></i>
                                                Local
                                            </span>
                                            <span class="info-value"><?php echo $contratacao['local']; ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">
                                                <i class="fas fa-laptop"></i>
                                                Modalidade
                                            </span>
                                            <span class="info-value"><?php echo $contratacao['modalidade']; ?></span>
                                        </div>
                                    </div>

                                    <!-- Progresso -->
                                    <?php if ($contratacao['status'] === 'em_andamento'): ?>
                                        <div class="contratacao-progresso">
                                            <div class="progresso-header">
                                                <span class="progresso-label">Progresso</span>
                                                <span class="progresso-percent"><?php echo $contratacao['progresso']; ?>%</span>
                                            </div>
                                            <div class="progresso-barra">
                                                <div class="progresso-preenchimento" 
                                                     style="width: <?php echo $contratacao['progresso']; ?>%; background: <?php echo $contratacao['servico_color']; ?>;">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Alerta de Prazo -->
                                    <?php if ($contratacao['status'] !== 'concluido'): ?>
                                        <div class="contratacao-prazo <?php echo $dias['class']; ?>">
                                            <i class="fas <?php echo $dias['class'] === 'atrasado' ? 'fa-exclamation-triangle' : 'fa-clock'; ?>"></i>
                                            <span><?php echo $dias['texto']; ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Avaliação -->
                                    <?php if ($contratacao['avaliacao'] !== null): ?>
                                        <div class="contratacao-avaliacao">
                                            <span class="avaliacao-label">Avaliação do cliente:</span>
                                            <div class="avaliacao-estrelas">
                                                <?php echo renderEstrelas($contratacao['avaliacao']); ?>
                                            </div>
                                            <span class="avaliacao-nota"><?php echo $contratacao['avaliacao']; ?>.0</span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- ===== FOOTER DO CARD ===== -->
                                <div class="contratacao-card-footer">
                                    <div class="contratacao-valor">
                                        <span class="valor-total">Kz <?php echo formatMoney($contratacao['valor']); ?></span>
                                        <span class="valor-info">
                                            <span class="valor-pago"><?php echo $percentual_pago; ?>% pago</span>
                                        </span>
                                    </div>

                                    <div class="contratacao-actions">
                                        <a href="../financeiro/transacao-detalhe.php?id=<?php echo $contratacao['id']; ?>" 
                                           class="btn-action" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="../financeiro/faturas.php?contratacao=<?php echo $contratacao['id']; ?>" 
                                           class="btn-action" title="Ver Faturas">
                                            <i class="fas fa-file-invoice"></i>
                                        </a>
                                        <button class="btn-action" 
                                                onclick="abrirMenuCard(event, <?php echo $contratacao['id']; ?>)" 
                                                title="Mais Opções">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- ===== PAGINAÇÃO ===== -->
                    <div class="paginacao" id="paginacao">
                        <button class="page-btn" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="page-info">Página 1 de 1</span>
                        <button class="page-btn" disabled>
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MENU CONTEXTUAL                            -->
    <!-- ========================================== -->
    <div class="context-menu" id="contextMenu">
        <a href="#" class="context-item" id="menuVerDetalhes">
            <i class="fas fa-eye"></i>
            <span>Ver Detalhes</span>
        </a>
        <a href="#" class="context-item" id="menuVerServico">
            <i class="fas fa-tools"></i>
            <span>Ver Serviço</span>
        </a>
        <a href="#" class="context-item" id="menuVerFaturas">
            <i class="fas fa-file-invoice"></i>
            <span>Ver Faturas</span>
        </a>
        <a href="#" class="context-item" id="menuContactar">
            <i class="fas fa-envelope"></i>
            <span>Contactar Cliente</span>
        </a>
        <hr>
        <a href="#" class="context-item" id="menuEstado">
            <i class="fas fa-toggle-on"></i>
            <span>Alterar Estado</span>
        </a>
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
        // FILTROS
        // ============================================
        let filtroStatusAtual = 'todos';

        function filtrarPorStatus(status) {
            filtroStatusAtual = status;
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === status);
            });
            filtrarContratacoes();
        }

        function filtrarContratacoes() {
            const search = (document.getElementById('searchContratacao')?.value || '').toLowerCase().trim();
            const servico = document.getElementById('filtroServico')?.value || '';
            const prioridade = document.getElementById('filtroPrioridade')?.value || '';
            const cards = document.querySelectorAll('.contratacao-card');
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && card.dataset.status !== filtroStatusAtual) {
                    mostrar = false;
                }

                if (mostrar && servico && card.dataset.servico !== servico) {
                    mostrar = false;
                }

                if (mostrar && prioridade && card.dataset.prioridade !== prioridade) {
                    mostrar = false;
                }

                if (mostrar && search) {
                    mostrar = card.dataset.busca.includes(search);
                }

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            const container = document.getElementById('contratacoesGrid');
            const emptyState = document.querySelector('.empty-state-filtro');

            if (visiveis === 0 && container) {
                if (!emptyState) {
                    const empty = document.createElement('div');
                    empty.className = 'empty-state empty-state-filtro';
                    empty.innerHTML = `
                        <i class="fas fa-search"></i>
                        <h3>Nenhuma contratação encontrada</h3>
                        <p>Tente ajustar os filtros de pesquisa</p>
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar Filtros
                        </button>
                    `;
                    container.parentNode.appendChild(empty);
                }
            } else if (emptyState) {
                emptyState.remove();
            }
        }

        function limparFiltros() {
            document.getElementById('searchContratacao').value = '';
            document.getElementById('filtroServico').value = '';
            document.getElementById('filtroPrioridade').value = '';
            filtroStatusAtual = 'todos';
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === 'todos');
            });
            filtrarContratacoes();
        }

        // ============================================
        // MUDAR VIEW
        // ============================================
        function mudarView(view) {
            const container = document.getElementById('contratacoesGrid');
            if (!container) return;

            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === view);
            });

            if (view === 'list') {
                container.classList.add('contratacoes-list-view');
            } else {
                container.classList.remove('contratacoes-list-view');
            }

            localStorage.setItem('geonnexus-contratacoes-view', view);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedView = localStorage.getItem('geonnexus-contratacoes-view');
            if (savedView) mudarView(savedView);
        });

        // ============================================
        // MENU CONTEXTUAL
        // ============================================
        let contratacaoAtualMenu = null;

        function abrirMenuCard(event, id) {
            event.stopPropagation();
            event.preventDefault();

            contratacaoAtualMenu = id;
            const menu = document.getElementById('contextMenu');
            const rect = event.target.closest('button').getBoundingClientRect();

            menu.style.position = 'fixed';
            menu.style.top = (rect.bottom + 5) + 'px';
            menu.style.left = (rect.right - 220) + 'px';
            menu.style.display = 'block';

            setTimeout(() => {
                const menuRect = menu.getBoundingClientRect();
                if (menuRect.right > window.innerWidth) {
                    menu.style.left = (window.innerWidth - menuRect.width - 10) + 'px';
                }
                if (menuRect.bottom > window.innerHeight) {
                    menu.style.top = (rect.top - menuRect.height - 5) + 'px';
                }
            }, 10);
        }

        document.addEventListener('click', function(e) {
            const menu = document.getElementById('contextMenu');
            if (menu && !menu.contains(e.target) && !e.target.closest('.contratacao-actions')) {
                menu.style.display = 'none';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const menu = document.getElementById('contextMenu');
                if (menu) menu.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('menuEstado')?.addEventListener('click', function(e) {
                e.preventDefault();
                mostrarToast('Alteração de estado em desenvolvimento', 'info');
                document.getElementById('contextMenu').style.display = 'none';
            });

            document.getElementById('menuContactar')?.addEventListener('click', function(e) {
                e.preventDefault();
                mostrarToast('A abrir formulário de contacto...', 'info');
                document.getElementById('contextMenu').style.display = 'none';
            });
        });

        // ============================================
        // EXPORTAR
        // ============================================
        function exportarContratacoes() {
            mostrarToast('A preparar exportação...', 'info');
            setTimeout(() => {
                mostrarToast('Contratações exportadas com sucesso!', 'success');
            }, 1500);
        }
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

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 255, 163, 0.3);
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
        /* KPIs                                       */
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

        .kpi-total::before { background: #00FFA3; }
        .kpi-receita::before { background: #00D2FF; }
        .kpi-ticket::before { background: #FFD93D; }
        .kpi-conclusao::before { background: #6C2BD9; }

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
            font-size: 30px;
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

        .kpi-progresso {
            margin-top: 4px;
        }

        .kpi-progresso-barra {
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .kpi-progresso-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        /* ========================================== */
        /* KPIs SECUNDÁRIOS                           */
        /* ========================================== */
        .kpis-grid-secundaria {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
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
            transform: translateY(-2px);
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
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
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
            border-color: #00FFA3;
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
        }

        .search-box input::placeholder { color: var(--text-muted); }

        .filtros-actions {
            display: flex;
            gap: var(--space-sm);
            flex-shrink: 0;
            align-items: center;
        }

        .filtro-select {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 10px 34px 10px 14px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            transition: var(--transition-smooth);
        }

        .filtro-select:focus {
            outline: none;
            border-color: #00FFA3;
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
        .view-btn.active { background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%); color: #0A1628; }

        .filtros-status {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
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

        .filtro-status:hover { border-color: #00FFA3; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
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

        /* ========================================== */
        /* CONTRATAÇÕES GRID                          */
        /* ========================================== */
        .contratacoes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: var(--space-lg);
        }

        .contratacao-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
        }

        .contratacao-card:hover {
            border-color: var(--servico-color, #00FFA3);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        /* ===== HEADER DO CARD ===== */
        .contratacao-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: linear-gradient(135deg, var(--servico-color, #00FFA3)08 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .contratacao-codigo {
            font-family: var(--font-display);
            font-size: 11px;
            font-weight: 700;
            color: var(--text-muted);
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .contratacao-codigo i {
            color: var(--servico-color, #00FFA3);
            font-size: 10px;
        }

        .contratacao-header-badges {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-status i { font-size: 6px; animation: pulse 2s ease-in-out infinite; }

        .badge-status.status-em-andamento { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-status.status-concluido { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-cancelado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        .badge-prioridade {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-prioridade i { font-size: 8px; }

        .badge-prioridade.prioridade-alta { background: rgba(255, 159, 67, 0.12); color: #FF9F43; }
        .badge-prioridade.prioridade-media { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-prioridade.prioridade-baixa { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-prioridade.prioridade-urgente { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        /* ===== CORPO DO CARD ===== */
        .contratacao-card-body {
            padding: var(--space-md);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        /* ===== CLIENTE ===== */
        .contratacao-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .cliente-avatar {
            flex-shrink: 0;
        }

        .cliente-avatar img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #00FFA3;
        }

        .cliente-dados {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .cliente-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cliente-tipo {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== SERVIÇO ===== */
        .contratacao-servico {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .servico-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .servico-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .servico-categoria {
            font-size: 9px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .servico-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ===== INFO GRID ===== */
        .contratacao-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: var(--space-sm);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 9px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-label i {
            color: #00FFA3;
            font-size: 10px;
        }

        .info-value {
            font-size: var(--text-xs);
            color: var(--text-primary);
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ===== PROGRESSO ===== */
        .contratacao-progresso {
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .progresso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }

        .progresso-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .progresso-percent {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .progresso-barra {
            height: 6px;
            background: var(--bg-card);
            border-radius: 3px;
            overflow: hidden;
        }

        .progresso-preenchimento {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        /* ===== PRAZO ===== */
        .contratacao-prazo {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            font-size: var(--text-xs);
            font-weight: 600;
        }

        .contratacao-prazo.normal {
            background: rgba(0, 210, 255, 0.08);
            color: #00D2FF;
        }

        .contratacao-prazo.urgente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .contratacao-prazo.atrasado {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        /* ===== AVALIAÇÃO ===== */
        .contratacao-avaliacao {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: rgba(255, 217, 61, 0.06);
            border: 1px solid rgba(255, 217, 61, 0.15);
            border-radius: var(--radius-md);
            flex-wrap: wrap;
        }

        .avaliacao-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .avaliacao-estrelas {
            display: flex;
            gap: 2px;
            font-size: 12px;
            color: #FFD93D;
        }

        .avaliacao-nota {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #FFD93D;
            margin-left: auto;
        }

        /* ===== FOOTER ===== */
        .contratacao-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            border-top: 1px solid var(--border-color);
            background: var(--bg-input);
            gap: var(--space-sm);
        }

        .contratacao-valor {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .valor-total {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        .valor-info {
            font-size: 10px;
            color: var(--text-muted);
        }

        .valor-pago {
            color: #00D2FF;
            font-weight: 600;
        }

        .contratacao-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
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
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
        }

        /* ========================================== */
        /* LIST VIEW                                  */
        /* ========================================== */
        .contratacoes-grid.contratacoes-list-view {
            grid-template-columns: 1fr;
        }

        .contratacoes-grid.contratacoes-list-view .contratacao-card {
            display: grid;
            grid-template-columns: 1fr 300px;
            align-items: stretch;
        }

        .contratacoes-grid.contratacoes-list-view .contratacao-card-header,
        .contratacoes-grid.contratacoes-list-view .contratacao-card-body,
        .contratacoes-grid.contratacoes-list-view .contratacao-card-footer {
            grid-column: 1;
        }

        .contratacoes-grid.contratacoes-list-view .contratacao-card-footer {
            flex-direction: column;
            align-items: flex-start;
        }

        /* ========================================== */
        /* EMPTY STATE                                */
        /* ========================================== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px dashed var(--border-color);
        }

        .empty-state i {
            font-size: 56px;
            color: var(--text-muted);
            opacity: 0.4;
            margin-bottom: var(--space-md);
            display: block;
        }

        .empty-state h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .empty-state p {
            color: var(--text-muted);
            margin: 0 0 var(--space-lg) 0;
        }

        /* ========================================== */
        /* PAGINAÇÃO                                  */
        /* ========================================== */
        .paginacao {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg) 0 0;
            margin-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .page-btn {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
        }

        .page-btn:hover:not(:disabled) { border-color: #00FFA3; color: #00FFA3; }
        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 var(--space-sm);
        }

        /* ========================================== */
        /* MENU CONTEXTUAL                            */
        /* ========================================== */
        .context-menu {
            display: none;
            position: fixed;
            min-width: 220px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            padding: 4px;
            z-index: 999999;
            backdrop-filter: blur(10px);
        }

        .context-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: var(--text-sm);
            font-weight: 500;
            transition: var(--transition-smooth);
            cursor: pointer;
        }

        .context-item i {
            width: 16px;
            font-size: 13px;
            text-align: center;
            color: var(--text-muted);
        }

        .context-item:hover { background: var(--bg-card-hover); color: var(--text-primary); }
        .context-item:hover i { color: #00FFA3; }

        .context-menu hr {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 4px 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .kpis-grid { grid-template-columns: repeat(2, 1fr); }
            .kpis-grid-secundaria { grid-template-columns: repeat(2, 1fr); }
            .contratacoes-grid { grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .contratacoes-grid { grid-template-columns: 1fr; }
            
            .contratacoes-grid.contratacoes-list-view .contratacao-card {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .kpis-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .kpis-grid-secundaria { grid-template-columns: 1fr; }
            .kpi-value { font-size: 24px; }
            
            .filtros-top { flex-direction: column; align-items: stretch; }
            .filtros-actions { flex-direction: column; }
            .filtro-select { width: 100%; }
            
            .filtros-status {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 4px;
            }
            .filtro-status { white-space: nowrap; flex-shrink: 0; }
            
            .contratacao-info-grid { grid-template-columns: 1fr; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
        }

        @media (max-width: 480px) {
            .kpis-grid { grid-template-columns: 1fr; }
            .kpi-value { font-size: 22px; }
            
            .contratacao-card-footer { flex-direction: column; align-items: stretch; }
            .contratacao-actions { justify-content: flex-end; }
            
            .contratacao-header-badges { width: 100%; justify-content: flex-start; }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>