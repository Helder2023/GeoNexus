<?php
// painel/admin/instituicao-editar.php - Editar Instituição
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Editar Instituição';
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
    'telefone_alternativo' => '+244 933 456 200',
    'nif' => '5001234567',
    'endereco' => 'Av. Universitária, 123, Luanda, Angola',
    'responsavel' => 'Dr. Pedro Costa',
    'responsavel_email' => 'pedro.costa@itl.edu.ao',
    'responsavel_telefone' => '+244 923 456 201',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_registo' => '2026-01-10 09:15:00',
    'ultimo_acesso' => '2026-02-18 14:20:00',
    'plano' => 'Institucional Pro',
    'tipo' => 'Ensino Superior',
    'alunos' => 1250,
    'professores' => 85,
    'cursos' => 12,
    'departamentos' => 6,
    'avatar' => 'instituicao-1.png',
    'descricao' => 'Instituição de ensino superior especializada em engenharia, topografia e geotecnologias. Fundada em 2005, tem formado profissionais de excelência para o mercado angolano.',
    'website' => 'www.itl.edu.ao',
    'fundacao' => '2005-03-15',
    'missao' => 'Formar profissionais de excelência nas áreas de engenharia, topografia e geotecnologias, contribuindo para o desenvolvimento sustentável de Angola.',
    'visao' => 'Ser referência em ensino e investigação em geociências na África Austral até 2030.'
];

// Tipos disponíveis
$tipos = [
    'Ensino Superior',
    'Ensino Técnico',
    'Formação Técnica',
    'Universidade',
    'Investigação',
    'Centro de Formação'
];

// Planos disponíveis
$planos = ['Básico', 'Institucional', 'Institucional Pro'];

// Status disponíveis
$status_opcoes = [
    'ativo' => 'Ativo',
    'pendente' => 'Pendente',
    'inativo' => 'Inativo'
];

// Função para exibir valor de forma segura
function safeValue($value, $default = '') {
    if ($value === null || $value === '') {
        return $default;
    }
    if (is_array($value)) {
        return $default;
    }
    return htmlspecialchars((string)$value);
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
                        <i class="fas fa-user-edit icon"></i>
                        Editar Instituição
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="instituicoes.php">Instituições</a>
                        <span class="separator">/</span>
                        <a href="instituicao-detalhe.php?id=<?php echo $instituicao_data['id']; ?>"><?php echo safeValue($instituicao_data['nome']); ?></a>
                        <span class="separator">/</span>
                        <span>Editar</span>
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
                        <button type="submit" form="formEditarInstituicao" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== CONTEÚDO ===== -->
            <div class="edit-instituicao-container">

                <form id="formEditarInstituicao" class="edit-form" onsubmit="return handleSubmit(event)">

                    <!-- ===== STATUS E PLANO ===== -->
                    <div class="form-section animate-fade-up">
                        <h3><i class="fas fa-cog"></i> Status e Plano</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="status">Status <span class="required">*</span></label>
                                <select id="status" name="status" class="form-control" required>
                                    <?php foreach ($status_opcoes as $value => $label): ?>
                                        <option value="<?php echo $value; ?>" <?php echo $instituicao_data['status'] === $value ? 'selected' : ''; ?>>
                                            <?php echo $label; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="plano">Plano <span class="required">*</span></label>
                                <select id="plano" name="plano" class="form-control" required>
                                    <?php foreach ($planos as $plano): ?>
                                        <option value="<?php echo $plano; ?>" <?php echo $instituicao_data['plano'] === $plano ? 'selected' : ''; ?>>
                                            <?php echo $plano; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DADOS INSTITUCIONAIS ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                        <h3><i class="fas fa-university"></i> Dados Institucionais</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome">Nome da Instituição <span class="required">*</span></label>
                                <input type="text" id="nome" name="nome" class="form-control" value="<?php echo safeValue($instituicao_data['nome']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="sigla">Sigla <span class="required">*</span></label>
                                <input type="text" id="sigla" name="sigla" class="form-control" value="<?php echo safeValue($instituicao_data['sigla']); ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="tipo">Tipo <span class="required">*</span></label>
                                <select id="tipo" name="tipo" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    <?php foreach ($tipos as $tipo): ?>
                                        <option value="<?php echo $tipo; ?>" <?php echo $instituicao_data['tipo'] === $tipo ? 'selected' : ''; ?>>
                                            <?php echo $tipo; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fundacao">Data de Fundação</label>
                                <input type="date" id="fundacao" name="fundacao" class="form-control" value="<?php echo $instituicao_data['fundacao']; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nif">NIF</label>
                                <input type="text" id="nif" name="nif" class="form-control" value="<?php echo safeValue($instituicao_data['nif']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" id="website" name="website" class="form-control" value="<?php echo safeValue($instituicao_data['website']); ?>" placeholder="www.instituicao.edu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" id="endereco" name="endereco" class="form-control" value="<?php echo safeValue($instituicao_data['endereco']); ?>" placeholder="Rua, número, cidade">
                        </div>
                    </div>

                    <!-- ===== CONTACTOS ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                        <h3><i class="fas fa-address-card"></i> Contactos</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email <span class="required">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo safeValue($instituicao_data['email']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="tel" id="telefone" name="telefone" class="form-control" value="<?php echo safeValue($instituicao_data['telefone']); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="telefone_alternativo">Telefone Alternativo</label>
                                <input type="tel" id="telefone_alternativo" name="telefone_alternativo" class="form-control" value="<?php echo safeValue($instituicao_data['telefone_alternativo']); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- ===== RESPONSÁVEL ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                        <h3><i class="fas fa-user-tie"></i> Responsável</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="responsavel">Nome do Responsável <span class="required">*</span></label>
                                <input type="text" id="responsavel" name="responsavel" class="form-control" value="<?php echo safeValue($instituicao_data['responsavel']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="responsavel_email">Email do Responsável <span class="required">*</span></label>
                                <input type="email" id="responsavel_email" name="responsavel_email" class="form-control" value="<?php echo safeValue($instituicao_data['responsavel_email']); ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="responsavel_telefone">Telefone do Responsável</label>
                                <input type="tel" id="responsavel_telefone" name="responsavel_telefone" class="form-control" value="<?php echo safeValue($instituicao_data['responsavel_telefone']); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- ===== MISSÃO, VISÃO E DESCRIÇÃO ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                        <h3><i class="fas fa-bullseye"></i> Missão, Visão e Descrição</h3>
                        <div class="form-group">
                            <label for="missao">Missão</label>
                            <textarea id="missao" name="missao" class="form-control" rows="3" placeholder="Descreva a missão da instituição..."><?php echo safeValue($instituicao_data['missao']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="visao">Visão</label>
                            <textarea id="visao" name="visao" class="form-control" rows="3" placeholder="Descreva a visão da instituição..."><?php echo safeValue($instituicao_data['visao']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" name="descricao" class="form-control" rows="3" placeholder="Breve descrição da instituição..."><?php echo safeValue($instituicao_data['descricao']); ?></textarea>
                        </div>
                    </div>

                    <!-- ===== AVATAR ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.5s;">
                        <h3><i class="fas fa-image"></i> Logotipo da Instituição</h3>
                        <div class="avatar-upload-area">
                            <div class="avatar-preview">
                                <img src="../../assets/images/<?php echo safeValue($instituicao_data['avatar'], 'instituicao-default.png'); ?>" alt="Logotipo da Instituição" id="avatarPreview">
                            </div>
                            <div class="avatar-upload-controls">
                                <input type="file" id="avatarUpload" name="avatar" accept="image/*" style="display: none;">
                                <button type="button" class="btn btn-outline" onclick="document.getElementById('avatarUpload').click();">
                                    <i class="fas fa-upload"></i> Alterar Logotipo
                                </button>
                                <button type="button" class="btn btn-outline btn-sm" style="color: #FF6B6B;" onclick="removerAvatar()">
                                    <i class="fas fa-trash"></i> Remover
                                </button>
                                <p class="form-help">Formatos aceitos: PNG, JPG, SVG. Máximo 2MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- ===== BOTÕES FINAIS ===== -->
                    <div class="form-actions animate-fade-up" style="animation-delay: 0.6s;">
                        <a href="instituicao-detalhe.php?id=<?php echo $instituicao_data['id']; ?>" class="btn btn-outline btn-lg">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Salvar Alterações
                        </button>
                    </div>

                </form>

            </div>
        </main>
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
        // AVATAR
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            const avatarInput = document.getElementById('avatarUpload');
            if (avatarInput) {
                avatarInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const preview = document.getElementById('avatarPreview');
                            if (preview) {
                                preview.src = event.target.result;
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });

        function removerAvatar() {
            const preview = document.getElementById('avatarPreview');
            if (preview) {
                preview.src = '../../assets/images/instituicao-default.png';
            }
            const input = document.getElementById('avatarUpload');
            if (input) {
                input.value = '';
            }
            mostrarToast('Logotipo removido com sucesso!', 'info');
        }

        // ==========================================
        // SUBMIT FORM
        // ==========================================

        function handleSubmit(event) {
            event.preventDefault();

            const nome = document.getElementById('nome').value;
            const sigla = document.getElementById('sigla').value;
            const email = document.getElementById('email').value;
            const tipo = document.getElementById('tipo').value;
            const responsavel = document.getElementById('responsavel').value;
            const responsavel_email = document.getElementById('responsavel_email').value;

            if (!nome || !sigla || !email || !tipo || !responsavel || !responsavel_email) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return false;
            }

            // Simular salvamento
            const btn = event.submitter || document.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A salvar...';

            setTimeout(() => {
                mostrarToast('Alterações salvas com sucesso!', 'success');
                btn.disabled = false;
                btn.innerHTML = originalText;

                setTimeout(() => {
                    window.location.href = 'instituicao-detalhe.php?id=<?php echo $instituicao_data['id']; ?>';
                }, 1000);
            }, 1500);

            return false;
        }
    </script>

    <style>
        /* ========================================== */
        /* EDITAR INSTITUIÇÃO - CSS COMPLETO          */
        /* ========================================== */

        .edit-instituicao-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 0 40px 0;
        }

        /* ===== FORM SECTIONS ===== */
        .form-section {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .form-section:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .form-section h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .form-section h3 i {
            color: var(--profile-institucional);
        }

        /* ===== FORM ROW ===== */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .form-group {
            margin-bottom: var(--space-md);
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        /* ===== FORM LABEL ===== */
        .form-group label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .form-group label .required {
            color: #FF6B6B;
            margin-left: 2px;
        }

        /* ===== FORM CONTROL ===== */
        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--profile-institucional);
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.08);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        /* ===== FORM HELP ===== */
        .form-help {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ========================================== */
        /* AVATAR UPLOAD                             */
        /* ========================================== */

        .avatar-upload-area {
            display: flex;
            gap: var(--space-xl);
            align-items: center;
            flex-wrap: wrap;
        }

        .avatar-preview {
            flex-shrink: 0;
        }

        .avatar-preview img {
            width: 120px;
            height: 120px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 3px solid var(--border-color);
        }

        .avatar-upload-controls {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .avatar-upload-controls .btn {
            width: fit-content;
        }

        /* ========================================== */
        /* FORM ACTIONS                              */
        /* ========================================== */

        .form-actions {
            display: flex;
            gap: var(--space-md);
            justify-content: flex-end;
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .form-actions .btn {
            min-width: 160px;
            justify-content: center;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 768px) {
            .edit-instituicao-container {
                padding: 0 0 30px 0;
            }

            .form-section {
                padding: var(--space-md);
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .avatar-upload-area {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .avatar-upload-controls .btn {
                width: 100%;
                justify-content: center;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .form-actions .btn {
                width: 100%;
                min-width: auto;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .form-section {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .form-section h3 {
                font-size: var(--text-body);
            }

            .form-control {
                font-size: var(--text-sm);
                padding: 6px 10px;
            }

            .avatar-preview img {
                width: 80px;
                height: 80px;
            }
        }
    </style>

</body>
</html>