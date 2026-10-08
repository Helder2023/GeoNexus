<?php
// painel/individual/financeiro/orcamento-editar.php - Editar Orçamento
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Editar Orçamento';
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
    'descricao' => 'Levantamento topográfico completo da zona norte de Luanda, incluindo 50 hectares de terreno urbano com curvas de nível, pontos georreferenciados e plantas em escala 1:1000.',
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
    'categoria' => 'topografia',
    'categoria_nome' => 'Topografia',
    'status' => 'aprovado',
    'status_label' => 'Aprovado',
    'valor_total' => 350000,
    'valor_desconto' => 0,
    'valor_final' => 350000,
    'validade' => '2026-03-15',
    'data_criacao' => '2026-02-10 10:30:00',
    'data_envio' => '2026-02-10 11:00:00',
    'data_resposta' => '2026-02-12 14:20:00',
    'prazo_execucao' => '30 dias',
    'condicoes_pagamento' => '50% Adiantado / 50% na Entrega',
    'metodo_pagamento' => 'Transferência Bancária',
    'observacoes' => 'Cliente com bom histórico de pagamentos. Projeto de grande importância estratégica.',
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
    ]
];

// ============================================
// LISTA DE CLIENTES
// ============================================
$clientes = [
    ['id' => 1, 'nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'email' => 'contato@construtoraabc.ao', 'telefone' => '+244 222 345 678', 'nif' => '5417896321', 'endereco' => 'Rua Amílcar Cabral, 123 - Luanda'],
    ['id' => 2, 'nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'email' => 'contato@industrialuanda.ao', 'telefone' => '+244 222 456 789', 'nif' => '5417896322', 'endereco' => 'Av. das Indústrias, 456 - Luanda'],
    ['id' => 3, 'nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'email' => 'geral@luanda.gov.ao', 'telefone' => '+244 222 567 890', 'nif' => '5417896323', 'endereco' => 'Largo do Município - Luanda'],
    ['id' => 4, 'nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'email' => 'info@agronegocios.ao', 'telefone' => '+244 222 678 901', 'nif' => '5417896324', 'endereco' => 'Zona Industrial, 789 - Huambo'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'email' => 'contato@mineracaoprogresso.ao', 'telefone' => '+244 222 789 012', 'nif' => '5417896325', 'endereco' => 'Zona Mineira, 321 - Lunda Norte'],
];

// ============================================
// LISTA DE CATEGORIAS
// ============================================
$categorias = [
    ['id' => 'topografia', 'nome' => 'Topografia', 'icon' => 'fa-mountain', 'color' => '#6C2BD9', 'descricao' => 'Levantamentos topográficos'],
    ['id' => 'engenharia', 'nome' => 'Engenharia', 'icon' => 'fa-ruler-combined', 'color' => '#00D2FF', 'descricao' => 'Projetos de engenharia'],
    ['id' => 'cadastro', 'nome' => 'Cadastro', 'icon' => 'fa-home', 'color' => '#FFD93D', 'descricao' => 'Cadastro imobiliário'],
    ['id' => 'gis', 'nome' => 'GIS', 'icon' => 'fa-globe', 'color' => '#00FFA3', 'descricao' => 'Sistemas de informação geográfica'],
    ['id' => 'agricultura', 'nome' => 'Agricultura', 'icon' => 'fa-tractor', 'color' => '#6BCB77', 'descricao' => 'Agricultura de precisão'],
    ['id' => 'mineracao', 'nome' => 'Mineração', 'icon' => 'fa-gem', 'color' => '#FF9F43', 'descricao' => 'Operações mineiras'],
    ['id' => 'petroleo', 'nome' => 'Petróleo & Gás', 'icon' => 'fa-oil-can', 'color' => '#FD79A8', 'descricao' => 'Setor petrolífero'],
    ['id' => 'energia', 'nome' => 'Energia', 'icon' => 'fa-bolt', 'color' => '#FFD93D', 'descricao' => 'Redes elétricas'],
    ['id' => 'urbanismo', 'nome' => 'Urbanismo', 'icon' => 'fa-city', 'color' => '#A29BFE', 'descricao' => 'Planeamento urbano'],
    ['id' => 'transportes', 'nome' => 'Transportes', 'icon' => 'fa-truck', 'color' => '#00CEC9', 'descricao' => 'Logística e rotas'],
    ['id' => 'drones', 'nome' => 'Drones', 'icon' => 'fa-drone', 'color' => '#FF6B6B', 'descricao' => 'Operações com drones'],
    ['id' => 'educacao', 'nome' => 'Educação', 'icon' => 'fa-graduation-cap', 'color' => '#FDCB6E', 'descricao' => 'Formação técnica'],
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

$data_validade = date('Y-m-d', strtotime($orcamento['validade']));
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
                        <i class="fas fa-edit icon" style="color: #6C2BD9;"></i>
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
                        <a href="orcamento-detalhe.php?id=<?php echo $orcamento['id']; ?>"><?php echo $orcamento['codigo']; ?></a>
                        <span class="separator">/</span>
                        <span>Editar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <button type="submit" form="formEditarOrcamento" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Alterações
                    </button>
                    <a href="orcamento-detalhe.php?id=<?php echo $orcamento['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formEditarOrcamento" onsubmit="salvarEdicao(event)">
                <input type="hidden" id="orcamentoId" value="<?php echo $orcamento['id']; ?>">
                
                <!-- ========================================== -->
                <!-- ETAPA 1: INFORMAÇÕES BÁSICAS              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-info-circle"></i> Informações Básicas</h3>
                            <p>Dados gerais do orçamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Código do Orçamento</label>
                                <input type="text" class="form-control" id="codigoOrcamento" 
                                       value="<?php echo $orcamento['codigo']; ?>" readonly>
                                <span class="form-help">Código não editável</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data de Criação</label>
                                <input type="text" class="form-control" id="dataCriacao" 
                                       value="<?php echo formatDateTime($orcamento['data_criacao']); ?>" readonly>
                                <span class="form-help">Data original de criação</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Título do Orçamento <span class="required">*</span></label>
                            <input type="text" class="form-control" id="tituloOrcamento" 
                                   value="<?php echo htmlspecialchars($orcamento['titulo']); ?>" required
                                   maxlength="150">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição do Orçamento <span class="required">*</span></label>
                            <textarea class="form-control" id="descricaoOrcamento" rows="4" required
                                      maxlength="1000"><?php echo htmlspecialchars($orcamento['descricao']); ?></textarea>
                            <div class="char-counter">
                                <span id="descricaoCount"><?php echo mb_strlen($orcamento['descricao']); ?></span> / 1000 caracteres
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Validade da Proposta <span class="required">*</span></label>
                                <input type="date" class="form-control" id="validadeOrcamento" 
                                       value="<?php echo $data_validade; ?>" required>
                                <span class="form-help">Data limite para o cliente aprovar</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Prazo de Execução <span class="required">*</span></label>
                                <input type="text" class="form-control" id="prazoOrcamento" 
                                       value="<?php echo htmlspecialchars($orcamento['prazo_execucao']); ?>" required maxlength="50">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Local de Execução</label>
                            <input type="text" class="form-control" id="localOrcamento" 
                                   value="<?php echo htmlspecialchars($orcamento['local_execucao']); ?>" maxlength="150">
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 2: CATEGORIA DE ATUAÇÃO              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="form-section-header">
                        <div class="section-number">2</div>
                        <div class="section-title">
                            <h3><i class="fas fa-layer-group"></i> Categoria de Atuação</h3>
                            <p>Altere a categoria se necessário</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="setores-grid" id="setoresGrid">
                            <?php foreach ($categorias as $categoria): ?>
                                <div class="setor-card <?php echo $categoria['id'] === $orcamento['categoria'] ? 'selected' : ''; ?>" 
                                     data-setor="<?php echo $categoria['id']; ?>"
                                     data-setor-nome="<?php echo $categoria['nome']; ?>"
                                     onclick="selecionarSetor('<?php echo $categoria['id']; ?>', '<?php echo $categoria['nome']; ?>')"
                                     style="--setor-color: <?php echo $categoria['color']; ?>;">
                                    <div class="setor-card-icon" style="background: <?php echo $categoria['color']; ?>20; color: <?php echo $categoria['color']; ?>;">
                                        <i class="fas <?php echo $categoria['icon']; ?>"></i>
                                    </div>
                                    <div class="setor-card-info">
                                        <span class="setor-card-nome"><?php echo $categoria['nome']; ?></span>
                                        <span class="setor-card-desc"><?php echo $categoria['descricao']; ?></span>
                                    </div>
                                    <div class="setor-card-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" id="setorSelecionado" name="setor" value="<?php echo $orcamento['categoria']; ?>">
                        <input type="hidden" id="setorNomeSelecionado" name="setor_nome" value="<?php echo $orcamento['categoria_nome']; ?>">
                        <input type="hidden" id="setorOriginal" value="<?php echo $orcamento['categoria']; ?>">
                        
                        <div class="form-alerta" id="alertaMudancaSetor" style="display: none;">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <strong>Atenção: Mudança de Categoria</strong>
                                <span>Ao alterar a categoria, o local de trabalho do orçamento será alterado.</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 3: CLIENTE                           -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.15s;">
                    <div class="form-section-header">
                        <div class="section-number">3</div>
                        <div class="section-title">
                            <h3><i class="fas fa-user-tie"></i> Dados do Cliente</h3>
                            <p>Informações do cliente do orçamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <!-- Cliente Atual -->
                        <div class="form-group">
                            <label class="form-label">Cliente Atual <span class="required">*</span></label>
                            <select class="form-control" id="clienteId" onchange="preencherDadosCliente(this.value)">
                                <option value="">-- Selecione um cliente --</option>
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente['id']; ?>"
                                            data-nome="<?php echo $cliente['nome']; ?>"
                                            data-tipo="<?php echo $cliente['tipo']; ?>"
                                            data-email="<?php echo $cliente['email']; ?>"
                                            data-telefone="<?php echo $cliente['telefone']; ?>"
                                            data-nif="<?php echo $cliente['nif']; ?>"
                                            data-endereco="<?php echo $cliente['endereco']; ?>"
                                            <?php echo $cliente['id'] == $orcamento['cliente']['id'] ? 'selected' : ''; ?>>
                                        <?php echo $cliente['nome']; ?> (<?php echo $cliente['tipo']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Card do Cliente Selecionado -->
                        <div class="cliente-preview" id="clientePreview" style="display: flex;">
                            <div class="cliente-preview-avatar">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="cliente-preview-info">
                                <h4 id="previewNome"><?php echo $orcamento['cliente']['nome']; ?></h4>
                                <div class="cliente-preview-meta">
                                    <span><i class="fas fa-envelope"></i> <span id="previewEmail"><?php echo $orcamento['cliente']['email']; ?></span></span>
                                    <span><i class="fas fa-phone"></i> <span id="previewTelefone"><?php echo $orcamento['cliente']['telefone']; ?></span></span>
                                    <span><i class="fas fa-id-card"></i> NIF: <span id="previewNif"><?php echo $orcamento['cliente']['nif']; ?></span></span>
                                    <span><i class="fas fa-map-marker-alt"></i> <span id="previewEndereco"><?php echo $orcamento['cliente']['endereco']; ?></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: ITENS DO ORÇAMENTO                -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-list-check"></i> Itens do Orçamento</h3>
                            <p>Edite os itens que compõem este orçamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="itens-container" id="itensContainer">
                            <?php foreach ($orcamento['itens'] as $index => $item): ?>
                                <div class="item-orcamento" data-item-id="<?php echo $item['id']; ?>">
                                    <div class="item-header">
                                        <span class="item-numero">Item #<?php echo $index + 1; ?></span>
                                        <button type="button" class="item-remove" onclick="removerItem(this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="item-body">
                                        <div class="form-group">
                                            <label class="form-label">Descrição <span class="required">*</span></label>
                                            <input type="text" class="form-control item-descricao" 
                                                   value="<?php echo htmlspecialchars($item['descricao']); ?>" maxlength="200">
                                        </div>
                                        <div class="item-row">
                                            <div class="form-group">
                                                <label class="form-label">Quantidade <span class="required">*</span></label>
                                                <input type="number" class="form-control item-quantidade" 
                                                       value="<?php echo $item['quantidade']; ?>" min="1" step="1"
                                                       oninput="calcularTotal()">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Unidade</label>
                                                <select class="form-control item-unidade">
                                                    <?php 
                                                    $unidades = ['serviço', 'hectare', 'ponto', 'planta', 'hora', 'dia', 'km', 'm²', 'unidade'];
                                                    foreach ($unidades as $unidade): 
                                                    ?>
                                                        <option value="<?php echo $unidade; ?>" <?php echo $item['unidade'] === $unidade ? 'selected' : ''; ?>>
                                                            <?php echo ucfirst($unidade); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Preço Unitário (Kz) <span class="required">*</span></label>
                                                <input type="number" class="form-control item-preco" 
                                                       value="<?php echo $item['preco_unitario']; ?>" min="0" step="1000"
                                                       oninput="calcularTotal()">
                                            </div>
                                            <div class="form-group item-subtotal-group">
                                                <label class="form-label">Subtotal</label>
                                                <div class="item-subtotal-display">Kz <?php echo formatMoney($item['subtotal']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <button type="button" class="btn btn-outline btn-add-item" onclick="adicionarItem()">
                            <i class="fas fa-plus"></i> Adicionar Item
                        </button>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 5: RESUMO FINANCEIRO                 -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.25s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-coins"></i> Resumo Financeiro</h3>
                            <p>Valores e condições de pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="resumo-financeiro-box">
                            <div class="resumo-financeiro-row">
                                <span class="resumo-financeiro-label">Subtotal</span>
                                <span class="resumo-financeiro-value" id="resumoSubtotal">Kz <?php echo formatMoney($orcamento['valor_total']); ?></span>
                            </div>
                            <div class="resumo-financeiro-row">
                                <span class="resumo-financeiro-label">Desconto (Kz)</span>
                                <input type="number" class="form-control resumo-desconto-input" 
                                       id="descontoOrcamento" min="0" step="1000"
                                       value="<?php echo $orcamento['valor_desconto']; ?>" oninput="calcularTotal()">
                            </div>
                            <div class="resumo-financeiro-row resumo-financeiro-total">
                                <span class="resumo-financeiro-label">Total Final</span>
                                <span class="resumo-financeiro-value" id="resumoTotal">Kz <?php echo formatMoney($orcamento['valor_final']); ?></span>
                            </div>
                        </div>

                        <div class="form-row" style="margin-top: var(--space-lg);">
                            <div class="form-group">
                                <label class="form-label">Condições de Pagamento <span class="required">*</span></label>
                                <select class="form-control" id="condicoesPagamento" required>
                                    <?php 
                                    $condicoes = ['À Vista', '50% Adiantado / 50% na Entrega', '30% Adiantado / 70% na Entrega', 'Parcelado em 3x', 'Parcelado em 6x', 'Negociável'];
                                    foreach ($condicoes as $condicao): 
                                    ?>
                                        <option value="<?php echo $condicao; ?>" <?php echo $orcamento['condicoes_pagamento'] === $condicao ? 'selected' : ''; ?>>
                                            <?php echo $condicao; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Método de Pagamento</label>
                                <select class="form-control" id="metodoPagamento">
                                    <option value="">-- Selecione --</option>
                                    <?php 
                                    $metodos = ['Transferência Bancária', 'Multicaixa', 'Depósito Bancário', 'Numerário', 'Cheque'];
                                    foreach ($metodos as $metodo): 
                                    ?>
                                        <option value="<?php echo $metodo; ?>" <?php echo $orcamento['metodo_pagamento'] === $metodo ? 'selected' : ''; ?>>
                                            <?php echo $metodo; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 6: OBSERVAÇÕES E CONFIGURAÇÕES       -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">6</div>
                        <div class="section-title">
                            <h3><i class="fas fa-cog"></i> Observações e Configurações</h3>
                            <p>Notas adicionais e preferências</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">Observações</label>
                            <textarea class="form-control" id="observacoesOrcamento" rows="3" 
                                      maxlength="500"><?php echo htmlspecialchars($orcamento['observacoes']); ?></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Status do Orçamento</label>
                                <select class="form-control" id="statusOrcamento">
                                    <option value="rascunho" <?php echo $orcamento['status'] === 'rascunho' ? 'selected' : ''; ?>>Rascunho</option>
                                    <option value="pendente" <?php echo $orcamento['status'] === 'pendente' ? 'selected' : ''; ?>>Pendente</option>
                                    <option value="aprovado" <?php echo $orcamento['status'] === 'aprovado' ? 'selected' : ''; ?>>Aprovado</option>
                                    <option value="rejeitado" <?php echo $orcamento['status'] === 'rejeitado' ? 'selected' : ''; ?>>Rejeitado</option>
                                    <option value="expirado" <?php echo $orcamento['status'] === 'expirado' ? 'selected' : ''; ?>>Expirado</option>
                                    <option value="cancelado" <?php echo $orcamento['status'] === 'cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Notificar Cliente</label>
                                <div class="checkbox-item" style="border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: var(--space-md);">
                                    <input type="checkbox" id="notificarCliente">
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong>Enviar notificação após guardar</strong>
                                        <small>O cliente será notificado das alterações</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- HISTÓRICO DE ALTERAÇÕES                    -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.32s;">
                    <div class="form-section-header">
                        <div class="section-number"><i class="fas fa-history"></i></div>
                        <div class="section-title">
                            <h3><i class="fas fa-clock"></i> Histórico de Alterações</h3>
                            <p>Últimas modificações deste orçamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="historico-list">
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Orçamento criado</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> Carlos Mendes</span>
                                        <span><i class="far fa-clock"></i> <?php echo formatDateTime($orcamento['data_criacao']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(108, 43, 217, 0.15); color: #6C2BD9;">
                                    <i class="fas fa-paper-plane"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Enviado ao cliente</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> Carlos Mendes</span>
                                        <span><i class="far fa-clock"></i> <?php echo formatDateTime($orcamento['data_envio']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php if ($orcamento['data_resposta']): ?>
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Orçamento aprovado pelo cliente</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> <?php echo $orcamento['cliente']['nome']; ?></span>
                                        <span><i class="far fa-clock"></i> <?php echo formatDateTime($orcamento['data_resposta']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.35s;">
                    <a href="orcamento-detalhe.php?id=<?php echo $orcamento['id']; ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="restaurarValores()">
                        <i class="fas fa-undo"></i> Restaurar
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Guardar Alterações
                    </button>
                </div>
            </form>
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
        // DADOS ORIGINAIS (para restaurar)
        // ============================================
        const dadosOriginais = {
            titulo: <?php echo json_encode($orcamento['titulo']); ?>,
            descricao: <?php echo json_encode($orcamento['descricao']); ?>,
            validade: <?php echo json_encode($data_validade); ?>,
            prazo: <?php echo json_encode($orcamento['prazo_execucao']); ?>,
            local: <?php echo json_encode($orcamento['local_execucao']); ?>,
            categoria: <?php echo json_encode($orcamento['categoria']); ?>,
            categoriaNome: <?php echo json_encode($orcamento['categoria_nome']); ?>,
            clienteId: <?php echo json_encode($orcamento['cliente']['id']); ?>,
            desconto: <?php echo json_encode($orcamento['valor_desconto']); ?>,
            condicoes: <?php echo json_encode($orcamento['condicoes_pagamento']); ?>,
            metodo: <?php echo json_encode($orcamento['metodo_pagamento']); ?>,
            observacoes: <?php echo json_encode($orcamento['observacoes']); ?>,
            status: <?php echo json_encode($orcamento['status']); ?>
        };

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
        // CONTADOR DE CARACTERES
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const descricao = document.getElementById('descricaoOrcamento');
            const count = document.getElementById('descricaoCount');

            if (descricao && count) {
                descricao.addEventListener('input', function() {
                    count.textContent = this.value.length;
                    if (this.value.length > 900) {
                        count.style.color = '#FF6B6B';
                    } else {
                        count.style.color = 'var(--text-muted)';
                    }
                });
            }
        });

        // ============================================
        // SELECIONAR SETOR
        // ============================================
        let setorAtual = dadosOriginais.categoria;
        let setorNomeAtual = dadosOriginais.categoriaNome;
        const setorOriginal = dadosOriginais.categoria;

        function selecionarSetor(setorId, setorNome) {
            document.querySelectorAll('.setor-card').forEach(card => {
                card.classList.remove('selected');
            });

            const card = document.querySelector(`.setor-card[data-setor="${setorId}"]`);
            if (card) {
                card.classList.add('selected');
                setorAtual = setorId;
                setorNomeAtual = setorNome;
                document.getElementById('setorSelecionado').value = setorId;
                document.getElementById('setorNomeSelecionado').value = setorNome;
                
                // Mostrar alerta se mudou de categoria
                const alerta = document.getElementById('alertaMudancaSetor');
                if (setorId !== setorOriginal) {
                    alerta.style.display = 'flex';
                } else {
                    alerta.style.display = 'none';
                }
            }
        }

        // ============================================
        // PREENCHER DADOS DO CLIENTE SELECIONADO
        // ============================================
        function preencherDadosCliente(clienteId) {
            const select = document.getElementById('clienteId');
            const option = select.options[select.selectedIndex];
            const preview = document.getElementById('clientePreview');

            if (!clienteId) {
                preview.style.display = 'none';
                return;
            }

            document.getElementById('previewNome').textContent = option.dataset.nome || '-';
            document.getElementById('previewEmail').textContent = option.dataset.email || '-';
            document.getElementById('previewTelefone').textContent = option.dataset.telefone || '-';
            document.getElementById('previewNif').textContent = option.dataset.nif || '-';
            document.getElementById('previewEndereco').textContent = option.dataset.endereco || '-';

            preview.style.display = 'flex';
        }

        // ============================================
        // ITENS DO ORÇAMENTO
        // ============================================
        let itemCounter = <?php echo count($orcamento['itens']); ?>;

        function adicionarItem() {
            itemCounter++;
            const container = document.getElementById('itensContainer');
            
            const div = document.createElement('div');
            div.className = 'item-orcamento';
            div.dataset.itemId = itemCounter;
            div.innerHTML = `
                <div class="item-header">
                    <span class="item-numero">Item #${itemCounter}</span>
                    <button type="button" class="item-remove" onclick="removerItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="item-body">
                    <div class="form-group">
                        <label class="form-label">Descrição <span class="required">*</span></label>
                        <input type="text" class="form-control item-descricao" 
                               placeholder="Ex: Levantamento topográfico de pontos" maxlength="200">
                    </div>
                    <div class="item-row">
                        <div class="form-group">
                            <label class="form-label">Quantidade <span class="required">*</span></label>
                            <input type="number" class="form-control item-quantidade" 
                                   placeholder="0" min="1" step="1" value="1"
                                   oninput="calcularTotal()">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Unidade</label>
                            <select class="form-control item-unidade">
                                <option value="serviço">Serviço</option>
                                <option value="hectare">Hectare</option>
                                <option value="ponto">Ponto</option>
                                <option value="planta">Planta</option>
                                <option value="hora">Hora</option>
                                <option value="dia">Dia</option>
                                <option value="km">Km</option>
                                <option value="m²">m²</option>
                                <option value="unidade">Unidade</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Preço Unitário (Kz) <span class="required">*</span></label>
                            <input type="number" class="form-control item-preco" 
                                   placeholder="0" min="0" step="1000"
                                   oninput="calcularTotal()">
                        </div>
                        <div class="form-group item-subtotal-group">
                            <label class="form-label">Subtotal</label>
                            <div class="item-subtotal-display">Kz 0</div>
                        </div>
                    </div>
                </div>
            `;
            
            container.appendChild(div);
            div.querySelector('.item-descricao').focus();
        }

        function removerItem(btn) {
            const item = btn.closest('.item-orcamento');
            const container = document.getElementById('itensContainer');
            
            if (container.querySelectorAll('.item-orcamento').length <= 1) {
                mostrarToast('Deve existir pelo menos 1 item no orçamento', 'warning');
                return;
            }
            
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            setTimeout(() => {
                item.remove();
                calcularTotal();
            }, 300);
        }

        // ============================================
        // CALCULAR TOTAL
        // ============================================
        function calcularTotal() {
            const items = document.querySelectorAll('.item-orcamento');
            let subtotal = 0;

            items.forEach(item => {
                const quantidade = parseFloat(item.querySelector('.item-quantidade')?.value) || 0;
                const preco = parseFloat(item.querySelector('.item-preco')?.value) || 0;
                const itemSubtotal = quantidade * preco;
                
                const subtotalDisplay = item.querySelector('.item-subtotal-display');
                if (subtotalDisplay) {
                    subtotalDisplay.textContent = 'Kz ' + formatMoney(itemSubtotal);
                }
                
                subtotal += itemSubtotal;
            });

            const desconto = parseFloat(document.getElementById('descontoOrcamento')?.value) || 0;
            const total = Math.max(0, subtotal - desconto);

            document.getElementById('resumoSubtotal').textContent = 'Kz ' + formatMoney(subtotal);
            document.getElementById('resumoTotal').textContent = 'Kz ' + formatMoney(total);
        }

        function formatMoney(value) {
            return Math.round(value).toLocaleString('pt-AO').replace(/,/g, '.');
        }

        // ============================================
        // RESTAURAR VALORES ORIGINAIS
        // ============================================
        function restaurarValores() {
            mostrarConfirmacao(
                'Restaurar Valores',
                'Tem certeza que deseja restaurar todos os valores originais? As alterações não guardadas serão perdidas.',
                () => {
                    // Restaurar inputs
                    document.getElementById('tituloOrcamento').value = dadosOriginais.titulo;
                    document.getElementById('descricaoOrcamento').value = dadosOriginais.descricao;
                    document.getElementById('descricaoCount').textContent = dadosOriginais.descricao.length;
                    document.getElementById('validadeOrcamento').value = dadosOriginais.validade;
                    document.getElementById('prazoOrcamento').value = dadosOriginais.prazo;
                    document.getElementById('localOrcamento').value = dadosOriginais.local;
                    document.getElementById('clienteId').value = dadosOriginais.clienteId;
                    document.getElementById('descontoOrcamento').value = dadosOriginais.desconto;
                    document.getElementById('condicoesPagamento').value = dadosOriginais.condicoes;
                    document.getElementById('metodoPagamento').value = dadosOriginais.metodo;
                    document.getElementById('observacoesOrcamento').value = dadosOriginais.observacoes;
                    document.getElementById('statusOrcamento').value = dadosOriginais.status;

                    // Restaurar categoria
                    selecionarSetor(dadosOriginais.categoria, dadosOriginais.categoriaNome);

                    // Restaurar cliente preview
                    preencherDadosCliente(dadosOriginais.clienteId);

                    // Recalcular
                    calcularTotal();

                    mostrarToast('Valores restaurados!', 'info');
                    fecharModal('modalConfirmacao');
                }
            );
        }

        // ============================================
        // SALVAR EDIÇÃO
        // ============================================
        function salvarEdicao(event) {
            event.preventDefault();

            // Validar campos obrigatórios
            const titulo = document.getElementById('tituloOrcamento').value.trim();
            const descricao = document.getElementById('descricaoOrcamento').value.trim();
            const validade = document.getElementById('validadeOrcamento').value;
            const prazo = document.getElementById('prazoOrcamento').value.trim();
            const condicoes = document.getElementById('condicoesPagamento').value;
            const clienteId = document.getElementById('clienteId').value;

            if (!titulo) {
                mostrarToast('Insira o título do orçamento!', 'error');
                document.getElementById('tituloOrcamento').focus();
                return;
            }

            if (!descricao) {
                mostrarToast('Insira a descrição do orçamento!', 'error');
                document.getElementById('descricaoOrcamento').focus();
                return;
            }

            if (!validade) {
                mostrarToast('Insira a data de validade!', 'error');
                document.getElementById('validadeOrcamento').focus();
                return;
            }

            if (!prazo) {
                mostrarToast('Insira o prazo de execução!', 'error');
                document.getElementById('prazoOrcamento').focus();
                return;
            }

            if (!condicoes) {
                mostrarToast('Selecione as condições de pagamento!', 'error');
                document.getElementById('condicoesPagamento').focus();
                return;
            }

            if (!clienteId) {
                mostrarToast('Selecione um cliente!', 'error');
                document.getElementById('clienteId').focus();
                return;
            }

            // Validar Itens
            const items = document.querySelectorAll('.item-orcamento');
            let temErro = false;
            let temItem = false;

            items.forEach(item => {
                const descricaoItem = item.querySelector('.item-descricao')?.value.trim();
                const quantidade = parseFloat(item.querySelector('.item-quantidade')?.value) || 0;
                const preco = parseFloat(item.querySelector('.item-preco')?.value) || 0;

                if (descricaoItem && quantidade > 0 && preco > 0) {
                    temItem = true;
                } else if (descricaoItem || quantidade || preco) {
                    temErro = true;
                }
            });

            if (!temItem) {
                mostrarToast('Adicione pelo menos um item completo ao orçamento!', 'error');
                return;
            }

            if (temErro) {
                mostrarToast('Preencha todos os campos dos itens do orçamento!', 'error');
                return;
            }

            // Verificar mudança de categoria
            const mudouCategoria = setorAtual !== setorOriginal;

            if (mudouCategoria) {
                mostrarConfirmacao(
                    'Mudança de Categoria',
                    'Ao alterar a categoria, o local de trabalho do orçamento será alterado. Deseja continuar?',
                    () => {
                        finalizarSalvamento();
                    }
                );
            } else {
                finalizarSalvamento();
            }
        }

        function finalizarSalvamento() {
            fecharModal('modalConfirmacao');
            mostrarToast('Alterações guardadas com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'orcamento-detalhe.php?id=<?php echo $orcamento['id']; ?>';
            }, 1500);
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

        // ============================================
        // INICIALIZAR
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            preencherDadosCliente(dadosOriginais.clienteId);
            calcularTotal();
        });

        // ============================================
        // IMPEDIR SAÍDA ACIDENTAL
        // ============================================
        let formularioAlterado = false;

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input, textarea, select').forEach(el => {
                el.addEventListener('input', () => {
                    if (el.type !== 'hidden' && !el.readOnly) {
                        formularioAlterado = true;
                    }
                });
            });
        });

        window.addEventListener('beforeunload', function(e) {
            if (formularioAlterado) {
                e.preventDefault();
                e.returnValue = '';
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
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
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
        /* FORM SECTIONS                              */
        /* ========================================== */
        .form-section {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .form-section:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .form-section-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            background: rgba(108, 43, 217, 0.02);
        }

        .section-number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
            color: #FFFFFF;
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(108, 43, 217, 0.3);
        }

        .section-number i { font-size: 16px; }

        .section-title h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 2px 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .section-title h3 i { color: #6C2BD9; }

        .section-title p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
        }

        .form-section-body {
            padding: var(--space-lg);
        }

        /* ========================================== */
        /* FORM GROUPS                                */
        /* ========================================== */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: var(--space-md);
        }

        .form-group:last-child { margin-bottom: 0; }

        .form-label {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
        }

        .form-label .required { color: #FF6B6B; margin-left: 2px; }

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
            border-color: #6C2BD9;
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        .form-control:read-only {
            background: var(--bg-card);
            color: var(--text-muted);
            cursor: not-allowed;
        }

        .form-control::placeholder { color: var(--text-muted); }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        select.form-control option {
            background: var(--bg-card);
            color: var(--text-primary);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .form-help {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .form-alerta {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(255, 217, 61, 0.08);
            border: 1px solid rgba(255, 217, 61, 0.25);
            border-radius: var(--radius-md);
            margin-top: var(--space-md);
        }

        .form-alerta i {
            font-size: 20px;
            color: #FFD93D;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .form-alerta div {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .form-alerta strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
        }

        .form-alerta span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .char-counter {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-align: right;
            margin-top: 4px;
        }

        /* ========================================== */
        /* SETORES GRID                               */
        /* ========================================== */
        .setores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: var(--space-sm);
        }

        .setor-card {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .setor-card:hover {
            border-color: var(--setor-color);
            background: var(--bg-card-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .setor-card.selected {
            border-color: var(--setor-color);
            background: linear-gradient(135deg, var(--setor-color)15 0%, transparent 100%);
            box-shadow: 0 0 0 3px var(--setor-color)20;
        }

        .setor-card-icon {
            width: 38px;
            height: 38px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .setor-card:hover .setor-card-icon,
        .setor-card.selected .setor-card-icon {
            transform: scale(1.1);
        }

        .setor-card-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .setor-card-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .setor-card-desc {
            font-size: 10px;
            color: var(--text-muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .setor-card-check {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--setor-color);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            opacity: 0;
            transform: scale(0);
            transition: var(--transition-bounce);
            flex-shrink: 0;
        }

        .setor-card.selected .setor-card-check {
            opacity: 1;
            transform: scale(1);
        }

        /* ========================================== */
        /* CLIENTE PREVIEW                            */
        /* ========================================== */
        .cliente-preview {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(108, 43, 217, 0.06) 0%, rgba(0, 210, 255, 0.06) 100%);
            border: 1px solid rgba(108, 43, 217, 0.2);
            border-radius: var(--radius-md);
            margin-top: var(--space-md);
        }

        .cliente-preview-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6C2BD9 0%, #00D2FF 100%);
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .cliente-preview-info {
            flex: 1;
            min-width: 0;
        }

        .cliente-preview-info h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 6px 0;
        }

        .cliente-preview-meta {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .cliente-preview-meta span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .cliente-preview-meta span i { color: #6C2BD9; }

        /* ========================================== */
        /* ITENS DO ORÇAMENTO                         */
        /* ========================================== */
        .itens-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
            margin-bottom: var(--space-md);
        }

        .item-orcamento {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .item-orcamento:hover {
            border-color: #6C2BD9;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) var(--space-md);
            background: rgba(108, 43, 217, 0.04);
            border-bottom: 1px solid var(--border-color);
        }

        .item-numero {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #6C2BD9;
        }

        .item-remove {
            width: 28px;
            height: 28px;
            border-radius: var(--radius-sm);
            background: transparent;
            border: 1px solid transparent;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: var(--transition-smooth);
        }

        .item-remove:hover {
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
        }

        .item-body {
            padding: var(--space-md);
        }

        .item-row {
            display: grid;
            grid-template-columns: 100px 140px 1fr 160px;
            gap: var(--space-sm);
            align-items: end;
        }

        .item-subtotal-group {
            margin-bottom: 0;
        }

        .item-subtotal-display {
            padding: 10px 14px;
            background: rgba(0, 255, 163, 0.08);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-sm);
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #00FFA3;
            text-align: right;
            white-space: nowrap;
        }

        .btn-add-item {
            width: 100%;
            justify-content: center;
            padding: 12px;
        }

        /* ========================================== */
        /* RESUMO FINANCEIRO                          */
        /* ========================================== */
        .resumo-financeiro-box {
            background: linear-gradient(135deg, rgba(108, 43, 217, 0.05) 0%, rgba(0, 210, 255, 0.05) 100%);
            border: 1px solid rgba(108, 43, 217, 0.15);
            border-radius: var(--radius-md);
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .resumo-financeiro-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) 0;
            border-bottom: 1px solid var(--border-color);
        }

        .resumo-financeiro-row:last-child {
            border-bottom: none;
        }

        .resumo-financeiro-total {
            padding-top: var(--space-md);
            border-top: 2px solid rgba(108, 43, 217, 0.2);
        }

        .resumo-financeiro-label {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            font-weight: 500;
        }

        .resumo-financeiro-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        .resumo-financeiro-total .resumo-financeiro-label {
            font-size: var(--text-body);
            font-weight: 700;
            color: var(--text-primary);
        }

        .resumo-financeiro-total .resumo-financeiro-value {
            font-size: var(--text-h3);
            color: #00FFA3;
        }

        .resumo-desconto-input {
            max-width: 200px;
            text-align: right;
        }

        /* ========================================== */
        /* CHECKBOX                                   */
        /* ========================================== */
        .checkbox-item {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .checkbox-item input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .checkbox-mark {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition-smooth);
            margin-top: 2px;
        }

        .checkbox-item input[type="checkbox"]:checked + .checkbox-mark {
            background: #6C2BD9;
            border-color: #6C2BD9;
        }

        .checkbox-item input[type="checkbox"]:checked + .checkbox-mark::after {
            content: '✓';
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
        }

        .checkbox-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .checkbox-content strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
        }

        .checkbox-content small {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* HISTÓRICO                                  */
        /* ========================================== */
        .historico-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
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
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
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
        /* FORM ACTIONS                               */
        /* ========================================== */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: var(--space-sm);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
            position: sticky;
            bottom: var(--space-md);
            z-index: 100;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-actions .btn {
            padding: 12px 24px;
            font-size: var(--text-sm);
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-lg { padding: 12px 24px; font-size: var(--text-body); }

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
        @media (max-width: 992px) {
            .form-row { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .item-row { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 768px) {
            .form-section-header { flex-direction: column; align-items: flex-start; }
            .section-number { width: 36px; height: 36px; font-size: 15px; }
            .setores-grid { grid-template-columns: 1fr 1fr; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; justify-content: center; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            .item-row { grid-template-columns: 1fr; }
            .resumo-desconto-input { max-width: 100%; }
            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .setores-grid { grid-template-columns: 1fr; }
            .cliente-preview { flex-direction: column; text-align: center; }
            .cliente-preview-meta { justify-content: center; }
            .form-section-body { padding: var(--space-md); }
            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
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