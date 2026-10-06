<?php
// painel/admin/financeiro/assinaturas.php - Gestão de Assinaturas
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Assinaturas';
$pagina_atual = 'assinaturas';


// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== PLANOS DISPONÍVEIS =====
$planos = [
    'individual' => [
        'nome' => 'Individual',
        'icon' => 'fa-user',
        'color' => '#00D2FF',
        'planos' => [
            ['nome' => 'Básico', 'valor' => 15000, 'periodo' => 'Mensal'],
            ['nome' => 'Pro', 'valor' => 25000, 'periodo' => 'Mensal'],
            ['nome' => 'Premium', 'valor' => 45000, 'periodo' => 'Mensal'],
        ]
    ],
    'empresarial' => [
        'nome' => 'Empresarial',
        'icon' => 'fa-building',
        'color' => '#FF6B6B',
        'planos' => [
            ['nome' => 'Startup', 'valor' => 75000, 'periodo' => 'Mensal'],
            ['nome' => 'Business', 'valor' => 150000, 'periodo' => 'Mensal'],
            ['nome' => 'Enterprise', 'valor' => 250000, 'periodo' => 'Mensal'],
        ]
    ],
    'institucional' => [
        'nome' => 'Institucional',
        'icon' => 'fa-university',
        'color' => '#FFD93D',
        'planos' => [
            ['nome' => 'Educação', 'valor' => 125000, 'periodo' => 'Trimestral'],
            ['nome' => 'Governo', 'valor' => 200000, 'periodo' => 'Trimestral'],
            ['nome' => 'ONG', 'valor' => 100000, 'periodo' => 'Trimestral'],
        ]
    ]
];

// ===== DADOS COMPLETOS DE ASSINATURAS =====
$assinaturas = [
    [
        'id' => 1,
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-1.png',
        'categoria' => 'individual',
        'plano' => 'Pro',
        'valor' => 25000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-15',
        'fim' => '2026-12-15',
        'renovacao' => '2026-02-15',
        'metodo_pagamento' => 'Multicaixa',
        'ultimo_pagamento' => '2026-01-15'
    ],
    [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-1.png',
        'categoria' => 'empresarial',
        'plano' => 'Enterprise',
        'valor' => 250000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-01',
        'fim' => '2026-12-31',
        'renovacao' => '2026-02-01',
        'metodo_pagamento' => 'Transferência Bancária',
        'ultimo_pagamento' => '2026-01-01'
    ],
    [
        'id' => 3,
        'cliente' => 'Ana Costa',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-2.png',
        'categoria' => 'individual',
        'plano' => 'Básico',
        'valor' => 15000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-02-01',
        'fim' => '2026-08-01',
        'renovacao' => '2026-03-01',
        'metodo_pagamento' => 'Cartão de Crédito',
        'ultimo_pagamento' => '2026-02-01'
    ],
    [
        'id' => 4,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-1.png',
        'categoria' => 'institucional',
        'plano' => 'Educação',
        'valor' => 125000,
        'periodo' => 'Trimestral',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'inicio' => '2026-02-15',
        'fim' => '2026-05-15',
        'renovacao' => '2026-05-15',
        'metodo_pagamento' => 'Depósito Bancário',
        'ultimo_pagamento' => null
    ],
    [
        'id' => 5,
        'cliente' => 'Mineração Progresso',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-7.png',
        'categoria' => 'empresarial',
        'plano' => 'Business',
        'valor' => 150000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-17',
        'fim' => '2027-01-17',
        'renovacao' => '2026-02-17',
        'metodo_pagamento' => 'Transferência Bancária',
        'ultimo_pagamento' => '2026-01-17'
    ],
    [
        'id' => 6,
        'cliente' => 'Universidade Agostinho Neto',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-3.png',
        'categoria' => 'institucional',
        'plano' => 'Governo',
        'valor' => 200000,
        'periodo' => 'Trimestral',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'inicio' => '2026-02-10',
        'fim' => '2026-05-10',
        'renovacao' => '2026-05-10',
        'metodo_pagamento' => 'Transferência Bancária',
        'ultimo_pagamento' => null
    ],
    [
        'id' => 7,
        'cliente' => 'Construtora Silva',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-2.png',
        'categoria' => 'empresarial',
        'plano' => 'Startup',
        'valor' => 75000,
        'periodo' => 'Mensal',
        'status' => 'cancelado',
        'status_label' => 'Cancelado',
        'inicio' => '2025-03-01',
        'fim' => '2026-02-28',
        'renovacao' => null,
        'metodo_pagamento' => 'Transferência Bancária',
        'ultimo_pagamento' => '2026-02-01'
    ],
    [
        'id' => 8,
        'cliente' => 'Pedro Santos',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-3.png',
        'categoria' => 'individual',
        'plano' => 'Premium',
        'valor' => 45000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-20',
        'fim' => '2026-07-20',
        'renovacao' => '2026-02-20',
        'metodo_pagamento' => 'Multicaixa',
        'ultimo_pagamento' => '2026-01-20'
    ],
    [
        'id' => 9,
        'cliente' => 'ONG Esperança',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-4.png',
        'categoria' => 'institucional',
        'plano' => 'ONG',
        'valor' => 100000,
        'periodo' => 'Trimestral',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-05',
        'fim' => '2026-07-05',
        'renovacao' => '2026-04-05',
        'metodo_pagamento' => 'Depósito Bancário',
        'ultimo_pagamento' => '2026-01-05'
    ],
];

// Estatísticas das assinaturas
$total_assinaturas = count($assinaturas);
$assinaturas_ativas = count(array_filter($assinaturas, function($a) { return $a['status'] === 'ativo'; }));
$assinaturas_pendentes = count(array_filter($assinaturas, function($a) { return $a['status'] === 'pendente'; }));
$assinaturas_canceladas = count(array_filter($assinaturas, function($a) { return $a['status'] === 'cancelado'; }));
$valor_total_assinaturas = array_sum(array_column($assinaturas, 'valor'));

// ===== DADOS PARA GRÁFICO DE DISTRIBUIÇÃO =====
$distribuicao = [
    'individual' => count(array_filter($assinaturas, function($a) { return $a['categoria'] === 'individual' && $a['status'] === 'ativo'; })),
    'empresarial' => count(array_filter($assinaturas, function($a) { return $a['categoria'] === 'empresarial' && $a['status'] === 'ativo'; })),
    'institucional' => count(array_filter($assinaturas, function($a) { return $a['categoria'] === 'institucional' && $a['status'] === 'ativo'; })),
];

// Funções auxiliares
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y', strtotime($date));
}

function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

function getStatusColor($status) {
    $colors = [
        'ativo' => '#00FFA3',
        'pendente' => '#FFD93D',
        'cancelado' => '#FF6B6B'
    ];
    return $colors[$status] ?? '#6B7A8F';
}

function getStatusIcon($status) {
    $icons = [
        'ativo' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'cancelado' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}

function getCategoriaColor($categoria) {
    $cores = [
        'individual' => '#00D2FF',
        'empresarial' => '#FF6B6B',
        'institucional' => '#FFD93D'
    ];
    return $cores[$categoria] ?? '#6B7A8F';
}

function getCategoriaIcon($categoria) {
    $icons = [
        'individual' => 'fa-user',
        'empresarial' => 'fa-building',
        'institucional' => 'fa-university'
    ];
    return $icons[$categoria] ?? 'fa-circle';
}

// Verificar página atual para o sidebar
$pagina_atual_sidebar = $pagina_atual;
?>
<!DOCTYPE html>
<html lang="pt">
<?php include "../../../includes/admin-financeiro-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR FINANCEIRO                         -->
        <!-- ========================================== -->
        <?php include "../../../includes/admin-financeiro-sidebar.php"; ?>
        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-crown icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Assinaturas</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                        <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <button class="btn btn-primary" onclick="abrirModal('modalNovaAssinatura')">
                            <i class="fas fa-plus"></i> Nova Assinatura
                        </button>
                        <button class="btn btn-outline" onclick="window.location.reload()">
                            <i class="fas fa-sync-alt"></i> Atualizar
                        </button>
                        <button class="btn btn-outline" onclick="exportarAssinaturas()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid">
                <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                    <div class="icon blue"><i class="fas fa-list"></i></div>
                    <div class="value"><?php echo $total_assinaturas; ?></div>
                    <div class="label">Total de Assinaturas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 8.3%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                    <div class="icon green"><i class="fas fa-check-circle"></i></div>
                    <div class="value"><?php echo $assinaturas_ativas; ?></div>
                    <div class="label">Ativas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 12.5%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                    <div class="icon yellow"><i class="fas fa-clock"></i></div>
                    <div class="value"><?php echo $assinaturas_pendentes; ?></div>
                    <div class="label">Pendentes</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 2.1%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                    <div class="icon red"><i class="fas fa-times-circle"></i></div>
                    <div class="value"><?php echo $assinaturas_canceladas; ?></div>
                    <div class="label">Canceladas</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 5.4%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                    <div class="icon yellow"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="value">Kz <?php echo formatMoney($valor_total_assinaturas); ?></div>
                    <div class="label">Valor Total</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 15.2%</div>
                </div>
            </section>

            <!-- ===== DISTRIBUIÇÃO POR CATEGORIA ===== -->
            <section class="distribuicao-container">
                <div class="distribuicao-grid">
                    <div class="distribuicao-card" style="border-left: 3px solid #00D2FF;">
                        <div class="distribuicao-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="distribuicao-info">
                            <span class="distribuicao-valor"><?php echo $distribuicao['individual']; ?></span>
                            <span class="distribuicao-label">Individual</span>
                        </div>
                    </div>
                    <div class="distribuicao-card" style="border-left: 3px solid #FF6B6B;">
                        <div class="distribuicao-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="distribuicao-info">
                            <span class="distribuicao-valor"><?php echo $distribuicao['empresarial']; ?></span>
                            <span class="distribuicao-label">Empresarial</span>
                        </div>
                    </div>
                    <div class="distribuicao-card" style="border-left: 3px solid #FFD93D;">
                        <div class="distribuicao-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="distribuicao-info">
                            <span class="distribuicao-valor"><?php echo $distribuicao['institucional']; ?></span>
                            <span class="distribuicao-label">Institucional</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filtros-container">
                <div class="filtros-grid">
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-search"></i> Buscar</label>
                        <input type="text" class="form-control" id="searchAssinatura" placeholder="Cliente ou plano..." onkeyup="filtrarAssinaturas()">
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-tag"></i> Status</label>
                        <select class="form-control" id="filtroStatus" onchange="filtrarAssinaturas()">
                            <option value="todos">Todos os status</option>
                            <option value="ativo">Ativo</option>
                            <option value="pendente">Pendente</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-layer-group"></i> Categoria</label>
                        <select class="form-control" id="filtroCategoria" onchange="filtrarAssinaturas()">
                            <option value="todos">Todas as categorias</option>
                            <option value="individual">Individual</option>
                            <option value="empresarial">Empresarial</option>
                            <option value="institucional">Institucional</option>
                        </select>
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-crown"></i> Plano</label>
                        <select class="form-control" id="filtroPlano" onchange="filtrarAssinaturas()">
                            <option value="todos">Todos os planos</option>
                            <optgroup label="Individual">
                                <option value="Básico">Básico</option>
                                <option value="Pro">Pro</option>
                                <option value="Premium">Premium</option>
                            </optgroup>
                            <optgroup label="Empresarial">
                                <option value="Startup">Startup</option>
                                <option value="Business">Business</option>
                                <option value="Enterprise">Enterprise</option>
                            </optgroup>
                            <optgroup label="Institucional">
                                <option value="Educação">Educação</option>
                                <option value="Governo">Governo</option>
                                <option value="ONG">ONG</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="filtro-group filtro-actions">
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-times"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount"><?php echo $total_assinaturas; ?> resultados</span>
                    </div>
                </div>
            </div>

            <!-- ===== TABELA DE ASSINATURAS ===== -->
            <div class="assinaturas-container">
                <div class="section-header">
                    <h3><i class="fas fa-crown"></i> Lista de Assinaturas</h3>
                    <div class="section-actions">
                        <span class="assinaturas-total">Total: <strong>Kz <?php echo formatMoney($valor_total_assinaturas); ?></strong></span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-assinaturas" id="tabelaAssinaturas">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Categoria</th>
                                <th>Plano</th>
                                <th>Valor</th>
                                <th>Período</th>
                                <th>Status</th>
                                <th>Início</th>
                                <th>Renovação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="assinaturasBody">
                            <?php foreach ($assinaturas as $assinatura): ?>
                                <tr data-status="<?php echo $assinatura['status']; ?>"
                                    data-categoria="<?php echo $assinatura['categoria']; ?>"
                                    data-plano="<?php echo strtolower($assinatura['plano']); ?>"
                                    data-cliente="<?php echo strtolower($assinatura['cliente']); ?>">
                                    <td>
                                        <div class="cliente-cell">
                                            <img src="../../../assets/images/<?php echo $assinatura['cliente_avatar']; ?>"
                                                alt="<?php echo $assinatura['cliente']; ?>"
                                                onerror="this.src='<?php echo getAvatarUrl($assinatura['cliente']); ?>'">
                                            <div class="cliente-info">
                                                <span class="cliente-nome"><?php echo $assinatura['cliente']; ?></span>
                                                <span class="cliente-tipo"><?php echo $assinatura['cliente_tipo']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge-categoria categoria-<?php echo $assinatura['categoria']; ?>">
                                            <i class="fas <?php echo getCategoriaIcon($assinatura['categoria']); ?>"></i>
                                            <?php echo ucfirst($assinatura['categoria']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge-plano" style="background: <?php echo getCategoriaColor($assinatura['categoria']); ?>; color: #fff;">
                                            <?php echo $assinatura['plano']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="valor">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                                    </td>
                                    <td><?php echo $assinatura['periodo']; ?></td>
                                    <td>
                                        <span class="badge-status status-<?php echo $assinatura['status']; ?>">
                                            <i class="fas <?php echo getStatusIcon($assinatura['status']); ?>"></i>
                                            <?php echo $assinatura['status_label']; ?>
                                        </span>
                                    </td>
                                    <td><?php echo formatDate($assinatura['inicio']); ?></td>
                                    <td>
                                        <?php if ($assinatura['renovacao']): ?>
                                            <?php echo formatDate($assinatura['renovacao']); ?>
                                        <?php else: ?>
                                            <span class="text-muted">—</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="assinatura-detalhe.php?id=<?php echo $assinatura['id']; ?>" class="btn" title="Ver Detalhes">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="assinatura-editar.php?id=<?php echo $assinatura['id']; ?>" class="btn" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <?php if ($assinatura['status'] === 'ativo'): ?>
                                                <a href="assinatura-cancelar.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-danger" title="Cancelar">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="paginacao-container">
                    <div class="paginacao-info">
                        Mostrando <strong id="paginacaoInicio">1</strong> - <strong id="paginacaoFim"><?php echo min(10, $total_assinaturas); ?></strong> de <strong id="paginacaoTotal"><?php echo $total_assinaturas; ?></strong> assinaturas
                    </div>
                    <div class="paginacao-controles" id="paginacaoControles">
                        <button class="btn" id="paginaAnterior" onclick="mudarPagina(-1)" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="pagina-atual" id="paginaAtual">1 / <?php echo ceil($total_assinaturas / 10); ?></span>
                        <button class="btn" id="paginaProxima" onclick="mudarPagina(1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="paginacao-por-pagina">
                        <label>Por página:</label>
                        <select id="itensPorPagina" onchange="mudarItensPorPagina()">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL NOVA ASSINATURA                     -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovaAssinatura">
        <div class="modal-overlay" onclick="fecharModal('modalNovaAssinatura')"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-plus-circle"></i> Nova Assinatura</h3>
                <button class="modal-close" onclick="fecharModal('modalNovaAssinatura')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovaAssinatura" onsubmit="criarAssinatura(event)">
                    <div class="form-group">
                        <label class="form-label">Cliente <span class="required">*</span></label>
                        <select class="form-control" id="clienteAssinatura" required>
                            <option value="">Selecione um cliente...</option>
                            <optgroup label="Individual">
                                <option value="Carlos Mendes">Carlos Mendes</option>
                                <option value="Ana Costa">Ana Costa</option>
                                <option value="Pedro Santos">Pedro Santos</option>
                            </optgroup>
                            <optgroup label="Empresarial">
                                <option value="Construtora ABC">Construtora ABC</option>
                                <option value="Mineração Progresso">Mineração Progresso</option>
                                <option value="Construtora Silva">Construtora Silva</option>
                                <option value="Energia Futuro">Energia Futuro</option>
                            </optgroup>
                            <optgroup label="Institucional">
                                <option value="Instituto Técnico de Luanda">Instituto Técnico de Luanda</option>
                                <option value="Universidade Agostinho Neto">Universidade Agostinho Neto</option>
                                <option value="ONG Esperança">ONG Esperança</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Categoria <span class="required">*</span></label>
                            <select class="form-control" id="categoriaAssinatura" required onchange="atualizarPlanos()">
                                <option value="">Selecione uma categoria...</option>
                                <option value="individual">Individual</option>
                                <option value="empresarial">Empresarial</option>
                                <option value="institucional">Institucional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Plano <span class="required">*</span></label>
                            <select class="form-control" id="planoAssinatura" required>
                                <option value="">Selecione um plano...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Valor <span class="required">*</span></label>
                            <input type="number" class="form-control" id="valorAssinatura" placeholder="0" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Período <span class="required">*</span></label>
                            <select class="form-control" id="periodoAssinatura" required>
                                <option value="Mensal">Mensal</option>
                                <option value="Trimestral">Trimestral</option>
                                <option value="Semestral">Semestral</option>
                                <option value="Anual">Anual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Método de Pagamento</label>
                            <select class="form-control" id="metodoAssinatura">
                                <option value="Multicaixa">Multicaixa</option>
                                <option value="Transferência Bancária">Transferência Bancária</option>
                                <option value="Cartão de Crédito">Cartão de Crédito</option>
                                <option value="Depósito Bancário">Depósito Bancário</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="statusAssinatura">
                                <option value="ativo">Ativo</option>
                                <option value="pendente">Pendente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Data de Início</label>
                        <input type="date" class="form-control" id="inicioAssinatura">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalNovaAssinatura')">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('formNovaAssinatura').submit()">
                    <i class="fas fa-save"></i> Criar Assinatura
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="../../../assets/js/main.js"></script>
    <script>
        // ==========================================
        // DADOS DOS PLANOS
        // ==========================================
        const planos = <?php echo json_encode($planos); ?>;

        

        // ==========================================
        // ATUALIZAR PLANOS
        // ==========================================
        function atualizarPlanos() {
            const categoria = document.getElementById('categoriaAssinatura').value;
            const planoSelect = document.getElementById('planoAssinatura');
            const valorInput = document.getElementById('valorAssinatura');
            const periodoSelect = document.getElementById('periodoAssinatura');

            planoSelect.innerHTML = '<option value="">Selecione um plano...</option>';

            if (categoria && planos[categoria]) {
                planos[categoria].planos.forEach(function(plano) {
                    const option = document.createElement('option');
                    option.value = plano.nome;
                    option.textContent = plano.nome + ' - Kz ' + plano.valor.toLocaleString('pt-PT');
                    option.dataset.valor = plano.valor;
                    option.dataset.periodo = plano.periodo;
                    planoSelect.appendChild(option);
                });

                planoSelect.addEventListener('change', function() {
                    const selected = this.options[this.selectedIndex];
                    if (selected.dataset.valor) {
                        valorInput.value = selected.dataset.valor;
                        periodoSelect.value = selected.dataset.periodo;
                    }
                });
            }
        }

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
                    document.querySelectorAll('.modal.active').forEach(modal => {
                        fecharModal(modal.id);
                    });
                }
            });

            inicializarPaginacao();
        });

        // ==========================================
        // TOGGLE SIDEBAR MOBILE
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
                    icon.className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
                }
            }
        }

        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.getElementById('bottomMenuToggle');

            if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
                if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
                    sidebar.classList.remove('open');
                    document.getElementById('sidebarOverlay')?.classList.remove('active');
                    if (menuBtn) {
                        const icon = menuBtn.querySelector('i');
                        if (icon) icon.className = 'fas fa-bars';
                    }
                }
            }
        });

        // ==========================================
        // NOTIFICAÇÕES
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
                badge.textContent = naoLidas;
                badge.style.display = naoLidas > 0 ? 'flex' : 'none';
            }

            if (bottomBadge) {
                bottomBadge.textContent = naoLidas;
                bottomBadge.style.display = naoLidas > 0 ? 'flex' : 'none';
            }
        }

        function closeNotifications() {
            const dropdown = document.getElementById('notificacoesDropdown');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }

        // ==========================================
        // PERFIL
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

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

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

        // ==========================================
        // FILTRAR ASSINATURAS
        // ==========================================
        function filtrarAssinaturas() {
            const search = document.getElementById('searchAssinatura').value.toLowerCase();
            const status = document.getElementById('filtroStatus').value;
            const categoria = document.getElementById('filtroCategoria').value;
            const plano = document.getElementById('filtroPlano').value;

            const rows = document.querySelectorAll('#assinaturasBody tr');
            let visiveis = 0;

            rows.forEach(row => {
                const cliente = row.dataset.cliente || '';
                const rowStatus = row.dataset.status || '';
                const rowCategoria = row.dataset.categoria || '';
                const rowPlano = row.dataset.plano || '';

                let mostrar = true;

                if (search) {
                    const match = cliente.includes(search) || rowPlano.includes(search);
                    if (!match) mostrar = false;
                }

                if (status !== 'todos' && rowStatus !== status) mostrar = false;

                if (categoria !== 'todos' && rowCategoria !== categoria) mostrar = false;

                if (plano !== 'todos' && rowPlano !== plano.toLowerCase()) mostrar = false;

                row.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            document.getElementById('resultadosCount').textContent = visiveis + ' resultados';
            paginaAtual = 1;
            atualizarPaginacao();
        }

        function limparFiltros() {
            document.getElementById('searchAssinatura').value = '';
            document.getElementById('filtroStatus').value = 'todos';
            document.getElementById('filtroCategoria').value = 'todos';
            document.getElementById('filtroPlano').value = 'todos';
            filtrarAssinaturas();
            mostrarToast('Filtros limpos', 'info');
        }

        // ==========================================
        // PAGINAÇÃO
        // ==========================================
        let paginaAtual = 1;
        let itensPorPagina = 10;

        function inicializarPaginacao() {
            atualizarPaginacao();
        }

        function atualizarPaginacao() {
            const rows = document.querySelectorAll('#assinaturasBody tr');
            const visiveis = Array.from(rows).filter(row => row.style.display !== 'none');
            const total = visiveis.length;
            const totalPaginas = Math.ceil(total / itensPorPagina) || 1;

            if (paginaAtual > totalPaginas) paginaAtual = totalPaginas;
            if (paginaAtual < 1) paginaAtual = 1;

            const inicio = (paginaAtual - 1) * itensPorPagina;
            const fim = Math.min(inicio + itensPorPagina, total);

            rows.forEach((row) => {
                const visivel = row.style.display !== 'none';
                if (visivel) {
                    const posicao = visiveis.indexOf(row);
                    row.style.display = (posicao >= inicio && posicao < fim) ? '' : 'none';
                }
            });

            document.getElementById('paginacaoInicio').textContent = total > 0 ? inicio + 1 : 0;
            document.getElementById('paginacaoFim').textContent = total > 0 ? fim : 0;
            document.getElementById('paginacaoTotal').textContent = total;
            document.getElementById('paginaAtual').textContent = paginaAtual + ' / ' + totalPaginas;

            document.getElementById('paginaAnterior').disabled = paginaAtual <= 1;
            document.getElementById('paginaProxima').disabled = paginaAtual >= totalPaginas;
        }

        function mudarPagina(direcao) {
            const total = document.querySelectorAll('#assinaturasBody tr:not([style*="display: none"])').length;
            const totalPaginas = Math.ceil(total / itensPorPagina) || 1;

            const novaPagina = paginaAtual + direcao;
            if (novaPagina < 1 || novaPagina > totalPaginas) return;

            paginaAtual = novaPagina;
            atualizarPaginacao();
        }

        function mudarItensPorPagina() {
            itensPorPagina = parseInt(document.getElementById('itensPorPagina').value);
            paginaAtual = 1;
            atualizarPaginacao();
        }

        // ==========================================
        // EXPORTAR
        // ==========================================
        function exportarAssinaturas() {
            mostrarToast('A exportar assinaturas...', 'info');
            setTimeout(() => {
                mostrarToast('Assinaturas exportadas com sucesso!', 'success');
            }, 1500);
        }

        // ==========================================
        // CRIAR ASSINATURA
        // ==========================================
        function criarAssinatura(event) {
            event.preventDefault();

            const cliente = document.getElementById('clienteAssinatura').value;
            const categoria = document.getElementById('categoriaAssinatura').value;
            const plano = document.getElementById('planoAssinatura').value;
            const valor = document.getElementById('valorAssinatura').value;

            if (!cliente || !categoria || !plano || !valor) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast('Assinatura criada com sucesso!', 'success');
            fecharModal('modalNovaAssinatura');
            document.getElementById('formNovaAssinatura').reset();

            setTimeout(() => {
                location.reload();
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

        function abrirModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }
    </script>

    <style>
        /* ========================================== */
        /* ASSINATURAS - CSS COMPLETO                 */
        /* ========================================== */

        /* ===== DISTRIBUIÇÃO ===== */
        .distribuicao-container {
            margin-bottom: var(--space-lg);
        }

        .distribuicao-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
        }

        .distribuicao-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: var(--space-md);
            transition: var(--transition-smooth);
        }

        .distribuicao-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
            transform: translateY(-2px);
        }

        .distribuicao-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .distribuicao-info {
            flex: 1;
        }

        .distribuicao-valor {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
            display: block;
        }

        .distribuicao-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== CATEGORIA BADGE ===== */
        .badge-categoria {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-categoria.categoria-individual {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .badge-categoria.categoria-empresarial {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-categoria.categoria-institucional {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        [data-theme="light"] .badge-categoria.categoria-individual {
            background: rgba(0, 210, 255, 0.08);
        }

        [data-theme="light"] .badge-categoria.categoria-empresarial {
            background: rgba(255, 107, 107, 0.08);
        }

        [data-theme="light"] .badge-categoria.categoria-institucional {
            background: rgba(255, 217, 61, 0.08);
        }

        /* ===== CONTAINER ===== */
        .assinaturas-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .assinaturas-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== FILTROS ===== */
        .filtros-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .filtros-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .filtros-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr auto;
            gap: var(--space-md);
            align-items: end;
        }

        .filtro-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .filtro-label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filtro-label i {
            font-size: 12px;
        }

        .filtro-actions {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: var(--space-sm);
            padding-bottom: 1px;
            flex-wrap: wrap;
        }

        .resultados-count {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
            padding: 4px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-full);
        }

        /* ===== TABELA ===== */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0;
            padding: 0;
        }

        .table-assinaturas {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 1000px;
        }

        .table-assinaturas thead {
            background: var(--bg-input);
        }

        .table-assinaturas thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 10px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .table-assinaturas tbody td {
            padding: 8px 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-assinaturas tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-assinaturas tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== CLIENTE CELL ===== */
        .cliente-cell {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .cliente-cell img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
            flex-shrink: 0;
        }

        .cliente-info {
            display: flex;
            flex-direction: column;
            line-height: 1.3;
        }

        .cliente-nome {
            font-weight: 500;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .cliente-tipo {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== BADGES ===== */
        .badge-plano {
            display: inline-block;
            padding: 2px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-status i {
            font-size: 10px;
        }

        .badge-status.status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-cancelado {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        /* ===== VALORES ===== */
        .valor {
            font-weight: 600;
            color: #FFD93D;
        }

        /* ===== ACTION BUTTONS ===== */
        .action-buttons {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .action-buttons .btn {
            padding: 4px 8px;
            font-size: var(--text-xs);
            min-width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .action-buttons .btn:hover {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .action-buttons .btn-danger {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .action-buttons .btn-danger:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
        }

        /* ===== PAGINAÇÃO ===== */
        .paginacao-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-lg);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .paginacao-info {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .paginacao-info strong {
            color: var(--text-primary);
        }

        .paginacao-controles {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .paginacao-controles .btn {
            padding: 4px 12px;
            min-width: 36px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .paginacao-controles .btn:hover:not(:disabled) {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .paginacao-controles .btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .pagina-atual {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
            min-width: 80px;
            text-align: center;
        }

        .paginacao-por-pagina {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .paginacao-por-pagina label {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .paginacao-por-pagina select {
            width: 60px;
            padding: 4px 8px;
            font-size: var(--text-xs);
            min-height: 30px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            cursor: pointer;
        }

        .paginacao-por-pagina select:focus {
            outline: none;
            border-color: #FFD93D;
        }

        /* ===== ASSINATURAS TOTAL ===== */
        .assinaturas-total {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .assinaturas-total strong {
            color: #FFD93D;
            font-weight: 700;
        }

        /* ========================================== */
        /* MODAL                                      */
        /* ========================================== */

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
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal.active {
            display: flex !important;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid var(--border-color);
            z-index: 10;
            animation: modalSlideUp 0.3s ease;
        }

        @keyframes modalSlideUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 24px;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            background: var(--bg-card);
            z-index: 2;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        }

        .modal-header .modal-title {
            font-family: var(--font-title);
            font-weight: 600;
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-header .modal-title i {
            color: #FFD93D;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px 8px;
            line-height: 1;
            border-radius: var(--radius-sm);
        }

        .modal-close:hover {
            color: var(--text-primary);
            background: var(--bg-card-hover);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 24px;
            overflow-y: auto;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            position: sticky;
            bottom: 0;
            background: var(--bg-card);
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
        }

        .modal-footer .btn {
            min-width: 100px;
            justify-content: center;
        }

        /* ===== FORMULÁRIO ===== */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .form-group {
            margin-bottom: var(--space-md);
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .form-group label .required {
            color: #FF6B6B;
            margin-left: 2px;
        }

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
        }

        .form-control:focus {
            outline: none;
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        select.form-control {
            appearance: none;
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

        optgroup {
            background: var(--bg-card);
            color: var(--text-primary);
            font-weight: 600;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1200px) {
            .filtros-grid {
                grid-template-columns: 1fr 1fr;
            }
            .filtro-actions {
                grid-column: span 2;
                justify-content: flex-end;
            }
            .distribuicao-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 992px) {
            .table-assinaturas {
                min-width: 700px;
            }
            .distribuicao-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .filtros-grid {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .filtro-actions {
                grid-column: span 1;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .paginacao-container {
                flex-direction: column;
                align-items: stretch;
                gap: var(--space-sm);
            }

            .paginacao-controles {
                justify-content: center;
            }

            .paginacao-por-pagina {
                justify-content: center;
            }

            .table-assinaturas {
                min-width: 600px;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }

            .assinaturas-container {
                padding: var(--space-sm);
            }

            .filtros-container {
                padding: var(--space-sm);
            }

            .distribuicao-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .filtros-container {
                padding: var(--space-sm);
            }

            .filtro-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .resultados-count {
                text-align: center;
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

            .action-buttons .btn {
                padding: 4px 6px;
                min-width: 26px;
                height: 26px;
                font-size: 10px;
            }

            .cliente-cell img {
                width: 28px;
                height: 28px;
            }

            .table-assinaturas tbody td {
                padding: 6px 8px;
                font-size: var(--text-xs);
            }

            .table-assinaturas thead th {
                padding: 8px 8px;
                font-size: 9px;
            }

            .assinaturas-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .distribuicao-card {
                padding: var(--space-md);
            }

            .distribuicao-valor {
                font-size: 20px;
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
            background: #FFD93D;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #F5C842;
        }
    </style>
</body>
</html>