<?php
// painel/admin/empresa-editar.php - Editar Empresa
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Editar Empresa';
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

// Segmentos disponíveis
$segmentos = [
    'Construção Civil',
    'Topografia e Geomensura',
    'Sistemas de Informação Geográfica',
    'Engenharia Civil',
    'Construção e Reformas',
    'Educação e Formação',
    'Mineração',
    'Energia e Telecom',
    'Transportes',
    'Arquitetura e Urbanismo',
    'Agricultura de Precisão',
    'Petróleo e Gás',
    'Drones e Fotogrametria'
];

// Planos disponíveis
$planos = [
    'Básico',
    'Empresarial',
    'Empresarial Pro',
    'Institucional'
];

// Status disponíveis
$status_opcoes = ['ativo', 'pendente', 'inativo'];

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
                        <i class="fas fa-edit icon"></i>
                        Editar Empresa
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="empresas.php">Empresas</a>
                        <span class="separator">/</span>
                        <a href="empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>"><?php echo $empresa_data['nome']; ?></a>
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
                        <a href="empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button class="btn btn-primary" onclick="salvarEdicao()">
                            <i class="fas fa-save"></i> Salvar Alterações
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== FORMULÁRIO DE EDIÇÃO ===== -->
            <div class="edit-container animate-fade-up">
                <div class="edit-card">
                    <div class="edit-header">
                        <h2><i class="fas fa-building"></i> Editar Dados da Empresa</h2>
                        <p class="edit-subtitle">Preencha os campos abaixo para atualizar as informações da empresa.</p>
                    </div>

                    <form id="formEditarEmpresa" class="edit-form" onsubmit="return false;">
                        <!-- ===== INFORMAÇÕES DA EMPRESA ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-info-circle"></i> Informações Gerais</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nome da Empresa <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="nome" value="<?php echo $empresa_data['nome']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" id="email" value="<?php echo $empresa_data['email']; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" value="<?php echo $empresa_data['telefone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">NIF</label>
                                    <input type="text" class="form-control" id="nif" value="<?php echo $empresa_data['nif']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" value="<?php echo $empresa_data['endereco']; ?>">
                            </div>
                        </div>

                        <!-- ===== DADOS DE NEGÓCIO ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-briefcase"></i> Dados de Negócio</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Segmento <span class="required">*</span></label>
                                    <select class="form-control" id="segmento" required>
                                        <?php foreach ($segmentos as $segmento): ?>
                                            <option value="<?php echo $segmento; ?>" <?php echo $empresa_data['segmento'] === $segmento ? 'selected' : ''; ?>>
                                                <?php echo $segmento; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Plano <span class="required">*</span></label>
                                    <select class="form-control" id="plano" required>
                                        <?php foreach ($planos as $plano): ?>
                                            <option value="<?php echo $plano; ?>" <?php echo $empresa_data['plano'] === $plano ? 'selected' : ''; ?>>
                                                <?php echo $plano; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Responsável</label>
                                    <input type="text" class="form-control" id="responsavel" value="<?php echo $empresa_data['responsavel']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nº de Funcionários</label>
                                    <input type="number" class="form-control" id="funcionarios" value="<?php echo $empresa_data['funcionarios']; ?>" min="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Descrição</label>
                                <textarea class="form-control" id="descricao" rows="3"><?php echo $empresa_data['descricao']; ?></textarea>
                            </div>
                        </div>

                        <!-- ===== STATUS ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-toggle-on"></i> Status</h3>
                            <div class="form-group">
                                <label class="form-label">Status da Empresa <span class="required">*</span></label>
                                <select class="form-control" id="status" required>
                                    <?php foreach ($status_opcoes as $status): ?>
                                        <option value="<?php echo $status; ?>" <?php echo $empresa_data['status'] === $status ? 'selected' : ''; ?>>
                                            <?php echo ucfirst($status); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="status-hint">
                                <i class="fas fa-info-circle"></i>
                                <span>Alterar o status para <strong>"Pendente"</strong> requer validação posterior.</span>
                            </div>
                        </div>

                        <!-- ===== DOCUMENTOS ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-file-alt"></i> Documentos</h3>
                            <div class="document-upload-area">
                                <div class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <div class="document-info">
                                        <span class="document-name">NIF</span>
                                        <span class="document-file" id="nifDocumento"><?php echo $empresa_data['documento_nif']; ?></span>
                                    </div>
                                    <div class="document-actions">
                                        <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $empresa_data['documento_nif']; ?>')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary" onclick="substituirDocumento('nif')">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <div class="document-info">
                                        <span class="document-name">Alvará</span>
                                        <span class="document-file" id="alvaraDocumento"><?php echo $empresa_data['documento_alvara']; ?></span>
                                    </div>
                                    <div class="document-actions">
                                        <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $empresa_data['documento_alvara']; ?>')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary" onclick="substituirDocumento('alvara')">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                    <div class="document-info">
                                        <span class="document-name">Contrato</span>
                                        <span class="document-file" id="contratoDocumento"><?php echo $empresa_data['documento_contrato']; ?></span>
                                    </div>
                                    <div class="document-actions">
                                        <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $empresa_data['documento_contrato']; ?>')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary" onclick="substituirDocumento('contrato')">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ===== INFORMAÇÕES ADICIONAIS ===== -->
                        <div class="form-section">
                            <h3><i class="fas fa-clock"></i> Informações Adicionais</h3>
                            <div class="form-group">
                                <label class="form-label">Data de Registo</label>
                                <input type="text" class="form-control" value="<?php echo date('d/m/Y H:i', strtotime($empresa_data['data_registo'])); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Última Atualização</label>
                                <input type="text" class="form-control" value="<?php echo date('d/m/Y H:i', strtotime($empresa_data['ultima_atualizacao'])); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Criado por</label>
                                <input type="text" class="form-control" value="<?php echo $empresa_data['criado_por']; ?>" disabled>
                            </div>
                        </div>

                        <!-- ===== BOTÕES ===== -->
                        <div class="form-actions">
                            <a href="empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>" class="btn btn-outline btn-lg">
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

        function substituirDocumento(tipo) {
            const nomes = {
                'nif': 'NIF',
                'alvara': 'Alvará',
                'contrato': 'Contrato'
            };
            mostrarToast(`Selecione o novo arquivo para ${nomes[tipo]} (simulação)`, 'info');
            // Simular upload
            setTimeout(() => {
                const novoNome = `${tipo}_${Date.now()}.pdf`;
                document.getElementById(`${tipo}Documento`).textContent = novoNome;
                mostrarToast(`Documento ${nomes[tipo]} atualizado com sucesso!`, 'success');
            }, 1500);
        }

        // ==========================================
        // SALVAR EDIÇÃO
        // ==========================================

        function salvarEdicao() {
            // Validar campos obrigatórios
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const segmento = document.getElementById('segmento').value;
            const plano = document.getElementById('plano').value;
            const status = document.getElementById('status').value;

            if (!nome || !email || !segmento || !plano || !status) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            // Validar email
            if (!email.includes('@') || !email.includes('.')) {
                mostrarToast('Email inválido!', 'error');
                return;
            }

            // Simular salvamento
            mostrarToast('A salvar alterações...', 'info');

            setTimeout(() => {
                mostrarToast('Alterações salvas com sucesso! ✅', 'success');

                // Redirecionar para página de detalhes após 2 segundos
                setTimeout(() => {
                    window.location.href = 'empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>';
                }, 1500);
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
        /* EDIÇÃO DA EMPRESA - CSS                    */
        /* ========================================== */

        .edit-container {
            max-width: 900px;
            margin: 0 auto;
        }

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

        .form-control:disabled {
            opacity: 0.6;
            cursor: not-allowed;
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

        /* ===== STATUS HINT ===== */
        .status-hint {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: rgba(59, 130, 246, 0.06);
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: var(--radius-sm);
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin-top: var(--space-sm);
        }

        .status-hint i {
            color: var(--admin-primary-light);
        }

        .status-hint strong {
            color: var(--text-primary);
        }

        /* ===== DOCUMENTOS ===== */
        .document-upload-area {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .document-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-card);
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

        /* ===== BOTÕES ===== */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .form-actions .btn {
            min-width: 160px;
            justify-content: center;
        }

        .btn-lg {
            padding: 0.8rem 2rem;
            font-size: var(--text-body);
        }

        /* ===== MODAL DOCUMENTO ===== */
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

        /* ===== PREVIEW DOCUMENTO ===== */
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

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

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

            .document-item {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .document-item .document-actions {
                justify-content: center;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
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

            .modal-header {
                padding: 14px 18px;
            }

            .modal-header .modal-title {
                font-size: var(--text-sm);
            }

            .modal-body {
                padding: 18px;
            }

            .documento-preview .documento-icon-preview {
                font-size: 3rem;
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