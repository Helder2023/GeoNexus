<?php
// painel/individual/financeiro/orcamentos.php - Lista de Orçamentos
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Orçamentos';
$pagina_atual = 'orcamentos';

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($total_orcamentos)) $total_orcamentos = 24;

// ============================================
// LISTA DE ORÇAMENTOS
// ============================================
$orcamentos = [
    [
        'id' => 1,
        'codigo' => 'ORC-2026-0001',
        'cliente' => 'Construtora ABC',
        'cliente_avatar' => 'empresa-1.png',
        'cliente_tipo' => 'Empresa',
        'cliente_email' => 'contato@construtoraabc.ao',
        'titulo' => 'Levantamento Topográfico - Zona Norte',
        'descricao' => 'Levantamento topográfico completo de 50 hectares com curvas de nível e pontos georreferenciados.',
        'categoria' => 'Topografia',
        'categoria_icon' => 'fa-mountain',
        'categoria_color' => '#6C2BD9',
        'valor_total' => 350000,
        'valor_desconto' => 0,
        'valor_final' => 350000,
        'itens' => 5,
        'status' => 'aprovado',
        'status_label' => 'Aprovado',
        'validade' => '2026-03-15',
        'data_criacao' => '2026-02-10 10:30:00',
        'data_envio' => '2026-02-10 11:00:00',
        'data_resposta' => '2026-02-12 14:20:00',
        'prazo_execucao' => '30 dias',
        'condicoes_pagamento' => '50% Adiantado / 50% na Entrega'
    ],
    [
        'id' => 2,
        'codigo' => 'ORC-2026-0002',
        'cliente' => 'Indústria Luanda',
        'cliente_avatar' => 'empresa-2.png',
        'cliente_tipo' => 'Empresa',
        'cliente_email' => 'contato@industrialuanda.ao',
        'titulo' => 'Mapeamento GIS - Área Industrial',
        'descricao' => 'Mapeamento GIS completo com análise espacial, mapas interativos e base de dados georreferenciada.',
        'categoria' => 'GIS',
        'categoria_icon' => 'fa-globe',
        'categoria_color' => '#00FFA3',
        'valor_total' => 480000,
        'valor_desconto' => 24000,
        'valor_final' => 456000,
        'itens' => 8,
        'status' => 'pendente',
        'status_label' => 'Aguardando Resposta',
        'validade' => '2026-03-01',
        'data_criacao' => '2026-02-08 14:15:00',
        'data_envio' => '2026-02-08 15:30:00',
        'data_resposta' => null,
        'prazo_execucao' => '45 dias',
        'condicoes_pagamento' => '30% Adiantado / 70% na Entrega'
    ],
    [
        'id' => 3,
        'codigo' => 'ORC-2026-0003',
        'cliente' => 'Município de Luanda',
        'cliente_avatar' => 'instituicao-1.png',
        'cliente_tipo' => 'Instituição',
        'cliente_email' => 'geral@luanda.gov.ao',
        'titulo' => 'Levantamento Planialtimétrico - 120 hectares',
        'descricao' => 'Levantamento planialtimétrico para projeto de urbanização com detalhamento completo do relevo.',
        'categoria' => 'Urbanismo',
        'categoria_icon' => 'fa-city',
        'categoria_color' => '#A29BFE',
        'valor_total' => 520000,
        'valor_desconto' => 0,
        'valor_final' => 520000,
        'itens' => 6,
        'status' => 'rascunho',
        'status_label' => 'Rascunho',
        'validade' => '2026-03-20',
        'data_criacao' => '2026-02-18 09:00:00',
        'data_envio' => null,
        'data_resposta' => null,
        'prazo_execucao' => '60 dias',
        'condicoes_pagamento' => 'À Vista'
    ],
    [
        'id' => 4,
        'codigo' => 'ORC-2026-0004',
        'cliente' => 'Agro Negócios Lda',
        'cliente_avatar' => 'empresa-3.png',
        'cliente_tipo' => 'Empresa',
        'cliente_email' => 'info@agronegocios.ao',
        'titulo' => 'Cadastro Rural - Fazenda Sunflower',
        'descricao' => 'Cadastro rural completo com georreferenciamento, demarcação de limites e documentação.',
        'categoria' => 'Cadastro',
        'categoria_icon' => 'fa-home',
        'categoria_color' => '#FFD93D',
        'valor_total' => 195000,
        'valor_desconto' => 9750,
        'valor_final' => 185250,
        'itens' => 4,
        'status' => 'rejeitado',
        'status_label' => 'Rejeitado',
        'validade' => '2026-02-28',
        'data_criacao' => '2026-02-05 11:45:00',
        'data_envio' => '2026-02-05 12:00:00',
        'data_resposta' => '2026-02-08 16:30:00',
        'prazo_execucao' => '20 dias',
        'condicoes_pagamento' => '50% Adiantado / 50% na Entrega'
    ],
    [
        'id' => 5,
        'codigo' => 'ORC-2026-0005',
        'cliente' => 'Mineração Progresso',
        'cliente_avatar' => 'empresa-7.png',
        'cliente_tipo' => 'Empresa',
        'cliente_email' => 'contato@mineracaoprogresso.ao',
        'titulo' => 'Levantamento Topográfico - Área Mineira',
        'descricao' => 'Levantamento topográfico de área mineira com 200 hectares e modelação 3D do terreno.',
        'categoria' => 'Mineração',
        'categoria_icon' => 'fa-gem',
        'categoria_color' => '#FF9F43',
        'valor_total' => 850000,
        'valor_desconto' => 42500,
        'valor_final' => 807500,
        'itens' => 10,
        'status' => 'pendente',
        'status_label' => 'Aguardando Resposta',
        'validade' => '2026-03-10',
        'data_criacao' => '2026-02-12 16:20:00',
        'data_envio' => '2026-02-12 17:00:00',
        'data_resposta' => null,
        'prazo_execucao' => '90 dias',
        'condicoes_pagamento' => '30% Adiantado / 70% na Entrega'
    ],
    [
        'id' => 6,
        'codigo' => 'ORC-2026-0006',
        'cliente' => 'Energia Futuro',
        'cliente_avatar' => 'empresa-8.png',
        'cliente_tipo' => 'Empresa',
        'cliente_email' => 'financas@energiafuturo.ao',
        'titulo' => 'Levantamento com Drone - Parque Solar',
        'descricao' => 'Levantamento aéreo com drone para mapeamento de área do parque solar e ortomosaico.',
        'categoria' => 'Drones',
        'categoria_icon' => 'fa-drone',
        'categoria_color' => '#FF6B6B',
        'valor_total' => 320000,
        'valor_desconto' => 0,
        'valor_final' => 320000,
        'itens' => 5,
        'status' => 'aprovado',
        'status_label' => 'Aprovado',
        'validade' => '2026-03-05',
        'data_criacao' => '2026-02-14 08:30:00',
        'data_envio' => '2026-02-14 09:00:00',
        'data_resposta' => '2026-02-15 10:15:00',
        'prazo_execucao' => '15 dias',
        'condicoes_pagamento' => 'À Vista'
    ],
    [
        'id' => 7,
        'codigo' => 'ORC-2026-0007',
        'cliente' => 'Instituto Geográfico',
        'cliente_avatar' => 'instituicao-2.png',
        'cliente_tipo' => 'Instituição',
        'cliente_email' => 'financas@igeo.ao',
        'titulo' => 'Licenciamento GIS Anual',
        'descricao' => 'Proposta de licenciamento anual do sistema GIS para toda a instituição.',
        'categoria' => 'GIS',
        'categoria_icon' => 'fa-globe',
        'categoria_color' => '#00FFA3',
        'valor_total' => 350000,
        'valor_desconto' => 0,
        'valor_final' => 350000,
        'itens' => 3,
        'status' => 'expirado',
        'status_label' => 'Expirado',
        'validade' => '2026-02-10',
        'data_criacao' => '2026-01-20 10:00:00',
        'data_envio' => '2026-01-20 10:30:00',
        'data_resposta' => null,
        'prazo_execucao' => 'Imediato',
        'condicoes_pagamento' => 'À Vista'
    ],
    [
        'id' => 8,
        'codigo' => 'ORC-2026-0008',
        'cliente' => 'Agro Negócios Lda',
        'cliente_avatar' => 'empresa-3.png',
        'cliente_tipo' => 'Empresa',
        'cliente_email' => 'info@agronegocios.ao',
        'titulo' => 'Análise de Solo - Projeto Agrícola',
        'descricao' => 'Análise de solo e mapeamento agrícola de precisão para otimização de culturas.',
        'categoria' => 'Agricultura',
        'categoria_icon' => 'fa-tractor',
        'categoria_color' => '#6BCB77',
        'valor_total' => 220000,
        'valor_desconto' => 11000,
        'valor_final' => 209000,
        'itens' => 6,
        'status' => 'aprovado',
        'status_label' => 'Aprovado',
        'validade' => '2026-03-25',
        'data_criacao' => '2026-02-16 14:20:00',
        'data_envio' => '2026-02-16 15:00:00',
        'data_resposta' => '2026-02-17 09:30:00',
        'prazo_execucao' => '25 dias',
        'condicoes_pagamento' => '50% Adiantado / 50% na Entrega'
    ],
    [
        'id' => 9,
        'codigo' => 'ORC-2026-0009',
        'cliente' => 'Construtora XYZ',
        'cliente_avatar' => 'empresa-6.png',
        'cliente_tipo' => 'Empresa',
        'cliente_email' => 'contato@construtoraxyz.ao',
        'titulo' => 'Levantamento Cadastral - Zona Sul',
        'descricao' => 'Levantamento cadastral completo de 80 lotes na zona sul de Luanda.',
        'categoria' => 'Cadastro',
        'categoria_icon' => 'fa-home',
        'categoria_color' => '#FFD93D',
        'valor_total' => 420000,
        'valor_desconto' => 0,
        'valor_final' => 420000,
        'itens' => 7,
        'status' => 'pendente',
        'status_label' => 'Aguardando Resposta',
        'validade' => '2026-03-12',
        'data_criacao' => '2026-02-17 10:15:00',
        'data_envio' => '2026-02-17 11:00:00',
        'data_resposta' => null,
        'prazo_execucao' => '35 dias',
        'condicoes_pagamento' => '30% Adiantado / 70% na Entrega'
    ],
    [
        'id' => 10,
        'codigo' => 'ORC-2026-0010',
        'cliente' => 'Transportes Angola Lda',
        'cliente_avatar' => 'empresa-9.png',
        'cliente_tipo' => 'Empresa',
        'cliente_email' => 'geral@transportesangola.ao',
        'titulo' => 'Otimização de Rotas - Frota',
        'descricao' => 'Consultoria para otimização de rotas da frota com análise GIS e GPS tracking.',
        'categoria' => 'Transportes',
        'categoria_icon' => 'fa-truck',
        'categoria_color' => '#00CEC9',
        'valor_total' => 280000,
        'valor_desconto' => 14000,
        'valor_final' => 266000,
        'itens' => 5,
        'status' => 'cancelado',
        'status_label' => 'Cancelado',
        'validade' => '2026-03-08',
        'data_criacao' => '2026-02-11 15:45:00',
        'data_envio' => '2026-02-11 16:00:00',
        'data_resposta' => '2026-02-13 10:00:00',
        'prazo_execucao' => '30 dias',
        'condicoes_pagamento' => 'À Vista'
    ],
];

// ============================================
// ESTATÍSTICAS
// ============================================
$total_orcamentos = count($orcamentos);
$orcamentos_aprovados = count(array_filter($orcamentos, fn($o) => $o['status'] === 'aprovado'));
$orcamentos_pendentes = count(array_filter($orcamentos, fn($o) => $o['status'] === 'pendente'));
$orcamentos_rascunho = count(array_filter($orcamentos, fn($o) => $o['status'] === 'rascunho'));
$orcamentos_rejeitados = count(array_filter($orcamentos, fn($o) => $o['status'] === 'rejeitado'));
$orcamentos_expirados = count(array_filter($orcamentos, fn($o) => $o['status'] === 'expirado'));
$orcamentos_cancelados = count(array_filter($orcamentos, fn($o) => $o['status'] === 'cancelado'));

$valor_total_aprovados = array_sum(array_map(fn($o) => $o['status'] === 'aprovado' ? $o['valor_final'] : 0, $orcamentos));
$valor_total_pendentes = array_sum(array_map(fn($o) => $o['status'] === 'pendente' ? $o['valor_final'] : 0, $orcamentos));
$valor_total_geral = array_sum(array_column($orcamentos, 'valor_final'));

// Taxa de conversão
$taxa_conversao = $total_orcamentos > 0 ? round(($orcamentos_aprovados / $total_orcamentos) * 100, 1) : 0;

// ============================================
// CATEGORIAS ÚNICAS
// ============================================
$categorias_unicas = [];
foreach ($orcamentos as $o) {
    if (!isset($categorias_unicas[$o['categoria']])) {
        $categorias_unicas[$o['categoria']] = [
            'id' => $o['categoria'],
            'nome' => $o['categoria'],
            'icon' => $o['categoria_icon'],
            'color' => $o['categoria_color']
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

if (!function_exists('formatDateTime')) {
    function formatDateTime($datetime) {
        if (empty($datetime)) return 'N/A';
        return date('d/m/Y H:i', strtotime($datetime));
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

if (!function_exists('diasParaValidade')) {
    function diasParaValidade($data_validade) {
        $hoje = new DateTime();
        $fim = new DateTime($data_validade);
        $diff = $hoje->diff($fim);
        
        if ($fim < $hoje) {
            return ['texto' => 'Expirado há ' . $diff->days . ' dias', 'class' => 'expirado', 'dias' => -$diff->days];
        }
        
        if ($diff->days === 0) {
            return ['texto' => 'Expira hoje', 'class' => 'urgente', 'dias' => 0];
        }
        
        if ($diff->days <= 3) {
            return ['texto' => 'Expira em ' . $diff->days . ' dias', 'class' => 'urgente', 'dias' => $diff->days];
        }
        
        if ($diff->days <= 7) {
            return ['texto' => 'Expira em ' . $diff->days . ' dias', 'class' => 'aviso', 'dias' => $diff->days];
        }
        
        return ['texto' => 'Válido por ' . $diff->days . ' dias', 'class' => 'normal', 'dias' => $diff->days];
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
                        <span class="badge-count"><?php echo $total_orcamentos; ?></span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Orçamentos</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="orcamento-criar.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Novo Orçamento
                    </a>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="value"><?php echo $orcamentos_aprovados; ?></div>
                    <div class="label">Aprovados</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> <?php echo $taxa_conversao; ?>% conversão
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $orcamentos_pendentes; ?></div>
                    <div class="label">Aguardando Resposta</div>
                    <div class="trend down">
                        <i class="fas fa-hourglass-half"></i> <?php echo $orcamentos_rascunho; ?> rascunhos
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="value"><?php echo $orcamentos_rejeitados + $orcamentos_expirados + $orcamentos_cancelados; ?></div>
                    <div class="label">Rejeitados/Expirados</div>
                    <div class="trend neutral">
                        <i class="fas fa-info-circle"></i> <?php echo $orcamentos_expirados; ?> expirados
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo number_format($valor_total_aprovados / 1000, 0); ?>k</div>
                    <div class="label">Valor Aprovado</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> <?php echo $orcamentos_aprovados; ?> contratos
                    </div>
                </div>
            </section>

            <!-- ===== RESUMO ===== -->
            <section class="resumo-financeiro animate-fade-up" style="animation-delay: 0.1s;">
                <div class="resumo-item">
                    <div class="resumo-icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Aprovado</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_total_aprovados); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Em Análise</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_total_pendentes); ?></span>
                    </div>
                </div>
                <div class="resumo-item">
                    <div class="resumo-icon blue">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <div class="resumo-info">
                        <span class="resumo-label">Valor Total</span>
                        <span class="resumo-valor">Kz <?php echo formatMoney($valor_total_geral); ?></span>
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <section class="filtros animate-fade-up" style="animation-delay: 0.2s;">
                <div class="filtros-top">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchOrcamento" placeholder="Buscar por cliente, código ou título..." 
                               oninput="filtrarOrcamentos()">
                    </div>
                    <div class="filtros-actions">
                        <button class="btn btn-sm btn-outline" onclick="abrirFiltrosAvancados()">
                            <i class="fas fa-filter"></i> Filtros
                        </button>
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

                <!-- Filtros rápidos por status -->
                <div class="filtros-status">
                    <button class="filtro-status active" data-status="todos" onclick="filtrarPorStatus('todos')">
                        Todos <span class="count"><?php echo $total_orcamentos; ?></span>
                    </button>
                    <button class="filtro-status" data-status="aprovado" onclick="filtrarPorStatus('aprovado')">
                        <i class="fas fa-check-circle" style="color: #00FFA3;"></i> Aprovados <span class="count"><?php echo $orcamentos_aprovados; ?></span>
                    </button>
                    <button class="filtro-status" data-status="pendente" onclick="filtrarPorStatus('pendente')">
                        <i class="fas fa-clock" style="color: #FFD93D;"></i> Pendentes <span class="count"><?php echo $orcamentos_pendentes; ?></span>
                    </button>
                    <button class="filtro-status" data-status="rascunho" onclick="filtrarPorStatus('rascunho')">
                        <i class="fas fa-pencil-alt" style="color: #00D2FF;"></i> Rascunhos <span class="count"><?php echo $orcamentos_rascunho; ?></span>
                    </button>
                    <button class="filtro-status" data-status="rejeitado" onclick="filtrarPorStatus('rejeitado')">
                        <i class="fas fa-times-circle" style="color: #FF6B6B;"></i> Rejeitados <span class="count"><?php echo $orcamentos_rejeitados; ?></span>
                    </button>
                    <button class="filtro-status" data-status="expirado" onclick="filtrarPorStatus('expirado')">
                        <i class="fas fa-hourglass-end" style="color: #FF9F43;"></i> Expirados <span class="count"><?php echo $orcamentos_expirados; ?></span>
                    </button>
                </div>

                <!-- Filtros avançados -->
                <div class="filtros-avancados" id="filtrosAvancados" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Categoria</label>
                            <select class="form-control" id="filtroCategoria" onchange="filtrarOrcamentos()">
                                <option value="">Todas as categorias</option>
                                <?php foreach ($categorias_unicas as $cat): ?>
                                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cliente</label>
                            <select class="form-control" id="filtroCliente" onchange="filtrarOrcamentos()">
                                <option value="">Todos os clientes</option>
                                <?php 
                                $clientes_unicos = [];
                                foreach ($orcamentos as $o) {
                                    $clientes_unicos[$o['cliente']] = $o['cliente'];
                                }
                                foreach ($clientes_unicos as $c): 
                                ?>
                                    <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Validade</label>
                            <select class="form-control" id="filtroValidade" onchange="filtrarOrcamentos()">
                                <option value="">Todas as validades</option>
                                <option value="urgente">Expira em breve</option>
                                <option value="expirado">Expirados</option>
                                <option value="valido">Ainda válidos</option>
                            </select>
                        </div>
                    </div>
                    <div class="filtros-avancados-actions">
                        <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-undo"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount">
                            <?php echo $total_orcamentos; ?> resultado(s)
                        </span>
                    </div>
                </div>
            </section>

            <!-- ===== LISTA DE ORÇAMENTOS ===== -->
            <section class="orcamentos-container animate-fade-up" style="animation-delay: 0.3s;">
                <?php if (empty($orcamentos)): ?>
                    <div class="empty-state">
                        <i class="fas fa-file-signature"></i>
                        <h3>Nenhum orçamento criado</h3>
                        <p>Comece por criar o seu primeiro orçamento</p>
                        <a href="orcamento-criar.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Novo Orçamento
                        </a>
                    </div>
                <?php else: ?>
                    <div class="orcamentos-grid" id="orcamentosGrid">
                        <?php foreach ($orcamentos as $orcamento): 
                            $validade = diasParaValidade($orcamento['validade']);
                            $tem_desconto = $orcamento['valor_desconto'] > 0;
                        ?>
                            <div class="orcamento-card" 
                                 data-id="<?php echo $orcamento['id']; ?>"
                                 data-status="<?php echo $orcamento['status']; ?>"
                                 data-categoria="<?php echo $orcamento['categoria']; ?>"
                                 data-cliente="<?php echo $orcamento['cliente']; ?>"
                                 data-validade="<?php echo $validade['class']; ?>"
                                 data-busca="<?php echo strtolower($orcamento['cliente'] . ' ' . $orcamento['codigo'] . ' ' . $orcamento['titulo']); ?>">
                                
                                <!-- ===== HEADER DO CARD ===== -->
                                <div class="orcamento-card-header" style="--cat-color: <?php echo $orcamento['categoria_color']; ?>;">
                                    <div class="orcamento-card-categoria">
                                        <div class="categoria-icon" style="background: <?php echo $orcamento['categoria_color']; ?>20; color: <?php echo $orcamento['categoria_color']; ?>;">
                                            <i class="fas <?php echo $orcamento['categoria_icon']; ?>"></i>
                                        </div>
                                        <div class="categoria-info">
                                            <span class="categoria-nome"><?php echo $orcamento['categoria']; ?></span>
                                            <span class="orcamento-codigo"><?php echo $orcamento['codigo']; ?></span>
                                        </div>
                                    </div>
                                    <div class="orcamento-card-status">
                                        <span class="badge-status <?php echo getStatusClass($orcamento['status']); ?>">
                                            <i class="fas <?php echo getStatusIcon($orcamento['status']); ?>"></i>
                                            <?php echo $orcamento['status_label']; ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- ===== CORPO DO CARD ===== -->
                                <div class="orcamento-card-body">
                                    <!-- Cliente -->
                                    <div class="orcamento-cliente">
                                        <img src="../../../assets/images/<?php echo $orcamento['cliente_avatar']; ?>" 
                                             alt="<?php echo $orcamento['cliente']; ?>"
                                             onerror="this.src='<?php echo getAvatarUrl($orcamento['cliente']); ?>'">
                                        <div class="orcamento-cliente-info">
                                            <span class="orcamento-cliente-nome"><?php echo $orcamento['cliente']; ?></span>
                                            <span class="orcamento-cliente-tipo"><?php echo $orcamento['cliente_tipo']; ?></span>
                                        </div>
                                    </div>

                                    <!-- Título -->
                                    <h3 class="orcamento-titulo"><?php echo $orcamento['titulo']; ?></h3>

                                    <!-- Descrição -->
                                    <p class="orcamento-descricao">
                                        <?php echo mb_substr($orcamento['descricao'], 0, 120) . (mb_strlen($orcamento['descricao']) > 120 ? '...' : ''); ?>
                                    </p>

                                    <!-- Valor -->
                                    <div class="orcamento-valor-section">
                                        <div class="orcamento-valor-header">
                                            <span class="orcamento-valor-label">Valor Total</span>
                                            <?php if ($tem_desconto): ?>
                                                <span class="orcamento-desconto-badge">
                                                    <i class="fas fa-tag"></i> Desconto Kz <?php echo formatMoney($orcamento['valor_desconto']); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($tem_desconto): ?>
                                            <div class="orcamento-valor-original">
                                                Kz <?php echo formatMoney($orcamento['valor_total']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="orcamento-valor-final">
                                            Kz <?php echo formatMoney($orcamento['valor_final']); ?>
                                        </div>
                                    </div>

                                    <!-- Detalhes -->
                                    <div class="orcamento-detalhes">
                                        <div class="orcamento-detalhe-item">
                                            <span class="detalhe-label">
                                                <i class="fas fa-list"></i>
                                                Itens
                                            </span>
                                            <span class="detalhe-value"><?php echo $orcamento['itens']; ?></span>
                                        </div>
                                        <div class="orcamento-detalhe-item">
                                            <span class="detalhe-label">
                                                <i class="fas fa-hourglass-half"></i>
                                                Prazo
                                            </span>
                                            <span class="detalhe-value"><?php echo $orcamento['prazo_execucao']; ?></span>
                                        </div>
                                    </div>

                                    <!-- Data de Criação / Envio -->
                                    <div class="orcamento-timeline">
                                        <div class="timeline-item">
                                            <i class="fas fa-pencil-alt" style="color: #00D2FF;"></i>
                                            <span class="timeline-label">Criado</span>
                                            <span class="timeline-value"><?php echo formatDate($orcamento['data_criacao']); ?></span>
                                        </div>
                                        <?php if ($orcamento['data_envio']): ?>
                                        <div class="timeline-item">
                                            <i class="fas fa-paper-plane" style="color: #6C2BD9;"></i>
                                            <span class="timeline-label">Enviado</span>
                                            <span class="timeline-value"><?php echo formatDate($orcamento['data_envio']); ?></span>
                                        </div>
                                        <?php endif; ?>
                                        <?php if ($orcamento['data_resposta']): ?>
                                        <div class="timeline-item">
                                            <i class="fas fa-reply" style="color: <?php echo $orcamento['status'] === 'aprovado' ? '#00FFA3' : '#FF6B6B'; ?>;"></i>
                                            <span class="timeline-label">Resposta</span>
                                            <span class="timeline-value"><?php echo formatDate($orcamento['data_resposta']); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Validade -->
                                    <?php if ($orcamento['status'] !== 'aprovado' && $orcamento['status'] !== 'rejeitado' && $orcamento['status'] !== 'cancelado'): ?>
                                        <div class="orcamento-validade <?php echo $validade['class']; ?>">
                                            <i class="fas <?php echo $validade['class'] === 'expirado' ? 'fa-exclamation-triangle' : 'fa-calendar-check'; ?>"></i>
                                            <span><?php echo $validade['texto']; ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Condições de Pagamento -->
                                    <div class="orcamento-condicoes">
                                        <i class="fas fa-credit-card"></i>
                                        <span><?php echo $orcamento['condicoes_pagamento']; ?></span>
                                    </div>
                                </div>

                                <!-- ===== FOOTER DO CARD ===== -->
                                <div class="orcamento-card-footer">
                                    <div class="orcamento-actions">
                                        <a href="orcamento-detalhe.php?id=<?php echo $orcamento['id']; ?>" 
                                           class="btn-action" title="Ver Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="orcamento-editar.php?id=<?php echo $orcamento['id']; ?>" 
                                           class="btn-action" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <?php if ($orcamento['status'] === 'aprovado'): ?>
                                            <a href="fatura-criar.php?orcamento=<?php echo $orcamento['id']; ?>" 
                                               class="btn-action btn-action-primary" title="Gerar Fatura">
                                                <i class="fas fa-file-invoice"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($orcamento['status'] === 'rascunho'): ?>
                                            <button class="btn-action btn-action-success" 
                                                    onclick="enviarOrcamento(<?php echo $orcamento['id']; ?>)"
                                                    title="Enviar ao Cliente">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        <?php endif; ?>
                                        <a href="orcamento-excluir.php?id=<?php echo $orcamento['id']; ?>" 
                                           class="btn-action btn-action-danger" 
                                           title="Excluir"
                                           onclick="return confirmarExclusao(event, '<?php echo addslashes($orcamento['titulo']); ?>', <?php echo $orcamento['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <button class="btn-action" onclick="abrirMenuCard(event, <?php echo $orcamento['id']; ?>)" title="Mais">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- ===== PAGINAÇÃO ===== -->
                    <div class="paginacao" id="paginacao">
                        <button class="page-btn" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="page-info">Página 1 de 1</span>
                        <button class="page-btn" disabled>
                            <i class="fas fa-chevron-right"></i>
                        </button>
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
            <span>Editar Orçamento</span>
        </a>
        <a href="#" class="context-item" id="menuDuplicar">
            <i class="fas fa-copy"></i>
            <span>Duplicar</span>
        </a>
        <a href="#" class="context-item" id="menuGerarFatura">
            <i class="fas fa-file-invoice"></i>
            <span>Gerar Fatura</span>
        </a>
        <a href="#" class="context-item" id="menuEnviar">
            <i class="fas fa-paper-plane"></i>
            <span>Enviar ao Cliente</span>
        </a>
        <a href="#" class="context-item" id="menuPDF">
            <i class="fas fa-file-pdf"></i>
            <span>Descarregar PDF</span>
        </a>
        <hr>
        <a href="#" class="context-item context-item-danger" id="menuExcluir">
            <i class="fas fa-trash"></i>
            <span>Excluir Orçamento</span>
        </a>
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
        // FILTROS
        // ============================================
        let filtroStatusAtual = 'todos';

        function filtrarPorStatus(status) {
            filtroStatusAtual = status;
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === status);
            });
            filtrarOrcamentos();
        }

        function filtrarOrcamentos() {
            const search = (document.getElementById('searchOrcamento')?.value || '').toLowerCase().trim();
            const categoria = document.getElementById('filtroCategoria')?.value || '';
            const cliente = document.getElementById('filtroCliente')?.value || '';
            const validade = document.getElementById('filtroValidade')?.value || '';

            const cards = document.querySelectorAll('.orcamento-card');
            let visiveis = 0;

            cards.forEach(card => {
                let mostrar = true;

                if (filtroStatusAtual !== 'todos' && card.dataset.status !== filtroStatusAtual) {
                    mostrar = false;
                }

                if (mostrar && categoria && card.dataset.categoria !== categoria) {
                    mostrar = false;
                }

                if (mostrar && cliente && card.dataset.cliente !== cliente) {
                    mostrar = false;
                }

                if (mostrar && validade) {
                    const cardValidade = card.dataset.validade;
                    if (validade === 'urgente' && cardValidade !== 'urgente') mostrar = false;
                    if (validade === 'expirado' && cardValidade !== 'expirado') mostrar = false;
                    if (validade === 'valido' && (cardValidade === 'expirado')) mostrar = false;
                }

                if (mostrar && search) {
                    mostrar = card.dataset.busca.includes(search);
                }

                card.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            const count = document.getElementById('resultadosCount');
            if (count) count.textContent = visiveis + ' resultado(s)';

            const container = document.getElementById('orcamentosGrid');
            const emptyState = document.querySelector('.empty-state-filtro');

            if (visiveis === 0 && container) {
                if (!emptyState) {
                    const empty = document.createElement('div');
                    empty.className = 'empty-state empty-state-filtro';
                    empty.innerHTML = `
                        <i class="fas fa-search"></i>
                        <h3>Nenhum orçamento encontrado</h3>
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
            document.getElementById('searchOrcamento').value = '';
            const fCat = document.getElementById('filtroCategoria');
            const fCli = document.getElementById('filtroCliente');
            const fVal = document.getElementById('filtroValidade');
            if (fCat) fCat.value = '';
            if (fCli) fCli.value = '';
            if (fVal) fVal.value = '';
            filtroStatusAtual = 'todos';
            
            document.querySelectorAll('.filtro-status').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.status === 'todos');
            });
            
            filtrarOrcamentos();
        }

        function abrirFiltrosAvancados() {
            const filtros = document.getElementById('filtrosAvancados');
            const isHidden = filtros.style.display === 'none';
            filtros.style.display = isHidden ? 'block' : 'none';
        }

        // ============================================
        // MUDAR VIEW
        // ============================================
        function mudarView(view) {
            const container = document.getElementById('orcamentosGrid');
            if (!container) return;

            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === view);
            });

            if (view === 'list') {
                container.classList.add('orcamentos-list-view');
            } else {
                container.classList.remove('orcamentos-list-view');
            }

            localStorage.setItem('geonnexus-orcamentos-view', view);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedView = localStorage.getItem('geonnexus-orcamentos-view');
            if (savedView) mudarView(savedView);
        });

        // ============================================
        // MENU CONTEXTUAL
        // ============================================
        let orcamentoAtualMenu = null;
        let orcamentoAtualNome = null;

        function abrirMenuCard(event, orcamentoId) {
            event.stopPropagation();
            event.preventDefault();

            const menu = document.getElementById('contextMenu');
            const rect = event.target.closest('button').getBoundingClientRect();

            orcamentoAtualMenu = orcamentoId;

            const card = document.querySelector(`.orcamento-card[data-id="${orcamentoId}"]`);
            if (card) {
                orcamentoAtualNome = card.querySelector('.orcamento-titulo').textContent;
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

            document.getElementById('menuVerDetalhes').href = 'orcamento-detalhe.php?id=' + orcamentoId;
            document.getElementById('menuEditar').href = 'orcamento-editar.php?id=' + orcamentoId;
            document.getElementById('menuExcluir').href = 'orcamento-excluir.php?id=' + orcamentoId;
            document.getElementById('menuGerarFatura').href = 'fatura-criar.php?orcamento=' + orcamentoId;
        }

        document.addEventListener('click', function(e) {
            const menu = document.getElementById('contextMenu');
            if (menu && !menu.contains(e.target) && !e.target.closest('.orcamento-actions')) {
                menu.style.display = 'none';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const menu = document.getElementById('contextMenu');
                if (menu) menu.style.display = 'none';
                fecharModal('modalConfirmacao');
            }
        });

        // Ações do menu
        document.addEventListener('DOMContentLoaded', function() {
            const menuDuplicar = document.getElementById('menuDuplicar');
            const menuEnviar = document.getElementById('menuEnviar');
            const menuPDF = document.getElementById('menuPDF');
            const menuExcluir = document.getElementById('menuExcluir');

            if (menuDuplicar) {
                menuDuplicar.addEventListener('click', function(e) {
                    e.preventDefault();
                    mostrarToast('Orçamento duplicado com sucesso!', 'success');
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuEnviar) {
                menuEnviar.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (orcamentoAtualMenu) enviarOrcamento(orcamentoAtualMenu);
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuPDF) {
                menuPDF.addEventListener('click', function(e) {
                    e.preventDefault();
                    mostrarToast('A gerar PDF do orçamento...', 'info');
                    document.getElementById('contextMenu').style.display = 'none';
                });
            }

            if (menuExcluir) {
                menuExcluir.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('contextMenu').style.display = 'none';
                    
                    if (orcamentoAtualNome && orcamentoAtualMenu) {
                        const modal = document.getElementById('modalConfirmacao');
                        const body = document.getElementById('modalConfirmacaoBody');
                        
                        body.innerHTML = `
                            <div class="modal-alerta-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                <div>
                                    <strong>Excluir Orçamento</strong>
                                    <span>Tem certeza que deseja excluir "${orcamentoAtualNome}"? Esta ação não pode ser desfeita.</span>
                                </div>
                            </div>
                        `;
                        
                        document.getElementById('modalConfirmacaoBtn').onclick = function() {
                            fecharModal('modalConfirmacao');
                            mostrarToast('Orçamento excluído!', 'error');
                            setTimeout(() => window.location.href = 'orcamento-excluir.php?id=' + orcamentoAtualMenu, 800);
                        };
                        
                        modal.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    }
                });
            }
        });

        // ============================================
        // ENVIAR ORÇAMENTO
        // ============================================
        function enviarOrcamento(id) {
            mostrarToast('Orçamento enviado ao cliente!', 'success');
        }

        // ============================================
        // CONFIRMAR EXCLUSÃO
        // ============================================
        function confirmarExclusao(event, nome, id) {
            event.preventDefault();
            
            const modal = document.getElementById('modalConfirmacao');
            const body = document.getElementById('modalConfirmacaoBody');
            
            body.innerHTML = `
                <div class="modal-alerta-danger">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>Excluir Orçamento</strong>
                        <span>Tem certeza que deseja excluir "${nome}"? Esta ação não pode ser desfeita.</span>
                    </div>
                </div>
            `;
            
            document.getElementById('modalConfirmacaoBtn').onclick = function() {
                fecharModal('modalConfirmacao');
                mostrarToast('Orçamento excluído!', 'error');
                setTimeout(() => window.location.href = 'orcamento-excluir.php?id=' + id, 800);
            };
            
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            
            return false;
        }

        // ============================================
        // MODAL
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
            background: linear-gradient(180deg, #6C2BD9 0%, #00D2FF 100%);
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

        .header-left h1 .icon { color: #6C2BD9; font-size: 0.85em; }

        .badge-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 32px;
            height: 32px;
            padding: 0 10px;
            background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
            color: #FFFFFF;
            border-radius: var(--radius-full);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(108, 43, 217, 0.3);
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
        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .stat-card .icon.red { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }

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

        .stat-card .trend.up { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .stat-card .trend.down { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .stat-card .trend.neutral { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        /* ========================================== */
        /* RESUMO FINANCEIRO                          */
        /* ========================================== */
        .resumo-financeiro {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .resumo-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md) var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .resumo-item:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .resumo-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .resumo-icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .resumo-icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .resumo-icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }

        .resumo-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .resumo-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .resumo-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
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
            border-color: #6C2BD9;
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
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
        .view-btn.active { background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%); color: #FFFFFF; }

        .filtros-status {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
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

        .filtro-status:hover { border-color: #6C2BD9; color: var(--text-primary); }
        .filtro-status.active {
            background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
            color: #FFFFFF;
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

        .filtros-avancados {
            padding-top: var(--space-md);
            margin-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .filtros-avancados .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: var(--space-md);
        }

        .filtros-avancados-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-md);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .resultados-count {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        /* ========================================== */
        /* ORÇAMENTOS GRID                            */
        /* ========================================== */
        .orcamentos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: var(--space-lg);
        }

        .orcamento-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
        }

        .orcamento-card:hover {
            border-color: var(--cat-color, #6C2BD9);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        /* ===== HEADER DO CARD ===== */
        .orcamento-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-md);
            background: linear-gradient(135deg, var(--cat-color, #6C2BD9)08 0%, transparent 100%);
            border-bottom: 1px solid var(--border-color);
            gap: var(--space-sm);
        }

        .orcamento-card-categoria {
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

        .orcamento-codigo {
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
            flex-shrink: 0;
        }

        .badge-status.status-aprovado { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-rascunho { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-status.status-rejeitado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-expirado { background: rgba(255, 159, 67, 0.12); color: #FF9F43; }
        .badge-status.status-cancelado { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        /* ===== CORPO DO CARD ===== */
        .orcamento-card-body {
            padding: var(--space-md);
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        /* Cliente */
        .orcamento-cliente {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .orcamento-cliente img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .orcamento-cliente-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        .orcamento-cliente-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .orcamento-cliente-tipo {
            font-size: 10px;
            color: var(--text-muted);
        }

        /* Título */
        .orcamento-titulo {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Descrição */
        .orcamento-descricao {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Valor */
        .orcamento-valor-section {
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(108, 43, 217, 0.06) 0%, rgba(0, 210, 255, 0.06) 100%);
            border: 1px solid rgba(108, 43, 217, 0.15);
            border-radius: var(--radius-md);
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .orcamento-valor-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .orcamento-valor-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .orcamento-desconto-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 8px;
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 700;
        }

        .orcamento-valor-original {
            font-size: var(--text-sm);
            color: var(--text-muted);
            text-decoration: line-through;
        }

        .orcamento-valor-final {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: #00FFA3;
        }

        /* Detalhes */
        .orcamento-detalhes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
        }

        .orcamento-detalhe-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            gap: var(--space-sm);
        }

        .detalhe-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .detalhe-label i { color: #6C2BD9; font-size: 10px; }

        .detalhe-value {
            font-size: var(--text-xs);
            color: var(--text-primary);
            font-weight: 700;
        }

        /* Timeline */
        .orcamento-timeline {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .timeline-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-xs);
        }

        .timeline-item i {
            width: 14px;
            font-size: 10px;
            flex-shrink: 0;
        }

        .timeline-label {
            color: var(--text-muted);
            min-width: 60px;
        }

        .timeline-value {
            color: var(--text-primary);
            font-weight: 600;
            margin-left: auto;
        }

        /* Validade */
        .orcamento-validade {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: var(--radius-sm);
            font-size: var(--text-xs);
            font-weight: 600;
        }

        .orcamento-validade.normal { background: rgba(0, 210, 255, 0.08); color: #00D2FF; }
        .orcamento-validade.aviso { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .orcamento-validade.urgente { background: rgba(255, 159, 67, 0.12); color: #FF9F43; }
        .orcamento-validade.expirado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }

        /* Condições */
        .orcamento-condicoes {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            font-size: var(--text-xs);
            color: var(--text-secondary);
        }

        .orcamento-condicoes i {
            color: #6C2BD9;
            font-size: 12px;
            flex-shrink: 0;
        }

        /* ===== FOOTER DO CARD ===== */
        .orcamento-card-footer {
            padding: var(--space-md);
            border-top: 1px solid var(--border-color);
            background: var(--bg-input);
        }

        .orcamento-actions {
            display: flex;
            gap: 4px;
            justify-content: flex-end;
            flex-wrap: wrap;
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
            border-color: #6C2BD9;
            color: #6C2BD9;
            background: rgba(108, 43, 217, 0.05);
        }

        .btn-action-primary {
            background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
            color: #FFFFFF;
            border: none;
        }

        .btn-action-primary:hover {
            color: #FFFFFF;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(108, 43, 217, 0.4);
        }

        .btn-action-success {
            border-color: rgba(0, 255, 163, 0.3);
            color: #00FFA3;
        }

        .btn-action-success:hover {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.1);
            transform: scale(1.05);
        }

        .btn-action-danger {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .btn-action-danger:hover {
            border-color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
            transform: scale(1.05);
        }

        /* ========================================== */
        /* LIST VIEW                                  */
        /* ========================================== */
        .orcamentos-grid.orcamentos-list-view {
            grid-template-columns: 1fr;
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
            padding: var(--space-lg) 0;
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

        .page-btn:hover:not(:disabled) { border-color: #6C2BD9; color: #6C2BD9; }
        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        .page-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding: 0 var(--space-sm);
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
        .context-item:hover i { color: #6C2BD9; }

        .context-item-danger { color: #FF6B6B; }
        .context-item-danger i { color: #FF6B6B; }
        .context-item-danger:hover { background: rgba(255, 107, 107, 0.1); }
        .context-item-danger:hover i { color: #FF6B6B; }

        .context-menu hr {
            border: none;
            border-top: 1px solid var(--border-color);
            margin: 4px 0;
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
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .resumo-financeiro { grid-template-columns: 1fr; }
            .orcamentos-grid { grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .orcamentos-grid { grid-template-columns: 1fr; }
            .filtros-avancados .form-row { grid-template-columns: 1fr; }
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
            .orcamento-detalhes { grid-template-columns: 1fr; }
            .orcamento-actions { justify-content: flex-start; }
            .orcamento-actions .btn-action { flex: 1; }
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