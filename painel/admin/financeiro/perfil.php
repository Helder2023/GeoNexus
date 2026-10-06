<?php
// painel/admin/financeiro/perfil.php - Perfil do Administrador Financeiro
include "../../../includes/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Meu Perfil';
$pagina_atual = 'perfil';

// ============================================
// DADOS MOCKADOS - ADMINISTRADOR FINANCEIRO
// ============================================
$admin = [
    'id' => 2,
    'nome' => 'Administrador Financeiro',
    'email' => 'financeiro@geonnexus.com',
    'telefone' => '+244 923 456 790',
    'cargo' => 'Gestor Financeiro',
    'departamento' => 'Departamento Financeiro',
    'biografia' => 'Responsável pela gestão financeira da plataforma GeoNexus, incluindo transações, assinaturas, pagamentos, faturas e comissões.',
    'avatar' => 'avatar-admin-financeiro.png',
    'cidade' => 'Luanda',
    'pais' => 'Angola',
    'data_registro' => '2024-03-10 09:00:00',
    'ultimo_acesso' => '2026-02-18 14:30:00',
    'ultimo_ip' => '192.168.1.102',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'nivel_acesso' => 'Admin Financeiro',
    'permissoes' => [
        'Gestão de Transações',
        'Gestão de Assinaturas',
        'Aprovação de Pagamentos',
        'Emissão de Faturas',
        'Gestão de Comissões',
        'Relatórios Financeiros',
        'Comprovativos'
    ],
    'estatisticas' => [
        'total_logins' => 215,
        'transacoes_processadas' => 342,
        'pagamentos_aprovados' => 156,
        'valor_processado' => 12800000,
        'tempo_ativo' => '1 ano, 11 meses'
    ]
];

// ============================================
// ATIVIDADE RECENTE - FINANCEIRO
// ============================================
$atividades_recentes = [
    [
        'id' => 1,
        'icon' => 'fa-check-circle',
        'icon_class' => 'green',
        'acao' => 'Pagamento aprovado',
        'detalhes' => 'Pagamento #PAY-045 de Kz 250.000 aprovado',
        'data' => '2026-02-18 14:25:00',
        'ip' => '192.168.1.102'
    ],
    [
        'id' => 2,
        'icon' => 'fa-file-invoice',
        'icon_class' => 'aurora',
        'acao' => 'Fatura emitida',
        'detalhes' => 'Fatura #FT-2026-0342 para Construtora ABC',
        'data' => '2026-02-18 11:50:00',
        'ip' => '192.168.1.102'
    ],
    [
        'id' => 3,
        'icon' => 'fa-exchange-alt',
        'icon_class' => 'geo',
        'acao' => 'Transação registada',
        'detalhes' => 'Receita de Kz 75.000 - Plano Enterprise',
        'data' => '2026-02-18 10:30:00',
        'ip' => '192.168.1.102'
    ],
    [
        'id' => 4,
        'icon' => 'fa-times-circle',
        'icon_class' => 'red',
        'acao' => 'Pagamento rejeitado',
        'detalhes' => 'Pagamento #PAY-042 rejeitado - comprovativo inválido',
        'data' => '2026-02-17 16:45:00',
        'ip' => '192.168.1.102'
    ],
    [
        'id' => 5,
        'icon' => 'fa-crown',
        'icon_class' => 'yellow',
        'acao' => 'Assinatura renovada',
        'detalhes' => 'Plano Business renovado - Mineração Progresso',
        'data' => '2026-02-17 14:20:00',
        'ip' => '192.168.1.102'
    ]
];

// ============================================
// SESSÕES ATIVAS
// ============================================
$sessoes_ativas = [
    [
        'id' => 1,
        'dispositivo' => 'Windows 11 - Chrome',
        'localizacao' => 'Luanda, Angola',
        'ip' => '192.168.1.102',
        'data' => '2026-02-18 14:30:00',
        'atual' => true
    ],
    [
        'id' => 2,
        'dispositivo' => 'Android - Chrome',
        'localizacao' => 'Luanda, Angola',
        'ip' => '192.168.1.103',
        'data' => '2026-02-17 09:15:00',
        'atual' => false
    ]
];

// ============================================
// RESUMO FINANCEIRO PESSOAL
// ============================================
$resumo_financeiro = [
    'transacoes_hoje' => 12,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas_mes' => 45,
    'valor_processado_mes' => 2450000
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    return date('d/m/Y H:i', strtotime($datetime));
}

function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y', strtotime($date));
}

function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=120';
}

function timeAgo($datetime) {
    if (empty($datetime)) return 'N/A';
    $diff = time() - strtotime($datetime);
    if ($diff < 60) return 'há ' . $diff . ' segundos';
    if ($diff < 3600) return 'há ' . floor($diff / 60) . ' minutos';
    if ($diff < 86400) return 'há ' . floor($diff / 3600) . ' horas';
    if ($diff < 604800) return 'há ' . floor($diff / 86400) . ' dias';
    return date('d/m/Y', strtotime($datetime));
}

// ============================================
// BOTTOM NAV ITEMS - FINANCEIRO
// ============================================
$bottom_nav_items = [
    ['icon' => 'fa-arrow-left', 'label' => 'Voltar', 'link' => '../../../index.php', 'active' => false],
    ['icon' => 'fa-chart-pie', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-exchange-alt', 'label' => 'Transações', 'link' => 'transacoes.php', 'active' => false],
    ['icon' => 'fa-crown', 'label' => 'Assinaturas', 'link' => 'assinaturas.php', 'active' => false],
    ['icon' => 'fa-credit-card', 'label' => 'Pagamentos', 'link' => 'pagamentos.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];

$perfil_menu = [
    ['icon' => 'fa-user-cog', 'label' => 'Meu Perfil', 'link' => 'perfil.php', 'active' => true],
    ['icon' => 'fa-sliders-h', 'label' => 'Configurações', 'link' => 'configuracoes.php', 'active' => false],
    ['icon' => 'fa-moon', 'label' => 'Tema Escuro', 'link' => '#', 'class' => 'theme-toggle'],
    ['icon' => 'fa-sign-out-alt', 'label' => 'Sair', 'link' => '../../../public/logout.php', 'class' => 'logout-link'],
];
?>
<!DOCTYPE html>
<html lang="pt">
<?php include "../../../includes/admin-financeiro-head.php" ?>

<body>
<div class="app-container">
    <div id="toast-container" class="toast-container"></div>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="fecharSidebarMobile()"></div>

    <!-- ========================================== -->
    <!-- SIDEBAR FINANCEIRO                         -->
    <!-- ========================================== -->
    <?php include "../../../includes/admin-financeiro-sidebar.php"; ?>

    <!-- ========================================== -->
    <!-- BOTTOM NAVIGATION - MOBILE                 -->
    <!-- ========================================== -->
    <nav class="bottom-nav" id="bottomNav">
        <div class="nav-items">
            <a href="../../../index.php" class="nav-item" title="Dashboard Principal">
                <i class="fas fa-arrow-left"></i>
                <span>Voltar</span>
            </a>
            <a href="index.php" class="nav-item">
                <i class="fas fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
            <a href="transacoes.php" class="nav-item">
                <i class="fas fa-exchange-alt"></i>
                <span>Transações</span>
                <span class="badge"><?php echo $stats['transacoes_total'] ?? 342; ?></span>
            </a>
            <a href="assinaturas.php" class="nav-item">
                <i class="fas fa-crown"></i>
                <span>Assinaturas</span>
                <span class="badge"><?php echo $stats['assinaturas_ativas'] ?? 156; ?></span>
            </a>
            <a href="pagamentos.php" class="nav-item">
                <i class="fas fa-credit-card"></i>
                <span>Pagamentos</span>
                <span class="badge badge-warning"><?php echo $stats['pagamentos_pendentes'] ?? 23; ?></span>
            </a>
            <a href="#" class="nav-item menu-toggle" id="bottomMenuToggle" onclick="toggleSidebarMobile(event)">
                <i class="fas fa-bars"></i>
                <span>Menu</span>
                <span class="badge" id="bottomNotifBadge"><?php echo $notificacoes_count; ?></span>
            </a>
        </div>
    </nav>

    <!-- ========================================== -->
    <!-- MAIN CONTENT                              -->
    <!-- ========================================== -->
    <main class="main-content">
        <!-- ===== PAGE HEADER ===== -->
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-user-circle icon" style="color: #FFD93D;"></i>
                    <?php echo $titulo_pagina; ?>
                    <span class="badge-role"><?php echo $admin['nivel_acesso']; ?></span>
                </h1>
                <p class="breadcrumb">
                    <a href="../../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Financeiro</a>
                    <span class="separator">/</span>
                    <span>Perfil</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>
                
                <div class="header-actions">
                    <a href="index.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
        </header>

        <!-- ========================================== -->
        <!-- PERFIL CONTAINER                          -->
        <!-- ========================================== -->
        <div class="perfil-container">
            <div class="perfil-grid">
                
                <!-- ========================================== -->
                <!-- COLUNA LATERAL - CARD DE PERFIL            -->
                <!-- ========================================== -->
                <div class="perfil-coluna-lateral">
                    <!-- Card: Avatar e Info -->
                    <div class="perfil-card">
                        <div class="perfil-card-body perfil-avatar-section">
                            <div class="perfil-avatar-wrapper">
                                <img src="../../../assets/images/<?php echo $admin['avatar']; ?>" 
                                     alt="<?php echo $admin['nome']; ?>" 
                                     class="perfil-avatar"
                                     onerror="this.src='<?php echo getAvatarUrl($admin['nome']); ?>'">
                                <button class="avatar-upload-btn" onclick="document.getElementById('avatarInput').click()" title="Alterar foto">
                                    <i class="fas fa-camera"></i>
                                </button>
                                <input type="file" id="avatarInput" accept="image/*" style="display: none;" onchange="previewAvatar(event)">
                            </div>
                            <h2 class="perfil-nome"><?php echo $admin['nome']; ?></h2>
                            <p class="perfil-cargo"><?php echo $admin['cargo']; ?></p>
                            <span class="badge-status status-<?php echo $admin['status']; ?>">
                                <span class="status-dot"></span>
                                <?php echo $admin['status_label']; ?>
                            </span>
                            
                            <div class="perfil-meta">
                                <div class="perfil-meta-item">
                                    <i class="fas fa-envelope"></i>
                                    <span><?php echo $admin['email']; ?></span>
                                </div>
                                <div class="perfil-meta-item">
                                    <i class="fas fa-phone"></i>
                                    <span><?php echo $admin['telefone']; ?></span>
                                </div>
                                <div class="perfil-meta-item">
                                    <i class="fas fa-building"></i>
                                    <span><?php echo $admin['departamento']; ?></span>
                                </div>
                                <div class="perfil-meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo $admin['cidade']; ?>, <?php echo $admin['pais']; ?></span>
                                </div>
                                <div class="perfil-meta-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>Membro desde <?php echo formatDate($admin['data_registro']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Nível de Acesso -->
                    <div class="perfil-card">
                        <div class="perfil-card-header">
                            <h3><i class="fas fa-shield-alt"></i> Nível de Acesso</h3>
                        </div>
                        <div class="perfil-card-body">
                            <div class="nivel-acesso">
                                <span class="nivel-badge financeiro"><?php echo $admin['nivel_acesso']; ?></span>
                            </div>
                            <div class="permissoes-list">
                                <?php foreach ($admin['permissoes'] as $permissao): ?>
                                    <div class="permissao-item">
                                        <i class="fas fa-check-circle"></i>
                                        <span><?php echo $permissao; ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Resumo Financeiro Pessoal -->
                    <div class="perfil-card">
                        <div class="perfil-card-header">
                            <h3><i class="fas fa-chart-line"></i> Resumo Financeiro</h3>
                        </div>
                        <div class="perfil-card-body">
                            <div class="resumo-financeiro-item">
                                <div class="resumo-financeiro-icon green">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="resumo-financeiro-info">
                                    <span class="resumo-financeiro-label">Transações Hoje</span>
                                    <span class="resumo-financeiro-valor"><?php echo $resumo_financeiro['transacoes_hoje']; ?></span>
                                </div>
                            </div>
                            <div class="resumo-financeiro-item">
                                <div class="resumo-financeiro-icon yellow">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="resumo-financeiro-info">
                                    <span class="resumo-financeiro-label">Pagamentos Pendentes</span>
                                    <span class="resumo-financeiro-valor"><?php echo $resumo_financeiro['pagamentos_pendentes']; ?></span>
                                </div>
                            </div>
                            <div class="resumo-financeiro-item">
                                <div class="resumo-financeiro-icon aurora">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                                <div class="resumo-financeiro-info">
                                    <span class="resumo-financeiro-label">Faturas Emitidas (Mês)</span>
                                    <span class="resumo-financeiro-valor"><?php echo $resumo_financeiro['faturas_emitidas_mes']; ?></span>
                                </div>
                            </div>
                            <div class="resumo-financeiro-item">
                                <div class="resumo-financeiro-icon blue">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div class="resumo-financeiro-info">
                                    <span class="resumo-financeiro-label">Valor Processado (Mês)</span>
                                    <span class="resumo-financeiro-valor">Kz <?php echo formatMoney($resumo_financeiro['valor_processado_mes']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Estatísticas -->
                    <div class="perfil-card">
                        <div class="perfil-card-header">
                            <h3><i class="fas fa-chart-bar"></i> Estatísticas</h3>
                        </div>
                        <div class="perfil-card-body">
                            <div class="stat-item">
                                <span class="stat-label">Total de Logins</span>
                                <span class="stat-value"><?php echo $admin['estatisticas']['total_logins']; ?></span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Transações Processadas</span>
                                <span class="stat-value"><?php echo $admin['estatisticas']['transacoes_processadas']; ?></span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Pagamentos Aprovados</span>
                                <span class="stat-value"><?php echo $admin['estatisticas']['pagamentos_aprovados']; ?></span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Valor Processado (Total)</span>
                                <span class="stat-value" style="color: #FFD93D;">Kz <?php echo formatMoney($admin['estatisticas']['valor_processado']); ?></span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-label">Tempo Ativo</span>
                                <span class="stat-value"><?php echo $admin['estatisticas']['tempo_ativo']; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Sessões Ativas -->
                    <div class="perfil-card">
                        <div class="perfil-card-header">
                            <h3><i class="fas fa-desktop"></i> Sessões Ativas</h3>
                        </div>
                        <div class="perfil-card-body">
                            <?php foreach ($sessoes_ativas as $sessao): ?>
                                <div class="sessao-item <?php echo $sessao['atual'] ? 'sessao-atual' : ''; ?>">
                                    <div class="sessao-icon">
                                        <i class="fas <?php echo strpos($sessao['dispositivo'], 'Android') !== false || strpos($sessao['dispositivo'], 'iPhone') !== false ? 'fa-mobile-alt' : 'fa-desktop'; ?>"></i>
                                    </div>
                                    <div class="sessao-info">
                                        <span class="sessao-dispositivo"><?php echo $sessao['dispositivo']; ?></span>
                                        <span class="sessao-local"><?php echo $sessao['localizacao']; ?></span>
                                        <span class="sessao-data"><?php echo timeAgo($sessao['data']); ?></span>
                                    </div>
                                    <?php if ($sessao['atual']): ?>
                                        <span class="sessao-badge">Atual</span>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-outline" onclick="encerrarSessao(<?php echo $sessao['id']; ?>)" title="Encerrar sessão">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- COLUNA PRINCIPAL - FORMULÁRIOS             -->
                <!-- ========================================== -->
                <div class="perfil-coluna-principal">
                    
                    <!-- ========================================== -->
                    <!-- CARD: DADOS PESSOAIS                       -->
                    <!-- ========================================== -->
                    <div class="perfil-card">
                        <div class="perfil-card-header">
                            <h3><i class="fas fa-user-edit"></i> Dados Pessoais</h3>
                            <button type="submit" form="formDadosPessoais" class="btn btn-sm btn-primary">
                                <i class="fas fa-save"></i> Guardar
                            </button>
                        </div>
                        <div class="perfil-card-body">
                            <form id="formDadosPessoais" onsubmit="guardarDadosPessoais(event)">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Nome Completo <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="nome" 
                                               value="<?php echo htmlspecialchars($admin['nome']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" id="email" 
                                               value="<?php echo htmlspecialchars($admin['email']); ?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Telefone</label>
                                        <input type="tel" class="form-control" id="telefone" 
                                               value="<?php echo htmlspecialchars($admin['telefone']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Cargo</label>
                                        <input type="text" class="form-control" id="cargo" 
                                               value="<?php echo htmlspecialchars($admin['cargo']); ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Departamento</label>
                                        <input type="text" class="form-control" id="departamento" 
                                               value="<?php echo htmlspecialchars($admin['departamento']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nível de Acesso</label>
                                        <input type="text" class="form-control" id="nivel_acesso" 
                                               value="<?php echo htmlspecialchars($admin['nivel_acesso']); ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" 
                                               value="<?php echo htmlspecialchars($admin['cidade']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">País</label>
                                        <input type="text" class="form-control" id="pais" 
                                               value="<?php echo htmlspecialchars($admin['pais']); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Biografia</label>
                                    <textarea class="form-control" id="biografia" rows="3" 
                                              placeholder="Fale um pouco sobre você..."><?php echo htmlspecialchars($admin['biografia']); ?></textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- ========================================== -->
                    <!-- CARD: ALTERAR PALAVRA-PASSE                -->
                    <!-- ========================================== -->
                    <div class="perfil-card">
                        <div class="perfil-card-header">
                            <h3><i class="fas fa-lock"></i> Alterar Palavra-passe</h3>
                        </div>
                        <div class="perfil-card-body">
                            <form id="formAlterarSenha" onsubmit="alterarSenha(event)">
                                <div class="form-group">
                                    <label class="form-label">Palavra-passe Atual <span class="required">*</span></label>
                                    <div class="input-password">
                                        <input type="password" class="form-control" id="senhaAtual" 
                                               placeholder="Digite a sua palavra-passe atual" required>
                                        <button type="button" class="toggle-password" onclick="togglePassword('senhaAtual', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Nova Palavra-passe <span class="required">*</span></label>
                                        <div class="input-password">
                                            <input type="password" class="form-control" id="novaSenha" 
                                                   placeholder="Digite a nova palavra-passe" required
                                                   oninput="verificarForcaSenha(this.value)">
                                            <button type="button" class="toggle-password" onclick="togglePassword('novaSenha', this)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="forca-senha" id="forcaSenha">
                                            <div class="forca-barra">
                                                <div class="forca-preenchimento" id="forcaPreenchimento"></div>
                                            </div>
                                            <span class="forca-texto" id="forcaTexto">Digite uma palavra-passe</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirmar Palavra-passe <span class="required">*</span></label>
                                        <div class="input-password">
                                            <input type="password" class="form-control" id="confirmarSenha" 
                                                   placeholder="Confirme a nova palavra-passe" required>
                                            <button type="button" class="toggle-password" onclick="togglePassword('confirmarSenha', this)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="requisitos-senha">
                                    <h4><i class="fas fa-shield-alt"></i> Requisitos da palavra-passe:</h4>
                                    <ul>
                                        <li id="req-minimo"><i class="fas fa-circle"></i> Mínimo de 8 caracteres</li>
                                        <li id="req-maiuscula"><i class="fas fa-circle"></i> Pelo menos uma letra maiúscula</li>
                                        <li id="req-minuscula"><i class="fas fa-circle"></i> Pelo menos uma letra minúscula</li>
                                        <li id="req-numero"><i class="fas fa-circle"></i> Pelo menos um número</li>
                                        <li id="req-especial"><i class="fas fa-circle"></i> Pelo menos um caractere especial (!@#$%^&*)</li>
                                    </ul>
                                </div>

                                <div class="form-acoes">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-key"></i> Alterar Palavra-passe
                                    </button>
                                    <button type="button" class="btn btn-outline" onclick="document.getElementById('formAlterarSenha').reset(); resetarForcaSenha();">
                                        <i class="fas fa-undo"></i> Limpar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- ========================================== -->
                    <!-- CARD: ATIVIDADE RECENTE                    -->
                    <!-- ========================================== -->
                    <div class="perfil-card">
                        <div class="perfil-card-header">
                            <h3><i class="fas fa-history"></i> Atividade Recente</h3>
                            <a href="relatorios-financeiros.php" class="btn btn-sm btn-outline">Ver Relatórios</a>
                        </div>
                        <div class="perfil-card-body">
                            <div class="atividades-list">
                                <?php foreach ($atividades_recentes as $atividade): ?>
                                    <div class="atividade-item">
                                        <div class="atividade-icon <?php echo $atividade['icon_class']; ?>">
                                            <i class="fas <?php echo $atividade['icon']; ?>"></i>
                                        </div>
                                        <div class="atividade-conteudo">
                                            <span class="atividade-acao"><?php echo $atividade['acao']; ?></span>
                                            <span class="atividade-detalhes"><?php echo $atividade['detalhes']; ?></span>
                                            <div class="atividade-meta">
                                                <span class="atividade-data"><i class="far fa-clock"></i> <?php echo timeAgo($atividade['data']); ?></span>
                                                <span class="atividade-ip"><i class="fas fa-network-wired"></i> <?php echo $atividade['ip']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

<!-- ========================================== -->
<!-- MODAL: CONFIRMAÇÃO DE SESSÃO              -->
<!-- ========================================== -->
<div class="modal" id="modalConfirmacao">
    <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
    <div class="modal-content" style="max-width: 420px;">
        <div class="modal-header">
            <h3 class="modal-title">
                <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar
            </h3>
            <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
        </div>
        <div class="modal-body" id="confirmacaoCorpo">
            <p>Tem certeza que deseja encerrar esta sessão?</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
            <button class="btn btn-danger" id="confirmacaoBtn">
                <i class="fas fa-sign-out-alt"></i> Encerrar
            </button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- SCRIPTS                                    -->
<!-- ========================================== -->
<script src="../../../assets/js/main.js"></script>
<script>
// ============================================
// DADOS MOCKADOS PARA NOTIFICAÇÕES
// ============================================

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

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
            document.querySelectorAll('.modal.active').forEach(modal => {
                fecharModal(modal.id);
            });
        }
    });

    // Theme
    const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);

    document.getElementById('btnTheme')?.addEventListener('click', function() {
        const current = document.documentElement.getAttribute('data-theme');
        const newTheme = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('geonnexus-theme', newTheme);
        mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
    });

    // Notificações
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

    // Perfil dropdown
    const btnPerfil = document.getElementById('btnPerfil');
    const perfilDrop = document.getElementById('perfilDropdown');

    if (btnPerfil && perfilDrop) {
        btnPerfil.addEventListener('click', function(e) {
            e.stopPropagation();
            perfilDrop.classList.toggle('active');
        });

        document.addEventListener('click', function(e) {
            if (!perfilDrop.contains(e.target) && !btnPerfil.contains(e.target)) {
                perfilDrop.classList.remove('active');
            }
        });
    }
});

// ============================================
// TOGGLE SIDEBAR MOBILE
// ============================================
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

        document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
    }
}

function fecharSidebarMobile() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (sidebar) {
        sidebar.classList.remove('open');
        if (overlay) overlay.classList.remove('active');

        const menuBtn = document.getElementById('bottomMenuToggle');
        if (menuBtn) {
            const icon = menuBtn.querySelector('i');
            if (icon) icon.className = 'fas fa-bars';
        }

        document.body.style.overflow = '';
    }
}

document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('bottomMenuToggle');

    if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
        if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
            fecharSidebarMobile();
        }
    }
});

// ============================================
// AVATAR PREVIEW
// ============================================
function previewAvatar(event) {
    const file = event.target.files[0];
    if (!file) return;
    
    if (file.size > 5 * 1024 * 1024) {
        mostrarToast('A imagem deve ter no máximo 5MB', 'error');
        return;
    }
    
    const reader = new FileReader();
    reader.onload = function(e) {
        document.querySelector('.perfil-avatar').src = e.target.result;
        mostrarToast('Foto de perfil atualizada!', 'success');
    };
    reader.readAsDataURL(file);
}

// ============================================
// GUARDAR DADOS PESSOAIS
// ============================================
function guardarDadosPessoais(event) {
    event.preventDefault();
    
    const nome = document.getElementById('nome').value.trim();
    const email = document.getElementById('email').value.trim();
    
    if (!nome || !email) {
        mostrarToast('Nome e email são obrigatórios!', 'error');
        return;
    }
    
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        mostrarToast('Email inválido!', 'error');
        return;
    }
    
    mostrarToast('Dados pessoais guardados com sucesso!', 'success');
}

// ============================================
// TOGGLE PASSWORD VISIBILITY
// ============================================
function togglePassword(inputId, btn) {
    const input = document.getElementById(inputId);
    const icon = btn.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'fas fa-eye-slash';
    } else {
        input.type = 'password';
        icon.className = 'fas fa-eye';
    }
}

// ============================================
// VERIFICAR FORÇA DA SENHA
// ============================================
function verificarForcaSenha(senha) {
    const preenchimento = document.getElementById('forcaPreenchimento');
    const texto = document.getElementById('forcaTexto');
    
    const reqMinimo = senha.length >= 8;
    const reqMaiuscula = /[A-Z]/.test(senha);
    const reqMinuscula = /[a-z]/.test(senha);
    const reqNumero = /[0-9]/.test(senha);
    const reqEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(senha);
    
    atualizarRequisito('req-minimo', reqMinimo);
    atualizarRequisito('req-maiuscula', reqMaiuscula);
    atualizarRequisito('req-minuscula', reqMinuscula);
    atualizarRequisito('req-numero', reqNumero);
    atualizarRequisito('req-especial', reqEspecial);
    
    const requisitosAtendidos = [reqMinimo, reqMaiuscula, reqMinuscula, reqNumero, reqEspecial].filter(Boolean).length;
    
    let forca = 0;
    let cor = '#FF6B6B';
    let label = 'Muito fraca';
    
    if (senha.length === 0) {
        forca = 0;
        cor = 'transparent';
        label = 'Digite uma palavra-passe';
    } else if (requisitosAtendidos <= 1) {
        forca = 20;
        cor = '#FF6B6B';
        label = 'Muito fraca';
    } else if (requisitosAtendidos === 2) {
        forca = 40;
        cor = '#FF9F43';
        label = 'Fraca';
    } else if (requisitosAtendidos === 3) {
        forca = 60;
        cor = '#FFD93D';
        label = 'Média';
    } else if (requisitosAtendidos === 4) {
        forca = 80;
        cor = '#00D2FF';
        label = 'Forte';
    } else {
        forca = 100;
        cor = '#00FFA3';
        label = 'Muito forte';
    }
    
    preenchimento.style.width = forca + '%';
    preenchimento.style.background = cor;
    texto.textContent = label;
    texto.style.color = cor;
}

function atualizarRequisito(id, atendido) {
    const el = document.getElementById(id);
    const icon = el.querySelector('i');
    
    if (atendido) {
        icon.className = 'fas fa-check-circle';
        el.classList.add('atendido');
    } else {
        icon.className = 'fas fa-circle';
        el.classList.remove('atendido');
    }
}

function resetarForcaSenha() {
    document.getElementById('forcaPreenchimento').style.width = '0%';
    document.getElementById('forcaTexto').textContent = 'Digite uma palavra-passe';
    document.getElementById('forcaTexto').style.color = 'var(--text-muted)';
    
    ['req-minimo', 'req-maiuscula', 'req-minuscula', 'req-numero', 'req-especial'].forEach(id => {
        const el = document.getElementById(id);
        el.querySelector('i').className = 'fas fa-circle';
        el.classList.remove('atendido');
    });
}

// ============================================
// ALTERAR SENHA
// ============================================
function alterarSenha(event) {
    event.preventDefault();
    
    const senhaAtual = document.getElementById('senhaAtual').value;
    const novaSenha = document.getElementById('novaSenha').value;
    const confirmarSenha = document.getElementById('confirmarSenha').value;
    
    if (!senhaAtual || !novaSenha || !confirmarSenha) {
        mostrarToast('Preencha todos os campos!', 'error');
        return;
    }
    
    if (novaSenha !== confirmarSenha) {
        mostrarToast('As palavras-passe não coincidem!', 'error');
        return;
    }
    
    if (novaSenha.length < 8) {
        mostrarToast('A palavra-passe deve ter pelo menos 8 caracteres!', 'error');
        return;
    }
    
    if (!/[A-Z]/.test(novaSenha)) {
        mostrarToast('A palavra-passe deve conter pelo menos uma letra maiúscula!', 'error');
        return;
    }
    
    if (!/[0-9]/.test(novaSenha)) {
        mostrarToast('A palavra-passe deve conter pelo menos um número!', 'error');
        return;
    }
    
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(novaSenha)) {
        mostrarToast('A palavra-passe deve conter pelo menos um caractere especial!', 'error');
        return;
    }
    
    mostrarToast('Palavra-passe alterada com sucesso!', 'success');
    document.getElementById('formAlterarSenha').reset();
    resetarForcaSenha();
}

// ============================================
// ENCERRAR SESSÃO
// ============================================
function encerrarSessao(id) {
    document.getElementById('modalConfirmacao').classList.add('active');
    document.body.style.overflow = 'hidden';
    
    document.getElementById('confirmacaoBtn').onclick = function() {
        fecharModal('modalConfirmacao');
        mostrarToast('Sessão encerrada com sucesso!', 'success');
        setTimeout(() => location.reload(), 1000);
    };
}

// ============================================
// NOTIFICAÇÕES
// ============================================
function carregarNotificacoes() {
    const list = document.getElementById('notifList');
    if (!list) return;

    let html = '';
    mockNotificacoes.forEach(n => {
        html += `
            <div class="notificacao-item ${n.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${n.id})">
                <div class="notif-icon ${n.icon_class}">
                    <i class="fas ${n.icon}"></i>
                </div>
                <div class="notif-conteudo">
                    <p>${n.mensagem}</p>
                    <span class="notif-tempo">${n.tempo}</span>
                </div>
                ${!n.lida ? '<span class="notif-dot"></span>' : ''}
            </div>
        `;
    });

    list.innerHTML = html || `
        <div class="notificacao-vazia">
            <i class="fas fa-bell-slash"></i>
            <p>Nenhuma notificação</p>
        </div>
    `;
}

function marcarNotificacaoLida(id) {
    const notif = mockNotificacoes.find(n => n.id === id);
    if (notif) {
        notif.lida = true;
        atualizarBadge();
        carregarNotificacoes();
    }
}

function marcarTodasLidas() {
    mockNotificacoes.forEach(n => n.lida = true);
    atualizarBadge();
    carregarNotificacoes();
    mostrarToast('Todas as notificações marcadas como lidas', 'success');
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
    document.getElementById('notificacoesDropdown')?.classList.remove('active');
}

// ============================================
// TOAST
// ============================================
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

// ============================================
// MODAIS
// ============================================
function fecharModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}
</script>

<style>
/* ========================================== */
/* PERFIL FINANCEIRO - CSS COMPLETO           */
/* ========================================== */

/* ===== BADGE ROLE ===== */
.badge-role {
    display: inline-block;
    padding: 2px 12px;
    background: rgba(255, 217, 61, 0.15);
    color: #FFD93D;
    border: 1px solid rgba(255, 217, 61, 0.3);
    border-radius: var(--radius-full);
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-left: 8px;
}

/* ===== CONTAINER ===== */
.perfil-container {
    margin-bottom: var(--space-lg);
}

.perfil-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: var(--space-lg);
}

/* ===== CARDS ===== */
.perfil-card {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border-color);
    overflow: hidden;
    margin-bottom: var(--space-lg);
    transition: var(--transition-smooth);
}

.perfil-card:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

.perfil-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
}

.perfil-card-header h3 {
    font-family: var(--font-title);
    font-size: var(--text-h4);
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.perfil-card-header h3 i {
    color: #FFD93D;
}

.perfil-card-body {
    padding: 20px;
}

/* ===== AVATAR SECTION ===== */
.perfil-avatar-section {
    text-align: center;
}

.perfil-avatar-wrapper {
    position: relative;
    display: inline-block;
    margin-bottom: var(--space-md);
}

.perfil-avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--border-color);
    transition: var(--transition-smooth);
}

.perfil-avatar:hover {
    border-color: #FFD93D;
}

.avatar-upload-btn {
    position: absolute;
    bottom: 4px;
    right: 4px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
    color: #0A1628;
    border: 3px solid var(--bg-card);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition-smooth);
    font-size: 14px;
}

.avatar-upload-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 16px rgba(255, 217, 61, 0.4);
}

.perfil-nome {
    font-family: var(--font-title);
    font-size: var(--text-h3);
    color: var(--text-primary);
    margin: 0 0 4px 0;
}

.perfil-cargo {
    font-size: var(--text-sm);
    color: var(--text-muted);
    margin: 0 0 var(--space-sm) 0;
}

.perfil-meta {
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
    margin-top: var(--space-md);
    padding-top: var(--space-md);
    border-top: 1px solid var(--border-color);
}

.perfil-meta-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: var(--text-sm);
    color: var(--text-secondary);
}

.perfil-meta-item i {
    width: 18px;
    color: #FFD93D;
    font-size: 14px;
}

/* ===== BADGE STATUS ===== */
.badge-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 14px;
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 500;
}

.badge-status .status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
}

.badge-status.status-ativo {
    background: rgba(0, 255, 163, 0.12);
    color: #00FFA3;
}

.badge-status.status-ativo .status-dot {
    background: #00FFA3;
    animation: pulse 2s ease-in-out infinite;
}

.badge-status.status-inativo {
    background: rgba(255, 107, 107, 0.12);
    color: #FF6B6B;
}

.badge-status.status-inativo .status-dot {
    background: #FF6B6B;
}

/* ===== NÍVEL DE ACESSO ===== */
.nivel-acesso {
    text-align: center;
    margin-bottom: var(--space-md);
}

.nivel-badge {
    display: inline-block;
    padding: 6px 20px;
    background: var(--gradient-aurora);
    color: white;
    border-radius: var(--radius-full);
    font-family: var(--font-title);
    font-weight: 700;
    font-size: var(--text-sm);
    letter-spacing: 0.5px;
    text-transform: uppercase;
    box-shadow: 0 4px 16px rgba(108, 43, 217, 0.3);
}

.nivel-badge.financeiro {
    background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
    color: #0A1628;
    box-shadow: 0 4px 16px rgba(255, 217, 61, 0.3);
}

.permissoes-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.permissao-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: var(--text-sm);
    color: var(--text-secondary);
    padding: 4px 0;
}

.permissao-item i {
    color: #00FFA3;
    font-size: 12px;
}

/* ===== RESUMO FINANCEIRO ===== */
.resumo-financeiro-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-sm);
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    margin-bottom: var(--space-sm);
    transition: var(--transition-smooth);
}

.resumo-financeiro-item:last-child {
    margin-bottom: 0;
}

.resumo-financeiro-item:hover {
    background: var(--bg-input);
    border-color: rgba(255, 217, 61, 0.2);
}

.resumo-financeiro-icon {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.resumo-financeiro-icon.green {
    background: rgba(0, 255, 163, 0.12);
    color: #00FFA3;
}

.resumo-financeiro-icon.yellow {
    background: rgba(255, 217, 61, 0.12);
    color: #FFD93D;
}

.resumo-financeiro-icon.aurora {
    background: rgba(108, 43, 217, 0.12);
    color: #6C2BD9;
}

.resumo-financeiro-icon.blue {
    background: rgba(0, 210, 255, 0.12);
    color: #00D2FF;
}

.resumo-financeiro-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 2px;
    min-width: 0;
}

.resumo-financeiro-label {
    font-size: var(--text-xs);
    color: var(--text-muted);
}

.resumo-financeiro-valor {
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--text-primary);
}

/* ===== ESTATÍSTICAS ===== */
.stat-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid var(--border-color);
}

.stat-item:last-child {
    border-bottom: none;
}

.stat-label {
    font-size: var(--text-sm);
    color: var(--text-muted);
}

.stat-value {
    font-size: var(--text-sm);
    font-weight: 600;
    color: #FFD93D;
}

/* ===== SESSÕES ===== */
.sessao-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-sm);
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    margin-bottom: var(--space-sm);
    transition: var(--transition-smooth);
}

.sessao-item:last-child {
    margin-bottom: 0;
}

.sessao-item:hover {
    background: var(--bg-input);
}

.sessao-item.sessao-atual {
    background: rgba(0, 255, 163, 0.04);
    border-color: rgba(0, 255, 163, 0.2);
}

.sessao-icon {
    width: 36px;
    height: 36px;
    border-radius: var(--radius-sm);
    background: rgba(255, 217, 61, 0.1);
    color: #FFD93D;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.sessao-item.sessao-atual .sessao-icon {
    background: rgba(0, 255, 163, 0.1);
    color: #00FFA3;
}

.sessao-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 2px;
    min-width: 0;
}

.sessao-dispositivo {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--text-primary);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.sessao-local,
.sessao-data {
    font-size: var(--text-xs);
    color: var(--text-muted);
}

.sessao-badge {
    padding: 2px 8px;
    background: rgba(0, 255, 163, 0.12);
    color: #00FFA3;
    border-radius: var(--radius-full);
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
}

/* ===== FORMULÁRIO ===== */
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-md);
    margin-bottom: var(--space-md);
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.form-label {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--text-secondary);
}

.form-label .required {
    color: #FF6B6B;
    margin-left: 2px;
}

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

textarea.form-control {
    resize: vertical;
    min-height: 80px;
    font-family: var(--font-body);
}

/* ===== INPUT PASSWORD ===== */
.input-password {
    position: relative;
    display: flex;
    align-items: center;
}

.input-password .form-control {
    padding-right: 44px;
}

.toggle-password {
    position: absolute;
    right: 12px;
    background: none;
    border: none;
    color: var(--text-muted);
    cursor: pointer;
    font-size: 14px;
    padding: 4px;
    transition: var(--transition-smooth);
    display: flex;
    align-items: center;
    justify-content: center;
}

.toggle-password:hover {
    color: #FFD93D;
}

/* ===== FORÇA DA SENHA ===== */
.forca-senha {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    margin-top: 6px;
}

.forca-barra {
    flex: 1;
    height: 6px;
    background: var(--bg-input);
    border-radius: 3px;
    overflow: hidden;
}

.forca-preenchimento {
    height: 100%;
    width: 0%;
    background: #FF6B6B;
    border-radius: 3px;
    transition: all 0.3s ease;
}

.forca-texto {
    font-size: var(--text-xs);
    color: var(--text-muted);
    white-space: nowrap;
    min-width: 90px;
}

/* ===== REQUISITOS ===== */
.requisitos-senha {
    background: var(--bg-input);
    border-radius: var(--radius-md);
    padding: var(--space-md);
    margin-bottom: var(--space-md);
    border: 1px solid var(--border-color);
}

.requisitos-senha h4 {
    font-family: var(--font-title);
    font-size: var(--text-sm);
    color: var(--text-primary);
    margin: 0 0 var(--space-sm) 0;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.requisitos-senha h4 i {
    color: #FFD93D;
}

.requisitos-senha ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 6px;
}

.requisitos-senha ul li {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: var(--text-xs);
    color: var(--text-muted);
    transition: var(--transition-smooth);
}

.requisitos-senha ul li i {
    font-size: 8px;
    color: var(--text-muted);
    transition: var(--transition-smooth);
}

.requisitos-senha ul li.atendido {
    color: #00FFA3;
}

.requisitos-senha ul li.atendido i {
    font-size: 12px;
    color: #00FFA3;
}

/* ===== AÇÕES ===== */
.form-acoes {
    display: flex;
    gap: var(--space-sm);
    flex-wrap: wrap;
}

/* ===== ATIVIDADES ===== */
.atividades-list {
    display: flex;
    flex-direction: column;
    gap: var(--space-md);
}

.atividade-item {
    display: flex;
    gap: var(--space-md);
    padding-bottom: var(--space-md);
    border-bottom: 1px solid var(--border-color);
}

.atividade-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.atividade-icon {
    width: 36px;
    height: 36px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
}

.atividade-icon.aurora {
    background: rgba(108, 43, 217, 0.12);
    color: #6C2BD9;
}

.atividade-icon.geo {
    background: rgba(0, 210, 255, 0.12);
    color: #00D2FF;
}

.atividade-icon.green {
    background: rgba(0, 255, 163, 0.12);
    color: #00FFA3;
}

.atividade-icon.yellow {
    background: rgba(255, 217, 61, 0.12);
    color: #FFD93D;
}

.atividade-icon.red {
    background: rgba(255, 107, 107, 0.12);
    color: #FF6B6B;
}

.atividade-conteudo {
    flex: 1;
    min-width: 0;
}

.atividade-acao {
    display: block;
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 2px;
}

.atividade-detalhes {
    display: block;
    font-size: var(--text-sm);
    color: var(--text-secondary);
    margin-bottom: 4px;
}

.atividade-meta {
    display: flex;
    gap: var(--space-md);
    flex-wrap: wrap;
}

.atividade-data,
.atividade-ip {
    font-size: var(--text-xs);
    color: var(--text-muted);
}

.atividade-data i,
.atividade-ip i {
    margin-right: 4px;
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
    z-index: 9999;
    align-items: center;
    justify-content: center;
}

.modal.active {
    display: flex;
}

.modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(4px);
    animation: fadeIn 0.3s ease;
    cursor: pointer;
}

.modal-content {
    position: relative;
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    max-width: 420px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    animation: slideUp 0.3s ease;
    box-shadow: var(--glass-shadow);
    border: 1px solid var(--border-color);
    z-index: 10;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 24px;
    border-bottom: 1px solid var(--border-color);
}

.modal-header .modal-title {
    font-family: var(--font-title);
    font-weight: 600;
    font-size: var(--text-h4);
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.3rem;
    cursor: pointer;
    color: var(--text-muted);
    transition: var(--transition-smooth);
    padding: 4px;
    line-height: 1;
}

.modal-close:hover {
    color: var(--text-primary);
    transform: rotate(90deg);
}

.modal-body {
    padding: 24px;
}

.modal-footer {
    padding: 16px 24px;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: flex-end;
    gap: 12px;
}

.modal-footer .btn {
    min-width: 100px;
    justify-content: center;
}

/* ========================================== */
/* TOAST                                      */
/* ========================================== */
.toast-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 100000;
    display: flex;
    flex-direction: column;
    gap: 8px;
    max-width: 380px;
    width: 100%;
}

.toast {
    background: var(--toast-bg);
    backdrop-filter: blur(10px);
    border: 1px solid var(--glass-border);
    border-radius: var(--radius-md);
    padding: 12px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    box-shadow: var(--glass-shadow);
    transform: translateX(100%);
    opacity: 0;
    transition: all 0.3s ease;
    animation: slideInToast 0.4s ease forwards;
}

.toast .toast-content {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
}

.toast .toast-content i {
    font-size: 1.2rem;
}

.toast .toast-content span {
    font-size: var(--text-sm);
    color: var(--text-primary);
}

.toast .toast-close {
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 1.2rem;
    cursor: pointer;
    padding: 0 4px;
    transition: var(--transition-smooth);
}

.toast .toast-close:hover {
    color: var(--text-primary);
}

.toast-success { border-left: 4px solid #00FFA3; }
.toast-error { border-left: 4px solid #FF6B6B; }
.toast-warning { border-left: 4px solid #F59E0B; }
.toast-info { border-left: 4px solid #00D2FF; }

/* ========================================== */
/* ANIMAÇÕES                                  */
/* ========================================== */
@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(0.9); }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

@keyframes slideInToast {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

/* ========================================== */
/* RESPONSIVIDADE                             */
/* ========================================== */

@media (max-width: 1024px) {
    .perfil-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
        gap: var(--space-sm);
    }

    .requisitos-senha ul {
        grid-template-columns: 1fr;
    }

    .form-acoes {
        flex-direction: column;
    }

    .form-acoes .btn {
        width: 100%;
        justify-content: center;
    }

    .perfil-card-header {
        flex-direction: column;
        align-items: flex-start;
        gap: var(--space-sm);
    }

    .perfil-card-header .btn {
        width: 100%;
        justify-content: center;
    }

    .atividade-meta {
        flex-direction: column;
        gap: 2px;
    }

    .page-header h1 {
        font-size: var(--text-h3);
    }
}

@media (max-width: 480px) {
    .perfil-card-body {
        padding: 14px;
    }

    .perfil-card-header {
        padding: 12px 14px;
    }

    .perfil-avatar {
        width: 90px;
        height: 90px;
    }

    .avatar-upload-btn {
        width: 30px;
        height: 30px;
        font-size: 12px;
    }

    .modal-content {
        width: 95%;
        margin: 10px;
    }

    .modal-footer {
        flex-direction: column;
    }

    .modal-footer .btn {
        width: 100%;
    }

    .sessao-item {
        flex-direction: column;
        align-items: flex-start;
    }

    .sessao-item .btn {
        align-self: flex-end;
    }
}
</style>

</body>
</html>