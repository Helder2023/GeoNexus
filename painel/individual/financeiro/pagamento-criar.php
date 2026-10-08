<?php
// painel/individual/financeiro/pagamento-criar.php - Criar Novo Pagamento
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Novo Pagamento';
$pagina_atual = 'pagamento-criar';

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// LISTA DE CLIENTES
// ============================================
$clientes = [
    ['id' => 1, 'nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'email' => 'contato@construtoraabc.ao', 'telefone' => '+244 222 345 678', 'nif' => '5417896321'],
    ['id' => 2, 'nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'email' => 'contato@industrialuanda.ao', 'telefone' => '+244 222 456 789', 'nif' => '5417896322'],
    ['id' => 3, 'nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'email' => 'geral@luanda.gov.ao', 'telefone' => '+244 222 567 890', 'nif' => '5417896323'],
    ['id' => 4, 'nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'email' => 'info@agronegocios.ao', 'telefone' => '+244 222 678 901', 'nif' => '5417896324'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'email' => 'contato@mineracaoprogresso.ao', 'telefone' => '+244 222 789 012', 'nif' => '5417896325'],
    ['id' => 6, 'nome' => 'Energia Futuro', 'tipo' => 'Empresa', 'email' => 'financas@energiafuturo.ao', 'telefone' => '+244 222 678 901', 'nif' => '5417896326'],
];

// ============================================
// LISTA DE PROJETOS
// ============================================
$projetos = [
    ['id' => 1, 'nome' => 'Levantamento Topográfico - Zona Norte', 'codigo' => 'PRJ-2026-0001', 'cliente_id' => 1, 'valor_total' => 350000],
    ['id' => 2, 'nome' => 'Mapeamento GIS - Área Industrial', 'codigo' => 'PRJ-2026-0002', 'cliente_id' => 2, 'valor_total' => 480000],
    ['id' => 3, 'nome' => 'Levantamento Planialtimétrico', 'codigo' => 'PRJ-2026-0003', 'cliente_id' => 3, 'valor_total' => 480000],
    ['id' => 4, 'nome' => 'Cadastro Rural - Fazenda Sunflower', 'codigo' => 'PRJ-2026-0004', 'cliente_id' => 4, 'valor_total' => 320000],
];

// ============================================
// LISTA DE FATURAS
// ============================================
$faturas = [
    ['id' => 1, 'numero' => 'FT-2026-0156', 'cliente_id' => 3, 'valor' => 480000],
    ['id' => 2, 'numero' => 'FT-2026-0150', 'cliente_id' => 2, 'valor' => 320000],
    ['id' => 3, 'numero' => 'FT-2026-0158', 'cliente_id' => 6, 'valor' => 195000],
];

// ============================================
// MÉTODOS DE PAGAMENTO
// ============================================
$metodos = [
    ['id' => 'Transferência Bancária', 'icon' => 'fa-university', 'cor' => '#00D2FF'],
    ['id' => 'Multicaixa', 'icon' => 'fa-credit-card', 'cor' => '#00FFA3'],
    ['id' => 'Depósito Bancário', 'icon' => 'fa-money-check-alt', 'cor' => '#6C2BD9'],
    ['id' => 'Numerário', 'icon' => 'fa-money-bill-wave', 'cor' => '#FFD93D'],
    ['id' => 'Cartão de Crédito', 'icon' => 'fa-credit-card', 'cor' => '#FF9F43'],
    ['id' => 'PayPal', 'icon' => 'fa-paypal', 'cor' => '#0070BA'],
    ['id' => 'Cheque', 'icon' => 'fa-money-check', 'cor' => '#FF6B6B'],
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('getNextPaymentCode')) {
    function getNextPaymentCode() {
        return 'PAG-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
    }
}

$codigo_pagamento = getNextPaymentCode();
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
                        <i class="fas fa-plus-circle icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="pagamentos.php">Pagamentos</a>
                        <span class="separator">/</span>
                        <span>Novo Pagamento</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="pagamentos.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formCriarPagamento" onsubmit="criarPagamento(event)" enctype="multipart/form-data">
                
                <!-- ========================================== -->
                <!-- ETAPA 1: TIPO DE MOVIMENTO                 -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-exchange-alt"></i> Tipo de Movimento</h3>
                            <p>Escolha o tipo de pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="tipo-selector">
                            <div class="tipo-option" data-tipo="recebimento" onclick="selecionarTipo('recebimento')">
                                <div class="tipo-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <div class="tipo-info">
                                    <span class="tipo-nome">Recebimento</span>
                                    <span class="tipo-desc">Cliente paga ao profissional (Entrada)</span>
                                </div>
                                <div class="tipo-check">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>

                            <div class="tipo-option" data-tipo="pagamento" onclick="selecionarTipo('pagamento')">
                                <div class="tipo-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <div class="tipo-info">
                                    <span class="tipo-nome">Pagamento</span>
                                    <span class="tipo-desc">Profissional paga a fornecedor (Saída)</span>
                                </div>
                                <div class="tipo-check">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="tipoSelecionado" required>
                        <span class="form-error" id="errorTipo" style="display: none;">
                            <i class="fas fa-exclamation-circle"></i> Selecione um tipo
                        </span>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 2: INFORMAÇÕES BÁSICAS               -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="form-section-header">
                        <div class="section-number">2</div>
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
                                       value="<?php echo $codigo_pagamento; ?>" readonly>
                                <span class="form-help">Código gerado automaticamente</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Referência <span class="required">*</span></label>
                                <input type="text" class="form-control" id="referenciaPagamento" 
                                       placeholder="Ex: TRF-2026-0045" required
                                       maxlength="50">
                                <span class="form-help">Referência do comprovativo ou transação</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição do Pagamento <span class="required">*</span></label>
                            <input type="text" class="form-control" id="descricaoPagamento" 
                                   placeholder="Ex: Pagamento Parcial - Projeto Zona Norte" required
                                   maxlength="200">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoesPagamento" rows="3" 
                                      placeholder="Notas adicionais sobre o pagamento"
                                      maxlength="500"></textarea>
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
                            <p>Associe o pagamento a um cliente e projeto</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">Cliente <span class="required">*</span></label>
                            <select class="form-control" id="clientePagamento" required onchange="atualizarClientePreview(); filtrarProjetosEFatura()">
                                <option value="">-- Selecione um cliente --</option>
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente['id']; ?>"
                                            data-nome="<?php echo $cliente['nome']; ?>"
                                            data-tipo="<?php echo $cliente['tipo']; ?>"
                                            data-email="<?php echo $cliente['email']; ?>"
                                            data-telefone="<?php echo $cliente['telefone']; ?>"
                                            data-nif="<?php echo $cliente['nif']; ?>">
                                        <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Preview do Cliente -->
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
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Projeto Associado</label>
                                <select class="form-control" id="projetoPagamento" onchange="atualizarValorTotal()">
                                    <option value="">-- Sem projeto associado --</option>
                                    <?php foreach ($projetos as $projeto): ?>
                                        <option value="<?php echo $projeto['id']; ?>"
                                                data-cliente="<?php echo $projeto['cliente_id']; ?>"
                                                data-valor="<?php echo $projeto['valor_total']; ?>">
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
                                                data-cliente="<?php echo $fatura['cliente_id']; ?>"
                                                data-valor="<?php echo $fatura['valor']; ?>">
                                            <?php echo $fatura['numero']; ?> (Kz <?php echo formatMoney($fatura['valor']); ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: MÉTODO E VALORES                  -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-coins"></i> Método e Valores</h3>
                            <p>Configure o método de pagamento e o valor</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <!-- Métodos de Pagamento -->
                        <div class="form-group">
                            <label class="form-label">Método de Pagamento <span class="required">*</span></label>
                            <div class="metodos-grid">
                                <?php foreach ($metodos as $metodo): ?>
                                    <div class="metodo-card"
                                         data-metodo="<?php echo $metodo['id']; ?>"
                                         onclick="selecionarMetodo('<?php echo $metodo['id']; ?>')"
                                         style="--metodo-color: <?php echo $metodo['cor']; ?>;">
                                        <div class="metodo-icon" style="background: <?php echo $metodo['cor']; ?>20; color: <?php echo $metodo['cor']; ?>;">
                                            <i class="fas <?php echo $metodo['icon']; ?>"></i>
                                        </div>
                                        <span class="metodo-nome"><?php echo $metodo['id']; ?></span>
                                        <div class="metodo-check">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <input type="hidden" id="metodoSelecionado" required>
                            <span class="form-error" id="errorMetodo" style="display: none;">
                                <i class="fas fa-exclamation-circle"></i> Selecione um método
                            </span>
                        </div>

                        <!-- Valores -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Valor do Pagamento <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="valorPagamento" 
                                           placeholder="0" min="0" step="1000" required
                                           oninput="calcularPercentual()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Valor Total do Projeto</label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="valorTotal" 
                                           placeholder="0" min="0" step="1000"
                                           oninput="calcularPercentual()">
                                </div>
                            </div>
                        </div>

                        <!-- Sugestões de valor -->
                        <div class="valor-sugestoes">
                            <span class="valor-sugestoes-label">Sugestões:</span>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(25000)">25.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(50000)">50.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(100000)">100.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(250000)">250.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(500000)">500.000</button>
                        </div>

                        <!-- Preview do progresso -->
                        <div class="progresso-pagamento-preview" id="progressoPreview" style="display: none;">
                            <div class="progresso-header">
                                <span class="progresso-label">Progresso do Pagamento</span>
                                <span class="progresso-percent" id="progressoPercent">0%</span>
                            </div>
                            <div class="progresso-barra">
                                <div class="progresso-fill" id="progressoFill" style="width: 0%;"></div>
                            </div>
                            <div class="progresso-info">
                                <span>Pago: <strong id="valorPago">Kz 0</strong></span>
                                <span>Restante: <strong id="valorRestante">Kz 0</strong></span>
                            </div>
                        </div>

                        <!-- Condições de pagamento -->
                        <div class="form-group">
                            <label class="form-label">Condições de Pagamento</label>
                            <select class="form-control" id="condicoesPagamento">
                                <option value="">-- Selecione --</option>
                                <option value="avista">À Vista</option>
                                <option value="50-50">50% Adiantado / 50% na Entrega</option>
                                <option value="30-70">30% Adiantado / 70% na Entrega</option>
                                <option value="parcelado">Parcelado</option>
                                <option value="negociavel">Negociável</option>
                            </select>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 5: DATAS E STATUS                    -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-calendar-alt"></i> Datas e Status</h3>
                            <p>Configure as datas e o status do pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Data de Vencimento <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataVencimento" 
                                       value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data de Pagamento</label>
                                <input type="datetime-local" class="form-control" id="dataPagamento">
                                <span class="form-help">Preencha se o pagamento já foi efetuado</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status Inicial</label>
                            <div class="status-selector">
                                <div class="status-option" data-status="pendente" onclick="selecionarStatus('pendente')">
                                    <div class="status-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <span class="status-nome">Pendente</span>
                                    <div class="status-check"><i class="fas fa-check-circle"></i></div>
                                </div>
                                <div class="status-option" data-status="pago" onclick="selecionarStatus('pago')">
                                    <div class="status-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <span class="status-nome">Pago</span>
                                    <div class="status-check"><i class="fas fa-check-circle"></i></div>
                                </div>
                                <div class="status-option" data-status="falhou" onclick="selecionarStatus('falhou')">
                                    <div class="status-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                    <span class="status-nome">Falhou</span>
                                    <div class="status-check"><i class="fas fa-check-circle"></i></div>
                                </div>
                            </div>
                            <input type="hidden" id="statusSelecionado" value="pendente">
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 6: COMPROVATIVO                      -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.5s;">
                    <div class="form-section-header">
                        <div class="section-number">6</div>
                        <div class="section-title">
                            <h3><i class="fas fa-paperclip"></i> Comprovativo</h3>
                            <p>Anexe o comprovativo do pagamento (opcional)</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="upload-area" onclick="document.getElementById('comprovativoInput').click()">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Clique para carregar o comprovativo</span>
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
                            <button type="button" class="btn btn-sm btn-danger" onclick="removerComprovativo()">
                                <i class="fas fa-times"></i> Remover
                            </button>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.6s;">
                    <a href="pagamentos.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="guardarRascunho()">
                        <i class="fas fa-save"></i> Guardar Rascunho
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check"></i> Criar Pagamento
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

            // Auto-selecionar pendente no status
            selecionarStatus('pendente');
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
        // SELECIONAR TIPO
        // ============================================
        let tipoAtual = null;

        function selecionarTipo(tipo) {
            document.querySelectorAll('.tipo-option').forEach(el => el.classList.remove('selected'));
            const option = document.querySelector(`.tipo-option[data-tipo="${tipo}"]`);
            if (option) {
                option.classList.add('selected');
                tipoAtual = tipo;
                document.getElementById('tipoSelecionado').value = tipo;
                document.getElementById('errorTipo').style.display = 'none';
            }
        }

        // ============================================
        // SELECIONAR MÉTODO
        // ============================================
        let metodoAtual = null;

        function selecionarMetodo(metodo) {
            document.querySelectorAll('.metodo-card').forEach(card => card.classList.remove('selected'));
            const card = document.querySelector(`.metodo-card[data-metodo="${metodo}"]`);
            if (card) {
                card.classList.add('selected');
                metodoAtual = metodo;
                document.getElementById('metodoSelecionado').value = metodo;
                document.getElementById('errorMetodo').style.display = 'none';
            }
        }

        // ============================================
        // SELECIONAR STATUS
        // ============================================
        function selecionarStatus(status) {
            document.querySelectorAll('.status-option').forEach(el => el.classList.remove('selected'));
            const option = document.querySelector(`.status-option[data-status="${status}"]`);
            if (option) {
                option.classList.add('selected');
                document.getElementById('statusSelecionado').value = status;
            }
        }

        // ============================================
        // CLIENTE PREVIEW
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
            document.getElementById('previewNif').textContent = option.dataset.nif || '-';

            preview.style.display = 'flex';
        }

        // ============================================
        // FILTRAR PROJETOS E FATURAS POR CLIENTE
        // ============================================
        function filtrarProjetosEFatura() {
            const clienteId = document.getElementById('clientePagamento').value;
            const projetoSelect = document.getElementById('projetoPagamento');
            const faturaSelect = document.getElementById('faturaPagamento');

            // Guardar opções originais
            if (!projetoSelect.dataset.original) {
                projetoSelect.dataset.original = projetoSelect.innerHTML;
            }
            if (!faturaSelect.dataset.original) {
                faturaSelect.dataset.original = faturaSelect.innerHTML;
            }

            if (!clienteId) {
                projetoSelect.innerHTML = projetoSelect.dataset.original;
                faturaSelect.innerHTML = faturaSelect.dataset.original;
                return;
            }

            // Filtrar projetos
            const projetosFiltrados = [];
            projetoSelect.querySelectorAll('option').forEach(opt => {
                if (opt.value === '' || opt.dataset.cliente === clienteId) {
                    projetosFiltrados.push(opt.outerHTML);
                }
            });
            projetoSelect.innerHTML = projetosFiltrados.join('');

            // Filtrar faturas
            const faturasFiltradas = [];
            faturaSelect.querySelectorAll('option').forEach(opt => {
                if (opt.value === '' || opt.dataset.cliente === clienteId) {
                    faturasFiltradas.push(opt.outerHTML);
                }
            });
            faturaSelect.innerHTML = faturasFiltradas.join('');
        }

        // ============================================
        // ATUALIZAR VALOR TOTAL
        // ============================================
        function atualizarValorTotal() {
            const projetoSelect = document.getElementById('projetoPagamento');
            const option = projetoSelect.options[projetoSelect.selectedIndex];

            if (projetoSelect.value && option.dataset.valor) {
                document.getElementById('valorTotal').value = option.dataset.valor;
                calcularPercentual();
            }
        }

        // ============================================
        // SET VALOR
        // ============================================
        function setValor(valor) {
            document.getElementById('valorPagamento').value = valor;
            calcularPercentual();
        }

        // ============================================
        // CALCULAR PERCENTUAL
        // ============================================
        function calcularPercentual() {
            const valor = parseFloat(document.getElementById('valorPagamento').value) || 0;
            const valorTotal = parseFloat(document.getElementById('valorTotal').value) || 0;
            const preview = document.getElementById('progressoPreview');

            if (valorTotal > 0 && valor > 0) {
                const percentual = Math.min(100, Math.round((valor / valorTotal) * 100));
                const restante = Math.max(0, valorTotal - valor);

                preview.style.display = 'block';
                document.getElementById('progressoPercent').textContent = percentual + '%';
                document.getElementById('progressoFill').style.width = percentual + '%';
                document.getElementById('valorPago').textContent = 'Kz ' + valor.toLocaleString('pt-AO').replace(/,/g, '.');
                document.getElementById('valorRestante').textContent = 'Kz ' + restante.toLocaleString('pt-AO').replace(/,/g, '.');
            } else {
                preview.style.display = 'none';
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

            iconPreview.style.background = icon.color + '20';
            iconPreview.style.color = icon.color;
            iconPreview.innerHTML = `<i class="fas ${icon.icon}"></i>`;
            document.getElementById('comprovativoNomePreview').textContent = file.name;
            document.getElementById('comprovativoTamanhoPreview').textContent = formatFileSize(file.size);
            preview.style.display = 'flex';

            mostrarToast('Comprovativo carregado!', 'success');
        }

        function removerComprovativo() {
            document.getElementById('comprovativoPreview').style.display = 'none';
            document.getElementById('comprovativoInput').value = '';
            mostrarToast('Comprovativo removido', 'info');
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
        // GUARDAR RASCUNHO
        // ============================================
        function guardarRascunho() {
            mostrarToast('Rascunho guardado! Pode continuar mais tarde.', 'info');
        }

        // ============================================
        // CRIAR PAGAMENTO
        // ============================================
        function criarPagamento(event) {
            event.preventDefault();

            // Validações
            const tipo = document.getElementById('tipoSelecionado').value;
            const referencia = document.getElementById('referenciaPagamento').value.trim();
            const descricao = document.getElementById('descricaoPagamento').value.trim();
            const clienteId = document.getElementById('clientePagamento').value;
            const metodo = document.getElementById('metodoSelecionado').value;
            const valor = parseFloat(document.getElementById('valorPagamento').value);
            const dataVencimento = document.getElementById('dataVencimento').value;

            if (!tipo) {
                document.getElementById('errorTipo').style.display = 'flex';
                mostrarToast('Selecione o tipo de movimento!', 'error');
                document.querySelector('.tipo-selector').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            if (!referencia) {
                mostrarToast('Insira a referência do pagamento!', 'error');
                document.getElementById('referenciaPagamento').focus();
                return;
            }

            if (!descricao) {
                mostrarToast('Insira a descrição do pagamento!', 'error');
                document.getElementById('descricaoPagamento').focus();
                return;
            }

            if (!clienteId) {
                mostrarToast('Selecione um cliente!', 'error');
                document.getElementById('clientePagamento').focus();
                return;
            }

            if (!metodo) {
                document.getElementById('errorMetodo').style.display = 'flex';
                mostrarToast('Selecione um método de pagamento!', 'error');
                document.querySelector('.metodos-grid').scrollIntoView({ behavior: 'smooth', block: 'center' });
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

            // Simular criação
            mostrarToast('Pagamento criado com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'pagamentos.php';
            }, 1500);
        }

        // ============================================
        // IMPEDIR SAÍDA ACIDENTAL
        // ============================================
        let formularioAlterado = false;

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formCriarPagamento');
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
        /* TIPO SELECTOR                              */
        /* ========================================== */
        .tipo-selector {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .tipo-option {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .tipo-option:hover {
            border-color: #00FFA3;
            transform: translateY(-2px);
        }

        .tipo-option.selected {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.06);
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
        }

        .tipo-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .tipo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .tipo-nome {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .tipo-desc {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .tipo-check {
            position: absolute;
            top: 6px;
            right: 6px;
            color: #00FFA3;
            font-size: 16px;
            opacity: 0;
            transform: scale(0);
            transition: var(--transition-bounce);
        }

        .tipo-option.selected .tipo-check {
            opacity: 1;
            transform: scale(1);
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
            border-color: var(--metodo-color, #00FFA3);
            transform: translateY(-2px);
        }

        .metodo-card.selected {
            border-color: var(--metodo-color, #00FFA3);
            background: color-mix(in srgb, var(--metodo-color, #00FFA3) 8%, transparent);
            box-shadow: 0 0 0 3px color-mix(in srgb, var(--metodo-color, #00FFA3) 15%, transparent);
        }

        .metodo-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .metodo-nome {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-primary);
        }

        .metodo-check {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--metodo-color, #00FFA3);
            color: #FFFFFF;
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
        /* STATUS SELECTOR                            */
        /* ========================================== */
        .status-selector {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-sm);
        }

        .status-option {
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
        }

        .status-option:hover {
            border-color: #00FFA3;
            transform: translateY(-2px);
        }

        .status-option.selected {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.06);
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
        }

        .status-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .status-nome {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-primary);
        }

        .status-check {
            position: absolute;
            top: 4px;
            right: 4px;
            color: #00FFA3;
            font-size: 14px;
            opacity: 0;
            transform: scale(0);
            transition: var(--transition-bounce);
        }

        .status-option.selected .status-check {
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
        /* VALOR SUGESTÕES                            */
        /* ========================================== */
        .valor-sugestoes {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
        }

        .valor-sugestoes-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .valor-sugestao-btn {
            padding: 6px 14px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .valor-sugestao-btn:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
            transform: translateY(-2px);
        }

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

        .comprovativo-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-sm);
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
            .tipo-selector { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .form-section-header { flex-direction: column; align-items: flex-start; }
            .section-number { width: 36px; height: 36px; font-size: 15px; }
            .metodos-grid { grid-template-columns: 1fr 1fr; }
            .status-selector { grid-template-columns: 1fr; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; justify-content: center; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
        }

        @media (max-width: 480px) {
            .metodos-grid { grid-template-columns: 1fr; }
            .form-section-body { padding: var(--space-md); }
            .cliente-preview { flex-direction: column; text-align: center; }
            .cliente-preview-meta { justify-content: center; }
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

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>