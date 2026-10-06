<?php
// painel/admin/comunicacao.php - Sistema de Comunicação Unificado
include "../../includes/admin/notificacoes-admin-count.php";

$titulo_pagina = 'Central de Comunicação';
$pagina_atual = 'mensagens';

// Dados mockados
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// ============================================
// DADOS DE COMUNICAÇÃO
// ============================================

// Canais de comunicação
$canais = [
    ['id' => 'todos', 'nome' => 'Todos os Utilizadores', 'icon' => 'fa-globe', 'cor' => '#6C2BD9'],
    ['id' => 'profissionais', 'nome' => 'Profissionais', 'icon' => 'fa-user-tie', 'cor' => '#00D2FF'],
    ['id' => 'empresas', 'nome' => 'Empresas', 'icon' => 'fa-building', 'cor' => '#FF6B6B'],
    ['id' => 'instituicoes', 'nome' => 'Instituições', 'icon' => 'fa-university', 'cor' => '#FFD93D'],
    ['id' => 'admin', 'nome' => 'Administradores', 'icon' => 'fa-user-shield', 'cor' => '#6C2BD9'],
    ['id' => 'cliente', 'nome' => 'Clientes', 'icon' => 'fa-user', 'cor' => '#00FFA3'],
];

// Tipos de comunicação
$tipos_comunicacao = [
    ['id' => 'mensagem', 'nome' => 'Mensagem Direta', 'icon' => 'fa-envelope', 'cor' => '#6C2BD9', 'descricao' => 'Comunicação individual com um utilizador'],
    ['id' => 'comunicado', 'nome' => 'Comunicado Geral', 'icon' => 'fa-bullhorn', 'cor' => '#00D2FF', 'descricao' => 'Anúncio para todos os utilizadores'],
    ['id' => 'alerta', 'nome' => 'Alerta/Aviso', 'icon' => 'fa-exclamation-triangle', 'cor' => '#FF6B6B', 'descricao' => 'Notificação urgente com destaque especial'],
    ['id' => 'publicidade', 'nome' => 'Publicidade/Marketing', 'icon' => 'fa-ad', 'cor' => '#FFD93D', 'descricao' => 'Campanha promocional com imagem/vídeo'],
];

// Níveis de alerta
$niveis_alerta = [
    ['id' => 'info', 'nome' => 'Informativo', 'cor' => '#00D2FF', 'icon' => 'fa-info-circle'],
    ['id' => 'warning', 'nome' => 'Aviso', 'cor' => '#FFD93D', 'icon' => 'fa-exclamation-circle'],
    ['id' => 'critical', 'nome' => 'Crítico', 'cor' => '#FF6B6B', 'icon' => 'fa-exclamation-triangle'],
    ['id' => 'success', 'nome' => 'Sucesso', 'cor' => '#00FFA3', 'icon' => 'fa-check-circle'],
];

// Comunicações enviadas (mock)
$comunicacoes = [
    [
        'id' => 1,
        'tipo' => 'comunicado',
        'titulo' => 'Nova Atualização do Sistema GeoNexus',
        'conteudo' => 'Estamos felizes em anunciar o lançamento da versão 2.0 do GeoNexus com novas funcionalidades!',
        'canal' => 'todos',
        'canal_nome' => 'Todos os Utilizadores',
        'data_envio' => '2026-02-18 10:00:00',
        'status' => 'entregue',
        'visualizacoes' => 128,
        'cliques' => 45,
        'anexos' => [
            ['nome' => 'release-notes.pdf', 'tipo' => 'pdf', 'tamanho' => '2.4 MB']
        ],
        'imagem' => null,
        'video_url' => null,
        'video_embed' => null,
        'criado_por' => 'Administrador',
        'importancia' => 'high'
    ],
    [
        'id' => 2,
        'tipo' => 'alerta',
        'titulo' => '⚠️ Interrupção Programada do Sistema',
        'conteudo' => 'O sistema GeoNexus ficará indisponível no dia 25/02 das 02:00 às 04:00 para manutenção.',
        'canal' => 'todos',
        'canal_nome' => 'Todos os Utilizadores',
        'data_envio' => '2026-02-17 14:30:00',
        'status' => 'entregue',
        'visualizacoes' => 256,
        'cliques' => 89,
        'anexos' => [],
        'imagem' => null,
        'video_url' => null,
        'video_embed' => null,
        'criado_por' => 'Administrador',
        'importancia' => 'critical'
    ],
    [
        'id' => 3,
        'tipo' => 'publicidade',
        'titulo' => '🌟 Promoção Especial - 30% Off em Planos Premium',
        'conteudo' => 'Aproveite 30% de desconto em todos os planos premium até o final do mês. Use o código: PREMIUM2026',
        'canal' => 'profissionais',
        'canal_nome' => 'Profissionais',
        'data_envio' => '2026-02-16 09:00:00',
        'status' => 'entregue',
        'visualizacoes' => 89,
        'cliques' => 34,
        'anexos' => [],
        'imagem' => 'banner-promocao.jpg',
        'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        'video_embed' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        'criado_por' => 'Equipe Marketing',
        'importancia' => 'medium'
    ],
    [
        'id' => 4,
        'tipo' => 'mensagem',
        'titulo' => 'Re: Dúvida sobre Levantamento Topográfico',
        'conteudo' => 'Prezado Carlos, conforme solicitado, seguem as informações detalhadas sobre o serviço de levantamento topográfico.',
        'canal' => 'profissionais',
        'canal_nome' => 'Profissionais',
        'data_envio' => '2026-02-15 16:20:00',
        'status' => 'entregue',
        'visualizacoes' => 1,
        'cliques' => 0,
        'anexos' => [
            ['nome' => 'orcamento-topografia.pdf', 'tipo' => 'pdf', 'tamanho' => '1.8 MB'],
            ['nome' => 'mapa-area.jpg', 'tipo' => 'jpg', 'tamanho' => '3.2 MB']
        ],
        'imagem' => null,
        'video_url' => null,
        'video_embed' => null,
        'criado_por' => 'Administrador',
        'importancia' => 'low'
    ],
    [
        'id' => 5,
        'tipo' => 'publicidade',
        'titulo' => '🎥 Webinar: Geotecnologias Aplicadas à Agricultura',
        'conteudo' => 'Participe do nosso webinar gratuito no dia 28/02 às 15:00. Inscreva-se já!',
        'canal' => 'profissionais',
        'canal_nome' => 'Profissionais',
        'data_envio' => '2026-02-14 11:00:00',
        'status' => 'entregue',
        'visualizacoes' => 67,
        'cliques' => 28,
        'anexos' => [],
        'imagem' => null,
        'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        'video_embed' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        'criado_por' => 'Equipe Marketing',
        'importancia' => 'high'
    ],
];

// Estatísticas
$total_comunicacoes = count($comunicacoes);
$total_mensagens = count(array_filter($comunicacoes, fn($c) => $c['tipo'] === 'mensagem'));
$total_comunicados = count(array_filter($comunicacoes, fn($c) => $c['tipo'] === 'comunicado'));
$total_alertas = count(array_filter($comunicacoes, fn($c) => $c['tipo'] === 'alerta'));
$total_publicidades = count(array_filter($comunicacoes, fn($c) => $c['tipo'] === 'publicidade'));

function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function limitText($text, $limit = 100) {
    $text = strip_tags($text);
    if (strlen($text) > $limit) return substr($text, 0, $limit) . '...';
    return $text;
}

function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    $diff = time() - strtotime($datetime);
    if ($diff < 60) return 'há ' . $diff . ' segundos';
    if ($diff < 3600) return 'há ' . floor($diff / 60) . ' minutos';
    if ($diff < 86400) return 'há ' . floor($diff / 3600) . ' horas';
    if ($diff < 604800) return 'há ' . floor($diff / 86400) . ' dias';
    return date('d/m/Y H:i', strtotime($datetime));
}

function getIconForTipo($tipo) {
    $icons = [
        'mensagem' => 'fa-envelope',
        'comunicado' => 'fa-bullhorn',
        'alerta' => 'fa-exclamation-triangle',
        'publicidade' => 'fa-ad'
    ];
    return $icons[$tipo] ?? 'fa-envelope';
}

function getColorForTipo($tipo) {
    $colors = [
        'mensagem' => '#6C2BD9',
        'comunicado' => '#00D2FF',
        'alerta' => '#FF6B6B',
        'publicidade' => '#FFD93D'
    ];
    return $colors[$tipo] ?? '#6B7A8F';
}

function getBadgeForImportancia($importancia) {
    $badges = [
        'low' => 'badge-info',
        'medium' => 'badge-warning',
        'high' => 'badge-primary',
        'critical' => 'badge-danger'
    ];
    return $badges[$importancia] ?? 'badge-info';
}

function getLabelForImportancia($importancia) {
    $labels = [
        'low' => 'Baixa',
        'medium' => 'Média',
        'high' => 'Alta',
        'critical' => 'Crítica'
    ];
    return $labels[$importancia] ?? 'Baixa';
}

$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => false],
    ['icon' => 'fa-blog', 'label' => 'Blog', 'link' => 'blog.php', 'active' => false],
    ['icon' => 'fa-comments', 'label' => 'Comunicação', 'link' => 'comunicacao.php', 'active' => true],
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
                    <?php if ($item['label'] === 'Comunicação'): ?>
                        <span class="badge badge-danger"><?php echo $total_comunicacoes; ?></span>
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
                    <i class="fas fa-comments icon" style="color: var(--color-aurora);"></i>
                    Central de Comunicação
                    <span class="badge badge-primary" style="font-size: 0.7rem; margin-left: 8px;"><?php echo $total_comunicacoes; ?> enviadas</span>
                </h1>
                <p class="breadcrumb"><a href="index.php">Dashboard</a> <span class="separator">/</span> <span>Comunicação</span></p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme"><i class="fas fa-sun theme-icon sun"></i><i class="fas fa-moon theme-icon moon"></i></button>
                               <?php include "../../includes/admin/notificacoes-admin.php" ?>

                <div class="header-actions">
                    <button class="btn btn-primary" onclick="abrirNovaComunicacao()">
                        <i class="fas fa-plus"></i> Nova Comunicação
                    </button>
                   
                </div>
            </div>
        </header>

        <!-- ===== ESTATÍSTICAS ===== -->
        <section class="stats-grid animate-fade-up">
            <div class="stat-card" style="border-left: 4px solid #6C2BD9;">
                <div class="icon aurora"><i class="fas fa-envelope"></i></div>
                <div class="value"><?php echo $total_mensagens; ?></div>
                <div class="label">Mensagens</div>
            </div>
            <div class="stat-card" style="border-left: 4px solid #00D2FF;">
                <div class="icon blue"><i class="fas fa-bullhorn"></i></div>
                <div class="value"><?php echo $total_comunicados; ?></div>
                <div class="label">Comunicados</div>
            </div>
            <div class="stat-card" style="border-left: 4px solid #FF6B6B;">
                <div class="icon red"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="value"><?php echo $total_alertas; ?></div>
                <div class="label">Alertas</div>
            </div>
            <div class="stat-card" style="border-left: 4px solid #FFD93D;">
                <div class="icon yellow"><i class="fas fa-ad"></i></div>
                <div class="value"><?php echo $total_publicidades; ?></div>
                <div class="label">Publicidade</div>
            </div>
        </section>

        <!-- ===== FILTROS ===== -->
        <div class="filter-bar-admin animate-fade-up">
            <div class="filter-group">
                <label><i class="fas fa-search"></i></label>
                <input type="text" id="searchComunicacao" placeholder="Pesquisar..." oninput="aplicarFiltros()">
            </div>
            <div class="filter-group">
                <label>Tipo</label>
                <select id="filterTipo" onchange="aplicarFiltros()">
                    <option value="">Todos</option>
                    <?php foreach ($tipos_comunicacao as $t): ?>
                        <option value="<?php echo $t['id']; ?>"><?php echo $t['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-group">
                <label>Canal</label>
                <select id="filterCanal" onchange="aplicarFiltros()">
                    <option value="">Todos</option>
                    <?php foreach ($canais as $c): ?>
                        <option value="<?php echo $c['id']; ?>"><?php echo $c['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-group">
                <label>Importância</label>
                <select id="filterImportancia" onchange="aplicarFiltros()">
                    <option value="">Todas</option>
                    <option value="low">Baixa</option>
                    <option value="medium">Média</option>
                    <option value="high">Alta</option>
                    <option value="critical">Crítica</option>
                </select>
            </div>
            <div class="filter-actions">
                <button class="btn btn-sm btn-primary" onclick="aplicarFiltros()"><i class="fas fa-filter"></i> Filtrar</button>
                <button class="btn btn-sm btn-outline" onclick="limparFiltros()"><i class="fas fa-undo"></i> Limpar</button>
            </div>
            <span class="resultados-info" id="resultadosInfo"><?php echo $total_comunicacoes; ?> resultados</span>
        </div>

        <!-- ===== LISTA DE COMUNICAÇÕES ===== -->
        <div class="comunicacoes-container">
            <div class="comunicacoes-list" id="comunicacoesList">
                <?php foreach ($comunicacoes as $com): 
                    $tipo_info = array_filter($tipos_comunicacao, fn($t) => $t['id'] === $com['tipo']);
                    $tipo_info = reset($tipo_info);
                    $canal_info = array_filter($canais, fn($c) => $c['id'] === $com['canal']);
                    $canal_info = reset($canal_info);
                ?>
                    <div class="comunicacao-item animate-fade-up" 
                         data-id="<?php echo $com['id']; ?>"
                         data-tipo="<?php echo $com['tipo']; ?>"
                         data-canal="<?php echo $com['canal']; ?>"
                         data-importancia="<?php echo $com['importancia']; ?>"
                         data-titulo="<?php echo strtolower($com['titulo']); ?>"
                         data-conteudo="<?php echo strtolower(strip_tags($com['conteudo'])); ?>"
                         onclick="abrirComunicacao(<?php echo $com['id']; ?>)">
                        
                        <div class="comunicacao-status">
                            <div class="tipo-icon" style="background: <?php echo getColorForTipo($com['tipo']); ?>20; color: <?php echo getColorForTipo($com['tipo']); ?>;">
                                <i class="fas <?php echo getIconForTipo($com['tipo']); ?>"></i>
                            </div>
                            <span class="badge <?php echo getBadgeForImportancia($com['importancia']); ?>">
                                <?php echo getLabelForImportancia($com['importancia']); ?>
                            </span>
                        </div>
                        
                        <div class="comunicacao-conteudo">
                            <div class="comunicacao-header">
                                <span class="comunicacao-tipo" style="color: <?php echo getColorForTipo($com['tipo']); ?>;">
                                    <?php echo $tipo_info['nome'] ?? $com['tipo']; ?>
                                </span>
                                <span class="comunicacao-data"><?php echo formatDateTime($com['data_envio']); ?></span>
                            </div>
                            <div class="comunicacao-titulo"><strong><?php echo $com['titulo']; ?></strong></div>
                            <div class="comunicacao-texto"><?php echo limitText($com['conteudo'], 150); ?></div>
                            <div class="comunicacao-footer">
                                <span class="canal-badge" style="border-color: <?php echo $canal_info['cor'] ?? '#6B7A8F'; ?>; color: <?php echo $canal_info['cor'] ?? '#6B7A8F'; ?>;">
                                    <i class="fas <?php echo $canal_info['icon'] ?? 'fa-users'; ?>"></i>
                                    <?php echo $com['canal_nome']; ?>
                                </span>
                                <?php if (!empty($com['anexos'])): ?>
                                    <span class="anexos-badge"><i class="fas fa-paperclip"></i> <?php echo count($com['anexos']); ?></span>
                                <?php endif; ?>
                                <?php if ($com['imagem']): ?>
                                    <span class="media-badge"><i class="fas fa-image"></i> Imagem</span>
                                <?php endif; ?>
                                <?php if ($com['video_url']): ?>
                                    <span class="media-badge"><i class="fas fa-video"></i> Vídeo</span>
                                <?php endif; ?>
                                <span class="metricas-badge">
                                    <i class="fas fa-eye"></i> <?php echo $com['visualizacoes']; ?>
                                    <i class="fas fa-mouse-pointer" style="margin-left: 8px;"></i> <?php echo $com['cliques']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Paginação -->
            <div class="table-pagination" id="paginacaoComunicacoes">
                <button class="page-btn prev" onclick="mudarPagina('prev')" disabled><i class="fas fa-chevron-left"></i></button>
                <span class="page-info">1 de 1</span>
                <button class="page-btn next" onclick="mudarPagina('next')" disabled><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </main>
</div>

<!-- ============================================ -->
<!-- MODAL: NOVA COMUNICAÇÃO                       -->
<!-- ============================================ -->
<div class="modal" id="modalNovaComunicacao">
    <div class="modal-overlay" onclick="fecharModal('modalNovaComunicacao')"></div>
    <div class="modal-content" style="max-width: 800px; max-height: 95vh;">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fas fa-plus-circle" style="color: var(--color-aurora);"></i> Nova Comunicação</h3>
            <button class="modal-close" onclick="fecharModal('modalNovaComunicacao')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="formNovaComunicacao" onsubmit="enviarComunicacao(event)">
                <!-- Tipo -->
                <div class="form-group">
                    <label class="form-label">Tipo de Comunicação <span class="required">*</span></label>
                    <div class="tipo-selector" id="tipoSelector">
                        <?php foreach ($tipos_comunicacao as $t): ?>
                            <div class="tipo-option" data-tipo="<?php echo $t['id']; ?>" onclick="selecionarTipo('<?php echo $t['id']; ?>')">
                                <i class="fas <?php echo $t['icon']; ?>" style="color: <?php echo $t['cor']; ?>;"></i>
                                <span><?php echo $t['nome']; ?></span>
                                <small><?php echo $t['descricao']; ?></small>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" id="tipoSelecionado" value="">
                </div>

                <!-- Canal -->
                <div class="form-group">
                    <label class="form-label">Destinatários <span class="required">*</span></label>
                    <div class="canal-selector" id="canalSelector">
                        <?php foreach ($canais as $c): ?>
                            <div class="canal-option" data-canal="<?php echo $c['id']; ?>" onclick="selecionarCanal('<?php echo $c['id']; ?>')" style="border-color: <?php echo $c['cor']; ?>;">
                                <i class="fas <?php echo $c['icon']; ?>" style="color: <?php echo $c['cor']; ?>;"></i>
                                <span><?php echo $c['nome']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" id="canalSelecionado" value="">
                </div>

                <!-- Título -->
                <div class="form-group">
                    <label class="form-label">Título <span class="required">*</span></label>
                    <input type="text" class="form-control" id="comunicacaoTitulo" placeholder="Digite o título da comunicação..." required>
                </div>

                <!-- Conteúdo -->
                <div class="form-group">
                    <label class="form-label">Conteúdo <span class="required">*</span></label>
                    <textarea class="form-control" id="comunicacaoConteudo" rows="5" placeholder="Digite o conteúdo da mensagem..." required></textarea>
                </div>

                <!-- Importância -->
                <div class="form-group">
                    <label class="form-label">Nível de Importância</label>
                    <select class="form-control" id="comunicacaoImportancia">
                        <option value="low">Baixa</option>
                        <option value="medium" selected>Média</option>
                        <option value="high">Alta</option>
                        <option value="critical">Crítica</option>
                    </select>
                </div>

                <!-- MÍDIA (Imagem/Vídeo) - visível apenas para Publicidade -->
                <div class="form-group" id="midiaGroup" style="display: none;">
                    <label class="form-label">Mídia</label>
                    <div class="midia-upload-area">
                        <div class="midia-option" onclick="document.getElementById('imagemInput').click()">
                            <i class="fas fa-image"></i>
                            <span>Upload de Imagem</span>
                            <small>JPG, PNG, WEBP até 5MB</small>
                            <input type="file" id="imagemInput" accept="image/*" style="display: none;" onchange="previewImagem(event)">
                        </div>
                        <div class="midia-option video-option" onclick="abrirInputVideo()">
                            <i class="fas fa-video"></i>
                            <span>Link do Vídeo</span>
                            <small>YouTube, Vimeo, Facebook, etc.</small>
                        </div>
                    </div>
                    
                    <!-- Campo para link do vídeo -->
                    <div id="videoLinkContainer" style="display: none; margin-top: var(--space-sm);">
                        <div class="video-link-input">
                            <i class="fas fa-link"></i>
                            <input type="url" id="videoLinkInput" class="form-control" placeholder="https://www.youtube.com/watch?v=..." style="flex: 1;">
                            <button type="button" class="btn btn-sm btn-primary" onclick="adicionarVideoLink()"><i class="fas fa-plus"></i> Adicionar</button>
                        </div>
                        <p class="form-help">Suporta links do YouTube, Vimeo, Facebook, Instagram, TikTok e Dailymotion</p>
                    </div>
                    
                    <!-- Preview da mídia -->
                    <div id="previewMidia" style="display: none; margin-top: var(--space-sm);">
                        <div class="preview-content">
                            <button type="button" class="btn btn-sm btn-danger btn-remove-midia" onclick="removerMidia()">&times;</button>
                            <img id="previewImagem" src="" alt="Preview" style="max-width: 100%; max-height: 200px; border-radius: var(--radius-sm); display: none;">
                            <div id="previewVideo" style="display: none; position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: var(--radius-sm);">
                                <iframe id="videoFrame" src="" frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                            </div>
                            <div id="previewVideoLink" style="display: none; padding: var(--space-md); background: var(--bg-input); border-radius: var(--radius-sm); align-items: center; gap: var(--space-sm);">
                                <i class="fas fa-video" style="color: var(--color-aurora); font-size: 1.2rem;"></i>
                                <span id="videoLinkTexto" style="color: var(--text-secondary); word-break: break-all; font-size: var(--text-sm);"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Anexos -->
                <div class="form-group">
                    <label class="form-label">Anexos</label>
                    <input type="file" class="form-control" id="comunicacaoAnexos" multiple>
                    <p class="form-help">PDF, DOC, XLS, ZIP até 10MB por arquivo</p>
                </div>

                <!-- Agendamento -->
                <div class="form-group">
                    <label class="form-label">Agendar Envio</label>
                    <input type="datetime-local" class="form-control" id="comunicacaoAgendamento">
                    <p class="form-help">Deixe em branco para enviar imediatamente</p>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalNovaComunicacao')">Cancelar</button>
            <button class="btn btn-primary" onclick="document.getElementById('formNovaComunicacao').submit()">
                <i class="fas fa-paper-plane"></i> Enviar
            </button>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- MODAL: VISUALIZAR COMUNICAÇÃO                 -->
<!-- ============================================ -->
<div class="modal" id="modalVisualizarComunicacao">
    <div class="modal-overlay" onclick="fecharModal('modalVisualizarComunicacao')"></div>
    <div class="modal-content" style="max-width: 750px; max-height: 90vh;">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fas fa-eye" style="color: var(--color-aurora);"></i> Detalhes da Comunicação</h3>
            <button class="modal-close" onclick="fecharModal('modalVisualizarComunicacao')">&times;</button>
        </div>
        <div class="modal-body" id="visualizarComunicacaoDetalhe">
            <!-- Carregado via JavaScript -->
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalVisualizarComunicacao')">Fechar</button>
            <button class="btn btn-danger" onclick="excluirComunicacao(0)"><i class="fas fa-trash"></i> Excluir</button>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- MODAL: CONFIRMAÇÃO                           -->
<!-- ============================================ -->
<div class="modal" id="modalConfirmacao">
    <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
    <div class="modal-content" style="max-width: 420px;">
        <div class="modal-header">
            <h3 class="modal-title" id="confirmacaoTitulo"><i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar</h3>
            <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
        </div>
        <div class="modal-body" id="confirmacaoCorpo"><p>Tem certeza?</p></div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
            <button class="btn btn-danger" id="confirmacaoBtn" onclick="executarConfirmacao()"><i class="fas fa-check"></i> Confirmar</button>
        </div>
    </div>
</div>

<script>
// ============================================
// DADOS MOCKADOS
// ============================================
const comunicacoesData = <?php echo json_encode($comunicacoes); ?>;

let paginaAtual = 1, itensPorPagina = 8, totalItensVisiveis = 0;
let acaoConfirmacao = null;
let comunicacaoParaExcluir = null;

// ============================================
// INICIALIZAÇÃO
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar
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
    const searchInput = document.getElementById('searchComunicacao');
    if (searchInput) {
        let timeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(aplicarFiltros, 300);
        });
    }

    // Total de itens
    const total = document.querySelectorAll('.comunicacao-item').length;
    if (total > 0) { totalItensVisiveis = total; atualizarPaginacao(total); }
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

// ============================================
// NOTIFICAÇÕES
// ============================================
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
    atualizarBadgeNotif();
    carregarNotificacoes();
    mostrarToast('Todas as notificações marcadas como lidas', 'success');
    closeNotifications();
}

function atualizarBadgeNotif() {
    const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
    const badge = document.getElementById('notifBadge');
    const bottom = document.getElementById('bottomNotifBadge');
    if (badge) { badge.textContent = naoLidas; badge.style.display = naoLidas > 0 ? 'flex' : 'none'; }
    if (bottom) { bottom.textContent = naoLidas; bottom.style.display = naoLidas > 0 ? 'flex' : 'none'; }
}

function closeNotifications() {
    document.getElementById('notificacoesDropdown')?.classList.remove('active');
}

// ============================================
// TOAST
// ============================================
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

// ============================================
// FILTROS E PAGINAÇÃO
// ============================================
function aplicarFiltros() {
    const search = document.getElementById('searchComunicacao').value.toLowerCase().trim();
    const tipo = document.getElementById('filterTipo').value;
    const canal = document.getElementById('filterCanal').value;
    const importancia = document.getElementById('filterImportancia').value;
    const items = document.querySelectorAll('.comunicacao-item');
    let visiveis = 0;
    items.forEach(item => {
        const titulo = item.dataset.titulo || '';
        const conteudo = item.dataset.conteudo || '';
        const itemTipo = item.dataset.tipo || '';
        const itemCanal = item.dataset.canal || '';
        const itemImportancia = item.dataset.importancia || '';
        let show = true;
        if (search) show = titulo.includes(search) || conteudo.includes(search);
        if (show && tipo) show = itemTipo === tipo;
        if (show && canal) show = itemCanal === canal;
        if (show && importancia) show = itemImportancia === importancia;
        item.style.display = show ? '' : 'none';
        if (show) visiveis++;
    });
    totalItensVisiveis = visiveis;
    document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
    paginaAtual = 1;
    if (totalItensVisiveis > 0) { atualizarPaginacao(totalItensVisiveis); } 
    else {
        document.getElementById('paginacaoComunicacoes').style.display = 'none';
        document.querySelector('.comunicacoes-list').innerHTML = `<div class="empty-state-admin"><div class="empty-icon"><i class="fas fa-inbox"></i></div><h4>Nenhuma comunicação encontrada</h4><p>Tente ajustar os filtros.</p></div>`;
    }
}

function limparFiltros() {
    document.getElementById('searchComunicacao').value = '';
    document.getElementById('filterTipo').value = '';
    document.getElementById('filterCanal').value = '';
    document.getElementById('filterImportancia').value = '';
    document.querySelectorAll('.comunicacao-item').forEach(item => item.style.display = '');
    totalItensVisiveis = document.querySelectorAll('.comunicacao-item').length;
    document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
    if (document.querySelector('.comunicacoes-list .empty-state-admin')) location.reload();
    paginaAtual = 1;
    if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
}

function atualizarPaginacao(total) {
    const totalPaginas = Math.ceil(total / itensPorPagina);
    const container = document.getElementById('paginacaoComunicacoes');
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
        firstBtn.className = 'page-btn';
        firstBtn.textContent = '1';
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
        lastBtn.className = 'page-btn';
        lastBtn.textContent = totalPaginas;
        lastBtn.onclick = function() { irParaPagina(totalPaginas); };
        container.insertBefore(lastBtn, info);
    }
    prevBtn.disabled = paginaAtual <= 1;
    nextBtn.disabled = paginaAtual >= totalPaginas;
    info.textContent = `${paginaAtual} de ${totalPaginas}`;
    mostrarPagina(paginaAtual);
}

function mostrarPagina(page) {
    const items = document.querySelectorAll('.comunicacao-item:not([style*="display: none"])');
    const start = (page - 1) * itensPorPagina;
    const end = start + itensPorPagina;
    document.querySelectorAll('.comunicacao-item').forEach(item => { if (item.style.display !== 'none') item.style.display = 'none'; });
    items.forEach((item, index) => { if (index >= start && index < end) item.style.display = ''; });
}

function irParaPagina(page) {
    paginaAtual = page;
    if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
    document.querySelector('.comunicacoes-container')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function mudarPagina(direcao) {
    const totalPaginas = Math.ceil(totalItensVisiveis / itensPorPagina);
    if (direcao === 'prev' && paginaAtual > 1) irParaPagina(paginaAtual - 1);
    else if (direcao === 'next' && paginaAtual < totalPaginas) irParaPagina(paginaAtual + 1);
}

// ============================================
// NOVA COMUNICAÇÃO
// ============================================
function abrirNovaComunicacao() {
    document.getElementById('formNovaComunicacao').reset();
    document.getElementById('tipoSelecionado').value = '';
    document.getElementById('canalSelecionado').value = '';
    document.getElementById('previewMidia').style.display = 'none';
    document.getElementById('midiaGroup').style.display = 'none';
    document.getElementById('videoLinkContainer').style.display = 'none';
    document.querySelectorAll('.tipo-option, .canal-option').forEach(el => el.classList.remove('selected'));
    document.getElementById('modalNovaComunicacao').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function selecionarTipo(tipo) {
    document.querySelectorAll('.tipo-option').forEach(el => el.classList.remove('selected'));
    document.querySelector(`.tipo-option[data-tipo="${tipo}"]`).classList.add('selected');
    document.getElementById('tipoSelecionado').value = tipo;
    document.getElementById('midiaGroup').style.display = tipo === 'publicidade' ? 'block' : 'none';
    if (tipo !== 'publicidade') {
        document.getElementById('videoLinkContainer').style.display = 'none';
        removerMidia();
    }
}

function selecionarCanal(canal) {
    document.querySelectorAll('.canal-option').forEach(el => el.classList.remove('selected'));
    document.querySelector(`.canal-option[data-canal="${canal}"]`).classList.add('selected');
    document.getElementById('canalSelecionado').value = canal;
}

// ============================================
// VÍDEO LINK
// ============================================
function abrirInputVideo() {
    const container = document.getElementById('videoLinkContainer');
    if (container.style.display === 'none' || container.style.display === '') {
        container.style.display = 'block';
        document.getElementById('videoLinkInput').focus();
    } else {
        container.style.display = 'none';
    }
}

function adicionarVideoLink() {
    const url = document.getElementById('videoLinkInput').value.trim();
    if (!url) {
        mostrarToast('Por favor, insira um link de vídeo', 'error');
        return;
    }
    
    // Validar se é um link de vídeo suportado
    const supportedPlatforms = [
        'youtube.com/watch', 'youtu.be', 'youtube.com/embed',
        'vimeo.com', 'facebook.com/watch', 'fb.watch',
        'instagram.com/p', 'instagram.com/reel',
        'tiktok.com', 'dailymotion.com'
    ];
    
    const isValid = supportedPlatforms.some(platform => url.includes(platform));
    if (!isValid) {
        mostrarToast('Link não suportado. Use YouTube, Vimeo, Facebook, Instagram, TikTok ou Dailymotion', 'error');
        return;
    }
    
    // Converter para embed
    let embedUrl = url;
    let displayUrl = url;
    
    // YouTube
    if (url.includes('youtube.com/watch') || url.includes('youtu.be')) {
        const videoId = url.includes('youtu.be') ? url.split('/').pop() : url.split('v=')[1]?.split('&')[0];
        if (videoId) {
            embedUrl = `https://www.youtube.com/embed/${videoId}`;
            displayUrl = `YouTube: ${videoId}`;
        }
    }
    // Vimeo
    else if (url.includes('vimeo.com')) {
        const videoId = url.split('/').pop();
        if (videoId) {
            embedUrl = `https://player.vimeo.com/video/${videoId}`;
            displayUrl = `Vimeo: ${videoId}`;
        }
    }
    // Facebook
    else if (url.includes('facebook.com/watch')) {
        const videoId = url.split('/').pop();
        embedUrl = url.replace('watch', 'embed/video');
        displayUrl = `Facebook: ${videoId || 'vídeo'}`;
    }
    // Instagram
    else if (url.includes('instagram.com')) {
        const postId = url.split('/').filter(s => s).pop();
        if (postId) {
            embedUrl = `https://www.instagram.com/embed/${postId}`;
            displayUrl = `Instagram: ${postId}`;
        }
    }
    // TikTok
    else if (url.includes('tiktok.com')) {
        embedUrl = url.replace('tiktok.com', 'tiktok.com/embed');
        displayUrl = 'TikTok';
    }
    // Dailymotion
    else if (url.includes('dailymotion.com')) {
        const videoId = url.split('/').pop();
        if (videoId) {
            embedUrl = `https://www.dailymotion.com/embed/video/${videoId}`;
            displayUrl = `Dailymotion: ${videoId}`;
        }
    }
    
    // Salvar o link
    document.getElementById('videoLinkInput').dataset.embedUrl = embedUrl;
    document.getElementById('videoLinkInput').dataset.originalUrl = url;
    
    // Mostrar preview
    const preview = document.getElementById('previewMidia');
    const img = document.getElementById('previewImagem');
    const video = document.getElementById('previewVideo');
    const frame = document.getElementById('videoFrame');
    const linkPreview = document.getElementById('previewVideoLink');
    const linkTexto = document.getElementById('videoLinkTexto');
    
    img.style.display = 'none';
    video.style.display = 'block';
    linkPreview.style.display = 'none';
    frame.src = embedUrl;
    preview.style.display = 'block';
    
    document.getElementById('videoLinkContainer').style.display = 'none';
    document.getElementById('videoLinkInput').value = '';
    mostrarToast('Vídeo adicionado com sucesso!', 'success');
}

function removerMidia() {
    document.getElementById('previewMidia').style.display = 'none';
    document.getElementById('previewImagem').src = '';
    document.getElementById('previewImagem').style.display = 'none';
    document.getElementById('videoFrame').src = '';
    document.getElementById('previewVideo').style.display = 'none';
    document.getElementById('previewVideoLink').style.display = 'none';
    document.getElementById('imagemInput').value = '';
    document.getElementById('videoLinkInput').value = '';
    document.getElementById('videoLinkInput').dataset.embedUrl = '';
    document.getElementById('videoLinkInput').dataset.originalUrl = '';
    document.getElementById('videoLinkContainer').style.display = 'none';
}

function previewImagem(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const preview = document.getElementById('previewMidia');
        const img = document.getElementById('previewImagem');
        const video = document.getElementById('previewVideo');
        const linkPreview = document.getElementById('previewVideoLink');
        img.src = e.target.result;
        img.style.display = 'block';
        video.style.display = 'none';
        linkPreview.style.display = 'none';
        preview.style.display = 'block';
        document.getElementById('videoLinkContainer').style.display = 'none';
    };
    reader.readAsDataURL(file);
}

function enviarComunicacao(event) {
    event.preventDefault();
    const tipo = document.getElementById('tipoSelecionado').value;
    const canal = document.getElementById('canalSelecionado').value;
    const titulo = document.getElementById('comunicacaoTitulo').value.trim();
    const conteudo = document.getElementById('comunicacaoConteudo').value.trim();

    if (!tipo || !canal || !titulo || !conteudo) {
        mostrarToast('Preencha todos os campos obrigatórios!', 'error');
        return;
    }

    // Coletar dados da mídia
    let imagem = null;
    let video_url = null;
    let video_embed = null;
    
    const previewImg = document.getElementById('previewImagem');
    if (previewImg.style.display !== 'none' && previewImg.src) {
        imagem = 'banner-' + Date.now() + '.jpg';
    }
    
    const videoFrame = document.getElementById('videoFrame');
    if (videoFrame.src) {
        video_embed = videoFrame.src;
        video_url = document.getElementById('videoLinkInput').dataset.originalUrl || video_embed;
    }

    const novaComunicacao = {
        id: comunicacoesData.length + 1,
        tipo: tipo,
        titulo: titulo,
        conteudo: conteudo,
        canal: canal,
        canal_nome: document.querySelector(`.canal-option[data-canal="${canal}"] span`)?.textContent || canal,
        data_envio: new Date().toISOString().replace('T', ' ').slice(0, 19),
        status: 'entregue',
        visualizacoes: 0,
        cliques: 0,
        anexos: [],
        imagem: imagem,
        video_url: video_url,
        video_embed: video_embed,
        criado_por: 'Administrador',
        importancia: document.getElementById('comunicacaoImportancia').value
    };

    comunicacoesData.push(novaComunicacao);
    
    // Adicionar à lista
    const list = document.getElementById('comunicacoesList');
    const empty = list.querySelector('.empty-state-admin');
    if (empty) empty.remove();
    
    const tipoInfo = <?php echo json_encode($tipos_comunicacao); ?>.find(t => t.id === tipo);
    const canalInfo = <?php echo json_encode($canais); ?>.find(c => c.id === canal);
    
    const item = document.createElement('div');
    item.className = 'comunicacao-item animate-fade-up';
    item.dataset.id = novaComunicacao.id;
    item.dataset.tipo = tipo;
    item.dataset.canal = canal;
    item.dataset.importancia = novaComunicacao.importancia;
    item.dataset.titulo = titulo.toLowerCase();
    item.dataset.conteudo = conteudo.toLowerCase();
    item.onclick = function() { abrirComunicacao(novaComunicacao.id); };
    
    item.innerHTML = `
        <div class="comunicacao-status">
            <div class="tipo-icon" style="background: ${tipoInfo?.cor || '#6B7A8F'}20; color: ${tipoInfo?.cor || '#6B7A8F'};">
                <i class="fas ${tipoInfo?.icon || 'fa-envelope'}"></i>
            </div>
            <span class="badge ${getBadgeForImportancia(novaComunicacao.importancia)}">
                ${getLabelForImportancia(novaComunicacao.importancia)}
            </span>
        </div>
        <div class="comunicacao-conteudo">
            <div class="comunicacao-header">
                <span class="comunicacao-tipo" style="color: ${tipoInfo?.cor || '#6B7A8F'};">
                    ${tipoInfo?.nome || tipo}
                </span>
                <span class="comunicacao-data">agora mesmo</span>
            </div>
            <div class="comunicacao-titulo"><strong>${titulo}</strong></div>
            <div class="comunicacao-texto">${limitText(conteudo, 150)}</div>
            <div class="comunicacao-footer">
                <span class="canal-badge" style="border-color: ${canalInfo?.cor || '#6B7A8F'}; color: ${canalInfo?.cor || '#6B7A8F'};">
                    <i class="fas ${canalInfo?.icon || 'fa-users'}"></i>
                    ${canalInfo?.nome || canal}
                </span>
                ${imagem ? '<span class="media-badge"><i class="fas fa-image"></i> Imagem</span>' : ''}
                ${video_url ? '<span class="media-badge"><i class="fas fa-video"></i> Vídeo</span>' : ''}
                <span class="metricas-badge">
                    <i class="fas fa-eye"></i> 0
                    <i class="fas fa-mouse-pointer" style="margin-left: 8px;"></i> 0
                </span>
            </div>
        </div>
    `;
    
    list.prepend(item);
    
    // Atualizar contadores
    document.querySelector('.stat-card .value').textContent = comunicacoesData.length;
    document.querySelector('.page-header .badge-primary').textContent = comunicacoesData.length + ' enviadas';
    document.querySelector('.bottom-nav .nav-item.active .badge').textContent = comunicacoesData.length;
    
    totalItensVisiveis = comunicacoesData.length;
    atualizarPaginacao(totalItensVisiveis);
    
    mostrarToast('Comunicação enviada com sucesso!', 'success');
    fecharModal('modalNovaComunicacao');
}

function getBadgeForImportancia(importancia) {
    const badges = {
        'low': 'badge-info',
        'medium': 'badge-warning',
        'high': 'badge-primary',
        'critical': 'badge-danger'
    };
    return badges[importancia] || 'badge-info';
}

function getLabelForImportancia(importancia) {
    const labels = {
        'low': 'Baixa',
        'medium': 'Média',
        'high': 'Alta',
        'critical': 'Crítica'
    };
    return labels[importancia] || 'Baixa';
}

function limitText(text, limit) {
    if (text.length > limit) return text.substring(0, limit) + '...';
    return text;
}

// ============================================
// VISUALIZAR COMUNICAÇÃO
// ============================================
function abrirComunicacao(id) {
    const com = comunicacoesData.find(c => c.id === id);
    if (!com) return;

    const tipoInfo = <?php echo json_encode($tipos_comunicacao); ?>.find(t => t.id === com.tipo);
    const canalInfo = <?php echo json_encode($canais); ?>.find(c => c.id === com.canal);

    let mediaHtml = '';
    if (com.imagem) {
        mediaHtml += `<div class="com-media"><img src="../../assets/images/${com.imagem}" alt="${com.titulo}" style="max-width: 100%; border-radius: var(--radius-sm);"></div>`;
    }
    if (com.video_embed) {
        mediaHtml += `<div class="com-media" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: var(--radius-sm);"><iframe src="${com.video_embed}" frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe></div>`;
    }

    let anexosHtml = '';
    if (com.anexos && com.anexos.length > 0) {
        anexosHtml = `<div class="com-anexos"><strong><i class="fas fa-paperclip"></i> Anexos (${com.anexos.length})</strong><div class="anexos-list">`;
        com.anexos.forEach(a => {
            const icon = a.tipo === 'pdf' ? 'fa-file-pdf' : a.tipo === 'jpg' || a.tipo === 'png' ? 'fa-file-image' : 'fa-file';
            anexosHtml += `<span class="anexo-item"><i class="fas ${icon}"></i> ${a.nome} (${a.tamanho})</span>`;
        });
        anexosHtml += `</div></div>`;
    }

    const body = document.getElementById('visualizarComunicacaoDetalhe');
    body.innerHTML = `
        <div class="com-detalhe-header">
            <div class="com-tipo-badge" style="background: ${tipoInfo?.cor || '#6B7A8F'}20; color: ${tipoInfo?.cor || '#6B7A8F'};">
                <i class="fas ${tipoInfo?.icon || 'fa-envelope'}"></i>
                ${tipoInfo?.nome || com.tipo}
            </div>
            <span class="badge ${com.importancia === 'critical' ? 'badge-danger' : com.importancia === 'high' ? 'badge-primary' : com.importancia === 'medium' ? 'badge-warning' : 'badge-info'}">
                ${com.importancia === 'critical' ? '⚠️ Crítica' : 
                  com.importancia === 'high' ? '🔴 Alta' :
                  com.importancia === 'medium' ? '🟡 Média' : '🟢 Baixa'}
            </span>
        </div>
        <div class="com-detalhe-canal" style="border-color: ${canalInfo?.cor || '#6B7A8F'};">
            <i class="fas ${canalInfo?.icon || 'fa-users'}" style="color: ${canalInfo?.cor || '#6B7A8F'};"></i>
            <span>${com.canal_nome}</span>
            <span class="com-data"><i class="far fa-clock"></i> ${formatDateTime(com.data_envio)}</span>
            <span class="com-stats"><i class="fas fa-eye"></i> ${com.visualizacoes} visualizações</span>
            <span class="com-stats"><i class="fas fa-mouse-pointer"></i> ${com.cliques} cliques</span>
        </div>
        <h4 class="com-titulo">${com.titulo}</h4>
        <div class="com-conteudo"><p>${com.conteudo}</p></div>
        ${mediaHtml}
        ${anexosHtml}
        <div class="com-footer-info">
            <small><i class="fas fa-user"></i> Enviado por: ${com.criado_por}</small>
            <small><i class="fas fa-clock"></i> ${formatDateTime(com.data_envio)}</small>
        </div>
    `;

    document.getElementById('modalVisualizarComunicacao').classList.add('active');
    document.body.style.overflow = 'hidden';
    comunicacaoParaExcluir = id;
}

function formatDateTime(dt) {
    if (!dt) return 'N/A';
    const d = new Date(dt.replace(' ', 'T'));
    const now = new Date();
    const diff = Math.floor((now - d) / 1000);
    if (diff < 60) return 'há ' + diff + ' segundos';
    if (diff < 3600) return 'há ' + Math.floor(diff / 60) + ' minutos';
    if (diff < 86400) return 'há ' + Math.floor(diff / 3600) + ' horas';
    if (diff < 604800) return 'há ' + Math.floor(diff / 86400) + ' dias';
    return String(d.getDate()).padStart(2,'0') + '/' + String(d.getMonth()+1).padStart(2,'0') + '/' + d.getFullYear() + ' ' + String(d.getHours()).padStart(2,'0') + ':' + String(d.getMinutes()).padStart(2,'0');
}

// ============================================
// EXCLUIR COMUNICAÇÃO
// ============================================
function excluirComunicacao(id) {
    const com = comunicacoesData.find(c => c.id === (id || comunicacaoParaExcluir));
    if (!com) return;
    mostrarConfirmacao('Excluir Comunicação', `Tem certeza que deseja excluir <strong>"${com.titulo}"</strong>?<br><small style="color: #EF4444;">Esta ação não pode ser desfeita!</small>`, function() {
        const item = document.querySelector(`.comunicacao-item[data-id="${com.id}"]`);
        if (item) {
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            setTimeout(() => {
                item.remove();
                const idx = comunicacoesData.findIndex(c => c.id === com.id);
                if (idx > -1) comunicacoesData.splice(idx, 1);
                const total = document.querySelectorAll('.comunicacao-item').length;
                if (total > 0) { totalItensVisiveis = total; atualizarPaginacao(total); }
                else {
                    document.getElementById('paginacaoComunicacoes').style.display = 'none';
                    document.querySelector('.comunicacoes-list').innerHTML = `<div class="empty-state-admin"><div class="empty-icon"><i class="fas fa-inbox"></i></div><h4>Nenhuma comunicação</h4><p>Não há comunicações para exibir.</p></div>`;
                }
                // Atualizar contadores
                document.querySelector('.stat-card .value').textContent = comunicacoesData.length;
                document.querySelector('.page-header .badge-primary').textContent = comunicacoesData.length + ' enviadas';
                document.querySelector('.bottom-nav .nav-item.active .badge').textContent = comunicacoesData.length;
                mostrarToast('Comunicação excluída!', 'error');
            }, 300);
        }
        fecharModal('modalConfirmacao');
        fecharModal('modalVisualizarComunicacao');
    });
}

// ============================================
// MODAL DE CONFIRMAÇÃO
// ============================================
function mostrarConfirmacao(titulo, mensagem, callback) {
    document.getElementById('confirmacaoTitulo').innerHTML = `<i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> ${titulo}`;
    document.getElementById('confirmacaoCorpo').innerHTML = `<p>${mensagem}</p>`;
    document.getElementById('confirmacaoBtn').onclick = callback;
    document.getElementById('modalConfirmacao').classList.add('active');
}

function executarConfirmacao() {
    if (typeof acaoConfirmacao === 'function') { acaoConfirmacao(); acaoConfirmacao = null; }
}

// ============================================
// EXPORTAR
// ============================================
function exportarComunicacoes() {
    mostrarToast('Exportando comunicações...', 'info');
    setTimeout(() => mostrarToast('Exportação concluída!', 'success'), 1500);
}

// ============================================
// UTILITÁRIOS
// ============================================
function fecharModal(id) {
    document.getElementById(id)?.classList.remove('active');
    document.body.style.overflow = '';
}
</script>

<style>
/* ============================================
   ESTILOS DA CENTRAL DE COMUNICAÇÃO
   ============================================ */

/* ===== STATS ===== */
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
    text-align: center;
}
.stat-card:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
    transform: translateY(-4px);
}
.stat-card .icon {
    width: 48px;
    height: 48px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-sm);
    font-size: 1.3rem;
}
.stat-card .icon.aurora { background: rgba(108,43,217,0.15); color: var(--color-aurora); }
.stat-card .icon.blue { background: rgba(0,210,255,0.15); color: var(--color-turquoise); }
.stat-card .icon.red { background: rgba(255,107,107,0.15); color: #FF6B6B; }
.stat-card .icon.yellow { background: rgba(255,217,61,0.15); color: #FFD93D; }
.stat-card .value {
    font-family: var(--font-display);
    font-size: var(--text-h2);
    font-weight: 700;
    color: var(--text-primary);
}
.stat-card .label {
    font-size: var(--text-sm);
    color: var(--text-muted);
}

/* ===== FILTROS ===== */
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
.filter-bar-admin select, .filter-bar-admin input {
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
.filter-bar-admin select:focus, .filter-bar-admin input:focus {
    outline: none;
    border-color: var(--color-aurora);
    box-shadow: 0 0 0 3px rgba(108,43,217,0.1);
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

/* ===== LISTA DE COMUNICAÇÕES ===== */
.comunicacoes-container {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--space-lg);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
}
.comunicacoes-container:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}
.comunicacoes-list {
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}

.comunicacao-item {
    display: flex;
    gap: var(--space-md);
    padding: var(--space-md);
    background: var(--bg-primary);
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
    cursor: pointer;
    position: relative;
}
.comunicacao-item:hover {
    border-color: var(--color-aurora);
    transform: translateX(4px);
    box-shadow: var(--glass-shadow);
}

.comunicacao-status {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    min-width: 50px;
    flex-shrink: 0;
}
.comunicacao-status .tipo-icon {
    width: 42px;
    height: 42px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.comunicacao-conteudo {
    flex: 1;
    min-width: 0;
}
.comunicacao-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 4px;
}
.comunicacao-header .comunicacao-tipo {
    font-size: var(--text-xs);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
.comunicacao-header .comunicacao-data {
    font-size: var(--text-xs);
    color: var(--text-muted);
}
.comunicacao-titulo {
    font-size: var(--text-body);
    color: var(--text-primary);
    margin-bottom: 2px;
}
.comunicacao-texto {
    font-size: var(--text-sm);
    color: var(--text-muted);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 4px;
}
.comunicacao-footer {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    align-items: center;
}
.comunicacao-footer .canal-badge {
    font-size: 0.55rem;
    padding: 2px 10px;
    border-radius: var(--radius-full);
    border: 1px solid;
    background: transparent;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.comunicacao-footer .anexos-badge,
.comunicacao-footer .media-badge {
    font-size: 0.55rem;
    padding: 2px 8px;
    border-radius: var(--radius-full);
    background: var(--bg-input);
    color: var(--text-muted);
    border: 1px solid var(--border-color);
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.comunicacao-footer .metricas-badge {
    font-size: 0.55rem;
    color: var(--text-muted);
    margin-left: auto;
}

/* ===== PAGINAÇÃO ===== */
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
    background: rgba(108,43,217,0.04);
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

/* ===== EMPTY STATE ===== */
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
    margin: 0 auto;
}

/* ===== MODAL ===== */
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
    background: rgba(0,0,0,0.5);
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

/* ===== TIPO SELECTOR ===== */
.tipo-selector {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}
.tipo-option {
    padding: 12px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    text-align: center;
    cursor: pointer;
    transition: var(--transition-smooth);
    background: var(--bg-input);
}
.tipo-option:hover {
    border-color: var(--color-aurora);
    transform: translateY(-2px);
}
.tipo-option.selected {
    border-color: var(--color-aurora);
    background: rgba(108,43,217,0.08);
    box-shadow: 0 0 0 3px rgba(108,43,217,0.1);
}
.tipo-option i {
    font-size: 1.5rem;
    display: block;
    margin-bottom: 4px;
}
.tipo-option span {
    font-size: var(--text-sm);
    font-weight: 600;
    display: block;
    color: var(--text-primary);
}
.tipo-option small {
    font-size: var(--text-xs);
    color: var(--text-muted);
    display: block;
    margin-top: 2px;
}

/* ===== CANAL SELECTOR ===== */
.canal-selector {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}
.canal-option {
    padding: 8px 16px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-sm);
    cursor: pointer;
    transition: var(--transition-smooth);
    background: var(--bg-input);
    display: flex;
    align-items: center;
    gap: 8px;
}
.canal-option:hover {
    transform: translateY(-2px);
}
.canal-option.selected {
    border-width: 2px;
    background: rgba(108,43,217,0.06);
    box-shadow: 0 0 0 3px rgba(108,43,217,0.08);
}
.canal-option i {
    font-size: 1rem;
}
.canal-option span {
    font-size: var(--text-sm);
    color: var(--text-primary);
}

/* ===== MÍDIA ===== */
.midia-upload-area {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}
.midia-option {
    flex: 1;
    min-width: 150px;
    padding: 20px;
    border: 2px dashed var(--border-color);
    border-radius: var(--radius-md);
    text-align: center;
    cursor: pointer;
    transition: var(--transition-smooth);
    background: var(--bg-input);
}
.midia-option:hover {
    border-color: var(--color-aurora);
    background: rgba(108,43,217,0.04);
}
.midia-option i {
    font-size: 2rem;
    display: block;
    margin-bottom: 8px;
    color: var(--text-muted);
}
.midia-option span {
    font-size: var(--text-sm);
    font-weight: 500;
    display: block;
    color: var(--text-primary);
}
.midia-option small {
    font-size: var(--text-xs);
    color: var(--text-muted);
}
.midia-option.video-option:hover {
    border-color: #FF6B6B;
}
.midia-option.video-option i {
    color: #FF6B6B;
}

/* ===== VIDEO LINK INPUT ===== */
.video-link-input {
    display: flex;
    gap: 8px;
    align-items: center;
    background: var(--bg-input);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-sm);
    padding: 4px 4px 4px 12px;
    transition: var(--transition-smooth);
}
.video-link-input:focus-within {
    border-color: var(--color-aurora);
    box-shadow: 0 0 0 3px rgba(108,43,217,0.08);
}
.video-link-input i {
    color: var(--text-muted);
    font-size: 0.9rem;
}
.video-link-input .form-control {
    border: none;
    padding: 6px 0;
    background: transparent;
}
.video-link-input .form-control:focus {
    box-shadow: none;
}
.video-link-input .btn {
    flex-shrink: 0;
}

.preview-content {
    position: relative;
    border-radius: var(--radius-sm);
    overflow: hidden;
    background: var(--bg-input);
}
.btn-remove-midia {
    position: absolute;
    top: 8px;
    right: 8px;
    z-index: 2;
    width: 28px;
    height: 28px;
    padding: 0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ===== DETALHE DA COMUNICAÇÃO ===== */
.com-detalhe-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: var(--space-md);
}
.com-tipo-badge {
    padding: 4px 14px;
    border-radius: var(--radius-full);
    font-weight: 600;
    font-size: var(--text-sm);
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.com-detalhe-canal {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 14px;
    border: 1px solid;
    border-radius: var(--radius-sm);
    background: var(--bg-input);
    flex-wrap: wrap;
    margin-bottom: var(--space-md);
}
.com-detalhe-canal .com-data,
.com-detalhe-canal .com-stats {
    font-size: var(--text-xs);
    color: var(--text-muted);
}
.com-detalhe-canal .com-stats {
    margin-left: auto;
}
.com-titulo {
    font-family: var(--font-title);
    font-size: var(--text-h3);
    color: var(--text-primary);
    margin-bottom: var(--space-sm);
}
.com-conteudo {
    padding: var(--space-md) 0;
    border-top: 1px solid var(--border-color);
    border-bottom: 1px solid var(--border-color);
}
.com-conteudo p {
    font-size: var(--text-body);
    color: var(--text-secondary);
    line-height: 1.8;
    margin: 0;
    white-space: pre-wrap;
}
.com-media {
    margin: var(--space-md) 0;
}
.com-anexos {
    margin: var(--space-md) 0;
}
.com-anexos .anexos-list {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-top: 6px;
}
.com-anexos .anexo-item {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    background: var(--bg-input);
    border-radius: var(--radius-sm);
    border: 1px solid var(--border-color);
    font-size: var(--text-sm);
}
.com-footer-info {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: var(--space-md);
    padding-top: var(--space-md);
    border-top: 1px solid var(--border-color);
}
.com-footer-info small {
    color: var(--text-muted);
    font-size: var(--text-xs);
}
.com-footer-info small i {
    margin-right: 4px;
}

/* ===== FORMULÁRIO ===== */
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
    box-shadow: 0 0 0 3px rgba(108,43,217,0.08);
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

/* ===== TOAST ===== */
.toast-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 100000;
    display: flex;
    flex-direction: column;
    gap: 8px;
    max-width: 380px;
    width: 100%;
}
.toast {
    background: var(--toast-bg);
    backdrop-filter: blur(10px);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-md);
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    box-shadow: var(--glass-shadow);
    transform: translateX(100%);
    opacity: 0;
    transition: all 0.3s ease;
    animation: slideInToast 0.4s ease forwards;
}
.toast .toast-content {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
}
.toast .toast-content i {
    font-size: 1.2rem;
}
.toast .toast-content span {
    font-size: var(--text-sm);
    color: var(--text-primary);
}
.toast .toast-close {
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 1.2rem;
    cursor: pointer;
    padding: 0 4px;
    transition: var(--transition-smooth);
}
.toast .toast-close:hover {
    color: var(--text-primary);
}
.toast-success { border-left: 4px solid #00FFA3; }
.toast-error { border-left: 4px solid #FF6B6B; }
.toast-warning { border-left: 4px solid #F59E0B; }
.toast-info { border-left: 4px solid #00D2FF; }

@keyframes slideInToast {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

/* ===== ANIMAÇÕES ===== */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}
.animate-fade-up {
    animation: fadeUp 0.5s ease forwards;
    opacity: 0;
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ============================================
   RESPONSIVIDADE
   ============================================ */
@media (max-width: 1024px) {
    .filter-bar-admin {
        flex-direction: column;
        align-items: stretch;
    }
    .filter-bar-admin .filter-group {
        width: 100%;
        flex-direction: column;
        align-items: stretch;
        gap: 4px;
    }
    .filter-bar-admin select, .filter-bar-admin input {
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
    .tipo-selector {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr 1fr;
        gap: var(--space-sm);
    }
    .stat-card .value {
        font-size: var(--text-h3);
    }
    .comunicacoes-container {
        padding: var(--space-md);
    }
    .comunicacao-item {
        flex-direction: column;
        align-items: stretch;
        gap: var(--space-sm);
        padding: var(--space-sm);
    }
    .comunicacao-status {
        flex-direction: row;
        gap: var(--space-sm);
        min-width: auto;
    }
    .comunicacao-footer {
        flex-direction: column;
        align-items: flex-start;
    }
    .comunicacao-footer .metricas-badge {
        margin-left: 0;
    }
    .modal-content {
        width: 95%;
        margin: 10px;
    }
    .com-detalhe-header {
        flex-direction: column;
        align-items: flex-start;
    }
    .com-detalhe-canal {
        flex-direction: column;
        align-items: flex-start;
    }
    .com-detalhe-canal .com-stats {
        margin-left: 0;
    }
    .header-actions {
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
    }
    .canal-selector {
        flex-direction: column;
    }
    .midia-upload-area {
        flex-direction: column;
    }
    .video-link-input {
        flex-wrap: wrap;
    }
    .video-link-input .btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    .comunicacoes-container {
        padding: var(--space-sm);
        border-radius: var(--radius-md);
    }
    .comunicacao-item {
        padding: var(--space-sm);
    }
    .tipo-selector {
        grid-template-columns: 1fr 1fr;
        gap: 6px;
    }
    .tipo-option {
        padding: 8px;
    }
    .tipo-option i {
        font-size: 1.2rem;
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
        justify-content: center;
    }
}
</style>

</body>
</html>