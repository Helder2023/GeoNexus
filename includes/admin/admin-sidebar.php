<?php
// includes/admin-sidebar.php
// Sidebar do Painel Admin com lógica de active dinâmica

// Garantir que a página atual está definida
if (!isset($pagina_atual)) {
    // Tentar detectar automaticamente pelo nome do arquivo
    $current_file = basename($_SERVER['PHP_SELF']);
    $pagina_atual = str_replace('.php', '', $current_file);
}

// Função para verificar se o item está ativo (simplificada)
function isActive($page) {
    global $pagina_atual;
    return ($pagina_atual === $page) ? 'active' : '';
}

// Função para verificar se está em um grupo de páginas
function isActiveGroup($pages) {
    global $pagina_atual;
    if (!is_array($pages)) {
        $pages = [$pages];
    }
    // Verifica se a página atual está no grupo
    $is_active = in_array($pagina_atual, $pages);
    return $is_active ? 'active' : '';
}
?>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="index.php" class="logo">
            <div class="logo-icon">
                <i class="fas fa-globe-africa"></i>
            </div>
            <span class="logo-text">GeoNexus</span>
            <span class="logo-badge">Admin</span>
        </a>
        <button class="btn-toggle-sidebar" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    
    <div class="sidebar-user">
        <div class="avatar">
            <img src="../../assets/images/avatar-admin.png" alt="Admin">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <span class="name">Administrador</span>
            <span class="role">Super Admin</span>
        </div>
    </div>
    
    <nav class="sidebar-nav">
        <ul>
            <!-- ===== DASHBOARD ===== -->
            <li class="<?php echo isActive('dashboard') ?: isActive('index'); ?>">
                <a href="index.php">
                    <i class="fas fa-th-large icon"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <!-- ===== GESTÃO DE UTILIZADORES ===== -->
            <li class="menu-section">Utilizadores</li>
            
            <!-- Administradores -->
            <li class="<?php 
                $admin_pages = ['admin-usuarios', 'admin-detalhe', 'admin-editar', 'admin-permissoes', 'admin-historico', 'admin-suspender', 'admin-excluir', 'admins', 'admin-validar'];
                echo in_array($pagina_atual, $admin_pages) ? 'active' : '';
            ?>">
                <a href="admins.php">
                    <i class="fas fa-users-cog icon"></i>
                    <span>Todos os Administradores</span>
                    <span class="badge badge-primary"><?php echo number_format($total_usuarios ?? 0); ?></span>
                </a>
            </li>
            
            <!-- Validar Administradores -->
            <li class="<?php echo isActive('validar'); ?>">
                <a href="admin-validar.php">
                    <i class="fas fa-user-check icon"></i>
                    <span>Validar Administradores</span>
                    <span class="badge badge-warning"><?php echo $pendentes_validacao ?? 0; ?></span>
                </a>
            </li>
            
            <!-- Empresas -->
            <li class="<?php 
                $empresa_pages = ['empresas', 'empresa-detalhe', 'empresa-editar', 'empresa-suspender', 'empresa-historico', 'empresa-projetos', 'empresa-excluir'];
                echo in_array($pagina_atual, $empresa_pages) ? 'active' : '';
            ?>">
                <a href="empresas.php">
                    <i class="fas fa-building icon"></i>
                    <span>Empresas</span>
                </a>
            </li>
            
            <!-- Profissionais -->
            <li class="<?php 
                $individual_pages = ['individuais', 'individual-detalhe', 'individual-editar', 'individual-excluir', 'individual-suspender', 'individual-historico'];
                echo in_array($pagina_atual, $individual_pages) ? 'active' : '';
            ?>">
                <a href="individuais.php">
                    <i class="fas fa-user-tie icon"></i>
                    <span>Profissionais</span>
                </a>
            </li>
            
            <!-- Instituições -->
            <li class="<?php 
                $instituicao_pages = ['instituicoes', 'instituicao-detalhe', 'instituicao-editar', 'instituicao-excluir', 'instituicao-suspender', 'instituicao-historico'];
                echo in_array($pagina_atual, $instituicao_pages) ? 'active' : '';
            ?>">
                <a href="instituicoes.php">
                    <i class="fas fa-university icon"></i>
                    <span>Instituições</span>
                </a>
            </li>
            
            <!-- ===== CONTEÚDO ===== -->
            <li class="menu-section">Conteúdo</li>
            
            <!-- Projetos -->
            <li class="<?php 
                $projeto_pages = ['projetos-global', 'projeto-detalhe', 'projeto-editar', 'projeto-excluir'];
                echo in_array($pagina_atual, $projeto_pages) ? 'active' : '';
            ?>">
                <a href="projetos-global.php">
                    <i class="fas fa-project-diagram icon"></i>
                    <span>Projetos</span>
                    <span class="badge badge-primary"><?php echo number_format($total_projetos ?? 0); ?></span>
                </a>
            </li>
            
            <!-- Blog -->
            <li class="<?php 
                $blog_pages = ['blog', 'blog-artigo', 'blog-editar', 'blog-excluir'];
                echo in_array($pagina_atual, $blog_pages) ? 'active' : '';
            ?>">
                <a href="blog.php">
                    <i class="fas fa-blog icon"></i>
                    <span>Blog</span>
                </a>
            </li>
            
            <!-- Mensagens -->
            <li class="<?php echo isActive('mensagens'); ?>">
                <a href="mensagens.php">
                    <i class="fas fa-envelope icon"></i>
                    <span>Mensagens</span>
                    <span class="badge badge-danger"><?php echo $notificacoes_count ?? 0; ?></span>
                </a>
            </li>
            
            <!-- ===== FINANCEIRO (AGRUPADO) ===== -->
            <li class="menu-section">Financeiro</li>
            
            <!-- Financeiro - Único Link para o Dashboard -->
            <li class="<?php 
                $financeiro_pages = ['financeiro', 'financeiro-index', 'financeiro-transacoes', 'financeiro-assinaturas', 'financeiro-pagamentos', 'financeiro-faturas'];
                echo in_array($pagina_atual, $financeiro_pages) ? 'active' : '';
            ?>">
                <a href="financeiro/index.php">
                    <i class="fas fa-coins icon"></i>
                    <span>Financeiro</span>
                </a>
            </li>
            
            <!-- ===== SUPORTE ===== -->
            <li class="menu-section">Suporte</li>
            
            <!-- Tickets -->
            <li class="<?php echo isActive('suporte-tickets'); ?>">
                <a href="suporte-tickets.php">
                    <i class="fas fa-ticket-alt icon"></i>
                    <span>Tickets</span>
                    <span class="badge badge-warning"><?php echo $total_tickets ?? 0; ?></span>
                </a>
            </li>
            
            <!-- Logs -->
            <li class="<?php echo isActive('logs-auditoria'); ?>">
                <a href="logs-auditoria.php">
                    <i class="fas fa-history icon"></i>
                    <span>Logs de Auditoria</span>
                </a>
            </li>
            
            <!-- Backups -->
            <li class="<?php echo isActive('backup'); ?>">
                <a href="backup.php">
                    <i class="fas fa-database icon"></i>
                    <span>Backups</span>
                </a>
            </li>
            
            <!-- ===== CONFIGURAÇÕES ===== -->
            <li class="menu-section">Sistema</li>
            
            <!-- Configurações -->
            <li class="<?php 
                $config_pages = ['config-sistema', 'config-planos', 'config-modulos', 'config-integracoes', 'config-emails', 'config-permissoes-gerais'];
                echo in_array($pagina_atual, $config_pages) ? 'active' : '';
            ?>">
                <a href="config/index.php">
                    <i class="fas fa-cog icon"></i>
                    <span>Configurações</span>
                </a>
            </li>
            
            <!-- ===== RELATÓRIOS ===== -->
            <li class="<?php echo isActive('relatorios-globais'); ?>">
                <a href="relatorios-globais.php">
                    <i class="fas fa-file-alt icon"></i>
                    <span>Relatórios</span>
                </a>
            </li>
            
            <!-- ===== MAPA GLOBAL ===== -->
            <li class="<?php echo isActive('mapa-global'); ?>">
                <a href="mapa-global.php">
                    <i class="fas fa-map-marked-alt icon"></i>
                    <span>Mapa Global</span>
                </a>
            </li>
            
            <!-- ===== LOGOUT ===== -->
            <li class="logout-item">
                <a href="../../public/logout.php">
                    <i class="fas fa-sign-out-alt icon"></i>
                    <span>Sair</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<?php include "admin-botoesNavegacaoMobile.php" ?>
