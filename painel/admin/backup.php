<?php
// painel/admin/backup.php - Gestão de Backups
include "../../includes/admin/notificacoes-admin-count.php";

$titulo_pagina = 'Gestão de Backups';
$pagina_atual = 'backup';

// Dados mockados
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;



// Dados mockados - Backups
$backups = [
    [
        'id' => 1,
        'nome' => 'backup_completo_2026-02-18_09-00-00.sql',
        'tamanho' => '245.6 MB',
        'data_criacao' => '2026-02-18 09:00:00',
        'tipo' => 'completo',
        'tipo_label' => 'Completo',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'criado_por' => 'Sistema',
        'descricao' => 'Backup completo do banco de dados',
        'localizacao' => '/backups/2026/02/',
        'tabelas' => 24,
        'tamanho_original' => '245.6 MB',
        'tamanho_comprimido' => '156.8 MB',
        'duracao' => '5m 23s'
    ],
    [
        'id' => 2,
        'nome' => 'backup_incremental_2026-02-17_14-30-00.sql',
        'tamanho' => '12.4 MB',
        'data_criacao' => '2026-02-17 14:30:00',
        'tipo' => 'incremental',
        'tipo_label' => 'Incremental',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'criado_por' => 'Sistema',
        'descricao' => 'Backup incremental das últimas 24 horas',
        'localizacao' => '/backups/2026/02/incremental/',
        'tabelas' => 8,
        'tamanho_original' => '12.4 MB',
        'tamanho_comprimido' => '8.2 MB',
        'duracao' => '1m 15s'
    ],
    [
        'id' => 3,
        'nome' => 'backup_completo_2026-02-16_23-00-00.sql',
        'tamanho' => '238.2 MB',
        'data_criacao' => '2026-02-16 23:00:00',
        'tipo' => 'completo',
        'tipo_label' => 'Completo',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'criado_por' => 'Administrador Master',
        'descricao' => 'Backup completo manual antes da atualização',
        'localizacao' => '/backups/2026/02/',
        'tabelas' => 24,
        'tamanho_original' => '238.2 MB',
        'tamanho_comprimido' => '152.3 MB',
        'duracao' => '4m 58s'
    ],
    [
        'id' => 4,
        'nome' => 'backup_incremental_2026-02-15_10-00-00.sql',
        'tamanho' => '8.7 MB',
        'data_criacao' => '2026-02-15 10:00:00',
        'tipo' => 'incremental',
        'tipo_label' => 'Incremental',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'criado_por' => 'Sistema',
        'descricao' => 'Backup incremental das últimas 48 horas',
        'localizacao' => '/backups/2026/02/incremental/',
        'tabelas' => 6,
        'tamanho_original' => '8.7 MB',
        'tamanho_comprimido' => '5.9 MB',
        'duracao' => '48s'
    ],
    [
        'id' => 5,
        'nome' => 'backup_completo_2026-02-14_08-00-00.sql',
        'tamanho' => '221.4 MB',
        'data_criacao' => '2026-02-14 08:00:00',
        'tipo' => 'completo',
        'tipo_label' => 'Completo',
        'status' => 'falha',
        'status_label' => 'Falha',
        'criado_por' => 'Sistema',
        'descricao' => 'Backup completo com erro no processo',
        'localizacao' => '/backups/2026/02/',
        'tabelas' => 18,
        'tamanho_original' => '-',
        'tamanho_comprimido' => '-',
        'duracao' => '2m 30s'
    ],
    [
        'id' => 6,
        'nome' => 'backup_completo_2026-02-12_06-00-00.sql',
        'tamanho' => '215.8 MB',
        'data_criacao' => '2026-02-12 06:00:00',
        'tipo' => 'completo',
        'tipo_label' => 'Completo',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'criado_por' => 'Sistema',
        'descricao' => 'Backup completo semanal',
        'localizacao' => '/backups/2026/02/',
        'tabelas' => 24,
        'tamanho_original' => '215.8 MB',
        'tamanho_comprimido' => '138.2 MB',
        'duracao' => '4m 42s'
    ],
    [
        'id' => 7,
        'nome' => 'backup_incremental_2026-02-11_18-00-00.sql',
        'tamanho' => '5.2 MB',
        'data_criacao' => '2026-02-11 18:00:00',
        'tipo' => 'incremental',
        'tipo_label' => 'Incremental',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'criado_por' => 'Sistema',
        'descricao' => 'Backup incremental das últimas 12 horas',
        'localizacao' => '/backups/2026/02/incremental/',
        'tabelas' => 4,
        'tamanho_original' => '5.2 MB',
        'tamanho_comprimido' => '3.4 MB',
        'duracao' => '32s'
    ],
    [
        'id' => 8,
        'nome' => 'backup_completo_2026-02-10_12-00-00.sql',
        'tamanho' => '198.6 MB',
        'data_criacao' => '2026-02-10 12:00:00',
        'tipo' => 'completo',
        'tipo_label' => 'Completo',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'criado_por' => 'Administrador Master',
        'descricao' => 'Backup completo antes da atualização do sistema',
        'localizacao' => '/backups/2026/02/',
        'tabelas' => 24,
        'tamanho_original' => '198.6 MB',
        'tamanho_comprimido' => '124.5 MB',
        'duracao' => '4m 15s'
    ]
];

// Estatísticas
$total_backups = count($backups);
$total_concluidos = count(array_filter($backups, function ($b) {
    return $b['status'] === 'concluido';
}));
$total_falhas = count(array_filter($backups, function ($b) {
    return $b['status'] === 'falha';
}));
$total_completos = count(array_filter($backups, function ($b) {
    return $b['tipo'] === 'completo';
}));
$total_incrementais = count(array_filter($backups, function ($b) {
    return $b['tipo'] === 'incremental';
}));

// Calcular espaço total
$espaco_total = 0;
foreach ($backups as $b) {
    if ($b['status'] === 'concluido' && $b['tamanho'] !== '-') {
        $tamanho = str_replace([' MB', ' KB'], '', $b['tamanho']);
        $espaco_total += floatval($tamanho);
    }
}

// Função para converter MB para GB
function formatSize($mb)
{
    if ($mb >= 1024) {
        return number_format($mb / 1024, 2) . ' GB';
    }
    return number_format($mb, 2) . ' MB';
}

function safeValue($value, $default = 'N/A')
{
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function formatDateTime($datetime)
{
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i:s', strtotime($datetime));
}

function getStatusColor($status)
{
    $cores = [
        'concluido' => '#00FFA3',
        'em_andamento' => '#00D2FF',
        'falha' => '#FF6B6B',
        'pendente' => '#FFD93D'
    ];
    return $cores[$status] ?? '#6B7A8F';
}

function getStatusIcon($status)
{
    $icones = [
        'concluido' => 'fa-check-circle',
        'em_andamento' => 'fa-spinner fa-spin',
        'falha' => 'fa-exclamation-circle',
        'pendente' => 'fa-clock'
    ];
    return $icones[$status] ?? 'fa-circle';
}

function getTipoIcon($tipo)
{
    return $tipo === 'completo' ? 'fa-database' : 'fa-plus-circle';
}

function getTipoColor($tipo)
{
    return $tipo === 'completo' ? '#6C2BD9' : '#00D2FF';
}

function getAvatarUrl($name)
{
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
    ['icon' => 'fa-database', 'label' => 'Backup', 'link' => 'backup.php', 'active' => true],
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
                        <?php if ($item['label'] === 'Backup'): ?>
                            <span class="badge badge-primary"><?php echo $total_backups; ?></span>
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
                        <i class="fas fa-database icon"></i>
                        Gestão de Backups
                        <span class="badge badge-primary" style="font-size: 0.7rem; margin-left: 8px;"><?php echo $total_backups; ?> backups</span>
                    </h1>
                    <p class="breadcrumb"><a href="index.php">Dashboard</a> <span class="separator">/</span> <span>Backups</span></p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme"><i class="fas fa-sun theme-icon sun"></i><i class="fas fa-moon theme-icon moon"></i></button>
                                    <?php include "../../includes/admin/notificacoes-admin.php" ?>

                    <div class="header-actions">
                        <button class="btn btn-primary" onclick="criarBackup()"><i class="fas fa-plus"></i> Novo Backup</button>
                        <button class="btn btn-outline" onclick="restaurarBackup()"><i class="fas fa-undo-alt"></i> Restaurar</button>
                    </div>
                </div>
            </header>

            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora"><i class="fas fa-database"></i></div>
                    <div class="value"><?php echo $total_backups; ?></div>
                    <div class="label">Total de Backups</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 22.5%</div>
                </div>
                <div class="stat-card">
                    <div class="icon green"><i class="fas fa-check-circle"></i></div>
                    <div class="value"><?php echo $total_concluidos; ?></div>
                    <div class="label">Concluídos</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 15.3%</div>
                </div>
                <div class="stat-card">
                    <div class="icon red"><i class="fas fa-exclamation-circle"></i></div>
                    <div class="value"><?php echo $total_falhas; ?></div>
                    <div class="label">Falhas</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 8.2%</div>
                </div>
                <div class="stat-card">
                    <div class="icon blue"><i class="fas fa-hdd"></i></div>
                    <div class="value"><?php echo formatSize($espaco_total); ?></div>
                    <div class="label">Espaço Utilizado</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 5.1%</div>
                </div>
            </section>

            <div class="filter-bar-admin animate-fade-up">
                <div class="filter-group"><label><i class="fas fa-search"></i></label><input type="text" id="searchBackup" placeholder="Pesquisar backup..." oninput="aplicarFiltros()"></div>
                <div class="filter-group"><label>Tipo</label><select id="filterTipo" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="completo">Completo</option>
                        <option value="incremental">Incremental</option>
                    </select></div>
                <div class="filter-group"><label>Status</label><select id="filterStatus" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="concluido">Concluído</option>
                        <option value="em_andamento">Em Andamento</option>
                        <option value="falha">Falha</option>
                        <option value="pendente">Pendente</option>
                    </select></div>
                <div class="filter-group"><label>Data</label><input type="date" id="filterData" onchange="aplicarFiltros()"></div>
                <div class="filter-actions"><button class="btn btn-sm btn-primary" onclick="aplicarFiltros()"><i class="fas fa-filter"></i> Filtrar</button><button class="btn btn-sm btn-outline" onclick="limparFiltros()"><i class="fas fa-undo"></i> Limpar</button></div>
                <span class="resultados-info" id="resultadosInfo"><?php echo $total_backups; ?> resultados</span>
            </div>

            <div class="backups-container">
                <div class="backups-grid" id="backupsGrid">
                    <?php foreach ($backups as $backup): ?>
                        <div class="backup-card <?php echo $backup['status']; ?> animate-fade-up"
                            data-id="<?php echo $backup['id']; ?>"
                            data-tipo="<?php echo $backup['tipo']; ?>"
                            data-status="<?php echo $backup['status']; ?>"
                            data-data="<?php echo date('Y-m-d', strtotime($backup['data_criacao'])); ?>"
                            data-nome="<?php echo strtolower($backup['nome']); ?>"
                            onclick="verDetalheBackup(<?php echo $backup['id']; ?>)">
                            <div class="backup-header">
                                <div class="backup-icon" style="background: <?php echo getTipoColor($backup['tipo']); ?>20; color: <?php echo getTipoColor($backup['tipo']); ?>;">
                                    <i class="fas <?php echo getTipoIcon($backup['tipo']); ?>"></i>
                                </div>
                                <div class="backup-info">
                                    <h4><?php echo $backup['nome']; ?></h4>
                                    <div class="backup-meta">
                                        <span class="meta-item"><i class="fas fa-tag"></i> <?php echo $backup['tipo_label']; ?></span>
                                        <span class="meta-item"><i class="fas fa-clock"></i> <?php echo formatDateTime($backup['data_criacao']); ?></span>
                                    </div>
                                </div>
                                <div class="backup-status">
                                    <span class="badge badge-status status-<?php echo $backup['status']; ?>">
                                        <i class="fas <?php echo getStatusIcon($backup['status']); ?>"></i>
                                        <?php echo $backup['status_label']; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="backup-body">
                                <div class="backup-detalhes">
                                    <div class="detalhe-item">
                                        <i class="fas fa-file-alt"></i>
                                        <span><strong>Tamanho:</strong> <?php echo $backup['tamanho']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-table"></i>
                                        <span><strong>Tabelas:</strong> <?php echo $backup['tabelas']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-clock"></i>
                                        <span><strong>Duração:</strong> <?php echo $backup['duracao']; ?></span>
                                    </div>
                                    <div class="detalhe-item">
                                        <i class="fas fa-user"></i>
                                        <span><strong>Criado por:</strong> <?php echo $backup['criado_por']; ?></span>
                                    </div>
                                    <?php if ($backup['status'] === 'concluido'): ?>
                                        <div class="detalhe-item">
                                            <i class="fas fa-compress-alt"></i>
                                            <span><strong>Comprimido:</strong> <?php echo $backup['tamanho_comprimido']; ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="backup-footer">
                                <div class="backup-acoes">
                                    <?php if ($backup['status'] === 'concluido'): ?>
                                        <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); baixarBackup(<?php echo $backup['id']; ?>)" title="Baixar">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); restaurarBackupId(<?php echo $backup['id']; ?>)" title="Restaurar">
                                            <i class="fas fa-undo-alt"></i>
                                        </button>
                                    <?php endif; ?>
                                    <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); verDetalheBackup(<?php echo $backup['id']; ?>)" title="Detalhes">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="event.stopPropagation(); excluirBackup(<?php echo $backup['id']; ?>, '<?php echo addslashes($backup['nome']); ?>')" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="table-pagination" id="paginacaoBackups">
                    <button class="page-btn prev" onclick="mudarPagina('prev')" disabled><i class="fas fa-chevron-left"></i></button>
                    <span class="page-info">1 de 1</span>
                    <button class="page-btn next" onclick="mudarPagina('next')" disabled><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </main>
    </div>

    <!-- MODAL DETALHE BACKUP -->
    <div class="modal" id="modalDetalheBackup">
        <div class="modal-overlay" onclick="fecharModal('modalDetalheBackup')"></div>
        <div class="modal-content" style="max-width: 550px;">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-database"></i> Detalhes do Backup</h3>
                <button class="modal-close" onclick="fecharModal('modalDetalheBackup')">&times;</button>
            </div>
            <div class="modal-body" id="detalheBackupBody"></div>
        </div>
    </div>

    <!-- MODAL CONFIRMAÇÃO -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 420px;">
            <div class="modal-header">
                <h3 class="modal-title" id="confirmacaoTitulo"><i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar</h3><button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="confirmacaoCorpo">
                <p>Tem certeza?</p>
            </div>
            <div class="modal-footer"><button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button><button class="btn btn-danger" id="confirmacaoBtn" onclick="executarConfirmacao()"><i class="fas fa-check"></i> Confirmar</button></div>
        </div>
    </div>

    <script src="../assets/js/main.js"></script>
    <script>
        const backupsData = <?php echo json_encode($backups); ?>;

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
            const total = document.querySelectorAll('.backup-card').length;
            if (total > 0) {
                totalItensVisiveis = total;
                atualizarPaginacao(total);
            }

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
            const searchInput = document.getElementById('searchBackup');
            if (searchInput) {
                let timeout;
                searchInput.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(aplicarFiltros, 300);
                });
            }
        });

        function toggleSidebarMobile(event) {
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }
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
            if (notif) {
                notif.lida = true;
                atualizarBadgeNotif();
                carregarNotificacoes();
                mostrarToast('Notificação marcada como lida', 'info');
            }
        }

        function marcarTodasLidas() {
            mockNotificacoes.forEach(n => n.lida = true);
            atualizarBadgeNotif();
            carregarNotificacoes();
            mostrarToast('Todas marcadas como lidas', 'success');
            closeNotifications();
        }

        function atualizarBadgeNotif() {
            const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
            const badge = document.getElementById('notifBadge');
            const bottom = document.getElementById('bottomNotifBadge');
            if (badge) {
                badge.textContent = naoLidas;
                badge.style.display = naoLidas > 0 ? 'flex' : 'none';
            }
            if (bottom) {
                bottom.textContent = naoLidas;
                bottom.style.display = naoLidas > 0 ? 'flex' : 'none';
            }
        }

        function closeNotifications() {
            document.getElementById('notificacoesDropdown')?.classList.remove('active');
        }

        // ===== TOAST =====
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
                warning: '#F59E0B',
                info: '#00D2FF'
            };
            const toast = document.createElement('div');
            toast.className = 'toast toast-' + tipo;
            toast.innerHTML = `<div class="toast-content"><i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i><span>${mensagem}</span></div><button class="toast-close" onclick="this.parentElement.remove()">&times;</button>`;
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

        // ===== FILTROS E PAGINAÇÃO =====
        let paginaAtual = 1,
            itensPorPagina = 6,
            totalItensVisiveis = 0;

        function aplicarFiltros() {
            const search = document.getElementById('searchBackup').value.toLowerCase().trim();
            const tipo = document.getElementById('filterTipo').value;
            const status = document.getElementById('filterStatus').value;
            const data = document.getElementById('filterData').value;
            const cards = document.querySelectorAll('.backup-card');
            let visiveis = 0;
            cards.forEach(card => {
                const nome = card.dataset.nome || '';
                const cardTipo = card.dataset.tipo || '';
                const cardStatus = card.dataset.status || '';
                const cardData = card.dataset.data || '';
                let show = true;
                if (search) show = nome.includes(search);
                if (show && tipo) show = cardTipo === tipo;
                if (show && status) show = cardStatus === status;
                if (show && data) show = cardData === data;
                card.style.display = show ? '' : 'none';
                if (show) visiveis++;
            });
            totalItensVisiveis = visiveis;
            document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            paginaAtual = 1;
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            } else {
                document.getElementById('paginacaoBackups').style.display = 'none';
                document.querySelector('.backups-grid').innerHTML = `<div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;"><div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);"><i class="fas fa-database"></i></div><h4 style="margin-top: 16px; color: var(--text-primary);">Nenhum backup encontrado</h4><p style="color: var(--text-muted); margin-top: 8px;">Tente ajustar os filtros.</p></div>`;
            }
        }

        function limparFiltros() {
            document.getElementById('searchBackup').value = '';
            document.getElementById('filterTipo').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterData').value = '';
            document.querySelectorAll('.backup-card').forEach(card => card.style.display = '');
            totalItensVisiveis = document.querySelectorAll('.backup-card').length;
            document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            if (document.querySelector('.backups-grid .empty-state-admin')) location.reload();
            paginaAtual = 1;
            if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
        }

        function atualizarPaginacao(total) {
            const totalPaginas = Math.ceil(total / itensPorPagina);
            const container = document.getElementById('paginacaoBackups');
            if (!container) return;
            const prevBtn = container.querySelector('.prev');
            const nextBtn = container.querySelector('.next');
            const info = container.querySelector('.page-info');
            container.querySelectorAll('.page-btn:not(.prev):not(.next)').forEach(b => b.remove());
            if (totalPaginas <= 1) {
                container.style.display = 'none';
                mostrarPagina(1);
                return;
            }
            container.style.display = 'flex';
            const maxVisible = 5;
            let startPage = Math.max(1, paginaAtual - 2);
            let endPage = Math.min(totalPaginas, startPage + maxVisible - 1);
            if (endPage - startPage < maxVisible - 1) startPage = Math.max(1, endPage - maxVisible + 1);
            if (startPage > 1) {
                const firstBtn = document.createElement('button');
                firstBtn.className = 'page-btn';
                firstBtn.textContent = '1';
                firstBtn.onclick = function() {
                    irParaPagina(1);
                };
                container.insertBefore(firstBtn, info);
                if (startPage > 2) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    container.insertBefore(dots, info);
                }
            }
            for (let i = startPage; i <= endPage; i++) {
                const btn = document.createElement('button');
                btn.className = 'page-btn' + (i === paginaAtual ? ' active' : '');
                btn.textContent = i;
                btn.onclick = function() {
                    irParaPagina(i);
                };
                container.insertBefore(btn, info);
            }
            if (endPage < totalPaginas) {
                if (endPage < totalPaginas - 1) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    container.insertBefore(dots, info);
                }
                const lastBtn = document.createElement('button');
                lastBtn.className = 'page-btn';
                lastBtn.textContent = totalPaginas;
                lastBtn.onclick = function() {
                    irParaPagina(totalPaginas);
                };
                container.insertBefore(lastBtn, info);
            }
            prevBtn.disabled = paginaAtual <= 1;
            nextBtn.disabled = paginaAtual >= totalPaginas;
            info.textContent = `${paginaAtual} de ${totalPaginas}`;
            mostrarPagina(paginaAtual);
        }

        function mostrarPagina(page) {
            const cards = document.querySelectorAll('.backup-card:not([style*="display: none"])');
            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;
            document.querySelectorAll('.backup-card').forEach(card => {
                if (card.style.display !== 'none') card.style.display = 'none';
            });
            cards.forEach((card, index) => {
                if (index >= start && index < end) card.style.display = '';
            });
        }

        function irParaPagina(page) {
            paginaAtual = page;
            if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
            document.querySelector('.backups-container')?.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function mudarPagina(direcao) {
            const totalPaginas = Math.ceil(totalItensVisiveis / itensPorPagina);
            if (direcao === 'prev' && paginaAtual > 1) irParaPagina(paginaAtual - 1);
            else if (direcao === 'next' && paginaAtual < totalPaginas) irParaPagina(paginaAtual + 1);
        }

        // ===== VER DETALHE BACKUP =====
        function verDetalheBackup(id) {
            const backup = backupsData.find(b => b.id === id);
            if (!backup) return;
            const body = document.getElementById('detalheBackupBody');
            body.innerHTML = `
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-file"></i> Nome</span>
            <span class="backup-detalhe-value">${backup.nome}</span>
        </div>
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-clock"></i> Data de Criação</span>
            <span class="backup-detalhe-value">${formatDateTime(backup.data_criacao)}</span>
        </div>
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-tag"></i> Tipo</span>
            <span class="backup-detalhe-value"><span class="badge" style="background: ${getTipoColor(backup.tipo)}20; color: ${getTipoColor(backup.tipo)}; border: 1px solid ${getTipoColor(backup.tipo)};"><i class="fas ${getTipoIcon(backup.tipo)}"></i> ${backup.tipo_label}</span></span>
        </div>
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-info-circle"></i> Status</span>
            <span class="backup-detalhe-value"><span class="badge badge-status status-${backup.status}"><i class="fas ${getStatusIcon(backup.status)}"></i> ${backup.status_label}</span></span>
        </div>
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-hdd"></i> Tamanho</span>
            <span class="backup-detalhe-value">${backup.tamanho}</span>
        </div>
        ${backup.status === 'concluido' ? `
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-compress-alt"></i> Tamanho Comprimido</span>
            <span class="backup-detalhe-value">${backup.tamanho_comprimido}</span>
        </div>
        ` : ''}
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-table"></i> Tabelas</span>
            <span class="backup-detalhe-value">${backup.tabelas}</span>
        </div>
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-clock"></i> Duração</span>
            <span class="backup-detalhe-value">${backup.duracao}</span>
        </div>
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-user"></i> Criado por</span>
            <span class="backup-detalhe-value">${backup.criado_por}</span>
        </div>
        <div class="backup-detalhe-item">
            <span class="backup-detalhe-label"><i class="fas fa-folder"></i> Localização</span>
            <span class="backup-detalhe-value">${backup.localizacao}</span>
        </div>
        <div class="backup-detalhe-item" style="flex-direction: column; align-items: flex-start; gap: 4px;">
            <span class="backup-detalhe-label" style="width: 100%;"><i class="fas fa-file-alt"></i> Descrição</span>
            <span class="backup-detalhe-value" style="text-align: left; width: 100%;">${backup.descricao}</span>
        </div>
    `;
            document.getElementById('modalDetalheBackup').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function getTipoIcon(tipo) {
            return tipo === 'completo' ? 'fa-database' : 'fa-plus-circle';
        }

        function getTipoColor(tipo) {
            return tipo === 'completo' ? '#6C2BD9' : '#00D2FF';
        }

        function getStatusColor(status) {
            const cores = {
                'concluido': '#00FFA3',
                'em_andamento': '#00D2FF',
                'falha': '#FF6B6B',
                'pendente': '#FFD93D'
            };
            return cores[status] || '#6B7A8F';
        }

        function getStatusIcon(status) {
            const icones = {
                'concluido': 'fa-check-circle',
                'em_andamento': 'fa-spinner fa-spin',
                'falha': 'fa-exclamation-circle',
                'pendente': 'fa-clock'
            };
            return icones[status] || 'fa-circle';
        }

        function formatDateTime(dt) {
            if (!dt) return 'N/A';
            const d = new Date(dt.replace(' ', 'T'));
            return String(d.getDate()).padStart(2, '0') + '/' + String(d.getMonth() + 1).padStart(2, '0') + '/' + d.getFullYear() + ' ' + String(d.getHours()).padStart(2, '0') + ':' + String(d.getMinutes()).padStart(2, '0') + ':' + String(d.getSeconds()).padStart(2, '0');
        }

        function getAvatarUrl(name) {
            return 'https://ui-avatars.com/api/?name=' + encodeURIComponent(name) + '&background=6C2BD9&color=fff&size=80';
        }

        // ===== AÇÕES DOS BACKUPS =====
        let acaoConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            document.getElementById('confirmacaoTitulo').innerHTML = `<i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> ${titulo}`;
            document.getElementById('confirmacaoCorpo').innerHTML = `<p>${mensagem}</p>`;
            document.getElementById('confirmacaoBtn').onclick = callback;
            document.getElementById('modalConfirmacao').classList.add('active');
        }

        function executarConfirmacao() {
            if (typeof acaoConfirmacao === 'function') {
                acaoConfirmacao();
                acaoConfirmacao = null;
            }
        }

        function criarBackup() {
            mostrarToast('Iniciando criação de backup completo...', 'info');
            setTimeout(() => {
                mostrarToast('Backup criado com sucesso!', 'success');
                setTimeout(() => location.reload(), 1000);
            }, 3000);
        }

        function restaurarBackup() {
            mostrarConfirmacao('Restaurar Backup', 'Tem certeza que deseja restaurar o backup mais recente?<br><small style="color: #F59E0B;">Esta ação irá sobrescrever todos os dados atuais!</small>', function() {
                mostrarToast('Backup restaurado com sucesso!', 'success');
                fecharModal('modalConfirmacao');
            });
        }

        function restaurarBackupId(id) {
            const backup = backupsData.find(b => b.id === id);
            if (!backup) return;
            mostrarConfirmacao('Restaurar Backup', `Restaurar backup <strong>"${backup.nome}"</strong>?<br><small style="color: #F59E0B;">Esta ação irá sobrescrever todos os dados atuais!</small>`, function() {
                mostrarToast('Backup restaurado com sucesso!', 'success');
                fecharModal('modalConfirmacao');
                fecharModal('modalDetalheBackup');
            });
        }

        function baixarBackup(id) {
            const backup = backupsData.find(b => b.id === id);
            if (!backup) return;
            mostrarToast(`A baixar backup: ${backup.nome}`, 'info');
            setTimeout(() => {
                mostrarToast('Download iniciado!', 'success');
            }, 1500);
        }

        function excluirBackup(id, nome) {
            mostrarConfirmacao('Excluir Backup', `Excluir backup <strong>"${nome}"</strong>?<br><small style="color: #EF4444;">Esta ação não pode ser desfeita!</small>`, function() {
                const card = document.querySelector(`.backup-card[data-id="${id}"]`);
                if (card) {
                    card.style.transition = 'all 0.3s ease';
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.remove();
                        const idx = backupsData.findIndex(b => b.id === id);
                        if (idx > -1) backupsData.splice(idx, 1);
                        const total = document.querySelectorAll('.backup-card').length;
                        if (total > 0) {
                            totalItensVisiveis = total;
                            atualizarPaginacao(total);
                        } else {
                            document.getElementById('paginacaoBackups').style.display = 'none';
                            document.querySelector('.backups-grid').innerHTML = `<div class="empty-state-admin" style="grid-column: 1 / -1; padding: 60px 20px; text-align: center;"><div class="empty-icon" style="font-size: 3rem; color: var(--text-muted);"><i class="fas fa-database"></i></div><h4 style="margin-top: 16px; color: var(--text-primary);">Nenhum backup disponível</h4><p style="color: var(--text-muted); margin-top: 8px;">Clique em "Novo Backup" para criar um.</p></div>`;
                        }
                        mostrarToast('Backup excluído com sucesso!', 'error');
                    }, 300);
                }
                fecharModal('modalConfirmacao');
                fecharModal('modalDetalheBackup');
            });
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
        /* ===== BACKUPS - CSS COMPLETO ===== */
        .backups-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .backups-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .backups-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        /* ===== BACKUP CARD ===== */
        .backup-card {
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            cursor: pointer;
        }

        .backup-card:hover {
            border-color: var(--color-aurora);
            transform: translateY(-4px);
            box-shadow: var(--glass-shadow);
        }

        .backup-card.falha {
            border-left: 4px solid #FF6B6B;
            background: rgba(255, 107, 107, 0.02);
        }

        .backup-card.concluido {
            border-left: 4px solid #00FFA3;
        }

        .backup-card.em_andamento {
            border-left: 4px solid #00D2FF;
        }

        .backup-card.pendente {
            border-left: 4px solid #FFD93D;
        }

        /* ===== HEADER ===== */
        .backup-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .backup-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .backup-info {
            flex: 1;
            min-width: 0;
        }

        .backup-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-sm);
            color: var(--text-primary);
            margin: 0;
            word-break: break-all;
        }

        .backup-info .backup-meta {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            margin-top: 2px;
        }

        .backup-info .backup-meta .meta-item {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .backup-info .backup-meta .meta-item i {
            font-size: 0.7rem;
        }

        .backup-status {
            flex-shrink: 0;
        }

        /* ===== BODY ===== */
        .backup-body {
            flex: 1;
        }

        .backup-detalhes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2px 12px;
        }

        .backup-detalhes .detalhe-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .backup-detalhes .detalhe-item i {
            width: 14px;
            color: var(--color-aurora);
            font-size: 0.7rem;
            flex-shrink: 0;
        }

        .backup-detalhes .detalhe-item span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .backup-detalhes .detalhe-item span strong {
            color: var(--text-primary);
        }

        /* ===== FOOTER ===== */
        .backup-footer {
            display: flex;
            justify-content: flex-end;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
        }

        .backup-footer .backup-acoes {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .backup-footer .backup-acoes .btn {
            padding: 4px 6px;
            font-size: var(--text-xs);
            min-width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== BADGES ===== */
        .badge-status {
            font-size: 0.6rem;
            padding: 2px 8px;
            border-radius: var(--radius-full);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .badge-status.status-concluido {
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
        }

        .badge-status.status-em_andamento {
            background: rgba(0, 210, 255, 0.15);
            color: #00D2FF;
        }

        .badge-status.status-falha {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
        }

        /* ===== FILTROS ===== */
        .filter-bar-admin {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            align-items: center;
        }

        .filter-bar-admin .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-bar-admin .filter-group label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            white-space: nowrap;
        }

        .filter-bar-admin .filter-group label i {
            color: var(--color-aurora);
        }

        .filter-bar-admin select,
        .filter-bar-admin input {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 6px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
            min-width: 130px;
        }

        .filter-bar-admin select:focus,
        .filter-bar-admin input:focus {
            outline: none;
            border-color: var(--color-aurora);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        .filter-bar-admin select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 32px;
        }

        .filter-bar-admin .filter-actions {
            display: flex;
            gap: 8px;
            margin-left: auto;
        }

        .resultados-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-left: auto;
            white-space: nowrap;
        }

        /* ===== PAGINAÇÃO ===== */
        .table-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
            padding: var(--space-md) 0 var(--space-sm);
            flex-wrap: wrap;
            margin-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .table-pagination .page-btn {
            min-width: 32px;
            height: 32px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition-smooth);
            font-size: var(--text-sm);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table-pagination .page-btn:hover {
            border-color: var(--color-aurora);
            color: var(--color-aurora);
            background: rgba(108, 43, 217, 0.04);
        }

        .table-pagination .page-btn.active {
            background: var(--gradient-aurora);
            color: white;
            border-color: var(--color-aurora);
        }

        .table-pagination .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
        }

        .table-pagination .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 12px;
        }

        .table-pagination .page-dots {
            color: var(--text-muted);
            padding: 0 4px;
            font-size: var(--text-sm);
        }

        /* ===== EMPTY STATE ===== */
        .empty-state-admin {
            text-align: center;
            padding: 60px 24px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
        }

        .empty-state-admin .empty-icon {
            font-size: 4rem;
            color: var(--text-muted);
            margin-bottom: var(--space-md);
        }

        .empty-state-admin h4 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
        }

        .empty-state-admin p {
            color: var(--text-muted);
            max-width: 400px;
            margin: 0 auto;
        }

        /* ===== MODAL ===== */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            animation: fadeIn 0.3s ease;
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            max-width: 550px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: var(--glass-shadow);
            border: 1px solid var(--border-color);
            z-index: 10;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header .modal-title {
            font-family: var(--font-title);
            font-weight: 600;
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .modal-header .modal-title i {
            color: var(--color-aurora);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.3rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px;
            line-height: 1;
        }

        .modal-close:hover {
            color: var(--text-primary);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn {
            min-width: 100px;
            justify-content: center;
        }

        #modalConfirmacao .modal-content {
            max-width: 420px;
            text-align: center;
        }

        #modalConfirmacao .modal-body p {
            font-size: var(--text-body);
            color: var(--text-secondary);
            line-height: 1.6;
        }

        #modalConfirmacao .modal-body p strong {
            color: var(--text-primary);
        }

        #modalConfirmacao .modal-body p small {
            display: block;
            margin-top: 8px;
            font-size: var(--text-sm);
            color: #FF6B6B;
        }

        #modalConfirmacao .modal-footer {
            justify-content: center;
        }

        /* ===== DETALHE BACKUP ===== */
        .backup-detalhe-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .backup-detalhe-item:last-child {
            border-bottom: none;
        }

        .backup-detalhe-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .backup-detalhe-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            text-align: right;
        }

        /* ===== RESPONSIVIDADE ===== */
        @media (max-width: 1024px) {
            .filter-bar-admin {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-bar-admin .filter-group {
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 4px;
            }

            .filter-bar-admin select,
            .filter-bar-admin input {
                width: 100%;
                min-width: auto;
            }

            .filter-bar-admin .filter-actions {
                margin-left: 0;
                flex-direction: column;
                gap: 6px;
            }

            .filter-bar-admin .filter-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .resultados-info {
                margin-left: 0;
                text-align: center;
                width: 100%;
                padding-top: 4px;
                border-top: 1px solid var(--border-color);
            }

            .backups-grid {
                grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }

            .backups-container {
                padding: var(--space-md);
            }

            .backups-grid {
                grid-template-columns: 1fr;
                gap: var(--space-md);
            }

            .backup-card {
                padding: var(--space-sm);
            }

            .backup-header {
                flex-wrap: wrap;
            }

            .backup-info h4 {
                font-size: var(--text-sm);
            }

            .backup-detalhes {
                grid-template-columns: 1fr;
            }

            .backup-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .backup-footer .backup-acoes {
                justify-content: center;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .backup-detalhe-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
            }

            .backup-detalhe-value {
                text-align: left;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .backups-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .filter-bar-admin {
                padding: 10px 12px;
                gap: 6px;
            }

            .table-pagination .page-btn {
                min-width: 24px;
                height: 24px;
                font-size: var(--text-xs);
            }

            .modal-header {
                padding: 14px 18px;
            }

            .modal-body {
                padding: 18px;
            }

            .modal-footer {
                flex-direction: column;
                padding: 12px 18px;
            }

            .modal-footer .btn {
                width: 100%;
                min-width: auto;
            }

            .backup-acoes .btn {
                padding: 2px 4px;
                font-size: 0.55rem;
                min-width: 24px;
                height: 24px;
            }

            .backup-icon {
                width: 36px;
                height: 36px;
                font-size: 1rem;
            }
        }
    </style>
</body>

</html>