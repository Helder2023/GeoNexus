<?php
// painel/admin/admin-validar.php - Validar Administradores Pendentes
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Validar Administradores';
$pagina_atual = 'validar';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Administradores Pendentes
$pendentes_lista = [
    [
        'id' => 3,
        'nome' => 'Pedro Costa',
        'email' => 'pedro.costa@admin.com',
        'nivel' => 'Admin',
        'data_registo' => '2026-02-01 16:45:00',
        'avatar' => 'avatar-3.png',
        'telefone' => '+244 923 456 787',
        'permissoes' => 'Financeiro',
        'documento' => 'identidade.pdf',
        'motivo' => 'Novo administrador aguardando validação'
    ],
    [
        'id' => 7,
        'nome' => 'Rui Santos',
        'email' => 'rui.santos@admin.com',
        'nivel' => 'Admin',
        'data_registo' => '2026-02-15 09:45:00',
        'avatar' => 'avatar-7.png',
        'telefone' => '+244 923 456 783',
        'permissoes' => 'Conteúdo, Blog',
        'documento' => 'bi.pdf',
        'motivo' => 'Aguardando verificação de documentos'
    ],
    [
        'id' => 11,
        'nome' => 'Márcia Fernandes',
        'email' => 'marcia.fernandes@admin.com',
        'nivel' => 'Super Admin',
        'data_registo' => '2026-02-20 10:30:00',
        'avatar' => 'avatar-11.png',
        'telefone' => '+244 923 456 779',
        'permissoes' => 'Todas',
        'documento' => 'certidao.pdf',
        'motivo' => 'Necessita aprovação do Super Admin'
    ],
    [
        'id' => 12,
        'nome' => 'Paulo Mendes',
        'email' => 'paulo.mendes@admin.com',
        'nivel' => 'Admin',
        'data_registo' => '2026-02-22 14:00:00',
        'avatar' => 'avatar-12.png',
        'telefone' => '+244 923 456 778',
        'permissoes' => 'Suporte, Financeiro',
        'documento' => 'nif.pdf',
        'motivo' => 'Validação pendente'
    ]
];

// Estatísticas
$total_pendentes = count($pendentes_lista);

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admins.php', 'active' => false],
    ['icon' => 'fa-user-check', 'label' => 'Validar', 'link' => 'admin-validar.php', 'active' => true],
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
                        <?php if ($item['label'] === 'Validar'): ?>
                            <span class="badge"><?php echo $total_pendentes; ?></span>
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
                        <i class="fas fa-user-check icon"></i>
                        Validar Administradores
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Validar Administradores</span>
                    </p>
                </div>
                <div class="header-right">
                    <!-- Botão Tema Dark/Light -->
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                    <?php include "../../includes/admin/notificacoes-admin.php" ?>


                    <button class="btn btn-primary" onclick="location.reload()">
                        <i class="fas fa-sync-alt"></i> Atualizar
                    </button>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="value"><?php echo $total_pendentes; ?></div>
                    <div class="label">Pendentes de Validação</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 2 novos
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value">24</div>
                    <div class="label">Validados este mês</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 15.3%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value">3</div>
                    <div class="label">Aguardando documentos</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 2.1%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="value">2</div>
                    <div class="label">Rejeitados</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 5.2%
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filter-bar-admin">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchPendente" placeholder="Pesquisar administrador..." oninput="aplicarFiltros()">
                </div>
                <div class="filter-group">
                    <label>Nível</label>
                    <select id="filterNivel" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="Super Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
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
            </div>

            <!-- ===== LISTA DE PENDENTES ===== -->
            <?php if (count($pendentes_lista) > 0): ?>
                <div class="validacao-grid" id="validacaoGrid">
                    <?php foreach ($pendentes_lista as $pendente): ?>
                        <div class="validacao-card animate-fade-up" data-id="<?php echo $pendente['id']; ?>"
                             data-nivel="<?php echo $pendente['nivel']; ?>"
                             data-nome="<?php echo strtolower($pendente['nome']); ?>"
                             data-email="<?php echo strtolower($pendente['email']); ?>">
                            
                            <div class="validacao-header">
                                <div class="validacao-avatar">
                                    <img src="../../assets/images/<?php echo $pendente['avatar']; ?>" alt="<?php echo $pendente['nome']; ?>">
                                    <span class="status-dot-pendente"></span>
                                </div>
                                <div class="validacao-info">
                                    <h4><?php echo $pendente['nome']; ?></h4>
                                    <span class="validacao-email"><i class="fas fa-envelope"></i> <?php echo $pendente['email']; ?></span>
                                    <span class="validacao-nivel">
                                        <span class="badge badge-<?php echo $pendente['nivel'] === 'Super Admin' ? 'primary' : 'info'; ?>">
                                            <i class="fas <?php echo $pendente['nivel'] === 'Super Admin' ? 'fa-crown' : 'fa-user-shield'; ?>"></i>
                                            <?php echo $pendente['nivel']; ?>
                                        </span>
                                    </span>
                                </div>
                                <div class="validacao-tempo">
                                    <span class="tempo-label">Há</span>
                                    <span class="tempo-valor"><?php 
                                        $diff = time() - strtotime($pendente['data_registo']);
                                        if ($diff < 3600) {
                                            echo floor($diff / 60) . ' minutos';
                                        } elseif ($diff < 86400) {
                                            echo floor($diff / 3600) . ' horas';
                                        } else {
                                            echo floor($diff / 86400) . ' dias';
                                        }
                                    ?></span>
                                </div>
                            </div>

                            <div class="validacao-body">
                                <div class="validacao-detalhes">
                                    <div class="detalhe-item">
                                        <span class="detalhe-label">Telefone</span>
                                        <span class="detalhe-value"><i class="fas fa-phone"></i> <?php echo $pendente['telefone']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <span class="detalhe-label">Permissões</span>
                                        <span class="detalhe-value permissoes-tag"><?php echo $pendente['permissoes']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <span class="detalhe-label">Data de Registo</span>
                                        <span class="detalhe-value"><i class="far fa-calendar-alt"></i> <?php echo date('d/m/Y H:i', strtotime($pendente['data_registo'])); ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <span class="detalhe-label">Documento</span>
                                        <span class="detalhe-value">
                                            <a href="#" class="btn-link-documento" onclick="verDocumento('<?php echo $pendente['documento']; ?>')">
                                                <i class="fas fa-file-pdf"></i> <?php echo $pendente['documento']; ?>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="validacao-motivo">
                                    <span class="motivo-label"><i class="fas fa-info-circle"></i> Motivo da pendência</span>
                                    <p class="motivo-texto"><?php echo $pendente['motivo']; ?></p>
                                </div>
                            </div>

                            <div class="validacao-footer">
                                <button class="btn btn-success btn-validar" onclick="validarAdmin(<?php echo $pendente['id']; ?>, '<?php echo $pendente['nome']; ?>', true)">
                                    <i class="fas fa-check"></i> Aprovar
                                </button>
                                <button class="btn btn-danger btn-rejeitar" onclick="validarAdmin(<?php echo $pendente['id']; ?>, '<?php echo $pendente['nome']; ?>', false)">
                                    <i class="fas fa-times"></i> Rejeitar
                                </button>
                                <a href="admin-detalhe.php?id=<?php echo $pendente['id']; ?>" class="btn btn-outline btn-detalhes">
                                    <i class="fas fa-eye"></i> Ver Detalhes
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="table-pagination" id="paginacaoValidacao">
                    <button class="page-btn prev" onclick="mudarPaginaValidacao('prev')" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="page-info">1 de 1</span>
                    <button class="page-btn next" onclick="mudarPaginaValidacao('next')" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>

            <?php else: ?>
                <!-- ===== EMPTY STATE ===== -->
                <div class="empty-state-admin animate-fade-up">
                    <div class="empty-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4>Todos os administradores validados!</h4>
                    <p>Não há administradores pendentes de validação no momento.</p>
                    <a href="admins.php" class="btn btn-primary">
                        <i class="fas fa-users"></i> Ver todos os administradores
                    </a>
                </div>
            <?php endif; ?>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL CONFIRMAÇÃO                          -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 420px;">
            <div class="modal-header">
                <h3 class="modal-title" id="confirmacaoTitulo">
                    <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar Ação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="confirmacaoCorpo">
                <p id="confirmacaoMensagem">Tem certeza que deseja realizar esta ação?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-danger" id="confirmacaoBtn" onclick="executarConfirmacao()">
                    <i class="fas fa-check"></i> Confirmar
                </button>
            </div>
        </div>
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
        // FILTROS
        // ==========================================

        function aplicarFiltros() {
            const search = document.getElementById('searchPendente').value.toLowerCase().trim();
            const nivel = document.getElementById('filterNivel').value;

            const cards = document.querySelectorAll('.validacao-card');
            let visiveis = 0;

            cards.forEach(card => {
                const nome = card.dataset.nome || '';
                const email = card.dataset.email || '';
                const cardNivel = card.dataset.nivel || '';

                let show = true;

                if (search) {
                    show = nome.includes(search) || email.includes(search);
                }

                if (show && nivel) {
                    show = cardNivel === nivel;
                }

                card.style.display = show ? '' : 'none';
                if (show) visiveis++;
            });

            // Atualizar contador
            const totalBadge = document.querySelector('.stats-grid .stat-card:first-child .value');
            if (totalBadge) {
                totalBadge.textContent = visiveis;
            }

            // Resetar página e atualizar paginação
            paginaAtualValidacao = 1;
            atualizarPaginacaoValidacao();
        }

        function limparFiltros() {
            document.getElementById('searchPendente').value = '';
            document.getElementById('filterNivel').value = '';
            document.querySelectorAll('.validacao-card').forEach(card => {
                card.style.display = '';
            });
            const totalBadge = document.querySelector('.stats-grid .stat-card:first-child .value');
            if (totalBadge) {
                totalBadge.textContent = '<?php echo $total_pendentes; ?>';
            }
            paginaAtualValidacao = 1;
            atualizarPaginacaoValidacao();
        }

        // ==========================================
        // PAGINAÇÃO
        // ==========================================

        let paginaAtualValidacao = 1;
        let itensPorPaginaValidacao = 6;
        let totalItensValidacao = 0;

        function inicializarPaginacao() {
            const cards = document.querySelectorAll('.validacao-card');
            totalItensValidacao = cards.length;
            
            if (totalItensValidacao <= itensPorPaginaValidacao) {
                const paginacao = document.getElementById('paginacaoValidacao');
                if (paginacao) paginacao.style.display = 'none';
                return;
            }

            atualizarPaginacaoValidacao();
        }

        function atualizarPaginacaoValidacao() {
            const cards = document.querySelectorAll('.validacao-card');
            const cardsVisiveis = Array.from(cards).filter(card => card.style.display !== 'none');
            const total = cardsVisiveis.length;
            const totalPaginas = Math.ceil(total / itensPorPaginaValidacao);

            if (total === 0) {
                const paginacao = document.getElementById('paginacaoValidacao');
                if (paginacao) paginacao.style.display = 'none';
                return;
            }

            if (totalPaginas <= 1) {
                const paginacao = document.getElementById('paginacaoValidacao');
                if (paginacao) paginacao.style.display = 'none';
                // Mostrar todos os cards
                cardsVisiveis.forEach((card, index) => {
                    card.style.display = '';
                });
                return;
            }

            const paginacao = document.getElementById('paginacaoValidacao');
            if (paginacao) paginacao.style.display = 'flex';

            // Garantir que a página atual não exceda o total
            if (paginaAtualValidacao > totalPaginas) {
                paginaAtualValidacao = totalPaginas;
            }

            // Calcular início e fim
            const start = (paginaAtualValidacao - 1) * itensPorPaginaValidacao;
            const end = start + itensPorPaginaValidacao;

            // Mostrar/esconder cards
            cardsVisiveis.forEach((card, index) => {
                card.style.display = (index >= start && index < end) ? '' : 'none';
            });

            // Atualizar botões da paginação
            const container = paginacao;
            const prevBtn = container.querySelector('.page-btn.prev');
            const nextBtn = container.querySelector('.page-btn.next');
            const info = container.querySelector('.page-info');

            // Remover botões de página antigos (manter prev, info, next)
            const pageBtns = container.querySelectorAll('.page-btn:not(.prev):not(.next)');
            pageBtns.forEach(btn => btn.remove());

            // Criar botões de página
            const maxVisible = 5;
            let startPage = Math.max(1, paginaAtualValidacao - 2);
            let endPage = Math.min(totalPaginas, startPage + maxVisible - 1);
            
            if (endPage - startPage < maxVisible - 1) {
                startPage = Math.max(1, endPage - maxVisible + 1);
            }

            // Botão primeira página
            if (startPage > 1) {
                const firstBtn = document.createElement('button');
                firstBtn.className = 'page-btn';
                firstBtn.textContent = '1';
                firstBtn.onclick = function() { irParaPaginaValidacao(1); };
                container.insertBefore(firstBtn, info);
                
                if (startPage > 2) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    dots.style.cssText = 'color: var(--text-muted); padding: 0 4px;';
                    container.insertBefore(dots, info);
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                const btn = document.createElement('button');
                btn.className = 'page-btn' + (i === paginaAtualValidacao ? ' active' : '');
                btn.textContent = i;
                btn.onclick = function() { irParaPaginaValidacao(i); };
                container.insertBefore(btn, info);
            }

            if (endPage < totalPaginas) {
                if (endPage < totalPaginas - 1) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    dots.style.cssText = 'color: var(--text-muted); padding: 0 4px;';
                    container.insertBefore(dots, info);
                }
                const lastBtn = document.createElement('button');
                lastBtn.className = 'page-btn';
                lastBtn.textContent = totalPaginas;
                lastBtn.onclick = function() { irParaPaginaValidacao(totalPaginas); };
                container.insertBefore(lastBtn, info);
            }

            // Atualizar navegação
            prevBtn.disabled = paginaAtualValidacao <= 1;
            nextBtn.disabled = paginaAtualValidacao >= totalPaginas;

            // Atualizar info
            if (info) {
                info.textContent = `${paginaAtualValidacao} de ${totalPaginas}`;
            }
        }

        function irParaPaginaValidacao(page) {
            paginaAtualValidacao = page;
            atualizarPaginacaoValidacao();
            
            // Scroll para o topo da lista
            const grid = document.querySelector('.validacao-grid');
            if (grid) {
                grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function mudarPaginaValidacao(direcao) {
            const cards = document.querySelectorAll('.validacao-card');
            const cardsVisiveis = Array.from(cards).filter(card => card.style.display !== 'none');
            const total = cardsVisiveis.length;
            const totalPaginas = Math.ceil(total / itensPorPaginaValidacao);
            
            if (direcao === 'prev' && paginaAtualValidacao > 1) {
                irParaPaginaValidacao(paginaAtualValidacao - 1);
            } else if (direcao === 'next' && paginaAtualValidacao < totalPaginas) {
                irParaPaginaValidacao(paginaAtualValidacao + 1);
            }
        }

        // ==========================================
        // VALIDAÇÃO DE ADMINISTRADORES
        // ==========================================

        let acaoConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            // Atualizar título
            const tituloEl = document.getElementById('confirmacaoTitulo');
            if (tituloEl) {
                tituloEl.innerHTML = `
                    <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> ${titulo}
                `;
            }
            
            // Atualizar mensagem
            const corpoEl = document.getElementById('confirmacaoCorpo');
            if (corpoEl) {
                corpoEl.innerHTML = `<p>${mensagem}</p>`;
            }
            
            // Armazenar callback
            acaoConfirmacao = callback;
            
            // Abrir modal
            const modal = document.getElementById('modalConfirmacao');
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function executarConfirmacao() {
            if (typeof acaoConfirmacao === 'function') {
                acaoConfirmacao();
                acaoConfirmacao = null;
            }
        }

        function validarAdmin(id, nome, aprovar) {
            const actionLabel = aprovar ? 'aprovar' : 'rejeitar';
            const icon = aprovar ? '✅' : '❌';
            
            mostrarConfirmacao(
                `${aprovar ? 'Aprovar' : 'Rejeitar'} Administrador`,
                `Tem certeza que deseja ${actionLabel} o administrador <strong>${nome}</strong>?<br><br>
                ${aprovar ? 
                    '<span style="color: var(--color-future-green);">O administrador será ativado imediatamente.</span>' : 
                    '<span style="color: #FF6B6B;">O administrador será rejeitado e não terá acesso ao sistema.</span>'}`,
                function() {
                    // Simular ação
                    mostrarToast(`Administrador ${nome} ${aprovar ? 'aprovado' : 'rejeitado'} com sucesso! ${icon}`, aprovar ? 'success' : 'error');
                    
                    // Remover card da lista
                    const card = document.querySelector(`.validacao-card[data-id="${id}"]`);
                    if (card) {
                        card.style.transition = 'all 0.3s ease';
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            card.remove();
                            // Atualizar contadores
                            atualizarContadores();
                            // Mostrar empty state se necessário
                            verificarEmptyState();
                        }, 300);
                    }
                    
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function atualizarContadores() {
            const cardsVisiveis = document.querySelectorAll('.validacao-card:not([style*="display: none"])').length;
            const totalCards = document.querySelectorAll('.validacao-card').length;
            
            const pendentesBadge = document.querySelector('.stats-grid .stat-card:first-child .value');
            if (pendentesBadge) {
                pendentesBadge.textContent = totalCards;
            }
            
            // Atualizar badge do sidebar
            const sidebarBadge = document.querySelector('.sidebar-nav .badge-warning');
            if (sidebarBadge) {
                sidebarBadge.textContent = totalCards;
                if (totalCards === 0) {
                    sidebarBadge.style.display = 'none';
                }
            }
            
            // Atualizar bottom nav badge
            const bottomBadge = document.querySelector('.bottom-nav .nav-item .badge');
            if (bottomBadge && bottomBadge.closest('.nav-item')?.querySelector('span')?.textContent === 'Validar') {
                bottomBadge.textContent = totalCards;
                if (totalCards === 0) {
                    bottomBadge.style.display = 'none';
                }
            }

            // Atualizar paginação
            atualizarPaginacaoValidacao();
        }

        function verificarEmptyState() {
            const cards = document.querySelectorAll('.validacao-card');
            const container = document.querySelector('.validacao-grid');
            const paginacao = document.getElementById('paginacaoValidacao');
            
            if (cards.length === 0 && container) {
                container.innerHTML = `
                    <div class="empty-state-admin animate-fade-up" style="grid-column: 1 / -1;">
                        <div class="empty-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h4>Todos os administradores validados!</h4>
                        <p>Não há administradores pendentes de validação no momento.</p>
                        <a href="admins.php" class="btn btn-primary">
                            <i class="fas fa-users"></i> Ver todos os administradores
                        </a>
                    </div>
                `;
                if (paginacao) paginacao.style.display = 'none';
            }
        }

        function verDocumento(documento) {
            mostrarToast(`Visualizando documento: ${documento}`, 'info');
        }

        // ==========================================
        // MODAIS
        // ==========================================

        function abrirModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        // ==========================================
        // INICIALIZAÇÃO
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            // Fechar modal com ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal.active').forEach(modal => {
                        fecharModal(modal.id);
                    });
                }
            });

            // ===== INICIALIZAR PAGINAÇÃO =====
            inicializarPaginacao();
        });
    </script>

    <style>
        /* ========================================== */
        /* PÁGINA DE VALIDAÇÃO - CSS ADICIONAL        */
        /* ========================================== */

        /* ===== VALIDAÇÃO CARDS ===== */
        .validacao-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
            margin-top: var(--space-lg);
        }

        .validacao-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .validacao-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-aurora);
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .validacao-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--glass-shadow);
            background: var(--bg-card-hover);
        }

        .validacao-card:hover::before {
            opacity: 1;
        }

        /* ===== HEADER DO CARD ===== */
        .validacao-header {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
        }

        .validacao-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .validacao-avatar img {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border-color);
        }

        .validacao-avatar .status-dot-pendente {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #F59E0B;
            border: 2px solid var(--bg-card);
            animation: pulse 2s ease-in-out infinite;
        }

        .validacao-info {
            flex: 1;
            min-width: 0;
        }

        .validacao-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 2px 0;
        }

        .validacao-info .validacao-email {
            display: block;
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: 4px;
        }

        .validacao-info .validacao-email i {
            margin-right: 4px;
            width: 14px;
        }

        .validacao-info .validacao-nivel {
            display: inline-block;
        }

        .validacao-tempo {
            text-align: right;
            flex-shrink: 0;
            padding-left: var(--space-sm);
        }

        .validacao-tempo .tempo-label {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .validacao-tempo .tempo-valor {
            display: block;
            font-size: var(--text-sm);
            font-weight: 600;
            color: #F59E0B;
        }

        /* ===== BODY DO CARD ===== */
        .validacao-body {
            margin-bottom: var(--space-md);
        }

        .validacao-detalhes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px 16px;
            margin-bottom: var(--space-md);
        }

        .detalhe-item {
            display: flex;
            flex-direction: column;
        }

        .detalhe-item .detalhe-label {
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            font-weight: 600;
        }

        .detalhe-item .detalhe-value {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .detalhe-item .detalhe-value i {
            color: var(--text-muted);
            width: 14px;
        }

        .permissoes-tag {
            display: inline-block;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            background: rgba(108, 43, 217, 0.08);
            color: var(--admin-primary-light);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        /* ===== MOTIVO ===== */
        .validacao-motivo {
            background: rgba(245, 158, 11, 0.06);
            border-radius: var(--radius-sm);
            padding: var(--space-sm) var(--space-md);
            border-left: 3px solid #F59E0B;
        }

        .validacao-motivo .motivo-label {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 2px;
        }

        .validacao-motivo .motivo-label i {
            margin-right: 4px;
        }

        .validacao-motivo .motivo-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
        }

        /* ===== FOOTER DO CARD ===== */
        .validacao-footer {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
        }

        .validacao-footer .btn {
            flex: 1;
            justify-content: center;
            min-width: 80px;
        }

        .validacao-footer .btn-validar {
            background: var(--color-future-green);
            color: var(--color-deep-blue);
        }

        .validacao-footer .btn-validar:hover {
            background: #00E594;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 255, 163, 0.3);
        }

        .validacao-footer .btn-rejeitar {
            background: #FF6B6B;
            color: white;
        }

        .validacao-footer .btn-rejeitar:hover {
            background: #E55A5A;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }

        .validacao-footer .btn-detalhes {
            flex: 0.5;
            text-decoration: none;
            text-align: center;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== FILTRO BAR ===== */
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
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 32px;
        }

        .filter-bar-admin .filter-actions {
            display: flex;
            gap: 8px;
            margin-left: auto;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state-admin {
            text-align: center;
            padding: 60px 24px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
        }

        .empty-state-admin .empty-icon {
            font-size: 4rem;
            color: var(--color-future-green);
            margin-bottom: var(--space-md);
        }

        .empty-state-admin h4 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
        }

        .empty-state-admin p {
            color: var(--text-muted);
            max-width: 400px;
            margin: 0 auto var(--space-md);
        }

        /* ===== BOTÃO LINK DOCUMENTO ===== */
        .btn-link-documento {
            color: var(--admin-primary-light);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition-smooth);
        }

        .btn-link-documento:hover {
            color: var(--admin-primary);
            text-decoration: underline;
        }

        .btn-link-documento i {
            margin-right: 4px;
        }

        /* ===== PAGINAÇÃO ===== */
        .table-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
            padding: var(--space-md) 0 var(--space-sm);
            flex-wrap: wrap;
            margin-top: var(--space-md);
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

        /* ===== MODAL ===== */
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
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            animation: fadeIn 0.3s ease;
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            max-width: 580px;
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
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .modal-header .modal-title i {
            color: var(--admin-primary-light);
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

        /* Modal Confirmação */
        #modalConfirmacao .modal-content {
            max-width: 420px;
            text-align: center;
        }

        #modalConfirmacao .modal-body p {
            font-size: var(--text-body);
            color: var(--text-secondary);
            line-height: 1.6;
        }

        #modalConfirmacao .modal-body p strong {
            color: var(--text-primary);
        }

        #modalConfirmacao .modal-body p small {
            display: block;
            margin-top: 8px;
            font-size: var(--text-sm);
            color: #FF6B6B;
        }

        #modalConfirmacao .modal-footer {
            justify-content: center;
        }

        #modalConfirmacao .modal-footer .btn {
            min-width: 120px;
        }

        /* Animações */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ===== RESPONSIVIDADE ===== */
        @media (max-width: 768px) {
            .validacao-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .validacao-card {
                padding: var(--space-md);
            }

            .validacao-header {
                flex-wrap: wrap;
            }

            .validacao-tempo {
                width: 100%;
                text-align: left;
                padding-left: 0;
            }

            .validacao-tempo .tempo-label {
                display: inline;
            }

            .validacao-tempo .tempo-valor {
                display: inline;
                margin-left: 4px;
            }

            .validacao-detalhes {
                grid-template-columns: 1fr;
                gap: 6px;
            }

            .validacao-footer {
                flex-direction: column;
            }

            .validacao-footer .btn {
                width: 100%;
            }

            .validacao-footer .btn-detalhes {
                flex: 1;
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
            .validacao-card {
                padding: var(--space-sm);
            }

            .validacao-avatar img {
                width: 44px;
                height: 44px;
            }

            .validacao-info h4 {
                font-size: var(--text-h4);
            }

            .empty-state-admin .empty-icon {
                font-size: 3rem;
            }

            .empty-state-admin h4 {
                font-size: var(--text-h4);
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