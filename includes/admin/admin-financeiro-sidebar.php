<?php
// includes/admin-financeiro-sidebar.php
// Sidebar do módulo financeiro

// ===== VARIÁVEIS PADRÃO (caso não estejam definidas) =====
$pagina_atual_sidebar = $pagina_atual_sidebar ?? 'financeiro';

// ===== ESTATÍSTICAS PADRÃO (caso não estejam definidas) =====
$total_transacoes = $total_transacoes ?? 0;
$stats = $stats ?? [
    'assinaturas_ativas' => 0,
    'pagamentos_pendentes' => 0,
    'faturas_emitidas' => 0,
    'comissoes_pendentes' => 0,
];

// Função auxiliar para formatação de moeda (se não existir)
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

// ===== FUNÇÃO PARA VERIFICAR PÁGINA ATIVA =====
function isActive($pages, $current) {
    if (is_array($pages)) {
        return in_array($current, $pages) ? 'active' : '';
    }
    return ($current === $pages) ? 'active' : '';
}
?>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="index.php" class="logo">
            <div class="logo-icon">
                <i class="fas fa-globe-africa"></i>
            </div>
            <span class="logo-text">GeoNexus</span>
            <span class="logo-badge">Financeiro</span>
        </a>
        <button class="btn-toggle-sidebar" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="sidebar-user">
        <div class="avatar">
            <img src="/assets/images/avatar-admin.png" alt="Admin">
            <span class="status-dot"></span>
        </div>
        <div class="user-info">
            <span class="name">Administrador</span>
            <span class="role">Super Admin</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <!-- ===== DASHBOARD PRINCIPAL ===== -->
            <li class="menu-section">Navegação</li>

            <li>
                <a href="../index.php" title="Voltar ao Dashboard Principal">
                    <i class="fas fa-arrow-left icon" style="color: #00D2FF;"></i>
                    <span>Dashboard Principal</span>
                </a>
            </li>

            <!-- ===== DASHBOARD FINANCEIRO ===== -->
            <li class="<?php echo isActive(['financeiro', 'financeiro-index'], $pagina_atual_sidebar); ?>">
                <a href="index.php">
                    <i class="fas fa-chart-pie icon"></i>
                    <span>Dashboard Financeiro</span>
                </a>
            </li>

            <!-- ===== TRANSAÇÕES ===== -->
            <li class="menu-section">Transações</li>

            <li class="<?php echo isActive(['transacoes', 'transacao-detalhe', 'transacao-editar', 'transacao-excluir', 'transacao-criar'], $pagina_atual_sidebar); ?>">
                <a href="transacoes.php">
                    <i class="fas fa-exchange-alt icon"></i>
                    <span>Todas as Transações</span>
                    <span class="badge badge-primary"><?php echo $total_transacoes; ?></span>
                </a>
            </li>

            <!-- ===== ASSINATURAS ===== -->
            <li class="menu-section">Assinaturas</li>

            <li class="<?php echo isActive(['assinaturas', 'assinatura-detalhe', 'assinatura-editar', 'assinatura-cancelar', 'assinatura-renovar'], $pagina_atual_sidebar); ?>">
                <a href="assinaturas.php">
                    <i class="fas fa-crown icon"></i>
                    <span>Todas as Assinaturas</span>
                    <span class="badge badge-primary"><?php echo $stats['assinaturas_ativas']; ?></span>
                </a>
            </li>

            <!-- ===== PAGAMENTOS ===== -->
            <li class="menu-section">Pagamentos</li>

            <li class="<?php echo isActive(['pagamentos', 'pagamento-detalhe', 'pagamento-aprovar', 'pagamento-rejeitar', 'pagamento-editar', 'pagamento-excluir'], $pagina_atual_sidebar); ?>">
                <a href="pagamentos.php">
                    <i class="fas fa-credit-card icon"></i>
                    <span>Todos os Pagamentos</span>
                    <span class="badge badge-warning"><?php echo $stats['pagamentos_pendentes']; ?></span>
                </a>
            </li>

            <!-- ===== FATURAS ===== -->
            <li class="menu-section">Faturas</li>

            <li class="<?php echo isActive(['faturas', 'fatura-detalhe', 'fatura-editar', 'fatura-cancelar'], $pagina_atual_sidebar); ?>">
                <a href="faturas.php">
                    <i class="fas fa-file-invoice icon"></i>
                    <span>Todas as Faturas</span>
                    <span class="badge badge-primary"><?php echo $stats['faturas_emitidas']; ?></span>
                </a>
            </li>

            <!-- ===== RELATÓRIOS ===== -->
            <li class="menu-section">Relatórios</li>

            <li class="<?php echo isActive(['relatorios-financeiros'], $pagina_atual_sidebar); ?>">
                <a href="relatorios-financeiros.php">
                    <i class="fas fa-file-alt icon"></i>
                    <span>Relatórios Financeiros</span>
                </a>
            </li>

            <li class="<?php echo isActive('relatorio-gerar', $pagina_atual_sidebar); ?>">
                <a href="relatorio-gerar.php">
                    <i class="fas fa-plus icon"></i>
                    <span>Gerar Relatório</span>
                </a>
            </li>

            <!-- ===== LOGOUT ===== -->
            <li class="logout-item">
                <a href="/painel/logout.php">
                    <i class="fas fa-sign-out-alt icon"></i>
                    <span>Sair</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<?php include "admin-financeiro-botoesNavegacaoMobile.php" ?>
