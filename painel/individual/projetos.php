<?php
// painel/individual/projetos.php - Lista de Projetos
include "../../includes/individual/notificacoes-individual-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Meus Projetos';
$pagina_atual = 'projetos';

// ============================================
// DADOS MOCKADOS - PROFISSIONAL
// ============================================
$profissional = [
    'id' => 1,
    'nome' => 'Carlos Mendes',
    'email' => 'carlos.mendes@email.com',
    'avatar' => 'avatar-1.png',
    'profissao' => 'Engenheiro Topógrafo',
    'plano' => 'Pro'
];

// ============================================
// LISTA DE PROJETOS
// ============================================
$projetos = [
    [
        'id' => 1,
        'codigo' => 'PRJ-2026-0001',
        'nome' => 'Levantamento Topográfico - Zona Norte',
        'descricao' => 'Levantamento topográfico completo da zona norte de Luanda, incluindo 50 hectares de terreno urbano com curvas de nível e pontos georreferenciados.',
        'cliente' => [
            'id' => 1,
            'nome' => 'Construtora ABC',
            'tipo' => 'Empresa',
            'email' => 'contato@construtoraabc.ao',
            'telefone' => '+244 222 345 678',
            'nif' => '5417896321'
        ],
        'setor' => 'topografia',
        'setor_nome' => 'Topografia',
        'setor_icon' => 'fa-mountain',
        'setor_color' => '#6C2BD9',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'progresso' => 65,
        'valor' => 350000,
        'valor_pago' => 175000,
        'data_inicio' => '2026-02-01',
        'data_fim' => '2026-03-15',
        'data_criacao' => '2026-01-28 10:30:00',
        'tarefas_total' => 12,
        'tarefas_concluidas' => 8,
        'anexos' => 5,
        'equipe' => 3,
        'local_trabalho' => 'setores/topografia/index.php?projeto=1'
    ],
    [
        'id' => 2,
        'codigo' => 'PRJ-2026-0002',
        'nome' => 'Mapeamento GIS - Área Industrial',
        'descricao' => 'Mapeamento GIS completo da área industrial de Luanda com análise espacial, mapas interativos e base de dados georreferenciada.',
        'cliente' => [
            'id' => 2,
            'nome' => 'Indústria Luanda',
            'tipo' => 'Empresa',
            'email' => 'contato@industrialuanda.ao',
            'telefone' => '+244 222 456 789',
            'nif' => '5417896322'
        ],
        'setor' => 'gis',
        'setor_nome' => 'GIS',
        'setor_icon' => 'fa-globe',
        'setor_color' => '#00FFA3',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'progresso' => 30,
        'valor' => 480000,
        'valor_pago' => 144000,
        'data_inicio' => '2026-02-10',
        'data_fim' => '2026-04-20',
        'data_criacao' => '2026-02-08 14:15:00',
        'tarefas_total' => 18,
        'tarefas_concluidas' => 5,
        'anexos' => 3,
        'equipe' => 4,
        'local_trabalho' => 'setores/gis/index.php?projeto=2'
    ],
    [
        'id' => 3,
        'codigo' => 'PRJ-2026-0003',
        'nome' => 'Levantamento Planialtimétrico',
        'descricao' => 'Levantamento planialtimétrico para projeto de urbanização do município de Luanda, com área de 120 hectares.',
        'cliente' => [
            'id' => 3,
            'nome' => 'Município de Luanda',
            'tipo' => 'Instituição',
            'email' => 'geral@luanda.gov.ao',
            'telefone' => '+244 222 567 890',
            'nif' => '5417896323'
        ],
        'setor' => 'urbanismo',
        'setor_nome' => 'Urbanismo',
        'setor_icon' => 'fa-city',
        'setor_color' => '#A29BFE',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'progresso' => 100,
        'valor' => 280000,
        'valor_pago' => 280000,
        'data_inicio' => '2026-01-05',
        'data_fim' => '2026-02-10',
        'data_criacao' => '2026-01-03 09:00:00',
        'tarefas_total' => 15,
        'tarefas_concluidas' => 15,
        'anexos' => 8,
        'equipe' => 2,
        'local_trabalho' => 'setores/urbanismo/index.php?projeto=3'
    ],
    [
        'id' => 4,
        'codigo' => 'PRJ-2026-0004',
        'nome' => 'Cadastro Rural - Fazenda Sunflower',
        'descricao' => 'Cadastro rural completo da Fazenda Sunflower com georreferenciamento, demarcação de limites e emissão de documentação.',
        'cliente' => [
            'id' => 4,
            'nome' => 'Agro Negócios Lda',
            'tipo' => 'Empresa',
            'email' => 'info@agronegocios.ao',
            'telefone' => '+244 222 678 901',
            'nif' => '5417896324'
        ],
        'setor' => 'cadastro',
        'setor_nome' => 'Cadastro',
        'setor_icon' => 'fa-home',
        'setor_color' => '#FFD93D',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'progresso' => 0,
        'valor' => 195000,
        'valor_pago' => 0,
        'data_inicio' => '2026-03-01',
        'data_fim' => '2026-04-15',
        'data_criacao' => '2026-02-15 11:45:00',
        'tarefas_total' => 8,
        'tarefas_concluidas' => 0,
        'anexos' => 2,
        'equipe' => 2,
        'local_trabalho' => 'setores/cadastro/index.php?projeto=4'
    ],
    [
        'id' => 5,
        'codigo' => 'PRJ-2026-0005',
        'nome' => 'Análise de Solo - Projeto Agrícola',
        'descricao' => 'Análise de solo e mapeamento agrícola de precisão para otimização de culturas na região do Huambo.',
        'cliente' => [
            'id' => 5,
            'nome' => 'Agro Negócios Lda',
            'tipo' => 'Empresa',
            'email' => 'info@agronegocios.ao',
            'telefone' => '+244 222 678 901',
            'nif' => '5417896324'
        ],
        'setor' => 'agricultura',
        'setor_nome' => 'Agricultura',
        'setor_icon' => 'fa-tractor',
        'setor_color' => '#6BCB77',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'progresso' => 45,
        'valor' => 220000,
        'valor_pago' => 110000,
        'data_inicio' => '2026-02-05',
        'data_fim' => '2026-03-30',
        'data_criacao' => '2026-02-03 15:20:00',
        'tarefas_total' => 10,
        'tarefas_concluidas' => 4,
        'anexos' => 4,
        'equipe' => 3,
        'local_trabalho' => 'setores/agricultura/index.php?projeto=5'
    ],
    [
        'id' => 6,
        'codigo' => 'PRJ-2026-0006',
        'nome' => 'Levantamento com Drone - Área Costeira',
        'descricao' => 'Levantamento aéreo com drone para mapeamento de área costeira e geração de ortomosaico.',
        'cliente' => [
            'id' => 3,
            'nome' => 'Município de Luanda',
            'tipo' => 'Instituição',
            'email' => 'geral@luanda.gov.ao',
            'telefone' => '+244 222 567 890',
            'nif' => '5417896323'
        ],
        'setor' => 'drones',
        'setor_nome' => 'Drones',
        'setor_icon' => 'fa-drone',
        'setor_color' => '#FF6B6B',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'urgente',
        'prioridade_label' => 'Urgente',
        'progresso' => 80,
        'valor' => 320000,
        'valor_pago' => 160000,
        'data_inicio' => '2026-02-12',
        'data_fim' => '2026-03-05',
        'data_criacao' => '2026-02-10 08:30:00',
        'tarefas_total' => 6,
        'tarefas_concluidas' => 5,
        'anexos' => 12,
        'equipe' => 2,
        'local_trabalho' => 'setores/drones/index.php?projeto=6'
    ],
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_projetos = count($projetos);
$projetos_em_andamento = count(array_filter($projetos, fn($p) => $p['status'] === 'em_andamento'));
$projetos_concluidos = count(array_filter($projetos, fn($p) => $p['status'] === 'concluido'));
$projetos_pendentes = count(array_filter($projetos, fn($p) => $p['status'] === 'pendente'));
$valor_total = array_sum(array_column($projetos, 'valor'));
$valor_recebido = array_sum(array_column($projetos, 'valor_pago'));
$valor_pendente = $valor_total - $valor_recebido;

// ============================================
// SETORES ÚNICOS (para filtro)
// ============================================
$setores_unicos = [];
foreach ($projetos as $p) {
    if (!isset($setores_unicos[$p['setor']])) {
        $setores_unicos[$p['setor']] = [
            'id' => $p['setor'],
            'nome' => $p['setor_nome'],
            'icon' => $p['setor_icon'],
            'color' => $p['setor_color']
        ];
    }
}

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date) {
        if (empty($date)) return 'N/A';
        return date('d/m/Y', strtotime($date));
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6C2BD9&color=fff&size=80';
    }
}

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'em_andamento' => 'status-em-andamento',
            'concluido' => 'status-concluido',
            'pendente' => 'status-pendente',
            'cancelado' => 'status-cancelado',
            'arquivado' => 'status-arquivado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getPrioridadeClass')) {
    function getPrioridadeClass($prioridade) {
        $classes = [
            'urgente' => 'prioridade-urgente',
            'alta' => 'prioridade-alta',
            'media' => 'prioridade-media',
            'baixa' => 'prioridade-baixa'
        ];
        return isset($classes[$prioridade]) ? $classes[$prioridade] : 'prioridade-media';
    }
}

if (!function_exists('diasRestantes')) {
    function diasRestantes($data_fim) {
        $hoje = new DateTime();
        $fim = new DateTime($data_fim);
        $diff = $hoje->diff($fim);
        
        if ($fim < $hoje) {
            return ['texto' => 'Atrasado ' . $diff->days . ' dias', 'class' => 'atrasado'];
        }
        
        if ($diff->days === 0) {
            return ['texto' => 'Termina hoje', 'class' => 'urgente'];
        }
        
        if ($diff->days <= 7) {
            return ['texto' => $diff->days . ' dias restantes', 'class' => 'urgente'];
        }
        
        return ['texto' => $diff->days . ' dias restantes', 'class' => 'normal'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../includes/individual/individual-head.php" ?>

<body>
    <div class="app-container">
        <!-- Toast Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Overlay para sidebar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR INDIVIDUAL                         -->
        <!-- ========================================== -->
        <?php include "../../includes/individual/individual-sidebar.php" ?>
        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-project-diagram icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $total_projetos; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Projetos</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../includes/individual/notificacoes-individual.php" ?>

                    <a href="projeto-criar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Novo Projeto
                    </a>
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
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="value"><?php echo $projetos_em_andamento; ?></div>
                    <div class="label">Em Andamento</div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $projetos_concluidos; ?></div>
                    <div class="label">Concluídos</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $projetos_pendentes; ?></div>
                    <div class="label">Pendentes</div>
                </div>
            </section>

            <!-- ===== RESUMO FINANCEIRO ===== -->
            <section class="resumo-financeiro animate-fade-up" style="animation-delay: 0.1s;">
                <div class="resumo-item">
                    <div class="resumo-icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Valor Total</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_total); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon blue">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Recebido</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_recebido); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Pendente</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_pendente); ?></span>
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.2s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchProjeto" placeholder="Buscar projeto, cliente ou código..." 
                               oninput="filtrarProjetos()">
                    </div>
                    <div class="filtros-actions">
                        <button class="btn btn-sm btn-outline" onclick="abrirFiltrosAvancados()">
                            <i class="fas fa-filter"></i> Filtros
                        </button>
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="grid" onclick="mudarView('grid')" title="Grid">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="view-btn" data-view="list" onclick="mudarView('list')" title="Lista">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filtros rápidos por status -->
                <div class="filtros-status">
                    <button class="filtro-status active" data-status="todos" onclick="filtrarPorStatus('todos')">
                        Todos <span class="count"><?php echo $total_projetos; ?></span>
                    </button>
                    <button class="filtro-status" data-status="em_andamento" onclick="filtrarPorStatus('em_andamento')">
                        Em Andamento <span class="count"><?php echo $projetos_em_andamento; ?></span>
                    </button>
                    <button class="filtro-status" data-status="concluido" onclick="filtrarPorStatus('concluido')">
                        Concluídos <span class="count"><?php echo $projetos_concluidos; ?></span>
                    </button>
                    <button class="filtro-status" data-status="pendente" onclick="filtrarPorStatus('pendente')">
                        Pendentes <span class="count"><?php echo $projetos_pendentes; ?></span>
                    </button>
                </div>

                <!-- Filtros avançados (escondido) -->
                <div class="filtros-avancados" id="filtrosAvancados" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Setor</label>
                            <select class="form-control" id="filtroSetor" onchange="filtrarProjetos()">
                                <option value="">Todos os setores</option>
                                <?php foreach ($setores_unicos as $setor): ?>
                                    <option value="<?php echo $setor['id']; ?>"><?php echo $setor['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Prioridade</label>
                            <select class="form-control" id="filtroPrioridade" onchange="filtrarProjetos()">
                                <option value="">Todas as prioridades</option>
                                <option value="urgente">Urgente</option>
                                <option value="alta">Alta</option>
                                <option value="media">Média</option>
                                <option value="baixa">Baixa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cliente</label>
                            <select class="form-control" id="filtroCliente" onchange="filtrarProjetos()">
                                <option value="">Todos os clientes</option>
                                <?php 
                                $clientes_unicos = [];
                                foreach ($projetos as $p) {
                                    $clientes_unicos[$p['cliente']['id']] = $p['cliente']['nome'];
                                }
                                foreach ($clientes_unicos as $id => $nome): 
                                ?>
                                    <option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="filtros-avancados-actions">
                        <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount">
                            <?php echo $total_projetos; ?> resultado(s)
                        </span>
                    </div>
                </div>
            </section>

            <!-- ===== LISTA DE PROJETOS ===== -->
            <section class="projetos-container animate-fade-up" id="projetosContainer" style="animation-delay: 0.3s;">
                <?php if (empty($projetos)): ?>
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h3>Nenhum projeto encontrado</h3>
                        <p>Crie o seu primeiro projeto para começar</p>
                        <a href="projeto-criar.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Criar Projeto
                        </a>
                    </div>
                <?php else: ?>
                    <div class="projetos-grid" id="projetosGrid">
                        <?php foreach ($projetos as $projeto): 
                            $dias = diasRestantes($projeto['data_fim']);
                            $percentual_pago = $projeto['valor'] > 0 ? round(($projeto['valor_pago'] / $projeto['valor']) * 100) : 0;
                        ?>
                            <div class="projeto-card" 
                                 data-id="<?php echo $projeto['id']; ?>"
                                 data-status="<?php echo $projeto['status']; ?>"
                                 data-setor="<?php echo $projeto['setor']; ?>"
                                 data-prioridade="<?php echo $projeto['prioridade']; ?>"
                                 data-cliente="<?php echo $projeto['cliente']['id']; ?>"
                                 data-busca="<?php echo strtolower($projeto['nome'] . ' ' . $projeto['codigo'] . ' ' . $projeto['cliente']['nome']); ?>">
                                
                                <!-- ===== CABEÇALHO DO CARD ===== -->
                                <div class="projeto-card-header" style="--setor-color: <?php echo $projeto['setor_color']; ?>;">
                                    <div class="projeto-card-setor">
                                        <div class="setor-icon" style="background: <?php echo $projeto['setor_color']; ?>20; color: <?php echo $projeto['setor_color']; ?>;">
                                            <i class="fas <?php echo $projeto['setor_icon']; ?>"></i>
                                        </div>
                                        <div class="projeto-card-setor-info">
                                            <span class="setor-nome"><?php echo $projeto['setor_nome']; ?></span>
                                            <span class="projeto-codigo"><?php echo $projeto['codigo']; ?></span>
                                        </div>
                                    </div>
                                    <div class="projeto-card-status">
                                        <span class="badge-status <?php echo getStatusClass($projeto['status']); ?>">
                                            <?php echo $projeto['status_label']; ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- ===== CORPO DO CARD ===== -->
                                <div class="projeto-card-body">
                                    <h3 class="projeto-titulo"><?php echo $projeto['nome']; ?></h3>
                                    <p class="projeto-descricao"><?php echo mb_substr($projeto['descricao'], 0, 120) . (mb_strlen($projeto['descricao']) > 120 ? '...' : ''); ?></p>

                                    <!-- Cliente -->
                                    <div class="projeto-cliente-info">
                                        <div class="cliente-avatar">
                                            <i class="fas <?php echo $projeto['cliente']['tipo'] === 'Instituição' ? 'fa-university' : ($projeto['cliente']['tipo'] === 'Empresa' ? 'fa-building' : 'fa-user'); ?>"></i>
                                        </div>
                                        <div class="cliente-dados">
                                            <span class="cliente-nome"><?php echo $projeto['cliente']['nome']; ?></span>
                                            <span class="cliente-tipo"><?php echo $projeto['cliente']['tipo']; ?></span>
                                        </div>
                                        <span class="cliente-badge">
                                            <i class="fas fa-user-tie"></i>
                                        </span>
                                    </div>

                                    <!-- Progresso -->
                                    <div class="projeto-progresso-section">
                                        <div class="progresso-header">
                                            <span class="progresso-label">Progresso</span>
                                            <span class="progresso-percent"><?php echo $projeto['progresso']; ?>%</span>
                                        </div>
                                        <div class="progresso-barra">
                                            <div class="progresso-preenchimento" 
                                                 style="width: <?php echo $projeto['progresso']; ?>%; background: <?php echo $projeto['setor_color']; ?>;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Métricas -->
                                    <div class="projeto-metricas">
                                        <div class="metrica">
                                            <i class="fas fa-tasks"></i>
                                            <span><?php echo $projeto['tarefas_concluidas']; ?>/<?php echo $projeto['tarefas_total']; ?></span>
                                            <small>Tarefas</small>
                                        </div>
                                        <div class="metrica">
                                            <i class="fas fa-users"></i>
                                            <span><?php echo $projeto['equipe']; ?></span>
                                            <small>Equipe</small>
                                        </div>
                                        <div class="metrica">
                                            <i class="fas fa-paperclip"></i>
                                            <span><?php echo $projeto['anexos']; ?></span>
                                            <small>Anexos</small>
                                        </div>
                                    </div>

                                    <!-- Datas -->
                                    <div class="projeto-datas">
                                        <div class="data-item">
                                            <i class="fas fa-play-circle"></i>
                                            <div>
                                                <span class="data-label">Início</span>
                                                <span class="data-value"><?php echo formatDate($projeto['data_inicio']); ?></span>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <i class="fas fa-flag-checkered"></i>
                                            <div>
                                                <span class="data-label">Término</span>
                                                <span class="data-value"><?php echo formatDate($projeto['data_fim']); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Alerta de prazo -->
                                    <div class="projeto-prazo <?php echo $dias['class']; ?>">
                                        <i class="fas <?php echo $dias['class'] === 'atrasado' ? 'fa-exclamation-triangle' : 'fa-clock'; ?>"></i>
                                        <span><?php echo $dias['texto']; ?></span>
                                    </div>
                                </div>

                                <!-- ===== FOOTER DO CARD ===== -->
                                <div class="projeto-card-footer">
                                    <div class="projeto-valor">
                                        <span class="valor-total">Kz <?php echo formatMoney($projeto['valor']); ?></span>
                                        <span class="valor-info">
                                            <span class="valor-pago"><?php echo $percentual_pago; ?>% pago</span>
                                        </span>
                                    </div>

                                    <div class="projeto-actions">
                                        <a href="projeto-detalhe.php?id=<?php echo $projeto['id']; ?>" 
                                           class="btn-action" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="projeto-editar.php?id=<?php echo $projeto['id']; ?>" 
                                           class="btn-action" title="Editar Projeto">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?php echo $projeto['local_trabalho']; ?>" 
                                           class="btn-action btn-action-primary" title="Abrir Local de Trabalho">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                        <a href="projeto-excluir.php?id=<?php echo $projeto['id']; ?>" 
                                           class="btn-action btn-action-danger" 
                                           title="Excluir Projeto"
                                           onclick="return confirmarExclusao(event, '<?php echo addslashes($projeto['nome']); ?>')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- ===== BOTÃO LOCAL DE TRABALHO DESTACADO ===== -->
                                <a href="<?php echo $projeto['local_trabalho']; ?>" 
                                   class="btn-local-trabalho" 
                                   style="--setor-color: <?php echo $projeto['setor_color']; ?>;"
                                   title="Abrir ferramentas do setor <?php echo $projeto['setor_nome']; ?>">
                                    <div class="btn-local-trabalho-content">
                                        <div class="btn-local-trabalho-icon">
                                            <i class="fas <?php echo $projeto['setor_icon']; ?>"></i>
                                        </div>
                                        <div class="btn-local-trabalho-text">
                                            <span class="btn-local-trabalho-label">Local de Trabalho</span>
                                            <span class="btn-local-trabalho-setor"><?php echo $projeto['setor_nome']; ?></span>
                                        </div>
                                        <i class="fas fa-arrow-right btn-local-trabalho-arrow"></i>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- ===== PAGINAÇÃO ===== -->
                    <div class="paginacao" id="paginacao">
                        <button class="page-btn" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="page-info">Página 1 de 1</span>
                        <button class="page-btn" disabled>
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MENU CONTEXTUAL DO CARD                    -->
    <!-- ========================================== -->
    <div class="context-menu" id="contextMenu">
        <a href="#" class="context-item" id="menuVerDetalhes">
            <i class="fas fa-eye"></i>
            <span>Ver Detalhes</span>
        </a>
        <a href="#" class="context-item" id="menuEditar">
            <i class="fas fa-edit"></i>
            <span>Editar Projeto</span>
        </a>
        <a href="#" class="context-item" id="menuLocalTrabalho">
            <i class="fas fa-external-link-alt"></i>
            <span>Local de Trabalho</span>
        </a>
        <hr>
        <a href="#" class="context-item" id="menuArquivar">
            <i class="fas fa-archive"></i>
            <span>Arquivar</span>
        </a>
        <a href="#" class="context-item context-item-danger" id="menuExcluir">
            <i class="fas fa-trash"></i>
            <span>Excluir Projeto</span>
        </a>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO DE EXCLUSÃO           -->
    <!-- ========================================== -->
    <div class="modal" id="modalExcluir">
        <div class="modal-overlay" onclick="fecharModalExcluir()"></div>
        <div class="modal-content modal-content-danger">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Exclusão
                </h3>
                <button class="modal-close" onclick="fecharModalExcluir()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-trash"></i>
                    <div>
                        <strong>Esta ação é irreversível!</strong>
                        <span>Todos os dados do projeto serão permanentemente excluídos.</span>
                    </div>
                </div>
                <p class="modal-texto">
                    Tem certeza que deseja excluir o projeto
                </p>
                <p class="modal-projeto-nome" id="modalProjetoNome">-</p>
                <p class="modal-texto-small">
                    Ao excluir, os seguintes dados serão removidos:
                </p>
                <ul class="modal-lista-danger">
                    <li><i class="fas fa-times-circle"></i> Todas as tarefas e etapas</li>
                    <li><i class="fas fa-times-circle"></i> Todos os anexos e documentos</li>
                    <li><i class="fas fa-times-circle"></i> Histórico completo do projeto</li>
                    <li><i class="fas fa-times-circle"></i> Vínculos com o cliente</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalExcluir()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <a href="#" class="btn btn-danger" id="modalBtnExcluir">
                    <i class="fas fa-trash"></i> Excluir Permanentemente
                </a>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // TOGGLE SIDEBAR (Desktop)
        // ============================================
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

        // ============================================
        // TOGGLE SIDEBAR (Mobile)
        // ============================================
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

        // ============================================
        // PERFIL DROPDOWN
        // ============================================
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
        });

        // ============================================
        // THEME
        // ============================================
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const btnTheme = document.getElementById('btnTheme');
            if (btnTheme) {
                btnTheme.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ============================================
        // TOAST
        // ============================================
        if (typeof window.mostrarToast === 'undefined') {
            window.mostrarToast = function(mensagem, tipo = 'success') {
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

                const existingToasts = container.querySelectorAll('.toast');
                if (existingToasts.length >= 5) {
                    existingToasts[0].remove();
                }

                const toast = document.createElement('div');
                toast.className = 'toast toast-' + tipo;
                toast.innerHTML = `
                    <div class="toast-content">
                        <i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i>
                        <span>${mensagem}</span>
                    </div>
                    <button class="toast-close" onclick="this.parentElement.remove()" aria-label="Fechar">&times;</button>
                `;

                container.appendChild(toast);

                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        toast.classList.add('show');
                    });
                });

                const timeout = setTimeout(function() {
                    if (toast.parentElement) {
                        toast.classList.remove('show');
                        setTimeout(function() {
                            if (toast.parentElement) toast.remove();
                        }, 400);
                    }
                }, 4000);

                const closeBtn = toast.querySelector('.toast-close');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function() {
                        clearTimeout(timeout);
                    });
                }
            };
        }
        var mostrarToast = window.mostrarToast;

        // ============================================
        // FILTRAR PROJETOS
        // ============================================
        let filtroStatusAtual = 'todos';

        function filtrarPorStatus(status) {
            filtroStatusAtual = status;
            
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === status);
            });
            
            filtrarProjetos();
        }

        function filtrarProjetos() {
            const search = (document.getElementById('searchProjeto')?.value || '').toLowerCase().trim();
            const setor = document.getElementById('filtroSetor')?.value || '';
            const prioridade = document.getElementById('filtroPrioridade')?.value || '';
            const cliente = document.getElementById('filtroCliente')?.value || '';

            const cards = document.querySelectorAll('.projeto-card');
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && card.dataset.status !== filtroStatusAtual) {
                    mostrar = false;
                }

                if (mostrar && search) {
                    mostrar = card.dataset.busca.includes(search);
                }

                if (mostrar && setor && card.dataset.setor !== setor) {
                    mostrar = false;
                }

                if (mostrar && prioridade && card.dataset.prioridade !== prioridade) {
                    mostrar = false;
                }

                if (mostrar && cliente && card.dataset.cliente !== cliente) {
                    mostrar = false;
                }

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            const count = document.getElementById('resultadosCount');
            if (count) count.textContent = visiveis + ' resultado(s)';

            const container = document.getElementById('projetosGrid');
            const emptyState = document.querySelector('.empty-state-filtro');
            
            if (visiveis === 0 && container) {
                if (!emptyState) {
                    const empty = document.createElement('div');
                    empty.className = 'empty-state empty-state-filtro';
                    empty.innerHTML = `
                        <i class="fas fa-search"></i>
                        <h3>Nenhum projeto encontrado</h3>
                        <p>Tente ajustar os filtros de pesquisa</p>
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar Filtros
                        </button>
                    `;
                    container.parentNode.appendChild(empty);
                }
            } else if (emptyState) {
                emptyState.remove();
            }
        }

        function limparFiltros() {
            document.getElementById('searchProjeto').value = '';
            document.getElementById('filtroSetor').value = '';
            document.getElementById('filtroPrioridade').value = '';
            document.getElementById('filtroCliente').value = '';
            filtroStatusAtual = 'todos';
            
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === 'todos');
            });
            
            filtrarProjetos();
        }

        function abrirFiltrosAvancados() {
            const filtros = document.getElementById('filtrosAvancados');
            const isHidden = filtros.style.display === 'none';
            filtros.style.display = isHidden ? 'block' : 'none';
        }

        // ============================================
        // MUDAR VISUALIZAÇÃO (GRID/LISTA)
        // ============================================
        function mudarView(view) {
            const container = document.getElementById('projetosGrid');
            if (!container) return;

            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === view);
            });

            if (view === 'list') {
                container.classList.add('projetos-list-view');
            } else {
                container.classList.remove('projetos-list-view');
            }

            localStorage.setItem('geonnexus-projetos-view', view);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedView = localStorage.getItem('geonnexus-projetos-view');
            if (savedView) mudarView(savedView);
        });

        // ============================================
        // MENU CONTEXTUAL DOS CARDS
        // ============================================
        let projetoAtualMenu = null;
        let projetoAtualNome = null;

        function abrirMenuCard(event, projetoId) {
            event.stopPropagation();
            event.preventDefault();

            const menu = document.getElementById('contextMenu');
            const rect = event.target.closest('button').getBoundingClientRect();

            projetoAtualMenu = projetoId;
            
            // Encontrar o nome do projeto
            const card = document.querySelector(`.projeto-card[data-id="${projetoId}"]`);
            if (card) {
                projetoAtualNome = card.querySelector('.projeto-titulo').textContent;
            }

            menu.style.position = 'fixed';
            menu.style.top = (rect.bottom + 5) + 'px';
            menu.style.left = (rect.right - 200) + 'px';
            menu.style.display = 'block';

            setTimeout(() => {
                const menuRect = menu.getBoundingClientRect();
                if (menuRect.right > window.innerWidth) {
                    menu.style.left = (window.innerWidth - menuRect.width - 10) + 'px';
                }
                if (menuRect.bottom > window.innerHeight) {
                    menu.style.top = (rect.top - menuRect.height - 5) + 'px';
                }
            }, 10);

            document.getElementById('menuVerDetalhes').href = 'projeto-detalhe.php?id=' + projetoId;
            document.getElementById('menuEditar').href = 'projeto-editar.php?id=' + projetoId;
            document.getElementById('menuExcluir').href = 'projeto-excluir.php?id=' + projetoId;
        }

        document.addEventListener('click', function(e) {
            const menu = document.getElementById('contextMenu');
            if (menu && !menu.contains(e.target) && !e.target.closest('.projeto-actions')) {
                menu.style.display = 'none';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const menu = document.getElementById('contextMenu');
                if (menu) menu.style.display = 'none';
                fecharModalExcluir();
            }
        });

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, nomeProjeto) {
            event.preventDefault();
            
            const modal = document.getElementById('modalExcluir');
            const btnExcluir = document.getElementById('modalBtnExcluir');
            const linkOriginal = event.currentTarget.href;
            
            document.getElementById('modalProjetoNome').textContent = '"' + nomeProjeto + '"';
            btnExcluir.href = linkOriginal;
            
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            return false;
        }

        function fecharModalExcluir() {
            const modal = document.getElementById('modalExcluir');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        // Configurar actions do menu
        document.addEventListener('DOMContentLoaded', function() {
            const menuLocalTrabalho = document.getElementById('menuLocalTrabalho');
            const menuArquivar = document.getElementById('menuArquivar');
            const menuExcluir = document.getElementById('menuExcluir');

            if (menuLocalTrabalho) {
                menuLocalTrabalho.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (projetoAtualMenu) {
                        const card = document.querySelector(`.projeto-card[data-id="${projetoAtualMenu}"]`);
                        const link = card?.querySelector('.btn-local-trabalho');
                        if (link) {
                            window.location.href = link.href;
                        }
                    }
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuArquivar) {
                menuArquivar.addEventListener('click', function(e) {
                    e.preventDefault();
                    mostrarToast('Projeto arquivado com sucesso!', 'success');
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuExcluir) {
                menuExcluir.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('contextMenu').style.display = 'none';
                    
                    if (projetoAtualNome && projetoAtualMenu) {
                        const modal = document.getElementById('modalExcluir');
                        const btnExcluir = document.getElementById('modalBtnExcluir');
                        
                        document.getElementById('modalProjetoNome').textContent = '"' + projetoAtualNome + '"';
                        btnExcluir.href = 'projeto-excluir.php?id=' + projetoAtualMenu;
                        
                        modal.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }
                });
            }
        });
    </script>

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO                             -->
    <!-- ========================================== -->
    <style>
        /* ========================================== */
        /* TOAST NOTIFICATIONS                        */
        /* ========================================== */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 999999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
            width: calc(100% - 40px);
            pointer-events: none;
        }

        .toast {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 18px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            transform: translateX(120%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: auto;
            position: relative;
            overflow: hidden;
            min-width: 280px;
        }

        .toast::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
        }

        .toast.toast-success::before { background: #00FFA3; }
        .toast.toast-error::before { background: #FF6B6B; }
        .toast.toast-warning::before { background: #FFD93D; }
        .toast.toast-info::before { background: #00D2FF; }

        .toast .toast-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .toast .toast-content i { font-size: 1.3rem; flex-shrink: 0; }
        .toast .toast-content span { font-size: var(--text-sm); color: var(--text-primary); font-weight: 500; }
        .toast .toast-close {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 1.4rem;
            cursor: pointer;
            padding: 0 4px;
            line-height: 1;
            flex-shrink: 0;
        }
        .toast .toast-close:hover { color: var(--text-primary); }
        .toast.show { transform: translateX(0); opacity: 1; }

        /* ========================================== */
        /* PAGE HEADER                                */
        /* ========================================== */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: var(--space-lg);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            flex-wrap: wrap;
            position: relative;
            overflow: visible;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #00D2FF 0%, #6C2BD9 100%);
            border-radius: var(--radius-lg) 0 0 var(--radius-lg);
        }

        .header-left {
            flex: 1;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .header-left h1 {
            font-family: var(--font-title);
            font-size: var(--text-h1);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #00D2FF; font-size: 0.85em; }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.3);
        }

        .header-left .breadcrumb {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: var(--transition-smooth); }
        .header-left .breadcrumb a:hover { color: #00D2FF; }
        .header-left .breadcrumb .separator { color: var(--text-muted); opacity: 0.5; }

        .header-right {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
            flex-wrap: wrap;
        }

        .btn-theme {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            background: var(--bg-input);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: var(--transition-smooth);
            position: relative;
        }

        .btn-theme:hover { border-color: #00D2FF; color: #00D2FF; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* STATS CARDS                                */
        /* ========================================== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .stat-card .icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-card .icon.aurora { background: rgba(108, 43, 217, 0.15); color: #6C2BD9; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* RESUMO FINANCEIRO                          */
        /* ========================================== */
        .resumo-financeiro {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .resumo-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .resumo-item:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .resumo-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .resumo-icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .resumo-icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .resumo-icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }

        .resumo-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .resumo-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .resumo-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* FILTROS                                    */
        /* ========================================== */
        .filtros {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .filtros-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 10px 14px 10px 42px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .search-box input:focus {
            outline: none;
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
        }

        .search-box input::placeholder { color: var(--text-muted); }

        .filtros-actions {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
        }

        .view-toggle {
            display: flex;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 2px;
            gap: 2px;
        }

        .view-btn {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            border: none;
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
        }

        .view-btn:hover { color: var(--text-primary); background: var(--bg-card-hover); }
        .view-btn.active { background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%); color: #FFFFFF; }

        .filtros-status {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .filtro-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .filtro-status:hover { border-color: #00D2FF; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            border-color: transparent;
        }

        .filtro-status .count {
            background: rgba(255, 255, 255, 0.2);
            padding: 1px 6px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
        }

        .filtro-status:not(.active) .count {
            background: var(--bg-card);
            color: var(--text-muted);
        }

        .filtros-avancados {
            padding-top: var(--space-md);
            margin-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .filtros-avancados .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: var(--space-md);
        }

        .filtros-avancados-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .resultados-count {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ========================================== */
        /* PROJETOS GRID                              */
        /* ========================================== */
        .projetos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        .projeto-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition-smooth);
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .projeto-card:hover {
            border-color: var(--setor-color, #00D2FF);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        /* ===== HEADER DO CARD ===== */
        .projeto-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            background: linear-gradient(135deg, var(--setor-color, #00D2FF)08 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
            gap: var(--space-sm);
        }

        .projeto-card-setor {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            min-width: 0;
        }

        .setor-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .projeto-card-setor-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .setor-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .projeto-codigo {
            font-family: var(--font-display);
            font-size: 10px;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        .badge-status {
            padding: 4px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-status.status-em-andamento { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-status.status-concluido { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-cancelado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        /* ===== BODY DO CARD ===== */
        .projeto-card-body {
            padding: var(--space-md);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .projeto-titulo {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .projeto-descricao {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ===== CLIENTE ===== */
        .projeto-cliente-info {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-top: 4px;
            position: relative;
        }

        .cliente-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .cliente-dados {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        .cliente-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .cliente-tipo {
            font-size: 10px;
            color: var(--text-muted);
        }

        .cliente-badge {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            flex-shrink: 0;
        }

        /* ===== PROGRESSO ===== */
        .projeto-progresso-section {
            margin-top: 4px;
        }

        .progresso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }

        .progresso-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .progresso-percent {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .progresso-barra {
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .progresso-preenchimento {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        /* ===== MÉTRICAS ===== */
        .projeto-metricas {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-sm);
            padding: var(--space-sm);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .metrica {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            text-align: center;
        }

        .metrica i {
            color: #00D2FF;
            font-size: 12px;
        }

        .metrica span {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .metrica small {
            font-size: 9px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== DATAS ===== */
        .projeto-datas {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
        }

        .data-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .data-item i {
            color: #00D2FF;
            font-size: 13px;
        }

        .data-item div {
            display: flex;
            flex-direction: column;
            gap: 1px;
            min-width: 0;
        }

        .data-label {
            font-size: 9px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-value {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-primary);
        }

        /* ===== ALERTA DE PRAZO ===== */
        .projeto-prazo {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: var(--radius-sm);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .projeto-prazo.normal {
            background: rgba(0, 210, 255, 0.08);
            color: #00D2FF;
        }

        .projeto-prazo.urgente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .projeto-prazo.atrasado {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        /* ===== FOOTER DO CARD ===== */
        .projeto-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            border-top: 1px solid var(--border-color);
            background: var(--bg-input);
            gap: var(--space-sm);
        }

        .projeto-valor {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .valor-total {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        .valor-info {
            font-size: 10px;
            color: var(--text-muted);
        }

        .valor-pago {
            color: #00D2FF;
            font-weight: 600;
        }

        .projeto-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
        }

        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .btn-action:hover {
            border-color: #00D2FF;
            color: #00D2FF;
            background: rgba(0, 210, 255, 0.05);
        }

        .btn-action-primary {
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            border: none;
        }

        .btn-action-primary:hover {
            color: #FFFFFF;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.4);
        }

        .btn-action-danger {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .btn-action-danger:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        /* ========================================== */
        /* BOTÃO LOCAL DE TRABALHO (DESTACADO)         */
        /* ========================================== */
        .btn-local-trabalho {
            display: block;
            text-decoration: none;
            background: linear-gradient(135deg, var(--setor-color, #00D2FF)20 0%, var(--setor-color, #00D2FF)08 100%);
            border-top: 1px solid var(--setor-color, #00D2FF)30;
            padding: var(--space-md);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .btn-local-trabalho::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--setor-color, #00D2FF)15, transparent);
            transition: left 0.6s ease;
        }

        .btn-local-trabalho:hover::before {
            left: 100%;
        }

        .btn-local-trabalho:hover {
            background: linear-gradient(135deg, var(--setor-color, #00D2FF)30 0%, var(--setor-color, #00D2FF)15 100%);
        }

        .btn-local-trabalho-content {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            position: relative;
            z-index: 1;
        }

        .btn-local-trabalho-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-md);
            background: var(--setor-color, #00D2FF);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px var(--setor-color, #00D2FF)40;
            transition: var(--transition-smooth);
        }

        .btn-local-trabalho:hover .btn-local-trabalho-icon {
            transform: scale(1.08) rotate(-5deg);
        }

        .btn-local-trabalho-text {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .btn-local-trabalho-label {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .btn-local-trabalho-setor {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .btn-local-trabalho-arrow {
            color: var(--setor-color, #00D2FF);
            font-size: 14px;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .btn-local-trabalho:hover .btn-local-trabalho-arrow {
            transform: translateX(4px);
        }

        /* ========================================== */
        /* LIST VIEW                                  */
        /* ========================================== */
        .projetos-grid.projetos-list-view {
            grid-template-columns: 1fr;
        }

        .projetos-grid.projetos-list-view .projeto-card {
            display: grid;
            grid-template-columns: 1fr 300px;
            align-items: stretch;
        }

        .projetos-grid.projetos-list-view .projeto-card-header,
        .projetos-grid.projetos-list-view .projeto-card-body,
        .projetos-grid.projetos-list-view .projeto-card-footer {
            grid-column: 1;
        }

        .projetos-grid.projetos-list-view .btn-local-trabalho {
            grid-column: 2;
            grid-row: 1 / -1;
            border-top: none;
            border-left: 1px solid var(--setor-color, #00D2FF)30;
            display: flex;
            align-items: center;
        }

        /* ========================================== */
        /* EMPTY STATE                                */
        /* ========================================== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px dashed var(--border-color);
        }

        .empty-state i {
            font-size: 56px;
            color: var(--text-muted);
            opacity: 0.4;
            margin-bottom: var(--space-md);
            display: block;
        }

        .empty-state h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .empty-state p {
            color: var(--text-muted);
            margin: 0 0 var(--space-lg) 0;
        }

        /* ========================================== */
        /* PAGINAÇÃO                                  */
        /* ========================================== */
        .paginacao {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg) 0;
            margin-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .page-btn {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
        }

        .page-btn:hover:not(:disabled) {
            border-color: #00D2FF;
            color: #00D2FF;
        }

        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 var(--space-sm);
        }

        /* ========================================== */
        /* CONTEXT MENU                               */
        /* ========================================== */
        .context-menu {
            display: none;
            position: fixed;
            min-width: 220px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            padding: 4px;
            z-index: 999999;
            backdrop-filter: blur(10px);
        }

        .context-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: var(--text-sm);
            font-weight: 500;
            transition: var(--transition-smooth);
            cursor: pointer;
        }

        .context-item i {
            width: 16px;
            font-size: 13px;
            text-align: center;
            color: var(--text-muted);
        }

        .context-item:hover {
            background: var(--bg-card-hover);
            color: var(--text-primary);
        }

        .context-item:hover i { color: #00D2FF; }

        .context-item-danger { color: #FF6B6B; }
        .context-item-danger i { color: #FF6B6B; }
        .context-item-danger:hover { background: rgba(255, 107, 107, 0.1); color: #FF6B6B; }
        .context-item-danger:hover i { color: #FF6B6B; }

        .context-menu hr {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 4px 0;
        }

        /* ========================================== */
        /* MODAL DE EXCLUSÃO                          */
        /* ========================================== */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999999;
            align-items: center;
            justify-content: center;
        }

        .modal.active { display: flex; }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(4px);
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid var(--border-color);
            z-index: 10;
        }

        .modal-content-danger {
            border-color: rgba(255, 107, 107, 0.3);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-danger {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, transparent 100%);
            border-bottom-color: rgba(255, 107, 107, 0.2);
        }

        .modal-header .modal-title {
            font-family: var(--font-title);
            font-weight: 600;
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-title-danger { color: #FF6B6B; }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.4rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px;
            line-height: 1;
        }

        .modal-close:hover { color: var(--text-primary); transform: rotate(90deg); }

        .modal-body { padding: 24px; }

        .modal-alerta-danger {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border: 1px solid rgba(255, 107, 107, 0.2);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-lg);
        }

        .modal-alerta-danger i {
            font-size: 24px;
            color: #FF6B6B;
            flex-shrink: 0;
        }

        .modal-alerta-danger div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .modal-alerta-danger strong {
            font-size: var(--text-sm);
            color: #FF6B6B;
        }

        .modal-alerta-danger span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .modal-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            text-align: center;
        }

        .modal-projeto-nome {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FF6B6B;
            text-align: center;
            margin: 0 0 var(--space-lg) 0;
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border-radius: var(--radius-md);
            border: 1px dashed rgba(255, 107, 107, 0.3);
        }

        .modal-texto-small {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin: var(--space-md) 0 var(--space-sm) 0;
        }

        .modal-lista-danger {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .modal-lista-danger li {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            padding: 6px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-sm);
        }

        .modal-lista-danger li i {
            color: #FF6B6B;
            font-size: 12px;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 120px; justify-content: center; }

        .btn-danger {
            background: #FF6B6B;
            color: #FFFFFF;
            border: none;
        }

        .btn-danger:hover {
            background: #E55555;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 107, 107, 0.4);
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .resumo-financeiro { grid-template-columns: 1fr; }
            .projetos-grid { grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); }
            
            .projetos-grid.projetos-list-view .projeto-card {
                grid-template-columns: 1fr;
            }
            
            .projetos-grid.projetos-list-view .btn-local-trabalho {
                grid-column: 1;
                grid-row: auto;
                border-left: none;
                border-top: 1px solid var(--setor-color, #00D2FF)30;
            }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .projetos-grid { grid-template-columns: 1fr; }
            .filtros-avancados .form-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            
            .filtros-top { flex-direction: column; align-items: stretch; }
            .filtros-actions { justify-content: space-between; }
            
            .filtros-status {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 4px;
                scrollbar-width: thin;
            }
            
            .filtro-status { white-space: nowrap; flex-shrink: 0; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
            
            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .projeto-metricas { grid-template-columns: repeat(3, 1fr); }
            .projeto-datas { grid-template-columns: 1fr; }
            .projeto-card-footer { flex-direction: column; align-items: stretch; }
            .projeto-actions { justify-content: flex-end; }
            
            .btn-local-trabalho-content {
                flex-direction: row;
                text-align: left;
            }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>