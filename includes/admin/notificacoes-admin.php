<?php

// Dados mockados para notificações
$notificacoes = [
    [
        'id' => 1,
        'icon' => 'fa-user-plus',
        'icon_class' => 'aurora',
        'mensagem' => '<strong>João Silva</strong> criou uma nova conta',
        'tempo' => 'há 5 minutos',
        'lida' => false
    ],
    [
        'id' => 2,
        'icon' => 'fa-check-circle',
        'icon_class' => 'green',
        'mensagem' => '<strong>Empresa ABC</strong> foi validada com sucesso',
        'tempo' => 'há 23 minutos',
        'lida' => false
    ],
    [
        'id' => 3,
        'icon' => 'fa-credit-card',
        'icon_class' => 'geo',
        'mensagem' => '<strong>Pagamento</strong> de Kz 25.000 confirmado',
        'tempo' => 'há 1 hora',
        'lida' => false
    ],
    [
        'id' => 4,
        'icon' => 'fa-exclamation-triangle',
        'icon_class' => 'red',
        'mensagem' => '<strong>Ticket #124</strong> foi aberto por Maria Santos',
        'tempo' => 'há 2 horas',
        'lida' => false
    ],
    [
        'id' => 5,
        'icon' => 'fa-edit',
        'icon_class' => 'aurora',
        'mensagem' => '<strong>Projeto "Levantamento GIS"</strong> foi atualizado',
        'tempo' => 'há 3 horas',
        'lida' => true
    ],
    [
        'id' => 6,
        'icon' => 'fa-file-invoice',
        'icon_class' => 'green',
        'mensagem' => '<strong>Nova fatura</strong> emitida para Construtora XYZ',
        'tempo' => 'há 5 horas',
        'lida' => true
    ]
];
// Menu do Perfil
$perfil_menu = [
    ['icon' => 'fa-user-cog', 'label' => 'Meu Perfil', 'link' => 'perfil.php'],
    ['icon' => 'fa-sliders-h', 'label' => 'Configurações', 'link' => 'config/index.php'],
    ['icon' => 'fa-moon', 'label' => 'Tema Escuro', 'link' => '#', 'class' => 'theme-toggle'],
    ['icon' => 'fa-sign-out-alt', 'label' => 'Sair', 'link' => '../../public/logout.php', 'class' => 'logout-link'],
];
?>

<!-- ========================================== -->
                    <!-- NOTIFICAÇÕES COM DROPDOWN                  -->
                    <!-- ========================================== -->
                    <div class="notifications-wrapper">
                        <button class="btn-notificacoes" id="btnNotificacoes" title="Notificações">
                            <i class="fas fa-bell"></i>
                            <span class="badge" id="notifBadge"><?php echo $notificacoes_count; ?></span>
                        </button>

                        <!-- Dropdown de Notificações -->
                        <div class="notifications-dropdown" id="notificacoesDropdown">
                            <div class="dropdown-header">
                                <h3><i class="fas fa-bell"></i> Notificações</h3>
                                <button class="btn-close-dropdown" onclick="closeNotifications()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="dropdown-body" id="notifList">
                                <!-- Carregado via JS -->
                            </div>
                            <div class="dropdown-footer">
                                <button class="btn btn-sm btn-link" onclick="marcarTodasLidas()">
                                    <i class="fas fa-check-double"></i> Marcar todas como lidas
                                </button>
                                <a href="notificacoes.php" class="btn btn-sm btn-primary">
                                    Ver todas
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ========================================== -->
                    <!-- PERFIL COM DROPDOWN                       -->
                    <!-- ========================================== -->
                    <div class="perfil-wrapper">
                        <button class="btn-perfil" id="btnPerfil">
                            <img src="../../assets/images/avatar-admin.png" alt="Perfil" class="avatar">
                            <span class="name">Administrador</span>
                            <i class="fas fa-chevron-down chevron"></i>
                        </button>

                        <!-- Dropdown do Perfil -->
                        <div class="perfil-dropdown" id="perfilDropdown">
                            <div class="perfil-info">
                                <img src="../../assets/images/avatar-admin.png" alt="Perfil">
                                <div>
                                    <strong>Administrador</strong>
                                    <span>admin@geonnexus.com</span>
                                </div>
                            </div>
                            <hr>
                            <?php foreach ($perfil_menu as $item): ?>
                                <a href="<?php echo $item['link']; ?>" class="<?php echo isset($item['class']) ? $item['class'] : ''; ?>">
                                    <i class="fas <?php echo $item['icon']; ?>"></i>
                                    <?php echo $item['label']; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

<script>
            // ==========================================
        // DADOS MOCKADOS PARA NOTIFICAÇÕES
        // ==========================================
        const mockNotificacoes = <?php echo json_encode($notificacoes); ?>;

</script>