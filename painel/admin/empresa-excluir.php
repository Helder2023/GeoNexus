<?php
// painel/admin/empresa-excluir.php
// Página: Excluir Empresa
// Perfil: Super Admin
include "../../includes/admin/notificacoes-admin-count.php";
// COMPATÍVEL COM DARK/LIGHT MODE

$titulo_pagina = 'Excluir Empresa';
$pagina_atual = 'empresas';

// Dados mockados - Simulando empresa com ID
$empresa_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$empresa_data = [
    'id' => $empresa_id,
    'nome' => 'Engenharia & Topografia SP, Lda',
    'nome_fantasia' => 'EngTop SP',
    'email' => 'contato@engtopsp.com',
    'telefone' => '+244 923 456 789',
    'nif' => '5412345678',
    'status' => 'ativo',
    'plano' => 'Enterprise',
    'data_registo' => '2025-06-15',
    'responsavel_nome' => 'Carlos Mendes',
    'responsavel_email' => 'carlos@engtopsp.com',
    'funcionarios' => 45,
    'projetos_ativos' => 8,
    'projetos_total' => 24,
    'logo' => 'logo_engtop.png',
    'morada' => 'Rua das Acácias, 123, Luanda, Angola',
];

// Dados mockados - Projetos da empresa
$projetos_relacionados = [
    ['id' => 1, 'nome' => 'Levantamento Topográfico - Luanda Sul', 'status' => 'Em andamento', 'data' => '2026-01-15'],
    ['id' => 2, 'nome' => 'Projeto GIS - Gestão de Infraestrutura', 'status' => 'Concluído', 'data' => '2025-12-10'],
    ['id' => 3, 'nome' => 'Estudo de Impacto Ambiental', 'status' => 'Pendente', 'data' => '2026-02-01'],
    ['id' => 4, 'nome' => 'Modelagem 3D - Centro de Luanda', 'status' => 'Em andamento', 'data' => '2026-01-20'],
    ['id' => 5, 'nome' => 'Planeamento Urbano - Kilamba', 'status' => 'Concluído', 'data' => '2025-11-05'],
];

// Dados mockados para dependências
$dependencias = [
    'usuarios' => 12,
    'projetos' => 24,
    'faturas' => 36,
    'pagamentos' => 48,
    'documentos' => 15,
    'contratos' => 6,
];

    
$total_projetos = 189;
$total_usuarios = 12;
$pendentes_validacao = 4;

// Função para gerar avatar fallback
function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FF6B6B&color=fff&size=80';
}

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => true],
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

        <!-- Overlay -->
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
                        <i class="fas fa-trash-alt icon" style="color: #FF6B6B;"></i>
                        Excluir Empresa
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="empresas.php">Empresas</a>
                        <span class="separator">/</span>
                        <span style="color: #FF6B6B;">Excluir</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>



                    <div class="header-actions">
                        <a href="empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ===== CONTEÚDO ===== -->
            <div class="delete-empresa-container">

                <!-- ===== ALERTA DE PERIGO ===== -->
                <div class="alert alert-danger animate-fade-up">
                    <div class="alert-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alert-content">
                        <h4>Atenção! Esta ação é irreversível</h4>
                        <p>A exclusão da empresa removerá permanentemente todos os dados associados, incluindo utilizadores, projetos, faturas e documentos.</p>
                    </div>
                </div>

                <!-- ===== CARD DE CONFIRMAÇÃO ===== -->
                <div class="confirm-card animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="confirm-header">
                        <div class="company-avatar">
                            <img src="../../assets/images/logos/<?php echo $empresa_data['logo']; ?>" 
                                 alt="Logo da Empresa" 
                                 onerror="this.src='<?php echo getAvatarUrl($empresa_data['nome_fantasia']); ?>'">
                        </div>
                        <div class="company-info">
                            <h2><?php echo htmlspecialchars($empresa_data['nome']); ?></h2>
                            <p class="company-detail">
                                <i class="fas fa-building"></i> <?php echo htmlspecialchars($empresa_data['nome_fantasia']); ?>
                            </p>
                            <p class="company-detail">
                                <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($empresa_data['email']); ?>
                            </p>
                            <p class="company-detail">
                                <i class="fas fa-phone"></i> <?php echo htmlspecialchars($empresa_data['telefone']); ?>
                            </p>
                            <p class="company-detail">
                                <i class="fas fa-id-card"></i> NIF: <?php echo htmlspecialchars($empresa_data['nif']); ?>
                            </p>
                            <div class="company-badges">
                                <span class="badge badge-status <?php echo strtolower($empresa_data['status']); ?>">
                                    <i class="fas fa-circle"></i> <?php echo ucfirst($empresa_data['status']); ?>
                                </span>
                                <span class="badge badge-plano <?php echo strtolower($empresa_data['plano']); ?>">
                                    <i class="fas fa-crown"></i> <?php echo $empresa_data['plano']; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ESTATÍSTICAS ===== -->
                    <div class="company-stats">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['usuarios']; ?></span>
                            <span class="stat-label">Utilizadores</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['projetos']; ?></span>
                            <span class="stat-label">Projetos</span>
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
                            <span class="stat-value"><?php echo $dependencias['documentos']; ?></span>
                            <span class="stat-label">Documentos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $dependencias['contratos']; ?></span>
                            <span class="stat-label">Contratos</span>
                        </div>
                    </div>
                </div>

                <!-- ===== LISTA DE PROJETOS RELACIONADOS ===== -->
                <div class="related-projects animate-fade-up" style="animation-delay: 0.2s;">
                    <h3><i class="fas fa-project-diagram"></i> Projetos Relacionados</h3>
                    <p class="text-muted">Estes projetos serão permanentemente removidos com a empresa</p>
                    <div class="projects-list">
                        <?php foreach ($projetos_relacionados as $projeto): ?>
                            <div class="project-item">
                                <div class="project-info">
                                    <span class="project-name"><?php echo htmlspecialchars($projeto['nome']); ?></span>
                                    <span class="project-date">
                                        <i class="fas fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($projeto['data'])); ?>
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
                            <strong>Para confirmar a exclusão, digite o nome da empresa abaixo:</strong>
                            <br>
                            <span class="text-muted">Digite <strong>"<?php echo htmlspecialchars($empresa_data['nome']); ?>"</strong> para confirmar</span>
                        </p>
                    </div>

                    <form id="formExcluirEmpresa" onsubmit="return confirmarExclusao(event)">
                        <div class="form-group">
                            <label for="confirmNome">Confirmar nome da empresa <span class="required">*</span></label>
                            <input type="text" id="confirmNome" placeholder="Digite o nome exato da empresa" class="input-danger" required>
                            <div class="form-help" id="confirmHelp">
                                <i class="fas fa-info-circle"></i> O nome deve corresponder exatamente a <strong>"<?php echo htmlspecialchars($empresa_data['nome']); ?>"</strong>
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
                            <a href="empresa-detalhe.php?id=<?php echo $empresa_data['id']; ?>" class="btn btn-outline btn-lg">
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
                    A empresa <strong><?php echo htmlspecialchars($empresa_data['nome']); ?></strong> 
                    e todos os seus dados serão permanentemente excluídos.
                </p>
                
                <div class="confirm-stats">
                    <div class="confirm-stat-item">
                        <i class="fas fa-database"></i>
                        <span><strong><?php echo array_sum($dependencias); ?></strong> registos serão removidos</span>
                    </div>
                    <div class="confirm-stat-details">
                        <?php foreach ($dependencias as $tipo => $quantidade): ?>
                            <span class="stat-chip">
                                <?php echo $quantidade; ?> <?php echo ucfirst($tipo); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="modal-actions">
                    <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button class="btn btn-danger" id="btnConfirmarExclusao" onclick="excluirEmpresa()">
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
        // TOGGLE SIDEBAR
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
        // THEME
        // ==========================================
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const btnTheme = document.getElementById('btnTheme');
            if (btnTheme) {
                btnTheme.addEventListener('click', function(e) {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);
                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ==========================================
        // NOTIFICAÇÕES
        // ==========================================
        const mockNotificacoes = [
            { id: 1, icon: 'fa-user-plus', icon_class: 'aurora', mensagem: '<strong>João Silva</strong> criou uma nova conta', tempo: 'há 5 minutos', lida: false },
            { id: 2, icon: 'fa-check-circle', icon_class: 'green', mensagem: '<strong>Empresa ABC</strong> foi validada', tempo: 'há 23 minutos', lida: false },
            { id: 3, icon: 'fa-credit-card', icon_class: 'geo', mensagem: '<strong>Pagamento</strong> de Kz 25.000 confirmado', tempo: 'há 1 hora', lida: false },
            { id: 4, icon: 'fa-exclamation-triangle', icon_class: 'red', mensagem: '<strong>Ticket #124</strong> foi aberto', tempo: 'há 2 horas', lida: false },
        ];

        document.addEventListener('DOMContentLoaded', function() {
            const btnNotif = document.getElementById('btnNotificacoes');
            const dropdown = document.getElementById('notificacoesDropdown');

            if (btnNotif && dropdown) {
                btnNotif.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                    if (dropdown.classList.contains('active')) carregarNotificacoes();
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

            let html = '';
            mockNotificacoes.forEach(n => {
                html += `
                    <div class="notificacao-item ${n.lida ? 'lida' : 'nao-lida'}">
                        <div class="notif-icon ${n.icon_class}">
                            <i class="fas ${n.icon}"></i>
                        </div>
                        <div class="notif-conteudo">
                            <p>${n.mensagem}</p>
                            <span class="notif-tempo">${n.tempo}</span>
                        </div>
                        ${!n.lida ? '<span class="notif-dot"></span>' : ''}
                    </div>
                `;
            });

            if (mockNotificacoes.length === 0) {
                html = `
                    <div class="notificacao-vazia">
                        <i class="fas fa-bell-slash"></i>
                        <p>Nenhuma notificação</p>
                    </div>
                `;
            }

            list.innerHTML = html;
        }

        function marcarTodasLidas() {
            mockNotificacoes.forEach(n => n.lida = true);
            document.getElementById('notifBadge').style.display = 'none';
            document.getElementById('bottomNotifBadge').style.display = 'none';
            carregarNotificacoes();
            mostrarToast('Todas as notificações foram marcadas como lidas', 'success');
            closeNotifications();
        }

        function closeNotifications() {
            document.getElementById('notificacoesDropdown')?.classList.remove('active');
        }

        // ==========================================
        // PERFIL DROPDOWN
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
        // TOAST
        // ==========================================
        function mostrarToast(mensagem, tipo = 'success') {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const icons = { success: 'fa-check-circle', error: 'fa-exclamation-circle', warning: 'fa-exclamation-triangle', info: 'fa-info-circle' };
            const colors = { success: '#00FFA3', error: '#FF6B6B', warning: '#FFD93D', info: '#00D2FF' };

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
        const nomeEmpresa = '<?php echo addslashes($empresa_data['nome']); ?>';
        const confirmInput = document.getElementById('confirmNome');
        const confirmCheck = document.getElementById('confirmCheck');
        const btnExcluir = document.getElementById('btnExcluir');

        function validarFormulario() {
            const nomeCorreto = confirmInput.value.trim() === nomeEmpresa;
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
                        O nome não corresponde. Digite exatamente: <strong>"${nomeEmpresa}"</strong>
                    `;
                } else {
                    document.getElementById('confirmHelp').innerHTML = `
                        <i class="fas fa-info-circle"></i> 
                        O nome deve corresponder exatamente a <strong>"${nomeEmpresa}"</strong>
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

            const nomeCorreto = confirmInput.value.trim() === nomeEmpresa;
            const checkMarcado = confirmCheck.checked;

            if (!nomeCorreto) {
                mostrarToast('O nome da empresa não corresponde. Tente novamente.', 'error');
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
        // EXCLUIR EMPRESA
        // ==========================================
        function excluirEmpresa() {
            // Fechar modal
            fecharModal('modalConfirmacao');

            // Mostrar loading
            const btn = document.getElementById('btnConfirmarExclusao');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A excluir...';

            // Simular exclusão
            setTimeout(() => {
                // Mostrar toast de sucesso
                mostrarToast('Empresa excluída com sucesso!', 'success');

                // Simular redirecionamento
                setTimeout(() => {
                    window.location.href = 'empresas.php';
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
    /* ESTILOS DA PÁGINA DE EXCLUSÃO              */
    /* USANDO VARIÁVEIS DO BASE.CSS              */
    /* ========================================== */

    .delete-empresa-container {
        display: flex;
        flex-direction: column;
        gap: var(--space-lg);
        max-width: 900px;
        margin: 0 auto;
        padding: 0 var(--space-md) 80px var(--space-md);
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

    .company-avatar {
        flex-shrink: 0;
    }

    .company-avatar img {
        width: 80px;
        height: 80px;
        border-radius: var(--radius-md);
        object-fit: cover;
        border: 3px solid var(--border-color);
    }

    .company-info {
        flex: 1;
        min-width: 200px;
    }

    .company-info h2 {
        font-family: var(--font-display);
        font-size: var(--text-h2);
        color: var(--text-primary);
        margin-bottom: var(--space-xs);
    }

    .company-info .company-detail {
        font-size: var(--text-sm);
        color: var(--text-secondary);
        margin: 2px 0;
    }

    .company-info .company-detail i {
        width: 18px;
        color: var(--text-muted);
    }

    .company-badges {
        display: flex;
        gap: var(--space-sm);
        margin-top: var(--space-sm);
        flex-wrap: wrap;
    }

    /* ===== BADGES ===== */
    .badge-status.ativo {
        background: rgba(0, 255, 163, 0.15);
        color: var(--color-future-green);
    }

    .badge-status.pendente {
        background: rgba(255, 217, 61, 0.15);
        color: #FFD93D;
    }

    .badge-status.suspenso {
        background: rgba(255, 107, 107, 0.15);
        color: #FF6B6B;
    }

    .badge-status.inativo {
        background: rgba(107, 122, 143, 0.15);
        color: #6B7A8F;
    }

    .badge-status.em-andamento {
        background: rgba(0, 210, 255, 0.15);
        color: var(--color-turquoise);
    }

    .badge-status.concluído {
        background: rgba(0, 255, 163, 0.15);
        color: var(--color-future-green);
    }

    .badge-plano.básico {
        background: rgba(107, 122, 143, 0.15);
        color: #6B7A8F;
    }

    .badge-plano.pro {
        background: rgba(0, 210, 255, 0.15);
        color: var(--color-turquoise);
    }

    .badge-plano.enterprise {
        background: rgba(108, 43, 217, 0.15);
        color: var(--color-aurora);
    }

    /* ===== STATS ===== */
    .company-stats {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: var(--space-md);
        margin-top: var(--space-lg);
        padding-top: var(--space-lg);
        border-top: 1px solid var(--border-color);
    }

    .company-stats .stat-item {
        text-align: center;
    }

    .company-stats .stat-value {
        display: block;
        font-family: var(--font-display);
        font-size: var(--text-h3);
        font-weight: 700;
        color: var(--text-primary);
    }

    .company-stats .stat-label {
        font-size: var(--text-xs);
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

    /* ===== FORMULÁRIO DE CONFIRMAÇÃO ===== */
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
        border-color: var(--color-aurora);
        box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.15);
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
        accent-color: var(--color-aurora);
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
        border-color: var(--color-aurora);
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

    /* ===== LIGHT MODE - INPUT ===== */
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
        border-color: var(--color-aurora);
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

    /* ===== BOTÕES ===== */
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
        background: rgba(0, 0, 0, 0.7);
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
        .company-stats {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .confirm-header {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .company-avatar img {
            width: 100px;
            height: 100px;
        }

        .company-badges {
            justify-content: center;
        }

        .company-stats {
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-sm);
        }

        .company-stats .stat-value {
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

        .delete-empresa-container {
            padding: 0 var(--space-sm) 70px var(--space-sm);
        }

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
        .delete-empresa-container {
            gap: var(--space-md);
            padding: 0 var(--space-xs) 60px var(--space-xs);
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

        .company-stats {
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

        .company-info h2 {
            font-size: var(--text-h3);
        }

        .company-avatar img {
            width: 80px;
            height: 80px;
        }
    }

    /* ===== ANIMAÇÕES ===== */
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
</style>

</body>
</html>