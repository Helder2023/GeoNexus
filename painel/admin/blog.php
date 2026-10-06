<?php
// painel/admin/blog.php - Gestão de Blog
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Gestão de Blog';
$pagina_atual = 'blog';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;



// Dados mockados - Artigos do Blog
$artigos = [
    [
        'id' => 1,
        'titulo' => 'Como a Topografia Está Revolucionando a Construção Civil em Angola',
        'slug' => 'topografia-revolucionando-construcao-civil-angola',
        'resumo' => 'A topografia moderna está transformando a forma como projetamos e construímos em Angola, trazendo mais precisão e eficiência para as obras.',
        'conteudo' => 'Conteúdo completo do artigo...',
        'categoria' => 'Topografia',
        'tags' => ['Topografia', 'Construção Civil', 'Inovação'],
        'autor' => 'Carlos Mendes',
        'autor_avatar' => 'avatar-1.png',
        'autor_cargo' => 'Engenheiro Topógrafo',
        'data_publicacao' => '2026-02-15 10:00:00',
        'data_atualizacao' => '2026-02-18 14:20:00',
        'status' => 'publicado',
        'status_label' => 'Publicado',
        'visualizacoes' => 1234,
        'comentarios' => 23,
        'imagem_destaque' => 'blog-1.jpg',
        'video_url' => '',
        'tipo_midia' => 'imagem',
        'destaque' => true
    ],
    [
        'id' => 2,
        'titulo' => 'GIS: A Ferramenta Essencial para Gestão de Recursos Naturais',
        'slug' => 'gis-ferramenta-essencial-gestao-recursos-naturais',
        'resumo' => 'Os Sistemas de Informação Geográfica (GIS) estão se tornando fundamentais para a gestão sustentável dos recursos naturais em Angola.',
        'conteudo' => 'Conteúdo completo do artigo...',
        'categoria' => 'GIS',
        'tags' => ['GIS', 'Recursos Naturais', 'Sustentabilidade'],
        'autor' => 'Ana Costa',
        'autor_avatar' => 'avatar-2.png',
        'autor_cargo' => 'Especialista em GIS',
        'data_publicacao' => '2026-02-12 09:30:00',
        'data_atualizacao' => '2026-02-14 11:00:00',
        'status' => 'publicado',
        'status_label' => 'Publicado',
        'visualizacoes' => 856,
        'comentarios' => 15,
        'imagem_destaque' => 'blog-2.jpg',
        'video_url' => '',
        'tipo_midia' => 'imagem',
        'destaque' => false
    ],
    [
        'id' => 3,
        'titulo' => 'Agricultura de Precisão: O Futuro da Produção Alimentar em Angola',
        'slug' => 'agricultura-precisao-futuro-producao-alimentar-angola',
        'resumo' => 'A agricultura de precisão está chegando a Angola, prometendo aumentar a produtividade e reduzir o desperdício de recursos.',
        'conteudo' => 'Conteúdo completo do artigo...',
        'categoria' => 'Agricultura de Precisão',
        'tags' => ['Agricultura', 'Tecnologia', 'Produção Alimentar'],
        'autor' => 'Marisa Lima',
        'autor_avatar' => 'avatar-4.png',
        'autor_cargo' => 'Engenheira Agrônoma',
        'data_publicacao' => '2026-02-10 08:00:00',
        'data_atualizacao' => '2026-02-10 08:00:00',
        'status' => 'publicado',
        'status_label' => 'Publicado',
        'visualizacoes' => 2341,
        'comentarios' => 42,
        'imagem_destaque' => 'blog-3.jpg',
        'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        'tipo_midia' => 'video',
        'destaque' => true
    ],
    [
        'id' => 4,
        'titulo' => 'Drones: A Nova Fronteira da Inspeção Industrial',
        'slug' => 'drones-nova-fronteira-inspecao-industrial',
        'resumo' => 'Os drones estão revolucionando a forma como realizamos inspeções industriais, tornando o processo mais seguro e eficiente.',
        'conteudo' => 'Conteúdo completo do artigo...',
        'categoria' => 'Drones',
        'tags' => ['Drones', 'Inspeção', 'Tecnologia'],
        'autor' => 'Rita Martins',
        'autor_avatar' => 'avatar-10.png',
        'autor_cargo' => 'Piloto de Drones',
        'data_publicacao' => '2026-02-08 14:00:00',
        'data_atualizacao' => '2026-02-09 09:00:00',
        'status' => 'rascunho',
        'status_label' => 'Rascunho',
        'visualizacoes' => 0,
        'comentarios' => 0,
        'imagem_destaque' => 'blog-4.jpg',
        'video_url' => '',
        'tipo_midia' => 'imagem',
        'destaque' => false
    ],
    [
        'id' => 5,
        'titulo' => 'Mineração Sustentável: Como a Tecnologia Está Mudando o Setor',
        'slug' => 'mineracao-sustentavel-tecnologia-mudando-setor',
        'resumo' => 'A mineração sustentável é uma realidade em Angola, com o uso de tecnologias que reduzem o impacto ambiental e aumentam a eficiência.',
        'conteudo' => 'Conteúdo completo do artigo...',
        'categoria' => 'Mineração',
        'tags' => ['Mineração', 'Sustentabilidade', 'Tecnologia'],
        'autor' => 'Rui Oliveira',
        'autor_avatar' => 'avatar-5.png',
        'autor_cargo' => 'Geólogo',
        'data_publicacao' => '2026-02-05 11:30:00',
        'data_atualizacao' => '2026-02-06 16:00:00',
        'status' => 'publicado',
        'status_label' => 'Publicado',
        'visualizacoes' => 678,
        'comentarios' => 9,
        'imagem_destaque' => 'blog-5.jpg',
        'video_url' => 'https://www.youtube.com/embed/J---aiyznGQ',
        'tipo_midia' => 'video',
        'destaque' => false
    ],
    [
        'id' => 6,
        'titulo' => 'Urbanismo Inteligente: Construindo Cidades Mais Sustentáveis',
        'slug' => 'urbanismo-inteligente-cidades-sustentaveis',
        'resumo' => 'O urbanismo inteligente é a chave para construir cidades mais sustentáveis e preparadas para o futuro em Angola.',
        'conteudo' => 'Conteúdo completo do artigo...',
        'categoria' => 'Urbanismo',
        'tags' => ['Urbanismo', 'Sustentabilidade', 'Cidades'],
        'autor' => 'Inês Almeida',
        'autor_avatar' => 'avatar-8.png',
        'autor_cargo' => 'Arquiteta Urbanista',
        'data_publicacao' => '2026-02-03 09:00:00',
        'data_atualizacao' => '2026-02-04 10:00:00',
        'status' => 'publicado',
        'status_label' => 'Publicado',
        'visualizacoes' => 943,
        'comentarios' => 18,
        'imagem_destaque' => 'blog-6.jpg',
        'video_url' => '',
        'tipo_midia' => 'imagem',
        'destaque' => false
    ],
    [
        'id' => 7,
        'titulo' => 'Energia Renovável: O Potencial de Angola no Setor Solar e Eólico',
        'slug' => 'energia-renovavel-potencial-angola-solar-eolico',
        'resumo' => 'Angola possui um enorme potencial para a geração de energia renovável, especialmente solar e eólica, que pode transformar o setor energético.',
        'conteudo' => 'Conteúdo completo do artigo...',
        'categoria' => 'Energia',
        'tags' => ['Energia Solar', 'Energia Eólica', 'Renováveis'],
        'autor' => 'André Ferreira',
        'autor_avatar' => 'avatar-7.png',
        'autor_cargo' => 'Engenheiro Energético',
        'data_publicacao' => '2026-02-01 13:00:00',
        'data_atualizacao' => '2026-02-02 08:30:00',
        'status' => 'rascunho',
        'status_label' => 'Rascunho',
        'visualizacoes' => 0,
        'comentarios' => 0,
        'imagem_destaque' => 'blog-7.jpg',
        'video_url' => '',
        'tipo_midia' => 'imagem',
        'destaque' => false
    ],
    [
        'id' => 8,
        'titulo' => 'Transportes: A Revolução da Mobilidade em Angola',
        'slug' => 'transportes-revolucao-mobilidade-angola',
        'resumo' => 'O setor de transportes está passando por uma revolução em Angola, com novas tecnologias e infraestrutura que estão mudando a mobilidade urbana.',
        'conteudo' => 'Conteúdo completo do artigo...',
        'categoria' => 'Transportes',
        'tags' => ['Transportes', 'Mobilidade', 'Infraestrutura'],
        'autor' => 'Miguel Carvalho',
        'autor_avatar' => 'avatar-9.png',
        'autor_cargo' => 'Engenheiro de Transportes',
        'data_publicacao' => '2026-01-28 10:00:00',
        'data_atualizacao' => '2026-01-29 14:00:00',
        'status' => 'publicado',
        'status_label' => 'Publicado',
        'visualizacoes' => 2345,
        'comentarios' => 56,
        'imagem_destaque' => 'blog-8.jpg',
        'video_url' => 'https://www.youtube.com/embed/9bZkp7q19f0',
        'tipo_midia' => 'video',
        'destaque' => true
    ]
];

// Estatísticas
$total_artigos = count($artigos);
$total_publicados = count(array_filter($artigos, function($a) { return $a['status'] === 'publicado'; }));
$total_rascunhos = count(array_filter($artigos, function($a) { return $a['status'] === 'rascunho'; }));
$total_destaques = count(array_filter($artigos, function($a) { return $a['destaque'] === true; }));

// Categorias para filtro
$categorias = array_unique(array_column($artigos, 'categoria'));
sort($categorias);

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

// Função para gerar avatar fallback
function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6C2BD9&color=fff&size=80';
}

// Função para limitar texto
function limitText($text, $limit = 120) {
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit) . '...';
    }
    return $text;
}

// Função para verificar se é um link de vídeo (YouTube, Vimeo)
function isVideoUrl($url) {
    if (empty($url)) return false;
    $video_patterns = [
        'youtube.com/embed/',
        'youtu.be/',
        'youtube.com/watch?v=',
        'vimeo.com/',
        'player.vimeo.com/'
    ];
    foreach ($video_patterns as $pattern) {
        if (strpos($url, $pattern) !== false) {
            return true;
        }
    }
    return false;
}

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => false],
    ['icon' => 'fa-blog', 'label' => 'Blog', 'link' => 'blog.php', 'active' => true],
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
                        <?php if ($item['label'] === 'Blog'): ?>
                            <span class="badge"><?php echo $total_artigos; ?></span>
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
                        <i class="fas fa-blog icon"></i>
                        Gestão de Blog
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Blog</span>
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
                        <button class="btn btn-primary" data-modal="modalNovoArtigo">
                            <i class="fas fa-plus"></i> Novo Artigo
                        </button>
                        <button class="btn btn-outline" onclick="exportarArtigos()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="value"><?php echo $total_artigos; ?></div>
                    <div class="label">Total de Artigos</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 18.5%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $total_publicados; ?></div>
                    <div class="label">Publicados</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 12.3%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <div class="value"><?php echo $total_rascunhos; ?></div>
                    <div class="label">Rascunhos</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 3.2%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="value"><?php echo $total_destaques; ?></div>
                    <div class="label">Destaques</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 5.8%
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filter-bar-admin animate-fade-up">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchArtigo" placeholder="Pesquisar artigo..." oninput="aplicarFiltros()">
                </div>
                <div class="filter-group">
                    <label>Status</label>
                    <select id="filterStatus" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="publicado">Publicado</option>
                        <option value="rascunho">Rascunho</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Categoria</label>
                    <select id="filterCategoria" onchange="aplicarFiltros()">
                        <option value="">Todas</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Destaque</label>
                    <select id="filterDestaque" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Tipo de Mídia</label>
                    <select id="filterMidia" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="imagem">Imagem</option>
                        <option value="video">Vídeo</option>
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
                <span class="resultados-info" id="resultadosInfo"><?php echo $total_artigos; ?> resultados</span>
            </div>

            <!-- ===== LISTA DE ARTIGOS ===== -->
            <div class="artigos-container">
                <div class="artigos-grid" id="artigosGrid">
                    <?php foreach ($artigos as $artigo): ?>
                        <div class="artigo-card animate-fade-up" 
                             data-id="<?php echo $artigo['id']; ?>"
                             data-status="<?php echo $artigo['status']; ?>"
                             data-categoria="<?php echo $artigo['categoria']; ?>"
                             data-destaque="<?php echo $artigo['destaque'] ? '1' : '0'; ?>"
                             data-midia="<?php echo $artigo['tipo_midia']; ?>"
                             data-titulo="<?php echo strtolower($artigo['titulo']); ?>"
                             data-autor="<?php echo strtolower($artigo['autor']); ?>">
                            
                            <div class="artigo-header">
                                <div class="artigo-imagem">
                                    <?php if ($artigo['tipo_midia'] === 'video' && !empty($artigo['video_url'])): ?>
                                        <!-- Vídeo Embed -->
                                        <div class="video-embed">
                                            <iframe src="<?php echo $artigo['video_url']; ?>" 
                                                    frameborder="0" 
                                                    allowfullscreen
                                                    loading="lazy">
                                            </iframe>
                                            <div class="video-overlay">
                                                <i class="fas fa-play"></i>
                                            </div>
                                        </div>
                                        <div class="midia-badge video-badge">
                                            <i class="fas fa-video"></i> Vídeo
                                        </div>
                                    <?php else: ?>
                                        <!-- Imagem -->
                                        <img src="../../assets/images/<?php echo $artigo['imagem_destaque']; ?>" 
                                             alt="<?php echo $artigo['titulo']; ?>"
                                             onerror="this.src='https://picsum.photos/seed/<?php echo $artigo['id']; ?>/400/250'">
                                        <div class="midia-badge imagem-badge">
                                            <i class="fas fa-image"></i> Imagem
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($artigo['destaque']): ?>
                                        <span class="badge destaque-badge">
                                            <i class="fas fa-star"></i> Destaque
                                        </span>
                                    <?php endif; ?>
                                    <span class="status-badge status-<?php echo $artigo['status']; ?>">
                                        <span class="status-dot"></span>
                                        <?php echo $artigo['status_label']; ?>
                                    </span>
                                </div>
                                <div class="artigo-info">
                                    <h4><?php echo $artigo['titulo']; ?></h4>
                                    <div class="artigo-meta">
                                        <span class="meta-item">
                                            <i class="fas fa-tag"></i> <?php echo $artigo['categoria']; ?>
                                        </span>
                                        <span class="meta-item">
                                            <i class="far fa-calendar-alt"></i> <?php echo date('d/m/Y', strtotime($artigo['data_publicacao'])); ?>
                                        </span>
                                        <span class="meta-item">
                                            <i class="fas fa-eye"></i> <?php echo $artigo['visualizacoes']; ?>
                                        </span>
                                        <span class="meta-item">
                                            <i class="fas fa-comment"></i> <?php echo $artigo['comentarios']; ?>
                                        </span>
                                    </div>
                                    <p class="artigo-resumo"><?php echo limitText($artigo['resumo'], 100); ?></p>
                                </div>
                            </div>

                            <div class="artigo-body">
                                <div class="artigo-tags">
                                    <?php foreach ($artigo['tags'] as $tag): ?>
                                        <span class="tag-item">#<?php echo $tag; ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="artigo-autor">
                                    <img src="../../assets/images/<?php echo $artigo['autor_avatar']; ?>" 
                                         alt="<?php echo $artigo['autor']; ?>"
                                         onerror="this.src='<?php echo getAvatarUrl($artigo['autor']); ?>'">
                                    <div>
                                        <span class="autor-nome"><?php echo $artigo['autor']; ?></span>
                                        <span class="autor-cargo"><?php echo $artigo['autor_cargo']; ?></span>
                                    </div>
                                    <span class="artigo-data-atualizacao">
                                        <i class="far fa-clock"></i> <?php echo date('d/m/Y H:i', strtotime($artigo['data_atualizacao'])); ?>
                                    </span>
                                </div>
                            </div>

                            <div class="artigo-footer">
                                <div class="artigo-actions">
                                    <a href="blog-artigo.php?id=<?php echo $artigo['id']; ?>" class="btn btn-sm btn-outline" title="Ver Artigo">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="blog-editar.php?id=<?php echo $artigo['id']; ?>" class="btn btn-sm btn-outline" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if ($artigo['status'] === 'rascunho'): ?>
                                        <button class="btn btn-sm btn-success" title="Publicar" onclick="publicarArtigo(<?php echo $artigo['id']; ?>, '<?php echo $artigo['titulo']; ?>')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    <?php endif; ?>
                                    <?php if ($artigo['destaque']): ?>
                                        <button class="btn btn-sm btn-warning" title="Remover Destaque" onclick="removerDestaque(<?php echo $artigo['id']; ?>, '<?php echo $artigo['titulo']; ?>')">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-primary" title="Destacar" onclick="destacarArtigo(<?php echo $artigo['id']; ?>, '<?php echo $artigo['titulo']; ?>')">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    <?php endif; ?>
                                    <a href="blog-excluir.php?id=<?php echo $artigo['id']; ?>" class="btn btn-sm btn-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este artigo?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="table-pagination" id="paginacaoArtigos">
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
    <!-- MODAL NOVO ARTIGO - COM IMAGEM/VIDEO      -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovoArtigo">
        <div class="modal-overlay" onclick="fecharModal('modalNovoArtigo')"></div>
        <div class="modal-content" style="max-width: 750px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-pen-fancy"></i> Novo Artigo
                </h3>
                <button class="modal-close" onclick="fecharModal('modalNovoArtigo')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovoArtigo" onsubmit="criarArtigo(event)">
                    <!-- Título -->
                    <div class="form-group">
                        <label class="form-label">Título <span class="required">*</span></label>
                        <input type="text" class="form-control" id="tituloArtigo" placeholder="Título do artigo" required>
                    </div>

                    <!-- Resumo -->
                    <div class="form-group">
                        <label class="form-label">Resumo <span class="required">*</span></label>
                        <textarea class="form-control" id="resumoArtigo" rows="2" placeholder="Resumo do artigo" required></textarea>
                    </div>

                    <!-- Conteúdo -->
                    <div class="form-group">
                        <label class="form-label">Conteúdo <span class="required">*</span></label>
                        <textarea class="form-control" id="conteudoArtigo" rows="5" placeholder="Conteúdo completo do artigo..." required></textarea>
                    </div>

                    <!-- Categoria e Status -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Categoria <span class="required">*</span></label>
                            <select class="form-control" id="categoriaArtigo" required>
                                <option value="">Selecione...</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="statusArtigo">
                                <option value="rascunho">Rascunho</option>
                                <option value="publicado">Publicado</option>
                            </select>
                        </div>
                    </div>

                    <!-- Autor -->
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Autor <span class="required">*</span></label>
                            <input type="text" class="form-control" id="autorArtigo" placeholder="Nome do autor" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cargo do Autor</label>
                            <input type="text" class="form-control" id="autorCargoArtigo" placeholder="Cargo do autor">
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="form-group">
                        <label class="form-label">Tags</label>
                        <input type="text" class="form-control" id="tagsArtigo" placeholder="Ex: Topografia, Construção, Inovação">
                    </div>

                    <!-- Destaque -->
                    <div class="form-group">
                        <label class="form-label">Destaque</label>
                        <select class="form-control" id="destaqueArtigo">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>

                    <!-- ===== MÍDIA - IMAGEM OU VÍDEO ===== -->
                    <div class="form-section">
                        <h4 style="font-family: var(--font-title); font-size: var(--text-h4); color: var(--text-primary); margin-bottom: var(--space-md);">
                            <i class="fas fa-photo-video"></i> Mídia do Artigo
                        </h4>
                        <p class="form-help" style="margin-bottom: var(--space-md);">Escolha entre imagem ou vídeo para o artigo</p>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Tipo de Mídia <span class="required">*</span></label>
                                <select class="form-control" id="tipoMidiaArtigo" onchange="toggleMidiaFields()" required>
                                    <option value="imagem">Imagem</option>
                                    <option value="video">Vídeo (YouTube/Vimeo)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Campo para Imagem -->
                        <div id="campoImagem" class="form-group">
                            <label class="form-label">Imagem de Destaque</label>
                            <div class="upload-area" id="uploadArea">
                                <div class="upload-preview" id="uploadPreview">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Clique ou arraste uma imagem</p>
                                    <span>PNG, JPG, SVG até 5MB</span>
                                </div>
                                <input type="file" class="form-control" id="imagemArtigo" accept="image/*" style="display: none;">
                                <button type="button" class="btn btn-outline btn-sm" onclick="document.getElementById('imagemArtigo').click();">
                                    <i class="fas fa-folder-open"></i> Selecionar Imagem
                                </button>
                                <button type="button" class="btn btn-outline btn-sm" style="color: #FF6B6B;" onclick="removerImagem()">
                                    <i class="fas fa-times"></i> Remover
                                </button>
                            </div>
                            <p class="form-help">Formatos aceitos: PNG, JPG, SVG. Máximo 5MB</p>
                        </div>

                        <!-- Campo para Vídeo -->
                        <div id="campoVideo" class="form-group" style="display: none;">
                            <label class="form-label">Link do Vídeo <span class="required">*</span></label>
                            <input type="url" class="form-control" id="videoUrlArtigo" placeholder="https://www.youtube.com/embed/... ou https://vimeo.com/...">
                            <p class="form-help">YouTube: https://www.youtube.com/embed/ID_DO_VIDEO | Vimeo: https://player.vimeo.com/video/ID</p>
                            <div id="videoPreviewContainer" style="margin-top: var(--space-sm); display: none;">
                                <div class="video-preview-card">
                                    <div class="video-preview-embed" id="videoPreviewEmbed">
                                        <iframe src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline" style="color: #FF6B6B;" onclick="removerVideo()">
                                        <i class="fas fa-times"></i> Remover Vídeo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-outline" onclick="fecharModal('modalNovoArtigo')">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Criar Artigo
                        </button>
                    </div>
                </form>
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
            const totalItens = document.querySelectorAll('.artigo-card').length;
            if (totalItens > 0) {
                totalItensVisiveis = totalItens;
                atualizarPaginacao(totalItens);
            }

            // Inicializar upload de imagem
            setupUpload();
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
        // FUNÇÃO PARA ALTERNAR CAMPOS DE MÍDIA
        // ==========================================
        function toggleMidiaFields() {
            const tipo = document.getElementById('tipoMidiaArtigo').value;
            const campoImagem = document.getElementById('campoImagem');
            const campoVideo = document.getElementById('campoVideo');

            if (tipo === 'imagem') {
                campoImagem.style.display = 'block';
                campoVideo.style.display = 'none';
                document.getElementById('videoUrlArtigo').removeAttribute('required');
                document.getElementById('videoPreviewContainer').style.display = 'none';
            } else {
                campoImagem.style.display = 'none';
                campoVideo.style.display = 'block';
                document.getElementById('videoUrlArtigo').setAttribute('required', 'required');
                previewVideo();
            }
        }

        // ==========================================
        // PREVIEW DO VÍDEO
        // ==========================================
        function previewVideo() {
            const url = document.getElementById('videoUrlArtigo').value;
            const container = document.getElementById('videoPreviewContainer');
            const embed = document.getElementById('videoPreviewEmbed').querySelector('iframe');

            if (url && (url.includes('youtube.com/embed/') || url.includes('vimeo.com/') || url.includes('youtu.be/'))) {
                container.style.display = 'block';
                embed.src = url;
            } else if (url) {
                container.style.display = 'block';
                // Tentar converter URLs do YouTube
                let embedUrl = url;
                if (url.includes('youtube.com/watch?v=')) {
                    const videoId = url.split('v=')[1];
                    embedUrl = 'https://www.youtube.com/embed/' + videoId;
                } else if (url.includes('youtu.be/')) {
                    const videoId = url.split('youtu.be/')[1];
                    embedUrl = 'https://www.youtube.com/embed/' + videoId;
                }
                embed.src = embedUrl;
            } else {
                container.style.display = 'none';
                embed.src = '';
            }
        }

        // ==========================================
        // UPLOAD DE IMAGEM
        // ==========================================
        function setupUpload() {
            const uploadArea = document.getElementById('uploadArea');
            const fileInput = document.getElementById('imagemArtigo');
            const preview = document.getElementById('uploadPreview');

            if (!uploadArea) return;

            // Clique para abrir seletor de arquivos
            uploadArea.addEventListener('click', function(e) {
                if (!e.target.closest('button')) {
                    fileInput.click();
                }
            });

            // Drag and drop
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#6C2BD9';
                uploadArea.style.background = 'rgba(108, 43, 217, 0.05)';
            });

            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = 'var(--border-color)';
                uploadArea.style.background = 'transparent';
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = 'var(--border-color)';
                uploadArea.style.background = 'transparent';

                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    previewUploadedImage(fileInput.files[0]);
                }
            });

            // Seleção de arquivo
            fileInput.addEventListener('change', function() {
                if (this.files.length) {
                    previewUploadedImage(this.files[0]);
                }
            });
        }

        function previewUploadedImage(file) {
            const preview = document.getElementById('uploadPreview');
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <img src="${e.target.result}" alt="Preview da imagem">
                        <button class="btn btn-sm btn-danger remove-image" onclick="removerImagem(event)" style="position: absolute; top: 8px; right: 8px; padding: 2px 8px; font-size: 0.7rem;">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    preview.style.position = 'relative';
                };
                reader.readAsDataURL(file);
            }
        }

        function removerImagem() {
            const preview = document.getElementById('uploadPreview');
            const fileInput = document.getElementById('imagemArtigo');
            preview.innerHTML = `
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Clique ou arraste uma imagem</p>
                <span>PNG, JPG, SVG até 5MB</span>
            `;
            preview.style.position = 'static';
            fileInput.value = '';
        }

        function removerVideo() {
            document.getElementById('videoUrlArtigo').value = '';
            document.getElementById('videoPreviewContainer').style.display = 'none';
            document.getElementById('videoPreviewEmbed').querySelector('iframe').src = '';
        }

        // Event listener para preview de vídeo em tempo real
        document.addEventListener('DOMContentLoaded', function() {
            const videoInput = document.getElementById('videoUrlArtigo');
            if (videoInput) {
                videoInput.addEventListener('input', previewVideo);
            }
        });

        // ==========================================
        // FILTROS E PAGINAÇÃO
        // ==========================================

        let paginaAtual = 1;
        let itensPorPagina = 6;
        let totalItensVisiveis = 0;

        function aplicarFiltros() {
            const search = document.getElementById('searchArtigo').value.toLowerCase().trim();
            const status = document.getElementById('filterStatus').value;
            const categoria = document.getElementById('filterCategoria').value;
            const destaque = document.getElementById('filterDestaque').value;
            const midia = document.getElementById('filterMidia').value;

            const cards = document.querySelectorAll('.artigo-card');
            let visiveis = 0;

            cards.forEach(card => {
                const titulo = card.dataset.titulo || '';
                const autor = card.dataset.autor || '';
                const cardStatus = card.dataset.status || '';
                const cardCategoria = card.dataset.categoria || '';
                const cardDestaque = card.dataset.destaque || '0';
                const cardMidia = card.dataset.midia || 'imagem';

                let show = true;

                if (search) {
                    show = titulo.includes(search) || autor.includes(search);
                }

                if (show && status) {
                    show = cardStatus === status;
                }

                if (show && categoria) {
                    show = cardCategoria === categoria;
                }

                if (show && destaque !== '') {
                    show = cardDestaque === destaque;
                }

                if (show && midia) {
                    show = cardMidia === midia;
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
                const container = document.getElementById('paginacaoArtigos');
                if (container) container.style.display = 'none';
                
                const grid = document.querySelector('.artigos-grid');
                if (grid) {
                    grid.innerHTML = `
                        <div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;">
                            <div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h4 style="margin-top: 16px; color: var(--text-primary);">Nenhum artigo encontrado</h4>
                            <p style="color: var(--text-muted); margin-top: 8px;">Tente ajustar os filtros para encontrar o que procura.</p>
                        </div>
                    `;
                }
            }
        }

        function limparFiltros() {
            document.getElementById('searchArtigo').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterCategoria').value = '';
            document.getElementById('filterDestaque').value = '';
            document.getElementById('filterMidia').value = '';

            document.querySelectorAll('.artigo-card').forEach(card => {
                card.style.display = '';
            });

            totalItensVisiveis = document.querySelectorAll('.artigo-card').length;
            
            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            const grid = document.querySelector('.artigos-grid');
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
            const cards = document.querySelectorAll('.artigo-card:not([style*="display: none"])');
            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;

            document.querySelectorAll('.artigo-card').forEach(card => {
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
            const container = document.getElementById('paginacaoArtigos');

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
            const container = document.querySelector('.artigos-container');
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
        // AÇÕES DOS ARTIGOS
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

        function publicarArtigo(id, titulo) {
            mostrarConfirmacao(
                'Publicar Artigo',
                `Tem certeza que deseja publicar o artigo <strong>${titulo}</strong>?`,
                function() {
                    mostrarToast(`Artigo "${titulo}" publicado com sucesso!`, 'success');
                    const card = document.querySelector(`.artigo-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.status = 'publicado';
                        const badge = card.querySelector('.status-badge');
                        badge.className = 'status-badge status-publicado';
                        badge.innerHTML = '<span class="status-dot"></span> Publicado';
                        const actions = card.querySelector('.artigo-actions');
                        const publicarBtn = actions.querySelector('.btn-success');
                        if (publicarBtn) {
                            publicarBtn.remove();
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function destacarArtigo(id, titulo) {
            mostrarConfirmacao(
                'Destacar Artigo',
                `Tem certeza que deseja destacar o artigo <strong>${titulo}</strong>?`,
                function() {
                    mostrarToast(`Artigo "${titulo}" destacado com sucesso!`, 'success');
                    const card = document.querySelector(`.artigo-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.destaque = '1';
                        const imagem = card.querySelector('.artigo-imagem');
                        const destaqueBadge = document.createElement('span');
                        destaqueBadge.className = 'badge destaque-badge';
                        destaqueBadge.innerHTML = '<i class="fas fa-star"></i> Destaque';
                        imagem.appendChild(destaqueBadge);
                        
                        const actions = card.querySelector('.artigo-actions');
                        const destacarBtn = actions.querySelector('.btn-primary');
                        if (destacarBtn) {
                            destacarBtn.outerHTML = `
                                <button class="btn btn-sm btn-warning" title="Remover Destaque" onclick="removerDestaque(${id}, '${titulo}')">
                                    <i class="fas fa-star"></i>
                                </button>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function removerDestaque(id, titulo) {
            mostrarConfirmacao(
                'Remover Destaque',
                `Tem certeza que deseja remover o destaque do artigo <strong>${titulo}</strong>?`,
                function() {
                    mostrarToast(`Destaque removido do artigo "${titulo}"`, 'info');
                    const card = document.querySelector(`.artigo-card[data-id="${id}"]`);
                    if (card) {
                        card.dataset.destaque = '0';
                        const destaqueBadge = card.querySelector('.destaque-badge');
                        if (destaqueBadge) {
                            destaqueBadge.remove();
                        }
                        const actions = card.querySelector('.artigo-actions');
                        const removerBtn = actions.querySelector('.btn-warning');
                        if (removerBtn) {
                            removerBtn.outerHTML = `
                                <button class="btn btn-sm btn-primary" title="Destacar" onclick="destacarArtigo(${id}, '${titulo}')">
                                    <i class="fas fa-star"></i>
                                </button>
                            `;
                        }
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        // ==========================================
        // CRIAÇÃO DE ARTIGO
        // ==========================================

        function criarArtigo(event) {
            event.preventDefault();

            const titulo = document.getElementById('tituloArtigo').value;
            const resumo = document.getElementById('resumoArtigo').value;
            const conteudo = document.getElementById('conteudoArtigo').value;
            const categoria = document.getElementById('categoriaArtigo').value;
            const autor = document.getElementById('autorArtigo').value;
            const tipoMidia = document.getElementById('tipoMidiaArtigo').value;
            const videoUrl = document.getElementById('videoUrlArtigo').value;

            if (!titulo || !resumo || !conteudo || !categoria || !autor) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            if (tipoMidia === 'video' && !videoUrl) {
                mostrarToast('Por favor, insira o link do vídeo!', 'error');
                return;
            }

            mostrarToast(`Artigo "${titulo}" criado com sucesso!`, 'success');
            fecharModal('modalNovoArtigo');
            document.getElementById('formNovoArtigo').reset();

            setTimeout(() => {
                location.reload();
            }, 1500);
        }

        // ==========================================
        // EXPORTAÇÃO
        // ==========================================

        function exportarArtigos() {
            mostrarToast('Exportando lista de artigos...', 'info');
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
            const searchInput = document.getElementById('searchArtigo');
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
        /* BLOG - CSS COMPLETO                        */
        /* ========================================== */

        .artigos-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .artigos-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .artigos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        /* ===== ARTIGO CARD ===== */
        .artigo-card {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .artigo-card:hover {
            border-color: var(--color-aurora);
            transform: translateY(-4px);
            box-shadow: var(--glass-shadow);
        }

        /* ===== HEADER ===== */
        .artigo-header {
            display: flex;
            gap: var(--space-md);
            flex-direction: column;
        }

        .artigo-imagem {
            position: relative;
            border-radius: var(--radius-sm);
            overflow: hidden;
            height: 200px;
        }

        .artigo-imagem img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition-smooth);
        }

        .artigo-card:hover .artigo-imagem img {
            transform: scale(1.05);
        }

        /* ===== VIDEO EMBED ===== */
        .video-embed {
            position: relative;
            width: 100%;
            height: 100%;
            background: #0A1628;
        }

        .video-embed iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-embed .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .video-embed .video-overlay i {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.3);
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        /* ===== BADGES DE MÍDIA ===== */
        .midia-badge {
            position: absolute;
            bottom: 8px;
            right: 8px;
            font-size: 0.6rem;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            color: #FFFFFF;
            font-weight: 500;
            z-index: 2;
        }

        .midia-badge.imagem-badge {
            background: rgba(108, 43, 217, 0.85);
        }

        .midia-badge.video-badge {
            background: rgba(255, 107, 107, 0.85);
        }

        .midia-badge i {
            margin-right: 4px;
        }

        .artigo-imagem .status-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            font-size: 0.55rem;
            padding: 2px 8px;
            z-index: 3;
        }

        .artigo-imagem .destaque-badge {
            position: absolute;
            top: 8px;
            left: 8px;
            background: rgba(255, 217, 61, 0.9);
            color: #1A1A2E;
            font-size: 0.55rem;
            padding: 2px 8px;
            z-index: 3;
        }

        .artigo-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 4px 0;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .artigo-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: var(--space-xs);
        }

        .artigo-meta .meta-item {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .artigo-meta .meta-item i {
            font-size: 0.7rem;
        }

        .artigo-resumo {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ===== BODY ===== */
        .artigo-body {
            flex: 1;
        }

        .artigo-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            margin-bottom: var(--space-sm);
        }

        .artigo-tags .tag-item {
            font-size: var(--text-xs);
            color: var(--text-muted);
            background: var(--bg-input);
            padding: 2px 8px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-color);
        }

        .artigo-autor {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
        }

        .artigo-autor img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .artigo-autor div {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .artigo-autor .autor-nome {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .artigo-autor .autor-cargo {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .artigo-autor .artigo-data-atualizacao {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
        }

        /* ===== FOOTER ===== */
        .artigo-footer {
            display: flex;
            justify-content: flex-end;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
        }

        .artigo-footer .artigo-actions {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .artigo-footer .artigo-actions .btn {
            padding: 4px 6px;
            font-size: var(--text-xs);
            min-width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
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
        /* MODAL - UPLOAD DE IMAGEM                   */
        /* ========================================== */

        .form-section {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            padding: var(--space-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
        }

        .upload-area {
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            padding: var(--space-lg);
            text-align: center;
            transition: var(--transition-smooth);
            cursor: pointer;
            position: relative;
        }

        .upload-area:hover {
            border-color: var(--color-aurora);
            background: rgba(108, 43, 217, 0.02);
        }

        .upload-area .upload-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-xs);
        }

        .upload-area .upload-preview i {
            font-size: 3rem;
            color: var(--text-muted);
        }

        .upload-area .upload-preview p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
        }

        .upload-area .upload-preview span {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .upload-area .upload-preview img {
            max-width: 100%;
            max-height: 200px;
            border-radius: var(--radius-sm);
            object-fit: cover;
        }

        .upload-area .btn {
            margin-top: var(--space-sm);
        }

        .remove-image {
            position: absolute;
            top: 8px;
            right: 8px;
            padding: 2px 8px;
            font-size: 0.7rem;
            background: rgba(255, 107, 107, 0.9);
            color: #FFFFFF;
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .remove-image:hover {
            background: #FF6B6B;
        }

        /* ===== PREVIEW DE VÍDEO ===== */
        .video-preview-card {
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            padding: var(--space-sm);
            border: 1px solid var(--border-color);
        }

        .video-preview-embed {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            background: #0A1628;
            border-radius: var(--radius-sm);
            overflow: hidden;
        }

        .video-preview-embed iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-preview-card .btn {
            margin-top: var(--space-sm);
            width: 100%;
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
            max-width: 750px;
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

        .form-help {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .artigos-grid {
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .artigos-container {
                padding: var(--space-md);
            }

            .artigos-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .artigo-imagem {
                height: 180px;
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

            .artigo-autor .artigo-data-atualizacao {
                white-space: normal;
                font-size: var(--text-xs);
            }

            .video-embed .video-overlay i {
                font-size: 2rem;
            }

            .upload-area {
                padding: var(--space-md);
            }

            .upload-area .upload-preview i {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .artigos-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .artigo-card {
                padding: var(--space-sm);
            }

            .artigo-imagem {
                height: 150px;
            }

            .artigo-info h4 {
                font-size: var(--text-body);
            }

            .artigo-footer .artigo-actions .btn {
                padding: 2px 4px;
                font-size: 0.55rem;
                min-width: 24px;
                height: 24px;
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

            .artigo-meta .meta-item {
                font-size: var(--text-xs);
            }

            .video-embed .video-overlay i {
                font-size: 1.5rem;
            }
        }
    </style>

</body>
</html>