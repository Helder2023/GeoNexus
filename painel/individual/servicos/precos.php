<?php
// painel/individual/servicos/precos.php - Tabela de Preços Pública
// LANDING PAGE - Visível para clientes externos
// SEM SIDEBAR / SEM BOTTOM NAV / SEM DASHBOARD

// ============================================
// DADOS DO PROFISSIONAL
// ============================================
$profissional = [
    'nome' => 'Carlos Mendes',
    'profissao' => 'Engenheiro Topógrafo',
    'nivel' => 'Profissional Certificado',
    'email' => 'carlos.mendes@email.com',
    'telefone' => '+244 923 456 789',
    'localizacao' => 'Luanda, Angola',
    'plano' => 'Pro',
    'avaliacao' => 4.9,
    'total_avaliacoes' => 42,
    'redes_sociais' => [
        ['icon' => 'fa-linkedin', 'url' => '#', 'cor' => '#0077B5'],
        ['icon' => 'fa-instagram', 'url' => '#', 'cor' => '#E4405F'],
        ['icon' => 'fa-facebook', 'url' => '#', 'cor' => '#1877F2'],
        ['icon' => 'fa-whatsapp', 'url' => '#', 'cor' => '#25D366'],
    ]
];

// ============================================
// CATEGORIAS DE PREÇOS
// ============================================
$categorias_precos = [
    [
        'id' => 'topografia',
        'nome' => 'Topografia',
        'icon' => 'fa-mountain',
        'color' => '#6C2BD9',
        'descricao' => 'Levantamentos topográficos, planialtimétricos e cadastrais',
        'servicos' => [
            ['nome' => 'Levantamento Topográfico Simples', 'preco' => 150000, 'unidade' => 'por hectare', 'prazo' => '7-10 dias', 'popular' => false],
            ['nome' => 'Levantamento Topográfico Completo', 'preco' => 350000, 'unidade' => 'por hectare', 'prazo' => '15-30 dias', 'popular' => true],
            ['nome' => 'Levantamento Planialtimétrico', 'preco' => 280000, 'unidade' => 'por hectare', 'prazo' => '10-20 dias', 'popular' => false],
            ['nome' => 'Levantamento para Loteamento', 'preco' => 420000, 'unidade' => 'por hectare', 'prazo' => '20-35 dias', 'popular' => false],
            ['nome' => 'Demarcação de Terreno', 'preco' => 85000, 'unidade' => 'por lote', 'prazo' => '3-5 dias', 'popular' => false],
            ['nome' => 'Nivelamento Geométrico', 'preco' => 120000, 'unidade' => 'por km', 'prazo' => '5-8 dias', 'popular' => false],
        ]
    ],
    [
        'id' => 'gis',
        'nome' => 'GIS & Geoprocessamento',
        'icon' => 'fa-globe',
        'color' => '#00FFA3',
        'descricao' => 'Sistemas de informação geográfica e análise espacial',
        'servicos' => [
            ['nome' => 'Mapeamento GIS Básico', 'preco' => 250000, 'unidade' => 'por projeto', 'prazo' => '15-20 dias', 'popular' => false],
            ['nome' => 'Mapeamento GIS Completo', 'preco' => 480000, 'unidade' => 'por projeto', 'prazo' => '20-40 dias', 'popular' => true],
            ['nome' => 'Análise Espacial Avançada', 'preco' => 380000, 'unidade' => 'por projeto', 'prazo' => '15-25 dias', 'popular' => false],
            ['nome' => 'Criação de Base de Dados Geográfica', 'preco' => 320000, 'unidade' => 'por projeto', 'prazo' => '20-30 dias', 'popular' => false],
            ['nome' => 'Web Map Interativo', 'preco' => 550000, 'unidade' => 'por projeto', 'prazo' => '30-45 dias', 'popular' => false],
        ]
    ],
    [
        'id' => 'cadastro',
        'nome' => 'Cadastro',
        'icon' => 'fa-home',
        'color' => '#FFD93D',
        'descricao' => 'Cadastro rural, urbano e georreferenciamento',
        'servicos' => [
            ['nome' => 'Cadastro Rural Simples', 'preco' => 195000, 'unidade' => 'por propriedade', 'prazo' => '7-15 dias', 'popular' => false],
            ['nome' => 'Cadastro Rural Completo', 'preco' => 280000, 'unidade' => 'por propriedade', 'prazo' => '10-20 dias', 'popular' => true],
            ['nome' => 'Georreferenciamento de Imóvel', 'preco' => 150000, 'unidade' => 'por imóvel', 'prazo' => '5-10 dias', 'popular' => false],
            ['nome' => 'Regularização Fundiária', 'preco' => 350000, 'unidade' => 'por área', 'prazo' => '20-30 dias', 'popular' => false],
            ['nome' => 'Certificação de Coordenadas', 'preco' => 95000, 'unidade' => 'por ponto', 'prazo' => '3-5 dias', 'popular' => false],
        ]
    ],
    [
        'id' => 'drones',
        'nome' => 'Drones & Aerolevantamento',
        'icon' => 'fa-drone',
        'color' => '#FF6B6B',
        'descricao' => 'Levantamento aéreo com drones e processamento de imagens',
        'servicos' => [
            ['nome' => 'Voo Fotogramétrico Básico', 'preco' => 180000, 'unidade' => 'por voo', 'prazo' => '3-5 dias', 'popular' => false],
            ['nome' => 'Levantamento com Drone Completo', 'preco' => 320000, 'unidade' => 'por voo', 'prazo' => '5-10 dias', 'popular' => true],
            ['nome' => 'Ortomosaico de Alta Resolução', 'preco' => 280000, 'unidade' => 'por área', 'prazo' => '5-10 dias', 'popular' => false],
            ['nome' => 'Modelo Digital de Elevação (MDE)', 'preco' => 250000, 'unidade' => 'por área', 'prazo' => '7-12 dias', 'popular' => false],
            ['nome' => 'Inspeção Técnica com Drone', 'preco' => 150000, 'unidade' => 'por inspeção', 'prazo' => '2-4 dias', 'popular' => false],
        ]
    ],
    [
        'id' => 'agricultura',
        'nome' => 'Agricultura de Precisão',
        'icon' => 'fa-tractor',
        'color' => '#6BCB77',
        'descricao' => 'Análise de solo, monitoramento agrícola e otimização de culturas',
        'servicos' => [
            ['nome' => 'Análise de Solo Básica', 'preco' => 120000, 'unidade' => 'por área', 'prazo' => '7-10 dias', 'popular' => false],
            ['nome' => 'Análise de Solo Completa', 'preco' => 220000, 'unidade' => 'por área', 'prazo' => '10-15 dias', 'popular' => true],
            ['nome' => 'Mapeamento de Produtividade', 'preco' => 280000, 'unidade' => 'por hectare', 'prazo' => '15-20 dias', 'popular' => false],
            ['nome' => 'Monitoramento com NDVI', 'preco' => 195000, 'unidade' => 'por área', 'prazo' => '10-15 dias', 'popular' => false],
            ['nome' => 'Recomendação de Fertilização', 'preco' => 85000, 'unidade' => 'por área', 'prazo' => '5-7 dias', 'popular' => false],
        ]
    ],
    [
        'id' => 'urbanismo',
        'nome' => 'Urbanismo & Engenharia',
        'icon' => 'fa-city',
        'color' => '#A29BFE',
        'descricao' => 'Planeamento urbano, modelação 3D e projetos de engenharia',
        'servicos' => [
            ['nome' => 'Consultoria Urbanística', 'preco' => 450000, 'unidade' => 'por projeto', 'prazo' => '30-60 dias', 'popular' => false],
            ['nome' => 'Modelação 3D de Terreno', 'preco' => 275000, 'unidade' => 'por modelo', 'prazo' => '15-25 dias', 'popular' => true],
            ['nome' => 'Estudo de Viabilidade', 'preco' => 380000, 'unidade' => 'por projeto', 'prazo' => '20-30 dias', 'popular' => false],
            ['nome' => 'Projeto de Infraestrutura', 'preco' => 520000, 'unidade' => 'por projeto', 'prazo' => '30-45 dias', 'popular' => false],
            ['nome' => 'Licenciamento Urbanístico', 'preco' => 320000, 'unidade' => 'por processo', 'prazo' => '25-40 dias', 'popular' => false],
        ]
    ],
];

// ============================================
// PLANOS DE ASSINATURA (PARA EMPRESAS)
// ============================================
$planos = [
    [
        'nome' => 'Startup',
        'descricao' => 'Ideal para pequenas empresas e projetos pontuais',
        'preco' => 750000,
        'periodo' => 'mensal',
        'icon' => 'fa-rocket',
        'color' => '#00D2FF',
        'popular' => false,
        'destaque' => false,
        'recursos' => [
            'Acesso a 100 projetos',
            '10 utilizadores',
            '100 GB de armazenamento',
            'Suporte por email',
            'API básica',
            'Relatórios mensais'
        ]
    ],
    [
        'nome' => 'Business',
        'descricao' => 'Perfeito para empresas em crescimento',
        'preco' => 1500000,
        'periodo' => 'mensal',
        'icon' => 'fa-briefcase',
        'color' => '#6C2BD9',
        'popular' => true,
        'destaque' => true,
        'recursos' => [
            'Acesso a 500 projetos',
            '25 utilizadores',
            '250 GB de armazenamento',
            'Suporte prioritário',
            'API completa',
            'Relatórios semanais',
            'Dashboards personalizados',
            'Treinamento incluído'
        ]
    ],
    [
        'nome' => 'Enterprise',
        'descricao' => 'Solução completa para grandes corporações',
        'preco' => 2500000,
        'periodo' => 'mensal',
        'icon' => 'fa-building',
        'color' => '#FF6B6B',
        'popular' => false,
        'destaque' => false,
        'recursos' => [
            'Acesso ilimitado a projetos',
            'Utilizadores ilimitados',
            '1 TB de armazenamento',
            'Suporte dedicado 24/7',
            'API completa + Webhooks',
            'Relatórios em tempo real',
            'Dashboards 100% personalizados',
            'Treinamento presencial',
            'SLA garantido',
            'Suporte in loco'
        ]
    ]
];

// ============================================
// TABELA DE DESCONTOS
// ============================================
$descontos = [
    ['tipo' => 'Cliente Novo', 'desconto' => '10%', 'icon' => 'fa-user-plus', 'cor' => '#00D2FF', 'condicao' => 'Primeira contratação'],
    ['tipo' => 'Contrato Anual', 'desconto' => '15%', 'icon' => 'fa-calendar-check', 'cor' => '#00FFA3', 'condicao' => 'Pagamento anual antecipado'],
    ['tipo' => 'Múltiplos Projetos', 'desconto' => '20%', 'icon' => 'fa-layer-group', 'cor' => '#6C2BD9', 'condicao' => 'A partir de 3 projetos'],
    ['tipo' => 'Cliente Fidelizado', 'desconto' => '25%', 'icon' => 'fa-crown', 'cor' => '#FFD93D', 'condicao' => 'Cliente há mais de 1 ano'],
];

// ============================================
// PERGUNTAS FREQUENTES
// ============================================
$faqs = [
    [
        'pergunta' => 'Como funciona a cobrança dos serviços?',
        'resposta' => 'A cobrança é feita com base na unidade indicada (por hectare, projeto, propriedade, etc.). O valor final pode variar conforme a complexidade e extensão do projeto.'
    ],
    [
        'pergunta' => 'Qual o prazo de entrega?',
        'resposta' => 'O prazo varia conforme o serviço contratado, geralmente entre 5 e 45 dias. Após análise do projeto, fornecemos um cronograma detalhado com marcos de entrega.'
    ],
    [
        'pergunta' => 'Como funciona o pagamento?',
        'resposta' => 'Trabalhamos com 50% adiantado e 50% na entrega para a maioria dos serviços. Para projetos maiores, podemos parcelar em até 3x sem juros.'
    ],
    [
        'pergunta' => 'Os preços incluem impostos?',
        'resposta' => 'Não. Os valores apresentados são base e a eles acresce IVA de 14% conforme legislação em vigor em Angola.'
    ],
    [
        'pergunta' => 'Fazem deslocação para outras províncias?',
        'resposta' => 'Sim, realizamos serviços em todo o território nacional. Os custos de deslocação e estadia são orçamentados separadamente.'
    ],
    [
        'pergunta' => 'Posso pedir um orçamento personalizado?',
        'resposta' => 'Sim! Cada projeto é único. Entre em contacto para receber um orçamento personalizado de acordo com as suas necessidades específicas.'
    ],
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

// Iniciais do profissional
$nomes = explode(' ', $profissional['nome']);
$iniciais = '';
foreach ($nomes as $n) {
    if (!empty($n)) $iniciais .= strtoupper(substr($n, 0, 1));
}
$iniciais = substr($iniciais, 0, 2);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tabela de Preços de <?php echo $profissional['nome']; ?> - <?php echo $profissional['profissao']; ?>. Preços de serviços de topografia, GIS, cadastro, drones e agricultura de precisão.">
    <title>Tabela de Preços | <?php echo $profissional['nome']; ?></title>

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
        }

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

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-aurora);
            border-radius: 4px;
        }

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
        /* NAVBAR                                     */
        /* ========================================== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
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
            font-size: 0.9rem;
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

        .btn-theme-toggle .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme-toggle .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme-toggle .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme-toggle .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

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
        }

        /* ===== MENU MOBILE ===== */
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

        .mobile-menu.active { display: flex; }

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
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-primary);
        }

        .mobile-menu a i {
            width: 20px;
            color: var(--color-turquoise);
        }

        /* ========================================== */
        /* HERO PRECOS                                */
        /* ========================================== */
        .hero-precos {
            padding: 140px 0 60px;
            background: var(--bg-primary);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .hero-precos::before {
            content: '';
            position: absolute;
            top: -50%;
            left: 50%;
            transform: translateX(-50%);
            width: 800px;
            height: 800px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 43, 217, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-precos-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-lg);
        }

        .hero-precos-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: rgba(0, 255, 163, 0.12);
            color: var(--color-future-green);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-precos-title {
            font-family: var(--font-title);
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 800;
            line-height: 1.1;
            color: var(--text-primary);
            letter-spacing: -1px;
        }

        .hero-precos-title .highlight {
            background: var(--gradient-aurora);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-precos-subtitle {
            font-size: 1.1rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .hero-precos-actions {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-hero-precos {
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

        .btn-hero-precos-primary {
            background: var(--gradient-aurora);
            color: #FFFFFF;
            box-shadow: 0 8px 24px rgba(108, 43, 217, 0.35);
        }

        .btn-hero-precos-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(108, 43, 217, 0.45);
        }

        .btn-hero-precos-outline {
            background: transparent;
            color: var(--text-primary);
            border: 2px solid var(--border-color);
        }

        .btn-hero-precos-outline:hover {
            border-color: var(--color-turquoise);
            color: var(--color-turquoise);
            background: rgba(0, 210, 255, 0.05);
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
        }

        /* ========================================== */
        /* FILTROS DE CATEGORIA                       */
        /* ========================================== */
        .filtros-precos {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            margin-bottom: var(--space-2xl);
            padding: 0 var(--space-md);
        }

        .filtro-preco-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 18px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .filtro-preco-btn:hover {
            border-color: var(--color-turquoise);
            color: var(--text-primary);
            transform: translateY(-2px);
        }

        .filtro-preco-btn.active {
            background: var(--gradient-aurora);
            color: #FFFFFF;
            border-color: transparent;
            box-shadow: 0 4px 16px rgba(108, 43, 217, 0.3);
        }

        /* ========================================== */
        /* TABELA DE PREÇOS POR CATEGORIA             */
        /* ========================================== */
        .categoria-preco {
            margin-bottom: var(--space-3xl);
        }

        .categoria-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
            padding: var(--space-lg);
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            position: relative;
            overflow: hidden;
        }

        .categoria-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--cat-color);
        }

        .categoria-header-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            background: var(--cat-color)20;
            color: var(--cat-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .categoria-header-info {
            flex: 1;
            min-width: 0;
        }

        .categoria-header-nome {
            font-family: var(--font-title);
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            margin: 0 0 2px 0;
            line-height: 1.2;
        }

        .categoria-header-descricao {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin: 0;
        }

        .categoria-header-count {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: var(--cat-color)15;
            color: var(--cat-color);
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            flex-shrink: 0;
        }

        /* ===== TABELA ===== */
        .tabela-wrapper {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        .tabela-precos {
            width: 100%;
            border-collapse: collapse;
        }

        .tabela-precos thead {
            background: var(--bg-input);
        }

        .tabela-precos thead th {
            padding: var(--space-md) var(--space-lg);
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .tabela-precos thead th.th-preco {
            text-align: right;
        }

        .tabela-precos tbody td {
            padding: var(--space-md) var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        .tabela-precos tbody tr:last-child td {
            border-bottom: none;
        }

        .tabela-precos tbody tr {
            transition: var(--transition-smooth);
        }

        .tabela-precos tbody tr:hover {
            background: rgba(108, 43, 217, 0.03);
        }

        .servico-nome {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .servico-nome-texto {
            font-weight: 600;
            color: var(--text-primary);
        }

        .servico-badge-popular {
            display: inline-flex;
            align-items: center;
            gap: 3px;
            padding: 2px 8px;
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            border-radius: var(--radius-full);
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .servico-prazo {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .servico-prazo i {
            color: var(--color-turquoise);
        }

        .servico-preco {
            text-align: right;
        }

        .servico-preco-valor {
            font-family: var(--font-display);
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--color-future-green);
            display: block;
            line-height: 1.2;
        }

        .servico-preco-unidade {
            font-size: 0.75rem;
            color: var(--text-muted);
            display: block;
        }

        .servico-acao {
            text-align: right;
        }

        .btn-servico-tabela {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: var(--gradient-aurora);
            color: #FFFFFF;
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-servico-tabela:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 43, 217, 0.35);
        }

        /* ========================================== */
        /* PLANOS DE ASSINATURA                       */
        /* ========================================== */
        .planos-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-lg);
            align-items: stretch;
        }

        .plano-card {
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-xl);
            padding: var(--space-2xl);
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .plano-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--plano-color);
        }

        .plano-card:hover {
            border-color: var(--plano-color);
            transform: translateY(-6px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        .plano-card.popular {
            border-color: var(--plano-color);
            box-shadow: 0 0 0 4px var(--plano-color)15, 0 20px 50px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }

        .plano-card.popular:hover {
            transform: scale(1.02) translateY(-6px);
        }

        .plano-badge-popular {
            position: absolute;
            top: var(--space-md);
            right: var(--space-md);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.4);
        }

        .plano-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            background: var(--plano-color)15;
            color: var(--plano-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .plano-nome {
            font-family: var(--font-title);
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.2;
        }

        .plano-descricao {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
        }

        .plano-preco {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md) 0;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .plano-preco-valor {
            font-family: var(--font-display);
            font-size: 2rem;
            font-weight: 700;
            color: var(--plano-color);
            line-height: 1;
        }

        .plano-preco-periodo {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .plano-recursos {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            flex: 1;
        }

        .plano-recurso {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .plano-recurso i {
            color: var(--plano-color);
            font-size: 14px;
            margin-top: 3px;
            flex-shrink: 0;
        }

        .btn-plano {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 24px;
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            text-decoration: none;
            background: var(--plano-color);
            color: #FFFFFF;
            box-shadow: 0 4px 16px var(--plano-color)40;
        }

        .btn-plano:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px var(--plano-color)50;
        }

        /* ========================================== */
        /* DESCONTOS                                  */
        /* ========================================== */
        .descontos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: var(--space-md);
        }

        .desconto-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            display: flex;
            align-items: center;
            gap: var(--space-md);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .desconto-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--desc-color);
        }

        .desconto-card:hover {
            border-color: var(--desc-color);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .desconto-icon {
            width: 52px;
            height: 52px;
            border-radius: var(--radius-md);
            background: var(--desc-color)15;
            color: var(--desc-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .desconto-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .desconto-tipo {
            font-family: var(--font-title);
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .desconto-condicao {
            font-size: 0.75rem;
            color: var(--text-muted);
            line-height: 1.3;
        }

        .desconto-valor {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--desc-color);
            line-height: 1;
            flex-shrink: 0;
        }

        /* ========================================== */
        /* FAQ                                        */
        /* ========================================== */
        .faq-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .faq-item {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            transition: var(--transition-smooth);
            cursor: pointer;
        }

        .faq-item:hover {
            border-color: var(--color-turquoise);
            background: rgba(0, 210, 255, 0.02);
        }

        .faq-pergunta {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            margin-bottom: var(--space-sm);
        }

        .faq-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(0, 210, 255, 0.12);
            color: var(--color-turquoise);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .faq-pergunta-texto {
            font-family: var(--font-title);
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.4;
            margin: 0;
        }

        .faq-resposta {
            font-size: 0.9rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
            padding-left: 44px;
        }

        /* ========================================== */
        /* CTA FINAL                                  */
        /* ========================================== */
        .cta-final {
            background: linear-gradient(135deg, rgba(108, 43, 217, 0.12) 0%, rgba(0, 210, 255, 0.08) 100%);
            border: 2px solid rgba(108, 43, 217, 0.2);
            border-radius: var(--radius-xl);
            padding: var(--space-3xl);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-final::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(108, 43, 217, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .cta-final-content {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-lg);
            max-width: 700px;
            margin: 0 auto;
        }

        .cta-final-title {
            font-family: var(--font-title);
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800;
            line-height: 1.2;
            color: var(--text-primary);
        }

        .cta-final-descricao {
            font-size: 1.05rem;
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .cta-final-actions {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            border-radius: var(--radius-md);
            font-family: var(--font-body);
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            text-decoration: none;
        }

        .btn-cta-primary {
            background: var(--gradient-aurora);
            color: #FFFFFF;
            box-shadow: 0 8px 24px rgba(108, 43, 217, 0.35);
        }

        .btn-cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(108, 43, 217, 0.45);
        }

        .btn-cta-outline {
            background: transparent;
            color: var(--text-primary);
            border: 2px solid var(--border-color);
        }

        .btn-cta-outline:hover {
            border-color: var(--color-turquoise);
            color: var(--color-turquoise);
            background: rgba(0, 210, 255, 0.05);
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
            transform: translateY(-2px);
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-up {
            animation: fadeUp 0.8s ease forwards;
            opacity: 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 992px) {
            .navbar-menu { display: none; }
            .navbar-mobile-toggle { display: flex; }
            .planos-grid { grid-template-columns: 1fr; max-width: 500px; margin: 0 auto; }
            .plano-card.popular { transform: none; }
            .plano-card.popular:hover { transform: translateY(-6px); }
            .faq-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .section { padding: var(--space-3xl) 0; }
            .hero-precos { padding: 110px 0 40px; }
            .hero-precos-actions { flex-direction: column; width: 100%; }
            .btn-hero-precos { width: 100%; justify-content: center; }

            .tabela-wrapper { overflow-x: auto; }
            .tabela-precos { min-width: 700px; }

            .categoria-header {
                flex-direction: column;
                text-align: center;
                gap: var(--space-md);
            }

            .categoria-header-count { align-self: center; }

            .cta-final { padding: var(--space-2xl) var(--space-lg); }
            .cta-final-actions { flex-direction: column; width: 100%; }
            .btn-cta { width: 100%; justify-content: center; }

            .footer-content { flex-direction: column; text-align: center; }
            .footer-links { justify-content: center; }
            .footer-bottom { flex-direction: column; text-align: center; }
        }

        @media (max-width: 480px) {
            .container, .container-wide { padding: 0 var(--space-md); }
            .navbar-content { padding: var(--space-sm) var(--space-md); }
            .navbar-logo-text { display: none; }

            .hero-precos-title { font-size: 1.8rem; }

            .categoria-header-nome { font-size: 1.2rem; }
            .categoria-header-icon { width: 48px; height: 48px; font-size: 20px; }

            .plano-card { padding: var(--space-lg); }

            .faq-resposta { padding-left: 0; margin-top: var(--space-sm); }

            .cta-final { padding: var(--space-xl) var(--space-md); }
        }
    </style>
</head>
<body>

    <!-- ========================================== -->
    <!-- NAVBAR                                     -->
    <!-- ========================================== -->
    <nav class="navbar" id="navbar">
        <div class="navbar-content">
            <a href="portfolio.php" class="navbar-logo">
                <div class="navbar-logo-icon">
                    <i class="fas fa-compass-drafting"></i>
                </div>
                <div class="navbar-logo-text">
                    <span class="navbar-logo-name"><?php echo $profissional['nome']; ?></span>
                    <span class="navbar-logo-subtitle"><?php echo $profissional['profissao']; ?></span>
                </div>
            </a>

            <ul class="navbar-menu">
                 <li><a href="portfolio.php#sobre">Sobre</a></li>
                <li><a href="portfolio.php#servicos">Serviços</a></li>
                <li><a href="portfolio.php#projetos">Projetos</a></li>
                <li><a href="portfolio.php#avaliacoes">Avaliações</a></li>
                <li><a href="precos.php">Preços</a></li>
                <li><a href="portfolio.php#contato">Contacto</a></li>
            </ul>

            <div class="navbar-actions">
                <button class="btn-theme-toggle" id="btnThemeToggle" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>
                <a href="portfolio.php#contato" class="btn-navbar btn-navbar-primary">
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
        <a href="portfolio.php#sobre" onclick="fecharMenuMobile()"><i class="fas fa-user"></i> Sobre</a>
        <a href="portfolio.php#servicos" onclick="fecharMenuMobile()"><i class="fas fa-tools"></i> Serviços</a>
        <a href="portfolio.php#projetos" onclick="fecharMenuMobile()"><i class="fas fa-briefcase"></i> Projetos</a>
        <a href="precos.php" onclick="fecharMenuMobile()"><i class="fas fa-tags"></i> Preços</a>
        <a href="portfolio.php#contato" onclick="fecharMenuMobile()"><i class="fas fa-envelope"></i> Contacto</a>
    </div>

    <!-- ========================================== -->
    <!-- HERO PRECOS                                -->
    <!-- ========================================== -->
    <section class="hero-precos">
        <div class="container">
            <div class="hero-precos-content animate-fade-up">
                <div class="hero-precos-badge">
                    <i class="fas fa-circle"></i>
                    Transparência Total
                </div>

                <h1 class="hero-precos-title">
                    Tabela de <span class="highlight">Preços</span>
                </h1>

                <p class="hero-precos-subtitle">
                    Preços claros e competitivos para todos os meus serviços. Sem surpresas, sem custos escondidos. Cada projeto é único e o orçamento final pode ser ajustado às suas necessidades.
                </p>

                <div class="hero-precos-actions">
                    <a href="#tabela-precos" class="btn-hero-precos btn-hero-precos-primary">
                        <i class="fas fa-list"></i>
                        Ver Preços
                    </a>
                    <a href="portfolio.php#contato" class="btn-hero-precos btn-hero-precos-outline">
                        <i class="fas fa-comments"></i>
                        Pedir Orçamento
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- TABELA DE PREÇOS                           -->
    <!-- ========================================== -->
    <section class="section" id="tabela-precos">
        <div class="container">
            <div class="section-header">
                <div class="section-label">
                    <i class="fas fa-tags"></i>
                    Preços Detalhados
                </div>
                <h2 class="section-title">Preços por categoria de serviço</h2>
                <p class="section-subtitle">Os valores apresentados são base e podem variar conforme a complexidade e extensão do projeto.</p>
            </div>

            <?php foreach ($categorias_precos as $categoria): ?>
                <div class="categoria-preco" id="cat-<?php echo $categoria['id']; ?>">
                    <div class="categoria-header" style="--cat-color: <?php echo $categoria['color']; ?>;">
                        <div class="categoria-header-icon">
                            <i class="fas <?php echo $categoria['icon']; ?>"></i>
                        </div>
                        <div class="categoria-header-info">
                            <h3 class="categoria-header-nome"><?php echo $categoria['nome']; ?></h3>
                            <p class="categoria-header-descricao"><?php echo $categoria['descricao']; ?></p>
                        </div>
                        <span class="categoria-header-count">
                            <i class="fas fa-list"></i>
                            <?php echo count($categoria['servicos']); ?> serviços
                        </span>
                    </div>

                    <div class="tabela-wrapper">
                        <table class="tabela-precos">
                            <thead>
                                <tr>
                                    <th>Serviço</th>
                                    <th>Prazo</th>
                                    <th class="th-preco">Preço</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categoria['servicos'] as $servico): ?>
                                    <tr>
                                        <td>
                                            <div class="servico-nome">
                                                <span class="servico-nome-texto"><?php echo $servico['nome']; ?></span>
                                                <?php if ($servico['popular']): ?>
                                                    <span class="servico-badge-popular">
                                                        <i class="fas fa-fire"></i> Popular
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="servico-prazo">
                                                <i class="fas fa-clock"></i>
                                                <?php echo $servico['prazo']; ?>
                                            </span>
                                        </td>
                                        <td class="servico-preco">
                                            <span class="servico-preco-valor">Kz <?php echo formatMoney($servico['preco']); ?></span>
                                            <span class="servico-preco-unidade"><?php echo $servico['unidade']; ?></span>
                                        </td>
                                        <td class="servico-acao">
                                            <a href="portfolio.php#contato" class="btn-servico-tabela">
                                                <i class="fas fa-paper-plane"></i>
                                                Solicitar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- PLANOS DE ASSINATURA                       -->
    <!-- ========================================== -->
    <section class="section" id="planos" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <div class="section-label">
                    <i class="fas fa-crown"></i>
                    Para Empresas
                </div>
                <h2 class="section-title">Planos de assinatura mensal</h2>
                <p class="section-subtitle">Soluções completas para empresas que necessitam de serviços regulares de geotecnologia.</p>
            </div>

            <div class="planos-grid">
                <?php foreach ($planos as $plano): ?>
                    <div class="plano-card <?php echo $plano['popular'] ? 'popular' : ''; ?>" style="--plano-color: <?php echo $plano['color']; ?>;">
                        <?php if ($plano['popular']): ?>
                            <span class="plano-badge-popular">
                                <i class="fas fa-star"></i> Mais Popular
                            </span>
                        <?php endif; ?>

                        <div class="plano-icon">
                            <i class="fas <?php echo $plano['icon']; ?>"></i>
                        </div>

                        <div>
                            <h3 class="plano-nome"><?php echo $plano['nome']; ?></h3>
                            <p class="plano-descricao"><?php echo $plano['descricao']; ?></p>
                        </div>

                        <div class="plano-preco">
                            <span class="plano-preco-valor">Kz <?php echo formatMoney($plano['preco']); ?></span>
                            <span class="plano-preco-periodo">/ <?php echo $plano['periodo']; ?></span>
                        </div>

                        <div class="plano-recursos">
                            <?php foreach ($plano['recursos'] as $recurso): ?>
                                <div class="plano-recurso">
                                    <i class="fas fa-check-circle"></i>
                                    <span><?php echo $recurso; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a href="portfolio.php#contato" class="btn-plano">
                            <i class="fas fa-rocket"></i>
                            Contratar <?php echo $plano['nome']; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- DESCONTOS                                  -->
    <!-- ========================================== -->
    <section class="section" id="descontos">
        <div class="container">
            <div class="section-header">
                <div class="section-label">
                    <i class="fas fa-percent"></i>
                    Descontos
                </div>
                <h2 class="section-title">Descontos especiais disponíveis</h2>
                <p class="section-subtitle">Beneficie de condições especiais e poupe nos seus projetos.</p>
            </div>

            <div class="descontos-grid">
                <?php foreach ($descontos as $desconto): ?>
                    <div class="desconto-card" style="--desc-color: <?php echo $desconto['cor']; ?>;">
                        <div class="desconto-icon">
                            <i class="fas <?php echo $desconto['icon']; ?>"></i>
                        </div>
                        <div class="desconto-info">
                            <span class="desconto-tipo"><?php echo $desconto['tipo']; ?></span>
                            <span class="desconto-condicao"><?php echo $desconto['condicao']; ?></span>
                        </div>
                        <span class="desconto-valor"><?php echo $desconto['desconto']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- FAQ                                        -->
    <!-- ========================================== -->
    <section class="section" id="faq" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <div class="section-label">
                    <i class="fas fa-question-circle"></i>
                    Perguntas Frequentes
                </div>
                <h2 class="section-title">Dúvidas sobre os preços?</h2>
                <p class="section-subtitle">Respostas às perguntas mais comuns sobre a minha tabela de preços.</p>
            </div>

            <div class="faq-grid">
                <?php foreach ($faqs as $faq): ?>
                    <div class="faq-item">
                        <div class="faq-pergunta">
                            <div class="faq-icon">
                                <i class="fas fa-question"></i>
                            </div>
                            <h3 class="faq-pergunta-texto"><?php echo $faq['pergunta']; ?></h3>
                        </div>
                        <p class="faq-resposta"><?php echo $faq['resposta']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- CTA FINAL                                  -->
    <!-- ========================================== -->
    <section class="section">
        <div class="container">
            <div class="cta-final animate-fade-up">
                <div class="cta-final-content">
                    <div class="section-label" style="background: rgba(0, 255, 163, 0.12); color: var(--color-future-green); border: 1px solid rgba(0, 255, 163, 0.2);">
                        <i class="fas fa-handshake"></i>
                        Vamos Começar
                    </div>

                    <h2 class="cta-final-title">
                        Pronto para iniciar o seu projeto?
                    </h2>

                    <p class="cta-final-descricao">
                        Entre em contacto comigo para receber um orçamento personalizado. Analiso cada projeto individualmente para oferecer a melhor solução ao melhor preço.
                    </p>

                    <div class="cta-final-actions">
                        <a href="portfolio.php#contato" class="btn-cta btn-cta-primary">
                            <i class="fas fa-paper-plane"></i>
                            Solicitar Orçamento
                        </a>
                        <a href="mailto:<?php echo $profissional['email']; ?>" class="btn-cta btn-cta-outline">
                            <i class="fas fa-envelope"></i>
                            Enviar Email
                        </a>
                    </div>
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
                    <a href="portfolio.php#sobre">Sobre</a>
                    <a href="portfolio.php#servicos">Serviços</a>
                    <a href="portfolio.php#projetos">Projetos</a>
                    <a href="precos.php">Preços</a>
                    <a href="portfolio.php#contato">Contacto</a>
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
        // NAVBAR SCROLL
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
                    mobileToggle.querySelector('i').className = 'fas fa-bars';
                }
            });
        }

        function fecharMenuMobile() {
            if (mobileMenu) {
                mobileMenu.classList.remove('active');
                mobileToggle.querySelector('i').className = 'fas fa-bars';
            }
        }

        // ============================================
        // SCROLL SUAVE PARA ÂNCORAS
        // ============================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#' || targetId === '') return;
                
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

        document.querySelectorAll('.categoria-preco, .plano-card, .desconto-card, .faq-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>

</body>
</html>