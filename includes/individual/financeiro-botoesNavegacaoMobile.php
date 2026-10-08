<?php
// includes/individual/individual-botoesNavegacaoMobile-financeiro.php
// Bottom Navigation Mobile - Módulo Financeiro

$bottom_nav_items = [
    ['icon' => 'fa-chart-pie', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-exchange-alt', 'label' => 'Transações', 'link' => 'transacoes.php', 'active' => false],
    ['icon' => 'fa-file-invoice', 'label' => 'Faturas', 'link' => 'faturas.php', 'active' => false],
    ['icon' => 'fa-money-bill-wave', 'label' => 'Pagamentos', 'link' => 'pagamentos.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];

if (!isset($pagina_atual)) {
    $pagina_atual = 'financeiro';
}

$page_to_bottom = [
    'financeiro' => 'Dashboard',
    'index' => 'Dashboard',
    'fluxo-caixa' => 'Dashboard',
    'metas' => 'Dashboard',
    'meta-criar' => 'Dashboard',
    'meta-editar' => 'Dashboard',
    'meta-excluir' => 'Dashboard',
    'relatorios-financeiros' => 'Dashboard',
    'transacoes' => 'Transações',
    'transacao-criar' => 'Transações',
    'transacao-editar' => 'Transações',
    'transacao-detalhe' => 'Transações',
    'transacao-excluir' => 'Transações',
    'faturas' => 'Faturas',
    'fatura-criar' => 'Faturas',
    'fatura-editar' => 'Faturas',
    'fatura-detalhe' => 'Faturas',
    'fatura-cancelar' => 'Faturas',
    'orcamentos' => 'Faturas',
    'orcamento-criar' => 'Faturas',
    'orcamento-editar' => 'Faturas',
    'orcamento-excluir' => 'Faturas',
    'pagamentos' => 'Pagamentos',
    'pagamento-criar' => 'Pagamentos',
    'pagamento-detalhe' => 'Pagamentos',
    'pagamento-comprovativo' => 'Pagamentos',
    'clientes' => 'Pagamentos',
];

$bottom_active_label = isset($page_to_bottom[$pagina_atual]) ? $page_to_bottom[$pagina_atual] : 'Dashboard';

foreach ($bottom_nav_items as $key => $item) {
    $bottom_nav_items[$key]['active'] = ($item['label'] === $bottom_active_label);
}

if (!function_exists('getBadgeCountFinanceiro')) {
    function getBadgeCountFinanceiro($label) {
        $counts = [
            'Dashboard' => 0,
            'Transações' => isset($total_transacoes) ? $total_transacoes : 0,
            'Faturas' => isset($total_faturas_pendentes) ? $total_faturas_pendentes : 0,
            'Pagamentos' => isset($total_pagamentos_pendentes) ? $total_pagamentos_pendentes : 0,
            'Menu' => isset($notificacoes_count) ? $notificacoes_count : 0,
        ];
        return isset($counts[$label]) ? $counts[$label] : 0;
    }
}

if (!function_exists('hasBadgeFinanceiro')) {
    function hasBadgeFinanceiro($label) {
        return in_array($label, ['Transações', 'Faturas', 'Pagamentos', 'Menu']);
    }
}

if (!function_exists('getBadgeClassFinanceiro')) {
    function getBadgeClassFinanceiro($label) {
        $classes = [
            'Transações' => 'badge-primary',
            'Faturas' => 'badge-warning',
            'Pagamentos' => 'badge-danger',
            'Menu' => 'badge-danger',
        ];
        return isset($classes[$label]) ? $classes[$label] : 'badge-primary';
    }
}
?>

<nav class="bottom-nav bottom-nav-financeiro" id="bottomNav">
    <div class="nav-items">
        <?php foreach ($bottom_nav_items as $item): ?>
            <a href="<?php echo $item['link']; ?>"
                class="nav-item <?php echo $item['active'] ? 'active' : ''; ?> <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'menu-toggle' : ''; ?>"
                <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'id="bottomMenuToggle"' : ''; ?>
                <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'onclick="toggleSidebarMobile(event)"' : ''; ?>>
                <i class="fas <?php echo $item['icon']; ?>"></i>
                <span><?php echo $item['label']; ?></span>
                <?php if (hasBadgeFinanceiro($item['label'])): ?>
                    <?php $badge_count = getBadgeCountFinanceiro($item['label']); ?>
                    <?php if ($badge_count > 0): ?>
                        <span class="badge <?php echo getBadgeClassFinanceiro($item['label']); ?>">
                            <?php echo $badge_count; ?>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>
</nav>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="fecharSidebarMobile()"></div>

<script>
if (typeof window.toggleSidebarMobile === 'undefined') {
    window.toggleSidebarMobile = function(event) {
        if (event) { event.preventDefault(); event.stopPropagation(); }
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        if (sidebar) {
            sidebar.classList.toggle('open');
            if (overlay) overlay.classList.toggle('active');
            const menuBtn = document.getElementById('bottomMenuToggle');
            if (menuBtn) {
                const icon = menuBtn.querySelector('i');
                if (icon) icon.className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
            }
            document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
        }
    };
}
var toggleSidebarMobile = window.toggleSidebarMobile;

if (typeof window.fecharSidebarMobile === 'undefined') {
    window.fecharSidebarMobile = function() {
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
    };
}
var fecharSidebarMobile = window.fecharSidebarMobile;

if (typeof window.sidebarClickListenerAdded === 'undefined') {
    window.sidebarClickListenerAdded = true;
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const menuBtn = document.getElementById('bottomMenuToggle');
        if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
            if (!sidebar.contains(e.target) && !(menuBtn && menuBtn.contains(e.target))) {
                window.fecharSidebarMobile();
            }
        }
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') window.fecharSidebarMobile();
    });
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) window.fecharSidebarMobile();
    });
}
</script>

<style>
.bottom-nav {
    display: none;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: var(--bg-card);
    border-top: 1px solid var(--border-color);
    box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.15);
    backdrop-filter: blur(10px);
    padding: 4px 0 env(safe-area-inset-bottom, 8px) 0;
}

.bottom-nav .nav-items {
    display: flex;
    justify-content: space-around;
    align-items: center;
    max-width: 600px;
    margin: 0 auto;
    gap: 2px;
}

.bottom-nav .nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 6px 8px;
    border-radius: var(--radius-md);
    text-decoration: none;
    color: var(--text-muted);
    transition: var(--transition-smooth);
    position: relative;
    min-width: 44px;
    gap: 2px;
    flex: 1;
}

.bottom-nav .nav-item i { font-size: 20px; transition: var(--transition-smooth); }
.bottom-nav .nav-item span { font-size: 10px; font-weight: 500; transition: var(--transition-smooth); }

.bottom-nav .nav-item .badge {
    position: absolute;
    top: 2px;
    right: 8px;
    font-size: 9px;
    font-weight: 700;
    min-width: 16px;
    height: 16px;
    padding: 0 4px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
    border: 2px solid var(--bg-card);
}

.bottom-nav .nav-item .badge.badge-primary { background: #00D2FF; color: #FFFFFF; }
.bottom-nav .nav-item .badge.badge-info { background: #6C2BD9; color: #FFFFFF; }
.bottom-nav .nav-item .badge.badge-warning { background: #FFD93D; color: #1A1A2E; }
.bottom-nav .nav-item .badge.badge-danger { background: #FF6B6B; color: #FFFFFF; }

.bottom-nav .nav-item:hover {
    color: var(--text-primary);
    background: var(--bg-card-hover);
}

.bottom-nav-financeiro .nav-item.active { color: #00D2FF; }
.bottom-nav-financeiro .nav-item.active i { transform: scale(1.1); }
.bottom-nav-financeiro .nav-item.active span { color: #00D2FF; font-weight: 600; }

.bottom-nav-financeiro .nav-item.active::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 24px;
    height: 3px;
    background: linear-gradient(90deg, #00D2FF 0%, #6C2BD9 100%);
    border-radius: 0 0 3px 3px;
}

.bottom-nav-financeiro .nav-item.menu-toggle { color: #FFD93D; }
.bottom-nav-financeiro .nav-item.menu-toggle.active { color: #FF6B6B; }

.sidebar-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 999;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
}

.sidebar-overlay.active { display: block; animation: fadeIn 0.3s ease; }

@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

@media (max-width: 768px) {
    .bottom-nav { display: block; }
    .main-content { padding-bottom: 80px; }
    #sidebar { z-index: 1001; padding-bottom: 80px; }
}

@media (max-width: 480px) {
    .bottom-nav .nav-item { padding: 4px 6px; min-width: 40px; }
    .bottom-nav .nav-item i { font-size: 18px; }
    .bottom-nav .nav-item span { font-size: 9px; }
    .bottom-nav .nav-item .badge { font-size: 8px; min-width: 14px; height: 14px; top: 1px; right: 4px; }
    .main-content { padding-bottom: 70px; }
}

@media (max-width: 360px) {
    .bottom-nav .nav-item { padding: 2px 4px; min-width: 34px; }
    .bottom-nav .nav-item i { font-size: 16px; }
    .bottom-nav .nav-item span { font-size: 8px; }
    .bottom-nav-financeiro .nav-item.active::before { width: 18px; }
}
</style>