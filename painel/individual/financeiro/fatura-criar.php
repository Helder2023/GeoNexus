<?php
// painel/individual/financeiro/fatura-criar.php - Criar Nova Fatura
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Criar Nova Fatura';
$pagina_atual = 'fatura-criar';

// ============================================
// GARANTIR VARIÁVEIS (FALLBACK)
// ============================================
if (!isset($total_transacoes))         $total_transacoes = 156;
if (!isset($total_faturas_pendentes))  $total_faturas_pendentes = 12;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// LISTA DE CLIENTES
// ============================================
$clientes = [
    ['id' => 1, 'nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'email' => 'contato@construtoraabc.ao', 'telefone' => '+244 222 345 678', 'nif' => '5417896321', 'endereco' => 'Rua Amílcar Cabral, 123 - Luanda, Angola', 'responsavel' => 'Eng. João Silva'],
    ['id' => 2, 'nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'email' => 'contato@industrialuanda.ao', 'telefone' => '+244 222 456 789', 'nif' => '5417896322', 'endereco' => 'Zona Industrial, Lote 45 - Luanda, Angola', 'responsavel' => 'Sr. António Costa'],
    ['id' => 3, 'nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'email' => 'geral@luanda.gov.ao', 'telefone' => '+244 222 567 890', 'nif' => '5417896323', 'endereco' => 'Largo do Município, 1 - Luanda, Angola', 'responsavel' => 'Dr. Manuel Neves'],
    ['id' => 4, 'nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'email' => 'info@agronegocios.ao', 'telefone' => '+244 222 678 901', 'nif' => '5417896324', 'endereco' => 'Estrada do Huambo, Km 12 - Huambo, Angola', 'responsavel' => 'Eng. Maria Silva'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'email' => 'contato@mineracaoprogresso.ao', 'telefone' => '+244 222 789 012', 'nif' => '5417896325', 'endereco' => 'Rua das Minas, 78 - Lubango, Angola', 'responsavel' => 'Sr. Paulo Fernandes'],
];

// ============================================
// PROJETOS DISPONÍVEIS (para vincular)
// ============================================
$projetos = [
    ['id' => 1, 'nome' => 'Levantamento Topográfico - Zona Norte', 'valor' => 350000, 'cliente_id' => 1],
    ['id' => 2, 'nome' => 'Mapeamento GIS - Área Industrial', 'valor' => 480000, 'cliente_id' => 2],
    ['id' => 3, 'nome' => 'Levantamento Planialtimétrico', 'valor' => 280000, 'cliente_id' => 3],
    ['id' => 4, 'nome' => 'Cadastro Rural - Fazenda Sunflower', 'valor' => 195000, 'cliente_id' => 4],
];

// ============================================
// DADOS DO PROFISSIONAL (Emitente - padrão)
// ============================================
$emitente_padrao = [
    'nome' => 'Carlos Mendes - Engenharia',
    'nif' => '5417896999',
    'endereco' => 'Av. 4 de Fevereiro, 100 - Luanda, Angola',
    'email' => 'carlos.mendes@email.com',
    'telefone' => '+244 923 456 789',
    'banco' => 'BAI - Banco Angolano de Investimentos',
    'iban' => 'AO06 0040 0000 1234 5678 9012 3'
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('getNextInvoiceNumber')) {
    function getNextInvoiceNumber() {
        return 'FT-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
    }
}

$numero_fatura = getNextInvoiceNumber();
$data_hoje = date('Y-m-d');
$data_vencimento_padrao = date('Y-m-d', strtotime('+30 days'));
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
                        <i class="fas fa-file-invoice icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="faturas.php">Faturas</a>
                        <span class="separator">/</span>
                        <span>Nova Fatura</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="faturas.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formCriarFatura" onsubmit="criarFatura(event)">
                
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
                                       value="<?php echo htmlspecialchars($emitente_padrao['nome']); ?>" 
                                       required maxlength="150">
                            </div>
                            <div class="form-group">
                                <label class="form-label">NIF <span class="required">*</span></label>
                                <input type="text" class="form-control" id="emitenteNif" 
                                       value="<?php echo htmlspecialchars($emitente_padrao['nif']); ?>" 
                                       required maxlength="20">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="emitenteEmail" 
                                       value="<?php echo htmlspecialchars($emitente_padrao['email']); ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="emitenteTelefone" 
                                       value="<?php echo htmlspecialchars($emitente_padrao['telefone']); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="emitenteEndereco" 
                                   value="<?php echo htmlspecialchars($emitente_padrao['endereco']); ?>" maxlength="200">
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
                            <p>Selecione ou cadastre o cliente da fatura</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="cliente-toggle">
                            <button type="button" class="toggle-btn active" onclick="mudarTipoCliente('existente', event)">
                                <i class="fas fa-search"></i> Cliente Existente
                            </button>
                            <button type="button" class="toggle-btn" onclick="mudarTipoCliente('novo', event)">
                                <i class="fas fa-user-plus"></i> Novo Cliente
                            </button>
                        </div>

                        <!-- Cliente Existente -->
                        <div id="clienteExistente">
                            <div class="form-group">
                                <label class="form-label">Selecione o Cliente <span class="required">*</span></label>
                                <select class="form-control" id="clienteId" onchange="preencherDadosCliente(this.value)">
                                    <option value="">-- Selecione um cliente --</option>
                                    <?php foreach ($clientes as $cliente): ?>
                                        <option value="<?php echo $cliente['id']; ?>"
                                                data-nome="<?php echo htmlspecialchars($cliente['nome']); ?>"
                                                data-tipo="<?php echo htmlspecialchars($cliente['tipo']); ?>"
                                                data-email="<?php echo htmlspecialchars($cliente['email']); ?>"
                                                data-telefone="<?php echo htmlspecialchars($cliente['telefone']); ?>"
                                                data-nif="<?php echo htmlspecialchars($cliente['nif']); ?>"
                                                data-endereco="<?php echo htmlspecialchars($cliente['endereco']); ?>"
                                                data-responsavel="<?php echo htmlspecialchars($cliente['responsavel']); ?>">
                                            <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="cliente-preview" id="clientePreview" style="display: none;">
                                <div class="cliente-preview-avatar">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="cliente-preview-info">
                                    <h4 id="previewNome">-</h4>
                                    <div class="cliente-preview-meta">
                                        <span><i class="fas fa-envelope"></i> <span id="previewEmail">-</span></span>
                                        <span><i class="fas fa-phone"></i> <span id="previewTelefone">-</span></span>
                                        <span><i class="fas fa-id-card"></i> NIF: <span id="previewNif">-</span></span>
                                        <span><i class="fas fa-map-marker-alt"></i> <span id="previewEndereco">-</span></span>
                                        <span><i class="fas fa-user-circle"></i> <span id="previewResponsavel">-</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Novo Cliente -->
                        <div id="novoCliente" style="display: none;">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nome / Razão Social <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="novoClienteNome" 
                                           placeholder="Ex: Empresa XYZ Lda" maxlength="150">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tipo <span class="required">*</span></label>
                                    <select class="form-control" id="novoClienteTipo">
                                        <option value="">-- Selecione --</option>
                                        <option value="Empresa">Empresa</option>
                                        <option value="Instituição">Instituição</option>
                                        <option value="Profissional">Profissional</option>
                                        <option value="Particular">Particular</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" id="novoClienteEmail" 
                                           placeholder="cliente@email.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Telefone <span class="required">*</span></label>
                                    <input type="tel" class="form-control" id="novoClienteTelefone" 
                                           placeholder="+244 923 456 789">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">NIF</label>
                                    <input type="text" class="form-control" id="novoClienteNif" 
                                           placeholder="5417896321" maxlength="20">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Responsável</label>
                                    <input type="text" class="form-control" id="novoClienteResponsavel" 
                                           placeholder="Nome do responsável" maxlength="100">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="novoClienteEndereco" 
                                       placeholder="Rua, número, cidade" maxlength="200">
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
                                       value="<?php echo $numero_fatura; ?>" readonly>
                                <span class="form-help">Número gerado automaticamente</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Referência Externa</label>
                                <input type="text" class="form-control" id="referenciaExterna" 
                                       placeholder="Ex: FAT-2026-ABC-0156" maxlength="50">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Data de Emissão <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataEmissao" 
                                       value="<?php echo $data_hoje; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data de Vencimento <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataVencimento" 
                                       value="<?php echo $data_vencimento_padrao; ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Projeto Vinculado</label>
                                <select class="form-control" id="projetoVinculado" onchange="preencherProjeto(this.value)">
                                    <option value="">-- Nenhum projeto --</option>
                                    <?php foreach ($projetos as $projeto): ?>
                                        <option value="<?php echo $projeto['id']; ?>"
                                                data-nome="<?php echo htmlspecialchars($projeto['nome']); ?>"
                                                data-valor="<?php echo $projeto['valor']; ?>"
                                                data-cliente-id="<?php echo $projeto['cliente_id']; ?>">
                                            <?php echo $projeto['nome']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Condição de Pagamento</label>
                                <select class="form-control" id="condicaoPagamento">
                                    <option value="avista">À Vista</option>
                                    <option value="30-dias" selected>30 Dias</option>
                                    <option value="15-dias">15 Dias</option>
                                    <option value="60-dias">60 Dias</option>
                                    <option value="90-dias">90 Dias</option>
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
                            <p>Adicione os produtos ou serviços faturados</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="itens-container" id="itensContainer">
                            <!-- Item template (primeiro item) -->
                            <div class="item-fatura" data-item-id="1">
                                <div class="item-fatura-header">
                                    <span class="item-numero">Item #1</span>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="removerItem(1)" title="Remover item">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Descrição <span class="required">*</span></label>
                                    <input type="text" class="form-control item-descricao" 
                                           placeholder="Ex: Levantamento Topográfico Completo" 
                                           oninput="recalcularTotais()" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Detalhes</label>
                                    <textarea class="form-control item-detalhes" rows="2" 
                                              placeholder="Descrição detalhada do item (opcional)"
                                              oninput="recalcularTotais()"></textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Quantidade <span class="required">*</span></label>
                                        <input type="number" class="form-control item-quantidade" 
                                               value="1" min="1" step="1" 
                                               oninput="recalcularTotais()" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Unidade</label>
                                        <select class="form-control item-unidade" onchange="recalcularTotais()">
                                            <option value="Unidade">Unidade</option>
                                            <option value="Projeto" selected>Projeto</option>
                                            <option value="Hora">Hora</option>
                                            <option value="Dia">Dia</option>
                                            <option value="Hectare">Hectare</option>
                                            <option value="Km">Km</option>
                                            <option value="Mês">Mês</option>
                                            <option value="Relatório">Relatório</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Preço Unitário (Kz) <span class="required">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Kz</span>
                                            <input type="number" class="form-control item-preco" 
                                                   value="0" min="0" step="1000" 
                                                   oninput="recalcularTotais()" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Subtotal</label>
                                        <div class="item-subtotal-display">
                                            Kz <span class="item-subtotal">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-outline btn-add-item" onclick="adicionarItem()">
                            <i class="fas fa-plus"></i> Adicionar Item
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
                            <p>Resumo dos valores a pagar</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Desconto (Kz)</label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="desconto" 
                                           value="0" min="0" step="1000" 
                                           oninput="recalcularTotais()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Taxa de IVA (%)</label>
                                <select class="form-control" id="ivaPercentual" onchange="recalcularTotais()">
                                    <option value="0">Isento (0%)</option>
                                    <option value="14" selected>IVA Normal (14%)</option>
                                    <option value="7">IVA Reduzida (7%)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Resumo de valores -->
                        <div class="resumo-totais">
                            <div class="resumo-totais-item">
                                <span class="resumo-totais-label">Subtotal</span>
                                <span class="resumo-totais-value" id="resumoSubtotal">Kz 0</span>
                            </div>
                            <div class="resumo-totais-item">
                                <span class="resumo-totais-label">Desconto</span>
                                <span class="resumo-totais-value" id="resumoDesconto" style="color: #FF6B6B;">- Kz 0</span>
                            </div>
                            <div class="resumo-totais-item">
                                <span class="resumo-totais-label">IVA (<span id="resumoIvaPercentual">14</span>%)</span>
                                <span class="resumo-totais-value" id="resumoIva">Kz 0</span>
                            </div>
                            <div class="resumo-totais-item resumo-totais-total">
                                <span class="resumo-totais-label">TOTAL</span>
                                <span class="resumo-totais-value" id="resumoTotal">Kz 0</span>
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
                                       value="<?php echo htmlspecialchars($emitente_padrao['banco']); ?>" 
                                       maxlength="100">
                            </div>
                            <div class="form-group">
                                <label class="form-label">IBAN</label>
                                <input type="text" class="form-control" id="iban" 
                                       value="<?php echo htmlspecialchars($emitente_padrao['iban']); ?>" 
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
                                      maxlength="500"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Termos e Condições</label>
                            <textarea class="form-control" id="termos" rows="3" 
                                      placeholder="Termos e condições de pagamento..."
                                      maxlength="500">O pagamento deve ser efetuado até a data de vencimento. Após esse prazo, serão aplicados juros de mora de 1% ao mês.</textarea>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.7s;">
                    <a href="faturas.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="guardarRascunho()">
                        <i class="fas fa-save"></i> Guardar Rascunho
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check"></i> Criar Fatura
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // DADOS
        // ============================================
        let itemCounter = 1;
        let tipoCliente = 'existente';

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
        // FORMATAR MOEDA
        // ============================================
        function formatMoney(value) {
            return Math.round(value).toLocaleString('pt-AO').replace(/,/g, '.');
        }

        // ============================================
        // MUDAR TIPO DE CLIENTE
        // ============================================
        function mudarTipoCliente(tipo, event) {
            tipoCliente = tipo;

            document.querySelectorAll('.cliente-toggle .toggle-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            if (event && event.target) {
                event.target.closest('.toggle-btn').classList.add('active');
            }

            if (tipo === 'existente') {
                document.getElementById('clienteExistente').style.display = 'block';
                document.getElementById('novoCliente').style.display = 'none';
            } else {
                document.getElementById('clienteExistente').style.display = 'none';
                document.getElementById('novoCliente').style.display = 'block';
            }
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
            document.getElementById('previewEmail').textContent = option.dataset.email || '-';
            document.getElementById('previewTelefone').textContent = option.dataset.telefone || '-';
            document.getElementById('previewNif').textContent = option.dataset.nif || '-';
            document.getElementById('previewEndereco').textContent = option.dataset.endereco || '-';
            document.getElementById('previewResponsavel').textContent = option.dataset.responsavel || '-';

            preview.style.display = 'flex';
        }

        // ============================================
        // PREENCHER PROJETO
        // ============================================
        function preencherProjeto(projetoId) {
            if (!projetoId) return;

            const select = document.getElementById('projetoVinculado');
            const option = select.options[select.selectedIndex];
            const nome = option.dataset.nome;
            const valor = parseFloat(option.dataset.valor);
            const clienteId = option.dataset.clienteId;

            // Preencher o primeiro item com os dados do projeto
            const primeiroItem = document.querySelector('.item-fatura[data-item-id="1"]');
            if (primeiroItem) {
                primeiroItem.querySelector('.item-descricao').value = nome;
                primeiroItem.querySelector('.item-preco').value = valor;
            }

            // Se houver cliente vinculado ao projeto, selecioná-lo
            if (clienteId && tipoCliente === 'existente') {
                document.getElementById('clienteId').value = clienteId;
                preencherDadosCliente(clienteId);
            }

            recalcularTotais();
            mostrarToast('Projeto vinculado à fatura', 'info');
        }

        // ============================================
        // ADICIONAR ITEM
        // ============================================
        function adicionarItem() {
            itemCounter++;
            const container = document.getElementById('itensContainer');

            const itemHtml = `
                <div class="item-fatura" data-item-id="${itemCounter}">
                    <div class="item-fatura-header">
                        <span class="item-numero">Item #${itemCounter}</span>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removerItem(${itemCounter})" title="Remover item">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Descrição <span class="required">*</span></label>
                        <input type="text" class="form-control item-descricao" 
                               placeholder="Ex: Levantamento Topográfico Completo" 
                               oninput="recalcularTotais()" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Detalhes</label>
                        <textarea class="form-control item-detalhes" rows="2" 
                                  placeholder="Descrição detalhada do item (opcional)"
                                  oninput="recalcularTotais()"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Quantidade <span class="required">*</span></label>
                            <input type="number" class="form-control item-quantidade" 
                                   value="1" min="1" step="1" 
                                   oninput="recalcularTotais()" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Unidade</label>
                            <select class="form-control item-unidade" onchange="recalcularTotais()">
                                <option value="Unidade">Unidade</option>
                                <option value="Projeto" selected>Projeto</option>
                                <option value="Hora">Hora</option>
                                <option value="Dia">Dia</option>
                                <option value="Hectare">Hectare</option>
                                <option value="Km">Km</option>
                                <option value="Mês">Mês</option>
                                <option value="Relatório">Relatório</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Preço Unitário (Kz) <span class="required">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Kz</span>
                                <input type="number" class="form-control item-preco" 
                                       value="0" min="0" step="1000" 
                                       oninput="recalcularTotais()" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Subtotal</label>
                            <div class="item-subtotal-display">
                                Kz <span class="item-subtotal">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', itemHtml);
            recalcularTotais();
            mostrarToast('Item adicionado', 'info');
        }

        // ============================================
        // REMOVER ITEM
        // ============================================
        function removerItem(itemId) {
            const items = document.querySelectorAll('.item-fatura');
            
            if (items.length <= 1) {
                mostrarToast('Deve existir pelo menos 1 item', 'warning');
                return;
            }

            const item = document.querySelector(`.item-fatura[data-item-id="${itemId}"]`);
            if (item) {
                item.style.transition = 'all 0.3s ease';
                item.style.opacity = '0';
                item.style.transform = 'translateX(20px)';
                setTimeout(() => {
                    item.remove();
                    recalcularTotais();
                    mostrarToast('Item removido', 'info');
                }, 300);
            }
        }

        // ============================================
        // RECALCULAR TOTAIS
        // ============================================
        function recalcularTotais() {
            const items = document.querySelectorAll('.item-fatura');
            let subtotalGeral = 0;

            items.forEach(item => {
                const qtd = parseFloat(item.querySelector('.item-quantidade').value) || 0;
                const preco = parseFloat(item.querySelector('.item-preco').value) || 0;
                const subtotal = qtd * preco;

                item.querySelector('.item-subtotal').textContent = formatMoney(subtotal);
                subtotalGeral += subtotal;
            });

            const desconto = parseFloat(document.getElementById('desconto').value) || 0;
            const ivaPercentual = parseFloat(document.getElementById('ivaPercentual').value) || 0;

            const baseCalculo = Math.max(0, subtotalGeral - desconto);
            const ivaValor = baseCalculo * (ivaPercentual / 100);
            const total = baseCalculo + ivaValor;

            document.getElementById('resumoSubtotal').textContent = 'Kz ' + formatMoney(subtotalGeral);
            document.getElementById('resumoDesconto').textContent = '- Kz ' + formatMoney(desconto);
            document.getElementById('resumoIvaPercentual').textContent = ivaPercentual;
            document.getElementById('resumoIva').textContent = 'Kz ' + formatMoney(ivaValor);
            document.getElementById('resumoTotal').textContent = 'Kz ' + formatMoney(total);
        }

        // ============================================
        // VALIDAR E CRIAR FATURA
        // ============================================
        function criarFatura(event) {
            event.preventDefault();

            // Validar emitente
            const emitenteNome = document.getElementById('emitenteNome').value.trim();
            const emitenteNif = document.getElementById('emitenteNif').value.trim();

            if (!emitenteNome || !emitenteNif) {
                mostrarToast('Preencha os dados do emitente!', 'error');
                return;
            }

            // Validar cliente
            if (tipoCliente === 'existente') {
                const clienteId = document.getElementById('clienteId').value;
                if (!clienteId) {
                    mostrarToast('Selecione um cliente!', 'error');
                    document.getElementById('clienteId').focus();
                    return;
                }
            } else {
                const nome = document.getElementById('novoClienteNome').value.trim();
                const tipo = document.getElementById('novoClienteTipo').value;
                const email = document.getElementById('novoClienteEmail').value.trim();
                const telefone = document.getElementById('novoClienteTelefone').value.trim();

                if (!nome || !tipo || !email || !telefone) {
                    mostrarToast('Preencha todos os campos obrigatórios do novo cliente!', 'error');
                    return;
                }

                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    mostrarToast('Email do cliente inválido!', 'error');
                    return;
                }
            }

            // Validar datas
            const dataEmissao = document.getElementById('dataEmissao').value;
            const dataVencimento = document.getElementById('dataVencimento').value;

            if (new Date(dataVencimento) < new Date(dataEmissao)) {
                mostrarToast('A data de vencimento não pode ser anterior à data de emissão!', 'error');
                return;
            }

            // Validar itens
            const items = document.querySelectorAll('.item-fatura');
            let itensValidos = 0;
            let temErro = false;

            items.forEach(item => {
                const descricao = item.querySelector('.item-descricao').value.trim();
                const quantidade = parseFloat(item.querySelector('.item-quantidade').value);
                const preco = parseFloat(item.querySelector('.item-preco').value);

                if (descricao && quantidade > 0 && preco > 0) {
                    itensValidos++;
                } else if (descricao || quantidade > 0 || preco > 0) {
                    temErro = true;
                }
            });

            if (itensValidos === 0) {
                mostrarToast('Adicione pelo menos 1 item válido!', 'error');
                return;
            }

            if (temErro) {
                mostrarToast('Preencha todos os campos dos itens!', 'error');
                return;
            }

            // Simular criação
            const totalFatura = document.getElementById('resumoTotal').textContent;
            mostrarToast('Fatura criada com sucesso! Total: ' + totalFatura, 'success');

            setTimeout(() => {
                window.location.href = 'faturas.php';
            }, 1500);
        }

        // ============================================
        // GUARDAR RASCUNHO
        // ============================================
        function guardarRascunho() {
            mostrarToast('Rascunho guardado! Pode continuar mais tarde.', 'info');
        }

        // ============================================
        // INICIALIZAR
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            recalcularTotais();
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

    .toast .toast-content { display: flex; align-items: center; gap: 12px; flex: 1; }
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

    .header-left { flex: 1; min-width: 0; display: flex; flex-direction: column; gap: 6px; }

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

    textarea.form-control { resize: vertical; min-height: 60px; }

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
    }

    .input-group .form-control { border-radius: 0 var(--radius-sm) var(--radius-sm) 0; }

    /* ========================================== */
    /* CLIENTE TOGGLE                             */
    /* ========================================== */
    .cliente-toggle {
        display: flex;
        gap: 4px;
        background: var(--bg-input);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        padding: 4px;
        margin-bottom: var(--space-md);
    }

    .toggle-btn {
        flex: 1;
        padding: 10px 16px;
        background: transparent;
        border: none;
        border-radius: var(--radius-sm);
        color: var(--text-muted);
        font-family: var(--font-body);
        font-size: var(--text-sm);
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition-smooth);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .toggle-btn:hover { color: var(--text-primary); background: var(--bg-card-hover); }

    .toggle-btn.active {
        background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
        color: #FFFFFF;
        box-shadow: 0 4px 12px rgba(0, 210, 255, 0.25);
    }

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

    .cliente-preview-meta span i { color: #00D2FF; }

    /* ========================================== */
    /* ITENS DA FATURA                            */
    /* ========================================== */
    .itens-container {
        display: flex;
        flex-direction: column;
        gap: var(--space-md);
        margin-bottom: var(--space-md);
    }

    .item-fatura {
        padding: var(--space-md);
        background: var(--bg-input);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        transition: var(--transition-smooth);
    }

    .item-fatura:hover { border-color: #00D2FF; }

    .item-fatura-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: var(--space-md);
        padding-bottom: var(--space-sm);
        border-bottom: 1px solid var(--border-color);
    }

    .item-numero {
        font-family: var(--font-display);
        font-size: var(--text-sm);
        font-weight: 700;
        color: #00D2FF;
    }

    .item-fatura .btn-sm {
        width: 30px;
        height: 30px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-sm);
    }

    .item-subtotal-display {
        display: flex;
        align-items: center;
        padding: 10px 14px;
        background: linear-gradient(135deg, rgba(0, 210, 255, 0.08) 0%, rgba(108, 43, 217, 0.05) 100%);
        border: 1px solid rgba(0, 210, 255, 0.2);
        border-radius: var(--radius-sm);
        font-family: var(--font-display);
        font-size: var(--text-h4);
        font-weight: 700;
        color: #00D2FF;
        min-height: 42px;
    }

    .btn-add-item {
        width: 100%;
        justify-content: center;
        padding: 12px;
        font-weight: 600;
        border-style: dashed;
        border-width: 2px;
    }

    .btn-add-item:hover {
        background: rgba(0, 210, 255, 0.05);
        border-color: #00D2FF;
        color: #00D2FF;
    }

    /* ========================================== */
    /* RESUMO TOTAIS                              */
    /* ========================================== */
    .resumo-totais {
        display: flex;
        flex-direction: column;
        gap: 2px;
        padding: var(--space-lg);
        background: linear-gradient(135deg, rgba(0, 210, 255, 0.05) 0%, rgba(108, 43, 217, 0.03) 100%);
        border: 2px solid rgba(0, 210, 255, 0.2);
        border-radius: var(--radius-md);
        margin-top: var(--space-md);
    }

    .resumo-totais-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        gap: var(--space-sm);
    }

    .resumo-totais-label {
        font-size: var(--text-sm);
        color: var(--text-muted);
    }

    .resumo-totais-value {
        font-size: var(--text-sm);
        font-weight: 600;
        color: var(--text-primary);
        text-align: right;
    }

    .resumo-totais-total {
        margin-top: var(--space-sm);
        padding-top: var(--space-md);
        border-top: 2px solid var(--border-color);
    }

    .resumo-totais-total .resumo-totais-label {
        font-family: var(--font-display);
        font-size: var(--text-h4);
        font-weight: 700;
        color: var(--text-primary);
    }

    .resumo-totais-total .resumo-totais-value {
        font-family: var(--font-display);
        font-size: var(--text-h2);
        font-weight: 700;
        color: #00D2FF;
    }

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
        .form-actions { flex-direction: column-reverse; }
        .form-actions .btn { width: 100%; justify-content: center; }
        .page-header { padding: var(--space-md); }
        .header-left h1 { font-size: var(--text-h2); }
        .cliente-preview { flex-direction: column; text-align: center; }
        .cliente-preview-meta { justify-content: center; }
    }

    @media (max-width: 480px) {
        .form-section-body { padding: var(--space-md); }
        .cliente-toggle { flex-direction: column; }
        .resumo-totais-total .resumo-totais-value { font-size: var(--text-h3); }
        .btn-theme { width: 36px; height: 36px; font-size: 14px; }
    }

    /* ========================================== */
    /* ANIMAÇÕES                                  */
    /* ========================================== */
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