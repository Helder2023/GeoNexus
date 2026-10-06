<?php
// painel/admin/financeiro/transacoes.php - Gestão de Transações
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Transações';
$pagina_atual = 'transacoes';

// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE TRANSAÇÕES =====
$transacoes = [
    [
        'id' => 1,
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-1.png',
        'valor' => 25000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Multicaixa',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-18 14:20:00',
        'descricao' => 'Plano Pro - Mensalidade',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-001',
        'comprovativo' => 'comp-001.pdf'
    ],
    [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-1.png',
        'valor' => 75000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-18 11:45:00',
        'descricao' => 'Enterprise - Anual',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-002',
        'comprovativo' => null
    ],
    [
        'id' => 3,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Instituição',
        'cliente_avatar' => 'instituicao-1.png',
        'valor' => 125000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Depósito Bancário',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-18 09:00:00',
        'descricao' => 'Institucional Pro - Trimestral',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-003',
        'comprovativo' => null
    ],
    [
        'id' => 4,
        'cliente' => 'Ana Costa',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-2.png',
        'valor' => 15000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Cartão de Crédito',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-17 16:30:00',
        'descricao' => 'Básico - Mensalidade',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-004',
        'comprovativo' => 'comp-004.pdf'
    ],
    [
        'id' => 5,
        'cliente' => 'Mineração Progresso',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-7.png',
        'valor' => 250000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-17 14:20:00',
        'descricao' => 'Enterprise Pro - Anual',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-005',
        'comprovativo' => 'comp-005.pdf'
    ],
    [
        'id' => 6,
        'cliente' => 'Energia Futuro',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-8.png',
        'valor' => 45000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Multicaixa',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-17 11:00:00',
        'descricao' => 'Empresarial - Mensalidade',
        'categoria' => 'Assinaturas',
        'referencia' => 'TRX-006',
        'comprovativo' => null
    ],
    [
        'id' => 7,
        'cliente' => 'Pedro Santos',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-3.png',
        'valor' => 8000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-16 15:00:00',
        'descricao' => 'Comissão - Indicação',
        'categoria' => 'Comissões',
        'referencia' => 'TRX-007',
        'comprovativo' => 'comp-007.pdf'
    ],
    [
        'id' => 8,
        'cliente' => 'Construtora Silva',
        'cliente_tipo' => 'Empresa',
        'cliente_avatar' => 'empresa-2.png',
        'valor' => 120000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Transferência Bancária',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'data' => '2026-02-16 10:30:00',
        'descricao' => 'Projeto Topográfico - Zona Norte',
        'categoria' => 'Projetos',
        'referencia' => 'TRX-008',
        'comprovativo' => 'comp-008.pdf'
    ],
    [
        'id' => 9,
        'cliente' => 'Instituto Geográfico',
        'cliente_tipo' => 'Instituição',
        'cliente_avatar' => 'instituicao-2.png',
        'valor' => 35000,
        'tipo' => 'receita',
        'tipo_label' => 'Receita',
        'metodo' => 'Depósito Bancário',
        'status' => 'cancelado',
        'status_label' => 'Cancelado',
        'data' => '2026-02-15 09:00:00',
        'descricao' => 'Licenciamento GIS',
        'categoria' => 'Licenças',
        'referencia' => 'TRX-009',
        'comprovativo' => null
    ],
    [
        'id' => 10,
        'cliente' => 'Mário Ferreira',
        'cliente_tipo' => 'Profissional',
        'cliente_avatar' => 'avatar-4.png',
        'valor' => 12000,
        'tipo' => 'despesa',
        'tipo_label' => 'Despesa',
        'metodo' => 'Multicaixa',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-15 08:00:00',
        'descricao' => 'Reembolso - Deslocação',
        'categoria' => 'Reembolsos',
        'referencia' => 'TRX-010',
        'comprovativo' => null
    ],
];

// Estatísticas das transações
$total_transacoes = count($transacoes);
$total_receitas = 0;
$total_despesas = 0;
foreach ($transacoes as $t) {
    if ($t['tipo'] === 'receita') {
        $total_receitas += $t['valor'];
    } else {
        $total_despesas += $t['valor'];
    }
}
$transacoes_pendentes = count(array_filter($transacoes, function ($t) {
    return $t['status'] === 'pendente';
}));
$transacoes_concluidas = count(array_filter($transacoes, function ($t) {
    return $t['status'] === 'concluido';
}));

// Funções auxiliares
function safeValue($value, $default = 'N/A')
{
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function formatMoney($value)
{
    return number_format($value, 0, ',', '.');
}

function formatDate($date)
{
    if (empty($date)) return 'N/A';
    return date('d/m/Y', strtotime($date));
}

function formatDateTime($datetime)
{
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i', strtotime($datetime));
}

function getAvatarUrl($name)
{
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

function getTipoIcon($tipo)
{
    return $tipo === 'receita' ? 'fa-arrow-up' : 'fa-arrow-down';
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
            <?php include "../../../includes/admin-financeiro-sidebar.php" ?>
        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-exchange-alt icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
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
                    <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <button class="btn btn-primary" onclick="abrirModal('modalNovaTransacao')">
                            <i class="fas fa-plus"></i> Nova Transação
                        </button>
                        <button class="btn btn-outline" onclick="window.location.reload()">
                            <i class="fas fa-sync-alt"></i> Atualizar
                        </button>
                        <button class="btn btn-outline" onclick="exportarTransacoes()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                    <div class="icon blue"><i class="fas fa-list"></i></div>
                    <div class="value"><?php echo $total_transacoes; ?></div>
                    <div class="label">Total de Transações</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 12.5%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                    <div class="icon green"><i class="fas fa-arrow-up"></i></div>
                    <div class="value">Kz <?php echo formatMoney($total_receitas); ?></div>
                    <div class="label">Total de Receitas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 8.3%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                    <div class="icon red"><i class="fas fa-arrow-down"></i></div>
                    <div class="value">Kz <?php echo formatMoney($total_despesas); ?></div>
                    <div class="label">Total de Despesas</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 3.2%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                    <div class="icon yellow"><i class="fas fa-clock"></i></div>
                    <div class="value"><?php echo $transacoes_pendentes; ?></div>
                    <div class="label">Pendentes</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 2.1%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #6C2BD9;">
                    <div class="icon aurora"><i class="fas fa-check-circle"></i></div>
                    <div class="value"><?php echo $transacoes_concluidas; ?></div>
                    <div class="label">Concluídas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 15.7%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                    <div class="icon green"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="value">Kz <?php echo formatMoney($total_receitas - $total_despesas); ?></div>
                    <div class="label">Saldo Líquido</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 11.4%</div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filtros-container animate-fade-up">
                <div class="filtros-grid">
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-search"></i> Buscar</label>
                        <input type="text" class="form-control" id="searchTransacao" placeholder="Cliente, descrição ou referência..." onkeyup="filtrarTransacoes()">
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-filter"></i> Tipo</label>
                        <select class="form-control" id="filtroTipo" onchange="filtrarTransacoes()">
                            <option value="todos">Todos os tipos</option>
                            <option value="receita">Receitas</option>
                            <option value="despesa">Despesas</option>
                        </select>
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-tag"></i> Status</label>
                        <select class="form-control" id="filtroStatus" onchange="filtrarTransacoes()">
                            <option value="todos">Todos os status</option>
                            <option value="concluido">Concluído</option>
                            <option value="pendente">Pendente</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-calendar-alt"></i> Período</label>
                        <select class="form-control" id="filtroPeriodo" onchange="filtrarTransacoes()">
                            <option value="todos">Todos os períodos</option>
                            <option value="hoje">Hoje</option>
                            <option value="semana">Esta semana</option>
                            <option value="mes">Este mês</option>
                            <option value="ano">Este ano</option>
                        </select>
                    </div>
                    <div class="filtro-group filtro-actions">
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-times"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount"><?php echo $total_transacoes; ?> resultados</span>
                    </div>
                </div>
            </div>

            <!-- ===== TABELA DE TRANSAÇÕES ===== -->
            <div class="financeiro-container animate-fade-up">
                <div class="section-header">
                    <h3><i class="fas fa-exchange-alt"></i> Lista de Transações</h3>
                    <div class="section-actions">
                        <span class="transacoes-total">Total: <strong>Kz <?php echo formatMoney(array_sum(array_column($transacoes, 'valor'))); ?></strong></span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-financeiro" id="tabelaTransacoes">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Descrição</th>
                                <th>Categoria</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>Método</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="transacoesBody">
                            <?php foreach ($transacoes as $transacao): ?>
                                <tr data-tipo="<?php echo $transacao['tipo']; ?>"
                                    data-status="<?php echo $transacao['status']; ?>"
                                    data-cliente="<?php echo strtolower($transacao['cliente']); ?>"
                                    data-descricao="<?php echo strtolower($transacao['descricao']); ?>"
                                    data-referencia="<?php echo strtolower($transacao['referencia']); ?>"
                                    data-data="<?php echo date('Y-m-d', strtotime($transacao['data'])); ?>">
                                    <td>
                                        <div class="cliente-cell">
                                            <img src="../../../assets/images/<?php echo $transacao['cliente_avatar']; ?>"
                                                alt="<?php echo $transacao['cliente']; ?>"
                                                onerror="this.src='<?php echo getAvatarUrl($transacao['cliente']); ?>'">
                                            <div class="cliente-info">
                                                <span class="cliente-nome"><?php echo $transacao['cliente']; ?></span>
                                                <span class="cliente-tipo"><?php echo $transacao['cliente_tipo']; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="descricao-cell">
                                            <span class="descricao-texto"><?php echo $transacao['descricao']; ?></span>
                                            <span class="descricao-ref"><?php echo $transacao['referencia']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge-categoria"><?php echo $transacao['categoria']; ?></span>
                                    </td>
                                    <td>
                                        <span class="badge-tipo badge-<?php echo $transacao['tipo']; ?>">
                                            <i class="fas <?php echo getTipoIcon($transacao['tipo']); ?>"></i>
                                            <?php echo $transacao['tipo_label']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="valor <?php echo $transacao['tipo'] === 'receita' ? 'valor-receita' : 'valor-despesa'; ?>">
                                            <?php echo $transacao['tipo'] === 'receita' ? '+' : '-'; ?>
                                            Kz <?php echo formatMoney($transacao['valor']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $transacao['metodo']; ?></td>
                                    <td>
                                        <span class="badge-status status-<?php echo $transacao['status']; ?>">
                                            <span class="status-dot"></span>
                                            <?php echo $transacao['status_label']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="data-cell">
                                            <span class="data-principal"><?php echo formatDate($transacao['data']); ?></span>
                                            <span class="data-hora"><?php echo date('H:i', strtotime($transacao['data'])); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="transacao-detalhe.php?id=<?php echo $transacao['id']; ?>" class="btn" title="Ver Detalhes">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="transacao-editar.php?id=<?php echo $transacao['id']; ?>" class="btn" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="transacao-excluir.php?id=<?php echo $transacao['id']; ?>" class="btn btn-danger" title="Excluir">
                                                <i class="fas fa-trash"></i>
                                            </a>
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
                        Mostrando <strong id="paginacaoInicio">1</strong> - <strong id="paginacaoFim"><?php echo min(10, $total_transacoes); ?></strong> de <strong id="paginacaoTotal"><?php echo $total_transacoes; ?></strong> transações
                    </div>
                    <div class="paginacao-controles" id="paginacaoControles">
                        <button class="btn" id="paginaAnterior" onclick="mudarPagina(-1)" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="pagina-atual" id="paginaAtual">1 / <?php echo ceil($total_transacoes / 10); ?></span>
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
    <!-- MODAL NOVA TRANSAÇÃO                      -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovaTransacao">
        <div class="modal-overlay" onclick="fecharModal('modalNovaTransacao')"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-plus-circle"></i> Nova Transação</h3>
                <button class="modal-close" onclick="fecharModal('modalNovaTransacao')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovaTransacao" onsubmit="criarTransacao(event)">
                    <div class="form-group">
                        <label class="form-label">Cliente <span class="required">*</span></label>
                        <input type="text" class="form-control" id="clienteTransacao" placeholder="Nome do cliente" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Descrição <span class="required">*</span></label>
                        <input type="text" class="form-control" id="descricaoTransacao" placeholder="Descrição da transação" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Valor <span class="required">*</span></label>
                            <input type="number" class="form-control" id="valorTransacao" placeholder="0" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tipo <span class="required">*</span></label>
                            <select class="form-control" id="tipoTransacao" required>
                                <option value="receita">Receita</option>
                                <option value="despesa">Despesa</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Método</label>
                            <select class="form-control" id="metodoTransacao">
                                <option value="Multicaixa">Multicaixa</option>
                                <option value="Transferência Bancária">Transferência Bancária</option>
                                <option value="Cartão de Crédito">Cartão de Crédito</option>
                                <option value="Depósito Bancário">Depósito Bancário</option>
                                <option value="Numerário">Numerário</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="statusTransacao">
                                <option value="concluido">Concluído</option>
                                <option value="pendente">Pendente</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Categoria</label>
                        <select class="form-control" id="categoriaTransacao">
                            <option value="Assinaturas">Assinaturas</option>
                            <option value="Projetos">Projetos</option>
                            <option value="Licenças">Licenças</option>
                            <option value="Comissões">Comissões</option>
                            <option value="Reembolsos">Reembolsos</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalNovaTransacao')">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('formNovaTransacao').submit()">
                    <i class="fas fa-save"></i> Criar Transação
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        

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
        // FILTRAR
        // ==========================================
        function filtrarTransacoes() {
            const search = document.getElementById('searchTransacao').value.toLowerCase();
            const tipo = document.getElementById('filtroTipo').value;
            const status = document.getElementById('filtroStatus').value;
            const periodo = document.getElementById('filtroPeriodo').value;

            const rows = document.querySelectorAll('#transacoesBody tr');
            let visiveis = 0;

            rows.forEach(row => {
                const cliente = row.dataset.cliente || '';
                const descricao = row.dataset.descricao || '';
                const referencia = row.dataset.referencia || '';
                const rowTipo = row.dataset.tipo || '';
                const rowStatus = row.dataset.status || '';
                const rowData = row.dataset.data || '';

                let mostrar = true;

                if (search) {
                    const match = cliente.includes(search) || descricao.includes(search) || referencia.includes(search);
                    if (!match) mostrar = false;
                }

                if (tipo !== 'todos' && rowTipo !== tipo) mostrar = false;
                if (status !== 'todos' && rowStatus !== status) mostrar = false;

                if (periodo !== 'todos' && rowData) {
                    const hoje = new Date();
                    const dataTransacao = new Date(rowData);
                    const diffDias = Math.floor((hoje - dataTransacao) / (1000 * 60 * 60 * 24));

                    switch (periodo) {
                        case 'hoje':
                            if (diffDias > 0) mostrar = false;
                            break;
                        case 'semana':
                            if (diffDias > 7) mostrar = false;
                            break;
                        case 'mes':
                            if (diffDias > 30) mostrar = false;
                            break;
                        case 'ano':
                            if (diffDias > 365) mostrar = false;
                            break;
                    }
                }

                row.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            document.getElementById('resultadosCount').textContent = visiveis + ' resultados';
            paginaAtual = 1;
            atualizarPaginacao();
        }

        function limparFiltros() {
            document.getElementById('searchTransacao').value = '';
            document.getElementById('filtroTipo').value = 'todos';
            document.getElementById('filtroStatus').value = 'todos';
            document.getElementById('filtroPeriodo').value = 'todos';
            filtrarTransacoes();
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
            const rows = document.querySelectorAll('#transacoesBody tr');
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
            const total = document.querySelectorAll('#transacoesBody tr:not([style*="display: none"])').length;
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
        function exportarTransacoes() {
            mostrarToast('A exportar transações...', 'info');
            setTimeout(() => {
                mostrarToast('Transações exportadas com sucesso!', 'success');
            }, 1500);
        }

        // ==========================================
        // CRIAR TRANSAÇÃO
        // ==========================================
        function criarTransacao(event) {
            event.preventDefault();

            const cliente = document.getElementById('clienteTransacao').value;
            const descricao = document.getElementById('descricaoTransacao').value;
            const valor = document.getElementById('valorTransacao').value;

            if (!cliente || !descricao || !valor) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast('Transação criada com sucesso!', 'success');
            fecharModal('modalNovaTransacao');
            document.getElementById('formNovaTransacao').reset();

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
        /* TRANSAÇÕES - CSS COMPLETO CORRIGIDO        */
        /* ========================================== */

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

        .table-financeiro {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 900px;
        }

        .table-financeiro thead {
            background: var(--bg-input);
        }

        .table-financeiro thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .table-financeiro tbody td {
            padding: 10px 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-financeiro tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-financeiro tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== CLIENTE CELL ===== */
        .cliente-cell {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .cliente-cell img {
            width: 36px;
            height: 36px;
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

        /* ===== DESCRIÇÃO CELL ===== */
        .descricao-cell {
            display: flex;
            flex-direction: column;
            line-height: 1.3;
        }

        .descricao-texto {
            font-weight: 500;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .descricao-ref {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== DATA CELL ===== */
        .data-cell {
            display: flex;
            flex-direction: column;
            line-height: 1.3;
        }

        .data-principal {
            font-weight: 500;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .data-hora {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== VALORES ===== */
        .valor {
            font-weight: 600;
            font-size: var(--text-sm);
        }

        .valor-receita {
            color: #00FFA3;
        }

        .valor-despesa {
            color: #FF6B6B;
        }

        /* ===== BADGES ===== */
        .badge-tipo {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-tipo.badge-receita {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-tipo.badge-despesa {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
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

        .badge-status .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .badge-status.status-concluido {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-concluido .status-dot {
            background: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-pendente .status-dot {
            background: #FFD93D;
        }

        .badge-status.status-cancelado {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-status.status-cancelado .status-dot {
            background: #FF6B6B;
        }

        .badge-categoria {
            display: inline-block;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
        }

        [data-theme="light"] .badge-categoria {
            background: rgba(108, 43, 217, 0.08);
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

        /* ===== TRANSAÇÕES TOTAL ===== */
        .transacoes-total {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .transacoes-total strong {
            color: #FFD93D;
            font-weight: 700;
        }

        /* ========================================== */
        /* MODAL CORRIGIDO                            */
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

        .modal-header .modal-title.danger {
            color: #FF6B6B;
        }

        .modal-header .modal-title.danger i {
            color: #FF6B6B;
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
        }

        @media (max-width: 992px) {
            .table-financeiro {
                min-width: 700px;
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

            .table-financeiro {
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

            .financeiro-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
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

            .table-financeiro tbody td {
                padding: 6px 8px;
                font-size: var(--text-xs);
            }

            .table-financeiro thead th {
                padding: 8px 8px;
                font-size: 9px;
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

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */

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

        .animate-fade-up:nth-child(2) {
            animation-delay: 0.05s;
        }

        .animate-fade-up:nth-child(3) {
            animation-delay: 0.1s;
        }

        .animate-fade-up:nth-child(4) {
            animation-delay: 0.15s;
        }

        .animate-fade-up:nth-child(5) {
            animation-delay: 0.2s;
        }

        .animate-fade-up:nth-child(6) {
            animation-delay: 0.25s;
        }
    </style>
</body>
</html>