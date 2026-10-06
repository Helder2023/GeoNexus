<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoNexus | <?php echo $titulo_pagina; ?></title>
    
    <!-- ===== FONTES ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- ===== FONT AWESOME ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- ===== CSS PRINCIPAL ===== -->
    <link rel="stylesheet" href="../../../assets/css/base.css">
    <link rel="stylesheet" href="../../../assets/css/admin.css">
    <link rel="stylesheet" href="../../../assets/css/components.css">
    <link rel="stylesheet" href="../../../assets/css/responsive.css">
    
    <!-- ===== FAVICON ===== -->
    <link rel="icon" type="image/png" href="../../../assets/images/favicon.png">
</head>

<script>
    /**
 * GeoNexus - Theme Fix
 * Elimina o "clarão" (flash) ao carregar a página
 * Deve ser carregado no <head> antes de qualquer CSS
 */

(function() {
    'use strict';
    
    // Verificar se o tema está salvo no localStorage
    const savedTheme = localStorage.getItem('geonnexus-theme');
    
    // Detectar o tema do sistema (prefers-color-scheme)
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Definir o tema inicial
    let theme = savedTheme || (prefersDark ? 'dark' : 'light');
    
    // Aplicar o tema imediatamente (antes do CSS carregar)
    if (theme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
    }
    
    // Salvar o tema se não existir
    if (!savedTheme) {
        localStorage.setItem('geonnexus-theme', theme);
    }
    
    // Adicionar classe para evitar flash
    document.documentElement.classList.add('theme-ready');
    
    // Função para alternar tema (será chamada pelo botão)
    window.toggleTheme = function() {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('geonnexus-theme', newTheme);
        
        // Atualizar ícones se necessário
        updateThemeIcons(newTheme);
        
        return newTheme;
    };
    
    // Função para atualizar ícones dos botões de tema
    window.updateThemeIcons = function(theme) {
        document.querySelectorAll('.btn-theme, .theme-toggle').forEach(btn => {
            const sun = btn.querySelector('.sun, .fa-sun');
            const moon = btn.querySelector('.moon, .fa-moon');
            
            if (theme === 'dark') {
                if (sun) sun.style.display = 'none';
                if (moon) moon.style.display = 'inline-block';
            } else {
                if (sun) sun.style.display = 'inline-block';
                if (moon) moon.style.display = 'none';
            }
        });
    };
    
    // Atualizar ícones após o DOM carregar
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            updateThemeIcons(document.documentElement.getAttribute('data-theme'));
        });
    } else {
        updateThemeIcons(document.documentElement.getAttribute('data-theme'));
    }
    
    // Escutar mudanças no tema do sistema
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
        // Só mudar automaticamente se o usuário não tiver escolhido um tema manualmente
        if (!localStorage.getItem('geonnexus-theme')) {
            const newTheme = e.matches ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', newTheme);
            updateThemeIcons(newTheme);
        }
    });
    
    console.log('🌓 GeoNexus Theme Fix aplicado com sucesso! Tema:', theme);
})();
</script>