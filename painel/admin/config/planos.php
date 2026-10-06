<?php
// painel/admin/config/planos.php - Gestão de Planos
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Planos';
$pagina_atual = 'planos';
$pagina_atual_sidebar = $pagina_atual;

// ===== DADOS MOCKADOS - PLANOS =====
$planos = [
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
    [
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
        'criado_em' => '2025-01-01 00:00:00'
    ],
];

$total_planos = count($planos);
$planos_ativos = count(array_filter($planos, function($p) { return $p['status'] === 'ativo'; }));
$planos_inativos = count(array_filter($planos, function($p) { return $p['status'] === 'inativo'; }));

// ===== FUNÇÕES AUXILIARES =====
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y', strtotime($date));
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
                    <i class="fas fa-crown icon" style="color: #FFD93D;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <span>Planos</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>

                

                <div class="header-actions">
                    <a href="plano-criar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Novo Plano
                    </a>
                    <button class="btn btn-outline" onclick="window.location.reload()">
                        <i class="fas fa-sync-alt"></i> Atualizar
                    </button>
                </div>
            </div>
        </header>

        <!-- ===== STATS CARDS ===== -->
        <section class="stats-grid">
            <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                <div class="icon blue"><i class="fas fa-list"></i></div>
                <div class="value"><?php echo $total_planos; ?></div>
                <div class="label">Total de Planos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                <div class="icon green"><i class="fas fa-check-circle"></i></div>
                <div class="value"><?php echo $planos_ativos; ?></div>
                <div class="label">Ativos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                <div class="icon red"><i class="fas fa-times-circle"></i></div>
                <div class="value"><?php echo $planos_inativos; ?></div>
                <div class="label">Inativos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                <div class="icon yellow"><i class="fas fa-tag"></i></div>
                <div class="value">3</div>
                <div class="label">Categorias</div>
            </div>
        </section>

        <!-- ===== FILTROS ===== -->
        <div class="filtros-container">
            <div class="filtros-grid">
                <div class="filtro-group">
                    <label class="filtro-label"><i class="fas fa-search"></i> Buscar</label>
                    <input type="text" class="form-control" id="searchPlano" placeholder="Nome do plano..." onkeyup="filtrarPlanos()">
                </div>
                <div class="filtro-group">
                    <label class="filtro-label"><i class="fas fa-tag"></i> Status</label>
                    <select class="form-control" id="filtroStatus" onchange="filtrarPlanos()">
                        <option value="todos">Todos os status</option>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <div class="filtro-group">
                    <label class="filtro-label"><i class="fas fa-layer-group"></i> Categoria</label>
                    <select class="form-control" id="filtroCategoria" onchange="filtrarPlanos()">
                        <option value="todos">Todas as categorias</option>
                        <option value="Individual">Individual</option>
                        <option value="Empresarial">Empresarial</option>
                        <option value="Institucional">Institucional</option>
                    </select>
                </div>
                <div class="filtro-group filtro-actions">
                    <button class="btn btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-times"></i> Limpar
                    </button>
                    <span class="resultados-count" id="resultadosCount"><?php echo $total_planos; ?> resultados</span>
                </div>
            </div>
        </div>

        <!-- ===== TABELA DE PLANOS ===== -->
        <div class="planos-container">
            <div class="section-header">
                <h3><i class="fas fa-crown"></i> Lista de Planos</h3>
                <div class="section-actions">
                    <span class="planos-total">Total: <strong><?php echo $total_planos; ?> planos</strong></span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table-planos" id="tabelaPlanos">
                    <thead>
                        <tr>
                            <th>Plano</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Período</th>
                            <th>Usuários</th>
                            <th>Projetos</th>
                            <th>Armazenamento</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="planosBody">
                        <?php foreach ($planos as $plano): ?>
                        <tr data-status="<?php echo $plano['status']; ?>"
                            data-categoria="<?php echo strtolower($plano['categoria']); ?>"
                            data-nome="<?php echo strtolower($plano['nome']); ?>">
                            <td>
                                <div class="plano-info">
                                    <span class="plano-nome"><strong><?php echo $plano['nome']; ?></strong></span>
                                    <?php if ($plano['destaque']): ?>
                                        <span class="badge-destaque"><i class="fas fa-star"></i> Destaque</span>
                                    <?php endif; ?>
                                    <?php if ($plano['popular']): ?>
                                        <span class="badge-popular"><i class="fas fa-fire"></i> Popular</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <span class="badge-categoria <?php echo strtolower($plano['categoria']); ?>">
                                    <i class="fas <?php echo getCategoriaIcon($plano['categoria']); ?>"></i>
                                    <?php echo $plano['categoria']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="valor">Kz <?php echo formatMoney($plano['valor']); ?></span>
                            </td>
                            <td><?php echo $plano['periodo']; ?></td>
                            <td><?php echo $plano['usuarios']; ?></td>
                            <td><?php echo $plano['projetos']; ?></td>
                            <td><?php echo $plano['armazenamento']; ?></td>
                            <td>
                                <span class="badge-status status-<?php echo $plano['status']; ?>">
                                    <i class="fas <?php echo $plano['status'] === 'ativo' ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i>
                                    <?php echo $plano['status_label']; ?>
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="plano-editar.php?id=<?php echo $plano['id']; ?>" class="btn" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="plano-excluir.php?id=<?php echo $plano['id']; ?>" class="btn btn-danger" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- ===== PAGINAÇÃO ===== -->
            <div class="paginacao-container">
                <div class="paginacao-info">
                    Mostrando <strong id="paginacaoInicio">1</strong> - <strong id="paginacaoFim"><?php echo min(10, $total_planos); ?></strong> de <strong id="paginacaoTotal"><?php echo $total_planos; ?></strong> planos
                </div>
                <div class="paginacao-controles" id="paginacaoControles">
                    <button class="btn" id="paginaAnterior" onclick="mudarPagina(-1)" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="pagina-atual" id="paginaAtual">1 / <?php echo ceil($total_planos / 10); ?></span>
                    <button class="btn" id="paginaProxima" onclick="mudarPagina(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="paginacao-por-pagina">
                    <label>Por página:</label>
                    <select id="itensPorPagina" onchange="mudarItensPorPagina()">
                        <option value="5">5</option>
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>
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
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
        }
    });

    inicializarPaginacao();
});

// ==========================================
// TOGGLE SIDEBAR MOBILE
// ==========================================
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('bottomMenuToggle');

    if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
        if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
            sidebar.classList.remove('open');
            document.getElementById('sidebarOverlay')?.classList.remove('active');
        }
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
        });
    }
})();

// ==========================================
// FILTRAR PLANOS
// ==========================================
function filtrarPlanos() {
    const search = document.getElementById('searchPlano').value.toLowerCase();
    const status = document.getElementById('filtroStatus').value;
    const categoria = document.getElementById('filtroCategoria').value;

    const rows = document.querySelectorAll('#planosBody tr');
    let visiveis = 0;

    rows.forEach(row => {
        const nome = row.dataset.nome || '';
        const rowStatus = row.dataset.status || '';
        const rowCategoria = row.dataset.categoria || '';

        let mostrar = true;

        if (search) {
            const match = nome.includes(search);
            if (!match) mostrar = false;
        }

        if (status !== 'todos' && rowStatus !== status) mostrar = false;
        if (categoria !== 'todos' && rowCategoria !== categoria.toLowerCase()) mostrar = false;

        row.style.display = mostrar ? '' : 'none';
        if (mostrar) visiveis++;
    });

    document.getElementById('resultadosCount').textContent = visiveis + ' resultados';
    paginaAtual = 1;
    atualizarPaginacao();
}

function limparFiltros() {
    document.getElementById('searchPlano').value = '';
    document.getElementById('filtroStatus').value = 'todos';
    document.getElementById('filtroCategoria').value = 'todos';
    filtrarPlanos();
}

// ==========================================
// PAGINAÇÃO
// ==========================================
let paginaAtual = 1;
let itensPorPagina = 10;

function inicializarPaginacao() {
    atualizarPaginacao();
}

function atualizarPaginacao() {
    const rows = document.querySelectorAll('#planosBody tr');
    const visiveis = Array.from(rows).filter(row => row.style.display !== 'none');
    const total = visiveis.length;
    const totalPaginas = Math.ceil(total / itensPorPagina) || 1;

    if (paginaAtual > totalPaginas) paginaAtual = totalPaginas;
    if (paginaAtual < 1) paginaAtual = 1;

    const inicio = (paginaAtual - 1) * itensPorPagina;
    const fim = Math.min(inicio + itensPorPagina, total);

    rows.forEach((row) => {
        const visivel = row.style.display !== 'none';
        if (visivel) {
            const posicao = visiveis.indexOf(row);
            row.style.display = (posicao >= inicio && posicao < fim) ? '' : 'none';
        }
    });

    document.getElementById('paginacaoInicio').textContent = total > 0 ? inicio + 1 : 0;
    document.getElementById('paginacaoFim').textContent = total > 0 ? fim : 0;
    document.getElementById('paginacaoTotal').textContent = total;
    document.getElementById('paginaAtual').textContent = paginaAtual + ' / ' + totalPaginas;

    document.getElementById('paginaAnterior').disabled = paginaAtual <= 1;
    document.getElementById('paginaProxima').disabled = paginaAtual >= totalPaginas;
}

function mudarPagina(direcao) {
    const total = document.querySelectorAll('#planosBody tr:not([style*="display: none"])').length;
    const totalPaginas = Math.ceil(total / itensPorPagina) || 1;

    const novaPagina = paginaAtual + direcao;
    if (novaPagina < 1 || novaPagina > totalPaginas) return;

    paginaAtual = novaPagina;
    atualizarPaginacao();
}

function mudarItensPorPagina() {
    itensPorPagina = parseInt(document.getElementById('itensPorPagina').value);
    paginaAtual = 1;
    atualizarPaginacao();
}
</script>
 <!-- ===== CSS ESPECÍFICO ===== -->
    <style>
        /* ========================================== */
        /* PLANOS - CSS COMPLETO                      */
        /* ========================================== */

        /* ===== BOTÃO VOLTAR ===== */
        .btn-voltar-painel {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .btn-voltar-painel:hover {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        /* ===== CONTAINER ===== */
        .planos-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .planos-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== FILTROS ===== */
        .filtros-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .filtros-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .filtros-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: var(--space-md);
            align-items: end;
        }

        .filtro-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .filtro-label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filtro-label i {
            font-size: 12px;
        }

        .filtro-actions {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: var(--space-sm);
            padding-bottom: 1px;
            flex-wrap: wrap;
        }

        .resultados-count {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
            padding: 4px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-full);
        }

        /* ===== FORM CONTROLS ===== */
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
            min-height: 38px;
        }

        .form-control:focus {
            outline: none;
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-muted);
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

        /* ===== STATS CARDS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
            transform: translateY(-2px);
        }

        .stat-card .icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: var(--space-sm);
        }

        .stat-card .icon.blue {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .stat-card .icon.green {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .stat-card .icon.red {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .stat-card .icon.yellow {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .stat-card .value {
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            display: block;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== TABELA ===== */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0;
            padding: 0;
        }

        .table-planos {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 900px;
        }

        .table-planos thead {
            background: var(--bg-input);
        }

        .table-planos thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 10px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .table-planos tbody td {
            padding: 8px 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-planos tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-planos tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== PLANO INFO ===== */
        .plano-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .plano-nome {
            font-weight: 600;
            color: var(--text-primary);
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

        .badge-destaque {
            display: inline-block;
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            padding: 1px 8px;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-popular {
            display: inline-block;
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
            padding: 1px 8px;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== VALOR ===== */
        .valor {
            font-weight: 600;
            color: #FFD93D;
        }

        /* ===== SECTION HEADER ===== */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .section-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .section-header h3 i {
            color: #FFD93D;
        }

        .section-actions {
            display: flex;
            gap: var(--space-sm);
            align-items: center;
        }

        .planos-total {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .planos-total strong {
            color: #FFD93D;
            font-weight: 700;
        }

        /* ===== ACTION BUTTONS ===== */
        .action-buttons {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .action-buttons .btn {
            padding: 4px 8px;
            font-size: var(--text-xs);
            min-width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .action-buttons .btn:hover {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .action-buttons .btn-danger {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .action-buttons .btn-danger:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
        }

        /* ========================================== */
        /* PAGINAÇÃO                                 */
        /* ========================================== */

        .paginacao-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-lg);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .paginacao-info {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .paginacao-info strong {
            color: var(--text-primary);
        }

        .paginacao-controles {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .paginacao-controles .btn {
            padding: 4px 12px;
            min-width: 36px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .paginacao-controles .btn:hover:not(:disabled) {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .paginacao-controles .btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .pagina-atual {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
            min-width: 80px;
            text-align: center;
        }

        .paginacao-por-pagina {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .paginacao-por-pagina label {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .paginacao-por-pagina select {
            width: 60px;
            padding: 4px 8px;
            font-size: var(--text-xs);
            min-height: 30px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            cursor: pointer;
        }

        .paginacao-por-pagina select:focus {
            outline: none;
            border-color: #FFD93D;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1200px) {
            .filtros-grid {
                grid-template-columns: 1fr 1fr;
            }
            .filtro-actions {
                grid-column: span 2;
                justify-content: flex-end;
            }
        }

        @media (max-width: 992px) {
            .table-planos {
                min-width: 700px;
            }
        }

        @media (max-width: 768px) {
            .filtros-grid {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .filtro-actions {
                grid-column: span 1;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .paginacao-container {
                flex-direction: column;
                align-items: stretch;
                gap: var(--space-sm);
            }

            .paginacao-controles {
                justify-content: center;
            }

            .paginacao-por-pagina {
                justify-content: center;
            }

            .table-planos {
                min-width: 600px;
            }

            .planos-container {
                padding: var(--space-sm);
            }

            .filtros-container {
                padding: var(--space-sm);
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .planos-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .filtros-container {
                padding: var(--space-sm);
            }

            .filtro-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .resultados-count {
                text-align: center;
            }

            .action-buttons .btn {
                padding: 4px 6px;
                min-width: 26px;
                height: 26px;
                font-size: 10px;
            }

            .table-planos tbody td {
                padding: 6px 8px;
                font-size: var(--text-xs);
            }

            .table-planos thead th {
                padding: 8px 8px;
                font-size: 9px;
            }

            .paginacao-container {
                gap: var(--space-xs);
            }

            .paginacao-info {
                font-size: var(--text-xs);
                text-align: center;
            }

            .paginacao-controles .btn {
                min-width: 32px;
                height: 28px;
                font-size: var(--text-xs);
                padding: 2px 8px;
            }

            .pagina-atual {
                min-width: 60px;
                font-size: var(--text-xs);
            }

            .paginacao-por-pagina select {
                width: 50px;
                min-height: 26px;
                font-size: 10px;
                padding: 2px 6px;
            }
        }

        /* ========================================== */
        /* SCROLLBAR PERSONALIZADO                    */
        /* ========================================== */

        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }

        ::-webkit-scrollbar-thumb {
            background: #FFD93D;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #F5C842;
        }
    </style>
</body>
</html>