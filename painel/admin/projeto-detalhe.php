<?php
// painel/admin/projeto-detalhe.php - Detalhes do Projeto
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Detalhes do Projeto';
$pagina_atual = 'projetos-global';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Simulando o ID recebido via GET
$projeto_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Projeto (usando o projeto com ID 1 como exemplo)
$projeto_data = [
    'id' => $projeto_id,
    'nome' => 'Levantamento Topográfico - Luanda Sul',
    'descricao' => 'Levantamento topográfico detalhado para projeto de urbanização da zona sul de Luanda, incluindo 120 hectares de área a ser urbanizada com infraestrutura completa.',
    'tipo' => 'individual',
    'tipo_label' => 'Profissional',
    'responsavel' => 'Carlos Mendes',
    'responsavel_id' => 1,
    'responsavel_avatar' => 'profissional-1.png',
    'responsavel_email' => 'carlos.mendes@topografia.pt',
    'responsavel_telefone' => '+244 923 456 100',
    'cliente' => 'Construtora ABC',
    'cliente_id' => 1,
    'cliente_avatar' => 'empresa-1.png',
    'cliente_tipo' => 'empresa',
    'status' => 'em_andamento',
    'status_label' => 'Em Andamento',
    'prioridade' => 'alta',
    'data_inicio' => '2026-01-15',
    'data_fim_prevista' => '2026-03-15',
    'data_fim_real' => null,
    'orcamento' => 450000,
    'custo_atual' => 280000,
    'progresso' => 65,
    'setor' => 'Topografia',
    'criado_por' => 'Carlos Mendes',
    'data_criacao' => '2026-01-10 09:15:00',
    'ultima_atualizacao' => '2026-02-18 14:20:00',
    'avatar' => 'projeto-1.png',
    'lat' => -8.839,
    'lng' => 13.289,
    'endereco' => 'Luanda Sul, Luanda, Angola',
    'equipa' => [
        ['nome' => 'Carlos Mendes', 'funcao' => 'Coordenador', 'avatar' => 'profissional-1.png'],
        ['nome' => 'Ana Costa', 'funcao' => 'Topógrafa', 'avatar' => 'profissional-2.png'],
        ['nome' => 'Pedro Santos', 'funcao' => 'Analista GIS', 'avatar' => 'profissional-3.png']
    ],
    'etapas' => [
        ['nome' => 'Planeamento', 'data_inicio' => '2026-01-15', 'data_fim' => '2026-01-25', 'status' => 'concluido'],
        ['nome' => 'Levantamento de Campo', 'data_inicio' => '2026-01-26', 'data_fim' => '2026-02-15', 'status' => 'concluido'],
        ['nome' => 'Processamento de Dados', 'data_inicio' => '2026-02-16', 'data_fim' => '2026-02-28', 'status' => 'em_andamento'],
        ['nome' => 'Modelagem e Análise', 'data_inicio' => '2026-03-01', 'data_fim' => '2026-03-10', 'status' => 'pendente'],
        ['nome' => 'Entrega Final', 'data_inicio' => '2026-03-11', 'data_fim' => '2026-03-15', 'status' => 'pendente']
    ],
    'documentos' => [
        ['nome' => 'Relatório de Levantamento', 'arquivo' => 'relatorio_levantamento.pdf', 'data' => '2026-02-15', 'tamanho' => '2.4 MB'],
        ['nome' => 'Dados GNSS Processados', 'arquivo' => 'dados_gnss.rar', 'data' => '2026-02-20', 'tamanho' => '15.8 MB'],
        ['nome' => 'Modelo Digital de Terreno', 'arquivo' => 'mdt.tif', 'data' => '2026-02-25', 'tamanho' => '8.2 MB'],
        ['nome' => 'Ortofoto da Área', 'arquivo' => 'ortofoto.jpg', 'data' => '2026-02-28', 'tamanho' => '12.5 MB']
    ],
    'historico_acoes' => [
        ['acao' => 'Criação do projeto', 'data' => '2026-01-10 09:15:00', 'usuario' => 'Carlos Mendes'],
        ['acao' => 'Início da fase de Planeamento', 'data' => '2026-01-15 08:00:00', 'usuario' => 'Carlos Mendes'],
        ['acao' => 'Upload de documentos iniciais', 'data' => '2026-01-20 14:30:00', 'usuario' => 'Carlos Mendes'],
        ['acao' => 'Conclusão da fase de Planeamento', 'data' => '2026-01-25 17:00:00', 'usuario' => 'Carlos Mendes'],
        ['acao' => 'Início do Levantamento de Campo', 'data' => '2026-01-26 07:00:00', 'usuario' => 'Ana Costa'],
        ['acao' => 'Atualização de progresso para 45%', 'data' => '2026-02-10 10:00:00', 'usuario' => 'Carlos Mendes'],
        ['acao' => 'Conclusão do Levantamento de Campo', 'data' => '2026-02-15 16:00:00', 'usuario' => 'Ana Costa'],
        ['acao' => 'Início do Processamento de Dados', 'data' => '2026-02-16 09:00:00', 'usuario' => 'Pedro Santos'],
    ]
];

// Função para exibir valor de forma segura
function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') {
        return $default;
    }
    if (is_array($value)) {
        return $default;
    }
    return htmlspecialchars((string)$value);
}

// Função para formatar moeda
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

// Função para gerar avatar fallback
function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
}

// Função para obter cor do status
function getStatusColor($status) {
    $cores = [
        'concluido' => '#00FFA3',
        'em_andamento' => '#00D2FF',
        'pendente' => '#FFD93D'
    ];
    return $cores[$status] ?? '#6B7A8F';
}

// Função para obter ícone do status
function getStatusIcon($status) {
    $icones = [
        'concluido' => 'fa-check-circle',
        'em_andamento' => 'fa-spinner fa-spin',
        'pendente' => 'fa-clock'
    ];
    return $icones[$status] ?? 'fa-circle';
}

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => true],
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
                        <i class="fas fa-project-diagram icon"></i>
                        Detalhes do Projeto
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="projetos-global.php">Projetos</a>
                        <span class="separator">/</span>
                        <span><?php echo safeValue($projeto_data['nome']); ?></span>
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
                        <a href="projetos-global.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button class="btn btn-outline" onclick="window.print()">
                            <i class="fas fa-print"></i> Imprimir
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== DETALHES DO PROJETO ===== -->
            <div class="projeto-detalhe-container">

                <!-- ===== CARD PRINCIPAL ===== -->
                <div class="projeto-card-principal animate-fade-up">
                    <div class="projeto-header-principal">
                        <div class="projeto-avatar-principal">
                            <img src="../../assets/images/<?php echo safeValue($projeto_data['avatar'], 'projeto-default.png'); ?>" 
                                 alt="<?php echo safeValue($projeto_data['nome']); ?>"
                                 onerror="this.src='<?php echo getAvatarUrl($projeto_data['nome']); ?>'">
                            <span class="status-badge status-<?php echo $projeto_data['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $projeto_data['status_label']; ?>
                            </span>
                        </div>
                        <div class="projeto-info-principal">
                            <h2><?php echo safeValue($projeto_data['nome']); ?></h2>
                            <div class="projeto-tags-principal">
                                <span class="tag tag-tipo <?php echo $projeto_data['tipo']; ?>">
                                    <i class="fas <?php echo $projeto_data['tipo'] === 'individual' ? 'fa-user-tie' : 'fa-building'; ?>"></i>
                                    <?php echo $projeto_data['tipo_label']; ?>
                                </span>
                                <span class="tag tag-setor">
                                    <i class="fas fa-tag"></i> <?php echo $projeto_data['setor']; ?>
                                </span>
                                <span class="tag tag-prioridade <?php echo $projeto_data['prioridade']; ?>">
                                    <i class="fas fa-flag"></i> <?php echo ucfirst($projeto_data['prioridade']); ?>
                                </span>
                                <span class="tag tag-progresso">
                                    <i class="fas fa-chart-line"></i> <?php echo $projeto_data['progresso']; ?>% concluído
                                </span>
                            </div>
                            <p class="projeto-descricao-principal"><?php echo safeValue($projeto_data['descricao']); ?></p>
                        </div>
                    </div>

                    <!-- ===== STATS ===== -->
                    <div class="projeto-stats-principal">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo date('d/m/Y', strtotime($projeto_data['data_inicio'])); ?></span>
                            <span class="stat-label">Data de Início</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo date('d/m/Y', strtotime($projeto_data['data_fim_prevista'])); ?></span>
                            <span class="stat-label">Data Fim Prevista</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">Kz <?php echo formatMoney($projeto_data['orcamento']); ?></span>
                            <span class="stat-label">Orçamento</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">Kz <?php echo formatMoney($projeto_data['custo_atual']); ?></span>
                            <span class="stat-label">Custo Atual</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $projeto_data['progresso']; ?>%</span>
                            <span class="stat-label">Progresso</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value">
                                <?php 
                                $dias_restantes = ceil((strtotime($projeto_data['data_fim_prevista']) - time()) / 86400);
                                if ($projeto_data['status'] === 'concluido') {
                                    echo 'Concluído';
                                } elseif ($dias_restantes < 0) {
                                    echo 'Atrasado';
                                } else {
                                    echo $dias_restantes . ' dias';
                                }
                                ?>
                            </span>
                            <span class="stat-label">Dias Restantes</span>
                        </div>
                    </div>

                    <!-- ===== BARRA DE PROGRESSO ===== -->
                    <div class="progresso-detalhe">
                        <div class="progress-bar-detalhe">
                            <div class="progress-fill-detalhe" style="width: <?php echo $projeto_data['progresso']; ?>%; background: <?php echo $projeto_data['progresso'] >= 100 ? '#00FFA3' : ($projeto_data['progresso'] >= 50 ? '#00D2FF' : '#FF6B6B'); ?>;"></div>
                        </div>
                        <span class="progress-text-detalhe"><?php echo $projeto_data['progresso']; ?>%</span>
                    </div>
                </div>

                <!-- ===== GRID DE DETALHES ===== -->
                <div class="projeto-detalhes-grid">

                    <!-- ===== INFORMAÇÕES DO PROJETO ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.1s;">
                        <h3><i class="fas fa-info-circle"></i> Informações do Projeto</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Nome do Projeto</span>
                                <span class="detail-value"><?php echo safeValue($projeto_data['nome']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Setor</span>
                                <span class="detail-value"><?php echo safeValue($projeto_data['setor']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Tipo</span>
                                <span class="detail-value"><?php echo safeValue($projeto_data['tipo_label']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Prioridade</span>
                                <span class="detail-value">
                                    <span class="badge badge-prioridade <?php echo $projeto_data['prioridade']; ?>">
                                        <?php echo ucfirst($projeto_data['prioridade']); ?>
                                    </span>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Status</span>
                                <span class="detail-value">
                                    <span class="status-badge status-<?php echo $projeto_data['status']; ?>">
                                        <span class="status-dot"></span>
                                        <?php echo $projeto_data['status_label']; ?>
                                    </span>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Progresso</span>
                                <span class="detail-value"><?php echo $projeto_data['progresso']; ?>%</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Localização</span>
                                <span class="detail-value"><i class="fas fa-map-marker-alt"></i> <?php echo safeValue($projeto_data['endereco']); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== RESPONSÁVEL ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.15s;">
                        <h3><i class="fas fa-user"></i> Responsável</h3>
                        <div class="responsavel-info">
                            <div class="responsavel-avatar">
                                <img src="../../assets/images/<?php echo safeValue($projeto_data['responsavel_avatar'], 'avatar-default.png'); ?>" 
                                     alt="<?php echo safeValue($projeto_data['responsavel']); ?>"
                                     onerror="this.src='<?php echo getAvatarUrl($projeto_data['responsavel']); ?>'">
                            </div>
                            <div class="responsavel-dados">
                                <span class="responsavel-nome"><strong><?php echo safeValue($projeto_data['responsavel']); ?></strong></span>
                                <span class="responsavel-email"><i class="fas fa-envelope"></i> <?php echo safeValue($projeto_data['responsavel_email']); ?></span>
                                <span class="responsavel-telefone"><i class="fas fa-phone"></i> <?php echo safeValue($projeto_data['responsavel_telefone']); ?></span>
                            </div>
                        </div>
                        <div style="margin-top: var(--space-md); border-top: 1px solid var(--border-color); padding-top: var(--space-md);">
                            <h4 style="font-size: var(--text-sm); color: var(--text-muted); margin-bottom: var(--space-sm);">
                                <i class="fas fa-user-tie"></i> Cliente
                            </h4>
                            <div class="cliente-info">
                                <div class="cliente-avatar">
                                    <img src="../../assets/images/<?php echo safeValue($projeto_data['cliente_avatar'], 'avatar-default.png'); ?>" 
                                         alt="<?php echo safeValue($projeto_data['cliente']); ?>"
                                         onerror="this.src='<?php echo getAvatarUrl($projeto_data['cliente']); ?>'">
                                </div>
                                <div class="cliente-dados">
                                    <span class="cliente-nome"><strong><?php echo safeValue($projeto_data['cliente']); ?></strong></span>
                                    <span class="cliente-tipo"><i class="fas <?php echo $projeto_data['cliente_tipo'] === 'empresa' ? 'fa-building' : 'fa-university'; ?>"></i> <?php echo ucfirst($projeto_data['cliente_tipo']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== FINANCEIRO ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.2s;">
                        <h3><i class="fas fa-coins"></i> Financeiro</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Orçamento Total</span>
                                <span class="detail-value" style="font-weight: 600; color: var(--color-turquoise);">Kz <?php echo formatMoney($projeto_data['orcamento']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Custo Atual</span>
                                <span class="detail-value">Kz <?php echo formatMoney($projeto_data['custo_atual']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Saldo Restante</span>
                                <span class="detail-value" style="color: <?php echo ($projeto_data['orcamento'] - $projeto_data['custo_atual']) > 0 ? '#00FFA3' : '#FF6B6B'; ?>;">
                                    Kz <?php echo formatMoney($projeto_data['orcamento'] - $projeto_data['custo_atual']); ?>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">% Gasto</span>
                                <span class="detail-value">
                                    <?php echo round(($projeto_data['custo_atual'] / $projeto_data['orcamento']) * 100, 1); ?>%
                                </span>
                            </div>
                        </div>
                        <div class="financeiro-barra">
                            <div class="financeiro-bar">
                                <div class="financeiro-fill" style="width: <?php echo round(($projeto_data['custo_atual'] / $projeto_data['orcamento']) * 100); ?>%; background: <?php echo ($projeto_data['custo_atual'] / $projeto_data['orcamento']) > 0.8 ? '#FF6B6B' : '#00D2FF'; ?>;"></div>
                            </div>
                            <span class="financeiro-text"><?php echo round(($projeto_data['custo_atual'] / $projeto_data['orcamento']) * 100); ?>% do orçamento utilizado</span>
                        </div>
                    </div>

                    <!-- ===== EQUIPA ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.25s;">
                        <h3><i class="fas fa-users"></i> Equipa do Projeto</h3>
                        <div class="equipa-list">
                            <?php foreach ($projeto_data['equipa'] as $membro): ?>
                                <div class="equipa-item">
                                    <div class="equipa-avatar">
                                        <img src="../../assets/images/<?php echo safeValue($membro['avatar'], 'avatar-default.png'); ?>" 
                                             alt="<?php echo safeValue($membro['nome']); ?>"
                                             onerror="this.src='<?php echo getAvatarUrl($membro['nome']); ?>'">
                                    </div>
                                    <div class="equipa-info">
                                        <span class="equipa-nome"><?php echo safeValue($membro['nome']); ?></span>
                                        <span class="equipa-funcao"><?php echo safeValue($membro['funcao']); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== ETAPAS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.3s;">
                        <h3><i class="fas fa-list-check"></i> Etapas do Projeto</h3>
                        <div class="etapas-list">
                            <?php foreach ($projeto_data['etapas'] as $etapa): ?>
                                <div class="etapa-item">
                                    <div class="etapa-status">
                                        <i class="fas <?php echo getStatusIcon($etapa['status']); ?>" style="color: <?php echo getStatusColor($etapa['status']); ?>;"></i>
                                    </div>
                                    <div class="etapa-info">
                                        <span class="etapa-nome"><?php echo safeValue($etapa['nome']); ?></span>
                                        <span class="etapa-data">
                                            <?php echo date('d/m/Y', strtotime($etapa['data_inicio'])); ?> - 
                                            <?php echo date('d/m/Y', strtotime($etapa['data_fim'])); ?>
                                        </span>
                                    </div>
                                    <span class="badge etapa-badge status-<?php echo $etapa['status']; ?>">
                                        <?php echo $etapa['status'] === 'concluido' ? 'Concluído' : ($etapa['status'] === 'em_andamento' ? 'Em Andamento' : 'Pendente'); ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== DOCUMENTOS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.35s;">
                        <h3><i class="fas fa-file-alt"></i> Documentos</h3>
                        <div class="document-list">
                            <?php foreach ($projeto_data['documentos'] as $doc): ?>
                                <div class="document-item">
                                    <div class="document-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="document-info">
                                        <span class="document-name"><?php echo safeValue($doc['nome']); ?></span>
                                        <span class="document-file"><?php echo safeValue($doc['arquivo']); ?></span>
                                        <span class="document-meta">
                                            <i class="far fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($doc['data'])); ?>
                                            <span class="separator">•</span>
                                            <i class="fas fa-database"></i> <?php echo safeValue($doc['tamanho']); ?>
                                        </span>
                                    </div>
                                    <div class="document-actions">
                                        <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo safeValue($doc['arquivo']); ?>')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo safeValue($doc['arquivo']); ?>')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== HISTÓRICO ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.4s;">
                        <h3><i class="fas fa-history"></i> Histórico de Ações</h3>
                        <div class="historico-list">
                            <?php foreach ($projeto_data['historico_acoes'] as $acao): ?>
                                <div class="historico-item">
                                    <div class="historico-icon">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                    <div class="historico-info">
                                        <span class="historico-acao"><?php echo safeValue($acao['acao']); ?></span>
                                        <span class="historico-data"><?php echo date('d/m/Y H:i', strtotime($acao['data'])); ?></span>
                                    </div>
                                    <span class="historico-usuario"><i class="fas fa-user"></i> <?php echo safeValue($acao['usuario']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== MAPA ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.45s; grid-column: 1 / -1;">
                        <h3><i class="fas fa-map-marked-alt"></i> Localização do Projeto</h3>
                        <div id="projetoMap" style="width: 100%; height: 300px; border-radius: var(--radius-md);"></div>
                        <p style="margin-top: var(--space-sm); font-size: var(--text-sm); color: var(--text-muted);">
                            <i class="fas fa-map-marker-alt" style="color: var(--color-turquoise);"></i> 
                            <?php echo safeValue($projeto_data['endereco']); ?>
                        </p>
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
    <script src="../assets/js/main.js"></script>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        

        // ==========================================
        // INICIALIZAR MAPA
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            const lat = <?php echo $projeto_data['lat']; ?>;
            const lng = <?php echo $projeto_data['lng']; ?>;
            const nome = '<?php echo safeValue($projeto_data['nome']); ?>';
            const endereco = '<?php echo safeValue($projeto_data['endereco']); ?>';
            const status = '<?php echo $projeto_data['status']; ?>';
            const statusLabel = '<?php echo $projeto_data['status_label']; ?>';
            const progresso = <?php echo $projeto_data['progresso']; ?>;

            // Inicializar mapa
            const map = L.map('projetoMap').setView([lat, lng], 13);

            // Adicionar tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 18
            }).addTo(map);

            // Definir cores do marcador baseado no status
            let markerColor = '#00D2FF';
            if (status === 'concluido') markerColor = '#00FFA3';
            else if (status === 'pendente') markerColor = '#FFD93D';

            // Criar ícone personalizado
            const icon = L.divIcon({
                className: 'custom-marker',
                html: `<div style="background: ${markerColor}; width: 20px; height: 20px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 10px rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center; font-size: 10px; color: white; font-weight: bold;">${progresso}%</div>`,
                iconSize: [20, 20],
                iconAnchor: [10, 10]
            });

            // Adicionar marcador
            const marker = L.marker([lat, lng], { icon: icon }).addTo(map);

            // Popup
            const popupContent = `
                <div style="min-width: 200px;">
                    <h4 style="margin: 0 0 6px 0; font-family: 'Orbitron', sans-serif; font-size: 14px; color: #1A1A2E;">${nome}</h4>
                    <p style="margin: 0 0 4px 0; font-size: 12px; color: #6B7A8F;"><i class="fas fa-map-marker-alt" style="color: #00D2FF;"></i> ${endereco}</p>
                    <p style="margin: 0 0 4px 0; font-size: 12px; color: #6B7A8F;"><strong>Status:</strong> <span style="color: ${markerColor};">${statusLabel}</span></p>
                    <p style="margin: 0; font-size: 12px; color: #6B7A8F;"><strong>Progresso:</strong> ${progresso}%</p>
                </div>
            `;

            marker.bindPopup(popupContent);

            // Ajustar o mapa
            setTimeout(function() {
                map.invalidateSize();
            }, 500);

            // Adicionar controle de zoom
            L.control.zoom({
                position: 'topright'
            }).addTo(map);
        });

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
        /* PROJETO DETALHE - CSS COMPLETO             */
        /* ========================================== */

        .projeto-detalhe-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ===== CARD PRINCIPAL ===== */
        .projeto-card-principal {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .projeto-card-principal:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .projeto-header-principal {
            display: flex;
            gap: var(--space-xl);
            flex-wrap: wrap;
        }

        .projeto-avatar-principal {
            position: relative;
            flex-shrink: 0;
        }

        .projeto-avatar-principal img {
            width: 100px;
            height: 100px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 4px solid var(--color-turquoise);
        }

        .projeto-avatar-principal .status-badge {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .projeto-info-principal {
            flex: 1;
        }

        .projeto-info-principal h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .projeto-tags-principal {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-sm);
            margin-bottom: var(--space-sm);
        }

        .projeto-tags-principal .tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            color: var(--text-muted);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
        }

        .projeto-tags-principal .tag.individual i {
            color: var(--color-turquoise);
        }

        .projeto-tags-principal .tag.empresarial i {
            color: #FF6B6B;
        }

        .projeto-tags-principal .tag.alta i {
            color: #FF6B6B;
        }

        .projeto-tags-principal .tag.media i {
            color: #F59E0B;
        }

        .projeto-tags-principal .tag.baixa i {
            color: #00FFA3;
        }

        .projeto-tags-principal .tag-progresso i {
            color: var(--color-aurora);
        }

        .projeto-descricao-principal {
            font-size: var(--text-body);
            color: var(--text-secondary);
            line-height: 1.6;
            margin-top: var(--space-sm);
        }

        /* ===== STATS ===== */
        .projeto-stats-principal {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .projeto-stats-principal .stat-item {
            text-align: center;
        }

        .projeto-stats-principal .stat-value {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
        }

        .projeto-stats-principal .stat-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== PROGRESSO ===== */
        .progresso-detalhe {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .progress-bar-detalhe {
            flex: 1;
            height: 8px;
            background: var(--bg-input);
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill-detalhe {
            height: 100%;
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .progress-text-detalhe {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-muted);
            min-width: 45px;
        }

        /* ===== DETAILS GRID ===== */
        .projeto-detalhes-grid {
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

        /* ===== BADGES ===== */
        .badge-prioridade.alta {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
        }

        .badge-prioridade.media {
            background: rgba(245, 158, 11, 0.15);
            color: #F59E0B;
        }

        .badge-prioridade.baixa {
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
        }

        /* ===== RESPONSÁVEL ===== */
        .responsavel-info,
        .cliente-info {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .responsavel-avatar img,
        .cliente-avatar img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .responsavel-dados,
        .cliente-dados {
            display: flex;
            flex-direction: column;
        }

        .responsavel-dados span,
        .cliente-dados span {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .responsavel-dados .responsavel-nome,
        .cliente-dados .cliente-nome {
            color: var(--text-primary);
            font-size: var(--text-body);
        }

        /* ===== FINANCEIRO ===== */
        .financeiro-barra {
            margin-top: var(--space-md);
        }

        .financeiro-bar {
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .financeiro-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .financeiro-text {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ===== EQUIPA ===== */
        .equipa-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .equipa-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .equipa-item .equipa-avatar img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .equipa-item .equipa-info {
            display: flex;
            flex-direction: column;
        }

        .equipa-item .equipa-nome {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .equipa-item .equipa-funcao {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== ETAPAS ===== */
        .etapas-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .etapa-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--border-color);
        }

        .etapa-item .etapa-status {
            font-size: 1rem;
            flex-shrink: 0;
        }

        .etapa-item .etapa-info {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .etapa-item .etapa-nome {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .etapa-item .etapa-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .etapa-badge {
            font-size: var(--text-xs) !important;
        }

        .etapa-badge.status-concluido {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .etapa-badge.status-em_andamento {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .etapa-badge.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        /* ========================================== */
        /* MAPA - CSS                                */
        /* ========================================== */

        .leaflet-popup-content-wrapper {
            border-radius: var(--radius-sm);
            background: var(--bg-card);
            color: var(--text-primary);
            box-shadow: var(--glass-shadow);
            border: 1px solid var(--border-color);
        }

        .leaflet-popup-tip {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
        }

        .leaflet-popup-content {
            margin: 10px 12px;
            min-width: 200px;
        }

        .leaflet-control-zoom a {
            background: var(--bg-card) !important;
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }

        .leaflet-control-zoom a:hover {
            background: var(--bg-card-hover) !important;
        }

        [data-theme="dark"] .leaflet-tile {
            filter: brightness(0.8) saturate(1.2);
        }

        [data-theme="dark"] .leaflet-popup-content-wrapper {
            background: #1A2A4A;
            border-color: rgba(255, 255, 255, 0.06);
        }

        [data-theme="dark"] .leaflet-popup-tip {
            background: #1A2A4A;
            border-color: rgba(255, 255, 255, 0.06);
        }

        [data-theme="dark"] .leaflet-popup-content h4 {
            color: #FFFFFF;
        }

        [data-theme="dark"] .leaflet-popup-content p {
            color: #B8C6D4;
        }

        [data-theme="dark"] .leaflet-control-zoom a {
            background: #1A2A4A !important;
            color: #FFFFFF !important;
            border-color: rgba(255, 255, 255, 0.08) !important;
        }

        [data-theme="dark"] .leaflet-control-zoom a:hover {
            background: rgba(255, 255, 255, 0.06) !important;
        }

        /* ========================================== */
        /* DOCUMENTOS                                */
        /* ========================================== */

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

        .document-item .document-meta {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .document-item .document-meta .separator {
            margin: 0 4px;
        }

        .document-item .document-actions {
            display: flex;
            gap: var(--space-xs);
        }

        /* ========================================== */
        /* HISTÓRICO                                 */
        /* ========================================== */

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
            flex-shrink: 0;
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

        .historico-item .historico-usuario {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
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
            .projeto-detalhes-grid {
                grid-template-columns: 1fr;
            }

            .projeto-stats-principal {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .projeto-header-principal {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .projeto-info-principal {
                text-align: center;
            }

            .projeto-tags-principal {
                justify-content: center;
            }

            .projeto-stats-principal {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .projeto-stats-principal .stat-value {
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

            .responsavel-info,
            .cliente-info {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .responsavel-dados,
            .cliente-dados {
                align-items: center;
            }

            .etapa-item {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-xs);
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

            .historico-item .historico-usuario {
                white-space: normal;
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

            .projeto-avatar-principal img {
                width: 80px;
                height: 80px;
            }

            #projetoMap {
                height: 250px;
            }

            .progresso-detalhe {
                flex-direction: column;
                gap: var(--space-xs);
            }

            .progress-text-detalhe {
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
            .projeto-card-principal {
                padding: var(--space-md);
            }

            .projeto-stats-principal {
                grid-template-columns: 1fr 1fr;
            }

            .projeto-info-principal h2 {
                font-size: var(--text-h3);
            }

            .detail-card {
                padding: var(--space-md);
            }

            .projeto-avatar-principal img {
                width: 80px;
                height: 80px;
            }

            .projeto-avatar-principal .status-badge {
                font-size: 0.5rem;
                padding: 1px 6px;
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

            .projeto-actions .btn {
                padding: 4px 8px;
                font-size: var(--text-xs);
            }

            .projeto-tags-principal .tag {
                font-size: var(--text-xs);
                padding: 1px 8px;
            }

            .equipa-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
                padding: var(--space-sm);
            }

            .financeiro-bar {
                height: 4px;
            }
        }
    </style>

</body>
</html>