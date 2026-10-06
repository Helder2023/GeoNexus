<?php
// painel/individual/servicos/avaliacoes.php - Avaliações dos Serviços
include "../../../includes/individual/notificacoes-servicos-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Avaliações dos Serviços';
$pagina_atual = 'avaliacoes';

// ============================================
// KPIs DE AVALIAÇÕES
// ============================================
$kpis = [
    'avaliacao_media' => 4.8,
    'avaliacao_variacao' => 2.5,
    'total_avaliacoes' => 74,
    'total_avaliacoes_mes' => 12,
    'avaliacoes_positivas' => 68,
    'avaliacoes_positivas_percentual' => 91.9,
    'avaliacoes_negativas' => 6,
    'avaliacoes_negativas_percentual' => 8.1,
    'respondidas' => 62,
    'respondidas_percentual' => 83.8,
    'pendentes_resposta' => 12,
    'tempo_medio_resposta' => 6.4
];

// ============================================
// DISTRIBUIÇÃO DE NOTAS
// ============================================
$distribuicao_notas = [
    5 => ['count' => 52, 'percentual' => 70.3],
    4 => ['count' => 16, 'percentual' => 21.6],
    3 => ['count' => 4, 'percentual' => 5.4],
    2 => ['count' => 1, 'percentual' => 1.4],
    1 => ['count' => 1, 'percentual' => 1.4]
];

// ============================================
// LISTA DE AVALIAÇÕES
// ============================================
$avaliacoes = [
    [
        'id' => 1,
        'cliente' => 'Município de Luanda',
        'cliente_tipo' => 'Instituição',
        'avatar' => 'instituicao-1.png',
        'email' => 'geral@luanda.gov.ao',
        'servico_id' => 5,
        'servico_nome' => 'Levantamento com Drone',
        'servico_categoria' => 'Drones',
        'servico_icon' => 'fa-drone',
        'servico_color' => '#FF6B6B',
        'nota' => 5,
        'titulo' => 'Trabalho excecional!',
        'comentario' => 'O levantamento com drone foi realizado com precisão absoluta. A equipa foi muito profissional e entregou o ortomosaico antes do prazo. Recomendo vivamente!',
        'data' => '2026-02-18 10:30:00',
        'util' => 24,
        'respondida' => true,
        'resposta' => 'Muito obrigado pela sua avaliação! Foi um prazer trabalhar neste projeto. Aguardamos futuras colaborações.',
        'data_resposta' => '2026-02-18 14:20:00',
        'verificada' => true,
        'anexos' => 3
    ],
    [
        'id' => 2,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-1.png',
        'email' => 'contato@construtoraabc.ao',
        'servico_id' => 1,
        'servico_nome' => 'Levantamento Topográfico',
        'servico_categoria' => 'Topografia',
        'servico_icon' => 'fa-mountain',
        'servico_color' => '#6C2BD9',
        'nota' => 5,
        'titulo' => 'Profissionalismo exemplar',
        'comentario' => 'Serviço entregue no prazo com qualidade superior ao esperado. As plantas topográficas estavam perfeitas. Vamos contratar novamente!',
        'data' => '2026-02-15 14:45:00',
        'util' => 18,
        'respondida' => true,
        'resposta' => 'Obrigado pela confiança! É sempre um prazer trabalhar com a Construtora ABC.',
        'data_resposta' => '2026-02-15 16:30:00',
        'verificada' => true,
        'anexos' => 2
    ],
    [
        'id' => 3,
        'cliente' => 'Indústria Luanda',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-2.png',
        'email' => 'contato@industrialuanda.ao',
        'servico_id' => 2,
        'servico_nome' => 'Mapeamento GIS',
        'servico_categoria' => 'GIS',
        'servico_icon' => 'fa-globe',
        'servico_color' => '#00FFA3',
        'nota' => 4,
        'titulo' => 'Bom trabalho, pequena demora',
        'comentario' => 'O trabalho ficou muito bom, mas houve uma pequena demora na entrega. Ainda assim, a qualidade compensou.',
        'data' => '2026-02-12 09:20:00',
        'util' => 12,
        'respondida' => true,
        'resposta' => 'Agradecemos o feedback! Pedimos desculpa pela demora e estamos a trabalhar para melhorar os nossos prazos.',
        'data_resposta' => '2026-02-12 11:00:00',
        'verificada' => true,
        'anexos' => 0
    ],
    [
        'id' => 4,
        'cliente' => 'Agro Negócios Lda',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-3.png',
        'email' => 'info@agronegocios.ao',
        'servico_id' => 6,
        'servico_nome' => 'Análise de Solo Agrícola',
        'servico_categoria' => 'Agricultura',
        'servico_icon' => 'fa-tractor',
        'servico_color' => '#6BCB77',
        'nota' => 5,
        'titulo' => 'Análise muito detalhada',
        'comentario' => 'Recebemos um relatório completo com recomendações precisas. As nossas colheitas melhoraram significativamente!',
        'data' => '2026-02-10 16:15:00',
        'util' => 15,
        'respondida' => false,
        'resposta' => null,
        'data_resposta' => null,
        'verificada' => true,
        'anexos' => 1
    ],
    [
        'id' => 5,
        'cliente' => 'Mineração Progresso',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-4.png',
        'email' => 'contato@mineracaoprogresso.ao',
        'servico_id' => 3,
        'servico_nome' => 'Levantamento Planialtimétrico',
        'servico_categoria' => 'Topografia',
        'servico_icon' => 'fa-mountain',
        'servico_color' => '#6C2BD9',
        'nota' => 3,
        'titulo' => 'Poderia ser melhor',
        'comentario' => 'O trabalho foi feito, mas alguns pontos precisaram ser corrigidos. A comunicação poderia ser mais clara.',
        'data' => '2026-02-08 11:30:00',
        'util' => 5,
        'respondida' => false,
        'resposta' => null,
        'data_resposta' => null,
        'verificada' => true,
        'anexos' => 0
    ],
    [
        'id' => 6,
        'cliente' => 'Instituto Geográfico',
        'cliente_tipo' => 'Instituição',
        'avatar' => 'instituicao-2.png',
        'email' => 'financas@igeo.ao',
        'servico_id' => 1,
        'servico_nome' => 'Levantamento Topográfico',
        'servico_categoria' => 'Topografia',
        'servico_icon' => 'fa-mountain',
        'servico_color' => '#6C2BD9',
        'nota' => 5,
        'titulo' => 'Excelente parceria',
        'comentario' => 'Trabalho de altíssima qualidade. Continuaremos a trabalhar com esta equipa.',
        'data' => '2026-02-05 15:00:00',
        'util' => 20,
        'respondida' => true,
        'resposta' => 'Muito obrigado! Estamos sempre disponíveis para novos desafios.',
        'data_resposta' => '2026-02-05 17:30:00',
        'verificada' => true,
        'anexos' => 2
    ],
    [
        'id' => 7,
        'cliente' => 'Energia Futuro',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-5.png',
        'email' => 'financas@energiafuturo.ao',
        'servico_id' => 8,
        'servico_nome' => 'Modelação 3D de Terreno',
        'servico_categoria' => 'Engenharia',
        'servico_icon' => 'fa-ruler-combined',
        'servico_color' => '#00D2FF',
        'nota' => 2,
        'titulo' => 'Não atendeu expectativas',
        'comentario' => 'O modelo 3D apresentou alguns erros que precisaram ser corrigidos. Demorou mais do que o esperado.',
        'data' => '2026-02-03 10:45:00',
        'util' => 3,
        'respondida' => false,
        'resposta' => null,
        'data_resposta' => null,
        'verificada' => true,
        'anexos' => 1
    ],
    [
        'id' => 8,
        'cliente' => 'Construtora Silva',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-6.png',
        'email' => 'financeiro@construtorasilva.ao',
        'servico_id' => 3,
        'servico_nome' => 'Levantamento Planialtimétrico',
        'servico_categoria' => 'Topografia',
        'servico_icon' => 'fa-mountain',
        'servico_color' => '#6C2BD9',
        'nota' => 5,
        'titulo' => 'Rápido e eficiente',
        'comentario' => 'Entrega super rápida e trabalho muito bem feito. Recomendo!',
        'data' => '2026-01-30 14:00:00',
        'util' => 16,
        'respondida' => true,
        'resposta' => 'Agradecemos a preferência!',
        'data_resposta' => '2026-01-30 15:00:00',
        'verificada' => true,
        'anexos' => 0
    ],
    [
        'id' => 9,
        'cliente' => 'Agro Negócios Lda',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-3.png',
        'email' => 'info@agronegocios.ao',
        'servico_id' => 5,
        'servico_nome' => 'Levantamento com Drone',
        'servico_categoria' => 'Drones',
        'servico_icon' => 'fa-drone',
        'servico_color' => '#FF6B6B',
        'nota' => 4,
        'titulo' => 'Bom serviço',
        'comentario' => 'Trabalho profissional. Poderia ter mais detalhes no relatório, mas no geral foi bom.',
        'data' => '2026-01-28 09:15:00',
        'util' => 8,
        'respondida' => false,
        'resposta' => null,
        'data_resposta' => null,
        'verificada' => true,
        'anexos' => 2
    ],
    [
        'id' => 10,
        'cliente' => 'Município de Luanda',
        'cliente_tipo' => 'Instituição',
        'avatar' => 'instituicao-1.png',
        'email' => 'geral@luanda.gov.ao',
        'servico_id' => 9,
        'servico_nome' => 'Consultoria em Urbanismo',
        'servico_categoria' => 'Urbanismo',
        'servico_icon' => 'fa-city',
        'servico_color' => '#A29BFE',
        'nota' => 1,
        'titulo' => 'Muito abaixo das expectativas',
        'comentario' => 'A consultoria não correspondeu ao que foi prometido. Houve falta de comunicação e atrasos significativos.',
        'data' => '2026-01-25 16:45:00',
        'util' => 2,
        'respondida' => true,
        'resposta' => 'Lamentamos profundamente a sua experiência. Gostaríamos de agendar uma reunião para resolver a situação.',
        'data_resposta' => '2026-01-26 10:00:00',
        'verificada' => true,
        'anexos' => 0
    ]
];

// ============================================
// ESTATÍSTICAS POR SERVIÇO
// ============================================
$avaliacoes_por_servico = [
    ['nome' => 'Levantamento com Drone', 'categoria' => 'Drones', 'icon' => 'fa-drone', 'color' => '#FF6B6B', 'total' => 25, 'media' => 5.0],
    ['nome' => 'Levantamento Topográfico', 'categoria' => 'Topografia', 'icon' => 'fa-mountain', 'color' => '#6C2BD9', 'total' => 18, 'media' => 4.9],
    ['nome' => 'Mapeamento GIS', 'categoria' => 'GIS', 'icon' => 'fa-globe', 'color' => '#00FFA3', 'total' => 14, 'media' => 4.8],
    ['nome' => 'Levantamento Planialtimétrico', 'categoria' => 'Topografia', 'icon' => 'fa-mountain', 'color' => '#6C2BD9', 'total' => 22, 'media' => 4.7],
    ['nome' => 'Análise de Solo Agrícola', 'categoria' => 'Agricultura', 'icon' => 'fa-tractor', 'color' => '#6BCB77', 'total' => 6, 'media' => 4.5]
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
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
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00FFA3&color=fff&size=80';
    }
}

if (!function_exists('renderEstrelas')) {
    function renderEstrelas($avaliacao) {
        $html = '';
        $cheias = floor($avaliacao);
        $meia = ($avaliacao - $cheias) >= 0.5;
        
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $cheias) {
                $html .= '<i class="fas fa-star"></i>';
            } elseif ($i == $cheias + 1 && $meia) {
                $html .= '<i class="fas fa-star-half-alt"></i>';
            } else {
                $html .= '<i class="far fa-star"></i>';
            }
        }
        return $html;
    }
}

if (!function_exists('getNotaClass')) {
    function getNotaClass($nota) {
        if ($nota >= 5) return 'nota-excelente';
        if ($nota >= 4) return 'nota-boa';
        if ($nota >= 3) return 'nota-media';
        if ($nota >= 2) return 'nota-fraca';
        return 'nota-pessima';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../../includes/individual/servicos-head.php" ?>

<body>
    <div class="app-container">
        <!-- Toast Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Overlay para sidebar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR SERVIÇOS                           -->
        <!-- ========================================== -->
        <?php include "../../../includes/individual/servicos-sidebar.php" ?>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-star icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-count"><?php echo $kpis['total_avaliacoes']; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Serviços</a>
                        <span class="separator">/</span>
                        <span>Avaliações</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-servicos.php" ?>

                    <button class="btn btn-outline" onclick="exportarAvaliacoes()">
                        <i class="fas fa-download"></i> Exportar
                    </button>
                    <a href="index.php" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== KPIs DE AVALIAÇÕES ===== -->
            <section class="kpis-grid animate-fade-up">
                <!-- Avaliação Média -->
                <div class="kpi-card kpi-avaliacao">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(255, 217, 61, 0.15); color: #FFD93D;">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="kpi-variacao positiva">
                            <i class="fas fa-arrow-up"></i>
                            <?php echo number_format($kpis['avaliacao_variacao'], 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo $kpis['avaliacao_media']; ?></div>
                    <div class="kpi-label">Avaliação Média</div>
                    <div class="kpi-estrelas">
                        <?php echo renderEstrelas($kpis['avaliacao_media']); ?>
                    </div>
                </div>

                <!-- Total de Avaliações -->
                <div class="kpi-card kpi-total">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="kpi-variacao positiva">
                            <i class="fas fa-arrow-up"></i>
                            +<?php echo $kpis['total_avaliacoes_mes']; ?> mês
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo $kpis['total_avaliacoes']; ?></div>
                    <div class="kpi-label">Total de Avaliações</div>
                    <div class="kpi-footer">
                        <i class="fas fa-info-circle"></i>
                        <?php echo $kpis['total_avaliacoes_mes']; ?> este mês
                    </div>
                </div>

                <!-- Avaliações Positivas -->
                <div class="kpi-card kpi-positivas">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <div class="kpi-variacao positiva">
                            <?php echo number_format($kpis['avaliacoes_positivas_percentual'], 1); ?>%
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo $kpis['avaliacoes_positivas']; ?></div>
                    <div class="kpi-label">Avaliações Positivas</div>
                    <div class="kpi-progresso">
                        <div class="kpi-progresso-barra">
                            <div class="kpi-progresso-fill" style="width: <?php echo $kpis['avaliacoes_positivas_percentual']; ?>%; background: #00FFA3;"></div>
                        </div>
                    </div>
                </div>

                <!-- Pendentes de Resposta -->
                <div class="kpi-card kpi-pendentes">
                    <div class="kpi-header">
                        <div class="kpi-icon" style="background: rgba(255, 107, 107, 0.15); color: #FF6B6B;">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="kpi-variacao negativa">
                            <?php echo $kpis['tempo_medio_resposta']; ?>h
                        </div>
                    </div>
                    <div class="kpi-value"><?php echo $kpis['pendentes_resposta']; ?></div>
                    <div class="kpi-label">Pendentes de Resposta</div>
                    <div class="kpi-footer">
                        <i class="fas fa-info-circle"></i>
                        Tempo médio: <?php echo $kpis['tempo_medio_resposta']; ?>h
                    </div>
                </div>
            </section>

            <!-- ===== DISTRIBUIÇÃO E ESTATÍSTICAS ===== -->
            <section class="distribuicao-grid animate-fade-up" style="animation-delay: 0.1s;">
                <!-- Distribuição de Notas -->
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-chart-bar" style="color: #FFD93D;"></i> Distribuição de Notas</h3>
                    </div>
                    <div class="distribuicao-lista">
                        <?php for ($nota = 5; $nota >= 1; $nota--): 
                            $info = $distribuicao_notas[$nota];
                        ?>
                            <div class="distribuicao-item">
                                <div class="distribuicao-nota">
                                    <span><?php echo $nota; ?></span>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="distribuicao-barra">
                                    <div class="distribuicao-fill" style="width: <?php echo $info['percentual']; ?>%;"></div>
                                </div>
                                <span class="distribuicao-count"><?php echo $info['count']; ?></span>
                                <span class="distribuicao-percentual"><?php echo number_format($info['percentual'], 1); ?>%</span>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Avaliações por Serviço -->
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-tools" style="color: #00FFA3;"></i> Por Serviço</h3>
                    </div>
                    <div class="servicos-avaliacoes-lista">
                        <?php foreach ($avaliacoes_por_servico as $servico): ?>
                            <div class="servico-avaliacao-item">
                                <div class="servico-avaliacao-icon" style="background: <?php echo $servico['color']; ?>20; color: <?php echo $servico['color']; ?>;">
                                    <i class="fas <?php echo $servico['icon']; ?>"></i>
                                </div>
                                <div class="servico-avaliacao-info">
                                    <span class="servico-avaliacao-nome"><?php echo $servico['nome']; ?></span>
                                    <span class="servico-avaliacao-total"><?php echo $servico['total']; ?> avaliações</span>
                                </div>
                                <div class="servico-avaliacao-nota">
                                    <i class="fas fa-star"></i>
                                    <span><?php echo $servico['media']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.15s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchAvaliacao" placeholder="Buscar por cliente, serviço ou comentário..." 
                               oninput="filtrarAvaliacoes()">
                    </div>
                    <div class="filtros-actions">
                        <select class="filtro-select" id="filtroNota" onchange="filtrarAvaliacoes()">
                            <option value="">Todas as notas</option>
                            <option value="5">5 estrelas</option>
                            <option value="4">4 estrelas</option>
                            <option value="3">3 estrelas</option>
                            <option value="2">2 estrelas</option>
                            <option value="1">1 estrela</option>
                        </select>
                        <select class="filtro-select" id="filtroStatus" onchange="filtrarAvaliacoes()">
                            <option value="">Todos os status</option>
                            <option value="respondida">Respondidas</option>
                            <option value="pendente">Pendentes</option>
                        </select>
                    </div>
                </div>

                <!-- Filtros rápidos -->
                <div class="filtros-rapidos">
                    <button class="filtro-rapido active" data-filtro="todas" onclick="filtrarPorTipo('todas')">
                        Todas <span class="count"><?php echo $kpis['total_avaliacoes']; ?></span>
                    </button>
                    <button class="filtro-rapido" data-filtro="5estrelas" onclick="filtrarPorTipo('5estrelas')">
                        <i class="fas fa-star"></i> 5 Estrelas <span class="count"><?php echo $distribuicao_notas[5]['count']; ?></span>
                    </button>
                    <button class="filtro-rapido" data-filtro="positivas" onclick="filtrarPorTipo('positivas')">
                        <i class="fas fa-thumbs-up"></i> Positivas <span class="count"><?php echo $kpis['avaliacoes_positivas']; ?></span>
                    </button>
                    <button class="filtro-rapido" data-filtro="pendentes" onclick="filtrarPorTipo('pendentes')">
                        <i class="fas fa-clock"></i> Pendentes <span class="count"><?php echo $kpis['pendentes_resposta']; ?></span>
                    </button>
                    <button class="filtro-rapido" data-filtro="negativas" onclick="filtrarPorTipo('negativas')">
                        <i class="fas fa-thumbs-down"></i> Negativas <span class="count"><?php echo $kpis['avaliacoes_negativas']; ?></span>
                    </button>
                </div>
            </section>

            <!-- ===== LISTA DE AVALIAÇÕES ===== -->
            <section class="avaliacoes-container animate-fade-up" style="animation-delay: 0.2s;">
                <div class="avaliacoes-header">
                    <h3>
                        <i class="fas fa-list" style="color: #FFD93D;"></i>
                        Lista de Avaliações
                    </h3>
                    <div class="avaliacoes-info">
                        <span id="resultadosCount"><?php echo count($avaliacoes); ?> avaliações</span>
                        <div class="ordenacao">
                            <label>Ordenar por:</label>
                            <select id="ordenacao" onchange="ordenarAvaliacoes()">
                                <option value="recentes">Mais recentes</option>
                                <option value="antigas">Mais antigas</option>
                                <option value="maior-nota">Maior nota</option>
                                <option value="menor-nota">Menor nota</option>
                                <option value="mais-util">Mais úteis</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="avaliacoes-list" id="avaliacoesList">
                    <?php foreach ($avaliacoes as $avaliacao): ?>
                        <div class="avaliacao-card" 
                             data-id="<?php echo $avaliacao['id']; ?>"
                             data-nota="<?php echo $avaliacao['nota']; ?>"
                             data-status="<?php echo $avaliacao['respondida'] ? 'respondida' : 'pendente'; ?>"
                             data-util="<?php echo $avaliacao['util']; ?>"
                             data-data="<?php echo strtotime($avaliacao['data']); ?>"
                             data-busca="<?php echo strtolower($avaliacao['cliente'] . ' ' . $avaliacao['servico_nome'] . ' ' . $avaliacao['comentario']); ?>">
                            
                            <!-- Header -->
                            <div class="avaliacao-card-header">
                                <div class="avaliacao-cliente">
                                    <div class="avaliacao-avatar">
                                        <img src="../../../assets/images/<?php echo $avaliacao['avatar']; ?>"
                                             alt="<?php echo $avaliacao['cliente']; ?>"
                                             onerror="this.src='<?php echo getAvatarUrl($avaliacao['cliente']); ?>'">
                                    </div>
                                    <div class="avaliacao-cliente-info">
                                        <div class="avaliacao-cliente-nome-row">
                                            <span class="avaliacao-cliente-nome"><?php echo $avaliacao['cliente']; ?></span>
                                            <?php if ($avaliacao['verificada']): ?>
                                                <span class="badge-verificada" title="Compra verificada">
                                                    <i class="fas fa-check-circle"></i>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="avaliacao-cliente-meta">
                                            <span class="avaliacao-cliente-tipo"><?php echo $avaliacao['cliente_tipo']; ?></span>
                                            <span class="avaliacao-data">
                                                <i class="far fa-clock"></i> <?php echo timeAgo($avaliacao['data']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="avaliacao-nota-badge <?php echo getNotaClass($avaliacao['nota']); ?>">
                                    <div class="avaliacao-estrelas">
                                        <?php echo renderEstrelas($avaliacao['nota']); ?>
                                    </div>
                                    <span class="avaliacao-nota-valor"><?php echo $avaliacao['nota'] ?>.0</span>
                                </div>
                            </div>

                            <!-- Serviço relacionado -->
                            <div class="avaliacao-servico">
                                <div class="servico-icon-badge" style="background: <?php echo $avaliacao['servico_color']; ?>20; color: <?php echo $avaliacao['servico_color']; ?>;">
                                    <i class="fas <?php echo $avaliacao['servico_icon']; ?>"></i>
                                </div>
                                <div class="servico-info-badge">
                                    <span class="servico-categoria-label"><?php echo $avaliacao['servico_categoria']; ?></span>
                                    <span class="servico-nome-label"><?php echo $avaliacao['servico_nome']; ?></span>
                                </div>
                                <?php if ($avaliacao['anexos'] > 0): ?>
                                    <span class="avaliacao-anexos">
                                        <i class="fas fa-paperclip"></i> <?php echo $avaliacao['anexos']; ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Conteúdo -->
                            <div class="avaliacao-body">
                                <?php if (!empty($avaliacao['titulo'])): ?>
                                    <h4 class="avaliacao-titulo"><?php echo $avaliacao['titulo']; ?></h4>
                                <?php endif; ?>
                                <p class="avaliacao-comentario"><?php echo nl2br(htmlspecialchars($avaliacao['comentario'])); ?></p>
                            </div>

                            <!-- Resposta do Profissional -->
                            <?php if ($avaliacao['respondida'] && $avaliacao['resposta']): ?>
                                <div class="avaliacao-resposta">
                                    <div class="avaliacao-resposta-header">
                                        <div class="resposta-icon">
                                            <i class="fas fa-reply"></i>
                                        </div>
                                        <div class="resposta-info">
                                            <span class="resposta-autor">Sua resposta</span>
                                            <span class="resposta-data"><?php echo timeAgo($avaliacao['data_resposta']); ?></span>
                                        </div>
                                    </div>
                                    <p class="resposta-texto"><?php echo nl2br(htmlspecialchars($avaliacao['resposta'])); ?></p>
                                </div>
                            <?php endif; ?>

                            <!-- Footer -->
                            <div class="avaliacao-footer">
                                <div class="avaliacao-util">
                                    <button class="btn-util" onclick="marcarUtil(<?php echo $avaliacao['id']; ?>, event)">
                                        <i class="fas fa-thumbs-up"></i>
                                        Útil (<?php echo $avaliacao['util']; ?>)
                                    </button>
                                </div>
                                <div class="avaliacao-acoes">
                                    <?php if (!$avaliacao['respondida']): ?>
                                        <button class="btn btn-sm btn-primary" onclick="abrirResponder(<?php echo $avaliacao['id']; ?>)">
                                            <i class="fas fa-reply"></i> Responder
                                        </button>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-outline" onclick="verResposta(<?php echo $avaliacao['id']; ?>)">
                                            <i class="fas fa-eye"></i> Ver Resposta
                                        </button>
                                    <?php endif; ?>
                                    <button class="btn btn-sm btn-outline" onclick="abrirMenuAvaliacao(event, <?php echo $avaliacao['id']; ?>)">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Empty State -->
                <div class="empty-state" id="emptyState" style="display: none;">
                    <i class="fas fa-search"></i>
                    <h3>Nenhuma avaliação encontrada</h3>
                    <p>Tente ajustar os filtros de pesquisa</p>
                    <button class="btn btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-undo"></i> Limpar Filtros
                    </button>
                </div>

                <!-- Paginação -->
                <div class="paginacao" id="paginacao">
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="page-info">Página 1 de 1</span>
                    <button class="page-btn" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MENU CONTEXTUAL                            -->
    <!-- ========================================== -->
    <div class="context-menu" id="contextMenu">
        <a href="#" class="context-item" id="menuVerDetalhes">
            <i class="fas fa-eye"></i>
            <span>Ver Detalhes</span>
        </a>
        <a href="#" class="context-item" id="menuResponder">
            <i class="fas fa-reply"></i>
            <span>Responder</span>
        </a>
        <a href="#" class="context-item" id="menuVerServico">
            <i class="fas fa-tools"></i>
            <span>Ver Serviço</span>
        </a>
        <hr>
        <a href="#" class="context-item" id="menuDenunciar">
            <i class="fas fa-flag"></i>
            <span>Reportar Avaliação</span>
        </a>
    </div>

    <!-- ========================================== -->
    <!-- MODAL RESPONDER AVALIAÇÃO                  -->
    <!-- ========================================== -->
    <div class="modal" id="modalResponder">
        <div class="modal-overlay" onclick="fecharModal('modalResponder')"></div>
        <div class="modal-content" style="max-width: 600px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-reply" style="color: #00FFA3;"></i>
                    Responder Avaliação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalResponder')">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Avaliação Original -->
                <div class="responder-avaliacao-original" id="responderAvaliacaoOriginal">
                    <!-- Preenchido via JS -->
                </div>

                <!-- Formulário de Resposta -->
                <form id="formResponder" onsubmit="enviarResposta(event)">
                    <input type="hidden" id="respostaAvaliacaoId" value="">
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-comment"></i>
                            Sua Resposta <span class="required">*</span>
                        </label>
                        <textarea class="form-control" id="respostaTexto" rows="6" 
                                  placeholder="Escreva uma resposta profissional e cordial ao cliente..."
                                  maxlength="1000" required></textarea>
                        <div class="char-counter">
                            <span id="respostaCount">0</span> / 1000 caracteres
                        </div>
                    </div>

                    <div class="resposta-sugestoes">
                        <span class="sugestoes-label">Respostas rápidas:</span>
                        <button type="button" class="sugestao-btn" onclick="inserirSugestao('agradecer')">
                            <i class="fas fa-heart"></i> Agradecer
                        </button>
                        <button type="button" class="sugestao-btn" onclick="inserirSugestao('desculpar')">
                            <i class="fas fa-hand-peace"></i> Pedir desculpa
                        </button>
                        <button type="button" class="sugestao-btn" onclick="inserirSugestao('contactar')">
                            <i class="fas fa-phone"></i> Contactar
                        </button>
                        <button type="button" class="sugestao-btn" onclick="inserirSugestao('melhorar')">
                            <i class="fas fa-chart-line"></i> Prometer melhorar
                        </button>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="respostaPublica" checked>
                            <span>Tornar esta resposta pública para todos os clientes</span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalResponder')">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button class="btn btn-primary" onclick="document.getElementById('formResponder').submit()">
                    <i class="fas fa-paper-plane"></i> Enviar Resposta
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL VER AVALIAÇÃO COMPLETA               -->
    <!-- ========================================== -->
    <div class="modal" id="modalVerAvaliacao">
        <div class="modal-overlay" onclick="fecharModal('modalVerAvaliacao')"></div>
        <div class="modal-content" style="max-width: 700px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-star" style="color: #FFD93D;"></i>
                    Detalhes da Avaliação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalVerAvaliacao')">&times;</button>
            </div>
            <div class="modal-body" id="verAvaliacaoBody">
                <!-- Preenchido via JS -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalVerAvaliacao')">
                    <i class="fas fa-times"></i> Fechar
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // DADOS DAS AVALIAÇÕES (para JS)
        // ============================================
        const avaliacoesData = <?php echo json_encode($avaliacoes); ?>;

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
        // FILTROS
        // ============================================
        let filtroTipoAtual = 'todas';

        function filtrarPorTipo(tipo) {
            filtroTipoAtual = tipo;
            document.querySelectorAll('.filtro-rapido').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.filtro === tipo);
            });
            filtrarAvaliacoes();
        }

        function filtrarAvaliacoes() {
            const search = (document.getElementById('searchAvaliacao')?.value || '').toLowerCase().trim();
            const nota = document.getElementById('filtroNota')?.value || '';
            const status = document.getElementById('filtroStatus')?.value || '';
            const cards = document.querySelectorAll('.avaliacao-card');
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;
                const cardNota = card.dataset.nota;
                const cardStatus = card.dataset.status;
                const cardBusca = card.dataset.busca || '';

                // Filtro rápido
                if (filtroTipoAtual === '5estrelas' && cardNota !== '5') mostrar = false;
                if (filtroTipoAtual === 'positivas' && parseInt(cardNota) < 4) mostrar = false;
                if (filtroTipoAtual === 'negativas' && parseInt(cardNota) > 2) mostrar = false;
                if (filtroTipoAtual === 'pendentes' && cardStatus !== 'pendente') mostrar = false;

                // Filtro de nota
                if (mostrar && nota && cardNota !== nota) mostrar = false;

                // Filtro de status
                if (mostrar && status && cardStatus !== status) mostrar = false;

                // Busca
                if (mostrar && search && !cardBusca.includes(search)) mostrar = false;

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            document.getElementById('resultadosCount').textContent = visiveis + ' avaliações';

            const emptyState = document.getElementById('emptyState');
            if (visiveis === 0) {
                emptyState.style.display = 'block';
            } else {
                emptyState.style.display = 'none';
            }
        }

        function limparFiltros() {
            document.getElementById('searchAvaliacao').value = '';
            document.getElementById('filtroNota').value = '';
            document.getElementById('filtroStatus').value = '';
            filtroTipoAtual = 'todas';
            document.querySelectorAll('.filtro-rapido').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.filtro === 'todas');
            });
            filtrarAvaliacoes();
        }

        // ============================================
        // ORDENAÇÃO
        // ============================================
        function ordenarAvaliacoes() {
            const ordenacao = document.getElementById('ordenacao').value;
            const container = document.getElementById('avaliacoesList');
            const cards = Array.from(container.querySelectorAll('.avaliacao-card'));

            cards.sort((a, b) => {
                switch(ordenacao) {
                    case 'recentes':
                        return parseInt(b.dataset.data) - parseInt(a.dataset.data);
                    case 'antigas':
                        return parseInt(a.dataset.data) - parseInt(b.dataset.data);
                    case 'maior-nota':
                        return parseInt(b.dataset.nota) - parseInt(a.dataset.nota);
                    case 'menor-nota':
                        return parseInt(a.dataset.nota) - parseInt(b.dataset.nota);
                    case 'mais-util':
                        return parseInt(b.dataset.util) - parseInt(a.dataset.util);
                    default:
                        return 0;
                }
            });

            cards.forEach(card => container.appendChild(card));
            mostrarToast('Ordenação aplicada', 'info');
        }

        // ============================================
        // MARCAR ÚTIL
        // ============================================
        function marcarUtil(id, event) {
            event.stopPropagation();
            const btn = event.target.closest('.btn-util');
            
            if (btn.classList.contains('ativo')) {
                btn.classList.remove('ativo');
                mostrarToast('Marcação removida', 'info');
            } else {
                btn.classList.add('ativo');
                mostrarToast('Marcado como útil!', 'success');
            }
        }

        // ============================================
        // RESPONDER AVALIAÇÃO
        // ============================================
        let avaliacaoAtual = null;

        function abrirResponder(id) {
            const avaliacao = avaliacoesData.find(a => a.id === id);
            if (!avaliacao) return;

            avaliacaoAtual = avaliacao;

            // Preencher avaliação original
            document.getElementById('responderAvaliacaoOriginal').innerHTML = `
                <div class="responder-cliente">
                    <img src="../../../assets/images/${avaliacao.avatar}" 
                         alt="${avaliacao.cliente}"
                         onerror="this.src='https://ui-avatars.com/api/?name=${encodeURIComponent(avaliacao.cliente)}&background=00FFA3&color=fff'">
                    <div>
                        <span class="responder-cliente-nome">${avaliacao.cliente}</span>
                        <div class="responder-cliente-estrelas">${renderEstrelasJS(avaliacao.nota)}</div>
                    </div>
                </div>
                <div class="responder-comentario">
                    <strong>${avaliacao.titulo || ''}</strong>
                    <p>${avaliacao.comentario}</p>
                </div>
            `;

            document.getElementById('respostaAvaliacaoId').value = id;
            document.getElementById('respostaTexto').value = '';
            document.getElementById('respostaCount').textContent = '0';

            document.getElementById('modalResponder').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function renderEstrelasJS(nota) {
            let html = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= nota) {
                    html += '<i class="fas fa-star"></i>';
                } else {
                    html += '<i class="far fa-star"></i>';
                }
            }
            return html;
        }

        function inserirSugestao(tipo) {
            const sugestoes = {
                'agradecer': 'Muito obrigado pela sua avaliação! Ficamos muito satisfeitos por ter superado as suas expectativas. Será um prazer trabalhar consigo novamente.',
                'desculpar': 'Lamentamos sinceramente pela experiência menos positiva. Gostaríamos de agendar uma conversa para entender melhor o que aconteceu e resolver a situação.',
                'contactar': 'Agradecemos o seu feedback! Gostaríamos de agendar uma reunião para discutir os pontos mencionados. Entraremos em contacto brevemente.',
                'melhorar': 'Obrigado pelo seu feedback construtivo. Vamos analisar internamente os pontos mencionados e implementar melhorias para futuras colaborações.'
            };

            document.getElementById('respostaTexto').value = sugestoes[tipo] || '';
            document.getElementById('respostaCount').textContent = sugestoes[tipo].length;
        }

        function enviarResposta(event) {
            event.preventDefault();
            
            const resposta = document.getElementById('respostaTexto').value.trim();
            if (!resposta) {
                mostrarToast('Escreva uma resposta!', 'error');
                return;
            }

            mostrarToast('Resposta enviada com sucesso!', 'success');
            fecharModal('modalResponder');
        }

        // Contador de caracteres
        document.addEventListener('DOMContentLoaded', function() {
            const texto = document.getElementById('respostaTexto');
            const count = document.getElementById('respostaCount');
            if (texto && count) {
                texto.addEventListener('input', function() {
                    count.textContent = this.value.length;
                });
            }
        });

        // ============================================
        // VER RESPOSTA
        // ============================================
        function verResposta(id) {
            const avaliacao = avaliacoesData.find(a => a.id === id);
            if (!avaliacao) return;

            abrirVerAvaliacao(id);
        }

        function abrirVerAvaliacao(id) {
            const avaliacao = avaliacoesData.find(a => a.id === id);
            if (!avaliacao) return;

            const body = document.getElementById('verAvaliacaoBody');
            body.innerHTML = `
                <div class="ver-avaliacao-header">
                    <div class="ver-cliente">
                        <img src="../../../assets/images/${avaliacao.avatar}" 
                             alt="${avaliacao.cliente}"
                             onerror="this.src='https://ui-avatars.com/api/?name=${encodeURIComponent(avaliacao.cliente)}&background=00FFA3&color=fff'">
                        <div>
                            <h4>${avaliacao.cliente}</h4>
                            <span class="ver-cliente-tipo">${avaliacao.cliente_tipo}</span>
                        </div>
                    </div>
                    <div class="ver-nota">
                        <div class="ver-estrelas">${renderEstrelasJS(avaliacao.nota)}</div>
                        <span class="ver-nota-valor">${avaliacao.nota}.0</span>
                    </div>
                </div>

                <div class="ver-servico">
                    <div class="ver-servico-icon" style="background: ${avaliacao.servico_color}20; color: ${avaliacao.servico_color};">
                        <i class="fas ${avaliacao.servico_icon}"></i>
                    </div>
                    <div>
                        <span class="ver-servico-categoria">${avaliacao.servico_categoria}</span>
                        <span class="ver-servico-nome">${avaliacao.servico_nome}</span>
                    </div>
                </div>

                <div class="ver-conteudo">
                    <h5>${avaliacao.titulo || ''}</h5>
                    <p>${avaliacao.comentario}</p>
                </div>

                ${avaliacao.respondida ? `
                    <div class="ver-resposta">
                        <div class="ver-resposta-header">
                            <i class="fas fa-reply"></i>
                            <strong>Sua Resposta</strong>
                            <span>${timeAgoJS(avaliacao.data_resposta)}</span>
                        </div>
                        <p>${avaliacao.resposta}</p>
                    </div>
                ` : `
                    <div class="ver-pendente">
                        <i class="fas fa-clock"></i>
                        <span>Ainda não respondida</span>
                        <button class="btn btn-sm btn-primary" onclick="fecharModal('modalVerAvaliacao'); abrirResponder(${avaliacao.id})">
                            <i class="fas fa-reply"></i> Responder Agora
                        </button>
                    </div>
                `}
            `;

            document.getElementById('modalVerAvaliacao').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function timeAgoJS(datetime) {
            if (!datetime) return 'N/A';
            const diff = Math.floor((new Date() - new Date(datetime.replace(' ', 'T'))) / 1000);
            if (diff < 60) return 'há ' + diff + ' segundos';
            if (diff < 3600) return 'há ' + Math.floor(diff / 60) + ' minutos';
            if (diff < 86400) return 'há ' + Math.floor(diff / 3600) + ' horas';
            if (diff < 604800) return 'há ' + Math.floor(diff / 86400) + ' dias';
            return new Date(datetime).toLocaleDateString('pt-AO');
        }

        // ============================================
        // MENU CONTEXTUAL
        // ============================================
        let avaliacaoMenuId = null;

        function abrirMenuAvaliacao(event, id) {
            event.stopPropagation();
            event.preventDefault();

            avaliacaoMenuId = id;
            const menu = document.getElementById('contextMenu');
            const rect = event.target.closest('button').getBoundingClientRect();

            menu.style.position = 'fixed';
            menu.style.top = (rect.bottom + 5) + 'px';
            menu.style.left = (rect.right - 200) + 'px';
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
        }

        document.addEventListener('click', function(e) {
            const menu = document.getElementById('contextMenu');
            if (menu && !menu.contains(e.target) && !e.target.closest('.avaliacao-acoes')) {
                menu.style.display = 'none';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const menu = document.getElementById('contextMenu');
                if (menu) menu.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('menuVerDetalhes')?.addEventListener('click', function(e) {
                e.preventDefault();
                if (avaliacaoMenuId) abrirVerAvaliacao(avaliacaoMenuId);
                document.getElementById('contextMenu').style.display = 'none';
            });

            document.getElementById('menuResponder')?.addEventListener('click', function(e) {
                e.preventDefault();
                if (avaliacaoMenuId) abrirResponder(avaliacaoMenuId);
                document.getElementById('contextMenu').style.display = 'none';
            });

            document.getElementById('menuDenunciar')?.addEventListener('click', function(e) {
                e.preventDefault();
                mostrarToast('Avaliação reportada para revisão', 'warning');
                document.getElementById('contextMenu').style.display = 'none';
            });
        });

        // ============================================
        // EXPORTAR AVALIAÇÕES
        // ============================================
        function exportarAvaliacoes() {
            mostrarToast('A preparar exportação...', 'info');
            setTimeout(() => {
                mostrarToast('Avaliações exportadas com sucesso!', 'success');
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
        .header-left .breadcrumb a:hover { color: #FFD93D; }
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
        /* KPIs                                       */
        /* ========================================== */
        .kpis-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .kpi-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .kpi-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
        }

        .kpi-avaliacao::before { background: #FFD93D; }
        .kpi-total::before { background: #00D2FF; }
        .kpi-positivas::before { background: #00FFA3; }
        .kpi-pendentes::before { background: #FF6B6B; }

        .kpi-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
            transform: translateY(-2px);
        }

        .kpi-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: var(--space-sm);
        }

        .kpi-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .kpi-variacao {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .kpi-variacao.positiva {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .kpi-variacao.negativa {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .kpi-value {
            font-family: var(--font-display);
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1;
            letter-spacing: -0.5px;
        }

        .kpi-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .kpi-estrelas {
            display: flex;
            gap: 3px;
            font-size: 14px;
            color: #FFD93D;
            margin-top: 4px;
        }

        .kpi-progresso {
            margin-top: 4px;
        }

        .kpi-progresso-barra {
            height: 6px;
            background: var(--bg-input);
            border-radius: 3px;
            overflow: hidden;
        }

        .kpi-progresso-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .kpi-footer {
            display: flex;
            align-items: center;
            gap: 6px;
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: auto;
        }

        .kpi-footer i {
            color: #00FFA3;
            font-size: 10px;
        }

        /* ========================================== */
        /* DISTRIBUIÇÃO E ESTATÍSTICAS                */
        /* ========================================== */
        .distribuicao-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
        }

        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
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
        }

        /* ===== DISTRIBUIÇÃO DE NOTAS ===== */
        .distribuicao-lista {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .distribuicao-item {
            display: grid;
            grid-template-columns: 60px 1fr 40px 60px;
            gap: var(--space-sm);
            align-items: center;
        }

        .distribuicao-nota {
            display: flex;
            align-items: center;
            gap: 4px;
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .distribuicao-nota i {
            color: #FFD93D;
            font-size: 12px;
        }

        .distribuicao-barra {
            height: 8px;
            background: var(--bg-input);
            border-radius: 4px;
            overflow: hidden;
        }

        .distribuicao-fill {
            height: 100%;
            background: linear-gradient(90deg, #FFD93D 0%, #FF9F43 100%);
            border-radius: 4px;
            transition: width 0.6s ease;
        }

        .distribuicao-count {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            text-align: center;
        }

        .distribuicao-percentual {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-align: right;
        }

        /* ===== SERVIÇOS AVALIAÇÕES ===== */
        .servicos-avaliacoes-lista {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .servico-avaliacao-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .servico-avaliacao-item:hover {
            border-color: #FFD93D;
            transform: translateX(4px);
        }

        .servico-avaliacao-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .servico-avaliacao-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .servico-avaliacao-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .servico-avaliacao-total {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .servico-avaliacao-nota {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: rgba(255, 217, 61, 0.12);
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #FFD93D;
            flex-shrink: 0;
        }

        .servico-avaliacao-nota i {
            font-size: 11px;
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
            gap: var(--space-sm);
            flex-shrink: 0;
        }

        .filtro-select {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 10px 34px 10px 14px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            transition: var(--transition-smooth);
        }

        .filtro-select:focus {
            outline: none;
            border-color: #FFD93D;
        }

        .filtros-rapidos {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .filtro-rapido {
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

        .filtro-rapido:hover { border-color: #FFD93D; color: var(--text-primary); }
        .filtro-rapido.active {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border-color: transparent;
        }

        .filtro-rapido .count {
            background: rgba(255, 255, 255, 0.2);
            padding: 1px 6px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
        }

        .filtro-rapido:not(.active) .count {
            background: var(--bg-card);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* LISTA DE AVALIAÇÕES                        */
        /* ========================================== */
        .avaliacoes-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-lg);
        }

        .avaliacoes-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-lg);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .avaliacoes-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .avaliacoes-info {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .avaliacoes-info > span {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .ordenacao {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .ordenacao label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .ordenacao select {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 6px 28px 6px 10px;
            font-size: var(--text-xs);
            color: var(--text-primary);
            font-family: var(--font-body);
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px center;
        }

        .avaliacoes-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .avaliacao-card {
            background: var(--bg-input);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            padding: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .avaliacao-card:hover {
            border-color: #FFD93D;
            box-shadow: 0 8px 24px rgba(255, 217, 61, 0.1);
        }

        /* ===== HEADER ===== */
        .avaliacao-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .avaliacao-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            flex: 1;
            min-width: 0;
        }

        .avaliacao-avatar {
            flex-shrink: 0;
        }

        .avaliacao-avatar img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #00FFA3;
        }

        .avaliacao-cliente-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .avaliacao-cliente-nome-row {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .avaliacao-cliente-nome {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .badge-verificada {
            display: inline-flex;
            align-items: center;
            color: #00FFA3;
            font-size: 13px;
            flex-shrink: 0;
        }

        .avaliacao-cliente-meta {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .avaliacao-cliente-tipo {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .avaliacao-data {
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .avaliacao-nota-badge {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 4px;
            flex-shrink: 0;
        }

        .avaliacao-estrelas {
            display: flex;
            gap: 2px;
            font-size: 12px;
            color: #FFD93D;
        }

        .avaliacao-nota-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .nota-excelente .avaliacao-nota-valor { color: #00FFA3; }
        .nota-boa .avaliacao-nota-valor { color: #00D2FF; }
        .nota-media .avaliacao-nota-valor { color: #FFD93D; }
        .nota-fraca .avaliacao-nota-valor { color: #FF9F43; }
        .nota-pessima .avaliacao-nota-valor { color: #FF6B6B; }

        /* ===== SERVIÇO ===== */
        .avaliacao-servico {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-card);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .servico-icon-badge {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .servico-info-badge {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .servico-categoria-label {
            font-size: 9px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .servico-nome-label {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .avaliacao-anexos {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 8px;
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            flex-shrink: 0;
        }

        /* ===== CONTEÚDO ===== */
        .avaliacao-body {
            margin-bottom: var(--space-md);
        }

        .avaliacao-titulo {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .avaliacao-comentario {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        /* ===== RESPOSTA ===== */
        .avaliacao-resposta {
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.06) 0%, rgba(0, 210, 255, 0.06) 100%);
            border-left: 3px solid #00FFA3;
            border-radius: var(--radius-md);
            margin-bottom: var(--space-md);
        }

        .avaliacao-resposta-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-sm);
        }

        .resposta-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .resposta-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .resposta-autor {
            font-size: var(--text-sm);
            font-weight: 700;
            color: #00FFA3;
        }

        .resposta-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .resposta-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        /* ===== FOOTER ===== */
        .avaliacao-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .avaliacao-util .btn-util {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: transparent;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-muted);
            font-family: var(--font-body);
            font-size: var(--text-xs);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .avaliacao-util .btn-util:hover,
        .avaliacao-util .btn-util.ativo {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
        }

        .avaliacao-acoes {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
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
        /* PAGINAÇÃO                                  */
        /* ========================================== */
        .paginacao {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg) 0 0;
            margin-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .page-btn {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
        }

        .page-btn:hover:not(:disabled) { border-color: #FFD93D; color: #FFD93D; }
        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 var(--space-sm);
        }

        /* ========================================== */
        /* MENU CONTEXTUAL                            */
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
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(6px);
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

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
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

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 120px; justify-content: center; }

        /* ===== MODAL RESPONDER ===== */
        .responder-avaliacao-original {
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
        }

        .responder-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-sm);
        }

        .responder-cliente img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #00FFA3;
        }

        .responder-cliente-nome {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .responder-cliente-estrelas {
            display: flex;
            gap: 2px;
            font-size: 11px;
            color: #FFD93D;
        }

        .responder-comentario strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
            display: block;
            margin-bottom: 4px;
        }

        .responder-comentario p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
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

        .form-label i { color: #00FFA3; margin-right: 4px; }

        .form-label .required { color: #FF6B6B; margin-left: 2px; }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 12px 14px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
            resize: vertical;
            min-height: 120px;
        }

        .form-control:focus {
            outline: none;
            border-color: #00FFA3;
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
        }

        .form-control::placeholder { color: var(--text-muted); }

        .char-counter {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-align: right;
            margin-top: 4px;
        }

        .resposta-sugestoes {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
        }

        .sugestoes-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            margin-right: var(--space-sm);
        }

        .sugestao-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-body);
            font-size: var(--text-xs);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .sugestao-btn:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
            transform: translateY(-2px);
        }

        .sugestao-btn i { font-size: 11px; }

        .checkbox-inline {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            cursor: pointer;
        }

        .checkbox-inline input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #00FFA3;
            cursor: pointer;
            flex-shrink: 0;
        }

        .checkbox-inline span {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        /* ===== MODAL VER AVALIAÇÃO ===== */
        .ver-avaliacao-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .ver-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .ver-cliente img {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #00FFA3;
        }

        .ver-cliente h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 2px 0;
        }

        .ver-cliente-tipo {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .ver-nota {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 4px;
        }

        .ver-estrelas {
            display: flex;
            gap: 3px;
            font-size: 14px;
            color: #FFD93D;
        }

        .ver-nota-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        .ver-servico {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
        }

        .ver-servico-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .ver-servico-categoria {
            display: block;
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .ver-servico-nome {
            display: block;
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .ver-conteudo {
            margin-bottom: var(--space-md);
        }

        .ver-conteudo h5 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .ver-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        .ver-resposta {
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.06) 0%, rgba(0, 210, 255, 0.06) 100%);
            border-left: 3px solid #00FFA3;
            border-radius: var(--radius-md);
        }

        .ver-resposta-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-sm);
            flex-wrap: wrap;
        }

        .ver-resposta-header i { color: #00FFA3; font-size: 16px; }
        .ver-resposta-header strong {
            font-size: var(--text-sm);
            color: #00FFA3;
        }
        .ver-resposta-header span {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-left: auto;
        }

        .ver-resposta p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        .ver-pendente {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(255, 217, 61, 0.08);
            border: 1px solid rgba(255, 217, 61, 0.2);
            border-radius: var(--radius-md);
            flex-wrap: wrap;
        }

        .ver-pendente i { color: #FFD93D; font-size: 20px; }
        .ver-pendente span {
            flex: 1;
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .kpis-grid { grid-template-columns: repeat(2, 1fr); }
            .distribuicao-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
        }

        @media (max-width: 768px) {
            .kpis-grid { grid-template-columns: 1fr; }
            .kpi-value { font-size: 28px; }
            
            .filtros-top { flex-direction: column; align-items: stretch; }
            .filtros-actions { flex-direction: column; }
            .filtro-select { width: 100%; }
            
            .filtros-rapidos {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 4px;
            }
            .filtro-rapido { white-space: nowrap; flex-shrink: 0; }
            
            .avaliacao-card-header { flex-direction: column; align-items: stretch; }
            .avaliacao-nota-badge { align-items: flex-start; }
            
            .avaliacoes-header { flex-direction: column; align-items: flex-start; }
            .avaliacoes-info { width: 100%; justify-content: space-between; }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
            
            .avaliacoes-container { padding: var(--space-md); }
            
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .kpi-value { font-size: 24px; }
            
            .distribuicao-item { grid-template-columns: 50px 1fr 30px 50px; }
            
            .avaliacao-footer { flex-direction: column; align-items: stretch; }
            .avaliacao-acoes { width: 100%; }
            .avaliacao-acoes .btn { flex: 1; justify-content: center; }
            
            .responder-avaliacao-original { padding: var(--space-sm); }
            .responder-cliente { flex-direction: column; align-items: flex-start; }
            
            .ver-avaliacao-header { flex-direction: column; align-items: flex-start; }
            .ver-nota { align-items: flex-start; }
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

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>