<?php
// painel/admin/suporte-tickets.php - Gestão de Tickets de Suporte
// Para Empresas, Profissionais e Instituições
include "../../includes/admin/notificacoes-admin-count.php";

$titulo_pagina = 'Gestão de Tickets';
$pagina_atual = 'suporte-tickets';

// Dados mockados
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;


// Dados mockados - Tickets de Empresas, Profissionais e Instituições
$tickets = [
    [
        'id' => 1,
        'titulo' => 'Problema com login no sistema',
        'descricao' => 'Não consigo aceder à minha conta desde ontem. Já tentei recuperar a senha mas não recebo o email de recuperação. Isso está impactando meu trabalho.',
        'categoria' => 'Suporte Técnico',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'status' => 'aberto',
        'status_label' => 'Aberto',
        'criado_por' => 'Carlos Mendes',
        'criado_por_avatar' => 'avatar-1.png',
        'criado_por_tipo' => 'Profissional',
        'criado_por_email' => 'carlos@topografia.pt',
        'criado_por_telefone' => '+244 923 456 100',
        'criado_em' => '2026-02-18 09:00:00',
        'responsavel' => null,
        'ultima_atualizacao' => '2026-02-18 09:00:00',
        'respostas' => []
    ],
    [
        'id' => 2,
        'titulo' => 'Erro no upload de documentos - Arquivo muito grande',
        'descricao' => 'Ao tentar fazer upload de documentos para o projeto "Levantamento GIS", aparece o erro "Arquivo muito grande". O arquivo tem apenas 4MB e o limite deveria ser 10MB.',
        'categoria' => 'Suporte Técnico',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'criado_por' => 'Ana Costa',
        'criado_por_avatar' => 'avatar-2.png',
        'criado_por_tipo' => 'Profissional',
        'criado_por_email' => 'ana@engenharia.pt',
        'criado_por_telefone' => '+244 923 456 101',
        'criado_em' => '2026-02-17 14:30:00',
        'responsavel' => 'Administrador',
        'ultima_atualizacao' => '2026-02-18 10:00:00',
        'respostas' => [
            ['autor' => 'Administrador', 'data' => '2026-02-18 10:00:00', 'texto' => 'Olá Ana, vamos verificar o limite de upload. Pode tentar comprimir o arquivo para menos de 2MB?'],
            ['autor' => 'Ana Costa', 'data' => '2026-02-18 11:30:00', 'texto' => 'Já tentei comprimir mas continua dando erro. O limite atual é de 2MB, mas precisamos de pelo menos 5MB para os documentos do projeto.']
        ]
    ],
    [
        'id' => 3,
        'titulo' => 'Dúvida sobre plano de assinatura Enterprise',
        'descricao' => 'Gostaria de entender as diferenças entre os planos Pro e Enterprise. Qual é mais adequado para uma empresa com 15 funcionários e 3 departamentos?',
        'categoria' => 'Dúvidas',
        'prioridade' => 'baixa',
        'prioridade_label' => 'Baixa',
        'status' => 'respondido',
        'status_label' => 'Respondido',
        'criado_por' => 'Construtora ABC',
        'criado_por_avatar' => 'empresa-1.png',
        'criado_por_tipo' => 'Empresa',
        'criado_por_email' => 'contato@construtoraabc.com',
        'criado_por_telefone' => '+244 923 456 200',
        'criado_em' => '2026-02-17 09:15:00',
        'responsavel' => 'Administrador',
        'ultima_atualizacao' => '2026-02-17 16:00:00',
        'respostas' => [
            ['autor' => 'Administrador', 'data' => '2026-02-17 16:00:00', 'texto' => 'Olá! O plano Pro é indicado para até 10 utilizadores, enquanto o Enterprise é para empresas maiores com múltiplos departamentos. Para 15 funcionários, recomendo o Enterprise.']
        ]
    ],
    [
        'id' => 4,
        'titulo' => 'Sugestão: Módulo de análise em tempo real',
        'descricao' => 'Gostaria de sugerir a inclusão de um módulo de análise de dados em tempo real para monitoramento de obras e projetos de engenharia civil.',
        'categoria' => 'Sugestão',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'status' => 'fechado',
        'status_label' => 'Fechado',
        'criado_por' => 'Instituto Técnico de Luanda',
        'criado_por_avatar' => 'instituicao-1.png',
        'criado_por_tipo' => 'Instituição',
        'criado_por_email' => 'contato@itl.edu.ao',
        'criado_por_telefone' => '+244 923 456 300',
        'criado_em' => '2026-02-16 11:00:00',
        'responsavel' => 'Administrador',
        'ultima_atualizacao' => '2026-02-17 08:00:00',
        'respostas' => [
            ['autor' => 'Administrador', 'data' => '2026-02-16 14:00:00', 'texto' => 'Obrigado pela sugestão! Vamos analisar a viabilidade técnica para inclusão no roadmap.'],
            ['autor' => 'Administrador', 'data' => '2026-02-17 08:00:00', 'texto' => 'Sugestão aprovada! Será incluída na versão 3.0 do sistema, prevista para o próximo semestre.']
        ]
    ],
    [
        'id' => 5,
        'titulo' => 'Problema com faturação - Desconto não aplicado - URGENTE',
        'descricao' => 'A fatura do mês de janeiro foi emitida com valor incorreto. O desconto de 15% promocional não foi aplicado. Necessito de correção urgente para apresentar à contabilidade.',
        'categoria' => 'Financeiro',
        'prioridade' => 'urgente',
        'prioridade_label' => 'Urgente',
        'status' => 'aberto',
        'status_label' => 'Aberto',
        'criado_por' => 'Energia Futuro',
        'criado_por_avatar' => 'empresa-8.png',
        'criado_por_tipo' => 'Empresa',
        'criado_por_email' => 'contato@energiafuturo.com',
        'criado_por_telefone' => '+244 923 456 201',
        'criado_em' => '2026-02-18 08:30:00',
        'responsavel' => null,
        'ultima_atualizacao' => '2026-02-18 08:30:00',
        'respostas' => []
    ],
    [
        'id' => 6,
        'titulo' => 'Como exportar dados GIS para Shapefile?',
        'descricao' => 'Preciso exportar os dados GIS para formato Shapefile para integrar com o sistema do cliente. Poderiam me orientar sobre o processo?',
        'categoria' => 'Dúvidas',
        'prioridade' => 'baixa',
        'prioridade_label' => 'Baixa',
        'status' => 'resolvido',
        'status_label' => 'Resolvido',
        'criado_por' => 'Marisa Lima',
        'criado_por_avatar' => 'avatar-4.png',
        'criado_por_tipo' => 'Profissional',
        'criado_por_email' => 'marisa@agricultura.pt',
        'criado_por_telefone' => '+244 923 456 103',
        'criado_em' => '2026-02-15 10:00:00',
        'responsavel' => 'Administrador',
        'ultima_atualizacao' => '2026-02-15 15:00:00',
        'respostas' => [
            ['autor' => 'Administrador', 'data' => '2026-02-15 15:00:00', 'texto' => 'Olá Marisa! Para exportar dados GIS para Shapefile, acesse o menu "Exportar" na página do projeto, selecione o formato Shapefile e escolha as camadas desejadas. O arquivo será baixado em formato ZIP.']
        ]
    ],
    [
        'id' => 7,
        'titulo' => 'Formação em GIS para professores',
        'descricao' => 'Gostaria de solicitar informações sobre a formação em GIS para professores do ensino técnico. Temos interesse em capacitar 15 professores.',
        'categoria' => 'Formação',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'criado_por' => 'Instituto de Ensino Técnico do Bié',
        'criado_por_avatar' => 'instituicao-8.png',
        'criado_por_tipo' => 'Instituição',
        'criado_por_email' => 'contato@ietb.edu.ao',
        'criado_por_telefone' => '+244 923 456 207',
        'criado_em' => '2026-02-14 13:00:00',
        'responsavel' => 'Administrador',
        'ultima_atualizacao' => '2026-02-15 09:00:00',
        'respostas' => [
            ['autor' => 'Administrador', 'data' => '2026-02-15 09:00:00', 'texto' => 'Olá! Temos um programa de formação em GIS para instituições de ensino. Vou enviar a proposta detalhada por email. Aguarde.']
        ]
    ]
];

// Estatísticas
$total_tickets = count($tickets);
$total_abertos = count(array_filter($tickets, function($t) { return $t['status'] === 'aberto'; }));
$total_em_andamento = count(array_filter($tickets, function($t) { return $t['status'] === 'em_andamento'; }));
$total_resolvidos = count(array_filter($tickets, function($t) { return $t['status'] === 'resolvido' || $t['status'] === 'respondido'; }));
$total_fechados = count(array_filter($tickets, function($t) { return $t['status'] === 'fechado'; }));

// Categorias
$categorias = array_unique(array_column($tickets, 'categoria'));
sort($categorias);

// Status
$status_opcoes = [
    'aberto' => 'Aberto',
    'em_andamento' => 'Em Andamento',
    'respondido' => 'Respondido',
    'resolvido' => 'Resolvido',
    'fechado' => 'Fechado'
];

// Prioridades
$prioridades = [
    'baixa' => 'Baixa',
    'media' => 'Média',
    'alta' => 'Alta',
    'urgente' => 'Urgente'
];

function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    $diff = time() - strtotime($datetime);
    if ($diff < 60) return 'há ' . $diff . ' segundos';
    if ($diff < 3600) return 'há ' . floor($diff / 60) . ' minutos';
    if ($diff < 86400) return 'há ' . floor($diff / 3600) . ' horas';
    if ($diff < 604800) return 'há ' . floor($diff / 86400) . ' dias';
    return date('d/m/Y H:i', strtotime($datetime));
}

function getStatusColor($status) {
    $cores = [
        'aberto' => '#FF6B6B',
        'em_andamento' => '#00D2FF',
        'respondido' => '#FFD93D',
        'resolvido' => '#00FFA3',
        'fechado' => '#6B7A8F'
    ];
    return $cores[$status] ?? '#6B7A8F';
}

function getPrioridadeColor($prioridade) {
    $cores = [
        'baixa' => '#6B7A8F',
        'media' => '#00D2FF',
        'alta' => '#FFD93D',
        'urgente' => '#FF6B6B'
    ];
    return $cores[$prioridade] ?? '#6B7A8F';
}

function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6C2BD9&color=fff&size=80';
}

function limitText($text, $limit = 100) {
    if (!$text) return '';
    $text = strip_tags($text);
    if (strlen($text) > $limit) return substr($text, 0, $limit) . '...';
    return $text;
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
    ['icon' => 'fa-ticket-alt', 'label' => 'Tickets', 'link' => 'suporte-tickets.php', 'active' => true],
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
                    <?php if ($item['label'] === 'Tickets'): ?>
                        <span class="badge badge-danger"><?php echo $total_abertos + $total_em_andamento; ?></span>
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
                    <i class="fas fa-ticket-alt icon"></i>
                    Tickets de Suporte
                    <span class="badge badge-danger" style="font-size: 0.7rem; margin-left: 8px;"><?php echo $total_abertos + $total_em_andamento; ?> ativos</span>
                </h1>
                <p class="breadcrumb"><a href="index.php">Dashboard</a> <span class="separator">/</span> <span>Tickets</span></p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme"><i class="fas fa-sun theme-icon sun"></i><i class="fas fa-moon theme-icon moon"></i></button>
                               <?php include "../../includes/admin/notificacoes-admin.php" ?>

                <div class="header-actions">
                    <button class="btn btn-primary" data-modal="modalNovoTicket"><i class="fas fa-plus"></i> Novo Ticket</button>
                    <button class="btn btn-outline" onclick="exportarTickets()"><i class="fas fa-file-export"></i> Exportar</button>
                </div>
            </div>
        </header>

        <section class="stats-grid animate-fade-up">
            <div class="stat-card"><div class="icon aurora"><i class="fas fa-ticket-alt"></i></div><div class="value"><?php echo $total_tickets; ?></div><div class="label">Total de Tickets</div><div class="trend up"><i class="fas fa-arrow-up"></i> 12.5%</div></div>
            <div class="stat-card"><div class="icon red"><i class="fas fa-circle" style="color: #FF6B6B;"></i></div><div class="value"><?php echo $total_abertos; ?></div><div class="label">Abertos</div><div class="trend down"><i class="fas fa-arrow-down"></i> 3.2%</div></div>
            <div class="stat-card"><div class="icon blue"><i class="fas fa-spinner"></i></div><div class="value"><?php echo $total_em_andamento; ?></div><div class="label">Em Andamento</div><div class="trend up"><i class="fas fa-arrow-up"></i> 8.1%</div></div>
            <div class="stat-card"><div class="icon green"><i class="fas fa-check-circle"></i></div><div class="value"><?php echo $total_resolvidos; ?></div><div class="label">Resolvidos</div><div class="trend up"><i class="fas fa-arrow-up"></i> 15.3%</div></div>
        </section>

        <div class="filter-bar-admin animate-fade-up">
            <div class="filter-group"><label><i class="fas fa-search"></i></label><input type="text" id="searchTicket" placeholder="Pesquisar ticket..." oninput="aplicarFiltros()"></div>
            <div class="filter-group"><label>Status</label><select id="filterStatus" onchange="aplicarFiltros()"><option value="">Todos</option><?php foreach ($status_opcoes as $v => $l): ?><option value="<?php echo $v; ?>"><?php echo $l; ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Categoria</label><select id="filterCategoria" onchange="aplicarFiltros()"><option value="">Todas</option><?php foreach ($categorias as $c): ?><option value="<?php echo $c; ?>"><?php echo $c; ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Prioridade</label><select id="filterPrioridade" onchange="aplicarFiltros()"><option value="">Todas</option><?php foreach ($prioridades as $v => $l): ?><option value="<?php echo $v; ?>"><?php echo $l; ?></option><?php endforeach; ?></select></div>
            <div class="filter-group"><label>Tipo</label><select id="filterTipo" onchange="aplicarFiltros()"><option value="">Todos</option><option value="Profissional">Profissional</option><option value="Empresa">Empresa</option><option value="Instituição">Instituição</option></select></div>
            <div class="filter-actions"><button class="btn btn-sm btn-primary" onclick="aplicarFiltros()"><i class="fas fa-filter"></i> Filtrar</button><button class="btn btn-sm btn-outline" onclick="limparFiltros()"><i class="fas fa-undo"></i> Limpar</button></div>
            <span class="resultados-info" id="resultadosInfo"><?php echo $total_tickets; ?> resultados</span>
        </div>

        <div class="tickets-container">
            <div class="tickets-list" id="ticketsList">
                <?php foreach ($tickets as $ticket): ?>
                    <div class="ticket-item <?php echo $ticket['status']; ?> animate-fade-up"
                         data-id="<?php echo $ticket['id']; ?>"
                         data-status="<?php echo $ticket['status']; ?>"
                         data-categoria="<?php echo $ticket['categoria']; ?>"
                         data-prioridade="<?php echo $ticket['prioridade']; ?>"
                         data-tipo="<?php echo $ticket['criado_por_tipo']; ?>"
                         data-titulo="<?php echo strtolower($ticket['titulo']); ?>"
                         data-criado="<?php echo strtolower($ticket['criado_por']); ?>"
                         onclick="abrirTicket(<?php echo $ticket['id']; ?>)">
                        <div class="ticket-status">
                            <span class="status-dot" style="background: <?php echo getStatusColor($ticket['status']); ?>;" title="<?php echo $ticket['status_label']; ?>"></span>
                        </div>
                        <div class="ticket-avatar">
                            <img src="../../assets/images/<?php echo $ticket['criado_por_avatar']; ?>" alt="<?php echo $ticket['criado_por']; ?>" onerror="this.src='<?php echo getAvatarUrl($ticket['criado_por']); ?>'">
                            <span class="criado-tipo <?php echo strtolower($ticket['criado_por_tipo']); ?>"><?php echo $ticket['criado_por_tipo']; ?></span>
                        </div>
                        <div class="ticket-conteudo">
                            <div class="ticket-header">
                                <span class="ticket-id">#<?php echo $ticket['id']; ?></span>
                                <span class="ticket-titulo"><strong><?php echo $ticket['titulo']; ?></strong></span>
                            </div>
                            <div class="ticket-meta">
                                <span class="meta-item"><i class="fas fa-user"></i> <?php echo $ticket['criado_por']; ?></span>
                                <span class="meta-item"><i class="far fa-clock"></i> <?php echo formatDateTime($ticket['criado_em']); ?></span>
                                <span class="meta-item"><i class="fas fa-tag"></i> <?php echo $ticket['categoria']; ?></span>
                            </div>
                            <div class="ticket-descricao"><?php echo limitText($ticket['descricao'], 80); ?></div>
                            <div class="ticket-footer">
                                <span class="badge badge-status status-<?php echo $ticket['status']; ?>"><?php echo $ticket['status_label']; ?></span>
                                <span class="badge badge-prioridade prioridade-<?php echo $ticket['prioridade']; ?>">
                                    <i class="fas fa-flag"></i> <?php echo $ticket['prioridade_label']; ?>
                                </span>
                                <?php if (!empty($ticket['respostas'])): ?>
                                    <span class="badge badge-respostas"><i class="fas fa-comment"></i> <?php echo count($ticket['respostas']); ?></span>
                                <?php endif; ?>
                                <?php if ($ticket['responsavel']): ?>
                                    <span class="badge badge-responsavel"><i class="fas fa-user-check"></i> <?php echo $ticket['responsavel']; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="ticket-acoes">
                            <button class="btn btn-sm btn-outline" onclick="event.stopPropagation(); abrirTicket(<?php echo $ticket['id']; ?>)"><i class="fas fa-eye"></i></button>
                            <?php if ($ticket['status'] === 'aberto'): ?>
                                <button class="btn btn-sm btn-primary" onclick="event.stopPropagation(); atribuirTicket(<?php echo $ticket['id']; ?>)"><i class="fas fa-user-check"></i></button>
                            <?php endif; ?>
                            <?php if ($ticket['status'] === 'em_andamento' || $ticket['status'] === 'respondido'): ?>
                                <button class="btn btn-sm btn-success" onclick="event.stopPropagation(); resolverTicket(<?php echo $ticket['id']; ?>)"><i class="fas fa-check"></i></button>
                            <?php endif; ?>
                            <button class="btn btn-sm btn-danger" onclick="event.stopPropagation(); excluirTicket(<?php echo $ticket['id']; ?>)"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="table-pagination" id="paginacaoTickets">
                <button class="page-btn prev" onclick="mudarPagina('prev')" disabled><i class="fas fa-chevron-left"></i></button>
                <span class="page-info">1 de 1</span>
                <button class="page-btn next" onclick="mudarPagina('next')" disabled><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </main>
</div>

<!-- MODAL DETALHE TICKET -->
<div class="modal" id="modalTicket">
    <div class="modal-overlay" onclick="fecharModal('modalTicket')"></div>
    <div class="modal-content" style="max-width: 750px;">
        <div class="modal-header"><h3 class="modal-title"><i class="fas fa-ticket-alt"></i> Ticket <span id="ticketNumero">#1</span></h3><button class="modal-close" onclick="fecharModal('modalTicket')">&times;</button></div>
        <div class="modal-body" id="ticketDetalhe"></div>
    </div>
</div>

<!-- MODAL RESPONDER TICKET -->
<div class="modal" id="modalResponderTicket">
    <div class="modal-overlay" onclick="fecharModal('modalResponderTicket')"></div>
    <div class="modal-content" style="max-width: 650px;">
        <div class="modal-header"><h3 class="modal-title"><i class="fas fa-reply"></i> Responder Ticket</h3><button class="modal-close" onclick="fecharModal('modalResponderTicket')">&times;</button></div>
        <div class="modal-body">
            <form id="formResponderTicket" onsubmit="enviarRespostaTicket(event)">
                <div class="form-group"><label class="form-label">Ticket</label><input type="text" class="form-control" id="ticketResponderAssunto" readonly style="background: var(--bg-input); cursor: not-allowed;"></div>
                <div class="form-group"><label class="form-label">Resposta <span class="required">*</span></label><textarea class="form-control" id="ticketRespostaTexto" rows="5" placeholder="Escreva sua resposta..." required></textarea></div>
                <input type="hidden" id="ticketResponderId" value="">
            </form>
        </div>
        <div class="modal-footer"><button class="btn btn-outline" onclick="fecharModal('modalResponderTicket')">Cancelar</button><button class="btn btn-primary" onclick="document.getElementById('formResponderTicket').submit()"><i class="fas fa-paper-plane"></i> Enviar</button></div>
    </div>
</div>

<!-- MODAL NOVO TICKET -->
<div class="modal" id="modalNovoTicket">
    <div class="modal-overlay" onclick="fecharModal('modalNovoTicket')"></div>
    <div class="modal-content" style="max-width: 650px;">
        <div class="modal-header"><h3 class="modal-title"><i class="fas fa-plus"></i> Novo Ticket</h3><button class="modal-close" onclick="fecharModal('modalNovoTicket')">&times;</button></div>
        <div class="modal-body">
            <form id="formNovoTicket" onsubmit="criarTicket(event)">
                <div class="form-group"><label class="form-label">Título <span class="required">*</span></label><input type="text" class="form-control" id="novoTicketTitulo" placeholder="Título do ticket" required></div>
                <div class="form-group"><label class="form-label">Categoria <span class="required">*</span></label><select class="form-control" id="novoTicketCategoria" required><option value="">Selecione...</option><?php foreach ($categorias as $c): ?><option value="<?php echo $c; ?>"><?php echo $c; ?></option><?php endforeach; ?></select></div>
                <div class="form-group"><label class="form-label">Prioridade <span class="required">*</span></label><select class="form-control" id="novoTicketPrioridade" required><option value="">Selecione...</option><?php foreach ($prioridades as $v => $l): ?><option value="<?php echo $v; ?>"><?php echo $l; ?></option><?php endforeach; ?></select></div>
                <div class="form-group"><label class="form-label">Tipo de Utilizador <span class="required">*</span></label><select class="form-control" id="novoTicketTipo" required><option value="">Selecione...</option><option value="Profissional">Profissional</option><option value="Empresa">Empresa</option><option value="Instituição">Instituição</option></select></div>
                <div class="form-group"><label class="form-label">Descrição <span class="required">*</span></label><textarea class="form-control" id="novoTicketDescricao" rows="4" placeholder="Descreva o problema ou solicitação..." required></textarea></div>
                <div class="form-group"><label class="form-label">Criado por</label><input type="text" class="form-control" id="novoTicketCriadoPor" placeholder="Nome do solicitante"></div>
            </form>
        </div>
        <div class="modal-footer"><button class="btn btn-outline" onclick="fecharModal('modalNovoTicket')">Cancelar</button><button class="btn btn-primary" onclick="document.getElementById('formNovoTicket').submit()"><i class="fas fa-save"></i> Criar</button></div>
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
const ticketsData = <?php echo json_encode($tickets); ?>;

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
    const total = document.querySelectorAll('.ticket-item').length;
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
    const searchInput = document.getElementById('searchTicket');
    if (searchInput) {
        let timeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(aplicarFiltros, 300);
        });
    }
    // Modal triggers
    document.querySelectorAll('[data-modal]').forEach(btn => {
        btn.addEventListener('click', function() { abrirModal(this.dataset.modal); });
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

// ===== FILTROS E PAGINAÇÃO =====
let paginaAtual = 1, itensPorPagina = 8, totalItensVisiveis = 0;

function aplicarFiltros() {
    const search = document.getElementById('searchTicket').value.toLowerCase().trim();
    const status = document.getElementById('filterStatus').value;
    const categoria = document.getElementById('filterCategoria').value;
    const prioridade = document.getElementById('filterPrioridade').value;
    const tipo = document.getElementById('filterTipo').value;
    const items = document.querySelectorAll('.ticket-item');
    let visiveis = 0;
    items.forEach(item => {
        const titulo = item.dataset.titulo || '';
        const criado = item.dataset.criado || '';
        const itemStatus = item.dataset.status || '';
        const itemCategoria = item.dataset.categoria || '';
        const itemPrioridade = item.dataset.prioridade || '';
        const itemTipo = item.dataset.tipo || '';
        let show = true;
        if (search) show = titulo.includes(search) || criado.includes(search);
        if (show && status) show = itemStatus === status;
        if (show && categoria) show = itemCategoria === categoria;
        if (show && prioridade) show = itemPrioridade === prioridade;
        if (show && tipo) show = itemTipo === tipo;
        item.style.display = show ? '' : 'none';
        if (show) visiveis++;
    });
    totalItensVisiveis = visiveis;
    document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
    paginaAtual = 1;
    if (totalItensVisiveis > 0) { atualizarPaginacao(totalItensVisiveis); } 
    else {
        document.getElementById('paginacaoTickets').style.display = 'none';
        document.querySelector('.tickets-list').innerHTML = `<div class="empty-state-admin"><div class="empty-icon"><i class="fas fa-ticket-alt"></i></div><h4>Nenhum ticket encontrado</h4><p>Tente ajustar os filtros.</p></div>`;
    }
}

function limparFiltros() {
    document.getElementById('searchTicket').value = '';
    document.getElementById('filterStatus').value = '';
    document.getElementById('filterCategoria').value = '';
    document.getElementById('filterPrioridade').value = '';
    document.getElementById('filterTipo').value = '';
    document.querySelectorAll('.ticket-item').forEach(item => item.style.display = '');
    totalItensVisiveis = document.querySelectorAll('.ticket-item').length;
    document.getElementById('resultadosInfo').textContent = `${totalItensVisiveis} resultado${totalItensVisiveis !== 1 ? 's' : ''}`;
    if (document.querySelector('.tickets-list .empty-state-admin')) location.reload();
    paginaAtual = 1;
    if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
}

function atualizarPaginacao(total) {
    const totalPaginas = Math.ceil(total / itensPorPagina);
    const container = document.getElementById('paginacaoTickets');
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
    const items = document.querySelectorAll('.ticket-item:not([style*="display: none"])');
    const start = (page - 1) * itensPorPagina;
    const end = start + itensPorPagina;
    document.querySelectorAll('.ticket-item').forEach(item => { if (item.style.display !== 'none') item.style.display = 'none'; });
    items.forEach((item, index) => { if (index >= start && index < end) item.style.display = ''; });
}

function irParaPagina(page) {
    paginaAtual = page;
    if (totalItensVisiveis > 0) atualizarPaginacao(totalItensVisiveis);
    document.querySelector('.tickets-container')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function mudarPagina(direcao) {
    const totalPaginas = Math.ceil(totalItensVisiveis / itensPorPagina);
    if (direcao === 'prev' && paginaAtual > 1) irParaPagina(paginaAtual - 1);
    else if (direcao === 'next' && paginaAtual < totalPaginas) irParaPagina(paginaAtual + 1);
}

// ===== ABRIR TICKET =====
function abrirTicket(id) {
    const ticket = ticketsData.find(t => t.id === id);
    if (!ticket) return;
    const body = document.getElementById('ticketDetalhe');
    document.getElementById('ticketNumero').textContent = '#' + ticket.id;
    
    let respostasHtml = '';
    if (ticket.respostas && ticket.respostas.length > 0) {
        respostasHtml = `<div class="ticket-respostas"><h4><i class="fas fa-comments"></i> Respostas (${ticket.respostas.length})</h4>`;
        ticket.respostas.forEach(r => {
            respostasHtml += `
                <div class="resposta-item">
                    <div class="resposta-header">
                        <strong>${r.autor}</strong>
                        <span class="resposta-data">${formatDateTime(r.data)}</span>
                    </div>
                    <div class="resposta-texto">${r.texto}</div>
                </div>
            `;
        });
        respostasHtml += `</div>`;
    }

    body.innerHTML = `
        <div class="ticket-detalhe-header">
            <div class="ticket-detalhe-info">
                <h4>${ticket.titulo}</h4>
                <div class="ticket-meta-detalhe">
                    <span class="badge badge-status status-${ticket.status}">${ticket.status_label}</span>
                    <span class="badge badge-prioridade prioridade-${ticket.prioridade}"><i class="fas fa-flag"></i> ${ticket.prioridade_label}</span>
                    <span class="badge badge-categoria">${ticket.categoria}</span>
                    <span class="badge badge-tipo ${ticket.criado_por_tipo.toLowerCase()}">${ticket.criado_por_tipo}</span>
                </div>
            </div>
            <div class="ticket-detalhe-criador">
                <img src="../../assets/images/${ticket.criado_por_avatar}" alt="${ticket.criado_por}" onerror="this.src='${getAvatarUrl(ticket.criado_por)}'">
                <div>
                    <span class="criador-nome">${ticket.criado_por}</span>
                    <span class="criador-tipo">${ticket.criado_por_tipo}</span>
                    <span class="criador-data"><i class="far fa-clock"></i> ${formatDateTime(ticket.criado_em)}</span>
                    <span class="criador-contato"><i class="fas fa-envelope"></i> ${ticket.criado_por_email}</span>
                    <span class="criador-contato"><i class="fas fa-phone"></i> ${ticket.criado_por_telefone}</span>
                </div>
            </div>
        </div>
        <div class="ticket-detalhe-descricao">
            <h5>Descrição</h5>
            <p>${ticket.descricao}</p>
        </div>
        ${respostasHtml}
        <div class="ticket-detalhe-acoes">
            ${ticket.status === 'aberto' ? `<button class="btn btn-sm btn-primary" onclick="atribuirTicket(${ticket.id})"><i class="fas fa-user-check"></i> Atribuir</button>` : ''}
            ${ticket.status === 'em_andamento' || ticket.status === 'respondido' ? `<button class="btn btn-sm btn-success" onclick="resolverTicket(${ticket.id})"><i class="fas fa-check"></i> Resolver</button>` : ''}
            <button class="btn btn-sm btn-outline" onclick="abrirResponderTicket(${ticket.id})"><i class="fas fa-reply"></i> Responder</button>
            <button class="btn btn-sm btn-danger" onclick="excluirTicket(${ticket.id})"><i class="fas fa-trash"></i> Excluir</button>
        </div>
    `;
    document.getElementById('modalTicket').classList.add('active');
    document.body.style.overflow = 'hidden';
}

// ===== ABRIR RESPONDER TICKET =====
function abrirResponderTicket(id) {
    const ticket = ticketsData.find(t => t.id === id);
    if (!ticket) return;
    document.getElementById('ticketResponderId').value = id;
    document.getElementById('ticketResponderAssunto').value = '# ' + ticket.id + ' - ' + ticket.titulo;
    document.getElementById('ticketRespostaTexto').value = '';
    fecharModal('modalTicket');
    document.getElementById('modalResponderTicket').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function enviarRespostaTicket(event) {
    event.preventDefault();
    const id = parseInt(document.getElementById('ticketResponderId').value);
    const resposta = document.getElementById('ticketRespostaTexto').value.trim();
    if (!resposta) { mostrarToast('Escreva uma resposta!', 'error'); return; }
    const ticket = ticketsData.find(t => t.id === id);
    if (ticket) {
        if (!ticket.respostas) ticket.respostas = [];
        ticket.respostas.push({
            autor: 'Administrador',
            data: new Date().toISOString().replace('T', ' ').slice(0, 19),
            texto: resposta
        });
        if (ticket.status === 'aberto') ticket.status = 'respondido';
        ticket.ultima_atualizacao = new Date().toISOString().replace('T', ' ').slice(0, 19);
    }
    atualizarItemTicket(id);
    atualizarContadores();
    mostrarToast('Resposta enviada com sucesso!', 'success');
    fecharModal('modalResponderTicket');
    fecharModal('modalTicket');
}

// ===== ATUALIZAR ITEM NA LISTA =====
function atualizarItemTicket(id) {
    const ticket = ticketsData.find(t => t.id === id);
    if (!ticket) return;
    const item = document.querySelector(`.ticket-item[data-id="${id}"]`);
    if (item) {
        item.dataset.status = ticket.status;
        const statusDot = item.querySelector('.status-dot');
        const statusColors = { 'aberto': '#FF6B6B', 'em_andamento': '#00D2FF', 'respondido': '#FFD93D', 'resolvido': '#00FFA3', 'fechado': '#6B7A8F' };
        if (statusDot) statusDot.style.background = statusColors[ticket.status] || '#6B7A8F';
        const badgeStatus = item.querySelector('.badge-status');
        if (badgeStatus) { badgeStatus.className = 'badge badge-status status-' + ticket.status; badgeStatus.textContent = ticket.status_label; }
        const respostasBadge = item.querySelector('.badge-respostas');
        if (respostasBadge) { respostasBadge.textContent = ticket.respostas ? ticket.respostas.length : 0; }
        if (ticket.respostas && ticket.respostas.length > 0 && !respostasBadge) {
            const footer = item.querySelector('.ticket-footer');
            const badge = document.createElement('span');
            badge.className = 'badge badge-respostas';
            badge.innerHTML = '<i class="fas fa-comment"></i> ' + ticket.respostas.length;
            footer.appendChild(badge);
        }
    }
}

// ===== AÇÕES DOS TICKETS =====
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

function atribuirTicket(id) {
    const ticket = ticketsData.find(t => t.id === id);
    if (!ticket) return;
    mostrarConfirmacao('Atribuir Ticket', `Atribuir ticket #${id} para você?`, function() {
        ticket.responsavel = 'Administrador';
        if (ticket.status === 'aberto') ticket.status = 'em_andamento';
        ticket.ultima_atualizacao = new Date().toISOString().replace('T', ' ').slice(0, 19);
        atualizarItemTicket(id);
        atualizarContadores();
        mostrarToast('Ticket atribuído com sucesso!', 'success');
        fecharModal('modalConfirmacao');
        fecharModal('modalTicket');
    });
}

function resolverTicket(id) {
    const ticket = ticketsData.find(t => t.id === id);
    if (!ticket) return;
    mostrarConfirmacao('Resolver Ticket', `Marcar ticket #${id} como resolvido?`, function() {
        ticket.status = 'resolvido';
        ticket.ultima_atualizacao = new Date().toISOString().replace('T', ' ').slice(0, 19);
        atualizarItemTicket(id);
        atualizarContadores();
        mostrarToast('Ticket resolvido com sucesso!', 'success');
        fecharModal('modalConfirmacao');
        fecharModal('modalTicket');
    });
}

function excluirTicket(id) {
    const ticket = ticketsData.find(t => t.id === id);
    if (!ticket) return;
    mostrarConfirmacao('Excluir Ticket', `Excluir ticket #${id} - "${ticket.titulo}"?<br><small style="color: #EF4444;">Esta ação não pode ser desfeita!</small>`, function() {
        const item = document.querySelector(`.ticket-item[data-id="${id}"]`);
        if (item) {
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            setTimeout(() => {
                item.remove();
                const idx = ticketsData.findIndex(t => t.id === id);
                if (idx > -1) ticketsData.splice(idx, 1);
                atualizarContadores();
                const total = document.querySelectorAll('.ticket-item').length;
                if (total > 0) { totalItensVisiveis = total; atualizarPaginacao(total); }
                else {
                    document.getElementById('paginacaoTickets').style.display = 'none';
                    document.querySelector('.tickets-list').innerHTML = `<div class="empty-state-admin"><div class="empty-icon"><i class="fas fa-ticket-alt"></i></div><h4>Nenhum ticket</h4><p>A lista está vazia.</p></div>`;
                }
                mostrarToast('Ticket excluído!', 'error');
            }, 300);
        }
        fecharModal('modalConfirmacao');
        fecharModal('modalTicket');
    });
}

function criarTicket(event) {
    event.preventDefault();
    const titulo = document.getElementById('novoTicketTitulo').value;
    const categoria = document.getElementById('novoTicketCategoria').value;
    const prioridade = document.getElementById('novoTicketPrioridade').value;
    const tipo = document.getElementById('novoTicketTipo').value;
    const descricao = document.getElementById('novoTicketDescricao').value;
    const criadoPor = document.getElementById('novoTicketCriadoPor').value || 'Administrador';
    if (!titulo || !categoria || !prioridade || !tipo || !descricao) {
        mostrarToast('Preencha todos os campos obrigatórios!', 'error');
        return;
    }
    const novoId = ticketsData.length > 0 ? Math.max(...ticketsData.map(t => t.id)) + 1 : 1;
    const tiposAvatar = {
        'Profissional': 'avatar-admin.png',
        'Empresa': 'empresa-default.png',
        'Instituição': 'instituicao-default.png'
    };
    const novoTicket = {
        id: novoId,
        titulo: titulo,
        descricao: descricao,
        categoria: categoria,
        prioridade: prioridade,
        prioridade_label: document.getElementById('novoTicketPrioridade').options[document.getElementById('novoTicketPrioridade').selectedIndex].text,
        status: 'aberto',
        status_label: 'Aberto',
        criado_por: criadoPor,
        criado_por_avatar: tiposAvatar[tipo] || 'avatar-admin.png',
        criado_por_tipo: tipo,
        criado_por_email: '',
        criado_por_telefone: '',
        criado_em: new Date().toISOString().replace('T', ' ').slice(0, 19),
        responsavel: null,
        ultima_atualizacao: new Date().toISOString().replace('T', ' ').slice(0, 19),
        respostas: []
    };
    ticketsData.push(novoTicket);
    location.reload();
}

function exportarTickets() {
    mostrarToast('Exportando tickets...', 'info');
    setTimeout(() => mostrarToast('Exportação concluída!', 'success'), 1500);
}

function atualizarContadores() {
    const total = ticketsData.length;
    const abertos = ticketsData.filter(t => t.status === 'aberto').length;
    const emAndamento = ticketsData.filter(t => t.status === 'em_andamento').length;
    const resolvidos = ticketsData.filter(t => t.status === 'resolvido' || t.status === 'respondido').length;
    const badge = document.querySelector('.bottom-nav .nav-item.active .badge');
    if (badge) { badge.textContent = abertos + emAndamento; badge.style.display = (abertos + emAndamento) > 0 ? 'flex' : 'none'; }
    const cards = document.querySelectorAll('.stat-card .value');
    if (cards.length >= 4) { cards[0].textContent = total; cards[1].textContent = abertos; cards[2].textContent = emAndamento; cards[3].textContent = resolvidos; }
}

function getAvatarUrl(name) {
    return 'https://ui-avatars.com/api/?name=' + encodeURIComponent(name) + '&background=6C2BD9&color=fff&size=80';
}

function formatDateTime(dt) {
    if (!dt) return 'N/A';
    const d = new Date(dt.replace(' ', 'T'));
    const now = new Date();
    const diff = Math.floor((now - d) / 1000);
    if (diff < 60) return 'há ' + diff + ' segundos';
    if (diff < 3600) return 'há ' + Math.floor(diff / 60) + ' minutos';
    if (diff < 86400) return 'há ' + Math.floor(diff / 3600) + ' horas';
    if (diff < 604800) return 'há ' + Math.floor(diff / 86400) + ' dias';
    return String(d.getDate()).padStart(2,'0') + '/' + String(d.getMonth()+1).padStart(2,'0') + '/' + d.getFullYear() + ' ' + String(d.getHours()).padStart(2,'0') + ':' + String(d.getMinutes()).padStart(2,'0');
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
/* ===== ESTILOS TICKETS ===== */
.tickets-container { background: var(--bg-card); border-radius: var(--radius-lg); padding: var(--space-lg); border: 1px solid var(--border-color); transition: var(--transition-smooth); }
.tickets-container:hover { background: var(--bg-card-hover); box-shadow: var(--glass-shadow); }
.tickets-list { display: flex; flex-direction: column; gap: var(--space-sm); }

.ticket-item { display: flex; align-items: center; gap: var(--space-md); padding: var(--space-md); background: var(--bg-primary); border-radius: var(--radius-md); border: 1px solid var(--border-color); transition: var(--transition-smooth); cursor: pointer; position: relative; }
.ticket-item:hover { border-color: var(--color-aurora); transform: translateX(4px); box-shadow: var(--glass-shadow); }
.ticket-item.aberto { border-left: 4px solid #FF6B6B; }
.ticket-item.em_andamento { border-left: 4px solid #00D2FF; }
.ticket-item.respondido { border-left: 4px solid #FFD93D; }
.ticket-item.resolvido { border-left: 4px solid #00FFA3; }
.ticket-item.fechado { border-left: 4px solid #6B7A8F; opacity: 0.7; }

.ticket-status { display: flex; align-items: center; justify-content: center; min-width: 16px; }
.ticket-status .status-dot { width: 12px; height: 12px; border-radius: 50%; display: inline-block; }

.ticket-avatar { position: relative; flex-shrink: 0; }
.ticket-avatar img { width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border-color); }
.ticket-avatar .criado-tipo { position: absolute; bottom: -4px; left: 50%; transform: translateX(-50%); font-size: 0.45rem; padding: 1px 6px; border-radius: var(--radius-full); white-space: nowrap; font-weight: 500; }
.ticket-avatar .criado-tipo.profissional { background: var(--color-turquoise); color: #FFF; }
.ticket-avatar .criado-tipo.empresa { background: #FF6B6B; color: #FFF; }
.ticket-avatar .criado-tipo.instituição { background: #FFD93D; color: #1A1A2E; }

.ticket-conteudo { flex: 1; min-width: 0; }
.ticket-header { display: flex; align-items: center; gap: var(--space-sm); flex-wrap: wrap; }
.ticket-header .ticket-id { font-size: var(--text-xs); color: var(--text-muted); font-weight: 600; }
.ticket-header .ticket-titulo { font-size: var(--text-sm); }
.ticket-header .ticket-titulo strong { color: var(--text-primary); }

.ticket-meta { display: flex; flex-wrap: wrap; gap: var(--space-sm); margin: 2px 0; }
.ticket-meta .meta-item { font-size: var(--text-xs); color: var(--text-muted); display: flex; align-items: center; gap: 4px; }
.ticket-meta .meta-item i { font-size: 0.7rem; }

.ticket-descricao { font-size: var(--text-sm); color: var(--text-muted); display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; margin: 2px 0; }

.ticket-footer { display: flex; gap: 6px; flex-wrap: wrap; margin-top: 4px; }
.ticket-footer .badge { font-size: 0.55rem; padding: 1px 8px; border-radius: var(--radius-full); }
.badge-status.status-aberto { background: rgba(255,107,107,0.15); color: #FF6B6B; }
.badge-status.status-em_andamento { background: rgba(0,210,255,0.15); color: #00D2FF; }
.badge-status.status-respondido { background: rgba(255,217,61,0.15); color: #FFD93D; }
.badge-status.status-resolvido { background: rgba(0,255,163,0.15); color: #00FFA3; }
.badge-status.status-fechado { background: rgba(107,122,143,0.15); color: #6B7A8F; }
.badge-prioridade.prioridade-baixa { background: rgba(107,122,143,0.15); color: #6B7A8F; }
.badge-prioridade.prioridade-media { background: rgba(0,210,255,0.15); color: #00D2FF; }
.badge-prioridade.prioridade-alta { background: rgba(255,217,61,0.15); color: #FFD93D; }
.badge-prioridade.prioridade-urgente { background: rgba(255,107,107,0.15); color: #FF6B6B; }
.badge-respostas { background: rgba(108,43,217,0.12); color: var(--color-aurora); }
.badge-responsavel { background: rgba(0,255,163,0.12); color: var(--color-future-green); }
.badge-categoria { background: var(--bg-input); color: var(--text-muted); border: 1px solid var(--border-color); }
.badge-tipo { background: var(--bg-input); color: var(--text-muted); border: 1px solid var(--border-color); }
.badge-tipo.profissional { border-color: var(--color-turquoise); color: var(--color-turquoise); }
.badge-tipo.empresa { border-color: #FF6B6B; color: #FF6B6B; }
.badge-tipo.instituição { border-color: #FFD93D; color: #FFD93D; }

.ticket-acoes { display: flex; gap: 4px; flex-shrink: 0; }
.ticket-acoes .btn { padding: 4px 6px; font-size: var(--text-xs); min-width: 28px; height: 28px; display: inline-flex; align-items: center; justify-content: center; }

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

/* ===== EMPTY STATE ===== */
.empty-state-admin { text-align: center; padding: 60px 24px; background: var(--bg-card); border-radius: var(--radius-lg); border: 1px solid var(--border-color); }
.empty-state-admin .empty-icon { font-size: 4rem; color: var(--text-muted); margin-bottom: var(--space-md); }
.empty-state-admin h4 { font-family: var(--font-title); font-size: var(--text-h3); color: var(--text-primary); margin-bottom: var(--space-sm); }
.empty-state-admin p { color: var(--text-muted); max-width: 400px; margin: 0 auto; }

/* ===== MODAL ===== */
.modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; align-items: center; justify-content: center; }
.modal.active { display: flex; }
.modal-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); animation: fadeIn 0.3s ease; cursor: pointer; }
.modal-content { position: relative; background: var(--bg-card); border-radius: var(--radius-lg); max-width: 750px; width: 90%; max-height: 90vh; overflow-y: auto; animation: slideUp 0.3s ease; box-shadow: var(--glass-shadow); border: 1px solid var(--border-color); z-index: 10; }
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

/* ===== DETALHE TICKET ===== */
.ticket-detalhe-header { display: flex; gap: var(--space-lg); padding-bottom: var(--space-md); border-bottom: 1px solid var(--border-color); flex-wrap: wrap; }
.ticket-detalhe-info { flex: 1; }
.ticket-detalhe-info h4 { font-family: var(--font-title); font-size: var(--text-h4); color: var(--text-primary); margin: 0 0 var(--space-sm) 0; }
.ticket-detalhe-info .ticket-meta-detalhe { display: flex; gap: var(--space-sm); flex-wrap: wrap; }
.ticket-detalhe-criador { display: flex; align-items: center; gap: var(--space-sm); flex-shrink: 0; }
.ticket-detalhe-criador img { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border-color); }
.ticket-detalhe-criador div { display: flex; flex-direction: column; }
.ticket-detalhe-criador .criador-nome { font-weight: 600; color: var(--text-primary); font-size: var(--text-sm); }
.ticket-detalhe-criador .criador-tipo { font-size: var(--text-xs); color: var(--text-muted); }
.ticket-detalhe-criador .criador-data { font-size: var(--text-xs); color: var(--text-muted); }
.ticket-detalhe-criador .criador-contato { font-size: var(--text-xs); color: var(--text-muted); display: block; }

.ticket-detalhe-descricao { padding: var(--space-md) 0; border-bottom: 1px solid var(--border-color); }
.ticket-detalhe-descricao h5 { font-family: var(--font-title); font-size: var(--text-sm); color: var(--text-muted); margin: 0 0 var(--space-sm) 0; }
.ticket-detalhe-descricao p { font-size: var(--text-body); color: var(--text-secondary); line-height: 1.8; margin: 0; white-space: pre-wrap; }

.ticket-respostas { padding: var(--space-md) 0; border-bottom: 1px solid var(--border-color); }
.ticket-respostas h4 { font-family: var(--font-title); font-size: var(--text-sm); color: var(--text-primary); margin: 0 0 var(--space-md) 0; display: flex; align-items: center; gap: var(--space-sm); }
.ticket-respostas h4 i { color: var(--color-aurora); }
.resposta-item { background: var(--bg-primary); border-radius: var(--radius-sm); padding: var(--space-sm) var(--space-md); margin-bottom: var(--space-sm); border: 1px solid var(--border-color); }
.resposta-item:last-child { margin-bottom: 0; }
.resposta-item .resposta-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: var(--space-xs); flex-wrap: wrap; gap: 4px; }
.resposta-item .resposta-header strong { font-size: var(--text-sm); color: var(--text-primary); }
.resposta-item .resposta-header .resposta-data { font-size: var(--text-xs); color: var(--text-muted); }
.resposta-item .resposta-texto { font-size: var(--text-sm); color: var(--text-secondary); line-height: 1.6; }

.ticket-detalhe-acoes { display: flex; gap: var(--space-sm); flex-wrap: wrap; padding-top: var(--space-md); }
.ticket-detalhe-acoes .btn { min-height: 32px; }

/* ===== FORMULÁRIO ===== */
.form-group { margin-bottom: var(--space-md); }
.form-label { display: block; font-weight: 500; color: var(--text-secondary); margin-bottom: 4px; font-size: var(--text-sm); }
.form-label .required { color: #FF6B6B; margin-left: 2px; }
.form-control { width: 100%; background: var(--bg-input); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 8px 12px; font-size: var(--text-sm); color: var(--text-primary); font-family: var(--font-body); transition: var(--transition-smooth); }
.form-control:focus { outline: none; border-color: var(--color-aurora); box-shadow: 0 0 0 3px rgba(108,43,217,0.08); }
.form-control::placeholder { color: var(--text-muted); }
select.form-control { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 36px; cursor: pointer; }
textarea.form-control { resize: vertical; min-height: 80px; }

/* ===== RESPONSIVIDADE ===== */
@media (max-width: 1024px) {
    .filter-bar-admin { flex-direction: column; align-items: stretch; }
    .filter-bar-admin .filter-group { width: 100%; flex-direction: column; align-items: stretch; gap: 4px; }
    .filter-bar-admin select, .filter-bar-admin input { width: 100%; min-width: auto; }
    .filter-bar-admin .filter-actions { margin-left: 0; flex-direction: column; gap: 6px; }
    .filter-bar-admin .filter-actions .btn { width: 100%; justify-content: center; }
    .resultados-info { margin-left: 0; text-align: center; width: 100%; padding-top: 4px; border-top: 1px solid var(--border-color); }
}

@media (max-width: 768px) {
    .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
    .stat-card .value { font-size: var(--text-h3); }
    .tickets-container { padding: var(--space-md); }
    .ticket-item { flex-wrap: wrap; padding: var(--space-sm); }
    .ticket-status { display: none; }
    .ticket-avatar { width: 100%; text-align: center; }
    .ticket-avatar img { width: 40px; height: 40px; }
    .ticket-avatar .criado-tipo { position: relative; bottom: auto; left: auto; transform: none; margin-top: 2px; display: inline-block; }
    .ticket-conteudo { width: 100%; order: 3; }
    .ticket-acoes { width: 100%; justify-content: flex-end; }
    .ticket-header { flex-direction: column; align-items: flex-start; }
    .ticket-descricao { -webkit-line-clamp: 2; }
    .modal-content { width: 95%; margin: 10px; }
    .ticket-detalhe-header { flex-direction: column; align-items: flex-start; }
    .ticket-detalhe-acoes { flex-direction: column; }
    .ticket-detalhe-acoes .btn { width: 100%; justify-content: center; }
    .header-actions { width: 100%; justify-content: center; flex-wrap: wrap; }
}

@media (max-width: 480px) {
    .stats-grid { grid-template-columns: 1fr; }
    .tickets-container { padding: var(--space-sm); border-radius: var(--radius-md); }
    .ticket-item { padding: var(--space-sm); gap: var(--space-sm); }
    .ticket-avatar img { width: 32px; height: 32px; }
    .ticket-acoes .btn { padding: 2px 4px; font-size: 0.55rem; min-width: 24px; height: 24px; }
    .filter-bar-admin { padding: 10px 12px; gap: 6px; }
    .table-pagination .page-btn { min-width: 24px; height: 24px; font-size: var(--text-xs); }
    .modal-header { padding: 14px 18px; }
    .modal-body { padding: 18px; }
    .modal-footer { flex-direction: column; padding: 12px 18px; }
    .modal-footer .btn { width: 100%; min-width: auto; }
}

/* ===== ANIMAÇÕES ===== */
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes slideUp { from { opacity: 0; transform: translateY(20px) scale(0.95); } to { opacity: 1; transform: translateY(0) scale(1); } }
.animate-fade-up { animation: fadeUp 0.5s ease forwards; opacity: 0; }
@keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
</style>
</body>
</html>