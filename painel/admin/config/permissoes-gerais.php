<?php
// painel/admin/config/permissoes-gerais.php - Permissões Globais
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Permissões Globais';
$pagina_atual = 'permissoes-gerais';
$pagina_atual_sidebar = $pagina_atual;

// ===== DADOS MOCKADOS - PERMISSÕES =====
$permissoes = [
    // ===== MÓDULO ADMIN =====
    'admin' => [
        'nome' => 'Administração',
        'icon' => 'fa-user-cog',
        'permissoes' => [
            'admin_acesso' => ['nome' => 'Acesso ao Painel Admin', 'descricao' => 'Permite aceder ao painel de administração', 'roles' => ['admin', 'super_admin']],
            'admin_usuarios' => ['nome' => 'Gestão de Utilizadores', 'descricao' => 'Permite gerir utilizadores do sistema', 'roles' => ['super_admin']],
            'admin_configuracoes' => ['nome' => 'Configurações do Sistema', 'descricao' => 'Permite modificar configurações do sistema', 'roles' => ['super_admin']],
            'admin_logs' => ['nome' => 'Visualizar Logs', 'descricao' => 'Permite visualizar logs do sistema', 'roles' => ['admin', 'super_admin']],
        ]
    ],
    
    // ===== MÓDULO FINANCEIRO =====
    'financeiro' => [
        'nome' => 'Financeiro',
        'icon' => 'fa-coins',
        'permissoes' => [
            'fin_visualizar' => ['nome' => 'Visualizar Financeiro', 'descricao' => 'Permite visualizar dados financeiros', 'roles' => ['admin', 'super_admin']],
            'fin_gerir' => ['nome' => 'Gerir Financeiro', 'descricao' => 'Permite gerir transações, faturas e pagamentos', 'roles' => ['super_admin']],
            'fin_relatorios' => ['nome' => 'Relatórios Financeiros', 'descricao' => 'Permite gerar relatórios financeiros', 'roles' => ['admin', 'super_admin']],
            'fin_exportar' => ['nome' => 'Exportar Dados Financeiros', 'descricao' => 'Permite exportar dados financeiros', 'roles' => ['admin', 'super_admin']],
        ]
    ],
    
    // ===== MÓDULO PROJETOS =====
    'projetos' => [
        'nome' => 'Projetos',
        'icon' => 'fa-project-diagram',
        'permissoes' => [
            'proj_visualizar' => ['nome' => 'Visualizar Projetos', 'descricao' => 'Permite visualizar projetos', 'roles' => ['admin', 'super_admin']],
            'proj_criar' => ['nome' => 'Criar Projetos', 'descricao' => 'Permite criar novos projetos', 'roles' => ['admin', 'super_admin']],
            'proj_editar' => ['nome' => 'Editar Projetos', 'descricao' => 'Permite editar projetos existentes', 'roles' => ['admin', 'super_admin']],
            'proj_excluir' => ['nome' => 'Excluir Projetos', 'descricao' => 'Permite excluir projetos', 'roles' => ['super_admin']],
            'proj_atribuir' => ['nome' => 'Atribuir Utilizadores', 'descricao' => 'Permite atribuir utilizadores a projetos', 'roles' => ['admin', 'super_admin']],
        ]
    ],
    
    // ===== MÓDULO UTILIZADORES =====
    'utilizadores' => [
        'nome' => 'Utilizadores',
        'icon' => 'fa-users',
        'permissoes' => [
            'user_visualizar' => ['nome' => 'Visualizar Utilizadores', 'descricao' => 'Permite visualizar utilizadores', 'roles' => ['admin', 'super_admin']],
            'user_criar' => ['nome' => 'Criar Utilizadores', 'descricao' => 'Permite criar novos utilizadores', 'roles' => ['admin', 'super_admin']],
            'user_editar' => ['nome' => 'Editar Utilizadores', 'descricao' => 'Permite editar utilizadores existentes', 'roles' => ['admin', 'super_admin']],
            'user_excluir' => ['nome' => 'Excluir Utilizadores', 'descricao' => 'Permite excluir utilizadores', 'roles' => ['super_admin']],
            'user_permissoes' => ['nome' => 'Gerir Permissões', 'descricao' => 'Permite gerir permissões de utilizadores', 'roles' => ['super_admin']],
        ]
    ],
    
    // ===== MÓDULO CONTEÚDO =====
    'conteudo' => [
        'nome' => 'Conteúdo',
        'icon' => 'fa-newspaper',
        'permissoes' => [
            'cont_visualizar' => ['nome' => 'Visualizar Conteúdo', 'descricao' => 'Permite visualizar conteúdo do sistema', 'roles' => ['admin', 'super_admin']],
            'cont_criar' => ['nome' => 'Criar Conteúdo', 'descricao' => 'Permite criar conteúdo (blog, páginas)', 'roles' => ['admin', 'super_admin']],
            'cont_editar' => ['nome' => 'Editar Conteúdo', 'descricao' => 'Permite editar conteúdo existente', 'roles' => ['admin', 'super_admin']],
            'cont_excluir' => ['nome' => 'Excluir Conteúdo', 'descricao' => 'Permite excluir conteúdo', 'roles' => ['super_admin']],
        ]
    ],
    
    // ===== MÓDULO CONFIGURAÇÕES =====
    'configuracoes' => [
        'nome' => 'Configurações',
        'icon' => 'fa-cog',
        'permissoes' => [
            'config_visualizar' => ['nome' => 'Visualizar Configurações', 'descricao' => 'Permite visualizar configurações do sistema', 'roles' => ['admin', 'super_admin']],
            'config_editar' => ['nome' => 'Editar Configurações', 'descricao' => 'Permite editar configurações do sistema', 'roles' => ['super_admin']],
            'config_planos' => ['nome' => 'Gerir Planos', 'descricao' => 'Permite gerir planos e preços', 'roles' => ['super_admin']],
            'config_modulos' => ['nome' => 'Gerir Módulos', 'descricao' => 'Permite ativar/desativar módulos', 'roles' => ['super_admin']],
        ]
    ],
    
    // ===== MÓDULO RELATÓRIOS =====
    'relatorios' => [
        'nome' => 'Relatórios',
        'icon' => 'fa-file-alt',
        'permissoes' => [
            'rel_visualizar' => ['nome' => 'Visualizar Relatórios', 'descricao' => 'Permite visualizar relatórios', 'roles' => ['admin', 'super_admin']],
            'rel_gerar' => ['nome' => 'Gerar Relatórios', 'descricao' => 'Permite gerar relatórios personalizados', 'roles' => ['admin', 'super_admin']],
            'rel_exportar' => ['nome' => 'Exportar Relatórios', 'descricao' => 'Permite exportar relatórios', 'roles' => ['admin', 'super_admin']],
        ]
    ],
];

// ===== ROLES (Perfis) =====
$roles = [
    'super_admin' => [
        'nome' => 'Super Admin',
        'cor' => '#FF6B6B',
        'icone' => 'fa-crown',
        'descricao' => 'Acesso total ao sistema'
    ],
    'admin' => [
        'nome' => 'Administrador',
        'cor' => '#6C2BD9',
        'icone' => 'fa-user-shield',
        'descricao' => 'Acesso administrativo limitado'
    ],
    'gestor' => [
        'nome' => 'Gestor',
        'cor' => '#00D2FF',
        'icone' => 'fa-user-tie',
        'descricao' => 'Gestão de projetos e utilizadores'
    ],
    'utilizador' => [
        'nome' => 'Utilizador',
        'cor' => '#00FFA3',
        'icone' => 'fa-user',
        'descricao' => 'Acesso básico ao sistema'
    ],
];

// ===== CONTAGENS =====
$total_permissoes = 0;
foreach ($permissoes as $modulo) {
    $total_permissoes += count($modulo['permissoes']);
}
$total_modulos = count($permissoes);
$total_roles = count($roles);

// ===== FUNÇÕES AUXILIARES =====
function hasRole($permissoes, $role) {
    return in_array($role, $permissoes);
}

function getRoleBadge($role) {
    global $roles;
    $cor = $roles[$role]['cor'] ?? '#6B7A8F';
    $icone = $roles[$role]['icone'] ?? 'fa-user';
    return '<span style="display: inline-flex; align-items: center; gap: 4px; padding: 2px 10px; border-radius: 20px; font-size: 10px; font-weight: 500; background: ' . $cor . '20; color: ' . $cor . '; border: 1px solid ' . $cor . '40;">
                <i class="fas ' . $icone . '" style="font-size: 9px;"></i>
                ' . $roles[$role]['nome'] . '
            </span>';
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
                    <i class="fas fa-lock icon" style="color: #6C2BD9;"></i>
                    <?php echo $titulo_pagina; ?>
                </h1>
                <p class="breadcrumb">
                    <a href="../../index.php">Dashboard</a>
                    <span class="separator">/</span>
                    <a href="index.php">Configurações</a>
                    <span class="separator">/</span>
                    <span>Permissões Globais</span>
                </p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme" title="Alternar tema">
                    <i class="fas fa-sun theme-icon sun"></i>
                    <i class="fas fa-moon theme-icon moon"></i>
                </button>

                

                <div class="header-actions">
                    <button class="btn btn-primary" onclick="salvarPermissoes()">
                        <i class="fas fa-save"></i> Salvar Permissões
                    </button>
                    <button class="btn btn-outline" onclick="window.location.reload()">
                        <i class="fas fa-sync-alt"></i> Atualizar
                    </button>
                </div>
            </div>
        </header>

        <!-- ===== STATS CARDS ===== -->
        <section class="stats-grid">
            <div class="stat-card" style="border-left: 3px solid #6C2BD9;">
                <div class="icon aurora"><i class="fas fa-lock"></i></div>
                <div class="value"><?php echo $total_permissoes; ?></div>
                <div class="label">Total de Permissões</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                <div class="icon blue"><i class="fas fa-cubes"></i></div>
                <div class="value"><?php echo $total_modulos; ?></div>
                <div class="label">Módulos</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                <div class="icon red"><i class="fas fa-users"></i></div>
                <div class="value"><?php echo $total_roles; ?></div>
                <div class="label">Perfis</div>
            </div>
            <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                <div class="icon green"><i class="fas fa-check-circle"></i></div>
                <div class="value"><?php echo $total_permissoes; ?></div>
                <div class="label">Permissões Configuradas</div>
            </div>
        </section>

        <!-- ===== FILTROS ===== -->
        <div class="filtros-container">
            <div class="filtros-grid">
                <div class="filtro-group">
                    <label class="filtro-label"><i class="fas fa-search"></i> Buscar</label>
                    <input type="text" class="form-control" id="searchPermissao" placeholder="Nome ou descrição..." onkeyup="filtrarPermissoes()">
                </div>
                <div class="filtro-group">
                    <label class="filtro-label"><i class="fas fa-user-tag"></i> Perfil</label>
                    <select class="form-control" id="filtroRole" onchange="filtrarPermissoes()">
                        <option value="todos">Todos os perfis</option>
                        <?php foreach ($roles as $key => $role): ?>
                            <option value="<?php echo $key; ?>"><?php echo $role['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="filtro-group filtro-actions">
                    <button class="btn btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-times"></i> Limpar
                    </button>
                    <span class="resultados-count" id="resultadosCount"><?php echo $total_permissoes; ?> resultados</span>
                </div>
            </div>
        </div>

        <!-- ===== LISTA DE PERMISSÕES ===== -->
        <div class="permissoes-container">
            <div class="section-header">
                <h3><i class="fas fa-lock"></i> Permissões por Módulo</h3>
                <div class="section-actions">
                    <span class="permissoes-total">Total: <strong><?php echo $total_permissoes; ?> permissões</strong></span>
                </div>
            </div>

            <?php foreach ($permissoes as $modulo_key => $modulo): ?>
            <div class="modulo-permissoes" data-modulo="<?php echo $modulo_key; ?>">
                <div class="modulo-header" onclick="toggleModulo('<?php echo $modulo_key; ?>')">
                    <div class="modulo-header-left">
                        <div class="modulo-icon">
                            <i class="fas <?php echo $modulo['icon']; ?>"></i>
                        </div>
                        <span class="modulo-nome"><?php echo $modulo['nome']; ?></span>
                        <span class="modulo-count"><?php echo count($modulo['permissoes']); ?> permissões</span>
                    </div>
                    <div class="modulo-toggle active" id="toggle-<?php echo $modulo_key; ?>">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <ul class="permissoes-list" id="modulo-<?php echo $modulo_key; ?>">
                    <?php foreach ($modulo['permissoes'] as $permissao_key => $permissao): ?>
                    <li class="permissao-item" 
                        data-nome="<?php echo strtolower($permissao['nome']); ?>" 
                        data-desc="<?php echo strtolower($permissao['descricao']); ?>"
                        data-modulo="<?php echo $modulo_key; ?>">
                        <div class="permissao-info">
                            <span class="permissao-nome"><?php echo $permissao['nome']; ?></span>
                            <span class="permissao-desc"><?php echo $permissao['descricao']; ?></span>
                        </div>
                        <div class="permissao-roles">
                            <?php foreach ($roles as $role_key => $role): ?>
                            <span class="role-tag <?php echo hasRole($permissao['roles'], $role_key) ? 'active' : ''; ?>" 
                                  data-role="<?php echo $role_key; ?>"
                                  data-permissao="<?php echo $permissao_key; ?>"
                                  style="--role-color: <?php echo $role['cor']; ?>;"
                                  onclick="toggleRole(this, '<?php echo $permissao_key; ?>', '<?php echo $role_key; ?>')">
                                <i class="fas <?php echo $role['icone']; ?>"></i>
                                <?php echo $role['nome']; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endforeach; ?>
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
// TOGGLE MÓDULO
// ==========================================
function toggleModulo(moduloKey) {
    const lista = document.getElementById('modulo-' + moduloKey);
    const toggle = document.getElementById('toggle-' + moduloKey);
    
    if (lista) {
        if (lista.style.display === 'none') {
            lista.style.display = '';
            toggle.classList.add('active');
        } else {
            lista.style.display = 'none';
            toggle.classList.remove('active');
        }
    }
}

// ==========================================
// TOGGLE ROLE
// ==========================================
function toggleRole(element, permissaoKey, roleKey) {
    element.classList.toggle('active');
}

// ==========================================
// FILTRAR PERMISSÕES
// ==========================================
function filtrarPermissoes() {
    const search = document.getElementById('searchPermissao').value.toLowerCase();
    const role = document.getElementById('filtroRole').value;

    const items = document.querySelectorAll('.permissao-item');
    let visiveis = 0;

    items.forEach(item => {
        const nome = item.dataset.nome || '';
        const desc = item.dataset.desc || '';
        const modulo = item.dataset.modulo || '';

        let mostrar = true;

        if (search) {
            const match = nome.includes(search) || desc.includes(search);
            if (!match) mostrar = false;
        }

        if (role !== 'todos') {
            const roles = item.querySelectorAll('.role-tag');
            let hasRole = false;
            roles.forEach(r => {
                if (r.dataset.role === role && r.classList.contains('active')) {
                    hasRole = true;
                }
            });
            if (!hasRole) mostrar = false;
        }

        item.style.display = mostrar ? '' : 'none';
        if (mostrar) visiveis++;
    });

    document.getElementById('resultadosCount').textContent = visiveis + ' resultados';

    // Mostrar/esconder módulos vazios
    document.querySelectorAll('.modulo-permissoes').forEach(modulo => {
        const visiveisNoModulo = modulo.querySelectorAll('.permissao-item[style*="display: none"]');
        const total = modulo.querySelectorAll('.permissao-item').length;
        if (visiveisNoModulo.length === total) {
            modulo.style.display = 'none';
        } else {
            modulo.style.display = '';
        }
    });
}

function limparFiltros() {
    document.getElementById('searchPermissao').value = '';
    document.getElementById('filtroRole').value = 'todos';
    filtrarPermissoes();
}

// ==========================================
// SALVAR PERMISSÕES
// ==========================================
function salvarPermissoes() {
    const permissoes = {};
    
    document.querySelectorAll('.permissao-item').forEach(item => {
        const permissaoKey = item.querySelector('.role-tag')?.dataset.permissao;
        if (permissaoKey) {
            const roles = [];
            item.querySelectorAll('.role-tag.active').forEach(tag => {
                roles.push(tag.dataset.role);
            });
            permissoes[permissaoKey] = roles;
        }
    });

    mostrarToast('Permissões atualizadas com sucesso!', 'success');
    setTimeout(() => {
        location.reload();
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
        /* PERMISSÕES GLOBAIS - CSS                   */
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
        .permissoes-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .permissoes-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        /* ===== STATS CARDS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
            transform: translateY(-2px);
        }

        .stat-card .icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: var(--space-sm);
        }

        .stat-card .icon.aurora {
            background: rgba(108, 43, 217, 0.12);
            color: #6C2BD9;
        }

        .stat-card .icon.blue {
            background: rgba(0, 210, 255, 0.12);
            color: #00D2FF;
        }

        .stat-card .icon.green {
            background: rgba(0, 255, 163, 0.12);
            color: #00FFA3;
        }

        .stat-card .icon.red {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .stat-card .value {
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            display: block;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== FILTROS ===== */
        .filtros-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .filtros-container:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .filtros-grid {
            display: grid;
            grid-template-columns: 2fr 1fr auto;
            gap: var(--space-md);
            align-items: end;
        }

        .filtro-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .filtro-label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .filtro-label i {
            font-size: 12px;
        }

        .filtro-actions {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: var(--space-sm);
            padding-bottom: 1px;
            flex-wrap: wrap;
        }

        .resultados-count {
            font-size: var(--text-xs);
            color: var(--text-muted);
            white-space: nowrap;
            padding: 4px 10px;
            background: var(--bg-input);
            border-radius: var(--radius-full);
        }

        /* ===== FORM CONTROLS ===== */
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

        /* ===== MÓDULOS ===== */
        .modulo-permissoes {
            margin-bottom: var(--space-xl);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        .modulo-permissoes:hover {
            border-color: var(--text-muted);
        }

        .modulo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            background: var(--bg-input);
            border-bottom: 1px solid var(--border-color);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .modulo-header:hover {
            background: var(--bg-card-hover);
        }

        .modulo-header-left {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .modulo-header-left .modulo-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(108, 43, 217, 0.1);
            color: #6C2BD9;
        }

        .modulo-header-left .modulo-nome {
            font-weight: 600;
            color: var(--text-primary);
        }

        .modulo-header-left .modulo-count {
            font-size: var(--text-xs);
            color: var(--text-muted);
            background: var(--bg-input);
            padding: 2px 10px;
            border-radius: var(--radius-full);
        }

        .modulo-toggle {
            color: var(--text-muted);
            transition: var(--transition-smooth);
        }

        .modulo-toggle.active {
            transform: rotate(180deg);
        }

        /* ===== PERMISSÕES ===== */
        .permissoes-list {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .permissoes-list .permissao-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .permissoes-list .permissao-item:last-child {
            border-bottom: none;
        }

        .permissoes-list .permissao-item:hover {
            background: var(--bg-card-hover);
        }

        .permissao-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .permissao-info .permissao-nome {
            font-weight: 500;
            color: var(--text-primary);
            font-size: var(--text-sm);
        }

        .permissao-info .permissao-desc {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .permissao-roles {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
            align-items: center;
        }

        .permissao-roles .role-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
        }

        .permissao-roles .role-tag:hover {
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .permissao-roles .role-tag.active {
            border-color: var(--role-color, #6C2BD9);
            background: var(--role-color, #6C2BD9);
            color: #fff;
        }

        .permissao-roles .role-tag i {
            font-size: 9px;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1200px) {
            .filtros-grid {
                grid-template-columns: 1fr 1fr;
            }
            .filtro-actions {
                grid-column: span 2;
                justify-content: flex-end;
            }
        }

        @media (max-width: 768px) {
            .filtros-grid {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .filtro-actions {
                grid-column: span 1;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .permissoes-list .permissao-item {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-sm);
            }

            .permissao-roles {
                width: 100%;
                justify-content: flex-start;
            }

            .modulo-header {
                flex-wrap: wrap;
                gap: var(--space-sm);
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }

            .permissoes-container {
                padding: var(--space-sm);
            }

            .filtros-container {
                padding: var(--space-sm);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .permissoes-container {
                padding: var(--space-sm);
                border-radius: var(--radius-md);
            }

            .filtros-container {
                padding: var(--space-sm);
            }

            .filtro-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .resultados-count {
                text-align: center;
            }

            .modulo-header {
                padding: 12px 16px;
            }

            .permissoes-list .permissao-item {
                padding: 8px 16px;
            }

            .permissao-roles .role-tag {
                font-size: 9px;
                padding: 1px 8px;
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
            background: #6C2BD9;
            border-radius: 2px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #8B5CF6;
        }
    </style>
</body>
</html>