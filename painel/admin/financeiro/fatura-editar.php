<?php
// painel/admin/financeiro/fatura-editar.php - Editar Fatura
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Editar Fatura';
$pagina_atual = 'faturas';

// ===== OBTER ID DA FATURA =====
$id_fatura = isset($_GET['id']) ? $_GET['id'] : 'FAT-2026-001';

// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== DADOS COMPLETOS DE FATURAS =====
$faturas = [
    'FAT-2026-001' => [
        'id' => 'FAT-2026-001',
        'cliente' => 'Carlos Mendes',
        'cliente_tipo' => 'Individual',
        'cliente_avatar' => 'avatar-1.png',
        'cliente_email' => 'carlos.mendes@email.com',
        'cliente_telefone' => '+244 923 456 789',
        'cliente_endereco' => 'Rua 15, Nº 245, Luanda',
        'cliente_nif' => '123456789',
        'valor' => 25000,
        'status' => 'paga',
        'status_label' => 'Paga',
        'emissao' => '2026-02-01 10:00:00',
        'vencimento' => '2026-02-15',
        'descricao' => 'Mensalidade - Plano Pro',
        'categoria' => 'Assinatura',
        'assinatura_id' => 1,
        'itens' => [
            ['descricao' => 'Plano Pro - Mensalidade (Fevereiro 2026)', 'quantidade' => 1, 'valor_unitario' => 25000, 'total' => 25000]
        ],
        'pagamento_ref' => 'PAY-001',
        'data_pagamento' => '2026-02-15 10:30:00',
        'metodo_pagamento' => 'Multicaixa',
        'notas' => 'Pagamento confirmado. Cliente com bom histórico.',
        'created_at' => '2026-02-01 10:00:00',
        'updated_at' => '2026-02-15 10:35:00'
    ],
    'FAT-2026-003' => [
        'id' => 'FAT-2026-003',
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_email' => 'financas@itl.ao',
        'cliente_telefone' => '+244 222 456 789',
        'cliente_endereco' => 'Rua do Comércio, Nº 50, Luanda',
        'cliente_nif' => '456789123',
        'valor' => 125000,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'emissao' => '2026-02-05 14:30:00',
        'vencimento' => '2026-02-20',
        'descricao' => 'Trimestral - Plano Educação',
        'categoria' => 'Assinatura',
        'assinatura_id' => 4,
        'itens' => [
            ['descricao' => 'Plano Educação - Trimestral (Fev/Mar/Abr 2026)', 'quantidade' => 1, 'valor_unitario' => 125000, 'total' => 125000]
        ],
        'pagamento_ref' => null,
        'data_pagamento' => null,
        'metodo_pagamento' => null,
        'notas' => 'Aguardando comprovativo de pagamento.',
        'created_at' => '2026-02-05 14:30:00',
        'updated_at' => '2026-02-05 14:30:00'
    ],
];

// ===== OBTER FATURA ATUAL =====
$fatura = isset($faturas[$id_fatura]) ? $faturas[$id_fatura] : $faturas['FAT-2026-001'];

// ===== LISTA DE CLIENTES =====
$clientes = [
    ['id' => 1, 'nome' => 'Carlos Mendes', 'tipo' => 'Individual'],
    ['id' => 2, 'nome' => 'Construtora ABC', 'tipo' => 'Empresarial'],
    ['id' => 3, 'nome' => 'Ana Costa', 'tipo' => 'Individual'],
    ['id' => 4, 'nome' => 'Instituto Técnico de Luanda', 'tipo' => 'Institucional'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresarial'],
    ['id' => 6, 'nome' => 'Energia Futuro', 'tipo' => 'Empresarial'],
    ['id' => 7, 'nome' => 'Construtora Silva', 'tipo' => 'Empresarial'],
    ['id' => 8, 'nome' => 'Pedro Santos', 'tipo' => 'Individual'],
    ['id' => 9, 'nome' => 'Universidade Agostinho Neto', 'tipo' => 'Institucional'],
    ['id' => 10, 'nome' => 'ONG Esperança', 'tipo' => 'Institucional'],
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

function getStatusIcon($status) {
    $icons = [
        'paga' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'vencida' => 'fa-exclamation-circle',
        'cancelada' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
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
                        <i class="fas fa-edit icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status status-<?php echo $fatura['status']; ?>" style="font-size: 14px; padding: 4px 16px; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                            <?php echo $fatura['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="faturas.php">Faturas</a>
                        <span class="separator">/</span>
                        <span><?php echo $fatura['id']; ?></span>
                        <span class="separator">/</span>
                        <span>Editar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <button type="submit" form="formEditarFatura" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar Alterações
                        </button>
                        <a href="fatura-detalhe.php?id=<?php echo $fatura['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Cancelar
                        </a>
                        <button class="btn btn-danger" onclick="cancelarFatura('<?php echo $fatura['id']; ?>')">
                            <i class="fas fa-times"></i> Cancelar Fatura
                        </button>
                    </div>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- FORMULÁRIO DE EDIÇÃO                      -->
            <!-- ========================================== -->
            <div class="editar-container">
                <div class="editar-grid">
                    <!-- Coluna Principal -->
                    <div class="editar-coluna-principal">
                        <!-- Card: Formulário -->
                        <div class="editar-card">
                            <div class="editar-card-header">
                                <h3><i class="fas fa-edit"></i> Dados da Fatura</h3>
                                <span class="referencia-label">Nº: <?php echo $fatura['id']; ?></span>
                            </div>
                            <div class="editar-card-body">
                                <form id="formEditarFatura" onsubmit="salvarEdicao(event)">
                                    <input type="hidden" id="faturaId" value="<?php echo $fatura['id']; ?>">
                                    
                                    <!-- Cliente -->
                                    <div class="form-group">
                                        <label class="form-label">Cliente <span class="required">*</span></label>
                                        <select class="form-control" id="clienteFatura" required>
                                            <option value="">Selecione um cliente...</option>
                                            <?php foreach ($clientes as $cliente): ?>
                                                <option value="<?php echo $cliente['id']; ?>" 
                                                        <?php echo ($cliente['nome'] === $fatura['cliente']) ? 'selected' : ''; ?>
                                                        data-tipo="<?php echo strtolower($cliente['tipo']); ?>">
                                                    <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Descrição -->
                                    <div class="form-group">
                                        <label class="form-label">Descrição <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="descricaoFatura" 
                                               value="<?php echo $fatura['descricao']; ?>" 
                                               placeholder="Descrição da fatura" required>
                                    </div>

                                    <!-- Valor + Categoria -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Valor <span class="required">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">Kz</span>
                                                <input type="number" class="form-control" id="valorFatura" 
                                                       value="<?php echo $fatura['valor']; ?>" 
                                                       placeholder="0" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Categoria</label>
                                            <select class="form-control" id="categoriaFatura">
                                                <option value="Assinatura" <?php echo ($fatura['categoria'] === 'Assinatura') ? 'selected' : ''; ?>>Assinatura</option>
                                                <option value="Serviço" <?php echo ($fatura['categoria'] === 'Serviço') ? 'selected' : ''; ?>>Serviço</option>
                                                <option value="Produto" <?php echo ($fatura['categoria'] === 'Produto') ? 'selected' : ''; ?>>Produto</option>
                                                <option value="Outro" <?php echo ($fatura['categoria'] === 'Outro') ? 'selected' : ''; ?>>Outro</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Datas -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Data de Emissão</label>
                                            <input type="date" class="form-control" id="emissaoFatura" 
                                                   value="<?php echo date('Y-m-d', strtotime($fatura['emissao'])); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Data de Vencimento</label>
                                            <input type="date" class="form-control" id="vencimentoFatura" 
                                                   value="<?php echo date('Y-m-d', strtotime($fatura['vencimento'])); ?>">
                                        </div>
                                    </div>

                                    <!-- Status + Assinatura -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" id="statusFatura">
                                                <option value="pendente" <?php echo ($fatura['status'] === 'pendente') ? 'selected' : ''; ?>>Pendente</option>
                                                <option value="paga" <?php echo ($fatura['status'] === 'paga') ? 'selected' : ''; ?>>Paga</option>
                                                <option value="vencida" <?php echo ($fatura['status'] === 'vencida') ? 'selected' : ''; ?>>Vencida</option>
                                                <option value="cancelada" <?php echo ($fatura['status'] === 'cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Assinatura</label>
                                            <input type="text" class="form-control" id="assinaturaFatura" 
                                                   value="#<?php echo $fatura['assinatura_id']; ?>" disabled>
                                        </div>
                                    </div>

                                    <!-- Itens da Fatura -->
                                    <div class="form-group">
                                        <label class="form-label">Itens da Fatura</label>
                                        <div class="itens-container">
                                            <?php foreach ($fatura['itens'] as $index => $item): ?>
                                            <div class="item-row">
                                                <div class="item-descricao">
                                                    <input type="text" class="form-control" 
                                                           value="<?php echo $item['descricao']; ?>" 
                                                           placeholder="Descrição do item" 
                                                           id="item_descricao_<?php echo $index; ?>">
                                                </div>
                                                <div class="item-qtd">
                                                    <input type="number" class="form-control" 
                                                           value="<?php echo $item['quantidade']; ?>" 
                                                           placeholder="Qtd" 
                                                           id="item_qtd_<?php echo $index; ?>"
                                                           min="1">
                                                </div>
                                                <div class="item-valor">
                                                    <input type="number" class="form-control" 
                                                           value="<?php echo $item['valor_unitario']; ?>" 
                                                           placeholder="Valor" 
                                                           id="item_valor_<?php echo $index; ?>"
                                                           min="0">
                                                </div>
                                                <div class="item-total">
                                                    <span class="item-total-valor">Kz <?php echo formatMoney($item['total']); ?></span>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Notas -->
                                    <div class="form-group">
                                        <label class="form-label">Notas</label>
                                        <textarea class="form-control" id="notasFatura" rows="3" 
                                                  placeholder="Notas adicionais sobre a fatura"><?php echo $fatura['notas'] ?? ''; ?></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Coluna Lateral -->
                    <div class="editar-coluna-lateral">
                        <!-- Card: Resumo -->
                        <div class="editar-card">
                            <div class="editar-card-header">
                                <h3><i class="fas fa-info-circle"></i> Resumo</h3>
                            </div>
                            <div class="editar-card-body">
                                <div class="resumo-item">
                                    <span class="resumo-label">Nº da Fatura</span>
                                    <span class="resumo-value" style="font-family: 'Orbitron', sans-serif; color: #FFD93D;">
                                        <?php echo $fatura['id']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Cliente</span>
                                    <span class="resumo-value"><?php echo $fatura['cliente']; ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Valor</span>
                                    <span class="resumo-value" style="font-weight: 700; color: #FFD93D;">
                                        Kz <?php echo formatMoney($fatura['valor']); ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Status</span>
                                    <span class="badge-status status-<?php echo $fatura['status']; ?>">
                                        <i class="fas <?php echo getStatusIcon($fatura['status']); ?>"></i>
                                        <?php echo $fatura['status_label']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Data de Emissão</span>
                                    <span class="resumo-value"><?php echo formatDate($fatura['emissao']); ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Data de Vencimento</span>
                                    <span class="resumo-value"><?php echo formatDate($fatura['vencimento']); ?></span>
                                </div>
                                <?php if ($fatura['pagamento_ref']): ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Pagamento</span>
                                    <span class="resumo-value">
                                        <span style="color: #00FFA3;"><?php echo $fatura['pagamento_ref']; ?></span>
                                    </span>
                                </div>
                                <?php endif; ?>
                                <div class="resumo-item">
                                    <span class="resumo-label">Itens</span>
                                    <span class="resumo-value"><?php echo count($fatura['itens']); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Ações -->
                        <div class="editar-card">
                            <div class="editar-card-header">
                                <h3><i class="fas fa-tools"></i> Ações</h3>
                            </div>
                            <div class="editar-card-body">
                                <div class="acoes-lista">
                                    <button class="btn btn-primary" style="width: 100%; justify-content: center;" onclick="document.getElementById('formEditarFatura').submit()">
                                        <i class="fas fa-save"></i> Salvar Alterações
                                    </button>
                                    <a href="fatura-detalhe.php?id=<?php echo $fatura['id']; ?>" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-times"></i> Cancelar
                                    </a>
                                    <button class="btn btn-danger" style="width: 100%; justify-content: center;" onclick="cancelarFatura('<?php echo $fatura['id']; ?>')">
                                        <i class="fas fa-times"></i> Cancelar Fatura
                                    </button>
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
        // SALVAR EDIÇÃO
        // ==========================================
        function salvarEdicao(event) {
            event.preventDefault();

            const id = document.getElementById('faturaId').value;
            const cliente = document.getElementById('clienteFatura').value;
            const descricao = document.getElementById('descricaoFatura').value;
            const valor = document.getElementById('valorFatura').value;

            if (!cliente || !descricao || !valor) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast('Fatura ' + id + ' atualizada com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'fatura-detalhe.php?id=' + id;
            }, 1500);
        }

        // ==========================================
        // CANCELAR FATURA
        // ==========================================
        function cancelarFatura(id) {
            if (confirm('Tem certeza que deseja cancelar a fatura ' + id + '? Esta ação não pode ser desfeita.')) {
                mostrarToast('Fatura ' + id + ' cancelada com sucesso!', 'error');
                setTimeout(() => {
                    window.location.href = 'faturas.php';
                }, 1500);
            }
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
        /* EDITAR FATURA - CSS                        */
        /* ========================================== */

        /* ===== CONTAINER ===== */
        .editar-container {
            margin-bottom: var(--space-lg);
        }

        .editar-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--space-lg);
        }

        /* ===== CARDS ===== */
        .editar-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .editar-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .editar-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .editar-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .editar-card-header h3 i {
            color: #FFD93D;
        }

        .editar-card-header .referencia-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .editar-card-body {
            padding: 20px;
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

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
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
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-control:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
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
            min-height: 80px;
            font-family: var(--font-body);
        }

        /* ===== INPUT GROUP ===== */
        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group .input-group-text {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
            padding: 8px 12px;
            font-size: var(--text-sm);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .input-group .form-control {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
        }

        /* ===== ITENS DA FATURA ===== */
        .itens-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .item-row {
            display: grid;
            grid-template-columns: 3fr 0.8fr 1.2fr 1.2fr;
            gap: var(--space-sm);
            align-items: center;
            padding: var(--space-sm);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .item-descricao {
            grid-column: 1;
        }

        .item-qtd {
            grid-column: 2;
        }

        .item-qtd input {
            text-align: center;
        }

        .item-valor {
            grid-column: 3;
        }

        .item-total {
            grid-column: 4;
            text-align: right;
        }

        .item-total-valor {
            font-weight: 600;
            color: #FFD93D;
            font-size: var(--text-sm);
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

        .badge-status.status-paga {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-vencida {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-status.status-cancelada {
            background: rgba(107, 122, 143, 0.12);
            color: #6B7A8F;
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
            .editar-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }
            
            .editar-card-header {
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

            .item-row {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-xs);
                padding: var(--space-sm);
            }

            .item-descricao {
                grid-column: 1 / 3;
            }

            .item-qtd {
                grid-column: 1;
            }

            .item-valor {
                grid-column: 2;
            }

            .item-total {
                grid-column: 1 / 3;
                text-align: right;
                padding-top: var(--space-xs);
                border-top: 1px solid var(--border-color);
            }
        }

        @media (max-width: 480px) {
            .editar-card-body {
                padding: 14px;
            }
            
            .editar-card-header {
                padding: 12px 14px;
            }

            .item-row {
                grid-template-columns: 1fr;
                gap: var(--space-xs);
            }

            .item-descricao {
                grid-column: 1;
            }

            .item-qtd {
                grid-column: 1;
            }

            .item-valor {
                grid-column: 1;
            }

            .item-total {
                grid-column: 1;
                text-align: right;
                padding-top: var(--space-xs);
                border-top: 1px solid var(--border-color);
            }
        }
    </style>
</body>
</html>