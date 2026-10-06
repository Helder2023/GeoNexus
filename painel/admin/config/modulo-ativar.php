<?php
// painel/admin/config/modulo-ativar.php - Ativar Módulo
include "../../../includes/notificacoes-config-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Ativar Módulo';
$pagina_atual = 'modulos';
$pagina_atual_sidebar = $pagina_atual;

// ============================================
// OBTER ID DO MÓDULO
// ============================================
$id_modulo = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - MÓDULOS
// ============================================
$modulos = [
    1 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => ['GPS Tracker', 'Agricultura de Precisão', 'Mineração'],
        'usuarios_ativos' => 42
    ],
    2 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => ['Topografia', 'Agricultura de Precisão', 'Mineração', 'Petróleo & Gás', 'Energia', 'Urbanismo', 'Drones', 'Meio Ambiente'],
        'usuarios_ativos' => 128
    ],
    3 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => ['Urbanismo'],
        'usuarios_ativos' => 56
    ],
    4 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => ['Transportes'],
        'usuarios_ativos' => 34
    ],
    5 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => ['Meio Ambiente'],
        'usuarios_ativos' => 18
    ],
    6 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => [],
        'usuarios_ativos' => 0
    ],
    7 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => [],
        'usuarios_ativos' => 0
    ],
    8 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => [],
        'usuarios_ativos' => 12
    ],
    9 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => [],
        'usuarios_ativos' => 8
    ],
    10 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => [],
        'usuarios_ativos' => 6
    ],
    11 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => ['Agricultura de Precisão'],
        'usuarios_ativos' => 24
    ],
    12 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => [],
        'usuarios_ativos' => 45
    ],
    13 => [
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
        'autor' => 'GeoNexus Team',
        'modulos_dependentes' => [],
        'usuarios_ativos' => 0
    ],
];

// ============================================
// OBTER MÓDULO ATUAL
// ============================================
$modulo = isset($modulos[$id_modulo]) ? $modulos[$id_modulo] : $modulos[1];

// ============================================
// VERIFICAR SE O MÓDULO JÁ ESTÁ ATIVO
// ============================================
$ja_ativo = $modulo['status'] === 'ativo';

// ============================================
// VERIFICAR DEPENDÊNCIAS
// ============================================
$tem_dependencias = isset($modulo['dependencias']) && count($modulo['dependencias']) > 0;
$dependencias_atendidas = true;
$dependencias_faltantes = [];

if ($tem_dependencias) {
    foreach ($modulo['dependencias'] as $dep) {
        // Verificar se a dependência existe e está ativa
        $dep_encontrada = false;
        foreach ($modulos as $m) {
            if ($m['nome'] === $dep && $m['status'] === 'ativo') {
                $dep_encontrada = true;
                break;
            }
        }
        if (!$dep_encontrada) {
            $dependencias_atendidas = false;
            $dependencias_faltantes[] = $dep;
        }
    }
}

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
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

function getCategoriaClass($categoria) {
    $classes = [
        'Geotecnologia' => 'geotecnologia',
        'Engenharia' => 'engenharia',
        'Monitoramento' => 'monitoramento',
        'Agricultura' => 'agricultura',
        'Recursos' => 'recursos',
        'Energia' => 'energia',
        'Planeamento' => 'planeamento',
        'Logística' => 'logistica',
        'Aeronáutica' => 'aeronautica',
        'Educação' => 'educacao',
        'Ambiente' => 'ambiente'
    ];
    return $classes[$categoria] ?? strtolower($categoria);
}

function getCategoriaColor($categoria) {
    $cores = [
        'Geotecnologia' => '#6C2BD9',
        'Engenharia' => '#00D2FF',
        'Monitoramento' => '#FF6B6B',
        'Agricultura' => '#00FFA3',
        'Recursos' => '#FFD93D',
        'Energia' => '#FF9F43',
        'Planeamento' => '#A29BFE',
        'Logística' => '#FD79A8',
        'Aeronáutica' => '#00CEC9',
        'Educação' => '#FDCB6E',
        'Ambiente' => '#00B894'
    ];
    return $cores[$categoria] ?? '#6B7A8F';
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
                    <i class="fas fa-play icon" style="color: #00FFA3;"></i>
                    <?php echo $titulo_pagina; ?>
                    <span class="badge-status status-<?php echo $modulo['status']; ?>">
                        <i class="fas <?php echo getStatusIcon($modulo['status']); ?>"></i>
                        <?php echo $modulo['status_label']; ?>
                    </span>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <a href="modulos.php">Módulos</a>
                    <span class="separator">/</span>
                    <span><?php echo $modulo['nome']; ?></span>
                    <span class="separator">/</span>
                    <span style="color: #00FFA3;">Ativar</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>
                <div class="header-actions">
                    <a href="modulos.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
        </header>

        <!-- ========================================== -->
        <!-- CONFIRMAÇÃO DE ATIVAÇÃO                   -->
        <!-- ========================================== -->
        <div class="ativar-container">
            <div class="ativar-card <?php echo $ja_ativo ? 'card-alerta' : ($dependencias_atendidas ? 'card-ativar' : 'card-erro'); ?>">
                <div class="ativar-icon <?php echo $ja_ativo ? 'icon-alerta' : ($dependencias_atendidas ? 'icon-ativar' : 'icon-erro'); ?>">
                    <i class="fas <?php echo $ja_ativo ? 'fa-info-circle' : ($dependencias_atendidas ? 'fa-rocket' : 'fa-exclamation-triangle'); ?>"></i>
                </div>

                <?php if ($ja_ativo): ?>
                    <h2>Módulo já está ativo</h2>
                    <p class="ativar-mensagem">
                        O módulo <strong>"<?php echo $modulo['nome']; ?>"</strong> já está ativo e disponível para todos os utilizadores.
                    </p>
                    <div class="ativar-info">
                        <p style="font-size: var(--text-sm); color: var(--text-muted);">
                            <i class="fas fa-check-circle" style="color: #00FFA3;"></i> 
                            Última atualização: <?php echo formatDate($modulo['data_atualizacao']); ?>
                        </p>
                        <p style="font-size: var(--text-sm); color: var(--text-muted);">
                            <i class="fas fa-users" style="color: #00D2FF;"></i> 
                            <?php echo $modulo['usuarios_ativos']; ?> utilizadores ativos
                        </p>
                    </div>
                    <div class="ativar-acoes">
                        <a href="modulo-desativar.php?id=<?php echo $modulo['id']; ?>" class="btn btn-danger btn-lg">
                            <i class="fas fa-pause"></i> Desativar Módulo
                        </a>
                        <a href="modulos.php" class="btn btn-outline btn-lg">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>

                <?php elseif (!$dependencias_atendidas): ?>
                    <h2>Dependências não atendidas</h2>
                    <p class="ativar-mensagem">
                        O módulo <strong>"<?php echo $modulo['nome']; ?>"</strong> não pode ser ativado porque depende de outros módulos que estão inativos.
                    </p>
                    
                    <div class="ativar-alerta erro">
                        <i class="fas fa-times-circle"></i>
                        <div>
                            <strong>Dependências necessárias:</strong>
                            <div class="modulos-dependentes">
                                <?php foreach ($dependencias_faltantes as $dep): ?>
                                    <span class="badge-dependencia faltante">
                                        <i class="fas fa-times"></i> <?php echo $dep; ?> (inativo)
                                    </span>
                                <?php endforeach; ?>
                            </div>
                            <span class="alerta-detalhe" style="color: #FF6B6B;">
                                <i class="fas fa-info-circle"></i> 
                                Ative os módulos acima antes de ativar este módulo.
                            </span>
                        </div>
                    </div>

                    <div class="ativar-info">
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="label">Dependências necessárias</span>
                                <span class="value">
                                    <?php foreach ($modulo['dependencias'] as $dep): ?>
                                        <span class="badge-dependencia"><?php echo $dep; ?></span>
                                    <?php endforeach; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="ativar-acoes">
                        <a href="modulos.php" class="btn btn-outline btn-lg">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>

                <?php else: ?>
                    <h2>Confirmar Ativação</h2>
                    <p class="ativar-mensagem">
                        Deseja ativar o módulo <strong>"<?php echo $modulo['nome']; ?>"</strong>?
                    </p>

                    <!-- ALERTA: Módulo com dependentes -->
                    <?php if ($tem_dependencias): ?>
                    <div class="ativar-alerta sucesso">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <strong>Todas as dependências estão ativas!</strong>
                            <span>Os seguintes módulos serão utilizados:</span>
                            <div class="modulos-dependentes">
                                <?php foreach ($modulo['dependencias'] as $dep): ?>
                                    <span class="badge-dependencia ativa">
                                        <i class="fas fa-check"></i> <?php echo $dep; ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Informações do Módulo -->
                    <div class="ativar-info">
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="label">Nome</span>
                                <span class="value" style="font-weight: 600; color: #6C2BD9;"><?php echo $modulo['nome']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="label">Categoria</span>
                                <span class="value">
                                    <span class="badge-categoria <?php echo getCategoriaClass($modulo['categoria']); ?>">
                                        <i class="fas <?php echo $modulo['icon']; ?>"></i>
                                        <?php echo $modulo['categoria']; ?>
                                    </span>
                                </span>
                            </div>
                            <div class="info-item">
                                <span class="label">Versão</span>
                                <span class="value"><span class="badge-versao">v<?php echo $modulo['versao']; ?></span></span>
                            </div>
                            <div class="info-item">
                                <span class="label">Autor</span>
                                <span class="value" style="font-size: var(--text-sm);"><?php echo $modulo['autor']; ?></span>
                            </div>
                            <div class="info-item" style="grid-column: span 2;">
                                <span class="label">Descrição</span>
                                <span class="value" style="font-size: var(--text-sm); color: var(--text-secondary);"><?php echo $modulo['descricao']; ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Efeitos da Ativação -->
                    <div class="ativar-efeitos">
                        <h4><i class="fas fa-info-circle"></i> O que acontece ao ativar?</h4>
                        <ul>
                            <li><i class="fas fa-check-circle" style="color: #00FFA3;"></i> O módulo ficará disponível para todos os utilizadores</li>
                            <li><i class="fas fa-users" style="color: #00D2FF;"></i> <?php echo $modulo['usuarios_ativos']; ?> utilizadores terão acesso</li>
                            <?php if ($tem_dependencias): ?>
                                <li><i class="fas fa-link" style="color: #FFD93D;"></i> Utilizará as dependências ativas</li>
                            <?php endif; ?>
                            <li><i class="fas fa-undo" style="color: #FF6B6B;"></i> Pode ser desativado a qualquer momento</li>
                        </ul>
                    </div>

                    <div class="ativar-acoes">
                        <a href="modulos.php" class="btn btn-outline btn-lg">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <button class="btn btn-success btn-lg" onclick="confirmarAtivacao(<?php echo $modulo['id']; ?>)">
                            <i class="fas fa-play"></i> Ativar Módulo
                        </button>
                    </div>

                    <p class="ativar-nota">
                        <i class="fas fa-info-circle"></i>
                        A ativação é imediata e todos os utilizadores terão acesso ao módulo.
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<!-- ========================================== -->
<!-- MODAL: CONFIRMAÇÃO FINAL                  -->
<!-- ========================================== -->
<div class="modal" id="modalConfirmacao">
    <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
    <div class="modal-content" style="max-width: 420px;">
        <div class="modal-header" style="border-bottom-color: #00FFA3;">
            <h3 class="modal-title" style="color: #00FFA3;">
                <i class="fas fa-rocket"></i> Confirmar Ativação
            </h3>
            <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
        </div>
        <div class="modal-body">
            <p style="font-size: var(--text-body); color: var(--text-secondary); text-align: center; margin-bottom: var(--space-md);">
                Deseja realmente ativar o módulo
            </p>
            <p style="font-size: var(--text-h4); font-weight: 700; color: #6C2BD9; text-align: center; margin: 0;">
                "<?php echo $modulo['nome']; ?>"
            </p>
            <?php if ($tem_dependencias): ?>
            <div style="margin-top: var(--space-md); padding: var(--space-md); background: rgba(0, 255, 163, 0.08); border-radius: var(--radius-sm); border-left: 3px solid #00FFA3;">
                <p style="font-size: var(--text-sm); color: #00FFA3; margin: 0;">
                    <i class="fas fa-check-circle"></i>
                    Todas as dependências estão ativas.
                </p>
            </div>
            <?php endif; ?>
            <p style="font-size: var(--text-sm); color: #00D2FF; text-align: center; margin-top: var(--space-md);">
                <i class="fas fa-info-circle"></i> <?php echo $modulo['usuarios_ativos']; ?> utilizadores terão acesso ao módulo.
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
            <button class="btn btn-success" id="confirmacaoFinalBtn">
                <i class="fas fa-play"></i> Ativar Módulo
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
// CONFIRMAR ATIVAÇÃO
// ============================================
function confirmarAtivacao(id) {
    document.getElementById('modalConfirmacao').classList.add('active');
    document.body.style.overflow = 'hidden';

    document.getElementById('confirmacaoFinalBtn').onclick = function() {
        fecharModal('modalConfirmacao');
        mostrarToast('Módulo ativado com sucesso!', 'success');
        
        setTimeout(() => {
            window.location.href = 'modulos.php';
        }, 1500);
    };
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
/* ATIVAR MÓDULO - CSS COMPLETO              */
/* ========================================== */

/* ===== CONTAINER ===== */
.ativar-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: calc(100vh - 300px);
    padding: var(--space-lg);
}

/* ===== CARD PRINCIPAL ===== */
.ativar-card {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border-color);
    padding: var(--space-2xl);
    max-width: 650px;
    width: 100%;
    text-align: center;
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
}

.ativar-card.card-ativar::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #00FFA3, #00FFA3, #00D2FF);
}

.ativar-card.card-alerta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #00D2FF, #00D2FF, #6C2BD9);
}

.ativar-card.card-erro::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #FF6B6B, #FF6B6B, #FF6B6B);
}

.ativar-card:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
    transform: translateY(-4px);
}

/* ===== ICONE ===== */
.ativar-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--space-lg);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
}

.ativar-icon.icon-ativar {
    background: rgba(0, 255, 163, 0.12);
    color: #00FFA3;
    animation: pulse 2s ease-in-out infinite;
}

.ativar-icon.icon-alerta {
    background: rgba(0, 210, 255, 0.12);
    color: #00D2FF;
}

.ativar-icon.icon-erro {
    background: rgba(255, 107, 107, 0.12);
    color: #FF6B6B;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* ===== TÍTULO ===== */
.ativar-card h2 {
    font-family: var(--font-title);
    font-size: var(--text-h2);
    color: var(--text-primary);
    margin: 0 0 var(--space-sm) 0;
}

.ativar-mensagem {
    font-size: var(--text-body);
    color: var(--text-secondary);
    margin: 0 0 var(--space-lg) 0;
}

.ativar-mensagem strong {
    color: #6C2BD9;
}

/* ===== ALERTA ===== */
.ativar-alerta {
    display: flex;
    align-items: flex-start;
    gap: var(--space-md);
    padding: var(--space-md);
    border-radius: var(--radius-md);
    margin-bottom: var(--space-lg);
    text-align: left;
}

.ativar-alerta.sucesso {
    background: rgba(0, 255, 163, 0.06);
    border: 1px solid rgba(0, 255, 163, 0.15);
}

.ativar-alerta.sucesso i {
    color: #00FFA3;
}

.ativar-alerta.erro {
    background: rgba(255, 107, 107, 0.06);
    border: 1px solid rgba(255, 107, 107, 0.15);
}

.ativar-alerta.erro i {
    color: #FF6B6B;
}

.ativar-alerta i {
    font-size: 20px;
    margin-top: 2px;
    flex-shrink: 0;
}

.ativar-alerta div {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.ativar-alerta strong {
    font-size: var(--text-sm);
}

.ativar-alerta.sucesso strong {
    color: #00FFA3;
}

.ativar-alerta.erro strong {
    color: #FF6B6B;
}

.ativar-alerta span {
    font-size: var(--text-sm);
    color: var(--text-secondary);
}

.ativar-alerta .alerta-detalhe {
    font-size: var(--text-xs);
    color: var(--text-muted);
}

/* ===== DEPENDÊNCIAS ===== */
.modulos-dependentes {
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
    margin-top: 4px;
}

.badge-dependencia {
    display: inline-block;
    padding: 2px 10px;
    border-radius: var(--radius-full);
    font-size: 10px;
    font-weight: 500;
}

.badge-dependencia.ativa {
    background: rgba(0, 255, 163, 0.1);
    color: #00FFA3;
    border: 1px solid rgba(0, 255, 163, 0.15);
}

.badge-dependencia.ativa i {
    margin-right: 2px;
}

.badge-dependencia.faltante {
    background: rgba(255, 107, 107, 0.1);
    color: #FF6B6B;
    border: 1px solid rgba(255, 107, 107, 0.15);
}

.badge-dependencia.faltante i {
    margin-right: 2px;
}

.badge-dependencia:not(.ativa):not(.faltante) {
    background: rgba(255, 217, 61, 0.1);
    color: #FFD93D;
    border: 1px solid rgba(255, 217, 61, 0.15);
}

/* ===== INFO GRID ===== */
.ativar-info {
    background: var(--bg-input);
    border-radius: var(--radius-md);
    padding: var(--space-md);
    margin-bottom: var(--space-lg);
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-sm);
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 2px;
    padding: 4px 0;
}

.info-item .label {
    font-size: var(--text-xs);
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-item .value {
    font-size: var(--text-sm);
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
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 2px 12px;
    border-radius: var(--radius-full);
    font-size: var(--text-xs);
    font-weight: 500;
}

.badge-categoria.geotecnologia {
    background: rgba(108, 43, 217, 0.12);
    color: #6C2BD9;
}

.badge-categoria.engenharia {
    background: rgba(0, 210, 255, 0.12);
    color: #00D2FF;
}

.badge-categoria.monitoramento {
    background: rgba(255, 107, 107, 0.12);
    color: #FF6B6B;
}

.badge-categoria.agricultura {
    background: rgba(0, 255, 163, 0.12);
    color: #00FFA3;
}

.badge-categoria.recursos {
    background: rgba(255, 217, 61, 0.12);
    color: #FFD93D;
}

.badge-categoria.energia {
    background: rgba(255, 159, 67, 0.12);
    color: #FF9F43;
}

.badge-categoria.planeamento {
    background: rgba(162, 155, 254, 0.12);
    color: #A29BFE;
}

.badge-categoria.logistica {
    background: rgba(253, 121, 168, 0.12);
    color: #FD79A8;
}

.badge-categoria.aeronautica {
    background: rgba(0, 206, 201, 0.12);
    color: #00CEC9;
}

.badge-categoria.educacao {
    background: rgba(253, 203, 110, 0.12);
    color: #FDCB6E;
}

.badge-categoria.ambiente {
    background: rgba(0, 184, 148, 0.12);
    color: #00B894;
}

/* ===== EFEITOS DA ATIVAÇÃO ===== */
.ativar-efeitos {
    background: rgba(0, 255, 163, 0.04);
    border-radius: var(--radius-md);
    padding: var(--space-md);
    margin-bottom: var(--space-lg);
    text-align: left;
    border: 1px solid rgba(0, 255, 163, 0.08);
}

.ativar-efeitos h4 {
    font-family: var(--font-title);
    font-size: var(--text-sm);
    color: var(--text-primary);
    margin: 0 0 var(--space-sm) 0;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.ativar-efeitos h4 i {
    color: #00FFA3;
}

.ativar-efeitos ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.ativar-efeitos ul li {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: 4px 0;
    font-size: var(--text-sm);
    color: var(--text-secondary);
}

.ativar-efeitos ul li i {
    width: 18px;
    text-align: center;
}

/* ===== AÇÕES ===== */
.ativar-acoes {
    display: flex;
    gap: var(--space-md);
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: var(--space-md);
}

.ativar-acoes .btn {
    min-width: 160px;
    justify-content: center;
    padding: 10px 24px;
}

.btn-lg {
    padding: 10px 24px;
    font-size: var(--text-body);
}

.btn-success {
    background: #00FFA3;
    color: #0A1628;
    border: none;
}

.btn-success:hover {
    background: #00E594;
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(0, 255, 163, 0.3);
}

.btn-danger {
    background: #FF6B6B;
    color: white;
    border: none;
}

.btn-danger:hover {
    background: #E55555;
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(255, 107, 107, 0.3);
}

/* ===== NOTA ===== */
.ativar-nota {
    font-size: var(--text-xs);
    color: var(--text-muted);
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.ativar-nota i {
    color: #00D2FF;
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

@media (max-width: 768px) {
    .ativar-card {
        padding: var(--space-lg);
    }

    .ativar-container {
        padding: var(--space-md);
        min-height: auto;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }

    .ativar-acoes {
        flex-direction: column;
        width: 100%;
    }

    .ativar-acoes .btn {
        width: 100%;
        min-width: auto;
    }

    .ativar-icon {
        width: 60px;
        height: 60px;
        font-size: 28px;
    }

    .ativar-card h2 {
        font-size: var(--text-h3);
    }

    .page-header h1 {
        font-size: var(--text-h3);
        flex-wrap: wrap;
    }

    .ativar-alerta {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .ativar-card {
        padding: var(--space-md);
        border-radius: var(--radius-md);
    }

    .ativar-card h2 {
        font-size: var(--text-h4);
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

    .header-actions .btn {
        font-size: var(--text-xs);
        padding: 4px 10px;
    }

    .ativar-efeitos ul li {
        font-size: var(--text-xs);
    }
}
</style>

</body>
</html>