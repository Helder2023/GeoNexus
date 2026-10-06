<?php
// painel/admin/admin-excluir.php - Excluir Administrador
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Excluir Administrador';
$pagina_atual = 'usuarios';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;



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

// Estatísticas
$total_projetos_admin = 12;
$total_clientes_admin = 8;
$total_acoes = 5;

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admins.php', 'active' => true],
    ['icon' => 'fa-user-check', 'label' => 'Validar', 'link' => 'admin-validar.php', 'active' => false],
    ['icon' => 'fa-chart-pie', 'label' => 'Financeiro', 'link' => 'financeiro/index.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];

// Motivos de exclusão predefinidos
$motivos_exclusao = [
    'Conta duplicada',
    'Solicitação do administrador',
    'Inatividade prolongada',
    'Violação dos termos de uso',
    'Atividade fraudulenta',
    'Dados incorretos',
    'Outro motivo'
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
                        <i class="fas fa-user-times icon"></i>
                        Excluir Administrador
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="admins.php">Administradores</a>
                        <span class="separator">/</span>
                        <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>"><?php echo $admin_data['nome']; ?></a>
                        <span class="separator">/</span>
                        <span>Excluir</span>
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
                    </div>
                </div>
            </header>

            <!-- ===== AVISO DE EXCLUSÃO ===== -->
            <div class="exclusao-container animate-fade-up">
                <div class="exclusao-card">
                    <!-- ===== AVISO PRINCIPAL ===== -->
                    <div class="exclusao-aviso">
                        <div class="aviso-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="aviso-conteudo">
                            <h2>Atenção! Esta ação é permanente</h2>
                            <p>Ao excluir este administrador, todos os seus dados serão removidos permanentemente.</p>
                            <p class="aviso-destaque">Esta ação não pode ser desfeita!</p>
                        </div>
                    </div>

                    <!-- ===== RESUMO DO ADMINISTRADOR ===== -->
                    <div class="exclusao-admin-summary">
                        <div class="admin-card">
                            <div class="admin-avatar">
                                <img src="../../assets/images/<?php echo $admin_data['avatar']; ?>" alt="<?php echo $admin_data['nome']; ?>">
                            </div>
                            <div class="admin-info">
                                <h3><?php echo $admin_data['nome']; ?></h3>
                                <p><i class="fas fa-envelope"></i> <?php echo $admin_data['email']; ?></p>
                                <p><i class="fas fa-user-shield"></i> Nível: <strong><?php echo $admin_data['nivel']; ?></strong></p>
                                <p><i class="fas fa-phone"></i> <?php echo $admin_data['telefone']; ?></p>
                                <span class="status-badge status-<?php echo $admin_data['status']; ?>">
                                    <span class="status-dot"></span>
                                    <?php echo $admin_data['status_label']; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DADOS A SEREM EXCLUÍDOS ===== -->
                    <div class="exclusao-dados">
                        <h3><i class="fas fa-database"></i> Dados que serão excluídos</h3>
                        <div class="dados-grid">
                            <div class="dado-item">
                                <span class="dado-icon"><i class="fas fa-user"></i></span>
                                <span class="dado-info">Informações pessoais</span>
                                <span class="dado-status">Excluído</span>
                            </div>
                            <div class="dado-item">
                                <span class="dado-icon"><i class="fas fa-id-card"></i></span>
                                <span class="dado-info">Documentos (BI, Certidão)</span>
                                <span class="dado-status">Excluído</span>
                            </div>
                            <div class="dado-item">
                                <span class="dado-icon"><i class="fas fa-project-diagram"></i></span>
                                <span class="dado-info">Projetos associados</span>
                                <span class="dado-status">Excluído</span>
                            </div>
                            <div class="dado-item">
                                <span class="dado-icon"><i class="fas fa-history"></i></span>
                                <span class="dado-info">Histórico de atividades</span>
                                <span class="dado-status">Excluído</span>
                            </div>
                            <div class="dado-item">
                                <span class="dado-icon"><i class="fas fa-file-alt"></i></span>
                                <span class="dado-info">Relatórios gerados</span>
                                <span class="dado-status">Excluído</span>
                            </div>
                            <div class="dado-item">
                                <span class="dado-icon"><i class="fas fa-comments"></i></span>
                                <span class="dado-info">Mensagens e notificações</span>
                                <span class="dado-status">Excluído</span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== FORMULÁRIO DE EXCLUSÃO ===== -->
                    <form id="formExclusao" class="exclusao-form" onsubmit="return false;">
                        <div class="form-section">
                            <h3><i class="fas fa-info-circle"></i> Motivo da Exclusão</h3>
                            <p class="form-hint">Selecione ou descreva o motivo para excluir este administrador.</p>

                            <div class="form-group">
                                <label class="form-label">Motivo <span class="required">*</span></label>
                                <select class="form-control" id="motivoSelect" onchange="toggleMotivoOutro()">
                                    <option value="">Selecione um motivo...</option>
                                    <?php foreach ($motivos_exclusao as $motivo): ?>
                                        <option value="<?php echo $motivo; ?>"><?php echo $motivo; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group" id="outroMotivoGroup" style="display: none;">
                                <label class="form-label">Descreva o motivo <span class="required">*</span></label>
                                <textarea class="form-control" id="outroMotivo" rows="3" placeholder="Descreva detalhadamente o motivo da exclusão..."></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Observações Adicionais</label>
                                <textarea class="form-control" id="observacoes" rows="3" placeholder="Observações adicionais sobre a exclusão..."></textarea>
                            </div>
                        </div>

                        <!-- ===== CONFIRMAÇÃO ===== -->
                        <div class="form-section confirmacao-exclusao">
                            <h3><i class="fas fa-check-circle"></i> Confirmar Exclusão</h3>
                            <div class="confirmacao-checkbox">
                                <label>
                                    <input type="checkbox" id="confirmarCheck">
                                    <span>Confirmo que estou ciente que esta ação excluirá permanentemente o administrador <strong><?php echo $admin_data['nome']; ?></strong> e todos os seus dados.</span>
                                </label>
                            </div>
                            <div class="confirmacao-checkbox">
                                <label>
                                    <input type="checkbox" id="backupCheck">
                                    <span>Desejo criar um backup dos dados antes da exclusão.</span>
                                </label>
                            </div>
                            <div class="confirmacao-checkbox">
                                <label>
                                    <input type="checkbox" id="notificarCheck">
                                    <span>Enviar notificação por email ao administrador sobre a exclusão.</span>
                                </label>
                            </div>
                        </div>

                        <!-- ===== BOTÕES ===== -->
                        <div class="form-actions">
                            <a href="admin-detalhe.php?id=<?php echo $admin_data['id']; ?>" class="btn btn-outline btn-lg">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="button" class="btn btn-danger btn-lg" onclick="confirmarExclusao()">
                                <i class="fas fa-user-times"></i> Excluir Administrador
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL CONFIRMAÇÃO                          -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 450px;">
            <div class="modal-header">
                <h3 class="modal-title" style="color: #FF6B6B;">
                    <i class="fas fa-exclamation-triangle"></i> Confirmar Exclusão
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="confirmacao-detalhes">
                    <div class="confirmacao-icon">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <h4>Tem certeza que deseja excluir este administrador?</h4>
                    <p>Esta ação irá excluir permanentemente o administrador <strong><?php echo $admin_data['nome']; ?></strong> e todos os seus dados associados.</p>
                    <div class="confirmacao-alerta">
                        <i class="fas fa-info-circle"></i>
                        <span>Esta ação é <strong>irreversível</strong> e não pode ser desfeita.</span>
                    </div>
                    <div class="confirmacao-info">
                        <p><strong>Dados que serão excluídos:</strong></p>
                        <ul>
                            <li>Informações pessoais</li>
                            <li>Documentos (BI, Certidão, Foto)</li>
                            <li>Projetos associados (<?php echo $total_projetos_admin; ?>)</li>
                            <li>Histórico de atividades (<?php echo $total_acoes; ?> registos)</li>
                            <li>Relatórios gerados</li>
                            <li>Mensagens e notificações</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-danger" onclick="executarExclusao()">
                    <i class="fas fa-user-times"></i> Confirmar Exclusão
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
        // FUNÇÕES DA EXCLUSÃO
        // ==========================================

        function toggleMotivoOutro() {
            const select = document.getElementById('motivoSelect');
            const outroGroup = document.getElementById('outroMotivoGroup');
            
            if (select.value === 'Outro motivo') {
                outroGroup.style.display = 'block';
            } else {
                outroGroup.style.display = 'none';
            }
        }

        function confirmarExclusao() {
            const motivo = document.getElementById('motivoSelect').value;
            const outroMotivo = document.getElementById('outroMotivo').value;
            const confirmar = document.getElementById('confirmarCheck').checked;

            // Validação
            if (!motivo) {
                mostrarToast('Selecione um motivo para a exclusão!', 'error');
                return;
            }

            if (motivo === 'Outro motivo' && !outroMotivo.trim()) {
                mostrarToast('Descreva o motivo da exclusão!', 'error');
                return;
            }

            if (!confirmar) {
                mostrarToast('Confirme que está ciente da exclusão!', 'error');
                return;
            }

            // Abrir modal de confirmação
            const modal = document.getElementById('modalConfirmacao');
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function executarExclusao() {
            const motivo = document.getElementById('motivoSelect').value;
            const outroMotivo = document.getElementById('outroMotivo').value;
            const observacoes = document.getElementById('observacoes').value;
            const fazerBackup = document.getElementById('backupCheck').checked;
            const notificar = document.getElementById('notificarCheck').checked;

            const motivoFinal = motivo === 'Outro motivo' ? outroMotivo : motivo;

            // Fechar modal
            fecharModal('modalConfirmacao');

            // Simular exclusão
            mostrarToast('A excluir administrador...', 'info');

            setTimeout(() => {
                mostrarToast(`Administrador ${'<?php echo $admin_data['nome']; ?>'} excluído com sucesso! 🗑️`, 'error');
                
                if (fazerBackup) {
                    mostrarToast('Backup dos dados criado com sucesso! 💾', 'success');
                }
                
                if (notificar) {
                    mostrarToast('Notificação enviada por email ao administrador.', 'info');
                }

                // Redirecionar após 2 segundos
                setTimeout(() => {
                    window.location.href = 'admins.php';
                }, 2000);
            }, 1500);
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

        // Fechar modal com ESC
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
        /* EXCLUSÃO - CSS                             */
        /* ========================================== */

        .exclusao-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .exclusao-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .exclusao-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== AVISO ===== */
        .exclusao-aviso {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border: 1px solid rgba(255, 107, 107, 0.15);
            border-radius: var(--radius-md);
            padding: var(--space-md) var(--space-lg);
            margin-bottom: var(--space-xl);
        }

        .exclusao-aviso .aviso-icon {
            font-size: 2.5rem;
            color: #FF6B6B;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .exclusao-aviso .aviso-conteudo h2 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: #FF6B6B;
            margin-bottom: var(--space-xs);
        }

        .exclusao-aviso .aviso-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
        }

        .exclusao-aviso .aviso-destaque {
            font-weight: 700;
            color: #FF6B6B;
            margin-top: var(--space-xs) !important;
        }

        /* ===== ADMIN SUMMARY ===== */
        .exclusao-admin-summary {
            margin-bottom: var(--space-xl);
        }

        .exclusao-admin-summary .admin-card {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
        }

        .exclusao-admin-summary .admin-avatar img {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--admin-primary-light);
        }

        .exclusao-admin-summary .admin-info h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .exclusao-admin-summary .admin-info p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .exclusao-admin-summary .admin-info p i {
            margin-right: 6px;
            color: var(--admin-primary-light);
        }

        .exclusao-admin-summary .admin-info p strong {
            color: var(--text-primary);
        }

        /* ===== DADOS A EXCLUIR ===== */
        .exclusao-dados {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-xl);
        }

        .exclusao-dados h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .exclusao-dados h3 i {
            color: var(--admin-primary-light);
        }

        .dados-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: var(--space-sm);
        }

        .dado-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-card);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .dado-item .dado-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: rgba(255, 107, 107, 0.08);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .dado-item .dado-info {
            flex: 1;
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .dado-item .dado-status {
            font-size: var(--text-xs);
            color: #FF6B6B;
            font-weight: 600;
            background: rgba(255, 107, 107, 0.08);
            padding: 2px 10px;
            border-radius: var(--radius-full);
        }

        /* ===== FORMULÁRIO ===== */
        .exclusao-form {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
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
            margin-bottom: var(--space-sm);
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

        .form-group {
            margin-bottom: var(--space-md);
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
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

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
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

        /* ===== CONFIRMAÇÃO ===== */
        .confirmacao-exclusao {
            border-color: rgba(255, 107, 107, 0.15);
        }

        .confirmacao-checkbox {
            margin-bottom: var(--space-sm);
        }

        .confirmacao-checkbox:last-child {
            margin-bottom: 0;
        }

        .confirmacao-checkbox label {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            cursor: pointer;
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .confirmacao-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 2px;
            cursor: pointer;
            accent-color: var(--admin-primary);
        }

        .confirmacao-checkbox label strong {
            color: var(--text-primary);
        }

        /* ===== BOTÕES ===== */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .form-actions .btn {
            min-width: 180px;
            justify-content: center;
        }

        .btn-lg {
            padding: 0.8rem 2rem;
            font-size: var(--text-body);
        }

        .btn-danger {
            background: #FF6B6B;
            color: white;
            box-shadow: 0 4px 20px rgba(255, 107, 107, 0.3);
        }

        .btn-danger:hover {
            background: #E55A5A;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 107, 107, 0.4);
        }

        /* ===== MODAL CONFIRMAÇÃO ===== */
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
            max-width: 450px;
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
            color: #FF6B6B;
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
            min-width: 120px;
            justify-content: center;
        }

        /* ===== CONFIRMAÇÃO DETALHES ===== */
        .confirmacao-detalhes {
            text-align: center;
        }

        .confirmacao-detalhes .confirmacao-icon {
            font-size: 4rem;
            color: #FF6B6B;
            margin-bottom: var(--space-md);
        }

        .confirmacao-detalhes h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
        }

        .confirmacao-detalhes p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin-bottom: var(--space-md);
        }

        .confirmacao-detalhes .confirmacao-alerta {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            background: rgba(255, 107, 107, 0.06);
            border: 1px solid rgba(255, 107, 107, 0.1);
            border-radius: var(--radius-sm);
            padding: var(--space-sm) var(--space-md);
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin-bottom: var(--space-md);
        }

        .confirmacao-detalhes .confirmacao-alerta i {
            color: #FF6B6B;
        }

        .confirmacao-detalhes .confirmacao-info {
            text-align: left;
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            padding: var(--space-md);
            border: 1px solid var(--border-color);
        }

        .confirmacao-detalhes .confirmacao-info p {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
        }

        .confirmacao-detalhes .confirmacao-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .confirmacao-detalhes .confirmacao-info ul li {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            padding: 4px 0;
            padding-left: 20px;
            position: relative;
        }

        .confirmacao-detalhes .confirmacao-info ul li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #FF6B6B;
            font-weight: bold;
        }

        /* ===== ANIMAÇÕES ===== */
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

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 768px) {
            .exclusao-card {
                padding: var(--space-md);
            }

            .exclusao-aviso {
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: var(--space-md);
            }

            .exclusao-aviso .aviso-icon {
                font-size: 2rem;
            }

            .exclusao-admin-summary .admin-card {
                flex-direction: column;
                text-align: center;
                padding: var(--space-md);
            }

            .exclusao-admin-summary .admin-info p {
                justify-content: center;
            }

            .dados-grid {
                grid-template-columns: 1fr;
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

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .confirmacao-checkbox label {
                font-size: var(--text-sm);
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .exclusao-card {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .exclusao-aviso .aviso-icon {
                font-size: 1.5rem;
            }

            .exclusao-aviso .aviso-conteudo h2 {
                font-size: var(--text-h4);
            }

            .exclusao-admin-summary .admin-avatar img {
                width: 56px;
                height: 56px;
            }

            .exclusao-admin-summary .admin-info h3 {
                font-size: var(--text-h4);
            }

            .form-section h3 {
                font-size: var(--text-sm);
            }

            .form-control {
                font-size: var(--text-sm);
                padding: 8px 12px;
            }

            .confirmacao-detalhes .confirmacao-icon {
                font-size: 3rem;
            }

            .confirmacao-detalhes h4 {
                font-size: var(--text-h4);
            }

            .modal-footer {
                flex-direction: column;
            }

            .modal-footer .btn {
                width: 100%;
                min-width: auto;
            }

            .dado-item {
                flex-wrap: wrap;
                gap: 4px;
            }

            .dado-item .dado-info {
                width: 100%;
                order: 2;
            }

            .dado-item .dado-status {
                order: 3;
            }
        }
    </style>

</body>
</html>