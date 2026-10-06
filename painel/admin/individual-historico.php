<?php
// painel/admin/individual-historico.php - Histórico do Profissional Individual
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Histórico do Profissional';
$pagina_atual = 'individuais'; // <-- ESSENCIAL!

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Simulando o ID recebido via GET
$profissional_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Profissional Individual
$profissional_data = [
    'id' => $profissional_id,
    'nome' => 'Carlos Mendes',
    'email' => 'carlos.mendes@topografia.pt',
    'especialidade' => 'Topografia',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'avatar' => 'profissional-1.png',
    'data_registo' => '2026-01-10 09:15:00'
];

// Dados mockados - Histórico de Ações (completo)
$historico_completo = [
    [
        'id' => 1,
        'acao' => 'Registo da conta',
        'descricao' => 'Criação da conta do profissional no sistema',
        'data' => '2026-01-10 09:15:00',
        'ip' => '192.168.1.100',
        'tipo' => 'criacao',
        'modulo' => 'Autenticação',
        'usuario' => 'Sistema'
    ],
    [
        'id' => 2,
        'acao' => 'Validação da conta',
        'descricao' => 'Conta validada pelo administrador',
        'data' => '2026-01-10 10:00:00',
        'ip' => '192.168.1.100',
        'tipo' => 'validacao',
        'modulo' => 'Autenticação',
        'usuario' => 'Administrador Master'
    ],
    [
        'id' => 3,
        'acao' => 'Primeiro acesso ao painel',
        'descricao' => 'Primeiro login do profissional no sistema',
        'data' => '2026-01-11 08:30:00',
        'ip' => '192.168.1.101',
        'tipo' => 'acesso',
        'modulo' => 'Autenticação',
        'usuario' => 'Carlos Mendes'
    ],
    [
        'id' => 4,
        'acao' => 'Criação de projeto',
        'descricao' => 'Criou o projeto: Levantamento Topográfico - Luanda Sul',
        'data' => '2026-01-15 09:00:00',
        'ip' => '192.168.1.102',
        'tipo' => 'criacao',
        'modulo' => 'Projetos',
        'usuario' => 'Carlos Mendes'
    ],
    [
        'id' => 5,
        'acao' => 'Upload de documento',
        'descricao' => 'Upload do documento: Certificado GNSS',
        'data' => '2026-02-01 14:20:00',
        'ip' => '192.168.1.105',
        'tipo' => 'upload',
        'modulo' => 'Documentos',
        'usuario' => 'Carlos Mendes'
    ],
    [
        'id' => 6,
        'acao' => 'Atualização de perfil',
        'descricao' => 'Atualizou informações pessoais no perfil',
        'data' => '2026-02-10 11:30:00',
        'ip' => '192.168.1.106',
        'tipo' => 'edicao',
        'modulo' => 'Perfil',
        'usuario' => 'Carlos Mendes'
    ],
    [
        'id' => 7,
        'acao' => 'Conclusão de projeto',
        'descricao' => 'Concluiu o projeto: Levantamento GNSS - Viana',
        'data' => '2026-02-15 16:00:00',
        'ip' => '192.168.1.108',
        'tipo' => 'conclusao',
        'modulo' => 'Projetos',
        'usuario' => 'Carlos Mendes'
    ],
    [
        'id' => 8,
        'acao' => 'Alteração de plano',
        'descricao' => 'Alterou o plano de Básico para Pro',
        'data' => '2026-02-18 10:00:00',
        'ip' => '192.168.1.110',
        'tipo' => 'edicao',
        'modulo' => 'Assinatura',
        'usuario' => 'Carlos Mendes'
    ],
    [
        'id' => 9,
        'acao' => 'Pagamento de fatura',
        'descricao' => 'Pagamento da fatura #FAT-2026-001 no valor de Kz 25.000',
        'data' => '2026-02-20 14:30:00',
        'ip' => '192.168.1.112',
        'tipo' => 'pagamento',
        'modulo' => 'Financeiro',
        'usuario' => 'Carlos Mendes'
    ],
    [
        'id' => 10,
        'acao' => 'Criação de novo projeto',
        'descricao' => 'Criou o projeto: Georreferenciamento - Kilamba',
        'data' => '2026-02-25 09:45:00',
        'ip' => '192.168.1.115',
        'tipo' => 'criacao',
        'modulo' => 'Projetos',
        'usuario' => 'Carlos Mendes'
    ],
    [
        'id' => 11,
        'acao' => 'Suspensão da conta',
        'descricao' => 'Conta suspensa pelo administrador',
        'data' => '2026-03-01 08:00:00',
        'ip' => '192.168.1.120',
        'tipo' => 'suspensao',
        'modulo' => 'Autenticação',
        'usuario' => 'Administrador Master'
    ],
    [
        'id' => 12,
        'acao' => 'Reativação da conta',
        'descricao' => 'Conta reativada pelo administrador',
        'data' => '2026-03-10 09:30:00',
        'ip' => '192.168.1.125',
        'tipo' => 'reativacao',
        'modulo' => 'Autenticação',
        'usuario' => 'Administrador Master'
    ]
];

// Estatísticas do histórico
$total_acoes = count($historico_completo);
$total_criacoes = count(array_filter($historico_completo, function($h) { return $h['tipo'] === 'criacao'; }));
$total_edicoes = count(array_filter($historico_completo, function($h) { return $h['tipo'] === 'edicao'; }));
$total_acessos = count(array_filter($historico_completo, function($h) { return $h['tipo'] === 'acesso'; }));
$total_pagamentos = count(array_filter($historico_completo, function($h) { return $h['tipo'] === 'pagamento'; }));

// Tipos de ação para filtro
$tipos_acao = [
    'criacao' => 'Criação',
    'edicao' => 'Edição',
    'acesso' => 'Acesso',
    'pagamento' => 'Pagamento',
    'upload' => 'Upload',
    'validacao' => 'Validação',
    'suspensao' => 'Suspensão',
    'reativacao' => 'Reativação',
    'conclusao' => 'Conclusão'
];

// Módulos para filtro
$modulos = array_unique(array_column($historico_completo, 'modulo'));
sort($modulos);

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => true],
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
        <!-- Toast Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Overlay para sidebar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR                                    -->
        <!-- ========================================== -->
        <?php include "../../includes/admin/admin-sidebar.php" ?>

        <!-- ========================================== -->
        <!-- BOTTOM NAVIGATION - MOBILE                 -->
        <!-- ========================================== -->
        <nav class="bottom-nav" id="bottomNav">
            <div class="nav-items">
                <?php foreach ($bottom_nav_items as $item): ?>
                    <a href="<?php echo $item['link']; ?>"
                        class="nav-item <?php echo $item['active'] ? 'active' : ''; ?> <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'menu-toggle' : ''; ?>"
                        <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'id="bottomMenuToggle"' : ''; ?>
                        <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'onclick="toggleSidebarMobile(event)"' : ''; ?>>
                        <i class="fas <?php echo $item['icon']; ?>"></i>
                        <span><?php echo $item['label']; ?></span>
                        <?php if ($item['label'] === 'Profissionais'): ?>
                            <span class="badge"><?php echo $total_usuarios; ?></span>
                        <?php endif; ?>
                        <?php if ($item['label'] === 'Menu'): ?>
                            <span class="badge" id="bottomNotifBadge"><?php echo $notificacoes_count; ?></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-history icon"></i>
                        Histórico do Profissional
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="individuais.php">Profissionais</a>
                        <span class="separator">/</span>
                        <a href="individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>"><?php echo $profissional_data['nome']; ?></a>
                        <span class="separator">/</span>
                        <span>Histórico</span>
                    </p>
                </div>
                <div class="header-right">
                    <!-- Botão Tema Dark/Light -->
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                    <?php include "../../includes/admin/notificacoes-admin.php" ?>


                    <div class="header-actions">
                        <a href="individual-detalhe.php?id=<?php echo $profissional_data['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <button class="btn btn-outline" onclick="exportarHistorico()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                        <button class="btn btn-outline" onclick="window.print()">
                            <i class="fas fa-print"></i> Imprimir
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== INFO DO PROFISSIONAL ===== -->
            <div class="profissional-info-bar animate-fade-up">
                <div class="info-avatar">
                    <img src="../../assets/images/<?php echo $profissional_data['avatar']; ?>" alt="<?php echo $profissional_data['nome']; ?>">
                </div>
                <div class="info-dados">
                    <h3><?php echo $profissional_data['nome']; ?></h3>
                    <p><i class="fas fa-envelope"></i> <?php echo $profissional_data['email']; ?></p>
                    <p><i class="fas fa-briefcase"></i> <?php echo $profissional_data['especialidade']; ?></p>
                </div>
                <div class="info-status">
                    <span class="status-badge status-<?php echo $profissional_data['status']; ?>">
                        <span class="status-dot"></span>
                        <?php echo $profissional_data['status_label']; ?>
                    </span>
                    <span class="data-registo"><i class="far fa-calendar-alt"></i> Registo: <?php echo date('d/m/Y', strtotime($profissional_data['data_registo'])); ?></span>
                </div>
            </div>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="value"><?php echo $total_acoes; ?></div>
                    <div class="label">Total de Ações</div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="value"><?php echo $total_criacoes; ?></div>
                    <div class="label">Criações</div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="value"><?php echo $total_edicoes; ?></div>
                    <div class="label">Edições</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <div class="value"><?php echo $total_acessos; ?></div>
                    <div class="label">Acessos</div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="value"><?php echo $total_pagamentos; ?></div>
                    <div class="label">Pagamentos</div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo date('d/m/Y', strtotime($historico_completo[0]['data'])); ?></div>
                    <div class="label">Primeira Ação</div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filter-bar-admin animate-fade-up">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchHistorico" placeholder="Pesquisar ação..." oninput="aplicarFiltros()">
                </div>
                <div class="filter-group">
                    <label>Tipo</label>
                    <select id="filterTipo" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <?php foreach ($tipos_acao as $value => $label): ?>
                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Módulo</label>
                    <select id="filterModulo" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <?php foreach ($modulos as $modulo): ?>
                            <option value="<?php echo $modulo; ?>"><?php echo $modulo; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Data</label>
                    <input type="date" id="filterData" onchange="aplicarFiltros()">
                </div>
                <div class="filter-actions">
                    <button class="btn btn-sm btn-primary" onclick="aplicarFiltros()">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                    <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-undo"></i> Limpar
                    </button>
                </div>
                <span class="resultados-info" id="resultadosInfo"><?php echo $total_acoes; ?> resultados</span>
            </div>

            <!-- ===== TABELA DE HISTÓRICO ===== -->
            <div class="historico-container animate-fade-up">
                <div class="table-responsive">
                    <table class="table-historico" id="tabelaHistorico">
                        <thead>
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th>Ação</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Módulo</th>
                                <th>Data/Hora</th>
                                <th>IP</th>
                                <th>Usuário</th>
                            </tr>
                        </thead>
                        <tbody id="historicoBody">
                            <?php foreach ($historico_completo as $item): ?>
                                <tr data-id="<?php echo $item['id']; ?>"
                                    data-tipo="<?php echo $item['tipo']; ?>"
                                    data-modulo="<?php echo $item['modulo']; ?>"
                                    data-data="<?php echo date('Y-m-d', strtotime($item['data'])); ?>"
                                    data-acao="<?php echo strtolower($item['acao']); ?>"
                                    data-descricao="<?php echo strtolower($item['descricao']); ?>">
                                    <td><?php echo $item['id']; ?></td>
                                    <td>
                                        <span class="acao-nome"><?php echo $item['acao']; ?></span>
                                    </td>
                                    <td>
                                        <span class="acao-descricao"><?php echo $item['descricao']; ?></span>
                                    </td>
                                    <td>
                                        <span class="badge badge-tipo badge-<?php echo $item['tipo']; ?>">
                                            <?php echo $tipos_acao[$item['tipo']] ?? $item['tipo']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-modulo">
                                            <i class="fas fa-cube"></i> <?php echo $item['modulo']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="data-hora">
                                            <i class="far fa-calendar-alt"></i>
                                            <?php echo date('d/m/Y H:i', strtotime($item['data'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="ip-address"><i class="fas fa-network-wired"></i> <?php echo $item['ip']; ?></span>
                                    </td>
                                    <td>
                                        <span class="usuario-nome"><i class="fas fa-user"></i> <?php echo $item['usuario']; ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="table-pagination" id="paginacaoHistorico">
                    <button class="page-btn prev" onclick="mudarPagina('prev')" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="page-btn active" data-page="1" onclick="irParaPagina(1)">1</button>
                    <button class="page-btn" data-page="2" onclick="irParaPagina(2)">2</button>
                    <button class="page-btn" data-page="3" onclick="irParaPagina(3)">3</button>
                    <button class="page-btn next" onclick="mudarPagina('next')">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DETALHE DA AÇÃO                      -->
    <!-- ========================================== -->
    <div class="modal" id="modalDetalheAcao">
        <div class="modal-overlay" onclick="fecharModal('modalDetalheAcao')"></div>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-info-circle"></i> Detalhe da Ação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalDetalheAcao')">&times;</button>
            </div>
            <div class="modal-body" id="detalheAcaoBody">
                <!-- Conteúdo injetado via JS -->
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="../assets/js/main.js"></script>
    <script>
        

        // ==========================================
        // TOGGLE SIDEBAR (Desktop)
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

            // Inicializar paginação
            const totalRows = document.querySelectorAll('#tabelaHistorico tbody tr').length;
            atualizarPaginacao(totalRows);

            // Adicionar clique nas linhas
            document.querySelectorAll('#tabelaHistorico tbody tr').forEach(row => {
                row.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const acao = this.querySelector('.acao-nome').textContent;
                    const descricao = this.querySelector('.acao-descricao').textContent;
                    const tipo = this.querySelector('.badge-tipo').textContent;
                    const modulo = this.querySelector('.badge-modulo').textContent.replace('fas fa-cube', '').trim();
                    const data = this.querySelector('.data-hora').textContent.trim();
                    const ip = this.querySelector('.ip-address').textContent.trim();
                    const usuario = this.querySelector('.usuario-nome').textContent.trim();
                    
                    abrirDetalheAcao(id, acao, descricao, tipo, modulo, data, ip, usuario);
                });
            });
        });

        // ==========================================
        // TOGGLE SIDEBAR (Mobile - Bottom Nav)
        // ==========================================
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
                    const icon = menuBtn.querySelector('i');
                    if (sidebar.classList.contains('open')) {
                        icon.className = 'fas fa-times';
                    } else {
                        icon.className = 'fas fa-bars';
                    }
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

                    if (menuBtn) {
                        const icon = menuBtn.querySelector('i');
                        if (icon) icon.className = 'fas fa-bars';
                    }
                }
            }
        });

        // ==========================================
        // NOTIFICAÇÕES - DROPDOWN
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            const btnNotif = document.getElementById('btnNotificacoes');
            const dropdown = document.getElementById('notificacoesDropdown');

            if (btnNotif && dropdown) {
                btnNotif.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                    if (dropdown.classList.contains('active')) {
                        carregarNotificacoes();
                    }
                });

                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }
        });

        function carregarNotificacoes() {
            const list = document.getElementById('notifList');
            if (!list) return;

            const naoLidas = mockNotificacoes.filter(n => !n.lida);
            const todas = mockNotificacoes;

            let html = '';

            if (naoLidas.length > 0) {
                html += '<div class="notif-group"><span class="notif-group-label">Não lidas</span>';
                naoLidas.forEach(n => {
                    html += criarNotificacaoItem(n);
                });
                html += '</div>';
            }

            const lidas = mockNotificacoes.filter(n => n.lida);
            if (lidas.length > 0) {
                html += '<div class="notif-group"><span class="notif-group-label">Lidas</span>';
                lidas.forEach(n => {
                    html += criarNotificacaoItem(n);
                });
                html += '</div>';
            }

            if (todas.length === 0) {
                html = `
                    <div class="notificacao-vazia">
                        <i class="fas fa-bell-slash"></i>
                        <p>Nenhuma notificação</p>
                    </div>
                `;
            }

            list.innerHTML = html;
        }

        function criarNotificacaoItem(notif) {
            return `
                <div class="notificacao-item ${notif.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${notif.id})">
                    <div class="notif-icon ${notif.icon_class}">
                        <i class="fas ${notif.icon}"></i>
                    </div>
                    <div class="notif-conteudo">
                        <p>${notif.mensagem}</p>
                        <span class="notif-tempo">${notif.tempo}</span>
                    </div>
                    ${!notif.lida ? '<span class="notif-dot"></span>' : ''}
                </div>
            `;
        }

        function marcarNotificacaoLida(id) {
            const notif = mockNotificacoes.find(n => n.id === id);
            if (notif) {
                notif.lida = true;
                atualizarBadge();
                carregarNotificacoes();
                mostrarToast('Notificação marcada como lida', 'info');
            }
        }

        function marcarTodasLidas() {
            mockNotificacoes.forEach(n => n.lida = true);
            atualizarBadge();
            carregarNotificacoes();
            mostrarToast('Todas as notificações foram marcadas como lidas', 'success');
            closeNotifications();
        }

        function atualizarBadge() {
            const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
            const badge = document.getElementById('notifBadge');
            const bottomBadge = document.getElementById('bottomNotifBadge');

            if (badge) {
                if (naoLidas > 0) {
                    badge.textContent = naoLidas;
                    badge.style.display = 'flex';
                } else {
                    badge.style.display = 'none';
                }
            }

            if (bottomBadge) {
                if (naoLidas > 0) {
                    bottomBadge.textContent = naoLidas;
                    bottomBadge.style.display = 'flex';
                } else {
                    bottomBadge.style.display = 'none';
                }
            }
        }

        function closeNotifications() {
            const dropdown = document.getElementById('notificacoesDropdown');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }

        // ==========================================
        // PERFIL - DROPDOWN
        // ==========================================

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

            const themeToggle = document.querySelector('.perfil-dropdown .theme-toggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('btnTheme')?.click();
                    dropdown.classList.remove('active');
                });
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
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple';
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                    this.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 600);

                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    const themeLabel = document.querySelector('.perfil-dropdown .theme-toggle');
                    if (themeLabel) {
                        const icon = themeLabel.querySelector('i');
                        if (newTheme === 'dark') {
                            icon.className = 'fas fa-moon';
                            themeLabel.innerHTML = '<i class="fas fa-moon"></i> Tema Escuro';
                        } else {
                            icon.className = 'fas fa-sun';
                            themeLabel.innerHTML = '<i class="fas fa-sun"></i> Tema Claro';
                        }
                    }

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ==========================================
        // TOAST NOTIFICATIONS
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
                warning: '#F59E0B',
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

        // ==========================================
        // FILTROS E PAGINAÇÃO
        // ==========================================

        let paginaAtual = 1;
        let itensPorPagina = 10;
        let totalItensVisiveis = 0;

        function aplicarFiltros() {
            const search = document.getElementById('searchHistorico').value.toLowerCase().trim();
            const tipo = document.getElementById('filterTipo').value;
            const modulo = document.getElementById('filterModulo').value;
            const data = document.getElementById('filterData').value;

            const rows = document.querySelectorAll('#tabelaHistorico tbody tr');
            let visiveis = 0;

            rows.forEach(row => {
                const acao = row.dataset.acao || '';
                const descricao = row.dataset.descricao || '';
                const rowTipo = row.dataset.tipo || '';
                const rowModulo = row.dataset.modulo || '';
                const rowData = row.dataset.data || '';

                let show = true;

                if (search) {
                    show = acao.includes(search) || descricao.includes(search);
                }

                if (show && tipo) {
                    show = rowTipo === tipo;
                }

                if (show && modulo) {
                    show = rowModulo === modulo;
                }

                if (show && data) {
                    show = rowData === data;
                }

                row.style.display = show ? '' : 'none';
                if (show) visiveis++;
            });

            totalItensVisiveis = visiveis;

            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            paginaAtual = 1;
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            } else {
                const container = document.getElementById('paginacaoHistorico');
                if (container) container.style.display = 'none';
                
                const tbody = document.getElementById('historicoBody');
                if (tbody) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="8" class="empty-state">
                                <i class="fas fa-history" style="font-size: 2rem; color: var(--text-muted);"></i>
                                <p style="margin-top: 8px; color: var(--text-muted);">Nenhuma ação encontrada</p>
                                <span style="font-size: var(--text-sm); color: var(--text-muted);">Tente ajustar os filtros para encontrar o que procura.</span>
                            </td>
                        </tr>
                    `;
                }
            }
        }

        function limparFiltros() {
            document.getElementById('searchHistorico').value = '';
            document.getElementById('filterTipo').value = '';
            document.getElementById('filterModulo').value = '';
            document.getElementById('filterData').value = '';

            document.querySelectorAll('#tabelaHistorico tbody tr').forEach(row => {
                row.style.display = '';
            });

            totalItensVisiveis = document.querySelectorAll('#tabelaHistorico tbody tr').length;
            
            const resultadosInfo = document.getElementById('resultadosInfo');
            if (resultadosInfo) {
                resultadosInfo.textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
            }

            // Restaurar tabela se estava vazia
            const tbody = document.getElementById('historicoBody');
            if (tbody) {
                const empty = tbody.querySelector('.empty-state');
                if (empty) {
                    location.reload();
                }
            }

            paginaAtual = 1;
            if (totalItensVisiveis > 0) {
                atualizarPaginacao(totalItensVisiveis);
            }
        }

        function atualizarPaginacao(total) {
            const totalPaginas = Math.ceil(total / itensPorPagina);
            const container = document.getElementById('paginacaoHistorico');

            if (!container) return;

            const prevBtn = container.querySelector('.prev');
            const nextBtn = container.querySelector('.next');

            container.innerHTML = '';
            container.appendChild(prevBtn);

            const maxVisible = 5;
            let startPage = Math.max(1, paginaAtual - 2);
            let endPage = Math.min(totalPaginas, startPage + maxVisible - 1);

            if (endPage - startPage < maxVisible - 1) {
                startPage = Math.max(1, endPage - maxVisible + 1);
            }

            if (startPage > 1) {
                const firstBtn = document.createElement('button');
                firstBtn.className = 'page-btn';
                firstBtn.textContent = '1';
                firstBtn.onclick = function() { irParaPagina(1); };
                container.appendChild(firstBtn);

                if (startPage > 2) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    container.appendChild(dots);
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                const btn = document.createElement('button');
                btn.className = 'page-btn' + (i === paginaAtual ? ' active' : '');
                btn.textContent = i;
                btn.onclick = function() { irParaPagina(i); };
                container.appendChild(btn);
            }

            if (endPage < totalPaginas) {
                if (endPage < totalPaginas - 1) {
                    const dots = document.createElement('span');
                    dots.className = 'page-dots';
                    dots.textContent = '…';
                    container.appendChild(dots);
                }
                const lastBtn = document.createElement('button');
                lastBtn.className = 'page-btn';
                lastBtn.textContent = totalPaginas;
                lastBtn.onclick = function() { irParaPagina(totalPaginas); };
                container.appendChild(lastBtn);
            }

            container.appendChild(nextBtn);

            prevBtn.disabled = paginaAtual <= 1 || totalPaginas <= 1;
            nextBtn.disabled = paginaAtual >= totalPaginas || totalPaginas <= 1;

            // Mostrar apenas os registros da página atual
            mostrarPagina(paginaAtual);
        }

        function mostrarPagina(page) {
            const rows = document.querySelectorAll('#tabelaHistorico tbody tr:not([style*="display: none"])');
            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;

            document.querySelectorAll('#tabelaHistorico tbody tr').forEach(row => {
                if (row.style.display !== 'none') {
                    row.style.display = 'none';
                }
            });

            rows.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = '';
                }
            });
        }

        function irParaPagina(page) {
            paginaAtual = page;
            const totalRows = document.querySelectorAll('#tabelaHistorico tbody tr:not([style*="display: none"])').length;
            if (totalRows > 0) {
                atualizarPaginacao(totalRows);
            }
        }

        function mudarPagina(direcao) {
            const totalRows = document.querySelectorAll('#tabelaHistorico tbody tr:not([style*="display: none"])').length;
            const totalPaginas = Math.ceil(totalRows / itensPorPagina);
            if (direcao === 'prev' && paginaAtual > 1) {
                irParaPagina(paginaAtual - 1);
            } else if (direcao === 'next' && paginaAtual < totalPaginas) {
                irParaPagina(paginaAtual + 1);
            }
        }

        // ==========================================
        // DETALHE DA AÇÃO - MODAL
        // ==========================================

        function abrirDetalheAcao(id, acao, descricao, tipo, modulo, data, ip, usuario) {
            const body = document.getElementById('detalheAcaoBody');
            
            // Cores por tipo
            const cores = {
                'criacao': '#00FFA3',
                'edicao': '#00D2FF',
                'acesso': '#6C2BD9',
                'pagamento': '#FFD93D',
                'upload': '#6BCB77',
                'validacao': '#00FFA3',
                'suspensao': '#FF6B6B',
                'reativacao': '#00FFA3',
                'conclusao': '#00FFA3'
            };

            const cor = cores[tipo] || '#00D2FF';

            body.innerHTML = `
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <div style="display: flex; align-items: center; gap: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
                        <div style="width: 50px; height: 50px; border-radius: 50%; background: ${cor}20; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: ${cor};">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div>
                            <h4 style="font-family: var(--font-title); font-size: var(--text-h4); color: var(--text-primary);">${acao}</h4>
                            <span style="font-size: var(--text-sm); color: var(--text-muted);">ID: #${id}</span>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Descrição</span>
                        <span class="detail-value">${descricao}</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Tipo</span>
                        <span class="detail-value"><span class="badge badge-tipo badge-${tipo}">${tipo}</span></span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Módulo</span>
                        <span class="detail-value"><span class="badge badge-modulo"><i class="fas fa-cube"></i> ${modulo}</span></span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Data/Hora</span>
                        <span class="detail-value"><i class="far fa-calendar-alt"></i> ${data}</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">IP</span>
                        <span class="detail-value"><i class="fas fa-network-wired"></i> ${ip}</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Usuário</span>
                        <span class="detail-value"><i class="fas fa-user"></i> ${usuario}</span>
                    </div>
                </div>
            `;

            document.getElementById('modalDetalheAcao').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // ==========================================
        // EXPORTAÇÃO
        // ==========================================

        function exportarHistorico() {
            mostrarToast('Exportando histórico...', 'info');
            setTimeout(() => {
                mostrarToast('Histórico exportado com sucesso!', 'success');
            }, 1500);
        }

        // ==========================================
        // MODAIS
        // ==========================================

        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal.active').forEach(modal => {
                    fecharModal(modal.id);
                });
            }
        });
    </script>

    <style>
        /* ========================================== */
        /* HISTÓRICO - CSS COMPLETO                   */
        /* ========================================== */

        /* ===== INFO BAR ===== */
        .profissional-info-bar {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            flex-wrap: wrap;
        }

        .profissional-info-bar .info-avatar img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--border-color);
        }

        .profissional-info-bar .info-dados {
            flex: 1;
        }

        .profissional-info-bar .info-dados h3 {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        .profissional-info-bar .info-dados p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 2px 0;
        }

        .profissional-info-bar .info-dados p i {
            width: 18px;
            color: var(--color-turquoise);
        }

        .profissional-info-bar .info-status {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 4px;
        }

        .profissional-info-bar .info-status .data-registo {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .profissional-info-bar .info-status .data-registo i {
            margin-right: 4px;
        }

        /* ===== FILTRO BAR ===== */
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
            color: var(--color-turquoise);
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
            border-color: var(--color-turquoise);
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
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

        /* ========================================== */
        /* TABELA DE HISTÓRICO                        */
        /* ========================================== */

        .historico-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .historico-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-historico {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
        }

        .table-historico thead {
            background: var(--bg-input);
            border-radius: var(--radius-sm);
        }

        .table-historico thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 10px 12px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
        }

        .table-historico tbody td {
            padding: 8px 12px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-historico tbody tr {
            transition: var(--transition-smooth);
            cursor: pointer;
        }

        .table-historico tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-historico tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== BADGES ===== */
        .badge-tipo {
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-tipo.badge-criacao {
            background: rgba(0, 255, 163, 0.15);
            color: var(--color-future-green);
        }

        .badge-tipo.badge-edicao {
            background: rgba(0, 210, 255, 0.15);
            color: var(--color-turquoise);
        }

        .badge-tipo.badge-acesso {
            background: rgba(108, 43, 217, 0.15);
            color: var(--color-aurora);
        }

        .badge-tipo.badge-pagamento {
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
        }

        .badge-tipo.badge-upload {
            background: rgba(107, 203, 119, 0.15);
            color: #6BCB77;
        }

        .badge-tipo.badge-validacao {
            background: rgba(0, 255, 163, 0.15);
            color: var(--color-future-green);
        }

        .badge-tipo.badge-suspensao {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
        }

        .badge-tipo.badge-reativacao {
            background: rgba(0, 255, 163, 0.15);
            color: var(--color-future-green);
        }

        .badge-tipo.badge-conclusao {
            background: rgba(0, 255, 163, 0.15);
            color: var(--color-future-green);
        }

        .badge-modulo {
            background: var(--bg-input);
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .badge-modulo i {
            margin-right: 4px;
            color: var(--color-turquoise);
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
        }

        .empty-state i {
            font-size: 2rem;
            color: var(--text-muted);
        }

        .empty-state p {
            margin-top: 8px;
            color: var(--text-muted);
        }

        .empty-state span {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* PAGINAÇÃO                                 */
        /* ========================================== */

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
            border-color: var(--color-turquoise);
            color: var(--color-turquoise);
            background: rgba(0, 210, 255, 0.04);
        }

        .table-pagination .page-btn.active {
            background: var(--gradient-geo);
            color: white;
            border-color: var(--color-turquoise);
        }

        .table-pagination .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
        }

        .table-pagination .page-dots {
            color: var(--text-muted);
            padding: 0 4px;
            font-size: var(--text-sm);
        }

        /* ========================================== */
        /* MODAL DETALHE                             */
        /* ========================================== */

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
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
            max-width: 500px;
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
            color: var(--color-turquoise);
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

        .modal-body .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-body .detail-item:last-child {
            border-bottom: none;
        }

        .modal-body .detail-item .detail-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .modal-body .detail-item .detail-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            text-align: right;
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

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

            .table-historico thead th {
                font-size: var(--text-xs);
                padding: 8px 10px;
            }

            .table-historico tbody td {
                padding: 6px 10px;
            }
        }

        @media (max-width: 768px) {
            .profissional-info-bar {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profissional-info-bar .info-status {
                align-items: center;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }

            .table-historico thead {
                display: none;
            }

            .table-historico tbody tr {
                display: block;
                margin-bottom: var(--space-md);
                border: 1px solid var(--border-color);
                border-radius: var(--radius-sm);
                padding: var(--space-sm);
            }

            .table-historico tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 4px 8px;
                border-bottom: 1px solid var(--border-color);
            }

            .table-historico tbody td:last-child {
                border-bottom: none;
            }

            .table-historico tbody td::before {
                content: attr(data-label);
                font-weight: 600;
                color: var(--text-muted);
                font-size: var(--text-xs);
            }

            .table-historico tbody td:first-child {
                display: none;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .modal-body .detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
            }

            .modal-body .detail-item .detail-value {
                text-align: left;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .filter-bar-admin {
                padding: 10px 12px;
                gap: 6px;
            }

            .filter-bar-admin .filter-group label {
                font-size: var(--text-xs);
            }

            .filter-bar-admin select,
            .filter-bar-admin input {
                font-size: var(--text-sm);
                padding: 4px 8px;
            }

            .table-pagination .page-btn {
                min-width: 28px;
                height: 28px;
                font-size: var(--text-xs);
            }

            .modal-header {
                padding: 14px 18px;
            }

            .modal-header .modal-title {
                font-size: var(--text-sm);
            }

            .modal-body {
                padding: 18px;
            }

            .profissional-info-bar {
                padding: var(--space-md);
            }

            .historico-container {
                padding: var(--space-sm);
            }
        }
    </style>

</body>
</html>