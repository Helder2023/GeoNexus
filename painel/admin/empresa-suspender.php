
<?php
// painel/admin/empresa-suspender.php - Suspender Empresa
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Suspender Empresa';
$pagina_atual = 'empresas';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;




// Dados mockados - Empresa (simulando o ID recebido via GET)
$empresa_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados da Empresa
$empresa_data = [
    'id' => $empresa_id,
    'nome' => 'Construtora ABC',
    'email' => 'contato@construtoraabc.com',
    'telefone' => '+244 923 456 100',
    'nif' => '5001234567',
    'endereco' => 'Rua da Construtora, 123, Luanda',
    'responsavel' => 'Maria Santos',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_registo' => '2026-01-10 09:15:00',
    'plano' => 'Empresarial Pro',
    'funcionarios' => 25,
    'projetos' => 8,
    'avatar' => 'empresa-1.png',
    'segmento' => 'Construção Civil',
    'descricao' => 'Empresa especializada em construção civil e infraestrutura',
    'documento_nif' => 'nif_construtora_abc.pdf',
    'documento_alvara' => 'alvara_construtora_abc.pdf',
    'documento_contrato' => 'contrato_construtora_abc.pdf',
    'ultima_atualizacao' => '2026-02-18 14:20:00',
    'criado_por' => 'Administrador Master',
];

// Estatísticas
$total_projetos_empresa = 8;
$total_funcionarios = 25;

// Motivos de suspensão predefinidos
$motivos_suspensao = [
    'Violação dos termos de uso',
    'Atividade suspeita na conta',
    'Múltiplas reclamações de clientes',
    'Falha na verificação de documentos',
    'Inadimplência',
    'Solicitação da própria empresa',
    'Outro motivo'
];

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admins.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => true],
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
                        <?php if ($item['label'] === 'Empresas'): ?>
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
                        <i class="fas fa-building icon"></i>
                        Suspender Empresa
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="empresas.php">Empresas</a>
                        <span class="separator">/</span>
                        <a href="empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>"><?php echo $empresa_data['nome']; ?></a>
                        <span class="separator">/</span>
                        <span>Suspender</span>
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
                        <a href="empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ===== CONFIRMAÇÃO DE SUSPENSÃO ===== -->
            <div class="suspensao-container animate-fade-up">
                <div class="suspensao-card">
                    <!-- ===== AVISO ===== -->
                    <div class="suspensao-aviso">
                        <div class="aviso-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="aviso-conteudo">
                            <h2>Atenção! Esta ação afetará a empresa</h2>
                            <p>Ao suspender esta empresa, todos os seus colaboradores perderão acesso à plataforma.</p>
                            <p class="aviso-destaque">A suspensão pode ser revertida posteriormente.</p>
                        </div>
                    </div>

                    <!-- ===== INFORMAÇÕES DA EMPRESA ===== -->
                    <div class="suspensao-empresa-info">
                        <div class="empresa-avatar">
                            <img src="../../assets/images/<?php echo $empresa_data['avatar']; ?>" alt="<?php echo $empresa_data['nome']; ?>">
                        </div>
                        <div class="empresa-dados">
                            <h3><?php echo $empresa_data['nome']; ?></h3>
                            <p><i class="fas fa-envelope"></i> <?php echo $empresa_data['email']; ?></p>
                            <p><i class="fas fa-tag"></i> Segmento: <strong><?php echo $empresa_data['segmento']; ?></strong></p>
                            <p><i class="fas fa-phone"></i> <?php echo $empresa_data['telefone']; ?></p>
                            <span class="status-badge status-<?php echo $empresa_data['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $empresa_data['status_label']; ?>
                            </span>
                        </div>
                    </div>

                    <!-- ===== IMPACTOS DA SUSPENSÃO ===== -->
                    <div class="suspensao-impactos">
                        <h3><i class="fas fa-info-circle"></i> Impactos da Suspensão</h3>
                        <div class="impactos-grid">
                            <div class="impacto-item">
                                <span class="impacto-icon"><i class="fas fa-users"></i></span>
                                <span class="impacto-info"><?php echo $total_funcionarios; ?> funcionários afetados</span>
                            </div>
                            <div class="impacto-item">
                                <span class="impacto-icon"><i class="fas fa-project-diagram"></i></span>
                                <span class="impacto-info"><?php echo $total_projetos_empresa; ?> projetos suspensos</span>
                            </div>
                            <div class="impacto-item">
                                <span class="impacto-icon"><i class="fas fa-credit-card"></i></span>
                                <span class="impacto-info">Plano <?php echo $empresa_data['plano']; ?> pausado</span>
                            </div>
                            <div class="impacto-item">
                                <span class="impacto-icon"><i class="fas fa-clock"></i></span>
                                <span class="impacto-info">Acesso bloqueado imediatamente</span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== FORMULÁRIO DE SUSPENSÃO ===== -->
                    <form id="formSuspensao" class="suspensao-form" onsubmit="return false;">
                        <div class="form-section">
                            <h3><i class="fas fa-info-circle"></i> Motivo da Suspensão</h3>
                            <p class="form-hint">Selecione ou descreva o motivo para suspender esta empresa.</p>

                            <div class="form-group">
                                <label class="form-label">Motivo <span class="required">*</span></label>
                                <select class="form-control" id="motivoSelect" onchange="toggleMotivoOutro()">
                                    <option value="">Selecione um motivo...</option>
                                    <?php foreach ($motivos_suspensao as $motivo): ?>
                                        <option value="<?php echo $motivo; ?>"><?php echo $motivo; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group" id="outroMotivoGroup" style="display: none;">
                                <label class="form-label">Descreva o motivo <span class="required">*</span></label>
                                <textarea class="form-control" id="outroMotivo" rows="3" placeholder="Descreva detalhadamente o motivo da suspensão..."></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Observações Adicionais</label>
                                <textarea class="form-control" id="observacoes" rows="3" placeholder="Observações adicionais sobre a suspensão..."></textarea>
                            </div>
                        </div>

                        <!-- ===== PERÍODO DE SUSPENSÃO ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-calendar-alt"></i> Período de Suspensão</h3>
                            <div class="form-group">
                                <label class="form-label">Duração</label>
                                <select class="form-control" id="duracao">
                                    <option value="temporario">Temporária (30 dias)</option>
                                    <option value="indefinido">Indefinida</option>
                                    <option value="permanente">Permanente</option>
                                </select>
                            </div>
                        </div>

                        <!-- ===== CONFIRMAÇÃO ===== -->
                        <div class="form-section confirmacao">
                            <h3><i class="fas fa-check-circle"></i> Confirmar Suspensão</h3>
                            <div class="confirmacao-checkbox">
                                <label>
                                    <input type="checkbox" id="confirmarCheck">
                                    <span>Confirmo que estou ciente que esta ação suspenderá a empresa <strong><?php echo $empresa_data['nome']; ?></strong> e todos os seus colaboradores.</span>
                                </label>
                            </div>
                            <div class="confirmacao-checkbox">
                                <label>
                                    <input type="checkbox" id="notificarCheck">
                                    <span>Enviar notificação por email ao responsável da empresa sobre a suspensão.</span>
                                </label>
                            </div>
                            <div class="confirmacao-checkbox">
                                <label>
                                    <input type="checkbox" id="backupCheck">
                                    <span>Desejo fazer um backup dos dados da empresa antes da suspensão.</span>
                                </label>
                            </div>
                        </div>

                        <!-- ===== BOTÕES ===== -->
                        <div class="form-actions">
                            <a href="empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>" class="btn btn-outline btn-lg">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="button" class="btn btn-warning btn-lg" onclick="confirmarSuspensao()">
                                <i class="fas fa-pause"></i> Suspender Empresa
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
                <h3 class="modal-title" style="color: #F59E0B;">
                    <i class="fas fa-exclamation-triangle"></i> Confirmar Suspensão
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="confirmacao-detalhes">
                    <div class="confirmacao-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Tem certeza que deseja suspender esta empresa?</h4>
                    <p>Esta ação irá suspender a empresa <strong><?php echo $empresa_data['nome']; ?></strong> imediatamente.</p>
                    <div class="confirmacao-alerta">
                        <i class="fas fa-info-circle"></i>
                        <span>A empresa suspensa não poderá aceder à plataforma até ser reativada.</span>
                    </div>
                    <div class="confirmacao-info">
                        <p><strong>Impactos da suspensão:</strong></p>
                        <ul>
                            <li><?php echo $total_funcionarios; ?> funcionários afetados</li>
                            <li><?php echo $total_projetos_empresa; ?> projetos suspensos</li>
                            <li>Plano <?php echo $empresa_data['plano']; ?> pausado</li>
                            <li>Acesso bloqueado imediatamente</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-warning" onclick="executarSuspensao()">
                    <i class="fas fa-pause"></i> Confirmar Suspensão
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
        // FUNÇÕES DA SUSPENSÃO
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

        function confirmarSuspensao() {
            const motivo = document.getElementById('motivoSelect').value;
            const outroMotivo = document.getElementById('outroMotivo').value;
            const confirmar = document.getElementById('confirmarCheck').checked;

            // Validação
            if (!motivo) {
                mostrarToast('Selecione um motivo para a suspensão!', 'error');
                return;
            }

            if (motivo === 'Outro motivo' && !outroMotivo.trim()) {
                mostrarToast('Descreva o motivo da suspensão!', 'error');
                return;
            }

            if (!confirmar) {
                mostrarToast('Confirme que está ciente da suspensão!', 'error');
                return;
            }

            // Abrir modal de confirmação
            const modal = document.getElementById('modalConfirmacao');
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        function executarSuspensao() {
            const motivo = document.getElementById('motivoSelect').value;
            const outroMotivo = document.getElementById('outroMotivo').value;
            const observacoes = document.getElementById('observacoes').value;
            const notificar = document.getElementById('notificarCheck').checked;
            const fazerBackup = document.getElementById('backupCheck').checked;
            const duracao = document.getElementById('duracao').value;

            const motivoFinal = motivo === 'Outro motivo' ? outroMotivo : motivo;

            // Fechar modal
            fecharModal('modalConfirmacao');

            // Simular suspensão
            mostrarToast('A suspender empresa...', 'info');

            setTimeout(() => {
                const duracaoText = {
                    'temporario': '30 dias',
                    'indefinido': 'indefinido',
                    'permanente': 'permanente'
                };
                mostrarToast(`Empresa ${'<?php echo $empresa_data['nome']; ?>'} suspensa com sucesso! ⏸️`, 'warning');
                
                if (fazerBackup) {
                    mostrarToast('Backup dos dados criado com sucesso! 💾', 'success');
                }
                
                if (notificar) {
                    mostrarToast('Notificação enviada por email ao responsável da empresa.', 'info');
                }

                mostrarToast(`Período de suspensão: ${duracaoText[duracao] || 'indefinido'}`, 'info');

                // Redirecionar após 2 segundos
                setTimeout(() => {
                    window.location.href = 'empresas.php';
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
        /* SUSPENSÃO EMPRESA - CSS                    */
        /* ========================================== */

        .suspensao-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .suspensao-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .suspensao-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== AVISO ===== */
        .suspensao-aviso {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            background: rgba(245, 158, 11, 0.08);
            border: 1px solid rgba(245, 158, 11, 0.15);
            border-radius: var(--radius-md);
            padding: var(--space-md) var(--space-lg);
            margin-bottom: var(--space-xl);
        }

        .suspensao-aviso .aviso-icon {
            font-size: 2rem;
            color: #F59E0B;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .suspensao-aviso .aviso-conteudo h2 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: #F59E0B;
            margin-bottom: var(--space-xs);
        }

        .suspensao-aviso .aviso-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
        }

        .suspensao-aviso .aviso-destaque {
            font-weight: 600;
            color: #F59E0B;
            margin-top: var(--space-xs) !important;
        }

        /* ===== EMPRESA INFO ===== */
        .suspensao-empresa-info {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            padding: var(--space-lg);
            margin-bottom: var(--space-xl);
            border: 1px solid var(--border-color);
        }

        .suspensao-empresa-info .empresa-avatar img {
            width: 72px;
            height: 72px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 3px solid var(--admin-primary-light);
        }

        .suspensao-empresa-info .empresa-dados h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .suspensao-empresa-info .empresa-dados p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: 2px;
        }

        .suspensao-empresa-info .empresa-dados p i {
            margin-right: 6px;
            color: var(--admin-primary-light);
        }

        .suspensao-empresa-info .empresa-dados p strong {
            color: var(--text-primary);
        }

        /* ===== IMPACTOS ===== */
        .suspensao-impactos {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-xl);
        }

        .suspensao-impactos h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .suspensao-impactos h3 i {
            color: var(--admin-primary-light);
        }

        .impactos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-sm);
        }

        .impacto-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-card);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .impacto-item .impacto-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: rgba(245, 158, 11, 0.08);
            color: #F59E0B;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .impacto-item .impacto-info {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        /* ===== FORMULÁRIO ===== */
        .suspensao-form {
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
        .confirmacao {
            border-color: rgba(245, 158, 11, 0.15);
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

        .btn-warning {
            background: #F59E0B;
            color: white;
            box-shadow: 0 4px 20px rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover {
            background: #D97706;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(245, 158, 11, 0.4);
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
            color: #F59E0B;
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
            color: #F59E0B;
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
            background: rgba(245, 158, 11, 0.06);
            border: 1px solid rgba(245, 158, 11, 0.1);
            border-radius: var(--radius-sm);
            padding: var(--space-sm) var(--space-md);
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin-bottom: var(--space-md);
        }

        .confirmacao-detalhes .confirmacao-alerta i {
            color: #F59E0B;
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
            color: #F59E0B;
            font-weight: bold;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 768px) {
            .suspensao-card {
                padding: var(--space-md);
            }

            .suspensao-aviso {
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: var(--space-md);
            }

            .suspensao-aviso .aviso-icon {
                font-size: 1.5rem;
            }

            .suspensao-empresa-info {
                flex-direction: column;
                text-align: center;
                padding: var(--space-md);
            }

            .suspensao-empresa-info .empresa-dados p {
                justify-content: center;
            }

            .impactos-grid {
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
            .suspensao-card {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .suspensao-aviso .aviso-icon {
                font-size: 1.2rem;
            }

            .suspensao-aviso .aviso-conteudo h2 {
                font-size: var(--text-h4);
            }

            .suspensao-empresa-info .empresa-avatar img {
                width: 56px;
                height: 56px;
            }

            .suspensao-empresa-info .empresa-dados h3 {
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

            .impacto-item {
                flex-wrap: wrap;
                gap: 4px;
            }

            .impacto-item .impacto-info {
                width: 100%;
            }
        }
    </style>

</body>
</html>
