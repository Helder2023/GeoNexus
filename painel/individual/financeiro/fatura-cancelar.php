<?php
// painel/individual/financeiro/fatura-cancelar.php - Cancelar Fatura
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Cancelar Fatura';
$pagina_atual = 'fatura-cancelar';

// ============================================
// FALLBACK - GARANTIR QUE AS VARIÁVEIS EXISTEM
// ============================================
if (!isset($profissional_atual)) {
    $profissional_atual = [
        'id' => 1,
        'nome' => 'Carlos Mendes',
        'email' => 'carlos.mendes@email.com',
        'avatar' => 'avatar-1.png',
        'profissao' => 'Engenheiro Topógrafo',
        'plano' => 'Pro',
        'plano_status' => 'ativo',
        'nivel' => 'Profissional Certificado',
        'avaliacao' => 4.8,
        'total_avaliacoes' => 42
    ];
}

if (!isset($notificacoes_count))         $notificacoes_count = 0;
if (!isset($total_transacoes))           $total_transacoes = 156;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;
if (!isset($total_faturas_pendentes))    $total_faturas_pendentes = 12;
if (!isset($total_orcamentos))           $total_orcamentos = 24;
if (!isset($total_clientes))             $total_clientes = 18;
if (!isset($total_metas))                $total_metas = 5;

// ============================================
// OBTER ID DA FATURA
// ============================================
$id_fatura = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - FATURA ATUAL
// ============================================
$fatura = [
    'id' => $id_fatura,
    'numero' => 'FT-2026-0156',
    'cliente' => [
        'id' => 1,
        'nome' => 'Município de Luanda',
        'tipo' => 'Instituição',
        'email' => 'geral@luanda.gov.ao',
        'telefone' => '+244 222 567 890',
        'nif' => '5417896323',
        'endereco' => 'Largo do Município, Luanda'
    ],
    'data_emissao' => '2026-02-10',
    'data_vencimento' => '2026-02-25',
    'valor_total' => 480000,
    'valor_pago' => 0,
    'status' => 'pendente',
    'status_label' => 'Pendente',
    'metodo_pagamento' => 'Transferência Bancária',
    'referencia' => 'FT-2026-0156',
    'descricao' => 'Serviços de Levantamento Topográfico - Zona Norte de Luanda',
    'itens' => [
        ['descricao' => 'Levantamento topográfico - 50 hectares', 'quantidade' => 50, 'preco' => 8000, 'subtotal' => 400000],
        ['descricao' => 'Geração de plantas em escala 1:1000', 'quantidade' => 1, 'preco' => 50000, 'subtotal' => 50000],
        ['descricao' => 'Relatório técnico detalhado', 'quantidade' => 1, 'preco' => 30000, 'subtotal' => 30000],
    ],
    'anexos' => [
        ['nome' => 'fatura-original.pdf', 'tipo' => 'pdf', 'tamanho' => '245 KB'],
        ['nome' => 'comprovativo-emissao.pdf', 'tipo' => 'pdf', 'tamanho' => '180 KB'],
    ],
    'data_criacao' => '2026-02-10 09:30:00',
    'criado_por' => 'Carlos Mendes'
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
            'paga' => 'status-paga',
            'pendente' => 'status-pendente',
            'vencida' => 'status-vencida',
            'cancelada' => 'status-cancelada'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
    }
}

if (!function_exists('getFileIcon')) {
    function getFileIcon($tipo) {
        $icons = [
            'pdf' => ['icon' => 'fa-file-pdf', 'color' => '#FF6B6B'],
            'doc' => ['icon' => 'fa-file-word', 'color' => '#2E86DE'],
            'docx' => ['icon' => 'fa-file-word', 'color' => '#2E86DE'],
            'xls' => ['icon' => 'fa-file-excel', 'color' => '#00B894'],
            'xlsx' => ['icon' => 'fa-file-excel', 'color' => '#00B894'],
            'jpg' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
            'jpeg' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
            'png' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
        ];
        return isset($icons[$tipo]) ? $icons[$tipo] : ['icon' => 'fa-file', 'color' => '#6B7A8F'];
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
                        <i class="fas fa-ban icon" style="color: #FF6B6B;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="faturas.php">Faturas</a>
                        <span class="separator">/</span>
                        <a href="fatura-detalhe.php?id=<?php echo $fatura['id']; ?>"><?php echo $fatura['numero']; ?></a>
                        <span class="separator">/</span>
                        <span style="color: #FF6B6B;">Cancelar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="fatura-detalhe.php?id=<?php echo $fatura['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- CONTEÚDO DE CANCELAMENTO                   -->
            <!-- ========================================== -->
            <div class="cancelar-container animate-fade-up">

                <!-- ===== ALERTA PRINCIPAL ===== -->
                <div class="cancelar-alerta-principal">
                    <div class="alerta-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alerta-conteudo">
                        <h2>Atenção! Cancelamento de Fatura</h2>
                        <p>Você está prestes a cancelar esta fatura. Esta ação é <strong>permanente</strong> e não pode ser desfeita.</p>
                    </div>
                </div>

                <!-- ===== CARD DA FATURA ===== -->
                <div class="cancelar-fatura-card">
                    <div class="fatura-card-header">
                        <div class="fatura-card-numero">
                            <div class="fatura-icon-header">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="fatura-info-header">
                                <span class="fatura-numero"><?php echo $fatura['numero']; ?></span>
                                <span class="fatura-emissao">
                                    <i class="far fa-calendar"></i> Emitida em <?php echo formatDate($fatura['data_emissao']); ?>
                                </span>
                            </div>
                        </div>
                        <div class="fatura-card-status">
                            <span class="badge-status <?php echo getStatusClass($fatura['status']); ?>">
                                <i class="fas fa-circle"></i>
                                <?php echo $fatura['status_label']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="fatura-card-body">
                        <!-- Cliente -->
                        <div class="fatura-seccao">
                            <h4 class="seccao-titulo">
                                <i class="fas fa-user-tie"></i>
                                Cliente
                            </h4>
                            <div class="cliente-info">
                                <div class="cliente-avatar">
                                    <i class="fas <?php echo $fatura['cliente']['tipo'] === 'Instituição' ? 'fa-university' : 'fa-building'; ?>"></i>
                                </div>
                                <div class="cliente-dados">
                                    <strong><?php echo $fatura['cliente']['nome']; ?></strong>
                                    <span class="cliente-tipo"><?php echo $fatura['cliente']['tipo']; ?></span>
                                    <div class="cliente-contactos">
                                        <span><i class="fas fa-envelope"></i> <?php echo $fatura['cliente']['email']; ?></span>
                                        <span><i class="fas fa-phone"></i> <?php echo $fatura['cliente']['telefone']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Detalhes Financeiros -->
                        <div class="fatura-seccao">
                            <h4 class="seccao-titulo">
                                <i class="fas fa-coins"></i>
                                Detalhes Financeiros
                            </h4>
                            <div class="financeiro-grid">
                                <div class="financeiro-item">
                                    <span class="financeiro-label">Valor Total</span>
                                    <span class="financeiro-valor">Kz <?php echo formatMoney($fatura['valor_total']); ?></span>
                                </div>
                                <div class="financeiro-item">
                                    <span class="financeiro-label">Valor Pago</span>
                                    <span class="financeiro-valor" style="color: #00FFA3;">Kz <?php echo formatMoney($fatura['valor_pago']); ?></span>
                                </div>
                                <div class="financeiro-item">
                                    <span class="financeiro-label">Valor Pendente</span>
                                    <span class="financeiro-valor" style="color: #FFD93D;">Kz <?php echo formatMoney($fatura['valor_total'] - $fatura['valor_pago']); ?></span>
                                </div>
                                <div class="financeiro-item">
                                    <span class="financeiro-label">Data de Vencimento</span>
                                    <span class="financeiro-valor"><?php echo formatDate($fatura['data_vencimento']); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Itens -->
                        <div class="fatura-seccao">
                            <h4 class="seccao-titulo">
                                <i class="fas fa-list-ul"></i>
                                Itens da Fatura
                            </h4>
                            <div class="itens-list">
                                <?php foreach ($fatura['itens'] as $item): ?>
                                    <div class="item-linha">
                                        <span class="item-descricao"><?php echo $item['descricao']; ?></span>
                                        <span class="item-quantidade"><?php echo $item['quantidade']; ?>x</span>
                                        <span class="item-preco">Kz <?php echo formatMoney($item['preco']); ?></span>
                                        <span class="item-subtotal">Kz <?php echo formatMoney($item['subtotal']); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== CONSEQUÊNCIAS DO CANCELAMENTO ===== -->
                <div class="cancelar-consequencias">
                    <div class="consequencias-header">
                        <i class="fas fa-info-circle"></i>
                        <h3>Ao cancelar esta fatura:</h3>
                    </div>
                    <div class="consequencias-lista">
                        <div class="consequencia-item">
                            <div class="consequencia-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div class="consequencia-conteudo">
                                <strong>A fatura será marcada como cancelada</strong>
                                <span>O estado mudará permanentemente para "Cancelada"</span>
                            </div>
                        </div>
                        <div class="consequencia-item">
                            <div class="consequencia-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="consequencia-conteudo">
                                <strong>Nota de crédito será emitida</strong>
                                <span>Se aplicável, uma nota de crédito de Kz <?php echo formatMoney($fatura['valor_total']); ?> será gerada</span>
                            </div>
                        </div>
                        <div class="consequencia-item">
                            <div class="consequencia-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="consequencia-conteudo">
                                <strong>Cliente será notificado</strong>
                                <span>Um email será enviado para <?php echo $fatura['cliente']['email']; ?></span>
                            </div>
                        </div>
                        <div class="consequencia-item">
                            <div class="consequencia-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="consequencia-conteudo">
                                <strong>Relatórios serão atualizados</strong>
                                <span>Esta fatura deixará de contar nos totais de faturação</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== AVISO FINANCEIRO ===== -->
                <?php if ($fatura['valor_pago'] > 0): ?>
                    <div class="cancelar-aviso-financeiro">
                        <div class="aviso-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="aviso-conteudo">
                            <strong>Atenção aos valores já pagos!</strong>
                            <span>
                                Esta fatura já possui <strong>Kz <?php echo formatMoney($fatura['valor_pago']); ?></strong> 
                                recebidos. Se cancelar, deverá emitir uma nota de crédito ou reembolsar o cliente.
                            </span>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- ===== FORMULÁRIO DE CANCELAMENTO ===== -->
                <form id="formCancelarFatura" onsubmit="cancelarFatura(event)">
                    <input type="hidden" id="faturaId" value="<?php echo $fatura['id']; ?>">

                    <div class="cancelar-formulario">
                        <div class="formulario-header">
                            <i class="fas fa-edit"></i>
                            <h3>Motivo do Cancelamento</h3>
                        </div>

                        <!-- Motivo -->
                        <div class="form-group">
                            <label class="form-label">Selecione o motivo <span class="required">*</span></label>
                            <div class="motivos-grid">
                                <label class="motivo-option">
                                    <input type="radio" name="motivo" value="erro_emissao" required>
                                    <span class="motivo-mark"></span>
                                    <div class="motivo-content">
                                        <i class="fas fa-exclamation-circle" style="color: #FF6B6B;"></i>
                                        <div>
                                            <strong>Erro na emissão</strong>
                                            <small>Dados incorretos na fatura</small>
                                        </div>
                                    </div>
                                </label>

                                <label class="motivo-option">
                                    <input type="radio" name="motivo" value="duplicada">
                                    <span class="motivo-mark"></span>
                                    <div class="motivo-content">
                                        <i class="fas fa-copy" style="color: #FFD93D;"></i>
                                        <div>
                                            <strong>Fatura duplicada</strong>
                                            <small>Já existe outra fatura válida</small>
                                        </div>
                                    </div>
                                </label>

                                <label class="motivo-option">
                                    <input type="radio" name="motivo" value="cliente_desistiu">
                                    <span class="motivo-mark"></span>
                                    <div class="motivo-content">
                                        <i class="fas fa-user-times" style="color: #FF9F43;"></i>
                                        <div>
                                            <strong>Cliente desistiu</strong>
                                            <small>Serviço cancelado pelo cliente</small>
                                        </div>
                                    </div>
                                </label>

                                <label class="motivo-option">
                                    <input type="radio" name="motivo" value="servico_nao_prestado">
                                    <span class="motivo-mark"></span>
                                    <div class="motivo-content">
                                        <i class="fas fa-ban" style="color: #6C2BD9;"></i>
                                        <div>
                                            <strong>Serviço não prestado</strong>
                                            <small>O serviço não foi realizado</small>
                                        </div>
                                    </div>
                                </label>

                                <label class="motivo-option">
                                    <input type="radio" name="motivo" value="acordo_mutuo">
                                    <span class="motivo-mark"></span>
                                    <div class="motivo-content">
                                        <i class="fas fa-handshake" style="color: #00D2FF;"></i>
                                        <div>
                                            <strong>Acordo mútuo</strong>
                                            <small>Cancelamento acordado entre as partes</small>
                                        </div>
                                    </div>
                                </label>

                                <label class="motivo-option">
                                    <input type="radio" name="motivo" value="outro">
                                    <span class="motivo-mark"></span>
                                    <div class="motivo-content">
                                        <i class="fas fa-ellipsis-h" style="color: #00FFA3;"></i>
                                        <div>
                                            <strong>Outro motivo</strong>
                                            <small>Especificar abaixo</small>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Descrição detalhada -->
                        <div class="form-group">
                            <label class="form-label">Descrição Detalhada <span class="required">*</span></label>
                            <textarea class="form-control" id="descricaoCancelamento" rows="4" 
                                      placeholder="Descreva o motivo detalhado do cancelamento (mínimo 20 caracteres)..."
                                      required minlength="20" maxlength="1000"
                                      oninput="atualizarContador(this.value)"></textarea>
                            <div class="char-counter">
                                <span id="descricaoCount">0</span> / 1000 caracteres
                                <span class="char-counter-min">Mínimo: 20 caracteres</span>
                            </div>
                        </div>

                        <!-- Opções adicionais -->
                        <div class="form-group">
                            <label class="form-label">Ações Adicionais</label>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" id="notificarCliente" checked>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-envelope" style="color: #00D2FF;"></i> Notificar cliente por email</strong>
                                        <small>Enviar email automático informando sobre o cancelamento</small>
                                    </div>
                                </label>

                                <label class="checkbox-item">
                                    <input type="checkbox" id="emitirNotaCredito" checked>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-file-invoice-dollar" style="color: #00FFA3;"></i> Emitir nota de crédito</strong>
                                        <small>Gerar nota de crédito no valor de Kz <?php echo formatMoney($fatura['valor_total']); ?></small>
                                    </div>
                                </label>

                                <label class="checkbox-item">
                                    <input type="checkbox" id="registarHistorico">
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-history" style="color: #FFD93D;"></i> Manter no histórico</strong>
                                        <small>Manter a fatura visível no histórico de faturas canceladas</small>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Confirmação de segurança -->
                        <div class="confirmacao-seguranca">
                            <h4>
                                <i class="fas fa-shield-alt"></i>
                                Confirmação de Segurança
                            </h4>
                            <p>Para confirmar o cancelamento, digite <strong>CANCELAR</strong> no campo abaixo:</p>

                            <div class="confirmacao-input-group">
                                <input type="text" 
                                       class="form-control" 
                                       id="confirmacaoTexto" 
                                       placeholder="Digite CANCELAR para confirmar"
                                       autocomplete="off"
                                       oninput="verificarConfirmacao(this.value)">
                                <div class="confirmacao-indicator" id="confirmacaoIndicator">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                            </div>

                            <div class="confirmacao-checkbox">
                                <input type="checkbox" id="confirmacaoFinal" onchange="verificarConfirmacao(document.getElementById('confirmacaoTexto').value)">
                                <label for="confirmacaoFinal">
                                    Compreendo que esta ação é <strong>permanente e irreversível</strong> e que a fatura será cancelada definitivamente.
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- ===== AÇÕES ===== -->
                    <div class="cancelar-acoes">
                        <a href="fatura-detalhe.php?id=<?php echo $fatura['id']; ?>" class="btn btn-outline btn-lg">
                            <i class="fas fa-arrow-left"></i> Cancelar
                        </a>
                        <button type="button" class="btn btn-secondary btn-lg" onclick="guardarRascunho()">
                            <i class="fas fa-save"></i> Guardar Rascunho
                        </button>
                        <button type="submit" 
                                class="btn btn-danger btn-lg" 
                                id="btnConfirmarCancelamento"
                                disabled>
                            <i class="fas fa-ban"></i> Cancelar Fatura
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO FINAL                 -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacaoFinal">
        <div class="modal-overlay" onclick="fecharModalFinal()"></div>
        <div class="modal-content modal-content-danger">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Última Confirmação
                </h3>
                <button class="modal-close" onclick="fecharModalFinal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-skull-crossbones"></i>
                    <div>
                        <strong>Esta é a sua última oportunidade de cancelar!</strong>
                        <span>Após clicar em "Cancelar Fatura", a ação será executada permanentemente.</span>
                    </div>
                </div>

                <p class="modal-texto">
                    Tem <strong>certeza absoluta</strong> que deseja cancelar a fatura
                </p>
                <p class="modal-projeto-nome">
                    "<?php echo $fatura['numero']; ?>"
                </p>

                <div class="modal-info-final">
                    <div class="info-final-item">
                        <span class="info-final-label">Cliente</span>
                        <span class="info-final-value"><?php echo $fatura['cliente']['nome']; ?></span>
                    </div>
                    <div class="info-final-item">
                        <span class="info-final-label">Valor</span>
                        <span class="info-final-value">Kz <?php echo formatMoney($fatura['valor_total']); ?></span>
                    </div>
                    <div class="info-final-item">
                        <span class="info-final-label">Motivo</span>
                        <span class="info-final-value" id="modalMotivo">-</span>
                    </div>
                </div>

                <p class="modal-aviso-final">
                    <i class="fas fa-info-circle"></i>
                    Um email de confirmação será enviado para <strong><?php echo $profissional_atual['email']; ?></strong>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalFinal()">
                    <i class="fas fa-times"></i> Não, Voltar
                </button>
                <button class="btn btn-danger" onclick="executarCancelamento()">
                    <i class="fas fa-ban"></i> Sim, Cancelar Fatura
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE PROCESSAMENTO                     -->
    <!-- ========================================== -->
    <div class="modal" id="modalProcessando">
        <div class="modal-overlay"></div>
        <div class="modal-content modal-content-processando">
            <div class="processando-conteudo">
                <div class="processando-spinner">
                    <div class="spinner-ring"></div>
                    <i class="fas fa-ban"></i>
                </div>
                <h3>A cancelar fatura...</h3>
                <p id="processandoTexto">A processar o cancelamento. Por favor, aguarde.</p>
                <div class="processando-progresso">
                    <div class="processando-progresso-fill" id="processandoProgresso"></div>
                </div>
                <span class="processando-percent" id="processandoPercent">0%</span>
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
        // CONTADOR DE CARACTERES
        // ============================================
        function atualizarContador(valor) {
            const count = document.getElementById('descricaoCount');
            count.textContent = valor.length;
            
            if (valor.length < 20) {
                count.style.color = '#FF6B6B';
            } else if (valor.length > 900) {
                count.style.color = '#FFD93D';
            } else {
                count.style.color = '#00FFA3';
            }
        }

        // ============================================
        // VERIFICAR CONFIRMAÇÃO
        // ============================================
        function verificarConfirmacao(valor) {
            const textoCorreto = valor.trim().toUpperCase() === 'CANCELAR';
            const checkboxMarcado = document.getElementById('confirmacaoFinal').checked;
            const btnConfirmar = document.getElementById('btnConfirmarCancelamento');
            const indicator = document.getElementById('confirmacaoIndicator');

            if (textoCorreto) {
                indicator.classList.add('valid');
                indicator.classList.remove('invalid');
                indicator.innerHTML = '<i class="fas fa-check-circle"></i>';
            } else if (valor.length > 0) {
                indicator.classList.add('invalid');
                indicator.classList.remove('valid');
                indicator.innerHTML = '<i class="fas fa-times-circle"></i>';
            } else {
                indicator.classList.remove('valid', 'invalid');
                indicator.innerHTML = '<i class="fas fa-times-circle"></i>';
            }

            btnConfirmar.disabled = !(textoCorreto && checkboxMarcado);
        }

        // ============================================
        // CANCELAR FATURA
        // ============================================
        function cancelarFatura(event) {
            event.preventDefault();

            // Validar motivo
            const motivoSelecionado = document.querySelector('input[name="motivo"]:checked');
            if (!motivoSelecionado) {
                mostrarToast('Selecione o motivo do cancelamento!', 'error');
                document.querySelector('.motivos-grid').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Validar descrição
            const descricao = document.getElementById('descricaoCancelamento').value.trim();
            if (descricao.length < 20) {
                mostrarToast('A descrição deve ter pelo menos 20 caracteres!', 'error');
                document.getElementById('descricaoCancelamento').focus();
                return;
            }

            // Validar confirmação
            const confirmacao = document.getElementById('confirmacaoTexto').value.trim().toUpperCase();
            if (confirmacao !== 'CANCELAR') {
                mostrarToast('Digite CANCELAR para confirmar!', 'error');
                document.getElementById('confirmacaoTexto').focus();
                return;
            }

            if (!document.getElementById('confirmacaoFinal').checked) {
                mostrarToast('Marque a caixa de confirmação!', 'error');
                return;
            }

            // Atualizar modal
            const motivoLabels = {
                'erro_emissao': 'Erro na emissão',
                'duplicada': 'Fatura duplicada',
                'cliente_desistiu': 'Cliente desistiu',
                'servico_nao_prestado': 'Serviço não prestado',
                'acordo_mutuo': 'Acordo mútuo',
                'outro': 'Outro motivo'
            };
            document.getElementById('modalMotivo').textContent = motivoLabels[motivoSelecionado.value] || 'Outro';

            // Abrir modal de confirmação final
            document.getElementById('modalConfirmacaoFinal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // ============================================
        // FECHAR MODAL FINAL
        // ============================================
        function fecharModalFinal() {
            document.getElementById('modalConfirmacaoFinal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // ============================================
        // EXECUTAR CANCELAMENTO
        // ============================================
        function executarCancelamento() {
            fecharModalFinal();

            // Mostrar modal de processamento
            const modalProcessando = document.getElementById('modalProcessando');
            modalProcessando.classList.add('active');

            // Simular progresso
            let progresso = 0;
            const progressoFill = document.getElementById('processandoProgresso');
            const progressoPercent = document.getElementById('processandoPercent');
            const processandoTexto = document.getElementById('processandoTexto');

            const etapas = [
                { perc: 20, texto: 'A validar dados da fatura...' },
                { perc: 40, texto: 'A marcar fatura como cancelada...' },
                { perc: 60, texto: 'A gerar nota de crédito...' },
                { perc: 80, texto: 'A notificar cliente por email...' },
                { perc: 95, texto: 'A atualizar relatórios...' },
                { perc: 100, texto: 'Fatura cancelada com sucesso!' }
            ];

            const interval = setInterval(() => {
                progresso += 2;
                if (progresso > 100) progresso = 100;

                progressoFill.style.width = progresso + '%';
                progressoPercent.textContent = progresso + '%';

                for (let i = etapas.length - 1; i >= 0; i--) {
                    if (progresso >= etapas[i].perc) {
                        processandoTexto.textContent = etapas[i].texto;
                        break;
                    }
                }

                if (progresso >= 100) {
                    clearInterval(interval);

                    setTimeout(() => {
                        modalProcessando.classList.remove('active');

                        sessionStorage.setItem('fatura_cancelada', JSON.stringify({
                            numero: '<?php echo addslashes($fatura['numero']); ?>',
                            cliente: '<?php echo addslashes($fatura['cliente']['nome']); ?>'
                        }));

                        window.location.href = 'faturas.php';
                    }, 800);
                }
            }, 60);
        }

        // ============================================
        // GUARDAR RASCUNHO
        // ============================================
        function guardarRascunho() {
            mostrarToast('Rascunho guardado! Pode continuar mais tarde.', 'info');
        }

        // ============================================
        // FECHAR MODAIS COM ESC
        // ============================================
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModalFinal();
            }
        });

        // ============================================
        // IMPEDIR SAÍDA ACIDENTAL
        // ============================================
        let formularioAlterado = false;

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input, textarea').forEach(el => {
                el.addEventListener('input', () => {
                    if (el.type !== 'hidden' && el.value && !el.readOnly) {
                        formularioAlterado = true;
                    }
                });
            });
        });

        window.addEventListener('beforeunload', function(e) {
            if (formularioAlterado && !document.getElementById('modalProcessando').classList.contains('active')) {
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
            background: linear-gradient(180deg, #FF6B6B 0%, #E55555 100%);
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

        .header-left h1 .icon { color: #FF6B6B; font-size: 0.85em; }

        .header-left .breadcrumb {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

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
        /* CONTAINER DE CANCELAMENTO                  */
        /* ========================================== */
        .cancelar-container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ========================================== */
        /* ALERTA PRINCIPAL                           */
        /* ========================================== */
        .cancelar-alerta-principal {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            padding: var(--space-lg) var(--space-xl);
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.12) 0%, rgba(255, 107, 107, 0.04) 100%);
            border: 2px solid rgba(255, 107, 107, 0.3);
            border-radius: var(--radius-lg);
            position: relative;
            overflow: hidden;
        }

        .cancelar-alerta-principal::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255, 107, 107, 0.03) 10px,
                rgba(255, 107, 107, 0.03) 20px
            );
            pointer-events: none;
        }

        .alerta-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
            animation: pulse-danger 2s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        .alerta-conteudo {
            flex: 1;
            position: relative;
            z-index: 1;
        }

        .alerta-conteudo h2 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: #FF6B6B;
            margin: 0 0 var(--space-xs) 0;
            font-weight: 700;
        }

        .alerta-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
        }

        .alerta-conteudo p strong { color: #FF6B6B; }

        /* ========================================== */
        /* CARD DA FATURA                             */
        /* ========================================== */
        .cancelar-fatura-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .fatura-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md) var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, rgba(255, 217, 61, 0.06) 0%, transparent 100%);
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .fatura-card-numero {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .fatura-icon-header {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .fatura-info-header {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .fatura-numero {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: 0.5px;
        }

        .fatura-emissao {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-status i { font-size: 6px; animation: pulse 2s ease-in-out infinite; }

        .badge-status.status-paga { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-vencida { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-cancelada { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        .fatura-card-body {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        .fatura-seccao {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .seccao-titulo {
            font-family: var(--font-title);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding-bottom: var(--space-sm);
            border-bottom: 1px solid var(--border-color);
        }

        .seccao-titulo i { color: #00D2FF; }

        /* ===== CLIENTE ===== */
        .cliente-info {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .cliente-avatar {
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

        .cliente-dados {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .cliente-dados strong {
            font-size: var(--text-body);
            font-weight: 700;
            color: var(--text-primary);
        }

        .cliente-tipo {
            font-size: var(--text-xs);
            color: #00D2FF;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cliente-contactos {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-md);
            margin-top: 4px;
        }

        .cliente-contactos span {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .cliente-contactos span i { color: #00D2FF; }

        /* ===== FINANCEIRO ===== */
        .financeiro-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
        }

        .financeiro-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .financeiro-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .financeiro-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ===== ITENS ===== */
        .itens-list {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .item-linha {
            display: grid;
            grid-template-columns: 1fr auto auto auto;
            gap: var(--space-md);
            padding: var(--space-sm) 0;
            border-bottom: 1px dashed var(--border-color);
            font-size: var(--text-sm);
            align-items: center;
        }

        .item-linha:last-child { border-bottom: none; }

        .item-descricao { color: var(--text-primary); }
        .item-quantidade { color: var(--text-muted); font-size: var(--text-xs); }
        .item-preco { color: var(--text-muted); font-size: var(--text-xs); min-width: 90px; text-align: right; }
        .item-subtotal { color: #00FFA3; font-weight: 700; font-family: var(--font-display); min-width: 100px; text-align: right; }

        /* ========================================== */
        /* CONSEQUÊNCIAS                              */
        /* ========================================== */
        .cancelar-consequencias {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-lg);
        }

        .consequencias-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .consequencias-header i {
            font-size: 20px;
            color: #FFD93D;
        }

        .consequencias-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
        }

        .consequencias-lista {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .consequencia-item {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .consequencia-item:hover {
            border-color: rgba(255, 107, 107, 0.3);
        }

        .consequencia-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .consequencia-conteudo {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .consequencia-conteudo strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
        }

        .consequencia-conteudo span {
            font-size: var(--text-xs);
            color: var(--text-muted);
            line-height: 1.4;
        }

        /* ========================================== */
        /* AVISO FINANCEIRO                           */
        /* ========================================== */
        .cancelar-aviso-financeiro {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            padding: var(--space-lg);
            background: rgba(255, 217, 61, 0.08);
            border: 1px solid rgba(255, 217, 61, 0.25);
            border-radius: var(--radius-lg);
        }

        .aviso-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .aviso-conteudo {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .aviso-conteudo strong {
            font-size: var(--text-sm);
            color: #FFD93D;
            font-weight: 700;
        }

        .aviso-conteudo span {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .aviso-conteudo span strong { color: #FFD93D; }

        /* ========================================== */
        /* FORMULÁRIO DE CANCELAMENTO                 */
        /* ========================================== */
        .cancelar-formulario {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 2px solid rgba(255, 107, 107, 0.3);
            padding: var(--space-xl);
            position: relative;
            overflow: hidden;
        }

        .cancelar-formulario::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #FF6B6B 0%, #E55555 100%);
        }

        .formulario-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-lg);
        }

        .formulario-header i {
            font-size: 20px;
            color: #FF6B6B;
        }

        .formulario-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
        }

        /* ===== MOTIVOS ===== */
        .motivos-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-sm);
        }

        .motivo-option {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .motivo-option:hover {
            border-color: #FF6B6B;
            background: rgba(255, 107, 107, 0.04);
        }

        .motivo-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .motivo-mark {
            width: 18px;
            height: 18px;
            border: 2px solid var(--border-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition-smooth);
            margin-top: 2px;
        }

        .motivo-option input[type="radio"]:checked + .motivo-mark {
            border-color: #FF6B6B;
            background: #FF6B6B;
        }

        .motivo-option input[type="radio"]:checked + .motivo-mark::after {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #FFFFFF;
        }

        .motivo-option input[type="radio"]:checked ~ .motivo-content {
            color: #FF6B6B;
        }

        .motivo-content {
            flex: 1;
            display: flex;
            gap: 8px;
            align-items: flex-start;
        }

        .motivo-content i {
            font-size: 16px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .motivo-content div {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .motivo-content strong {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .motivo-content small {
            font-size: 10px;
            color: var(--text-muted);
            line-height: 1.3;
        }

        /* ===== FORM GROUP ===== */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: var(--space-lg);
        }

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
            border-color: #FF6B6B;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        }

        .form-control::placeholder { color: var(--text-muted); }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .char-counter {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 4px;
        }

        .char-counter-min { color: #FFD93D; }

        /* ===== CHECKBOX GROUP ===== */
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .checkbox-item {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .checkbox-item:hover {
            border-color: #00FFA3;
            background: var(--bg-card-hover);
        }

        .checkbox-item input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .checkbox-mark {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition-smooth);
            margin-top: 2px;
        }

        .checkbox-item input[type="checkbox"]:checked + .checkbox-mark {
            background: #00FFA3;
            border-color: #00FFA3;
        }

        .checkbox-item input[type="checkbox"]:checked + .checkbox-mark::after {
            content: '✓';
            color: #0A1628;
            font-size: 12px;
            font-weight: bold;
        }

        .checkbox-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .checkbox-content strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
        }

        .checkbox-content small {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== CONFIRMAÇÃO DE SEGURANÇA ===== */
        .confirmacao-seguranca {
            background: rgba(255, 107, 107, 0.06);
            border: 2px dashed rgba(255, 107, 107, 0.3);
            border-radius: var(--radius-md);
            padding: var(--space-lg);
            margin-top: var(--space-lg);
        }

        .confirmacao-seguranca h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: #FF6B6B;
            margin: 0 0 var(--space-sm) 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .confirmacao-seguranca h4 i { font-size: 18px; }

        .confirmacao-seguranca > p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-md) 0;
            line-height: 1.5;
        }

        .confirmacao-seguranca > p strong {
            color: #FF6B6B;
            font-family: var(--font-display);
            letter-spacing: 1px;
        }

        .confirmacao-input-group {
            position: relative;
            margin-bottom: var(--space-md);
        }

        .confirmacao-input-group .form-control {
            width: 100%;
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 14px 50px 14px 16px;
            font-size: var(--text-body);
            color: var(--text-primary);
            font-family: var(--font-display);
            font-weight: 700;
            letter-spacing: 2px;
            text-align: center;
            text-transform: uppercase;
            transition: var(--transition-smooth);
        }

        .confirmacao-input-group .form-control:focus {
            outline: none;
            border-color: #FF6B6B;
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.1);
        }

        .confirmacao-input-group .form-control::placeholder {
            color: var(--text-muted);
            font-weight: 400;
            letter-spacing: 0.5px;
            text-transform: none;
            font-family: var(--font-body);
        }

        .confirmacao-indicator {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 22px;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            pointer-events: none;
        }

        .confirmacao-indicator.valid {
            color: #00FFA3;
            animation: pop 0.3s ease;
        }

        .confirmacao-indicator.invalid {
            color: #FF6B6B;
        }

        .confirmacao-checkbox {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-card);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .confirmacao-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #FF6B6B;
            cursor: pointer;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .confirmacao-checkbox label {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.5;
            cursor: pointer;
        }

        .confirmacao-checkbox label strong { color: #FF6B6B; }

        /* ===== AÇÕES FINAIS ===== */
        .cancelar-acoes {
            display: flex;
            justify-content: space-between;
            gap: var(--space-md);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .cancelar-acoes .btn {
            padding: 14px 28px;
            font-size: var(--text-body);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
        }

        .btn-lg { padding: 14px 28px; font-size: var(--text-body); }

        .btn-danger {
            background: linear-gradient(135deg, #FF6B6B 0%, #E55555 100%);
            color: #FFFFFF;
            border: none;
            box-shadow: 0 4px 16px rgba(255, 107, 107, 0.3);
        }

        .btn-danger:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 107, 107, 0.4);
        }

        .btn-danger:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            box-shadow: none;
        }

        /* ========================================== */
        /* MODAIS                                     */
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
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(6px);
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

        .modal-content-danger {
            border-color: rgba(255, 107, 107, 0.5);
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
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-title-danger { color: #FF6B6B; }

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

        .modal-alerta-danger i { font-size: 28px; color: #FF6B6B; flex-shrink: 0; }
        .modal-alerta-danger div { display: flex; flex-direction: column; gap: 4px; }
        .modal-alerta-danger strong { font-size: var(--text-sm); color: #FF6B6B; font-weight: 700; }
        .modal-alerta-danger span { font-size: var(--text-xs); color: var(--text-secondary); }

        .modal-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            text-align: center;
            line-height: 1.5;
        }

        .modal-texto strong { color: #FF6B6B; }

        .modal-projeto-nome {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FF6B6B;
            text-align: center;
            margin: 0 0 var(--space-lg) 0;
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border-radius: var(--radius-md);
            border: 2px dashed rgba(255, 107, 107, 0.4);
        }

        .modal-info-final {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-md);
        }

        .info-final-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            text-align: center;
        }

        .info-final-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-final-value {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-primary);
            word-break: break-word;
        }

        .modal-aviso-final {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: var(--space-sm) var(--space-md);
            background: rgba(0, 210, 255, 0.08);
            border-radius: var(--radius-sm);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.4;
        }

        .modal-aviso-final i { color: #00D2FF; flex-shrink: 0; }
        .modal-aviso-final strong { color: #00D2FF; }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 140px; justify-content: center; }

        /* ===== MODAL DE PROCESSAMENTO ===== */
        .modal-content-processando {
            max-width: 400px;
            border: 1px solid var(--border-color);
        }

        .processando-conteudo {
            padding: var(--space-xl);
            text-align: center;
        }

        .processando-spinner {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto var(--space-lg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .spinner-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 4px solid transparent;
            border-top-color: #FF6B6B;
            border-right-color: #FF6B6B;
            animation: spin 1.5s linear infinite;
        }

        .processando-spinner i {
            font-size: 32px;
            color: #FF6B6B;
            animation: pulse-danger 1.5s ease-in-out infinite;
        }

        .processando-conteudo h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .processando-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0 0 var(--space-lg) 0;
            min-height: 20px;
        }

        .processando-progresso {
            height: 8px;
            background: var(--bg-input);
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: var(--space-sm);
        }

        .processando-progresso-fill {
            height: 100%;
            background: linear-gradient(90deg, #FF6B6B 0%, #E55555 100%);
            border-radius: 4px;
            width: 0%;
            transition: width 0.3s ease;
        }

        .processando-percent {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FF6B6B;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .financeiro-grid { grid-template-columns: repeat(2, 1fr); }
            .consequencias-lista { grid-template-columns: 1fr; }
            .motivos-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .cancelar-alerta-principal {
                flex-direction: column;
                text-align: center;
                padding: var(--space-lg);
            }

            .alerta-icon {
                width: 56px;
                height: 56px;
                font-size: 24px;
            }

            .alerta-conteudo h2 { font-size: var(--text-h4); }

            .financeiro-grid { grid-template-columns: 1fr; }

            .motivos-grid { grid-template-columns: 1fr; }

            .item-linha {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .item-preco, .item-subtotal { text-align: left; }

            .cancelar-formulario { padding: var(--space-lg); }

            .cancelar-acoes { flex-direction: column; }

            .cancelar-acoes .btn { width: 100%; }

            .modal-info-final { grid-template-columns: 1fr; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }

            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
        }

        @media (max-width: 480px) {
            .cancelar-container { gap: var(--space-md); }

            .cancelar-alerta-principal { padding: var(--space-md); }

            .alerta-icon {
                width: 48px;
                height: 48px;
                font-size: 20px;
            }

            .alerta-conteudo h2 { font-size: var(--text-body); }

            .fatura-card-header { flex-direction: column; align-items: flex-start; }

            .fatura-numero { font-size: var(--text-h4); }

            .fatura-card-body { padding: var(--space-md); }

            .cliente-info { flex-direction: column; text-align: center; }
            .cliente-dados { align-items: center; }
            .cliente-contactos { justify-content: center; }

            .consequencia-item { flex-direction: column; text-align: center; }
            .consequencia-icon { margin: 0 auto; }

            .cancelar-formulario { padding: var(--space-md); }

            .confirmacao-input-group .form-control {
                padding: 12px 44px 12px 14px;
                font-size: var(--text-sm);
            }

            .confirmacao-indicator { right: 12px; font-size: 18px; }

            .cancelar-acoes { padding: var(--space-md); }

            .modal-body { padding: var(--space-lg); }

            .processando-spinner { width: 80px; height: 80px; }
            .processando-spinner i { font-size: 26px; }
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

        @keyframes pulse-danger {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

        @keyframes pop {
            0% { transform: translateY(-50%) scale(0.5); }
            50% { transform: translateY(-50%) scale(1.2); }
            100% { transform: translateY(-50%) scale(1); }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>