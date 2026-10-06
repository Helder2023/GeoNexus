<?php
// painel/admin/config/sistema-editar.php - Editar Configurações do Sistema
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Editar Configurações do Sistema';
$pagina_atual = 'sistema';
$pagina_atual_sidebar = $pagina_atual;

// ===== DADOS MOCKADOS - CONFIGURAÇÕES =====
$configuracoes = [
    // ===== INFORMAÇÕES GERAIS =====
    'nome_site' => 'GeoNexus',
    'descricao_site' => 'Plataforma de Engenharia e Geotecnologia',
    'email_contato' => 'contato@geonnexus.com',
    'telefone_contato' => '+244 923 456 789',
    'endereco' => 'Rua 15, Nº 245, Luanda, Angola',
    
    // ===== BRANDING =====
    'logo' => 'logo.png',
    'favicon' => 'favicon.png',
    'cor_primaria' => '#0A1628',
    'cor_secundaria' => '#1A2A4A',
    'cor_destaque' => '#FFD93D',
    'cor_fundo' => '#0A1628',
    
    // ===== SEGURANÇA =====
    'auth_duas_fases' => true,
    'tempo_sessao' => 60,
    'min_caracteres_senha' => 8,
    'bloqueio_tentativas' => 5,
    'tempo_bloqueio' => 30,
    
    // ===== NOTIFICAÇÕES =====
    'notificacoes_email' => true,
    'notificacoes_push' => false,
    'notificacoes_sms' => false,
    'email_admin_notificacoes' => 'admin@geonnexus.com',
    
    // ===== ARMAZENAMENTO =====
    'armazenamento_maximo' => 100,
    'tamanho_maximo_arquivo' => 10,
    'formatos_permitidos' => 'pdf,jpg,png,doc,docx,xls,xlsx',
    
    // ===== PERFORMANCE =====
    'cache_ativo' => true,
    'tempo_cache' => 3600,
    'compressao_imagens' => true,
    
    // ===== BACKUP =====
    'backup_automatico' => true,
    'frequencia_backup' => 'daily',
    'retencao_backup' => 30,
];

// ===== CATEGORIAS DE CONFIGURAÇÃO =====
$categorias = [
    'geral' => [
        'nome' => 'Informações Gerais',
        'icon' => 'fa-info-circle',
        'ativo' => true
    ],
    'branding' => [
        'nome' => 'Branding',
        'icon' => 'fa-palette',
        'ativo' => true
    ],
    'seguranca' => [
        'nome' => 'Segurança',
        'icon' => 'fa-shield-alt',
        'ativo' => true
    ],
    'notificacoes' => [
        'nome' => 'Notificações',
        'icon' => 'fa-bell',
        'ativo' => true
    ],
    'armazenamento' => [
        'nome' => 'Armazenamento',
        'icon' => 'fa-database',
        'ativo' => true
    ],
    'performance' => [
        'nome' => 'Performance',
        'icon' => 'fa-tachometer-alt',
        'ativo' => true
    ],
    'backup' => [
        'nome' => 'Backup',
        'icon' => 'fa-archive',
        'ativo' => true
    ],
];

// ===== FUNÇÕES AUXILIARES =====
function getStatusLabel($value) {
    return $value ? 'Ativo' : 'Inativo';
}

function getFrequenciaLabel($freq) {
    $labels = [
        'daily' => 'Diário',
        'weekly' => 'Semanal',
        'monthly' => 'Mensal'
    ];
    return $labels[$freq] ?? $freq;
}

function getFrequenciaOptions() {
    return [
        'daily' => 'Diário',
        'weekly' => 'Semanal',
        'monthly' => 'Mensal'
    ];
}

function getStatusOptions() {
    return [
        '1' => 'Ativo',
        '0' => 'Inativo'
    ];
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
                    <a href="sistema.php">Sistema</a>
                    <span class="separator">/</span>
                    <span>Editar</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>


                <div class="header-actions">
                    <button type="submit" form="formEditarSistema" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar Alterações
                    </button>
                    <a href="sistema.php" class="btn btn-outline">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </div>
        </header>

        <!-- ========================================== -->
        <!-- FORMULÁRIO                                -->
        <!-- ========================================== -->
        <div class="editar-container">
            <div class="form-title">
                <span>
                    <i class="fas fa-cog"></i>
                    Editar Configurações do Sistema
                </span>
            </div>

            <!-- ===== MENU DE CATEGORIAS ===== -->
            <div class="categorias-menu">
                <?php foreach ($categorias as $key => $cat): ?>
                    <button class="categoria-btn <?php echo $key === 'geral' ? 'active' : ''; ?>" 
                            onclick="mostrarCategoria('<?php echo $key; ?>')">
                        <i class="fas <?php echo $cat['icon']; ?>"></i>
                        <?php echo $cat['nome']; ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <form id="formEditarSistema" onsubmit="salvarEdicao(event)">
                
                <!-- ========================================== -->
                <!-- SEÇÃO: INFORMAÇÕES GERAIS                 -->
                <!-- ========================================== -->
                <div class="config-section active" id="sec-geral">
                    <div class="config-section-title">
                        <i class="fas fa-info-circle"></i>
                        Informações Gerais
                    </div>

                    <div class="form-group">
                        <label for="nomeSite">Nome do Site <span class="required">*</span></label>
                        <input type="text" class="form-control" id="nomeSite" value="<?php echo $configuracoes['nome_site']; ?>" required>
                        <span class="help-text">Nome principal do sistema</span>
                    </div>

                    <div class="form-group">
                        <label for="descricaoSite">Descrição do Site</label>
                        <input type="text" class="form-control" id="descricaoSite" value="<?php echo $configuracoes['descricao_site']; ?>">
                        <span class="help-text">Descrição curta do sistema</span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="emailContato">Email de Contato <span class="required">*</span></label>
                            <input type="email" class="form-control" id="emailContato" value="<?php echo $configuracoes['email_contato']; ?>" required>
                            <span class="help-text">Email principal de contato</span>
                        </div>
                        <div class="form-group">
                            <label for="telefoneContato">Telefone de Contato</label>
                            <input type="text" class="form-control" id="telefoneContato" value="<?php echo $configuracoes['telefone_contato']; ?>">
                            <span class="help-text">Telefone para contato</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" value="<?php echo $configuracoes['endereco']; ?>">
                        <span class="help-text">Endereço físico da empresa</span>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- SEÇÃO: BRANDING                           -->
                <!-- ========================================== -->
                <div class="config-section" id="sec-branding">
                    <div class="config-section-title">
                        <i class="fas fa-palette"></i>
                        Branding
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="text" class="form-control" id="logo" value="<?php echo $configuracoes['logo']; ?>">
                            <span class="help-text">Nome do ficheiro da logo</span>
                        </div>
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="text" class="form-control" id="favicon" value="<?php echo $configuracoes['favicon']; ?>">
                            <span class="help-text">Nome do ficheiro do favicon</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="corPrimaria">Cor Primária</label>
                            <div style="display: flex; gap: var(--space-sm); align-items: center;">
                                <input type="color" class="form-control" id="corPrimaria" value="<?php echo $configuracoes['cor_primaria']; ?>" style="width: 60px; padding: 4px; height: 42px;">
                                <input type="text" class="form-control" id="corPrimariaText" value="<?php echo $configuracoes['cor_primaria']; ?>" style="flex: 1;">
                            </div>
                            <span class="help-text">Cor principal do sistema</span>
                        </div>
                        <div class="form-group">
                            <label for="corSecundaria">Cor Secundária</label>
                            <div style="display: flex; gap: var(--space-sm); align-items: center;">
                                <input type="color" class="form-control" id="corSecundaria" value="<?php echo $configuracoes['cor_secundaria']; ?>" style="width: 60px; padding: 4px; height: 42px;">
                                <input type="text" class="form-control" id="corSecundariaText" value="<?php echo $configuracoes['cor_secundaria']; ?>" style="flex: 1;">
                            </div>
                            <span class="help-text">Cor secundária do sistema</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="corDestaque">Cor de Destaque</label>
                            <div style="display: flex; gap: var(--space-sm); align-items: center;">
                                <input type="color" class="form-control" id="corDestaque" value="<?php echo $configuracoes['cor_destaque']; ?>" style="width: 60px; padding: 4px; height: 42px;">
                                <input type="text" class="form-control" id="corDestaqueText" value="<?php echo $configuracoes['cor_destaque']; ?>" style="flex: 1;">
                            </div>
                            <span class="help-text">Cor de destaque para CTAs e elementos importantes</span>
                        </div>
                        <div class="form-group">
                            <label for="corFundo">Cor de Fundo</label>
                            <div style="display: flex; gap: var(--space-sm); align-items: center;">
                                <input type="color" class="form-control" id="corFundo" value="<?php echo $configuracoes['cor_fundo']; ?>" style="width: 60px; padding: 4px; height: 42px;">
                                <input type="text" class="form-control" id="corFundoText" value="<?php echo $configuracoes['cor_fundo']; ?>" style="flex: 1;">
                            </div>
                            <span class="help-text">Cor de fundo do sistema</span>
                        </div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- SEÇÃO: SEGURANÇA                         -->
                <!-- ========================================== -->
                <div class="config-section" id="sec-seguranca">
                    <div class="config-section-title">
                        <i class="fas fa-shield-alt"></i>
                        Segurança
                    </div>

                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="authDuasFases" <?php echo $configuracoes['auth_duas_fases'] ? 'checked' : ''; ?>>
                            <label for="authDuasFases">Autenticação em Duas Fases</label>
                        </div>
                        <span class="help-text">Ativa a verificação em duas etapas para os utilizadores</span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="tempoSessao">Tempo de Sessão (minutos)</label>
                            <input type="number" class="form-control" id="tempoSessao" value="<?php echo $configuracoes['tempo_sessao']; ?>" min="5" max="1440">
                            <span class="help-text">Tempo máximo de inatividade antes de expirar a sessão</span>
                        </div>
                        <div class="form-group">
                            <label for="minCaracteresSenha">Mínimo de Caracteres para Senha</label>
                            <input type="number" class="form-control" id="minCaracteresSenha" value="<?php echo $configuracoes['min_caracteres_senha']; ?>" min="6" max="20">
                            <span class="help-text">Número mínimo de caracteres para a palavra-passe</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="bloqueioTentativas">Tentativas Antes de Bloquear</label>
                            <input type="number" class="form-control" id="bloqueioTentativas" value="<?php echo $configuracoes['bloqueio_tentativas']; ?>" min="3" max="10">
                            <span class="help-text">Número de tentativas falhas antes de bloquear a conta</span>
                        </div>
                        <div class="form-group">
                            <label for="tempoBloqueio">Tempo de Bloqueio (minutos)</label>
                            <input type="number" class="form-control" id="tempoBloqueio" value="<?php echo $configuracoes['tempo_bloqueio']; ?>" min="5" max="120">
                            <span class="help-text">Tempo em que a conta fica bloqueada</span>
                        </div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- SEÇÃO: NOTIFICAÇÕES                       -->
                <!-- ========================================== -->
                <div class="config-section" id="sec-notificacoes">
                    <div class="config-section-title">
                        <i class="fas fa-bell"></i>
                        Notificações
                    </div>

                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="notifEmail" <?php echo $configuracoes['notificacoes_email'] ? 'checked' : ''; ?>>
                            <label for="notifEmail">Notificações por Email</label>
                        </div>
                        <span class="help-text">Envia notificações por email para os utilizadores</span>
                    </div>

                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="notifPush" <?php echo $configuracoes['notificacoes_push'] ? 'checked' : ''; ?>>
                            <label for="notifPush">Notificações Push</label>
                        </div>
                        <span class="help-text">Envia notificações push no navegador</span>
                    </div>

                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="notifSMS" <?php echo $configuracoes['notificacoes_sms'] ? 'checked' : ''; ?>>
                            <label for="notifSMS">Notificações por SMS</label>
                        </div>
                        <span class="help-text">Envia notificações por SMS para os utilizadores</span>
                    </div>

                    <div class="form-group">
                        <label for="emailAdminNotificacoes">Email Admin para Notificações</label>
                        <input type="email" class="form-control" id="emailAdminNotificacoes" value="<?php echo $configuracoes['email_admin_notificacoes']; ?>">
                        <span class="help-text">Email que receberá notificações administrativas</span>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- SEÇÃO: ARMAZENAMENTO                      -->
                <!-- ========================================== -->
                <div class="config-section" id="sec-armazenamento">
                    <div class="config-section-title">
                        <i class="fas fa-database"></i>
                        Armazenamento
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="armazenamentoMaximo">Armazenamento Máximo (GB)</label>
                            <input type="number" class="form-control" id="armazenamentoMaximo" value="<?php echo $configuracoes['armazenamento_maximo']; ?>" min="1" max="1000">
                            <span class="help-text">Capacidade máxima de armazenamento em GB</span>
                        </div>
                        <div class="form-group">
                            <label for="tamanhoMaximoArquivo">Tamanho Máximo de Arquivo (MB)</label>
                            <input type="number" class="form-control" id="tamanhoMaximoArquivo" value="<?php echo $configuracoes['tamanho_maximo_arquivo']; ?>" min="1" max="100">
                            <span class="help-text">Tamanho máximo permitido por arquivo em MB</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="formatosPermitidos">Formatos Permitidos</label>
                        <input type="text" class="form-control" id="formatosPermitidos" value="<?php echo $configuracoes['formatos_permitidos']; ?>">
                        <span class="help-text">Extensões de ficheiros permitidas (separadas por vírgula)</span>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- SEÇÃO: PERFORMANCE                        -->
                <!-- ========================================== -->
                <div class="config-section" id="sec-performance">
                    <div class="config-section-title">
                        <i class="fas fa-tachometer-alt"></i>
                        Performance
                    </div>

                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="cacheAtivo" <?php echo $configuracoes['cache_ativo'] ? 'checked' : ''; ?>>
                            <label for="cacheAtivo">Cache Ativo</label>
                        </div>
                        <span class="help-text">Ativa o sistema de cache para melhorar a performance</span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="tempoCache">Tempo de Cache (segundos)</label>
                            <input type="number" class="form-control" id="tempoCache" value="<?php echo $configuracoes['tempo_cache']; ?>" min="60" max="86400">
                            <span class="help-text">Tempo em segundos que o cache permanece válido</span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-group" style="padding-top: 20px;">
                                <input type="checkbox" id="compressaoImagens" <?php echo $configuracoes['compressao_imagens'] ? 'checked' : ''; ?>>
                                <label for="compressaoImagens">Compressão de Imagens</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- SEÇÃO: BACKUP                            -->
                <!-- ========================================== -->
                <div class="config-section" id="sec-backup">
                    <div class="config-section-title">
                        <i class="fas fa-archive"></i>
                        Backup
                    </div>

                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="backupAutomatico" <?php echo $configuracoes['backup_automatico'] ? 'checked' : ''; ?>>
                            <label for="backupAutomatico">Backup Automático</label>
                        </div>
                        <span class="help-text">Ativa a realização automática de backups</span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="frequenciaBackup">Frequência de Backup</label>
                            <select class="form-control" id="frequenciaBackup">
                                <?php foreach (getFrequenciaOptions() as $value => $label): ?>
                                    <option value="<?php echo $value; ?>" <?php echo $configuracoes['frequencia_backup'] === $value ? 'selected' : ''; ?>>
                                        <?php echo $label; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <span class="help-text">Frequência com que os backups são realizados</span>
                        </div>
                        <div class="form-group">
                            <label for="retencaoBackup">Retenção de Backup (dias)</label>
                            <input type="number" class="form-control" id="retencaoBackup" value="<?php echo $configuracoes['retencao_backup']; ?>" min="1" max="365">
                            <span class="help-text">Número de dias para manter os backups</span>
                        </div>
                    </div>
                </div>

                <!-- ===== BOTÕES RODAPÉ ===== -->
                <div style="display: flex; gap: var(--space-md); margin-top: var(--space-xl); padding-top: var(--space-lg); border-top: 1px solid var(--border-color); flex-wrap: wrap;">
                    <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center; padding: 12px 24px;">
                        <i class="fas fa-save"></i> Salvar Alterações
                    </button>
                    <a href="sistema.php" class="btn btn-outline" style="flex: 1; justify-content: center; padding: 12px 24px;">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="button" class="btn btn-danger" style="flex: 1; justify-content: center; padding: 12px 24px;" onclick="restaurarPadrao()">
                        <i class="fas fa-undo"></i> Restaurar Padrão
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
// MOSTRAR CATEGORIA
// ==========================================
function mostrarCategoria(id) {
    document.querySelectorAll('.config-section').forEach(sec => {
        sec.classList.remove('active');
    });

    const sec = document.getElementById('sec-' + id);
    if (sec) {
        sec.classList.add('active');
    }

    document.querySelectorAll('.categoria-btn').forEach(btn => {
        btn.classList.remove('active');
    });

    const btn = document.querySelector('.categoria-btn[onclick="mostrarCategoria(\'' + id + '\')"]');
    if (btn) {
        btn.classList.add('active');
    }
}

// ==========================================
// SINCRONIZAR CORES
// ==========================================
document.addEventListener('DOMContentLoaded', function() {
    // Sincronizar input color com text
    const corInputs = ['corPrimaria', 'corSecundaria', 'corDestaque', 'corFundo'];
    corInputs.forEach(id => {
        const colorInput = document.getElementById(id);
        const textInput = document.getElementById(id + 'Text');
        if (colorInput && textInput) {
            colorInput.addEventListener('input', function() {
                textInput.value = this.value;
            });
            textInput.addEventListener('input', function() {
                colorInput.value = this.value;
            });
        }
    });
});

// ==========================================
// SALVAR EDIÇÃO
// ==========================================
function salvarEdicao(event) {
    event.preventDefault();

    const nomeSite = document.getElementById('nomeSite').value.trim();
    const emailContato = document.getElementById('emailContato').value.trim();

    if (!nomeSite) {
        mostrarToast('Por favor, insira o nome do site.', 'error');
        document.getElementById('nomeSite').focus();
        return;
    }

    if (!emailContato) {
        mostrarToast('Por favor, insira o email de contato.', 'error');
        document.getElementById('emailContato').focus();
        return;
    }

    mostrarToast('Configurações do sistema atualizadas com sucesso!', 'success');

    setTimeout(function() {
        window.location.href = 'sistema.php';
    }, 1500);
}

// ==========================================
// RESTAURAR PADRÃO
// ==========================================
function restaurarPadrao() {
    if (confirm('Tem certeza que deseja restaurar as configurações para o padrão? Esta ação não pode ser desfeita.')) {
        mostrarToast('Configurações restauradas para o padrão!', 'warning');
        setTimeout(() => {
            window.location.reload();
        }, 1500);
    }
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
        /* EDITAR SISTEMA - CSS                       */
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
            max-width: 900px;
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

        /* ===== MENU DE CATEGORIAS ===== */
        .categorias-menu {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-xs);
            margin-bottom: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            padding-bottom: var(--space-md);
        }

        .categoria-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            font-size: var(--text-sm);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .categoria-btn:hover {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .categoria-btn.active {
            background: rgba(0, 210, 255, 0.1);
            border-color: #00D2FF;
            color: #00D2FF;
        }

        .categoria-btn i {
            font-size: 14px;
        }

        /* ===== SEÇÃO DE CONFIGURAÇÃO ===== */
        .config-section {
            display: none;
        }

        .config-section.active {
            display: block;
        }

        .config-section-title {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-lg);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .config-section-title i {
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

        input[type="color"].form-control {
            padding: 4px;
            height: 42px;
            cursor: pointer;
        }

        /* ===== CHECKBOX ===== */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 0;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #00D2FF;
            cursor: pointer;
        }

        .checkbox-group label {
            cursor: pointer;
            margin: 0;
            font-size: var(--text-sm);
            color: var(--text-secondary);
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

            .categorias-menu {
                justify-content: center;
            }

            .categoria-btn {
                font-size: var(--text-xs);
                padding: 6px 12px;
            }
        }

        @media (max-width: 480px) {
            .editar-container {
                padding: var(--space-md);
                border-radius: var(--radius-md);
            }

            .categoria-btn {
                font-size: var(--text-xs);
                padding: 4px 10px;
            }

            .categoria-btn i {
                font-size: 12px;
            }
        }
    </style>
</body>
</html>