<?php
// painel/individual/assinatura.php - Minha Assinatura
include "../../includes/individual/notificacoes-individual-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Minha Assinatura';
$pagina_atual = 'assinatura';

// ============================================
// DADOS MOCKADOS - PLANO ATUAL
// ============================================
$plano_atual = [
    'id' => 2,
    'nome' => 'Pro',
    'categoria' => 'Individual',
    'valor' => 25000,
    'periodo' => 'Mensal',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_inicio' => '2025-06-15',
    'data_renovacao' => '2026-03-15',
    'dias_restantes' => 27,
    'metodo_pagamento' => 'Multicaixa',
    'proximo_pagamento' => '2026-03-15',
    'auto_renovacao' => true,
    'desconto' => 0,
    'descricao' => 'Plano avançado para profissionais experientes. Mais projetos, mais utilizadores e mais armazenamento.',
    'recursos' => [
        ['icon' => 'fa-project-diagram', 'label' => 'Até 20 Projetos', 'valor' => '20'],
        ['icon' => 'fa-users', 'label' => 'Até 3 Utilizadores', 'valor' => '3'],
        ['icon' => 'fa-hdd', 'label' => '20 GB de Armazenamento', 'valor' => '20 GB'],
        ['icon' => 'fa-headset', 'label' => 'Suporte Prioritário', 'valor' => '24/7'],
        ['icon' => 'fa-chart-line', 'label' => 'Relatórios Avançados', 'valor' => 'Sim'],
        ['icon' => 'fa-file-invoice', 'label' => 'Faturação Ilimitada', 'valor' => 'Sim'],
        ['icon' => 'fa-cloud-upload-alt', 'label' => 'Uploads Ilimitados', 'valor' => 'Sim'],
        ['icon' => 'fa-mobile-alt', 'label' => 'App Mobile', 'valor' => 'Sim'],
    ]
];

// ============================================
// USO DO PLANO
// ============================================
$uso_plano = [
    'projetos' => ['usado' => 12, 'total' => 20, 'percentual' => 60],
    'utilizadores' => ['usado' => 2, 'total' => 3, 'percentual' => 67],
    'armazenamento' => ['usado' => 12.5, 'total' => 20, 'percentual' => 62.5, 'unidade' => 'GB'],
];

// ============================================
// HISTÓRICO DE PAGAMENTOS
// ============================================
$historico_pagamentos = [
    [
        'id' => 1,
        'data' => '2026-02-15',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'status' => 'pago',
        'referencia' => 'TRF-2026-0045'
    ],
    [
        'id' => 2,
        'data' => '2026-01-15',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'status' => 'pago',
        'referencia' => 'TRF-2026-0032'
    ],
    [
        'id' => 3,
        'data' => '2025-12-15',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'status' => 'pago',
        'referencia' => 'TRF-2025-0891'
    ],
    [
        'id' => 4,
        'data' => '2025-11-15',
        'valor' => 25000,
        'metodo' => 'Multicaixa',
        'status' => 'pago',
        'referencia' => 'TRF-2025-0756'
    ],
];

// ============================================
// PLANOS DISPONÍVEIS (UPGRADE/DOWNGRADE)
// ============================================
$planos_disponiveis = [
    [
        'id' => 1,
        'nome' => 'Básico',
        'valor' => 15000,
        'periodo' => 'Mensal',
        'recursos' => ['5 Projetos', '1 Utilizador', '5 GB', 'Suporte Email'],
        'popular' => false,
        'atual' => false
    ],
    [
        'id' => 2,
        'nome' => 'Pro',
        'valor' => 25000,
        'periodo' => 'Mensal',
        'recursos' => ['20 Projetos', '3 Utilizadores', '20 GB', 'Suporte 24/7'],
        'popular' => true,
        'atual' => true
    ],
    [
        'id' => 3,
        'nome' => 'Premium',
        'valor' => 45000,
        'periodo' => 'Mensal',
        'recursos' => ['50 Projetos', '5 Utilizadores', '50 GB', 'Suporte 24/7 + API'],
        'popular' => false,
        'atual' => false
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

if (!function_exists('formatDate')) {
    function formatDate($date) {
        if (empty($date)) return 'N/A';
        return date('d/m/Y', strtotime($date));
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
    }
}

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'ativo' => 'status-ativo',
            'pendente' => 'status-pendente',
            'cancelado' => 'status-cancelado',
            'expirado' => 'status-expirado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../includes/individual-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <?php include "../../includes/individual-sidebar.php" ?>

        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-crown icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Minha Assinatura</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../includes/notificacoes-individual.php" ?>

                    <a href="financeiro/faturas.php" class="btn btn-outline">
                        <i class="fas fa-file-invoice"></i> Ver Faturas
                    </a>
                </div>
            </header>

            <!-- ===== ALERTA DE RENOVAÇÃO ===== -->
            <?php if ($plano_atual['dias_restantes'] <= 30): ?>
                <div class="alerta-renovacao animate-fade-up">
                    <div class="alerta-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alerta-conteudo">
                        <strong>Renovação em <?php echo $plano_atual['dias_restantes']; ?> dias</strong>
                        <span>O seu plano <strong><?php echo $plano_atual['nome']; ?></strong> será renovado a <?php echo formatDate($plano_atual['data_renovacao']); ?>. Certifique-se de que o método de pagamento está atualizado.</span>
                    </div>
                    <a href="#historico" class="btn btn-sm btn-outline">Ver Histórico</a>
                </div>
            <?php endif; ?>

            <!-- ===== CARD DO PLANO ATUAL ===== -->
            <section class="plano-atual animate-fade-up" style="animation-delay: 0.1s;">
                <div class="plano-atual-card">
                    <!-- Header -->
                    <div class="plano-atual-header">
                        <div class="plano-atual-badge">
                            <i class="fas fa-crown"></i>
                            Plano Atual
                        </div>
                        <span class="badge-status <?php echo getStatusClass($plano_atual['status']); ?>">
                            <i class="fas fa-circle"></i>
                            <?php echo $plano_atual['status_label']; ?>
                        </span>
                    </div>

                    <!-- Corpo -->
                    <div class="plano-atual-body">
                        <div class="plano-atual-principal">
                            <div class="plano-atual-nome-wrapper">
                                <div class="plano-atual-icon">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="plano-atual-info">
                                    <h2><?php echo $plano_atual['nome']; ?></h2>
                                    <span class="plano-atual-categoria"><?php echo $plano_atual['categoria']; ?></span>
                                </div>
                            </div>

                            <div class="plano-atual-preco">
                                <span class="preco-valor">Kz <?php echo formatMoney($plano_atual['valor']); ?></span>
                                <span class="preco-periodo">/<?php echo $plano_atual['periodo']; ?></span>
                            </div>
                        </div>

                        <p class="plano-atual-descricao"><?php echo $plano_atual['descricao']; ?></p>

                        <!-- Info Grid -->
                        <div class="plano-atual-info-grid">
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-calendar-check"></i>
                                    Início
                                </span>
                                <span class="info-value"><?php echo formatDate($plano_atual['data_inicio']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-calendar-alt"></i>
                                    Renovação
                                </span>
                                <span class="info-value"><?php echo formatDate($plano_atual['data_renovacao']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-credit-card"></i>
                                    Método
                                </span>
                                <span class="info-value"><?php echo $plano_atual['metodo_pagamento']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-sync-alt"></i>
                                    Auto-Renovação
                                </span>
                                <span class="info-value">
                                    <?php if ($plano_atual['auto_renovacao']): ?>
                                        <span class="badge-mini badge-success">Ativa</span>
                                    <?php else: ?>
                                        <span class="badge-mini badge-warning">Inativa</span>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ===== RECURSOS DO PLANO ===== -->
            <section class="recursos-section animate-fade-up" style="animation-delay: 0.15s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-gift" style="color: #00FFA3;"></i>
                        Recursos Incluídos
                    </h3>
                </div>
                <div class="recursos-grid">
                    <?php foreach ($plano_atual['recursos'] as $recurso): ?>
                        <div class="recurso-card">
                            <div class="recurso-icon">
                                <i class="fas <?php echo $recurso['icon']; ?>"></i>
                            </div>
                            <div class="recurso-info">
                                <span class="recurso-label"><?php echo $recurso['label']; ?></span>
                                <span class="recurso-valor"><?php echo $recurso['valor']; ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ===== USO DO PLANO ===== -->
            <section class="uso-section animate-fade-up" style="animation-delay: 0.2s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-chart-bar" style="color: #00D2FF;"></i>
                        Uso do Plano
                    </h3>
                </div>
                <div class="uso-grid">
                    <!-- Projetos -->
                    <div class="uso-card">
                        <div class="uso-header">
                            <div class="uso-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <div class="uso-titulo">
                                <span class="uso-nome">Projetos</span>
                                <span class="uso-contagem">
                                    <strong><?php echo $uso_plano['projetos']['usado']; ?></strong> / <?php echo $uso_plano['projetos']['total']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="uso-progresso">
                            <div class="uso-progresso-barra">
                                <div class="uso-progresso-fill" 
                                     style="width: <?php echo $uso_plano['projetos']['percentual']; ?>%; background: #6C2BD9;">
                                </div>
                            </div>
                            <span class="uso-percent" style="color: #6C2BD9;"><?php echo $uso_plano['projetos']['percentual']; ?>%</span>
                        </div>
                    </div>

                    <!-- Utilizadores -->
                    <div class="uso-card">
                        <div class="uso-header">
                            <div class="uso-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="uso-titulo">
                                <span class="uso-nome">Utilizadores</span>
                                <span class="uso-contagem">
                                    <strong><?php echo $uso_plano['utilizadores']['usado']; ?></strong> / <?php echo $uso_plano['utilizadores']['total']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="uso-progresso">
                            <div class="uso-progresso-barra">
                                <div class="uso-progresso-fill" 
                                     style="width: <?php echo $uso_plano['utilizadores']['percentual']; ?>%; background: #00D2FF;">
                                </div>
                            </div>
                            <span class="uso-percent" style="color: #00D2FF;"><?php echo $uso_plano['utilizadores']['percentual']; ?>%</span>
                        </div>
                    </div>

                    <!-- Armazenamento -->
                    <div class="uso-card">
                        <div class="uso-header">
                            <div class="uso-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                <i class="fas fa-hdd"></i>
                            </div>
                            <div class="uso-titulo">
                                <span class="uso-nome">Armazenamento</span>
                                <span class="uso-contagem">
                                    <strong><?php echo $uso_plano['armazenamento']['usado']; ?> <?php echo $uso_plano['armazenamento']['unidade']; ?></strong> / <?php echo $uso_plano['armazenamento']['total']; ?> <?php echo $uso_plano['armazenamento']['unidade']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="uso-progresso">
                            <div class="uso-progresso-barra">
                                <div class="uso-progresso-fill" 
                                     style="width: <?php echo $uso_plano['armazenamento']['percentual']; ?>%; background: #00FFA3;">
                                </div>
                            </div>
                            <span class="uso-percent" style="color: #00FFA3;"><?php echo $uso_plano['armazenamento']['percentual']; ?>%</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ===== HISTÓRICO DE PAGAMENTOS ===== -->
            <section class="historico-section animate-fade-up" id="historico" style="animation-delay: 0.25s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-history" style="color: #FFD93D;"></i>
                        Histórico de Pagamentos
                    </h3>
                    <a href="financeiro/pagamentos.php" class="btn btn-sm btn-outline">Ver todos</a>
                </div>
                <div class="historico-card">
                    <div class="historico-table-wrapper">
                        <table class="historico-table">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Referência</th>
                                    <th>Método</th>
                                    <th>Valor</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($historico_pagamentos as $pagamento): ?>
                                    <tr>
                                        <td>
                                            <div class="table-date">
                                                <i class="far fa-calendar"></i>
                                                <?php echo formatDate($pagamento['data']); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="table-ref"><?php echo $pagamento['referencia']; ?></span>
                                        </td>
                                        <td>
                                            <span class="table-metodo">
                                                <i class="fas fa-credit-card"></i>
                                                <?php echo $pagamento['metodo']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="table-valor">Kz <?php echo formatMoney($pagamento['valor']); ?></span>
                                        </td>
                                        <td>
                                            <span class="badge-status status-<?php echo $pagamento['status']; ?>">
                                                <i class="fas fa-check-circle"></i>
                                                <?php echo ucfirst($pagamento['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-actions">
                                                <button class="btn-table-action" title="Ver Recibo" onclick="verRecibo(<?php echo $pagamento['id']; ?>)">
                                                    <i class="fas fa-file-pdf"></i>
                                                </button>
                                                <button class="btn-table-action" title="Baixar" onclick="baixarRecibo(<?php echo $pagamento['id']; ?>)">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ===== AÇÕES DO PLANO ===== -->
            <section class="acoes-plano-section animate-fade-up" style="animation-delay: 0.3s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-tools" style="color: #00D2FF;"></i>
                        Gerir Assinatura
                    </h3>
                </div>
                <div class="acoes-plano-grid">
                    <button class="acao-plano-card" onclick="mostrarToast('Funcionalidade em desenvolvimento', 'info')">
                        <div class="acao-plano-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <span class="acao-plano-label">Fazer Upgrade</span>
                        <span class="acao-plano-desc">Mude para um plano superior</span>
                    </button>

                    <button class="acao-plano-card" onclick="mostrarToast('Funcionalidade em desenvolvimento', 'info')">
                        <div class="acao-plano-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <span class="acao-plano-label">Renovar Agora</span>
                        <span class="acao-plano-desc">Adicione mais 30 dias</span>
                    </button>

                    <button class="acao-plano-card" onclick="mostrarToast('Funcionalidade em desenvolvimento', 'info')">
                        <div class="acao-plano-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <span class="acao-plano-label">Alterar Pagamento</span>
                        <span class="acao-plano-desc">Atualizar método</span>
                    </button>

                    <button class="acao-plano-card" onclick="mostrarToast('Funcionalidade em desenvolvimento', 'info')">
                        <div class="acao-plano-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                            <i class="fas fa-toggle-on"></i>
                        </div>
                        <span class="acao-plano-label">Auto-Renovação</span>
                        <span class="acao-plano-desc">Ativar / Desativar</span>
                    </button>
                </div>
            </section>

            <!-- ===== PLANOS DISPONÍVEIS ===== -->
            <section class="planos-section animate-fade-up" style="animation-delay: 0.35s;">
                <div class="section-header-inline">
                    <h3>
                        <i class="fas fa-th-large" style="color: #6C2BD9;"></i>
                        Outros Planos
                    </h3>
                </div>
                <div class="planos-grid">
                    <?php foreach ($planos_disponiveis as $plano): ?>
                        <div class="plano-card <?php echo $plano['atual'] ? 'plano-atual-destaque' : ''; ?> <?php echo $plano['popular'] ? 'plano-popular' : ''; ?>">
                            <?php if ($plano['popular']): ?>
                                <div class="plano-badge-popular">
                                    <i class="fas fa-fire"></i> Popular
                                </div>
                            <?php endif; ?>
                            <?php if ($plano['atual']): ?>
                                <div class="plano-badge-atual">
                                    <i class="fas fa-check-circle"></i> Plano Atual
                                </div>
                            <?php endif; ?>

                            <h4 class="plano-nome"><?php echo $plano['nome']; ?></h4>
                            <div class="plano-preco">
                                <span class="plano-preco-valor">Kz <?php echo formatMoney($plano['valor']); ?></span>
                                <span class="plano-preco-periodo">/<?php echo $plano['periodo']; ?></span>
                            </div>

                            <ul class="plano-recursos">
                                <?php foreach ($plano['recursos'] as $recurso): ?>
                                    <li>
                                        <i class="fas fa-check"></i>
                                        <?php echo $recurso; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <?php if ($plano['atual']): ?>
                                <button class="btn btn-secondary" style="width: 100%;" disabled>
                                    <i class="fas fa-check"></i> Plano Atual
                                </button>
                            <?php else: ?>
                                <button class="btn btn-primary" style="width: 100%;" onclick="mudarPlano('<?php echo $plano['nome']; ?>')">
                                    <i class="fas fa-arrow-up"></i> Mudar para <?php echo $plano['nome']; ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // TOGGLE SIDEBAR
        // ============================================
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
        });

        // ============================================
        // PERFIL DROPDOWN
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const btnPerfil = document.getElementById('btnPerfil');
            const dropdown = document.getElementById('perfilDropdown');

            if (btnPerfil && dropdown) {
                btnPerfil.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                });

                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnPerfil.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }
        });

        // ============================================
        // THEME
        // ============================================
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const btnTheme = document.getElementById('btnTheme');
            if (btnTheme) {
                btnTheme.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ============================================
        // TOAST
        // ============================================
        if (typeof window.mostrarToast === 'undefined') {
            window.mostrarToast = function(mensagem, tipo = 'success') {
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

                const existingToasts = container.querySelectorAll('.toast');
                if (existingToasts.length >= 5) existingToasts[0].remove();

                const toast = document.createElement('div');
                toast.className = 'toast toast-' + tipo;
                toast.innerHTML = `
                    <div class="toast-content">
                        <i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i>
                        <span>${mensagem}</span>
                    </div>
                    <button class="toast-close" onclick="this.parentElement.remove()" aria-label="Fechar">&times;</button>
                `;

                container.appendChild(toast);

                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        toast.classList.add('show');
                    });
                });

                const timeout = setTimeout(function() {
                    if (toast.parentElement) {
                        toast.classList.remove('show');
                        setTimeout(function() {
                            if (toast.parentElement) toast.remove();
                        }, 400);
                    }
                }, 4000);

                const closeBtn = toast.querySelector('.toast-close');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function() {
                        clearTimeout(timeout);
                    });
                }
            };
        }
        var mostrarToast = window.mostrarToast;

        // ============================================
        // AÇÕES
        // ============================================
        function verRecibo(id) {
            mostrarToast('A abrir recibo #' + id, 'info');
        }

        function baixarRecibo(id) {
            mostrarToast('A baixar recibo #' + id, 'info');
        }

        function mudarPlano(nomePlano) {
            if (confirm('Deseja mudar para o plano ' + nomePlano + '?\n\nA mudança será aplicada no próximo ciclo de faturação.')) {
                mostrarToast('Pedido de mudança para ' + nomePlano + ' registado!', 'success');
            }
        }
    </script>

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO                             -->
    <!-- ========================================== -->
    <style>
        /* ========================================== */
        /* TOAST                                      */
        /* ========================================== */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 999999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
            width: calc(100% - 40px);
            pointer-events: none;
        }

        .toast {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 18px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            transform: translateX(120%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: auto;
            position: relative;
            overflow: hidden;
            min-width: 280px;
        }

        .toast::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
        }

        .toast.toast-success::before { background: #00FFA3; }
        .toast.toast-error::before { background: #FF6B6B; }
        .toast.toast-warning::before { background: #FFD93D; }
        .toast.toast-info::before { background: #00D2FF; }

        .toast .toast-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .toast .toast-content i { font-size: 1.3rem; flex-shrink: 0; }
        .toast .toast-content span { font-size: var(--text-sm); color: var(--text-primary); font-weight: 500; }
        .toast .toast-close {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 1.4rem;
            cursor: pointer;
            padding: 0 4px;
            line-height: 1;
            flex-shrink: 0;
        }
        .toast .toast-close:hover { color: var(--text-primary); }
        .toast.show { transform: translateX(0); opacity: 1; }

        /* ========================================== */
        /* PAGE HEADER                                */
        /* ========================================== */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: var(--space-lg);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            flex-wrap: wrap;
            position: relative;
            overflow: visible;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #FFD93D 0%, #FF9F43 100%);
            border-radius: var(--radius-lg) 0 0 var(--radius-lg);
        }

        .header-left {
            flex: 1;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .header-left h1 {
            font-family: var(--font-title);
            font-size: var(--text-h1);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #FFD93D; font-size: 0.85em; }

        .header-left .breadcrumb {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: var(--transition-smooth); }
        .header-left .breadcrumb a:hover { color: #FFD93D; }
        .header-left .breadcrumb .separator { color: var(--text-muted); opacity: 0.5; }

        .header-right {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
            flex-wrap: wrap;
        }

        .btn-theme {
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

        .btn-theme:hover { border-color: #FFD93D; color: #FFD93D; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* ALERTA DE RENOVAÇÃO                        */
        /* ========================================== */
        .alerta-renovacao {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: linear-gradient(135deg, rgba(255, 217, 61, 0.12) 0%, rgba(255, 159, 67, 0.06) 100%);
            border: 1px solid rgba(255, 217, 61, 0.3);
            border-left: 4px solid #FFD93D;
            border-radius: var(--radius-lg);
            margin-bottom: var(--space-lg);
            flex-wrap: wrap;
        }

        .alerta-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            animation: pulse 2s ease-in-out infinite;
        }

        .alerta-conteudo {
            flex: 1;
            min-width: 200px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .alerta-conteudo strong {
            font-size: var(--text-sm);
            color: #FFD93D;
            font-weight: 700;
        }

        .alerta-conteudo span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            line-height: 1.4;
        }

        /* ========================================== */
        /* CARD DO PLANO ATUAL                        */
        /* ========================================== */
        .plano-atual {
            margin-bottom: var(--space-lg);
        }

        .plano-atual-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 2px solid rgba(255, 217, 61, 0.3);
            overflow: hidden;
            position: relative;
            background-image: 
                radial-gradient(circle at top right, rgba(255, 217, 61, 0.08) 0%, transparent 50%),
                radial-gradient(circle at bottom left, rgba(0, 210, 255, 0.06) 0%, transparent 50%);
        }

        .plano-atual-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md) var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: rgba(255, 217, 61, 0.04);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .plano-atual-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.3);
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 14px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
        }

        .badge-status i { font-size: 6px; animation: pulse 2s ease-in-out infinite; }

        .badge-status.status-ativo { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-cancelado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-expirado { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        .plano-atual-body {
            padding: var(--space-lg);
        }

        .plano-atual-principal {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-lg);
            flex-wrap: wrap;
            margin-bottom: var(--space-md);
        }

        .plano-atual-nome-wrapper {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .plano-atual-icon {
            width: 64px;
            height: 64px;
            border-radius: var(--radius-lg);
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 8px 24px rgba(255, 217, 61, 0.35);
            flex-shrink: 0;
        }

        .plano-atual-info h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0 0 4px 0;
            line-height: 1;
        }

        .plano-atual-categoria {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .plano-atual-preco {
            display: flex;
            align-items: baseline;
            gap: 6px;
        }

        .plano-atual-preco .preco-valor {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: #FFD93D;
            line-height: 1;
        }

        .plano-atual-preco .preco-periodo {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .plano-atual-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0 0 var(--space-lg) 0;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .plano-atual-info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-label i { color: #FFD93D; font-size: 11px; }

        .info-value {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .badge-mini {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-mini.badge-success { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .badge-mini.badge-warning { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }

        /* ========================================== */
        /* SECTION HEADER INLINE                      */
        /* ========================================== */
        .section-header-inline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .section-header-inline h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        /* ========================================== */
        /* RECURSOS DO PLANO                          */
        /* ========================================== */
        .recursos-section {
            margin-bottom: var(--space-lg);
        }

        .recursos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: var(--space-sm);
        }

        .recurso-card {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-card);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .recurso-card:hover {
            border-color: #00FFA3;
            transform: translateY(-2px);
            box-shadow: var(--glass-shadow);
        }

        .recurso-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.15) 0%, rgba(0, 210, 255, 0.1) 100%);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .recurso-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .recurso-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .recurso-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* USO DO PLANO                               */
        /* ========================================== */
        .uso-section {
            margin-bottom: var(--space-lg);
        }

        .uso-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
        }

        .uso-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-lg);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .uso-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .uso-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .uso-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .uso-titulo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .uso-nome {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .uso-contagem {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .uso-contagem strong {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            color: var(--text-primary);
            font-weight: 700;
        }

        .uso-progresso {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .uso-progresso-barra {
            flex: 1;
            height: 8px;
            background: var(--bg-input);
            border-radius: 4px;
            overflow: hidden;
        }

        .uso-progresso-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .uso-percent {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            min-width: 42px;
            text-align: right;
        }

        /* ========================================== */
        /* HISTÓRICO                                  */
        /* ========================================== */
        .historico-section {
            margin-bottom: var(--space-lg);
        }

        .historico-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .historico-table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .historico-table {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 700px;
        }

        .historico-table thead {
            background: var(--bg-input);
        }

        .historico-table thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .historico-table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .historico-table tbody tr:last-child td {
            border-bottom: none;
        }

        .historico-table tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-date {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .table-date i { color: #FFD93D; }

        .table-ref {
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 700;
            color: var(--text-primary);
        }

        .table-metodo {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .table-metodo i { color: #00D2FF; }

        .table-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #00FFA3;
        }

        .table-actions {
            display: flex;
            gap: 4px;
        }

        .btn-table-action {
            width: 30px;
            height: 30px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .btn-table-action:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
        }

        /* ========================================== */
        /* AÇÕES DO PLANO                             */
        /* ========================================== */
        .acoes-plano-section {
            margin-bottom: var(--space-lg);
        }

        .acoes-plano-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
        }

        .acao-plano-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg) var(--space-md);
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: center;
            font-family: var(--font-body);
        }

        .acao-plano-card:hover {
            border-color: #00D2FF;
            background: var(--bg-card-hover);
            transform: translateY(-3px);
            box-shadow: var(--glass-shadow);
        }

        .acao-plano-icon {
            width: 52px;
            height: 52px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            transition: var(--transition-smooth);
        }

        .acao-plano-card:hover .acao-plano-icon {
            transform: scale(1.1);
        }

        .acao-plano-label {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .acao-plano-desc {
            font-size: var(--text-xs);
            color: var(--text-muted);
            line-height: 1.3;
        }

        /* ========================================== */
        /* PLANOS DISPONÍVEIS                         */
        /* ========================================== */
        .planos-section {
            margin-bottom: var(--space-lg);
        }

        .planos-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-lg);
        }

        .plano-card {
            position: relative;
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
            transition: var(--transition-smooth);
        }

        .plano-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--glass-shadow);
        }

        .plano-card.plano-atual-destaque {
            border-color: #FFD93D;
            background: linear-gradient(135deg, rgba(255, 217, 61, 0.06) 0%, transparent 100%);
        }

        .plano-card.plano-popular:not(.plano-atual-destaque) {
            border-color: rgba(0, 255, 163, 0.3);
        }

        .plano-badge-popular,
        .plano-badge-atual {
            position: absolute;
            top: -10px;
            right: 16px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .plano-badge-popular {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            box-shadow: 0 4px 12px rgba(0, 255, 163, 0.3);
        }

        .plano-badge-atual {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.3);
        }

        .plano-nome {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            text-align: center;
        }

        .plano-preco {
            display: flex;
            align-items: baseline;
            justify-content: center;
            gap: 4px;
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .plano-preco-valor {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: #00FFA3;
        }

        .plano-preco-periodo {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .plano-recursos {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            flex: 1;
        }

        .plano-recursos li {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .plano-recursos li i {
            color: #00FFA3;
            font-size: 12px;
            flex-shrink: 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .plano-atual-info-grid { grid-template-columns: repeat(2, 1fr); }
            .uso-grid { grid-template-columns: 1fr; }
            .acoes-plano-grid { grid-template-columns: repeat(2, 1fr); }
            .planos-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .planos-grid { grid-template-columns: 1fr; }
            .plano-atual-principal { flex-direction: column; align-items: flex-start; }
        }

        @media (max-width: 768px) {
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }

            .plano-atual-header { flex-direction: column; align-items: flex-start; }
            .plano-atual-icon { width: 56px; height: 56px; font-size: 24px; }
            .plano-atual-info h2 { font-size: var(--text-h3); }
            .plano-atual-preco .preco-valor { font-size: var(--text-h3); }
            .plano-atual-info-grid { grid-template-columns: 1fr; }

            .recursos-grid { grid-template-columns: 1fr 1fr; }

            .acoes-plano-grid { grid-template-columns: 1fr 1fr; }

            .alerta-renovacao { flex-direction: column; text-align: center; }
            .alerta-renovacao .btn { width: 100%; justify-content: center; }
        }

        @media (max-width: 480px) {
            .recursos-grid { grid-template-columns: 1fr; }
            .acoes-plano-grid { grid-template-columns: 1fr; }
            .plano-atual-body { padding: var(--space-md); }
            .historico-table { min-width: 600px; }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(0.95); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>