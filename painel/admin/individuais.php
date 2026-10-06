<?php
// painel/admin/individuais.php - Gestão de Profissionais Individuais
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Gestão de Profissionais';
$pagina_atual = 'individuais'; // <-- ESSENCIAL!

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Profissionais Individuais
$profissionais = [
    [
        'id' => 1,
        'nome' => 'Carlos Mendes',
        'email' => 'carlos.mendes@topografia.pt',
        'telefone' => '+244 923 456 100',
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
        'descricao' => 'Especialista em levantamentos topográficos e georreferenciamento',
        'projetos' => 12,
        'avaliacao' => 4.8,
        'certificacoes' => ['GNSS', 'Nivelamento', 'Fotogrametria']
    ],
    [
        'id' => 2,
        'nome' => 'Ana Costa',
        'email' => 'ana.costa@engenharia.pt',
        'telefone' => '+244 923 456 101',
        'nif' => '5012345679',
        'especialidade' => 'Engenharia Civil',
        'sub_especialidade' => 'Estruturas e Fundações',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-15 10:30:00',
        'ultimo_acesso' => '2026-02-18 11:45:00',
        'plano' => 'Enterprise',
        'experiencia' => '12 anos',
        'formacao' => 'Engenharia Civil',
        'avatar' => 'profissional-2.png',
        'descricao' => 'Projetos de engenharia, consultoria e fiscalização de obras',
        'projetos' => 18,
        'avaliacao' => 4.9,
        'certificacoes' => ['Estruturas', 'Fundações', 'Projetos']
    ],
    [
        'id' => 3,
        'nome' => 'Pedro Santos',
        'email' => 'pedro.santos@gis.pt',
        'telefone' => '+244 923 456 102',
        'nif' => '5012345680',
        'especialidade' => 'GIS',
        'sub_especialidade' => 'Análise Espacial',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-01 16:45:00',
        'ultimo_acesso' => '-',
        'plano' => 'Básico',
        'experiencia' => '3 anos',
        'formacao' => 'Sistemas de Informação Geográfica',
        'avatar' => 'profissional-3.png',
        'descricao' => 'Soluções em GIS, análise espacial e mapeamento temático',
        'projetos' => 4,
        'avaliacao' => 4.2,
        'certificacoes' => ['ArcGIS', 'QGIS', 'Análise Espacial']
    ],
    [
        'id' => 4,
        'nome' => 'Marisa Lima',
        'email' => 'marisa.lima@agricultura.pt',
        'telefone' => '+244 923 456 103',
        'nif' => '5012345681',
        'especialidade' => 'Agricultura de Precisão',
        'sub_especialidade' => 'Drones e Sensores',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-20 08:00:00',
        'ultimo_acesso' => '2026-02-17 16:30:00',
        'plano' => 'Pro',
        'experiencia' => '6 anos',
        'formacao' => 'Engenharia Agronómica',
        'avatar' => 'profissional-4.png',
        'descricao' => 'Agricultura de precisão com uso de drones e sensores',
        'projetos' => 9,
        'avaliacao' => 4.7,
        'certificacoes' => ['Drones', 'Sensores', 'NDVI']
    ],
    [
        'id' => 5,
        'nome' => 'Rui Oliveira',
        'email' => 'rui.oliveira@mineracao.pt',
        'telefone' => '+244 923 456 104',
        'nif' => '5012345682',
        'especialidade' => 'Mineração',
        'sub_especialidade' => 'Geologia e Modelagem',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'data_registo' => '2026-01-05 11:20:00',
        'ultimo_acesso' => '2026-01-25 09:10:00',
        'plano' => 'Enterprise',
        'experiencia' => '15 anos',
        'formacao' => 'Geologia',
        'avatar' => 'profissional-5.png',
        'descricao' => 'Exploração mineira, modelagem 3D e estudos de impacto',
        'projetos' => 22,
        'avaliacao' => 4.9,
        'certificacoes' => ['Geologia', 'Modelagem', 'Perfuração']
    ],
    [
        'id' => 6,
        'nome' => 'Sofia Rodrigues',
        'email' => 'sofia.rodrigues@petroleo.pt',
        'telefone' => '+244 923 456 105',
        'nif' => '5012345683',
        'especialidade' => 'Petróleo & Gás',
        'sub_especialidade' => 'Geofísica de Reservatórios',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-02-05 14:30:00',
        'ultimo_acesso' => '2026-02-18 09:00:00',
        'plano' => 'Pro',
        'experiencia' => '10 anos',
        'formacao' => 'Geofísica',
        'avatar' => 'profissional-6.png',
        'descricao' => 'Geofísica, simulação de reservatórios e modelagem sísmica',
        'projetos' => 15,
        'avaliacao' => 4.8,
        'certificacoes' => ['Geofísica', 'Reservatórios', 'Simulação']
    ],
    [
        'id' => 7,
        'nome' => 'André Ferreira',
        'email' => 'andre.ferreira@energia.pt',
        'telefone' => '+244 923 456 106',
        'nif' => '5012345684',
        'especialidade' => 'Energia',
        'sub_especialidade' => 'Energia Solar e Eólica',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-15 09:45:00',
        'ultimo_acesso' => '-',
        'plano' => 'Básico',
        'experiencia' => '2 anos',
        'formacao' => 'Engenharia Energética',
        'avatar' => 'profissional-7.png',
        'descricao' => 'Projetos de energia renovável, solar e eólica',
        'projetos' => 3,
        'avaliacao' => 4.0,
        'certificacoes' => ['Solar', 'Eólico', 'Eficiência']
    ],
    [
        'id' => 8,
        'nome' => 'Inês Almeida',
        'email' => 'ines.almeida@urbanismo.pt',
        'telefone' => '+244 923 456 107',
        'nif' => '5012345685',
        'especialidade' => 'Urbanismo',
        'sub_especialidade' => 'Planeamento Urbano',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-25 13:00:00',
        'ultimo_acesso' => '2026-02-16 15:20:00',
        'plano' => 'Pro',
        'experiencia' => '7 anos',
        'formacao' => 'Arquitetura e Urbanismo',
        'avatar' => 'profissional-8.png',
        'descricao' => 'Planeamento urbano, mobilidade e sustentabilidade',
        'projetos' => 11,
        'avaliacao' => 4.6,
        'certificacoes' => ['Planeamento', 'Mobilidade', 'Sustentabilidade']
    ],
    [
        'id' => 9,
        'nome' => 'Miguel Carvalho',
        'email' => 'miguel.carvalho@transportes.pt',
        'telefone' => '+244 923 456 108',
        'nif' => '5012345686',
        'especialidade' => 'Transportes',
        'sub_especialidade' => 'Infraestrutura Rodoviária',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'data_registo' => '2026-01-28 10:00:00',
        'ultimo_acesso' => '2026-02-10 08:00:00',
        'plano' => 'Pro',
        'experiencia' => '9 anos',
        'formacao' => 'Engenharia de Transportes',
        'avatar' => 'profissional-9.png',
        'descricao' => 'Projetos de infraestrutura rodoviária e logística',
        'projetos' => 14,
        'avaliacao' => 4.5,
        'certificacoes' => ['Tráfego', 'Infraestrutura', 'Logística']
    ],
    [
        'id' => 10,
        'nome' => 'Rita Martins',
        'email' => 'rita.martins@drones.pt',
        'telefone' => '+244 923 456 109',
        'nif' => '5012345687',
        'especialidade' => 'Drones',
        'sub_especialidade' => 'Pilotagem e Fotogrametria',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-02-10 11:30:00',
        'ultimo_acesso' => '2026-02-18 13:00:00',
        'plano' => 'Pro',
        'experiencia' => '4 anos',
        'formacao' => 'Tecnologia de Drones',
        'avatar' => 'profissional-10.png',
        'descricao' => 'Levantamentos aéreos, fotogrametria e inspeções com drones',
        'projetos' => 8,
        'avaliacao' => 4.7,
        'certificacoes' => ['Pilotagem', 'Fotogrametria', 'Inspeção']
    ],
    [
        'id' => 11,
        'nome' => 'João Pereira',
        'email' => 'joao.pereira@educacao.pt',
        'telefone' => '+244 923 456 110',
        'nif' => '5012345688',
        'especialidade' => 'Educação',
        'sub_especialidade' => 'Formação Técnica',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-18 08:00:00',
        'ultimo_acesso' => '-',
        'plano' => 'Básico',
        'experiencia' => '5 anos',
        'formacao' => 'Pedagogia',
        'avatar' => 'profissional-11.png',
        'descricao' => 'Formação técnica em topografia, engenharia e GIS',
        'projetos' => 2,
        'avaliacao' => 4.3,
        'certificacoes' => ['Ensino', 'Capacitação', 'Cursos']
    ]
];

// Estatísticas
$total_profissionais = count($profissionais);
$total_ativos = count(array_filter($profissionais, function($p) { return $p['status'] === 'ativo'; }));
$total_pendentes = count(array_filter($profissionais, function($p) { return $p['status'] === 'pendente'; }));
$total_inativos = count(array_filter($profissionais, function($p) { return $p['status'] === 'inativo'; }));

// Especialidades para filtro
$especialidades = array_unique(array_column($profissionais, 'especialidade'));
sort($especialidades);

// Planos para filtro
$planos = array_unique(array_column($profissionais, 'plano'));
sort($planos);

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
                            <span class="badge"><?php echo $total_profissionais; ?></span>
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
                        Gestão de Profissionais
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Profissionais</span>
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
                        <button class="btn btn-primary" data-modal="modalNovoProfissional">
                            <i class="fas fa-plus"></i> Novo Profissional
                        </button>
                        <button class="btn btn-outline" onclick="exportarProfissionais()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="value"><?php echo $total_profissionais; ?></div>
                    <div class="label">Total de Profissionais</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 15.3%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $total_ativos; ?></div>
                    <div class="label">Profissionais Ativos</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 10.2%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $total_pendentes; ?></div>
                    <div class="label">Pendentes de Validação</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 4.8%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-user-slash"></i>
                    </div>
                    <div class="value"><?php echo $total_inativos; ?></div>
                    <div class="label">Profissionais Inativos</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 1.5%
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filter-bar-admin">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchProfissional" placeholder="Pesquisar profissional..." oninput="aplicarFiltros()">
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
                    <label>Especialidade</label>
                    <select id="filterEspecialidade" onchange="aplicarFiltros()">
                        <option value="">Todas</option>
                        <?php foreach ($especialidades as $especialidade): ?>
                            <option value="<?php echo $especialidade; ?>"><?php echo $especialidade; ?></option>
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
                <span class="resultados-info" id="resultadosInfo"><?php echo $total_profissionais; ?> resultados</span>
            </div>

            <!-- ===== LISTA DE PROFISSIONAIS ===== -->
            <div class="profissionais-container">
                <div class="profissionais-grid" id="profissionaisGrid">
                    <?php foreach ($profissionais as $profissional): ?>
                        <div class="profissional-card animate-fade-up" 
                             data-id="<?php echo $profissional['id']; ?>"
                             data-status="<?php echo $profissional['status']; ?>"
                             data-especialidade="<?php echo $profissional['especialidade']; ?>"
                             data-plano="<?php echo $profissional['plano']; ?>"
                             data-nome="<?php echo strtolower($profissional['nome']); ?>"
                             data-email="<?php echo strtolower($profissional['email']); ?>">
                            
                            <div class="profissional-header">
                                <div class="profissional-avatar">
                                    <img src="../../assets/images/<?php echo $profissional['avatar']; ?>" alt="<?php echo $profissional['nome']; ?>">
                                    <span class="status-badge status-<?php echo $profissional['status']; ?>">
                                        <span class="status-dot"></span>
                                        <?php echo $profissional['status_label']; ?>
                                    </span>
                                </div>
                                <div class="profissional-info">
                                    <h4><?php echo $profissional['nome']; ?></h4>
                                    <span class="profissional-especialidade"><i class="fas fa-briefcase"></i> <?php echo $profissional['especialidade']; ?></span>
                                    <span class="profissional-plano"><i class="fas fa-crown"></i> <?php echo $profissional['plano']; ?></span>
                                </div>
                                <div class="profissional-actions">
                                    <a href="individual-detalhe.php?id=<?php echo $profissional['id']; ?>" class="btn btn-sm btn-outline" title="Ver Detalhes">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="individual-editar.php?id=<?php echo $profissional['id']; ?>" class="btn btn-sm btn-outline" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if ($profissional['status'] === 'pendente'): ?>
                                        <button class="btn btn-sm btn-success" title="Validar" onclick="validarProfissional(<?php echo $profissional['id']; ?>, '<?php echo $profissional['nome']; ?>')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    <?php endif; ?>
                                    <?php if ($profissional['status'] === 'ativo'): ?>
                                        <a href="individual-suspender.php?id=<?php echo $profissional['id']; ?>" class="btn btn-sm btn-warning" title="Suspender">
                                            <i class="fas fa-pause"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($profissional['status'] === 'inativo'): ?>
                                        <button class="btn btn-sm btn-success" title="Ativar" onclick="ativarProfissional(<?php echo $profissional['id']; ?>, '<?php echo $profissional['nome']; ?>')">
                                            <i class="fas fa-play"></i>
                                        </button>
                                    <?php endif; ?>
                                    <a href="individual-excluir.php?id=<?php echo $profissional['id']; ?>" class="btn btn-sm btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir permanentemente este profissional?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="profissional-body">
                                <p class="profissional-descricao"><?php echo $profissional['descricao']; ?></p>
                                <div class="profissional-detalhes">
                                    <div class="detalhe-item">
                                        <i class="fas fa-envelope"></i>
                                        <span><?php echo $profissional['email']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-phone"></i>
                                        <span><?php echo $profissional['telefone']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-id-card"></i>
                                        <span>NIF: <?php echo $profissional['nif']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-graduation-cap"></i>
                                        <span><?php echo $profissional['formacao']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-clock"></i>
                                        <span><?php echo $profissional['experiencia']; ?> de experiência</span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-star" style="color: #FFD93D;"></i>
                                        <span><?php echo $profissional['avaliacao']; ?> / 5.0</span>
                                    </div>
                                </div>
                            </div>

                            <div class="profissional-footer">
                                <div class="profissional-stats">
                                    <span class="stat">
                                        <i class="fas fa-project-diagram"></i>
                                        <?php echo $profissional['projetos']; ?> projetos
                                    </span>
                                    <span class="stat">
                                        <i class="fas fa-certificate"></i>
                                        <?php echo count($profissional['certificacoes']); ?> certificações
                                    </span>
                                    <span class="stat">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php echo date('d/m/Y', strtotime($profissional['data_registo'])); ?>
                                    </span>
                                </div>
                                <div class="profissional-footer-actions">
                                    <a href="individual-detalhe.php?id=<?php echo $profissional['id']; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="table-pagination" id="paginacaoProfissionais">
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
    <!-- MODAL NOVO PROFISSIONAL                    -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovoProfissional">
        <div class="modal-overlay" onclick="fecharModal('modalNovoProfissional')"></div>
        <div class="modal-content" style="max-width: 650px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-user-tie"></i> Novo Profissional
                </h3>
                <button class="modal-close" onclick="fecharModal('modalNovoProfissional')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovoProfissional" onsubmit="criarProfissional(event)">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nome Completo <span class="required">*</span></label>
                            <input type="text" class="form-control" id="nomeProfissional" placeholder="Nome completo" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" id="emailProfissional" placeholder="email@profissional.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefoneProfissional" placeholder="+244 923 456 789">
                        </div>
                        <div class="form-group">
                            <label class="form-label">NIF</label>
                            <input type="text" class="form-control" id="nifProfissional" placeholder="5012345678">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Especialidade <span class="required">*</span></label>
                            <select class="form-control" id="especialidadeProfissional" required>
                                <option value="">Selecione...</option>
                                <?php foreach ($especialidades as $especialidade): ?>
                                    <option value="<?php echo $especialidade; ?>"><?php echo $especialidade; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sub-Especialidade</label>
                            <input type="text" class="form-control" id="subEspecialidadeProfissional" placeholder="Ex: Levantamentos Topográficos">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Plano</label>
                            <select class="form-control" id="planoProfissional">
                                <option value="Básico">Básico</option>
                                <option value="Pro" selected>Pro</option>
                                <option value="Enterprise">Enterprise</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="statusProfissional">
                                <option value="ativo">Ativo</option>
                                <option value="pendente">Pendente</option>
                                <option value="inativo">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Experiência</label>
                            <input type="text" class="form-control" id="experienciaProfissional" placeholder="Ex: 5 anos">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Formação</label>
                            <input type="text" class="form-control" id="formacaoProfissional" placeholder="Ex: Engenharia Geográfica">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricaoProfissional" rows="2" placeholder="Breve descrição do profissional"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Certificações</label>
                        <input type="text" class="form-control" id="certificacoesProfissional" placeholder="Ex: GNSS, Nivelamento, Fotogrametria">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalNovoProfissional')">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('formNovoProfissional').submit()">
                    <i class="fas fa-save"></i> Criar Profissional
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
            const totalItens = document.querySelectorAll('.profissional-card').length;
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
        // FILTROS E PAGINAÇÃO
        // ==========================================

        let paginaAtual = 1;
        let itensPorPagina = 6;
        let totalItensVisiveis = 0;

        function aplicarFiltros() {
            const search = document.getElementById('searchProfissional').value.toLowerCase().trim();
            const status = document.getElementById('filterStatus').value;
            const especialidade = document.getElementById('filterEspecialidade').value;
            const plano = document.getElementById('filterPlano').value;

            const cards = document.querySelectorAll('.profissional-card');
            let visiveis = 0;

            cards.forEach(card => {
                const nome = card.dataset.nome || '';
                const email = card.dataset.email || '';
                const cardStatus = card.dataset.status || '';
                const cardEspecialidade = card.dataset.especialidade || '';
                const cardPlano = card.dataset.plano || '';

                let show = true;

                if (search) {
                    show = nome.includes(search) || email.includes(search);
                }

                if (show && status) {
                    show = cardStatus === status;
                }

                if (show && especialidade) {
                    show = cardEspecialidade === especialidade;
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
                const container = document.getElementById('paginacaoProfissionais');
                if (container) container.style.display = 'none';
                
                const grid = document.querySelector('.profissionais-grid');
                if (grid) {
                    grid.innerHTML = `
                        <div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;">
                            <div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h4 style="margin-top: 16px; color: var(--text-primary);">Nenhum profissional encontrado</h4>
                            <p style="color: var(--text-muted); margin-top: 8px;">Tente ajustar os filtros para encontrar o que procura.</p>
                        </div>
                    `;
                }
            }
        }

        function limparFiltros() {
            document.getElementById('searchProfissional').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterEspecialidade').value = '';
            document.getElementById('filterPlano').value = '';

            document.querySelectorAll('.profissional-card').forEach(card => {
                card.style.display = '';
            });

            totalItensVisiveis = document.querySelectorAll('.profissional-card').length;
            
            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            const grid = document.querySelector('.profissionais-grid');
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
            const cards = document.querySelectorAll('.profissional-card:not([style*="display: none"])');
            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;

            document.querySelectorAll('.profissional-card').forEach(card => {
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
            const container = document.getElementById('paginacaoProfissionais');

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
            const container = document.querySelector('.profissionais-container');
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
        // AÇÕES DOS PROFISSIONAIS
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

        function validarProfissional(id, nome) {
            mostrarConfirmacao(
                'Validar Profissional',
                `Tem certeza que deseja validar o profissional <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Profissional ${nome} validado com sucesso!`, 'success');
                    const card = document.querySelector(`.profissional-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'ativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-ativo';
                        badge.innerHTML = '<span class="status-dot"></span> Ativo';
                        const actions = card.querySelector('.profissional-actions');
                        const validarBtn = actions.querySelector('.btn-success');
                        if (validarBtn) {
                            validarBtn.outerHTML = `
                                <a href="individual-suspender.php?id=${id}" class="btn btn-sm btn-warning" title="Suspender">
                                    <i class="fas fa-pause"></i>
                                </a>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function suspenderProfissional(id, nome) {
            mostrarConfirmacao(
                'Suspender Profissional',
                `Tem certeza que deseja suspender o profissional <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Profissional ${nome} suspenso com sucesso!`, 'warning');
                    const card = document.querySelector(`.profissional-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'inativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-inativo';
                        badge.innerHTML = '<span class="status-dot"></span> Inativo';
                        const actions = card.querySelector('.profissional-actions');
                        const suspenderBtn = actions.querySelector('.btn-warning');
                        if (suspenderBtn) {
                            suspenderBtn.outerHTML = `
                                <button class="btn btn-sm btn-success" title="Ativar" onclick="ativarProfissional(${id}, '${nome}')">
                                    <i class="fas fa-play"></i>
                                </button>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function ativarProfissional(id, nome) {
            mostrarConfirmacao(
                'Ativar Profissional',
                `Tem certeza que deseja ativar o profissional <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Profissional ${nome} ativado com sucesso!`, 'success');
                    const card = document.querySelector(`.profissional-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'ativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-ativo';
                        badge.innerHTML = '<span class="status-dot"></span> Ativo';
                        const actions = card.querySelector('.profissional-actions');
                        const ativarBtn = actions.querySelector('.btn-success');
                        if (ativarBtn) {
                            ativarBtn.outerHTML = `
                                <a href="individual-suspender.php?id=${id}" class="btn btn-sm btn-warning" title="Suspender">
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
        // CRIAÇÃO DE PROFISSIONAL
        // ==========================================

        function criarProfissional(event) {
            event.preventDefault();

            const nome = document.getElementById('nomeProfissional').value;
            const email = document.getElementById('emailProfissional').value;
            const especialidade = document.getElementById('especialidadeProfissional').value;

            if (!nome || !email || !especialidade) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast(`Profissional ${nome} criado com sucesso!`, 'success');
            fecharModal('modalNovoProfissional');
            document.getElementById('formNovoProfissional').reset();

            setTimeout(() => {
                location.reload();
            }, 1500);
        }

        // ==========================================
        // EXPORTAÇÃO
        // ==========================================

        function exportarProfissionais() {
            mostrarToast('Exportando lista de profissionais...', 'info');
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
            const searchInput = document.getElementById('searchProfissional');
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
        /* PROFISSIONAIS - CSS COMPLETO               */
        /* ========================================== */

        .profissionais-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .profissionais-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .profissionais-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        /* ===== PROFISSIONAL CARD ===== */
        .profissional-card {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .profissional-card:hover {
            border-color: var(--color-turquoise);
            transform: translateY(-4px);
            box-shadow: var(--glass-shadow);
        }

        /* ===== HEADER ===== */
        .profissional-header {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
        }

        .profissional-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .profissional-avatar img {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .profissional-avatar .status-badge {
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 0.55rem;
            padding: 1px 8px;
        }

        .profissional-info {
            flex: 1;
            min-width: 0;
        }

        .profissional-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 2px 0;
        }

        .profissional-info .profissional-especialidade {
            display: inline-block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-right: var(--space-sm);
        }

        .profissional-info .profissional-especialidade i {
            margin-right: 4px;
            color: var(--color-turquoise);
        }

        .profissional-info .profissional-plano {
            display: inline-block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .profissional-info .profissional-plano i {
            margin-right: 4px;
            color: #FFD93D;
        }

        .profissional-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
            flex-wrap: wrap;
        }

        .profissional-actions .btn {
            padding: 4px 6px;
            font-size: var(--text-xs);
            min-width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== BODY ===== */
        .profissional-body {
            flex: 1;
        }

        .profissional-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            line-height: 1.5;
        }

        .profissional-detalhes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px 12px;
        }

        .profissional-detalhes .detalhe-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .profissional-detalhes .detalhe-item i {
            width: 14px;
            color: var(--color-turquoise);
            font-size: 0.7rem;
        }

        .profissional-detalhes .detalhe-item span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ===== FOOTER ===== */
        .profissional-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .profissional-footer .profissional-stats {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .profissional-footer .profissional-stats .stat {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .profissional-footer .profissional-stats .stat i {
            color: var(--color-turquoise);
        }

        .profissional-footer .profissional-footer-actions .btn {
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
            color: var(--color-turquoise);
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
            border-color: var(--color-turquoise);
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
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
            border-color: var(--color-turquoise);
            color: var(--color-turquoise);
            background: rgba(0, 210, 255, 0.04);
        }

        .table-pagination .page-btn.active {
            background: var(--gradient-geo);
            color: white;
            border-color: var(--color-turquoise);
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
            border-color: var(--color-turquoise);
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.08);
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

        /* Animações */
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
            .profissionais-grid {
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .profissionais-container {
                padding: var(--space-md);
            }

            .profissionais-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .profissional-header {
                flex-wrap: wrap;
            }

            .profissional-avatar {
                width: 100%;
                text-align: center;
            }

            .profissional-avatar img {
                width: 64px;
                height: 64px;
            }

            .profissional-avatar .status-badge {
                position: relative;
                bottom: auto;
                left: auto;
                transform: none;
                margin-top: 4px;
            }

            .profissional-info {
                text-align: center;
                width: 100%;
            }

            .profissional-actions {
                width: 100%;
                justify-content: center;
            }

            .profissional-detalhes {
                grid-template-columns: 1fr;
            }

            .profissional-footer {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .profissional-footer .profissional-stats {
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
        }

        @media (max-width: 480px) {
            .profissionais-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .profissional-card {
                padding: var(--space-sm);
            }

            .profissional-avatar img {
                width: 48px;
                height: 48px;
            }

            .profissional-info h4 {
                font-size: var(--text-h4);
            }

            .profissional-actions .btn {
                padding: 2px 4px;
                font-size: 0.55rem;
                min-width: 24px;
                height: 24px;
            }

            .profissional-detalhes .detalhe-item {
                font-size: var(--text-xs);
            }

            .profissional-footer .profissional-stats {
                flex-direction: column;
                gap: 2px;
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