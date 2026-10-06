<?php
// includes/individual-sidebar.php
// Sidebar para a sessão Individual (Profissional)

// Garantir que a página atual esteja definida
if (!isset($pagina_atual)) {
    $pagina_atual = 'dashboard';
}

// ============================================
// FUNÇÃO AUXILIAR PARA ITEM ATIVO
// ============================================
if (!function_exists('individualIsActive')) {
    function individualIsActive($pages, $current) {
        if (is_array($pages)) {
            return in_array($current, $pages) ? 'active' : '';
        }
        return ($current === $pages) ? 'active' : '';
    }
}

// ============================================
// DADOS DO PROFISSIONAL
// ============================================
$sidebar_profissional = [
    'nome' => $profissional_atual['nome'] ?? 'Carlos Mendes',
    'email' => $profissional_atual['email'] ?? 'carlos.mendes@email.com',
    'avatar' => $profissional_atual['avatar'] ?? 'avatar-1.png',
    'profissao' => $profissional_atual['profissao'] ?? 'Engenheiro Topógrafo',
    'plano' => $profissional_atual['plano'] ?? 'Pro',
    'nivel' => $profissional_atual['nivel'] ?? 'Profissional Certificado'
];

// ============================================
// LISTA DOS 12 SETORES
// ============================================
$sidebar_setores = [
    ['icon' => 'fa-mountain', 'label' => 'Topografia', 'link' => 'setores/topografia/index.php', 'page' => 'topografia', 'color' => '#6C2BD9'],
    ['icon' => 'fa-ruler-combined', 'label' => 'Engenharia', 'link' => 'setores/engenharia/index.php', 'page' => 'engenharia', 'color' => '#00D2FF'],
    ['icon' => 'fa-home', 'label' => 'Cadastro', 'link' => 'setores/cadastro/index.php', 'page' => 'cadastro', 'color' => '#FFD93D'],
    ['icon' => 'fa-globe', 'label' => 'GIS', 'link' => 'setores/gis/index.php', 'page' => 'gis', 'color' => '#00FFA3'],
    ['icon' => 'fa-tractor', 'label' => 'Agricultura', 'link' => 'setores/agricultura/index.php', 'page' => 'agricultura', 'color' => '#6BCB77'],
    ['icon' => 'fa-gem', 'label' => 'Mineração', 'link' => 'setores/mineracao/index.php', 'page' => 'mineracao', 'color' => '#FF9F43'],
    ['icon' => 'fa-oil-can', 'label' => 'Petróleo & Gás', 'link' => 'setores/petroleo/index.php', 'page' => 'petroleo', 'color' => '#FD79A8'],
    ['icon' => 'fa-bolt', 'label' => 'Energia', 'link' => 'setores/energia/index.php', 'page' => 'energia', 'color' => '#FFD93D'],
    ['icon' => 'fa-city', 'label' => 'Urbanismo', 'link' => 'setores/urbanismo/index.php', 'page' => 'urbanismo', 'color' => '#A29BFE'],
    ['icon' => 'fa-truck', 'label' => 'Transportes', 'link' => 'setores/transportes/index.php', 'page' => 'transportes', 'color' => '#00CEC9'],
    ['icon' => 'fa-drone', 'label' => 'Drones', 'link' => 'setores/drones/index.php', 'page' => 'drones', 'color' => '#FF6B6B'],
    ['icon' => 'fa-graduation-cap', 'label' => 'Educação', 'link' => 'setores/educacao/index.php', 'page' => 'educacao', 'color' => '#FDCB6E'],
];

// ============================================
// MENU DA SIDEBAR
// ============================================
$sidebar_menu = [
    [
        'titulo' => 'Principal',
        'itens' => [
            [
                'icon' => 'fa-th-large',
                'label' => 'Dashboard',
                'link' => 'index.php',
                'pages' => ['dashboard']
            ],
            [
                'icon' => 'fa-project-diagram',
                'label' => 'Projetos',
                'link' => 'projetos.php',
                'pages' => ['projetos', 'projeto-criar', 'projeto-editar', 'projeto-detalhe', 'projeto-excluir', 'projeto-arquivar'],
                'badge' => $total_projetos ?? 0,
                'badge_class' => 'badge-primary'
            ],
            [
                'icon' => 'fa-tools',
                'label' => 'Serviços',
                'link' => 'servicos/index.php',
                'pages' => ['servicos', 'servico-cadastrar', 'servico-editar', 'servico-excluir', 'portfolio', 'precos']
            ],
        ]
    ],
    [
        'titulo' => 'Financeiro',
        'itens' => [
            [
                'icon' => 'fa-chart-pie',
                'label' => 'Dashboard Financeiro',
                'link' => 'financeiro/index.php',
                'pages' => ['financeiro']
            ],
            [
                'icon' => 'fa-exchange-alt',
                'label' => 'Transações',
                'link' => 'financeiro/transacoes.php',
                'pages' => ['transacoes', 'transacao-criar', 'transacao-editar', 'transacao-detalhe', 'transacao-excluir']
            ],
            [
                'icon' => 'fa-money-bill-wave',
                'label' => 'Pagamentos',
                'link' => 'financeiro/pagamentos.php',
                'pages' => ['pagamentos', 'pagamento-criar', 'pagamento-detalhe', 'pagamento-comprovativo']
            ],
            [
                'icon' => 'fa-file-invoice',
                'label' => 'Faturas',
                'link' => 'financeiro/faturas.php',
                'pages' => ['faturas', 'fatura-criar', 'fatura-editar', 'fatura-detalhe', 'fatura-cancelar']
            ],
            [
                'icon' => 'fa-file-signature',
                'label' => 'Orçamentos',
                'link' => 'financeiro/orcamentos.php',
                'pages' => ['orcamentos', 'orcamento-criar', 'orcamento-editar', 'orcamento-excluir']
            ],
            [
                'icon' => 'fa-users',
                'label' => 'Clientes',
                'link' => 'financeiro/clientes.php',
                'pages' => ['clientes', 'cliente-cadastrar', 'cliente-editar', 'cliente-excluir'],
                'badge' => $total_clientes ?? 0,
                'badge_class' => 'badge-info'
            ],
            [
                'icon' => 'fa-bullseye',
                'label' => 'Metas',
                'link' => 'financeiro/metas.php',
                'pages' => ['metas', 'meta-criar', 'meta-editar', 'meta-excluir']
            ],
            [
                'icon' => 'fa-chart-line',
                'label' => 'Fluxo de Caixa',
                'link' => 'financeiro/fluxo-caixa.php',
                'pages' => ['fluxo-caixa']
            ],
        ]
    ],
    [
        'titulo' => 'Gestão',
        'itens' => [
            [
                'icon' => 'fa-boxes',
                'label' => 'Equipamentos',
                'link' => 'equipamentos.php',
                'pages' => ['equipamentos', 'equipamento-cadastrar', 'equipamento-editar', 'equipamento-excluir']
            ],
            [
                'icon' => 'fa-folder-open',
                'label' => 'Documentos',
                'link' => 'documentos.php',
                'pages' => ['documentos', 'documento-upload', 'documento-excluir']
            ],
            [
                'icon' => 'fa-cube',
                'label' => 'Modelo 3D',
                'link' => 'modelo-3d.php',
                'pages' => ['modelo-3d']
            ],
            [
                'icon' => 'fa-file-alt',
                'label' => 'Relatórios',
                'link' => 'relatorios.php',
                'pages' => ['relatorios', 'relatorio-criar']
            ],
        ]
    ],
    [
        'titulo' => 'Sistema',
        'itens' => [
            [
                'icon' => 'fa-crown',
                'label' => 'Minha Assinatura',
                'link' => 'assinatura.php',
                'pages' => ['assinatura'],
                'badge' => $sidebar_profissional['plano'],
                'badge_class' => 'badge-warning'
            ],
            [
                'icon' => 'fa-bell',
                'label' => 'Notificações',
                'link' => 'notificacoes.php',
                'pages' => ['notificacoes'],
                'badge' => $notificacoes_count ?? 0,
                'badge_class' => 'badge-danger'
            ],
            [
                'icon' => 'fa-user-cog',
                'label' => 'Configurações',
                'link' => 'configuracoes.php',
                'pages' => ['configuracoes']
            ],
        ]
    ]
];

// ============================================
// MENU DO PERFIL (rodapé da sidebar)
// ============================================
$perfil_menu = [
    ['icon' => 'fa-user-cog', 'label' => 'Meu Perfil', 'link' => 'perfil.php', 'class' => ''],
    ['icon' => 'fa-sliders-h', 'label' => 'Configurações', 'link' => 'configuracoes.php', 'class' => ''],
    ['icon' => 'fa-moon', 'label' => 'Tema Escuro', 'link' => '#', 'class' => 'theme-toggle'],
    ['icon' => 'fa-sign-out-alt', 'label' => 'Sair', 'link' => '../../public/logout.php', 'class' => 'logout-link'],
];

// ============================================
// FUNÇÃO AUXILIAR - AVATAR URL
// ============================================
if (!function_exists('individualGetAvatarUrl')) {
    function individualGetAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
    }
}
?>
<!-- ========================================== -->
<!-- SIDEBAR INDIVIDUAL                         -->
<!-- ========================================== -->
<aside class="sidebar" id="sidebar">
    <!-- ===== HEADER DA SIDEBAR ===== -->
    <div class="sidebar-header">
        <a href="index.php" class="sidebar-logo">
            <img src="../../assets/images/logo.png" alt="GeoNexus" onerror="this.style.display='none'">
            <div class="logo-text">
                <span class="logo-title">GeoNexus</span>
                <span class="logo-subtitle">Profissional</span>
            </div>
        </a>
        <button class="sidebar-close" onclick="fecharSidebarMobile()">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- ===== PERFIL DO UTILIZADOR ===== -->
    <div class="sidebar-perfil">
        <div class="sidebar-perfil-avatar">
            <img src="../../assets/images/<?php echo $sidebar_profissional['avatar']; ?>" 
                 alt="<?php echo $sidebar_profissional['nome']; ?>"
                 onerror="this.src='<?php echo individualGetAvatarUrl($sidebar_profissional['nome']); ?>'">
            <span class="status-online"></span>
        </div>
        <div class="sidebar-perfil-info">
            <span class="sidebar-perfil-nome"><?php echo $sidebar_profissional['nome']; ?></span>
            <span class="sidebar-perfil-profissao"><?php echo $sidebar_profissional['profissao']; ?></span>
            <span class="sidebar-perfil-plano">
                <i class="fas fa-crown"></i> Plano <?php echo $sidebar_profissional['plano']; ?>
            </span>
        </div>
    </div>

    <!-- ===== NAVEGAÇÃO ===== -->
    <nav class="sidebar-nav">
        <?php foreach ($sidebar_menu as $grupo): ?>
            <div class="sidebar-group">
                <span class="sidebar-group-title"><?php echo $grupo['titulo']; ?></span>
                <?php foreach ($grupo['itens'] as $item): ?>
                    <a href="<?php echo $item['link']; ?>" 
                       class="sidebar-item <?php echo individualIsActive($item['pages'], $pagina_atual); ?>">
                        <i class="fas <?php echo $item['icon']; ?>"></i>
                        <span><?php echo $item['label']; ?></span>
                        <?php if (isset($item['badge']) && $item['badge'] > 0): ?>
                            <span class="badge <?php echo $item['badge_class'] ?? 'badge-primary'; ?>">
                                <?php echo $item['badge']; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <!-- ========================================== -->
        <!-- SETORES - ACORDEÃO                         -->
        <!-- ========================================== -->
        <div class="sidebar-group sidebar-group-setores">
            <button class="sidebar-group-toggle" onclick="toggleSetores(event)" type="button">
                <span class="sidebar-group-title">Setores de Atuação</span>
                <i class="fas fa-chevron-down toggle-icon"></i>
            </button>
            <div class="sidebar-setores-list" id="sidebarSetoresList">
                <?php foreach ($sidebar_setores as $setor): ?>
                    <a href="<?php echo $setor['link']; ?>" 
                       class="sidebar-item sidebar-item-setor <?php echo ($pagina_atual === $setor['page']) ? 'active' : ''; ?>">
                        <span class="setor-icon" style="background: <?php echo $setor['color']; ?>20; color: <?php echo $setor['color']; ?>;">
                            <i class="fas <?php echo $setor['icon']; ?>"></i>
                        </span>
                        <span><?php echo $setor['label']; ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>

    <!-- ===== FOOTER DA SIDEBAR ===== -->
    <div class="sidebar-footer">
        <div class="sidebar-perfil-menu">
            <?php foreach ($perfil_menu as $item): ?>
                <a href="<?php echo $item['link']; ?>" class="sidebar-footer-item <?php echo $item['class']; ?>">
                    <i class="fas <?php echo $item['icon']; ?>"></i>
                    <span><?php echo $item['label']; ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</aside>

<style>
/* ========================================== */
/* SIDEBAR INDIVIDUAL - CSS                   */
/* ========================================== */

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 280px;
    height: 100vh;
    background: var(--bg-card);
    border-right: 1px solid var(--border-color);
    display: flex;
    flex-direction: column;
    z-index: 1001;
    transition: var(--transition-smooth);
    overflow-y: auto;
    overflow-x: hidden;
}

.sidebar::-webkit-scrollbar {
    width: 4px;
}

.sidebar::-webkit-scrollbar-thumb {
    background: #00D2FF;
    border-radius: 2px;
}

/* ===== HEADER ===== */
.sidebar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 16px;
    border-bottom: 1px solid var(--border-color);
    flex-shrink: 0;
}

.sidebar-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.sidebar-logo img {
    width: 36px;
    height: 36px;
    border-radius: 8px;
}

.logo-text {
    display: flex;
    flex-direction: column;
}

.logo-title {
    font-family: var(--font-display);
    font-size: 16px;
    font-weight: 700;
    color: var(--text-primary);
    line-height: 1;
}

.logo-subtitle {
    font-size: 10px;
    color: #00D2FF;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.sidebar-close {
    display: none;
    background: none;
    border: none;
    color: var(--text-muted);
    font-size: 20px;
    cursor: pointer;
    padding: 4px;
    border-radius: var(--radius-sm);
    transition: var(--transition-smooth);
}

.sidebar-close:hover {
    color: var(--text-primary);
    background: var(--bg-card-hover);
}

/* ===== PERFIL ===== */
.sidebar-perfil {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
    flex-shrink: 0;
}

.sidebar-perfil-avatar {
    position: relative;
    flex-shrink: 0;
}

.sidebar-perfil-avatar img {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #00D2FF;
}

.sidebar-perfil-avatar .status-online {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #00FFA3;
    border: 2px solid var(--bg-card);
    animation: pulse 2s ease-in-out infinite;
}

.sidebar-perfil-info {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.sidebar-perfil-nome {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-primary);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.sidebar-perfil-profissao {
    font-size: 11px;
    color: var(--text-muted);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.sidebar-perfil-plano {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 9px;
    font-weight: 600;
    color: #FFD93D;
    background: rgba(255, 217, 61, 0.12);
    padding: 2px 8px;
    border-radius: var(--radius-full);
    width: fit-content;
    margin-top: 2px;
}

/* ===== NAVEGAÇÃO ===== */
.sidebar-nav {
    flex: 1;
    padding: 12px 8px;
    overflow-y: auto;
}

.sidebar-group {
    margin-bottom: 16px;
}

.sidebar-group-title {
    display: block;
    padding: 0 12px 6px;
    font-size: 10px;
    font-weight: 600;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.sidebar-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 12px;
    border-radius: var(--radius-sm);
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    transition: var(--transition-smooth);
    margin-bottom: 2px;
    position: relative;
}

.sidebar-item i {
    width: 18px;
    font-size: 14px;
    text-align: center;
    color: var(--text-muted);
    transition: var(--transition-smooth);
}

.sidebar-item span:not(.badge):not(.setor-icon) {
    flex: 1;
}

.sidebar-item:hover {
    background: var(--bg-card-hover);
    color: var(--text-primary);
}

.sidebar-item:hover i {
    color: #00D2FF;
}

.sidebar-item.active {
    background: rgba(0, 210, 255, 0.1);
    color: #00D2FF;
    font-weight: 600;
}

.sidebar-item.active i {
    color: #00D2FF;
}

.sidebar-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 3px;
    height: 60%;
    background: #00D2FF;
    border-radius: 0 3px 3px 0;
}

.sidebar-item .badge {
    font-size: 9px;
    font-weight: 700;
    padding: 2px 6px;
    min-width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: var(--radius-full);
}

.badge-primary { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
.badge-info { background: rgba(108, 43, 217, 0.15); color: #6C2BD9; }
.badge-warning { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
.badge-danger { background: rgba(255, 107, 107, 0.15); color: #FF6B6B; }

/* ========================================== */
/* SETORES - ACORDEÃO                         */
/* ========================================== */

.sidebar-group-setores {
    margin-bottom: 8px;
}

.sidebar-group-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
    transition: var(--transition-smooth);
}

.sidebar-group-toggle .sidebar-group-title {
    padding: 0 12px 6px;
    margin: 0;
    text-align: left;
    transition: var(--transition-smooth);
}

.sidebar-group-toggle .toggle-icon {
    font-size: 10px;
    color: var(--text-muted);
    margin-right: 12px;
    transition: transform 0.3s ease;
    padding-bottom: 6px;
}

.sidebar-group-toggle:hover .sidebar-group-title {
    color: #00D2FF;
}

.sidebar-group-toggle:hover .toggle-icon {
    color: #00D2FF;
}

.sidebar-group-setores.open .sidebar-group-toggle .toggle-icon {
    transform: rotate(180deg);
}

.sidebar-setores-list {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.sidebar-group-setores.open .sidebar-setores-list {
    max-height: 800px;
}

.sidebar-item-setor {
    padding: 7px 12px;
}

.sidebar-item-setor .setor-icon {
    width: 22px;
    height: 22px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    flex-shrink: 0;
    transition: var(--transition-smooth);
}

.sidebar-item-setor:hover .setor-icon {
    transform: scale(1.1);
}

.sidebar-item-setor.active .setor-icon {
    transform: scale(1.1);
}

/* ===== FOOTER ===== */
.sidebar-footer {
    padding: 12px 8px;
    border-top: 1px solid var(--border-color);
    flex-shrink: 0;
}

.sidebar-perfil-menu {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.sidebar-footer-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 12px;
    border-radius: var(--radius-sm);
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
    transition: var(--transition-smooth);
}

.sidebar-footer-item i {
    width: 16px;
    font-size: 13px;
    text-align: center;
    color: var(--text-muted);
}

.sidebar-footer-item:hover {
    background: var(--bg-card-hover);
    color: var(--text-primary);
}

.sidebar-footer-item:hover i {
    color: #00D2FF;
}

.sidebar-footer-item.logout-link {
    color: #FF6B6B;
}

.sidebar-footer-item.logout-link i {
    color: #FF6B6B;
}

.sidebar-footer-item.logout-link:hover {
    background: rgba(255, 107, 107, 0.1);
}

/* ========================================== */
/* RESPONSIVIDADE - SIDEBAR                   */
/* ========================================== */

@media (max-width: 1024px) {
    .sidebar {
        transform: translateX(-100%);
    }
    
    .sidebar.open {
        transform: translateX(0);
        box-shadow: 4px 0 30px rgba(0, 0, 0, 0.3);
    }
    
    .sidebar-close {
        display: flex;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 85%;
        max-width: 300px;
        padding-bottom: 70px;
    }
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(0.9); }
}
</style>

<script>
// ============================================
// TOGGLE DOS SETORES (ACORDEÃO)
// ============================================
function toggleSetores(event) {
    if (event) {
        event.preventDefault();
        event.stopPropagation();
    }
    
    const grupoSetores = document.querySelector('.sidebar-group-setores');
    if (grupoSetores) {
        grupoSetores.classList.toggle('open');
        
        // Guardar estado no localStorage
        const isOpen = grupoSetores.classList.contains('open');
        localStorage.setItem('geonnexus-setores-open', isOpen ? 'true' : 'false');
    }
}

// ============================================
// RESTAURAR ESTADO DO ACORDEÃO AO CARREGAR
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    const grupoSetores = document.querySelector('.sidebar-group-setores');
    const setoresAbertos = localStorage.getItem('geonnexus-setores-open');
    
    // Se o utilizador está numa página de setor, abrir automaticamente
    const paginaAtual = '<?php echo $pagina_atual; ?>';
    const setoresPaginas = <?php echo json_encode(array_column($sidebar_setores, 'page')); ?>;
    
    if (setoresPaginas.includes(paginaAtual)) {
        if (grupoSetores) grupoSetores.classList.add('open');
    } else if (setoresAbertos === 'true') {
        if (grupoSetores) grupoSetores.classList.add('open');
    }
});
</script>

<?php include "individual-botoesNavegacaoMobile.php" ?>
