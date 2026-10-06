<?php
// painel/individual/servicos/portfolio-config.php - Configurar Portfólio Público
include "../../../includes/individual/notificacoes-servicos-count.php";

// ============================================
// FALLBACK - Garantir que as variáveis estão definidas
// ============================================
if (!isset($profissional_atual)) {
    $profissional_atual = [
        'id' => 1,
        'nome' => 'Carlos Mendes',
        'email' => 'carlos.mendes@email.com',
        'avatar' => 'avatar-1.png',
        'profissao' => 'Engenheiro Topógrafo',
        'plano' => 'Pro',
        'nivel' => 'Profissional Certificado'
    ];
}

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Configurar Portfólio';
$pagina_atual = 'portfolio-config';

// ============================================
// DADOS MOCKADOS - CONFIGURAÇÃO ATUAL
// ============================================
$config = [
    'portfolio_ativo' => true,
    'precos_ativos' => true,
    'url_personalizado' => 'carlos-mendes',
    'seo_titulo' => 'Carlos Mendes | Engenheiro Topógrafo',
    'seo_descricao' => 'Engenheiro Topógrafo com mais de 10 anos de experiência em levantamentos topográficos, mapeamento GIS e geotecnologia aplicada.',
    'seo_palavras_chave' => 'topografia, gis, cadastro, drones, agricultura de precisão, Luanda, Angola',
    'hero_badge' => 'Disponível para novos projetos',
    'hero_titulo' => 'Olá, sou Carlos',
    'hero_subtitulo' => 'Engenheiro Topógrafo com mais de 10 anos de experiência em levantamentos topográficos, mapeamento GIS e geotecnologia aplicada.',
    'hero_disponivel' => true,
    'sobre_titulo' => 'Conheça um pouco sobre a minha história',
    'sobre_bio' => 'Engenheiro Topógrafo com mais de 10 anos de experiência em levantamentos topográficos, mapeamento GIS e geotecnologia aplicada. Especializado em projetos de urbanismo, cadastro rural e agricultura de precisão.',
    'anos_experiencia' => 10,
    'projetos_concluidos' => 87,
    'clientes_satisfeitos' => 35,
    'avaliacao' => 4.9,
    'total_avaliacoes' => 42,
    'especialidades' => [
        'Levantamento Topográfico',
        'Mapeamento GIS',
        'Cadastro Rural',
        'Agricultura de Precisão',
        'Levantamento com Drones',
        'Modelação 3D'
    ],
    'mostrar_email' => true,
    'mostrar_telefone' => true,
    'mostrar_localizacao' => true,
    'whatsapp' => '+244 923 456 789',
    'linkedin' => 'https://linkedin.com/in/carlosmendes',
    'instagram' => 'https://instagram.com/carlosmendes',
    'facebook' => 'https://facebook.com/carlosmendes',
    'cor_primaria' => '#6C2BD9',
    'cor_secundaria' => '#00D2FF',
    'cor_destaque' => '#00FFA3',
    'mostrar_stats_hero' => true,
    'mostrar_stats_sobre' => true,
    'mostrar_planos' => true,
    'mostrar_descontos' => true,
    'mostrar_faq' => true,
    'mostrar_cta_final' => true
];

// ============================================
// SERVIÇOS DISPONÍVEIS
// ============================================
$servicos_disponiveis = [
    ['id' => 1, 'nome' => 'Levantamento Topográfico', 'categoria' => 'Topografia', 'categoria_color' => '#6C2BD9', 'categoria_icon' => 'fa-mountain', 'preco' => 350000, 'status' => 'ativo', 'mostrar' => true, 'destaque' => true, 'popular' => true],
    ['id' => 2, 'nome' => 'Mapeamento GIS', 'categoria' => 'GIS', 'categoria_color' => '#00FFA3', 'categoria_icon' => 'fa-globe', 'preco' => 480000, 'status' => 'ativo', 'mostrar' => true, 'destaque' => false, 'popular' => true],
    ['id' => 3, 'nome' => 'Levantamento Planialtimétrico', 'categoria' => 'Topografia', 'categoria_color' => '#6C2BD9', 'categoria_icon' => 'fa-mountain', 'preco' => 280000, 'status' => 'ativo', 'mostrar' => true, 'destaque' => false, 'popular' => false],
    ['id' => 4, 'nome' => 'Cadastro Rural', 'categoria' => 'Cadastro', 'categoria_color' => '#FFD93D', 'categoria_icon' => 'fa-home', 'preco' => 195000, 'status' => 'ativo', 'mostrar' => true, 'destaque' => false, 'popular' => false],
    ['id' => 5, 'nome' => 'Levantamento com Drone', 'categoria' => 'Drones', 'categoria_color' => '#FF6B6B', 'categoria_icon' => 'fa-drone', 'preco' => 320000, 'status' => 'ativo', 'mostrar' => true, 'destaque' => true, 'popular' => true],
    ['id' => 6, 'nome' => 'Análise de Solo Agrícola', 'categoria' => 'Agricultura', 'categoria_color' => '#6BCB77', 'categoria_icon' => 'fa-tractor', 'preco' => 220000, 'status' => 'ativo', 'mostrar' => true, 'destaque' => false, 'popular' => false],
    ['id' => 7, 'nome' => 'Consultoria em Urbanismo', 'categoria' => 'Urbanismo', 'categoria_color' => '#A29BFE', 'categoria_icon' => 'fa-city', 'preco' => 450000, 'status' => 'inativo', 'mostrar' => false, 'destaque' => false, 'popular' => false],
    ['id' => 8, 'nome' => 'Modelação 3D de Terreno', 'categoria' => 'Engenharia', 'categoria_color' => '#00D2FF', 'categoria_icon' => 'fa-ruler-combined', 'preco' => 275000, 'status' => 'inativo', 'mostrar' => false, 'destaque' => false, 'popular' => false],
];

// ============================================
// CATEGORIAS DE PREÇOS
// ============================================
$categorias_precos_config = [
    [
        'id' => 'topografia',
        'nome' => 'Topografia',
        'icon' => 'fa-mountain',
        'color' => '#6C2BD9',
        'servicos' => [
            ['nome' => 'Levantamento Topográfico Simples', 'preco' => 150000, 'unidade' => 'por hectare', 'prazo' => '7-10 dias'],
            ['nome' => 'Levantamento Topográfico Completo', 'preco' => 350000, 'unidade' => 'por hectare', 'prazo' => '15-30 dias', 'popular' => true],
            ['nome' => 'Levantamento Planialtimétrico', 'preco' => 280000, 'unidade' => 'por hectare', 'prazo' => '10-20 dias'],
        ]
    ],
    [
        'id' => 'gis',
        'nome' => 'GIS & Geoprocessamento',
        'icon' => 'fa-globe',
        'color' => '#00FFA3',
        'servicos' => [
            ['nome' => 'Mapeamento GIS Básico', 'preco' => 250000, 'unidade' => 'por projeto', 'prazo' => '15-20 dias'],
            ['nome' => 'Mapeamento GIS Completo', 'preco' => 480000, 'unidade' => 'por projeto', 'prazo' => '20-40 dias', 'popular' => true],
        ]
    ],
    [
        'id' => 'cadastro',
        'nome' => 'Cadastro',
        'icon' => 'fa-home',
        'color' => '#FFD93D',
        'servicos' => [
            ['nome' => 'Cadastro Rural Completo', 'preco' => 280000, 'unidade' => 'por propriedade', 'prazo' => '10-20 dias', 'popular' => true],
        ]
    ],
    [
        'id' => 'drones',
        'nome' => 'Drones',
        'icon' => 'fa-drone',
        'color' => '#FF6B6B',
        'servicos' => [
            ['nome' => 'Levantamento com Drone Completo', 'preco' => 320000, 'unidade' => 'por voo', 'prazo' => '5-10 dias', 'popular' => true],
        ]
    ]
];

// ============================================
// PLANOS DE ASSINATURA
// ============================================
$planos_config = [
    ['id' => 1, 'nome' => 'Startup', 'preco' => 750000, 'color' => '#00D2FF', 'icon' => 'fa-rocket', 'popular' => false, 'recursos' => ['100 projetos', '10 utilizadores', '100 GB', 'Suporte email']],
    ['id' => 2, 'nome' => 'Business', 'preco' => 1500000, 'color' => '#6C2BD9', 'icon' => 'fa-briefcase', 'popular' => true, 'recursos' => ['500 projetos', '25 utilizadores', '250 GB', 'Suporte prioritário', 'API completa']],
    ['id' => 3, 'nome' => 'Enterprise', 'preco' => 2500000, 'color' => '#FF6B6B', 'icon' => 'fa-building', 'popular' => false, 'recursos' => ['Projetos ilimitados', 'Utilizadores ilimitados', '1 TB', 'Suporte 24/7', 'SLA garantido']]
];

// ============================================
// DESCONTOS
// ============================================
$descontos_config = [
    ['tipo' => 'Cliente Novo', 'desconto' => '10%', 'condicao' => 'Primeira contratação', 'icon' => 'fa-user-plus', 'color' => '#00D2FF'],
    ['tipo' => 'Contrato Anual', 'desconto' => '15%', 'condicao' => 'Pagamento anual antecipado', 'icon' => 'fa-calendar-check', 'color' => '#00FFA3'],
    ['tipo' => 'Múltiplos Projetos', 'desconto' => '20%', 'condicao' => 'A partir de 3 projetos', 'icon' => 'fa-layer-group', 'color' => '#6C2BD9'],
    ['tipo' => 'Cliente Fidelizado', 'desconto' => '25%', 'condicao' => 'Cliente há mais de 1 ano', 'icon' => 'fa-crown', 'color' => '#FFD93D'],
];

// ============================================
// FAQ
// ============================================
$faqs_config = [
    ['pergunta' => 'Como funciona a cobrança dos serviços?', 'resposta' => 'A cobrança é feita com base na unidade indicada (por hectare, projeto, propriedade, etc.). O valor final pode variar conforme a complexidade e extensão do projeto.'],
    ['pergunta' => 'Qual o prazo de entrega?', 'resposta' => 'O prazo varia conforme o serviço contratado, geralmente entre 5 e 45 dias. Após análise do projeto, fornecemos um cronograma detalhado com marcos de entrega.'],
    ['pergunta' => 'Como funciona o pagamento?', 'resposta' => 'Trabalhamos com 50% adiantado e 50% na entrega para a maioria dos serviços. Para projetos maiores, podemos parcelar em até 3x sem juros.'],
    ['pergunta' => 'Os preços incluem impostos?', 'resposta' => 'Não. Os valores apresentados são base e a eles acresce IVA de 14% conforme legislação em vigor em Angola.'],
];

// ============================================
// LISTA DOS 12 SETORES
// ============================================
$setores_disponiveis = [
    ['id' => 'topografia', 'nome' => 'Topografia', 'icon' => 'fa-mountain', 'color' => '#6C2BD9'],
    ['id' => 'engenharia', 'nome' => 'Engenharia', 'icon' => 'fa-ruler-combined', 'color' => '#00D2FF'],
    ['id' => 'cadastro', 'nome' => 'Cadastro', 'icon' => 'fa-home', 'color' => '#FFD93D'],
    ['id' => 'gis', 'nome' => 'GIS', 'icon' => 'fa-globe', 'color' => '#00FFA3'],
    ['id' => 'agricultura', 'nome' => 'Agricultura', 'icon' => 'fa-tractor', 'color' => '#6BCB77'],
    ['id' => 'mineracao', 'nome' => 'Mineração', 'icon' => 'fa-gem', 'color' => '#FF9F43'],
    ['id' => 'petroleo', 'nome' => 'Petróleo & Gás', 'icon' => 'fa-oil-can', 'color' => '#FD79A8'],
    ['id' => 'energia', 'nome' => 'Energia', 'icon' => 'fa-bolt', 'color' => '#FFD93D'],
    ['id' => 'urbanismo', 'nome' => 'Urbanismo', 'icon' => 'fa-city', 'color' => '#A29BFE'],
    ['id' => 'transportes', 'nome' => 'Transportes', 'icon' => 'fa-truck', 'color' => '#00CEC9'],
    ['id' => 'drones', 'nome' => 'Drones', 'icon' => 'fa-drone', 'color' => '#FF6B6B'],
    ['id' => 'educacao', 'nome' => 'Educação', 'icon' => 'fa-graduation-cap', 'color' => '#FDCB6E'],
];
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
                        <i class="fas fa-sliders-h icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Serviços</a>
                        <span class="separator">/</span>
                        <span>Configurar Portfólio</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-servicos.php" ?>

                    <a href="portfolio.php" target="_blank" class="btn btn-outline">
                        <i class="fas fa-external-link-alt"></i> Ver Portfólio
                    </a>
                    <button type="submit" form="formConfigPortfolio" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formConfigPortfolio" onsubmit="guardarConfiguracao(event)">

                <!-- ========================================== -->
                <!-- SECÇÃO 1: ESTADO DO PORTFÓLIO              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-power-off"></i> Estado do Portfólio</h3>
                            <p>Ativar ou desativar as páginas públicas</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="toggle-grid">
                            <label class="toggle-card">
                                <input type="checkbox" id="portfolioAtivo" <?php echo $config['portfolio_ativo'] ? 'checked' : ''; ?>>
                                <div class="toggle-content">
                                    <div class="toggle-icon" style="background: rgba(0, 255, 163, 0.12); color: #00FFA3;">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <div class="toggle-info">
                                        <span class="toggle-titulo">Portfólio Público</span>
                                        <span class="toggle-descricao">A página "Sobre Mim" e os projetos ficam visíveis para os clientes</span>
                                    </div>
                                    <div class="toggle-switch"></div>
                                </div>
                            </label>

                            <label class="toggle-card">
                                <input type="checkbox" id="precosAtivos" <?php echo $config['precos_ativos'] ? 'checked' : ''; ?>>
                                <div class="toggle-content">
                                    <div class="toggle-icon" style="background: rgba(0, 210, 255, 0.12); color: #00D2FF;">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div class="toggle-info">
                                        <span class="toggle-titulo">Tabela de Preços</span>
                                        <span class="toggle-descricao">Os clientes podem ver os preços dos seus serviços</span>
                                    </div>
                                    <div class="toggle-switch"></div>
                                </div>
                            </label>
                        </div>

                        <div class="form-group" style="margin-top: var(--space-lg);">
                            <label class="form-label">
                                <i class="fas fa-link" style="color: #00FFA3;"></i>
                                Link Personalizado do Portfólio
                            </label>
                            <div class="input-prefix">
                                <span class="input-prefix-text">geonnexus.com/p/</span>
                                <input type="text" class="form-control" id="urlPersonalizado" 
                                       value="<?php echo htmlspecialchars($config['url_personalizado']); ?>"
                                       placeholder="seu-nome" 
                                       pattern="[a-z0-9-]+"
                                       title="Apenas letras minúsculas, números e hífen">
                                <button type="button" class="btn btn-sm btn-outline" onclick="copiarLink()">
                                    <i class="fas fa-copy"></i> Copiar
                                </button>
                            </div>
                            <span class="form-help">Este será o link público do seu portfólio. Apenas letras minúsculas, números e hífen.</span>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 2: SEO E METADADOS                  -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="form-section-header">
                        <div class="section-number">2</div>
                        <div class="section-title">
                            <h3><i class="fas fa-search"></i> SEO e Metadados</h3>
                            <p>Como o seu portfólio aparece nos motores de busca</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="google-preview">
                            <div class="google-preview-label">
                                <i class="fab fa-google"></i>
                                Pré-visualização no Google
                            </div>
                            <div class="google-preview-card">
                                <div class="google-preview-url">
                                    <i class="fas fa-globe"></i>
                                    geonnexus.com/p/<?php echo htmlspecialchars($config['url_personalizado']); ?>
                                </div>
                                <div class="google-preview-titulo" id="googlePreviewTitulo">
                                    <?php echo htmlspecialchars($config['seo_titulo']); ?>
                                </div>
                                <div class="google-preview-descricao" id="googlePreviewDescricao">
                                    <?php echo htmlspecialchars($config['seo_descricao']); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Título SEO <span class="required">*</span></label>
                            <input type="text" class="form-control" id="seoTitulo" 
                                   value="<?php echo htmlspecialchars($config['seo_titulo']); ?>"
                                   maxlength="60"
                                   oninput="atualizarPreviewGoogle()">
                            <div class="char-counter">
                                <span id="seoTituloCount"><?php echo mb_strlen($config['seo_titulo']); ?></span> / 60
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição SEO <span class="required">*</span></label>
                            <textarea class="form-control" id="seoDescricao" rows="2" 
                                      maxlength="160"
                                      oninput="atualizarPreviewGoogle()"><?php echo htmlspecialchars($config['seo_descricao']); ?></textarea>
                            <div class="char-counter">
                                <span id="seoDescricaoCount"><?php echo mb_strlen($config['seo_descricao']); ?></span> / 160
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Palavras-chave</label>
                            <input type="text" class="form-control" id="seoPalavrasChave" 
                                   value="<?php echo htmlspecialchars($config['seo_palavras_chave']); ?>"
                                   placeholder="topografia, gis, cadastro...">
                            <span class="form-help">Separe por vírgulas. Ajuda na pesquisa interna.</span>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 3: HERO (TOPO)                      -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.15s;">
                    <div class="form-section-header">
                        <div class="section-number">3</div>
                        <div class="section-title">
                            <h3><i class="fas fa-image"></i> Hero (Topo do Portfólio)</h3>
                            <p>A primeira impressão que os clientes têm</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">Badge / Estado</label>
                            <select class="form-control" id="heroBadge">
                                <option value="Disponível para novos projetos" <?php echo $config['hero_badge'] === 'Disponível para novos projetos' ? 'selected' : ''; ?>>Disponível para novos projetos</option>
                                <option value="Aceitando novos projetos" <?php echo $config['hero_badge'] === 'Aceitando novos projetos' ? 'selected' : ''; ?>>Aceitando novos projetos</option>
                                <option value="Ocupado até próxima data" <?php echo $config['hero_badge'] === 'Ocupado até próxima data' ? 'selected' : ''; ?>>Ocupado até próxima data</option>
                                <option value="Disponível para consultoria" <?php echo $config['hero_badge'] === 'Disponível para consultoria' ? 'selected' : ''; ?>>Disponível para consultoria</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Título Principal</label>
                                <input type="text" class="form-control" id="heroTitulo" 
                                       value="<?php echo htmlspecialchars($config['hero_titulo']); ?>"
                                       maxlength="80">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Anos de Experiência</label>
                                <input type="number" class="form-control" id="anosExperiencia" 
                                       value="<?php echo $config['anos_experiencia']; ?>"
                                       min="0" max="80">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Subtítulo / Frase de Impacto</label>
                            <textarea class="form-control" id="heroSubtitulo" rows="3" 
                                      maxlength="300"><?php echo htmlspecialchars($config['hero_subtitulo']); ?></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Projetos Concluídos</label>
                                <input type="number" class="form-control" id="projetosConcluidos" 
                                       value="<?php echo $config['projetos_concluidos']; ?>"
                                       min="0">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Clientes Satisfeitos</label>
                                <input type="number" class="form-control" id="clientesSatisfeitos" 
                                       value="<?php echo $config['clientes_satisfeitos']; ?>"
                                       min="0">
                            </div>
                        </div>

                        <div class="checkbox-group">
                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarStatsHero" <?php echo $config['mostrar_stats_hero'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong>Mostrar Estatísticas no Hero</strong>
                                    <small>Exibe os números (anos, projetos, clientes) na secção principal</small>
                                </div>
                            </label>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 4: SOBRE                            -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-user"></i> Secção Sobre</h3>
                            <p>Sua biografia e informações profissionais</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">Título da Secção Sobre</label>
                            <input type="text" class="form-control" id="sobreTitulo" 
                                   value="<?php echo htmlspecialchars($config['sobre_titulo']); ?>"
                                   maxlength="100">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Biografia <span class="required">*</span></label>
                            <textarea class="form-control" id="sobreBio" rows="5" 
                                      maxlength="800"><?php echo htmlspecialchars($config['sobre_bio']); ?></textarea>
                            <div class="char-counter">
                                <span id="sobreBioCount"><?php echo mb_strlen($config['sobre_bio']); ?></span> / 800
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-star" style="color: #00FFA3;"></i>
                                Especialidades / Setores de Atuação
                            </label>
                            <div class="especialidades-grid">
                                <?php foreach ($setores_disponiveis as $setor): ?>
                                    <label class="especialidade-item <?php echo in_array($setor['nome'], $config['especialidades']) ? 'selected' : ''; ?>">
                                        <input type="checkbox" 
                                               value="<?php echo $setor['nome']; ?>"
                                               <?php echo in_array($setor['nome'], $config['especialidades']) ? 'checked' : ''; ?>
                                               onchange="toggleEspecialidade(this)">
                                        <div class="especialidade-icon" style="background: <?php echo $setor['color']; ?>20; color: <?php echo $setor['color']; ?>;">
                                            <i class="fas <?php echo $setor['icon']; ?>"></i>
                                        </div>
                                        <span class="especialidade-nome"><?php echo $setor['nome']; ?></span>
                                        <i class="fas fa-check especialidade-check"></i>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <span class="form-help">Selecione os setores em que atua. Aparecerão como tags no portfólio.</span>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 5: CONTACTOS E REDES SOCIAIS        -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.25s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-address-book"></i> Contactos e Redes Sociais</h3>
                            <p>Como os clientes podem entrar em contacto</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fab fa-whatsapp" style="color: #25D366;"></i>
                                WhatsApp
                            </label>
                            <input type="tel" class="form-control" id="whatsapp" 
                                   value="<?php echo htmlspecialchars($config['whatsapp']); ?>"
                                   placeholder="+244 923 456 789">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fab fa-linkedin" style="color: #0077B5;"></i>
                                LinkedIn
                            </label>
                            <input type="url" class="form-control" id="linkedin" 
                                   value="<?php echo htmlspecialchars($config['linkedin']); ?>"
                                   placeholder="https://linkedin.com/in/seu-perfil">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fab fa-instagram" style="color: #E4405F;"></i>
                                Instagram
                            </label>
                            <input type="url" class="form-control" id="instagram" 
                                   value="<?php echo htmlspecialchars($config['instagram']); ?>"
                                   placeholder="https://instagram.com/seu-perfil">
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fab fa-facebook" style="color: #1877F2;"></i>
                                Facebook
                            </label>
                            <input type="url" class="form-control" id="facebook" 
                                   value="<?php echo htmlspecialchars($config['facebook']); ?>"
                                   placeholder="https://facebook.com/seu-perfil">
                        </div>

                        <div class="checkbox-group">
                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarEmail" <?php echo $config['mostrar_email'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong>Mostrar Email Publicamente</strong>
                                    <small><?php echo $profissional_atual['email']; ?></small>
                                </div>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarTelefone" <?php echo $config['mostrar_telefone'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong>Mostrar Telefone Publicamente</strong>
                                    <small>+244 923 456 789</small>
                                </div>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarLocalizacao" <?php echo $config['mostrar_localizacao'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong>Mostrar Localização</strong>
                                    <small>Luanda, Angola</small>
                                </div>
                            </label>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 6: CORES                            -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">6</div>
                        <div class="section-title">
                            <h3><i class="fas fa-palette"></i> Cores e Identidade Visual</h3>
                            <p>Personalize as cores do seu portfólio público</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="cores-grid">
                            <div class="cor-item">
                                <label class="form-label">Cor Primária</label>
                                <div class="color-picker-wrapper">
                                    <input type="color" class="color-picker" id="corPrimaria" 
                                           value="<?php echo $config['cor_primaria']; ?>"
                                           onchange="atualizarCor('corPrimaria', this.value)">
                                    <input type="text" class="form-control" id="corPrimariaHex" 
                                           value="<?php echo $config['cor_primaria']; ?>"
                                           oninput="document.getElementById('corPrimaria').value = this.value">
                                </div>
                            </div>

                            <div class="cor-item">
                                <label class="form-label">Cor Secundária</label>
                                <div class="color-picker-wrapper">
                                    <input type="color" class="color-picker" id="corSecundaria" 
                                           value="<?php echo $config['cor_secundaria']; ?>"
                                           onchange="atualizarCor('corSecundaria', this.value)">
                                    <input type="text" class="form-control" id="corSecundariaHex" 
                                           value="<?php echo $config['cor_secundaria']; ?>"
                                           oninput="document.getElementById('corSecundaria').value = this.value">
                                </div>
                            </div>

                            <div class="cor-item">
                                <label class="form-label">Cor de Destaque</label>
                                <div class="color-picker-wrapper">
                                    <input type="color" class="color-picker" id="corDestaque" 
                                           value="<?php echo $config['cor_destaque']; ?>"
                                           onchange="atualizarCor('corDestaque', this.value)">
                                    <input type="text" class="form-control" id="corDestaqueHex" 
                                           value="<?php echo $config['cor_destaque']; ?>"
                                           oninput="document.getElementById('corDestaque').value = this.value">
                                </div>
                            </div>
                        </div>

                        <div class="paletas-titulo">
                            <i class="fas fa-magic"></i> Paletas Pré-definidas
                        </div>
                        <div class="paletas-grid">
                            <button type="button" class="paleta-btn" onclick="aplicarPaleta('#6C2BD9', '#00D2FF', '#00FFA3')">
                                <div class="paleta-cores">
                                    <span style="background: #6C2BD9;"></span>
                                    <span style="background: #00D2FF;"></span>
                                    <span style="background: #00FFA3;"></span>
                                </div>
                                <span>Padrão GeoNexus</span>
                            </button>
                            <button type="button" class="paleta-btn" onclick="aplicarPaleta('#FF6B6B', '#FF9F43', '#FFD93D')">
                                <div class="paleta-cores">
                                    <span style="background: #FF6B6B;"></span>
                                    <span style="background: #FF9F43;"></span>
                                    <span style="background: #FFD93D;"></span>
                                </div>
                                <span>Quente</span>
                            </button>
                            <button type="button" class="paleta-btn" onclick="aplicarPaleta('#00B894', '#00CEC9', '#55EFC4')">
                                <div class="paleta-cores">
                                    <span style="background: #00B894;"></span>
                                    <span style="background: #00CEC9;"></span>
                                    <span style="background: #55EFC4;"></span>
                                </div>
                                <span>Natureza</span>
                            </button>
                            <button type="button" class="paleta-btn" onclick="aplicarPaleta('#2E86DE', '#54A0FF', '#48DBFB')">
                                <div class="paleta-cores">
                                    <span style="background: #2E86DE;"></span>
                                    <span style="background: #54A0FF;"></span>
                                    <span style="background: #48DBFB;"></span>
                                </div>
                                <span>Azul Oceano</span>
                            </button>
                            <button type="button" class="paleta-btn" onclick="aplicarPaleta('#8E44AD', '#9B59B6', '#E056FD')">
                                <div class="paleta-cores">
                                    <span style="background: #8E44AD;"></span>
                                    <span style="background: #9B59B6;"></span>
                                    <span style="background: #E056FD;"></span>
                                </div>
                                <span>Roxo Real</span>
                            </button>
                            <button type="button" class="paleta-btn" onclick="aplicarPaleta('#2C3E50', '#34495E', '#95A5A6')">
                                <div class="paleta-cores">
                                    <span style="background: #2C3E50;"></span>
                                    <span style="background: #34495E;"></span>
                                    <span style="background: #95A5A6;"></span>
                                </div>
                                <span>Profissional</span>
                            </button>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 7: SECÇÕES A MOSTRAR                -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.35s;">
                    <div class="form-section-header">
                        <div class="section-number">7</div>
                        <div class="section-title">
                            <h3><i class="fas fa-eye"></i> Secções a Mostrar</h3>
                            <p>Escolha o que aparece no seu portfólio público</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="checkbox-group">
                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarStatsSobre" <?php echo $config['mostrar_stats_sobre'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-chart-bar" style="color: #00D2FF;"></i> Estatísticas na Secção Sobre</strong>
                                    <small>Exibe os números de experiência, projetos e clientes</small>
                                </div>
                            </label>

                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarPlanos" <?php echo $config['mostrar_planos'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-crown" style="color: #FFD93D;"></i> Planos de Assinatura</strong>
                                    <small>Mostra os planos mensais para empresas na página de preços</small>
                                </div>
                            </label>

                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarDescontos" <?php echo $config['mostrar_descontos'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-percent" style="color: #00FFA3;"></i> Descontos Especiais</strong>
                                    <small>Exibe a secção de descontos disponíveis</small>
                                </div>
                            </label>

                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarFaq" <?php echo $config['mostrar_faq'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-question-circle" style="color: #6C2BD9;"></i> Perguntas Frequentes (FAQ)</strong>
                                    <small>Mostra a secção de FAQ na página de preços</small>
                                </div>
                            </label>

                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarCtaFinal" <?php echo $config['mostrar_cta_final'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-handshake" style="color: #00D2FF;"></i> CTA Final (Chamada para Ação)</strong>
                                    <small>Exibe a secção "Pronto para iniciar o seu projeto?"</small>
                                </div>
                            </label>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 8: SERVIÇOS NO PORTFÓLIO            -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="form-section-header">
                        <div class="section-number">8</div>
                        <div class="section-title">
                            <h3><i class="fas fa-tools"></i> Serviços no Portfólio</h3>
                            <p>Selecione quais serviços aparecem no seu portfólio público</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="info-box">
                            <i class="fas fa-info-circle"></i>
                            <div>
                                <strong>Serviços Ativos</strong>
                                <span>Estes serviços aparecem na secção "Meus Serviços" do portfólio público. Só os serviços com estado <strong>ativo</strong> podem ser exibidos.</span>
                            </div>
                        </div>

                        <div class="servicos-selecao-list">
                            <?php foreach ($servicos_disponiveis as $servico): ?>
                                <div class="servico-selecao-item <?php echo $servico['mostrar'] ? 'selected' : ''; ?> <?php echo $servico['status'] !== 'ativo' ? 'disabled' : ''; ?>"
                                     data-servico-id="<?php echo $servico['id']; ?>">
                                    
                                    <label class="servico-selecao-checkbox">
                                        <input type="checkbox" 
                                               <?php echo $servico['mostrar'] ? 'checked' : ''; ?>
                                               <?php echo $servico['status'] !== 'ativo' ? 'disabled' : ''; ?>
                                               onchange="toggleServico(this)">
                                        <span class="servico-check-mark"></span>
                                    </label>

                                    <div class="servico-selecao-icon" style="background: <?php echo $servico['categoria_color']; ?>20; color: <?php echo $servico['categoria_color']; ?>;">
                                        <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                    </div>

                                    <div class="servico-selecao-info">
                                        <div class="servico-selecao-nome"><?php echo $servico['nome']; ?></div>
                                        <div class="servico-selecao-meta">
                                            <span class="servico-selecao-categoria" style="color: <?php echo $servico['categoria_color']; ?>;">
                                                <?php echo $servico['categoria']; ?>
                                            </span>
                                            <span class="servico-selecao-preco">Kz <?php echo number_format($servico['preco'], 0, ',', '.'); ?></span>
                                            <?php if ($servico['status'] !== 'ativo'): ?>
                                                <span class="servico-selecao-status">Inativo</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="servico-selecao-badges">
                                        <label class="servico-badge-toggle" title="Destacar">
                                            <input type="checkbox" <?php echo $servico['destaque'] ? 'checked' : ''; ?> onchange="toggleBadge(this, 'destaque')">
                                            <i class="fas fa-star"></i>
                                        </label>
                                        <label class="servico-badge-toggle" title="Popular">
                                            <input type="checkbox" <?php echo $servico['popular'] ? 'checked' : ''; ?> onchange="toggleBadge(this, 'popular')">
                                            <i class="fas fa-fire"></i>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="form-actions-inline">
                            <button type="button" class="btn btn-sm btn-outline" onclick="selecionarTodosServicos()">
                                <i class="fas fa-check-double"></i> Selecionar Todos
                            </button>
                            <button type="button" class="btn btn-sm btn-outline" onclick="desmarcarTodosServicos()">
                                <i class="fas fa-times"></i> Desmarcar Todos
                            </button>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 9: TABELA DE PREÇOS                 -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.45s;">
                    <div class="form-section-header">
                        <div class="section-number">9</div>
                        <div class="section-title">
                            <h3><i class="fas fa-tags"></i> Tabela de Preços</h3>
                            <p>Configure as categorias e preços que aparecem na página pública</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="info-box">
                            <i class="fas fa-info-circle"></i>
                            <div>
                                <strong>Organização da Tabela</strong>
                                <span>Os preços são agrupados por categoria. Pode adicionar, editar ou remover serviços e ajustar os preços e prazos.</span>
                            </div>
                        </div>

                        <div class="categorias-precos-list">
                            <?php foreach ($categorias_precos_config as $cat): ?>
                                <div class="categoria-precos-item" data-cat-id="<?php echo $cat['id']; ?>">
                                    <div class="categoria-precos-header" style="--cat-color: <?php echo $cat['color']; ?>;">
                                        <div class="categoria-precos-drag">
                                            <i class="fas fa-grip-vertical"></i>
                                        </div>
                                        <div class="categoria-precos-icon" style="background: <?php echo $cat['color']; ?>20; color: <?php echo $cat['color']; ?>;">
                                            <i class="fas <?php echo $cat['icon']; ?>"></i>
                                        </div>
                                        <input type="text" class="categoria-precos-nome-input" value="<?php echo $cat['nome']; ?>" placeholder="Nome da categoria">
                                        <button type="button" class="categoria-precos-btn danger" onclick="removerCategoriaPreco(this)" title="Remover categoria">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button type="button" class="categoria-precos-btn" onclick="toggleCategoriaPreco(this)" title="Expandir/Recolher">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>

                                    <div class="categoria-precos-servicos">
                                        <div class="servicos-precos-list">
                                            <?php foreach ($cat['servicos'] as $srv): ?>
                                                <div class="servico-preco-item">
                                                    <input type="text" class="form-control servico-preco-input" value="<?php echo htmlspecialchars($srv['nome']); ?>" placeholder="Nome do serviço">
                                                    <div class="servico-preco-inputs">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Kz</span>
                                                            <input type="number" class="form-control servico-preco-value" value="<?php echo $srv['preco']; ?>" placeholder="0" step="1000">
                                                        </div>
                                                        <input type="text" class="form-control servico-preco-unidade" value="<?php echo htmlspecialchars($srv['unidade']); ?>" placeholder="por hectare">
                                                        <input type="text" class="form-control servico-preco-prazo" value="<?php echo htmlspecialchars($srv['prazo']); ?>" placeholder="7-10 dias">
                                                    </div>
                                                    <label class="servico-preco-popular" title="Marcar como Popular">
                                                        <input type="checkbox" <?php echo isset($srv['popular']) && $srv['popular'] ? 'checked' : ''; ?>>
                                                        <i class="fas fa-fire"></i>
                                                    </label>
                                                    <button type="button" class="servico-preco-remove" onclick="removerServicoPreco(this)" title="Remover serviço">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <button type="button" class="btn btn-sm btn-outline btn-add-servico-preco" onclick="adicionarServicoPreco(this)">
                                            <i class="fas fa-plus"></i> Adicionar Serviço
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="button" class="btn btn-outline btn-add-categoria" onclick="adicionarCategoriaPreco()">
                            <i class="fas fa-plus"></i> Adicionar Nova Categoria de Preços
                        </button>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 10: PLANOS DE ASSINATURA            -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.5s;">
                    <div class="form-section-header">
                        <div class="section-number">10</div>
                        <div class="section-title">
                            <h3><i class="fas fa-crown"></i> Planos de Assinatura</h3>
                            <p>Configure os planos mensais para empresas</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="info-box">
                            <i class="fas fa-info-circle"></i>
                            <div>
                                <strong>Planos Empresariais</strong>
                                <span>Estes planos aparecem na secção "Para Empresas" da página de preços. Configure os preços, recursos e destaque de cada plano.</span>
                            </div>
                        </div>

                        <div class="checkbox-group" style="margin-bottom: var(--space-lg);">
                            <label class="checkbox-item">
                                <input type="checkbox" id="mostrarPlanosConfig" <?php echo $config['mostrar_planos'] ? 'checked' : ''; ?>>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-crown" style="color: #FFD93D;"></i> Mostrar Planos na Página de Preços</strong>
                                    <small>Ativa ou desativa a secção de planos empresariais</small>
                                </div>
                            </label>
                        </div>

                        <div class="planos-config-list">
                            <?php foreach ($planos_config as $plano): ?>
                                <div class="plano-config-item" style="--plano-color: <?php echo $plano['color']; ?>;">
                                    <div class="plano-config-header">
                                        <div class="plano-config-drag">
                                            <i class="fas fa-grip-vertical"></i>
                                        </div>
                                        <div class="plano-config-icon" style="background: <?php echo $plano['color']; ?>20; color: <?php echo $plano['color']; ?>;">
                                            <i class="fas <?php echo $plano['icon']; ?>"></i>
                                        </div>
                                        <input type="text" class="plano-config-nome" value="<?php echo $plano['nome']; ?>" placeholder="Nome do plano">
                                        <label class="plano-config-popular" title="Marcar como Popular">
                                            <input type="checkbox" <?php echo $plano['popular'] ? 'checked' : ''; ?>>
                                            <i class="fas fa-star"></i>
                                            <span>Popular</span>
                                        </label>
                                        <button type="button" class="plano-config-btn danger" onclick="removerPlano(this)" title="Remover">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button type="button" class="plano-config-btn" onclick="togglePlano(this)" title="Expandir/Recolher">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>

                                    <div class="plano-config-body">
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label class="form-label">Preço Mensal</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Kz</span>
                                                    <input type="number" class="form-control" value="<?php echo $plano['preco']; ?>" step="1000">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Cor do Plano</label>
                                                <input type="color" class="color-picker-small" value="<?php echo $plano['color']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Recursos do Plano</label>
                                            <div class="plano-recursos-edit">
                                                <?php foreach ($plano['recursos'] as $recurso): ?>
                                                    <div class="plano-recurso-item">
                                                        <i class="fas fa-check-circle" style="color: <?php echo $plano['color']; ?>;"></i>
                                                        <input type="text" value="<?php echo htmlspecialchars($recurso); ?>" placeholder="Recurso">
                                                        <button type="button" class="btn" onclick="this.parentElement.remove()">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline" style="width: 100%; justify-content: center; margin-top: 6px;" onclick="adicionarRecursoPlano(this)">
                                                <i class="fas fa-plus"></i> Adicionar Recurso
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="button" class="btn btn-outline btn-add-categoria" onclick="adicionarPlano()">
                            <i class="fas fa-plus"></i> Adicionar Novo Plano
                        </button>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 11: DESCONTOS E FAQ                 -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.55s;">
                    <div class="form-section-header">
                        <div class="section-number">11</div>
                        <div class="section-title">
                            <h3><i class="fas fa-percent"></i> Descontos e FAQ</h3>
                            <p>Configure os descontos e as perguntas frequentes</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <!-- DESCONTOS -->
                        <div class="subsection-titulo">
                            <i class="fas fa-tag" style="color: #00FFA3;"></i>
                            <span>Descontos Especiais</span>
                            <label class="subsection-toggle">
                                <input type="checkbox" id="mostrarDescontosConfig" <?php echo $config['mostrar_descontos'] ? 'checked' : ''; ?>>
                                <span class="toggle-mini"></span>
                            </label>
                        </div>

                        <div class="descontos-edit-list">
                            <?php foreach ($descontos_config as $desc): ?>
                                <div class="desconto-edit-item">
                                    <div class="desconto-edit-icon" style="background: <?php echo $desc['color']; ?>20; color: <?php echo $desc['color']; ?>;">
                                        <i class="fas <?php echo $desc['icon']; ?>"></i>
                                    </div>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($desc['tipo']); ?>" placeholder="Tipo de desconto">
                                    <input type="text" class="form-control desconto-edit-value" value="<?php echo $desc['desconto']; ?>" placeholder="10%">
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($desc['condicao']); ?>" placeholder="Condição">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.remove()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="button" class="btn btn-sm btn-outline" style="width: 100%; justify-content: center; margin-top: var(--space-sm);" onclick="adicionarDesconto()">
                            <i class="fas fa-plus"></i> Adicionar Desconto
                        </button>

                        <div class="subsection-separador"></div>

                        <!-- FAQ -->
                        <div class="subsection-titulo">
                            <i class="fas fa-question-circle" style="color: #6C2BD9;"></i>
                            <span>Perguntas Frequentes (FAQ)</span>
                            <label class="subsection-toggle">
                                <input type="checkbox" id="mostrarFaqConfig" <?php echo $config['mostrar_faq'] ? 'checked' : ''; ?>>
                                <span class="toggle-mini"></span>
                            </label>
                        </div>

                        <div class="faq-edit-list">
                            <?php foreach ($faqs_config as $index => $faq): ?>
                                <div class="faq-edit-item">
                                    <div class="faq-edit-number"><?php echo $index + 1; ?></div>
                                    <div class="faq-edit-content">
                                        <input type="text" class="form-control faq-edit-pergunta" value="<?php echo htmlspecialchars($faq['pergunta']); ?>" placeholder="Pergunta">
                                        <textarea class="form-control faq-edit-resposta" rows="2" placeholder="Resposta"><?php echo htmlspecialchars($faq['resposta']); ?></textarea>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.remove(); renumerarFaq()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="button" class="btn btn-sm btn-outline" style="width: 100%; justify-content: center; margin-top: var(--space-sm);" onclick="adicionarFaq()">
                            <i class="fas fa-plus"></i> Adicionar Pergunta
                        </button>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- SECÇÃO 12: PREVIEW                        -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.6s;">
                    <div class="form-section-header">
                        <div class="section-number">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="section-title">
                            <h3><i class="fas fa-mobile-alt"></i> Pré-visualização</h3>
                            <p>Como o seu portfólio aparecerá para os clientes</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="preview-browser">
                            <div class="preview-browser-header">
                                <div class="preview-browser-dots">
                                    <span style="background: #FF6B6B;"></span>
                                    <span style="background: #FFD93D;"></span>
                                    <span style="background: #00FFA3;"></span>
                                </div>
                                <div class="preview-browser-url">
                                    <i class="fas fa-lock" style="color: #00FFA3; font-size: 10px;"></i>
                                    <span id="previewUrl">geonnexus.com/p/<?php echo htmlspecialchars($config['url_personalizado']); ?></span>
                                </div>
                            </div>
                            <div class="preview-browser-content">
                                <div class="preview-hero">
                                    <div class="preview-hero-badge">
                                        <i class="fas fa-circle"></i>
                                        <span id="previewHeroBadge"><?php echo htmlspecialchars($config['hero_badge']); ?></span>
                                    </div>
                                    <div class="preview-hero-nome" id="previewHeroNome">
                                        <?php echo htmlspecialchars($config['hero_titulo']); ?>
                                    </div>
                                    <div class="preview-hero-profissao">
                                        <?php echo $profissional_atual['profissao']; ?>
                                    </div>
                                    <div class="preview-hero-botoes">
                                        <span class="preview-btn-primary" style="background: linear-gradient(135deg, <?php echo $config['cor_primaria']; ?> 0%, <?php echo $config['cor_secundaria']; ?> 100%);">
                                            Ver Serviços
                                        </span>
                                        <span class="preview-btn-outline">Contactar</span>
                                    </div>
                                </div>
                                <div class="preview-sobre">
                                    <div class="preview-sobre-titulo" id="previewSobreTitulo">
                                        <?php echo htmlspecialchars($config['sobre_titulo']); ?>
                                    </div>
                                    <div class="preview-sobre-bio" id="previewSobreBio">
                                        <?php echo mb_substr($config['sobre_bio'], 0, 150); ?>...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.65s;">
                    <a href="index.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="restaurarConfiguracao()">
                        <i class="fas fa-undo"></i> Restaurar
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Guardar Configuração
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO                       -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 450px; border-color: var(--border-color);">
            <div class="modal-header">
                <h3 class="modal-title" style="color: #FFD93D;">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body">
                <p id="modalConfirmacaoTexto">Tem certeza que deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-primary" id="modalConfirmacaoBtn">Confirmar</button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // DADOS ORIGINAIS
        // ============================================
        const dadosOriginais = {
            portfolio_ativo: <?php echo json_encode($config['portfolio_ativo']); ?>,
            precos_ativos: <?php echo json_encode($config['precos_ativos']); ?>,
            url_personalizado: <?php echo json_encode($config['url_personalizado']); ?>,
            seo_titulo: <?php echo json_encode($config['seo_titulo']); ?>,
            seo_descricao: <?php echo json_encode($config['seo_descricao']); ?>,
            seo_palavras_chave: <?php echo json_encode($config['seo_palavras_chave']); ?>,
            hero_badge: <?php echo json_encode($config['hero_badge']); ?>,
            hero_titulo: <?php echo json_encode($config['hero_titulo']); ?>,
            hero_subtitulo: <?php echo json_encode($config['hero_subtitulo']); ?>,
            sobre_titulo: <?php echo json_encode($config['sobre_titulo']); ?>,
            sobre_bio: <?php echo json_encode($config['sobre_bio']); ?>,
            anos_experiencia: <?php echo json_encode($config['anos_experiencia']); ?>,
            projetos_concluidos: <?php echo json_encode($config['projetos_concluidos']); ?>,
            clientes_satisfeitos: <?php echo json_encode($config['clientes_satisfeitos']); ?>,
            whatsapp: <?php echo json_encode($config['whatsapp']); ?>,
            linkedin: <?php echo json_encode($config['linkedin']); ?>,
            instagram: <?php echo json_encode($config['instagram']); ?>,
            facebook: <?php echo json_encode($config['facebook']); ?>,
            cor_primaria: <?php echo json_encode($config['cor_primaria']); ?>,
            cor_secundaria: <?php echo json_encode($config['cor_secundaria']); ?>,
            cor_destaque: <?php echo json_encode($config['cor_destaque']); ?>
        };

        // ============================================
        // TOGGLE SIDEBAR
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
        // CONTADORES
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const seoTitulo = document.getElementById('seoTitulo');
            const seoTituloCount = document.getElementById('seoTituloCount');
            if (seoTitulo && seoTituloCount) {
                seoTitulo.addEventListener('input', function() {
                    seoTituloCount.textContent = this.value.length;
                });
            }

            const seoDescricao = document.getElementById('seoDescricao');
            const seoDescricaoCount = document.getElementById('seoDescricaoCount');
            if (seoDescricao && seoDescricaoCount) {
                seoDescricao.addEventListener('input', function() {
                    seoDescricaoCount.textContent = this.value.length;
                });
            }

            const sobreBio = document.getElementById('sobreBio');
            const sobreBioCount = document.getElementById('sobreBioCount');
            if (sobreBio && sobreBioCount) {
                sobreBio.addEventListener('input', function() {
                    sobreBioCount.textContent = this.value.length;
                });
            }
        });

        // ============================================
        // PREVIEW GOOGLE
        // ============================================
        function atualizarPreviewGoogle() {
            const titulo = document.getElementById('seoTitulo');
            const descricao = document.getElementById('seoDescricao');
            const previewTitulo = document.getElementById('googlePreviewTitulo');
            const previewDescricao = document.getElementById('googlePreviewDescricao');

            if (titulo && previewTitulo) previewTitulo.textContent = titulo.value || 'Título SEO';
            if (descricao && previewDescricao) previewDescricao.textContent = descricao.value || 'Descrição SEO';
        }

        // ============================================
        // PREVIEW PORTFÓLIO
        // ============================================
        function atualizarPreview() {
            const url = document.getElementById('urlPersonalizado');
            const previewUrl = document.getElementById('previewUrl');
            if (url && previewUrl) previewUrl.textContent = 'geonnexus.com/p/' + (url.value || 'seu-nome');

            const heroBadge = document.getElementById('heroBadge');
            const previewHeroBadge = document.getElementById('previewHeroBadge');
            if (heroBadge && previewHeroBadge) previewHeroBadge.textContent = heroBadge.value;

            const heroTitulo = document.getElementById('heroTitulo');
            const previewHeroNome = document.getElementById('previewHeroNome');
            if (heroTitulo && previewHeroNome) previewHeroNome.textContent = heroTitulo.value || 'Olá';

            const sobreTitulo = document.getElementById('sobreTitulo');
            const previewSobreTitulo = document.getElementById('previewSobreTitulo');
            if (sobreTitulo && previewSobreTitulo) previewSobreTitulo.textContent = sobreTitulo.value || 'Sobre';

            const sobreBio = document.getElementById('sobreBio');
            const previewSobreBio = document.getElementById('previewSobreBio');
            if (sobreBio && previewSobreBio) previewSobreBio.textContent = (sobreBio.value || '').substring(0, 150) + '...';
        }

        // ============================================
        // CORES
        // ============================================
        function atualizarCor(inputId, valor) {
            const hexInput = document.getElementById(inputId + 'Hex');
            if (hexInput) hexInput.value = valor;
            atualizarPreviewCores();
        }

        function atualizarPreviewCores() {
            const corPrimaria = document.getElementById('corPrimaria').value;
            const corSecundaria = document.getElementById('corSecundaria').value;
            
            const btnPreview = document.querySelector('.preview-btn-primary');
            if (btnPreview) {
                btnPreview.style.background = `linear-gradient(135deg, ${corPrimaria} 0%, ${corSecundaria} 100%)`;
            }
        }

        function aplicarPaleta(corPrimaria, corSecundaria, corDestaque) {
            document.getElementById('corPrimaria').value = corPrimaria;
            document.getElementById('corPrimariaHex').value = corPrimaria;
            document.getElementById('corSecundaria').value = corSecundaria;
            document.getElementById('corSecundariaHex').value = corSecundaria;
            document.getElementById('corDestaque').value = corDestaque;
            document.getElementById('corDestaqueHex').value = corDestaque;
            
            atualizarPreviewCores();
            mostrarToast('Paleta aplicada!', 'success');
        }

        // ============================================
        // ESPECIALIDADES
        // ============================================
        function toggleEspecialidade(checkbox) {
            const item = checkbox.closest('.especialidade-item');
            if (checkbox.checked) {
                item.classList.add('selected');
            } else {
                item.classList.remove('selected');
            }
        }

        // ============================================
        // COPIAR LINK
        // ============================================
        function copiarLink() {
            const url = document.getElementById('urlPersonalizado').value;
            const linkCompleto = 'https://geonnexus.com/p/' + url;
            
            navigator.clipboard.writeText(linkCompleto).then(() => {
                mostrarToast('Link copiado!', 'success');
            }).catch(() => {
                mostrarToast('Erro ao copiar', 'error');
            });
        }

        // ============================================
        // SERVIÇOS
        // ============================================
        function toggleServico(checkbox) {
            const item = checkbox.closest('.servico-selecao-item');
            if (checkbox.checked) {
                item.classList.add('selected');
            } else {
                item.classList.remove('selected');
            }
        }

        function selecionarTodosServicos() {
            document.querySelectorAll('.servico-selecao-item:not(.disabled) input[type="checkbox"]').forEach(cb => {
                cb.checked = true;
                cb.closest('.servico-selecao-item').classList.add('selected');
            });
            mostrarToast('Todos selecionados', 'success');
        }

        function desmarcarTodosServicos() {
            document.querySelectorAll('.servico-selecao-item input[type="checkbox"]').forEach(cb => {
                cb.checked = false;
                cb.closest('.servico-selecao-item').classList.remove('selected');
            });
            mostrarToast('Todos desmarcados', 'info');
        }

        function toggleBadge(checkbox, tipo) {
            const item = checkbox.closest('.servico-selecao-item');
            const nome = item.querySelector('.servico-selecao-nome').textContent;
            mostrarToast(nome + ' - ' + tipo, 'info');
        }

        // ============================================
        // CATEGORIAS DE PREÇOS
        // ============================================
        function toggleCategoriaPreco(btn) {
            const item = btn.closest('.categoria-precos-item');
            item.classList.toggle('collapsed');
        }

        function removerCategoriaPreco(btn) {
            const item = btn.closest('.categoria-precos-item');
            const nome = item.querySelector('.categoria-precos-nome-input').value;
            
            mostrarConfirmacao('Remover Categoria', 'Remover "' + nome + '" e todos os serviços?', () => {
                item.style.transition = 'all 0.3s ease';
                item.style.opacity = '0';
                item.style.transform = 'translateX(-20px)';
                setTimeout(() => {
                    item.remove();
                    mostrarToast('Categoria removida', 'warning');
                }, 300);
                fecharModal('modalConfirmacao');
            });
        }

        function adicionarServicoPreco(btn) {
            const categoria = btn.closest('.categoria-precos-item');
            const list = categoria.querySelector('.servicos-precos-list');
            
            const novoItem = document.createElement('div');
            novoItem.className = 'servico-preco-item';
            novoItem.innerHTML = `
                <input type="text" class="form-control servico-preco-input" placeholder="Nome do serviço">
                <div class="servico-preco-inputs">
                    <div class="input-group">
                        <span class="input-group-text">Kz</span>
                        <input type="number" class="form-control servico-preco-value" placeholder="0" step="1000">
                    </div>
                    <input type="text" class="form-control servico-preco-unidade" placeholder="por hectare">
                    <input type="text" class="form-control servico-preco-prazo" placeholder="7-10 dias">
                </div>
                <label class="servico-preco-popular" title="Popular">
                    <input type="checkbox">
                    <i class="fas fa-fire"></i>
                </label>
                <button type="button" class="servico-preco-remove" onclick="removerServicoPreco(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;
            list.appendChild(novoItem);
            novoItem.querySelector('input').focus();
            mostrarToast('Serviço adicionado', 'success');
        }

        function removerServicoPreco(btn) {
            const item = btn.closest('.servico-preco-item');
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            setTimeout(() => item.remove(), 300);
        }

        function adicionarCategoriaPreco() {
            const list = document.querySelector('.categorias-precos-list');
            const cores = ['#6C2BD9', '#00D2FF', '#00FFA3', '#FFD93D', '#FF6B6B', '#A29BFE'];
            const cor = cores[Math.floor(Math.random() * cores.length)];
            const idUnico = 'cat-' + Date.now();
            
            const novaCategoria = document.createElement('div');
            novaCategoria.className = 'categoria-precos-item';
            novaCategoria.setAttribute('data-cat-id', idUnico);
            novaCategoria.innerHTML = `
                <div class="categoria-precos-header" style="--cat-color: ${cor};">
                    <div class="categoria-precos-drag"><i class="fas fa-grip-vertical"></i></div>
                    <div class="categoria-precos-icon" style="background: ${cor}20; color: ${cor};">
                        <i class="fas fa-tag"></i>
                    </div>
                    <input type="text" class="categoria-precos-nome-input" value="Nova Categoria" placeholder="Nome da categoria">
                    <button type="button" class="categoria-precos-btn danger" onclick="removerCategoriaPreco(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button type="button" class="categoria-precos-btn" onclick="toggleCategoriaPreco(this)">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
                <div class="categoria-precos-servicos">
                    <div class="servicos-precos-list">
                        <div class="servico-preco-item">
                            <input type="text" class="form-control servico-preco-input" placeholder="Nome do serviço">
                            <div class="servico-preco-inputs">
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control servico-preco-value" placeholder="0" step="1000">
                                </div>
                                <input type="text" class="form-control servico-preco-unidade" placeholder="por hectare">
                                <input type="text" class="form-control servico-preco-prazo" placeholder="7-10 dias">
                            </div>
                            <label class="servico-preco-popular" title="Popular">
                                <input type="checkbox">
                                <i class="fas fa-fire"></i>
                            </label>
                            <button type="button" class="servico-preco-remove" onclick="removerServicoPreco(this)">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline btn-add-servico-preco" onclick="adicionarServicoPreco(this)">
                        <i class="fas fa-plus"></i> Adicionar Serviço
                    </button>
                </div>
            `;
            list.appendChild(novaCategoria);
            novaCategoria.querySelector('.categoria-precos-nome-input').focus();
            mostrarToast('Nova categoria adicionada', 'success');
        }

        // ============================================
        // PLANOS
        // ============================================
        function togglePlano(btn) {
            const item = btn.closest('.plano-config-item');
            item.classList.toggle('collapsed');
        }

        function removerPlano(btn) {
            const item = btn.closest('.plano-config-item');
            const nome = item.querySelector('.plano-config-nome').value;
            
            mostrarConfirmacao('Remover Plano', 'Remover o plano "' + nome + '"?', () => {
                item.style.transition = 'all 0.3s ease';
                item.style.opacity = '0';
                setTimeout(() => {
                    item.remove();
                    mostrarToast('Plano removido', 'warning');
                }, 300);
                fecharModal('modalConfirmacao');
            });
        }

        function adicionarRecursoPlano(btn) {
            const container = btn.previousElementSibling;
            const planoItem = btn.closest('.plano-config-item');
            const cor = getComputedStyle(planoItem).getPropertyValue('--plano-color').trim() || '#00D2FF';
            
            const novoRecurso = document.createElement('div');
            novoRecurso.className = 'plano-recurso-item';
            novoRecurso.innerHTML = `
                <i class="fas fa-check-circle" style="color: ${cor};"></i>
                <input type="text" placeholder="Novo recurso">
                <button type="button" class="btn" onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(novoRecurso);
            novoRecurso.querySelector('input').focus();
        }

        function adicionarPlano() {
            const list = document.querySelector('.planos-config-list');
            const cores = ['#00D2FF', '#6C2BD9', '#FF6B6B', '#00FFA3', '#FFD93D'];
            const cor = cores[Math.floor(Math.random() * cores.length)];
            
            const novoPlano = document.createElement('div');
            novoPlano.className = 'plano-config-item';
            novoPlano.style.setProperty('--plano-color', cor);
            novoPlano.innerHTML = `
                <div class="plano-config-header">
                    <div class="plano-config-drag"><i class="fas fa-grip-vertical"></i></div>
                    <div class="plano-config-icon" style="background: ${cor}20; color: ${cor};">
                        <i class="fas fa-cube"></i>
                    </div>
                    <input type="text" class="plano-config-nome" value="Novo Plano" placeholder="Nome do plano">
                    <label class="plano-config-popular" title="Marcar como Popular">
                        <input type="checkbox">
                        <i class="fas fa-star"></i>
                        <span>Popular</span>
                    </label>
                    <button type="button" class="plano-config-btn danger" onclick="removerPlano(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button type="button" class="plano-config-btn" onclick="togglePlano(this)">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
                <div class="plano-config-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Preço Mensal</label>
                            <div class="input-group">
                                <span class="input-group-text">Kz</span>
                                <input type="number" class="form-control" value="500000" step="1000">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cor do Plano</label>
                            <input type="color" class="color-picker-small" value="${cor}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Recursos do Plano</label>
                        <div class="plano-recursos-edit">
                            <div class="plano-recurso-item">
                                <i class="fas fa-check-circle" style="color: ${cor};"></i>
                                <input type="text" value="Novo recurso" placeholder="Recurso">
                                <button type="button" class="btn" onclick="this.parentElement.remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline" style="width: 100%; justify-content: center; margin-top: 6px;" onclick="adicionarRecursoPlano(this)">
                            <i class="fas fa-plus"></i> Adicionar Recurso
                        </button>
                    </div>
                </div>
            `;
            list.appendChild(novoPlano);
            novoPlano.querySelector('.plano-config-nome').focus();
            mostrarToast('Novo plano adicionado', 'success');
        }

        // ============================================
        // DESCONTOS
        // ============================================
        function adicionarDesconto() {
            const list = document.querySelector('.descontos-edit-list');
            const cores = ['#00D2FF', '#00FFA3', '#6C2BD9', '#FFD93D', '#FF6B6B'];
            const cor = cores[Math.floor(Math.random() * cores.length)];
            
            const novoDesconto = document.createElement('div');
            novoDesconto.className = 'desconto-edit-item';
            novoDesconto.innerHTML = `
                <div class="desconto-edit-icon" style="background: ${cor}20; color: ${cor};">
                    <i class="fas fa-percent"></i>
                </div>
                <input type="text" class="form-control" value="Novo Desconto" placeholder="Tipo de desconto">
                <input type="text" class="form-control desconto-edit-value" value="10%" placeholder="10%">
                <input type="text" class="form-control" value="Descrição da condição" placeholder="Condição">
                <button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            `;
            list.appendChild(novoDesconto);
            novoDesconto.querySelector('input').focus();
        }

        // ============================================
        // FAQ
        // ============================================
        function adicionarFaq() {
            const list = document.querySelector('.faq-edit-list');
            const numero = list.querySelectorAll('.faq-edit-item').length + 1;
            
            const novaFaq = document.createElement('div');
            novaFaq.className = 'faq-edit-item';
            novaFaq.innerHTML = `
                <div class="faq-edit-number">${numero}</div>
                <div class="faq-edit-content">
                    <input type="text" class="form-control faq-edit-pergunta" placeholder="Pergunta">
                    <textarea class="form-control faq-edit-resposta" rows="2" placeholder="Resposta"></textarea>
                </div>
                <button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.remove(); renumerarFaq()">
                    <i class="fas fa-times"></i>
                </button>
            `;
            list.appendChild(novaFaq);
            novaFaq.querySelector('input').focus();
        }

        function renumerarFaq() {
            document.querySelectorAll('.faq-edit-item').forEach((item, index) => {
                item.querySelector('.faq-edit-number').textContent = index + 1;
            });
        }

        // ============================================
        // RESTAURAR
        // ============================================
        function restaurarConfiguracao() {
            mostrarConfirmacao('Restaurar Configuração', 'Restaurar todos os valores originais?', () => {
                document.getElementById('portfolioAtivo').checked = dadosOriginais.portfolio_ativo;
                document.getElementById('precosAtivos').checked = dadosOriginais.precos_ativos;
                document.getElementById('urlPersonalizado').value = dadosOriginais.url_personalizado;
                document.getElementById('seoTitulo').value = dadosOriginais.seo_titulo;
                document.getElementById('seoDescricao').value = dadosOriginais.seo_descricao;
                document.getElementById('seoPalavrasChave').value = dadosOriginais.seo_palavras_chave;
                document.getElementById('heroBadge').value = dadosOriginais.hero_badge;
                document.getElementById('heroTitulo').value = dadosOriginais.hero_titulo;
                document.getElementById('heroSubtitulo').value = dadosOriginais.hero_subtitulo;
                document.getElementById('sobreTitulo').value = dadosOriginais.sobre_titulo;
                document.getElementById('sobreBio').value = dadosOriginais.sobre_bio;
                document.getElementById('anosExperiencia').value = dadosOriginais.anos_experiencia;
                document.getElementById('projetosConcluidos').value = dadosOriginais.projetos_concluidos;
                document.getElementById('clientesSatisfeitos').value = dadosOriginais.clientes_satisfeitos;
                document.getElementById('whatsapp').value = dadosOriginais.whatsapp;
                document.getElementById('linkedin').value = dadosOriginais.linkedin;
                document.getElementById('instagram').value = dadosOriginais.instagram;
                document.getElementById('facebook').value = dadosOriginais.facebook;
                document.getElementById('corPrimaria').value = dadosOriginais.cor_primaria;
                document.getElementById('corPrimariaHex').value = dadosOriginais.cor_primaria;
                document.getElementById('corSecundaria').value = dadosOriginais.cor_secundaria;
                document.getElementById('corSecundariaHex').value = dadosOriginais.cor_secundaria;
                document.getElementById('corDestaque').value = dadosOriginais.cor_destaque;
                document.getElementById('corDestaqueHex').value = dadosOriginais.cor_destaque;

                atualizarPreview();
                atualizarPreviewGoogle();
                atualizarPreviewCores();

                mostrarToast('Configuração restaurada!', 'info');
                fecharModal('modalConfirmacao');
            });
        }

        // ============================================
        // GUARDAR
        // ============================================
        function guardarConfiguracao(event) {
            event.preventDefault();

            const url = document.getElementById('urlPersonalizado').value.trim();
            if (!url || !/^[a-z0-9-]+$/.test(url)) {
                mostrarToast('URL inválido!', 'error');
                return;
            }

            mostrarToast('Configuração guardada com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'index.php';
            }, 1500);
        }

        // ============================================
        // MODAIS
        // ============================================
        let callbackConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            document.getElementById('modalConfirmacaoTexto').textContent = mensagem;
            callbackConfirmacao = callback;
            document.getElementById('modalConfirmacao').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
            callbackConfirmacao = null;
        }

        document.getElementById('modalConfirmacaoBtn').addEventListener('click', function() {
            if (typeof callbackConfirmacao === 'function') {
                callbackConfirmacao();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModal('modalConfirmacao');
            }
        });

        // ============================================
        // INICIALIZAR
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const inputsPreview = ['urlPersonalizado', 'heroBadge', 'heroTitulo', 'sobreTitulo', 'sobreBio'];
            inputsPreview.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.addEventListener('input', atualizarPreview);
                    el.addEventListener('change', atualizarPreview);
                }
            });

            atualizarPreview();
            atualizarPreviewGoogle();
            atualizarPreviewCores();

            ['corPrimaria', 'corSecundaria', 'corDestaque'].forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.addEventListener('input', atualizarPreviewCores);
                }
            });
        });
    </script>

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO                             -->
    <!-- ========================================== -->
    <style>
        /* ========================================== */
        /* TOAST                                      */
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
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #00FFA3; font-size: 0.85em; }

        .header-left .breadcrumb {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left .breadcrumb a { color: var(--text-muted); text-decoration: none; }
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
        /* FORM SECTIONS                              */
        /* ========================================== */
        .form-section {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .form-section:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .form-section-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: rgba(0, 255, 163, 0.02);
        }

        .section-number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0, 255, 163, 0.3);
        }

        .section-number i { font-size: 16px; }

        .section-title h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 2px 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .section-title h3 i { color: #00FFA3; }

        .section-title p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
        }

        .form-section-body {
            padding: var(--space-lg);
        }

        /* ========================================== */
        /* FORM CONTROLS                              */
        /* ========================================== */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: var(--space-md);
        }

        .form-group:last-child { margin-bottom: 0; }

        .form-label {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-label .required { color: #FF6B6B; }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: #00FFA3;
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
        }

        .form-control::placeholder { color: var(--text-muted); }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        select.form-control option {
            background: var(--bg-card);
            color: var(--text-primary);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .form-help {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .char-counter {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-align: right;
            margin-top: 4px;
        }

        /* ========================================== */
        /* TOGGLE                                     */
        /* ========================================== */
        .toggle-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-md);
        }

        .toggle-card {
            display: block;
            cursor: pointer;
            position: relative;
        }

        .toggle-card input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .toggle-content {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .toggle-card input:checked + .toggle-content {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
        }

        .toggle-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .toggle-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .toggle-titulo {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .toggle-descricao {
            font-size: var(--text-xs);
            color: var(--text-muted);
            line-height: 1.4;
        }

        .toggle-switch {
            width: 44px;
            height: 24px;
            border-radius: 12px;
            background: var(--border-color);
            position: relative;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .toggle-switch::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #FFFFFF;
            transition: var(--transition-smooth);
        }

        .toggle-card input:checked + .toggle-content .toggle-switch {
            background: #00FFA3;
        }

        .toggle-card input:checked + .toggle-content .toggle-switch::after {
            left: 22px;
        }

        /* ========================================== */
        /* INPUT PREFIX                               */
        /* ========================================== */
        .input-prefix {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: 4px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
        }

        .input-prefix:focus-within {
            border-color: #00FFA3;
        }

        .input-prefix-text {
            padding: 6px 12px;
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-muted);
            background: var(--bg-card);
            border-radius: var(--radius-sm);
            white-space: nowrap;
        }

        .input-prefix .form-control {
            border: none;
            background: transparent;
            padding: 6px 4px;
        }

        /* ========================================== */
        /* GOOGLE PREVIEW                             */
        /* ========================================== */
        .google-preview {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .google-preview-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            margin-bottom: var(--space-md);
        }

        .google-preview-label i { color: #4285F4; font-size: 14px; }

        .google-preview-card {
            padding: var(--space-md);
            background: var(--bg-card);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .google-preview-url {
            font-size: var(--text-xs);
            color: #00FFA3;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .google-preview-titulo {
            font-size: 1.1rem;
            color: #4A90E2;
            margin-bottom: 4px;
            line-height: 1.4;
        }

        [data-theme="light"] .google-preview-titulo { color: #1a0dab; }

        .google-preview-descricao {
            font-size: var(--text-sm);
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* ========================================== */
        /* ESPECIALIDADES                             */
        /* ========================================== */
        .especialidades-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: var(--space-sm);
        }

        .especialidade-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .especialidade-item input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .especialidade-item:hover { border-color: var(--color-turquoise); }

        .especialidade-item.selected {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
        }

        .especialidade-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .especialidade-nome {
            flex: 1;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .especialidade-check {
            color: #00FFA3;
            font-size: 14px;
            opacity: 0;
        }

        .especialidade-item.selected .especialidade-check { opacity: 1; }

        /* ========================================== */
        /* CHECKBOX                                   */
        /* ========================================== */
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .checkbox-item {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .checkbox-item:hover {
            border-color: #00FFA3;
        }

        .checkbox-item input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .checkbox-mark {
            width: 22px;
            height: 22px;
            border: 2px solid var(--border-color);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition-smooth);
            margin-top: 2px;
        }

        .checkbox-item input[type="checkbox"]:checked + .checkbox-mark {
            background: #00FFA3;
            border-color: #00FFA3;
        }

        .checkbox-item input[type="checkbox"]:checked + .checkbox-mark::after {
            content: '✓';
            color: #0A1628;
            font-size: 13px;
            font-weight: bold;
        }

        .checkbox-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .checkbox-content strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .checkbox-content small {
            font-size: var(--text-xs);
            color: var(--text-muted);
            line-height: 1.4;
        }

        /* ========================================== */
        /* CORES                                      */
        /* ========================================== */
        .cores-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-lg);
            margin-bottom: var(--space-xl);
        }

        .cor-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .color-picker-wrapper {
            display: flex;
            gap: var(--space-sm);
            align-items: center;
        }

        .color-picker {
            width: 50px;
            height: 50px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            padding: 0;
            background: transparent;
            flex-shrink: 0;
        }

        .color-picker::-webkit-color-swatch {
            border: none;
            border-radius: calc(var(--radius-md) - 2px);
        }

        .paletas-titulo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: var(--space-md);
        }

        .paletas-titulo i { color: #FFD93D; }

        .paletas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: var(--space-sm);
        }

        .paleta-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            font-family: var(--font-body);
        }

        .paleta-btn:hover {
            border-color: #00FFA3;
            transform: translateY(-2px);
        }

        .paleta-cores {
            display: flex;
            gap: 4px;
        }

        .paleta-cores span {
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }

        .paleta-btn > span {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-secondary);
        }

        /* ========================================== */
        /* INFO BOX                                   */
        /* ========================================== */
        .info-box {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(0, 210, 255, 0.06);
            border: 1px solid rgba(0, 210, 255, 0.2);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-lg);
        }

        .info-box i {
            color: #00D2FF;
            font-size: 20px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info-box div {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .info-box strong { font-size: var(--text-sm); color: #00D2FF; }
        .info-box span { font-size: var(--text-xs); color: var(--text-secondary); line-height: 1.5; }

        /* ========================================== */
        /* SERVIÇOS SELEÇÃO                           */
        /* ========================================== */
        .servicos-selecao-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
        }

        .servico-selecao-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .servico-selecao-item.selected {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.04);
        }

        .servico-selecao-item.disabled { opacity: 0.5; }

        .servico-selecao-checkbox {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .servico-selecao-checkbox input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .servico-check-mark {
            width: 24px;
            height: 24px;
            border: 2px solid var(--border-color);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
            flex-shrink: 0;
        }

        .servico-selecao-checkbox input:checked + .servico-check-mark {
            background: #00FFA3;
            border-color: #00FFA3;
        }

        .servico-selecao-checkbox input:checked + .servico-check-mark::after {
            content: '✓';
            color: #0A1628;
            font-size: 14px;
            font-weight: bold;
        }

        .servico-selecao-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .servico-selecao-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .servico-selecao-nome {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .servico-selecao-meta {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            flex-wrap: wrap;
            font-size: var(--text-xs);
        }

        .servico-selecao-categoria { font-weight: 600; }
        .servico-selecao-preco { font-family: var(--font-display); font-weight: 700; color: #00FFA3; }
        .servico-selecao-status {
            padding: 2px 8px;
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
            border-radius: var(--radius-full);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 9px;
        }

        .servico-selecao-badges {
            display: flex;
            gap: 6px;
            flex-shrink: 0;
        }

        .servico-badge-toggle {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition-smooth);
            color: var(--text-muted);
        }

        .servico-badge-toggle input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .servico-badge-toggle:has(input:checked) {
            border-color: #FFD93D;
            background: rgba(255, 217, 61, 0.1);
            color: #FFD93D;
        }

        .servico-badge-toggle:nth-child(2):has(input:checked) {
            border-color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
            color: #FF6B6B;
        }

        .form-actions-inline {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        /* ========================================== */
        /* CATEGORIAS DE PREÇOS                       */
        /* ========================================== */
        .categorias-precos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .categoria-precos-item {
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .categoria-precos-item:hover { border-color: var(--cat-color, #00FFA3); }

        .categoria-precos-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: linear-gradient(135deg, var(--cat-color)10 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
        }

        .categoria-precos-drag {
            color: var(--text-muted);
            cursor: grab;
            padding: 4px;
            font-size: 14px;
        }

        .categoria-precos-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .categoria-precos-nome-input {
            flex: 1;
            background: transparent;
            border: none;
            font-family: var(--font-title);
            font-size: var(--text-body);
            font-weight: 700;
            color: var(--text-primary);
            padding: 6px 10px;
            border-radius: var(--radius-sm);
        }

        .categoria-precos-nome-input:focus {
            outline: none;
            background: var(--bg-card);
            box-shadow: 0 0 0 2px var(--cat-color);
        }

        .categoria-precos-btn {
            width: 30px;
            height: 30px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .categoria-precos-btn:hover { border-color: var(--cat-color); color: var(--cat-color); }
        .categoria-precos-btn.danger:hover { border-color: #FF6B6B; color: #FF6B6B; }

        .categoria-precos-servicos {
            padding: var(--space-md);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            max-height: 800px;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .categoria-precos-item.collapsed .categoria-precos-servicos {
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        .categoria-precos-item.collapsed .categoria-precos-btn i.fa-chevron-down {
            transform: rotate(-90deg);
        }

        .servicos-precos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .servico-preco-item {
            display: grid;
            grid-template-columns: 2fr 3fr auto auto;
            gap: var(--space-sm);
            align-items: center;
            padding: var(--space-sm);
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
        }

        .servico-preco-item:hover { border-color: var(--cat-color); }

        .servico-preco-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 6px;
        }

        .servico-preco-inputs .input-group .input-group-text {
            padding: 6px 10px;
            font-size: var(--text-xs);
        }

        .servico-preco-inputs .form-control {
            padding: 6px 10px;
            font-size: var(--text-xs);
        }

        .servico-preco-popular {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-sm);
            cursor: pointer;
            color: var(--text-muted);
            position: relative;
        }

        .servico-preco-popular input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .servico-preco-popular:has(input:checked) {
            border-color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
            color: #FF6B6B;
        }

        .servico-preco-remove {
            width: 32px;
            height: 32px;
            border: 1px solid var(--border-color);
            background: transparent;
            border-radius: var(--radius-sm);
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .servico-preco-remove:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.05);
        }

        .btn-add-servico-preco { justify-content: center; }

        .btn-add-categoria {
            width: 100%;
            justify-content: center;
            padding: 14px;
            border-style: dashed;
        }

        /* ========================================== */
        /* PLANOS                                     */
        /* ========================================== */
        .planos-config-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .plano-config-item {
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .plano-config-item:hover { border-color: var(--plano-color); }

        .plano-config-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: linear-gradient(135deg, var(--plano-color)10 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
        }

        .plano-config-drag {
            color: var(--text-muted);
            cursor: grab;
            padding: 4px;
            font-size: 14px;
        }

        .plano-config-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .plano-config-nome {
            flex: 1;
            background: transparent;
            border: none;
            font-family: var(--font-title);
            font-size: var(--text-body);
            font-weight: 700;
            color: var(--text-primary);
            padding: 6px 10px;
            border-radius: var(--radius-sm);
        }

        .plano-config-nome:focus {
            outline: none;
            background: var(--bg-card);
        }

        .plano-config-popular {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-full);
            cursor: pointer;
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-muted);
            position: relative;
        }

        .plano-config-popular input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .plano-config-popular:has(input:checked) {
            border-color: #FFD93D;
            background: rgba(255, 217, 61, 0.1);
            color: #FFD93D;
        }

        .plano-config-btn {
            width: 30px;
            height: 30px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .plano-config-btn:hover { border-color: var(--plano-color); color: var(--plano-color); }
        .plano-config-btn.danger:hover { border-color: #FF6B6B; color: #FF6B6B; }

        .plano-config-body {
            padding: var(--space-md);
            max-height: 800px;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .plano-config-item.collapsed .plano-config-body {
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        .plano-config-item.collapsed .plano-config-btn i.fa-chevron-down {
            transform: rotate(-90deg);
        }

        .plano-recursos-edit {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .plano-recurso-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: 6px 10px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
        }

        .plano-recurso-item i {
            color: var(--plano-color);
            font-size: 14px;
            flex-shrink: 0;
        }

        .plano-recurso-item input {
            flex: 1;
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-size: var(--text-sm);
            padding: 4px 0;
        }

        .plano-recurso-item input:focus { outline: none; }

        .plano-recurso-item .btn {
            width: 24px;
            height: 24px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
        }

        .plano-recurso-item .btn:hover { color: #FF6B6B; }

        .color-picker-small {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            cursor: pointer;
            padding: 4px;
            background: var(--bg-input);
        }

        /* ========================================== */
        /* DESCONTOS E FAQ                            */
        /* ========================================== */
        .subsection-titulo {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: var(--space-md);
        }

        .subsection-titulo span { flex: 1; }

        .subsection-toggle {
            position: relative;
            cursor: pointer;
        }

        .subsection-toggle input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .toggle-mini {
            display: block;
            width: 40px;
            height: 22px;
            background: var(--border-color);
            border-radius: 11px;
            position: relative;
            transition: var(--transition-smooth);
        }

        .toggle-mini::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #FFFFFF;
            transition: var(--transition-smooth);
        }

        .subsection-toggle input:checked + .toggle-mini { background: #00FFA3; }
        .subsection-toggle input:checked + .toggle-mini::after { left: 20px; }

        .subsection-separador {
            height: 1px;
            background: var(--border-color);
            margin: var(--space-xl) 0;
        }

        .descontos-edit-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .desconto-edit-item {
            display: grid;
            grid-template-columns: 44px 1.5fr 1fr 2fr auto;
            gap: var(--space-sm);
            align-items: center;
            padding: var(--space-sm);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
        }

        .desconto-edit-item:hover { border-color: var(--color-turquoise); }

        .desconto-edit-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .desconto-edit-value {
            font-family: var(--font-display);
            font-weight: 700;
            text-align: center;
            color: #00FFA3;
        }

        .faq-edit-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .faq-edit-item {
            display: grid;
            grid-template-columns: 40px 1fr auto;
            gap: var(--space-md);
            align-items: flex-start;
            padding: var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
        }

        .faq-edit-item:hover { border-color: var(--color-aurora); }

        .faq-edit-number {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(108, 43, 217, 0.15);
            color: var(--color-aurora);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: var(--text-sm);
            flex-shrink: 0;
        }

        .faq-edit-content {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .faq-edit-pergunta { font-weight: 600; }

        /* ========================================== */
        /* PREVIEW BROWSER                            */
        /* ========================================== */
        .preview-browser {
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-lg);
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        .preview-browser-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-bottom: 1px solid var(--border-color);
        }

        .preview-browser-dots {
            display: flex;
            gap: 6px;
        }

        .preview-browser-dots span {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .preview-browser-url {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 12px;
            background: var(--bg-card);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-family: var(--font-display);
        }

        .preview-browser-content {
            padding: var(--space-lg);
            background: var(--bg-card-solid);
        }

        .preview-hero {
            text-align: center;
            padding: var(--space-xl) var(--space-md);
            background: linear-gradient(135deg, rgba(108, 43, 217, 0.1) 0%, rgba(0, 210, 255, 0.05) 100%);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-md);
        }

        .preview-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: var(--space-md);
        }

        .preview-hero-badge i { font-size: 6px; }

        .preview-hero-nome {
            font-family: var(--font-title);
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .preview-hero-profissao {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: var(--space-md);
        }

        .preview-hero-botoes {
            display: flex;
            gap: var(--space-sm);
            justify-content: center;
        }

        .preview-btn-primary {
            padding: 8px 20px;
            border-radius: var(--radius-md);
            color: #FFFFFF;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .preview-btn-outline {
            padding: 8px 20px;
            border-radius: var(--radius-md);
            border: 2px solid var(--border-color);
            color: var(--text-secondary);
            font-size: 0.8rem;
            font-weight: 600;
        }

        .preview-sobre {
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            text-align: center;
        }

        .preview-sobre-titulo {
            font-family: var(--font-title);
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
        }

        .preview-sobre-bio {
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* ========================================== */
        /* FORM ACTIONS                               */
        /* ========================================== */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: var(--space-sm);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
            position: sticky;
            bottom: var(--space-md);
            z-index: 100;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-actions .btn {
            padding: 12px 24px;
            font-size: var(--text-sm);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-lg { padding: 12px 24px; font-size: var(--text-body); }

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
            border: 2px solid var(--border-color);
            z-index: 10;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
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
            padding: 4px;
            line-height: 1;
        }

        .modal-close:hover { color: var(--text-primary); transform: rotate(90deg); }

        .modal-body { padding: 24px; }
        .modal-body p { font-size: var(--text-sm); color: var(--text-secondary); line-height: 1.6; margin: 0; }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 100px; justify-content: center; }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 992px) {
            .form-row { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .cores-grid { grid-template-columns: 1fr; }
            .toggle-grid { grid-template-columns: 1fr; }
            .servico-preco-item { grid-template-columns: 1fr; }
            .servico-preco-inputs { grid-template-columns: 1fr; }
            .desconto-edit-item { grid-template-columns: 1fr; }
            .faq-edit-item { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .form-section-header { flex-direction: column; align-items: flex-start; }
            .section-number { width: 36px; height: 36px; font-size: 15px; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; justify-content: center; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            .especialidades-grid { grid-template-columns: 1fr 1fr; }
            .paletas-grid { grid-template-columns: repeat(2, 1fr); }
            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
            .servico-selecao-item { flex-wrap: wrap; }
            .servico-selecao-badges { width: 100%; justify-content: flex-end; }
            .form-actions-inline { flex-direction: column; }
            .form-actions-inline .btn { width: 100%; justify-content: center; }
        }

        @media (max-width: 480px) {
            .form-section-body { padding: var(--space-md); }
            .especialidades-grid { grid-template-columns: 1fr; }
            .paletas-grid { grid-template-columns: 1fr; }
            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
            .input-prefix { flex-wrap: wrap; }
            .input-prefix-text { width: 100%; text-align: center; }
            .preview-hero-botoes { flex-direction: column; }
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