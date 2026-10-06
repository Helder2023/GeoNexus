<?php
// painel/admin/blog-artigo.php - Visualizar Artigo do Blog
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Visualizar Artigo';
$pagina_atual = 'blog';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;



// Simulando o ID recebido via GET
$artigo_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Artigo (usando o artigo com ID 1 como exemplo)
$artigo_data = [
    'id' => $artigo_id,
    'titulo' => 'Como a Topografia Está Revolucionando a Construção Civil em Angola',
    'slug' => 'topografia-revolucionando-construcao-civil-angola',
    'resumo' => 'A topografia moderna está transformando a forma como projetamos e construímos em Angola, trazendo mais precisão e eficiência para as obras.',
    'conteudo' => '
        <p>A topografia é uma ciência milenar que evoluiu significativamente nas últimas décadas, especialmente com o advento de tecnologias como GNSS, drones e softwares de modelagem 3D. Em Angola, essa evolução está transformando radicalmente o setor da construção civil.</p>
        
        <h3>O Papel da Topografia Moderna</h3>
        <p>A topografia moderna vai muito além da simples medição de terrenos. Hoje, os topógrafos utilizam equipamentos de alta precisão que permitem:</p>
        <ul>
            <li>Levantamentos topográficos com precisão milimétrica</li>
            <li>Modelagem digital do terreno (MDT) para análise de viabilidade</li>
            <li>Monitoramento de estruturas em tempo real</li>
            <li>Planeamento de obras com redução de custos e desperdícios</li>
        </ul>

        <h3>Benefícios para a Construção Civil</h3>
        <p>A integração da topografia com a construção civil traz benefícios significativos:</p>
        <ul>
            <li><strong>Redução de custos:</strong> A precisão nos levantamentos evita retrabalhos e desperdícios</li>
            <li><strong>Maior eficiência:</strong> O planeamento detalhado permite otimizar recursos e prazos</li>
            <li><strong>Sustentabilidade:</strong> A minimização de impactos ambientais através de estudos precisos</li>
            <li><strong>Segurança:</strong> O monitoramento contínuo garante maior segurança nas obras</li>
        </ul>

        <h3>Tecnologias em Destaque</h3>
        <p>As principais tecnologias que estão revolucionando a topografia em Angola incluem:</p>
        <ul>
            <li><strong>GNSS (Sistemas Globais de Navegação por Satélite):</strong> Permite posicionamento com precisão centimétrica</li>
            <li><strong>Drones:</strong> Realizam levantamentos aéreos de grandes áreas em tempo recorde</li>
            <li><strong>LiDAR:</strong> Cria nuvens de pontos para modelagem 3D detalhada</li>
            <li><strong>BIM (Building Information Modeling):</strong> Integra dados topográficos ao modelo digital da construção</li>
        </ul>

        <h3>Casos de Sucesso em Angola</h3>
        <p>Diversos projetos em Angola já estão colhendo os frutos da topografia moderna, como:</p>
        <ul>
            <li><strong>Luanda Sul:</strong> Levantamento topográfico detalhado para urbanização de 120 hectares</li>
            <li><strong>Via Expressa:</strong> Estudo de tráfego e mobilidade utilizando dados topográficos</li>
            <li><strong>Barragem do Capanda:</strong> Inspeção com drones para monitoramento de estruturas</li>
        </ul>

        <h3>O Futuro da Topografia</h3>
        <p>O futuro da topografia em Angola é promissor, com a adoção cada vez maior de tecnologias como inteligência artificial, machine learning e realidade aumentada. Essas inovações prometem tornar os levantamentos ainda mais precisos e eficientes, impulsionando o desenvolvimento do setor da construção civil no país.</p>
        
        <blockquote>
            "A topografia moderna é a base para uma construção civil mais inteligente, sustentável e eficiente em Angola."
            <cite>— Carlos Mendes, Engenheiro Topógrafo</cite>
        </blockquote>
    ',
    'categoria' => 'Topografia',
    'tags' => ['Topografia', 'Construção Civil', 'Inovação', 'Tecnologia'],
    'autor' => 'Carlos Mendes',
    'autor_avatar' => 'avatar-1.png',
    'autor_cargo' => 'Engenheiro Topógrafo',
    'autor_bio' => 'Engenheiro Topógrafo com mais de 10 anos de experiência em projetos de grande porte em Angola. Especialista em levantamentos topográficos, GNSS e modelagem 3D.',
    'data_publicacao' => '2026-02-15 10:00:00',
    'data_atualizacao' => '2026-02-18 14:20:00',
    'status' => 'publicado',
    'status_label' => 'Publicado',
    'visualizacoes' => 1234,
    'comentarios' => 23,
    'imagem_destaque' => 'blog-1.jpg',
    'video_url' => '',
    'tipo_midia' => 'imagem',
    'destaque' => true,
    'artigos_relacionados' => [
        ['id' => 2, 'titulo' => 'GIS: A Ferramenta Essencial para Gestão de Recursos Naturais', 'imagem' => 'blog-2.jpg', 'categoria' => 'GIS'],
        ['id' => 3, 'titulo' => 'Agricultura de Precisão: O Futuro da Produção Alimentar em Angola', 'imagem' => 'blog-3.jpg', 'categoria' => 'Agricultura de Precisão'],
        ['id' => 5, 'titulo' => 'Mineração Sustentável: Como a Tecnologia Está Mudando o Setor', 'imagem' => 'blog-5.jpg', 'categoria' => 'Mineração']
    ],
    'comentarios_lista' => [
        [
            'autor' => 'João Silva',
            'avatar' => 'avatar-1.png',
            'data' => '2026-02-16 08:30:00',
            'texto' => 'Excelente artigo! Muito esclarecedor sobre como a topografia está evoluindo em Angola.',
            'respostas' => [
                ['autor' => 'Carlos Mendes', 'avatar' => 'avatar-1.png', 'data' => '2026-02-16 10:00:00', 'texto' => 'Obrigado pelo comentário! A topografia realmente está em constante evolução.']
            ]
        ],
        [
            'autor' => 'Maria Santos',
            'avatar' => 'avatar-2.png',
            'data' => '2026-02-17 14:20:00',
            'texto' => 'Parabéns pelo conteúdo! Gostaria de saber mais sobre as tecnologias mencionadas.',
            'respostas' => []
        ],
        [
            'autor' => 'Pedro Costa',
            'avatar' => 'avatar-3.png',
            'data' => '2026-02-18 09:15:00',
            'texto' => 'Muito interessante. Como posso aplicar essas técnicas no meu projeto atual?',
            'respostas' => [
                ['autor' => 'Carlos Mendes', 'avatar' => 'avatar-1.png', 'data' => '2026-02-18 11:30:00', 'texto' => 'Recomendo começar com um levantamento GNSS e depois integrar os dados ao BIM. Posso ajudar se precisar.']
            ]
        ]
    ]
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

// Função para gerar avatar fallback
function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6C2BD9&color=fff&size=80';
}

// Função para formatar data/hora
function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y \à\s H:i', strtotime($datetime));
}

// Função para verificar se é vídeo
function isVideoUrl($url) {
    if (empty($url)) return false;
    $video_patterns = ['youtube.com/embed/', 'youtu.be/', 'vimeo.com/', 'player.vimeo.com/'];
    foreach ($video_patterns as $pattern) {
        if (strpos($url, $pattern) !== false) return true;
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
                            <span class="badge"><?php echo $total_usuarios; ?></span>
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
                        <i class="fas fa-newspaper icon"></i>
                        Visualizar Artigo
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="blog.php">Blog</a>
                        <span class="separator">/</span>
                        <span><?php echo safeValue($artigo_data['titulo']); ?></span>
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
                        <a href="blog.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <a href="blog-editar.php?id=<?php echo $artigo_data['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                                
                    </div>
                </div>
            </header>

            <!-- ===== CONTEÚDO DO ARTIGO ===== -->
            <div class="artigo-visualizar-container">

                <!-- ===== ARTIGO PRINCIPAL ===== -->
                <div class="artigo-principal animate-fade-up">

                    <!-- ===== CABEÇALHO ===== -->
                    <div class="artigo-cabecalho">
                        <div class="artigo-categoria">
                            <span class="categoria-badge"><?php echo safeValue($artigo_data['categoria']); ?></span>
                            <?php if ($artigo_data['destaque']): ?>
                                <span class="destaque-badge"><i class="fas fa-star"></i> Destaque</span>
                            <?php endif; ?>
                            <span class="status-badge status-<?php echo $artigo_data['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $artigo_data['status_label']; ?>
                            </span>
                        </div>
                        <h1><?php echo safeValue($artigo_data['titulo']); ?></h1>
                        <div class="artigo-meta-principal">
                            <span class="meta-item">
                                <i class="fas fa-user"></i> <?php echo safeValue($artigo_data['autor']); ?>
                            </span>
                            <span class="meta-item">
                                <i class="far fa-calendar-alt"></i> Publicado em <?php echo date('d/m/Y', strtotime($artigo_data['data_publicacao'])); ?>
                            </span>
                            <span class="meta-item">
                                <i class="far fa-clock"></i> Atualizado em <?php echo date('d/m/Y H:i', strtotime($artigo_data['data_atualizacao'])); ?>
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-eye"></i> <?php echo $artigo_data['visualizacoes']; ?> visualizações
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-comment"></i> <?php echo $artigo_data['comentarios']; ?> comentários
                            </span>
                        </div>
                    </div>

                    <!-- ===== IMAGEM/VÍDEO DE DESTAQUE ===== -->
                    <div class="artigo-midia-destaque">
                        <?php if ($artigo_data['tipo_midia'] === 'video' && !empty($artigo_data['video_url'])): ?>
                            <div class="video-container">
                                <iframe src="<?php echo safeValue($artigo_data['video_url']); ?>" 
                                        frameborder="0" 
                                        allowfullscreen
                                        loading="lazy">
                                </iframe>
                            </div>
                            <div class="midia-legend">
                                <i class="fas fa-video"></i> Vídeo do artigo
                            </div>
                        <?php else: ?>
                            <img src="../../assets/images/<?php echo safeValue($artigo_data['imagem_destaque'], 'blog-default.jpg'); ?>" 
                                 alt="<?php echo safeValue($artigo_data['titulo']); ?>"
                                 onerror="this.src='https://picsum.photos/seed/<?php echo $artigo_data['id']; ?>/1200/600'">
                            <div class="midia-legend">
                                <i class="fas fa-image"></i> Imagem de destaque do artigo
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- ===== RESUMO ===== -->
                    <div class="artigo-resumo-destaque">
                        <p><?php echo safeValue($artigo_data['resumo']); ?></p>
                    </div>

                    <!-- ===== CONTEÚDO ===== -->
                    <div class="artigo-conteudo">
                        <?php echo $artigo_data['conteudo']; ?>
                    </div>

                    <!-- ===== TAGS ===== -->
                    <div class="artigo-tags-principal">
                        <?php foreach ($artigo_data['tags'] as $tag): ?>
                            <a href="blog.php?tag=<?php echo urlencode($tag); ?>" class="tag-item">#<?php echo $tag; ?></a>
                        <?php endforeach; ?>
                    </div>

                    <!-- ===== AUTOR ===== -->
                    <div class="artigo-autor-card">
                        <div class="autor-avatar">
                            <img src="../../assets/images/<?php echo safeValue($artigo_data['autor_avatar'], 'avatar-default.png'); ?>" 
                                 alt="<?php echo safeValue($artigo_data['autor']); ?>"
                                 onerror="this.src='<?php echo getAvatarUrl($artigo_data['autor']); ?>'">
                        </div>
                        <div class="autor-info">
                            <h4><?php echo safeValue($artigo_data['autor']); ?></h4>
                            <span class="autor-cargo"><?php echo safeValue($artigo_data['autor_cargo']); ?></span>
                            <p><?php echo safeValue($artigo_data['autor_bio']); ?></p>
                        </div>
                    </div>

                    <!-- ===== SHARE ===== -->
                    <div class="artigo-share">
                        <span class="share-label"><i class="fas fa-share-alt"></i> Compartilhar:</span>
                        <div class="share-buttons">
                            <button class="share-btn facebook" onclick="shareArticle('facebook')"><i class="fab fa-facebook-f"></i></button>
                            <button class="share-btn twitter" onclick="shareArticle('twitter')"><i class="fab fa-twitter"></i></button>
                            <button class="share-btn linkedin" onclick="shareArticle('linkedin')"><i class="fab fa-linkedin-in"></i></button>
                            <button class="share-btn whatsapp" onclick="shareArticle('whatsapp')"><i class="fab fa-whatsapp"></i></button>
                            <button class="share-btn copy" onclick="copyLink()"><i class="fas fa-link"></i></button>
                        </div>
                    </div>

                    <!-- ===== COMENTÁRIOS ===== -->
                    <div class="artigo-comentarios">
                        <h3><i class="fas fa-comments"></i> Comentários (<?php echo $artigo_data['comentarios']; ?>)</h3>

                        <?php foreach ($artigo_data['comentarios_lista'] as $comentario): ?>
                            <div class="comentario-item">
                                <div class="comentario-avatar">
                                    <img src="../../assets/images/<?php echo safeValue($comentario['avatar'], 'avatar-default.png'); ?>" 
                                         alt="<?php echo safeValue($comentario['autor']); ?>"
                                         onerror="this.src='<?php echo getAvatarUrl($comentario['autor']); ?>'">
                                </div>
                                <div class="comentario-conteudo">
                                    <div class="comentario-header">
                                        <span class="comentario-autor"><?php echo safeValue($comentario['autor']); ?></span>
                                        <span class="comentario-data"><?php echo formatDateTime($comentario['data']); ?></span>
                                    </div>
                                    <p><?php echo safeValue($comentario['texto']); ?></p>
                                    
                                    <?php if (!empty($comentario['respostas'])): ?>
                                        <div class="comentario-respostas">
                                            <?php foreach ($comentario['respostas'] as $resposta): ?>
                                                <div class="comentario-item resposta">
                                                    <div class="comentario-avatar">
                                                        <img src="../../assets/images/<?php echo safeValue($resposta['avatar'], 'avatar-default.png'); ?>" 
                                                             alt="<?php echo safeValue($resposta['autor']); ?>"
                                                             onerror="this.src='<?php echo getAvatarUrl($resposta['autor']); ?>'">
                                                    </div>
                                                    <div class="comentario-conteudo">
                                                        <div class="comentario-header">
                                                            <span class="comentario-autor"><?php echo safeValue($resposta['autor']); ?> <span class="autor-badge">Autor</span></span>
                                                            <span class="comentario-data"><?php echo formatDateTime($resposta['data']); ?></span>
                                                        </div>
                                                        <p><?php echo safeValue($resposta['texto']); ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <!-- ===== SIDEBAR - ARTIGOS RELACIONADOS ===== -->
                <div class="artigo-sidebar animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="sidebar-card">
                        <h3><i class="fas fa-fire"></i> Artigos Relacionados</h3>
                        <?php foreach ($artigo_data['artigos_relacionados'] as $relacionado): ?>
                            <a href="blog-artigo.php?id=<?php echo $relacionado['id']; ?>" class="artigo-relacionado">
                                <div class="relacionado-imagem">
                                    <img src="../../assets/images/<?php echo safeValue($relacionado['imagem'], 'blog-default.jpg'); ?>" 
                                         alt="<?php echo safeValue($relacionado['titulo']); ?>"
                                         onerror="this.src='https://picsum.photos/seed/<?php echo $relacionado['id']; ?>/100/80'">
                                </div>
                                <div class="relacionado-info">
                                    <span class="relacionado-categoria"><?php echo safeValue($relacionado['categoria']); ?></span>
                                    <h4><?php echo safeValue($relacionado['titulo']); ?></h4>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="sidebar-card">
                        <h3><i class="fas fa-tags"></i> Tags</h3>
                        <div class="tags-cloud">
                            <?php foreach ($artigo_data['tags'] as $tag): ?>
                                <a href="blog.php?tag=<?php echo urlencode($tag); ?>" class="tag-cloud-item">#<?php echo $tag; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </main>
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
        // SHARE FUNCTIONS
        // ==========================================

        function shareArticle(platform) {
            const url = window.location.href;
            const title = '<?php echo addslashes($artigo_data['titulo']); ?>';
            let shareUrl = '';

            switch(platform) {
                case 'facebook':
                    shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url);
                    break;
                case 'twitter':
                    shareUrl = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(title);
                    break;
                case 'linkedin':
                    shareUrl = 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(url);
                    break;
                case 'whatsapp':
                    shareUrl = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(title + ' - ' + url);
                    break;
            }

            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=500');
            }
        }

        function copyLink() {
            const url = window.location.href;
            if (navigator.clipboard) {
                navigator.clipboard.writeText(url).then(() => {
                    mostrarToast('Link copiado para a área de transferência!', 'success');
                }).catch(() => {
                    fallbackCopyLink(url);
                });
            } else {
                fallbackCopyLink(url);
            }
        }

        function fallbackCopyLink(url) {
            const textarea = document.createElement('textarea');
            textarea.value = url;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            mostrarToast('Link copiado para a área de transferência!', 'success');
        }

        // ==========================================
        // MODAIS
        // ==========================================

        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal.active').forEach(modal => {
                    fecharModal(modal.id);
                });
            }
        });
    </script>

    <style>
        /* ========================================== */
        /* VISUALIZAR ARTIGO - CSS COMPLETO           */
        /* ========================================== */

        .artigo-visualizar-container {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: var(--space-lg);
        }

        /* ===== ARTIGO PRINCIPAL ===== */
        .artigo-principal {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .artigo-principal:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== CABEÇALHO ===== */
        .artigo-cabecalho {
            margin-bottom: var(--space-lg);
        }

        .artigo-categoria {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            margin-bottom: var(--space-sm);
        }

        .categoria-badge {
            background: var(--color-aurora);
            color: #FFFFFF;
            padding: 2px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .destaque-badge {
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .destaque-badge i {
            margin-right: 4px;
        }

        .artigo-cabecalho h1 {
            font-family: var(--font-display);
            font-size: var(--text-h1);
            color: var(--text-primary);
            margin: var(--space-sm) 0;
            line-height: 1.2;
        }

        .artigo-meta-principal {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-md);
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
        }

        .artigo-meta-principal .meta-item {
            font-size: var(--text-sm);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .artigo-meta-principal .meta-item i {
            font-size: 0.8rem;
            color: var(--color-aurora);
        }

        /* ===== MÍDIA DE DESTAQUE ===== */
        .artigo-midia-destaque {
            margin: var(--space-lg) 0;
            border-radius: var(--radius-md);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .artigo-midia-destaque img {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: cover;
        }

        .artigo-midia-destaque .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            background: #0A1628;
        }

        .artigo-midia-destaque .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .midia-legend {
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            font-size: var(--text-sm);
            color: var(--text-muted);
            text-align: center;
            border-top: 1px solid var(--border-color);
        }

        .midia-legend i {
            margin-right: 4px;
            color: var(--color-aurora);
        }

        /* ===== RESUMO ===== */
        .artigo-resumo-destaque {
            background: var(--bg-input);
            padding: var(--space-lg);
            border-radius: var(--radius-md);
            margin: var(--space-lg) 0;
            border-left: 4px solid var(--color-aurora);
        }

        .artigo-resumo-destaque p {
            font-size: var(--text-body);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
            font-style: italic;
        }

        /* ===== CONTEÚDO ===== */
        .artigo-conteudo {
            margin: var(--space-lg) 0;
        }

        .artigo-conteudo h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin: var(--space-lg) 0 var(--space-sm) 0;
        }

        .artigo-conteudo h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: var(--space-md) 0 var(--space-sm) 0;
        }

        .artigo-conteudo p {
            font-size: var(--text-body);
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: var(--space-md);
        }

        .artigo-conteudo ul {
            margin: var(--space-sm) 0 var(--space-md) var(--space-lg);
        }

        .artigo-conteudo ul li {
            font-size: var(--text-body);
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: var(--space-xs);
        }

        .artigo-conteudo blockquote {
            background: var(--bg-input);
            padding: var(--space-lg);
            border-radius: var(--radius-md);
            border-left: 4px solid var(--color-aurora);
            margin: var(--space-lg) 0;
        }

        .artigo-conteudo blockquote p {
            font-size: var(--text-body);
            color: var(--text-secondary);
            font-style: italic;
            margin-bottom: var(--space-sm);
        }

        .artigo-conteudo blockquote cite {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-style: normal;
        }

        /* ===== TAGS ===== */
        .artigo-tags-principal {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-sm);
            margin: var(--space-lg) 0;
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .artigo-tags-principal .tag-item {
            padding: 4px 12px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            font-size: var(--text-sm);
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .artigo-tags-principal .tag-item:hover {
            border-color: var(--color-aurora);
            color: var(--color-aurora);
            background: rgba(108, 43, 217, 0.04);
        }

        /* ===== AUTOR CARD ===== */
        .artigo-autor-card {
            display: flex;
            gap: var(--space-lg);
            padding: var(--space-lg);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            margin: var(--space-lg) 0;
            border: 1px solid var(--border-color);
        }

        .artigo-autor-card .autor-avatar {
            flex-shrink: 0;
        }

        .artigo-autor-card .autor-avatar img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border-color);
        }

        .artigo-autor-card .autor-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 2px 0;
        }

        .artigo-autor-card .autor-info .autor-cargo {
            font-size: var(--text-sm);
            color: var(--text-muted);
            display: block;
            margin-bottom: var(--space-sm);
        }

        .artigo-autor-card .autor-info p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.5;
            margin: 0;
        }

        /* ===== SHARE ===== */
        .artigo-share {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-lg) 0;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .artigo-share .share-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .artigo-share .share-label i {
            margin-right: 4px;
        }

        .share-buttons {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .share-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            color: #FFFFFF;
            cursor: pointer;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .share-btn.facebook { background: #1877F2; }
        .share-btn.twitter { background: #000000; }
        .share-btn.linkedin { background: #0A66C2; }
        .share-btn.whatsapp { background: #25D366; }
        .share-btn.copy { background: var(--color-aurora); }

        /* ===== COMENTÁRIOS ===== */
        .artigo-comentarios {
            margin-top: var(--space-lg);
        }

        .artigo-comentarios h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin-bottom: var(--space-lg);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .artigo-comentarios h3 i {
            color: var(--color-aurora);
        }

        .comentario-item {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md) 0;
            border-bottom: 1px solid var(--border-color);
        }

        .comentario-item:last-child {
            border-bottom: none;
        }

        .comentario-item .comentario-avatar {
            flex-shrink: 0;
        }

        .comentario-item .comentario-avatar img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .comentario-item .comentario-conteudo {
            flex: 1;
        }

        .comentario-item .comentario-header {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-sm);
            align-items: center;
            margin-bottom: var(--space-xs);
        }

        .comentario-item .comentario-autor {
            font-weight: 600;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .comentario-item .comentario-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comentario-item .comentario-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        .comentario-item .autor-badge {
            background: var(--color-aurora);
            color: #FFFFFF;
            padding: 1px 8px;
            border-radius: var(--radius-full);
            font-size: 0.6rem;
            font-weight: 500;
        }

        .comentario-respostas {
            margin-top: var(--space-md);
            padding-left: var(--space-lg);
            border-left: 2px solid var(--border-color);
        }

        .comentario-item.resposta {
            padding: var(--space-sm) 0;
            border-bottom: none;
        }

        .comentario-item.resposta .comentario-avatar img {
            width: 30px;
            height: 30px;
        }

        /* ========================================== */
        /* SIDEBAR                                    */
        /* ========================================== */

        .artigo-sidebar {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        .sidebar-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .sidebar-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .sidebar-card h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .sidebar-card h3 i {
            color: var(--color-aurora);
        }

        /* ===== ARTIGOS RELACIONADOS ===== */
        .artigo-relacionado {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-sm) 0;
            border-bottom: 1px solid var(--border-color);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .artigo-relacionado:last-child {
            border-bottom: none;
        }

        .artigo-relacionado:hover {
            transform: translateX(4px);
        }

        .artigo-relacionado .relacionado-imagem {
            flex-shrink: 0;
            width: 70px;
            height: 56px;
            border-radius: var(--radius-sm);
            overflow: hidden;
        }

        .artigo-relacionado .relacionado-imagem img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .artigo-relacionado .relacionado-info {
            flex: 1;
            min-width: 0;
        }

        .artigo-relacionado .relacionado-categoria {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: block;
        }

        .artigo-relacionado .relacionado-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-sm);
            color: var(--text-primary);
            margin: 2px 0 0 0;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ===== TAGS CLOUD ===== */
        .tags-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .tag-cloud-item {
            padding: 4px 12px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            font-size: var(--text-sm);
            color: var(--text-secondary);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

        .tag-cloud-item:hover {
            border-color: var(--color-aurora);
            color: var(--color-aurora);
            background: rgba(108, 43, 217, 0.04);
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

        .status-publicado {
            background: rgba(0, 255, 163, 0.12);
            color: var(--color-future-green);
        }

        .status-publicado .status-dot {
            background: var(--color-future-green);
        }

        .status-rascunho {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .status-rascunho .status-dot {
            background: #FFD93D;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .artigo-visualizar-container {
                grid-template-columns: 1fr;
            }

            .artigo-sidebar {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: var(--space-lg);
            }
        }

        @media (max-width: 768px) {
            .artigo-principal {
                padding: var(--space-md);
            }

            .artigo-sidebar {
                grid-template-columns: 1fr;
            }

            .artigo-cabecalho h1 {
                font-size: var(--text-h2);
            }

            .artigo-meta-principal {
                gap: var(--space-sm);
            }

            .artigo-meta-principal .meta-item {
                font-size: var(--text-xs);
            }

            .artigo-autor-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .artigo-share {
                flex-direction: column;
                align-items: center;
                gap: var(--space-sm);
            }

            .comentario-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .comentario-item .comentario-header {
                justify-content: center;
            }

            .comentario-respostas {
                padding-left: var(--space-sm);
                margin-left: 0;
            }

            .comentario-item.resposta {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .artigo-midia-destaque img {
                max-height: 300px;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .artigo-resumo-destaque {
                padding: var(--space-md);
            }

            .artigo-conteudo ul {
                margin-left: var(--space-md);
            }
        }

        @media (max-width: 480px) {
            .artigo-principal {
                padding: var(--space-sm);
            }

            .artigo-cabecalho h1 {
                font-size: var(--text-h3);
            }

            .artigo-midia-destaque img {
                max-height: 200px;
            }

            .artigo-autor-card .autor-avatar img {
                width: 50px;
                height: 50px;
            }

            .share-btn {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }

            .comentario-item .comentario-avatar img {
                width: 32px;
                height: 32px;
            }

            .artigo-relacionado .relacionado-imagem {
                width: 60px;
                height: 48px;
            }

            .artigo-conteudo blockquote {
                padding: var(--space-md);
            }

            .artigo-resumo-destaque {
                padding: var(--space-sm);
            }

            .artigo-conteudo ul {
                margin-left: var(--space-sm);
                padding-left: var(--space-sm);
            }
        }
    </style>

</body>
</html>