<?php
// painel/admin/config/modulo-editar.php - Editar Módulo
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Editar Módulo';
$pagina_atual = 'modulos';
$pagina_atual_sidebar = $pagina_atual;

// ===== OBTER ID DO MÓDULO =====
$id_modulo = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ===== DADOS MOCKADOS - MÓDULOS =====
$modulos = [
    1 => [
        'id' => 1,
        'nome' => 'Topografia',
        'descricao' => 'Levantamentos topográficos, processamento de dados e geração de plantas.',
        'icon' => 'fa-mountain',
        'categoria' => 'Geotecnologia',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '2.1.0',
        'data_atualizacao' => '2026-01-15 10:30:00',
        'dependencias' => ['GIS', 'CAD'],
        'autor' => 'GeoNexus Team',
        'created_at' => '2025-06-10 09:00:00'
    ],
    2 => [
        'id' => 2,
        'nome' => 'GIS',
        'descricao' => 'Sistemas de Informação Geográfica com análise espacial e mapas interativos.',
        'icon' => 'fa-globe',
        'categoria' => 'Geotecnologia',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '3.0.1',
        'data_atualizacao' => '2026-01-20 14:20:00',
        'dependencias' => [],
        'autor' => 'GeoNexus Team',
        'created_at' => '2025-06-10 09:00:00'
    ],
    3 => [
        'id' => 3,
        'nome' => 'CAD',
        'descricao' => 'Editor CAD integrado para desenho técnico e modelação 2D/3D.',
        'icon' => 'fa-ruler-combined',
        'categoria' => 'Engenharia',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '2.0.0',
        'data_atualizacao' => '2026-01-10 09:00:00',
        'dependencias' => [],
        'autor' => 'GeoNexus Team',
        'created_at' => '2025-06-10 09:00:00'
    ],
    4 => [
        'id' => 4,
        'nome' => 'GPS Tracker',
        'descricao' => 'Rastreamento GPS em tempo real para equipamentos e veículos.',
        'icon' => 'fa-satellite',
        'categoria' => 'Monitoramento',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'versao' => '1.5.2',
        'data_atualizacao' => '2026-01-25 16:45:00',
        'dependencias' => ['Topografia'],
        'autor' => 'GeoNexus Team',
        'created_at' => '2025-06-10 09:00:00'
    ],
];

// ===== OBTER MÓDULO ATUAL =====
$modulo = isset($modulos[$id_modulo]) ? $modulos[$id_modulo] : $modulos[1];

// ===== LISTA DE DEPENDÊNCIAS DISPONÍVEIS =====
$dependencias_disponiveis = [
    'GIS', 'CAD', 'Topografia', 'GPS Tracker', 
    'Drones', 'Agricultura de Precisão', 'Mineração'
];

// ===== FUNÇÕES AUXILIARES =====
function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y H:i', strtotime($date));
}
?>
<!DOCTYPE html>
<html lang="pt">
<?php include "../../../includes/admin-config-head.php" ?>

<body>
<div class="app-container">
    <div id="toast-container" class="toast-container"></div>

    <!-- ========================================== -->
    <!-- SIDEBAR CONFIGURAÇÕES                     -->
    <!-- ========================================== -->
    <?php include "../../../includes/admin-config-sidebar.php"; ?>

    <!-- ========================================== -->
    <!-- MAIN CONTENT                              -->
    <!-- ========================================== -->
    <main class="main-content">
        <!-- ===== PAGE HEADER ===== -->
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-edit icon" style="color: #6C2BD9;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <a href="modulos.php">Módulos</a>
                    <span class="separator">/</span>
                    <span>Editar</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>

            </div>
        </header>

        <!-- ===== FORMULÁRIO ===== -->
        <div class="editar-container">
            <div class="form-title">
                <span>
                    <i class="fas fa-puzzle-piece"></i>
                    Editar Módulo
                </span>
                <span class="modulo-id">
                    ID: <strong>#<?php echo $modulo['id']; ?></strong>
                </span>
            </div>

            <form id="formEditarModulo" onsubmit="salvarEdicao(event)">
                <input type="hidden" id="moduloId" value="<?php echo $modulo['id']; ?>">
                
                <!-- Nome e Categoria -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="nomeModulo">Nome do Módulo <span class="required">*</span></label>
                        <input type="text" class="form-control" id="nomeModulo" value="<?php echo $modulo['nome']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="categoriaModulo">Categoria <span class="required">*</span></label>
                        <select class="form-control" id="categoriaModulo" required>
                            <option value="Geotecnologia" <?php echo $modulo['categoria'] === 'Geotecnologia' ? 'selected' : ''; ?>>Geotecnologia</option>
                            <option value="Engenharia" <?php echo $modulo['categoria'] === 'Engenharia' ? 'selected' : ''; ?>>Engenharia</option>
                            <option value="Monitoramento" <?php echo $modulo['categoria'] === 'Monitoramento' ? 'selected' : ''; ?>>Monitoramento</option>
                            <option value="Agricultura" <?php echo $modulo['categoria'] === 'Agricultura' ? 'selected' : ''; ?>>Agricultura</option>
                            <option value="Recursos" <?php echo $modulo['categoria'] === 'Recursos' ? 'selected' : ''; ?>>Recursos</option>
                            <option value="Energia" <?php echo $modulo['categoria'] === 'Energia' ? 'selected' : ''; ?>>Energia</option>
                            <option value="Planeamento" <?php echo $modulo['categoria'] === 'Planeamento' ? 'selected' : ''; ?>>Planeamento</option>
                            <option value="Logística" <?php echo $modulo['categoria'] === 'Logística' ? 'selected' : ''; ?>>Logística</option>
                            <option value="Aeronáutica" <?php echo $modulo['categoria'] === 'Aeronáutica' ? 'selected' : ''; ?>>Aeronáutica</option>
                            <option value="Educação" <?php echo $modulo['categoria'] === 'Educação' ? 'selected' : ''; ?>>Educação</option>
                            <option value="Ambiente" <?php echo $modulo['categoria'] === 'Ambiente' ? 'selected' : ''; ?>>Ambiente</option>
                        </select>
                    </div>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricaoModulo">Descrição <span class="required">*</span></label>
                    <textarea class="form-control" id="descricaoModulo" rows="3" required><?php echo $modulo['descricao']; ?></textarea>
                </div>

                <!-- Ícone e Versão -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="iconeModulo">Ícone</label>
                        <input type="text" class="form-control" id="iconeModulo" value="<?php echo $modulo['icon']; ?>" placeholder="fa-mountain">
                        <span class="help-text">Classe do Font Awesome (ex: fa-mountain)</span>
                    </div>
                    <div class="form-group">
                        <label for="versaoModulo">Versão</label>
                        <input type="text" class="form-control" id="versaoModulo" value="<?php echo $modulo['versao']; ?>" placeholder="1.0.0">
                    </div>
                </div>

                <!-- Dependências -->
                <div class="form-group">
                    <label for="dependenciasModulo">Dependências</label>
                    <select class="form-control" id="dependenciasModulo" multiple>
                        <?php foreach ($dependencias_disponiveis as $dep): ?>
                            <option value="<?php echo $dep; ?>" 
                                <?php echo in_array($dep, $modulo['dependencias']) ? 'selected' : ''; ?>>
                                <?php echo $dep; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <span class="help-text">Segure Ctrl (Cmd) para selecionar múltiplas dependências</span>
                </div>

                <!-- Status -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="statusModulo">Status</label>
                        <select class="form-control" id="statusModulo">
                            <option value="ativo" <?php echo $modulo['status'] === 'ativo' ? 'selected' : ''; ?>>Ativo</option>
                            <option value="inativo" <?php echo $modulo['status'] === 'inativo' ? 'selected' : ''; ?>>Inativo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data de Criação</label>
                        <input type="text" class="form-control" value="<?php echo formatDate($modulo['created_at']); ?>" disabled>
                    </div>
                </div>

                <!-- Autor -->
                <div class="form-group">
                    <label for="autorModulo">Autor</label>
                    <input type="text" class="form-control" id="autorModulo" value="<?php echo $modulo['autor']; ?>">
                </div>

                <!-- Botões -->
                <div class="form-actions">
                    <a href="modulos.php" class="btn btn-outline">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar Alterações
                    </button>
                </div>
            </form>
        </div>

        <!-- ===== RESUMO (Sidebar) ===== -->
        <div style="max-width: 700px; margin: var(--space-lg) auto 0;">
            <div style="background: var(--bg-card); border-radius: var(--radius-lg); padding: var(--space-lg); border: 1px solid var(--border-color);">
                <h4 style="font-family: var(--font-title); color: var(--text-primary); margin-bottom: var(--space-md); display: flex; align-items: center; gap: var(--space-sm);">
                    <i class="fas fa-info-circle" style="color: #6C2BD9;"></i>
                    Resumo do Módulo
                </h4>
                <div class="resumo-item">
                    <span class="resumo-label">ID</span>
                    <span class="resumo-value" style="font-family: 'Orbitron', sans-serif; color: #6C2BD9; font-weight: 600;">
                        #<?php echo $modulo['id']; ?>
                    </span>
                </div>
                <div class="resumo-item">
                    <span class="resumo-label">Nome</span>
                    <span class="resumo-value"><?php echo $modulo['nome']; ?></span>
                </div>
                <div class="resumo-item">
                    <span class="resumo-label">Categoria</span>
                    <span class="resumo-value"><span class="badge-categoria"><?php echo $modulo['categoria']; ?></span></span>
                </div>
                <div class="resumo-item">
                    <span class="resumo-label">Versão</span>
                    <span class="resumo-value"><span class="badge-versao">v<?php echo $modulo['versao']; ?></span></span>
                </div>
                <div class="resumo-item">
                    <span class="resumo-label">Status</span>
                    <span class="resumo-value">
                        <span class="badge-status status-<?php echo $modulo['status']; ?>">
                            <i class="fas <?php echo $modulo['status'] === 'ativo' ? 'fa-check-circle' : 'fa-times-circle'; ?>"></i>
                            <?php echo $modulo['status_label']; ?>
                        </span>
                    </span>
                </div>
                <div class="resumo-item">
                    <span class="resumo-label">Dependências</span>
                    <span class="resumo-value">
                        <?php if (empty($modulo['dependencias'])): ?>
                            <span style="color: var(--text-muted); font-size: var(--text-xs);">Nenhuma</span>
                        <?php else: ?>
                            <?php foreach ($modulo['dependencias'] as $dep): ?>
                                <span style="display: inline-block; padding: 1px 6px; border-radius: var(--radius-full); font-size: 8px; font-weight: 500; background: rgba(255, 217, 61, 0.1); color: #FFD93D; margin: 1px;">
                                    <?php echo $dep; ?>
                                </span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="resumo-item">
                    <span class="resumo-label">Autor</span>
                    <span class="resumo-value"><?php echo $modulo['autor']; ?></span>
                </div>
                <div class="resumo-item">
                    <span class="resumo-label">Criado em</span>
                    <span class="resumo-value"><?php echo formatDate($modulo['created_at']); ?></span>
                </div>
                <div class="resumo-item" style="border-bottom: none;">
                    <span class="resumo-label">Última Atualização</span>
                    <span class="resumo-value"><?php echo formatDate($modulo['data_atualizacao']); ?></span>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- ========================================== -->
<!-- SCRIPTS                                    -->
<!-- ========================================== -->
<script src="../../../assets/js/main.js"></script>
<script>
// ==========================================
// TOGGLE SIDEBAR
// ==========================================
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

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
        }
    });
});

// ==========================================
// TOGGLE SIDEBAR MOBILE
// ==========================================
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('bottomMenuToggle');

    if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
        if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
            sidebar.classList.remove('open');
            document.getElementById('sidebarOverlay')?.classList.remove('active');
        }
    }
});

// ==========================================
// THEME DARK/LIGHT
// ==========================================
(function() {
    const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);

    const btnTheme = document.getElementById('btnTheme');
    if (btnTheme) {
        btnTheme.addEventListener('click', function(e) {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('geonnexus-theme', newTheme);
        });
    }
})();

// ==========================================
// SALVAR EDIÇÃO
// ==========================================
function salvarEdicao(event) {
    event.preventDefault();

    const id = document.getElementById('moduloId').value;
    const nome = document.getElementById('nomeModulo').value.trim();
    const descricao = document.getElementById('descricaoModulo').value.trim();
    const categoria = document.getElementById('categoriaModulo').value;

    if (!nome) {
        mostrarToast('Por favor, insira o nome do módulo.', 'error');
        document.getElementById('nomeModulo').focus();
        return;
    }

    if (!descricao) {
        mostrarToast('Por favor, insira a descrição do módulo.', 'error');
        document.getElementById('descricaoModulo').focus();
        return;
    }

    if (!categoria) {
        mostrarToast('Por favor, selecione a categoria.', 'error');
        document.getElementById('categoriaModulo').focus();
        return;
    }

    mostrarToast('Módulo "' + nome + '" atualizado com sucesso!', 'success');

    setTimeout(function() {
        window.location.href = 'modulos.php';
    }, 1500);
}

// ==========================================
// TOAST
// ==========================================
function mostrarToast(mensagem, tipo = 'success') {
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

    const toast = document.createElement('div');
    toast.className = 'toast toast-' + tipo;
    toast.innerHTML = `
        <div class="toast-content">
            <i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i>
            <span>${mensagem}</span>
        </div>
        <button class="toast-close" onclick="this.parentElement.remove()">&times;</button>
    `;

    container.appendChild(toast);

    requestAnimationFrame(() => {
        toast.style.transform = 'translateX(0)';
        toast.style.opacity = '1';
    });

    setTimeout(() => {
        if (toast.parentElement) {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }, 4000);
}
</script>

    <!-- ===== CSS ESPECÍFICO ===== -->
    <style>
        /* ========================================== */
        /* EDITAR MÓDULO - CSS                        */
        /* ========================================== */

        /* ===== BOTÃO VOLTAR ===== */
        .btn-voltar-painel {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .btn-voltar-painel:hover {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        /* ===== CONTAINER ===== */
        .editar-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            max-width: 700px;
            margin: 0 auto;
            transition: var(--transition-smooth);
        }

        .editar-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== TÍTULO ===== */
        .form-title {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-lg);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .form-title span {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .form-title i {
            color: #6C2BD9;
        }

        .form-title .modulo-id {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 400;
        }

        .form-title .modulo-id strong {
            color: #6C2BD9;
        }

        /* ===== FORMULÁRIO ===== */
        .form-group {
            margin-bottom: var(--space-md);
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-group label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .form-group label .required {
            color: #FF6B6B;
            margin-left: 2px;
        }

        .form-group .help-text {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 4px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
            min-height: 38px;
        }

        .form-control:focus {
            outline: none;
            border-color: #6C2BD9;
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-control:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        select.form-control option {
            background: var(--bg-card);
            color: var(--text-primary);
            padding: 8px;
        }

        select.form-control[multiple] {
            min-height: 80px;
            padding-right: 12px;
            background-image: none;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
            font-family: var(--font-body);
        }

        /* ===== RESUMO ===== */
        .resumo-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .resumo-item:last-child {
            border-bottom: none;
        }

        .resumo-item .resumo-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .resumo-item .resumo-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        .resumo-item .resumo-value .badge-versao {
            display: inline-block;
            padding: 1px 8px;
            border-radius: var(--radius-full);
            font-size: 9px;
            font-weight: 600;
            background: rgba(0, 210, 255, 0.1);
            color: #00D2FF;
        }

        .resumo-item .resumo-value .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .resumo-item .resumo-value .badge-status.status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .resumo-item .resumo-value .badge-status.status-inativo {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        /* ===== BADGE CATEGORIA ===== */
        .badge-categoria {
            display: inline-block;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
            background: rgba(108, 43, 217, 0.1);
            color: #6C2BD9;
        }

        /* ===== BOTÕES ===== */
        .form-actions {
            display: flex;
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .form-actions .btn {
            flex: 1;
            justify-content: center;
            padding: 10px 20px;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 768px) {
            .editar-container {
                padding: var(--space-lg);
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                flex: none;
                width: 100%;
            }

            .form-title {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .editar-container {
                padding: var(--space-md);
                border-radius: var(--radius-md);
            }
        }
    </style>
</body>
</html>