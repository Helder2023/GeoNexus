<?php
// painel/admin/relatorio-visualizar.php - Visualizar Relatório
include "../../includes/admin/notificacoes-admin-count.php";

$titulo_pagina = 'Visualizar Relatório';
$pagina_atual = 'relatorios-globais';

// Dados mockados
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Simulando o ID recebido via GET
$relatorio_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Relatório
$relatorio_data = [
    'id' => $relatorio_id,
    'titulo' => 'Relatório de Utilizadores - Fevereiro 2026',
    'descricao' => 'Análise detalhada do crescimento e atividade de utilizadores no mês de fevereiro de 2026.',
    'tipo' => 'utilizadores',
    'tipo_label' => 'Utilizadores',
    'periodo' => 'Mensal',
    'data_geracao' => '2026-02-28 23:59:00',
    'status' => 'concluido',
    'status_label' => 'Concluído',
    'tamanho' => '2.4 MB',
    'formato' => 'PDF',
    'gerado_por' => 'Sistema',
    'visualizacoes' => 45,
    'downloads' => 12,
    'parametros' => ['Período: 01/02/2026 a 28/02/2026', 'Total: 156 utilizadores'],
    'conteudo' => [
        'resumo_executivo' => 'O mês de fevereiro de 2026 registou um crescimento significativo no número de utilizadores da plataforma GeoNexus, com um aumento de 15.2% em relação ao mês anterior. A adesão de novos profissionais e empresas foi o principal motor deste crescimento.',
        'indicadores' => [
            ['label' => 'Total de Utilizadores', 'value' => '1.284', 'change' => '+15.2%', 'trend' => 'up'],
            ['label' => 'Novos Utilizadores (Fev)', 'value' => '186', 'change' => '+23.5%', 'trend' => 'up'],
            ['label' => 'Utilizadores Ativos', 'value' => '892', 'change' => '+12.8%', 'trend' => 'up'],
            ['label' => 'Taxa de Retenção', 'value' => '78.3%', 'change' => '+5.1%', 'trend' => 'up'],
            ['label' => 'Ticket Médio', 'value' => 'Kz 45.200', 'change' => '+8.3%', 'trend' => 'up'],
            ['label' => 'NPS', 'value' => '72', 'change' => '+4.2%', 'trend' => 'up']
        ],
        'distribuicao' => [
            ['categoria' => 'Profissionais', 'quantidade' => 425, 'cor' => '#00D2FF'],
            ['categoria' => 'Empresas', 'quantidade' => 380, 'cor' => '#FF6B6B'],
            ['categoria' => 'Instituições', 'quantidade' => 280, 'cor' => '#FFD93D'],
            ['categoria' => 'Administradores', 'quantidade' => 12, 'cor' => '#6C2BD9']
        ],
        'crescimento_mensal' => [
            ['mes' => 'Set/25', 'total' => 780],
            ['mes' => 'Out/25', 'total' => 820],
            ['mes' => 'Nov/25', 'total' => 890],
            ['mes' => 'Dez/25', 'total' => 960],
            ['mes' => 'Jan/26', 'total' => 1.098],
            ['mes' => 'Fev/26', 'total' => 1.284]
        ],
        'top_utilizadores' => [
            ['nome' => 'Carlos Mendes', 'tipo' => 'Profissional', 'projetos' => 12, 'avaliacao' => 4.8],
            ['nome' => 'Ana Costa', 'tipo' => 'Profissional', 'projetos' => 18, 'avaliacao' => 4.9],
            ['nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'projetos' => 8, 'avaliacao' => 4.7],
            ['nome' => 'Instituto Técnico de Luanda', 'tipo' => 'Instituição', 'projetos' => 6, 'avaliacao' => 4.6],
            ['nome' => 'Marisa Lima', 'tipo' => 'Profissional', 'projetos' => 9, 'avaliacao' => 4.7]
        ],
        'conclusao' => 'Os dados demonstram um crescimento consistente da plataforma, com forte adesão de profissionais e empresas. Recomenda-se continuar os investimentos em marketing e capacitação para sustentar este crescimento.'
    ]
];

// Função para exibir valor de forma segura
function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i:s', strtotime($datetime));
}

function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6C2BD9&color=fff&size=80';
}

$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => false],
    ['icon' => 'fa-blog', 'label' => 'Blog', 'link' => 'blog.php', 'active' => false],
    ['icon' => 'fa-envelope', 'label' => 'Mensagens', 'link' => 'mensagens.php', 'active' => false],
    ['icon' => 'fa-ticket-alt', 'label' => 'Tickets', 'link' => 'suporte-tickets.php', 'active' => false],
    ['icon' => 'fa-history', 'label' => 'Logs', 'link' => 'logs-auditoria.php', 'active' => false],
    ['icon' => 'fa-database', 'label' => 'Backup', 'link' => 'backup.php', 'active' => false],
    ['icon' => 'fa-file-alt', 'label' => 'Relatórios', 'link' => 'relatorios-globais.php', 'active' => true],
    ['icon' => 'fa-user-check', 'label' => 'Validar', 'link' => 'admin-validar.php', 'active' => false],
    ['icon' => 'fa-chart-pie', 'label' => 'Financeiro', 'link' => 'financeiro/index.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];


?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../includes/admin/admin-head.php" ?>

<body>
<div class="app-container">
    <div id="toast-container" class="toast-container"></div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <?php include "../../includes/admin/admin-sidebar.php" ?>

    <nav class="bottom-nav" id="bottomNav">
        <div class="nav-items">
            <?php foreach ($bottom_nav_items as $item): ?>
                <a href="<?php echo $item['link']; ?>"
                    class="nav-item <?php echo $item['active'] ? 'active' : ''; ?> <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'menu-toggle' : ''; ?>"
                    <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'id="bottomMenuToggle"' : ''; ?>
                    <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'onclick="toggleSidebarMobile(event)"' : ''; ?>>
                    <i class="fas <?php echo $item['icon']; ?>"></i>
                    <span><?php echo $item['label']; ?></span>
                    <?php if ($item['label'] === 'Relatórios'): ?>
                        <span class="badge badge-primary">1</span>
                    <?php endif; ?>
                    <?php if ($item['label'] === 'Menu'): ?>
                        <span class="badge" id="bottomNotifBadge"><?php echo $notificacoes_count; ?></span>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <main class="main-content">
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-file-alt icon"></i>
                    Visualizar Relatório
                </h1>
                <p class="breadcrumb">
                    <a href="index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="relatorios-globais.php">Relatórios</a>
                    <span class="separator">/</span>
                    <span><?php echo safeValue($relatorio_data['titulo']); ?></span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme"><i class="fas fa-sun theme-icon sun"></i><i class="fas fa-moon theme-icon moon"></i></button>
                                <?php include "../../includes/admin/notificacoes-admin.php" ?>

                <div class="header-actions">
                    <a href="relatorios-globais.php" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button class="btn btn-outline" onclick="window.print()"><i class="fas fa-print"></i> Imprimir</button>
                    <button class="btn btn-primary" onclick="baixarRelatorio()"><i class="fas fa-download"></i> Baixar PDF</button>
                </div>
            </div>
        </header>

        <!-- ===== CONTEÚDO DO RELATÓRIO ===== -->
        <div class="relatorio-visualizar-container">

            <!-- ===== CABEÇALHO ===== -->
            <div class="relatorio-cabecalho animate-fade-up">
                <div class="relatorio-titulo">
                    <h2><?php echo safeValue($relatorio_data['titulo']); ?></h2>
                    <div class="relatorio-meta-cabecalho">
                        <span class="meta-item"><i class="fas fa-tag"></i> <?php echo safeValue($relatorio_data['tipo_label']); ?></span>
                        <span class="meta-item"><i class="fas fa-calendar-alt"></i> Período: <?php echo safeValue($relatorio_data['periodo']); ?></span>
                        <span class="meta-item"><i class="fas fa-clock"></i> Gerado em: <?php echo formatDateTime($relatorio_data['data_geracao']); ?></span>
                        <span class="meta-item"><i class="fas fa-user"></i> Gerado por: <?php echo safeValue($relatorio_data['gerado_por']); ?></span>
                        <span class="meta-item"><i class="fas fa-file-pdf"></i> Formato: <?php echo safeValue($relatorio_data['formato']); ?></span>
                        <span class="meta-item"><i class="fas fa-weight-hanging"></i> Tamanho: <?php echo safeValue($relatorio_data['tamanho']); ?></span>
                    </div>
                </div>
                <div class="relatorio-status-cabecalho">
                    <span class="badge badge-status status-<?php echo $relatorio_data['status']; ?>">
                        <i class="fas fa-check-circle"></i> <?php echo $relatorio_data['status_label']; ?>
                    </span>
                </div>
            </div>

            <!-- ===== RESULTADOS ===== -->
            <div class="relatorio-resultados animate-fade-up" style="animation-delay: 0.1s;">
                <h3><i class="fas fa-chart-bar"></i> Resumo Executivo</h3>
                <div class="resultado-grid">
                    <?php foreach ($relatorio_data['conteudo']['indicadores'] as $indicador): ?>
                        <div class="resultado-card">
                            <div class="resultado-value"><?php echo safeValue($indicador['value']); ?></div>
                            <div class="resultado-label"><?php echo safeValue($indicador['label']); ?></div>
                            <div class="resultado-change <?php echo $indicador['trend']; ?>">
                                <i class="fas fa-arrow-<?php echo $indicador['trend'] === 'up' ? 'up' : 'down'; ?>"></i>
                                <?php echo safeValue($indicador['change']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ===== DESCRIÇÃO ===== -->
            <div class="relatorio-descricao animate-fade-up" style="animation-delay: 0.15s;">
                <p><?php echo safeValue($relatorio_data['descricao']); ?></p>
                <div class="relatorio-parametros-descricao">
                    <?php foreach ($relatorio_data['parametros'] as $param): ?>
                        <span class="parametro-item"><i class="fas fa-check-circle" style="color: #00FFA3;"></i> <?php echo $param; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ===== GRID DE DETALHES ===== -->
            <div class="relatorio-detalhes-grid">

                <!-- ===== DISTRIBUIÇÃO ===== -->
                <div class="detail-card animate-fade-up" style="animation-delay: 0.2s;">
                    <h3><i class="fas fa-pie-chart"></i> Distribuição por Categoria</h3>
                    <div class="distribuicao-list">
                        <?php foreach ($relatorio_data['conteudo']['distribuicao'] as $item): ?>
                            <div class="distribuicao-item">
                                <div class="distribuicao-info">
                                    <span class="distribuicao-cor" style="background: <?php echo $item['cor']; ?>;"></span>
                                    <span class="distribuicao-label"><?php echo $item['categoria']; ?></span>
                                </div>
                                <div class="distribuicao-value">
                                    <span class="distribuicao-numero"><?php echo $item['quantidade']; ?></span>
                                    <span class="distribuicao-percentual">
                                        <?php echo round(($item['quantidade'] / array_sum(array_column($relatorio_data['conteudo']['distribuicao'], 'quantidade'))) * 100); ?>%
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- ===== CRESCIMENTO MENSAL ===== -->
                <div class="detail-card animate-fade-up" style="animation-delay: 0.25s;">
                    <h3><i class="fas fa-chart-line"></i> Crescimento Mensal</h3>
                    <div class="crescimento-chart">
                        <?php 
                        $max_value = max(array_column($relatorio_data['conteudo']['crescimento_mensal'], 'total'));
                        foreach ($relatorio_data['conteudo']['crescimento_mensal'] as $item): 
                            $percent = ($item['total'] / $max_value) * 100;
                            $height = max(10, $percent);
                        ?>
                            <div class="bar-item">
                                <div class="bar-value"><?php echo $item['total']; ?></div>
                                <div class="bar-container">
                                    <div class="bar-fill" style="height: <?php echo $height; ?>%; background: linear-gradient(180deg, #00D2FF, #6C2BD9);"></div>
                                </div>
                                <div class="bar-label"><?php echo $item['mes']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- ===== TOP UTILIZADORES ===== -->
                <div class="detail-card animate-fade-up" style="animation-delay: 0.3s;">
                    <h3><i class="fas fa-trophy"></i> Top Utilizadores</h3>
                    <div class="top-utilizadores-list">
                        <?php foreach ($relatorio_data['conteudo']['top_utilizadores'] as $index => $user): ?>
                            <div class="top-user-item">
                                <div class="top-user-posicao">#<?php echo $index + 1; ?></div>
                                <div class="top-user-info">
                                    <span class="top-user-nome"><?php echo safeValue($user['nome']); ?></span>
                                    <span class="top-user-tipo"><?php echo safeValue($user['tipo']); ?></span>
                                </div>
                                <div class="top-user-stats">
                                    <span class="top-user-projetos"><i class="fas fa-project-diagram"></i> <?php echo $user['projetos']; ?></span>
                                    <span class="top-user-avaliacao"><i class="fas fa-star" style="color: #FFD93D;"></i> <?php echo $user['avaliacao']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- ===== CONCLUSÃO ===== -->
                <div class="detail-card animate-fade-up" style="animation-delay: 0.35s;">
                    <h3><i class="fas fa-check-circle"></i> Conclusão</h3>
                    <p class="conclusao-texto"><?php echo safeValue($relatorio_data['conteudo']['conclusao']); ?></p>
                </div>

            </div>

            <!-- ===== RODAPÉ ===== -->
            <div class="relatorio-rodape animate-fade-up" style="animation-delay: 0.4s;">
                <div class="rodape-info">
                    <span class="rodape-item"><i class="fas fa-file-alt"></i> Relatório gerado automaticamente</span>
                    <span class="rodape-item"><i class="fas fa-calendar-check"></i> <?php echo formatDateTime($relatorio_data['data_geracao']); ?></span>
                    <span class="rodape-item"><i class="fas fa-eye"></i> <?php echo $relatorio_data['visualizacoes']; ?> visualizações</span>
                    <span class="rodape-item"><i class="fas fa-download"></i> <?php echo $relatorio_data['downloads']; ?> downloads</span>
                </div>
                <div class="rodape-acoes">
                    <button class="btn btn-sm btn-outline" onclick="baixarRelatorio()"><i class="fas fa-download"></i> Baixar PDF</button>
                    <button class="btn btn-sm btn-outline" onclick="window.print()"><i class="fas fa-print"></i> Imprimir</button>
                    <a href="relatorios-globais.php" class="btn btn-sm btn-outline"><i class="fas fa-arrow-left"></i> Voltar</a>
                </div>
            </div>

        </div>
    </main>
</div>

<script src="../assets/js/main.js"></script>
<script>

// ===== TOGGLE SIDEBAR =====
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
            document.querySelectorAll('.modal.active').forEach(modal => fecharModal(modal.id));
        }
    });
    
    // Notificações
    const btnNotif = document.getElementById('btnNotificacoes');
    const dropdown = document.getElementById('notificacoesDropdown');
    if (btnNotif && dropdown) {
        btnNotif.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('active');
            if (dropdown.classList.contains('active')) carregarNotificacoes();
        });
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) dropdown.classList.remove('active');
        });
    }
    // Perfil
    const btnPerfil = document.getElementById('btnPerfil');
    const perfilDrop = document.getElementById('perfilDropdown');
    if (btnPerfil && perfilDrop) {
        btnPerfil.addEventListener('click', function(e) {
            e.stopPropagation();
            perfilDrop.classList.toggle('active');
        });
        document.addEventListener('click', function(e) {
            if (!perfilDrop.contains(e.target) && !btnPerfil.contains(e.target)) perfilDrop.classList.remove('active');
        });
    }
    // Theme
    const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
    document.getElementById('btnTheme')?.addEventListener('click', function() {
        const current = document.documentElement.getAttribute('data-theme');
        const newTheme = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('geonnexus-theme', newTheme);
        mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
    });
});

function toggleSidebarMobile(event) {
    if (event) { event.preventDefault(); event.stopPropagation(); }
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    if (sidebar) {
        sidebar.classList.toggle('open');
        if (overlay) overlay.classList.toggle('active');
        const menuBtn = document.getElementById('bottomMenuToggle');
        if (menuBtn) {
            menuBtn.querySelector('i').className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
        }
    }
}
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const menuBtn = document.getElementById('bottomMenuToggle');
    if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
        if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
            if (menuBtn) menuBtn.querySelector('i').className = 'fas fa-bars';
        }
    }
});

// ===== NOTIFICAÇÕES =====
function carregarNotificacoes() {
    const list = document.getElementById('notifList');
    if (!list) return;
    let html = '';
    mockNotificacoes.forEach(n => {
        html += `<div class="notificacao-item ${n.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${n.id})">
            <div class="notif-icon ${n.icon_class}"><i class="fas ${n.icon}"></i></div>
            <div class="notif-conteudo"><p>${n.mensagem}</p><span class="notif-tempo">${n.tempo}</span></div>
            ${!n.lida ? '<span class="notif-dot"></span>' : ''}
        </div>`;
    });
    list.innerHTML = html || `<div class="notificacao-vazia"><i class="fas fa-bell-slash"></i><p>Nenhuma notificação</p></div>`;
}

function marcarNotificacaoLida(id) {
    const notif = mockNotificacoes.find(n => n.id === id);
    if (notif) { notif.lida = true; atualizarBadgeNotif(); carregarNotificacoes(); mostrarToast('Notificação marcada como lida', 'info'); }
}

function marcarTodasLidas() {
    mockNotificacoes.forEach(n => n.lida = true);
    atualizarBadgeNotif(); carregarNotificacoes(); mostrarToast('Todas marcadas como lidas', 'success'); closeNotifications();
}

function atualizarBadgeNotif() {
    const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
    const badge = document.getElementById('notifBadge');
    const bottom = document.getElementById('bottomNotifBadge');
    if (badge) { badge.textContent = naoLidas; badge.style.display = naoLidas > 0 ? 'flex' : 'none'; }
    if (bottom) { bottom.textContent = naoLidas; bottom.style.display = naoLidas > 0 ? 'flex' : 'none'; }
}

function closeNotifications() { document.getElementById('notificacoesDropdown')?.classList.remove('active'); }

// ===== TOAST =====
function mostrarToast(mensagem, tipo = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;
    const icons = { success: 'fa-check-circle', error: 'fa-exclamation-circle', warning: 'fa-exclamation-triangle', info: 'fa-info-circle' };
    const colors = { success: '#00FFA3', error: '#FF6B6B', warning: '#F59E0B', info: '#00D2FF' };
    const toast = document.createElement('div');
    toast.className = 'toast toast-' + tipo;
    toast.innerHTML = `<div class="toast-content"><i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i><span>${mensagem}</span></div><button class="toast-close" onclick="this.parentElement.remove()">&times;</button>`;
    container.appendChild(toast);
    requestAnimationFrame(() => { toast.style.transform = 'translateX(0)'; toast.style.opacity = '1'; });
    setTimeout(() => {
        if (toast.parentElement) {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }, 4000);
}

// ===== AÇÕES =====
function baixarRelatorio() {
    mostrarToast('A baixar relatório...', 'info');
    setTimeout(() => {
        mostrarToast('Download iniciado!', 'success');
    }, 1500);
}

function fecharModal(id) {
    document.getElementById(id)?.classList.remove('active');
    document.body.style.overflow = '';
}
</script>

<style>
/* ===== VISUALIZAR RELATÓRIO - CSS COMPLETO ===== */
.relatorio-visualizar-container {
    display: flex;
    flex-direction: column;
    gap: var(--space-lg);
    max-width: 1100px;
    margin: 0 auto;
}

/* ===== CABEÇALHO ===== */
.relatorio-cabecalho {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--space-xl);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: var(--space-md);
}

.relatorio-cabecalho:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.relatorio-titulo h2 {
    font-family: var(--font-display);
    font-size: var(--text-h1);
    color: var(--text-primary);
    margin: 0 0 var(--space-sm) 0;
}

.relatorio-meta-cabecalho {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-md);
}

.relatorio-meta-cabecalho .meta-item {
    font-size: var(--text-sm);
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 4px;
}

.relatorio-meta-cabecalho .meta-item i {
    font-size: 0.8rem;
    color: var(--color-aurora);
}

.relatorio-status-cabecalho .badge-status {
    font-size: 0.85rem;
    padding: 4px 14px;
}

/* ===== RESULTADOS ===== */
.relatorio-resultados {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--space-xl);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
}

.relatorio-resultados:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.relatorio-resultados h3 {
    font-family: var(--font-title);
    font-size: var(--text-h3);
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.relatorio-resultados h3 i {
    color: var(--color-aurora);
}

.resultado-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: var(--space-md);
}

.resultado-card {
    text-align: center;
    padding: var(--space-md);
    background: var(--bg-primary);
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
}

.resultado-card:hover {
    border-color: var(--color-aurora);
    transform: translateY(-2px);
}

.resultado-card .resultado-value {
    font-family: var(--font-display);
    font-size: var(--text-h2);
    font-weight: 700;
    color: var(--text-primary);
}

.resultado-card .resultado-label {
    font-size: var(--text-sm);
    color: var(--text-muted);
    margin-top: 2px;
}

.resultado-card .resultado-change {
    font-size: var(--text-xs);
    font-weight: 600;
    margin-top: 4px;
}

.resultado-card .resultado-change.up {
    color: #00FFA3;
}

.resultado-card .resultado-change.down {
    color: #FF6B6B;
}

/* ===== DESCRIÇÃO ===== */
.relatorio-descricao {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--space-xl);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
}

.relatorio-descricao:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.relatorio-descricao p {
    font-size: var(--text-body);
    color: var(--text-secondary);
    line-height: 1.8;
    margin: 0 0 var(--space-md) 0;
}

.relatorio-parametros-descricao {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-sm);
}

.relatorio-parametros-descricao .parametro-item {
    font-size: var(--text-xs);
    color: var(--text-muted);
    background: var(--bg-input);
    padding: 2px 12px;
    border-radius: var(--radius-full);
    border: 1px solid var(--border-color);
}

.relatorio-parametros-descricao .parametro-item i {
    margin-right: 4px;
}

/* ===== DETAILS GRID ===== */
.relatorio-detalhes-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-lg);
}

.detail-card {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--space-lg);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
}

.detail-card:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.detail-card h3 {
    font-family: var(--font-title);
    font-size: var(--text-h4);
    color: var(--text-primary);
    margin-bottom: var(--space-md);
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.detail-card h3 i {
    color: var(--color-aurora);
}

/* ===== DISTRIBUIÇÃO ===== */
.distribuicao-list {
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}

.distribuicao-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-sm) var(--space-md);
    background: var(--bg-primary);
    border-radius: var(--radius-sm);
    border: 1px solid var(--border-color);
}

.distribuicao-item .distribuicao-info {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.distribuicao-item .distribuicao-cor {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    display: inline-block;
}

.distribuicao-item .distribuicao-label {
    font-size: var(--text-sm);
    color: var(--text-secondary);
}

.distribuicao-item .distribuicao-value {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.distribuicao-item .distribuicao-numero {
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--text-primary);
}

.distribuicao-item .distribuicao-percentual {
    font-size: var(--text-xs);
    color: var(--text-muted);
    background: var(--bg-input);
    padding: 1px 8px;
    border-radius: var(--radius-full);
}

/* ===== CRESCIMENTO ===== */
.crescimento-chart {
    display: flex;
    align-items: flex-end;
    justify-content: space-around;
    height: 200px;
    padding: var(--space-sm) 0;
    gap: 4px;
}

.bar-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
    height: 100%;
}

.bar-item .bar-value {
    font-size: var(--text-xs);
    color: var(--text-muted);
    margin-bottom: 4px;
}

.bar-item .bar-container {
    flex: 1;
    width: 100%;
    max-width: 40px;
    min-height: 10px;
    background: var(--bg-input);
    border-radius: 4px;
    overflow: hidden;
    display: flex;
    align-items: flex-end;
    justify-content: center;
}

.bar-item .bar-fill {
    width: 100%;
    border-radius: 4px;
    transition: height 0.6s ease;
    min-height: 4px;
}

.bar-item .bar-label {
    font-size: var(--text-xs);
    color: var(--text-muted);
    margin-top: 4px;
    text-align: center;
}

/* ===== TOP UTILIZADORES ===== */
.top-utilizadores-list {
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}

.top-user-item {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-sm) var(--space-md);
    background: var(--bg-primary);
    border-radius: var(--radius-sm);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
}

.top-user-item:hover {
    border-color: var(--color-aurora);
}

.top-user-item .top-user-posicao {
    font-family: var(--font-display);
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--text-muted);
    min-width: 30px;
}

.top-user-item .top-user-info {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.top-user-item .top-user-nome {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--text-primary);
}

.top-user-item .top-user-tipo {
    font-size: var(--text-xs);
    color: var(--text-muted);
}

.top-user-item .top-user-stats {
    display: flex;
    gap: var(--space-md);
}

.top-user-item .top-user-projetos,
.top-user-item .top-user-avaliacao {
    font-size: var(--text-xs);
    color: var(--text-muted);
}

/* ===== CONCLUSÃO ===== */
.conclusao-texto {
    font-size: var(--text-body);
    color: var(--text-secondary);
    line-height: 1.8;
    margin: 0;
    padding: var(--space-md);
    background: var(--bg-input);
    border-radius: var(--radius-md);
    border-left: 4px solid var(--color-aurora);
}

/* ===== RODAPÉ ===== */
.relatorio-rodape {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--space-lg);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: var(--space-md);
}

.relatorio-rodape:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.relatorio-rodape .rodape-info {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-md);
}

.relatorio-rodape .rodape-item {
    font-size: var(--text-sm);
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 4px;
}

.relatorio-rodape .rodape-item i {
    font-size: 0.8rem;
    color: var(--color-aurora);
}

.relatorio-rodape .rodape-acoes {
    display: flex;
    gap: var(--space-sm);
    flex-wrap: wrap;
}

/* ========================================== */
/* BADGES                                     */
/* ========================================== */

.badge-status { font-size: 0.7rem; padding: 3px 12px; border-radius: var(--radius-full); display: inline-flex; align-items: center; gap: 4px; }
.badge-status.status-concluido { background: rgba(0,255,163,0.15); color: #00FFA3; }
.badge-status.status-gerando { background: rgba(0,210,255,0.15); color: #00D2FF; }
.badge-status.status-falha { background: rgba(255,107,107,0.15); color: #FF6B6B; }
.badge-status.status-pendente { background: rgba(255,217,61,0.15); color: #FFD93D; }

/* ========================================== */
/* RESPONSIVIDADE                             */
/* ========================================== */

@media (max-width: 1024px) {
    .resultado-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    .relatorio-detalhes-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .relatorio-cabecalho {
        flex-direction: column;
        align-items: stretch;
        padding: var(--space-md);
    }
    .relatorio-titulo h2 {
        font-size: var(--text-h2);
    }
    .relatorio-meta-cabecalho {
        flex-direction: column;
        gap: var(--space-xs);
    }
    .resultado-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: var(--space-sm);
    }
    .resultado-card .resultado-value {
        font-size: var(--text-h3);
    }
    .relatorio-detalhes-grid {
        grid-template-columns: 1fr;
    }
    .detail-card {
        padding: var(--space-md);
    }
    .crescimento-chart {
        height: 150px;
    }
    .relatorio-rodape {
        flex-direction: column;
        align-items: stretch;
        padding: var(--space-md);
    }
    .relatorio-rodape .rodape-info {
        flex-direction: column;
        gap: var(--space-xs);
    }
    .relatorio-rodape .rodape-acoes {
        justify-content: center;
    }
    .top-user-item {
        flex-wrap: wrap;
    }
    .top-user-item .top-user-stats {
        width: 100%;
        justify-content: flex-start;
        padding-left: 30px;
    }
    .header-actions {
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
    }
    .relatorio-descricao {
        padding: var(--space-md);
    }
    .relatorio-resultados {
        padding: var(--space-md);
    }
}

@media (max-width: 480px) {
    .resultado-grid {
        grid-template-columns: 1fr 1fr;
        gap: var(--space-xs);
    }
    .resultado-card {
        padding: var(--space-sm);
    }
    .resultado-card .resultado-value {
        font-size: var(--text-h4);
    }
    .resultado-card .resultado-label {
        font-size: var(--text-xs);
    }
    .crescimento-chart {
        height: 120px;
    }
    .bar-item .bar-container {
        max-width: 20px;
    }
    .bar-item .bar-label {
        font-size: 0.55rem;
    }
    .top-user-item .top-user-stats {
        flex-direction: column;
        gap: 2px;
        padding-left: 0;
    }
    .top-user-item {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--space-xs);
    }
    .top-user-item .top-user-posicao {
        min-width: auto;
    }
    .distribuicao-item {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--space-xs);
    }
    .distribuicao-item .distribuicao-value {
        width: 100%;
        justify-content: space-between;
    }
    .conclusao-texto {
        padding: var(--space-sm);
        font-size: var(--text-sm);
    }
    .relatorio-cabecalho {
        padding: var(--space-sm);
    }
    .relatorio-rodape .rodape-acoes {
        flex-direction: column;
        align-items: stretch;
    }
    .relatorio-rodape .rodape-acoes .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>
</body>
</html>