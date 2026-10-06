<?php
// painel/admin/individual-editar.php - Editar Profissional Individual
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Editar Profissional';
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
    'telefone_alternativo' => '+244 933 456 100',
    'nif' => '5012345678',
    'especialidade' => 'Topografia',
    'sub_especialidade' => 'Levantamentos Topográficos',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_registo' => '2026-01-10 09:15:00',
    'ultimo_acesso' => '2026-02-18 14:20:00',
    'plano' => 'Pro',
    'experiencia' => '8 anos',
    'formacao' => 'Engenharia Geográfica',
    'avatar' => 'profissional-1.png',
    'descricao' => 'Especialista em levantamentos topográficos e georreferenciamento com mais de 8 anos de experiência no mercado.',
    'morada' => 'Rua das Topografias, 123, Luanda, Angola',
    'data_nascimento' => '1988-03-15',
    'genero' => 'Masculino',
    'bi' => '001234567LA042',
    'certificacoes' => ['GNSS', 'Nivelamento', 'Fotogrametria', 'Drone Pilot']
];

// Especialidades disponíveis
$especialidades = [
    'Topografia',
    'Engenharia Civil',
    'GIS',
    'Agricultura de Precisão',
    'Mineração',
    'Petróleo & Gás',
    'Energia',
    'Urbanismo',
    'Transportes',
    'Drones',
    'Educação'
];

// Planos disponíveis
$planos = ['Básico', 'Pro', 'Enterprise'];

// Status disponíveis
$status_opcoes = [
    'ativo' => 'Ativo',
    'pendente' => 'Pendente',
    'inativo' => 'Inativo'
];

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
                        <i class="fas fa-user-edit icon"></i>
                        Editar Profissional
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="individuais.php">Profissionais</a>
                        <span class="separator">/</span>
                        <a href="individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>"><?php echo $profissional_data['nome']; ?></a>
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
                        <a href="individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" form="formEditarProfissional" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== CONTEÚDO ===== -->
            <div class="edit-profissional-container">

                <form id="formEditarProfissional" class="edit-form" onsubmit="return handleSubmit(event)">

                    <!-- ===== STATUS E PLANO ===== -->
                    <div class="form-section animate-fade-up">
                        <h3><i class="fas fa-cog"></i> Status e Plano</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="status">Status <span class="required">*</span></label>
                                <select id="status" name="status" class="form-control" required>
                                    <?php foreach ($status_opcoes as $value => $label): ?>
                                        <option value="<?php echo $value; ?>" <?php echo $profissional_data['status'] === $value ? 'selected' : ''; ?>>
                                            <?php echo $label; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="plano">Plano <span class="required">*</span></label>
                                <select id="plano" name="plano" class="form-control" required>
                                    <?php foreach ($planos as $plano): ?>
                                        <option value="<?php echo $plano; ?>" <?php echo $profissional_data['plano'] === $plano ? 'selected' : ''; ?>>
                                            <?php echo $plano; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DADOS PESSOAIS ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                        <h3><i class="fas fa-user"></i> Dados Pessoais</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nome">Nome Completo <span class="required">*</span></label>
                                <input type="text" id="nome" name="nome" class="form-control" value="<?php echo htmlspecialchars($profissional_data['nome']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="required">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($profissional_data['email']); ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="tel" id="telefone" name="telefone" class="form-control" value="<?php echo htmlspecialchars($profissional_data['telefone']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="telefone_alternativo">Telefone Alternativo</label>
                                <input type="tel" id="telefone_alternativo" name="telefone_alternativo" class="form-control" value="<?php echo htmlspecialchars($profissional_data['telefone_alternativo']); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nif">NIF</label>
                                <input type="text" id="nif" name="nif" class="form-control" value="<?php echo htmlspecialchars($profissional_data['nif']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="bi">BI</label>
                                <input type="text" id="bi" name="bi" class="form-control" value="<?php echo htmlspecialchars($profissional_data['bi']); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="data_nascimento">Data de Nascimento</label>
                                <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="<?php echo $profissional_data['data_nascimento']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select id="genero" name="genero" class="form-control">
                                    <option value="Masculino" <?php echo $profissional_data['genero'] === 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                                    <option value="Feminino" <?php echo $profissional_data['genero'] === 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
                                    <option value="Outro" <?php echo $profissional_data['genero'] === 'Outro' ? 'selected' : ''; ?>>Outro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="morada">Morada</label>
                            <input type="text" id="morada" name="morada" class="form-control" value="<?php echo htmlspecialchars($profissional_data['morada']); ?>">
                        </div>
                    </div>

                    <!-- ===== DADOS PROFISSIONAIS ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                        <h3><i class="fas fa-briefcase"></i> Dados Profissionais</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="especialidade">Especialidade <span class="required">*</span></label>
                                <select id="especialidade" name="especialidade" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    <?php foreach ($especialidades as $especialidade): ?>
                                        <option value="<?php echo $especialidade; ?>" <?php echo $profissional_data['especialidade'] === $especialidade ? 'selected' : ''; ?>>
                                            <?php echo $especialidade; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_especialidade">Sub-Especialidade</label>
                                <input type="text" id="sub_especialidade" name="sub_especialidade" class="form-control" value="<?php echo htmlspecialchars($profissional_data['sub_especialidade']); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="formacao">Formação</label>
                                <input type="text" id="formacao" name="formacao" class="form-control" value="<?php echo htmlspecialchars($profissional_data['formacao']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="experiencia">Experiência</label>
                                <input type="text" id="experiencia" name="experiencia" class="form-control" placeholder="Ex: 8 anos" value="<?php echo htmlspecialchars($profissional_data['experiencia']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea id="descricao" name="descricao" class="form-control" rows="3" placeholder="Descreva o profissional..."><?php echo htmlspecialchars($profissional_data['descricao']); ?></textarea>
                        </div>
                    </div>

                    <!-- ===== CERTIFICAÇÕES ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                        <h3><i class="fas fa-certificate"></i> Certificações</h3>
                        <p class="form-help">Digite as certificações separadas por vírgula</p>
                        <div class="form-group">
                            <label for="certificacoes">Certificações</label>
                            <input type="text" id="certificacoes" name="certificacoes" class="form-control" 
                                   placeholder="Ex: GNSS, Nivelamento, Fotogrametria" 
                                   value="<?php echo htmlspecialchars(implode(', ', $profissional_data['certificacoes'])); ?>">
                        </div>
                        <div class="certificacoes-preview" id="certificacoesPreview">
                            <?php foreach ($profissional_data['certificacoes'] as $cert): ?>
                                <span class="cert-tag">
                                    <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                                    <?php echo $cert; ?>
                                    <button type="button" class="remove-cert" onclick="removerCertificacao(this)">&times;</button>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== AVATAR ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                        <h3><i class="fas fa-image"></i> Foto de Perfil</h3>
                        <div class="avatar-upload-area">
                            <div class="avatar-preview">
                                <img src="../../assets/images/<?php echo $profissional_data['avatar']; ?>" alt="Avatar do Profissional" id="avatarPreview">
                            </div>
                            <div class="avatar-upload-controls">
                                <input type="file" id="avatarUpload" name="avatar" accept="image/*" style="display: none;">
                                <button type="button" class="btn btn-outline" onclick="document.getElementById('avatarUpload').click();">
                                    <i class="fas fa-upload"></i> Alterar Foto
                                </button>
                                <button type="button" class="btn btn-outline btn-sm" style="color: #FF6B6B;" onclick="removerAvatar()">
                                    <i class="fas fa-trash"></i> Remover
                                </button>
                                <p class="form-help">Formatos aceitos: PNG, JPG, SVG. Máximo 2MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- ===== BOTÕES FINAIS ===== -->
                    <div class="form-actions animate-fade-up" style="animation-delay: 0.5s;">
                        <a href="individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>" class="btn btn-outline btn-lg">
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

            // Inicializar preview de certificações
            const certInput = document.getElementById('certificacoes');
            if (certInput) {
                certInput.addEventListener('input', function() {
                    atualizarPreviewCertificacoes(this.value);
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
        // CERTIFICAÇÕES
        // ==========================================

        function atualizarPreviewCertificacoes(value) {
            const preview = document.getElementById('certificacoesPreview');
            if (!preview) return;

            const certs = value.split(',').map(c => c.trim()).filter(c => c !== '');
            
            if (certs.length === 0) {
                preview.innerHTML = '<span class="text-muted" style="font-size: var(--text-sm);">Nenhuma certificação adicionada</span>';
                return;
            }

            preview.innerHTML = certs.map(cert => `
                <span class="cert-tag">
                    <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                    ${cert}
                    <button type="button" class="remove-cert" onclick="removerCertificacaoTexto(this, '${cert}')">&times;</button>
                </span>
            `).join('');
        }

        function removerCertificacao(btn) {
            const tag = btn.parentElement;
            const cert = tag.textContent.replace('×', '').trim();
            tag.remove();

            // Remover da lista de certificações
            const certInput = document.getElementById('certificacoes');
            if (certInput) {
                const certs = certInput.value.split(',').map(c => c.trim()).filter(c => c !== '' && c !== cert);
                certInput.value = certs.join(', ');
            }
        }

        function removerCertificacaoTexto(btn, cert) {
            const tag = btn.parentElement;
            tag.remove();

            const certInput = document.getElementById('certificacoes');
            if (certInput) {
                const certs = certInput.value.split(',').map(c => c.trim()).filter(c => c !== '' && c !== cert);
                certInput.value = certs.join(', ');
            }
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
                preview.src = '../../assets/images/profissional-default.png';
            }
            const input = document.getElementById('avatarUpload');
            if (input) {
                input.value = '';
            }
            mostrarToast('Avatar removido com sucesso!', 'info');
        }

        // ==========================================
        // SUBMIT FORM
        // ==========================================

        function handleSubmit(event) {
            event.preventDefault();

            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const especialidade = document.getElementById('especialidade').value;

            if (!nome || !email || !especialidade) {
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
                    window.location.href = 'individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>';
                }, 1000);
            }, 1500);

            return false;
        }
    </script>

    <style>
        /* ========================================== */
        /* EDITAR PROFISSIONAL - CSS COMPLETO         */
        /* ========================================== */

        .edit-profissional-container {
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
            color: var(--color-turquoise);
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
            border-color: var(--color-turquoise);
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.08);
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

        /* ===== CERTIFICAÇÕES PREVIEW ===== */
        .certificacoes-preview {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-sm);
            margin-top: var(--space-sm);
            padding: var(--space-sm);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            min-height: 40px;
            border: 1px dashed var(--border-color);
        }

        .cert-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .cert-tag .remove-cert {
            background: none;
            border: none;
            color: #FF6B6B;
            cursor: pointer;
            font-size: 1rem;
            padding: 0 2px;
            line-height: 1;
            transition: var(--transition-smooth);
        }

        .cert-tag .remove-cert:hover {
            transform: scale(1.2);
        }

        /* ===== AVATAR UPLOAD ===== */
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
            width: 100px;
            height: 100px;
            border-radius: 50%;
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

        /* ===== FORM ACTIONS ===== */
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
            .edit-profissional-container {
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

            .certificacoes-preview {
                min-height: 30px;
                padding: var(--space-xs);
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

            .cert-tag {
                font-size: var(--text-xs);
                padding: 2px 10px;
            }
        }
    </style>

</body>
</html>