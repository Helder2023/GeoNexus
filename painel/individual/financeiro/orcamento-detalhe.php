<?php
// painel/individual/financeiro/orcamento-detalhe.php - Detalhes do Orçamento
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Detalhes do Orçamento';
$pagina_atual = 'orcamentos';

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($total_orcamentos)) $total_orcamentos = 24;

// ============================================
// OBTER ID DO ORÇAMENTO
// ============================================
$id_orcamento = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ============================================
// DADOS MOCKADOS - ORÇAMENTO ATUAL
// ============================================
$orcamento = [
    'id' => $id_orcamento,
    'codigo' => 'ORC-2026-0001',
    'titulo' => 'Levantamento Topográfico - Zona Norte',
    'descricao' => 'Levantamento topográfico completo da zona norte de Luanda, incluindo 50 hectares de terreno urbano com curvas de nível, pontos georreferenciados e plantas em escala 1:1000. O projeto inclui a geração de plantas topográficas com curvas de nível a cada metro, segundo o sistema WGS84, e processamento de dados GNSS com pós-processamento para garantir precisão milimétrica.',
    'cliente' => [
        'id' => 1,
        'nome' => 'Construtora ABC',
        'tipo' => 'Empresa',
        'avatar' => 'empresa-1.png',
        'email' => 'contato@construtoraabc.ao',
        'telefone' => '+244 222 345 678',
        'nif' => '5417896321',
        'endereco' => 'Rua Amílcar Cabral, 123 - Luanda, Angola',
        'responsavel' => 'Eng. João Silva'
    ],
    'categoria' => 'Topografia',
    'categoria_icon' => 'fa-mountain',
    'categoria_color' => '#6C2BD9',
    'status' => 'aprovado',
    'status_label' => 'Aprovado',
    'valor_total' => 350000,
    'valor_desconto' => 0,
    'valor_final' => 350000,
    'validade' => '2026-03-15',
    'data_criacao' => '2026-02-10 10:30:00',
    'data_envio' => '2026-02-10 11:00:00',
    'data_resposta' => '2026-02-12 14:20:00',
    'data_aprovacao' => '2026-02-12 14:20:00',
    'prazo_execucao' => '30 dias',
    'condicoes_pagamento' => '50% Adiantado / 50% na Entrega',
    'metodo_pagamento' => 'Transferência Bancária',
    'observacoes' => 'Cliente com bom histórico de pagamentos. Projeto de grande importância estratégica.',
    'validade_proposta' => '30 dias',
    'local_execucao' => 'Luanda - Zona Norte',
    'responsavel_tecnico' => 'Carlos Mendes',
    'itens' => [
        [
            'id' => 1,
            'descricao' => 'Reconhecimento do terreno e planeamento de campo',
            'quantidade' => 1,
            'unidade' => 'serviço',
            'preco_unitario' => 45000,
            'subtotal' => 45000
        ],
        [
            'id' => 2,
            'descricao' => 'Implantação de marcos topográficos (50 hectares)',
            'quantidade' => 50,
            'unidade' => 'hectare',
            'preco_unitario' => 1200,
            'subtotal' => 60000
        ],
        [
            'id' => 3,
            'descricao' => 'Levantamento topográfico de pontos georreferenciados',
            'quantidade' => 500,
            'unidade' => 'ponto',
            'preco_unitario' => 180,
            'subtotal' => 90000
        ],
        [
            'id' => 4,
            'descricao' => 'Processamento de dados GNSS com pós-processamento',
            'quantidade' => 1,
            'unidade' => 'serviço',
            'preco_unitario' => 65000,
            'subtotal' => 65000
        ],
        [
            'id' => 5,
            'descricao' => 'Geração de plantas topográficas em escala 1:1000',
            'quantidade' => 5,
            'unidade' => 'planta',
            'preco_unitario' => 18000,
            'subtotal' => 90000
        ]
    ],
    'timeline' => [
        [
            'id' => 1,
            'acao' => 'Orçamento criado',
            'usuario' => 'Carlos Mendes',
            'data' => '2026-02-10 10:30:00',
            'icon' => 'fa-plus-circle',
            'color' => '#00D2FF',
            'detalhes' => 'Orçamento registado no sistema'
        ],
        [
            'id' => 2,
            'acao' => 'Orçamento enviado ao cliente',
            'usuario' => 'Carlos Mendes',
            'data' => '2026-02-10 11:00:00',
            'icon' => 'fa-paper-plane',
            'color' => '#6C2BD9',
            'detalhes' => 'Enviado por email para contato@construtoraabc.ao'
        ],
        [
            'id' => 3,
            'acao' => 'Cliente visualizou o orçamento',
            'usuario' => 'Sistema',
            'data' => '2026-02-10 15:45:00',
            'icon' => 'fa-eye',
            'color' => '#FFD93D',
            'detalhes' => 'Primeira visualização pelo cliente'
        ],
        [
            'id' => 4,
            'acao' => 'Cliente solicitou ajustes',
            'usuario' => 'Construtora ABC',
            'data' => '2026-02-11 09:30:00',
            'icon' => 'fa-edit',
            'color' => '#FF9F43',
            'detalhes' => 'Solicitado ajuste no prazo de execução'
        ],
        [
            'id' => 5,
            'acao' => 'Orçamento atualizado',
            'usuario' => 'Carlos Mendes',
            'data' => '2026-02-11 10:15:00',
            'icon' => 'fa-sync',
            'color' => '#00D2FF',
            'detalhes' => 'Prazo ajustado para 30 dias'
        ],
        [
            'id' => 6,
            'acao' => 'Orçamento aprovado',
            'usuario' => 'Construtora ABC',
            'data' => '2026-02-12 14:20:00',
            'icon' => 'fa-check-circle',
            'color' => '#00FFA3',
            'detalhes' => 'Cliente aprovou o orçamento sem alterações'
        ]
    ]
];

// ============================================
// CALCULAR DIAS PARA VALIDADE
// ============================================
$hoje = new DateTime();
$validade = new DateTime($orcamento['validade']);
$dias_validade = $hoje->diff($validade);
$validade_vencida = $validade < $hoje;

if ($validade_vencida) {
    $validade_info = ['texto' => 'Expirado há ' . $dias_validade->days . ' dias', 'class' => 'expirado'];
} elseif ($dias_validade->days <= 7) {
    $validade_info = ['texto' => 'Expira em ' . $dias_validade->days . ' dias', 'class' => 'urgente'];
} else {
    $validade_info = ['texto' => 'Válido por ' . $dias_validade->days . ' dias', 'class' => 'normal'];
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
        if ($diff < 60) return 'há ' . $diff . 's';
        if ($diff < 3600) return 'há ' . floor($diff / 60) . 'min';
        if ($diff < 86400) return 'há ' . floor($diff / 3600) . 'h';
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
            'aprovado' => 'status-aprovado',
            'pendente' => 'status-pendente',
            'rascunho' => 'status-rascunho',
            'rejeitado' => 'status-rejeitado',
            'expirado' => 'status-expirado',
            'cancelado' => 'status-cancelado'
        ];
        return isset($classes[$status]) ? $classes[$status] : 'status-pendente';
    }
}

if (!function_exists('getStatusIcon')) {
    function getStatusIcon($status) {
        $icons = [
            'aprovado' => 'fa-check-circle',
            'pendente' => 'fa-clock',
            'rascunho' => 'fa-pencil-alt',
            'rejeitado' => 'fa-times-circle',
            'expirado' => 'fa-hourglass-end',
            'cancelado' => 'fa-ban'
        ];
        return isset($icons[$status]) ? $icons[$status] : 'fa-clock';
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
                        <i class="fas fa-file-signature icon" style="color: #6C2BD9;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status <?php echo getStatusClass($orcamento['status']); ?>">
                            <i class="fas <?php echo getStatusIcon($orcamento['status']); ?>"></i>
                            <?php echo $orcamento['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="orcamentos.php">Orçamentos</a>
                        <span class="separator">/</span>
                        <span><?php echo $orcamento['codigo']; ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="orcamentos.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== ORÇAMENTO HEADER ===== -->
            <section class="orcamento-header animate-fade-up">
                <div class="orcamento-header-main">
                    <div class="orcamento-header-badges">
                        <span class="badge-categoria" style="background: <?php echo $orcamento['categoria_color']; ?>15; color: <?php echo $orcamento['categoria_color']; ?>; border-color: <?php echo $orcamento['categoria_color']; ?>30;">
                            <i class="fas <?php echo $orcamento['categoria_icon']; ?>"></i>
                            <?php echo $orcamento['categoria']; ?>
                        </span>
                        <span class="badge-codigo">
                            <i class="fas fa-hashtag"></i>
                            <?php echo $orcamento['codigo']; ?>
                        </span>
                        <span class="badge-validade <?php echo $validade_info['class']; ?>">
                            <i class="fas fa-calendar-check"></i>
                            <?php echo $validade_info['texto']; ?>
                        </span>
                    </div>
                    <h2 class="orcamento-header-titulo"><?php echo $orcamento['titulo']; ?></h2>
                    <p class="orcamento-header-descricao"><?php echo $orcamento['descricao']; ?></p>
                </div>

                <!-- Ações Rápidas -->
                <div class="orcamento-header-acoes">
                    <a href="orcamento-editar.php?id=<?php echo $orcamento['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <button class="btn btn-outline" onclick="gerarPDF()">
                        <i class="fas fa-file-pdf"></i> PDF
                    </button>
                    <button class="btn btn-outline" onclick="enviarEmail()">
                        <i class="fas fa-paper-plane"></i> Enviar
                    </button>
                    <?php if ($orcamento['status'] === 'aprovado'): ?>
                        <a href="fatura-criar.php?orcamento=<?php echo $orcamento['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-file-invoice"></i> Gerar Fatura
                        </a>
                    <?php endif; ?>
                </div>
            </section>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($orcamento['valor_final']); ?></div>
                    <div class="label">Valor Total</div>
                    <?php if ($orcamento['valor_desconto'] > 0): ?>
                        <div class="trend up">
                            <i class="fas fa-tag"></i> Kz <?php echo formatMoney($orcamento['valor_desconto']); ?> desconto
                        </div>
                    <?php else: ?>
                        <div class="trend neutral">
                            <i class="fas fa-check"></i> Sem desconto
                        </div>
                    <?php endif; ?>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-list-check"></i>
                    </div>
                    <div class="value"><?php echo count($orcamento['itens']); ?></div>
                    <div class="label">Itens no Orçamento</div>
                    <div class="trend neutral">
                        <i class="fas fa-calculator"></i> Valor total calculado
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="value"><?php echo $orcamento['prazo_execucao']; ?></div>
                    <div class="label">Prazo de Execução</div>
                    <div class="trend neutral">
                        <i class="fas fa-calendar"></i> Após aprovação
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="value" style="font-size: var(--text-h4);"><?php echo $orcamento['metodo_pagamento']; ?></div>
                    <div class="label">Método Preferido</div>
                    <div class="trend neutral">
                        <i class="fas fa-percent"></i> <?php echo $orcamento['condicoes_pagamento']; ?>
                    </div>
                </div>
            </section>

            <!-- ===== CONTEÚDO PRINCIPAL ===== -->
            <div class="detalhe-grid">

                <!-- ===== COLUNA PRINCIPAL ===== -->
                <div class="detalhe-coluna-principal">

                    <!-- ===== ITENS DO ORÇAMENTO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.15s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-list-check" style="color: #6C2BD9;"></i>
                                Itens do Orçamento
                                <span class="badge-count"><?php echo count($orcamento['itens']); ?></span>
                            </h3>
                        </div>
                        <div class="itens-table-container">
                            <table class="itens-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descrição</th>
                                        <th>Qtd.</th>
                                        <th>Un.</th>
                                        <th>Preço Unit.</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orcamento['itens'] as $index => $item): ?>
                                        <tr>
                                            <td class="item-index"><?php echo $index + 1; ?></td>
                                            <td class="item-descricao"><?php echo $item['descricao']; ?></td>
                                            <td class="item-qtd"><?php echo $item['quantidade']; ?></td>
                                            <td class="item-unidade"><?php echo $item['unidade']; ?></td>
                                            <td class="item-preco">Kz <?php echo formatMoney($item['preco_unitario']); ?></td>
                                            <td class="item-subtotal">Kz <?php echo formatMoney($item['subtotal']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="tfoot-subtotal">
                                        <td colspan="5" class="tfoot-label">Subtotal</td>
                                        <td class="tfoot-value">Kz <?php echo formatMoney($orcamento['valor_total']); ?></td>
                                    </tr>
                                    <?php if ($orcamento['valor_desconto'] > 0): ?>
                                        <tr class="tfoot-desconto">
                                            <td colspan="5" class="tfoot-label">Desconto</td>
                                            <td class="tfoot-value" style="color: #00FFA3;">- Kz <?php echo formatMoney($orcamento['valor_desconto']); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr class="tfoot-total">
                                        <td colspan="5" class="tfoot-label">Total Final</td>
                                        <td class="tfoot-value">Kz <?php echo formatMoney($orcamento['valor_final']); ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- ===== INFORMAÇÕES DO ORÇAMENTO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-info-circle" style="color: #00D2FF;"></i>
                                Informações do Orçamento
                            </h3>
                        </div>
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-calendar-plus" style="color: #00D2FF;"></i>
                                    Data de Criação
                                </span>
                                <span class="info-value"><?php echo formatDateTime($orcamento['data_criacao']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-paper-plane" style="color: #6C2BD9;"></i>
                                    Data de Envio
                                </span>
                                <span class="info-value"><?php echo formatDateTime($orcamento['data_envio']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-calendar-check" style="color: #FFD93D;"></i>
                                    Válido até
                                </span>
                                <span class="info-value"><?php echo formatDate($orcamento['validade']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-user-tie" style="color: #00FFA3;"></i>
                                    Responsável Técnico
                                </span>
                                <span class="info-value"><?php echo $orcamento['responsavel_tecnico']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-map-marker-alt" style="color: #FF6B6B;"></i>
                                    Local de Execução
                                </span>
                                <span class="info-value"><?php echo $orcamento['local_execucao']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">
                                    <i class="fas fa-hourglass-half" style="color: #FF9F43;"></i>
                                    Validade da Proposta
                                </span>
                                <span class="info-value"><?php echo $orcamento['validade_proposta']; ?></span>
                            </div>
                        </div>

                        <?php if (!empty($orcamento['observacoes'])): ?>
                            <div class="observacoes-section">
                                <h4>
                                    <i class="fas fa-sticky-note"></i>
                                    Observações
                                </h4>
                                <p class="observacoes-texto"><?php echo $orcamento['observacoes']; ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- ===== TIMELINE ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.25s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-history" style="color: #6C2BD9;"></i>
                                Histórico do Orçamento
                                <span class="badge-count"><?php echo count($orcamento['timeline']); ?></span>
                            </h3>
                        </div>
                        <div class="timeline-container">
                            <?php foreach ($orcamento['timeline'] as $item): ?>
                                <div class="timeline-item">
                                    <div class="timeline-icon" style="background: <?php echo $item['color']; ?>15; color: <?php echo $item['color']; ?>;">
                                        <i class="fas <?php echo $item['icon']; ?>"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <span class="timeline-acao"><?php echo $item['acao']; ?></span>
                                            <span class="timeline-tempo"><?php echo timeAgo($item['data']); ?></span>
                                        </div>
                                        <p class="timeline-detalhes"><?php echo $item['detalhes']; ?></p>
                                        <div class="timeline-meta">
                                            <span><i class="fas fa-user"></i> <?php echo $item['usuario']; ?></span>
                                            <span><i class="far fa-clock"></i> <?php echo formatDateTime($item['data']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- ===== COLUNA LATERAL ===== -->
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
                                <img src="../../../assets/images/<?php echo $orcamento['cliente']['avatar']; ?>" 
                                     alt="<?php echo $orcamento['cliente']['nome']; ?>"
                                     onerror="this.src='<?php echo getAvatarUrl($orcamento['cliente']['nome']); ?>'">
                            </div>
                            <h4><?php echo $orcamento['cliente']['nome']; ?></h4>
                            <span class="cliente-tipo-badge"><?php echo $orcamento['cliente']['tipo']; ?></span>

                            <div class="cliente-info-list">
                                <div class="cliente-info-item">
                                    <i class="fas fa-envelope"></i>
                                    <span><?php echo $orcamento['cliente']['email']; ?></span>
                                </div>
                                <div class="cliente-info-item">
                                    <i class="fas fa-phone"></i>
                                    <span><?php echo $orcamento['cliente']['telefone']; ?></span>
                                </div>
                                <div class="cliente-info-item">
                                    <i class="fas fa-id-card"></i>
                                    <span>NIF: <?php echo $orcamento['cliente']['nif']; ?></span>
                                </div>
                                <div class="cliente-info-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo $orcamento['cliente']['endereco']; ?></span>
                                </div>
                                <div class="cliente-info-item">
                                    <i class="fas fa-user-circle"></i>
                                    <span>Resp: <?php echo $orcamento['cliente']['responsavel']; ?></span>
                                </div>
                            </div>

                            <div class="cliente-acoes">
                                <a href="mailto:<?php echo $orcamento['cliente']['email']; ?>" class="btn btn-sm btn-outline">
                                    <i class="fas fa-envelope"></i> Contactar
                                </a>
                                <a href="cliente-editar.php?id=<?php echo $orcamento['cliente']['id']; ?>" class="btn btn-sm btn-outline">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CARD DE STATUS ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-info-circle" style="color: #00D2FF;"></i>
                                Estado Atual
                            </h3>
                        </div>
                        <div class="status-detalhe">
                            <div class="status-icon-big <?php echo getStatusClass($orcamento['status']); ?>">
                                <i class="fas <?php echo getStatusIcon($orcamento['status']); ?>"></i>
                            </div>
                            <h4 class="status-label-big"><?php echo $orcamento['status_label']; ?></h4>
                            <p class="status-descricao">
                                <?php 
                                $descricoes = [
                                    'aprovado' => 'Este orçamento foi aprovado pelo cliente e está pronto para execução.',
                                    'pendente' => 'Aguardando resposta do cliente. O orçamento foi enviado e está em análise.',
                                    'rascunho' => 'Orçamento em rascunho. Ainda não foi enviado ao cliente.',
                                    'rejeitado' => 'Orçamento rejeitado pelo cliente. Considere revisar a proposta.',
                                    'expirado' => 'A validade do orçamento expirou. Envie uma nova proposta.',
                                    'cancelado' => 'Este orçamento foi cancelado e não está mais ativo.'
                                ];
                                echo $descricoes[$orcamento['status']] ?? '';
                                ?>
                            </p>
                            <?php if ($orcamento['data_resposta']): ?>
                                <div class="status-data">
                                    <i class="far fa-clock"></i>
                                    Resposta em: <?php echo formatDateTime($orcamento['data_resposta']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- ===== CARD DE AÇÕES ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                                Ações
                            </h3>
                        </div>
                        <div class="acoes-list">
                            <a href="orcamento-editar.php?id=<?php echo $orcamento['id']; ?>" class="acao-item">
                                <div class="acao-icon" style="background: rgba(0, 210, 255, 0.1); color: #00D2FF;">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <span>Editar Orçamento</span>
                            </a>

                            <button class="acao-item" onclick="gerarPDF()">
                                <div class="acao-icon" style="background: rgba(255, 107, 107, 0.1); color: #FF6B6B;">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <span>Descarregar PDF</span>
                            </button>

                            <button class="acao-item" onclick="enviarEmail()">
                                <div class="acao-icon" style="background: rgba(108, 43, 217, 0.1); color: #6C2BD9;">
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                                <span>Reenviar por Email</span>
                            </button>

                            <button class="acao-item" onclick="duplicarOrcamento()">
                                <div class="acao-icon" style="background: rgba(0, 255, 163, 0.1); color: #00FFA3;">
                                    <i class="fas fa-copy"></i>
                                </div>
                                <span>Duplicar Orçamento</span>
                            </button>

                            <?php if ($orcamento['status'] === 'aprovado'): ?>
                                <a href="fatura-criar.php?orcamento=<?php echo $orcamento['id']; ?>" class="acao-item acao-item-destaque">
                                    <div class="acao-icon" style="background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%); color: #FFFFFF;">
                                        <i class="fas fa-file-invoice"></i>
                                    </div>
                                    <span>Gerar Fatura</span>
                                </a>
                            <?php endif; ?>

                            <?php if ($orcamento['status'] === 'pendente' || $orcamento['status'] === 'rascunho'): ?>
                                <button class="acao-item" onclick="cancelarOrcamento()">
                                    <div class="acao-icon" style="background: rgba(255, 159, 67, 0.1); color: #FF9F43;">
                                        <i class="fas fa-ban"></i>
                                    </div>
                                    <span>Cancelar Orçamento</span>
                                </button>
                            <?php endif; ?>

                            <button class="acao-item acao-item-danger" onclick="excluirOrcamento()">
                                <div class="acao-icon" style="background: rgba(255, 107, 107, 0.1); color: #FF6B6B;">
                                    <i class="fas fa-trash"></i>
                                </div>
                                <span>Excluir Orçamento</span>
                            </button>
                        </div>
                    </div>

                    <!-- ===== CARD DE RESUMO RÁPIDO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.45s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-chart-simple" style="color: #00FFA3;"></i>
                                Resumo Rápido
                            </h3>
                        </div>
                        <div class="resumo-rapido">
                            <div class="resumo-rapido-item">
                                <span class="resumo-rapido-label">Valor Total</span>
                                <span class="resumo-rapido-value">Kz <?php echo formatMoney($orcamento['valor_final']); ?></span>
                            </div>
                            <div class="resumo-rapido-item">
                                <span class="resumo-rapido-label">Criado em</span>
                                <span class="resumo-rapido-value"><?php echo formatDate($orcamento['data_criacao']); ?></span>
                            </div>
                            <div class="resumo-rapido-item">
                                <span class="resumo-rapido-label">Dias para Validade</span>
                                <span class="resumo-rapido-value <?php echo $validade_info['class']; ?>">
                                    <?php echo $dias_validade->days >= 0 ? $dias_validade->days . ' dias' : 'Expirado'; ?>
                                </span>
                            </div>
                            <div class="resumo-rapido-item">
                                <span class="resumo-rapido-label">Itens</span>
                                <span class="resumo-rapido-value"><?php echo count($orcamento['itens']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO                       -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header modal-header-danger">
                <h3 class="modal-title modal-title-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    Confirmar Ação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="modalConfirmacaoBody">
                <p>Tem certeza que deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-danger" id="modalConfirmacaoBtn">
                    <i class="fas fa-check"></i> Confirmar
                </button>
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
        // AÇÕES DO ORÇAMENTO
        // ============================================
        function gerarPDF() {
            mostrarToast('A gerar PDF do orçamento...', 'info');
            setTimeout(() => mostrarToast('PDF gerado com sucesso!', 'success'), 1500);
        }

        function enviarEmail() {
            mostrarToast('A reenviar orçamento por email...', 'info');
            setTimeout(() => mostrarToast('Orçamento enviado para o cliente!', 'success'), 1500);
        }

        function duplicarOrcamento() {
            mostrarConfirmacao(
                'Duplicar Orçamento',
                'Deseja criar uma cópia deste orçamento? A cópia ficará como rascunho.',
                () => {
                    mostrarToast('Orçamento duplicado com sucesso!', 'success');
                    fecharModal('modalConfirmacao');
                    setTimeout(() => window.location.href = 'orcamento-criar.php?duplicar=<?php echo $orcamento['id']; ?>', 1200);
                }
            );
        }

        function cancelarOrcamento() {
            mostrarConfirmacao(
                'Cancelar Orçamento',
                'Tem certeza que deseja cancelar este orçamento? O cliente não poderá mais aprová-lo.',
                () => {
                    mostrarToast('Orçamento cancelado!', 'warning');
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function excluirOrcamento() {
            mostrarConfirmacao(
                'Excluir Orçamento',
                'Tem certeza que deseja excluir este orçamento? Esta ação não pode ser desfeita!',
                () => {
                    mostrarToast('Orçamento excluído!', 'error');
                    fecharModal('modalConfirmacao');
                    setTimeout(() => window.location.href = 'orcamentos.php', 1200);
                }
            );
        }

        // ============================================
        // MODAL DE CONFIRMAÇÃO
        // ============================================
        let callbackConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            const body = document.getElementById('modalConfirmacaoBody');
            body.innerHTML = `
                <div class="modal-alerta-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>${titulo}</strong>
                        <span>${mensagem}</span>
                    </div>
                </div>
            `;
            callbackConfirmacao = callback;
            document.getElementById('modalConfirmacao').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
            callbackConfirmacao = null;
        }

        document.getElementById('modalConfirmacaoBtn')?.addEventListener('click', function() {
            if (typeof callbackConfirmacao === 'function') {
                callbackConfirmacao();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModal('modalConfirmacao');
            }
        });
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
            min-width: 0;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #6C2BD9 0%, #00D2FF 100%);
            border-radius: var(--radius-lg) 0 0 var(--radius-lg);
        }

        .header-left {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .header-left h1 {
            font-family: var(--font-title);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            word-break: break-word;
            overflow-wrap: break-word;
            min-width: 0;
        }

        .header-left h1 .icon { color: #6C2BD9; font-size: 0.85em; }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-status.status-aprovado { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-rascunho { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-status.status-rejeitado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-expirado { background: rgba(255, 159, 67, 0.12); color: #FF9F43; }
        .badge-status.status-cancelado { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

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
        .header-left .breadcrumb a:hover { color: #6C2BD9; }
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

        .btn-theme:hover { border-color: #6C2BD9; color: #6C2BD9; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* ORÇAMENTO HEADER                           */
        /* ========================================== */
        .orcamento-header {
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
            overflow: hidden;
            min-width: 0;
        }

        .orcamento-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #6C2BD9 0%, #00D2FF 100%);
        }

        .orcamento-header-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .orcamento-header-badges {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .badge-categoria, .badge-codigo, .badge-validade {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            border: 1px solid var(--border-color);
            white-space: nowrap;
        }

        .badge-codigo {
            background: var(--bg-input);
            color: var(--text-secondary);
            font-family: var(--font-display);
            letter-spacing: 0.5px;
        }

        .badge-validade.normal { background: rgba(0, 210, 255, 0.12); color: #00D2FF; border-color: rgba(0, 210, 255, 0.2); }
        .badge-validade.urgente { background: rgba(255, 159, 67, 0.12); color: #FF9F43; border-color: rgba(255, 159, 67, 0.2); }
        .badge-validade.expirado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; border-color: rgba(255, 107, 107, 0.2); }

        .orcamento-header-titulo {
            font-family: var(--font-title);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .orcamento-header-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .orcamento-header-acoes {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
            align-items: flex-start;
            flex-shrink: 0;
        }

        .orcamento-header-acoes .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 16px;
            font-size: var(--text-sm);
            font-weight: 500;
            border-radius: var(--radius-md);
            white-space: nowrap;
            height: 42px;
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
            min-width: 0;
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
            flex-shrink: 0;
        }

        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .stat-card .icon.aurora { background: rgba(108, 43, 217, 0.15); color: #6C2BD9; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
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
            max-width: 100%;
            word-break: break-word;
        }

        .stat-card .trend.up { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .stat-card .trend.neutral { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        /* ========================================== */
        /* CORREÇÃO: DETALHE GRID                     */
        /* ========================================== */
        .detalhe-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 380px);
            gap: var(--space-lg);
            align-items: start;
        }

        .detalhe-coluna-principal,
        .detalhe-coluna-lateral {
            min-width: 0;
            max-width: 100%;
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
            max-width: 100%;
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
            min-width: 0;
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
            min-width: 0;
            word-break: break-word;
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
        /* ITENS TABLE                                */
        /* ========================================== */
        .itens-table-container {
            overflow-x: auto;
            padding: var(--space-md);
            max-width: 100%;
            -webkit-overflow-scrolling: touch;
        }

        .itens-table {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 600px;
            table-layout: auto;
        }

        .itens-table thead {
            background: var(--bg-input);
        }

        .itens-table thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .itens-table tbody tr {
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .itens-table tbody tr:hover {
            background: var(--bg-input);
        }

        .itens-table tbody td {
            padding: 14px;
            vertical-align: middle;
            color: var(--text-primary);
        }

        .item-index {
            font-family: var(--font-display);
            font-weight: 700;
            color: #6C2BD9;
            width: 40px;
            text-align: center;
        }

        .item-descricao {
            font-weight: 500;
            min-width: 200px;
            max-width: 400px;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .item-qtd, .item-unidade {
            text-align: center;
            width: 70px;
            white-space: nowrap;
        }

        .item-preco {
            text-align: right;
            font-weight: 600;
            color: var(--text-secondary);
            white-space: nowrap;
            width: 130px;
        }

        .item-subtotal {
            text-align: right;
            font-family: var(--font-display);
            font-weight: 700;
            color: #00FFA3;
            white-space: nowrap;
            width: 150px;
        }

        .itens-table tfoot tr {
            border-top: 2px solid var(--border-color);
        }

        .itens-table tfoot td {
            padding: 14px;
        }

        .tfoot-label {
            text-align: right;
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-secondary);
        }

        .tfoot-value {
            text-align: right;
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            white-space: nowrap;
        }

        .tfoot-total .tfoot-label {
            font-size: var(--text-body);
            font-weight: 700;
            color: var(--text-primary);
        }

        .tfoot-total .tfoot-value {
            font-size: var(--text-h3);
            color: #00FFA3;
        }

        /* ========================================== */
        /* INFO GRID                                  */
        /* ========================================== */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
            padding: var(--space-lg);
            min-width: 0;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            min-width: 0;
            overflow: hidden;
        }

        .info-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            flex-wrap: wrap;
        }

        .info-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .observacoes-section {
            padding: var(--space-lg);
            border-top: 1px solid var(--border-color);
            background: rgba(255, 217, 61, 0.03);
            min-width: 0;
        }

        .observacoes-section h4 {
            font-family: var(--font-title);
            font-size: var(--text-sm);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .observacoes-section h4 i { color: #FFD93D; }

        .observacoes-texto {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        /* ========================================== */
        /* TIMELINE                                   */
        /* ========================================== */
        .timeline-container {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
            min-width: 0;
        }

        .timeline-item {
            display: flex;
            gap: var(--space-md);
            padding-bottom: var(--space-md);
            border-bottom: 1px solid var(--border-color);
            position: relative;
            min-width: 0;
        }

        .timeline-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .timeline-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .timeline-content {
            flex: 1;
            min-width: 0;
            overflow: hidden;
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: 4px;
            flex-wrap: wrap;
        }

        .timeline-acao {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .timeline-tempo {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .timeline-detalhes {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 4px 0;
            line-height: 1.4;
            word-break: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .timeline-meta {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .timeline-meta span {
            display: inline-flex;
            align-items: center;
            gap: 4px;
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
            min-width: 0;
            overflow: hidden;
        }

        .cliente-avatar-grande img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #6C2BD9;
            box-shadow: 0 0 0 4px rgba(108, 43, 217, 0.1);
        }

        .cliente-detalhe h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            word-break: break-word;
            overflow-wrap: break-word;
            max-width: 100%;
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
            min-width: 0;
        }

        .cliente-info-item {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-secondary);
            text-align: left;
            min-width: 0;
        }

        .cliente-info-item i {
            width: 16px;
            color: #6C2BD9;
            font-size: 12px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .cliente-info-item span {
            word-break: break-word;
            overflow-wrap: break-word;
            min-width: 0;
            flex: 1;
        }

        .cliente-acoes {
            display: flex;
            gap: var(--space-sm);
            width: 100%;
            flex-wrap: wrap;
        }

        .cliente-acoes .btn { flex: 1; justify-content: center; min-width: 100px; }

        /* ========================================== */
        /* STATUS DETALHE                             */
        /* ========================================== */
        .status-detalhe {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: var(--space-sm);
        }

        .status-icon-big {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: var(--space-sm);
        }

        .status-icon-big.status-aprovado { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .status-icon-big.status-pendente { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .status-icon-big.status-rascunho { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .status-icon-big.status-rejeitado { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }
        .status-icon-big.status-expirado { background: rgba(255, 159, 67, 0.15); color: #FF9F43; }
        .status-icon-big.status-cancelado { background: rgba(107, 122, 143, 0.15); color: #6B7A8F; }

        .status-label-big {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .status-descricao {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.5;
            margin: 0;
        }

        .status-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-full);
            margin-top: var(--space-sm);
        }

        /* ========================================== */
        /* AÇÕES                                      */
        /* ========================================== */
        .acoes-list {
            padding: var(--space-md);
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 0;
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
            min-width: 0;
        }

        .acao-item:hover {
            background: var(--bg-input);
            color: var(--text-primary);
            border-color: var(--border-color);
        }

        .acao-item span {
            flex: 1;
            min-width: 0;
            word-break: break-word;
            overflow-wrap: break-word;
        }

        .acao-item-destaque {
            background: linear-gradient(135deg, rgba(108, 43, 217, 0.08) 0%, rgba(0, 210, 255, 0.08) 100%);
            border-color: rgba(108, 43, 217, 0.2);
        }

        .acao-item-destaque:hover {
            border-color: #6C2BD9;
            background: linear-gradient(135deg, rgba(108, 43, 217, 0.15) 0%, rgba(0, 210, 255, 0.15) 100%);
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
        /* RESUMO RÁPIDO                              */
        /* ========================================== */
        .resumo-rapido {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            min-width: 0;
        }

        .resumo-rapido-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) 0;
            border-bottom: 1px solid var(--border-color);
            gap: var(--space-sm);
            min-width: 0;
        }

        .resumo-rapido-item:last-child { border-bottom: none; }

        .resumo-rapido-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            flex: 1;
            min-width: 0;
        }

        .resumo-rapido-value {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            text-align: right;
            word-break: break-word;
            overflow-wrap: break-word;
            max-width: 60%;
        }

        .resumo-rapido-value.normal { color: #00D2FF; }
        .resumo-rapido-value.urgente { color: #FF9F43; }
        .resumo-rapido-value.expirado { color: #FF6B6B; }

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
        }

        .modal-alerta-danger i {
            font-size: 24px;
            color: #FF6B6B;
            flex-shrink: 0;
        }

        .modal-alerta-danger div {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .modal-alerta-danger strong {
            font-size: var(--text-sm);
            color: #FF6B6B;
        }

        .modal-alerta-danger span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

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
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .page-header {
                flex-direction: column;
                align-items: stretch;
            }

            .header-right {
                justify-content: flex-end;
                width: 100%;
            }

            .orcamento-header {
                flex-direction: column;
            }

            .orcamento-header-acoes {
                width: 100%;
            }

            .orcamento-header-acoes .btn {
                flex: 1;
                justify-content: center;
                min-width: 120px;
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

            .info-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                padding: var(--space-md);
            }

            .header-left h1 {
                font-size: var(--text-h3);
            }

            .orcamento-header-titulo {
                font-size: var(--text-h3);
            }

            .timeline-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .orcamento-header-acoes {
                flex-direction: column;
            }

            .orcamento-header-acoes .btn {
                width: 100%;
            }

            .modal-content {
                width: 95%;
            }

            .modal-footer {
                flex-direction: column-reverse;
            }

            .modal-footer .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .orcamento-header-badges {
                flex-direction: column;
                align-items: stretch;
            }

            .badge-categoria,
            .badge-codigo,
            .badge-validade {
                justify-content: center;
            }

            .cliente-acoes {
                flex-direction: column;
            }

            .cliente-acoes .btn {
                width: 100%;
            }

            .itens-table {
                min-width: 500px;
            }

            .item-descricao {
                min-width: 150px;
            }
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