<?php
// includes/bottom-nav-financeiro.php - Bottom Navigation Mobile para o Módulo Financeiro
// Este arquivo deve ser incluído em todas as páginas do módulo financeiro

// ============================================
// DEFINIR VARIÁVEIS PADRÃO (caso não existam)
// ============================================
if (!isset($total_transacoes)) $total_transacoes = 0;
if (!isset($stats)) {
    $stats = [
        'assinaturas_ativas' => 0,
        'pagamentos_pendentes' => 0,
    ];
}
if (!isset($notificacoes_count)) $notificacoes_count = 0;

// ============================================
// VERIFICAR QUAL PÁGINA ESTÁ ATIVA
// ============================================
$financeiro_pagina_atual = isset($pagina_atual) ? $pagina_atual : 'dashboard';

// Mapeamento de páginas para itens do bottom nav
$financeiro_page_to_item = [
    'dashboard' => 'dashboard',
    'transacoes' => 'transacoes',
    'assinaturas' => 'assinaturas',
    'pagamentos' => 'pagamentos',
    'comprovativos' => 'pagamentos',
    'faturas' => 'pagamentos',
    'comissoes' => 'pagamentos',
    'relatorios' => 'dashboard',
    'transacao-detalhe' => 'transacoes',
    'transacao-editar' => 'transacoes',
    'transacao-excluir' => 'transacoes',
    'assinatura-detalhe' => 'assinaturas',
    'assinatura-editar' => 'assinaturas',
    'assinatura-cancelar' => 'assinaturas',
    'pagamento-detalhe' => 'pagamentos',
    'pagamento-aprovar' => 'pagamentos',
    'pagamento-rejeitar' => 'pagamentos',
];

$financeiro_active_item = $financeiro_page_to_item[$financeiro_pagina_atual] ?? 'dashboard';

// ============================================
// FUNÇÕES PARA DETERMINAR CLASSE ACTIVE
// ============================================
function financeiro_isActive($item, $current)
{
    return $item === $current ? 'active' : '';
}
?>

<!-- ========================================== -->
<!-- BOTTOM NAVIGATION - MOBILE                 -->
<!-- ========================================== -->
<nav class="bottom-nav" id="bottomNav">
    <div class="nav-items">
        <!-- Voltar -->
        <a href="../index.php" class="nav-item" title="Dashboard Principal">
            <i class="fas fa-arrow-left"></i>
            <span>Voltar</span>
        </a>

        <!-- Dashboard -->
        <a href="index.php" class="nav-item <?php echo financeiro_isActive('dashboard', $financeiro_active_item); ?>">
            <i class="fas fa-chart-pie"></i>
            <span>Dashboard</span>
        </a>

        <!-- Transações -->
        <a href="transacoes.php" class="nav-item <?php echo financeiro_isActive('transacoes', $financeiro_active_item); ?>">
            <i class="fas fa-exchange-alt"></i>
            <span>Transações</span>
            <?php if ($total_transacoes > 0): ?>
                <span class="badge"><?php echo $total_transacoes; ?></span>
            <?php endif; ?>
        </a>

        <!-- Assinaturas -->
        <a href="assinaturas.php" class="nav-item <?php echo financeiro_isActive('assinaturas', $financeiro_active_item); ?>">
            <i class="fas fa-crown"></i>
            <span>Assinaturas</span>
            <?php if (isset($stats['assinaturas_ativas']) && $stats['assinaturas_ativas'] > 0): ?>
                <span class="badge"><?php echo $stats['assinaturas_ativas']; ?></span>
            <?php endif; ?>
        </a>

        <!-- Pagamentos -->
        <a href="pagamentos.php" class="nav-item <?php echo financeiro_isActive('pagamentos', $financeiro_active_item); ?>">
            <i class="fas fa-credit-card"></i>
            <span>Pagamentos</span>
            <?php if (isset($stats['pagamentos_pendentes']) && $stats['pagamentos_pendentes'] > 0): ?>
                <span class="badge badge-warning"><?php echo $stats['pagamentos_pendentes']; ?></span>
            <?php endif; ?>
        </a>

        <!-- Menu (toggle sidebar) -->
        <a href="#" class="nav-item menu-toggle" id="bottomMenuToggle" onclick="toggleSidebarMobile(event)">
            <i class="fas fa-bars"></i>
            <span>Menu</span>
            <?php if ($notificacoes_count > 0): ?>
                <span class="badge" id="bottomNotifBadge"><?php echo $notificacoes_count; ?></span>
            <?php endif; ?>
        </a>
    </div>
</nav>

<!-- ========================================== -->
<!-- SIDEBAR OVERLAY - MOBILE                  -->
<!-- ========================================== -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="fecharSidebarMobile()"></div>

<!-- ========================================== -->
<!-- SCRIPT PARA TOGGLE DO SIDEBAR             -->
<!-- ========================================== -->
<script>
    // ============================================
    // TOGGLE SIDEBAR MOBILE
    // ============================================
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
                if (icon) {
                    icon.className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
                }
            }

            document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
        }
    }

    function fecharSidebarMobile() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if (sidebar) {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');

            const menuBtn = document.getElementById('bottomMenuToggle');
            if (menuBtn) {
                const icon = menuBtn.querySelector('i');
                if (icon) icon.className = 'fas fa-bars';
            }

            document.body.style.overflow = '';
        }
    }

    // Fechar sidebar ao clicar fora
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const menuBtn = document.getElementById('bottomMenuToggle');

        if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
            if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
                fecharSidebarMobile();
            }
        }
    });

    // Fechar sidebar com tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            fecharSidebarMobile();
        }
    });

    // Reajustar sidebar ao redimensionar a tela
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            fecharSidebarMobile();
        }
    });
</script>

