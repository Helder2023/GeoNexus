<?php
// painel/individual/servicos/servico-cadastrar.php - Cadastrar Novo Serviço
include "../../../includes/individual/notificacoes-servicos-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Cadastrar Serviço';
$pagina_atual = 'servico-cadastrar';

// ============================================
// LISTA DE CATEGORIAS (SETORES)
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

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00FFA3&color=fff&size=80';
    }
}

if (!function_exists('getNextServiceCode')) {
    function getNextServiceCode() {
        return 'SRV-' . date('Y') . '-' . str_pad(rand(1, 999), 4, '0', STR_PAD_LEFT);
    }
}

$codigo_servico = getNextServiceCode();
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
                        <i class="fas fa-plus-circle icon" style="color: #00FFA3;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Serviços</a>
                        <span class="separator">/</span>
                        <span>Novo Serviço</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-servicos.php" ?>

                    <a href="index.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formCadastrarServico" onsubmit="cadastrarServico(event)" enctype="multipart/form-data">
                
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
                                       value="<?php echo $codigo_servico; ?>" readonly>
                                <span class="form-help">Código gerado automaticamente</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nome do Serviço <span class="required">*</span></label>
                                <input type="text" class="form-control" id="nomeServico" 
                                       placeholder="Ex: Levantamento Topográfico Completo" required
                                       maxlength="150">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição do Serviço <span class="required">*</span></label>
                            <textarea class="form-control" id="descricaoServico" rows="5" 
                                      placeholder="Descreva detalhadamente o serviço, o que está incluído, metodologia, entregas esperadas..." required
                                      maxlength="2000"></textarea>
                            <div class="char-counter">
                                <span id="descricaoCount">0</span> / 2000 caracteres
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Resumo Curto</label>
                            <input type="text" class="form-control" id="resumoServico" 
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
                            <p>Selecione o setor principal do serviço</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="setores-grid" id="setoresGrid">
                            <?php foreach ($categorias as $categoria): ?>
                                <div class="setor-card" 
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
                        <input type="hidden" id="setorSelecionado" name="setor" required>
                        <span class="form-error" id="errorSetor" style="display: none;">
                            <i class="fas fa-exclamation-circle"></i> Selecione uma categoria
                        </span>
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
                                           placeholder="0" min="0" step="1000" required
                                           oninput="calcularPrecos(this.value)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Unidade de Cobrança <span class="required">*</span></label>
                                <select class="form-control" id="unidadeCobranca" required>
                                    <option value="">-- Selecione --</option>
                                    <option value="por hectare">Por Hectare</option>
                                    <option value="por projeto">Por Projeto</option>
                                    <option value="por propriedade">Por Propriedade</option>
                                    <option value="por voo">Por Voo</option>
                                    <option value="por área">Por Área</option>
                                    <option value="por modelo">Por Modelo</option>
                                    <option value="por hora">Por Hora</option>
                                    <option value="por dia">Por Dia</option>
                                    <option value="por km">Por Km</option>
                                    <option value="por mês">Por Mês</option>
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
                                       placeholder="Ex: 15-30 dias" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Prazo Mínimo (dias)</label>
                                <input type="number" class="form-control" id="prazoMinimo" 
                                       placeholder="0" min="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Condições de Pagamento</label>
                            <select class="form-control" id="condicoesPagamento">
                                <option value="">-- Selecione --</option>
                                <option value="avista">À Vista</option>
                                <option value="50-50">50% Adiantado / 50% na Entrega</option>
                                <option value="30-70">30% Adiantado / 70% na Entrega</option>
                                <option value="parcelado">Parcelado</option>
                                <option value="negociavel">Negociável</option>
                            </select>
                        </div>

                        <!-- Pré-visualização de preços -->
                        <div class="preco-preview" id="precoPreview" style="display: none;">
                            <div class="preco-preview-item">
                                <span class="preco-preview-label">Preço Base</span>
                                <span class="preco-preview-valor" id="previewPrecoBase">Kz 0</span>
                            </div>
                            <div class="preco-preview-item">
                                <span class="preco-preview-label">+ IVA (14%)</span>
                                <span class="preco-preview-valor" id="previewIva">Kz 0</span>
                            </div>
                            <div class="preco-preview-item preco-preview-total">
                                <span class="preco-preview-label">Total</span>
                                <span class="preco-preview-valor" id="previewTotal">Kz 0</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: IMAGEM E APRESENTAÇÃO             -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-image"></i> Imagem e Apresentação</h3>
                            <p>Adicione uma imagem para apresentar o serviço</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">Imagem Principal</label>
                            <div class="imagem-upload" id="imagemUpload" onclick="document.getElementById('imagemInput').click()">
                                <div class="imagem-upload-preview" id="imagemUploadPreview">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Clique para adicionar imagem</span>
                                    <small>JPG, PNG ou WEBP até 5MB</small>
                                </div>
                                <input type="file" id="imagemInput" accept="image/*" style="display: none;" onchange="previewImagem(event)">
                            </div>
                            <div class="imagem-remover" id="imagemRemover" style="display: none;">
                                <button type="button" class="btn btn-sm btn-danger" onclick="removerImagem()">
                                    <i class="fas fa-trash"></i> Remover Imagem
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Galeria de Imagens</label>
                            <div class="galeria-upload" onclick="document.getElementById('galeriaInput').click()">
                                <i class="fas fa-images"></i>
                                <span>Adicionar mais imagens</span>
                                <small>Até 8 imagens (JPG, PNG, WEBP até 5MB cada)</small>
                                <input type="file" id="galeriaInput" accept="image/*" multiple style="display: none;" onchange="previewGaleria(event)">
                            </div>
                            <div class="galeria-list" id="galeriaList"></div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 5: DETALHES E ENTREGÁVEIS            -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.4s;">
                    <div class="form-section-header">
                        <div class="section-number">5</div>
                        <div class="section-title">
                            <h3><i class="fas fa-list-check"></i> Detalhes e Entregáveis</h3>
                            <p>O que está incluído no serviço</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-group">
                            <label class="form-label">O que está incluído?</label>
                            <div class="entregaveis-container" id="entregaveisContainer">
                                <div class="entregavel-item">
                                    <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                                    <input type="text" class="form-control entregavel-input" placeholder="Ex: Levantamento de campo completo">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="removerEntregavel(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline btn-add-entregavel" onclick="adicionarEntregavel()">
                                <i class="fas fa-plus"></i> Adicionar Entregável
                            </button>
                            <span class="form-help">Liste tudo o que o cliente receberá com este serviço</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Requisitos do Cliente</label>
                            <div class="requisitos-container" id="requisitosContainer">
                                <div class="requisito-item">
                                    <i class="fas fa-info-circle" style="color: #FFD93D;"></i>
                                    <input type="text" class="form-control requisito-input" placeholder="Ex: Fornecer acesso ao terreno">
                                    <button type="button" class="btn btn-sm btn-danger" onclick="removerRequisito(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline btn-add-entregavel" onclick="adicionarRequisito()">
                                <i class="fas fa-plus"></i> Adicionar Requisito
                            </button>
                            <span class="form-help">O que o cliente precisa fornecer para o serviço</span>
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
                                <label class="form-label">Status Inicial</label>
                                <select class="form-control" id="statusServico">
                                    <option value="rascunho">Rascunho (não visível)</option>
                                    <option value="ativo" selected>Ativo (visível para todos)</option>
                                    <option value="inativo">Inativo (temporariamente oculto)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Disponibilidade</label>
                                <select class="form-control" id="disponibilidadeServico">
                                    <option value="disponivel" selected>Disponível</option>
                                    <option value="agendado">Apenas por agendamento</option>
                                    <option value="indisponivel">Indisponível</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Opções de Destaque</label>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" id="servicoDestaque">
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-star" style="color: #FFD93D;"></i> Destacar Serviço</strong>
                                        <small>Aparece em destaque na sua página e nas pesquisas</small>
                                    </div>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" id="servicoPopular" checked>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-fire" style="color: #FF6B6B;"></i> Marcar como Popular</strong>
                                        <small>Aparece na secção "Mais Populares"</small>
                                    </div>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" id="servicoUrgente">
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
                                      maxlength="500"></textarea>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.6s;">
                    <a href="index.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="guardarRascunho()">
                        <i class="fas fa-save"></i> Guardar Rascunho
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check"></i> Cadastrar Serviço
                    </button>
                </div>
            </form>
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
        // TOGGLE SIDEBAR MOBILE
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
        let setorAtual = null;

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

            const preview = document.getElementById('precoPreview');
            const previewBase = document.getElementById('previewPrecoBase');
            const previewIva = document.getElementById('previewIva');
            const previewTotal = document.getElementById('previewTotal');

            if (precoBase > 0) {
                preview.style.display = 'grid';
                previewBase.textContent = 'Kz ' + formatMoney(precoBase);
                previewIva.textContent = 'Kz ' + formatMoney(iva);
                previewTotal.textContent = 'Kz ' + formatMoney(total);
            } else {
                preview.style.display = 'none';
            }
        }

        function formatMoney(value) {
            return Math.round(value).toLocaleString('pt-AO').replace(/,/g, '.');
        }

        // ============================================
        // IMAGEM PRINCIPAL
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
                const remover = document.getElementById('imagemRemover');

                preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                preview.style.padding = '0';
                preview.style.overflow = 'hidden';
                remover.style.display = 'block';

                mostrarToast('Imagem carregada!', 'success');
            };
            reader.readAsDataURL(file);
        }

        function removerImagem() {
            const preview = document.getElementById('imagemUploadPreview');
            const remover = document.getElementById('imagemRemover');

            preview.innerHTML = `
                <i class="fas fa-cloud-upload-alt"></i>
                <span>Clique para adicionar imagem</span>
                <small>JPG, PNG ou WEBP até 5MB</small>
            `;
            preview.style.padding = '';
            preview.style.overflow = '';
            remover.style.display = 'none';
            document.getElementById('imagemInput').value = '';
        }

        // ============================================
        // GALERIA DE IMAGENS
        // ============================================
        let galeriaArquivos = [];

        function previewGaleria(event) {
            const files = Array.from(event.target.files);
            const list = document.getElementById('galeriaList');

            files.forEach(file => {
                if (file.size > 5 * 1024 * 1024) {
                    mostrarToast(`"${file.name}" excede 5MB`, 'error');
                    return;
                }

                if (galeriaArquivos.length >= 8) {
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
        // VALIDAR E CADASTRAR SERVIÇO
        // ============================================
        function cadastrarServico(event) {
            event.preventDefault();

            // Validar Setor
            if (!setorAtual) {
                document.getElementById('errorSetor').style.display = 'flex';
                mostrarToast('Selecione uma categoria!', 'error');
                document.querySelector('.setor-card').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Validar campos obrigatórios
            const nome = document.getElementById('nomeServico').value.trim();
            const descricao = document.getElementById('descricaoServico').value.trim();
            const preco = parseFloat(document.getElementById('precoBase').value);
            const unidade = document.getElementById('unidadeCobranca').value;

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

            // Recolher dados
            const servicoData = {
                codigo: document.getElementById('codigoServico').value,
                nome: nome,
                descricao: descricao,
                resumo: document.getElementById('resumoServico').value.trim(),
                categoria: setorAtual,
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
                galeria: galeriaArquivos.length
            };

            console.log('Serviço a cadastrar:', servicoData);

            // Simular criação
            mostrarToast('Serviço "' + nome + '" cadastrado com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'index.php';
            }, 1500);
        }

        // ============================================
        // GUARDAR RASCUNHO
        // ============================================
        function guardarRascunho() {
            mostrarToast('Rascunho guardado! Pode continuar mais tarde.', 'info');
        }

        // ============================================
        // IMPEDIR SAÍDA ACIDENTAL
        // ============================================
        let formularioAlterado = false;

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input, textarea, select').forEach(el => {
                el.addEventListener('input', () => {
                    if (el.type !== 'hidden' && el.value && !el.readOnly) {
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
            font-size: var(--text-h1);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #00FFA3; font-size: 0.85em; }

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
        /* IMAGEM UPLOAD                              */
        /* ========================================== */
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
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.02);
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

        .imagem-upload-preview i {
            font-size: 42px;
            color: #00FFA3;
        }

        .imagem-upload-preview span {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .imagem-upload-preview small {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .imagem-upload-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            max-height: 320px;
        }

        .imagem-remover {
            margin-top: var(--space-sm);
            display: flex;
            justify-content: flex-end;
        }

        /* ========================================== */
        /* GALERIA                                    */
        /* ========================================== */
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
            .header-left h1 { font-size: var(--text-h2); }
            .imagem-upload-preview { padding: var(--space-lg); min-height: 180px; }
        }

        @media (max-width: 480px) {
            .setores-grid { grid-template-columns: 1fr; }
            .form-section-body { padding: var(--space-md); }
            .galeria-list { grid-template-columns: repeat(2, 1fr); }
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

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }
    </style>

</body>

</html>