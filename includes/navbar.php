<!-- ============================================================
   🎮 GEONEXUS - NAVEGAÇÃO PRINCIPAL (CORRIGIDA)
   ============================================================ -->
<nav class="navbar" id="mainNav">
    <div class="container">
        <div class="nav-container">

            <!-- Logo -->
            <a href="index.php" class="nav-logo">
                <img src="../assets/images/logo-nav.png" alt="GeoNexus - Ecossistema de Engenharia e Geotecnologia" class="logo-image">
            </a>

            <!-- Menu Desktop -->
            <div class="nav-menu" id="navMenu">
                <div class="menu-left">

                    <!-- ===== HOME ===== -->
                    <a href="index.php" class="nav-link active" data-text="Início" data-page="index">
                        <i class="fas fa-home"></i>
                        <span>Início</span>
                        <div class="link-underline"></div>
                    </a>

                    <!-- ===== EMPRESA ===== -->
                    <div class="nav-dropdown" data-dropdown="empresa">
                        <a href="sobre.php" class="nav-link" data-text="Empresa" data-page="sobre">
                            <span>Empresa</span>
                            <i class="fas fa-chevron-down dropdown-icon"></i>
                            <div class="link-underline"></div>
                        </a>
                        <div class="dropdown-content dropdown-content-small">
                            <div class="dropdown-grid dropdown-grid-1">
                                <div class="dropdown-column">
                                    <a href="sobre.php#historia">
                                        <div><i class="fas fa-building"></i> Sobre a GeoNexus</div>
                                    </a>
                                    <a href="sobre.php#missao">
                                        <div><i class="fas fa-bullseye"></i> Missão e Valores</div>
                                    </a>
                                    <a href="sobre.php#equipa">
                                        <div><i class="fas fa-users"></i> Nossa Equipa</div>
                                    </a>
                                    <a href="sobre.php#setores">
                                        <div><i class="fas fa-globe-africa"></i> Áreas de Atuação</div>
                                    </a>
                                    <a href="sobre.php#carreiras">
                                        <div><i class="fas fa-briefcase"></i> Carreiras</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== SOLUÇÕES ===== -->
                    <div class="nav-dropdown" data-dropdown="solucoes">
                        <a href="solucoes.php" class="nav-link" data-text="Soluções" data-page="solucoes">
                            <span>Soluções</span>
                            <i class="fas fa-chevron-down dropdown-icon"></i>
                            <div class="link-underline"></div>
                        </a>
                        <div class="dropdown-content dropdown-content-large">
                            <div class="dropdown-grid dropdown-grid-4">

                                <!-- COLUNA 1: Geociências -->
                                <div class="dropdown-column">
                                    <h4 class="dropdown-title">
                                        <i class="fas fa-ruler-combined"></i> Geociências
                                    </h4>
                                    <a href="solucoes.php#topografia">
                                        <i class="fas fa-map"></i>
                                        Topografia e Geomensura
                                        <small>Levantamentos, GNSS/GPS</small>
                                    </a>
                                    <a href="solucoes.php#engenharia">
                                        <i class="fas fa-hard-hat"></i>
                                        Engenharia Civil
                                        <small>Obras, planeamento</small>
                                    </a>
                                    <a href="solucoes.php#cadastro">
                                        <i class="fas fa-home"></i>
                                        Cadastro Predial
                                        <small>Terrenos, regularização</small>
                                    </a>
                                </div>

                                <!-- COLUNA 2: Análise Territorial -->
                                <div class="dropdown-column">
                                    <h4 class="dropdown-title">
                                        <i class="fas fa-globe"></i> Análise Territorial
                                    </h4>
                                    <a href="solucoes.php#gis">
                                        <i class="fas fa-map-marked-alt"></i>
                                        GIS
                                        <small>Mapas, análise espacial</small>
                                    </a>
                                    <a href="solucoes.php#agricultura">
                                        <i class="fas fa-seedling"></i>
                                        Agricultura de Precisão
                                        <small>Mapeamento, drones</small>
                                    </a>
                                    <a href="solucoes.php#mineracao">
                                        <i class="fas fa-gem"></i>
                                        Mineração
                                        <small>Modelação 3D</small>
                                    </a>
                                </div>

                                <!-- COLUNA 3: Infraestrutura -->
                                <div class="dropdown-column">
                                    <h4 class="dropdown-title">
                                        <i class="fas fa-industry"></i> Infraestrutura
                                    </h4>
                                    <a href="solucoes.php#petroleo">
                                        <i class="fas fa-oil-can"></i>
                                        Petróleo e Gás
                                        <small>Instalações, dutos</small>
                                    </a>
                                    <a href="solucoes.php#energia">
                                        <i class="fas fa-bolt"></i>
                                        Energia e Telecomunicações
                                        <small>Redes, torres</small>
                                    </a>
                                    <a href="solucoes.php#urbanismo">
                                        <i class="fas fa-city"></i>
                                        Arquitetura e Urbanismo
                                        <small>BIM, planeamento</small>
                                    </a>
                                </div>

                                <!-- COLUNA 4: Transversal -->
                                <div class="dropdown-column">
                                    <h4 class="dropdown-title">
                                        <i class="fas fa-arrows-alt-h"></i> Transversal
                                    </h4>
                                    <a href="solucoes.php#transportes">
                                        <i class="fas fa-road"></i>
                                        Transportes
                                        <small>Estradas, pontes</small>
                                    </a>
                                    <a href="solucoes.php#drones">
                                        <i class="fas fa-satellite"></i>
                                        Drones e Fotogrametria
                                        <small>Imagens aéreas</small>
                                    </a>
                                    <a href="solucoes.php#educacao">
                                        <i class="fas fa-graduation-cap"></i>
                                        Educação e Formação
                                        <small>Universidades</small>
                                    </a>
                                </div>

                                <!-- Rodapé -->
                                <div class="dropdown-footer">
                                    <a href="solucoes.php" class="view-all">
                                        <i class="fas fa-arrow-right"></i> Ver todas as soluções →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== PLANOS ===== -->
                    <div class="nav-dropdown" data-dropdown="planos">
                        <a href="planos.php" class="nav-link" data-text="Planos" data-page="planos">
                            <span>Planos</span>
                            <i class="fas fa-chevron-down dropdown-icon"></i>
                            <div class="link-underline"></div>
                        </a>
                        <div class="dropdown-content dropdown-content-medium">
                            <div class="dropdown-grid dropdown-grid-3" style="grid-template-columns: repeat(3, 1fr); min-width: 600px;">

                                <!-- COLUNA 1: Individual -->
                                <div class="dropdown-column">
                                    <h4 class="dropdown-title">
                                        <i class="fas fa-user"></i> Individual
                                    </h4>
                                    <a href="planos.php#individual">
                                        <i class="fas fa-user-circle"></i>
                                        Plano Individual
                                        <small>Topógrafos e engenheiros autónomos</small>
                                    </a>
                                </div>

                                <!-- COLUNA 2: Empresarial -->
                                <div class="dropdown-column">
                                    <h4 class="dropdown-title">
                                        <i class="fas fa-building"></i> Empresarial
                                    </h4>
                                    <a href="planos.php#empresarial">
                                        <i class="fas fa-building"></i>
                                        Plano Empresarial
                                        <small>Empresas e organizações</small>
                                    </a>
                                </div>

                                <!-- COLUNA 3: Institucional -->
                                <div class="dropdown-column">
                                    <h4 class="dropdown-title">
                                        <i class="fas fa-university"></i> Institucional
                                    </h4>
                                    <a href="planos.php#institucional">
                                        <i class="fas fa-university"></i>
                                        Plano Institucional
                                        <small>Universidades, governos e instituições</small>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ===== CONTACTO ===== -->
                    <div class="nav-dropdown" data-dropdown="contacto">
                        <a href="contactos.php" class="nav-link" data-text="Contacto" data-page="contactos">
                            <span>Contacto</span>
                            <i class="fas fa-chevron-down dropdown-icon"></i>
                            <div class="link-underline"></div>
                        </a>
                        <div class="dropdown-content dropdown-content-small">
                            <div class="dropdown-grid dropdown-grid-1">
                                <div class="dropdown-column">
                                    <a href="contactos.php#formulario">
                                        <div><i class="fas fa-envelope"></i> Formulário de Contacto</div>
                                    </a>
                                    <a href="contactos.php#suporte">
                                        <div><i class="fas fa-headset"></i> Suporte Técnico</div>
                                    </a>
                                    <a href="contactos.php#localizacao">
                                        <div><i class="fas fa-map-marker-alt"></i> Localização</div>
                                    </a>
                                    <a href="contactos.php#whatsapp" class="whatsapp-link">
                                        <div><i class="fab fa-whatsapp"></i> WhatsApp</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="menu-right">

                    <!-- ===== NOTÍCIAS ===== -->
                    <div class="nav-dropdown" data-dropdown="noticias">
                        <a href="blog.php" class="nav-link" data-text="Notícias" data-page="blog">
                            <span>Notícias</span>
                            <i class="fas fa-chevron-down dropdown-icon"></i>
                            <div class="link-underline"></div>
                        </a>
                        <div class="dropdown-content dropdown-content-medium dropdown-content-right">
                            <div class="dropdown-grid dropdown-grid-1" style="grid-template-columns: 1fr;">
                                <div class="dropdown-column">
                                    <h4 class="dropdown-title">
                                        <div><i class="fas fa-blog"></i> Artigos do Blog</div>
                                    </h4>
                                    <a href="blog.php">
                                        <div><i class="fas fa-newspaper"></i> Todos os Artigos</div>
                                    </a>
                                    <a href="blog.php#tutoriais">
                                        <div><i class="fas fa-video"></i> Tutoriais</div>
                                    </a>
                                    <a href="blog.php#cases">
                                        <div><i class="fas fa-chart-line"></i> Cases de Sucesso</div>
                                    </a>
                                    <a href="blog.php#entrevistas">
                                        <div><i class="fas fa-microphone"></i> Entrevistas</div>
                                    </a>
                                    <a href="blog.php#noticias">
                                        <div><i class="fas fa-bullhorn"></i> Notícias da GeoNexus</div>
                                    </a>
                                    <a href="blog.php" class="view-all" style="margin-top: 0.5rem; padding-top: 0.5rem; border-top: 1px solid var(--dropdown-border);">
                                        <i class="fas fa-arrow-right"></i> Ver todos os artigos →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== FAQ ===== -->
                    <a href="faq.php" class="nav-link" data-text="FAQ" data-page="faq">
                        <i class="fas fa-question-circle"></i>
                        <span>FAQ</span>
                        <div class="link-underline"></div>
                    </a>

                    <!-- ===== LOGIN ===== -->
                    <a href="login.php" class="nav-cta" data-page="login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Entrar</span>
                    </a>
                </div>
            </div>

            <!-- Botão Mobile -->
            <button class="nav-toggle" id="navToggle" aria-label="Menu" type="button">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>
</nav>

<!-- ============================================================
   OFFCANVAS MENU - Mobile (HARMONIZADO)
   ============================================================ -->

<div class="offcanvas" id="offcanvasMenu">
    <div class="offcanvas-header">
        <div class="offcanvas-logo">
            <img src="../assets/images/logo-nav.png" alt="GeoNexus">
        </div>
        <button class="offcanvas-close" id="offcanvasClose">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="offcanvas-body">

        <!-- ===== HOME ===== -->
        <a href="index.php" class="offcanvas-link active" data-page="index">
            <i class="fas fa-home"></i>
            <span>Início</span>
        </a>

        <!-- ===== EMPRESA ===== -->
        <a href="sobre.php" class="offcanvas-link" data-page="sobre">
            <i class="fas fa-building"></i>
            <span>Empresa</span>
        </a>

        <!-- ===== SOLUÇÕES ===== -->
        <a href="solucoes.php" class="offcanvas-link" data-page="solucoes">
            <i class="fas fa-cogs"></i>
            <span>Soluções</span>
        </a>

        <!-- ===== PLANOS ===== -->
        <a href="planos.php" class="offcanvas-link" data-page="planos">
            <i class="fas fa-crown"></i>
            <span>Planos</span>
        </a>

        <!-- ===== CONTACTO ===== -->
        <a href="contactos.php" class="offcanvas-link" data-page="contactos">
            <i class="fas fa-envelope"></i>
            <span>Contacto</span>
        </a>

        <!-- ===== NOTÍCIAS ===== -->
        <a href="blog.php" class="offcanvas-link" data-page="blog">
            <i class="fas fa-newspaper"></i>
            <span>Notícias</span>
        </a>

        <!-- ===== FAQ ===== -->
        <a href="faq.php" class="offcanvas-link" data-page="faq">
            <i class="fas fa-question-circle"></i>
            <span>FAQ</span>
        </a>

        <!-- ===== LOGIN ===== -->
        <a href="login.php" class="offcanvas-link offcanvas-login" data-page="login">
            <i class="fas fa-sign-in-alt"></i>
            <span>Entrar</span>
            <i class="fas fa-arrow-right"></i>
        </a>

        <!-- ===== COMEÇAR GRÁTIS ===== -->
        <a href="registo.php" class="offcanvas-link offcanvas-cta" data-page="registo">
            <i class="fas fa-rocket"></i>
            <span>Começar Grátis</span>
            <i class="fas fa-arrow-right"></i>
        </a>

    </div>

</div>
<!-- Overlay -->
<div class="offcanvas-overlay" id="offcanvasOverlay"></div>

<style>
    /* Links do dropdown que são âncoras */
    .dropdown-column a[href*="#"] {
        cursor: pointer;
    }

    /* Efeito de hover para links com âncora */
    .dropdown-column a[href*="#"]:hover {
        background: #F8F9FA;
        color: #E63946;
    }

    /* Ícones dos links com âncora */
    .dropdown-column a[href*="#"] i {
        transition: transform 0.3s ease;
    }

    .dropdown-column a[href*="#"]:hover i {
        transform: scale(1.1);
    }

    /* Pequeno indicador visual de que é uma âncora */
    .dropdown-column a[href*="#"]::after {
        content: '↗';
        font-size: 0.6rem;
        margin-left: auto;
        opacity: 0;
        transition: opacity 0.3s ease;
        color: #E63946;
    }

    .dropdown-column a[href*="#"]:hover::after {
        opacity: 1;
    }

    /* ============================================
   VARIÁVEIS
============================================ */
    :root {
        --nav-bg: rgba(255, 255, 255, 0.98);
        --nav-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
        --nav-border: rgba(0, 0, 0, 0.06);
        --nav-text: #1A1A2E;
        --nav-text-hover: #E63946;
        --nav-text-active: #E63946;
        --dropdown-bg: #ffffff;
        --dropdown-shadow: 0 20px 60px rgba(0, 0, 0, 0.12), 0 8px 20px rgba(0, 0, 0, 0.05);
        --dropdown-border: #E8ECF1;
        --dropdown-radius: 16px;
        --offcanvas-bg: #ffffff;
        --offcanvas-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
        --transition-fast: 0.2s ease;
        --transition-normal: 0.3s ease;
        --transition-slow: 0.5s ease;

        /* Espaçamentos do dropdown */
        --dropdown-padding: 1.8rem;
        --dropdown-gap: 1.5rem;
        --dropdown-column-gap: 0.3rem;
        --dropdown-item-padding: 0.6rem 1rem;
    }

    /* ============================================
   NAVEGAÇÃO PRINCIPAL
============================================ */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: var(--nav-bg);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        z-index: 1000;
        padding: 0.5rem 0;
        border-bottom: 1px solid var(--nav-border);
        transition: all var(--transition-normal);
    }

    .navbar.scrolled {
        box-shadow: var(--nav-shadow);
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* ============================================
   LOGO
============================================ */
    .nav-logo {
        display: flex;
        align-items: center;
        text-decoration: none;
        gap: 0.75rem;
        flex-shrink: 0;
    }

    .nav-logo .logo-image {
        height: 40px;
        width: 50px;
        width: auto;
        transition: transform var(--transition-fast);
    }

    .nav-logo:hover .logo-image {
        transform: scale(1.05);
    }

    .nav-logo .logo-text {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1.3rem;
        color: #1D3557;
    }

    .nav-logo .logo-text .highlight {
        color: #E63946;
    }

    /* ============================================
   MENU DESKTOP
============================================ */
    .nav-menu {
        display: flex;
        align-items: center;
        gap: 0.15rem;
    }

    .menu-left,
    .menu-right {
        display: flex;
        align-items: center;
        gap: 0.15rem;
    }

    /* ============================================
   LINKS DO NAVBAR
============================================ */
    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        color: var(--nav-text);
        text-decoration: none;
        font-weight: 500;
        padding: 0.5rem 0.9rem;
        position: relative;
        transition: color var(--transition-fast);
        font-size: 0.9rem;
        border-radius: 8px;
        cursor: pointer;
        background: transparent;
        border: none;
        white-space: nowrap;
    }

    .nav-link:hover {
        color: var(--nav-text-hover);
    }

    .nav-link .link-underline {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2.5px;
        background: linear-gradient(135deg, #E63946, #FF6B7A);
        transform: translateX(-50%);
        transition: width var(--transition-normal);
        border-radius: 2px;
    }

    .nav-link:hover .link-underline,
    .nav-link.active .link-underline {
        width: 60%;
    }

    .nav-link.active {
        color: var(--nav-text-active) !important;
    }

    .nav-link i {
        font-size: 0.85rem;
        color: #6B7280;
        transition: color var(--transition-fast);
    }

    .nav-link:hover i,
    .nav-link.active i {
        color: var(--nav-text-active);
    }

    /* ============================================
   DROPDOWN - PRINCIPAL
============================================ */
    .nav-dropdown {
        position: relative;
    }

    .dropdown-icon {
        font-size: 0.55rem;
        transition: transform var(--transition-normal);
        margin-left: 0.1rem;
        color: #6B7280;
    }

    .nav-dropdown:hover .dropdown-icon,
    .nav-dropdown.active .dropdown-icon {
        transform: rotate(180deg);
        color: var(--nav-text-hover);
    }

    /* ============================================
   DROPDOWN CONTENT - ESTILO PRINCIPAL
============================================ */
    .dropdown-content {
        position: absolute;
        top: calc(100% + 10px);
        left: 50%;
        transform: translateX(-50%) translateY(8px);
        background: var(--dropdown-bg);
        border-radius: var(--dropdown-radius);
        box-shadow: var(--dropdown-shadow);
        padding: var(--dropdown-padding);
        opacity: 0;
        visibility: hidden;
        transition: all var(--transition-normal);
        z-index: 100;
        border: 1px solid var(--dropdown-border);
        min-width: 220px;
        max-width: 95vw;
        pointer-events: none;
    }

    .nav-dropdown:hover .dropdown-content,
    .nav-dropdown.active .dropdown-content {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
        pointer-events: auto;
    }

    .dropdown-content-right {
        left: auto;
        right: 0;
        transform: translateX(0) translateY(8px);
    }

    .nav-dropdown:hover .dropdown-content-right,
    .nav-dropdown.active .dropdown-content-right {
        transform: translateX(0) translateY(0);
    }

    /* ============================================
   DROPDOWN - TAMANHOS ESPECÍFICOS
============================================ */

    /* Dropdown pequeno (Empresa, Contacto, FAQ) */
    .dropdown-content-small {
        min-width: 240px;
        padding: 0.8rem 0.5rem;
    }

    /* Dropdown médio (Planos, Notícias) */
    .dropdown-content-medium {
        min-width: 420px;
        padding: 1.5rem;
    }

    /* Dropdown grande (Soluções - 4 colunas) */
    .dropdown-content-large {
        min-width: 860px;
        max-width: 95vw;
        padding: 1.8rem 2rem;
    }

    /* ============================================
   DROPDOWN GRID
============================================ */
    .dropdown-grid {
        display: grid;
        gap: var(--dropdown-gap);
    }

    .dropdown-grid-1 {
        grid-template-columns: 1fr;
    }

    .dropdown-grid-2 {
        grid-template-columns: repeat(2, 1fr);
    }

    .dropdown-grid-3 {
        grid-template-columns: repeat(3, 1fr);
    }

    .dropdown-grid-4 {
        grid-template-columns: repeat(4, 1fr);
    }

    /* ============================================
   DROPDOWN COLUNA
============================================ */
    .dropdown-column {
        display: flex;
        flex-direction: column;
        gap: var(--dropdown-column-gap);
        min-width: 0;
    }

    .dropdown-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        color: #1D3557;
        margin-bottom: 0.5rem;
        padding: 0 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #E8ECF1;
        padding-bottom: 0.5rem;
    }

    .dropdown-title i {
        color: #E63946;
        font-size: 0.85rem;
    }

    /* ============================================
   DROPDOWN ITEMS
============================================ */
    .dropdown-column a {
        display: flex;
        flex-direction: column;
        gap: 0.05rem;
        padding: var(--dropdown-item-padding);
        color: #4A4F5A;
        text-decoration: none;
        font-size: 0.85rem;
        border-radius: 8px;
        transition: all var(--transition-fast);
        position: relative;
        line-height: 1.4;
    }

    .dropdown-column a:hover {
        background: #F3F4F6;
        color: #E63946;
    }

    .dropdown-column a i {
        font-size: 0.95rem;
        width: 22px;
        text-align: center;
        flex-shrink: 0;
        transition: transform var(--transition-fast);
    }

    .dropdown-column a:hover i {
        transform: scale(1.1);
    }

    .dropdown-column a small {
        font-size: 0.7rem;
        color: #9CA3AF;
        padding-left: 30px;
        line-height: 1.3;
        font-weight: 400;
    }

    .dropdown-column a:hover small {
        color: #6B7280;
    }

    /* ============================================
   DROPDOWN FOOTER
============================================ */
    .dropdown-footer {
        grid-column: 1 / -1;
        border-top: 1px solid var(--dropdown-border);
        padding-top: 1rem;
        margin-top: 0.5rem;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .view-all {
        font-weight: 600;
        color: #E63946 !important;
        padding: 0.5rem 1.2rem !important;
        flex-direction: row !important;
        align-items: center !important;
        gap: 0.5rem !important;
    }

    .view-all i {
        color: #E63946 !important;
        width: auto !important;
    }

    .view-all:hover {
        background: rgba(230, 57, 70, 0.08) !important;
    }

    /* ============================================
   WHATSAPP LINK
============================================ */
    .whatsapp-link {
        color: #25D366 !important;
    }

    .whatsapp-link i {
        color: #25D366 !important;
    }

    .whatsapp-link:hover {
        background: rgba(37, 211, 102, 0.08) !important;
        color: #1DA851 !important;
    }

    .whatsapp-link:hover i {
        color: #1DA851 !important;
    }

    /* ============================================
   CTA BUTTONS
============================================ */
    .nav-cta {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1.3rem;
        background: linear-gradient(135deg, #E63946, #FF6B7A);
        color: white !important;
        border-radius: 9999px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all var(--transition-normal);
        border: none;
        cursor: pointer;
        white-space: nowrap;
        box-shadow: 0 2px 10px rgba(230, 57, 70, 0.2);
    }

    .nav-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(230, 57, 70, 0.35);
        color: white !important;
    }

    .nav-cta i {
        color: white !important;
        font-size: 0.85rem;
    }

    /* ============================================
   MOBILE TOGGLE
============================================ */
    .nav-toggle {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        z-index: 1001;
        flex-shrink: 0;
    }

    .hamburger-line {
        display: block;
        width: 25px;
        height: 2.5px;
        background: #1D3557;
        margin: 5px 0;
        transition: all var(--transition-normal);
        border-radius: 2px;
    }

    .nav-toggle.active .hamburger-line:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .nav-toggle.active .hamburger-line:nth-child(2) {
        opacity: 0;
    }

    .nav-toggle.active .hamburger-line:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }

    /* ============================================
   OFFCANVAS MENU
============================================ */
    .offcanvas {
        position: fixed;
        top: 0;
        right: -100%;
        width: 100%;
        max-width: 360px;
        height: 100vh;
        background: var(--offcanvas-bg);
        box-shadow: var(--offcanvas-shadow);
        z-index: 2000;
        transition: right var(--transition-normal);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .offcanvas.active {
        right: 0;
    }

    .offcanvas-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1999;
        opacity: 0;
        visibility: hidden;
        transition: all var(--transition-normal);
    }

    .offcanvas-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* Header do Offcanvas */
    .offcanvas-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.2rem 1.5rem;
        border-bottom: 1px solid var(--dropdown-border);
        background: var(--offcanvas-bg);
        flex-shrink: 0;
    }

    .offcanvas-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .offcanvas-logo img {
        height: 35px;
        width: auto;
    }

    .offcanvas-logo span {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 1.2rem;
        color: #1D3557;
    }

    .offcanvas-logo span .highlight {
        color: #E63946;
    }

    .offcanvas-close {
        width: 40px;
        height: 40px;
        background: #EFF1F5;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all var(--transition-normal);
        color: #1D3557;
        font-size: 1.2rem;
    }

    .offcanvas-close:hover {
        background: #E63946;
        color: white;
        transform: rotate(90deg);
    }

    /* Corpo do Offcanvas */
    .offcanvas-body {
        flex: 1;
        overflow-y: auto;
        padding: 0.5rem 0;
    }

    .offcanvas-link {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.8rem 1.5rem;
        text-decoration: none;
        color: #2A2D34;
        font-weight: 500;
        font-size: 1rem;
        transition: all var(--transition-fast);
        border-left: 3px solid transparent;
    }

    .offcanvas-link i {
        width: 24px;
        color: #5C5F6B;
        font-size: 1.1rem;
        transition: color var(--transition-fast);
        text-align: center;
    }

    .offcanvas-link:hover {
        background: rgba(230, 57, 70, 0.05);
        color: #E63946;
        border-left-color: #E63946;
    }

    .offcanvas-link:hover i {
        color: #E63946;
    }

    .offcanvas-link.active {
        color: #E63946;
        background: rgba(230, 57, 70, 0.08);
        border-left-color: #E63946;
    }

    .offcanvas-link.active i {
        color: #E63946;
    }

    /* Offcanvas Dropdown */
    .offcanvas-dropdown {
        border-bottom: 1px solid var(--dropdown-border);
    }

    .offcanvas-dropdown:last-of-type {
        border-bottom: none;
    }

    .offcanvas-dropdown-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.8rem 1.5rem;
        cursor: pointer;
        font-weight: 500;
        color: #2A2D34;
        transition: all var(--transition-fast);
        user-select: none;
    }

    .offcanvas-dropdown-header i:first-child {
        width: 24px;
        color: #5C5F6B;
        text-align: center;
    }

    .offcanvas-dropdown-header .dropdown-arrow {
        margin-left: auto;
        transition: transform var(--transition-normal);
        font-size: 0.8rem;
    }

    .offcanvas-dropdown.active .offcanvas-dropdown-header .dropdown-arrow {
        transform: rotate(180deg);
    }

    .offcanvas-dropdown-body {
        display: none;
        padding: 0.3rem 0 0.8rem 3.5rem;
        background: #F8F9FA;
    }

    .offcanvas-dropdown.active .offcanvas-dropdown-body {
        display: block;
    }

    .offcanvas-group {
        margin-bottom: 0.6rem;
    }

    .offcanvas-group-title {
        display: block;
        font-size: 0.65rem;
        text-transform: uppercase;
        color: #9CA3AF;
        font-weight: 600;
        padding: 0.3rem 0.8rem;
        letter-spacing: 0.5px;
    }

    .offcanvas-sub-link {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.4rem 0.8rem;
        text-decoration: none;
        color: #5C5F6B;
        font-size: 0.9rem;
        transition: all var(--transition-fast);
        border-radius: 6px;
    }

    .offcanvas-sub-link i {
        width: 20px;
        text-align: center;
        font-size: 0.9rem;
    }

    .offcanvas-sub-link:hover {
        background: rgba(230, 57, 70, 0.05);
        color: #E63946;
    }

    .offcanvas-view-all {
        border-top: 1px solid var(--dropdown-border);
        margin-top: 0.5rem;
        padding-top: 0.8rem;
        font-weight: 600;
        color: #E63946 !important;
    }

    .offcanvas-view-all i {
        color: #E63946 !important;
    }

    /* Offcanvas Login e CTA */
    .offcanvas-login {
        border-bottom: 1px solid var(--dropdown-border);
        margin-top: 0.5rem;
    }

    .offcanvas-login i {
        color: #1D3557 !important;
    }

    .offcanvas-cta {
        background: linear-gradient(135deg, #2ECC71, #1ABC9C);
        color: white !important;
        margin: 0.8rem 1.5rem;
        border-radius: 9999px;
        border-left: none !important;
        justify-content: center;
    }

    .offcanvas-cta i {
        color: white !important;
    }

    .offcanvas-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
        background: linear-gradient(135deg, #27AE60, #16A085) !important;
        color: white !important;
    }

    /* Rodapé Offcanvas */
    .offcanvas-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--dropdown-border);
        background: var(--offcanvas-bg);
        flex-shrink: 0;
    }

    .offcanvas-social {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 0.8rem;
    }

    .offcanvas-social a {
        width: 36px;
        height: 36px;
        background: #EFF1F5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1D3557;
        transition: all var(--transition-fast);
        text-decoration: none;
    }

    .offcanvas-social a:hover {
        background: #E63946;
        color: white;
        transform: translateY(-3px);
    }

    .offcanvas-copyright p {
        font-size: 0.7rem;
        text-align: center;
        color: #9CA3AF;
        margin: 0;
    }

    /* ============================================
   RESPONSIVIDADE
============================================ */
    @media (max-width: 1024px) {
        .nav-menu {
            display: none;
        }

        .nav-toggle {
            display: block;
        }

        .nav-container {
            padding: 0 1rem;
        }

        /* Dropdowns em mobile viram accordion */
        .dropdown-content {
            position: static;
            transform: none !important;
            opacity: 1;
            visibility: visible;
            box-shadow: none;
            border: none;
            border-radius: 0;
            padding: 0.5rem 0 0.5rem 1rem;
            background: #F8F9FA;
            display: none;
            min-width: 100% !important;
            max-width: 100% !important;
            pointer-events: auto;
        }

        .nav-dropdown.active .dropdown-content {
            display: block;
        }

        .nav-dropdown:hover .dropdown-content {
            opacity: 1;
            visibility: visible;
            transform: none;
        }

        .dropdown-content-large {
            min-width: 100% !important;
            padding: 0.5rem 0 0.5rem 1rem;
        }

        .dropdown-grid {
            grid-template-columns: 1fr !important;
            gap: 0.5rem !important;
        }

        .dropdown-column {
            gap: 0.1rem;
        }

        .dropdown-footer {
            flex-direction: column;
            gap: 0.3rem;
            align-items: flex-start;
            padding-top: 0.5rem;
            margin-top: 0.3rem;
        }

        .dropdown-title {
            font-size: 0.75rem;
            margin-bottom: 0.3rem;
            padding-bottom: 0.3rem;
        }

        .dropdown-column a {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 768px) {
        .nav-logo .logo-text {
            font-size: 1.1rem;
        }

        .nav-logo .logo-image {
            height: 35px;
        }

        .offcanvas {
            max-width: 300px;
        }
    }

    @media (max-width: 480px) {
        .nav-logo .logo-text {
            font-size: 0.9rem;
        }

        .nav-logo .logo-image {
            height: 30px;
        }

        .offcanvas {
            max-width: 280px;
        }

        .nav-container {
            padding: 0 0.8rem;
        }
    }

    /* ============================================
   ACESSIBILIDADE
============================================ */
    @media (prefers-reduced-motion: reduce) {

        .navbar,
        .nav-link .link-underline,
        .dropdown-content,
        .offcanvas,
        .offcanvas-dropdown-header .dropdown-arrow {
            transition-duration: 0.01ms !important;
        }
    }
</style>
<style>
    /* ============================================================
   HARMONIA ENTRE NAVBAR E OFFCANVAS
   ============================================================ */

    /* ============================================
   OFFCANVAS - MESMO ESTILO DO NAVBAR
============================================ */
    .offcanvas-link {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.8rem 1.5rem;
        text-decoration: none;
        color: #2A2D34;
        font-weight: 500;
        font-size: 1rem;
        transition: all var(--transition-fast);
        border-left: 3px solid transparent;
    }

    .offcanvas-link i {
        width: 24px;
        color: #5C5F6B;
        font-size: 1.1rem;
        transition: color var(--transition-fast);
        text-align: center;
    }

    .offcanvas-link:hover {
        background: rgba(230, 57, 70, 0.05);
        color: #E63946;
        border-left-color: #E63946;
    }

    .offcanvas-link:hover i {
        color: #E63946;
    }

    .offcanvas-link.active {
        color: #E63946;
        background: rgba(230, 57, 70, 0.08);
        border-left-color: #E63946;
    }

    .offcanvas-link.active i {
        color: #E63946;
    }

    /* Active indicator (checkmark) */
    .active-indicator {
        margin-left: auto;
        font-size: 0.8rem;
        color: #E63946;
    }

    /* Offcanvas Dropdown Header - mesmo estilo dos links */
    .offcanvas-dropdown-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.8rem 1.5rem;
        cursor: pointer;
        font-weight: 500;
        color: #2A2D34;
        transition: all var(--transition-fast);
        user-select: none;
    }

    .offcanvas-dropdown-header i:first-child {
        width: 24px;
        color: #5C5F6B;
        text-align: center;
    }

    .offcanvas-dropdown-header .dropdown-arrow {
        margin-left: auto;
        transition: transform var(--transition-normal);
        font-size: 0.8rem;
        color: #9CA3AF;
    }

    .offcanvas-dropdown.active .offcanvas-dropdown-header .dropdown-arrow {
        transform: rotate(180deg);
        color: #E63946;
    }

    /* Offcanvas Dropdown Body */
    .offcanvas-dropdown-body {
        display: none;
        padding: 0.3rem 0 0.8rem 3.5rem;
        background: #F8F9FA;
    }

    .offcanvas-dropdown.active .offcanvas-dropdown-body {
        display: block;
    }

    /* Sub-links */
    .offcanvas-sub-link {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.4rem 0.8rem;
        text-decoration: none;
        color: #5C5F6B;
        font-size: 0.9rem;
        transition: all var(--transition-fast);
        border-radius: 6px;
    }

    .offcanvas-sub-link i {
        width: 20px;
        text-align: center;
        font-size: 0.9rem;
        color: #5C5F6B;
        transition: color var(--transition-fast);
    }

    .offcanvas-sub-link:hover {
        background: rgba(230, 57, 70, 0.05);
        color: #E63946;
    }

    .offcanvas-sub-link:hover i {
        color: #E63946;
    }

    /* Offcanvas View All */
    .offcanvas-view-all {
        border-top: 1px solid var(--dropdown-border);
        margin-top: 0.5rem;
        padding-top: 0.8rem;
        font-weight: 600;
        color: #E63946 !important;
    }

    .offcanvas-view-all i {
        color: #E63946 !important;
    }

    /* Offcanvas Groups */
    .offcanvas-group {
        margin-bottom: 0.6rem;
    }

    .offcanvas-group-title {
        display: block;
        font-size: 0.65rem;
        text-transform: uppercase;
        color: #9CA3AF;
        font-weight: 600;
        padding: 0.3rem 0.8rem;
        letter-spacing: 0.5px;
    }

    /* Offcanvas CTAs */
    .offcanvas-login {
        border-bottom: 1px solid var(--dropdown-border);
        margin-top: 0.5rem;
    }

    .offcanvas-login i {
        color: #1D3557 !important;
    }

    .offcanvas-cta {
        background: linear-gradient(135deg, #2ECC71, #1ABC9C);
        color: white !important;
        margin: 0.8rem 1.5rem;
        border-radius: 9999px;
        border-left: none !important;
        justify-content: center;
    }

    .offcanvas-cta i {
        color: white !important;
    }

    .offcanvas-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
        background: linear-gradient(135deg, #27AE60, #16A085) !important;
        color: white !important;
    }

    /* Offcanvas Footer */
    .offcanvas-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--dropdown-border);
        background: var(--offcanvas-bg);
        flex-shrink: 0;
    }

    .offcanvas-social {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 0.8rem;
    }

    .offcanvas-social a {
        width: 36px;
        height: 36px;
        background: #EFF1F5;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1D3557;
        transition: all var(--transition-fast);
        text-decoration: none;
    }

    .offcanvas-social a:hover {
        background: #E63946;
        color: white;
        transform: translateY(-3px);
    }

    .offcanvas-copyright p {
        font-size: 0.7rem;
        text-align: center;
        color: #9CA3AF;
        margin: 0;
    }
</style>

<script>
    // ============================================================
// 🎮 GEONEXUS - NAVBAR JAVASCRIPT (VERSÃO FINAL)
// ============================================================

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // ============================================
    // ELEMENTOS
    // ============================================
    const navbar = document.getElementById('mainNav');
    const navToggle = document.getElementById('navToggle');
    const offcanvas = document.getElementById('offcanvasMenu');
    const offcanvasOverlay = document.getElementById('offcanvasOverlay');
    const offcanvasClose = document.getElementById('offcanvasClose');
    
    const navLinks = document.querySelectorAll('.nav-link');
    const offcanvasLinks = document.querySelectorAll('.offcanvas-link');
    const offcanvasSubLinks = document.querySelectorAll('.offcanvas-sub-link');
    const offcanvasDropdowns = document.querySelectorAll('.offcanvas-dropdown');
    const offcanvasDropdownHeaders = document.querySelectorAll('.offcanvas-dropdown-header');
    const navDropdowns = document.querySelectorAll('.nav-dropdown');

    // ============================================
    // FUNÇÕES DO OFFCANVAS
    // ============================================

    function openOffcanvas() {
        offcanvas.classList.add('active');
        offcanvasOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        navToggle.classList.add('active');
    }

    function closeOffcanvas() {
        offcanvas.classList.remove('active');
        offcanvasOverlay.classList.remove('active');
        document.body.style.overflow = '';
        navToggle.classList.remove('active');
    }

    // ============================================
    // EVENTOS DO OFFCANVAS
    // ============================================

    if (navToggle) {
        navToggle.addEventListener('click', openOffcanvas);
    }

    if (offcanvasClose) {
        offcanvasClose.addEventListener('click', closeOffcanvas);
    }

    if (offcanvasOverlay) {
        offcanvasOverlay.addEventListener('click', closeOffcanvas);
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && offcanvas.classList.contains('active')) {
            closeOffcanvas();
        }
    });

    // Fechar offcanvas ao clicar em qualquer link interno
    document.querySelectorAll('.offcanvas a, .offcanvas-sub-link, .offcanvas-link').forEach(function(link) {
        link.addEventListener('click', function() {
            setTimeout(closeOffcanvas, 150);
        });
    });

    // ============================================
    // DROPDOWNS DO OFFCANVAS (TOGGLE)
    // ============================================

    offcanvasDropdownHeaders.forEach(function(header) {
        header.addEventListener('click', function(e) {
            e.stopPropagation();
            const parent = this.closest('.offcanvas-dropdown');
            if (parent) {
                parent.classList.toggle('active');
            }
        });
    });

    // ============================================
    // SCROLL EFFECT
    // ============================================

    window.addEventListener('scroll', function() {
        const currentScrollY = window.scrollY;

        if (currentScrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // ============================================
    // DETECÇÃO DE PÁGINA ATIVA - CORAÇÃO DO SISTEMA
    // ============================================

    function getCurrentPage() {
        const path = window.location.pathname;
        const page = path.split('/').pop() || 'index.php';
        // Remove query strings e âncoras
        return page.split('?')[0].split('#')[0];
    }

    function detectActivePage() {
        const currentPage = getCurrentPage();
        
        // Mapeamento de páginas para data-page
        const pageMap = {
            'index.php': 'index',
            'sobre.php': 'sobre',
            'solucoes.php': 'solucoes',
            'planos.php': 'planos',
            'contactos.php': 'contactos',
            'blog.php': 'blog',
            'faq.php': 'faq',
            'login.php': 'login',
            'registo.php': 'registo',
            'recuperar-senha.php': 'recuperar-senha'
        };

        const currentDataPage = pageMap[currentPage] || null;

        // ===== 1. NAVBAR LINKS (Desktop) =====
        navLinks.forEach(function(link) {
            const pageAttr = link.getAttribute('data-page');
            if (pageAttr) {
                if (pageAttr === currentDataPage) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            }
        });

        // ===== 2. NAVBAR DROPDOWNS (Desktop) =====
        navDropdowns.forEach(function(dropdown) {
            const pageAttr = dropdown.getAttribute('data-page');
            if (pageAttr) {
                if (pageAttr === currentDataPage) {
                    dropdown.classList.add('active');
                } else {
                    dropdown.classList.remove('active');
                }
            }
        });

        // ===== 3. OFFCANVAS LINKS =====
        offcanvasLinks.forEach(function(link) {
            const pageAttr = link.getAttribute('data-page');
            if (pageAttr) {
                if (pageAttr === currentDataPage) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            }
        });

        // ===== 4. OFFCANVAS SUB-LINKS =====
        offcanvasSubLinks.forEach(function(link) {
            const pageAttr = link.getAttribute('data-page');
            if (pageAttr) {
                if (pageAttr === currentDataPage) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            }
        });

        // ===== 5. OFFCANVAS DROPDOWNS (para abrir automaticamente) =====
        offcanvasDropdowns.forEach(function(dropdown) {
            const pageAttr = dropdown.getAttribute('data-page');
            if (pageAttr) {
                if (pageAttr === currentDataPage) {
                    dropdown.classList.add('active');
                } else {
                    dropdown.classList.remove('active');
                }
            }
        });

        // ===== 6. LINK UNDERLINE (Desktop) - sincronizar com active =====
        document.querySelectorAll('.nav-link').forEach(function(link) {
            if (link.classList.contains('active')) {
                const underline = link.querySelector('.link-underline');
                if (underline) {
                    underline.style.width = '60%';
                }
            } else {
                const underline = link.querySelector('.link-underline');
                if (underline) {
                    underline.style.width = '0';
                }
            }
        });

        // Debug
        console.log('📄 Página atual:', currentPage);
        console.log('📌 Data-page:', currentDataPage);
        console.log('✅ Active detectado com sucesso!');
    }

    // Executa a detecção inicial
    detectActivePage();

    // ============================================
    // DROPDOWN HOVER - CORREÇÃO PARA FECHAR SUBMENUS
    // ============================================

    navDropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('mouseenter', function() {
            navDropdowns.forEach(function(d) {
                if (d !== dropdown) {
                    d.classList.remove('active');
                }
            });
        });

        dropdown.addEventListener('mouseleave', function(e) {
            const relatedTarget = e.relatedTarget;
            if (relatedTarget && dropdown.contains(relatedTarget)) {
                return;
            }

            setTimeout(function() {
                const isHovered = dropdown.matches(':hover');
                if (!isHovered) {
                    dropdown.classList.remove('active');
                }
            }, 150);
        });
    });

    // ============================================
    // DROPDOWN PARA DISPOSITIVOS TOUCH
    // ============================================

    navDropdowns.forEach(function(dropdown) {
        const trigger = dropdown.querySelector('.nav-link');

        if (trigger) {
            trigger.addEventListener('click', function(e) {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    e.stopPropagation();

                    const isOpen = dropdown.classList.contains('active');

                    navDropdowns.forEach(function(d) {
                        if (d !== dropdown) {
                            d.classList.remove('active');
                        }
                    });

                    if (isOpen) {
                        dropdown.classList.remove('active');
                    } else {
                        dropdown.classList.add('active');
                    }
                }
            });
        }
    });

    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 1024) {
            navDropdowns.forEach(function(dropdown) {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove('active');
                }
            });
        }
    });

    // ============================================
    // RESPONSIVE
    // ============================================

    let resizeTimeout;

    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
            if (window.innerWidth > 1024 && offcanvas.classList.contains('active')) {
                closeOffcanvas();
            }

            if (window.innerWidth > 1024) {
                navDropdowns.forEach(function(d) {
                    d.classList.remove('active');
                });
            }
        }, 250);
    });

    // ============================================
    // INICIALIZAÇÃO
    // ============================================

    console.log('🌍 GeoNexus Navbar inicializado com sucesso!');
    console.log('📄 Página atual:', window.location.pathname.split('/').pop() || 'index.php');

    window.GeoNexusNavbar = {
        open: openOffcanvas,
        close: closeOffcanvas,
        toggle: function() {
            if (offcanvas.classList.contains('active')) {
                closeOffcanvas();
            } else {
                openOffcanvas();
            }
        },
        isOpen: function() {
            return offcanvas.classList.contains('active');
        },
        refreshActive: detectActivePage
    };

});
</script>