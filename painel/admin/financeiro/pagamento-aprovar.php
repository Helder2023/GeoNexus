<?php
// painel/admin/financeiro/pagamento-aprovar.php - Aprovar Pagamento
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Aprovar Pagamento';
$pagina_atual = 'pagamentos';

// ===== OBTER ID DO PAGAMENTO =====
$id_pagamento = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE PAGAMENTOS =====
$pagamentos = [
    3 => [
        'id' => 3,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_email' => 'financas@itl.ao',
        'cliente_telefone' => '+244 222 456 789',
        'cliente_endereco' => 'Rua do Comércio, Nº 50, Luanda',
        'valor' => 125000,
        'metodo' => 'Depósito Bancário',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-15 08:00:00',
        'referencia' => 'PAY-003',
        'descricao' => 'Trimestral - Plano Educação',
        'categoria' => 'Assinatura',
        'comprovativo' => null,
        'assinatura_id' => 4,
        'plano' => 'Educação',
        'periodo' => 'Trimestral',
        'proximo_pagamento' => '2026-05-15',
        'created_at' => '2026-02-15 08:00:00',
        'updated_at' => '2026-02-15 08:00:00',
        'notas' => 'Aguardando comprovativo de pagamento.',
        'transacao_id' => 'TXN-003'
    ],
    6 => [
        'id' => 6,
        'cliente' => 'Energia Futuro',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-8.png',
        'cliente_email' => 'financas@energiafuturo.ao',
        'cliente_telefone' => '+244 222 678 901',
        'cliente_endereco' => 'Rua da Energia, Nº 45, Luanda',
        'valor' => 45000,
        'metodo' => 'Multicaixa',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-17 11:00:00',
        'referencia' => 'PAY-006',
        'descricao' => 'Mensalidade - Plano Empresarial',
        'categoria' => 'Assinatura',
        'comprovativo' => null,
        'assinatura_id' => 6,
        'plano' => 'Empresarial',
        'periodo' => 'Mensal',
        'proximo_pagamento' => '2026-03-17',
        'created_at' => '2026-02-17 11:00:00',
        'updated_at' => '2026-02-17 11:00:00',
        'notas' => 'Pagamento registado via Multicaixa. Aguardando confirmação.',
        'transacao_id' => 'TXN-006'
    ],
    8 => [
        'id' => 8,
        'cliente' => 'ONG Esperança',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-4.png',
        'cliente_email' => 'financas@ongesperanca.ao',
        'cliente_telefone' => '+244 222 789 012',
        'cliente_endereco' => 'Rua da Solidariedade, Nº 12, Luanda',
        'valor' => 100000,
        'metodo' => 'Depósito Bancário',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-16 09:30:00',
        'referencia' => 'PAY-008',
        'descricao' => 'Trimestral - Plano ONG',
        'categoria' => 'Assinatura',
        'comprovativo' => null,
        'assinatura_id' => 9,
        'plano' => 'ONG',
        'periodo' => 'Trimestral',
        'proximo_pagamento' => '2026-05-16',
        'created_at' => '2026-02-16 09:30:00',
        'updated_at' => '2026-02-16 09:30:00',
        'notas' => 'Pagamento pendente. Cliente enviou comprovativo por email.',
        'transacao_id' => 'TXN-008'
    ],
    10 => [
        'id' => 10,
        'cliente' => 'Universidade Agostinho Neto',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-3.png',
        'cliente_email' => 'financas@uan.ao',
        'cliente_telefone' => '+244 222 890 123',
        'cliente_endereco' => 'Av. 4 de Fevereiro, Nº 200, Luanda',
        'valor' => 200000,
        'metodo' => 'Transferência Bancária',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data' => '2026-02-18 08:15:00',
        'referencia' => 'PAY-010',
        'descricao' => 'Trimestral - Plano Governo',
        'categoria' => 'Assinatura',
        'comprovativo' => null,
        'assinatura_id' => 6,
        'plano' => 'Governo',
        'periodo' => 'Trimestral',
        'proximo_pagamento' => '2026-05-18',
        'created_at' => '2026-02-18 08:15:00',
        'updated_at' => '2026-02-18 08:15:00',
        'notas' => 'Aguardando confirmação do pagamento via transferência.',
        'transacao_id' => 'TXN-010'
    ],
];

// ===== OBTER PAGAMENTO ATUAL =====
$pagamento = isset($pagamentos[$id_pagamento]) ? $pagamentos[$id_pagamento] : $pagamentos[3];

// ===== FUNÇÕES AUXILIARES =====
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
        'pago' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'falhou' => 'fa-exclamation-circle',
        'cancelado' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}

function getTipoClienteIcon($tipo) {
    $icons = [
        'Individual' => 'fa-user',
        'Empresarial' => 'fa-building',
        'Institucional' => 'fa-university'
    ];
    return $icons[$tipo] ?? 'fa-user';
}

function getTipoClienteColor($tipo) {
    $colors = [
        'Individual' => '#00D2FF',
        'Empresarial' => '#FF6B6B',
        'Institucional' => '#FFD93D'
    ];
    return $colors[$tipo] ?? '#6B7A8F';
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
                        <i class="fas fa-check-circle icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status status-<?php echo $pagamento['status']; ?>" style="font-size: 14px; padding: 4px 16px; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                            <?php echo $pagamento['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="pagamentos.php">Pagamentos</a>
                        <span class="separator">/</span>
                        <span><?php echo $pagamento['referencia']; ?></span>
                        <span class="separator">/</span>
                        <span style="color: #00FFA3;">Aprovar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                      <?php include "../../../includes/notificacoes-finaceiro.php" ?>

                    <div class="header-actions">
                        <button type="submit" form="formAprovarPagamento" class="btn btn-success">
                            <i class="fas fa-check"></i> Confirmar Aprovação
                        </button>
                        <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- CONTEÚDO PRINCIPAL                        -->
            <!-- ========================================== -->
            <div class="aprovar-container">
                <div class="aprovar-grid">
                    <!-- Coluna Principal -->
                    <div class="aprovar-coluna-principal">
                        <!-- Card: Informação de Aprovação -->
                        <div class="aprovar-card aprovar-card-success">
                            <div class="aprovar-card-header">
                                <h3><i class="fas fa-check-circle" style="color: #00FFA3;"></i> Confirmar Aprovação</h3>
                            </div>
                            <div class="aprovar-card-body">
                                <div class="aviso-container">
                                    <i class="fas fa-check-circle aviso-icon" style="color: #00FFA3;"></i>
                                    <p class="aviso-texto">
                                        <strong>Confirmar aprovação do pagamento</strong>
                                    </p>
                                    <p class="aviso-detalhe">
                                        Você está prestes a aprovar o pagamento de <strong>Kz <?php echo formatMoney($pagamento['valor']); ?></strong>
                                        do cliente <strong><?php echo $pagamento['cliente']; ?></strong>
                                        referente a <strong><?php echo $pagamento['descricao']; ?></strong>.
                                    </p>
                                    <div class="aviso-consequencias">
                                        <p><i class="fas fa-info-circle"></i> O status do pagamento será alterado para <strong>"Pago"</strong>.</p>
                                        <p><i class="fas fa-info-circle"></i> A assinatura do cliente será atualizada.</p>
                                        <p><i class="fas fa-info-circle"></i> O cliente receberá uma notificação de confirmação.</p>
                                        <p><i class="fas fa-info-circle"></i> O recibo será gerado automaticamente.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Formulário de Aprovação -->
                        <div class="aprovar-card">
                            <div class="aprovar-card-header">
                                <h3><i class="fas fa-edit"></i> Dados da Aprovação</h3>
                                <span class="obrigatorio-label">* Campos obrigatórios</span>
                            </div>
                            <div class="aprovar-card-body">
                                <form id="formAprovarPagamento" onsubmit="confirmarAprovacao(event)">
                                    <input type="hidden" id="pagamentoId" value="<?php echo $pagamento['id']; ?>">
                                    
                                    <!-- Data de Aprovação -->
                                    <div class="form-group">
                                        <label class="form-label">Data de Aprovação <span class="required">*</span></label>
                                        <input type="datetime-local" class="form-control" id="dataAprovacao" required>
                                        <small class="form-text">Data e hora em que o pagamento foi verificado.</small>
                                    </div>

                                    <!-- Verificado por -->
                                    <div class="form-group">
                                        <label class="form-label">Verificado por <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="verificadoPor" value="Administrador" required>
                                    </div>

                                    <!-- Observações -->
                                    <div class="form-group">
                                        <label class="form-label">Observações</label>
                                        <textarea class="form-control" id="observacoes" rows="3" 
                                                  placeholder="Observações adicionais sobre a aprovação...">Pagamento verificado e aprovado conforme comprovativo.</textarea>
                                    </div>

                                    <!-- Notificar Cliente -->
                                    <div class="form-group">
                                        <label class="form-label" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                            <input type="checkbox" id="notificarCliente" checked style="width: 18px; height: 18px; accent-color: #00FFA3; cursor: pointer;">
                                            <span>Notificar cliente sobre a aprovação</span>
                                        </label>
                                        <small class="form-text">O cliente receberá um email com a confirmação do pagamento.</small>
                                    </div>

                                    <!-- Confirmar -->
                                    <div class="form-group">
                                        <label class="form-label" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                            <input type="checkbox" id="confirmarAprovacao" required style="width: 18px; height: 18px; accent-color: #00FFA3; cursor: pointer;">
                                            <span>Confirmo que verifiquei e aprovo este pagamento <span class="required">*</span></span>
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Coluna Lateral -->
                    <div class="aprovar-coluna-lateral">
                        <!-- Card: Resumo do Pagamento -->
                        <div class="aprovar-card">
                            <div class="aprovar-card-header">
                                <h3><i class="fas fa-info-circle"></i> Resumo do Pagamento</h3>
                            </div>
                            <div class="aprovar-card-body">
                                <div class="resumo-item">
                                    <span class="resumo-label">Referência</span>
                                    <span class="resumo-value" style="font-family: 'Orbitron', sans-serif; color: #FFD93D;">
                                        <?php echo $pagamento['referencia']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Cliente</span>
                                    <span class="resumo-value">
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <img src="../../../assets/images/<?php echo $pagamento['cliente_avatar']; ?>" 
                                                 alt="<?php echo $pagamento['cliente']; ?>"
                                                 onerror="this.src='<?php echo getAvatarUrl($pagamento['cliente']); ?>'"
                                                 style="width: 24px; height: 24px; border-radius: 50%; object-fit: cover;">
                                            <?php echo $pagamento['cliente']; ?>
                                        </div>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Tipo</span>
                                    <span class="resumo-value">
                                        <span style="color: <?php echo getTipoClienteColor($pagamento['cliente_tipo']); ?>;">
                                            <i class="fas <?php echo getTipoClienteIcon($pagamento['cliente_tipo']); ?>"></i>
                                            <?php echo $pagamento['cliente_tipo']; ?>
                                        </span>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Descrição</span>
                                    <span class="resumo-value"><?php echo $pagamento['descricao']; ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Valor</span>
                                    <span class="resumo-value" style="font-weight: 700; color: #FFD93D; font-size: 18px;">
                                        Kz <?php echo formatMoney($pagamento['valor']); ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Método</span>
                                    <span class="resumo-value"><?php echo $pagamento['metodo']; ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Data do Pagamento</span>
                                    <span class="resumo-value"><?php echo formatDate($pagamento['data']); ?></span>
                                </div>
                                <?php if ($pagamento['plano']): ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Plano</span>
                                    <span class="resumo-value"><?php echo $pagamento['plano']; ?></span>
                                </div>
                                <?php endif; ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Status</span>
                                    <span class="badge-status status-<?php echo $pagamento['status']; ?>">
                                        <i class="fas <?php echo getStatusIcon($pagamento['status']); ?>"></i>
                                        <?php echo $pagamento['status_label']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Ações -->
                        <div class="aprovar-card">
                            <div class="aprovar-card-header">
                                <h3><i class="fas fa-tools"></i> Ações</h3>
                            </div>
                            <div class="aprovar-card-body">
                                <div class="acoes-lista">
                                    <button class="btn btn-success" style="width: 100%; justify-content: center;" onclick="document.getElementById('formAprovarPagamento').submit()">
                                        <i class="fas fa-check"></i> Confirmar Aprovação
                                    </button>
                                    <a href="pagamento-detalhe.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-arrow-left"></i> Voltar
                                    </a>
                                    <a href="pagamento-rejeitar.php?id=<?php echo $pagamento['id']; ?>" class="btn btn-danger" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-times"></i> Rejeitar Pagamento
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="../../../assets/js/main.js"></script>
    <script>
        

        // ==========================================
        // INICIALIZAR DATA
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            const agora = new Date();
            const ano = agora.getFullYear();
            const mes = String(agora.getMonth() + 1).padStart(2, '0');
            const dia = String(agora.getDate()).padStart(2, '0');
            const horas = String(agora.getHours()).padStart(2, '0');
            const minutos = String(agora.getMinutes()).padStart(2, '0');
            const dataFormatada = ano + '-' + mes + '-' + dia + 'T' + horas + ':' + minutos;
            document.getElementById('dataAprovacao').value = dataFormatada;
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
        // CONFIRMAR APROVAÇÃO
        // ==========================================
        function confirmarAprovacao(event) {
            event.preventDefault();

            const id = document.getElementById('pagamentoId').value;
            const data = document.getElementById('dataAprovacao').value;
            const verificadoPor = document.getElementById('verificadoPor').value;
            const notificar = document.getElementById('notificarCliente').checked;
            const confirmar = document.getElementById('confirmarAprovacao').checked;

            if (!data) {
                mostrarToast('Por favor, selecione a data de aprovação.', 'error');
                document.getElementById('dataAprovacao').focus();
                return;
            }

            if (!verificadoPor) {
                mostrarToast('Por favor, indique quem verificou o pagamento.', 'error');
                document.getElementById('verificadoPor').focus();
                return;
            }

            if (!confirmar) {
                mostrarToast('Por favor, confirme que pretende aprovar este pagamento.', 'error');
                document.getElementById('confirmarAprovacao').focus();
                return;
            }

            // Simular aprovação
            mostrarToast('A aprovar pagamento #' + id + '...', 'info');

            setTimeout(() => {
                let mensagem = 'Pagamento #' + id + ' aprovado com sucesso!';
                if (notificar) {
                    mensagem += ' Cliente notificado.';
                }
                mostrarToast(mensagem, 'success');
                setTimeout(() => {
                    window.location.href = 'pagamento-detalhe.php?id=' + id;
                }, 1500);
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
        /* APROVAR PAGAMENTO - CSS                    */
        /* ========================================== */

        /* ===== CONTAINER ===== */
        .aprovar-container {
            margin-bottom: var(--space-lg);
        }

        .aprovar-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--space-lg);
        }

        /* ===== CARDS ===== */
        .aprovar-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .aprovar-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .aprovar-card.aprovar-card-success {
            border-color: rgba(0, 255, 163, 0.3);
            background: rgba(0, 255, 163, 0.05);
        }

        .aprovar-card.aprovar-card-success .aprovar-card-header {
            border-bottom-color: rgba(0, 255, 163, 0.2);
        }

        .aprovar-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .aprovar-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .aprovar-card-header h3 i {
            color: #FFD93D;
        }

        .aprovar-card-header .obrigatorio-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .aprovar-card-body {
            padding: 20px;
        }

        /* ===== AVISO ===== */
        .aviso-container {
            text-align: center;
            padding: var(--space-md) 0;
        }

        .aviso-icon {
            font-size: 56px;
            margin-bottom: var(--space-md);
            display: block;
        }

        .aviso-texto {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
        }

        .aviso-detalhe {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.8;
            margin: 4px 0;
        }

        .aviso-detalhe strong {
            color: var(--text-primary);
        }

        .aviso-consequencias {
            margin-top: var(--space-md);
            text-align: left;
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            padding: var(--space-md);
        }

        .aviso-consequencias p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 4px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .aviso-consequencias p i {
            color: #FFD93D;
            width: 18px;
        }

        /* ===== FORMULÁRIO ===== */
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
            border-color: #00FFA3;
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.15);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
            font-family: var(--font-body);
        }

        .form-text {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ===== CHECKBOX ===== */
        .form-group label input[type="checkbox"] {
            accent-color: #00FFA3;
            cursor: pointer;
        }

        /* ===== RESUMO ===== */
        .resumo-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .resumo-item:last-child {
            border-bottom: none;
        }

        .resumo-item .resumo-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .resumo-item .resumo-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
            text-align: right;
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

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        /* ===== AÇÕES ===== */
        .acoes-lista {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .acoes-lista .btn {
            justify-content: center;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .aprovar-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .aprovar-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-sm);
            }
            
            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .page-header h1 {
                font-size: var(--text-h3);
                flex-wrap: wrap;
            }
            
            .page-header h1 .badge-status {
                font-size: 12px;
                padding: 2px 12px;
            }

            .aviso-icon {
                font-size: 40px;
            }

            .aviso-texto {
                font-size: 16px;
            }

            .aviso-consequencias p {
                font-size: var(--text-xs);
            }

            .resumo-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
            }

            .resumo-item .resumo-value {
                text-align: left;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .aprovar-card-body {
                padding: 14px;
            }
            
            .aprovar-card-header {
                padding: 12px 14px;
            }

            .aviso-icon {
                font-size: 32px;
            }

            .aviso-texto {
                font-size: 14px;
            }

            .aviso-detalhe {
                font-size: var(--text-xs);
            }
        }
    </style>
</body>
</html>