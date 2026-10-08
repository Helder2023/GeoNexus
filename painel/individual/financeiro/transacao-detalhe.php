<?php
// painel/individual/financeiro/transacao-detalhe.php - Detalhe da Transação
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Detalhe da Transação';
$pagina_atual = 'transacao-detalhe';

// ============================================
// GARANTIR VARIÁVEIS (FALLBACK)
// ============================================
if (!isset($total_transacoes))         $total_transacoes = 156;
if (!isset($total_faturas_pendentes))  $total_faturas_pendentes = 12;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// OBTER ID DA TRANSAÇÃO
// ============================================
$id_transacao = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - TRANSAÇÃO ATUAL
// ============================================
$transacao = [
    'id' => $id_transacao,
    'referencia' => 'TRX-2026-0156',
    'descricao' => 'Pagamento de Projeto - Levantamento Topográfico Zona Norte',
    'tipo' => 'receita',
    'tipo_label' => 'Receita',
    'valor' => 350000,
    'valor_formatado' => '350.000',
    'data' => '2026-02-18 14:20:00',
    'data_vencimento' => '2026-03-15',
    'data_conclusao' => '2026-02-18 14:25:00',
    'categoria' => 'Projetos',
    'categoria_icon' => 'fa-project-diagram',
    'categoria_color' => '#6C2BD9',
    'metodo' => 'Transferência Bancária',
    'metodo_icon' => 'fa-university',
    'status' => 'concluido',
    'status_label' => 'Concluído',
    'prioridade' => 'alta',
    'prioridade_label' => 'Alta',
    'observacoes' => 'Pagamento referente à primeira fase do projeto de levantamento topográfico. Cliente com excelente histórico de pagamentos. Comprovativo validado pelo departamento financeiro.',
    'cliente' => [
        'id' => 1,
        'nome' => 'Construtora ABC',
        'tipo' => 'Empresa',
        'email' => 'contato@construtoraabc.ao',
        'telefone' => '+244 222 345 678',
        'nif' => '5417896321',
        'endereco' => 'Rua Amílcar Cabral, 123 - Luanda, Angola',
        'responsavel' => 'Eng. João Silva'
    ],
    'comprovativo' => [
        'nome' => 'comprovativo-trx-0156.pdf',
        'tipo' => 'pdf',
        'tamanho' => '1.2 MB',
        'data_upload' => '2026-02-18 14:22:00'
    ],
    'anexos' => [
        ['id' => 1, 'nome' => 'contrato-assinado.pdf', 'tipo' => 'pdf', 'tamanho' => '2.4 MB', 'data' => '2026-02-18 14:20:00', 'autor' => 'Sistema'],
        ['id' => 2, 'nome' => 'nota-fiscal.pdf', 'tipo' => 'pdf', 'tamanho' => '856 KB', 'data' => '2026-02-18 14:21:00', 'autor' => 'Sistema'],
        ['id' => 3, 'nome' => 'dados-bancarios.xlsx', 'tipo' => 'xlsx', 'tamanho' => '156 KB', 'data' => '2026-02-18 14:22:00', 'autor' => 'Carlos Mendes']
    ],
    'historico' => [
        ['id' => 1, 'acao' => 'Transação criada', 'usuario' => 'Carlos Mendes', 'data' => '2026-02-18 14:20:00', 'icon' => 'fa-plus-circle', 'color' => '#00D2FF'],
        ['id' => 2, 'acao' => 'Comprovativo anexado', 'usuario' => 'Carlos Mendes', 'data' => '2026-02-18 14:22:00', 'icon' => 'fa-paperclip', 'color' => '#00FFA3'],
        ['id' => 3, 'acao' => 'Status alterado para Concluído', 'usuario' => 'Sistema', 'data' => '2026-02-18 14:25:00', 'icon' => 'fa-check-circle', 'color' => '#00FFA3'],
        ['id' => 4, 'acao' => 'Comprovativo validado', 'usuario' => 'Departamento Financeiro', 'data' => '2026-02-18 15:30:00', 'icon' => 'fa-shield-alt', 'color' => '#FFD93D'],
    ],
    'fatura_vinculada' => [
        'numero' => 'FT-2026-0156',
        'valor' => 350000,
        'data' => '2026-02-18'
    ]
];

// ============================================
// TRANSAÇÕES RELACIONADAS
// ============================================
$transacoes_relacionadas = [
    [
        'id' => 2,
        'referencia' => 'TRX-2026-0140',
        'descricao' => 'Adiantamento - Levantamento Topográfico',
        'valor' => 175000,
        'tipo' => 'receita',
        'data' => '2026-01-30 10:00:00',
        'status' => 'concluido'
    ],
    [
        'id' => 3,
        'referencia' => 'TRX-2026-0157',
        'descricao' => 'Pagamento Final - Levantamento Topográfico',
        'valor' => 175000,
        'tipo' => 'receita',
        'data' => '2026-03-15 10:00:00',
        'status' => 'pendente'
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

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'concluido' => 'status-concluido',
            'pendente' => 'status-pendente',
            'cancelado' => 'status-cancelado',
            'falhou' => 'status-falhou'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getFileIcon')) {
    function getFileIcon($tipo) {
        $icons = [
            'pdf' => ['icon' => 'fa-file-pdf', 'color' => '#FF6B6B'],
            'doc' => ['icon' => 'fa-file-word', 'color' => '#2E86DE'],
            'docx' => ['icon' => 'fa-file-word', 'color' => '#2E86DE'],
            'xls' => ['icon' => 'fa-file-excel', 'color' => '#00B894'],
            'xlsx' => ['icon' => 'fa-file-excel', 'color' => '#00B894'],
            'jpg' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
            'jpeg' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
            'png' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
            'zip' => ['icon' => 'fa-file-archive', 'color' => '#6C5CE7'],
            'rar' => ['icon' => 'fa-file-archive', 'color' => '#6C5CE7']
        ];
        return isset($icons[$tipo]) ? $icons[$tipo] : ['icon' => 'fa-file', 'color' => '#6B7A8F'];
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
                        <div class="transacao-icon-header <?php echo $transacao['tipo']; ?>">
                            <i class="fas fa-arrow-<?php echo $transacao['tipo'] === 'receita' ? 'up' : 'down'; ?>"></i>
                        </div>
                        <?php echo $transacao['descricao']; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="transacoes.php">Transações</a>
                        <span class="separator">/</span>
                        <span><?php echo $transacao['referencia']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <button class="btn btn-outline" onclick="imprimirTransacao()">
                        <i class="fas fa-print"></i> Imprimir
                    </button>
                    <a href="transacao-editar.php?id=<?php echo $transacao['id']; ?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="transacoes.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== RESUMO PRINCIPAL ===== -->
            <section class="resumo-transacao animate-fade-up">
                <div class="resumo-transacao-valor <?php echo $transacao['tipo']; ?>">
                    <div class="resumo-transacao-icon">
                        <i class="fas fa-arrow-<?php echo $transacao['tipo'] === 'receita' ? 'up' : 'down'; ?>"></i>
                    </div>
                    <div class="resumo-transacao-info">
                        <span class="resumo-transacao-label"><?php echo $transacao['tipo_label']; ?></span>
                        <span class="resumo-transacao-value">
                            <?php echo $transacao['tipo'] === 'receita' ? '+' : '-'; ?>
                            Kz <?php echo $transacao['valor_formatado']; ?>
                        </span>
                    </div>
                    <span class="badge-status <?php echo getStatusClass($transacao['status']); ?>">
                        <i class="fas fa-check-circle"></i>
                        <?php echo $transacao['status_label']; ?>
                    </span>
                </div>
            </section>

            <!-- ===== DETALHE GRID ===== -->
            <div class="detalhe-grid">
                <!-- ========================================== -->
                <!-- COLUNA PRINCIPAL                           -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-principal">

                    <!-- Card: Informações da Transação -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.1s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-info-circle"></i> Informações da Transação</h3>
                            <span class="badge-categoria" style="background: <?php echo $transacao['categoria_color']; ?>20; color: <?php echo $transacao['categoria_color']; ?>;">
                                <i class="fas <?php echo $transacao['categoria_icon']; ?>"></i>
                                <?php echo $transacao['categoria']; ?>
                            </span>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="detalhe-info-grid">
                                <div class="info-item">
                                    <span class="info-label">Referência</span>
                                    <span class="info-value" style="font-family: 'Orbitron', sans-serif; font-weight: 600; color: #00D2FF;">
                                        <?php echo $transacao['referencia']; ?>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Data da Transação</span>
                                    <span class="info-value"><?php echo formatDateTime($transacao['data']); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Categoria</span>
                                    <span class="info-value"><?php echo $transacao['categoria']; ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Método</span>
                                    <span class="info-value">
                                        <i class="fas <?php echo $transacao['metodo_icon']; ?>" style="color: #00D2FF; margin-right: 4px;"></i>
                                        <?php echo $transacao['metodo']; ?>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Prioridade</span>
                                    <span class="info-value">
                                        <span class="badge-prioridade <?php echo $transacao['prioridade']; ?>">
                                            <?php echo $transacao['prioridade_label']; ?>
                                        </span>
                                    </span>
                                </div>
                                <?php if ($transacao['data_vencimento']): ?>
                                <div class="info-item">
                                    <span class="info-label">Data de Vencimento</span>
                                    <span class="info-value"><?php echo formatDate($transacao['data_vencimento']); ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if ($transacao['data_conclusao']): ?>
                                <div class="info-item">
                                    <span class="info-label">Concluída em</span>
                                    <span class="info-value" style="color: #00FFA3;"><?php echo formatDateTime($transacao['data_conclusao']); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($transacao['observacoes']): ?>
                            <div class="info-notas">
                                <span class="info-label">Observações</span>
                                <p><?php echo $transacao['observacoes']; ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Card: Anexos -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="detalhe-card-header">
                            <h3>
                                <i class="fas fa-paperclip"></i> Anexos
                                <span class="badge-count"><?php echo count($transacao['anexos']); ?></span>
                            </h3>
                            <button class="btn btn-sm btn-outline" onclick="adicionarAnexo()">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="anexos-list">
                                <?php foreach ($transacao['anexos'] as $anexo): 
                                    $file_icon = getFileIcon($anexo['tipo']);
                                ?>
                                    <div class="anexo-item">
                                        <div class="anexo-icon" style="background: <?php echo $file_icon['color']; ?>20; color: <?php echo $file_icon['color']; ?>;">
                                            <i class="fas <?php echo $file_icon['icon']; ?>"></i>
                                        </div>
                                        <div class="anexo-info">
                                            <span class="anexo-nome"><?php echo $anexo['nome']; ?></span>
                                            <span class="anexo-meta">
                                                <?php echo $anexo['tamanho']; ?> • 
                                                <?php echo $anexo['autor']; ?> • 
                                                <?php echo timeAgo($anexo['data']); ?>
                                            </span>
                                        </div>
                                        <div class="anexo-actions">
                                            <button class="btn-action" onclick="baixarAnexo(<?php echo $anexo['id']; ?>)" title="Baixar">
                                                <i class="fas fa-download"></i>
                                            </button>
                                            <button class="btn-action" onclick="visualizarAnexo(<?php echo $anexo['id']; ?>)" title="Visualizar">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn-action btn-action-danger" onclick="excluirAnexo(<?php echo $anexo['id']; ?>)" title="Excluir">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Histórico -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.3s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-history"></i> Histórico de Atividades</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="historico-list">
                                <?php foreach ($transacao['historico'] as $item): ?>
                                    <div class="historico-item">
                                        <div class="historico-icon" style="background: <?php echo $item['color']; ?>15; color: <?php echo $item['color']; ?>;">
                                            <i class="fas <?php echo $item['icon']; ?>"></i>
                                        </div>
                                        <div class="historico-conteudo">
                                            <span class="historico-acao"><?php echo $item['acao']; ?></span>
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

                    <!-- Card: Transações Relacionadas -->
                    <?php if (!empty($transacoes_relacionadas)): ?>
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-link"></i> Transações Relacionadas</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="transacoes-relacionadas">
                                <?php foreach ($transacoes_relacionadas as $tr): ?>
                                    <div class="transacao-relacionada" onclick="location.href='transacao-detalhe.php?id=<?php echo $tr['id']; ?>'">
                                        <div class="transacao-relacionada-icon <?php echo $tr['tipo']; ?>">
                                            <i class="fas fa-arrow-<?php echo $tr['tipo'] === 'receita' ? 'up' : 'down'; ?>"></i>
                                        </div>
                                        <div class="transacao-relacionada-conteudo">
                                            <span class="transacao-relacionada-referencia"><?php echo $tr['referencia']; ?></span>
                                            <span class="transacao-relacionada-descricao"><?php echo $tr['descricao']; ?></span>
                                            <span class="transacao-relacionada-data">
                                                <i class="far fa-calendar"></i> <?php echo formatDateTime($tr['data']); ?>
                                            </span>
                                        </div>
                                        <div class="transacao-relacionada-valor <?php echo $tr['tipo']; ?>">
                                            <?php echo $tr['tipo'] === 'receita' ? '+' : '-'; ?>
                                            Kz <?php echo formatMoney($tr['valor']); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- ========================================== -->
                <!-- COLUNA LATERAL                             -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-lateral">

                    <!-- Card: Cliente -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-user-tie"></i> Cliente</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="cliente-detalhe">
                                <div class="cliente-avatar-grande">
                                    <i class="fas <?php echo $transacao['cliente']['tipo'] === 'Instituição' ? 'fa-university' : ($transacao['cliente']['tipo'] === 'Empresa' ? 'fa-building' : 'fa-user'); ?>"></i>
                                </div>
                                <h4><?php echo $transacao['cliente']['nome']; ?></h4>
                                <span class="cliente-tipo-badge"><?php echo $transacao['cliente']['tipo']; ?></span>

                                <div class="cliente-info-list">
                                    <div class="cliente-info-item">
                                        <i class="fas fa-envelope"></i>
                                        <span><?php echo $transacao['cliente']['email']; ?></span>
                                    </div>
                                    <div class="cliente-info-item">
                                        <i class="fas fa-phone"></i>
                                        <span><?php echo $transacao['cliente']['telefone']; ?></span>
                                    </div>
                                    <div class="cliente-info-item">
                                        <i class="fas fa-id-card"></i>
                                        <span>NIF: <?php echo $transacao['cliente']['nif']; ?></span>
                                    </div>
                                    <div class="cliente-info-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?php echo $transacao['cliente']['endereco']; ?></span>
                                    </div>
                                    <div class="cliente-info-item">
                                        <i class="fas fa-user-circle"></i>
                                        <span>Responsável: <?php echo $transacao['cliente']['responsavel']; ?></span>
                                    </div>
                                </div>

                                <div class="cliente-acoes">
                                    <button class="btn btn-sm btn-outline" onclick="contactarCliente()">
                                        <i class="fas fa-envelope"></i> Contactar
                                    </button>
                                    <a href="cliente-editar.php?id=<?php echo $transacao['cliente']['id']; ?>" class="btn btn-sm btn-outline">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Comprovativo -->
                    <?php if ($transacao['comprovativo']): 
                        $comp_icon = getFileIcon($transacao['comprovativo']['tipo']);
                    ?>
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.3s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-file-pdf"></i> Comprovativo</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="comprovativo-detalhe">
                                <div class="comprovativo-icon" style="background: <?php echo $comp_icon['color']; ?>20; color: <?php echo $comp_icon['color']; ?>;">
                                    <i class="fas <?php echo $comp_icon['icon']; ?>"></i>
                                </div>
                                <div class="comprovativo-info">
                                    <span class="comprovativo-nome"><?php echo $transacao['comprovativo']['nome']; ?></span>
                                    <span class="comprovativo-meta">
                                        <?php echo $transacao['comprovativo']['tamanho']; ?> • 
                                        <?php echo timeAgo($transacao['comprovativo']['data_upload']); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="comprovativo-acoes">
                                <button class="btn btn-sm btn-outline" style="flex: 1; justify-content: center;" onclick="visualizarComprovativo()">
                                    <i class="fas fa-eye"></i> Visualizar
                                </button>
                                <button class="btn btn-sm btn-primary" style="flex: 1; justify-content: center;" onclick="baixarComprovativo()">
                                    <i class="fas fa-download"></i> Baixar
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Card: Fatura Vinculada -->
                    <?php if ($transacao['fatura_vinculada']): ?>
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-file-invoice"></i> Fatura Vinculada</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="fatura-vinculada">
                                <div class="fatura-vinculada-header">
                                    <span class="fatura-vinculada-numero"><?php echo $transacao['fatura_vinculada']['numero']; ?></span>
                                    <span class="fatura-vinculada-data"><?php echo formatDate($transacao['fatura_vinculada']['data']); ?></span>
                                </div>
                                <div class="fatura-vinculada-valor">
                                    Kz <?php echo formatMoney($transacao['fatura_vinculada']['valor']); ?>
                                </div>
                                <a href="fatura-detalhe.php?numero=<?php echo $transacao['fatura_vinculada']['numero']; ?>" 
                                   class="btn btn-sm btn-outline" style="width: 100%; justify-content: center; margin-top: var(--space-sm);">
                                    <i class="fas fa-eye"></i> Ver Fatura
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Card: Ações -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-bolt"></i> Ações</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="acoes-list">
                                <a href="transacao-editar.php?id=<?php echo $transacao['id']; ?>" class="acao-item">
                                    <div class="acao-icon" style="background: rgba(0, 210, 255, 0.1); color: #00D2FF;">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <span>Editar Transação</span>
                                </a>
                                <button class="acao-item" onclick="duplicarTransacao()">
                                    <div class="acao-icon" style="background: rgba(0, 255, 163, 0.1); color: #00FFA3;">
                                        <i class="fas fa-copy"></i>
                                    </div>
                                    <span>Duplicar</span>
                                </button>
                                <button class="acao-item" onclick="gerarRecibo()">
                                    <div class="acao-icon" style="background: rgba(255, 217, 61, 0.1); color: #FFD93D;">
                                        <i class="fas fa-receipt"></i>
                                    </div>
                                    <span>Gerar Recibo</span>
                                </button>
                                <a href="transacao-excluir.php?id=<?php echo $transacao['id']; ?>" 
                                   class="acao-item acao-item-danger"
                                   onclick="return confirmarExclusao(event, '<?php echo addslashes($transacao['referencia']); ?>', <?php echo $transacao['id']; ?>)">
                                    <div class="acao-icon" style="background: rgba(255, 107, 107, 0.1); color: #FF6B6B;">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                    <span>Excluir Transação</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO DE EXCLUSÃO           -->
    <!-- ========================================== -->
    <div class="modal" id="modalExcluir">
        <div class="modal-overlay" onclick="fecharModalExcluir()"></div>
        <div class="modal-content modal-content-danger">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Exclusão
                </h3>
                <button class="modal-close" onclick="fecharModalExcluir()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-trash"></i>
                    <div>
                        <strong>Esta ação é irreversível!</strong>
                        <span>A transação será permanentemente excluída do sistema.</span>
                    </div>
                </div>
                <p class="modal-texto">Tem certeza que deseja excluir a transação</p>
                <p class="modal-projeto-nome" id="modalTransacaoRef">-</p>
                <p class="modal-texto-small">Ao excluir, os seguintes dados serão removidos:</p>
                <ul class="modal-lista-danger">
                    <li><i class="fas fa-times-circle"></i> Todos os dados da transação</li>
                    <li><i class="fas fa-times-circle"></i> Anexos e comprovativos</li>
                    <li><i class="fas fa-times-circle"></i> Histórico completo</li>
                    <li><i class="fas fa-times-circle"></i> Vínculos com fatura</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalExcluir()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <a href="#" class="btn btn-danger" id="modalBtnExcluir">
                    <i class="fas fa-trash"></i> Excluir Permanentemente
                </a>
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
        // IMPRIMIR
        // ============================================
        function imprimirTransacao() {
            mostrarToast('A preparar impressão...', 'info');
            setTimeout(() => window.print(), 500);
        }

        // ============================================
        // ANEXOS
        // ============================================
        function adicionarAnexo() {
            mostrarToast('Modal de upload em desenvolvimento', 'info');
        }

        function baixarAnexo(id) {
            mostrarToast('A baixar anexo #' + id + '...', 'info');
        }

        function visualizarAnexo(id) {
            mostrarToast('A abrir anexo #' + id + '...', 'info');
        }

        function excluirAnexo(id) {
            if (confirm('Tem certeza que deseja excluir este anexo?')) {
                mostrarToast('Anexo excluído!', 'error');
            }
        }

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
        // CLIENTE
        // ============================================
        function contactarCliente() {
            mostrarToast('A abrir email para o cliente...', 'info');
        }

        // ============================================
        // AÇÕES DA TRANSAÇÃO
        // ============================================
        function duplicarTransacao() {
            if (confirm('Deseja duplicar esta transação?')) {
                mostrarToast('Transação duplicada! Redirecionando...', 'success');
                setTimeout(() => window.location.href = 'transacao-criar.php', 1500);
            }
        }

        function gerarRecibo() {
            mostrarToast('A gerar recibo PDF...', 'info');
            setTimeout(() => mostrarToast('Recibo gerado com sucesso!', 'success'), 1500);
        }

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, referencia, id) {
            event.preventDefault();
            
            const modal = document.getElementById('modalExcluir');
            const btnExcluir = document.getElementById('modalBtnExcluir');
            
            document.getElementById('modalTransacaoRef').textContent = '"' + referencia + '"';
            btnExcluir.href = 'transacao-excluir.php?id=' + id;
            
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            return false;
        }

        function fecharModalExcluir() {
            const modal = document.getElementById('modalExcluir');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModalExcluir();
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
            gap: 8px;
        }

        .header-left h1 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-md);
            flex-wrap: wrap;
            line-height: 1.3;
        }

        .transacao-icon-header {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .transacao-icon-header.receita {
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.2) 0%, rgba(0, 210, 255, 0.1) 100%);
            color: #00FFA3;
        }

        .transacao-icon-header.despesa {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(255, 159, 67, 0.1) 100%);
            color: #FF6B6B;
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
        /* RESUMO TRANSAÇÃO                           */
        /* ========================================== */
        .resumo-transacao {
            margin-bottom: var(--space-lg);
        }

        .resumo-transacao-valor {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            padding: var(--space-lg) var(--space-xl);
            border-radius: var(--radius-lg);
            position: relative;
            overflow: hidden;
            flex-wrap: wrap;
        }

        .resumo-transacao-valor.receita {
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.1) 0%, rgba(0, 210, 255, 0.05) 100%);
            border: 2px solid rgba(0, 255, 163, 0.25);
        }

        .resumo-transacao-valor.despesa {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(255, 159, 67, 0.05) 100%);
            border: 2px solid rgba(255, 107, 107, 0.25);
        }

        .resumo-transacao-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        .resumo-transacao-valor.receita .resumo-transacao-icon {
            background: rgba(0, 255, 163, 0.2);
            color: #00FFA3;
        }

        .resumo-transacao-valor.despesa .resumo-transacao-icon {
            background: rgba(255, 107, 107, 0.2);
            color: #FF6B6B;
        }

        .resumo-transacao-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 0;
        }

        .resumo-transacao-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .resumo-transacao-value {
            font-family: var(--font-display);
            font-size: var(--text-h1);
            font-weight: 700;
            line-height: 1;
        }

        .resumo-transacao-valor.receita .resumo-transacao-value { color: #00FFA3; }
        .resumo-transacao-valor.despesa .resumo-transacao-value { color: #FF6B6B; }

        /* ========================================== */
        /* BADGES                                     */
        /* ========================================== */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 16px;
            border-radius: var(--radius-full);
            font-size: var(--text-sm);
            font-weight: 600;
        }

        .badge-status.status-concluido { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .badge-status.status-cancelado { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }
        .badge-status.status-falhou { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }

        .badge-prioridade {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
        }

        .badge-prioridade.baixa { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-prioridade.media { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-prioridade.alta { background: rgba(255, 159, 67, 0.12); color: #FF9F43; }
        .badge-prioridade.urgente { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        .badge-categoria {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
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
        .detalhe-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
            overflow: hidden;
        }

        .detalhe-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .detalhe-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .detalhe-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .detalhe-card-header h3 i { color: #00D2FF; }

        .detalhe-card-body {
            padding: var(--space-lg);
        }

        /* ========================================== */
        /* INFO GRID                                  */
        /* ========================================== */
        .detalhe-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-md);
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        .info-notas {
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .info-notas p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: var(--space-sm) 0 0 0;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        /* ========================================== */
        /* ANEXOS                                     */
        /* ========================================== */
        .anexos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .anexo-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .anexo-item:hover {
            border-color: #00D2FF;
        }

        .anexo-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .anexo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .anexo-nome {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .anexo-meta {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .anexo-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
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

        .btn-action-danger { color: #FF6B6B; border-color: rgba(255, 107, 107, 0.3); }
        .btn-action-danger:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
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
            font-weight: 500;
            color: var(--text-primary);
        }

        .historico-meta {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .historico-meta span {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* ========================================== */
        /* TRANSAÇÕES RELACIONADAS                    */
        /* ========================================== */
        .transacoes-relacionadas {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .transacao-relacionada {
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

        .transacao-relacionada:hover {
            border-color: #00D2FF;
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

        .transacao-relacionada-icon.despesa {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
        }

        .transacao-relacionada-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .transacao-relacionada-referencia {
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 700;
            color: #00D2FF;
        }

        .transacao-relacionada-descricao {
            font-size: var(--text-sm);
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .transacao-relacionada-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .transacao-relacionada-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            white-space: nowrap;
        }

        .transacao-relacionada-valor.receita { color: #00FFA3; }
        .transacao-relacionada-valor.despesa { color: #FF6B6B; }

        /* ========================================== */
        /* CLIENTE DETALHE                            */
        /* ========================================== */
        .cliente-detalhe {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: var(--space-md);
        }

        .cliente-avatar-grande {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 8px 24px rgba(0, 210, 255, 0.3);
        }

        .cliente-detalhe h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .cliente-tipo-badge {
            display: inline-flex;
            padding: 4px 12px;
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
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
            text-align: left;
        }

        .cliente-acoes {
            display: flex;
            gap: var(--space-sm);
            width: 100%;
            flex-wrap: wrap;
        }

        .cliente-acoes .btn { flex: 1; justify-content: center; min-width: 100px; }

        /* ========================================== */
        /* COMPROVATIVO                               */
        /* ========================================== */
        .comprovativo-detalhe {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
        }

        .comprovativo-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .comprovativo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
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
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-acoes {
            display: flex;
            gap: var(--space-sm);
        }

        /* ========================================== */
        /* FATURA VINCULADA                           */
        /* ========================================== */
        .fatura-vinculada {
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .fatura-vinculada-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-sm);
        }

        .fatura-vinculada-numero {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #FFD93D;
        }

        .fatura-vinculada-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .fatura-vinculada-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* AÇÕES                                      */
        /* ========================================== */
        .acoes-list {
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

        .acao-item-danger { color: #FF6B6B; }
        .acao-item-danger:hover {
            background: rgba(255, 107, 107, 0.08);
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        /* ========================================== */
        /* MODAL DE EXCLUSÃO                          */
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
            max-width: 500px;
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
            margin-bottom: var(--space-lg);
        }

        .modal-alerta-danger i { font-size: 24px; color: #FF6B6B; flex-shrink: 0; }
        .modal-alerta-danger div { display: flex; flex-direction: column; gap: 4px; }
        .modal-alerta-danger strong { font-size: var(--text-sm); color: #FF6B6B; }
        .modal-alerta-danger span { font-size: var(--text-xs); color: var(--text-secondary); }

        .modal-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            text-align: center;
        }

        .modal-projeto-nome {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FF6B6B;
            text-align: center;
            margin: 0 0 var(--space-lg) 0;
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border-radius: var(--radius-md);
            border: 2px dashed rgba(255, 107, 107, 0.4);
        }

        .modal-texto-small {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin: var(--space-md) 0 var(--space-sm) 0;
        }

        .modal-lista-danger {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .modal-lista-danger li {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            padding: 6px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-sm);
        }

        .modal-lista-danger li i { color: #FF6B6B; font-size: 12px; }

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
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .detalhe-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .detalhe-info-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .resumo-transacao-valor {
                flex-direction: column;
                text-align: center;
            }

            .resumo-transacao-value {
                font-size: var(--text-h2);
            }

            .header-left h1 {
                font-size: var(--text-h4);
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header { padding: var(--space-md); }

            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .anexo-item { flex-wrap: wrap; }
            .anexo-actions { width: 100%; justify-content: flex-end; }
            .cliente-acoes { flex-direction: column; }
            .cliente-acoes .btn { width: 100%; }
            .comprovativo-acoes { flex-direction: column; }
            .comprovativo-acoes .btn { width: 100%; }
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