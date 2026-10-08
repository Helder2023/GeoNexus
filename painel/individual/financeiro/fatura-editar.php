<?php
// painel/individual/financeiro/fatura-editar.php - Editar Fatura
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Editar Fatura';
$pagina_atual = 'fatura-editar';

// ============================================
// GARANTIR VARIÁVEIS (FALLBACK)
// ============================================
if (!isset($total_transacoes))         $total_transacoes = 156;
if (!isset($total_faturas_pendentes))  $total_faturas_pendentes = 12;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// OBTER NÚMERO DA FATURA (via URL)
// ============================================
$numero_fatura = isset($_GET['numero']) ? $_GET['numero'] : 'FT-2026-0156';

// ============================================
// DADOS MOCKADOS - FATURA ATUAL
// ============================================
$fatura = [
    'id' => 1,
    'numero' => $numero_fatura,
    'data_emissao' => '2026-02-18',
    'data_vencimento' => '2026-03-15',
    'status' => 'pendente',
    'status_label' => 'Pendente',
    'tipo' => 'receita',
    'tipo_label' => 'Receita',
    'referencia_externa' => 'FAT-2026-ABC-0156',
    
    'cliente' => [
        'id' => 1,
        'nome' => 'Construtora ABC',
        'tipo' => 'Empresa',
        'email' => 'contato@construtoraabc.ao',
        'telefone' => '+244 222 345 678',
        'nif' => '5417896321',
        'endereco' => 'Rua Amílcar Cabral, 123 - Luanda, Angola',
        'responsavel' => 'Eng. João Silva'
    ],
    
    'empresa' => [
        'nome' => 'Carlos Mendes - Engenharia',
        'nif' => '5417896999',
        'endereco' => 'Av. 4 de Fevereiro, 100 - Luanda, Angola',
        'email' => 'carlos.mendes@email.com',
        'telefone' => '+244 923 456 789',
        'banco' => 'BAI - Banco Angolano de Investimentos',
        'iban' => 'AO06 0040 0000 1234 5678 9012 3'
    ],
    
    'itens' => [
        [
            'id' => 1,
            'descricao' => 'Levantamento Topográfico Completo - Zona Norte',
            'detalhes' => 'Levantamento de 50 hectares com curvas de nível a cada metro, pontos georreferenciados em WGS84 e geração de plantas em escala 1:1000.',
            'quantidade' => 1,
            'unidade' => 'Projeto',
            'preco_unitario' => 300000,
            'subtotal' => 300000
        ],
        [
            'id' => 2,
            'descricao' => 'Relatório Técnico Detalhado',
            'detalhes' => 'Elaboração de relatório técnico com análise de dados, mapas temáticos e recomendações.',
            'quantidade' => 1,
            'unidade' => 'Relatório',
            'preco_unitario' => 50000,
            'subtotal' => 50000
        ]
    ],
    
    'subtotal' => 350000,
    'desconto' => 0,
    'iva_percentual' => 14,
    'iva_valor' => 49000,
    'total' => 399000,
    
    'observacoes' => 'Pagamento referente à primeira fase do projeto de levantamento topográfico. Prazo de pagamento: 30 dias após emissão.',
    'termos' => 'O pagamento deve ser efetuado até a data de vencimento. Após esse prazo, serão aplicados juros de mora de 1% ao mês.',
];

// ============================================
// LISTA DE CLIENTES
// ============================================
$clientes = [
    ['id' => 1, 'nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'email' => 'contato@construtoraabc.ao', 'telefone' => '+244 222 345 678', 'nif' => '5417896321'],
    ['id' => 2, 'nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'email' => 'contato@industrialuanda.ao', 'telefone' => '+244 222 456 789', 'nif' => '5417896322'],
    ['id' => 3, 'nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'email' => 'geral@luanda.gov.ao', 'telefone' => '+244 222 567 890', 'nif' => '5417896323'],
    ['id' => 4, 'nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'email' => 'info@agronegocios.ao', 'telefone' => '+244 222 678 901', 'nif' => '5417896324'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'email' => 'contato@mineracaoprogresso.ao', 'telefone' => '+244 222 789 012', 'nif' => '5417896325'],
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'paga' => 'status-paga',
            'pendente' => 'status-pendente',
            'vencida' => 'status-vencida',
            'cancelada' => 'status-cancelada',
            'rascunho' => 'status-rascunho'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getStatusIcon')) {
    function getStatusIcon($status) {
        $icons = [
            'paga' => 'fa-check-circle',
            'pendente' => 'fa-clock',
            'vencida' => 'fa-exclamation-triangle',
            'cancelada' => 'fa-times-circle',
            'rascunho' => 'fa-file'
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
                        <i class="fas fa-edit icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status <?php echo getStatusClass($fatura['status']); ?>">
                            <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                            <?php echo $fatura['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="faturas.php">Faturas</a>
                        <span class="separator">/</span>
                        <a href="fatura-detalhe.php?numero=<?php echo $fatura['numero']; ?>"><?php echo $fatura['numero']; ?></a>
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

                    <a href="fatura-detalhe.php?numero=<?php echo $fatura['numero']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formEditarFatura" onsubmit="salvarEdicao(event)">
                <input type="hidden" id="faturaId" value="<?php echo $fatura['id']; ?>">
                <input type="hidden" id="faturaNumero" value="<?php echo $fatura['numero']; ?>">

                <!-- ========================================== -->
                <!-- ETAPA 1: DADOS DO EMITENTE                 -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-user-tie"></i> Dados do Emitente</h3>
                            <p>Informações de quem emite a fatura</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Nome / Razão Social <span class="required">*</span></label>
                                <input type="text" class="form-control" id="emitenteNome" 
                                       value="<?php echo htmlspecialchars($fatura['empresa']['nome']); ?>" 
                                       required maxlength="150">
                            </div>
                            <div class="form-group">
                                <label class="form-label">NIF <span class="required">*</span></label>
                                <input type="text" class="form-control" id="emitenteNif" 
                                       value="<?php echo htmlspecialchars($fatura['empresa']['nif']); ?>" 
                                       required maxlength="20">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="emitenteEmail" 
                                       value="<?php echo htmlspecialchars($fatura['empresa']['email']); ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="emitenteTelefone" 
                                       value="<?php echo htmlspecialchars($fatura['empresa']['telefone']); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="emitenteEndereco" 
                                   value="<?php echo htmlspecialchars($fatura['empresa']['endereco']); ?>" maxlength="200">
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 2: DADOS DO CLIENTE                  -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="form-section-header">
                        <div class="section-number">2</div>
                        <div class="section-title">
                            <h3><i class="fas fa-user"></i> Dados do Cliente</h3>
                            <p>Altere o cliente desta fatura se necessário</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">Cliente Atual <span class="required">*</span></label>
                            <select class="form-control" id="clienteId" onchange="preencherDadosCliente(this.value)">
                                <option value="">-- Selecione um cliente --</option>
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente['id']; ?>"
                                            data-nome="<?php echo htmlspecialchars($cliente['nome']); ?>"
                                            data-tipo="<?php echo htmlspecialchars($cliente['tipo']); ?>"
                                            data-email="<?php echo htmlspecialchars($cliente['email']); ?>"
                                            data-telefone="<?php echo htmlspecialchars($cliente['telefone']); ?>"
                                            data-nif="<?php echo htmlspecialchars($cliente['nif']); ?>"
                                            <?php echo $cliente['id'] == $fatura['cliente']['id'] ? 'selected' : ''; ?>>
                                        <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Preview do Cliente -->
                        <div class="cliente-preview" id="clientePreview">
                            <div class="cliente-preview-avatar">
                                <i class="fas <?php echo $fatura['cliente']['tipo'] === 'Instituição' ? 'fa-university' : ($fatura['cliente']['tipo'] === 'Empresa' ? 'fa-building' : 'fa-user'); ?>"></i>
                            </div>
                            <div class="cliente-preview-info">
                                <h4 id="previewNome"><?php echo $fatura['cliente']['nome']; ?></h4>
                                <div class="cliente-preview-meta">
                                    <span><i class="fas fa-id-card"></i> NIF: <span id="previewNif"><?php echo $fatura['cliente']['nif']; ?></span></span>
                                    <span><i class="fas fa-envelope"></i> <span id="previewEmail"><?php echo $fatura['cliente']['email']; ?></span></span>
                                    <span><i class="fas fa-phone"></i> <span id="previewTelefone"><?php echo $fatura['cliente']['telefone']; ?></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 3: INFORMAÇÕES DA FATURA             -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="form-section-header">
                        <div class="section-number">3</div>
                        <div class="section-title">
                            <h3><i class="fas fa-info-circle"></i> Informações da Fatura</h3>
                            <p>Dados gerais e datas</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Número da Fatura</label>
                                <input type="text" class="form-control" id="numeroFatura" 
                                       value="<?php echo $fatura['numero']; ?>" readonly>
                                <span class="form-help">O número não pode ser alterado</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Referência Externa</label>
                                <input type="text" class="form-control" id="referenciaExterna" 
                                       value="<?php echo htmlspecialchars($fatura['referencia_externa']); ?>"
                                       placeholder="Ex: FAT-2026-ABC-0156" maxlength="50">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Data de Emissão <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataEmissao" 
                                       value="<?php echo $fatura['data_emissao']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data de Vencimento <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataVencimento" 
                                       value="<?php echo $fatura['data_vencimento']; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select class="form-control" id="statusFatura">
                                    <option value="rascunho" <?php echo $fatura['status'] === 'rascunho' ? 'selected' : ''; ?>>Rascunho</option>
                                    <option value="pendente" <?php echo $fatura['status'] === 'pendente' ? 'selected' : ''; ?>>Pendente</option>
                                    <option value="paga" <?php echo $fatura['status'] === 'paga' ? 'selected' : ''; ?>>Paga</option>
                                    <option value="vencida" <?php echo $fatura['status'] === 'vencida' ? 'selected' : ''; ?>>Vencida</option>
                                    <option value="cancelada" <?php echo $fatura['status'] === 'cancelada' ? 'selected' : ''; ?>>Cancelada</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tipo</label>
                                <select class="form-control" id="tipoFatura">
                                    <option value="receita" <?php echo $fatura['tipo'] === 'receita' ? 'selected' : ''; ?>>Receita</option>
                                    <option value="despesa" <?php echo $fatura['tipo'] === 'despesa' ? 'selected' : ''; ?>>Despesa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: ITENS DA FATURA                   -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-list-ul"></i> Itens da Fatura</h3>
                            <p>Adicione, edite ou remova itens</p>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" onclick="adicionarItem()">
                            <i class="fas fa-plus"></i> Adicionar Item
                        </button>
                    </div>
                    <div class="form-section-body">
                        <div class="itens-list" id="itensList">
                            <?php foreach ($fatura['itens'] as $index => $item): ?>
                                <div class="item-card" data-item-id="<?php echo $item['id']; ?>">
                                    <div class="item-card-header">
                                        <span class="item-numero">Item <?php echo $index + 1; ?></span>
                                        <button type="button" class="item-remove" onclick="removerItem(this)" title="Remover item">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="item-card-body">
                                        <div class="form-group">
                                            <label class="form-label">Descrição <span class="required">*</span></label>
                                            <input type="text" class="form-control item-descricao" 
                                                   value="<?php echo htmlspecialchars($item['descricao']); ?>"
                                                   placeholder="Descrição do item" required
                                                   oninput="calcularTotais()">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Detalhes</label>
                                            <textarea class="form-control item-detalhes" rows="2"
                                                      placeholder="Detalhes adicionais..."><?php echo htmlspecialchars($item['detalhes']); ?></textarea>
                                        </div>

                                        <div class="form-row form-row-4">
                                            <div class="form-group">
                                                <label class="form-label">Qtd <span class="required">*</span></label>
                                                <input type="number" class="form-control item-quantidade" 
                                                       value="<?php echo $item['quantidade']; ?>"
                                                       min="1" step="1" required
                                                       oninput="calcularTotais()">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Unidade</label>
                                                <input type="text" class="form-control item-unidade" 
                                                       value="<?php echo htmlspecialchars($item['unidade']); ?>"
                                                       placeholder="Ex: Projeto" maxlength="30">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Preço Unit. <span class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text">Kz</span>
                                                    <input type="number" class="form-control item-preco" 
                                                           value="<?php echo $item['preco_unitario']; ?>"
                                                           min="0" step="1000" required
                                                           oninput="calcularTotais()">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Subtotal</label>
                                                <input type="text" class="form-control item-subtotal" 
                                                       value="Kz <?php echo formatMoney($item['subtotal']); ?>"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="button" class="btn btn-outline btn-add-item" onclick="adicionarItem()">
                            <i class="fas fa-plus"></i> Adicionar Novo Item
                        </button>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 5: VALORES E IMPOSTOS                -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-calculator"></i> Valores e Impostos</h3>
                            <p>Desconto e totais da fatura</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Desconto</label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="descontoFatura" 
                                           value="<?php echo $fatura['desconto']; ?>"
                                           min="0" step="1000"
                                           oninput="calcularTotais()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">IVA (%)</label>
                                <input type="number" class="form-control" id="ivaFatura" 
                                       value="<?php echo $fatura['iva_percentual']; ?>"
                                       min="0" max="100" step="1"
                                       oninput="calcularTotais()">
                                <span class="form-help">Taxa de IVA aplicada (padrão: 14%)</span>
                            </div>
                        </div>

                        <!-- Resumo de Totais -->
                        <div class="resumo-totais">
                            <div class="resumo-total-item">
                                <span class="resumo-total-label">Subtotal</span>
                                <span class="resumo-total-value" id="totalSubtotal">Kz <?php echo formatMoney($fatura['subtotal']); ?></span>
                            </div>
                            <div class="resumo-total-item">
                                <span class="resumo-total-label">Desconto</span>
                                <span class="resumo-total-value resumo-total-desconto" id="totalDesconto">
                                    - Kz <?php echo formatMoney($fatura['desconto']); ?>
                                </span>
                            </div>
                            <div class="resumo-total-item">
                                <span class="resumo-total-label">IVA (<span id="ivaPercentual"><?php echo $fatura['iva_percentual']; ?></span>%)</span>
                                <span class="resumo-total-value" id="totalIva">Kz <?php echo formatMoney($fatura['iva_valor']); ?></span>
                            </div>
                            <div class="resumo-total-item resumo-total-final">
                                <span class="resumo-total-label">TOTAL</span>
                                <span class="resumo-total-value" id="totalFinal">Kz <?php echo formatMoney($fatura['total']); ?></span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 6: DADOS BANCÁRIOS                   -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.5s;">
                    <div class="form-section-header">
                        <div class="section-number">6</div>
                        <div class="section-title">
                            <h3><i class="fas fa-university"></i> Dados Bancários</h3>
                            <p>Informações para pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Banco</label>
                                <input type="text" class="form-control" id="banco" 
                                       value="<?php echo htmlspecialchars($fatura['empresa']['banco']); ?>" 
                                       maxlength="100">
                            </div>
                            <div class="form-group">
                                <label class="form-label">IBAN</label>
                                <input type="text" class="form-control" id="iban" 
                                       value="<?php echo htmlspecialchars($fatura['empresa']['iban']); ?>" 
                                       maxlength="50">
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 7: OBSERVAÇÕES E TERMOS              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.6s;">
                    <div class="form-section-header">
                        <div class="section-number">7</div>
                        <div class="section-title">
                            <h3><i class="fas fa-sticky-note"></i> Observações e Termos</h3>
                            <p>Notas e condições adicionais</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoes" rows="3" 
                                      placeholder="Observações gerais sobre a fatura..."
                                      maxlength="500"><?php echo htmlspecialchars($fatura['observacoes']); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Termos e Condições</label>
                            <textarea class="form-control" id="termos" rows="3" 
                                      placeholder="Termos e condições de pagamento..."
                                      maxlength="500"><?php echo htmlspecialchars($fatura['termos']); ?></textarea>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.7s;">
                    <a href="fatura-detalhe.php?numero=<?php echo $fatura['numero']; ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="restaurarValores()">
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
        <div class="modal-content" style="max-width: 450px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i>
                    Confirmar
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body">
                <p id="modalConfirmacaoTexto">Tem certeza que deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-primary" id="modalConfirmacaoBtn">Confirmar</button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // DADOS ORIGINAIS (para restaurar)
        // ============================================
        const dadosOriginais = {
            emitenteNome: <?php echo json_encode($fatura['empresa']['nome']); ?>,
            emitenteNif: <?php echo json_encode($fatura['empresa']['nif']); ?>,
            emitenteEmail: <?php echo json_encode($fatura['empresa']['email']); ?>,
            emitenteTelefone: <?php echo json_encode($fatura['empresa']['telefone']); ?>,
            emitenteEndereco: <?php echo json_encode($fatura['empresa']['endereco']); ?>,
            clienteId: <?php echo json_encode($fatura['cliente']['id']); ?>,
            referenciaExterna: <?php echo json_encode($fatura['referencia_externa']); ?>,
            dataEmissao: <?php echo json_encode($fatura['data_emissao']); ?>,
            dataVencimento: <?php echo json_encode($fatura['data_vencimento']); ?>,
            status: <?php echo json_encode($fatura['status']); ?>,
            tipo: <?php echo json_encode($fatura['tipo']); ?>,
            itens: <?php echo json_encode($fatura['itens']); ?>,
            desconto: <?php echo json_encode($fatura['desconto']); ?>,
            ivaPercentual: <?php echo json_encode($fatura['iva_percentual']); ?>,
            banco: <?php echo json_encode($fatura['empresa']['banco']); ?>,
            iban: <?php echo json_encode($fatura['empresa']['iban']); ?>,
            observacoes: <?php echo json_encode($fatura['observacoes']); ?>,
            termos: <?php echo json_encode($fatura['termos']); ?>
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

            calcularTotais();
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
        // FORMATAR MOEDA
        // ============================================
        function formatMoney(value) {
            return Math.round(value).toLocaleString('pt-AO').replace(/,/g, '.');
        }

        // ============================================
        // PREENCHER DADOS DO CLIENTE
        // ============================================
        function preencherDadosCliente(clienteId) {
            const select = document.getElementById('clienteId');
            const option = select.options[select.selectedIndex];
            const preview = document.getElementById('clientePreview');

            if (!clienteId) {
                preview.style.display = 'none';
                return;
            }

            document.getElementById('previewNome').textContent = option.dataset.nome || '-';
            document.getElementById('previewNif').textContent = option.dataset.nif || '-';
            document.getElementById('previewEmail').textContent = option.dataset.email || '-';
            document.getElementById('previewTelefone').textContent = option.dataset.telefone || '-';

            // Atualizar avatar
            const avatarIcon = preview.querySelector('.cliente-preview-avatar i');
            const tipo = option.dataset.tipo || '';
            if (tipo === 'Instituição') {
                avatarIcon.className = 'fas fa-university';
            } else if (tipo === 'Empresa') {
                avatarIcon.className = 'fas fa-building';
            } else {
                avatarIcon.className = 'fas fa-user';
            }

            preview.style.display = 'flex';
        }

        // ============================================
        // ADICIONAR ITEM
        // ============================================
        let itemCounter = <?php echo count($fatura['itens']); ?>;

        function adicionarItem() {
            itemCounter++;
            const list = document.getElementById('itensList');
            
            const itemCard = document.createElement('div');
            itemCard.className = 'item-card animate-fade-up';
            itemCard.dataset.itemId = 'new_' + Date.now();
            
            itemCard.innerHTML = `
                <div class="item-card-header">
                    <span class="item-numero">Item ${itemCounter}</span>
                    <button type="button" class="item-remove" onclick="removerItem(this)" title="Remover item">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="item-card-body">
                    <div class="form-group">
                        <label class="form-label">Descrição <span class="required">*</span></label>
                        <input type="text" class="form-control item-descricao" 
                               placeholder="Descrição do item" required
                               oninput="calcularTotais()">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Detalhes</label>
                        <textarea class="form-control item-detalhes" rows="2"
                                  placeholder="Detalhes adicionais..."></textarea>
                    </div>

                    <div class="form-row form-row-4">
                        <div class="form-group">
                            <label class="form-label">Qtd <span class="required">*</span></label>
                            <input type="number" class="form-control item-quantidade" 
                                   value="1" min="1" step="1" required
                                   oninput="calcularTotais()">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Unidade</label>
                            <input type="text" class="form-control item-unidade" 
                                   placeholder="Ex: Projeto" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Preço Unit. <span class="required">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Kz</span>
                                <input type="number" class="form-control item-preco" 
                                       value="0" min="0" step="1000" required
                                       oninput="calcularTotais()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Subtotal</label>
                            <input type="text" class="form-control item-subtotal" 
                                   value="Kz 0" readonly>
                        </div>
                    </div>
                </div>
            `;
            
            list.appendChild(itemCard);
            itemCard.querySelector('.item-descricao').focus();
            renumerarItens();
        }

        // ============================================
        // REMOVER ITEM
        // ============================================
        function removerItem(btn) {
            const itemCard = btn.closest('.item-card');
            const list = document.getElementById('itensList');
            
            if (list.querySelectorAll('.item-card').length <= 1) {
                mostrarToast('Deve existir pelo menos 1 item', 'warning');
                return;
            }
            
            itemCard.style.transition = 'all 0.3s ease';
            itemCard.style.opacity = '0';
            itemCard.style.transform = 'translateX(20px)';
            
            setTimeout(() => {
                itemCard.remove();
                renumerarItens();
                calcularTotais();
            }, 300);
        }

        // ============================================
        // RENUMERAR ITENS
        // ============================================
        function renumerarItens() {
            const items = document.querySelectorAll('.item-card');
            items.forEach((item, index) => {
                item.querySelector('.item-numero').textContent = 'Item ' + (index + 1);
            });
            itemCounter = items.length;
        }

        // ============================================
        // CALCULAR TOTAIS
        // ============================================
        function calcularTotais() {
            const itens = document.querySelectorAll('.item-card');
            let subtotal = 0;

            itens.forEach(item => {
                const quantidade = parseFloat(item.querySelector('.item-quantidade').value) || 0;
                const preco = parseFloat(item.querySelector('.item-preco').value) || 0;
                const itemSubtotal = quantidade * preco;

                item.querySelector('.item-subtotal').value = 'Kz ' + formatMoney(itemSubtotal);
                subtotal += itemSubtotal;
            });

            const desconto = parseFloat(document.getElementById('descontoFatura').value) || 0;
            const ivaPercentual = parseFloat(document.getElementById('ivaFatura').value) || 0;

            const baseCalculo = Math.max(0, subtotal - desconto);
            const ivaValor = baseCalculo * (ivaPercentual / 100);
            const total = baseCalculo + ivaValor;

            document.getElementById('totalSubtotal').textContent = 'Kz ' + formatMoney(subtotal);
            document.getElementById('totalDesconto').textContent = '- Kz ' + formatMoney(desconto);
            document.getElementById('ivaPercentual').textContent = ivaPercentual;
            document.getElementById('totalIva').textContent = 'Kz ' + formatMoney(ivaValor);
            document.getElementById('totalFinal').textContent = 'Kz ' + formatMoney(total);
        }

        // ============================================
        // RESTAURAR VALORES
        // ============================================
        function restaurarValores() {
            mostrarConfirmacao(
                'Restaurar Valores',
                'Tem certeza que deseja restaurar todos os valores originais? As alterações não guardadas serão perdidas.',
                () => {
                    document.getElementById('emitenteNome').value = dadosOriginais.emitenteNome;
                    document.getElementById('emitenteNif').value = dadosOriginais.emitenteNif;
                    document.getElementById('emitenteEmail').value = dadosOriginais.emitenteEmail;
                    document.getElementById('emitenteTelefone').value = dadosOriginais.emitenteTelefone;
                    document.getElementById('emitenteEndereco').value = dadosOriginais.emitenteEndereco;
                    document.getElementById('referenciaExterna').value = dadosOriginais.referenciaExterna;
                    document.getElementById('dataEmissao').value = dadosOriginais.dataEmissao;
                    document.getElementById('dataVencimento').value = dadosOriginais.dataVencimento;
                    document.getElementById('statusFatura').value = dadosOriginais.status;
                    document.getElementById('tipoFatura').value = dadosOriginais.tipo;
                    document.getElementById('descontoFatura').value = dadosOriginais.desconto;
                    document.getElementById('ivaFatura').value = dadosOriginais.ivaPercentual;
                    document.getElementById('banco').value = dadosOriginais.banco;
                    document.getElementById('iban').value = dadosOriginais.iban;
                    document.getElementById('observacoes').value = dadosOriginais.observacoes;
                    document.getElementById('termos').value = dadosOriginais.termos;

                    document.getElementById('clienteId').value = dadosOriginais.clienteId;
                    preencherDadosCliente(dadosOriginais.clienteId);

                    restaurarItens();

                    mostrarToast('Valores restaurados!', 'info');
                    fecharModal('modalConfirmacao');
                }
            );
        }

        // ============================================
        // RESTAURAR ITENS
        // ============================================
        function restaurarItens() {
            const list = document.getElementById('itensList');
            list.innerHTML = '';

            dadosOriginais.itens.forEach((item, index) => {
                const itemCard = document.createElement('div');
                itemCard.className = 'item-card';
                itemCard.dataset.itemId = item.id;
                
                itemCard.innerHTML = `
                    <div class="item-card-header">
                        <span class="item-numero">Item ${index + 1}</span>
                        <button type="button" class="item-remove" onclick="removerItem(this)" title="Remover item">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="item-card-body">
                        <div class="form-group">
                            <label class="form-label">Descrição <span class="required">*</span></label>
                            <input type="text" class="form-control item-descricao" 
                                   value="${escapeHtml(item.descricao)}"
                                   placeholder="Descrição do item" required
                                   oninput="calcularTotais()">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Detalhes</label>
                            <textarea class="form-control item-detalhes" rows="2"
                                      placeholder="Detalhes adicionais...">${escapeHtml(item.detalhes || '')}</textarea>
                        </div>

                        <div class="form-row form-row-4">
                            <div class="form-group">
                                <label class="form-label">Qtd <span class="required">*</span></label>
                                <input type="number" class="form-control item-quantidade" 
                                       value="${item.quantidade}" min="1" step="1" required
                                       oninput="calcularTotais()">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Unidade</label>
                                <input type="text" class="form-control item-unidade" 
                                       value="${escapeHtml(item.unidade || '')}"
                                       placeholder="Ex: Projeto" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Preço Unit. <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control item-preco" 
                                           value="${item.preco_unitario}" min="0" step="1000" required
                                           oninput="calcularTotais()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Subtotal</label>
                                <input type="text" class="form-control item-subtotal" 
                                       value="Kz ${formatMoney(item.subtotal)}" readonly>
                            </div>
                        </div>
                    </div>
                `;
                
                list.appendChild(itemCard);
            });

            renumerarItens();
            calcularTotais();
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // ============================================
        // SALVAR EDIÇÃO
        // ============================================
        function salvarEdicao(event) {
            event.preventDefault();

            const id = document.getElementById('faturaId').value;
            const numero = document.getElementById('faturaNumero').value;
            const emitenteNome = document.getElementById('emitenteNome').value.trim();
            const emitenteNif = document.getElementById('emitenteNif').value.trim();
            const clienteId = document.getElementById('clienteId').value;
            const dataEmissao = document.getElementById('dataEmissao').value;
            const dataVencimento = document.getElementById('dataVencimento').value;

            // Validações
            if (!emitenteNome || !emitenteNif) {
                mostrarToast('Preencha os dados do emitente!', 'error');
                return;
            }

            if (!clienteId) {
                mostrarToast('Selecione um cliente!', 'error');
                document.getElementById('clienteId').focus();
                return;
            }

            if (!dataEmissao || !dataVencimento) {
                mostrarToast('Preencha as datas de emissão e vencimento!', 'error');
                return;
            }

            if (new Date(dataVencimento) < new Date(dataEmissao)) {
                mostrarToast('A data de vencimento não pode ser anterior à data de emissão!', 'error');
                return;
            }

            // Validar itens
            const itens = document.querySelectorAll('.item-card');
            let itensValidos = true;
            itens.forEach(item => {
                const descricao = item.querySelector('.item-descricao').value.trim();
                const quantidade = parseFloat(item.querySelector('.item-quantidade').value) || 0;
                const preco = parseFloat(item.querySelector('.item-preco').value) || 0;

                if (!descricao || quantidade <= 0 || preco <= 0) {
                    itensValidos = false;
                }
            });

            if (!itensValidos) {
                mostrarToast('Preencha corretamente todos os itens!', 'error');
                return;
            }

            // Recolher dados
            const itensData = [];
            itens.forEach(item => {
                itensData.push({
                    descricao: item.querySelector('.item-descricao').value.trim(),
                    detalhes: item.querySelector('.item-detalhes').value.trim(),
                    quantidade: parseFloat(item.querySelector('.item-quantidade').value) || 0,
                    unidade: item.querySelector('.item-unidade').value.trim(),
                    preco_unitario: parseFloat(item.querySelector('.item-preco').value) || 0
                });
            });

            const faturaData = {
                id: id,
                numero: numero,
                referencia_externa: document.getElementById('referenciaExterna').value.trim(),
                data_emissao: dataEmissao,
                data_vencimento: dataVencimento,
                status: document.getElementById('statusFatura').value,
                tipo: document.getElementById('tipoFatura').value,
                cliente_id: clienteId,
                itens: itensData,
                desconto: parseFloat(document.getElementById('descontoFatura').value) || 0,
                iva_percentual: parseFloat(document.getElementById('ivaFatura').value) || 0,
                observacoes: document.getElementById('observacoes').value.trim(),
                termos: document.getElementById('termos').value.trim()
            };

            console.log('Fatura a atualizar:', faturaData);

            // Simular criação
            mostrarToast('Fatura ' + numero + ' atualizada com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'fatura-detalhe.php?numero=' + numero;
            }, 1500);
        }

        // ============================================
        // MODAIS
        // ============================================
        let callbackConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            document.getElementById('modalConfirmacaoTexto').textContent = mensagem;
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

        document.getElementById('modalConfirmacaoBtn').addEventListener('click', function() {
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
            document.querySelectorAll('input, textarea, select').forEach(el => {
                el.addEventListener('input', () => {
                    if (el.type !== 'hidden' && !el.readOnly) {
                        formularioAlterado = true;
                    }
                });
            });
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
    /* BOTÃO DE TEMA (DARK / LIGHT)               */
    /* ========================================== */
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
        flex-shrink: 0;
        padding: 0;
    }

    .btn-theme:hover {
        border-color: #00D2FF;
        color: #00D2FF;
        background: rgba(0, 210, 255, 0.05);
        transform: scale(1.05);
    }

    .btn-theme:active { transform: scale(0.95); }

    .btn-theme .theme-icon {
        position: absolute;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        pointer-events: none;
    }

    .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg) scale(1); color: #FFD93D; }
    .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg) scale(0.5); color: #00D2FF; }
    [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg) scale(0.5); }
    [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg) scale(1); }

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

    .toast::before { content: ''; position: absolute; left: 0; top: 0; width: 4px; height: 100%; }
    .toast.toast-success::before { background: #00FFA3; }
    .toast.toast-error::before { background: #FF6B6B; }
    .toast.toast-warning::before { background: #FFD93D; }
    .toast.toast-info::before { background: #00D2FF; }

    .toast .toast-content { display: flex; align-items: center; gap: 12px; flex: 1; }
    .toast .toast-content i { font-size: 1.3rem; flex-shrink: 0; }
    .toast .toast-content span { font-size: var(--text-sm); color: var(--text-primary); font-weight: 500; }
    .toast .toast-close {
        background: none; border: none; color: var(--text-muted);
        font-size: 1.4rem; cursor: pointer; padding: 0 4px;
        line-height: 1; flex-shrink: 0;
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

    .header-left { flex: 1; min-width: 0; display: flex; flex-direction: column; gap: 6px; }

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

    .header-left h1 .icon { color: #00D2FF; font-size: 0.85em; }

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

    .header-right { display: flex; align-items: center; gap: var(--space-sm); flex-shrink: 0; flex-wrap: wrap; }

    /* ========================================== */
    /* BADGES                                     */
    /* ========================================== */
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: var(--radius-full);
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-status.status-paga { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
    .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
    .badge-status.status-vencida { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
    .badge-status.status-cancelada { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }
    .badge-status.status-rascunho { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }

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
        background: rgba(0, 210, 255, 0.02);
        flex-wrap: wrap;
    }

    .section-number {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
        color: #FFFFFF;
        font-family: var(--font-display);
        font-size: 18px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 210, 255, 0.3);
    }

    .section-title { flex: 1; min-width: 0; }

    .section-title h3 {
        font-family: var(--font-title);
        font-size: var(--text-h4);
        color: var(--text-primary);
        margin: 0 0 2px 0;
        display: flex;
        align-items: center;
        gap: var(--space-sm);
    }

    .section-title h3 i { color: #00D2FF; }
    .section-title p { font-size: var(--text-sm); color: var(--text-muted); margin: 0; }

    .form-section-body { padding: var(--space-lg); }

    /* ========================================== */
    /* FORM GROUPS                                */
    /* ========================================== */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--space-md);
        margin-bottom: var(--space-md);
    }

    .form-row-4 { grid-template-columns: 1fr 1fr 1fr 1fr; }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: var(--space-md);
        min-width: 0;
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
        border-color: #00D2FF;
        box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
    }

    .form-control:read-only { background: var(--bg-card); color: var(--text-muted); cursor: not-allowed; }
    .form-control::placeholder { color: var(--text-muted); }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        padding-right: 36px;
        cursor: pointer;
    }

    select.form-control option { background: var(--bg-card); color: var(--text-primary); }
    textarea.form-control { resize: vertical; min-height: 80px; }
    .form-help { font-size: var(--text-xs); color: var(--text-muted); }

    /* ========================================== */
    /* INPUT GROUP                                */
    /* ========================================== */
    .input-group { display: flex; align-items: center; }

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
        flex-shrink: 0;
    }

    .input-group .form-control { border-radius: 0 var(--radius-sm) var(--radius-sm) 0; }

    /* ========================================== */
    /* CLIENTE PREVIEW                            */
    /* ========================================== */
    .cliente-preview {
        display: flex;
        align-items: center;
        gap: var(--space-md);
        padding: var(--space-md);
        background: linear-gradient(135deg, rgba(0, 210, 255, 0.06) 0%, rgba(108, 43, 217, 0.06) 100%);
        border: 1px solid rgba(0, 210, 255, 0.2);
        border-radius: var(--radius-md);
        margin-top: var(--space-md);
    }

    .cliente-preview-avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .cliente-preview-info { flex: 1; min-width: 0; }

    .cliente-preview-info h4 {
        font-family: var(--font-title);
        font-size: var(--text-h4);
        font-weight: 600;
        color: var(--text-primary);
        margin: 0 0 6px 0;
    }

    .cliente-preview-meta { display: flex; gap: var(--space-md); flex-wrap: wrap; }

    .cliente-preview-meta span {
        font-size: var(--text-xs);
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .cliente-preview-meta span i { color: #00D2FF; }

    /* ========================================== */
    /* ITENS                                      */
    /* ========================================== */
    .itens-list {
        display: flex;
        flex-direction: column;
        gap: var(--space-md);
        margin-bottom: var(--space-md);
    }

    .item-card {
        background: var(--bg-input);
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        overflow: hidden;
        transition: var(--transition-smooth);
    }

    .item-card:hover { border-color: rgba(0, 210, 255, 0.3); }

    .item-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: var(--space-sm) var(--space-md);
        background: rgba(0, 210, 255, 0.04);
        border-bottom: 1px solid var(--border-color);
    }

    .item-numero {
        font-family: var(--font-display);
        font-size: var(--text-xs);
        font-weight: 700;
        color: #00D2FF;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .item-remove {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: rgba(255, 107, 107, 0.1);
        color: #FF6B6B;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        transition: var(--transition-smooth);
    }

    .item-remove:hover { background: rgba(255, 107, 107, 0.2); transform: scale(1.1); }

    .item-card-body { padding: var(--space-md); }
    .item-card-body .form-group { margin-bottom: var(--space-sm); }
    .item-card-body .form-row { margin-bottom: 0; }

    .btn-add-item { width: 100%; justify-content: center; }

    /* ========================================== */
    /* RESUMO TOTAIS                              */
    /* ========================================== */
    .resumo-totais {
        display: flex;
        flex-direction: column;
        gap: 2px;
        padding: var(--space-md);
        background: linear-gradient(135deg, rgba(0, 210, 255, 0.06) 0%, rgba(108, 43, 217, 0.06) 100%);
        border: 2px solid rgba(0, 210, 255, 0.2);
        border-radius: var(--radius-md);
        margin-top: var(--space-md);
    }

    .resumo-total-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid var(--border-color);
        gap: var(--space-sm);
    }

    .resumo-total-item:last-child { border-bottom: none; }

    .resumo-total-label { font-size: var(--text-sm); color: var(--text-muted); font-weight: 500; }

    .resumo-total-value {
        font-family: var(--font-display);
        font-size: var(--text-h4);
        font-weight: 700;
        color: var(--text-primary);
        text-align: right;
    }

    .resumo-total-desconto { color: #FF6B6B; }

    .resumo-total-final {
        padding-top: var(--space-md);
        margin-top: var(--space-sm);
        border-top: 2px solid #00D2FF;
    }

    .resumo-total-final .resumo-total-label {
        font-size: var(--text-h4);
        font-weight: 700;
        color: var(--text-primary);
    }

    .resumo-total-final .resumo-total-value { font-size: var(--text-h2); color: #00D2FF; }

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
    .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 999999; align-items: center; justify-content: center; }
    .modal.active { display: flex; }

    .modal-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(6px);
        cursor: pointer;
    }

    .modal-content {
        position: relative;
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        animation: modalSlideUp 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.6);
        border: 1px solid var(--border-color);
        z-index: 10;
    }

    @keyframes modalSlideUp {
        from { opacity: 0; transform: translateY(30px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px 16px;
        border-bottom: 1px solid var(--border-color);
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

    .modal-close:hover { color: var(--text-primary); background: var(--bg-card-hover); transform: rotate(90deg); }

    .modal-body { padding: 24px; }

    .modal-body p {
        font-size: var(--text-sm);
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 0;
    }

    .modal-footer {
        padding: 16px 24px 20px;
        border-top: 1px solid var(--border-color);
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .modal-footer .btn { min-width: 100px; justify-content: center; }

    /* ========================================== */
    /* RESPONSIVIDADE                             */
    /* ========================================== */
    @media (max-width: 992px) {
        .form-row { grid-template-columns: 1fr; }
        .form-row-4 { grid-template-columns: 1fr 1fr; }
        .page-header { flex-direction: column; align-items: stretch; }
        .header-right { justify-content: flex-end; width: 100%; }
    }

    @media (max-width: 768px) {
        .form-section-header { flex-direction: column; align-items: flex-start; }
        .section-number { width: 36px; height: 36px; font-size: 15px; }
        .form-actions { flex-direction: column-reverse; }
        .form-actions .btn { width: 100%; justify-content: center; }
        .page-header { padding: var(--space-md); }
        .header-left h1 { font-size: var(--text-h3); }
        .cliente-preview { flex-direction: column; text-align: center; }
        .cliente-preview-meta { justify-content: center; }
    }

    @media (max-width: 480px) {
        .form-row-4 { grid-template-columns: 1fr; }
        .form-section-body { padding: var(--space-md); }
        .header-right { flex-direction: column; }
        .header-right .btn { width: 100%; justify-content: center; }
        .resumo-total-final .resumo-total-value { font-size: var(--text-h3); }
        .btn-theme { width: 36px; height: 36px; font-size: 14px; }
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-up {
        animation: fadeUp 0.5s ease forwards;
        opacity: 0;
    }
    </style>

</body>

</html>