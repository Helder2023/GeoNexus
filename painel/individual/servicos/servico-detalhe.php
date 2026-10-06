<?php
// painel/individual/servicos/servico-detalhe.php - Detalhes do Serviço
include "../../../includes/individual/notificacoes-servicos-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Detalhes do Serviço';
$pagina_atual = 'servico-detalhe';

// ============================================
// OBTER ID DO SERVIÇO
// ============================================
$id_servico = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - SERVIÇO
// ============================================
$servico = [
    'id' => $id_servico,
    'codigo' => 'SRV-2026-0001',
    'nome' => 'Levantamento Topográfico',
    'descricao' => 'Levantamento topográfico completo da zona norte de Luanda, incluindo 50 hectares de terreno urbano com curvas de nível e pontos georreferenciados. O serviço inclui a geração de plantas topográficas em escala 1:1000, com curvas de nível a cada metro e pontos de referência georreferenciados segundo o sistema WGS84.',
    'resumo' => 'Levantamento topográfico completo com curvas de nível, pontos georreferenciados e plantas em escala.',
    'categoria' => 'Topografia',
    'categoria_icon' => 'fa-mountain',
    'categoria_color' => '#6C2BD9',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'disponibilidade' => 'disponivel',
    'disponibilidade_label' => 'Disponível',
    'preco_base' => 350000,
    'unidade' => 'por hectare',
    'duracao' => '15-30 dias',
    'prazo_minimo' => 15,
    'condicoes_pagamento' => '50-50',
    'condicoes_pagamento_label' => '50% Adiantado / 50% na Entrega',
    'visualizacoes' => 245,
    'contratacoes' => 12,
    'avaliacao' => 4.9,
    'total_avaliacoes' => 18,
    'destaque' => true,
    'popular' => true,
    'urgente' => false,
    'imagem_capa' => 'servico-topografia-capa.jpg',
    'imagem_apresentacao' => 'servico-topografia.jpg',
    'galeria' => [
        'servico-topografia-1.jpg',
        'servico-topografia-2.jpg',
        'servico-topografia-3.jpg',
        'servico-topografia-4.jpg',
        'servico-topografia-5.jpg'
    ],
    'entregaveis' => [
        'Planta topográfica em escala 1:1000',
        'Pontos georreferenciados em WGS84',
        'Relatório técnico completo',
        'Ficheiros em formato DWG, PDF e XLSX',
        'Curvas de nível a cada metro',
        'Marcação de pontos de referência'
    ],
    'requisitos' => [
        'Acesso livre ao terreno',
        'Documentação do cliente (autorização)',
        'Identificação de limites da propriedade'
    ],
    'data_criacao' => '2025-06-15 10:30:00',
    'data_atualizacao' => '2026-02-18 14:20:00',
    'observacoes' => 'Serviço ideal para projetos de urbanização e construção. Inclui suporte técnico durante todo o processo.'
];

// ============================================
// AVALIAÇÕES DO SERVIÇO
// ============================================
$avaliacoes_clientes = [
    [
        'id' => 1,
        'cliente' => 'Construtora ABC',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-1.png',
        'nota' => 5,
        'comentario' => 'Excelente trabalho! O levantamento foi feito com precisão e entregue dentro do prazo. Recomendo fortemente.',
        'data' => '2026-02-10',
        'util' => 12
    ],
    [
        'id' => 2,
        'cliente' => 'Município de Luanda',
        'cliente_tipo' => 'Instituição',
        'avatar' => 'instituicao-1.png',
        'nota' => 5,
        'comentario' => 'Profissionalismo e rigor técnico excecionais. Trabalho de altíssima qualidade.',
        'data' => '2026-02-05',
        'util' => 8
    ],
    [
        'id' => 3,
        'cliente' => 'Agro Negócios Lda',
        'cliente_tipo' => 'Empresa',
        'avatar' => 'empresa-2.png',
        'nota' => 4,
        'comentario' => 'Bom trabalho no geral. Pequeno atraso na entrega mas comunicado com antecedência.',
        'data' => '2026-01-28',
        'util' => 5
    ]
];

// ============================================
// SERVIÇOS RELACIONADOS
// ============================================
$servicos_relacionados = [
    [
        'id' => 3,
        'nome' => 'Levantamento Planialtimétrico',
        'categoria' => 'Topografia',
        'categoria_icon' => 'fa-mountain',
        'categoria_color' => '#6C2BD9',
        'preco_base' => 280000,
        'unidade' => 'por hectare',
        'avaliacao' => 4.7,
        'total_avaliacoes' => 22
    ],
    [
        'id' => 5,
        'nome' => 'Levantamento com Drone',
        'categoria' => 'Drones',
        'categoria_icon' => 'fa-drone',
        'categoria_color' => '#FF6B6B',
        'preco_base' => 320000,
        'unidade' => 'por voo',
        'avaliacao' => 5.0,
        'total_avaliacoes' => 25
    ],
    [
        'id' => 2,
        'nome' => 'Mapeamento GIS',
        'categoria' => 'GIS',
        'categoria_icon' => 'fa-globe',
        'categoria_color' => '#00FFA3',
        'preco_base' => 480000,
        'unidade' => 'por projeto',
        'avaliacao' => 4.8,
        'total_avaliacoes' => 14
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
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00FFA3&color=fff&size=80';
    }
}

if (!function_exists('getStatusClass')) {
    function getStatusClass($status) {
        $classes = [
            'ativo' => 'status-ativo',
            'inativo' => 'status-inativo',
            'pausado' => 'status-pausado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-inativo';
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

if (!function_exists('getDistribuicaoNotas')) {
    function getDistribuicaoNotas($avaliacoes) {
        $distribuicao = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
        foreach ($avaliacoes as $av) {
            if (isset($distribuicao[$av['nota']])) {
                $distribuicao[$av['nota']]++;
            }
        }
        return $distribuicao;
    }
}

$distribuicao = getDistribuicaoNotas($avaliacoes_clientes);
$total_avaliacoes_reais = array_sum($distribuicao);
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
                        <div class="servico-icon-header" style="background: <?php echo $servico['categoria_color']; ?>20; color: <?php echo $servico['categoria_color']; ?>;">
                            <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                        </div>
                        <?php echo $servico['nome']; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Serviços</a>
                        <span class="separator">/</span>
                        <span><?php echo $servico['codigo']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-servicos.php" ?>

                    <a href="index.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== BANNER DE CAPA ===== -->
            <section class="servico-banner animate-fade-up" style="--cat-color: <?php echo $servico['categoria_color']; ?>;">
                <div class="servico-banner-imagem" style="background: linear-gradient(135deg, <?php echo $servico['categoria_color']; ?>30 0%, <?php echo $servico['categoria_color']; ?>10 100%);">
                    <div class="servico-banner-placeholder">
                        <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                    </div>
                    
                    <!-- Badges -->
                    <div class="servico-banner-badges">
                        <?php if ($servico['destaque']): ?>
                            <span class="badge-capa badge-destaque">
                                <i class="fas fa-star"></i> Destaque
                            </span>
                        <?php endif; ?>
                        <?php if ($servico['popular']): ?>
                            <span class="badge-capa badge-popular">
                                <i class="fas fa-fire"></i> Popular
                            </span>
                        <?php endif; ?>
                        <?php if ($servico['urgente']): ?>
                            <span class="badge-capa badge-urgente">
                                <i class="fas fa-bolt"></i> Urgente
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- Status -->
                    <div class="servico-banner-status">
                        <span class="badge-status <?php echo getStatusClass($servico['status']); ?>">
                            <i class="fas fa-circle"></i>
                            <?php echo $servico['status_label']; ?>
                        </span>
                    </div>
                </div>

                <div class="servico-banner-info">
                    <div class="servico-banner-header">
                        <div class="servico-banner-categoria">
                            <div class="categoria-icon" style="background: <?php echo $servico['categoria_color']; ?>20; color: <?php echo $servico['categoria_color']; ?>;">
                                <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                            </div>
                            <div class="categoria-info">
                                <span class="categoria-nome"><?php echo $servico['categoria']; ?></span>
                                <span class="servico-codigo"><?php echo $servico['codigo']; ?></span>
                            </div>
                        </div>
                        <div class="servico-banner-acoes">
                            <a href="servico-editar.php?id=<?php echo $servico['id']; ?>" class="btn btn-sm btn-outline">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="confirmarExclusao(event, '<?php echo addslashes($servico['nome']); ?>', <?php echo $servico['id']; ?>)">
                                <i class="fas fa-trash"></i> Excluir
                            </a>
                        </div>
                    </div>
                    <p class="servico-banner-resumo"><?php echo $servico['resumo']; ?></p>
                </div>
            </section>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($servico['preco_base']); ?></div>
                    <div class="label">Preço Base</div>
                    <div class="stat-info"><?php echo $servico['unidade']; ?></div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="value"><?php echo number_format($servico['visualizacoes']); ?></div>
                    <div class="label">Visualizações</div>
                    <div class="stat-info">Total acumulado</div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="value"><?php echo $servico['contratacoes']; ?></div>
                    <div class="label">Contratações</div>
                    <div class="stat-info">Clientes satisfeitos</div>
                </div>

                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="value"><?php echo $servico['avaliacao']; ?></div>
                    <div class="label">Avaliação Média</div>
                    <div class="stat-info"><?php echo $servico['total_avaliacoes']; ?> avaliações</div>
                </div>
            </section>

            <!-- ===== CONTEÚDO PRINCIPAL ===== -->
            <div class="detalhe-grid">
                <!-- ========================================== -->
                <!-- COLUNA PRINCIPAL                           -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-principal">

                    <!-- ===== DESCRIÇÃO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.15s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-align-left" style="color: <?php echo $servico['categoria_color']; ?>;"></i>
                                Descrição do Serviço
                            </h3>
                        </div>
                        <div class="card-body">
                            <p class="descricao-completa"><?php echo nl2br($servico['descricao']); ?></p>
                            
                            <?php if (!empty($servico['observacoes'])): ?>
                                <div class="observacoes-box">
                                    <i class="fas fa-info-circle"></i>
                                    <div>
                                        <strong>Observações</strong>
                                        <p><?php echo $servico['observacoes']; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- ===== GALERIA DE IMAGENS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-images" style="color: #6C2BD9;"></i>
                                Galeria de Imagens
                                <span class="badge-count"><?php echo count($servico['galeria']); ?></span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="galeria-grid">
                                <?php foreach ($servico['galeria'] as $index => $imagem): ?>
                                    <div class="galeria-grid-item" onclick="abrirImagem(<?php echo $index; ?>)">
                                        <div class="galeria-grid-placeholder" style="background: <?php echo $servico['categoria_color']; ?>15; color: <?php echo $servico['categoria_color']; ?>;">
                                            <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                        </div>
                                        <div class="galeria-grid-overlay">
                                            <i class="fas fa-expand"></i>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- ===== ENTREGÁVEIS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.25s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-list-check" style="color: #00FFA3;"></i>
                                O que está incluído
                                <span class="badge-count"><?php echo count($servico['entregaveis']); ?></span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="entregaveis-lista">
                                <?php foreach ($servico['entregaveis'] as $entregavel): ?>
                                    <div class="entregavel-item">
                                        <div class="entregavel-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <span><?php echo $entregavel; ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- ===== REQUISITOS ===== -->
                    <?php if (!empty($servico['requisitos'])): ?>
                        <div class="card animate-fade-up" style="animation-delay: 0.3s;">
                            <div class="card-header">
                                <h3>
                                    <i class="fas fa-clipboard-list" style="color: #FFD93D;"></i>
                                    Requisitos do Cliente
                                    <span class="badge-count"><?php echo count($servico['requisitos']); ?></span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="requisitos-lista">
                                    <?php foreach ($servico['requisitos'] as $requisito): ?>
                                        <div class="requisito-item">
                                            <div class="requisito-icon">
                                                <i class="fas fa-info-circle"></i>
                                            </div>
                                            <span><?php echo $requisito; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- ===== AVALIAÇÕES ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-star" style="color: #FFD93D;"></i>
                                Avaliações dos Clientes
                                <span class="badge-count"><?php echo count($avaliacoes_clientes); ?></span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- Resumo de Avaliações -->
                            <div class="avaliacoes-resumo">
                                <div class="avaliacoes-resumo-nota">
                                    <span class="avaliacoes-nota-grande"><?php echo $servico['avaliacao']; ?></span>
                                    <div class="avaliacoes-estrelas-grande">
                                        <?php echo renderEstrelas($servico['avaliacao']); ?>
                                    </div>
                                    <span class="avaliacoes-total"><?php echo $servico['total_avaliacoes']; ?> avaliações</span>
                                </div>
                                <div class="avaliacoes-distribuicao">
                                    <?php for ($nota = 5; $nota >= 1; $nota--): 
                                        $percentual = $total_avaliacoes_reais > 0 ? ($distribuicao[$nota] / $total_avaliacoes_reais) * 100 : 0;
                                    ?>
                                        <div class="distribuicao-item">
                                            <span class="distribuicao-nota"><?php echo $nota; ?> <i class="fas fa-star"></i></span>
                                            <div class="distribuicao-barra">
                                                <div class="distribuicao-fill" style="width: <?php echo $percentual; ?>%;"></div>
                                            </div>
                                            <span class="distribuicao-count"><?php echo $distribuicao[$nota]; ?></span>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>

                            <!-- Lista de Avaliações -->
                            <div class="avaliacoes-lista">
                                <?php foreach ($avaliacoes_clientes as $avaliacao): ?>
                                    <div class="avaliacao-item">
                                        <div class="avaliacao-avatar">
                                            <img src="../../../assets/images/<?php echo $avaliacao['avatar']; ?>"
                                                 alt="<?php echo $avaliacao['cliente']; ?>"
                                                 onerror="this.src='<?php echo getAvatarUrl($avaliacao['cliente']); ?>'">
                                        </div>
                                        <div class="avaliacao-conteudo">
                                            <div class="avaliacao-header">
                                                <div>
                                                    <span class="avaliacao-cliente"><?php echo $avaliacao['cliente']; ?></span>
                                                    <span class="avaliacao-tipo"><?php echo $avaliacao['cliente_tipo']; ?></span>
                                                </div>
                                                <span class="avaliacao-data"><?php echo timeAgo($avaliacao['data']); ?></span>
                                            </div>
                                            <div class="avaliacao-estrelas">
                                                <?php echo renderEstrelas($avaliacao['nota']); ?>
                                            </div>
                                            <p class="avaliacao-comentario"><?php echo $avaliacao['comentario']; ?></p>
                                            <div class="avaliacao-footer">
                                                <button class="avaliacao-util" onclick="marcarUtil(<?php echo $avaliacao['id']; ?>)">
                                                    <i class="fas fa-thumbs-up"></i>
                                                    Útil (<?php echo $avaliacao['util']; ?>)
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- COLUNA LATERAL                             -->
                <!-- ========================================== -->
                <div class="detalhe-coluna-lateral">

                    <!-- ===== CARD DE PREÇO ===== -->
                    <div class="card card-preco animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="card-preco-header">
                            <span class="card-preco-label">Preço Base</span>
                            <span class="card-preco-valor">Kz <?php echo formatMoney($servico['preco_base']); ?></span>
                            <span class="card-preco-unidade"><?php echo $servico['unidade']; ?></span>
                        </div>
                        <div class="card-preco-body">
                            <div class="preco-info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <span class="preco-info-label">Duração Estimada</span>
                                    <span class="preco-info-valor"><?php echo $servico['duracao']; ?></span>
                                </div>
                            </div>
                            <div class="preco-info-item">
                                <i class="fas fa-calendar-check"></i>
                                <div>
                                    <span class="preco-info-label">Prazo Mínimo</span>
                                    <span class="preco-info-valor"><?php echo $servico['prazo_minimo']; ?> dias</span>
                                </div>
                            </div>
                            <div class="preco-info-item">
                                <i class="fas fa-credit-card"></i>
                                <div>
                                    <span class="preco-info-label">Condições de Pagamento</span>
                                    <span class="preco-info-valor"><?php echo $servico['condicoes_pagamento_label']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-preco-actions">
                            <button class="btn btn-primary btn-block" onclick="contactarCliente()">
                                <i class="fas fa-handshake"></i> Solicitar Serviço
                            </button>
                            <button class="btn btn-outline btn-block" onclick="partilharServico()">
                                <i class="fas fa-share-alt"></i> Partilhar
                            </button>
                        </div>
                    </div>

                    <!-- ===== CARD DE DISPONIBILIDADE ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.25s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-toggle-on" style="color: #00FFA3;"></i>
                                Disponibilidade
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="disponibilidade-box">
                                <div class="disponibilidade-status disponibilidade-<?php echo $servico['disponibilidade']; ?>">
                                    <i class="fas fa-circle"></i>
                                    <span><?php echo $servico['disponibilidade_label']; ?></span>
                                </div>
                                <p class="disponibilidade-info">
                                    <i class="fas fa-info-circle"></i>
                                    Este serviço está <?php echo strtolower($servico['disponibilidade_label']); ?> para contratação imediata.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD DE ESTATÍSTICAS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.3s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-chart-line" style="color: #00D2FF;"></i>
                                Estatísticas
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="estatistica-item">
                                <span class="estatistica-label">Visualizações</span>
                                <span class="estatistica-valor"><?php echo number_format($servico['visualizacoes']); ?></span>
                            </div>
                            <div class="estatistica-item">
                                <span class="estatistica-label">Contratações</span>
                                <span class="estatistica-valor"><?php echo $servico['contratacoes']; ?></span>
                            </div>
                            <div class="estatistica-item">
                                <span class="estatistica-label">Taxa de Conversão</span>
                                <span class="estatistica-valor"><?php echo round(($servico['contratacoes'] / $servico['visualizacoes']) * 100, 1); ?>%</span>
                            </div>
                            <div class="estatistica-item">
                                <span class="estatistica-label">Criado em</span>
                                <span class="estatistica-valor"><?php echo formatDate($servico['data_criacao']); ?></span>
                            </div>
                            <div class="estatistica-item">
                                <span class="estatistica-label">Atualizado em</span>
                                <span class="estatistica-valor"><?php echo timeAgo($servico['data_atualizacao']); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD DE AÇÕES ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                                Ações Rápidas
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="acoes-lista">
                                <a href="servico-editar.php?id=<?php echo $servico['id']; ?>" class="acao-item">
                                    <div class="acao-icon" style="background: rgba(0, 210, 255, 0.1); color: #00D2FF;">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <span>Editar Serviço</span>
                                </a>
                                <button class="acao-item" onclick="duplicarServico()">
                                    <div class="acao-icon" style="background: rgba(0, 255, 163, 0.1); color: #00FFA3;">
                                        <i class="fas fa-copy"></i>
                                    </div>
                                    <span>Duplicar Serviço</span>
                                </button>
                                <button class="acao-item" onclick="alterarStatus()">
                                    <div class="acao-icon" style="background: rgba(255, 217, 61, 0.1); color: #FFD93D;">
                                        <i class="fas fa-toggle-on"></i>
                                    </div>
                                    <span>Ativar / Desativar</span>
                                </button>
                                <button class="acao-item" onclick="verPrecos()">
                                    <div class="acao-icon" style="background: rgba(108, 43, 217, 0.1); color: #6C2BD9;">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <span>Ver Tabela de Preços</span>
                                </button>
                                <button class="acao-item acao-item-danger" onclick="confirmarExclusao(event, '<?php echo addslashes($servico['nome']); ?>', <?php echo $servico['id']; ?>)">
                                    <div class="acao-icon" style="background: rgba(255, 107, 107, 0.1); color: #FF6B6B;">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                    <span>Excluir Serviço</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== SERVIÇOS RELACIONADOS ===== -->
            <section class="servicos-relacionados animate-fade-up" style="animation-delay: 0.4s;">
                <div class="section-header">
                    <h3>
                        <i class="fas fa-link" style="color: <?php echo $servico['categoria_color']; ?>;"></i>
                        Serviços Relacionados
                    </h3>
                    <a href="index.php" class="btn btn-sm btn-outline">Ver Todos</a>
                </div>
                <div class="servicos-relacionados-grid">
                    <?php foreach ($servicos_relacionados as $rel): ?>
                        <a href="servico-detalhe.php?id=<?php echo $rel['id']; ?>" 
                           class="servico-relacionado-card"
                           style="--cat-color: <?php echo $rel['categoria_color']; ?>;">
                            <div class="servico-relacionado-icon" style="background: <?php echo $rel['categoria_color']; ?>20; color: <?php echo $rel['categoria_color']; ?>;">
                                <i class="fas <?php echo $rel['categoria_icon']; ?>"></i>
                            </div>
                            <div class="servico-relacionado-info">
                                <span class="servico-relacionado-categoria"><?php echo $rel['categoria']; ?></span>
                                <h4 class="servico-relacionado-nome"><?php echo $rel['nome']; ?></h4>
                                <div class="servico-relacionado-footer">
                                    <span class="servico-relacionado-preco">Kz <?php echo formatMoney($rel['preco_base']); ?></span>
                                    <span class="servico-relacionado-avaliacao">
                                        <i class="fas fa-star"></i> <?php echo $rel['avaliacao']; ?>
                                    </span>
                                </div>
                            </div>
                            <i class="fas fa-arrow-right servico-relacionado-arrow"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- LIGHTBOX DE IMAGENS                        -->
    <!-- ========================================== -->
    <div class="lightbox" id="lightbox" onclick="fecharLightbox()">
        <button class="lightbox-close" onclick="fecharLightbox()">
            <i class="fas fa-times"></i>
        </button>
        <button class="lightbox-nav lightbox-prev" onclick="event.stopPropagation(); navegarLightbox(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>
        <div class="lightbox-content" onclick="event.stopPropagation();">
            <div class="lightbox-imagem">
                <div class="lightbox-placeholder" style="background: <?php echo $servico['categoria_color']; ?>15; color: <?php echo $servico['categoria_color']; ?>;">
                    <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                    <span id="lightboxContador">1 / <?php echo count($servico['galeria']); ?></span>
                </div>
            </div>
        </div>
        <button class="lightbox-nav lightbox-next" onclick="event.stopPropagation(); navegarLightbox(1)">
            <i class="fas fa-chevron-right"></i>
        </button>
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
                        <span>O serviço e todos os seus dados serão permanentemente excluídos.</span>
                    </div>
                </div>
                <p class="modal-texto">Tem certeza que deseja excluir o serviço</p>
                <p class="modal-projeto-nome" id="modalServicoNome">-</p>
                <p class="modal-texto-small">Ao excluir, os seguintes dados serão removidos:</p>
                <ul class="modal-lista-danger">
                    <li><i class="fas fa-times-circle"></i> Todas as informações do serviço</li>
                    <li><i class="fas fa-times-circle"></i> Histórico de contratações</li>
                    <li><i class="fas fa-times-circle"></i> Avaliações e comentários</li>
                    <li><i class="fas fa-times-circle"></i> Vínculos com projetos</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModalExcluir()">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <a href="servico-excluir.php?id=<?php echo $servico['id']; ?>" class="btn btn-danger" id="modalBtnExcluir">
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
        // LIGHTBOX
        // ============================================
        let lightboxIndex = 0;
        const totalImagens = <?php echo count($servico['galeria']); ?>;

        function abrirImagem(index) {
            lightboxIndex = index;
            atualizarLightbox();
            document.getElementById('lightbox').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = '';
        }

        function navegarLightbox(direcao) {
            lightboxIndex += direcao;
            if (lightboxIndex < 0) lightboxIndex = totalImagens - 1;
            if (lightboxIndex >= totalImagens) lightboxIndex = 0;
            atualizarLightbox();
        }

        function atualizarLightbox() {
            const contador = document.getElementById('lightboxContador');
            if (contador) {
                contador.textContent = (lightboxIndex + 1) + ' / ' + totalImagens;
            }
        }

        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (!lightbox || !lightbox.classList.contains('active')) return;
            
            if (e.key === 'Escape') fecharLightbox();
            if (e.key === 'ArrowLeft') navegarLightbox(-1);
            if (e.key === 'ArrowRight') navegarLightbox(1);
        });

        // ============================================
        // AÇÕES DO SERVIÇO
        // ============================================
        function contactarCliente() {
            mostrarToast('A abrir formulário de contacto...', 'info');
        }

        function partilharServico() {
            if (navigator.share) {
                navigator.share({
                    title: '<?php echo addslashes($servico['nome']); ?>',
                    text: '<?php echo addslashes($servico['resumo']); ?>',
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(window.location.href);
                mostrarToast('Link copiado para a área de transferência!', 'success');
            }
        }

        function duplicarServico() {
            if (confirm('Deseja duplicar este serviço?')) {
                mostrarToast('Serviço duplicado com sucesso!', 'success');
            }
        }

        function alterarStatus() {
            const novosStatus = ['ativo', 'inativo', 'pausado'];
            const statusAtual = '<?php echo $servico['status']; ?>';
            const proximoIndex = (novosStatus.indexOf(statusAtual) + 1) % novosStatus.length;
            const proximoStatus = novosStatus[proximoIndex];
            
            mostrarToast('Serviço alterado para: ' + proximoStatus, 'info');
        }

        function verPrecos() {
            mostrarToast('A abrir tabela de preços...', 'info');
        }

        function marcarUtil(id) {
            mostrarToast('Obrigado pelo seu feedback!', 'success');
        }

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, nomeServico, servicoId) {
            event.preventDefault();
            
            const modal = document.getElementById('modalExcluir');
            const btnExcluir = document.getElementById('modalBtnExcluir');
            
            document.getElementById('modalServicoNome').textContent = '"' + nomeServico + '"';
            btnExcluir.href = 'servico-excluir.php?id=' + servicoId;
            
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

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModalExcluir();
            }
        });
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
            background: linear-gradient(180deg, #00FFA3 0%, #00D2FF 100%);
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

        .servico-icon-header {
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

        .header-left .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: var(--transition-smooth); }
        .header-left .breadcrumb a:hover { color: #00FFA3; }
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

        .btn-theme:hover { border-color: #00FFA3; color: #00FFA3; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* BANNER DE CAPA                             */
        /* ========================================== */
        .servico-banner {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            margin-bottom: var(--space-lg);
            position: relative;
        }

        .servico-banner-imagem {
            position: relative;
            height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .servico-banner-placeholder {
            font-size: 120px;
            color: var(--cat-color);
            opacity: 0.15;
            transition: var(--transition-smooth);
        }

        .servico-banner:hover .servico-banner-placeholder {
            transform: scale(1.05);
            opacity: 0.2;
        }

        .servico-banner-badges {
            position: absolute;
            top: var(--space-md);
            left: var(--space-md);
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            z-index: 2;
        }

        .badge-capa {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            backdrop-filter: blur(10px);
        }

        .badge-destaque {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.4);
        }

        .badge-popular {
            background: linear-gradient(135deg, #FF6B6B 0%, #E55555 100%);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
        }

        .badge-urgente {
            background: linear-gradient(135deg, #FF9F43 0%, #E67E22 100%);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(255, 159, 67, 0.4);
        }

        .servico-banner-status {
            position: absolute;
            top: var(--space-md);
            right: var(--space-md);
            z-index: 2;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
            backdrop-filter: blur(10px);
        }

        .badge-status i { font-size: 6px; animation: pulse 2s ease-in-out infinite; }

        .badge-status.status-ativo { background: rgba(0, 255, 163, 0.95); color: #0A1628; }
        .badge-status.status-inativo { background: rgba(255, 107, 107, 0.95); color: #FFFFFF; }
        .badge-status.status-pausado { background: rgba(255, 217, 61, 0.95); color: #0A1628; }

        .servico-banner-info {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .servico-banner-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .servico-banner-categoria {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .categoria-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .categoria-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .categoria-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .servico-codigo {
            font-family: var(--font-display);
            font-size: 11px;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        .servico-banner-acoes {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .servico-banner-resumo {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
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

        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .stat-card .icon.aurora { background: rgba(108, 43, 217, 0.15); color: #6C2BD9; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .stat-info {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* DETALHE GRID                               */
        /* ========================================== */
        .detalhe-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: var(--space-lg);
            margin-bottom: var(--space-lg);
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

        .card-body {
            padding: var(--space-lg);
        }

        /* ========================================== */
        /* DESCRIÇÃO                                  */
        /* ========================================== */
        .descricao-completa {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.8;
            margin: 0;
        }

        .observacoes-box {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(0, 210, 255, 0.06);
            border: 1px solid rgba(0, 210, 255, 0.2);
            border-radius: var(--radius-md);
            margin-top: var(--space-lg);
        }

        .observacoes-box i {
            font-size: 20px;
            color: #00D2FF;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .observacoes-box strong {
            display: block;
            font-size: var(--text-sm);
            color: #00D2FF;
            margin-bottom: 4px;
        }

        .observacoes-box p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
        }

        /* ========================================== */
        /* GALERIA                                    */
        /* ========================================== */
        .galeria-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: var(--space-sm);
        }

        .galeria-grid-item {
            position: relative;
            aspect-ratio: 1;
            border-radius: var(--radius-md);
            overflow: hidden;
            cursor: pointer;
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .galeria-grid-item:hover {
            transform: scale(1.03);
            border-color: #00FFA3;
            box-shadow: 0 10px 30px rgba(0, 255, 163, 0.2);
        }

        .galeria-grid-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
        }

        .galeria-grid-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .galeria-grid-item:hover .galeria-grid-overlay {
            opacity: 1;
        }

        /* ========================================== */
        /* ENTREGÁVEIS E REQUISITOS                   */
        /* ========================================== */
        .entregaveis-lista,
        .requisitos-lista {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: var(--space-sm);
        }

        .entregavel-item,
        .requisito-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .entregavel-item:hover,
        .requisito-item:hover {
            border-color: #00FFA3;
            background: var(--bg-card-hover);
        }

        .entregavel-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .requisito-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .entregavel-item span,
        .requisito-item span {
            font-size: var(--text-sm);
            color: var(--text-primary);
            line-height: 1.4;
        }

        /* ========================================== */
        /* AVALIAÇÕES                                 */
        /* ========================================== */
        .avaliacoes-resumo {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: var(--space-lg);
            padding: var(--space-lg);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-lg);
        }

        .avaliacoes-resumo-nota {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            padding-right: var(--space-lg);
            border-right: 1px solid var(--border-color);
        }

        .avaliacoes-nota-grande {
            font-family: var(--font-display);
            font-size: 56px;
            font-weight: 700;
            color: #FFD93D;
            line-height: 1;
        }

        .avaliacoes-estrelas-grande {
            display: flex;
            gap: 3px;
            font-size: 16px;
            color: #FFD93D;
        }

        .avaliacoes-total {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .avaliacoes-distribuicao {
            display: flex;
            flex-direction: column;
            gap: 6px;
            justify-content: center;
        }

        .distribuicao-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .distribuicao-nota {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            min-width: 40px;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .distribuicao-nota i {
            color: #FFD93D;
            font-size: 10px;
        }

        .distribuicao-barra {
            flex: 1;
            height: 6px;
            background: var(--bg-card);
            border-radius: 3px;
            overflow: hidden;
        }

        .distribuicao-fill {
            height: 100%;
            background: linear-gradient(90deg, #FFD93D 0%, #FF9F43 100%);
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        .distribuicao-count {
            font-size: var(--text-xs);
            color: var(--text-muted);
            min-width: 24px;
            text-align: right;
        }

        .avaliacoes-lista {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .avaliacao-item {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .avaliacao-item:hover {
            border-color: #00FFA3;
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

        .avaliacao-conteudo {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .avaliacao-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .avaliacao-cliente {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            display: block;
        }

        .avaliacao-tipo {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .avaliacao-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .avaliacao-estrelas {
            display: flex;
            gap: 2px;
            font-size: 12px;
            color: #FFD93D;
        }

        .avaliacao-comentario {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

        .avaliacao-footer {
            display: flex;
            gap: var(--space-sm);
        }

        .avaliacao-util {
            background: none;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            padding: 4px 12px;
            color: var(--text-muted);
            font-family: var(--font-body);
            font-size: var(--text-xs);
            cursor: pointer;
            transition: var(--transition-smooth);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .avaliacao-util:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
        }

        /* ========================================== */
        /* CARD DE PREÇO                              */
        /* ========================================== */
        .card-preco {
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.06) 0%, rgba(0, 210, 255, 0.06) 100%);
            border: 2px solid rgba(0, 255, 163, 0.2);
        }

        .card-preco-header {
            padding: var(--space-lg);
            text-align: center;
            border-bottom: 1px solid rgba(0, 255, 163, 0.15);
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .card-preco-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .card-preco-valor {
            font-family: var(--font-display);
            font-size: 32px;
            font-weight: 700;
            color: #00FFA3;
            line-height: 1;
        }

        .card-preco-unidade {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .card-preco-body {
            padding: var(--space-md) var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .preco-info-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
        }

        .preco-info-item i {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            flex-shrink: 0;
        }

        .preco-info-item div {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .preco-info-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .preco-info-valor {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .card-preco-actions {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            border-top: 1px solid rgba(0, 255, 163, 0.15);
        }

        .btn-block {
            width: 100%;
            justify-content: center;
        }

        /* ========================================== */
        /* DISPONIBILIDADE                            */
        /* ========================================== */
        .disponibilidade-box {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .disponibilidade-status {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            border-radius: var(--radius-md);
            font-size: var(--text-sm);
            font-weight: 600;
        }

        .disponibilidade-status i {
            font-size: 8px;
            animation: pulse 2s ease-in-out infinite;
        }

        .disponibilidade-disponivel {
            background: rgba(0, 255, 163, 0.1);
            color: #00FFA3;
            border: 1px solid rgba(0, 255, 163, 0.2);
        }

        .disponibilidade-agendado {
            background: rgba(255, 217, 61, 0.1);
            color: #FFD93D;
            border: 1px solid rgba(255, 217, 61, 0.2);
        }

        .disponibilidade-indisponivel {
            background: rgba(255, 107, 107, 0.1);
            color: #FF6B6B;
            border: 1px solid rgba(255, 107, 107, 0.2);
        }

        .disponibilidade-info {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 6px;
        }

        .disponibilidade-info i {
            color: #00D2FF;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* ========================================== */
        /* ESTATÍSTICAS                               */
        /* ========================================== */
        .estatistica-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) 0;
            border-bottom: 1px solid var(--border-color);
            gap: var(--space-sm);
        }

        .estatistica-item:last-child {
            border-bottom: none;
        }

        .estatistica-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .estatistica-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        /* ========================================== */
        /* AÇÕES RÁPIDAS                              */
        /* ========================================== */
        .acoes-lista {
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
        /* SERVIÇOS RELACIONADOS                      */
        /* ========================================== */
        .servicos-relacionados {
            margin-top: var(--space-lg);
        }

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
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .servicos-relacionados-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: var(--space-md);
        }

        .servico-relacionado-card {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            text-decoration: none;
            transition: var(--transition-smooth);
            position: relative;
            overflow: hidden;
        }

        .servico-relacionado-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--cat-color);
        }

        .servico-relacionado-card:hover {
            border-color: var(--cat-color);
            background: var(--bg-card-hover);
            transform: translateX(4px);
            box-shadow: var(--glass-shadow);
        }

        .servico-relacionado-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .servico-relacionado-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .servico-relacionado-categoria {
            font-size: 10px;
            font-weight: 600;
            color: var(--cat-color);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .servico-relacionado-nome {
            font-family: var(--font-title);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .servico-relacionado-footer {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .servico-relacionado-preco {
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 700;
            color: #00FFA3;
        }

        .servico-relacionado-avaliacao {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            display: inline-flex;
            align-items: center;
            gap: 3px;
        }

        .servico-relacionado-avaliacao i {
            color: #FFD93D;
            font-size: 10px;
        }

        .servico-relacionado-arrow {
            color: var(--cat-color);
            font-size: 12px;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .servico-relacionado-card:hover .servico-relacionado-arrow {
            transform: translateX(4px);
        }

        /* ========================================== */
        /* LIGHTBOX                                   */
        /* ========================================== */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 999999;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: #FFFFFF;
            border: none;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
            z-index: 2;
        }

        .lightbox-close:hover {
            background: rgba(255, 107, 107, 0.9);
            transform: rotate(90deg);
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: #FFFFFF;
            border: none;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
            z-index: 2;
        }

        .lightbox-nav:hover {
            background: rgba(0, 255, 163, 0.9);
            color: #0A1628;
        }

        .lightbox-prev { left: 20px; }
        .lightbox-next { right: 20px; }

        .lightbox-content {
            max-width: 90%;
            max-height: 90%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-imagem {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-placeholder {
            width: 600px;
            height: 400px;
            border-radius: var(--radius-lg);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: var(--space-md);
            font-size: 100px;
        }

        .lightbox-placeholder span {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            opacity: 0.9;
        }

        /* ========================================== */
        /* MODAL DE EXCLUSÃO                          */
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
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 107, 107, 0.3);
            z-index: 10;
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
            color: #FF6B6B;
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
            color: #FF6B6B;
            text-align: center;
            margin: 0 0 var(--space-lg) 0;
            padding: var(--space-md);
            background: rgba(255, 107, 107, 0.08);
            border-radius: var(--radius-md);
            border: 2px dashed rgba(255, 107, 107, 0.4);
        }

        .modal-texto-small {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin: var(--space-md) 0 var(--space-sm) 0;
        }

        .modal-lista-danger {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .modal-lista-danger li {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            padding: 6px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-sm);
        }

        .modal-lista-danger li i { color: #FF6B6B; font-size: 12px; }

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
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .detalhe-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .servicos-relacionados-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .servico-banner-header { flex-direction: column; align-items: flex-start; }
            .avaliacoes-resumo { grid-template-columns: 1fr; }
            .avaliacoes-resumo-nota { padding-right: 0; padding-bottom: var(--space-lg); border-right: none; border-bottom: 1px solid var(--border-color); }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h4); }

            .servico-banner-imagem { height: 220px; }
            .servico-banner-placeholder { font-size: 80px; }

            .entregaveis-lista,
            .requisitos-lista { grid-template-columns: 1fr; }

            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            .header-left h1 .servico-icon-header { width: 40px; height: 40px; font-size: 16px; }

            .galeria-grid { grid-template-columns: repeat(auto-fill, minmax(110px, 1fr)); }

            .servico-banner-acoes { width: 100%; }
            .servico-banner-acoes .btn { flex: 1; justify-content: center; }

            .lightbox-nav { width: 44px; height: 44px; font-size: 16px; }
            .lightbox-placeholder { width: 90vw; height: 60vh; font-size: 60px; }

            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .servico-banner-imagem { height: 180px; }
            .servico-banner-placeholder { font-size: 60px; }
            .card-body { padding: var(--space-md); }
            .card-header { padding: var(--space-md); }
            .avaliacao-item { flex-direction: column; }
            .avaliacao-avatar { align-self: center; }
            .lightbox-prev { left: 10px; }
            .lightbox-next { right: 10px; }
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

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>