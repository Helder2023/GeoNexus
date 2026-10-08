<?php
// painel/individual/financeiro/pagamento-excluir.php - Excluir Pagamento
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Excluir Pagamento';
$pagina_atual = 'pagamento-excluir';

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
    'cliente' => 'Construtora ABC',
    'cliente_avatar' => 'empresa-1.png',
    'cliente_tipo' => 'Empresa',
    'cliente_email' => 'financeiro@construtoraabc.ao',
    'descricao' => 'Pagamento Parcial - Projeto Zona Norte',
    'observacoes' => 'Pagamento referente à primeira fase do projeto de levantamento topográfico.',
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
    'projeto' => [
        'nome' => 'Levantamento Topográfico - Zona Norte',
        'codigo' => 'PRJ-2026-0001'
    ],
    'fatura' => [
        'numero' => 'FT-2026-0156'
    ],
    'tipo' => 'recebimento',
    'criado_por' => 'Carlos Mendes',
    'verificado_por' => 'Sistema'
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
                        <i class="fas fa-trash icon" style="color: #FF6B6B;"></i>
                        <?php echo $titulo_pagina; ?>
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
                        <span style="color: #FF6B6B;">Excluir</span>
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
            <!-- CONTEÚDO DE EXCLUSÃO                       -->
            <!-- ========================================== -->
            <div class="excluir-container animate-fade-up">

                <!-- ===== ALERTA PRINCIPAL ===== -->
                <div class="excluir-alerta-principal">
                    <div class="alerta-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alerta-conteudo">
                        <h2>Atenção! Ação Irreversível</h2>
                        <p>Você está prestes a excluir permanentemente este pagamento. Esta ação <strong>NÃO PODE</strong> ser desfeita.</p>
                    </div>
                </div>

                <!-- ===== CARD DO PAGAMENTO ===== -->
                <div class="excluir-pagamento-card">
                    <div class="pagamento-card-header">
                        <div class="pagamento-card-tipo" style="background: <?php echo $pagamento['tipo'] === 'recebimento' ? 'rgba(0, 255, 163, 0.15)' : 'rgba(255, 107, 107, 0.15)'; ?>; color: <?php echo $pagamento['tipo'] === 'recebimento' ? '#00FFA3' : '#FF6B6B'; ?>;">
                            <i class="fas fa-arrow-<?php echo $pagamento['tipo'] === 'recebimento' ? 'down' : 'up'; ?>"></i>
                        </div>
                        <div class="pagamento-card-info">
                            <span class="pagamento-codigo"><?php echo $pagamento['codigo']; ?></span>
                            <span class="pagamento-tipo-label" style="color: <?php echo $pagamento['tipo'] === 'recebimento' ? '#00FFA3' : '#FF6B6B'; ?>;">
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
                                    Data de Criação
                                </span>
                                <span class="info-value"><?php echo formatDateTime($pagamento['data_criacao']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-check-circle"></i>
                                    Data de Pagamento
                                </span>
                                <span class="info-value"><?php echo formatDateTime($pagamento['data_pagamento']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== LISTA DO QUE SERÁ EXCLUÍDO ===== -->
                <div class="excluir-lista-card">
                    <div class="lista-header">
                        <i class="fas fa-list-ul"></i>
                        <h3>Ao excluir este pagamento, os seguintes dados serão <strong>permanentemente removidos</strong>:</h3>
                    </div>

                    <div class="lista-itens">
                        <div class="lista-item">
                            <div class="lista-item-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="lista-item-conteudo">
                                <span class="lista-item-titulo">Registo do Pagamento</span>
                                <span class="lista-item-descricao">
                                    Todas as informações do pagamento serão eliminadas
                                </span>
                            </div>
                        </div>

                        <div class="lista-item">
                            <div class="lista-item-icon" style="background: rgba(255, 159, 67, 0.15); color: #FF9F43;">
                                <i class="fas fa-paperclip"></i>
                            </div>
                            <div class="lista-item-conteudo">
                                <span class="lista-item-titulo">Comprovativo Anexado</span>
                                <span class="lista-item-descricao">
                                    <?php if ($pagamento['comprovativo']): ?>
                                        <?php echo $pagamento['comprovativo']['nome']; ?> (<?php echo $pagamento['comprovativo']['tamanho']; ?>)
                                    <?php else: ?>
                                        Nenhum comprovativo anexado
                                    <?php endif; ?>
                                </span>
                            </div>
                            <span class="lista-item-count">
                                <?php echo $pagamento['comprovativo'] ? '1' : '0'; ?>
                            </span>
                        </div>

                        <div class="lista-item">
                            <div class="lista-item-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                <i class="fas fa-link"></i>
                            </div>
                            <div class="lista-item-conteudo">
                                <span class="lista-item-titulo">Vínculos</span>
                                <span class="lista-item-descricao">
                                    <?php if ($pagamento['projeto']): ?>
                                        Projeto: <?php echo $pagamento['projeto']['codigo']; ?>
                                    <?php endif; ?>
                                    <?php if ($pagamento['fatura']): ?>
                                        • Fatura: <?php echo $pagamento['fatura']['numero']; ?>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>

                        <div class="lista-item">
                            <div class="lista-item-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                                <i class="fas fa-history"></i>
                            </div>
                            <div class="lista-item-conteudo">
                                <span class="lista-item-titulo">Histórico de Alterações</span>
                                <span class="lista-item-descricao">
                                    Todos os registos de modificações serão eliminados
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== AVISO FINANCEIRO ===== -->
                <div class="excluir-aviso-financeiro">
                    <div class="aviso-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="aviso-conteudo">
                        <strong>Atenção aos valores financeiros!</strong>
                        <span>
                            Este pagamento representa <strong>Kz <?php echo formatMoney($pagamento['valor']); ?></strong> 
                            (<?php echo round(($pagamento['valor'] / $pagamento['valor_total']) * 100); ?>% do valor total do projeto).
                            A exclusão deste registo irá <strong>afetar os totais financeiros</strong> do sistema.
                        </span>
                    </div>
                </div>

                <!-- ===== CONFIRMAÇÃO ===== -->
                <div class="excluir-confirmacao">
                    <h3>
                        <i class="fas fa-shield-alt"></i>
                        Confirmação de Segurança
                    </h3>
                    <p>Para confirmar a exclusão, digite <strong>EXCLUIR</strong> no campo abaixo:</p>

                    <div class="confirmacao-input-group">
                        <input type="text" 
                               class="form-control" 
                               id="confirmacaoTexto" 
                               placeholder="Digite EXCLUIR para confirmar"
                               autocomplete="off"
                               oninput="verificarConfirmacao(this.value)">
                        <div class="confirmacao-indicator" id="confirmacaoIndicator">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>

                    <div class="confirmacao-checkbox">
                        <input type="checkbox" id="confirmacaoCheckbox" onchange="verificarConfirmacao(document.getElementById('confirmacaoTexto').value)">
                        <label for="confirmacaoCheckbox">
                            Compreendo que esta ação é <strong>permanente e irreversível</strong> e que todos os dados serão perdidos.
                        </label>
                    </div>
                </div>

                <!-- ===== AÇÕES ===== -->
                <div class="excluir-acoes">
                    <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                    <button type="button" 
                            class="btn btn-danger btn-lg" 
                            id="btnConfirmarExclusao"
                            disabled
                            onclick="confirmarExclusao()">
                        <i class="fas fa-trash"></i> Excluir Pagamento Permanentemente
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
                        <span>Após clicar em "Excluir Agora", o pagamento será eliminado permanentemente.</span>
                    </div>
                </div>

                <p class="modal-texto">
                    Tem <strong>certeza absoluta</strong> que deseja excluir o pagamento
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
                    <i class="fas fa-info-circle"></i>
                    Um email de confirmação será enviado para <strong><?php echo $profissional_atual['email']; ?></strong>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalFinal()">
                    <i class="fas fa-times"></i> Não, Cancelar
                </button>
                <button class="btn btn-danger" onclick="executarExclusao()">
                    <i class="fas fa-trash"></i> Sim, Excluir Agora
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
                    <i class="fas fa-trash"></i>
                </div>
                <h3>A excluir pagamento...</h3>
                <p id="processandoTexto">A processar a exclusão. Por favor, aguarde.</p>
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
        // VERIFICAR CONFIRMAÇÃO
        // ============================================
        function verificarConfirmacao(valor) {
            const textoCorreto = valor.trim().toUpperCase() === 'EXCLUIR';
            const checkboxMarcado = document.getElementById('confirmacaoCheckbox').checked;
            const btnConfirmar = document.getElementById('btnConfirmarExclusao');
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
        // CONFIRMAR EXCLUSÃO (abre modal final)
        // ============================================
        function confirmarExclusao() {
            const modal = document.getElementById('modalConfirmacaoFinal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // ============================================
        // FECHAR MODAL FINAL
        // ============================================
        function fecharModalFinal() {
            const modal = document.getElementById('modalConfirmacaoFinal');
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }

        // ============================================
        // EXECUTAR EXCLUSÃO
        // ============================================
        function executarExclusao() {
            fecharModalFinal();

            const modalProcessando = document.getElementById('modalProcessando');
            modalProcessando.classList.add('active');

            let progresso = 0;
            const progressoFill = document.getElementById('processandoProgresso');
            const progressoPercent = document.getElementById('processandoPercent');
            const processandoTexto = document.getElementById('processandoTexto');

            const etapas = [
                { perc: 20, texto: 'A verificar dependências...' },
                { perc: 40, texto: 'A remover comprovativo...' },
                { perc: 60, texto: 'A eliminar vínculos...' },
                { perc: 80, texto: 'A remover histórico...' },
                { perc: 95, texto: 'A finalizar exclusão...' },
                { perc: 100, texto: 'Pagamento excluído com sucesso!' }
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

                        sessionStorage.setItem('pagamento_excluido', JSON.stringify({
                            codigo: '<?php echo $pagamento['codigo']; ?>',
                            descricao: '<?php echo addslashes($pagamento['descricao']); ?>'
                        }));

                        window.location.href = 'pagamentos.php';
                    }, 800);
                }
            }, 60);
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

        document.querySelectorAll('input, textarea').forEach(el => {
            el.addEventListener('input', () => {
                if (el.value.length > 0) formularioAlterado = true;
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

        .header-left .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: var(--transition-smooth); }
        .header-left .breadcrumb a:hover { color: #FF6B6B; }
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

        .btn-theme:hover { border-color: #FF6B6B; color: #FF6B6B; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* CONTAINER DE EXCLUSÃO                      */
        /* ========================================== */
        .excluir-container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ========================================== */
        /* ALERTA PRINCIPAL                           */
        /* ========================================== */
        .excluir-alerta-principal {
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

        .excluir-alerta-principal::before {
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

        .alerta-conteudo p strong {
            color: #FF6B6B;
        }

        /* ========================================== */
        /* CARD DO PAGAMENTO                          */
        /* ========================================== */
        .excluir-pagamento-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            position: relative;
        }

        .excluir-pagamento-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #FF6B6B 0%, #E55555 100%);
        }

        .pagamento-card-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.04) 0%, transparent 100%);
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

        .info-label i { color: #FF6B6B; font-size: 12px; }

        .info-value {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* LISTA DO QUE SERÁ EXCLUÍDO                 */
        /* ========================================== */
        .excluir-lista-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-lg);
        }

        .lista-header {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .lista-header i {
            font-size: 24px;
            color: #FF6B6B;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .lista-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            font-weight: 600;
            line-height: 1.4;
        }

        .lista-header h3 strong { color: #FF6B6B; }

        .lista-itens {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .lista-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .lista-item:hover {
            border-color: rgba(255, 107, 107, 0.3);
            background: rgba(255, 107, 107, 0.02);
        }

        .lista-item-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .lista-item-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .lista-item-titulo {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .lista-item-descricao {
            font-size: var(--text-xs);
            color: var(--text-muted);
            line-height: 1.4;
        }

        .lista-item-count {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FF6B6B;
            min-width: 40px;
            text-align: center;
            padding: 4px 10px;
            background: rgba(255, 107, 107, 0.1);
            border-radius: var(--radius-full);
            flex-shrink: 0;
        }

        /* ========================================== */
        /* AVISO FINANCEIRO                           */
        /* ========================================== */
        .excluir-aviso-financeiro {
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

        .aviso-conteudo span strong {
            color: #FFD93D;
        }

        /* ========================================== */
        /* CONFIRMAÇÃO                                */
        /* ========================================== */
        .excluir-confirmacao {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 2px solid rgba(255, 107, 107, 0.3);
            padding: var(--space-xl);
            position: relative;
            overflow: hidden;
        }

        .excluir-confirmacao::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #FF6B6B 0%, #E55555 100%);
        }

        .excluir-confirmacao h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .excluir-confirmacao h3 i { color: #FF6B6B; }

        .excluir-confirmacao > p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-lg) 0;
            line-height: 1.5;
        }

        .excluir-confirmacao > p strong {
            color: #FF6B6B;
            font-family: var(--font-display);
            letter-spacing: 1px;
        }

        .confirmacao-input-group {
            position: relative;
            margin-bottom: var(--space-lg);
        }

        .confirmacao-input-group .form-control {
            width: 100%;
            background: var(--bg-input);
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
            background: var(--bg-input);
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

        /* ========================================== */
        /* AÇÕES FINAIS                               */
        /* ========================================== */
        .excluir-acoes {
            display: flex;
            justify-content: space-between;
            gap: var(--space-md);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .excluir-acoes .btn {
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

        .modal-alerta-danger i {
            font-size: 28px;
            color: #FF6B6B;
            flex-shrink: 0;
        }

        .modal-alerta-danger div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .modal-alerta-danger strong {
            font-size: var(--text-sm);
            color: #FF6B6B;
            font-weight: 700;
        }

        .modal-alerta-danger span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .modal-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            text-align: center;
            line-height: 1.5;
        }

        .modal-texto strong { color: #FF6B6B; }

        .modal-pagamento-nome {
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

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
        }

        @media (max-width: 768px) {
            .excluir-alerta-principal {
                flex-direction: column;
                text-align: center;
                padding: var(--space-lg);
            }

            .alerta-icon { width: 56px; height: 56px; font-size: 24px; }
            .alerta-conteudo h2 { font-size: var(--text-h4); }

            .pagamento-info-grid { grid-template-columns: 1fr; }

            .lista-header { flex-direction: column; text-align: center; }
            .lista-item {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }

            .excluir-aviso-financeiro {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .excluir-confirmacao { padding: var(--space-lg); }

            .excluir-acoes { flex-direction: column; }
            .excluir-acoes .btn { width: 100%; }

            .modal-info-final { grid-template-columns: 1fr; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }

            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
        }

        @media (max-width: 480px) {
            .excluir-container { gap: var(--space-md); }
            .excluir-alerta-principal { padding: var(--space-md); }
            .alerta-icon { width: 48px; height: 48px; font-size: 20px; }
            .alerta-conteudo h2 { font-size: var(--text-body); }

            .pagamento-card-header { flex-direction: column; align-items: flex-start; }
            .pagamento-titulo { font-size: var(--text-h4); }

            .lista-item-count { font-size: var(--text-h4); padding: 6px 14px; }

            .confirmacao-input-group .form-control {
                padding: 12px 44px 12px 14px;
                font-size: var(--text-sm);
            }

            .confirmacao-indicator { right: 12px; font-size: 18px; }

            .excluir-acoes { padding: var(--space-md); }
            .modal-body { padding: var(--space-lg); }

            .processando-spinner { width: 80px; height: 80px; }
            .processando-spinner i { font-size: 26px; }
        }
    </style>

</body>

</html>