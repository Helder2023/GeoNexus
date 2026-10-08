<?php
// painel/individual/financeiro/pagamento-detalhe.php - Detalhes do Pagamento
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Detalhes do Pagamento';
$pagina_atual = 'pagamento-detalhe';

// ============================================
// OBTER ID DO PAGAMENTO
// ============================================
$id_pagamento = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// DADOS MOCKADOS - PAGAMENTO ATUAL
// ============================================
$pagamento = [
    'id' => $id_pagamento,
    'codigo' => 'PAG-2026-0001',
    'cliente' => 'Construtora ABC',
    'cliente_avatar' => 'empresa-1.png',
    'cliente_tipo' => 'Empresa',
    'cliente_email' => 'financeiro@construtoraabc.ao',
    'cliente_telefone' => '+244 222 345 678',
    'cliente_nif' => '5417896321',
    'cliente_endereco' => 'Rua Amílcar Cabral, 123 - Luanda',
    'descricao' => 'Pagamento Parcial - Projeto Zona Norte',
    'observacoes' => 'Pagamento referente à primeira fase do projeto de levantamento topográfico. Cliente com bom histórico de pagamentos.',
    'valor' => 175000,
    'valor_total' => 350000,
    'valor_restante' => 175000,
    'percentual_pago' => 50,
    'metodo' => 'Transferência Bancária',
    'metodo_icon' => 'fa-university',
    'referencia' => 'TRF-2026-0045',
    'status' => 'pago',
    'status_label' => 'Pago',
    'data_criacao' => '2026-02-15 10:30:00',
    'data_vencimento' => '2026-02-20',
    'data_pagamento' => '2026-02-18 14:20:00',
    'comprovativo' => [
        'nome' => 'comprovativo-001.pdf',
        'tamanho' => '2.4 MB',
        'tipo' => 'pdf',
        'data_upload' => '2026-02-18 14:25:00'
    ],
    'projeto' => [
        'id' => 1,
        'nome' => 'Levantamento Topográfico - Zona Norte',
        'codigo' => 'PRJ-2026-0001'
    ],
    'fatura' => [
        'id' => 1,
        'numero' => 'FT-2026-0156'
    ],
    'tipo' => 'recebimento',
    'criado_por' => 'Carlos Mendes',
    'verificado_por' => 'Sistema'
];

// ============================================
// HISTÓRICO DO PAGAMENTO
// ============================================
$historico = [
    [
        'id' => 1,
        'acao' => 'Pagamento registado',
        'usuario' => 'Carlos Mendes',
        'data' => '2026-02-15 10:30:00',
        'icon' => 'fa-plus-circle',
        'color' => '#00D2FF',
        'detalhes' => 'Pagamento registado no sistema'
    ],
    [
        'id' => 2,
        'acao' => 'Notificação enviada',
        'usuario' => 'Sistema',
        'data' => '2026-02-15 10:35:00',
        'icon' => 'fa-envelope',
        'color' => '#6C2BD9',
        'detalhes' => 'Cliente notificado sobre o pagamento'
    ],
    [
        'id' => 3,
        'acao' => 'Pagamento confirmado',
        'usuario' => 'Construtora ABC',
        'data' => '2026-02-18 14:20:00',
        'icon' => 'fa-check-circle',
        'color' => '#00FFA3',
        'detalhes' => 'Pagamento efetuado com sucesso'
    ],
    [
        'id' => 4,
        'acao' => 'Comprovativo anexado',
        'usuario' => 'Carlos Mendes',
        'data' => '2026-02-18 14:25:00',
        'icon' => 'fa-paperclip',
        'color' => '#00D2FF',
        'detalhes' => 'Comprovativo comprovativo-001.pdf anexado'
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
            'pago' => 'status-pago',
            'pendente' => 'status-pendente',
            'falhou' => 'status-falhou',
            'cancelado' => 'status-cancelado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getStatusIcon')) {
    function getStatusIcon($status) {
        $icons = [
            'pago' => 'fa-check-circle',
            'pendente' => 'fa-clock',
            'falhou' => 'fa-times-circle',
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
                        <i class="fas fa-money-bill-wave icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status <?php echo getStatusClass($pagamento['status']); ?>" style="font-size: 14px; padding: 6px 16px;">
                            <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                            <?php echo $pagamento['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="pagamentos.php">Pagamentos</a>
                        <span class="separator">/</span>
                        <span><?php echo $pagamento['codigo']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="pagamentos.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                    <?php if ($pagamento['status'] === 'pendente'): ?>
                        <a href="pagamento-aprovar.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-success">
                            <i class="fas fa-check"></i> Aprovar
                        </a>
                        <a href="pagamento-rejeitar.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-danger">
                            <i class="fas fa-times"></i> Rejeitar
                        </a>
                    <?php else: ?>
                        <a href="pagamento-editar.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    <?php endif; ?>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($pagamento['valor']); ?></div>
                    <div class="label">Valor Pago</div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="value"><?php echo $pagamento['percentual_pago']; ?>%</div>
                    <div class="label">Do Total</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($pagamento['valor_restante']); ?></div>
                    <div class="label">Valor Restante</div>
                </div>

                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="value" style="font-size: var(--text-h4);">
                        <?php echo $pagamento['data_pagamento'] ? formatDate($pagamento['data_pagamento']) : 'Pendente'; ?>
                    </div>
                    <div class="label">Data de Pagamento</div>
                </div>
            </section>

            <!-- ===== DETALHE GRID ===== -->
            <div class="detalhe-grid">
                <!-- ========================================== -->
                <!-- COLUNA PRINCIPAL                           -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-principal">

                    <!-- ===== CARD: INFORMAÇÕES DO PAGAMENTO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.1s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-info-circle" style="color: #00FFA3;"></i>
                                Informações do Pagamento
                            </h3>
                            <span class="badge-tipo" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                <?php echo $pagamento['tipo'] === 'recebimento' ? 'Recebimento' : 'Pagamento'; ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="info-grid">
                                <div class="info-item">
                                    <span class="info-label">Código</span>
                                    <span class="info-value" style="font-family: var(--font-display); color: #00FFA3; font-weight: 700;">
                                        <?php echo $pagamento['codigo']; ?>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Referência</span>
                                    <span class="info-value" style="font-family: var(--font-display);">
                                        <?php echo $pagamento['referencia']; ?>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Método</span>
                                    <span class="info-value">
                                        <i class="fas <?php echo $pagamento['metodo_icon']; ?>" style="color: #00FFA3; margin-right: 6px;"></i>
                                        <?php echo $pagamento['metodo']; ?>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Status</span>
                                    <span class="badge-status <?php echo getStatusClass($pagamento['status']); ?>">
                                        <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                                        <?php echo $pagamento['status_label']; ?>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Data de Criação</span>
                                    <span class="info-value"><?php echo formatDateTime($pagamento['data_criacao']); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Data de Vencimento</span>
                                    <span class="info-value"><?php echo formatDate($pagamento['data_vencimento']); ?></span>
                                </div>
                                <?php if ($pagamento['data_pagamento']): ?>
                                <div class="info-item">
                                    <span class="info-label">Data de Pagamento</span>
                                    <span class="info-value" style="color: #00FFA3;">
                                        <i class="fas fa-check-circle" style="margin-right: 4px;"></i>
                                        <?php echo formatDateTime($pagamento['data_pagamento']); ?>
                                    </span>
                                </div>
                                <?php endif; ?>
                                <div class="info-item">
                                    <span class="info-label">Criado por</span>
                                    <span class="info-value"><?php echo $pagamento['criado_por']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD: DESCRIÇÃO E VALORES ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.15s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-align-left" style="color: #00D2FF;"></i>
                                Descrição e Valores
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="descricao-block">
                                <span class="descricao-label">Descrição</span>
                                <p class="descricao-texto"><?php echo $pagamento['descricao']; ?></p>
                            </div>

                            <?php if ($pagamento['observacoes']): ?>
                            <div class="descricao-block">
                                <span class="descricao-label">Observações</span>
                                <p class="descricao-texto observacoes"><?php echo $pagamento['observacoes']; ?></p>
                            </div>
                            <?php endif; ?>

                            <!-- Valores -->
                            <div class="valores-grid">
                                <div class="valor-item">
                                    <span class="valor-label">Valor Total do Projeto</span>
                                    <span class="valor-valor">Kz <?php echo formatMoney($pagamento['valor_total']); ?></span>
                                </div>
                                <div class="valor-item valor-pago">
                                    <span class="valor-label">Valor Pago</span>
                                    <span class="valor-valor" style="color: #00FFA3;">
                                        Kz <?php echo formatMoney($pagamento['valor']); ?>
                                    </span>
                                </div>
                                <div class="valor-item valor-restante">
                                    <span class="valor-label">Valor Restante</span>
                                    <span class="valor-valor" style="color: #FFD93D;">
                                        Kz <?php echo formatMoney($pagamento['valor_restante']); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Barra de progresso -->
                            <div class="progresso-pagamento">
                                <div class="progresso-header">
                                    <span>Progresso do Pagamento</span>
                                    <span style="color: #00FFA3; font-weight: 700;"><?php echo $pagamento['percentual_pago']; ?>%</span>
                                </div>
                                <div class="progresso-barra">
                                    <div class="progresso-fill" style="width: <?php echo $pagamento['percentual_pago']; ?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD: COMPROVATIVO ===== -->
                    <?php if ($pagamento['comprovativo']): ?>
                    <div class="card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-paperclip" style="color: #FF6B6B;"></i>
                                Comprovativo
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="comprovativo-card">
                                <div class="comprovativo-preview">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="comprovativo-info">
                                    <span class="comprovativo-nome"><?php echo $pagamento['comprovativo']['nome']; ?></span>
                                    <div class="comprovativo-meta">
                                        <span><i class="fas fa-hdd"></i> <?php echo $pagamento['comprovativo']['tamanho']; ?></span>
                                        <span><i class="far fa-clock"></i> <?php echo timeAgo($pagamento['comprovativo']['data_upload']); ?></span>
                                    </div>
                                </div>
                                <div class="comprovativo-actions">
                                    <button class="btn btn-sm btn-outline" onclick="visualizarComprovativo()">
                                        <i class="fas fa-eye"></i> Visualizar
                                    </button>
                                    <button class="btn btn-sm btn-primary" onclick="baixarComprovativo()">
                                        <i class="fas fa-download"></i> Baixar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- ===== CARD: HISTÓRICO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.25s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-history" style="color: #6C2BD9;"></i>
                                Histórico do Pagamento
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="historico-list">
                                <?php foreach ($historico as $item): ?>
                                    <div class="historico-item">
                                        <div class="historico-icon" style="background: <?php echo $item['color']; ?>15; color: <?php echo $item['color']; ?>;">
                                            <i class="fas <?php echo $item['icon']; ?>"></i>
                                        </div>
                                        <div class="historico-conteudo">
                                            <span class="historico-acao"><?php echo $item['acao']; ?></span>
                                            <span class="historico-detalhes"><?php echo $item['detalhes']; ?></span>
                                            <div class="historico-meta">
                                                <span><i class="fas fa-user"></i> <?php echo $item['usuario']; ?></span>
                                                <span><i class="far fa-clock"></i> <?php echo timeAgo($item['data']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- COLUNA LATERAL                             -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-lateral">

                    <!-- ===== CARD: CLIENTE ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.3s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-user-tie" style="color: #00D2FF;"></i>
                                Cliente
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="cliente-detalhe">
                                <div class="cliente-avatar-grande">
                                    <img src="../../../assets/images/<?php echo $pagamento['cliente_avatar']; ?>" 
                                         alt="<?php echo $pagamento['cliente']; ?>"
                                         onerror="this.src='<?php echo getAvatarUrl($pagamento['cliente']); ?>'">
                                    <span class="cliente-tipo-badge"><?php echo $pagamento['cliente_tipo']; ?></span>
                                </div>
                                <h4><?php echo $pagamento['cliente']; ?></h4>

                                <div class="cliente-info-list">
                                    <div class="cliente-info-item">
                                        <i class="fas fa-envelope"></i>
                                        <span><?php echo $pagamento['cliente_email']; ?></span>
                                    </div>
                                    <div class="cliente-info-item">
                                        <i class="fas fa-phone"></i>
                                        <span><?php echo $pagamento['cliente_telefone']; ?></span>
                                    </div>
                                    <div class="cliente-info-item">
                                        <i class="fas fa-id-card"></i>
                                        <span>NIF: <?php echo $pagamento['cliente_nif']; ?></span>
                                    </div>
                                    <div class="cliente-info-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?php echo $pagamento['cliente_endereco']; ?></span>
                                    </div>
                                </div>

                                <div class="cliente-acoes">
                                    <button class="btn btn-sm btn-outline" onclick="contactarCliente()">
                                        <i class="fas fa-envelope"></i> Contactar
                                    </button>
                                    <a href="cliente-editar.php?id=1" class="btn btn-sm btn-outline">
                                        <i class="fas fa-user-edit"></i> Ver Perfil
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD: PROJETO E FATURA ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-link" style="color: #FFD93D;"></i>
                                Vínculos
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="vinculos-list">
                                <a href="../projeto-detalhe.php?id=<?php echo $pagamento['projeto']['id']; ?>" class="vinculo-item">
                                    <div class="vinculo-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                    <div class="vinculo-info">
                                        <span class="vinculo-label">Projeto</span>
                                        <span class="vinculo-valor"><?php echo $pagamento['projeto']['nome']; ?></span>
                                        <span class="vinculo-codigo"><?php echo $pagamento['projeto']['codigo']; ?></span>
                                    </div>
                                    <i class="fas fa-chevron-right vinculo-arrow"></i>
                                </a>

                                <a href="fatura-detalhe.php?id=<?php echo $pagamento['fatura']['id']; ?>" class="vinculo-item">
                                    <div class="vinculo-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                    <div class="vinculo-info">
                                        <span class="vinculo-label">Fatura</span>
                                        <span class="vinculo-valor"><?php echo $pagamento['fatura']['numero']; ?></span>
                                    </div>
                                    <i class="fas fa-chevron-right vinculo-arrow"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD: AÇÕES RÁPIDAS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                                Ações Rápidas
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="acoes-lista">
                                <button class="acao-item" onclick="enviarRecibo()">
                                    <div class="acao-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                        <i class="fas fa-receipt"></i>
                                    </div>
                                    <span>Enviar Recibo</span>
                                </button>
                                <button class="acao-item" onclick="registarPagamentoRestante()">
                                    <div class="acao-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                    <span>Registar Pagamento Restante</span>
                                </button>
                                <button class="acao-item" onclick="duplicarPagamento()">
                                    <div class="acao-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                                        <i class="fas fa-copy"></i>
                                    </div>
                                    <span>Duplicar Pagamento</span>
                                </button>
                                <button class="acao-item" onclick="gerarReciboPDF()">
                                    <div class="acao-icon" style="background: rgba(255, 159, 67, 0.15); color: #FF9F43;">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <span>Gerar Recibo PDF</span>
                                </button>
                                <button class="acao-item acao-item-danger" onclick="excluirPagamento()">
                                    <div class="acao-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                    <span>Excluir Pagamento</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD: RESUMO FINANCEIRO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.45s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-chart-pie" style="color: #00FFA3;"></i>
                                Resumo Financeiro
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="resumo-financeiro-list">
                                <div class="resumo-financeiro-item">
                                    <span class="resumo-label">
                                        <i class="fas fa-coins"></i>
                                        Valor Total
                                    </span>
                                    <span class="resumo-valor">Kz <?php echo formatMoney($pagamento['valor_total']); ?></span>
                                </div>
                                <div class="resumo-financeiro-item">
                                    <span class="resumo-label">
                                        <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                                        Já Pago
                                    </span>
                                    <span class="resumo-valor" style="color: #00FFA3;">Kz <?php echo formatMoney($pagamento['valor']); ?></span>
                                </div>
                                <div class="resumo-financeiro-item">
                                    <span class="resumo-label">
                                        <i class="fas fa-hourglass-half" style="color: #FFD93D;"></i>
                                        Falta Pagar
                                    </span>
                                    <span class="resumo-valor" style="color: #FFD93D;">Kz <?php echo formatMoney($pagamento['valor_restante']); ?></span>
                                </div>
                            </div>
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
                    Confirmar Ação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="modalConfirmacaoBody">
                <p>Tem certeza que deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-danger" id="modalConfirmacaoBtn">
                    <i class="fas fa-check"></i> Confirmar
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
        // COMPROVATIVO
        // ============================================
        function visualizarComprovativo() {
            mostrarToast('A abrir comprovativo...', 'info');
        }

        function baixarComprovativo() {
            mostrarToast('A baixar comprovativo...', 'info');
        }

        // ============================================
        // AÇÕES RÁPIDAS
        // ============================================
        function contactarCliente() {
            mostrarToast('A abrir email para <?php echo $pagamento['cliente_email']; ?>', 'info');
        }

        function enviarRecibo() {
            mostrarToast('Recibo enviado para o cliente!', 'success');
        }

        function registarPagamentoRestante() {
            if (confirm('Deseja registar o pagamento restante de Kz <?php echo formatMoney($pagamento['valor_restante']); ?>?')) {
                mostrarToast('Redirecionando para novo pagamento...', 'info');
                setTimeout(() => {
                    window.location.href = 'pagamento-criar.php?projeto=<?php echo $pagamento['projeto']['id']; ?>';
                }, 1000);
            }
        }

        function duplicarPagamento() {
            if (confirm('Deseja duplicar este pagamento?')) {
                mostrarToast('Pagamento duplicado com sucesso!', 'success');
            }
        }

        function gerarReciboPDF() {
            mostrarToast('A gerar recibo PDF...', 'info');
            setTimeout(() => mostrarToast('Recibo gerado com sucesso!', 'success'), 1500);
        }

        function excluirPagamento() {
            const body = document.getElementById('modalConfirmacaoBody');
            body.innerHTML = `
                <div class="modal-alerta-danger">
                    <i class="fas fa-trash"></i>
                    <div>
                        <strong>Excluir Pagamento</strong>
                        <span>Tem certeza que deseja excluir este pagamento? Esta ação não pode ser desfeita e o histórico será permanentemente removido.</span>
                    </div>
                </div>
                <div style="margin-top: var(--space-md); padding: var(--space-md); background: var(--bg-input); border-radius: var(--radius-md);">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <span style="font-size: var(--text-sm); color: var(--text-muted);">Código:</span>
                        <span style="font-family: var(--font-display); font-weight: 700;"><?php echo $pagamento['codigo']; ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="font-size: var(--text-sm); color: var(--text-muted);">Valor:</span>
                        <span style="font-family: var(--font-display); font-weight: 700; color: #00FFA3;">Kz <?php echo formatMoney($pagamento['valor']); ?></span>
                    </div>
                </div>
            `;
            document.getElementById('modalConfirmacao').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // ============================================
        // MODAIS
        // ============================================
        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.getElementById('modalConfirmacaoBtn')?.addEventListener('click', function() {
            mostrarToast('Pagamento excluído!', 'error');
            fecharModal('modalConfirmacao');
            setTimeout(() => {
                window.location.href = 'pagamentos.php';
            }, 1500);
        });

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
            font-size: var(--text-h2);
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

        .btn-theme:hover { border-color: #00FFA3; color: #00FFA3; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* BADGES                                     */
        /* ========================================== */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-status.status-pago { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-falhou { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-cancelado { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        .badge-tipo {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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

        /* ========================================== */
        /* DETALHE GRID                               */
        /* ========================================== */
        .detalhe-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: var(--space-lg);
        }

        /* ========================================== */
        /* CARDS                                      */
        /* ========================================== */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
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

        .card-body {
            padding: var(--space-lg);
        }

        /* ========================================== */
        /* INFO GRID                                  */
        /* ========================================== */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .info-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .info-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        /* ========================================== */
        /* DESCRIÇÃO E VALORES                        */
        /* ========================================== */
        .descricao-block {
            margin-bottom: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .descricao-block:last-of-type {
            border-bottom: none;
            padding-bottom: 0;
        }

        .descricao-label {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .descricao-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        .descricao-texto.observacoes {
            padding: var(--space-md);
            background: rgba(0, 210, 255, 0.04);
            border-left: 3px solid #00D2FF;
            border-radius: var(--radius-sm);
            font-style: italic;
        }

        .valores-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .valor-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            text-align: center;
        }

        .valor-item.valor-pago {
            background: rgba(0, 255, 163, 0.04);
            border-color: rgba(0, 255, 163, 0.2);
        }

        .valor-item.valor-restante {
            background: rgba(255, 217, 61, 0.04);
            border-color: rgba(255, 217, 61, 0.2);
        }

        .valor-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .valor-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* PROGRESSO                                  */
        /* ========================================== */
        .progresso-pagamento {
            margin-top: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .progresso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin-bottom: var(--space-sm);
        }

        .progresso-barra {
            height: 10px;
            background: var(--bg-card);
            border-radius: 5px;
            overflow: hidden;
        }

        .progresso-fill {
            height: 100%;
            background: linear-gradient(90deg, #00FFA3 0%, #00D2FF 100%);
            border-radius: 5px;
            transition: width 0.6s ease;
        }

        /* ========================================== */
        /* COMPROVATIVO                               */
        /* ========================================== */
        .comprovativo-card {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .comprovativo-preview {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-md);
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            flex-shrink: 0;
        }

        .comprovativo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .comprovativo-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .comprovativo-meta {
            display: flex;
            gap: var(--space-md);
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-actions {
            display: flex;
            gap: var(--space-sm);
            flex-shrink: 0;
        }

        /* ========================================== */
        /* HISTÓRICO                                  */
        /* ========================================== */
        .historico-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .historico-item {
            display: flex;
            gap: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .historico-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .historico-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .historico-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .historico-acao {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .historico-detalhes {
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .historico-meta {
            display: flex;
            gap: var(--space-md);
            font-size: var(--text-xs);
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        /* ========================================== */
        /* CLIENTE                                    */
        /* ========================================== */
        .cliente-detalhe {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: var(--space-md);
        }

        .cliente-avatar-grande {
            position: relative;
            display: inline-block;
        }

        .cliente-avatar-grande img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #00D2FF;
        }

        .cliente-avatar-grande .cliente-tipo-badge {
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-full);
            padding: 2px 10px;
            font-size: 10px;
            font-weight: 600;
            color: #00D2FF;
            white-space: nowrap;
        }

        .cliente-detalhe h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .cliente-info-list {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding: var(--space-md) 0;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .cliente-info-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            text-align: left;
        }

        .cliente-info-item i {
            width: 16px;
            color: #00D2FF;
            font-size: 12px;
            flex-shrink: 0;
        }

        .cliente-info-item span {
            word-break: break-word;
        }

        .cliente-acoes {
            display: flex;
            gap: var(--space-sm);
            width: 100%;
        }

        .cliente-acoes .btn {
            flex: 1;
            justify-content: center;
        }

        /* ========================================== */
        /* VÍNCULOS                                   */
        /* ========================================== */
        .vinculos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .vinculo-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .vinculo-item:hover {
            border-color: #00FFA3;
            transform: translateX(4px);
        }

        .vinculo-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .vinculo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .vinculo-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .vinculo-valor {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .vinculo-codigo {
            font-family: var(--font-display);
            font-size: 10px;
            color: var(--text-muted);
        }

        .vinculo-arrow {
            color: var(--text-muted);
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .vinculo-item:hover .vinculo-arrow {
            color: #00FFA3;
            transform: translateX(4px);
        }

        /* ========================================== */
        /* AÇÕES RÁPIDAS                              */
        /* ========================================== */
        .acoes-lista {
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

        .acao-item-danger { color: #FF6B6B; }
        .acao-item-danger:hover {
            background: rgba(255, 107, 107, 0.08);
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        /* ========================================== */
        /* RESUMO FINANCEIRO                          */
        /* ========================================== */
        .resumo-financeiro-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .resumo-financeiro-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .resumo-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .resumo-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
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
            line-height: 1.5;
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

        .btn-success {
            background: #00FFA3;
            color: #0A1628;
            border: none;
        }

        .btn-success:hover {
            background: #00E594;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 255, 163, 0.4);
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
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            .info-grid { grid-template-columns: 1fr; }
            .valores-grid { grid-template-columns: 1fr; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            .header-right .btn { font-size: var(--text-xs); padding: 6px 12px; }

            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }

            .comprovativo-card { flex-direction: column; text-align: center; }
            .comprovativo-actions { width: 100%; }
            .comprovativo-actions .btn { flex: 1; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .cliente-acoes { flex-direction: column; }
            .cliente-acoes .btn { width: 100%; }
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

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>