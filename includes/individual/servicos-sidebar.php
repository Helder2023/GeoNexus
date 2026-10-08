<?php
// includes/individual/servicos-sidebar.php
// Sidebar específica para o módulo de Serviços

// Garantir que a página atual esteja definida
if (!isset($pagina_atual)) {
    $pagina_atual = 'servicos';
}

// ============================================
// FUNÇÃO AUXILIAR PARA ITEM ATIVO
// ============================================
if (!function_exists('servicosIsActive')) {
    function servicosIsActive($pages, $current) {
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
// MENU DA SIDEBAR
// ============================================
$sidebar_menu = [
    [
        'titulo' => 'Gestão de Serviços',
        'itens' => [
            [
                'icon' => 'fa-th-large',
                'label' => 'Todos os Serviços',
                'link' => 'index.php',
                'pages' => ['servicos', 'index'],
                'badge' => $total_servicos ?? 0,
                'badge_class' => 'badge-primary'
            ],
            [
                'icon' => 'fa-plus-circle',
                'label' => 'Cadastrar Serviço',
                'link' => 'servico-cadastrar.php',
                'pages' => ['servico-cadastrar']
            ],
        ]
    ],
    [
        'titulo' => 'Apresentação',
        'itens' => [
            [
                'icon' => 'fa-images',
                'label' => 'Portfólio',
                'link' => 'portfolio.php',
                'pages' => ['portfolio'],
                'badge' => $total_portfolio ?? 0,
                'badge_class' => 'badge-info'
            ],
            [
                'icon' => 'fa-tags',
                'label' => 'Tabela de Preços',
                'link' => 'precos.php',
                'pages' => ['precos'],
                'badge' => $total_precos ?? 0,
                'badge_class' => 'badge-warning'
            ],
        ]
    ],
    [
        'titulo' => 'Configurações',
        'itens' => [
            [
                'icon' => 'fa-sliders-h',
                'label' => 'Configurar Portfólio',
                'link' => 'portfolio-config.php',
                'pages' => ['portfolio-config']
            ],
           
        ]
    ],
    [
        'titulo' => 'Gestão',
        'itens' => [
            [
                'icon' => 'fa-chart-line',
                'label' => 'Estatísticas',
                'link' => 'estatisticas.php',
                'pages' => ['estatisticas']
            ],
            [
                'icon' => 'fa-star',
                'label' => 'Avaliações',
                'link' => 'avaliacoes.php',
                'pages' => ['avaliacoes'],
                'badge' => '12',
                'badge_class' => 'badge-warning'
            ],
            [
                'icon' => 'fa-handshake',
                'label' => 'Contratações',
                'link' => 'contratacoes.php',
                'pages' => ['contratacoes']
            ],
        ]
    ]
];

// ============================================
// MENU DO PERFIL (rodapé da sidebar)
// ============================================
$perfil_menu = [
    ['icon' => 'fa-user-cog', 'label' => 'Meu Perfil', 'link' => '../perfil.php', 'class' => ''],
    ['icon' => 'fa-sliders-h', 'label' => 'Configurações', 'link' => '../configuracoes.php', 'class' => ''],
    ['icon' => 'fa-moon', 'label' => 'Tema Escuro', 'link' => '#', 'class' => 'theme-toggle'],
    ['icon' => 'fa-sign-out-alt', 'label' => 'Sair', 'link' => '../../../public/logout.php', 'class' => 'logout-link'],
];

// ============================================
// FUNÇÃO AUXILIAR - AVATAR URL
// ============================================
if (!function_exists('servicosGetAvatarUrl')) {
    function servicosGetAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00FFA3&color=fff&size=80';
    }
}
?>
<!-- ========================================== -->
<!-- SIDEBAR - SERVIÇOS                         -->
<!-- ========================================== -->
<aside class="sidebar sidebar-servicos" id="sidebar">
    <!-- ===== HEADER DA SIDEBAR ===== -->
    <div class="sidebar-header">
        <a href="index.php" class="sidebar-logo">
            <img src="../../../assets/images/logo.png" alt="GeoNexus" onerror="this.style.display='none'">
            <div class="logo-text">
                <span class="logo-title">GeoNexus</span>
                <span class="logo-subtitle">Serviços</span>
            </div>
        </a>
        <button class="sidebar-close" onclick="fecharSidebarMobile()">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- ===== PERFIL DO UTILIZADOR ===== -->
    <div class="sidebar-perfil">
        <div class="sidebar-perfil-avatar">
            <img src="../../../assets/images/<?php echo $sidebar_profissional['avatar']; ?>" 
                 alt="<?php echo $sidebar_profissional['nome']; ?>"
                 onerror="this.src='<?php echo servicosGetAvatarUrl($sidebar_profissional['nome']); ?>'">
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

    <!-- ========================================== -->
    <!-- BOTÃO VOLTAR AO PAINEL PRINCIPAL           -->
    <!-- ========================================== -->
    <a href="../index.php" class="sidebar-btn-voltar">
        <div class="sidebar-btn-voltar-content">
            <div class="sidebar-btn-voltar-icon">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="sidebar-btn-voltar-text">
                <span class="sidebar-btn-voltar-label">Voltar ao Painel</span>
                <span class="sidebar-btn-voltar-sub">Dashboard Principal</span>
            </div>
            <i class="fas fa-chevron-right sidebar-btn-voltar-arrow"></i>
        </div>
    </a>

    <!-- ===== NAVEGAÇÃO ===== -->
    <nav class="sidebar-nav">
        <?php foreach ($sidebar_menu as $grupo): ?>
            <div class="sidebar-group">
                <span class="sidebar-group-title"><?php echo $grupo['titulo']; ?></span>
                <?php foreach ($grupo['itens'] as $item): ?>
                    <a href="<?php echo $item['link']; ?>" 
                       class="sidebar-item <?php echo servicosIsActive($item['pages'], $pagina_atual); ?>">
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
/* SIDEBAR - SERVIÇOS                         */
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

.sidebar-servicos::-webkit-scrollbar {
    width: 4px;
}

.sidebar-servicos::-webkit-scrollbar-thumb {
    background: #00FFA3;
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
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.sidebar-servicos .logo-subtitle {
    color: #00FFA3;
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

.sidebar-servicos .sidebar-perfil-avatar img {
    border-color: #00FFA3;
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

/* ========================================== */
/* BOTÃO VOLTAR AO PAINEL PRINCIPAL           */
/* ========================================== */
.sidebar-btn-voltar {
    display: block;
    margin: 12px 12px 8px;
    padding: 12px 14px;
    background: linear-gradient(135deg, rgba(0, 255, 163, 0.12) 0%, rgba(0, 210, 255, 0.08) 100%);
    border: 1px solid rgba(0, 255, 163, 0.25);
    border-radius: var(--radius-md);
    text-decoration: none;
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
    flex-shrink: 0;
}

.sidebar-btn-voltar::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0, 255, 163, 0.15), transparent);
    transition: left 0.6s ease;
}

.sidebar-btn-voltar:hover::before {
    left: 100%;
}

.sidebar-btn-voltar:hover {
    background: linear-gradient(135deg, rgba(0, 255, 163, 0.2) 0%, rgba(0, 210, 255, 0.15) 100%);
    border-color: #00FFA3;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 255, 163, 0.2);
}

.sidebar-btn-voltar-content {
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
    z-index: 1;
}

.sidebar-btn-voltar-icon {
    width: 34px;
    height: 34px;
    border-radius: var(--radius-sm);
    background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
    color: #0A1628;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
    box-shadow: 0 4px 10px rgba(0, 255, 163, 0.3);
    transition: var(--transition-smooth);
}

.sidebar-btn-voltar:hover .sidebar-btn-voltar-icon {
    transform: scale(1.1);
}

.sidebar-btn-voltar-text {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.sidebar-btn-voltar-label {
    font-size: 13px;
    font-weight: 700;
    color: var(--text-primary);
    white-space: nowrap;
}

.sidebar-btn-voltar-sub {
    font-size: 10px;
    color: var(--text-muted);
    white-space: nowrap;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.sidebar-btn-voltar-arrow {
    color: #00FFA3;
    font-size: 11px;
    flex-shrink: 0;
    transition: var(--transition-smooth);
}

.sidebar-btn-voltar:hover .sidebar-btn-voltar-arrow {
    transform: translateX(4px);
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

.sidebar-servicos .sidebar-item:hover i {
    color: #00FFA3;
}

.sidebar-item.active {
    font-weight: 600;
}

.sidebar-servicos .sidebar-item.active {
    background: rgba(0, 255, 163, 0.1);
    color: #00FFA3;
}

.sidebar-servicos .sidebar-item.active i {
    color: #00FFA3;
}

.sidebar-servicos .sidebar-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 3px;
    height: 60%;
    background: #00FFA3;
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
.badge-success { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }

/* ========================================== */
/* CATEGORIAS - ACORDEÃO                      */
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

.sidebar-servicos .sidebar-group-toggle:hover .sidebar-group-title {
    color: #00FFA3;
}

.sidebar-servicos .sidebar-group-toggle:hover .toggle-icon {
    color: #00FFA3;
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

.sidebar-servicos .sidebar-footer-item:hover i {
    color: #00FFA3;
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

@media (max-width: 480px) {
    .sidebar-btn-voltar {
        margin: 10px 10px 6px;
        padding: 10px 12px;
    }

    .sidebar-btn-voltar-icon {
        width: 30px;
        height: 30px;
        font-size: 12px;
    }

    .sidebar-btn-voltar-label {
        font-size: 12px;
    }

    .sidebar-btn-voltar-sub {
        font-size: 9px;
    }
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(0.9); }
}
</style>

<script>
// ============================================
// TOGGLE DAS CATEGORIAS (ACORDEÃO)
// ============================================
function toggleSetores(event) {
    if (event) {
        event.preventDefault();
        event.stopPropagation();
    }
    
    const grupoSetores = document.querySelector('.sidebar-group-setores');
    if (grupoSetores) {
        grupoSetores.classList.toggle('open');
        
        const isOpen = grupoSetores.classList.contains('open');
        localStorage.setItem('geonnexus-categorias-servicos-open', isOpen ? 'true' : 'false');
    }
}

// ============================================
// RESTAURAR ESTADO DO ACORDEÃO AO CARREGAR
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    const grupoSetores = document.querySelector('.sidebar-group-setores');
    const categoriasAbertas = localStorage.getItem('geonnexus-categorias-servicos-open');
    
    const paginaAtual = '<?php echo $pagina_atual; ?>';
    
    if (categoriasPaginas.includes(paginaAtual)) {
        if (grupoSetores) grupoSetores.classList.add('open');
    } else if (categoriasAbertas === 'true') {
        if (grupoSetores) grupoSetores.classList.add('open');
    }
});
</script>

<?php include "servicos-botoesNavegacaoMobile.php" ?>