<?php
// painel/admin/financeiro/pagamento-detalhe.php - Detalhe do Pagamento
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Detalhe do Pagamento';
$pagina_atual = 'pagamentos';

// ===== OBTER ID DO PAGAMENTO =====
$id_pagamento = isset($_GET['id']) ? (int)$_GET['id'] : 1;


// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE PAGAMENTOS =====
$pagamentos = [
    1 => [
        'id' => 1,
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-1.png',
        'cliente_email' => 'carlos.mendes@email.com',
        'cliente_telefone' => '+244 923 456 789',
        'cliente_endereco' => 'Rua 15, Nº 245, Luanda',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'status' => 'pago',
        'status_label' => 'Pago',
        'data' => '2026-02-15 10:30:00',
        'referencia' => 'PAY-001',
        'descricao' => 'Mensalidade - Plano Pro',
        'categoria' => 'Assinatura',
        'comprovativo' => 'comp-001.pdf',
        'assinatura_id' => 1,
        'plano' => 'Pro',
        'periodo' => 'Mensal',
        'proximo_pagamento' => '2026-03-15',
        'created_at' => '2026-02-15 10:30:00',
        'updated_at' => '2026-02-15 10:35:00',
        'notas' => 'Pagamento confirmado. Cliente com bom histórico.',
        'transacao_id' => 'TXN-001'
    ],
    2 => [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_email' => 'financeiro@construtoraabc.ao',
        'cliente_telefone' => '+244 222 345 678',
        'cliente_endereco' => 'Av. 4 de Fevereiro, Nº 100, Luanda',
        'valor' => 250000,
        'metodo' => 'Transferência Bancária',
        'status' => 'pago',
        'status_label' => 'Pago',
        'data' => '2026-02-01 09:45:00',
        'referencia' => 'PAY-002',
        'descricao' => 'Mensalidade - Plano Enterprise',
        'categoria' => 'Assinatura',
        'comprovativo' => 'comp-002.pdf',
        'assinatura_id' => 2,
        'plano' => 'Enterprise',
        'periodo' => 'Mensal',
        'proximo_pagamento' => '2026-03-01',
        'created_at' => '2026-02-01 09:45:00',
        'updated_at' => '2026-02-01 10:00:00',
        'notas' => 'Pagamento via transferência bancária. Empresa parceira.',
        'transacao_id' => 'TXN-002'
    ],
    3 => [
        'id' => 3,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_email' => 'financas@itl.ao',
        'cliente_telefone' => '+244 222 456 789',
        'cliente_endereco' => 'Rua do Comércio, Nº 50, Luanda',
        'valor' => 125000,
        'metodo' => 'Depósito Bancário',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-15 08:00:00',
        'referencia' => 'PAY-003',
        'descricao' => 'Trimestral - Plano Educação',
        'categoria' => 'Assinatura',
        'comprovativo' => null,
        'assinatura_id' => 4,
        'plano' => 'Educação',
        'periodo' => 'Trimestral',
        'proximo_pagamento' => '2026-05-15',
        'created_at' => '2026-02-15 08:00:00',
        'updated_at' => '2026-02-15 08:00:00',
        'notas' => 'Aguardando comprovativo de pagamento.',
        'transacao_id' => 'TXN-003'
    ],
];

// ===== OBTER PAGAMENTO ATUAL =====
$pagamento = isset($pagamentos[$id_pagamento]) ? $pagamentos[$id_pagamento] : $pagamentos[1];

// ===== HISTÓRICO DE ATIVIDADES =====
$historico = [
    [
        'data' => '2026-02-15 10:30:00',
        'acao' => 'Pagamento criado',
        'usuario' => 'Sistema',
        'detalhes' => 'Pagamento registado automaticamente'
    ],
    [
        'data' => '2026-02-15 10:32:00',
        'acao' => 'Comprovativo anexado',
        'usuario' => 'Administrador',
        'detalhes' => 'Comprovativo comp-001.pdf anexado'
    ],
    [
        'data' => '2026-02-15 10:35:00',
        'acao' => 'Status atualizado',
        'usuario' => 'Administrador',
        'detalhes' => 'Status alterado de "Pendente" para "Pago"'
    ],
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

function getStatusIcon($status) {
    $icons = [
        'pago' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'falhou' => 'fa-exclamation-circle',
        'cancelado' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}

function getStatusColor($status) {
    $colors = [
        'pago' => '#00FFA3',
        'pendente' => '#FFD93D',
        'falhou' => '#FF6B6B',
        'cancelado' => '#6B7A8F'
    ];
    return $colors[$status] ?? '#6B7A8F';
}

function getTipoClienteIcon($tipo) {
    $icons = [
        'Individual' => 'fa-user',
        'Empresarial' => 'fa-building',
        'Institucional' => 'fa-university'
    ];
    return $icons[$tipo] ?? 'fa-user';
}

function getTipoClienteColor($tipo) {
    $colors = [
        'Individual' => '#00D2FF',
        'Empresarial' => '#FF6B6B',
        'Institucional' => '#FFD93D'
    ];
    return $colors[$tipo] ?? '#6B7A8F';
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
        <?php include "../../../includes/admin-financeiro-sidebar.php"; ?>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-credit-card icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status status-<?php echo $pagamento['status']; ?>" style="font-size: 14px; padding: 4px 16px; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                            <?php echo $pagamento['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="pagamentos.php">Pagamentos</a>
                        <span class="separator">/</span>
                        <span><?php echo $pagamento['referencia']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                       <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <?php if ($pagamento['status'] === 'pendente'): ?>
                            <a href="pagamento-aprovar.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-success">
                                <i class="fas fa-check"></i> Aprovar
                            </a>
                            <a href="pagamento-rejeitar.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-danger">
                                <i class="fas fa-times"></i> Rejeitar
                            </a>
                        <?php endif; ?>
                        <?php if ($pagamento['status'] === 'pago'): ?>
                            <button class="btn btn-outline" onclick="gerarRecibo()">
                                <i class="fas fa-file-pdf"></i> Gerar Recibo
                            </button>
                        <?php endif; ?>
                    
                    </div>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- DETALHE DO PAGAMENTO                      -->
            <!-- ========================================== -->
            <div class="detalhe-container">
                <div class="detalhe-grid">
                    <!-- Coluna Principal -->
                    <div class="detalhe-coluna-principal">
                        <!-- Card: Informações do Pagamento -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-info-circle"></i> Informações do Pagamento</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="detalhe-info-grid">
                                    <div class="info-item">
                                        <span class="info-label">Referência</span>
                                        <span class="info-value" style="font-family: 'Orbitron', sans-serif; font-weight: 600; color: #FFD93D;">
                                            <?php echo $pagamento['referencia']; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Transação</span>
                                        <span class="info-value" style="font-family: 'Orbitron', sans-serif; font-weight: 500; color: var(--text-muted);">
                                            <?php echo $pagamento['transacao_id'] ?? 'N/A'; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Descrição</span>
                                        <span class="info-value"><?php echo $pagamento['descricao']; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Categoria</span>
                                        <span class="info-value">
                                            <span class="badge-categoria"><?php echo $pagamento['categoria']; ?></span>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Valor</span>
                                        <span class="info-value valor" style="font-size: 28px; font-weight: 700; color: #FFD93D;">
                                            Kz <?php echo formatMoney($pagamento['valor']); ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Método</span>
                                        <span class="info-value"><?php echo $pagamento['metodo']; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Data</span>
                                        <span class="info-value"><?php echo formatDateTime($pagamento['data']); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Status</span>
                                        <span class="badge-status status-<?php echo $pagamento['status']; ?>" style="font-size: 14px; padding: 4px 16px;">
                                            <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                                            <?php echo $pagamento['status_label']; ?>
                                        </span>
                                    </div>
                                    <?php if ($pagamento['plano']): ?>
                                    <div class="info-item">
                                        <span class="info-label">Plano</span>
                                        <span class="info-value"><?php echo $pagamento['plano']; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Período</span>
                                        <span class="info-value"><?php echo $pagamento['periodo']; ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ($pagamento['proximo_pagamento']): ?>
                                    <div class="info-item">
                                        <span class="info-label">Próximo Pagamento</span>
                                        <span class="info-value"><?php echo formatDate($pagamento['proximo_pagamento']); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <div class="info-item">
                                        <span class="info-label">Criado em</span>
                                        <span class="info-value"><?php echo formatDateTime($pagamento['created_at']); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Última Atualização</span>
                                        <span class="info-value"><?php echo formatDateTime($pagamento['updated_at']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Notas -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-sticky-note"></i> Notas</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <p class="notas-texto"><?php echo $pagamento['notas'] ?? 'Sem notas adicionais.'; ?></p>
                            </div>
                        </div>

                        <!-- Card: Comprovativo -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-file-pdf"></i> Comprovativo</h3>
                                <?php if ($pagamento['comprovativo']): ?>
                                    <div class="comprovativo-actions">
                                        <button class="btn btn-sm btn-outline" onclick="verComprovativo('<?php echo $pagamento['comprovativo']; ?>')">
                                            <i class="fas fa-eye"></i> Visualizar
                                        </button>
                                        <button class="btn btn-sm btn-outline" onclick="baixarComprovativo('<?php echo $pagamento['comprovativo']; ?>')">
                                            <i class="fas fa-download"></i> Baixar
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="detalhe-card-body">
                                <?php if ($pagamento['comprovativo']): ?>
                                    <div class="comprovativo-info">
                                        <div class="comprovativo-icon">
                                            <i class="fas fa-file-pdf"></i>
                                        </div>
                                        <div class="comprovativo-detalhes">
                                            <span class="comprovativo-nome"><?php echo $pagamento['comprovativo']; ?></span>
                                            <span class="comprovativo-tamanho">PDF • 245 KB</span>
                                        </div>
                                        <div class="comprovativo-status">
                                            <span class="badge-status status-pago">
                                                <i class="fas fa-check-circle"></i> Anexado
                                            </span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="comprovativo-vazio">
                                        <i class="fas fa-file-pdf" style="color: var(--text-muted); font-size: 32px; display: block; margin-bottom: 8px;"></i>
                                        <p>Nenhum comprovativo anexado</p>
                                        <button class="btn btn-sm btn-outline" onclick="anexarComprovativo()">
                                            <i class="fas fa-upload"></i> Anexar Comprovativo
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Coluna Lateral -->
                    <div class="detalhe-coluna-lateral">
                        <!-- Card: Cliente -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-user"></i> Cliente</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="cliente-detalhe">
                                    <div class="cliente-avatar-grande">
                                        <img src="../../../assets/images/<?php echo $pagamento['cliente_avatar']; ?>" 
                                             alt="<?php echo $pagamento['cliente']; ?>"
                                             onerror="this.src='<?php echo getAvatarUrl($pagamento['cliente']); ?>'">
                                        <span class="cliente-tipo-badge" style="background: <?php echo getTipoClienteColor($pagamento['cliente_tipo']); ?>;">
                                            <?php echo $pagamento['cliente_tipo']; ?>
                                        </span>
                                    </div>
                                    <div class="cliente-info-detalhe">
                                        <h4><?php echo $pagamento['cliente']; ?></h4>
                                        <p><i class="fas fa-envelope"></i> <?php echo $pagamento['cliente_email'] ?? 'N/A'; ?></p>
                                        <p><i class="fas fa-phone"></i> <?php echo $pagamento['cliente_telefone'] ?? 'N/A'; ?></p>
                                        <p><i class="fas fa-map-marker-alt"></i> <?php echo $pagamento['cliente_endereco'] ?? 'N/A'; ?></p>
                                    </div>
                                    <div class="cliente-acoes">
                                        <a href="../../../admin/individual-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-sm btn-outline">
                                            <i class="fas fa-eye"></i> Ver Perfil
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline">
                                            <i class="fas fa-envelope"></i> Contactar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Resumo Rápido -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-chart-simple"></i> Resumo</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="resumo-item">
                                    <span class="resumo-label">Status</span>
                                    <span class="badge-status status-<?php echo $pagamento['status']; ?>">
                                        <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                                        <?php echo $pagamento['status_label']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Valor</span>
                                    <span class="resumo-value" style="font-weight: 700; color: #FFD93D;">
                                        Kz <?php echo formatMoney($pagamento['valor']); ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Método</span>
                                    <span class="resumo-value"><?php echo $pagamento['metodo']; ?></span>
                                </div>
                                <?php if ($pagamento['assinatura_id']): ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Assinatura</span>
                                    <span class="resumo-value">
                                        <a href="assinatura-detalhe.php?id=<?php echo $pagamento['assinatura_id']; ?>" style="color: #FFD93D; text-decoration: none;">
                                            #<?php echo $pagamento['assinatura_id']; ?>
                                        </a>
                                    </span>
                                </div>
                                <?php endif; ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Data</span>
                                    <span class="resumo-value"><?php echo formatDate($pagamento['data']); ?></span>
                                </div>
                                <?php if ($pagamento['proximo_pagamento']): ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Próximo Pagamento</span>
                                    <span class="resumo-value"><?php echo formatDate($pagamento['proximo_pagamento']); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Card: Histórico de Atividades -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-history"></i> Atividades Recentes</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="historico-lista">
                                    <?php foreach ($historico as $item): ?>
                                    <div class="historico-item">
                                        <div class="historico-icon">
                                            <i class="fas fa-circle"></i>
                                        </div>
                                        <div class="historico-conteudo">
                                            <span class="historico-acao"><?php echo $item['acao']; ?></span>
                                            <span class="historico-detalhes"><?php echo $item['detalhes']; ?></span>
                                            <span class="historico-data">
                                                <i class="far fa-clock"></i> <?php echo formatDateTime($item['data']); ?>
                                            </span>
                                            <span class="historico-usuario">
                                                <i class="fas fa-user"></i> <?php echo $item['usuario']; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
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
        // GERAR RECIBO
        // ==========================================
        function gerarRecibo() {
            mostrarToast('A gerar recibo...', 'info');
            setTimeout(() => {
                mostrarToast('Recibo gerado com sucesso!', 'success');
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
        /* DETALHE DO PAGAMENTO - CSS                 */
        /* ========================================== */

        /* ===== CONTAINER ===== */
        .detalhe-container {
            margin-bottom: var(--space-lg);
        }

        .detalhe-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--space-lg);
        }

        /* ===== CARDS ===== */
        .detalhe-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .detalhe-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .detalhe-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);
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

        .detalhe-card-header h3 i {
            color: #FFD93D;
        }

        .detalhe-card-body {
            padding: 20px;
        }

        /* ===== INFO GRID ===== */
        .detalhe-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .info-item .info-label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-item .info-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        .info-item .info-value.valor {
            font-size: 28px;
            font-weight: 700;
            color: #FFD93D;
        }

        /* ===== BADGES ===== */
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

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-status i {
            font-size: 10px;
        }

        .badge-status.status-pago {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-falhou {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-status.status-cancelado {
            background: rgba(107, 122, 143, 0.12);
            color: #6B7A8F;
        }

        /* ===== NOTAS ===== */
        .notas-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        /* ===== COMPROVATIVO ===== */
        .comprovativo-info {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
        }

        .comprovativo-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .comprovativo-detalhes {
            flex: 1;
        }

        .comprovativo-nome {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
            display: block;
        }

        .comprovativo-tamanho {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-status {
            flex-shrink: 0;
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

        .comprovativo-actions {
            display: flex;
            gap: var(--space-xs);
        }

        /* ===== CLIENTE DETALHE ===== */
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
            border: 3px solid var(--border-color);
        }

        .cliente-avatar-grande .cliente-tipo-badge {
            position: absolute;
            bottom: -6px;
            right: -6px;
            border-radius: var(--radius-full);
            padding: 2px 10px;
            font-size: var(--text-xs);
            font-weight: 500;
            color: #fff;
        }

        .cliente-info-detalhe h4 {
            font-size: var(--text-h4);
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 4px 0;
        }

        .cliente-info-detalhe p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 2px 0;
        }

        .cliente-info-detalhe p i {
            width: 16px;
            color: var(--text-muted);
        }

        .cliente-acoes {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            justify-content: center;
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

        .resumo-item .resumo-value a {
            color: #FFD93D;
            text-decoration: none;
        }

        .resumo-item .resumo-value a:hover {
            text-decoration: underline;
        }

        /* ===== HISTÓRICO ===== */
        .historico-lista {
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
            flex-shrink: 0;
            padding-top: 4px;
        }

        .historico-icon i {
            font-size: 10px;
            color: #FFD93D;
        }

        .historico-conteudo {
            flex: 1;
        }

        .historico-acao {
            font-weight: 600;
            color: var(--text-primary);
            font-size: var(--text-sm);
            display: block;
        }

        .historico-detalhes {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            display: block;
        }

        .historico-data,
        .historico-usuario {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-block;
            margin-right: var(--space-sm);
        }

        .historico-data i,
        .historico-usuario i {
            margin-right: 2px;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .detalhe-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .detalhe-info-grid {
                grid-template-columns: 1fr;
            }
            
            .detalhe-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-sm);
            }
            
            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .cliente-detalhe {
                text-align: center;
            }
            
            .cliente-acoes {
                justify-content: center;
            }

            .page-header h1 {
                font-size: var(--text-h3);
                flex-wrap: wrap;
            }
            
            .page-header h1 .badge-status {
                font-size: 12px;
                padding: 2px 12px;
            }

            .comprovativo-info {
                flex-direction: column;
                text-align: center;
            }

            .comprovativo-actions {
                justify-content: center;
            }

            .comprovativo-status {
                margin-top: var(--space-xs);
            }
        }

        @media (max-width: 480px) {
            .detalhe-card-body {
                padding: 14px;
            }
            
            .detalhe-card-header {
                padding: 12px 14px;
            }
            
            .cliente-avatar-grande img {
                width: 60px;
                height: 60px;
            }
            
            .historico-item {
                flex-direction: column;
                gap: var(--space-xs);
            }
            
            .historico-icon {
                display: none;
            }

            .info-item .info-value.valor {
                font-size: 22px;
            }
        }
    </style>
</body>
</html>