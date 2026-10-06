<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus — Blog e Artigos</title>

    <!-- Meta Tags -->
    <meta name="description" content="Artigos, tutoriais, cases de sucesso, entrevistas e notícias sobre geotecnologia, engenharia e topografia.">
    <meta name="keywords" content="blog, artigos, tutoriais, cases, entrevistas, notícias, geonexus, geotecnologia, engenharia, topografia">
    <meta name="author" content="GeoNexus">

    <!-- Open Graph -->
    <meta property="og:title" content="GeoNexus — Blog e Artigos">
    <meta property="og:description" content="Artigos sobre geotecnologia, engenharia e topografia.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geonnexus.com/blog">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.ico">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Principal -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <?php include '../includes/loading.php'; ?>
    <?php include '../includes/navbar.php'; ?>

    <!-- ============================================================
   HERO DO BLOG
============================================================ -->
    <section class="blog-hero" id="blog-hero">
        <div class="hero-particles">
            <div class="particle" style="left: 10%; animation-duration: 18s; animation-delay: 0s;"></div>
            <div class="particle" style="left: 30%; animation-duration: 22s; animation-delay: 2s;"></div>
            <div class="particle" style="left: 50%; animation-duration: 20s; animation-delay: 4s;"></div>
            <div class="particle" style="left: 70%; animation-duration: 25s; animation-delay: 1s;"></div>
            <div class="particle" style="left: 90%; animation-duration: 19s; animation-delay: 3s;"></div>
        </div>

        <div class="container blog-hero-container">
            <div class="blog-hero-content">
                <div class="hero-badge">
                    <i class="fas fa-newspaper"></i>
                    <span>Blog e Artigos</span>
                </div>

                <h1 class="hero-title">
                    Conhecimento que <br>
                    <span class="highlight">Transforma</span>
                </h1>

                <p class="hero-subtitle">
                    Artigos exclusivos sobre as mais recentes tendências em geotecnologia,
                    <strong>cases reais</strong> e <strong>insights</strong> que impulsionam a inovação.
                </p>

                <div class="hero-actions">
                    <a href="#artigos" class="btn btn-primary">
                        <span>Ver Artigos</span>
                        <i class="fas fa-arrow-down btn-arrow"></i>
                        <span class="btn-hover-effect"></span>
                    </a>
                    <a href="#newsletter" class="btn btn-outline-light">
                        <i class="fas fa-envelope"></i>
                        <span>Newsletter</span>
                    </a>
                </div>
            </div>

            <div class="blog-hero-visual">
                <div class="hero-orb"></div>
                <div class="blog-illustration">
                    <div class="floating-element" style="top: 10%; left: 10%; animation-delay: 0s;">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="floating-element" style="top: 30%; right: 15%; animation-delay: 1s;">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="floating-element" style="bottom: 20%; left: 20%; animation-delay: 2s;">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="floating-element" style="bottom: 30%; right: 10%; animation-delay: 3s;">
                        <i class="fas fa-microphone"></i>
                    </div>
                    <div class="floating-element" style="top: 50%; left: 50%; transform: translate(-50%, -50%); animation-delay: 1.5s;">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <span class="text">Scroll para ler</span>
        </div>
    </section>

    <!-- ============================================================
   BREADCRUMB
============================================================ -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php"><i class="fas fa-home"></i> Início</a>
                <i class="fas fa-chevron-right"></i>
                <span class="current">Blog</span>
            </div>
        </div>
    </div>

    <!-- ============================================================
   FILTRO DE CATEGORIAS - NOVO FORMATO
============================================================ -->
    <section class="section" id="categorias">
        <div class="container">
            <div class="blog-filter animate-fade-up">
                <div class="filter-label">
                    <i class="fas fa-filter"></i>
                    <span>Filtrar por:</span>
                </div>
                <div class="filter-options">
                    <button class="filter-btn active" data-category="all">
                        <i class="fas fa-th-list"></i> Todos
                    </button>
                    <button class="filter-btn" data-category="tutoriais">
                        <i class="fas fa-video"></i> Tutoriais
                    </button>
                    <button class="filter-btn" data-category="cases">
                        <i class="fas fa-chart-line"></i> Cases
                    </button>
                    <button class="filter-btn" data-category="entrevistas">
                        <i class="fas fa-microphone"></i> Entrevistas
                    </button>
                    <button class="filter-btn" data-category="noticias">
                        <i class="fas fa-bullhorn"></i> Notícias
                    </button>
                </div>
                <div class="filter-result" id="filterResult">
                    <span id="resultCount">9</span> artigos encontrados
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
   ARTIGOS EM DESTAQUE
============================================================ -->
    <section class="section section-gray" id="destaques">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-star"></i> Destaques
                </span>
                <h2 class="section-title">
                    Artigos em <span class="highlight">Destaque</span>
                </h2>
                <p class="section-description">
                    Os artigos mais lidos e relevantes sobre geotecnologia, engenharia e topografia.
                </p>
            </div>

            <!-- Artigo Destaque 1 -->
            <div class="featured-post animate-fade-up" data-category="tutoriais">
                <div class="featured-cover">
                    <img src="https://via.placeholder.com/600x400/0A1628/FFFFFF?text=GNSS+Technology" alt="GNSS Technology" class="featured-img">
                    <div class="featured-overlay"></div>
                    <span class="featured-label"><i class="fas fa-fire"></i> Tendência</span>
                    <span class="featured-views"><i class="far fa-eye"></i> 1.247</span>
                </div>
                <div class="featured-content">
                    <span class="featured-badge"><i class="fas fa-fire"></i> Artigo em Destaque</span>
                    <h3>Como a tecnologia GNSS está revolucionando os levantamentos topográficos</h3>
                    <p>Descubra como os sistemas GNSS de última geração estão aumentando a precisão e eficiência dos levantamentos topográficos em todo o mundo, com redução de erros e aumento de produtividade.</p>
                    <div class="featured-meta">
                        <div class="featured-author">
                            <div class="author-avatar">AM</div>
                            <div>
                                <strong>Ana Martins</strong>
                                <span>15 Julho 2024</span>
                            </div>
                        </div>
                        <div class="featured-stats">
                            <span><i class="far fa-clock"></i> 5 min</span>
                            <span><i class="far fa-comment"></i> 12 comentários</span>
                        </div>
                        <a href="blog-artigo.php?id=1" class="btn btn-primary btn-sm">
                            <span>Ler Artigo</span>
                            <i class="fas fa-arrow-right btn-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Artigo Destaque 2 -->
            <div class="featured-post animate-fade-up delay-1" data-category="cases">
                <div class="featured-cover">
                    <img src="https://via.placeholder.com/600x400/2E7D32/FFFFFF?text=Precision+Agriculture" alt="Precision Agriculture" class="featured-img">
                    <div class="featured-overlay"></div>
                    <span class="featured-label"><i class="fas fa-rocket"></i> Inovação</span>
                    <span class="featured-views"><i class="far fa-eye"></i> 987</span>
                </div>
                <div class="featured-content">
                    <span class="featured-badge" style="background: var(--gradiente-accent);"><i class="fas fa-rocket"></i> Inovação</span>
                    <h3>Drones e agricultura de precisão: o futuro da produção agrícola</h3>
                    <p>Como os drones estão transformando a agricultura, permitindo monitoramento de culturas, análise de solo e irrigação com precisão milimétrica.</p>
                    <div class="featured-meta">
                        <div class="featured-author">
                            <div class="author-avatar">JC</div>
                            <div>
                                <strong>João Costa</strong>
                                <span>10 Julho 2024</span>
                            </div>
                        </div>
                        <div class="featured-stats">
                            <span><i class="far fa-clock"></i> 4 min</span>
                            <span><i class="far fa-comment"></i> 8 comentários</span>
                        </div>
                        <a href="blog-artigo.php?id=2" class="btn btn-primary btn-sm" style="background: var(--gradiente-accent);">
                            <span>Ler Artigo</span>
                            <i class="fas fa-arrow-right btn-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
   TODOS OS ARTIGOS (COM PAGINAÇÃO JS)
============================================================ -->
    <section class="section" id="artigos">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-list"></i> Todos os Artigos
                </span>
                <h2 class="section-title">
                    Conteúdos <span class="highlight">recentes</span>
                </h2>
                <p class="section-description">
                    Explore todos os artigos, tutoriais, cases de sucesso, entrevistas e notícias da GeoNexus.
                </p>
            </div>

            <!-- Grid de Artigos -->
            <div class="blog-grid" id="blogGrid">
                <!-- Renderizado pelo JavaScript -->
            </div>

            <!-- Paginação -->
            <div class="pagination" id="pagination">
                <button class="pagination-btn" id="prevPage" disabled>
                    <i class="fas fa-chevron-left"></i> Anterior
                </button>
                <div class="pagination-numbers" id="pageNumbers">
                    <!-- Gerado pelo JavaScript -->
                </div>
                <button class="pagination-btn" id="nextPage">
                    Próximo <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- ============================================================
   NEWSLETTER
============================================================ -->
    <section class="newsletter-section" id="newsletter">
        <div class="container">
            <div class="newsletter-container">
                <div class="newsletter-content animate-fade-left">
                    <h2 class="title">
                        <i class="fas fa-envelope-open-text" style="color: var(--color-accent);"></i>
                        Quer mais conteúdo como este?
                    </h2>
                    <p class="subtitle">
                        Inscreva-se na nossa newsletter e receba os melhores artigos
                        sobre geotecnologia, inovação e gestão de projetos diretamente no seu email.
                    </p>
                </div>

                <div class="animate-fade-right">
                    <form class="newsletter-form" id="newsletterForm">
                        <div class="input-wrapper">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="Seu melhor email" required>
                        </div>
                        <button type="submit" class="btn-submit">
                            Inscrever-me
                            <i class="fas fa-arrow-right btn-arrow"></i>
                        </button>
                    </form>
                    <div class="form-note">
                        <i class="fas fa-shield-alt"></i>
                        <span>Sem spam. Pode cancelar a qualquer momento.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
   FOOTER
============================================================ -->
    <?php include '../includes/footer.php'; ?>

    <!-- ============================================================
   BACK TO TOP
============================================================ -->
    <button class="back-to-top" id="backToTop" aria-label="Voltar ao topo">
        <i class="fas fa-chevron-up"></i>
        <div class="glow"></div>
    </button>

    <!-- ============================================================
   SCRIPTS
============================================================ -->
    <script src="../assets/js/site.js"></script>

    <script>
        // ============================================================
        // DADOS DOS ARTIGOS
        // ============================================================
        const articlesData = [
            {
                id: 1,
                category: 'tutoriais',
                title: 'Guia prático: Como utilizar o módulo CAD da GeoNexus',
                excerpt: 'Aprenda passo a passo como utilizar as ferramentas CAD da GeoNexus para criar desenhos técnicos precisos.',
                author: 'João Costa',
                authorInitials: 'JC',
                date: '28 Jul 2024',
                readTime: '4 min',
                image: 'https://via.placeholder.com/400x250/00BCD4/FFFFFF?text=CAD+Tutorial',
                tag: 'Tutorial',
                tagType: 'primary',
                secondaryTag: 'Topografia'
            },
            {
                id: 2,
                category: 'cases',
                title: 'Como a Construtora X aumentou a produtividade em 40% com a GeoNexus',
                excerpt: 'Conheça a história da Construtora X e como a GeoNexus transformou a gestão das suas obras.',
                author: 'Pedro Silva',
                authorInitials: 'PS',
                date: '20 Jul 2024',
                readTime: '6 min',
                image: 'https://via.placeholder.com/400x250/2ECC71/FFFFFF?text=Construction+Case',
                tag: 'Case de Sucesso',
                tagType: 'success',
                secondaryTag: 'Construção'
            },
            {
                id: 3,
                category: 'entrevistas',
                title: 'Entrevista com João Silva: O futuro da geotecnologia em Angola',
                excerpt: 'O fundador da GeoNexus partilha a sua visão sobre o futuro da geotecnologia no país e no mundo.',
                author: 'Rita Mendes',
                authorInitials: 'RM',
                date: '15 Jul 2024',
                readTime: '8 min',
                image: 'https://via.placeholder.com/400x250/F9A825/FFFFFF?text=Interview',
                tag: 'Entrevista',
                tagType: 'warning',
                secondaryTag: 'Liderança'
            },
            {
                id: 4,
                category: 'noticias',
                title: 'GeoNexus anuncia nova parceria com instituição de ensino superior',
                excerpt: 'A GeoNexus firma parceria com uma universidade para capacitação de estudantes em geotecnologia.',
                author: 'Ana Costa',
                authorInitials: 'AC',
                date: '10 Jul 2024',
                readTime: '3 min',
                image: 'https://via.placeholder.com/400x250/E63946/FFFFFF?text=News+Partnership',
                tag: 'Notícia',
                tagType: 'danger',
                secondaryTag: 'Parceria'
            },
            {
                id: 5,
                category: 'tutoriais',
                title: 'Como integrar dados de drones na plataforma GeoNexus',
                excerpt: 'Aprenda a importar e processar dados de drones para gerar modelos 3D e ortomosaicos.',
                author: 'Miguel Lopes',
                authorInitials: 'ML',
                date: '5 Jul 2024',
                readTime: '5 min',
                image: 'https://via.placeholder.com/400x250/0288D1/FFFFFF?text=Drone+Integration',
                tag: 'Tutorial',
                tagType: 'primary',
                secondaryTag: 'Drones'
            },
            {
                id: 6,
                category: 'cases',
                title: 'Planeamento urbano: Como a GeoNexus está a transformar as cidades',
                excerpt: 'Descubra como a GeoNexus está a ajudar municípios a planearem o desenvolvimento urbano.',
                author: 'Sofia Ferreira',
                authorInitials: 'SF',
                date: '28 Jun 2024',
                readTime: '7 min',
                image: 'https://via.placeholder.com/400x250/1976D2/FFFFFF?text=Urban+Planning',
                tag: 'Case de Sucesso',
                tagType: 'success',
                secondaryTag: 'Urbanismo'
            },
            {
                id: 7,
                category: 'entrevistas',
                title: 'Entrevista com Maria Santos: O papel da mulher na engenharia',
                excerpt: 'A engenheira civil Maria Santos fala sobre a sua trajetória e o futuro da engenharia em Angola.',
                author: 'Carlos Nunes',
                authorInitials: 'CN',
                date: '20 Jun 2024',
                readTime: '6 min',
                image: 'https://via.placeholder.com/400x250/FF6B35/FFFFFF?text=Interview+2',
                tag: 'Entrevista',
                tagType: 'warning',
                secondaryTag: 'Diversidade'
            },
            {
                id: 8,
                category: 'noticias',
                title: 'GeoNexus lança novo módulo de inteligência artificial',
                excerpt: 'A plataforma GeoNexus anuncia o lançamento de um novo módulo com inteligência artificial para análise de dados geoespaciais.',
                author: 'Pedro Santos',
                authorInitials: 'PS',
                date: '15 Jun 2024',
                readTime: '4 min',
                image: 'https://via.placeholder.com/400x250/8E44AD/FFFFFF?text=AI+Launch',
                tag: 'Notícia',
                tagType: 'danger',
                secondaryTag: 'Inovação'
            },
            {
                id: 9,
                category: 'tutoriais',
                title: 'Como criar relatórios técnicos na GeoNexus',
                excerpt: 'Aprenda a gerar relatórios técnicos profissionais com os dados dos seus projetos na GeoNexus.',
                author: 'Ana Martins',
                authorInitials: 'AM',
                date: '10 Jun 2024',
                readTime: '3 min',
                image: 'https://via.placeholder.com/400x250/16A085/FFFFFF?text=Reports',
                tag: 'Tutorial',
                tagType: 'primary',
                secondaryTag: 'Relatórios'
            }
        ];

        // ============================================================
        // CONFIGURAÇÕES
        // ============================================================
        const articlesPerPage = 6;
        let currentPage = 1;
        let currentCategory = 'all';

        // ============================================================
        // ELEMENTOS DOM
        // ============================================================
        const grid = document.getElementById('blogGrid');
        const pageNumbers = document.getElementById('pageNumbers');
        const prevBtn = document.getElementById('prevPage');
        const nextBtn = document.getElementById('nextPage');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const resultCount = document.getElementById('resultCount');

        // ============================================================
        // FILTRAR ARTIGOS POR CATEGORIA
        // ============================================================
        function getFilteredArticles() {
            if (currentCategory === 'all') {
                return articlesData;
            }
            return articlesData.filter(a => a.category === currentCategory);
        }

        // ============================================================
// FUNÇÃO DE SEGURANÇA PARA EXIBIR CARDS
// ============================================================

// Adicione esta função após a definição do articlesData
function ensureCardsVisible() {
    const cards = document.querySelectorAll('.blog-card');
    if (cards.length === 0) {
        console.warn('⚠️ Nenhum card encontrado, renderizando novamente...');
        renderArticles();
    } else {
        cards.forEach(card => {
            card.style.display = 'block';
        });
        console.log('✅ Cards visíveis:', cards.length);
    }
}

// Chame esta função após o loading e após cada filtro
// Adicione no final do DOMContentLoaded:
setTimeout(ensureCardsVisible, 100);
        // ============================================================
        // RENDERIZAR ARTIGOS
        // ============================================================
        function renderArticles() {
            const filtered = getFilteredArticles();
            const totalPages = Math.ceil(filtered.length / articlesPerPage);
            const start = (currentPage - 1) * articlesPerPage;
            const end = start + articlesPerPage;
            const pageArticles = filtered.slice(start, end);

            // Atualizar contagem de resultados
            resultCount.textContent = filtered.length;

            // Renderizar artigos
            if (pageArticles.length === 0) {
                grid.innerHTML = `
                    <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 0;">
                        <i class="fas fa-inbox" style="font-size: 3rem; color: var(--gray-300);"></i>
                        <h3 style="font-family: var(--font-secondary); color: var(--color-secondary); margin-top: 1rem;">Nenhum artigo encontrado</h3>
                        <p style="color: var(--gray-500);">Tente selecionar outra categoria.</p>
                    </div>
                `;
            } else {
                grid.innerHTML = pageArticles.map(article => createArticleCard(article)).join('');
            }

            // Atualizar paginação
            renderPagination(totalPages);

            // Atualizar botões de navegação
            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage === totalPages || totalPages === 0;

            // Scroll suave para o topo da grid
            if (pageArticles.length > 0) {
                document.getElementById('artigos').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        // ============================================================
        // CRIAR CARD DE ARTIGO
        // ============================================================
        function createArticleCard(article) {
            return `
                <article class="blog-card" data-category="${article.category}">
                    <div class="card-image">
                        <img src="${article.image}" alt="${article.title}" class="card-img">
                        <div class="card-overlay"></div>
                        <span class="card-category"><i class="fas fa-tag"></i> ${article.tag}</span>
                        <span class="card-date"><i class="far fa-calendar-alt"></i> ${article.date}</span>
                    </div>
                    <div class="card-body">
                        <div class="card-tags">
                            <span class="tag tag-${article.tagType}">${article.tag}</span>
                            <span class="tag tag-secondary">${article.secondaryTag}</span>
                        </div>
                        <h4>${article.title}</h4>
                        <p>${article.excerpt}</p>
                        <div class="card-footer">
                            <div class="card-author">
                                <div class="author-avatar-sm">${article.authorInitials}</div>
                                <span>${article.author}</span>
                            </div>
                            <a href="blog-artigo.php?id=${article.id}" class="card-read-more">Ler <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </article>
            `;
        }

        // ============================================================
        // RENDERIZAR PAGINAÇÃO
        // ============================================================
        function renderPagination(totalPages) {
            let html = '';

            for (let i = 1; i <= totalPages; i++) {
                html += `
                    <button class="page-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">
                        ${i}
                    </button>
                `;
            }

            pageNumbers.innerHTML = html;

            // Event listeners para os botões de página
            document.querySelectorAll('.page-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const page = parseInt(this.getAttribute('data-page'));
                    if (page !== currentPage) {
                        currentPage = page;
                        renderArticles();
                    }
                });
            });
        }

        // ============================================================
        // FILTRO POR CATEGORIA
        // ============================================================
        function filterByCategory(category) {
            currentCategory = category;
            currentPage = 1;

            // Atualizar botões de filtro
            filterBtns.forEach(btn => {
                btn.classList.remove('active');
                if (btn.getAttribute('data-category') === category) {
                    btn.classList.add('active');
                }
            });

            // Atualizar artigos em destaque
            document.querySelectorAll('.featured-post').forEach(post => {
                const postCat = post.getAttribute('data-category');
                if (category === 'all' || postCat === category) {
                    post.style.display = 'grid';
                } else {
                    post.style.display = 'none';
                }
            });

            renderArticles();
        }

        // ============================================================
        // EVENT LISTENERS
        // ============================================================

        // Botões de filtro
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const category = this.getAttribute('data-category');
                filterByCategory(category);
            });
        });

        // Botão Anterior
        prevBtn.addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderArticles();
            }
        });

        // Botão Próximo
        nextBtn.addEventListener('click', function() {
            const filtered = getFilteredArticles();
            const totalPages = Math.ceil(filtered.length / articlesPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                renderArticles();
            }
        });

        // ============================================================
        // LOADING SCREEN
        // ============================================================
        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loadingScreen');
            const progressFill = document.getElementById('progressFill');
            const progressPercentage = document.getElementById('progressPercentage');
            const progressMarker = document.getElementById('progressMarker');
            const statusText = document.getElementById('statusText');

            let progress = 0;
            const statusMessages = [
                'CARREGANDO ARTIGOS',
                'PREPARANDO O CONTEÚDO',
                'TUDO PRONTO'
            ];
            let statusIndex = 0;

            const interval = setInterval(() => {
                progress += Math.random() * 3 + 1;
                if (progress > 100) progress = 100;

                progressFill.style.width = progress + '%';
                progressPercentage.textContent = Math.round(progress) + '%';

                if (progress > 40 && statusIndex === 0) {
                    statusIndex = 1;
                    statusText.textContent = statusMessages[1];
                }
                if (progress > 80 && statusIndex === 1) {
                    statusIndex = 2;
                    statusText.textContent = statusMessages[2];
                }

                if (progress >= 100) {
                    clearInterval(interval);
                    progressMarker.classList.add('visible');

                    setTimeout(() => {
                        loadingScreen.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                        // Inicializa a página com todos os artigos
                        renderArticles();
                    }, 800);
                }
            }, 120);
        });

        // ============================================================
        // BACK TO TOP
        // ============================================================
        const backToTop = document.getElementById('backToTop');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ============================================================
        // NEWSLETTER FORM
        // ============================================================
        const newsletterForm = document.getElementById('newsletterForm');

        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const input = this.querySelector('input');
            const email = input.value.trim();

            if (email) {
                const btn = this.querySelector('.btn-submit');
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A enviar...';
                btn.disabled = true;

                setTimeout(() => {
                    btn.innerHTML = '<i class="fas fa-check"></i> Inscrito!';
                    btn.style.background = 'var(--gradiente-accent)';

                    setTimeout(() => {
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                        input.value = '';
                    }, 3000);
                }, 1500);
            }
        });

        // ============================================================
        // ANIMAÇÃO DE SCROLL
        // ============================================================
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-fade-up, .animate-fade-left, .animate-fade-right').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>

</body>

<style>
    /* ============================================================
   PÁGINA BLOG - ESTILOS (NOVO FILTRO)
   ============================================================ */

    /* ============================================
       HERO DO BLOG
    ============================================ */
    .blog-hero {
        min-height: 90vh;
        padding-top: 80px;
        position: relative;
        background: var(--gradient-primary);
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .blog-hero-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .blog-hero-content {
        color: white;
    }

    .blog-hero-visual {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .blog-illustration {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* ============================================
       FILTRO DE CATEGORIAS - NOVO FORMATO
    ============================================ */
    .blog-filter {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        padding: 1rem 1.5rem;
        background: white;
        border-radius: 16px;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        max-width: 900px;
        margin: 0 auto;
    }

    .filter-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--gray-500);
        font-size: 0.85rem;
        font-weight: 600;
        margin-right: 0.5rem;
    }

    .filter-label i {
        color: var(--color-accent-2);
    }

    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        flex: 1;
        justify-content: center;
    }

    .filter-btn {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.4rem 1rem;
        background: var(--gray-100);
        border: 2px solid transparent;
        border-radius: 9999px;
        color: var(--gray-600);
        font-size: 0.8rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: var(--font-primary);
        white-space: nowrap;
    }

    .filter-btn i {
        font-size: 0.8rem;
    }

    .filter-btn:hover {
        border-color: var(--color-accent-2);
        color: var(--color-accent-2);
        transform: translateY(-2px);
    }

    .filter-btn.active {
        background: var(--gradiente-vermelho);
        color: var(--gray-600);;
        border: none;
        box-shadow: 0 4px 15px rgba(230, 57, 70, 0.25);
    }

    .filter-btn.active i {
        color: var(--gray-600);;
    }

    .filter-result {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        font-size: 0.75rem;
        color: var(--gray-400);
        padding: 0.2rem 0.8rem;
        background: var(--gray-50);
        border-radius: 9999px;
        white-space: nowrap;
    }

    .filter-result #resultCount {
        font-weight: 700;
        color: var(--color-secondary);
    }

    /* ============================================
       ARTIGOS EM DESTAQUE
    ============================================ */
    .featured-post {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 32px;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
        border: 2px solid #E63946;
        margin-bottom: 48px;
        transition: all 0.3s ease;
    }

    .featured-post:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18);
    }

    .featured-cover {
        position: relative;
        overflow: hidden;
        height: 350px;
    }

    .featured-cover .featured-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .featured-cover .featured-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 40%, rgba(0, 0, 0, 0.4));
    }

    .featured-cover .featured-label {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: #E63946;
        color: white;
        padding: 0.3rem 1rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .featured-cover .featured-views {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 9999px;
        font-size: 0.7rem;
        backdrop-filter: blur(10px);
    }

    .featured-content {
        padding: 32px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .featured-content .featured-badge {
        display: inline-block;
        background: var(--gradiente-vermelho);
        color: white;
        padding: 0.3rem 1rem;
        border-radius: 9999px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 16px;
        width: fit-content;
    }

    .featured-content h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.8rem;
        color: #1D3557;
        margin-bottom: 16px;
        line-height: 1.3;
    }

    .featured-content p {
        color: #6B7280;
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 24px;
    }

    .featured-meta {
        display: flex;
        align-items: center;
        gap: 24px;
        flex-wrap: wrap;
    }

    .featured-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .featured-author .author-avatar {
        width: 40px;
        height: 40px;
        background: var(--gradiente-azul);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .featured-author div {
        display: flex;
        flex-direction: column;
    }

    .featured-author strong {
        font-weight: 600;
        color: #1D3557;
        font-size: 0.9rem;
    }

    .featured-author span {
        font-size: 0.8rem;
        color: #9CA3AF;
    }

    .featured-stats {
        display: flex;
        gap: 16px;
        color: #9CA3AF;
        font-size: 0.85rem;
    }

    .featured-stats i {
        margin-right: 0.3rem;
    }

    .btn-sm {
        padding: 0.5rem 1.5rem;
        font-size: 0.9rem;
    }

    /* ============================================
       CARDS DE ARTIGOS
    ============================================ */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        margin-top: 48px;
    }

    .blog-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid #E5E7EB;
    }

    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
        border-color: #E63946;
    }

    .blog-card .card-image {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .blog-card .card-image .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-card:hover .card-image .card-img {
        transform: scale(1.05);
    }

    .blog-card .card-image .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent 60%, rgba(0, 0, 0, 0.4));
    }

    .blog-card .card-image .card-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255, 255, 255, 0.9);
        padding: 0.3rem 0.8rem;
        border-radius: 9999px;
        font-size: 0.7rem;
        font-weight: 600;
        color: #1D3557;
        display: flex;
        align-items: center;
        gap: 0.3rem;
        backdrop-filter: blur(10px);
    }

    .blog-card .card-image .card-date {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 9999px;
        font-size: 0.7rem;
        backdrop-filter: blur(10px);
    }

    .blog-card .card-body {
        padding: 24px;
    }

    .blog-card .card-tags {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 12px;
        flex-wrap: wrap;
    }

    .blog-card .card-tags .tag {
        padding: 0.15rem 0.6rem;
        border-radius: 9999px;
        font-size: 0.6rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .tag-primary {
        background: #00BCD4;
        color: white;
    }

    .tag-success {
        background: #2ECC71;
        color: white;
    }

    .tag-warning {
        background: #F9A825;
        color: white;
    }

    .tag-danger {
        background: #E63946;
        color: white;
    }

    .tag-secondary {
        background: #F3F4F6;
        color: #6B7280;
    }

    .blog-card .card-body h4 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.15rem;
        color: #1D3557;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .blog-card .card-body p {
        color: #6B7280;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 16px;
    }

    .blog-card .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 16px;
        border-top: 1px solid #E5E7EB;
    }

    .blog-card .card-author {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .blog-card .card-author .author-avatar-sm {
        width: 30px;
        height: 30px;
        background: var(--gradiente-azul);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .blog-card .card-author span {
        font-size: 0.85rem;
        font-weight: 600;
        color: #1D3557;
    }

    .blog-card .card-read-more {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        color: #E63946;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        transition: gap 0.3s ease;
    }

    .blog-card .card-read-more:hover {
        gap: 0.8rem;
    }

    /* ============================================
       PAGINAÇÃO
    ============================================ */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 24px;
        margin-top: 48px;
    }

    .pagination-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.5rem;
        border: 2px solid #E5E7EB;
        background: white;
        border-radius: 9999px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #1D3557;
    }

    .pagination-btn:hover:not(:disabled) {
        border-color: #E63946;
        color: #E63946;
    }

    .pagination-btn:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .pagination-numbers {
        display: flex;
        gap: 4px;
    }

    .page-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: white;
        border: 2px solid #E5E7EB;
        color: #1D3557;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .page-btn:hover:not(.active) {
        border-color: #E63946;
        color: #E63946;
    }

    .page-btn.active {
        background: var(--gradiente-vermelho);
        color: white;
        border: none;
    }

    /* ============================================
       RESPONSIVIDADE
    ============================================ */
    @media (max-width: 1024px) {
        .blog-hero-container {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 32px;
        }

        .blog-hero-content .hero-subtitle {
            margin: 0 auto 32px;
        }

        .blog-hero-content .hero-actions {
            justify-content: center;
        }

        .blog-hero-visual {
            height: 250px;
        }

        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .featured-post {
            grid-template-columns: 1fr;
        }

        .featured-cover {
            height: 250px !important;
        }

        .featured-content {
            padding: 24px !important;
        }

        .featured-content h3 {
            font-size: 1.5rem !important;
        }
    }

    @media (max-width: 768px) {
        .blog-hero {
            min-height: 70vh;
        }

        .blog-hero-visual {
            height: 180px;
        }

        .blog-grid {
            grid-template-columns: 1fr;
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
        }

        .blog-filter {
            flex-direction: column;
            align-items: stretch;
            padding: 1rem;
        }

        .filter-label {
            justify-content: center;
        }

        .filter-options {
            flex-wrap: wrap;
            justify-content: center;
        }

        .filter-btn {
            font-size: 0.75rem;
            padding: 0.3rem 0.8rem;
        }

        .filter-result {
            justify-content: center;
        }

        .featured-cover {
            height: 200px !important;
        }

        .featured-content h3 {
            font-size: 1.3rem !important;
        }

        .featured-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .featured-meta .btn {
            width: 100%;
            justify-content: center;
        }

        .pagination {
            flex-direction: column;
            gap: 16px;
        }
    }

    @media (max-width: 480px) {
        .blog-hero {
            min-height: 60vh;
        }

        .blog-hero-visual {
            height: 120px;
        }

        .blog-filter {
            padding: 0.8rem;
        }

        .filter-btn {
            font-size: 0.65rem;
            padding: 0.25rem 0.6rem;
        }

        .filter-btn i {
            font-size: 0.65rem;
        }

        .filter-label {
            font-size: 0.75rem;
        }

        .filter-result {
            font-size: 0.65rem;
        }

        .featured-content {
            padding: 16px !important;
        }

        .featured-content h3 {
            font-size: 1.1rem !important;
        }

        .featured-content p {
            font-size: 0.9rem !important;
        }

        .blog-card .card-body {
            padding: 16px !important;
        }

        .blog-card .card-body h4 {
            font-size: 1rem !important;
        }
    }
</style>

<style>
    /* Hero da página Sobre */
    .about-hero {
        min-height: 90vh;
        padding-top: 80px;
        position: relative;
        background: var(--gradient-primary);
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .about-hero-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-3xl);
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .about-hero-content {
        color: white;
    }

    .about-hero-visual {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-illustration {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .floating-element {
        position: absolute;
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        animation: float 4s ease-in-out infinite;
        transition: all 0.3s ease;
    }

    .floating-element:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: scale(1.1) !important;
    }

    /* Breadcrumb */
    .breadcrumb-section {
        padding: var(--space-md) 0;
        background: var(--gray-100);
        border-bottom: 1px solid var(--gray-200);
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        color: var(--gray-500);
    }

    .breadcrumb a {
        color: var(--color-secondary);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb a:hover {
        color: var(--color-accent-2);
    }

    .breadcrumb .current {
        color: var(--gray-600);
        font-weight: 600;
    }

    .breadcrumb i {
        font-size: 0.7rem;
    }

    /* Team Cards */
    .team-card {
        transition: all 0.3s ease;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-xl);
    }

    .team-image {
        position: relative;
        overflow: hidden;
    }

    .team-info {
        background: white;
    }

    /* Setores Grid */
    .setor-item {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .setor-item:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }

    /* Career Cards */
    .career-card {
        transition: all 0.3s ease;
    }

    .career-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    /* Responsividade */
    @media (max-width: 1024px) {
        .about-hero-container {
            grid-template-columns: 1fr;
            text-align: center;
            gap: var(--space-2xl);
        }

        .about-hero-content .hero-subtitle {
            margin: 0 auto var(--space-xl);
        }

        .about-hero-content .hero-actions {
            justify-content: center;
        }

        .about-hero-visual {
            height: 300px;
        }

        .mission-grid {
            grid-template-columns: 1fr !important;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .team-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        .setores-grid {
            grid-template-columns: repeat(3, 1fr) !important;
        }

        .careers-grid {
            grid-template-columns: 1fr !important;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .team-stats {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    @media (max-width: 768px) {
        .about-hero {
            min-height: 70vh;
        }

        .about-hero-visual {
            height: 200px;
        }

        .team-grid {
            grid-template-columns: 1fr !important;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .setores-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        .team-stats {
            grid-template-columns: 1fr !important;
        }

        .floating-element {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }
    }
</style>
</html>