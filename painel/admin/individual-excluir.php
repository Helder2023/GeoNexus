<?php
// painel/admin/individual-excluir.php - Excluir Profissional Individual
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Excluir Profissional';
$pagina_atual = 'individuais'; // <-- ESSENCIAL!

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Simulando o ID recebido via GET
$profissional_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Profissional Individual
$profissional_data = [
    'id' => $profissional_id,
    'nome' => 'Carlos Mendes',
    'email' => 'carlos.mendes@topografia.pt',
    'telefone' => '+244 923 456 100',
    'nif' => '5012345678',
    'especialidade' => 'Topografia',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_registo' => '2026-01-10 09:15:00',
    'ultimo_acesso' => '2026-02-18 14:20:00',
    'plano' => 'Pro',
    'experiencia' => '8 anos',
    'formacao' => 'Engenharia Geográfica',
    'avatar' => 'profissional-1.png',
    'descricao' => 'Especialista em levantamentos topográficos e georreferenciamento',
    'projetos_total' => 12,
    'projetos_andamento' => 3,
    'morada' => 'Rua das Topografias, 123, Luanda, Angola'
];

// Dados mockados - Projetos do profissional
$projetos_relacionados = [
    ['id' => 1, 'nome' => 'Levantamento Topográfico - Luanda Sul', 'status' => 'Em andamento', 'data_inicio' => '2026-01-15'],
    ['id' => 2, 'nome' => 'Georreferenciamento - Kilamba', 'status' => 'Concluído', 'data_inicio' => '2025-12-01'],
    ['id' => 3, 'nome' => 'Modelagem 3D - Talatona', 'status' => 'Em andamento', 'data_inicio' => '2026-02-01'],
    ['id' => 4, 'nome' => 'Levantamento GNSS - Viana', 'status' => 'Concluído', 'data_inicio' => '2025-11-01'],
    ['id' => 5, 'nome' => 'Projeto de Irrigação - Kikuxi', 'status' => 'Em andamento', 'data_inicio' => '2026-02-10'],
];

// Dados mockados para dependências
$dependencias = [
    'projetos' => 12,
    'documentos' => 8,
    'faturas' => 15,
    'pagamentos' => 22,
    'certificacoes' => 4,
    'historico' => 12
];

$total_dependencias = array_sum($dependencias);

// Função para gerar avatar fallback
function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FF6B6B&color=fff&size=80';
}

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => true],
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
                        <?php if ($item['label'] === 'Profissionais'): ?>
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
                        <i class="fas fa-trash-alt icon" style="color: #FF6B6B;"></i>
                        Excluir Profissional
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="individuais.php">Profissionais</a>
                        <span class="separator">/</span>
                        <a href="individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>"><?php echo $profissional_data['nome']; ?></a>
                        <span class="separator">/</span>
                        <span style="color: #FF6B6B;">Excluir</span>
                    </p>
                </div>
                <div class="header-right">
                    <!-- Botão Tema Dark/Light -->
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <div class="header-actions">
                        <a href="individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ===== CONTEÚDO ===== -->
            <div class="delete-profissional-container">

                <!-- ===== ALERTA DE PERIGO ===== -->
                <div class="alert alert-danger animate-fade-up">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Atenção! Esta ação é irreversível</h4>
                        <p>A exclusão do profissional removerá permanentemente todos os dados associados, incluindo projetos, documentos, faturas e histórico de atividades.</p>
                    </div>
                </div>

                <!-- ===== CARD DE CONFIRMAÇÃO ===== -->
                <div class="confirm-card animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="confirm-header">
                        <div class="profissional-avatar">
                            <img src="../../assets/images/<?php echo $profissional_data['avatar']; ?>" 
                                 alt="Avatar do Profissional" 
                                 onerror="this.src='<?php echo getAvatarUrl($profissional_data['nome']); ?>'">
                            <span class="status-badge status-<?php echo $profissional_data['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $profissional_data['status_label']; ?>
                            </span>
                        </div>
                        <div class="profissional-info">
                            <h2><?php echo htmlspecialchars($profissional_data['nome']); ?></h2>
                            <p class="profissional-detail">
                                <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($profissional_data['email']); ?>
                            </p>
                            <p class="profissional-detail">
                                <i class="fas fa-phone"></i> <?php echo htmlspecialchars($profissional_data['telefone']); ?>
                            </p>
                            <p class="profissional-detail">
                                <i class="fas fa-briefcase"></i> <?php echo htmlspecialchars($profissional_data['especialidade']); ?>
                            </p>
                            <p class="profissional-detail">
                                <i class="fas fa-id-card"></i> NIF: <?php echo htmlspecialchars($profissional_data['nif']); ?>
                            </p>
                            <div class="profissional-badges">
                                <span class="badge badge-status <?php echo strtolower($profissional_data['status']); ?>">
                                    <i class="fas fa-circle"></i> <?php echo $profissional_data['status_label']; ?>
                                </span>
                                <span class="badge badge-plano <?php echo strtolower($profissional_data['plano']); ?>">
                                    <i class="fas fa-crown"></i> <?php echo $profissional_data['plano']; ?>
                                </span>
                                <span class="badge badge-info">
                                    <i class="fas fa-briefcase"></i> <?php echo $profissional_data['especialidade']; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ESTATÍSTICAS ===== -->
                    <div class="profissional-stats">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['projetos']; ?></span>
                            <span class="stat-label">Projetos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['documentos']; ?></span>
                            <span class="stat-label">Documentos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['faturas']; ?></span>
                            <span class="stat-label">Faturas</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['pagamentos']; ?></span>
                            <span class="stat-label">Pagamentos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['certificacoes']; ?></span>
                            <span class="stat-label">Certificações</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['historico']; ?></span>
                            <span class="stat-label">Registos de Histórico</span>
                        </div>
                    </div>
                </div>

                <!-- ===== LISTA DE PROJETOS RELACIONADOS ===== -->
                <div class="related-projects animate-fade-up" style="animation-delay: 0.2s;">
                    <h3><i class="fas fa-project-diagram"></i> Projetos Relacionados</h3>
                    <p class="text-muted">Estes projetos serão permanentemente removidos com o profissional</p>
                    <div class="projects-list">
                        <?php foreach ($projetos_relacionados as $projeto): ?>
                            <div class="project-item">
                                <div class="project-info">
                                    <span class="project-name"><?php echo htmlspecialchars($projeto['nome']); ?></span>
                                    <span class="project-date">
                                        <i class="fas fa-calendar-alt"></i> Início: <?php echo date('d/m/Y', strtotime($projeto['data_inicio'])); ?>
                                    </span>
                                </div>
                                <span class="badge badge-status <?php echo strtolower(str_replace(' ', '-', $projeto['status'])); ?>">
                                    <?php echo $projeto['status']; ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- ===== FORMULÁRIO DE CONFIRMAÇÃO ===== -->
                <div class="confirm-form animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="confirm-warning">
                        <i class="fas fa-skull" style="color: #FF6B6B; font-size: 1.5rem;"></i>
                        <p>
                            <strong>Para confirmar a exclusão, digite o nome do profissional abaixo:</strong>
                            <br>
                            <span class="text-muted">Digite <strong>"<?php echo htmlspecialchars($profissional_data['nome']); ?>"</strong> para confirmar</span>
                        </p>
                    </div>

                    <form id="formExcluirProfissional" onsubmit="return confirmarExclusao(event)">
                        <div class="form-group">
                            <label for="confirmNome">Confirmar nome do profissional <span class="required">*</span></label>
                            <input type="text" id="confirmNome" placeholder="Digite o nome exato do profissional" class="input-danger" required>
                            <div class="form-help" id="confirmHelp">
                                <i class="fas fa-info-circle"></i> O nome deve corresponder exatamente a <strong>"<?php echo htmlspecialchars($profissional_data['nome']); ?>"</strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="confirmCheck" required>
                                <span style="color: #FF6B6B;">
                                    <strong>Compreendo que esta ação é irreversível e todos os dados serão permanentemente removidos</strong>
                                </span>
                            </label>
                        </div>

                        <div class="form-actions">
                            <a href="individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>" class="btn btn-outline btn-lg">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-danger btn-lg" id="btnExcluir" disabled>
                                <i class="fas fa-trash-alt"></i> Excluir Permanentemente
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL: CONFIRMAÇÃO FINAL                   -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content modal-confirm">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i> 
                    Última Confirmação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="confirm-icon">
                    <i class="fas fa-skull"></i>
                </div>
                
                <h4 class="confirm-title">Tem certeza absoluta?</h4>
                
                <p class="confirm-text">
                    O profissional <strong><?php echo htmlspecialchars($profissional_data['nome']); ?></strong> 
                    e todos os seus dados serão permanentemente excluídos.
                </p>
                
                <div class="confirm-stats">
                    <div class="confirm-stat-item">
                        <i class="fas fa-database"></i>
                        <span><strong><?php echo $total_dependencias; ?></strong> registos serão removidos</span>
                    </div>
                    <div class="confirm-stat-details">
                        <span class="stat-chip"><?php echo $dependencias['projetos']; ?> Projetos</span>
                        <span class="stat-chip"><?php echo $dependencias['documentos']; ?> Documentos</span>
                        <span class="stat-chip"><?php echo $dependencias['faturas']; ?> Faturas</span>
                        <span class="stat-chip"><?php echo $dependencias['pagamentos']; ?> Pagamentos</span>
                        <span class="stat-chip"><?php echo $dependencias['certificacoes']; ?> Certificações</span>
                        <span class="stat-chip"><?php echo $dependencias['historico']; ?> Histórico</span>
                    </div>
                </div>
                
                <div class="modal-actions">
                    <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button class="btn btn-danger" id="btnConfirmarExclusao" onclick="excluirProfissional()">
                        <i class="fas fa-trash-alt"></i> Excluir Agora
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="../assets/js/main.js"></script>
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
                warning: '#F59E0B',
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
        // VALIDAÇÃO DO FORMULÁRIO
        // ==========================================
        const nomeProfissional = '<?php echo addslashes($profissional_data['nome']); ?>';
        const confirmInput = document.getElementById('confirmNome');
        const confirmCheck = document.getElementById('confirmCheck');
        const btnExcluir = document.getElementById('btnExcluir');

        function validarFormulario() {
            const nomeCorreto = confirmInput.value.trim() === nomeProfissional;
            const checkMarcado = confirmCheck.checked;

            if (nomeCorreto && checkMarcado) {
                btnExcluir.disabled = false;
                btnExcluir.style.opacity = '1';
                btnExcluir.style.cursor = 'pointer';
                document.getElementById('confirmHelp').innerHTML = `
                    <i class="fas fa-check-circle" style="color: #00FFA3;"></i> 
                    Nome confirmado corretamente
                `;
            } else {
                btnExcluir.disabled = true;
                btnExcluir.style.opacity = '0.5';
                btnExcluir.style.cursor = 'not-allowed';
                if (confirmInput.value.trim() !== '') {
                    document.getElementById('confirmHelp').innerHTML = `
                        <i class="fas fa-times-circle" style="color: #FF6B6B;"></i> 
                        O nome não corresponde. Digite exatamente: <strong>"${nomeProfissional}"</strong>
                    `;
                } else {
                    document.getElementById('confirmHelp').innerHTML = `
                        <i class="fas fa-info-circle"></i> 
                        O nome deve corresponder exatamente a <strong>"${nomeProfissional}"</strong>
                    `;
                }
            }
        }

        confirmInput.addEventListener('input', validarFormulario);
        confirmCheck.addEventListener('change', validarFormulario);

        // ==========================================
        // CONFIRMAR EXCLUSÃO
        // ==========================================
        function confirmarExclusao(event) {
            event.preventDefault();

            const nomeCorreto = confirmInput.value.trim() === nomeProfissional;
            const checkMarcado = confirmCheck.checked;

            if (!nomeCorreto) {
                mostrarToast('O nome do profissional não corresponde. Tente novamente.', 'error');
                confirmInput.focus();
                confirmInput.style.borderColor = '#FF6B6B';
                setTimeout(() => confirmInput.style.borderColor = '', 3000);
                return false;
            }

            if (!checkMarcado) {
                mostrarToast('Você precisa confirmar que compreende a irreversibilidade da ação.', 'warning');
                return false;
            }

            // Abrir modal de confirmação final
            document.getElementById('modalConfirmacao').classList.add('active');
            document.body.style.overflow = 'hidden';
            return false;
        }

        // ==========================================
        // EXCLUIR PROFISSIONAL
        // ==========================================
        function excluirProfissional() {
            // Fechar modal
            fecharModal('modalConfirmacao');

            // Mostrar loading
            const btn = document.getElementById('btnConfirmarExclusao');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A excluir...';

            // Simular exclusão
            setTimeout(() => {
                // Mostrar toast de sucesso
                mostrarToast('Profissional excluído com sucesso!', 'success');

                // Simular redirecionamento
                setTimeout(() => {
                    window.location.href = 'individuais.php';
                }, 1500);
            }, 2000);
        }

        // ==========================================
        // MODAIS
        // ==========================================
        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal.active').forEach(modal => {
                    fecharModal(modal.id);
                });
            }
        });
    </script>

    <style>
        /* ========================================== */
        /* EXCLUIR PROFISSIONAL - CSS COMPLETO        */
        /* ========================================== */

        .delete-profissional-container {
            display: flex;
            flex-direction: column;
            gap: 24px;
            max-width: 900px;
            margin: 0 auto;
            padding: 0 16px 80px 16px;
        }

        /* ===== ALERTA ===== */
        .alert-danger {
            background: rgba(255, 107, 107, 0.1);
            border: 1px solid rgba(255, 107, 107, 0.3);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            display: flex;
            gap: var(--space-md);
            align-items: flex-start;
        }

        .alert-danger .alert-icon {
            font-size: 2rem;
            color: #FF6B6B;
            flex-shrink: 0;
        }

        .alert-danger .alert-content h4 {
            color: #FF6B6B;
            font-family: var(--font-display);
            font-weight: 600;
            margin-bottom: var(--space-xs);
            font-size: 1.1rem;
        }

        .alert-danger .alert-content p {
            color: var(--text-secondary);
            margin: 0;
            font-size: var(--text-body);
        }

        /* ===== CARD DE CONFIRMAÇÃO ===== */
        .confirm-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .confirm-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .confirm-header {
            display: flex;
            gap: var(--space-xl);
            flex-wrap: wrap;
        }

        .profissional-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .profissional-avatar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border-color);
        }

        .profissional-avatar .status-badge {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .profissional-info {
            flex: 1;
            min-width: 200px;
        }

        .profissional-info h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .profissional-info .profissional-detail {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 2px 0;
        }

        .profissional-info .profissional-detail i {
            width: 18px;
            color: var(--text-muted);
        }

        .profissional-badges {
            display: flex;
            gap: var(--space-sm);
            margin-top: var(--space-sm);
            flex-wrap: wrap;
        }

        /* ===== STATS ===== */
        .profissional-stats {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .profissional-stats .stat-item {
            text-align: center;
        }

        .profissional-stats .stat-value {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
        }

        .profissional-stats .stat-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== PROJETOS RELACIONADOS ===== */
        .related-projects {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .related-projects:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .related-projects h3 {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .related-projects h3 i {
            color: #FF6B6B;
        }

        .related-projects .text-muted {
            color: var(--text-muted);
            font-size: var(--text-sm);
            margin-bottom: var(--space-md);
        }

        .projects-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .project-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid #FF6B6B;
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .project-item .project-info {
            display: flex;
            flex-direction: column;
        }

        .project-item .project-name {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .project-item .project-date {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .project-item .project-date i {
            margin-right: 4px;
        }

        /* ========================================== */
        /* FORMULÁRIO DE CONFIRMAÇÃO                  */
        /* ========================================== */

        .confirm-form {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .confirm-form:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .confirm-warning {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            background: rgba(255, 107, 107, 0.05);
            border-radius: var(--radius-md);
            padding: var(--space-md);
            margin-bottom: var(--space-lg);
            border: 1px dashed rgba(255, 107, 107, 0.3);
        }

        .confirm-warning p {
            margin: 0;
            color: var(--text-secondary);
            font-size: var(--text-sm);
        }

        .confirm-warning p strong {
            color: var(--text-primary);
        }

        .confirm-warning .text-muted {
            color: var(--text-muted);
            font-size: var(--text-xs);
        }

        .input-danger {
            border-color: #FF6B6B !important;
            background: rgba(255, 107, 107, 0.05) !important;
        }

        .input-danger:focus {
            border-color: #FF6B6B !important;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.15) !important;
            background: var(--bg-card) !important;
        }

        #confirmHelp {
            margin-top: var(--space-xs);
            font-size: var(--text-sm);
        }

        #confirmHelp i {
            margin-right: 4px;
        }

        /* ===== CHECKBOX ===== */
        .checkbox-label {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            cursor: pointer;
            padding: 4px 0;
        }

        .checkbox-label input[type="checkbox"] {
            margin-top: 3px;
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #FF6B6B;
            flex-shrink: 0;
        }

        .checkbox-label span {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .checkbox-label span strong {
            color: var(--text-primary);
        }

        /* ========================================== */
        /* FORM ACTIONS                              */
        /* ========================================== */

        .form-actions {
            display: flex;
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .form-actions .btn {
            min-width: 180px;
            justify-content: center;
        }

        .btn-danger {
            background: #FF6B6B;
            color: #FFFFFF;
            border-color: #FF6B6B;
        }

        .btn-danger:hover {
            background: #E55A5A;
            border-color: #E55A5A;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.35);
        }

        .btn-danger:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        /* ========================================== */
        /* MODAL DE CONFIRMAÇÃO                       */
        /* ========================================== */

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
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
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            animation: fadeIn 0.3s ease;
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            max-width: 480px;
            width: 92%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.4s ease;
            box-shadow: 0 24px 64px rgba(0, 0, 0, 0.4);
            border: 1px solid var(--border-color);
            z-index: 10;
        }

        .modal-confirm {
            border-top: 4px solid #FF6B6B;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-danger {
            border-bottom-color: rgba(255, 107, 107, 0.3);
            background: rgba(255, 107, 107, 0.05);
        }

        .modal-header .modal-title {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: var(--text-h4);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-header .modal-title i {
            font-size: 1.3rem;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.4rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px 8px;
            line-height: 1;
            border-radius: var(--radius-sm);
        }

        .modal-close:hover {
            color: var(--text-primary);
            background: rgba(0, 0, 0, 0.05);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 32px 28px 28px;
            text-align: center;
        }

        .confirm-icon {
            font-size: 4rem;
            color: #FF6B6B;
            margin-bottom: 16px;
            animation: pulseIcon 2s ease-in-out infinite;
        }

        @keyframes pulseIcon {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .confirm-title {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: #FF6B6B;
            margin-bottom: 8px;
        }

        .confirm-text {
            color: var(--text-secondary);
            font-size: var(--text-body);
            line-height: 1.6;
            margin-bottom: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .confirm-text strong {
            color: var(--text-primary);
        }

        .confirm-stats {
            background: rgba(255, 107, 107, 0.06);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            margin-bottom: 24px;
            border: 1px solid rgba(255, 107, 107, 0.15);
        }

        .confirm-stat-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: var(--text-body);
            color: var(--text-primary);
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px dashed rgba(255, 107, 107, 0.15);
        }

        .confirm-stat-item i {
            color: #FF6B6B;
            font-size: 1.2rem;
        }

        .confirm-stat-item strong {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            color: #FF6B6B;
        }

        .confirm-stat-details {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
        }

        .stat-chip {
            background: var(--bg-primary);
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
        }

        .stat-chip:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 4px;
        }

        .modal-actions .btn {
            min-width: 140px;
            justify-content: center;
            padding: 10px 24px;
            font-weight: 600;
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .profissional-stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .confirm-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profissional-avatar img {
                width: 100px;
                height: 100px;
            }

            .profissional-badges {
                justify-content: center;
            }

            .profissional-stats {
                grid-template-columns: repeat(3, 1fr);
                gap: var(--space-sm);
            }

            .profissional-stats .stat-value {
                font-size: var(--text-h4);
            }

            .project-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .confirm-warning {
                flex-direction: column;
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
                min-width: auto;
            }

            .delete-profissional-container {
                padding: 0 12px 70px 12px;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .modal-body {
                padding: 24px 16px 20px;
            }

            .confirm-icon {
                font-size: 3rem;
            }

            .confirm-title {
                font-size: var(--text-h4);
            }

            .confirm-text {
                font-size: var(--text-sm);
            }

            .confirm-stats {
                padding: var(--space-md);
            }

            .confirm-stat-item {
                font-size: var(--text-sm);
            }

            .modal-actions {
                flex-direction: column;
                gap: 8px;
            }

            .modal-actions .btn {
                width: 100%;
                min-width: auto;
            }

            .confirm-stat-details {
                gap: 4px;
            }

            .stat-chip {
                font-size: var(--text-xs);
                padding: 3px 10px;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .delete-profissional-container {
                gap: var(--space-md);
                padding: 0 8px 60px 8px;
            }

            .confirm-card {
                padding: var(--space-md);
            }

            .related-projects {
                padding: var(--space-md);
            }

            .confirm-form {
                padding: var(--space-md);
            }

            .profissional-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .alert-danger {
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: var(--space-md);
            }

            .confirm-warning {
                padding: var(--space-sm);
            }

            .modal-header {
                padding: 12px 16px;
            }

            .modal-header .modal-title {
                font-size: var(--text-sm);
            }

            .modal-body {
                padding: 20px 12px 16px;
            }

            .confirm-icon {
                font-size: 2.5rem;
                margin-bottom: 12px;
            }

            .confirm-title {
                font-size: var(--text-body);
            }

            .confirm-text {
                font-size: var(--text-sm);
            }

            .confirm-stat-item {
                font-size: var(--text-sm);
                flex-wrap: wrap;
            }

            .confirm-stat-item strong {
                font-size: var(--text-body);
            }

            .profissional-info h2 {
                font-size: var(--text-h3);
            }

            .profissional-avatar img {
                width: 80px;
                height: 80px;
            }

            .form-group input[type="text"] {
                padding: 6px 10px;
                font-size: var(--text-sm);
                min-height: 34px;
            }

            .checkbox-label input[type="checkbox"] {
                width: 16px;
                height: 16px;
            }

            .checkbox-label span {
                font-size: var(--text-xs);
            }
        }

        /* ========================================== */
/* INPUT DE CONFIRMAÇÃO - ESTILOS COMPLETOS   */
/* ========================================== */

/* ===== ESTILO BASE DO INPUT ===== */
.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="url"],
.form-group input[type="number"],
.form-group input[type="password"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px 14px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    background: var(--bg-input);
    color: var(--text-primary);
    font-family: var(--font-body);
    font-size: var(--text-sm);
    transition: var(--transition-smooth);
    outline: none;
    min-height: 42px;
}

/* ===== HOVER ===== */
.form-group input[type="text"]:hover,
.form-group input[type="email"]:hover,
.form-group input[type="tel"]:hover,
.form-group input[type="url"]:hover,
.form-group input[type="number"]:hover,
.form-group input[type="password"]:hover,
.form-group select:hover,
.form-group textarea:hover {
    border-color: var(--text-muted);
}

/* ===== FOCUS ===== */
.form-group input[type="text"]:focus,
.form-group input[type="email"]:focus,
.form-group input[type="tel"]:focus,
.form-group input[type="url"]:focus,
.form-group input[type="number"]:focus,
.form-group input[type="password"]:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--color-turquoise);
    box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.15);
    background: var(--bg-card);
}

/* ===== PLACEHOLDER ===== */
.form-group input::placeholder,
.form-group textarea::placeholder {
    color: var(--text-muted);
    font-size: var(--text-sm);
}

/* ===== INPUT DANGER (ERRO) ===== */
.input-danger {
    border-color: #FF6B6B !important;
    background: rgba(255, 107, 107, 0.05) !important;
}

.input-danger:hover {
    border-color: #FF6B6B !important;
}

.input-danger:focus {
    border-color: #FF6B6B !important;
    box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.15) !important;
    background: var(--bg-card) !important;
}

/* ===== INPUT SUCCESS ===== */
.input-success {
    border-color: var(--color-future-green) !important;
    background: rgba(0, 255, 163, 0.05) !important;
}

.input-success:focus {
    border-color: var(--color-future-green) !important;
    box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.15) !important;
}

/* ===== INPUT DESABILITADO ===== */
.form-group input:disabled,
.form-group select:disabled,
.form-group textarea:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    pointer-events: none;
}

/* ===== LABEL ===== */
.form-group label {
    display: block;
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 4px;
}

.form-group label .required {
    color: #FF6B6B;
    margin-left: 2px;
}

/* ===== HELP TEXT ===== */
.form-help {
    font-size: var(--text-xs);
    color: var(--text-muted);
    margin-top: 4px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.form-help i {
    font-size: 0.8rem;
}

/* ===== CHECKBOX LABEL ===== */
.checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    cursor: pointer;
    padding: 4px 0;
}

.checkbox-label input[type="checkbox"] {
    margin-top: 3px;
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: #FF6B6B;
    flex-shrink: 0;
}

.checkbox-label span {
    font-size: var(--text-sm);
    color: var(--text-secondary);
    line-height: 1.4;
}

.checkbox-label span strong {
    color: var(--text-primary);
}

/* ========================================== */
/* DARK MODE - INPUT                         */
/* ========================================== */

[data-theme="dark"] .form-group input[type="text"],
[data-theme="dark"] .form-group input[type="email"],
[data-theme="dark"] .form-group input[type="tel"],
[data-theme="dark"] .form-group input[type="url"],
[data-theme="dark"] .form-group input[type="number"],
[data-theme="dark"] .form-group input[type="password"],
[data-theme="dark"] .form-group select,
[data-theme="dark"] .form-group textarea {
    background: rgba(255, 255, 255, 0.04);
    border-color: rgba(255, 255, 255, 0.08);
    color: #FFFFFF;
}

[data-theme="dark"] .form-group input[type="text"]:focus,
[data-theme="dark"] .form-group input[type="email"]:focus,
[data-theme="dark"] .form-group input[type="tel"]:focus,
[data-theme="dark"] .form-group input[type="url"]:focus,
[data-theme="dark"] .form-group input[type="number"]:focus,
[data-theme="dark"] .form-group input[type="password"]:focus,
[data-theme="dark"] .form-group select:focus,
[data-theme="dark"] .form-group textarea:focus {
    background: rgba(255, 255, 255, 0.06);
    border-color: var(--color-turquoise);
}

[data-theme="dark"] .form-group input::placeholder,
[data-theme="dark"] .form-group textarea::placeholder {
    color: rgba(255, 255, 255, 0.3);
}

[data-theme="dark"] .input-danger {
    background: rgba(255, 107, 107, 0.08) !important;
    border-color: #FF6B6B !important;
}

[data-theme="dark"] .input-danger:focus {
    background: rgba(255, 107, 107, 0.12) !important;
}

[data-theme="dark"] .input-success {
    background: rgba(0, 255, 163, 0.08) !important;
    border-color: var(--color-future-green) !important;
}

[data-theme="dark"] .input-success:focus {
    background: rgba(0, 255, 163, 0.12) !important;
}

/* ========================================== */
/* LIGHT MODE - INPUT                        */
/* ========================================== */

[data-theme="light"] .form-group input[type="text"],
[data-theme="light"] .form-group input[type="email"],
[data-theme="light"] .form-group input[type="tel"],
[data-theme="light"] .form-group input[type="url"],
[data-theme="light"] .form-group input[type="number"],
[data-theme="light"] .form-group input[type="password"],
[data-theme="light"] .form-group select,
[data-theme="light"] .form-group textarea {
    background: #F7F9FC;
    border-color: #E5E7EB;
    color: #0A1628;
}

[data-theme="light"] .form-group input[type="text"]:focus,
[data-theme="light"] .form-group input[type="email"]:focus,
[data-theme="light"] .form-group input[type="tel"]:focus,
[data-theme="light"] .form-group input[type="url"]:focus,
[data-theme="light"] .form-group input[type="number"]:focus,
[data-theme="light"] .form-group input[type="password"]:focus,
[data-theme="light"] .form-group select:focus,
[data-theme="light"] .form-group textarea:focus {
    background: #FFFFFF;
    border-color: var(--color-turquoise);
}

[data-theme="light"] .form-group input::placeholder,
[data-theme="light"] .form-group textarea::placeholder {
    color: #9CA3AF;
}

[data-theme="light"] .input-danger {
    background: rgba(255, 107, 107, 0.05) !important;
    border-color: #FF6B6B !important;
}

[data-theme="light"] .input-danger:focus {
    background: rgba(255, 107, 107, 0.08) !important;
}

[data-theme="light"] .input-success {
    background: rgba(0, 255, 163, 0.05) !important;
    border-color: var(--color-future-green) !important;
}

[data-theme="light"] .input-success:focus {
    background: rgba(0, 255, 163, 0.08) !important;
}

/* ========================================== */
/* RESPONSIVIDADE - INPUT                     */
/* ========================================== */

@media (max-width: 768px) {
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="tel"],
    .form-group input[type="url"],
    .form-group input[type="number"],
    .form-group input[type="password"],
    .form-group select,
    .form-group textarea {
        padding: 8px 12px;
        font-size: var(--text-sm);
        min-height: 38px;
    }

    .checkbox-label span {
        font-size: var(--text-sm);
    }
}

@media (max-width: 480px) {
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="tel"],
    .form-group input[type="url"],
    .form-group input[type="number"],
    .form-group input[type="password"],
    .form-group select,
    .form-group textarea {
        padding: 6px 10px;
        font-size: var(--text-sm);
        min-height: 34px;
        border-radius: var(--radius-sm);
    }

    .checkbox-label input[type="checkbox"] {
        width: 16px;
        height: 16px;
    }

    .checkbox-label span {
        font-size: var(--text-xs);
    }
}
    </style>

</body>
</html>