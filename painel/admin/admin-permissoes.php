<?php
// painel/admin/admin-permissoes.php - Gerenciar Permissões do Administrador
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Gerenciar Permissões';
$pagina_atual = 'usuarios';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;



// Dados mockados - Administrador
$admin_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados do Administrador
$admin_data = [
    'id' => $admin_id,
    'nome' => 'João Silva',
    'email' => 'joao.silva@admin.com',
    'nivel' => 'Super Admin',
    'status' => 'ativo',
    'avatar' => 'avatar-1.png',
    'permissoes_atual' => 'Todas',
];

// Lista de todas as permissões disponíveis
$todas_permissoes = [
    [
        'id' => 'dashboard',
        'nome' => 'Dashboard',
        'descricao' => 'Acesso ao dashboard principal e visão geral',
        'icone' => 'fa-th-large',
        'categoria' => 'Geral'
    ],
    [
        'id' => 'usuarios',
        'nome' => 'Utilizadores',
        'descricao' => 'Gerenciar todos os utilizadores da plataforma',
        'icone' => 'fa-users-cog',
        'categoria' => 'Gestão'
    ],
    [
        'id' => 'validar',
        'nome' => 'Validar Utilizadores',
        'descricao' => 'Validar, aprovar ou rejeitar novos utilizadores',
        'icone' => 'fa-user-check',
        'categoria' => 'Gestão'
    ],
    [
        'id' => 'empresas',
        'nome' => 'Empresas',
        'descricao' => 'Gerenciar empresas parceiras',
        'icone' => 'fa-building',
        'categoria' => 'Gestão'
    ],
    [
        'id' => 'individuais',
        'nome' => 'Profissionais',
        'descricao' => 'Gerenciar profissionais autónomos',
        'icone' => 'fa-user-tie',
        'categoria' => 'Gestão'
    ],
    [
        'id' => 'instituicoes',
        'nome' => 'Instituições',
        'descricao' => 'Gerenciar instituições de ensino',
        'icone' => 'fa-university',
        'categoria' => 'Gestão'
    ],
    [
        'id' => 'projetos',
        'nome' => 'Projetos',
        'descricao' => 'Visualizar e gerenciar todos os projetos',
        'icone' => 'fa-project-diagram',
        'categoria' => 'Conteúdo'
    ],
    [
        'id' => 'blog',
        'nome' => 'Blog',
        'descricao' => 'Gerenciar artigos do blog',
        'icone' => 'fa-blog',
        'categoria' => 'Conteúdo'
    ],
    [
        'id' => 'mensagens',
        'nome' => 'Mensagens',
        'descricao' => 'Visualizar e responder mensagens',
        'icone' => 'fa-envelope',
        'categoria' => 'Conteúdo'
    ],
    [
        'id' => 'financeiro',
        'nome' => 'Financeiro',
        'descricao' => 'Acesso ao módulo financeiro completo',
        'icone' => 'fa-coins',
        'categoria' => 'Financeiro'
    ],
    [
        'id' => 'transacoes',
        'nome' => 'Transações',
        'descricao' => 'Visualizar e gerenciar transações',
        'icone' => 'fa-exchange-alt',
        'categoria' => 'Financeiro'
    ],
    [
        'id' => 'assinaturas',
        'nome' => 'Assinaturas',
        'descricao' => 'Gerenciar assinaturas de utilizadores',
        'icone' => 'fa-crown',
        'categoria' => 'Financeiro'
    ],
    [
        'id' => 'pagamentos',
        'nome' => 'Pagamentos',
        'descricao' => 'Gerenciar pagamentos e comprovativos',
        'icone' => 'fa-credit-card',
        'categoria' => 'Financeiro'
    ],
    [
        'id' => 'tickets',
        'nome' => 'Tickets',
        'descricao' => 'Gerenciar tickets de suporte',
        'icone' => 'fa-ticket-alt',
        'categoria' => 'Suporte'
    ],
    [
        'id' => 'logs',
        'nome' => 'Logs',
        'descricao' => 'Visualizar logs de auditoria',
        'icone' => 'fa-history',
        'categoria' => 'Suporte'
    ],
    [
        'id' => 'backup',
        'nome' => 'Backups',
        'descricao' => 'Gerenciar backups do sistema',
        'icone' => 'fa-database',
        'categoria' => 'Suporte'
    ],
    [
        'id' => 'config',
        'nome' => 'Configurações',
        'descricao' => 'Acesso às configurações do sistema',
        'icone' => 'fa-cog',
        'categoria' => 'Sistema'
    ],
    [
        'id' => 'permissoes',
        'nome' => 'Permissões Globais',
        'descricao' => 'Gerenciar permissões de administradores',
        'icone' => 'fa-lock',
        'categoria' => 'Sistema'
    ],
    [
        'id' => 'relatorios',
        'nome' => 'Relatórios',
        'descricao' => 'Gerar e visualizar relatórios',
        'icone' => 'fa-file-alt',
        'categoria' => 'Análises'
    ],
    [
        'id' => 'mapa',
        'nome' => 'Mapa Global',
        'descricao' => 'Visualizar mapa com todos os projetos',
        'icone' => 'fa-map-marked-alt',
        'categoria' => 'Análises'
    ]
];

// Categorias para agrupar permissões
$categorias = ['Geral', 'Gestão', 'Conteúdo', 'Financeiro', 'Suporte', 'Sistema', 'Análises'];

// Permissões atuais do administrador (mock - Super Admin tem todas)
$permissoes_ativas = array_column($todas_permissoes, 'id');

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admins.php', 'active' => true],
    ['icon' => 'fa-user-check', 'label' => 'Validar', 'link' => 'admin-validar.php', 'active' => false],
    ['icon' => 'fa-chart-pie', 'label' => 'Financeiro', 'link' => 'financeiro/index.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];


?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../includes/admin/admin-head.php" ?>

<body>
    <div class="app-container">
        <!-- Toast Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Overlay para sidebar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR                                    -->
        <!-- ========================================== -->
        <?php include "../../includes/admin/admin-sidebar.php" ?>

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
                        <?php if ($item['label'] === 'Administradores'): ?>
                            <span class="badge"><?php echo $total_usuarios; ?></span>
                        <?php endif; ?>
                        <?php if ($item['label'] === 'Menu'): ?>
                            <span class="badge" id="bottomNotifBadge"><?php echo $notificacoes_count; ?></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-lock icon"></i>
                        Gerenciar Permissões
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="admins.php">Administradores</a>
                        <span class="separator">/</span>
                        <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>"><?php echo $admin_data['nome']; ?></a>
                        <span class="separator">/</span>
                        <span>Permissões</span>
                    </p>
                </div>
                <div class="header-right">
                    <!-- Botão Tema Dark/Light -->
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                    <?php include "../../includes/admin/notificacoes-admin.php" ?>


                    <div class="header-actions">
                        <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button class="btn btn-primary" onclick="salvarPermissoes()">
                            <i class="fas fa-save"></i> Salvar Permissões
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== INFORMAÇÕES DO ADMINISTRADOR ===== -->
            <div class="admin-info-card animate-fade-up">
                <div class="admin-info-avatar">
                    <img src="../../assets/images/<?php echo $admin_data['avatar']; ?>" alt="<?php echo $admin_data['nome']; ?>">
                </div>
                <div class="admin-info-details">
                    <h2><?php echo $admin_data['nome']; ?></h2>
                    <p><i class="fas fa-envelope"></i> <?php echo $admin_data['email']; ?></p>
                    <p><i class="fas fa-user-shield"></i> Nível: <strong><?php echo $admin_data['nivel']; ?></strong></p>
                    <span class="status-badge status-<?php echo $admin_data['status']; ?>">
                        <span class="status-dot"></span>
                        <?php echo ucfirst($admin_data['status']); ?>
                    </span>
                </div>
            </div>

            <!-- ===== GERENCIAR PERMISSÕES ===== -->
            <div class="permissoes-container animate-fade-up" style="animation-delay: 0.1s;">
                <div class="permissoes-header">
                    <h3><i class="fas fa-list-check"></i> Permissões do Administrador</h3>
                    <div class="permissoes-actions">
                        <button class="btn btn-sm btn-outline" onclick="selecionarTodas()">
                            <i class="fas fa-check-double"></i> Selecionar Todas
                        </button>
                        <button class="btn btn-sm btn-outline" onclick="deselecionarTodas()">
                            <i class="fas fa-times"></i> Desmarcar Todas
                        </button>
                    </div>
                    <p class="permissoes-info">
                        <i class="fas fa-info-circle"></i>
                        Selecione as permissões que este administrador terá acesso.
                        <span class="permissoes-count" id="permissoesCount"><?php echo count($permissoes_ativas); ?> de <?php echo count($todas_permissoes); ?> selecionadas</span>
                    </p>
                </div>

                <!-- ===== PERMISSÕES AGRUPADAS POR CATEGORIA ===== -->
                <form id="formPermissoes" onsubmit="return false;">
                    <?php foreach ($categorias as $categoria): ?>
                        <?php
                        $permissoes_categoria = array_filter($todas_permissoes, function($p) use ($categoria) {
                            return $p['categoria'] === $categoria;
                        });
                        if (empty($permissoes_categoria)) continue;
                        ?>
                        <div class="categoria-permissoes">
                            <div class="categoria-header" onclick="toggleCategoria(this)">
                                <div class="categoria-info">
                                    <i class="fas fa-chevron-down categoria-arrow"></i>
                                    <h4><?php echo $categoria; ?></h4>
                                    <span class="categoria-count">
                                        <?php
                                        $ativas_categoria = array_filter($permissoes_categoria, function($p) use ($permissoes_ativas) {
                                            return in_array($p['id'], $permissoes_ativas);
                                        });
                                        echo count($ativas_categoria) . '/' . count($permissoes_categoria);
                                        ?>
                                    </span>
                                </div>
                                <div class="categoria-select-all">
                                    <label>
                                        <input type="checkbox" class="categoria-check-all" 
                                               onchange="toggleCategoriaPermissoes(this)"
                                               <?php echo count($ativas_categoria) === count($permissoes_categoria) ? 'checked' : ''; ?>>
                                        Selecionar todas
                                    </label>
                                </div>
                            </div>
                            <div class="categoria-body">
                                <div class="permissoes-grid">
                                    <?php foreach ($permissoes_categoria as $permissao): ?>
                                        <div class="permissao-item">
                                            <label class="permissao-checkbox">
                                                <input type="checkbox" 
                                                       name="permissoes[]" 
                                                       value="<?php echo $permissao['id']; ?>"
                                                       class="permissao-input"
                                                       <?php echo in_array($permissao['id'], $permissoes_ativas) ? 'checked' : ''; ?>
                                                       onchange="atualizarContador()">
                                                <span class="checkmark"></span>
                                                <div class="permissao-info">
                                                    <div class="permissao-icon">
                                                        <i class="fas <?php echo $permissao['icone']; ?>"></i>
                                                    </div>
                                                    <div class="permissao-detalhes">
                                                        <span class="permissao-nome"><?php echo $permissao['nome']; ?></span>
                                                        <span class="permissao-descricao"><?php echo $permissao['descricao']; ?></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </form>

                <!-- ===== BOTÕES FINAIS ===== -->
                <div class="permissoes-footer">
                    <div class="permissoes-resumo">
                        <span class="resumo-label">Total de permissões selecionadas:</span>
                        <span class="resumo-count" id="totalSelecionadas"><?php echo count($permissoes_ativas); ?></span>
                        <span class="resumo-total">de <?php echo count($todas_permissoes); ?></span>
                    </div>
                    <div class="permissoes-footer-actions">
                        <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <button class="btn btn-primary" onclick="salvarPermissoes()">
                            <i class="fas fa-save"></i> Salvar Permissões
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        

        // ==========================================
        // TOGGLE SIDEBAR (Desktop)
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
        });

        // ==========================================
        // TOGGLE SIDEBAR (Mobile - Bottom Nav)
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
                    if (sidebar.classList.contains('open')) {
                        icon.className = 'fas fa-times';
                    } else {
                        icon.className = 'fas fa-bars';
                    }
                }
            }
        }

        // Fechar sidebar mobile ao clicar fora
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const menuBtn = document.getElementById('bottomMenuToggle');

            if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
                if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
                    sidebar.classList.remove('open');
                    if (overlay) overlay.classList.remove('active');

                    if (menuBtn) {
                        const icon = menuBtn.querySelector('i');
                        if (icon) icon.className = 'fas fa-bars';
                    }
                }
            }
        });

        // ==========================================
        // NOTIFICAÇÕES - DROPDOWN
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
                if (naoLidas > 0) {
                    badge.textContent = naoLidas;
                    badge.style.display = 'flex';
                } else {
                    badge.style.display = 'none';
                }
            }

            if (bottomBadge) {
                if (naoLidas > 0) {
                    bottomBadge.textContent = naoLidas;
                    bottomBadge.style.display = 'flex';
                } else {
                    bottomBadge.style.display = 'none';
                }
            }
        }

        function closeNotifications() {
            const dropdown = document.getElementById('notificacoesDropdown');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }

        // ==========================================
        // PERFIL - DROPDOWN
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
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple';
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                    this.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 600);

                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    const themeLabel = document.querySelector('.perfil-dropdown .theme-toggle');
                    if (themeLabel) {
                        const icon = themeLabel.querySelector('i');
                        if (newTheme === 'dark') {
                            icon.className = 'fas fa-moon';
                            themeLabel.innerHTML = '<i class="fas fa-moon"></i> Tema Escuro';
                        } else {
                            icon.className = 'fas fa-sun';
                            themeLabel.innerHTML = '<i class="fas fa-sun"></i> Tema Claro';
                        }
                    }

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ==========================================
        // TOAST NOTIFICATIONS
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
        // PERMISSÕES - FUNÇÕES
        // ==========================================

        function toggleCategoria(header) {
            const body = header.nextElementSibling;
            const arrow = header.querySelector('.categoria-arrow');
            
            if (body) {
                body.classList.toggle('open');
                if (arrow) {
                    arrow.classList.toggle('fa-chevron-down');
                    arrow.classList.toggle('fa-chevron-up');
                }
            }
        }

        function toggleCategoriaPermissoes(checkbox) {
            const categoria = checkbox.closest('.categoria-permissoes');
            const inputs = categoria.querySelectorAll('.permissao-input');
            
            inputs.forEach(input => {
                input.checked = checkbox.checked;
            });
            
            atualizarContador();
            atualizarCategoriaCount();
        }

        function atualizarContador() {
            const total = document.querySelectorAll('.permissao-input').length;
            const selecionados = document.querySelectorAll('.permissao-input:checked').length;
            
            document.getElementById('permissoesCount').textContent = `${selecionados} de ${total} selecionadas`;
            document.getElementById('totalSelecionadas').textContent = selecionados;
            
            // Atualizar contadores por categoria
            atualizarCategoriaCount();
        }

        function atualizarCategoriaCount() {
            document.querySelectorAll('.categoria-permissoes').forEach(categoria => {
                const inputs = categoria.querySelectorAll('.permissao-input');
                const total = inputs.length;
                const selecionados = categoria.querySelectorAll('.permissao-input:checked').length;
                const count = categoria.querySelector('.categoria-count');
                const checkAll = categoria.querySelector('.categoria-check-all');
                
                if (count) {
                    count.textContent = `${selecionados}/${total}`;
                }
                
                if (checkAll) {
                    checkAll.checked = selecionados === total && total > 0;
                }
            });
        }

        function selecionarTodas() {
            document.querySelectorAll('.permissao-input').forEach(input => {
                input.checked = true;
            });
            document.querySelectorAll('.categoria-check-all').forEach(input => {
                input.checked = true;
            });
            atualizarContador();
            mostrarToast('Todas as permissões selecionadas', 'info');
        }

        function deselecionarTodas() {
            document.querySelectorAll('.permissao-input').forEach(input => {
                input.checked = false;
            });
            document.querySelectorAll('.categoria-check-all').forEach(input => {
                input.checked = false;
            });
            atualizarContador();
            mostrarToast('Todas as permissões desmarcadas', 'info');
        }

        function salvarPermissoes() {
            const selecionados = document.querySelectorAll('.permissao-input:checked');
            const permissoes = Array.from(selecionados).map(input => input.value);
            
            // Simular salvamento
            mostrarToast('A salvar permissões...', 'info');
            
            setTimeout(() => {
                mostrarToast(`Permissões salvas com sucesso! (${permissoes.length} selecionadas) ✅`, 'success');
                
                // Redirecionar após 2 segundos
                setTimeout(() => {
                    window.location.href = 'admin-detalhe.php?id=<?php echo $admin_data['id']; ?>';
                }, 1500);
            }, 1500);
        }

        // ==========================================
        // INICIALIZAÇÃO
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            // Abrir todas as categorias por padrão
            document.querySelectorAll('.categoria-body').forEach(body => {
                body.classList.add('open');
            });
            
            // Atualizar contadores
            atualizarContador();
        });
    </script>

    <style>
        /* ========================================== */
        /* PERMISSÕES - CSS                           */
        /* ========================================== */

        /* ===== ADMIN INFO CARD ===== */
        .admin-info-card {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .admin-info-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .admin-info-avatar img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--admin-primary-light);
        }

        .admin-info-details h2 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .admin-info-details p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .admin-info-details p i {
            margin-right: 6px;
            color: var(--admin-primary-light);
        }

        .admin-info-details p strong {
            color: var(--text-primary);
        }

        /* ===== PERMISSÕES CONTAINER ===== */
        .permissoes-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .permissoes-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .permissoes-header {
            margin-bottom: var(--space-lg);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .permissoes-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-sm);
        }

        .permissoes-header h3 i {
            color: var(--admin-primary-light);
        }

        .permissoes-actions {
            display: flex;
            gap: var(--space-sm);
            margin-bottom: var(--space-sm);
            flex-wrap: wrap;
        }

        .permissoes-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .permissoes-info i {
            color: var(--admin-primary-light);
        }

        .permissoes-count {
            font-weight: 600;
            color: var(--admin-primary-light);
            background: rgba(108, 43, 217, 0.08);
            padding: 2px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
        }

        /* ===== CATEGORIA PERMISSÕES ===== */
        .categoria-permissoes {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .categoria-permissoes:hover {
            border-color: var(--admin-primary-light);
        }

        .categoria-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md) var(--space-lg);
            cursor: pointer;
            transition: var(--transition-smooth);
            user-select: none;
        }

        .categoria-header:hover {
            background: rgba(108, 43, 217, 0.03);
        }

        .categoria-info {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .categoria-info .categoria-arrow {
            color: var(--text-muted);
            font-size: 0.8rem;
            transition: var(--transition-smooth);
        }

        .categoria-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
        }

        .categoria-info .categoria-count {
            font-size: var(--text-xs);
            color: var(--text-muted);
            background: var(--bg-card);
            padding: 1px 10px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-color);
        }

        .categoria-select-all label {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-sm);
            color: var(--text-muted);
            cursor: pointer;
        }

        .categoria-select-all input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: var(--admin-primary);
        }

        .categoria-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, opacity 0.3s ease;
            opacity: 0;
        }

        .categoria-body.open {
            max-height: 2000px;
            opacity: 1;
            padding: var(--space-md) var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        /* ===== GRID DE PERMISSÕES ===== */
        .permissoes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: var(--space-sm);
        }

        .permissao-item {
            padding: 2px 0;
        }

        .permissao-checkbox {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            cursor: pointer;
            padding: var(--space-sm) var(--space-md);
            border-radius: var(--radius-sm);
            transition: var(--transition-smooth);
            position: relative;
        }

        .permissao-checkbox:hover {
            background: rgba(108, 43, 217, 0.04);
        }

        .permissao-checkbox input[type="checkbox"] {
            display: none;
        }

        .permissao-checkbox .checkmark {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-sm);
            flex-shrink: 0;
            margin-top: 2px;
            position: relative;
            transition: var(--transition-smooth);
            background: var(--bg-input);
        }

        .permissao-checkbox input[type="checkbox"]:checked + .checkmark {
            background: var(--admin-gradient);
            border-color: var(--admin-primary);
        }

        .permissao-checkbox input[type="checkbox"]:checked + .checkmark::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 0.7rem;
        }

        .permissao-checkbox .permissao-info {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex: 1;
        }

        .permissao-checkbox .permissao-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: rgba(108, 43, 217, 0.08);
            color: var(--admin-primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .permissao-checkbox .permissao-detalhes {
            flex: 1;
        }

        .permissao-checkbox .permissao-nome {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .permissao-checkbox .permissao-descricao {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            line-height: 1.3;
        }

        /* ===== FOOTER PERMISSÕES ===== */
        .permissoes-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-lg);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-md);
        }

        .permissoes-resumo {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .permissoes-resumo .resumo-count {
            font-weight: 700;
            font-size: var(--text-h3);
            color: var(--admin-primary-light);
        }

        .permissoes-resumo .resumo-total {
            color: var(--text-muted);
        }

        .permissoes-footer-actions {
            display: flex;
            gap: var(--space-sm);
        }

        .permissoes-footer-actions .btn {
            min-width: 120px;
            justify-content: center;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .permissoes-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .admin-info-card {
                flex-direction: column;
                text-align: center;
                padding: var(--space-md);
            }

            .admin-info-details p {
                justify-content: center;
            }

            .permissoes-container {
                padding: var(--space-md);
            }

            .permissoes-header h3 {
                font-size: var(--text-h4);
            }

            .permissoes-grid {
                grid-template-columns: 1fr;
            }

            .categoria-header {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-sm);
                padding: var(--space-sm) var(--space-md);
            }

            .categoria-select-all {
                width: 100%;
            }

            .categoria-select-all label {
                width: 100%;
                justify-content: flex-start;
            }

            .categoria-body.open {
                padding: var(--space-sm) var(--space-md);
            }

            .permissao-checkbox {
                padding: var(--space-sm);
            }

            .permissoes-footer {
                flex-direction: column;
                align-items: stretch;
                gap: var(--space-sm);
            }

            .permissoes-resumo {
                justify-content: center;
            }

            .permissoes-footer-actions {
                flex-direction: column;
            }

            .permissoes-footer-actions .btn {
                width: 100%;
                min-width: auto;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .permissoes-actions {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .admin-info-card {
                padding: var(--space-sm);
            }

            .admin-info-avatar img {
                width: 48px;
                height: 48px;
            }

            .admin-info-details h2 {
                font-size: var(--text-h4);
            }

            .permissoes-container {
                padding: var(--space-sm);
            }

            .categoria-header {
                padding: var(--space-sm);
            }

            .categoria-info h4 {
                font-size: var(--text-sm);
            }

            .permissao-checkbox .permissao-icon {
                width: 28px;
                height: 28px;
                font-size: 0.8rem;
            }

            .permissao-checkbox .permissao-nome {
                font-size: var(--text-sm);
            }

            .permissao-checkbox .permissao-descricao {
                font-size: var(--text-xs);
            }
        }
    </style>

</body>
</html>