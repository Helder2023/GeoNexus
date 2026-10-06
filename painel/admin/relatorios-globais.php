<?php
// painel/admin/relatorios-globais.php - Relatórios Globais
include "../../includes/admin/notificacoes-admin-count.php";

$titulo_pagina = 'Relatórios Globais';
$pagina_atual = 'relatorios-globais';

// Dados mockados
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Relatórios
$relatorios = [
    [
        'id' => 1,
        'titulo' => 'Relatório de Utilizadores - Fevereiro 2026',
        'descricao' => 'Análise detalhada do crescimento e atividade de utilizadores no mês de fevereiro.',
        'tipo' => 'utilizadores',
        'tipo_label' => 'Utilizadores',
        'periodo' => 'Mensal',
        'data_geracao' => '2026-02-28 23:59:00',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tamanho' => '2.4 MB',
        'formato' => 'PDF',
        'gerado_por' => 'Sistema',
        'visualizacoes' => 45,
        'downloads' => 12,
        'parametros' => ['Período: 01/02/2026 a 28/02/2026', 'Total: 156 utilizadores']
    ],
    [
        'id' => 2,
        'titulo' => 'Relatório Financeiro - Janeiro 2026',
        'descricao' => 'Resumo financeiro com receitas, despesas e fluxo de caixa do mês de janeiro.',
        'tipo' => 'financeiro',
        'tipo_label' => 'Financeiro',
        'periodo' => 'Mensal',
        'data_geracao' => '2026-01-31 23:59:00',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tamanho' => '3.8 MB',
        'formato' => 'PDF',
        'gerado_por' => 'Administrador Master',
        'visualizacoes' => 38,
        'downloads' => 9,
        'parametros' => ['Período: 01/01/2026 a 31/01/2026', 'Receita: Kz 12.800.000']
    ],
    [
        'id' => 3,
        'titulo' => 'Relatório de Projetos - 2025',
        'descricao' => 'Relatório anual de projetos, com indicadores de desempenho e conclusão.',
        'tipo' => 'projetos',
        'tipo_label' => 'Projetos',
        'periodo' => 'Anual',
        'data_geracao' => '2025-12-31 23:59:00',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tamanho' => '5.6 MB',
        'formato' => 'PDF',
        'gerado_por' => 'Sistema',
        'visualizacoes' => 67,
        'downloads' => 23,
        'parametros' => ['Período: 01/01/2025 a 31/12/2025', 'Total: 189 projetos']
    ],
    [
        'id' => 4,
        'titulo' => 'Relatório de Suporte - Fevereiro 2026',
        'descricao' => 'Análise de tickets de suporte, tempo de resposta e satisfação dos utilizadores.',
        'tipo' => 'suporte',
        'tipo_label' => 'Suporte',
        'periodo' => 'Mensal',
        'data_geracao' => '2026-02-28 23:59:00',
        'status' => 'gerando',
        'status_label' => 'Gerando...',
        'tamanho' => '-',
        'formato' => 'PDF',
        'gerado_por' => 'Sistema',
        'visualizacoes' => 0,
        'downloads' => 0,
        'parametros' => ['Período: 01/02/2026 a 28/02/2026', 'Tickets: 15']
    ],
    [
        'id' => 5,
        'titulo' => 'Relatório de Vendas - Trimestre 4 2025',
        'descricao' => 'Relatório de vendas e novas assinaturas do quarto trimestre de 2025.',
        'tipo' => 'vendas',
        'tipo_label' => 'Vendas',
        'periodo' => 'Trimestral',
        'data_geracao' => '2025-12-31 23:59:00',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tamanho' => '4.2 MB',
        'formato' => 'PDF',
        'gerado_por' => 'Administrador Master',
        'visualizacoes' => 29,
        'downloads' => 8,
        'parametros' => ['Período: 01/10/2025 a 31/12/2025', 'Total: 23 novas assinaturas']
    ],
    [
        'id' => 6,
        'titulo' => 'Relatório de Utilizadores - Ano 2025',
        'descricao' => 'Relatório anual de utilizadores com análise de crescimento e engajamento.',
        'tipo' => 'utilizadores',
        'tipo_label' => 'Utilizadores',
        'periodo' => 'Anual',
        'data_geracao' => '2025-12-31 23:59:00',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tamanho' => '6.1 MB',
        'formato' => 'Excel',
        'gerado_por' => 'Sistema',
        'visualizacoes' => 52,
        'downloads' => 18,
        'parametros' => ['Período: 01/01/2025 a 31/12/2025', 'Crescimento: 28%']
    ],
    [
        'id' => 7,
        'titulo' => 'Relatório Financeiro - Dezembro 2025',
        'descricao' => 'Resumo financeiro de dezembro de 2025, com análise de receitas e despesas.',
        'tipo' => 'financeiro',
        'tipo_label' => 'Financeiro',
        'periodo' => 'Mensal',
        'data_geracao' => '2025-12-31 23:59:00',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tamanho' => '3.2 MB',
        'formato' => 'PDF',
        'gerado_por' => 'Sistema',
        'visualizacoes' => 31,
        'downloads' => 7,
        'parametros' => ['Período: 01/12/2025 a 31/12/2025', 'Receita: Kz 10.450.000']
    ],
    [
        'id' => 8,
        'titulo' => 'Relatório de Projetos - Fevereiro 2026',
        'descricao' => 'Relatório mensal de projetos com indicadores de desempenho.',
        'tipo' => 'projetos',
        'tipo_label' => 'Projetos',
        'periodo' => 'Mensal',
        'data_geracao' => '2026-02-28 23:59:00',
        'status' => 'falha',
        'status_label' => 'Falha',
        'tamanho' => '-',
        'formato' => 'PDF',
        'gerado_por' => 'Sistema',
        'visualizacoes' => 0,
        'downloads' => 0,
        'parametros' => ['Período: 01/02/2026 a 28/02/2026', 'Erro: timeout na geração']
    ],
    [
        'id' => 9,
        'titulo' => 'Relatório de Suporte - Janeiro 2026',
        'descricao' => 'Análise de tickets de suporte de janeiro de 2026.',
        'tipo' => 'suporte',
        'tipo_label' => 'Suporte',
        'periodo' => 'Mensal',
        'data_geracao' => '2026-01-31 23:59:00',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tamanho' => '2.8 MB',
        'formato' => 'PDF',
        'gerado_por' => 'Administrador Master',
        'visualizacoes' => 19,
        'downloads' => 5,
        'parametros' => ['Período: 01/01/2026 a 31/01/2026', 'Tickets: 18']
    ],
    [
        'id' => 10,
        'titulo' => 'Relatório de Vendas - Fevereiro 2026',
        'descricao' => 'Relatório de vendas e assinaturas do mês de fevereiro.',
        'tipo' => 'vendas',
        'tipo_label' => 'Vendas',
        'periodo' => 'Mensal',
        'data_geracao' => '2026-02-28 23:59:00',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'tamanho' => '-',
        'formato' => 'PDF',
        'gerado_por' => 'Sistema',
        'visualizacoes' => 0,
        'downloads' => 0,
        'parametros' => ['Período: 01/02/2026 a 28/02/2026', 'Aguardando dados']
    ]
];

// Estatísticas
$total_relatorios = count($relatorios);
$total_concluidos = count(array_filter($relatorios, function($r) { return $r['status'] === 'concluido'; }));
$total_gerando = count(array_filter($relatorios, function($r) { return $r['status'] === 'gerando'; }));
$total_falhas = count(array_filter($relatorios, function($r) { return $r['status'] === 'falha'; }));
$total_pendentes = count(array_filter($relatorios, function($r) { return $r['status'] === 'pendente'; }));

// Tipos para filtro
$tipos = array_unique(array_column($relatorios, 'tipo_label'));
sort($tipos);

// Períodos para filtro
$periodos = array_unique(array_column($relatorios, 'periodo'));
sort($periodos);

// Status para filtro
$status_opcoes = [
    'concluido' => 'Concluído',
    'gerando' => 'Gerando',
    'falha' => 'Falha',
    'pendente' => 'Pendente'
];

function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i:s', strtotime($datetime));
}

function getStatusColor($status) {
    $cores = [
        'concluido' => '#00FFA3',
        'gerando' => '#00D2FF',
        'falha' => '#FF6B6B',
        'pendente' => '#FFD93D'
    ];
    return $cores[$status] ?? '#6B7A8F';
}

function getStatusIcon($status) {
    $icones = [
        'concluido' => 'fa-check-circle',
        'gerando' => 'fa-spinner fa-spin',
        'falha' => 'fa-exclamation-circle',
        'pendente' => 'fa-clock'
    ];
    return $icones[$status] ?? 'fa-circle';
}

function getTipoIcon($tipo) {
    $icones = [
        'utilizadores' => 'fa-users',
        'financeiro' => 'fa-coins',
        'projetos' => 'fa-project-diagram',
        'suporte' => 'fa-headset',
        'vendas' => 'fa-chart-line'
    ];
    return $icones[$tipo] ?? 'fa-file-alt';
}

function getTipoColor($tipo) {
    $cores = [
        'utilizadores' => '#6C2BD9',
        'financeiro' => '#00FFA3',
        'projetos' => '#00D2FF',
        'suporte' => '#FFD93D',
        'vendas' => '#FF6B6B'
    ];
    return $cores[$tipo] ?? '#6B7A8F';
}

function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6C2BD9&color=fff&size=80';
}

$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => false],
    ['icon' => 'fa-blog', 'label' => 'Blog', 'link' => 'blog.php', 'active' => false],
    ['icon' => 'fa-envelope', 'label' => 'Mensagens', 'link' => 'mensagens.php', 'active' => false],
    ['icon' => 'fa-ticket-alt', 'label' => 'Tickets', 'link' => 'suporte-tickets.php', 'active' => false],
    ['icon' => 'fa-history', 'label' => 'Logs', 'link' => 'logs-auditoria.php', 'active' => false],
    ['icon' => 'fa-database', 'label' => 'Backup', 'link' => 'backup.php', 'active' => false],
    ['icon' => 'fa-file-alt', 'label' => 'Relatórios', 'link' => 'relatorios-globais.php', 'active' => true],
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
    <div id="toast-container" class="toast-container"></div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <?php include "../../includes/admin/admin-sidebar.php" ?>

    <nav class="bottom-nav" id="bottomNav">
        <div class="nav-items">
            <?php foreach ($bottom_nav_items as $item): ?>
                <a href="<?php echo $item['link']; ?>"
                    class="nav-item <?php echo $item['active'] ? 'active' : ''; ?> <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'menu-toggle' : ''; ?>"
                    <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'id="bottomMenuToggle"' : ''; ?>
                    <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'onclick="toggleSidebarMobile(event)"' : ''; ?>>
                    <i class="fas <?php echo $item['icon']; ?>"></i>
                    <span><?php echo $item['label']; ?></span>
                    <?php if ($item['label'] === 'Relatórios'): ?>
                        <span class="badge badge-primary"><?php echo $total_relatorios; ?></span>
                    <?php endif; ?>
                    <?php if ($item['label'] === 'Menu'): ?>
                        <span class="badge" id="bottomNotifBadge"><?php echo $notificacoes_count; ?></span>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <main class="main-content">
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-file-alt icon"></i>
                    Relatórios Globais
                    <span class="badge badge-primary" style="font-size: 0.7rem; margin-left: 8px;"><?php echo $total_relatorios; ?> relatórios</span>
                </h1>
                <p class="breadcrumb"><a href="index.php">Dashboard</a> <span class="separator">/</span> <span>Relatórios</span></p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme"><i class="fas fa-sun theme-icon sun"></i><i class="fas fa-moon theme-icon moon"></i></button>
                               <?php include "../../includes/admin/notificacoes-admin.php" ?>

                <div class="header-actions">
                    <button class="btn btn-primary" onclick="abrirModal('modalNovoRelatorio')"><i class="fas fa-plus"></i> Novo Relatório</button>
                    <button class="btn btn-outline" onclick="agendarRelatorio()"><i class="fas fa-clock"></i> Agendar</button>
                </div>
            </div>
        </header>

        <section class="stats-grid animate-fade-up">
            <div class="stat-card"><div class="icon aurora"><i class="fas fa-file-alt"></i></div><div class="value"><?php echo $total_relatorios; ?></div><div class="label">Total de Relatórios</div><div class="trend up"><i class="fas fa-arrow-up"></i> 18.5%</div></div>
            <div class="stat-card"><div class="icon green"><i class="fas fa-check-circle"></i></div><div class="value"><?php echo $total_concluidos; ?></div><div class="label">Concluídos</div><div class="trend up"><i class="fas fa-arrow-up"></i> 12.3%</div></div>
            <div class="stat-card"><div class="icon blue"><i class="fas fa-spinner"></i></div><div class="value"><?php echo $total_gerando; ?></div><div class="label">Gerando</div><div class="trend down"><i class="fas fa-arrow-down"></i> 5.1%</div></div>
            <div class="stat-card"><div class="icon red"><i class="fas fa-exclamation-circle"></i></div><div class="value"><?php echo $total_falhas; ?></div><div class="label">Falhas</div><div class="trend down"><i class="fas fa-arrow-down"></i> 3.2%</div></div>
        </section>

        <div class="filter-bar-admin animate-fade-up">
            <div class="filter-group"><label><i class="fas fa-search"></i></label><input type="text" id="searchRelatorio" placeholder="Pesquisar relatório..." oninput="aplicarFiltros()"></div>
            <div class="filter-group"><label>Tipo</label><select id="filterTipo" onchange="aplicarFiltros()"><option value="">Todos</option><?php foreach ($tipos as $t): ?><option value="<?php echo $t; ?>"><?php echo $t; ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Status</label><select id="filterStatus" onchange="aplicarFiltros()"><option value="">Todos</option><?php foreach ($status_opcoes as $v => $l): ?><option value="<?php echo $v; ?>"><?php echo $l; ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Período</label><select id="filterPeriodo" onchange="aplicarFiltros()"><option value="">Todos</option><?php foreach ($periodos as $p): ?><option value="<?php echo $p; ?>"><?php echo $p; ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Data</label><input type="date" id="filterData" onchange="aplicarFiltros()"></div>
            <div class="filter-actions"><button class="btn btn-sm btn-primary" onclick="aplicarFiltros()"><i class="fas fa-filter"></i> Filtrar</button><button class="btn btn-sm btn-outline" onclick="limparFiltros()"><i class="fas fa-undo"></i> Limpar</button></div>
            <span class="resultados-info" id="resultadosInfo"><?php echo $total_relatorios; ?> resultados</span>
        </div>

        <div class="relatorios-container">
            <div class="relatorios-grid" id="relatoriosGrid">
                <?php foreach ($relatorios as $relatorio): ?>
                    <div class="relatorio-card <?php echo $relatorio['status']; ?> animate-fade-up"
                         data-id="<?php echo $relatorio['id']; ?>"
                         data-tipo="<?php echo $relatorio['tipo']; ?>"
                         data-status="<?php echo $relatorio['status']; ?>"
                         data-periodo="<?php echo $relatorio['periodo']; ?>"
                         data-data="<?php echo date('Y-m-d', strtotime($relatorio['data_geracao'])); ?>"
                         data-titulo="<?php echo strtolower($relatorio['titulo']); ?>"
                         onclick="verDetalheRelatorio(<?php echo $relatorio['id']; ?>)">
                        <div class="relatorio-header">
                            <div class="relatorio-icon" style="background: <?php echo getTipoColor($relatorio['tipo']); ?>20; color: <?php echo getTipoColor($relatorio['tipo']); ?>;">
                                <i class="fas <?php echo getTipoIcon($relatorio['tipo']); ?>"></i>
                            </div>
                            <div class="relatorio-info">
                                <h4><?php echo $relatorio['titulo']; ?></h4>
                                <div class="relatorio-meta">
                                    <span class="meta-item"><i class="fas fa-tag"></i> <?php echo $relatorio['tipo_label']; ?></span>
                                    <span class="meta-item"><i class="fas fa-calendar-alt"></i> <?php echo $relatorio['periodo']; ?></span>
                                    <span class="meta-item"><i class="fas fa-clock"></i> <?php echo formatDateTime($relatorio['data_geracao']); ?></span>
                                </div>
                            </div>
                            <div class="relatorio-status">
                                <span class="badge badge-status status-<?php echo $relatorio['status']; ?>">
                                    <i class="fas <?php echo getStatusIcon($relatorio['status']); ?>"></i>
                                    <?php echo $relatorio['status_label']; ?>
                                </span>
                            </div>
                        </div>

                        <div class="relatorio-body">
                            <p class="relatorio-descricao"><?php echo $relatorio['descricao']; ?></p>
                            <div class="relatorio-parametros">
                                <?php foreach ($relatorio['parametros'] as $param): ?>
                                    <span class="parametro-item"><i class="fas fa-check-circle" style="color: #00FFA3;"></i> <?php echo $param; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="relatorio-footer">
                            <div class="relatorio-stats">
                                <?php if ($relatorio['status'] === 'concluido'): ?>
                                    <span class="stat"><i class="fas fa-file"></i> <?php echo $relatorio['formato']; ?></span>
                                    <span class="stat"><i class="fas fa-weight-hanging"></i> <?php echo $relatorio['tamanho']; ?></span>
                                    <span class="stat"><i class="fas fa-eye"></i> <?php echo $relatorio['visualizacoes']; ?></span>
                                    <span class="stat"><i class="fas fa-download"></i> <?php echo $relatorio['downloads']; ?></span>
                                <?php else: ?>
                                    <span class="stat text-muted"><i class="fas fa-hourglass-half"></i> Aguardando...</span>
                                <?php endif; ?>
                            </div>
                            <div class="relatorio-acoes">
                                <?php if ($relatorio['status'] === 'concluido'): ?>
                                    <a href="relatorio-visualizar.php?id=<?php echo $relatorio['id']; ?>" class="btn btn-sm btn-primary" title="Visualizar" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); baixarRelatorio(<?php echo $relatorio['id']; ?>)" title="Baixar">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); enviarRelatorio(<?php echo $relatorio['id']; ?>)" title="Enviar">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                <?php elseif ($relatorio['status'] === 'gerando'): ?>
                                    <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); cancelarGeracao(<?php echo $relatorio['id']; ?>)" title="Cancelar">
                                        <i class="fas fa-times"></i>
                                    </button>
                                <?php endif; ?>
                                <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); verDetalheRelatorio(<?php echo $relatorio['id']; ?>)" title="Detalhes">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="event.stopPropagation(); excluirRelatorio(<?php echo $relatorio['id']; ?>, '<?php echo addslashes($relatorio['titulo']); ?>')" title="Excluir">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="table-pagination" id="paginacaoRelatorios">
                <button class="page-btn prev" onclick="mudarPagina('prev')" disabled><i class="fas fa-chevron-left"></i></button>
                <span class="page-info">1 de 1</span>
                <button class="page-btn next" onclick="mudarPagina('next')" disabled><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </main>
</div>

<!-- MODAL DETALHE RELATÓRIO -->
<div class="modal" id="modalDetalheRelatorio">
    <div class="modal-overlay" onclick="fecharModal('modalDetalheRelatorio')"></div>
    <div class="modal-content" style="max-width: 550px;">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fas fa-file-alt"></i> Detalhes do Relatório</h3>
            <button class="modal-close" onclick="fecharModal('modalDetalheRelatorio')">&times;</button>
        </div>
        <div class="modal-body" id="detalheRelatorioBody"></div>
    </div>
</div>

<!-- MODAL NOVO RELATÓRIO -->
<div class="modal" id="modalNovoRelatorio">
    <div class="modal-overlay" onclick="fecharModal('modalNovoRelatorio')"></div>
    <div class="modal-content" style="max-width: 600px;">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fas fa-plus"></i> Novo Relatório</h3>
            <button class="modal-close" onclick="fecharModal('modalNovoRelatorio')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="formNovoRelatorio" onsubmit="criarRelatorio(event)">
                <div class="form-group">
                    <label class="form-label">Título <span class="required">*</span></label>
                    <input type="text" class="form-control" id="novoTitulo" placeholder="Título do relatório" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" id="novoDescricao" rows="2" placeholder="Descrição do relatório"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Tipo <span class="required">*</span></label>
                        <select class="form-control" id="novoTipo" required>
                            <option value="">Selecione...</option>
                            <option value="utilizadores">Utilizadores</option>
                            <option value="financeiro">Financeiro</option>
                            <option value="projetos">Projetos</option>
                            <option value="suporte">Suporte</option>
                            <option value="vendas">Vendas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Período <span class="required">*</span></label>
                        <select class="form-control" id="novoPeriodo" required>
                            <option value="">Selecione...</option>
                            <option value="Diário">Diário</option>
                            <option value="Semanal">Semanal</option>
                            <option value="Mensal">Mensal</option>
                            <option value="Trimestral">Trimestral</option>
                            <option value="Anual">Anual</option>
                            <option value="Personalizado">Personalizado</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Data Início</label>
                        <input type="date" class="form-control" id="novoDataInicio">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Data Fim</label>
                        <input type="date" class="form-control" id="novoDataFim">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Formato</label>
                    <select class="form-control" id="novoFormato">
                        <option value="PDF">PDF</option>
                        <option value="Excel">Excel</option>
                        <option value="CSV">CSV</option>
                        <option value="JSON">JSON</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalNovoRelatorio')">Cancelar</button>
            <button class="btn btn-primary" onclick="document.getElementById('formNovoRelatorio').submit()">
                <i class="fas fa-save"></i> Gerar Relatório
            </button>
        </div>
    </div>
</div>

<!-- MODAL ENVIAR RELATÓRIO -->
<div class="modal" id="modalEnviarRelatorio">
    <div class="modal-overlay" onclick="fecharModal('modalEnviarRelatorio')"></div>
    <div class="modal-content" style="max-width: 500px;">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fas fa-paper-plane"></i> Enviar Relatório</h3>
            <button class="modal-close" onclick="fecharModal('modalEnviarRelatorio')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="formEnviarRelatorio" onsubmit="enviarRelatorioSubmit(event)">
                <input type="hidden" id="enviarRelatorioId" value="">
                <div class="form-group">
                    <label class="form-label">Para <span class="required">*</span></label>
                    <input type="email" class="form-control" id="enviarEmail" placeholder="email@destinatario.com" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Assunto</label>
                    <input type="text" class="form-control" id="enviarAssunto" placeholder="Assunto do email">
                </div>
                <div class="form-group">
                    <label class="form-label">Mensagem</label>
                    <textarea class="form-control" id="enviarMensagem" rows="3" placeholder="Mensagem para o destinatário..."></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalEnviarRelatorio')">Cancelar</button>
            <button class="btn btn-primary" onclick="document.getElementById('formEnviarRelatorio').submit()">
                <i class="fas fa-paper-plane"></i> Enviar
            </button>
        </div>
    </div>
</div>

<!-- MODAL CONFIRMAÇÃO -->
<div class="modal" id="modalConfirmacao">
    <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
    <div class="modal-content" style="max-width: 420px;">
        <div class="modal-header"><h3 class="modal-title" id="confirmacaoTitulo"><i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar</h3><button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button></div>
        <div class="modal-body" id="confirmacaoCorpo"><p>Tem certeza?</p></div>
        <div class="modal-footer"><button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button><button class="btn btn-danger" id="confirmacaoBtn" onclick="executarConfirmacao()"><i class="fas fa-check"></i> Confirmar</button></div>
    </div>
</div>

<script src="../assets/js/main.js"></script>
<script>
const relatoriosData = <?php echo json_encode($relatorios); ?>;

// ===== TOGGLE SIDEBAR =====
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
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal.active').forEach(modal => fecharModal(modal.id));
        }
    });
    const total = document.querySelectorAll('.relatorio-card').length;
    if (total > 0) { totalItensVisiveis = total; atualizarPaginacao(total); }
    
    // Notificações
    const btnNotif = document.getElementById('btnNotificacoes');
    const dropdown = document.getElementById('notificacoesDropdown');
    if (btnNotif && dropdown) {
        btnNotif.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('active');
            if (dropdown.classList.contains('active')) carregarNotificacoes();
        });
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) dropdown.classList.remove('active');
        });
    }
    // Perfil
    const btnPerfil = document.getElementById('btnPerfil');
    const perfilDrop = document.getElementById('perfilDropdown');
    if (btnPerfil && perfilDrop) {
        btnPerfil.addEventListener('click', function(e) {
            e.stopPropagation();
            perfilDrop.classList.toggle('active');
        });
        document.addEventListener('click', function(e) {
            if (!perfilDrop.contains(e.target) && !btnPerfil.contains(e.target)) perfilDrop.classList.remove('active');
        });
    }
    // Theme
    const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
    document.getElementById('btnTheme')?.addEventListener('click', function() {
        const current = document.documentElement.getAttribute('data-theme');
        const newTheme = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('geonnexus-theme', newTheme);
        mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
    });
    // Search debounce
    const searchInput = document.getElementById('searchRelatorio');
    if (searchInput) {
        let timeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(aplicarFiltros, 300);
        });
    }
});

function toggleSidebarMobile(event) {
    if (event) { event.preventDefault(); event.stopPropagation(); }
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    if (sidebar) {
        sidebar.classList.toggle('open');
        if (overlay) overlay.classList.toggle('active');
        const menuBtn = document.getElementById('bottomMenuToggle');
        if (menuBtn) {
            menuBtn.querySelector('i').className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
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
            if (menuBtn) menuBtn.querySelector('i').className = 'fas fa-bars';
        }
    }
});

// ===== NOTIFICAÇÕES =====
function carregarNotificacoes() {
    const list = document.getElementById('notifList');
    if (!list) return;
    let html = '';
    mockNotificacoes.forEach(n => {
        html += `<div class="notificacao-item ${n.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${n.id})">
            <div class="notif-icon ${n.icon_class}"><i class="fas ${n.icon}"></i></div>
            <div class="notif-conteudo"><p>${n.mensagem}</p><span class="notif-tempo">${n.tempo}</span></div>
            ${!n.lida ? '<span class="notif-dot"></span>' : ''}
        </div>`;
    });
    list.innerHTML = html || `<div class="notificacao-vazia"><i class="fas fa-bell-slash"></i><p>Nenhuma notificação</p></div>`;
}

function marcarNotificacaoLida(id) {
    const notif = mockNotificacoes.find(n => n.id === id);
    if (notif) { notif.lida = true; atualizarBadgeNotif(); carregarNotificacoes(); mostrarToast('Notificação marcada como lida', 'info'); }
}

function marcarTodasLidas() {
    mockNotificacoes.forEach(n => n.lida = true);
    atualizarBadgeNotif(); carregarNotificacoes(); mostrarToast('Todas marcadas como lidas', 'success'); closeNotifications();
}

function atualizarBadgeNotif() {
    const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
    const badge = document.getElementById('notifBadge');
    const bottom = document.getElementById('bottomNotifBadge');
    if (badge) { badge.textContent = naoLidas; badge.style.display = naoLidas > 0 ? 'flex' : 'none'; }
    if (bottom) { bottom.textContent = naoLidas; bottom.style.display = naoLidas > 0 ? 'flex' : 'none'; }
}

function closeNotifications() { document.getElementById('notificacoesDropdown')?.classList.remove('active'); }

// ===== TOAST =====
function mostrarToast(mensagem, tipo = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;
    const icons = { success: 'fa-check-circle', error: 'fa-exclamation-circle', warning: 'fa-exclamation-triangle', info: 'fa-info-circle' };
    const colors = { success: '#00FFA3', error: '#FF6B6B', warning: '#F59E0B', info: '#00D2FF' };
    const toast = document.createElement('div');
    toast.className = 'toast toast-' + tipo;
    toast.innerHTML = `<div class="toast-content"><i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i><span>${mensagem}</span></div><button class="toast-close" onclick="this.parentElement.remove()">&times;</button>`;
    container.appendChild(toast);
    requestAnimationFrame(() => { toast.style.transform = 'translateX(0)'; toast.style.opacity = '1'; });
    setTimeout(() => {
        if (toast.parentElement) {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }, 4000);
}

// ===== FILTROS E PAGINAÇÃO =====
let paginaAtual = 1, itensPorPagina = 6, totalItensVisiveis = 0;

function aplicarFiltros() {
    const search = document.getElementById('searchRelatorio').value.toLowerCase().trim();
    const tipo = document.getElementById('filterTipo').value;
    const status = document.getElementById('filterStatus').value;
    const periodo = document.getElementById('filterPeriodo').value;
    const data = document.getElementById('filterData').value;
    const cards = document.querySelectorAll('.relatorio-card');
    let visiveis = 0;
    cards.forEach(card => {
        const titulo = card.dataset.titulo || '';
        const cardTipo = card.dataset.tipo || '';
        const cardStatus = card.dataset.status || '';
        const cardPeriodo = card.dataset.periodo || '';
        const cardData = card.dataset.data || '';
        let show = true;
        if (search) show = titulo.includes(search);
        if (show && tipo) show = cardTipo === tipo;
        if (show && status) show = cardStatus === status;
        if (show && periodo) show = cardPeriodo === periodo;
        if (show && data) show = cardData === data;
        card.style.display = show ? '' : 'none';
        if (show) visiveis++;
    });
    totalItensVisiveis = visiveis;
    document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
    paginaAtual = 1;
    if (totalItensVisiveis > 0) { atualizarPaginacao(totalItensVisiveis); } 
    else {
        document.getElementById('paginacaoRelatorios').style.display = 'none';
        document.querySelector('.relatorios-grid').innerHTML = `<div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;"><div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);"><i class="fas fa-file-alt"></i></div><h4 style="margin-top: 16px; color: var(--text-primary);">Nenhum relatório encontrado</h4><p style="color: var(--text-muted); margin-top: 8px;">Tente ajustar os filtros.</p></div>`;
    }
}

function limparFiltros() {
    document.getElementById('searchRelatorio').value = '';
    document.getElementById('filterTipo').value = '';
    document.getElementById('filterStatus').value = '';
    document.getElementById('filterPeriodo').value = '';
    document.getElementById('filterData').value = '';
    document.querySelectorAll('.relatorio-card').forEach(card => card.style.display = '');
    totalItensVisiveis = document.querySelectorAll('.relatorio-card').length;
    document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
    if (document.querySelector('.relatorios-grid .empty-state-admin')) location.reload();
    paginaAtual = 1;
    if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
}

function atualizarPaginacao(total) {
    const totalPaginas = Math.ceil(total / itensPorPagina);
    const container = document.getElementById('paginacaoRelatorios');
    if (!container) return;
    const prevBtn = container.querySelector('.prev');
    const nextBtn = container.querySelector('.next');
    const info = container.querySelector('.page-info');
    container.querySelectorAll('.page-btn:not(.prev):not(.next)').forEach(b => b.remove());
    if (totalPaginas <= 1) { container.style.display = 'none'; mostrarPagina(1); return; }
    container.style.display = 'flex';
    const maxVisible = 5;
    let startPage = Math.max(1, paginaAtual - 2);
    let endPage = Math.min(totalPaginas, startPage + maxVisible - 1);
    if (endPage - startPage < maxVisible - 1) startPage = Math.max(1, endPage - maxVisible + 1);
    if (startPage > 1) {
        const firstBtn = document.createElement('button');
        firstBtn.className = 'page-btn'; firstBtn.textContent = '1';
        firstBtn.onclick = function() { irParaPagina(1); };
        container.insertBefore(firstBtn, info);
        if (startPage > 2) { const dots = document.createElement('span'); dots.className = 'page-dots'; dots.textContent = '…'; container.insertBefore(dots, info); }
    }
    for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement('button');
        btn.className = 'page-btn' + (i === paginaAtual ? ' active' : '');
        btn.textContent = i;
        btn.onclick = function() { irParaPagina(i); };
        container.insertBefore(btn, info);
    }
    if (endPage < totalPaginas) {
        if (endPage < totalPaginas - 1) { const dots = document.createElement('span'); dots.className = 'page-dots'; dots.textContent = '…'; container.insertBefore(dots, info); }
        const lastBtn = document.createElement('button');
        lastBtn.className = 'page-btn'; lastBtn.textContent = totalPaginas;
        lastBtn.onclick = function() { irParaPagina(totalPaginas); };
        container.insertBefore(lastBtn, info);
    }
    prevBtn.disabled = paginaAtual <= 1;
    nextBtn.disabled = paginaAtual >= totalPaginas;
    info.textContent = `${paginaAtual} de ${totalPaginas}`;
    mostrarPagina(paginaAtual);
}

function mostrarPagina(page) {
    const cards = document.querySelectorAll('.relatorio-card:not([style*="display: none"])');
    const start = (page - 1) * itensPorPagina;
    const end = start + itensPorPagina;
    document.querySelectorAll('.relatorio-card').forEach(card => { if (card.style.display !== 'none') card.style.display = 'none'; });
    cards.forEach((card, index) => { if (index >= start && index < end) card.style.display = ''; });
}

function irParaPagina(page) {
    paginaAtual = page;
    if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
    document.querySelector('.relatorios-container')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function mudarPagina(direcao) {
    const totalPaginas = Math.ceil(totalItensVisiveis / itensPorPagina);
    if (direcao === 'prev' && paginaAtual > 1) irParaPagina(paginaAtual - 1);
    else if (direcao === 'next' && paginaAtual < totalPaginas) irParaPagina(paginaAtual + 1);
}

// ===== VER DETALHE RELATÓRIO =====
function verDetalheRelatorio(id) {
    const relatorio = relatoriosData.find(r => r.id === id);
    if (!relatorio) return;
    const body = document.getElementById('detalheRelatorioBody');
    body.innerHTML = `
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-file"></i> Título</span>
            <span class="relatorio-detalhe-value">${relatorio.titulo}</span>
        </div>
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-align-left"></i> Descrição</span>
            <span class="relatorio-detalhe-value">${relatorio.descricao}</span>
        </div>
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-tag"></i> Tipo</span>
            <span class="relatorio-detalhe-value"><span class="badge" style="background: ${getTipoColor(relatorio.tipo)}20; color: ${getTipoColor(relatorio.tipo)}; border: 1px solid ${getTipoColor(relatorio.tipo)};"><i class="fas ${getTipoIcon(relatorio.tipo)}"></i> ${relatorio.tipo_label}</span></span>
        </div>
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-calendar-alt"></i> Período</span>
            <span class="relatorio-detalhe-value">${relatorio.periodo}</span>
        </div>
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-clock"></i> Data de Geração</span>
            <span class="relatorio-detalhe-value">${formatDateTime(relatorio.data_geracao)}</span>
        </div>
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-info-circle"></i> Status</span>
            <span class="relatorio-detalhe-value"><span class="badge badge-status status-${relatorio.status}"><i class="fas ${getStatusIcon(relatorio.status)}"></i> ${relatorio.status_label}</span></span>
        </div>
        ${relatorio.status === 'concluido' ? `
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-file-pdf"></i> Formato</span>
            <span class="relatorio-detalhe-value">${relatorio.formato}</span>
        </div>
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-weight-hanging"></i> Tamanho</span>
            <span class="relatorio-detalhe-value">${relatorio.tamanho}</span>
        </div>
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-eye"></i> Visualizações</span>
            <span class="relatorio-detalhe-value">${relatorio.visualizacoes}</span>
        </div>
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-download"></i> Downloads</span>
            <span class="relatorio-detalhe-value">${relatorio.downloads}</span>
        </div>
        ` : ''}
        <div class="relatorio-detalhe-item">
            <span class="relatorio-detalhe-label"><i class="fas fa-user"></i> Gerado por</span>
            <span class="relatorio-detalhe-value">${relatorio.gerado_por}</span>
        </div>
        <div class="relatorio-detalhe-item" style="flex-direction: column; align-items: flex-start; gap: 4px;">
            <span class="relatorio-detalhe-label" style="width: 100%;"><i class="fas fa-list-ul"></i> Parâmetros</span>
            <span class="relatorio-detalhe-value" style="text-align: left; width: 100%; font-size: var(--text-sm); color: var(--text-muted);">${relatorio.parametros.join('<br>')}</span>
        </div>
    `;
    document.getElementById('modalDetalheRelatorio').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function getTipoIcon(tipo) {
    const icones = {
        'utilizadores': 'fa-users',
        'financeiro': 'fa-coins',
        'projetos': 'fa-project-diagram',
        'suporte': 'fa-headset',
        'vendas': 'fa-chart-line'
    };
    return icones[tipo] || 'fa-file-alt';
}

function getTipoColor(tipo) {
    const cores = {
        'utilizadores': '#6C2BD9',
        'financeiro': '#00FFA3',
        'projetos': '#00D2FF',
        'suporte': '#FFD93D',
        'vendas': '#FF6B6B'
    };
    return cores[$tipo] ?? '#6B7A8F';
}

function getStatusColor(status) {
    const cores = {
        'concluido': '#00FFA3',
        'gerando': '#00D2FF',
        'falha': '#FF6B6B',
        'pendente': '#FFD93D'
    };
    return cores[$status] ?? '#6B7A8F';
}

function getStatusIcon(status) {
    const icones = {
        'concluido': 'fa-check-circle',
        'gerando': 'fa-spinner fa-spin',
        'falha': 'fa-exclamation-circle',
        'pendente': 'fa-clock'
    };
    return icones[$status] ?? 'fa-circle';
}

function formatDateTime(dt) {
    if (!dt) return 'N/A';
    const d = new Date(dt.replace(' ', 'T'));
    return String(d.getDate()).padStart(2,'0') + '/' + String(d.getMonth()+1).padStart(2,'0') + '/' + d.getFullYear() + ' ' + String(d.getHours()).padStart(2,'0') + ':' + String(d.getMinutes()).padStart(2,'0') + ':' + String(d.getSeconds()).padStart(2,'0');
}

function getAvatarUrl(name) {
    return 'https://ui-avatars.com/api/?name=' + encodeURIComponent(name) + '&background=6C2BD9&color=fff&size=80';
}

// ===== AÇÕES DOS RELATÓRIOS =====
let acaoConfirmacao = null;

function mostrarConfirmacao(titulo, mensagem, callback) {
    document.getElementById('confirmacaoTitulo').innerHTML = `<i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> ${titulo}`;
    document.getElementById('confirmacaoCorpo').innerHTML = `<p>${mensagem}</p>`;
    document.getElementById('confirmacaoBtn').onclick = callback;
    document.getElementById('modalConfirmacao').classList.add('active');
}

function executarConfirmacao() {
    if (typeof acaoConfirmacao === 'function') { acaoConfirmacao(); acaoConfirmacao = null; }
}

function baixarRelatorio(id) {
    const relatorio = relatoriosData.find(r => r.id === id);
    if (!relatorio) return;
    mostrarToast(`A baixar relatório: ${relatorio.titulo}`, 'info');
    setTimeout(() => {
        mostrarToast('Download iniciado!', 'success');
    }, 1500);
}

function enviarRelatorio(id) {
    const relatorio = relatoriosData.find(r => r.id === id);
    if (!relatorio) return;
    document.getElementById('enviarRelatorioId').value = id;
    document.getElementById('enviarEmail').value = '';
    document.getElementById('enviarAssunto').value = 'Relatório: ' + relatorio.titulo;
    document.getElementById('enviarMensagem').value = 'Olá,\n\nSegue em anexo o relatório "' + relatorio.titulo + '".\n\nAtenciosamente,\nEquipe GeoNexus';
    document.getElementById('modalEnviarRelatorio').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function enviarRelatorioSubmit(event) {
    event.preventDefault();
    const email = document.getElementById('enviarEmail').value;
    const assunto = document.getElementById('enviarAssunto').value || 'Relatório GeoNexus';
    if (!email) {
        mostrarToast('Por favor, informe um email!', 'error');
        return;
    }
    mostrarToast(`Relatório enviado para ${email} com sucesso!`, 'success');
    fecharModal('modalEnviarRelatorio');
    document.getElementById('formEnviarRelatorio').reset();
}

function cancelarGeracao(id) {
    const relatorio = relatoriosData.find(r => r.id === id);
    if (!relatorio) return;
    mostrarConfirmacao('Cancelar Geração', `Cancelar geração do relatório <strong>"${relatorio.titulo}"</strong>?`, function() {
        relatorio.status = 'falha';
        relatorio.status_label = 'Falha';
        const card = document.querySelector(`.relatorio-card[data-id="${id}"]`);
        if (card) {
            card.dataset.status = 'falha';
            const badge = card.querySelector('.badge-status');
            if (badge) {
                badge.className = 'badge badge-status status-falha';
                badge.innerHTML = '<i class="fas fa-exclamation-circle"></i> Falha';
            }
            const footer = card.querySelector('.relatorio-footer');
            if (footer) {
                const stats = footer.querySelector('.relatorio-stats');
                if (stats) stats.innerHTML = `<span class="stat text-muted"><i class="fas fa-times-circle" style="color: #FF6B6B;"></i> Cancelado</span>`;
                const actions = footer.querySelector('.relatorio-acoes');
                if (actions) {
                    actions.innerHTML = `
                        <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); verDetalheRelatorio(${id})" title="Detalhes"><i class="fas fa-info-circle"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="event.stopPropagation(); excluirRelatorio(${id}, '${relatorio.titulo}')" title="Excluir"><i class="fas fa-trash"></i></button>
                    `;
                }
            }
        }
        mostrarToast('Geração cancelada!', 'warning');
        fecharModal('modalConfirmacao');
        fecharModal('modalDetalheRelatorio');
    });
}

function excluirRelatorio(id, titulo) {
    mostrarConfirmacao('Excluir Relatório', `Excluir relatório <strong>"${titulo}"</strong>?<br><small style="color: #EF4444;">Esta ação não pode ser desfeita!</small>`, function() {
        const card = document.querySelector(`.relatorio-card[data-id="${id}"]`);
        if (card) {
            card.style.transition = 'all 0.3s ease';
            card.style.opacity = '0';
            card.style.transform = 'scale(0.95)';
            setTimeout(() => {
                card.remove();
                const idx = relatoriosData.findIndex(r => r.id === id);
                if (idx > -1) relatoriosData.splice(idx, 1);
                const total = document.querySelectorAll('.relatorio-card').length;
                if (total > 0) { totalItensVisiveis = total; atualizarPaginacao(total); }
                else {
                    document.getElementById('paginacaoRelatorios').style.display = 'none';
                    document.querySelector('.relatorios-grid').innerHTML = `<div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;"><div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);"><i class="fas fa-file-alt"></i></div><h4 style="margin-top: 16px; color: var(--text-primary);">Nenhum relatório disponível</h4><p style="color: var(--text-muted); margin-top: 8px;">Clique em "Novo Relatório" para criar.</p></div>`;
                }
                mostrarToast('Relatório excluído com sucesso!', 'error');
            }, 300);
        }
        fecharModal('modalConfirmacao');
        fecharModal('modalDetalheRelatorio');
    });
}

function agendarRelatorio() {
    mostrarToast('Abrindo agendador de relatórios...', 'info');
    setTimeout(() => {
        mostrarToast('Agendador aberto!', 'success');
    }, 1500);
}

function criarRelatorio(event) {
    event.preventDefault();
    const titulo = document.getElementById('novoTitulo').value;
    const tipo = document.getElementById('novoTipo').value;
    const periodo = document.getElementById('novoPeriodo').value;
    if (!titulo || !tipo || !periodo) {
        mostrarToast('Preencha todos os campos obrigatórios!', 'error');
        return;
    }
    const novoId = relatoriosData.length > 0 ? Math.max(...relatoriosData.map(r => r.id)) + 1 : 1;
    const novoTipos = {
        'utilizadores': 'Utilizadores',
        'financeiro': 'Financeiro',
        'projetos': 'Projetos',
        'suporte': 'Suporte',
        'vendas': 'Vendas'
    };
    relatoriosData.push({
        id: novoId,
        titulo: titulo,
        descricao: document.getElementById('novoDescricao').value || 'Relatório gerado pelo administrador',
        tipo: tipo,
        tipo_label: novoTipos[tipo] || tipo,
        periodo: periodo,
        data_geracao: new Date().toISOString().replace('T', ' ').slice(0, 19),
        status: 'gerando',
        status_label: 'Gerando...',
        tamanho: '-',
        formato: document.getElementById('novoFormato').value,
        gerado_por: 'Administrador',
        visualizacoes: 0,
        downloads: 0,
        parametros: [`Período: ${periodo}`, 'Gerando...']
    });
    mostrarToast('Relatório em geração...', 'info');
    fecharModal('modalNovoRelatorio');
    setTimeout(() => {
        mostrarToast('Relatório gerado com sucesso!', 'success');
        location.reload();
    }, 3000);
}

// ===== MODAIS =====
function abrirModal(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden';
}

function fecharModal(id) {
    document.getElementById(id)?.classList.remove('active');
    document.body.style.overflow = '';
}
</script>

<style>
/* ===== RELATÓRIOS - CSS COMPLETO ===== */
.relatorios-container { background: var(--bg-card); border-radius: var(--radius-lg); padding: var(--space-lg); border: 1px solid var(--border-color); transition: var(--transition-smooth); }
.relatorios-container:hover { background: var(--bg-card-hover); box-shadow: var(--glass-shadow); }

.relatorios-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(380px, 1fr)); gap: var(--space-lg); }

/* ===== RELATÓRIO CARD ===== */
.relatorio-card { background: var(--bg-primary); border-radius: var(--radius-md); border: 1px solid var(--border-color); padding: var(--space-md); transition: var(--transition-smooth); display: flex; flex-direction: column; gap: var(--space-sm); cursor: pointer; }
.relatorio-card:hover { border-color: var(--color-aurora); transform: translateY(-4px); box-shadow: var(--glass-shadow); }
.relatorio-card.falha { border-left: 4px solid #FF6B6B; background: rgba(255,107,107,0.02); }
.relatorio-card.concluido { border-left: 4px solid #00FFA3; }
.relatorio-card.gerando { border-left: 4px solid #00D2FF; }
.relatorio-card.pendente { border-left: 4px solid #FFD93D; }

/* ===== HEADER ===== */
.relatorio-header { display: flex; align-items: center; gap: var(--space-md); }
.relatorio-icon { width: 44px; height: 44px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
.relatorio-info { flex: 1; min-width: 0; }
.relatorio-info h4 { font-family: var(--font-title); font-size: var(--text-sm); color: var(--text-primary); margin: 0; }
.relatorio-info .relatorio-meta { display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-top: 2px; }
.relatorio-info .relatorio-meta .meta-item { font-size: var(--text-xs); color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
.relatorio-info .relatorio-meta .meta-item i { font-size: 0.7rem; }
.relatorio-status { flex-shrink: 0; }

/* ===== BODY ===== */
.relatorio-body { flex: 1; }
.relatorio-descricao { font-size: var(--text-sm); color: var(--text-secondary); margin: 0 0 var(--space-sm) 0; line-height: 1.5; }
.relatorio-parametros { display: flex; flex-wrap: wrap; gap: var(--space-xs); }
.relatorio-parametros .parametro-item { font-size: var(--text-xs); color: var(--text-muted); background: var(--bg-input); padding: 2px 10px; border-radius: var(--radius-full); border: 1px solid var(--border-color); }
.relatorio-parametros .parametro-item i { margin-right: 4px; }

/* ===== FOOTER ===== */
.relatorio-footer { display: flex; justify-content: space-between; align-items: center; padding-top: var(--space-sm); border-top: 1px solid var(--border-color); flex-wrap: wrap; gap: var(--space-sm); }
.relatorio-footer .relatorio-stats { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.relatorio-footer .relatorio-stats .stat { font-size: var(--text-xs); color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
.relatorio-footer .relatorio-stats .stat i { font-size: 0.7rem; }
.relatorio-footer .relatorio-acoes { display: flex; gap: 4px; flex-wrap: wrap; }
.relatorio-footer .relatorio-acoes .btn { padding: 4px 6px; font-size: var(--text-xs); min-width: 28px; height: 28px; display: inline-flex; align-items: center; justify-content: center; }
.relatorio-footer .relatorio-acoes a.btn { text-decoration: none; }

/* ===== BADGES ===== */
.badge-status { font-size: 0.6rem; padding: 2px 8px; border-radius: var(--radius-full); display: inline-flex; align-items: center; gap: 4px; }
.badge-status.status-concluido { background: rgba(0,255,163,0.15); color: #00FFA3; }
.badge-status.status-gerando { background: rgba(0,210,255,0.15); color: #00D2FF; }
.badge-status.status-falha { background: rgba(255,107,107,0.15); color: #FF6B6B; }
.badge-status.status-pendente { background: rgba(255,217,61,0.15); color: #FFD93D; }

/* ===== FILTROS ===== */
.filter-bar-admin { display: flex; flex-wrap: wrap; gap: 12px; padding: 16px 20px; background: var(--bg-card); border-radius: var(--radius-lg); border: 1px solid var(--border-color); margin-bottom: var(--space-lg); align-items: center; }
.filter-bar-admin .filter-group { display: flex; align-items: center; gap: 8px; }
.filter-bar-admin .filter-group label { font-size: var(--text-xs); font-weight: 500; color: var(--text-muted); white-space: nowrap; }
.filter-bar-admin .filter-group label i { color: var(--color-aurora); }
.filter-bar-admin select, .filter-bar-admin input { background: var(--bg-input); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 6px 12px; font-size: var(--text-sm); color: var(--text-primary); font-family: var(--font-body); transition: var(--transition-smooth); min-width: 130px; }
.filter-bar-admin select:focus, .filter-bar-admin input:focus { outline: none; border-color: var(--color-aurora); box-shadow: 0 0 0 3px rgba(108,43,217,0.1); }
.filter-bar-admin select { cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 10px center; padding-right: 32px; }
.filter-bar-admin .filter-actions { display: flex; gap: 8px; margin-left: auto; }
.resultados-info { font-size: var(--text-sm); color: var(--text-muted); margin-left: auto; white-space: nowrap; }

/* ===== PAGINAÇÃO ===== */
.table-pagination { display: flex; justify-content: center; align-items: center; gap: 4px; padding: var(--space-md) 0 var(--space-sm); flex-wrap: wrap; margin-top: var(--space-md); border-top: 1px solid var(--border-color); }
.table-pagination .page-btn { min-width: 32px; height: 32px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); background: var(--bg-card); color: var(--text-secondary); cursor: pointer; transition: var(--transition-smooth); font-size: var(--text-sm); display: flex; align-items: center; justify-content: center; }
.table-pagination .page-btn:hover { border-color: var(--color-aurora); color: var(--color-aurora); background: rgba(108,43,217,0.04); }
.table-pagination .page-btn.active { background: var(--gradient-aurora); color: white; border-color: var(--color-aurora); }
.table-pagination .page-btn:disabled { opacity: 0.4; cursor: not-allowed; pointer-events: none; }
.table-pagination .page-info { font-size: var(--text-sm); color: var(--text-muted); padding: 0 12px; }
.table-pagination .page-dots { color: var(--text-muted); padding: 0 4px; font-size: var(--text-sm); }

/* ===== EMPTY STATE ===== */
.empty-state-admin { text-align: center; padding: 60px 24px; background: var(--bg-card); border-radius: var(--radius-lg); border: 1px solid var(--border-color); }
.empty-state-admin .empty-icon { font-size: 4rem; color: var(--text-muted); margin-bottom: var(--space-md); }
.empty-state-admin h4 { font-family: var(--font-title); font-size: var(--text-h3); color: var(--text-primary); margin-bottom: var(--space-sm); }
.empty-state-admin p { color: var(--text-muted); max-width: 400px; margin: 0 auto; }

/* ===== MODAL ===== */
.modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; align-items: center; justify-content: center; }
.modal.active { display: flex; }
.modal-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); animation: fadeIn 0.3s ease; cursor: pointer; }
.modal-content { position: relative; background: var(--bg-card); border-radius: var(--radius-lg); max-width: 600px; width: 90%; max-height: 90vh; overflow-y: auto; animation: slideUp 0.3s ease; box-shadow: var(--glass-shadow); border: 1px solid var(--border-color); z-index: 10; }
.modal-header { display: flex; justify-content: space-between; align-items: center; padding: 18px 24px; border-bottom: 1px solid var(--border-color); }
.modal-header .modal-title { font-family: var(--font-title); font-weight: 600; font-size: var(--text-h4); color: var(--text-primary); display: flex; align-items: center; gap: var(--space-sm); }
.modal-header .modal-title i { color: var(--color-aurora); }
.modal-close { background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--text-muted); transition: var(--transition-smooth); padding: 4px; line-height: 1; }
.modal-close:hover { color: var(--text-primary); transform: rotate(90deg); }
.modal-body { padding: 24px; }
.modal-footer { padding: 16px 24px; border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 12px; }
.modal-footer .btn { min-width: 100px; justify-content: center; }

#modalConfirmacao .modal-content { max-width: 420px; text-align: center; }
#modalConfirmacao .modal-body p { font-size: var(--text-body); color: var(--text-secondary); line-height: 1.6; }
#modalConfirmacao .modal-body p strong { color: var(--text-primary); }
#modalConfirmacao .modal-body p small { display: block; margin-top: 8px; font-size: var(--text-sm); color: #FF6B6B; }
#modalConfirmacao .modal-footer { justify-content: center; }

/* ===== DETALHE RELATÓRIO ===== */
.relatorio-detalhe-item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid var(--border-color); }
.relatorio-detalhe-item:last-child { border-bottom: none; }
.relatorio-detalhe-label { font-size: var(--text-sm); color: var(--text-muted); font-weight: 500; }
.relatorio-detalhe-value { font-size: var(--text-sm); color: var(--text-primary); text-align: right; }

/* ===== ENVIAR RELATÓRIO ===== */
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md); }
.form-group { margin-bottom: var(--space-md); }
.form-label { display: block; font-weight: 500; color: var(--text-secondary); margin-bottom: 4px; font-size: var(--text-sm); }
.form-label .required { color: #FF6B6B; margin-left: 2px; }
.form-control { width: 100%; background: var(--bg-input); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 8px 12px; font-size: var(--text-sm); color: var(--text-primary); font-family: var(--font-body); transition: var(--transition-smooth); }
.form-control:focus { outline: none; border-color: var(--color-aurora); box-shadow: 0 0 0 3px rgba(108,43,217,0.08); }
.form-control::placeholder { color: var(--text-muted); }
select.form-control { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 36px; cursor: pointer; }
textarea.form-control { resize: vertical; min-height: 80px; }

/* ===== RESPONSIVIDADE ===== */
@media (max-width: 1024px) {
    .filter-bar-admin { flex-direction: column; align-items: stretch; }
    .filter-bar-admin .filter-group { width: 100%; flex-direction: column; align-items: stretch; gap: 4px; }
    .filter-bar-admin select, .filter-bar-admin input { width: 100%; min-width: auto; }
    .filter-bar-admin .filter-actions { margin-left: 0; flex-direction: column; gap: 6px; }
    .filter-bar-admin .filter-actions .btn { width: 100%; justify-content: center; }
    .resultados-info { margin-left: 0; text-align: center; width: 100%; padding-top: 4px; border-top: 1px solid var(--border-color); }
    .relatorios-grid { grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); }
    .form-row { grid-template-columns: 1fr; }
}

@media (max-width: 768px) {
    .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
    .stat-card .value { font-size: var(--text-h3); }
    .relatorios-container { padding: var(--space-md); }
    .relatorios-grid { grid-template-columns: 1fr; gap: var(--space-md); }
    .relatorio-card { padding: var(--space-sm); }
    .relatorio-header { flex-wrap: wrap; }
    .relatorio-info h4 { font-size: var(--text-sm); }
    .relatorio-footer { flex-direction: column; align-items: stretch; }
    .relatorio-footer .relatorio-stats { justify-content: center; }
    .relatorio-footer .relatorio-acoes { justify-content: center; }
    .modal-content { width: 95%; margin: 10px; }
    .header-actions { width: 100%; justify-content: center; flex-wrap: wrap; }
    .relatorio-detalhe-item { flex-direction: column; align-items: flex-start; gap: 2px; }
    .relatorio-detalhe-value { text-align: left; }
    .form-row { grid-template-columns: 1fr; }
}

@media (max-width: 480px) {
    .stats-grid { grid-template-columns: 1fr; }
    .relatorios-container { padding: var(--space-sm); border-radius: var(--radius-md); }
    .filter-bar-admin { padding: 10px 12px; gap: 6px; }
    .table-pagination .page-btn { min-width: 24px; height: 24px; font-size: var(--text-xs); }
    .modal-header { padding: 14px 18px; }
    .modal-body { padding: 18px; }
    .modal-footer { flex-direction: column; padding: 12px 18px; }
    .modal-footer .btn { width: 100%; min-width: auto; }
    .relatorio-acoes .btn { padding: 2px 4px; font-size: 0.55rem; min-width: 24px; height: 24px; }
    .relatorio-icon { width: 36px; height: 36px; font-size: 1rem; }
}
</style>
</body>
</html>