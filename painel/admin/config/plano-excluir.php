<?php
// painel/admin/config/plano-excluir.php - Excluir Plano
include "../../../includes/notificacoes-config-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Excluir Plano';
$pagina_atual = 'planos';
$pagina_atual_sidebar = $pagina_atual;

// ============================================
// OBTER ID DO PLANO
// ============================================
$id_plano = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - PLANOS
// ============================================
$planos = [
    1 => [
        'id' => 1,
        'nome' => 'Básico',
        'categoria' => 'Individual',
        'categoria_icon' => 'fa-user',
        'categoria_color' => '#00D2FF',
        'valor' => 15000,
        'periodo' => 'Mensal',
        'usuarios' => 1,
        'projetos' => 5,
        'armazenamento' => '5 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano ideal para profissionais que estão começando. Inclui acesso básico às ferramentas essenciais.',
        'assinaturas_ativas' => 42,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-01 00:00:00'
    ],
    2 => [
        'id' => 2,
        'nome' => 'Pro',
        'categoria' => 'Individual',
        'categoria_icon' => 'fa-user',
        'categoria_color' => '#00D2FF',
        'valor' => 25000,
        'periodo' => 'Mensal',
        'usuarios' => 3,
        'projetos' => 20,
        'armazenamento' => '20 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => true,
        'descricao' => 'Plano avançado para profissionais experientes.',
        'assinaturas_ativas' => 128,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-15 10:30:00'
    ],
    3 => [
        'id' => 3,
        'nome' => 'Premium',
        'categoria' => 'Individual',
        'categoria_icon' => 'fa-user',
        'categoria_color' => '#00D2FF',
        'valor' => 45000,
        'periodo' => 'Mensal',
        'usuarios' => 5,
        'projetos' => 50,
        'armazenamento' => '50 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano completo para equipes pequenas.',
        'assinaturas_ativas' => 67,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-02-01 14:20:00'
    ],
    4 => [
        'id' => 4,
        'nome' => 'Startup',
        'categoria' => 'Empresarial',
        'categoria_icon' => 'fa-building',
        'categoria_color' => '#FF6B6B',
        'valor' => 75000,
        'periodo' => 'Mensal',
        'usuarios' => 10,
        'projetos' => 100,
        'armazenamento' => '100 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano ideal para startups em crescimento.',
        'assinaturas_ativas' => 34,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-20 09:15:00'
    ],
    5 => [
        'id' => 5,
        'nome' => 'Business',
        'categoria' => 'Empresarial',
        'categoria_icon' => 'fa-building',
        'categoria_color' => '#FF6B6B',
        'valor' => 150000,
        'periodo' => 'Mensal',
        'usuarios' => 25,
        'projetos' => 500,
        'armazenamento' => '250 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => true,
        'popular' => true,
        'descricao' => 'Plano empresarial completo. Gerencie grandes equipes e projetos complexos.',
        'assinaturas_ativas' => 89,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-02-15 16:45:00'
    ],
    6 => [
        'id' => 6,
        'nome' => 'Enterprise',
        'categoria' => 'Empresarial',
        'categoria_icon' => 'fa-building',
        'categoria_color' => '#FF6B6B',
        'valor' => 250000,
        'periodo' => 'Mensal',
        'usuarios' => 50,
        'projetos' => 1000,
        'armazenamento' => '500 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano enterprise para grandes corporações.',
        'assinaturas_ativas' => 23,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-10 11:30:00'
    ],
    7 => [
        'id' => 7,
        'nome' => 'Educação',
        'categoria' => 'Institucional',
        'categoria_icon' => 'fa-university',
        'categoria_color' => '#FFD93D',
        'valor' => 125000,
        'periodo' => 'Trimestral',
        'usuarios' => 100,
        'projetos' => 2000,
        'armazenamento' => '1 TB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano especial para instituições de ensino.',
        'assinaturas_ativas' => 56,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-25 13:00:00'
    ],
    8 => [
        'id' => 8,
        'nome' => 'Governo',
        'categoria' => 'Institucional',
        'categoria_icon' => 'fa-university',
        'categoria_color' => '#FFD93D',
        'valor' => 200000,
        'periodo' => 'Trimestral',
        'usuarios' => 200,
        'projetos' => 5000,
        'armazenamento' => '2 TB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => true,
        'popular' => false,
        'descricao' => 'Plano para entidades governamentais. Segurança máxima.',
        'assinaturas_ativas' => 12,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-02-05 08:30:00'
    ],
    9 => [
        'id' => 9,
        'nome' => 'ONG',
        'categoria' => 'Institucional',
        'categoria_icon' => 'fa-university',
        'categoria_color' => '#FFD93D',
        'valor' => 100000,
        'periodo' => 'Trimestral',
        'usuarios' => 50,
        'projetos' => 1000,
        'armazenamento' => '500 GB',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano com desconto para organizações não governamentais.',
        'assinaturas_ativas' => 8,
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-30 15:00:00'
    ],
];

// ============================================
// OBTER PLANO ATUAL
// ============================================
$plano = isset($planos[$id_plano]) ? $planos[$id_plano] : $planos[1];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
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

function getCategoriaColor($categoria) {
    $cores = [
        'Individual' => '#00D2FF',
        'Empresarial' => '#FF6B6B',
        'Institucional' => '#FFD93D'
    ];
    return $cores[$categoria] ?? '#6B7A8F';
}

function getCategoriaIcon($categoria) {
    $icons = [
        'Individual' => 'fa-user',
        'Empresarial' => 'fa-building',
        'Institucional' => 'fa-university'
    ];
    return $icons[$categoria] ?? 'fa-circle';
}

function getStatusClass($status) {
    return $status === 'ativo' ? 'status-ativo' : 'status-inativo';
}

function getStatusLabel($status) {
    return $status === 'ativo' ? 'Ativo' : 'Inativo';
}

// ============================================
// VERIFICAR SE PLANO TEM ASSINATURAS ATIVAS
// ============================================
$tem_assinaturas = isset($plano['assinaturas_ativas']) && $plano['assinaturas_ativas'] > 0;
$total_assinaturas = $plano['assinaturas_ativas'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt">
<?php include "../../../includes/admin-config-head.php" ?>

<body>
<div class="app-container">
    <div id="toast-container" class="toast-container"></div>

    <!-- ========================================== -->
    <!-- SIDEBAR CONFIGURAÇÕES                     -->
    <!-- ========================================== -->
    <?php include "../../../includes/admin-config-sidebar.php"; ?>

    <!-- ========================================== -->
    <!-- MAIN CONTENT                              -->
    <!-- ========================================== -->
    <main class="main-content">
        <!-- ===== PAGE HEADER ===== -->
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-trash icon" style="color: #FF6B6B;"></i>
                    <?php echo $titulo_pagina; ?>
                    <span class="badge-status <?php echo getStatusClass($plano['status']); ?>">
                        <i class="fas <?php echo $plano['status'] === 'ativo' ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i>
                        <?php echo getStatusLabel($plano['status']); ?>
                    </span>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <a href="planos.php">Planos</a>
                    <span class="separator">/</span>
                    <span><?php echo $plano['nome']; ?></span>
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
                    <a href="planos.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
        </header>

        <!-- ========================================== -->
        <!-- CONFIRMAÇÃO DE EXCLUSÃO                   -->
        <!-- ========================================== -->
        <div class="excluir-container">
            <div class="excluir-card">
                <div class="excluir-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h2>Confirmar Exclusão</h2>
                <p class="excluir-mensagem">
                    Tem certeza que deseja excluir o plano <strong>"<?php echo $plano['nome']; ?>"</strong>?
                </p>
                
                <?php if ($tem_assinaturas): ?>
                <div class="excluir-alerta">
                    <i class="fas fa-users"></i>
                    <div>
                        <strong>Atenção!</strong>
                        <span>Este plano possui <strong><?php echo $total_assinaturas; ?></strong> assinatura(s) ativa(s).</span>
                        <span class="alerta-detalhe">A exclusão afetará todos os clientes vinculados a este plano.</span>
                    </div>
                </div>
                <?php endif; ?>

                <div class="excluir-info">
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="label">Nome</span>
                            <span class="value" style="font-weight: 600; color: #FFD93D;"><?php echo $plano['nome']; ?></span>
                        </div>
                        <div class="info-item">
                            <span class="label">Categoria</span>
                            <span class="value">
                                <span class="badge-categoria <?php echo strtolower($plano['categoria']); ?>">
                                    <i class="fas <?php echo getCategoriaIcon($plano['categoria']); ?>"></i>
                                    <?php echo $plano['categoria']; ?>
                                </span>
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="label">Valor</span>
                            <span class="value" style="font-weight: 600; color: #FFD93D;">Kz <?php echo formatMoney($plano['valor']); ?></span>
                        </div>
                        <div class="info-item">
                            <span class="label">Período</span>
                            <span class="value"><?php echo $plano['periodo']; ?></span>
                        </div>
                        <div class="info-item">
                            <span class="label">Status</span>
                            <span class="badge-status <?php echo getStatusClass($plano['status']); ?>">
                                <i class="fas <?php echo $plano['status'] === 'ativo' ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i>
                                <?php echo getStatusLabel($plano['status']); ?>
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="label">Assinaturas</span>
                            <span class="value" style="font-weight: 600; color: #00D2FF;"><?php echo $total_assinaturas; ?></span>
                        </div>
                    </div>
                </div>

                <div class="excluir-acoes">
                    <a href="planos.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button class="btn btn-danger btn-lg" onclick="confirmarExclusao(<?php echo $plano['id']; ?>)">
                        <i class="fas fa-trash"></i> Sim, Excluir Plano
                    </button>
                </div>

                <p class="excluir-nota">
                    <i class="fas fa-info-circle"></i>
                    Esta ação não pode ser desfeita. Todos os dados relacionados serão removidos permanentemente.
                </p>
            </div>
        </div>
    </main>
</div>

<!-- ========================================== -->
<!-- MODAL: CONFIRMAÇÃO FINAL                  -->
<!-- ========================================== -->
<div class="modal" id="modalConfirmacao">
    <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
    <div class="modal-content" style="max-width: 420px;">
        <div class="modal-header" style="border-bottom-color: #FF6B6B;">
            <h3 class="modal-title" style="color: #FF6B6B;">
                <i class="fas fa-exclamation-triangle"></i> Última Confirmação
            </h3>
            <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
        </div>
        <div class="modal-body">
            <p style="font-size: var(--text-body); color: var(--text-secondary); text-align: center; margin-bottom: var(--space-md);">
                Tem certeza absoluta que deseja excluir o plano
            </p>
            <p style="font-size: var(--text-h4); font-weight: 700; color: #FF6B6B; text-align: center; margin: 0;">
                "<?php echo $plano['nome']; ?>"
            </p>
            <?php if ($tem_assinaturas): ?>
            <div style="margin-top: var(--space-md); padding: var(--space-md); background: rgba(255, 107, 107, 0.08); border-radius: var(--radius-sm); border-left: 3px solid #FF6B6B;">
                <p style="font-size: var(--text-sm); color: #FF6B6B; margin: 0;">
                    <i class="fas fa-users"></i>
                    <strong><?php echo $total_assinaturas; ?></strong> assinatura(s) ativa(s) serão afetadas.
                </p>
            </div>
            <?php endif; ?>
            <p style="font-size: var(--text-sm); color: #FF6B6B; text-align: center; margin-top: var(--space-md);">
                <i class="fas fa-exclamation-circle"></i> Esta ação é irreversível!
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
            <button class="btn btn-danger" id="confirmacaoFinalBtn">
                <i class="fas fa-trash"></i> Excluir Permanentemente
            </button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- SCRIPTS                                    -->
<!-- ========================================== -->
<script src="../../../assets/js/main.js"></script>
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

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
            document.querySelectorAll('.modal.active').forEach(modal => {
                fecharModal(modal.id);
            });
        }
    });

    // Theme
    const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);

    document.getElementById('btnTheme')?.addEventListener('click', function() {
        const current = document.documentElement.getAttribute('data-theme');
        const newTheme = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('geonnexus-theme', newTheme);
        mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
    });

    // Notificações
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

    // Perfil
    const btnPerfil = document.getElementById('btnPerfil');
    const perfilDrop = document.getElementById('perfilDropdown');

    if (btnPerfil && perfilDrop) {
        btnPerfil.addEventListener('click', function(e) {
            e.stopPropagation();
            perfilDrop.classList.toggle('active');
        });

        document.addEventListener('click', function(e) {
            if (!perfilDrop.contains(e.target) && !btnPerfil.contains(e.target)) {
                perfilDrop.classList.remove('active');
            }
        });
    }
});

function carregarNotificacoes() {
    const list = document.getElementById('notifList');
    if (!list) return;

    let html = '';
    mockNotificacoes.forEach(n => {
        html += `
            <div class="notificacao-item ${n.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${n.id})">
                <div class="notif-icon ${n.icon_class}">
                    <i class="fas ${n.icon}"></i>
                </div>
                <div class="notif-conteudo">
                    <p>${n.mensagem}</p>
                    <span class="notif-tempo">${n.tempo}</span>
                </div>
                ${!n.lida ? '<span class="notif-dot"></span>' : ''}
            </div>
        `;
    });

    list.innerHTML = html || `
        <div class="notificacao-vazia">
            <i class="fas fa-bell-slash"></i>
            <p>Nenhuma notificação</p>
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
    mostrarToast('Todas as notificações marcadas como lidas', 'success');
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
    document.getElementById('notificacoesDropdown')?.classList.remove('active');
}

// ============================================
// TOAST
// ============================================
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

// ============================================
// CONFIRMAR EXCLUSÃO
// ============================================
function confirmarExclusao(id) {
    document.getElementById('modalConfirmacao').classList.add('active');
    document.body.style.overflow = 'hidden';

    document.getElementById('confirmacaoFinalBtn').onclick = function() {
        fecharModal('modalConfirmacao');
        mostrarToast('Plano excluído com sucesso!', 'error');
        
        // Simular delay e redirecionar
        setTimeout(() => {
            window.location.href = 'planos.php';
        }, 1500);
    };
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
</script>

<style>
/* ========================================== */
/* EXCLUIR PLANO - CSS COMPLETO              */
/* ========================================== */

/* ===== CONTAINER ===== */
.excluir-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: calc(100vh - 300px);
    padding: var(--space-lg);
}

/* ===== CARD PRINCIPAL ===== */
.excluir-card {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border-color);
    padding: var(--space-2xl);
    max-width: 600px;
    width: 100%;
    text-align: center;
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
}

.excluir-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #FF6B6B, #FF6B6B, #FFD93D);
}

.excluir-card:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
    transform: translateY(-4px);
}

/* ===== ICONE ===== */
.excluir-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--space-lg);
    border-radius: 50%;
    background: rgba(255, 107, 107, 0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    color: #FF6B6B;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* ===== TÍTULO ===== */
.excluir-card h2 {
    font-family: var(--font-title);
    font-size: var(--text-h2);
    color: var(--text-primary);
    margin: 0 0 var(--space-sm) 0;
}

.excluir-mensagem {
    font-size: var(--text-body);
    color: var(--text-secondary);
    margin: 0 0 var(--space-lg) 0;
}

.excluir-mensagem strong {
    color: #FF6B6B;
}

/* ===== ALERTA ===== */
.excluir-alerta {
    display: flex;
    align-items: flex-start;
    gap: var(--space-md);
    padding: var(--space-md);
    background: rgba(255, 107, 107, 0.06);
    border-radius: var(--radius-md);
    border: 1px solid rgba(255, 107, 107, 0.15);
    margin-bottom: var(--space-lg);
    text-align: left;
}

.excluir-alerta i {
    font-size: 20px;
    color: #FF6B6B;
    margin-top: 2px;
    flex-shrink: 0;
}

.excluir-alerta div {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.excluir-alerta strong {
    color: #FF6B6B;
    font-size: var(--text-sm);
}

.excluir-alerta span {
    font-size: var(--text-sm);
    color: var(--text-secondary);
}

.excluir-alerta .alerta-detalhe {
    font-size: var(--text-xs);
    color: var(--text-muted);
}

/* ===== INFO GRID ===== */
.excluir-info {
    background: var(--bg-input);
    border-radius: var(--radius-md);
    padding: var(--space-md);
    margin-bottom: var(--space-lg);
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-sm);
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 2px;
    padding: 4px 0;
}

.info-item .label {
    font-size: var(--text-xs);
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-item .value {
    font-size: var(--text-sm);
    color: var(--text-primary);
}

/* ===== BADGES ===== */
.badge-status {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 3px 12px;
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 500;
}

.badge-status.status-ativo {
    background: rgba(0, 255, 163, 0.12);
    color: #00FFA3;
}

.badge-status.status-inativo {
    background: rgba(255, 107, 107, 0.12);
    color: #FF6B6B;
}

.badge-categoria {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 2px 12px;
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 500;
}

.badge-categoria.individual {
    background: rgba(0, 210, 255, 0.12);
    color: #00D2FF;
}

.badge-categoria.empresarial {
    background: rgba(255, 107, 107, 0.12);
    color: #FF6B6B;
}

.badge-categoria.institucional {
    background: rgba(255, 217, 61, 0.12);
    color: #FFD93D;
}

/* ===== AÇÕES ===== */
.excluir-acoes {
    display: flex;
    gap: var(--space-md);
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: var(--space-md);
}

.excluir-acoes .btn {
    min-width: 160px;
    justify-content: center;
    padding: 10px 24px;
}

.btn-lg {
    padding: 10px 24px;
    font-size: var(--text-body);
}

.btn-danger {
    background: #FF6B6B;
    color: white;
    border: none;
}

.btn-danger:hover {
    background: #E55555;
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(255, 107, 107, 0.3);
}

/* ===== NOTA ===== */
.excluir-nota {
    font-size: var(--text-xs);
    color: var(--text-muted);
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.excluir-nota i {
    color: #FFD93D;
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
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(4px);
    animation: fadeIn 0.3s ease;
    cursor: pointer;
}

.modal-content {
    position: relative;
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    max-width: 420px;
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
    display: flex;
    align-items: center;
    gap: var(--space-sm);
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
/* TOAST                                      */
/* ========================================== */
.toast-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 100000;
    display: flex;
    flex-direction: column;
    gap: 8px;
    max-width: 380px;
    width: 100%;
}

.toast {
    background: var(--toast-bg);
    backdrop-filter: blur(10px);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-md);
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    box-shadow: var(--glass-shadow);
    transform: translateX(100%);
    opacity: 0;
    transition: all 0.3s ease;
    animation: slideInToast 0.4s ease forwards;
}

.toast .toast-content {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
}

.toast .toast-content i {
    font-size: 1.2rem;
}

.toast .toast-content span {
    font-size: var(--text-sm);
    color: var(--text-primary);
}

.toast .toast-close {
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 1.2rem;
    cursor: pointer;
    padding: 0 4px;
    transition: var(--transition-smooth);
}

.toast .toast-close:hover {
    color: var(--text-primary);
}

.toast-success { border-left: 4px solid #00FFA3; }
.toast-error { border-left: 4px solid #FF6B6B; }
.toast-warning { border-left: 4px solid #F59E0B; }
.toast-info { border-left: 4px solid #00D2FF; }

@keyframes slideInToast {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

/* ========================================== */
/* ANIMAÇÕES                                  */
/* ========================================== */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

/* ========================================== */
/* RESPONSIVIDADE                             */
/* ========================================== */

@media (max-width: 768px) {
    .excluir-card {
        padding: var(--space-lg);
    }

    .excluir-container {
        padding: var(--space-md);
        min-height: auto;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }

    .excluir-acoes {
        flex-direction: column;
        width: 100%;
    }

    .excluir-acoes .btn {
        width: 100%;
        min-width: auto;
    }

    .excluir-icon {
        width: 60px;
        height: 60px;
        font-size: 28px;
    }

    .excluir-card h2 {
        font-size: var(--text-h3);
    }

    .page-header h1 {
        font-size: var(--text-h3);
        flex-wrap: wrap;
    }
}

@media (max-width: 480px) {
    .excluir-card {
        padding: var(--space-md);
        border-radius: var(--radius-md);
    }

    .excluir-alerta {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .excluir-card h2 {
        font-size: var(--text-h4);
    }

    .modal-content {
        width: 95%;
        margin: 10px;
    }

    .modal-footer {
        flex-direction: column;
    }

    .modal-footer .btn {
        width: 100%;
    }

    .header-actions .btn {
        font-size: var(--text-xs);
        padding: 4px 10px;
    }
}
</style>

</body>
</html>