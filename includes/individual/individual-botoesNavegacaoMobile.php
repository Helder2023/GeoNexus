<?php
// includes/individual-botoesNavegacaoMobile.php - Bottom Navigation Mobile
// Este arquivo deve ser incluído em todas as páginas do painel individual

// ============================================
// ÍTENS DO BOTTOM NAVIGATION - INDIVIDUAL
// ============================================
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos.php', 'active' => false],
    ['icon' => 'fa-chart-pie', 'label' => 'Financeiro', 'link' => 'financeiro/index.php', 'active' => false],
    ['icon' => 'fa-tools', 'label' => 'Serviços', 'link' => 'servicos/index.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];

// ============================================
// VERIFICAR QUAL ÍTEM ESTÁ ATIVO
// ============================================
// A variável $pagina_atual deve ser definida em cada página
if (!isset($pagina_atual)) {
    $pagina_atual = 'dashboard'; // Valor padrão
}

// Mapeamento de páginas para itens do bottom nav
$page_to_bottom = [
    // Dashboard
    'dashboard' => 'Dashboard',
    
    // Projetos
    'projetos' => 'Projetos',
    'projeto-criar' => 'Projetos',
    'projeto-editar' => 'Projetos',
    'projeto-detalhe' => 'Projetos',
    'projeto-excluir' => 'Projetos',
    'projeto-arquivar' => 'Projetos',
    
    // Financeiro
    'financeiro' => 'Financeiro',
    'transacoes' => 'Financeiro',
    'transacao-criar' => 'Financeiro',
    'transacao-editar' => 'Financeiro',
    'transacao-detalhe' => 'Financeiro',
    'transacao-excluir' => 'Financeiro',
    'pagamentos' => 'Financeiro',
    'pagamento-criar' => 'Financeiro',
    'pagamento-detalhe' => 'Financeiro',
    'pagamento-comprovativo' => 'Financeiro',
    'fluxo-caixa' => 'Financeiro',
    'orcamentos' => 'Financeiro',
    'orcamento-criar' => 'Financeiro',
    'orcamento-editar' => 'Financeiro',
    'orcamento-excluir' => 'Financeiro',
    'faturas' => 'Financeiro',
    'fatura-criar' => 'Financeiro',
    'fatura-editar' => 'Financeiro',
    'fatura-detalhe' => 'Financeiro',
    'fatura-cancelar' => 'Financeiro',
    'clientes' => 'Financeiro',
    'cliente-cadastrar' => 'Financeiro',
    'cliente-editar' => 'Financeiro',
    'cliente-excluir' => 'Financeiro',
    'metas' => 'Financeiro',
    'meta-criar' => 'Financeiro',
    'meta-editar' => 'Financeiro',
    'meta-excluir' => 'Financeiro',
    'relatorios-financeiros' => 'Financeiro',
    
    // Serviços
    'servicos' => 'Serviços',
    'servico-cadastrar' => 'Serviços',
    'servico-editar' => 'Serviços',
    'servico-excluir' => 'Serviços',
    'portfolio' => 'Serviços',
    'precos' => 'Serviços',
    
    // Outros (mantém Dashboard ativo)
    'equipamentos' => 'Dashboard',
    'equipamento-cadastrar' => 'Dashboard',
    'equipamento-editar' => 'Dashboard',
    'equipamento-excluir' => 'Dashboard',
    'documentos' => 'Dashboard',
    'documento-upload' => 'Dashboard',
    'documento-excluir' => 'Dashboard',
    'modelo-3d' => 'Dashboard',
    'relatorios' => 'Dashboard',
    'relatorio-criar' => 'Dashboard',
    'perfil' => 'Dashboard',
    'configuracoes' => 'Dashboard',
    'assinatura' => 'Dashboard',
    'notificacoes' => 'Dashboard',
    
    // Setores (mantém Dashboard ativo)
    'topografia' => 'Dashboard',
    'engenharia' => 'Dashboard',
    'cadastro' => 'Dashboard',
    'gis' => 'Dashboard',
    'agricultura' => 'Dashboard',
    'mineracao' => 'Dashboard',
    'petroleo' => 'Dashboard',
    'energia' => 'Dashboard',
    'urbanismo' => 'Dashboard',
    'transportes' => 'Dashboard',
    'drones' => 'Dashboard',
    'educacao' => 'Dashboard',
];

// Atualizar o status active dos itens
$bottom_active_label = isset($page_to_bottom[$pagina_atual]) ? $page_to_bottom[$pagina_atual] : 'Dashboard';

foreach ($bottom_nav_items as $key => $item) {
    $bottom_nav_items[$key]['active'] = ($item['label'] === $bottom_active_label);
}

// ============================================
// FUNÇÕES PARA BADGES
// ============================================
if (!function_exists('getBadgeCount')) {
    function getBadgeCount($label)
    {
        // Definir contagens para cada item
        $counts = [
            'Projetos' => isset($total_projetos) ? $total_projetos : 0,
            'Financeiro' => isset($notificacoes_financeiro) ? $notificacoes_financeiro : 0,
            'Serviços' => isset($total_servicos) ? $total_servicos : 0,
            'Menu' => isset($notificacoes_count) ? $notificacoes_count : 0,
        ];
        return isset($counts[$label]) ? $counts[$label] : 0;
    }
}

if (!function_exists('hasBadge')) {
    function hasBadge($label)
    {
        $badge_items = ['Projetos', 'Financeiro', 'Serviços', 'Menu'];
        return in_array($label, $badge_items);
    }
}

if (!function_exists('individualGetBadgeClass')) {
    function individualGetBadgeClass($label)
    {
        $classes = [
            'Projetos' => 'badge-primary',
            'Financeiro' => 'badge-warning',
            'Serviços' => 'badge-info',
            'Menu' => 'badge-danger',
        ];
        return isset($classes[$label]) ? $classes[$label] : 'badge-primary';
    }
}
?>

<!-- ========================================== -->
<!-- BOTTOM NAVIGATION - MOBILE                 -->
<!-- ========================================== -->
<nav class="bottom-nav" id="bottomNav">
    <div class="nav-items">
        <?php foreach ($bottom_nav_items as $item): ?>
            <a href="<?php echo $item['link']; ?>"
                class="nav-item <?php echo $item['active'] ? 'active' : ''; ?> <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'menu-toggle' : ''; ?>"
                <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'id="bottomMenuToggle"' : ''; ?>
                <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'onclick="toggleSidebarMobile(event)"' : ''; ?>>
                <i class="fas <?php echo $item['icon']; ?>"></i>
                <span><?php echo $item['label']; ?></span>
                <?php if (hasBadge($item['label'])): ?>
                    <?php $badge_count = getBadgeCount($item['label']); ?>
                    <?php if ($badge_count > 0): ?>
                        <span class="badge <?php echo individualGetBadgeClass($item['label']); ?>">
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

                // Prevenir scroll quando sidebar está aberta
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

        // ============================================
        // FECHAR SIDEBAR COM TECLA ESC
        // ============================================
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                window.fecharSidebarMobile();
            }
        });

        // ============================================
        // REAJUSTAR SIDEBAR AO REDIMENSIONAR
        // ============================================
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                window.fecharSidebarMobile();
            }
        });
    }
</script>

<!-- ========================================== -->
<!-- CSS DO BOTTOM NAVIGATION - INDIVIDUAL      -->
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
        background: #FF6B6B;
        color: #FFFFFF;
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

    .bottom-nav .nav-item.active {
        color: #00D2FF;
    }

    .bottom-nav .nav-item.active i {
        transform: scale(1.1);
    }

    .bottom-nav .nav-item.active span {
        color: #00D2FF;
        font-weight: 600;
    }

    .bottom-nav .nav-item.active::before {
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

    .bottom-nav .nav-item.menu-toggle {
        color: #FFD93D;
    }

    .bottom-nav .nav-item.menu-toggle.active {
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

        /* Ajustar main-content para não ficar atrás do bottom nav */
        .main-content {
            padding-bottom: 80px;
        }

        /* Ajustar sidebar para ficar acima do bottom nav */
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

        .bottom-nav .nav-item.active::before {
            width: 18px;
        }
    }
</style>