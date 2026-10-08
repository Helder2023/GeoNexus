<?php
// includes/individual/individual-botoesNavegacaoMobile.php
// Bottom Navigation Mobile - Módulo de Serviços
// Este arquivo deve ser incluído em todas as páginas do módulo de Serviços

// ============================================
// ÍTENS DO BOTTOM NAVIGATION - SERVIÇOS
// ============================================
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Serviços', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-plus-circle', 'label' => 'Cadastrar', 'link' => 'servico-cadastrar.php', 'active' => false],
    ['icon' => 'fa-images', 'label' => 'Portfólio', 'link' => 'portfolio.php', 'active' => false],
    ['icon' => 'fa-tags', 'label' => 'Preços', 'link' => 'precos.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];

// ============================================
// VERIFICAR QUAL ÍTEM ESTÁ ATIVO
// ============================================
if (!isset($pagina_atual)) {
    $pagina_atual = 'servicos';
}

// Mapeamento de páginas para itens do bottom nav
$page_to_bottom = [
    // Serviços (lista principal)
    'servicos' => 'Serviços',
    'index' => 'Serviços',
    'servico-detalhe' => 'Serviços',
    
    // Cadastrar
    'servico-cadastrar' => 'Cadastrar',
    
    // Portfólio
    'portfolio' => 'Portfólio',
    
    // Preços
    'precos' => 'Preços',
    
    // Outros (mantém Serviços ativo)
    'servico-editar' => 'Serviços',
    'servico-excluir' => 'Serviços',
    'estatisticas' => 'Serviços',
    'avaliacoes' => 'Serviços',
    'contratacoes' => 'Serviços',
];

// Atualizar o status active dos itens
$bottom_active_label = isset($page_to_bottom[$pagina_atual]) ? $page_to_bottom[$pagina_atual] : 'Serviços';

foreach ($bottom_nav_items as $key => $item) {
    $bottom_nav_items[$key]['active'] = ($item['label'] === $bottom_active_label);
}

// ============================================
// FUNÇÕES PARA BADGES
// ============================================
if (!function_exists('getBadgeCountServicos')) {
    function getBadgeCountServicos($label)
    {
        $counts = [
            'Serviços' => isset($total_servicos) ? $total_servicos : 0,
            'Cadastrar' => 0,
            'Portfólio' => isset($total_portfolio) ? $total_portfolio : 0,
            'Preços' => isset($total_precos) ? $total_precos : 0,
            'Menu' => isset($notificacoes_count) ? $notificacoes_count : 0,
        ];
        return isset($counts[$label]) ? $counts[$label] : 0;
    }
}

if (!function_exists('hasBadgeServicos')) {
    function hasBadgeServicos($label)
    {
        $badge_items = ['Serviços', 'Portfólio', 'Preços', 'Menu'];
        return in_array($label, $badge_items);
    }
}

if (!function_exists('getBadgeClassServicos')) {
    function getBadgeClassServicos($label)
    {
        $classes = [
            'Serviços' => 'badge-primary',
            'Portfólio' => 'badge-info',
            'Preços' => 'badge-warning',
            'Menu' => 'badge-danger',
        ];
        return isset($classes[$label]) ? $classes[$label] : 'badge-primary';
    }
}
?>

<!-- ========================================== -->
<!-- BOTTOM NAVIGATION - MOBILE (SERVIÇOS)      -->
<!-- ========================================== -->
<nav class="bottom-nav bottom-nav-servicos" id="bottomNav">
    <div class="nav-items">
        <?php foreach ($bottom_nav_items as $item): ?>
            <a href="<?php echo $item['link']; ?>"
                class="nav-item <?php echo $item['active'] ? 'active' : ''; ?> <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'menu-toggle' : ''; ?>"
                <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'id="bottomMenuToggle"' : ''; ?>
                <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'onclick="toggleSidebarMobile(event)"' : ''; ?>>
                <i class="fas <?php echo $item['icon']; ?>"></i>
                <span><?php echo $item['label']; ?></span>
                <?php if (hasBadgeServicos($item['label'])): ?>
                    <?php $badge_count = getBadgeCountServicos($item['label']); ?>
                    <?php if ($badge_count > 0): ?>
                        <span class="badge <?php echo getBadgeClassServicos($item['label']); ?>">
                            <?php echo $badge_count; ?>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
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
    if (typeof window.toggleSidebarMobile === 'undefined') {
        window.toggleSidebarMobile = function(event) {
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
        };
    }
    var toggleSidebarMobile = window.toggleSidebarMobile;

    // ============================================
    // FECHAR SIDEBAR MOBILE
    // ============================================
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

    // ============================================
    // FECHAR SIDEBAR AO CLICAR FORA
    // ============================================
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
            if (e.key === 'Escape') {
                window.fecharSidebarMobile();
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                window.fecharSidebarMobile();
            }
        });
    }
</script>

<!-- ========================================== -->
<!-- CSS DO BOTTOM NAVIGATION - SERVIÇOS        -->
<!-- ========================================== -->
<style>
    /* ========================================== */
    /* BOTTOM NAVIGATION - MOBILE                 */
    /* ========================================== */
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
        -webkit-backdrop-filter: blur(10px);
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

    .bottom-nav .nav-item i {
        font-size: 20px;
        transition: var(--transition-smooth);
    }

    .bottom-nav .nav-item span {
        font-size: 10px;
        font-weight: 500;
        transition: var(--transition-smooth);
    }

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

    /* Cores dos badges */
    .bottom-nav .nav-item .badge.badge-primary { background: #00D2FF; color: #FFFFFF; }
    .bottom-nav .nav-item .badge.badge-info { background: #6C2BD9; color: #FFFFFF; }
    .bottom-nav .nav-item .badge.badge-warning { background: #FFD93D; color: #1A1A2E; }
    .bottom-nav .nav-item .badge.badge-danger { background: #FF6B6B; color: #FFFFFF; }
    .bottom-nav .nav-item .badge.badge-success { background: #00FFA3; color: #0A1628; }

    .bottom-nav .nav-item:hover {
        color: var(--text-primary);
        background: var(--bg-card-hover);
    }

    /* ========================================== */
    /* COR ATIVA - VERDE (MÓDULO SERVIÇOS)        */
    /* ========================================== */
    .bottom-nav-servicos .nav-item.active {
        color: #00FFA3;
    }

    .bottom-nav-servicos .nav-item.active i {
        transform: scale(1.1);
    }

    .bottom-nav-servicos .nav-item.active span {
        color: #00FFA3;
        font-weight: 600;
    }

    .bottom-nav-servicos .nav-item.active::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 24px;
        height: 3px;
        background: linear-gradient(90deg, #00FFA3 0%, #00D2FF 100%);
        border-radius: 0 0 3px 3px;
    }

    .bottom-nav-servicos .nav-item.menu-toggle {
        color: #FFD93D;
    }

    .bottom-nav-servicos .nav-item.menu-toggle.active {
        color: #FF6B6B;
    }

    /* ========================================== */
    /* SIDEBAR OVERLAY                           */
    /* ========================================== */
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
        -webkit-backdrop-filter: blur(4px);
    }

    .sidebar-overlay.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* ========================================== */
    /* RESPONSIVIDADE - MOSTRAR BOTTOM NAV       */
    /* ========================================== */
    @media (max-width: 768px) {
        .bottom-nav {
            display: block;
        }

        .main-content {
            padding-bottom: 80px;
        }

        #sidebar {
            z-index: 1001;
            padding-bottom: 80px;
        }
    }

    @media (max-width: 480px) {
        .bottom-nav .nav-item {
            padding: 4px 6px;
            min-width: 40px;
        }

        .bottom-nav .nav-item i {
            font-size: 18px;
        }

        .bottom-nav .nav-item span {
            font-size: 9px;
        }

        .bottom-nav .nav-item .badge {
            font-size: 8px;
            min-width: 14px;
            height: 14px;
            top: 1px;
            right: 4px;
        }

        .main-content {
            padding-bottom: 70px;
        }
    }

    @media (max-width: 360px) {
        .bottom-nav .nav-item {
            padding: 2px 4px;
            min-width: 34px;
        }

        .bottom-nav .nav-item i {
            font-size: 16px;
        }

        .bottom-nav .nav-item span {
            font-size: 8px;
        }

        .bottom-nav-servicos .nav-item.active::before {
            width: 18px;
        }
    }
</style>