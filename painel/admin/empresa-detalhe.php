
<?php
// painel/admin/empresa-detalhe.php - Detalhes da Empresa
include "../../includes/admin/notificacoes-admin-count.php";

// Configurações da página
$titulo_pagina = 'Detalhes da Empresa';
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
    'historico_acoes' => [
        ['acao' => 'Criação de conta', 'data' => '2026-01-10 09:15:00', 'ip' => '192.168.1.100'],
        ['acao' => 'Validação de conta', 'data' => '2026-01-10 10:00:00', 'ip' => '192.168.1.100'],
        ['acao' => 'Primeiro acesso', 'data' => '2026-01-11 08:00:00', 'ip' => '192.168.1.101'],
        ['acao' => 'Atualização de perfil', 'data' => '2026-02-10 09:30:00', 'ip' => '192.168.1.105'],
        ['acao' => 'Renovação de plano', 'data' => '2026-02-15 14:00:00', 'ip' => '192.168.1.110'],
    ]
];

// Projetos da empresa
$projetos_empresa = [
    ['id' => 1, 'nome' => 'Edifício Comercial Tower', 'status' => 'concluido', 'data_inicio' => '2025-06-01', 'data_fim' => '2026-01-15', 'orcamento' => 2500000],
    ['id' => 2, 'nome' => 'Infraestrutura Urbana Zona Sul', 'status' => 'em_andamento', 'data_inicio' => '2025-09-01', 'data_fim' => null, 'orcamento' => 3800000],
    ['id' => 3, 'nome' => 'Reforma Hospital Central', 'status' => 'em_andamento', 'data_inicio' => '2026-01-15', 'data_fim' => null, 'orcamento' => 1200000],
    ['id' => 4, 'nome' => 'Construção de Escolas', 'status' => 'pendente', 'data_inicio' => '2026-03-01', 'data_fim' => null, 'orcamento' => 800000],
    ['id' => 5, 'nome' => 'Edifício Residencial', 'status' => 'concluido', 'data_inicio' => '2025-03-01', 'data_fim' => '2025-12-20', 'orcamento' => 1500000],
    ['id' => 6, 'nome' => 'Parque Industrial', 'status' => 'em_andamento', 'data_inicio' => '2025-11-01', 'data_fim' => null, 'orcamento' => 4200000],
    ['id' => 7, 'nome' => 'Centro Comercial', 'status' => 'pendente', 'data_inicio' => '2026-04-01', 'data_fim' => null, 'orcamento' => 3000000],
    ['id' => 8, 'nome' => 'Estádio Municipal', 'status' => 'concluido', 'data_inicio' => '2025-01-01', 'data_fim' => '2025-12-10', 'orcamento' => 5000000],
];

// Estatísticas
$total_projetos_empresa = count($projetos_empresa);
$projetos_concluidos = count(array_filter($projetos_empresa, function($p) { return $p['status'] === 'concluido'; }));
$projetos_andamento = count(array_filter($projetos_empresa, function($p) { return $p['status'] === 'em_andamento'; }));
$projetos_pendentes = count(array_filter($projetos_empresa, function($p) { return $p['status'] === 'pendente'; }));

$total_orcamento = array_sum(array_column($projetos_empresa, 'orcamento'));

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
                        Detalhes da Empresa
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="empresas.php">Empresas</a>
                        <span class="separator">/</span>
                        <span><?php echo $empresa_data['nome']; ?></span>
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
                        <a href="empresas.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <a href="empresa-editar.php?id=<?php echo $empresa_data['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <button class="btn btn-outline" onclick="window.print()">
                            <i class="fas fa-print"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== PERFIL DA EMPRESA ===== -->
            <div class="empresa-profile-container">
                <!-- ===== CARD PRINCIPAL ===== -->
                <div class="empresa-profile-card animate-fade-up">
                    <div class="empresa-profile-header">
                        <div class="empresa-profile-avatar">
                            <img src="../../assets/images/<?php echo $empresa_data['avatar']; ?>" alt="<?php echo $empresa_data['nome']; ?>">
                            <span class="status-badge status-<?php echo $empresa_data['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $empresa_data['status_label']; ?>
                            </span>
                        </div>
                        <div class="empresa-profile-info">
                            <h2><?php echo $empresa_data['nome']; ?></h2>
                            <p class="empresa-profile-email"><i class="fas fa-envelope"></i> <?php echo $empresa_data['email']; ?></p>
                            <div class="empresa-profile-badges">
                                <span class="badge badge-info">
                                    <i class="fas fa-tag"></i> <?php echo $empresa_data['segmento']; ?>
                                </span>
                                <span class="badge badge-warning">
                                    <i class="fas fa-crown"></i> <?php echo $empresa_data['plano']; ?>
                                </span>
                                <span class="badge badge-<?php echo $empresa_data['status'] === 'ativo' ? 'success' : ($empresa_data['status'] === 'pendente' ? 'warning' : 'danger'); ?>">
                                    <i class="fas fa-circle"></i> <?php echo $empresa_data['status_label']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="empresa-profile-actions">
                            <button class="btn btn-sm btn-outline" onclick="exportarPerfil()">
                                <i class="fas fa-file-pdf"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ===== STATS DO PERFIL ===== -->
                    <div class="empresa-profile-stats">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $total_projetos_empresa; ?></span>
                            <span class="stat-label">Projetos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $empresa_data['funcionarios']; ?></span>
                            <span class="stat-label">Funcionários</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">Kz <?php echo number_format($total_orcamento / 1000000, 1); ?>M</span>
                            <span class="stat-label">Orçamento Total</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo date('d/m/Y', strtotime($empresa_data['data_registo'])); ?></span>
                            <span class="stat-label">Registo</span>
                        </div>
                    </div>
                </div>

                <!-- ===== DETALHES DA EMPRESA ===== -->
                <div class="empresa-details-grid">
                    <!-- ===== INFORMAÇÕES DA EMPRESA ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.1s;">
                        <h3><i class="fas fa-info-circle"></i> Informações da Empresa</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Nome</span>
                                <span class="detail-value"><?php echo $empresa_data['nome']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Email</span>
                                <span class="detail-value"><?php echo $empresa_data['email']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Telefone</span>
                                <span class="detail-value"><?php echo $empresa_data['telefone']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">NIF</span>
                                <span class="detail-value"><?php echo $empresa_data['nif']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Endereço</span>
                                <span class="detail-value"><?php echo $empresa_data['endereco']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Responsável</span>
                                <span class="detail-value"><?php echo $empresa_data['responsavel']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Segmento</span>
                                <span class="detail-value"><?php echo $empresa_data['segmento']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Plano</span>
                                <span class="detail-value"><?php echo $empresa_data['plano']; ?></span>
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
                                    <span class="document-name">NIF</span>
                                    <span class="document-file"><?php echo $empresa_data['documento_nif']; ?></span>
                                </div>
                                <div class="document-actions">
                                    <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $empresa_data['documento_nif']; ?>')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo $empresa_data['documento_nif']; ?>')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <div class="document-info">
                                    <span class="document-name">Alvará</span>
                                    <span class="document-file"><?php echo $empresa_data['documento_alvara']; ?></span>
                                </div>
                                <div class="document-actions">
                                    <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $empresa_data['documento_alvara']; ?>')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo $empresa_data['documento_alvara']; ?>')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-file-signature"></i>
                                </div>
                                <div class="document-info">
                                    <span class="document-name">Contrato</span>
                                    <span class="document-file"><?php echo $empresa_data['documento_contrato']; ?></span>
                                </div>
                                <div class="document-actions">
                                    <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $empresa_data['documento_contrato']; ?>')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo $empresa_data['documento_contrato']; ?>')">
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

                    <!-- ===== PROJETOS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.3s;">
                        <h3><i class="fas fa-project-diagram"></i> Projetos</h3>
                        <div class="projetos-stats">
                            <div class="projeto-stat">
                                <span class="stat-value"><?php echo $projetos_concluidos; ?></span>
                                <span class="stat-label">Concluídos</span>
                            </div>
                            <div class="projeto-stat">
                                <span class="stat-value"><?php echo $projetos_andamento; ?></span>
                                <span class="stat-label">Em Andamento</span>
                            </div>
                            <div class="projeto-stat">
                                <span class="stat-value"><?php echo $projetos_pendentes; ?></span>
                                <span class="stat-label">Pendentes</span>
                            </div>
                        </div>
                        <div class="projetos-list">
                            <?php foreach ($projetos_empresa as $projeto): ?>
                                <div class="projeto-item">
                                    <div class="projeto-info">
                                        <h4><?php echo $projeto['nome']; ?></h4>
                                        <span class="projeto-orcamento">Kz <?php echo number_format($projeto['orcamento'] / 1000000, 1); ?>M</span>
                                    </div>
                                    <div class="projeto-status">
                                        <span class="badge badge-<?php echo $projeto['status'] === 'concluido' ? 'success' : ($projeto['status'] === 'em_andamento' ? 'info' : 'warning'); ?>">
                                            <?php echo $projeto['status'] === 'concluido' ? 'Concluído' : ($projeto['status'] === 'em_andamento' ? 'Em Andamento' : 'Pendente'); ?>
                                        </span>
                                        <span class="projeto-data"><?php echo date('d/m/Y', strtotime($projeto['data_inicio'])); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="projetos-footer">
                            <a href="projetos-empresa.php?id=<?php echo $empresa_data['id']; ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Ver todos os projetos
                            </a>
                        </div>
                    </div>

                    <!-- ===== HISTÓRICO DE AÇÕES ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.4s;">
                        <h3><i class="fas fa-history"></i> Histórico de Ações</h3>
                        <div class="historico-list">
                            <?php foreach ($empresa_data['historico_acoes'] as $acao): ?>
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
                        <a href="empresa-editar.php?id=<?php echo $empresa_data['id']; ?>" class="action-item">
                            <i class="fas fa-edit"></i>
                            <span class="label">Editar Empresa</span>
                        </a>
                        <?php if ($empresa_data['status'] === 'ativo'): ?>
                            <a href="empresa-suspender.php?id=<?php echo $empresa_data['id']; ?>" class="action-item" onclick="return confirm('Tem certeza que deseja suspender esta empresa?')">
                                <i class="fas fa-pause" style="color: #F59E0B;"></i>
                                <span class="label">Suspender</span>
                            </a>
                        <?php elseif ($empresa_data['status'] === 'inativo'): ?>
                            <a href="empresa-ativar.php?id=<?php echo $empresa_data['id']; ?>" class="action-item">
                                <i class="fas fa-play" style="color: #00FFA3;"></i>
                                <span class="label">Ativar</span>
                            </a>
                        <?php endif; ?>
                        <?php if ($empresa_data['status'] === 'pendente'): ?>
                            <a href="empresa-validar.php?id=<?php echo $empresa_data['id']; ?>" class="action-item">
                                <i class="fas fa-check" style="color: #00FFA3;"></i>
                                <span class="label">Validar</span>
                            </a>
                        <?php endif; ?>
                        <a href="empresa-historico.php?id=<?php echo $empresa_data['id']; ?>" class="action-item">
                            <i class="fas fa-history"></i>
                            <span class="label">Ver Histórico Completo</span>
                        </a>
                  
                        <a href="empresa-excluir.php?id=<?php echo $empresa_data['id']; ?>" class="action-item" onclick="return confirm('Tem certeza que deseja excluir permanentemente esta empresa? Esta ação não pode ser desfeita!')">
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
        /* EMPRESA DETALHE - CSS                       */
        /* ========================================== */

        .empresa-profile-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ===== CARD PRINCIPAL ===== */
        .empresa-profile-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .empresa-profile-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .empresa-profile-header {
            display: flex;
            align-items: center;
            gap: var(--space-xl);
            flex-wrap: wrap;
        }

        .empresa-profile-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .empresa-profile-avatar img {
            width: 100px;
            height: 100px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 4px solid var(--admin-primary-light);
        }

        .empresa-profile-avatar .status-badge {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .empresa-profile-info {
            flex: 1;
        }

        .empresa-profile-info h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .empresa-profile-info .empresa-profile-email {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: var(--space-sm);
        }

        .empresa-profile-info .empresa-profile-email i {
            margin-right: 6px;
            color: var(--admin-primary-light);
        }

        .empresa-profile-badges {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .empresa-profile-actions {
            display: flex;
            gap: var(--space-sm);
            align-self: flex-start;
        }

        /* ===== STATS ===== */
        .empresa-profile-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .empresa-profile-stats .stat-item {
            text-align: center;
        }

        .empresa-profile-stats .stat-value {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
        }

        .empresa-profile-stats .stat-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== DETAILS GRID ===== */
        .empresa-details-grid {
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

        /* ===== PROJETOS ===== */
        .projetos-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
        }

        .projeto-stat {
            text-align: center;
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            padding: var(--space-sm);
            border: 1px solid var(--border-color);
        }

        .projeto-stat .stat-value {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
        }

        .projeto-stat .stat-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .projetos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            max-height: 250px;
            overflow-y: auto;
            padding-right: var(--space-sm);
        }

        .projetos-list::-webkit-scrollbar {
            width: 4px;
        }

        .projetos-list::-webkit-scrollbar-track {
            background: var(--bg-primary);
            border-radius: 3px;
        }

        .projetos-list::-webkit-scrollbar-thumb {
            background: var(--admin-primary-light);
            border-radius: 3px;
        }

        .projeto-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--admin-primary-light);
        }

        .projeto-item .projeto-info h4 {
            font-size: var(--text-sm);
            color: var(--text-primary);
            margin: 0;
        }

        .projeto-item .projeto-info .projeto-orcamento {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .projeto-item .projeto-status {
            text-align: right;
        }

        .projeto-item .projeto-status .projeto-data {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .projetos-footer {
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

        @media (max-width: 1024px) {
            .empresa-details-grid {
                grid-template-columns: 1fr;
            }

            .empresa-profile-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .empresa-profile-card {
                padding: var(--space-md);
            }

            .empresa-profile-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .empresa-profile-info {
                text-align: center;
            }

            .empresa-profile-badges {
                justify-content: center;
            }

            .empresa-profile-actions {
                align-self: center;
            }

            .empresa-profile-stats {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .empresa-profile-stats .stat-value {
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

            .projeto-item {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-xs);
            }

            .projeto-item .projeto-status {
                text-align: left;
                width: 100%;
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
        }

        @media (max-width: 480px) {
            .empresa-profile-card {
                padding: var(--space-sm);
            }

            .empresa-profile-avatar img {
                width: 80px;
                height: 80px;
            }

            .empresa-profile-stats {
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

            .projetos-stats {
                grid-template-columns: 1fr;
            }

            .documento-preview .documento-icon-preview {
                font-size: 3rem;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
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
        }
    </style>

</body>
</html>
