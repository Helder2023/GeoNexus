<?php
// painel/admin/projetos-global.php - Gestão Global de Projetos (Visualização)
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Gestão Global de Projetos';
$pagina_atual = 'projetos-global';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Projetos com localização (coordenadas)
$projetos = [
    // ===== PROJETOS DE PROFISSIONAIS (INDIVIDUAIS) =====
    [
        'id' => 1,
        'nome' => 'Levantamento Topográfico - Luanda Sul',
        'descricao' => 'Levantamento topográfico detalhado para projeto de urbanização da zona sul de Luanda',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Carlos Mendes',
        'responsavel_id' => 1,
        'responsavel_avatar' => 'profissional-1.png',
        'cliente' => 'Construtora ABC',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'data_inicio' => '2026-01-15',
        'data_fim_prevista' => '2026-03-15',
        'orcamento' => 450000,
        'progresso' => 65,
        'setor' => 'Topografia',
        'lat' => -8.839,
        'lng' => 13.289,
        'endereco' => 'Luanda Sul, Luanda, Angola',
        'avatar' => 'projeto-1.png'
    ],
    [
        'id' => 2,
        'nome' => 'Georreferenciamento - Kilamba',
        'descricao' => 'Georreferenciamento de lotes e infraestrutura do bairro do Kilamba',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Ana Costa',
        'responsavel_id' => 2,
        'responsavel_avatar' => 'profissional-2.png',
        'cliente' => 'Urbanismo Sustentável',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'media',
        'data_inicio' => '2025-12-01',
        'data_fim_prevista' => '2026-01-20',
        'orcamento' => 320000,
        'progresso' => 100,
        'setor' => 'GIS',
        'lat' => -8.959,
        'lng' => 13.269,
        'endereco' => 'Kilamba, Luanda, Angola',
        'avatar' => 'projeto-2.png'
    ],
    [
        'id' => 3,
        'nome' => 'Modelagem 3D - Talatona',
        'descricao' => 'Modelagem 3D do centro empresarial da Talatona para projeto de expansão',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Pedro Santos',
        'responsavel_id' => 3,
        'responsavel_avatar' => 'profissional-3.png',
        'cliente' => 'Instituto Técnico de Luanda',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'data_inicio' => '2026-02-01',
        'data_fim_prevista' => '2026-04-01',
        'orcamento' => 580000,
        'progresso' => 45,
        'setor' => 'Engenharia Civil',
        'lat' => -8.909,
        'lng' => 13.209,
        'endereco' => 'Talatona, Luanda, Angola',
        'avatar' => 'projeto-3.png'
    ],
    [
        'id' => 4,
        'nome' => 'Levantamento GNSS - Viana',
        'descricao' => 'Levantamento geodésico com GNSS para implantação de rede de referência',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Marisa Lima',
        'responsavel_id' => 4,
        'responsavel_avatar' => 'profissional-4.png',
        'cliente' => 'GIS Solutions',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'baixa',
        'data_inicio' => '2025-11-01',
        'data_fim_prevista' => '2025-12-15',
        'orcamento' => 180000,
        'progresso' => 100,
        'setor' => 'Topografia',
        'lat' => -8.909,
        'lng' => 13.369,
        'endereco' => 'Viana, Luanda, Angola',
        'avatar' => 'projeto-4.png'
    ],
    [
        'id' => 5,
        'nome' => 'Estudo de Impacto Ambiental - Zona Industrial',
        'descricao' => 'Estudo de impacto ambiental para nova zona industrial do Bengo',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Rui Oliveira',
        'responsavel_id' => 5,
        'responsavel_avatar' => 'profissional-5.png',
        'cliente' => 'Mineração Progresso',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'data_inicio' => '2026-01-20',
        'data_fim_prevista' => '2026-04-20',
        'orcamento' => 720000,
        'progresso' => 60,
        'setor' => 'Mineração',
        'lat' => -9.019,
        'lng' => 13.419,
        'endereco' => 'Bengo, Angola',
        'avatar' => 'projeto-5.png'
    ],
    [
        'id' => 6,
        'nome' => 'Simulação de Reservatório - Kwanza Sul',
        'descricao' => 'Simulação de reservatório petrolífero na bacia do Kwanza Sul',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Sofia Rodrigues',
        'responsavel_id' => 6,
        'responsavel_avatar' => 'profissional-6.png',
        'cliente' => 'Energia Futuro',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'data_inicio' => '2026-02-05',
        'data_fim_prevista' => '2026-05-05',
        'orcamento' => 950000,
        'progresso' => 35,
        'setor' => 'Petróleo & Gás',
        'lat' => -11.209,
        'lng' => 13.909,
        'endereco' => 'Kwanza Sul, Angola',
        'avatar' => 'projeto-6.png'
    ],

    // ===== PROJETOS DE EMPRESAS =====
    [
        'id' => 7,
        'nome' => 'Estudo de Tráfego - Via Expressa',
        'descricao' => 'Estudo de tráfego e mobilidade para a nova via expressa de Luanda',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Construtora ABC',
        'responsavel_id' => 1,
        'responsavel_avatar' => 'empresa-1.png',
        'cliente' => 'Governo Provincial de Luanda',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'media',
        'data_inicio' => '2025-10-01',
        'data_fim_prevista' => '2025-12-01',
        'orcamento' => 280000,
        'progresso' => 100,
        'setor' => 'Transportes',
        'lat' => -8.839,
        'lng' => 13.239,
        'endereco' => 'Luanda, Angola',
        'avatar' => 'projeto-7.png'
    ],
    [
        'id' => 8,
        'nome' => 'Inspeção com Drones - Barragem do Capanda',
        'descricao' => 'Inspeção visual e termográfica da barragem do Capanda com drones',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Topografia Lima',
        'responsavel_id' => 2,
        'responsavel_avatar' => 'empresa-2.png',
        'cliente' => 'Energia Futuro',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'data_inicio' => '2026-02-10',
        'data_fim_prevista' => '2026-03-10',
        'orcamento' => 350000,
        'progresso' => 50,
        'setor' => 'Drones',
        'lat' => -9.749,
        'lng' => 14.869,
        'endereco' => 'Capanda, Malanje, Angola',
        'avatar' => 'projeto-8.png'
    ],
    [
        'id' => 9,
        'nome' => 'Levantamento Batimétrico - Rio Kwanza',
        'descricao' => 'Levantamento batimétrico do Rio Kwanza para projeto de navegabilidade',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Engenharia Santos',
        'responsavel_id' => 4,
        'responsavel_avatar' => 'empresa-4.png',
        'cliente' => 'Ministério dos Transportes',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'data_inicio' => '2026-02-15',
        'data_fim_prevista' => '2026-04-15',
        'orcamento' => 680000,
        'progresso' => 45,
        'setor' => 'Engenharia Civil',
        'lat' => -9.619,
        'lng' => 13.529,
        'endereco' => 'Rio Kwanza, Angola',
        'avatar' => 'projeto-9.png'
    ],
    [
        'id' => 10,
        'nome' => 'Sistema de Informação Geográfica - Huíla',
        'descricao' => 'Implantação de sistema GIS para gestão de recursos naturais da Huíla',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'GIS Solutions',
        'responsavel_id' => 3,
        'responsavel_avatar' => 'empresa-3.png',
        'cliente' => 'Governo da Huíla',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'baixa',
        'data_inicio' => '2025-09-01',
        'data_fim_prevista' => '2025-11-15',
        'orcamento' => 520000,
        'progresso' => 100,
        'setor' => 'GIS',
        'lat' => -14.909,
        'lng' => 13.489,
        'endereco' => 'Huíla, Angola',
        'avatar' => 'projeto-10.png'
    ],
    [
        'id' => 11,
        'nome' => 'Estudo de Viabilidade - Mina do Catoca',
        'descricao' => 'Estudo de viabilidade técnica e económica para expansão da mina do Catoca',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Mineração Progresso',
        'responsavel_id' => 7,
        'responsavel_avatar' => 'empresa-7.png',
        'cliente' => 'Sociedade Mineira do Catoca',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'data_inicio' => '2026-01-25',
        'data_fim_prevista' => '2026-05-25',
        'orcamento' => 1500000,
        'progresso' => 40,
        'setor' => 'Mineração',
        'lat' => -8.469,
        'lng' => 18.309,
        'endereco' => 'Catoca, Lunda Sul, Angola',
        'avatar' => 'projeto-11.png'
    ],
    [
        'id' => 12,
        'nome' => 'Planeamento Urbano - Nova Centralidade',
        'descricao' => 'Planeamento urbano para nova centralidade no Zango',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Urbanismo Sustentável',
        'responsavel_id' => 10,
        'responsavel_avatar' => 'empresa-10.png',
        'cliente' => 'Governo Provincial de Luanda',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'data_inicio' => '2026-02-01',
        'data_fim_prevista' => '2026-05-01',
        'orcamento' => 850000,
        'progresso' => 48,
        'setor' => 'Urbanismo',
        'lat' => -8.879,
        'lng' => 13.319,
        'endereco' => 'Zango, Luanda, Angola',
        'avatar' => 'projeto-12.png'
    ],
    [
        'id' => 13,
        'nome' => 'Projeto de Irrigação - Kikuxi',
        'descricao' => 'Projeto de sistema de irrigação para agricultura familiar em Kikuxi',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Ferreira & Filhos',
        'responsavel_id' => 5,
        'responsavel_avatar' => 'empresa-5.png',
        'cliente' => 'Ministério da Agricultura',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'prioridade' => 'media',
        'data_inicio' => '2026-03-15',
        'data_fim_prevista' => '2026-06-15',
        'orcamento' => 380000,
        'progresso' => 0,
        'setor' => 'Agricultura de Precisão',
        'lat' => -8.769,
        'lng' => 13.289,
        'endereco' => 'Kikuxi, Luanda, Angola',
        'avatar' => 'projeto-13.png'
    ],
    [
        'id' => 14,
        'nome' => 'Plano Diretor - Luanda 2030',
        'descricao' => 'Plano diretor de ordenamento do território para Luanda até 2030',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Inês Almeida',
        'responsavel_id' => 8,
        'responsavel_avatar' => 'profissional-8.png',
        'cliente' => 'Instituto Técnico de Luanda',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'data_inicio' => '2026-01-10',
        'data_fim_prevista' => '2026-06-10',
        'orcamento' => 1200000,
        'progresso' => 55,
        'setor' => 'Urbanismo',
        'lat' => -8.838,
        'lng' => 13.234,
        'endereco' => 'Luanda, Angola',
        'avatar' => 'projeto-14.png'
    ],
    [
        'id' => 15,
        'nome' => 'Formação em GIS - Professores do Bié',
        'descricao' => 'Curso de formação em GIS para professores do ensino técnico do Bié',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'João Pereira',
        'responsavel_id' => 11,
        'responsavel_avatar' => 'profissional-11.png',
        'cliente' => 'Instituto de Ensino Técnico do Bié',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'prioridade' => 'baixa',
        'data_inicio' => '2026-04-01',
        'data_fim_prevista' => '2026-05-15',
        'orcamento' => 150000,
        'progresso' => 0,
        'setor' => 'Educação',
        'lat' => -12.379,
        'lng' => 16.939,
        'endereco' => 'Bié, Angola',
        'avatar' => 'projeto-15.png'
    ]
];

// Estatísticas
$total_projetos = count($projetos);
$total_em_andamento = count(array_filter($projetos, function($p) { return $p['status'] === 'em_andamento'; }));
$total_concluidos = count(array_filter($projetos, function($p) { return $p['status'] === 'concluido'; }));
$total_pendentes = count(array_filter($projetos, function($p) { return $p['status'] === 'pendente'; }));

// Projetos por tipo
$total_individuais = count(array_filter($projetos, function($p) { return $p['tipo'] === 'individual'; }));
$total_empresariais = count(array_filter($projetos, function($p) { return $p['tipo'] === 'empresarial'; }));

// Setores para filtro
$setores = array_unique(array_column($projetos, 'setor'));
sort($setores);

// Status para filtro
$status_opcoes = [
    'em_andamento' => 'Em Andamento',
    'concluido' => 'Concluído',
    'pendente' => 'Pendente'
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
                        <?php if ($item['label'] === 'Projetos'): ?>
                            <span class="badge"><?php echo $total_projetos; ?></span>
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
                        <i class="fas fa-project-diagram icon"></i>
                        Gestão Global de Projetos
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Projetos</span>
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
                        <button class="btn btn-outline" onclick="exportarProjetos()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="value"><?php echo $total_projetos; ?></div>
                    <div class="label">Total de Projetos</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 15.2%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="value"><?php echo $total_em_andamento; ?></div>
                    <div class="label">Em Andamento</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 8.5%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $total_concluidos; ?></div>
                    <div class="label">Concluídos</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 12.3%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $total_pendentes; ?></div>
                    <div class="label">Pendentes</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 5.1%
                    </div>
                </div>
            </section>

            <!-- ===== STATS POR TIPO ===== -->
            <section class="stats-grid animate-fade-up" style="grid-template-columns: repeat(2, 1fr);">
                <div class="stat-card" style="border-left: 3px solid var(--color-turquoise);">
                    <div class="icon" style="background: rgba(0, 210, 255, 0.15); color: var(--color-turquoise);">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="value"><?php echo $total_individuais; ?></div>
                    <div class="label">Projetos de Profissionais</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 18.7%
                    </div>
                </div>

                <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                    <div class="icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="value"><?php echo $total_empresariais; ?></div>
                    <div class="label">Projetos de Empresas</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 10.2%
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filter-bar-admin animate-fade-up">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchProjeto" placeholder="Pesquisar projeto..." oninput="aplicarFiltros()">
                </div>
                <div class="filter-group">
                    <label>Tipo</label>
                    <select id="filterTipo" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="individual">Profissional</option>
                        <option value="empresarial">Empresa</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Status</label>
                    <select id="filterStatus" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <?php foreach ($status_opcoes as $value => $label): ?>
                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Setor</label>
                    <select id="filterSetor" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <?php foreach ($setores as $setor): ?>
                            <option value="<?php echo $setor; ?>"><?php echo $setor; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Prioridade</label>
                    <select id="filterPrioridade" onchange="aplicarFiltros()">
                        <option value="">Todas</option>
                        <option value="alta">Alta</option>
                        <option value="media">Média</option>
                        <option value="baixa">Baixa</option>
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
                <span class="resultados-info" id="resultadosInfo"><?php echo $total_projetos; ?> resultados</span>
            </div>

            <!-- ===== MAPA DE PROJETOS ===== -->
            <div class="map-container animate-fade-up">
                <h3><i class="fas fa-map-marked-alt"></i> Localização dos Projetos</h3>
                <div id="projetosMap" style="width: 100%; height: 400px; border-radius: var(--radius-md);"></div>
                <div class="map-legend">
                    <span class="legend-item">
                        <span class="legend-color" style="background: #00D2FF;"></span>
                        Profissionais
                    </span>
                    <span class="legend-item">
                        <span class="legend-color" style="background: #FF6B6B;"></span>
                        Empresas
                    </span>
                    <span class="legend-item">
                        <span class="legend-color" style="background: #00FFA3;"></span>
                        Concluídos
                    </span>
                    <span class="legend-item">
                        <span class="legend-color" style="background: #FFD93D;"></span>
                        Pendentes
                    </span>
                </div>
            </div>

            <!-- ===== LISTA DE PROJETOS ===== -->
            <div class="projetos-container">
                <div class="projetos-grid" id="projetosGrid">
                    <?php foreach ($projetos as $projeto): ?>
                        <div class="projeto-card animate-fade-up" 
                             data-id="<?php echo $projeto['id']; ?>"
                             data-tipo="<?php echo $projeto['tipo']; ?>"
                             data-status="<?php echo $projeto['status']; ?>"
                             data-setor="<?php echo $projeto['setor']; ?>"
                             data-prioridade="<?php echo $projeto['prioridade']; ?>"
                             data-nome="<?php echo strtolower($projeto['nome']); ?>"
                             data-responsavel="<?php echo strtolower($projeto['responsavel']); ?>"
                             data-cliente="<?php echo strtolower($projeto['cliente']); ?>">
                            
                            <div class="projeto-header">
                                <div class="projeto-avatar">
                                    <img src="../../assets/images/<?php echo $projeto['avatar']; ?>" 
                                         alt="<?php echo $projeto['nome']; ?>"
                                         onerror="this.src='<?php echo getAvatarUrl($projeto['nome']); ?>'">
                                    <span class="status-badge status-<?php echo $projeto['status']; ?>">
                                        <span class="status-dot"></span>
                                        <?php echo $projeto['status_label']; ?>
                                    </span>
                                </div>
                                <div class="projeto-info">
                                    <h4><?php echo $projeto['nome']; ?></h4>
                                    <div class="projeto-tags">
                                        <span class="projeto-tag tag-tipo <?php echo $projeto['tipo']; ?>">
                                            <i class="fas <?php echo $projeto['tipo'] === 'individual' ? 'fa-user-tie' : 'fa-building'; ?>"></i> 
                                            <?php echo $projeto['tipo_label']; ?>
                                        </span>
                                        <span class="projeto-tag tag-setor">
                                            <i class="fas fa-tag"></i> <?php echo $projeto['setor']; ?>
                                        </span>
                                        <span class="projeto-tag tag-prioridade <?php echo $projeto['prioridade']; ?>">
                                            <i class="fas fa-flag"></i> <?php echo ucfirst($projeto['prioridade']); ?>
                                        </span>
                                        <span class="projeto-tag tag-progresso">
                                            <i class="fas fa-chart-line"></i> <?php echo $projeto['progresso']; ?>%
                                        </span>
                                    </div>
                                </div>
                                <div class="projeto-actions">
                                    <a href="projeto-detalhe.php?id=<?php echo $projeto['id']; ?>" class="btn btn-sm btn-primary" title="Ver Detalhes">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                </div>
                            </div>

                            <div class="projeto-body">
                                <p class="projeto-descricao"><?php echo $projeto['descricao']; ?></p>
                                <div class="projeto-detalhes">
                                    <div class="detalhe-item">
                                        <i class="fas fa-user"></i>
                                        <span><strong>Responsável:</strong> <?php echo $projeto['responsavel']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-user-tie"></i>
                                        <span><strong>Cliente:</strong> <?php echo $projeto['cliente']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span><strong>Início:</strong> <?php echo date('d/m/Y', strtotime($projeto['data_inicio'])); ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-calendar-check"></i>
                                        <span><strong>Fim Previsto:</strong> <?php echo date('d/m/Y', strtotime($projeto['data_fim_prevista'])); ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-money-bill-wave"></i>
                                        <span><strong>Orçamento:</strong> Kz <?php echo formatMoney($projeto['orcamento']); ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><strong>Local:</strong> <?php echo $projeto['endereco']; ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Barra de Progresso -->
                            <div class="projeto-progresso">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: <?php echo $projeto['progresso']; ?>%; background: <?php echo $projeto['progresso'] >= 100 ? '#00FFA3' : ($projeto['progresso'] >= 50 ? '#00D2FF' : '#FF6B6B'); ?>;"></div>
                                </div>
                                <span class="progress-text"><?php echo $projeto['progresso']; ?>%</span>
                            </div>

                            <div class="projeto-footer">
                                <div class="projeto-stats">
                                    <span class="stat">
                                        <i class="fas fa-clock"></i>
                                        <?php 
                                        $dias_restantes = ceil((strtotime($projeto['data_fim_prevista']) - time()) / 86400);
                                        if ($projeto['status'] === 'concluido') {
                                            echo 'Concluído';
                                        } elseif ($dias_restantes < 0) {
                                            echo 'Atrasado';
                                        } else {
                                            echo $dias_restantes . ' dias restantes';
                                        }
                                        ?>
                                    </span>
                                    <span class="stat">
                                        <i class="fas fa-<?php echo $projeto['tipo'] === 'individual' ? 'user-tie' : 'building'; ?>"></i>
                                        <?php echo $projeto['tipo_label']; ?>
                                    </span>
                                    <span class="stat">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo $projeto['endereco']; ?>
                                    </span>
                                </div>
                                <div class="projeto-footer-actions">
                                    <a href="projeto-detalhe.php?id=<?php echo $projeto['id']; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="table-pagination" id="paginacaoProjetos">
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
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="../assets/js/main.js"></script>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        

        // ==========================================
        // DADOS DOS PROJETOS PARA O MAPA
        // ==========================================
        const projetosData = <?php echo json_encode($projetos); ?>;

        // ==========================================
        // INICIALIZAR MAPA
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar mapa centrado em Angola
            const map = L.map('projetosMap').setView([-11.2, 17.5], 6);

            // Adicionar tiles do OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 18
            }).addTo(map);

            // Definir ícones personalizados
            const iconIndividual = L.divIcon({
                className: 'custom-marker',
                html: '<div style="background: #00D2FF; width: 16px; height: 16px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);"></div>',
                iconSize: [16, 16],
                iconAnchor: [8, 8]
            });

            const iconEmpresa = L.divIcon({
                className: 'custom-marker',
                html: '<div style="background: #FF6B6B; width: 16px; height: 16px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);"></div>',
                iconSize: [16, 16],
                iconAnchor: [8, 8]
            });

            const iconConcluido = L.divIcon({
                className: 'custom-marker',
                html: '<div style="background: #00FFA3; width: 16px; height: 16px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);"></div>',
                iconSize: [16, 16],
                iconAnchor: [8, 8]
            });

            const iconPendente = L.divIcon({
                className: 'custom-marker',
                html: '<div style="background: #FFD93D; width: 16px; height: 16px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 8px rgba(0,0,0,0.3);"></div>',
                iconSize: [16, 16],
                iconAnchor: [8, 8]
            });

            // Função para escolher o ícone baseado no status e tipo
            function getIcon(projeto) {
                if (projeto.status === 'concluido') return iconConcluido;
                if (projeto.status === 'pendente') return iconPendente;
                if (projeto.tipo === 'individual') return iconIndividual;
                return iconEmpresa;
            }

            // Adicionar marcadores para cada projeto
            projetosData.forEach(function(projeto) {
                if (projeto.lat && projeto.lng) {
                    const marker = L.marker([projeto.lat, projeto.lng], {
                        icon: getIcon(projeto)
                    }).addTo(map);

                    // Popup com informações do projeto
                    const popupContent = `
                        <div style="min-width: 200px; max-width: 300px;">
                            <h4 style="margin: 0 0 6px 0; font-family: 'Orbitron', sans-serif; font-size: 14px; color: #1A1A2E;">${projeto.nome}</h4>
                            <p style="margin: 0 0 4px 0; font-size: 12px; color: #6B7A8F;"><strong>Responsável:</strong> ${projeto.responsavel}</p>
                            <p style="margin: 0 0 4px 0; font-size: 12px; color: #6B7A8F;"><strong>Cliente:</strong> ${projeto.cliente}</p>
                            <p style="margin: 0 0 4px 0; font-size: 12px; color: #6B7A8F;"><strong>Setor:</strong> ${projeto.setor}</p>
                            <p style="margin: 0 0 4px 0; font-size: 12px; color: #6B7A8F;"><strong>Status:</strong> <span style="color: ${projeto.status === 'concluido' ? '#00FFA3' : (projeto.status === 'em_andamento' ? '#00D2FF' : '#FFD93D')};">${projeto.status_label}</span></p>
                            <p style="margin: 0 0 4px 0; font-size: 12px; color: #6B7A8F;"><strong>Progresso:</strong> ${projeto.progresso}%</p>
                            <p style="margin: 0; font-size: 12px; color: #6B7A8F;"><strong>Local:</strong> ${projeto.endereco}</p>
                            <a href="projeto-detalhe.php?id=${projeto.id}" style="display: inline-block; margin-top: 8px; padding: 4px 12px; background: #6C2BD9; color: white; text-decoration: none; border-radius: 4px; font-size: 12px;">Ver Detalhes</a>
                        </div>
                    `;

                    marker.bindPopup(popupContent);
                }
            });

            // Ajustar o mapa após o carregamento
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

            // Fechar modal com ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal.active').forEach(modal => {
                        fecharModal(modal.id);
                    });
                }
            });

            // Inicializar paginação
            const totalItens = document.querySelectorAll('.projeto-card').length;
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
            const search = document.getElementById('searchProjeto').value.toLowerCase().trim();
            const tipo = document.getElementById('filterTipo').value;
            const status = document.getElementById('filterStatus').value;
            const setor = document.getElementById('filterSetor').value;
            const prioridade = document.getElementById('filterPrioridade').value;

            const cards = document.querySelectorAll('.projeto-card');
            let visiveis = 0;

            cards.forEach(card => {
                const nome = card.dataset.nome || '';
                const responsavel = card.dataset.responsavel || '';
                const cliente = card.dataset.cliente || '';
                const cardTipo = card.dataset.tipo || '';
                const cardStatus = card.dataset.status || '';
                const cardSetor = card.dataset.setor || '';
                const cardPrioridade = card.dataset.prioridade || '';

                let show = true;

                if (search) {
                    show = nome.includes(search) || responsavel.includes(search) || cliente.includes(search);
                }

                if (show && tipo) {
                    show = cardTipo === tipo;
                }

                if (show && status) {
                    show = cardStatus === status;
                }

                if (show && setor) {
                    show = cardSetor === setor;
                }

                if (show && prioridade) {
                    show = cardPrioridade === prioridade;
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
                const container = document.getElementById('paginacaoProjetos');
                if (container) container.style.display = 'none';
                
                const grid = document.querySelector('.projetos-grid');
                if (grid) {
                    grid.innerHTML = `
                        <div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;">
                            <div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <h4 style="margin-top: 16px; color: var(--text-primary);">Nenhum projeto encontrado</h4>
                            <p style="color: var(--text-muted); margin-top: 8px;">Tente ajustar os filtros para encontrar o que procura.</p>
                        </div>
                    `;
                }
            }
        }

        function limparFiltros() {
            document.getElementById('searchProjeto').value = '';
            document.getElementById('filterTipo').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterSetor').value = '';
            document.getElementById('filterPrioridade').value = '';

            document.querySelectorAll('.projeto-card').forEach(card => {
                card.style.display = '';
            });

            totalItensVisiveis = document.querySelectorAll('.projeto-card').length;
            
            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            const grid = document.querySelector('.projetos-grid');
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
            const cards = document.querySelectorAll('.projeto-card:not([style*="display: none"])');
            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;

            document.querySelectorAll('.projeto-card').forEach(card => {
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
            const container = document.getElementById('paginacaoProjetos');

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
            const container = document.querySelector('.projetos-container');
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
        // EXPORTAÇÃO
        // ==========================================

        function exportarProjetos() {
            mostrarToast('Exportando lista de projetos...', 'info');
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
            const searchInput = document.getElementById('searchProjeto');
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
        /* MAPA - CSS                                */
        /* ========================================== */

        .map-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .map-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .map-container h3 {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .map-container h3 i {
            color: var(--color-turquoise);
        }

        #projetosMap {
            width: 100%;
            height: 400px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            background: var(--bg-primary);
        }

        /* ===== LEGENDA DO MAPA ===== */
        .map-legend {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-md);
            margin-top: var(--space-md);
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .legend-color {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            border: 2px solid var(--border-color);
        }

        /* ========================================== */
        /* PROJETOS - CSS COMPLETO                    */
        /* ========================================== */

        .projetos-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .projetos-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .projetos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        /* ===== PROJETO CARD ===== */
        .projeto-card {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            min-height: 380px;
        }

        .projeto-card:hover {
            border-color: var(--color-turquoise);
            transform: translateY(-4px);
            box-shadow: var(--glass-shadow);
        }

        /* ===== HEADER ===== */
        .projeto-header {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
        }

        .projeto-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .projeto-avatar img {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .projeto-avatar .status-badge {
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 0.55rem;
            padding: 1px 8px;
        }

        .projeto-info {
            flex: 1;
            min-width: 0;
        }

        .projeto-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 4px 0;
            line-height: 1.3;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .projeto-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 4px 8px;
            margin-top: 2px;
        }

        .projeto-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .projeto-tag i {
            font-size: 0.7rem;
        }

        .projeto-tag.tag-tipo.individual i {
            color: var(--color-turquoise);
        }

        .projeto-tag.tag-tipo.empresarial i {
            color: #FF6B6B;
        }

        .projeto-tag.tag-setor i {
            color: var(--color-aurora);
        }

        .projeto-tag.tag-prioridade.alta i {
            color: #FF6B6B;
        }

        .projeto-tag.tag-prioridade.media i {
            color: #F59E0B;
        }

        .projeto-tag.tag-prioridade.baixa i {
            color: #00FFA3;
        }

        .projeto-tag.tag-progresso i {
            color: #6C2BD9;
        }

        .projeto-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
            flex-wrap: wrap;
        }

        .projeto-actions .btn {
            padding: 4px 6px;
            font-size: var(--text-xs);
            min-width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .projeto-actions .btn-primary {
            background: var(--color-turquoise);
            color: #FFFFFF;
            border: none;
            padding: 4px 12px;
            font-size: var(--text-xs);
            min-width: auto;
            height: 28px;
            border-radius: var(--radius-sm);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: var(--transition-smooth);
        }

        .projeto-actions .btn-primary:hover {
            background: #00B8E6;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.3);
        }

        /* ===== BODY ===== */
        .projeto-body {
            flex: 1;
        }

        .projeto-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .projeto-detalhes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2px 12px;
        }

        .projeto-detalhes .detalhe-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-muted);
            min-width: 0;
            overflow: hidden;
        }

        .projeto-detalhes .detalhe-item i {
            width: 14px;
            color: var(--color-turquoise);
            font-size: 0.7rem;
            flex-shrink: 0;
        }

        .projeto-detalhes .detalhe-item span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            min-width: 0;
        }

        .projeto-detalhes .detalhe-item span strong {
            color: var(--text-primary);
        }

        /* ===== PROGRESSO ===== */
        .projeto-progresso {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding-top: var(--space-xs);
        }

        .progress-bar {
            flex: 1;
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .progress-text {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-muted);
            min-width: 35px;
            text-align: right;
        }

        /* ===== FOOTER ===== */
        .projeto-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .projeto-footer .projeto-stats {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .projeto-footer .projeto-stats .stat {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .projeto-footer .projeto-stats .stat i {
            color: var(--color-turquoise);
        }

        .projeto-footer .projeto-footer-actions .btn {
            font-size: var(--text-xs);
        }

        .projeto-footer .projeto-footer-actions .btn-primary {
            background: var(--color-turquoise);
            color: #FFFFFF;
            border: none;
            padding: 4px 12px;
            font-size: var(--text-xs);
            min-width: auto;
            height: 28px;
            border-radius: var(--radius-sm);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: var(--transition-smooth);
        }

        .projeto-footer .projeto-footer-actions .btn-primary:hover {
            background: #00B8E6;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.3);
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

        .status-em_andamento {
            background: rgba(0, 210, 255, 0.12);
            color: var(--color-turquoise);
        }

        .status-em_andamento .status-dot {
            background: var(--color-turquoise);
        }

        .status-concluido {
            background: rgba(0, 255, 163, 0.12);
            color: var(--color-future-green);
        }

        .status-concluido .status-dot {
            background: var(--color-future-green);
        }

        .status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .status-pendente .status-dot {
            background: #FFD93D;
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
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .projetos-grid {
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .projetos-container {
                padding: var(--space-md);
            }

            .projetos-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .projeto-card {
                min-height: auto;
            }

            .projeto-header {
                flex-wrap: wrap;
            }

            .projeto-avatar {
                width: 100%;
                text-align: center;
            }

            .projeto-avatar img {
                width: 64px;
                height: 64px;
            }

            .projeto-avatar .status-badge {
                position: relative;
                bottom: auto;
                left: auto;
                transform: none;
                margin-top: 4px;
            }

            .projeto-info {
                text-align: center;
                width: 100%;
            }

            .projeto-tags {
                justify-content: center;
            }

            .projeto-actions {
                width: 100%;
                justify-content: center;
            }

            .projeto-detalhes {
                grid-template-columns: 1fr;
            }

            .projeto-footer {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .projeto-footer .projeto-stats {
                justify-content: center;
            }

            .projeto-footer .projeto-footer-actions .btn {
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

            .map-container {
                padding: var(--space-md);
            }

            #projetosMap {
                height: 300px;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .projetos-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .projeto-card {
                padding: var(--space-sm);
            }

            .projeto-avatar img {
                width: 48px;
                height: 48px;
            }

            .projeto-info h4 {
                font-size: var(--text-body);
            }

            .projeto-actions .btn {
                padding: 2px 4px;
                font-size: 0.55rem;
                min-width: 24px;
                height: 24px;
            }

            .projeto-detalhes .detalhe-item {
                font-size: var(--text-xs);
            }

            .projeto-footer .projeto-stats {
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

            #projetosMap {
                height: 250px;
            }
        }

        /* ========================================== */
        /* CUSTOM MARKER - LEAFLET                    */
        /* ========================================== */

        .custom-marker {
            background: transparent;
            border: none;
        }

        /* Estilo do popup */
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

        /* Controle de zoom */
        .leaflet-control-zoom a {
            background: var(--bg-card) !important;
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }

        .leaflet-control-zoom a:hover {
            background: var(--bg-card-hover) !important;
        }

        /* Tiles em modo escuro */
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

        [data-theme="dark"] .leaflet-popup-content a {
            color: var(--color-turquoise);
        }

        [data-theme="dark"] .leaflet-control-zoom a {
            background: #1A2A4A !important;
            color: #FFFFFF !important;
            border-color: rgba(255, 255, 255, 0.08) !important;
        }

        [data-theme="dark"] .leaflet-control-zoom a:hover {
            background: rgba(255, 255, 255, 0.06) !important;
        }
    </style>

</body>
</html>