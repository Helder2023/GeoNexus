<?php
// painel/admin/index.php - Dashboard Global do Admin
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Dashboard Global';

// Dados mockados
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 12;
$total_tickets = 15;
$notificacoes_count = 8;

// Dados para gráficos
$faturamento_mensal = [
    'labels' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    'values' => [850000, 920000, 1100000, 1050000, 1250000, 1480000, 1350000, 1600000, 1800000, 1950000, 2100000, 2500000]
];

$perfis = [
    'labels' => ['Individuais', 'Empresas', 'Instituições', 'Clientes'],
    'values' => [458, 689, 67, 533]
];

$setores = [
    'labels' => ['Topografia', 'Engenharia', 'GIS', 'Agricultura', 'Mineração', 'Petróleo', 'Energia', 'Urbanismo'],
    'values' => [42, 38, 25, 30, 15, 12, 18, 9]
];

$atividades = [
    ['icon' => 'fa-user-plus', 'icon_class' => 'aurora', 'mensagem' => '<strong>João Silva</strong> criou uma nova conta', 'tempo' => 'há 5 minutos'],
    ['icon' => 'fa-check-circle', 'icon_class' => 'green', 'mensagem' => '<strong>Empresa ABC</strong> foi validada com sucesso', 'tempo' => 'há 23 minutos'],
    ['icon' => 'fa-credit-card', 'icon_class' => 'geo', 'mensagem' => '<strong>Pagamento</strong> de Kz 25.000 confirmado', 'tempo' => 'há 1 hora'],
    ['icon' => 'fa-exclamation-triangle', 'icon_class' => 'red', 'mensagem' => '<strong>Ticket #124</strong> foi aberto por Maria Santos', 'tempo' => 'há 2 horas'],
    ['icon' => 'fa-edit', 'icon_class' => 'aurora', 'mensagem' => '<strong>Projeto "Levantamento GIS"</strong> foi atualizado', 'tempo' => 'há 3 horas'],
];

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => true],
    ['icon' => 'fa-users-cog', 'label' => 'Utilizadores', 'link' => 'admins.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => false],
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
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-th-large icon"></i>
                        Dashboard Global
                    </h1>
                    <p class="breadcrumb">Visão geral do ecossistema GeoNexus</p>
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
                    <div class="value"><?php echo number_format($total_usuarios); ?></div>
                    <div class="label">Total de Utilizadores</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 12.5%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon geo">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="value"><?php echo number_format($total_projetos); ?></div>
                    <div class="label">Projetos Ativos</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 8.3%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($faturamento_total / 1000000, 1); ?>M</div>
                    <div class="label">Faturamento Total</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 23.7%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $pendentes; ?></div>
                    <div class="label">Pendentes</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 5.2%
                    </div>
                </div>
            </section>

            <!-- ===== CHARTS ===== -->
            <section class="charts-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="chart-card">
                    <div class="header">
                        <h3>
                            <i class="fas fa-chart-line icon"></i>
                            Faturamento Mensal
                        </h3>
                        <select class="chart-period" id="chartPeriod">
                            <option value="6">Últimos 6 meses</option>
                            <option value="12" selected>Últimos 12 meses</option>
                            <option value="24">Últimos 24 meses</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartRevenue"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <div class="header">
                        <h3>
                            <i class="fas fa-chart-pie icon"></i>
                            Distribuição por Perfil
                        </h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartUsers"></canvas>
                    </div>
                </div>
            </section>

            <!-- ===== TWO COLUMNS ===== -->
            <section class="two-columns animate-fade-up" style="animation-delay: 0.2s;">
                <div class="card">
                    <h3>
                        <i class="fas fa-chart-bar" style="color: var(--admin-primary-light);"></i>
                        Projetos por Setor
                    </h3>
                    <div class="chart-container" style="height: 280px;">
                        <canvas id="chartSectors"></canvas>
                    </div>
                </div>

                <div class="card">
                    <h3>
                        <i class="fas fa-history" style="color: var(--admin-primary-light);"></i>
                        Atividades Recentes
                    </h3>
                    <div class="activity-list">
                        <?php foreach ($atividades as $atividade): ?>
                            <div class="activity-item">
                                <div class="icon <?php echo $atividade['icon_class']; ?>">
                                    <i class="fas <?php echo $atividade['icon']; ?>"></i>
                                </div>
                                <div class="info">
                                    <p><?php echo $atividade['mensagem']; ?></p>
                                    <span class="time"><i class="far fa-clock"></i> <?php echo $atividade['tempo']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== QUICK ACTIONS ===== -->
            <section class="quick-actions animate-fade-up" style="animation-delay: 0.3s;">
                <h3>
                    <i class="fas fa-bolt icon"></i>
                    Ações Rápidas
                </h3>
                <div class="actions-grid">
                    <a href="admins.php" class="action-item">
                        <i class="fas fa-user-plus icon"></i>
                        <span class="label">Novo Utilizador</span>
                    </a>
                    <a href="admin-validar.php" class="action-item">
                        <i class="fas fa-user-check icon"></i>
                        <span class="label">Validar Utilizadores</span>
                        <span class="badge badge-warning"><?php echo $pendentes_validacao; ?></span>
                    </a>
                    <a href="financeiro/transacoes.php" class="action-item">
                        <i class="fas fa-hand-holding-usd icon"></i>
                        <span class="label">Nova Transação</span>
                    </a>
                    <a href="suporte-tickets.php" class="action-item">
                        <i class="fas fa-ticket-alt icon"></i>
                        <span class="label">Ver Tickets</span>
                        <span class="badge badge-warning"><?php echo $total_tickets; ?></span>
                    </a>
                    <a href="mensagens.php" class="action-item">
                        <i class="fas fa-bullhorn icon"></i>
                        <span class="label">Enviar Mensagem</span>
                    </a>
                    <a href="relatorios-globais.php" class="action-item">
                        <i class="fas fa-file-alt icon"></i>
                        <span class="label">Gerar Relatório</span>
                    </a>
                    <a href="backup.php" class="action-item">
                        <i class="fas fa-database icon"></i>
                        <span class="label">Backup</span>
                    </a>
                    <a href="config/sistema.php" class="action-item">
                        <i class="fas fa-cog icon"></i>
                        <span class="label">Configurações</span>
                    </a>
                </div>
            </section>
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

        // Abrir/fechar notificações
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

                // Fechar ao clicar fora
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

                // Fechar ao clicar fora
                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnPerfil.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }

            // Toggle theme no dropdown do perfil
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
                    // Ripple effect
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple';
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                    this.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 600);

                    // Alternar tema
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    // Atualizar ícone no dropdown do perfil
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
        // GRÁFICOS (Chart.js)
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Chart === 'undefined') {
                console.warn('Chart.js não carregado');
                return;
            }

            const revenueData = {
                labels: <?php echo json_encode($faturamento_mensal['labels']); ?>,
                values: <?php echo json_encode($faturamento_mensal['values']); ?>
            };

            const usersData = {
                labels: <?php echo json_encode($perfis['labels']); ?>,
                values: <?php echo json_encode($perfis['values']); ?>
            };

            const sectorsData = {
                labels: <?php echo json_encode($setores['labels']); ?>,
                values: <?php echo json_encode($setores['values']); ?>
            };

            // Gráfico de Faturamento
            const revenueCtx = document.getElementById('chartRevenue');
            if (revenueCtx) {
                new Chart(revenueCtx, {
                    type: 'line',
                    data: {
                        labels: revenueData.labels,
                        datasets: [{
                            label: 'Faturamento (Kz)',
                            data: revenueData.values,
                            backgroundColor: 'rgba(108, 43, 217, 0.08)',
                            borderColor: '#6C2BD9',
                            borderWidth: 3,
                            pointBackgroundColor: '#6C2BD9',
                            pointRadius: 4,
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Kz ' + (value / 1000).toFixed(0) + 'k';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Gráfico de Utilizadores
            const usersCtx = document.getElementById('chartUsers');
            if (usersCtx) {
                new Chart(usersCtx, {
                    type: 'doughnut',
                    data: {
                        labels: usersData.labels,
                        datasets: [{
                            data: usersData.values,
                            backgroundColor: ['#6C2BD9', '#00D2FF', '#FFD93D', '#6BCB77'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            }
                        },
                        cutout: '65%'
                    }
                });
            }

            // Gráfico de Setores
            const sectorsCtx = document.getElementById('chartSectors');
            if (sectorsCtx) {
                new Chart(sectorsCtx, {
                    type: 'bar',
                    data: {
                        labels: sectorsData.labels,
                        datasets: [{
                            label: 'Projetos',
                            data: sectorsData.values,
                            backgroundColor: [
                                '#6C2BD9', '#8B5CF6', '#00D2FF', '#00FFA3',
                                '#FF6B6B', '#FFD93D', '#FF9F43', '#6BCB77'
                            ],
                            borderRadius: 6,
                            borderSkipped: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 5
                                }
                            }
                        }
                    }
                });
            }

            // Período do gráfico
            document.getElementById('chartPeriod')?.addEventListener('change', function() {
                mostrarToast('Período alterado para: ' + this.options[this.selectedIndex].text, 'success');
            });
        });
    </script>

</body>

</html>