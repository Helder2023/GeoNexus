<?php
// painel/admin/blog-editar.php - Editar Artigo do Blog
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Editar Artigo';
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

// Dados mockados - Artigo para edição
$artigo_data = [
    'id' => $artigo_id,
    'titulo' => 'Como a Topografia Está Revolucionando a Construção Civil em Angola',
    'slug' => 'topografia-revolucionando-construcao-civil-angola',
    'resumo' => 'A topografia moderna está transformando a forma como projetamos e construímos em Angola, trazendo mais precisão e eficiência para as obras.',
    'conteudo' => '<p>A topografia é uma ciência milenar que evoluiu significativamente nas últimas décadas, especialmente com o advento de tecnologias como GNSS, drones e softwares de modelagem 3D. Em Angola, essa evolução está transformando radicalmente o setor da construção civil.</p>

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

<h3>O Futuro da Topografia</h3>
<p>O futuro da topografia em Angola é promissor, com a adoção cada vez maior de tecnologias como inteligência artificial, machine learning e realidade aumentada.</p>

<blockquote>
    "A topografia moderna é a base para uma construção civil mais inteligente, sustentável e eficiente em Angola."
    <cite>— Carlos Mendes, Engenheiro Topógrafo</cite>
</blockquote>',
    'categoria' => 'Topografia',
    'tags' => 'Topografia, Construção Civil, Inovação, Tecnologia',
    'autor' => 'Carlos Mendes',
    'autor_cargo' => 'Engenheiro Topógrafo',
    'autor_bio' => 'Engenheiro Topógrafo com mais de 10 anos de experiência em projetos de grande porte em Angola. Especialista em levantamentos topográficos, GNSS e modelagem 3D.',
    'data_publicacao' => '2026-02-15 10:00:00',
    'status' => 'publicado',
    'status_label' => 'Publicado',
    'imagem_destaque' => 'blog-1.jpg',
    'video_url' => '',
    'tipo_midia' => 'imagem',
    'destaque' => true,
    'autor_avatar' => 'avatar-1.png'
];

// Categorias disponíveis
$categorias = [
    'Topografia',
    'Engenharia Civil',
    'GIS',
    'Agricultura de Precisão',
    'Mineração',
    'Petróleo & Gás',
    'Energia',
    'Urbanismo',
    'Transportes',
    'Drones',
    'Educação'
];

// Status disponíveis
$status_opcoes = [
    'rascunho' => 'Rascunho',
    'publicado' => 'Publicado'
];

// Função para exibir valor de forma segura
function safeValue($value, $default = '')
{
    if ($value === null || $value === '') {
        return $default;
    }
    if (is_array($value)) {
        return $default;
    }
    return htmlspecialchars((string)$value);
}

// Função para gerar avatar fallback
function getAvatarUrl($name)
{
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6C2BD9&color=fff&size=80';
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
                        <i class="fas fa-edit icon"></i>
                        Editar Artigo
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="blog.php">Blog</a>
                        <span class="separator">/</span>
                        <a href="blog-artigo.php?id=<?php echo $artigo_data['id']; ?>"><?php echo safeValue($artigo_data['titulo']); ?></a>
                        <span class="separator">/</span>
                        <span>Editar</span>
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
                        <a href="blog-artigo.php?id=<?php echo $artigo_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button type="submit" form="formEditarArtigo" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== CONTEÚDO ===== -->
            <div class="editar-artigo-container">

                <form id="formEditarArtigo" class="editar-form" onsubmit="return handleSubmit(event)">

                    <!-- ===== STATUS E DESTAQUE ===== -->
                    <div class="form-section animate-fade-up">
                        <h3><i class="fas fa-cog"></i> Status e Configurações</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="status">Status <span class="required">*</span></label>
                                <select id="status" name="status" class="form-control" required>
                                    <?php foreach ($status_opcoes as $value => $label): ?>
                                        <option value="<?php echo $value; ?>" <?php echo $artigo_data['status'] === $value ? 'selected' : ''; ?>>
                                            <?php echo $label; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="destaque">Destaque</label>
                                <select id="destaque" name="destaque" class="form-control">
                                    <option value="0" <?php echo $artigo_data['destaque'] ? '' : 'selected'; ?>>Não</option>
                                    <option value="1" <?php echo $artigo_data['destaque'] ? 'selected' : ''; ?>>Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="data_publicacao">Data de Publicação</label>
                                <input type="datetime-local" id="data_publicacao" name="data_publicacao" class="form-control"
                                    value="<?php echo date('Y-m-d\TH:i', strtotime($artigo_data['data_publicacao'])); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- ===== CONTEÚDO DO ARTIGO ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                        <h3><i class="fas fa-newspaper"></i> Conteúdo do Artigo</h3>
                        <div class="form-group">
                            <label for="titulo">Título <span class="required">*</span></label>
                            <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo safeValue($artigo_data['titulo']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug (URL Amigável)</label>
                            <div class="slug-preview">
                                <span class="slug-url">/blog/</span>
                                <input type="text" id="slug" name="slug" class="form-control slug-input" value="<?php echo safeValue($artigo_data['slug']); ?>" placeholder="url-amigavel-do-artigo">
                                <button type="button" class="btn btn-sm btn-outline" onclick="gerarSlug()">
                                    <i class="fas fa-sync-alt"></i> Gerar
                                </button>
                            </div>
                            <p class="form-help">O slug é a URL amigável do artigo. Deve conter apenas letras minúsculas, números e hífens.</p>
                        </div>
                        <div class="form-group">
                            <label for="resumo">Resumo <span class="required">*</span></label>
                            <textarea id="resumo" name="resumo" class="form-control" rows="3" required><?php echo safeValue($artigo_data['resumo']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="conteudo">Conteúdo <span class="required">*</span></label>
                            <textarea id="conteudo" name="conteudo" class="form-control" rows="12" required><?php echo safeValue($artigo_data['conteudo']); ?></textarea>
                            <p class="form-help">Use HTML para formatar o conteúdo. Tags suportadas: &lt;p&gt;, &lt;h3&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</p>
                        </div>
                    </div>

                    <!-- ===== CATEGORIA E TAGS ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                        <h3><i class="fas fa-tags"></i> Categoria e Tags</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="categoria">Categoria <span class="required">*</span></label>
                                <select id="categoria" name="categoria" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    <?php foreach ($categorias as $categoria): ?>
                                        <option value="<?php echo $categoria; ?>" <?php echo $artigo_data['categoria'] === $categoria ? 'selected' : ''; ?>>
                                            <?php echo $categoria; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input type="text" id="tags" name="tags" class="form-control" value="<?php echo safeValue($artigo_data['tags']); ?>" placeholder="Ex: Topografia, Construção, Inovação">
                                <p class="form-help">Separe as tags por vírgula.</p>
                            </div>
                        </div>
                    </div>

                    <!-- ===== AUTOR ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                        <h3><i class="fas fa-user"></i> Autor</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="autor">Nome do Autor <span class="required">*</span></label>
                                <input type="text" id="autor" name="autor" class="form-control" value="<?php echo safeValue($artigo_data['autor']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="autor_cargo">Cargo do Autor</label>
                                <input type="text" id="autor_cargo" name="autor_cargo" class="form-control" value="<?php echo safeValue($artigo_data['autor_cargo']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="autor_bio">Biografia do Autor</label>
                            <textarea id="autor_bio" name="autor_bio" class="form-control" rows="3"><?php echo safeValue($artigo_data['autor_bio']); ?></textarea>
                        </div>
                    </div>

                    <!-- ===== MÍDIA ===== -->
                    <div class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                        <h3><i class="fas fa-photo-video"></i> Mídia do Artigo</h3>
                        <p class="form-help" style="margin-bottom: var(--space-md);">Escolha entre imagem ou vídeo para o artigo</p>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="tipo_midia">Tipo de Mídia <span class="required">*</span></label>
                                <select id="tipo_midia" name="tipo_midia" class="form-control" onchange="toggleMidiaFields()" required>
                                    <option value="imagem" <?php echo $artigo_data['tipo_midia'] === 'imagem' ? 'selected' : ''; ?>>Imagem</option>
                                    <option value="video" <?php echo $artigo_data['tipo_midia'] === 'video' ? 'selected' : ''; ?>>Vídeo (YouTube/Vimeo)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Campo para Imagem -->
                        <div id="campoImagem" class="form-group" <?php echo $artigo_data['tipo_midia'] === 'video' ? 'style="display: none;"' : ''; ?>>
                            <label class="form-label">Imagem de Destaque</label>
                            <div class="upload-area" id="uploadArea">
                                <div class="upload-preview" id="uploadPreview">
                                    <?php if (!empty($artigo_data['imagem_destaque'])): ?>
                                        <img src="../../assets/images/<?php echo safeValue($artigo_data['imagem_destaque']); ?>" alt="Imagem atual">
                                        <button type="button" class="btn btn-sm btn-danger remove-image" onclick="removerImagem()">
                                            <i class="fas fa-times"></i> Remover
                                        </button>
                                    <?php else: ?>
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>Clique ou arraste uma imagem</p>
                                        <span>PNG, JPG, SVG até 5MB</span>
                                    <?php endif; ?>
                                </div>
                                <input type="file" id="imagem_artigo" name="imagem_artigo" accept="image/*" style="display: none;">
                                <button type="button" class="btn btn-outline btn-sm" onclick="document.getElementById('imagem_artigo').click();">
                                    <i class="fas fa-folder-open"></i> Selecionar Imagem
                                </button>
                            </div>
                            <p class="form-help">Formato atual: <?php echo safeValue($artigo_data['imagem_destaque'], 'Nenhuma imagem selecionada'); ?></p>
                        </div>

                        <!-- Campo para Vídeo -->
                        <div id="campoVideo" class="form-group" <?php echo $artigo_data['tipo_midia'] === 'imagem' ? 'style="display: none;"' : ''; ?>>
                            <label class="form-label">Link do Vídeo <span class="required">*</span></label>
                            <input type="url" id="video_url" name="video_url" class="form-control" value="<?php echo safeValue($artigo_data['video_url']); ?>" placeholder="https://www.youtube.com/embed/... ou https://vimeo.com/...">
                            <p class="form-help">YouTube: https://www.youtube.com/embed/ID_DO_VIDEO | Vimeo: https://player.vimeo.com/video/ID</p>
                            <div id="videoPreviewContainer" style="margin-top: var(--space-sm); <?php echo empty($artigo_data['video_url']) ? 'display: none;' : ''; ?>">
                                <div class="video-preview-card">
                                    <div class="video-preview-embed" id="videoPreviewEmbed">
                                        <iframe src="<?php echo safeValue($artigo_data['video_url']); ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline" style="color: #FF6B6B;" onclick="removerVideo()">
                                        <i class="fas fa-times"></i> Remover Vídeo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== BOTÕES FINAIS ===== -->
                    <div class="form-actions animate-fade-up" style="animation-delay: 0.5s;">
                        <a href="blog-artigo.php?id=<?php echo $artigo_data['id']; ?>" class="btn btn-outline btn-lg">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Salvar Alterações
                        </button>
                    </div>

                </form>

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

            // Inicializar upload de imagem
            setupUpload();

            // Inicializar preview de vídeo
            const videoInput = document.getElementById('video_url');
            if (videoInput) {
                videoInput.addEventListener('input', previewVideo);
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
        // FUNÇÕES DE SLUG
        // ==========================================

        function gerarSlug() {
            const titulo = document.getElementById('titulo').value;
            if (!titulo) {
                mostrarToast('Digite um título primeiro!', 'warning');
                return;
            }

            const slug = titulo
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');

            document.getElementById('slug').value = slug;
            mostrarToast('Slug gerado com sucesso!', 'success');
        }

        // ==========================================
        // FUNÇÃO PARA ALTERNAR CAMPOS DE MÍDIA
        // ==========================================

        function toggleMidiaFields() {
            const tipo = document.getElementById('tipo_midia').value;
            const campoImagem = document.getElementById('campoImagem');
            const campoVideo = document.getElementById('campoVideo');

            if (tipo === 'imagem') {
                campoImagem.style.display = 'block';
                campoVideo.style.display = 'none';
                document.getElementById('video_url').removeAttribute('required');
            } else {
                campoImagem.style.display = 'none';
                campoVideo.style.display = 'block';
                document.getElementById('video_url').setAttribute('required', 'required');
                previewVideo();
            }
        }

        // ==========================================
        // PREVIEW DO VÍDEO
        // ==========================================

        function previewVideo() {
            const url = document.getElementById('video_url').value;
            const container = document.getElementById('videoPreviewContainer');
            const embed = document.getElementById('videoPreviewEmbed').querySelector('iframe');

            if (url && (url.includes('youtube.com/embed/') || url.includes('vimeo.com/') || url.includes('youtu.be/'))) {
                container.style.display = 'block';
                embed.src = url;
            } else if (url) {
                container.style.display = 'block';
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
            const fileInput = document.getElementById('imagem_artigo');
            const preview = document.getElementById('uploadPreview');

            if (!uploadArea) return;

            uploadArea.addEventListener('click', function(e) {
                if (!e.target.closest('button')) {
                    fileInput.click();
                }
            });

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
                        <button type="button" class="btn btn-sm btn-danger remove-image" onclick="removerImagem()">
                            <i class="fas fa-times"></i> Remover
                        </button>
                    `;
                    preview.style.position = 'relative';
                };
                reader.readAsDataURL(file);
            }
        }

        function removerImagem() {
            const preview = document.getElementById('uploadPreview');
            const fileInput = document.getElementById('imagem_artigo');
            preview.innerHTML = `
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Clique ou arraste uma imagem</p>
                <span>PNG, JPG, SVG até 5MB</span>
            `;
            preview.style.position = 'static';
            fileInput.value = '';
        }

        function removerVideo() {
            document.getElementById('video_url').value = '';
            document.getElementById('videoPreviewContainer').style.display = 'none';
            document.getElementById('videoPreviewEmbed').querySelector('iframe').src = '';
        }

        // ==========================================
        // SUBMIT FORM
        // ==========================================

        function handleSubmit(event) {
            event.preventDefault();

            const titulo = document.getElementById('titulo').value;
            const resumo = document.getElementById('resumo').value;
            const conteudo = document.getElementById('conteudo').value;
            const categoria = document.getElementById('categoria').value;
            const autor = document.getElementById('autor').value;
            const tipoMidia = document.getElementById('tipo_midia').value;
            const videoUrl = document.getElementById('video_url').value;

            if (!titulo || !resumo || !conteudo || !categoria || !autor) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return false;
            }

            if (tipoMidia === 'video' && !videoUrl) {
                mostrarToast('Por favor, insira o link do vídeo!', 'error');
                return false;
            }

            // Simular salvamento
            const btn = event.submitter || document.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A salvar...';

            setTimeout(() => {
                mostrarToast('Alterações salvas com sucesso!', 'success');
                btn.disabled = false;
                btn.innerHTML = originalText;

                setTimeout(() => {
                    window.location.href = 'blog-artigo.php?id=<?php echo $artigo_data['id']; ?>';
                }, 1000);
            }, 1500);

            return false;
        }
    </script>

    <style>
        /* ========================================== */
        /* EDITAR ARTIGO - CSS COMPLETO               */
        /* ========================================== */

        .editar-artigo-container {
            max-width: 950px;
            margin: 0 auto;
            padding: 0 0 40px 0;
        }

        /* ===== FORM SECTIONS ===== */
        .form-section {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .form-section:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .form-section h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .form-section h3 i {
            color: var(--color-aurora);
        }

        /* ===== FORM ROW ===== */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .form-group {
            margin-bottom: var(--space-md);
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        /* ===== FORM LABEL ===== */
        .form-group label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .form-group label .required {
            color: #FF6B6B;
            margin-left: 2px;
        }

        /* ===== FORM CONTROL ===== */
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

        /* ===== SLUG PREVIEW ===== */
        .slug-preview {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .slug-preview .slug-url {
            font-size: var(--text-sm);
            color: var(--text-muted);
            white-space: nowrap;
            background: var(--bg-input);
            padding: 4px 8px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .slug-preview .slug-input {
            flex: 1;
            min-width: 150px;
        }

        /* ===== FORM HELP ===== */
        .form-help {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ===== UPLOAD AREA ===== */
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

        /* ===== VIDEO PREVIEW ===== */
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

        /* ===== FORM ACTIONS ===== */
        .form-actions {
            display: flex;
            gap: var(--space-md);
            justify-content: flex-end;
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .form-actions .btn {
            min-width: 160px;
            justify-content: center;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 768px) {
            .editar-artigo-container {
                padding: 0 0 30px 0;
            }

            .form-section {
                padding: var(--space-md);
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .slug-preview {
                flex-direction: column;
                align-items: stretch;
            }

            .slug-preview .slug-url {
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .form-actions .btn {
                width: 100%;
                min-width: auto;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .upload-area {
                padding: var(--space-md);
            }

            .upload-area .upload-preview i {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .form-section {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .form-section h3 {
                font-size: var(--text-body);
            }

            .form-control {
                font-size: var(--text-sm);
                padding: 6px 10px;
            }

            .upload-area .upload-preview img {
                max-height: 120px;
            }

            .slug-preview .slug-input {
                min-width: auto;
            }
        }
    </style>

</body>

</html>