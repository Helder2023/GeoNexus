<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus — Ecossistema de Engenharia e Geotecnologia</title>

    <!-- Meta Tags -->
    <meta name="description" content="GeoNexus é o ecossistema que conecta topografia, engenharia, GIS, agricultura, mineração e gestão de projetos num único lugar.">
    <meta name="keywords" content="topografia, engenharia, GIS, agricultura, mineração, geotecnologia, SaaS">
    <meta name="author" content="GeoNexus">

    <!-- Open Graph -->
    <meta property="og:title" content="GeoNexus — Ecossistema de Engenharia e Geotecnologia">
    <meta property="og:description" content="Conectando o Território, a Engenharia e o Futuro">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geonnexus.com">

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
   HERO SECTION
============================================================ -->
    <section class="hero-section" id="hero">
        <!-- Partículas de fundo -->
        <div class="hero-particles" id="particles">
            <div class="particle" style="left: 10%; animation-duration: 18s; animation-delay: 0s;"></div>
            <div class="particle" style="left: 25%; animation-duration: 22s; animation-delay: 2s;"></div>
            <div class="particle" style="left: 40%; animation-duration: 20s; animation-delay: 4s;"></div>
            <div class="particle" style="left: 55%; animation-duration: 25s; animation-delay: 1s;"></div>
            <div class="particle" style="left: 70%; animation-duration: 19s; animation-delay: 3s;"></div>
            <div class="particle" style="left: 85%; animation-duration: 23s; animation-delay: 5s;"></div>
            <div class="particle" style="left: 15%; animation-duration: 21s; animation-delay: 6s;"></div>
            <div class="particle" style="left: 50%; animation-duration: 24s; animation-delay: 7s;"></div>
            <div class="particle" style="left: 75%; animation-duration: 17s; animation-delay: 8s;"></div>
            <div class="particle" style="left: 90%; animation-duration: 26s; animation-delay: 9s;"></div>
        </div>

        <div class="container hero-container" style="margin-bottom: 50px;">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-rocket"></i>
                    <span>Plataforma SaaS de Geotecnologia</span>
                </div>

                <h1 class="hero-title">
                    Conectando o <br>
                    <span class="highlight">Território</span>, a <br>
                    <span class="highlight-blue">Engenharia</span> e o <br>
                    <span class="highlight">Futuro</span>
                </h1>

                <p class="hero-subtitle">
                    A GeoNexus é o ecossistema que unifica <strong>topografia</strong>,
                    <strong>engenharia civil</strong>, <strong>GIS</strong>,
                    <strong>agricultura de precisão</strong> e
                    <strong>gestão de projetos</strong> num único lugar.
                </p>

                <div class="hero-actions">
                    <a href="registo.php" class="btn btn-primary">
                        <span>Começar Gratuitamente</span>
                        <i class="fas fa-arrow-right btn-arrow"></i>
                        <span class="btn-hover-effect"></span>
                    </a>
                    <a href="solucoes.php" class="btn btn-outline-light">
                        <i class="fas fa-play-circle"></i>
                        <span>Ver Demonstração</span>
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="number" data-count="12">0</div>
                        <div class="label">Setores Cobertos</div>
                    </div>
                    <div class="hero-stat">
                        <div class="number" data-count="5000">0</div>
                        <div class="label">Projetos Geridos</div>
                    </div>
                    <div class="hero-stat">
                        <div class="number" data-count="98">0</div>
                        <div class="label">% Satisfação</div>
                    </div>

                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-orb"></div>
                <div class="hero-dashboard">
                    <div class="dashboard-card">
                        <div class="card-header">
                            <span class="dot green"></span>
                            <span class="dot yellow"></span>
                            <span class="dot red"></span>
                            <span class="card-title">Levantamento Topográfico</span>
                        </div>
                        <div class="chart-bar">
                            <div class="bar" style="--height: 40px;"></div>
                            <div class="bar" style="--height: 65px;"></div>
                            <div class="bar" style="--height: 80px;"></div>
                            <div class="bar" style="--height: 55px;"></div>
                            <div class="bar" style="--height: 90px;"></div>
                            <div class="bar" style="--height: 70px;"></div>
                            <div class="bar" style="--height: 45px;"></div>
                            <div class="bar" style="--height: 85px;"></div>
                        </div>
                        <div class="stat-row">
                            <div class="stat">
                                <div class="value">247</div>
                                <div class="label">Pontos</div>
                            </div>
                            <div class="stat">
                                <div class="value">12.4ha</div>
                                <div class="label">Área</div>
                            </div>
                            <div class="stat">
                                <div class="value">98%</div>
                                <div class="label">Precisão</div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-card" style="animation-delay: 2s;">
                        <div class="card-header">
                            <span class="dot green"></span>
                            <span class="dot green"></span>
                            <span class="dot yellow"></span>
                            <span class="card-title">GIS - Análise Territorial</span>
                        </div>
                        <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 10px;">
                            <span style="background: rgba(46,204,113,0.2); padding: 2px 10px; border-radius: 12px; font-size: 0.7rem;">Camadas</span>
                            <span style="background: rgba(230,57,70,0.2); padding: 2px 10px; border-radius: 12px; font-size: 0.7rem;">Satélite</span>
                            <span style="background: rgba(249,168,37,0.2); padding: 2px 10px; border-radius: 12px; font-size: 0.7rem;">3D</span>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px;">
                            <div style="background: rgba(255,255,255,0.05); padding: 6px; border-radius: 6px; text-align: center;">
                                <div style="font-size: 0.8rem; font-weight: 700;">1.2k</div>
                                <div style="font-size: 0.6rem; opacity: 0.6;">Features</div>
                            </div>
                            <div style="background: rgba(255,255,255,0.05); padding: 6px; border-radius: 6px; text-align: center;">
                                <div style="font-size: 0.8rem; font-weight: 700;">8</div>
                                <div style="font-size: 0.6rem; opacity: 0.6;">Layers</div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-card" style="animation-delay: 4s; width: 55%; left: 25%;">
                        <div class="card-header">
                            <span class="dot yellow"></span>
                            <span class="dot green"></span>
                            <span class="dot red"></span>
                            <span class="card-title">Projetos Ativos</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; gap: 10px;">
                            <div style="text-align: center;">
                                <div style="font-size: 1.2rem; font-weight: 700;">47</div>
                                <div style="font-size: 0.6rem; opacity: 0.6;">Em Andamento</div>
                            </div>
                            <div style="text-align: center;">
                                <div style="font-size: 1.2rem; font-weight: 700;">12</div>
                                <div style="font-size: 0.6rem; opacity: 0.6;">Concluídos</div>
                            </div>
                            <div style="text-align: center;">
                                <div style="font-size: 1.2rem; font-weight: 700;">8</div>
                                <div style="font-size: 0.6rem; opacity: 0.6;">Pendentes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <span class="text">Scroll para explorar</span>
        </div>
    </section>

    <!-- ============================================================
   SETORES / SOLUÇÕES
============================================================ -->
    <section class="solutions-section section" id="solucoes">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-cubes"></i> Nossas Soluções
                </span>
                <h2 class="section-title">
                    Tecnologia que <span class="highlight">Impulsiona</span> <br>o Território
                </h2>
                <p class="section-description">
                    Oferecemos um ecossistema completo com soluções para os principais setores
                    que dependem de dados espaciais, terreno, infraestrutura e gestão de ativos.
                </p>
            </div>

            <div class="solutions-grid">
                <!-- Card 1: Topografia -->
                <div class="solution-card animate-fade-up delay-1">
                    <div class="card-icon" style="background: linear-gradient(135deg, #E87A2E, #F6AD55);">
                        <i class="fas fa-map"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <span class="card-badge">⭐ Núcleo</span>
                    <h3 class="card-title">Topografia e Geomensura</h3>
                    <p class="card-description">
                        Levantamentos topográficos, GNSS/GPS, estação total,
                        nivelamento, cálculos de áreas e volumes, curvas de nível e MDT.
                    </p>
                    <ul class="card-features">
                        <li><i class="fas fa-check-circle"></i> Levantamentos de precisão</li>
                        <li><i class="fas fa-check-circle"></i> Cálculos automáticos</li>
                        <li><i class="fas fa-check-circle"></i> Relatórios técnicos</li>
                    </ul>
                    <a href="solucoes.php#topografia" class="card-link">
                        Explorar Solução <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="card-background"></div>
                </div>

                <!-- Card 2: Engenharia Civil -->
                <div class="solution-card animate-fade-up delay-2">
                    <div class="card-icon" style="background: linear-gradient(135deg, #F6AD55, #DD6B20);">
                        <i class="fas fa-hard-hat"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="card-title">Engenharia Civil e Construção</h3>
                    <p class="card-description">
                        Gestão de obras, planeamento de projetos, acompanhamento de progresso,
                        medições, mapas da obra e gestão de equipas.
                    </p>
                    <ul class="card-features">
                        <li><i class="fas fa-check-circle"></i> Acompanhamento em tempo real</li>
                        <li><i class="fas fa-check-circle"></i> Controle documental</li>
                        <li><i class="fas fa-check-circle"></i> Relatórios para clientes</li>
                    </ul>
                    <a href="solucoes.php#engenharia" class="card-link">
                        Explorar Solução <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="card-background"></div>
                </div>

                <!-- Card 3: Cadastro -->
                <div class="solution-card animate-fade-up delay-3">
                    <div class="card-icon" style="background: linear-gradient(135deg, #D69E2E, #B7791F);">
                        <i class="fas fa-home"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="card-title">Cadastro Predial e Ordenamento</h3>
                    <p class="card-description">
                        Cadastro de terrenos, limites de propriedades, parcelamento,
                        mapas urbanos e gestão fundiária.
                    </p>
                    <ul class="card-features">
                        <li><i class="fas fa-check-circle"></i> Gestão de propriedades</li>
                        <li><i class="fas fa-check-circle"></i> Mapas cadastrais</li>
                        <li><i class="fas fa-check-circle"></i> Regularização fundiária</li>
                    </ul>
                    <a href="solucoes.php#cadastro" class="card-link">
                        Explorar Solução <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="card-background"></div>
                </div>

                <!-- Card 4: GIS -->
                <div class="solution-card animate-fade-up delay-4">
                    <div class="card-icon" style="background: linear-gradient(135deg, #00BCD4, #1976D2);">
                        <i class="fas fa-map-marked-alt"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="card-title">Sistemas de Informação Geográfica</h3>
                    <p class="card-description">
                        Mapas inteligentes, camadas geográficas, análise territorial,
                        gestão de dados espaciais e visualização 2D/3D.
                    </p>
                    <ul class="card-features">
                        <li><i class="fas fa-check-circle"></i> Análise espacial</li>
                        <li><i class="fas fa-check-circle"></i> Visualização 3D</li>
                        <li><i class="fas fa-check-circle"></i> Consultas geoespaciais</li>
                    </ul>
                    <a href="solucoes.php#gis" class="card-link">
                        Explorar Solução <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="card-background"></div>
                </div>

                <!-- Card 5: Agricultura -->
                <div class="solution-card animate-fade-up delay-5">
                    <div class="card-icon" style="background: linear-gradient(135deg, #2E7D32, #43A047);">
                        <i class="fas fa-seedling"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="card-title">Agricultura de Precisão</h3>
                    <p class="card-description">
                        Mapeamento de propriedades agrícolas, monitoramento de culturas,
                        drones agrícolas, análise do solo e planeamento de irrigação.
                    </p>
                    <ul class="card-features">
                        <li><i class="fas fa-check-circle"></i> Índices de vegetação (NDVI)</li>
                        <li><i class="fas fa-check-circle"></i> Monitoramento de culturas</li>
                        <li><i class="fas fa-check-circle"></i> Planeamento de irrigação</li>
                    </ul>
                    <a href="solucoes.php#agricultura" class="card-link">
                        Explorar Solução <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="card-background"></div>
                </div>

                <!-- Card 6: Mineração -->
                <div class="solution-card animate-fade-up delay-6">
                    <div class="card-icon" style="background: linear-gradient(135deg, #E65100, #BF360C);">
                        <i class="fas fa-gem"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="card-title">Mineração e Recursos Naturais</h3>
                    <p class="card-description">
                        Modelação de terrenos, levantamentos 3D, controle de áreas exploradas,
                        monitoramento de minas e gestão de ativos.
                    </p>
                    <ul class="card-features">
                        <li><i class="fas fa-check-circle"></i> Modelagem 3D</li>
                        <li><i class="fas fa-check-circle"></i> Controle de escavação</li>
                        <li><i class="fas fa-check-circle"></i> Gestão de pilhas de minério</li>
                    </ul>
                    <a href="solucoes.php#mineracao" class="card-link">
                        Explorar Solução <i class="fas fa-arrow-right"></i>
                    </a>
                    <div class="card-background"></div>
                </div>
            </div>

            <div style="text-align: center; margin-top: var(--space-2xl);">
                <a href="solucoes.php" class="btn btn-secondary">
                    Ver Todas as Soluções
                    <i class="fas fa-arrow-right btn-arrow"></i>
                    <span class="btn-hover-effect"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================
   SOBRE / DIFERENCIAIS
============================================================ -->
    <section class="section section-gray" id="sobre">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-rocket"></i> Sobre a GeoNexus
                </span>
                <h2 class="section-title">
                    O Ecossistema que <span class="highlight">Transforma</span> <br>o Setor de Geotecnologia
                </h2>
                <p class="section-description">
                    A GeoNexus nasceu para unificar as ferramentas que profissionais e empresas
                    utilizam no dia a dia, criando uma plataforma única e integrada.
                </p>
            </div>

            <div class="values-grid">
                <div class="value-card animate-fade-up delay-1">
                    <div class="value-icon">
                        <i class="fas fa-universal-access"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h4 class="value-title">Unificação</h4>
                    <p class="value-description">
                        Tudo num só lugar: topografia, engenharia, GIS, agricultura,
                        mineração e gestão de projetos.
                    </p>
                </div>

                <div class="value-card animate-fade-up delay-2">
                    <div class="value-icon" style="background: var(--gradient-accent-2);">
                        <i class="fas fa-brain"></i>
                        <div class="icon-glow" style="background: var(--color-accent-2);"></div>
                    </div>
                    <h4 class="value-title">Inteligência</h4>
                    <p class="value-description">
                        IA e automações para otimizar processos, reduzir erros e
                        aumentar a produtividade da sua equipa.
                    </p>
                </div>

                <div class="value-card animate-fade-up delay-3">
                    <div class="value-icon" style="background: var(--gradient-accent);">
                        <i class="fas fa-chart-line"></i>
                        <div class="icon-glow" style="background: var(--color-accent);"></div>
                    </div>
                    <h4 class="value-title">Escalabilidade</h4>
                    <p class="value-description">
                        Cresça com a plataforma. Do profissional autónomo à grande
                        empresa, a GeoNexus acompanha o seu negócio.
                    </p>
                </div>

                <div class="value-card animate-fade-up delay-4">
                    <div class="value-icon" style="background: var(--gradient-cool);">
                        <i class="fas fa-shield-alt"></i>
                        <div class="icon-glow" style="background: #1976D2;"></div>
                    </div>
                    <h4 class="value-title">Confiabilidade</h4>
                    <p class="value-description">
                        Dados seguros, precisão milimétrica e suporte especializado
                        para garantir o sucesso dos seus projetos.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
   COMO FUNCIONA
============================================================ -->
    <!-- ============================================================
   COMO FUNCIONA
============================================================ -->
    <section class="section" id="como-funciona">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-play-circle"></i> Como Funciona
                </span>
                <h2 class="section-title">
                    Comece a usar a <span class="highlight">GeoNexus</span> <br>em 3 passos simples
                </h2>
                <p class="section-description">
                    Da criação da conta à gestão dos seus projetos, tudo é rápido e intuitivo.
                    <strong>Escolha o perfil que melhor se adapta a si.</strong>
                </p>
            </div>

            <!-- ==========================================
        PASSO 1: CRIE SUA CONTA
        ========================================== -->

            <section class="section" id="como-funciona">
                <div class="container">
                    <div class="section-header animate-fade-up">
                        <span class="section-badge">
                            <i class="fas fa-play-circle"></i> Como Funciona
                        </span>
                        <h2 class="section-title">
                            Comece a usar a <span class="highlight">GeoNexus</span> <br>em 3 passos simples
                        </h2>
                        <p class="section-description">
                            Da criação da conta à gestão dos seus projetos, tudo é rápido e intuitivo.
                            <strong>Escolha o perfil que melhor se adapta a si.</strong>
                        </p>
                    </div>

                    <div class="como-funciona-grid">

                        <!-- Card 1: Individual -->
                        <div class="value-card animate-fade-up delay-1">
                            <div class="card-step">
                                <div class="step-number step-number-green">1</div>
                                <h4 class="step-title">Crie sua conta</h4>
                            </div>
                            <p class="step-description">
                                Registe-se gratuitamente e escolha o plano que melhor se adapta
                                às suas necessidades. Comece com o plano Individual ou Empresarial.
                            </p>
                            <div class="step-tags">
                                <span class="tag tag-individual"><i class="fas fa-user"></i> Individual</span>
                                <span class="tag tag-empresarial"><i class="fas fa-building"></i> Empresarial</span>
                                <span class="tag tag-institucional"><i class="fas fa-university"></i> Institucional</span>
                                <span class="tag tag-cliente"><i class="fas fa-user-check"></i> Cliente</span>
                            </div>
                            <div class="step-info">
                                <i class="fas fa-clock"></i>
                                <span>Cadastro rápido em <strong>menos de 5 minutos</strong></span>
                            </div>
                        </div>

                        <!-- Card 2: Configure seu projeto -->
                        <div class="value-card animate-fade-up delay-2">
                            <div class="card-step">
                                <div class="step-number step-number-red">2</div>
                                <h4 class="step-title">Configure seu projeto</h4>
                            </div>
                            <p class="step-description">
                                Crie o seu primeiro projeto, defina os levantamentos, importe dados
                                e comece a utilizar todas as ferramentas da plataforma.
                            </p>
                            <div class="step-tags">
                                <span class="tag tag-topografia"><i class="fas fa-map"></i> Topografia</span>
                                <span class="tag tag-engenharia"><i class="fas fa-hard-hat"></i> Engenharia</span>
                                <span class="tag tag-agricultura"><i class="fas fa-seedling"></i> Agricultura</span>
                                <span class="tag tag-gis"><i class="fas fa-map-marked-alt"></i> GIS</span>
                            </div>
                            <div class="step-info">
                                <i class="fas fa-magic"></i>
                                <span>Configure em <strong>3 passos</strong> com assistência inteligente</span>
                            </div>
                        </div>

                        <!-- Card 3: Colabore e entregue -->
                        <div class="value-card animate-fade-up delay-3">
                            <div class="card-step">
                                <div class="step-number step-number-green">3</div>
                                <h4 class="step-title">Colabore e entregue</h4>
                            </div>
                            <p class="step-description">
                                Trabalhe em equipa, acompanhe o progresso, gere relatórios
                                e entregue projetos com qualidade e precisão.
                            </p>
                            <div class="step-tags">
                                <span class="tag tag-equipas"><i class="fas fa-users"></i> Equipas</span>
                                <span class="tag tag-relatorios"><i class="fas fa-file-pdf"></i> Relatórios</span>
                                <span class="tag tag-compartilhar"><i class="fas fa-cloud-upload-alt"></i> Compartilhar</span>
                                <span class="tag tag-dashboard"><i class="fas fa-chart-line"></i> Dashboard</span>
                            </div>
                            <div class="step-info">
                                <i class="fas fa-rocket"></i>
                                <span>Entregue projetos com <strong>98% de precisão</strong></span>
                            </div>
                        </div>

                        <!-- Card 4: Benefícios por Perfil -->
                        <div class="value-card animate-fade-up delay-4">
                            <div class="card-step">
                                <div class="step-number step-number-yellow">✓</div>
                                <h4 class="step-title">Benefícios por Perfil</h4>
                            </div>
                            <p class="step-description">
                                Cada perfil tem ferramentas específicas para maximizar a sua produtividade.
                            </p>
                            <div class="benefits-list">
                                <div class="benefit-item benefit-individual">
                                    <i class="fas fa-user"></i>
                                    <span><strong>Individual:</strong> Projetos pessoais, CAD/GIS, relatórios</span>
                                </div>
                                <div class="benefit-item benefit-empresarial">
                                    <i class="fas fa-building"></i>
                                    <span><strong>Empresarial:</strong> Equipas, CRM, financeiro, RH</span>
                                </div>
                                <div class="benefit-item benefit-institucional">
                                    <i class="fas fa-university"></i>
                                    <span><strong>Institucional:</strong> Licenças ilimitadas, suporte 24/7</span>
                                </div>
                                <div class="benefit-item benefit-cliente">
                                    <i class="fas fa-user-check"></i>
                                    <span><strong>Cliente:</strong> Acompanhamento de projetos, documentos</span>
                                </div>
                            </div>
                            <div class="step-info">
                                <i class="fas fa-check-circle"></i>
                                <span><strong>+1500</strong> profissionais já confiam na GeoNexus</span>
                            </div>
                        </div>

                    </div>

                    <!-- CTA Final -->
                    <div class="como-funciona-cta">
                        <a href="registo.php" class="btn btn-primary">
                            <span>Começar Agora</span>
                            <i class="fas fa-arrow-right btn-arrow"></i>
                            <span class="btn-hover-effect"></span>
                        </a>
                    </div>

                </div>
            </section>
        </div>
    </section>

    <!-- ============================================================
   BLOG / INSIGHTS
============================================================ -->
    <section class="section section-gray" id="blog">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-newspaper"></i> Insights & Inovação
                </span>
                <h2 class="section-title">
                    Conhecimento que <span class="highlight">Transforma</span>
                </h2>
                <p class="section-description">
                    Artigos exclusivos sobre as mais recentes tendências em geotecnologia,
                    cases reais e insights que impulsionam a inovação.
                </p>
            </div>

            <div class="blog-grid">
                <!-- Artigo 1 -->
                <article class="blog-card animate-fade-up delay-1">
                    <div class="card-image" style="background: linear-gradient(135deg, #0A1628, #1A365D);">
                        <i class="fas fa-satellite-dish"></i>
                        <div class="overlay"></div>
                        <span class="category-tag">Topografia</span>
                        <span class="date-tag"><i class="far fa-calendar-alt"></i> 15 Jul 2024</span>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Como a tecnologia GNSS está revolucionando os levantamentos topográficos</h4>
                        <p class="card-excerpt">
                            Descubra como os sistemas GNSS de última geração estão aumentando a precisão
                            e eficiência dos levantamentos topográficos em todo o mundo.
                        </p>
                        <div class="card-footer">
                            <div class="author">
                                <div class="avatar">AM</div>
                                <span class="name">Ana Martins</span>
                            </div>
                            <span class="read-time"><i class="far fa-clock"></i> 5 min</span>
                        </div>
                    </div>
                </article>

                <!-- Artigo 2 -->
                <article class="blog-card animate-fade-up delay-2">
                    <div class="card-image" style="background: linear-gradient(135deg, #2E7D32, #43A047);">
                        <i class="fas fa-drone"></i>
                        <div class="overlay"></div>
                        <span class="category-tag">Agricultura</span>
                        <span class="date-tag"><i class="far fa-calendar-alt"></i> 10 Jul 2024</span>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Drones e agricultura de precisão: o futuro da produção agrícola</h4>
                        <p class="card-excerpt">
                            Como os drones estão transformando a agricultura, permitindo monitoramento
                            de culturas e análise de solo com precisão milimétrica.
                        </p>
                        <div class="card-footer">
                            <div class="author">
                                <div class="avatar">JC</div>
                                <span class="name">João Costa</span>
                            </div>
                            <span class="read-time"><i class="far fa-clock"></i> 4 min</span>
                        </div>
                    </div>
                </article>

                <!-- Artigo 3 -->
                <article class="blog-card animate-fade-up delay-3">
                    <div class="card-image" style="background: linear-gradient(135deg, #E65100, #BF360C);">
                        <i class="fas fa-gem"></i>
                        <div class="overlay"></div>
                        <span class="category-tag">Mineração</span>
                        <span class="date-tag"><i class="far fa-calendar-alt"></i> 5 Jul 2024</span>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Modelagem 3D em mineração: como a tecnologia está transformando o setor</h4>
                        <p class="card-excerpt">
                            A modelagem 3D permite um controle mais preciso das áreas exploradas,
                            otimizando recursos e aumentando a segurança nas minas.
                        </p>
                        <div class="card-footer">
                            <div class="author">
                                <div class="avatar">PS</div>
                                <span class="name">Pedro Silva</span>
                            </div>
                            <span class="read-time"><i class="far fa-clock"></i> 6 min</span>
                        </div>
                    </div>
                </article>
            </div>

            <div style="text-align: center; margin-top: var(--space-2xl);">
                <a href="blog.php" class="btn btn-outline">
                    Explorar Todos os Artigos
                    <i class="fas fa-arrow-right btn-arrow"></i>
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
        // SCRIPTS ADICIONAIS DA PÁGINA INICIAL
        // ============================================================

        // Loading Screen com progresso
        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loadingScreen');
            const progressFill = document.getElementById('progressFill');
            const progressPercentage = document.getElementById('progressPercentage');
            const progressMarker = document.getElementById('progressMarker');
            const statusText = document.getElementById('statusText');

            let progress = 0;
            const statusMessages = [
                'CONECTANDO AOS SATÉLITES GNSS',
                'INICIALIZANDO MÓDULO DE LEVANTAMENTO',
                'CARREGANDO DADOS GEOESPACIAIS',
                'SISTEMA PRONTO PARA USO'
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

                        // Iniciar animações de contagem
                        animateCounters();
                    }, 800);
                }
            }, 120);
        });

        // ============================================================
        // ANIMAÇÃO DE CONTADORES
        // ============================================================
        function animateCounters() {
            const counters = document.querySelectorAll('[data-count]');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const step = Math.max(1, Math.floor(target / 60));
                let current = 0;

                const updateCounter = () => {
                    current += step;
                    if (current >= target) {
                        current = target;
                    }
                    counter.textContent = current.toLocaleString();
                    if (current < target) {
                        requestAnimationFrame(updateCounter);
                    }
                };

                updateCounter();
            });
        }

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
                // Simulação de envio
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
        // ANIMAÇÃO DE SCROLL - INTERSECTION OBSERVER
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

        // Observar elementos com classe animate-fade-up
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
   COMO FUNCIONA - ESTILOS RESPONSIVOS
   ============================================================ */

/* ============================================
   GRID PRINCIPAL
============================================ */
.como-funciona-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-xl);
    margin-top: var(--space-2xl);
}

/* ============================================
   CARDS
============================================ */
.value-card {
    background: white;
    border-radius: var(--radius-xl);
    padding: var(--space-xl);
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    border-top: 4px solid #2ECC71;
    text-align: left;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.value-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-xl);
}

/* Cores das bordas */
.value-card:nth-child(1) { border-top-color: #2ECC71; }
.value-card:nth-child(2) { border-top-color: #E63946; }
.value-card:nth-child(3) { border-top-color: #2ECC71; }
.value-card:nth-child(4) { border-top-color: #F9A825; }

/* ============================================
   STEP HEADER
============================================ */
.card-step {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    margin-bottom: var(--space-md);
}

.step-number {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 800;
    font-size: 1.2rem;
    flex-shrink: 0;
}

.step-number-green {
    background: linear-gradient(135deg, #2ECC71, #1ABC9C);
}

.step-number-red {
    background: linear-gradient(135deg, #E63946, #FF6B7A);
}

.step-number-yellow {
    background: linear-gradient(135deg, #F9A825, #E65100);
}

.step-title {
    margin: 0;
    font-size: 1.1rem;
    color: var(--color-secondary);
    font-family: var(--font-secondary);
}

/* ============================================
   DESCRIÇÃO
============================================ */
.step-description {
    color: var(--gray-500);
    font-size: 0.9rem;
    line-height: 1.7;
    margin-bottom: var(--space-md);
    flex: 1;
}

/* ============================================
   TAGS
============================================ */
.step-tags {
    display: flex;
    gap: var(--space-sm);
    flex-wrap: wrap;
    margin-bottom: var(--space-md);
}

.tag {
    padding: 0.2rem 0.8rem;
    border-radius: var(--radius-full);
    font-size: 0.7rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

.tag-individual {
    background: rgba(46, 204, 113, 0.12);
    color: #2ECC71;
}

.tag-empresarial {
    background: rgba(230, 57, 70, 0.12);
    color: #E63946;
}

.tag-institucional {
    background: rgba(249, 168, 37, 0.12);
    color: #F9A825;
}

.tag-cliente {
    background: rgba(0, 188, 212, 0.12);
    color: #00BCD4;
}

.tag-topografia {
    background: rgba(232, 122, 46, 0.12);
    color: #E87A2E;
}

.tag-engenharia {
    background: rgba(246, 173, 85, 0.12);
    color: #F6AD55;
}

.tag-agricultura {
    background: rgba(46, 125, 50, 0.12);
    color: #2E7D32;
}

.tag-gis {
    background: rgba(0, 188, 212, 0.12);
    color: #00BCD4;
}

.tag-equipas {
    background: rgba(46, 204, 113, 0.12);
    color: #2ECC71;
}

.tag-relatorios {
    background: rgba(230, 57, 70, 0.12);
    color: #E63946;
}

.tag-compartilhar {
    background: rgba(0, 188, 212, 0.12);
    color: #00BCD4;
}

.tag-dashboard {
    background: rgba(249, 168, 37, 0.12);
    color: #F9A825;
}

/* ============================================
   INFO BOX
============================================ */
.step-info {
    padding: var(--space-sm);
    background: var(--gray-50);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.75rem;
    color: var(--gray-500);
    margin-top: auto;
}

.step-info i {
    flex-shrink: 0;
}

.step-info i.fa-clock {
    color: var(--color-accent-2);
}

.step-info i.fa-magic {
    color: var(--color-accent);
}

.step-info i.fa-rocket {
    color: #F9A825;
}

.step-info i.fa-check-circle {
    color: var(--color-accent);
}

.step-info strong {
    color: var(--color-secondary);
}

/* ============================================
   BENEFITS LIST
============================================ */
.benefits-list {
    display: flex;
    flex-direction: column;
    gap: var(--space-xs);
    margin-bottom: var(--space-md);
    flex: 1;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.3rem 0.5rem;
    border-radius: var(--radius-sm);
    font-size: 0.75rem;
    color: var(--gray-600);
}

.benefit-item i {
    font-size: 0.8rem;
    flex-shrink: 0;
    width: 18px;
    text-align: center;
}

.benefit-individual {
    background: rgba(46, 204, 113, 0.06);
}
.benefit-individual i { color: #2ECC71; }

.benefit-empresarial {
    background: rgba(230, 57, 70, 0.06);
}
.benefit-empresarial i { color: #E63946; }

.benefit-institucional {
    background: rgba(249, 168, 37, 0.06);
}
.benefit-institucional i { color: #F9A825; }

.benefit-cliente {
    background: rgba(0, 188, 212, 0.06);
}
.benefit-cliente i { color: #00BCD4; }

.benefit-item strong {
    color: var(--color-secondary);
}

/* ============================================
   CTA FINAL
============================================ */
.como-funciona-cta {
    text-align: center;
    margin-top: var(--space-3xl);
}

.como-funciona-cta .btn {
    padding: 1rem 3rem;
    font-size: 1.1rem;
}

.cta-note {
    color: var(--gray-500);
    font-size: 0.85rem;
    margin-top: var(--space-md);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.3rem;
}

.cta-note i {
    color: var(--color-accent);
}

/* ============================================
   RESPONSIVIDADE
============================================ */

/* Tablets grandes / Desktop pequeno */
@media (max-width: 1024px) {
    .como-funciona-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: var(--space-lg);
    }
}

/* Tablets */
@media (max-width: 768px) {
    .como-funciona-grid {
        grid-template-columns: 1fr;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .value-card {
        padding: var(--space-lg);
    }

    .step-number {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }

    .step-title {
        font-size: 1rem;
    }

    .step-description {
        font-size: 0.85rem;
    }

    .step-tags {
        gap: 0.3rem;
    }

    .tag {
        font-size: 0.65rem;
        padding: 0.15rem 0.6rem;
    }

    .benefit-item {
        font-size: 0.7rem;
        padding: 0.25rem 0.4rem;
    }

    .como-funciona-cta .btn {
        padding: 0.8rem 2rem;
        font-size: 1rem;
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}

/* Mobile pequeno */
@media (max-width: 480px) {
    .value-card {
        padding: var(--space-md);
    }

    .card-step {
        gap: var(--space-sm);
        margin-bottom: var(--space-sm);
    }

    .step-number {
        width: 36px;
        height: 36px;
        font-size: 0.9rem;
    }

    .step-title {
        font-size: 0.9rem;
    }

    .step-description {
        font-size: 0.8rem;
        margin-bottom: var(--space-sm);
    }

    .step-tags {
        gap: 0.2rem;
        margin-bottom: var(--space-sm);
    }

    .tag {
        font-size: 0.55rem;
        padding: 0.1rem 0.4rem;
    }

    .tag i {
        font-size: 0.55rem;
    }

    .step-info {
        font-size: 0.65rem;
        padding: var(--space-xs);
    }

    .benefit-item {
        font-size: 0.65rem;
        padding: 0.2rem 0.3rem;
        gap: 0.3rem;
    }

    .benefit-item i {
        font-size: 0.7rem;
        width: 16px;
    }

    .como-funciona-cta {
        margin-top: var(--space-2xl);
    }

    .como-funciona-cta .btn {
        font-size: 0.9rem;
        padding: 0.7rem 1.5rem;
    }

    .cta-note {
        font-size: 0.75rem;
        flex-wrap: wrap;
        justify-content: center;
    }
}

/* Mobile muito pequeno (até 360px) */
@media (max-width: 360px) {
    .value-card {
        padding: var(--space-sm);
    }

    .step-number {
        width: 32px;
        height: 32px;
        font-size: 0.8rem;
    }

    .step-title {
        font-size: 0.8rem;
    }

    .step-description {
        font-size: 0.75rem;
    }

    .tag {
        font-size: 0.5rem;
        padding: 0.1rem 0.3rem;
    }

    .tag i {
        display: none;
    }

    .benefit-item {
        font-size: 0.6rem;
    }

    .step-info {
        font-size: 0.6rem;
        flex-wrap: wrap;
    }
}
</style>
</html>