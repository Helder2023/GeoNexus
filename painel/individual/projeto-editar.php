<?php
// painel/individual/projeto-editar.php - Editar Projeto
include "../../includes/individual/notificacoes-individual-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Editar Projeto';
$pagina_atual = 'projeto-editar';

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
    'condicao_pagamento' => '50-50',
    'observacoes_financeiras' => 'Cliente com bom histórico de pagamentos. Parcelamento acordado conforme contrato.',
    'observacoes_gerais' => 'Projeto de grande importância estratégica. Cliente exige relatórios semanais de progresso.',
    'anexos' => [
        ['id' => 1, 'nome' => 'contrato-assinado.pdf', 'tipo' => 'pdf', 'tamanho' => '1.2 MB'],
        ['id' => 2, 'nome' => 'levantamento-pontos.xlsx', 'tipo' => 'xlsx', 'tamanho' => '856 KB'],
        ['id' => 3, 'nome' => 'curvas-nivel.dwg', 'tipo' => 'dwg', 'tamanho' => '5.2 MB']
    ]
];

// ============================================
// LISTA DE CLIENTES PARA O SELECT
// ============================================
$clientes = [
    ['id' => 1, 'nome' => 'Construtora ABC', 'tipo' => 'Empresa', 'email' => 'contato@construtoraabc.ao', 'telefone' => '+244 222 345 678', 'nif' => '5417896321'],
    ['id' => 2, 'nome' => 'Indústria Luanda', 'tipo' => 'Empresa', 'email' => 'contato@industrialuanda.ao', 'telefone' => '+244 222 456 789', 'nif' => '5417896322'],
    ['id' => 3, 'nome' => 'Município de Luanda', 'tipo' => 'Instituição', 'email' => 'geral@luanda.gov.ao', 'telefone' => '+244 222 567 890', 'nif' => '5417896323'],
    ['id' => 4, 'nome' => 'Agro Negócios Lda', 'tipo' => 'Empresa', 'email' => 'info@agronegocios.ao', 'telefone' => '+244 222 678 901', 'nif' => '5417896324'],
    ['id' => 5, 'nome' => 'Mineração Progresso', 'tipo' => 'Empresa', 'email' => 'contato@mineracaoprogresso.ao', 'telefone' => '+244 222 789 012', 'nif' => '5417896325'],
];

// ============================================
// LISTA DOS 12 SETORES
// ============================================
$setores = [
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
                        <i class="fas fa-edit icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status <?php echo $projeto['status'] === 'em_andamento' ? 'status-em-andamento' : 'status-pendente'; ?>">
                            <i class="fas fa-circle"></i>
                            <?php echo $projeto['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="projetos.php">Projetos</a>
                        <span class="separator">/</span>
                        <a href="projeto-detalhe.php?id=<?php echo $projeto['id']; ?>"><?php echo $projeto['codigo']; ?></a>
                        <span class="separator">/</span>
                        <span>Editar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../includes/individual/notificacoes-individual.php" ?>

                    <button type="submit" form="formEditarProjeto" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Alterações
                    </button>
                    <a href="projeto-detalhe.php?id=<?php echo $projeto['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formEditarProjeto" onsubmit="salvarEdicao(event)">
                <input type="hidden" id="projetoId" value="<?php echo $projeto['id']; ?>">

                <!-- ========================================== -->
                <!-- ETAPA 1: INFORMAÇÕES BÁSICAS              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-info-circle"></i> Informações Básicas</h3>
                            <p>Dados gerais do projeto</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Código do Projeto</label>
                                <input type="text" class="form-control" id="codigoProjeto" 
                                       value="<?php echo $projeto['codigo']; ?>" readonly>
                                <span class="form-help">Código não editável</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nome do Projeto <span class="required">*</span></label>
                                <input type="text" class="form-control" id="nomeProjeto" 
                                       value="<?php echo htmlspecialchars($projeto['nome']); ?>" required
                                       maxlength="150">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição do Projeto <span class="required">*</span></label>
                            <textarea class="form-control" id="descricaoProjeto" rows="4" required
                                      maxlength="1000"><?php echo htmlspecialchars($projeto['descricao']); ?></textarea>
                            <div class="char-counter">
                                <span id="descricaoCount"><?php echo mb_strlen($projeto['descricao']); ?></span> / 1000 caracteres
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Data de Início <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataInicio" 
                                       value="<?php echo $projeto['data_inicio']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data de Previsão de Término <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataFim" 
                                       value="<?php echo $projeto['data_fim']; ?>" required>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 2: SETOR DE ATUAÇÃO                  -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="form-section-header">
                        <div class="section-number">2</div>
                        <div class="section-title">
                            <h3><i class="fas fa-layer-group"></i> Setor de Atuação</h3>
                            <p>Altere o setor principal do projeto se necessário</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="setores-grid" id="setoresGrid">
                            <?php foreach ($setores as $setor): ?>
                                <div class="setor-card <?php echo $setor['id'] === $projeto['setor'] ? 'selected' : ''; ?>" 
                                     data-setor="<?php echo $setor['id']; ?>"
                                     onclick="selecionarSetor('<?php echo $setor['id']; ?>')"
                                     style="--setor-color: <?php echo $setor['color']; ?>;">
                                    <div class="setor-card-icon" style="background: <?php echo $setor['color']; ?>20; color: <?php echo $setor['color']; ?>;">
                                        <i class="fas <?php echo $setor['icon']; ?>"></i>
                                    </div>
                                    <div class="setor-card-info">
                                        <span class="setor-card-nome"><?php echo $setor['nome']; ?></span>
                                        <span class="setor-card-desc"><?php echo $setor['descricao']; ?></span>
                                    </div>
                                    <div class="setor-card-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" id="setorSelecionado" name="setor" value="<?php echo $projeto['setor']; ?>" required>
                        <span class="form-error" id="errorSetor" style="display: none;">
                            <i class="fas fa-exclamation-circle"></i> Selecione um setor
                        </span>
                        
                        <div class="form-alerta" id="alertaMudancaSetor" style="display: none;">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <strong>Atenção: Mudança de Setor</strong>
                                <span>Ao mudar o setor, o local de trabalho do projeto será alterado. Os dados do setor anterior não serão migrados automaticamente.</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 3: CLIENTE                           -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="form-section-header">
                        <div class="section-number">3</div>
                        <div class="section-title">
                            <h3><i class="fas fa-user-tie"></i> Dados do Cliente</h3>
                            <p>Altere o cliente vinculado a este projeto</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <!-- Toggle: Cliente Existente / Novo Cliente -->
                        <div class="cliente-toggle">
                            <button type="button" class="toggle-btn active" onclick="mudarTipoCliente('existente', event)">
                                <i class="fas fa-search"></i> Cliente Existente
                            </button>
                            <button type="button" class="toggle-btn" onclick="mudarTipoCliente('novo', event)">
                                <i class="fas fa-user-plus"></i> Novo Cliente
                            </button>
                        </div>

                        <!-- Cliente Existente -->
                        <div id="clienteExistente">
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
                                                <?php echo $cliente['id'] == $projeto['cliente']['id'] ? 'selected' : ''; ?>>
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
                                    <h4 id="previewNome"><?php echo $projeto['cliente']['nome']; ?></h4>
                                    <div class="cliente-preview-meta">
                                        <span><i class="fas fa-envelope"></i> <span id="previewEmail"><?php echo $projeto['cliente']['email']; ?></span></span>
                                        <span><i class="fas fa-phone"></i> <span id="previewTelefone"><?php echo $projeto['cliente']['telefone']; ?></span></span>
                                        <span><i class="fas fa-id-card"></i> NIF: <span id="previewNif"><?php echo $projeto['cliente']['nif']; ?></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Novo Cliente -->
                        <div id="novoCliente" style="display: none;">
                            <div class="form-alerta alerta-info">
                                <i class="fas fa-info-circle"></i>
                                <div>
                                    <strong>Criar Novo Cliente</strong>
                                    <span>O cliente atual será substituído por um novo cliente. Esta ação não pode ser desfeita.</span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nome / Razão Social <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="novoClienteNome" 
                                           placeholder="Ex: Empresa XYZ Lda" maxlength="150">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tipo <span class="required">*</span></label>
                                    <select class="form-control" id="novoClienteTipo">
                                        <option value="">-- Selecione --</option>
                                        <option value="Empresa">Empresa</option>
                                        <option value="Instituição">Instituição</option>
                                        <option value="Profissional">Profissional</option>
                                        <option value="Particular">Particular</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" id="novoClienteEmail" 
                                           placeholder="cliente@email.com">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Telefone <span class="required">*</span></label>
                                    <input type="tel" class="form-control" id="novoClienteTelefone" 
                                           placeholder="+244 923 456 789">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">NIF</label>
                                    <input type="text" class="form-control" id="novoClienteNif" 
                                           placeholder="5417896321" maxlength="20">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="novoClienteEndereco" 
                                           placeholder="Rua, número, cidade" maxlength="200">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: DETALHES FINANCEIROS              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-money-bill-wave"></i> Detalhes Financeiros</h3>
                            <p>Valores e condições de pagamento</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Valor do Projeto <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="valorProjeto" 
                                           value="<?php echo $projeto['valor']; ?>" min="0" step="1000" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Condição de Pagamento</label>
                                <select class="form-control" id="condicaoPagamento">
                                    <option value="avista" <?php echo $projeto['condicao_pagamento'] === 'avista' ? 'selected' : ''; ?>>À Vista</option>
                                    <option value="50-50" <?php echo $projeto['condicao_pagamento'] === '50-50' ? 'selected' : ''; ?>>50% Adiantado / 50% na Entrega</option>
                                    <option value="30-70" <?php echo $projeto['condicao_pagamento'] === '30-70' ? 'selected' : ''; ?>>30% Adiantado / 70% na Entrega</option>
                                    <option value="parcelado" <?php echo $projeto['condicao_pagamento'] === 'parcelado' ? 'selected' : ''; ?>>Parcelado</option>
                                    <option value="outro" <?php echo $projeto['condicao_pagamento'] === 'outro' ? 'selected' : ''; ?>>Outro</option>
                                </select>
                            </div>
                        </div>

                        <!-- Info do valor já pago -->
                        <div class="valor-pago-info">
                            <div class="valor-pago-item">
                                <span class="valor-pago-label">Valor Já Pago</span>
                                <span class="valor-pago-value">Kz <?php echo formatMoney($projeto['valor_pago']); ?></span>
                            </div>
                            <div class="valor-pago-item">
                                <span class="valor-pago-label">Valor Pendente</span>
                                <span class="valor-pago-value" style="color: #FFD93D;">
                                    Kz <?php echo formatMoney($projeto['valor'] - $projeto['valor_pago']); ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Prioridade</label>
                                <select class="form-control" id="prioridadeProjeto">
                                    <option value="baixa" <?php echo $projeto['prioridade'] === 'baixa' ? 'selected' : ''; ?>>Baixa</option>
                                    <option value="media" <?php echo $projeto['prioridade'] === 'media' ? 'selected' : ''; ?>>Média</option>
                                    <option value="alta" <?php echo $projeto['prioridade'] === 'alta' ? 'selected' : ''; ?>>Alta</option>
                                    <option value="urgente" <?php echo $projeto['prioridade'] === 'urgente' ? 'selected' : ''; ?>>Urgente</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status do Projeto</label>
                                <select class="form-control" id="statusProjeto">
                                    <option value="rascunho" <?php echo $projeto['status'] === 'rascunho' ? 'selected' : ''; ?>>Rascunho</option>
                                    <option value="pendente" <?php echo $projeto['status'] === 'pendente' ? 'selected' : ''; ?>>Pendente</option>
                                    <option value="em_andamento" <?php echo $projeto['status'] === 'em_andamento' ? 'selected' : ''; ?>>Em Andamento</option>
                                    <option value="concluido" <?php echo $projeto['status'] === 'concluido' ? 'selected' : ''; ?>>Concluído</option>
                                    <option value="cancelado" <?php echo $projeto['status'] === 'cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Progresso Atual (%)</label>
                                <div class="progresso-slider-container">
                                    <input type="range" class="progresso-slider" id="progressoProjeto" 
                                           min="0" max="100" step="5" value="<?php echo $projeto['progresso']; ?>"
                                           oninput="atualizarProgresso(this.value)">
                                    <div class="progresso-slider-info">
                                        <span class="progresso-slider-value" id="progressoValue"><?php echo $projeto['progresso']; ?>%</span>
                                    </div>
                                </div>
                                <div class="progresso-slider-barra">
                                    <div class="progresso-slider-fill" id="progressoFill" style="width: <?php echo $projeto['progresso']; ?>%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Observações Financeiras</label>
                            <textarea class="form-control" id="observacoesFinanceiras" rows="2" 
                                      maxlength="500"><?php echo htmlspecialchars($projeto['observacoes_financeiras']); ?></textarea>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 5: ANEXOS E OBSERVAÇÕES              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-paperclip"></i> Anexos e Observações</h3>
                            <p>Documentos existentes e novos anexos</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <!-- Anexos Existentes -->
                        <?php if (!empty($projeto['anexos'])): ?>
                            <div class="form-group">
                                <label class="form-label">Anexos Existentes (<?php echo count($projeto['anexos']); ?>)</label>
                                <div class="anexos-existentes">
                                    <?php foreach ($projeto['anexos'] as $anexo): 
                                        $file_icon = getFileIcon($anexo['tipo']);
                                    ?>
                                        <div class="anexo-existente-item">
                                            <div class="anexo-icon" style="background: <?php echo $file_icon['color']; ?>15; color: <?php echo $file_icon['color']; ?>;">
                                                <i class="fas <?php echo $file_icon['icon']; ?>"></i>
                                            </div>
                                            <div class="anexo-info">
                                                <span class="anexo-nome"><?php echo $anexo['nome']; ?></span>
                                                <span class="anexo-tamanho"><?php echo $anexo['tamanho']; ?></span>
                                            </div>
                                            <button type="button" class="anexo-remove" onclick="removerAnexoExistente(<?php echo $anexo['id']; ?>, event)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Novos Anexos -->
                        <div class="form-group">
                            <label class="form-label">Adicionar Novos Anexos</label>
                            <div class="upload-area" onclick="document.getElementById('anexosInput').click()">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Clique para adicionar novos ficheiros</span>
                                <small>PDF, DOC, XLS, JPG, PNG, DWG, ZIP até 20MB</small>
                                <input type="file" id="anexosInput" multiple style="display: none;" 
                                       accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.dwg,.zip,.rar"
                                       onchange="previewAnexos(event)">
                            </div>
                            <div class="anexos-list" id="anexosList"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Observações Gerais</label>
                            <textarea class="form-control" id="observacoesGerais" rows="3" 
                                      maxlength="1000"><?php echo htmlspecialchars($projeto['observacoes_gerais']); ?></textarea>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- HISTÓRICO DE ALTERAÇÕES                    -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.45s;">
                    <div class="form-section-header">
                        <div class="section-number">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="section-title">
                            <h3><i class="fas fa-clock"></i> Histórico de Alterações</h3>
                            <p>Últimas modificações deste projeto</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="historico-list">
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Projeto criado</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> Carlos Mendes</span>
                                        <span><i class="far fa-clock"></i> <?php echo formatDate($projeto['data_criacao']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Última atualização</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> Carlos Mendes</span>
                                        <span><i class="far fa-clock"></i> <?php echo formatDate($projeto['data_atualizacao']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.5s;">
                    <a href="projeto-detalhe.php?id=<?php echo $projeto['id']; ?>" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="restaurarValoresOriginais()">
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
        <div class="modal-content" style="max-width: 450px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i>
                    Confirmar
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body">
                <p id="modalConfirmacaoTexto">Tem certeza que deseja continuar?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-primary" id="modalConfirmacaoBtn">Confirmar</button>
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
            nome: <?php echo json_encode($projeto['nome']); ?>,
            descricao: <?php echo json_encode($projeto['descricao']); ?>,
            dataInicio: <?php echo json_encode($projeto['data_inicio']); ?>,
            dataFim: <?php echo json_encode($projeto['data_fim']); ?>,
            setor: <?php echo json_encode($projeto['setor']); ?>,
            clienteId: <?php echo json_encode($projeto['cliente']['id']); ?>,
            valor: <?php echo json_encode($projeto['valor']); ?>,
            condicaoPagamento: <?php echo json_encode($projeto['condicao_pagamento']); ?>,
            prioridade: <?php echo json_encode($projeto['prioridade']); ?>,
            status: <?php echo json_encode($projeto['status']); ?>,
            progresso: <?php echo json_encode($projeto['progresso']); ?>,
            observacoesFinanceiras: <?php echo json_encode($projeto['observacoes_financeiras']); ?>,
            observacoesGerais: <?php echo json_encode($projeto['observacoes_gerais']); ?>
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
        // CONTADOR DE CARACTERES
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const descricao = document.getElementById('descricaoProjeto');
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
        const setorOriginal = <?php echo json_encode($projeto['setor']); ?>;

        function selecionarSetor(setorId) {
            // Remover seleção anterior
            document.querySelectorAll('.setor-card').forEach(card => {
                card.classList.remove('selected');
            });

            // Adicionar seleção atual
            const card = document.querySelector(`.setor-card[data-setor="${setorId}"]`);
            if (card) {
                card.classList.add('selected');
                document.getElementById('setorSelecionado').value = setorId;
                document.getElementById('errorSetor').style.display = 'none';
                
                // Mostrar alerta se mudou de setor
                const alerta = document.getElementById('alertaMudancaSetor');
                if (setorId !== setorOriginal) {
                    alerta.style.display = 'flex';
                } else {
                    alerta.style.display = 'none';
                }
            }
        }

        // ============================================
        // MUDAR TIPO DE CLIENTE
        // ============================================
        let tipoCliente = 'existente';

        function mudarTipoCliente(tipo, event) {
            tipoCliente = tipo;

            // Atualizar botões
            document.querySelectorAll('.cliente-toggle .toggle-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            if (event && event.target) {
                event.target.closest('.toggle-btn').classList.add('active');
            }

            // Mostrar/esconder secções
            if (tipo === 'existente') {
                document.getElementById('clienteExistente').style.display = 'block';
                document.getElementById('novoCliente').style.display = 'none';
            } else {
                document.getElementById('clienteExistente').style.display = 'none';
                document.getElementById('novoCliente').style.display = 'block';
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

            preview.style.display = 'flex';
        }

        // ============================================
        // PROGRESSO SLIDER
        // ============================================
        function atualizarProgresso(valor) {
            document.getElementById('progressoValue').textContent = valor + '%';
            document.getElementById('progressoFill').style.width = valor + '%';
        }

        // ============================================
        // PREVIEW DE ANEXOS
        // ============================================
        let anexosNovos = [];

        function previewAnexos(event) {
            const files = Array.from(event.target.files);
            const list = document.getElementById('anexosList');

            files.forEach(file => {
                if (file.size > 20 * 1024 * 1024) {
                    mostrarToast(`"${file.name}" excede 20MB`, 'error');
                    return;
                }

                const fileId = 'anexo-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
                anexosNovos.push({ id: fileId, file: file });

                const icon = getFileIcon(file.name);
                const item = document.createElement('div');
                item.className = 'anexo-item';
                item.id = fileId;
                item.innerHTML = `
                    <div class="anexo-icon" style="background: ${icon.color}20; color: ${icon.color};">
                        <i class="fas ${icon.icon}"></i>
                    </div>
                    <div class="anexo-info">
                        <span class="anexo-nome">${file.name}</span>
                        <span class="anexo-tamanho">${formatFileSize(file.size)}</span>
                    </div>
                    <button type="button" class="anexo-remove" onclick="removerAnexo('${fileId}')">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                list.appendChild(item);
            });

            event.target.value = '';
        }

        function removerAnexo(id) {
            const item = document.getElementById(id);
            if (item) {
                item.remove();
                anexosNovos = anexosNovos.filter(a => a.id !== id);
            }
        }

        function removerAnexoExistente(id, event) {
            event.stopPropagation();
            mostrarConfirmacao(
                'Remover Anexo',
                'Tem certeza que deseja remover este anexo? Esta ação não pode ser desfeita após guardar.',
                () => {
                    const item = event.target.closest('.anexo-existente-item');
                    if (item) {
                        item.style.opacity = '0.3';
                        item.style.textDecoration = 'line-through';
                        item.dataset.removido = 'true';
                        mostrarToast('Anexo marcado para remoção', 'warning');
                    }
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function getFileIcon(filename) {
            const ext = filename.split('.').pop().toLowerCase();
            const icons = {
                pdf: { icon: 'fa-file-pdf', color: '#FF6B6B' },
                doc: { icon: 'fa-file-word', color: '#2E86DE' },
                docx: { icon: 'fa-file-word', color: '#2E86DE' },
                xls: { icon: 'fa-file-excel', color: '#00B894' },
                xlsx: { icon: 'fa-file-excel', color: '#00B894' },
                jpg: { icon: 'fa-file-image', color: '#FF9F43' },
                jpeg: { icon: 'fa-file-image', color: '#FF9F43' },
                png: { icon: 'fa-file-image', color: '#FF9F43' },
                dwg: { icon: 'fa-drafting-compass', color: '#6C2BD9' },
                zip: { icon: 'fa-file-archive', color: '#6C5CE7' },
                rar: { icon: 'fa-file-archive', color: '#6C5CE7' }
            };
            return icons[ext] || { icon: 'fa-file', color: '#6B7A8F' };
        }

        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }

        // ============================================
        // RESTAURAR VALORES ORIGINAIS
        // ============================================
        function restaurarValoresOriginais() {
            mostrarConfirmacao(
                'Restaurar Valores',
                'Tem certeza que deseja restaurar todos os valores originais? As alterações não guardadas serão perdidas.',
                () => {
                    // Restaurar inputs
                    document.getElementById('nomeProjeto').value = dadosOriginais.nome;
                    document.getElementById('descricaoProjeto').value = dadosOriginais.descricao;
                    document.getElementById('dataInicio').value = dadosOriginais.dataInicio;
                    document.getElementById('dataFim').value = dadosOriginais.dataFim;
                    document.getElementById('clienteId').value = dadosOriginais.clienteId;
                    document.getElementById('valorProjeto').value = dadosOriginais.valor;
                    document.getElementById('condicaoPagamento').value = dadosOriginais.condicaoPagamento;
                    document.getElementById('prioridadeProjeto').value = dadosOriginais.prioridade;
                    document.getElementById('statusProjeto').value = dadosOriginais.status;
                    document.getElementById('progressoProjeto').value = dadosOriginais.progresso;
                    document.getElementById('observacoesFinanceiras').value = dadosOriginais.observacoesFinanceiras;
                    document.getElementById('observacoesGerais').value = dadosOriginais.observacoesGerais;

                    // Atualizar contador
                    document.getElementById('descricaoCount').textContent = dadosOriginais.descricao.length;

                    // Atualizar progresso
                    atualizarProgresso(dadosOriginais.progresso);

                    // Restaurar setor
                    selecionarSetor(dadosOriginais.setor);

                    // Limpar novos anexos
                    document.getElementById('anexosList').innerHTML = '';
                    anexosNovos = [];

                    // Restaurar cliente preview
                    preencherDadosCliente(dadosOriginais.clienteId);

                    // Restaurar toggle
                    document.querySelectorAll('.cliente-toggle .toggle-btn')[0].click();

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

            const id = document.getElementById('projetoId').value;
            const nome = document.getElementById('nomeProjeto').value.trim();
            const descricao = document.getElementById('descricaoProjeto').value.trim();
            const setor = document.getElementById('setorSelecionado').value;
            const dataInicio = document.getElementById('dataInicio').value;
            const dataFim = document.getElementById('dataFim').value;
            const valor = parseFloat(document.getElementById('valorProjeto').value);

            // Validações
            if (!nome || !descricao) {
                mostrarToast('Nome e descrição são obrigatórios!', 'error');
                return;
            }

            if (!setor) {
                document.getElementById('errorSetor').style.display = 'flex';
                mostrarToast('Selecione um setor!', 'error');
                document.querySelector('.setor-card').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            if (new Date(dataFim) < new Date(dataInicio)) {
                mostrarToast('A data de término não pode ser anterior à data de início!', 'error');
                return;
            }

            if (!valor || valor <= 0) {
                mostrarToast('Insira um valor válido!', 'error');
                return;
            }

            // Validar cliente
            if (tipoCliente === 'existente') {
                const clienteId = document.getElementById('clienteId').value;
                if (!clienteId) {
                    mostrarToast('Selecione um cliente!', 'error');
                    return;
                }
            } else {
                const nome = document.getElementById('novoClienteNome').value.trim();
                const tipo = document.getElementById('novoClienteTipo').value;
                const email = document.getElementById('novoClienteEmail').value.trim();
                const telefone = document.getElementById('novoClienteTelefone').value.trim();

                if (!nome || !tipo || !email || !telefone) {
                    mostrarToast('Preencha todos os campos obrigatórios do novo cliente!', 'error');
                    return;
                }

                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    mostrarToast('Email do cliente inválido!', 'error');
                    return;
                }
            }

            // Detetar se houve mudança de setor
            const mudouSetor = setor !== setorOriginal;

            if (mudouSetor) {
                mostrarConfirmacao(
                    'Mudança de Setor',
                    'Ao mudar o setor, o local de trabalho do projeto será alterado. Os dados existentes não serão migrados automaticamente. Deseja continuar?',
                    () => {
                        finalizarSalvamento(id, mudouSetor);
                    }
                );
            } else {
                finalizarSalvamento(id, false);
            }
        }

        function finalizarSalvamento(id, mudouSetor) {
            fecharModal('modalConfirmacao');
            
            mostrarToast('Alterações guardadas com sucesso!', 'success');
            
            if (mudouSetor) {
                mostrarToast('Setor alterado. A redirecionar...', 'info');
            }

            setTimeout(() => {
                window.location.href = 'projeto-detalhe.php?id=' + id;
            }, 1500);
        }

        // ============================================
        // MODAIS
        // ============================================
        let callbackConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            document.getElementById('modalConfirmacaoTexto').textContent = mensagem;
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

        document.getElementById('modalConfirmacaoBtn').addEventListener('click', function() {
            if (typeof callbackConfirmacao === 'function') {
                callbackConfirmacao();
            }
        });

        // Fechar com ESC
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

        .header-left h1 .icon { color: #00D2FF; font-size: 0.85em; }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
        }

        .badge-status.status-em-andamento { background: rgba(0, 210, 255, 0.12); color: #00D2FF; }
        .badge-status.status-pendente { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-concluido { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-cancelado { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status i { font-size: 8px; animation: pulse 2s ease-in-out infinite; }

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
            background: rgba(0, 210, 255, 0.02);
        }

        .section-number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.3);
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

        .section-title h3 i { color: #00D2FF; }

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
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
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

        .form-error {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: var(--text-sm);
            color: #FF6B6B;
            padding: 8px 12px;
            background: rgba(255, 107, 107, 0.08);
            border-radius: var(--radius-sm);
            border: 1px solid rgba(255, 107, 107, 0.2);
            margin-top: var(--space-sm);
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

        .form-alerta.alerta-info {
            background: rgba(0, 210, 255, 0.08);
            border-color: rgba(0, 210, 255, 0.25);
        }

        .form-alerta i {
            font-size: 20px;
            color: #FFD93D;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .form-alerta.alerta-info i { color: #00D2FF; }

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
        /* INPUT GROUP                                */
        /* ========================================== */
        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group .input-group-text {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
            padding: 10px 14px;
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 600;
            white-space: nowrap;
        }

        .input-group .form-control {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
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
        /* CLIENTE TOGGLE                             */
        /* ========================================== */
        .cliente-toggle {
            display: flex;
            gap: 4px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 4px;
            margin-bottom: var(--space-md);
        }

        .toggle-btn {
            flex: 1;
            padding: 10px 16px;
            background: transparent;
            border: none;
            border-radius: var(--radius-sm);
            color: var(--text-muted);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .toggle-btn:hover {
            color: var(--text-primary);
            background: var(--bg-card-hover);
        }

        .toggle-btn.active {
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            color: #FFFFFF;
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.25);
        }

        /* ========================================== */
        /* CLIENTE PREVIEW                            */
        /* ========================================== */
        .cliente-preview {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 210, 255, 0.06) 0%, rgba(108, 43, 217, 0.06) 100%);
            border: 1px solid rgba(0, 210, 255, 0.2);
            border-radius: var(--radius-md);
            margin-top: var(--space-md);
        }

        .cliente-preview-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
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

        .cliente-preview-meta span i { color: #00D2FF; }

        /* ========================================== */
        /* VALOR PAGO INFO                            */
        /* ========================================== */
        .valor-pago-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
        }

        .valor-pago-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .valor-pago-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .valor-pago-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        /* ========================================== */
        /* PROGRESSO SLIDER                           */
        /* ========================================== */
        .progresso-slider-container {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            margin-bottom: 8px;
        }

        .progresso-slider {
            flex: 1;
            -webkit-appearance: none;
            appearance: none;
            height: 6px;
            border-radius: 3px;
            background: var(--bg-input);
            outline: none;
            cursor: pointer;
        }

        .progresso-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            cursor: pointer;
            border: 3px solid var(--bg-card);
            box-shadow: 0 2px 8px rgba(0, 210, 255, 0.4);
        }

        .progresso-slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00D2FF 0%, #6C2BD9 100%);
            cursor: pointer;
            border: 3px solid var(--bg-card);
            box-shadow: 0 2px 8px rgba(0, 210, 255, 0.4);
        }

        .progresso-slider-info {
            min-width: 50px;
            text-align: right;
        }

        .progresso-slider-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00D2FF;
        }

        .progresso-slider-barra {
            height: 4px;
            background: var(--bg-input);
            border-radius: 2px;
            overflow: hidden;
        }

        .progresso-slider-fill {
            height: 100%;
            background: linear-gradient(90deg, #00D2FF 0%, #6C2BD9 100%);
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        /* ========================================== */
        /* UPLOAD AREA                                */
        /* ========================================== */
        .upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-xl);
            background: var(--bg-input);
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: center;
        }

        .upload-area:hover {
            border-color: #00D2FF;
            background: rgba(0, 210, 255, 0.02);
        }

        .upload-area i {
            font-size: 36px;
            color: #00D2FF;
            margin-bottom: 4px;
        }

        .upload-area span {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        .upload-area small {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* ANEXOS EXISTENTES                          */
        /* ========================================== */
        .anexos-existentes {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .anexo-existente-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .anexo-existente-item:hover {
            border-color: #00D2FF;
        }

        /* ========================================== */
        /* ANEXOS LIST (novos)                        */
        /* ========================================== */
        .anexos-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            margin-top: var(--space-md);
        }

        .anexo-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            transition: var(--transition-smooth);
        }

        .anexo-item:hover {
            border-color: #00D2FF;
        }

        .anexo-icon {
            width: 36px;
            height: 36px;
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
            font-weight: 500;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .anexo-tamanho {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .anexo-remove {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: transparent;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
            flex-shrink: 0;
        }

        .anexo-remove:hover {
            background: rgba(255, 107, 107, 0.1);
            color: #FF6B6B;
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
            background: rgba(0,0,0,0.6);
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
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
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

        .modal-close:hover { color: var(--text-primary); transform: rotate(90deg); }

        .modal-body { padding: 24px; }
        .modal-body p { font-size: var(--text-sm); color: var(--text-secondary); line-height: 1.6; margin: 0; }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 100px; justify-content: center; }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 992px) {
            .form-row { grid-template-columns: 1fr; }
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
        }

        @media (max-width: 768px) {
            .form-section-header { flex-direction: column; align-items: flex-start; }
            .section-number { width: 36px; height: 36px; font-size: 15px; }
            .setores-grid { grid-template-columns: 1fr 1fr; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; justify-content: center; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            .valor-pago-info { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .setores-grid { grid-template-columns: 1fr; }
            .cliente-toggle { flex-direction: column; }
            .cliente-preview { flex-direction: column; text-align: center; }
            .cliente-preview-meta { justify-content: center; }
            .form-section-body { padding: var(--space-md); }
            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
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

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>