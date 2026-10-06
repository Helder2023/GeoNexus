<?php
// painel/admin/logs-auditoria.php - Logs de Auditoria
include "../../includes/admin/notificacoes-admin-count.php";

$titulo_pagina = 'Logs de Auditoria';
$pagina_atual = 'logs-auditoria';

// Dados mockados
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Logs de Auditoria
$logs = [
    [
        'id' => 1,
        'acao' => 'Login',
        'descricao' => 'Login realizado com sucesso',
        'usuario' => 'Administrador Master',
        'usuario_avatar' => 'avatar-admin.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.100',
        'data' => '2026-02-18 09:00:00',
        'modulo' => 'Autenticação',
        'tipo' => 'acesso',
        'detalhes' => 'Navegador: Chrome 122.0 / Windows 11'
    ],
    [
        'id' => 2,
        'acao' => 'Criação de Utilizador',
        'descricao' => 'Novo administrador criado: João Silva',
        'usuario' => 'Administrador Master',
        'usuario_avatar' => 'avatar-admin.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.100',
        'data' => '2026-02-18 09:15:00',
        'modulo' => 'Utilizadores',
        'tipo' => 'criacao',
        'detalhes' => 'ID do utilizador: 12 | Email: joao.silva@admin.com'
    ],
    [
        'id' => 3,
        'acao' => 'Atualização de Empresa',
        'descricao' => 'Dados da empresa "Construtora ABC" atualizados',
        'usuario' => 'Administrador Master',
        'usuario_avatar' => 'avatar-admin.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.100',
        'data' => '2026-02-18 10:30:00',
        'modulo' => 'Empresas',
        'tipo' => 'edicao',
        'detalhes' => 'Campos alterados: email, telefone, endereço'
    ],
    [
        'id' => 4,
        'acao' => 'Validação de Profissional',
        'descricao' => 'Profissional "Carlos Mendes" validado com sucesso',
        'usuario' => 'Administrador Master',
        'usuario_avatar' => 'avatar-admin.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.101',
        'data' => '2026-02-18 11:00:00',
        'modulo' => 'Profissionais',
        'tipo' => 'validacao',
        'detalhes' => 'ID do profissional: 1 | Plano: Pro'
    ],
    [
        'id' => 5,
        'acao' => 'Login Falhado',
        'descricao' => 'Tentativa de login com credenciais inválidas',
        'usuario' => 'Desconhecido',
        'usuario_avatar' => 'avatar-default.png',
        'usuario_tipo' => 'Não autenticado',
        'ip' => '192.168.1.150',
        'data' => '2026-02-18 08:45:00',
        'modulo' => 'Autenticação',
        'tipo' => 'falha',
        'detalhes' => 'Email: desconhecido@teste.com | Senha incorreta'
    ],
    [
        'id' => 6,
        'acao' => 'Exclusão de Projeto',
        'descricao' => 'Projeto "Levantamento GIS" excluído permanentemente',
        'usuario' => 'Administrador Master',
        'usuario_avatar' => 'avatar-admin.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.102',
        'data' => '2026-02-18 14:20:00',
        'modulo' => 'Projetos',
        'tipo' => 'exclusao',
        'detalhes' => 'ID do projeto: 3 | Motivo: Projeto duplicado'
    ],
    [
        'id' => 7,
        'acao' => 'Alteração de Plano',
        'descricao' => 'Plano da instituição "Instituto Técnico de Luanda" alterado',
        'usuario' => 'Administrador Master',
        'usuario_avatar' => 'avatar-admin.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.103',
        'data' => '2026-02-18 15:00:00',
        'modulo' => 'Instituições',
        'tipo' => 'edicao',
        'detalhes' => 'Plano anterior: Institucional | Novo plano: Institucional Pro'
    ],
    [
        'id' => 8,
        'acao' => 'Exportação de Dados',
        'descricao' => 'Exportação da lista de utilizadores em formato CSV',
        'usuario' => 'Administrador Master',
        'usuario_avatar' => 'avatar-admin.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.104',
        'data' => '2026-02-18 16:30:00',
        'modulo' => 'Utilizadores',
        'tipo' => 'exportacao',
        'detalhes' => 'Formato: CSV | Total de registos: 156'
    ],
    [
        'id' => 9,
        'acao' => 'Suspensão de Utilizador',
        'descricao' => 'Utilizador "Rui Oliveira" suspenso por inatividade',
        'usuario' => 'Administrador Master',
        'usuario_avatar' => 'avatar-admin.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.105',
        'data' => '2026-02-18 17:00:00',
        'modulo' => 'Utilizadores',
        'tipo' => 'suspensao',
        'detalhes' => 'ID do utilizador: 5 | Motivo: Inatividade por 90 dias'
    ],
    [
        'id' => 10,
        'acao' => 'Atualização de Perfil',
        'descricao' => 'Perfil do administrador "Ana Oliveira" atualizado',
        'usuario' => 'Ana Oliveira',
        'usuario_avatar' => 'avatar-4.png',
        'usuario_tipo' => 'Administrador',
        'ip' => '192.168.1.106',
        'data' => '2026-02-18 18:00:00',
        'modulo' => 'Perfil',
        'tipo' => 'edicao',
        'detalhes' => 'Campos alterados: telefone, morada'
    ],
    [
        'id' => 11,
        'acao' => 'Criação de Ticket',
        'descricao' => 'Novo ticket de suporte aberto: "Problema com login"',
        'usuario' => 'Carlos Mendes',
        'usuario_avatar' => 'avatar-1.png',
        'usuario_tipo' => 'Profissional',
        'ip' => '192.168.1.107',
        'data' => '2026-02-18 19:30:00',
        'modulo' => 'Suporte',
        'tipo' => 'criacao',
        'detalhes' => 'Ticket #1 | Prioridade: Alta | Categoria: Suporte Técnico'
    ],
    [
        'id' => 12,
        'acao' => 'Pagamento Confirmado',
        'descricao' => 'Pagamento de Kz 25.000 confirmado para a fatura #FAT-2026-001',
        'usuario' => 'Sistema',
        'usuario_avatar' => 'avatar-system.png',
        'usuario_tipo' => 'Sistema',
        'ip' => '192.168.1.1',
        'data' => '2026-02-18 20:00:00',
        'modulo' => 'Financeiro',
        'tipo' => 'pagamento',
        'detalhes' => 'Método: MBWay | Referência: #PAY-2026-001'
    ]
];

// Estatísticas
$total_logs = count($logs);
$logs_hoje = count(array_filter($logs, function($l) { 
    return date('Y-m-d', strtotime($l['data'])) === date('Y-m-d'); 
}));
$logs_semana = count(array_filter($logs, function($l) { 
    return date('W', strtotime($l['data'])) === date('W'); 
}));
$logs_mes = count(array_filter($logs, function($l) { 
    return date('m', strtotime($l['data'])) === date('m'); 
}));

// Tipos de log
$tipos_log = array_unique(array_column($logs, 'tipo'));
sort($tipos_log);

// Módulos
$modulos = array_unique(array_column($logs, 'modulo'));
sort($modulos);

// Tipos de utilizador
$tipos_utilizador = array_unique(array_column($logs, 'usuario_tipo'));
sort($tipos_utilizador);

function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i:s', strtotime($datetime));
}

function getTipoIcon($tipo) {
    $icones = [
        'acesso' => 'fa-sign-in-alt',
        'criacao' => 'fa-plus-circle',
        'edicao' => 'fa-edit',
        'exclusao' => 'fa-trash-alt',
        'validacao' => 'fa-check-circle',
        'falha' => 'fa-exclamation-triangle',
        'suspensao' => 'fa-pause-circle',
        'exportacao' => 'fa-file-export',
        'pagamento' => 'fa-money-bill-wave',
        'login' => 'fa-sign-in-alt'
    ];
    return $icones[$tipo] ?? 'fa-circle';
}

function getTipoColor($tipo) {
    $cores = [
        'acesso' => '#00D2FF',
        'criacao' => '#00FFA3',
        'edicao' => '#FFD93D',
        'exclusao' => '#FF6B6B',
        'validacao' => '#00FFA3',
        'falha' => '#FF6B6B',
        'suspensao' => '#F59E0B',
        'exportacao' => '#6C2BD9',
        'pagamento' => '#00FFA3',
        'login' => '#00D2FF'
    ];
    return $cores[$tipo] ?? '#6B7A8F';
}

function getTipoLabel($tipo) {
    $labels = [
        'acesso' => 'Acesso',
        'criacao' => 'Criação',
        'edicao' => 'Edição',
        'exclusao' => 'Exclusão',
        'validacao' => 'Validação',
        'falha' => 'Falha',
        'suspensao' => 'Suspensão',
        'exportacao' => 'Exportação',
        'pagamento' => 'Pagamento',
        'login' => 'Login'
    ];
    return $labels[$tipo] ?? ucfirst($tipo);
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
    ['icon' => 'fa-history', 'label' => 'Logs', 'link' => 'logs-auditoria.php', 'active' => true],
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
                    <?php if ($item['label'] === 'Logs'): ?>
                        <span class="badge badge-primary"><?php echo $total_logs; ?></span>
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
                    <i class="fas fa-history icon"></i>
                    Logs de Auditoria
                    <span class="badge badge-primary" style="font-size: 0.7rem; margin-left: 8px;"><?php echo $total_logs; ?> registos</span>
                </h1>
                <p class="breadcrumb"><a href="index.php">Dashboard</a> <span class="separator">/</span> <span>Logs de Auditoria</span></p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme"><i class="fas fa-sun theme-icon sun"></i><i class="fas fa-moon theme-icon moon"></i></button>
                                <?php include "../../includes/admin/notificacoes-admin.php" ?>

                <div class="header-actions">
                    <button class="btn btn-outline" onclick="exportarLogs()"><i class="fas fa-file-export"></i> Exportar</button>
                    <button class="btn btn-outline" onclick="limparLogs()"><i class="fas fa-trash-alt"></i> Limpar Logs</button>
                </div>
            </div>
        </header>

        <section class="stats-grid animate-fade-up">
            <div class="stat-card"><div class="icon aurora"><i class="fas fa-list"></i></div><div class="value"><?php echo $total_logs; ?></div><div class="label">Total de Logs</div><div class="trend up"><i class="fas fa-arrow-up"></i> 25.3%</div></div>
            <div class="stat-card"><div class="icon green"><i class="fas fa-calendar-day"></i></div><div class="value"><?php echo $logs_hoje; ?></div><div class="label">Hoje</div><div class="trend up"><i class="fas fa-arrow-up"></i> 12.5%</div></div>
            <div class="stat-card"><div class="icon blue"><i class="fas fa-calendar-week"></i></div><div class="value"><?php echo $logs_semana; ?></div><div class="label">Esta Semana</div><div class="trend up"><i class="fas fa-arrow-up"></i> 8.2%</div></div>
            <div class="stat-card"><div class="icon yellow"><i class="fas fa-calendar-alt"></i></div><div class="value"><?php echo $logs_mes; ?></div><div class="label">Este Mês</div><div class="trend down"><i class="fas fa-arrow-down"></i> 3.1%</div></div>
        </section>

        <div class="filter-bar-admin animate-fade-up">
            <div class="filter-group"><label><i class="fas fa-search"></i></label><input type="text" id="searchLog" placeholder="Pesquisar logs..." oninput="aplicarFiltros()"></div>
            <div class="filter-group"><label>Módulo</label><select id="filterModulo" onchange="aplicarFiltros()"><option value="">Todos</option><?php foreach ($modulos as $m): ?><option value="<?php echo $m; ?>"><?php echo $m; ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Tipo</label><select id="filterTipo" onchange="aplicarFiltros()"><option value="">Todos</option><?php foreach ($tipos_log as $t): ?><option value="<?php echo $t; ?>"><?php echo getTipoLabel($t); ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Utilizador</label><select id="filterUsuario" onchange="aplicarFiltros()"><option value="">Todos</option><?php foreach ($tipos_utilizador as $u): ?><option value="<?php echo $u; ?>"><?php echo $u; ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Data</label><input type="date" id="filterData" onchange="aplicarFiltros()"></div>
            <div class="filter-actions"><button class="btn btn-sm btn-primary" onclick="aplicarFiltros()"><i class="fas fa-filter"></i> Filtrar</button><button class="btn btn-sm btn-outline" onclick="limparFiltros()"><i class="fas fa-undo"></i> Limpar</button></div>
            <span class="resultados-info" id="resultadosInfo"><?php echo $total_logs; ?> resultados</span>
        </div>

        <div class="logs-container">
            <div class="table-responsive">
                <table class="table-logs" id="tabelaLogs">
                    <thead>
                        <tr>
                            <th style="width: 70px;">#</th>
                            <th style="width: 180px;">Data/Hora</th>
                            <th style="width: 150px;">Utilizador</th>
                            <th style="width: 150px;">Módulo</th>
                            <th style="width: 120px;">Ação</th>
                            <th>Tipo</th>
                            <th style="width: 140px;">IP</th>
                            <th style="width: 60px;">Detalhes</th>
                        </tr>
                    </thead>
                    <tbody id="logsBody">
                        <?php foreach ($logs as $log): ?>
                            <tr data-id="<?php echo $log['id']; ?>"
                                data-modulo="<?php echo $log['modulo']; ?>"
                                data-tipo="<?php echo $log['tipo']; ?>"
                                data-usuario="<?php echo $log['usuario_tipo']; ?>"
                                data-data="<?php echo date('Y-m-d', strtotime($log['data'])); ?>"
                                data-acao="<?php echo strtolower($log['acao']); ?>"
                                data-descricao="<?php echo strtolower($log['descricao']); ?>"
                                onclick="verDetalheLog(<?php echo $log['id']; ?>)">
                                <td><?php echo $log['id']; ?></td>
                                <td>
                                    <span class="data-hora">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php echo formatDateTime($log['data']); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="usuario-cell">
                                        <img src="../../assets/images/<?php echo $log['usuario_avatar']; ?>" alt="<?php echo $log['usuario']; ?>" onerror="this.src='<?php echo getAvatarUrl($log['usuario']); ?>'">
                                        <div>
                                            <strong><?php echo $log['usuario']; ?></strong>
                                            <span class="usuario-tipo"><?php echo $log['usuario_tipo']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-modulo">
                                        <i class="fas fa-cube"></i> <?php echo $log['modulo']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="acao-nome"><?php echo $log['acao']; ?></span>
                                </td>
                                <td>
                                    <span class="badge badge-tipo" style="background: <?php echo getTipoColor($log['tipo']); ?>20; color: <?php echo getTipoColor($log['tipo']); ?>; border-color: <?php echo getTipoColor($log['tipo']); ?>;">
                                        <i class="fas <?php echo getTipoIcon($log['tipo']); ?>"></i>
                                        <?php echo getTipoLabel($log['tipo']); ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="ip-address"><i class="fas fa-network-wired"></i> <?php echo $log['ip']; ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); verDetalheLog(<?php echo $log['id']; ?>)">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="table-pagination" id="paginacaoLogs">
                <button class="page-btn prev" onclick="mudarPagina('prev')" disabled><i class="fas fa-chevron-left"></i></button>
                <span class="page-info">1 de 1</span>
                <button class="page-btn next" onclick="mudarPagina('next')" disabled><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </main>
</div>

<!-- MODAL DETALHE LOG -->
<div class="modal" id="modalDetalheLog">
    <div class="modal-overlay" onclick="fecharModal('modalDetalheLog')"></div>
    <div class="modal-content" style="max-width: 550px;">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fas fa-info-circle"></i> Detalhe do Log</h3>
            <button class="modal-close" onclick="fecharModal('modalDetalheLog')">&times;</button>
        </div>
        <div class="modal-body" id="detalheLogBody"></div>
    </div>
</div>

<!-- MODAL CONFIRMAÇÃO -->
<div class="modal" id="modalConfirmacao">
    <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
    <div class="modal-content" style="max-width: 420px;">
        <div class="modal-header"><h3 class="modal-title" id="confirmacaoTitulo"><i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar</h3><button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button></div>
        <div class="modal-body" id="confirmacaoCorpo"><p>Tem certeza?</p></div>
        <div class="modal-footer"><button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button><button class="btn btn-danger" id="confirmacaoBtn" onclick="executarConfirmacao()"><i class="fas fa-check"></i> Confirmar</button></div>
    </div>
</div>

<script src="../assets/js/main.js"></script>
<script>
const logsData = <?php echo json_encode($logs); ?>;

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
    const total = document.querySelectorAll('#tabelaLogs tbody tr').length;
    if (total > 0) { totalItensVisiveis = total; atualizarPaginacao(total); }
    
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
    // Search debounce
    const searchInput = document.getElementById('searchLog');
    if (searchInput) {
        let timeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(aplicarFiltros, 300);
        });
    }
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

// ===== FILTROS E PAGINAÇÃO =====
let paginaAtual = 1, itensPorPagina = 10, totalItensVisiveis = 0;

function aplicarFiltros() {
    const search = document.getElementById('searchLog').value.toLowerCase().trim();
    const modulo = document.getElementById('filterModulo').value;
    const tipo = document.getElementById('filterTipo').value;
    const usuario = document.getElementById('filterUsuario').value;
    const data = document.getElementById('filterData').value;
    const rows = document.querySelectorAll('#tabelaLogs tbody tr');
    let visiveis = 0;
    rows.forEach(row => {
        const acao = row.dataset.acao || '';
        const descricao = row.dataset.descricao || '';
        const rowModulo = row.dataset.modulo || '';
        const rowTipo = row.dataset.tipo || '';
        const rowUsuario = row.dataset.usuario || '';
        const rowData = row.dataset.data || '';
        let show = true;
        if (search) show = acao.includes(search) || descricao.includes(search);
        if (show && modulo) show = rowModulo === modulo;
        if (show && tipo) show = rowTipo === tipo;
        if (show && usuario) show = rowUsuario === usuario;
        if (show && data) show = rowData === data;
        row.style.display = show ? '' : 'none';
        if (show) visiveis++;
    });
    totalItensVisiveis = visiveis;
    document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
    paginaAtual = 1;
    if (totalItensVisiveis > 0) { atualizarPaginacao(totalItensVisiveis); } 
    else {
        document.getElementById('paginacaoLogs').style.display = 'none';
        document.querySelector('#tabelaLogs tbody').innerHTML = `<tr><td colspan="8" class="empty-state"><i class="fas fa-history" style="font-size: 2rem; color: var(--text-muted);"></i><p>Nenhum log encontrado</p></td></tr>`;
    }
}

function limparFiltros() {
    document.getElementById('searchLog').value = '';
    document.getElementById('filterModulo').value = '';
    document.getElementById('filterTipo').value = '';
    document.getElementById('filterUsuario').value = '';
    document.getElementById('filterData').value = '';
    document.querySelectorAll('#tabelaLogs tbody tr').forEach(row => row.style.display = '');
    totalItensVisiveis = document.querySelectorAll('#tabelaLogs tbody tr').length;
    document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
    if (document.querySelector('#tabelaLogs tbody .empty-state')) location.reload();
    paginaAtual = 1;
    if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
}

function atualizarPaginacao(total) {
    const totalPaginas = Math.ceil(total / itensPorPagina);
    const container = document.getElementById('paginacaoLogs');
    if (!container) return;
    const prevBtn = container.querySelector('.prev');
    const nextBtn = container.querySelector('.next');
    const info = container.querySelector('.page-info');
    container.querySelectorAll('.page-btn:not(.prev):not(.next)').forEach(b => b.remove());
    if (totalPaginas <= 1) { container.style.display = 'none'; mostrarPagina(1); return; }
    container.style.display = 'flex';
    const maxVisible = 5;
    let startPage = Math.max(1, paginaAtual - 2);
    let endPage = Math.min(totalPaginas, startPage + maxVisible - 1);
    if (endPage - startPage < maxVisible - 1) startPage = Math.max(1, endPage - maxVisible + 1);
    if (startPage > 1) {
        const firstBtn = document.createElement('button');
        firstBtn.className = 'page-btn'; firstBtn.textContent = '1';
        firstBtn.onclick = function() { irParaPagina(1); };
        container.insertBefore(firstBtn, info);
        if (startPage > 2) { const dots = document.createElement('span'); dots.className = 'page-dots'; dots.textContent = '…'; container.insertBefore(dots, info); }
    }
    for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement('button');
        btn.className = 'page-btn' + (i === paginaAtual ? ' active' : '');
        btn.textContent = i;
        btn.onclick = function() { irParaPagina(i); };
        container.insertBefore(btn, info);
    }
    if (endPage < totalPaginas) {
        if (endPage < totalPaginas - 1) { const dots = document.createElement('span'); dots.className = 'page-dots'; dots.textContent = '…'; container.insertBefore(dots, info); }
        const lastBtn = document.createElement('button');
        lastBtn.className = 'page-btn'; lastBtn.textContent = totalPaginas;
        lastBtn.onclick = function() { irParaPagina(totalPaginas); };
        container.insertBefore(lastBtn, info);
    }
    prevBtn.disabled = paginaAtual <= 1;
    nextBtn.disabled = paginaAtual >= totalPaginas;
    info.textContent = `${paginaAtual} de ${totalPaginas}`;
    mostrarPagina(paginaAtual);
}

function mostrarPagina(page) {
    const rows = document.querySelectorAll('#tabelaLogs tbody tr:not([style*="display: none"])');
    const start = (page - 1) * itensPorPagina;
    const end = start + itensPorPagina;
    document.querySelectorAll('#tabelaLogs tbody tr').forEach(row => { if (row.style.display !== 'none') row.style.display = 'none'; });
    rows.forEach((row, index) => { if (index >= start && index < end) row.style.display = ''; });
}

function irParaPagina(page) {
    paginaAtual = page;
    if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
    document.querySelector('.logs-container')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function mudarPagina(direcao) {
    const totalPaginas = Math.ceil(totalItensVisiveis / itensPorPagina);
    if (direcao === 'prev' && paginaAtual > 1) irParaPagina(paginaAtual - 1);
    else if (direcao === 'next' && paginaAtual < totalPaginas) irParaPagina(paginaAtual + 1);
}

// ===== VER DETALHE LOG =====
function verDetalheLog(id) {
    const log = logsData.find(l => l.id === id);
    if (!log) return;
    const body = document.getElementById('detalheLogBody');
    body.innerHTML = `
        <div class="log-detalhe-item">
            <span class="log-detalhe-label"><i class="fas fa-hashtag"></i> ID</span>
            <span class="log-detalhe-value">#${log.id}</span>
        </div>
        <div class="log-detalhe-item">
            <span class="log-detalhe-label"><i class="fas fa-clock"></i> Data/Hora</span>
            <span class="log-detalhe-value">${formatDateTime(log.data)}</span>
        </div>
        <div class="log-detalhe-item">
            <span class="log-detalhe-label"><i class="fas fa-user"></i> Utilizador</span>
            <span class="log-detalhe-value">${log.usuario} <span style="font-size: var(--text-xs); color: var(--text-muted);">(${log.usuario_tipo})</span></span>
        </div>
        <div class="log-detalhe-item">
            <span class="log-detalhe-label"><i class="fas fa-cube"></i> Módulo</span>
            <span class="log-detalhe-value">${log.modulo}</span>
        </div>
        <div class="log-detalhe-item">
            <span class="log-detalhe-label"><i class="fas fa-tag"></i> Ação</span>
            <span class="log-detalhe-value">${log.acao}</span>
        </div>
        <div class="log-detalhe-item">
            <span class="log-detalhe-label"><i class="fas fa-info-circle"></i> Tipo</span>
            <span class="log-detalhe-value"><span class="badge badge-tipo" style="background: ${getTipoColor(log.tipo)}20; color: ${getTipoColor(log.tipo)}; border-color: ${getTipoColor(log.tipo)};"><i class="fas ${getTipoIcon(log.tipo)}"></i> ${getTipoLabel(log.tipo)}</span></span>
        </div>
        <div class="log-detalhe-item">
            <span class="log-detalhe-label"><i class="fas fa-network-wired"></i> IP</span>
            <span class="log-detalhe-value">${log.ip}</span>
        </div>
        <div class="log-detalhe-item" style="flex-direction: column; align-items: flex-start; gap: 4px;">
            <span class="log-detalhe-label" style="width: 100%;"><i class="fas fa-file-alt"></i> Descrição</span>
            <span class="log-detalhe-value" style="text-align: left; width: 100%;">${log.descricao}</span>
        </div>
        <div class="log-detalhe-item" style="flex-direction: column; align-items: flex-start; gap: 4px;">
            <span class="log-detalhe-label" style="width: 100%;"><i class="fas fa-list-ul"></i> Detalhes</span>
            <span class="log-detalhe-value" style="text-align: left; width: 100%; font-size: var(--text-sm); color: var(--text-muted);">${log.detalhes}</span>
        </div>
    `;
    document.getElementById('modalDetalheLog').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function getTipoIcon(tipo) {
    const icones = {
        'acesso': 'fa-sign-in-alt',
        'criacao': 'fa-plus-circle',
        'edicao': 'fa-edit',
        'exclusao': 'fa-trash-alt',
        'validacao': 'fa-check-circle',
        'falha': 'fa-exclamation-triangle',
        'suspensao': 'fa-pause-circle',
        'exportacao': 'fa-file-export',
        'pagamento': 'fa-money-bill-wave',
        'login': 'fa-sign-in-alt'
    };
    return icones[tipo] || 'fa-circle';
}

function getTipoColor(tipo) {
    const cores = {
        'acesso': '#00D2FF',
        'criacao': '#00FFA3',
        'edicao': '#FFD93D',
        'exclusao': '#FF6B6B',
        'validacao': '#00FFA3',
        'falha': '#FF6B6B',
        'suspensao': '#F59E0B',
        'exportacao': '#6C2BD9',
        'pagamento': '#00FFA3',
        'login': '#00D2FF'
    };
    return cores[tipo] || '#6B7A8F';
}

function getTipoLabel(tipo) {
    const labels = {
        'acesso': 'Acesso',
        'criacao': 'Criação',
        'edicao': 'Edição',
        'exclusao': 'Exclusão',
        'validacao': 'Validação',
        'falha': 'Falha',
        'suspensao': 'Suspensão',
        'exportacao': 'Exportação',
        'pagamento': 'Pagamento',
        'login': 'Login'
    };
    return labels[tipo] || ucfirst(tipo);
}

function formatDateTime(dt) {
    if (!dt) return 'N/A';
    const d = new Date(dt.replace(' ', 'T'));
    return String(d.getDate()).padStart(2,'0') + '/' + String(d.getMonth()+1).padStart(2,'0') + '/' + d.getFullYear() + ' ' + String(d.getHours()).padStart(2,'0') + ':' + String(d.getMinutes()).padStart(2,'0') + ':' + String(d.getSeconds()).padStart(2,'0');
}

function getAvatarUrl(name) {
    return 'https://ui-avatars.com/api/?name=' + encodeURIComponent(name) + '&background=6C2BD9&color=fff&size=80';
}

function exportarLogs() {
    mostrarToast('Exportando logs...', 'info');
    setTimeout(() => mostrarToast('Exportação concluída!', 'success'), 1500);
}

function limparLogs() {
    mostrarConfirmacao('Limpar Logs', 'Tem certeza que deseja limpar todos os logs de auditoria?<br><small style="color: #EF4444;">Esta ação não pode ser desfeita!</small>', function() {
        mostrarToast('Logs limpos com sucesso!', 'success');
        fecharModal('modalConfirmacao');
    });
}

// ===== CONFIRMAÇÃO =====
let acaoConfirmacao = null;

function mostrarConfirmacao(titulo, mensagem, callback) {
    document.getElementById('confirmacaoTitulo').innerHTML = `<i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> ${titulo}`;
    document.getElementById('confirmacaoCorpo').innerHTML = `<p>${mensagem}</p>`;
    document.getElementById('confirmacaoBtn').onclick = callback;
    document.getElementById('modalConfirmacao').classList.add('active');
}

function executarConfirmacao() {
    if (typeof acaoConfirmacao === 'function') { acaoConfirmacao(); acaoConfirmacao = null; }
}

// ===== MODAIS =====
function abrirModal(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden';
}

function fecharModal(id) {
    document.getElementById(id)?.classList.remove('active');
    document.body.style.overflow = '';
}
</script>

<style>
/* ===== LOGS - CSS COMPLETO ===== */
.logs-container { background: var(--bg-card); border-radius: var(--radius-lg); padding: var(--space-lg); border: 1px solid var(--border-color); transition: var(--transition-smooth); }
.logs-container:hover { background: var(--bg-card-hover); box-shadow: var(--glass-shadow); }

.table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; }

.table-logs { width: 100%; border-collapse: collapse; font-size: var(--text-sm); }
.table-logs thead { background: var(--bg-input); border-radius: var(--radius-sm); }
.table-logs thead th { color: var(--text-muted); font-weight: 600; font-size: var(--text-xs); text-transform: uppercase; letter-spacing: 0.5px; padding: 10px 12px; text-align: left; border-bottom: 2px solid var(--border-color); }
.table-logs tbody td { padding: 8px 12px; vertical-align: middle; border-bottom: 1px solid var(--border-color); }
.table-logs tbody tr { transition: var(--transition-smooth); cursor: pointer; }
.table-logs tbody tr:hover { background: var(--bg-card-hover); }
.table-logs tbody tr:last-child td { border-bottom: none; }

/* ===== USUARIO CELL ===== */
.usuario-cell { display: flex; align-items: center; gap: 8px; }
.usuario-cell img { width: 28px; height: 28px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border-color); }
.usuario-cell div { display: flex; flex-direction: column; }
.usuario-cell strong { font-size: var(--text-sm); color: var(--text-primary); }
.usuario-cell .usuario-tipo { font-size: var(--text-xs); color: var(--text-muted); }

/* ===== BADGES ===== */
.badge-modulo { background: var(--bg-input); padding: 2px 10px; border-radius: var(--radius-full); font-size: var(--text-xs); color: var(--text-secondary); border: 1px solid var(--border-color); }
.badge-modulo i { margin-right: 4px; color: var(--color-aurora); }

.badge-tipo { padding: 2px 10px; border-radius: var(--radius-full); font-size: var(--text-xs); font-weight: 500; border: 1px solid; display: inline-flex; align-items: center; gap: 4px; }

.acao-nome { font-size: var(--text-sm); color: var(--text-primary); }
.data-hora { font-size: var(--text-sm); color: var(--text-muted); white-space: nowrap; }
.data-hora i { margin-right: 4px; }
.ip-address { font-size: var(--text-xs); color: var(--text-muted); font-family: monospace; }
.ip-address i { margin-right: 4px; }

/* ===== FILTROS ===== */
.filter-bar-admin { display: flex; flex-wrap: wrap; gap: 12px; padding: 16px 20px; background: var(--bg-card); border-radius: var(--radius-lg); border: 1px solid var(--border-color); margin-bottom: var(--space-lg); align-items: center; }
.filter-bar-admin .filter-group { display: flex; align-items: center; gap: 8px; }
.filter-bar-admin .filter-group label { font-size: var(--text-xs); font-weight: 500; color: var(--text-muted); white-space: nowrap; }
.filter-bar-admin .filter-group label i { color: var(--color-aurora); }
.filter-bar-admin select, .filter-bar-admin input { background: var(--bg-input); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 6px 12px; font-size: var(--text-sm); color: var(--text-primary); font-family: var(--font-body); transition: var(--transition-smooth); min-width: 130px; }
.filter-bar-admin select:focus, .filter-bar-admin input:focus { outline: none; border-color: var(--color-aurora); box-shadow: 0 0 0 3px rgba(108,43,217,0.1); }
.filter-bar-admin select { cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 10px center; padding-right: 32px; }
.filter-bar-admin .filter-actions { display: flex; gap: 8px; margin-left: auto; }
.resultados-info { font-size: var(--text-sm); color: var(--text-muted); margin-left: auto; white-space: nowrap; }

/* ===== PAGINAÇÃO ===== */
.table-pagination { display: flex; justify-content: center; align-items: center; gap: 4px; padding: var(--space-md) 0 var(--space-sm); flex-wrap: wrap; margin-top: var(--space-md); border-top: 1px solid var(--border-color); }
.table-pagination .page-btn { min-width: 32px; height: 32px; border: 1px solid var(--border-color); border-radius: var(--radius-sm); background: var(--bg-card); color: var(--text-secondary); cursor: pointer; transition: var(--transition-smooth); font-size: var(--text-sm); display: flex; align-items: center; justify-content: center; }
.table-pagination .page-btn:hover { border-color: var(--color-aurora); color: var(--color-aurora); background: rgba(108,43,217,0.04); }
.table-pagination .page-btn.active { background: var(--gradient-aurora); color: white; border-color: var(--color-aurora); }
.table-pagination .page-btn:disabled { opacity: 0.4; cursor: not-allowed; pointer-events: none; }
.table-pagination .page-info { font-size: var(--text-sm); color: var(--text-muted); padding: 0 12px; }
.table-pagination .page-dots { color: var(--text-muted); padding: 0 4px; font-size: var(--text-sm); }

/* ===== EMPTY STATE ===== */
.empty-state { text-align: center; padding: 40px 20px; }
.empty-state i { font-size: 2rem; color: var(--text-muted); }
.empty-state p { margin-top: 8px; color: var(--text-muted); }

/* ===== MODAL DETALHE LOG ===== */
.log-detalhe-item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid var(--border-color); }
.log-detalhe-item:last-child { border-bottom: none; }
.log-detalhe-label { font-size: var(--text-sm); color: var(--text-muted); font-weight: 500; }
.log-detalhe-value { font-size: var(--text-sm); color: var(--text-primary); text-align: right; }

/* ===== MODAL ===== */
.modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; align-items: center; justify-content: center; }
.modal.active { display: flex; }
.modal-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); animation: fadeIn 0.3s ease; cursor: pointer; }
.modal-content { position: relative; background: var(--bg-card); border-radius: var(--radius-lg); max-width: 550px; width: 90%; max-height: 90vh; overflow-y: auto; animation: slideUp 0.3s ease; box-shadow: var(--glass-shadow); border: 1px solid var(--border-color); z-index: 10; }
.modal-header { display: flex; justify-content: space-between; align-items: center; padding: 18px 24px; border-bottom: 1px solid var(--border-color); }
.modal-header .modal-title { font-family: var(--font-title); font-weight: 600; font-size: var(--text-h4); color: var(--text-primary); display: flex; align-items: center; gap: var(--space-sm); }
.modal-header .modal-title i { color: var(--color-aurora); }
.modal-close { background: none; border: none; font-size: 1.3rem; cursor: pointer; color: var(--text-muted); transition: var(--transition-smooth); padding: 4px; line-height: 1; }
.modal-close:hover { color: var(--text-primary); transform: rotate(90deg); }
.modal-body { padding: 24px; }
.modal-footer { padding: 16px 24px; border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 12px; }
.modal-footer .btn { min-width: 100px; justify-content: center; }

#modalConfirmacao .modal-content { max-width: 420px; text-align: center; }
#modalConfirmacao .modal-body p { font-size: var(--text-body); color: var(--text-secondary); line-height: 1.6; }
#modalConfirmacao .modal-body p strong { color: var(--text-primary); }
#modalConfirmacao .modal-body p small { display: block; margin-top: 8px; font-size: var(--text-sm); color: #FF6B6B; }
#modalConfirmacao .modal-footer { justify-content: center; }

/* ===== RESPONSIVIDADE ===== */
@media (max-width: 1024px) {
    .filter-bar-admin { flex-direction: column; align-items: stretch; }
    .filter-bar-admin .filter-group { width: 100%; flex-direction: column; align-items: stretch; gap: 4px; }
    .filter-bar-admin select, .filter-bar-admin input { width: 100%; min-width: auto; }
    .filter-bar-admin .filter-actions { margin-left: 0; flex-direction: column; gap: 6px; }
    .filter-bar-admin .filter-actions .btn { width: 100%; justify-content: center; }
    .resultados-info { margin-left: 0; text-align: center; width: 100%; padding-top: 4px; border-top: 1px solid var(--border-color); }
    .table-logs thead th { font-size: var(--text-xs); padding: 8px 10px; }
    .table-logs tbody td { padding: 6px 10px; }
}

@media (max-width: 768px) {
    .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
    .stat-card .value { font-size: var(--text-h3); }
    .logs-container { padding: var(--space-md); }
    .table-logs thead { display: none; }
    .table-logs tbody tr { display: block; margin-bottom: var(--space-md); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--space-sm); }
    .table-logs tbody td { display: flex; justify-content: space-between; align-items: center; padding: 4px 8px; border-bottom: 1px solid var(--border-color); }
    .table-logs tbody td:last-child { border-bottom: none; }
    .table-logs tbody td::before { content: attr(data-label); font-weight: 600; color: var(--text-muted); font-size: var(--text-xs); }
    .table-logs tbody td:first-child { display: none; }
    .table-logs tbody td:nth-child(2) { flex-direction: row; }
    .usuario-cell { flex: 1; }
    .modal-content { width: 95%; margin: 10px; }
    .header-actions { width: 100%; justify-content: center; flex-wrap: wrap; }
    .log-detalhe-item { flex-direction: column; align-items: flex-start; gap: 2px; }
    .log-detalhe-value { text-align: left; }
}

@media (max-width: 480px) {
    .stats-grid { grid-template-columns: 1fr; }
    .logs-container { padding: var(--space-sm); border-radius: var(--radius-md); }
    .filter-bar-admin { padding: 10px 12px; gap: 6px; }
    .table-pagination .page-btn { min-width: 24px; height: 24px; font-size: var(--text-xs); }
    .modal-header { padding: 14px 18px; }
    .modal-body { padding: 18px; }
    .modal-footer { flex-direction: column; padding: 12px 18px; }
    .modal-footer .btn { width: 100%; min-width: auto; }
    .usuario-cell img { width: 24px; height: 24px; }
}
</style>
</body>
</html>