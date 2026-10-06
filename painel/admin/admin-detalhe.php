<?php
// painel/admin/admin-detalhe.php - Detalhes do Administrador
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Detalhes do Administrador';
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
    'historico_acoes' => [
        ['acao' => 'Criação de conta', 'data' => '2026-01-15 10:30:00', 'ip' => '192.168.1.100'],
        ['acao' => 'Validação de conta', 'data' => '2026-01-15 11:00:00', 'ip' => '192.168.1.100'],
        ['acao' => 'Primeiro acesso', 'data' => '2026-01-16 08:00:00', 'ip' => '192.168.1.101'],
        ['acao' => 'Atualização de perfil', 'data' => '2026-02-10 09:30:00', 'ip' => '192.168.1.105'],
        ['acao' => 'Alteração de permissões', 'data' => '2026-02-15 14:00:00', 'ip' => '192.168.1.110'],
    ]
];

// Estatísticas do administrador
$total_projetos_admin = 12;
$total_clientes_admin = 8;
$total_acoes = count($admin_data['historico_acoes']);

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
                        <i class="fas fa-user-circle icon"></i>
                        Detalhes do Administrador
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="admins.php">Administradores</a>
                        <span class="separator">/</span>
                        <span><?php echo $admin_data['nome']; ?></span>
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
                        <a href="admins.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <a href="admin-editar.php?id=<?php echo $admin_data['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ===== PERFIL DO ADMINISTRADOR ===== -->
            <div class="profile-container">
                <!-- ===== CARD PRINCIPAL ===== -->
                <div class="profile-card animate-fade-up">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <img src="../../assets/images/<?php echo $admin_data['avatar']; ?>" alt="<?php echo $admin_data['nome']; ?>">
                            <span class="status-badge status-<?php echo $admin_data['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $admin_data['status_label']; ?>
                            </span>
                        </div>
                        <div class="profile-info">
                            <h2><?php echo $admin_data['nome']; ?></h2>
                            <p class="profile-email"><i class="fas fa-envelope"></i> <?php echo $admin_data['email']; ?></p>
                            <div class="profile-badges">
                                <span class="badge badge-primary">
                                    <i class="fas fa-crown"></i> <?php echo $admin_data['nivel']; ?>
                                </span>
                                <span class="badge badge-info">
                                    <i class="fas fa-user-shield"></i> <?php echo $admin_data['permissoes']; ?>
                                </span>
                                <span class="badge badge-<?php echo $admin_data['status'] === 'ativo' ? 'success' : ($admin_data['status'] === 'pendente' ? 'warning' : 'danger'); ?>">
                                    <i class="fas fa-circle"></i> <?php echo $admin_data['status_label']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="profile-actions">
                            <button class="btn btn-sm btn-outline" onclick="window.print()">
                                <i class="fas fa-print"></i>
                            </button>
                            <button class="btn btn-sm btn-outline" onclick="exportarPerfil()">
                                <i class="fas fa-file-pdf"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ===== STATS DO PERFIL ===== -->
                    <div class="profile-stats">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $total_projetos_admin; ?></span>
                            <span class="stat-label">Projetos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $total_clientes_admin; ?></span>
                            <span class="stat-label">Clientes</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $total_acoes; ?></span>
                            <span class="stat-label">Ações</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo date('d/m/Y', strtotime($admin_data['data_registo'])); ?></span>
                            <span class="stat-label">Registo</span>
                        </div>
                    </div>
                </div>

                <!-- ===== DETALHES DO PERFIL ===== -->
                <div class="profile-details-grid">
                    <!-- ===== INFORMAÇÕES PESSOAIS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.1s;">
                        <h3><i class="fas fa-user"></i> Informações Pessoais</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Nome Completo</span>
                                <span class="detail-value"><?php echo $admin_data['nome']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Email</span>
                                <span class="detail-value"><?php echo $admin_data['email']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Telefone</span>
                                <span class="detail-value"><?php echo $admin_data['telefone']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Data de Nascimento</span>
                                <span class="detail-value"><?php echo date('d/m/Y', strtotime($admin_data['data_nascimento'])); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Género</span>
                                <span class="detail-value"><?php echo $admin_data['genero']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Morada</span>
                                <span class="detail-value"><?php echo $admin_data['morada']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">BI / Identificação</span>
                                <span class="detail-value"><?php echo $admin_data['bi']; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DOCUMENTOS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.2s;">
                        <h3><i class="fas fa-file-alt"></i> Documentos</h3>
                        <div class="document-list">
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-id-card"></i>
                                </div>
                                <div class="document-info">
                                    <span class="document-name">Bilhete de Identidade</span>
                                    <span class="document-file"><?php echo $admin_data['documento_bi']; ?></span>
                                </div>
                                <div class="document-actions">
                                    <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $admin_data['documento_bi']; ?>')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo $admin_data['documento_bi']; ?>')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <div class="document-info">
                                    <span class="document-name">Certidão</span>
                                    <span class="document-file"><?php echo $admin_data['documento_certidao']; ?></span>
                                </div>
                                <div class="document-actions">
                                    <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $admin_data['documento_certidao']; ?>')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo $admin_data['documento_certidao']; ?>')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                                <div class="document-info">
                                    <span class="document-name">Foto</span>
                                    <span class="document-file"><?php echo $admin_data['documento_foto']; ?></span>
                                </div>
                                <div class="document-actions">
                                    <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $admin_data['documento_foto']; ?>')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo $admin_data['documento_foto']; ?>')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="document-upload">
                            <button class="btn btn-outline btn-sm" onclick="uploadDocumento()">
                                <i class="fas fa-upload"></i> Adicionar Documento
                            </button>
                        </div>
                    </div>

                    <!-- ===== PERMISSÕES E ACESSO ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.3s;">
                        <h3><i class="fas fa-lock"></i> Permissões e Acesso</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Nível</span>
                                <span class="detail-value">
                                    <span class="badge badge-primary"><?php echo $admin_data['nivel']; ?></span>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Permissões</span>
                                <span class="detail-value"><?php echo $admin_data['permissoes']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Último Acesso</span>
                                <span class="detail-value"><?php echo date('d/m/Y H:i', strtotime($admin_data['ultimo_acesso'])); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Data de Registo</span>
                                <span class="detail-value"><?php echo date('d/m/Y H:i', strtotime($admin_data['data_registo'])); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Última Atualização</span>
                                <span class="detail-value"><?php echo date('d/m/Y H:i', strtotime($admin_data['ultima_atualizacao'])); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Criado por</span>
                                <span class="detail-value"><?php echo $admin_data['criado_por']; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== HISTÓRICO DE AÇÕES ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.4s;">
                        <h3><i class="fas fa-history"></i> Histórico de Ações</h3>
                        <div class="historico-list">
                            <?php foreach ($admin_data['historico_acoes'] as $acao): ?>
                                <div class="historico-item">
                                    <div class="historico-icon">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                    <div class="historico-info">
                                        <span class="historico-acao"><?php echo $acao['acao']; ?></span>
                                        <span class="historico-data"><?php echo date('d/m/Y H:i', strtotime($acao['data'])); ?></span>
                                    </div>
                                    <span class="historico-ip">IP: <?php echo $acao['ip']; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- ===== AÇÕES RÁPIDAS ===== -->
                <div class="quick-actions-profile animate-fade-up" style="animation-delay: 0.5s;">
                    <h3><i class="fas fa-bolt"></i> Ações Disponíveis</h3>
                    <div class="actions-grid">
                        <a href="admin-editar.php?id=<?php echo $admin_data['id']; ?>" class="action-item">
                            <i class="fas fa-edit"></i>
                            <span class="label">Editar Perfil</span>
                        </a>
                        <a href="admin-permissoes.php?id=<?php echo $admin_data['id']; ?>" class="action-item">
                            <i class="fas fa-lock"></i>
                            <span class="label">Gerenciar Permissões</span>
                        </a>
                        <?php if ($admin_data['status'] === 'ativo'): ?>
                            <a href="admin-suspender.php?id=<?php echo $admin_data['id']; ?>" class="action-item" onclick="return confirm('Tem certeza que deseja suspender este administrador?')">
                                <i class="fas fa-pause" style="color: #F59E0B;"></i>
                                <span class="label">Suspender</span>
                            </a>
                        <?php elseif ($admin_data['status'] === 'inativo'): ?>
                            <a href="admin-ativar.php?id=<?php echo $admin_data['id']; ?>" class="action-item">
                                <i class="fas fa-play" style="color: #00FFA3;"></i>
                                <span class="label">Ativar</span>
                            </a>
                        <?php endif; ?>
                        <?php if ($admin_data['status'] === 'pendente'): ?>
                            <a href="admin-validar.php?id=<?php echo $admin_data['id']; ?>" class="action-item">
                                <i class="fas fa-check" style="color: #00FFA3;"></i>
                                <span class="label">Validar</span>
                            </a>
                        <?php endif; ?>
                        <a href="admin-historico.php?id=<?php echo $admin_data['id']; ?>" class="action-item">
                            <i class="fas fa-history"></i>
                            <span class="label">Ver Histórico Completo</span>
                        </a>
                        <a href="admin-excluir.php?id=<?php echo $admin_data['id']; ?>" class="action-item" onclick="return confirm('Tem certeza que deseja excluir permanentemente este administrador? Esta ação não pode ser desfeita!')">
                            <i class="fas fa-trash" style="color: #FF6B6B;"></i>
                            <span class="label" style="color: #FF6B6B;">Excluir</span>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL VISUALIZAR DOCUMENTO                 -->
    <!-- ========================================== -->
    <div class="modal" id="modalDocumento">
        <div class="modal-overlay" onclick="fecharModal('modalDocumento')"></div>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-file-pdf"></i> Visualizar Documento
                </h3>
                <button class="modal-close" onclick="fecharModal('modalDocumento')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="documento-preview">
                    <div class="documento-icon-preview">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h4 id="documentoNome">documento.pdf</h4>
                    <p class="documento-info">Clique no botão abaixo para visualizar ou baixar o documento.</p>
                    <div class="documento-actions-preview">
                        <button class="btn btn-primary" onclick="baixarDocumentoAtual()">
                            <i class="fas fa-download"></i> Baixar
                        </button>
                        <button class="btn btn-outline" onclick="fecharModal('modalDocumento')">
                            <i class="fas fa-times"></i> Fechar
                        </button>
                    </div>
                </div>
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
        // FUNÇÕES DOS DOCUMENTOS
        // ==========================================

        let documentoAtual = '';

        function verDocumento(documento) {
            documentoAtual = documento;
            document.getElementById('documentoNome').textContent = documento;
            document.getElementById('modalDocumento').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function baixarDocumento(documento) {
            mostrarToast(`A baixar o documento: ${documento}`, 'success');
        }

        function baixarDocumentoAtual() {
            if (documentoAtual) {
                baixarDocumento(documentoAtual);
            }
        }

        function uploadDocumento() {
            mostrarToast('Funcionalidade de upload de documentos (simulação)', 'info');
        }

        function exportarPerfil() {
            mostrarToast('A exportar perfil para PDF...', 'info');
            setTimeout(() => {
                mostrarToast('Perfil exportado com sucesso!', 'success');
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
        /* PERFIL DO ADMINISTRADOR - CSS              */
        /* ========================================== */

        .profile-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ===== CARD PRINCIPAL ===== */
        .profile-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .profile-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: var(--space-xl);
            flex-wrap: wrap;
        }

        .profile-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .profile-avatar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--admin-primary-light);
        }

        .profile-avatar .status-badge {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .profile-info .profile-email {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: var(--space-sm);
        }

        .profile-info .profile-email i {
            margin-right: 6px;
            color: var(--admin-primary-light);
        }

        .profile-badges {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .profile-actions {
            display: flex;
            gap: var(--space-sm);
            align-self: flex-start;
        }

        /* ===== STATS ===== */
        .profile-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .profile-stats .stat-item {
            text-align: center;
        }

        .profile-stats .stat-value {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
        }

        .profile-stats .stat-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== DETAILS GRID ===== */
        .profile-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
        }

        .detail-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .detail-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .detail-card h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .detail-card h3 i {
            color: var(--admin-primary-light);
        }

        /* ===== DETAIL LIST ===== */
        .detail-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-item .detail-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .detail-item .detail-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            text-align: right;
        }

        /* ===== DOCUMENTOS ===== */
        .document-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .document-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .document-item:hover {
            border-color: var(--admin-primary-light);
        }

        .document-item .document-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: rgba(108, 43, 217, 0.08);
            color: var(--admin-primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .document-item .document-info {
            flex: 1;
        }

        .document-item .document-name {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .document-item .document-file {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .document-item .document-actions {
            display: flex;
            gap: var(--space-xs);
        }

        .document-upload {
            margin-top: var(--space-md);
            text-align: center;
        }

        /* ===== HISTÓRICO ===== */
        .historico-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            max-height: 300px;
            overflow-y: auto;
            padding-right: var(--space-sm);
        }

        .historico-list::-webkit-scrollbar {
            width: 4px;
        }

        .historico-list::-webkit-scrollbar-track {
            background: var(--bg-primary);
            border-radius: 3px;
        }

        .historico-list::-webkit-scrollbar-thumb {
            background: var(--admin-primary-light);
            border-radius: 3px;
        }

        .historico-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--admin-primary-light);
        }

        .historico-item .historico-icon {
            color: var(--admin-primary-light);
            font-size: 0.6rem;
        }

        .historico-item .historico-info {
            flex: 1;
        }

        .historico-item .historico-acao {
            display: block;
            font-size: var(--text-sm);
            color: var(--text-primary);
        }

        .historico-item .historico-data {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .historico-item .historico-ip {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-family: var(--font-mono);
        }

        /* ===== QUICK ACTIONS PROFILE ===== */
        .quick-actions-profile {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .quick-actions-profile:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .quick-actions-profile h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .quick-actions-profile h3 i {
            color: var(--admin-primary-light);
        }

        .quick-actions-profile .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: var(--space-md);
        }

        .quick-actions-profile .action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            text-decoration: none;
            color: var(--text-secondary);
            transition: var(--transition-smooth);
        }

        .quick-actions-profile .action-item:hover {
            border-color: var(--admin-primary-light);
            background: rgba(108, 43, 217, 0.04);
            transform: translateY(-2px);
            color: var(--text-primary);
        }

        .quick-actions-profile .action-item i {
            font-size: 1.3rem;
            color: var(--admin-primary-light);
        }

        .quick-actions-profile .action-item .label {
            font-size: var(--text-sm);
            text-align: center;
        }

        /* ========================================== */
        /* MODAL DOCUMENTO                           */
        /* ========================================== */

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
            max-width: 500px;
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

        /* ===== PREVIEW DO DOCUMENTO ===== */
        .documento-preview {
            text-align: center;
            padding: var(--space-xl) var(--space-md);
        }

        .documento-preview .documento-icon-preview {
            font-size: 4rem;
            color: #FF6B6B;
            margin-bottom: var(--space-md);
        }

        .documento-preview h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
            word-break: break-all;
        }

        .documento-preview .documento-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: var(--space-lg);
        }

        .documento-preview .documento-actions-preview {
            display: flex;
            gap: var(--space-sm);
            justify-content: center;
            flex-wrap: wrap;
        }

        .documento-preview .documento-actions-preview .btn {
            min-width: 120px;
            justify-content: center;
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

        @media (max-width: 1024px) {
            .profile-details-grid {
                grid-template-columns: 1fr;
            }

            .profile-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profile-info {
                text-align: center;
            }

            .profile-badges {
                justify-content: center;
            }

            .profile-actions {
                align-self: center;
            }

            .profile-stats {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .profile-stats .stat-value {
                font-size: var(--text-h3);
            }

            .detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
            }

            .detail-item .detail-value {
                text-align: left;
            }

            .document-item {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .document-item .document-actions {
                justify-content: center;
            }

            .historico-item {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-xs);
            }

            .historico-item .historico-ip {
                font-size: var(--text-xs);
                color: var(--text-muted);
            }

            .quick-actions-profile .actions-grid {
                grid-template-columns: 1fr 1fr;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            /* Modal Documento Responsivo */
            .modal-content {
                width: 95%;
                margin: 10px;
                max-height: 95vh;
            }

            .modal-header {
                padding: 14px 18px;
            }

            .modal-header .modal-title {
                font-size: var(--text-sm);
            }

            .modal-body {
                padding: 18px;
            }

            .documento-preview {
                padding: var(--space-lg) var(--space-sm);
            }

            .documento-preview .documento-icon-preview {
                font-size: 3rem;
            }

            .documento-preview h4 {
                font-size: var(--text-h4);
            }

            .documento-preview .documento-info {
                font-size: var(--text-sm);
            }

            .documento-preview .documento-actions-preview {
                flex-direction: column;
                align-items: stretch;
            }

            .documento-preview .documento-actions-preview .btn {
                width: 100%;
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
            .profile-card {
                padding: var(--space-md);
            }

            .profile-avatar img {
                width: 80px;
                height: 80px;
            }

            .profile-stats {
                grid-template-columns: 1fr 1fr;
            }

            .quick-actions-profile .actions-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions-profile {
                padding: var(--space-md);
            }

            .detail-card {
                padding: var(--space-md);
            }

            .documento-preview .documento-icon-preview {
                font-size: 2.5rem;
            }

            .documento-preview h4 {
                font-size: var(--text-sm);
            }

            .documento-preview .documento-info {
                font-size: var(--text-xs);
            }

            /* Modal Documento Mobile */
            .modal-content {
                width: 98%;
                margin: 5px;
                border-radius: var(--radius-md);
            }

            .modal-header {
                padding: 10px 14px;
            }

            .modal-header .modal-title {
                font-size: var(--text-sm);
            }

            .modal-close {
                font-size: 1.1rem;
            }

            .modal-body {
                padding: 14px;
            }

            .documento-preview {
                padding: var(--space-md) var(--space-xs);
            }

            .documento-preview .documento-icon-preview {
                font-size: 2.5rem;
            }

            .documento-preview h4 {
                font-size: var(--text-sm);
            }

            .documento-preview .documento-info {
                font-size: var(--text-xs);
            }
        }
    </style>

</body>
</html>