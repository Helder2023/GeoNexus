<?php
// painel/admin/financeiro/assinatura-detalhe.php - Detalhe da Assinatura
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Detalhe da Assinatura';
$pagina_atual = 'assinaturas';

// ===== OBTER ID DA ASSINATURA =====
$id_assinatura = isset($_GET['id']) ? (int)$_GET['id'] : 1;


// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE ASSINATURAS =====
$assinaturas = [
    1 => [
        'id' => 1,
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-1.png',
        'cliente_email' => 'carlos.mendes@email.com',
        'cliente_telefone' => '+244 923 456 789',
        'cliente_endereco' => 'Rua 15, Nº 245, Luanda',
        'categoria' => 'individual',
        'plano' => 'Pro',
        'valor' => 25000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-15',
        'fim' => '2026-12-15',
        'renovacao' => '2026-02-15',
        'metodo_pagamento' => 'Multicaixa',
        'ultimo_pagamento' => '2026-01-15',
        'proximo_pagamento' => '2026-02-15',
        'created_at' => '2026-01-15 10:30:00',
        'updated_at' => '2026-01-15 10:30:00',
        'notas' => 'Cliente com bom histórico de pagamentos. Renovação automática ativada.'
    ],
    2 => [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_email' => 'financeiro@construtoraabc.ao',
        'cliente_telefone' => '+244 222 345 678',
        'cliente_endereco' => 'Av. 4 de Fevereiro, Nº 100, Luanda',
        'categoria' => 'empresarial',
        'plano' => 'Enterprise',
        'valor' => 250000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-01',
        'fim' => '2026-12-31',
        'renovacao' => '2026-02-01',
        'metodo_pagamento' => 'Transferência Bancária',
        'ultimo_pagamento' => '2026-01-01',
        'proximo_pagamento' => '2026-02-01',
        'created_at' => '2025-12-15 09:00:00',
        'updated_at' => '2026-01-01 14:30:00',
        'notas' => 'Empresa parceira desde 2024. Contrato anual com renovação automática.'
    ],
    4 => [
        'id' => 4,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_email' => 'financas@itl.ao',
        'cliente_telefone' => '+244 222 456 789',
        'cliente_endereco' => 'Rua do Comércio, Nº 50, Luanda',
        'categoria' => 'institucional',
        'plano' => 'Educação',
        'valor' => 125000,
        'periodo' => 'Trimestral',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'inicio' => '2026-02-15',
        'fim' => '2026-05-15',
        'renovacao' => '2026-05-15',
        'metodo_pagamento' => 'Depósito Bancário',
        'ultimo_pagamento' => null,
        'proximo_pagamento' => '2026-02-15',
        'created_at' => '2026-02-10 11:20:00',
        'updated_at' => '2026-02-10 11:20:00',
        'notas' => 'Aguardando confirmação do primeiro pagamento. Comprovativo enviado por email.'
    ],
];

// ===== OBTER ASSINATURA ATUAL =====
$assinatura = isset($assinaturas[$id_assinatura]) ? $assinaturas[$id_assinatura] : $assinaturas[1];

// ===== HISTÓRICO DE PAGAMENTOS =====
$historico_pagamentos = [
    [
        'id' => 1,
        'data' => '2026-01-15 10:30:00',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'status' => 'pago',
        'status_label' => 'Pago',
        'referencia' => 'PAY-001',
        'comprovativo' => 'comp-001.pdf'
    ],
    [
        'id' => 2,
        'data' => '2025-12-15 09:45:00',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'status' => 'pago',
        'status_label' => 'Pago',
        'referencia' => 'PAY-000',
        'comprovativo' => 'comp-000.pdf'
    ],
];

// ===== HISTÓRICO DE ATIVIDADES =====
$historico_atividades = [
    [
        'data' => '2026-01-15 10:30:00',
        'acao' => 'Assinatura criada',
        'usuario' => 'Sistema',
        'detalhes' => 'Assinatura do plano Pro criada automaticamente'
    ],
    [
        'data' => '2026-01-15 10:35:00',
        'acao' => 'Status atualizado',
        'usuario' => 'Administrador',
        'detalhes' => 'Status alterado de "Pendente" para "Ativo"'
    ],
    [
        'data' => '2026-01-15 10:40:00',
        'acao' => 'Pagamento registado',
        'usuario' => 'Administrador',
        'detalhes' => 'Pagamento de Kz 25.000 registado com sucesso'
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

function getStatusColor($status) {
    $colors = [
        'ativo' => '#00FFA3',
        'pendente' => '#FFD93D',
        'cancelado' => '#FF6B6B'
    ];
    return $colors[$status] ?? '#6B7A8F';
}

function getStatusIcon($status) {
    $icons = [
        'ativo' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'cancelado' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}

function getCategoriaColor($categoria) {
    $cores = [
        'individual' => '#00D2FF',
        'empresarial' => '#FF6B6B',
        'institucional' => '#FFD93D'
    ];
    return $cores[$categoria] ?? '#6B7A8F';
}

function getCategoriaIcon($categoria) {
    $icons = [
        'individual' => 'fa-user',
        'empresarial' => 'fa-building',
        'institucional' => 'fa-university'
    ];
    return $icons[$categoria] ?? 'fa-circle';
}

function getCategoriaLabel($categoria) {
    $labels = [
        'individual' => 'Individual',
        'empresarial' => 'Empresarial',
        'institucional' => 'Institucional'
    ];
    return $labels[$categoria] ?? $categoria;
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
                        <i class="fas fa-crown icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status status-<?php echo $assinatura['status']; ?>" style="font-size: 14px; padding: 4px 16px; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fas <?php echo getStatusIcon($assinatura['status']); ?>"></i>
                            <?php echo $assinatura['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="assinaturas.php">Assinaturas</a>
                        <span class="separator">/</span>
                        <span>#<?php echo $assinatura['id']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                       <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <a href="assinatura-editar.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <?php if ($assinatura['status'] === 'ativo'): ?>
                        <a href="assinatura-cancelar.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-danger">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <?php endif; ?>
                        <a href="assinaturas.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- DETALHE DA ASSINATURA                     -->
            <!-- ========================================== -->
            <div class="detalhe-container">
                <div class="detalhe-grid">
                    <!-- Coluna Principal -->
                    <div class="detalhe-coluna-principal">
                        <!-- Card: Informações da Assinatura -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-info-circle"></i> Informações da Assinatura</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="detalhe-info-grid">
                                    <div class="info-item">
                                        <span class="info-label">ID da Assinatura</span>
                                        <span class="info-value" style="font-family: 'Orbitron', sans-serif; font-weight: 600; color: #FFD93D;">
                                            #<?php echo $assinatura['id']; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Categoria</span>
                                        <span class="info-value">
                                            <span class="badge-categoria categoria-<?php echo $assinatura['categoria']; ?>">
                                                <i class="fas <?php echo getCategoriaIcon($assinatura['categoria']); ?>"></i>
                                                <?php echo getCategoriaLabel($assinatura['categoria']); ?>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Plano</span>
                                        <span class="info-value">
                                            <span class="badge-plano" style="background: <?php echo getCategoriaColor($assinatura['categoria']); ?>; color: #fff; padding: 4px 14px; border-radius: 20px; font-size: 14px; font-weight: 600;">
                                                <?php echo $assinatura['plano']; ?>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Período</span>
                                        <span class="info-value"><?php echo $assinatura['periodo']; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Valor</span>
                                        <span class="info-value valor" style="font-size: 24px; font-weight: 700; color: #FFD93D;">
                                            Kz <?php echo formatMoney($assinatura['valor']); ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Método de Pagamento</span>
                                        <span class="info-value"><?php echo $assinatura['metodo_pagamento']; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Data de Início</span>
                                        <span class="info-value"><?php echo formatDate($assinatura['inicio']); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Data de Término</span>
                                        <span class="info-value"><?php echo formatDate($assinatura['fim']); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Próxima Renovação</span>
                                        <span class="info-value">
                                            <?php if ($assinatura['renovacao']): ?>
                                                <?php echo formatDate($assinatura['renovacao']); ?>
                                            <?php else: ?>
                                                <span class="text-muted">—</span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Último Pagamento</span>
                                        <span class="info-value">
                                            <?php if ($assinatura['ultimo_pagamento']): ?>
                                                <?php echo formatDate($assinatura['ultimo_pagamento']); ?>
                                            <?php else: ?>
                                                <span class="text-muted">Nenhum pagamento</span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Próximo Pagamento</span>
                                        <span class="info-value">
                                            <?php if ($assinatura['proximo_pagamento']): ?>
                                                <?php echo formatDate($assinatura['proximo_pagamento']); ?>
                                            <?php else: ?>
                                                <span class="text-muted">—</span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Criado em</span>
                                        <span class="info-value"><?php echo formatDateTime($assinatura['created_at']); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Última Atualização</span>
                                        <span class="info-value"><?php echo formatDateTime($assinatura['updated_at']); ?></span>
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
                                <p class="notas-texto"><?php echo $assinatura['notas'] ?? 'Sem notas adicionais.'; ?></p>
                            </div>
                        </div>

                        <!-- Card: Histórico de Pagamentos -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-credit-card"></i> Histórico de Pagamentos</h3>
                                <a href="#" class="btn btn-sm btn-outline">Ver Todos</a>
                            </div>
                            <div class="detalhe-card-body">
                                <?php if (count($historico_pagamentos) > 0): ?>
                                    <div class="historico-pagamentos">
                                        <?php foreach ($historico_pagamentos as $pagamento): ?>
                                            <div class="pagamento-item">
                                                <div class="pagamento-info">
                                                    <span class="pagamento-data"><?php echo formatDateTime($pagamento['data']); ?></span>
                                                    <span class="pagamento-valor">Kz <?php echo formatMoney($pagamento['valor']); ?></span>
                                                    <span class="pagamento-metodo"><i class="fas fa-credit-card"></i> <?php echo $pagamento['metodo']; ?></span>
                                                </div>
                                                <div class="pagamento-status">
                                                    <span class="badge-status status-<?php echo $pagamento['status']; ?>">
                                                        <i class="fas fa-check-circle"></i>
                                                        <?php echo $pagamento['status_label']; ?>
                                                    </span>
                                                    <span class="pagamento-ref"><?php echo $pagamento['referencia']; ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <p class="text-muted" style="text-align: center; padding: 20px 0;">
                                        <i class="fas fa-credit-card" style="font-size: 24px; display: block; margin-bottom: 8px;"></i>
                                        Nenhum pagamento registado
                                    </p>
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
                                        <img src="../../../assets/images/<?php echo $assinatura['cliente_avatar']; ?>" 
                                             alt="<?php echo $assinatura['cliente']; ?>"
                                             onerror="this.src='<?php echo getAvatarUrl($assinatura['cliente']); ?>'">
                                        <span class="cliente-tipo-badge"><?php echo $assinatura['cliente_tipo']; ?></span>
                                    </div>
                                    <div class="cliente-info-detalhe">
                                        <h4><?php echo $assinatura['cliente']; ?></h4>
                                        <p><i class="fas fa-envelope"></i> <?php echo $assinatura['cliente_email'] ?? 'N/A'; ?></p>
                                        <p><i class="fas fa-phone"></i> <?php echo $assinatura['cliente_telefone'] ?? 'N/A'; ?></p>
                                        <p><i class="fas fa-map-marker-alt"></i> <?php echo $assinatura['cliente_endereco'] ?? 'N/A'; ?></p>
                                    </div>
                                    <div class="cliente-acoes">
                                        <a href="../../../admin/individual-detalhe.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-sm btn-outline">
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
                                    <span class="badge-status status-<?php echo $assinatura['status']; ?>">
                                        <i class="fas <?php echo getStatusIcon($assinatura['status']); ?>"></i>
                                        <?php echo $assinatura['status_label']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Total Pago</span>
                                    <span class="resumo-value" style="color: #00FFA3; font-weight: 700;">
                                        Kz <?php echo formatMoney(array_sum(array_column($historico_pagamentos, 'valor'))); ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Pagamentos</span>
                                    <span class="resumo-value"><?php echo count($historico_pagamentos); ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Dias Restantes</span>
                                    <span class="resumo-value">
                                        <?php
                                        if ($assinatura['fim']) {
                                            $dias = ceil((strtotime($assinatura['fim']) - time()) / 86400);
                                            if ($dias > 0) {
                                                echo $dias . ' dias';
                                            } else {
                                                echo '<span style="color: #FF6B6B;">Expirada</span>';
                                            }
                                        } else {
                                            echo 'N/A';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Histórico de Atividades -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-history"></i> Atividades Recentes</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="historico-lista">
                                    <?php foreach ($historico_atividades as $item): ?>
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
        /* DETALHE DA ASSINATURA - CSS                */
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

        .info-item .info-value .text-muted {
            color: var(--text-muted);
            font-weight: 400;
        }

        /* ===== BADGES ===== */
        .badge-categoria {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-categoria.categoria-individual {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .badge-categoria.categoria-empresarial {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-categoria.categoria-institucional {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
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

        .badge-status.status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-cancelado {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-plano {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        /* ===== VALORES ===== */
        .valor {
            font-weight: 700;
        }

        /* ===== NOTAS ===== */
        .notas-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
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
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-full);
            padding: 2px 10px;
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
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

        /* ===== HISTÓRICO DE PAGAMENTOS ===== */
        .historico-pagamentos {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .pagamento-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 14px;
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .pagamento-info {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .pagamento-data {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        .pagamento-valor {
            font-size: var(--text-sm);
            font-weight: 600;
            color: #FFD93D;
        }

        .pagamento-metodo {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .pagamento-status {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .pagamento-ref {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-family: 'Orbitron', sans-serif;
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

        /* ===== HISTÓRICO DE ATIVIDADES ===== */
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

            .pagamento-item {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .pagamento-info {
                justify-content: center;
            }

            .pagamento-status {
                justify-content: center;
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
        }
    </style>
</body>
</html>