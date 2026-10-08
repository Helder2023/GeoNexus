<?php
// painel/individual/financeiro/pagamentos.php - Lista de Pagamentos
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Pagamentos';
$pagina_atual = 'pagamentos';

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;
if (!isset($valor_receber)) $valor_receber = 850000;
if (!isset($valor_pagar)) $valor_pagar = 320000;

// ============================================
// LISTA DE PAGAMENTOS
// ============================================
$pagamentos = [
    [
        'id' => 1,
        'codigo' => 'PAG-2026-0001',
        'cliente' => 'Construtora ABC',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_tipo' => 'Empresa',
        'descricao' => 'Pagamento Parcial - Projeto Zona Norte',
        'valor' => 175000,
        'valor_total' => 350000,
        'metodo' => 'Transferência Bancária',
        'metodo_icon' => 'fa-university',
        'status' => 'pago',
        'status_label' => 'Pago',
        'data_vencimento' => '2026-02-20',
        'data_pagamento' => '2026-02-18 14:20:00',
        'comprovativo' => 'comprovativo-001.pdf',
        'referencia' => 'TRF-2026-0045',
        'tipo' => 'recebimento'
    ],
    [
        'id' => 2,
        'codigo' => 'PAG-2026-0002',
        'cliente' => 'Indústria Luanda',
        'cliente_avatar' => 'empresa-2.png',
        'cliente_tipo' => 'Empresa',
        'descricao' => 'Pagamento Integral - Mapeamento GIS',
        'valor' => 480000,
        'valor_total' => 480000,
        'metodo' => 'Multicaixa',
        'metodo_icon' => 'fa-credit-card',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_vencimento' => '2026-02-25',
        'data_pagamento' => null,
        'comprovativo' => null,
        'referencia' => 'MCX-2026-0078',
        'tipo' => 'recebimento'
    ],
    [
        'id' => 3,
        'codigo' => 'PAG-2026-0003',
        'cliente' => 'Fornecedor Topografia Lda',
        'cliente_avatar' => 'empresa-3.png',
        'cliente_tipo' => 'Empresa',
        'descricao' => 'Compra de Equipamento GPS',
        'valor' => 180000,
        'valor_total' => 180000,
        'metodo' => 'Transferência Bancária',
        'metodo_icon' => 'fa-university',
        'status' => 'pago',
        'status_label' => 'Pago',
        'data_vencimento' => '2026-02-15',
        'data_pagamento' => '2026-02-14 10:30:00',
        'comprovativo' => 'comprovativo-003.pdf',
        'referencia' => 'TRF-2026-0048',
        'tipo' => 'pagamento'
    ],
    [
        'id' => 4,
        'codigo' => 'PAG-2026-0004',
        'cliente' => 'Município de Luanda',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_tipo' => 'Instituição',
        'descricao' => 'Pagamento - Levantamento Planialtimétrico',
        'valor' => 480000,
        'valor_total' => 480000,
        'metodo' => 'Depósito Bancário',
        'metodo_icon' => 'fa-money-check-alt',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_vencimento' => '2026-02-25',
        'data_pagamento' => null,
        'comprovativo' => null,
        'referencia' => 'DEP-2026-0012',
        'tipo' => 'recebimento'
    ],
    [
        'id' => 5,
        'codigo' => 'PAG-2026-0005',
        'cliente' => 'Energia Futuro',
        'cliente_avatar' => 'empresa-4.png',
        'cliente_tipo' => 'Empresa',
        'descricao' => 'Pagamento Parcial - Projeto Energia Solar',
        'valor' => 95000,
        'valor_total' => 190000,
        'metodo' => 'Multicaixa',
        'metodo_icon' => 'fa-credit-card',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_vencimento' => '2026-02-22',
        'data_pagamento' => null,
        'comprovativo' => null,
        'referencia' => 'MCX-2026-0081',
        'tipo' => 'recebimento'
    ],
    [
        'id' => 6,
        'codigo' => 'PAG-2026-0006',
        'cliente' => 'Agro Negócios Lda',
        'cliente_avatar' => 'empresa-5.png',
        'cliente_tipo' => 'Empresa',
        'descricao' => 'Assinatura Plano Pro - Fevereiro',
        'valor' => 25000,
        'valor_total' => 25000,
        'metodo' => 'Multicaixa',
        'metodo_icon' => 'fa-credit-card',
        'status' => 'pago',
        'status_label' => 'Pago',
        'data_vencimento' => '2026-02-15',
        'data_pagamento' => '2026-02-14 09:15:00',
        'comprovativo' => 'comprovativo-006.pdf',
        'referencia' => 'MCX-2026-0075',
        'tipo' => 'recebimento'
    ],
    [
        'id' => 7,
        'codigo' => 'PAG-2026-0007',
        'cliente' => 'Construtora XYZ',
        'cliente_avatar' => 'empresa-6.png',
        'cliente_tipo' => 'Empresa',
        'descricao' => 'Pagamento Integral - Cadastro Rural',
        'valor' => 320000,
        'valor_total' => 320000,
        'metodo' => 'Transferência Bancária',
        'metodo_icon' => 'fa-university',
        'status' => 'falhou',
        'status_label' => 'Falhou',
        'data_vencimento' => '2026-02-15',
        'data_pagamento' => null,
        'comprovativo' => null,
        'referencia' => 'TRF-2026-0042',
        'tipo' => 'recebimento'
    ],
    [
        'id' => 8,
        'codigo' => 'PAG-2026-0008',
        'cliente' => 'Mineração Progresso',
        'cliente_avatar' => 'empresa-7.png',
        'cliente_tipo' => 'Empresa',
        'descricao' => 'Pagamento Parcial - Levantamento Topográfico',
        'valor' => 250000,
        'valor_total' => 500000,
        'metodo' => 'Transferência Bancária',
        'metodo_icon' => 'fa-university',
        'status' => 'pago',
        'status_label' => 'Pago',
        'data_vencimento' => '2026-02-18',
        'data_pagamento' => '2026-02-17 14:30:00',
        'comprovativo' => 'comprovativo-008.pdf',
        'referencia' => 'TRF-2026-0050',
        'tipo' => 'recebimento'
    ],
    [
        'id' => 9,
        'codigo' => 'PAG-2026-0009',
        'cliente' => 'Consultoria RH Lda',
        'cliente_avatar' => 'empresa-8.png',
        'cliente_tipo' => 'Empresa',
        'descricao' => 'Consultoria Contabilística - Fevereiro',
        'valor' => 45000,
        'valor_total' => 45000,
        'metodo' => 'Transferência Bancária',
        'metodo_icon' => 'fa-university',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_vencimento' => '2026-02-28',
        'data_pagamento' => null,
        'comprovativo' => null,
        'referencia' => 'TRF-2026-0051',
        'tipo' => 'pagamento'
    ],
    [
        'id' => 10,
        'codigo' => 'PAG-2026-0010',
        'cliente' => 'Instituto Geográfico',
        'cliente_avatar' => 'instituicao-2.png',
        'cliente_tipo' => 'Instituição',
        'descricao' => 'Pagamento - Licenciamento GIS Anual',
        'valor' => 350000,
        'valor_total' => 350000,
        'metodo' => 'Depósito Bancário',
        'metodo_icon' => 'fa-money-check-alt',
        'status' => 'cancelado',
        'status_label' => 'Cancelado',
        'data_vencimento' => '2026-02-10',
        'data_pagamento' => null,
        'comprovativo' => null,
        'referencia' => 'DEP-2026-0008',
        'tipo' => 'recebimento'
    ],
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_pagamentos = count($pagamentos);
$pagamentos_recebidos = count(array_filter($pagamentos, fn($p) => $p['status'] === 'pago' && $p['tipo'] === 'recebimento'));
$pagamentos_pendentes = count(array_filter($pagamentos, fn($p) => $p['status'] === 'pendente' && $p['tipo'] === 'recebimento'));
$pagamentos_falhados = count(array_filter($pagamentos, fn($p) => $p['status'] === 'falhou'));
$pagamentos_cancelados = count(array_filter($pagamentos, fn($p) => $p['status'] === 'cancelado'));

$valor_recebido = array_sum(array_map(fn($p) => $p['tipo'] === 'recebimento' && $p['status'] === 'pago' ? $p['valor'] : 0, $pagamentos));
$valor_pendente = array_sum(array_map(fn($p) => $p['tipo'] === 'recebimento' && $p['status'] === 'pendente' ? $p['valor'] : 0, $pagamentos));
$valor_pago = array_sum(array_map(fn($p) => $p['tipo'] === 'pagamento' && $p['status'] === 'pago' ? $p['valor'] : 0, $pagamentos));

// ============================================
// MÉTODOS DE PAGAMENTO ÚNICOS (para filtro)
// ============================================
$metodos_unicos = [];
foreach ($pagamentos as $p) {
    if (!isset($metodos_unicos[$p['metodo']])) {
        $metodos_unicos[$p['metodo']] = $p['metodo'];
    }
}

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

if (!function_exists('formatDateTime')) {
    function formatDateTime($datetime) {
        if (empty($datetime)) return 'N/A';
        return date('d/m/Y H:i', strtotime($datetime));
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
            'pago' => 'status-pago',
            'pendente' => 'status-pendente',
            'falhou' => 'status-falhou',
            'cancelado' => 'status-cancelado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getStatusIcon')) {
    function getStatusIcon($status) {
        $icons = [
            'pago' => 'fa-check-circle',
            'pendente' => 'fa-clock',
            'falhou' => 'fa-times-circle',
            'cancelado' => 'fa-ban'
        ];
        return isset($icons[$status]) ? $icons[$status] : 'fa-clock';
    }
}

if (!function_exists('diasRestantes')) {
    function diasRestantes($data_vencimento) {
        $hoje = new DateTime();
        $fim = new DateTime($data_vencimento);
        $diff = $hoje->diff($fim);
        
        if ($fim < $hoje) {
            return ['texto' => 'Vencido há ' . $diff->days . ' dias', 'class' => 'atrasado'];
        }
        
        if ($diff->days === 0) {
            return ['texto' => 'Vence hoje', 'class' => 'urgente'];
        }
        
        if ($diff->days <= 3) {
            return ['texto' => 'Vence em ' . $diff->days . ' dias', 'class' => 'urgente'];
        }
        
        if ($diff->days <= 7) {
            return ['texto' => 'Vence em ' . $diff->days . ' dias', 'class' => 'aviso'];
        }
        
        return ['texto' => 'Vence em ' . $diff->days . ' dias', 'class' => 'normal'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../../includes/individual/financeiro-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <?php include "../../../includes/individual/financeiro-sidebar.php" ?>

        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-money-bill-wave icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $total_pagamentos; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Pagamentos</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="pagamento-criar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Novo Pagamento
                    </a>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $pagamentos_recebidos; ?></div>
                    <div class="label">Pagamentos Recebidos</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $pagamentos_pendentes; ?></div>
                    <div class="label">Pagamentos Pendentes</div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="value"><?php echo $pagamentos_falhados + $pagamentos_cancelados; ?></div>
                    <div class="label">Falhados / Cancelados</div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($valor_pendente / 1000, 0); ?>k</div>
                    <div class="label">Valor Pendente</div>
                </div>
            </section>

            <!-- ===== RESUMO FINANCEIRO ===== -->
            <section class="resumo-financeiro animate-fade-up" style="animation-delay: 0.1s;">
                <div class="resumo-item">
                    <div class="resumo-icon green">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Recebido</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_recebido); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Pendente</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_pendente); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon red">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Pago (Saídas)</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_pago); ?></span>
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.2s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchPagamento" placeholder="Buscar por cliente, código ou descrição..." 
                               oninput="filtrarPagamentos()">
                    </div>
                    <div class="filtros-actions">
                        <button class="btn btn-sm btn-outline" onclick="abrirFiltrosAvancados()">
                            <i class="fas fa-filter"></i> Filtros
                        </button>
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="grid" onclick="mudarView('grid')" title="Grid">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="view-btn" data-view="list" onclick="mudarView('list')" title="Lista">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filtros rápidos por status -->
                <div class="filtros-status">
                    <button class="filtro-status active" data-status="todos" onclick="filtrarPorStatus('todos')">
                        Todos <span class="count"><?php echo $total_pagamentos; ?></span>
                    </button>
                    <button class="filtro-status" data-status="pago" onclick="filtrarPorStatus('pago')">
                        <i class="fas fa-check-circle" style="color: #00FFA3;"></i> Pago <span class="count"><?php echo $pagamentos_recebidos; ?></span>
                    </button>
                    <button class="filtro-status" data-status="pendente" onclick="filtrarPorStatus('pendente')">
                        <i class="fas fa-clock" style="color: #FFD93D;"></i> Pendente <span class="count"><?php echo $pagamentos_pendentes; ?></span>
                    </button>
                    <button class="filtro-status" data-status="falhou" onclick="filtrarPorStatus('falhou')">
                        <i class="fas fa-times-circle" style="color: #FF6B6B;"></i> Falhou <span class="count"><?php echo $pagamentos_falhados; ?></span>
                    </button>
                    <button class="filtro-status" data-status="cancelado" onclick="filtrarPorStatus('cancelado')">
                        <i class="fas fa-ban" style="color: #6B7A8F;"></i> Cancelado <span class="count"><?php echo $pagamentos_cancelados; ?></span>
                    </button>
                </div>

                <!-- Filtros avançados -->
                <div class="filtros-avancados" id="filtrosAvancados" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Tipo</label>
                            <select class="form-control" id="filtroTipo" onchange="filtrarPagamentos()">
                                <option value="">Todos os tipos</option>
                                <option value="recebimento">Recebimento</option>
                                <option value="pagamento">Pagamento</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Método</label>
                            <select class="form-control" id="filtroMetodo" onchange="filtrarPagamentos()">
                                <option value="">Todos os métodos</option>
                                <?php foreach ($metodos_unicos as $metodo): ?>
                                    <option value="<?php echo $metodo; ?>"><?php echo $metodo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Período</label>
                            <select class="form-control" id="filtroPeriodo" onchange="filtrarPagamentos()">
                                <option value="">Todos os períodos</option>
                                <option value="hoje">Hoje</option>
                                <option value="semana">Esta semana</option>
                                <option value="mes">Este mês</option>
                                <option value="trimestre">Este trimestre</option>
                            </select>
                        </div>
                    </div>
                    <div class="filtros-avancados-actions">
                        <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount">
                            <?php echo $total_pagamentos; ?> resultado(s)
                        </span>
                    </div>
                </div>
            </section>

            <!-- ===== LISTA DE PAGAMENTOS ===== -->
            <section class="pagamentos-container animate-fade-up" style="animation-delay: 0.3s;">
                <?php if (empty($pagamentos)): ?>
                    <div class="empty-state">
                        <i class="fas fa-money-bill-wave"></i>
                        <h3>Nenhum pagamento registado</h3>
                        <p>Comece por registar o seu primeiro pagamento</p>
                        <a href="pagamento-criar.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Novo Pagamento
                        </a>
                    </div>
                <?php else: ?>
                    <div class="pagamentos-grid" id="pagamentosGrid">
                        <?php foreach ($pagamentos as $pagamento): 
                            $dias = diasRestantes($pagamento['data_vencimento']);
                            $tipo_icon = $pagamento['tipo'] === 'recebimento' ? 'fa-arrow-down' : 'fa-arrow-up';
                            $tipo_color = $pagamento['tipo'] === 'recebimento' ? '#00FFA3' : '#FF6B6B';
                        ?>
                            <div class="pagamento-card" 
                                 data-id="<?php echo $pagamento['id']; ?>"
                                 data-status="<?php echo $pagamento['status']; ?>"
                                 data-tipo="<?php echo $pagamento['tipo']; ?>"
                                 data-metodo="<?php echo $pagamento['metodo']; ?>"
                                 data-busca="<?php echo strtolower($pagamento['cliente'] . ' ' . $pagamento['codigo'] . ' ' . $pagamento['descricao']); ?>">
                                
                                <!-- ===== HEADER DO CARD ===== -->
                                <div class="pagamento-card-header">
                                    <div class="pagamento-card-tipo" style="background: <?php echo $tipo_color; ?>20; color: <?php echo $tipo_color; ?>;">
                                        <i class="fas <?php echo $tipo_icon; ?>"></i>
                                    </div>
                                    <div class="pagamento-card-info">
                                        <span class="pagamento-codigo"><?php echo $pagamento['codigo']; ?></span>
                                        <span class="pagamento-tipo-label" style="color: <?php echo $tipo_color; ?>;">
                                            <?php echo $pagamento['tipo'] === 'recebimento' ? 'Recebimento' : 'Pagamento'; ?>
                                        </span>
                                    </div>
                                    <div class="pagamento-card-status">
                                        <span class="badge-status <?php echo getStatusClass($pagamento['status']); ?>">
                                            <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                                            <?php echo $pagamento['status_label']; ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- ===== CORPO DO CARD ===== -->
                                <div class="pagamento-card-body">
                                    <!-- Cliente -->
                                    <div class="pagamento-cliente">
                                        <img src="../../../assets/images/<?php echo $pagamento['cliente_avatar']; ?>" 
                                             alt="<?php echo $pagamento['cliente']; ?>"
                                             onerror="this.src='<?php echo getAvatarUrl($pagamento['cliente']); ?>'">
                                        <div class="pagamento-cliente-info">
                                            <span class="pagamento-cliente-nome"><?php echo $pagamento['cliente']; ?></span>
                                            <span class="pagamento-cliente-tipo"><?php echo $pagamento['cliente_tipo']; ?></span>
                                        </div>
                                    </div>

                                    <!-- Descrição -->
                                    <p class="pagamento-descricao"><?php echo $pagamento['descricao']; ?></p>

                                    <!-- Valor -->
                                    <div class="pagamento-valor-section">
                                        <span class="pagamento-valor-label">Valor do Pagamento</span>
                                        <span class="pagamento-valor" style="color: <?php echo $tipo_color; ?>;">
                                            <?php echo $pagamento['tipo'] === 'recebimento' ? '+' : '-'; ?>
                                            Kz <?php echo formatMoney($pagamento['valor']); ?>
                                        </span>
                                        <?php if ($pagamento['valor'] < $pagamento['valor_total']): ?>
                                            <span class="pagamento-valor-parcial">
                                                de Kz <?php echo formatMoney($pagamento['valor_total']); ?> total
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Detalhes -->
                                    <div class="pagamento-detalhes">
                                        <div class="pagamento-detalhe-item">
                                            <span class="detalhe-label">
                                                <i class="fas <?php echo $pagamento['metodo_icon']; ?>"></i>
                                                Método
                                            </span>
                                            <span class="detalhe-value"><?php echo $pagamento['metodo']; ?></span>
                                        </div>
                                        <div class="pagamento-detalhe-item">
                                            <span class="detalhe-label">
                                                <i class="far fa-calendar"></i>
                                                Vencimento
                                            </span>
                                            <span class="detalhe-value"><?php echo formatDate($pagamento['data_vencimento']); ?></span>
                                        </div>
                                        <?php if ($pagamento['data_pagamento']): ?>
                                            <div class="pagamento-detalhe-item">
                                                <span class="detalhe-label">
                                                    <i class="fas fa-check-circle"></i>
                                                    Pago em
                                                </span>
                                                <span class="detalhe-value"><?php echo formatDate($pagamento['data_pagamento']); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Alerta de vencimento -->
                                    <?php if ($pagamento['status'] === 'pendente'): ?>
                                        <div class="pagamento-prazo <?php echo $dias['class']; ?>">
                                            <i class="fas fa-clock"></i>
                                            <span><?php echo $dias['texto']; ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Comprovativo -->
                                    <?php if ($pagamento['comprovativo']): ?>
                                        <div class="pagamento-comprovativo">
                                            <i class="fas fa-file-pdf" style="color: #FF6B6B;"></i>
                                            <span><?php echo $pagamento['comprovativo']; ?></span>
                                            <button class="btn-ver-comprovativo" onclick="verComprovativo(<?php echo $pagamento['id']; ?>)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- ===== FOOTER DO CARD ===== -->
                                <div class="pagamento-card-footer">
                                    <div class="pagamento-ref">
                                        <i class="fas fa-hashtag"></i>
                                        <span><?php echo $pagamento['referencia']; ?></span>
                                    </div>
                                    <div class="pagamento-actions">
                                        <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" 
                                           class="btn-action" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <?php if ($pagamento['status'] === 'pendente'): ?>
                                            <a href="pagamento-aprovar.php?id=<?php echo $pagamento['id']; ?>" 
                                               class="btn-action btn-action-success" title="Aprovar">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="pagamento-rejeitar.php?id=<?php echo $pagamento['id']; ?>" 
                                               class="btn-action btn-action-danger" title="Rejeitar">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="pagamento-editar.php?id=<?php echo $pagamento['id']; ?>" 
                                               class="btn-action" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        <?php endif; ?>
                                        <!-- ✅ BOTÃO EXCLUIR -->
                                        <a href="pagamento-excluir.php?id=<?php echo $pagamento['id']; ?>" 
                                           class="btn-action btn-action-excluir" 
                                           title="Excluir Pagamento"
                                           onclick="return confirmarExclusao(event, '<?php echo addslashes($pagamento['codigo']); ?>', <?php echo $pagamento['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <button class="btn-action" onclick="abrirMenuCard(event, <?php echo $pagamento['id']; ?>)" title="Mais">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- ===== PAGINAÇÃO ===== -->
                    <div class="paginacao" id="paginacao">
                        <button class="page-btn" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="page-info">Página 1 de 1</span>
                        <button class="page-btn" disabled>
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MENU CONTEXTUAL DO CARD                    -->
    <!-- ========================================== -->
    <div class="context-menu" id="contextMenu">
        <a href="#" class="context-item" id="menuVerDetalhes">
            <i class="fas fa-eye"></i>
            <span>Ver Detalhes</span>
        </a>
        <a href="#" class="context-item" id="menuEditar">
            <i class="fas fa-edit"></i>
            <span>Editar Pagamento</span>
        </a>
        <a href="#" class="context-item" id="menuComprovativo">
            <i class="fas fa-file-pdf"></i>
            <span>Ver Comprovativo</span>
        </a>
        <a href="#" class="context-item" id="menuDuplicar">
            <i class="fas fa-copy"></i>
            <span>Duplicar</span>
        </a>
        <hr>
        <a href="#" class="context-item context-item-danger" id="menuExcluir">
            <i class="fas fa-trash"></i>
            <span>Excluir Pagamento</span>
        </a>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO                       -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Ação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="modalConfirmacaoBody">
                <p>Tem certeza que deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-danger" id="modalConfirmacaoBtn">
                    <i class="fas fa-check"></i> Confirmar
                </button>
            </div>
        </div>
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
        // FILTROS
        // ============================================
        let filtroStatusAtual = 'todos';

        function filtrarPorStatus(status) {
            filtroStatusAtual = status;
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === status);
            });
            filtrarPagamentos();
        }

        function filtrarPagamentos() {
            const search = (document.getElementById('searchPagamento')?.value || '').toLowerCase().trim();
            const tipo = document.getElementById('filtroTipo')?.value || '';
            const metodo = document.getElementById('filtroMetodo')?.value || '';

            const cards = document.querySelectorAll('.pagamento-card');
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && card.dataset.status !== filtroStatusAtual) {
                    mostrar = false;
                }

                if (mostrar && tipo && card.dataset.tipo !== tipo) {
                    mostrar = false;
                }

                if (mostrar && metodo && card.dataset.metodo !== metodo) {
                    mostrar = false;
                }

                if (mostrar && search) {
                    mostrar = card.dataset.busca.includes(search);
                }

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            const count = document.getElementById('resultadosCount');
            if (count) count.textContent = visiveis + ' resultado(s)';

            const container = document.getElementById('pagamentosGrid');
            const emptyState = document.querySelector('.empty-state-filtro');

            if (visiveis === 0 && container) {
                if (!emptyState) {
                    const empty = document.createElement('div');
                    empty.className = 'empty-state empty-state-filtro';
                    empty.innerHTML = `
                        <i class="fas fa-search"></i>
                        <h3>Nenhum pagamento encontrado</h3>
                        <p>Tente ajustar os filtros de pesquisa</p>
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar Filtros
                        </button>
                    `;
                    container.parentNode.appendChild(empty);
                }
            } else if (emptyState) {
                emptyState.remove();
            }
        }

        function limparFiltros() {
            document.getElementById('searchPagamento').value = '';
            const fTipo = document.getElementById('filtroTipo');
            const fMetodo = document.getElementById('filtroMetodo');
            const fPeriodo = document.getElementById('filtroPeriodo');
            if (fTipo) fTipo.value = '';
            if (fMetodo) fMetodo.value = '';
            if (fPeriodo) fPeriodo.value = '';
            filtroStatusAtual = 'todos';
            
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === 'todos');
            });
            
            filtrarPagamentos();
        }

        function abrirFiltrosAvancados() {
            const filtros = document.getElementById('filtrosAvancados');
            const isHidden = filtros.style.display === 'none';
            filtros.style.display = isHidden ? 'block' : 'none';
        }

        // ============================================
        // MUDAR VIEW
        // ============================================
        function mudarView(view) {
            const container = document.getElementById('pagamentosGrid');
            if (!container) return;

            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === view);
            });

            if (view === 'list') {
                container.classList.add('pagamentos-list-view');
            } else {
                container.classList.remove('pagamentos-list-view');
            }

            localStorage.setItem('geonnexus-pagamentos-view', view);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedView = localStorage.getItem('geonnexus-pagamentos-view');
            if (savedView) mudarView(savedView);
        });

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, codigo, id) {
            event.preventDefault();
            event.stopPropagation();
            
            const url = 'pagamento-excluir.php?id=' + id;
            
            mostrarConfirmacao(
                'Excluir Pagamento',
                'Tem certeza que deseja excluir o pagamento <strong>' + codigo + '</strong>?<br><small style="color: #FF6B6B; margin-top: 6px; display: block;">⚠️ Esta ação é irreversível!</small>',
                () => {
                    window.location.href = url;
                }
            );
            
            return false;
        }

        // ============================================
        // MENU CONTEXTUAL
        // ============================================
        let pagamentoAtualMenu = null;

        function abrirMenuCard(event, pagamentoId) {
            event.stopPropagation();
            event.preventDefault();

            const menu = document.getElementById('contextMenu');
            const rect = event.target.closest('button').getBoundingClientRect();

            pagamentoAtualMenu = pagamentoId;

            menu.style.position = 'fixed';
            menu.style.top = (rect.bottom + 5) + 'px';
            menu.style.left = (rect.right - 220) + 'px';
            menu.style.display = 'block';

            setTimeout(() => {
                const menuRect = menu.getBoundingClientRect();
                if (menuRect.right > window.innerWidth) {
                    menu.style.left = (window.innerWidth - menuRect.width - 10) + 'px';
                }
                if (menuRect.bottom > window.innerHeight) {
                    menu.style.top = (rect.top - menuRect.height - 5) + 'px';
                }
            }, 10);

            document.getElementById('menuVerDetalhes').href = 'pagamento-detalhe.php?id=' + pagamentoId;
            document.getElementById('menuEditar').href = 'pagamento-editar.php?id=' + pagamentoId;
        }

        document.addEventListener('click', function(e) {
            const menu = document.getElementById('contextMenu');
            if (menu && !menu.contains(e.target) && !e.target.closest('.pagamento-actions')) {
                menu.style.display = 'none';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const menu = document.getElementById('contextMenu');
                if (menu) menu.style.display = 'none';
                fecharModal('modalConfirmacao');
            }
        });

        // Ações do menu
        document.addEventListener('DOMContentLoaded', function() {
            const menuComprovativo = document.getElementById('menuComprovativo');
            const menuDuplicar = document.getElementById('menuDuplicar');
            const menuExcluir = document.getElementById('menuExcluir');

            if (menuComprovativo) {
                menuComprovativo.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (pagamentoAtualMenu) verComprovativo(pagamentoAtualMenu);
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuDuplicar) {
                menuDuplicar.addEventListener('click', function(e) {
                    e.preventDefault();
                    mostrarToast('Pagamento duplicado com sucesso!', 'success');
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuExcluir) {
                menuExcluir.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('contextMenu').style.display = 'none';
                    
                    if (pagamentoAtualMenu) {
                        const card = document.querySelector(`.pagamento-card[data-id="${pagamentoAtualMenu}"]`);
                        const codigo = card ? card.querySelector('.pagamento-codigo').textContent : 'este pagamento';
                        
                        mostrarConfirmacao(
                            'Excluir Pagamento',
                            'Tem certeza que deseja excluir o pagamento <strong>' + codigo + '</strong>?<br><small style="color: #FF6B6B; margin-top: 6px; display: block;">⚠️ Esta ação é irreversível!</small>',
                            () => {
                                window.location.href = 'pagamento-excluir.php?id=' + pagamentoAtualMenu;
                            }
                        );
                    }
                });
            }
        });

        // ============================================
        // VER COMPROVATIVO
        // ============================================
        function verComprovativo(id) {
            mostrarToast('A abrir comprovativo do pagamento #' + id, 'info');
        }

        // ============================================
        // MODAL DE CONFIRMAÇÃO
        // ============================================
        let callbackConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            const body = document.getElementById('modalConfirmacaoBody');
            body.innerHTML = `
                <div class="modal-alerta-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>${titulo}</strong>
                        <span>${mensagem}</span>
                    </div>
                </div>
            `;
            callbackConfirmacao = callback;
            document.getElementById('modalConfirmacao').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
            callbackConfirmacao = null;
        }

        document.getElementById('modalConfirmacaoBtn')?.addEventListener('click', function() {
            if (typeof callbackConfirmacao === 'function') {
                callbackConfirmacao();
            }
        });
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
            background: linear-gradient(180deg, #00FFA3 0%, #00D2FF 100%);
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

        .header-left h1 .icon { color: #00FFA3; font-size: 0.85em; }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 255, 163, 0.3);
        }

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
        .header-left .breadcrumb a:hover { color: #00D2FF; }
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

        .btn-theme:hover { border-color: #00FFA3; color: #00FFA3; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* STATS CARDS                                */
        /* ========================================== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .stat-card .icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .stat-card .icon.red { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* RESUMO FINANCEIRO                          */
        /* ========================================== */
        .resumo-financeiro {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .resumo-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .resumo-item:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .resumo-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .resumo-icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .resumo-icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .resumo-icon.red { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }

        .resumo-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .resumo-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .resumo-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* FILTROS                                    */
        /* ========================================== */
        .filtros {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .filtros-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 10px 14px 10px 42px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .search-box input:focus {
            outline: none;
            border-color: #00FFA3;
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
        }

        .search-box input::placeholder { color: var(--text-muted); }

        .filtros-actions {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
        }

        .view-toggle {
            display: flex;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 2px;
            gap: 2px;
        }

        .view-btn {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            border: none;
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
        }

        .view-btn:hover { color: var(--text-primary); background: var(--bg-card-hover); }
        .view-btn.active { background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%); color: #0A1628; }

        .filtros-status {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .filtro-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .filtro-status:hover { border-color: #00FFA3; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            border-color: transparent;
        }

        .filtro-status .count {
            background: rgba(255, 255, 255, 0.2);
            padding: 1px 6px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
        }

        .filtro-status:not(.active) .count {
            background: var(--bg-card);
            color: var(--text-muted);
        }

        .filtros-avancados {
            padding-top: var(--space-md);
            margin-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .filtros-avancados .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: var(--space-md);
        }

        .filtros-avancados-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .resultados-count {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ========================================== */
        /* PAGAMENTOS GRID                            */
        /* ========================================== */
        .pagamentos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        .pagamento-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
        }

        .pagamento-card:hover {
            border-color: #00FFA3;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        /* ===== HEADER DO CARD ===== */
        .pagamento-card-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.04) 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
        }

        .pagamento-card-tipo {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .pagamento-card-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .pagamento-codigo {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .pagamento-tipo-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .badge-status.status-pago { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-falhou { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-cancelado { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        /* ===== CORPO DO CARD ===== */
        .pagamento-card-body {
            padding: var(--space-md);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        /* Cliente */
        .pagamento-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .pagamento-cliente img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .pagamento-cliente-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        .pagamento-cliente-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .pagamento-cliente-tipo {
            font-size: 10px;
            color: var(--text-muted);
        }

        /* Descrição */
        .pagamento-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
        }

        /* Valor */
        .pagamento-valor-section {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.05) 0%, rgba(0, 210, 255, 0.05) 100%);
            border: 1px solid rgba(0, 255, 163, 0.15);
            border-radius: var(--radius-md);
        }

        .pagamento-valor-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .pagamento-valor {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
        }

        .pagamento-valor-parcial {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* Detalhes */
        .pagamento-detalhes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
        }

        .pagamento-detalhe-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .detalhe-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
        }

        .detalhe-label i { color: #00FFA3; font-size: 10px; }

        .detalhe-value {
            font-size: var(--text-xs);
            color: var(--text-primary);
            font-weight: 600;
        }

        /* Prazo */
        .pagamento-prazo {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: var(--radius-sm);
            font-size: var(--text-xs);
            font-weight: 600;
        }

        .pagamento-prazo.normal { background: rgba(0, 210, 255, 0.08); color: #00D2FF; }
        .pagamento-prazo.aviso { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .pagamento-prazo.urgente { background: rgba(255, 159, 67, 0.12); color: #FF9F43; }
        .pagamento-prazo.atrasado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        /* Comprovativo */
        .pagamento-comprovativo {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: rgba(255, 107, 107, 0.06);
            border: 1px solid rgba(255, 107, 107, 0.15);
            border-radius: var(--radius-md);
        }

        .pagamento-comprovativo i { font-size: 16px; }

        .pagamento-comprovativo span {
            flex: 1;
            font-size: var(--text-xs);
            color: var(--text-secondary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .btn-ver-comprovativo {
            width: 28px;
            height: 28px;
            border-radius: var(--radius-sm);
            background: transparent;
            border: 1px solid rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            transition: var(--transition-smooth);
        }

        .btn-ver-comprovativo:hover {
            background: rgba(255, 107, 107, 0.1);
            transform: scale(1.05);
        }

        /* ===== FOOTER DO CARD ===== */
        .pagamento-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            border-top: 1px solid var(--border-color);
            background: var(--bg-input);
            gap: var(--space-sm);
        }

        .pagamento-ref {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-family: var(--font-display);
        }

        .pagamento-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
        }

        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .btn-action:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
        }

        .btn-action-success {
            border-color: rgba(0, 255, 163, 0.3);
            color: #00FFA3;
        }

        .btn-action-success:hover {
            background: rgba(0, 255, 163, 0.1);
            transform: scale(1.05);
        }

        .btn-action-danger {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .btn-action-danger:hover {
            background: rgba(255, 107, 107, 0.1);
            transform: scale(1.05);
        }

        /* ✅ BOTÃO EXCLUIR (vermelho) */
        .btn-action-excluir {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .btn-action-excluir:hover {
            border-color: #FF6B6B;
            color: #FFFFFF;
            background: #FF6B6B;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
        }

        /* ========================================== */
        /* LIST VIEW                                  */
        /* ========================================== */
        .pagamentos-grid.pagamentos-list-view {
            grid-template-columns: 1fr;
        }

        /* ========================================== */
        /* EMPTY STATE                                */
        /* ========================================== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px dashed var(--border-color);
        }

        .empty-state i {
            font-size: 56px;
            color: var(--text-muted);
            opacity: 0.4;
            margin-bottom: var(--space-md);
            display: block;
        }

        .empty-state h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .empty-state p {
            color: var(--text-muted);
            margin: 0 0 var(--space-lg) 0;
        }

        /* ========================================== */
        /* PAGINAÇÃO                                  */
        /* ========================================== */
        .paginacao {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg) 0;
            margin-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .page-btn {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
        }

        .page-btn:hover:not(:disabled) { border-color: #00FFA3; color: #00FFA3; }
        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 var(--space-sm);
        }

        /* ========================================== */
        /* CONTEXT MENU                               */
        /* ========================================== */
        .context-menu {
            display: none;
            position: fixed;
            min-width: 220px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            padding: 4px;
            z-index: 999999;
            backdrop-filter: blur(10px);
        }

        .context-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: var(--text-sm);
            font-weight: 500;
            transition: var(--transition-smooth);
            cursor: pointer;
        }

        .context-item i {
            width: 16px;
            font-size: 13px;
            text-align: center;
            color: var(--text-muted);
        }

        .context-item:hover { background: var(--bg-card-hover); color: var(--text-primary); }
        .context-item:hover i { color: #00FFA3; }

        .context-item-danger { color: #FF6B6B; }
        .context-item-danger i { color: #FF6B6B; }
        .context-item-danger:hover { background: rgba(255, 107, 107, 0.1); }
        .context-item-danger:hover i { color: #FF6B6B; }

        .context-menu hr {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 4px 0;
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
            z-index: 999999;
            align-items: center;
            justify-content: center;
        }

        .modal.active { display: flex; }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 107, 107, 0.3);
            z-index: 10;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-danger {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.15) 0%, rgba(255, 107, 107, 0.05) 100%);
            border-bottom-color: rgba(255, 107, 107, 0.3);
        }

        .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px;
            line-height: 1;
        }

        .modal-close:hover { color: var(--text-primary); transform: rotate(90deg); }

        .modal-body { padding: 24px; }

        .modal-alerta-danger {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border: 1px solid rgba(255, 107, 107, 0.25);
            border-radius: var(--radius-md);
        }

        .modal-alerta-danger i {
            font-size: 24px;
            color: #FF6B6B;
            flex-shrink: 0;
        }

        .modal-alerta-danger div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .modal-alerta-danger strong {
            font-size: var(--text-sm);
            color: #FF6B6B;
        }

        .modal-alerta-danger span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 120px; justify-content: center; }

        .btn-danger {
            background: #FF6B6B;
            color: #FFFFFF;
            border: none;
        }

        .btn-danger:hover {
            background: #E55555;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 107, 107, 0.4);
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .resumo-financeiro { grid-template-columns: 1fr; }
            .pagamentos-grid { grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .pagamentos-grid { grid-template-columns: 1fr; }
            .filtros-avancados .form-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            
            .filtros-top { flex-direction: column; align-items: stretch; }
            .filtros-actions { justify-content: space-between; }
            
            .filtros-status {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 4px;
            }
            
            .filtro-status { white-space: nowrap; flex-shrink: 0; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }

            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .pagamento-detalhes { grid-template-columns: 1fr; }
            .pagamento-card-footer { flex-direction: column; align-items: stretch; }
            .pagamento-actions { justify-content: flex-end; }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>