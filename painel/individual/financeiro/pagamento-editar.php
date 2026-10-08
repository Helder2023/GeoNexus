<?php
// painel/individual/financeiro/pagamento-editar.php - Editar Pagamento
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Editar Pagamento';
$pagina_atual = 'pagamento-editar';

// ============================================
// OBTER ID DO PAGAMENTO
// ============================================
$id_pagamento = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// DADOS MOCKADOS - PAGAMENTO ATUAL
// ============================================
$pagamento = [
    'id' => $id_pagamento,
    'codigo' => 'PAG-2026-0001',
    'cliente_id' => 1,
    'cliente' => 'Construtora ABC',
    'cliente_avatar' => 'empresa-1.png',
    'cliente_tipo' => 'Empresa',
    'cliente_email' => 'financeiro@construtoraabc.ao',
    'cliente_telefone' => '+244 222 345 678',
    'cliente_nif' => '5417896321',
    'descricao' => 'Pagamento Parcial - Projeto Zona Norte',
    'observacoes' => 'Pagamento referente à primeira fase do projeto de levantamento topográfico. Cliente com bom histórico de pagamentos.',
    'valor' => 175000,
    'valor_total' => 350000,
    'metodo' => 'Transferência Bancária',
    'metodo_icon' => 'fa-university',
    'referencia' => 'TRF-2026-0045',
    'status' => 'pago',
    'status_label' => 'Pago',
    'data_criacao' => '2026-02-15 10:30:00',
    'data_vencimento' => '2026-02-20',
    'data_pagamento' => '2026-02-18 14:20:00',
    'comprovativo' => [
        'nome' => 'comprovativo-001.pdf',
        'tamanho' => '2.4 MB',
        'tipo' => 'pdf'
    ],
    'projeto_id' => 1,
    'fatura_id' => 1,
    'tipo' => 'recebimento',
    'criado_por' => 'Carlos Mendes'
];

// ============================================
// LISTA DE CLIENTES PARA O SELECT
// ============================================
$clientes = [
    ['id' => 1, 'nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'email' => 'contato@construtoraabc.ao', 'telefone' => '+244 222 345 678'],
    ['id' => 2, 'nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'email' => 'contato@industrialuanda.ao', 'telefone' => '+244 222 456 789'],
    ['id' => 3, 'nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'email' => 'geral@luanda.gov.ao', 'telefone' => '+244 222 567 890'],
    ['id' => 4, 'nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'email' => 'info@agronegocios.ao', 'telefone' => '+244 222 678 901'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'email' => 'contato@mineracaoprogresso.ao', 'telefone' => '+244 222 789 012'],
    ['id' => 6, 'nome' => 'Energia Futuro', 'tipo' => 'Empresa', 'email' => 'financas@energiafuturo.ao', 'telefone' => '+244 222 678 901'],
];

// ============================================
// LISTA DE PROJETOS PARA O SELECT
// ============================================
$projetos = [
    ['id' => 1, 'nome' => 'Levantamento Topográfico - Zona Norte', 'codigo' => 'PRJ-2026-0001'],
    ['id' => 2, 'nome' => 'Mapeamento GIS - Área Industrial', 'codigo' => 'PRJ-2026-0002'],
    ['id' => 3, 'nome' => 'Levantamento Planialtimétrico', 'codigo' => 'PRJ-2026-0003'],
    ['id' => 4, 'nome' => 'Cadastro Rural - Fazenda Sunflower', 'codigo' => 'PRJ-2026-0004'],
];

// ============================================
// LISTA DE FATURAS PARA O SELECT
// ============================================
$faturas = [
    ['id' => 1, 'numero' => 'FT-2026-0156', 'valor' => 480000],
    ['id' => 2, 'numero' => 'FT-2026-0150', 'valor' => 320000],
    ['id' => 3, 'numero' => 'FT-2026-0158', 'valor' => 195000],
];

// ============================================
// MÉTODOS DE PAGAMENTO
// ============================================
$metodos = [
    ['id' => 'Transferência Bancária', 'icon' => 'fa-university'],
    ['id' => 'Multicaixa', 'icon' => 'fa-credit-card'],
    ['id' => 'Depósito Bancário', 'icon' => 'fa-money-check-alt'],
    ['id' => 'Numerário', 'icon' => 'fa-money-bill-wave'],
    ['id' => 'Cartão de Crédito', 'icon' => 'fa-credit-card'],
    ['id' => 'PayPal', 'icon' => 'fa-paypal'],
    ['id' => 'Cheque', 'icon' => 'fa-money-check'],
];

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
                        <i class="fas fa-edit icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status <?php echo getStatusClass($pagamento['status']); ?>" style="font-size: 14px; padding: 6px 16px;">
                            <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                            <?php echo $pagamento['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="pagamentos.php">Pagamentos</a>
                        <span class="separator">/</span>
                        <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>"><?php echo $pagamento['codigo']; ?></a>
                        <span class="separator">/</span>
                        <span>Editar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <button type="submit" form="formEditarPagamento" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Alterações
                    </button>
                    <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formEditarPagamento" onsubmit="salvarEdicao(event)">
                <input type="hidden" id="pagamentoId" value="<?php echo $pagamento['id']; ?>">

                <!-- ========================================== -->
                <!-- ETAPA 1: INFORMAÇÕES BÁSICAS              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-info-circle"></i> Informações Básicas</h3>
                            <p>Dados gerais do pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Código do Pagamento</label>
                                <input type="text" class="form-control" id="codigoPagamento" 
                                       value="<?php echo $pagamento['codigo']; ?>" readonly>
                                <span class="form-help">Código não editável</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Referência</label>
                                <input type="text" class="form-control" id="referenciaPagamento" 
                                       value="<?php echo htmlspecialchars($pagamento['referencia']); ?>"
                                       placeholder="Ex: TRF-2026-0045" maxlength="50">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição do Pagamento <span class="required">*</span></label>
                            <input type="text" class="form-control" id="descricaoPagamento" 
                                   value="<?php echo htmlspecialchars($pagamento['descricao']); ?>"
                                   placeholder="Ex: Pagamento Parcial - Projeto Zona Norte" required
                                   maxlength="200">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoesPagamento" rows="3" 
                                      placeholder="Notas adicionais sobre o pagamento"
                                      maxlength="500"><?php echo htmlspecialchars($pagamento['observacoes']); ?></textarea>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 2: TIPO E STATUS                     -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="form-section-header">
                        <div class="section-number">2</div>
                        <div class="section-title">
                            <h3><i class="fas fa-exchange-alt"></i> Tipo e Status</h3>
                            <p>Configure o tipo e o estado do pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Tipo de Movimento <span class="required">*</span></label>
                                <select class="form-control" id="tipoPagamento" required onchange="atualizarTipoLabel()">
                                    <option value="recebimento" <?php echo $pagamento['tipo'] === 'recebimento' ? 'selected' : ''; ?>>
                                        ↓ Recebimento (Entrada)
                                    </option>
                                    <option value="pagamento" <?php echo $pagamento['tipo'] === 'pagamento' ? 'selected' : ''; ?>>
                                        ↑ Pagamento (Saída)
                                    </option>
                                </select>
                                <span class="form-help">Recebimento = cliente paga; Pagamento = você paga a fornecedor</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status <span class="required">*</span></label>
                                <select class="form-control" id="statusPagamento" required>
                                    <option value="pendente" <?php echo $pagamento['status'] === 'pendente' ? 'selected' : ''; ?>>Pendente</option>
                                    <option value="pago" <?php echo $pagamento['status'] === 'pago' ? 'selected' : ''; ?>>Pago</option>
                                    <option value="falhou" <?php echo $pagamento['status'] === 'falhou' ? 'selected' : ''; ?>>Falhou</option>
                                    <option value="cancelado" <?php echo $pagamento['status'] === 'cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Método de Pagamento <span class="required">*</span></label>
                            <div class="metodos-grid">
                                <?php foreach ($metodos as $metodo): ?>
                                    <div class="metodo-card <?php echo $pagamento['metodo'] === $metodo['id'] ? 'selected' : ''; ?>"
                                         data-metodo="<?php echo $metodo['id']; ?>"
                                         onclick="selecionarMetodo('<?php echo $metodo['id']; ?>')">
                                        <i class="fas <?php echo $metodo['icon']; ?>"></i>
                                        <span><?php echo $metodo['id']; ?></span>
                                        <div class="metodo-check">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <input type="hidden" id="metodoSelecionado" required value="<?php echo $pagamento['metodo']; ?>">
                            <span class="form-error" id="errorMetodo" style="display: none;">
                                <i class="fas fa-exclamation-circle"></i> Selecione um método
                            </span>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 3: CLIENTE E VÍNCULOS                -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="form-section-header">
                        <div class="section-number">3</div>
                        <div class="section-title">
                            <h3><i class="fas fa-user-tie"></i> Cliente e Vínculos</h3>
                            <p>Altere o cliente, projeto ou fatura associados</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">Cliente <span class="required">*</span></label>
                            <select class="form-control" id="clientePagamento" required onchange="atualizarClientePreview()">
                                <option value="">-- Selecione um cliente --</option>
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente['id']; ?>"
                                            data-nome="<?php echo $cliente['nome']; ?>"
                                            data-tipo="<?php echo $cliente['tipo']; ?>"
                                            data-email="<?php echo $cliente['email']; ?>"
                                            data-telefone="<?php echo $cliente['telefone']; ?>"
                                            <?php echo $cliente['id'] == $pagamento['cliente_id'] ? 'selected' : ''; ?>>
                                        <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Preview do Cliente Selecionado -->
                        <div class="cliente-preview" id="clientePreview">
                            <div class="cliente-preview-avatar">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="cliente-preview-info">
                                <h4 id="previewNome"><?php echo $pagamento['cliente']; ?></h4>
                                <div class="cliente-preview-meta">
                                    <span><i class="fas fa-envelope"></i> <span id="previewEmail"><?php echo $pagamento['cliente_email']; ?></span></span>
                                    <span><i class="fas fa-phone"></i> <span id="previewTelefone"><?php echo $pagamento['cliente_telefone']; ?></span></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Projeto Associado</label>
                                <select class="form-control" id="projetoPagamento">
                                    <option value="">-- Sem projeto associado --</option>
                                    <?php foreach ($projetos as $projeto): ?>
                                        <option value="<?php echo $projeto['id']; ?>"
                                                <?php echo $projeto['id'] == $pagamento['projeto_id'] ? 'selected' : ''; ?>>
                                            <?php echo $projeto['codigo']; ?> - <?php echo $projeto['nome']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Fatura Associada</label>
                                <select class="form-control" id="faturaPagamento">
                                    <option value="">-- Sem fatura associada --</option>
                                    <?php foreach ($faturas as $fatura): ?>
                                        <option value="<?php echo $fatura['id']; ?>"
                                                <?php echo $fatura['id'] == $pagamento['fatura_id'] ? 'selected' : ''; ?>>
                                            <?php echo $fatura['numero']; ?> (Kz <?php echo formatMoney($fatura['valor']); ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: VALORES E DATAS                   -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-coins"></i> Valores e Datas</h3>
                            <p>Configure os valores e datas do pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Valor do Pagamento <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="valorPagamento" 
                                           value="<?php echo $pagamento['valor']; ?>"
                                           placeholder="0" min="0" step="1000" required
                                           oninput="calcularPercentual()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Valor Total do Projeto</label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="valorTotal" 
                                           value="<?php echo $pagamento['valor_total']; ?>"
                                           placeholder="0" min="0" step="1000"
                                           oninput="calcularPercentual()">
                                </div>
                            </div>
                        </div>

                        <!-- Progresso do Pagamento -->
                        <div class="progresso-pagamento-preview" id="progressoPreview">
                            <div class="progresso-header">
                                <span class="progresso-label">Progresso do Pagamento</span>
                                <span class="progresso-percent" id="progressoPercent"><?php echo round(($pagamento['valor'] / $pagamento['valor_total']) * 100); ?>%</span>
                            </div>
                            <div class="progresso-barra">
                                <div class="progresso-fill" id="progressoFill" style="width: <?php echo round(($pagamento['valor'] / $pagamento['valor_total']) * 100); ?>%;"></div>
                            </div>
                            <div class="progresso-info">
                                <span>Pago: <strong id="valorPago">Kz <?php echo formatMoney($pagamento['valor']); ?></strong></span>
                                <span>Restante: <strong id="valorRestante">Kz <?php echo formatMoney($pagamento['valor_total'] - $pagamento['valor']); ?></strong></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Data de Vencimento <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataVencimento" 
                                       value="<?php echo $pagamento['data_vencimento']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data de Pagamento</label>
                                <input type="datetime-local" class="form-control" id="dataPagamento" 
                                       value="<?php echo $pagamento['data_pagamento'] ? date('Y-m-d\TH:i', strtotime($pagamento['data_pagamento'])) : ''; ?>">
                                <span class="form-help">Preencha se o pagamento já foi efetuado</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 5: COMPROVATIVO                      -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-paperclip"></i> Comprovativo</h3>
                            <p>Altere ou remova o comprovativo do pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <?php if ($pagamento['comprovativo']): ?>
                            <!-- Comprovativo Existente -->
                            <div class="form-group">
                                <label class="form-label">Comprovativo Atual</label>
                                <div class="comprovativo-existente" id="comprovativoExistente">
                                    <div class="comprovativo-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="comprovativo-info">
                                        <span class="comprovativo-nome"><?php echo $pagamento['comprovativo']['nome']; ?></span>
                                        <span class="comprovativo-tamanho"><?php echo $pagamento['comprovativo']['tamanho']; ?></span>
                                    </div>
                                    <div class="comprovativo-acoes">
                                        <button type="button" class="btn btn-sm btn-outline" onclick="visualizarComprovativoAtual()">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removerComprovativoAtual()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="form-label"><?php echo $pagamento['comprovativo'] ? 'Substituir por Novo Comprovativo' : 'Adicionar Comprovativo'; ?></label>
                            <div class="upload-area" onclick="document.getElementById('comprovativoInput').click()">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Clique para carregar um comprovativo</span>
                                <small>PDF, JPG, PNG até 10MB</small>
                                <input type="file" id="comprovativoInput" accept=".pdf,.jpg,.jpeg,.png" 
                                       style="display: none;" onchange="previewComprovativo(event)">
                            </div>
                            <div class="comprovativo-preview" id="comprovativoPreview" style="display: none;">
                                <div class="comprovativo-icon" id="comprovativoIconPreview">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div class="comprovativo-info">
                                    <span class="comprovativo-nome" id="comprovativoNomePreview">-</span>
                                    <span class="comprovativo-tamanho" id="comprovativoTamanhoPreview">-</span>
                                </div>
                                <button type="button" class="btn btn-sm btn-danger" onclick="removerNovoComprovativo()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- HISTÓRICO DE ALTERAÇÕES                    -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.45s;">
                    <div class="form-section-header">
                        <div class="section-number">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="section-title">
                            <h3><i class="fas fa-clock"></i> Histórico de Alterações</h3>
                            <p>Últimas modificações deste pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="historico-list">
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Pagamento registado</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> Carlos Mendes</span>
                                        <span><i class="far fa-clock"></i> <?php echo formatDate($pagamento['data_criacao']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Pagamento confirmado</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> Construtora ABC</span>
                                        <span><i class="far fa-clock"></i> <?php echo formatDateTime($pagamento['data_pagamento']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.5s;">
                    <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="restaurarValoresOriginais()">
                        <i class="fas fa-undo"></i> Restaurar
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Guardar Alterações
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO                       -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i>
                    Confirmar Ação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="modalConfirmacaoBody">
                <p>Tem certeza que deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-primary" id="modalConfirmacaoBtn">
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
        // DADOS ORIGINAIS
        // ============================================
        const dadosOriginais = {
            referencia: <?php echo json_encode($pagamento['referencia']); ?>,
            descricao: <?php echo json_encode($pagamento['descricao']); ?>,
            observacoes: <?php echo json_encode($pagamento['observacoes']); ?>,
            tipo: <?php echo json_encode($pagamento['tipo']); ?>,
            status: <?php echo json_encode($pagamento['status']); ?>,
            metodo: <?php echo json_encode($pagamento['metodo']); ?>,
            clienteId: <?php echo json_encode($pagamento['cliente_id']); ?>,
            projetoId: <?php echo json_encode($pagamento['projeto_id']); ?>,
            faturaId: <?php echo json_encode($pagamento['fatura_id']); ?>,
            valor: <?php echo json_encode($pagamento['valor']); ?>,
            valorTotal: <?php echo json_encode($pagamento['valor_total']); ?>,
            dataVencimento: <?php echo json_encode($pagamento['data_vencimento']); ?>,
            dataPagamento: <?php echo json_encode($pagamento['data_pagamento']); ?>
        };

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
        // SELECIONAR MÉTODO
        // ============================================
        function selecionarMetodo(metodo) {
            document.querySelectorAll('.metodo-card').forEach(card => {
                card.classList.remove('selected');
            });

            const card = document.querySelector(`.metodo-card[data-metodo="${metodo}"]`);
            if (card) {
                card.classList.add('selected');
                document.getElementById('metodoSelecionado').value = metodo;
                document.getElementById('errorMetodo').style.display = 'none';
            }
        }

        // ============================================
        // ATUALIZAR CLIENTE PREVIEW
        // ============================================
        function atualizarClientePreview() {
            const select = document.getElementById('clientePagamento');
            const option = select.options[select.selectedIndex];
            const preview = document.getElementById('clientePreview');

            if (!select.value) {
                preview.style.display = 'none';
                return;
            }

            document.getElementById('previewNome').textContent = option.dataset.nome || '-';
            document.getElementById('previewEmail').textContent = option.dataset.email || '-';
            document.getElementById('previewTelefone').textContent = option.dataset.telefone || '-';

            preview.style.display = 'flex';
        }

        // ============================================
        // CALCULAR PERCENTUAL
        // ============================================
        function calcularPercentual() {
            const valor = parseFloat(document.getElementById('valorPagamento').value) || 0;
            const valorTotal = parseFloat(document.getElementById('valorTotal').value) || 0;

            if (valorTotal > 0) {
                const percentual = Math.min(100, Math.round((valor / valorTotal) * 100));
                const restante = Math.max(0, valorTotal - valor);

                document.getElementById('progressoPercent').textContent = percentual + '%';
                document.getElementById('progressoFill').style.width = percentual + '%';
                document.getElementById('valorPago').textContent = 'Kz ' + valor.toLocaleString('pt-AO').replace(/,/g, '.');
                document.getElementById('valorRestante').textContent = 'Kz ' + restante.toLocaleString('pt-AO').replace(/,/g, '.');
            }
        }

        // ============================================
        // COMPROVATIVO
        // ============================================
        function previewComprovativo(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (file.size > 10 * 1024 * 1024) {
                mostrarToast('O ficheiro deve ter no máximo 10MB', 'error');
                return;
            }

            const icon = getFileIcon(file.name);
            const preview = document.getElementById('comprovativoPreview');
            const iconPreview = document.getElementById('comprovativoIconPreview');

            iconPreview.innerHTML = `<i class="fas ${icon.icon}" style="color: ${icon.color};"></i>`;
            document.getElementById('comprovativoNomePreview').textContent = file.name;
            document.getElementById('comprovativoTamanhoPreview').textContent = formatFileSize(file.size);
            preview.style.display = 'flex';

            mostrarToast('Comprovativo carregado!', 'success');
        }

        function removerNovoComprovativo() {
            document.getElementById('comprovativoPreview').style.display = 'none';
            document.getElementById('comprovativoInput').value = '';
            mostrarToast('Comprovativo removido', 'info');
        }

        function visualizarComprovativoAtual() {
            mostrarToast('A abrir comprovativo atual...', 'info');
        }

        function removerComprovativoAtual() {
            mostrarConfirmacao(
                'Remover Comprovativo',
                'Tem certeza que deseja remover o comprovativo atual? Esta ação só será aplicada depois de guardar.',
                () => {
                    const comp = document.getElementById('comprovativoExistente');
                    if (comp) {
                        comp.style.opacity = '0.4';
                        comp.style.textDecoration = 'line-through';
                        comp.dataset.removido = 'true';
                    }
                    mostrarToast('Comprovativo marcado para remoção', 'warning');
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function getFileIcon(filename) {
            const ext = filename.split('.').pop().toLowerCase();
            const icons = {
                pdf: { icon: 'fa-file-pdf', color: '#FF6B6B' },
                jpg: { icon: 'fa-file-image', color: '#FF9F43' },
                jpeg: { icon: 'fa-file-image', color: '#FF9F43' },
                png: { icon: 'fa-file-image', color: '#FF9F43' }
            };
            return icons[ext] || { icon: 'fa-file', color: '#6B7A8F' };
        }

        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }

        // ============================================
        // RESTAURAR VALORES ORIGINAIS
        // ============================================
        function restaurarValoresOriginais() {
            mostrarConfirmacao(
                'Restaurar Valores',
                'Tem certeza que deseja restaurar todos os valores originais? As alterações não guardadas serão perdidas.',
                () => {
                    document.getElementById('referenciaPagamento').value = dadosOriginais.referencia;
                    document.getElementById('descricaoPagamento').value = dadosOriginais.descricao;
                    document.getElementById('observacoesPagamento').value = dadosOriginais.observacoes;
                    document.getElementById('tipoPagamento').value = dadosOriginais.tipo;
                    document.getElementById('statusPagamento').value = dadosOriginais.status;
                    document.getElementById('clientePagamento').value = dadosOriginais.clienteId;
                    document.getElementById('projetoPagamento').value = dadosOriginais.projetoId || '';
                    document.getElementById('faturaPagamento').value = dadosOriginais.faturaId || '';
                    document.getElementById('valorPagamento').value = dadosOriginais.valor;
                    document.getElementById('valorTotal').value = dadosOriginais.valorTotal;
                    document.getElementById('dataVencimento').value = dadosOriginais.dataVencimento;
                    document.getElementById('dataPagamento').value = dadosOriginais.dataPagamento ? dadosOriginais.dataPagamento.replace(' ', 'T').substring(0, 16) : '';

                    selecionarMetodo(dadosOriginais.metodo);
                    atualizarClientePreview();
                    calcularPercentual();

                    mostrarToast('Valores restaurados!', 'info');
                    fecharModal('modalConfirmacao');
                }
            );
        }

        // ============================================
        // SALVAR EDIÇÃO
        // ============================================
        function salvarEdicao(event) {
            event.preventDefault();

            const id = document.getElementById('pagamentoId').value;
            const descricao = document.getElementById('descricaoPagamento').value.trim();
            const metodo = document.getElementById('metodoSelecionado').value;
            const clienteId = document.getElementById('clientePagamento').value;
            const valor = parseFloat(document.getElementById('valorPagamento').value);
            const dataVencimento = document.getElementById('dataVencimento').value;

            if (!descricao) {
                mostrarToast('Insira a descrição do pagamento!', 'error');
                document.getElementById('descricaoPagamento').focus();
                return;
            }

            if (!metodo) {
                document.getElementById('errorMetodo').style.display = 'flex';
                mostrarToast('Selecione um método de pagamento!', 'error');
                document.querySelector('.metodos-grid').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            if (!clienteId) {
                mostrarToast('Selecione um cliente!', 'error');
                document.getElementById('clientePagamento').focus();
                return;
            }

            if (!valor || valor <= 0) {
                mostrarToast('Insira um valor válido!', 'error');
                document.getElementById('valorPagamento').focus();
                return;
            }

            if (!dataVencimento) {
                mostrarToast('Insira a data de vencimento!', 'error');
                document.getElementById('dataVencimento').focus();
                return;
            }

            mostrarToast('Alterações guardadas com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'pagamento-detalhe.php?id=' + id;
            }, 1500);
        }

        // ============================================
        // MODAL DE CONFIRMAÇÃO
        // ============================================
        let callbackConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            document.getElementById('modalConfirmacaoBody').innerHTML = `
                <div class="modal-alerta">
                    <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i>
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

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModal('modalConfirmacao');
            }
        });

        // ============================================
        // IMPEDIR SAÍDA ACIDENTAL
        // ============================================
        let formularioAlterado = false;

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formEditarPagamento');
            if (form) {
                form.querySelectorAll('input, textarea, select').forEach(el => {
                    el.addEventListener('input', () => {
                        if (!el.readOnly && el.type !== 'hidden') {
                            formularioAlterado = true;
                        }
                    });
                });
            }
        });

        window.addEventListener('beforeunload', function(e) {
            if (formularioAlterado) {
                e.preventDefault();
                e.returnValue = '';
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
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #00FFA3; font-size: 0.85em; }

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
        /* FORM SECTIONS                              */
        /* ========================================== */
        .form-section {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .form-section:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .form-section-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: rgba(0, 255, 163, 0.02);
        }

        .section-number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0, 255, 163, 0.3);
        }

        .section-number i { font-size: 16px; }

        .section-title h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 2px 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .section-title h3 i { color: #00FFA3; }

        .section-title p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
        }

        .form-section-body {
            padding: var(--space-lg);
        }

        /* ========================================== */
        /* FORM GROUPS                                */
        /* ========================================== */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: var(--space-md);
        }

        .form-group:last-child { margin-bottom: 0; }

        .form-label {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
        }

        .form-label .required { color: #FF6B6B; margin-left: 2px; }

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
            border-color: #00FFA3;
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
        }

        .form-control:read-only {
            background: var(--bg-card);
            color: var(--text-muted);
            cursor: not-allowed;
        }

        .form-control::placeholder { color: var(--text-muted); }

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

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .form-help {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .form-error {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-sm);
            color: #FF6B6B;
            padding: 8px 12px;
            background: rgba(255, 107, 107, 0.08);
            border-radius: var(--radius-sm);
            border: 1px solid rgba(255, 107, 107, 0.2);
            margin-top: var(--space-sm);
        }

        /* ========================================== */
        /* INPUT GROUP                                */
        /* ========================================== */
        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group .input-group-text {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
            padding: 10px 14px;
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 600;
            white-space: nowrap;
        }

        .input-group .form-control {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
        }

        /* ========================================== */
        /* MÉTODOS GRID                               */
        /* ========================================== */
        .metodos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: var(--space-sm);
        }

        .metodo-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
            text-align: center;
        }

        .metodo-card:hover {
            border-color: #00FFA3;
            transform: translateY(-2px);
        }

        .metodo-card.selected {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.06);
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
        }

        .metodo-card i {
            font-size: 22px;
            color: #00FFA3;
        }

        .metodo-card span {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-primary);
        }

        .metodo-check {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #00FFA3;
            color: #0A1628;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            opacity: 0;
            transform: scale(0);
            transition: var(--transition-bounce);
        }

        .metodo-card.selected .metodo-check {
            opacity: 1;
            transform: scale(1);
        }

        /* ========================================== */
        /* CLIENTE PREVIEW                            */
        /* ========================================== */
        .cliente-preview {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.06) 0%, rgba(0, 210, 255, 0.06) 100%);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-md);
            margin-top: var(--space-sm);
            margin-bottom: var(--space-md);
        }

        .cliente-preview-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .cliente-preview-info {
            flex: 1;
            min-width: 0;
        }

        .cliente-preview-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 6px 0;
        }

        .cliente-preview-meta {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .cliente-preview-meta span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .cliente-preview-meta span i { color: #00FFA3; }

        /* ========================================== */
        /* PROGRESSO PREVIEW                          */
        /* ========================================== */
        .progresso-pagamento-preview {
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
        }

        .progresso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-sm);
        }

        .progresso-label {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            font-weight: 500;
        }

        .progresso-percent {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        .progresso-barra {
            height: 10px;
            background: var(--bg-card);
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: var(--space-sm);
        }

        .progresso-fill {
            height: 100%;
            background: linear-gradient(90deg, #00FFA3 0%, #00D2FF 100%);
            border-radius: 5px;
            transition: width 0.6s ease;
        }

        .progresso-info {
            display: flex;
            justify-content: space-between;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .progresso-info strong { color: var(--text-primary); }

        /* ========================================== */
        /* COMPROVATIVO EXISTENTE                     */
        /* ========================================== */
        .comprovativo-existente {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .comprovativo-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-sm);
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .comprovativo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .comprovativo-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .comprovativo-tamanho {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-acoes {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
        }

        /* ========================================== */
        /* UPLOAD AREA                                */
        /* ========================================== */
        .upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-xl);
            background: var(--bg-input);
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: center;
        }

        .upload-area:hover {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.02);
        }

        .upload-area i {
            font-size: 36px;
            color: #00FFA3;
            margin-bottom: 4px;
        }

        .upload-area span {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        .upload-area small {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-preview {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(0, 255, 163, 0.06);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-md);
            margin-top: var(--space-md);
        }

        /* ========================================== */
        /* HISTÓRICO                                  */
        /* ========================================== */
        .historico-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .historico-item {
            display: flex;
            gap: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .historico-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .historico-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .historico-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .historico-acao {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .historico-meta {
            display: flex;
            gap: var(--space-md);
            font-size: var(--text-xs);
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        /* ========================================== */
        /* BADGES                                     */
        /* ========================================== */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-status.status-pago { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-falhou { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-cancelado { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        /* ========================================== */
        /* FORM ACTIONS                               */
        /* ========================================== */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: var(--space-sm);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
            position: sticky;
            bottom: var(--space-md);
            z-index: 100;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-actions .btn {
            padding: 12px 24px;
            font-size: var(--text-sm);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-lg { padding: 12px 24px; font-size: var(--text-body); }

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
            border: 1px solid var(--border-color);
            z-index: 10;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
            color: var(--text-primary);
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

        .modal-alerta {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(255, 217, 61, 0.08);
            border: 1px solid rgba(255, 217, 61, 0.25);
            border-radius: var(--radius-md);
        }

        .modal-alerta i {
            font-size: 24px;
            flex-shrink: 0;
        }

        .modal-alerta div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .modal-alerta strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
        }

        .modal-alerta span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 120px; justify-content: center; }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 992px) {
            .form-row { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
        }

        @media (max-width: 768px) {
            .form-section-header { flex-direction: column; align-items: flex-start; }
            .section-number { width: 36px; height: 36px; font-size: 15px; }
            .metodos-grid { grid-template-columns: 1fr 1fr; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; justify-content: center; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }

            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .metodos-grid { grid-template-columns: 1fr; }
            .form-section-body { padding: var(--space-md); }
            .comprovativo-existente { flex-direction: column; text-align: center; }
            .comprovativo-acoes { width: 100%; justify-content: center; }
            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
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