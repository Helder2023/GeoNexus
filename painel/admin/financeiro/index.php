<?php
// painel/admin/financeiro/index.php - Dashboard Financeiro
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Dashboard Financeiro';
$pagina_atual = 'financeiro';

// Dados mockados para estatísticas
$total_usuarios = 12;
$total_projetos = 189;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Estatísticas Financeiras
$stats = [
    'faturamento_total' => 12800000,
    'faturamento_mes' => 1245000,
    'faturamento_ano' => 8450000,
    'receitas' => 8450000,
    'despesas' => 3250000,
    'lucro' => 5200000,
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pagas' => 45000,
    'comissoes_pendentes' => 15000,
    'taxa_convertida' => 0.35,
];

// Dados mockados - Transações Recentes
$transacoes_recentes = [
    [
        'id' => 1,
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-1.png',
        'valor' => 25000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Multicaixa',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-18 14:20:00',
        'descricao' => 'Plano Pro - Mensalidade'
    ],
    [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-1.png',
        'valor' => 75000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-18 11:45:00',
        'descricao' => 'Enterprise - Anual'
    ],
    [
        'id' => 3,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Instituição',
        'cliente_avatar' => 'instituicao-1.png',
        'valor' => 125000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Depósito Bancário',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-18 09:00:00',
        'descricao' => 'Institucional Pro - Trimestral'
    ],
    [
        'id' => 4,
        'cliente' => 'Ana Costa',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-2.png',
        'valor' => 15000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Cartão de Crédito',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-17 16:30:00',
        'descricao' => 'Básico - Mensalidade'
    ],
    [
        'id' => 5,
        'cliente' => 'Mineração Progresso',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-7.png',
        'valor' => 250000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-17 14:20:00',
        'descricao' => 'Enterprise Pro - Anual'
    ],
    [
        'id' => 6,
        'cliente' => 'Energia Futuro',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-8.png',
        'valor' => 45000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Multicaixa',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-17 11:00:00',
        'descricao' => 'Empresarial - Mensalidade'
    ],
];

// Dados mockados - Assinaturas Recentes
$assinaturas_recentes = [
    [
        'id' => 1,
        'cliente' => 'Carlos Mendes',
        'cliente_avatar' => 'avatar-1.png',
        'cliente_tipo' => 'Profissional',
        'plano' => 'Pro',
        'valor' => 25000,
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-15',
        'fim' => '2026-02-15',
        'renovacao' => '2026-02-15'
    ],
    [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_tipo' => 'Empresa',
        'plano' => 'Enterprise',
        'valor' => 75000,
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-01',
        'fim' => '2026-12-31',
        'renovacao' => '2026-12-31'
    ],
    [
        'id' => 3,
        'cliente' => 'Ana Costa',
        'cliente_avatar' => 'avatar-2.png',
        'cliente_tipo' => 'Profissional',
        'plano' => 'Básico',
        'valor' => 15000,
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-02-01',
        'fim' => '2026-03-01',
        'renovacao' => '2026-03-01'
    ],
    [
        'id' => 4,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_tipo' => 'Instituição',
        'plano' => 'Institucional Pro',
        'valor' => 125000,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'inicio' => '2026-02-15',
        'fim' => '2026-05-15',
        'renovacao' => '2026-05-15'
    ],
];

// Dados mockados - Pagamentos Pendentes
$pagamentos_pendentes = [
    [
        'id' => 1,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_avatar' => 'instituicao-1.png',
        'valor' => 125000,
        'metodo' => 'Depósito Bancário',
        'vencimento' => '2026-02-15',
        'dias_atraso' => 3,
        'status' => 'pendente'
    ],
    [
        'id' => 2,
        'cliente' => 'Energia Futuro',
        'cliente_avatar' => 'empresa-8.png',
        'valor' => 45000,
        'metodo' => 'Multicaixa',
        'vencimento' => '2026-02-18',
        'dias_atraso' => 0,
        'status' => 'pendente'
    ],
    [
        'id' => 3,
        'cliente' => 'Pedro Santos',
        'cliente_avatar' => 'avatar-3.png',
        'valor' => 25000,
        'metodo' => 'Transferência Bancária',
        'vencimento' => '2026-02-10',
        'dias_atraso' => 8,
        'status' => 'atrasado'
    ],
];

// Dados mockados - Faturas Recentes
$faturas_recentes = [
    [
        'id' => 'FAT-2026-001',
        'cliente' => 'Construtora ABC',
        'valor' => 75000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01',
        'vencimento' => '2026-02-15'
    ],
    [
        'id' => 'FAT-2026-002',
        'cliente' => 'Carlos Mendes',
        'valor' => 25000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01',
        'vencimento' => '2026-02-15'
    ],
    [
        'id' => 'FAT-2026-003',
        'cliente' => 'Instituto Técnico de Luanda',
        'valor' => 125000,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'emissao' => '2026-02-05',
        'vencimento' => '2026-02-20'
    ],
    [
        'id' => 'FAT-2026-004',
        'cliente' => 'Ana Costa',
        'valor' => 15000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01',
        'vencimento' => '2026-02-15'
    ],
];

$total_transacoes = count($transacoes_recentes);

// Funções auxiliares
function safeValue($value, $default = 'N/A')
{
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function formatMoney($value)
{
    return number_format($value, 0, ',', '.');
}

function formatDate($date)
{
    if (empty($date)) return 'N/A';
    return date('d/m/Y', strtotime($date));
}

function formatDateTime($datetime)
{
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i', strtotime($datetime));
}

function getAvatarUrl($name)
{
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

// Verificar página atual para o sidebar
$pagina_atual_sidebar = $pagina_atual;
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../../includes/admin-financeiro-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR FINANCEIRO                         -->
        <!-- ========================================== -->
        <?php include "../../../includes/admin-financeiro-sidebar.php" ?>
        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-coins icon" style="color: #FFD93D;"></i>
                        Dashboard Financeiro
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Financeiro</span>
                    </p>
                </div>
                <div class="header-right">
                    <!-- Botão Tema Dark/Light -->
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/notificacoes-finaceiro.php" ?>

                    <div class="header-actions">
                        <button class="btn btn-primary" onclick="abrirModal('modalNovaTransacao')">
                            <i class="fas fa-plus"></i> Nova Transação
                        </button>
                        <button class="btn btn-outline" onclick="window.location.reload()">
                            <i class="fas fa-sync-alt"></i> Atualizar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- STATS CARDS                                -->
            <!-- ========================================== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                    <div class="icon green"><i class="fas fa-arrow-up"></i></div>
                    <div class="value">Kz <?php echo formatMoney($stats['faturamento_total']); ?></div>
                    <div class="label">Faturamento Total</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 15.2%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                    <div class="icon blue"><i class="fas fa-calendar-alt"></i></div>
                    <div class="value">Kz <?php echo formatMoney($stats['faturamento_mes']); ?></div>
                    <div class="label">Faturamento do Mês</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 8.5%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                    <div class="icon yellow"><i class="fas fa-star"></i></div>
                    <div class="value"><?php echo $stats['assinaturas_ativas']; ?></div>
                    <div class="label">Assinaturas Ativas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 12.3%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                    <div class="icon red"><i class="fas fa-clock"></i></div>
                    <div class="value"><?php echo $stats['pagamentos_pendentes']; ?></div>
                    <div class="label">Pagamentos Pendentes</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 5.1%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #6C2BD9;">
                    <div class="icon aurora"><i class="fas fa-file-invoice"></i></div>
                    <div class="value"><?php echo $stats['faturas_emitidas']; ?></div>
                    <div class="label">Faturas Emitidas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 18.7%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                    <div class="icon green"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="value">Kz <?php echo formatMoney($stats['comissoes_pagas']); ?></div>
                    <div class="label">Comissões Pagas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 22.1%</div>
                </div>
            </section>

            <!-- ========================================== -->
            <!-- GRÁFICOS (Resumo Financeiro)               -->
            <!-- ========================================== -->
            <section class="financeiro-resumo animate-fade-up">
                <div class="resumo-card">
                    <h3><i class="fas fa-chart-pie"></i> Resumo Financeiro</h3>
                    <div class="resumo-grid">
                        <div class="resumo-item">
                            <span class="resumo-label">Receitas</span>
                            <span class="resumo-value" style="color: #00FFA3;">Kz <?php echo formatMoney($stats['receitas']); ?></span>
                            <div class="resumo-bar">
                                <div class="resumo-fill" style="width: 75%; background: #00FFA3;"></div>
                            </div>
                        </div>
                        <div class="resumo-item">
                            <span class="resumo-label">Despesas</span>
                            <span class="resumo-value" style="color: #FF6B6B;">Kz <?php echo formatMoney($stats['despesas']); ?></span>
                            <div class="resumo-bar">
                                <div class="resumo-fill" style="width: 40%; background: #FF6B6B;"></div>
                            </div>
                        </div>
                        <div class="resumo-item">
                            <span class="resumo-label">Lucro</span>
                            <span class="resumo-value" style="color: #FFD93D;">Kz <?php echo formatMoney($stats['lucro']); ?></span>
                            <div class="resumo-bar">
                                <div class="resumo-fill" style="width: 60%; background: #FFD93D;"></div>
                            </div>
                        </div>
                        <div class="resumo-item">
                            <span class="resumo-label">Taxa de Conversão</span>
                            <span class="resumo-value" style="color: #00D2FF;"><?php echo ($stats['taxa_convertida'] * 100); ?>%</span>
                            <div class="resumo-bar">
                                <div class="resumo-fill" style="width: <?php echo ($stats['taxa_convertida'] * 100); ?>%; background: #00D2FF;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ========================================== -->
            <!-- TRANSAÇÕES RECENTES                        -->
            <!-- ========================================== -->
            <div class="financeiro-container animate-fade-up">
                <div class="section-header">
                    <h3><i class="fas fa-exchange-alt"></i> Transações Recentes</h3>
                    <div class="section-actions">
                        <a href="transacoes.php" class="btn btn-sm btn-outline">Ver Todas <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-financeiro">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Método</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (array_slice($transacoes_recentes, 0, 6) as $transacao): ?>
                                <tr>
                                    <td>
                                        <div class="cliente-cell">
                                            <img src="../../../../../../assets/images/<?php echo $transacao['cliente_avatar']; ?>"
                                                alt="<?php echo $transacao['cliente']; ?>"
                                                onerror="this.src='<?php echo getAvatarUrl($transacao['cliente']); ?>'">
                                            <span><?php echo $transacao['cliente']; ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $transacao['descricao']; ?></td>
                                    <td>
                                        <span class="badge badge-tipo badge-<?php echo $transacao['tipo']; ?>">
                                            <i class="fas <?php echo $transacao['tipo'] === 'receita' ? 'fa-arrow-up' : 'fa-arrow-down'; ?>"></i>
                                            <?php echo $transacao['tipo_label']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="valor <?php echo $transacao['tipo'] === 'receita' ? 'valor-receita' : 'valor-despesa'; ?>">
                                            <?php echo $transacao['tipo'] === 'receita' ? '+' : '-'; ?>
                                            Kz <?php echo formatMoney($transacao['valor']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $transacao['metodo']; ?></td>
                                    <td>
                                        <span class="badge badge-status status-<?php echo $transacao['status']; ?>">
                                            <span class="status-dot"></span>
                                            <?php echo $transacao['status_label']; ?>
                                        </span>
                                    </td>
                                    <td><?php echo formatDateTime($transacao['data']); ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="transacao-detalhe.php?id=<?php echo $transacao['id']; ?>" class="btn btn-sm btn-outline" title="Ver Detalhes">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="transacao-editar.php?id=<?php echo $transacao['id']; ?>" class="btn btn-sm btn-outline" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- ASSINATURAS E PAGAMENTOS PENDENTES        -->
            <!-- ========================================== -->
            <div class="financeiro-grid">
                <!-- Assinaturas Recentes -->
                <div class="financeiro-card animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="section-header">
                        <h3><i class="fas fa-crown"></i> Assinaturas Recentes</h3>
                        <div class="section-actions">
                            <a href="assinaturas.php" class="btn btn-sm btn-outline">Ver Todas <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="assinaturas-list">
                        <?php foreach (array_slice($assinaturas_recentes, 0, 4) as $assinatura): ?>
                            <div class="assinatura-item">
                                <div class="assinatura-cliente">
                                    <img src="../../../../../../assets/images/<?php echo $assinatura['cliente_avatar']; ?>"
                                        alt="<?php echo $assinatura['cliente']; ?>"
                                        onerror="this.src='<?php echo getAvatarUrl($assinatura['cliente']); ?>'">
                                    <div>
                                        <span class="cliente-nome"><?php echo $assinatura['cliente']; ?></span>
                                        <span class="cliente-plano"><?php echo $assinatura['plano']; ?></span>
                                    </div>
                                </div>
                                <div class="assinatura-info">
                                    <span class="valor">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                                    <span class="badge badge-status status-<?php echo $assinatura['status']; ?>">
                                        <span class="status-dot"></span>
                                        <?php echo $assinatura['status_label']; ?>
                                    </span>
                                </div>
                                <div class="assinatura-datas">
                                    <span><i class="far fa-calendar-alt"></i> <?php echo formatDate($assinatura['inicio']); ?></span>
                                    <span><i class="far fa-calendar-check"></i> <?php echo formatDate($assinatura['fim']); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Pagamentos Pendentes -->
                <div class="financeiro-card animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="section-header">
                        <h3><i class="fas fa-clock"></i> Pagamentos Pendentes</h3>
                        <div class="section-actions">
                            <a href="pagamentos.php?status=pending" class="btn btn-sm btn-outline">Ver Todos <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="pagamentos-list">
                        <?php foreach ($pagamentos_pendentes as $pagamento): ?>
                            <div class="pagamento-item <?php echo $pagamento['status'] === 'atrasado' ? 'atrasado' : ''; ?>">
                                <div class="pagamento-cliente">
                                    <img src="../../../../../../assets/images/<?php echo $pagamento['cliente_avatar']; ?>"
                                        alt="<?php echo $pagamento['cliente']; ?>"
                                        onerror="this.src='<?php echo getAvatarUrl($pagamento['cliente']); ?>'">
                                    <div>
                                        <span class="cliente-nome"><?php echo $pagamento['cliente']; ?></span>
                                        <span class="pagamento-metodo"><i class="fas fa-credit-card"></i> <?php echo $pagamento['metodo']; ?></span>
                                    </div>
                                </div>
                                <div class="pagamento-info">
                                    <span class="valor">Kz <?php echo formatMoney($pagamento['valor']); ?></span>
                                    <?php if ($pagamento['dias_atraso'] > 0): ?>
                                        <span class="badge badge-danger">
                                            <i class="fas fa-exclamation-triangle"></i> <?php echo $pagamento['dias_atraso']; ?> dias atrasado
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-warning">
                                            <i class="fas fa-clock"></i> Vence hoje
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="pagamento-actions">
                                    <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-sm btn-outline" title="Ver Detalhes">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="pagamento-aprovar.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-sm btn-success" title="Aprovar">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- FATURAS RECENTES                           -->
            <!-- ========================================== -->
            <div class="financeiro-container animate-fade-up" style="animation-delay: 0.3s;">
                <div class="section-header">
                    <h3><i class="fas fa-file-invoice"></i> Faturas Recentes</h3>
                    <div class="section-actions">
                        <a href="faturas.php" class="btn btn-sm btn-outline">Ver Todas <i class="fas fa-arrow-right"></i></a>
                        <a href="fatura-criar.php" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Nova Fatura</a>
                    </div>
                </div>
                <div class="faturas-grid">
                    <?php foreach (array_slice($faturas_recentes, 0, 4) as $fatura): ?>
                        <div class="fatura-card">
                            <div class="fatura-header">
                                <span class="fatura-id"><?php echo $fatura['id']; ?></span>
                                <span class="badge badge-status status-<?php echo $fatura['status']; ?>">
                                    <span class="status-dot"></span>
                                    <?php echo $fatura['status_label']; ?>
                                </span>
                            </div>
                            <div class="fatura-body">
                                <span class="fatura-cliente"><?php echo $fatura['cliente']; ?></span>
                                <span class="fatura-valor">Kz <?php echo formatMoney($fatura['valor']); ?></span>
                            </div>
                            <div class="fatura-footer">
                                <span><i class="far fa-calendar-alt"></i> Emissão: <?php echo formatDate($fatura['emissao']); ?></span>
                                <span><i class="far fa-calendar-check"></i> Venc.: <?php echo formatDate($fatura['vencimento']); ?></span>
                                <a href="fatura-detalhe.php?id=<?php echo $fatura['id']; ?>" class="btn btn-sm btn-outline">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL NOVA TRANSAÇÃO                      -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovaTransacao">
        <div class="modal-overlay" onclick="fecharModal('modalNovaTransacao')"></div>
        <div class="modal-content" style="max-width: 600px;">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-plus-circle"></i> Nova Transação</h3>
                <button class="modal-close" onclick="fecharModal('modalNovaTransacao')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovaTransacao" onsubmit="criarTransacao(event)">
                    <div class="form-group">
                        <label class="form-label">Cliente <span class="required">*</span></label>
                        <input type="text" class="form-control" id="clienteTransacao" placeholder="Nome do cliente" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Descrição <span class="required">*</span></label>
                        <input type="text" class="form-control" id="descricaoTransacao" placeholder="Descrição da transação" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Valor <span class="required">*</span></label>
                            <input type="number" class="form-control" id="valorTransacao" placeholder="0" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tipo <span class="required">*</span></label>
                            <select class="form-control" id="tipoTransacao" required>
                                <option value="receita">Receita</option>
                                <option value="despesa">Despesa</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Método</label>
                            <select class="form-control" id="metodoTransacao">
                                <option value="Multicaixa">Multicaixa</option>
                                <option value="Transferência Bancária">Transferência Bancária</option>
                                <option value="Cartão de Crédito">Cartão de Crédito</option>
                                <option value="Depósito Bancário">Depósito Bancário</option>
                                <option value="Numerário">Numerário</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="statusTransacao">
                                <option value="concluido">Concluído</option>
                                <option value="pendente">Pendente</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalNovaTransacao')">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('formNovaTransacao').submit()">
                    <i class="fas fa-save"></i> Criar Transação
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="../../../assets/js/main.js"></script>
    <script>
        

        // ==========================================
        // TOGGLE SIDEBAR (Desktop)
        // ==========================================
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

            // Fechar modal com ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal.active').forEach(modal => {
                        fecharModal(modal.id);
                    });
                }
            });
        });

        // ==========================================
        // TOGGLE SIDEBAR (Mobile - Bottom Nav)
        // ==========================================
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

        // ==========================================
        // NOTIFICAÇÕES - DROPDOWN
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            const btnNotif = document.getElementById('btnNotificacoes');
            const dropdown = document.getElementById('notificacoesDropdown');

            if (btnNotif && dropdown) {
                btnNotif.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                    if (dropdown.classList.contains('active')) {
                        carregarNotificacoes();
                    }
                });

                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }
        });

        function carregarNotificacoes() {
            const list = document.getElementById('notifList');
            if (!list) return;

            const naoLidas = mockNotificacoes.filter(n => !n.lida);
            const todas = mockNotificacoes;

            let html = '';

            if (naoLidas.length > 0) {
                html += '<div class="notif-group"><span class="notif-group-label">Não lidas</span>';
                naoLidas.forEach(n => {
                    html += criarNotificacaoItem(n);
                });
                html += '</div>';
            }

            const lidas = mockNotificacoes.filter(n => n.lida);
            if (lidas.length > 0) {
                html += '<div class="notif-group"><span class="notif-group-label">Lidas</span>';
                lidas.forEach(n => {
                    html += criarNotificacaoItem(n);
                });
                html += '</div>';
            }

            if (todas.length === 0) {
                html = `
            <div class="notificacao-vazia">
                <i class="fas fa-bell-slash"></i>
                <p>Nenhuma notificação</p>
            </div>
        `;
            }

            list.innerHTML = html;
        }

        function criarNotificacaoItem(notif) {
            return `
        <div class="notificacao-item ${notif.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${notif.id})">
            <div class="notif-icon ${notif.icon_class}">
                <i class="fas ${notif.icon}"></i>
            </div>
            <div class="notif-conteudo">
                <p>${notif.mensagem}</p>
                <span class="notif-tempo">${notif.tempo}</span>
            </div>
            ${!notif.lida ? '<span class="notif-dot"></span>' : ''}
        </div>
    `;
        }

        function marcarNotificacaoLida(id) {
            const notif = mockNotificacoes.find(n => n.id === id);
            if (notif) {
                notif.lida = true;
                atualizarBadge();
                carregarNotificacoes();
                mostrarToast('Notificação marcada como lida', 'info');
            }
        }

        function marcarTodasLidas() {
            mockNotificacoes.forEach(n => n.lida = true);
            atualizarBadge();
            carregarNotificacoes();
            mostrarToast('Todas as notificações foram marcadas como lidas', 'success');
            closeNotifications();
        }

        function atualizarBadge() {
            const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
            const badge = document.getElementById('notifBadge');
            const bottomBadge = document.getElementById('bottomNotifBadge');

            if (badge) {
                if (naoLidas > 0) {
                    badge.textContent = naoLidas;
                    badge.style.display = 'flex';
                } else {
                    badge.style.display = 'none';
                }
            }

            if (bottomBadge) {
                if (naoLidas > 0) {
                    bottomBadge.textContent = naoLidas;
                    bottomBadge.style.display = 'flex';
                } else {
                    bottomBadge.style.display = 'none';
                }
            }
        }

        function closeNotifications() {
            const dropdown = document.getElementById('notificacoesDropdown');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }

        // ==========================================
        // PERFIL - DROPDOWN
        // ==========================================

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

            const themeToggle = document.querySelector('.perfil-dropdown .theme-toggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('btnTheme')?.click();
                    dropdown.classList.remove('active');
                });
            }
        });

        // ==========================================
        // THEME DARK/LIGHT
        // ==========================================
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const btnTheme = document.getElementById('btnTheme');
            if (btnTheme) {
                btnTheme.addEventListener('click', function(e) {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    const themeLabel = document.querySelector('.perfil-dropdown .theme-toggle');
                    if (themeLabel) {
                        if (newTheme === 'dark') {
                            themeLabel.innerHTML = '<i class="fas fa-moon"></i> Tema Escuro';
                        } else {
                            themeLabel.innerHTML = '<i class="fas fa-sun"></i> Tema Claro';
                        }
                    }

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ==========================================
        // TOAST NOTIFICATIONS
        // ==========================================
        function mostrarToast(mensagem, tipo = 'success') {
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

            const toast = document.createElement('div');
            toast.className = 'toast toast-' + tipo;
            toast.innerHTML = `
        <div class="toast-content">
            <i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i>
            <span>${mensagem}</span>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove()">&times;</button>
    `;

            container.appendChild(toast);

            requestAnimationFrame(() => {
                toast.style.transform = 'translateX(0)';
                toast.style.opacity = '1';
            });

            setTimeout(() => {
                if (toast.parentElement) {
                    toast.style.transform = 'translateX(100%)';
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 300);
                }
            }, 4000);
        }

        // ==========================================
        // CRIAR TRANSAÇÃO
        // ==========================================
        function criarTransacao(event) {
            event.preventDefault();

            const cliente = document.getElementById('clienteTransacao').value;
            const descricao = document.getElementById('descricaoTransacao').value;
            const valor = document.getElementById('valorTransacao').value;

            if (!cliente || !descricao || !valor) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast('Transação criada com sucesso!', 'success');
            fecharModal('modalNovaTransacao');
            document.getElementById('formNovaTransacao').reset();

            setTimeout(() => {
                location.reload();
            }, 1500);
        }

        // ==========================================
        // MODAIS
        // ==========================================
        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        function abrirModal(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    </script>

    <style>
        /* ========================================== */
        /* FINANCEIRO - CSS COMPLETO                  */
        /* ========================================== */

        /* ===== RESUMO FINANCEIRO ===== */
        .financeiro-resumo {
            margin-bottom: var(--space-lg);
        }

        .resumo-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .resumo-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .resumo-card h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .resumo-card h3 i {
            color: #FFD93D;
        }

        .resumo-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-lg);
        }

        .resumo-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .resumo-item .resumo-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .resumo-item .resumo-value {
            font-size: var(--text-h3);
            font-weight: 700;
        }

        .resumo-item .resumo-bar {
            width: 100%;
            height: 4px;
            background: var(--bg-input);
            border-radius: 2px;
            overflow: hidden;
            margin-top: 4px;
        }

        .resumo-item .resumo-fill {
            height: 100%;
            border-radius: 2px;
            transition: width 0.6s ease;
        }

        /* ===== CONTAINERS ===== */
        .financeiro-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .financeiro-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .financeiro-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .financeiro-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .financeiro-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== SECTION HEADER ===== */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .section-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .section-header h3 i {
            color: #FFD93D;
        }

        .section-actions {
            display: flex;
            gap: var(--space-sm);
        }

        /* ===== TABELA FINANCEIRO ===== */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-financeiro {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
        }

        .table-financeiro thead {
            background: var(--bg-input);
            border-radius: var(--radius-sm);
        }

        .table-financeiro thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 10px 12px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
        }

        .table-financeiro tbody td {
            padding: 8px 12px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-financeiro tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-financeiro tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== CLIENTE CELL ===== */
        .cliente-cell {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .cliente-cell img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .cliente-cell span {
            font-weight: 500;
            color: var(--text-primary);
        }

        /* ===== VALORES ===== */
        .valor {
            font-weight: 600;
        }

        .valor-receita {
            color: #00FFA3;
        }

        .valor-despesa {
            color: #FF6B6B;
        }

        /* ===== BADGES ===== */
        .badge-tipo {
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-tipo.badge-receita {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-tipo.badge-despesa {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-status .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .badge-status.status-concluido {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-concluido .status-dot {
            background: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-pendente .status-dot {
            background: #FFD93D;
        }

        .badge-status.status-cancelado {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-status.status-cancelado .status-dot {
            background: #FF6B6B;
        }

        .badge-status.status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-ativo .status-dot {
            background: #00FFA3;
        }

        /* ===== ASSINATURAS ===== */
        .assinaturas-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .assinatura-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .assinatura-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .assinatura-cliente img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .assinatura-cliente .cliente-nome {
            font-weight: 500;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .assinatura-cliente .cliente-plano {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .assinatura-info {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .assinatura-info .valor {
            font-weight: 600;
            color: #FFD93D;
        }

        .assinatura-datas {
            display: flex;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .assinatura-datas i {
            margin-right: 2px;
        }

        /* ===== PAGAMENTOS PENDENTES ===== */
        .pagamentos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .pagamento-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .pagamento-item.atrasado {
            border-left: 3px solid #FF6B6B;
        }

        .pagamento-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .pagamento-cliente img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .pagamento-cliente .cliente-nome {
            font-weight: 500;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .pagamento-cliente .pagamento-metodo {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .pagamento-info {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .pagamento-info .valor {
            font-weight: 600;
            color: #FFD93D;
        }

        .pagamento-actions {
            display: flex;
            gap: 4px;
        }

        /* ===== FATURAS ===== */
        .faturas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: var(--space-md);
        }

        .fatura-card {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            padding: var(--space-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .fatura-card:hover {
            border-color: #FFD93D;
            transform: translateY(-2px);
            box-shadow: var(--glass-shadow);
        }

        .fatura-card .fatura-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-sm);
        }

        .fatura-card .fatura-id {
            font-family: 'Orbitron', sans-serif;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
        }

        .fatura-card .fatura-body {
            display: flex;
            flex-direction: column;
            gap: 2px;
            margin-bottom: var(--space-sm);
        }

        .fatura-card .fatura-cliente {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .fatura-card .fatura-valor {
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FFD93D;
        }

        .fatura-card .fatura-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            font-size: var(--text-xs);
            color: var(--text-muted);
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
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            animation: fadeIn 0.3s ease;
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: var(--glass-shadow);
            border: 1px solid var(--border-color);
            z-index: 10;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header .modal-title {
            font-family: var(--font-title);
            font-weight: 600;
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .modal-header .modal-title i {
            color: #FFD93D;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.3rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px;
            line-height: 1;
        }

        .modal-close:hover {
            color: var(--text-primary);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn {
            min-width: 100px;
            justify-content: center;
        }

        /* ========================================== */
        /* FORMULÁRIO                                 */
        /* ========================================== */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .form-group {
            margin-bottom: var(--space-md);
        }

        .form-group label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .form-group label .required {
            color: #FF6B6B;
            margin-left: 2px;
        }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.08);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        /* ========================================== */
        /* ACTION BUTTONS                            */
        /* ========================================== */

        .action-buttons {
            display: flex;
            gap: 4px;
        }

        .action-buttons .btn {
            padding: 4px 6px;
            font-size: var(--text-xs);
            min-width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .financeiro-grid {
                grid-template-columns: 1fr;
            }

            .resumo-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .resumo-grid {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .faturas-grid {
                grid-template-columns: 1fr;
            }

            .assinatura-item {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .assinatura-cliente {
                justify-content: center;
            }

            .assinatura-info {
                justify-content: center;
            }

            .assinatura-datas {
                justify-content: center;
            }

            .pagamento-item {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .pagamento-cliente {
                justify-content: center;
            }

            .pagamento-info {
                justify-content: center;
            }

            .pagamento-actions {
                justify-content: center;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .table-financeiro thead {
                display: none;
            }

            .table-financeiro tbody tr {
                display: block;
                margin-bottom: var(--space-md);
                border: 1px solid var(--border-color);
                border-radius: var(--radius-sm);
                padding: var(--space-sm);
            }

            .table-financeiro tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 4px 8px;
                border-bottom: 1px solid var(--border-color);
            }

            .table-financeiro tbody td:last-child {
                border-bottom: none;
            }

            .cliente-cell {
                flex-direction: column;
                text-align: center;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .modal-header {
                padding: 14px 18px;
            }

            .modal-body {
                padding: 18px;
            }

            .modal-footer {
                flex-direction: column;
                padding: 12px 18px;
            }

            .modal-footer .btn {
                width: 100%;
                min-width: auto;
            }

            .financeiro-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .financeiro-card {
                padding: var(--space-sm);
            }

            .resumo-card {
                padding: var(--space-md);
            }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ========================================== */
        /* SCROLLBAR PERSONALIZADO                    */
        /* ========================================== */

        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }

        ::-webkit-scrollbar-thumb {
            background: #FFD93D;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #F5C842;
        }
    </style>
</body>

</html>