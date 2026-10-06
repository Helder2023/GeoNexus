<?php
// painel/admin/config/email-editar.php - Editar Template de Email
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Editar Template de Email';
$pagina_atual = 'emails';
$pagina_atual_sidebar = $pagina_atual;

// ===== OBTER ID DO TEMPLATE =====
$id_template = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// ===== DADOS MOCKADOS - TEMPLATES =====
$templates = [
    1 => [
        'id' => 1,
        'nome' => 'Bem-vindo',
        'assunto' => 'Bem-vindo ao GeoNexus!',
        'descricao' => 'Email enviado quando um novo utilizador se regista na plataforma.',
        'categoria' => 'Onboarding',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-15 14:30:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'email', 'link_ativacao', 'plano'],
        'conteudo' => 'Olá {{ nome }},

Bem-vindo ao GeoNexus!

Estamos muito felizes por tê-lo connosco. A sua conta foi criada com sucesso e já pode começar a explorar todas as funcionalidades da plataforma.

📋 Detalhes da sua conta:
━━━━━━━━━━━━━━━━━━━━
• Email: {{ email }}
• Plano: {{ plano }}
• Data de criação: {{ data }}
━━━━━━━━━━━━━━━━━━━━

🚀 Para começar, aceda ao link abaixo para ativar a sua conta:
👉 {{ link_ativacao }}

💡 Dica: Explore os módulos disponíveis e comece o seu primeiro projeto.

Qualquer dúvida, a nossa equipa de suporte está disponível para ajudar.

Atenciosamente,
Equipa GeoNexus
🌍 www.geonnexus.com'
    ],
    2 => [
        'id' => 2,
        'nome' => 'Confirmação de Email',
        'assunto' => 'Confirme o seu endereço de email',
        'descricao' => 'Email enviado para confirmar o endereço de email do utilizador.',
        'categoria' => 'Onboarding',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-14 10:20:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'link_confirmacao'],
        'conteudo' => 'Olá {{ nome }},

Por favor, confirme o seu endereço de email clicando no link abaixo:

🔗 {{ link_confirmacao }}

Este link é válido por 24 horas.

Se não solicitou esta confirmação, ignore este email.

Atenciosamente,
Equipa GeoNexus'
    ],
    3 => [
        'id' => 3,
        'nome' => 'Reset de Palavra-passe',
        'assunto' => 'Redefinição de palavra-passe',
        'descricao' => 'Email enviado quando o utilizador solicita a redefinição da palavra-passe.',
        'categoria' => 'Segurança',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-12 09:00:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'link_reset', 'ip'],
        'conteudo' => 'Olá {{ nome }},

Recebemos um pedido para redefinir a sua palavra-passe.

🔑 Clique no link abaixo para criar uma nova palavra-passe:
👉 {{ link_reset }}

📍 Detalhes do pedido:
• IP: {{ ip }}
• Data: {{ data }}

Se não solicitou esta redefinição, ignore este email e a sua palavra-passe permanecerá segura.

Atenciosamente,
Equipa GeoNexus'
    ],
    4 => [
        'id' => 4,
        'nome' => 'Notificação de Pagamento',
        'assunto' => 'Pagamento confirmado - GeoNexus',
        'descricao' => 'Email enviado quando um pagamento é confirmado com sucesso.',
        'categoria' => 'Financeiro',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-16 16:45:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'valor', 'referencia', 'data', 'plano'],
        'conteudo' => 'Olá {{ nome }},

✅ O seu pagamento foi confirmado com sucesso!

📄 Detalhes do pagamento:
━━━━━━━━━━━━━━━━━━━━
• Referência: {{ referencia }}
• Valor: Kz {{ valor }}
• Data: {{ data }}
• Plano: {{ plano }}
━━━━━━━━━━━━━━━━━━━━

📎 A fatura correspondente está disponível na sua conta.

Agradecemos a sua confiança na GeoNexus.

Atenciosamente,
Equipa GeoNexus'
    ],
    5 => [
        'id' => 5,
        'nome' => 'Lembrete de Pagamento',
        'assunto' => 'Lembrete: Pagamento pendente',
        'descricao' => 'Email enviado como lembrete para pagamentos pendentes.',
        'categoria' => 'Financeiro',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-13 11:30:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'valor', 'vencimento', 'plano'],
        'conteudo' => 'Olá {{ nome }},

⏰ Lembrete: O pagamento do seu plano {{ plano }} está pendente.

📋 Detalhes:
• Valor: Kz {{ valor }}
• Data de vencimento: {{ vencimento }}

⚠️ Para evitar a interrupção do serviço, efetue o pagamento até à data de vencimento.

Caso já tenha efetuado o pagamento, desconsidere este email.

Atenciosamente,
Equipa GeoNexus'
    ],
];

// ===== OBTER TEMPLATE ATUAL =====
$template = isset($templates[$id_template]) ? $templates[$id_template] : $templates[1];

// ===== LISTA DE CATEGORIAS =====
$categorias = ['Onboarding', 'Segurança', 'Financeiro', 'Assinaturas', 'Projetos', 'Relatórios', 'Marketing', 'Suporte'];

// ===== LISTA DE VARIÁVEIS =====
$variaveis_disponiveis = [
    'nome' => 'Nome do utilizador',
    'email' => 'Email do utilizador',
    'link_ativacao' => 'Link de ativação',
    'link_confirmacao' => 'Link de confirmação',
    'link_reset' => 'Link para reset de password',
    'plano' => 'Plano contratado',
    'valor' => 'Valor do pagamento',
    'referencia' => 'Referência do pagamento',
    'data' => 'Data do evento',
    'vencimento' => 'Data de vencimento',
    'fatura_id' => 'ID da fatura',
    'projeto_nome' => 'Nome do projeto',
    'cliente' => 'Nome do cliente',
    'relatorio_nome' => 'Nome do relatório',
    'link_download' => 'Link para download',
    'proximo_pagamento' => 'Próximo pagamento',
    'data_cancelamento' => 'Data de cancelamento',
    'ip' => 'Endereço IP'
];

// ===== FUNÇÕES AUXILIARES =====
function formatDate($date) {
    if (empty($date)) return 'N/A';
    return date('d/m/Y H:i', strtotime($date));
}

function getStatusIcon($status) {
    $icons = [
        'ativo' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'inativo' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
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
                    <i class="fas fa-edit icon" style="color: #00D2FF;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <a href="emails.php">Templates de Email</a>
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

        <!-- ========================================== -->
        <!-- FORMULÁRIO                                -->
        <!-- ========================================== -->
        <div class="editar-container">
            <div class="form-title">
                <span>
                    <i class="fas fa-envelope"></i>
                    Editar Template de Email
                </span>
                <span class="template-id">
                    ID: <strong>#<?php echo $template['id']; ?></strong>
                    <span class="badge-status status-<?php echo $template['status']; ?>" style="margin-left: 8px;">
                        <i class="fas <?php echo getStatusIcon($template['status']); ?>"></i>
                        <?php echo $template['status_label']; ?>
                    </span>
                </span>
            </div>

            <form id="formEditarTemplate" onsubmit="salvarEdicao(event)">
                <input type="hidden" id="templateId" value="<?php echo $template['id']; ?>">
                
                <!-- Nome e Categoria -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="nomeTemplate">Nome do Template <span class="required">*</span></label>
                        <input type="text" class="form-control" id="nomeTemplate" value="<?php echo $template['nome']; ?>" required>
                        <span class="help-text">Nome identificador do template</span>
                    </div>
                    <div class="form-group">
                        <label for="categoriaTemplate">Categoria <span class="required">*</span></label>
                        <select class="form-control" id="categoriaTemplate" required>
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?php echo $cat; ?>" <?php echo $template['categoria'] === $cat ? 'selected' : ''; ?>>
                                    <?php echo $cat; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-text">Categoria para organização dos templates</span>
                    </div>
                </div>

                <!-- Assunto -->
                <div class="form-group">
                    <label for="assuntoTemplate">Assunto do Email <span class="required">*</span></label>
                    <input type="text" class="form-control" id="assuntoTemplate" value="<?php echo $template['assunto']; ?>" required>
                    <span class="help-text">Linha de assunto do email</span>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label for="descricaoTemplate">Descrição</label>
                    <input type="text" class="form-control" id="descricaoTemplate" value="<?php echo $template['descricao']; ?>">
                    <span class="help-text">Descrição opcional do template</span>
                </div>

                <!-- Conteúdo do Email -->
                <div class="form-group">
                    <label for="conteudoTemplate">Conteúdo do Email <span class="required">*</span></label>
                    <textarea class="form-control" id="conteudoTemplate" rows="8" required><?php echo $template['conteudo']; ?></textarea>
                    <span class="help-text">Utilize as variáveis disponíveis abaixo para personalizar o conteúdo</span>
                </div>

                <!-- Variáveis Disponíveis -->
                <div class="form-group">
                    <label>Variáveis Disponíveis</label>
                    <div class="variaveis-container">
                        <?php foreach ($variaveis_disponiveis as $var => $desc): ?>
                            <span class="variavel-tag" onclick="inserirVariavel('<?php echo $var; ?>')" title="<?php echo $desc; ?>">
                                {{ <?php echo $var; ?> }}
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <span class="help-text">Clique em uma variável para inseri-la no conteúdo</span>
                </div>

                <!-- Status -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="statusTemplate">Status</label>
                        <select class="form-control" id="statusTemplate">
                            <option value="ativo" <?php echo $template['status'] === 'ativo' ? 'selected' : ''; ?>>Ativo</option>
                            <option value="pendente" <?php echo $template['status'] === 'pendente' ? 'selected' : ''; ?>>Pendente</option>
                            <option value="inativo" <?php echo $template['status'] === 'inativo' ? 'selected' : ''; ?>>Inativo</option>
                        </select>
                        <span class="help-text">Defina o status do template</span>
                    </div>
                    <div class="form-group" style="display: flex; align-items: flex-end;">
                        <div style="display: flex; align-items: center; gap: 8px; padding: 8px 0; cursor: pointer;">
                            <input type="checkbox" id="templatePadrao" style="width: 16px; height: 16px; accent-color: #00D2FF;">
                            <label for="templatePadrao" style="cursor: pointer; margin: 0;">Marcar como template padrão</label>
                        </div>
                    </div>
                </div>

                <!-- Informações Adicionais -->
                <div class="form-row">
                    <div class="form-group">
                        <label>Última Modificação</label>
                        <input type="text" class="form-control" value="<?php echo formatDate($template['ultima_modificacao']); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Modificado por</label>
                        <input type="text" class="form-control" value="<?php echo $template['modificado_por']; ?>" disabled>
                    </div>
                </div>

                <!-- Botões -->
                <div class="form-actions" style="display: flex; gap: var(--space-md); margin-top: var(--space-lg); padding-top: var(--space-lg); border-top: 1px solid var(--border-color);">
                    <a href="emails.php" class="btn btn-outline" style="flex: 1; justify-content: center; padding: 10px 20px;">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <a href="email-visualizar.php?id=<?php echo $template['id']; ?>" class="btn btn-outline" style="flex: 1; justify-content: center; padding: 10px 20px;">
                        <i class="fas fa-eye"></i> Visualizar
                    </a>
                    <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center; padding: 10px 20px;">
                        <i class="fas fa-save"></i> Salvar Alterações
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
    
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const text = textarea.value;
    
    textarea.value = text.substring(0, start) + variavel + text.substring(end);
    
    const novaPosicao = start + variavel.length;
    textarea.selectionStart = novaPosicao;
    textarea.selectionEnd = novaPosicao;
    
    textarea.focus();
}

// ==========================================
// SALVAR EDIÇÃO
// ==========================================
function salvarEdicao(event) {
    event.preventDefault();

    const id = document.getElementById('templateId').value;
    const nome = document.getElementById('nomeTemplate').value.trim();
    const categoria = document.getElementById('categoriaTemplate').value;
    const assunto = document.getElementById('assuntoTemplate').value.trim();
    const conteudo = document.getElementById('conteudoTemplate').value.trim();

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

    mostrarToast('Template "' + nome + '" atualizado com sucesso!', 'success');

    setTimeout(function() {
        window.location.href = 'email-visualizar.php?id=' + id;
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
        /* EDITAR TEMPLATE - CSS                      */
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
            max-width: 800px;
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
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .form-title span {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .form-title i {
            color: #00D2FF;
        }

        .form-title .template-id {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 400;
        }

        .form-title .template-id strong {
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

        textarea.form-control {
            resize: vertical;
            min-height: 150px;
            font-family: var(--font-body);
            line-height: 1.8;
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

        /* ===== BADGE CATEGORIA ===== */
        .badge-categoria {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .badge-categoria.onboarding {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .badge-categoria.seguranca {
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
        }

        .badge-categoria.financeiro {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .badge-categoria.assinaturas {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .badge-categoria.projetos {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .badge-categoria.relatorios {
            background: rgba(167, 139, 250, 0.12);
            color: #A78BFA;
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

            .form-title {
                flex-direction: column;
                align-items: flex-start;
            }

            .variaveis-container {
                gap: var(--space-xs);
            }

            .variavel-tag {
                font-size: 9px;
                padding: 1px 8px;
            }
        }

        @media (max-width: 480px) {
            .editar-container {
                padding: var(--space-md);
                border-radius: var(--radius-md);
            }

            textarea.form-control {
                min-height: 120px;
            }
        }
    </style>
</body>
</html>