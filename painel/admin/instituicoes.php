<?php
// painel/admin/instituicoes.php - Gestão de Instituições
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Gestão de Instituições';
$pagina_atual = 'instituicoes'; // <-- ESSENCIAL!

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Instituições
$instituicoes = [
    [
        'id' => 1,
        'nome' => 'Instituto Técnico de Luanda',
        'sigla' => 'ITL',
        'email' => 'contato@itl.edu.ao',
        'telefone' => '+244 923 456 200',
        'nif' => '5001234567',
        'endereco' => 'Av. Universitária, 123, Luanda, Angola',
        'responsavel' => 'Dr. Pedro Costa',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-10 09:15:00',
        'ultimo_acesso' => '2026-02-18 14:20:00',
        'plano' => 'Institucional Pro',
        'tipo' => 'Ensino Superior',
        'alunos' => 1250,
        'professores' => 85,
        'cursos' => 12,
        'departamentos' => 6,
        'avatar' => 'instituicao-1.png',
        'descricao' => 'Instituição de ensino superior especializada em engenharia, topografia e geotecnologias.',
        'website' => 'www.itl.edu.ao'
    ],
    [
        'id' => 2,
        'nome' => 'Centro de Formação Técnica da Huíla',
        'sigla' => 'CFTH',
        'email' => 'contato@cfth.edu.ao',
        'telefone' => '+244 923 456 201',
        'nif' => '5001234568',
        'endereco' => 'Rua da Formação, 456, Lubango, Angola',
        'responsavel' => 'Eng. Maria Santos',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-15 10:30:00',
        'ultimo_acesso' => '2026-02-18 11:45:00',
        'plano' => 'Institucional',
        'tipo' => 'Formação Técnica',
        'alunos' => 680,
        'professores' => 42,
        'cursos' => 8,
        'departamentos' => 4,
        'avatar' => 'instituicao-2.png',
        'descricao' => 'Centro de formação técnica com foco em topografia, construção civil e GIS.',
        'website' => 'www.cfth.edu.ao'
    ],
    [
        'id' => 3,
        'nome' => 'Universidade Católica de Angola',
        'sigla' => 'UCAN',
        'email' => 'contato@ucan.edu.ao',
        'telefone' => '+244 923 456 202',
        'nif' => '5001234569',
        'endereco' => 'Av. do Ensino, 789, Luanda, Angola',
        'responsavel' => 'Prof. João Mendes',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-01 16:45:00',
        'ultimo_acesso' => '-',
        'plano' => 'Básico',
        'tipo' => 'Universidade',
        'alunos' => 3200,
        'professores' => 180,
        'cursos' => 25,
        'departamentos' => 10,
        'avatar' => 'instituicao-3.png',
        'descricao' => 'Universidade com cursos nas áreas de engenharia, arquitetura e geociências.',
        'website' => 'www.ucan.edu.ao'
    ],
    [
        'id' => 4,
        'nome' => 'Instituto Politécnico do Bengo',
        'sigla' => 'IPB',
        'email' => 'contato@ipb.edu.ao',
        'telefone' => '+244 923 456 203',
        'nif' => '5001234570',
        'endereco' => 'Estrada do Politécnico, 321, Caxito, Angola',
        'responsavel' => 'Eng. Ana Oliveira',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-20 08:00:00',
        'ultimo_acesso' => '2026-02-17 16:30:00',
        'plano' => 'Institucional Pro',
        'tipo' => 'Ensino Técnico',
        'alunos' => 950,
        'professores' => 56,
        'cursos' => 10,
        'departamentos' => 5,
        'avatar' => 'instituicao-4.png',
        'descricao' => 'Instituto politécnico com cursos técnicos em topografia, mineração e geotecnologia.',
        'website' => 'www.ipb.edu.ao'
    ],
    [
        'id' => 5,
        'nome' => 'Centro de Investigação Científica da Huíla',
        'sigla' => 'CICH',
        'email' => 'contato@cich.edu.ao',
        'telefone' => '+244 923 456 204',
        'nif' => '5001234571',
        'endereco' => 'Rua da Ciência, 654, Lubango, Angola',
        'responsavel' => 'Dr. Carlos Ferreira',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'data_registo' => '2026-01-05 11:20:00',
        'ultimo_acesso' => '2026-01-25 09:10:00',
        'plano' => 'Básico',
        'tipo' => 'Investigação',
        'alunos' => 150,
        'professores' => 25,
        'cursos' => 3,
        'departamentos' => 2,
        'avatar' => 'instituicao-5.png',
        'descricao' => 'Centro de investigação científica em geociências e tecnologias geoespaciais.',
        'website' => 'www.cich.edu.ao'
    ],
    [
        'id' => 6,
        'nome' => 'Instituto Superior de Geociências',
        'sigla' => 'ISG',
        'email' => 'contato@isg.edu.ao',
        'telefone' => '+244 923 456 205',
        'nif' => '5001234572',
        'endereco' => 'Av. das Geociências, 789, Talatona, Angola',
        'responsavel' => 'Prof. Beatriz Lima',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-02-05 14:30:00',
        'ultimo_acesso' => '2026-02-18 09:00:00',
        'plano' => 'Institucional Pro',
        'tipo' => 'Ensino Superior',
        'alunos' => 780,
        'professores' => 48,
        'cursos' => 7,
        'departamentos' => 3,
        'avatar' => 'instituicao-6.png',
        'descricao' => 'Instituto superior especializado em geociências, topografia e geotecnologias.',
        'website' => 'www.isg.edu.ao'
    ],
    [
        'id' => 7,
        'nome' => 'Centro de Formação Profissional do Namibe',
        'sigla' => 'CFPN',
        'email' => 'contato@cfpn.edu.ao',
        'telefone' => '+244 923 456 206',
        'nif' => '5001234573',
        'endereco' => 'Rua da Formação, 456, Moçâmedes, Angola',
        'responsavel' => 'Eng. Sofia Martins',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-15 09:45:00',
        'ultimo_acesso' => '-',
        'plano' => 'Institucional',
        'tipo' => 'Formação Técnica',
        'alunos' => 420,
        'professores' => 28,
        'cursos' => 6,
        'departamentos' => 3,
        'avatar' => 'instituicao-7.png',
        'descricao' => 'Centro de formação profissional nas áreas de topografia, construção e agricultura.',
        'website' => 'www.cfpn.edu.ao'
    ],
    [
        'id' => 8,
        'nome' => 'Instituto de Ensino Técnico do Bié',
        'sigla' => 'IETB',
        'email' => 'contato@ietb.edu.ao',
        'telefone' => '+244 923 456 207',
        'nif' => '5001234574',
        'endereco' => 'Av. do Ensino, 789, Kuito, Angola',
        'responsavel' => 'Eng. Márcia Fernandes',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-02-20 10:00:00',
        'ultimo_acesso' => '2026-02-18 10:30:00',
        'plano' => 'Institucional',
        'tipo' => 'Ensino Técnico',
        'alunos' => 550,
        'professores' => 35,
        'cursos' => 8,
        'departamentos' => 4,
        'avatar' => 'instituicao-8.png',
        'descricao' => 'Instituto de ensino técnico com foco em engenharia, GIS e tecnologias geoespaciais.',
        'website' => 'www.ietb.edu.ao'
    ],
    [
        'id' => 9,
        'nome' => 'Centro de Investigação e Desenvolvimento da Huíla',
        'sigla' => 'CIDH',
        'email' => 'contato@cidh.edu.ao',
        'telefone' => '+244 923 456 208',
        'nif' => '5001234575',
        'endereco' => 'Estrada da Investigação, 123, Lubango, Angola',
        'responsavel' => 'Dr. Paulo Mendes',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-25 11:30:00',
        'ultimo_acesso' => '-',
        'plano' => 'Básico',
        'tipo' => 'Investigação',
        'alunos' => 80,
        'professores' => 15,
        'cursos' => 2,
        'departamentos' => 1,
        'avatar' => 'instituicao-9.png',
        'descricao' => 'Centro de investigação e desenvolvimento em tecnologias geoespaciais.',
        'website' => 'www.cidh.edu.ao'
    ],
    [
        'id' => 10,
        'nome' => 'Instituto Técnico da Huíla',
        'sigla' => 'ITH',
        'email' => 'contato@ith.edu.ao',
        'telefone' => '+244 923 456 209',
        'nif' => '5001234576',
        'endereco' => 'Rua Técnica, 321, Lubango, Angola',
        'responsavel' => 'Eng. Tânia Rodrigues',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'data_registo' => '2026-01-28 10:00:00',
        'ultimo_acesso' => '2026-02-10 08:00:00',
        'plano' => 'Básico',
        'tipo' => 'Ensino Técnico',
        'alunos' => 300,
        'professores' => 22,
        'cursos' => 5,
        'departamentos' => 2,
        'avatar' => 'instituicao-10.png',
        'descricao' => 'Instituto técnico com cursos em topografia, engenharia e tecnologias geoespaciais.',
        'website' => 'www.ith.edu.ao'
    ]
];

// Estatísticas
$total_instituicoes = count($instituicoes);
$total_ativas = count(array_filter($instituicoes, function($i) { return $i['status'] === 'ativo'; }));
$total_pendentes = count(array_filter($instituicoes, function($i) { return $i['status'] === 'pendente'; }));
$total_inativas = count(array_filter($instituicoes, function($i) { return $i['status'] === 'inativo'; }));

// Tipos para filtro
$tipos = array_unique(array_column($instituicoes, 'tipo'));
sort($tipos);

// Planos para filtro
$planos = array_unique(array_column($instituicoes, 'plano'));
sort($planos);

// Função para gerar avatar fallback
function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => true],
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
                        <?php if ($item['label'] === 'Instituições'): ?>
                            <span class="badge"><?php echo $total_instituicoes; ?></span>
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
                        <i class="fas fa-university icon"></i>
                        Gestão de Instituições
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Instituições</span>
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
                        <button class="btn btn-primary" data-modal="modalNovaInstituicao">
                            <i class="fas fa-plus"></i> Nova Instituição
                        </button>
                        <button class="btn btn-outline" onclick="exportarInstituicoes()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="value"><?php echo $total_instituicoes; ?></div>
                    <div class="label">Total de Instituições</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 12.5%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $total_ativas; ?></div>
                    <div class="label">Instituições Ativas</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 8.3%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $total_pendentes; ?></div>
                    <div class="label">Pendentes de Validação</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 5.2%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-user-slash"></i>
                    </div>
                    <div class="value"><?php echo $total_inativas; ?></div>
                    <div class="label">Instituições Inativas</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 2.1%
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filter-bar-admin animate-fade-up">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchInstituicao" placeholder="Pesquisar instituição..." oninput="aplicarFiltros()">
                </div>
                <div class="filter-group">
                    <label>Status</label>
                    <select id="filterStatus" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="ativo">Ativo</option>
                        <option value="pendente">Pendente</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Tipo</label>
                    <select id="filterTipo" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <?php foreach ($tipos as $tipo): ?>
                            <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Plano</label>
                    <select id="filterPlano" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <?php foreach ($planos as $plano): ?>
                            <option value="<?php echo $plano; ?>"><?php echo $plano; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-actions">
                    <button class="btn btn-sm btn-primary" onclick="aplicarFiltros()">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                    <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-undo"></i> Limpar
                    </button>
                </div>
                <span class="resultados-info" id="resultadosInfo"><?php echo $total_instituicoes; ?> resultados</span>
            </div>

            <!-- ===== LISTA DE INSTITUIÇÕES ===== -->
            <div class="instituicoes-container">
                <div class="instituicoes-grid" id="instituicoesGrid">
                    <?php foreach ($instituicoes as $instituicao): ?>
                        <div class="instituicao-card animate-fade-up" 
                             data-id="<?php echo $instituicao['id']; ?>"
                             data-status="<?php echo $instituicao['status']; ?>"
                             data-tipo="<?php echo $instituicao['tipo']; ?>"
                             data-plano="<?php echo $instituicao['plano']; ?>"
                             data-nome="<?php echo strtolower($instituicao['nome']); ?>"
                             data-email="<?php echo strtolower($instituicao['email']); ?>">
                            
                            <div class="instituicao-header">
                                <div class="instituicao-avatar">
                                    <img src="../../assets/images/<?php echo $instituicao['avatar']; ?>" 
                                         alt="<?php echo $instituicao['nome']; ?>"
                                         onerror="this.src='<?php echo getAvatarUrl($instituicao['nome']); ?>'">
                                    <span class="status-badge status-<?php echo $instituicao['status']; ?>">
                                        <span class="status-dot"></span>
                                        <?php echo $instituicao['status_label']; ?>
                                    </span>
                                </div>
                                <div class="instituicao-info">
                                    <h4><?php echo $instituicao['nome']; ?></h4>
                                    <div class="instituicao-tags">
                                        <span class="instituicao-tag tag-sigla">
                                            <i class="fas fa-tag"></i> <?php echo $instituicao['sigla']; ?>
                                        </span>
                                        <span class="instituicao-tag tag-tipo">
                                            <i class="fas fa-graduation-cap"></i> <?php echo $instituicao['tipo']; ?>
                                        </span>
                                        <span class="instituicao-tag tag-plano">
                                            <i class="fas fa-crown"></i> <?php echo $instituicao['plano']; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="instituicao-actions">
                                    <a href="instituicao-detalhe.php?id=<?php echo $instituicao['id']; ?>" class="btn btn-sm btn-outline" title="Ver Detalhes">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="instituicao-editar.php?id=<?php echo $instituicao['id']; ?>" class="btn btn-sm btn-outline" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if ($instituicao['status'] === 'pendente'): ?>
                                        <button class="btn btn-sm btn-success" title="Validar" onclick="validarInstituicao(<?php echo $instituicao['id']; ?>, '<?php echo $instituicao['nome']; ?>')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    <?php endif; ?>
                                    <?php if ($instituicao['status'] === 'ativo'): ?>
                                        <a href="instituicao-suspender.php?id=<?php echo $instituicao['id']; ?>" class="btn btn-sm btn-warning" title="Suspender">
                                            <i class="fas fa-pause"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($instituicao['status'] === 'inativo'): ?>
                                        <button class="btn btn-sm btn-success" title="Ativar" onclick="ativarInstituicao(<?php echo $instituicao['id']; ?>, '<?php echo $instituicao['nome']; ?>')">
                                            <i class="fas fa-play"></i>
                                        </button>
                                    <?php endif; ?>
                                    <a href="instituicao-excluir.php?id=<?php echo $instituicao['id']; ?>" class="btn btn-sm btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir permanentemente esta instituição?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="instituicao-body">
                                <p class="instituicao-descricao"><?php echo $instituicao['descricao']; ?></p>
                                <div class="instituicao-detalhes">
                                    <div class="detalhe-item">
                                        <i class="fas fa-envelope"></i>
                                        <span title="<?php echo $instituicao['email']; ?>"><?php echo $instituicao['email']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-phone"></i>
                                        <span><?php echo $instituicao['telefone']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-id-card"></i>
                                        <span>NIF: <?php echo $instituicao['nif']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span title="<?php echo $instituicao['endereco']; ?>"><?php echo $instituicao['endereco']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-user-tie"></i>
                                        <span><?php echo $instituicao['responsavel']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-globe"></i>
                                        <span><a href="http://<?php echo $instituicao['website']; ?>" target="_blank" style="color: var(--profile-institucional); text-decoration: none;"><?php echo $instituicao['website']; ?></a></span>
                                    </div>
                                </div>
                            </div>

                            <div class="instituicao-footer">
                                <div class="instituicao-stats">
                                    <span class="stat">
                                        <i class="fas fa-users"></i>
                                        <?php echo number_format($instituicao['alunos']); ?> alunos
                                    </span>
                                    <span class="stat">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        <?php echo $instituicao['professores']; ?> professores
                                    </span>
                                    <span class="stat">
                                        <i class="fas fa-book"></i>
                                        <?php echo $instituicao['cursos']; ?> cursos
                                    </span>
                                    <span class="stat">
                                        <i class="fas fa-building"></i>
                                        <?php echo $instituicao['departamentos']; ?> departamentos
                                    </span>
                                </div>
                                <div class="instituicao-footer-actions">
                                    <a href="instituicao-detalhe.php?id=<?php echo $instituicao['id']; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="table-pagination" id="paginacaoInstituicoes">
                    <button class="page-btn prev" onclick="mudarPagina('prev')" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="page-info">1 de 1</span>
                    <button class="page-btn next" onclick="mudarPagina('next')" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL NOVA INSTITUIÇÃO                    -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovaInstituicao">
        <div class="modal-overlay" onclick="fecharModal('modalNovaInstituicao')"></div>
        <div class="modal-content" style="max-width: 650px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-university"></i> Nova Instituição
                </h3>
                <button class="modal-close" onclick="fecharModal('modalNovaInstituicao')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovaInstituicao" onsubmit="criarInstituicao(event)">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nome da Instituição <span class="required">*</span></label>
                            <input type="text" class="form-control" id="nomeInstituicao" placeholder="Nome da instituição" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sigla <span class="required">*</span></label>
                            <input type="text" class="form-control" id="siglaInstituicao" placeholder="Ex: ITL" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" id="emailInstituicao" placeholder="contato@instituicao.edu" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefoneInstituicao" placeholder="+244 923 456 789">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">NIF</label>
                            <input type="text" class="form-control" id="nifInstituicao" placeholder="5001234567">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Website</label>
                            <input type="text" class="form-control" id="websiteInstituicao" placeholder="www.instituicao.edu">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Tipo <span class="required">*</span></label>
                            <select class="form-control" id="tipoInstituicao" required>
                                <option value="">Selecione...</option>
                                <?php foreach ($tipos as $tipo): ?>
                                    <option value="<?php echo $tipo; ?>"><?php echo $tipo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Plano</label>
                            <select class="form-control" id="planoInstituicao">
                                <option value="Básico">Básico</option>
                                <option value="Institucional">Institucional</option>
                                <option value="Institucional Pro">Institucional Pro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="enderecoInstituicao" placeholder="Rua, número, cidade">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Responsável</label>
                        <input type="text" class="form-control" id="responsavelInstituicao" placeholder="Nome do responsável">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricaoInstituicao" rows="2" placeholder="Breve descrição da instituição"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" id="statusInstituicao">
                            <option value="ativo">Ativo</option>
                            <option value="pendente">Pendente</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalNovaInstituicao')">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('formNovaInstituicao').submit()">
                    <i class="fas fa-save"></i> Criar Instituição
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL CONFIRMAÇÃO                          -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 420px;">
            <div class="modal-header">
                <h3 class="modal-title" id="confirmacaoTitulo">
                    <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar Ação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="confirmacaoCorpo">
                <p>Tem certeza que deseja realizar esta ação?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-danger" id="confirmacaoBtn" onclick="executarConfirmacao()">
                    <i class="fas fa-check"></i> Confirmar
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="../assets/js/main.js"></script>
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

            // Abrir modal via atributo data-modal
            document.querySelectorAll('[data-modal]').forEach(btn => {
                btn.addEventListener('click', function() {
                    const modalId = this.dataset.modal;
                    abrirModal(modalId);
                });
            });

            // Fechar modal com ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal.active').forEach(modal => {
                        fecharModal(modal.id);
                    });
                }
            });

            // Inicializar paginação
            const totalItens = document.querySelectorAll('.instituicao-card').length;
            if (totalItens > 0) {
                totalItensVisiveis = totalItens;
                atualizarPaginacao(totalItens);
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
        // FILTROS E PAGINAÇÃO
        // ==========================================

        let paginaAtual = 1;
        let itensPorPagina = 6;
        let totalItensVisiveis = 0;

        function aplicarFiltros() {
            const search = document.getElementById('searchInstituicao').value.toLowerCase().trim();
            const status = document.getElementById('filterStatus').value;
            const tipo = document.getElementById('filterTipo').value;
            const plano = document.getElementById('filterPlano').value;

            const cards = document.querySelectorAll('.instituicao-card');
            let visiveis = 0;

            cards.forEach(card => {
                const nome = card.dataset.nome || '';
                const email = card.dataset.email || '';
                const cardStatus = card.dataset.status || '';
                const cardTipo = card.dataset.tipo || '';
                const cardPlano = card.dataset.plano || '';

                let show = true;

                if (search) {
                    show = nome.includes(search) || email.includes(search);
                }

                if (show && status) {
                    show = cardStatus === status;
                }

                if (show && tipo) {
                    show = cardTipo === tipo;
                }

                if (show && plano) {
                    show = cardPlano === plano;
                }

                card.style.display = show ? '' : 'none';
                if (show) visiveis++;
            });

            totalItensVisiveis = visiveis;

            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            paginaAtual = 1;
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            } else {
                const container = document.getElementById('paginacaoInstituicoes');
                if (container) container.style.display = 'none';
                
                const grid = document.querySelector('.instituicoes-grid');
                if (grid) {
                    grid.innerHTML = `
                        <div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;">
                            <div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);">
                                <i class="fas fa-university"></i>
                            </div>
                            <h4 style="margin-top: 16px; color: var(--text-primary);">Nenhuma instituição encontrada</h4>
                            <p style="color: var(--text-muted); margin-top: 8px;">Tente ajustar os filtros para encontrar o que procura.</p>
                        </div>
                    `;
                }
            }
        }

        function limparFiltros() {
            document.getElementById('searchInstituicao').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterTipo').value = '';
            document.getElementById('filterPlano').value = '';

            document.querySelectorAll('.instituicao-card').forEach(card => {
                card.style.display = '';
            });

            totalItensVisiveis = document.querySelectorAll('.instituicao-card').length;
            
            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            const grid = document.querySelector('.instituicoes-grid');
            if (grid) {
                const empty = grid.querySelector('.empty-state-admin');
                if (empty) {
                    location.reload();
                }
            }

            paginaAtual = 1;
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            }
        }

        function mostrarPagina(page) {
            const cards = document.querySelectorAll('.instituicao-card:not([style*="display: none"])');
            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;

            document.querySelectorAll('.instituicao-card').forEach(card => {
                if (card.style.display !== 'none') {
                    card.style.display = 'none';
                }
            });

            cards.forEach((card, index) => {
                if (index >= start && index < end) {
                    card.style.display = '';
                }
            });
        }

        function atualizarPaginacao(total) {
            const totalPaginas = Math.ceil(total / itensPorPagina);
            const container = document.getElementById('paginacaoInstituicoes');

            if (!container) return;

            const prevBtn = container.querySelector('.prev');
            const nextBtn = container.querySelector('.next');
            const info = container.querySelector('.page-info');

            const pageBtns = container.querySelectorAll('.page-btn:not(.prev):not(.next)');
            pageBtns.forEach(btn => btn.remove());

            if (totalPaginas <= 1) {
                container.style.display = 'none';
                mostrarPagina(1);
                return;
            }

            container.style.display = 'flex';

            const maxVisible = 5;
            let startPage = Math.max(1, paginaAtual - 2);
            let endPage = Math.min(totalPaginas, startPage + maxVisible - 1);

            if (endPage - startPage < maxVisible - 1) {
                startPage = Math.max(1, endPage - maxVisible + 1);
            }

            if (startPage > 1) {
                const firstBtn = document.createElement('button');
                firstBtn.className = 'page-btn';
                firstBtn.textContent = '1';
                firstBtn.onclick = function() { irParaPagina(1); };
                container.insertBefore(firstBtn, info);

                if (startPage > 2) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    container.insertBefore(dots, info);
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                const btn = document.createElement('button');
                btn.className = 'page-btn' + (i === paginaAtual ? ' active' : '');
                btn.textContent = i;
                btn.onclick = function() { irParaPagina(i); };
                container.insertBefore(btn, info);
            }

            if (endPage < totalPaginas) {
                if (endPage < totalPaginas - 1) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    container.insertBefore(dots, info);
                }
                const lastBtn = document.createElement('button');
                lastBtn.className = 'page-btn';
                lastBtn.textContent = totalPaginas;
                lastBtn.onclick = function() { irParaPagina(totalPaginas); };
                container.insertBefore(lastBtn, info);
            }

            prevBtn.disabled = paginaAtual <= 1;
            nextBtn.disabled = paginaAtual >= totalPaginas;

            if (info) {
                info.textContent = `${paginaAtual} de ${totalPaginas}`;
            }

            mostrarPagina(paginaAtual);
        }

        function irParaPagina(page) {
            paginaAtual = page;
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            }
            const container = document.querySelector('.instituicoes-container');
            if (container) {
                container.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function mudarPagina(direcao) {
            const totalPaginas = Math.ceil(totalItensVisiveis / itensPorPagina);
            if (direcao === 'prev' && paginaAtual > 1) {
                irParaPagina(paginaAtual - 1);
            } else if (direcao === 'next' && paginaAtual < totalPaginas) {
                irParaPagina(paginaAtual + 1);
            }
        }

        // ==========================================
        // AÇÕES DAS INSTITUIÇÕES
        // ==========================================

        let acaoConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            document.getElementById('confirmacaoTitulo').innerHTML = `
                <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> ${titulo}
            `;
            document.getElementById('confirmacaoCorpo').innerHTML = `<p>${mensagem}</p>`;
            document.getElementById('confirmacaoBtn').onclick = callback;
            document.getElementById('modalConfirmacao').classList.add('active');
        }

        function executarConfirmacao() {
            if (typeof acaoConfirmacao === 'function') {
                acaoConfirmacao();
                acaoConfirmacao = null;
            }
        }

        function validarInstituicao(id, nome) {
            mostrarConfirmacao(
                'Validar Instituição',
                `Tem certeza que deseja validar a instituição <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Instituição ${nome} validada com sucesso!`, 'success');
                    const card = document.querySelector(`.instituicao-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'ativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-ativo';
                        badge.innerHTML = '<span class="status-dot"></span> Ativo';
                        const actions = card.querySelector('.instituicao-actions');
                        const validarBtn = actions.querySelector('.btn-success');
                        if (validarBtn) {
                            validarBtn.outerHTML = `
                                <a href="instituicao-suspender.php?id=${id}" class="btn btn-sm btn-warning" title="Suspender">
                                    <i class="fas fa-pause"></i>
                                </a>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function suspenderInstituicao(id, nome) {
            mostrarConfirmacao(
                'Suspender Instituição',
                `Tem certeza que deseja suspender a instituição <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Instituição ${nome} suspensa com sucesso!`, 'warning');
                    const card = document.querySelector(`.instituicao-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'inativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-inativo';
                        badge.innerHTML = '<span class="status-dot"></span> Inativo';
                        const actions = card.querySelector('.instituicao-actions');
                        const suspenderBtn = actions.querySelector('.btn-warning');
                        if (suspenderBtn) {
                            suspenderBtn.outerHTML = `
                                <button class="btn btn-sm btn-success" title="Ativar" onclick="ativarInstituicao(${id}, '${nome}')">
                                    <i class="fas fa-play"></i>
                                </button>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function ativarInstituicao(id, nome) {
            mostrarConfirmacao(
                'Ativar Instituição',
                `Tem certeza que deseja ativar a instituição <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Instituição ${nome} ativada com sucesso!`, 'success');
                    const card = document.querySelector(`.instituicao-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'ativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-ativo';
                        badge.innerHTML = '<span class="status-dot"></span> Ativo';
                        const actions = card.querySelector('.instituicao-actions');
                        const ativarBtn = actions.querySelector('.btn-success');
                        if (ativarBtn) {
                            ativarBtn.outerHTML = `
                                <a href="instituicao-suspender.php?id=${id}" class="btn btn-sm btn-warning" title="Suspender">
                                    <i class="fas fa-pause"></i>
                                </a>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        // ==========================================
        // CRIAÇÃO DE INSTITUIÇÃO
        // ==========================================

        function criarInstituicao(event) {
            event.preventDefault();

            const nome = document.getElementById('nomeInstituicao').value;
            const sigla = document.getElementById('siglaInstituicao').value;
            const email = document.getElementById('emailInstituicao').value;
            const tipo = document.getElementById('tipoInstituicao').value;

            if (!nome || !sigla || !email || !tipo) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast(`Instituição ${nome} criada com sucesso!`, 'success');
            fecharModal('modalNovaInstituicao');
            document.getElementById('formNovaInstituicao').reset();

            setTimeout(() => {
                location.reload();
            }, 1500);
        }

        // ==========================================
        // EXPORTAÇÃO
        // ==========================================

        function exportarInstituicoes() {
            mostrarToast('Exportando lista de instituições...', 'info');
            setTimeout(() => {
                mostrarToast('Exportação concluída! O arquivo foi baixado.', 'success');
            }, 1500);
        }

        // ==========================================
        // MODAIS
        // ==========================================

        function abrirModal(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharModal(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = '';
        }

        // Adicionar input com debounce para pesquisa
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInstituicao');
            if (searchInput) {
                let timeout;
                searchInput.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(function() {
                        aplicarFiltros();
                    }, 300);
                });
            }
        });
    </script>

    <style>
        /* ========================================== */
        /* INSTITUIÇÕES - CSS COMPLETO CORRIGIDO      */
        /* ========================================== */

        .instituicoes-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .instituicoes-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .instituicoes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        /* ===== INSTITUIÇÃO CARD ===== */
        .instituicao-card {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            min-height: 320px;
        }

        .instituicao-card:hover {
            border-color: var(--profile-institucional);
            transform: translateY(-4px);
            box-shadow: var(--glass-shadow);
        }

        /* ===== HEADER - Flex corrigido ===== */
        .instituicao-header {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            width: 100%;
        }

        /* ===== AVATAR - Mantido fixo ===== */
        .instituicao-avatar {
            position: relative;
            flex-shrink: 0;
            width: 56px;
            height: 56px;
        }

        .instituicao-avatar img {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .instituicao-avatar .status-badge {
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 0.55rem;
            padding: 1px 8px;
        }

        /* ===== INFO - Ocupa o espaço restante ===== */
        .instituicao-info {
            flex: 1;
            min-width: 0;
            overflow: hidden;
        }

        .instituicao-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 4px 0;
            line-height: 1.3;
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
        }

        /* ===== TAGS DE INFORMAÇÃO ===== */
        .instituicao-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 4px 8px;
            margin-top: 2px;
        }

        .instituicao-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .instituicao-tag i {
            font-size: 0.7rem;
        }

        .instituicao-tag.tag-sigla i {
            color: var(--profile-institucional);
        }

        .instituicao-tag.tag-tipo i {
            color: var(--profile-institucional);
        }

        .instituicao-tag.tag-plano i {
            color: #FFD93D;
        }

        /* ===== ACTIONS ===== */
        .instituicao-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
            flex-wrap: wrap;
            margin-left: auto;
        }

        .instituicao-actions .btn {
            padding: 4px 6px;
            font-size: var(--text-xs);
            min-width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== BODY ===== */
        .instituicao-body {
            flex: 1;
        }

        .instituicao-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ===== DETALHES ===== */
        .instituicao-detalhes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2px 12px;
            margin-top: 2px;
        }

        .instituicao-detalhes .detalhe-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-muted);
            min-width: 0;
            overflow: hidden;
        }

        .instituicao-detalhes .detalhe-item i {
            width: 14px;
            color: var(--profile-institucional);
            font-size: 0.7rem;
            flex-shrink: 0;
        }

        .instituicao-detalhes .detalhe-item span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            min-width: 0;
        }

        .instituicao-detalhes .detalhe-item span a {
            color: var(--profile-institucional);
            text-decoration: none;
        }

        .instituicao-detalhes .detalhe-item span a:hover {
            text-decoration: underline;
        }

        /* ===== FOOTER ===== */
        .instituicao-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .instituicao-footer .instituicao-stats {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .instituicao-footer .instituicao-stats .stat {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .instituicao-footer .instituicao-stats .stat i {
            color: var(--profile-institucional);
        }

        .instituicao-footer .instituicao-footer-actions .btn {
            font-size: var(--text-xs);
        }

        /* ========================================== */
        /* FILTRO BAR                                */
        /* ========================================== */

        .filter-bar-admin {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            align-items: center;
        }

        .filter-bar-admin .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-bar-admin .filter-group label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            white-space: nowrap;
        }

        .filter-bar-admin .filter-group label i {
            color: var(--profile-institucional);
        }

        .filter-bar-admin select,
        .filter-bar-admin input {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 6px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
            min-width: 130px;
        }

        .filter-bar-admin select:focus,
        .filter-bar-admin input:focus {
            outline: none;
            border-color: var(--profile-institucional);
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .filter-bar-admin select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 32px;
        }

        .filter-bar-admin .filter-actions {
            display: flex;
            gap: 8px;
            margin-left: auto;
        }

        .resultados-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-left: auto;
            white-space: nowrap;
        }

        /* ========================================== */
        /* STATUS BADGES                             */
        /* ========================================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .status-badge .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: var(--color-future-green);
        }

        .status-ativo .status-dot {
            background: var(--color-future-green);
        }

        .status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .status-pendente .status-dot {
            background: #FFD93D;
        }

        .status-inativo {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .status-inativo .status-dot {
            background: #FF6B6B;
        }

        /* ========================================== */
        /* PAGINAÇÃO                                 */
        /* ========================================== */

        .table-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
            padding: var(--space-md) 0 var(--space-sm);
            flex-wrap: wrap;
            margin-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .table-pagination .page-btn {
            min-width: 32px;
            height: 32px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition-smooth);
            font-size: var(--text-sm);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table-pagination .page-btn:hover {
            border-color: var(--profile-institucional);
            color: var(--profile-institucional);
            background: rgba(255, 217, 61, 0.04);
        }

        .table-pagination .page-btn.active {
            background: var(--profile-institucional);
            color: white;
            border-color: var(--profile-institucional);
        }

        .table-pagination .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
        }

        .table-pagination .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 12px;
        }

        .table-pagination .page-dots {
            color: var(--text-muted);
            padding: 0 4px;
            font-size: var(--text-sm);
        }

        /* ========================================== */
        /* EMPTY STATE                               */
        /* ========================================== */

        .empty-state-admin {
            text-align: center;
            padding: 60px 24px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
        }

        .empty-state-admin .empty-icon {
            font-size: 4rem;
            color: var(--text-muted);
            margin-bottom: var(--space-md);
        }

        .empty-state-admin h4 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
        }

        .empty-state-admin p {
            color: var(--text-muted);
            max-width: 400px;
            margin: 0 auto var(--space-md);
        }

        /* ========================================== */
        /* MODAL                                      */
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
            max-width: 650px;
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
            color: var(--profile-institucional);
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
            min-width: 100px;
            justify-content: center;
        }

        /* Modal Confirmação */
        #modalConfirmacao .modal-content {
            max-width: 420px;
            text-align: center;
        }

        #modalConfirmacao .modal-body p {
            font-size: var(--text-body);
            color: var(--text-secondary);
            line-height: 1.6;
        }

        #modalConfirmacao .modal-body p strong {
            color: var(--text-primary);
        }

        #modalConfirmacao .modal-body p small {
            display: block;
            margin-top: 8px;
            font-size: var(--text-sm);
            color: #FF6B6B;
        }

        #modalConfirmacao .modal-footer {
            justify-content: center;
        }

        /* ========================================== */
        /* FORMULÁRIO                                 */
        /* ========================================== */

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .form-group {
            margin-bottom: var(--space-md);
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
            padding: 8px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--profile-institucional);
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.08);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        select.form-control {
            appearance: none;
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
            .instituicoes-grid {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .instituicoes-container {
                padding: var(--space-md);
            }

            .instituicoes-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .instituicao-card {
                min-height: auto;
            }

            .instituicao-header {
                flex-wrap: wrap;
                justify-content: center;
            }

            .instituicao-avatar {
                width: 64px;
                height: 64px;
            }

            .instituicao-avatar img {
                width: 64px;
                height: 64px;
            }

            .instituicao-avatar .status-badge {
                position: relative;
                bottom: auto;
                left: auto;
                transform: none;
                margin-top: 4px;
            }

            .instituicao-info {
                text-align: center;
                width: 100%;
                flex: 1 1 100%;
            }

            .instituicao-info h4 {
                text-align: center;
                word-break: break-word;
            }

            .instituicao-tags {
                justify-content: center;
            }

            .instituicao-actions {
                width: 100%;
                justify-content: center;
                margin-left: 0;
            }

            .instituicao-descricao {
                text-align: center;
            }

            .instituicao-detalhes {
                grid-template-columns: 1fr;
                gap: 2px 0;
            }

            .instituicao-detalhes .detalhe-item span {
                white-space: normal;
                word-break: break-word;
            }

            .instituicao-footer {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .instituicao-footer .instituicao-stats {
                justify-content: center;
                flex-wrap: wrap;
            }

            .instituicao-footer .instituicao-footer-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .filter-bar-admin {
                flex-direction: column;
                align-items: stretch;
                padding: 12px 16px;
                gap: 8px;
            }

            .filter-bar-admin .filter-group {
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 4px;
            }

            .filter-bar-admin select,
            .filter-bar-admin input {
                width: 100%;
                min-width: auto;
            }

            .filter-bar-admin .filter-actions {
                margin-left: 0;
                flex-direction: column;
                gap: 6px;
            }

            .filter-bar-admin .filter-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .resultados-info {
                margin-left: 0;
                text-align: center;
                width: 100%;
                padding-top: 4px;
                border-top: 1px solid var(--border-color);
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .instituicoes-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .instituicao-card {
                padding: var(--space-sm);
            }

            .instituicao-avatar {
                width: 48px;
                height: 48px;
            }

            .instituicao-avatar img {
                width: 48px;
                height: 48px;
            }

            .instituicao-info h4 {
                font-size: var(--text-body);
            }

            .instituicao-actions .btn {
                padding: 2px 4px;
                font-size: 0.55rem;
                min-width: 24px;
                height: 24px;
            }

            .instituicao-detalhes .detalhe-item {
                font-size: var(--text-xs);
            }

            .instituicao-footer .instituicao-stats {
                flex-direction: column;
                gap: 2px;
                align-items: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .filter-bar-admin {
                padding: 10px 12px;
                gap: 6px;
            }

            .table-pagination .page-btn {
                min-width: 24px;
                height: 24px;
                font-size: var(--text-xs);
            }

            .modal-header {
                padding: 14px 18px;
            }

            .modal-body {
                padding: 18px;
            }

            .modal-footer {
                flex-direction: column;
                padding: 12px 18px;
            }

            .modal-footer .btn {
                width: 100%;
                min-width: auto;
            }
        }
    </style>

</body>
</html>