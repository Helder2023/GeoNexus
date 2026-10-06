<?php
// painel/admin/config/plano-editar.php - Editar Plano
include "../../../includes/notificacoes-config-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Editar Plano';
$pagina_atual = 'planos';
$pagina_atual_sidebar = $pagina_atual;

// ============================================
// OBTER ID DO PLANO
// ============================================
$id_plano = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - PLANOS
// ============================================
$planos = [
    1 => [
        'id' => 1,
        'nome' => 'Básico',
        'categoria' => 'Individual',
        'categoria_icon' => 'fa-user',
        'categoria_color' => '#00D2FF',
        'valor' => 15000,
        'periodo' => 'Mensal',
        'usuarios' => 1,
        'projetos' => 5,
        'armazenamento' => '5 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano ideal para profissionais que estão começando. Inclui acesso básico às ferramentas essenciais.',
        'recursos' => ['Acesso a 5 projetos', '1 utilizador', '5 GB de armazenamento', 'Suporte por email'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-01 00:00:00'
    ],
    2 => [
        'id' => 2,
        'nome' => 'Pro',
        'categoria' => 'Individual',
        'categoria_icon' => 'fa-user',
        'categoria_color' => '#00D2FF',
        'valor' => 25000,
        'periodo' => 'Mensal',
        'usuarios' => 3,
        'projetos' => 20,
        'armazenamento' => '20 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => true,
        'descricao' => 'Plano avançado para profissionais experientes. Mais projetos, mais utilizadores e mais armazenamento.',
        'recursos' => ['Acesso a 20 projetos', '3 utilizadores', '20 GB de armazenamento', 'Suporte prioritário', 'Relatórios avançados'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-15 10:30:00'
    ],
    3 => [
        'id' => 3,
        'nome' => 'Premium',
        'categoria' => 'Individual',
        'categoria_icon' => 'fa-user',
        'categoria_color' => '#00D2FF',
        'valor' => 45000,
        'periodo' => 'Mensal',
        'usuarios' => 5,
        'projetos' => 50,
        'armazenamento' => '50 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano completo para equipes pequenas. Tudo que você precisa para gerenciar seus projetos geotecnológicos.',
        'recursos' => ['Acesso a 50 projetos', '5 utilizadores', '50 GB de armazenamento', 'Suporte 24/7', 'API completa', 'Integrações avançadas'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-02-01 14:20:00'
    ],
    4 => [
        'id' => 4,
        'nome' => 'Startup',
        'categoria' => 'Empresarial',
        'categoria_icon' => 'fa-building',
        'categoria_color' => '#FF6B6B',
        'valor' => 75000,
        'periodo' => 'Mensal',
        'usuarios' => 10,
        'projetos' => 100,
        'armazenamento' => '100 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano ideal para startups em crescimento. Escalabilidade e recursos completos para empresas em expansão.',
        'recursos' => ['Acesso a 100 projetos', '10 utilizadores', '100 GB de armazenamento', 'Suporte dedicado', 'API completa', 'Dashboards personalizados'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-20 09:15:00'
    ],
    5 => [
        'id' => 5,
        'nome' => 'Business',
        'categoria' => 'Empresarial',
        'categoria_icon' => 'fa-building',
        'categoria_color' => '#FF6B6B',
        'valor' => 150000,
        'periodo' => 'Mensal',
        'usuarios' => 25,
        'projetos' => 500,
        'armazenamento' => '250 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => true,
        'popular' => true,
        'descricao' => 'Plano empresarial completo. Gerencie grandes equipes e projetos complexos com facilidade.',
        'recursos' => ['Acesso a 500 projetos', '25 utilizadores', '250 GB de armazenamento', 'Suporte VIP', 'API completa', 'Dashboards personalizados', 'Treinamento incluso'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-02-15 16:45:00'
    ],
    6 => [
        'id' => 6,
        'nome' => 'Enterprise',
        'categoria' => 'Empresarial',
        'categoria_icon' => 'fa-building',
        'categoria_color' => '#FF6B6B',
        'valor' => 250000,
        'periodo' => 'Mensal',
        'usuarios' => 50,
        'projetos' => 1000,
        'armazenamento' => '500 GB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano enterprise para grandes corporações. Escalabilidade máxima e recursos ilimitados.',
        'recursos' => ['Acesso a 1000+ projetos', '50+ utilizadores', '500 GB de armazenamento', 'Suporte dedicado 24/7', 'API completa', 'Dashboards personalizados', 'Treinamento incluso', 'Suporte in loco'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-10 11:30:00'
    ],
    7 => [
        'id' => 7,
        'nome' => 'Educação',
        'categoria' => 'Institucional',
        'categoria_icon' => 'fa-university',
        'categoria_color' => '#FFD93D',
        'valor' => 125000,
        'periodo' => 'Trimestral',
        'usuarios' => 100,
        'projetos' => 2000,
        'armazenamento' => '1 TB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano especial para instituições de ensino. Preço especial para educação e pesquisa.',
        'recursos' => ['Acesso a 2000 projetos', '100 utilizadores', '1 TB de armazenamento', 'Suporte educacional', 'Licenças para estudantes'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-25 13:00:00'
    ],
    8 => [
        'id' => 8,
        'nome' => 'Governo',
        'categoria' => 'Institucional',
        'categoria_icon' => 'fa-university',
        'categoria_color' => '#FFD93D',
        'valor' => 200000,
        'periodo' => 'Trimestral',
        'usuarios' => 200,
        'projetos' => 5000,
        'armazenamento' => '2 TB',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'destaque' => true,
        'popular' => false,
        'descricao' => 'Plano para entidades governamentais. Segurança máxima e conformidade total.',
        'recursos' => ['Acesso a 5000 projetos', '200 utilizadores', '2 TB de armazenamento', 'Suporte governamental', 'Segurança avançada', 'Conformidade LGPD'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-02-05 08:30:00'
    ],
    9 => [
        'id' => 9,
        'nome' => 'ONG',
        'categoria' => 'Institucional',
        'categoria_icon' => 'fa-university',
        'categoria_color' => '#FFD93D',
        'valor' => 100000,
        'periodo' => 'Trimestral',
        'usuarios' => 50,
        'projetos' => 1000,
        'armazenamento' => '500 GB',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'destaque' => false,
        'popular' => false,
        'descricao' => 'Plano com desconto para organizações não governamentais. Suporte para causas sociais.',
        'recursos' => ['Acesso a 1000 projetos', '50 utilizadores', '500 GB de armazenamento', 'Suporte ONG', 'Desconto especial'],
        'criado_em' => '2025-01-01 00:00:00',
        'atualizado_em' => '2025-01-30 15:00:00'
    ],
];

// ============================================
// OBTER PLANO ATUAL
// ============================================
$plano = isset($planos[$id_plano]) ? $planos[$id_plano] : $planos[1];

// ============================================
// LISTA DE CATEGORIAS
// ============================================
$categorias = [
    ['id' => 'Individual', 'nome' => 'Individual', 'icon' => 'fa-user', 'color' => '#00D2FF'],
    ['id' => 'Empresarial', 'nome' => 'Empresarial', 'icon' => 'fa-building', 'color' => '#FF6B6B'],
    ['id' => 'Institucional', 'nome' => 'Institucional', 'icon' => 'fa-university', 'color' => '#FFD93D']
];

// ============================================
// LISTA DE PERIODOS
// ============================================
$periodos = ['Mensal', 'Trimestral', 'Semestral', 'Anual'];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
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

function getCategoriaColor($categoria) {
    $cores = [
        'Individual' => '#00D2FF',
        'Empresarial' => '#FF6B6B',
        'Institucional' => '#FFD93D'
    ];
    return $cores[$categoria] ?? '#6B7A8F';
}

function getCategoriaIcon($categoria) {
    $icons = [
        'Individual' => 'fa-user',
        'Empresarial' => 'fa-building',
        'Institucional' => 'fa-university'
    ];
    return $icons[$categoria] ?? 'fa-circle';
}
?>
<!DOCTYPE html>
<html lang="pt">
<?php include "../../../includes/admin-config-head.php" ?>

<body>
<div class="app-container">
    <div id="toast-container" class="toast-container"></div>

    <!-- ========================================== -->
    <!-- SIDEBAR CONFIGURAÇÕES                     -->
    <!-- ========================================== -->
    <?php include "../../../includes/admin-config-sidebar.php"; ?>

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
                    <span class="badge-status status-<?php echo $plano['status']; ?>">
                        <i class="fas <?php echo $plano['status'] === 'ativo' ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i>
                        <?php echo $plano['status_label']; ?>
                    </span>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <a href="planos.php">Planos</a>
                    <span class="separator">/</span>
                    <span><?php echo $plano['nome']; ?></span>
                    <span class="separator">/</span>
                    <span>Editar</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>
                <div class="header-actions">
                    <button type="submit" form="formEditarPlano" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar Alterações
                    </button>
                    <a href="planos.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                    <a href="#" class="btn btn-danger" onclick="confirmarExclusao(event, <?php echo $plano['id']; ?>)">
                        <i class="fas fa-trash"></i> Excluir
                    </a>
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
                    <!-- Card: Informações Básicas -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-info-circle"></i> Informações Básicas</h3>
                            <span class="plano-id">ID: #<?php echo $plano['id']; ?></span>
                        </div>
                        <div class="editar-card-body">
                            <form id="formEditarPlano" onsubmit="salvarEdicao(event)">
                                <input type="hidden" id="planoId" value="<?php echo $plano['id']; ?>">

                                <!-- Nome do Plano -->
                                <div class="form-group">
                                    <label class="form-label">Nome do Plano <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="nomePlano" 
                                           value="<?php echo htmlspecialchars($plano['nome']); ?>" 
                                           placeholder="Ex: Básico, Pro, Premium" required>
                                </div>

                                <!-- Categoria -->
                                <div class="form-group">
                                    <label class="form-label">Categoria <span class="required">*</span></label>
                                    <select class="form-control" id="categoriaPlano" required>
                                        <?php foreach ($categorias as $categoria): ?>
                                            <option value="<?php echo $categoria['id']; ?>" 
                                                    <?php echo ($plano['categoria'] === $categoria['id']) ? 'selected' : ''; ?>
                                                    style="border-left: 3px solid <?php echo $categoria['color']; ?>;">
                                                <?php echo $categoria['nome']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Linha: Valor + Período -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Valor <span class="required">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Kz</span>
                                            <input type="number" class="form-control" id="valorPlano" 
                                                   value="<?php echo $plano['valor']; ?>" 
                                                   placeholder="0" min="0" step="100" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Período <span class="required">*</span></label>
                                        <select class="form-control" id="periodoPlano" required>
                                            <?php foreach ($periodos as $periodo): ?>
                                                <option value="<?php echo $periodo; ?>" 
                                                        <?php echo ($plano['periodo'] === $periodo) ? 'selected' : ''; ?>>
                                                    <?php echo $periodo; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Linha: Usuários + Projetos -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Nº de Utilizadores</label>
                                        <input type="number" class="form-control" id="usuariosPlano" 
                                               value="<?php echo $plano['usuarios']; ?>" 
                                               placeholder="0" min="0">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nº de Projetos</label>
                                        <input type="number" class="form-control" id="projetosPlano" 
                                               value="<?php echo $plano['projetos']; ?>" 
                                               placeholder="0" min="0">
                                    </div>
                                </div>

                                <!-- Armazenamento -->
                                <div class="form-group">
                                    <label class="form-label">Armazenamento</label>
                                    <input type="text" class="form-control" id="armazenamentoPlano" 
                                           value="<?php echo htmlspecialchars($plano['armazenamento']); ?>" 
                                           placeholder="Ex: 5 GB, 100 GB, 1 TB">
                                </div>

                                <!-- Descrição -->
                                <div class="form-group">
                                    <label class="form-label">Descrição</label>
                                    <textarea class="form-control" id="descricaoPlano" rows="3" 
                                              placeholder="Descrição detalhada do plano"><?php echo htmlspecialchars($plano['descricao']); ?></textarea>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" id="statusPlano">
                                        <option value="ativo" <?php echo ($plano['status'] === 'ativo') ? 'selected' : ''; ?>>Ativo</option>
                                        <option value="inativo" <?php echo ($plano['status'] === 'inativo') ? 'selected' : ''; ?>>Inativo</option>
                                    </select>
                                </div>

                                <!-- Destaque e Popular -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label class="form-label">Destaque</label>
                                        <select class="form-control" id="destaquePlano">
                                            <option value="0" <?php echo !$plano['destaque'] ? 'selected' : ''; ?>>Não</option>
                                            <option value="1" <?php echo $plano['destaque'] ? 'selected' : ''; ?>>Sim</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Popular</label>
                                        <select class="form-control" id="popularPlano">
                                            <option value="0" <?php echo !$plano['popular'] ? 'selected' : ''; ?>>Não</option>
                                            <option value="1" <?php echo $plano['popular'] ? 'selected' : ''; ?>>Sim</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Card: Recursos -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-list-check"></i> Recursos do Plano</h3>
                            <button class="btn btn-sm btn-outline" onclick="adicionarRecurso()">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                        <div class="editar-card-body">
                            <div id="recursosContainer">
                                <?php foreach ($plano['recursos'] as $recurso): ?>
                                    <div class="recurso-item">
                                        <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                                        <input type="text" class="form-control recurso-input" value="<?php echo htmlspecialchars($recurso); ?>" placeholder="Descrição do recurso">
                                        <button class="btn btn-sm btn-danger" onclick="removerRecurso(this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="recurso-empty" id="recursoEmpty" style="display: <?php echo count($plano['recursos']) > 0 ? 'none' : 'flex'; ?>;">
                                <i class="fas fa-plus-circle"></i>
                                <span>Nenhum recurso adicionado. Clique em "Adicionar" para começar.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coluna Lateral -->
                <div class="editar-coluna-lateral">
                    <!-- Card: Resumo do Plano -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-crown"></i> Resumo</h3>
                        </div>
                        <div class="editar-card-body">
                            <div class="resumo-item">
                                <span class="resumo-label">Plano</span>
                                <span class="resumo-value" style="font-weight: 600; color: #FFD93D;">
                                    <?php echo $plano['nome']; ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Categoria</span>
                                <span class="resumo-value">
                                    <span class="badge-categoria <?php echo strtolower($plano['categoria']); ?>">
                                        <i class="fas <?php echo getCategoriaIcon($plano['categoria']); ?>"></i>
                                        <?php echo $plano['categoria']; ?>
                                    </span>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Valor</span>
                                <span class="resumo-value" style="font-weight: 600; color: #FFD93D;">
                                    Kz <?php echo formatMoney($plano['valor']); ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Período</span>
                                <span class="resumo-value"><?php echo $plano['periodo']; ?></span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Status</span>
                                <span class="badge-status status-<?php echo $plano['status']; ?>">
                                    <i class="fas <?php echo $plano['status'] === 'ativo' ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i>
                                    <?php echo $plano['status_label']; ?>
                                </span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Criado em</span>
                                <span class="resumo-value"><?php echo formatDateTime($plano['criado_em']); ?></span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Última atualização</span>
                                <span class="resumo-value"><?php echo formatDateTime($plano['atualizado_em']); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Estatísticas -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-chart-simple"></i> Estatísticas</h3>
                        </div>
                        <div class="editar-card-body">
                            <div class="resumo-item">
                                <span class="resumo-label">Assinaturas ativas</span>
                                <span class="resumo-value" style="font-weight: 600; color: #00FFA3;">42</span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Receita total</span>
                                <span class="resumo-value" style="font-weight: 600; color: #FFD93D;">Kz 1.250.000</span>
                            </div>
                            <div class="resumo-item">
                                <span class="resumo-label">Taxa de conversão</span>
                                <span class="resumo-value" style="font-weight: 600; color: #00D2FF;">18.5%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Ações Rápidas -->
                    <div class="editar-card">
                        <div class="editar-card-header">
                            <h3><i class="fas fa-tools"></i> Ações Rápidas</h3>
                        </div>
                        <div class="editar-card-body">
                            <div class="acoes-lista">
                                <button class="btn btn-primary" style="width: 100%; justify-content: center;" onclick="document.getElementById('formEditarPlano').submit()">
                                    <i class="fas fa-save"></i> Salvar Alterações
                                </button>
                                <a href="planos.php" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                                <button class="btn btn-outline" style="width: 100%; justify-content: center;" onclick="duplicarPlano()">
                                    <i class="fas fa-copy"></i> Duplicar Plano
                                </button>
                                <a href="#" class="btn btn-danger" style="width: 100%; justify-content: center;" onclick="confirmarExclusao(event, <?php echo $plano['id']; ?>)">
                                    <i class="fas fa-trash"></i> Excluir Plano
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
<!-- MODAL: CONFIRMAÇÃO EXCLUSÃO               -->
<!-- ========================================== -->
<div class="modal" id="modalConfirmacao">
    <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
    <div class="modal-content" style="max-width: 420px;">
        <div class="modal-header">
            <h3 class="modal-title">
                <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar Exclusão
            </h3>
            <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
        </div>
        <div class="modal-body" id="confirmacaoCorpo">
            <p>Tem certeza que deseja excluir o plano <strong id="confirmacaoNome"><?php echo $plano['nome']; ?></strong>?</p>
            <p style="font-size: var(--text-sm); color: #FF6B6B; margin-top: var(--space-sm);">
                <i class="fas fa-exclamation-circle"></i> Esta ação não pode ser desfeita! Todas as assinaturas vinculadas serão afetadas.
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
            <button class="btn btn-danger" id="confirmacaoBtn"><i class="fas fa-check"></i> Confirmar</button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- TOAST CONTAINER                           -->
<!-- ========================================== -->
<div id="toast-container" class="toast-container"></div>

<!-- ========================================== -->
<!-- SCRIPTS                                    -->
<!-- ========================================== -->
<script src="../../../assets/js/main.js"></script>
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

    // Perfil
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
        mostrarToast('Notificação marcada como lida', 'info');
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
// RECURSOS
// ============================================
function adicionarRecurso() {
    const container = document.getElementById('recursosContainer');
    const empty = document.getElementById('recursoEmpty');
    
    if (empty) empty.style.display = 'none';
    
    const div = document.createElement('div');
    div.className = 'recurso-item';
    div.innerHTML = `
        <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
        <input type="text" class="form-control recurso-input" placeholder="Descrição do recurso">
        <button class="btn btn-sm btn-danger" onclick="removerRecurso(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(div);
    div.querySelector('.recurso-input').focus();
}

function removerRecurso(btn) {
    const item = btn.closest('.recurso-item');
    const container = document.getElementById('recursosContainer');
    const empty = document.getElementById('recursoEmpty');
    
    if (container.querySelectorAll('.recurso-item').length <= 1) {
        if (empty) empty.style.display = 'flex';
    }
    
    item.style.transition = 'all 0.3s ease';
    item.style.opacity = '0';
    item.style.transform = 'translateX(20px)';
    setTimeout(() => item.remove(), 300);
}

function getRecursos() {
    const inputs = document.querySelectorAll('.recurso-input');
    const recursos = [];
    inputs.forEach(input => {
        const valor = input.value.trim();
        if (valor) recursos.push(valor);
    });
    return recursos;
}

// ============================================
// SALVAR EDIÇÃO
// ============================================
function salvarEdicao(event) {
    event.preventDefault();

    const id = document.getElementById('planoId').value;
    const nome = document.getElementById('nomePlano').value.trim();
    const categoria = document.getElementById('categoriaPlano').value;
    const valor = document.getElementById('valorPlano').value;
    const periodo = document.getElementById('periodoPlano').value;
    const usuarios = document.getElementById('usuariosPlano').value;
    const projetos = document.getElementById('projetosPlano').value;
    const armazenamento = document.getElementById('armazenamentoPlano').value.trim();
    const descricao = document.getElementById('descricaoPlano').value.trim();
    const status = document.getElementById('statusPlano').value;
    const destaque = document.getElementById('destaquePlano').value;
    const popular = document.getElementById('popularPlano').value;
    const recursos = getRecursos();

    if (!nome || !categoria || !valor || !periodo) {
        mostrarToast('Preencha todos os campos obrigatórios!', 'error');
        return;
    }

    mostrarToast('Plano "' + nome + '" atualizado com sucesso!', 'success');

    setTimeout(() => {
        window.location.href = 'planos.php';
    }, 1500);
}

// ============================================
// EXCLUIR PLANO
// ============================================
let planoParaExcluir = null;

function confirmarExclusao(event, id) {
    event.preventDefault();
    planoParaExcluir = id;
    document.getElementById('modalConfirmacao').classList.add('active');
    document.body.style.overflow = 'hidden';

    document.getElementById('confirmacaoBtn').onclick = function() {
        fecharModal('modalConfirmacao');
        mostrarToast('Plano excluído com sucesso!', 'error');
        setTimeout(() => {
            window.location.href = 'planos.php';
        }, 1500);
    };
}

// ============================================
// DUPLICAR PLANO
// ============================================
function duplicarPlano() {
    mostrarToast('Plano duplicado com sucesso!', 'success');
    setTimeout(() => {
        window.location.href = 'planos.php';
    }, 1500);
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
/* EDITAR PLANO - CSS COMPLETO               */
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
    padding: 16px 20px;
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

.editar-card-header .plano-id {
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

/* ===== RECURSOS ===== */
#recursosContainer {
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}

.recurso-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: 6px 10px;
    background: var(--bg-input);
    border-radius: var(--radius-sm);
    border: 1px solid var(--border-color);
    transition: var(--transition-smooth);
}

.recurso-item:hover {
    border-color: #FFD93D;
}

.recurso-item i {
    font-size: 16px;
    flex-shrink: 0;
}

.recurso-item .recurso-input {
    flex: 1;
    border: none;
    background: transparent;
    padding: 4px 0;
    font-size: var(--text-sm);
    color: var(--text-primary);
}

.recurso-item .recurso-input:focus {
    outline: none;
    box-shadow: none;
}

.recurso-item .btn {
    padding: 2px 6px;
    min-width: 24px;
    height: 24px;
    font-size: 10px;
    border-radius: var(--radius-sm);
    border: 1px solid transparent;
    background: transparent;
    color: var(--text-muted);
    cursor: pointer;
    transition: var(--transition-smooth);
}

.recurso-item .btn:hover {
    color: #FF6B6B;
    background: rgba(255, 107, 107, 0.1);
}

.recurso-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-lg) 0;
    color: var(--text-muted);
    text-align: center;
}

.recurso-empty i {
    font-size: 32px;
    color: var(--text-muted);
    opacity: 0.5;
}

.recurso-empty span {
    font-size: var(--text-sm);
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

.badge-status.status-ativo {
    background: rgba(0, 255, 163, 0.12);
    color: #00FFA3;
}

.badge-status.status-inativo {
    background: rgba(255, 107, 107, 0.12);
    color: #FF6B6B;
}

.badge-categoria {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 2px 12px;
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 500;
}

.badge-categoria.individual {
    background: rgba(0, 210, 255, 0.12);
    color: #00D2FF;
}

.badge-categoria.empresarial {
    background: rgba(255, 107, 107, 0.12);
    color: #FF6B6B;
}

.badge-categoria.institucional {
    background: rgba(255, 217, 61, 0.12);
    color: #FFD93D;
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
    background: rgba(0,0,0,0.5);
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

@keyframes slideInToast {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

/* ========================================== */
/* ANIMAÇÕES                                  */
/* ========================================== */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
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

    .header-actions .btn {
        font-size: var(--text-xs);
        padding: 4px 10px;
    }

    .page-header h1 {
        font-size: var(--text-h3);
        flex-wrap: wrap;
    }
    
    .page-header h1 .badge-status {
        font-size: 12px;
        padding: 2px 12px;
    }

    .editar-card-body {
        padding: 14px;
    }
    
    .editar-card-header {
        padding: 12px 14px;
    }
}

@media (max-width: 480px) {
    .editar-card-body {
        padding: 12px;
    }
    
    .editar-card-header {
        padding: 10px 12px;
    }
    
    .editar-card-header h3 {
        font-size: var(--text-body);
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

    .recurso-item {
        flex-wrap: wrap;
        gap: var(--space-xs);
    }

    .recurso-item .recurso-input {
        width: 100%;
        order: 2;
    }

    .recurso-item .btn {
        order: 3;
        margin-left: auto;
    }
}
</style>

</body>
</html>