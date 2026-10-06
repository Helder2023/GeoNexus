<?php
// painel/individual/index.php - Dashboard do Profissional
include "../../includes/individual/notificacoes-individual-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Dashboard';
$pagina_atual = 'dashboard';

// ============================================
// DADOS MOCKADOS - PROFISSIONAL
// ============================================
$profissional = [
    'id' => 1,
    'nome' => 'Carlos Mendes',
    'email' => 'carlos.mendes@email.com',
    'avatar' => 'avatar-1.png',
    'profissao' => 'Engenheiro Topógrafo',
    'setor_principal' => 'Topografia',
    'plano' => 'Pro',
    'plano_status' => 'ativo',
    'data_registro' => '2024-06-15',
    'ultimo_acesso' => '2026-02-18 14:20:00',
    'nivel' => 'Profissional Certificado',
    'avaliacao' => 4.8,
    'total_avaliacoes' => 42
];

// ============================================
// ESTATÍSTICAS DO PROFISSIONAL
// ============================================
$total_projetos = 24;
$projetos_ativos = 8;
$projetos_concluidos = 16;
$total_clientes = 12;
$faturamento_mes = 1250000;
$faturamento_total = 8500000;
$tarefas_pendentes = 5;
$mensagens_nao_lidas = 3;

// ============================================
// PROJETOS RECENTES
// ============================================
$projetos_recentes = [
    [
        'id' => 1,
        'nome' => 'Levantamento Topográfico - Zona Norte',
        'cliente' => 'Construtora ABC',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'progresso' => 65,
        'data_inicio' => '2026-02-01',
        'data_fim' => '2026-03-15',
        'valor' => 350000,
        'setor' => 'Topografia',
        'setor_icon' => 'fa-mountain',
        'setor_color' => '#6C2BD9'
    ],
    [
        'id' => 2,
        'nome' => 'Mapeamento GIS - Área Industrial',
        'cliente' => 'Indústria Luanda',
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'progresso' => 30,
        'data_inicio' => '2026-02-10',
        'data_fim' => '2026-04-20',
        'valor' => 480000,
        'setor' => 'GIS',
        'setor_icon' => 'fa-globe',
        'setor_color' => '#00D2FF'
    ],
    [
        'id' => 3,
        'nome' => 'Levantamento Planialtimétrico',
        'cliente' => 'Município de Luanda',
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'progresso' => 100,
        'data_inicio' => '2026-01-05',
        'data_fim' => '2026-02-10',
        'valor' => 280000,
        'setor' => 'Topografia',
        'setor_icon' => 'fa-mountain',
        'setor_color' => '#6C2BD9'
    ],
    [
        'id' => 4,
        'nome' => 'Cadastro Rural - Fazenda Sunflower',
        'cliente' => 'Agro Negócios Lda',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'progresso' => 0,
        'data_inicio' => '2026-03-01',
        'data_fim' => '2026-04-15',
        'valor' => 195000,
        'setor' => 'Cadastro',
        'setor_icon' => 'fa-home',
        'setor_color' => '#FFD93D'
    ]
];

// ============================================
// TAREFAS PENDENTES
// ============================================
$tarefas_pendentes_lista = [
    [
        'id' => 1,
        'titulo' => 'Finalizar relatório do projeto Zona Norte',
        'prazo' => '2026-02-20',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'projeto' => 'Levantamento Topográfico - Zona Norte'
    ],
    [
        'id' => 2,
        'titulo' => 'Reunião com cliente Indústria Luanda',
        'prazo' => '2026-02-19',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'projeto' => 'Mapeamento GIS - Área Industrial'
    ],
    [
        'id' => 3,
        'titulo' => 'Enviar orçamento para novo projeto',
        'prazo' => '2026-02-22',
        'prioridade' => 'alta',
        'prioridade_label' => 'Alta',
        'projeto' => 'Cadastro Rural - Fazenda Sunflower'
    ],
    [
        'id' => 4,
        'titulo' => 'Atualizar dados do equipamento GPS',
        'prazo' => '2026-02-25',
        'prioridade' => 'baixa',
        'prioridade_label' => 'Baixa',
        'projeto' => 'Geral'
    ],
    [
        'id' => 5,
        'titulo' => 'Calibrar estação total',
        'prazo' => '2026-02-28',
        'prioridade' => 'media',
        'prioridade_label' => 'Média',
        'projeto' => 'Geral'
    ]
];

// ============================================
// ATIVIDADES RECENTES
// ============================================
$atividades_recentes = [
    [
        'id' => 1,
        'icon' => 'fa-check-circle',
        'icon_class' => 'green',
        'mensagem' => '<strong>Projeto "Levantamento Planialtimétrico"</strong> foi concluído',
        'tempo' => 'há 2 dias'
    ],
    [
        'id' => 2,
        'icon' => 'fa-upload',
        'icon_class' => 'aurora',
        'mensagem' => '<strong>3 arquivos</strong> foram enviados para o projeto Zona Norte',
        'tempo' => 'há 3 dias'
    ],
    [
        'id' => 3,
        'icon' => 'fa-user-plus',
        'icon_class' => 'geo',
        'mensagem' => 'Novo cliente <strong>Indústria Luanda</strong> adicionado',
        'tempo' => 'há 5 dias'
    ],
    [
        'id' => 4,
        'icon' => 'fa-money-bill-wave',
        'icon_class' => 'yellow',
        'mensagem' => 'Pagamento de <strong>Kz 280.000</strong> recebido',
        'tempo' => 'há 1 semana'
    ],
    [
        'id' => 5,
        'icon' => 'fa-file-invoice',
        'icon_class' => 'aurora',
        'mensagem' => 'Fatura <strong>#FT-2026-0156</strong> emitida',
        'tempo' => 'há 1 semana'
    ]
];

// ============================================
// MENSAGENS RECENTES
// ============================================
$mensagens_recentes = [
    [
        'id' => 1,
        'remetente' => 'Construtora ABC',
        'assunto' => 'Aprovação do relatório final',
        'preview' => 'Bom dia Carlos, o relatório foi aprovado pela nossa equipe técnica...',
        'tempo' => 'há 2 horas',
        'lida' => false,
        'avatar' => 'empresa-1.png'
    ],
    [
        'id' => 2,
        'remetente' => 'Indústria Luanda',
        'assunto' => 'Dúvida sobre o mapeamento GIS',
        'preview' => 'Prezado Carlos, gostaríamos de saber se é possível incluir...',
        'tempo' => 'há 5 horas',
        'lida' => false,
        'avatar' => 'empresa-2.png'
    ],
    [
        'id' => 3,
        'remetente' => 'Município de Luanda',
        'assunto' => 'Confirmação de pagamento',
        'preview' => 'Confirmamos o pagamento referente ao levantamento planialtimétrico...',
        'tempo' => 'há 1 dia',
        'lida' => true,
        'avatar' => 'instituicao-1.png'
    ]
];

// ============================================
// DADOS PARA GRÁFICOS
// ============================================
$faturamento_mensal = [
    'labels' => ['Set', 'Out', 'Nov', 'Dez', 'Jan', 'Fev'],
    'values' => [750000, 920000, 850000, 1100000, 980000, 1250000]
];

$projetos_por_setor = [
    'labels' => ['Topografia', 'GIS', 'Cadastro', 'Engenharia', 'Drones'],
    'values' => [10, 6, 4, 3, 1]
];

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

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=6C2BD9&color=fff&size=80';
    }
}

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'em_andamento' => 'status-em-andamento',
            'concluido' => 'status-concluido',
            'pendente' => 'status-pendente',
            'cancelado' => 'status-cancelado'
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
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../includes/individual/individual-head.php" ?>

<body>
    <div class="app-container">
        <!-- Toast Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Overlay para sidebar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR INDIVIDUAL                         -->
        <!-- ========================================== -->
        <?php include "../../includes/individual/individual-sidebar.php" ?>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-th-large icon" style="color: #00D2FF;"></i>
                        Olá, <?php echo explode(' ', $profissional['nome'])[0]; ?>!
                    </h1>
                    <p class="breadcrumb">
                        Bem-vindo ao seu dashboard, <?php echo $profissional['profissao']; ?>
                        <span class="badge-role"><?php echo $profissional['nivel']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../includes/individual/notificacoes-individual.php" ?>

                    <button class="btn btn-primary" onclick="location.href='projeto-criar.php'">
                        <i class="fas fa-plus"></i> Novo Projeto
                    </button>
                </div>
            </header>

            <!-- ===== PERFIL CARD ===== -->
            <section class="perfil-resumo animate-fade-up">
                <div class="perfil-resumo-card">
                    <div class="perfil-resumo-principal">
                        <div class="perfil-resumo-avatar">
                            <img src="../../assets/images/<?php echo $profissional['avatar']; ?>"
                                alt="<?php echo $profissional['nome']; ?>"
                                onerror="this.src='<?php echo getAvatarUrl($profissional['nome']); ?>'">
                            <span class="status-online"></span>
                        </div>
                        <div class="perfil-resumo-info">
                            <h3><?php echo $profissional['nome']; ?></h3>
                            <p><?php echo $profissional['profissao']; ?></p>
                            <div class="perfil-resumo-meta">
                                <span class="badge-plano">
                                    <i class="fas fa-crown"></i> Plano <?php echo $profissional['plano']; ?>
                                </span>
                                <span class="avaliacao">
                                    <i class="fas fa-star"></i> <?php echo $profissional['avaliacao']; ?>
                                    <small>(<?php echo $profissional['total_avaliacoes']; ?> avaliações)</small>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="perfil-resumo-acoes">
                        <a href="perfil.php" class="btn btn-sm btn-outline">
                            <i class="fas fa-user-edit"></i> Editar Perfil
                        </a>
                        <a href="assinatura.php" class="btn btn-sm btn-outline">
                            <i class="fas fa-credit-card"></i> Minha Assinatura
                        </a>
                    </div>
                </div>
            </section>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="value"><?php echo $total_projetos; ?></div>
                    <div class="label">Total de Projetos</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 12.5%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <div class="value"><?php echo $projetos_ativos; ?></div>
                    <div class="label">Projetos Ativos</div>
                    <div class="trend neutral">
                        <i class="fas fa-minus"></i> 0%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($faturamento_mes / 1000, 0); ?>k</div>
                    <div class="label">Faturamento (Mês)</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 23.7%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="value"><?php echo $total_clientes; ?></div>
                    <div class="label">Clientes Ativos</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 8.3%
                    </div>
                </div>
            </section>

            <!-- ===== CHARTS ===== -->
            <section class="charts-grid animate-fade-up" style="animation-delay: 0.2s;">
                <div class="chart-card">
                    <div class="header">
                        <h3>
                            <i class="fas fa-chart-line icon" style="color: #00D2FF;"></i>
                            Faturamento Mensal
                        </h3>
                        <select class="chart-period" id="chartPeriod">
                            <option value="6" selected>Últimos 6 meses</option>
                            <option value="12">Últimos 12 meses</option>
                        </select>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartRevenue"></canvas>
                    </div>
                </div>

                <div class="chart-card">
                    <div class="header">
                        <h3>
                            <i class="fas fa-chart-pie icon" style="color: #00D2FF;"></i>
                            Projetos por Setor
                        </h3>
                    </div>
                    <div class="chart-container">
                        <canvas id="chartSectors"></canvas>
                    </div>
                </div>
            </section>

            <!-- ===== TWO COLUMNS ===== -->
            <section class="two-columns animate-fade-up" style="animation-delay: 0.3s;">
                <!-- Projetos Recentes -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-project-diagram" style="color: #00D2FF;"></i>
                            Projetos Recentes
                        </h3>
                        <a href="projetos.php" class="btn btn-sm btn-outline">Ver todos</a>
                    </div>
                    <div class="projetos-list">
                        <?php foreach ($projetos_recentes as $projeto): ?>
                            <div class="projeto-item" onclick="location.href='projeto-detalhe.php?id=<?php echo $projeto['id']; ?>'">
                                <div class="projeto-icon" style="background: <?php echo $projeto['setor_color']; ?>20; color: <?php echo $projeto['setor_color']; ?>;">
                                    <i class="fas <?php echo $projeto['setor_icon']; ?>"></i>
                                </div>
                                <div class="projeto-conteudo">
                                    <div class="projeto-header">
                                        <span class="projeto-nome"><?php echo $projeto['nome']; ?></span>
                                        <span class="badge-status <?php echo getStatusClass($projeto['status']); ?>">
                                            <?php echo $projeto['status_label']; ?>
                                        </span>
                                    </div>
                                    <div class="projeto-cliente">
                                        <i class="fas fa-user"></i> <?php echo $projeto['cliente']; ?>
                                    </div>
                                    <div class="projeto-progresso">
                                        <div class="progresso-barra">
                                            <div class="progresso-preenchimento" style="width: <?php echo $projeto['progresso']; ?>%; background: <?php echo $projeto['setor_color']; ?>;"></div>
                                        </div>
                                        <span class="progresso-texto"><?php echo $projeto['progresso']; ?>%</span>
                                    </div>
                                    <div class="projeto-footer">
                                        <span class="projeto-valor">Kz <?php echo formatMoney($projeto['valor']); ?></span>
                                        <span class="projeto-data">
                                            <i class="far fa-calendar"></i> <?php echo formatDate($projeto['data_fim']); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Tarefas Pendentes -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-tasks" style="color: #FFD93D;"></i>
                            Tarefas Pendentes
                            <span class="badge badge-warning"><?php echo count($tarefas_pendentes_lista); ?></span>
                        </h3>
                    </div>
                    <div class="tarefas-list">
                        <?php foreach ($tarefas_pendentes_lista as $tarefa): ?>
                            <div class="tarefa-item">
                                <div class="tarefa-check">
                                    <input type="checkbox" id="tarefa-<?php echo $tarefa['id']; ?>" onchange="concluirTarefa(<?php echo $tarefa['id']; ?>)">
                                    <label for="tarefa-<?php echo $tarefa['id']; ?>"></label>
                                </div>
                                <div class="tarefa-conteudo">
                                    <span class="tarefa-titulo"><?php echo $tarefa['titulo']; ?></span>
                                    <div class="tarefa-meta">
                                        <span class="tarefa-prazo">
                                            <i class="far fa-clock"></i> <?php echo formatDate($tarefa['prazo']); ?>
                                        </span>
                                        <span class="tarefa-prioridade <?php echo getPrioridadeClass($tarefa['prioridade']); ?>">
                                            <?php echo $tarefa['prioridade_label']; ?>
                                        </span>
                                    </div>
                                    <span class="tarefa-projeto"><?php echo $tarefa['projeto']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== THREE COLUMNS ===== -->
            <section class="three-columns animate-fade-up" style="animation-delay: 0.4s;">
                <!-- Atividades Recentes -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-history" style="color: #00D2FF;"></i>
                            Atividades Recentes
                        </h3>
                    </div>
                    <div class="activity-list">
                        <?php foreach ($atividades_recentes as $atividade): ?>
                            <div class="activity-item">
                                <div class="icon <?php echo $atividade['icon_class']; ?>">
                                    <i class="fas <?php echo $atividade['icon']; ?>"></i>
                                </div>
                                <div class="info">
                                    <p><?php echo $atividade['mensagem']; ?></p>
                                    <span class="time"><i class="far fa-clock"></i> <?php echo $atividade['tempo']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Mensagens Recentes -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-envelope" style="color: #6C2BD9;"></i>
                            Mensagens
                            <span class="badge badge-danger"><?php echo $mensagens_nao_lidas; ?></span>
                        </h3>
                    </div>
                    <div class="mensagens-list">
                        <?php foreach ($mensagens_recentes as $mensagem): ?>
                            <div class="mensagem-item <?php echo $mensagem['lida'] ? 'lida' : 'nao-lida'; ?>">
                                <div class="mensagem-avatar">
                                    <img src="../../assets/images/<?php echo $mensagem['avatar']; ?>"
                                        alt="<?php echo $mensagem['remetente']; ?>"
                                        onerror="this.src='<?php echo getAvatarUrl($mensagem['remetente']); ?>'">
                                    <?php if (!$mensagem['lida']): ?>
                                        <span class="mensagem-dot"></span>
                                    <?php endif; ?>
                                </div>
                                <div class="mensagem-conteudo">
                                    <div class="mensagem-header">
                                        <span class="mensagem-remetente"><?php echo $mensagem['remetente']; ?></span>
                                        <span class="mensagem-tempo"><?php echo $mensagem['tempo']; ?></span>
                                    </div>
                                    <span class="mensagem-assunto"><?php echo $mensagem['assunto']; ?></span>
                                    <span class="mensagem-preview"><?php echo $mensagem['preview']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Ações Rápidas -->
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                            Ações Rápidas
                        </h3>
                    </div>
                    <div class="quick-actions-list">
                        <a href="projeto-criar.php" class="quick-action-item">
                            <div class="quick-action-icon" style="background: rgba(108,43,217,0.1); color: #6C2BD9;">
                                <i class="fas fa-plus"></i>
                            </div>
                            <span>Novo Projeto</span>
                        </a>
                        <a href="financeiro/orcamento-criar.php" class="quick-action-item">
                            <div class="quick-action-icon" style="background: rgba(0,210,255,0.1); color: #00D2FF;">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <span>Novo Orçamento</span>
                        </a>
                        <a href="financeiro/fatura-criar.php" class="quick-action-item">
                            <div class="quick-action-icon" style="background: rgba(255,217,61,0.1); color: #FFD93D;">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <span>Emitir Fatura</span>
                        </a>
                        <a href="financeiro/cliente-cadastrar.php" class="quick-action-item">
                            <div class="quick-action-icon" style="background: rgba(0,255,163,0.1); color: #00FFA3;">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <span>Novo Cliente</span>
                        </a>
                        <a href="equipamento-cadastrar.php" class="quick-action-item">
                            <div class="quick-action-icon" style="background: rgba(255,107,107,0.1); color: #FF6B6B;">
                                <i class="fas fa-tools"></i>
                            </div>
                            <span>Equipamento</span>
                        </a>
                        <a href="relatorio-criar.php" class="quick-action-item">
                            <div class="quick-action-icon" style="background: rgba(107,203,119,0.1); color: #6BCB77;">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <span>Relatório</span>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // TOGGLE SIDEBAR (Desktop)
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
        // TOGGLE SIDEBAR (Mobile)
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
                    if (sidebar.classList.contains('open')) {
                        icon.className = 'fas fa-times';
                    } else {
                        icon.className = 'fas fa-bars';
                    }
                }
            }
        }

        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const menuBtn = document.getElementById('bottomMenuToggle');

            if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
                if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
                    sidebar.classList.remove('open');
                    if (overlay) overlay.classList.remove('active');

                    if (menuBtn) {
                        const icon = menuBtn.querySelector('i');
                        if (icon) icon.className = 'fas fa-bars';
                    }
                }
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
        // TOAST (com proteção contra duplicação)
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

                // Limitar a 5 toasts visíveis
                const existingToasts = container.querySelectorAll('.toast');
                if (existingToasts.length >= 5) {
                    existingToasts[0].remove();
                }

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

                // Forçar reflow e depois adicionar classe .show
                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        toast.classList.add('show');
                    });
                });

                // Auto-remover após 4 segundos
                const timeout = setTimeout(function() {
                    if (toast.parentElement) {
                        toast.classList.remove('show');
                        setTimeout(function() {
                            if (toast.parentElement) toast.remove();
                        }, 400);
                    }
                }, 4000);

                // Cancelar timeout ao clicar no close
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
        // TAREFAS
        // ============================================
        function concluirTarefa(id) {
            const checkbox = document.getElementById('tarefa-' + id);
            const item = checkbox.closest('.tarefa-item');

            if (checkbox.checked) {
                item.style.opacity = '0.5';
                item.style.textDecoration = 'line-through';
                mostrarToast('Tarefa concluída!', 'success');

                setTimeout(() => {
                    item.style.transition = 'all 0.3s ease';
                    item.style.transform = 'translateX(20px)';
                    item.style.opacity = '0';
                    setTimeout(() => item.remove(), 300);
                }, 1000);
            } else {
                item.style.opacity = '1';
                item.style.textDecoration = 'none';
            }
        }

        // ============================================
        // GRÁFICOS
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Chart === 'undefined') {
                console.warn('Chart.js não carregado');
                return;
            }

            // Gráfico de Faturamento
            const revenueCtx = document.getElementById('chartRevenue');
            if (revenueCtx) {
                new Chart(revenueCtx, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($faturamento_mensal['labels']); ?>,
                        datasets: [{
                            label: 'Faturamento (Kz)',
                            data: <?php echo json_encode($faturamento_mensal['values']); ?>,
                            backgroundColor: 'rgba(0, 210, 255, 0.08)',
                            borderColor: '#00D2FF',
                            borderWidth: 3,
                            pointBackgroundColor: '#00D2FF',
                            pointRadius: 4,
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return 'Kz ' + (value / 1000).toFixed(0) + 'k';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Gráfico de Setores
            const sectorsCtx = document.getElementById('chartSectors');
            if (sectorsCtx) {
                new Chart(sectorsCtx, {
                    type: 'doughnut',
                    data: {
                        labels: <?php echo json_encode($projetos_por_setor['labels']); ?>,
                        datasets: [{
                            data: <?php echo json_encode($projetos_por_setor['values']); ?>,
                            backgroundColor: ['#6C2BD9', '#00D2FF', '#FFD93D', '#00FFA3', '#FF6B6B'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            }
                        },
                        cutout: '65%'
                    }
                });
            }

            // Período do gráfico
            const chartPeriod = document.getElementById('chartPeriod');
            if (chartPeriod) {
                chartPeriod.addEventListener('change', function() {
                    mostrarToast('Período: ' + this.options[this.selectedIndex].text, 'info');
                });
            }
        });
    </script>

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO DO DASHBOARD                -->
    <!-- ========================================== -->
    <style>
        /* ========================================== */
        /* TOAST NOTIFICATIONS - CSS ESSENCIAL        */
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
            -webkit-backdrop-filter: blur(10px);
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
            border-radius: var(--radius-md) 0 0 var(--radius-md);
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
            min-width: 0;
        }

        .toast .toast-content i {
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .toast .toast-content span {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
            line-height: 1.4;
            word-break: break-word;
        }

        .toast .toast-close {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 1.4rem;
            cursor: pointer;
            padding: 0 4px;
            line-height: 1;
            transition: var(--transition-smooth);
            flex-shrink: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .toast .toast-close:hover {
            color: var(--text-primary);
            background: var(--bg-card-hover);
        }

        /* Animação de entrada */
        .toast.show {
            transform: translateX(0);
            opacity: 1;
        }

        /* Responsividade */
        @media (max-width: 480px) {
            .toast-container {
                top: 10px;
                right: 10px;
                left: 10px;
                width: auto;
                max-width: none;
            }

            .toast {
                min-width: auto;
                padding: 12px 14px;
            }

            .toast .toast-content span {
                font-size: var(--text-xs);
            }
        }

        /* ========================================== */
        /* DASHBOARD INDIVIDUAL - CSS                 */
        /* ========================================== */

        /* ========================================== */
        /* FIX: NOTIFICAÇÕES - Z-INDEX E STACKING     */
        /* ========================================== */
        
        .notifications-wrapper {
            position: relative !important;
            z-index: 9999 !important;
        }
        
        .notifications-wrapper:has(.notifications-dropdown.active) {
            z-index: 999999 !important;
        }
        
        .notifications-wrapper.notif-active {
            z-index: 999999 !important;
        }
        
        .notifications-dropdown {
            position: absolute !important;
            top: calc(100% + 10px) !important;
            right: 0 !important;
            width: 380px !important;
            max-width: calc(100vw - 20px) !important;
            background: var(--bg-card) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: var(--radius-lg) !important;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5) !important;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 999999 !important;
            overflow: hidden;
        }
        
        .notifications-dropdown.active {
            opacity: 1 !important;
            visibility: visible !important;
            transform: translateY(0) !important;
        }
        
        .page-header {
            overflow: visible !important;
        }
        
        .header-right {
            overflow: visible !important;
            position: relative;
        }

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
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #00D2FF 0%, #6C2BD9 100%);
            border-radius: var(--radius-lg) 0 0 var(--radius-lg);
            pointer-events: none;
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
            line-height: 1.2;
        }

        .header-left h1 .icon {
            color: #00D2FF;
            font-size: 0.85em;
        }

        .header-left .breadcrumb {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            line-height: 1.4;
        }

        .header-left .breadcrumb .badge-role {
            display: inline-block;
            padding: 3px 10px;
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
            border: 1px solid rgba(0, 210, 255, 0.2);
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

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
            flex-shrink: 0;
        }

        .btn-theme:hover {
            border-color: #00D2FF;
            color: #00D2FF;
            background: rgba(0, 210, 255, 0.05);
        }

        .btn-theme .theme-icon {
            position: absolute;
            transition: var(--transition-smooth);
        }

        .btn-theme .theme-icon.sun {
            opacity: 1;
            transform: rotate(0deg);
        }

        .btn-theme .theme-icon.moon {
            opacity: 0;
            transform: rotate(180deg);
        }

        [data-theme="light"] .btn-theme .theme-icon.sun {
            opacity: 0;
            transform: rotate(180deg);
        }

        [data-theme="light"] .btn-theme .theme-icon.moon {
            opacity: 1;
            transform: rotate(0deg);
        }

        .header-right .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: var(--text-sm);
            font-weight: 500;
            border-radius: var(--radius-md);
            white-space: nowrap;
            height: 40px;
        }

        .header-right .btn i {
            font-size: 13px;
        }

        .header-right .btn-primary {
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            border: none;
            box-shadow: 0 4px 16px rgba(0, 210, 255, 0.25);
        }

        .header-right .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 210, 255, 0.35);
        }

        /* ========================================== */
        /* PERFIL RESUMO                              */
        /* ========================================== */
        .perfil-resumo {
            margin-bottom: var(--space-lg);
            position: relative;
            z-index: 1;
        }

        .perfil-resumo-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: background 0.3s ease, box-shadow 0.3s ease;
            flex-wrap: wrap;
            position: relative;
            overflow: hidden;
        }

        .perfil-resumo-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #00D2FF 0%, #6C2BD9 100%);
        }

        .perfil-resumo-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .perfil-resumo-principal {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            flex: 1;
            min-width: 0;
        }

        .perfil-resumo-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .perfil-resumo-avatar img {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--color-turquoise);
            box-shadow: 0 0 0 4px rgba(0, 210, 255, 0.1);
            transition: var(--transition-smooth);
        }

        .perfil-resumo-avatar:hover img {
            transform: scale(1.05);
            box-shadow: 0 0 0 6px rgba(0, 210, 255, 0.15);
        }

        .status-online {
            position: absolute;
            bottom: 4px;
            right: 4px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #00FFA3;
            border: 3px solid var(--bg-card);
            animation: pulse 2s ease-in-out infinite;
            z-index: 1;
        }

        .perfil-resumo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .perfil-resumo-info h3 {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .perfil-resumo-info p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.3;
        }

        .perfil-resumo-meta {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            margin-top: 4px;
        }

        .badge-plano {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            background: linear-gradient(135deg, rgba(255, 217, 61, 0.15) 0%, rgba(255, 159, 67, 0.15) 100%);
            color: #FFD93D;
            border: 1px solid rgba(255, 217, 61, 0.25);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-plano i {
            font-size: 11px;
        }

        .avaliacao {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
            white-space: nowrap;
        }

        .avaliacao i {
            color: #FFD93D;
            font-size: 13px;
        }

        .avaliacao small {
            color: var(--text-muted);
            font-size: var(--text-xs);
            font-weight: 400;
        }

        .perfil-resumo-acoes {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            flex-shrink: 0;
            margin-left: auto;
        }

        .perfil-resumo-acoes .btn {
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: var(--text-sm);
            font-weight: 500;
            border-radius: var(--radius-sm);
            transition: var(--transition-smooth);
        }

        .perfil-resumo-acoes .btn i {
            font-size: 13px;
        }

        /* ========================================== */
        /* STATS CARDS                                */
        /* ========================================== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: background 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #00D2FF 0%, #6C2BD9 100%);
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card .icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .stat-card .icon.aurora {
            background: rgba(108, 43, 217, 0.15);
            color: #6C2BD9;
        }

        .stat-card .icon.blue {
            background: rgba(0, 210, 255, 0.15);
            color: #00D2FF;
        }

        .stat-card .icon.green {
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
        }

        .stat-card .icon.yellow {
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
        }

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
            line-height: 1.3;
        }

        .stat-card .trend {
            font-size: var(--text-xs);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 8px;
            border-radius: var(--radius-full);
            font-weight: 600;
            width: fit-content;
        }

        .stat-card .trend.up {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .stat-card .trend.down {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .stat-card .trend.neutral {
            background: rgba(107, 122, 143, 0.12);
            color: #6B7A8F;
        }

        /* ========================================== */
        /* CHARTS                                     */
        /* ========================================== */
        .charts-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
            position: relative;
            z-index: 1;
        }

        .chart-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .chart-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .chart-card .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .chart-card .header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .chart-card .header h3 i {
            color: #00D2FF;
        }

        .chart-container {
            height: 250px;
            position: relative;
        }

        .chart-period {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 6px 12px;
            font-size: var(--text-xs);
            color: var(--text-primary);
            font-family: var(--font-body);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .chart-period:hover {
            border-color: #00D2FF;
        }

        .chart-period:focus {
            outline: none;
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
        }

        /* ========================================== */
        /* TWO COLUMNS                                */
        /* ========================================== */
        .two-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
            position: relative;
            z-index: 1;
        }

        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        /* ========================================== */
        /* PROJETOS LIST                              */
        /* ========================================== */
        .projetos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .projeto-item {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .projeto-item:hover {
            border-color: #00D2FF;
            box-shadow: var(--glass-shadow);
        }

        .projeto-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .projeto-conteudo {
            flex: 1;
            min-width: 0;
        }

        .projeto-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: 4px;
            flex-wrap: wrap;
        }

        .projeto-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex: 1;
            min-width: 0;
        }

        .badge-status {
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .badge-status.status-em-andamento {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .badge-status.status-concluido {
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

        .projeto-cliente {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .projeto-progresso {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: 6px;
        }

        .progresso-barra {
            flex: 1;
            height: 4px;
            background: var(--bg-card);
            border-radius: 2px;
            overflow: hidden;
        }

        .progresso-preenchimento {
            height: 100%;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .progresso-texto {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--text-muted);
            min-width: 32px;
            text-align: right;
        }

        .projeto-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .projeto-valor {
            font-size: var(--text-xs);
            font-weight: 600;
            color: #00FFA3;
        }

        .projeto-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* ========================================== */
        /* TAREFAS LIST                               */
        /* ========================================== */
        .tarefas-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .tarefa-item {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .tarefa-item:hover {
            border-color: #FFD93D;
        }

        .tarefa-check {
            display: flex;
            align-items: flex-start;
            padding-top: 2px;
        }

        .tarefa-check input[type="checkbox"] {
            display: none;
        }

        .tarefa-check label {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
            flex-shrink: 0;
        }

        .tarefa-check label:hover {
            border-color: #00FFA3;
        }

        .tarefa-check input[type="checkbox"]:checked+label {
            background: #00FFA3;
            border-color: #00FFA3;
        }

        .tarefa-check input[type="checkbox"]:checked+label::after {
            content: '✓';
            color: #0A1628;
            font-size: 12px;
            font-weight: bold;
        }

        .tarefa-conteudo {
            flex: 1;
            min-width: 0;
        }

        .tarefa-titulo {
            display: block;
            font-size: var(--text-sm);
            color: var(--text-primary);
            margin-bottom: 4px;
            line-height: 1.4;
        }

        .tarefa-meta {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            margin-bottom: 4px;
            align-items: center;
        }

        .tarefa-prazo {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .tarefa-prioridade {
            font-size: 10px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: var(--radius-full);
        }

        .tarefa-prioridade.prioridade-alta {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .tarefa-prioridade.prioridade-media {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .tarefa-prioridade.prioridade-baixa {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .tarefa-projeto {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-style: italic;
            display: block;
        }

        /* ========================================== */
        /* THREE COLUMNS                              */
        /* ========================================== */
        .three-columns {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
            position: relative;
            z-index: 1;
        }

        /* ========================================== */
        /* ACTIVITY LIST                              */
        /* ========================================== */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .activity-item {
            display: flex;
            gap: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .activity-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .activity-item .icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .activity-item .icon.aurora {
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
        }

        .activity-item .icon.geo {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .activity-item .icon.green {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .activity-item .icon.yellow {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .activity-item .icon.red {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .activity-item .info {
            flex: 1;
            min-width: 0;
        }

        .activity-item .info p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 4px 0;
            line-height: 1.4;
        }

        .activity-item .info p strong {
            color: var(--text-primary);
        }

        .activity-item .time {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* ========================================== */
        /* MENSAGENS LIST                             */
        /* ========================================== */
        .mensagens-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .mensagem-item {
            display: flex;
            gap: var(--space-sm);
            padding: var(--space-sm);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .mensagem-item:hover {
            background: var(--bg-input);
            border-color: #6C2BD9;
        }

        .mensagem-item.nao-lida {
            background: rgba(108, 43, 217, 0.04);
            border-color: rgba(108, 43, 217, 0.15);
        }

        .mensagem-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .mensagem-avatar img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .mensagem-dot {
            position: absolute;
            top: 0;
            right: 0;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #6C2BD9;
            border: 2px solid var(--bg-card);
            animation: pulse 2s ease-in-out infinite;
        }

        .mensagem-conteudo {
            flex: 1;
            min-width: 0;
        }

        .mensagem-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2px;
            gap: var(--space-sm);
        }

        .mensagem-remetente {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mensagem-tempo {
            font-size: var(--text-xs);
            color: var(--text-muted);
            flex-shrink: 0;
        }

        .mensagem-assunto {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-primary);
            margin-bottom: 2px;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mensagem-preview {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ========================================== */
        /* QUICK ACTIONS LIST                         */
        /* ========================================== */
        .quick-actions-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
        }

        .quick-action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            text-decoration: none;
            transition: var(--transition-smooth);
            text-align: center;
        }

        .quick-action-item:hover {
            border-color: #00D2FF;
            box-shadow: var(--glass-shadow);
        }

        .quick-action-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .quick-action-item span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            font-weight: 500;
            line-height: 1.3;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }

            .three-columns {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 992px) {
            .two-columns {
                grid-template-columns: 1fr;
            }

            .page-header {
                flex-direction: column;
                align-items: stretch;
            }

            .header-right {
                justify-content: flex-end;
                width: 100%;
            }

            .perfil-resumo-card {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .perfil-resumo-principal {
                flex-direction: column;
                text-align: center;
                gap: var(--space-md);
            }

            .perfil-resumo-info {
                align-items: center;
            }

            .perfil-resumo-meta {
                justify-content: center;
            }

            .perfil-resumo-acoes {
                margin-left: 0;
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card {
                padding: var(--space-md);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }

            .stat-card .icon {
                width: 38px;
                height: 38px;
                font-size: 16px;
            }

            .three-columns {
                grid-template-columns: 1fr;
            }

            .chart-card .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .chart-container {
                height: 200px;
            }

            .page-header {
                padding: var(--space-md);
            }

            .header-left h1 {
                font-size: var(--text-h2);
            }

            .header-right {
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .header-right .btn-primary {
                flex: 1;
                justify-content: center;
                min-width: 140px;
            }

            .notifications-dropdown {
                width: 320px !important;
                right: -60px !important;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .perfil-resumo-card {
                padding: var(--space-md);
            }

            .perfil-resumo-avatar img {
                width: 60px;
                height: 60px;
            }

            .perfil-resumo-info h3 {
                font-size: var(--text-h4);
            }

            .perfil-resumo-acoes {
                flex-direction: column;
                width: 100%;
            }

            .perfil-resumo-acoes .btn {
                width: 100%;
                justify-content: center;
            }

            .quick-actions-list {
                grid-template-columns: 1fr;
            }

            .projeto-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .projeto-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header {
                padding: var(--space-sm) var(--space-md);
            }

            .header-left h1 {
                font-size: var(--text-h3);
            }

            .header-left .breadcrumb {
                font-size: var(--text-xs);
            }

            .header-right {
                gap: 6px;
            }

            .header-right .btn {
                padding: 6px 12px;
                font-size: var(--text-xs);
                height: 36px;
            }

            .btn-theme {
                width: 36px;
                height: 36px;
            }

            .notifications-dropdown {
                position: fixed !important;
                top: 70px !important;
                left: 10px !important;
                right: 10px !important;
                width: auto !important;
                max-width: none !important;
            }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>