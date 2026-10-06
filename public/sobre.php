<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus — Sobre Nós</title>

    <!-- Meta Tags -->
    <meta name="description" content="Conheça a GeoNexus, o ecossistema de engenharia e geotecnologia que está transformando o setor em Angola e no mundo.">
    <meta name="keywords" content="sobre, empresa, geonexus, engenharia, geotecnologia, topografia, GIS, Angola">
    <meta name="author" content="GeoNexus">

    <!-- Open Graph -->
    <meta property="og:title" content="GeoNexus — Sobre Nós">
    <meta property="og:description" content="Conheça a GeoNexus, o ecossistema de engenharia e geotecnologia.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geonnexus.com/sobre">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/imgs/favicon.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Principal -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/loading.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
</head>

<body>

    <?php include '../includes/loading.php'; ?>
    <?php include '../includes/navbar.php'; ?>

    <!-- ============================================================
   HERO DA PÁGINA SOBRE
============================================================ -->
    <section class="about-hero" id="sobre-hero">
        <div class="hero-particles">
            <div class="particle" style="left: 10%; animation-duration: 18s; animation-delay: 0s;"></div>
            <div class="particle" style="left: 30%; animation-duration: 22s; animation-delay: 2s;"></div>
            <div class="particle" style="left: 50%; animation-duration: 20s; animation-delay: 4s;"></div>
            <div class="particle" style="left: 70%; animation-duration: 25s; animation-delay: 1s;"></div>
            <div class="particle" style="left: 90%; animation-duration: 19s; animation-delay: 3s;"></div>
        </div>

        <div class="container about-hero-container">
            <div class="about-hero-content">
                <div class="hero-badge">
                    <i class="fas fa-building"></i>
                    <span>Conheça a GeoNexus</span>
                </div>

                <h1 class="hero-title">
                    Construindo o <br>
                    <span class="highlight">Futuro</span> da <br>
                    <span class="highlight-blue">Geotecnologia</span>
                </h1>

                <p class="hero-subtitle">
                    A GeoNexus nasceu para unificar as ferramentas de topografia, engenharia,
                    GIS, agricultura, mineração e gestão de projetos num único ecossistema digital.
                </p>

                <div class="hero-actions">
                    <a href="#historia" class="btn btn-primary">
                        <span>Nossa História</span>
                        <i class="fas fa-arrow-down btn-arrow"></i>
                        <span class="btn-hover-effect"></span>
                    </a>
                    <a href="#equipa" class="btn btn-outline-light">
                        <i class="fas fa-users"></i>
                        <span>Conheça a Equipa</span>
                    </a>
                </div>
            </div>

            <div class="about-hero-visual">
                <div class="hero-orb"></div>
                <div class="about-illustration">
                    <div class="floating-element" style="top: 10%; left: 10%; animation-delay: 0s;">
                        <i class="fas fa-globe-africa"></i>
                    </div>
                    <div class="floating-element" style="top: 30%; right: 15%; animation-delay: 1s;">
                        <i class="fas fa-ruler-combined"></i>
                    </div>
                    <div class="floating-element" style="bottom: 20%; left: 20%; animation-delay: 2s;">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="floating-element" style="bottom: 30%; right: 10%; animation-delay: 3s;">
                        <i class="fas fa-hard-hat"></i>
                    </div>
                    <div class="floating-element" style="top: 50%; left: 50%; transform: translate(-50%, -50%); animation-delay: 1.5s;">
                        <i class="fas fa-rocket"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <span class="text">Scroll para conhecer</span>
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
                <span class="current">Sobre a GeoNexus</span>
            </div>
        </div>
    </div>

    <!-- ============================================================
   SECÇÃO 1: NOSSA HISTÓRIA (Submenu 1)
============================================================ -->
    <!-- ============================================================
   SECÇÃO 1: NOSSA HISTÓRIA (Submenu 1)
============================================================ -->
    <section class="section" id="historia">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-clock"></i> Nossa História
                </span>
                <h2 class="section-title">
                    Uma <span class="highlight">Jornada</span> de Inovação
                </h2>
                <p class="section-description">
                    A GeoNexus nasceu da visão de unificar o setor de geotecnologia em Angola
                    e no mundo, criando um ecossistema que conecta profissionais, empresas e dados.
                </p>
            </div>

            <!-- Conteúdo em Parágrafos -->
            <div class="historia-content">
                <div class="historia-texto animate-fade-up delay-1">
                    <p>
                        A <strong>GeoNexus</strong> começou como um projeto de pesquisa na
                        <strong>Universidade Agostinho Neto</strong>, em Luanda, Angola.
                        Um grupo de estudantes e professores de engenharia, topografia e
                        geotecnologia identificou uma oportunidade única: digitalizar e
                        unificar os processos de levantamento, análise e gestão de dados
                        territoriais num país com enorme potencial de desenvolvimento.
                    </p>

                    <p>
                        O objetivo era claro: <strong>transformar a forma como profissionais
                            e empresas lidam com o território</strong>. Em 2021, a primeira
                        versão da plataforma foi lançada com foco em topografia e
                        levantamentos, contando com a participação de 50 profissionais
                        beta-testers que ajudaram a moldar o produto.
                    </p>

                    <p>
                        Em <strong>2022</strong>, a plataforma expandiu-se para novos
                        setores, incluindo <strong>engenharia civil, cadastro predial e
                            Sistemas de Informação Geográfica (GIS)</strong>. Esta expansão
                        permitiu que empresas de construção, consultorias e órgãos
                        públicos começassem a utilizar a GeoNexus como ferramenta central
                        para os seus projetos.
                    </p>

                    <p>
                        O ano de <strong>2023</strong> marcou a integração de
                        <strong>Inteligência Artificial e automação</strong> na
                        plataforma. A GeoNexus passou a oferecer análise de dados
                        preditiva, processamento automático de imagens de drones e
                        geração inteligente de relatórios técnicos, aumentando
                        significativamente a produtividade das equipas.
                    </p>

                    <p>
                        Hoje, em <strong>2024</strong>, a GeoNexus é um
                        <strong>ecossistema completo</strong> que conecta
                        <strong>12 setores</strong> de atuação, com mais de
                        <strong>1.500 profissionais</strong> e
                        <strong>500 empresas</strong> em toda a
                        <strong>África Austral</strong>. A plataforma continua a
                        evoluir, com o compromisso de democratizar o acesso à
                        tecnologia geoespacial e impulsionar o desenvolvimento
                        sustentável do território.
                    </p>
                </div>

                <!-- Cards de Destaque -->
                <div class="historia-cards animate-fade-up delay-2">
                    <div class="historia-card">
                        <div class="card-number">2019</div>
                        <h4>🌱 A Visão</h4>
                        <p>
                            Um grupo de visionários identificou a necessidade de
                            digitalizar os processos de levantamento e gestão territorial
                            em Angola.
                        </p>
                    </div>
                    <div class="historia-card">
                        <div class="card-number">2020</div>
                        <h4>🚀 O Nascimento</h4>
                        <p>
                            A GeoNexus foi oficialmente fundada como um projeto de
                            pesquisa e inovação tecnológica na Universidade Agostinho Neto.
                        </p>
                    </div>
                    <div class="historia-card">
                        <div class="card-number">2021</div>
                        <h4>💻 O Lançamento</h4>
                        <p>
                            A primeira versão da plataforma é lançada, focada em
                            topografia e levantamentos, com 50 profissionais beta-testers.
                        </p>
                    </div>
                    <div class="historia-card">
                        <div class="card-number">2022</div>
                        <h4>🌍 Expansão</h4>
                        <p>
                            A plataforma expande para engenharia civil, cadastro predial
                            e GIS, atendendo empresas de construção e órgãos públicos.
                        </p>
                    </div>
                    <div class="historia-card">
                        <div class="card-number">2023</div>
                        <h4>🤖 IA e Automação</h4>
                        <p>
                            Integração de IA para análise de dados, processamento de
                            imagens de drones e automação de relatórios técnicos.
                        </p>
                    </div>
                    <div class="historia-card">
                        <div class="card-number">2024</div>
                        <h4>🌟 Ecossistema Completo</h4>
                        <p>
                            GeoNexus conecta 12 setores, com 1.500+ profissionais e
                            500+ empresas em toda a África Austral.
                        </p>
                    </div>
                </div>

                <!-- Citação/Depoimento -->
                <div class="historia-citacao animate-fade-up delay-3">
                    <div class="citacao-container">
                        <i class="fas fa-quote-left"></i>
                        <blockquote>
                            "A GeoNexus nasceu para ser mais do que uma ferramenta.
                            Queremos ser o ecossistema que conecta pessoas, dados e
                            território, impulsionando o desenvolvimento sustentável
                            de África."
                        </blockquote>
                        <div class="citacao-autor">
                            <strong>João Silva</strong>
                            <span>CEO & Fundador da GeoNexus</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
   SECÇÃO 2: MISSÃO E VALORES (Submenu 2)
============================================================ -->
    <section class="section section-gray" id="missao">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-bullseye"></i> Missão e Valores
                </span>
                <h2 class="section-title">
                    O que nos <span class="highlight">Move</span>
                </h2>
                <p class="section-description">
                    Nossa missão, visão e valores guiam cada decisão e cada linha de código
                    que escrevemos na GeoNexus.
                </p>
            </div>

            <!-- Cards de Missão, Visão, Valores -->
            <div class="mission-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-2xl); margin-bottom: var(--space-3xl);">
                <div class="mission-card animate-fade-up delay-1" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); text-align: center; border-top: 4px solid var(--color-accent-2);">
                    <div style="width: 70px; height: 70px; background: var(--gradient-accent-2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-lg); color: white; font-size: 2rem;">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.5rem; color: var(--color-secondary); margin-bottom: var(--space-md);">Missão</h3>
                    <p style="color: var(--gray-500); line-height: 1.7;">
                        Democratizar o acesso à tecnologia geoespacial, capacitando profissionais
                        e empresas a transformarem dados do território em decisões precisas e sustentáveis.
                    </p>
                </div>

                <div class="mission-card animate-fade-up delay-2" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); text-align: center; border-top: 4px solid var(--color-accent);">
                    <div style="width: 70px; height: 70px; background: var(--gradient-accent); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-lg); color: white; font-size: 2rem;">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.5rem; color: var(--color-secondary); margin-bottom: var(--space-md);">Visão</h3>
                    <p style="color: var(--gray-500); line-height: 1.7;">
                        Ser o ecossistema de referência em geotecnologia e gestão de projetos
                        em África e no mundo, impulsionando o desenvolvimento sustentável do território.
                    </p>
                </div>

                <div class="mission-card animate-fade-up delay-3" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); text-align: center; border-top: 4px solid #F9A825;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #F9A825, #E65100); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-lg); color: white; font-size: 2rem;">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.5rem; color: var(--color-secondary); margin-bottom: var(--space-md);">Valores</h3>
                    <p style="color: var(--gray-500); line-height: 1.7;">
                        Inovação, precisão, integridade, colaboração e sustentabilidade são
                        os pilares que orientam todas as nossas ações e decisões.
                    </p>
                </div>
            </div>

            <!-- Valores em Grid -->
            <div class="values-grid">
                <div class="value-card animate-fade-up delay-1">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h4 class="value-title">Inovação</h4>
                    <p class="value-description">
                        Buscamos constantemente novas soluções e tecnologias para transformar
                        o setor de geotecnologia.
                    </p>
                </div>

                <div class="value-card animate-fade-up delay-2">
                    <div class="value-icon" style="background: var(--gradient-accent-2);">
                        <i class="fas fa-bullseye"></i>
                        <div class="icon-glow" style="background: var(--color-accent-2);"></div>
                    </div>
                    <h4 class="value-title">Precisão</h4>
                    <p class="value-description">
                        A excelência e a precisão são fundamentais em tudo o que fazemos,
                        dos dados aos resultados entregues.
                    </p>
                </div>

                <div class="value-card animate-fade-up delay-3">
                    <div class="value-icon" style="background: var(--gradient-accent);">
                        <i class="fas fa-shield-alt"></i>
                        <div class="icon-glow" style="background: var(--color-accent);"></div>
                    </div>
                    <h4 class="value-title">Integridade</h4>
                    <p class="value-description">
                        Agimos com transparência, ética e responsabilidade em todas as
                        nossas relações e projetos.
                    </p>
                </div>

                <div class="value-card animate-fade-up delay-4">
                    <div class="value-icon" style="background: linear-gradient(135deg, #00BCD4, #1976D2);">
                        <i class="fas fa-handshake"></i>
                        <div class="icon-glow" style="background: #1976D2;"></div>
                    </div>
                    <h4 class="value-title">Colaboração</h4>
                    <p class="value-description">
                        Acreditamos no poder da colaboração entre profissionais, empresas
                        e instituições para construir um futuro melhor.
                    </p>
                </div>

                <div class="value-card animate-fade-up delay-5">
                    <div class="value-icon" style="background: linear-gradient(135deg, #2E7D32, #43A047);">
                        <i class="fas fa-leaf"></i>
                        <div class="icon-glow" style="background: #2E7D32;"></div>
                    </div>
                    <h4 class="value-title">Sustentabilidade</h4>
                    <p class="value-description">
                        Comprometemo-nos com o desenvolvimento sustentável, promovendo
                        práticas que respeitam o meio ambiente e as comunidades.
                    </p>
                </div>

                <div class="value-card animate-fade-up delay-6">
                    <div class="value-icon" style="background: linear-gradient(135deg, #E65100, #BF360C);">
                        <i class="fas fa-users-gear"></i>
                        <div class="icon-glow" style="background: #E65100;"></div>
                    </div>
                    <h4 class="value-title">Empoderamento</h4>
                    <p class="value-description">
                        Capacitamos profissionais e empresas com ferramentas e conhecimento
                        para alcançarem todo o seu potencial.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
   SECÇÃO 3: NOSSA EQUIPA (Submenu 3)
============================================================ -->
    <section class="section" id="equipa">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-users"></i> Nossa Equipa
                </span>
                <h2 class="section-title">
                    Profissionais <span class="highlight">apaixonados</span> <br>por geotecnologia
                </h2>
                <p class="section-description">
                    Conheça os especialistas por trás da GeoNexus, que combinam experiência
                    técnica com paixão por inovação.
                </p>
            </div>

            <!-- Estatísticas da Equipa -->
            <div class="team-stats" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-bottom: var(--space-3xl);">
                <div class="team-stat" style="text-align: center; background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md);">
                    <div style="font-family: var(--font-secondary); font-size: 2.5rem; font-weight: 800; color: var(--color-accent-2);">12+</div>
                    <div style="color: var(--gray-500); font-size: 0.9rem;">Profissionais</div>
                </div>
                <div class="team-stat" style="text-align: center; background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md);">
                    <div style="font-family: var(--font-secondary); font-size: 2.5rem; font-weight: 800; color: var(--color-accent);">50+</div>
                    <div style="color: var(--gray-500); font-size: 0.9rem;">Anos de Experiência</div>
                </div>
                <div class="team-stat" style="text-align: center; background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md);">
                    <div style="font-family: var(--font-secondary); font-size: 2.5rem; font-weight: 800; color: #F9A825;">8</div>
                    <div style="color: var(--gray-500); font-size: 0.9rem;">Setores Especializados</div>
                </div>
                <div class="team-stat" style="text-align: center; background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md);">
                    <div style="font-family: var(--font-secondary); font-size: 2.5rem; font-weight: 800; color: #00BCD4;">5+</div>
                    <div style="color: var(--gray-500); font-size: 0.9rem;">Países</div>
                </div>
            </div>

            <!-- Grid de Membros -->
            <div class="team-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-xl);">
                <!-- Membro 1 -->
                <div class="team-card animate-fade-up delay-1">
                    <div class="team-image" style="background: linear-gradient(135deg, #0A1628, #1A365D); display: flex; align-items: center; justify-content: center; padding: var(--space-xl); min-height: 200px;">
                        <div style="text-align: center; color: white;">
                            <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-size: 3rem; border: 3px solid var(--color-accent-2);">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="team-info" style="padding: var(--space-xl); text-align: center;">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.3rem; color: var(--color-secondary);">João Silva</h4>
                        <p style="color: var(--color-accent-2); font-weight: 600; font-size: 0.9rem;">CEO & Fundador</p>
                        <p style="color: var(--gray-500); font-size: 0.9rem; line-height: 1.6; margin: var(--space-sm) 0;">
                            Especialista em topografia e GIS com 15 anos de experiência
                            em projetos de engenharia e geotecnologia.
                        </p>
                        <div style="display: flex; justify-content: center; gap: var(--space-sm);">
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Membro 2 -->
                <div class="team-card animate-fade-up delay-2">
                    <div class="team-image" style="background: linear-gradient(135deg, #1A365D, #2A4B7C); display: flex; align-items: center; justify-content: center; padding: var(--space-xl); min-height: 200px;">
                        <div style="text-align: center; color: white;">
                            <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-size: 3rem; border: 3px solid var(--color-accent);">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="team-info" style="padding: var(--space-xl); text-align: center;">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.3rem; color: var(--color-secondary);">Maria Santos</h4>
                        <p style="color: var(--color-accent); font-weight: 600; font-size: 0.9rem;">Engenheira Civil & CTO</p>
                        <p style="color: var(--gray-500); font-size: 0.9rem; line-height: 1.6; margin: var(--space-sm) 0;">
                            Especialista em estruturas e gestão de projetos, com
                            experiência em grandes obras de infraestrutura.
                        </p>
                        <div style="display: flex; justify-content: center; gap: var(--space-sm);">
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Membro 3 -->
                <div class="team-card animate-fade-up delay-3">
                    <div class="team-image" style="background: linear-gradient(135deg, #2E7D32, #43A047); display: flex; align-items: center; justify-content: center; padding: var(--space-xl); min-height: 200px;">
                        <div style="text-align: center; color: white;">
                            <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-size: 3rem; border: 3px solid #F9A825;">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="team-info" style="padding: var(--space-xl); text-align: center;">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.3rem; color: var(--color-secondary);">Pedro Costa</h4>
                        <p style="color: #F9A825; font-weight: 600; font-size: 0.9rem;">Especialista em Agricultura de Precisão</p>
                        <p style="color: var(--gray-500); font-size: 0.9rem; line-height: 1.6; margin: var(--space-sm) 0;">
                            Especialista em drones, sensoriamento remoto e análise
                            de dados agrícolas para otimização de culturas.
                        </p>
                        <div style="display: flex; justify-content: center; gap: var(--space-sm);">
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Membro 4 -->
                <div class="team-card animate-fade-up delay-4">
                    <div class="team-image" style="background: linear-gradient(135deg, #E65100, #BF360C); display: flex; align-items: center; justify-content: center; padding: var(--space-xl); min-height: 200px;">
                        <div style="text-align: center; color: white;">
                            <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-size: 3rem; border: 3px solid #D4AF37;">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="team-info" style="padding: var(--space-xl); text-align: center;">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.3rem; color: var(--color-secondary);">Ana Ferreira</h4>
                        <p style="color: #D4AF37; font-weight: 600; font-size: 0.9rem;">Especialista em Mineração</p>
                        <p style="color: var(--gray-500); font-size: 0.9rem; line-height: 1.6; margin: var(--space-sm) 0;">
                            Geóloga com experiência em modelagem 3D, gestão de
                            recursos minerais e monitoramento ambiental.
                        </p>
                        <div style="display: flex; justify-content: center; gap: var(--space-sm);">
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Membro 5 -->
                <div class="team-card animate-fade-up delay-5">
                    <div class="team-image" style="background: linear-gradient(135deg, #00BCD4, #1976D2); display: flex; align-items: center; justify-content: center; padding: var(--space-xl); min-height: 200px;">
                        <div style="text-align: center; color: white;">
                            <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-size: 3rem; border: 3px solid white;">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="team-info" style="padding: var(--space-xl); text-align: center;">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.3rem; color: var(--color-secondary);">Carlos Mendes</h4>
                        <p style="color: var(--color-accent-2); font-weight: 600; font-size: 0.9rem;">Engenheiro de Software</p>
                        <p style="color: var(--gray-500); font-size: 0.9rem; line-height: 1.6; margin: var(--space-sm) 0;">
                            Desenvolvedor full-stack com especialização em aplicações
                            geoespaciais e sistemas de alta performance.
                        </p>
                        <div style="display: flex; justify-content: center; gap: var(--space-sm);">
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Membro 6 -->
                <div class="team-card animate-fade-up delay-6">
                    <div class="team-image" style="background: linear-gradient(135deg, #0A1628, #1A365D); display: flex; align-items: center; justify-content: center; padding: var(--space-xl); min-height: 200px;">
                        <div style="text-align: center; color: white;">
                            <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; font-size: 3rem; border: 3px solid var(--color-accent);">
                                <i class="fas fa-user-circle"></i>
                            </div>
                        </div>
                    </div>
                    <div class="team-info" style="padding: var(--space-xl); text-align: center;">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.3rem; color: var(--color-secondary);">Rita Oliveira</h4>
                        <p style="color: var(--color-accent); font-weight: 600; font-size: 0.9rem;">UX/UI Designer</p>
                        <p style="color: var(--gray-500); font-size: 0.9rem; line-height: 1.6; margin: var(--space-sm) 0;">
                            Designer de experiência focada em criar interfaces
                            intuitivas e acessíveis para plataformas complexas.
                        </p>
                        <div style="display: flex; justify-content: center; gap: var(--space-sm);">
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" style="width: 35px; height: 35px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-secondary); transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
   SECÇÃO 4: ÁREAS DE ATUAÇÃO (Submenu 4)
============================================================ -->
    <section class="section section-gray" id="setores">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-globe-africa"></i> Áreas de Atuação
                </span>
                <h2 class="section-title">
                    Onde a <span class="highlight">GeoNexus</span> atua
                </h2>
                <p class="section-description">
                    Estamos presentes nos principais setores que dependem de dados
                    geoespaciais, infraestrutura e gestão de projetos.
                </p>
            </div>

            <div class="setores-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl);">
                <?php
                $setores = [
                    ['icon' => 'fa-map', 'name' => 'Topografia', 'color' => '#E87A2E'],
                    ['icon' => 'fa-hard-hat', 'name' => 'Engenharia Civil', 'color' => '#F6AD55'],
                    ['icon' => 'fa-home', 'name' => 'Cadastro Predial', 'color' => '#D69E2E'],
                    ['icon' => 'fa-map-marked-alt', 'name' => 'GIS', 'color' => '#00BCD4'],
                    ['icon' => 'fa-seedling', 'name' => 'Agricultura', 'color' => '#2E7D32'],
                    ['icon' => 'fa-gem', 'name' => 'Mineração', 'color' => '#E65100'],
                    ['icon' => 'fa-oil-can', 'name' => 'Petróleo e Gás', 'color' => '#D4AF37'],
                    ['icon' => 'fa-bolt', 'name' => 'Energia', 'color' => '#F9A825'],
                    ['icon' => 'fa-city', 'name' => 'Urbanismo', 'color' => '#1976D2'],
                    ['icon' => 'fa-road', 'name' => 'Transportes', 'color' => '#E65100'],
                    ['icon' => 'fa-satellite', 'name' => 'Drones', 'color' => '#0288D1'],
                    ['icon' => 'fa-graduation-cap', 'name' => 'Educação', 'color' => '#F9A825']
                ];

                foreach ($setores as $setor):
                ?>
                    <div class="setor-item animate-fade-up" style="background: white; border-radius: var(--radius-xl); padding: var(--space-lg); text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; border-top: 3px solid <?php echo $setor['color']; ?>; cursor: pointer;">
                        <div style="font-size: 2.5rem; color: <?php echo $setor['color']; ?>; margin-bottom: var(--space-sm);">
                            <i class="fas <?php echo $setor['icon']; ?>"></i>
                        </div>
                        <h4 style="font-family: var(--font-secondary); font-size: 1rem; color: var(--color-secondary);"><?php echo $setor['name']; ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============================================================
   SECÇÃO 5: CARREIRAS (Submenu 5)
============================================================ -->
    <section class="section" id="carreiras">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-briefcase"></i> Carreiras
                </span>
                <h2 class="section-title">
                    Junte-se à <span class="highlight">nossa equipa</span>
                </h2>
                <p class="section-description">
                    Estamos sempre à procura de talentos apaixonados por geotecnologia,
                    engenharia e inovação para fazer parte do ecossistema GeoNexus.
                </p>
            </div>

            <div class="careers-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-xl); margin-top: var(--space-2xl);">
                <!-- Vaga 1 -->
                <div class="career-card animate-fade-up delay-1" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); border-left: 4px solid var(--color-accent-2);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-md);">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.2rem; color: var(--color-secondary);">Desenvolvedor Full-Stack</h4>
                        <span style="background: var(--gradient-accent-2); color: white; padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.7rem; font-weight: 600;">Remoto</span>
                    </div>
                    <p style="color: var(--gray-500); font-size: 0.95rem; line-height: 1.6; margin-bottom: var(--space-md);">
                        Procuramos um desenvolvedor full-stack com experiência em PHP, JavaScript,
                        PostgreSQL e GIS para integrar a nossa equipa de produto.
                    </p>
                    <div style="display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-bottom: var(--space-md);">
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-code" style="color: var(--color-accent-2);"></i> PHP</span>
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-js" style="color: #F9A825;"></i> JavaScript</span>
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-database" style="color: #00BCD4;"></i> PostgreSQL</span>
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-map" style="color: #2E7D32;"></i> GIS</span>
                    </div>
                    <a href="#" style="display: inline-flex; align-items: center; gap: 0.5rem; color: var(--color-accent-2); font-weight: 600; text-decoration: none; transition: gap 0.3s ease;" onmouseover="this.style.gap='0.75rem'" onmouseout="this.style.gap='0.5rem'">
                        Candidatar-se <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Vaga 2 -->
                <div class="career-card animate-fade-up delay-2" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); border-left: 4px solid var(--color-accent);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-md);">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.2rem; color: var(--color-secondary);">Engenheiro de Dados</h4>
                        <span style="background: var(--gradient-accent); color: white; padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.7rem; font-weight: 600;">Presencial</span>
                    </div>
                    <p style="color: var(--gray-500); font-size: 0.95rem; line-height: 1.6; margin-bottom: var(--space-md);">
                        Buscamos um engenheiro de dados para gerir e estruturar grandes volumes
                        de dados geoespaciais, garantindo performance e qualidade.
                    </p>
                    <div style="display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-bottom: var(--space-md);">
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-database" style="color: #00BCD4;"></i> PostgreSQL</span>
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-cloud" style="color: #1976D2;"></i> AWS</span>
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-chart-line" style="color: #F9A825;"></i> ETL</span>
                    </div>
                    <a href="#" style="display: inline-flex; align-items: center; gap: 0.5rem; color: var(--color-accent); font-weight: 600; text-decoration: none; transition: gap 0.3s ease;" onmouseover="this.style.gap='0.75rem'" onmouseout="this.style.gap='0.5rem'">
                        Candidatar-se <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Vaga 3 -->
                <div class="career-card animate-fade-up delay-3" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); border-left: 4px solid #F9A825;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-md);">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.2rem; color: var(--color-secondary);">Especialista em Topografia</h4>
                        <span style="background: #F9A825; color: white; padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.7rem; font-weight: 600;">Campo</span>
                    </div>
                    <p style="color: var(--gray-500); font-size: 0.95rem; line-height: 1.6; margin-bottom: var(--space-md);">
                        Procuramos um topógrafo experiente para atuar em projetos de levantamento
                        e mapeamento, com conhecimento em GNSS e estação total.
                    </p>
                    <div style="display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-bottom: var(--space-md);">
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-satellite-dish" style="color: #E87A2E;"></i> GNSS</span>
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-ruler-combined" style="color: #E65100;"></i> Estação Total</span>
                    </div>
                    <a href="#" style="display: inline-flex; align-items: center; gap: 0.5rem; color: #F9A825; font-weight: 600; text-decoration: none; transition: gap 0.3s ease;" onmouseover="this.style.gap='0.75rem'" onmouseout="this.style.gap='0.5rem'">
                        Candidatar-se <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Vaga 4 -->
                <div class="career-card animate-fade-up delay-4" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); border-left: 4px solid #00BCD4;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-md);">
                        <h4 style="font-family: var(--font-secondary); font-size: 1.2rem; color: var(--color-secondary);">Analista de Business Intelligence</h4>
                        <span style="background: #00BCD4; color: white; padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.7rem; font-weight: 600;">Híbrido</span>
                    </div>
                    <p style="color: var(--gray-500); font-size: 0.95rem; line-height: 1.6; margin-bottom: var(--space-md);">
                        Buscamos um analista de BI para transformar dados geoespaciais em
                        insights estratégicos para os nossos clientes.
                    </p>
                    <div style="display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-bottom: var(--space-md);">
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-chart-pie" style="color: #00BCD4;"></i> Power BI</span>
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-map-marked-alt" style="color: #2E7D32;"></i> GIS</span>
                        <span style="background: var(--gray-100); padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.75rem; color: var(--gray-600);"><i class="fas fa-database" style="color: #1976D2;"></i> SQL</span>
                    </div>
                    <a href="#" style="display: inline-flex; align-items: center; gap: 0.5rem; color: #00BCD4; font-weight: 600; text-decoration: none; transition: gap 0.3s ease;" onmouseover="this.style.gap='0.75rem'" onmouseout="this.style.gap='0.5rem'">
                        Candidatar-se <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- CTA Carreiras -->
            <div style="text-align: center; margin-top: var(--space-2xl); background: var(--gradient-primary); border-radius: var(--radius-xl); padding: var(--space-2xl); color: white;">
                <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; margin-bottom: var(--space-md); color: white;">
                    <i class="fas fa-rocket" style="color: var(--color-accent);"></i>
                    Não encontrou a vaga ideal?
                </h3>
                <p style="color: rgba(255,255,255,0.8); font-size: 1.1rem; max-width: 600px; margin: 0 auto var(--space-lg);">
                    Envie-nos o seu currículo e conte-nos como pode contribuir para o ecossistema GeoNexus.
                </p>
                <a href="contactos.php" class="btn btn-primary" style="background: var(--gradient-accent);">
                    <span>Enviar Candidatura Espontânea</span>
                    <i class="fas fa-arrow-right btn-arrow"></i>
                    <span class="btn-hover-effect"></span>
                </a>
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
        // SCRIPTS DA PÁGINA SOBRE
        // ============================================================

        // Loading Screen
        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loadingScreen');
            const progressFill = document.getElementById('progressFill');
            const progressPercentage = document.getElementById('progressPercentage');
            const progressMarker = document.getElementById('progressMarker');
            const statusText = document.getElementById('statusText');

            let progress = 0;
            const statusMessages = [
                'CARREGANDO INFORMAÇÕES DA EMPRESA',
                'CONHECENDO A EQUIPA',
                'PREPARANDO O CONTEÚDO',
                'TUDO PRONTO'
            ];
            let statusIndex = 0;

            const interval = setInterval(() => {
                progress += Math.random() * 3 + 1;
                if (progress > 100) progress = 100;

                progressFill.style.width = progress + '%';
                progressPercentage.textContent = Math.round(progress) + '%';

                if (progress > 30 && statusIndex === 0) {
                    statusIndex = 1;
                    statusText.textContent = statusMessages[1];
                }
                if (progress > 60 && statusIndex === 1) {
                    statusIndex = 2;
                    statusText.textContent = statusMessages[2];
                }
                if (progress > 85 && statusIndex === 2) {
                    statusIndex = 3;
                    statusText.textContent = statusMessages[3];
                }

                if (progress >= 100) {
                    clearInterval(interval);
                    progressMarker.classList.add('visible');

                    setTimeout(() => {
                        loadingScreen.classList.add('hidden');
                        document.body.style.overflow = 'auto';
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
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
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
                    btn.style.background = 'var(--gradient-accent)';

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
 
    /* Container do conteúdo */
    .historia-content {
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Texto principal */
    .historia-texto {
        margin-bottom: var(--space-3xl);
    }

    .historia-texto p {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--gray-600);
        margin-bottom: var(--space-lg);
        padding-left: var(--space-lg);
        border-left: 3px solid var(--color-accent-2);
        padding: var(--space-md) var(--space-lg);
        background: var(--gray-50);
        border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
    }

    .historia-texto p:last-child {
        margin-bottom: 0;
        border-left-color: var(--color-accent);
    }

    .historia-texto p strong {
        color: var(--color-secondary);
    }

    .historia-texto p .highlight-text {
        color: var(--color-accent-2);
        font-weight: 600;
    }

    /* Cards de Destaque */
    .historia-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-xl);
        margin-bottom: var(--space-3xl);
    }

    .historia-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: var(--space-xl);
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        border-top: 4px solid var(--color-accent-2);
        text-align: center;
    }

    .historia-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }

    .historia-card:nth-child(2) {
        border-top-color: var(--color-accent);
    }

    .historia-card:nth-child(3) {
        border-top-color: #F9A825;
    }

    .historia-card:nth-child(4) {
        border-top-color: #00BCD4;
    }

    .historia-card:nth-child(5) {
        border-top-color: #2E7D32;
    }

    .historia-card:nth-child(6) {
        border-top-color: #E65100;
    }

    .historia-card .card-number {
        font-family: var(--font-secondary);
        font-size: 2rem;
        font-weight: 800;
        color: var(--color-accent-2);
        margin-bottom: var(--space-sm);
        opacity: 0.6;
    }

    .historia-card h4 {
        font-family: var(--font-secondary);
        font-size: 1.1rem;
        color: var(--color-secondary);
        margin-bottom: var(--space-sm);
    }

    .historia-card p {
        color: var(--gray-500);
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0;
    }

    /* Citação */
    .historia-citacao {
        margin-top: var(--space-2xl);
    }

    .citacao-container {
        background: var(--gradient-primary);
        border-radius: var(--radius-xl);
        padding: var(--space-2xl);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .citacao-container::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 60%;
        height: 200%;
        background: radial-gradient(circle, rgba(46, 204, 113, 0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    .citacao-container i {
        font-size: 3rem;
        color: var(--color-accent);
        opacity: 0.3;
        margin-bottom: var(--space-md);
        display: block;
    }

    .citacao-container blockquote {
        font-family: var(--font-secondary);
        font-size: 1.3rem;
        font-weight: 500;
        line-height: 1.6;
        margin: 0 0 var(--space-lg) 0;
        position: relative;
        z-index: 1;
        font-style: italic;
    }

    .citacao-container blockquote::before {
        content: '"';
        font-size: 4rem;
        color: var(--color-accent);
        opacity: 0.2;
        position: absolute;
        top: -20px;
        left: -10px;
    }

    .citacao-autor {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        position: relative;
        z-index: 1;
    }

    .citacao-autor strong {
        font-size: 1.1rem;
        color: white;
    }

    .citacao-autor span {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
    }

    /* Responsividade */
    @media (max-width: 1024px) {
        .historia-cards {
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-lg);
        }
    }

    @media (max-width: 768px) {
        .historia-texto p {
            font-size: 0.95rem;
            padding: var(--space-md);
            border-left-width: 3px;
        }

        .historia-cards {
            grid-template-columns: 1fr;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .citacao-container blockquote {
            font-size: 1.1rem;
        }

        .citacao-container {
            padding: var(--space-xl);
        }
    }

    @media (max-width: 480px) {
        .historia-texto p {
            font-size: 0.9rem;
            padding: var(--space-sm);
        }

        .citacao-container blockquote {
            font-size: 1rem;
        }

        .citacao-container i {
            font-size: 2rem;
        }
    }

    /* ============================================================
   PÁGINA SOBRE / EMPRESA
============================================================ */

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