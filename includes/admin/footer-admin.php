<?php
// includes/footer-admin.php - Footer para o Admin
$site_url = 'http://localhost/geonnexus';
?>
        <!-- Scripts Base -->
        <script src="<?php echo $site_url; ?>/assets/js/painel-base.js"></script>
        <script src="<?php echo $site_url; ?>/assets/js/admin.js"></script>
        <script src="<?php echo $site_url; ?>/assets/js/notificacoes.js"></script>
        
        <!-- Inicialização -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inicializar notificações
                if (typeof NotificationSystem !== 'undefined') {
                    NotificationSystem.init();
                }
                
                // Inicializar admin
                if (typeof Admin !== 'undefined') {
                    Admin.init();
                }
                
                // Tocar som de notificação se houver novas
                <?php if (isset($notificacoes_count) && $notificacoes_count > 0): ?>
                    setTimeout(function() {
                        if (typeof NotificationSystem !== 'undefined') {
                            NotificationSystem.playSound();
                        }
                    }, 1000);
                <?php endif; ?>
            });
        </script>
    </body>
</html>