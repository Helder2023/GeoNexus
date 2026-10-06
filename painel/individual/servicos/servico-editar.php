<?php
// painel/individual/servicos/servico-editar.php - Editar Serviço
include "../../../includes/individual/notificacoes-servicos-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Editar Serviço';
$pagina_atual = 'servico-editar';

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
    'categoria' => 'topografia',
    'categoria_nome' => 'Topografia',
    'categoria_icon' => 'fa-mountain',
    'categoria_color' => '#6C2BD9',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'disponibilidade' => 'disponivel',
    'preco_base' => 350000,
    'unidade' => 'por hectare',
    'duracao' => '15-30 dias',
    'prazo_minimo' => 15,
    'condicoes_pagamento' => '50-50',
    'observacoes_internas' => 'Cliente com bom histórico. Serviço estratégico para o negócio.',
    'entregaveis' => [
        'Planta topográfica em escala 1:1000',
        'Pontos georreferenciados em WGS84',
        'Relatório técnico completo',
        'Ficheiros em formato DWG, PDF e XLSX'
    ],
    'requisitos' => [
        'Acesso livre ao terreno',
        'Documentação do cliente (autorização)'
    ],
    'galeria' => [
        'servico-topografia-1.jpg',
        'servico-topografia-2.jpg',
        'servico-topografia-3.jpg'
    ],
    'destaque' => true,
    'popular' => true,
    'urgente' => false,
    'visualizacoes' => 245,
    'contratacoes' => 12,
    'avaliacao' => 4.9,
    'total_avaliacoes' => 18,
    'data_criacao' => '2025-06-15 10:30:00',
    'data_atualizacao' => '2026-02-18 14:20:00'
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
                        <i class="fas fa-edit icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                        <span class="badge-status <?php echo getStatusClass($servico['status']); ?>">
                            <i class="fas fa-circle"></i>
                            <?php echo $servico['status_label']; ?>
                        </span>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Serviços</a>
                        <span class="separator">/</span>
                        <a href="servico-detalhe.php?id=<?php echo $servico['id']; ?>"><?php echo $servico['codigo']; ?></a>
                        <span class="separator">/</span>
                        <span>Editar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-servicos.php" ?>

                    <button type="submit" form="formEditarServico" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Alterações
                    </button>
                    <a href="servico-detalhe.php?id=<?php echo $servico['id']; ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formEditarServico" onsubmit="salvarEdicao(event)" enctype="multipart/form-data">
                <input type="hidden" id="servicoId" value="<?php echo $servico['id']; ?>">

                <!-- ========================================== -->
                <!-- ETAPA 1: INFORMAÇÕES BÁSICAS              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-info-circle"></i> Informações Básicas</h3>
                            <p>Dados gerais do serviço</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Código do Serviço</label>
                                <input type="text" class="form-control" id="codigoServico" 
                                       value="<?php echo $servico['codigo']; ?>" readonly>
                                <span class="form-help">Código não editável</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nome do Serviço <span class="required">*</span></label>
                                <input type="text" class="form-control" id="nomeServico" 
                                       value="<?php echo htmlspecialchars($servico['nome']); ?>" required
                                       maxlength="150">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição do Serviço <span class="required">*</span></label>
                            <textarea class="form-control" id="descricaoServico" rows="5" required
                                      maxlength="2000"><?php echo htmlspecialchars($servico['descricao']); ?></textarea>
                            <div class="char-counter">
                                <span id="descricaoCount"><?php echo mb_strlen($servico['descricao']); ?></span> / 2000 caracteres
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Resumo Curto</label>
                            <input type="text" class="form-control" id="resumoServico" 
                                   value="<?php echo htmlspecialchars($servico['resumo']); ?>"
                                   placeholder="Uma frase curta para exibir nos cards (máx. 150 caracteres)"
                                   maxlength="150">
                            <span class="form-help">Este texto aparece nos cards e nas pesquisas</span>
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
                            <p>Altere a categoria do serviço se necessário</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="setores-grid" id="setoresGrid">
                            <?php foreach ($categorias as $categoria): ?>
                                <div class="setor-card <?php echo $categoria['id'] === $servico['categoria'] ? 'selected' : ''; ?>" 
                                     data-setor="<?php echo $categoria['id']; ?>"
                                     onclick="selecionarSetor('<?php echo $categoria['id']; ?>')"
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
                        <input type="hidden" id="setorSelecionado" name="setor" value="<?php echo $servico['categoria']; ?>" required>
                        <span class="form-error" id="errorSetor" style="display: none;">
                            <i class="fas fa-exclamation-circle"></i> Selecione uma categoria
                        </span>
                        
                        <div class="form-alerta" id="alertaMudancaCategoria" style="display: none;">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <strong>Atenção: Mudança de Categoria</strong>
                                <span>Ao mudar a categoria, a cor e o ícone do serviço serão alterados. Os dados existentes não serão migrados automaticamente.</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 3: PREÇOS E DURAÇÃO                  -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="form-section-header">
                        <div class="section-number">3</div>
                        <div class="section-title">
                            <h3><i class="fas fa-coins"></i> Preços e Duração</h3>
                            <p>Valores e condições do serviço</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Preço Base <span class="required">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Kz</span>
                                    <input type="number" class="form-control" id="precoBase" 
                                           value="<?php echo $servico['preco_base']; ?>" 
                                           min="0" step="1000" required
                                           oninput="calcularPrecos(this.value)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Unidade de Cobrança <span class="required">*</span></label>
                                <select class="form-control" id="unidadeCobranca" required>
                                    <option value="">-- Selecione --</option>
                                    <option value="por hectare" <?php echo $servico['unidade'] === 'por hectare' ? 'selected' : ''; ?>>Por Hectare</option>
                                    <option value="por projeto" <?php echo $servico['unidade'] === 'por projeto' ? 'selected' : ''; ?>>Por Projeto</option>
                                    <option value="por propriedade" <?php echo $servico['unidade'] === 'por propriedade' ? 'selected' : ''; ?>>Por Propriedade</option>
                                    <option value="por voo" <?php echo $servico['unidade'] === 'por voo' ? 'selected' : ''; ?>>Por Voo</option>
                                    <option value="por área" <?php echo $servico['unidade'] === 'por área' ? 'selected' : ''; ?>>Por Área</option>
                                    <option value="por modelo" <?php echo $servico['unidade'] === 'por modelo' ? 'selected' : ''; ?>>Por Modelo</option>
                                    <option value="por hora" <?php echo $servico['unidade'] === 'por hora' ? 'selected' : ''; ?>>Por Hora</option>
                                    <option value="por dia" <?php echo $servico['unidade'] === 'por dia' ? 'selected' : ''; ?>>Por Dia</option>
                                    <option value="por km" <?php echo $servico['unidade'] === 'por km' ? 'selected' : ''; ?>>Por Km</option>
                                    <option value="por mês" <?php echo $servico['unidade'] === 'por mês' ? 'selected' : ''; ?>>Por Mês</option>
                                </select>
                            </div>
                        </div>

                        <!-- Sugestões de preço -->
                        <div class="preco-sugestoes">
                            <span class="preco-sugestoes-label">Sugestões rápidas:</span>
                            <button type="button" class="preco-sugestao-btn" onclick="setPreco(150000)">150.000</button>
                            <button type="button" class="preco-sugestao-btn" onclick="setPreco(250000)">250.000</button>
                            <button type="button" class="preco-sugestao-btn" onclick="setPreco(350000)">350.000</button>
                            <button type="button" class="preco-sugestao-btn" onclick="setPreco(500000)">500.000</button>
                            <button type="button" class="preco-sugestao-btn" onclick="setPreco(750000)">750.000</button>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Duração Estimada</label>
                                <input type="text" class="form-control" id="duracaoServico" 
                                       value="<?php echo htmlspecialchars($servico['duracao']); ?>"
                                       placeholder="Ex: 15-30 dias" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Prazo Mínimo (dias)</label>
                                <input type="number" class="form-control" id="prazoMinimo" 
                                       value="<?php echo $servico['prazo_minimo']; ?>"
                                       placeholder="0" min="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Condições de Pagamento</label>
                            <select class="form-control" id="condicoesPagamento">
                                <option value="">-- Selecione --</option>
                                <option value="avista" <?php echo $servico['condicoes_pagamento'] === 'avista' ? 'selected' : ''; ?>>À Vista</option>
                                <option value="50-50" <?php echo $servico['condicoes_pagamento'] === '50-50' ? 'selected' : ''; ?>>50% Adiantado / 50% na Entrega</option>
                                <option value="30-70" <?php echo $servico['condicoes_pagamento'] === '30-70' ? 'selected' : ''; ?>>30% Adiantado / 70% na Entrega</option>
                                <option value="parcelado" <?php echo $servico['condicoes_pagamento'] === 'parcelado' ? 'selected' : ''; ?>>Parcelado</option>
                                <option value="negociavel" <?php echo $servico['condicoes_pagamento'] === 'negociavel' ? 'selected' : ''; ?>>Negociável</option>
                            </select>
                        </div>

                        <!-- Pré-visualização de preços -->
                        <div class="preco-preview" id="precoPreview" style="display: grid;">
                            <div class="preco-preview-item">
                                <span class="preco-preview-label">Preço Base</span>
                                <span class="preco-preview-valor" id="previewPrecoBase">Kz <?php echo formatMoney($servico['preco_base']); ?></span>
                            </div>
                            <div class="preco-preview-item">
                                <span class="preco-preview-label">+ IVA (14%)</span>
                                <span class="preco-preview-valor" id="previewIva">Kz <?php echo formatMoney($servico['preco_base'] * 0.14); ?></span>
                            </div>
                            <div class="preco-preview-item preco-preview-total">
                                <span class="preco-preview-label">Total</span>
                                <span class="preco-preview-valor" id="previewTotal">Kz <?php echo formatMoney($servico['preco_base'] * 1.14); ?></span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: IMAGENS                           -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-image"></i> Imagens do Serviço</h3>
                            <p>Imagens de capa, apresentação e galeria</p>
                        </div>
                    </div>
                    <div class="form-section-body">

                        <!-- ===== IMAGEM DE CAPA ===== -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-image" style="color: #00FFA3;"></i>
                                Imagem de Capa (Banner)
                            </label>
                            <div class="imagem-capa-upload" id="imagemCapaUpload" onclick="document.getElementById('imagemCapaInput').click()">
                                <div class="imagem-capa-preview" id="imagemCapaPreview">
                                    <div class="imagem-placeholder-capa">
                                        <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                        <span>Imagem atual do serviço</span>
                                    </div>
                                </div>
                                <input type="file" id="imagemCapaInput" accept="image/*" style="display: none;" onchange="previewImagemCapa(event)">
                                <div class="imagem-capa-overlay" id="imagemCapaOverlay">
                                    <span class="imagem-capa-badge">
                                        <i class="fas fa-star"></i> Capa Atual
                                    </span>
                                    <button type="button" class="imagem-capa-btn-remover" onclick="event.stopPropagation(); removerImagemCapa()">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <span class="form-help">
                                <i class="fas fa-info-circle"></i>
                                Clique para substituir a imagem de capa atual
                            </span>
                        </div>

                        <!-- ===== IMAGEM DE APRESENTAÇÃO ===== -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-camera" style="color: #00D2FF;"></i>
                                Imagem de Apresentação
                            </label>
                            <div class="imagem-upload" id="imagemUpload" onclick="document.getElementById('imagemInput').click()">
                                <div class="imagem-upload-preview" id="imagemUploadPreview">
                                    <div class="imagem-placeholder-apresentacao">
                                        <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                        <span>Imagem de apresentação atual</span>
                                    </div>
                                </div>
                                <input type="file" id="imagemInput" accept="image/*" style="display: none;" onchange="previewImagem(event)">
                            </div>
                            <span class="form-help">
                                <i class="fas fa-info-circle"></i>
                                Clique para substituir a imagem de apresentação
                            </span>
                        </div>

                        <!-- ===== GALERIA DE IMAGENS ===== -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-images" style="color: #6C2BD9;"></i>
                                Galeria de Imagens
                                <span class="badge-count"><?php echo count($servico['galeria']); ?></span>
                            </label>
                            <div class="galeria-existentes" id="galeriaExistentes">
                                <?php foreach ($servico['galeria'] as $index => $imagem): ?>
                                    <div class="galeria-item" id="galeria-item-<?php echo $index; ?>">
                                        <div class="galeria-item-placeholder" style="background: <?php echo $servico['categoria_color']; ?>15; color: <?php echo $servico['categoria_color']; ?>;">
                                            <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                        </div>
                                        <button type="button" class="galeria-remove" onclick="removerGaleriaExistente(<?php echo $index; ?>, event)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="galeria-upload" onclick="document.getElementById('galeriaInput').click()">
                                <i class="fas fa-plus-circle"></i>
                                <span>Adicionar novas imagens à galeria</span>
                                <small>Até 8 imagens no total • JPG, PNG ou WEBP até 5MB cada</small>
                                <input type="file" id="galeriaInput" accept="image/*" multiple style="display: none;" onchange="previewGaleria(event)">
                            </div>
                            <div class="galeria-list" id="galeriaList"></div>
                        </div>

                        <!-- ===== PRÉ-VISUALIZAÇÃO ===== -->
                        <div class="preview-card-section">
                            <div class="preview-card-header">
                                <i class="fas fa-eye"></i>
                                <h4>Pré-visualização do Card</h4>
                                <span class="preview-card-badge">Como o cliente vê</span>
                            </div>
                            <div class="preview-card">
                                <div class="preview-card-capa">
                                    <div class="preview-card-capa-placeholder">
                                        <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                    </div>
                                </div>
                                <div class="preview-card-body">
                                    <div class="preview-card-categoria">
                                        <i class="fas <?php echo $servico['categoria_icon']; ?>"></i>
                                        <span id="previewCategoria"><?php echo $servico['categoria_nome']; ?></span>
                                    </div>
                                    <h5 class="preview-card-titulo" id="previewTitulo"><?php echo $servico['nome']; ?></h5>
                                    <p class="preview-card-descricao" id="previewDescricao"><?php echo mb_substr($servico['descricao'], 0, 100); ?>...</p>
                                    <div class="preview-card-preco">
                                        <span class="preview-card-preco-label">Preço Base</span>
                                        <span class="preview-card-preco-valor" id="previewPreco">Kz <?php echo formatMoney($servico['preco_base']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 5: ENTREGÁVEIS E REQUISITOS          -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-list-check"></i> Entregáveis e Requisitos</h3>
                            <p>O que está incluído e o que é necessário</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">O que está incluído?</label>
                            <div class="entregaveis-container" id="entregaveisContainer">
                                <?php foreach ($servico['entregaveis'] as $entregavel): ?>
                                    <div class="entregavel-item">
                                        <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                                        <input type="text" class="form-control entregavel-input" value="<?php echo htmlspecialchars($entregavel); ?>">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removerEntregavel(this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline btn-add-entregavel" onclick="adicionarEntregavel()">
                                <i class="fas fa-plus"></i> Adicionar Entregável
                            </button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Requisitos do Cliente</label>
                            <div class="requisitos-container" id="requisitosContainer">
                                <?php foreach ($servico['requisitos'] as $requisito): ?>
                                    <div class="requisito-item">
                                        <i class="fas fa-info-circle" style="color: #FFD93D;"></i>
                                        <input type="text" class="form-control requisito-input" value="<?php echo htmlspecialchars($requisito); ?>">
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removerRequisito(this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline btn-add-entregavel" onclick="adicionarRequisito()">
                                <i class="fas fa-plus"></i> Adicionar Requisito
                            </button>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 6: VISIBILIDADE E CONFIGURAÇÕES      -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.5s;">
                    <div class="form-section-header">
                        <div class="section-number">6</div>
                        <div class="section-title">
                            <h3><i class="fas fa-cog"></i> Visibilidade e Configurações</h3>
                            <p>Como o serviço será apresentado</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Status do Serviço</label>
                                <select class="form-control" id="statusServico">
                                    <option value="rascunho" <?php echo $servico['status'] === 'rascunho' ? 'selected' : ''; ?>>Rascunho (não visível)</option>
                                    <option value="ativo" <?php echo $servico['status'] === 'ativo' ? 'selected' : ''; ?>>Ativo (visível para todos)</option>
                                    <option value="inativo" <?php echo $servico['status'] === 'inativo' ? 'selected' : ''; ?>>Inativo (temporariamente oculto)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Disponibilidade</label>
                                <select class="form-control" id="disponibilidadeServico">
                                    <option value="disponivel" <?php echo $servico['disponibilidade'] === 'disponivel' ? 'selected' : ''; ?>>Disponível</option>
                                    <option value="agendado" <?php echo $servico['disponibilidade'] === 'agendado' ? 'selected' : ''; ?>>Apenas por agendamento</option>
                                    <option value="indisponivel" <?php echo $servico['disponibilidade'] === 'indisponivel' ? 'selected' : ''; ?>>Indisponível</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Opções de Destaque</label>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" id="servicoDestaque" <?php echo $servico['destaque'] ? 'checked' : ''; ?>>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-star" style="color: #FFD93D;"></i> Destacar Serviço</strong>
                                        <small>Aparece em destaque na sua página e nas pesquisas</small>
                                    </div>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" id="servicoPopular" <?php echo $servico['popular'] ? 'checked' : ''; ?>>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-fire" style="color: #FF6B6B;"></i> Marcar como Popular</strong>
                                        <small>Aparece na secção "Mais Populares"</small>
                                    </div>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" id="servicoUrgente" <?php echo $servico['urgente'] ? 'checked' : ''; ?>>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-bolt" style="color: #FF9F43;"></i> Serviço Urgente</strong>
                                        <small>Indica que pode ser executado em menos tempo</small>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Observações Internas</label>
                            <textarea class="form-control" id="observacoesInternas" rows="3" 
                                      placeholder="Notas privadas sobre este serviço (não visíveis para o cliente)"
                                      maxlength="500"><?php echo htmlspecialchars($servico['observacoes_internas']); ?></textarea>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- HISTÓRICO DE ALTERAÇÕES                    -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.55s;">
                    <div class="form-section-header">
                        <div class="section-number">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="section-title">
                            <h3><i class="fas fa-clock"></i> Histórico de Alterações</h3>
                            <p>Últimas modificações deste serviço</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="historico-list">
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(0, 210, 255, 0.15); color: #00D2FF;">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Serviço criado</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> Carlos Mendes</span>
                                        <span><i class="far fa-clock"></i> <?php echo formatDateTime($servico['data_criacao']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="historico-item">
                                <div class="historico-icon" style="background: rgba(0, 255, 163, 0.15); color: #00FFA3;">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="historico-conteudo">
                                    <span class="historico-acao">Última atualização</span>
                                    <div class="historico-meta">
                                        <span><i class="fas fa-user"></i> Carlos Mendes</span>
                                        <span><i class="far fa-clock"></i> <?php echo timeAgo($servico['data_atualizacao']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.6s;">
                    <a href="servico-detalhe.php?id=<?php echo $servico['id']; ?>" class="btn btn-outline btn-lg">
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
        <div class="modal-content" style="max-width: 450px; border-color: var(--border-color);">
            <div class="modal-header">
                <h3 class="modal-title" style="color: #FFD93D;">
                    <i class="fas fa-exclamation-triangle"></i>
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
            nome: <?php echo json_encode($servico['nome']); ?>,
            descricao: <?php echo json_encode($servico['descricao']); ?>,
            resumo: <?php echo json_encode($servico['resumo']); ?>,
            categoria: <?php echo json_encode($servico['categoria']); ?>,
            preco_base: <?php echo json_encode($servico['preco_base']); ?>,
            unidade: <?php echo json_encode($servico['unidade']); ?>,
            duracao: <?php echo json_encode($servico['duracao']); ?>,
            prazo_minimo: <?php echo json_encode($servico['prazo_minimo']); ?>,
            condicoes_pagamento: <?php echo json_encode($servico['condicoes_pagamento']); ?>,
            status: <?php echo json_encode($servico['status']); ?>,
            disponibilidade: <?php echo json_encode($servico['disponibilidade']); ?>,
            destaque: <?php echo json_encode($servico['destaque']); ?>,
            popular: <?php echo json_encode($servico['popular']); ?>,
            urgente: <?php echo json_encode($servico['urgente']); ?>,
            observacoes_internas: <?php echo json_encode($servico['observacoes_internas']); ?>
        };

        const categoriaOriginal = <?php echo json_encode($servico['categoria']); ?>;

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
        // CONTADOR DE CARACTERES
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const descricao = document.getElementById('descricaoServico');
            const count = document.getElementById('descricaoCount');

            if (descricao && count) {
                descricao.addEventListener('input', function() {
                    count.textContent = this.value.length;
                    if (this.value.length > 1800) {
                        count.style.color = '#FF6B6B';
                    } else {
                        count.style.color = 'var(--text-muted)';
                    }
                });
            }
        });

        // ============================================
        // SELECIONAR SETOR/CATEGORIA
        // ============================================
        let setorAtual = categoriaOriginal;

        function selecionarSetor(setorId) {
            document.querySelectorAll('.setor-card').forEach(card => {
                card.classList.remove('selected');
            });

            const card = document.querySelector(`.setor-card[data-setor="${setorId}"]`);
            if (card) {
                card.classList.add('selected');
                setorAtual = setorId;
                document.getElementById('setorSelecionado').value = setorId;
                document.getElementById('errorSetor').style.display = 'none';
                
                const alerta = document.getElementById('alertaMudancaCategoria');
                if (setorId !== categoriaOriginal) {
                    alerta.style.display = 'flex';
                } else {
                    alerta.style.display = 'none';
                }

                // Atualizar pré-visualização
                const categoriaData = <?php echo json_encode($categorias); ?>.find(c => c.id === setorId);
                if (categoriaData) {
                    document.getElementById('previewCategoria').textContent = categoriaData.nome;
                }
            }
        }

        // ============================================
        // PREÇO - SUGESTÕES E CÁLCULO
        // ============================================
        function setPreco(valor) {
            document.getElementById('precoBase').value = valor;
            calcularPrecos(valor);
        }

        function calcularPrecos(valor) {
            const precoBase = parseFloat(valor) || 0;
            const iva = precoBase * 0.14;
            const total = precoBase + iva;

            document.getElementById('previewPrecoBase').textContent = 'Kz ' + formatMoney(precoBase);
            document.getElementById('previewIva').textContent = 'Kz ' + formatMoney(iva);
            document.getElementById('previewTotal').textContent = 'Kz ' + formatMoney(total);
            document.getElementById('previewPreco').textContent = 'Kz ' + formatMoney(precoBase);
        }

        function formatMoney(value) {
            return Math.round(value).toLocaleString('pt-AO').replace(/,/g, '.');
        }

        // ============================================
        // IMAGEM DE CAPA
        // ============================================
        function previewImagemCapa(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (file.size > 5 * 1024 * 1024) {
                mostrarToast('A imagem deve ter no máximo 5MB', 'error');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagemCapaPreview');
                preview.innerHTML = `<img src="${e.target.result}" alt="Capa">`;
                preview.style.padding = '0';
                
                const previewCardCapa = document.querySelector('.preview-card-capa');
                previewCardCapa.innerHTML = `<img src="${e.target.result}" alt="Capa">`;

                mostrarToast('Nova imagem de capa carregada!', 'success');
            };
            reader.readAsDataURL(file);
        }

        function removerImagemCapa() {
            mostrarToast('Substitua a imagem clicando no campo de capa', 'info');
        }

        // ============================================
        // IMAGEM DE APRESENTAÇÃO
        // ============================================
        function previewImagem(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (file.size > 5 * 1024 * 1024) {
                mostrarToast('A imagem deve ter no máximo 5MB', 'error');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagemUploadPreview');
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                preview.style.padding = '0';
                mostrarToast('Nova imagem de apresentação carregada!', 'success');
            };
            reader.readAsDataURL(file);
        }

        // ============================================
        // GALERIA
        // ============================================
        let galeriaArquivos = [];
        const totalGaleriaOriginal = <?php echo count($servico['galeria']); ?>;
        let galeriaRemovidos = [];

        function previewGaleria(event) {
            const files = Array.from(event.target.files);
            const list = document.getElementById('galeriaList');

            files.forEach(file => {
                if (file.size > 5 * 1024 * 1024) {
                    mostrarToast(`"${file.name}" excede 5MB`, 'error');
                    return;
                }

                const totalAtual = totalGaleriaOriginal - galeriaRemovidos.length + galeriaArquivos.length;
                if (totalAtual >= 8) {
                    mostrarToast('Máximo de 8 imagens na galeria', 'warning');
                    return;
                }

                const fileId = 'gal-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
                galeriaArquivos.push({ id: fileId, file: file });

                const reader = new FileReader();
                reader.onload = function(e) {
                    const item = document.createElement('div');
                    item.className = 'galeria-item';
                    item.id = fileId;
                    item.innerHTML = `
                        <img src="${e.target.result}" alt="${file.name}">
                        <button type="button" class="galeria-remove" onclick="removerGaleria('${fileId}')">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    list.appendChild(item);
                };
                reader.readAsDataURL(file);
            });

            event.target.value = '';
        }

        function removerGaleria(id) {
            const item = document.getElementById(id);
            if (item) {
                item.remove();
                galeriaArquivos = galeriaArquivos.filter(a => a.id !== id);
            }
        }

        function removerGaleriaExistente(index, event) {
            event.stopPropagation();
            
            const item = document.getElementById('galeria-item-' + index);
            if (item) {
                item.style.transition = 'all 0.3s ease';
                item.style.opacity = '0';
                item.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    item.remove();
                    galeriaRemovidos.push(index);
                    mostrarToast('Imagem removida da galeria', 'warning');
                }, 300);
            }
        }

        // ============================================
        // ENTREGÁVEIS
        // ============================================
        function adicionarEntregavel() {
            const container = document.getElementById('entregaveisContainer');
            const div = document.createElement('div');
            div.className = 'entregavel-item';
            div.innerHTML = `
                <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                <input type="text" class="form-control entregavel-input" placeholder="Novo entregável">
                <button type="button" class="btn btn-sm btn-danger" onclick="removerEntregavel(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(div);
            div.querySelector('input').focus();
        }

        function removerEntregavel(btn) {
            const item = btn.closest('.entregavel-item');
            const container = document.getElementById('entregaveisContainer');

            if (container.querySelectorAll('.entregavel-item').length <= 1) {
                mostrarToast('Deve existir pelo menos 1 entregável', 'warning');
                return;
            }

            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            setTimeout(() => item.remove(), 300);
        }

        function getEntregaveis() {
            const inputs = document.querySelectorAll('.entregavel-input');
            const entregaveis = [];
            inputs.forEach(input => {
                const valor = input.value.trim();
                if (valor) entregaveis.push(valor);
            });
            return entregaveis;
        }

        // ============================================
        // REQUISITOS
        // ============================================
        function adicionarRequisito() {
            const container = document.getElementById('requisitosContainer');
            const div = document.createElement('div');
            div.className = 'requisito-item';
            div.innerHTML = `
                <i class="fas fa-info-circle" style="color: #FFD93D;"></i>
                <input type="text" class="form-control requisito-input" placeholder="Novo requisito">
                <button type="button" class="btn btn-sm btn-danger" onclick="removerRequisito(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(div);
            div.querySelector('input').focus();
        }

        function removerRequisito(btn) {
            const item = btn.closest('.requisito-item');
            const container = document.getElementById('requisitosContainer');

            if (container.querySelectorAll('.requisito-item').length <= 1) {
                mostrarToast('Deve existir pelo menos 1 requisito', 'warning');
                return;
            }

            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'translateX(20px)';
            setTimeout(() => item.remove(), 300);
        }

        function getRequisitos() {
            const inputs = document.querySelectorAll('.requisito-input');
            const requisitos = [];
            inputs.forEach(input => {
                const valor = input.value.trim();
                if (valor) requisitos.push(valor);
            });
            return requisitos;
        }

        // ============================================
        // ATUALIZAR PRÉ-VISUALIZAÇÃO
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const nomeInput = document.getElementById('nomeServico');
            const descricaoInput = document.getElementById('descricaoServico');
            const precoInput = document.getElementById('precoBase');

            if (nomeInput) {
                nomeInput.addEventListener('input', function() {
                    document.getElementById('previewTitulo').textContent = this.value || 'Nome do Serviço';
                });
            }

            if (descricaoInput) {
                descricaoInput.addEventListener('input', function() {
                    const texto = this.value || 'A descrição do serviço aparecerá aqui...';
                    document.getElementById('previewDescricao').textContent = 
                        texto.length > 100 ? texto.substring(0, 100) + '...' : texto;
                });
            }
        });

        // ============================================
        // RESTAURAR VALORES ORIGINAIS
        // ============================================
        function restaurarValores() {
            mostrarConfirmacao(
                'Restaurar Valores',
                'Tem certeza que deseja restaurar todos os valores originais? As alterações não guardadas serão perdidas.',
                () => {
                    document.getElementById('nomeServico').value = dadosOriginais.nome;
                    document.getElementById('descricaoServico').value = dadosOriginais.descricao;
                    document.getElementById('resumoServico').value = dadosOriginais.resumo;
                    document.getElementById('precoBase').value = dadosOriginais.preco_base;
                    document.getElementById('unidadeCobranca').value = dadosOriginais.unidade;
                    document.getElementById('duracaoServico').value = dadosOriginais.duracao;
                    document.getElementById('prazoMinimo').value = dadosOriginais.prazo_minimo;
                    document.getElementById('condicoesPagamento').value = dadosOriginais.condicoes_pagamento;
                    document.getElementById('statusServico').value = dadosOriginais.status;
                    document.getElementById('disponibilidadeServico').value = dadosOriginais.disponibilidade;
                    document.getElementById('servicoDestaque').checked = dadosOriginais.destaque;
                    document.getElementById('servicoPopular').checked = dadosOriginais.popular;
                    document.getElementById('servicoUrgente').checked = dadosOriginais.urgente;
                    document.getElementById('observacoesInternas').value = dadosOriginais.observacoes_internas;

                    // Atualizar contador
                    document.getElementById('descricaoCount').textContent = dadosOriginais.descricao.length;

                    // Atualizar preços
                    calcularPrecos(dadosOriginais.preco_base);

                    // Restaurar categoria
                    selecionarSetor(dadosOriginais.categoria);

                    // Atualizar preview
                    document.getElementById('previewTitulo').textContent = dadosOriginais.nome;
                    document.getElementById('previewDescricao').textContent = 
                        dadosOriginais.descricao.length > 100 ? 
                        dadosOriginais.descricao.substring(0, 100) + '...' : 
                        dadosOriginais.descricao;

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

            const id = document.getElementById('servicoId').value;
            const nome = document.getElementById('nomeServico').value.trim();
            const descricao = document.getElementById('descricaoServico').value.trim();
            const categoria = document.getElementById('setorSelecionado').value;
            const preco = parseFloat(document.getElementById('precoBase').value);
            const unidade = document.getElementById('unidadeCobranca').value;

            // Validações
            if (!nome) {
                mostrarToast('Insira o nome do serviço!', 'error');
                document.getElementById('nomeServico').focus();
                return;
            }

            if (!descricao) {
                mostrarToast('Insira a descrição do serviço!', 'error');
                document.getElementById('descricaoServico').focus();
                return;
            }

            if (!categoria) {
                document.getElementById('errorSetor').style.display = 'flex';
                mostrarToast('Selecione uma categoria!', 'error');
                return;
            }

            if (!preco || preco <= 0) {
                mostrarToast('Insira um preço válido!', 'error');
                document.getElementById('precoBase').focus();
                return;
            }

            if (!unidade) {
                mostrarToast('Selecione a unidade de cobrança!', 'error');
                document.getElementById('unidadeCobranca').focus();
                return;
            }

            // Detetar mudança de categoria
            const mudouCategoria = categoria !== categoriaOriginal;

            // Recolher dados
            const servicoData = {
                id: id,
                nome: nome,
                descricao: descricao,
                resumo: document.getElementById('resumoServico').value.trim(),
                categoria: categoria,
                preco_base: preco,
                unidade: unidade,
                duracao: document.getElementById('duracaoServico').value.trim(),
                prazo_minimo: document.getElementById('prazoMinimo').value,
                condicoes_pagamento: document.getElementById('condicoesPagamento').value,
                entregaveis: getEntregaveis(),
                requisitos: getRequisitos(),
                status: document.getElementById('statusServico').value,
                disponibilidade: document.getElementById('disponibilidadeServico').value,
                destaque: document.getElementById('servicoDestaque').checked,
                popular: document.getElementById('servicoPopular').checked,
                urgente: document.getElementById('servicoUrgente').checked,
                observacoes: document.getElementById('observacoesInternas').value.trim(),
                galeria_removidos: galeriaRemovidos,
                galeria_novos: galeriaArquivos.length,
                mudou_categoria: mudouCategoria
            };

            console.log('Serviço a guardar:', servicoData);

            if (mudouCategoria) {
                mostrarConfirmacao(
                    'Mudança de Categoria',
                    'Ao mudar a categoria, o ícone e a cor do serviço serão alterados. Deseja continuar?',
                    () => {
                        finalizarSalvamento(id, true);
                    }
                );
            } else {
                finalizarSalvamento(id, false);
            }
        }

        function finalizarSalvamento(id, mudouCategoria) {
            fecharModal('modalConfirmacao');
            
            mostrarToast('Alterações guardadas com sucesso!', 'success');
            
            if (mudouCategoria) {
                mostrarToast('Categoria alterada. A redirecionar...', 'info');
            }

            setTimeout(() => {
                window.location.href = 'servico-detalhe.php?id=' + id;
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

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModal('modalConfirmacao');
            }
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
            if (formularioAlterado && !document.querySelector('.modal.active')) {
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

        .header-left h1 .icon { color: #00FFA3; font-size: 0.85em; }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
        }

        .badge-status.status-ativo { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .badge-status.status-inativo { background: rgba(255, 107, 107, 0.12); color: #FF6B6B; }
        .badge-status.status-pausado { background: rgba(255, 217, 61, 0.12); color: #FFD93D; }
        .badge-status.status-rascunho { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        .badge-status i { font-size: 6px; animation: pulse 2s ease-in-out infinite; }

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
            background: rgba(0, 255, 163, 0.02);
        }

        .section-number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0, 255, 163, 0.3);
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

        .section-title h3 i { color: #00FFA3; }

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
            border-color: #00FFA3;
            box-shadow: 0 0 0 3px rgba(0, 255, 163, 0.1);
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
            color: #FFD93D;
        }

        .form-alerta span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
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
        /* PREÇO SUGESTÕES                            */
        /* ========================================== */
        .preco-sugestoes {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-md);
        }

        .preco-sugestoes-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .preco-sugestao-btn {
            padding: 6px 14px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-full);
            color: var(--text-secondary);
            font-family: var(--font-display);
            font-size: var(--text-xs);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .preco-sugestao-btn:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.05);
            transform: translateY(-2px);
        }

        /* ========================================== */
        /* PREÇO PREVIEW                              */
        /* ========================================== */
        .preco-preview {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--space-md);
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.06) 0%, rgba(0, 210, 255, 0.06) 100%);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-md);
            margin-top: var(--space-md);
        }

        .preco-preview-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            text-align: center;
        }

        .preco-preview-item.preco-preview-total {
            border-left: 1px solid var(--border-color);
            padding-left: var(--space-md);
        }

        .preco-preview-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .preco-preview-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
        }

        .preco-preview-total .preco-preview-valor {
            color: #00FFA3;
        }

        /* ========================================== */
        /* IMAGENS                                    */
        /* ========================================== */
        .imagem-capa-upload {
            position: relative;
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            background: var(--bg-input);
            cursor: pointer;
            transition: var(--transition-smooth);
            overflow: hidden;
            aspect-ratio: 2 / 1;
            max-height: 320px;
        }

        .imagem-capa-upload:hover {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.02);
        }

        .imagem-capa-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: var(--space-sm);
            padding: var(--space-2xl);
            text-align: center;
            min-height: 220px;
            height: 100%;
        }

        .imagem-capa-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .imagem-placeholder-capa,
        .imagem-placeholder-apresentacao {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            color: var(--text-muted);
        }

        .imagem-placeholder-capa i,
        .imagem-placeholder-apresentacao i {
            font-size: 56px;
            color: #00FFA3;
            opacity: 0.4;
        }

        .imagem-placeholder-capa span,
        .imagem-placeholder-apresentacao span {
            font-size: var(--text-sm);
            font-weight: 500;
        }

        .imagem-capa-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: var(--space-md);
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.4) 0%, transparent 40%, transparent 60%, rgba(0, 0, 0, 0.4) 100%);
            pointer-events: none;
        }

        .imagem-capa-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(0, 255, 163, 0.4);
        }

        .imagem-capa-btn-remover {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(0, 210, 255, 0.95);
            color: #FFFFFF;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: var(--transition-smooth);
            pointer-events: auto;
        }

        .imagem-capa-btn-remover:hover {
            background: #00D2FF;
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 4px 12px rgba(0, 210, 255, 0.4);
        }

        .imagem-upload {
            position: relative;
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            background: var(--bg-input);
            cursor: pointer;
            transition: var(--transition-smooth);
            overflow: hidden;
        }

        .imagem-upload:hover {
            border-color: #00D2FF;
            background: rgba(0, 210, 255, 0.02);
        }

        .imagem-upload-preview {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: var(--space-sm);
            padding: var(--space-2xl);
            text-align: center;
            min-height: 220px;
        }

        .imagem-upload-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            max-height: 320px;
        }

        /* ========================================== */
        /* GALERIA                                    */
        /* ========================================== */
        .galeria-existentes {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
        }

        .galeria-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-lg);
            background: var(--bg-input);
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: center;
            margin-top: var(--space-md);
        }

        .galeria-upload:hover {
            border-color: #00D2FF;
            background: rgba(0, 210, 255, 0.02);
        }

        .galeria-upload i {
            font-size: 28px;
            color: #00D2FF;
        }

        .galeria-upload span {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .galeria-upload small {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .galeria-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: var(--space-sm);
            margin-top: var(--space-md);
        }

        .galeria-item {
            position: relative;
            border-radius: var(--radius-sm);
            overflow: hidden;
            border: 1px solid var(--border-color);
            aspect-ratio: 1;
        }

        .galeria-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .galeria-item-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .galeria-remove {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: rgba(255, 107, 107, 0.95);
            color: #FFFFFF;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            transition: var(--transition-smooth);
        }

        .galeria-remove:hover {
            transform: scale(1.15);
            background: #FF6B6B;
        }

        /* ========================================== */
        /* PREVIEW CARD                               */
        /* ========================================== */
        .preview-card-section {
            margin-top: var(--space-xl);
            padding-top: var(--space-lg);
            border-top: 2px dashed var(--border-color);
        }

        .preview-card-header {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
        }

        .preview-card-header i {
            font-size: 18px;
            color: #00FFA3;
        }

        .preview-card-header h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            flex: 1;
        }

        .preview-card-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .preview-card {
            max-width: 380px;
            margin: 0 auto;
            background: var(--bg-card);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: var(--transition-smooth);
        }

        .preview-card:hover {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            transform: translateY(-4px);
        }

        .preview-card-capa {
            position: relative;
            height: 160px;
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.1) 0%, rgba(0, 210, 255, 0.05) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .preview-card-capa img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-card-capa-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            color: #00FFA3;
            opacity: 0.3;
        }

        .preview-card-body {
            padding: var(--space-md);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .preview-card-categoria {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 3px 10px;
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            width: fit-content;
        }

        .preview-card-titulo {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.3;
        }

        .preview-card-descricao {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .preview-card-preco {
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-top: 4px;
        }

        .preview-card-preco-label {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .preview-card-preco-valor {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        /* ========================================== */
        /* ENTREGÁVEIS E REQUISITOS                   */
        /* ========================================== */
        .entregaveis-container,
        .requisitos-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            margin-bottom: var(--space-sm);
        }

        .entregavel-item,
        .requisito-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: 8px 12px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            transition: var(--transition-smooth);
        }

        .entregavel-item:hover,
        .requisito-item:hover {
            border-color: #00FFA3;
        }

        .entregavel-item i,
        .requisito-item i {
            font-size: 16px;
            flex-shrink: 0;
        }

        .entregavel-input,
        .requisito-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 4px 0;
            font-size: var(--text-sm);
            color: var(--text-primary);
        }

        .entregavel-input:focus,
        .requisito-input:focus {
            outline: none;
            box-shadow: none;
            border: none;
        }

        .entregavel-item .btn,
        .requisito-item .btn {
            width: 28px;
            height: 28px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
            background: transparent;
            color: var(--text-muted);
            border: 1px solid transparent;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .entregavel-item .btn:hover,
        .requisito-item .btn:hover {
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
        }

        .btn-add-entregavel {
            width: 100%;
            justify-content: center;
            margin-top: var(--space-xs);
        }

        /* ========================================== */
        /* CHECKBOX GROUP                             */
        /* ========================================== */
        .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .checkbox-item {
            display: flex;
            align-items: flex-start;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .checkbox-item:hover {
            border-color: #00FFA3;
            background: var(--bg-card-hover);
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
            background: #00FFA3;
            border-color: #00FFA3;
        }

        .checkbox-item input[type="checkbox"]:checked + .checkbox-mark::after {
            content: '✓';
            color: #0A1628;
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
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            border: 2px solid var(--border-color);
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

        .modal-body p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }

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
            .preco-preview { grid-template-columns: 1fr; }
            .preco-preview-item.preco-preview-total { border-left: none; border-top: 1px solid var(--border-color); padding-left: 0; padding-top: var(--space-md); }
        }

        @media (max-width: 768px) {
            .form-section-header { flex-direction: column; align-items: flex-start; }
            .section-number { width: 36px; height: 36px; font-size: 15px; }
            .setores-grid { grid-template-columns: 1fr 1fr; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; justify-content: center; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }
            .imagem-capa-upload { aspect-ratio: 16 / 9; }
            .imagem-capa-preview { padding: var(--space-lg); min-height: 180px; }
            .imagem-capa-preview i { font-size: 32px; }
            .modal-content { width: 95%; }
            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .setores-grid { grid-template-columns: 1fr; }
            .form-section-body { padding: var(--space-md); }
            .galeria-list,
            .galeria-existentes { grid-template-columns: repeat(2, 1fr); }
            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
            .imagem-capa-upload { aspect-ratio: 4 / 3; }
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