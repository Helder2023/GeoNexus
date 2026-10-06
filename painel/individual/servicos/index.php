<?php
// painel/individual/servicos/index.php - Lista de Serviços
include "../../../includes/individual/notificacoes-servicos-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Meus Serviços';
$pagina_atual = 'servicos';

// ============================================
// LISTA DE SERVIÇOS
// ============================================
$servicos = [
    [
        'id' => 1,
        'codigo' => 'SRV-2026-0001',
        'nome' => 'Levantamento Topográfico',
        'descricao' => 'Levantamento topográfico completo com curvas de nível, pontos georreferenciados e plantas em escala.',
        'categoria' => 'Topografia',
        'categoria_icon' => 'fa-mountain',
        'categoria_color' => '#6C2BD9',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'preco_base' => 350000,
        'unidade' => 'por hectare',
        'duracao' => '15-30 dias',
        'visualizacoes' => 245,
        'contratacoes' => 12,
        'avaliacao' => 4.9,
        'total_avaliacoes' => 18,
        'imagem_capa' => 'servico-topografia.jpg',
        'destaque' => true,
        'popular' => true,
        'urgente' => false,
        'data_criacao' => '2025-06-15'
    ],
    [
        'id' => 2,
        'codigo' => 'SRV-2026-0002',
        'nome' => 'Mapeamento GIS',
        'descricao' => 'Mapeamento GIS com análise espacial, mapas interativos e base de dados georreferenciada.',
        'categoria' => 'GIS',
        'categoria_icon' => 'fa-globe',
        'categoria_color' => '#00FFA3',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'preco_base' => 480000,
        'unidade' => 'por projeto',
        'duracao' => '20-40 dias',
        'visualizacoes' => 189,
        'contratacoes' => 8,
        'avaliacao' => 4.8,
        'total_avaliacoes' => 14,
        'imagem_capa' => 'servico-gis.jpg',
        'destaque' => false,
        'popular' => true,
        'urgente' => false,
        'data_criacao' => '2025-07-20'
    ],
    [
        'id' => 3,
        'codigo' => 'SRV-2026-0003',
        'nome' => 'Levantamento Planialtimétrico',
        'descricao' => 'Levantamento planialtimétrico com detalhamento de relevo e altimetria para projetos de engenharia.',
        'categoria' => 'Topografia',
        'categoria_icon' => 'fa-mountain',
        'categoria_color' => '#6C2BD9',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'preco_base' => 280000,
        'unidade' => 'por hectare',
        'duracao' => '10-20 dias',
        'visualizacoes' => 156,
        'contratacoes' => 15,
        'avaliacao' => 4.7,
        'total_avaliacoes' => 22,
        'imagem_capa' => 'servico-planialtimetria.jpg',
        'destaque' => false,
        'popular' => false,
        'urgente' => false,
        'data_criacao' => '2025-08-10'
    ],
    [
        'id' => 4,
        'codigo' => 'SRV-2026-0004',
        'nome' => 'Cadastro Rural',
        'descricao' => 'Cadastro rural completo com georreferenciamento, demarcação de limites e emissão de documentação.',
        'categoria' => 'Cadastro',
        'categoria_icon' => 'fa-home',
        'categoria_color' => '#FFD93D',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'preco_base' => 195000,
        'unidade' => 'por propriedade',
        'duracao' => '7-15 dias',
        'visualizacoes' => 134,
        'contratacoes' => 6,
        'avaliacao' => 4.6,
        'total_avaliacoes' => 9,
        'imagem_capa' => 'servico-cadastro.jpg',
        'destaque' => false,
        'popular' => false,
        'urgente' => false,
        'data_criacao' => '2025-09-05'
    ],
    [
        'id' => 5,
        'codigo' => 'SRV-2026-0005',
        'nome' => 'Levantamento com Drone',
        'descricao' => 'Levantamento aéreo com drone para mapeamento de áreas extensas e geração de ortomosaico.',
        'categoria' => 'Drones',
        'categoria_icon' => 'fa-drone',
        'categoria_color' => '#FF6B6B',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'preco_base' => 320000,
        'unidade' => 'por voo',
        'duracao' => '5-10 dias',
        'visualizacoes' => 312,
        'contratacoes' => 20,
        'avaliacao' => 5.0,
        'total_avaliacoes' => 25,
        'imagem_capa' => 'servico-drone.jpg',
        'destaque' => true,
        'popular' => true,
        'urgente' => true,
        'data_criacao' => '2025-10-01'
    ],
    [
        'id' => 6,
        'codigo' => 'SRV-2026-0006',
        'nome' => 'Análise de Solo Agrícola',
        'descricao' => 'Análise de solo com mapeamento de precisão, coleta de amostras e recomendações técnicas.',
        'categoria' => 'Agricultura',
        'categoria_icon' => 'fa-tractor',
        'categoria_color' => '#6BCB77',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'preco_base' => 220000,
        'unidade' => 'por área',
        'duracao' => '10-15 dias',
        'visualizacoes' => 98,
        'contratacoes' => 4,
        'avaliacao' => 4.5,
        'total_avaliacoes' => 6,
        'imagem_capa' => 'servico-agricultura.jpg',
        'destaque' => false,
        'popular' => false,
        'urgente' => false,
        'data_criacao' => '2025-10-20'
    ],
    [
        'id' => 7,
        'codigo' => 'SRV-2026-0007',
        'nome' => 'Consultoria em Urbanismo',
        'descricao' => 'Consultoria especializada em planeamento urbano, análise de viabilidade e licenciamento.',
        'categoria' => 'Urbanismo',
        'categoria_icon' => 'fa-city',
        'categoria_color' => '#A29BFE',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'preco_base' => 450000,
        'unidade' => 'por projeto',
        'duracao' => '30-60 dias',
        'visualizacoes' => 67,
        'contratacoes' => 2,
        'avaliacao' => 4.9,
        'total_avaliacoes' => 3,
        'imagem_capa' => 'servico-urbanismo.jpg',
        'destaque' => false,
        'popular' => false,
        'urgente' => false,
        'data_criacao' => '2025-11-10'
    ],
    [
        'id' => 8,
        'codigo' => 'SRV-2026-0008',
        'nome' => 'Modelação 3D de Terreno',
        'descricao' => 'Criação de modelos 3D de terreno para visualização, análise e apresentação de projetos.',
        'categoria' => 'Engenharia',
        'categoria_icon' => 'fa-ruler-combined',
        'categoria_color' => '#00D2FF',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'preco_base' => 275000,
        'unidade' => 'por modelo',
        'duracao' => '15-25 dias',
        'visualizacoes' => 45,
        'contratacoes' => 1,
        'avaliacao' => 4.8,
        'total_avaliacoes' => 2,
        'imagem_capa' => 'servico-3d.jpg',
        'destaque' => false,
        'popular' => false,
        'urgente' => false,
        'data_criacao' => '2025-12-01'
    ],
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_servicos = count($servicos);
$servicos_ativos = count(array_filter($servicos, fn($s) => $s['status'] === 'ativo'));
$servicos_inativos = count(array_filter($servicos, fn($s) => $s['status'] === 'inativo'));
$total_contratacoes = array_sum(array_column($servicos, 'contratacoes'));
$total_visualizacoes = array_sum(array_column($servicos, 'visualizacoes'));

// Preço médio
$precos = array_column($servicos, 'preco_base');
$preco_medio = count($precos) > 0 ? array_sum($precos) / count($precos) : 0;

// Avaliação média
$avaliacoes = array_column($servicos, 'avaliacao');
$avaliacao_media = count($avaliacoes) > 0 ? array_sum($avaliacoes) / count($avaliacoes) : 0;

// ============================================
// CATEGORIAS ÚNICAS (para filtro)
// ============================================
$categorias_unicas = [];
foreach ($servicos as $s) {
    if (!isset($categorias_unicas[$s['categoria']])) {
        $categorias_unicas[$s['categoria']] = [
            'id' => $s['categoria'],
            'nome' => $s['categoria'],
            'icon' => $s['categoria_icon'],
            'color' => $s['categoria_color']
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
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00FFA3&color=fff&size=80';
    }
}

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'ativo' => 'status-ativo',
            'inativo' => 'status-inativo',
            'pausado' => 'status-pausado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-inativo';
    }
}

if (!function_exists('renderEstrelas')) {
    function renderEstrelas($avaliacao) {
        $html = '';
        $cheias = floor($avaliacao);
        $meia = ($avaliacao - $cheias) >= 0.5;
        
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $cheias) {
                $html .= '<i class="fas fa-star"></i>';
            } elseif ($i == $cheias + 1 && $meia) {
                $html .= '<i class="fas fa-star-half-alt"></i>';
            } else {
                $html .= '<i class="far fa-star"></i>';
            }
        }
        return $html;
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../../includes/individual/servicos-head.php" ?>

<body>
    <div class="app-container">
        <!-- Toast Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Overlay para sidebar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR SERVIÇOS                           -->
        <!-- ========================================== -->
        <?php include "../../../includes/individual/servicos-sidebar.php" ?>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-tools icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $total_servicos; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Serviços</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-servicos.php" ?>

                    <a href="servico-cadastrar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Novo Serviço
                    </a>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="value"><?php echo $total_servicos; ?></div>
                    <div class="label">Total de Serviços</div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $servicos_ativos; ?></div>
                    <div class="label">Serviços Ativos</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="value"><?php echo $total_contratacoes; ?></div>
                    <div class="label">Contratações</div>
                </div>

                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="value"><?php echo number_format($avaliacao_media, 1); ?></div>
                    <div class="label">Avaliação Média</div>
                </div>
            </section>

            <!-- ===== RESUMO EXTRA ===== -->
            <section class="resumo-extra animate-fade-up" style="animation-delay: 0.1s;">
                <div class="resumo-extra-item">
                    <div class="resumo-extra-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="resumo-extra-info">
                        <span class="resumo-extra-label">Visualizações Totais</span>
                        <span class="resumo-extra-valor"><?php echo number_format($total_visualizacoes); ?></span>
                    </div>
                </div>
                <div class="resumo-extra-item">
                    <div class="resumo-extra-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="resumo-extra-info">
                        <span class="resumo-extra-label">Preço Médio</span>
                        <span class="resumo-extra-valor">Kz <?php echo formatMoney($preco_medio); ?></span>
                    </div>
                </div>
                <div class="resumo-extra-item">
                    <div class="resumo-extra-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                        <i class="fas fa-pause-circle"></i>
                    </div>
                    <div class="resumo-extra-info">
                        <span class="resumo-extra-label">Serviços Inativos</span>
                        <span class="resumo-extra-valor"><?php echo $servicos_inativos; ?></span>
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.2s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchServico" placeholder="Buscar serviço ou categoria..." 
                               oninput="filtrarServicos()">
                    </div>
                    <div class="filtros-actions">
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
                        Todos <span class="count"><?php echo $total_servicos; ?></span>
                    </button>
                    <button class="filtro-status" data-status="ativo" onclick="filtrarPorStatus('ativo')">
                        Ativos <span class="count"><?php echo $servicos_ativos; ?></span>
                    </button>
                    <button class="filtro-status" data-status="inativo" onclick="filtrarPorStatus('inativo')">
                        Inativos <span class="count"><?php echo $servicos_inativos; ?></span>
                    </button>
                </div>

                <!-- Filtros por categoria -->
                <div class="filtros-categorias">
                    <span class="filtros-categorias-label">Categorias:</span>
                    <?php foreach ($categorias_unicas as $cat): ?>
                        <button class="filtro-categoria" 
                                data-categoria="<?php echo $cat['id']; ?>"
                                onclick="filtrarPorCategoria('<?php echo $cat['id']; ?>')"
                                style="--cat-color: <?php echo $cat['color']; ?>;">
                            <i class="fas <?php echo $cat['icon']; ?>"></i>
                            <?php echo $cat['nome']; ?>
                        </button>
                    <?php endforeach; ?>
                    <button class="filtro-categoria limpar-categoria" onclick="filtrarPorCategoria('')" style="display: none;">
                        <i class="fas fa-times"></i> Limpar
                    </button>
                </div>
            </section>

            <!-- ===== LISTA DE SERVIÇOS ===== -->
            <section class="servicos-container animate-fade-up" style="animation-delay: 0.3s;">
                <?php if (empty($servicos)): ?>
                    <div class="empty-state">
                        <i class="fas fa-tools"></i>
                        <h3>Nenhum serviço encontrado</h3>
                        <p>Cadastre o seu primeiro serviço para começar</p>
                        <a href="servico-cadastrar.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Cadastrar Serviço
                        </a>
                    </div>
                <?php else: ?>
                    <div class="servicos-grid" id="servicosGrid">
                        <?php foreach ($servicos as $servico): ?>
                            <div class="servico-card" 
                                 data-id="<?php echo $servico['id']; ?>"
                                 data-status="<?php echo $servico['status']; ?>"
                                 data-categoria="<?php echo $servico['categoria']; ?>"
                                 data-busca="<?php echo strtolower($servico['nome'] . ' ' . $servico['categoria'] . ' ' . $servico['descricao']); ?>">
                                
                                <!-- ===== IMAGEM DE CAPA ===== -->
                                <div class="servico-card-capa" style="--cat-color: <?php echo $servico['categoria_color']; ?>;">
                                    <div class="servico-card-capa-placeholder">
                                        <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                    </div>
                                    
                                    <!-- Badges sobrepostos -->
                                    <div class="servico-card-badges">
                                        <?php if ($servico['destaque']): ?>
                                            <span class="badge-capa badge-destaque">
                                                <i class="fas fa-star"></i> Destaque
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($servico['popular']): ?>
                                            <span class="badge-capa badge-popular">
                                                <i class="fas fa-fire"></i> Popular
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($servico['urgente']): ?>
                                            <span class="badge-capa badge-urgente">
                                                <i class="fas fa-bolt"></i> Urgente
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Status -->
                                    <div class="servico-card-status-capa">
                                        <span class="badge-status <?php echo getStatusClass($servico['status']); ?>">
                                            <i class="fas fa-circle"></i>
                                            <?php echo $servico['status_label']; ?>
                                        </span>
                                    </div>
                                    
                                    <!-- Preço sobreposto -->
                                    <div class="servico-card-preco-capa">
                                        <span class="preco-capa-valor">Kz <?php echo formatMoney($servico['preco_base']); ?></span>
                                        <span class="preco-capa-unidade"><?php echo $servico['unidade']; ?></span>
                                    </div>
                                </div>

                                <!-- ===== CORPO DO CARD ===== -->
                                <div class="servico-card-body">
                                    <div class="servico-card-header">
                                        <div class="servico-card-categoria">
                                            <div class="categoria-icon" style="background: <?php echo $servico['categoria_color']; ?>20; color: <?php echo $servico['categoria_color']; ?>;">
                                                <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                            </div>
                                            <div class="categoria-info">
                                                <span class="categoria-nome"><?php echo $servico['categoria']; ?></span>
                                                <span class="servico-codigo"><?php echo $servico['codigo']; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="servico-titulo"><?php echo $servico['nome']; ?></h3>
                                    <p class="servico-descricao"><?php echo mb_substr($servico['descricao'], 0, 100) . (mb_strlen($servico['descricao']) > 100 ? '...' : ''); ?></p>

                                    <!-- Avaliação -->
                                    <div class="servico-avaliacao">
                                        <div class="avaliacao-estrelas">
                                            <?php echo renderEstrelas($servico['avaliacao']); ?>
                                        </div>
                                        <span class="avaliacao-valor"><?php echo $servico['avaliacao']; ?></span>
                                        <span class="avaliacao-total">(<?php echo $servico['total_avaliacoes']; ?>)</span>
                                    </div>

                                    <!-- Métricas -->
                                    <div class="servico-metricas">
                                        <div class="metrica">
                                            <i class="fas fa-eye"></i>
                                            <span><?php echo $servico['visualizacoes']; ?></span>
                                            <small>Vistas</small>
                                        </div>
                                        <div class="metrica">
                                            <i class="fas fa-handshake"></i>
                                            <span><?php echo $servico['contratacoes']; ?></span>
                                            <small>Contratos</small>
                                        </div>
                                        <div class="metrica">
                                            <i class="fas fa-clock"></i>
                                            <span><?php echo $servico['duracao']; ?></span>
                                            <small>Duração</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===== FOOTER DO CARD ===== -->
                                <div class="servico-card-footer">
                                    <div class="servico-preco">
                                        <span class="preco-valor">Kz <?php echo formatMoney($servico['preco_base']); ?></span>
                                        <span class="preco-unidade"><?php echo $servico['unidade']; ?></span>
                                    </div>

                                    <div class="servico-actions">
                                        <a href="servico-editar.php?id=<?php echo $servico['id']; ?>" 
                                           class="btn-action" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="servico-excluir.php?id=<?php echo $servico['id']; ?>" 
                                           class="btn-action btn-action-danger" 
                                           title="Excluir"
                                           onclick="return confirmarExclusao(event, '<?php echo addslashes($servico['nome']); ?>', <?php echo $servico['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <button class="btn-action" 
                                                onclick="abrirMenuCard(event, <?php echo $servico['id']; ?>)" 
                                                title="Mais Opções">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- ===== BOTÃO VER DETALHES ===== -->
                                <a href="servico-detalhe.php?id=<?php echo $servico['id']; ?>" 
                                   class="btn-ver-detalhes" 
                                   style="--cat-color: <?php echo $servico['categoria_color']; ?>;">
                                    <div class="btn-ver-detalhes-content">
                                        <i class="fas fa-eye"></i>
                                        <span>Ver Detalhes do Serviço</span>
                                        <i class="fas fa-arrow-right"></i>
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
            <span>Editar Serviço</span>
        </a>
        <a href="#" class="context-item" id="menuPrecos">
            <i class="fas fa-tags"></i>
            <span>Ver Preços</span>
        </a>
        <hr>
        <a href="#" class="context-item" id="menuDuplicar">
            <i class="fas fa-copy"></i>
            <span>Duplicar</span>
        </a>
        <a href="#" class="context-item" id="menuAtivar">
            <i class="fas fa-toggle-on"></i>
            <span>Ativar/Desativar</span>
        </a>
        <hr>
        <a href="#" class="context-item context-item-danger" id="menuExcluir">
            <i class="fas fa-trash"></i>
            <span>Excluir Serviço</span>
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
                        <span>O serviço e todos os seus dados serão permanentemente excluídos.</span>
                    </div>
                </div>
                <p class="modal-texto">Tem certeza que deseja excluir o serviço</p>
                <p class="modal-projeto-nome" id="modalServicoNome">-</p>
                <p class="modal-texto-small">Ao excluir, os seguintes dados serão removidos:</p>
                <ul class="modal-lista-danger">
                    <li><i class="fas fa-times-circle"></i> Todas as informações do serviço</li>
                    <li><i class="fas fa-times-circle"></i> Histórico de contratações</li>
                    <li><i class="fas fa-times-circle"></i> Avaliações e comentários</li>
                    <li><i class="fas fa-times-circle"></i> Vínculos com projetos</li>
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
        // FILTROS
        // ============================================
        let filtroStatusAtual = 'todos';
        let filtroCategoriaAtual = '';

        function filtrarPorStatus(status) {
            filtroStatusAtual = status;
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === status);
            });
            filtrarServicos();
        }

        function filtrarPorCategoria(categoria) {
            filtroCategoriaAtual = categoria;

            document.querySelectorAll('.filtro-categoria').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.categoria === categoria);
            });

            const limpar = document.querySelector('.limpar-categoria');
            if (limpar) {
                limpar.style.display = categoria ? 'inline-flex' : 'none';
            }

            filtrarServicos();
        }

        function filtrarServicos() {
            const search = (document.getElementById('searchServico')?.value || '').toLowerCase().trim();
            const cards = document.querySelectorAll('.servico-card');
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && card.dataset.status !== filtroStatusAtual) {
                    mostrar = false;
                }

                if (mostrar && filtroCategoriaAtual && card.dataset.categoria !== filtroCategoriaAtual) {
                    mostrar = false;
                }

                if (mostrar && search) {
                    mostrar = card.dataset.busca.includes(search);
                }

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            const container = document.getElementById('servicosGrid');
            const emptyState = document.querySelector('.empty-state-filtro');

            if (visiveis === 0 && container) {
                if (!emptyState) {
                    const empty = document.createElement('div');
                    empty.className = 'empty-state empty-state-filtro';
                    empty.innerHTML = `
                        <i class="fas fa-search"></i>
                        <h3>Nenhum serviço encontrado</h3>
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
            document.getElementById('searchServico').value = '';
            filtroStatusAtual = 'todos';
            filtroCategoriaAtual = '';
            
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === 'todos');
            });
            document.querySelectorAll('.filtro-categoria').forEach(btn => {
                btn.classList.remove('active');
            });
            
            const limpar = document.querySelector('.limpar-categoria');
            if (limpar) limpar.style.display = 'none';
            
            filtrarServicos();
        }

        // ============================================
        // MUDAR VISUALIZAÇÃO
        // ============================================
        function mudarView(view) {
            const container = document.getElementById('servicosGrid');
            if (!container) return;

            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === view);
            });

            if (view === 'list') {
                container.classList.add('servicos-list-view');
            } else {
                container.classList.remove('servicos-list-view');
            }

            localStorage.setItem('geonnexus-servicos-view', view);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedView = localStorage.getItem('geonnexus-servicos-view');
            if (savedView) mudarView(savedView);
        });

        // ============================================
        // MENU CONTEXTUAL
        // ============================================
        let servicoAtualMenu = null;
        let servicoAtualNome = null;

        function abrirMenuCard(event, servicoId) {
            event.stopPropagation();
            event.preventDefault();

            const menu = document.getElementById('contextMenu');
            const rect = event.target.closest('button').getBoundingClientRect();

            servicoAtualMenu = servicoId;

            const card = document.querySelector(`.servico-card[data-id="${servicoId}"]`);
            if (card) {
                servicoAtualNome = card.querySelector('.servico-titulo').textContent;
            }

            menu.style.position = 'fixed';
            menu.style.top = (rect.bottom + 5) + 'px';
            menu.style.left = (rect.right - 220) + 'px';
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

            document.getElementById('menuVerDetalhes').href = 'servico-detalhe.php?id=' + servicoId;
            document.getElementById('menuEditar').href = 'servico-editar.php?id=' + servicoId;
            document.getElementById('menuExcluir').href = 'servico-excluir.php?id=' + servicoId;
        }

        document.addEventListener('click', function(e) {
            const menu = document.getElementById('contextMenu');
            if (menu && !menu.contains(e.target) && !e.target.closest('.servico-actions')) {
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

        document.addEventListener('DOMContentLoaded', function() {
            const menuDuplicar = document.getElementById('menuDuplicar');
            const menuAtivar = document.getElementById('menuAtivar');
            const menuExcluir = document.getElementById('menuExcluir');

            if (menuDuplicar) {
                menuDuplicar.addEventListener('click', function(e) {
                    e.preventDefault();
                    mostrarToast('Serviço duplicado com sucesso!', 'success');
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuAtivar) {
                menuAtivar.addEventListener('click', function(e) {
                    e.preventDefault();
                    mostrarToast('Estado do serviço alterado!', 'info');
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuExcluir) {
                menuExcluir.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('contextMenu').style.display = 'none';
                    
                    if (servicoAtualNome && servicoAtualMenu) {
                        const modal = document.getElementById('modalExcluir');
                        const btnExcluir = document.getElementById('modalBtnExcluir');
                        
                        document.getElementById('modalServicoNome').textContent = '"' + servicoAtualNome + '"';
                        btnExcluir.href = 'servico-excluir.php?id=' + servicoAtualMenu;
                        
                        modal.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }
                });
            }
        });

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, nomeServico, servicoId) {
            event.preventDefault();
            
            const modal = document.getElementById('modalExcluir');
            const btnExcluir = document.getElementById('modalBtnExcluir');
            
            document.getElementById('modalServicoNome').textContent = '"' + nomeServico + '"';
            btnExcluir.href = 'servico-excluir.php?id=' + servicoId;
            
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
            background: linear-gradient(180deg, #00FFA3 0%, #00D2FF 100%);
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

        .header-left h1 .icon { color: #00FFA3; font-size: 0.85em; }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 255, 163, 0.3);
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
        .header-left .breadcrumb a:hover { color: #00FFA3; }
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

        .btn-theme:hover { border-color: #00FFA3; color: #00FFA3; }
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

        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .stat-card .icon.aurora { background: rgba(108, 43, 217, 0.15); color: #6C2BD9; }

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
        /* RESUMO EXTRA                               */
        /* ========================================== */
        .resumo-extra {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .resumo-extra-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .resumo-extra-item:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .resumo-extra-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .resumo-extra-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .resumo-extra-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .resumo-extra-valor {
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
            border-color: #00FFA3;
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
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
        .view-btn.active { background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%); color: #0A1628; }

        .filtros-status {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            margin-bottom: var(--space-md);
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

        .filtro-status:hover { border-color: #00FFA3; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
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

        /* ===== FILTROS DE CATEGORIA ===== */
        .filtros-categorias {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .filtros-categorias-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-right: var(--space-sm);
        }

        .filtro-categoria {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-xs);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .filtro-categoria i { font-size: 11px; }

        .filtro-categoria:hover {
            border-color: var(--cat-color);
            color: var(--cat-color);
        }

        .filtro-categoria.active {
            background: var(--cat-color)20;
            border-color: var(--cat-color);
            color: var(--cat-color);
        }

        .filtro-categoria.limpar-categoria {
            background: rgba(255, 107, 107, 0.1);
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        /* ========================================== */
        /* SERVIÇOS GRID                              */
        /* ========================================== */
        .servicos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        .servico-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition-smooth);
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .servico-card:hover {
            border-color: var(--cat-color, #00FFA3);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        /* ===== IMAGEM DE CAPA DO CARD ===== */
        .servico-card-capa {
            position: relative;
            height: 180px;
            background: linear-gradient(135deg, var(--cat-color, #00FFA3)20 0%, var(--cat-color, #00FFA3)08 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .servico-card-capa-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 72px;
            color: var(--cat-color, #00FFA3);
            opacity: 0.25;
            transition: var(--transition-smooth);
        }

        .servico-card:hover .servico-card-capa-placeholder {
            transform: scale(1.1);
            opacity: 0.35;
        }

        /* ===== BADGES SOBREPOSTOS ===== */
        .servico-card-badges {
            position: absolute;
            top: var(--space-sm);
            left: var(--space-sm);
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
            z-index: 2;
        }

        .badge-capa {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            backdrop-filter: blur(10px);
        }

        .badge-destaque {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.4);
        }

        .badge-popular {
            background: linear-gradient(135deg, #FF6B6B 0%, #E55555 100%);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
        }

        .badge-urgente {
            background: linear-gradient(135deg, #FF9F43 0%, #E67E22 100%);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(255, 159, 67, 0.4);
        }

        /* ===== STATUS SOBREPOSTO ===== */
        .servico-card-status-capa {
            position: absolute;
            top: var(--space-sm);
            right: var(--space-sm);
            z-index: 2;
        }

        .servico-card-status-capa .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
            backdrop-filter: blur(10px);
        }

        .servico-card-status-capa .badge-status i {
            font-size: 6px;
            animation: pulse 2s ease-in-out infinite;
        }

        .servico-card-status-capa .badge-status.status-ativo {
            background: rgba(0, 255, 163, 0.95);
            color: #0A1628;
        }

        .servico-card-status-capa .badge-status.status-inativo {
            background: rgba(255, 107, 107, 0.95);
            color: #FFFFFF;
        }

        .servico-card-status-capa .badge-status.status-pausado {
            background: rgba(255, 217, 61, 0.95);
            color: #0A1628;
        }

        /* ===== PREÇO SOBREPOSTO ===== */
        .servico-card-preco-capa {
            position: absolute;
            bottom: var(--space-sm);
            right: var(--space-sm);
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
            padding: 8px 14px;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-radius: var(--radius-md);
            border: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 2;
        }

        .preco-capa-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
            text-shadow: 0 2px 8px rgba(0, 255, 163, 0.4);
        }

        .preco-capa-unidade {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.7);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== CORPO DO CARD ===== */
        .servico-card-body {
            padding: var(--space-md);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .servico-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-sm);
        }

        .servico-card-categoria {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            min-width: 0;
        }

        .categoria-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .categoria-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .categoria-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .servico-codigo {
            font-family: var(--font-display);
            font-size: 10px;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        .servico-titulo {
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

        .servico-descricao {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ===== AVALIAÇÃO ===== */
        .servico-avaliacao {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .avaliacao-estrelas {
            display: flex;
            gap: 2px;
        }

        .avaliacao-estrelas i {
            font-size: 12px;
            color: #FFD93D;
        }

        .avaliacao-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .avaliacao-total {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== MÉTRICAS ===== */
        .servico-metricas {
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

        .metrica i { color: #00FFA3; font-size: 12px; }
        .metrica span { font-size: var(--text-xs); font-weight: 700; color: var(--text-primary); }
        .metrica small { font-size: 9px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }

        /* ===== FOOTER DO CARD ===== */
        .servico-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            border-top: 1px solid var(--border-color);
            background: var(--bg-input);
            gap: var(--space-sm);
        }

        .servico-preco {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .preco-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        .preco-unidade {
            font-size: 10px;
            color: var(--text-muted);
        }

        .servico-actions {
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
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
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
        }

        /* ===== BOTÃO VER DETALHES ===== */
        .btn-ver-detalhes {
            display: block;
            text-decoration: none;
            background: linear-gradient(135deg, var(--cat-color, #00FFA3)20 0%, var(--cat-color, #00FFA3)08 100%);
            border-top: 1px solid var(--cat-color, #00FFA3)30;
            padding: var(--space-md);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .btn-ver-detalhes::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--cat-color, #00FFA3)15, transparent);
            transition: left 0.6s ease;
        }

        .btn-ver-detalhes:hover::before { left: 100%; }

        .btn-ver-detalhes:hover {
            background: linear-gradient(135deg, var(--cat-color, #00FFA3)30 0%, var(--cat-color, #00FFA3)15 100%);
        }

        .btn-ver-detalhes-content {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .btn-ver-detalhes-content i:first-child {
            color: var(--cat-color, #00FFA3);
            font-size: 14px;
        }

        .btn-ver-detalhes-content span {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .btn-ver-detalhes-content i:last-child {
            color: var(--cat-color, #00FFA3);
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .btn-ver-detalhes:hover .btn-ver-detalhes-content i:last-child {
            transform: translateX(4px);
        }

        /* ========================================== */
        /* LIST VIEW                                  */
        /* ========================================== */
        .servicos-grid.servicos-list-view {
            grid-template-columns: 1fr;
        }

        .servicos-grid.servicos-list-view .servico-card {
            display: grid;
            grid-template-columns: 1fr 280px;
            align-items: stretch;
        }

        .servicos-grid.servicos-list-view .servico-card-capa {
            display: none;
        }

        .servicos-grid.servicos-list-view .btn-ver-detalhes {
            grid-column: 2;
            grid-row: 1 / -1;
            border-top: none;
            border-left: 1px solid var(--cat-color, #00FFA3)30;
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

        .page-btn:hover:not(:disabled) { border-color: #00FFA3; color: #00FFA3; }
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

        .context-item:hover { background: var(--bg-card-hover); color: var(--text-primary); }
        .context-item:hover i { color: #00FFA3; }

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
            background: rgba(0, 0, 0, 0.6);
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
            border: 2px solid rgba(255, 107, 107, 0.3);
            z-index: 10;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-danger {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.15) 0%, rgba(255, 107, 107, 0.05) 100%);
            border-bottom-color: rgba(255, 107, 107, 0.3);
        }

        .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
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
            border: 1px solid rgba(255, 107, 107, 0.25);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-lg);
        }

        .modal-alerta-danger i { font-size: 24px; color: #FF6B6B; flex-shrink: 0; }
        .modal-alerta-danger div { display: flex; flex-direction: column; gap: 4px; }
        .modal-alerta-danger strong { font-size: var(--text-sm); color: #FF6B6B; }
        .modal-alerta-danger span { font-size: var(--text-xs); color: var(--text-secondary); }

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
            border: 2px dashed rgba(255, 107, 107, 0.4);
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

        .modal-lista-danger li i { color: #FF6B6B; font-size: 12px; }

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
            .resumo-extra { grid-template-columns: 1fr; }
            .servicos-grid { grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); }
            
            .servicos-grid.servicos-list-view .servico-card {
                grid-template-columns: 1fr;
            }
            
            .servicos-grid.servicos-list-view .btn-ver-detalhes {
                grid-column: 1;
                grid-row: auto;
                border-left: none;
                border-top: 1px solid var(--cat-color, #00FFA3)30;
            }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .servicos-grid { grid-template-columns: 1fr; }
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
            }
            
            .filtro-status { white-space: nowrap; flex-shrink: 0; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }

            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }

            .servico-card-capa { height: 150px; }
            .servico-card-capa-placeholder { font-size: 56px; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .servico-metricas { grid-template-columns: repeat(3, 1fr); }
            .servico-card-footer { flex-direction: column; align-items: stretch; }
            .servico-actions { justify-content: flex-end; }

            .servico-card-capa { height: 130px; }
            .servico-card-capa-placeholder { font-size: 48px; }
            .servico-card-preco-capa { padding: 6px 10px; }
            .preco-capa-valor { font-size: var(--text-body); }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

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