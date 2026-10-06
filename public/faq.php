<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus — FAQ - Perguntas Frequentes</title>

    <!-- Meta Tags -->
    <meta name="description" content="Encontre respostas para as perguntas mais frequentes sobre a GeoNexus, plataforma de geotecnologia, engenharia e topografia.">
    <meta name="keywords" content="faq, perguntas, respostas, duvidas, geonexus, geotecnologia, engenharia, topografia">
    <meta name="author" content="GeoNexus">

    <!-- Open Graph -->
    <meta property="og:title" content="GeoNexus — FAQ - Perguntas Frequentes">
    <meta property="og:description" content="Encontre respostas para as suas dúvidas sobre a GeoNexus.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://geonnexus.com/faq">

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
   HERO DA PÁGINA FAQ
============================================================ -->
    <section class="faq-hero" id="faq-hero">
        <div class="hero-particles">
            <div class="particle" style="left: 10%; animation-duration: 18s; animation-delay: 0s;"></div>
            <div class="particle" style="left: 30%; animation-duration: 22s; animation-delay: 2s;"></div>
            <div class="particle" style="left: 50%; animation-duration: 20s; animation-delay: 4s;"></div>
            <div class="particle" style="left: 70%; animation-duration: 25s; animation-delay: 1s;"></div>
            <div class="particle" style="left: 90%; animation-duration: 19s; animation-delay: 3s;"></div>
        </div>

        <div class="container faq-hero-container">
            <div class="faq-hero-content">
                <div class="hero-badge">
                    <i class="fas fa-question-circle"></i>
                    <span>Perguntas Frequentes</span>
                </div>

                <h1 class="hero-title">
                    Dúvidas <span class="highlight">Frequentes</span>
                </h1>

                <p class="hero-subtitle">
                    Encontre respostas para as perguntas mais comuns sobre a GeoNexus.
                    <strong>Se não encontrar a sua resposta,</strong> entre em contacto connosco.
                </p>

                <div class="hero-actions">
                    <a href="#faq-section" class="btn btn-primary">
                        <span>Explorar FAQ</span>
                        <i class="fas fa-arrow-down btn-arrow"></i>
                        <span class="btn-hover-effect"></span>
                    </a>
                    <a href="contactos.php" class="btn btn-outline-light">
                        <i class="fas fa-headset"></i>
                        <span>Contactar Suporte</span>
                    </a>
                </div>
            </div>

            <div class="faq-hero-visual">
                <div class="hero-orb"></div>
                <div class="faq-illustration">
                    <div class="floating-element" style="top: 10%; left: 10%; animation-delay: 0s;">
                        <i class="fas fa-question"></i>
                    </div>
                    <div class="floating-element" style="top: 30%; right: 15%; animation-delay: 1s;">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="floating-element" style="bottom: 20%; left: 20%; animation-delay: 2s;">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="floating-element" style="bottom: 30%; right: 10%; animation-delay: 3s;">
                        <i class="fas fa-comment"></i>
                    </div>
                    <div class="floating-element" style="top: 50%; left: 50%; transform: translate(-50%, -50%); animation-delay: 1.5s;">
                        <i class="fas fa-question-circle"></i>
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
                <span class="current">FAQ</span>
            </div>
        </div>
    </div>

    <!-- ============================================================
   FILTRO DE CATEGORIAS (ESTILO BLOG)
============================================================ -->
    <section class="section" id="faq-search">
        <div class="container">
            <div class="faq-filter animate-fade-up">
                <div class="filter-label">
                    <i class="fas fa-filter"></i>
                    <span>Filtrar por:</span>
                </div>
                <div class="filter-options">
                    <button class="filter-btn active" data-category="all">
                        <i class="fas fa-th-list"></i> Todas
                    </button>
                    <button class="filter-btn" data-category="plataforma">
                        <i class="fas fa-cogs"></i> Plataforma
                    </button>
                    <button class="filter-btn" data-category="planos">
                        <i class="fas fa-crown"></i> Planos
                    </button>
                    <button class="filter-btn" data-category="tecnico">
                        <i class="fas fa-code"></i> Suporte Técnico
                    </button>
                    <button class="filter-btn" data-category="seguranca">
                        <i class="fas fa-shield-alt"></i> Segurança
                    </button>
                    <button class="filter-btn" data-category="faturamento">
                        <i class="fas fa-file-invoice"></i> Faturamento
                    </button>
                </div>
                <div class="filter-result">
                    <span id="resultCount">15</span> perguntas
                </div>
            </div>

            <!-- Barra de Pesquisa -->
            <div class="faq-search-wrapper" style="max-width: 700px; margin: 1.5rem auto 0;">
                <div style="position: relative;">
                    <i class="fas fa-search" style="position: absolute; left: 1.2rem; top: 50%; transform: translateY(-50%); color: var(--gray-400);"></i>
                    <input type="text" id="faqSearch" placeholder="Pesquisar perguntas..." style="width: 100%; padding: 0.9rem 1rem 0.9rem 3.5rem; border: 2px solid var(--gray-200); border-radius: var(--radius-full); font-size: 1rem; transition: all 0.3s ease; background: white; box-shadow: var(--shadow-sm);">
                </div>
                <p style="text-align: center; font-size: 0.85rem; color: var(--gray-400); margin-top: var(--space-sm);">
                    <i class="fas fa-info-circle"></i> Digite uma palavra-chave para filtrar as perguntas
                </p>
            </div>
        </div>
    </section>

    <!-- ============================================================
   PERGUNTAS FREQUENTES
============================================================ -->
    <section class="section" id="faq-section" style="margin-top: -160px;">
        <div class="container">
            <div class="section-header animate-fade-up">
                <span class="section-badge">
                    <i class="fas fa-question-circle"></i> FAQ
                </span>
                <h2 class="section-title">
                    Perguntas <span class="highlight">Frequentes</span>
                </h2>
                <p class="section-description">
                    Encontre respostas para as dúvidas mais comuns sobre a GeoNexus.
                </p>
            </div>

            <div class="faq-grid" id="faqGrid">

                <!-- ==========================================
                CATEGORIA: PLATAFORMA
                ========================================== -->

                <!-- Pergunta 1 -->
                <div class="faq-item" data-category="plataforma">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-cogs"></i></span>
                            <h4>O que é a GeoNexus?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>A GeoNexus é um ecossistema digital que unifica topografia, engenharia civil, GIS, agricultura de precisão, mineração, petróleo e gás, energia, urbanismo, transportes, drones e educação num único lugar. É uma plataforma SaaS projetada para profissionais e empresas que trabalham com dados geoespaciais e gestão de projetos.</p>
                    </div>
                </div>

                <!-- Pergunta 2 -->
                <div class="faq-item" data-category="plataforma">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-globe"></i></span>
                            <h4>Quem pode utilizar a GeoNexus?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>A GeoNexus é projetada para:</p>
                        <ul>
                            <li><strong>Profissionais autónomos</strong> - Topógrafos, engenheiros, arquitetos</li>
                            <li><strong>Empresas</strong> - Construtoras, empresas de mineração, consultorias</li>
                            <li><strong>Instituições</strong> - Universidades, órgãos públicos, institutos de pesquisa</li>
                            <li><strong>Governos</strong> - Municípios, províncias, ministérios</li>
                        </ul>
                    </div>
                </div>

                <!-- Pergunta 3 -->
                <div class="faq-item" data-category="plataforma">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-devices"></i></span>
                            <h4>A GeoNexus funciona em dispositivos móveis?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Sim! A GeoNexus é totalmente responsiva e funciona em:</p>
                        <ul>
                            <li><strong>Desktop</strong> - Windows, macOS, Linux</li>
                            <li><strong>Tablets</strong> - iPad, Android tablets</li>
                            <li><strong>Smartphones</strong> - iOS e Android</li>
                        </ul>
                        <p>A plataforma é otimizada para uso em campo, permitindo levantamentos e coleta de dados diretamente do seu dispositivo móvel.</p>
                    </div>
                </div>

                <!-- Pergunta 4 -->
                <div class="faq-item" data-category="plataforma">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-cloud-upload-alt"></i></span>
                            <h4>Como os dados são armazenados e protegidos?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Todos os dados são armazenados em servidores seguros na nuvem, com:</p>
                        <ul>
                            <li><strong>Criptografia</strong> - Dados encriptados em trânsito e em repouso</li>
                            <li><strong>Backups automáticos</strong> - Cópias de segurança diárias</li>
                            <li><strong>Controle de acesso</strong> - Permissões granulares por utilizador</li>
                            <li><strong>Conformidade</strong> - Seguimos as melhores práticas de segurança</li>
                        </ul>
                    </div>
                </div>

                <!-- ==========================================
                CATEGORIA: PLANOS
                ========================================== -->

                <!-- Pergunta 5 -->
                <div class="faq-item" data-category="planos">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-crown"></i></span>
                            <h4>Quais são os planos disponíveis?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>A GeoNexus oferece três planos principais:</p>
                        <ul>
                            <li><strong>Individual</strong> - Para topógrafos e engenheiros autónomos (Kz 5.000/mês)</li>
                            <li><strong>Empresarial</strong> - Para empresas e organizações (Kz 15.000/mês)</li>
                            <li><strong>Institucional</strong> - Para universidades, governos e grandes instituições (Kz 35.000/mês)</li>
                        </ul>
                        <p><a href="planos.php">Ver todos os planos →</a></p>
                    </div>
                </div>

                <!-- Pergunta 6 -->
                <div class="faq-item" data-category="planos">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-exchange-alt"></i></span>
                            <h4>Posso mudar de plano?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Sim! Pode fazer upgrade ou downgrade do seu plano a qualquer momento. O valor será ajustado proporcionalmente ao período restante do seu ciclo de faturação.</p>
                    </div>
                </div>

                <!-- Pergunta 7 -->
                <div class="faq-item" data-category="planos">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-credit-card"></i></span>
                            <h4>Como funciona o pagamento?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Aceitamos os seguintes métodos de pagamento:</p>
                        <ul>
                            <li><strong>Transferência bancária</strong> - Para Angola e internacional</li>
                            <li><strong>Depósito</strong> - Em qualquer agência bancária</li>
                            <li><strong>Multicaixa</strong> - Pagamento através da rede Multicaixa</li>
                            <li><strong>Outros</strong> - Consulte a nossa equipa para opções adicionais</li>
                        </ul>
                    </div>
                </div>

                <!-- ==========================================
                CATEGORIA: SUPORTE TÉCNICO
                ========================================== -->

                <!-- Pergunta 8 -->
                <div class="faq-item" data-category="tecnico">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-headset"></i></span>
                            <h4>Como posso obter suporte técnico?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Oferecemos suporte através de vários canais:</p>
                        <ul>
                            <li><strong>Email</strong> - suporte@geonnexus.com (resposta em até 24h)</li>
                            <li><strong>Telefone</strong> - +244 900 000 000 (Segunda a Sexta, 8h-18h)</li>
                            <li><strong>WhatsApp</strong> - +244 900 000 000 (resposta rápida)</li>
                            <li><strong>Portal de Suporte</strong> - Disponível para clientes empresariais e institucionais</li>
                        </ul>
                    </div>
                </div>

                <!-- Pergunta 9 -->
                <div class="faq-item" data-category="tecnico">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-key"></i></span>
                            <h4>Como recuperar a minha senha?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Para recuperar a sua senha:</p>
                        <ol>
                            <li>Aceda à <a href="login.php">página de login</a></li>
                            <li>Clique em "Esqueceu a senha?"</li>
                            <li>Introduza o seu email</li>
                            <li>Siga as instruções enviadas para o seu email</li>
                        </ol>
                        <p>Se ainda tiver problemas, contacte o suporte.</p>
                    </div>
                </div>

                <!-- Pergunta 10 -->
                <div class="faq-item" data-category="tecnico">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-file-import"></i></span>
                            <h4>Quais formatos de arquivo são suportados?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>A GeoNexus suporta uma ampla variedade de formatos:</p>
                        <ul>
                            <li><strong>CAD</strong> - DXF, DWG</li>
                            <li><strong>GIS</strong> - SHP, GeoJSON, KML, GPX</li>
                            <li><strong>Imagens</strong> - GeoTIFF, JPEG, PNG</li>
                            <li><strong>Dados</strong> - CSV, Excel (XLSX)</li>
                            <li><strong>Documentos</strong> - PDF, DOCX, TXT</li>
                        </ul>
                    </div>
                </div>

                <!-- ==========================================
                CATEGORIA: SEGURANÇA
                ========================================== -->

                <!-- Pergunta 11 -->
                <div class="faq-item" data-category="seguranca">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-lock"></i></span>
                            <h4>Os meus dados estão seguros?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Sim! A segurança dos seus dados é a nossa prioridade. Implementamos:</p>
                        <ul>
                            <li><strong>Criptografia AES-256</strong> para dados em repouso</li>
                            <li><strong>TLS 1.3</strong> para dados em trânsito</li>
                            <li><strong>Autenticação de dois fatores (2FA)</strong> opcional</li>
                            <li><strong>Backups diários</strong> em localizações geograficamente distribuídas</li>
                            <li><strong>Auditoria de acesso</strong> a todos os dados</li>
                        </ul>
                    </div>
                </div>

                <!-- Pergunta 12 -->
                <div class="faq-item" data-category="seguranca">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-user-shield"></i></span>
                            <h4>Quem tem acesso aos meus dados?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>O acesso aos dados é estritamente controlado:</p>
                        <ul>
                            <li><strong>Você</strong> - Controla quem tem acesso aos seus projetos</li>
                            <li><strong>Membros da sua equipa</strong> - Com permissões que você define</li>
                            <li><strong>Equipa GeoNexus</strong> - Apenas para suporte técnico, com registo de todas as ações</li>
                        </ul>
                        <p>Nunca partilhamos os seus dados com terceiros sem o seu consentimento explícito.</p>
                    </div>
                </div>

                <!-- ==========================================
                CATEGORIA: FATURAMENTO
                ========================================== -->

                <!-- Pergunta 13 -->
                <div class="faq-item" data-category="faturamento">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-file-invoice"></i></span>
                            <h4>Como recebo a minha fatura?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>As faturas são geradas automaticamente e enviadas para o seu email. Você também pode:</p>
                        <ul>
                            <li>Baixar faturas no painel de controlo</li>
                            <li>Visualizar histórico de pagamentos</li>
                            <li>Solicitar faturação com NIF</li>
                        </ul>
                    </div>
                </div>

                <!-- Pergunta 14 -->
                <div class="faq-item" data-category="faturamento">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-undo-alt"></i></span>
                            <h4>Qual é a política de cancelamento?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Pode cancelar a sua subscrição a qualquer momento:</p>
                        <ul>
                            <li><strong>Sem multa</strong> - Cancelamento sem custos adicionais</li>
                            <li><strong>Sem fidelização</strong> - Planos mensais sem compromisso</li>
                            <li><strong>Proporcional</strong> - Reembolso proporcional ao período não utilizado</li>
                        </ul>
                        <p>Para cancelar, aceda ao painel de controlo ou contacte o suporte.</p>
                    </div>
                </div>

                <!-- Pergunta 15 -->
                <div class="faq-item" data-category="faturamento">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <div class="faq-question-content">
                            <span class="faq-icon"><i class="fas fa-graduation-cap"></i></span>
                            <h4>Existe desconto para estudantes e instituições de ensino?</h4>
                        </div>
                        <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>Sim! Oferecemos condições especiais para:</p>
                        <ul>
                            <li><strong>Estudantes</strong> - Descontos em planos individuais</li>
                            <li><strong>Universidades</strong> - Planos educacionais com preços especiais</li>
                            <li><strong>Institutos de pesquisa</strong> - Condições personalizadas</li>
                        </ul>
                        <p>Entre em contacto connosco para mais informações.</p>
                    </div>
                </div>

            </div>

            <!-- Nenhum resultado -->
            <div id="noResults" style="display: none; text-align: center; padding: var(--space-3xl) 0;">
                <i class="fas fa-search" style="font-size: 3rem; color: var(--gray-300);"></i>
                <h3 style="font-family: var(--font-secondary); color: var(--color-secondary); margin-top: var(--space-md);">Nenhuma pergunta encontrada</h3>
                <p style="color: var(--gray-500);">Tente usar outras palavras-chave ou <a href="contactos.php" style="color: var(--color-accent-2);">contacte o suporte</a>.</p>
            </div>
        </div>
    </section>

    <!-- ============================================================
   CONTACTO - AINDA COM DÚVIDAS?
============================================================ -->
    <section class="section section-gray" id="contacto">
        <div class="container">
            <div class="contact-cta" style="max-width: 700px; margin: 0 auto; background: var(--gradient-primary); border-radius: var(--radius-xl); padding: var(--space-2xl); color: white; text-align: center;">
                <i class="fas fa-headset" style="font-size: 3rem; color: var(--color-accent); margin-bottom: var(--space-md);"></i>
                <h3 style="font-family: var(--font-secondary); font-size: 1.8rem;">Ainda com dúvidas?</h3>
                <p style="color: rgba(255,255,255,0.8); font-size: 1.05rem; line-height: 1.7; margin: var(--space-md) 0 var(--space-lg);">
                    A nossa equipa está disponível para responder a todas as suas perguntas.
                </p>
                <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
                    <a href="contactos.php" class="btn btn-primary" style="background: var(--gradiente-accent);">
                        <i class="fas fa-envelope"></i>
                        <span>Contactar Suporte</span>
                        <span class="btn-hover-effect"></span>
                    </a>
                    <a href="https://wa.me/244900000000" class="btn btn-outline-light" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
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

    <!-- ============================================================
   SCRIPTS
============================================================ -->
    <script src="../assets/js/site.js"></script>

    <script>
        // ============================================================
        // SCRIPTS DA PÁGINA FAQ
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
                'CARREGANDO PERGUNTAS',
                'PREPARANDO RESPOSTAS',
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

        // ============================================================
        // TOGGLE FAQ
        // ============================================================
        function toggleFaq(element) {
            const item = element.closest('.faq-item');
            const isActive = item.classList.contains('active');

            // Fecha todos os outros
            document.querySelectorAll('.faq-item.active').forEach(function(el) {
                if (el !== item) {
                    el.classList.remove('active');
                }
            });

            if (isActive) {
                item.classList.remove('active');
            } else {
                item.classList.add('active');
            }
        }

        // ============================================================
        // FILTRO DE CATEGORIAS (ESTILO BLOG)
        // ============================================================
        const filterBtns = document.querySelectorAll('.filter-btn');
        const faqItems = document.querySelectorAll('.faq-item');
        const noResults = document.getElementById('noResults');
        const resultCount = document.getElementById('resultCount');

        function filterFaq(category) {
            let visibleCount = 0;

            faqItems.forEach(function(item) {
                const itemCategory = item.getAttribute('data-category');
                if (category === 'all' || itemCategory === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Atualiza contagem
            resultCount.textContent = visibleCount;

            // Mostra ou oculta "nenhum resultado"
            if (visibleCount === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }

        // Event listeners para os botões de filtro
        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Remove active de todos
                filterBtns.forEach(function(b) {
                    b.classList.remove('active');
                });

                // Adiciona active ao clicado
                this.classList.add('active');

                // Filtra
                const category = this.getAttribute('data-category');
                filterFaq(category);

                // Limpa a pesquisa
                document.getElementById('faqSearch').value = '';
            });
        });

        // ============================================================
        // PESQUISA DE FAQ
        // ============================================================
        const searchInput = document.getElementById('faqSearch');

        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;

            faqItems.forEach(function(item) {
                const question = item.querySelector('.faq-question h4').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer') ? item.querySelector('.faq-answer').textContent.toLowerCase() : '';
                const allText = question + ' ' + answer;

                if (allText.includes(query) || query === '') {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Atualiza contagem
            resultCount.textContent = visibleCount;

            // Mostra ou oculta "nenhum resultado"
            if (visibleCount === 0 && query !== '') {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }

            // Remove active dos botões de categoria
            if (query !== '') {
                filterBtns.forEach(function(b) {
                    b.classList.remove('active');
                });
            } else {
                // Restaura o active do botão "Todas"
                filterBtns.forEach(function(b) {
                    if (b.getAttribute('data-category') === 'all') {
                        b.classList.add('active');
                    }
                });
            }
        });

        // ============================================================
        // NAVEGAÇÃO SUAVE PARA ÂNCORAS
        // ============================================================
        document.querySelectorAll('a[href^="#"]').forEach(function(link) {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId && targetId !== '#') {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        const offsetTop = targetElement.offsetTop - 80;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>

</body>

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

<style>
    /* ============================================================
   PÁGINA FAQ - ESTILOS ATUALIZADOS
   ============================================================ */

    /* ============================================
       HERO DA PÁGINA FAQ
    ============================================ */
    .faq-hero {
        min-height: 90vh;
        padding-top: 80px;
        position: relative;
        background: var(--gradient-primary);
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .faq-hero-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .faq-hero-content {
        color: white;
    }

    .faq-hero-visual {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .faq-illustration {
        position: relative;
        width: 100%;
        height: 100%;
    }

    /* ============================================
       FILTRO DE CATEGORIAS (ESTILO BLOG)
    ============================================ */
    .faq-filter {
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
       FAQ GRID
    ============================================ */
    .faq-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-lg);
        margin-top: var(--space-2xl);
    }

    .faq-item {
        background: white;
        border-radius: var(--radius-xl);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        border-color: var(--color-accent-2);
        box-shadow: var(--shadow-md);
    }

    .faq-item.active {
        border-color: var(--color-accent-2);
        box-shadow: var(--shadow-md);
    }

    .faq-item.active .faq-toggle {
        transform: rotate(180deg);
        color: var(--color-accent-2);
    }

    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.2rem 1.5rem;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .faq-question:hover {
        background: var(--gray-50);
    }

    .faq-question-content {
        display: flex;
        align-items: center;
        gap: var(--space-md);
        flex: 1;
    }

    .faq-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: rgba(230, 57, 70, 0.08);
        border-radius: 50%;
        color: var(--color-accent-2);
        flex-shrink: 0;
    }

    .faq-question h4 {
        font-family: var(--font-secondary);
        font-size: 1rem;
        color: var(--color-secondary);
        margin: 0;
        line-height: 1.4;
        font-weight: 600;
    }

    .faq-toggle {
        color: var(--gray-400);
        transition: all 0.3s ease;
        flex-shrink: 0;
        margin-left: var(--space-sm);
    }

    .faq-item.active .faq-question {
        background: var(--gray-50);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, padding 0.3s ease;
        padding: 0 1.5rem;
    }

    .faq-item.active .faq-answer {
        max-height: 500px;
        padding: 0 1.5rem 1.5rem;
    }

    .faq-answer p {
        color: var(--gray-600);
        line-height: 1.7;
        margin-bottom: var(--space-sm);
    }

    .faq-answer ul,
    .faq-answer ol {
        color: var(--gray-600);
        line-height: 1.7;
        padding-left: 1.5rem;
        margin-bottom: var(--space-sm);
    }

    .faq-answer ul li,
    .faq-answer ol li {
        margin-bottom: 0.3rem;
    }

    .faq-answer a {
        color: var(--color-accent-2);
        font-weight: 600;
        text-decoration: none;
    }

    .faq-answer a:hover {
        text-decoration: underline;
    }

    /* ============================================
       RESPONSIVIDADE
    ============================================ */
    @media (max-width: 1024px) {
        .faq-hero-container {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 32px;
        }

        .faq-hero-content .hero-subtitle {
            margin: 0 auto 32px;
        }

        .faq-hero-content .hero-actions {
            justify-content: center;
        }

        .faq-hero-visual {
            height: 250px;
        }

        .faq-grid {
            grid-template-columns: 1fr;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .faq-filter {
            flex-direction: column;
            align-items: stretch;
            padding: 1rem;
        }

        .filter-label {
            justify-content: center;
        }

        .filter-options {
            justify-content: center;
        }

        .filter-result {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .faq-hero {
            min-height: 70vh;
        }

        .faq-hero-visual {
            height: 180px;
        }

        .filter-options {
            flex-wrap: wrap;
            justify-content: center;
        }

        .filter-btn {
            font-size: 0.7rem;
            padding: 0.3rem 0.8rem;
        }

        .faq-question {
            padding: 1rem;
        }

        .faq-question h4 {
            font-size: 0.9rem;
        }

        .faq-icon {
            width: 30px;
            height: 30px;
            font-size: 0.8rem;
        }

        .faq-item.active .faq-answer {
            padding: 0 1rem 1rem;
        }

        .faq-search-wrapper input {
            font-size: 0.9rem;
            padding: 0.8rem 0.8rem 0.8rem 3rem;
        }
    }

    @media (max-width: 480px) {
        .faq-hero {
            min-height: 60vh;
        }

        .faq-hero-visual {
            height: 120px;
        }

        .faq-filter {
            padding: 0.8rem;
        }

        .filter-btn {
            font-size: 0.6rem;
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

        .faq-search-wrapper i {
            left: 1rem !important;
        }

        .faq-question-content {
            gap: var(--space-sm);
        }
    }
</style>

</html>