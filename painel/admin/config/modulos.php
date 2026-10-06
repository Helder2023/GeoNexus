<?php
// painel/admin/config/modulos.php - Gestão de Módulos
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Módulos';
$pagina_atual = 'modulos';
$pagina_atual_sidebar = $pagina_atual;

// ===== DADOS MOCKADOS - MÓDULOS =====
$modulos = [
    [
        'id' => 1,
        'nome' => 'Topografia',
        'descricao' => 'Levantamentos topográficos, processamento de dados e geração de plantas.',
        'icon' => 'fa-mountain',
        'categoria' => 'Geotecnologia',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '2.1.0',
        'data_atualizacao' => '2026-01-15 10:30:00',
        'dependencias' => ['GIS', 'CAD'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 2,
        'nome' => 'GIS',
        'descricao' => 'Sistemas de Informação Geográfica com análise espacial e mapas interativos.',
        'icon' => 'fa-globe',
        'categoria' => 'Geotecnologia',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '3.0.1',
        'data_atualizacao' => '2026-01-20 14:20:00',
        'dependencias' => [],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 3,
        'nome' => 'CAD',
        'descricao' => 'Editor CAD integrado para desenho técnico e modelação 2D/3D.',
        'icon' => 'fa-ruler-combined',
        'categoria' => 'Engenharia',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '2.0.0',
        'data_atualizacao' => '2026-01-10 09:00:00',
        'dependencias' => [],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 4,
        'nome' => 'GPS Tracker',
        'descricao' => 'Rastreamento GPS em tempo real para equipamentos e veículos.',
        'icon' => 'fa-satellite',
        'categoria' => 'Monitoramento',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '1.5.2',
        'data_atualizacao' => '2026-01-25 16:45:00',
        'dependencias' => ['Topografia'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 5,
        'nome' => 'Agricultura de Precisão',
        'descricao' => 'Monitoramento agrícola com drones, análise de solo e produtividade.',
        'icon' => 'fa-tractor',
        'categoria' => 'Agricultura',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '1.2.0',
        'data_atualizacao' => '2026-01-18 11:30:00',
        'dependencias' => ['GIS', 'Drones'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 6,
        'nome' => 'Mineração',
        'descricao' => 'Gestão de operações mineiras, modelação de jazidas e controle de produção.',
        'icon' => 'fa-gem',
        'categoria' => 'Recursos',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'versao' => '1.0.0',
        'data_atualizacao' => '2025-12-01 08:00:00',
        'dependencias' => ['GIS', 'Topografia'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 7,
        'nome' => 'Petróleo & Gás',
        'descricao' => 'Gestão de ativos, oleodutos e análise de dados sísmicos.',
        'icon' => 'fa-oil-can',
        'categoria' => 'Energia',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'versao' => '0.9.0',
        'data_atualizacao' => '2025-12-10 13:00:00',
        'dependencias' => ['GIS', 'GPS Tracker'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 8,
        'nome' => 'Energia',
        'descricao' => 'Gestão de redes elétricas, produção e distribuição de energia.',
        'icon' => 'fa-bolt',
        'categoria' => 'Energia',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '2.0.0',
        'data_atualizacao' => '2026-02-01 10:00:00',
        'dependencias' => ['GIS'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 9,
        'nome' => 'Urbanismo',
        'descricao' => 'Planeamento urbano, gestão de infraestruturas e licenciamento.',
        'icon' => 'fa-city',
        'categoria' => 'Planeamento',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '1.8.0',
        'data_atualizacao' => '2026-01-28 14:00:00',
        'dependencias' => ['GIS', 'CAD'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 10,
        'nome' => 'Transportes',
        'descricao' => 'Gestão de frotas, logística e otimização de rotas.',
        'icon' => 'fa-truck',
        'categoria' => 'Logística',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '1.3.0',
        'data_atualizacao' => '2026-01-22 09:30:00',
        'dependencias' => ['GPS Tracker'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 11,
        'nome' => 'Drones',
        'descricao' => 'Gestão de operações com drones, processamento de imagens e ortomosaicos.',
        'icon' => 'fa-drone',
        'categoria' => 'Aeronáutica',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '2.1.0',
        'data_atualizacao' => '2026-02-05 11:00:00',
        'dependencias' => ['GIS'],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 12,
        'nome' => 'Educação',
        'descricao' => 'Plataforma de ensino com cursos, certificações e conteúdos interativos.',
        'icon' => 'fa-graduation-cap',
        'categoria' => 'Educação',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '1.1.0',
        'data_atualizacao' => '2026-01-30 16:00:00',
        'dependencias' => [],
        'autor' => 'GeoNexus Team'
    ],
    [
        'id' => 13,
        'nome' => 'Meio Ambiente',
        'descricao' => 'Monitoramento ambiental, gestão de recursos naturais e relatórios ESG.',
        'icon' => 'fa-leaf',
        'categoria' => 'Ambiente',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'versao' => '0.8.0',
        'data_atualizacao' => '2025-11-15 10:00:00',
        'dependencias' => ['GIS', 'Agricultura de Precisão'],
        'autor' => 'GeoNexus Team'
    ],
];

$total_modulos = count($modulos);
$modulos_ativos = count(array_filter($modulos, function($m) { return $m['status'] === 'ativo'; }));
$modulos_inativos = count(array_filter($modulos, function($m) { return $m['status'] === 'inativo'; }));

// ===== FUNÇÕES AUXILIARES =====
function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y H:i', strtotime($date));
}

function getStatusColor($status) {
    return $status === 'ativo' ? '#00FFA3' : '#FF6B6B';
}

function getStatusIcon($status) {
    return $status === 'ativo' ? 'fa-check-circle' : 'fa-times-circle';
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
                    <i class="fas fa-puzzle-piece icon" style="color: #6C2BD9;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <span>Módulos</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>

                

                <div class="header-actions">
                    <button class="btn btn-primary" onclick="abrirModal('modalNovoModulo')">
                        <i class="fas fa-plus"></i> Novo Módulo
                    </button>
                    <button class="btn btn-outline" onclick="window.location.reload()">
                        <i class="fas fa-sync-alt"></i> Atualizar
                    </button>
                </div>
            </div>
        </header>

        <!-- ===== STATS CARDS ===== -->
        <section class="stats-grid">
            <div class="stat-card" style="border-left: 3px solid #6C2BD9;">
                <div class="icon aurora"><i class="fas fa-list"></i></div>
                <div class="value"><?php echo $total_modulos; ?></div>
                <div class="label">Total de Módulos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                <div class="icon green"><i class="fas fa-check-circle"></i></div>
                <div class="value"><?php echo $modulos_ativos; ?></div>
                <div class="label">Ativos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                <div class="icon red"><i class="fas fa-times-circle"></i></div>
                <div class="value"><?php echo $modulos_inativos; ?></div>
                <div class="label">Inativos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                <div class="icon blue"><i class="fas fa-tag"></i></div>
                <div class="value">6</div>
                <div class="label">Categorias</div>
            </div>
        </section>

        <!-- ===== FILTROS ===== -->
        <div class="filtros-container">
            <div class="filtros-grid">
                <div class="filtro-group">
                    <label class="filtro-label"><i class="fas fa-search"></i> Buscar</label>
                    <input type="text" class="form-control" id="searchModulo" placeholder="Nome ou descrição..." onkeyup="filtrarModulos()">
                </div>
                <div class="filtro-group">
                    <label class="filtro-label"><i class="fas fa-tag"></i> Status</label>
                    <select class="form-control" id="filtroStatus" onchange="filtrarModulos()">
                        <option value="todos">Todos os status</option>
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <div class="filtro-group">
                    <label class="filtro-label"><i class="fas fa-layer-group"></i> Categoria</label>
                    <select class="form-control" id="filtroCategoria" onchange="filtrarModulos()">
                        <option value="todos">Todas as categorias</option>
                        <option value="Geotecnologia">Geotecnologia</option>
                        <option value="Engenharia">Engenharia</option>
                        <option value="Monitoramento">Monitoramento</option>
                        <option value="Agricultura">Agricultura</option>
                        <option value="Recursos">Recursos</option>
                        <option value="Energia">Energia</option>
                        <option value="Planeamento">Planeamento</option>
                        <option value="Logística">Logística</option>
                        <option value="Aeronáutica">Aeronáutica</option>
                        <option value="Educação">Educação</option>
                        <option value="Ambiente">Ambiente</option>
                    </select>
                </div>
                <div class="filtro-group filtro-actions">
                    <button class="btn btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-times"></i> Limpar
                    </button>
                    <span class="resultados-count" id="resultadosCount"><?php echo $total_modulos; ?> resultados</span>
                </div>
            </div>
        </div>

        <!-- ===== TABELA DE MÓDULOS ===== -->
        <div class="modulos-container">
            <div class="section-header">
                <h3><i class="fas fa-puzzle-piece"></i> Lista de Módulos</h3>
                <div class="section-actions">
                    <span class="modulos-total">Total: <strong><?php echo $total_modulos; ?> módulos</strong></span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table-modulos" id="tabelaModulos">
                    <thead>
                        <tr>
                            <th>Módulo</th>
                            <th>Categoria</th>
                            <th>Versão</th>
                            <th>Dependências</th>
                            <th>Status</th>
                            <th>Atualização</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="modulosBody">
                        <?php foreach ($modulos as $modulo): ?>
                        <tr data-status="<?php echo $modulo['status']; ?>"
                            data-categoria="<?php echo strtolower($modulo['categoria']); ?>"
                            data-nome="<?php echo strtolower($modulo['nome']); ?>"
                            data-desc="<?php echo strtolower($modulo['descricao']); ?>">
                            <td>
                                <div class="modulo-info">
                                    <div class="modulo-icon">
                                        <i class="fas <?php echo $modulo['icon']; ?>"></i>
                                    </div>
                                    <div class="modulo-detalhes">
                                        <span class="modulo-nome"><?php echo $modulo['nome']; ?></span>
                                        <span class="modulo-desc"><?php echo substr($modulo['descricao'], 0, 60) . (strlen($modulo['descricao']) > 60 ? '...' : ''); ?></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-categoria"><?php echo $modulo['categoria']; ?></span>
                            </td>
                            <td>
                                <span class="badge-versao">v<?php echo $modulo['versao']; ?></span>
                            </td>
                            <td>
                                <?php if (empty($modulo['dependencias'])): ?>
                                    <span style="color: var(--text-muted); font-size: var(--text-xs);">Nenhuma</span>
                                <?php else: ?>
                                    <?php foreach ($modulo['dependencias'] as $dep): ?>
                                        <span class="badge-dependencia"><?php echo $dep; ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge-status status-<?php echo $modulo['status']; ?>">
                                    <i class="fas <?php echo getStatusIcon($modulo['status']); ?>"></i>
                                    <?php echo $modulo['status_label']; ?>
                                </span>
                            </td>
                            <td>
                                <div class="data-cell">
                                    <span class="data-principal"><?php echo formatDate($modulo['data_atualizacao']); ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="modulo-editar.php?id=<?php echo $modulo['id']; ?>" class="btn" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if ($modulo['status'] === 'ativo'): ?>
                                        <a href="modulo-desativar.php?id=<?php echo $modulo['id']; ?>" class="btn btn-danger" title="Desativar">
                                            <i class="fas fa-pause"></i>
                                        </a>
                                    <?php else: ?>
                                        <a href="modulo-ativar.php?id=<?php echo $modulo['id']; ?>" class="btn btn-success" title="Ativar">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    <?php endif; ?>
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
                    Mostrando <strong id="paginacaoInicio">1</strong> - <strong id="paginacaoFim"><?php echo min(10, $total_modulos); ?></strong> de <strong id="paginacaoTotal"><?php echo $total_modulos; ?></strong> módulos
                </div>
                <div class="paginacao-controles" id="paginacaoControles">
                    <button class="btn" id="paginaAnterior" onclick="mudarPagina(-1)" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="pagina-atual" id="paginaAtual">1 / <?php echo ceil($total_modulos / 10); ?></span>
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
<!-- MODAL NOVO MÓDULO                         -->
<!-- ========================================== -->
<div class="modal" id="modalNovoModulo">
    <div class="modal-overlay" onclick="fecharModal('modalNovoModulo')"></div>
    <div class="modal-content" style="max-width: 550px;">
        <div class="modal-header">
            <h3 class="modal-title"><i class="fas fa-plus-circle"></i> Novo Módulo</h3>
            <button class="modal-close" onclick="fecharModal('modalNovoModulo')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="formNovoModulo" onsubmit="criarModulo(event)">
                <div class="form-group">
                    <label class="form-label">Nome do Módulo <span class="required">*</span></label>
                    <input type="text" class="form-control" id="nomeModulo" placeholder="Ex: GIS, Topografia..." required>
                </div>
                <div class="form-group">
                    <label class="form-label">Descrição <span class="required">*</span></label>
                    <textarea class="form-control" id="descricaoModulo" rows="2" placeholder="Descrição do módulo" required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Categoria <span class="required">*</span></label>
                        <select class="form-control" id="categoriaModulo" required>
                            <option value="">Selecione...</option>
                            <option value="Geotecnologia">Geotecnologia</option>
                            <option value="Engenharia">Engenharia</option>
                            <option value="Monitoramento">Monitoramento</option>
                            <option value="Agricultura">Agricultura</option>
                            <option value="Recursos">Recursos</option>
                            <option value="Energia">Energia</option>
                            <option value="Planeamento">Planeamento</option>
                            <option value="Logística">Logística</option>
                            <option value="Aeronáutica">Aeronáutica</option>
                            <option value="Educação">Educação</option>
                            <option value="Ambiente">Ambiente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ícone</label>
                        <input type="text" class="form-control" id="iconeModulo" placeholder="fa-mountain" value="fa-puzzle-piece">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Dependências</label>
                    <select class="form-control" id="dependenciasModulo" multiple>
                        <option value="GIS">GIS</option>
                        <option value="CAD">CAD</option>
                        <option value="Topografia">Topografia</option>
                        <option value="GPS Tracker">GPS Tracker</option>
                        <option value="Drones">Drones</option>
                        <option value="Agricultura de Precisão">Agricultura de Precisão</option>
                    </select>
                    <span class="help-text">Segure Ctrl (Cmd) para selecionar múltiplas dependências</span>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control" id="statusModulo">
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalNovoModulo')">Cancelar</button>
            <button class="btn btn-primary" onclick="document.getElementById('formNovoModulo').submit()">
                <i class="fas fa-save"></i> Criar Módulo
            </button>
        </div>
    </div>
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
            fecharModal('modalNovoModulo');
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
// FILTRAR MÓDULOS
// ==========================================
function filtrarModulos() {
    const search = document.getElementById('searchModulo').value.toLowerCase();
    const status = document.getElementById('filtroStatus').value;
    const categoria = document.getElementById('filtroCategoria').value;

    const rows = document.querySelectorAll('#modulosBody tr');
    let visiveis = 0;

    rows.forEach(row => {
        const nome = row.dataset.nome || '';
        const desc = row.dataset.desc || '';
        const rowStatus = row.dataset.status || '';
        const rowCategoria = row.dataset.categoria || '';

        let mostrar = true;

        if (search) {
            const match = nome.includes(search) || desc.includes(search);
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
    document.getElementById('searchModulo').value = '';
    document.getElementById('filtroStatus').value = 'todos';
    document.getElementById('filtroCategoria').value = 'todos';
    filtrarModulos();
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
    const rows = document.querySelectorAll('#modulosBody tr');
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
    const total = document.querySelectorAll('#modulosBody tr:not([style*="display: none"])').length;
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

// ==========================================
// CRIAR MÓDULO
// ==========================================
function criarModulo(event) {
    event.preventDefault();

    const nome = document.getElementById('nomeModulo').value.trim();
    const descricao = document.getElementById('descricaoModulo').value.trim();
    const categoria = document.getElementById('categoriaModulo').value;

    if (!nome) {
        mostrarToast('Por favor, insira o nome do módulo.', 'error');
        document.getElementById('nomeModulo').focus();
        return;
    }

    if (!descricao) {
        mostrarToast('Por favor, insira a descrição do módulo.', 'error');
        document.getElementById('descricaoModulo').focus();
        return;
    }

    if (!categoria) {
        mostrarToast('Por favor, selecione a categoria.', 'error');
        document.getElementById('categoriaModulo').focus();
        return;
    }

    mostrarToast('Módulo "' + nome + '" criado com sucesso!', 'success');
    fecharModal('modalNovoModulo');
    document.getElementById('formNovoModulo').reset();

    setTimeout(() => {
        location.reload();
    }, 1500);
}

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
</script>

   <style>
        /* ========================================== */
        /* MÓDULOS - CSS COMPLETO                     */
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
        .modulos-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .modulos-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
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

        .stat-card .icon.aurora {
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
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
            border-color: #6C2BD9;
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
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

        /* ===== TABELA ===== */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0;
            padding: 0;
        }

        .table-modulos {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 900px;
        }

        .table-modulos thead {
            background: var(--bg-input);
        }

        .table-modulos thead th {
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

        .table-modulos tbody td {
            padding: 8px 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-modulos tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-modulos tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== MÓDULO INFO ===== */
        .modulo-info {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .modulo-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            background: rgba(108, 43, 217, 0.1);
            color: #6C2BD9;
            flex-shrink: 0;
        }

        .modulo-detalhes {
            display: flex;
            flex-direction: column;
        }

        .modulo-nome {
            font-weight: 600;
            color: var(--text-primary);
        }

        .modulo-desc {
            font-size: var(--text-xs);
            color: var(--text-muted);
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

        .badge-versao {
            display: inline-block;
            padding: 1px 8px;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 600;
            background: rgba(0, 210, 255, 0.1);
            color: #00D2FF;
        }

        .badge-categoria {
            display: inline-block;
            padding: 1px 8px;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 500;
            background: rgba(108, 43, 217, 0.08);
            color: #6C2BD9;
        }

        .badge-dependencia {
            display: inline-block;
            padding: 1px 6px;
            border-radius: var(--radius-full);
            font-size: 8px;
            font-weight: 500;
            background: rgba(255, 217, 61, 0.1);
            color: #FFD93D;
            margin: 1px;
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

        .action-buttons .btn-success {
            border-color: rgba(0, 255, 163, 0.3);
            color: #00FFA3;
        }

        .action-buttons .btn-success:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.1);
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
            color: #6C2BD9;
        }

        .section-actions {
            display: flex;
            gap: var(--space-sm);
            align-items: center;
        }

        .modulos-total {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .modulos-total strong {
            color: #6C2BD9;
            font-weight: 700;
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
            border-color: #6C2BD9;
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
            .table-modulos {
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

            .table-modulos {
                min-width: 600px;
            }

            .modulos-container {
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

            .modulos-container {
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

            .table-modulos tbody td {
                padding: 6px 8px;
                font-size: var(--text-xs);
            }

            .table-modulos thead th {
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

            .modulo-info {
                flex-direction: column;
                align-items: flex-start;
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
            background: #6C2BD9;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #8B5CF6;
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
            z-index: 99999;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .modal.active {
            display: flex !important;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            max-width: 550px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.6);
            border: 1px solid var(--border-color);
            z-index: 10;
            animation: modalSlideUp 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes modalSlideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px 16px 24px;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            background: var(--bg-card);
            z-index: 2;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        }

        .modal-header .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-header .modal-title i {
            font-size: 22px;
            color: #6C2BD9;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.6rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px 10px;
            line-height: 1;
            border-radius: var(--radius-sm);
        }

        .modal-close:hover {
            color: var(--text-primary);
            background: var(--bg-card-hover);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 24px;
            overflow-y: auto;
        }

        .modal-body .help-text {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 4px;
        }

        .modal-footer {
            padding: 16px 24px 20px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            position: sticky;
            bottom: 0;
            background: var(--bg-card);
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
        }

        .modal-footer .btn {
            min-width: 100px;
            justify-content: center;
            padding: 10px 20px;
            font-weight: 600;
        }

        .modal-footer .btn-outline {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--text-secondary);
        }

        .modal-footer .btn-outline:hover {
            border-color: var(--text-primary);
            color: var(--text-primary);
            background: var(--bg-card-hover);
        }

        .modal-footer .btn-primary {
            background: var(--gradient-aurora);
            color: #fff;
            border: 2px solid transparent;
        }

        .modal-footer .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(108, 43, 217, 0.3);
        }

        /* ===== FORMULÁRIO NO MODAL ===== */
        .modal .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .modal .form-group {
            margin-bottom: var(--space-md);
        }

        .modal .form-group:last-child {
            margin-bottom: 0;
        }

        .modal .form-group label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .modal .form-group label .required {
            color: #FF6B6B;
            margin-left: 2px;
        }

        .modal .form-control {
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

        .modal .form-control:focus {
            outline: none;
            border-color: #6C2BD9;
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        .modal .form-control::placeholder {
            color: var(--text-muted);
        }

        .modal select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        .modal select.form-control option {
            background: var(--bg-card);
            color: var(--text-primary);
            padding: 8px;
        }

        .modal select.form-control[multiple] {
            min-height: 80px;
            padding-right: 12px;
            background-image: none;
        }

        .modal textarea.form-control {
            resize: vertical;
            min-height: 60px;
            font-family: var(--font-body);
        }

        /* ========================================== */
        /* RESPONSIVIDADE - MODAL                     */
        /* ========================================== */

        @media (max-width: 768px) {
            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .modal-header {
                padding: 16px 18px 12px 18px;
            }

            .modal-header .modal-title {
                font-size: var(--text-h4);
            }

            .modal-body {
                padding: 18px;
            }

            .modal-footer {
                flex-direction: column;
                padding: 12px 18px 16px 18px;
            }

            .modal-footer .btn {
                width: 100%;
                min-width: auto;
                padding: 12px;
            }

            .modal .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }
        }

        @media (max-width: 480px) {
            .modal-content {
                width: 98%;
                max-width: 380px;
            }

            .modal-header {
                padding: 14px 16px 10px 16px;
            }

            .modal-header .modal-title {
                font-size: var(--text-h4);
                gap: 8px;
            }

            .modal-header .modal-title i {
                font-size: 18px;
            }

            .modal-close {
                font-size: 1.3rem;
                padding: 4px 8px;
            }

            .modal-body {
                padding: 14px 16px;
            }

            .modal-footer {
                padding: 10px 16px 14px 16px;
            }

            .modal-footer .btn {
                padding: 10px;
                font-size: var(--text-sm);
            }
        }

        /* ========================================== */
        /* SCROLLBAR - MODAL                         */
        /* ========================================== */

        .modal-content::-webkit-scrollbar {
            width: 4px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: var(--bg-primary);
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #6C2BD9;
            border-radius: 2px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #8B5CF6;
        }
    </style>
</body>
</html>