<?php
// painel/admin/config/sistema.php - Configurações Gerais do Sistema
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Configurações Gerais';
$pagina_atual = 'sistema';
$pagina_atual_sidebar = $pagina_atual;

// ===== DADOS MOCKADOS - CONFIGURAÇÕES =====
$configuracoes = [
    // ===== INFORMAÇÕES GERAIS =====
    'nome_site' => 'GeoNexus',
    'descricao_site' => 'Plataforma de Engenharia e Geotecnologia',
    'email_contato' => 'contato@geonnexus.com',
    'telefone_contato' => '+244 923 456 789',
    'endereco' => 'Rua 15, Nº 245, Luanda, Angola',
    
    // ===== BRANDING =====
    'logo' => 'logo.png',
    'favicon' => 'favicon.png',
    'cor_primaria' => '#0A1628',
    'cor_secundaria' => '#1A2A4A',
    'cor_destaque' => '#FFD93D',
    'cor_fundo' => '#0A1628',
    
    // ===== SEGURANÇA =====
    'auth_duas_fases' => true,
    'tempo_sessao' => 60,
    'min_caracteres_senha' => 8,
    'bloqueio_tentativas' => 5,
    'tempo_bloqueio' => 30,
    
    // ===== NOTIFICAÇÕES =====
    'notificacoes_email' => true,
    'notificacoes_push' => false,
    'notificacoes_sms' => false,
    'email_admin_notificacoes' => 'admin@geonnexus.com',
    
    // ===== ARMAZENAMENTO =====
    'armazenamento_maximo' => 100,
    'tamanho_maximo_arquivo' => 10,
    'formatos_permitidos' => 'pdf,jpg,png,doc,docx,xls,xlsx',
    
    // ===== PERFORMANCE =====
    'cache_ativo' => true,
    'tempo_cache' => 3600,
    'compressao_imagens' => true,
    
    // ===== BACKUP =====
    'backup_automatico' => true,
    'frequencia_backup' => 'daily',
    'retencao_backup' => 30,
];

// ===== CATEGORIAS DE CONFIGURAÇÃO =====
$categorias = [
    'geral' => [
        'nome' => 'Informações Gerais',
        'icon' => 'fa-info-circle',
        'ativo' => true
    ],
    'branding' => [
        'nome' => 'Branding',
        'icon' => 'fa-palette',
        'ativo' => true
    ],
    'seguranca' => [
        'nome' => 'Segurança',
        'icon' => 'fa-shield-alt',
        'ativo' => true
    ],
    'notificacoes' => [
        'nome' => 'Notificações',
        'icon' => 'fa-bell',
        'ativo' => true
    ],
    'armazenamento' => [
        'nome' => 'Armazenamento',
        'icon' => 'fa-database',
        'ativo' => true
    ],
    'performance' => [
        'nome' => 'Performance',
        'icon' => 'fa-tachometer-alt',
        'ativo' => true
    ],
    'backup' => [
        'nome' => 'Backup',
        'icon' => 'fa-archive',
        'ativo' => true
    ],
];

// ===== FUNÇÕES AUXILIARES =====
function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y H:i', strtotime($date));
}

function getStatusLabel($value) {
    return $value ? '<span class="badge-status status-ativo"><i class="fas fa-check-circle"></i> Ativo</span>' : '<span class="badge-status status-inativo"><i class="fas fa-times-circle"></i> Inativo</span>';
}

function getFrequenciaLabel($freq) {
    $labels = [
        'daily' => 'Diário',
        'weekly' => 'Semanal',
        'monthly' => 'Mensal'
    ];
    return $labels[$freq] ?? $freq;
}
?>
<!DOCTYPE html>
<html lang="pt">
<?php include "../../../includes/admin-config-head.php" ?>

<body>
<div class="app-container">
    <div id="toast-container" class="toast-container"></div>

    <!-- ========================================== -->
    <!-- SIDEBAR CONFIGURAÇÕES                     -->
    <!-- ========================================== -->
    <?php include "../../../includes/admin-config-sidebar.php"; ?>

    <!-- ========================================== -->
    <!-- MAIN CONTENT                              -->
    <!-- ========================================== -->
    <main class="main-content">
        <!-- ===== PAGE HEADER ===== -->
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-cog icon" style="color: #00D2FF;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <span>Sistema</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>

                <div class="header-actions">
                    <a href="sistema-editar.php" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar Configurações
                    </a>
                    <button class="btn btn-outline" onclick="window.location.reload()">
                        <i class="fas fa-sync-alt"></i> Atualizar
                    </button>
                </div>
            </div>
        </header>

        <!-- ===== MENU DE CATEGORIAS ===== -->
        <div class="sistema-container">
            <div class="categorias-menu">
                <?php foreach ($categorias as $key => $cat): ?>
                    <button class="categoria-btn <?php echo $key === 'geral' ? 'active' : ''; ?>" 
                            onclick="mostrarCategoria('<?php echo $key; ?>')">
                        <i class="fas <?php echo $cat['icon']; ?>"></i>
                        <?php echo $cat['nome']; ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- ========================================== -->
            <!-- SEÇÃO: INFORMAÇÕES GERAIS                 -->
            <!-- ========================================== -->
            <div class="config-section active" id="sec-geral">
                <div class="config-section-title">
                    <i class="fas fa-info-circle"></i>
                    Informações Gerais
                </div>
                <div class="config-grid">
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-globe"></i> Nome do Site</span>
                        <span class="config-value"><?php echo $configuracoes['nome_site']; ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-align-left"></i> Descrição</span>
                        <span class="config-value"><?php echo $configuracoes['descricao_site']; ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-envelope"></i> Email de Contato</span>
                        <span class="config-value"><?php echo $configuracoes['email_contato']; ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-phone"></i> Telefone</span>
                        <span class="config-value"><?php echo $configuracoes['telefone_contato']; ?></span>
                    </div>
                    <div class="config-item" style="grid-column: span 2;">
                        <span class="config-label"><i class="fas fa-map-marker-alt"></i> Endereço</span>
                        <span class="config-value"><?php echo $configuracoes['endereco']; ?></span>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SEÇÃO: BRANDING                           -->
            <!-- ========================================== -->
            <div class="config-section" id="sec-branding">
                <div class="config-section-title">
                    <i class="fas fa-palette"></i>
                    Branding
                </div>
                <div class="config-grid">
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-image"></i> Logo</span>
                        <span class="config-value"><?php echo $configuracoes['logo']; ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-star"></i> Favicon</span>
                        <span class="config-value"><?php echo $configuracoes['favicon']; ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-palette"></i> Cor Primária</span>
                        <span class="config-value" style="display: flex; align-items: center; gap: 8px;">
                            <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background: <?php echo $configuracoes['cor_primaria']; ?>; border: 1px solid var(--border-color);"></span>
                            <?php echo $configuracoes['cor_primaria']; ?>
                        </span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-palette"></i> Cor Secundária</span>
                        <span class="config-value" style="display: flex; align-items: center; gap: 8px;">
                            <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background: <?php echo $configuracoes['cor_secundaria']; ?>; border: 1px solid var(--border-color);"></span>
                            <?php echo $configuracoes['cor_secundaria']; ?>
                        </span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-palette"></i> Cor de Destaque</span>
                        <span class="config-value" style="display: flex; align-items: center; gap: 8px;">
                            <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background: <?php echo $configuracoes['cor_destaque']; ?>; border: 1px solid var(--border-color);"></span>
                            <?php echo $configuracoes['cor_destaque']; ?>
                        </span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-palette"></i> Cor de Fundo</span>
                        <span class="config-value" style="display: flex; align-items: center; gap: 8px;">
                            <span style="display: inline-block; width: 20px; height: 20px; border-radius: 4px; background: <?php echo $configuracoes['cor_fundo']; ?>; border: 1px solid var(--border-color);"></span>
                            <?php echo $configuracoes['cor_fundo']; ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SEÇÃO: SEGURANÇA                         -->
            <!-- ========================================== -->
            <div class="config-section" id="sec-seguranca">
                <div class="config-section-title">
                    <i class="fas fa-shield-alt"></i>
                    Segurança
                </div>
                <div class="config-grid">
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-lock"></i> Autenticação em Duas Fases</span>
                        <span class="config-value"><?php echo getStatusLabel($configuracoes['auth_duas_fases']); ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-clock"></i> Tempo de Sessão (minutos)</span>
                        <span class="config-value"><?php echo $configuracoes['tempo_sessao']; ?> min</span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-key"></i> Mín. Caracteres Senha</span>
                        <span class="config-value"><?php echo $configuracoes['min_caracteres_senha']; ?> caracteres</span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-ban"></i> Tentativas Antes de Bloquear</span>
                        <span class="config-value"><?php echo $configuracoes['bloqueio_tentativas']; ?> tentativas</span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-hourglass-half"></i> Tempo de Bloqueio (minutos)</span>
                        <span class="config-value"><?php echo $configuracoes['tempo_bloqueio']; ?> min</span>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SEÇÃO: NOTIFICAÇÕES                       -->
            <!-- ========================================== -->
            <div class="config-section" id="sec-notificacoes">
                <div class="config-section-title">
                    <i class="fas fa-bell"></i>
                    Notificações
                </div>
                <div class="config-grid">
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-envelope"></i> Notificações por Email</span>
                        <span class="config-value"><?php echo getStatusLabel($configuracoes['notificacoes_email']); ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-bell"></i> Notificações Push</span>
                        <span class="config-value"><?php echo getStatusLabel($configuracoes['notificacoes_push']); ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-sms"></i> Notificações por SMS</span>
                        <span class="config-value"><?php echo getStatusLabel($configuracoes['notificacoes_sms']); ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-user-cog"></i> Email Admin para Notificações</span>
                        <span class="config-value"><?php echo $configuracoes['email_admin_notificacoes']; ?></span>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SEÇÃO: ARMAZENAMENTO                      -->
            <!-- ========================================== -->
            <div class="config-section" id="sec-armazenamento">
                <div class="config-section-title">
                    <i class="fas fa-database"></i>
                    Armazenamento
                </div>
                <div class="config-grid">
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-hdd"></i> Armazenamento Máximo (GB)</span>
                        <span class="config-value"><?php echo $configuracoes['armazenamento_maximo']; ?> GB</span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-file"></i> Tamanho Máximo de Arquivo (MB)</span>
                        <span class="config-value"><?php echo $configuracoes['tamanho_maximo_arquivo']; ?> MB</span>
                    </div>
                    <div class="config-item" style="grid-column: span 2;">
                        <span class="config-label"><i class="fas fa-file-alt"></i> Formatos Permitidos</span>
                        <span class="config-value"><?php echo $configuracoes['formatos_permitidos']; ?></span>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SEÇÃO: PERFORMANCE                        -->
            <!-- ========================================== -->
            <div class="config-section" id="sec-performance">
                <div class="config-section-title">
                    <i class="fas fa-tachometer-alt"></i>
                    Performance
                </div>
                <div class="config-grid">
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-rocket"></i> Cache Ativo</span>
                        <span class="config-value"><?php echo getStatusLabel($configuracoes['cache_ativo']); ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-clock"></i> Tempo de Cache (segundos)</span>
                        <span class="config-value"><?php echo $configuracoes['tempo_cache']; ?> s</span>
                    </div>
                    <div class="config-item" style="grid-column: span 2;">
                        <span class="config-label"><i class="fas fa-compress"></i> Compressão de Imagens</span>
                        <span class="config-value"><?php echo getStatusLabel($configuracoes['compressao_imagens']); ?></span>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- SEÇÃO: BACKUP                            -->
            <!-- ========================================== -->
            <div class="config-section" id="sec-backup">
                <div class="config-section-title">
                    <i class="fas fa-archive"></i>
                    Backup
                </div>
                <div class="config-grid">
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-sync-alt"></i> Backup Automático</span>
                        <span class="config-value"><?php echo getStatusLabel($configuracoes['backup_automatico']); ?></span>
                    </div>
                    <div class="config-item">
                        <span class="config-label"><i class="fas fa-calendar-alt"></i> Frequência de Backup</span>
                        <span class="config-value"><?php echo getFrequenciaLabel($configuracoes['frequencia_backup']); ?></span>
                    </div>
                    <div class="config-item" style="grid-column: span 2;">
                        <span class="config-label"><i class="fas fa-trash"></i> Retenção de Backup (dias)</span>
                        <span class="config-value"><?php echo $configuracoes['retencao_backup']; ?> dias</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== BOTÃO DE AÇÃO GLOBAL ===== -->
        <div style="display: flex; gap: var(--space-sm); justify-content: center; flex-wrap: wrap;">
            <a href="sistema-editar.php" class="btn btn-primary">
                <i class="fas fa-edit"></i> Editar Configurações
            </a>
            <button class="btn btn-outline" onclick="exportarConfiguracoes()">
                <i class="fas fa-file-export"></i> Exportar Configurações
            </button>
            <button class="btn btn-danger" onclick="restaurarPadrao()">
                <i class="fas fa-undo"></i> Restaurar Padrão
            </button>
        </div>
    </main>
</div>

<!-- ========================================== -->
<!-- SCRIPTS                                    -->
<!-- ========================================== -->
<script src="../../../assets/js/main.js"></script>
<script>
// ==========================================
// TOGGLE SIDEBAR
// ==========================================
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            sidebar.classList.toggle('open');
            if (overlay) overlay.classList.toggle('active');
        });
    }

    if (overlay) {
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
        }
    });
});

// ==========================================
// TOGGLE SIDEBAR MOBILE
// ==========================================
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('bottomMenuToggle');

    if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
        if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
            sidebar.classList.remove('open');
            document.getElementById('sidebarOverlay')?.classList.remove('active');
        }
    }
});

// ==========================================
// THEME DARK/LIGHT
// ==========================================
(function() {
    const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);

    const btnTheme = document.getElementById('btnTheme');
    if (btnTheme) {
        btnTheme.addEventListener('click', function(e) {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('geonnexus-theme', newTheme);
        });
    }
})();

// ==========================================
// MOSTRAR CATEGORIA
// ==========================================
function mostrarCategoria(id) {
    // Esconder todas as seções
    document.querySelectorAll('.config-section').forEach(sec => {
        sec.classList.remove('active');
    });

    // Mostrar a seção selecionada
    const sec = document.getElementById('sec-' + id);
    if (sec) {
        sec.classList.add('active');
    }

    // Atualizar botões
    document.querySelectorAll('.categoria-btn').forEach(btn => {
        btn.classList.remove('active');
    });

    // Ativar botão clicado
    const btn = document.querySelector('.categoria-btn[onclick="mostrarCategoria(\'' + id + '\')"]');
    if (btn) {
        btn.classList.add('active');
    }
}

// ==========================================
// AÇÕES
// ==========================================
function exportarConfiguracoes() {
    if (confirm('Tem certeza que deseja exportar as configurações atuais?')) {
        mostrarToast('Configurações exportadas com sucesso!', 'success');
    }
}

function restaurarPadrao() {
    if (confirm('Tem certeza que deseja restaurar as configurações para o padrão? Esta ação não pode ser desfeita.')) {
        mostrarToast('Configurações restauradas para o padrão!', 'warning');
        setTimeout(() => location.reload(), 1500);
    }
}

// ==========================================
// TOAST
// ==========================================
function mostrarToast(mensagem, tipo = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const icons = {
        success: 'fa-check-circle',
        error: 'fa-exclamation-circle',
        warning: 'fa-exclamation-triangle',
        info: 'fa-info-circle'
    };

    const colors = {
        success: '#00FFA3',
        error: '#FF6B6B',
        warning: '#FFD93D',
        info: '#00D2FF'
    };

    const toast = document.createElement('div');
    toast.className = 'toast toast-' + tipo;
    toast.innerHTML = `
        <div class="toast-content">
            <i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i>
            <span>${mensagem}</span>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove()">&times;</button>
    `;

    container.appendChild(toast);

    requestAnimationFrame(() => {
        toast.style.transform = 'translateX(0)';
        toast.style.opacity = '1';
    });

    setTimeout(() => {
        if (toast.parentElement) {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }, 4000);
}
</script>

 <!-- ===== CSS ESPECÍFICO ===== -->
    <style>
        /* ========================================== */
        /* SISTEMA - CSS                              */
        /* ========================================== */

        /* ===== BOTÃO VOLTAR ===== */
        .btn-voltar-painel {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .btn-voltar-painel:hover {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        /* ===== CONTAINER ===== */
        .sistema-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .sistema-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== MENU DE CATEGORIAS ===== */
        .categorias-menu {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-xs);
            margin-bottom: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: var(--space-md);
        }

        .categoria-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .categoria-btn:hover {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .categoria-btn.active {
            background: rgba(0, 210, 255, 0.1);
            border-color: #00D2FF;
            color: #00D2FF;
        }

        .categoria-btn i {
            font-size: 14px;
        }

        /* ===== SEÇÃO DE CONFIGURAÇÃO ===== */
        .config-section {
            display: none;
        }

        .config-section.active {
            display: block;
        }

        .config-section-title {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-lg);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .config-section-title i {
            color: #00D2FF;
        }

        /* ===== CONFIG ITEMS ===== */
        .config-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .config-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .config-item:hover {
            border-color: var(--text-muted);
        }

        .config-item .config-label {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .config-item .config-label i {
            width: 20px;
            color: var(--text-muted);
        }

        .config-item .config-value {
            font-weight: 500;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        /* ===== BADGES ===== */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-status.status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-inativo {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        /* ===== FORM CONTROLS ===== */
        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
            min-height: 38px;
        }

        .form-control:focus {
            outline: none;
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        select.form-control option {
            background: var(--bg-card);
            color: var(--text-primary);
            padding: 8px;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 992px) {
            .config-grid {
                grid-template-columns: 1fr;
            }

            .categorias-menu {
                gap: var(--space-xs);
            }

            .categoria-btn {
                font-size: var(--text-xs);
                padding: 6px 12px;
            }
        }

        @media (max-width: 768px) {
            .sistema-container {
                padding: var(--space-sm);
            }

            .categorias-menu {
                justify-content: center;
            }

            .config-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }
        }

        @media (max-width: 480px) {
            .sistema-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .categoria-btn {
                font-size: var(--text-xs);
                padding: 4px 10px;
            }

            .categoria-btn i {
                font-size: 12px;
            }
        }

        /* ========================================== */
        /* SCROLLBAR PERSONALIZADO                    */
        /* ========================================== */

        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }

        ::-webkit-scrollbar-thumb {
            background: #00D2FF;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0099CC;
        }
    </style>
</body>
</html>