<?php
// painel/admin/admin-usuarios.php - Gestão de Administradores
include "../../includes/admin/notificacoes-admin-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL (OBRIGATÓRIO PARA SIDEBAR) =====
$titulo_pagina = 'Gestão de Administradores';
$pagina_atual = 'admin-usuarios'; // <-- ESSENCIAL!

// Dados mockados (mesmos do dashboard)
$total_usuarios = 12;
$total_projetos = 189;
$faturamento_total = 12800000;
$pendentes = 23;
$pendentes_validacao = 3;
$total_tickets = 15;



// Dados mockados - Administradores
$usuarios = [
    [
        'id' => 1,
        'nome' => 'João Silva',
        'email' => 'joao.silva@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Super Admin',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-15 10:30:00',
        'ultimo_acesso' => '2026-02-18 14:20:00',
        'avatar' => 'avatar-1.png',
        'telefone' => '+244 923 456 789',
        'permissoes' => 'Todas'
    ],
    [
        'id' => 2,
        'nome' => 'Maria Santos',
        'email' => 'maria.santos@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Admin',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-10 09:15:00',
        'ultimo_acesso' => '2026-02-18 11:45:00',
        'avatar' => 'avatar-2.png',
        'telefone' => '+244 923 456 788',
        'permissoes' => 'Utilizadores, Conteúdo'
    ],
    [
        'id' => 3,
        'nome' => 'Pedro Costa',
        'email' => 'pedro.costa@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Admin',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-01 16:45:00',
        'ultimo_acesso' => '-',
        'avatar' => 'avatar-3.png',
        'telefone' => '+244 923 456 787',
        'permissoes' => 'Financeiro'
    ],
    [
        'id' => 4,
        'nome' => 'Ana Oliveira',
        'email' => 'ana.oliveira@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Super Admin',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-20 08:00:00',
        'ultimo_acesso' => '2026-02-17 16:30:00',
        'avatar' => 'avatar-4.png',
        'telefone' => '+244 923 456 786',
        'permissoes' => 'Todas'
    ],
    [
        'id' => 5,
        'nome' => 'Carlos Ferreira',
        'email' => 'carlos.ferreira@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Admin',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'data_registo' => '2026-01-05 11:20:00',
        'ultimo_acesso' => '2026-01-25 09:10:00',
        'avatar' => 'avatar-5.png',
        'telefone' => '+244 923 456 785',
        'permissoes' => 'Suporte'
    ],
    [
        'id' => 6,
        'nome' => 'Beatriz Lima',
        'email' => 'beatriz.lima@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Super Admin',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-02-10 14:30:00',
        'ultimo_acesso' => '2026-02-18 09:00:00',
        'avatar' => 'avatar-6.png',
        'telefone' => '+244 923 456 784',
        'permissoes' => 'Todas'
    ],
    [
        'id' => 7,
        'nome' => 'Rui Santos',
        'email' => 'rui.santos@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Admin',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'data_registo' => '2026-02-15 09:45:00',
        'ultimo_acesso' => '-',
        'avatar' => 'avatar-7.png',
        'telefone' => '+244 923 456 783',
        'permissoes' => 'Conteúdo, Blog'
    ],
    [
        'id' => 8,
        'nome' => 'Sofia Martins',
        'email' => 'sofia.martins@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Super Admin',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-25 13:00:00',
        'ultimo_acesso' => '2026-02-16 15:20:00',
        'avatar' => 'avatar-8.png',
        'telefone' => '+244 923 456 782',
        'permissoes' => 'Todas'
    ],
    [
        'id' => 9,
        'nome' => 'Administrador Master',
        'email' => 'master@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Super Admin',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'data_registo' => '2026-01-01 00:00:00',
        'ultimo_acesso' => '2026-02-18 18:00:00',
        'avatar' => 'avatar-9.png',
        'telefone' => '+244 923 456 781',
        'permissoes' => 'Todas'
    ],
    [
        'id' => 10,
        'nome' => 'Tânia Rodrigues',
        'email' => 'tania.rodrigues@admin.com',
        'perfil' => 'admin',
        'perfil_label' => 'Administrador',
        'nivel' => 'Admin',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'data_registo' => '2026-01-28 10:00:00',
        'ultimo_acesso' => '2026-02-10 08:00:00',
        'avatar' => 'avatar-10.png',
        'telefone' => '+244 923 456 780',
        'permissoes' => 'Financeiro, Relatórios'
    ]
];

// Estatísticas
$total_ativos = count(array_filter($usuarios, function ($u) {
    return $u['status'] === 'ativo';
}));
$total_pendentes = count(array_filter($usuarios, function ($u) {
    return $u['status'] === 'pendente';
}));
$total_inativos = count(array_filter($usuarios, function ($u) {
    return $u['status'] === 'inativo';
}));
$total_super_admins = count(array_filter($usuarios, function ($u) {
    return $u['nivel'] === 'Super Admin';
}));



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
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-users-cog icon"></i>
                        Gestão de Administradores
                    </h1>
                    <p class="breadcrumb">
                        <a href="index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <span>Administradores</span>
                    </p>
                </div>
                <div class="header-right">
                    <!-- Botão Tema Dark/Light -->
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>
                <?php include "../../includes/admin/notificacoes-admin.php" ?>


                    <button class="btn btn-primary" onclick="location.reload()">
                        <i class="fas fa-sync-alt"></i> Atualizar
                    </button>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up">
                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="value"><?php echo count($usuarios); ?></div>
                    <div class="label">Total de Administradores</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 8.5%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="value"><?php echo $total_ativos; ?></div>
                    <div class="label">Administradores Ativos</div>
                    <div class="trend up">
                        <i class="fas fa-arrow-up"></i> 6.3%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="value"><?php echo $total_pendentes; ?></div>
                    <div class="label">Pendentes de Validação</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 3.2%
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon red">
                        <i class="fas fa-user-slash"></i>
                    </div>
                    <div class="value"><?php echo $total_inativos; ?></div>
                    <div class="label">Administradores Inativos</div>
                    <div class="trend down">
                        <i class="fas fa-arrow-down"></i> 2.1%
                    </div>
                </div>
            </section>

            <!-- ===== FILTROS E AÇÕES ===== -->
            <div class="filter-bar-admin">
                <div class="filter-group">
                    <label><i class="fas fa-search"></i></label>
                    <input type="text" id="searchUser" placeholder="Pesquisar administrador..." oninput="aplicarFiltros()">
                </div>
                <div class="filter-group">
                    <label>Nível</label>
                    <select id="filterPerfil" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="Super Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Status</label>
                    <select id="filterStatus" onchange="aplicarFiltros()">
                        <option value="">Todos</option>
                        <option value="ativo">Ativo</option>
                        <option value="pendente">Pendente</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <div class="filter-actions">
                    <button class="btn btn-sm btn-primary" onclick="aplicarFiltros()">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                    <button class="btn btn-sm btn-outline" onclick="limparFiltros()">
                        <i class="fas fa-undo"></i> Limpar
                    </button>
                </div>
            </div>

            <!-- ===== AÇÕES RÁPIDAS ===== -->
            <div class="quick-actions-bar">
                <button class="btn btn-primary" data-modal="modalNovoUsuario">
                    <i class="fas fa-user-plus"></i> Novo Administrador
                </button>
                <button class="btn btn-outline" onclick="exportarUsuarios()">
                    <i class="fas fa-file-export"></i> Exportar
                </button>
                <button class="btn btn-outline" onclick="enviarEmailMassa()">
                    <i class="fas fa-envelope"></i> Enviar Email
                </button>
                <button class="btn btn-outline" onclick="gerarRelatorio()">
                    <i class="fas fa-file-alt"></i> Relatório
                </button>
                <div class="mass-actions" id="massActions" style="display: none;">
                    <span class="mass-count" id="massCount">0 selecionado(s)</span>
                    <button class="btn btn-sm btn-success" onclick="ativarSelecionados()">
                        <i class="fas fa-play"></i> Ativar
                    </button>
                    <button class="btn btn-sm btn-warning" onclick="suspenderSelecionados()">
                        <i class="fas fa-pause"></i> Suspender
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="excluirSelecionados()">
                        <i class="fas fa-trash"></i> Excluir
                    </button>
                </div>
            </div>

            <!-- ===== TABELA DE ADMINISTRADORES ===== -->
            <div class="panel-admin">
                <div class="panel-header">
                    <h3 class="panel-title">
                        <i class="fas fa-list"></i> Lista de Administradores
                        <span class="badge badge-primary" id="totalUsuariosBadge"><?php echo count($usuarios); ?></span>
                    </h3>
                    <div class="panel-actions">
                        <span class="text-muted" id="resultadosInfo">Mostrando <?php echo count($usuarios); ?> resultados</span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table-admin table-data" id="tabelaUsuarios">
                        <thead>
                            <tr>
                                <th style="width: 40px;">
                                    <input type="checkbox" id="selectAll" onchange="selecionarTodos(this)">
                                </th>
                                <th>Administrador</th>
                                <th>Email</th>
                                <th>Nível</th>
                                <th>Permissões</th>
                                <th>Status</th>
                                <th>Registo</th>
                                <th style="width: 200px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr data-id="<?php echo $usuario['id']; ?>"
                                    data-perfil="<?php echo $usuario['nivel']; ?>"
                                    data-status="<?php echo $usuario['status']; ?>"
                                    data-nome="<?php echo strtolower($usuario['nome']); ?>"
                                    data-email="<?php echo strtolower($usuario['email']); ?>">

                                    <td>
                                        <input type="checkbox" class="select-item" onchange="atualizarSelecao()">
                                    </td>
                                    <td>
                                        <div class="user-info">
                                            <img src="../../assets/images/<?php echo $usuario['avatar']; ?>" alt="<?php echo $usuario['nome']; ?>">
                                            <div>
                                                <strong><?php echo $usuario['nome']; ?></strong>
                                                <span class="user-empresa">
                                                    <i class="fas fa-shield-alt"></i> <?php echo $usuario['nivel']; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="user-email"><?php echo $usuario['email']; ?></span>
                                        <span class="user-telefone"><i class="fas fa-phone"></i> <?php echo $usuario['telefone']; ?></span>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?php echo $usuario['nivel'] === 'Super Admin' ? 'primary' : 'info'; ?>">
                                            <i class="fas <?php echo $usuario['nivel'] === 'Super Admin' ? 'fa-crown' : 'fa-user-shield'; ?>"></i>
                                            <?php echo $usuario['nivel']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="permissoes-text"><?php echo $usuario['permissoes']; ?></span>
                                    </td>
                                    <td>
                                        <span class="status-badge status-<?php echo $usuario['status']; ?>">
                                            <span class="status-dot"></span>
                                            <?php echo $usuario['status_label']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="data-info">
                                            <span class="data-registo">
                                                <i class="far fa-calendar-alt"></i>
                                                <?php echo date('d/m/Y', strtotime($usuario['data_registo'])); ?>
                                            </span>
                                            <span class="ultimo-acesso">
                                                <i class="far fa-clock"></i>
                                                <?php echo $usuario['ultimo_acesso'] !== '-' ? date('d/m/Y H:i', strtotime($usuario['ultimo_acesso'])) : 'Nunca'; ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="admin-detalhe.php?id=<?php echo $usuario['id']; ?>"
                                                class="btn btn-sm btn-outline" title="Ver Detalhes">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="admin-editar.php?id=<?php echo $usuario['id']; ?>"
                                                class="btn btn-sm btn-outline" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <?php if ($usuario['status'] === 'pendente'): ?>
                                                <button class="btn btn-sm btn-success" title="Validar"
                                                    onclick="validarUsuario(<?php echo $usuario['id']; ?>, '<?php echo $usuario['nome']; ?>')">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            <?php endif; ?>

                                            <?php if ($usuario['status'] === 'ativo'): ?>
                                                <a href="admin-suspender.php?id=<?php echo $usuario['id']; ?>"
                                                    class="btn btn-sm btn-warning" title="Suspender">
                                                    <i class="fas fa-pause"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($usuario['status'] === 'inativo'): ?>
                                                <button class="btn btn-sm btn-success" title="Ativar"
                                                    onclick="ativarUsuario(<?php echo $usuario['id']; ?>, '<?php echo $usuario['nome']; ?>')">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                            <?php endif; ?>

                                            <a href="admin-excluir.php?id=<?php echo $usuario['id']; ?>"
                                                class="btn btn-sm btn-danger" title="Excluir"
                                                onclick="return confirm('Tem certeza que deseja excluir permanentemente este administrador?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="table-pagination" id="paginacao">
                    <button class="page-btn prev" disabled onclick="mudarPagina('prev')">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="page-btn active" data-page="1" onclick="irParaPagina(1)">1</button>
                    <button class="page-btn" data-page="2" onclick="irParaPagina(2)">2</button>
                    <button class="page-btn next" onclick="mudarPagina('next')">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL NOVO ADMINISTRADOR                   -->
    <!-- ========================================== -->
    <div class="modal" id="modalNovoUsuario">
        <div class="modal-overlay" onclick="fecharModal('modalNovoUsuario')"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-user-plus"></i> Novo Administrador
                </h3>
                <button class="modal-close" onclick="fecharModal('modalNovoUsuario')">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNovoUsuario" onsubmit="criarUsuario(event)">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nome Completo <span class="required">*</span></label>
                            <input type="text" class="form-control" id="nomeUsuario" placeholder="Nome do administrador" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" id="emailUsuario" placeholder="email@admin.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nível <span class="required">*</span></label>
                            <select class="form-control" id="perfilUsuario" required>
                                <option value="">Selecione...</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefoneUsuario" placeholder="+244 923 456 789">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Permissões</label>
                            <select class="form-control" id="permissoesUsuario">
                                <option value="Todas">Todas</option>
                                <option value="Utilizadores, Conteúdo">Utilizadores, Conteúdo</option>
                                <option value="Financeiro">Financeiro</option>
                                <option value="Suporte">Suporte</option>
                                <option value="Conteúdo, Blog">Conteúdo, Blog</option>
                                <option value="Financeiro, Relatórios">Financeiro, Relatórios</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Senha <span class="required">*</span></label>
                            <input type="password" class="form-control" id="senhaUsuario" placeholder="********" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control" id="statusUsuario">
                            <option value="ativo">Ativo</option>
                            <option value="pendente">Pendente</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalNovoUsuario')">Cancelar</button>
                <button class="btn btn-primary" onclick="document.getElementById('formNovoUsuario').submit()">
                    <i class="fas fa-save"></i> Criar Administrador
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL CONFIRMAÇÃO                          -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacao">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacao')"></div>
        <div class="modal-content" style="max-width: 420px;">
            <div class="modal-header">
                <h3 class="modal-title" id="confirmacaoTitulo">
                    <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> Confirmar Ação
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacao')">&times;</button>
            </div>
            <div class="modal-body" id="confirmacaoCorpo">
                <p>Tem certeza que deseja realizar esta ação?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacao')">Cancelar</button>
                <button class="btn btn-danger" id="confirmacaoBtn" onclick="executarConfirmacao()">
                    <i class="fas fa-check"></i> Confirmar
                </button>
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

        // ==========================================
        // VARIÁVEIS DE SELEÇÃO
        // ==========================================
        let usuariosSelecionados = [];
        let paginaAtual = 1;
        let itensPorPagina = 10;

        // ==========================================
        // FILTROS
        // ==========================================

        function aplicarFiltros() {
            const search = document.getElementById('searchUser').value.toLowerCase().trim();
            const nivel = document.getElementById('filterPerfil').value;
            const status = document.getElementById('filterStatus').value;

            const rows = document.querySelectorAll('#tabelaUsuarios tbody tr');
            let visiveis = 0;

            rows.forEach(row => {
                const nome = row.dataset.nome || '';
                const email = row.dataset.email || '';
                const rowNivel = row.dataset.perfil || '';
                const rowStatus = row.dataset.status || '';

                let show = true;

                if (search) {
                    show = nome.includes(search) || email.includes(search);
                }

                if (show && nivel) {
                    show = rowNivel === nivel;
                }

                if (show && status) {
                    show = rowStatus === status;
                }

                row.style.display = show ? '' : 'none';
                if (show) visiveis++;
            });

            document.getElementById('resultadosInfo').textContent = `Mostrando ${visiveis} resultados`;
            document.getElementById('totalUsuariosBadge').textContent = visiveis;

            atualizarPaginacao(visiveis);
        }

        function limparFiltros() {
            document.getElementById('searchUser').value = '';
            document.getElementById('filterPerfil').value = '';
            document.getElementById('filterStatus').value = '';
            document.querySelectorAll('#tabelaUsuarios tbody tr').forEach(row => {
                row.style.display = '';
            });
            document.getElementById('resultadosInfo').textContent = `Mostrando <?php echo count($usuarios); ?> resultados`;
            document.getElementById('totalUsuariosBadge').textContent = <?php echo count($usuarios); ?>;
            atualizarPaginacao(<?php echo count($usuarios); ?>);
        }

        // ==========================================
        // PAGINAÇÃO
        // ==========================================

        function atualizarPaginacao(total) {
            const totalPaginas = Math.ceil(total / itensPorPagina);
            const container = document.getElementById('paginacao');

            const prevBtn = container.querySelector('.prev');
            const nextBtn = container.querySelector('.next');
            container.innerHTML = '';
            container.appendChild(prevBtn);

            for (let i = 1; i <= totalPaginas; i++) {
                const btn = document.createElement('button');
                btn.className = 'page-btn' + (i === paginaAtual ? ' active' : '');
                btn.dataset.page = i;
                btn.textContent = i;
                btn.onclick = function() {
                    irParaPagina(i);
                };
                container.appendChild(btn);
            }

            container.appendChild(nextBtn);

            prevBtn.disabled = paginaAtual <= 1 || totalPaginas <= 1;
            nextBtn.disabled = paginaAtual >= totalPaginas || totalPaginas <= 1;
        }

        function irParaPagina(page) {
            paginaAtual = page;
            const rows = document.querySelectorAll('#tabelaUsuarios tbody tr');
            const visiveis = Array.from(rows).filter(row => row.style.display !== 'none');
            const totalPaginas = Math.ceil(visiveis.length / itensPorPagina);

            if (page > totalPaginas) page = totalPaginas;
            if (page < 1) page = 1;
            paginaAtual = page;

            const start = (page - 1) * itensPorPagina;
            const end = start + itensPorPagina;

            visiveis.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });

            atualizarPaginacao(visiveis.length);
        }

        function mudarPagina(direcao) {
            if (direcao === 'prev' && paginaAtual > 1) {
                irParaPagina(paginaAtual - 1);
            } else if (direcao === 'next') {
                irParaPagina(paginaAtual + 1);
            }
        }

        // ==========================================
        // SELEÇÃO EM MASSA
        // ==========================================

        function selecionarTodos(checkbox) {
            const checkboxes = document.querySelectorAll('.select-item');
            checkboxes.forEach(cb => {
                cb.checked = checkbox.checked;
            });
            atualizarSelecao();
        }

        function atualizarSelecao() {
            const checkboxes = document.querySelectorAll('.select-item:checked');
            usuariosSelecionados = Array.from(checkboxes).map(cb => {
                const row = cb.closest('tr');
                return row ? parseInt(row.dataset.id) : null;
            }).filter(id => id !== null);

            const total = usuariosSelecionados.length;
            const selectAll = document.getElementById('selectAll');
            const allCheckboxes = document.querySelectorAll('.select-item');

            if (selectAll) {
                selectAll.checked = total === allCheckboxes.length && total > 0;
                selectAll.indeterminate = total > 0 && total < allCheckboxes.length;
            }

            const massActions = document.getElementById('massActions');
            const massCount = document.getElementById('massCount');

            if (total > 0) {
                massActions.style.display = 'flex';
                massCount.textContent = `${total} selecionado(s)`;
            } else {
                massActions.style.display = 'none';
            }
        }

        // ==========================================
        // AÇÕES DOS ADMINISTRADORES
        // ==========================================

        let acaoConfirmacao = null;

        function mostrarConfirmacao(titulo, mensagem, callback) {
            document.getElementById('confirmacaoTitulo').innerHTML = `
                <i class="fas fa-exclamation-triangle" style="color: #F59E0B;"></i> ${titulo}
            `;
            document.getElementById('confirmacaoCorpo').innerHTML = `<p>${mensagem}</p>`;
            document.getElementById('confirmacaoBtn').onclick = callback;
            document.getElementById('modalConfirmacao').classList.add('active');
        }

        function executarConfirmacao() {
            // O callback é executado diretamente pelo onclick do botão
        }

        function validarUsuario(id, nome) {
            mostrarConfirmacao(
                'Validar Administrador',
                `Tem certeza que deseja validar o administrador <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Administrador ${nome} validado com sucesso!`, 'success');

                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    if (row) {
                        const statusCell = row.querySelector('.status-badge');
                        statusCell.className = 'status-badge status-ativo';
                        statusCell.innerHTML = '<span class="status-dot"></span> Ativo';

                        const actions = row.querySelector('.action-buttons');
                        const validarBtn = actions.querySelector('.btn-success');
                        if (validarBtn) {
                            validarBtn.outerHTML = `
                                <a href="admin-suspender.php?id=${id}" class="btn btn-sm btn-warning" title="Suspender">
                                    <i class="fas fa-pause"></i>
                                </a>
                            `;
                        }

                        row.dataset.status = 'ativo';
                    }

                    fecharModal('modalConfirmacao');
                }
            );
        }

        function suspenderUsuario(id, nome) {
            mostrarConfirmacao(
                'Suspender Administrador',
                `Tem certeza que deseja suspender o administrador <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Administrador ${nome} suspenso com sucesso!`, 'warning');

                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    if (row) {
                        const statusCell = row.querySelector('.status-badge');
                        statusCell.className = 'status-badge status-inativo';
                        statusCell.innerHTML = '<span class="status-dot"></span> Inativo';

                        const actions = row.querySelector('.action-buttons');
                        const suspenderBtn = actions.querySelector('.btn-warning');
                        if (suspenderBtn) {
                            suspenderBtn.outerHTML = `
                                <button class="btn btn-sm btn-success" title="Ativar"
                                        onclick="ativarUsuario(${id}, '${nome}')">
                                    <i class="fas fa-play"></i>
                                </button>
                            `;
                        }

                        row.dataset.status = 'inativo';
                    }

                    fecharModal('modalConfirmacao');
                }
            );
        }

        function ativarUsuario(id, nome) {
            mostrarConfirmacao(
                'Ativar Administrador',
                `Tem certeza que deseja ativar o administrador <strong>${nome}</strong>?`,
                function() {
                    mostrarToast(`Administrador ${nome} ativado com sucesso!`, 'success');

                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    if (row) {
                        const statusCell = row.querySelector('.status-badge');
                        statusCell.className = 'status-badge status-ativo';
                        statusCell.innerHTML = '<span class="status-dot"></span> Ativo';

                        const actions = row.querySelector('.action-buttons');
                        const ativarBtn = actions.querySelector('.btn-success');
                        if (ativarBtn) {
                            ativarBtn.outerHTML = `
                                <a href="admin-suspender.php?id=${id}" class="btn btn-sm btn-warning" title="Suspender">
                                    <i class="fas fa-pause"></i>
                                </a>
                            `;
                        }

                        row.dataset.status = 'ativo';
                    }

                    fecharModal('modalConfirmacao');
                }
            );
        }

        // ==========================================
        // AÇÕES EM MASSA
        // ==========================================

        function ativarSelecionados() {
            if (usuariosSelecionados.length === 0) return;

            mostrarConfirmacao(
                'Ativar Administradores Selecionados',
                `Tem certeza que deseja ativar ${usuariosSelecionados.length} administrador(es)?`,
                function() {
                    usuariosSelecionados.forEach(id => {
                        const row = document.querySelector(`tr[data-id="${id}"]`);
                        if (row) {
                            const nome = row.querySelector('.user-info strong').textContent;
                            ativarUsuario(id, nome);
                        }
                    });
                    usuariosSelecionados = [];
                    atualizarSelecao();
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function suspenderSelecionados() {
            if (usuariosSelecionados.length === 0) return;

            mostrarConfirmacao(
                'Suspender Administradores Selecionados',
                `Tem certeza que deseja suspender ${usuariosSelecionados.length} administrador(es)?`,
                function() {
                    usuariosSelecionados.forEach(id => {
                        const row = document.querySelector(`tr[data-id="${id}"]`);
                        if (row) {
                            const nome = row.querySelector('.user-info strong').textContent;
                            suspenderUsuario(id, nome);
                        }
                    });
                    usuariosSelecionados = [];
                    atualizarSelecao();
                    fecharModal('modalConfirmacao');
                }
            );
        }

        function excluirSelecionados() {
            if (usuariosSelecionados.length === 0) return;

            mostrarConfirmacao(
                'Excluir Administradores Selecionados',
                `Tem certeza que deseja excluir permanentemente ${usuariosSelecionados.length} administrador(es)?<br><small style="color: #EF4444;">Esta ação não pode ser desfeita!</small>`,
                function() {
                    usuariosSelecionados.forEach(id => {
                        const row = document.querySelector(`tr[data-id="${id}"]`);
                        if (row) {
                            row.remove();
                        }
                    });
                    usuariosSelecionados = [];
                    atualizarSelecao();
                    aplicarFiltros();
                    mostrarToast('Administradores excluídos com sucesso!', 'error');
                    fecharModal('modalConfirmacao');
                }
            );
        }

        // ==========================================
        // MODAIS
        // ==========================================

        function abrirModal(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fecharModal(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = '';
        }

        // ==========================================
        // CRIAÇÃO DE ADMINISTRADOR
        // ==========================================

        function criarUsuario(event) {
            event.preventDefault();

            const nome = document.getElementById('nomeUsuario').value;
            const email = document.getElementById('emailUsuario').value;
            const nivel = document.getElementById('perfilUsuario').value;

            if (!nome || !email || !nivel) {
                mostrarToast('Preencha todos os campos obrigatórios!', 'error');
                return;
            }

            mostrarToast(`Administrador ${nome} criado com sucesso!`, 'success');
            fecharModal('modalNovoUsuario');
            document.getElementById('formNovoUsuario').reset();

            setTimeout(() => {
                location.reload();
            }, 1500);
        }

        // ==========================================
        // EXPORTAÇÃO E RELATÓRIOS
        // ==========================================

        function exportarUsuarios() {
            mostrarToast('Exportando lista de administradores...', 'info');
            setTimeout(() => {
                mostrarToast('Exportação concluída! O arquivo foi baixado.', 'success');
            }, 1500);
        }

        function enviarEmailMassa() {
            const selecionados = usuariosSelecionados.length;
            if (selecionados === 0) {
                mostrarToast('Selecione pelo menos um administrador para enviar email.', 'warning');
                return;
            }
            mostrarToast(`Enviando email para ${selecionados} administrador(es)...`, 'info');
            setTimeout(() => {
                mostrarToast(`Email enviado para ${selecionados} administrador(es)!`, 'success');
            }, 2000);
        }

        function gerarRelatorio() {
            mostrarToast('Gerando relatório de administradores...', 'info');
            setTimeout(() => {
                mostrarToast('Relatório gerado com sucesso!', 'success');
            }, 2000);
        }

        // ==========================================
        // INICIALIZAÇÃO
        // ==========================================

        document.addEventListener('DOMContentLoaded', function() {
            // Abrir modal via atributo data-modal
            document.querySelectorAll('[data-modal]').forEach(btn => {
                btn.addEventListener('click', function() {
                    const modalId = this.dataset.modal;
                    abrirModal(modalId);
                });
            });

            // Fechar modal com ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.modal.active').forEach(modal => {
                        fecharModal(modal.id);
                    });
                }
            });

            // Inicializar paginação
            const totalRows = document.querySelectorAll('#tabelaUsuarios tbody tr').length;
            atualizarPaginacao(totalRows);
        });
    </script>

    <style>
        /* ========================================== */
        /* PÁGINA DE UTILIZADORES - CSS ADICIONAL     */
        /* ========================================== */

        /* ===== FILTER BAR ===== */
        .filter-bar-admin {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 20px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            align-items: center;
        }

        .filter-bar-admin .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-bar-admin .filter-group label {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--text-muted);
            white-space: nowrap;
        }

        .filter-bar-admin .filter-group label i {
            color: var(--color-aurora);
        }

        .filter-bar-admin select,
        .filter-bar-admin input {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            padding: 6px 12px;
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            transition: var(--transition-smooth);
            min-width: 130px;
        }

        .filter-bar-admin select:focus,
        .filter-bar-admin input:focus {
            outline: none;
            border-color: var(--color-aurora);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.1);
        }

        .filter-bar-admin select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 32px;
        }

        .filter-bar-admin .filter-actions {
            display: flex;
            gap: 8px;
            margin-left: auto;
        }

        /* ===== QUICK ACTIONS BAR ===== */
        .quick-actions-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: var(--space-lg);
            padding: 12px 16px;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            align-items: center;
        }

        .quick-actions-bar .mass-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: auto;
            padding: 4px 12px;
            background: rgba(108, 43, 217, 0.08);
            border-radius: var(--radius-md);
            border: 1px solid rgba(108, 43, 217, 0.15);
        }

        .quick-actions-bar .mass-actions .mass-count {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--color-aurora);
            margin-right: 4px;
        }

        /* ===== PANEL ADMIN ===== */
        .panel-admin {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .panel-admin:hover {
            background: var(--bg-card-hover);
        }

        .panel-admin .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .panel-admin .panel-title {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            font-weight: 600;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .panel-admin .panel-title i {
            color: var(--color-aurora);
        }

        .panel-admin .panel-title .badge {
            margin-left: 8px;
        }

        .panel-admin .panel-actions .text-muted {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        /* ===== TABELA ===== */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-admin {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
        }

        .table-admin thead {
            background: var(--bg-input);
            border-radius: var(--radius-sm);
        }

        .table-admin thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
        }

        .table-admin tbody td {
            padding: 10px 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-admin tbody tr {
            transition: var(--transition-smooth);
        }

        .table-admin tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-admin tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== USER INFO NA TABELA ===== */
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border-color);
        }

        .user-info div {
            display: flex;
            flex-direction: column;
        }

        .user-info strong {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
        }

        .user-info .user-empresa {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ===== EMAIL E TELEFONE ===== */
        .user-email {
            display: block;
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .user-telefone {
            display: block;
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin-top: 2px;
        }

        .user-telefone i {
            margin-right: 4px;
            width: 14px;
        }

        /* ===== DATA INFO ===== */
        .data-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .data-info .data-registo,
        .data-info .ultimo-acesso {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .data-info .data-registo i,
        .data-info .ultimo-acesso i {
            margin-right: 4px;
            width: 14px;
        }

        /* ===== STATUS BADGE ===== */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 3px 12px;
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 500;
        }

        .status-badge .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .status-ativo {
            background: rgba(0, 255, 163, 0.12);
            color: var(--color-future-green);
        }

        .status-ativo .status-dot {
            background: var(--color-future-green);
        }

        .status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .status-pendente .status-dot {
            background: #FFD93D;
        }

        .status-inativo {
            background: rgba(255, 107, 107, 0.12);
            color: #FF6B6B;
        }

        .status-inativo .status-dot {
            background: #FF6B6B;
        }

        /* ===== ACTION BUTTONS ===== */
        .action-buttons {
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }

        .action-buttons .btn {
            padding: 4px 8px;
            font-size: var(--text-xs);
            min-width: 28px;
            height: 28px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ===== TABLE PAGINATION ===== */
        .table-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4px;
            padding: var(--space-md) 0 var(--space-sm);
            flex-wrap: wrap;
        }

        .table-pagination .page-btn {
            min-width: 32px;
            height: 32px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition-smooth);
            font-size: var(--text-sm);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table-pagination .page-btn:hover {
            border-color: var(--color-aurora);
            color: var(--color-aurora);
            background: rgba(108, 43, 217, 0.04);
        }

        .table-pagination .page-btn.active {
            background: var(--gradient-aurora);
            color: white;
            border-color: var(--color-aurora);
        }

        .table-pagination .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* ========================================== */
        /* MODAL - NOVO UTILIZADOR                    */
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
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            max-width: 580px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: var(--glass-shadow);
            border: 1px solid var(--border-color);
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
            color: var(--color-aurora);
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

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        /* ===== FORMULÁRIO ===== */
        .form-group {
            margin-bottom: 16px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 4px;
            font-size: var(--text-sm);
        }

        .form-label .required {
            color: #FF6B6B;
            margin-left: 2px;
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
        }

        .form-control:focus {
            outline: none;
            border-color: var(--color-aurora);
            box-shadow: 0 0 0 3px rgba(108, 43, 217, 0.08);
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7A8F' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            cursor: pointer;
        }

        /* ========================================== */
        /* RESPONSIVIDADE - PÁGINA DE UTILIZADORES    */
        /* ========================================== */

        @media (max-width: 1024px) {
            .filter-bar-admin {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-bar-admin .filter-group {
                width: 100%;
            }

            .filter-bar-admin select,
            .filter-bar-admin input {
                width: 100%;
                min-width: auto;
            }

            .filter-bar-admin .filter-actions {
                margin-left: 0;
                justify-content: flex-end;
            }

            .quick-actions-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .quick-actions-bar .mass-actions {
                margin-left: 0;
                justify-content: center;
                flex-wrap: wrap;
            }

            .quick-actions-bar .btn {
                justify-content: center;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .filter-bar-admin {
                padding: 12px 16px;
                gap: 8px;
            }

            .filter-bar-admin .filter-actions {
                flex-direction: column;
                gap: 6px;
            }

            .filter-bar-admin .filter-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .quick-actions-bar {
                padding: 10px 12px;
                gap: 6px;
            }

            .quick-actions-bar .mass-actions {
                flex-wrap: wrap;
                justify-content: center;
                padding: 6px 10px;
            }

            .quick-actions-bar .mass-actions .btn {
                font-size: var(--text-xs);
                padding: 3px 8px;
            }

            .panel-admin {
                padding: var(--space-md);
            }

            .panel-admin .panel-header {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-sm);
            }

            .table-admin thead th {
                padding: 8px 10px;
                font-size: var(--text-xs);
            }

            .table-admin tbody td {
                padding: 8px 10px;
            }

            .user-info img {
                width: 28px;
                height: 28px;
            }

            .user-info strong {
                font-size: var(--text-sm);
            }

            .action-buttons .btn {
                padding: 2px 6px;
                font-size: var(--text-xs);
                min-width: 24px;
                height: 24px;
            }

            .modal-content {
                width: 95%;
                margin: 10px;
            }

            .modal-header {
                padding: 14px 18px;
            }

            .modal-body {
                padding: 18px;
            }

            .modal-footer {
                padding: 12px 18px;
                flex-direction: column;
            }

            .modal-footer .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions-bar .mass-actions {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
            }

            .quick-actions-bar .mass-actions .btn {
                width: 100%;
                justify-content: center;
            }

            .table-pagination .page-btn {
                min-width: 28px;
                height: 28px;
                font-size: var(--text-xs);
            }

            .filter-bar-admin .filter-group {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-bar-admin .filter-group label {
                margin-bottom: 2px;
            }

            .data-info .data-registo,
            .data-info .ultimo-acesso {
                font-size: 0.6rem;
            }
        }
    </style>

</body>
</html>