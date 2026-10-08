<?php
// painel/individual/financeiro/transacao-criar.php - Criar Nova Transação
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Nova Transação';
$pagina_atual = 'transacao-criar';

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
    ['id' => 1, 'nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'email' => 'contato@construtoraabc.ao'],
    ['id' => 2, 'nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'email' => 'contato@industrialuanda.ao'],
    ['id' => 3, 'nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'email' => 'geral@luanda.gov.ao'],
    ['id' => 4, 'nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'email' => 'info@agronegocios.ao'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'email' => 'contato@mineracaoprogresso.ao'],
    ['id' => 6, 'nome' => 'Energia Futuro', 'tipo' => 'Empresa', 'email' => 'financas@energiafuturo.ao'],
    ['id' => 7, 'nome' => 'Instituto Técnico de Luanda', 'tipo' => 'Instituição', 'email' => 'financas@itl.ao'],
    ['id' => 8, 'nome' => 'Eng. Pedro Silva', 'tipo' => 'Profissional', 'email' => 'pedro.silva@email.com'],
];

// ============================================
// CATEGORIAS DE TRANSAÇÃO
// ============================================
$categorias = [
    ['id' => 'projetos', 'nome' => 'Projetos', 'icon' => 'fa-project-diagram', 'color' => '#6C2BD9', 'tipo' => 'receita'],
    ['id' => 'assinaturas', 'nome' => 'Assinaturas', 'icon' => 'fa-crown', 'color' => '#FFD93D', 'tipo' => 'receita'],
    ['id' => 'comissoes', 'nome' => 'Comissões', 'icon' => 'fa-handshake', 'color' => '#00D2FF', 'tipo' => 'receita'],
    ['id' => 'formacao', 'nome' => 'Formação', 'icon' => 'fa-graduation-cap', 'color' => '#A29BFE', 'tipo' => 'receita'],
    ['id' => 'licencas', 'nome' => 'Licenças', 'icon' => 'fa-key', 'color' => '#00FFA3', 'tipo' => 'receita'],
    ['id' => 'equipamentos', 'nome' => 'Equipamentos', 'icon' => 'fa-tools', 'color' => '#FF9F43', 'tipo' => 'despesa'],
    ['id' => 'servicos', 'nome' => 'Serviços', 'icon' => 'fa-concierge-bell', 'color' => '#FD79A8', 'tipo' => 'despesa'],
    ['id' => 'reembolsos', 'nome' => 'Reembolsos', 'icon' => 'fa-undo', 'color' => '#FF6B6B', 'tipo' => 'despesa'],
    ['id' => 'impostos', 'nome' => 'Impostos', 'icon' => 'fa-file-invoice-dollar', 'color' => '#00CEC9', 'tipo' => 'despesa'],
    ['id' => 'outros', 'nome' => 'Outros', 'icon' => 'fa-ellipsis-h', 'color' => '#6B7A8F', 'tipo' => 'ambos'],
];

// ============================================
// MÉTODOS DE PAGAMENTO
// ============================================
$metodos = [
    ['id' => 'multicaixa', 'nome' => 'Multicaixa', 'icon' => 'fa-credit-card', 'color' => '#00D2FF'],
    ['id' => 'transferencia', 'nome' => 'Transferência Bancária', 'icon' => 'fa-university', 'color' => '#6C2BD9'],
    ['id' => 'deposito', 'nome' => 'Depósito Bancário', 'icon' => 'fa-money-bill', 'color' => '#FFD93D'],
    ['id' => 'cartao', 'nome' => 'Cartão de Crédito', 'icon' => 'fa-credit-card', 'color' => '#FF6B6B'],
    ['id' => 'numerario', 'nome' => 'Numerário', 'icon' => 'fa-money-bill-wave', 'color' => '#00FFA3'],
    ['id' => 'paypal', 'nome' => 'PayPal', 'icon' => 'fa-paypal', 'color' => '#00CEC9'],
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('getNextTransactionCode')) {
    function getNextTransactionCode() {
        return 'TRX-' . date('Y') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
    }
}

$codigo_transacao = getNextTransactionCode();
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
                        <i class="fas fa-plus-circle icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="transacoes.php">Transações</a>
                        <span class="separator">/</span>
                        <span>Nova</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="transacoes.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formCriarTransacao" onsubmit="criarTransacao(event)">
                
                <!-- ========================================== -->
                <!-- ETAPA 1: TIPO DE TRANSAÇÃO                 -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-exchange-alt"></i> Tipo de Transação</h3>
                            <p>Selecione se é uma receita ou despesa</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="tipo-selector">
                            <div class="tipo-option receita" data-tipo="receita" onclick="selecionarTipo('receita')">
                                <div class="tipo-icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <div class="tipo-info">
                                    <span class="tipo-nome">Receita</span>
                                    <span class="tipo-desc">Dinheiro que entra</span>
                                </div>
                                <div class="tipo-check">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="tipo-option despesa" data-tipo="despesa" onclick="selecionarTipo('despesa')">
                                <div class="tipo-icon">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <div class="tipo-info">
                                    <span class="tipo-nome">Despesa</span>
                                    <span class="tipo-desc">Dinheiro que sai</span>
                                </div>
                                <div class="tipo-check">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="tipoTransacao" name="tipo" required>
                        <span class="form-error" id="errorTipo" style="display: none;">
                            <i class="fas fa-exclamation-circle"></i> Selecione o tipo de transação
                        </span>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 2: INFORMAÇÕES BÁSICAS              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="form-section-header">
                        <div class="section-number">2</div>
                        <div class="section-title">
                            <h3><i class="fas fa-info-circle"></i> Informações Básicas</h3>
                            <p>Dados principais da transação</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Referência</label>
                                <input type="text" class="form-control" id="referencia" 
                                       value="<?php echo $codigo_transacao; ?>" readonly>
                                <span class="form-help">Código gerado automaticamente</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data da Transação <span class="required">*</span></label>
                                <input type="datetime-local" class="form-control" id="dataTransacao" 
                                       value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição <span class="required">*</span></label>
                            <input type="text" class="form-control" id="descricao" 
                                   placeholder="Ex: Pagamento de Projeto - Levantamento Topográfico"
                                   required maxlength="200">
                            <span class="form-help">Descreva resumidamente o motivo da transação</span>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Valor <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="valor" 
                                           placeholder="0" min="0" step="100" required
                                           oninput="atualizarPreview(this.value)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data de Vencimento</label>
                                <input type="date" class="form-control" id="dataVencimento">
                                <span class="form-help">Opcional (para transações pendentes)</span>
                            </div>
                        </div>

                        <!-- Sugestões rápidas de valor -->
                        <div class="valor-sugestoes">
                            <span class="valor-sugestoes-label">Sugestões rápidas:</span>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(25000)">25.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(50000)">50.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(100000)">100.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(250000)">250.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(500000)">500.000</button>
                            <button type="button" class="valor-sugestao-btn" onclick="setValor(1000000)">1.000.000</button>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 3: CATEGORIA                         -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="form-section-header">
                        <div class="section-number">3</div>
                        <div class="section-title">
                            <h3><i class="fas fa-tag"></i> Categoria</h3>
                            <p>Classifique a transação para melhor organização</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="categorias-grid" id="categoriasGrid">
                            <?php foreach ($categorias as $cat): ?>
                                <div class="categoria-card" 
                                     data-categoria="<?php echo $cat['id']; ?>"
                                     data-tipo-categoria="<?php echo $cat['tipo']; ?>"
                                     onclick="selecionarCategoria('<?php echo $cat['id']; ?>')"
                                     style="--cat-color: <?php echo $cat['color']; ?>;">
                                    <div class="categoria-card-icon" style="background: <?php echo $cat['color']; ?>20; color: <?php echo $cat['color']; ?>;">
                                        <i class="fas <?php echo $cat['icon']; ?>"></i>
                                    </div>
                                    <span class="categoria-card-nome"><?php echo $cat['nome']; ?></span>
                                    <div class="categoria-card-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" id="categoriaTransacao" name="categoria" required>
                        <span class="form-error" id="errorCategoria" style="display: none;">
                            <i class="fas fa-exclamation-circle"></i> Selecione uma categoria
                        </span>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: CLIENTE E MÉTODO                  -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-user-tie"></i> Cliente e Método</h3>
                            <p>Quem está envolvido e como foi pago</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        
                        <!-- ===== CLIENTE ===== -->
                        <div class="form-group">
                            <label class="form-label">Selecione o Cliente <span class="required">*</span></label>
                            <select class="form-control" id="clienteId" onchange="verificarClienteSelecionado(this.value)">
                                <option value="">-- Selecione um cliente --</option>
                                <option value="outro" style="font-weight: 700; color: #FFD93D;">
                                    ⚠️ Outro (não está na lista)
                                </option>
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente['id']; ?>"
                                            data-nome="<?php echo $cliente['nome']; ?>"
                                            data-tipo="<?php echo $cliente['tipo']; ?>"
                                            data-email="<?php echo $cliente['email']; ?>">
                                        <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Campo "Outro Nome" (aparece quando escolhe "Outro") -->
                        <div class="form-group cliente-outro-input" id="clienteOutroInput" style="display: none;">
                            <label class="form-label">
                                <i class="fas fa-edit" style="color: #FFD93D;"></i>
                                Digite o Nome do Cliente <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="clienteOutroNome" 
                                   placeholder="Ex: Empresa XYZ Lda" maxlength="150">
                            <span class="form-help">
                                <i class="fas fa-info-circle"></i>
                                Este cliente não está registado. Será criado automaticamente.
                            </span>
                        </div>

                        <!-- Preview do Cliente Selecionado -->
                        <div class="cliente-preview" id="clientePreview" style="display: none;">
                            <div class="cliente-preview-avatar">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="cliente-preview-info">
                                <h4 id="previewNome">-</h4>
                                <div class="cliente-preview-meta">
                                    <span><i class="fas fa-tag"></i> <span id="previewTipo">-</span></span>
                                    <span><i class="fas fa-envelope"></i> <span id="previewEmail">-</span></span>
                                </div>
                            </div>
                        </div>

                        <!-- ===== MÉTODO DE PAGAMENTO ===== -->
                        <div class="form-group" style="margin-top: var(--space-md);">
                            <label class="form-label">Método de Pagamento <span class="required">*</span></label>
                            <select class="form-control" id="metodo" required onchange="atualizarResumoMetodo(this.value)">
                                <option value="">-- Selecione --</option>
                                <?php foreach ($metodos as $met): ?>
                                    <option value="<?php echo $met['nome']; ?>"><?php echo $met['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 5: STATUS E DETALHES                 -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-cog"></i> Status e Detalhes</h3>
                            <p>Estado atual e observações</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Status <span class="required">*</span></label>
                                <select class="form-control" id="status" required>
                                    <option value="concluido" selected>Concluído</option>
                                    <option value="pendente">Pendente</option>
                                    <option value="cancelado">Cancelado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Prioridade</label>
                                <select class="form-control" id="prioridade">
                                    <option value="baixa">Baixa</option>
                                    <option value="media" selected>Média</option>
                                    <option value="alta">Alta</option>
                                    <option value="urgente">Urgente</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoes" rows="3" 
                                      placeholder="Notas adicionais sobre esta transação..."
                                      maxlength="500"></textarea>
                            <div class="char-counter">
                                <span id="obsCount">0</span> / 500 caracteres
                            </div>
                        </div>

                        <!-- Anexar Comprovativo -->
                        <div class="form-group">
                            <label class="form-label">Comprovativo</label>
                            <div class="upload-area" onclick="document.getElementById('comprovativoInput').click()">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Clique para anexar comprovativo</span>
                                <small>PDF, JPG, PNG até 5MB</small>
                                <input type="file" id="comprovativoInput" accept=".pdf,.jpg,.jpeg,.png" 
                                       style="display: none;" onchange="previewComprovativo(event)">
                            </div>
                            <div class="comprovativo-preview" id="comprovativoPreview" style="display: none;">
                                <div class="comprovativo-info">
                                    <i class="fas fa-file-pdf" id="comprovativoIcon"></i>
                                    <span id="comprovativoNome">-</span>
                                    <span class="comprovativo-size" id="comprovativoTamanho">-</span>
                                </div>
                                <button type="button" class="comprovativo-remove" onclick="removerComprovativo()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- RESUMO FINAL                               -->
                <!-- ========================================== -->
                <section class="resumo-final animate-fade-up" style="animation-delay: 0.5s;">
                    <div class="resumo-final-header">
                        <i class="fas fa-receipt"></i>
                        <h3>Resumo da Transação</h3>
                    </div>
                    <div class="resumo-final-body">
                        <div class="resumo-final-item">
                            <span class="resumo-final-label">Tipo</span>
                            <span class="resumo-final-value" id="resumoTipo">-</span>
                        </div>
                        <div class="resumo-final-item">
                            <span class="resumo-final-label">Categoria</span>
                            <span class="resumo-final-value" id="resumoCategoria">-</span>
                        </div>
                        <div class="resumo-final-item">
                            <span class="resumo-final-label">Cliente</span>
                            <span class="resumo-final-value" id="resumoCliente">-</span>
                        </div>
                        <div class="resumo-final-item">
                            <span class="resumo-final-label">Método</span>
                            <span class="resumo-final-value" id="resumoMetodo">-</span>
                        </div>
                        <div class="resumo-final-item resumo-final-total">
                            <span class="resumo-final-label">Valor</span>
                            <span class="resumo-final-value resumo-final-valor" id="resumoValor">Kz 0</span>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.6s;">
                    <a href="transacoes.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="guardarRascunho()">
                        <i class="fas fa-save"></i> Guardar Rascunho
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check"></i> Criar Transação
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
            document.querySelectorAll('.tipo-option').forEach(el => {
                el.classList.remove('selected');
            });

            const el = document.querySelector(`.tipo-option[data-tipo="${tipo}"]`);
            if (el) {
                el.classList.add('selected');
                tipoAtual = tipo;
                document.getElementById('tipoTransacao').value = tipo;
                document.getElementById('errorTipo').style.display = 'none';

                filtrarCategoriasPorTipo(tipo);

                document.getElementById('resumoTipo').textContent = tipo === 'receita' ? 'Receita ↑' : 'Despesa ↓';
                document.getElementById('resumoTipo').style.color = tipo === 'receita' ? '#00FFA3' : '#FF6B6B';
            }
        }

        function filtrarCategoriasPorTipo(tipo) {
            document.querySelectorAll('.categoria-card').forEach(card => {
                const tipoCategoria = card.dataset.tipoCategoria;
                if (tipoCategoria === 'ambos' || tipoCategoria === tipo) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });

            document.querySelectorAll('.categoria-card').forEach(el => el.classList.remove('selected'));
            document.getElementById('categoriaTransacao').value = '';
            document.getElementById('resumoCategoria').textContent = '-';
        }

        // ============================================
        // SELECIONAR CATEGORIA
        // ============================================
        function selecionarCategoria(catId) {
            document.querySelectorAll('.categoria-card').forEach(el => {
                el.classList.remove('selected');
            });

            const card = document.querySelector(`.categoria-card[data-categoria="${catId}"]`);
            if (card) {
                card.classList.add('selected');
                document.getElementById('categoriaTransacao').value = catId;
                document.getElementById('errorCategoria').style.display = 'none';

                const nome = card.querySelector('.categoria-card-nome').textContent;
                document.getElementById('resumoCategoria').textContent = nome;
            }
        }

        // ============================================
        // VALOR E PREVIEW
        // ============================================
        function setValor(valor) {
            document.getElementById('valor').value = valor;
            atualizarPreview(valor);
        }

        function atualizarPreview(valor) {
            const v = parseFloat(valor) || 0;
            document.getElementById('resumoValor').textContent = 'Kz ' + v.toLocaleString('pt-AO').replace(/,/g, '.');
        }

        // ============================================
        // VERIFICAR CLIENTE SELECIONADO
        // ============================================
        function verificarClienteSelecionado(valor) {
            const outroInput = document.getElementById('clienteOutroInput');
            const preview = document.getElementById('clientePreview');
            const resumo = document.getElementById('resumoCliente');

            if (valor === 'outro') {
                outroInput.style.display = 'flex';
                preview.style.display = 'none';
                document.getElementById('clienteOutroNome').focus();
                document.getElementById('clienteOutroNome').value = '';
                resumo.textContent = '-';
            } else if (valor === '') {
                outroInput.style.display = 'none';
                preview.style.display = 'none';
                resumo.textContent = '-';
            } else {
                outroInput.style.display = 'none';
                
                const option = document.getElementById('clienteId').options[document.getElementById('clienteId').selectedIndex];
                document.getElementById('previewNome').textContent = option.dataset.nome || '-';
                document.getElementById('previewTipo').textContent = option.dataset.tipo || '-';
                document.getElementById('previewEmail').textContent = option.dataset.email || '-';
                preview.style.display = 'flex';

                resumo.textContent = option.dataset.nome || '-';
            }
        }

        // ============================================
        // INPUT "OUTRO NOME" - Atualizar resumo em tempo real
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const clienteOutroNome = document.getElementById('clienteOutroNome');
            if (clienteOutroNome) {
                clienteOutroNome.addEventListener('input', function() {
                    document.getElementById('resumoCliente').textContent = this.value || '-';
                });
            }
        });

        // ============================================
        // MÉTODO PREVIEW
        // ============================================
        function atualizarResumoMetodo(valor) {
            document.getElementById('resumoMetodo').textContent = valor || '-';
        }

        // ============================================
        // CONTADOR DE CARACTERES
        // ============================================
        document.getElementById('observacoes')?.addEventListener('input', function() {
            document.getElementById('obsCount').textContent = this.value.length;
        });

        // ============================================
        // COMPROVATIVO UPLOAD
        // ============================================
        let comprovativoSelecionado = null;

        function previewComprovativo(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (file.size > 5 * 1024 * 1024) {
                mostrarToast('O comprovativo deve ter no máximo 5MB', 'error');
                return;
            }

            comprovativoSelecionado = file;

            const icon = document.getElementById('comprovativoIcon');
            const ext = file.name.split('.').pop().toLowerCase();

            if (ext === 'pdf') {
                icon.className = 'fas fa-file-pdf';
                icon.style.color = '#FF6B6B';
            } else if (['jpg', 'jpeg', 'png'].includes(ext)) {
                icon.className = 'fas fa-file-image';
                icon.style.color = '#FF9F43';
            } else {
                icon.className = 'fas fa-file';
                icon.style.color = '#6B7A8F';
            }

            document.getElementById('comprovativoNome').textContent = file.name;
            document.getElementById('comprovativoTamanho').textContent = (file.size / 1024).toFixed(1) + ' KB';
            document.getElementById('comprovativoPreview').style.display = 'flex';

            mostrarToast('Comprovativo adicionado!', 'success');
        }

        function removerComprovativo() {
            comprovativoSelecionado = null;
            document.getElementById('comprovativoInput').value = '';
            document.getElementById('comprovativoPreview').style.display = 'none';
        }

        // ============================================
        // VALIDAR E CRIAR TRANSAÇÃO
        // ============================================
        function criarTransacao(event) {
            event.preventDefault();

            // Validar tipo
            if (!tipoAtual) {
                document.getElementById('errorTipo').style.display = 'flex';
                mostrarToast('Selecione o tipo de transação!', 'error');
                document.querySelector('.tipo-selector').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Validar descrição
            const descricao = document.getElementById('descricao').value.trim();
            if (!descricao) {
                mostrarToast('Insira a descrição da transação!', 'error');
                document.getElementById('descricao').focus();
                return;
            }

            // Validar valor
            const valor = parseFloat(document.getElementById('valor').value);
            if (!valor || valor <= 0) {
                mostrarToast('Insira um valor válido!', 'error');
                document.getElementById('valor').focus();
                return;
            }

            // Validar categoria
            const categoria = document.getElementById('categoriaTransacao').value;
            if (!categoria) {
                document.getElementById('errorCategoria').style.display = 'flex';
                mostrarToast('Selecione uma categoria!', 'error');
                document.getElementById('categoriasGrid').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Validar cliente
            const clienteSelect = document.getElementById('clienteId').value;
            
            if (!clienteSelect) {
                mostrarToast('Selecione um cliente!', 'error');
                document.getElementById('clienteId').focus();
                return;
            }

            let clienteValor = null;
            let clienteNome = '';

            if (clienteSelect === 'outro') {
                const outroNome = document.getElementById('clienteOutroNome').value.trim();
                if (!outroNome) {
                    mostrarToast('Digite o nome do cliente!', 'error');
                    document.getElementById('clienteOutroNome').focus();
                    return;
                }
                clienteValor = 'outro';
                clienteNome = outroNome;
            } else {
                const option = document.getElementById('clienteId').options[document.getElementById('clienteId').selectedIndex];
                clienteValor = clienteSelect;
                clienteNome = option.dataset.nome;
            }

            // Validar método
            const metodo = document.getElementById('metodo').value;
            if (!metodo) {
                mostrarToast('Selecione um método de pagamento!', 'error');
                document.getElementById('metodo').focus();
                return;
            }

            // Recolher dados
            const transacaoData = {
                referencia: document.getElementById('referencia').value,
                tipo: tipoAtual,
                descricao: descricao,
                valor: valor,
                data: document.getElementById('dataTransacao').value,
                data_vencimento: document.getElementById('dataVencimento').value,
                categoria: categoria,
                cliente_valor: clienteValor,
                cliente_nome: clienteNome,
                metodo: metodo,
                status: document.getElementById('status').value,
                prioridade: document.getElementById('prioridade').value,
                observacoes: document.getElementById('observacoes').value.trim(),
                tem_comprovativo: comprovativoSelecionado ? true : false
            };

            console.log('Transação a criar:', transacaoData);

            mostrarToast('Transação criada com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'transacoes.php';
            }, 1500);
        }

        // ============================================
        // GUARDAR RASCUNHO
        // ============================================
        function guardarRascunho() {
            mostrarToast('Rascunho guardado! Pode continuar mais tarde.', 'info');
        }

        // ============================================
        // IMPEDIR SAÍDA ACIDENTAL
        // ============================================
        let formularioAlterado = false;

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input, textarea, select').forEach(el => {
                el.addEventListener('input', () => {
                    if (el.type !== 'hidden' && el.value && !el.readOnly) {
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

        .section-title p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
        }

        .form-section-body {
            padding: var(--space-lg);
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
            padding: var(--space-lg);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .tipo-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .tipo-option.receita:hover {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.04);
        }

        .tipo-option.despesa:hover {
            border-color: #FF6B6B;
            background: rgba(255, 107, 107, 0.04);
        }

        .tipo-option.receita.selected {
            border-color: #00FFA3;
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.12) 0%, rgba(0, 255, 163, 0.04) 100%);
            box-shadow: 0 0 0 4px rgba(0, 255, 163, 0.1);
        }

        .tipo-option.despesa.selected {
            border-color: #FF6B6B;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.12) 0%, rgba(255, 107, 107, 0.04) 100%);
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.1);
        }

        .tipo-icon {
            width: 56px;
            height: 56px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .tipo-option.receita .tipo-icon {
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
        }

        .tipo-option.despesa .tipo-icon {
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
        }

        .tipo-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .tipo-nome {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        .tipo-desc {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .tipo-check {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            opacity: 0;
            transform: scale(0);
            transition: var(--transition-bounce);
            flex-shrink: 0;
        }

        .tipo-option.receita .tipo-check { color: #00FFA3; }
        .tipo-option.despesa .tipo-check { color: #FF6B6B; }

        .tipo-option.selected .tipo-check {
            opacity: 1;
            transform: scale(1);
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
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
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

        .char-counter {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-align: right;
            margin-top: 4px;
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
            margin-top: var(--space-xs);
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
            border-color: #00D2FF;
            color: #00D2FF;
            background: rgba(0, 210, 255, 0.05);
            transform: translateY(-2px);
        }

        /* ========================================== */
        /* CATEGORIAS GRID                            */
        /* ========================================== */
        .categorias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: var(--space-sm);
        }

        .categoria-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
            text-align: center;
        }

        .categoria-card:hover {
            border-color: var(--cat-color);
            background: var(--bg-card-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .categoria-card.selected {
            border-color: var(--cat-color);
            background: linear-gradient(135deg, var(--cat-color)15 0%, transparent 100%);
            box-shadow: 0 0 0 3px var(--cat-color)20;
        }

        .categoria-card-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: var(--transition-smooth);
        }

        .categoria-card:hover .categoria-card-icon,
        .categoria-card.selected .categoria-card-icon {
            transform: scale(1.1);
        }

        .categoria-card-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .categoria-card-check {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--cat-color);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            opacity: 0;
            transform: scale(0);
            transition: var(--transition-bounce);
        }

        .categoria-card.selected .categoria-card-check {
            opacity: 1;
            transform: scale(1);
        }

        /* ===== INPUT "OUTRO NOME" ===== */
        .cliente-outro-input {
            padding: var(--space-md);
            background: rgba(255, 217, 61, 0.06);
            border: 1px solid rgba(255, 217, 61, 0.25);
            border-radius: var(--radius-md);
            margin-top: var(--space-md);
        }

        .cliente-outro-input .form-label {
            color: #FFD93D;
            font-weight: 600;
        }

        .cliente-outro-input .form-control {
            border-color: rgba(255, 217, 61, 0.3);
        }

        .cliente-outro-input .form-control:focus {
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.15);
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

        .cliente-preview-meta span i { color: #00D2FF; }

        /* ========================================== */
        /* UPLOAD AREA                                */
        /* ========================================== */
        .upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg);
            background: var(--bg-input);
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: center;
        }

        .upload-area:hover {
            border-color: #00D2FF;
            background: rgba(0, 210, 255, 0.02);
        }

        .upload-area i {
            font-size: 28px;
            color: #00D2FF;
        }

        .upload-area span {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .upload-area small {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-preview {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            margin-top: var(--space-sm);
        }

        .comprovativo-info {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex: 1;
            min-width: 0;
        }

        .comprovativo-info i { font-size: 20px; flex-shrink: 0; }

        .comprovativo-info span {
            font-size: var(--text-sm);
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .comprovativo-size {
            font-size: var(--text-xs);
            color: var(--text-muted);
            flex-shrink: 0;
        }

        .comprovativo-remove {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: transparent;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
            flex-shrink: 0;
        }

        .comprovativo-remove:hover {
            background: rgba(255, 107, 107, 0.1);
            color: #FF6B6B;
        }

        /* ========================================== */
        /* RESUMO FINAL                               */
        /* ========================================== */
        .resumo-final {
            background: linear-gradient(135deg, rgba(0, 210, 255, 0.06) 0%, rgba(108, 43, 217, 0.06) 100%);
            border: 2px solid rgba(0, 210, 255, 0.2);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .resumo-final-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid rgba(0, 210, 255, 0.15);
        }

        .resumo-final-header i {
            font-size: 24px;
            color: #00D2FF;
        }

        .resumo-final-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
        }

        .resumo-final-body {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
        }

        .resumo-final-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .resumo-final-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .resumo-final-value {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .resumo-final-total {
            grid-column: span 4;
            padding-top: var(--space-md);
            border-top: 1px solid rgba(0, 210, 255, 0.15);
            align-items: center;
            flex-direction: row;
            justify-content: space-between;
        }

        .resumo-final-total .resumo-final-label {
            font-size: var(--text-sm);
        }

        .resumo-final-valor {
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
            .resumo-final-body { grid-template-columns: repeat(2, 1fr); }
            .resumo-final-total { grid-column: span 2; }
        }

        @media (max-width: 768px) {
            .tipo-selector { grid-template-columns: 1fr; }
            .form-section-header { flex-direction: column; align-items: flex-start; }
            .section-number { width: 36px; height: 36px; font-size: 15px; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; justify-content: center; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
            .categorias-grid { grid-template-columns: repeat(2, 1fr); }
            .resumo-final-body { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 480px) {
            .form-section-body { padding: var(--space-md); }
            .categorias-grid { grid-template-columns: 1fr 1fr; }
            .resumo-final-body { grid-template-columns: 1fr; }
            .resumo-final-total { grid-column: span 1; flex-direction: column; align-items: flex-start; gap: var(--space-sm); }
            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
            .valor-sugestoes { flex-direction: column; align-items: stretch; }
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