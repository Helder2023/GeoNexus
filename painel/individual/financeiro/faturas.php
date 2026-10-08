<?php
// painel/individual/financeiro/faturas.php - Lista de Faturas
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Faturas';
$pagina_atual = 'faturas';

// ============================================
// GARANTIR VARIÁVEIS (FALLBACK)
// ============================================
if (!isset($total_faturas_pendentes))  $total_faturas_pendentes = 12;
if (!isset($total_transacoes))         $total_transacoes = 156;

// ============================================
// LISTA DE FATURAS
// ============================================
$faturas = [
    [
        'id' => 1,
        'numero' => 'FT-2026-0156',
        'cliente' => ['nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'nif' => '5417896321'],
        'descricao' => 'Levantamento Topográfico - Zona Norte',
        'valor' => 350000,
        'valor_pago' => 350000,
        'data_emissao' => '2026-02-18',
        'data_vencimento' => '2026-03-15',
        'status' => 'paga',
        'status_label' => 'Paga',
        'dias_restantes' => 25,
        'categoria' => 'Projetos',
        'categoria_color' => '#6C2BD9',
        'itens' => 3,
        'comprovativo' => true
    ],
    [
        'id' => 2,
        'numero' => 'FT-2026-0150',
        'cliente' => ['nome' => 'Construtora XYZ', 'tipo' => 'Empresa', 'nif' => '5417896322'],
        'descricao' => 'Mapeamento GIS - Área Industrial',
        'valor' => 320000,
        'valor_pago' => 0,
        'data_emissao' => '2026-01-15',
        'data_vencimento' => '2026-02-15',
        'status' => 'vencida',
        'status_label' => 'Vencida',
        'dias_restantes' => -3,
        'categoria' => 'GIS',
        'categoria_color' => '#00FFA3',
        'itens' => 2,
        'comprovativo' => false
    ],
    [
        'id' => 3,
        'numero' => 'FT-2026-0158',
        'cliente' => ['nome' => 'Energia Futuro', 'tipo' => 'Empresa', 'nif' => '5417896323'],
        'descricao' => 'Análise de Solo - Projeto Agrícola',
        'valor' => 195000,
        'valor_pago' => 0,
        'data_emissao' => '2026-02-10',
        'data_vencimento' => '2026-02-28',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'dias_restantes' => 10,
        'categoria' => 'Agricultura',
        'categoria_color' => '#6BCB77',
        'itens' => 4,
        'comprovativo' => false
    ],
    [
        'id' => 4,
        'numero' => 'FT-2026-0159',
        'cliente' => ['nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'nif' => '5417896324'],
        'descricao' => 'Levantamento Planialtimétrico - Área Urbana',
        'valor' => 480000,
        'valor_pago' => 240000,
        'data_emissao' => '2026-02-12',
        'data_vencimento' => '2026-02-25',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'dias_restantes' => 7,
        'categoria' => 'Urbanismo',
        'categoria_color' => '#A29BFE',
        'itens' => 5,
        'comprovativo' => true
    ],
    [
        'id' => 5,
        'numero' => 'FT-2026-0160',
        'cliente' => ['nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'nif' => '5417896325'],
        'descricao' => 'Levantamento com Drone - Área Costeira',
        'valor' => 320000,
        'valor_pago' => 320000,
        'data_emissao' => '2026-02-05',
        'data_vencimento' => '2026-03-05',
        'status' => 'paga',
        'status_label' => 'Paga',
        'dias_restantes' => 15,
        'categoria' => 'Drones',
        'categoria_color' => '#FF6B6B',
        'itens' => 3,
        'comprovativo' => true
    ],
    [
        'id' => 6,
        'numero' => 'FT-2026-0161',
        'cliente' => ['nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'nif' => '5417896326'],
        'descricao' => 'Cadastro Rural - Fazenda Sunflower',
        'valor' => 195000,
        'valor_pago' => 0,
        'data_emissao' => '2026-02-15',
        'data_vencimento' => '2026-03-30',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'dias_restantes' => 40,
        'categoria' => 'Cadastro',
        'categoria_color' => '#FFD93D',
        'itens' => 2,
        'comprovativo' => false
    ],
    [
        'id' => 7,
        'numero' => 'FT-2026-0145',
        'cliente' => ['nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'nif' => '5417896327'],
        'descricao' => 'Consultoria em Urbanismo',
        'valor' => 450000,
        'valor_pago' => 0,
        'data_emissao' => '2026-01-05',
        'data_vencimento' => '2026-01-30',
        'status' => 'cancelada',
        'status_label' => 'Cancelada',
        'dias_restantes' => -30,
        'categoria' => 'Urbanismo',
        'categoria_color' => '#A29BFE',
        'itens' => 1,
        'comprovativo' => false
    ],
    [
        'id' => 8,
        'numero' => 'FT-2026-0162',
        'cliente' => ['nome' => 'Instituto Técnico de Luanda', 'tipo' => 'Instituição', 'nif' => '5417896328'],
        'descricao' => 'Formação em Topografia',
        'valor' => 120000,
        'valor_pago' => 120000,
        'data_emissao' => '2026-02-14',
        'data_vencimento' => '2026-03-14',
        'status' => 'paga',
        'status_label' => 'Paga',
        'dias_restantes' => 24,
        'categoria' => 'Formação',
        'categoria_color' => '#A29BFE',
        'itens' => 1,
        'comprovativo' => true
    ]
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_registros = count($faturas);
$faturas_pagas = count(array_filter($faturas, fn($f) => $f['status'] === 'paga'));
$faturas_pendentes = count(array_filter($faturas, fn($f) => $f['status'] === 'pendente'));
$faturas_vencidas = count(array_filter($faturas, fn($f) => $f['status'] === 'vencida'));
$faturas_canceladas = count(array_filter($faturas, fn($f) => $f['status'] === 'cancelada'));

$valor_total = array_sum(array_column($faturas, 'valor'));
$valor_recebido = array_sum(array_column($faturas, 'valor_pago'));
$valor_pendente = $valor_total - $valor_recebido;

// ============================================
// CATEGORIAS ÚNICAS
// ============================================
$categorias_unicas = array_unique(array_column($faturas, 'categoria'));
sort($categorias_unicas);

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

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'paga' => 'status-paga',
            'pendente' => 'status-pendente',
            'vencida' => 'status-vencida',
            'cancelada' => 'status-cancelada'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getClienteIcon')) {
    function getClienteIcon($tipo) {
        $icons = [
            'Empresa' => 'fa-building',
            'Instituição' => 'fa-university',
            'Profissional' => 'fa-user-tie',
            'Particular' => 'fa-user'
        ];
        return isset($icons[$tipo]) ? $icons[$tipo] : 'fa-user';
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
                        <i class="fas fa-file-invoice icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $total_registros; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Faturas</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="fatura-criar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nova Fatura
                    </a>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $faturas_pagas; ?></div>
                    <div class="label">Pagas</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $faturas_pendentes; ?></div>
                    <div class="label">Pendentes</div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="value"><?php echo $faturas_vencidas; ?></div>
                    <div class="label">Vencidas</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($valor_pendente / 1000, 0); ?>k</div>
                    <div class="label">Valor a Receber</div>
                </div>
            </section>

            <!-- ===== RESUMO FINANCEIRO ===== -->
            <section class="resumo-financeiro animate-fade-up" style="animation-delay: 0.1s;">
                <div class="resumo-item">
                    <div class="resumo-icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Valor Total</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_total); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon blue">
                        <i class="fas fa-check-circle"></i>
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
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.2s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchFatura" placeholder="Buscar por número, cliente ou descrição..." 
                               oninput="filtrarFaturas()">
                    </div>
                    <div class="filtros-actions">
                        <button class="btn btn-sm btn-outline" onclick="abrirFiltrosAvancados()">
                            <i class="fas fa-filter"></i> Filtros
                        </button>
                        <button class="btn btn-sm btn-outline" onclick="exportarFaturas()">
                            <i class="fas fa-download"></i> Exportar
                        </button>
                    </div>
                </div>

                <!-- Filtros rápidos por status -->
                <div class="filtros-status">
                    <button class="filtro-status active" data-status="todos" onclick="filtrarPorStatus('todos')">
                        Todas <span class="count"><?php echo $total_registros; ?></span>
                    </button>
                    <button class="filtro-status filtro-paga" data-status="paga" onclick="filtrarPorStatus('paga')">
                        <i class="fas fa-check-circle"></i> Pagas <span class="count"><?php echo $faturas_pagas; ?></span>
                    </button>
                    <button class="filtro-status filtro-pendente" data-status="pendente" onclick="filtrarPorStatus('pendente')">
                        <i class="fas fa-clock"></i> Pendentes <span class="count"><?php echo $faturas_pendentes; ?></span>
                    </button>
                    <button class="filtro-status filtro-vencida" data-status="vencida" onclick="filtrarPorStatus('vencida')">
                        <i class="fas fa-exclamation-triangle"></i> Vencidas <span class="count"><?php echo $faturas_vencidas; ?></span>
                    </button>
                    <button class="filtro-status filtro-cancelada" data-status="cancelada" onclick="filtrarPorStatus('cancelada')">
                        <i class="fas fa-times-circle"></i> Canceladas <span class="count"><?php echo $faturas_canceladas; ?></span>
                    </button>
                </div>

                <!-- Filtros avançados -->
                <div class="filtros-avancados" id="filtrosAvancados" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <select class="form-control" id="filtroCategoria" onchange="filtrarFaturas()">
                                <option value="">Todas as categorias</option>
                                <?php foreach ($categorias_unicas as $cat): ?>
                                    <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Data de Emissão</label>
                            <input type="date" class="form-control" id="filtroDataInicio" onchange="filtrarFaturas()">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ordenar por</label>
                            <select class="form-control" id="filtroOrdenar" onchange="filtrarFaturas()">
                                <option value="recente">Mais recente</option>
                                <option value="antiga">Mais antiga</option>
                                <option value="maior_valor">Maior valor</option>
                                <option value="menor_valor">Menor valor</option>
                            </select>
                        </div>
                    </div>
                    <div class="filtros-avancados-actions">
                        <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount">
                            <?php echo $total_registros; ?> resultado(s)
                        </span>
                    </div>
                </div>
            </section>

            <!-- ===== LISTA DE FATURAS ===== -->
            <section class="faturas-container animate-fade-up" style="animation-delay: 0.3s;">
                <div class="faturas-list" id="faturasList">
                    <?php foreach ($faturas as $fatura): 
                        $urgente = $fatura['dias_restantes'] <= 3 && $fatura['dias_restantes'] > 0;
                        $vencida = $fatura['dias_restantes'] < 0;
                    ?>
                        <div class="fatura-card <?php echo $fatura['status']; ?>" 
                             data-id="<?php echo $fatura['id']; ?>"
                             data-status="<?php echo $fatura['status']; ?>"
                             data-categoria="<?php echo $fatura['categoria']; ?>"
                             data-valor="<?php echo $fatura['valor']; ?>"
                             data-data="<?php echo $fatura['data_emissao']; ?>"
                             data-busca="<?php echo strtolower($fatura['numero'] . ' ' . $fatura['cliente']['nome'] . ' ' . $fatura['descricao']); ?>">
                            
                            <!-- Ícone -->
                            <div class="fatura-icon-wrapper">
                                <div class="fatura-icon" style="background: <?php echo $fatura['categoria_color']; ?>20; color: <?php echo $fatura['categoria_color']; ?>;">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                            </div>

                            <!-- Conteúdo -->
                            <div class="fatura-conteudo">
                                <div class="fatura-header">
                                    <span class="fatura-numero"><?php echo $fatura['numero']; ?></span>
                                    <span class="badge-status <?php echo getStatusClass($fatura['status']); ?>">
                                        <?php if ($fatura['status'] === 'paga'): ?>
                                            <i class="fas fa-check-circle"></i>
                                        <?php elseif ($fatura['status'] === 'pendente'): ?>
                                            <i class="fas fa-clock"></i>
                                        <?php elseif ($fatura['status'] === 'vencida'): ?>
                                            <i class="fas fa-exclamation-triangle"></i>
                                        <?php else: ?>
                                            <i class="fas fa-times-circle"></i>
                                        <?php endif; ?>
                                        <?php echo $fatura['status_label']; ?>
                                    </span>
                                </div>
                                <h3 class="fatura-descricao"><?php echo $fatura['descricao']; ?></h3>
                                
                                <div class="fatura-meta">
                                    <span class="meta-item">
                                        <i class="fas <?php echo getClienteIcon($fatura['cliente']['tipo']); ?>"></i>
                                        <?php echo $fatura['cliente']['nome']; ?>
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-tag"></i>
                                        <?php echo $fatura['categoria']; ?>
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-list"></i>
                                        <?php echo $fatura['itens']; ?> itens
                                    </span>
                                    <span class="meta-item">
                                        <i class="far fa-calendar"></i>
                                        Emitida: <?php echo formatDate($fatura['data_emissao']); ?>
                                    </span>
                                    <span class="meta-item meta-vencimento <?php echo $vencida ? 'text-danger' : ($urgente ? 'text-warning' : ''); ?>">
                                        <i class="fas fa-flag-checkered"></i>
                                        Vence: <?php echo formatDate($fatura['data_vencimento']); ?>
                                    </span>
                                    <?php if ($fatura['comprovativo']): ?>
                                        <span class="meta-item meta-comprovativo">
                                            <i class="fas fa-paperclip"></i> Comprovativo
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <!-- Alerta de Vencimento -->
                                <?php if ($fatura['status'] !== 'paga' && $fatura['status'] !== 'cancelada'): ?>
                                    <div class="fatura-prazo <?php echo $vencida ? 'atrasado' : ($urgente ? 'urgente' : 'normal'); ?>">
                                        <i class="fas <?php echo $vencida ? 'fa-exclamation-triangle' : 'fa-clock'; ?>"></i>
                                        <span>
                                            <?php 
                                            if ($vencida) {
                                                echo 'Vencida há ' . abs($fatura['dias_restantes']) . ' dias';
                                            } else {
                                                echo $fatura['dias_restantes'] . ' dias restantes';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Valor -->
                            <div class="fatura-valor-wrapper">
                                <div class="fatura-valor">Kz <?php echo formatMoney($fatura['valor']); ?></div>
                                <?php if ($fatura['valor_pago'] > 0 && $fatura['valor_pago'] < $fatura['valor']): ?>
                                    <div class="fatura-valor-pago">
                                        Pago: Kz <?php echo formatMoney($fatura['valor_pago']); ?>
                                    </div>
                                    <div class="fatura-valor-pendente">
                                        Falta: Kz <?php echo formatMoney($fatura['valor'] - $fatura['valor_pago']); ?>
                                    </div>
                                <?php elseif ($fatura['valor_pago'] >= $fatura['valor']): ?>
                                    <div class="fatura-valor-pago">
                                        <i class="fas fa-check-circle"></i> Totalmente paga
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Ações -->
                            <div class="fatura-actions">
                                <a href="fatura-detalhe.php?id=<?php echo $fatura['id']; ?>" class="btn-action" title="Ver Detalhes">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="fatura-editar.php?id=<?php echo $fatura['id']; ?>" class="btn-action" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?php if ($fatura['comprovativo']): ?>
                                    <button class="btn-action" onclick="baixarComprovativo(<?php echo $fatura['id']; ?>)" title="Baixar Comprovativo">
                                        <i class="fas fa-download"></i>
                                    </button>
                                <?php endif; ?>
                                <a href="fatura-cancelar.php?id=<?php echo $fatura['id']; ?>" 
                                   class="btn-action btn-action-danger" 
                                   title="Cancelar"
                                   onclick="return confirmarCancelamento(event, '<?php echo addslashes($fatura['numero']); ?>', <?php echo $fatura['id']; ?>)">
                                    <i class="fas fa-ban"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Empty state -->
                <div class="empty-state" id="emptyState" style="display: none;">
                    <i class="fas fa-search"></i>
                    <h3>Nenhuma fatura encontrada</h3>
                    <p>Tente ajustar os filtros de pesquisa</p>
                    <button class="btn btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-undo"></i> Limpar Filtros
                    </button>
                </div>

                <!-- Paginação -->
                <div class="paginacao" id="paginacao">
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="page-info">Página 1 de 1</span>
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO DE CANCELAMENTO       -->
    <!-- ========================================== -->
    <div class="modal" id="modalCancelamento">
        <div class="modal-overlay" onclick="fecharModalCancelamento()"></div>
        <div class="modal-content modal-content-danger">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Cancelamento
                </h3>
                <button class="modal-close" onclick="fecharModalCancelamento()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-ban"></i>
                    <div>
                        <strong>Atenção!</strong>
                        <span>O cancelamento da fatura é uma ação que requer justificativa.</span>
                    </div>
                </div>
                <p class="modal-texto">Tem certeza que deseja cancelar a fatura</p>
                <p class="modal-projeto-nome" id="modalFaturaNumero">-</p>
                <p class="modal-texto-small">
                    <i class="fas fa-info-circle"></i> Será solicitada uma justificativa no próximo passo.
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalCancelamento()">
                    <i class="fas fa-times"></i> Não, Voltar
                </button>
                <a href="#" class="btn btn-danger" id="modalBtnCancelar">
                    <i class="fas fa-ban"></i> Sim, Cancelar
                </a>
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

            filtrarFaturas();
        }

        function filtrarFaturas() {
            const search = (document.getElementById('searchFatura')?.value || '').toLowerCase().trim();
            const categoria = document.getElementById('filtroCategoria')?.value || '';
            const dataInicio = document.getElementById('filtroDataInicio')?.value || '';
            const ordenar = document.getElementById('filtroOrdenar')?.value || 'recente';

            const cards = Array.from(document.querySelectorAll('.fatura-card'));
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && card.dataset.status !== filtroStatusAtual) {
                    mostrar = false;
                }

                if (mostrar && categoria && card.dataset.categoria !== categoria) {
                    mostrar = false;
                }

                if (mostrar && dataInicio) {
                    mostrar = card.dataset.data >= dataInicio;
                }

                if (mostrar && search) {
                    mostrar = card.dataset.busca.includes(search);
                }

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            // Ordenar
            const container = document.getElementById('faturasList');
            const visibleCards = cards.filter(c => c.style.display !== 'none');

            if (ordenar === 'recente') {
                visibleCards.sort((a, b) => new Date(b.dataset.data) - new Date(a.dataset.data));
            } else if (ordenar === 'antiga') {
                visibleCards.sort((a, b) => new Date(a.dataset.data) - new Date(b.dataset.data));
            } else if (ordenar === 'maior_valor') {
                visibleCards.sort((a, b) => parseFloat(b.dataset.valor) - parseFloat(a.dataset.valor));
            } else if (ordenar === 'menor_valor') {
                visibleCards.sort((a, b) => parseFloat(a.dataset.valor) - parseFloat(b.dataset.valor));
            }

            visibleCards.forEach(card => container.appendChild(card));

            // Atualizar contador
            const count = document.getElementById('resultadosCount');
            if (count) count.textContent = visiveis + ' resultado(s)';

            // Empty state
            const emptyState = document.getElementById('emptyState');
            const list = document.getElementById('faturasList');
            
            if (visiveis === 0) {
                if (emptyState) emptyState.style.display = 'block';
                if (list) list.style.display = 'none';
            } else {
                if (emptyState) emptyState.style.display = 'none';
                if (list) list.style.display = 'flex';
            }
        }

        function limparFiltros() {
            document.getElementById('searchFatura').value = '';
            document.getElementById('filtroCategoria').value = '';
            document.getElementById('filtroDataInicio').value = '';
            document.getElementById('filtroOrdenar').value = 'recente';
            filtroStatusAtual = 'todos';

            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === 'todos');
            });

            filtrarFaturas();
            mostrarToast('Filtros limpos', 'info');
        }

        function abrirFiltrosAvancados() {
            const filtros = document.getElementById('filtrosAvancados');
            const isHidden = filtros.style.display === 'none';
            filtros.style.display = isHidden ? 'block' : 'none';
        }

        function exportarFaturas() {
            mostrarToast('A exportar faturas...', 'info');
            setTimeout(() => {
                mostrarToast('Exportação concluída!', 'success');
            }, 1500);
        }

        // ============================================
        // BAIXAR COMPROVATIVO
        // ============================================
        function baixarComprovativo(id) {
            mostrarToast('A baixar comprovativo...', 'info');
        }

        // ============================================
        // CONFIRMAR CANCELAMENTO
        // ============================================
        function confirmarCancelamento(event, numero, id) {
            event.preventDefault();
            
            const modal = document.getElementById('modalCancelamento');
            const btnCancelar = document.getElementById('modalBtnCancelar');
            
            document.getElementById('modalFaturaNumero').textContent = '"' + numero + '"';
            btnCancelar.href = 'fatura-cancelar.php?id=' + id;
            
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            return false;
        }

        function fecharModalCancelamento() {
            const modal = document.getElementById('modalCancelamento');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModalCancelamento();
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

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.3);
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
        .resumo-icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .resumo-icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }

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
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .search-box input::placeholder { color: var(--text-muted); }

        .filtros-actions {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
        }

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

        .filtro-status:hover { border-color: #FFD93D; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-color: transparent;
        }

        .filtro-status.filtro-paga.active {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
        }

        .filtro-status.filtro-vencida.active {
            background: linear-gradient(135deg, #FF6B6B 0%, #E55555 100%);
            color: #FFFFFF;
        }

        .filtro-status.filtro-cancelada.active {
            background: linear-gradient(135deg, #6B7A8F 0%, #4A5A6A 100%);
            color: #FFFFFF;
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
        /* FORM CONTROLS                              */
        /* ========================================== */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
        }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 10px 14px;
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
        }

        /* ========================================== */
        /* LISTA DE FATURAS                           */
        /* ========================================== */
        .faturas-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
        }

        .faturas-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .fatura-card {
            display: grid;
            grid-template-columns: auto 1fr auto auto;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            border-left: 4px solid transparent;
            transition: var(--transition-smooth);
            position: relative;
        }

        .fatura-card:hover {
            border-color: #FFD93D;
            transform: translateX(4px);
            box-shadow: var(--glass-shadow);
        }

        .fatura-card.paga { border-left-color: #00FFA3; }
        .fatura-card.pendente { border-left-color: #FFD93D; }
        .fatura-card.vencida { border-left-color: #FF6B6B; background: rgba(255, 107, 107, 0.02); }
        .fatura-card.cancelada { border-left-color: #6B7A8F; opacity: 0.75; }

        /* ===== ÍCONE ===== */
        .fatura-icon-wrapper {
            flex-shrink: 0;
        }

        .fatura-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        /* ===== CONTEÚDO ===== */
        .fatura-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .fatura-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .fatura-numero {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #FFD93D;
            letter-spacing: 0.5px;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
        }

        .badge-status.status-paga { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-vencida { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-cancelada { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        .fatura-descricao {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .fatura-meta {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-md);
            margin-top: 2px;
        }

        .meta-item {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .meta-item i { font-size: 11px; }
        .meta-vencimento.text-danger { color: #FF6B6B; font-weight: 600; }
        .meta-vencimento.text-warning { color: #FFD93D; font-weight: 600; }
        .meta-comprovativo { color: #00D2FF; font-weight: 600; }

        /* ===== ALERTA DE PRAZO ===== */
        .fatura-prazo {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: var(--radius-sm);
            font-size: var(--text-xs);
            font-weight: 500;
            margin-top: 4px;
            width: fit-content;
        }

        .fatura-prazo.normal {
            background: rgba(0, 210, 255, 0.08);
            color: #00D2FF;
        }

        .fatura-prazo.urgente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .fatura-prazo.atrasado {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        /* ===== VALOR ===== */
        .fatura-valor-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
            min-width: 130px;
            flex-shrink: 0;
        }

        .fatura-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FFD93D;
            white-space: nowrap;
        }

        .fatura-valor-pago {
            font-size: var(--text-xs);
            color: #00FFA3;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .fatura-valor-pendente {
            font-size: var(--text-xs);
            color: #FF6B6B;
            font-weight: 600;
        }

        /* ===== AÇÕES ===== */
        .fatura-actions {
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
            border-color: #FFD93D;
            color: #FFD93D;
            background: rgba(255, 217, 61, 0.05);
        }

        .btn-action-danger {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .btn-action-danger:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
            transform: scale(1.05);
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
            padding: var(--space-lg) 0 var(--space-sm);
            margin-top: var(--space-md);
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

        .page-btn:hover:not(:disabled) { border-color: #FFD93D; color: #FFD93D; }
        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 var(--space-sm);
        }

        /* ========================================== */
        /* MODAL DE CANCELAMENTO                      */
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
            max-width: 500px;
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
            margin-bottom: var(--space-lg);
        }

        .modal-alerta-danger i { font-size: 24px; color: #FF6B6B; flex-shrink: 0; }
        .modal-alerta-danger div { display: flex; flex-direction: column; gap: 4px; }
        .modal-alerta-danger strong { font-size: var(--text-sm); color: #FF6B6B; }
        .modal-alerta-danger span { font-size: var(--text-xs); color: var(--text-secondary); }

        .modal-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            text-align: center;
        }

        .modal-projeto-nome {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FF6B6B;
            text-align: center;
            margin: 0 0 var(--space-md) 0;
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border-radius: var(--radius-md);
            border: 2px dashed rgba(255, 107, 107, 0.4);
        }

        .modal-texto-small {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-align: center;
            margin: 0;
        }

        .modal-texto-small i { color: #00D2FF; margin-right: 4px; }

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
            .filtros-avancados .form-row { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .filtros-avancados .form-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }

            .filtros-top { flex-direction: column; align-items: stretch; }
            .filtros-status { overflow-x: auto; flex-wrap: nowrap; padding-bottom: 4px; }
            .filtro-status { white-space: nowrap; flex-shrink: 0; }

            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }

            .fatura-card {
                grid-template-columns: auto 1fr;
                gap: var(--space-sm);
            }

            .fatura-valor-wrapper {
                grid-column: 1 / -1;
                align-items: flex-start;
                min-width: auto;
                margin-top: var(--space-xs);
            }

            .fatura-actions {
                grid-column: 1 / -1;
                justify-content: flex-end;
            }

            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .fatura-card { padding: var(--space-sm); }
            .fatura-icon { width: 40px; height: 40px; font-size: 16px; }
            .fatura-descricao { font-size: var(--text-xs); }
            .fatura-meta { flex-direction: column; gap: 4px; }
            .fatura-valor { font-size: var(--text-h4); }
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