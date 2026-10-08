<?php
// painel/individual/financeiro/pagamento-rejeitar.php - Rejeitar Pagamento
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Rejeitar Pagamento';
$pagina_atual = 'pagamento-rejeitar';

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
// MOTIVOS DE REJEIÇÃO
// ============================================
$motivos = [
    ['id' => 'comprovativo_invalido', 'label' => 'Comprovativo ilegível ou inválido', 'icon' => 'fa-file-excel', 'color' => '#FF6B6B'],
    ['id' => 'valor_incorreto', 'label' => 'Valor incorreto', 'icon' => 'fa-coins', 'color' => '#FF9F43'],
    ['id' => 'dados_incorretos', 'label' => 'Dados do cliente incorretos', 'icon' => 'fa-user-times', 'color' => '#FFD93D'],
    ['id' => 'duplicado', 'label' => 'Pagamento duplicado', 'icon' => 'fa-copy', 'color' => '#6C2BD9'],
    ['id' => 'metodo_nao_aceite', 'label' => 'Método de pagamento não aceite', 'icon' => 'fa-ban', 'color' => '#00D2FF'],
    ['id' => 'nao_identificado', 'label' => 'Pagamento não identificado', 'icon' => 'fa-question-circle', 'color' => '#6B7A8F'],
    ['id' => 'fora_prazo', 'label' => 'Pagamento fora do prazo', 'icon' => 'fa-clock', 'color' => '#FD79A8'],
    ['id' => 'outro', 'label' => 'Outro motivo', 'icon' => 'fa-ellipsis-h', 'color' => '#A29BFE'],
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
            'cancelado' => 'status-cancelado',
            'rejeitado' => 'status-rejeitado'
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
            'cancelado' => 'fa-ban',
            'rejeitado' => 'fa-times-circle'
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
                        <i class="fas fa-times-circle icon" style="color: #FF6B6B;"></i>
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
                        <span style="color: #FF6B6B;">Rejeitar</span>
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
            <!-- CONTEÚDO DE REJEIÇÃO                       -->
            <!-- ========================================== -->
            <div class="rejeitar-container animate-fade-up">

                <!-- ===== ALERTA PRINCIPAL ===== -->
                <div class="rejeitar-alerta-principal">
                    <div class="alerta-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="alerta-conteudo">
                        <h2>Confirmar Rejeição do Pagamento</h2>
                        <p>Ao rejeitar este pagamento, o cliente será <strong>notificado</strong> e o pagamento permanecerá como <strong>"Pendente"</strong> até ser regularizado. Esta ação pode ser revertida posteriormente.</p>
                    </div>
                </div>

                <!-- ===== CARD DO PAGAMENTO ===== -->
                <div class="rejeitar-pagamento-card">
                    <div class="pagamento-card-header">
                        <div class="pagamento-card-tipo" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                        <div class="pagamento-card-info">
                            <span class="pagamento-codigo"><?php echo $pagamento['codigo']; ?></span>
                            <span class="pagamento-tipo-label" style="color: #FF6B6B;">
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
                <div class="rejeitar-comprovativo-card">
                    <div class="comprovativo-header">
                        <i class="fas fa-paperclip"></i>
                        <h3>Comprovativo Anexado</h3>
                        <span class="badge-anexo badge-anexo-danger">
                            <i class="fas fa-exclamation-triangle"></i> Em Análise
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

                <!-- ===== MOTIVO DA REJEIÇÃO ===== -->
                <div class="rejeitar-form-card">
                    <div class="form-card-header form-card-header-danger">
                        <i class="fas fa-times-circle"></i>
                        <h3>Motivo da Rejeição</h3>
                        <span class="required-badge">Obrigatório</span>
                    </div>
                    <div class="form-card-body">
                        <p class="form-intro">Selecione o motivo pelo qual este pagamento está a ser rejeitado:</p>

                        <!-- Grelha de motivos -->
                        <div class="motivos-grid" id="motivosGrid">
                            <?php foreach ($motivos as $motivo): ?>
                                <div class="motivo-card" 
                                     data-motivo="<?php echo $motivo['id']; ?>"
                                     data-label="<?php echo $motivo['label']; ?>"
                                     onclick="selecionarMotivo('<?php echo $motivo['id']; ?>')"
                                     style="--motivo-color: <?php echo $motivo['color']; ?>;">
                                    <div class="motivo-icon" style="background: <?php echo $motivo['color']; ?>20; color: <?php echo $motivo['color']; ?>;">
                                        <i class="fas <?php echo $motivo['icon']; ?>"></i>
                                    </div>
                                    <span class="motivo-label"><?php echo $motivo['label']; ?></span>
                                    <div class="motivo-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <input type="hidden" id="motivoSelecionado" required>
                        <span class="form-error" id="errorMotivo" style="display: none;">
                            <i class="fas fa-exclamation-circle"></i> Selecione um motivo de rejeição
                        </span>

                        <!-- Descrição detalhada -->
                        <div class="form-group" style="margin-top: var(--space-lg);">
                            <label class="form-label">Descrição Adicional (opcional)</label>
                            <textarea class="form-control" id="descricaoRejeicao" rows="4" 
                                      placeholder="Descreva detalhadamente o motivo da rejeição. Esta informação será enviada ao cliente..."
                                      maxlength="500"></textarea>
                            <div class="char-counter">
                                <span id="descricaoCount">0</span> / 500 caracteres
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== OPÇÕES DE NOTIFICAÇÃO ===== -->
                <div class="rejeitar-opcoes-card">
                    <div class="opcoes-header">
                        <i class="fas fa-bell"></i>
                        <h3>Opções de Notificação</h3>
                    </div>
                    <div class="opcoes-body">
                        <div class="checkbox-group">
                            <label class="checkbox-item">
                                <input type="checkbox" id="notificarEmail" checked>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-envelope" style="color: #00D2FF;"></i> Enviar Email ao Cliente</strong>
                                    <small>Notificar <strong><?php echo $pagamento['cliente']; ?></strong> (<?php echo $pagamento['cliente_email']; ?>) que o pagamento foi rejeitado</small>
                                </div>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" id="notificarSistema">
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-bell" style="color: #FFD93D;"></i> Criar Notificação no Sistema</strong>
                                    <small>O cliente verá um alerta na sua área pessoal</small>
                                </div>
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" id="solicitarNovoComprovativo" checked>
                                <span class="checkbox-mark"></span>
                                <div class="checkbox-content">
                                    <strong><i class="fas fa-redo" style="color: #00FFA3;"></i> Solicitar Novo Comprovativo</strong>
                                    <small>Pedir ao cliente que envie um novo comprovativo válido</small>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- ===== AVISO ===== -->
                <div class="rejeitar-aviso">
                    <div class="aviso-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="aviso-conteudo">
                        <strong>O que acontece ao rejeitar?</strong>
                        <ul class="aviso-lista">
                            <li><i class="fas fa-check-circle"></i> O pagamento mantém-se <strong>"Pendente"</strong> no sistema</li>
                            <li><i class="fas fa-check-circle"></i> O cliente será <strong>notificado</strong> por email</li>
                            <li><i class="fas fa-check-circle"></i> O histórico regista a ação para <strong>auditoria</strong></li>
                            <li><i class="fas fa-check-circle"></i> Pode ser <strong>aprovado</strong> novamente mais tarde</li>
                        </ul>
                    </div>
                </div>

                <!-- ===== AÇÕES ===== -->
                <div class="rejeitar-acoes">
                    <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="aprovarEmVezDeRejeitar()">
                        <i class="fas fa-check-circle"></i> Aprovar em Vez
                    </button>
                    <button type="button" class="btn btn-danger btn-lg" onclick="confirmarRejeicao()">
                        <i class="fas fa-times-circle"></i> Confirmar Rejeição
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
                    Confirmação Final
                </h3>
                <button class="modal-close" onclick="fecharModalFinal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-times-circle"></i>
                    <div>
                        <strong>Atenção!</strong>
                        <span>Esta ação irá rejeitar o pagamento e o cliente será notificado.</span>
                    </div>
                </div>

                <p class="modal-texto">
                    Tem a certeza que deseja rejeitar o pagamento
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
                        <span class="info-final-label">Motivo</span>
                        <span class="info-final-value" id="modalMotivoLabel">-</span>
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
                <button class="btn btn-danger" onclick="executarRejeicao()">
                    <i class="fas fa-times-circle"></i> Sim, Rejeitar Agora
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
                    <i class="fas fa-times-circle"></i>
                </div>
                <h3>A rejeitar pagamento...</h3>
                <p id="processandoTexto">A processar a rejeição. Por favor, aguarde.</p>
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
        // SELECIONAR MOTIVO
        // ============================================
        let motivoAtual = null;

        function selecionarMotivo(motivoId) {
            document.querySelectorAll('.motivo-card').forEach(card => {
                card.classList.remove('selected');
            });

            const card = document.querySelector(`.motivo-card[data-motivo="${motivoId}"]`);
            if (card) {
                card.classList.add('selected');
                motivoAtual = motivoId;
                document.getElementById('motivoSelecionado').value = motivoId;
                document.getElementById('errorMotivo').style.display = 'none';
            }
        }

        // ============================================
        // CONTADOR DE CARACTERES
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const descricao = document.getElementById('descricaoRejeicao');
            const count = document.getElementById('descricaoCount');

            if (descricao && count) {
                descricao.addEventListener('input', function() {
                    count.textContent = this.value.length;
                    if (this.value.length > 400) {
                        count.style.color = '#FF6B6B';
                    } else {
                        count.style.color = 'var(--text-muted)';
                    }
                });
            }
        });

        // ============================================
        // VISUALIZAR COMPROVATIVO
        // ============================================
        function visualizarComprovativo() {
            mostrarToast('A abrir comprovativo...', 'info');
        }

        // ============================================
        // CONFIRMAR REJEIÇÃO
        // ============================================
        function confirmarRejeicao() {
            if (!motivoAtual) {
                document.getElementById('errorMotivo').style.display = 'flex';
                mostrarToast('Selecione um motivo de rejeição!', 'error');
                document.querySelector('.motivos-grid').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Obter label do motivo
            const motivoCard = document.querySelector(`.motivo-card[data-motivo="${motivoAtual}"]`);
            const motivoLabel = motivoCard ? motivoCard.dataset.label : '-';
            document.getElementById('modalMotivoLabel').textContent = motivoLabel;

            document.getElementById('modalConfirmacaoFinal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharModalFinal() {
            document.getElementById('modalConfirmacaoFinal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // ============================================
        // EXECUTAR REJEIÇÃO
        // ============================================
        function executarRejeicao() {
            fecharModalFinal();

            const modalProcessando = document.getElementById('modalProcessando');
            modalProcessando.classList.add('active');

            let progresso = 0;
            const progressoFill = document.getElementById('processandoProgresso');
            const progressoPercent = document.getElementById('processandoPercent');
            const processandoTexto = document.getElementById('processandoTexto');

            const etapas = [
                { perc: 20, texto: 'A verificar dados do pagamento...' },
                { perc: 40, texto: 'A registar motivo da rejeição...' },
                { perc: 60, texto: 'A atualizar histórico...' },
                { perc: 80, texto: 'A notificar o cliente...' },
                { perc: 95, texto: 'A finalizar rejeição...' },
                { perc: 100, texto: 'Pagamento rejeitado!' }
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

                        sessionStorage.setItem('pagamento_rejeitado', JSON.stringify({
                            codigo: '<?php echo $pagamento['codigo']; ?>',
                            cliente: '<?php echo addslashes($pagamento['cliente']); ?>',
                            motivo: motivoAtual
                        }));

                        window.location.href = 'pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>&rejeitado=1';
                    }, 800);
                }
            }, 60);
        }

        // ============================================
        // APROVAR EM VEZ DE REJEITAR
        // ============================================
        function aprovarEmVezDeRejeitar() {
            if (confirm('Deseja aprovar este pagamento em vez de rejeitar?')) {
                window.location.href = 'pagamento-aprovar.php?id=<?php echo $pagamento['id']; ?>';
            }
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
            document.querySelectorAll('textarea, input[type="checkbox"]').forEach(el => {
                el.addEventListener('input', () => {
                    formularioAlterado = true;
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
        /* CONTAINER DE REJEIÇÃO                      */
        /* ========================================== */
        .rejeitar-container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ========================================== */
        /* ALERTA PRINCIPAL                           */
        /* ========================================== */
        .rejeitar-alerta-principal {
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

        .rejeitar-alerta-principal::before {
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
        /* CARD DO PAGAMENTO                          */
        /* ========================================== */
        .rejeitar-pagamento-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            position: relative;
        }

        .rejeitar-pagamento-card::before {
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
        .badge-status.status-rejeitado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

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
        /* COMPROVATIVO                               */
        /* ========================================== */
        .rejeitar-comprovativo-card {
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
            color: #FF6B6B;
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
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-anexo-danger {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
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
        /* FORMULÁRIO DE REJEIÇÃO                     */
        /* ========================================== */
        .rejeitar-form-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 2px solid rgba(255, 107, 107, 0.3);
            overflow: hidden;
        }

        .form-card-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .form-card-header-danger {
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(255, 107, 107, 0.03) 100%);
            border-bottom-color: rgba(255, 107, 107, 0.2);
        }

        .form-card-header i {
            font-size: 20px;
            color: #FF6B6B;
        }

        .form-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            flex: 1;
        }

        .required-badge {
            display: inline-flex;
            align-items: center;
            padding: 3px 10px;
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-card-body {
            padding: var(--space-lg);
        }

        .form-intro {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-lg) 0;
            line-height: 1.5;
        }

        /* ========================================== */
        /* MOTIVOS GRID                               */
        /* ========================================== */
        .motivos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: var(--space-sm);
        }

        .motivo-card {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .motivo-card:hover {
            border-color: var(--motivo-color);
            background: var(--bg-card-hover);
            transform: translateY(-2px);
        }

        .motivo-card.selected {
            border-color: var(--motivo-color);
            background: linear-gradient(135deg, var(--motivo-color)15 0%, transparent 100%);
            box-shadow: 0 0 0 3px var(--motivo-color)20;
        }

        .motivo-icon {
            width: 38px;
            height: 38px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .motivo-card:hover .motivo-icon,
        .motivo-card.selected .motivo-icon {
            transform: scale(1.1);
        }

        .motivo-label {
            flex: 1;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
            line-height: 1.3;
        }

        .motivo-check {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--motivo-color);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            opacity: 0;
            transform: scale(0);
            transition: var(--transition-bounce);
            flex-shrink: 0;
        }

        .motivo-card.selected .motivo-check {
            opacity: 1;
            transform: scale(1);
        }

        /* ========================================== */
        /* FORMULÁRIO - CAMPOS                        */
        /* ========================================== */
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
            border-color: #FF6B6B;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
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
        /* OPÇÕES DE NOTIFICAÇÃO                      */
        /* ========================================== */
        .rejeitar-opcoes-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
        }

        .opcoes-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: rgba(0, 210, 255, 0.02);
        }

        .opcoes-header i {
            font-size: 20px;
            color: #00D2FF;
        }

        .opcoes-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
        }

        .opcoes-body {
            padding: var(--space-lg);
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
            border-color: #00D2FF;
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
            background: #00D2FF;
            border-color: #00D2FF;
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
            line-height: 1.4;
        }

        .checkbox-content small strong {
            color: #00D2FF;
            font-weight: 600;
            font-size: var(--text-xs);
        }

        /* ========================================== */
        /* AVISO                                      */
        /* ========================================== */
        .rejeitar-aviso {
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
            gap: var(--space-sm);
        }

        .aviso-conteudo strong {
            font-size: var(--text-sm);
            color: #FFD93D;
            font-weight: 700;
        }

        .aviso-lista {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .aviso-lista li {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .aviso-lista li i {
            color: #00FFA3;
            font-size: 12px;
        }

        .aviso-lista li strong {
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        /* ========================================== */
        /* AÇÕES FINAIS                               */
        /* ========================================== */
        .rejeitar-acoes {
            display: flex;
            justify-content: space-between;
            gap: var(--space-md);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .rejeitar-acoes .btn {
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

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 107, 107, 0.4);
        }

        .btn-success {
            background: #00FFA3;
            color: #0A1628;
            border: none;
        }

        .btn-success:hover {
            background: #00E594;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 255, 163, 0.4);
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
            border: 2px solid rgba(255, 107, 107, 0.5);
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
        .modal-alerta-danger strong { font-size: var(--text-sm); color: #FF6B6B; }
        .modal-alerta-danger span { font-size: var(--text-xs); color: var(--text-secondary); }

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
            font-size: 36px;
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
            .rejeitar-alerta-principal {
                flex-direction: column;
                text-align: center;
                padding: var(--space-lg);
            }

            .alerta-icon { width: 56px; height: 56px; font-size: 24px; }
            .alerta-conteudo h2 { font-size: var(--text-h4); }

            .pagamento-info-grid { grid-template-columns: 1fr; }

            .motivos-grid { grid-template-columns: 1fr 1fr; }

            .rejeitar-acoes { flex-direction: column; }
            .rejeitar-acoes .btn { width: 100%; }

            .modal-info-final { grid-template-columns: 1fr; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }

            .comprovativo-content { flex-direction: column; text-align: center; }

            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
        }

        @media (max-width: 480px) {
            .rejeitar-container { gap: var(--space-md); }
            .rejeitar-alerta-principal { padding: var(--space-md); }
            .alerta-icon { width: 48px; height: 48px; font-size: 20px; }
            .alerta-conteudo h2 { font-size: var(--text-body); }

            .pagamento-card-header { flex-direction: column; align-items: flex-start; }
            .pagamento-titulo { font-size: var(--text-h4); }

            .motivos-grid { grid-template-columns: 1fr; }

            .rejeitar-acoes { padding: var(--space-md); }
            .modal-body { padding: var(--space-lg); }

            .processando-spinner { width: 80px; height: 80px; }
            .processando-spinner i { font-size: 26px; }

            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }

            .aviso-lista li { font-size: var(--text-xs); }
        }
    </style>

</body>

</html>