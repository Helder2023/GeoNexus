<?php
// painel/admin/empresas.php - Gestão de Empresas
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Gestão de Empresas';
$pagina_atual = 'empresas'; // <-- ESSENCIAL!

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Empresas
$empresas = [
    [
        'id' => 1,
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
        'descricao' => 'Empresa especializada em construção civil e infraestrutura'
    ],
    [
        'id' => 2,
        'nome' => 'Topografia Lima',
        'email' => 'contato@topografialima.com',
        'telefone' => '+244 923 456 101',
        'nif' => '5001234568',
        'endereco' => 'Av. das Topografias, 456, Luanda',
        'responsavel' => 'Beatriz Lima',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-15 10:30:00',
        'plano' => 'Empresarial',
        'funcionarios' => 12,
        'projetos' => 5,
        'avatar' => 'empresa-2.png',
        'segmento' => 'Topografia e Geomensura',
        'descricao' => 'Serviços de topografia, levantamentos e georreferenciamento'
    ],
    [
        'id' => 3,
        'nome' => 'GIS Solutions',
        'email' => 'contato@gissolutions.com',
        'telefone' => '+244 923 456 102',
        'nif' => '5001234569',
        'endereco' => 'Rua GIS, 789, Luanda',
        'responsavel' => 'Ana Oliveira',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-01 16:45:00',
        'plano' => 'Básico',
        'funcionarios' => 6,
        'projetos' => 2,
        'avatar' => 'empresa-3.png',
        'segmento' => 'Sistemas de Informação Geográfica',
        'descricao' => 'Soluções em GIS, análise espacial e mapeamento'
    ],
    [
        'id' => 4,
        'nome' => 'Engenharia Santos',
        'email' => 'contato@engenhariasantos.com',
        'telefone' => '+244 923 456 103',
        'nif' => '5001234570',
        'endereco' => 'Av. da Engenharia, 321, Luanda',
        'responsavel' => 'Rui Santos',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-20 08:00:00',
        'plano' => 'Empresarial Pro',
        'funcionarios' => 18,
        'projetos' => 7,
        'avatar' => 'empresa-4.png',
        'segmento' => 'Engenharia Civil',
        'descricao' => 'Projetos de engenharia, consultoria e fiscalização'
    ],
    [
        'id' => 5,
        'nome' => 'Ferreira & Filhos',
        'email' => 'contato@ferreirafilhos.com',
        'telefone' => '+244 923 456 104',
        'nif' => '5001234571',
        'endereco' => 'Rua Ferreira, 654, Luanda',
        'responsavel' => 'Carlos Ferreira',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'data_registo' => '2026-01-05 11:20:00',
        'plano' => 'Básico',
        'funcionarios' => 4,
        'projetos' => 1,
        'avatar' => 'empresa-5.png',
        'segmento' => 'Construção e Reformas',
        'descricao' => 'Construção e reformas residenciais e comerciais'
    ],
    [
        'id' => 6,
        'nome' => 'Instituto Técnico de Luanda',
        'email' => 'contato@itl.edu',
        'telefone' => '+244 923 456 105',
        'nif' => '5001234572',
        'endereco' => 'Av. Universitária, 789, Luanda',
        'responsavel' => 'Pedro Costa',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-10 14:30:00',
        'plano' => 'Institucional',
        'funcionarios' => 8,
        'projetos' => 3,
        'avatar' => 'empresa-6.png',
        'segmento' => 'Educação e Formação',
        'descricao' => 'Formação técnica em topografia, engenharia e GIS'
    ],
    [
        'id' => 7,
        'nome' => 'Mineração Progresso',
        'email' => 'contato@mineracaoprogresso.com',
        'telefone' => '+244 923 456 106',
        'nif' => '5001234573',
        'endereco' => 'Estrada da Mineração, KM 15, Luanda',
        'responsavel' => 'Sofia Martins',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-25 13:00:00',
        'plano' => 'Empresarial Pro',
        'funcionarios' => 35,
        'projetos' => 12,
        'avatar' => 'empresa-7.png',
        'segmento' => 'Mineração',
        'descricao' => 'Exploração mineira e estudos de impacto ambiental'
    ],
    [
        'id' => 8,
        'nome' => 'Energia Futuro',
        'email' => 'contato@energiafuturo.com',
        'telefone' => '+244 923 456 107',
        'nif' => '5001234574',
        'endereco' => 'Rua da Energia, 456, Luanda',
        'responsavel' => 'Márcia Fernandes',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-02-05 09:00:00',
        'plano' => 'Empresarial',
        'funcionarios' => 15,
        'projetos' => 6,
        'avatar' => 'empresa-8.png',
        'segmento' => 'Energia e Telecom',
        'descricao' => 'Projetos de energia, telecomunicações e infraestrutura'
    ],
    [
        'id' => 9,
        'nome' => 'Transportes Logística',
        'email' => 'contato@transporteslogistica.com',
        'telefone' => '+244 923 456 108',
        'nif' => '5001234575',
        'endereco' => 'Av. dos Transportes, 789, Luanda',
        'responsavel' => 'Paulo Mendes',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-15 11:30:00',
        'plano' => 'Básico',
        'funcionarios' => 5,
        'projetos' => 2,
        'avatar' => 'empresa-9.png',
        'segmento' => 'Transportes',
        'descricao' => 'Serviços de transporte, logística e mobilidade'
    ],
    [
        'id' => 10,
        'nome' => 'Urbanismo Sustentável',
        'email' => 'contato@urbanismosustentavel.com',
        'telefone' => '+244 923 456 109',
        'nif' => '5001234576',
        'endereco' => 'Rua do Urbanismo, 321, Luanda',
        'responsavel' => 'Tânia Rodrigues',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'data_registo' => '2026-01-28 10:00:00',
        'plano' => 'Básico',
        'funcionarios' => 3,
        'projetos' => 1,
        'avatar' => 'empresa-10.png',
        'segmento' => 'Arquitetura e Urbanismo',
        'descricao' => 'Projetos urbanísticos, arquitetura e planeamento'
    ]
];

// Estatísticas
$total_empresas = count($empresas);
$total_ativas = count(array_filter($empresas, function($e) { return $e['status'] === 'ativo'; }));
$total_pendentes = count(array_filter($empresas, function($e) { return $e['status'] === 'pendente'; }));
$total_inativas = count(array_filter($empresas, function($e) { return $e['status'] === 'inativo'; }));

// Segmentos para filtro
$segmentos = array_unique(array_column($empresas, 'segmento'));
sort($segmentos);

// Planos para filtro
$planos = array_unique(array_column($empresas, 'plano'));
sort($planos);

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
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
                            <span class="badge"><?php echo $total_empresas; ?></span>
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
                        Gestão de Empresas
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Empresas</span>
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
                        <button class="btn btn-primary" data-modal="modalNovaEmpresa">
                            <i class="fas fa-plus"></i> Nova Empresa
                        </button>
                        <button class="btn btn-outline" onclick="exportarEmpresas()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="value"><?php echo $total_empresas; ?></div>
                    <div class="label">Total de Empresas</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 12.5%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $total_ativas; ?></div>
                    <div class="label">Empresas Ativas</div>
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
                    <div class="label">Empresas Inativas</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 2.1%
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filter-bar-admin">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchEmpresa" placeholder="Pesquisar empresa..." oninput="aplicarFiltros()">
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
                    <label>Segmento</label>
                    <select id="filterSegmento" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <?php foreach ($segmentos as $segmento): ?>
                            <option value="<?php echo $segmento; ?>"><?php echo $segmento; ?></option>
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
                <span class="resultados-info" id="resultadosInfo"><?php echo $total_empresas; ?> resultados</span>
            </div>

            <!-- ===== LISTA DE EMPRESAS ===== -->
            <div class="empresas-container">
                <div class="empresas-grid" id="empresasGrid">
                    <?php foreach ($empresas as $empresa): ?>
                        <div class="empresa-card animate-fade-up" 
                             data-id="<?php echo $empresa['id']; ?>"
                             data-status="<?php echo $empresa['status']; ?>"
                             data-segmento="<?php echo $empresa['segmento']; ?>"
                             data-plano="<?php echo $empresa['plano']; ?>"
                             data-nome="<?php echo strtolower($empresa['nome']); ?>"
                             data-email="<?php echo strtolower($empresa['email']); ?>">
                            
                            <div class="empresa-header">
                                <div class="empresa-avatar">
                                    <img src="../../assets/images/<?php echo $empresa['avatar']; ?>" alt="<?php echo $empresa['nome']; ?>">
                                    <span class="status-badge status-<?php echo $empresa['status']; ?>">
                                        <span class="status-dot"></span>
                                        <?php echo $empresa['status_label']; ?>
                                    </span>
                                </div>
                                <div class="empresa-info">
                                    <h4><?php echo $empresa['nome']; ?></h4>
                                    <span class="empresa-segmento"><i class="fas fa-tag"></i> <?php echo $empresa['segmento']; ?></span>
                                    <span class="empresa-plano"><i class="fas fa-crown"></i> <?php echo $empresa['plano']; ?></span>
                                </div>
                                <div class="empresa-actions">
                                    <a href="empresa-detalhe.php?id=<?php echo $empresa['id']; ?>" class="btn btn-sm btn-outline" title="Ver Detalhes">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="empresa-editar.php?id=<?php echo $empresa['id']; ?>" class="btn btn-sm btn-outline" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if ($empresa['status'] === 'pendente'): ?>
                                        <button class="btn btn-sm btn-success" title="Validar" onclick="validarEmpresa(<?php echo $empresa['id']; ?>, '<?php echo $empresa['nome']; ?>')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    <?php endif; ?>
                                    <?php if ($empresa['status'] === 'ativo'): ?>
                                        <a href="empresa-suspender.php?id=<?php echo $empresa['id']; ?>" class="btn btn-sm btn-warning" title="Suspender">
                                            <i class="fas fa-pause"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($empresa['status'] === 'inativo'): ?>
                                        <button class="btn btn-sm btn-success" title="Ativar" onclick="ativarEmpresa(<?php echo $empresa['id']; ?>, '<?php echo $empresa['nome']; ?>')">
                                            <i class="fas fa-play"></i>
                                        </button>
                                    <?php endif; ?>
                                    <a href="empresa-excluir.php?id=<?php echo $empresa['id']; ?>" class="btn btn-sm btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir permanentemente esta empresa?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="empresa-body">
                                <p class="empresa-descricao"><?php echo $empresa['descricao']; ?></p>
                                <div class="empresa-detalhes">
                                    <div class="detalhe-item">
                                        <i class="fas fa-envelope"></i>
                                        <span><?php echo $empresa['email']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-phone"></i>
                                        <span><?php echo $empresa['telefone']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-id-card"></i>
                                        <span>NIF: <?php echo $empresa['nif']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?php echo $empresa['endereco']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-user-tie"></i>
                                        <span>Responsável: <?php echo $empresa['responsavel']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>Registo: <?php echo date('d/m/Y', strtotime($empresa['data_registo'])); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="empresa-footer">
                                <div class="empresa-stats">
                                    <span class="stat">
                                        <i class="fas fa-users"></i>
                                        <?php echo $empresa['funcionarios']; ?> funcionários
                                    </span>
                                    <span class="stat">
                                        <i class="fas fa-project-diagram"></i>
                                        <?php echo $empresa['projetos']; ?> projetos
                                    </span>
                                </div>
                                <div class="empresa-footer-actions">
                                    <a href="empresa-detalhe.php?id=<?php echo $empresa['id']; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="table-pagination" id="paginacaoEmpresas">
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
    <!-- MODAL NOVA EMPRESA                         -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovaEmpresa">
        <div class="modal-overlay" onclick="fecharModal('modalNovaEmpresa')"></div>
        <div class="modal-content" style="max-width: 600px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-building"></i> Nova Empresa
                </h3>
                <button class="modal-close" onclick="fecharModal('modalNovaEmpresa')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovaEmpresa" onsubmit="criarEmpresa(event)">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nome da Empresa <span class="required">*</span></label>
                            <input type="text" class="form-control" id="nomeEmpresa" placeholder="Nome da empresa" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" id="emailEmpresa" placeholder="contato@empresa.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefoneEmpresa" placeholder="+244 923 456 789">
                        </div>
                        <div class="form-group">
                            <label class="form-label">NIF</label>
                            <input type="text" class="form-control" id="nifEmpresa" placeholder="5001234567">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Segmento</label>
                            <select class="form-control" id="segmentoEmpresa">
                                <option value="">Selecione...</option>
                                <?php foreach ($segmentos as $segmento): ?>
                                    <option value="<?php echo $segmento; ?>"><?php echo $segmento; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Plano</label>
                            <select class="form-control" id="planoEmpresa">
                                <option value="Básico">Básico</option>
                                <option value="Empresarial">Empresarial</option>
                                <option value="Empresarial Pro">Empresarial Pro</option>
                                <option value="Institucional">Institucional</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="enderecoEmpresa" placeholder="Rua, número, cidade">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Responsável</label>
                        <input type="text" class="form-control" id="responsavelEmpresa" placeholder="Nome do responsável">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricaoEmpresa" rows="2" placeholder="Breve descrição da empresa"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" id="statusEmpresa">
                            <option value="ativo">Ativo</option>
                            <option value="pendente">Pendente</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalNovaEmpresa')">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('formNovaEmpresa').submit()">
                    <i class="fas fa-save"></i> Criar Empresa
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
            const totalItens = document.querySelectorAll('.empresa-card').length;
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
            const search = document.getElementById('searchEmpresa').value.toLowerCase().trim();
            const status = document.getElementById('filterStatus').value;
            const segmento = document.getElementById('filterSegmento').value;
            const plano = document.getElementById('filterPlano').value;

            const cards = document.querySelectorAll('.empresa-card');
            let visiveis = 0;

            cards.forEach(card => {
                const nome = card.dataset.nome || '';
                const email = card.dataset.email || '';
                const cardStatus = card.dataset.status || '';
                const cardSegmento = card.dataset.segmento || '';
                const cardPlano = card.dataset.plano || '';

                let show = true;

                if (search) {
                    show = nome.includes(search) || email.includes(search);
                }

                if (show && status) {
                    show = cardStatus === status;
                }

                if (show && segmento) {
                    show = cardSegmento === segmento;
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
                const container = document.getElementById('paginacaoEmpresas');
                if (container) container.style.display = 'none';
                
                const grid = document.querySelector('.empresas-grid');
                if (grid) {
                    grid.innerHTML = `
                        <div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;">
                            <div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);">
                                <i class="fas fa-building"></i>
                            </div>
                            <h4 style="margin-top: 16px; color: var(--text-primary);">Nenhuma empresa encontrada</h4>
                            <p style="color: var(--text-muted); margin-top: 8px;">Tente ajustar os filtros para encontrar o que procura.</p>
                        </div>
                    `;
                }
            }
        }

        function limparFiltros() {
            document.getElementById('searchEmpresa').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterSegmento').value = '';
            document.getElementById('filterPlano').value = '';

            document.querySelectorAll('.empresa-card').forEach(card => {
                card.style.display = '';
            });

            totalItensVisiveis = document.querySelectorAll('.empresa-card').length;
            
            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            // Restaurar grid se estava vazio
            const grid = document.querySelector('.empresas-grid');
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
            const cards = document.querySelectorAll('.empresa-card:not([style*="display: none"])');
            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;

            document.querySelectorAll('.empresa-card').forEach(card => {
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
            const container = document.getElementById('paginacaoEmpresas');

            if (!container) return;

            const prevBtn = container.querySelector('.prev');
            const nextBtn = container.querySelector('.next');
            const info = container.querySelector('.page-info');

            // Remover botões de página anteriores (exceto prev, info, next)
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
            const container = document.querySelector('.empresas-container');
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
        // AÇÕES DAS EMPRESAS
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

        function validarEmpresa(id, nome) {
            mostrarConfirmacao(
                'Validar Empresa',
                `Tem certeza que deseja validar a empresa <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Empresa ${nome} validada com sucesso!`, 'success');
                    const card = document.querySelector(`.empresa-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'ativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-ativo';
                        badge.innerHTML = '<span class="status-dot"></span> Ativo';
                        const actions = card.querySelector('.empresa-actions');
                        const validarBtn = actions.querySelector('.btn-success');
                        if (validarBtn) {
                            validarBtn.outerHTML = `
                                <a href="empresa-suspender.php?id=${id}" class="btn btn-sm btn-warning" title="Suspender">
                                    <i class="fas fa-pause"></i>
                                </a>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function suspenderEmpresa(id, nome) {
            mostrarConfirmacao(
                'Suspender Empresa',
                `Tem certeza que deseja suspender a empresa <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Empresa ${nome} suspensa com sucesso!`, 'warning');
                    const card = document.querySelector(`.empresa-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'inativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-inativo';
                        badge.innerHTML = '<span class="status-dot"></span> Inativo';
                        const actions = card.querySelector('.empresa-actions');
                        const suspenderBtn = actions.querySelector('.btn-warning');
                        if (suspenderBtn) {
                            suspenderBtn.outerHTML = `
                                <button class="btn btn-sm btn-success" title="Ativar" onclick="ativarEmpresa(${id}, '${nome}')">
                                    <i class="fas fa-play"></i>
                                </button>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function ativarEmpresa(id, nome) {
            mostrarConfirmacao(
                'Ativar Empresa',
                `Tem certeza que deseja ativar a empresa <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Empresa ${nome} ativada com sucesso!`, 'success');
                    const card = document.querySelector(`.empresa-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'ativo';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-ativo';
                        badge.innerHTML = '<span class="status-dot"></span> Ativo';
                        const actions = card.querySelector('.empresa-actions');
                        const ativarBtn = actions.querySelector('.btn-success');
                        if (ativarBtn) {
                            ativarBtn.outerHTML = `
                                <a href="empresa-suspender.php?id=${id}" class="btn btn-sm btn-warning" title="Suspender">
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
        // CRIAÇÃO DE EMPRESA
        // ==========================================

        function criarEmpresa(event) {
            event.preventDefault();

            const nome = document.getElementById('nomeEmpresa').value;
            const email = document.getElementById('emailEmpresa').value;

            if (!nome || !email) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast(`Empresa ${nome} criada com sucesso!`, 'success');
            fecharModal('modalNovaEmpresa');
            document.getElementById('formNovaEmpresa').reset();

            setTimeout(() => {
                location.reload();
            }, 1500);
        }

        // ==========================================
        // EXPORTAÇÃO
        // ==========================================

        function exportarEmpresas() {
            mostrarToast('Exportando lista de empresas...', 'info');
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
            const searchInput = document.getElementById('searchEmpresa');
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
        /* EMPRESAS - CSS COMPLETO                    */
        /* ========================================== */

        .empresas-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .empresas-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .empresas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        /* ===== EMPRESA CARD ===== */
        .empresa-card {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .empresa-card:hover {
            border-color: var(--color-aurora);
            transform: translateY(-4px);
            box-shadow: var(--glass-shadow);
        }

        /* ===== HEADER ===== */
        .empresa-header {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
        }

        .empresa-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .empresa-avatar img {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .empresa-avatar .status-badge {
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 0.55rem;
            padding: 1px 8px;
        }

        .empresa-info {
            flex: 1;
            min-width: 0;
        }

        .empresa-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 2px 0;
        }

        .empresa-info .empresa-segmento {
            display: inline-block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-right: var(--space-sm);
        }

        .empresa-info .empresa-segmento i {
            margin-right: 4px;
            color: var(--color-aurora);
        }

        .empresa-info .empresa-plano {
            display: inline-block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .empresa-info .empresa-plano i {
            margin-right: 4px;
            color: #FFD93D;
        }

        .empresa-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
            flex-wrap: wrap;
        }

        .empresa-actions .btn {
            padding: 4px 6px;
            font-size: var(--text-xs);
            min-width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== BODY ===== */
        .empresa-body {
            flex: 1;
        }

        .empresa-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            line-height: 1.5;
        }

        .empresa-detalhes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px 12px;
        }

        .empresa-detalhes .detalhe-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .empresa-detalhes .detalhe-item i {
            width: 14px;
            color: var(--color-aurora);
            font-size: 0.7rem;
        }

        .empresa-detalhes .detalhe-item span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ===== FOOTER ===== */
        .empresa-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .empresa-footer .empresa-stats {
            display: flex;
            gap: var(--space-md);
        }

        .empresa-footer .empresa-stats .stat {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .empresa-footer .empresa-stats .stat i {
            color: var(--color-aurora);
        }

        .empresa-footer .empresa-footer-actions .btn {
            font-size: var(--text-xs);
        }

        /* ========================================== */
        /* FILTRO BAR - COMPLETO                      */
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
            color: var(--color-aurora);
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
            border-color: var(--color-aurora);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        .filter-bar-admin select {
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 32px;
        }

        /* Tema Escuro - Select */
        [data-theme="dark"] select {
            background-color: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.08);
            color: #FFFFFF;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23B8C6D4' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        }

        [data-theme="dark"] select:focus {
            border-color: var(--color-aurora);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.15);
        }

        [data-theme="dark"] select option {
            background-color: #1A2A4A;
            color: #FFFFFF;
        }

        [data-theme="dark"] select option:hover,
        [data-theme="dark"] select option:checked {
            background-color: var(--color-aurora);
            color: #FFFFFF;
        }

        /* Tema Claro - Select */
        [data-theme="light"] select {
            background-color: #FFFFFF;
            border-color: #E5E7EB;
            color: #0A1628;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        }

        [data-theme="light"] select:focus {
            border-color: var(--color-aurora);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        [data-theme="light"] select option {
            background-color: #FFFFFF;
            color: #0A1628;
        }

        [data-theme="light"] select option:hover {
            background-color: #F3F4F6;
        }

        [data-theme="light"] select option:checked {
            background-color: var(--color-aurora);
            color: #FFFFFF;
        }

        .filter-bar-admin .filter-actions {
            display: flex;
            gap: 8px;
            margin-left: auto;
        }

        /* ===== RESULTADOS INFO ===== */
        .resultados-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-left: auto;
            white-space: nowrap;
        }

        /* ========================================== */
        /* PAGINAÇÃO - COMPLETO                       */
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
            border-color: var(--color-aurora);
            color: var(--color-aurora);
            background: rgba(108, 43, 217, 0.04);
        }

        .table-pagination .page-btn.active {
            background: var(--gradient-aurora);
            color: white;
            border-color: var(--color-aurora);
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
            max-width: 600px;
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
            color: var(--color-aurora);
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

        #modalConfirmacao .modal-footer .btn {
            min-width: 120px;
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
            border-color: var(--color-aurora);
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

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .empresas-grid {
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .empresas-container {
                padding: var(--space-md);
            }

            .empresas-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .empresa-header {
                flex-wrap: wrap;
            }

            .empresa-avatar {
                width: 100%;
                text-align: center;
            }

            .empresa-avatar img {
                width: 64px;
                height: 64px;
            }

            .empresa-avatar .status-badge {
                position: relative;
                bottom: auto;
                left: auto;
                transform: none;
                margin-top: 4px;
            }

            .empresa-info {
                text-align: center;
                width: 100%;
            }

            .empresa-actions {
                width: 100%;
                justify-content: center;
            }

            .empresa-detalhes {
                grid-template-columns: 1fr;
            }

            .empresa-footer {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .empresa-footer .empresa-stats {
                justify-content: center;
            }

            .empresa-footer .empresa-footer-actions .btn {
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

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card {
                padding: var(--space-sm) var(--space-md);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }

            .table-pagination {
                gap: 3px;
                padding: 8px 0 4px;
            }

            .table-pagination .page-btn {
                min-width: 28px;
                height: 28px;
                font-size: var(--text-xs);
            }

            .table-pagination .page-info {
                font-size: var(--text-xs);
                padding: 0 8px;
                width: 100%;
                text-align: center;
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
            .empresas-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .empresa-card {
                padding: var(--space-sm);
            }

            .empresa-avatar img {
                width: 48px;
                height: 48px;
            }

            .empresa-info h4 {
                font-size: var(--text-h4);
            }

            .empresa-actions .btn {
                padding: 2px 4px;
                font-size: 0.55rem;
                min-width: 24px;
                height: 24px;
            }

            .empresa-detalhes .detalhe-item {
                font-size: var(--text-xs);
            }

            .empresa-footer .empresa-stats {
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

            .filter-bar-admin .filter-group label {
                font-size: var(--text-xs);
            }

            .filter-bar-admin select,
            .filter-bar-admin input {
                font-size: var(--text-sm);
                padding: 4px 8px;
            }

            .table-pagination .page-btn {
                min-width: 24px;
                height: 24px;
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