<?php
// includes/bottom-nav.php - Bottom Navigation Mobile
// Este arquivo deve ser incluído em todas as páginas

// ============================================
// ÍTENS DO BOTTOM NAVIGATION
// ============================================
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Utilizadores', 'link' => 'admins.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => false],
    ['icon' => 'fa-chart-pie', 'label' => 'Financeiro', 'link' => 'financeiro/index.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];

// ============================================
// VERIFICAR QUAL ÍTEM ESTÁ ATIVO
// ============================================
// A variável $pagina_atual deve ser definida em cada página
// Exemplos: $pagina_atual = 'dashboard', 'admins', 'projetos', 'financeiro'

if (!isset($pagina_atual)) {
    $pagina_atual = 'dashboard'; // Valor padrão
}

// Mapeamento de páginas para itens do bottom nav
$page_to_bottom = [
    'dashboard' => 'Dashboard',
    'admin-usuarios' => 'Utilizadores',
    'projetos-global' => 'Projetos',
    'financeiro' => 'Financeiro',
    'transacoes' => 'Financeiro',
    'assinaturas' => 'Financeiro',
    'pagamentos' => 'Financeiro',
    'faturas' => 'Financeiro',
    'comissoes' => 'Financeiro',
    'relatorios' => 'Financeiro',
    'config' => 'Dashboard',
    'planos' => 'Dashboard',
    'modulos' => 'Dashboard',
    'integracoes' => 'Dashboard',
    'emails' => 'Dashboard',
    'sistema' => 'Dashboard',
    'permissoes' => 'Dashboard',
    'comunicacao' => 'Dashboard',
    'mensagens' => 'Dashboard',
];

// Atualizar o status active dos itens
$bottom_active_label = $page_to_bottom[$pagina_atual] ?? 'Dashboard';

foreach ($bottom_nav_items as $key => $item) {
    $bottom_nav_items[$key]['active'] = ($item['label'] === $bottom_active_label);
}

// ============================================
// FUNÇÕES PARA BADGES
// ============================================
function getBadgeCount($label)
{
    // Definir contagens para cada item
    $counts = [
        'Utilizadores' => isset($total_usuarios) ? $total_usuarios : 0,
        'Projetos' => isset($total_projetos) ? $total_projetos : 0,
        'Financeiro' => isset($notificacoes_financeiro) ? $notificacoes_financeiro : 0,
        'Menu' => isset($notificacoes_count) ? $notificacoes_count : 0,
    ];
    return $counts[$label] ?? 0;
}

function hasBadge($label)
{
    $badge_items = ['Utilizadores', 'Projetos', 'Financeiro', 'Menu'];
    return in_array($label, $badge_items);
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
                        <span class="badge"><?php echo $badge_count; ?></span>
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

            // Prevenir scroll quando sidebar está aberta
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
