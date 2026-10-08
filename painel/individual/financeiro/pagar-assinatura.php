<?php
// painel/individual/assinatura.php - Minha Assinatura
include "../../includes/individual/notificacoes-individual-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Minha Assinatura';
$pagina_atual = 'assinatura';

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($notificacoes_count)) $notificacoes_count = 8;

// ============================================
// DADOS DO PROFISSIONAL
// ============================================
$profissional = [
    'id' => 1,
    'nome' => 'Carlos Mendes',
    'email' => 'carlos.mendes@email.com',
    'avatar' => 'avatar-1.png',
    'profissao' => 'Engenheiro Topógrafo',
    'plano' => 'Pro',
    'plano_status' => 'ativo'
];

// ============================================
// DADOS DA ASSINATURA ATUAL
// ============================================
$assinatura = [
    'id' => 1,
    'plano' => 'Pro',
    'plano_icon' => 'fa-crown',
    'plano_color' => '#FFD93D',
    'categoria' => 'Individual',
    'valor_mensal' => 25000,
    'valor_anual' => 250000,
    'periodo' => 'Mensal',
    'data_inicio' => '2025-06-15',
    'data_renovacao' => '2026-03-15',
    'dias_para_renovacao' => 35,
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'metodo_pagamento' => 'Multicaixa',
    'metodo_icon' => 'fa-credit-card',
    'ultimo_pagamento' => '2026-02-15 10:30:00',
    'proximo_pagamento' => '2026-03-15',
    'renovacao_automatica' => true,
    'desconto_aplicado' => 0
];

// ============================================
// PLANOS DISPONÍVEIS
// ============================================
$planos_disponiveis = [
    [
        'id' => 'basico',
        'nome' => 'Básico',
        'categoria' => 'Individual',
        'icon' => 'fa-user',
        'color' => '#00D2FF',
        'valor_mensal' => 15000,
        'valor_anual' => 150000,
        'descricao' => 'Ideal para profissionais que estão começando',
        'recursos' => [
            '1 utilizador',
            '5 projetos ativos',
            '5 GB de armazenamento',
            'Suporte por email',
            'Relatórios básicos',
            'Acesso a 3 setores'
        ],
        'atual' => false,
        'recomendado' => false
    ],
    [
        'id' => 'pro',
        'nome' => 'Pro',
        'categoria' => 'Individual',
        'icon' => 'fa-crown',
        'color' => '#FFD93D',
        'valor_mensal' => 25000,
        'valor_anual' => 250000,
        'descricao' => 'Plano avançado para profissionais experientes',
        'recursos' => [
            '3 utilizadores',
            '20 projetos ativos',
            '20 GB de armazenamento',
            'Suporte prioritário',
            'Relatórios avançados',
            'Acesso a 6 setores',
            'API completa',
            'Integrações avançadas'
        ],
        'atual' => true,
        'recomendado' => true
    ],
    [
        'id' => 'premium',
        'nome' => 'Premium',
        'categoria' => 'Individual',
        'icon' => 'fa-gem',
        'color' => '#6C2BD9',
        'valor_mensal' => 45000,
        'valor_anual' => 450000,
        'descricao' => 'Solução completa para equipes pequenas',
        'recursos' => [
            '5 utilizadores',
            '50 projetos ativos',
            '50 GB de armazenamento',
            'Suporte 24/7',
            'Relatórios personalizados',
            'Acesso a todos os 12 setores',
            'API completa',
            'Integrações avançadas',
            'Modelação 3D',
            'Dashboards personalizados'
        ],
        'atual' => false,
        'recomendado' => false
    ]
];

// ============================================
// HISTÓRICO DE PAGAMENTOS
// ============================================
$historico_pagamentos = [
    [
        'id' => 1,
        'referencia' => 'FT-2026-0042',
        'data' => '2026-02-15 10:30:00',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'metodo_icon' => 'fa-credit-card',
        'status' => 'pago',
        'status_label' => 'Pago',
        'periodo' => 'Fevereiro 2026'
    ],
    [
        'id' => 2,
        'referencia' => 'FT-2026-0028',
        'data' => '2026-01-15 09:15:00',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'metodo_icon' => 'fa-credit-card',
        'status' => 'pago',
        'status_label' => 'Pago',
        'periodo' => 'Janeiro 2026'
    ],
    [
        'id' => 3,
        'referencia' => 'FT-2025-0985',
        'data' => '2025-12-15 11:45:00',
        'valor' => 25000,
        'metodo' => 'Transferência',
        'metodo_icon' => 'fa-university',
        'status' => 'pago',
        'status_label' => 'Pago',
        'periodo' => 'Dezembro 2025'
    ],
    [
        'id' => 4,
        'referencia' => 'FT-2025-0871',
        'data' => '2025-11-15 14:20:00',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'metodo_icon' => 'fa-credit-card',
        'status' => 'pago',
        'status_label' => 'Pago',
        'periodo' => 'Novembro 2025'
    ],
    [
        'id' => 5,
        'referencia' => 'FT-2025-0763',
        'data' => '2025-10-15 10:00:00',
        'valor' => 25000,
        'metodo' => 'Transferência',
        'metodo_icon' => 'fa-university',
        'status' => 'pago',
        'status_label' => 'Pago',
        'periodo' => 'Outubro 2025'
    ]
];

// ============================================
// MÉTODOS DE PAGAMENTO DISPONÍVEIS
// ============================================
$metodos_pagamento = [
    [
        'id' => 'multicaixa',
        'nome' => 'Multicaixa Express',
        'icon' => 'fa-credit-card',
        'color' => '#FF6B6B',
        'descricao' => 'Pagamento via app Multicaixa Express',
        'taxa' => 0,
        'recomendado' => true
    ],
    [
        'id' => 'transferencia',
        'nome' => 'Transferência Bancária',
        'icon' => 'fa-university',
        'color' => '#00D2FF',
        'descricao' => 'Transferência para conta bancária',
        'taxa' => 0,
        'recomendado' => false
    ],
    [
        'id' => 'deposito',
        'nome' => 'Depósito Bancário',
        'icon' => 'fa-money-check-alt',
        'color' => '#FFD93D',
        'descricao' => 'Depósito em conta bancária',
        'taxa' => 0,
        'recomendado' => false
    ],
    [
        'id' => 'cartao',
        'nome' => 'Cartão de Crédito',
        'icon' => 'fa-cc-visa',
        'color' => '#6C2BD9',
        'descricao' => 'Visa, Mastercard, American Express',
        'taxa' => 2.5,
        'recomendado' => false
    ]
];

// ============================================
// ESTATÍSTICAS DA ASSINATURA
// ============================================
$total_pago = array_sum(array_column($historico_pagamentos, 'valor'));
$meses_ativo = 9;
$valor_poupado = 0;
$proxima_cobranca = $assinatura['proximo_pagamento'];

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
            'pago' => 'status-pago',
            'pendente' => 'status-pendente',
            'falhou' => 'status-falhou'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../includes/individual-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <?php include "../../includes/individual-sidebar.php" ?>

        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-crown icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status status-ativo">
                            <span class="status-dot"></span>
                            <?php echo $assinatura['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Minha Assinatura</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../includes/notificacoes-individual.php" ?>

                    <a href="financeiro/faturas.php" class="btn btn-outline">
                        <i class="fas fa-file-invoice"></i> Ver Faturas
                    </a>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- CARD DA ASSINATURA ATUAL                   -->
            <!-- ========================================== -->
            <section class="assinatura-atual animate-fade-up">
                <div class="assinatura-card">
                    <!-- Header -->
                    <div class="assinatura-header" style="--plano-color: <?php echo $assinatura['plano_color']; ?>;">
                        <div class="assinatura-plano-badge">
                            <div class="plano-icon" style="background: <?php echo $assinatura['plano_color']; ?>20; color: <?php echo $assinatura['plano_color']; ?>;">
                                <i class="fas <?php echo $assinatura['plano_icon']; ?>"></i>
                            </div>
                            <div class="plano-info">
                                <span class="plano-categoria"><?php echo $assinatura['categoria']; ?></span>
                                <h2 class="plano-nome">Plano <?php echo $assinatura['plano']; ?></h2>
                            </div>
                        </div>
                        <div class="assinatura-status">
                            <span class="badge-status status-ativo">
                                <i class="fas fa-check-circle"></i>
                                <?php echo $assinatura['status_label']; ?>
                            </span>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="assinatura-body">
                        <div class="assinatura-grid">
                            <div class="assinatura-info-item">
                                <span class="info-label">
                                    <i class="fas fa-money-bill-wave" style="color: #00FFA3;"></i>
                                    Valor Mensal
                                </span>
                                <span class="info-value" style="color: #00FFA3;">
                                    Kz <?php echo formatMoney($assinatura['valor_mensal']); ?>
                                </span>
                            </div>
                            <div class="assinatura-info-item">
                                <span class="info-label">
                                    <i class="fas fa-calendar-alt" style="color: #00D2FF;"></i>
                                    Período
                                </span>
                                <span class="info-value"><?php echo $assinatura['periodo']; ?></span>
                            </div>
                            <div class="assinatura-info-item">
                                <span class="info-label">
                                    <i class="fas fa-play-circle" style="color: #6C2BD9;"></i>
                                    Início
                                </span>
                                <span class="info-value"><?php echo formatDate($assinatura['data_inicio']); ?></span>
                            </div>
                            <div class="assinatura-info-item">
                                <span class="info-label">
                                    <i class="fas fa-sync" style="color: #FF9F43;"></i>
                                    Próxima Renovação
                                </span>
                                <span class="info-value"><?php echo formatDate($assinatura['data_renovacao']); ?></span>
                            </div>
                            <div class="assinatura-info-item">
                                <span class="info-label">
                                    <i class="fas <?php echo $assinatura['metodo_icon']; ?>" style="color: #FF6B6B;"></i>
                                    Método de Pagamento
                                </span>
                                <span class="info-value"><?php echo $assinatura['metodo_pagamento']; ?></span>
                            </div>
                            <div class="assinatura-info-item">
                                <span class="info-label">
                                    <i class="fas fa-credit-card" style="color: #FFD93D;"></i>
                                    Último Pagamento
                                </span>
                                <span class="info-value"><?php echo formatDate($assinatura['ultimo_pagamento']); ?></span>
                            </div>
                        </div>

                        <!-- Alerta de renovação -->
                        <div class="assinatura-alerta">
                            <i class="fas fa-info-circle"></i>
                            <div>
                                <strong>A sua assinatura renova automaticamente</strong>
                                <span>A próxima cobrança será de <strong>Kz <?php echo formatMoney($assinatura['valor_mensal']); ?></strong> no dia <strong><?php echo formatDate($assinatura['proximo_pagamento']); ?></strong> (<?php echo $assinatura['dias_para_renovacao']; ?> dias restantes).</span>
                            </div>
                        </div>

                        <!-- Ações rápidas -->
                        <div class="assinatura-acoes-rapidas">
                            <button class="btn btn-primary" onclick="pagarAgora()">
                                <i class="fas fa-credit-card"></i> Pagar Agora
                            </button>
                            <button class="btn btn-outline" onclick="abrirModalRenovacao()">
                                <i class="fas fa-sync"></i> Renovar Antecipadamente
                            </button>
                            <button class="btn btn-outline" onclick="toggleRenovacaoAutomatica()">
                                <i class="fas fa-toggle-<?php echo $assinatura['renovacao_automatica'] ? 'on' : 'off'; ?>"></i>
                                <?php echo $assinatura['renovacao_automatica'] ? 'Desativar Renovação Auto' : 'Ativar Renovação Auto'; ?>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ========================================== -->
            <!-- STATS CARDS                                -->
            <!-- ========================================== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($total_pago / 1000, 0); ?>k</div>
                    <div class="label">Total Investido</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> <?php echo count($historico_pagamentos); ?> pagamentos
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="value"><?php echo $meses_ativo; ?> meses</div>
                    <div class="label">Cliente desde</div>
                    <div class="trend neutral">
                        <i class="fas fa-calendar"></i> <?php echo formatDate($assinatura['data_inicio']); ?>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="value"><?php echo $assinatura['dias_para_renovacao']; ?> dias</div>
                    <div class="label">Para Renovação</div>
                    <div class="trend neutral">
                        <i class="fas fa-clock"></i> <?php echo formatDate($assinatura['data_renovacao']); ?>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="value">Pro</div>
                    <div class="label">Plano Atual</div>
                    <div class="trend up">
                        <i class="fas fa-crown"></i> Recomendado
                    </div>
                </div>
            </section>

            <!-- ========================================== -->
            <!-- PLANOS DISPONÍVEIS                         -->
            <!-- ========================================== -->
            <section class="planos-section animate-fade-up" style="animation-delay: 0.2s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-layer-group" style="color: #6C2BD9;"></i>
                        Planos Disponíveis
                    </h3>
                    <span class="section-subtitle">Compare e escolha o plano ideal para você</span>
                </div>

                <div class="planos-grid">
                    <?php foreach ($planos_disponiveis as $plano): ?>
                        <div class="plano-card <?php echo $plano['atual'] ? 'plano-atual' : ''; ?> <?php echo $plano['recomendado'] ? 'plano-recomendado' : ''; ?>"
                             style="--plano-color: <?php echo $plano['color']; ?>;">
                            
                            <?php if ($plano['atual']): ?>
                                <div class="plano-badge plano-badge-atual">
                                    <i class="fas fa-check-circle"></i> Plano Atual
                                </div>
                            <?php elseif ($plano['recomendado']): ?>
                                <div class="plano-badge plano-badge-recomendado">
                                    <i class="fas fa-star"></i> Recomendado
                                </div>
                            <?php endif; ?>

                            <div class="plano-header">
                                <div class="plano-icon-large" style="background: <?php echo $plano['color']; ?>20; color: <?php echo $plano['color']; ?>;">
                                    <i class="fas <?php echo $plano['icon']; ?>"></i>
                                </div>
                                <h3 class="plano-nome"><?php echo $plano['nome']; ?></h3>
                                <p class="plano-descricao"><?php echo $plano['descricao']; ?></p>
                            </div>

                            <div class="plano-preco">
                                <div class="preco-mensal">
                                    <span class="preco-valor">Kz <?php echo formatMoney($plano['valor_mensal']); ?></span>
                                    <span class="preco-periodo">/mês</span>
                                </div>
                                <div class="preco-anual">
                                    <i class="fas fa-tag"></i>
                                    Ou Kz <?php echo formatMoney($plano['valor_anual']); ?>/ano
                                    <span class="preco-desconto">(economize 2 meses)</span>
                                </div>
                            </div>

                            <div class="plano-recursos">
                                <span class="recursos-titulo">Recursos incluídos:</span>
                                <ul>
                                    <?php foreach ($plano['recursos'] as $recurso): ?>
                                        <li>
                                            <i class="fas fa-check-circle" style="color: <?php echo $plano['color']; ?>;"></i>
                                            <span><?php echo $recurso; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="plano-acoes">
                                <?php if ($plano['atual']): ?>
                                    <button class="btn btn-outline" disabled style="width: 100%; justify-content: center;">
                                        <i class="fas fa-check"></i> Plano Atual
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-primary" onclick="mudarPlano('<?php echo $plano['id']; ?>', '<?php echo $plano['nome']; ?>', <?php echo $plano['valor_mensal']; ?>)" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-arrow-up"></i> Mudar para <?php echo $plano['nome']; ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ========================================== -->
            <!-- MÉTODOS DE PAGAMENTO                       -->
            <!-- ========================================== -->
            <section class="metodos-section animate-fade-up" style="animation-delay: 0.3s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-credit-card" style="color: #00D2FF;"></i>
                        Métodos de Pagamento
                    </h3>
                    <span class="section-subtitle">Escolha o método mais conveniente</span>
                </div>

                <div class="metodos-grid">
                    <?php foreach ($metodos_pagamento as $metodo): ?>
                        <div class="metodo-card" onclick="selecionarMetodo('<?php echo $metodo['id']; ?>')">
                            <div class="metodo-icon" style="background: <?php echo $metodo['color']; ?>20; color: <?php echo $metodo['color']; ?>;">
                                <i class="fas <?php echo $metodo['icon']; ?>"></i>
                            </div>
                            <div class="metodo-info">
                                <span class="metodo-nome"><?php echo $metodo['nome']; ?></span>
                                <span class="metodo-descricao"><?php echo $metodo['descricao']; ?></span>
                                <?php if ($metodo['taxa'] > 0): ?>
                                    <span class="metodo-taxa">
                                        <i class="fas fa-percent"></i> Taxa: <?php echo $metodo['taxa']; ?>%
                                    </span>
                                <?php else: ?>
                                    <span class="metodo-taxa" style="color: #00FFA3;">
                                        <i class="fas fa-check"></i> Sem taxas
                                    </span>
                                <?php endif; ?>
                            </div>
                            <?php if ($metodo['recomendado']): ?>
                                <span class="metodo-badge">Recomendado</span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ========================================== -->
            <!-- HISTÓRICO DE PAGAMENTOS                    -->
            <!-- ========================================== -->
            <section class="historico-section animate-fade-up" style="animation-delay: 0.4s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-history" style="color: #FFD93D;"></i>
                        Histórico de Pagamentos
                        <span class="badge-count"><?php echo count($historico_pagamentos); ?></span>
                    </h3>
                    <a href="financeiro/faturas.php" class="btn btn-sm btn-outline">Ver todas as faturas</a>
                </div>

                <div class="historico-table-container">
                    <table class="historico-table">
                        <thead>
                            <tr>
                                <th>Referência</th>
                                <th>Período</th>
                                <th>Data</th>
                                <th>Método</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historico_pagamentos as $pagamento): ?>
                                <tr>
                                    <td class="historico-ref">
                                        <i class="fas fa-file-invoice" style="color: #6C2BD9;"></i>
                                        <?php echo $pagamento['referencia']; ?>
                                    </td>
                                    <td><?php echo $pagamento['periodo']; ?></td>
                                    <td class="historico-data"><?php echo formatDate($pagamento['data']); ?></td>
                                    <td>
                                        <span class="metodo-tag">
                                            <i class="fas <?php echo $pagamento['metodo_icon']; ?>"></i>
                                            <?php echo $pagamento['metodo']; ?>
                                        </span>
                                    </td>
                                    <td class="historico-valor">Kz <?php echo formatMoney($pagamento['valor']); ?></td>
                                    <td>
                                        <span class="badge-status <?php echo getStatusClass($pagamento['status']); ?>">
                                            <i class="fas fa-check-circle"></i>
                                            <?php echo $pagamento['status_label']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="historico-acoes">
                                            <button class="btn-action" onclick="verFatura(<?php echo $pagamento['id']; ?>)" title="Ver Fatura">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action" onclick="baixarFatura(<?php echo $pagamento['id']; ?>)" title="Baixar PDF">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE PAGAMENTO                         -->
    <!-- ========================================== -->
    <div class="modal" id="modalPagamento">
        <div class="modal-overlay" onclick="fecharModal('modalPagamento')"></div>
        <div class="modal-content modal-content-pagamento">
            <div class="modal-header modal-header-primary">
                <h3 class="modal-title modal-title-primary">
                    <i class="fas fa-credit-card"></i>
                    Pagar Assinatura
                </h3>
                <button class="modal-close" onclick="fecharModal('modalPagamento')">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Resumo -->
                <div class="pagamento-resumo">
                    <div class="resumo-item">
                        <span class="resumo-label">Plano</span>
                        <span class="resumo-value"><?php echo $assinatura['plano']; ?></span>
                    </div>
                    <div class="resumo-item">
                        <span class="resumo-label">Período</span>
                        <span class="resumo-value"><?php echo $assinatura['periodo']; ?></span>
                    </div>
                    <div class="resumo-item resumo-item-total">
                        <span class="resumo-label">Valor Total</span>
                        <span class="resumo-value valor-total">Kz <?php echo formatMoney($assinatura['valor_mensal']); ?></span>
                    </div>
                </div>

                <!-- Método de Pagamento -->
                <div class="form-group">
                    <label class="form-label">Método de Pagamento</label>
                    <div class="metodos-rapidos">
                        <?php foreach ($metodos_pagamento as $metodo): ?>
                            <label class="metodo-rapido">
                                <input type="radio" name="metodo_pagamento" value="<?php echo $metodo['id']; ?>" <?php echo $metodo['recomendado'] ? 'checked' : ''; ?>>
                                <div class="metodo-rapido-content">
                                    <div class="metodo-rapido-icon" style="background: <?php echo $metodo['color']; ?>20; color: <?php echo $metodo['color']; ?>;">
                                        <i class="fas <?php echo $metodo['icon']; ?>"></i>
                                    </div>
                                    <span class="metodo-rapido-nome"><?php echo $metodo['nome']; ?></span>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Comprovativo -->
                <div class="form-group">
                    <label class="form-label">Comprovativo de Pagamento</label>
                    <div class="comprovativo-upload" onclick="document.getElementById('comprovativoInput').click()">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Clique para anexar o comprovativo</span>
                        <small>PDF, JPG ou PNG até 5MB</small>
                        <input type="file" id="comprovativoInput" accept=".pdf,.jpg,.jpeg,.png" style="display: none;" onchange="previewComprovativo(event)">
                    </div>
                    <div class="comprovativo-preview" id="comprovativoPreview" style="display: none;">
                        <i class="fas fa-file-pdf" style="color: #FF6B6B;"></i>
                        <span id="comprovativoNome">-</span>
                        <button class="btn-remove" onclick="removerComprovativo()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Observações (opcional)</label>
                    <textarea class="form-control" id="observacoesPagamento" rows="2" 
                              placeholder="Notas sobre o pagamento..." maxlength="500"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalPagamento')">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button class="btn btn-primary" onclick="confirmarPagamento()">
                    <i class="fas fa-check"></i> Confirmar Pagamento
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE MUDANÇA DE PLANO                  -->
    <!-- ========================================== -->
    <div class="modal" id="modalMudarPlano">
        <div class="modal-overlay" onclick="fecharModal('modalMudarPlano')"></div>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header modal-header-primary">
                <h3 class="modal-title modal-title-primary">
                    <i class="fas fa-arrow-up"></i>
                    Mudar de Plano
                </h3>
                <button class="modal-close" onclick="fecharModal('modalMudarPlano')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mudanca-plano-info">
                    <div class="mudanca-plano-item">
                        <span class="mudanca-plano-label">Plano Atual</span>
                        <span class="mudanca-plano-value" id="planoAtualNome"><?php echo $assinatura['plano']; ?></span>
                    </div>
                    <div class="mudanca-plano-seta">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <div class="mudanca-plano-item">
                        <span class="mudanca-plano-label">Novo Plano</span>
                        <span class="mudanca-plano-value novo" id="planoNovoNome">-</span>
                    </div>
                </div>

                <div class="mudanca-plano-valor">
                    <span>Novo valor mensal:</span>
                    <strong id="planoNovoValor">Kz 0</strong>
                </div>

                <div class="mudanca-plano-aviso">
                    <i class="fas fa-info-circle"></i>
                    <span>A mudança será aplicada no próximo ciclo de faturação.</span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalMudarPlano')">Cancelar</button>
                <button class="btn btn-primary" id="btnConfirmarMudanca">
                    <i class="fas fa-check"></i> Confirmar Mudança
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
        // TOGGLE SIDEBAR MOBILE
        // ============================================
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
                    if (sidebar.classList.contains('open')) {
                        icon.className = 'fas fa-times';
                    } else {
                        icon.className = 'fas fa-bars';
                    }
                }
            }
        }

        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const menuBtn = document.getElementById('bottomMenuToggle');

            if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
                if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
                    sidebar.classList.remove('open');
                    if (overlay) overlay.classList.remove('active');

                    if (menuBtn) {
                        const icon = menuBtn.querySelector('i');
                        if (icon) icon.className = 'fas fa-bars';
                    }
                }
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
        // PAGAR AGORA
        // ============================================
        function pagarAgora() {
            document.getElementById('modalPagamento').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function abrirModalRenovacao() {
            document.getElementById('modalPagamento').classList.add('active');
            document.body.style.overflow = 'hidden';
            mostrarToast('Renovação antecipada iniciada', 'info');
        }

        // ============================================
        // COMPROVATIVO
        // ============================================
        function previewComprovativo(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (file.size > 5 * 1024 * 1024) {
                mostrarToast('O ficheiro deve ter no máximo 5MB', 'error');
                return;
            }

            const preview = document.getElementById('comprovativoPreview');
            const nome = document.getElementById('comprovativoNome');
            const icon = preview.querySelector('i');

            const ext = file.name.split('.').pop().toLowerCase();
            if (ext === 'pdf') {
                icon.className = 'fas fa-file-pdf';
                icon.style.color = '#FF6B6B';
            } else {
                icon.className = 'fas fa-file-image';
                icon.style.color = '#FF9F43';
            }

            nome.textContent = file.name;
            preview.style.display = 'flex';
            mostrarToast('Comprovativo carregado!', 'success');
        }

        function removerComprovativo() {
            document.getElementById('comprovativoPreview').style.display = 'none';
            document.getElementById('comprovativoInput').value = '';
        }

        // ============================================
        // CONFIRMAR PAGAMENTO
        // ============================================
        function confirmarPagamento() {
            const metodo = document.querySelector('input[name="metodo_pagamento"]:checked');
            const comprovativo = document.getElementById('comprovativoInput').files[0];

            if (!metodo) {
                mostrarToast('Selecione um método de pagamento!', 'error');
                return;
            }

            if (!comprovativo) {
                mostrarToast('Anexe o comprovativo de pagamento!', 'error');
                return;
            }

            mostrarToast('A processar o pagamento...', 'info');

            setTimeout(() => {
                fecharModal('modalPagamento');
                mostrarToast('Pagamento registado com sucesso! Aguardando aprovação.', 'success');
                setTimeout(() => location.reload(), 1500);
            }, 1500);
        }

        // ============================================
        // MUDAR DE PLANO
        // ============================================
        function mudarPlano(id, nome, valor) {
            document.getElementById('planoNovoNome').textContent = nome;
            document.getElementById('planoNovoValor').textContent = 'Kz ' + valor.toLocaleString('pt-AO').replace(/,/g, '.');
            
            document.getElementById('btnConfirmarMudanca').onclick = function() {
                mostrarToast('A processar mudança para o plano ' + nome + '...', 'info');
                setTimeout(() => {
                    fecharModal('modalMudarPlano');
                    mostrarToast('Plano alterado para ' + nome + '!', 'success');
                }, 1200);
            };

            document.getElementById('modalMudarPlano').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // ============================================
        // TOGGLE RENOVAÇÃO AUTOMÁTICA
        // ============================================
        function toggleRenovacaoAutomatica() {
            mostrarToast('Renovação automática alterada!', 'info');
            setTimeout(() => location.reload(), 800);
        }

        // ============================================
        // AÇÕES DAS FATURAS
        // ============================================
        function verFatura(id) {
            mostrarToast('A abrir fatura #' + id, 'info');
        }

        function baixarFatura(id) {
            mostrarToast('A baixar PDF da fatura #' + id, 'info');
        }

        // ============================================
        // FECHAR MODAIS
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
                document.querySelectorAll('.modal.active').forEach(m => {
                    m.classList.remove('active');
                });
                document.body.style.overflow = '';
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

        .header-left h1 .icon { color: #FFD93D; font-size: 0.85em; }

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

        .badge-status .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #00FFA3;
            animation: pulse 2s ease-in-out infinite;
        }

        .badge-status.status-ativo { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pago { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-falhou { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

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

        .assinatura-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            position: relative;
        }

        .assinatura-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-lg);
            background: linear-gradient(135deg, var(--plano-color, #FFD93D)15 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .assinatura-plano-badge {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .plano-icon {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            flex-shrink: 0;
        }

        .plano-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .plano-categoria {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .plano-nome {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .assinatura-body {
            padding: var(--space-lg);
        }

        .assinatura-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .assinatura-info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .info-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            word-break: break-word;
        }

        .assinatura-alerta {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: rgba(0, 210, 255, 0.06);
            border: 1px solid rgba(0, 210, 255, 0.2);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-lg);
        }

        .assinatura-alerta i {
            font-size: 22px;
            color: #00D2FF;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .assinatura-alerta div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .assinatura-alerta strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
        }

        .assinatura-alerta span {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .assinatura-alerta span strong {
            color: #00D2FF;
        }

        .assinatura-acoes-rapidas {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .assinatura-acoes-rapidas .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 18px;
            font-size: var(--text-sm);
            font-weight: 500;
            border-radius: var(--radius-md);
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
        .stat-card .trend.neutral { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        /* ========================================== */
        /* SEÇÕES COM HEADER                          */
        /* ========================================== */
        .planos-section,
        .metodos-section,
        .historico-section {
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
            flex-wrap: wrap;
        }

        .section-subtitle {
            font-size: var(--text-sm);
            color: var(--text-muted);
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
        /* PLANOS                                     */
        /* ========================================== */
        .planos-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
        }

        .plano-card {
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            position: relative;
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .plano-card:hover {
            border-color: var(--plano-color);
            transform: translateY(-4px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .plano-card.plano-atual {
            border-color: var(--plano-color);
            background: linear-gradient(135deg, var(--plano-color)08 0%, transparent 100%);
        }

        .plano-card.plano-recomendado {
            border-color: var(--plano-color);
        }

        .plano-badge {
            position: absolute;
            top: -12px;
            right: var(--space-md);
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .plano-badge-atual {
            background: #00FFA3;
            color: #0A1628;
        }

        .plano-badge-recomendado {
            background: var(--plano-color);
            color: #0A1628;
        }

        .plano-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: var(--space-sm);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .plano-icon-large {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .plano-header .plano-nome {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .plano-descricao {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.4;
        }

        .plano-preco {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md) 0;
            text-align: center;
        }

        .preco-mensal {
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: 4px;
        }

        .preco-valor {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--plano-color);
        }

        .preco-periodo {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .preco-anual {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .preco-desconto {
            color: #00FFA3;
            font-weight: 600;
        }

        .plano-recursos {
            flex: 1;
        }

        .recursos-titulo {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            display: block;
            margin-bottom: var(--space-sm);
        }

        .plano-recursos ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .plano-recursos ul li {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .plano-recursos ul li i {
            font-size: 14px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .plano-acoes {
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        /* ========================================== */
        /* MÉTODOS DE PAGAMENTO                       */
        /* ========================================== */
        .metodos-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
        }

        .metodo-card {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
            text-align: center;
            align-items: center;
        }

        .metodo-card:hover {
            border-color: #00D2FF;
            transform: translateY(-2px);
            box-shadow: var(--glass-shadow);
        }

        .metodo-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .metodo-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            align-items: center;
            text-align: center;
        }

        .metodo-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .metodo-descricao {
            font-size: var(--text-xs);
            color: var(--text-muted);
            line-height: 1.3;
        }

        .metodo-taxa {
            font-size: 10px;
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 8px;
            background: var(--bg-input);
            border-radius: var(--radius-full);
            margin-top: 4px;
        }

        .metodo-badge {
            position: absolute;
            top: -8px;
            right: var(--space-sm);
            padding: 2px 8px;
            background: #00FFA3;
            color: #0A1628;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* ========================================== */
        /* HISTÓRICO TABLE                            */
        /* ========================================== */
        .historico-table-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow-x: auto;
            padding: var(--space-sm);
        }

        .historico-table {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 800px;
        }

        .historico-table thead {
            background: var(--bg-input);
        }

        .historico-table thead th {
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

        .historico-table tbody tr {
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .historico-table tbody tr:hover {
            background: var(--bg-input);
        }

        .historico-table tbody td {
            padding: 14px;
            vertical-align: middle;
            color: var(--text-primary);
        }

        .historico-ref {
            font-family: var(--font-display);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            color: #6C2BD9;
        }

        .historico-data {
            color: var(--text-secondary);
            white-space: nowrap;
        }

        .metodo-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
            white-space: nowrap;
        }

        .metodo-tag i { color: #00D2FF; }

        .historico-valor {
            font-family: var(--font-display);
            font-weight: 700;
            color: #00FFA3;
            white-space: nowrap;
        }

        .historico-acoes {
            display: flex;
            gap: 4px;
        }

        .btn-action {
            width: 32px;
            height: 32px;
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

        .btn-action:hover {
            border-color: #00D2FF;
            color: #00D2FF;
            background: rgba(0, 210, 255, 0.05);
        }

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
            border: 1px solid var(--border-color);
            z-index: 10;
        }

        .modal-content-pagamento {
            max-width: 600px;
            border: 2px solid rgba(0, 210, 255, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-primary {
            background: linear-gradient(135deg, rgba(0, 210, 255, 0.12) 0%, rgba(108, 43, 217, 0.08) 100%);
            border-bottom-color: rgba(0, 210, 255, 0.2);
        }

        .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-title i { color: #00D2FF; }

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

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 140px; justify-content: center; }

        /* ========================================== */
        /* PAGAMENTO RESUMO                           */
        /* ========================================== */
        .pagamento-resumo {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-lg);
            border: 1px solid var(--border-color);
        }

        .resumo-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 4px 0;
        }

        .resumo-item:not(:last-child) {
            border-bottom: 1px solid var(--border-color);
        }

        .resumo-item-total {
            padding-top: var(--space-md);
            margin-top: var(--space-sm);
            border-top: 2px solid var(--border-color);
        }

        .resumo-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .resumo-value {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .valor-total {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            color: #00FFA3;
        }

        /* ========================================== */
        /* MÉTODOS RÁPIDOS                            */
        /* ========================================== */
        .metodos-rapidos {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-sm);
        }

        .metodo-rapido {
            cursor: pointer;
        }

        .metodo-rapido input[type="radio"] {
            display: none;
        }

        .metodo-rapido-content {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .metodo-rapido input[type="radio"]:checked + .metodo-rapido-content {
            border-color: #00D2FF;
            background: rgba(0, 210, 255, 0.05);
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
        }

        .metodo-rapido-content:hover {
            border-color: #00D2FF;
        }

        .metodo-rapido-icon {
            width: 38px;
            height: 38px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .metodo-rapido-nome {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* COMPROVATIVO UPLOAD                        */
        /* ========================================== */
        .comprovativo-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg);
            background: var(--bg-input);
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: center;
        }

        .comprovativo-upload:hover {
            border-color: #00D2FF;
            background: rgba(0, 210, 255, 0.02);
        }

        .comprovativo-upload i {
            font-size: 32px;
            color: #00D2FF;
        }

        .comprovativo-upload span {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        .comprovativo-upload small {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-preview {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(0, 255, 163, 0.05);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-md);
            margin-top: var(--space-sm);
        }

        .comprovativo-preview i { font-size: 24px; }

        .comprovativo-preview span {
            flex: 1;
            font-size: var(--text-sm);
            color: var(--text-primary);
            word-break: break-word;
        }

        .comprovativo-preview .btn-remove {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .comprovativo-preview .btn-remove:hover {
            background: #FF6B6B;
            color: #FFFFFF;
            transform: scale(1.1);
        }

        /* ========================================== */
        /* MUDANÇA DE PLANO                           */
        /* ========================================== */
        .mudanca-plano-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-md);
            padding: var(--space-lg);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .mudanca-plano-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            text-align: center;
            flex: 1;
            min-width: 120px;
        }

        .mudanca-plano-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .mudanca-plano-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        .mudanca-plano-value.novo {
            color: #00FFA3;
        }

        .mudanca-plano-seta {
            font-size: 24px;
            color: #00D2FF;
            flex-shrink: 0;
        }

        .mudanca-plano-valor {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            background: rgba(0, 255, 163, 0.05);
            border-radius: var(--radius-md);
            border: 1px solid rgba(0, 255, 163, 0.2);
            margin-bottom: var(--space-md);
        }

        .mudanca-plano-valor span {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .mudanca-plano-valor strong {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            color: #00FFA3;
        }

        .mudanca-plano-aviso {
            display: flex;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: rgba(0, 210, 255, 0.06);
            border: 1px solid rgba(0, 210, 255, 0.2);
            border-radius: var(--radius-md);
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .mudanca-plano-aviso i {
            color: #00D2FF;
            font-size: 14px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* ========================================== */
        /* FORM GROUP                                 */
        /* ========================================== */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: var(--space-md);
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
            resize: vertical;
        }

        .form-control:focus {
            outline: none;
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
        }

        .form-control::placeholder { color: var(--text-muted); }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .planos-grid { grid-template-columns: 1fr 1fr; }
            .metodos-grid { grid-template-columns: 1fr 1fr; }
            .assinatura-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            
            .planos-grid { grid-template-columns: 1fr; }
            .metodos-grid { grid-template-columns: 1fr; }
            .assinatura-grid { grid-template-columns: 1fr; }
            
            .assinatura-acoes-rapidas { flex-direction: column; }
            .assinatura-acoes-rapidas .btn { width: 100%; justify-content: center; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
            
            .metodos-rapidos { grid-template-columns: 1fr; }
            
            .mudanca-plano-info { flex-direction: column; }
            .mudanca-plano-seta { transform: rotate(90deg); }
            
            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .plano-header .plano-nome { font-size: var(--text-h4); }
            .preco-valor { font-size: var(--text-h3); }
            .assinatura-header { flex-direction: column; align-items: flex-start; }
        }
    </style>

</body>

</html>