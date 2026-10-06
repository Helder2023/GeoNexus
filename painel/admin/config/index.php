<?php
// painel/admin/config/index.php - Dashboard de Configuração do Sistema
include "../../../includes/notificacoes-config-count.php";

$titulo_pagina = 'Configurações do Sistema';
$pagina_atual = 'config';

// Dados mockados para estatísticas
$total_planos = 6;
$total_modulos = 12;
$modulos_ativos = 10;
$total_integracoes = 4;
$total_emails = 8;
$total_permissoes = 15;

// Dados mockados para atividades recentes
$atividades_recentes = [
    [
        'acao' => 'Plano "Pro" atualizado',
        'usuario' => 'Administrador',
        'data' => '2026-02-18 14:30:00',
        'tipo' => 'edicao'
    ],
    [
        'acao' => 'Módulo "GIS" ativado',
        'usuario' => 'Administrador',
        'data' => '2026-02-18 11:20:00',
        'tipo' => 'ativacao'
    ],
    [
        'acao' => 'Template de email "Bem-vindo" editado',
        'usuario' => 'Administrador',
        'data' => '2026-02-17 16:45:00',
        'tipo' => 'edicao'
    ],
    [
        'acao' => 'Integração "PayPal" configurada',
        'usuario' => 'Administrador',
        'data' => '2026-02-17 10:00:00',
        'tipo' => 'configuracao'
    ],
    [
        'acao' => 'Nova permissão global adicionada',
        'usuario' => 'Administrador',
        'data' => '2026-02-16 09:15:00',
        'tipo' => 'criacao'
    ],
];

// Funções auxiliares
function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i', strtotime($datetime));
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

<?php include "../../../includes/admin-config-sidebar.php" ?>
    <!-- ========================================== -->
    <!-- MAIN CONTENT                              -->
    <!-- ========================================== -->
    <main class="main-content">
        <!-- ===== PAGE HEADER ===== -->
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-cog icon" style="color: #FFD93D;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <span>Configurações</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>

                
            </div>
        </header>

        <!-- ===== STATS CARDS ===== -->
        <section class="stats-grid">
            <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                <div class="icon yellow"><i class="fas fa-crown"></i></div>
                <div class="value"><?php echo $total_planos; ?></div>
                <div class="label">Planos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #6C2BD9;">
                <div class="icon aurora"><i class="fas fa-puzzle-piece"></i></div>
                <div class="value"><?php echo $modulos_ativos; ?>/<?php echo $total_modulos; ?></div>
                <div class="label">Módulos Ativos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                <div class="icon blue"><i class="fas fa-plug"></i></div>
                <div class="value"><?php echo $total_integracoes; ?></div>
                <div class="label">Integrações</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                <div class="icon red"><i class="fas fa-envelope"></i></div>
                <div class="value"><?php echo $total_emails; ?></div>
                <div class="label">Templates de Email</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                <div class="icon green"><i class="fas fa-lock"></i></div>
                <div class="value"><?php echo $total_permissoes; ?></div>
                <div class="label">Permissões Globais</div>
            </div>
        </section>

        <!-- ===== MÓDULOS RÁPIDOS ===== -->
        <section class="modulos-rapidos">
            <div class="section-header">
                <h3><i class="fas fa-puzzle-piece"></i> Módulos Rápidos</h3>
                <a href="modulos.php" class="link-view-all">Ver Todos <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="modulos-grid">
                <a href="planos.php" class="modulo-card">
                    <span class="modulo-icon">👑</span>
                    <span class="modulo-nome">Planos</span>
                    <span class="modulo-desc">Configurar planos</span>
                </a>
                <a href="modulos.php" class="modulo-card">
                    <span class="modulo-icon">🧩</span>
                    <span class="modulo-nome">Módulos</span>
                    <span class="modulo-desc">Ativar/desativar</span>
                </a>
                <a href="integracoes.php" class="modulo-card">
                    <span class="modulo-icon">🔗</span>
                    <span class="modulo-nome">Integrações</span>
                    <span class="modulo-desc">APIs e serviços</span>
                </a>
                <a href="emails.php" class="modulo-card">
                    <span class="modulo-icon">📧</span>
                    <span class="modulo-nome">Emails</span>
                    <span class="modulo-desc">Templates</span>
                </a>
                <a href="sistema.php" class="modulo-card">
                    <span class="modulo-icon">⚙️</span>
                    <span class="modulo-nome">Sistema</span>
                    <span class="modulo-desc">Configurações gerais</span>
                </a>
                <a href="permissoes-gerais.php" class="modulo-card">
                    <span class="modulo-icon">🔐</span>
                    <span class="modulo-nome">Permissões</span>
                    <span class="modulo-desc">Permissões globais</span>
                </a>
            </div>
        </section>

        <!-- ===== ATIVIDADES RECENTES ===== -->
        <section class="atividades-container">
            <div class="section-header">
                <h3><i class="fas fa-history"></i> Atividades Recentes</h3>
            </div>
            <div class="atividades-lista">
                <?php foreach ($atividades_recentes as $atividade): ?>
                <div class="atividade-item">
                    <div class="atividade-icon <?php echo $atividade['tipo']; ?>">
                        <i class="fas <?php echo $atividade['tipo'] === 'edicao' ? 'fa-edit' : ($atividade['tipo'] === 'ativacao' ? 'fa-check' : ($atividade['tipo'] === 'configuracao' ? 'fa-cog' : 'fa-plus')); ?>"></i>
                    </div>
                    <div class="atividade-conteudo">
                        <span class="atividade-acao"><?php echo $atividade['acao']; ?></span>
                        <span class="atividade-usuario"><i class="fas fa-user"></i> <?php echo $atividade['usuario']; ?></span>
                    </div>
                    <span class="atividade-data"><i class="far fa-clock"></i> <?php echo formatDateTime($atividade['data']); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
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

            const themeLabel = document.querySelector('.perfil-dropdown .theme-toggle');
            if (themeLabel) {
                themeLabel.innerHTML = newTheme === 'dark' ?
                    '<i class="fas fa-moon"></i> Tema Escuro' :
                    '<i class="fas fa-sun"></i> Tema Claro';
            }
        });
    }
})();
</script>
    <style>
        /* ========================================== */
        /* CONFIGURAÇÕES - CSS ESPECÍFICO             */
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

        /* ===== CARDS DE MÓDULOS ===== */
        .modulos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .modulo-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            text-align: center;
            transition: var(--transition-smooth);
            cursor: pointer;
            text-decoration: none;
            color: var(--text-primary);
        }

        .modulo-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
            transform: translateY(-4px);
        }

        .modulo-card .modulo-icon {
            font-size: 32px;
            margin-bottom: var(--space-sm);
            display: block;
        }

        .modulo-card .modulo-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            display: block;
        }

        .modulo-card .modulo-desc {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: block;
            margin-top: 2px;
        }

        .modulo-card .modulo-status {
            display: inline-block;
            margin-top: var(--space-xs);
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .modulo-card .modulo-status.ativo {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .modulo-card .modulo-status.inativo {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        /* ===== ATIVIDADES ===== */
        .atividades-lista {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .atividade-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .atividade-item .atividade-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .atividade-item .atividade-icon.edicao {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .atividade-item .atividade-icon.ativacao {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .atividade-item .atividade-icon.configuracao {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .atividade-item .atividade-icon.criacao {
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
        }

        .atividade-item .atividade-conteudo {
            flex: 1;
        }

        .atividade-item .atividade-acao {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
            display: block;
        }

        .atividade-item .atividade-usuario {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .atividade-item .atividade-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
        }

        /* ===== RESPONSIVIDADE ===== */
        @media (max-width: 768px) {
            .modulos-grid {
                grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            }

            .atividade-item {
                flex-wrap: wrap;
                gap: var(--space-sm);
            }

            .atividade-item .atividade-data {
                width: 100%;
                text-align: left;
            }
        }

        @media (max-width: 480px) {
            .modulos-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: var(--space-sm);
            }

            .modulo-card {
                padding: var(--space-md);
            }

            .modulo-card .modulo-icon {
                font-size: 24px;
            }
        }
    </style>
</body>
</html>