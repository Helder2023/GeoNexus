<?php
// painel/individual/financeiro/metas.php - Metas Financeiras
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Metas Financeiras';
$pagina_atual = 'metas';

// ============================================
// GARANTIR VARIÁVEIS
// ============================================
if (!isset($valor_receber))              $valor_receber = 850000;
if (!isset($total_faturas_pendentes))    $total_faturas_pendentes = 12;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// LISTA DE METAS
// ============================================
$metas = [
    [
        'id' => 1,
        'titulo' => 'Meta Mensal de Faturamento',
        'descricao' => 'Atingir Kz 4.000.000 em faturamento mensal',
        'categoria' => 'Faturamento',
        'categoria_icon' => 'fa-coins',
        'categoria_color' => '#00FFA3',
        'valor_atual' => 3450000,
        'valor_meta' => 4000000,
        'percentual' => 86,
        'unidade' => 'Kz',
        'prazo' => '2026-02-28',
        'dias_restantes' => 10,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'responsavel' => 'Carlos Mendes',
        'data_criacao' => '2026-02-01',
        'historico' => [75, 80, 82, 84, 86]
    ],
    [
        'id' => 2,
        'titulo' => 'Meta de Novos Clientes',
        'descricao' => 'Adquirir 10 novos clientes neste mês',
        'categoria' => 'Clientes',
        'categoria_icon' => 'fa-users',
        'categoria_color' => '#00D2FF',
        'valor_atual' => 8,
        'valor_meta' => 10,
        'percentual' => 80,
        'unidade' => 'clientes',
        'prazo' => '2026-02-28',
        'dias_restantes' => 10,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'responsavel' => 'Carlos Mendes',
        'data_criacao' => '2026-02-01',
        'historico' => [40, 50, 60, 70, 80]
    ],
    [
        'id' => 3,
        'titulo' => 'Meta de Projetos Concluídos',
        'descricao' => 'Concluir 15 projetos até ao final do trimestre',
        'categoria' => 'Projetos',
        'categoria_icon' => 'fa-project-diagram',
        'categoria_color' => '#6C2BD9',
        'valor_atual' => 12,
        'valor_meta' => 15,
        'percentual' => 80,
        'unidade' => 'projetos',
        'prazo' => '2026-03-31',
        'dias_restantes' => 41,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'responsavel' => 'Carlos Mendes',
        'data_criacao' => '2026-01-01',
        'historico' => [20, 40, 55, 70, 80]
    ],
    [
        'id' => 4,
        'titulo' => 'Reduzir Despesas Operacionais',
        'descricao' => 'Reduzir despesas operacionais em 15% este mês',
        'categoria' => 'Despesas',
        'categoria_icon' => 'fa-arrow-down',
        'categoria_color' => '#FF6B6B',
        'valor_atual' => 8,
        'valor_meta' => 15,
        'percentual' => 53,
        'unidade' => '%',
        'prazo' => '2026-02-28',
        'dias_restantes' => 10,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'responsavel' => 'Carlos Mendes',
        'data_criacao' => '2026-02-01',
        'historico' => [10, 20, 30, 45, 53]
    ],
    [
        'id' => 5,
        'titulo' => 'Faturamento Anual',
        'descricao' => 'Atingir Kz 40.000.000 de faturamento no ano',
        'categoria' => 'Faturamento',
        'categoria_icon' => 'fa-coins',
        'categoria_color' => '#00FFA3',
        'valor_atual' => 8500000,
        'valor_meta' => 40000000,
        'percentual' => 21,
        'unidade' => 'Kz',
        'prazo' => '2026-12-31',
        'dias_restantes' => 316,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'responsavel' => 'Carlos Mendes',
        'data_criacao' => '2026-01-01',
        'historico' => [5, 8, 12, 18, 21]
    ],
    [
        'id' => 6,
        'titulo' => 'Aumentar Taxa de Conversão',
        'descricao' => 'Aumentar taxa de conversão de orçamentos para 70%',
        'categoria' => 'Vendas',
        'categoria_icon' => 'fa-percentage',
        'categoria_color' => '#FFD93D',
        'valor_atual' => 58,
        'valor_meta' => 70,
        'percentual' => 83,
        'unidade' => '%',
        'prazo' => '2026-03-15',
        'dias_restantes' => 25,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'responsavel' => 'Carlos Mendes',
        'data_criacao' => '2026-01-15',
        'historico' => [45, 50, 55, 60, 83]
    ],
    [
        'id' => 7,
        'titulo' => 'Meta de Assinaturas',
        'descricao' => 'Renovar 20 assinaturas até ao final do mês',
        'categoria' => 'Assinaturas',
        'categoria_icon' => 'fa-crown',
        'categoria_color' => '#FF9F43',
        'valor_atual' => 20,
        'valor_meta' => 20,
        'percentual' => 100,
        'unidade' => 'assinaturas',
        'prazo' => '2026-02-28',
        'dias_restantes' => 10,
        'status' => 'concluida',
        'status_label' => 'Concluída',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'responsavel' => 'Carlos Mendes',
        'data_criacao' => '2026-02-01',
        'historico' => [50, 65, 80, 90, 100]
    ],
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_metas = count($metas);
$metas_concluidas = count(array_filter($metas, fn($m) => $m['status'] === 'concluida'));
$metas_em_andamento = count(array_filter($metas, fn($m) => $m['status'] === 'em_andamento'));
$metas_atrasadas = count(array_filter($metas, fn($m) => $m['status'] === 'atrasada'));

// Média de progresso
$progressos = array_column($metas, 'percentual');
$progresso_medio = count($progressos) > 0 ? round(array_sum($progressos) / count($progressos)) : 0;

// ============================================
// CATEGORIAS ÚNICAS
// ============================================
$categorias_unicas = [];
foreach ($metas as $m) {
    if (!isset($categorias_unicas[$m['categoria']])) {
        $categorias_unicas[$m['categoria']] = [
            'nome' => $m['categoria'],
            'icon' => $m['categoria_icon'],
            'color' => $m['categoria_color']
        ];
    }
}

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

if (!function_exists('formatValue')) {
    function formatValue($valor, $unidade) {
        if ($unidade === 'Kz') {
            if ($valor >= 1000000) {
                return 'Kz ' . number_format($valor / 1000000, 1, ',', '.') . 'M';
            }
            return 'Kz ' . formatMoney($valor);
        }
        return $valor . ' ' . $unidade;
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
            'concluida' => 'status-concluida',
            'em_andamento' => 'status-em-andamento',
            'atrasada' => 'status-atrasada',
            'pendente' => 'status-pendente'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getPrioridadeClass')) {
    function getPrioridadeClass($prioridade) {
        $classes = [
            'alta' => 'prioridade-alta',
            'media' => 'prioridade-media',
            'baixa' => 'prioridade-baixa'
        ];
        return isset($classes[$prioridade]) ? $classes[$prioridade] : 'prioridade-media';
    }
}

if (!function_exists('getPrazoClass')) {
    function getPrazoClass($dias) {
        if ($dias < 0) return 'prazo-atrasado';
        if ($dias <= 7) return 'prazo-urgente';
        return 'prazo-normal';
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
                        <i class="fas fa-bullseye icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $total_metas; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Metas</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="meta-criar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nova Meta
                    </a>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="value"><?php echo $total_metas; ?></div>
                    <div class="label">Total de Metas</div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $metas_concluidas; ?></div>
                    <div class="label">Concluídas</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="value"><?php echo $metas_em_andamento; ?></div>
                    <div class="label">Em Andamento</div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="value"><?php echo $progresso_medio; ?>%</div>
                    <div class="label">Progresso Médio</div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.1s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchMeta" placeholder="Buscar meta..." oninput="filtrarMetas()">
                    </div>
                    <div class="filtros-actions">
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="grid" onclick="mudarView('grid')" title="Grid">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="view-btn" data-view="list" onclick="mudarView('list')" title="Lista">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filtros por status -->
                <div class="filtros-status">
                    <button class="filtro-status active" data-status="todos" onclick="filtrarPorStatus('todos')">
                        Todas <span class="count"><?php echo $total_metas; ?></span>
                    </button>
                    <button class="filtro-status" data-status="em_andamento" onclick="filtrarPorStatus('em_andamento')">
                        Em Andamento <span class="count"><?php echo $metas_em_andamento; ?></span>
                    </button>
                    <button class="filtro-status" data-status="concluida" onclick="filtrarPorStatus('concluida')">
                        Concluídas <span class="count"><?php echo $metas_concluidas; ?></span>
                    </button>
                    <button class="filtro-status" data-status="atrasada" onclick="filtrarPorStatus('atrasada')">
                        Atrasadas <span class="count"><?php echo $metas_atrasadas; ?></span>
                    </button>
                </div>

                <!-- Filtros por categoria -->
                <div class="filtros-categorias">
                    <span class="filtros-categorias-label">Categorias:</span>
                    <?php foreach ($categorias_unicas as $cat): ?>
                        <button class="filtro-categoria" 
                                data-categoria="<?php echo $cat['nome']; ?>"
                                onclick="filtrarPorCategoria('<?php echo $cat['nome']; ?>')"
                                style="--cat-color: <?php echo $cat['color']; ?>;">
                            <i class="fas <?php echo $cat['icon']; ?>"></i>
                            <?php echo $cat['nome']; ?>
                        </button>
                    <?php endforeach; ?>
                    <button class="filtro-categoria limpar-categoria" onclick="filtrarPorCategoria('')" style="display: none;">
                        <i class="fas fa-times"></i> Limpar
                    </button>
                </div>
            </section>

            <!-- ===== LISTA DE METAS ===== -->
            <section class="metas-container animate-fade-up" style="animation-delay: 0.2s;">
                <?php if (empty($metas)): ?>
                    <div class="empty-state">
                        <i class="fas fa-bullseye"></i>
                        <h3>Nenhuma meta encontrada</h3>
                        <p>Crie a sua primeira meta financeira para começar</p>
                        <a href="meta-criar.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Criar Meta
                        </a>
                    </div>
                <?php else: ?>
                    <div class="metas-grid" id="metasGrid">
                        <?php foreach ($metas as $meta): 
                            $prazo_class = getPrazoClass($meta['dias_restantes']);
                        ?>
                            <div class="meta-card" 
                                 data-id="<?php echo $meta['id']; ?>"
                                 data-status="<?php echo $meta['status']; ?>"
                                 data-categoria="<?php echo $meta['categoria']; ?>"
                                 data-busca="<?php echo strtolower($meta['titulo'] . ' ' . $meta['descricao'] . ' ' . $meta['categoria']); ?>"
                                 style="--cat-color: <?php echo $meta['categoria_color']; ?>;">
                                
                                <!-- ===== HEADER ===== -->
                                <div class="meta-card-header">
                                    <div class="meta-card-categoria">
                                        <div class="categoria-icon" style="background: <?php echo $meta['categoria_color']; ?>20; color: <?php echo $meta['categoria_color']; ?>;">
                                            <i class="fas <?php echo $meta['categoria_icon']; ?>"></i>
                                        </div>
                                        <div class="categoria-info">
                                            <span class="categoria-nome"><?php echo $meta['categoria']; ?></span>
                                            <span class="meta-id">#META-<?php echo str_pad($meta['id'], 3, '0', STR_PAD_LEFT); ?></span>
                                        </div>
                                    </div>
                                    <div class="meta-card-status">
                                        <span class="badge-status <?php echo getStatusClass($meta['status']); ?>">
                                            <i class="fas fa-circle"></i>
                                            <?php echo $meta['status_label']; ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- ===== BODY ===== -->
                                <div class="meta-card-body">
                                    <h3 class="meta-titulo"><?php echo $meta['titulo']; ?></h3>
                                    <p class="meta-descricao"><?php echo $meta['descricao']; ?></p>

                                    <!-- Prioridade -->
                                    <div class="meta-prioridade">
                                        <span class="prioridade-badge <?php echo getPrioridadeClass($meta['prioridade']); ?>">
                                            <i class="fas fa-flag"></i>
                                            Prioridade <?php echo $meta['prioridade_label']; ?>
                                        </span>
                                    </div>

                                    <!-- Progresso -->
                                    <div class="meta-progresso-section">
                                        <div class="progresso-header">
                                            <span class="progresso-label">Progresso</span>
                                            <span class="progresso-percent" style="color: <?php echo $meta['categoria_color']; ?>;">
                                                <?php echo $meta['percentual']; ?>%
                                            </span>
                                        </div>
                                        <div class="progresso-barra">
                                            <div class="progresso-preenchimento" 
                                                 style="width: <?php echo $meta['percentual']; ?>%; background: <?php echo $meta['categoria_color']; ?>;">
                                            </div>
                                        </div>
                                        <div class="progresso-valores">
                                            <span class="progresso-atual">
                                                <?php echo formatValue($meta['valor_atual'], $meta['unidade']); ?>
                                            </span>
                                            <span class="progresso-meta">
                                                de <?php echo formatValue($meta['valor_meta'], $meta['unidade']); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Gráfico de histórico (mini) -->
                                    <div class="meta-historico">
                                        <span class="historico-label">Evolução:</span>
                                        <div class="historico-sparkline" id="sparkline-<?php echo $meta['id']; ?>">
                                            <?php foreach ($meta['historico'] as $index => $valor): ?>
                                                <div class="sparkline-bar" 
                                                     style="height: <?php echo $valor; ?>%; background: <?php echo $meta['categoria_color']; ?>; opacity: <?php echo 0.4 + ($index * 0.15); ?>;"
                                                     title="<?php echo $valor; ?>%">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Datas -->
                                    <div class="meta-datas">
                                        <div class="data-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <div>
                                                <span class="data-label">Prazo</span>
                                                <span class="data-value"><?php echo formatDate($meta['prazo']); ?></span>
                                            </div>
                                        </div>
                                        <div class="data-item <?php echo $prazo_class; ?>">
                                            <i class="fas fa-clock"></i>
                                            <div>
                                                <span class="data-label">Restante</span>
                                                <span class="data-value">
                                                    <?php 
                                                    if ($meta['dias_restantes'] < 0) {
                                                        echo abs($meta['dias_restantes']) . ' dias atrasado';
                                                    } elseif ($meta['dias_restantes'] == 0) {
                                                        echo 'Termina hoje';
                                                    } else {
                                                        echo $meta['dias_restantes'] . ' dias';
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===== FOOTER ===== -->
                                <div class="meta-card-footer">
                                    <div class="meta-responsavel">
                                        <i class="fas fa-user"></i>
                                        <span><?php echo $meta['responsavel']; ?></span>
                                    </div>

                                    <div class="meta-actions">
                                        <a href="meta-editar.php?id=<?php echo $meta['id']; ?>" 
                                           class="btn-action" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="meta-excluir.php?id=<?php echo $meta['id']; ?>" 
                                           class="btn-action btn-action-danger" 
                                           title="Excluir"
                                           onclick="return confirmarExclusao(event, '<?php echo addslashes($meta['titulo']); ?>', <?php echo $meta['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <button class="btn-action" 
                                                onclick="abrirMenuCard(event, <?php echo $meta['id']; ?>)" 
                                                title="Mais Opções">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- ===== BOTÃO ATUALIZAR PROGRESSO ===== -->
                                <?php if ($meta['status'] !== 'concluida'): ?>
                                    <button class="btn-atualizar-progresso" 
                                            style="--cat-color: <?php echo $meta['categoria_color']; ?>;"
                                            onclick="atualizarProgresso(<?php echo $meta['id']; ?>, <?php echo $meta['percentual']; ?>, '<?php echo addslashes($meta['titulo']); ?>')">
                                        <div class="btn-atualizar-content">
                                            <i class="fas fa-chart-line"></i>
                                            <span>Atualizar Progresso</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </button>
                                <?php else: ?>
                                    <div class="meta-concluida-banner" style="--cat-color: <?php echo $meta['categoria_color']; ?>;">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Meta Concluída! 🎉</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MENU CONTEXTUAL DO CARD                    -->
    <!-- ========================================== -->
    <div class="context-menu" id="contextMenu">
        <a href="#" class="context-item" id="menuVerDetalhes">
            <i class="fas fa-eye"></i>
            <span>Ver Detalhes</span>
        </a>
        <a href="#" class="context-item" id="menuEditar">
            <i class="fas fa-edit"></i>
            <span>Editar Meta</span>
        </a>
        <a href="#" class="context-item" id="menuAtualizar">
            <i class="fas fa-chart-line"></i>
            <span>Atualizar Progresso</span>
        </a>
        <hr>
        <a href="#" class="context-item" id="menuDuplicar">
            <i class="fas fa-copy"></i>
            <span>Duplicar Meta</span>
        </a>
        <a href="#" class="context-item" id="menuConcluir">
            <i class="fas fa-check-circle"></i>
            <span>Marcar como Concluída</span>
        </a>
        <hr>
        <a href="#" class="context-item context-item-danger" id="menuExcluir">
            <i class="fas fa-trash"></i>
            <span>Excluir Meta</span>
        </a>
    </div>

    <!-- ========================================== -->
    <!-- MODAL: ATUALIZAR PROGRESSO                 -->
    <!-- ========================================== -->
    <div class="modal" id="modalProgresso">
        <div class="modal-overlay" onclick="fecharModalProgresso()"></div>
        <div class="modal-content" style="max-width: 480px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-chart-line" style="color: #FFD93D;"></i>
                    Atualizar Progresso
                </h3>
                <button class="modal-close" onclick="fecharModalProgresso()">&times;</button>
            </div>
            <div class="modal-body">
                <p class="modal-texto">
                    Atualize o progresso da meta
                </p>
                <p class="modal-projeto-nome" id="modalProgressoNome">-</p>

                <div class="form-group">
                    <label class="form-label">Novo Progresso (%)</label>
                    <div class="progresso-slider-container">
                        <input type="range" class="progresso-slider" id="progressoSlider" 
                               min="0" max="100" step="5" value="0"
                               oninput="atualizarSliderProgresso(this.value)">
                        <span class="progresso-slider-value" id="progressoSliderValue">0%</span>
                    </div>
                    <div class="progresso-slider-barra">
                        <div class="progresso-slider-fill" id="progressoSliderFill" style="width: 0%;"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Notas (opcional)</label>
                    <textarea class="form-control" id="progressoNotas" rows="2" 
                              placeholder="Adicione uma nota sobre a atualização..."
                              maxlength="300"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalProgresso()">Cancelar</button>
                <button class="btn btn-primary" onclick="salvarProgresso()">
                    <i class="fas fa-check"></i> Atualizar
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO DE EXCLUSÃO           -->
    <!-- ========================================== -->
    <div class="modal" id="modalExcluir">
        <div class="modal-overlay" onclick="fecharModalExcluir()"></div>
        <div class="modal-content modal-content-danger">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Exclusão
                </h3>
                <button class="modal-close" onclick="fecharModalExcluir()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-alerta-danger">
                    <i class="fas fa-trash"></i>
                    <div>
                        <strong>Esta ação é irreversível!</strong>
                        <span>A meta e todo o seu histórico serão permanentemente excluídos.</span>
                    </div>
                </div>
                <p class="modal-texto">Tem certeza que deseja excluir a meta</p>
                <p class="modal-projeto-nome" id="modalMetaNome">-</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalExcluir()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <a href="#" class="btn btn-danger" id="modalBtnExcluir">
                    <i class="fas fa-trash"></i> Excluir Permanentemente
                </a>
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
        // FILTROS
        // ============================================
        let filtroStatusAtual = 'todos';
        let filtroCategoriaAtual = '';

        function filtrarPorStatus(status) {
            filtroStatusAtual = status;
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === status);
            });
            filtrarMetas();
        }

        function filtrarPorCategoria(categoria) {
            filtroCategoriaAtual = categoria;

            document.querySelectorAll('.filtro-categoria').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.categoria === categoria);
            });

            const limpar = document.querySelector('.limpar-categoria');
            if (limpar) {
                limpar.style.display = categoria ? 'inline-flex' : 'none';
            }

            filtrarMetas();
        }

        function filtrarMetas() {
            const search = (document.getElementById('searchMeta')?.value || '').toLowerCase().trim();
            const cards = document.querySelectorAll('.meta-card');
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && card.dataset.status !== filtroStatusAtual) {
                    mostrar = false;
                }

                if (mostrar && filtroCategoriaAtual && card.dataset.categoria !== filtroCategoriaAtual) {
                    mostrar = false;
                }

                if (mostrar && search) {
                    mostrar = card.dataset.busca.includes(search);
                }

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            const container = document.getElementById('metasGrid');
            const emptyState = document.querySelector('.empty-state-filtro');

            if (visiveis === 0 && container) {
                if (!emptyState) {
                    const empty = document.createElement('div');
                    empty.className = 'empty-state empty-state-filtro';
                    empty.innerHTML = `
                        <i class="fas fa-search"></i>
                        <h3>Nenhuma meta encontrada</h3>
                        <p>Tente ajustar os filtros de pesquisa</p>
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar Filtros
                        </button>
                    `;
                    container.parentNode.appendChild(empty);
                }
            } else if (emptyState) {
                emptyState.remove();
            }
        }

        function limparFiltros() {
            document.getElementById('searchMeta').value = '';
            filtroStatusAtual = 'todos';
            filtroCategoriaAtual = '';
            
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === 'todos');
            });
            document.querySelectorAll('.filtro-categoria').forEach(btn => {
                btn.classList.remove('active');
            });
            
            const limpar = document.querySelector('.limpar-categoria');
            if (limpar) limpar.style.display = 'none';
            
            filtrarMetas();
        }

        // ============================================
        // MUDAR VISUALIZAÇÃO
        // ============================================
        function mudarView(view) {
            const container = document.getElementById('metasGrid');
            if (!container) return;

            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === view);
            });

            if (view === 'list') {
                container.classList.add('metas-list-view');
            } else {
                container.classList.remove('metas-list-view');
            }

            localStorage.setItem('geonnexus-metas-view', view);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedView = localStorage.getItem('geonnexus-metas-view');
            if (savedView) mudarView(savedView);
        });

        // ============================================
        // MENU CONTEXTUAL
        // ============================================
        let metaAtualMenu = null;
        let metaAtualNome = null;

        function abrirMenuCard(event, metaId) {
            event.stopPropagation();
            event.preventDefault();

            const menu = document.getElementById('contextMenu');
            const rect = event.target.closest('button').getBoundingClientRect();

            metaAtualMenu = metaId;

            const card = document.querySelector(`.meta-card[data-id="${metaId}"]`);
            if (card) {
                metaAtualNome = card.querySelector('.meta-titulo').textContent;
            }

            menu.style.position = 'fixed';
            menu.style.top = (rect.bottom + 5) + 'px';
            menu.style.left = (rect.right - 220) + 'px';
            menu.style.display = 'block';

            setTimeout(() => {
                const menuRect = menu.getBoundingClientRect();
                if (menuRect.right > window.innerWidth) {
                    menu.style.left = (window.innerWidth - menuRect.width - 10) + 'px';
                }
                if (menuRect.bottom > window.innerHeight) {
                    menu.style.top = (rect.top - menuRect.height - 5) + 'px';
                }
            }, 10);

            document.getElementById('menuVerDetalhes').href = 'meta-detalhe.php?id=' + metaId;
            document.getElementById('menuEditar').href = 'meta-editar.php?id=' + metaId;
            document.getElementById('menuExcluir').href = 'meta-excluir.php?id=' + metaId;
        }

        document.addEventListener('click', function(e) {
            const menu = document.getElementById('contextMenu');
            if (menu && !menu.contains(e.target) && !e.target.closest('.meta-actions')) {
                menu.style.display = 'none';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const menu = document.getElementById('contextMenu');
                if (menu) menu.style.display = 'none';
                fecharModalProgresso();
                fecharModalExcluir();
            }
        });

        // Ações do menu
        document.addEventListener('DOMContentLoaded', function() {
            const menuDuplicar = document.getElementById('menuDuplicar');
            const menuConcluir = document.getElementById('menuConcluir');
            const menuExcluir = document.getElementById('menuExcluir');

            if (menuDuplicar) {
                menuDuplicar.addEventListener('click', function(e) {
                    e.preventDefault();
                    mostrarToast('Meta duplicada com sucesso!', 'success');
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuConcluir) {
                menuConcluir.addEventListener('click', function(e) {
                    e.preventDefault();
                    mostrarToast('Meta marcada como concluída! 🎉', 'success');
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuExcluir) {
                menuExcluir.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('contextMenu').style.display = 'none';
                    
                    if (metaAtualNome && metaAtualMenu) {
                        const modal = document.getElementById('modalExcluir');
                        const btnExcluir = document.getElementById('modalBtnExcluir');
                        
                        document.getElementById('modalMetaNome').textContent = '"' + metaAtualNome + '"';
                        btnExcluir.href = 'meta-excluir.php?id=' + metaAtualMenu;
                        
                        modal.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }
                });
            }
        });

        // ============================================
        // ATUALIZAR PROGRESSO (MODAL)
        // ============================================
        let metaProgressoId = null;

        function atualizarProgresso(id, percentual, titulo) {
            metaProgressoId = id;
            document.getElementById('modalProgressoNome').textContent = '"' + titulo + '"';
            document.getElementById('progressoSlider').value = percentual;
            atualizarSliderProgresso(percentual);
            document.getElementById('progressoNotas').value = '';
            document.getElementById('modalProgresso').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function atualizarSliderProgresso(valor) {
            document.getElementById('progressoSliderValue').textContent = valor + '%';
            document.getElementById('progressoSliderFill').style.width = valor + '%';
            
            // Cor dinâmica
            const fill = document.getElementById('progressoSliderFill');
            if (valor >= 80) {
                fill.style.background = 'linear-gradient(90deg, #00FFA3 0%, #00D2FF 100%)';
            } else if (valor >= 50) {
                fill.style.background = 'linear-gradient(90deg, #FFD93D 0%, #FF9F43 100%)';
            } else {
                fill.style.background = 'linear-gradient(90deg, #FF6B6B 0%, #FF9F43 100%)';
            }
        }

        function fecharModalProgresso() {
            document.getElementById('modalProgresso').classList.remove('active');
            document.body.style.overflow = '';
        }

        function salvarProgresso() {
            const valor = document.getElementById('progressoSlider').value;
            const card = document.querySelector(`.meta-card[data-id="${metaProgressoId}"]`);
            
            if (card) {
                // Atualizar barra de progresso
                const percent = card.querySelector('.progresso-percent');
                const fill = card.querySelector('.progresso-preenchimento');
                
                if (percent) percent.textContent = valor + '%';
                if (fill) fill.style.width = valor + '%';
                
                // Atualizar sparkline
                const sparkline = card.querySelector('.historico-sparkline');
                if (sparkline) {
                    const bars = sparkline.querySelectorAll('.sparkline-bar');
                    // Deslocar valores e adicionar novo
                    const novosValores = [];
                    bars.forEach((bar, i) => {
                        if (i < bars.length - 1) {
                            novosValores.push(parseInt(bar.style.height));
                        }
                    });
                    novosValores.push(parseInt(valor));
                    
                    // Re-renderizar
                    const cor = card.style.getPropertyValue('--cat-color');
                    sparkline.innerHTML = novosValores.map((v, i) => 
                        `<div class="sparkline-bar" style="height: ${v}%; background: ${cor}; opacity: ${0.4 + (i * 0.15)};" title="${v}%"></div>`
                    ).join('');
                }
            }
            
            mostrarToast('Progresso atualizado para ' + valor + '%', 'success');
            fecharModalProgresso();
        }

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, nomeMeta, metaId) {
            event.preventDefault();
            
            const modal = document.getElementById('modalExcluir');
            const btnExcluir = document.getElementById('modalBtnExcluir');
            
            document.getElementById('modalMetaNome').textContent = '"' + nomeMeta + '"';
            btnExcluir.href = 'meta-excluir.php?id=' + metaId;
            
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            return false;
        }

        function fecharModalExcluir() {
            const modal = document.getElementById('modalExcluir');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
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
            background: linear-gradient(180deg, #FFD93D 0%, #FF9F43 100%);
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
            font-size: var(--text-h1);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #FFD93D; font-size: 0.85em; }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.3);
        }

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

        .btn-theme:hover { border-color: #FFD93D; color: #FFD93D; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* STATS CARDS                                */
        /* ========================================== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .stat-card .icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.red { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* FILTROS                                    */
        /* ========================================== */
        .filtros {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .filtros-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
            pointer-events: none;
        }

        .search-box input {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 10px 14px 10px 42px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
        }

        .search-box input:focus {
            outline: none;
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .search-box input::placeholder { color: var(--text-muted); }

        .filtros-actions {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
        }

        .view-toggle {
            display: flex;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 2px;
            gap: 2px;
        }

        .view-btn {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            border: none;
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
        }

        .view-btn:hover { color: var(--text-primary); background: var(--bg-card-hover); }
        .view-btn.active { background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%); color: #0A1628; }

        .filtros-status {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            margin-bottom: var(--space-md);
        }

        .filtro-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .filtro-status:hover { border-color: #FFD93D; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-color: transparent;
        }

        .filtro-status .count {
            background: rgba(255, 255, 255, 0.2);
            padding: 1px 6px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
        }

        .filtro-status:not(.active) .count {
            background: var(--bg-card);
            color: var(--text-muted);
        }

        .filtros-categorias {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .filtros-categorias-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-right: var(--space-sm);
        }

        .filtro-categoria {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-xs);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .filtro-categoria i { font-size: 11px; }

        .filtro-categoria:hover {
            border-color: var(--cat-color);
            color: var(--cat-color);
        }

        .filtro-categoria.active {
            background: var(--cat-color)20;
            border-color: var(--cat-color);
            color: var(--cat-color);
        }

        .filtro-categoria.limpar-categoria {
            background: rgba(255, 107, 107, 0.1);
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        /* ========================================== */
        /* METAS GRID                                 */
        /* ========================================== */
        .metas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: var(--space-lg);
        }

        .meta-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition-smooth);
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .meta-card:hover {
            border-color: var(--cat-color, #FFD93D);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        /* ===== HEADER DO CARD ===== */
        .meta-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            background: linear-gradient(135deg, var(--cat-color, #FFD93D)08 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
            gap: var(--space-sm);
        }

        .meta-card-categoria {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            min-width: 0;
        }

        .categoria-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .categoria-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .categoria-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .meta-id {
            font-family: var(--font-display);
            font-size: 10px;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-status i { font-size: 6px; animation: pulse 2s ease-in-out infinite; }

        .badge-status.status-concluida { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-em-andamento { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-status.status-atrasada { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }

        /* ===== BODY DO CARD ===== */
        .meta-card-body {
            padding: var(--space-md);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .meta-titulo {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
        }

        .meta-descricao {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ===== PRIORIDADE ===== */
        .meta-prioridade {
            display: flex;
            align-items: center;
        }

        .prioridade-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .prioridade-badge.prioridade-alta { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .prioridade-badge.prioridade-media { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .prioridade-badge.prioridade-baixa { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }

        /* ===== PROGRESSO ===== */
        .meta-progresso-section {
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .progresso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }

        .progresso-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .progresso-percent {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
        }

        .progresso-barra {
            height: 8px;
            background: var(--bg-card);
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 6px;
        }

        .progresso-preenchimento {
            height: 100%;
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .progresso-valores {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: var(--text-xs);
        }

        .progresso-atual {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--text-primary);
        }

        .progresso-meta {
            color: var(--text-muted);
        }

        /* ===== HISTÓRICO (SPARKLINE) ===== */
        .meta-historico {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .historico-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        .historico-sparkline {
            flex: 1;
            display: flex;
            align-items: flex-end;
            gap: 3px;
            height: 30px;
        }

        .sparkline-bar {
            flex: 1;
            min-height: 3px;
            border-radius: 2px 2px 0 0;
            transition: var(--transition-smooth);
        }

        .sparkline-bar:hover {
            opacity: 1 !important;
            transform: scaleY(1.1);
        }

        /* ===== DATAS ===== */
        .meta-datas {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
        }

        .data-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .data-item i {
            color: #00D2FF;
            font-size: 13px;
        }

        .data-item div {
            display: flex;
            flex-direction: column;
            gap: 1px;
            min-width: 0;
        }

        .data-label {
            font-size: 9px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-value {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-primary);
        }

        .data-item.prazo-urgente { border-color: rgba(255, 217, 61, 0.3); }
        .data-item.prazo-urgente i { color: #FFD93D; }
        .data-item.prazo-atrasado { border-color: rgba(255, 107, 107, 0.3); background: rgba(255, 107, 107, 0.04); }
        .data-item.prazo-atrasado i { color: #FF6B6B; }

        /* ===== FOOTER DO CARD ===== */
        .meta-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            border-top: 1px solid var(--border-color);
            background: var(--bg-input);
            gap: var(--space-sm);
        }

        .meta-responsavel {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .meta-responsavel i {
            color: #00D2FF;
        }

        .meta-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
        }

        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .btn-action:hover {
            border-color: #FFD93D;
            color: #FFD93D;
            background: rgba(255, 217, 61, 0.05);
        }

        .btn-action-danger {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .btn-action-danger:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
            transform: scale(1.05);
        }

        /* ===== BOTÃO ATUALIZAR PROGRESSO ===== */
        .btn-atualizar-progresso {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, var(--cat-color, #FFD93D)20 0%, var(--cat-color, #FFD93D)08 100%);
            border: none;
            border-top: 1px solid var(--cat-color, #FFD93D)30;
            padding: var(--space-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            font-family: var(--font-body);
            position: relative;
            overflow: hidden;
        }

        .btn-atualizar-progresso::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--cat-color, #FFD93D)15, transparent);
            transition: left 0.6s ease;
        }

        .btn-atualizar-progresso:hover::before { left: 100%; }

        .btn-atualizar-progresso:hover {
            background: linear-gradient(135deg, var(--cat-color, #FFD93D)30 0%, var(--cat-color, #FFD93D)15 100%);
        }

        .btn-atualizar-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-sm);
            position: relative;
            z-index: 1;
        }

        .btn-atualizar-content i:first-child {
            color: var(--cat-color, #FFD93D);
            font-size: 14px;
        }

        .btn-atualizar-content span {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .btn-atualizar-content i:last-child {
            color: var(--cat-color, #FFD93D);
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .btn-atualizar-progresso:hover .btn-atualizar-content i:last-child {
            transform: translateX(4px);
        }

        /* ===== META CONCLUÍDA ===== */
        .meta-concluida-banner {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.15) 0%, rgba(0, 210, 255, 0.08) 100%);
            border-top: 1px solid rgba(0, 255, 163, 0.3);
            color: #00FFA3;
            font-weight: 600;
            font-size: var(--text-sm);
        }

        .meta-concluida-banner i {
            font-size: 18px;
            animation: pulse 2s ease-in-out infinite;
        }

        /* ========================================== */
        /* LIST VIEW                                  */
        /* ========================================== */
        .metas-grid.metas-list-view {
            grid-template-columns: 1fr;
        }

        .metas-grid.metas-list-view .meta-card {
            display: grid;
            grid-template-columns: 1fr 300px;
            align-items: stretch;
        }

        .metas-grid.metas-list-view .meta-card-header,
        .metas-grid.metas-list-view .meta-card-body,
        .metas-grid.metas-list-view .meta-card-footer {
            grid-column: 1;
        }

        .metas-grid.metas-list-view .btn-atualizar-progresso,
        .metas-grid.metas-list-view .meta-concluida-banner {
            grid-column: 2;
            grid-row: 1 / -1;
            border-top: none;
            border-left: 1px solid var(--cat-color, #FFD93D)30;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ========================================== */
        /* EMPTY STATE                                */
        /* ========================================== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px dashed var(--border-color);
        }

        .empty-state i {
            font-size: 56px;
            color: var(--text-muted);
            opacity: 0.4;
            margin-bottom: var(--space-md);
            display: block;
        }

        .empty-state h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .empty-state p {
            color: var(--text-muted);
            margin: 0 0 var(--space-lg) 0;
        }

        /* ========================================== */
        /* CONTEXT MENU                               */
        /* ========================================== */
        .context-menu {
            display: none;
            position: fixed;
            min-width: 220px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            padding: 4px;
            z-index: 999999;
            backdrop-filter: blur(10px);
        }

        .context-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            color: var(--text-secondary);
            text-decoration: none;
            font-size: var(--text-sm);
            font-weight: 500;
            transition: var(--transition-smooth);
            cursor: pointer;
        }

        .context-item i {
            width: 16px;
            font-size: 13px;
            text-align: center;
            color: var(--text-muted);
        }

        .context-item:hover { background: var(--bg-card-hover); color: var(--text-primary); }
        .context-item:hover i { color: #FFD93D; }

        .context-item-danger { color: #FF6B6B; }
        .context-item-danger i { color: #FF6B6B; }
        .context-item-danger:hover { background: rgba(255, 107, 107, 0.1); color: #FF6B6B; }
        .context-item-danger:hover i { color: #FF6B6B; }

        .context-menu hr {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 4px 0;
        }

        /* ========================================== */
        /* MODAIS                                     */
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
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid var(--border-color);
            z-index: 10;
        }

        .modal-content-danger {
            border: 2px solid rgba(255, 107, 107, 0.3);
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
            color: var(--text-primary);
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

        .modal-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            text-align: center;
        }

        .modal-projeto-nome {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #FFD93D;
            text-align: center;
            margin: 0 0 var(--space-lg) 0;
            padding: var(--space-md);
            background: rgba(255, 217, 61, 0.08);
            border-radius: var(--radius-md);
            border: 2px dashed rgba(255, 217, 61, 0.4);
        }

        .modal-alerta-danger {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border: 1px solid rgba(255, 107, 107, 0.25);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-lg);
        }

        .modal-alerta-danger i { font-size: 24px; color: #FF6B6B; flex-shrink: 0; }
        .modal-alerta-danger div { display: flex; flex-direction: column; gap: 4px; }
        .modal-alerta-danger strong { font-size: var(--text-sm); color: #FF6B6B; }
        .modal-alerta-danger span { font-size: var(--text-xs); color: var(--text-secondary); }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 120px; justify-content: center; }

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
        /* PROGRESSO SLIDER                           */
        /* ========================================== */
        .progresso-slider-container {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            margin-bottom: 8px;
        }

        .progresso-slider {
            flex: 1;
            -webkit-appearance: none;
            appearance: none;
            height: 8px;
            border-radius: 4px;
            background: var(--bg-input);
            outline: none;
            cursor: pointer;
        }

        .progresso-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            cursor: pointer;
            border: 3px solid var(--bg-card);
            box-shadow: 0 2px 8px rgba(255, 217, 61, 0.4);
        }

        .progresso-slider::-moz-range-thumb {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            cursor: pointer;
            border: 3px solid var(--bg-card);
            box-shadow: 0 2px 8px rgba(255, 217, 61, 0.4);
        }

        .progresso-slider-value {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: #FFD93D;
            min-width: 60px;
            text-align: right;
        }

        .progresso-slider-barra {
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .progresso-slider-fill {
            height: 100%;
            background: linear-gradient(90deg, #FF6B6B 0%, #FF9F43 100%);
            border-radius: 3px;
            transition: width 0.3s ease, background 0.3s ease;
        }

        .form-group {
            margin-bottom: var(--space-md);
        }

        .form-label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 6px;
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

        .form-control::placeholder { color: var(--text-muted); }

        textarea.form-control {
            resize: vertical;
            min-height: 70px;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .metas-grid { grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); }
            
            .metas-grid.metas-list-view .meta-card {
                grid-template-columns: 1fr;
            }
            
            .metas-grid.metas-list-view .btn-atualizar-progresso,
            .metas-grid.metas-list-view .meta-concluida-banner {
                grid-column: 1;
                grid-row: auto;
                border-left: none;
                border-top: 1px solid var(--cat-color, #FFD93D)30;
            }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .metas-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            
            .filtros-top { flex-direction: column; align-items: stretch; }
            .filtros-actions { justify-content: space-between; }
            
            .filtros-status {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 4px;
            }
            
            .filtro-status { white-space: nowrap; flex-shrink: 0; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
            
            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .meta-datas { grid-template-columns: 1fr; }
            .meta-card-footer { flex-direction: column; align-items: stretch; }
            .meta-actions { justify-content: flex-end; }
            .progresso-slider-value { font-size: var(--text-h4); min-width: 50px; }
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

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>

