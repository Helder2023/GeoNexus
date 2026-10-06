<?php
// painel/admin/blog-excluir.php - Excluir Artigo do Blog
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Excluir Artigo';
$pagina_atual = 'blog';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Simulando o ID recebido via GET
$artigo_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Artigo para exclusão
$artigo_data = [
    'id' => $artigo_id,
    'titulo' => 'Como a Topografia Está Revolucionando a Construção Civil em Angola',
    'slug' => 'topografia-revolucionando-construcao-civil-angola',
    'resumo' => 'A topografia moderna está transformando a forma como projetamos e construímos em Angola, trazendo mais precisão e eficiência para as obras.',
    'categoria' => 'Topografia',
    'tags' => ['Topografia', 'Construção Civil', 'Inovação', 'Tecnologia'],
    'autor' => 'Carlos Mendes',
    'autor_avatar' => 'avatar-1.png',
    'autor_cargo' => 'Engenheiro Topógrafo',
    'data_publicacao' => '2026-02-15 10:00:00',
    'data_atualizacao' => '2026-02-18 14:20:00',
    'status' => 'publicado',
    'status_label' => 'Publicado',
    'visualizacoes' => 1234,
    'comentarios' => 23,
    'imagem_destaque' => 'blog-1.jpg',
    'video_url' => '',
    'tipo_midia' => 'imagem',
    'destaque' => true
];

// Dados mockados para dependências
$dependencias = [
    'comentarios' => 23,
    'visualizacoes' => 1234,
    'tags' => 4,
    'historico' => 8
];

$total_dependencias = array_sum($dependencias);

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
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FF6B6B&color=fff&size=80';
}

// Função para formatar data
function formatDate($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i', strtotime($datetime));
}

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => false],
    ['icon' => 'fa-blog', 'label' => 'Blog', 'link' => 'blog.php', 'active' => true],
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
                        <?php if ($item['label'] === 'Blog'): ?>
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
                        Excluir Artigo
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="blog.php">Blog</a>
                        <span class="separator">/</span>
                        <a href="blog-artigo.php?id=<?php echo $artigo_data['id']; ?>"><?php echo safeValue($artigo_data['titulo']); ?></a>
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

                                    <?php include "../../includes/admin/notificacoes-admin.php" ?>


                    <div class="header-actions">
                        <a href="blog-artigo.php?id=<?php echo $artigo_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ===== CONTEÚDO ===== -->
            <div class="excluir-artigo-container">

                <!-- ===== ALERTA DE PERIGO ===== -->
                <div class="alert alert-danger animate-fade-up">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Atenção! Esta ação é irreversível</h4>
                        <p>A exclusão do artigo removerá permanentemente todos os dados associados, incluindo o conteúdo, comentários, visualizações e histórico de edições.</p>
                    </div>
                </div>

                <!-- ===== CARD DE CONFIRMAÇÃO ===== -->
                <div class="confirm-card animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="confirm-header">
                        <div class="artigo-avatar">
                            <img src="../../assets/images/<?php echo safeValue($artigo_data['imagem_destaque'], 'blog-default.jpg'); ?>" 
                                 alt="<?php echo safeValue($artigo_data['titulo']); ?>"
                                 onerror="this.src='<?php echo getAvatarUrl($artigo_data['titulo']); ?>'">
                            <span class="status-badge status-<?php echo $artigo_data['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $artigo_data['status_label']; ?>
                            </span>
                            <?php if ($artigo_data['destaque']): ?>
                                <span class="destaque-badge">
                                    <i class="fas fa-star"></i> Destaque
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="artigo-info">
                            <h2><?php echo safeValue($artigo_data['titulo']); ?></h2>
                            <p class="artigo-detail">
                                <i class="fas fa-tag"></i> <?php echo safeValue($artigo_data['categoria']); ?>
                            </p>
                            <p class="artigo-detail">
                                <i class="fas fa-user"></i> <?php echo safeValue($artigo_data['autor']); ?>
                            </p>
                            <p class="artigo-detail">
                                <i class="fas fa-calendar-alt"></i> Publicado em <?php echo formatDate($artigo_data['data_publicacao']); ?>
                            </p>
                            <p class="artigo-detail">
                                <i class="fas fa-eye"></i> <?php echo $artigo_data['visualizacoes']; ?> visualizações
                            </p>
                            <p class="artigo-detail">
                                <i class="fas fa-comment"></i> <?php echo $artigo_data['comentarios']; ?> comentários
                            </p>
                            <div class="artigo-tags-preview">
                                <?php foreach ($artigo_data['tags'] as $tag): ?>
                                    <span class="tag-item">#<?php echo $tag; ?></span>
                                <?php endforeach; ?>
                            </div>
                            <div class="artigo-badges">
                                <span class="badge badge-status <?php echo $artigo_data['status']; ?>">
                                    <i class="fas fa-circle"></i> <?php echo $artigo_data['status_label']; ?>
                                </span>
                                <span class="badge badge-tipo-midia">
                                    <i class="fas <?php echo $artigo_data['tipo_midia'] === 'video' ? 'fa-video' : 'fa-image'; ?>"></i>
                                    <?php echo ucfirst($artigo_data['tipo_midia']); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ESTATÍSTICAS ===== -->
                    <div class="artigo-stats">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['comentarios']; ?></span>
                            <span class="stat-label">Comentários</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['visualizacoes']; ?></span>
                            <span class="stat-label">Visualizações</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['tags']; ?></span>
                            <span class="stat-label">Tags</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['historico']; ?></span>
                            <span class="stat-label">Registos de Histórico</span>
                        </div>
                    </div>
                </div>

                <!-- ===== EFEITOS DA EXCLUSÃO ===== -->
                <div class="effects-card animate-fade-up" style="animation-delay: 0.2s;">
                    <h3><i class="fas fa-list-check"></i> O que acontece ao excluir?</h3>
                    <div class="effects-grid">
                        <div class="effect-item">
                            <div class="effect-icon" style="color: #FF6B6B;">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="effect-info">
                                <span class="effect-title">Conteúdo Removido</span>
                                <span class="effect-desc">O artigo será permanentemente removido do blog</span>
                            </div>
                        </div>
                        <div class="effect-item">
                            <div class="effect-icon" style="color: #F59E0B;">
                                <i class="fas fa-comment-slash"></i>
                            </div>
                            <div class="effect-info">
                                <span class="effect-title">Comentários Excluídos</span>
                                <span class="effect-desc">Todos os comentários associados serão removidos</span>
                            </div>
                        </div>
                        <div class="effect-item">
                            <div class="effect-icon" style="color: #00D2FF;">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="effect-info">
                                <span class="effect-title">Estatísticas Perdidas</span>
                                <span class="effect-desc">Visualizações e métricas serão permanentemente perdidas</span>
                            </div>
                        </div>
                        <div class="effect-item">
                            <div class="effect-icon" style="color: #00FFA3;">
                                <i class="fas fa-undo-alt"></i>
                            </div>
                            <div class="effect-info">
                                <span class="effect-title">Sem Recuperação</span>
                                <span class="effect-desc">Não é possível recuperar o artigo após a exclusão</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== FORMULÁRIO DE CONFIRMAÇÃO ===== -->
                <div class="confirm-form animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="confirm-warning">
                        <i class="fas fa-skull" style="color: #FF6B6B; font-size: 1.5rem;"></i>
                        <p>
                            <strong>Para confirmar a exclusão, digite o título do artigo abaixo:</strong>
                            <br>
                            <span class="text-muted">Digite <strong>"<?php echo safeValue($artigo_data['titulo']); ?>"</strong> para confirmar</span>
                        </p>
                    </div>

                    <form id="formExcluirArtigo" onsubmit="return confirmarExclusao(event)">
                        <div class="form-group">
                            <label for="confirmNome">Confirmar título do artigo <span class="required">*</span></label>
                            <input type="text" id="confirmNome" placeholder="Digite o título exato do artigo" class="input-danger" required>
                            <div class="form-help" id="confirmHelp">
                                <i class="fas fa-info-circle"></i> O título deve corresponder exatamente a <strong>"<?php echo safeValue($artigo_data['titulo']); ?>"</strong>
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
                            <a href="blog-artigo.php?id=<?php echo $artigo_data['id']; ?>" class="btn btn-outline btn-lg">
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
                    O artigo <strong><?php echo safeValue($artigo_data['titulo']); ?></strong> 
                    e todos os seus dados serão permanentemente excluídos.
                </p>
                
                <div class="confirm-stats">
                    <div class="confirm-stat-item">
                        <i class="fas fa-database"></i>
                        <span><strong><?php echo $total_dependencias; ?></strong> registos serão removidos</span>
                    </div>
                    <div class="confirm-stat-details">
                        <span class="stat-chip"><?php echo $dependencias['comentarios']; ?> Comentários</span>
                        <span class="stat-chip"><?php echo $dependencias['visualizacoes']; ?> Visualizações</span>
                        <span class="stat-chip"><?php echo $dependencias['tags']; ?> Tags</span>
                        <span class="stat-chip"><?php echo $dependencias['historico']; ?> Histórico</span>
                    </div>
                </div>
                
                <div class="modal-actions">
                    <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button class="btn btn-danger" id="btnConfirmarExclusao" onclick="excluirArtigo()">
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
        const tituloArtigo = '<?php echo addslashes($artigo_data['titulo']); ?>';
        const confirmInput = document.getElementById('confirmNome');
        const confirmCheck = document.getElementById('confirmCheck');
        const btnExcluir = document.getElementById('btnExcluir');

        function validarFormulario() {
            const tituloCorreto = confirmInput.value.trim() === tituloArtigo;
            const checkMarcado = confirmCheck.checked;

            if (tituloCorreto && checkMarcado) {
                btnExcluir.disabled = false;
                btnExcluir.style.opacity = '1';
                btnExcluir.style.cursor = 'pointer';
                document.getElementById('confirmHelp').innerHTML = `
                    <i class="fas fa-check-circle" style="color: #00FFA3;"></i> 
                    Título confirmado corretamente
                `;
            } else {
                btnExcluir.disabled = true;
                btnExcluir.style.opacity = '0.5';
                btnExcluir.style.cursor = 'not-allowed';
                if (confirmInput.value.trim() !== '') {
                    document.getElementById('confirmHelp').innerHTML = `
                        <i class="fas fa-times-circle" style="color: #FF6B6B;"></i> 
                        O título não corresponde. Digite exatamente: <strong>"${tituloArtigo}"</strong>
                    `;
                } else {
                    document.getElementById('confirmHelp').innerHTML = `
                        <i class="fas fa-info-circle"></i> 
                        O título deve corresponder exatamente a <strong>"${tituloArtigo}"</strong>
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

            const tituloCorreto = confirmInput.value.trim() === tituloArtigo;
            const checkMarcado = confirmCheck.checked;

            if (!tituloCorreto) {
                mostrarToast('O título do artigo não corresponde. Tente novamente.', 'error');
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
        // EXCLUIR ARTIGO
        // ==========================================
        function excluirArtigo() {
            // Fechar modal
            fecharModal('modalConfirmacao');

            // Mostrar loading
            const btn = document.getElementById('btnConfirmarExclusao');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A excluir...';

            // Simular exclusão
            setTimeout(() => {
                // Mostrar toast de sucesso
                mostrarToast('Artigo excluído com sucesso!', 'success');

                // Simular redirecionamento
                setTimeout(() => {
                    window.location.href = 'blog.php';
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
        /* EXCLUIR ARTIGO - CSS COMPLETO              */
        /* ========================================== */

        .excluir-artigo-container {
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

        .artigo-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .artigo-avatar img {
            width: 80px;
            height: 80px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 3px solid var(--border-color);
        }

        .artigo-avatar .status-badge {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .artigo-avatar .destaque-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #FFD93D;
            color: #1A1A2E;
            padding: 2px 8px;
            border-radius: var(--radius-full);
            font-size: 0.55rem;
            font-weight: 500;
        }

        .artigo-avatar .destaque-badge i {
            margin-right: 2px;
        }

        .artigo-info {
            flex: 1;
            min-width: 200px;
        }

        .artigo-info h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .artigo-info .artigo-detail {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 2px 0;
        }

        .artigo-info .artigo-detail i {
            width: 18px;
            color: var(--text-muted);
        }

        .artigo-tags-preview {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-xs);
            margin: var(--space-sm) 0;
        }

        .artigo-tags-preview .tag-item {
            font-size: var(--text-xs);
            color: var(--text-muted);
            background: var(--bg-input);
            padding: 2px 8px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-color);
        }

        .artigo-badges {
            display: flex;
            gap: var(--space-sm);
            margin-top: var(--space-sm);
            flex-wrap: wrap;
        }

        /* ===== STATS ===== */
        .artigo-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .artigo-stats .stat-item {
            text-align: center;
        }

        .artigo-stats .stat-value {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
        }

        .artigo-stats .stat-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
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
            color: #FF6B6B;
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
            border-color: #FF6B6B;
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

        /* ===== INPUT ===== */
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
            border-color: #FF6B6B;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.15);
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

        /* ===== DARK MODE - INPUT ===== */
        [data-theme="dark"] .form-group input[type="text"] {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(255, 255, 255, 0.08);
            color: #FFFFFF;
        }

        [data-theme="dark"] .form-group input[type="text"]:focus {
            background: rgba(255, 255, 255, 0.06);
            border-color: #FF6B6B;
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

        /* ===== LIGHT MODE - INPUT ===== */
        [data-theme="light"] .form-group input[type="text"] {
            background: #F7F9FC;
            border-color: #E5E7EB;
            color: #0A1628;
        }

        [data-theme="light"] .form-group input[type="text"]:focus {
            background: #FFFFFF;
            border-color: #FF6B6B;
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
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .artigo-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .confirm-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .artigo-avatar img {
                width: 100px;
                height: 100px;
            }

            .artigo-badges {
                justify-content: center;
            }

            .artigo-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--space-sm);
            }

            .artigo-stats .stat-value {
                font-size: var(--text-h4);
            }

            .effects-grid {
                grid-template-columns: 1fr;
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

            .excluir-artigo-container {
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

            .artigo-tags-preview {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .excluir-artigo-container {
                gap: var(--space-md);
                padding: 0 8px 60px 8px;
            }

            .confirm-card {
                padding: var(--space-md);
            }

            .effects-card {
                padding: var(--space-md);
            }

            .confirm-form {
                padding: var(--space-md);
            }

            .artigo-stats {
                grid-template-columns: 1fr 1fr;
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

            .artigo-info h2 {
                font-size: var(--text-h3);
            }

            .artigo-avatar img {
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