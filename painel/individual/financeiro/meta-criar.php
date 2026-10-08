<?php
// painel/individual/financeiro/meta-criar.php - Criar Nova Meta
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Nova Meta';
$pagina_atual = 'meta-criar';

// ============================================
// GARANTIR VARIÁVEIS
// ============================================
if (!isset($valor_receber))              $valor_receber = 850000;
if (!isset($total_faturas_pendentes))    $total_faturas_pendentes = 12;
if (!isset($total_pagamentos_pendentes)) $total_pagamentos_pendentes = 8;

// ============================================
// CATEGORIAS DE METAS
// ============================================
$categorias = [
    ['id' => 'faturamento', 'nome' => 'Faturamento', 'icon' => 'fa-coins', 'color' => '#00FFA3', 'descricao' => 'Aumentar receitas'],
    ['id' => 'clientes', 'nome' => 'Clientes', 'icon' => 'fa-users', 'color' => '#00D2FF', 'descricao' => 'Adquirir clientes'],
    ['id' => 'projetos', 'nome' => 'Projetos', 'icon' => 'fa-project-diagram', 'color' => '#6C2BD9', 'descricao' => 'Concluir projetos'],
    ['id' => 'despesas', 'nome' => 'Despesas', 'icon' => 'fa-arrow-down', 'color' => '#FF6B6B', 'descricao' => 'Reduzir custos'],
    ['id' => 'vendas', 'nome' => 'Vendas', 'icon' => 'fa-percentage', 'color' => '#FFD93D', 'descricao' => 'Aumentar conversão'],
    ['id' => 'assinaturas', 'nome' => 'Assinaturas', 'icon' => 'fa-crown', 'color' => '#FF9F43', 'descricao' => 'Renovar assinaturas'],
    ['id' => 'produtividade', 'nome' => 'Produtividade', 'icon' => 'fa-tachometer-alt', 'color' => '#00CEC9', 'descricao' => 'Eficiência operacional'],
    ['id' => 'outros', 'nome' => 'Outros', 'icon' => 'fa-tag', 'color' => '#A29BFE', 'descricao' => 'Outras metas'],
];

// ============================================
// PERÍODOS DISPONÍVEIS
// ============================================
$periodos = [
    ['id' => 'semanal', 'nome' => 'Semanal', 'dias' => 7],
    ['id' => 'mensal', 'nome' => 'Mensal', 'dias' => 30],
    ['id' => 'trimestral', 'nome' => 'Trimestral', 'dias' => 90],
    ['id' => 'semestral', 'nome' => 'Semestral', 'dias' => 180],
    ['id' => 'anual', 'nome' => 'Anual', 'dias' => 365],
];

// ============================================
// UNIDADES DISPONÍVEIS
// ============================================
$unidades = [
    ['id' => 'Kz', 'nome' => 'Kz (Kwanza)', 'icon' => 'fa-money-bill-wave'],
    ['id' => '%', 'nome' => 'Percentagem (%)', 'icon' => 'fa-percentage'],
    ['id' => 'clientes', 'nome' => 'Clientes', 'icon' => 'fa-users'],
    ['id' => 'projetos', 'nome' => 'Projetos', 'icon' => 'fa-project-diagram'],
    ['id' => 'assinaturas', 'nome' => 'Assinaturas', 'icon' => 'fa-crown'],
    ['id' => 'tarefas', 'nome' => 'Tarefas', 'icon' => 'fa-tasks'],
    ['id' => 'horas', 'nome' => 'Horas', 'icon' => 'fa-clock'],
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
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
    }
}

if (!function_exists('getNextMetaCode')) {
    function getNextMetaCode() {
        return 'META-' . date('Y') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
    }
}

$codigo_meta = getNextMetaCode();
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
                        <i class="fas fa-plus-circle icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="metas.php">Metas</a>
                        <span class="separator">/</span>
                        <span>Nova</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="metas.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                </div>
            </header>

            <!-- ===== FORMULÁRIO ===== -->
            <form id="formCriarMeta" onsubmit="criarMeta(event)">
                
                <!-- ========================================== -->
                <!-- ETAPA 1: INFORMAÇÕES BÁSICAS              -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up">
                    <div class="form-section-header">
                        <div class="section-number">1</div>
                        <div class="section-title">
                            <h3><i class="fas fa-info-circle"></i> Informações Básicas</h3>
                            <p>Dados gerais da meta</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Código da Meta</label>
                                <input type="text" class="form-control" id="codigoMeta" 
                                       value="<?php echo $codigo_meta; ?>" readonly>
                                <span class="form-help">Código gerado automaticamente</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Título da Meta <span class="required">*</span></label>
                                <input type="text" class="form-control" id="tituloMeta" 
                                       placeholder="Ex: Atingir Kz 5.000.000 em faturamento" required
                                       maxlength="120">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Descrição <span class="required">*</span></label>
                            <textarea class="form-control" id="descricaoMeta" rows="3" 
                                      placeholder="Descreva o objetivo da meta, como vai alcançá-la e qual o impacto esperado..." 
                                      required maxlength="500"></textarea>
                            <div class="char-counter">
                                <span id="descricaoCount">0</span> / 500 caracteres
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Responsável</label>
                                <input type="text" class="form-control" id="responsavelMeta" 
                                       value="Carlos Mendes" readonly>
                                <span class="form-help">Preenchido automaticamente</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Prioridade</label>
                                <select class="form-control" id="prioridadeMeta">
                                    <option value="baixa">Baixa</option>
                                    <option value="media" selected>Média</option>
                                    <option value="alta">Alta</option>
                                    <option value="urgente">Urgente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 2: CATEGORIA                         -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.1s;">
                    <div class="form-section-header">
                        <div class="section-number">2</div>
                        <div class="section-title">
                            <h3><i class="fas fa-layer-group"></i> Categoria da Meta</h3>
                            <p>Selecione a categoria da meta</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="categorias-grid">
                            <?php foreach ($categorias as $cat): ?>
                                <div class="categoria-card" 
                                     data-categoria="<?php echo $cat['id']; ?>"
                                     onclick="selecionarCategoria('<?php echo $cat['id']; ?>')"
                                     style="--cat-color: <?php echo $cat['color']; ?>;">
                                    <div class="categoria-icon" style="background: <?php echo $cat['color']; ?>20; color: <?php echo $cat['color']; ?>;">
                                        <i class="fas <?php echo $cat['icon']; ?>"></i>
                                    </div>
                                    <div class="categoria-info">
                                        <span class="categoria-nome"><?php echo $cat['nome']; ?></span>
                                        <span class="categoria-desc"><?php echo $cat['descricao']; ?></span>
                                    </div>
                                    <div class="categoria-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" id="categoriaSelecionada" required>
                        <span class="form-error" id="errorCategoria" style="display: none;">
                            <i class="fas fa-exclamation-circle"></i> Selecione uma categoria
                        </span>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 3: VALORES E PRAZO                   -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.2s;">
                    <div class="form-section-header">
                        <div class="section-number">3</div>
                        <div class="section-title">
                            <h3><i class="fas fa-bullseye"></i> Valores e Prazo</h3>
                            <p>Defina o objetivo e o prazo para alcançar</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Unidade de Medida <span class="required">*</span></label>
                                <select class="form-control" id="unidadeMeta" required onchange="atualizarUnidade()">
                                    <option value="">-- Selecione --</option>
                                    <?php foreach ($unidades as $u): ?>
                                        <option value="<?php echo $u['id']; ?>">
                                            <?php echo $u['nome']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Período <span class="required">*</span></label>
                                <select class="form-control" id="periodoMeta" required onchange="atualizarPrazoPorPeriodo()">
                                    <option value="">-- Selecione --</option>
                                    <?php foreach ($periodos as $p): ?>
                                        <option value="<?php echo $p['id']; ?>" data-dias="<?php echo $p['dias']; ?>">
                                            <?php echo $p['nome']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Valor Meta -->
                        <div class="form-group">
                            <label class="form-label">Valor da Meta <span class="required">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" id="unidadePrefix">Kz</span>
                                <input type="number" class="form-control" id="valorMeta" 
                                       placeholder="0" min="0" step="1" required
                                       oninput="previewMeta()">
                            </div>
                        </div>

                        <!-- Valor Atual (Opcional) -->
                        <div class="form-group">
                            <label class="form-label">Valor Atual (ponto de partida)</label>
                            <div class="input-group">
                                <span class="input-group-text" id="unidadePrefixAtual">Kz</span>
                                <input type="number" class="form-control" id="valorAtual" 
                                       placeholder="0" min="0" step="1" value="0"
                                       oninput="previewMeta()">
                            </div>
                            <span class="form-help">Deixe 0 se está a começar do zero</span>
                        </div>

                        <!-- Prazo -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Data de Início <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataInicio" 
                                       value="<?php echo date('Y-m-d'); ?>" required
                                       onchange="atualizarPreviewPrazo()">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Data Limite <span class="required">*</span></label>
                                <input type="date" class="form-control" id="dataLimite" 
                                       value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>" required
                                       onchange="atualizarPreviewPrazo()">
                            </div>
                        </div>

                        <!-- Preview da Meta -->
                        <div class="preview-meta" id="previewMeta">
                            <div class="preview-meta-header">
                                <i class="fas fa-eye"></i>
                                <span>Pré-visualização da Meta</span>
                            </div>
                            <div class="preview-meta-body">
                                <div class="preview-meta-row">
                                    <span class="preview-label">Objetivo:</span>
                                    <span class="preview-valor" id="previewObjetivo">Kz 0</span>
                                </div>
                                <div class="preview-meta-row">
                                    <span class="preview-label">Progresso Inicial:</span>
                                    <span class="preview-valor" id="previewProgresso">0%</span>
                                </div>
                                <div class="preview-meta-row">
                                    <span class="preview-label">Prazo:</span>
                                    <span class="preview-valor" id="previewPrazo">30 dias</span>
                                </div>
                                <div class="preview-meta-progresso">
                                    <div class="preview-meta-progresso-barra">
                                        <div class="preview-meta-progresso-fill" id="previewFill" style="width: 0%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- ETAPA 4: CONFIGURAÇÕES AVANÇADAS           -->
                <!-- ========================================== -->
                <section class="form-section animate-fade-up" style="animation-delay: 0.3s;">
                    <div class="form-section-header">
                        <div class="section-number">4</div>
                        <div class="section-title">
                            <h3><i class="fas fa-cog"></i> Configurações Avançadas</h3>
                            <p>Personalize o acompanhamento da meta</p>
                        </div>
                    </div>
                    <div class="form-section-body">
                        <!-- Notificações -->
                        <div class="form-group">
                            <label class="form-label">Notificações e Alertas</label>
                            <div class="checkbox-group">
                                <label class="checkbox-item">
                                    <input type="checkbox" id="notifPrazo" checked>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-clock" style="color: #FFD93D;"></i> Alerta de Prazo</strong>
                                        <small>Receber notificação quando a meta estiver próxima do prazo</small>
                                    </div>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" id="notifProgresso" checked>
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-chart-line" style="color: #00D2FF;"></i> Alerta de Progresso</strong>
                                        <small>Notificar quando atingir 50%, 75% e 100% da meta</small>
                                    </div>
                                </label>
                                <label class="checkbox-item">
                                    <input type="checkbox" id="notifSemanal">
                                    <span class="checkbox-mark"></span>
                                    <div class="checkbox-content">
                                        <strong><i class="fas fa-calendar-week" style="color: #6C2BD9;"></i> Relatório Semanal</strong>
                                        <small>Receber resumo do progresso todas as segundas-feiras</small>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Visibilidade -->
                        <div class="form-group">
                            <label class="form-label">Visibilidade</label>
                            <select class="form-control" id="visibilidadeMeta">
                                <option value="privada" selected>Privada (só eu vejo)</option>
                                <option value="equipe">Visível para a equipa</option>
                                <option value="publica">Pública (todos veem)</option>
                            </select>
                        </div>

                        <!-- Tags -->
                        <div class="form-group">
                            <label class="form-label">Tags (opcional)</label>
                            <div class="tags-input" id="tagsInput">
                                <input type="text" class="tags-input-field" id="tagField" 
                                       placeholder="Digite uma tag e pressione Enter"
                                       onkeydown="adicionarTag(event)">
                            </div>
                            <span class="form-help">Use tags para organizar e filtrar as suas metas</span>
                        </div>

                        <!-- Observações -->
                        <div class="form-group">
                            <label class="form-label">Observações Internas</label>
                            <textarea class="form-control" id="observacoesMeta" rows="3" 
                                      placeholder="Notas privadas sobre esta meta (não visíveis para outros)"
                                      maxlength="500"></textarea>
                        </div>

                        <!-- Status Inicial -->
                        <div class="form-group">
                            <label class="form-label">Status Inicial</label>
                            <select class="form-control" id="statusMeta">
                                <option value="pendente">Pendente</option>
                                <option value="em_andamento" selected>Em Andamento</option>
                                <option value="pausada">Pausada</option>
                            </select>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- AÇÕES FINAIS                               -->
                <!-- ========================================== -->
                <div class="form-actions animate-fade-up" style="animation-delay: 0.4s;">
                    <a href="metas.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-secondary btn-lg" onclick="guardarRascunho()">
                        <i class="fas fa-save"></i> Guardar Rascunho
                    </button>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-check"></i> Criar Meta
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
            const descricao = document.getElementById('descricaoMeta');
            const count = document.getElementById('descricaoCount');

            if (descricao && count) {
                descricao.addEventListener('input', function() {
                    count.textContent = this.value.length;
                    if (this.value.length > 450) {
                        count.style.color = '#FF6B6B';
                    } else {
                        count.style.color = 'var(--text-muted)';
                    }
                });
            }
        });

        // ============================================
        // SELECIONAR CATEGORIA
        // ============================================
        let categoriaAtual = null;

        function selecionarCategoria(catId) {
            document.querySelectorAll('.categoria-card').forEach(card => {
                card.classList.remove('selected');
            });

            const card = document.querySelector(`.categoria-card[data-categoria="${catId}"]`);
            if (card) {
                card.classList.add('selected');
                categoriaAtual = catId;
                document.getElementById('categoriaSelecionada').value = catId;
                document.getElementById('errorCategoria').style.display = 'none';
            }
        }

        // ============================================
        // ATUALIZAR UNIDADE
        // ============================================
        function atualizarUnidade() {
            const unidade = document.getElementById('unidadeMeta').value;
            const prefix = document.getElementById('unidadePrefix');
            const prefixAtual = document.getElementById('unidadePrefixAtual');

            let label = unidade;

            switch(unidade) {
                case 'Kz': label = 'Kz'; break;
                case '%': label = '%'; break;
                case 'clientes': label = 'clientes'; break;
                case 'projetos': label = 'projetos'; break;
                case 'assinaturas': label = 'assinaturas'; break;
                case 'tarefas': label = 'tarefas'; break;
                case 'horas': label = 'horas'; break;
            }

            prefix.textContent = label;
            prefixAtual.textContent = label;

            previewMeta();
        }

        // ============================================
        // ATUALIZAR PRAZO POR PERÍODO
        // ============================================
        function atualizarPrazoPorPeriodo() {
            const select = document.getElementById('periodoMeta');
            const option = select.options[select.selectedIndex];
            const dias = option.dataset.dias;

            if (dias) {
                const dataInicio = document.getElementById('dataInicio').value;
                const dataBase = dataInicio ? new Date(dataInicio) : new Date();
                const dataLimite = new Date(dataBase);
                dataLimite.setDate(dataLimite.getDate() + parseInt(dias));

                document.getElementById('dataLimite').value = dataLimite.toISOString().split('T')[0];
            }

            atualizarPreviewPrazo();
        }

        // ============================================
        // ATUALIZAR PREVIEW DO PRAZO
        // ============================================
        function atualizarPreviewPrazo() {
            const dataInicio = document.getElementById('dataInicio').value;
            const dataLimite = document.getElementById('dataLimite').value;

            if (dataInicio && dataLimite) {
                const inicio = new Date(dataInicio);
                const limite = new Date(dataLimite);
                const diff = Math.ceil((limite - inicio) / (1000 * 60 * 60 * 24));

                document.getElementById('previewPrazo').textContent = diff + ' dias';
            }
        }

        // ============================================
        // PREVIEW DA META
        // ============================================
        function previewMeta() {
            const valorMeta = parseFloat(document.getElementById('valorMeta').value) || 0;
            const valorAtual = parseFloat(document.getElementById('valorAtual').value) || 0;
            const unidade = document.getElementById('unidadeMeta').value;

            // Preview Objetivo
            let objetivoTexto = '';
            if (unidade === 'Kz') {
                objetivoTexto = 'Kz ' + valorMeta.toLocaleString('pt-AO').replace(/,/g, '.');
            } else {
                objetivoTexto = valorMeta + ' ' + (unidade || '');
            }
            document.getElementById('previewObjetivo').textContent = objetivoTexto;

            // Progresso inicial
            let progresso = 0;
            if (valorMeta > 0) {
                progresso = Math.min(100, Math.round((valorAtual / valorMeta) * 100));
            }
            document.getElementById('previewProgresso').textContent = progresso + '%';
            document.getElementById('previewFill').style.width = progresso + '%';

            // Cor dinâmica
            const fill = document.getElementById('previewFill');
            if (progresso >= 80) {
                fill.style.background = 'linear-gradient(90deg, #00FFA3 0%, #00D2FF 100%)';
            } else if (progresso >= 50) {
                fill.style.background = 'linear-gradient(90deg, #FFD93D 0%, #FF9F43 100%)';
            } else {
                fill.style.background = 'linear-gradient(90deg, #FF6B6B 0%, #FF9F43 100%)';
            }

            atualizarPreviewPrazo();
        }

        // ============================================
        // TAGS
        // ============================================
        let tags = [];

        function adicionarTag(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                const input = document.getElementById('tagField');
                const valor = input.value.trim();

                if (valor && !tags.includes(valor)) {
                    tags.push(valor);
                    renderizarTags();
                    input.value = '';
                }
            }
        }

        function renderizarTags() {
            const container = document.getElementById('tagsInput');
            const input = document.getElementById('tagField');

            // Remover tags antigas
            container.querySelectorAll('.tag-item').forEach(t => t.remove());

            // Adicionar novas tags antes do input
            tags.forEach((tag, index) => {
                const el = document.createElement('span');
                el.className = 'tag-item';
                el.innerHTML = `
                    ${tag}
                    <button type="button" onclick="removerTag(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                container.insertBefore(el, input);
            });
        }

        function removerTag(index) {
            tags.splice(index, 1);
            renderizarTags();
        }

        // ============================================
        // CRIAR META
        // ============================================
        function criarMeta(event) {
            event.preventDefault();

            // Validar categoria
            if (!categoriaAtual) {
                document.getElementById('errorCategoria').style.display = 'flex';
                mostrarToast('Selecione uma categoria!', 'error');
                document.querySelector('.categoria-card').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Validar campos
            const titulo = document.getElementById('tituloMeta').value.trim();
            const descricao = document.getElementById('descricaoMeta').value.trim();
            const unidade = document.getElementById('unidadeMeta').value;
            const periodo = document.getElementById('periodoMeta').value;
            const valorMeta = parseFloat(document.getElementById('valorMeta').value);
            const dataInicio = document.getElementById('dataInicio').value;
            const dataLimite = document.getElementById('dataLimite').value;

            if (!titulo) {
                mostrarToast('Insira o título da meta!', 'error');
                document.getElementById('tituloMeta').focus();
                return;
            }

            if (!descricao) {
                mostrarToast('Insira a descrição da meta!', 'error');
                document.getElementById('descricaoMeta').focus();
                return;
            }

            if (!unidade) {
                mostrarToast('Selecione a unidade de medida!', 'error');
                document.getElementById('unidadeMeta').focus();
                return;
            }

            if (!periodo) {
                mostrarToast('Selecione o período!', 'error');
                document.getElementById('periodoMeta').focus();
                return;
            }

            if (!valorMeta || valorMeta <= 0) {
                mostrarToast('Insira um valor válido para a meta!', 'error');
                document.getElementById('valorMeta').focus();
                return;
            }

            if (new Date(dataLimite) <= new Date(dataInicio)) {
                mostrarToast('A data limite deve ser posterior à data de início!', 'error');
                return;
            }

            // Recolher dados
            const metaData = {
                codigo: document.getElementById('codigoMeta').value,
                titulo: titulo,
                descricao: descricao,
                categoria: categoriaAtual,
                unidade: unidade,
                periodo: periodo,
                valor_meta: valorMeta,
                valor_atual: parseFloat(document.getElementById('valorAtual').value) || 0,
                data_inicio: dataInicio,
                data_limite: dataLimite,
                prioridade: document.getElementById('prioridadeMeta').value,
                visibilidade: document.getElementById('visibilidadeMeta').value,
                status: document.getElementById('statusMeta').value,
                tags: tags,
                notif_prazo: document.getElementById('notifPrazo').checked,
                notif_progresso: document.getElementById('notifProgresso').checked,
                notif_semanal: document.getElementById('notifSemanal').checked,
                observacoes: document.getElementById('observacoesMeta').value.trim()
            };

            console.log('Meta a criar:', metaData);

            mostrarToast('Meta "' + titulo + '" criada com sucesso!', 'success');

            setTimeout(() => {
                window.location.href = 'metas.php';
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
                    if (el.type !== 'hidden' && el.value && !el.readOnly && el.id !== 'codigoMeta' && el.id !== 'responsavelMeta') {
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

        .btn-theme:hover { border-color: #FFD93D; color: #FFD93D; }
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
            background: rgba(255, 217, 61, 0.02);
        }

        .section-number {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(255, 217, 61, 0.3);
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

        .section-title h3 i { color: #FFD93D; }

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
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
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
            min-width: 70px;
            text-align: center;
        }

        .input-group .form-control {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
        }

        /* ========================================== */
        /* CATEGORIAS GRID                            */
        /* ========================================== */
        .categorias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: var(--space-sm);
        }

        .categoria-card {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .categoria-card:hover {
            border-color: var(--cat-color);
            background: var(--bg-card-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .categoria-card.selected {
            border-color: var(--cat-color);
            background: linear-gradient(135deg, var(--cat-color)15 0%, transparent 100%);
            box-shadow: 0 0 0 3px var(--cat-color)20;
        }

        .categoria-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .categoria-card:hover .categoria-icon,
        .categoria-card.selected .categoria-icon {
            transform: scale(1.1);
        }

        .categoria-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .categoria-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .categoria-desc {
            font-size: 10px;
            color: var(--text-muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .categoria-check {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--cat-color);
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

        .categoria-card.selected .categoria-check {
            opacity: 1;
            transform: scale(1);
        }

        /* ========================================== */
        /* PREVIEW META                               */
        /* ========================================== */
        .preview-meta {
            background: linear-gradient(135deg, rgba(255, 217, 61, 0.06) 0%, rgba(255, 159, 67, 0.04) 100%);
            border: 1px solid rgba(255, 217, 61, 0.2);
            border-radius: var(--radius-md);
            padding: var(--space-md);
            margin-top: var(--space-md);
        }

        .preview-meta-header {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: var(--text-xs);
            font-weight: 600;
            color: #FFD93D;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: var(--space-md);
            padding-bottom: var(--space-sm);
            border-bottom: 1px solid rgba(255, 217, 61, 0.2);
        }

        .preview-meta-body {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .preview-meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .preview-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .preview-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .preview-meta-progresso {
            margin-top: var(--space-sm);
        }

        .preview-meta-progresso-barra {
            height: 8px;
            background: var(--bg-input);
            border-radius: 4px;
            overflow: hidden;
        }

        .preview-meta-progresso-fill {
            height: 100%;
            border-radius: 4px;
            background: linear-gradient(90deg, #FF6B6B 0%, #FF9F43 100%);
            transition: width 0.6s ease, background 0.3s ease;
        }

        /* ========================================== */
        /* CHECKBOX                                   */
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
            border-color: #FFD93D;
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
            background: #FFD93D;
            border-color: #FFD93D;
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
        /* TAGS INPUT                                 */
        /* ========================================== */
        .tags-input {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            padding: 8px 12px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            min-height: 46px;
            align-items: center;
            transition: var(--transition-smooth);
        }

        .tags-input:focus-within {
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .tag-item {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: rgba(255, 217, 61, 0.15);
            color: #FFD93D;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .tag-item button {
            background: none;
            border: none;
            color: #FFD93D;
            cursor: pointer;
            padding: 0;
            font-size: 10px;
            display: flex;
            align-items: center;
            transition: var(--transition-smooth);
        }

        .tag-item button:hover {
            color: #FF6B6B;
            transform: scale(1.2);
        }

        .tags-input-field {
            flex: 1;
            min-width: 120px;
            background: transparent;
            border: none;
            color: var(--text-primary);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            padding: 4px 0;
        }

        .tags-input-field:focus {
            outline: none;
        }

        .tags-input-field::placeholder {
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

        .btn-primary {
            background: linear-gradient(135deg, #FFD93D 0%, #FF9F43 100%);
            color: #0A1628;
            border: none;
            box-shadow: 0 4px 16px rgba(255, 217, 61, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 217, 61, 0.4);
        }

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
            .categorias-grid { grid-template-columns: 1fr 1fr; }
            .form-actions { flex-direction: column-reverse; }
            .form-actions .btn { width: 100%; justify-content: center; }
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h2); }
        }

        @media (max-width: 480px) {
            .categorias-grid { grid-template-columns: 1fr; }
            .form-section-body { padding: var(--space-md); }
            .header-right { flex-direction: column; }
            .header-right .btn { width: 100%; justify-content: center; }
            .input-group .input-group-text { min-width: 55px; padding: 10px 8px; font-size: var(--text-xs); }
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

