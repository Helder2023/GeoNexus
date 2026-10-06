<?php
// painel/admin/financeiro/faturas.php - Gestão de Faturas
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Faturas';
$pagina_atual = 'faturas';


// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE FATURAS =====
$faturas = [
    [
        'id' => 'FAT-2026-001',
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-1.png',
        'cliente_email' => 'carlos.mendes@email.com',
        'valor' => 25000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01 10:00:00',
        'vencimento' => '2026-02-15',
        'descricao' => 'Mensalidade - Plano Pro',
        'categoria' => 'Assinatura',
        'assinatura_id' => 1,
        'itens' => 1,
        'pagamento_ref' => 'PAY-001'
    ],
    [
        'id' => 'FAT-2026-002',
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_email' => 'financeiro@construtoraabc.ao',
        'valor' => 250000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01 09:00:00',
        'vencimento' => '2026-02-15',
        'descricao' => 'Mensalidade - Plano Enterprise',
        'categoria' => 'Assinatura',
        'assinatura_id' => 2,
        'itens' => 1,
        'pagamento_ref' => 'PAY-002'
    ],
    [
        'id' => 'FAT-2026-003',
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_email' => 'financas@itl.ao',
        'valor' => 125000,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'emissao' => '2026-02-05 14:30:00',
        'vencimento' => '2026-02-20',
        'descricao' => 'Trimestral - Plano Educação',
        'categoria' => 'Assinatura',
        'assinatura_id' => 4,
        'itens' => 1,
        'pagamento_ref' => null
    ],
    [
        'id' => 'FAT-2026-004',
        'cliente' => 'Ana Costa',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-2.png',
        'cliente_email' => 'ana.costa@email.com',
        'valor' => 15000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01 16:30:00',
        'vencimento' => '2026-02-15',
        'descricao' => 'Mensalidade - Plano Básico',
        'categoria' => 'Assinatura',
        'assinatura_id' => 3,
        'itens' => 1,
        'pagamento_ref' => 'PAY-004'
    ],
    [
        'id' => 'FAT-2026-005',
        'cliente' => 'Mineração Progresso',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-7.png',
        'cliente_email' => 'contabilidade@mineracaoprogresso.ao',
        'valor' => 150000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-03 11:20:00',
        'vencimento' => '2026-02-18',
        'descricao' => 'Mensalidade - Plano Business',
        'categoria' => 'Assinatura',
        'assinatura_id' => 5,
        'itens' => 1,
        'pagamento_ref' => 'PAY-005'
    ],
    [
        'id' => 'FAT-2026-006',
        'cliente' => 'Energia Futuro',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-8.png',
        'cliente_email' => 'financas@energiafuturo.ao',
        'valor' => 45000,
        'status' => 'vencida',
        'status_label' => 'Vencida',
        'emissao' => '2026-01-20 09:00:00',
        'vencimento' => '2026-02-03',
        'descricao' => 'Mensalidade - Plano Empresarial',
        'categoria' => 'Assinatura',
        'assinatura_id' => 6,
        'itens' => 1,
        'pagamento_ref' => null
    ],
    [
        'id' => 'FAT-2026-007',
        'cliente' => 'Pedro Santos',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-3.png',
        'cliente_email' => 'pedro.santos@email.com',
        'valor' => 45000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-02 15:00:00',
        'vencimento' => '2026-02-16',
        'descricao' => 'Mensalidade - Plano Premium',
        'categoria' => 'Assinatura',
        'assinatura_id' => 8,
        'itens' => 1,
        'pagamento_ref' => 'PAY-007'
    ],
    [
        'id' => 'FAT-2026-008',
        'cliente' => 'ONG Esperança',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-4.png',
        'cliente_email' => 'financas@ongesperanca.ao',
        'valor' => 100000,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'emissao' => '2026-02-06 08:30:00',
        'vencimento' => '2026-02-21',
        'descricao' => 'Trimestral - Plano ONG',
        'categoria' => 'Assinatura',
        'assinatura_id' => 9,
        'itens' => 1,
        'pagamento_ref' => null
    ],
    [
        'id' => 'FAT-2026-009',
        'cliente' => 'Construtora Silva',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-2.png',
        'cliente_email' => 'financeiro@construtorasilva.ao',
        'valor' => 75000,
        'status' => 'cancelada',
        'status_label' => 'Cancelada',
        'emissao' => '2026-01-15 10:00:00',
        'vencimento' => '2026-01-30',
        'descricao' => 'Mensalidade - Plano Startup',
        'categoria' => 'Assinatura',
        'assinatura_id' => 7,
        'itens' => 1,
        'pagamento_ref' => null
    ],
    [
        'id' => 'FAT-2026-010',
        'cliente' => 'Universidade Agostinho Neto',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-3.png',
        'cliente_email' => 'financas@uan.ao',
        'valor' => 200000,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'emissao' => '2026-02-07 09:15:00',
        'vencimento' => '2026-02-22',
        'descricao' => 'Trimestral - Plano Governo',
        'categoria' => 'Assinatura',
        'assinatura_id' => 6,
        'itens' => 1,
        'pagamento_ref' => null
    ],
];

// Estatísticas das faturas
$total_faturas = count($faturas);
$faturas_pagas = count(array_filter($faturas, function($f) { return $f['status'] === 'paga'; }));
$faturas_pendentes = count(array_filter($faturas, function($f) { return $f['status'] === 'pendente'; }));
$faturas_vencidas = count(array_filter($faturas, function($f) { return $f['status'] === 'vencida'; }));
$faturas_canceladas = count(array_filter($faturas, function($f) { return $f['status'] === 'cancelada'; }));
$valor_total_faturas = array_sum(array_column($faturas, 'valor'));
$valor_total_pagas = array_sum(array_column(array_filter($faturas, function($f) { return $f['status'] === 'paga'; }), 'valor'));
$valor_total_pendentes = array_sum(array_column(array_filter($faturas, function($f) { return $f['status'] === 'pendente'; }), 'valor'));

// Funções auxiliares
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y', strtotime($date));
}

function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i', strtotime($datetime));
}

function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

function getStatusIcon($status) {
    $icons = [
        'paga' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'vencida' => 'fa-exclamation-circle',
        'cancelada' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}

function getStatusColor($status) {
    $colors = [
        'paga' => '#00FFA3',
        'pendente' => '#FFD93D',
        'vencida' => '#FF6B6B',
        'cancelada' => '#6B7A8F'
    ];
    return $colors[$status] ?? '#6B7A8F';
}

function getTipoClienteIcon($tipo) {
    $icons = [
        'Individual' => 'fa-user',
        'Empresarial' => 'fa-building',
        'Institucional' => 'fa-university'
    ];
    return $icons[$tipo] ?? 'fa-user';
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
                        <i class="fas fa-file-invoice icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
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
                    <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <button class="btn btn-primary" onclick="abrirModal('modalNovaFatura')">
                            <i class="fas fa-plus"></i> Nova Fatura
                        </button>
                        <button class="btn btn-outline" onclick="window.location.reload()">
                            <i class="fas fa-sync-alt"></i> Atualizar
                        </button>
                        <button class="btn btn-outline" onclick="exportarFaturas()">
                            <i class="fas fa-file-export"></i> Exportar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid">
                <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                    <div class="icon blue"><i class="fas fa-list"></i></div>
                    <div class="value"><?php echo $total_faturas; ?></div>
                    <div class="label">Total de Faturas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 18.3%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                    <div class="icon green"><i class="fas fa-check-circle"></i></div>
                    <div class="value"><?php echo $faturas_pagas; ?></div>
                    <div class="label">Pagas</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 12.5%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                    <div class="icon yellow"><i class="fas fa-clock"></i></div>
                    <div class="value"><?php echo $faturas_pendentes; ?></div>
                    <div class="label">Pendentes</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 5.2%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                    <div class="icon red"><i class="fas fa-exclamation-circle"></i></div>
                    <div class="value"><?php echo $faturas_vencidas; ?></div>
                    <div class="label">Vencidas</div>
                    <div class="trend down"><i class="fas fa-arrow-down"></i> 2.1%</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                    <div class="icon yellow"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="value">Kz <?php echo formatMoney($valor_total_faturas); ?></div>
                    <div class="label">Valor Total</div>
                    <div class="trend up"><i class="fas fa-arrow-up"></i> 15.8%</div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filtros-container">
                <div class="filtros-grid">
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-search"></i> Buscar</label>
                        <input type="text" class="form-control" id="searchFatura" placeholder="Cliente, ID ou descrição..." onkeyup="filtrarFaturas()">
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-tag"></i> Status</label>
                        <select class="form-control" id="filtroStatus" onchange="filtrarFaturas()">
                            <option value="todos">Todos os status</option>
                            <option value="paga">Paga</option>
                            <option value="pendente">Pendente</option>
                            <option value="vencida">Vencida</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-user"></i> Tipo</label>
                        <select class="form-control" id="filtroTipo" onchange="filtrarFaturas()">
                            <option value="todos">Todos os tipos</option>
                            <option value="Individual">Individual</option>
                            <option value="Empresarial">Empresarial</option>
                            <option value="Institucional">Institucional</option>
                        </select>
                    </div>
                    <div class="filtro-group filtro-actions">
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-times"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount"><?php echo $total_faturas; ?> resultados</span>
                    </div>
                </div>
            </div>

            <!-- ===== TABELA DE FATURAS ===== -->
            <div class="faturas-container">
                <div class="section-header">
                    <h3><i class="fas fa-file-invoice"></i> Lista de Faturas</h3>
                    <div class="section-actions">
                        <span class="faturas-total">Total: <strong>Kz <?php echo formatMoney($valor_total_faturas); ?></strong></span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-faturas" id="tabelaFaturas">
                        <thead>
                            <tr>
                                <th>Fatura</th>
                                <th>Cliente</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Emissão</th>
                                <th>Vencimento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="faturasBody">
                            <?php foreach ($faturas as $fatura): ?>
                                <tr data-status="<?php echo $fatura['status']; ?>"
                                    data-tipo="<?php echo $fatura['cliente_tipo']; ?>"
                                    data-cliente="<?php echo strtolower($fatura['cliente']); ?>"
                                    data-id="<?php echo strtolower($fatura['id']); ?>"
                                    data-descricao="<?php echo strtolower($fatura['descricao']); ?>"
                                    data-vencimento="<?php echo date('Y-m-d', strtotime($fatura['vencimento'])); ?>">
                                    <td>
                                        <span class="fatura-id" style="font-family: 'Orbitron', sans-serif; color: #FFD93D; font-weight: 600; font-size: 13px;">
                                            <?php echo $fatura['id']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="cliente-cell">
                                            <img src="../../../assets/images/<?php echo $fatura['cliente_avatar']; ?>"
                                                alt="<?php echo $fatura['cliente']; ?>"
                                                onerror="this.src='<?php echo getAvatarUrl($fatura['cliente']); ?>'">
                                            <div class="cliente-info">
                                                <span class="cliente-nome"><?php echo $fatura['cliente']; ?></span>
                                                <span class="cliente-tipo">
                                                    <i class="fas <?php echo getTipoClienteIcon($fatura['cliente_tipo']); ?>"></i>
                                                    <?php echo $fatura['cliente_tipo']; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="descricao-cell">
                                            <span class="descricao-texto"><?php echo $fatura['descricao']; ?></span>
                                            <span class="descricao-categoria"><?php echo $fatura['categoria']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="valor">Kz <?php echo formatMoney($fatura['valor']); ?></span>
                                    </td>
                                    <td>
                                        <span class="badge-status status-<?php echo $fatura['status']; ?>">
                                            <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                                            <?php echo $fatura['status_label']; ?>
                                        </span>
                                    </td>
                                    <td><?php echo formatDate($fatura['emissao']); ?></td>
                                    <td>
                                        <span class="vencimento <?php echo ($fatura['status'] === 'vencida') ? 'vencida' : ''; ?>">
                                            <?php echo formatDate($fatura['vencimento']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="fatura-detalhe.php?id=<?php echo $fatura['id']; ?>" class="btn" title="Ver Detalhes">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="fatura-editar.php?id=<?php echo $fatura['id']; ?>" class="btn" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn" title="Baixar PDF" onclick="baixarPDF('<?php echo $fatura['id']; ?>')">
                                                <i class="fas fa-file-pdf"></i>
                                            </button>
                                            <?php if ($fatura['status'] === 'pendente' || $fatura['status'] === 'vencida'): ?>
                                                <button class="btn btn-success" title="Marcar como Paga" onclick="marcarComoPaga('<?php echo $fatura['id']; ?>')">
                                                    <i class="fas fa-check"></i>
                                                </button>
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
                        Mostrando <strong id="paginacaoInicio">1</strong> - <strong id="paginacaoFim"><?php echo min(10, $total_faturas); ?></strong> de <strong id="paginacaoTotal"><?php echo $total_faturas; ?></strong> faturas
                    </div>
                    <div class="paginacao-controles" id="paginacaoControles">
                        <button class="btn" id="paginaAnterior" onclick="mudarPagina(-1)" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="pagina-atual" id="paginaAtual">1 / <?php echo ceil($total_faturas / 10); ?></span>
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
    <!-- MODAL NOVA FATURA                         -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovaFatura">
        <div class="modal-overlay" onclick="fecharModal('modalNovaFatura')"></div>
        <div class="modal-content" style="max-width: 550px;">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fas fa-plus-circle"></i> Nova Fatura</h3>
                <button class="modal-close" onclick="fecharModal('modalNovaFatura')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovaFatura" onsubmit="criarFatura(event)">
                    <div class="form-group">
                        <label class="form-label">Cliente <span class="required">*</span></label>
                        <select class="form-control" id="clienteFatura" required>
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
                    <div class="form-group">
                        <label class="form-label">Descrição <span class="required">*</span></label>
                        <input type="text" class="form-control" id="descricaoFatura" placeholder="Descrição da fatura" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Valor <span class="required">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Kz</span>
                                <input type="number" class="form-control" id="valorFatura" placeholder="0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <select class="form-control" id="categoriaFatura">
                                <option value="Assinatura">Assinatura</option>
                                <option value="Serviço">Serviço</option>
                                <option value="Produto">Produto</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Data de Emissão</label>
                            <input type="date" class="form-control" id="emissaoFatura">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Data de Vencimento</label>
                            <input type="date" class="form-control" id="vencimentoFatura">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" id="statusFatura">
                            <option value="pendente">Pendente</option>
                            <option value="paga">Paga</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalNovaFatura')">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('formNovaFatura').submit()">
                    <i class="fas fa-save"></i> Criar Fatura
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
        // INICIALIZAR DATAS
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            const hoje = new Date();
            const dataFormatada = hoje.toISOString().split('T')[0];
            document.getElementById('emissaoFatura').value = dataFormatada;
            
            // Vencimento: 15 dias após emissão
            const vencimento = new Date(hoje);
            vencimento.setDate(vencimento.getDate() + 15);
            const vencimentoFormatado = vencimento.toISOString().split('T')[0];
            document.getElementById('vencimentoFatura').value = vencimentoFormatado;
        });

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
        // FILTRAR FATURAS
        // ==========================================
        function filtrarFaturas() {
            const search = document.getElementById('searchFatura').value.toLowerCase();
            const status = document.getElementById('filtroStatus').value;
            const tipo = document.getElementById('filtroTipo').value;

            const rows = document.querySelectorAll('#faturasBody tr');
            let visiveis = 0;

            rows.forEach(row => {
                const cliente = row.dataset.cliente || '';
                const id = row.dataset.id || '';
                const descricao = row.dataset.descricao || '';
                const rowStatus = row.dataset.status || '';
                const rowTipo = row.dataset.tipo || '';

                let mostrar = true;

                if (search) {
                    const match = cliente.includes(search) || id.includes(search) || descricao.includes(search);
                    if (!match) mostrar = false;
                }

                if (status !== 'todos' && rowStatus !== status) mostrar = false;
                if (tipo !== 'todos' && rowTipo !== tipo) mostrar = false;

                row.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            document.getElementById('resultadosCount').textContent = visiveis + ' resultados';
            paginaAtual = 1;
            atualizarPaginacao();
        }

        function limparFiltros() {
            document.getElementById('searchFatura').value = '';
            document.getElementById('filtroStatus').value = 'todos';
            document.getElementById('filtroTipo').value = 'todos';
            filtrarFaturas();
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
            const rows = document.querySelectorAll('#faturasBody tr');
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
            const total = document.querySelectorAll('#faturasBody tr:not([style*="display: none"])').length;
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
        function exportarFaturas() {
            mostrarToast('A exportar faturas...', 'info');
            setTimeout(() => {
                mostrarToast('Faturas exportadas com sucesso!', 'success');
            }, 1500);
        }

        // ==========================================
        // AÇÕES DA FATURA
        // ==========================================
        function baixarPDF(id) {
            mostrarToast('A baixar fatura ' + id + '...', 'info');
            setTimeout(() => {
                mostrarToast('Fatura ' + id + ' baixada com sucesso!', 'success');
            }, 1500);
        }

        function marcarComoPaga(id) {
            if (confirm('Tem certeza que deseja marcar a fatura ' + id + ' como paga?')) {
                mostrarToast('Fatura ' + id + ' marcada como paga!', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1500);
            }
        }

        // ==========================================
        // CRIAR FATURA
        // ==========================================
        function criarFatura(event) {
            event.preventDefault();

            const cliente = document.getElementById('clienteFatura').value;
            const descricao = document.getElementById('descricaoFatura').value;
            const valor = document.getElementById('valorFatura').value;

            if (!cliente || !descricao || !valor) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast('Fatura criada com sucesso!', 'success');
            fecharModal('modalNovaFatura');
            document.getElementById('formNovaFatura').reset();

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
        /* FATURAS - CSS COMPLETO                     */
        /* ========================================== */

        /* ===== CONTAINER ===== */
        .faturas-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .faturas-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== SECTION HEADER ===== */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .section-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .section-header h3 i {
            color: #FFD93D;
        }

        .section-actions {
            display: flex;
            gap: var(--space-sm);
            align-items: center;
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
            grid-template-columns: 2fr 1fr 1fr auto;
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

        .table-faturas {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 900px;
        }

        .table-faturas thead {
            background: var(--bg-input);
        }

        .table-faturas thead th {
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

        .table-faturas tbody td {
            padding: 8px 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-faturas tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-faturas tbody tr:last-child td {
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

        .cliente-tipo i {
            margin-right: 2px;
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

        .descricao-categoria {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== VALORES ===== */
        .valor {
            font-weight: 600;
            color: #FFD93D;
        }

        /* ===== VENCIMENTO ===== */
        .vencimento.vencida {
            color: #FF6B6B;
            font-weight: 600;
        }

        /* ===== FATURA ID ===== */
        .fatura-id {
            font-family: 'Orbitron', sans-serif;
            color: #FFD93D;
            font-weight: 600;
            font-size: 13px;
        }

        /* ===== BADGES ===== */
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

        .badge-status.status-paga {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-vencida {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-status.status-cancelada {
            background: rgba(107, 122, 143, 0.12);
            color: #6B7A8F;
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

        .action-buttons .btn-success {
            border-color: rgba(0, 255, 163, 0.3);
            color: #00FFA3;
        }

        .action-buttons .btn-success:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.1);
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

        /* ===== FATURAS TOTAL ===== */
        .faturas-total {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .faturas-total strong {
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
            z-index: 99999;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
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
            max-width: 550px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.6);
            border: 1px solid var(--border-color);
            z-index: 10;
            animation: modalSlideUp 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes modalSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
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
            padding: 20px 24px 16px 24px;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            background: var(--bg-card);
            z-index: 2;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        }

        .modal-header .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-header .modal-title i {
            font-size: 22px;
            color: #FFD93D;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.6rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px 10px;
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
            padding: 16px 24px 20px 24px;
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
            padding: 10px 20px;
            font-weight: 600;
        }

        .modal-footer .btn-outline {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--text-secondary);
        }

        .modal-footer .btn-outline:hover {
            border-color: var(--text-primary);
            color: var(--text-primary);
            background: var(--bg-card-hover);
        }

        .modal-footer .btn-primary {
            background: var(--gradient-aurora);
            color: #fff;
            border: 2px solid transparent;
        }

        .modal-footer .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(108, 43, 217, 0.3);
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
            -webkit-appearance: none;
            -moz-appearance: none;
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

        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group .input-group-text {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
            padding: 8px 12px;
            font-size: var(--text-sm);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .input-group .form-control {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
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
            .table-faturas {
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

            .table-faturas {
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

            .faturas-container {
                padding: var(--space-sm);
            }

            .filtros-container {
                padding: var(--space-sm);
            }

            .modal-header {
                padding: 16px 18px 12px 18px;
            }

            .modal-body {
                padding: 18px;
            }

            .modal-footer {
                flex-direction: column;
                padding: 12px 18px 16px 18px;
            }

            .modal-footer .btn {
                width: 100%;
                min-width: auto;
                padding: 12px;
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

            .modal-content {
                width: 98%;
                max-width: 380px;
            }

            .modal-header {
                padding: 14px 16px 10px 16px;
            }

            .modal-header .modal-title {
                font-size: var(--text-h4);
                gap: 8px;
            }

            .modal-header .modal-title i {
                font-size: 18px;
            }

            .modal-close {
                font-size: 1.3rem;
                padding: 4px 8px;
            }

            .modal-body {
                padding: 14px 16px;
            }

            .modal-footer {
                padding: 10px 16px 14px 16px;
            }

            .modal-footer .btn {
                padding: 10px;
                font-size: var(--text-sm);
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

            .table-faturas tbody td {
                padding: 6px 8px;
                font-size: var(--text-xs);
            }

            .table-faturas thead th {
                padding: 8px 8px;
                font-size: 9px;
            }

            .faturas-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
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