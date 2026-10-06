<?php
// painel/admin/instituicao-detalhe.php - Detalhes da Instituição
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Detalhes da Instituição';
$pagina_atual = 'instituicoes';

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 4;
$total_tickets = 15;

// Simulando o ID recebido via GET
$instituicao_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Dados mockados - Instituição (TODOS OS VALORES SÃO STRINGS OU INTEIROS)
$instituicao_data = [
    'id' => $instituicao_id,
    'nome' => 'Instituto Técnico de Luanda',
    'sigla' => 'ITL',
    'email' => 'contato@itl.edu.ao',
    'telefone' => '+244 923 456 200',
    'telefone_alternativo' => '+244 933 456 200',
    'nif' => '5001234567',
    'endereco' => 'Av. Universitária, 123, Luanda, Angola',
    'responsavel' => 'Dr. Pedro Costa',
    'responsavel_email' => 'pedro.costa@itl.edu.ao',
    'responsavel_telefone' => '+244 923 456 201',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_registo' => '2026-01-10 09:15:00',
    'ultimo_acesso' => '2026-02-18 14:20:00',
    'plano' => 'Institucional Pro',
    'tipo' => 'Ensino Superior',
    'alunos' => 1250,
    'professores' => 85,
    'cursos' => 12,
    'departamentos' => 6,
    'avatar' => 'instituicao-1.png',
    'descricao' => 'Instituição de ensino superior especializada em engenharia, topografia e geotecnologias. Fundada em 2005, tem formado profissionais de excelência para o mercado angolano.',
    'website' => 'www.itl.edu.ao',
    'fundacao' => '2005-03-15',
    'missao' => 'Formar profissionais de excelência nas áreas de engenharia, topografia e geotecnologias, contribuindo para o desenvolvimento sustentável de Angola.',
    'visao' => 'Ser referência em ensino e investigação em geociências na África Austral até 2030.'
];

// ========================================== //
// DADOS SEPARADOS (ARRAYS PARA LOOPS)        //
// ========================================== //

$cursos = [
    ['id' => 1, 'nome' => 'Engenharia Topográfica', 'nivel' => 'Licenciatura', 'duracao' => '4 anos', 'alunos' => 120],
    ['id' => 2, 'nome' => 'Engenharia Civil', 'nivel' => 'Licenciatura', 'duracao' => '5 anos', 'alunos' => 180],
    ['id' => 3, 'nome' => 'Sistemas de Informação Geográfica', 'nivel' => 'Licenciatura', 'duracao' => '4 anos', 'alunos' => 90],
    ['id' => 4, 'nome' => 'Topografia e Geomensura', 'nivel' => 'Técnico', 'duracao' => '3 anos', 'alunos' => 150],
    ['id' => 5, 'nome' => 'Construção Civil', 'nivel' => 'Técnico', 'duracao' => '3 anos', 'alunos' => 130],
    ['id' => 6, 'nome' => 'Geotecnologias', 'nivel' => 'Pós-Graduação', 'duracao' => '1.5 anos', 'alunos' => 45],
];

$departamentos = [
    ['id' => 1, 'nome' => 'Departamento de Topografia', 'responsavel' => 'Prof. Carlos Silva', 'professores' => 15],
    ['id' => 2, 'nome' => 'Departamento de Engenharia Civil', 'responsavel' => 'Eng. Ana Santos', 'professores' => 20],
    ['id' => 3, 'nome' => 'Departamento de GIS', 'responsavel' => 'Prof. Maria Oliveira', 'professores' => 12],
    ['id' => 4, 'nome' => 'Departamento de Geociências', 'responsavel' => 'Dr. João Ferreira', 'professores' => 10],
    ['id' => 5, 'nome' => 'Departamento de Investigação', 'responsavel' => 'Prof. Beatriz Lima', 'professores' => 8],
    ['id' => 6, 'nome' => 'Departamento de Extensão', 'responsavel' => 'Eng. Paulo Mendes', 'professores' => 5],
];

$documentos = [
    ['nome' => 'Certificado de Registo', 'arquivo' => 'certificado_registo_itl.pdf', 'data' => '2026-01-10'],
    ['nome' => 'Alvará de Funcionamento', 'arquivo' => 'alvara_itl.pdf', 'data' => '2026-01-15'],
    ['nome' => 'Licença do Ministério da Educação', 'arquivo' => 'licenca_medu_itl.pdf', 'data' => '2026-02-01'],
    ['nome' => 'Estatutos da Instituição', 'arquivo' => 'estatutos_itl.pdf', 'data' => '2026-01-10']
];

$historico_acoes = [
    ['acao' => 'Registo da instituição', 'data' => '2026-01-10 09:15:00', 'ip' => '192.168.1.100'],
    ['acao' => 'Validação da instituição', 'data' => '2026-01-10 10:00:00', 'ip' => '192.168.1.100'],
    ['acao' => 'Primeiro acesso ao painel', 'data' => '2026-01-11 08:30:00', 'ip' => '192.168.1.101'],
    ['acao' => 'Atualização de dados institucionais', 'data' => '2026-02-01 14:20:00', 'ip' => '192.168.1.105'],
    ['acao' => 'Upload de documentos', 'data' => '2026-02-10 11:30:00', 'ip' => '192.168.1.106'],
    ['acao' => 'Alteração de plano para Institucional Pro', 'data' => '2026-02-15 09:00:00', 'ip' => '192.168.1.108'],
];

// ========================================== //

// Função para gerar avatar fallback
function getAvatarUrl($name) {
    return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=FFD93D&color=fff&size=80';
}

// Função segura para exibir valores (CORRIGIDA)
function safeValue($value, $default = 'N/A') {
    if ($value === null || $value === '') {
        return $default;
    }
    if (is_array($value)) {
        return $default; // Nunca exibe array diretamente
    }
    return htmlspecialchars((string)$value);
}

// Função para verificar se é um array válido para loop
function isValidArray($data) {
    return isset($data) && is_array($data) && count($data) > 0;
}

// Ítens do Bottom Navigation
$bottom_nav_items = [
    ['icon' => 'fa-th-large', 'label' => 'Dashboard', 'link' => 'index.php', 'active' => false],
    ['icon' => 'fa-users-cog', 'label' => 'Administradores', 'link' => 'admin-usuarios.php', 'active' => false],
    ['icon' => 'fa-building', 'label' => 'Empresas', 'link' => 'empresas.php', 'active' => false],
    ['icon' => 'fa-user-tie', 'label' => 'Profissionais', 'link' => 'individuais.php', 'active' => false],
    ['icon' => 'fa-university', 'label' => 'Instituições', 'link' => 'instituicoes.php', 'active' => true],
    ['icon' => 'fa-user-check', 'label' => 'Validar', 'link' => 'admin-validar.php', 'active' => false],
    ['icon' => 'fa-chart-pie', 'label' => 'Financeiro', 'link' => 'financeiro/index.php', 'active' => false],
    ['icon' => 'fa-bars', 'label' => 'Menu', 'link' => '#', 'active' => false, 'menu_toggle' => true],
];


?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../includes/admin/admin-head.php" ?>

<body>
    <div class="app-container">
        <!-- Toast Container -->
        <div id="toast-container" class="toast-container"></div>

        <!-- Overlay para sidebar mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR                                    -->
        <!-- ========================================== -->
        <?php include "../../includes/admin/admin-sidebar.php" ?>

        <!-- ========================================== -->
        <!-- BOTTOM NAVIGATION - MOBILE                 -->
        <!-- ========================================== -->
        <nav class="bottom-nav" id="bottomNav">
            <div class="nav-items">
                <?php foreach ($bottom_nav_items as $item): ?>
                    <a href="<?php echo $item['link']; ?>"
                        class="nav-item <?php echo $item['active'] ? 'active' : ''; ?> <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'menu-toggle' : ''; ?>"
                        <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'id="bottomMenuToggle"' : ''; ?>
                        <?php echo isset($item['menu_toggle']) && $item['menu_toggle'] ? 'onclick="toggleSidebarMobile(event)"' : ''; ?>>
                        <i class="fas <?php echo $item['icon']; ?>"></i>
                        <span><?php echo $item['label']; ?></span>
                        <?php if ($item['label'] === 'Menu'): ?>
                            <span class="badge" id="bottomNotifBadge"><?php echo $notificacoes_count; ?></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-university icon"></i>
                        Detalhes da Instituição
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="instituicoes.php">Instituições</a>
                        <span class="separator">/</span>
                        <span><?php echo safeValue($instituicao_data['nome']); ?></span>
                    </p>
                </div>
                <div class="header-right">
                    <!-- Botão Tema Dark/Light -->
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                    <?php include "../../includes/admin/notificacoes-admin.php" ?>


                    <div class="header-actions">
                        <a href="instituicoes.php" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                        <a href="instituicao-editar.php?id=<?php echo $instituicao_data['id']; ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </div>
                </div>
            </header>

            <!-- ===== PERFIL DA INSTITUIÇÃO ===== -->
            <div class="profile-container">

                <!-- ===== CARD PRINCIPAL ===== -->
                <div class="profile-card animate-fade-up">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <img src="../../assets/images/<?php echo safeValue($instituicao_data['avatar'], 'instituicao-default.png'); ?>" 
                                 alt="<?php echo safeValue($instituicao_data['nome']); ?>"
                                 onerror="this.src='<?php echo getAvatarUrl($instituicao_data['nome'] ?? 'Instituição'); ?>'">
                            <span class="status-badge status-<?php echo safeValue($instituicao_data['status'], 'pendente'); ?>">
                                <span class="status-dot"></span>
                                <?php echo safeValue($instituicao_data['status_label'], 'Pendente'); ?>
                            </span>
                        </div>
                        <div class="profile-info">
                            <h2><?php echo safeValue($instituicao_data['nome']); ?></h2>
                            <div class="profile-subtitle">
                                <span class="sigla"><i class="fas fa-tag"></i> <?php echo safeValue($instituicao_data['sigla']); ?></span>
                                <span class="tipo"><i class="fas fa-graduation-cap"></i> <?php echo safeValue($instituicao_data['tipo']); ?></span>
                            </div>
                            <p class="profile-email"><i class="fas fa-envelope"></i> <?php echo safeValue($instituicao_data['email']); ?></p>
                            <div class="profile-badges">
                                <span class="badge badge-primary">
                                    <i class="fas fa-crown"></i> <?php echo safeValue($instituicao_data['plano'], 'Básico'); ?>
                                </span>
                                <span class="badge badge-info">
                                    <i class="fas fa-calendar-alt"></i> Fundada em <?php echo isset($instituicao_data['fundacao']) ? date('d/m/Y', strtotime($instituicao_data['fundacao'])) : 'N/A'; ?>
                                </span>
                                <span class="badge badge-<?php echo ($instituicao_data['status'] ?? 'pendente') === 'ativo' ? 'success' : (($instituicao_data['status'] ?? 'pendente') === 'pendente' ? 'warning' : 'danger'); ?>">
                                    <i class="fas fa-circle"></i> <?php echo safeValue($instituicao_data['status_label'], 'Pendente'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="profile-actions">
                            <button class="btn btn-sm btn-outline" onclick="window.print()">
                                <i class="fas fa-print"></i>
                            </button>
                            <button class="btn btn-sm btn-outline" onclick="exportarPerfil()">
                                <i class="fas fa-file-pdf"></i>
                            </button>
                        </div>
                    </div>

                    <!-- ===== STATS DO PERFIL ===== -->
                    <div class="profile-stats">
                        <div class="stat-item">
                            <span class="stat-value"><?php echo number_format($instituicao_data['alunos'] ?? 0); ?></span>
                            <span class="stat-label">Alunos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $instituicao_data['professores'] ?? 0; ?></span>
                            <span class="stat-label">Professores</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $instituicao_data['cursos'] ?? 0; ?></span>
                            <span class="stat-label">Cursos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo $instituicao_data['departamentos'] ?? 0; ?></span>
                            <span class="stat-label">Departamentos</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><?php echo isset($instituicao_data['data_registo']) ? date('d/m/Y', strtotime($instituicao_data['data_registo'])) : 'N/A'; ?></span>
                            <span class="stat-label">Registo</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value"><i class="fas fa-globe"></i></span>
                            <span class="stat-label"><a href="http://<?php echo safeValue($instituicao_data['website']); ?>" target="_blank" style="color: var(--profile-institucional); text-decoration: none; font-size: var(--text-xs);"><?php echo safeValue($instituicao_data['website']); ?></a></span>
                        </div>
                    </div>
                </div>

                <!-- ===== DETALHES DO PERFIL ===== -->
                <div class="profile-details-grid">

                    <!-- ===== INFORMAÇÕES INSTITUCIONAIS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.1s;">
                        <h3><i class="fas fa-university"></i> Informações Institucionais</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Nome da Instituição</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['nome']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Sigla</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['sigla']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Tipo</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['tipo']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Data de Fundação</span>
                                <span class="detail-value"><?php echo isset($instituicao_data['fundacao']) ? date('d/m/Y', strtotime($instituicao_data['fundacao'])) : 'N/A'; ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">NIF</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['nif']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Plano</span>
                                <span class="detail-value">
                                    <span class="badge badge-plano <?php echo strtolower($instituicao_data['plano'] ?? 'basico'); ?>">
                                        <i class="fas fa-crown"></i> <?php echo safeValue($instituicao_data['plano'], 'Básico'); ?>
                                    </span>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Status</span>
                                <span class="detail-value">
                                    <span class="status-badge status-<?php echo safeValue($instituicao_data['status'], 'pendente'); ?>">
                                        <span class="status-dot"></span>
                                        <?php echo safeValue($instituicao_data['status_label'], 'Pendente'); ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CONTACTOS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.15s;">
                        <h3><i class="fas fa-address-card"></i> Contactos</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Email</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['email']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Telefone</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['telefone']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Telefone Alternativo</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['telefone_alternativo']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Website</span>
                                <span class="detail-value">
                                    <a href="http://<?php echo safeValue($instituicao_data['website']); ?>" target="_blank" style="color: var(--profile-institucional); text-decoration: none;">
                                        <?php echo safeValue($instituicao_data['website']); ?>
                                        <i class="fas fa-external-link-alt" style="font-size: 0.6rem;"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Endereço</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['endereco']); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== RESPONSÁVEL ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.2s;">
                        <h3><i class="fas fa-user-tie"></i> Responsável</h3>
                        <div class="detail-list">
                            <div class="detail-item">
                                <span class="detail-label">Nome</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['responsavel']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Email</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['responsavel_email']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Telefone</span>
                                <span class="detail-value"><?php echo safeValue($instituicao_data['responsavel_telefone']); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== MISSÃO E VISÃO ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.25s;">
                        <h3><i class="fas fa-bullseye"></i> Missão e Visão</h3>
                        <div class="detail-list">
                            <div class="detail-item" style="flex-direction: column; align-items: flex-start; gap: 4px;">
                                <span class="detail-label" style="width: 100%;">Missão</span>
                                <span class="detail-value" style="text-align: left; width: 100%; font-style: italic;"><?php echo safeValue($instituicao_data['missao']); ?></span>
                            </div>
                            <div class="detail-item" style="flex-direction: column; align-items: flex-start; gap: 4px;">
                                <span class="detail-label" style="width: 100%;">Visão</span>
                                <span class="detail-value" style="text-align: left; width: 100%; font-style: italic;"><?php echo safeValue($instituicao_data['visao']); ?></span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Descrição</span>
                                <span class="detail-value" style="text-align: left;"><?php echo safeValue($instituicao_data['descricao']); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== CURSOS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.3s;">
                        <h3><i class="fas fa-book"></i> Cursos Oferecidos</h3>
                        <div class="table-responsive-mini">
                            <table class="table-mini">
                                <thead>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Nível</th>
                                        <th>Duração</th>
                                        <th>Alunos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isValidArray($cursos)): ?>
                                        <?php foreach ($cursos as $curso): ?>
                                            <tr>
                                                <td><strong><?php echo safeValue($curso['nome']); ?></strong></td>
                                                <td><span class="badge badge-info"><?php echo safeValue($curso['nivel']); ?></span></td>
                                                <td><?php echo safeValue($curso['duracao']); ?></td>
                                                <td><?php echo $curso['alunos'] ?? 0; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Nenhum curso cadastrado</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ===== DEPARTAMENTOS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.35s;">
                        <h3><i class="fas fa-building"></i> Departamentos</h3>
                        <div class="table-responsive-mini">
                            <table class="table-mini">
                                <thead>
                                    <tr>
                                        <th>Departamento</th>
                                        <th>Responsável</th>
                                        <th>Professores</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isValidArray($departamentos)): ?>
                                        <?php foreach ($departamentos as $departamento): ?>
                                            <tr>
                                                <td><strong><?php echo safeValue($departamento['nome']); ?></strong></td>
                                                <td><?php echo safeValue($departamento['responsavel']); ?></td>
                                                <td><?php echo $departamento['professores'] ?? 0; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Nenhum departamento cadastrado</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ===== DOCUMENTOS ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.4s;">
                        <h3><i class="fas fa-file-alt"></i> Documentos</h3>
                        <div class="document-list">
                            <?php if (isValidArray($documentos)): ?>
                                <?php foreach ($documentos as $doc): ?>
                                    <div class="document-item">
                                        <div class="document-icon">
                                            <i class="fas fa-file-pdf"></i>
                                        </div>
                                        <div class="document-info">
                                            <span class="document-name"><?php echo safeValue($doc['nome']); ?></span>
                                            <span class="document-file"><?php echo safeValue($doc['arquivo']); ?></span>
                                            <span class="document-data"><i class="far fa-calendar-alt"></i> <?php echo isset($doc['data']) ? date('d/m/Y', strtotime($doc['data'])) : 'N/A'; ?></span>
                                        </div>
                                        <div class="document-actions">
                                            <button class="btn btn-sm btn-outline" onclick="verDocumento('<?php echo safeValue($doc['arquivo']); ?>')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary" onclick="baixarDocumento('<?php echo safeValue($doc['arquivo']); ?>')">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="text-center text-muted" style="padding: 20px;">Nenhum documento anexado</div>
                            <?php endif; ?>
                        </div>
                        <div class="document-upload">
                            <button class="btn btn-outline btn-sm" onclick="uploadDocumento()">
                                <i class="fas fa-upload"></i> Adicionar Documento
                            </button>
                        </div>
                    </div>

                    <!-- ===== HISTÓRICO DE AÇÕES ===== -->
                    <div class="detail-card animate-fade-up" style="animation-delay: 0.45s;">
                        <h3><i class="fas fa-history"></i> Histórico de Ações</h3>
                        <div class="historico-list">
                            <?php if (isValidArray($historico_acoes)): ?>
                                <?php foreach ($historico_acoes as $acao): ?>
                                    <div class="historico-item">
                                        <div class="historico-icon">
                                            <i class="fas fa-circle"></i>
                                        </div>
                                        <div class="historico-info">
                                            <span class="historico-acao"><?php echo safeValue($acao['acao']); ?></span>
                                            <span class="historico-data"><?php echo isset($acao['data']) ? date('d/m/Y H:i', strtotime($acao['data'])) : 'N/A'; ?></span>
                                        </div>
                                        <span class="historico-ip">IP: <?php echo safeValue($acao['ip']); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="text-center text-muted" style="padding: 20px;">Nenhum histórico disponível</div>
                            <?php endif; ?>
                        </div>
                        <div class="historico-actions">
                            <a href="instituicao-historico.php?id=<?php echo $instituicao_data['id']; ?>" class="btn btn-outline btn-sm">
                                <i class="fas fa-history"></i> Ver Histórico Completo
                            </a>
                        </div>
                    </div>

                </div>

                <!-- ===== AÇÕES RÁPIDAS ===== -->
                <div class="quick-actions-profile animate-fade-up" style="animation-delay: 0.5s;">
                    <h3><i class="fas fa-bolt"></i> Ações Disponíveis</h3>
                    <div class="actions-grid">
                        <a href="instituicao-editar.php?id=<?php echo $instituicao_data['id']; ?>" class="action-item">
                            <i class="fas fa-edit"></i>
                            <span class="label">Editar Perfil</span>
                        </a>
                        
                        <?php if (($instituicao_data['status'] ?? 'pendente') === 'ativo'): ?>
                            <a href="instituicao-suspender.php?id=<?php echo $instituicao_data['id']; ?>" class="action-item" onclick="return confirm('Tem certeza que deseja suspender esta instituição?')">
                                <i class="fas fa-pause" style="color: #F59E0B;"></i>
                                <span class="label">Suspender</span>
                            </a>
                        <?php elseif (($instituicao_data['status'] ?? 'pendente') === 'inativo'): ?>
                            <a href="instituicao-ativar.php?id=<?php echo $instituicao_data['id']; ?>" class="action-item">
                                <i class="fas fa-play" style="color: #00FFA3;"></i>
                                <span class="label">Ativar</span>
                            </a>
                        <?php endif; ?>
                        <?php if (($instituicao_data['status'] ?? 'pendente') === 'pendente'): ?>
                            <a href="instituicao-validar.php?id=<?php echo $instituicao_data['id']; ?>" class="action-item">
                                <i class="fas fa-check" style="color: #00FFA3;"></i>
                                <span class="label">Validar</span>
                            </a>
                        <?php endif; ?>
                        <a href="instituicao-historico.php?id=<?php echo $instituicao_data['id']; ?>" class="action-item">
                            <i class="fas fa-history"></i>
                            <span class="label">Ver Histórico Completo</span>
                        </a>
                        <a href="instituicao-excluir.php?id=<?php echo $instituicao_data['id']; ?>" class="action-item" onclick="return confirm('Tem certeza que deseja excluir permanentemente esta instituição? Esta ação não pode ser desfeita!')">
                            <i class="fas fa-trash" style="color: #FF6B6B;"></i>
                            <span class="label" style="color: #FF6B6B;">Excluir</span>
                        </a>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL VISUALIZAR DOCUMENTO                 -->
    <!-- ========================================== -->
    <div class="modal" id="modalDocumento">
        <div class="modal-overlay" onclick="fecharModal('modalDocumento')"></div>
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-file-pdf"></i> Visualizar Documento
                </h3>
                <button class="modal-close" onclick="fecharModal('modalDocumento')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="documento-preview">
                    <div class="documento-icon-preview">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h4 id="documentoNome">documento.pdf</h4>
                    <p class="documento-info">Clique no botão abaixo para visualizar ou baixar o documento.</p>
                    <div class="documento-actions-preview">
                        <button class="btn btn-primary" onclick="baixarDocumentoAtual()">
                            <i class="fas fa-download"></i> Baixar
                        </button>
                        <button class="btn btn-outline" onclick="fecharModal('modalDocumento')">
                            <i class="fas fa-times"></i> Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script src="../assets/js/main.js"></script>
    <script>
        

        // ==========================================
        // TOGGLE SIDEBAR (Desktop)
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
        });

        // ==========================================
        // TOGGLE SIDEBAR (Mobile - Bottom Nav)
        // ==========================================
        function toggleSidebarMobile(event) {
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }

            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (sidebar) {
                sidebar.classList.toggle('open');
                if (overlay) overlay.classList.toggle('active');

                const menuBtn = document.getElementById('bottomMenuToggle');
                if (menuBtn) {
                    const icon = menuBtn.querySelector('i');
                    if (sidebar.classList.contains('open')) {
                        icon.className = 'fas fa-times';
                    } else {
                        icon.className = 'fas fa-bars';
                    }
                }
            }
        }

        // Fechar sidebar mobile ao clicar fora
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const menuBtn = document.getElementById('bottomMenuToggle');

            if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
                if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
                    sidebar.classList.remove('open');
                    if (overlay) overlay.classList.remove('active');

                    if (menuBtn) {
                        const icon = menuBtn.querySelector('i');
                        if (icon) icon.className = 'fas fa-bars';
                    }
                }
            }
        });

        // ==========================================
        // NOTIFICAÇÕES - DROPDOWN
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            const btnNotif = document.getElementById('btnNotificacoes');
            const dropdown = document.getElementById('notificacoesDropdown');

            if (btnNotif && dropdown) {
                btnNotif.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                    if (dropdown.classList.contains('active')) {
                        carregarNotificacoes();
                    }
                });

                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }
        });

        function carregarNotificacoes() {
            const list = document.getElementById('notifList');
            if (!list) return;

            const naoLidas = mockNotificacoes.filter(n => !n.lida);
            const todas = mockNotificacoes;

            let html = '';

            if (naoLidas.length > 0) {
                html += '<div class="notif-group"><span class="notif-group-label">Não lidas</span>';
                naoLidas.forEach(n => {
                    html += criarNotificacaoItem(n);
                });
                html += '</div>';
            }

            const lidas = mockNotificacoes.filter(n => n.lida);
            if (lidas.length > 0) {
                html += '<div class="notif-group"><span class="notif-group-label">Lidas</span>';
                lidas.forEach(n => {
                    html += criarNotificacaoItem(n);
                });
                html += '</div>';
            }

            if (todas.length === 0) {
                html = `
                    <div class="notificacao-vazia">
                        <i class="fas fa-bell-slash"></i>
                        <p>Nenhuma notificação</p>
                    </div>
                `;
            }

            list.innerHTML = html;
        }

        function criarNotificacaoItem(notif) {
            return `
                <div class="notificacao-item ${notif.lida ? 'lida' : 'nao-lida'}" onclick="marcarNotificacaoLida(${notif.id})">
                    <div class="notif-icon ${notif.icon_class}">
                        <i class="fas ${notif.icon}"></i>
                    </div>
                    <div class="notif-conteudo">
                        <p>${notif.mensagem}</p>
                        <span class="notif-tempo">${notif.tempo}</span>
                    </div>
                    ${!notif.lida ? '<span class="notif-dot"></span>' : ''}
                </div>
            `;
        }

        function marcarNotificacaoLida(id) {
            const notif = mockNotificacoes.find(n => n.id === id);
            if (notif) {
                notif.lida = true;
                atualizarBadge();
                carregarNotificacoes();
                mostrarToast('Notificação marcada como lida', 'info');
            }
        }

        function marcarTodasLidas() {
            mockNotificacoes.forEach(n => n.lida = true);
            atualizarBadge();
            carregarNotificacoes();
            mostrarToast('Todas as notificações foram marcadas como lidas', 'success');
            closeNotifications();
        }

        function atualizarBadge() {
            const naoLidas = mockNotificacoes.filter(n => !n.lida).length;
            const badge = document.getElementById('notifBadge');
            const bottomBadge = document.getElementById('bottomNotifBadge');

            if (badge) {
                if (naoLidas > 0) {
                    badge.textContent = naoLidas;
                    badge.style.display = 'flex';
                } else {
                    badge.style.display = 'none';
                }
            }

            if (bottomBadge) {
                if (naoLidas > 0) {
                    bottomBadge.textContent = naoLidas;
                    bottomBadge.style.display = 'flex';
                } else {
                    bottomBadge.style.display = 'none';
                }
            }
        }

        function closeNotifications() {
            const dropdown = document.getElementById('notificacoesDropdown');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }

        // ==========================================
        // PERFIL - DROPDOWN
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            const btnPerfil = document.getElementById('btnPerfil');
            const dropdown = document.getElementById('perfilDropdown');

            if (btnPerfil && dropdown) {
                btnPerfil.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                });

                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnPerfil.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }

            const themeToggle = document.querySelector('.perfil-dropdown .theme-toggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('btnTheme')?.click();
                    dropdown.classList.remove('active');
                });
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
                    const ripple = document.createElement('span');
                    ripple.className = 'ripple';
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                    ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                    this.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 600);

                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    const themeLabel = document.querySelector('.perfil-dropdown .theme-toggle');
                    if (themeLabel) {
                        const icon = themeLabel.querySelector('i');
                        if (newTheme === 'dark') {
                            icon.className = 'fas fa-moon';
                            themeLabel.innerHTML = '<i class="fas fa-moon"></i> Tema Escuro';
                        } else {
                            icon.className = 'fas fa-sun';
                            themeLabel.innerHTML = '<i class="fas fa-sun"></i> Tema Claro';
                        }
                    }

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

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
                warning: '#F59E0B',
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

        // ==========================================
        // FUNÇÕES DOS DOCUMENTOS
        // ==========================================

        let documentoAtual = '';

        function verDocumento(documento) {
            documentoAtual = documento;
            document.getElementById('documentoNome').textContent = documento;
            document.getElementById('modalDocumento').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function baixarDocumento(documento) {
            mostrarToast(`A baixar o documento: ${documento}`, 'success');
        }

        function baixarDocumentoAtual() {
            if (documentoAtual) {
                baixarDocumento(documentoAtual);
            }
        }

        function uploadDocumento() {
            mostrarToast('Funcionalidade de upload de documentos (simulação)', 'info');
        }

        function exportarPerfil() {
            mostrarToast('A exportar perfil para PDF...', 'info');
            setTimeout(() => {
                mostrarToast('Perfil exportado com sucesso!', 'success');
            }, 2000);
        }

        // ==========================================
        // MODAIS
        // ==========================================

        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal.active').forEach(modal => {
                    fecharModal(modal.id);
                });
            }
        });
    </script>

    <style>
        /* ========================================== */
        /* PERFIL DA INSTITUIÇÃO - CSS COMPLETO       */
        /* ========================================== */

        .profile-container {
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ===== CARD PRINCIPAL ===== */
        .profile-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-xl);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .profile-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: var(--space-xl);
            flex-wrap: wrap;
        }

        .profile-avatar {
            position: relative;
            flex-shrink: 0;
        }

        .profile-avatar img {
            width: 100px;
            height: 100px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 4px solid var(--profile-institucional);
        }

        .profile-avatar .status-badge {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h2 {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }

        .profile-info .profile-subtitle {
            display: flex;
            gap: var(--space-md);
            flex-wrap: wrap;
            margin-bottom: var(--space-xs);
        }

        .profile-info .profile-subtitle span {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .profile-info .profile-subtitle span i {
            margin-right: 4px;
            color: var(--profile-institucional);
        }

        .profile-info .profile-email {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: var(--space-sm);
        }

        .profile-info .profile-email i {
            margin-right: 6px;
            color: var(--profile-institucional);
        }

        .profile-badges {
            display: flex;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .profile-actions {
            display: flex;
            gap: var(--space-sm);
            align-self: flex-start;
        }

        /* ===== STATS ===== */
        .profile-stats {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: var(--space-md);
            margin-top: var(--space-lg);
            padding-top: var(--space-lg);
            border-top: 1px solid var(--border-color);
        }

        .profile-stats .stat-item {
            text-align: center;
        }

        .profile-stats .stat-value {
            display: block;
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
        }

        .profile-stats .stat-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .profile-stats .stat-value a {
            color: var(--profile-institucional);
            text-decoration: none;
        }

        .profile-stats .stat-value a:hover {
            text-decoration: underline;
        }

        /* ===== DETAILS GRID ===== */
        .profile-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-lg);
        }

        .detail-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .detail-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .detail-card h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .detail-card h3 i {
            color: var(--profile-institucional);
        }

        /* ===== DETAIL LIST ===== */
        .detail-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 6px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-item .detail-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            font-weight: 500;
        }

        .detail-item .detail-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            text-align: right;
        }

        /* ===== TABELA MINI ===== */
        .table-responsive-mini {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-mini {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
        }

        .table-mini thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 6px 8px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
        }

        .table-mini tbody td {
            padding: 6px 8px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-mini tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== DOCUMENTOS ===== */
        .document-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .document-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .document-item:hover {
            border-color: var(--profile-institucional);
        }

        .document-item .document-icon {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-sm);
            background: rgba(255, 217, 61, 0.08);
            color: var(--profile-institucional);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .document-item .document-info {
            flex: 1;
        }

        .document-item .document-name {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
        }

        .document-item .document-file {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .document-item .document-data {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .document-item .document-actions {
            display: flex;
            gap: var(--space-xs);
        }

        .document-upload {
            margin-top: var(--space-md);
            text-align: center;
        }

        /* ===== HISTÓRICO ===== */
        .historico-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            max-height: 250px;
            overflow-y: auto;
            padding-right: var(--space-sm);
        }

        .historico-list::-webkit-scrollbar {
            width: 4px;
        }

        .historico-list::-webkit-scrollbar-track {
            background: var(--bg-primary);
            border-radius: 3px;
        }

        .historico-list::-webkit-scrollbar-thumb {
            background: var(--profile-institucional);
            border-radius: 3px;
        }

        .historico-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--profile-institucional);
        }

        .historico-item .historico-icon {
            color: var(--profile-institucional);
            font-size: 0.6rem;
        }

        .historico-item .historico-info {
            flex: 1;
        }

        .historico-item .historico-acao {
            display: block;
            font-size: var(--text-sm);
            color: var(--text-primary);
        }

        .historico-item .historico-data {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .historico-item .historico-ip {
            font-size: var(--text-xs);
            color: var(--text-muted);
            font-family: monospace;
        }

        .historico-actions {
            margin-top: var(--space-md);
            text-align: center;
        }

        /* ========================================== */
        /* QUICK ACTIONS PROFILE                      */
        /* ========================================== */

        .quick-actions-profile {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .quick-actions-profile:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .quick-actions-profile h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-md);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .quick-actions-profile h3 i {
            color: var(--profile-institucional);
        }

        .quick-actions-profile .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: var(--space-md);
        }

        .quick-actions-profile .action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-primary);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            text-decoration: none;
            color: var(--text-secondary);
            transition: var(--transition-smooth);
        }

        .quick-actions-profile .action-item:hover {
            border-color: var(--profile-institucional);
            background: rgba(255, 217, 61, 0.04);
            transform: translateY(-2px);
            color: var(--text-primary);
        }

        .quick-actions-profile .action-item i {
            font-size: 1.3rem;
            color: var(--profile-institucional);
        }

        .quick-actions-profile .action-item .label {
            font-size: var(--text-sm);
            text-align: center;
        }

        /* ========================================== */
        /* MODAL DOCUMENTO                           */
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
            max-width: 500px;
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
            color: var(--profile-institucional);
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

        /* ===== PREVIEW DO DOCUMENTO ===== */
        .documento-preview {
            text-align: center;
            padding: var(--space-xl) var(--space-md);
        }

        .documento-preview .documento-icon-preview {
            font-size: 4rem;
            color: var(--profile-institucional);
            margin-bottom: var(--space-md);
        }

        .documento-preview h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
            word-break: break-all;
        }

        .documento-preview .documento-info {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: var(--space-lg);
        }

        .documento-preview .documento-actions-preview {
            display: flex;
            gap: var(--space-sm);
            justify-content: center;
            flex-wrap: wrap;
        }

        .documento-preview .documento-actions-preview .btn {
            min-width: 120px;
            justify-content: center;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .profile-details-grid {
                grid-template-columns: 1fr;
            }

            .profile-stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profile-info {
                text-align: center;
            }

            .profile-info .profile-subtitle {
                justify-content: center;
            }

            .profile-badges {
                justify-content: center;
            }

            .profile-actions {
                align-self: center;
            }

            .profile-stats {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .profile-stats .stat-value {
                font-size: var(--text-h3);
            }

            .detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 2px;
            }

            .detail-item .detail-value {
                text-align: left;
            }

            .document-item {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .document-item .document-actions {
                justify-content: center;
            }

            .historico-item {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-xs);
            }

            .quick-actions-profile .actions-grid {
                grid-template-columns: 1fr 1fr;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .profile-avatar img {
                width: 80px;
                height: 80px;
            }

            .table-mini thead th,
            .table-mini tbody td {
                padding: 4px 6px;
                font-size: var(--text-xs);
            }
        }

        @media (max-width: 480px) {
            .profile-card {
                padding: var(--space-md);
            }

            .profile-stats {
                grid-template-columns: 1fr 1fr;
            }

            .quick-actions-profile .actions-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions-profile {
                padding: var(--space-md);
            }

            .detail-card {
                padding: var(--space-md);
            }

            .profile-avatar img {
                width: 80px;
                height: 80px;
            }

            .profile-info h2 {
                font-size: var(--text-h3);
            }

            .modal-header {
                padding: 14px 18px;
            }

            .modal-body {
                padding: 18px;
            }

            .documento-preview {
                padding: var(--space-lg) var(--space-sm);
            }

            .documento-preview .documento-icon-preview {
                font-size: 3rem;
            }

            .documento-preview .documento-actions-preview {
                flex-direction: column;
            }

            .documento-preview .documento-actions-preview .btn {
                width: 100%;
                min-width: auto;
            }

            .profile-actions .btn {
                padding: 4px 8px;
                font-size: var(--text-xs);
            }
        }
    </style>

</body>
</html>