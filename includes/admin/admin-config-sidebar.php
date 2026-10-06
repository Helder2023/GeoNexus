<?php
// includes/admin-config-sidebar.php
// Sidebar do painel de configuração

// ===== VARIÁVEIS PADRÃO (caso não estejam definidas) =====
$pagina_atual_sidebar = $pagina_atual_sidebar ?? 'config';

// ===== FUNÇÃO PARA VERIFICAR PÁGINA ATIVA =====
function isActive($pages, $current) {
    if (is_array($pages)) {
        return in_array($current, $pages) ? 'active' : '';
    }
    return ($current === $pages) ? 'active' : '';
}
?>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="index.php" class="logo">
            <div class="logo-icon">
                <i class="fas fa-globe-africa"></i>
            </div>
            <span class="logo-text">GeoNexus</span>
            <span class="logo-badge">Config</span>
        </a>
        <button class="btn-toggle-sidebar" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="sidebar-user">
        <div class="avatar">
            <img src="../../../assets/images/avatar-admin.png" alt="Admin">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <span class="name">Administrador</span>
            <span class="role">Super Admin</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <!-- ===== VOLTAR PAINEL PRINCIPAL ===== -->
            <li>
                <a href="../index.php" title="Voltar ao Painel Principal">
                    <i class="fas fa-arrow-left icon" style="color: #00D2FF;"></i>
                    <span>Painel Principal</span>
                </a>
            </li>

            <!-- ===== DASHBOARD ===== -->
            <li class="menu-section">Configurações</li>

            <li class="<?php echo isActive(['config', 'config-index'], $pagina_atual_sidebar); ?>">
                <a href="index.php">
                    <i class="fas fa-home icon"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- ===== PLANOS ===== -->
            <li class="menu-section">Planos</li>

            <li class="<?php echo isActive(['planos', 'plano-criar', 'plano-editar', 'plano-excluir'], $pagina_atual_sidebar); ?>">
                <a href="planos.php">
                    <i class="fas fa-crown icon"></i>
                    <span>Planos</span>
                </a>
            </li>

            <!-- ===== MÓDULOS ===== -->
            <li class="menu-section">Módulos</li>

            <li class="<?php echo isActive(['modulos', 'modulo-editar', 'modulo-ativar', 'modulo-desativar'], $pagina_atual_sidebar); ?>">
                <a href="modulos.php">
                    <i class="fas fa-puzzle-piece icon"></i>
                    <span>Módulos</span>
                </a>
            </li>

            <!-- ===== EMAILS ===== -->
            <li class="menu-section">Emails</li>

            <li class="<?php echo isActive(['emails', 'email-editar'], $pagina_atual_sidebar); ?>">
                <a href="emails.php">
                    <i class="fas fa-envelope icon"></i>
                    <span>Templates de Email</span>
                </a>
            </li>

            <!-- ===== SISTEMA ===== -->
            <li class="menu-section">Sistema</li>

            <li class="<?php echo isActive(['sistema', 'sistema-editar'], $pagina_atual_sidebar); ?>">
                <a href="sistema.php">
                    <i class="fas fa-cog icon"></i>
                    <span>Configurações Gerais</span>
                </a>
            </li>

            <!-- ===== PERMISSÕES ===== -->
            <li class="<?php echo isActive(['permissoes-gerais'], $pagina_atual_sidebar); ?>">
                <a href="permissoes-gerais.php">
                    <i class="fas fa-lock icon"></i>
                    <span>Permissões Globais</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>

