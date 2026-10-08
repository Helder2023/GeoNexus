<?php
// painel/individual/financeiro/fatura-detalhe.php - Detalhe da Fatura
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Detalhe da Fatura';
$pagina_atual = 'fatura-detalhe';

// ============================================
// GARANTIR VARIÁVEIS (FALLBACK)
// ============================================
if (!isset($total_transacoes))         $total_transacoes = 156;
if (!isset($total_faturas_pendentes))  $total_faturas_pendentes = 12;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// OBTER NÚMERO DA FATURA (via URL)
// ============================================
$numero_fatura = isset($_GET['numero']) ? $_GET['numero'] : 'FT-2026-0156';

// ============================================
// DADOS MOCKADOS - FATURA ATUAL
// ============================================
$fatura = [
    'id' => 1,
    'numero' => $numero_fatura,
    'data_emissao' => '2026-02-18',
    'data_vencimento' => '2026-03-15',
    'data_pagamento' => '2026-02-18 14:25:00',
    'status' => 'paga',
    'status_label' => 'Paga',
    'tipo' => 'receita',
    'tipo_label' => 'Receita',
    'referencia_externa' => 'FAT-2026-ABC-0156',
    
    // Cliente
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
    
    // Empresa (emitente)
    'empresa' => [
        'nome' => 'Carlos Mendes - Engenharia',
        'nif' => '5417896999',
        'endereco' => 'Av. 4 de Fevereiro, 100 - Luanda, Angola',
        'email' => 'carlos.mendes@email.com',
        'telefone' => '+244 923 456 789',
        'banco' => 'BAI - Banco Angolano de Investimentos',
        'iban' => 'AO06 0040 0000 1234 5678 9012 3'
    ],
    
    // Itens da fatura
    'itens' => [
        [
            'id' => 1,
            'descricao' => 'Levantamento Topográfico Completo - Zona Norte',
            'detalhes' => 'Levantamento de 50 hectares com curvas de nível a cada metro, pontos georreferenciados em WGS84 e geração de plantas em escala 1:1000.',
            'quantidade' => 1,
            'unidade' => 'Projeto',
            'preco_unitario' => 300000,
            'subtotal' => 300000
        ],
        [
            'id' => 2,
            'descricao' => 'Relatório Técnico Detalhado',
            'detalhes' => 'Elaboração de relatório técnico com análise de dados, mapas temáticos e recomendações.',
            'quantidade' => 1,
            'unidade' => 'Relatório',
            'preco_unitario' => 50000,
            'subtotal' => 50000
        ]
    ],
    
    // Totais
    'subtotal' => 350000,
    'desconto' => 0,
    'iva_percentual' => 14,
    'iva_valor' => 49000,
    'total' => 399000,
    
    // Notas
    'observacoes' => 'Pagamento referente à primeira fase do projeto de levantamento topográfico. Prazo de pagamento: 30 dias após emissão.',
    'termos' => 'O pagamento deve ser efetuado até a data de vencimento. Após esse prazo, serão aplicados juros de mora de 1% ao mês.',
    
    // Transações vinculadas
    'transacao' => [
        'id' => 1,
        'referencia' => 'TRX-2026-0156',
        'data' => '2026-02-18 14:20:00',
        'metodo' => 'Transferência Bancária',
        'comprovativo' => true
    ],
    
    // Histórico
    'historico' => [
        ['id' => 1, 'acao' => 'Fatura criada', 'usuario' => 'Carlos Mendes', 'data' => '2026-02-18 09:00:00', 'icon' => 'fa-plus-circle', 'color' => '#00D2FF'],
        ['id' => 2, 'acao' => 'Fatura enviada ao cliente', 'usuario' => 'Sistema', 'data' => '2026-02-18 09:15:00', 'icon' => 'fa-paper-plane', 'color' => '#6C2BD9'],
        ['id' => 3, 'acao' => 'Pagamento registado', 'usuario' => 'Sistema', 'data' => '2026-02-18 14:25:00', 'icon' => 'fa-money-bill-wave', 'color' => '#00FFA3'],
        ['id' => 4, 'acao' => 'Fatura marcada como paga', 'usuario' => 'Sistema', 'data' => '2026-02-18 14:30:00', 'icon' => 'fa-check-circle', 'color' => '#00FFA3'],
    ]
];

// ============================================
// FATURAS RELACIONADAS
// ============================================
$faturas_relacionadas = [
    [
        'id' => 2,
        'numero' => 'FT-2026-0140',
        'data' => '2026-01-30',
        'valor' => 175000,
        'status' => 'paga',
        'status_label' => 'Paga'
    ],
    [
        'id' => 3,
        'numero' => 'FT-2026-0160',
        'data' => '2026-03-15',
        'valor' => 175000,
        'status' => 'pendente',
        'status_label' => 'Pendente'
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
            'paga' => 'status-paga',
            'pendente' => 'status-pendente',
            'vencida' => 'status-vencida',
            'cancelada' => 'status-cancelada',
            'rascunho' => 'status-rascunho'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getStatusIcon')) {
    function getStatusIcon($status) {
        $icons = [
            'paga' => 'fa-check-circle',
            'pendente' => 'fa-clock',
            'vencida' => 'fa-exclamation-triangle',
            'cancelada' => 'fa-times-circle',
            'rascunho' => 'fa-file'
        ];
        return isset($icons[$status]) ? $icons[$status] : 'fa-clock';
    }
}

if (!function_exists('numeroPorExtenso')) {
    function numeroPorExtenso($numero) {
        // Simplificado - para demonstração
        return 'trezentos e noventa e nove mil kwanzas';
    }
}

// Dias para vencimento
$hoje = new DateTime();
$vencimento = new DateTime($fatura['data_vencimento']);
$dias_restantes = $hoje->diff($vencimento)->days;
$vencida = $vencimento < $hoje && $fatura['status'] !== 'paga';
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
                        <i class="fas fa-file-invoice icon" style="color: #00D2FF;"></i>
                        Fatura <?php echo $fatura['numero']; ?>
                        <span class="badge-status <?php echo getStatusClass($fatura['status']); ?>">
                            <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                            <?php echo $fatura['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="faturas.php">Faturas</a>
                        <span class="separator">/</span>
                        <span><?php echo $fatura['numero']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <button class="btn btn-outline" onclick="imprimirFatura()">
                        <i class="fas fa-print"></i> Imprimir
                    </button>
                    <button class="btn btn-outline" onclick="baixarPDF()">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                    <a href="fatura-editar.php?numero=<?php echo $fatura['numero']; ?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="faturas.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== RESUMO DA FATURA ===== -->
            <section class="resumo-fatura animate-fade-up">
                <div class="resumo-fatura-valor">
                    <div class="resumo-fatura-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="resumo-fatura-info">
                        <span class="resumo-fatura-label">Valor Total da Fatura</span>
                        <span class="resumo-fatura-value">
                            Kz <?php echo formatMoney($fatura['total']); ?>
                        </span>
                    </div>
                    <div class="resumo-fatura-meta">
                        <div class="meta-item">
                            <span class="meta-label">Emissão</span>
                            <span class="meta-value"><?php echo formatDate($fatura['data_emissao']); ?></span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Vencimento</span>
                            <span class="meta-value <?php echo $vencida ? 'text-danger' : ''; ?>">
                                <?php echo formatDate($fatura['data_vencimento']); ?>
                            </span>
                        </div>
                        <?php if ($fatura['status'] === 'paga'): ?>
                        <div class="meta-item">
                            <span class="meta-label">Pagamento</span>
                            <span class="meta-value" style="color: #00FFA3;">
                                <?php echo formatDate($fatura['data_pagamento']); ?>
                            </span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <!-- ===== DETALHE GRID ===== -->
            <div class="detalhe-grid">
                <!-- ========================================== -->
                <!-- COLUNA PRINCIPAL                           -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-principal">

                    <!-- ===== CABEÇALHO DA FATURA (Emitente + Cliente) ===== -->
                    <div class="fatura-header animate-fade-up" style="animation-delay: 0.1s;">
                        <div class="fatura-header-row">
                            <!-- Emitente -->
                            <div class="fatura-emitente">
                                <div class="emitente-avatar">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="emitente-info">
                                    <span class="emitente-label">EMITENTE</span>
                                    <h3><?php echo $fatura['empresa']['nome']; ?></h3>
                                    <p><i class="fas fa-id-card"></i> NIF: <?php echo $fatura['empresa']['nif']; ?></p>
                                    <p><i class="fas fa-map-marker-alt"></i> <?php echo $fatura['empresa']['endereco']; ?></p>
                                    <p><i class="fas fa-envelope"></i> <?php echo $fatura['empresa']['email']; ?></p>
                                    <p><i class="fas fa-phone"></i> <?php echo $fatura['empresa']['telefone']; ?></p>
                                </div>
                            </div>

                            <!-- Cliente -->
                            <div class="fatura-cliente">
                                <div class="cliente-avatar">
                                    <i class="fas <?php echo $fatura['cliente']['tipo'] === 'Instituição' ? 'fa-university' : ($fatura['cliente']['tipo'] === 'Empresa' ? 'fa-building' : 'fa-user'); ?>"></i>
                                </div>
                                <div class="cliente-info">
                                    <span class="cliente-label">CLIENTE</span>
                                    <h3><?php echo $fatura['cliente']['nome']; ?></h3>
                                    <p><i class="fas fa-id-card"></i> NIF: <?php echo $fatura['cliente']['nif']; ?></p>
                                    <p><i class="fas fa-map-marker-alt"></i> <?php echo $fatura['cliente']['endereco']; ?></p>
                                    <p><i class="fas fa-envelope"></i> <?php echo $fatura['cliente']['email']; ?></p>
                                    <p><i class="fas fa-phone"></i> <?php echo $fatura['cliente']['telefone']; ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Meta da Fatura -->
                        <div class="fatura-meta-header">
                            <div class="fatura-meta-item">
                                <span class="fatura-meta-label">Número da Fatura</span>
                                <span class="fatura-meta-value" style="font-family: 'Orbitron', sans-serif; color: #00D2FF; font-weight: 700;">
                                    <?php echo $fatura['numero']; ?>
                                </span>
                            </div>
                            <div class="fatura-meta-item">
                                <span class="fatura-meta-label">Data de Emissão</span>
                                <span class="fatura-meta-value"><?php echo formatDate($fatura['data_emissao']); ?></span>
                            </div>
                            <div class="fatura-meta-item">
                                <span class="fatura-meta-label">Data de Vencimento</span>
                                <span class="fatura-meta-value <?php echo $vencida ? 'text-danger' : ''; ?>">
                                    <?php echo formatDate($fatura['data_vencimento']); ?>
                                </span>
                            </div>
                            <div class="fatura-meta-item">
                                <span class="fatura-meta-label">Referência</span>
                                <span class="fatura-meta-value"><?php echo $fatura['referencia_externa']; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ITENS DA FATURA ===== -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="detalhe-card-header">
                            <h3>
                                <i class="fas fa-list-ul"></i> Itens da Fatura
                                <span class="badge-count"><?php echo count($fatura['itens']); ?></span>
                            </h3>
                        </div>
                        <div class="detalhe-card-body" style="padding: 0;">
                            <div class="itens-table-responsive">
                                <table class="itens-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;">#</th>
                                            <th>Descrição</th>
                                            <th style="width: 80px; text-align: center;">Qtd</th>
                                            <th style="width: 100px; text-align: center;">Unidade</th>
                                            <th style="width: 120px; text-align: right;">Preço Unit.</th>
                                            <th style="width: 120px; text-align: right;">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($fatura['itens'] as $index => $item): ?>
                                            <tr>
                                                <td style="text-align: center; color: var(--text-muted); font-weight: 600;">
                                                    <?php echo $index + 1; ?>
                                                </td>
                                                <td>
                                                    <div class="item-descricao">
                                                        <strong><?php echo $item['descricao']; ?></strong>
                                                        <?php if ($item['detalhes']): ?>
                                                            <small><?php echo $item['detalhes']; ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td style="text-align: center;"><?php echo $item['quantidade']; ?></td>
                                                <td style="text-align: center;"><?php echo $item['unidade']; ?></td>
                                                <td style="text-align: right;">Kz <?php echo formatMoney($item['preco_unitario']); ?></td>
                                                <td style="text-align: right; font-weight: 600;">Kz <?php echo formatMoney($item['subtotal']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" style="text-align: right; padding: 12px 16px; border-top: 2px solid var(--border-color); color: var(--text-muted);">
                                                Subtotal:
                                            </td>
                                            <td style="text-align: right; padding: 12px 16px; border-top: 2px solid var(--border-color); font-weight: 600;">
                                                Kz <?php echo formatMoney($fatura['subtotal']); ?>
                                            </td>
                                        </tr>
                                        <?php if ($fatura['desconto'] > 0): ?>
                                        <tr>
                                            <td colspan="5" style="text-align: right; padding: 8px 16px; color: var(--text-muted);">
                                                Desconto:
                                            </td>
                                            <td style="text-align: right; padding: 8px 16px; color: #FF6B6B; font-weight: 600;">
                                                - Kz <?php echo formatMoney($fatura['desconto']); ?>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td colspan="5" style="text-align: right; padding: 8px 16px; color: var(--text-muted);">
                                                IVA (<?php echo $fatura['iva_percentual']; ?>%):
                                            </td>
                                            <td style="text-align: right; padding: 8px 16px; font-weight: 600;">
                                                Kz <?php echo formatMoney($fatura['iva_valor']); ?>
                                            </td>
                                        </tr>
                                        <tr class="total-row">
                                            <td colspan="5" style="text-align: right; padding: 16px; font-size: var(--text-h4); font-weight: 700; color: var(--text-primary);">
                                                TOTAL:
                                            </td>
                                            <td style="text-align: right; padding: 16px; font-family: 'Orbitron', sans-serif; font-size: var(--text-h2); font-weight: 700; color: #00D2FF;">
                                                Kz <?php echo formatMoney($fatura['total']); ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Valor por extenso -->
                            <div class="valor-extenso">
                                <i class="fas fa-info-circle"></i>
                                <span>Valor por extenso: <strong><?php echo ucfirst(numeroPorExtenso($fatura['total'])); ?></strong></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== OBSERVAÇÕES E TERMOS ===== -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.3s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-sticky-note"></i> Observações e Termos</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="observacoes-item">
                                <span class="info-label">Observações</span>
                                <p><?php echo $fatura['observacoes']; ?></p>
                            </div>
                            <div class="observacoes-item" style="margin-top: var(--space-md);">
                                <span class="info-label">Termos e Condições</span>
                                <p><?php echo $fatura['termos']; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- ===== HISTÓRICO ===== -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-history"></i> Histórico da Fatura</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="historico-list">
                                <?php foreach ($fatura['historico'] as $item): ?>
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

                </div>

                <!-- ========================================== -->
                <!-- COLUNA LATERAL                             -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-lateral">

                    <!-- ===== ESTADO DA FATURA ===== -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-info-circle"></i> Estado da Fatura</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="estado-fatura">
                                <div class="estado-icon <?php echo getStatusClass($fatura['status']); ?>">
                                    <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                                </div>
                                <div class="estado-info">
                                    <span class="estado-label">Status</span>
                                    <span class="estado-value"><?php echo $fatura['status_label']; ?></span>
                                </div>
                            </div>

                            <?php if ($fatura['status'] === 'paga'): ?>
                                <div class="estado-detalhe">
                                    <i class="fas fa-calendar-check" style="color: #00FFA3;"></i>
                                    <span>Paga em <strong><?php echo formatDateTime($fatura['data_pagamento']); ?></strong></span>
                                </div>
                            <?php elseif ($fatura['status'] === 'pendente'): ?>
                                <div class="estado-detalhe">
                                    <i class="fas fa-clock" style="color: #FFD93D;"></i>
                                    <span>
                                        <?php if ($dias_restantes > 0): ?>
                                            Vence em <strong><?php echo $dias_restantes; ?> dias</strong>
                                        <?php elseif ($dias_restantes == 0): ?>
                                            <strong>Vence hoje</strong>
                                        <?php else: ?>
                                            <strong style="color: #FF6B6B;">Vencida há <?php echo abs($dias_restantes); ?> dias</strong>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- ===== RESUMO DE VALORES ===== -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.25s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-calculator"></i> Resumo de Valores</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="resumo-valores">
                                <div class="resumo-valor-item">
                                    <span class="resumo-valor-label">Subtotal</span>
                                    <span class="resumo-valor-value">Kz <?php echo formatMoney($fatura['subtotal']); ?></span>
                                </div>
                                <?php if ($fatura['desconto'] > 0): ?>
                                <div class="resumo-valor-item">
                                    <span class="resumo-valor-label">Desconto</span>
                                    <span class="resumo-valor-value" style="color: #FF6B6B;">- Kz <?php echo formatMoney($fatura['desconto']); ?></span>
                                </div>
                                <?php endif; ?>
                                <div class="resumo-valor-item">
                                    <span class="resumo-valor-label">IVA (<?php echo $fatura['iva_percentual']; ?>%)</span>
                                    <span class="resumo-valor-value">Kz <?php echo formatMoney($fatura['iva_valor']); ?></span>
                                </div>
                                <div class="resumo-valor-item resumo-valor-total">
                                    <span class="resumo-valor-label">Total</span>
                                    <span class="resumo-valor-value">Kz <?php echo formatMoney($fatura['total']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== TRANSAÇÃO VINCULADA ===== -->
                    <?php if ($fatura['transacao']): ?>
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.3s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-exchange-alt"></i> Transação Vinculada</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <a href="transacao-detalhe.php?id=<?php echo $fatura['transacao']['id']; ?>" class="transacao-vinculada">
                                <div class="transacao-vinculada-header">
                                    <span class="transacao-vinculada-ref"><?php echo $fatura['transacao']['referencia']; ?></span>
                                    <?php if ($fatura['transacao']['comprovativo']): ?>
                                        <span class="comprovativo-badge"><i class="fas fa-paperclip"></i> Comprovativo</span>
                                    <?php endif; ?>
                                </div>
                                <div class="transacao-vinculada-meta">
                                    <span><i class="far fa-calendar"></i> <?php echo formatDateTime($fatura['transacao']['data']); ?></span>
                                    <span><i class="fas fa-credit-card"></i> <?php echo $fatura['transacao']['metodo']; ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- ===== DADOS BANCÁRIOS ===== -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-university"></i> Dados Bancários</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="dados-bancarios">
                                <div class="dados-bancarios-item">
                                    <span class="dados-bancarios-label">Banco</span>
                                    <span class="dados-bancarios-value"><?php echo $fatura['empresa']['banco']; ?></span>
                                </div>
                                <div class="dados-bancarios-item">
                                    <span class="dados-bancarios-label">IBAN</span>
                                    <span class="dados-bancarios-value" style="font-family: 'Orbitron', sans-serif; font-size: var(--text-xs);">
                                        <?php echo $fatura['empresa']['iban']; ?>
                                    </span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline" style="width: 100%; justify-content: center; margin-top: var(--space-sm);" onclick="copiarIBAN()">
                                <i class="fas fa-copy"></i> Copiar IBAN
                            </button>
                        </div>
                    </div>

                    <!-- ===== FATURAS RELACIONADAS ===== -->
                    <?php if (!empty($faturas_relacionadas)): ?>
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-link"></i> Faturas Relacionadas</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="faturas-relacionadas-list">
                                <?php foreach ($faturas_relacionadas as $fr): ?>
                                    <a href="fatura-detalhe.php?numero=<?php echo $fr['numero']; ?>" class="fatura-relacionada">
                                        <div class="fatura-relacionada-icon">
                                            <i class="fas fa-file-invoice"></i>
                                        </div>
                                        <div class="fatura-relacionada-conteudo">
                                            <span class="fatura-relacionada-numero"><?php echo $fr['numero']; ?></span>
                                            <span class="fatura-relacionada-data">
                                                <i class="far fa-calendar"></i> <?php echo formatDate($fr['data']); ?>
                                            </span>
                                        </div>
                                        <div class="fatura-relacionada-valor">
                                            <span class="fatura-relacionada-total">Kz <?php echo formatMoney($fr['valor']); ?></span>
                                            <span class="badge-status <?php echo $fr['status'] === 'paga' ? 'status-paga' : 'status-pendente'; ?>" style="font-size: 9px;">
                                                <?php echo $fr['status_label']; ?>
                                            </span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- ===== AÇÕES ===== -->
                    <div class="detalhe-card animate-fade-up" style="animation-delay: 0.45s;">
                        <div class="detalhe-card-header">
                            <h3><i class="fas fa-bolt"></i> Ações</h3>
                        </div>
                        <div class="detalhe-card-body">
                            <div class="acoes-list">
                                <a href="fatura-editar.php?numero=<?php echo $fatura['numero']; ?>" class="acao-item">
                                    <div class="acao-icon" style="background: rgba(0, 210, 255, 0.1); color: #00D2FF;">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <span>Editar Fatura</span>
                                </a>
                                <button class="acao-item" onclick="enviarPorEmail()">
                                    <div class="acao-icon" style="background: rgba(108, 43, 217, 0.1); color: #6C2BD9;">
                                        <i class="fas fa-paper-plane"></i>
                                    </div>
                                    <span>Enviar por Email</span>
                                </button>
                                <button class="acao-item" onclick="baixarPDF()">
                                    <div class="acao-icon" style="background: rgba(255, 107, 107, 0.1); color: #FF6B6B;">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <span>Baixar PDF</span>
                                </button>
                                <button class="acao-item" onclick="duplicarFatura()">
                                    <div class="acao-icon" style="background: rgba(0, 255, 163, 0.1); color: #00FFA3;">
                                        <i class="fas fa-copy"></i>
                                    </div>
                                    <span>Duplicar</span>
                                </button>
                                <?php if ($fatura['status'] !== 'paga'): ?>
                                <a href="fatura-cancelar.php?numero=<?php echo $fatura['numero']; ?>" 
                                   class="acao-item acao-item-danger"
                                   onclick="return confirmarCancelamento(event, '<?php echo $fatura['numero']; ?>')">
                                    <div class="acao-icon" style="background: rgba(255, 107, 107, 0.1); color: #FF6B6B;">
                                        <i class="fas fa-ban"></i>
                                    </div>
                                    <span>Cancelar Fatura</span>
                                </a>
                                <?php endif; ?>
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
        <div class="modal-overlay" onclick="fecharModalConfirmacao()"></div>
        <div class="modal-content modal-content-danger">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Cancelamento
                </h3>
                <button class="modal-close" onclick="fecharModalConfirmacao()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-ban"></i>
                    <div>
                        <strong>Esta ação é irreversível!</strong>
                        <span>A fatura será marcada como cancelada e não poderá ser paga.</span>
                    </div>
                </div>
                <p class="modal-texto">Tem certeza que deseja cancelar a fatura</p>
                <p class="modal-projeto-nome" id="modalFaturaNumero">-</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalConfirmacao()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <a href="#" class="btn btn-danger" id="modalBtnConfirmar">
                    <i class="fas fa-ban"></i> Cancelar Fatura
                </a>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // DADOS DA FATURA
        // ============================================
        const faturaData = {
            numero: <?php echo json_encode($fatura['numero']); ?>,
            clienteNome: <?php echo json_encode($fatura['cliente']['nome']); ?>,
            clienteEmail: <?php echo json_encode($fatura['cliente']['email']); ?>,
            total: <?php echo $fatura['total']; ?>,
            iban: <?php echo json_encode($fatura['empresa']['iban']); ?>
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
        function imprimirFatura() {
            mostrarToast('A preparar impressão...', 'info');
            setTimeout(() => window.print(), 500);
        }

        // ============================================
        // BAIXAR PDF
        // ============================================
        function baixarPDF() {
            mostrarToast('A gerar PDF da fatura ' + faturaData.numero + '...', 'info');
            setTimeout(() => {
                mostrarToast('PDF gerado com sucesso!', 'success');
            }, 1500);
        }

        // ============================================
        // ENVIAR POR EMAIL
        // ============================================
        function enviarPorEmail() {
            mostrarToast('A enviar fatura para ' + faturaData.clienteEmail + '...', 'info');
            setTimeout(() => {
                mostrarToast('Fatura enviada com sucesso!', 'success');
            }, 1500);
        }

        // ============================================
        // DUPLICAR FATURA
        // ============================================
        function duplicarFatura() {
            if (confirm('Deseja duplicar esta fatura?')) {
                mostrarToast('Fatura duplicada! Redirecionando...', 'success');
                setTimeout(() => window.location.href = 'fatura-criar.php?duplicar=' + faturaData.numero, 1500);
            }
        }

        // ============================================
        // COPIAR IBAN
        // ============================================
        function copiarIBAN() {
            navigator.clipboard.writeText(faturaData.iban).then(() => {
                mostrarToast('IBAN copiado para a área de transferência!', 'success');
            }).catch(() => {
                mostrarToast('Erro ao copiar IBAN', 'error');
            });
        }

        // ============================================
        // CONFIRMAR CANCELAMENTO
        // ============================================
        function confirmarCancelamento(event, numero) {
            event.preventDefault();
            
            const modal = document.getElementById('modalConfirmacao');
            const btnConfirmar = document.getElementById('modalBtnConfirmar');
            
            document.getElementById('modalFaturaNumero').textContent = '"' + numero + '"';
            btnConfirmar.href = 'fatura-cancelar.php?numero=' + numero;
            
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            return false;
        }

        function fecharModalConfirmacao() {
            const modal = document.getElementById('modalConfirmacao');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModalConfirmacao();
            }
        });
    </script> 

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO                             -->
    <!-- ========================================== -->
   <style>
    /* ========================================== */
    /* FATURA DETALHE - CSS ESPECÍFICO            */
    /* ========================================== */

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
        font-size: var(--text-h2);
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

    .header-left .breadcrumb a {
        color: var(--text-muted);
        text-decoration: none;
        transition: var(--transition-smooth);
    }
    .header-left .breadcrumb a:hover { color: #00D2FF; }
    .header-left .breadcrumb .separator { color: var(--text-muted); opacity: 0.5; }

    .header-right {
        display: flex;
        align-items: center;
        gap: var(--space-sm);
        flex-shrink: 0;
        flex-wrap: wrap;
    }

    /* ========================================== */
    /* BADGES ESPECÍFICOS DA FATURA               */
    /* ========================================== */
    .badge-status.status-paga { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
    .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
    .badge-status.status-vencida { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
    .badge-status.status-cancelada { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }
    .badge-status.status-rascunho { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }

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

    .fatura-text-danger { color: #FF6B6B; }

    /* ========================================== */
    /* RESUMO FATURA                              */
    /* ========================================== */
    .resumo-fatura {
        margin-bottom: var(--space-lg);
    }

    .resumo-fatura-valor {
        display: flex;
        align-items: center;
        gap: var(--space-lg);
        padding: var(--space-lg) var(--space-xl);
        border-radius: var(--radius-lg);
        background: linear-gradient(135deg, rgba(0, 210, 255, 0.1) 0%, rgba(108, 43, 217, 0.05) 100%);
        border: 2px solid rgba(0, 210, 255, 0.25);
        flex-wrap: wrap;
    }

    .resumo-fatura-icon {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        flex-shrink: 0;
        background: rgba(0, 210, 255, 0.2);
        color: #00D2FF;
    }

    .resumo-fatura-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 200px;
    }

    .resumo-fatura-label {
        font-size: var(--text-sm);
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }

    .resumo-fatura-value {
        font-family: var(--font-display);
        font-size: var(--text-h1);
        font-weight: 700;
        color: #00D2FF;
        line-height: 1;
    }

    .resumo-fatura-meta {
        display: flex;
        gap: var(--space-lg);
        flex-wrap: wrap;
    }

    .resumo-fatura-meta .meta-item {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .resumo-fatura-meta .meta-label {
        font-size: var(--text-xs);
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .resumo-fatura-meta .meta-value {
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--text-primary);
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
    /* FATURA HEADER                              */
    /* ========================================== */
    .fatura-header {
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        border: 1px solid var(--border-color);
        margin-bottom: var(--space-lg);
        overflow: hidden;
    }

    .fatura-header-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-lg);
        padding: var(--space-lg);
        border-bottom: 1px solid var(--border-color);
    }

    .fatura-emitente,
    .fatura-cliente {
        display: flex;
        gap: var(--space-md);
        align-items: flex-start;
    }

    .emitente-avatar,
    .cliente-avatar {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .emitente-avatar {
        background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
        color: #FFFFFF;
    }

    .cliente-avatar {
        background: linear-gradient(135deg, #00D2FF 0%, #00FFA3 100%);
        color: #FFFFFF;
    }

    .emitente-info,
    .cliente-info {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .emitente-label,
    .cliente-label {
        font-size: 10px;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .emitente-info h3,
    .cliente-info h3 {
        font-family: var(--font-title);
        font-size: var(--text-h4);
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 6px 0;
    }

    .emitente-info p,
    .cliente-info p {
        font-size: var(--text-xs);
        color: var(--text-secondary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .emitente-info p i,
    .cliente-info p i {
        color: #00D2FF;
        width: 12px;
        font-size: 11px;
    }

    .fatura-meta-header {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: var(--space-md);
        padding: var(--space-lg);
        background: var(--bg-input);
    }

    .fatura-meta-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .fatura-meta-label {
        font-size: 10px;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .fatura-meta-value {
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--text-primary);
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
    /* ITENS TABLE                                */
    /* ========================================== */
    .itens-table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .itens-table {
        width: 100%;
        border-collapse: collapse;
        font-size: var(--text-sm);
        min-width: 700px;
    }

    .itens-table thead {
        background: var(--bg-input);
    }

    .itens-table thead th {
        color: var(--text-muted);
        font-weight: 600;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 12px 16px;
        text-align: left;
        border-bottom: 2px solid var(--border-color);
        white-space: nowrap;
    }

    .itens-table tbody td {
        padding: 16px;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-primary);
        vertical-align: top;
    }

    .item-descricao {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .item-descricao strong {
        font-size: var(--text-sm);
        color: var(--text-primary);
    }

    .item-descricao small {
        font-size: var(--text-xs);
        color: var(--text-muted);
        line-height: 1.4;
    }

    .itens-table tfoot td {
        padding: 12px 16px;
        color: var(--text-primary);
    }

    .itens-table tfoot .total-row td {
        background: linear-gradient(135deg, rgba(0, 210, 255, 0.08) 0%, rgba(108, 43, 217, 0.05) 100%);
    }

    .valor-extenso {
        display: flex;
        align-items: center;
        gap: var(--space-sm);
        padding: var(--space-md);
        background: var(--bg-input);
        border-radius: var(--radius-md);
        margin: var(--space-md) var(--space-lg) var(--space-lg);
        font-size: var(--text-sm);
        color: var(--text-secondary);
    }

    .valor-extenso i { color: #00D2FF; flex-shrink: 0; }
    .valor-extenso strong { color: var(--text-primary); }

    /* ========================================== */
    /* OBSERVAÇÕES                                */
    /* ========================================== */
    .observacoes-item {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .info-label {
        font-size: var(--text-xs);
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .observacoes-item p {
        font-size: var(--text-sm);
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 0;
        padding: var(--space-md);
        background: var(--bg-input);
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
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
    /* ESTADO DA FATURA                           */
    /* ========================================== */
    .estado-fatura {
        display: flex;
        align-items: center;
        gap: var(--space-md);
        padding: var(--space-md);
        background: var(--bg-input);
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        margin-bottom: var(--space-md);
    }

    .estado-icon {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .estado-icon.status-paga {
        background: rgba(0, 255, 163, 0.15);
        color: #00FFA3;
    }

    .estado-icon.status-pendente {
        background: rgba(255, 217, 61, 0.15);
        color: #FFD93D;
    }

    .estado-icon.status-vencida {
        background: rgba(255, 107, 107, 0.15);
        color: #FF6B6B;
    }

    .estado-icon.status-cancelada {
        background: rgba(107, 122, 143, 0.15);
        color: #6B7A8F;
    }

    .estado-info {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .estado-label {
        font-size: var(--text-xs);
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .estado-value {
        font-family: var(--font-title);
        font-size: var(--text-h4);
        font-weight: 700;
        color: var(--text-primary);
    }

    .estado-detalhe {
        display: flex;
        align-items: center;
        gap: var(--space-sm);
        padding: var(--space-sm) var(--space-md);
        background: var(--bg-input);
        border-radius: var(--radius-sm);
        font-size: var(--text-sm);
        color: var(--text-secondary);
    }

    .estado-detalhe strong { color: var(--text-primary); }

    /* ========================================== */
    /* RESUMO VALORES                             */
    /* ========================================== */
    .resumo-valores {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .resumo-valor-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .resumo-valor-item:last-child { border-bottom: none; }

    .resumo-valor-label {
        font-size: var(--text-sm);
        color: var(--text-muted);
    }

    .resumo-valor-value {
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--text-primary);
    }

    .resumo-valor-total {
        margin-top: var(--space-sm);
        padding-top: var(--space-md);
        border-top: 2px solid var(--border-color);
    }

    .resumo-valor-total .resumo-valor-label {
        font-size: var(--text-h4);
        font-weight: 700;
        color: var(--text-primary);
    }

    .resumo-valor-total .resumo-valor-value {
        font-family: var(--font-display);
        font-size: var(--text-h2);
        font-weight: 700;
        color: #00D2FF;
    }

    /* ========================================== */
    /* TRANSAÇÃO VINCULADA                        */
    /* ========================================== */
    .transacao-vinculada {
        display: block;
        padding: var(--space-md);
        background: var(--bg-input);
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        text-decoration: none;
        transition: var(--transition-smooth);
    }

    .transacao-vinculada:hover {
        border-color: #00D2FF;
        background: var(--bg-card-hover);
    }

    .transacao-vinculada-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .transacao-vinculada-ref {
        font-family: var(--font-display);
        font-size: var(--text-sm);
        font-weight: 700;
        color: #00D2FF;
    }

    .comprovativo-badge {
        font-size: 10px;
        padding: 2px 8px;
        background: rgba(0, 210, 255, 0.12);
        color: #00D2FF;
        border-radius: var(--radius-full);
        font-weight: 600;
    }

    .transacao-vinculada-meta {
        display: flex;
        gap: var(--space-md);
        flex-wrap: wrap;
    }

    .transacao-vinculada-meta span {
        font-size: var(--text-xs);
        color: var(--text-muted);
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* ========================================== */
    /* DADOS BANCÁRIOS                            */
    /* ========================================== */
    .dados-bancarios {
        display: flex;
        flex-direction: column;
        gap: var(--space-sm);
    }

    .dados-bancarios-item {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .dados-bancarios-label {
        font-size: var(--text-xs);
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .dados-bancarios-value {
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--text-primary);
        word-break: break-all;
    }

    /* ========================================== */
    /* FATURAS RELACIONADAS                       */
    /* ========================================== */
    .faturas-relacionadas-list {
        display: flex;
        flex-direction: column;
        gap: var(--space-sm);
    }

    .fatura-relacionada {
        display: flex;
        align-items: center;
        gap: var(--space-md);
        padding: var(--space-sm) var(--space-md);
        background: var(--bg-input);
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        text-decoration: none;
        transition: var(--transition-smooth);
    }

    .fatura-relacionada:hover {
        border-color: #00D2FF;
        transform: translateX(4px);
    }

    .fatura-relacionada-icon {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-sm);
        background: rgba(0, 210, 255, 0.15);
        color: #00D2FF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
    }

    .fatura-relacionada-conteudo {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .fatura-relacionada-numero {
        font-family: var(--font-display);
        font-size: var(--text-xs);
        font-weight: 700;
        color: var(--text-primary);
    }

    .fatura-relacionada-data {
        font-size: 10px;
        color: var(--text-muted);
    }

    .fatura-relacionada-valor {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 2px;
        flex-shrink: 0;
    }

    .fatura-relacionada-total {
        font-family: var(--font-display);
        font-size: var(--text-sm);
        font-weight: 700;
        color: #00D2FF;
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
    /* MODAL DE CANCELAMENTO (específico fatura) */
    /* ========================================== */
    .modal-fatura {
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

    .modal-fatura.active { display: flex; }

    .modal-fatura .modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        cursor: pointer;
    }

    .modal-fatura .modal-content {
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

    .modal-header-danger {
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.15) 0%, rgba(255, 107, 107, 0.05) 100%);
        border-bottom: 1px solid rgba(255, 107, 107, 0.3);
    }

    .modal-title-danger {
        font-family: var(--font-title);
        font-weight: 700;
        font-size: var(--text-h4);
        color: #FF6B6B;
        display: flex;
        align-items: center;
        gap: var(--space-sm);
        margin: 0;
    }

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

    .modal-fatura-numero {
        font-family: var(--font-display);
        font-size: var(--text-h4);
        font-weight: 700;
        color: #FF6B6B;
        text-align: center;
        margin: 0;
        padding: var(--space-md);
        background: rgba(255, 107, 107, 0.08);
        border-radius: var(--radius-md);
        border: 2px dashed rgba(255, 107, 107, 0.4);
    }

    .modal-footer-danger {
        padding: 16px 24px;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .modal-footer-danger .btn { min-width: 120px; justify-content: center; }

    /* ========================================== */
    /* RESPONSIVIDADE                             */
    /* ========================================== */
    @media (max-width: 1200px) {
        .detalhe-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 992px) {
        .page-header {
            flex-direction: column;
            align-items: stretch;
        }
        .header-right {
            justify-content: flex-end;
            width: 100%;
        }
        .fatura-header-row {
            grid-template-columns: 1fr;
        }
        .fatura-meta-header {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .resumo-fatura-valor {
            flex-direction: column;
            text-align: center;
        }

        .resumo-fatura-value {
            font-size: var(--text-h2);
        }

        .header-left h1 {
            font-size: var(--text-h3);
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header {
            padding: var(--space-md);
        }

        .fatura-meta-header {
            grid-template-columns: 1fr;
        }

        .modal-fatura .modal-content {
            width: 95%;
        }

        .modal-footer-danger {
            flex-direction: column-reverse;
        }

        .modal-footer-danger .btn {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .fatura-emitente,
        .fatura-cliente {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .estado-fatura {
            flex-direction: column;
            text-align: center;
        }
    }

    /* ========================================== */
    /* IMPRESSÃO                                  */
    /* ========================================== */
    @media print {
        .sidebar,
        .bottom-nav,
        .page-header .header-right,
        .detalhe-coluna-lateral,
        .form-actions,
        .toast-container,
        .modal-fatura {
            display: none !important;
        }

        .main-content {
            margin-left: 0 !important;
            padding: 0 !important;
        }

        .detalhe-grid {
            grid-template-columns: 1fr !important;
        }

        body {
            background: #FFFFFF !important;
            color: #000000 !important;
        }

        .fatura-header,
        .detalhe-card {
            box-shadow: none !important;
            border: 1px solid #000 !important;
            page-break-inside: avoid;
        }
    }
</style>
</body>

</html>