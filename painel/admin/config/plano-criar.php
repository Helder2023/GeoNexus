<?php
// painel/admin/config/plano-criar.php - Criar Plano
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Criar Plano';
$pagina_atual = 'planos';
$pagina_atual_sidebar = $pagina_atual;

// ===== FUNÇÕES AUXILIARES =====
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
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
                    <i class="fas fa-plus-circle icon" style="color: #FFD93D;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <a href="planos.php">Planos</a>
                    <span class="separator">/</span>
                    <span>Criar</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>

                <a href="../index.php" class="btn-voltar-painel">
                    <i class="fas fa-arrow-left"></i> Voltar ao Painel
                </a>
            </div>
        </header>

        <!-- ===== FORMULÁRIO ===== -->
        <div class="criar-container">
            <div class="form-title">
                <i class="fas fa-crown"></i>
                Criar Novo Plano
            </div>

            <form id="formCriarPlano" onsubmit="criarPlano(event)">
                <!-- Nome e Categoria -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="nomePlano">Nome do Plano <span class="required">*</span></label>
                        <input type="text" class="form-control" id="nomePlano" placeholder="Ex: Pro, Enterprise..." required>
                    </div>
                    <div class="form-group">
                        <label for="categoriaPlano">Categoria <span class="required">*</span></label>
                        <select class="form-control" id="categoriaPlano" required>
                            <option value="">Selecione...</option>
                            <option value="Individual">Individual</option>
                            <option value="Empresarial">Empresarial</option>
                            <option value="Institucional">Institucional</option>
                        </select>
                    </div>
                </div>

                <!-- Valor e Período -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="valorPlano">Valor <span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Kz</span>
                            <input type="number" class="form-control" id="valorPlano" placeholder="0" min="0" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="periodoPlano">Período <span class="required">*</span></label>
                        <select class="form-control" id="periodoPlano" required>
                            <option value="Mensal">Mensal</option>
                            <option value="Trimestral">Trimestral</option>
                            <option value="Semestral">Semestral</option>
                            <option value="Anual">Anual</option>
                        </select>
                    </div>
                </div>

                <!-- Usuários e Projetos -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="usuariosPlano">Nº de Usuários <span class="required">*</span></label>
                        <input type="number" class="form-control" id="usuariosPlano" placeholder="1" min="1" required>
                        <span class="help-text">Número máximo de usuários permitidos</span>
                    </div>
                    <div class="form-group">
                        <label for="projetosPlano">Nº de Projetos <span class="required">*</span></label>
                        <input type="number" class="form-control" id="projetosPlano" placeholder="5" min="1" required>
                        <span class="help-text">Número máximo de projetos permitidos</span>
                    </div>
                </div>

                <!-- Armazenamento -->
                <div class="form-group">
                    <label for="armazenamentoPlano">Armazenamento <span class="required">*</span></label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="armazenamentoPlano" placeholder="10" min="1" required>
                        <span class="input-group-text">GB</span>
                    </div>
                    <span class="help-text">Capacidade de armazenamento em GB</span>
                </div>

                <!-- Status e Destaques -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="statusPlano">Status</label>
                        <select class="form-control" id="statusPlano">
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Destaques</label>
                        <div class="checkbox-group">
                            <label class="checkbox-item">
                                <input type="checkbox" id="destaquePlano">
                                <i class="fas fa-star" style="color: #FFD93D;"></i> Destaque
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" id="popularPlano">
                                <i class="fas fa-fire" style="color: #FF6B6B;"></i> Popular
                            </label>
                        </div>
                        <span class="help-text">Selecione se o plano será destacado ou popular</span>
                    </div>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricaoPlano">Descrição</label>
                    <textarea class="form-control" id="descricaoPlano" rows="3" placeholder="Descreva as principais características do plano..."></textarea>
                    <span class="help-text">Descrição opcional para o plano</span>
                </div>

                <!-- Botões -->
                <div class="form-actions">
                    <a href="planos.php" class="btn btn-outline">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Criar Plano
                    </button>
                </div>
            </form>
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
// CRIAR PLANO
// ==========================================
function criarPlano(event) {
    event.preventDefault();

    // Obter valores
    const nome = document.getElementById('nomePlano').value.trim();
    const categoria = document.getElementById('categoriaPlano').value;
    const valor = document.getElementById('valorPlano').value;
    const periodo = document.getElementById('periodoPlano').value;
    const usuarios = document.getElementById('usuariosPlano').value;
    const projetos = document.getElementById('projetosPlano').value;
    const armazenamento = document.getElementById('armazenamentoPlano').value;
    const status = document.getElementById('statusPlano').value;
    const destaque = document.getElementById('destaquePlano').checked;
    const popular = document.getElementById('popularPlano').checked;

    // Validação
    if (!nome) {
        mostrarToast('Por favor, insira o nome do plano.', 'error');
        document.getElementById('nomePlano').focus();
        return;
    }

    if (!categoria) {
        mostrarToast('Por favor, selecione a categoria.', 'error');
        document.getElementById('categoriaPlano').focus();
        return;
    }

    if (!valor || valor <= 0) {
        mostrarToast('Por favor, insira um valor válido.', 'error');
        document.getElementById('valorPlano').focus();
        return;
    }

    if (!usuarios || usuarios < 1) {
        mostrarToast('Por favor, insira o número de usuários.', 'error');
        document.getElementById('usuariosPlano').focus();
        return;
    }

    if (!projetos || projetos < 1) {
        mostrarToast('Por favor, insira o número de projetos.', 'error');
        document.getElementById('projetosPlano').focus();
        return;
    }

    if (!armazenamento || armazenamento < 1) {
        mostrarToast('Por favor, insira a capacidade de armazenamento.', 'error');
        document.getElementById('armazenamentoPlano').focus();
        return;
    }

    // Simular criação
    const valorFormatado = Number(valor).toLocaleString('pt-PT');
    let mensagem = 'Plano "' + nome + '" criado com sucesso!\n';
    mensagem += 'Categoria: ' + categoria + '\n';
    mensagem += 'Valor: Kz ' + valorFormatado + '\n';
    mensagem += 'Período: ' + periodo + '\n';
    mensagem += 'Usuários: ' + usuarios + '\n';
    mensagem += 'Projetos: ' + projetos + '\n';
    mensagem += 'Armazenamento: ' + armazenamento + ' GB\n';
    mensagem += 'Status: ' + (status === 'ativo' ? 'Ativo' : 'Inativo');
    if (destaque) mensagem += '\n★ Destaque';
    if (popular) mensagem += '\n🔥 Popular';

    mostrarToast('Plano "' + nome + '" criado com sucesso!', 'success');

    // Redirecionar após 2 segundos
    setTimeout(function() {
        window.location.href = 'planos.php';
    }, 2000);
}

// ==========================================
// TOAST NOTIFICATIONS
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
        /* CRIAR PLANO - CSS                          */
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
        .criar-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            max-width: 700px;
            margin: 0 auto;
            transition: var(--transition-smooth);
        }

        .criar-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== TÍTULO DO FORMULÁRIO ===== */
        .form-title {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-lg);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .form-title i {
            color: #FFD93D;
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
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-muted);
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

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
            font-family: var(--font-body);
        }

        /* ===== INPUT GROUP ===== */
        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group .input-group-text {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            padding: 8px 12px;
            font-size: var(--text-sm);
            color: var(--text-muted);
            white-space: nowrap;
        }

        .input-group .input-group-text:first-child {
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
            border-right: none;
        }

        .input-group .input-group-text:last-child {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
            border-left: none;
        }

        .input-group .form-control {
            border-radius: 0;
        }

        .input-group .form-control:first-child {
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
        }

        .input-group .form-control:last-child {
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
        }

        /* ===== CHECKBOX ===== */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            flex-wrap: wrap;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .checkbox-item input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #FFD93D;
            cursor: pointer;
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
            .criar-container {
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
        }

        @media (max-width: 480px) {
            .criar-container {
                padding: var(--space-md);
                border-radius: var(--radius-md);
            }

            .checkbox-group {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</body>
</html>