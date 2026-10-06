<?php
// painel/admin/financeiro/assinatura-editar.php - Editar Assinatura
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Editar Assinatura';
$pagina_atual = 'assinaturas';

// ===== OBTER ID DA ASSINATURA =====
$id_assinatura = isset($_GET['id']) ? (int)$_GET['id'] : 1;

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
        'cliente_endereco' => 'Rua 15, Nº 245, Luanda',
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
        'cliente_endereco' => 'Av. 4 de Fevereiro, Nº 100, Luanda',
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
    4 => [
        'id' => 4,
        'cliente' => 'Instituto Técnico de Luanda',
        'cliente_tipo' => 'Institucional',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_email' => 'financas@itl.ao',
        'cliente_telefone' => '+244 222 456 789',
        'cliente_endereco' => 'Rua do Comércio, Nº 50, Luanda',
        'categoria' => 'institucional',
        'plano' => 'Educação',
        'valor' => 125000,
        'periodo' => 'Trimestral',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'inicio' => '2026-02-15',
        'fim' => '2026-05-15',
        'renovacao' => '2026-05-15',
        'metodo_pagamento' => 'Depósito Bancário',
        'ultimo_pagamento' => null,
        'proximo_pagamento' => '2026-02-15',
        'created_at' => '2026-02-10 11:20:00',
        'updated_at' => '2026-02-10 11:20:00',
        'notas' => 'Aguardando confirmação do primeiro pagamento. Comprovativo enviado por email.'
    ],
];

// ===== OBTER ASSINATURA ATUAL =====
$assinatura = isset($assinaturas[$id_assinatura]) ? $assinaturas[$id_assinatura] : $assinaturas[1];

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

// ===== PLANOS POR CATEGORIA =====
$planos = [
    'individual' => ['Básico', 'Pro', 'Premium'],
    'empresarial' => ['Startup', 'Business', 'Enterprise'],
    'institucional' => ['Educação', 'Governo', 'ONG']
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
                        <i class="fas fa-edit icon" style="color: #FFD93D;"></i>
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
                        <button type="submit" form="formEditarAssinatura" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar Alterações
                        </button>
                        <a href="assinatura-detalhe.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Cancelar
                        </a>
                        <?php if ($assinatura['status'] === 'ativo'): ?>
                        <a href="assinatura-cancelar.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-danger">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <?php endif; ?>
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
                                <h3><i class="fas fa-edit"></i> Dados da Assinatura</h3>
                                <span class="referencia-label">ID: #<?php echo $assinatura['id']; ?></span>
                            </div>
                            <div class="editar-card-body">
                                <form id="formEditarAssinatura" onsubmit="salvarEdicao(event)">
                                    <input type="hidden" id="assinaturaId" value="<?php echo $assinatura['id']; ?>">
                                    
                                    <!-- Cliente -->
                                    <div class="form-group">
                                        <label class="form-label">Cliente <span class="required">*</span></label>
                                        <select class="form-control" id="clienteAssinatura" required>
                                            <option value="">Selecione um cliente...</option>
                                            <?php foreach ($clientes as $cliente): ?>
                                                <option value="<?php echo $cliente['id']; ?>" 
                                                        <?php echo ($cliente['nome'] === $assinatura['cliente']) ? 'selected' : ''; ?>
                                                        data-tipo="<?php echo strtolower($cliente['tipo']); ?>">
                                                    <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Categoria + Plano -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Categoria <span class="required">*</span></label>
                                            <select class="form-control" id="categoriaAssinatura" required onchange="atualizarPlanos()">
                                                <option value="">Selecione uma categoria...</option>
                                                <option value="individual" <?php echo ($assinatura['categoria'] === 'individual') ? 'selected' : ''; ?>>Individual</option>
                                                <option value="empresarial" <?php echo ($assinatura['categoria'] === 'empresarial') ? 'selected' : ''; ?>>Empresarial</option>
                                                <option value="institucional" <?php echo ($assinatura['categoria'] === 'institucional') ? 'selected' : ''; ?>>Institucional</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Plano <span class="required">*</span></label>
                                            <select class="form-control" id="planoAssinatura" required>
                                                <option value="">Selecione um plano...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Valor + Período -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Valor <span class="required">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">Kz</span>
                                                <input type="number" class="form-control" id="valorAssinatura" 
                                                       value="<?php echo $assinatura['valor']; ?>" 
                                                       placeholder="0" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Período <span class="required">*</span></label>
                                            <select class="form-control" id="periodoAssinatura" required>
                                                <option value="Mensal" <?php echo ($assinatura['periodo'] === 'Mensal') ? 'selected' : ''; ?>>Mensal</option>
                                                <option value="Trimestral" <?php echo ($assinatura['periodo'] === 'Trimestral') ? 'selected' : ''; ?>>Trimestral</option>
                                                <option value="Semestral" <?php echo ($assinatura['periodo'] === 'Semestral') ? 'selected' : ''; ?>>Semestral</option>
                                                <option value="Anual" <?php echo ($assinatura['periodo'] === 'Anual') ? 'selected' : ''; ?>>Anual</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Método de Pagamento + Status -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Método de Pagamento</label>
                                            <select class="form-control" id="metodoAssinatura">
                                                <option value="Multicaixa" <?php echo ($assinatura['metodo_pagamento'] === 'Multicaixa') ? 'selected' : ''; ?>>Multicaixa</option>
                                                <option value="Transferência Bancária" <?php echo ($assinatura['metodo_pagamento'] === 'Transferência Bancária') ? 'selected' : ''; ?>>Transferência Bancária</option>
                                                <option value="Cartão de Crédito" <?php echo ($assinatura['metodo_pagamento'] === 'Cartão de Crédito') ? 'selected' : ''; ?>>Cartão de Crédito</option>
                                                <option value="Depósito Bancário" <?php echo ($assinatura['metodo_pagamento'] === 'Depósito Bancário') ? 'selected' : ''; ?>>Depósito Bancário</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Status <span class="required">*</span></label>
                                            <select class="form-control" id="statusAssinatura" required>
                                                <option value="ativo" <?php echo ($assinatura['status'] === 'ativo') ? 'selected' : ''; ?>>Ativo</option>
                                                <option value="pendente" <?php echo ($assinatura['status'] === 'pendente') ? 'selected' : ''; ?>>Pendente</option>
                                                <option value="cancelado" <?php echo ($assinatura['status'] === 'cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Datas -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Data de Início</label>
                                            <input type="date" class="form-control" id="inicioAssinatura" 
                                                   value="<?php echo $assinatura['inicio']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Data de Término</label>
                                            <input type="date" class="form-control" id="fimAssinatura" 
                                                   value="<?php echo $assinatura['fim']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label class="form-label">Próxima Renovação</label>
                                            <input type="date" class="form-control" id="renovacaoAssinatura" 
                                                   value="<?php echo $assinatura['renovacao']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Próximo Pagamento</label>
                                            <input type="date" class="form-control" id="proximoPagamento" 
                                                   value="<?php echo $assinatura['proximo_pagamento']; ?>">
                                        </div>
                                    </div>

                                    <!-- Notas -->
                                    <div class="form-group">
                                        <label class="form-label">Notas</label>
                                        <textarea class="form-control" id="notasAssinatura" rows="4" 
                                                  placeholder="Notas adicionais sobre a assinatura"><?php echo $assinatura['notas'] ?? ''; ?></textarea>
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
                                    <span class="resumo-label">ID</span>
                                    <span class="resumo-value" style="font-family: 'Orbitron', sans-serif; color: #FFD93D;">
                                        #<?php echo $assinatura['id']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Cliente</span>
                                    <span class="resumo-value"><?php echo $assinatura['cliente']; ?></span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Categoria</span>
                                    <span class="resumo-value">
                                        <span class="badge-categoria categoria-<?php echo $assinatura['categoria']; ?>" style="display: inline-flex; align-items: center; gap: 4px; padding: 2px 10px; border-radius: 20px; font-size: 12px;">
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
                                    <span class="resumo-label">Status</span>
                                    <span class="badge-status status-<?php echo $assinatura['status']; ?>">
                                        <i class="fas <?php echo getStatusIcon($assinatura['status']); ?>"></i>
                                        <?php echo $assinatura['status_label']; ?>
                                    </span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Criado em</span>
                                    <span class="resumo-value"><?php echo formatDateTime($assinatura['created_at']); ?></span>
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
                                    <button class="btn btn-primary" style="width: 100%; justify-content: center;" onclick="document.getElementById('formEditarAssinatura').submit()">
                                        <i class="fas fa-save"></i> Salvar Alterações
                                    </button>
                                    <a href="assinatura-detalhe.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-times"></i> Cancelar
                                    </a>
                                    <?php if ($assinatura['status'] === 'ativo'): ?>
                                    <a href="assinatura-cancelar.php?id=<?php echo $assinatura['id']; ?>" class="btn btn-danger" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-times"></i> Cancelar Assinatura
                                    </a>
                                    <?php endif; ?>
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
        // PLANOS POR CATEGORIA
        // ==========================================
        const planos = <?php echo json_encode($planos); ?>;
        const planoAtual = '<?php echo $assinatura['plano']; ?>';

        

        // ==========================================
        // ATUALIZAR PLANOS
        // ==========================================
        function atualizarPlanos() {
            const categoria = document.getElementById('categoriaAssinatura').value;
            const planoSelect = document.getElementById('planoAssinatura');

            planoSelect.innerHTML = '<option value="">Selecione um plano...</option>';

            if (categoria && planos[categoria]) {
                planos[categoria].forEach(function(plano) {
                    const option = document.createElement('option');
                    option.value = plano;
                    option.textContent = plano;
                    if (plano === planoAtual) {
                        option.selected = true;
                    }
                    planoSelect.appendChild(option);
                });
            }
        }

        // ==========================================
        // INICIALIZAR
        // ==========================================
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar planos
            atualizarPlanos();

            // Se houver plano atual, selecionar
            const planoSelect = document.getElementById('planoAssinatura');
            if (planoAtual) {
                for (let i = 0; i < planoSelect.options.length; i++) {
                    if (planoSelect.options[i].value === planoAtual) {
                        planoSelect.selectedIndex = i;
                        break;
                    }
                }
            }
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
        // SALVAR EDIÇÃO
        // ==========================================
        function salvarEdicao(event) {
            event.preventDefault();

            const id = document.getElementById('assinaturaId').value;
            const cliente = document.getElementById('clienteAssinatura').value;
            const categoria = document.getElementById('categoriaAssinatura').value;
            const plano = document.getElementById('planoAssinatura').value;
            const valor = document.getElementById('valorAssinatura').value;
            const status = document.getElementById('statusAssinatura').value;

            if (!cliente || !categoria || !plano || !valor) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast('Assinatura #' + id + ' atualizada com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'assinatura-detalhe.php?id=' + id;
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
        /* EDITAR ASSINATURA - CSS                    */
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

        optgroup {
            background: var(--bg-card);
            color: var(--text-primary);
            font-weight: 600;
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

        .badge-plano {
            display: inline-block;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
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
        }

        @media (max-width: 480px) {
            .editar-card-body {
                padding: 14px;
            }
            
            .editar-card-header {
                padding: 12px 14px;
            }
        }
    </style>
</body>
</html>