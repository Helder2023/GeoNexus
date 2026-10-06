<?php
// painel/admin/admin-historico.php - Histórico de Atividades do Administrador
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Histórico de Atividades';
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
];

// Dados mockados - Histórico de atividades
$historico_completo = [
    [
        'id' => 1,
        'data' => '2026-02-18 14:20:00',
        'acao' => 'Login',
        'descricao' => 'Login realizado com sucesso',
        'ip' => '192.168.1.100',
        'dispositivo' => 'Chrome 120.0 / Windows 11',
        'tipo' => 'acesso',
        'icone' => 'fa-sign-in-alt',
        'cor' => 'green'
    ],
    [
        'id' => 2,
        'data' => '2026-02-18 14:15:00',
        'acao' => 'Validação de Utilizador',
        'descricao' => 'Validou o utilizador "Maria Santos" (ID: 2)',
        'ip' => '192.168.1.100',
        'dispositivo' => 'Chrome 120.0 / Windows 11',
        'tipo' => 'validacao',
        'icone' => 'fa-user-check',
        'cor' => 'success'
    ],
    [
        'id' => 3,
        'data' => '2026-02-18 13:45:00',
        'acao' => 'Alteração de Permissões',
        'descricao' => 'Modificou permissões do administrador "Pedro Costa"',
        'ip' => '192.168.1.100',
        'dispositivo' => 'Chrome 120.0 / Windows 11',
        'tipo' => 'configuracao',
        'icone' => 'fa-lock',
        'cor' => 'warning'
    ],
    [
        'id' => 4,
        'data' => '2026-02-18 12:30:00',
        'acao' => 'Criação de Projeto',
        'descricao' => 'Criou o projeto "Levantamento GIS - Luanda"',
        'ip' => '192.168.1.105',
        'dispositivo' => 'Firefox 122.0 / Windows 11',
        'tipo' => 'projeto',
        'icone' => 'fa-project-diagram',
        'cor' => 'info'
    ],
    [
        'id' => 5,
        'data' => '2026-02-18 11:00:00',
        'acao' => 'Pagamento Processado',
        'descricao' => 'Processou pagamento de Kz 25.000 do cliente "Empresa ABC"',
        'ip' => '192.168.1.105',
        'dispositivo' => 'Firefox 122.0 / Windows 11',
        'tipo' => 'financeiro',
        'icone' => 'fa-credit-card',
        'cor' => 'success'
    ],
    [
        'id' => 6,
        'data' => '2026-02-18 09:30:00',
        'acao' => 'Exportação de Relatório',
        'descricao' => 'Exportou relatório financeiro do mês de Janeiro',
        'ip' => '192.168.1.110',
        'dispositivo' => 'Safari 17.0 / macOS',
        'tipo' => 'relatorio',
        'icone' => 'fa-file-export',
        'cor' => 'info'
    ],
    [
        'id' => 7,
        'data' => '2026-02-17 16:45:00',
        'acao' => 'Atualização de Perfil',
        'descricao' => 'Atualizou informações do perfil',
        'ip' => '192.168.1.110',
        'dispositivo' => 'Safari 17.0 / macOS',
        'tipo' => 'configuracao',
        'icone' => 'fa-user-edit',
        'cor' => 'warning'
    ],
    [
        'id' => 8,
        'data' => '2026-02-17 15:20:00',
        'acao' => 'Resposta a Ticket',
        'descricao' => 'Respondeu ao ticket #124 do utilizador "Maria Santos"',
        'ip' => '192.168.1.100',
        'dispositivo' => 'Chrome 120.0 / Windows 11',
        'tipo' => 'suporte',
        'icone' => 'fa-reply',
        'cor' => 'info'
    ],
    [
        'id' => 9,
        'data' => '2026-02-17 14:00:00',
        'acao' => 'Suspensão de Utilizador',
        'descricao' => 'Suspendeu o utilizador "Carlos Ferreira" (ID: 5)',
        'ip' => '192.168.1.100',
        'dispositivo' => 'Chrome 120.0 / Windows 11',
        'tipo' => 'validacao',
        'icone' => 'fa-user-slash',
        'cor' => 'danger'
    ],
    [
        'id' => 10,
        'data' => '2026-02-17 11:30:00',
        'acao' => 'Criação de Utilizador',
        'descricao' => 'Criou o utilizador "Ana Oliveira" (ID: 4)',
        'ip' => '192.168.1.105',
        'dispositivo' => 'Firefox 122.0 / Windows 11',
        'tipo' => 'usuario',
        'icone' => 'fa-user-plus',
        'cor' => 'success'
    ],
    [
        'id' => 11,
        'data' => '2026-02-16 16:00:00',
        'acao' => 'Backup do Sistema',
        'descricao' => 'Realizou backup completo do sistema',
        'ip' => '192.168.1.100',
        'dispositivo' => 'Chrome 120.0 / Windows 11',
        'tipo' => 'sistema',
        'icone' => 'fa-database',
        'cor' => 'info'
    ],
    [
        'id' => 12,
        'data' => '2026-02-16 14:30:00',
        'acao' => 'Alteração de Configurações',
        'descricao' => 'Modificou configurações de email do sistema',
        'ip' => '192.168.1.100',
        'dispositivo' => 'Chrome 120.0 / Windows 11',
        'tipo' => 'configuracao',
        'icone' => 'fa-cog',
        'cor' => 'warning'
    ],
    [
        'id' => 13,
        'data' => '2026-02-16 10:00:00',
        'acao' => 'Login',
        'descricao' => 'Login realizado com sucesso',
        'ip' => '192.168.1.50',
        'dispositivo' => 'Chrome 120.0 / Android 14',
        'tipo' => 'acesso',
        'icone' => 'fa-sign-in-alt',
        'cor' => 'green'
    ],
    [
        'id' => 14,
        'data' => '2026-02-15 17:30:00',
        'acao' => 'Atualização de Projeto',
        'descricao' => 'Atualizou o projeto "Levantamento GIS - Luanda"',
        'ip' => '192.168.1.105',
        'dispositivo' => 'Firefox 122.0 / Windows 11',
        'tipo' => 'projeto',
        'icone' => 'fa-edit',
        'cor' => 'info'
    ],
    [
        'id' => 15,
        'data' => '2026-02-15 15:00:00',
        'acao' => 'Validação de Utilizador',
        'descricao' => 'Validou o utilizador "Rui Santos" (ID: 7)',
        'ip' => '192.168.1.100',
        'dispositivo' => 'Chrome 120.0 / Windows 11',
        'tipo' => 'validacao',
        'icone' => 'fa-user-check',
        'cor' => 'success'
    ]
];

// Estatísticas do histórico
$total_historico = count($historico_completo);
$total_hoje = count(array_filter($historico_completo, function($h) {
    return date('Y-m-d', strtotime($h['data'])) === date('Y-m-d');
}));
$total_semana = count(array_filter($historico_completo, function($h) {
    return strtotime($h['data']) >= strtotime('-7 days');
}));
$total_mes = count(array_filter($historico_completo, function($h) {
    return strtotime($h['data']) >= strtotime('-30 days');
}));

// Tipos de ação para filtro
$tipos_acao = [
    'todas' => 'Todas as Ações',
    'acesso' => 'Acessos',
    'validacao' => 'Validações',
    'configuracao' => 'Configurações',
    'projeto' => 'Projetos',
    'financeiro' => 'Financeiro',
    'relatorio' => 'Relatórios',
    'suporte' => 'Suporte',
    'usuario' => 'Utilizadores',
    'sistema' => 'Sistema'
];

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admins.php', 'active' => false],
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
                        <i class="fas fa-history icon"></i>
                        Histórico de Atividades
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="admins.php">Administradores</a>
                        <span class="separator">/</span>
                        <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>"><?php echo $admin_data['nome']; ?></a>
                        <span class="separator">/</span>
                        <span>Histórico</span>
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
                        <button class="btn btn-primary" onclick="exportarHistorico()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS DO HISTÓRICO ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $total_historico; ?></div>
                    <div class="label">Total de Atividades</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 12.5%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div class="value"><?php echo $total_hoje; ?></div>
                    <div class="label">Hoje</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 5
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon geo">
                        <i class="fas fa-calendar-week"></i>
                    </div>
                    <div class="value"><?php echo $total_semana; ?></div>
                    <div class="label">Últimos 7 dias</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 23.4%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="value"><?php echo $total_mes; ?></div>
                    <div class="label">Últimos 30 dias</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 5.2%
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filter-bar-admin">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchHistorico" placeholder="Pesquisar atividade...">
                </div>
                <div class="filter-group">
                    <label>Tipo</label>
                    <select id="filterTipo">
                        <?php foreach ($tipos_acao as $key => $label): ?>
                            <option value="<?php echo $key; ?>"><?php echo $label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Período</label>
                    <select id="filterPeriodo">
                        <option value="hoje">Hoje</option>
                        <option value="7dias" selected>Últimos 7 dias</option>
                        <option value="30dias">Últimos 30 dias</option>
                        <option value="90dias">Últimos 90 dias</option>
                        <option value="todo">Todo o período</option>
                    </select>
                </div>
                <div class="filter-actions">
                    <button class="btn btn-sm btn-primary" onclick="aplicarFiltros()">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                    <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-undo"></i> Limpar
                    </button>
                </div>
                <span class="resultados-info" id="resultadosInfo"><?php echo $total_historico; ?> resultados</span>
            </div>

            <!-- ===== LISTA DE HISTÓRICO ===== -->
            <div class="historico-container">
                <div class="historico-timeline" id="historicoList">
                    <?php 
                    $data_anterior = '';
                    foreach ($historico_completo as $item): 
                        $data_atual = date('Y-m-d', strtotime($item['data']));
                        if ($data_atual !== $data_anterior):
                            if ($data_anterior !== ''): ?>
                                </div>
                            <?php endif; ?>
                            <div class="timeline-group">
                                <div class="timeline-date">
                                    <span class="date-label">
                                        <?php 
                                        if ($data_atual === date('Y-m-d')) {
                                            echo 'Hoje';
                                        } elseif ($data_atual === date('Y-m-d', strtotime('-1 day'))) {
                                            echo 'Ontem';
                                        } else {
                                            echo date('d/m/Y', strtotime($item['data']));
                                        }
                                        ?>
                                    </span>
                                    <span class="date-count">
                                        <?php 
                                        $count = count(array_filter($historico_completo, function($h) use ($data_atual) {
                                            return date('Y-m-d', strtotime($h['data'])) === $data_atual;
                                        }));
                                        echo $count . ' atividade' . ($count > 1 ? 's' : '');
                                        ?>
                                    </span>
                                </div>
                        <?php 
                        $data_anterior = $data_atual;
                        endif; 
                        ?>
                        <div class="timeline-item" data-tipo="<?php echo $item['tipo']; ?>" data-data="<?php echo $item['data']; ?>">
                            <div class="timeline-icon <?php echo $item['cor']; ?>">
                                <i class="fas <?php echo $item['icone']; ?>"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-header">
                                    <span class="timeline-acao"><?php echo $item['acao']; ?></span>
                                    <span class="timeline-hora"><?php echo date('H:i', strtotime($item['data'])); ?></span>
                                </div>
                                <p class="timeline-descricao"><?php echo $item['descricao']; ?></p>
                                <div class="timeline-footer">
                                    <span class="timeline-ip"><i class="fas fa-network-wired"></i> <?php echo $item['ip']; ?></span>
                                    <span class="timeline-dispositivo"><i class="fas fa-desktop"></i> <?php echo $item['dispositivo']; ?></span>
                                </div>
                            </div>
                            <div class="timeline-badge tipo-<?php echo $item['tipo']; ?>">
                                <?php echo $tipos_acao[$item['tipo']] ?? $item['tipo']; ?>
                            </div>
                        </div>
                    <?php 
                    endforeach; 
                    if ($data_anterior !== ''): ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="table-pagination" id="paginacaoHistorico">
                    <button class="page-btn prev" onclick="mudarPagina('prev')" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="page-info">1 de 1</span>
                    <button class="page-btn next" onclick="mudarPagina('next')" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
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
        // FILTROS E PAGINAÇÃO - CORRIGIDO
        // ==========================================

        let paginaAtual = 1;
        let itensPorPagina = 10;
        let totalItensVisiveis = 0;

        function aplicarFiltros() {
            const search = document.getElementById('searchHistorico').value.toLowerCase().trim();
            const tipo = document.getElementById('filterTipo').value;
            const periodo = document.getElementById('filterPeriodo').value;

            // Mostrar todos os itens primeiro
            document.querySelectorAll('.timeline-item').forEach(item => {
                item.style.display = '';
            });
            document.querySelectorAll('.timeline-group').forEach(group => {
                group.style.display = '';
            });

            // Remover empty state se existir
            const timeline = document.querySelector('.historico-timeline');
            if (timeline) {
                const empty = timeline.querySelector('.empty-state-admin');
                if (empty) empty.remove();
            }

            // Aplicar filtros
            const items = document.querySelectorAll('.timeline-item');
            let visiveis = 0;

            items.forEach(item => {
                const descricao = item.querySelector('.timeline-descricao')?.textContent.toLowerCase() || '';
                const acao = item.querySelector('.timeline-acao')?.textContent.toLowerCase() || '';
                const itemTipo = item.dataset.tipo || '';
                const itemData = item.dataset.data || '';

                let show = true;

                // Filtro de pesquisa
                if (search) {
                    show = descricao.includes(search) || acao.includes(search);
                }

                // Filtro de tipo
                if (show && tipo !== 'todas') {
                    show = itemTipo === tipo;
                }

                // Filtro de período
                if (show && periodo !== 'todo') {
                    const data = new Date(itemData);
                    const hoje = new Date();
                    hoje.setHours(0, 0, 0, 0);
                    data.setHours(0, 0, 0, 0);
                    
                    const diff = Math.floor((hoje - data) / (1000 * 60 * 60 * 24));
                    
                    switch(periodo) {
                        case 'hoje':
                            show = diff === 0;
                            break;
                        case '7dias':
                            show = diff <= 7;
                            break;
                        case '30dias':
                            show = diff <= 30;
                            break;
                        case '90dias':
                            show = diff <= 90;
                            break;
                    }
                }

                // Aplicar visibilidade
                item.style.display = show ? '' : 'none';
                if (show) visiveis++;
            });

            // Esconder grupos vazios
            document.querySelectorAll('.timeline-group').forEach(group => {
                const visibleItems = group.querySelectorAll('.timeline-item[style*="display: none"]');
                const totalItems = group.querySelectorAll('.timeline-item').length;
                if (visibleItems.length === totalItems) {
                    group.style.display = 'none';
                }
            });

            totalItensVisiveis = visiveis;

            // Atualizar contadores
            const totalBadge = document.querySelector('.stats-grid .stat-card:first-child .value');
            if (totalBadge) {
                totalBadge.textContent = totalItensVisiveis;
            }

            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            // Resetar página
            paginaAtual = 1;
            
            // Atualizar paginação
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            } else {
                // Nenhum resultado - mostrar empty state
                const container = document.getElementById('paginacaoHistorico');
                if (container) container.style.display = 'none';
                
                const timelineContainer = document.querySelector('.historico-timeline');
                if (timelineContainer) {
                    timelineContainer.innerHTML = `
                        <div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;">
                            <div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);">
                                <i class="fas fa-search"></i>
                            </div>
                            <h4 style="margin-top: 16px; color: var(--text-primary); font-size: 1.2rem;">Nenhum resultado encontrado</h4>
                            <p style="color: var(--text-muted); margin-top: 8px;">Tente ajustar os filtros para encontrar o que procura.</p>
                        </div>
                    `;
                }
            }
        }

        function limparFiltros() {
            document.getElementById('searchHistorico').value = '';
            document.getElementById('filterTipo').value = 'todas';
            document.getElementById('filterPeriodo').value = '7dias';
            
            // Mostrar todos os itens
            document.querySelectorAll('.timeline-item').forEach(item => {
                item.style.display = '';
            });
            document.querySelectorAll('.timeline-group').forEach(group => {
                group.style.display = '';
            });
            
            // Remover empty state
            const timeline = document.querySelector('.historico-timeline');
            if (timeline) {
                const empty = timeline.querySelector('.empty-state-admin');
                if (empty) empty.remove();
            }
            
            totalItensVisiveis = document.querySelectorAll('.timeline-item').length;
            
            const totalBadge = document.querySelector('.stats-grid .stat-card:first-child .value');
            if (totalBadge) {
                totalBadge.textContent = totalItensVisiveis;
            }

            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }
            
            paginaAtual = 1;
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            } else {
                const container = document.getElementById('paginacaoHistorico');
                if (container) container.style.display = 'none';
            }
        }

        function mostrarPagina(page) {
            // Encontrar todos os itens visíveis (não escondidos pelo filtro)
            const items = [];
            document.querySelectorAll('.timeline-item').forEach(item => {
                if (item.style.display !== 'none') {
                    items.push(item);
                }
            });

            if (items.length === 0) return;

            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;

            // Esconder todos os itens primeiro
            items.forEach(item => {
                item.style.display = 'none';
            });

            // Mostrar apenas os da página atual
            items.forEach((item, index) => {
                if (index >= start && index < end) {
                    item.style.display = '';
                }
            });

            // Atualizar grupos (mostrar apenas grupos com itens visíveis)
            document.querySelectorAll('.timeline-group').forEach(group => {
                const itemsInGroup = group.querySelectorAll('.timeline-item');
                let hasVisible = false;
                itemsInGroup.forEach(item => {
                    if (item.style.display !== 'none') {
                        hasVisible = true;
                    }
                });
                group.style.display = hasVisible ? '' : 'none';
            });
        }

        function atualizarPaginacao(total) {
            const totalPaginas = Math.ceil(total / itensPorPagina);
            const container = document.getElementById('paginacaoHistorico');
            
            if (!container) return;

            const prevBtn = container.querySelector('.prev');
            const nextBtn = container.querySelector('.next');
            const info = container.querySelector('.page-info');

            // Remover botões de página antigos
            const pageBtns = container.querySelectorAll('.page-btn:not(.prev):not(.next)');
            pageBtns.forEach(btn => btn.remove());

            if (totalPaginas <= 1) {
                container.style.display = 'none';
                mostrarPagina(1);
                return;
            }

            container.style.display = 'flex';

            // Criar botões de página
            const maxVisible = 5;
            let startPage = Math.max(1, paginaAtual - 2);
            let endPage = Math.min(totalPaginas, startPage + maxVisible - 1);
            
            if (endPage - startPage < maxVisible - 1) {
                startPage = Math.max(1, endPage - maxVisible + 1);
            }

            // Botão primeira página
            if (startPage > 1) {
                const firstBtn = document.createElement('button');
                firstBtn.className = 'page-btn';
                firstBtn.textContent = '1';
                firstBtn.onclick = function() { irParaPagina(1); };
                container.insertBefore(firstBtn, info);
                
                if (startPage > 2) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    container.insertBefore(dots, info);
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                const btn = document.createElement('button');
                btn.className = 'page-btn' + (i === paginaAtual ? ' active' : '');
                btn.textContent = i;
                btn.onclick = function() { irParaPagina(i); };
                container.insertBefore(btn, info);
            }

            if (endPage < totalPaginas) {
                if (endPage < totalPaginas - 1) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    container.insertBefore(dots, info);
                }
                const lastBtn = document.createElement('button');
                lastBtn.className = 'page-btn';
                lastBtn.textContent = totalPaginas;
                lastBtn.onclick = function() { irParaPagina(totalPaginas); };
                container.insertBefore(lastBtn, info);
            }

            // Atualizar navegação
            prevBtn.disabled = paginaAtual <= 1;
            nextBtn.disabled = paginaAtual >= totalPaginas;

            // Atualizar info
            if (info) {
                info.textContent = `${paginaAtual} de ${totalPaginas}`;
            }
            
            // Mostrar a página atual
            mostrarPagina(paginaAtual);
        }

        function irParaPagina(page) {
            paginaAtual = page;
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            }
            
            // Scroll para o topo
            const container = document.querySelector('.historico-container');
            if (container) {
                container.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function mudarPagina(direcao) {
            const totalPaginas = Math.ceil(totalItensVisiveis / itensPorPagina);
            
            if (direcao === 'prev' && paginaAtual > 1) {
                irParaPagina(paginaAtual - 1);
            } else if (direcao === 'next' && paginaAtual < totalPaginas) {
                irParaPagina(paginaAtual + 1);
            }
        }

        // ==========================================
        // EXPORTAR HISTÓRICO
        // ==========================================

        function exportarHistorico() {
            mostrarToast('A exportar histórico...', 'info');
            setTimeout(() => {
                mostrarToast('Histórico exportado com sucesso! 📄', 'success');
            }, 1500);
        }

        // ==========================================
        // INICIALIZAÇÃO
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar paginação
            totalItensVisiveis = document.querySelectorAll('.timeline-item').length;
            
            // Adicionar evento de input com debounce para pesquisa
            const searchInput = document.getElementById('searchHistorico');
            if (searchInput) {
                let timeout;
                searchInput.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(function() {
                        aplicarFiltros();
                    }, 300);
                });
            }
            
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            } else {
                const container = document.getElementById('paginacaoHistorico');
                if (container) container.style.display = 'none';
            }
        });
    </script>

    <style>
        /* ========================================== */
        /* HISTÓRICO - CSS                            */
        /* ========================================== */

        .historico-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .historico-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== TIMELINE ===== */
        .historico-timeline {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .timeline-group {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .timeline-date {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--admin-primary-light);
        }

        .timeline-date .date-label {
            font-weight: 600;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .timeline-date .date-count {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== TIMELINE ITEM ===== */
        .timeline-item {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            border-radius: var(--radius-sm);
            transition: var(--transition-smooth);
            position: relative;
        }

        .timeline-item:hover {
            background: var(--bg-primary);
        }

        .timeline-item .timeline-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 0.9rem;
        }

        .timeline-item .timeline-icon.green {
            background: rgba(0, 255, 163, 0.12);
            color: var(--color-future-green);
        }

        .timeline-item .timeline-icon.success {
            background: rgba(0, 255, 163, 0.12);
            color: var(--color-future-green);
        }

        .timeline-item .timeline-icon.warning {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .timeline-item .timeline-icon.danger {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .timeline-item .timeline-icon.info {
            background: rgba(0, 210, 255, 0.12);
            color: var(--color-turquoise);
        }

        .timeline-item .timeline-icon.aurora {
            background: rgba(108, 43, 217, 0.12);
            color: var(--color-aurora);
        }

        .timeline-item .timeline-content {
            flex: 1;
            min-width: 0;
        }

        .timeline-item .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: var(--space-xs);
            margin-bottom: 2px;
        }

        .timeline-item .timeline-acao {
            font-weight: 600;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .timeline-item .timeline-hora {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .timeline-item .timeline-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-xs) 0;
        }

        .timeline-item .timeline-footer {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .timeline-item .timeline-footer i {
            margin-right: 4px;
        }

        .timeline-item .timeline-badge {
            font-size: var(--text-xs);
            padding: 2px 10px;
            border-radius: var(--radius-full);
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            color: var(--text-muted);
            height: fit-content;
            flex-shrink: 0;
        }

        .timeline-item .timeline-badge.tipo-acesso {
            border-color: rgba(0, 255, 163, 0.2);
            color: var(--color-future-green);
        }

        .timeline-item .timeline-badge.tipo-validacao {
            border-color: rgba(0, 255, 163, 0.2);
            color: var(--color-future-green);
        }

        .timeline-item .timeline-badge.tipo-configuracao {
            border-color: rgba(255, 217, 61, 0.2);
            color: #FFD93D;
        }

        .timeline-item .timeline-badge.tipo-projeto {
            border-color: rgba(0, 210, 255, 0.2);
            color: var(--color-turquoise);
        }

        .timeline-item .timeline-badge.tipo-financeiro {
            border-color: rgba(0, 255, 163, 0.2);
            color: var(--color-future-green);
        }

        .timeline-item .timeline-badge.tipo-relatorio {
            border-color: rgba(0, 210, 255, 0.2);
            color: var(--color-turquoise);
        }

        .timeline-item .timeline-badge.tipo-suporte {
            border-color: rgba(108, 43, 217, 0.2);
            color: var(--color-aurora);
        }

        .timeline-item .timeline-badge.tipo-usuario {
            border-color: rgba(0, 210, 255, 0.2);
            color: var(--color-turquoise);
        }

        .timeline-item .timeline-badge.tipo-sistema {
            border-color: rgba(108, 43, 217, 0.2);
            color: var(--color-aurora);
        }

        /* ========================================== */
        /* FILTRO BAR - COMPLETO                      */
        /* ========================================== */

        .filter-bar-admin {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            align-items: center;
        }

        .filter-bar-admin .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-bar-admin .filter-group label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            white-space: nowrap;
        }

        .filter-bar-admin .filter-group label i {
            color: var(--admin-primary-light);
        }

        .filter-bar-admin select,
        .filter-bar-admin input {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 6px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
            min-width: 130px;
        }

        .filter-bar-admin select:focus,
        .filter-bar-admin input:focus {
            outline: none;
            border-color: var(--admin-primary-light);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        .filter-bar-admin select {
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 32px;
        }

        /* Tema Escuro - Select */
        [data-theme="dark"] select {
            background-color: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.08);
            color: #FFFFFF;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23B8C6D4' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        }

        [data-theme="dark"] select:focus {
            border-color: var(--admin-primary-light);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.15);
        }

        [data-theme="dark"] select option {
            background-color: #1A2A4A;
            color: #FFFFFF;
        }

        [data-theme="dark"] select option:hover,
        [data-theme="dark"] select option:checked {
            background-color: var(--admin-primary);
            color: #FFFFFF;
        }

        /* Tema Claro - Select */
        [data-theme="light"] select {
            background-color: #FFFFFF;
            border-color: #E5E7EB;
            color: #0A1628;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        }

        [data-theme="light"] select:focus {
            border-color: var(--admin-primary-light);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        [data-theme="light"] select option {
            background-color: #FFFFFF;
            color: #0A1628;
        }

        [data-theme="light"] select option:hover {
            background-color: #F3F4F6;
        }

        [data-theme="light"] select option:checked {
            background-color: var(--admin-primary-light);
            color: #FFFFFF;
        }

        .filter-bar-admin .filter-actions {
            display: flex;
            gap: 8px;
            margin-left: auto;
        }

        /* ===== RESULTADOS INFO ===== */
        .resultados-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-left: auto;
            white-space: nowrap;
        }

        /* ========================================== */
        /* PAGINAÇÃO - COMPLETO                       */
        /* ========================================== */

        .table-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
            padding: var(--space-md) 0 var(--space-sm);
            flex-wrap: wrap;
            margin-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .table-pagination .page-btn {
            min-width: 32px;
            height: 32px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition-smooth);
            font-size: var(--text-sm);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table-pagination .page-btn:hover {
            border-color: var(--admin-primary-light);
            color: var(--admin-primary-light);
            background: rgba(108, 43, 217, 0.04);
        }

        .table-pagination .page-btn.active {
            background: var(--admin-gradient);
            color: white;
            border-color: var(--admin-primary);
        }

        .table-pagination .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
        }

        .table-pagination .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 12px;
        }

        .table-pagination .page-dots {
            color: var(--text-muted);
            padding: 0 4px;
            font-size: var(--text-sm);
        }

        /* ========================================== */
        /* RESPONSIVIDADE - FILTRO E PAGINAÇÃO       */
        /* ========================================== */

        @media (max-width: 768px) {
            .historico-container {
                padding: var(--space-md);
            }

            .timeline-item {
                flex-direction: column;
                padding: var(--space-sm);
            }

            .timeline-item .timeline-icon {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
                align-self: flex-start;
            }

            .timeline-item .timeline-badge {
                align-self: flex-start;
            }

            .timeline-date {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-xs);
                padding: var(--space-sm);
            }

            .filter-bar-admin {
                flex-direction: column;
                align-items: stretch;
                padding: 12px 16px;
                gap: 8px;
            }

            .filter-bar-admin .filter-group {
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 4px;
            }

            .filter-bar-admin select,
            .filter-bar-admin input {
                width: 100%;
                min-width: auto;
            }

            .filter-bar-admin .filter-actions {
                margin-left: 0;
                flex-direction: column;
                gap: 6px;
            }

            .filter-bar-admin .filter-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .resultados-info {
                margin-left: 0;
                text-align: center;
                width: 100%;
                padding-top: 4px;
                border-top: 1px solid var(--border-color);
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card {
                padding: var(--space-sm) var(--space-md);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }

            .table-pagination {
                gap: 3px;
                padding: 8px 0 4px;
            }

            .table-pagination .page-btn {
                min-width: 28px;
                height: 28px;
                font-size: var(--text-xs);
            }

            .table-pagination .page-info {
                font-size: var(--text-xs);
                padding: 0 8px;
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .historico-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .timeline-item .timeline-footer {
                flex-direction: column;
                gap: var(--space-xs);
            }

            .timeline-item .timeline-badge {
                font-size: var(--text-xs);
                padding: 1px 8px;
            }

            .filter-bar-admin {
                padding: 10px 12px;
                gap: 6px;
            }

            .filter-bar-admin .filter-group label {
                font-size: var(--text-xs);
            }

            .filter-bar-admin select,
            .filter-bar-admin input {
                font-size: var(--text-sm);
                padding: 4px 8px;
            }

            .table-pagination .page-btn {
                min-width: 24px;
                height: 24px;
                font-size: var(--text-xs);
            }
        }
    </style>

</body>
</html>