<?php
// painel/admin/financeiro/transacao-editar.php - Editar Transação
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Editar Transação';
$pagina_atual = 'transacoes';

// ===== OBTER ID DA TRANSAÇÃO =====
$id_transacao = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE TRANSAÇÕES =====
$transacoes = [
    1 => [
        'id' => 1,
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-1.png',
        'cliente_email' => 'carlos.mendes@email.com',
        'cliente_telefone' => '+244 923 456 789',
        'valor' => 25000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Multicaixa',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-18 14:20:00',
        'descricao' => 'Plano Pro - Mensalidade',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-001',
        'comprovativo' => 'comp-001.pdf',
        'notas' => 'Pagamento referente à mensalidade de Fevereiro. Cliente com bom histórico de pagamentos.',
        'plano' => 'Pro',
        'periodo' => 'Mensal',
        'proximo_pagamento' => '2026-03-18'
    ],
    2 => [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_email' => 'financeiro@construtoraabc.ao',
        'cliente_telefone' => '+244 222 345 678',
        'valor' => 75000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-18 11:45:00',
        'descricao' => 'Enterprise - Anual',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-002',
        'comprovativo' => null,
        'notas' => 'Assinatura anual renovada. Empresa parceira desde 2024.',
        'plano' => 'Enterprise',
        'periodo' => 'Anual',
        'proximo_pagamento' => '2027-01-01'
    ],
    3 => [
        'id' => 3,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Instituição',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_email' => 'financas@itl.ao',
        'cliente_telefone' => '+244 222 456 789',
        'valor' => 125000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Depósito Bancário',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-18 09:00:00',
        'descricao' => 'Institucional Pro - Trimestral',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-003',
        'comprovativo' => null,
        'notas' => 'Pagamento pendente. Foi enviado o comprovativo por email.',
        'plano' => 'Institucional Pro',
        'periodo' => 'Trimestral',
        'proximo_pagamento' => '2026-05-15'
    ],
    4 => [
        'id' => 4,
        'cliente' => 'Ana Costa',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-2.png',
        'cliente_email' => 'ana.costa@email.com',
        'cliente_telefone' => '+244 923 567 890',
        'valor' => 15000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Cartão de Crédito',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-17 16:30:00',
        'descricao' => 'Básico - Mensalidade',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-004',
        'comprovativo' => 'comp-004.pdf',
        'notas' => 'Pagamento automático via cartão de crédito.',
        'plano' => 'Básico',
        'periodo' => 'Mensal',
        'proximo_pagamento' => '2026-03-17'
    ],
    5 => [
        'id' => 5,
        'cliente' => 'Mineração Progresso',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-7.png',
        'cliente_email' => 'contabilidade@mineracaoprogresso.ao',
        'cliente_telefone' => '+244 222 567 890',
        'valor' => 250000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-17 14:20:00',
        'descricao' => 'Enterprise Pro - Anual',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-005',
        'comprovativo' => 'comp-005.pdf',
        'notas' => 'Empresa do setor de mineração. Contrato assinado em Janeiro.',
        'plano' => 'Enterprise Pro',
        'periodo' => 'Anual',
        'proximo_pagamento' => '2027-02-17'
    ],
    6 => [
        'id' => 6,
        'cliente' => 'Energia Futuro',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-8.png',
        'cliente_email' => 'financas@energiafuturo.ao',
        'cliente_telefone' => '+244 222 678 901',
        'valor' => 45000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Multicaixa',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-17 11:00:00',
        'descricao' => 'Empresarial - Mensalidade',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-006',
        'comprovativo' => null,
        'notas' => 'Cliente aguardando aprovação do pagamento.',
        'plano' => 'Empresarial',
        'periodo' => 'Mensal',
        'proximo_pagamento' => '2026-03-17'
    ],
    7 => [
        'id' => 7,
        'cliente' => 'Pedro Santos',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-3.png',
        'cliente_email' => 'pedro.santos@email.com',
        'cliente_telefone' => '+244 923 678 901',
        'valor' => 8000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-16 15:00:00',
        'descricao' => 'Comissão - Indicação',
        'categoria' => 'Comissões',
        'referencia' => 'TRX-007',
        'comprovativo' => 'comp-007.pdf',
        'notas' => 'Comissão paga pela indicação de novo cliente (Construtora ABC).',
        'plano' => null,
        'periodo' => null,
        'proximo_pagamento' => null
    ],
    8 => [
        'id' => 8,
        'cliente' => 'Construtora Silva',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-2.png',
        'cliente_email' => 'financeiro@construtorasilva.ao',
        'cliente_telefone' => '+244 222 789 012',
        'valor' => 120000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-16 10:30:00',
        'descricao' => 'Projeto Topográfico - Zona Norte',
        'categoria' => 'Projetos',
        'referencia' => 'TRX-008',
        'comprovativo' => 'comp-008.pdf',
        'notas' => 'Pagamento referente à primeira fase do projeto de topografia.',
        'plano' => null,
        'periodo' => null,
        'proximo_pagamento' => '2026-03-16'
    ],
    9 => [
        'id' => 9,
        'cliente' => 'Instituto Geográfico',
        'cliente_tipo' => 'Instituição',
        'cliente_avatar' => 'instituicao-2.png',
        'cliente_email' => 'financas@igeo.ao',
        'cliente_telefone' => '+244 222 890 123',
        'valor' => 35000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Depósito Bancário',
        'status' => 'cancelado',
        'status_label' => 'Cancelado',
        'data' => '2026-02-15 09:00:00',
        'descricao' => 'Licenciamento GIS',
        'categoria' => 'Licenças',
        'referencia' => 'TRX-009',
        'comprovativo' => null,
        'notas' => 'Transação cancelada por solicitação do cliente. Reembolso emitido.',
        'plano' => null,
        'periodo' => null,
        'proximo_pagamento' => null
    ],
    10 => [
        'id' => 10,
        'cliente' => 'Mário Ferreira',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-4.png',
        'cliente_email' => 'mario.ferreira@email.com',
        'cliente_telefone' => '+244 923 901 234',
        'valor' => 12000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'metodo' => 'Multicaixa',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-15 08:00:00',
        'descricao' => 'Reembolso - Deslocação',
        'categoria' => 'Reembolsos',
        'referencia' => 'TRX-010',
        'comprovativo' => null,
        'notas' => 'Reembolso de despesas de deslocação para o projeto da Zona Norte.',
        'plano' => null,
        'periodo' => null,
        'proximo_pagamento' => null
    ],
];

// ===== OBTER TRANSAÇÃO ATUAL =====
$transacao = isset($transacoes[$id_transacao]) ? $transacoes[$id_transacao] : $transacoes[1];

// ===== LISTA DE CLIENTES PARA O SELECT =====
$clientes = [
    ['id' => 1, 'nome' => 'Carlos Mendes', 'tipo' => 'Profissional'],
    ['id' => 2, 'nome' => 'Construtora ABC', 'tipo' => 'Empresa'],
    ['id' => 3, 'nome' => 'Instituto Técnico de Luanda', 'tipo' => 'Instituição'],
    ['id' => 4, 'nome' => 'Ana Costa', 'tipo' => 'Profissional'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresa'],
    ['id' => 6, 'nome' => 'Energia Futuro', 'tipo' => 'Empresa'],
    ['id' => 7, 'nome' => 'Pedro Santos', 'tipo' => 'Profissional'],
    ['id' => 8, 'nome' => 'Construtora Silva', 'tipo' => 'Empresa'],
    ['id' => 9, 'nome' => 'Instituto Geográfico', 'tipo' => 'Instituição'],
    ['id' => 10, 'nome' => 'Mário Ferreira', 'tipo' => 'Profissional'],
];

// ===== FUNÇÕES AUXILIARES =====
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y', strtotime($date));
}

function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i', strtotime($datetime));
}

function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

function getTipoIcon($tipo) {
    return $tipo === 'receita' ? 'fa-arrow-up' : 'fa-arrow-down';
}

// ===== DADOS PARA O FORMULÁRIO =====
$total_transacoes = count($transacoes);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus | <?php echo $titulo_pagina; ?></title>
    
    <!-- ===== FONTES ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- ===== FONT AWESOME ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- ===== CSS PRINCIPAL ===== -->
    <link rel="stylesheet" href="../../../assets/css/base.css">
    <link rel="stylesheet" href="../../../assets/css/admin.css">
    <link rel="stylesheet" href="../../../assets/css/components.css">
    <link rel="stylesheet" href="../../../assets/css/responsive.css">
    
    <!-- ===== FAVICON ===== -->
    <link rel="icon" type="image/png" href="../../../assets/images/favicon.png">
</head>
<body>
<div class="app-container">
    <div id="toast-container" class="toast-container"></div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ========================================== -->
    <!-- SIDEBAR FINANCEIRO                         -->
    <!-- ========================================== -->
    <?php include "../../../includes/admin-financeiro-sidebar.php"; ?>

    <!-- ========================================== -->
    <!-- MAIN CONTENT                              -->
    <!-- ========================================== -->
    <main class="main-content">
        <!-- ===== PAGE HEADER ===== -->
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-edit icon" style="color: #FFD93D;"></i>
                    <?php echo $titulo_pagina; ?>
                    <span class="badge-status status-<?php echo $transacao['status']; ?>" style="font-size: 14px; padding: 4px 16px; display: inline-flex; align-items: center; gap: 6px;">
                        <span class="status-dot"></span>
                        <?php echo $transacao['status_label']; ?>
                    </span>
                </h1>
                <p class="breadcrumb">
                    <a href="../../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Financeiro</a>
                    <span class="separator">/</span>
                    <a href="transacoes.php">Transações</a>
                    <span class="separator">/</span>
                    <span>#<?php echo $transacao['referencia']; ?></span>
                    <span class="separator">/</span>
                    <span>Editar</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>
                    <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                <div class="header-actions">
                    <button type="submit" form="formEditarTransacao" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar Alterações
                    </button>
                    <a href="transacao-detalhe.php?id=<?php echo $transacao['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                    <a href="transacao-excluir.php?id=<?php echo $transacao['id']; ?>" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Excluir
                    </a>
                </div>
            </div>
        </header>

        <!-- ========================================== -->
        <!-- FORMULÁRIO DE EDIÇÃO                      -->
        <!-- ========================================== -->
        <div class="editar-container">
            <div class="editar-grid">
                <!-- Coluna Principal -->
                <div class="editar-coluna-principal">
                    <!-- Card: Formulário -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-edit"></i> Dados da Transação</h3>
                            <span class="referencia-label">Ref: <?php echo $transacao['referencia']; ?></span>
                        </div>
                        <div class="editar-card-body">
                            <form id="formEditarTransacao" onsubmit="salvarEdicao(event)">
                                <input type="hidden" id="transacaoId" value="<?php echo $transacao['id']; ?>">
                                
                                <!-- Cliente -->
                                <div class="form-group">
                                    <label class="form-label">Cliente <span class="required">*</span></label>
                                    <select class="form-control" id="clienteTransacao" required>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <option value="<?php echo $cliente['id']; ?>" 
                                                    <?php echo ($cliente['nome'] === $transacao['cliente']) ? 'selected' : ''; ?>>
                                                <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Descrição -->
                                <div class="form-group">
                                    <label class="form-label">Descrição <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="descricaoTransacao" 
                                           value="<?php echo $transacao['descricao']; ?>" 
                                           placeholder="Descrição da transação" required>
                                </div>

                                <!-- Linha: Valor + Tipo -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Valor <span class="required">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Kz</span>
                                            <input type="number" class="form-control" id="valorTransacao" 
                                                   value="<?php echo $transacao['valor']; ?>" 
                                                   placeholder="0" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tipo <span class="required">*</span></label>
                                        <select class="form-control" id="tipoTransacao" required>
                                            <option value="receita" <?php echo ($transacao['tipo'] === 'receita') ? 'selected' : ''; ?>>Receita</option>
                                            <option value="despesa" <?php echo ($transacao['tipo'] === 'despesa') ? 'selected' : ''; ?>>Despesa</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Linha: Método + Status -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Método</label>
                                        <select class="form-control" id="metodoTransacao">
                                            <option value="Multicaixa" <?php echo ($transacao['metodo'] === 'Multicaixa') ? 'selected' : ''; ?>>Multicaixa</option>
                                            <option value="Transferência Bancária" <?php echo ($transacao['metodo'] === 'Transferência Bancária') ? 'selected' : ''; ?>>Transferência Bancária</option>
                                            <option value="Cartão de Crédito" <?php echo ($transacao['metodo'] === 'Cartão de Crédito') ? 'selected' : ''; ?>>Cartão de Crédito</option>
                                            <option value="Depósito Bancário" <?php echo ($transacao['metodo'] === 'Depósito Bancário') ? 'selected' : ''; ?>>Depósito Bancário</option>
                                            <option value="Numerário" <?php echo ($transacao['metodo'] === 'Numerário') ? 'selected' : ''; ?>>Numerário</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" id="statusTransacao">
                                            <option value="concluido" <?php echo ($transacao['status'] === 'concluido') ? 'selected' : ''; ?>>Concluído</option>
                                            <option value="pendente" <?php echo ($transacao['status'] === 'pendente') ? 'selected' : ''; ?>>Pendente</option>
                                            <option value="cancelado" <?php echo ($transacao['status'] === 'cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Categoria -->
                                <div class="form-group">
                                    <label class="form-label">Categoria</label>
                                    <select class="form-control" id="categoriaTransacao">
                                        <option value="Assinaturas" <?php echo ($transacao['categoria'] === 'Assinaturas') ? 'selected' : ''; ?>>Assinaturas</option>
                                        <option value="Projetos" <?php echo ($transacao['categoria'] === 'Projetos') ? 'selected' : ''; ?>>Projetos</option>
                                        <option value="Licenças" <?php echo ($transacao['categoria'] === 'Licenças') ? 'selected' : ''; ?>>Licenças</option>
                                        <option value="Comissões" <?php echo ($transacao['categoria'] === 'Comissões') ? 'selected' : ''; ?>>Comissões</option>
                                        <option value="Reembolsos" <?php echo ($transacao['categoria'] === 'Reembolsos') ? 'selected' : ''; ?>>Reembolsos</option>
                                        <option value="Outros" <?php echo ($transacao['categoria'] === 'Outros') ? 'selected' : ''; ?>>Outros</option>
                                    </select>
                                </div>

                                <!-- Data -->
                                <div class="form-group">
                                    <label class="form-label">Data da Transação</label>
                                    <input type="datetime-local" class="form-control" id="dataTransacao" 
                                           value="<?php echo date('Y-m-d\TH:i', strtotime($transacao['data'])); ?>">
                                </div>

                                <!-- Notas -->
                                <div class="form-group">
                                    <label class="form-label">Notas</label>
                                    <textarea class="form-control" id="notasTransacao" rows="3" 
                                              placeholder="Notas adicionais sobre a transação"><?php echo $transacao['notas'] ?? ''; ?></textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Card: Detalhes da Assinatura (se aplicável) -->
                    <?php if (isset($transacao['plano']) && $transacao['plano']): ?>
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-crown"></i> Detalhes da Assinatura</h3>
                        </div>
                        <div class="editar-card-body">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Plano</label>
                                    <input type="text" class="form-control" value="<?php echo $transacao['plano']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Período</label>
                                    <input type="text" class="form-control" value="<?php echo $transacao['periodo']; ?>" disabled>
                                </div>
                            </div>
                            <?php if ($transacao['proximo_pagamento']): ?>
                            <div class="form-group">
                                <label class="form-label">Próximo Pagamento</label>
                                <input type="text" class="form-control" value="<?php echo formatDate($transacao['proximo_pagamento']); ?>" disabled>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Coluna Lateral -->
                <div class="editar-coluna-lateral">
                    <!-- Card: Resumo -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-info-circle"></i> Resumo</h3>
                        </div>
                        <div class="editar-card-body">
                            <div class="resumo-item">
                                <span class="resumo-label">Referência</span>
                                <span class="resumo-value" style="font-family: 'Orbitron', sans-serif; color: #FFD93D;">
                                    <?php echo $transacao['referencia']; ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Data de Criação</span>
                                <span class="resumo-value"><?php echo formatDateTime($transacao['data']); ?></span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Cliente</span>
                                <span class="resumo-value"><?php echo $transacao['cliente']; ?></span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Valor</span>
                                <span class="resumo-value valor <?php echo $transacao['tipo'] === 'receita' ? 'valor-receita' : 'valor-despesa'; ?>" style="font-size: 18px; font-weight: 700;">
                                    <?php echo $transacao['tipo'] === 'receita' ? '+' : '-'; ?>
                                    Kz <?php echo formatMoney($transacao['valor']); ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Status</span>
                                <span class="badge-status status-<?php echo $transacao['status']; ?>">
                                    <span class="status-dot"></span>
                                    <?php echo $transacao['status_label']; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Comprovativo -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-file-pdf"></i> Comprovativo</h3>
                        </div>
                        <div class="editar-card-body">
                            <?php if ($transacao['comprovativo']): ?>
                                <div class="comprovativo-info">
                                    <i class="fas fa-file-pdf" style="color: #FF6B6B; font-size: 24px;"></i>
                                    <div>
                                        <span class="comprovativo-nome"><?php echo $transacao['comprovativo']; ?></span>
                                        <div class="comprovativo-acoes">
                                            <button class="btn btn-sm btn-outline" onclick="verComprovativo('<?php echo $transacao['comprovativo']; ?>')">
                                                <i class="fas fa-eye"></i> Visualizar
                                            </button>
                                            <button class="btn btn-sm btn-outline" onclick="baixarComprovativo('<?php echo $transacao['comprovativo']; ?>')">
                                                <i class="fas fa-download"></i> Baixar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="comprovativo-vazio">
                                    <i class="fas fa-file-pdf" style="color: var(--text-muted); font-size: 32px;"></i>
                                    <p>Nenhum comprovativo anexado</p>
                                    <button class="btn btn-sm btn-outline" onclick="anexarComprovativo()">
                                        <i class="fas fa-upload"></i> Anexar Comprovativo
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Card: Ações -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-tools"></i> Ações</h3>
                        </div>
                        <div class="editar-card-body">
                            <div class="acoes-lista">
                                <button class="btn btn-primary" style="width: 100%; justify-content: center;" onclick="document.getElementById('formEditarTransacao').submit()">
                                    <i class="fas fa-save"></i> Salvar Alterações
                                </button>
                                <a href="transacao-detalhe.php?id=<?php echo $transacao['id']; ?>" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                                <a href="transacao-excluir.php?id=<?php echo $transacao['id']; ?>" class="btn btn-danger" style="width: 100%; justify-content: center;">
                                    <i class="fas fa-trash"></i> Excluir Transação
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- ========================================== -->
<!-- SCRIPTS                                    -->
<!-- ========================================== -->
<script src="../../../assets/js/main.js"></script>
<script>
// ==========================================
// TOGGLE SIDEBAR
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

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal.active').forEach(modal => {
                fecharModal(modal.id);
            });
        }
    });
});

// ==========================================
// TOGGLE SIDEBAR MOBILE
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
            icon.className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
        }
    }
}

document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('bottomMenuToggle');

    if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
        if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
            sidebar.classList.remove('open');
            document.getElementById('sidebarOverlay')?.classList.remove('active');
            if (menuBtn) {
                const icon = menuBtn.querySelector('i');
                if (icon) icon.className = 'fas fa-bars';
            }
        }
    }
});

// ==========================================
// NOTIFICAÇÕES
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
        badge.textContent = naoLidas;
        badge.style.display = naoLidas > 0 ? 'flex' : 'none';
    }

    if (bottomBadge) {
        bottomBadge.textContent = naoLidas;
        bottomBadge.style.display = naoLidas > 0 ? 'flex' : 'none';
    }
}

function closeNotifications() {
    const dropdown = document.getElementById('notificacoesDropdown');
    if (dropdown) {
        dropdown.classList.remove('active');
    }
}

// ==========================================
// PERFIL
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
                themeLabel.innerHTML = newTheme === 'dark' ?
                    '<i class="fas fa-moon"></i> Tema Escuro' :
                    '<i class="fas fa-sun"></i> Tema Claro';
            }

            mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
        });
    }
})();

// ==========================================
// TOAST
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
// SALVAR EDIÇÃO
// ==========================================
function salvarEdicao(event) {
    event.preventDefault();

    const id = document.getElementById('transacaoId').value;
    const descricao = document.getElementById('descricaoTransacao').value;
    const valor = document.getElementById('valorTransacao').value;

    if (!descricao || !valor) {
        mostrarToast('Preencha todos os campos obrigatórios!', 'error');
        return;
    }

    mostrarToast('Transação #' + id + ' atualizada com sucesso!', 'success');

    setTimeout(() => {
        window.location.href = 'transacao-detalhe.php?id=' + id;
    }, 1500);
}

// ==========================================
// COMPROVATIVO
// ==========================================
function verComprovativo(nome) {
    mostrarToast('A abrir comprovativo: ' + nome, 'info');
}

function baixarComprovativo(nome) {
    mostrarToast('A baixar comprovativo: ' + nome, 'info');
}

function anexarComprovativo() {
    mostrarToast('Abrindo seletor de arquivos...', 'info');
    setTimeout(() => {
        mostrarToast('Comprovativo anexado com sucesso!', 'success');
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
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}
</script>

<style>
/* ========================================== */
/* EDITAR TRANSAÇÃO - CSS                     */
/* ========================================== */

/* ===== CONTAINER ===== */
.editar-container {
    margin-bottom: var(--space-lg);
}

.editar-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: var(--space-lg);
}

/* ===== CARDS ===== */
.editar-card {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border-color);
    overflow: hidden;
    margin-bottom: var(--space-lg);
    transition: var(--transition-smooth);
}

.editar-card:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.editar-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
}

.editar-card-header h3 {
    font-family: var(--font-title);
    font-size: var(--text-h4);
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.editar-card-header h3 i {
    color: #FFD93D;
}

.editar-card-header .referencia-label {
    font-size: var(--text-sm);
    color: var(--text-muted);
    font-weight: 500;
}

.editar-card-body {
    padding: 20px;
}

/* ===== FORMULÁRIO ===== */
.form-group {
    margin-bottom: var(--space-md);
}

.form-group:last-child {
    margin-bottom: 0;
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

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-md);
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
    box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
}

.form-control::placeholder {
    color: var(--text-muted);
}

.form-control:disabled {
    opacity: 0.6;
    cursor: not-allowed;
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
    padding: 8px;
}

textarea.form-control {
    resize: vertical;
    min-height: 80px;
    font-family: var(--font-body);
}

/* ===== INPUT GROUP ===== */
.input-group {
    display: flex;
    align-items: center;
}

.input-group .input-group-text {
    background: var(--bg-input);
    border: 1px solid var(--border-color);
    border-right: none;
    border-radius: var(--radius-sm) 0 0 var(--radius-sm);
    padding: 8px 12px;
    font-size: var(--text-sm);
    color: var(--text-muted);
    white-space: nowrap;
}

.input-group .form-control {
    border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
}

/* ===== RESUMO ===== */
.resumo-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid var(--border-color);
}

.resumo-item:last-child {
    border-bottom: none;
}

.resumo-item .resumo-label {
    font-size: var(--text-sm);
    color: var(--text-muted);
}

.resumo-item .resumo-value {
    font-size: var(--text-sm);
    color: var(--text-primary);
    font-weight: 500;
}

/* ===== BADGES ===== */
.badge-tipo {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 3px 12px;
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
    padding: 3px 12px;
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

/* ===== COMPROVATIVO ===== */
.comprovativo-info {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-sm);
    background: var(--bg-input);
    border-radius: var(--radius-sm);
}

.comprovativo-info .comprovativo-nome {
    font-size: var(--text-sm);
    color: var(--text-primary);
    font-weight: 500;
}

.comprovativo-acoes {
    display: flex;
    gap: var(--space-xs);
    margin-top: 4px;
}

.comprovativo-vazio {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-lg) 0;
    text-align: center;
}

.comprovativo-vazio p {
    font-size: var(--text-sm);
    color: var(--text-muted);
    margin: 0;
}

/* ===== AÇÕES ===== */
.acoes-lista {
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}

.acoes-lista .btn {
    justify-content: center;
}

/* ========================================== */
/* RESPONSIVIDADE                             */
/* ========================================== */

@media (max-width: 1024px) {
    .editar-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
        gap: var(--space-sm);
    }
    
    .editar-card-header {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--space-sm);
    }
    
    .header-actions {
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
    }

    .page-header h1 {
        font-size: var(--text-h3);
        flex-wrap: wrap;
    }
    
    .page-header h1 .badge-status {
        font-size: 12px;
        padding: 2px 12px;
    }
}

@media (max-width: 480px) {
    .editar-card-body {
        padding: 14px;
    }
    
    .editar-card-header {
        padding: 12px 14px;
    }
    
    .comprovativo-info {
        flex-direction: column;
        text-align: center;
    }
    
    .comprovativo-acoes {
        justify-content: center;
    }
}
</style>
</body>
</html>