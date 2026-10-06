<?php
// painel/admin/financeiro/transacao-excluir.php - Excluir Transação
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Excluir Transação';
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

// ===== MOTIVOS PARA EXCLUSÃO =====
$motivos_exclusao = [
    'duplicado' => 'Transação duplicada',
    'erro' => 'Erro no registro da transação',
    'cancelado' => 'Transação cancelada pelo cliente',
    'reembolso' => 'Reembolso realizado',
    'teste' => 'Transação de teste',
    'outro' => 'Outro motivo'
];

// ===== FUNÇÕES AUXILIARES =====
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
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
                    <i class="fas fa-trash-alt icon" style="color: #FF6B6B;"></i>
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
                    <span style="color: #FF6B6B;">Excluir</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>



                <div class="header-actions">
                    <button type="submit" form="formExcluirTransacao" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Confirmar Exclusão
                    </button>
                    <a href="transacao-detalhe.php?id=<?php echo $transacao['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </div>
        </header>

        <!-- ========================================== -->
        <!-- CONTEÚDO PRINCIPAL                        -->
        <!-- ========================================== -->
        <div class="excluir-container">
            <div class="excluir-grid">
                <!-- Coluna Principal -->
                <div class="excluir-coluna-principal">
                    <!-- Card: Aviso de Exclusão -->
                    <div class="excluir-card excluir-card-danger">
                        <div class="excluir-card-header">
                            <h3><i class="fas fa-exclamation-triangle" style="color: #FF6B6B;"></i> Atenção!</h3>
                        </div>
                        <div class="excluir-card-body">
                            <div class="aviso-container">
                                <i class="fas fa-trash-alt aviso-icon"></i>
                                <p class="aviso-texto">
                                    <strong>Esta ação não pode ser desfeita.</strong>
                                </p>
                                <p class="aviso-detalhe">
                                    Você está prestes a excluir permanentemente a transação 
                                    <strong><?php echo $transacao['referencia']; ?></strong> 
                                    do cliente <strong><?php echo $transacao['cliente']; ?></strong>.
                                </p>
                                <p class="aviso-detalhe">
                                    Todos os dados associados a esta transação serão removidos do sistema.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Formulário de Exclusão -->
                    <div class="excluir-card">
                        <div class="excluir-card-header">
                            <h3><i class="fas fa-edit"></i> Motivo da Exclusão</h3>
                            <span class="obrigatorio-label">* Campos obrigatórios</span>
                        </div>
                        <div class="excluir-card-body">
                            <form id="formExcluirTransacao" onsubmit="confirmarExclusao(event)">
                                <input type="hidden" id="transacaoId" value="<?php echo $transacao['id']; ?>">
                                
                                <!-- Motivo -->
                                <div class="form-group">
                                    <label class="form-label">Motivo da Exclusão <span class="required">*</span></label>
                                    <select class="form-control" id="motivoExclusao" required>
                                        <option value="">Selecione um motivo...</option>
                                        <?php foreach ($motivos_exclusao as $key => $label): ?>
                                            <option value="<?php echo $key; ?>"><?php echo $label; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Descrição do Motivo -->
                                <div class="form-group">
                                    <label class="form-label">Descrição do Motivo <span class="required">*</span></label>
                                    <textarea class="form-control" id="descricaoMotivo" rows="4" 
                                              placeholder="Explique detalhadamente o motivo da exclusão..." required></textarea>
                                    <small class="form-text">Mínimo de 10 caracteres. Descreva com clareza o motivo.</small>
                                </div>

                                <!-- Confirmar -->
                                <div class="form-group">
                                    <label class="form-label" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                        <input type="checkbox" id="confirmarExclusao" required style="width: 18px; height: 18px; accent-color: #FF6B6B; cursor: pointer;">
                                        <span>Confirmo que pretendo excluir esta transação <span class="required">*</span></span>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Coluna Lateral -->
                <div class="excluir-coluna-lateral">
                    <!-- Card: Resumo da Transação -->
                    <div class="excluir-card">
                        <div class="excluir-card-header">
                            <h3><i class="fas fa-info-circle"></i> Resumo da Transação</h3>
                        </div>
                        <div class="excluir-card-body">
                            <div class="resumo-item">
                                <span class="resumo-label">Referência</span>
                                <span class="resumo-value" style="font-family: 'Orbitron', sans-serif; color: #FFD93D;">
                                    <?php echo $transacao['referencia']; ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Cliente</span>
                                <span class="resumo-value">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <img src="../../../assets/images/<?php echo $transacao['cliente_avatar']; ?>" 
                                             alt="<?php echo $transacao['cliente']; ?>"
                                             onerror="this.src='<?php echo getAvatarUrl($transacao['cliente']); ?>'"
                                             style="width: 24px; height: 24px; border-radius: 50%; object-fit: cover;">
                                        <?php echo $transacao['cliente']; ?>
                                    </div>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Descrição</span>
                                <span class="resumo-value"><?php echo $transacao['descricao']; ?></span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Valor</span>
                                <span class="resumo-value valor <?php echo $transacao['tipo'] === 'receita' ? 'valor-receita' : 'valor-despesa'; ?>" style="font-weight: 700;">
                                    <?php echo $transacao['tipo'] === 'receita' ? '+' : '-'; ?>
                                    Kz <?php echo formatMoney($transacao['valor']); ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Tipo</span>
                                <span class="badge-tipo badge-<?php echo $transacao['tipo']; ?>">
                                    <i class="fas <?php echo getTipoIcon($transacao['tipo']); ?>"></i>
                                    <?php echo $transacao['tipo_label']; ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Status</span>
                                <span class="badge-status status-<?php echo $transacao['status']; ?>">
                                    <span class="status-dot"></span>
                                    <?php echo $transacao['status_label']; ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Data</span>
                                <span class="resumo-value"><?php echo formatDateTime($transacao['data']); ?></span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Categoria</span>
                                <span class="badge-categoria"><?php echo $transacao['categoria']; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Ações Rápidas -->
                    <div class="excluir-card">
                        <div class="excluir-card-header">
                            <h3><i class="fas fa-tools"></i> Ações</h3>
                        </div>
                        <div class="excluir-card-body">
                            <div class="acoes-lista">
                                <button class="btn btn-danger" style="width: 100%; justify-content: center;" onclick="document.getElementById('formExcluirTransacao').submit()">
                                    <i class="fas fa-trash"></i> Confirmar Exclusão
                                </button>
                                <a href="transacao-detalhe.php?id=<?php echo $transacao['id']; ?>" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                                <a href="transacao-editar.php?id=<?php echo $transacao['id']; ?>" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                    <i class="fas fa-edit"></i> Editar Transação
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
            fecharModal();
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
// CONFIRMAR EXCLUSÃO
// ==========================================
function confirmarExclusao(event) {
    event.preventDefault();

    const id = document.getElementById('transacaoId').value;
    const motivo = document.getElementById('motivoExclusao').value;
    const descricao = document.getElementById('descricaoMotivo').value;
    const confirmar = document.getElementById('confirmarExclusao').checked;

    if (!motivo) {
        mostrarToast('Por favor, selecione um motivo para a exclusão.', 'error');
        document.getElementById('motivoExclusao').focus();
        return;
    }

    if (!descricao || descricao.length < 10) {
        mostrarToast('Por favor, descreva o motivo com pelo menos 10 caracteres.', 'error');
        document.getElementById('descricaoMotivo').focus();
        return;
    }

    if (!confirmar) {
        mostrarToast('Por favor, confirme que pretende excluir esta transação.', 'error');
        document.getElementById('confirmarExclusao').focus();
        return;
    }

    // Simular exclusão
    mostrarToast('A excluir transação #' + id + '...', 'info');

    setTimeout(() => {
        mostrarToast('Transação #' + id + ' excluída com sucesso!', 'success');
        setTimeout(() => {
            window.location.href = 'transacoes.php';
        }, 1500);
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
/* EXCLUIR TRANSAÇÃO - CSS                    */
/* ========================================== */

/* ===== CONTAINER ===== */
.excluir-container {
    margin-bottom: var(--space-lg);
}

.excluir-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: var(--space-lg);
}

/* ===== CARDS ===== */
.excluir-card {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border-color);
    overflow: hidden;
    margin-bottom: var(--space-lg);
    transition: var(--transition-smooth);
}

.excluir-card:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.excluir-card.excluir-card-danger {
    border-color: rgba(255, 107, 107, 0.3);
    background: rgba(255, 107, 107, 0.05);
}

.excluir-card.excluir-card-danger .excluir-card-header {
    border-bottom-color: rgba(255, 107, 107, 0.2);
}

.excluir-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
}

.excluir-card-header h3 {
    font-family: var(--font-title);
    font-size: var(--text-h4);
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.excluir-card-header h3 i {
    color: #FFD93D;
}

.excluir-card-header .obrigatorio-label {
    font-size: var(--text-xs);
    color: var(--text-muted);
}

.excluir-card-body {
    padding: 20px;
}

/* ===== AVISO ===== */
.aviso-container {
    text-align: center;
    padding: var(--space-md) 0;
}

.aviso-icon {
    font-size: 56px;
    color: #FF6B6B;
    margin-bottom: var(--space-md);
    display: block;
}

.aviso-texto {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--space-sm);
}

.aviso-detalhe {
    font-size: var(--text-sm);
    color: var(--text-secondary);
    line-height: 1.8;
    margin: 4px 0;
}

.aviso-detalhe strong {
    color: var(--text-primary);
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
    border-color: #FF6B6B;
    box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.15);
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

select.form-control option {
    background: var(--bg-card);
    color: var(--text-primary);
    padding: 8px;
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
    font-family: var(--font-body);
}

.form-text {
    display: block;
    font-size: var(--text-xs);
    color: var(--text-muted);
    margin-top: 4px;
}

/* ===== CHECKBOX ===== */
.form-group label input[type="checkbox"] {
    accent-color: #FF6B6B;
    cursor: pointer;
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
    text-align: right;
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

.badge-categoria {
    display: inline-block;
    padding: 2px 10px;
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 500;
    background: rgba(108, 43, 217, 0.12);
    color: #6C2BD9;
}

[data-theme="light"] .badge-categoria {
    background: rgba(108, 43, 217, 0.08);
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
    .excluir-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .excluir-card-header {
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

    .aviso-icon {
        font-size: 40px;
    }

    .aviso-texto {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .excluir-card-body {
        padding: 14px;
    }
    
    .excluir-card-header {
        padding: 12px 14px;
    }

    .aviso-icon {
        font-size: 32px;
    }

    .aviso-texto {
        font-size: 14px;
    }

    .aviso-detalhe {
        font-size: var(--text-xs);
    }

    .resumo-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 2px;
    }

    .resumo-item .resumo-value {
        text-align: left;
        width: 100%;
    }
}
</style>
</body>
</html>