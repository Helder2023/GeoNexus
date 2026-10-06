<?php
// painel/admin/config/email-visualizar.php - Visualizar Template de Email
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Visualizar Template de Email';
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
        'conteudo' => '
Olá {{ nome }},

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
🌍 www.geonnexus.com
'
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
        'conteudo' => '
Olá {{ nome }},

Por favor, confirme o seu endereço de email clicando no link abaixo:

🔗 {{ link_confirmacao }}

Este link é válido por 24 horas.

Se não solicitou esta confirmação, ignore este email.

Atenciosamente,
Equipa GeoNexus
'
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
        'conteudo' => '
Olá {{ nome }},

Recebemos um pedido para redefinir a sua palavra-passe.

🔑 Clique no link abaixo para criar uma nova palavra-passe:
👉 {{ link_reset }}

📍 Detalhes do pedido:
• IP: {{ ip }}
• Data: {{ data }}

Se não solicitou esta redefinição, ignore este email e a sua palavra-passe permanecerá segura.

Atenciosamente,
Equipa GeoNexus
'
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
        'conteudo' => '
Olá {{ nome }},

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
Equipa GeoNexus
'
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
        'conteudo' => '
Olá {{ nome }},

⏰ Lembrete: O pagamento do seu plano {{ plano }} está pendente.

📋 Detalhes:
• Valor: Kz {{ valor }}
• Data de vencimento: {{ vencimento }}

⚠️ Para evitar a interrupção do serviço, efetue o pagamento até à data de vencimento.

Caso já tenha efetuado o pagamento, desconsidere este email.

Atenciosamente,
Equipa GeoNexus
'
    ],
];

// ===== OBTER TEMPLATE ATUAL =====
$template = isset($templates[$id_template]) ? $templates[$id_template] : $templates[1];

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

function getCategoriaIcon($categoria) {
    $icons = [
        'Onboarding' => 'fa-user-plus',
        'Segurança' => 'fa-shield-alt',
        'Financeiro' => 'fa-coins',
        'Assinaturas' => 'fa-crown',
        'Projetos' => 'fa-project-diagram',
        'Relatórios' => 'fa-file-alt'
    ];
    return $icons[$categoria] ?? 'fa-envelope';
}

function getCategoriaColor($categoria) {
    $colors = [
        'Onboarding' => '#00D2FF',
        'Segurança' => '#6C2BD9',
        'Financeiro' => '#FFD93D',
        'Assinaturas' => '#FF6B6B',
        'Projetos' => '#00FFA3',
        'Relatórios' => '#A78BFA'
    ];
    return $colors[$categoria] ?? '#6B7A8F';
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
                    <i class="fas fa-eye icon" style="color: #00D2FF;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <a href="emails.php">Templates de Email</a>
                    <span class="separator">/</span>
                    <span>Visualizar</span>
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
        <!-- CONTEÚDO                                  -->
        <!-- ========================================== -->
        <div class="visualizar-container">
            <!-- ===== HEADER DO TEMPLATE ===== -->
            <div class="template-header">
                <div class="template-header-left">
                    <div class="template-nome">
                        <i class="fas fa-envelope"></i>
                        <?php echo $template['nome']; ?>
                        <span class="badge-status status-<?php echo $template['status']; ?>">
                            <i class="fas <?php echo getStatusIcon($template['status']); ?>"></i>
                            <?php echo $template['status_label']; ?>
                        </span>
                    </div>
                    <div class="template-desc"><?php echo $template['descricao']; ?></div>
                </div>
                <div class="template-header-right">
                    <span class="template-id">ID: <strong>#<?php echo $template['id']; ?></strong></span>
                    <div class="template-actions">
                        <a href="email-editar.php?id=<?php echo $template['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="#" class="btn btn-outline" onclick="testarEmail(<?php echo $template['id']; ?>)">
                            <i class="fas fa-paper-plane"></i> Testar
                        </a>
                        <a href="emails.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>

            <!-- ===== INFORMAÇÕES ===== -->
            <div class="template-info-grid">
                <div class="info-item">
                    <span class="info-label"><i class="fas fa-tag"></i> Categoria</span>
                    <span class="info-value">
                        <span class="badge-categoria <?php echo strtolower($template['categoria']); ?>">
                            <i class="fas <?php echo getCategoriaIcon($template['categoria']); ?>"></i>
                            <?php echo $template['categoria']; ?>
                        </span>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label"><i class="fas fa-subject"></i> Assunto</span>
                    <span class="info-value"><?php echo $template['assunto']; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label"><i class="fas fa-user-edit"></i> Última Modificação</span>
                    <span class="info-value">
                        <?php echo formatDate($template['ultima_modificacao']); ?>
                        <span style="color: var(--text-muted); font-weight: 400;">por <?php echo $template['modificado_por']; ?></span>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label"><i class="fas fa-code"></i> Variáveis Disponíveis</span>
                    <span class="info-value">
                        <div class="variaveis-container" style="margin-bottom: 0; padding: 4px 0; background: transparent; border: none;">
                            <?php foreach ($template['variaveis'] as $var): ?>
                                <span class="badge-variavel">{{ <?php echo $var; ?> }}</span>
                            <?php endforeach; ?>
                        </div>
                    </span>
                </div>
            </div>

            <!-- ===== CONTEÚDO DO EMAIL ===== -->
            <div style="margin-bottom: var(--space-sm);">
                <span style="font-size: var(--text-sm); font-weight: 600; color: var(--text-secondary); display: flex; align-items: center; gap: var(--space-sm);">
                    <i class="fas fa-file-alt" style="color: #00D2FF;"></i>
                    Conteúdo do Email
                </span>
            </div>
            <div class="email-content">
                <?php 
                // Destacar variáveis no conteúdo
                $conteudo = $template['conteudo'];
                foreach ($template['variaveis'] as $var) {
                    $conteudo = str_replace('{{ ' . $var . ' }}', '<span class="variavel-destaque">{{ ' . $var . ' }}</span>', $conteudo);
                }
                echo $conteudo;
                ?>
            </div>

            <!-- ===== BOTÕES RODAPÉ ===== -->
            <div style="display: flex; gap: var(--space-sm); justify-content: flex-end; flex-wrap: wrap; margin-top: var(--space-lg); padding-top: var(--space-lg); border-top: 1px solid var(--border-color);">
                <a href="email-editar.php?id=<?php echo $template['id']; ?>" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Editar Template
                </a>
                <a href="#" class="btn btn-outline" onclick="testarEmail(<?php echo $template['id']; ?>)">
                    <i class="fas fa-paper-plane"></i> Enviar Teste
                </a>
                <a href="emails.php" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Voltar para Lista
                </a>
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
// TESTAR EMAIL
// ==========================================
function testarEmail(id) {
    mostrarToast('A enviar email de teste...', 'info');
    setTimeout(() => {
        mostrarToast('Email de teste enviado com sucesso!', 'success');
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
        /* VISUALIZAR TEMPLATE - CSS                  */
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
        .visualizar-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            max-width: 900px;
            margin: 0 auto;
            transition: var(--transition-smooth);
        }

        .visualizar-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== HEADER DO TEMPLATE ===== */
        .template-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: var(--space-md);
            padding-bottom: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
        }

        .template-header-left {
            display: flex;
            flex-direction: column;
            gap: var(--space-xs);
        }

        .template-header-left .template-nome {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .template-header-left .template-nome i {
            color: #00D2FF;
        }

        .template-header-left .template-desc {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .template-header-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: var(--space-xs);
        }

        .template-header-right .template-id {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-family: 'Orbitron', sans-serif;
        }

        .template-header-right .template-id strong {
            color: #00D2FF;
        }

        .template-actions {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        /* ===== BADGES ===== */
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

        .badge-categoria {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 12px;
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

        .badge-variavel {
            display: inline-block;
            padding: 2px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 600;
            background: rgba(0, 210, 255, 0.1);
            color: #00D2FF;
            font-family: 'Courier New', monospace;
        }

        /* ===== INFORMAÇÕES DO TEMPLATE ===== */
        .template-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .info-item .info-label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-item .info-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
        }

        /* ===== VARIÁVEIS ===== */
        .variaveis-container {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-xs);
            margin-bottom: var(--space-lg);
            padding: var(--space-sm);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        /* ===== CONTEÚDO DO EMAIL ===== */
        .email-content {
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            padding: var(--space-lg);
            font-family: 'Inter', sans-serif;
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.8;
            white-space: pre-wrap;
            word-wrap: break-word;
            max-height: 500px;
            overflow-y: auto;
        }

        .email-content .variavel-destaque {
            color: #00D2FF;
            font-weight: 600;
            background: rgba(0, 210, 255, 0.08);
            padding: 1px 6px;
            border-radius: var(--radius-sm);
            font-family: 'Courier New', monospace;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 768px) {
            .visualizar-container {
                padding: var(--space-lg);
            }

            .template-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .template-header-right {
                align-items: flex-start;
                width: 100%;
            }

            .template-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .template-info-grid {
                grid-template-columns: 1fr;
            }

            .email-content {
                max-height: 400px;
                padding: var(--space-md);
                font-size: var(--text-xs);
            }
        }

        @media (max-width: 480px) {
            .visualizar-container {
                padding: var(--space-md);
                border-radius: var(--radius-md);
            }

            .template-header-left .template-nome {
                font-size: var(--text-h4);
            }

            .template-actions .btn {
                font-size: var(--text-xs);
                padding: 6px 12px;
            }

            .email-content {
                max-height: 300px;
                padding: var(--space-sm);
                font-size: var(--text-xs);
                line-height: 1.6;
            }
        }

        /* ========================================== */
        /* SCROLLBAR PERSONALIZADO                    */
        /* ========================================== */

        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-primary);
        }

        ::-webkit-scrollbar-thumb {
            background: #00D2FF;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0099CC;
        }
    </style>
</body>
</html>