<?php
// painel/admin/config/email-criar.php - Criar Template de Email
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Criar Template de Email';
$pagina_atual = 'emails';
$pagina_atual_sidebar = $pagina_atual;

// ===== FUNÇÕES AUXILIARES =====
function getStatusColor($status) {
    $colors = [
        'ativo' => '#00FFA3',
        'pendente' => '#FFD93D',
        'inativo' => '#FF6B6B'
    ];
    return $colors[$status] ?? '#6B7A8F';
}

function getStatusIcon($status) {
    $icons = [
        'ativo' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'inativo' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}

function getCategoriaIcon($categoria) {
    $icons = [
        'Onboarding' => 'fa-user-plus',
        'Segurança' => 'fa-shield-alt',
        'Financeiro' => 'fa-coins',
        'Assinaturas' => 'fa-crown',
        'Projetos' => 'fa-project-diagram',
        'Relatórios' => 'fa-file-alt',
        'Marketing' => 'fa-bullhorn',
        'Suporte' => 'fa-headset'
    ];
    return $icons[$categoria] ?? 'fa-envelope';
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
                    <i class="fas fa-plus-circle icon" style="color: #00D2FF;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <a href="emails.php">Templates de Email</a>
                    <span class="separator">/</span>
                    <span>Criar</span>
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
        <div class="criar-container">
            <div class="form-title">
                <i class="fas fa-envelope"></i>
                Criar Novo Template de Email
            </div>

            <form id="formCriarTemplate" onsubmit="criarTemplate(event)">
                <!-- Nome e Categoria -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="nomeTemplate">Nome do Template <span class="required">*</span></label>
                        <input type="text" class="form-control" id="nomeTemplate" placeholder="Ex: Bem-vindo, Notificação..." required>
                        <span class="help-text">Nome identificador do template</span>
                    </div>
                    <div class="form-group">
                        <label for="categoriaTemplate">Categoria <span class="required">*</span></label>
                        <select class="form-control" id="categoriaTemplate" required>
                            <option value="">Selecione...</option>
                            <option value="Onboarding">Onboarding</option>
                            <option value="Segurança">Segurança</option>
                            <option value="Financeiro">Financeiro</option>
                            <option value="Assinaturas">Assinaturas</option>
                            <option value="Projetos">Projetos</option>
                            <option value="Relatórios">Relatórios</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Suporte">Suporte</option>
                        </select>
                        <span class="help-text">Categoria para organização dos templates</span>
                    </div>
                </div>

                <!-- Assunto -->
                <div class="form-group">
                    <label for="assuntoTemplate">Assunto do Email <span class="required">*</span></label>
                    <input type="text" class="form-control" id="assuntoTemplate" placeholder="Ex: Bem-vindo ao GeoNexus!" required>
                    <span class="help-text">Linha de assunto do email</span>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricaoTemplate">Descrição</label>
                    <input type="text" class="form-control" id="descricaoTemplate" placeholder="Ex: Email enviado quando um novo utilizador se regista">
                    <span class="help-text">Descrição opcional do template</span>
                </div>

                <!-- Conteúdo do Email -->
                <div class="form-group">
                    <label for="conteudoTemplate">Conteúdo do Email <span class="required">*</span></label>
                    <textarea class="form-control" id="conteudoTemplate" rows="8" required placeholder="
Olá {{ nome }},

Bem-vindo ao GeoNexus!

Estamos muito felizes por tê-lo connosco. A sua conta foi criada com sucesso.

Detalhes da conta:
- Email: {{ email }}
- Plano: {{ plano }}

Para começar, clique no link abaixo:
{{ link_ativacao }}

Qualquer dúvida, estamos aqui para ajudar.

Equipa GeoNexus"></textarea>
                    <span class="help-text">Utilize as variáveis disponíveis abaixo para personalizar o conteúdo</span>
                </div>

                <!-- Variáveis Disponíveis -->
                <div class="form-group">
                    <label>Variáveis Disponíveis</label>
                    <div class="variaveis-container">
                        <span class="variavel-tag" onclick="inserirVariavel('nome')">{{ nome }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('email')">{{ email }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('link_ativacao')">{{ link_ativacao }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('link_confirmacao')">{{ link_confirmacao }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('link_reset')">{{ link_reset }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('plano')">{{ plano }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('valor')">{{ valor }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('referencia')">{{ referencia }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('data')">{{ data }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('vencimento')">{{ vencimento }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('fatura_id')">{{ fatura_id }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('projeto_nome')">{{ projeto_nome }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('cliente')">{{ cliente }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('relatorio_nome')">{{ relatorio_nome }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('link_download')">{{ link_download }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('proximo_pagamento')">{{ proximo_pagamento }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('data_cancelamento')">{{ data_cancelamento }}</span>
                        <span class="variavel-tag" onclick="inserirVariavel('ip')">{{ ip }}</span>
                    </div>
                    <span class="help-text">Clique em uma variável para inseri-la no conteúdo</span>
                </div>

                <!-- Status -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="statusTemplate">Status</label>
                        <select class="form-control" id="statusTemplate">
                            <option value="ativo">Ativo</option>
                            <option value="pendente">Pendente</option>
                            <option value="inativo">Inativo</option>
                        </select>
                        <span class="help-text">Defina o status inicial do template</span>
                    </div>
                    <div class="form-group" style="display: flex; align-items: flex-end;">
                        <div style="display: flex; align-items: center; gap: 8px; padding: 8px 0; cursor: pointer;">
                            <input type="checkbox" id="templatePadrao" style="width: 16px; height: 16px; accent-color: #00D2FF;">
                            <label for="templatePadrao" style="cursor: pointer; margin: 0;">Marcar como template padrão</label>
                        </div>
                    </div>
                </div>

                <!-- Botões -->
                <div class="form-actions" style="display: flex; gap: var(--space-md); margin-top: var(--space-lg); padding-top: var(--space-lg); border-top: 1px solid var(--border-color);">
                    <a href="emails.php" class="btn btn-outline" style="flex: 1; justify-content: center; padding: 10px 20px;">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center; padding: 10px 20px;">
                        <i class="fas fa-save"></i> Criar Template
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
// INSERIR VARIÁVEL NO TEXTO
// ==========================================
function inserirVariavel(nome) {
    const textarea = document.getElementById('conteudoTemplate');
    const variavel = '{{ ' + nome + ' }}';
    
    // Obter posição do cursor
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value;
    
    // Inserir variável na posição do cursor
    textarea.value = text.substring(0, start) + variavel + text.substring(end);
    
    // Reposicionar cursor após a variável
    const novaPosicao = start + variavel.length;
    textarea.selectionStart = novaPosicao;
    textarea.selectionEnd = novaPosicao;
    
    // Focar no textarea
    textarea.focus();
}

// ==========================================
// CRIAR TEMPLATE
// ==========================================
function criarTemplate(event) {
    event.preventDefault();

    const nome = document.getElementById('nomeTemplate').value.trim();
    const categoria = document.getElementById('categoriaTemplate').value;
    const assunto = document.getElementById('assuntoTemplate').value.trim();
    const conteudo = document.getElementById('conteudoTemplate').value.trim();

    // Validações
    if (!nome) {
        mostrarToast('Por favor, insira o nome do template.', 'error');
        document.getElementById('nomeTemplate').focus();
        return;
    }

    if (!categoria) {
        mostrarToast('Por favor, selecione a categoria.', 'error');
        document.getElementById('categoriaTemplate').focus();
        return;
    }

    if (!assunto) {
        mostrarToast('Por favor, insira o assunto do email.', 'error');
        document.getElementById('assuntoTemplate').focus();
        return;
    }

    if (!conteudo) {
        mostrarToast('Por favor, insira o conteúdo do email.', 'error');
        document.getElementById('conteudoTemplate').focus();
        return;
    }

    // Simular criação
    mostrarToast('Template "' + nome + '" criado com sucesso!', 'success');

    setTimeout(function() {
        window.location.href = 'emails.php';
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
        /* CRIAR TEMPLATE - CSS                       */
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
            max-width: 800px;
            margin: 0 auto;
            transition: var(--transition-smooth);
        }

        .criar-container:hover {
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
            gap: var(--space-sm);
        }

        .form-title i {
            color: #00D2FF;
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
            border-color: #00D2FF;
            box-shadow: 0 0 0 3px rgba(0, 210, 255, 0.1);
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
            min-height: 120px;
            font-family: var(--font-body);
        }

        /* ===== VARIÁVEIS DISPONÍVEIS ===== */
        .variaveis-container {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-xs);
            padding: var(--space-sm);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            margin-top: 4px;
        }

        .variavel-tag {
            display: inline-block;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 500;
            background: rgba(0, 210, 255, 0.1);
            color: #00D2FF;
            cursor: pointer;
            transition: var(--transition-smooth);
            font-family: 'Courier New', monospace;
        }

        .variavel-tag:hover {
            background: rgba(0, 210, 255, 0.2);
            transform: scale(1.05);
        }

        /* ===== BADGE STATUS ===== */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-status.status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-status.status-inativo {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
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

            .variaveis-container {
                gap: var(--space-xs);
            }

            .variavel-tag {
                font-size: 9px;
                padding: 1px 8px;
            }
        }
    </style>
</body>
</html>