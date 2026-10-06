<?php
// painel/admin/instituicao-suspender.php - Suspender Instituição
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Suspender Instituição';
$pagina_atual = 'instituicoes'; // <-- ESSENCIAL!

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Simulando o ID recebido via GET
$instituicao_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Instituição
$instituicao_data = [
    'id' => $instituicao_id,
    'nome' => 'Instituto Técnico de Luanda',
    'sigla' => 'ITL',
    'email' => 'contato@itl.edu.ao',
    'telefone' => '+244 923 456 200',
    'nif' => '5001234567',
    'tipo' => 'Ensino Superior',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_registo' => '2026-01-10 09:15:00',
    'ultimo_acesso' => '2026-02-18 14:20:00',
    'plano' => 'Institucional Pro',
    'responsavel' => 'Dr. Pedro Costa',
    'avatar' => 'instituicao-1.png',
    'descricao' => 'Instituição de ensino superior especializada em engenharia, topografia e geotecnologias.',
    'alunos' => 1250,
    'professores' => 85,
    'cursos' => 12,
    'departamentos' => 6,
    'endereco' => 'Av. Universitária, 123, Luanda, Angola'
];

// Dados mockados - Cursos da instituição
$cursos_relacionados = [
    ['id' => 1, 'nome' => 'Engenharia Topográfica', 'status' => 'Ativo', 'alunos' => 120],
    ['id' => 2, 'nome' => 'Engenharia Civil', 'status' => 'Ativo', 'alunos' => 180],
    ['id' => 3, 'nome' => 'Sistemas de Informação Geográfica', 'status' => 'Ativo', 'alunos' => 90],
    ['id' => 4, 'nome' => 'Topografia e Geomensura', 'status' => 'Ativo', 'alunos' => 150],
];

// Dados mockados para dependências
$dependencias = [
    'cursos' => 12,
    'alunos' => 1250,
    'professores' => 85,
    'departamentos' => 6,
    'documentos' => 8,
];

// Função para exibir valor de forma segura
function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') {
        return $default;
    }
    if (is_array($value)) {
        return $default;
    }
    return htmlspecialchars((string)$value);
}

// Função para gerar avatar fallback
function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => true],
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
                        <i class="fas fa-pause icon" style="color: #F59E0B;"></i>
                        Suspender Instituição
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="instituicoes.php">Instituições</a>
                        <span class="separator">/</span>
                        <a href="instituicao-detalhe.php?id=<?php echo $instituicao_data['id']; ?>"><?php echo safeValue($instituicao_data['nome']); ?></a>
                        <span class="separator">/</span>
                        <span style="color: #F59E0B;">Suspender</span>
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
                        <a href="instituicao-detalhe.php?id=<?php echo $instituicao_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ===== CONTEÚDO ===== -->
            <div class="suspend-instituicao-container">

                <!-- ===== ALERTA DE AVISO ===== -->
                <div class="alert alert-warning animate-fade-up">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Atenção! Esta ação irá suspender a instituição</h4>
                        <p>Ao suspender a instituição, todos os cursos, alunos e professores ficarão inativos até a reativação. A instituição não poderá aceder ao sistema.</p>
                    </div>
                </div>

                <!-- ===== CARD DE CONFIRMAÇÃO ===== -->
                <div class="confirm-card animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="confirm-header">
                        <div class="instituicao-avatar">
                            <img src="../../assets/images/<?php echo safeValue($instituicao_data['avatar'], 'instituicao-default.png'); ?>" 
                                 alt="<?php echo safeValue($instituicao_data['nome']); ?>"
                                 onerror="this.src='<?php echo getAvatarUrl($instituicao_data['nome']); ?>'">
                            <span class="status-badge status-<?php echo safeValue($instituicao_data['status'], 'pendente'); ?>">
                                <span class="status-dot"></span>
                                <?php echo safeValue($instituicao_data['status_label'], 'Pendente'); ?>
                            </span>
                        </div>
                        <div class="instituicao-info">
                            <h2><?php echo safeValue($instituicao_data['nome']); ?></h2>
                            <p class="instituicao-detail">
                                <i class="fas fa-tag"></i> <?php echo safeValue($instituicao_data['sigla']); ?>
                            </p>
                            <p class="instituicao-detail">
                                <i class="fas fa-envelope"></i> <?php echo safeValue($instituicao_data['email']); ?>
                            </p>
                            <p class="instituicao-detail">
                                <i class="fas fa-phone"></i> <?php echo safeValue($instituicao_data['telefone']); ?>
                            </p>
                            <p class="instituicao-detail">
                                <i class="fas fa-graduation-cap"></i> <?php echo safeValue($instituicao_data['tipo']); ?>
                            </p>
                            <p class="instituicao-detail">
                                <i class="fas fa-id-card"></i> NIF: <?php echo safeValue($instituicao_data['nif']); ?>
                            </p>
                            <div class="instituicao-badges">
                                <span class="badge badge-status <?php echo safeValue($instituicao_data['status'], 'pendente'); ?>">
                                    <i class="fas fa-circle"></i> <?php echo safeValue($instituicao_data['status_label'], 'Pendente'); ?>
                                </span>
                                <span class="badge badge-plano <?php echo strtolower($instituicao_data['plano'] ?? 'basico'); ?>">
                                    <i class="fas fa-crown"></i> <?php echo safeValue($instituicao_data['plano'], 'Básico'); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ESTATÍSTICAS ===== -->
                    <div class="instituicao-stats">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['alunos']; ?></span>
                            <span class="stat-label">Alunos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['professores']; ?></span>
                            <span class="stat-label">Professores</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['cursos']; ?></span>
                            <span class="stat-label">Cursos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['departamentos']; ?></span>
                            <span class="stat-label">Departamentos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['documentos']; ?></span>
                            <span class="stat-label">Documentos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo date('d/m/Y', strtotime($instituicao_data['data_registo'])); ?></span>
                            <span class="stat-label">Registo</span>
                        </div>
                    </div>
                </div>

                <!-- ===== LISTA DE CURSOS ATIVOS ===== -->
                <div class="related-cursos animate-fade-up" style="animation-delay: 0.2s;">
                    <h3><i class="fas fa-book"></i> Cursos Ativos</h3>
                    <p class="text-muted">Estes cursos serão desativados com a suspensão</p>
                    <div class="cursos-list">
                        <?php foreach ($cursos_relacionados as $curso): ?>
                            <div class="curso-item">
                                <div class="curso-info">
                                    <span class="curso-nome"><?php echo safeValue($curso['nome']); ?></span>
                                    <span class="curso-alunos">
                                        <i class="fas fa-users"></i> <?php echo $curso['alunos']; ?> alunos
                                    </span>
                                </div>
                                <span class="badge badge-status ativo">
                                    <?php echo safeValue($curso['status']); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- ===== EFEITOS DA SUSPENSÃO ===== -->
                <div class="effects-card animate-fade-up" style="animation-delay: 0.25s;">
                    <h3><i class="fas fa-list-check"></i> O que acontece ao suspender?</h3>
                    <div class="effects-grid">
                        <div class="effect-item">
                            <div class="effect-icon" style="color: #FF6B6B;">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="effect-info">
                                <span class="effect-title">Acesso Bloqueado</span>
                                <span class="effect-desc">A instituição não poderá aceder ao sistema</span>
                            </div>
                        </div>
                        <div class="effect-item">
                            <div class="effect-icon" style="color: #F59E0B;">
                                <i class="fas fa-pause-circle"></i>
                            </div>
                            <div class="effect-info">
                                <span class="effect-title">Cursos Pausados</span>
                                <span class="effect-desc">Todos os cursos ativos serão desativados</span>
                            </div>
                        </div>
                        <div class="effect-item">
                            <div class="effect-icon" style="color: #00D2FF;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="effect-info">
                                <span class="effect-title">Notificação Enviada</span>
                                <span class="effect-desc">O responsável será notificado por email</span>
                            </div>
                        </div>
                        <div class="effect-item">
                            <div class="effect-icon" style="color: #00FFA3;">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <div class="effect-info">
                                <span class="effect-title">Reativação Possível</span>
                                <span class="effect-desc">A instituição pode ser reativada a qualquer momento</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== FORMULÁRIO DE CONFIRMAÇÃO ===== -->
                <div class="confirm-form animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="confirm-warning">
                        <i class="fas fa-skull" style="color: #F59E0B; font-size: 1.5rem;"></i>
                        <p>
                            <strong>Para confirmar a suspensão, digite o nome da instituição abaixo:</strong>
                            <br>
                            <span class="text-muted">Digite <strong>"<?php echo safeValue($instituicao_data['nome']); ?>"</strong> para confirmar</span>
                        </p>
                    </div>

                    <form id="formSuspenderInstituicao" onsubmit="return confirmarSuspensao(event)">
                        <div class="form-group">
                            <label for="confirmNome">Confirmar nome da instituição <span class="required">*</span></label>
                            <input type="text" id="confirmNome" placeholder="Digite o nome exato da instituição" class="input-danger" required>
                            <div class="form-help" id="confirmHelp">
                                <i class="fas fa-info-circle"></i> O nome deve corresponder exatamente a <strong>"<?php echo safeValue($instituicao_data['nome']); ?>"</strong>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" id="confirmCheck" required>
                                <span style="color: #F59E0B;">
                                    <strong>Compreendo que esta ação irá suspender a instituição e desativar seus cursos</strong>
                                </span>
                            </label>
                        </div>

                        <div class="form-actions">
                            <a href="instituicao-detalhe.php?id=<?php echo $instituicao_data['id']; ?>" class="btn btn-outline btn-lg">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning btn-lg" id="btnSuspender" disabled>
                                <i class="fas fa-pause"></i> Suspender Instituição
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
            <div class="modal-header modal-header-warning">
                <h3 class="modal-title">
                    <i class="fas fa-exclamation-triangle"></i> 
                    Última Confirmação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="confirm-icon" style="color: #F59E0B;">
                    <i class="fas fa-pause-circle"></i>
                </div>
                
                <h4 class="confirm-title" style="color: #F59E0B;">Tem certeza que deseja suspender?</h4>
                
                <p class="confirm-text">
                    A instituição <strong><?php echo safeValue($instituicao_data['nome']); ?></strong> 
                    será suspensa e não poderá aceder ao sistema.
                </p>
                
                <div class="confirm-stats">
                    <div class="confirm-stat-item">
                        <i class="fas fa-database"></i>
                        <span><strong><?php echo array_sum($dependencias); ?></strong> registos serão afetados</span>
                    </div>
                    <div class="confirm-stat-details">
                        <span class="stat-chip"><?php echo $dependencias['alunos']; ?> Alunos</span>
                        <span class="stat-chip"><?php echo $dependencias['professores']; ?> Professores</span>
                        <span class="stat-chip"><?php echo $dependencias['cursos']; ?> Cursos</span>
                        <span class="stat-chip"><?php echo $dependencias['departamentos']; ?> Departamentos</span>
                        <span class="stat-chip"><?php echo $dependencias['documentos']; ?> Documentos</span>
                    </div>
                </div>
                
                <div class="modal-actions">
                    <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button class="btn btn-warning" id="btnConfirmarSuspensao" onclick="suspenderInstituicao()">
                        <i class="fas fa-pause"></i> Suspender Agora
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
        const nomeInstituicao = '<?php echo addslashes($instituicao_data['nome']); ?>';
        const confirmInput = document.getElementById('confirmNome');
        const confirmCheck = document.getElementById('confirmCheck');
        const btnSuspender = document.getElementById('btnSuspender');

        function validarFormulario() {
            const nomeCorreto = confirmInput.value.trim() === nomeInstituicao;
            const checkMarcado = confirmCheck.checked;

            if (nomeCorreto && checkMarcado) {
                btnSuspender.disabled = false;
                btnSuspender.style.opacity = '1';
                btnSuspender.style.cursor = 'pointer';
                document.getElementById('confirmHelp').innerHTML = `
                    <i class="fas fa-check-circle" style="color: #00FFA3;"></i> 
                    Nome confirmado corretamente
                `;
            } else {
                btnSuspender.disabled = true;
                btnSuspender.style.opacity = '0.5';
                btnSuspender.style.cursor = 'not-allowed';
                if (confirmInput.value.trim() !== '') {
                    document.getElementById('confirmHelp').innerHTML = `
                        <i class="fas fa-times-circle" style="color: #FF6B6B;"></i> 
                        O nome não corresponde. Digite exatamente: <strong>"${nomeInstituicao}"</strong>
                    `;
                } else {
                    document.getElementById('confirmHelp').innerHTML = `
                        <i class="fas fa-info-circle"></i> 
                        O nome deve corresponder exatamente a <strong>"${nomeInstituicao}"</strong>
                    `;
                }
            }
        }

        confirmInput.addEventListener('input', validarFormulario);
        confirmCheck.addEventListener('change', validarFormulario);

        // ==========================================
        // CONFIRMAR SUSPENSÃO
        // ==========================================
        function confirmarSuspensao(event) {
            event.preventDefault();

            const nomeCorreto = confirmInput.value.trim() === nomeInstituicao;
            const checkMarcado = confirmCheck.checked;

            if (!nomeCorreto) {
                mostrarToast('O nome da instituição não corresponde. Tente novamente.', 'error');
                confirmInput.focus();
                confirmInput.style.borderColor = '#FF6B6B';
                setTimeout(() => confirmInput.style.borderColor = '', 3000);
                return false;
            }

            if (!checkMarcado) {
                mostrarToast('Você precisa confirmar que compreende as consequências da suspensão.', 'warning');
                return false;
            }

            // Abrir modal de confirmação final
            document.getElementById('modalConfirmacao').classList.add('active');
            document.body.style.overflow = 'hidden';
            return false;
        }

        // ==========================================
        // SUSPENDER INSTITUIÇÃO
        // ==========================================
        function suspenderInstituicao() {
            // Fechar modal
            fecharModal('modalConfirmacao');

            // Mostrar loading
            const btn = document.getElementById('btnConfirmarSuspensao');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A suspender...';

            // Simular suspensão
            setTimeout(() => {
                // Mostrar toast de sucesso
                mostrarToast('Instituição suspensa com sucesso!', 'success');

                // Simular redirecionamento
                setTimeout(() => {
                    window.location.href = 'instituicao-detalhe.php?id=<?php echo $instituicao_data['id']; ?>';
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
        /* SUSPENDER INSTITUIÇÃO - CSS COMPLETO       */
        /* ========================================== */

        .suspend-instituicao-container {
            display: flex;
            flex-direction: column;
            gap: 24px;
            max-width: 900px;
            margin: 0 auto;
            padding: 0 16px 80px 16px;
        }

        /* ===== ALERTA ===== */
        .alert-warning {
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            display: flex;
            gap: var(--space-md);
            align-items: flex-start;
        }

        .alert-warning .alert-icon {
            font-size: 2rem;
            color: #F59E0B;
            flex-shrink: 0;
        }

        .alert-warning .alert-content h4 {
            color: #F59E0B;
            font-family: var(--font-display);
            font-weight: 600;
            margin-bottom: var(--space-xs);
            font-size: 1.1rem;
        }

        .alert-warning .alert-content p {
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

        .instituicao-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .instituicao-avatar img {
            width: 80px;
            height: 80px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 3px solid var(--border-color);
        }

        .instituicao-avatar .status-badge {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .instituicao-info {
            flex: 1;
            min-width: 200px;
        }

        .instituicao-info h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .instituicao-info .instituicao-detail {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 2px 0;
        }

        .instituicao-info .instituicao-detail i {
            width: 18px;
            color: var(--text-muted);
        }

        .instituicao-badges {
            display: flex;
            gap: var(--space-sm);
            margin-top: var(--space-sm);
            flex-wrap: wrap;
        }

        /* ===== STATS ===== */
        .instituicao-stats {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .instituicao-stats .stat-item {
            text-align: center;
        }

        .instituicao-stats .stat-value {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
        }

        .instituicao-stats .stat-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== CURSOS RELACIONADOS ===== */
        .related-cursos {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .related-cursos:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .related-cursos h3 {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .related-cursos h3 i {
            color: #F59E0B;
        }

        .related-cursos .text-muted {
            color: var(--text-muted);
            font-size: var(--text-sm);
            margin-bottom: var(--space-md);
        }

        .cursos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .curso-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid #F59E0B;
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .curso-item .curso-info {
            display: flex;
            flex-direction: column;
        }

        .curso-item .curso-nome {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .curso-item .curso-alunos {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .curso-item .curso-alunos i {
            margin-right: 4px;
        }

        /* ===== EFEITOS ===== */
        .effects-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .effects-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .effects-card h3 {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .effects-card h3 i {
            color: #F59E0B;
        }

        .effects-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .effect-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .effect-item:hover {
            border-color: #F59E0B;
        }

        .effect-item .effect-icon {
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .effect-item .effect-info {
            display: flex;
            flex-direction: column;
        }

        .effect-item .effect-title {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .effect-item .effect-desc {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* FORMULÁRIO - INPUT COMPLETO                */
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
            background: rgba(245, 158, 11, 0.05);
            border-radius: var(--radius-md);
            padding: var(--space-md);
            margin-bottom: var(--space-lg);
            border: 1px dashed rgba(245, 158, 11, 0.3);
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

        .form-group {
            margin-bottom: 16px;
        }

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

        .form-group input[type="text"] {
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

        .form-group input[type="text"]:hover {
            border-color: var(--text-muted);
        }

        .form-group input[type="text"]:focus {
            border-color: var(--profile-institucional);
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.15);
            background: var(--bg-card);
        }

        .form-group input::placeholder {
            color: var(--text-muted);
            font-size: var(--text-sm);
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
            accent-color: #F59E0B;
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

        /* Dark Mode - Input */
        [data-theme="dark"] .form-group input[type="text"] {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(255, 255, 255, 0.08);
            color: #FFFFFF;
        }

        [data-theme="dark"] .form-group input[type="text"]:focus {
            background: rgba(255, 255, 255, 0.06);
            border-color: var(--profile-institucional);
        }

        [data-theme="dark"] .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        [data-theme="dark"] .input-danger {
            background: rgba(255, 107, 107, 0.08) !important;
            border-color: #FF6B6B !important;
        }

        [data-theme="dark"] .input-danger:focus {
            background: rgba(255, 107, 107, 0.12) !important;
        }

        /* Light Mode - Input */
        [data-theme="light"] .form-group input[type="text"] {
            background: #F7F9FC;
            border-color: #E5E7EB;
            color: #0A1628;
        }

        [data-theme="light"] .form-group input[type="text"]:focus {
            background: #FFFFFF;
            border-color: var(--profile-institucional);
        }

        [data-theme="light"] .form-group input::placeholder {
            color: #9CA3AF;
        }

        [data-theme="light"] .input-danger {
            background: rgba(255, 107, 107, 0.05) !important;
            border-color: #FF6B6B !important;
        }

        [data-theme="light"] .input-danger:focus {
            background: rgba(255, 107, 107, 0.08) !important;
        }

        /* ===== FORM ACTIONS ===== */
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

        .btn-warning {
            background: #F59E0B;
            color: #FFFFFF;
            border-color: #F59E0B;
        }

        .btn-warning:hover {
            background: #D97706;
            border-color: #D97706;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.35);
        }

        .btn-warning:disabled {
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
            border-top: 4px solid #F59E0B;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-warning {
            border-bottom-color: rgba(245, 158, 11, 0.3);
            background: rgba(245, 158, 11, 0.05);
        }

        .modal-header .modal-title {
            font-family: var(--font-display);
            font-weight: 600;
            font-size: var(--text-h4);
            color: #F59E0B;
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
            background: rgba(245, 158, 11, 0.06);
            border-radius: var(--radius-md);
            padding: 16px 20px;
            margin-bottom: 24px;
            border: 1px solid rgba(245, 158, 11, 0.15);
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
            border-bottom: 1px dashed rgba(245, 158, 11, 0.15);
        }

        .confirm-stat-item i {
            color: #F59E0B;
            font-size: 1.2rem;
        }

        .confirm-stat-item strong {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            color: #F59E0B;
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
            border-color: #F59E0B;
            color: #F59E0B;
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
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .instituicao-stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .confirm-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .instituicao-avatar img {
                width: 100px;
                height: 100px;
            }

            .instituicao-badges {
                justify-content: center;
            }

            .instituicao-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--space-sm);
            }

            .instituicao-stats .stat-value {
                font-size: var(--text-h4);
            }

            .effects-grid {
                grid-template-columns: 1fr;
            }

            .curso-item {
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

            .suspend-instituicao-container {
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
        }

        @media (max-width: 480px) {
            .suspend-instituicao-container {
                gap: var(--space-md);
                padding: 0 8px 60px 8px;
            }

            .confirm-card {
                padding: var(--space-md);
            }

            .related-cursos {
                padding: var(--space-md);
            }

            .effects-card {
                padding: var(--space-md);
            }

            .confirm-form {
                padding: var(--space-md);
            }

            .instituicao-stats {
                grid-template-columns: 1fr 1fr;
            }

            .alert-warning {
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

            .instituicao-info h2 {
                font-size: var(--text-h3);
            }

            .instituicao-avatar img {
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
    </style>

</body>
</html>