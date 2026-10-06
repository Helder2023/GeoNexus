<?php
// painel/admin/mapa-global.php - Mapa Global com Globo 3D e Satélite
// Visualização interativa de projetos

$titulo_pagina = 'Mapa Global';
$pagina_atual = 'mapa-global';

// Dados mockados
$total_usuarios = 12;
$total_projetos = 189;

// Dados dos projetos com coordenadas
$projetos_mapa = [
    [
        'id' => 1,
        'nome' => 'Levantamento Topográfico - Luanda Sul',
        'lat' => -8.839,
        'lng' => 13.289,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Carlos Mendes',
        'setor' => 'Topografia',
        'progresso' => 65,
        'descricao' => 'Levantamento topográfico detalhado para urbanização de 120 hectares'
    ],
    [
        'id' => 2,
        'nome' => 'Georreferenciamento - Kilamba',
        'lat' => -8.959,
        'lng' => 13.269,
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Ana Costa',
        'setor' => 'GIS',
        'progresso' => 100,
        'descricao' => 'Georreferenciamento de lotes e infraestrutura do Kilamba'
    ],
    [
        'id' => 3,
        'nome' => 'Modelagem 3D - Talatona',
        'lat' => -8.909,
        'lng' => 13.209,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Pedro Santos',
        'setor' => 'Engenharia Civil',
        'progresso' => 45,
        'descricao' => 'Modelagem 3D do centro empresarial da Talatona'
    ],
    [
        'id' => 4,
        'nome' => 'Levantamento GNSS - Viana',
        'lat' => -8.909,
        'lng' => 13.369,
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Marisa Lima',
        'setor' => 'Topografia',
        'progresso' => 100,
        'descricao' => 'Levantamento geodésico com GNSS para rede de referência'
    ],
    [
        'id' => 5,
        'nome' => 'Estudo de Impacto Ambiental - Bengo',
        'lat' => -9.019,
        'lng' => 13.419,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Rui Oliveira',
        'setor' => 'Mineração',
        'progresso' => 60,
        'descricao' => 'Estudo de impacto ambiental para zona industrial do Bengo'
    ],
    [
        'id' => 6,
        'nome' => 'Simulação de Reservatório - Kwanza Sul',
        'lat' => -11.209,
        'lng' => 13.909,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Sofia Rodrigues',
        'setor' => 'Petróleo & Gás',
        'progresso' => 35,
        'descricao' => 'Simulação de reservatório petrolífero na bacia do Kwanza Sul'
    ],
    [
        'id' => 7,
        'nome' => 'Estudo de Tráfego - Via Expressa',
        'lat' => -8.839,
        'lng' => 13.239,
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Construtora ABC',
        'setor' => 'Transportes',
        'progresso' => 100,
        'descricao' => 'Estudo de tráfego e mobilidade para via expressa de Luanda'
    ],
    [
        'id' => 8,
        'nome' => 'Inspeção com Drones - Barragem do Capanda',
        'lat' => -9.749,
        'lng' => 14.869,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Topografia Lima',
        'setor' => 'Drones',
        'progresso' => 50,
        'descricao' => 'Inspeção visual e termográfica da barragem do Capanda'
    ],
    [
        'id' => 9,
        'nome' => 'Levantamento Batimétrico - Rio Kwanza',
        'lat' => -9.619,
        'lng' => 13.529,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Engenharia Santos',
        'setor' => 'Engenharia Civil',
        'progresso' => 45,
        'descricao' => 'Levantamento batimétrico do Rio Kwanza'
    ],
    [
        'id' => 10,
        'nome' => 'Sistema GIS - Huíla',
        'lat' => -14.909,
        'lng' => 13.489,
        'status' => 'concluido',
        'status_label' => 'Concluído',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'GIS Solutions',
        'setor' => 'GIS',
        'progresso' => 100,
        'descricao' => 'Implantação de sistema GIS para gestão de recursos da Huíla'
    ],
    [
        'id' => 11,
        'nome' => 'Estudo de Viabilidade - Mina do Catoca',
        'lat' => -8.469,
        'lng' => 18.309,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Mineração Progresso',
        'setor' => 'Mineração',
        'progresso' => 40,
        'descricao' => 'Estudo de viabilidade para expansão da mina do Catoca'
    ],
    [
        'id' => 12,
        'nome' => 'Planeamento Urbano - Zango',
        'lat' => -8.879,
        'lng' => 13.319,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Urbanismo Sustentável',
        'setor' => 'Urbanismo',
        'progresso' => 48,
        'descricao' => 'Planeamento urbano para nova centralidade no Zango'
    ],
    [
        'id' => 13,
        'nome' => 'Projeto de Irrigação - Kikuxi',
        'lat' => -8.769,
        'lng' => 13.289,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'tipo' => 'empresarial',
        'tipo_label' => 'Empresa',
        'responsavel' => 'Ferreira & Filhos',
        'setor' => 'Agricultura de Precisão',
        'progresso' => 0,
        'descricao' => 'Sistema de irrigação para agricultura familiar em Kikuxi'
    ],
    [
        'id' => 14,
        'nome' => 'Plano Diretor - Luanda 2030',
        'lat' => -8.838,
        'lng' => 13.234,
        'status' => 'em_andamento',
        'status_label' => 'Em Andamento',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'Inês Almeida',
        'setor' => 'Urbanismo',
        'progresso' => 55,
        'descricao' => 'Plano diretor de ordenamento do território de Luanda'
    ],
    [
        'id' => 15,
        'nome' => 'Formação em GIS - Bié',
        'lat' => -12.379,
        'lng' => 16.939,
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'tipo' => 'individual',
        'tipo_label' => 'Profissional',
        'responsavel' => 'João Pereira',
        'setor' => 'Educação',
        'progresso' => 0,
        'descricao' => 'Curso de formação em GIS para professores do Bié'
    ]
];

$total_projetos = count($projetos_mapa);



$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => false],
    ['icon' => 'fa-project-diagram', 'label' => 'Projetos', 'link' => 'projetos-global.php', 'active' => false],
    ['icon' => 'fa-blog', 'label' => 'Blog', 'link' => 'blog.php', 'active' => false],
    ['icon' => 'fa-envelope', 'label' => 'Mensagens', 'link' => 'mensagens.php', 'active' => false],
    ['icon' => 'fa-ticket-alt', 'label' => 'Tickets', 'link' => 'suporte-tickets.php', 'active' => false],
    ['icon' => 'fa-globe', 'label' => 'Mapa Global', 'link' => 'mapa-global.php', 'active' => true],
    ['icon' => 'fa-user-check', 'label' => 'Validar', 'link' => 'admin-validar.php', 'active' => false],
    ['icon' => 'fa-chart-pie', 'label' => 'Financeiro', 'link' => 'financeiro/index.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];



function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') return $default;
    if (is_array($value)) return $default;
    return htmlspecialchars((string)$value);
}

function getStatusColor($status) {
    $cores = ['em_andamento' => '#00D2FF', 'concluido' => '#00FFA3', 'pendente' => '#FFD93D'];
    return $cores[$status] ?? '#6B7A8F';
}

function getStatusIcon($status) {
    $icones = ['em_andamento' => 'fa-spinner fa-spin', 'concluido' => 'fa-check-circle', 'pendente' => 'fa-clock'];
    return $icones[$status] ?? 'fa-circle';
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../includes/admin/admin-head.php" ?>

<body>
<div class="app-container">
    <div id="toast-container" class="toast-container"></div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <?php include "../../includes/admin/admin-sidebar.php" ?>

    <nav class="bottom-nav" id="bottomNav">
        <div class="nav-items">
            <?php foreach ($bottom_nav_items as $item): ?>
                <a href="<?php echo $item['link']; ?>"
                    class="nav-item <?php echo $item['active'] ? 'active' : ''; ?> <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'menu-toggle' : ''; ?>"
                    <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'id="bottomMenuToggle"' : ''; ?>
                    <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'onclick="toggleSidebarMobile(event)"' : ''; ?>>
                    <i class="fas <?php echo $item['icon']; ?>"></i>
                    <span><?php echo $item['label']; ?></span>
                    <?php if ($item['label'] === 'Mapa Global'): ?>
                        <span class="badge"><?php echo $total_projetos; ?></span>
                    <?php endif; ?>
                    <?php if ($item['label'] === 'Menu'): ?>
                        <span class="badge" id="bottomNotifBadge"><?php echo $notificacoes_count; ?></span>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>

    <main class="main-content">
        <header class="page-header">
            <div class="header-left">
                <h1>
                    <i class="fas fa-globe-africa icon"></i>
                    Mapa Global
                    <span class="badge badge-primary" style="font-size: 0.7rem; margin-left: 8px;"><?php echo $total_projetos; ?> projetos</span>
                </h1>
                <p class="breadcrumb"><a href="index.php">Dashboard</a> <span class="separator">/</span> <span>Mapa Global</span></p>
            </div>
            <div class="header-right">
                <button class="btn-theme" id="btnTheme"><i class="fas fa-sun theme-icon sun"></i><i class="fas fa-moon theme-icon moon"></i></button>
                                <?php include "../../includes/admin/notificacoes-admin.php" ?>

                <div class="header-actions">
                    <button class="btn btn-outline" onclick="mudarVisao('globe')"><i class="fas fa-globe"></i> Globo 3D</button>
                    <button class="btn btn-outline" onclick="mudarVisao('satellite')"><i class="fas fa-satellite"></i> Satélite</button>
                    <button class="btn btn-outline" onclick="mudarVisao('street')"><i class="fas fa-map"></i> Rua</button>
                </div>
            </div>
        </header>

        <!-- ===== STATS CARDS ===== -->
        <section class="stats-grid animate-fade-up">
            <div class="stat-card"><div class="icon aurora"><i class="fas fa-project-diagram"></i></div><div class="value"><?php echo $total_projetos; ?></div><div class="label">Total de Projetos</div></div>
            <div class="stat-card"><div class="icon blue"><i class="fas fa-spinner"></i></div><div class="value"><?php echo count(array_filter($projetos_mapa, function($p) { return $p['status'] === 'em_andamento'; })); ?></div><div class="label">Em Andamento</div></div>
            <div class="stat-card"><div class="icon green"><i class="fas fa-check-circle"></i></div><div class="value"><?php echo count(array_filter($projetos_mapa, function($p) { return $p['status'] === 'concluido'; })); ?></div><div class="label">Concluídos</div></div>
            <div class="stat-card"><div class="icon yellow"><i class="fas fa-clock"></i></div><div class="value"><?php echo count(array_filter($projetos_mapa, function($p) { return $p['status'] === 'pendente'; })); ?></div><div class="label">Pendentes</div></div>
        </section>

        <!-- ===== MAPA ===== -->
        <div class="mapa-container animate-fade-up">
            <div class="mapa-toolbar">
                <div class="toolbar-left">
                    <span><i class="fas fa-info-circle"></i> Clique nos marcadores para ver detalhes</span>
                </div>
                <div class="toolbar-right">
                    <span class="zoom-info" id="zoomInfo">Zoom: 6</span>
                    <span class="coords-info" id="coordsInfo">-11.2, 17.5</span>
                </div>
            </div>
            <div id="mapaContainer" style="width: 100%; height: 550px; border-radius: var(--radius-md); background: var(--bg-primary);"></div>
            <div class="mapa-legend">
                <span class="legend-item"><span class="legend-color" style="background: #00D2FF;"></span> Em Andamento</span>
                <span class="legend-item"><span class="legend-color" style="background: #00FFA3;"></span> Concluído</span>
                <span class="legend-item"><span class="legend-color" style="background: #FFD93D;"></span> Pendente</span>
                <span class="legend-item"><span class="legend-color" style="background: #6C2BD9;"></span> Profissional</span>
                <span class="legend-item"><span class="legend-color" style="background: #FF6B6B;"></span> Empresa</span>
            </div>
        </div>
    </main>
</div>

<!-- MODAL DETALHE PROJETO -->
<div class="modal" id="modalProjeto">
    <div class="modal-overlay" onclick="fecharModal('modalProjeto')"></div>
    <div class="modal-content" style="max-width: 450px;">
        <div class="modal-header"><h3 class="modal-title"><i class="fas fa-project-diagram"></i> Detalhes do Projeto</h3><button class="modal-close" onclick="fecharModal('modalProjeto')">&times;</button></div>
        <div class="modal-body" id="projetoDetalhe"></div>
    </div>
</div>

<!-- ========================================== -->
<!-- THREE.JS PARA GLOBO 3D                     -->
<!-- ========================================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<!-- ========================================== -->
<!-- LEAFLET PARA MAPA 2D COM SATÉLITE          -->
<!-- ========================================== -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script src="../assets/js/main.js"></script>
<script>
// ==========================================
// DADOS DOS PROJETOS
// ==========================================
const projetosData = <?php echo json_encode($projetos_mapa); ?>;


// ==========================================
// VARIÁVEIS DO MAPA
// ==========================================
let visaoAtual = 'globe';
let mapaLeaflet = null;
let scene, camera, renderer, controls, globe;

// ==========================================
// CORES E ÍCONES
// ==========================================
const statusCores = {
    'em_andamento': '#00D2FF',
    'concluido': '#00FFA3',
    'pendente': '#FFD93D'
};

const tipoCores = {
    'individual': '#6C2BD9',
    'empresarial': '#FF6B6B'
};

const statusIcones = {
    'em_andamento': 'fa-spinner fa-spin',
    'concluido': 'fa-check-circle',
    'pendente': 'fa-clock'
};

document.addEventListener('DOMContentLoaded', function() {
    // Sidebar toggle
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

    // Notificações
    const btnNotif = document.getElementById('btnNotificacoes');
    const dropdown = document.getElementById('notificacoesDropdown');
    if (btnNotif && dropdown) {
        btnNotif.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('active');
            if (dropdown.classList.contains('active')) carregarNotificacoes();
        });
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) dropdown.classList.remove('active');
        });
    }

    // Perfil
    const btnPerfil = document.getElementById('btnPerfil');
    const perfilDrop = document.getElementById('perfilDropdown');
    if (btnPerfil && perfilDrop) {
        btnPerfil.addEventListener('click', function(e) {
            e.stopPropagation();
            perfilDrop.classList.toggle('active');
        });
        document.addEventListener('click', function(e) {
            if (!perfilDrop.contains(e.target) && !btnPerfil.contains(e.target)) perfilDrop.classList.remove('active');
        });
    }

    // Theme
    const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
    document.getElementById('btnTheme')?.addEventListener('click', function() {
        const current = document.documentElement.getAttribute('data-theme');
        const newTheme = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('geonnexus-theme', newTheme);
        mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
    });

    // Inicializar com Globo 3D
    iniciarGlobo3D();

    // Fechar modal com ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal.active').forEach(modal => fecharModal(modal.id));
        }
    });
});

function toggleSidebarMobile(event) {
    if (event) { event.preventDefault(); event.stopPropagation(); }
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    if (sidebar) {
        sidebar.classList.toggle('open');
        if (overlay) overlay.classList.toggle('active');
        const menuBtn = document.getElementById('bottomMenuToggle');
        if (menuBtn) {
            menuBtn.querySelector('i').className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
        }
    }
}
document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const menuBtn = document.getElementById('bottomMenuToggle');
    if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
        if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
            sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('active');
            if (menuBtn) menuBtn.querySelector('i').className = 'fas fa-bars';
        }
    }
});

// ==========================================
// NOTIFICAÇÕES
// ==========================================
function carregarNotificacoes() {
    const list = document.getElementById('notifList');
    if (!list) return;
    let html = '';
    mockNotificacoes.forEach(n => {
        html += `<div class="notificacao-item ${n.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${n.id})">
            <div class="notif-icon ${n.icon_class}"><i class="fas ${n.icon}"></i></div>
            <div class="notif-conteudo"><p>${n.mensagem}</p><span class="notif-tempo">${n.tempo}</span></div>
            ${!n.lida ? '<span class="notif-dot"></span>' : ''}
        </div>`;
    });
    list.innerHTML = html || `<div class="notificacao-vazia"><i class="fas fa-bell-slash"></i><p>Nenhuma notificação</p></div>`;
}

function marcarNotificacaoLida(id) {
    const notif = mockNotificacoes.find(n => n.id === id);
    if (notif) { notif.lida = true; atualizarBadgeNotif(); carregarNotificacoes(); mostrarToast('Notificação marcada como lida', 'info'); }
}

function marcarTodasLidas() {
    mockNotificacoes.forEach(n => n.lida = true);
    atualizarBadgeNotif(); carregarNotificacoes(); mostrarToast('Todas marcadas como lidas', 'success'); closeNotifications();
}

function atualizarBadgeNotif() {
    const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
    const badge = document.getElementById('notifBadge');
    const bottom = document.getElementById('bottomNotifBadge');
    if (badge) { badge.textContent = naoLidas; badge.style.display = naoLidas > 0 ? 'flex' : 'none'; }
    if (bottom) { bottom.textContent = naoLidas; bottom.style.display = naoLidas > 0 ? 'flex' : 'none'; }
}

function closeNotifications() { document.getElementById('notificacoesDropdown')?.classList.remove('active'); }

// ==========================================
// TOAST
// ==========================================
function mostrarToast(mensagem, tipo = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;
    const icons = { success: 'fa-check-circle', error: 'fa-exclamation-circle', warning: 'fa-exclamation-triangle', info: 'fa-info-circle' };
    const colors = { success: '#00FFA3', error: '#FF6B6B', warning: '#F59E0B', info: '#00D2FF' };
    const toast = document.createElement('div');
    toast.className = 'toast toast-' + tipo;
    toast.innerHTML = `<div class="toast-content"><i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i><span>${mensagem}</span></div><button class="toast-close" onclick="this.parentElement.remove()">&times;</button>`;
    container.appendChild(toast);
    requestAnimationFrame(() => { toast.style.transform = 'translateX(0)'; toast.style.opacity = '1'; });
    setTimeout(() => {
        if (toast.parentElement) {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }, 4000);
}

// ==========================================
// GLOBO 3D
// ==========================================
function iniciarGlobo3D() {
    const container = document.getElementById('mapaContainer');
    container.innerHTML = '';

    const width = container.clientWidth || window.innerWidth - 320;
    const height = container.clientHeight || 550;

    // Cena
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0x0A1628);

    // Câmera
    camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
    camera.position.set(0, 2, 8);

    // Renderer
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.shadowMap.enabled = true;
    container.appendChild(renderer.domElement);

    // Controles
    controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.05;
    controls.autoRotate = true;
    controls.autoRotateSpeed = 0.8;
    controls.minDistance = 3;
    controls.maxDistance = 15;
    controls.enablePan = false;

    // Criar esfera
    criarEsfera();

    // Criar partículas
    criarParticulas();

    // Criar marcadores
    criarMarcadoresGlobo();

    // Eventos de clique
    renderer.domElement.addEventListener('click', function(event) {
        const rect = renderer.domElement.getBoundingClientRect();
        const mouse = new THREE.Vector2(
            ((event.clientX - rect.left) / rect.width) * 2 - 1,
            -((event.clientY - rect.top) / rect.height) * 2 + 1
        );
        const raycaster = new THREE.Raycaster();
        raycaster.setFromCamera(mouse, camera);
        
        const intersects = raycaster.intersectObjects(scene.children, true);
        for (let hit of intersects) {
            let obj = hit.object;
            while (obj.parent && !obj.userData.projetoId) {
                obj = obj.parent;
            }
            if (obj.userData && obj.userData.projetoId) {
                const projeto = projetosData.find(p => p.id === obj.userData.projetoId);
                if (projeto) {
                    abrirDetalheProjeto(projeto);
                }
                return;
            }
        }
    });

    // Redimensionar
    window.addEventListener('resize', function() {
        const w = container.clientWidth || window.innerWidth - 320;
        const h = container.clientHeight || 550;
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
        renderer.setSize(w, h);
    });

    // Animar
    animarGlobo();
}

function criarEsfera() {
    const geometry = new THREE.SphereGeometry(2.5, 64, 64);
    
    const textureLoader = new THREE.TextureLoader();
    const texture = textureLoader.load('https://threejs.org/examples/textures/planets/earth_atmos_2048.jpg');
    
    const material = new THREE.MeshPhongMaterial({
        map: texture,
        specular: new THREE.Color(0x333333),
        shininess: 25,
        emissive: new THREE.Color(0x1a2a4a),
        emissiveIntensity: 0.1
    });

    globe = new THREE.Mesh(geometry, material);
    globe.rotation.x = 0.3;
    scene.add(globe);

    // Glow
    const glowGeometry = new THREE.SphereGeometry(2.6, 64, 64);
    const glowMaterial = new THREE.MeshBasicMaterial({
        color: 0x00D2FF,
        transparent: true,
        opacity: 0.08,
        side: THREE.BackSide
    });
    const glow = new THREE.Mesh(glowGeometry, glowMaterial);
    scene.add(glow);

    // Anéis
    criarAnelOrbital(2.8, 0x00D2FF, 0.15);
    criarAnelOrbital(3.0, 0x6C2BD9, 0.1);
    criarAnelOrbital(3.2, 0x00FFA3, 0.08);

    // Luzes
    const ambientLight = new THREE.AmbientLight(0x404060, 0.5);
    scene.add(ambientLight);

    const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
    directionalLight.position.set(5, 5, 5);
    scene.add(directionalLight);

    const directionalLight2 = new THREE.DirectionalLight(0x00D2FF, 0.3);
    directionalLight2.position.set(-5, -5, -5);
    scene.add(directionalLight2);
}

function criarAnelOrbital(radius, color, opacity) {
    const segments = 128;
    const geometry = new THREE.BufferGeometry();
    const positions = [];
    for (let i = 0; i <= segments; i++) {
        const theta = (i / segments) * Math.PI * 2;
        positions.push(Math.cos(theta) * radius, Math.sin(theta) * radius * 0.3, Math.sin(theta) * radius * 0.3);
    }
    geometry.setAttribute('position', new THREE.Float32BufferAttribute(positions, 3));
    const material = new THREE.LineBasicMaterial({
        color: color,
        transparent: true,
        opacity: opacity
    });
    const ring = new THREE.Line(geometry, material);
    ring.rotation.x = 0.5;
    scene.add(ring);
}

function criarParticulas() {
    const count = 2000;
    const positions = new Float32Array(count * 3);
    const colors = new Float32Array(count * 3);

    for (let i = 0; i < count; i++) {
        const radius = 3.5 + Math.random() * 4;
        const theta = Math.random() * Math.PI * 2;
        const phi = Math.acos(2 * Math.random() - 1);

        positions[i * 3] = radius * Math.sin(phi) * Math.cos(theta);
        positions[i * 3 + 1] = radius * Math.cos(phi);
        positions[i * 3 + 2] = radius * Math.sin(phi) * Math.sin(theta);

        const color = new THREE.Color().setHSL(0.6 + Math.random() * 0.3, 0.8, 0.6);
        colors[i * 3] = color.r;
        colors[i * 3 + 1] = color.g;
        colors[i * 3 + 2] = color.b;
    }

    const geometry = new THREE.BufferGeometry();
    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

    const material = new THREE.PointsMaterial({
        size: 0.02,
        vertexColors: true,
        transparent: true,
        opacity: 0.8,
        blending: THREE.AdditiveBlending,
        sizeAttenuation: true
    });

    const particles = new THREE.Points(geometry, material);
    scene.add(particles);
}

function criarMarcadoresGlobo() {
    projetosData.forEach((projeto, index) => {
        const radius = 2.5;
        const phi = (90 - projeto.lat) * Math.PI / 180;
        const theta = (projeto.lng + 180) * Math.PI / 180;
        const x = -radius * Math.sin(phi) * Math.cos(theta);
        const y = radius * Math.cos(phi);
        const z = radius * Math.sin(phi) * Math.sin(theta);

        const baseColor = new THREE.Color(statusCores[projeto.status] || '#6B7A8F');
        const tipoColor = new THREE.Color(tipoCores[projeto.tipo] || '#6B7A8F');

        const markerGroup = new THREE.Group();
        markerGroup.position.set(x, y, z);
        markerGroup.userData.projetoId = projeto.id;

        // Esfera principal
        const sphereGeo = new THREE.SphereGeometry(0.08, 16, 16);
        const sphereMat = new THREE.MeshBasicMaterial({ color: baseColor });
        const sphere = new THREE.Mesh(sphereGeo, sphereMat);
        markerGroup.add(sphere);

        // Anel de pulsação
        const ringGeo = new THREE.RingGeometry(0.1, 0.15, 32);
        const ringMat = new THREE.MeshBasicMaterial({
            color: baseColor,
            transparent: true,
            opacity: 0.6,
            side: THREE.DoubleSide
        });
        const ring = new THREE.Mesh(ringGeo, ringMat);
        ring.lookAt(new THREE.Vector3(0, 0, 0));
        markerGroup.add(ring);

        // Anel exterior (tipo)
        const ring2Geo = new THREE.RingGeometry(0.15, 0.2, 32);
        const ring2Mat = new THREE.MeshBasicMaterial({
            color: tipoColor,
            transparent: true,
            opacity: 0.3,
            side: THREE.DoubleSide
        });
        const ring2 = new THREE.Mesh(ring2Geo, ring2Mat);
        ring2.lookAt(new THREE.Vector3(0, 0, 0));
        markerGroup.add(ring2);

        // Brilho
        const glowGeo = new THREE.SphereGeometry(0.15, 16, 16);
        const glowMat = new THREE.MeshBasicMaterial({
            color: baseColor,
            transparent: true,
            opacity: 0.15
        });
        const glow = new THREE.Mesh(glowGeo, glowMat);
        markerGroup.add(glow);

        markerGroup.userData.ring = ring;
        markerGroup.userData.ring2 = ring2;
        markerGroup.userData.glow = glow;
        markerGroup.userData.baseColor = baseColor;

        scene.add(markerGroup);
    });
}

function animarGlobo() {
    requestAnimationFrame(animarGlobo);

    controls.update();

    const time = Date.now() * 0.001;
    scene.children.forEach(child => {
        if (child.userData && child.userData.ring) {
            const pulse = Math.sin(time * 1.5 + child.id) * 0.5 + 0.5;
            const scale = 1 + pulse * 0.5;
            child.userData.ring.scale.set(scale, scale, scale);
            child.userData.ring.material.opacity = 0.3 + pulse * 0.4;
            
            const scale2 = 1 + pulse * 0.3;
            child.userData.ring2.scale.set(scale2, scale2, scale2);
            child.userData.ring2.material.opacity = 0.15 + pulse * 0.25;
            
            const glowScale = 1 + pulse * 0.8;
            child.userData.glow.scale.set(glowScale, glowScale, glowScale);
            child.userData.glow.material.opacity = 0.1 + pulse * 0.2;
        }
    });

    renderer.render(scene, camera);
}

// ==========================================
// MUDAR VISÃO
// ==========================================

function mudarVisao(tipo) {
    visaoAtual = tipo;
    const container = document.getElementById('mapaContainer');
    
    // Limpar container
    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }
    
    if (tipo === 'globe') {
        // Mostrar Globo 3D
        container.style.background = 'transparent';
        iniciarGlobo3D();
        mostrarToast('Visão: Globo 3D', 'info');
    } else {
        // Mostrar Leaflet
        container.style.background = 'var(--bg-primary)';
        iniciarLeaflet(tipo);
        mostrarToast('Visão: ' + (tipo === 'satellite' ? 'Satélite' : 'Rua'), 'info');
    }
}

// ==========================================
// LEAFLET - MAPA 2D
// ==========================================

function iniciarLeaflet(tipo) {
    const container = document.getElementById('mapaContainer');
    const centro = [-11.2, 17.5];

    // Destruir mapa anterior se existir
    if (mapaLeaflet) {
        mapaLeaflet.remove();
        mapaLeaflet = null;
    }

    mapaLeaflet = L.map(container, {
        center: centro,
        zoom: 6,
        zoomControl: false
    });

    L.control.zoom({ position: 'topright' }).addTo(mapaLeaflet);

    // Layers
    const layers = {
        satellite: L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/satellite-streets-v12/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: '© Mapbox',
            maxZoom: 18,
            tileSize: 512,
            zoomOffset: -1
        }),
        street: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap',
            maxZoom: 18
        })
    };

    const layerAtual = tipo === 'satellite' ? layers.satellite : layers.street;
    layerAtual.addTo(mapaLeaflet);

    // Adicionar marcadores
    projetosData.forEach(function(projeto) {
        const statusCor = statusCores[projeto.status] || '#6B7A8F';
        const tipoCor = tipoCores[projeto.tipo] || '#6B7A8F';
        const statusIcone = statusIcones[projeto.status] || 'fa-circle';

        const iconHtml = `
            <div style="width: 36px; height: 36px; border-radius: 50%; background: ${statusCor}; border: 3px solid ${tipoCor}; display: flex; align-items: center; justify-content: center; color: #FFF; font-size: 14px; box-shadow: 0 0 20px ${statusCor}44;">
                <i class="fas ${statusIcone}"></i>
            </div>
        `;

        const icon = L.divIcon({
            html: iconHtml,
            className: 'custom-marker',
            iconSize: [36, 36],
            iconAnchor: [18, 36],
            popupAnchor: [0, -36]
        });

        const marker = L.marker([projeto.lat, projeto.lng], { icon: icon }).addTo(mapaLeaflet);
        
        const popupContent = `
            <div style="padding: 4px 0;">
                <h4 style="font-family: 'Orbitron', sans-serif; font-size: 14px; margin: 0 0 4px 0;">${projeto.nome}</h4>
                <p style="margin: 2px 0; font-size: 12px;"><strong>Responsável:</strong> ${projeto.responsavel}</p>
                <p style="margin: 2px 0; font-size: 12px;"><strong>Setor:</strong> ${projeto.setor}</p>
                <p style="margin: 2px 0; font-size: 12px;"><strong>Progresso:</strong> ${projeto.progresso}%</p>
                <a href="projeto-detalhe.php?id=${projeto.id}" style="display: inline-block; margin-top: 6px; padding: 4px 12px; background: #6C2BD9; color: #FFF; text-decoration: none; border-radius: 4px; font-size: 12px;">Ver Detalhes</a>
            </div>
        `;

        marker.bindPopup(popupContent);

        marker.on('click', function() {
            abrirDetalheProjeto(projeto);
        });
    });

    // Eventos
    mapaLeaflet.on('zoomend', function() {
        document.getElementById('zoomInfo').textContent = 'Zoom: ' + mapaLeaflet.getZoom();
    });

    mapaLeaflet.on('mousemove', function(e) {
        document.getElementById('coordsInfo').textContent = e.latlng.lat.toFixed(4) + ', ' + e.latlng.lng.toFixed(4);
    });

    // Redimensionar
    setTimeout(function() {
        mapaLeaflet.invalidateSize();
    }, 500);
}

// ==========================================
// DETALHE DO PROJETO
// ==========================================

function abrirDetalheProjeto(projeto) {
    const statusCor = statusCores[projeto.status] || '#6B7A8F';
    const statusIcone = statusIcones[projeto.status] || 'fa-circle';
    const tipoCor = tipoCores[projeto.tipo] || '#6B7A8F';
    const tipoIcone = projeto.tipo === 'individual' ? 'fa-user-tie' : 'fa-building';

    document.getElementById('projetoDetalhe').innerHTML = `
        <div class="projeto-detalhe-modal">
            <div class="projeto-status-header" style="border-left: 4px solid ${statusCor};">
                <h4>${projeto.nome}</h4>
                <div class="status-badges">
                    <span class="badge" style="background: ${statusCor}; color: #FFF;">
                        <i class="fas ${statusIcone}"></i> ${projeto.status_label}
                    </span>
                    <span class="badge" style="background: ${tipoCor}; color: #FFF;">
                        <i class="fas ${tipoIcone}"></i> ${projeto.tipo_label}
                    </span>
                </div>
            </div>
            <div class="projeto-detalhe-info">
                <div class="info-row">
                    <span class="info-label"><i class="fas fa-user"></i> Responsável</span>
                    <span class="info-value">${projeto.responsavel}</span>
                </div>
                <div class="info-row">
                    <span class="info-label"><i class="fas fa-tag"></i> Setor</span>
                    <span class="info-value">${projeto.setor}</span>
                </div>
                <div class="info-row">
                    <span class="info-label"><i class="fas fa-chart-line"></i> Progresso</span>
                    <span class="info-value">
                        <div class="progress-bar-mini">
                            <div class="progress-fill-mini" style="width: ${projeto.progresso}%; background: ${statusCor};"></div>
                        </div>
                        <span style="margin-left: 8px;">${projeto.progresso}%</span>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label"><i class="fas fa-map-marker-alt"></i> Localização</span>
                    <span class="info-value">${projeto.lat.toFixed(4)}, ${projeto.lng.toFixed(4)}</span>
                </div>
                ${projeto.descricao ? `
                <div class="info-row" style="flex-direction: column; align-items: flex-start; gap: 4px;">
                    <span class="info-label"><i class="fas fa-align-left"></i> Descrição</span>
                    <span class="info-value" style="text-align: left; font-size: 0.85rem; color: var(--text-secondary);">${projeto.descricao}</span>
                </div>
                ` : ''}
            </div>
            <div class="projeto-detalhe-actions">
                <a href="projeto-detalhe.php?id=${projeto.id}" class="btn btn-primary btn-sm" style="width: 100%;">
                    <i class="fas fa-eye"></i> Ver Detalhes Completos
                </a>
                <button class="btn btn-outline btn-sm" style="width: 100%; margin-top: 6px;" onclick="fecharModal('modalProjeto')">
                    <i class="fas fa-times"></i> Fechar
                </button>
            </div>
        </div>
    `;
    document.getElementById('modalProjeto').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function fecharModal(id) {
    document.getElementById(id)?.classList.remove('active');
    document.body.style.overflow = '';
}
</script>

<style>
/* ========================================== */
/* MAPA - CSS FUTURISTA                       */
/* ========================================== */

.mapa-container {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    border: 1px solid var(--border-color);
    overflow: hidden;
    transition: var(--transition-smooth);
}

.mapa-container:hover {
    background: var(--bg-card-hover);
    box-shadow: var(--glass-shadow);
}

#mapaContainer {
    width: 100%;
    height: 550px;
    background: radial-gradient(ellipse at center, #0A1628 0%, #050A14 100%);
    position: relative;
    overflow: hidden;
}

#mapaContainer canvas {
    display: block;
    width: 100% !important;
    height: 100% !important;
}

/* ===== TOOLBAR ===== */
.mapa-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 16px;
    background: var(--bg-card);
    border-bottom: 1px solid var(--border-color);
    flex-wrap: wrap;
    gap: 8px;
}

.mapa-toolbar .toolbar-left span {
    font-size: var(--text-xs);
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 4px;
}

.mapa-toolbar .toolbar-left span i {
    color: var(--color-turquoise);
}

.mapa-toolbar .toolbar-right {
    display: flex;
    gap: 16px;
}

.mapa-toolbar .toolbar-right span {
    font-size: var(--text-xs);
    color: var(--text-muted);
    font-family: monospace;
}

/* ===== LEGENDA ===== */
.mapa-legend {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    padding: 10px 16px;
    background: var(--bg-card);
    border-top: 1px solid var(--border-color);
}

.mapa-legend .legend-item {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: var(--text-xs);
    color: var(--text-muted);
}

.mapa-legend .legend-color {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
}

/* ========================================== */
/* MODAL                                      */
/* ========================================== */

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    align-items: center;
    justify-content: center;
}

.modal.active {
    display: flex;
}

.modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(4px);
    animation: fadeIn 0.3s ease;
    cursor: pointer;
}

.modal-content {
    position: relative;
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    max-width: 450px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    animation: slideUp 0.3s ease;
    box-shadow: var(--glass-shadow);
    border: 1px solid var(--border-color);
    z-index: 10;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 24px;
    border-bottom: 1px solid var(--border-color);
}

.modal-header .modal-title {
    font-family: var(--font-title);
    font-weight: 600;
    font-size: var(--text-h4);
    color: var(--text-primary);
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

.modal-header .modal-title i {
    color: var(--color-turquoise);
}

.modal-close {
    background: none;
    border: none;
    font-size: 1.3rem;
    cursor: pointer;
    color: var(--text-muted);
    transition: var(--transition-smooth);
    padding: 4px;
    line-height: 1;
}

.modal-close:hover {
    color: var(--text-primary);
    transform: rotate(90deg);
}

.modal-body {
    padding: 24px;
}

/* ========================================== */
/* POPUP LEAFLET                             */
/* ========================================== */

.leaflet-popup-content-wrapper {
    background: var(--bg-card) !important;
    border-radius: var(--radius-md) !important;
    box-shadow: var(--glass-shadow) !important;
    border: 1px solid var(--border-color) !important;
}

.leaflet-popup-tip {
    background: var(--bg-card) !important;
    border: 1px solid var(--border-color) !important;
}

.leaflet-popup-content {
    color: var(--text-primary) !important;
}

.leaflet-control-zoom a {
    background: var(--bg-card) !important;
    color: var(--text-primary) !important;
    border-color: var(--border-color) !important;
}

.leaflet-control-zoom a:hover {
    background: var(--bg-card-hover) !important;
}

[data-theme="dark"] .leaflet-tile {
    filter: brightness(0.9) saturate(1.1);
}

[data-theme="dark"] .leaflet-popup-content-wrapper {
    background: #1A2A4A !important;
}

[data-theme="dark"] .leaflet-popup-tip {
    background: #1A2A4A !important;
}

[data-theme="dark"] .leaflet-control-zoom a {
    background: #1A2A4A !important;
    color: #FFFFFF !important;
    border-color: rgba(255, 255, 255, 0.08) !important;
}

/* ========================================== */
/* RESPONSIVIDADE                             */
/* ========================================== */

@media (max-width: 1024px) {
    #mapaContainer {
        height: 450px;
    }
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr 1fr;
        gap: var(--space-sm);
    }

    .stat-card .value {
        font-size: var(--text-h3);
    }

    #mapaContainer {
        height: 350px;
    }

    .mapa-toolbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
    }

    .mapa-toolbar .toolbar-right {
        width: 100%;
        justify-content: space-between;
    }

    .header-actions {
        width: 100%;
        justify-content: center;
        flex-wrap: wrap;
    }

    .header-actions .btn {
        font-size: var(--text-xs);
        padding: 4px 8px;
    }

    .modal-content {
        width: 95%;
        margin: 10px;
    }
}

@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }

    #mapaContainer {
        height: 280px;
    }

    .mapa-legend {
        gap: 6px;
        padding: 8px 12px;
    }

    .mapa-legend .legend-item {
        font-size: 0.55rem;
    }

    .modal-header {
        padding: 14px 18px;
    }

    .modal-body {
        padding: 18px;
    }
}

/* ========================================== */
/* ANIMAÇÕES                                  */
/* ========================================== */

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.animate-fade-up {
    animation: fadeUp 0.5s ease forwards;
    opacity: 0;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
</body>
</html>