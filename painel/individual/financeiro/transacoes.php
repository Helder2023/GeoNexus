<?php
// painel/individual/financeiro/transacoes.php - Lista de Transações
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Transações';
$pagina_atual = 'transacoes';

// ============================================
// GARANTIR QUE AS VARIÁVEIS EXISTEM (FALLBACK)
// ============================================
if (!isset($total_transacoes))         $total_transacoes = 156;
if (!isset($valor_receber))            $valor_receber = 850000;
if (!isset($valor_pagar))              $valor_pagar = 320000;
if (!isset($total_faturas_pendentes))  $total_faturas_pendentes = 12;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// LISTA DE TRANSAÇÕES
// ============================================
$transacoes = [
    [
        'id' => 1,
        'referencia' => 'TRX-2026-0156',
        'descricao' => 'Pagamento de Projeto - Levantamento Topográfico',
        'cliente' => ['nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'avatar' => 'empresa-1.png'],
        'valor' => 350000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'categoria' => 'Projetos',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-18 14:20:00',
        'comprovativo' => true
    ],
    [
        'id' => 2,
        'referencia' => 'TRX-2026-0155',
        'descricao' => 'Comissão - Indicação Indústria Luanda',
        'cliente' => ['nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'avatar' => 'empresa-2.png'],
        'valor' => 45000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'categoria' => 'Comissões',
        'metodo' => 'Multicaixa',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-18 10:15:00',
        'comprovativo' => true
    ],
    [
        'id' => 3,
        'referencia' => 'TRX-2026-0154',
        'descricao' => 'Compra de Equipamento GPS Geodésico',
        'cliente' => ['nome' => 'Fornecedor Topografia Lda', 'tipo' => 'Empresa', 'avatar' => 'empresa-3.png'],
        'valor' => 180000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'categoria' => 'Equipamentos',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-17 16:30:00',
        'comprovativo' => true
    ],
    [
        'id' => 4,
        'referencia' => 'TRX-2026-0153',
        'descricao' => 'Assinatura Plano Pro - Mensalidade',
        'cliente' => ['nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'avatar' => 'empresa-4.png'],
        'valor' => 25000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'categoria' => 'Assinaturas',
        'metodo' => 'Multicaixa',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-17 11:00:00',
        'comprovativo' => true
    ],
    [
        'id' => 5,
        'referencia' => 'TRX-2026-0152',
        'descricao' => 'Reembolso - Deslocação para Huambo',
        'cliente' => ['nome' => 'Carlos Mendes', 'tipo' => 'Profissional', 'avatar' => 'avatar-1.png'],
        'valor' => 35000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'categoria' => 'Reembolsos',
        'metodo' => 'Numerário',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-16 15:45:00',
        'comprovativo' => false
    ],
    [
        'id' => 6,
        'referencia' => 'TRX-2026-0151',
        'descricao' => 'Pagamento de Projeto - Mapeamento GIS',
        'cliente' => ['nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'avatar' => 'instituicao-1.png'],
        'valor' => 480000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'categoria' => 'Projetos',
        'metodo' => 'Depósito Bancário',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-16 11:30:00',
        'comprovativo' => false
    ],
    [
        'id' => 7,
        'referencia' => 'TRX-2026-0150',
        'descricao' => 'Pagamento Fornecedor - Software CAD',
        'cliente' => ['nome' => 'Software CAD Lda', 'tipo' => 'Empresa', 'avatar' => 'empresa-5.png'],
        'valor' => 85000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'categoria' => 'Equipamentos',
        'metodo' => 'Cartão de Crédito',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-15 14:20:00',
        'comprovativo' => true
    ],
    [
        'id' => 8,
        'referencia' => 'TRX-2026-0149',
        'descricao' => 'Receita - Formação em Topografia',
        'cliente' => ['nome' => 'Instituto Técnico', 'tipo' => 'Instituição', 'avatar' => 'instituicao-2.png'],
        'valor' => 120000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'categoria' => 'Formação',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-15 09:00:00',
        'comprovativo' => true
    ],
    [
        'id' => 9,
        'referencia' => 'TRX-2026-0148',
        'descricao' => 'Pagamento - Subcontratação Engenheiro',
        'cliente' => ['nome' => 'Eng. Pedro Silva', 'tipo' => 'Profissional', 'avatar' => 'avatar-3.png'],
        'valor' => 95000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'categoria' => 'Serviços',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-14 16:00:00',
        'comprovativo' => true
    ],
    [
        'id' => 10,
        'referencia' => 'TRX-2026-0147',
        'descricao' => 'Receita - Renovação Enterprise',
        'cliente' => ['nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'avatar' => 'empresa-7.png'],
        'valor' => 250000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'categoria' => 'Assinaturas',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-14 10:30:00',
        'comprovativo' => true
    ],
    [
        'id' => 11,
        'referencia' => 'TRX-2026-0146',
        'descricao' => 'Cancelamento - Licenciamento GIS',
        'cliente' => ['nome' => 'Instituto Geográfico', 'tipo' => 'Instituição', 'avatar' => 'instituicao-3.png'],
        'valor' => 35000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'categoria' => 'Licenças',
        'metodo' => 'Depósito Bancário',
        'status' => 'cancelado',
        'status_label' => 'Cancelado',
        'data' => '2026-02-13 09:00:00',
        'comprovativo' => false
    ],
    [
        'id' => 12,
        'referencia' => 'TRX-2026-0145',
        'descricao' => 'Receita - Serviço de Drones Costeiro',
        'cliente' => ['nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'avatar' => 'instituicao-1.png'],
        'valor' => 320000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'categoria' => 'Projetos',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-12 15:00:00',
        'comprovativo' => true
    ],
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_registros = count($transacoes);
$total_receitas = array_sum(array_map(fn($t) => $t['tipo'] === 'receita' ? $t['valor'] : 0, $transacoes));
$total_despesas = array_sum(array_map(fn($t) => $t['tipo'] === 'despesa' ? $t['valor'] : 0, $transacoes));
$saldo_liquido = $total_receitas - $total_despesas;

$concluidas = count(array_filter($transacoes, fn($t) => $t['status'] === 'concluido'));
$pendentes = count(array_filter($transacoes, fn($t) => $t['status'] === 'pendente'));
$canceladas = count(array_filter($transacoes, fn($t) => $t['status'] === 'cancelado'));

// ============================================
// CATEGORIAS ÚNICAS (para filtro)
// ============================================
$categorias_unicas = array_unique(array_column($transacoes, 'categoria'));
sort($categorias_unicas);

// ============================================
// MÉTODOS ÚNICOS (para filtro)
// ============================================
$metodos_unicos = array_unique(array_column($transacoes, 'metodo'));
sort($metodos_unicos);

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

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'concluido' => 'status-concluido',
            'pendente' => 'status-pendente',
            'cancelado' => 'status-cancelado',
            'falhou' => 'status-falhou'
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

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
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
                        <i class="fas fa-exchange-alt icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $total_registros; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Transações</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="transacao-criar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nova Transação
                    </a>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($total_receitas / 1000, 0); ?>k</div>
                    <div class="label">Total de Receitas</div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($total_despesas / 1000, 0); ?>k</div>
                    <div class="label">Total de Despesas</div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="value" style="color: <?php echo $saldo_liquido >= 0 ? '#00FFA3' : '#FF6B6B'; ?>;">
                        <?php echo $saldo_liquido >= 0 ? '+' : '-'; ?>Kz <?php echo number_format(abs($saldo_liquido) / 1000, 0); ?>k
                    </div>
                    <div class="label">Saldo Líquido</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $pendentes; ?></div>
                    <div class="label">Transações Pendentes</div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.1s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchTransacao" placeholder="Buscar por descrição, cliente ou referência..." 
                               oninput="filtrarTransacoes()">
                    </div>
                    <div class="filtros-actions">
                        <button class="btn btn-sm btn-outline" onclick="abrirFiltrosAvancados()">
                            <i class="fas fa-filter"></i> Filtros
                        </button>
                        <button class="btn btn-sm btn-outline" onclick="exportarTransacoes()">
                            <i class="fas fa-download"></i> Exportar
                        </button>
                    </div>
                </div>

                <!-- Filtros rápidos por tipo -->
                <div class="filtros-status">
                    <button class="filtro-status active" data-tipo="todos" onclick="filtrarPorTipo('todos')">
                        Todas <span class="count"><?php echo $total_registros; ?></span>
                    </button>
                    <button class="filtro-status filtro-receita" data-tipo="receita" onclick="filtrarPorTipo('receita')">
                        <i class="fas fa-arrow-up"></i> Receitas
                    </button>
                    <button class="filtro-status filtro-despesa" data-tipo="despesa" onclick="filtrarPorTipo('despesa')">
                        <i class="fas fa-arrow-down"></i> Despesas
                    </button>
                </div>

                <!-- Filtros avançados -->
                <div class="filtros-avancados" id="filtrosAvancados" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="filtroStatus" onchange="filtrarTransacoes()">
                                <option value="">Todos os status</option>
                                <option value="concluido">Concluído</option>
                                <option value="pendente">Pendente</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <select class="form-control" id="filtroCategoria" onchange="filtrarTransacoes()">
                                <option value="">Todas as categorias</option>
                                <?php foreach ($categorias_unicas as $cat): ?>
                                    <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Método</label>
                            <select class="form-control" id="filtroMetodo" onchange="filtrarTransacoes()">
                                <option value="">Todos os métodos</option>
                                <?php foreach ($metodos_unicos as $met): ?>
                                    <option value="<?php echo $met; ?>"><?php echo $met; ?></option>
                                <?php endforeach; ?>
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

            <!-- ===== LISTA DE TRANSAÇÕES ===== -->
            <section class="transacoes-container animate-fade-up" style="animation-delay: 0.2s;">
                <div class="transacoes-list" id="transacoesList">
                    <?php foreach ($transacoes as $t): ?>
                        <div class="transacao-card" 
                             data-id="<?php echo $t['id']; ?>"
                             data-tipo="<?php echo $t['tipo']; ?>"
                             data-status="<?php echo $t['status']; ?>"
                             data-categoria="<?php echo $t['categoria']; ?>"
                             data-metodo="<?php echo $t['metodo']; ?>"
                             data-busca="<?php echo strtolower($t['descricao'] . ' ' . $t['cliente']['nome'] . ' ' . $t['referencia']); ?>">
                            
                            <!-- Ícone do tipo -->
                            <div class="transacao-card-icon <?php echo $t['tipo']; ?>">
                                <i class="fas fa-arrow-<?php echo $t['tipo'] === 'receita' ? 'up' : 'down'; ?>"></i>
                            </div>

                            <!-- Conteúdo -->
                            <div class="transacao-card-conteudo">
                                <div class="transacao-card-header">
                                    <span class="transacao-card-referencia"><?php echo $t['referencia']; ?></span>
                                    <span class="badge-status <?php echo getStatusClass($t['status']); ?>">
                                        <?php echo $t['status_label']; ?>
                                    </span>
                                </div>
                                <h3 class="transacao-card-descricao"><?php echo $t['descricao']; ?></h3>
                                
                                <div class="transacao-card-meta">
                                    <span class="meta-item">
                                        <i class="fas <?php echo getClienteIcon($t['cliente']['tipo']); ?>"></i>
                                        <?php echo $t['cliente']['nome']; ?>
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-tag"></i>
                                        <?php echo $t['categoria']; ?>
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-credit-card"></i>
                                        <?php echo $t['metodo']; ?>
                                    </span>
                                    <span class="meta-item">
                                        <i class="far fa-calendar"></i>
                                        <?php echo formatDateTime($t['data']); ?>
                                    </span>
                                    <?php if ($t['comprovativo']): ?>
                                        <span class="meta-item meta-comprovativo">
                                            <i class="fas fa-paperclip"></i> Comprovativo
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Valor -->
                            <div class="transacao-card-valor">
                                <div class="valor <?php echo $t['tipo']; ?>">
                                    <?php echo $t['tipo'] === 'receita' ? '+' : '-'; ?>
                                    Kz <?php echo formatMoney($t['valor']); ?>
                                </div>
                                <div class="valor-label"><?php echo $t['tipo_label']; ?></div>
                            </div>

                            <!-- Ações -->
                            <div class="transacao-card-actions">
                                <a href="transacao-detalhe.php?id=<?php echo $t['id']; ?>" class="btn-action" title="Ver Detalhes">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="transacao-editar.php?id=<?php echo $t['id']; ?>" class="btn-action" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="transacao-excluir.php?id=<?php echo $t['id']; ?>" 
                                   class="btn-action btn-action-danger" 
                                   title="Excluir"
                                   onclick="return confirmarExclusao(event, '<?php echo addslashes($t['referencia']); ?>', <?php echo $t['id']; ?>)">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Empty state (escondido) -->
                <div class="empty-state" id="emptyState" style="display: none;">
                    <i class="fas fa-search"></i>
                    <h3>Nenhuma transação encontrada</h3>
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
    <!-- MODAL DE CONFIRMAÇÃO DE EXCLUSÃO           -->
    <!-- ========================================== -->
    <div class="modal" id="modalExcluir">
        <div class="modal-overlay" onclick="fecharModalExcluir()"></div>
        <div class="modal-content modal-content-danger">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Exclusão
                </h3>
                <button class="modal-close" onclick="fecharModalExcluir()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-trash"></i>
                    <div>
                        <strong>Esta ação é irreversível!</strong>
                        <span>A transação será permanentemente excluída do sistema.</span>
                    </div>
                </div>
                <p class="modal-texto">Tem certeza que deseja excluir a transação</p>
                <p class="modal-projeto-nome" id="modalTransacaoRef">-</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalExcluir()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <a href="#" class="btn btn-danger" id="modalBtnExcluir">
                    <i class="fas fa-trash"></i> Excluir Permanentemente
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
        let filtroTipoAtual = 'todos';

        function filtrarPorTipo(tipo) {
            filtroTipoAtual = tipo;

            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.tipo === tipo);
            });

            filtrarTransacoes();
        }

        function filtrarTransacoes() {
            const search = (document.getElementById('searchTransacao')?.value || '').toLowerCase().trim();
            const status = document.getElementById('filtroStatus')?.value || '';
            const categoria = document.getElementById('filtroCategoria')?.value || '';
            const metodo = document.getElementById('filtroMetodo')?.value || '';

            const cards = document.querySelectorAll('.transacao-card');
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;

                // Filtro por tipo
                if (filtroTipoAtual !== 'todos' && card.dataset.tipo !== filtroTipoAtual) {
                    mostrar = false;
                }

                // Filtro por status
                if (mostrar && status && card.dataset.status !== status) {
                    mostrar = false;
                }

                // Filtro por categoria
                if (mostrar && categoria && card.dataset.categoria !== categoria) {
                    mostrar = false;
                }

                // Filtro por método
                if (mostrar && metodo && card.dataset.metodo !== metodo) {
                    mostrar = false;
                }

                // Filtro por busca
                if (mostrar && search) {
                    mostrar = card.dataset.busca.includes(search);
                }

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            // Atualizar contador
            const count = document.getElementById('resultadosCount');
            if (count) count.textContent = visiveis + ' resultado(s)';

            // Empty state
            const emptyState = document.getElementById('emptyState');
            const list = document.getElementById('transacoesList');
            
            if (visiveis === 0) {
                if (emptyState) emptyState.style.display = 'block';
                if (list) list.style.display = 'none';
            } else {
                if (emptyState) emptyState.style.display = 'none';
                if (list) list.style.display = 'flex';
            }
        }

        function limparFiltros() {
            document.getElementById('searchTransacao').value = '';
            document.getElementById('filtroStatus').value = '';
            document.getElementById('filtroCategoria').value = '';
            document.getElementById('filtroMetodo').value = '';
            filtroTipoAtual = 'todos';

            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.tipo === 'todos');
            });

            filtrarTransacoes();
            mostrarToast('Filtros limpos', 'info');
        }

        function abrirFiltrosAvancados() {
            const filtros = document.getElementById('filtrosAvancados');
            const isHidden = filtros.style.display === 'none';
            filtros.style.display = isHidden ? 'block' : 'none';
        }

        function exportarTransacoes() {
            mostrarToast('A exportar transações...', 'info');
            setTimeout(() => {
                mostrarToast('Exportação concluída!', 'success');
            }, 1500);
        }

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, referencia, id) {
            event.preventDefault();
            
            const modal = document.getElementById('modalExcluir');
            const btnExcluir = document.getElementById('modalBtnExcluir');
            
            document.getElementById('modalTransacaoRef').textContent = '"' + referencia + '"';
            btnExcluir.href = 'transacao-excluir.php?id=' + id;
            
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            return false;
        }

        function fecharModalExcluir() {
            const modal = document.getElementById('modalExcluir');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModalExcluir();
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
            background: linear-gradient(180deg, #00D2FF 0%, #6C2BD9 100%);
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

        .header-left h1 .icon { color: #00D2FF; font-size: 0.85em; }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.3);
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

        .btn-theme:hover { border-color: #00D2FF; color: #00D2FF; }
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
        .stat-card .icon.red { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }

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
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
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

        .filtro-status:hover { border-color: #00D2FF; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            border-color: transparent;
        }

        .filtro-status.filtro-receita.active {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
        }

        .filtro-status.filtro-despesa.active {
            background: linear-gradient(135deg, #FF6B6B 0%, #FF9F43 100%);
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
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
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
        /* LISTA DE TRANSAÇÕES                        */
        /* ========================================== */
        .transacoes-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
        }

        .transacoes-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .transacao-card {
            display: grid;
            grid-template-columns: auto 1fr auto auto;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            position: relative;
        }

        .transacao-card:hover {
            border-color: #00D2FF;
            transform: translateX(4px);
            box-shadow: var(--glass-shadow);
        }

        /* ===== ÍCONE DO TIPO ===== */
        .transacao-card-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .transacao-card-icon.receita {
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.2) 0%, rgba(0, 210, 255, 0.1) 100%);
            color: #00FFA3;
        }

        .transacao-card-icon.despesa {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(255, 159, 67, 0.1) 100%);
            color: #FF6B6B;
        }

        /* ===== CONTEÚDO ===== */
        .transacao-card-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .transacao-card-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .transacao-card-referencia {
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 700;
            color: #00D2FF;
            letter-spacing: 0.5px;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 8px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
        }

        .badge-status.status-concluido { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-cancelado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-falhou { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        .transacao-card-descricao {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
        }

        .transacao-card-meta {
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

        .meta-comprovativo {
            color: #00D2FF;
            font-weight: 600;
        }

        /* ===== VALOR ===== */
        .transacao-card-valor {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
            min-width: 120px;
            flex-shrink: 0;
        }

        .transacao-card-valor .valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            white-space: nowrap;
        }

        .transacao-card-valor .valor.receita { color: #00FFA3; }
        .transacao-card-valor .valor.despesa { color: #FF6B6B; }

        .transacao-card-valor .valor-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== AÇÕES ===== */
        .transacao-card-actions {
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
            border-color: #00D2FF;
            color: #00D2FF;
            background: rgba(0, 210, 255, 0.05);
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

        .page-btn:hover:not(:disabled) { border-color: #00D2FF; color: #00D2FF; }
        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 var(--space-sm);
        }

        /* ========================================== */
        /* MODAL DE EXCLUSÃO                          */
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
            margin: 0;
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border-radius: var(--radius-md);
            border: 2px dashed rgba(255, 107, 107, 0.4);
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

            .transacao-card {
                grid-template-columns: auto 1fr;
                gap: var(--space-sm);
            }

            .transacao-card-valor {
                grid-column: 1 / -1;
                align-items: flex-start;
                min-width: auto;
                margin-top: var(--space-xs);
            }

            .transacao-card-actions {
                grid-column: 1 / -1;
                justify-content: flex-end;
            }

            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .transacao-card { padding: var(--space-sm); }
            .transacao-card-icon { width: 40px; height: 40px; font-size: 16px; }
            .transacao-card-descricao { font-size: var(--text-xs); }
            .transacao-card-meta { flex-direction: column; gap: 4px; }
            .transacao-card-valor .valor { font-size: var(--text-h4); }
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