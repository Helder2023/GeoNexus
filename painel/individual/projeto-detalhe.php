<?php
// painel/individual/projeto-detalhe.php - Detalhes do Projeto
include "../../includes/individual/notificacoes-individual-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Detalhes do Projeto';
$pagina_atual = 'projeto-detalhe';

// ============================================
// OBTER ID DO PROJETO
// ============================================
$id_projeto = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - PROFISSIONAL
// ============================================
$profissional = [
    'id' => 1,
    'nome' => 'Carlos Mendes',
    'email' => 'carlos.mendes@email.com',
    'avatar' => 'avatar-1.png',
    'profissao' => 'Engenheiro Topógrafo',
    'plano' => 'Pro'
];

// ============================================
// DADOS MOCKADOS - PROJETO ATUAL
// ============================================
$projeto = [
    'id' => $id_projeto,
    'codigo' => 'PRJ-2026-0001',
    'nome' => 'Levantamento Topográfico - Zona Norte',
    'descricao' => 'Levantamento topográfico completo da zona norte de Luanda, incluindo 50 hectares de terreno urbano com curvas de nível e pontos georreferenciados. O projeto inclui a geração de plantas topográficas em escala 1:1000, com curvas de nível a cada metro e pontos de referência georreferenciados segundo o sistema WGS84.',
    'cliente' => [
        'id' => 1,
        'nome' => 'Construtora ABC',
        'tipo' => 'Empresa',
        'email' => 'contato@construtoraabc.ao',
        'telefone' => '+244 222 345 678',
        'nif' => '5417896321',
        'endereco' => 'Rua Amílcar Cabral, 123 - Luanda, Angola',
        'responsavel' => 'Eng. João Silva'
    ],
    'setor' => 'topografia',
    'setor_nome' => 'Topografia',
    'setor_icon' => 'fa-mountain',
    'setor_color' => '#6C2BD9',
    'status' => 'em_andamento',
    'status_label' => 'Em Andamento',
    'prioridade' => 'alta',
    'prioridade_label' => 'Alta',
    'progresso' => 65,
    'valor' => 350000,
    'valor_pago' => 175000,
    'data_inicio' => '2026-02-01',
    'data_fim' => '2026-03-15',
    'data_criacao' => '2026-01-28 10:30:00',
    'data_atualizacao' => '2026-02-18 14:20:00',
    'equipe' => [
        ['nome' => 'Carlos Mendes', 'funcao' => 'Coordenador', 'avatar' => 'avatar-1.png'],
        ['nome' => 'Ana Costa', 'funcao' => 'Topógrafa', 'avatar' => 'avatar-2.png'],
        ['nome' => 'Pedro Santos', 'funcao' => 'Auxiliar', 'avatar' => 'avatar-3.png']
    ],
    'etapas' => [
        ['nome' => 'Reconhecimento do terreno', 'status' => 'concluido', 'progresso' => 100, 'data_fim' => '2026-02-05'],
        ['nome' => 'Implantação de marcos', 'status' => 'concluido', 'progresso' => 100, 'data_fim' => '2026-02-10'],
        ['nome' => 'Levantamento de pontos', 'status' => 'em_andamento', 'progresso' => 75, 'data_fim' => '2026-02-25'],
        ['nome' => 'Processamento de dados', 'status' => 'pendente', 'progresso' => 0, 'data_fim' => '2026-03-05'],
        ['nome' => 'Geração de plantas', 'status' => 'pendente', 'progresso' => 0, 'data_fim' => '2026-03-10'],
        ['nome' => 'Entrega final', 'status' => 'pendente', 'progresso' => 0, 'data_fim' => '2026-03-15']
    ],
    'tarefas' => [
        ['id' => 1, 'titulo' => 'Finalizar levantamento de pontos', 'responsavel' => 'Ana Costa', 'prazo' => '2026-02-25', 'prioridade' => 'alta', 'status' => 'em_andamento'],
        ['id' => 2, 'titulo' => 'Processar dados GNSS', 'responsavel' => 'Carlos Mendes', 'prazo' => '2026-02-28', 'prioridade' => 'media', 'status' => 'pendente'],
        ['id' => 3, 'titulo' => 'Validar pontos de controle', 'responsavel' => 'Pedro Santos', 'prazo' => '2026-03-01', 'prioridade' => 'alta', 'status' => 'pendente'],
        ['id' => 4, 'titulo' => 'Gerar curvas de nível', 'responsavel' => 'Ana Costa', 'prazo' => '2026-03-05', 'prioridade' => 'media', 'status' => 'pendente'],
        ['id' => 5, 'titulo' => 'Elaborar relatório técnico', 'responsavel' => 'Carlos Mendes', 'prazo' => '2026-03-10', 'prioridade' => 'alta', 'status' => 'pendente']
    ],
    'anexos' => [
        ['id' => 1, 'nome' => 'planta-topografica.pdf', 'tipo' => 'pdf', 'tamanho' => '2.4 MB', 'data' => '2026-02-15 10:30:00', 'autor' => 'Carlos Mendes'],
        ['id' => 2, 'nome' => 'levantamento-pontos.xlsx', 'tipo' => 'xlsx', 'tamanho' => '856 KB', 'data' => '2026-02-16 14:20:00', 'autor' => 'Ana Costa'],
        ['id' => 3, 'nome' => 'curvas-nivel.dwg', 'tipo' => 'dwg', 'tamanho' => '5.2 MB', 'data' => '2026-02-17 09:15:00', 'autor' => 'Ana Costa'],
        ['id' => 4, 'nome' => 'relatorio-parcial.docx', 'tipo' => 'docx', 'tamanho' => '1.8 MB', 'data' => '2026-02-18 11:45:00', 'autor' => 'Carlos Mendes'],
        ['id' => 5, 'nome' => 'fotos-campo.zip', 'tipo' => 'zip', 'tamanho' => '18.5 MB', 'data' => '2026-02-18 16:30:00', 'autor' => 'Pedro Santos']
    ],
    'historico' => [
        ['id' => 1, 'acao' => 'Projeto criado', 'usuario' => 'Carlos Mendes', 'data' => '2026-01-28 10:30:00', 'icon' => 'fa-plus-circle', 'color' => '#00D2FF'],
        ['id' => 2, 'acao' => 'Cliente vinculado', 'usuario' => 'Carlos Mendes', 'data' => '2026-01-28 10:35:00', 'icon' => 'fa-user-plus', 'color' => '#00FFA3'],
        ['id' => 3, 'acao' => 'Pagamento inicial registado', 'usuario' => 'Sistema', 'data' => '2026-01-30 09:00:00', 'icon' => 'fa-money-bill-wave', 'color' => '#FFD93D'],
        ['id' => 4, 'acao' => 'Equipa definida', 'usuario' => 'Carlos Mendes', 'data' => '2026-02-01 08:00:00', 'icon' => 'fa-users', 'color' => '#6C2BD9'],
        ['id' => 5, 'acao' => 'Etapa 1 concluída', 'usuario' => 'Ana Costa', 'data' => '2026-02-05 17:30:00', 'icon' => 'fa-check-circle', 'color' => '#00FFA3'],
        ['id' => 6, 'acao' => 'Etapa 2 concluída', 'usuario' => 'Pedro Santos', 'data' => '2026-02-10 16:45:00', 'icon' => 'fa-check-circle', 'color' => '#00FFA3'],
        ['id' => 7, 'acao' => 'Anexo adicionado', 'usuario' => 'Ana Costa', 'data' => '2026-02-16 14:20:00', 'icon' => 'fa-paperclip', 'color' => '#00D2FF'],
        ['id' => 8, 'acao' => 'Progresso atualizado para 65%', 'usuario' => 'Carlos Mendes', 'data' => '2026-02-18 14:20:00', 'icon' => 'fa-chart-line', 'color' => '#FF9F43']
    ]
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

if (!function_exists('formatDateTime')) {
    function formatDateTime($datetime) {
        if (empty($datetime)) return 'N/A';
        return date('d/m/Y H:i', strtotime($datetime));
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo($datetime) {
        if (empty($datetime)) return 'N/A';
        $diff = time() - strtotime($datetime);
        if ($diff < 60) return 'há ' . $diff . ' segundos';
        if ($diff < 3600) return 'há ' . floor($diff / 60) . ' minutos';
        if ($diff < 86400) return 'há ' . floor($diff / 3600) . ' horas';
        if ($diff < 604800) return 'há ' . floor($diff / 86400) . ' dias';
        return date('d/m/Y', strtotime($datetime));
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
            'urgente' => 'prioridade-urgente',
            'alta' => 'prioridade-alta',
            'media' => 'prioridade-media',
            'baixa' => 'prioridade-baixa'
        ];
        return isset($classes[$prioridade]) ? $classes[$prioridade] : 'prioridade-media';
    }
}

if (!function_exists('getFileIcon')) {
    function getFileIcon($tipo) {
        $icons = [
            'pdf' => ['icon' => 'fa-file-pdf', 'color' => '#FF6B6B'],
            'doc' => ['icon' => 'fa-file-word', 'color' => '#2E86DE'],
            'docx' => ['icon' => 'fa-file-word', 'color' => '#2E86DE'],
            'xls' => ['icon' => 'fa-file-excel', 'color' => '#00B894'],
            'xlsx' => ['icon' => 'fa-file-excel', 'color' => '#00B894'],
            'jpg' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
            'jpeg' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
            'png' => ['icon' => 'fa-file-image', 'color' => '#FF9F43'],
            'dwg' => ['icon' => 'fa-drafting-compass', 'color' => '#6C2BD9'],
            'zip' => ['icon' => 'fa-file-archive', 'color' => '#6C5CE7'],
            'rar' => ['icon' => 'fa-file-archive', 'color' => '#6C5CE7']
        ];
        return isset($icons[$tipo]) ? $icons[$tipo] : ['icon' => 'fa-file', 'color' => '#6B7A8F'];
    }
}

// Calcular dias restantes
$dias_restantes = 0;
$prazo_status = 'normal';
$prazo_texto = '';

if (!empty($projeto['data_fim'])) {
    $hoje = new DateTime();
    $fim = new DateTime($projeto['data_fim']);
    $diff = $hoje->diff($fim);
    
    if ($fim < $hoje) {
        $prazo_status = 'atrasado';
        $prazo_texto = 'Atrasado ' . $diff->days . ' dias';
        $dias_restantes = -$diff->days;
    } elseif ($diff->days <= 7) {
        $prazo_status = 'urgente';
        $prazo_texto = $diff->days . ' dias restantes';
        $dias_restantes = $diff->days;
    } else {
        $prazo_status = 'normal';
        $prazo_texto = $diff->days . ' dias restantes';
        $dias_restantes = $diff->days;
    }
}

// Calcular percentual pago
$percentual_pago = $projeto['valor'] > 0 ? round(($projeto['valor_pago'] / $projeto['valor']) * 100) : 0;

// Tarefas concluídas
$tarefas_concluidas = count(array_filter($projeto['tarefas'], fn($t) => $t['status'] === 'concluido'));
$tarefas_total = count($projeto['tarefas']);

// Etapas concluídas
$etapas_concluidas = count(array_filter($projeto['etapas'], fn($e) => $e['status'] === 'concluido'));
$etapas_total = count($projeto['etapas']);
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
                        <div class="project-icon-header" style="background: <?php echo $projeto['setor_color']; ?>20; color: <?php echo $projeto['setor_color']; ?>;">
                            <i class="fas <?php echo $projeto['setor_icon']; ?>"></i>
                        </div>
                        <?php echo $projeto['nome']; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="projetos.php">Projetos</a>
                        <span class="separator">/</span>
                        <span><?php echo $projeto['codigo']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../includes/individual/notificacoes-individual.php" ?>

                    <a href="projetos.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== PROJETO HEADER ===== -->
            <section class="projeto-header animate-fade-up">
                <div class="projeto-header-main">
                    <div class="projeto-header-badges">
                        <span class="badge-status <?php echo getStatusClass($projeto['status']); ?>">
                            <i class="fas fa-circle"></i>
                            <?php echo $projeto['status_label']; ?>
                        </span>
                        <span class="badge-prioridade <?php echo getPrioridadeClass($projeto['prioridade']); ?>">
                            <i class="fas fa-flag"></i>
                            Prioridade <?php echo $projeto['prioridade_label']; ?>
                        </span>
                        <span class="badge-setor" style="background: <?php echo $projeto['setor_color']; ?>15; color: <?php echo $projeto['setor_color']; ?>;">
                            <i class="fas <?php echo $projeto['setor_icon']; ?>"></i>
                            <?php echo $projeto['setor_nome']; ?>
                        </span>
                    </div>
                    <p class="projeto-header-descricao"><?php echo $projeto['descricao']; ?></p>
                </div>

                <!-- Botão de Local de Trabalho -->
                <a href="setores/<?php echo $projeto['setor']; ?>/index.php?projeto=<?php echo $projeto['id']; ?>" 
                   class="btn-local-trabalho-header"
                   style="--setor-color: <?php echo $projeto['setor_color']; ?>;">
                    <div class="btn-local-trabalho-header-icon">
                        <i class="fas <?php echo $projeto['setor_icon']; ?>"></i>
                    </div>
                    <div class="btn-local-trabalho-header-text">
                        <span class="btn-local-trabalho-header-label">Abrir Local de Trabalho</span>
                        <span class="btn-local-trabalho-header-setor"><?php echo $projeto['setor_nome']; ?></span>
                    </div>
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </section>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="value"><?php echo $projeto['progresso']; ?>%</div>
                    <div class="label">Progresso</div>
                    <div class="stat-progress">
                        <div class="stat-progress-bar">
                            <div class="stat-progress-fill" style="width: <?php echo $projeto['progresso']; ?>%; background: <?php echo $projeto['setor_color']; ?>;"></div>
                        </div>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($projeto['valor']); ?></div>
                    <div class="label">Valor Total</div>
                    <div class="stat-info">
                        <span class="stat-info-pago"><?php echo $percentual_pago; ?>% pago</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value <?php echo $prazo_status === 'atrasado' ? 'text-danger' : ($prazo_status === 'urgente' ? 'text-warning' : ''); ?>">
                        <?php echo $dias_restantes >= 0 ? $dias_restantes : 0; ?>
                    </div>
                    <div class="label">Dias Restantes</div>
                    <div class="stat-info">
                        <span class="stat-info-prazo stat-info-<?php echo $prazo_status; ?>">
                            <?php echo $prazo_texto; ?>
                        </span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="value"><?php echo $tarefas_concluidas; ?>/<?php echo $tarefas_total; ?></div>
                    <div class="label">Tarefas Concluídas</div>
                    <div class="stat-info">
                        <span><?php echo count($projeto['equipe']); ?> membros na equipa</span>
                    </div>
                </div>
            </section>

            <!-- ===== CONTEÚDO PRINCIPAL ===== -->
            <div class="detalhe-grid">
                <!-- ========================================== -->
                <!-- COLUNA PRINCIPAL                           -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-principal">

                    <!-- ===== ETAPAS DO PROJETO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.15s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-route" style="color: <?php echo $projeto['setor_color']; ?>;"></i>
                                Etapas do Projeto
                                <span class="badge-count"><?php echo $etapas_concluidas; ?>/<?php echo $etapas_total; ?></span>
                            </h3>
                        </div>
                        <div class="etapas-list">
                            <?php foreach ($projeto['etapas'] as $index => $etapa): ?>
                                <div class="etapa-item <?php echo $etapa['status']; ?>">
                                    <div class="etapa-status">
                                        <?php if ($etapa['status'] === 'concluido'): ?>
                                            <div class="etapa-icon concluido">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        <?php elseif ($etapa['status'] === 'em_andamento'): ?>
                                            <div class="etapa-icon em-andamento">
                                                <i class="fas fa-spinner"></i>
                                            </div>
                                        <?php else: ?>
                                            <div class="etapa-icon pendente">
                                                <span><?php echo $index + 1; ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="etapa-conteudo">
                                        <div class="etapa-header">
                                            <span class="etapa-nome"><?php echo $etapa['nome']; ?></span>
                                            <span class="etapa-percent"><?php echo $etapa['progresso']; ?>%</span>
                                        </div>
                                        <div class="etapa-progresso">
                                            <div class="etapa-progresso-bar">
                                                <div class="etapa-progresso-fill" style="width: <?php echo $etapa['progresso']; ?>%; background: <?php echo $projeto['setor_color']; ?>;"></div>
                                            </div>
                                        </div>
                                        <div class="etapa-meta">
                                            <span class="etapa-data">
                                                <i class="far fa-calendar"></i>
                                                <?php echo formatDate($etapa['data_fim']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== TAREFAS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-tasks" style="color: #FFD93D;"></i>
                                Tarefas
                                <span class="badge-count"><?php echo $tarefas_concluidas; ?>/<?php echo $tarefas_total; ?></span>
                            </h3>
                            <button class="btn btn-sm btn-outline" onclick="adicionarTarefa()">
                                <i class="fas fa-plus"></i> Nova Tarefa
                            </button>
                        </div>
                        <div class="tarefas-list">
                            <?php foreach ($projeto['tarefas'] as $tarefa): ?>
                                <div class="tarefa-item">
                                    <div class="tarefa-check">
                                        <input type="checkbox" 
                                               id="tarefa-<?php echo $tarefa['id']; ?>"
                                               <?php echo $tarefa['status'] === 'concluido' ? 'checked' : ''; ?>
                                               onchange="toggleTarefa(<?php echo $tarefa['id']; ?>)">
                                        <label for="tarefa-<?php echo $tarefa['id']; ?>"></label>
                                    </div>
                                    <div class="tarefa-conteudo">
                                        <span class="tarefa-titulo"><?php echo $tarefa['titulo']; ?></span>
                                        <div class="tarefa-meta">
                                            <span class="tarefa-responsavel">
                                                <i class="fas fa-user"></i> <?php echo $tarefa['responsavel']; ?>
                                            </span>
                                            <span class="tarefa-prazo">
                                                <i class="far fa-clock"></i> <?php echo formatDate($tarefa['prazo']); ?>
                                            </span>
                                            <span class="tarefa-prioridade <?php echo getPrioridadeClass($tarefa['prioridade']); ?>">
                                                <?php echo ucfirst($tarefa['prioridade']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== ANEXOS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.25s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-paperclip" style="color: #00D2FF;"></i>
                                Anexos
                                <span class="badge-count"><?php echo count($projeto['anexos']); ?></span>
                            </h3>
                            <button class="btn btn-sm btn-outline" onclick="adicionarAnexo()">
                                <i class="fas fa-upload"></i> Adicionar
                            </button>
                        </div>
                        <div class="anexos-list">
                            <?php foreach ($projeto['anexos'] as $anexo): 
                                $file_icon = getFileIcon($anexo['tipo']);
                            ?>
                                <div class="anexo-item">
                                    <div class="anexo-icon" style="background: <?php echo $file_icon['color']; ?>15; color: <?php echo $file_icon['color']; ?>;">
                                        <i class="fas <?php echo $file_icon['icon']; ?>"></i>
                                    </div>
                                    <div class="anexo-info">
                                        <span class="anexo-nome"><?php echo $anexo['nome']; ?></span>
                                        <span class="anexo-meta">
                                            <?php echo $anexo['tamanho']; ?> • 
                                            <?php echo $anexo['autor']; ?> • 
                                            <?php echo timeAgo($anexo['data']); ?>
                                        </span>
                                    </div>
                                    <div class="anexo-actions">
                                        <button class="btn-action" onclick="baixarAnexo(<?php echo $anexo['id']; ?>)" title="Baixar">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button class="btn-action" onclick="visualizarAnexo(<?php echo $anexo['id']; ?>)" title="Visualizar">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-action-danger" onclick="excluirAnexo(<?php echo $anexo['id']; ?>)" title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- COLUNA LATERAL                             -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-lateral">

                    <!-- ===== CARD DO CLIENTE ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.3s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-user-tie" style="color: #6C2BD9;"></i>
                                Cliente
                            </h3>
                        </div>
                        <div class="cliente-detalhe">
                            <div class="cliente-avatar-grande">
                                <i class="fas <?php echo $projeto['cliente']['tipo'] === 'Instituição' ? 'fa-university' : ($projeto['cliente']['tipo'] === 'Empresa' ? 'fa-building' : 'fa-user'); ?>"></i>
                            </div>
                            <h4><?php echo $projeto['cliente']['nome']; ?></h4>
                            <span class="cliente-tipo-badge"><?php echo $projeto['cliente']['tipo']; ?></span>

                            <div class="cliente-info-list">
                                <div class="cliente-info-item">
                                    <i class="fas fa-envelope"></i>
                                    <span><?php echo $projeto['cliente']['email']; ?></span>
                                </div>
                                <div class="cliente-info-item">
                                    <i class="fas fa-phone"></i>
                                    <span><?php echo $projeto['cliente']['telefone']; ?></span>
                                </div>
                                <div class="cliente-info-item">
                                    <i class="fas fa-id-card"></i>
                                    <span>NIF: <?php echo $projeto['cliente']['nif']; ?></span>
                                </div>
                                <div class="cliente-info-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo $projeto['cliente']['endereco']; ?></span>
                                </div>
                                <div class="cliente-info-item">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Responsável: <?php echo $projeto['cliente']['responsavel']; ?></span>
                                </div>
                            </div>

                            <div class="cliente-acoes">
                                <button class="btn btn-sm btn-outline" onclick="contactarCliente()">
                                    <i class="fas fa-envelope"></i> Contactar
                                </button>
                                <a href="financeiro/cliente-editar.php?id=<?php echo $projeto['cliente']['id']; ?>" class="btn btn-sm btn-outline">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD DE EQUIPA ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-users" style="color: #00D2FF;"></i>
                                Equipa
                                <span class="badge-count"><?php echo count($projeto['equipe']); ?></span>
                            </h3>
                            <button class="btn btn-sm btn-outline" onclick="adicionarMembro()">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                        <div class="equipe-list">
                            <?php foreach ($projeto['equipe'] as $membro): ?>
                                <div class="equipe-item">
                                    <img src="../../assets/images/<?php echo $membro['avatar']; ?>" 
                                         alt="<?php echo $membro['nome']; ?>"
                                         onerror="this.src='<?php echo getAvatarUrl($membro['nome']); ?>'">
                                    <div class="equipe-info">
                                        <span class="equipe-nome"><?php echo $membro['nome']; ?></span>
                                        <span class="equipe-funcao"><?php echo $membro['funcao']; ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ===== CARD FINANCEIRO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-coins" style="color: #00FFA3;"></i>
                                Financeiro
                            </h3>
                        </div>
                        <div class="financeiro-detalhe">
                            <div class="financeiro-item">
                                <span class="financeiro-label">Valor Total</span>
                                <span class="financeiro-valor">Kz <?php echo formatMoney($projeto['valor']); ?></span>
                            </div>
                            <div class="financeiro-item">
                                <span class="financeiro-label">Valor Recebido</span>
                                <span class="financeiro-valor" style="color: #00FFA3;">Kz <?php echo formatMoney($projeto['valor_pago']); ?></span>
                            </div>
                            <div class="financeiro-item">
                                <span class="financeiro-label">Valor Pendente</span>
                                <span class="financeiro-valor" style="color: #FFD93D;">Kz <?php echo formatMoney($projeto['valor'] - $projeto['valor_pago']); ?></span>
                            </div>

                            <div class="financeiro-progresso">
                                <div class="financeiro-progresso-header">
                                    <span>Progresso de Pagamento</span>
                                    <span><?php echo $percentual_pago; ?>%</span>
                                </div>
                                <div class="financeiro-progresso-barra">
                                    <div class="financeiro-progresso-fill" style="width: <?php echo $percentual_pago; ?>%;"></div>
                                </div>
                            </div>

                            <div class="financeiro-acoes">
                                <a href="financeiro/faturas.php?projeto=<?php echo $projeto['id']; ?>" class="btn btn-sm btn-outline" style="width: 100%; justify-content: center;">
                                    <i class="fas fa-file-invoice"></i> Ver Faturas
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD DE AÇÕES ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.45s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                                Ações
                            </h3>
                        </div>
                        <div class="acoes-list">
                            <a href="projeto-editar.php?id=<?php echo $projeto['id']; ?>" class="acao-item">
                                <div class="acao-icon" style="background: rgba(0, 210, 255, 0.1); color: #00D2FF;">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <span>Editar Projeto</span>
                            </a>
                            <a href="setores/<?php echo $projeto['setor']; ?>/index.php?projeto=<?php echo $projeto['id']; ?>" class="acao-item acao-item-destaque" style="--setor-color: <?php echo $projeto['setor_color']; ?>;">
                                <div class="acao-icon" style="background: <?php echo $projeto['setor_color']; ?>20; color: <?php echo $projeto['setor_color']; ?>;">
                                    <i class="fas <?php echo $projeto['setor_icon']; ?>"></i>
                                </div>
                                <span>Local de Trabalho</span>
                            </a>
                            <button class="acao-item" onclick="duplicarProjeto()">
                                <div class="acao-icon" style="background: rgba(0, 255, 163, 0.1); color: #00FFA3;">
                                    <i class="fas fa-copy"></i>
                                </div>
                                <span>Duplicar Projeto</span>
                            </button>
                            <button class="acao-item" onclick="gerarRelatorio()">
                                <div class="acao-icon" style="background: rgba(255, 217, 61, 0.1); color: #FFD93D;">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <span>Gerar Relatório</span>
                            </button>
                            <button class="acao-item" onclick="arquivarProjeto()">
                                <div class="acao-icon" style="background: rgba(107, 122, 143, 0.1); color: #6B7A8F;">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <span>Arquivar</span>
                            </button>
                            <button class="acao-item acao-item-danger" onclick="excluirProjeto()">
                                <div class="acao-icon" style="background: rgba(255, 107, 107, 0.1); color: #FF6B6B;">
                                    <i class="fas fa-trash"></i>
                                </div>
                                <span>Excluir Projeto</span>
                            </button>
                        </div>
                    </div>

                    <!-- ===== HISTÓRICO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.5s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-history" style="color: #6C2BD9;"></i>
                                Histórico
                            </h3>
                        </div>
                        <div class="historico-list">
                            <?php foreach ($projeto['historico'] as $item): ?>
                                <div class="historico-item">
                                    <div class="historico-icon" style="background: <?php echo $item['color']; ?>15; color: <?php echo $item['color']; ?>;">
                                        <i class="fas <?php echo $item['icon']; ?>"></i>
                                    </div>
                                    <div class="historico-conteudo">
                                        <span class="historico-acao"><?php echo $item['acao']; ?></span>
                                        <div class="historico-meta">
                                            <span><i class="fas fa-user"></i> <?php echo $item['usuario']; ?></span>
                                            <span><i class="far fa-clock"></i> <?php echo timeAgo($item['data']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
        // TAREFAS
        // ============================================
        function toggleTarefa(id) {
            const checkbox = document.getElementById('tarefa-' + id);
            const item = checkbox.closest('.tarefa-item');
            
            if (checkbox.checked) {
                item.classList.add('concluida');
                mostrarToast('Tarefa marcada como concluída!', 'success');
            } else {
                item.classList.remove('concluida');
                mostrarToast('Tarefa reaberta', 'info');
            }
        }

        function adicionarTarefa() {
            mostrarToast('Modal de nova tarefa em desenvolvimento', 'info');
        }

        // ============================================
        // ANEXOS
        // ============================================
        function adicionarAnexo() {
            mostrarToast('Modal de upload em desenvolvimento', 'info');
        }

        function baixarAnexo(id) {
            mostrarToast('A baixar anexo #' + id + '...', 'info');
        }

        function visualizarAnexo(id) {
            mostrarToast('A abrir anexo #' + id + '...', 'info');
        }

        function excluirAnexo(id) {
            if (confirm('Tem certeza que deseja excluir este anexo?')) {
                mostrarToast('Anexo excluído!', 'error');
            }
        }

        // ============================================
        // AÇÕES DO PROJETO
        // ============================================
        function contactarCliente() {
            mostrarToast('A abrir email para o cliente...', 'info');
        }

        function adicionarMembro() {
            mostrarToast('Modal de adicionar membro em desenvolvimento', 'info');
        }

        function duplicarProjeto() {
            if (confirm('Deseja duplicar este projeto?')) {
                mostrarToast('Projeto duplicado com sucesso!', 'success');
            }
        }

        function gerarRelatorio() {
            mostrarToast('A gerar relatório do projeto...', 'info');
        }

        function arquivarProjeto() {
            if (confirm('Tem certeza que deseja arquivar este projeto?')) {
                mostrarToast('Projeto arquivado!', 'info');
            }
        }

        function excluirProjeto() {
            if (confirm('TEM CERTEZA? Esta ação é irreversível!\n\nTodos os dados do projeto serão permanentemente excluídos.')) {
                mostrarToast('Projeto excluído!', 'error');
                setTimeout(() => {
                    window.location.href = 'projetos.php';
                }, 1500);
            }
        }
    </script>

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO                             -->
    <!-- ========================================== -->
    <style>
        /* ========================================== */
        /* TOAST NOTIFICATIONS                        */
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
            background: linear-gradient(180deg, #00D2FF 0%, #6C2BD9 100%);
            border-radius: var(--radius-lg) 0 0 var(--radius-lg);
        }

        .header-left {
            flex: 1;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .header-left h1 {
            font-family: var(--font-title);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-md);
            flex-wrap: wrap;
            line-height: 1.3;
        }

        .project-icon-header {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
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

        .header-left .breadcrumb a {
            color: var(--text-muted);
            text-decoration: none;
            transition: var(--transition-smooth);
        }

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

        .btn-theme:hover { border-color: #00D2FF; color: #00D2FF; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* PROJETO HEADER                             */
        /* ========================================== */
        .projeto-header {
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
        }

        .projeto-header-main {
            flex: 1;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .projeto-header-badges {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .badge-status, .badge-prioridade, .badge-setor {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            white-space: nowrap;
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

        .badge-status i {
            font-size: 8px;
            animation: pulse 2s ease-in-out infinite;
        }

        .badge-prioridade {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }
        .badge-prioridade.prioridade-alta { background: rgba(255, 159, 67, 0.12); color: #FF9F43; }
        .badge-prioridade.prioridade-media { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-prioridade.prioridade-baixa { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }

        .projeto-header-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        .btn-local-trabalho-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: linear-gradient(135deg, var(--setor-color)20 0%, var(--setor-color)08 100%);
            border: 2px solid var(--setor-color)40;
            border-radius: var(--radius-lg);
            text-decoration: none;
            transition: var(--transition-smooth);
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
        }

        .btn-local-trabalho-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--setor-color)25, transparent);
            transition: left 0.6s ease;
        }

        .btn-local-trabalho-header:hover::before { left: 100%; }

        .btn-local-trabalho-header:hover {
            border-color: var(--setor-color);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px var(--setor-color)30;
        }

        .btn-local-trabalho-header-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            background: var(--setor-color);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px var(--setor-color)40;
        }

        .btn-local-trabalho-header-text {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .btn-local-trabalho-header-label {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .btn-local-trabalho-header-setor {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .btn-local-trabalho-header > i:last-child {
            color: var(--setor-color);
            font-size: 14px;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .btn-local-trabalho-header:hover > i:last-child {
            transform: translateX(4px);
        }

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

        .stat-card .icon.aurora { background: rgba(108, 43, 217, 0.15); color: #6C2BD9; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .stat-card .value.text-danger { color: #FF6B6B; }
        .stat-card .value.text-warning { color: #FFD93D; }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .stat-progress {
            margin-top: 4px;
        }

        .stat-progress-bar {
            height: 4px;
            background: var(--bg-input);
            border-radius: 2px;
            overflow: hidden;
        }

        .stat-progress-fill {
            height: 100%;
            border-radius: 2px;
            transition: width 0.6s ease;
        }

        .stat-info {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .stat-info-pago { color: #00FFA3; font-weight: 600; }
        .stat-info-prazo.normal { color: #00D2FF; }
        .stat-info-prazo.urgente { color: #FFD93D; }
        .stat-info-prazo.atrasado { color: #FF6B6B; }

        /* ========================================== */
        /* DETALHE GRID                               */
        /* ========================================== */
        .detalhe-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: var(--space-lg);
        }

        /* ========================================== */
        /* CARDS                                      */
        /* ========================================== */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
            overflow: hidden;
        }

        .card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
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
            flex-wrap: wrap;
        }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 24px;
            height: 24px;
            padding: 0 8px;
            background: var(--bg-input);
            color: var(--text-muted);
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            font-family: var(--font-display);
        }

        /* ========================================== */
        /* ETAPAS                                     */
        /* ========================================== */
        .etapas-list {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .etapa-item {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            position: relative;
        }

        .etapa-item:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 35px;
            top: 100%;
            width: 2px;
            height: var(--space-md);
            background: var(--border-color);
        }

        .etapa-item.concluido { border-color: rgba(0, 255, 163, 0.3); }
        .etapa-item.em_andamento { border-color: rgba(0, 210, 255, 0.3); }

        .etapa-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .etapa-icon.concluido {
            background: #00FFA3;
            color: #0A1628;
        }

        .etapa-icon.em-andamento {
            background: #00D2FF;
            color: #FFFFFF;
            animation: pulse 2s ease-in-out infinite;
        }

        .etapa-icon.pendente {
            background: var(--bg-card);
            color: var(--text-muted);
            border: 2px solid var(--border-color);
        }

        .etapa-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .etapa-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .etapa-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .etapa-percent {
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 700;
            color: #00D2FF;
        }

        .etapa-progresso-bar {
            height: 4px;
            background: var(--bg-card);
            border-radius: 2px;
            overflow: hidden;
        }

        .etapa-progresso-fill {
            height: 100%;
            border-radius: 2px;
            transition: width 0.6s ease;
        }

        .etapa-meta {
            display: flex;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .etapa-data { display: inline-flex; align-items: center; gap: 4px; }

        /* ========================================== */
        /* TAREFAS                                    */
        /* ========================================== */
        .tarefas-list {
            padding: var(--space-lg);
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

        .tarefa-item:hover { border-color: #FFD93D; }
        .tarefa-item.concluida { opacity: 0.6; }
        .tarefa-item.concluida .tarefa-titulo { text-decoration: line-through; }

        .tarefa-check {
            display: flex;
            align-items: flex-start;
            padding-top: 2px;
        }

        .tarefa-check input[type="checkbox"] { display: none; }

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

        .tarefa-check label:hover { border-color: #00FFA3; }

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
            margin-bottom: 6px;
            line-height: 1.4;
        }

        .tarefa-meta {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            align-items: center;
        }

        .tarefa-meta > span {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .tarefa-prioridade {
            padding: 2px 8px;
            border-radius: var(--radius-full);
            font-weight: 600;
        }

        .tarefa-prioridade.prioridade-alta { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .tarefa-prioridade.prioridade-media { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .tarefa-prioridade.prioridade-baixa { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }

        /* ========================================== */
        /* ANEXOS                                     */
        /* ========================================== */
        .anexos-list {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .anexo-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .anexo-item:hover { border-color: #00D2FF; }

        .anexo-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .anexo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .anexo-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .anexo-meta {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .anexo-actions {
            display: flex;
            gap: 4px;
            flex-shrink: 0;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .btn-action:hover {
            border-color: #00D2FF;
            color: #00D2FF;
            background: rgba(0, 210, 255, 0.05);
        }

        .btn-action-danger { color: #FF6B6B; }
        .btn-action-danger:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.05);
        }

        /* ========================================== */
        /* CLIENTE DETALHE                            */
        /* ========================================== */
        .cliente-detalhe {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: var(--space-md);
        }

        .cliente-avatar-grande {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 8px 24px rgba(108, 43, 217, 0.3);
        }

        .cliente-detalhe h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .cliente-tipo-badge {
            display: inline-flex;
            padding: 4px 12px;
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
        }

        .cliente-info-list {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding: var(--space-md) 0;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .cliente-info-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            text-align: left;
        }

        .cliente-info-item i {
            width: 16px;
            color: #6C2BD9;
            font-size: 12px;
            flex-shrink: 0;
        }

        .cliente-info-item span {
            word-break: break-word;
            text-align: left;
        }

        .cliente-acoes {
            display: flex;
            gap: var(--space-sm);
            width: 100%;
            flex-wrap: wrap;
        }

        .cliente-acoes .btn { flex: 1; justify-content: center; min-width: 100px; }

        /* ========================================== */
        /* EQUIPE                                     */
        /* ========================================== */
        .equipe-list {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .equipe-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .equipe-item:hover { border-color: #00D2FF; }

        .equipe-item img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #00D2FF;
            flex-shrink: 0;
        }

        .equipe-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .equipe-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .equipe-funcao {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* FINANCEIRO                                 */
        /* ========================================== */
        .financeiro-detalhe {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .financeiro-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) 0;
            border-bottom: 1px solid var(--border-color);
        }

        .financeiro-item:last-of-type { border-bottom: none; }

        .financeiro-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .financeiro-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .financeiro-progresso {
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .financeiro-progresso-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: var(--text-xs);
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .financeiro-progresso-barra {
            height: 6px;
            background: var(--bg-card);
            border-radius: 3px;
            overflow: hidden;
        }

        .financeiro-progresso-fill {
            height: 100%;
            background: linear-gradient(90deg, #00FFA3 0%, #00D2FF 100%);
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .financeiro-acoes {
            display: flex;
            gap: var(--space-sm);
        }

        /* ========================================== */
        /* AÇÕES                                      */
        /* ========================================== */
        .acoes-list {
            padding: var(--space-md);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .acao-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: transparent;
            border: 1px solid transparent;
            border-radius: var(--radius-md);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: left;
            width: 100%;
        }

        .acao-item:hover {
            background: var(--bg-input);
            color: var(--text-primary);
            border-color: var(--border-color);
        }

        .acao-item-destaque {
            background: linear-gradient(135deg, var(--setor-color)15 0%, transparent 100%);
            border-color: var(--setor-color)30;
        }

        .acao-item-destaque:hover {
            border-color: var(--setor-color);
            background: linear-gradient(135deg, var(--setor-color)25 0%, transparent 100%);
        }

        .acao-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .acao-item-danger { color: #FF6B6B; }
        .acao-item-danger:hover {
            background: rgba(255, 107, 107, 0.08);
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        /* ========================================== */
        /* HISTÓRICO                                  */
        /* ========================================== */
        .historico-list {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
            max-height: 500px;
            overflow-y: auto;
        }

        .historico-item {
            display: flex;
            gap: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
        }

        .historico-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .historico-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            flex-shrink: 0;
        }

        .historico-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .historico-acao {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .historico-meta {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .historico-meta span {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .detalhe-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .projeto-header { flex-direction: column; }
            .btn-local-trabalho-header { width: 100%; justify-content: space-between; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            .header-left h1 .project-icon-header { width: 40px; height: 40px; font-size: 16px; }
            
            .projeto-header-badges { flex-direction: column; align-items: stretch; }
            .badge-status, .badge-prioridade, .badge-setor { justify-content: center; }
            
            .btn-local-trabalho-header { flex-direction: column; text-align: center; }
            .btn-local-trabalho-header > i:last-child { display: none; }

            .tarefa-meta { flex-direction: column; gap: 4px; align-items: flex-start; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .cliente-acoes { flex-direction: column; }
            .cliente-acoes .btn { width: 100%; }
            .projeto-header-descricao { font-size: var(--text-xs); }
            .card-header { flex-direction: column; align-items: flex-start; }
            .card-header .btn { width: 100%; justify-content: center; }
        }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>