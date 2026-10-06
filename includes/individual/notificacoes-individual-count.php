<?php
// includes/individual-head.php
// Head para todas as páginas da sessão Individual

// Garantir que os contadores estejam disponíveis
if (!isset($notificacoes_count)) {
    include_once __DIR__ . "/notificacoes-individual-count.php";
}

// Definir título padrão se não existir
if (!isset($titulo_pagina)) {
    $titulo_pagina = 'Painel Individual';
}

// Definir página atual se não existir
if (!isset($pagina_atual)) {
    $pagina_atual = 'dashboard';
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GeoNexus - Painel do Profissional">
    <title>GeoNexus | <?php echo $titulo_pagina; ?></title>

    <!-- ===== FAVICON ===== -->
    <link rel="icon" type="image/png" href="../../assets/images/favicon.png">

    <!-- ===== FONTES ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ===== FONT AWESOME ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ===== CSS PRINCIPAL ===== -->
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/individual.css">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/responsive.css">

    <!-- ===== CHART.JS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <!-- ===== THEME INICIAL (evitar flash) ===== -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>

    <!-- ===== CSS ESPECÍFICO POR PÁGINA ===== -->
    <?php if (isset($css_extra) && is_array($css_extra)): ?>
        <?php foreach ($css_extra as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>