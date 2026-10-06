<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus — Planos e Preços para Engenharia e Geotecnologia</title>

    <!-- Meta Tags -->
    <meta name="description" content="Conheça os planos da GeoNexus: Individual, Empresarial e Institucional. Escolha o plano ideal para si e comece a transformar a sua gestão territorial.">
    <meta name="keywords" content="planos, preços, individual, empresarial, institucional, geonexus, topografia, engenharia, GIS">
    <meta name="author" content="GeoNexus">
 
    <!-- Open Graph -->
    <meta property="og:title" content="GeoNexus — Planos e Preços">
    <meta property="og:description" content="Escolha o plano ideal para si.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geonnexus.com/planos">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../assets/imgs/favicon.png">

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
   HERO DOS PLANOS
============================================================ -->
    <section class="plans-hero" id="plans-hero">
        <div class="hero-particles">
            <div class="particle" style="left: 10%; animation-duration: 18s; animation-delay: 0s;"></div>
            <div class="particle" style="left: 30%; animation-duration: 22s; animation-delay: 2s;"></div>
            <div class="particle" style="left: 50%; animation-duration: 20s; animation-delay: 4s;"></div>
            <div class="particle" style="left: 70%; animation-duration: 25s; animation-delay: 1s;"></div>
            <div class="particle" style="left: 90%; animation-duration: 19s; animation-delay: 3s;"></div>
        </div>

        <div class="container plans-hero-container">
            <div class="plans-hero-content">
                <div class="hero-badge">
                    <i class="fas fa-crown"></i>
                    <span>Planos e Preços</span>
                </div>

                <h1 class="hero-title">
                    Escolha o <span class="highlight">Plano</span> <br>Ideal para <span class="highlight-blue">Si</span>
                </h1>

                <p class="hero-subtitle">
                    Na GeoNexus, temos o plano certo para cada perfil.
                    <strong>Do profissional autónomo à grande instituição,</strong>
                    encontre a solução que melhor se adapta às suas necessidades.
                </p>

                <div class="hero-actions">
                    <a href="#planos" class="btn btn-primary">
                        <span>Ver Planos</span>
                        <i class="fas fa-arrow-down btn-arrow"></i>
                        <span class="btn-hover-effect"></span>
                    </a>
                    <a href="#comparacao" class="btn btn-outline-light">
                        <i class="fas fa-chart-bar"></i>
                        <span>Comparar Planos</span>
                    </a>
                </div>
            </div>

            <div class="plans-hero-visual">
                <div class="hero-orb"></div>
                <div class="plans-illustration">
                    <div class="floating-element" style="top: 10%; left: 10%; animation-delay: 0s;">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="floating-element" style="top: 30%; right: 15%; animation-delay: 1s;">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="floating-element" style="bottom: 20%; left: 20%; animation-delay: 2s;">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="floating-element" style="bottom: 30%; right: 10%; animation-delay: 3s;">
                        <i class="fas fa-crown"></i>
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
            <span class="text">Scroll para explorar</span>
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
                <span class="current">Planos</span>
            </div>
        </div>
    </div>

    <!-- ============================================================
   PLANOS
============================================================ -->
    <section class="section" id="planos">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-crown"></i> Nossos Planos
                </span>
                <h2 class="section-title">
                    Escolha o plano <span class="highlight">ideal</span> para si
                </h2>
                <p class="section-description">
                    Todos os planos incluem acesso à plataforma completa.
                    Escolha o que melhor se adapta ao seu perfil e necessidades.
                </p>
            </div>

            <div class="plans-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: var(--space-2xl); margin-top: var(--space-2xl);">

                <!-- ===== PLANO INDIVIDUAL ===== -->
                <div class="plan-card animate-fade-up delay-1" id="individual" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); border-top: 4px solid #2ECC71; transition: all 0.3s ease; position: relative;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-md);">
                        <div style="width: 60px; height: 60px; background: rgba(46, 204, 113, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #2ECC71; font-size: 1.8rem;">
                            <i class="fas fa-user"></i>
                        </div>
                        <span style="background: #2ECC71; color: white; padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.7rem; font-weight: 600;">⭐ Popular</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; color: var(--color-secondary);">Individual</h3>
                    <p style="color: var(--gray-500); font-size: 0.95rem; margin-bottom: var(--space-sm);">Para topógrafos e engenheiros autónomos</p>
                    <div style="margin: var(--space-lg) 0;">
                        <span style="font-size: 0.9rem; color: var(--gray-500);">A partir de</span>
                        <span style="font-family: var(--font-secondary); font-size: 2.8rem; font-weight: 800; color: var(--color-secondary); display: block;">Kz 5.000</span>
                        <span style="color: var(--gray-500); font-size: 0.85rem;">/ mês</span>
                    </div>

                    <ul style="list-style: none; padding: 0; margin: var(--space-lg) 0;">
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #2ECC71;"></i> Até 50 projetos
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #2ECC71;"></i> Levantamentos ilimitados
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #2ECC71;"></i> CAD e GIS integrados
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #2ECC71;"></i> 5 GB de armazenamento
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #2ECC71;"></i> Relatórios técnicos
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #2ECC71;"></i> Suporte por email
                        </li>
                    </ul>

                    <div style="margin-top: var(--space-lg);">
                        <a href="registo.php" class="btn btn-primary" style="width: 100%; justify-content: center; background: linear-gradient(135deg, #2ECC71, #1ABC9C);">
                            <span>Começar Agora</span>
                            <i class="fas fa-arrow-right btn-arrow"></i>
                            <span class="btn-hover-effect"></span>
                        </a>
                        <p style="text-align: center; font-size: 0.75rem; color: var(--gray-400); margin-top: var(--space-sm);">Sem compromisso. Cancele a qualquer momento.</p>
                    </div>
                </div>

                <!-- ===== PLANO EMPRESARIAL ===== -->
                <div class="plan-card animate-fade-up delay-2" id="empresarial" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-lg); border-top: 4px solid #E63946; transition: all 0.3s ease; transform: scale(1.02); position: relative;">
                    <div style="position: absolute; top: -12px; left: 50%; transform: translateX(-50%); background: var(--gradient-accent-2); color: white; padding: 0.3rem 1.5rem; border-radius: var(--radius-full); font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; z-index: 10;">
                        <i class="fas fa-star"></i> Recomendado
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-md); margin-top: var(--space-md);">
                        <div style="width: 60px; height: 60px; background: rgba(230, 57, 70, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #E63946; font-size: 1.8rem;">
                            <i class="fas fa-building"></i>
                        </div>
                        <span style="background: #E63946; color: white; padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.7rem; font-weight: 600;">🚀 Mais Vendido</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; color: var(--color-secondary);">Empresarial</h3>
                    <p style="color: var(--gray-500); font-size: 0.95rem; margin-bottom: var(--space-sm);">Para empresas e organizações</p>
                    <div style="margin: var(--space-lg) 0;">
                        <span style="font-size: 0.9rem; color: var(--gray-500);">A partir de</span>
                        <span style="font-family: var(--font-secondary); font-size: 2.8rem; font-weight: 800; color: var(--color-secondary); display: block;">Kz 15.000</span>
                        <span style="color: var(--gray-500); font-size: 0.85rem;">/ mês</span>
                    </div>

                    <ul style="list-style: none; padding: 0; margin: var(--space-lg) 0;">
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #E63946;"></i> Projetos ilimitados
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #E63946;"></i> Gestão de equipas e colaboradores
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #E63946;"></i> Módulo financeiro e CRM
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #E63946;"></i> 50 GB de armazenamento
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #E63946;"></i> Portal do cliente
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #E63946;"></i> Suporte prioritário
                        </li>
                    </ul>

                    <div style="margin-top: var(--space-lg);">
                        <a href="registo.php" class="btn btn-primary" style="width: 100%; justify-content: center;">
                            <span>Começar Agora</span>
                            <i class="fas fa-arrow-right btn-arrow"></i>
                            <span class="btn-hover-effect"></span>
                        </a>
                        <p style="text-align: center; font-size: 0.75rem; color: var(--gray-400); margin-top: var(--space-sm);">Sem compromisso. Cancele a qualquer momento.</p>
                    </div>
                </div>

                <!-- ===== PLANO INSTITUCIONAL ===== -->
                <div class="plan-card animate-fade-up delay-3" id="institucional" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); box-shadow: var(--shadow-md); border-top: 4px solid #F9A825; transition: all 0.3s ease; position: relative;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: var(--space-md);">
                        <div style="width: 60px; height: 60px; background: rgba(249, 168, 37, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #F9A825; font-size: 1.8rem;">
                            <i class="fas fa-university"></i>
                        </div>
                        <span style="background: #F9A825; color: white; padding: 0.2rem 0.8rem; border-radius: var(--radius-full); font-size: 0.7rem; font-weight: 600;">🌐 Ilimitado</span>
                    </div>
                    <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; color: var(--color-secondary);">Institucional</h3>
                    <p style="color: var(--gray-500); font-size: 0.95rem; margin-bottom: var(--space-sm);">Para universidades, governos e grandes instituições</p>
                    <div style="margin: var(--space-lg) 0;">
                        <span style="font-size: 0.9rem; color: var(--gray-500);">A partir de</span>
                        <span style="font-family: var(--font-secondary); font-size: 2.8rem; font-weight: 800; color: var(--color-secondary); display: block;">Kz 35.000</span>
                        <span style="color: var(--gray-500); font-size: 0.85rem;">/ mês</span>
                    </div>

                    <ul style="list-style: none; padding: 0; margin: var(--space-lg) 0;">
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #F9A825;"></i> Licenças ilimitadas
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #F9A825;"></i> Todos os módulos disponíveis
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #F9A825;"></i> 500 GB de armazenamento
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #F9A825;"></i> Suporte 24/7 dedicado
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #F9A825;"></i> Personalização da plataforma
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.5rem; padding: 0.5rem 0; border-bottom: 1px solid var(--gray-100); color: var(--gray-600);">
                            <i class="fas fa-check-circle" style="color: #F9A825;"></i> Formação e capacitação
                        </li>
                    </ul>

                    <div style="margin-top: var(--space-lg);">
                        <a href="registo.php" class="btn btn-primary" style="width: 100%; justify-content: center; background: linear-gradient(135deg, #F9A825, #E65100);">
                            <span>Começar Agora</span>
                            <i class="fas fa-arrow-right btn-arrow"></i>
                            <span class="btn-hover-effect"></span>
                        </a>
                        <p style="text-align: center; font-size: 0.75rem; color: var(--gray-400); margin-top: var(--space-sm);">Sem compromisso. Cancele a qualquer momento.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
   COMPARAÇÃO DE PLANOS
============================================================ -->
    <section class="section section-gray" id="comparacao">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-chart-bar"></i> Comparação
                </span>
                <h2 class="section-title">
                    Compare os <span class="highlight">Planos</span>
                </h2>
                <p class="section-description">
                    Veja em detalhe o que cada plano inclui e escolha o que melhor se adapta às suas necessidades.
                </p>
            </div>

            <div class="comparison-table-wrapper animate-fade-up" style="overflow-x: auto; margin-top: var(--space-2xl);">
                <table style="width: 100%; border-collapse: collapse; background: white; border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-md);">
                    <thead>
                        <tr style="background: var(--gradient-primary); color: white;">
                            <th style="padding: 1rem; text-align: left; font-family: var(--font-secondary); font-size: 0.9rem;">Funcionalidade</th>
                            <th style="padding: 1rem; text-align: center; font-family: var(--font-secondary); font-size: 0.9rem; background: rgba(46, 204, 113, 0.2);">Individual</th>
                            <th style="padding: 1rem; text-align: center; font-family: var(--font-secondary); font-size: 0.9rem; background: rgba(230, 57, 70, 0.2);">Empresarial</th>
                            <th style="padding: 1rem; text-align: center; font-family: var(--font-secondary); font-size: 0.9rem; background: rgba(249, 168, 37, 0.2);">Institucional</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Projetos</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71; font-weight: 600;">Até 50</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71; font-weight: 600;">Ilimitados</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71; font-weight: 600;">Ilimitados</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200); background: var(--gray-50);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Colaboradores</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: var(--gray-400);">—</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71; font-weight: 600;">Até 20</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71; font-weight: 600;">Ilimitados</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Armazenamento</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; font-weight: 600;">5 GB</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; font-weight: 600;">50 GB</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; font-weight: 600;">500 GB</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200); background: var(--gray-50);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">CAD e GIS</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Módulo Financeiro</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: var(--gray-400);"><i class="fas fa-times-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200); background: var(--gray-50);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Portal do Cliente</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: var(--gray-400);"><i class="fas fa-times-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Relatórios Avançados</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: var(--gray-400);"><i class="fas fa-times-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200); background: var(--gray-50);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Suporte</td>
                            <td style="padding: 0.8rem 1rem; text-align: center;">Email</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; font-weight: 600; color: #E63946;">Prioritário</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; font-weight: 600; color: #F9A825;">24/7 Dedicado</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--gray-200);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Personalização</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: var(--gray-400);"><i class="fas fa-times-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: var(--gray-400);"><i class="fas fa-times-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                        </tr>
                        <tr style="background: var(--gray-50);">
                            <td style="padding: 0.8rem 1rem; color: var(--gray-600); font-weight: 500;">Formação e Capacitação</td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: var(--gray-400);"><i class="fas fa-times-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: var(--gray-400);"><i class="fas fa-times-circle"></i></td>
                            <td style="padding: 0.8rem 1rem; text-align: center; color: #2ECC71;"><i class="fas fa-check-circle"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="text-align: center; margin-top: var(--space-2xl);">
                <a href="#planos" class="btn btn-secondary">
                    <span>Escolher Plano</span>
                    <i class="fas fa-arrow-right btn-arrow"></i>
                    <span class="btn-hover-effect"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================
   FAQ PLANOS
============================================================ -->
    <section class="section" id="faq">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-question-circle"></i> Dúvidas Frequentes
                </span>
                <h2 class="section-title">
                    Perguntas <span class="highlight">Frequentes</span>
                </h2>
                <p class="section-description">
                    Tire as suas dúvidas sobre os planos da GeoNexus.
                </p>
            </div>

            <!-- ============================================================
   FAQ - PERGUNTAS FREQUENTES (RESPONSIVO)
   ============================================================ -->
<div class="faq-grid">

    <!-- FAQ 1 -->
    <div class="faq-item faq-item-red">
        <h4 class="faq-question">
            <i class="fas fa-question-circle"></i>
            Posso mudar de plano?
        </h4>
        <p class="faq-answer">
            Sim! Pode fazer upgrade ou downgrade do seu plano a qualquer momento. O valor será ajustado proporcionalmente.
        </p>
    </div>

    <!-- FAQ 2 -->
    <div class="faq-item faq-item-green">
        <h4 class="faq-question">
            <i class="fas fa-question-circle"></i>
            Existe período de fidelização?
        </h4>
        <p class="faq-answer">
            Não! Todos os planos são mensais e pode cancelar a qualquer momento sem custos adicionais.
        </p>
    </div>

    <!-- FAQ 3 -->
    <div class="faq-item faq-item-yellow">
        <h4 class="faq-question">
            <i class="fas fa-question-circle"></i>
            Como funciona o pagamento?
        </h4>
        <p class="faq-answer">
            Aceitamos pagamentos via transferência bancária, depósito, Multicaixa e outros métodos. Após o pagamento, o plano é ativado imediatamente.
        </p>
    </div>

    <!-- FAQ 4 -->
    <div class="faq-item faq-item-blue">
        <h4 class="faq-question">
            <i class="fas fa-question-circle"></i>
            Posso testar a plataforma antes de comprar?
        </h4>
        <p class="faq-answer">
            Sim! Oferecemos um período de teste gratuito de 7 dias para todos os planos. Não precisa de cartão de crédito para começar.
        </p>
    </div>

    <!-- FAQ 5 -->
    <div class="faq-item faq-item-dark-green">
        <h4 class="faq-question">
            <i class="fas fa-question-circle"></i>
            O plano Institucional inclui formação?
        </h4>
        <p class="faq-answer">
            Sim! O plano Institucional inclui formação personalizada para a sua equipa, garantindo que todos aproveitem ao máximo a plataforma.
        </p>
    </div>

    <!-- FAQ 6 -->
    <div class="faq-item faq-item-orange">
        <h4 class="faq-question">
            <i class="fas fa-question-circle"></i>
            Os dados estão seguros?
        </h4>
        <p class="faq-answer">
            Sim! Todos os dados são armazenados em servidores seguros com criptografia de ponta a ponta. A GeoNexus segue as melhores práticas de segurança.
        </p>
    </div>

</div>
        </div>
    </section>

    <!-- ============================================================
   CTA FINAL
============================================================ -->
    <section class="plans-cta" style="background: var(--gradient-primary); padding: var(--space-4xl) 0; color: white; text-align: center;">
        <div class="container">
            <h2 style="font-family: var(--font-secondary); font-size: 2.5rem; margin-bottom: var(--space-md); color: rgba(255,255,255,0.8);">
                <i class="fas fa-rocket" style="color: var(--color-accent);"></i>
                Pronto para começar?
            </h2>
            <p style="color: rgba(255,255,255,0.8); font-size: 1.2rem; max-width: 600px; margin: 0 auto var(--space-xl);">
                Junte-se a mais de 1.500 profissionais e empresas que já confiam na GeoNexus.
            </p>
            <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
                <a href="registo.php" class="btn btn-primary" style="background: var(--gradient-accent);">
                    <span>Começar Teste Grátis</span>
                    <i class="fas fa-arrow-right btn-arrow"></i>
                    <span class="btn-hover-effect"></span>
                </a>
                <a href="contactos.php" class="btn btn-outline-light">
                    <i class="fas fa-headset"></i>
                    <span>Falar com um Especialista</span>
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
        // SCRIPTS DA PÁGINA PLANOS
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
                'CARREGANDO PLANOS',
                'PREPARANDO AS OFERTAS',
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

        // ============================================================
        // NAVEGAÇÃO SUAVE PARA ÂNCORAS
        // ============================================================
        document.querySelectorAll('a[href^="#"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const offsetTop = targetElement.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

</body>
<style>
    /* Hero da página Planos */
    .plans-hero {
        min-height: 90vh;
        padding-top: 80px;
        position: relative;
        background: var(--gradient-primary);
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .plans-hero-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-3xl);
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .plans-hero-content {
        color: white;
    }

    .plans-hero-visual {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .plans-illustration {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* Cards de Planos */
    .plan-card {
        position: relative;
        transition: all 0.3s ease;
    }

    .plan-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }

    .plan-card .btn-primary {
        position: relative;
        overflow: hidden;
    }

    /* Tabela de Comparação */
    .comparison-table-wrapper {
        border-radius: var(--radius-xl);
        overflow: hidden;
    }

    .comparison-table-wrapper table {
        border-collapse: collapse;
    }

    .comparison-table-wrapper th {
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.8rem;
    }

    .comparison-table-wrapper td {
        padding: 0.8rem 1rem;
    }

    .comparison-table-wrapper .fa-check-circle {
        font-size: 1.2rem;
    }

    .comparison-table-wrapper .fa-times-circle {
        font-size: 1.2rem;
        color: var(--gray-400);
    }

    /* FAQ Items */
    .faq-item {
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
    }

    /* Responsividade */
    @media (max-width: 1024px) {
        .plans-hero-container {
            grid-template-columns: 1fr;
            text-align: center;
            gap: var(--space-2xl);
        }

        .plans-hero-content .hero-subtitle {
            margin: 0 auto var(--space-xl);
        }

        .plans-hero-content .hero-actions {
            justify-content: center;
        }

        .plans-hero-visual {
            height: 250px;
        }

        .plans-grid {
            grid-template-columns: 1fr !important;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .plan-card {
            transform: none !important;
        }

        .plan-card:hover {
            transform: translateY(-5px) !important;
        }

        .plan-card .btn-primary {
            width: 100%;
        }

        .faq-grid {
            grid-template-columns: 1fr !important;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
    }

    @media (max-width: 768px) {
        .plans-hero {
            min-height: 70vh;
        }

        .plans-hero-visual {
            height: 180px;
        }

        .plan-card {
            padding: var(--space-lg) !important;
        }

        .plan-card h3 {
            font-size: 1.5rem !important;
        }

        .plan-card .stat-number {
            font-size: 2rem !important;
        }

        .comparison-table-wrapper {
            font-size: 0.8rem;
        }

        .comparison-table-wrapper th,
        .comparison-table-wrapper td {
            padding: 0.5rem !important;
        }

        .plans-cta h2 {
            font-size: 1.8rem !important;
        }
    }

    @media (max-width: 480px) {
        .plan-card {
            padding: var(--space-md) !important;
        }

        .plan-card .btn-primary {
            font-size: 0.85rem;
            padding: 0.6rem 1rem;
        }

        .comparison-table-wrapper {
            font-size: 0.7rem;
        }

        .comparison-table-wrapper th,
        .comparison-table-wrapper td {
            padding: 0.3rem !important;
        }

        .plans-cta .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>


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
<style>
    /* ============================================================
   FAQ - ESTILOS RESPONSIVOS
   ============================================================ */

/* ============================================
   GRID PRINCIPAL
============================================ */
.faq-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-xl);
    max-width: 900px;
    margin: 0 auto;
}

/* ============================================
   ITENS DA FAQ
============================================ */
.faq-item {
    background: white;
    border-radius: var(--radius-xl);
    padding: var(--space-xl);
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    border-left: 4px solid var(--color-accent-2);
    display: flex;
    flex-direction: column;
    height: 100%;
}

.faq-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
}

/* ============================================
   CORES DAS BORDAS
============================================ */
.faq-item-red {
    border-left-color: var(--color-accent-2);
}

.faq-item-green {
    border-left-color: var(--color-accent);
}

.faq-item-yellow {
    border-left-color: #F9A825;
}

.faq-item-blue {
    border-left-color: #00BCD4;
}

.faq-item-dark-green {
    border-left-color: #2E7D32;
}

.faq-item-orange {
    border-left-color: #E65100;
}

/* ============================================
   ÍCONES POR COR
============================================ */
.faq-item-red .faq-question i {
    color: var(--color-accent-2);
}

.faq-item-green .faq-question i {
    color: var(--color-accent);
}

.faq-item-yellow .faq-question i {
    color: #F9A825;
}

.faq-item-blue .faq-question i {
    color: #00BCD4;
}

.faq-item-dark-green .faq-question i {
    color: #2E7D32;
}

.faq-item-orange .faq-question i {
    color: #E65100;
}

/* ============================================
   PERGUNTA
============================================ */
.faq-question {
    font-family: var(--font-secondary);
    color: var(--color-secondary);
    margin-bottom: var(--space-sm);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem;
    font-weight: 600;
}

.faq-question i {
    font-size: 1.1rem;
    flex-shrink: 0;
}

/* ============================================
   RESPOSTA
============================================ */
.faq-answer {
    color: var(--gray-500);
    line-height: 1.6;
    font-size: 0.95rem;
    margin: 0;
    flex: 1;
}

/* ============================================
   RESPONSIVIDADE
============================================ */

/* Tablets */
@media (max-width: 768px) {
    .faq-grid {
        grid-template-columns: 1fr;
        max-width: 600px;
        gap: var(--space-lg);
    }

    .faq-item {
        padding: var(--space-lg);
    }

    .faq-question {
        font-size: 0.95rem;
        gap: 0.4rem;
    }

    .faq-question i {
        font-size: 1rem;
    }

    .faq-answer {
        font-size: 0.9rem;
    }
}

/* Mobile */
@media (max-width: 480px) {
    .faq-grid {
        gap: var(--space-md);
        max-width: 100%;
        padding: 0 var(--space-sm);
    }

    .faq-item {
        padding: var(--space-md);
        border-left-width: 3px;
    }

    .faq-question {
        font-size: 0.85rem;
        gap: 0.3rem;
        margin-bottom: var(--space-xs);
    }

    .faq-question i {
        font-size: 0.9rem;
    }

    .faq-answer {
        font-size: 0.8rem;
        line-height: 1.5;
    }
}

/* Mobile muito pequeno */
@media (max-width: 360px) {
    .faq-item {
        padding: var(--space-sm);
        border-left-width: 3px;
    }

    .faq-question {
        font-size: 0.8rem;
        flex-wrap: wrap;
    }

    .faq-answer {
        font-size: 0.75rem;
    }
}
</style>
</html>