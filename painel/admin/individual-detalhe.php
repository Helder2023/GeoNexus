<?php
// painel/admin/individual-detalhe.php - Detalhes do Profissional Individual
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Detalhes do Profissional';
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
    'projetos_total' => 12,
    'projetos_concluidos' => 9,
    'projetos_andamento' => 3,
    'avaliacao' => 4.8,
    'total_avaliacoes' => 24,
    'certificacoes' => ['GNSS', 'Nivelamento', 'Fotogrametria', 'Drone Pilot'],
    'morada' => 'Rua das Topografias, 123, Luanda, Angola',
    'data_nascimento' => '1988-03-15',
    'genero' => 'Masculino',
    'bi' => '001234567LA042',
    'documentos' => [
        ['nome' => 'Bilhete de Identidade', 'arquivo' => 'bi_carlos_mendes.pdf', 'data' => '2026-01-10'],
        ['nome' => 'Certificado de Habilitações', 'arquivo' => 'certificado_carlos_mendes.pdf', 'data' => '2026-01-15'],
        ['nome' => 'Certificado GNSS', 'arquivo' => 'certificado_gnss.pdf', 'data' => '2026-02-01'],
        ['nome' => 'Foto Profissional', 'arquivo' => 'foto_carlos_mendes.jpg', 'data' => '2026-01-10']
    ],
    'historico_acoes' => [
        ['acao' => 'Registo da conta', 'data' => '2026-01-10 09:15:00', 'ip' => '192.168.1.100'],
        ['acao' => 'Validação da conta', 'data' => '2026-01-10 10:00:00', 'ip' => '192.168.1.100'],
        ['acao' => 'Primeiro acesso ao painel', 'data' => '2026-01-11 08:30:00', 'ip' => '192.168.1.101'],
        ['acao' => 'Criação de projeto: Levantamento Luanda Sul', 'data' => '2026-01-15 09:00:00', 'ip' => '192.168.1.102'],
        ['acao' => 'Upload de documento: Certificado GNSS', 'data' => '2026-02-01 14:20:00', 'ip' => '192.168.1.105'],
        ['acao' => 'Atualização de perfil', 'data' => '2026-02-10 11:30:00', 'ip' => '192.168.1.106'],
    ],
    'projetos_recentes' => [
        ['id' => 1, 'nome' => 'Levantamento Topográfico - Luanda Sul', 'status' => 'Em andamento', 'data_inicio' => '2026-01-15', 'data_fim' => '2026-03-15'],
        ['id' => 2, 'nome' => 'Georreferenciamento - Kilamba', 'status' => 'Concluído', 'data_inicio' => '2025-12-01', 'data_fim' => '2026-01-20'],
        ['id' => 3, 'nome' => 'Modelagem 3D - Talatona', 'status' => 'Em andamento', 'data_inicio' => '2026-02-01', 'data_fim' => '2026-04-01'],
        ['id' => 4, 'nome' => 'Levantamento GNSS - Viana', 'status' => 'Concluído', 'data_inicio' => '2025-11-01', 'data_fim' => '2025-12-15'],
    ]
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
                        <i class="fas fa-user-tie icon"></i>
                        Detalhes do Profissional
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="individuais.php">Profissionais</a>
                        <span class="separator">/</span>
                        <span><?php echo $profissional_data['nome']; ?></span>
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
                        <a href="individuais.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <a href="individual-editar.php?id=<?php echo $profissional_data['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ===== PERFIL DO PROFISSIONAL ===== -->
            <div class="profile-container">

                <!-- ===== CARD PRINCIPAL ===== -->
                <div class="profile-card animate-fade-up">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <img src="../../assets/images/<?php echo $profissional_data['avatar']; ?>" alt="<?php echo $profissional_data['nome']; ?>">
                            <span class="status-badge status-<?php echo $profissional_data['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $profissional_data['status_label']; ?>
                            </span>
                        </div>
                        <div class="profile-info">
                            <h2><?php echo $profissional_data['nome']; ?></h2>
                            <p class="profile-email"><i class="fas fa-envelope"></i> <?php echo $profissional_data['email']; ?></p>
                            <div class="profile-badges">
                                <span class="badge badge-info">
                                    <i class="fas fa-briefcase"></i> <?php echo $profissional_data['especialidade']; ?>
                                </span>
                                <span class="badge badge-primary">
                                    <i class="fas fa-crown"></i> <?php echo $profissional_data['plano']; ?>
                                </span>
                                <span class="badge badge-warning">
                                    <i class="fas fa-star"></i> <?php echo $profissional_data['avaliacao']; ?> / 5.0
                                </span>
                                <span class="badge badge-<?php echo $profissional_data['status'] === 'ativo' ? 'success' : ($profissional_data['status'] === 'pendente' ? 'warning' : 'danger'); ?>">
                                    <i class="fas fa-circle"></i> <?php echo $profissional_data['status_label']; ?>
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
                            <span class="stat-value"><?php echo $profissional_data['projetos_total']; ?></span>
                            <span class="stat-label">Total de Projetos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $profissional_data['projetos_concluidos']; ?></span>
                            <span class="stat-label">Concluídos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $profissional_data['projetos_andamento']; ?></span>
                            <span class="stat-label">Em Andamento</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $profissional_data['total_avaliacoes']; ?></span>
                            <span class="stat-label">Avaliações</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo date('d/m/Y', strtotime($profissional_data['data_registo'])); ?></span>
                            <span class="stat-label">Registo</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $profissional_data['experiencia']; ?></span>
                            <span class="stat-label">Experiência</span>
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
                                <span class="detail-value"><?php echo $profissional_data['nome']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Email</span>
                                <span class="detail-value"><?php echo $profissional_data['email']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Telefone</span>
                                <span class="detail-value"><?php echo $profissional_data['telefone']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Telefone Alternativo</span>
                                <span class="detail-value"><?php echo $profissional_data['telefone_alternativo']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">NIF</span>
                                <span class="detail-value"><?php echo $profissional_data['nif']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">BI</span>
                                <span class="detail-value"><?php echo $profissional_data['bi']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Data de Nascimento</span>
                                <span class="detail-value"><?php echo date('d/m/Y', strtotime($profissional_data['data_nascimento'])); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Género</span>
                                <span class="detail-value"><?php echo $profissional_data['genero']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Morada</span>
                                <span class="detail-value"><?php echo $profissional_data['morada']; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== INFORMAÇÕES PROFISSIONAIS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.2s;">
                        <h3><i class="fas fa-briefcase"></i> Informações Profissionais</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Especialidade</span>
                                <span class="detail-value"><?php echo $profissional_data['especialidade']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Sub-Especialidade</span>
                                <span class="detail-value"><?php echo $profissional_data['sub_especialidade']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Formação</span>
                                <span class="detail-value"><?php echo $profissional_data['formacao']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Experiência</span>
                                <span class="detail-value"><?php echo $profissional_data['experiencia']; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Plano</span>
                                <span class="detail-value">
                                    <span class="badge badge-plano <?php echo strtolower($profissional_data['plano']); ?>">
                                        <i class="fas fa-crown"></i> <?php echo $profissional_data['plano']; ?>
                                    </span>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Avaliação</span>
                                <span class="detail-value">
                                    <span class="avaliacao-stars">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <?php if ($i <= round($profissional_data['avaliacao'])): ?>
                                                <i class="fas fa-star" style="color: #FFD93D;"></i>
                                            <?php else: ?>
                                                <i class="far fa-star" style="color: #FFD93D;"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                        <span style="margin-left: 4px;">(<?php echo $profissional_data['avaliacao']; ?>)</span>
                                    </span>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Descrição</span>
                                <span class="detail-value" style="text-align: left;"><?php echo $profissional_data['descricao']; ?></span>
                            </div>
                        </div>

                        <!-- ===== CERTIFICAÇÕES ===== -->
                        <div style="margin-top: var(--space-md);">
                            <h4 style="font-size: var(--text-sm); color: var(--text-muted); margin-bottom: var(--space-sm);">
                                <i class="fas fa-certificate"></i> Certificações
                            </h4>
                            <div class="certificacoes-list">
                                <?php foreach ($profissional_data['certificacoes'] as $cert): ?>
                                    <span class="certificacao-tag">
                                        <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                                        <?php echo $cert; ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DOCUMENTOS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.3s;">
                        <h3><i class="fas fa-file-alt"></i> Documentos</h3>
                        <div class="document-list">
                            <?php foreach ($profissional_data['documentos'] as $doc): ?>
                                <div class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="document-info">
                                        <span class="document-name"><?php echo $doc['nome']; ?></span>
                                        <span class="document-file"><?php echo $doc['arquivo']; ?></span>
                                        <span class="document-data"><i class="far fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($doc['data'])); ?></span>
                                    </div>
                                    <div class="document-actions">
                                        <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo $doc['arquivo']; ?>')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo $doc['arquivo']; ?>')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="document-upload">
                            <button class="btn btn-outline btn-sm" onclick="uploadDocumento()">
                                <i class="fas fa-upload"></i> Adicionar Documento
                            </button>
                        </div>
                    </div>

                    <!-- ===== PROJETOS RECENTES ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.4s;">
                        <h3><i class="fas fa-project-diagram"></i> Projetos Recentes</h3>
                        <div class="projetos-list">
                            <?php foreach ($profissional_data['projetos_recentes'] as $projeto): ?>
                                <div class="projeto-item">
                                    <div class="projeto-info">
                                        <span class="projeto-nome"><?php echo $projeto['nome']; ?></span>
                                        <span class="projeto-datas">
                                            <i class="far fa-calendar-alt"></i> 
                                            <?php echo date('d/m/Y', strtotime($projeto['data_inicio'])); ?> - 
                                            <?php echo date('d/m/Y', strtotime($projeto['data_fim'])); ?>
                                        </span>
                                    </div>
                                    <span class="badge badge-status <?php echo strtolower(str_replace(' ', '-', $projeto['status'])); ?>">
                                        <?php echo $projeto['status']; ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="projetos-actions">
                            <a href="projetos-global.php?profissional=<?php echo $profissional_data['id']; ?>" class="btn btn-outline btn-sm">
                                <i class="fas fa-eye"></i> Ver Todos os Projetos
                            </a>
                        </div>
                    </div>

                    <!-- ===== HISTÓRICO DE AÇÕES ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.5s;">
                        <h3><i class="fas fa-history"></i> Histórico de Ações</h3>
                        <div class="historico-list">
                            <?php foreach ($profissional_data['historico_acoes'] as $acao): ?>
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
                        <div class="historico-actions">
                            <a href="individual-historico.php?id=<?php echo $profissional_data['id']; ?>" class="btn btn-outline btn-sm">
                                <i class="fas fa-history"></i> Ver Histórico Completo
                            </a>
                        </div>
                    </div>

                </div>

                <!-- ===== AÇÕES RÁPIDAS ===== -->
                <div class="quick-actions-profile animate-fade-up" style="animation-delay: 0.6s;">
                    <h3><i class="fas fa-bolt"></i> Ações Disponíveis</h3>
                    <div class="actions-grid">
                        <a href="individual-editar.php?id=<?php echo $profissional_data['id']; ?>" class="action-item">
                            <i class="fas fa-edit"></i>
                            <span class="label">Editar Perfil</span>
                        </a>
                       
                        <?php if ($profissional_data['status'] === 'ativo'): ?>
                            <a href="individual-suspender.php?id=<?php echo $profissional_data['id']; ?>" class="action-item" onclick="return confirm('Tem certeza que deseja suspender este profissional?')">
                                <i class="fas fa-pause" style="color: #F59E0B;"></i>
                                <span class="label">Suspender</span>
                            </a>
                        <?php elseif ($profissional_data['status'] === 'inativo'): ?>
                            <a href="individual-ativar.php?id=<?php echo $profissional_data['id']; ?>" class="action-item">
                                <i class="fas fa-play" style="color: #00FFA3;"></i>
                                <span class="label">Ativar</span>
                            </a>
                        <?php endif; ?>
                        <?php if ($profissional_data['status'] === 'pendente'): ?>
                            <a href="individual-validar.php?id=<?php echo $profissional_data['id']; ?>" class="action-item">
                                <i class="fas fa-check" style="color: #00FFA3;"></i>
                                <span class="label">Validar</span>
                            </a>
                        <?php endif; ?>
                        <a href="individual-historico.php?id=<?php echo $profissional_data['id']; ?>" class="action-item">
                            <i class="fas fa-history"></i>
                            <span class="label">Ver Histórico Completo</span>
                        </a>
                        <a href="individual-excluir.php?id=<?php echo $profissional_data['id']; ?>" class="action-item" onclick="return confirm('Tem certeza que deseja excluir permanentemente este profissional? Esta ação não pode ser desfeita!')">
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
        /* PERFIL DO PROFISSIONAL - CSS COMPLETO      */
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
            border: 4px solid var(--color-turquoise);
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
            color: var(--color-turquoise);
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
            grid-template-columns: repeat(6, 1fr);
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
            color: var(--color-turquoise);
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

        /* ===== CERTIFICAÇÕES ===== */
        .certificacoes-list {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .certificacao-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .certificacao-tag i {
            font-size: 0.6rem;
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
            border-color: var(--color-turquoise);
        }

        .document-item .document-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: rgba(0, 210, 255, 0.08);
            color: var(--color-turquoise);
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

        .document-item .document-data {
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
        .projetos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .projeto-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--color-turquoise);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .projeto-item .projeto-info {
            display: flex;
            flex-direction: column;
        }

        .projeto-item .projeto-nome {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .projeto-item .projeto-datas {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .projeto-item .projeto-datas i {
            margin-right: 4px;
        }

        .projetos-actions {
            margin-top: var(--space-md);
            text-align: center;
        }

        /* ===== HISTÓRICO ===== */
        .historico-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            max-height: 250px;
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
            background: var(--color-turquoise);
            border-radius: 3px;
        }

        .historico-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--color-turquoise);
        }

        .historico-item .historico-icon {
            color: var(--color-turquoise);
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
            font-family: monospace;
        }

        .historico-actions {
            margin-top: var(--space-md);
            text-align: center;
        }

        /* ===== BADGES ===== */
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

        .badge-status.ativo {
            background: rgba(0, 255, 163, 0.15);
            color: var(--color-future-green);
        }

        .badge-status.pendente {
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
        }

        .badge-status.inativo {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
        }

        .badge-status.em-andamento {
            background: rgba(0, 210, 255, 0.15);
            color: var(--color-turquoise);
        }

        .badge-status.concluído {
            background: rgba(0, 255, 163, 0.15);
            color: var(--color-future-green);
        }

        /* ===== QUICK ACTIONS ===== */
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
            color: var(--color-turquoise);
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
            border-color: var(--color-turquoise);
            background: rgba(0, 210, 255, 0.04);
            transform: translateY(-2px);
            color: var(--text-primary);
        }

        .quick-actions-profile .action-item i {
            font-size: 1.3rem;
            color: var(--color-turquoise);
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
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
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
            color: var(--color-turquoise);
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
            color: var(--color-turquoise);
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
        /* ANIMAÇÕES                                  */
        /* ========================================== */

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

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
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
                grid-template-columns: repeat(3, 1fr);
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

            .projeto-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .historico-item {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-xs);
            }

            .quick-actions-profile .actions-grid {
                grid-template-columns: 1fr 1fr;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .profile-avatar img {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 480px) {
            .profile-card {
                padding: var(--space-md);
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

            .profile-avatar img {
                width: 80px;
                height: 80px;
            }

            .profile-info h2 {
                font-size: var(--text-h3);
            }

            .modal-header {
                padding: 14px 18px;
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

            .documento-preview .documento-actions-preview {
                flex-direction: column;
            }

            .documento-preview .documento-actions-preview .btn {
                width: 100%;
                min-width: auto;
            }

            .profile-actions .btn {
                padding: 4px 8px;
                font-size: var(--text-xs);
            }
        }
    </style>

</body>
</html>