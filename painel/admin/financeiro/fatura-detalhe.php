<?php
// painel/admin/financeiro/fatura-detalhe.php - Detalhe da Fatura
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Detalhe da Fatura';
$pagina_atual = 'faturas';

// ===== OBTER ID DA FATURA =====
$id_fatura = isset($_GET['id']) ? $_GET['id'] : 'FAT-2026-001';


// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE FATURAS =====
$faturas = [
    'FAT-2026-001' => [
        'id' => 'FAT-2026-001',
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-1.png',
        'cliente_email' => 'carlos.mendes@email.com',
        'cliente_telefone' => '+244 923 456 789',
        'cliente_endereco' => 'Rua 15, Nº 245, Luanda',
        'cliente_nif' => '123456789',
        'valor' => 25000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01 10:00:00',
        'vencimento' => '2026-02-15',
        'descricao' => 'Mensalidade - Plano Pro',
        'categoria' => 'Assinatura',
        'assinatura_id' => 1,
        'itens' => [
            ['descricao' => 'Plano Pro - Mensalidade (Fevereiro 2026)', 'quantidade' => 1, 'valor_unitario' => 25000, 'total' => 25000]
        ],
        'pagamento_ref' => 'PAY-001',
        'data_pagamento' => '2026-02-15 10:30:00',
        'metodo_pagamento' => 'Multicaixa',
        'notas' => 'Pagamento confirmado. Cliente com bom histórico.',
        'created_at' => '2026-02-01 10:00:00',
        'updated_at' => '2026-02-15 10:35:00'
    ],
    'FAT-2026-002' => [
        'id' => 'FAT-2026-002',
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_email' => 'financeiro@construtoraabc.ao',
        'cliente_telefone' => '+244 222 345 678',
        'cliente_endereco' => 'Av. 4 de Fevereiro, Nº 100, Luanda',
        'cliente_nif' => '987654321',
        'valor' => 250000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01 09:00:00',
        'vencimento' => '2026-02-15',
        'descricao' => 'Mensalidade - Plano Enterprise',
        'categoria' => 'Assinatura',
        'assinatura_id' => 2,
        'itens' => [
            ['descricao' => 'Plano Enterprise - Mensalidade (Fevereiro 2026)', 'quantidade' => 1, 'valor_unitario' => 250000, 'total' => 250000]
        ],
        'pagamento_ref' => 'PAY-002',
        'data_pagamento' => '2026-02-01 10:00:00',
        'metodo_pagamento' => 'Transferência Bancária',
        'notas' => 'Empresa parceira desde 2024.',
        'created_at' => '2026-02-01 09:00:00',
        'updated_at' => '2026-02-01 10:05:00'
    ],
    'FAT-2026-003' => [
        'id' => 'FAT-2026-003',
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_email' => 'financas@itl.ao',
        'cliente_telefone' => '+244 222 456 789',
        'cliente_endereco' => 'Rua do Comércio, Nº 50, Luanda',
        'cliente_nif' => '456789123',
        'valor' => 125000,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'emissao' => '2026-02-05 14:30:00',
        'vencimento' => '2026-02-20',
        'descricao' => 'Trimestral - Plano Educação',
        'categoria' => 'Assinatura',
        'assinatura_id' => 4,
        'itens' => [
            ['descricao' => 'Plano Educação - Trimestral (Fev/Mar/Abr 2026)', 'quantidade' => 1, 'valor_unitario' => 125000, 'total' => 125000]
        ],
        'pagamento_ref' => null,
        'data_pagamento' => null,
        'metodo_pagamento' => null,
        'notas' => 'Aguardando comprovativo de pagamento.',
        'created_at' => '2026-02-05 14:30:00',
        'updated_at' => '2026-02-05 14:30:00'
    ],
];

// ===== OBTER FATURA ATUAL =====
$fatura = isset($faturas[$id_fatura]) ? $faturas[$id_fatura] : $faturas['FAT-2026-001'];

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
        'paga' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'vencida' => 'fa-exclamation-circle',
        'cancelada' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}

function getStatusColor($status) {
    $colors = [
        'paga' => '#00FFA3',
        'pendente' => '#FFD93D',
        'vencida' => '#FF6B6B',
        'cancelada' => '#6B7A8F'
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
                        <i class="fas fa-file-invoice icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status status-<?php echo $fatura['status']; ?>" style="font-size: 14px; padding: 4px 16px; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                            <?php echo $fatura['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="faturas.php">Faturas</a>
                        <span class="separator">/</span>
                        <span><?php echo $fatura['id']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                        <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <?php if ($fatura['status'] === 'pendente' || $fatura['status'] === 'vencida'): ?>
                            <button class="btn btn-success" onclick="marcarComoPaga('<?php echo $fatura['id']; ?>')">
                                <i class="fas fa-check"></i> Marcar como Paga
                            </button>
                        <?php endif; ?>
                        <button class="btn btn-outline" onclick="baixarPDF('<?php echo $fatura['id']; ?>')">
                            <i class="fas fa-file-pdf"></i> Baixar PDF
                        </button>
                        <a href="fatura-editar.php?id=<?php echo $fatura['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="faturas.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- DETALHE DA FATURA                         -->
            <!-- ========================================== -->
            <div class="detalhe-container">
                <div class="detalhe-grid">
                    <!-- Coluna Principal -->
                    <div class="detalhe-coluna-principal">
                        <!-- Card: Informações da Fatura -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-info-circle"></i> Informações da Fatura</h3>
                                <span class="fatura-id-badge">#<?php echo $fatura['id']; ?></span>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="detalhe-info-grid">
                                    <div class="info-item">
                                        <span class="info-label">Nº da Fatura</span>
                                        <span class="info-value" style="font-family: 'Orbitron', sans-serif; font-weight: 600; color: #FFD93D;">
                                            <?php echo $fatura['id']; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Descrição</span>
                                        <span class="info-value"><?php echo $fatura['descricao']; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Categoria</span>
                                        <span class="info-value">
                                            <span class="badge-categoria"><?php echo $fatura['categoria']; ?></span>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Valor</span>
                                        <span class="info-value valor" style="font-size: 28px; font-weight: 700; color: #FFD93D;">
                                            Kz <?php echo formatMoney($fatura['valor']); ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Data de Emissão</span>
                                        <span class="info-value"><?php echo formatDateTime($fatura['emissao']); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Data de Vencimento</span>
                                        <span class="info-value <?php echo ($fatura['status'] === 'vencida') ? 'vencida-text' : ''; ?>">
                                            <?php echo formatDate($fatura['vencimento']); ?>
                                            <?php if ($fatura['status'] === 'vencida'): ?>
                                                <span class="badge badge-danger" style="margin-left: 8px;">Vencida</span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Status</span>
                                        <span class="badge-status status-<?php echo $fatura['status']; ?>" style="font-size: 14px; padding: 4px 16px;">
                                            <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                                            <?php echo $fatura['status_label']; ?>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Assinatura</span>
                                        <span class="info-value">
                                            <a href="assinatura-detalhe.php?id=<?php echo $fatura['assinatura_id']; ?>" style="color: #FFD93D; text-decoration: none;">
                                                #<?php echo $fatura['assinatura_id']; ?>
                                            </a>
                                        </span>
                                    </div>
                                    <?php if ($fatura['pagamento_ref']): ?>
                                    <div class="info-item">
                                        <span class="info-label">Pagamento</span>
                                        <span class="info-value">
                                            <a href="pagamento-detalhe.php?id=<?php echo $fatura['pagamento_ref']; ?>" style="color: #00FFA3; text-decoration: none;">
                                                <?php echo $fatura['pagamento_ref']; ?>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Data de Pagamento</span>
                                        <span class="info-value"><?php echo formatDateTime($fatura['data_pagamento']); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Método de Pagamento</span>
                                        <span class="info-value"><?php echo $fatura['metodo_pagamento']; ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <div class="info-item">
                                        <span class="info-label">Criado em</span>
                                        <span class="info-value"><?php echo formatDateTime($fatura['created_at']); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Última Atualização</span>
                                        <span class="info-value"><?php echo formatDateTime($fatura['updated_at']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Itens da Fatura -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-list"></i> Itens da Fatura</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="table-responsive">
                                    <table class="table-itens">
                                        <thead>
                                            <tr>
                                                <th>Descrição</th>
                                                <th style="text-align: center;">Qtd</th>
                                                <th style="text-align: right;">Valor Unit.</th>
                                                <th style="text-align: right;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($fatura['itens'] as $item): ?>
                                            <tr>
                                                <td><?php echo $item['descricao']; ?></td>
                                                <td style="text-align: center;"><?php echo $item['quantidade']; ?></td>
                                                <td style="text-align: right;">Kz <?php echo formatMoney($item['valor_unitario']); ?></td>
                                                <td style="text-align: right; font-weight: 600; color: #FFD93D;">
                                                    Kz <?php echo formatMoney($item['total']); ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" style="text-align: right; font-weight: 600;">Total da Fatura</td>
                                                <td style="text-align: right; font-weight: 700; font-size: 18px; color: #FFD93D;">
                                                    Kz <?php echo formatMoney($fatura['valor']); ?>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Notas -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-sticky-note"></i> Notas</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <p class="notas-texto"><?php echo $fatura['notas'] ?? 'Sem notas adicionais.'; ?></p>
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
                                        <img src="../../../assets/images/<?php echo $fatura['cliente_avatar']; ?>" 
                                             alt="<?php echo $fatura['cliente']; ?>"
                                             onerror="this.src='<?php echo getAvatarUrl($fatura['cliente']); ?>'">
                                        <span class="cliente-tipo-badge"><?php echo $fatura['cliente_tipo']; ?></span>
                                    </div>
                                    <div class="cliente-info-detalhe">
                                        <h4><?php echo $fatura['cliente']; ?></h4>
                                        <p><i class="fas fa-envelope"></i> <?php echo $fatura['cliente_email'] ?? 'N/A'; ?></p>
                                        <p><i class="fas fa-phone"></i> <?php echo $fatura['cliente_telefone'] ?? 'N/A'; ?></p>
                                        <p><i class="fas fa-map-marker-alt"></i> <?php echo $fatura['cliente_endereco'] ?? 'N/A'; ?></p>
                                        <p><i class="fas fa-id-card"></i> NIF: <?php echo $fatura['cliente_nif'] ?? 'N/A'; ?></p>
                                    </div>
                                    <div class="cliente-acoes">
                                        <a href="../../../admin/individual-detalhe.php?id=<?php echo $fatura['assinatura_id']; ?>" class="btn btn-sm btn-outline">
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
                                    <span class="badge-status status-<?php echo $fatura['status']; ?>">
                                        <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                                        <?php echo $fatura['status_label']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Valor</span>
                                    <span class="resumo-value" style="font-weight: 700; color: #FFD93D;">
                                        Kz <?php echo formatMoney($fatura['valor']); ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Vencimento</span>
                                    <span class="resumo-value <?php echo ($fatura['status'] === 'vencida') ? 'vencida-text' : ''; ?>">
                                        <?php echo formatDate($fatura['vencimento']); ?>
                                    </span>
                                </div>
                                <?php if ($fatura['pagamento_ref']): ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Pagamento</span>
                                    <span class="resumo-value">
                                        <a href="pagamento-detalhe.php?id=<?php echo $fatura['pagamento_ref']; ?>" style="color: #00FFA3; text-decoration: none;">
                                            <?php echo $fatura['pagamento_ref']; ?>
                                        </a>
                                    </span>
                                </div>
                                <?php endif; ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Itens</span>
                                    <span class="resumo-value"><?php echo count($fatura['itens']); ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Dias para Vencimento</span>
                                    <span class="resumo-value">
                                        <?php
                                        $dias = ceil((strtotime($fatura['vencimento']) - time()) / 86400);
                                        if ($fatura['status'] === 'paga') {
                                            echo '<span style="color: #00FFA3;">Paga</span>';
                                        } elseif ($dias < 0) {
                                            echo '<span style="color: #FF6B6B;">' . abs($dias) . ' dias vencido</span>';
                                        } elseif ($dias === 0) {
                                            echo '<span style="color: #FFD93D;">Vence hoje</span>';
                                        } else {
                                            echo $dias . ' dias';
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Ações Rápidas -->
                        <div class="detalhe-card">
                            <div class="detalhe-card-header">
                                <h3><i class="fas fa-tools"></i> Ações Rápidas</h3>
                            </div>
                            <div class="detalhe-card-body">
                                <div class="acoes-lista">
                                    <button class="btn btn-outline" style="width: 100%; justify-content: center;" onclick="baixarPDF('<?php echo $fatura['id']; ?>')">
                                        <i class="fas fa-file-pdf"></i> Baixar PDF
                                    </button>
                                    <a href="fatura-editar.php?id=<?php echo $fatura['id']; ?>" class="btn btn-primary" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-edit"></i> Editar Fatura
                                    </a>
                                    <?php if ($fatura['status'] === 'pendente' || $fatura['status'] === 'vencida'): ?>
                                    <button class="btn btn-success" style="width: 100%; justify-content: center;" onclick="marcarComoPaga('<?php echo $fatura['id']; ?>')">
                                        <i class="fas fa-check"></i> Marcar como Paga
                                    </button>
                                    <?php endif; ?>
                                    <button class="btn btn-danger" style="width: 100%; justify-content: center;" onclick="cancelarFatura('<?php echo $fatura['id']; ?>')">
                                        <i class="fas fa-times"></i> Cancelar Fatura
                                    </button>
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
        // AÇÕES DA FATURA
        // ==========================================
        function baixarPDF(id) {
            mostrarToast('A baixar fatura ' + id + '...', 'info');
            setTimeout(() => {
                mostrarToast('Fatura ' + id + ' baixada com sucesso!', 'success');
            }, 1500);
        }

        function marcarComoPaga(id) {
            if (confirm('Tem certeza que deseja marcar a fatura ' + id + ' como paga?')) {
                mostrarToast('Fatura ' + id + ' marcada como paga!', 'success');
                setTimeout(() => {
                    window.location.href = 'fatura-detalhe.php?id=' + id;
                }, 1500);
            }
        }

        function cancelarFatura(id) {
            if (confirm('Tem certeza que deseja cancelar a fatura ' + id + '? Esta ação não pode ser desfeita.')) {
                mostrarToast('Fatura ' + id + ' cancelada com sucesso!', 'error');
                setTimeout(() => {
                    window.location.href = 'faturas.php';
                }, 1500);
            }
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
        /* DETALHE DA FATURA - CSS                    */
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

        .detalhe-card-header .fatura-id-badge {
            font-family: 'Orbitron', sans-serif;
            font-size: var(--text-sm);
            color: #FFD93D;
            font-weight: 600;
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

        .info-item .info-value.vencida-text {
            color: #FF6B6B;
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

        .badge-status.status-paga {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-vencida {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-status.status-cancelada {
            background: rgba(107, 122, 143, 0.12);
            color: #6B7A8F;
        }

        .badge-danger {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
        }

        /* ===== TABELA DE ITENS ===== */
        .table-itens {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
        }

        .table-itens thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 8px 12px;
            border-bottom: 2px solid var(--border-color);
        }

        .table-itens tbody td {
            padding: 8px 12px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-secondary);
        }

        .table-itens tbody tr:last-child td {
            border-bottom: none;
        }

        .table-itens tfoot td {
            padding: 12px;
            border-top: 2px solid var(--border-color);
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

        .resumo-item .resumo-value.vencida-text {
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

            .info-item .info-value.valor {
                font-size: 22px;
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

            .table-itens {
                font-size: var(--text-xs);
            }

            .table-itens thead th,
            .table-itens tbody td,
            .table-itens tfoot td {
                padding: 6px 8px;
            }

            .info-item .info-value.valor {
                font-size: 20px;
            }
        }
    </style>
</body>
</html>