<?php
// painel/individual/servicos/portfolio.php - Portfólio Público do Profissional
// LANDING PAGE - Visível para clientes externos
// SEM SIDEBAR / SEM BOTTOM NAV / SEM DASHBOARD

// ============================================
// DADOS DO PROFISSIONAL
// ============================================
$profissional = [
    'nome' => 'Carlos Mendes',
    'profissao' => 'Engenheiro Topógrafo',
    'nivel' => 'Profissional Certificado',
    'biografia' => 'Engenheiro Topógrafo com mais de 10 anos de experiência em levantamentos topográficos, mapeamento GIS e geotecnologia aplicada. Especializado em projetos de urbanismo, cadastro rural e agricultura de precisão.',
    'email' => 'carlos.mendes@email.com',
    'telefone' => '+244 923 456 789',
    'localizacao' => 'Luanda, Angola',
    'plano' => 'Pro',
    'avaliacao' => 4.9,
    'total_avaliacoes' => 42,
    'clientes_satisfeitos' => 35,
    'projetos_concluidos' => 87,
    'anos_experiencia' => 10,
    'data_registo' => '2024-06-15',
    'redes_sociais' => [
        ['icon' => 'fa-linkedin', 'url' => '#', 'cor' => '#0077B5'],
        ['icon' => 'fa-instagram', 'url' => '#', 'cor' => '#E4405F'],
        ['icon' => 'fa-facebook', 'url' => '#', 'cor' => '#1877F2'],
        ['icon' => 'fa-whatsapp', 'url' => '#', 'cor' => '#25D366'],
    ],
    'especialidades' => [
        'Levantamento Topográfico',
        'Mapeamento GIS',
        'Cadastro Rural',
        'Agricultura de Precisão',
        'Levantamento com Drones',
        'Modelação 3D'
    ]
];

// ============================================
// SERVIÇOS DO PORTFÓLIO
// ============================================
$servicos = [
    [
        'id' => 1,
        'nome' => 'Levantamento Topográfico',
        'descricao' => 'Levantamento topográfico completo com curvas de nível, pontos georreferenciados e plantas em escala 1:1000. Ideal para projetos de construção e urbanização.',
        'categoria' => 'Topografia',
        'categoria_icon' => 'fa-mountain',
        'categoria_color' => '#6C2BD9',
        'preco_base' => 350000,
        'unidade' => 'por hectare',
        'duracao' => '15-30 dias',
        'avaliacao' => 4.9,
        'total_avaliacoes' => 18,
        'imagem_icon' => 'fa-mountain',
        'destaque' => true,
        'popular' => true,
        'urgente' => false
    ],
    [
        'id' => 2,
        'nome' => 'Mapeamento GIS',
        'descricao' => 'Mapeamento GIS com análise espacial, mapas interativos e base de dados georreferenciada. Perfeito para gestão territorial e planeamento estratégico.',
        'categoria' => 'GIS',
        'categoria_icon' => 'fa-globe',
        'categoria_color' => '#00FFA3',
        'preco_base' => 480000,
        'unidade' => 'por projeto',
        'duracao' => '20-40 dias',
        'avaliacao' => 4.8,
        'total_avaliacoes' => 14,
        'imagem_icon' => 'fa-globe',
        'destaque' => false,
        'popular' => true,
        'urgente' => false
    ],
    [
        'id' => 3,
        'nome' => 'Levantamento Planialtimétrico',
        'descricao' => 'Levantamento planialtimétrico com detalhamento de relevo e altimetria para projetos de engenharia e infraestrutura.',
        'categoria' => 'Topografia',
        'categoria_icon' => 'fa-mountain',
        'categoria_color' => '#6C2BD9',
        'preco_base' => 280000,
        'unidade' => 'por hectare',
        'duracao' => '10-20 dias',
        'avaliacao' => 4.7,
        'total_avaliacoes' => 22,
        'imagem_icon' => 'fa-ruler-combined',
        'destaque' => false,
        'popular' => false,
        'urgente' => false
    ],
    [
        'id' => 4,
        'nome' => 'Cadastro Rural',
        'descricao' => 'Cadastro rural completo com georreferenciamento, demarcação de limites e emissão de documentação oficial.',
        'categoria' => 'Cadastro',
        'categoria_icon' => 'fa-home',
        'categoria_color' => '#FFD93D',
        'preco_base' => 195000,
        'unidade' => 'por propriedade',
        'duracao' => '7-15 dias',
        'avaliacao' => 4.6,
        'total_avaliacoes' => 9,
        'imagem_icon' => 'fa-home',
        'destaque' => false,
        'popular' => false,
        'urgente' => false
    ],
    [
        'id' => 5,
        'nome' => 'Levantamento com Drone',
        'descricao' => 'Levantamento aéreo com drone para mapeamento de áreas extensas e geração de ortomosaico de alta resolução.',
        'categoria' => 'Drones',
        'categoria_icon' => 'fa-drone',
        'categoria_color' => '#FF6B6B',
        'preco_base' => 320000,
        'unidade' => 'por voo',
        'duracao' => '5-10 dias',
        'avaliacao' => 5.0,
        'total_avaliacoes' => 25,
        'imagem_icon' => 'fa-drone',
        'destaque' => true,
        'popular' => true,
        'urgente' => true
    ],
    [
        'id' => 6,
        'nome' => 'Análise de Solo Agrícola',
        'descricao' => 'Análise de solo com mapeamento de precisão, coleta de amostras e recomendações técnicas para otimização de culturas.',
        'categoria' => 'Agricultura',
        'categoria_icon' => 'fa-tractor',
        'categoria_color' => '#6BCB77',
        'preco_base' => 220000,
        'unidade' => 'por área',
        'duracao' => '10-15 dias',
        'avaliacao' => 4.5,
        'total_avaliacoes' => 6,
        'imagem_icon' => 'fa-tractor',
        'destaque' => false,
        'popular' => false,
        'urgente' => false
    ]
];

// ============================================
// PROJETOS REALIZADOS
// ============================================
$projetos_realizados = [
    [
        'titulo' => 'Urbanização de Luanda Sul',
        'cliente' => 'Município de Luanda',
        'categoria' => 'Topografia',
        'categoria_color' => '#6C2BD9',
        'categoria_icon' => 'fa-mountain',
        'ano' => '2025',
        'descricao' => 'Levantamento topográfico de 120 hectares para projeto de urbanização.'
    ],
    [
        'titulo' => 'Mapeamento Industrial',
        'cliente' => 'Indústria Luanda',
        'categoria' => 'GIS',
        'categoria_color' => '#00FFA3',
        'categoria_icon' => 'fa-globe',
        'ano' => '2025',
        'descricao' => 'Mapeamento GIS completo da área industrial com análise espacial.'
    ],
    [
        'titulo' => 'Cadastro Agrícola',
        'cliente' => 'Agro Negócios Lda',
        'categoria' => 'Cadastro',
        'categoria_color' => '#FFD93D',
        'categoria_icon' => 'fa-home',
        'ano' => '2024',
        'descricao' => 'Cadastro rural de 15 propriedades com georreferenciamento.'
    ],
    [
        'titulo' => 'Levantamento Aéreo Costeiro',
        'cliente' => 'Ministério do Ambiente',
        'categoria' => 'Drones',
        'categoria_color' => '#FF6B6B',
        'categoria_icon' => 'fa-drone',
        'ano' => '2024',
        'descricao' => 'Mapeamento aéreo de área costeira com geração de ortomosaico.'
    ]
];

// ============================================
// AVALIAÇÕES DE CLIENTES
// ============================================
$avaliacoes = [
    [
        'cliente' => 'Construtora ABC',
        'cargo' => 'Diretor Técnico',
        'comentario' => 'Excelente trabalho! O levantamento foi feito com precisão e entregue dentro do prazo. Recomendo fortemente.',
        'nota' => 5,
        'avatar_iniciais' => 'CA',
        'cor' => '#6C2BD9'
    ],
    [
        'cliente' => 'Município de Luanda',
        'cargo' => 'Gestor de Projetos',
        'comentario' => 'Profissionalismo e rigor técnico excecionais. Trabalho de altíssima qualidade.',
        'nota' => 5,
        'avatar_iniciais' => 'ML',
        'cor' => '#00D2FF'
    ],
    [
        'cliente' => 'Agro Negócios Lda',
        'cargo' => 'Gerente Geral',
        'comentario' => 'Bom trabalho no geral. Comunicação clara e resultados precisos.',
        'nota' => 5,
        'avatar_iniciais' => 'AN',
        'cor' => '#6BCB77'
    ]
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('renderEstrelas')) {
    function renderEstrelas($avaliacao) {
        $html = '';
        $cheias = floor($avaliacao);
        $meia = ($avaliacao - $cheias) >= 0.5;
        
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $cheias) {
                $html .= '<i class="fas fa-star"></i>';
            } elseif ($i == $cheias + 1 && $meia) {
                $html .= '<i class="fas fa-star-half-alt"></i>';
            } else {
                $html .= '<i class="far fa-star"></i>';
            }
        }
        return $html;
    }
}

// ============================================
// ID ÚNICO PARA NOTIFICAÇÕES
// ============================================
$notif_unique_id = 'portfolio_' . uniqid();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfólio de <?php echo $profissional['nome']; ?> - <?php echo $profissional['profissao']; ?>. Serviços profissionais de topografia, GIS, cadastro e geotecnologia.">
    <title><?php echo $profissional['nome']; ?> | <?php echo $profissional['profissao']; ?></title>

    <!-- ===== FAVICON ===== -->
    <link rel="icon" type="image/png" href="../../../assets/images/favicon.png">

    <!-- ===== FONTES ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ===== FONT AWESOME ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ===== THEME INICIAL ===== -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-portfolio-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>

    <style>
        /* ========================================== */
        /* VARIÁVEIS GLOBAIS                          */
        /* ========================================== */
        :root {
            --color-deep-blue: #0A1628;
            --color-cosmic-blue: #1A2A4A;
            --color-turquoise: #00D2FF;
            --color-aurora: #6C2BD9;
            --color-future-green: #00FFA3;
            --color-white: #FFFFFF;
            --color-yellow: #FFD93D;
            --color-red: #FF6B6B;

            --gradient-aurora: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
            --gradient-geo: linear-gradient(135deg, #00D2FF 0%, #00FFA3 100%);
            --gradient-cosmic: linear-gradient(135deg, #0A1628 0%, #1A2A4A 100%);

            --font-display: 'Orbitron', sans-serif;
            --font-body: 'Inter', sans-serif;
            --font-title: 'Space Grotesk', sans-serif;

            --space-xs: 0.25rem;
            --space-sm: 0.5rem;
            --space-md: 1rem;
            --space-lg: 1.5rem;
            --space-xl: 2rem;
            --space-2xl: 3rem;
            --space-3xl: 4rem;
            --space-4xl: 6rem;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --radius-xl: 28px;
            --radius-full: 9999px;

            --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-bounce: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* ========================================== */
        /* TEMAS                                      */
        /* ========================================== */
        [data-theme="dark"] {
            --bg-primary: #0A1628;
            --bg-secondary: #1A2A4A;
            --bg-card: rgba(255, 255, 255, 0.03);
            --bg-card-solid: #1A2A4A;
            --bg-input: rgba(255, 255, 255, 0.05);
            --text-primary: #FFFFFF;
            --text-secondary: #B8C6D4;
            --text-muted: #6B7A8F;
            --border-color: rgba(255, 255, 255, 0.06);
            --shadow-color: rgba(0, 0, 0, 0.4);
            --glass-bg: rgba(255, 255, 255, 0.04);
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        [data-theme="light"] {
            --bg-primary: #F0F4F8;
            --bg-secondary: #FFFFFF;
            --bg-card: #FFFFFF;
            --bg-card-solid: #FFFFFF;
            --bg-input: #F7F9FC;
            --text-primary: #0A1628;
            --text-secondary: #4A5A6A;
            --text-muted: #8A9AA8;
            --border-color: rgba(0, 0, 0, 0.08);
            --shadow-color: rgba(0, 0, 0, 0.08);
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(0, 0, 0, 0.06);
        }

        /* ========================================== */
        /* RESET E BASE                               */
        /* ========================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            font-family: var(--font-body);
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            transition: var(--transition-smooth);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-aurora);
            border-radius: 4px;
        }

        /* ========================================== */
        /* CONTAINER                                  */
        /* ========================================== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--space-lg);
        }

        .container-wide {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 var(--space-lg);
        }

        /* ========================================== */
        /* NAVBAR FIXA                                */
        /* ========================================== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            transition: var(--transition-smooth);
        }

        .navbar.scrolled {
            background: var(--bg-secondary);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .navbar-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: var(--space-md) var(--space-lg);
            max-width: 1400px;
            margin: 0 auto;
            gap: var(--space-md);
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
        }

        .navbar-logo-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-md);
            background: var(--gradient-aurora);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 20px;
            box-shadow: 0 4px 16px rgba(108, 43, 217, 0.4);
        }

        .navbar-logo-text {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .navbar-logo-name {
            font-family: var(--font-display);
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1;
        }

        .navbar-logo-subtitle {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: var(--space-xl);
            list-style: none;
        }

        .navbar-menu a {
            font-size: var(--text-sm, 0.9rem);
            font-weight: 500;
            color: var(--text-secondary);
            transition: var(--transition-smooth);
            position: relative;
            padding: 4px 0;
        }

        .navbar-menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-aurora);
            transition: var(--transition-smooth);
            border-radius: 2px;
        }

        .navbar-menu a:hover {
            color: var(--text-primary);
        }

        .navbar-menu a:hover::after {
            width: 100%;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
        }

        .btn-theme-toggle {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            background: var(--bg-input);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: var(--transition-smooth);
            position: relative;
        }

        .btn-theme-toggle:hover {
            border-color: var(--color-turquoise);
            color: var(--color-turquoise);
        }

        .btn-theme-toggle .theme-icon {
            position: absolute;
            transition: var(--transition-smooth);
        }

        .btn-theme-toggle .theme-icon.sun {
            opacity: 1;
            transform: rotate(0deg);
        }

        .btn-theme-toggle .theme-icon.moon {
            opacity: 0;
            transform: rotate(180deg);
        }

        [data-theme="light"] .btn-theme-toggle .theme-icon.sun {
            opacity: 0;
            transform: rotate(180deg);
        }

        [data-theme="light"] .btn-theme-toggle .theme-icon.moon {
            opacity: 1;
            transform: rotate(0deg);
        }

        .btn-navbar {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            white-space: nowrap;
        }

        .btn-navbar-primary {
            background: var(--gradient-aurora);
            color: #FFFFFF;
            box-shadow: 0 4px 16px rgba(108, 43, 217, 0.3);
        }

        .btn-navbar-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(108, 43, 217, 0.4);
        }

        .navbar-mobile-toggle {
            display: none;
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            background: var(--bg-input);
            color: var(--text-primary);
            cursor: pointer;
            font-size: 18px;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
        }

        .navbar-mobile-toggle:hover {
            border-color: var(--color-turquoise);
            color: var(--color-turquoise);
        }

        /* ========================================== */
        /* MENU MOBILE                                */
        /* ========================================== */
        .mobile-menu {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            padding: var(--space-md);
            flex-direction: column;
            gap: var(--space-sm);
            z-index: 999;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .mobile-menu.active {
            display: flex;
        }

        .mobile-menu a {
            padding: var(--space-md);
            border-radius: var(--radius-md);
            color: var(--text-secondary);
            font-size: 0.95rem;
            font-weight: 500;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .mobile-menu a:hover {
            background: var(--bg-card-hover, rgba(255, 255, 255, 0.05));
            color: var(--text-primary);
        }

        .mobile-menu a i {
            width: 20px;
            color: var(--color-turquoise);
        }

        /* ========================================== */
        /* HERO SECTION                               */
        /* ========================================== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 100px 0 60px;
            position: relative;
            overflow: hidden;
            background: var(--bg-primary);
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 43, 217, 0.15) 0%, transparent 70%);
            animation: float-slow 20s ease-in-out infinite;
        }

        .hero-bg::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 210, 255, 0.1) 0%, transparent 70%);
            animation: float-slow 25s ease-in-out infinite reverse;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-4xl);
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-text {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: rgba(0, 255, 163, 0.12);
            color: var(--color-future-green);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: fit-content;
        }

        .hero-badge i {
            font-size: 10px;
            animation: pulse 2s ease-in-out infinite;
        }

        .hero-title {
            font-family: var(--font-title);
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            line-height: 1.1;
            color: var(--text-primary);
            letter-spacing: -1px;
        }

        .hero-title .highlight {
            background: var(--gradient-aurora);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.15rem;
            color: var(--text-secondary);
            line-height: 1.7;
            max-width: 500px;
        }

        .hero-stats {
            display: flex;
            gap: var(--space-xl);
            flex-wrap: wrap;
            padding: var(--space-lg) 0;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .hero-stat {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .hero-stat-value {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-turquoise);
            line-height: 1;
        }

        .hero-stat-label {
            font-size: 0.85rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .hero-actions {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .btn-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            text-decoration: none;
        }

        .btn-hero-primary {
            background: var(--gradient-aurora);
            color: #FFFFFF;
            box-shadow: 0 8px 24px rgba(108, 43, 217, 0.35);
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(108, 43, 217, 0.45);
        }

        .btn-hero-outline {
            background: transparent;
            color: var(--text-primary);
            border: 2px solid var(--border-color);
        }

        .btn-hero-outline:hover {
            border-color: var(--color-turquoise);
            color: var(--color-turquoise);
            background: rgba(0, 210, 255, 0.05);
        }

        /* ===== HERO IMAGE / AVATAR ===== */
        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero-avatar-wrapper {
            position: relative;
            width: 100%;
            max-width: 420px;
            aspect-ratio: 1;
        }

        .hero-avatar-ring {
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            border-radius: 50%;
            border: 2px dashed rgba(108, 43, 217, 0.3);
            animation: spin-slow 60s linear infinite;
        }

        .hero-avatar-ring::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border-radius: 50%;
            border: 2px dashed rgba(0, 210, 255, 0.2);
            animation: spin-slow 45s linear infinite reverse;
        }

        .hero-avatar {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: var(--gradient-aurora);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 30px 80px rgba(108, 43, 217, 0.4);
            overflow: hidden;
        }

        .hero-avatar-initials {
            font-family: var(--font-display);
            font-size: 120px;
            font-weight: 900;
            color: #FFFFFF;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .hero-floating-card {
            position: absolute;
            background: var(--bg-card-solid);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: var(--space-md);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(20px);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            animation: float 4s ease-in-out infinite;
        }

        .hero-floating-card-1 {
            top: 10%;
            right: -10%;
        }

        .hero-floating-card-2 {
            bottom: 15%;
            left: -15%;
            animation-delay: 2s;
        }

        .floating-card-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: rgba(0, 255, 163, 0.15);
            color: var(--color-future-green);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .floating-card-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .floating-card-value {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1;
        }

        .floating-card-label {
            font-size: 0.7rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        /* ========================================== */
        /* SECTION                                    */
        /* ========================================== */
        .section {
            padding: var(--space-4xl) 0;
        }

        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto var(--space-3xl);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-md);
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: rgba(108, 43, 217, 0.1);
            color: var(--color-aurora);
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-title {
            font-family: var(--font-title);
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 800;
            line-height: 1.2;
            color: var(--text-primary);
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            font-size: 1.05rem;
            color: var(--text-secondary);
            line-height: 1.7;
            max-width: 600px;
        }

        /* ========================================== */
        /* SOBRE / ABOUT                              */
        /* ========================================== */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-3xl);
            align-items: center;
        }

        .about-content {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        .about-bio {
            font-size: 1.05rem;
            color: var(--text-secondary);
            line-height: 1.8;
        }

        .about-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .about-feature {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .about-feature:hover {
            border-color: var(--color-turquoise);
            background: var(--bg-card-hover, rgba(255, 255, 255, 0.05));
            transform: translateY(-2px);
        }

        .about-feature-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: rgba(0, 210, 255, 0.12);
            color: var(--color-turquoise);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .about-feature-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .about-feature-title {
            font-family: var(--font-title);
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .about-feature-desc {
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* ===== ESPECIALIDADES ===== */
        .about-skills {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .about-skills-title {
            font-family: var(--font-title);
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .about-skills-title i {
            color: var(--color-future-green);
        }

        .about-skills-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .skill-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-secondary);
            transition: var(--transition-smooth);
        }

        .skill-tag:hover {
            border-color: var(--color-future-green);
            color: var(--color-future-green);
            background: rgba(0, 255, 163, 0.05);
            transform: translateY(-2px);
        }

        .skill-tag i {
            font-size: 12px;
            color: var(--color-future-green);
        }

        /* ========================================== */
        /* SERVIÇOS                                   */
        /* ========================================== */
        .servicos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: var(--space-lg);
        }

        .servico-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: var(--transition-smooth);
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .servico-card:hover {
            border-color: var(--cat-color);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
            transform: translateY(-6px);
        }

        .servico-card-imagem {
            position: relative;
            height: 180px;
            background: linear-gradient(135deg, var(--cat-color)25 0%, var(--cat-color)05 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .servico-card-imagem-icon {
            font-size: 80px;
            color: var(--cat-color);
            opacity: 0.3;
            transition: var(--transition-smooth);
        }

        .servico-card:hover .servico-card-imagem-icon {
            transform: scale(1.1) rotate(-5deg);
            opacity: 0.4;
        }

        .servico-card-badges {
            position: absolute;
            top: var(--space-md);
            left: var(--space-md);
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .servico-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: var(--radius-full);
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            backdrop-filter: blur(10px);
        }

        .servico-badge-destaque {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
        }

        .servico-badge-popular {
            background: linear-gradient(135deg, #FF6B6B 0%, #E55555 100%);
            color: #FFFFFF;
        }

        .servico-badge-urgente {
            background: linear-gradient(135deg, #FF9F43 0%, #E67E22 100%);
            color: #FFFFFF;
        }

        .servico-card-body {
            padding: var(--space-lg);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .servico-card-categoria {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 3px 10px;
            background: var(--cat-color)15;
            color: var(--cat-color);
            border-radius: var(--radius-full);
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            width: fit-content;
        }

        .servico-card-titulo {
            font-family: var(--font-title);
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
        }

        .servico-card-descricao {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .servico-card-avaliacao {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-top: auto;
        }

        .servico-avaliacao-estrelas {
            display: flex;
            gap: 2px;
            color: #FFD93D;
            font-size: 12px;
        }

        .servico-avaliacao-valor {
            font-family: var(--font-display);
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .servico-avaliacao-total {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .servico-card-footer {
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-input);
            border-top: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-sm);
        }

        .servico-card-preco {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .servico-card-preco-valor {
            font-family: var(--font-display);
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--color-future-green);
            line-height: 1;
        }

        .servico-card-preco-unidade {
            font-size: 0.7rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-servico {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            background: var(--gradient-aurora);
            color: #FFFFFF;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-servico:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 43, 217, 0.35);
        }

        /* ========================================== */
        /* PROJETOS REALIZADOS                        */
        /* ========================================== */
        .projetos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: var(--space-md);
        }

        .projeto-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .projeto-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--cat-color);
        }

        .projeto-card:hover {
            border-color: var(--cat-color);
            background: var(--bg-card-hover, rgba(255, 255, 255, 0.05));
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .projeto-card-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
        }

        .projeto-card-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            background: var(--cat-color)20;
            color: var(--cat-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .projeto-card-categoria {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--cat-color);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .projeto-card-ano {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin-left: auto;
        }

        .projeto-card-titulo {
            font-family: var(--font-title);
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0 0 var(--space-xs) 0;
            line-height: 1.3;
        }

        .projeto-card-cliente {
            font-size: 0.8rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: var(--space-sm);
        }

        .projeto-card-cliente i {
            color: var(--color-turquoise);
            font-size: 11px;
        }

        .projeto-card-descricao {
            font-size: 0.85rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        /* ========================================== */
        /* AVALIAÇÕES                                 */
        /* ========================================== */
        .avaliacoes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: var(--space-lg);
        }

        .avaliacao-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            transition: var(--transition-smooth);
            position: relative;
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .avaliacao-card:hover {
            border-color: var(--color-turquoise);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .avaliacao-card-quote {
            position: absolute;
            top: var(--space-md);
            right: var(--space-md);
            font-size: 48px;
            color: var(--color-aurora);
            opacity: 0.15;
            font-family: Georgia, serif;
            line-height: 1;
        }

        .avaliacao-card-estrelas {
            display: flex;
            gap: 3px;
            color: #FFD93D;
            font-size: 14px;
        }

        .avaliacao-card-comentario {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.7;
            font-style: italic;
            margin: 0;
            flex: 1;
        }

        .avaliacao-card-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .avaliacao-card-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .avaliacao-card-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .avaliacao-card-nome {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .avaliacao-card-cargo {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* ========================================== */
        /* CONTACTO                                   */
        /* ========================================== */
        .contato {
            background: var(--bg-secondary);
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .contato-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-3xl);
            align-items: center;
        }

        .contato-content {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        .contato-title {
            font-family: var(--font-title);
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800;
            line-height: 1.2;
            color: var(--text-primary);
        }

        .contato-descricao {
            font-size: 1.05rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .contato-items {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .contato-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .contato-item:hover {
            border-color: var(--color-turquoise);
            background: var(--bg-card-hover, rgba(255, 255, 255, 0.05));
            transform: translateX(4px);
        }

        .contato-item-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            background: rgba(0, 210, 255, 0.12);
            color: var(--color-turquoise);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .contato-item-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .contato-item-label {
            font-size: 0.7rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .contato-item-value {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-primary);
            word-break: break-word;
        }

        .contato-redes {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .contato-rede {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 18px;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .contato-rede:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* ===== FORMULÁRIO DE CONTACTO ===== */
        .contato-form-wrapper {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-xl);
            padding: var(--space-2xl);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
        }

        .contato-form-title {
            font-family: var(--font-title);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0 0 var(--space-xs) 0;
        }

        .contato-form-subtitle {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin: 0 0 var(--space-xl) 0;
        }

        .contato-form {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
        }

        .form-label .required {
            color: var(--color-red);
            margin-left: 2px;
        }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 12px 16px;
            font-size: 0.95rem;
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-turquoise);
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 40px;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .btn-form {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            background: var(--gradient-aurora);
            color: #FFFFFF;
            box-shadow: 0 8px 24px rgba(108, 43, 217, 0.35);
        }

        .btn-form:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(108, 43, 217, 0.45);
        }

        /* ========================================== */
        /* FOOTER                                     */
        /* ========================================== */
        .footer {
            background: var(--bg-secondary);
            padding: var(--space-2xl) 0 var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-lg);
            flex-wrap: wrap;
            padding-bottom: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .footer-logo-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-md);
            background: var(--gradient-aurora);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-size: 20px;
        }

        .footer-logo-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .footer-logo-name {
            font-family: var(--font-display);
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .footer-logo-subtitle {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        .footer-links {
            display: flex;
            gap: var(--space-lg);
            flex-wrap: wrap;
        }

        .footer-links a {
            font-size: 0.9rem;
            color: var(--text-secondary);
            transition: var(--transition-smooth);
        }

        .footer-links a:hover {
            color: var(--color-turquoise);
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .footer-copyright {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .footer-copyright strong {
            color: var(--text-primary);
        }

        .footer-social {
            display: flex;
            gap: var(--space-sm);
        }

        .footer-social a {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 14px;
            transition: var(--transition-smooth);
        }

        .footer-social a:hover {
            color: var(--color-turquoise);
            border-color: var(--color-turquoise);
            background: rgba(0, 210, 255, 0.05);
            transform: translateY(-2px);
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes float-slow {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(30px, 30px); }
        }

        @keyframes spin-slow {
            to { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-fade-up {
            animation: fadeUp 0.8s ease forwards;
            opacity: 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 992px) {
            .navbar-menu {
                display: none;
            }

            .navbar-mobile-toggle {
                display: flex;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: var(--space-2xl);
            }

            .hero-image {
                order: -1;
            }

            .hero-avatar-wrapper {
                max-width: 320px;
            }

            .hero-avatar-initials {
                font-size: 90px;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: var(--space-2xl);
            }

            .contato-grid {
                grid-template-columns: 1fr;
                gap: var(--space-2xl);
            }
        }

        @media (max-width: 768px) {
            .section {
                padding: var(--space-3xl) 0;
            }

            .hero {
                padding: 80px 0 40px;
            }

            .hero-stats {
                gap: var(--space-lg);
            }

            .hero-stat-value {
                font-size: 1.6rem;
            }

            .hero-actions {
                flex-direction: column;
            }

            .btn-hero {
                width: 100%;
                justify-content: center;
            }

            .about-features {
                grid-template-columns: 1fr;
            }

            .servicos-grid {
                grid-template-columns: 1fr;
            }

            .projetos-grid {
                grid-template-columns: 1fr;
            }

            .avaliacoes-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                justify-content: center;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .hero-floating-card {
                display: none;
            }

            .contato-form-wrapper {
                padding: var(--space-lg);
            }
        }

        @media (max-width: 480px) {
            .container,
            .container-wide {
                padding: 0 var(--space-md);
            }

            .navbar-content {
                padding: var(--space-sm) var(--space-md);
            }

            .navbar-logo-text {
                display: none;
            }

            .hero-avatar-wrapper {
                max-width: 260px;
            }

            .hero-avatar-initials {
                font-size: 70px;
            }

            .section-title {
                font-size: 1.6rem;
            }

            .servico-card-body {
                padding: var(--space-md);
            }

            .servico-card-footer {
                padding: var(--space-md);
            }
        }
    </style>
</head>
<body>

    <!-- ========================================== -->
    <!-- NAVBAR                                     -->
    <!-- ========================================== -->
    <nav class="navbar" id="navbar">
        <div class="navbar-content">
            <a href="#" class="navbar-logo" onclick="scrollToTop(event)">
                <div class="navbar-logo-icon">
                    <i class="fas fa-compass-drafting"></i>
                </div>
                <div class="navbar-logo-text">
                    <span class="navbar-logo-name"><?php echo $profissional['nome']; ?></span>
                    <span class="navbar-logo-subtitle"><?php echo $profissional['profissao']; ?></span>
                </div>
            </a>

            <ul class="navbar-menu">
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#servicos">Serviços</a></li>
                <li><a href="#projetos">Projetos</a></li>
                <li><a href="#avaliacoes">Avaliações</a></li>
                <li><a href="precos.php">Preços</a></li>
                <li><a href="#contato">Contacto</a></li>
            </ul>

            <div class="navbar-actions">
                <button class="btn-theme-toggle" id="btnThemeToggle" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>
                <a href="#contato" class="btn-navbar btn-navbar-primary">
                    <i class="fas fa-paper-plane"></i>
                    <span>Solicitar Orçamento</span>
                </a>
                <button class="navbar-mobile-toggle" id="navbarMobileToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- ========================================== -->
    <!-- MENU MOBILE                                -->
    <!-- ========================================== -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="#sobre" onclick="fecharMenuMobile()"><i class="fas fa-user"></i> Sobre</a>
        <a href="#servicos" onclick="fecharMenuMobile()"><i class="fas fa-tools"></i> Serviços</a>
        <a href="#projetos" onclick="fecharMenuMobile()"><i class="fas fa-briefcase"></i> Projetos</a>
        <a href="#avaliacoes" onclick="fecharMenuMobile()"><i class="fas fa-star"></i> Avaliações</a>
        <a href="#contato" onclick="fecharMenuMobile()"><i class="fas fa-envelope"></i> Contacto</a>
            </div>

    <!-- ========================================== -->
    <!-- HERO SECTION                               -->
    <!-- ========================================== -->
    <section class="hero" id="hero">
        <div class="hero-bg"></div>
        <div class="container-wide">
            <div class="hero-content">
                <div class="hero-text animate-fade-up">
                    <div class="hero-badge">
                        <i class="fas fa-circle"></i>
                        Disponível para novos projetos
                    </div>

                    <h1 class="hero-title">
                        Olá, sou <span class="highlight"><?php echo explode(' ', $profissional['nome'])[0]; ?></span>
                    </h1>

                    <p class="hero-subtitle">
                        <?php echo $profissional['biografia']; ?>
                    </p>

                    <div class="hero-stats">
                        <div class="hero-stat">
                            <span class="hero-stat-value"><?php echo $profissional['anos_experiencia']; ?>+</span>
                            <span class="hero-stat-label">Anos de Experiência</span>
                        </div>
                        <div class="hero-stat">
                            <span class="hero-stat-value"><?php echo $profissional['projetos_concluidos']; ?>+</span>
                            <span class="hero-stat-label">Projetos Concluídos</span>
                        </div>
                        <div class="hero-stat">
                            <span class="hero-stat-value"><?php echo $profissional['clientes_satisfeitos']; ?>+</span>
                            <span class="hero-stat-label">Clientes Satisfeitos</span>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <a href="#servicos" class="btn-hero btn-hero-primary">
                            <i class="fas fa-eye"></i>
                            Ver Meus Serviços
                        </a>
                        <a href="#contato" class="btn-hero btn-hero-outline">
                            <i class="fas fa-comments"></i>
                            Falar Comigo
                        </a>
                    </div>
                </div>

                <div class="hero-image animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="hero-avatar-wrapper">
                        <div class="hero-avatar-ring"></div>
                        <div class="hero-avatar">
                            <div class="hero-avatar-initials">
                                <?php 
                                $nomes = explode(' ', $profissional['nome']);
                                $iniciais = '';
                                foreach ($nomes as $n) {
                                    if (!empty($n)) $iniciais .= strtoupper(substr($n, 0, 1));
                                }
                                echo substr($iniciais, 0, 2);
                                ?>
                            </div>
                        </div>

                        <!-- Card flutuante 1 -->
                        <div class="hero-floating-card hero-floating-card-1">
                            <div class="floating-card-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="floating-card-info">
                                <span class="floating-card-value"><?php echo $profissional['avaliacao']; ?></span>
                                <span class="floating-card-label"><?php echo $profissional['total_avaliacoes']; ?> Avaliações</span>
                            </div>
                        </div>

                        <!-- Card flutuante 2 -->
                        <div class="hero-floating-card hero-floating-card-2">
                            <div class="floating-card-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="floating-card-info">
                                <span class="floating-card-value">100%</span>
                                <span class="floating-card-label">Satisfação</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- SOBRE                                      -->
    <!-- ========================================== -->
    <section class="section" id="sobre">
        <div class="container">
            <div class="section-header">
                <div class="section-label">
                    <i class="fas fa-user"></i>
                    Sobre Mim
                </div>
                <h2 class="section-title">Conheça um pouco sobre a minha história</h2>
                <p class="section-subtitle">Profissional dedicado e apaixonado por geotecnologia, sempre em busca de soluções inovadoras.</p>
            </div>

            <div class="about-grid">
                <div class="about-content">
                    <p class="about-bio">
                        <?php echo $profissional['biografia']; ?>
                    </p>

                    <div class="about-features">
                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="about-feature-info">
                                <span class="about-feature-title">Certificado</span>
                                <span class="about-feature-desc"><?php echo $profissional['nivel']; ?></span>
                            </div>
                        </div>

                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="about-feature-info">
                                <span class="about-feature-title">Localização</span>
                                <span class="about-feature-desc"><?php echo $profissional['localizacao']; ?></span>
                            </div>
                        </div>

                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="about-feature-info">
                                <span class="about-feature-title">Resposta Rápida</span>
                                <span class="about-feature-desc">Em menos de 24 horas</span>
                            </div>
                        </div>

                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="about-feature-info">
                                <span class="about-feature-title">Garantia</span>
                                <span class="about-feature-desc">Serviço de qualidade</span>
                            </div>
                        </div>
                    </div>

                    <div class="about-skills">
                        <h3 class="about-skills-title">
                            <i class="fas fa-check-circle"></i>
                            Especialidades
                        </h3>
                        <div class="about-skills-tags">
                            <?php foreach ($profissional['especialidades'] as $especialidade): ?>
                                <span class="skill-tag">
                                    <i class="fas fa-check"></i>
                                    <?php echo $especialidade; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="about-image animate-fade-up" style="animation-delay: 0.2s;">
                    <div style="position: relative; padding: var(--space-xl);">
                        <!-- Decoração -->
                        <div style="position: absolute; top: 0; left: 0; width: 100px; height: 100px; background: radial-gradient(circle, rgba(108,43,217,0.3) 0%, transparent 70%); border-radius: 50%;"></div>
                        <div style="position: absolute; bottom: 0; right: 0; width: 150px; height: 150px; background: radial-gradient(circle, rgba(0,210,255,0.2) 0%, transparent 70%); border-radius: 50%;"></div>

                        <div style="position: relative; background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-xl); padding: var(--space-2xl); box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);">
                            <div style="display: flex; align-items: center; gap: var(--space-md); margin-bottom: var(--space-xl);">
                                <div style="width: 64px; height: 64px; border-radius: 50%; background: var(--gradient-aurora); display: flex; align-items: center; justify-content: center; color: #FFFFFF; font-size: 24px; font-family: var(--font-display); font-weight: 900; box-shadow: 0 8px 20px rgba(108,43,217,0.4);">
                                    <?php echo substr($iniciais, 0, 2); ?>
                                </div>
                                <div>
                                    <div style="font-family: var(--font-title); font-size: 1.2rem; font-weight: 700; color: var(--text-primary);"><?php echo $profissional['nome']; ?></div>
                                    <div style="font-size: 0.85rem; color: var(--color-turquoise); font-weight: 600;"><?php echo $profissional['profissao']; ?></div>
                                </div>
                            </div>

                            <div style="display: flex; flex-direction: column; gap: var(--space-md);">
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: var(--space-sm) 0; border-bottom: 1px solid var(--border-color);">
                                    <span style="font-size: 0.9rem; color: var(--text-muted);">Experiência</span>
                                    <span style="font-size: 0.9rem; font-weight: 700; color: var(--text-primary);"><?php echo $profissional['anos_experiencia']; ?>+ anos</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: var(--space-sm) 0; border-bottom: 1px solid var(--border-color);">
                                    <span style="font-size: 0.9rem; color: var(--text-muted);">Projetos</span>
                                    <span style="font-size: 0.9rem; font-weight: 700; color: var(--text-primary);"><?php echo $profissional['projetos_concluidos']; ?>+</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: var(--space-sm) 0; border-bottom: 1px solid var(--border-color);">
                                    <span style="font-size: 0.9rem; color: var(--text-muted);">Avaliação</span>
                                    <span style="font-size: 0.9rem; font-weight: 700; color: #FFD93D; display: flex; align-items: center; gap: 4px;">
                                        <i class="fas fa-star" style="font-size: 12px;"></i>
                                        <?php echo $profissional['avaliacao']; ?> / 5.0
                                    </span>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: var(--space-sm) 0;">
                                    <span style="font-size: 0.9rem; color: var(--text-muted);">Plano</span>
                                    <span style="font-size: 0.9rem; font-weight: 700; color: var(--color-future-green);">
                                        <i class="fas fa-crown" style="font-size: 12px;"></i>
                                        <?php echo $profissional['plano']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- SERVIÇOS                                   -->
    <!-- ========================================== -->
    <section class="section" id="servicos" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <div class="section-label">
                    <i class="fas fa-tools"></i>
                    Meus Serviços
                </div>
                <h2 class="section-title">Serviços profissionais que ofereço</h2>
                <p class="section-subtitle">Soluções completas e personalizadas para cada tipo de projeto, sempre com qualidade e precisão.</p>
            </div>

            <div class="servicos-grid">
                <?php foreach ($servicos as $servico): ?>
                    <div class="servico-card" style="--cat-color: <?php echo $servico['categoria_color']; ?>;">
                        <div class="servico-card-imagem">
                            <i class="fas <?php echo $servico['imagem_icon']; ?> servico-card-imagem-icon"></i>
                            <div class="servico-card-badges">
                                <?php if ($servico['destaque']): ?>
                                    <span class="servico-badge servico-badge-destaque">
                                        <i class="fas fa-star"></i> Destaque
                                    </span>
                                <?php endif; ?>
                                <?php if ($servico['popular']): ?>
                                    <span class="servico-badge servico-badge-popular">
                                        <i class="fas fa-fire"></i> Popular
                                    </span>
                                <?php endif; ?>
                                <?php if ($servico['urgente']): ?>
                                    <span class="servico-badge servico-badge-urgente">
                                        <i class="fas fa-bolt"></i> Urgente
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="servico-card-body">
                            <span class="servico-card-categoria">
                                <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                <?php echo $servico['categoria']; ?>
                            </span>

                            <h3 class="servico-card-titulo"><?php echo $servico['nome']; ?></h3>
                            <p class="servico-card-descricao"><?php echo $servico['descricao']; ?></p>

                            <div class="servico-card-avaliacao">
                                <div class="servico-avaliacao-estrelas">
                                    <?php echo renderEstrelas($servico['avaliacao']); ?>
                                </div>
                                <span class="servico-avaliacao-valor"><?php echo $servico['avaliacao']; ?></span>
                                <span class="servico-avaliacao-total">(<?php echo $servico['total_avaliacoes']; ?> avaliações)</span>
                            </div>
                        </div>

                        <div class="servico-card-footer">
                            <div class="servico-card-preco">
                                <span class="servico-card-preco-valor">Kz <?php echo formatMoney($servico['preco_base']); ?></span>
                                <span class="servico-card-preco-unidade"><?php echo $servico['unidade']; ?></span>
                            </div>
                            <a href="#contato" class="btn-servico" onclick="selecionarServico('<?php echo addslashes($servico['nome']); ?>')">
                                <i class="fas fa-paper-plane"></i>
                                Solicitar
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- PROJETOS REALIZADOS                        -->
    <!-- ========================================== -->
    <section class="section" id="projetos">
        <div class="container">
            <div class="section-header">
                <div class="section-label">
                    <i class="fas fa-briefcase"></i>
                    Portfólio
                </div>
                <h2 class="section-title">Projetos que realizei recentemente</h2>
                <p class="section-subtitle">Uma seleção dos trabalhos mais relevantes do meu portfólio profissional.</p>
            </div>

            <div class="projetos-grid">
                <?php foreach ($projetos_realizados as $projeto): ?>
                    <div class="projeto-card" style="--cat-color: <?php echo $projeto['categoria_color']; ?>;">
                        <div class="projeto-card-header">
                            <div class="projeto-card-icon">
                                <i class="fas <?php echo $projeto['categoria_icon']; ?>"></i>
                            </div>
                            <span class="projeto-card-categoria"><?php echo $projeto['categoria']; ?></span>
                            <span class="projeto-card-ano"><?php echo $projeto['ano']; ?></span>
                        </div>
                        <h3 class="projeto-card-titulo"><?php echo $projeto['titulo']; ?></h3>
                        <span class="projeto-card-cliente">
                            <i class="fas fa-user-tie"></i>
                            <?php echo $projeto['cliente']; ?>
                        </span>
                        <p class="projeto-card-descricao"><?php echo $projeto['descricao']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- AVALIAÇÕES                                 -->
    <!-- ========================================== -->
    <section class="section" id="avaliacoes" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <div class="section-label">
                    <i class="fas fa-star"></i>
                    Avaliações
                </div>
                <h2 class="section-title">O que os meus clientes dizem</h2>
                <p class="section-subtitle">A satisfação dos meus clientes é a minha maior recompensa e motivação.</p>
            </div>

            <div class="avaliacoes-grid">
                <?php foreach ($avaliacoes as $avaliacao): ?>
                    <div class="avaliacao-card">
                        <div class="avaliacao-card-quote">"</div>
                        <div class="avaliacao-card-estrelas">
                            <?php echo renderEstrelas($avaliacao['nota']); ?>
                        </div>
                        <p class="avaliacao-card-comentario"><?php echo $avaliacao['comentario']; ?></p>
                        <div class="avaliacao-card-cliente">
                            <div class="avaliacao-card-avatar" style="background: <?php echo $avaliacao['cor']; ?>;">
                                <?php echo $avaliacao['avatar_iniciais']; ?>
                            </div>
                            <div class="avaliacao-card-info">
                                <span class="avaliacao-card-nome"><?php echo $avaliacao['cliente']; ?></span>
                                <span class="avaliacao-card-cargo"><?php echo $avaliacao['cargo']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- CONTACTO                                   -->
    <!-- ========================================== -->
    <section class="section contato" id="contato">
        <div class="container">
            <div class="contato-grid">
                <div class="contato-content">
                    <div class="section-label" style="width: fit-content;">
                        <i class="fas fa-envelope"></i>
                        Contacto
                    </div>
                    <h2 class="contato-title">Vamos trabalhar juntos?</h2>
                    <p class="contato-descricao">
                        Estou disponível para novos projetos e parcerias. Entre em contacto comigo para discutirmos a sua ideia e receber um orçamento personalizado.
                    </p>

                    <div class="contato-items">
                        <a href="mailto:<?php echo $profissional['email']; ?>" class="contato-item">
                            <div class="contato-item-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contato-item-info">
                                <span class="contato-item-label">Email</span>
                                <span class="contato-item-value"><?php echo $profissional['email']; ?></span>
                            </div>
                        </a>

                        <a href="tel:<?php echo str_replace(' ', '', $profissional['telefone']); ?>" class="contato-item">
                            <div class="contato-item-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contato-item-info">
                                <span class="contato-item-label">Telefone</span>
                                <span class="contato-item-value"><?php echo $profissional['telefone']; ?></span>
                            </div>
                        </a>

                        <div class="contato-item" style="cursor: default;">
                            <div class="contato-item-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contato-item-info">
                                <span class="contato-item-label">Localização</span>
                                <span class="contato-item-value"><?php echo $profissional['localizacao']; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="contato-redes">
                        <?php foreach ($profissional['redes_sociais'] as $rede): ?>
                            <a href="<?php echo $rede['url']; ?>" class="contato-rede" style="background: <?php echo $rede['cor']; ?>;" title="<?php echo ucfirst(str_replace('fa-', '', $rede['icon'])); ?>">
                                <i class="fab <?php echo $rede['icon']; ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="contato-form-wrapper animate-fade-up" style="animation-delay: 0.2s;">
                    <h3 class="contato-form-title">Envie-me uma mensagem</h3>
                    <p class="contato-form-subtitle">Respondo em menos de 24 horas</p>

                    <form class="contato-form" id="formContato" onsubmit="enviarMensagem(event)">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Nome <span class="required">*</span></label>
                                <input type="text" class="form-control" id="nome" placeholder="Seu nome completo" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email <span class="required">*</span></label>
                                <input type="email" class="form-control" id="email" placeholder="seu@email.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="telefone" placeholder="+244 923 456 789">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Serviço de Interesse</label>
                                <select class="form-control" id="servicoInteresse">
                                    <option value="">Selecione um serviço</option>
                                    <?php foreach ($servicos as $servico): ?>
                                        <option value="<?php echo $servico['nome']; ?>"><?php echo $servico['nome']; ?></option>
                                    <?php endforeach; ?>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Mensagem <span class="required">*</span></label>
                            <textarea class="form-control" id="mensagem" placeholder="Descreva o seu projeto ou dúvida..." required></textarea>
                        </div>

                        <button type="submit" class="btn-form">
                            <i class="fas fa-paper-plane"></i>
                            Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- FOOTER                                     -->
    <!-- ========================================== -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <div class="footer-logo-icon">
                        <i class="fas fa-compass-drafting"></i>
                    </div>
                    <div class="footer-logo-info">
                        <span class="footer-logo-name"><?php echo $profissional['nome']; ?></span>
                        <span class="footer-logo-subtitle"><?php echo $profissional['profissao']; ?></span>
                    </div>
                </div>

                <div class="footer-links">
                    <a href="#sobre">Sobre</a>
                    <a href="#servicos">Serviços</a>
                    <a href="#projetos">Projetos</a>
                    <a href="#avaliacoes">Avaliações</a>
                    <a href="#contato">Contacto</a>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="footer-copyright">
                    © <?php echo date('Y'); ?> <strong><?php echo $profissional['nome']; ?></strong> • Todos os direitos reservados
                </p>
                <div class="footer-social">
                    <?php foreach ($profissional['redes_sociais'] as $rede): ?>
                        <a href="<?php echo $rede['url']; ?>" title="<?php echo ucfirst(str_replace('fa-', '', $rede['icon'])); ?>">
                            <i class="fab <?php echo $rede['icon']; ?>"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // THEME TOGGLE
        // ============================================
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-portfolio-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const btnTheme = document.getElementById('btnThemeToggle');
            if (btnTheme) {
                btnTheme.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-portfolio-theme', newTheme);
                });
            }
        })();

        // ============================================
        // NAVBAR SCROLL EFFECT
        // ============================================
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // ============================================
        // MOBILE MENU
        // ============================================
        const mobileToggle = document.getElementById('navbarMobileToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('active');
                
                const icon = mobileToggle.querySelector('i');
                if (mobileMenu.classList.contains('active')) {
                    icon.className = 'fas fa-times';
                } else {
                    icon.className = 'fas fa-bars';
                }
            });

            document.addEventListener('click', function(e) {
                if (!mobileMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
                    mobileMenu.classList.remove('active');
                    const icon = mobileToggle.querySelector('i');
                    icon.className = 'fas fa-bars';
                }
            });
        }

        function fecharMenuMobile() {
            if (mobileMenu) {
                mobileMenu.classList.remove('active');
                const icon = mobileToggle.querySelector('i');
                icon.className = 'fas fa-bars';
            }
        }

        // ============================================
        // SCROLL TO TOP
        // ============================================
        function scrollToTop(event) {
            event.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // ============================================
        // SELEÇÃO DE SERVIÇO
        // ============================================
        function selecionarServico(nomeServico) {
            const select = document.getElementById('servicoInteresse');
            if (select) {
                for (let i = 0; i < select.options.length; i++) {
                    if (select.options[i].value === nomeServico) {
                        select.selectedIndex = i;
                        break;
                    }
                }
            }
        }

        // ============================================
        // FORMULÁRIO DE CONTACTO
        // ============================================
        function enviarMensagem(event) {
            event.preventDefault();

            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const mensagem = document.getElementById('mensagem').value.trim();

            if (!nome || !email || !mensagem) {
                alert('Por favor, preencha todos os campos obrigatórios.');
                return;
            }

            // Simulação de envio
            const btn = event.target.querySelector('button[type="submit"]');
            const textoOriginal = btn.innerHTML;
            
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> A enviar...';
            btn.disabled = true;

            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check"></i> Mensagem Enviada!';
                
                setTimeout(() => {
                    btn.innerHTML = textoOriginal;
                    btn.disabled = false;
                    document.getElementById('formContato').reset();
                    alert('Obrigado, ' + nome + '! A sua mensagem foi enviada com sucesso. Entrarei em contacto em breve.');
                }, 2000);
            }, 1500);
        }

        // ============================================
        // SCROLL SUAVE PARA ÂNCORAS
        // ============================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // ============================================
        // ANIMAÇÕES AO SCROLL
        // ============================================
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.servico-card, .projeto-card, .avaliacao-card, .about-feature').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>

</body>
</html>