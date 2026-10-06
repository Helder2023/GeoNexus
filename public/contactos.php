<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus — Contactos</title>

    <!-- Meta Tags -->
    <meta name="description" content="Entre em contacto com a GeoNexus. Formulário de contacto, suporte técnico, localização e WhatsApp.">
    <meta name="keywords" content="contacto, suporte, localização, whatsapp, geonexus">
    <meta name="author" content="GeoNexus">

    <!-- Open Graph -->
    <meta property="og:title" content="GeoNexus — Contactos">
    <meta property="og:description" content="Entre em contacto com a GeoNexus.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geonnexus.com/contactos">

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
   HERO DA PÁGINA CONTACTOS
============================================================ -->
    <section class="contact-hero" id="contact-hero">
        <div class="hero-particles">
            <div class="particle" style="left: 10%; animation-duration: 18s; animation-delay: 0s;"></div>
            <div class="particle" style="left: 30%; animation-duration: 22s; animation-delay: 2s;"></div>
            <div class="particle" style="left: 50%; animation-duration: 20s; animation-delay: 4s;"></div>
            <div class="particle" style="left: 70%; animation-duration: 25s; animation-delay: 1s;"></div>
            <div class="particle" style="left: 90%; animation-duration: 19s; animation-delay: 3s;"></div>
        </div>

        <div class="container contact-hero-container">
            <div class="contact-hero-content">
                <div class="hero-badge">
                    <i class="fas fa-headset"></i>
                    <span>Fale Connosco</span>
                </div>

                <h1 class="hero-title">
                    Estamos <span class="highlight">aqui</span> para <br>
                    <span class="highlight-blue">ajudar</span>
                </h1>

                <p class="hero-subtitle">
                    Entre em contacto com a GeoNexus através dos nossos canais de comunicação.
                    <strong>Estamos disponíveis para responder às suas dúvidas</strong> e
                    ajudar a transformar a sua gestão territorial.
                </p>

                <div class="hero-actions">
                    <a href="#formulario" class="btn btn-primary">
                        <span>Enviar Mensagem</span>
                        <i class="fas fa-arrow-down btn-arrow"></i>
                        <span class="btn-hover-effect"></span>
                    </a>
                    <a href="#whatsapp" class="btn btn-outline-light">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>

            <div class="contact-hero-visual">
                <div class="hero-orb"></div>
                <div class="contact-illustration">
                    <div class="floating-element" style="top: 10%; left: 10%; animation-delay: 0s;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="floating-element" style="top: 30%; right: 15%; animation-delay: 1s;">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="floating-element" style="bottom: 20%; left: 20%; animation-delay: 2s;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="floating-element" style="bottom: 30%; right: 10%; animation-delay: 3s;">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div class="floating-element" style="top: 50%; left: 50%; transform: translate(-50%, -50%); animation-delay: 1.5s;">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <span class="text">Scroll para contactar</span>
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
                <span class="current">Contactos</span>
            </div>
        </div>
    </div>

    <!-- ============================================================
   INFORMAÇÕES DE CONTACTO
============================================================ -->
    <section class="section" id="contact-info">
        <div class="container">
            <div class="contact-info-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-xl); margin-bottom: var(--space-3xl);">

                <!-- Telefone -->
                <div class="contact-info-card animate-fade-up delay-1" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; border-top: 4px solid var(--color-accent-2);">
                    <div style="width: 60px; height: 60px; background: rgba(230, 57, 70, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); color: var(--color-accent-2); font-size: 1.8rem;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h4 style="font-family: var(--font-secondary); font-size: 1.1rem; color: var(--color-secondary);">Telefone</h4>
                    <p style="color: var(--gray-500); font-size: 0.95rem; line-height: 1.6;">
                        <strong>+244 900 000 000</strong><br>
                        <span style="font-size: 0.85rem; color: var(--gray-400);">Segunda a Sexta, 8h-18h</span>
                    </p>
                </div>

                <!-- Email -->
                <div class="contact-info-card animate-fade-up delay-2" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; border-top: 4px solid var(--color-accent);">
                    <div style="width: 60px; height: 60px; background: rgba(46, 204, 113, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); color: var(--color-accent); font-size: 1.8rem;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4 style="font-family: var(--font-secondary); font-size: 1.1rem; color: var(--color-secondary);">Email</h4>
                    <p style="color: var(--gray-500); font-size: 0.95rem; line-height: 1.6;">
                        <strong>contato@geonnexus.com</strong><br>
                        <span style="font-size: 0.85rem; color: var(--gray-400);">Suporte: suporte@geonnexus.com</span>
                    </p>
                </div>

                <!-- Localização -->
                <div class="contact-info-card animate-fade-up delay-3" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; border-top: 4px solid #F9A825;">
                    <div style="width: 60px; height: 60px; background: rgba(249, 168, 37, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); color: #F9A825; font-size: 1.8rem;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4 style="font-family: var(--font-secondary); font-size: 1.1rem; color: var(--color-secondary);">Localização</h4>
                    <p style="color: var(--gray-500); font-size: 0.95rem; line-height: 1.6;">
                        <strong>Luanda, Angola</strong><br>
                        <span style="font-size: 0.85rem; color: var(--gray-400);">Rua da Missão, nº 123</span>
                    </p>
                </div>

                <!-- WhatsApp -->
                <div class="contact-info-card animate-fade-up delay-4" style="background: white; border-radius: var(--radius-xl); padding: var(--space-xl); text-align: center; box-shadow: var(--shadow-md); transition: all 0.3s ease; border-top: 4px solid #25D366;">
                    <div style="width: 60px; height: 60px; background: rgba(37, 211, 102, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); color: #25D366; font-size: 1.8rem;">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h4 style="font-family: var(--font-secondary); font-size: 1.1rem; color: var(--color-secondary);">WhatsApp</h4>
                    <p style="color: var(--gray-500); font-size: 0.95rem; line-height: 1.6;">
                        <strong>+244 900 000 000</strong><br>
                        <span style="font-size: 0.85rem; color: var(--gray-400);">Resposta rápida</span>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
   FORMULÁRIO DE CONTACTO (Submenu 1)
============================================================ -->
    <section class="section section-gray" id="formulario">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-envelope"></i> Formulário de Contacto
                </span>
                <h2 class="section-title">
                    Envie-nos uma <span class="highlight">mensagem</span>
                </h2>
                <p class="section-description">
                    Preencha o formulário abaixo e entraremos em contacto consigo o mais breve possível.
                </p>
            </div>

            <div class="contact-form-wrapper animate-fade-up" style="max-width: 800px; margin: 0 auto; background: white; border-radius: var(--radius-xl); padding: var(--space-2xl); box-shadow: var(--shadow-md);">
                <form id="contactForm" method="POST" action="../api/enviar-contacto.php">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-lg);">
                        <div class="form-group">
                            <label for="nome" style="display: block; font-weight: 600; color: var(--color-secondary); margin-bottom: var(--space-sm); font-size: 0.9rem;">
                                <i class="fas fa-user" style="color: var(--color-accent-2);"></i> Nome Completo
                            </label>
                            <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required style="width: 100%; padding: 0.8rem 1rem; border: 2px solid var(--gray-200); border-radius: var(--radius-md); font-size: 1rem; transition: all 0.3s ease; background: var(--gray-50);">
                        </div>

                        <div class="form-group">
                            <label for="email" style="display: block; font-weight: 600; color: var(--color-secondary); margin-bottom: var(--space-sm); font-size: 0.9rem;">
                                <i class="fas fa-envelope" style="color: var(--color-accent);"></i> Email
                            </label>
                            <input type="email" id="email" name="email" placeholder="seu@email.com" required style="width: 100%; padding: 0.8rem 1rem; border: 2px solid var(--gray-200); border-radius: var(--radius-md); font-size: 1rem; transition: all 0.3s ease; background: var(--gray-50);">
                        </div>

                        <div class="form-group">
                            <label for="telefone" style="display: block; font-weight: 600; color: var(--color-secondary); margin-bottom: var(--space-sm); font-size: 0.9rem;">
                                <i class="fas fa-phone" style="color: #F9A825;"></i> Telefone
                            </label>
                            <input type="tel" id="telefone" name="telefone" placeholder="+244 900 000 000" style="width: 100%; padding: 0.8rem 1rem; border: 2px solid var(--gray-200); border-radius: var(--radius-md); font-size: 1rem; transition: all 0.3s ease; background: var(--gray-50);">
                        </div>

                        <div class="form-group">
                            <label for="assunto" style="display: block; font-weight: 600; color: var(--color-secondary); margin-bottom: var(--space-sm); font-size: 0.9rem;">
                                <i class="fas fa-tag" style="color: #00BCD4;"></i> Assunto
                            </label>
                            <select id="assunto" name="assunto" required style="width: 100%; padding: 0.8rem 1rem; border: 2px solid var(--gray-200); border-radius: var(--radius-md); font-size: 1rem; transition: all 0.3s ease; background: var(--gray-50);">
                                <option value="">Selecione o assunto</option>
                                <option value="informacoes">Informações sobre a plataforma</option>
                                <option value="suporte">Suporte Técnico</option>
                                <option value="vendas">Vendas e Planos</option>
                                <option value="parcerias">Parcerias</option>
                                <option value="imprensa">Imprensa</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: var(--space-lg);">
                        <label for="mensagem" style="display: block; font-weight: 600; color: var(--color-secondary); margin-bottom: var(--space-sm); font-size: 0.9rem;">
                            <i class="fas fa-comment" style="color: var(--color-accent-2);"></i> Mensagem
                        </label>
                        <textarea id="mensagem" name="mensagem" rows="6" placeholder="Descreva a sua mensagem..." required style="width: 100%; padding: 0.8rem 1rem; border: 2px solid var(--gray-200); border-radius: var(--radius-md); font-size: 1rem; transition: all 0.3s ease; background: var(--gray-50); resize: vertical;"></textarea>
                    </div>

                    <div style="margin-top: var(--space-lg); display: flex; gap: var(--space-md); align-items: center; flex-wrap: wrap;">
                        <button type="submit" class="btn btn-primary" style="padding: 0.8rem 2.5rem;">
                            <i class="fas fa-paper-plane"></i>
                            <span>Enviar Mensagem</span>
                            <span class="btn-hover-effect"></span>
                        </button>
                        <span style="color: var(--gray-400); font-size: 0.85rem;">
                            <i class="fas fa-lock" style="color: var(--color-accent);"></i>
                            Os seus dados estão seguros
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- ============================================================
   SUPORTE TÉCNICO (Submenu 2)
============================================================ -->
    <section class="section" id="suporte">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-headset"></i> Suporte Técnico
                </span>
                <h2 class="section-title">
                    Como podemos <span class="highlight">ajudar</span>?
                </h2>
                <p class="section-description">
                    A nossa equipa de suporte está disponível para resolver todas as suas dúvidas técnicas.
                </p>
            </div>

            <!-- ============================================================
   SUPORTE - CANAIS DE ATENDIMENTO (RESPONSIVO)
   ============================================================ -->
            <div class="suporte-grid">

                <!-- Suporte 1: Telefone -->
                <div class="suporte-card animate-fade-up delay-1">
                    <div class="suporte-icon suporte-icon-phone">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h4 class="suporte-title">Suporte Telefónico</h4>
                    <div class="suporte-info">
                        <strong>+244 900 000 000</strong>
                        <span>Segunda a Sexta, 8h-18h</span>
                    </div>
                    <span class="suporte-status">
                        <i class="fas fa-check-circle"></i> Disponível
                    </span>
                </div>

                <!-- Suporte 2: Email -->
                <div class="suporte-card animate-fade-up delay-2">
                    <div class="suporte-icon suporte-icon-email">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4 class="suporte-title">Suporte por Email</h4>
                    <div class="suporte-info">
                        <strong>suporte@geonnexus.com</strong>
                        <span>Resposta em até 24h</span>
                    </div>
                    <span class="suporte-status">
                        <i class="fas fa-check-circle"></i> Disponível
                    </span>
                </div>

                <!-- Suporte 3: WhatsApp -->
                <div class="suporte-card animate-fade-up delay-3">
                    <div class="suporte-icon suporte-icon-whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h4 class="suporte-title">Suporte WhatsApp</h4>
                    <div class="suporte-info">
                        <strong>+244 900 000 000</strong>
                        <span>Resposta rápida</span>
                    </div>
                    <span class="suporte-status">
                        <i class="fas fa-check-circle"></i> Disponível
                    </span>
                </div>

            </div>

            <!-- FAQ de Suporte -->
            <div style="margin-top: var(--space-2xl); background: var(--gray-50); border-radius: var(--radius-xl); padding: var(--space-xl);">
                <h4 style="font-family: var(--font-secondary); color: var(--color-secondary); text-align: center; margin-bottom: var(--space-xl);">
                    <i class="fas fa-question-circle" style="color: var(--color-accent-2);"></i>
                    Dúvidas Frequentes de Suporte
                </h4>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md);">
                    <div style="background: white; border-radius: var(--radius-lg); padding: var(--space-md); border-left: 3px solid var(--color-accent-2);">
                        <strong style="color: var(--color-secondary);">Como faço para recuperar a minha senha?</strong>
                        <p style="color: var(--gray-500); font-size: 0.9rem; margin-top: 0.3rem;">Clique em "Esqueceu a senha" na página de login e siga as instruções.</p>
                    </div>
                    <div style="background: white; border-radius: var(--radius-lg); padding: var(--space-md); border-left: 3px solid var(--color-accent);">
                        <strong style="color: var(--color-secondary);">Como atualizar os meus dados de perfil?</strong>
                        <p style="color: var(--gray-500); font-size: 0.9rem; margin-top: 0.3rem;">Aceda ao painel, vá a "Perfil" e edite as informações desejadas.</p>
                    </div>
                    <div style="background: white; border-radius: var(--radius-lg); padding: var(--space-md); border-left: 3px solid #F9A825;">
                        <strong style="color: var(--color-secondary);">Como importar dados para a plataforma?</strong>
                        <p style="color: var(--gray-500); font-size: 0.9rem; margin-top: 0.3rem;">Utilize a opção "Importar" no módulo de projetos. Suportamos DXF, SHP, CSV e outros.</p>
                    </div>
                    <div style="background: white; border-radius: var(--radius-lg); padding: var(--space-md); border-left: 3px solid #00BCD4;">
                        <strong style="color: var(--color-secondary);">A plataforma funciona offline?</strong>
                        <p style="color: var(--gray-500); font-size: 0.9rem; margin-top: 0.3rem;">A GeoNexus é uma plataforma cloud, mas permite sincronização offline para levantamentos de campo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
   LOCALIZAÇÃO (Submenu 3)
============================================================ -->
    <section class="section section-gray" id="localizacao">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-map-marker-alt"></i> Localização
                </span>
                <h2 class="section-title">
                    Onde nos <span class="highlight">encontrar</span>
                </h2>
                <p class="section-description">
                    Visite-nos na nossa sede em Luanda. Estamos localizados numa zona de fácil acesso.
                </p>
            </div>

            <!-- ============================================================
   LOCALIZAÇÃO - NOSSA SEDE (RESPONSIVO)
   ============================================================ -->
<div class="location-grid">

    <!-- Informações de Localização -->
    <div class="location-info animate-fade-up delay-1">
        <h4 class="location-title">
            <i class="fas fa-building"></i>
            Nossa Sede
        </h4>

        <div class="location-details">
            <div class="location-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <strong>Endereço</strong>
                    <p>Rua da Missão, nº 123, Luanda, Angola</p>
                </div>
            </div>
            <div class="location-item">
                <i class="fas fa-phone"></i>
                <div>
                    <strong>Telefone</strong>
                    <p>+244 900 000 000</p>
                </div>
            </div>
            <div class="location-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <strong>Email</strong>
                    <p>contato@geonnexus.com</p>
                </div>
            </div>
            <div class="location-item location-item-last">
                <i class="fas fa-clock"></i>
                <div>
                    <strong>Horário de Funcionamento</strong>
                    <p>Segunda a Sexta, 8h - 18h</p>
                </div>
            </div>
        </div>

        <a href="#" target="_blank" class="btn btn-secondary btn-map">
            <i class="fas fa-map"></i>
            <span>Abrir no Google Maps</span>
            <i class="fas fa-arrow-right btn-arrow"></i>
        </a>
    </div>

    <!-- Mapa Interativo -->
    <div class="location-map animate-fade-up delay-2">
        <div id="map"></div>
    </div>

</div>
        </div>
    </section>

    <!-- ============================================================
   WHATSAPP (Submenu 4)
============================================================ -->
    <section class="section" id="whatsapp">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge" style="background: #25D366;">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </span>
                <h2 class="section-title">
                    Fale connosco pelo <span class="highlight">WhatsApp</span>
                </h2>
                <p class="section-description">
                    A forma mais rápida de nos contactar. Respondemos em poucos minutos.
                </p>
            </div>

            <div class="whatsapp-container animate-fade-up" style="max-width: 700px; margin: 0 auto; background: white; border-radius: var(--radius-xl); padding: var(--space-2xl); box-shadow: var(--shadow-md); text-align: center;">

                <div style="font-size: 4rem; color: #25D366; margin-bottom: var(--space-lg);">
                    <i class="fab fa-whatsapp"></i>
                </div>

                <h3 style="font-family: var(--font-secondary); font-size: 1.8rem; color: var(--color-secondary);">Fale connosco pelo WhatsApp</h3>
                <p style="color: var(--gray-500); font-size: 1.05rem; line-height: 1.6; margin: var(--space-md) 0 var(--space-lg);">
                    Clique no botão abaixo para iniciar uma conversa connosco. Estamos disponíveis
                    para responder às suas perguntas sobre a plataforma, planos e suporte técnico.
                </p>

                <div style="display: flex; flex-direction: column; gap: var(--space-md); align-items: center;">
                    <a href="https://wa.me/244900000000" target="_blank" class="btn btn-primary" style="background: #25D366; padding: 1rem 3rem; font-size: 1.1rem;">
                        <i class="fab fa-whatsapp"></i>
                        <span>Iniciar Conversa</span>
                        <i class="fas fa-arrow-right btn-arrow"></i>
                        <span class="btn-hover-effect"></span>
                    </a>

                    <div style="display: flex; gap: var(--space-xl); flex-wrap: wrap; justify-content: center;">
                        <div style="text-align: center;">
                            <i class="fas fa-clock" style="color: #25D366;"></i>
                            <p style="color: var(--gray-500); font-size: 0.85rem;">Disponível 24h</p>
                        </div>
                        <div style="text-align: center;">
                            <i class="fas fa-reply-all" style="color: #25D366;"></i>
                            <p style="color: var(--gray-500); font-size: 0.85rem;">Resposta rápida</p>
                        </div>
                        <div style="text-align: center;">
                            <i class="fas fa-shield-alt" style="color: #25D366;"></i>
                            <p style="color: var(--gray-500); font-size: 0.85rem;">Conversa segura</p>
                        </div>
                    </div>
                </div>
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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var map = L.map('map').setView([-8.8390, 13.2894], 13);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© OpenStreetMap'
                        }).addTo(map);
                        L.marker([-8.8390, 13.2894]).addTo(map)
                            .bindPopup('<b>GeoNexus</b><br>Rua da Missão, nº 123<br>Luanda, Angola')
                            .openPopup();
                    });
                </script>
    <!-- ============================================================
   SCRIPTS
============================================================ -->
    <script src="../assets/js/site.js"></script>

    <script>
        // ============================================================
        // SCRIPTS DA PÁGINA CONTACTOS
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
                'CARREGANDO CONTACTOS',
                'PREPARANDO O FORMULÁRIO',
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

        // ============================================================
        // VALIDAÇÃO DO FORMULÁRIO DE CONTACTO
        // ============================================================
        const contactForm = document.getElementById('contactForm');

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const assunto = document.getElementById('assunto').value;
            const mensagem = document.getElementById('mensagem').value.trim();

            // Validação simples
            if (!nome || !email || !assunto || !mensagem) {
                alert('Por favor, preencha todos os campos obrigatórios.');
                return;
            }

            if (!email.includes('@')) {
                alert('Por favor, insira um email válido.');
                return;
            }

            // Simulação de envio
            const btn = this.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A enviar...';
            btn.disabled = true;

            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check"></i> Mensagem enviada!';
                btn.style.background = 'var(--gradient-accent)';

                // Reset do formulário
                setTimeout(() => {
                    this.reset();
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    btn.style.background = '';
                    alert('Mensagem enviada com sucesso! Entraremos em contacto em breve.');
                }, 2000);
            }, 2000);
        });
    </script>

</body>

<style>
    /* ============================================================
   PÁGINA CONTACTOS - ESTILOS ESPECÍFICOS
   ============================================================ */

    /* Hero da página Contactos */
    .contact-hero {
        min-height: 90vh;
        padding-top: 80px;
        position: relative;
        background: var(--gradient-primary);
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .contact-hero-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-3xl);
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .contact-hero-content {
        color: white;
    }

    .contact-hero-visual {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-illustration {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* Contact Info Cards */
    .contact-info-card {
        transition: all 0.3s ease;
    }

    .contact-info-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }

    /* Suporte Cards */
    .suporte-card {
        transition: all 0.3s ease;
    }

    .suporte-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: var(--color-accent-2) !important;
    }

    /* Formulário de Contacto */
    .contact-form-wrapper input:focus,
    .contact-form-wrapper textarea:focus,
    .contact-form-wrapper select:focus {
        outline: none;
        border-color: var(--color-accent-2) !important;
        box-shadow: 0 0 0 4px rgba(230, 57, 70, 0.08) !important;
        background: white !important;
    }

    .contact-form-wrapper input:hover,
    .contact-form-wrapper textarea:hover,
    .contact-form-wrapper select:hover {
        border-color: var(--gray-300);
    }

    /* WhatsApp Section */
    .whatsapp-container {
        transition: all 0.3s ease;
    }

    .whatsapp-container:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    /* Responsividade */
    @media (max-width: 1024px) {
        .contact-hero-container {
            grid-template-columns: 1fr;
            text-align: center;
            gap: var(--space-2xl);
        }

        .contact-hero-content .hero-subtitle {
            margin: 0 auto var(--space-xl);
        }

        .contact-hero-content .hero-actions {
            justify-content: center;
        }

        .contact-hero-visual {
            height: 250px;
        }

        .contact-info-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        .contact-form-wrapper {
            padding: var(--space-xl) !important;
        }

        .contact-form-wrapper form {
            grid-template-columns: 1fr !important;
        }

        .suporte-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        .location-grid {
            grid-template-columns: 1fr !important;
        }

        .location-map {
            min-height: 250px !important;
        }
    }

    @media (max-width: 768px) {
        .contact-hero {
            min-height: 70vh;
        }

        .contact-hero-visual {
            height: 180px;
        }

        .contact-info-grid {
            grid-template-columns: 1fr !important;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .suporte-grid {
            grid-template-columns: 1fr !important;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .suporte-card {
            padding: var(--space-lg) !important;
        }

        .contact-form-wrapper {
            padding: var(--space-lg) !important;
        }

        .whatsapp-container {
            padding: var(--space-xl) !important;
        }

        .whatsapp-container h3 {
            font-size: 1.5rem !important;
        }

        .faq-suporte-grid {
            grid-template-columns: 1fr !important;
        }
    }

    @media (max-width: 480px) {
        .contact-hero {
            min-height: 60vh;
        }

        .contact-hero-visual {
            height: 120px;
        }

        .contact-form-wrapper {
            padding: var(--space-md) !important;
        }

        .contact-form-wrapper input,
        .contact-form-wrapper textarea,
        .contact-form-wrapper select {
            font-size: 0.9rem !important;
            padding: 0.6rem 0.8rem !important;
        }

        .contact-info-card {
            padding: var(--space-lg) !important;
        }

        .whatsapp-container {
            padding: var(--space-lg) !important;
        }

        .whatsapp-container .btn {
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
   SUPORTE - ESTILOS RESPONSIVOS
   ============================================================ */

    /* ============================================
   GRID PRINCIPAL
============================================ */
    .suporte-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: var(--space-xl);
        margin-top: var(--space-2xl);
    }

    /* ============================================
   CARDS DE SUPORTE
============================================ */
    .suporte-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: var(--space-xl);
        box-shadow: var(--shadow-md);
        text-align: center;
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
    }

    .suporte-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: var(--color-accent-2);
    }

    /* ============================================
   ÍCONES
============================================ */
    .suporte-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto var(--space-lg);
        color: white;
        font-size: 2rem;
        flex-shrink: 0;
    }

    .suporte-icon-phone {
        background: var(--gradient-primary);
    }

    .suporte-icon-email {
        background: var(--gradient-accent);
    }

    .suporte-icon-whatsapp {
        background: linear-gradient(135deg, #25D366, #128C7E);
    }

    /* ============================================
   TÍTULO
============================================ */
    .suporte-title {
        font-family: var(--font-secondary);
        color: var(--color-secondary);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: var(--space-sm);
    }

    /* ============================================
   INFORMAÇÕES
============================================ */
    .suporte-info {
        color: var(--gray-500);
        line-height: 1.6;
        margin: var(--space-md) 0;
        flex: 1;
    }

    .suporte-info strong {
        display: block;
        font-size: 1rem;
        color: var(--color-secondary);
    }

    .suporte-info span {
        display: block;
        font-size: 0.85rem;
        color: var(--gray-400);
    }

    /* ============================================
   STATUS
============================================ */
    .suporte-status {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        background: rgba(46, 204, 113, 0.1);
        color: var(--color-accent);
        padding: 0.3rem 0.8rem;
        border-radius: var(--radius-full);
        font-size: 0.75rem;
        font-weight: 600;
        margin-top: auto;
    }

    .suporte-status i {
        font-size: 0.7rem;
    }

    /* ============================================
   RESPONSIVIDADE
============================================ */

    /* Tablets grandes / Desktop pequeno */
    @media (max-width: 1024px) {
        .suporte-grid {
            gap: var(--space-lg);
        }

        .suporte-card {
            padding: var(--space-lg);
        }

        .suporte-icon {
            width: 60px;
            height: 60px;
            font-size: 1.6rem;
            margin-bottom: var(--space-md);
        }

        .suporte-title {
            font-size: 1rem;
        }
    }

    /* Tablets */
    @media (max-width: 768px) {
        .suporte-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-md);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .suporte-card {
            padding: var(--space-md);
        }

        .suporte-icon {
            width: 55px;
            height: 55px;
            font-size: 1.4rem;
            margin-bottom: var(--space-md);
        }

        .suporte-title {
            font-size: 0.95rem;
        }

        .suporte-info strong {
            font-size: 0.9rem;
        }

        .suporte-info span {
            font-size: 0.8rem;
        }

        .suporte-status {
            font-size: 0.7rem;
            padding: 0.2rem 0.6rem;
        }
    }

    /* Mobile */
    @media (max-width: 480px) {
        .suporte-grid {
            grid-template-columns: 1fr;
            max-width: 380px;
            gap: var(--space-md);
        }

        .suporte-card {
            padding: var(--space-lg);
            flex-direction: row;
            flex-wrap: wrap;
            text-align: left;
            align-items: center;
            gap: var(--space-md);
        }

        .suporte-icon {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
            margin: 0;
            flex-shrink: 0;
        }

        .suporte-card-content {
            flex: 1;
            min-width: 150px;
        }

        .suporte-title {
            font-size: 0.9rem;
            margin-bottom: var(--space-xs);
        }

        .suporte-info {
            margin: var(--space-xs) 0;
        }

        .suporte-info strong {
            font-size: 0.85rem;
        }

        .suporte-info span {
            font-size: 0.75rem;
        }

        .suporte-status {
            font-size: 0.65rem;
            padding: 0.15rem 0.5rem;
            margin-top: 0;
        }

        /* Ajuste para o ícone do WhatsApp */
        .suporte-icon-whatsapp {
            background: #25D366;
        }
    }

    /* Mobile muito pequeno */
    @media (max-width: 360px) {
        .suporte-card {
            padding: var(--space-sm);
            flex-direction: column;
            text-align: center;
            gap: var(--space-sm);
        }

        .suporte-icon {
            width: 45px;
            height: 45px;
            font-size: 1rem;
        }

        .suporte-card-content {
            min-width: 100%;
        }

        .suporte-title {
            font-size: 0.85rem;
        }

        .suporte-info strong {
            font-size: 0.8rem;
        }

        .suporte-info span {
            font-size: 0.7rem;
        }
    }
</style>

<style>
    /* ============================================================
   LOCALIZAÇÃO - ESTILOS RESPONSIVOS
   ============================================================ */

/* ============================================
   GRID PRINCIPAL
============================================ */
.location-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-2xl);
    align-items: start;
}

/* ============================================
   INFORMAÇÕES DE LOCALIZAÇÃO
============================================ */
.location-info {
    background: white;
    border-radius: var(--radius-xl);
    padding: var(--space-xl);
    box-shadow: var(--shadow-md);
    display: flex;
    flex-direction: column;
    height: 100%;
}

.location-title {
    font-family: var(--font-secondary);
    color: var(--color-secondary);
    margin-bottom: var(--space-lg);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1.2rem;
}

.location-title i {
    color: var(--color-accent-2);
}

/* ============================================
   DETALHES DE LOCALIZAÇÃO
============================================ */
.location-details {
    margin-bottom: var(--space-lg);
    flex: 1;
}

.location-item {
    display: flex;
    align-items: flex-start;
    gap: var(--space-md);
    padding: var(--space-sm) 0;
    border-bottom: 1px solid var(--gray-100);
}

.location-item-last {
    border-bottom: none;
}

.location-item i {
    margin-top: 0.2rem;
    flex-shrink: 0;
    width: 20px;
    text-align: center;
}

.location-item i.fa-map-marker-alt {
    color: var(--color-accent-2);
}

.location-item i.fa-phone {
    color: var(--color-accent);
}

.location-item i.fa-envelope {
    color: #F9A825;
}

.location-item i.fa-clock {
    color: #00BCD4;
}

.location-item div {
    flex: 1;
}

.location-item strong {
    color: var(--color-secondary);
    display: block;
    font-size: 0.8rem;
    font-weight: 600;
}

.location-item p {
    color: var(--gray-500);
    font-size: 0.95rem;
    margin: 0;
}

/* ============================================
   BOTÃO DO MAPA
============================================ */
.btn-map {
    width: 100%;
    justify-content: center;
    padding: 0.8rem 1.5rem;
}

/* ============================================
   MAPA INTERATIVO
============================================ */
.location-map {
    background: var(--gradient-primary);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    min-height: 400px;
    position: relative;
}

#map {
    height: 400px;
    width: 100%;
    border-radius: var(--radius-xl);
    overflow: hidden;
}

/* Fallback quando o mapa não carrega */
.location-map .map-fallback {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--gradient-primary);
    color: white;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: var(--space-2xl);
}

.location-map .map-fallback i {
    font-size: 3rem;
    opacity: 0.3;
    margin-bottom: var(--space-md);
}

.location-map .map-fallback h4 {
    font-family: var(--font-secondary);
    font-size: 1.2rem;
    margin-bottom: var(--space-sm);
}

.location-map .map-fallback p {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
}

/* ============================================
   RESPONSIVIDADE
============================================ */

/* Tablets grandes */
@media (max-width: 1024px) {
    .location-grid {
        gap: var(--space-xl);
    }

    .location-info {
        padding: var(--space-lg);
    }

    .location-title {
        font-size: 1.1rem;
    }

    #map {
        height: 350px;
    }

    .location-map {
        min-height: 350px;
    }
}

/* Tablets */
@media (max-width: 768px) {
    .location-grid {
        grid-template-columns: 1fr;
        gap: var(--space-xl);
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .location-info {
        padding: var(--space-lg);
        order: 2;
    }

    .location-map {
        order: 1;
        min-height: 300px;
    }

    #map {
        height: 300px;
    }

    .location-item p {
        font-size: 0.9rem;
    }

    .btn-map {
        padding: 0.7rem 1.2rem;
        font-size: 0.9rem;
    }
}

/* Mobile */
@media (max-width: 480px) {
    .location-grid {
        gap: var(--space-lg);
        padding: 0 var(--space-sm);
    }

    .location-info {
        padding: var(--space-md);
    }

    .location-title {
        font-size: 1rem;
        gap: 0.3rem;
        margin-bottom: var(--space-md);
    }

    .location-item {
        gap: var(--space-sm);
        padding: var(--space-xs) 0;
    }

    .location-item i {
        font-size: 0.9rem;
        width: 18px;
    }

    .location-item strong {
        font-size: 0.7rem;
    }

    .location-item p {
        font-size: 0.85rem;
    }

    .location-map {
        min-height: 220px;
    }

    #map {
        height: 220px;
    }

    .btn-map {
        padding: 0.6rem 1rem;
        font-size: 0.85rem;
    }

    .btn-map i {
        font-size: 0.85rem;
    }
}

/* Mobile muito pequeno */
@media (max-width: 360px) {
    .location-info {
        padding: var(--space-sm);
    }

    .location-title {
        font-size: 0.9rem;
    }

    .location-item p {
        font-size: 0.8rem;
    }

    .location-map {
        min-height: 180px;
    }

    #map {
        height: 180px;
    }

    .btn-map {
        font-size: 0.8rem;
        padding: 0.5rem 0.8rem;
    }

    .btn-map span {
        display: none;
    }

    .btn-map i {
        font-size: 1rem;
    }
}
</style>
</html>