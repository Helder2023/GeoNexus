<?php
// painel/admin/financeiro/assinatura-cancelar.php - Cancelar Assinatura
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Cancelar Assinatura';
$pagina_atual = 'assinaturas';

// ===== OBTER ID DA ASSINATURA =====
$id_assinatura = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados para estatísticas


// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE ASSINATURAS =====
$assinaturas = [
    1 => [
        'id' => 1,
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-1.png',
        'cliente_email' => 'carlos.mendes@email.com',
        'cliente_telefone' => '+244 923 456 789',
        'categoria' => 'individual',
        'plano' => 'Pro',
        'valor' => 25000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-15',
        'fim' => '2026-12-15',
        'renovacao' => '2026-02-15',
        'metodo_pagamento' => 'Multicaixa',
        'ultimo_pagamento' => '2026-01-15',
        'proximo_pagamento' => '2026-02-15',
        'created_at' => '2026-01-15 10:30:00',
        'updated_at' => '2026-01-15 10:30:00',
        'notas' => 'Cliente com bom histórico de pagamentos. Renovação automática ativada.'
    ],
    2 => [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresarial',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_email' => 'financeiro@construtoraabc.ao',
        'cliente_telefone' => '+244 222 345 678',
        'categoria' => 'empresarial',
        'plano' => 'Enterprise',
        'valor' => 250000,
        'periodo' => 'Mensal',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'inicio' => '2026-01-01',
        'fim' => '2026-12-31',
        'renovacao' => '2026-02-01',
        'metodo_pagamento' => 'Transferência Bancária',
        'ultimo_pagamento' => '2026-01-01',
        'proximo_pagamento' => '2026-02-01',
        'created_at' => '2025-12-15 09:00:00',
        'updated_at' => '2026-01-01 14:30:00',
        'notas' => 'Empresa parceira desde 2024. Contrato anual com renovação automática.'
    ],
];

// ===== OBTER ASSINATURA ATUAL =====
$assinatura = isset($assinaturas[$id_assinatura]) ? $assinaturas[$id_assinatura] : $assinaturas[1];

// ===== MOTIVOS PARA CANCELAMENTO =====
$motivos_cancelamento = [
    'insatisfacao' => 'Insatisfação com o serviço',
    'custo' => 'Custo elevado',
    'alternativa' => 'Encontrou alternativa melhor',
    'necessidade' => 'Não necessita mais do serviço',
    'falta_uso' => 'Falta de utilização',
    'financeiro' => 'Problemas financeiros',
    'mudanca' => 'Mudança de negócio/atividade',
    'suporte' => 'Suporte insuficiente',
    'outro' => 'Outro motivo'
];

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

function getCategoriaColor($categoria) {
    $cores = [
        'individual' => '#00D2FF',
        'empresarial' => '#FF6B6B',
        'institucional' => '#FFD93D'
    ];
    return $cores[$categoria] ?? '#6B7A8F';
}

function getCategoriaIcon($categoria) {
    $icons = [
        'individual' => 'fa-user',
        'empresarial' => 'fa-building',
        'institucional' => 'fa-university'
    ];
    return $icons[$categoria] ?? 'fa-circle';
}

function getCategoriaLabel($categoria) {
    $labels = [
        'individual' => 'Individual',
        'empresarial' => 'Empresarial',
        'institucional' => 'Institucional'
    ];
    return $labels[$categoria] ?? $categoria;
}

function getStatusIcon($status) {
    $icons = [
        'ativo' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'cancelado' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}
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
                        <i class="fas fa-times-circle icon" style="color: #FF6B6B;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status status-<?php echo $assinatura['status']; ?>" style="font-size: 14px; padding: 4px 16px; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fas <?php echo getStatusIcon($assinatura['status']); ?>"></i>
                            <?php echo $assinatura['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="assinaturas.php">Assinaturas</a>
                        <span class="separator">/</span>
                        <span>#<?php echo $assinatura['id']; ?></span>
                        <span class="separator">/</span>
                        <span style="color: #FF6B6B;">Cancelar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                        <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <button type="submit" form="formCancelarAssinatura" class="btn btn-danger">
                            <i class="fas fa-times"></i> Confirmar Cancelamento
                        </button>
                        <a href="assinatura-detalhe.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- CONTEÚDO PRINCIPAL                        -->
            <!-- ========================================== -->
            <div class="cancelar-container">
                <div class="cancelar-grid">
                    <!-- Coluna Principal -->
                    <div class="cancelar-coluna-principal">
                        <!-- Card: Aviso de Cancelamento -->
                        <div class="cancelar-card cancelar-card-danger">
                            <div class="cancelar-card-header">
                                <h3><i class="fas fa-exclamation-triangle" style="color: #FF6B6B;"></i> Atenção!</h3>
                            </div>
                            <div class="cancelar-card-body">
                                <div class="aviso-container">
                                    <i class="fas fa-times-circle aviso-icon"></i>
                                    <p class="aviso-texto">
                                        <strong>Você está prestes a cancelar esta assinatura.</strong>
                                    </p>
                                    <p class="aviso-detalhe">
                                        Esta ação irá cancelar a assinatura do plano <strong><?php echo $assinatura['plano']; ?></strong> 
                                        do cliente <strong><?php echo $assinatura['cliente']; ?></strong>.
                                    </p>
                                    <div class="aviso-consequencias">
                                        <p><i class="fas fa-info-circle"></i> O cliente perderá acesso aos benefícios do plano.</p>
                                        <p><i class="fas fa-info-circle"></i> O histórico de pagamentos será mantido.</p>
                                        <p><i class="fas fa-info-circle"></i> Esta ação pode ser desfeita reativando a assinatura.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Formulário de Cancelamento -->
                        <div class="cancelar-card">
                            <div class="cancelar-card-header">
                                <h3><i class="fas fa-edit"></i> Motivo do Cancelamento</h3>
                                <span class="obrigatorio-label">* Campos obrigatórios</span>
                            </div>
                            <div class="cancelar-card-body">
                                <form id="formCancelarAssinatura" onsubmit="confirmarCancelamento(event)">
                                    <input type="hidden" id="assinaturaId" value="<?php echo $assinatura['id']; ?>">
                                    
                                    <!-- Motivo -->
                                    <div class="form-group">
                                        <label class="form-label">Motivo do Cancelamento <span class="required">*</span></label>
                                        <select class="form-control" id="motivoCancelamento" required>
                                            <option value="">Selecione um motivo...</option>
                                            <?php foreach ($motivos_cancelamento as $key => $label): ?>
                                                <option value="<?php echo $key; ?>"><?php echo $label; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Descrição do Motivo -->
                                    <div class="form-group">
                                        <label class="form-label">Descrição do Motivo <span class="required">*</span></label>
                                        <textarea class="form-control" id="descricaoMotivo" rows="4" 
                                                  placeholder="Explique detalhadamente o motivo do cancelamento..." required></textarea>
                                        <small class="form-text">Mínimo de 10 caracteres. Descreva com clareza o motivo do cancelamento.</small>
                                    </div>

                                    <!-- Data de Cancelamento -->
                                    <div class="form-group">
                                        <label class="form-label">Data de Cancelamento <span class="required">*</span></label>
                                        <input type="date" class="form-control" id="dataCancelamento" required>
                                        <small class="form-text">A assinatura será cancelada a partir desta data.</small>
                                    </div>

                                    <!-- Confirmar -->
                                    <div class="form-group">
                                        <label class="form-label" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                            <input type="checkbox" id="confirmarCancelamento" required style="width: 18px; height: 18px; accent-color: #FF6B6B; cursor: pointer;">
                                            <span>Confirmo que pretendo cancelar esta assinatura <span class="required">*</span></span>
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Coluna Lateral -->
                    <div class="cancelar-coluna-lateral">
                        <!-- Card: Resumo da Assinatura -->
                        <div class="cancelar-card">
                            <div class="cancelar-card-header">
                                <h3><i class="fas fa-info-circle"></i> Resumo da Assinatura</h3>
                            </div>
                            <div class="cancelar-card-body">
                                <div class="resumo-item">
                                    <span class="resumo-label">ID</span>
                                    <span class="resumo-value" style="font-family: 'Orbitron', sans-serif; color: #FFD93D;">
                                        #<?php echo $assinatura['id']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Cliente</span>
                                    <span class="resumo-value">
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <img src="../../../assets/images/<?php echo $assinatura['cliente_avatar']; ?>" 
                                                 alt="<?php echo $assinatura['cliente']; ?>"
                                                 onerror="this.src='<?php echo getAvatarUrl($assinatura['cliente']); ?>'"
                                                 style="width: 24px; height: 24px; border-radius: 50%; object-fit: cover;">
                                            <?php echo $assinatura['cliente']; ?>
                                        </div>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Categoria</span>
                                    <span class="resumo-value">
                                        <span class="badge-categoria categoria-<?php echo $assinatura['categoria']; ?>">
                                            <i class="fas <?php echo getCategoriaIcon($assinatura['categoria']); ?>"></i>
                                            <?php echo getCategoriaLabel($assinatura['categoria']); ?>
                                        </span>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Plano</span>
                                    <span class="resumo-value">
                                        <span class="badge-plano" style="background: <?php echo getCategoriaColor($assinatura['categoria']); ?>; color: #fff; padding: 2px 12px; border-radius: 20px; font-size: 13px; font-weight: 600;">
                                            <?php echo $assinatura['plano']; ?>
                                        </span>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Valor</span>
                                    <span class="resumo-value" style="font-weight: 700; color: #FFD93D;">
                                        Kz <?php echo formatMoney($assinatura['valor']); ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Período</span>
                                    <span class="resumo-value"><?php echo $assinatura['periodo']; ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Data de Início</span>
                                    <span class="resumo-value"><?php echo formatDate($assinatura['inicio']); ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Próxima Renovação</span>
                                    <span class="resumo-value">
                                        <?php if ($assinatura['renovacao']): ?>
                                            <?php echo formatDate($assinatura['renovacao']); ?>
                                        <?php else: ?>
                                            <span class="text-muted">—</span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Método de Pagamento</span>
                                    <span class="resumo-value"><?php echo $assinatura['metodo_pagamento']; ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Ações -->
                        <div class="cancelar-card">
                            <div class="cancelar-card-header">
                                <h3><i class="fas fa-tools"></i> Ações</h3>
                            </div>
                            <div class="cancelar-card-body">
                                <div class="acoes-lista">
                                    <button class="btn btn-danger" style="width: 100%; justify-content: center;" onclick="document.getElementById('formCancelarAssinatura').submit()">
                                        <i class="fas fa-times"></i> Confirmar Cancelamento
                                    </button>
                                    <a href="assinatura-detalhe.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-arrow-left"></i> Voltar
                                    </a>
                                    <a href="assinatura-editar.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-edit"></i> Editar Assinatura
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
            // Definir data atual como padrão
            const hoje = new Date();
            const dataFormatada = hoje.toISOString().split('T')[0];
            document.getElementById('dataCancelamento').value = dataFormatada;
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
        // CONFIRMAR CANCELAMENTO
        // ==========================================
        function confirmarCancelamento(event) {
            event.preventDefault();

            const id = document.getElementById('assinaturaId').value;
            const motivo = document.getElementById('motivoCancelamento').value;
            const descricao = document.getElementById('descricaoMotivo').value;
            const data = document.getElementById('dataCancelamento').value;
            const confirmar = document.getElementById('confirmarCancelamento').checked;

            if (!motivo) {
                mostrarToast('Por favor, selecione um motivo para o cancelamento.', 'error');
                document.getElementById('motivoCancelamento').focus();
                return;
            }

            if (!descricao || descricao.length < 10) {
                mostrarToast('Por favor, descreva o motivo com pelo menos 10 caracteres.', 'error');
                document.getElementById('descricaoMotivo').focus();
                return;
            }

            if (!data) {
                mostrarToast('Por favor, selecione a data de cancelamento.', 'error');
                document.getElementById('dataCancelamento').focus();
                return;
            }

            if (!confirmar) {
                mostrarToast('Por favor, confirme que pretende cancelar esta assinatura.', 'error');
                document.getElementById('confirmarCancelamento').focus();
                return;
            }

            // Simular cancelamento
            mostrarToast('A cancelar assinatura #' + id + '...', 'info');

            setTimeout(() => {
                mostrarToast('Assinatura #' + id + ' cancelada com sucesso!', 'success');
                setTimeout(() => {
                    window.location.href = 'assinatura-detalhe.php?id=' + id;
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
        /* CANCELAR ASSINATURA - CSS                  */
        /* ========================================== */

        /* ===== CONTAINER ===== */
        .cancelar-container {
            margin-bottom: var(--space-lg);
        }

        .cancelar-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--space-lg);
        }

        /* ===== CARDS ===== */
        .cancelar-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .cancelar-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .cancelar-card.cancelar-card-danger {
            border-color: rgba(255, 107, 107, 0.3);
            background: rgba(255, 107, 107, 0.05);
        }

        .cancelar-card.cancelar-card-danger .cancelar-card-header {
            border-bottom-color: rgba(255, 107, 107, 0.2);
        }

        .cancelar-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .cancelar-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .cancelar-card-header h3 i {
            color: #FFD93D;
        }

        .cancelar-card-header .obrigatorio-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .cancelar-card-body {
            padding: 20px;
        }

        /* ===== AVISO ===== */
        .aviso-container {
            text-align: center;
            padding: var(--space-md) 0;
        }

        .aviso-icon {
            font-size: 56px;
            color: #FF6B6B;
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
            border-color: #FF6B6B;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.15);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

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
            padding: 8px;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
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
            accent-color: #FF6B6B;
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
        .badge-categoria {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-categoria.categoria-individual {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .badge-categoria.categoria-empresarial {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-categoria.categoria-institucional {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

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

        .badge-status.status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-cancelado {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
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
            .cancelar-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .cancelar-card-header {
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
            .cancelar-card-body {
                padding: 14px;
            }
            
            .cancelar-card-header {
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