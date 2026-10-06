<?php
// painel/admin/admin-editar.php - Editar Administrador
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Editar Administrador';
$pagina_atual = 'usuarios';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados para notificações
$notificacoes = [
    [
        'id' => 1,
        'icon' => 'fa-user-plus',
        'icon_class' => 'aurora',
        'mensagem' => '<strong>João Silva</strong> criou uma nova conta',
        'tempo' => 'há 5 minutos',
        'lida' => false
    ],
    [
        'id' => 2,
        'icon' => 'fa-check-circle',
        'icon_class' => 'green',
        'mensagem' => '<strong>Empresa ABC</strong> foi validada com sucesso',
        'tempo' => 'há 23 minutos',
        'lida' => false
    ],
    [
        'id' => 3,
        'icon' => 'fa-credit-card',
        'icon_class' => 'geo',
        'mensagem' => '<strong>Pagamento</strong> de Kz 25.000 confirmado',
        'tempo' => 'há 1 hora',
        'lida' => false
    ],
    [
        'id' => 4,
        'icon' => 'fa-exclamation-triangle',
        'icon_class' => 'red',
        'mensagem' => '<strong>Ticket #124</strong> foi aberto por Maria Santos',
        'tempo' => 'há 2 horas',
        'lida' => false
    ],
    [
        'id' => 5,
        'icon' => 'fa-edit',
        'icon_class' => 'aurora',
        'mensagem' => '<strong>Projeto "Levantamento GIS"</strong> foi atualizado',
        'tempo' => 'há 3 horas',
        'lida' => true
    ],
    [
        'id' => 6,
        'icon' => 'fa-file-invoice',
        'icon_class' => 'green',
        'mensagem' => '<strong>Nova fatura</strong> emitida para Construtora XYZ',
        'tempo' => 'há 5 horas',
        'lida' => true
    ]
];

// Dados mockados - Administrador (simulando o ID recebido via GET)
$admin_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados do Administrador
$admin_data = [
    'id' => $admin_id,
    'nome' => 'João Silva',
    'email' => 'joao.silva@admin.com',
    'nivel' => 'Super Admin',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_registo' => '2026-01-15 10:30:00',
    'ultimo_acesso' => '2026-02-18 14:20:00',
    'avatar' => 'avatar-1.png',
    'telefone' => '+244 923 456 789',
    'permissoes' => 'Todas',
    'bi' => '001234567LA042',
    'data_nascimento' => '1985-03-15',
    'genero' => 'Masculino',
    'morada' => 'Rua das Acácias, 123, Luanda',
    'documento_bi' => 'bi_joao_silva.pdf',
    'documento_certidao' => 'certidao_joao_silva.pdf',
    'documento_foto' => 'foto_joao_silva.jpg',
    'ultima_atualizacao' => '2026-02-18 14:20:00',
    'criado_por' => 'Administrador Master',
];

// Menu do Perfil
$perfil_menu = [
    ['icon' => 'fa-user-cog', 'label' => 'Meu Perfil', 'link' => 'perfil.php'],
    ['icon' => 'fa-sliders-h', 'label' => 'Configurações', 'link' => 'configuracoes.php'],
    ['icon' => 'fa-moon', 'label' => 'Tema Escuro', 'link' => '#', 'class' => 'theme-toggle'],
    ['icon' => 'fa-sign-out-alt', 'label' => 'Sair', 'link' => '../../public/logout.php', 'class' => 'logout-link'],
];

// Opções de nível
$niveis = ['Super Admin', 'Admin'];

// Opções de status
$status_opcoes = ['ativo', 'pendente', 'inativo'];

// Opções de permissões
$permissoes_opcoes = [
    'Todas',
    'Utilizadores, Conteúdo',
    'Financeiro',
    'Suporte',
    'Conteúdo, Blog',
    'Financeiro, Relatórios'
];

// Opções de género
$generos = ['Masculino', 'Feminino', 'Outro'];
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
                        <i class="fas fa-user-edit icon"></i>
                        Editar Administrador
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="admins.php">Administradores</a>
                        <span class="separator">/</span>
                        <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>"><?php echo $admin_data['nome']; ?></a>
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

                    <!-- ========================================== -->
                    <!-- NOTIFICAÇÕES COM DROPDOWN                  -->
                    <!-- ========================================== -->
                    <div class="notifications-wrapper">
                        <button class="btn-notificacoes" id="btnNotificacoes" title="Notificações">
                            <i class="fas fa-bell"></i>
                            <span class="badge" id="notifBadge"><?php echo $notificacoes_count; ?></span>
                        </button>

                        <!-- Dropdown de Notificações -->
                        <div class="notifications-dropdown" id="notificacoesDropdown">
                            <div class="dropdown-header">
                                <h3><i class="fas fa-bell"></i> Notificações</h3>
                                <button class="btn-close-dropdown" onclick="closeNotifications()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="dropdown-body" id="notifList">
                                <!-- Carregado via JS -->
                            </div>
                            <div class="dropdown-footer">
                                <button class="btn btn-sm btn-link" onclick="marcarTodasLidas()">
                                    <i class="fas fa-check-double"></i> Marcar todas como lidas
                                </button>
                                <a href="notificacoes.php" class="btn btn-sm btn-primary">
                                    Ver todas
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================== -->
                    <!-- PERFIL COM DROPDOWN                       -->
                    <!-- ========================================== -->
                    <div class="perfil-wrapper">
                        <button class="btn-perfil" id="btnPerfil">
                            <img src="../../assets/images/avatar-admin.png" alt="Perfil" class="avatar">
                            <span class="name">Administrador</span>
                            <i class="fas fa-chevron-down chevron"></i>
                        </button>

                        <!-- Dropdown do Perfil -->
                        <div class="perfil-dropdown" id="perfilDropdown">
                            <div class="perfil-info">
                                <img src="../../assets/images/avatar-admin.png" alt="Perfil">
                                <div>
                                    <strong>Administrador</strong>
                                    <span>admin@geonnexus.com</span>
                                </div>
                            </div>
                            <hr>
                            <?php foreach ($perfil_menu as $item): ?>
                                <a href="<?php echo $item['link']; ?>" class="<?php echo isset($item['class']) ? $item['class'] : ''; ?>">
                                    <i class="fas <?php echo $item['icon']; ?>"></i>
                                    <?php echo $item['label']; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="header-actions">
                        <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button class="btn btn-primary" onclick="salvarEdicao()">
                            <i class="fas fa-save"></i> Salvar Alterações
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== FORMULÁRIO DE EDIÇÃO ===== -->
            <div class="edit-container">
                <div class="edit-card animate-fade-up">
                    <div class="edit-header">
                        <h2><i class="fas fa-user-cog"></i> Editar Dados do Administrador</h2>
                        <p class="edit-subtitle">Preencha os campos abaixo para atualizar as informações do administrador.</p>
                    </div>

                    <form id="formEditarAdmin" class="edit-form" onsubmit="return false;">
                        <!-- ===== INFORMAÇÕES PESSOAIS ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-user"></i> Informações Pessoais</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nome Completo <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="nome" value="<?php echo $admin_data['nome']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" id="email" value="<?php echo $admin_data['email']; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" value="<?php echo $admin_data['telefone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" value="<?php echo $admin_data['data_nascimento']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Género</label>
                                    <select class="form-control" id="genero">
                                        <?php foreach ($generos as $genero): ?>
                                            <option value="<?php echo $genero; ?>" <?php echo $admin_data['genero'] === $genero ? 'selected' : ''; ?>>
                                                <?php echo $genero; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">BI / Identificação</label>
                                    <input type="text" class="form-control" id="bi" value="<?php echo $admin_data['bi']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Morada</label>
                                <input type="text" class="form-control" id="morada" value="<?php echo $admin_data['morada']; ?>">
                            </div>
                        </div>

                        <!-- ===== DADOS DE ACESSO ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-lock"></i> Dados de Acesso</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nível <span class="required">*</span></label>
                                    <select class="form-control" id="nivel" required>
                                        <?php foreach ($niveis as $nivel): ?>
                                            <option value="<?php echo $nivel; ?>" <?php echo $admin_data['nivel'] === $nivel ? 'selected' : ''; ?>>
                                                <?php echo $nivel; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Status <span class="required">*</span></label>
                                    <select class="form-control" id="status" required>
                                        <?php foreach ($status_opcoes as $status): ?>
                                            <option value="<?php echo $status; ?>" <?php echo $admin_data['status'] === $status ? 'selected' : ''; ?>>
                                                <?php echo ucfirst($status); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Permissões <span class="required">*</span></label>
                                <select class="form-control" id="permissoes" required>
                                    <?php foreach ($permissoes_opcoes as $permissao): ?>
                                        <option value="<?php echo $permissao; ?>" <?php echo $admin_data['permissoes'] === $permissao ? 'selected' : ''; ?>>
                                            <?php echo $permissao; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- ===== ALTERAR SENHA ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-key"></i> Alterar Senha</h3>
                            <p class="form-hint">Deixe em branco para manter a senha atual.</p>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nova Senha</label>
                                    <input type="password" class="form-control" id="nova_senha" placeholder="********">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirmar Senha</label>
                                    <input type="password" class="form-control" id="confirmar_senha" placeholder="********">
                                </div>
                            </div>
                        </div>

                        <!-- ===== BOTÕES ===== -->
                        <div class="form-actions">
                            <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>" class="btn btn-outline btn-lg">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="button" class="btn btn-primary btn-lg" onclick="salvarEdicao()">
                                <i class="fas fa-save"></i> Salvar Alterações
                            </button>
                        </div>
                    </form>
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
        // SALVAR EDIÇÃO
        // ==========================================

        function salvarEdicao() {
            // Validar campos obrigatórios
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const nivel = document.getElementById('nivel').value;
            const status = document.getElementById('status').value;
            const permissoes = document.getElementById('permissoes').value;

            if (!nome || !email || !nivel || !status || !permissoes) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            // Validar email
            if (!email.includes('@') || !email.includes('.')) {
                mostrarToast('Email inválido!', 'error');
                return;
            }

            // Validar senha
            const novaSenha = document.getElementById('nova_senha').value;
            const confirmarSenha = document.getElementById('confirmar_senha').value;

            if (novaSenha || confirmarSenha) {
                if (novaSenha.length < 6) {
                    mostrarToast('A nova senha deve ter pelo menos 6 caracteres!', 'error');
                    return;
                }
                if (novaSenha !== confirmarSenha) {
                    mostrarToast('As senhas não coincidem!', 'error');
                    return;
                }
            }

            // Simular salvamento
            mostrarToast('A salvar alterações...', 'info');

            setTimeout(() => {
                mostrarToast('Alterações salvas com sucesso! ✅', 'success');

                // Redirecionar para página de detalhes após 2 segundos
                setTimeout(() => {
                    window.location.href = 'admin-detalhe.php?id=<?php echo $admin_data['id']; ?>';
                }, 1500);
            }, 1500);
        }
    </script>

    <style>
        /* ========================================== */
        /* EDIÇÃO DO ADMINISTRADOR - CSS              */
        /* ========================================== */

        .edit-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
            max-width: 900px;
            margin: 0 auto;
        }

        /* ===== CARD DE EDIÇÃO ===== */
        .edit-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .edit-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .edit-header {
            margin-bottom: var(--space-xl);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .edit-header h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .edit-header h2 i {
            color: var(--admin-primary-light);
        }

        .edit-header .edit-subtitle {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-top: var(--space-xs);
        }

        /* ===== FORMULÁRIO ===== */
        .edit-form {
            display: flex;
            flex-direction: column;
            gap: var(--space-xl);
        }

        .form-section {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
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
            color: var(--admin-primary-light);
        }

        .form-hint {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: var(--space-md);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-secondary);
            font-size: var(--text-sm);
        }

        .form-label .required {
            color: #FF6B6B;
            margin-left: 2px;
        }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--admin-primary-light);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.08);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-control.error {
            border-color: #FF6B6B;
        }

        .form-control.error:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        /* ===== BOTÕES DO FORMULÁRIO ===== */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .form-actions .btn {
            min-width: 140px;
            justify-content: center;
        }

        .btn-lg {
            padding: 0.8rem 2rem;
            font-size: var(--text-body);
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .edit-container {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .edit-card {
                padding: var(--space-md);
            }

            .edit-header h2 {
                font-size: var(--text-h3);
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .form-section {
                padding: var(--space-md);
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
            .edit-card {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .edit-header h2 {
                font-size: var(--text-h4);
            }

            .form-section {
                padding: var(--space-sm);
                border-radius: var(--radius-sm);
            }

            .form-section h3 {
                font-size: var(--text-sm);
            }

            .form-control {
                font-size: var(--text-sm);
                padding: 8px 12px;
            }

            .form-label {
                font-size: var(--text-xs);
            }
        }
    </style>

</body>
</html>