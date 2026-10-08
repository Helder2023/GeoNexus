<?php
// painel/individual/financeiro/pagamento-aprovar.php - Aprovar Pagamento
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Aprovar Pagamento';
$pagina_atual = 'pagamento-aprovar';

// ============================================
// OBTER ID DO PAGAMENTO
// ============================================
$id_pagamento = isset($_GET['id']) ? (int)$_GET['id'] : 2;

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// DADOS MOCKADOS - PAGAMENTO ATUAL
// ============================================
$pagamento = [
    'id' => $id_pagamento,
    'codigo' => 'PAG-2026-0002',
    'cliente' => 'Indústria Luanda',
    'cliente_avatar' => 'empresa-2.png',
    'cliente_tipo' => 'Empresa',
    'cliente_email' => 'contato@industrialuanda.ao',
    'cliente_telefone' => '+244 222 456 789',
    'descricao' => 'Pagamento Integral - Mapeamento GIS',
    'observacoes' => 'Pagamento referente ao mapeamento GIS completo da área industrial de Luanda.',
    'valor' => 480000,
    'valor_total' => 480000,
    'metodo' => 'Multicaixa',
    'metodo_icon' => 'fa-credit-card',
    'referencia' => 'MCX-2026-0078',
    'status' => 'pendente',
    'status_label' => 'Pendente',
    'data_criacao' => '2026-02-15 10:30:00',
    'data_vencimento' => '2026-02-25',
    'data_pagamento' => null,
    'comprovativo' => [
        'nome' => 'comprovativo-mcx-0078.pdf',
        'tamanho' => '1.8 MB',
        'tipo' => 'pdf',
        'data_upload' => '2026-02-18 16:45:00'
    ],
    'projeto' => [
        'id' => 2,
        'nome' => 'Mapeamento GIS - Área Industrial',
        'codigo' => 'PRJ-2026-0002'
    ],
    'fatura' => [
        'id' => 2,
        'numero' => 'FT-2026-0158'
    ],
    'tipo' => 'recebimento',
    'criado_por' => 'Sistema',
    'verificado_por' => null
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

if (!function_exists('timeAgo')) {
    function timeAgo($datetime) {
        if (empty($datetime)) return 'N/A';
        $diff = time() - strtotime($datetime);
        if ($diff < 60) return 'há ' . $diff . 's';
        if ($diff < 3600) return 'há ' . floor($diff / 60) . 'min';
        if ($diff < 86400) return 'há ' . floor($diff / 3600) . 'h';
        if ($diff < 604800) return 'há ' . floor($diff / 86400) . ' dias';
        return date('d/m/Y', strtotime($datetime));
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
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
                        <i class="fas fa-check-circle icon" style="color: #00FFA3;"></i>
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
                        <span style="color: #00FFA3;">Aprovar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- CONTEÚDO DE APROVAÇÃO                      -->
            <!-- ========================================== -->
            <div class="aprovar-container animate-fade-up">

                <!-- ===== ALERTA PRINCIPAL ===== -->
                <div class="aprovar-alerta-principal">
                    <div class="alerta-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="alerta-conteudo">
                        <h2>Confirmar Aprovação do Pagamento</h2>
                        <p>Verifique atentamente todos os dados abaixo antes de aprovar. Uma vez aprovado, o pagamento será <strong>registado no sistema</strong> e <strong>o cliente será notificado</strong>.</p>
                    </div>
                </div>

                <!-- ===== CARD DO PAGAMENTO ===== -->
                <div class="aprovar-pagamento-card">
                    <div class="pagamento-card-header">
                        <div class="pagamento-card-tipo" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                        <div class="pagamento-card-info">
                            <span class="pagamento-codigo"><?php echo $pagamento['codigo']; ?></span>
                            <span class="pagamento-tipo-label" style="color: #00FFA3;">
                                <?php echo $pagamento['tipo'] === 'recebimento' ? 'Recebimento' : 'Pagamento'; ?>
                            </span>
                        </div>
                        <div class="pagamento-card-status">
                            <span class="badge-status <?php echo getStatusClass($pagamento['status']); ?>">
                                <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                                <?php echo $pagamento['status_label']; ?>
                            </span>
                        </div>
                    </div>

                    <div class="pagamento-card-body">
                        <h3 class="pagamento-titulo"><?php echo $pagamento['descricao']; ?></h3>
                        <p class="pagamento-descricao"><?php echo $pagamento['observacoes']; ?></p>

                        <div class="pagamento-info-grid">
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-user-tie"></i>
                                    Cliente
                                </span>
                                <span class="info-value"><?php echo $pagamento['cliente']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-coins"></i>
                                    Valor
                                </span>
                                <span class="info-value" style="color: #00FFA3; font-weight: 700;">
                                    Kz <?php echo formatMoney($pagamento['valor']); ?>
                                </span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-credit-card"></i>
                                    Método
                                </span>
                                <span class="info-value"><?php echo $pagamento['metodo']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-hashtag"></i>
                                    Referência
                                </span>
                                <span class="info-value"><?php echo $pagamento['referencia']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="far fa-calendar"></i>
                                    Data de Vencimento
                                </span>
                                <span class="info-value"><?php echo formatDate($pagamento['data_vencimento']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-file-invoice"></i>
                                    Fatura
                                </span>
                                <span class="info-value"><?php echo $pagamento['fatura']['numero']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== COMPROVATIVO ===== -->
                <?php if ($pagamento['comprovativo']): ?>
                <div class="aprovar-comprovativo-card">
                    <div class="comprovativo-header">
                        <i class="fas fa-paperclip"></i>
                        <h3>Comprovativo Anexado</h3>
                        <span class="badge-anexo">
                            <i class="fas fa-check-circle"></i> Verificado
                        </span>
                    </div>
                    <div class="comprovativo-content">
                        <div class="comprovativo-preview-box">
                            <i class="fas fa-file-pdf"></i>
                            <span>PDF</span>
                        </div>
                        <div class="comprovativo-detalhes">
                            <span class="comprovativo-nome"><?php echo $pagamento['comprovativo']['nome']; ?></span>
                            <div class="comprovativo-meta">
                                <span><i class="fas fa-hdd"></i> <?php echo $pagamento['comprovativo']['tamanho']; ?></span>
                                <span><i class="far fa-clock"></i> <?php echo timeAgo($pagamento['comprovativo']['data_upload']); ?></span>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="visualizarComprovativo()">
                            <i class="fas fa-eye"></i> Visualizar
                        </button>
                    </div>
                </div>
                <?php endif; ?>

                <!-- ===== DADOS DA APROVAÇÃO ===== -->
                <div class="aprovar-form-card">
                    <div class="form-card-header">
                        <i class="fas fa-edit"></i>
                        <h3>Dados da Aprovação</h3>
                    </div>
                    <div class="form-card-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Data de Pagamento <span class="required">*</span></label>
                                <input type="datetime-local" class="form-control" id="dataPagamento" 
                                       value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                                <span class="form-help">Data em que o pagamento foi efetuado</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Verificado Por</label>
                                <input type="text" class="form-control" id="verificadoPor" 
                                       value="<?php echo $profissional_atual['nome']; ?>" readonly>
                                <span class="form-help">Nome do responsável pela aprovação</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Observações da Aprovação</label>
                            <textarea class="form-control" id="observacoesAprovacao" rows="3" 
                                      placeholder="Notas adicionais sobre a aprovação (opcional)"
                                      maxlength="500"></textarea>
                        </div>

                        <!-- Notificação -->
                        <div class="form-group">
                            <label class="form-label">Notificar Cliente</label>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" id="notificarCliente" checked>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-envelope" style="color: #00D2FF;"></i> Enviar Email</strong>
                                        <small>Notificar <?php echo $pagamento['cliente']; ?> que o pagamento foi aprovado</small>
                                    </div>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" id="enviarRecibo" checked>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-receipt" style="color: #00FFA3;"></i> Anexar Recibo</strong>
                                        <small>Enviar recibo do pagamento em anexo ao email</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== RESUMO FINANCEIRO ===== -->
                <div class="aprovar-resumo-card">
                    <div class="resumo-header">
                        <i class="fas fa-calculator"></i>
                        <h3>Resumo da Aprovação</h3>
                    </div>
                    <div class="resumo-content">
                        <div class="resumo-linha">
                            <span class="resumo-label">Valor do Pagamento</span>
                            <span class="resumo-valor" style="color: #00FFA3;">Kz <?php echo formatMoney($pagamento['valor']); ?></span>
                        </div>
                        <div class="resumo-linha">
                            <span class="resumo-label">Valor Total do Projeto</span>
                            <span class="resumo-valor">Kz <?php echo formatMoney($pagamento['valor_total']); ?></span>
                        </div>
                        <div class="resumo-linha resumo-linha-final">
                            <span class="resumo-label">Valor Pendente após Aprovação</span>
                            <span class="resumo-valor" style="color: #FFD93D; font-size: var(--text-h4);">
                                Kz <?php echo formatMoney(max(0, $pagamento['valor_total'] - $pagamento['valor'])); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- ===== AVISO ===== -->
                <div class="aprovar-aviso">
                    <div class="aviso-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="aviso-conteudo">
                        <strong>Confirmação de Aprovação</strong>
                        <span>
                            Ao aprovar este pagamento, ele será <strong>registado permanentemente</strong> no sistema, 
                            o status será alterado para <strong>"Pago"</strong> e o cliente será notificado automaticamente.
                        </span>
                    </div>
                </div>

                <!-- ===== AÇÕES ===== -->
                <div class="aprovar-acoes">
                    <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="aprovarComRejeicao()">
                        <i class="fas fa-times-circle"></i> Rejeitar
                    </button>
                    <button type="button" class="btn btn-success btn-lg" onclick="confirmarAprovacao()">
                        <i class="fas fa-check-circle"></i> Aprovar Pagamento
                    </button>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO FINAL                 -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacaoFinal">
        <div class="modal-overlay" onclick="fecharModalFinal()"></div>
        <div class="modal-content modal-content-success">
            <div class="modal-header modal-header-success">
                <h3 class="modal-title modal-title-success">
                    <i class="fas fa-check-circle"></i>
                    Confirmação Final
                </h3>
                <button class="modal-close" onclick="fecharModalFinal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-success">
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <strong>Tudo pronto para aprovar!</strong>
                        <span>Confirme os dados abaixo e clique em "Aprovar Agora" para finalizar.</span>
                    </div>
                </div>

                <p class="modal-texto">
                    Tem a certeza que deseja aprovar o pagamento
                </p>
                <p class="modal-pagamento-nome" id="modalPagamentoNome">
                    "<?php echo $pagamento['codigo']; ?> - <?php echo $pagamento['descricao']; ?>"
                </p>

                <div class="modal-info-final">
                    <div class="info-final-item">
                        <span class="info-final-label">Cliente</span>
                        <span class="info-final-value"><?php echo $pagamento['cliente']; ?></span>
                    </div>
                    <div class="info-final-item">
                        <span class="info-final-label">Valor</span>
                        <span class="info-final-value" style="color: #00FFA3;">Kz <?php echo formatMoney($pagamento['valor']); ?></span>
                    </div>
                    <div class="info-final-item">
                        <span class="info-final-label">Método</span>
                        <span class="info-final-value"><?php echo $pagamento['metodo']; ?></span>
                    </div>
                </div>

                <p class="modal-aviso-final">
                    <i class="fas fa-envelope"></i>
                    O cliente <strong><?php echo $pagamento['cliente']; ?></strong> será notificado por email.
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalFinal()">
                    <i class="fas fa-times"></i> Não, Cancelar
                </button>
                <button class="btn btn-success" onclick="executarAprovacao()">
                    <i class="fas fa-check"></i> Sim, Aprovar Agora
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
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>A aprovar pagamento...</h3>
                <p id="processandoTexto">A processar a aprovação. Por favor, aguarde.</p>
                <div class="processando-progresso">
                    <div class="processando-progresso-fill" id="processandoProgresso"></div>
                </div>
                <span class="processando-percent" id="processandoPercent">0%</span>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE REJEIÇÃO                          -->
    <!-- ========================================== -->
    <div class="modal" id="modalRejeicao">
        <div class="modal-overlay" onclick="fecharModalRejeicao()"></div>
        <div class="modal-content modal-content-danger">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-times-circle"></i>
                    Rejeitar Pagamento
                </h3>
                <button class="modal-close" onclick="fecharModalRejeicao()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>Atenção!</strong>
                        <span>Esta ação irá rejeitar o pagamento e o cliente será notificado.</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Motivo da Rejeição <span class="required">*</span></label>
                    <select class="form-control" id="motivoRejeicao" required>
                        <option value="">-- Selecione o motivo --</option>
                        <option value="Comprovativo ilegível ou inválido">Comprovativo ilegível ou inválido</option>
                        <option value="Valor incorreto">Valor incorreto</option>
                        <option value="Dados do cliente incorretos">Dados do cliente incorretos</option>
                        <option value="Pagamento duplicado">Pagamento duplicado</option>
                        <option value="Método de pagamento não aceite">Método de pagamento não aceite</option>
                        <option value="Outro motivo">Outro motivo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Descrição Adicional</label>
                    <textarea class="form-control" id="descricaoRejeicao" rows="3" 
                              placeholder="Detalhes adicionais sobre a rejeição (opcional)"
                              maxlength="500"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalRejeicao()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button class="btn btn-danger" onclick="executarRejeicao()">
                    <i class="fas fa-times-circle"></i> Rejeitar Pagamento
                </button>
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
        // VISUALIZAR COMPROVATIVO
        // ============================================
        function visualizarComprovativo() {
            mostrarToast('A abrir comprovativo...', 'info');
        }

        // ============================================
        // CONFIRMAR APROVAÇÃO
        // ============================================
        function confirmarAprovacao() {
            const dataPagamento = document.getElementById('dataPagamento').value;
            
            if (!dataPagamento) {
                mostrarToast('Insira a data de pagamento!', 'error');
                document.getElementById('dataPagamento').focus();
                return;
            }

            document.getElementById('modalConfirmacaoFinal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharModalFinal() {
            document.getElementById('modalConfirmacaoFinal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // ============================================
        // EXECUTAR APROVAÇÃO
        // ============================================
        function executarAprovacao() {
            fecharModalFinal();

            const modalProcessando = document.getElementById('modalProcessando');
            modalProcessando.classList.add('active');

            let progresso = 0;
            const progressoFill = document.getElementById('processandoProgresso');
            const progressoPercent = document.getElementById('processandoPercent');
            const processandoTexto = document.getElementById('processandoTexto');

            const etapas = [
                { perc: 20, texto: 'A verificar dados do pagamento...' },
                { perc: 40, texto: 'A atualizar status para "Pago"...' },
                { perc: 60, texto: 'A registar no sistema financeiro...' },
                { perc: 80, texto: 'A notificar o cliente...' },
                { perc: 95, texto: 'A finalizar aprovação...' },
                { perc: 100, texto: 'Pagamento aprovado com sucesso!' }
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

                        sessionStorage.setItem('pagamento_aprovado', JSON.stringify({
                            codigo: '<?php echo $pagamento['codigo']; ?>',
                            cliente: '<?php echo addslashes($pagamento['cliente']); ?>',
                            valor: '<?php echo formatMoney($pagamento['valor']); ?>'
                        }));

                        window.location.href = 'pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>&aprovado=1';
                    }, 800);
                }
            }, 60);
        }

        // ============================================
        // REJEIÇÃO
        // ============================================
        function aprovarComRejeicao() {
            document.getElementById('modalRejeicao').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharModalRejeicao() {
            document.getElementById('modalRejeicao').classList.remove('active');
            document.body.style.overflow = '';
        }

        function executarRejeicao() {
            const motivo = document.getElementById('motivoRejeicao').value;

            if (!motivo) {
                mostrarToast('Selecione um motivo de rejeição!', 'error');
                document.getElementById('motivoRejeicao').focus();
                return;
            }

            fecharModalRejeicao();
            mostrarToast('Pagamento rejeitado! Cliente será notificado.', 'warning');

            setTimeout(() => {
                window.location.href = 'pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>&rejeitado=1';
            }, 1500);
        }

        // ============================================
        // FECHAR MODAIS COM ESC
        // ============================================
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModalFinal();
                fecharModalRejeicao();
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
        /* CONTAINER DE APROVAÇÃO                     */
        /* ========================================== */
        .aprovar-container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ========================================== */
        /* ALERTA PRINCIPAL                           */
        /* ========================================== */
        .aprovar-alerta-principal {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            padding: var(--space-lg) var(--space-xl);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.12) 0%, rgba(0, 210, 255, 0.04) 100%);
            border: 2px solid rgba(0, 255, 163, 0.3);
            border-radius: var(--radius-lg);
            position: relative;
            overflow: hidden;
        }

        .aprovar-alerta-principal::before {
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
                rgba(0, 255, 163, 0.03) 10px,
                rgba(0, 255, 163, 0.03) 20px
            );
            pointer-events: none;
        }

        .alerta-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
            animation: pulse-success 2s ease-in-out infinite;
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
            color: #00FFA3;
            margin: 0 0 var(--space-xs) 0;
            font-weight: 700;
        }

        .alerta-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
        }

        .alerta-conteudo p strong { color: #00FFA3; }

        /* ========================================== */
        /* CARD DO PAGAMENTO                          */
        /* ========================================== */
        .aprovar-pagamento-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            position: relative;
        }

        .aprovar-pagamento-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #00FFA3 0%, #00D2FF 100%);
        }

        .pagamento-card-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.04) 0%, transparent 100%);
            flex-wrap: wrap;
        }

        .pagamento-card-tipo {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .pagamento-card-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .pagamento-codigo {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        .pagamento-tipo-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .badge-status.status-pago { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-falhou { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-cancelado { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        .pagamento-card-body {
            padding: var(--space-lg);
        }

        .pagamento-titulo {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
            line-height: 1.3;
        }

        .pagamento-descricao {
            font-size: var(--text-sm);
            color: var(--text-muted);
            line-height: 1.6;
            margin: 0 0 var(--space-lg) 0;
        }

        .pagamento-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-label i { color: #00FFA3; font-size: 12px; }

        .info-value {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* COMPROVATIVO                               */
        /* ========================================== */
        .aprovar-comprovativo-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-lg);
            position: relative;
        }

        .comprovativo-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .comprovativo-header i {
            font-size: 20px;
            color: #00FFA3;
        }

        .comprovativo-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            flex: 1;
        }

        .badge-anexo {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .comprovativo-content {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .comprovativo-preview-box {
            width: 60px;
            height: 60px;
            border-radius: var(--radius-md);
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            gap: 2px;
        }

        .comprovativo-preview-box span {
            font-size: 8px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .comprovativo-detalhes {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .comprovativo-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .comprovativo-meta {
            display: flex;
            gap: var(--space-md);
            font-size: var(--text-xs);
            color: var(--text-muted);
            flex-wrap: wrap;
        }

        /* ========================================== */
        /* FORMULÁRIO DE APROVAÇÃO                    */
        /* ========================================== */
        .aprovar-form-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .form-card-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: rgba(0, 255, 163, 0.02);
        }

        .form-card-header i {
            font-size: 20px;
            color: #00FFA3;
        }

        .form-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
        }

        .form-card-body {
            padding: var(--space-lg);
        }

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

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .form-help {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* Checkboxes */
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

        /* ========================================== */
        /* RESUMO FINANCEIRO                          */
        /* ========================================== */
        .aprovar-resumo-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 2px solid rgba(0, 255, 163, 0.3);
            overflow: hidden;
        }

        .resumo-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.08) 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
        }

        .resumo-header i {
            font-size: 20px;
            color: #00FFA3;
        }

        .resumo-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
        }

        .resumo-content {
            padding: var(--space-lg);
        }

        .resumo-linha {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) 0;
            border-bottom: 1px solid var(--border-color);
        }

        .resumo-linha:last-child { border-bottom: none; }

        .resumo-linha-final {
            padding-top: var(--space-md);
            margin-top: var(--space-sm);
            border-top: 2px solid var(--border-color);
        }

        .resumo-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .resumo-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* AVISO                                      */
        /* ========================================== */
        .aprovar-aviso {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            padding: var(--space-lg);
            background: rgba(0, 210, 255, 0.08);
            border: 1px solid rgba(0, 210, 255, 0.25);
            border-radius: var(--radius-lg);
        }

        .aviso-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            background: rgba(0, 210, 255, 0.15);
            color: #00D2FF;
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
            color: #00D2FF;
            font-weight: 700;
        }

        .aviso-conteudo span {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .aviso-conteudo span strong { color: #00FFA3; }

        /* ========================================== */
        /* AÇÕES FINAIS                               */
        /* ========================================== */
        .aprovar-acoes {
            display: flex;
            justify-content: space-between;
            gap: var(--space-md);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .aprovar-acoes .btn {
            padding: 14px 28px;
            font-size: var(--text-body);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
        }

        .btn-lg {
            padding: 14px 28px;
            font-size: var(--text-body);
        }

        .btn-success {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            border: none;
            box-shadow: 0 4px 16px rgba(0, 255, 163, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 255, 163, 0.4);
        }

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
            border: 2px solid rgba(0, 255, 163, 0.3);
            z-index: 10;
        }

        .modal-content-success {
            border-color: rgba(0, 255, 163, 0.5);
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

        .modal-header-success {
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.15) 0%, rgba(0, 255, 163, 0.05) 100%);
            border-bottom-color: rgba(0, 255, 163, 0.3);
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

        .modal-title-success { color: #00FFA3; }
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

        .modal-alerta-success {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(0, 255, 163, 0.08);
            border: 1px solid rgba(0, 255, 163, 0.25);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-lg);
        }

        .modal-alerta-success i { font-size: 28px; color: #00FFA3; flex-shrink: 0; }
        .modal-alerta-success div { display: flex; flex-direction: column; gap: 4px; }
        .modal-alerta-success strong { font-size: var(--text-sm); color: #00FFA3; }
        .modal-alerta-success span { font-size: var(--text-xs); color: var(--text-secondary); }

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
        .modal-alerta-danger strong { font-size: var(--text-sm); color: #FF6B6B; }
        .modal-alerta-danger span { font-size: var(--text-xs); color: var(--text-secondary); }

        .modal-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            text-align: center;
            line-height: 1.5;
        }

        .modal-texto strong { color: #00FFA3; }

        .modal-pagamento-nome {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
            text-align: center;
            margin: 0 0 var(--space-lg) 0;
            padding: var(--space-md);
            background: rgba(0, 255, 163, 0.08);
            border-radius: var(--radius-md);
            border: 2px dashed rgba(0, 255, 163, 0.4);
            line-height: 1.4;
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

        /* ========================================== */
        /* MODAL DE PROCESSAMENTO                     */
        /* ========================================== */
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
            border-top-color: #00FFA3;
            border-right-color: #00FFA3;
            animation: spin 1.5s linear infinite;
        }

        .processando-spinner i {
            font-size: 36px;
            color: #00FFA3;
            animation: pulse-success 1.5s ease-in-out infinite;
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
            background: linear-gradient(90deg, #00FFA3 0%, #00D2FF 100%);
            border-radius: 4px;
            width: 0%;
            transition: width 0.3s ease;
        }

        .processando-percent {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
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

        @keyframes pulse-success {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .form-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .aprovar-alerta-principal {
                flex-direction: column;
                text-align: center;
                padding: var(--space-lg);
            }

            .alerta-icon { width: 56px; height: 56px; font-size: 24px; }
            .alerta-conteudo h2 { font-size: var(--text-h4); }

            .pagamento-info-grid { grid-template-columns: 1fr; }

            .aprovar-acoes { flex-direction: column; }
            .aprovar-acoes .btn { width: 100%; }

            .modal-info-final { grid-template-columns: 1fr; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }

            .comprovativo-content { flex-direction: column; text-align: center; }

            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
        }

        @media (max-width: 480px) {
            .aprovar-container { gap: var(--space-md); }
            .aprovar-alerta-principal { padding: var(--space-md); }
            .alerta-icon { width: 48px; height: 48px; font-size: 20px; }
            .alerta-conteudo h2 { font-size: var(--text-body); }

            .pagamento-card-header { flex-direction: column; align-items: flex-start; }
            .pagamento-titulo { font-size: var(--text-h4); }

            .aprovar-acoes { padding: var(--space-md); }
            .modal-body { padding: var(--space-lg); }

            .processando-spinner { width: 80px; height: 80px; }
            .processando-spinner i { font-size: 26px; }

            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
        }
    </style>

</body>

</html>