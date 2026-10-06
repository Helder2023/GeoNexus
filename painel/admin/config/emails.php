<?php
// painel/admin/config/emails.php - Gestão de Templates de Email
include "../../../includes/notificacoes-config-count.php";

// ===== DEFINIÇÃO DA PÁGINA =====
$titulo_pagina = 'Templates de Email';
$pagina_atual = 'emails';
$pagina_atual_sidebar = $pagina_atual;

// ===== DADOS MOCKADOS - TEMPLATES DE EMAIL =====
$templates = [
    [
        'id' => 1,
        'nome' => 'Bem-vindo',
        'assunto' => 'Bem-vindo ao GeoNexus!',
        'descricao' => 'Email enviado quando um novo utilizador se regista na plataforma.',
        'categoria' => 'Onboarding',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-15 14:30:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'email', 'link_ativacao', 'plano']
    ],
    [
        'id' => 2,
        'nome' => 'Confirmação de Email',
        'assunto' => 'Confirme o seu endereço de email',
        'descricao' => 'Email enviado para confirmar o endereço de email do utilizador.',
        'categoria' => 'Onboarding',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-14 10:20:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'link_confirmacao']
    ],
    [
        'id' => 3,
        'nome' => 'Reset de Palavra-passe',
        'assunto' => 'Redefinição de palavra-passe',
        'descricao' => 'Email enviado quando o utilizador solicita a redefinição da palavra-passe.',
        'categoria' => 'Segurança',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-12 09:00:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'link_reset', 'ip']
    ],
    [
        'id' => 4,
        'nome' => 'Notificação de Pagamento',
        'assunto' => 'Pagamento confirmado - GeoNexus',
        'descricao' => 'Email enviado quando um pagamento é confirmado com sucesso.',
        'categoria' => 'Financeiro',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-16 16:45:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'valor', 'referencia', 'data', 'plano']
    ],
    [
        'id' => 5,
        'nome' => 'Lembrete de Pagamento',
        'assunto' => 'Lembrete: Pagamento pendente',
        'descricao' => 'Email enviado como lembrete para pagamentos pendentes.',
        'categoria' => 'Financeiro',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-13 11:30:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'valor', 'vencimento', 'plano']
    ],
    [
        'id' => 6,
        'nome' => 'Fatura Emitida',
        'assunto' => 'Nova fatura disponível',
        'descricao' => 'Email enviado quando uma nova fatura é emitida para o cliente.',
        'categoria' => 'Financeiro',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-11 08:00:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'fatura_id', 'valor', 'vencimento']
    ],
    [
        'id' => 7,
        'nome' => 'Assinatura Cancelada',
        'assunto' => 'Assinatura cancelada',
        'descricao' => 'Email enviado quando uma assinatura é cancelada pelo cliente.',
        'categoria' => 'Assinaturas',
        'status' => 'inativo',
        'status_label' => 'Inativo',
        'ultima_modificacao' => '2026-01-20 15:00:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'plano', 'data_cancelamento']
    ],
    [
        'id' => 8,
        'nome' => 'Renovação de Assinatura',
        'assunto' => 'Assinatura renovada com sucesso',
        'descricao' => 'Email enviado quando uma assinatura é renovada automaticamente.',
        'categoria' => 'Assinaturas',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-10 13:20:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'plano', 'proximo_pagamento']
    ],
    [
        'id' => 9,
        'nome' => 'Novo Projeto Atribuído',
        'assunto' => 'Novo projeto atribuído',
        'descricao' => 'Email enviado quando um novo projeto é atribuído a um utilizador.',
        'categoria' => 'Projetos',
        'status' => 'ativo',
        'status_label' => 'Ativo',
        'ultima_modificacao' => '2026-02-09 10:00:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'projeto_nome', 'cliente']
    ],
    [
        'id' => 10,
        'nome' => 'Relatório Gerado',
        'assunto' => 'Relatório disponível para download',
        'descricao' => 'Email enviado quando um relatório é gerado e está disponível.',
        'categoria' => 'Relatórios',
        'status' => 'pendente',
        'status_label' => 'Pendente',
        'ultima_modificacao' => '2026-02-18 09:00:00',
        'modificado_por' => 'Administrador',
        'variaveis' => ['nome', 'relatorio_nome', 'link_download']
    ],
];

$total_templates = count($templates);
$templates_ativos = count(array_filter($templates, function ($t) {
    return $t['status'] === 'ativo';
}));
$templates_inativos = count(array_filter($templates, function ($t) {
    return $t['status'] === 'inativo';
}));
$templates_pendentes = count(array_filter($templates, function ($t) {
    return $t['status'] === 'pendente';
}));

// ===== FUNÇÕES AUXILIARES =====
function formatDate($date)
{
    if (empty($date)) return 'N/A';
    return date('d/m/Y H:i', strtotime($date));
}

function getStatusIcon($status)
{
    $icons = [
        'ativo' => 'fa-check-circle',
        'pendente' => 'fa-clock',
        'inativo' => 'fa-times-circle'
    ];
    return $icons[$status] ?? 'fa-circle';
}

function getCategoriaIcon($categoria)
{
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
                        <i class="fas fa-envelope icon" style="color: #00D2FF;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Configurações</a>
                        <span class="separator">/</span>
                        <span>Templates de Email</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>
                    <div class="header-actions">
                        <a href="email-criar.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Novo Template
                        </a>
                        <button class="btn btn-outline" onclick="window.location.reload()">
                            <i class="fas fa-sync-alt"></i> Atualizar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid">
                <div class="stat-card" style="border-left: 3px solid #00D2FF;">
                    <div class="icon blue"><i class="fas fa-list"></i></div>
                    <div class="value"><?php echo $total_templates; ?></div>
                    <div class="label">Total de Templates</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #00FFA3;">
                    <div class="icon green"><i class="fas fa-check-circle"></i></div>
                    <div class="value"><?php echo $templates_ativos; ?></div>
                    <div class="label">Ativos</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FFD93D;">
                    <div class="icon yellow"><i class="fas fa-clock"></i></div>
                    <div class="value"><?php echo $templates_pendentes; ?></div>
                    <div class="label">Pendentes</div>
                </div>
                <div class="stat-card" style="border-left: 3px solid #FF6B6B;">
                    <div class="icon red"><i class="fas fa-times-circle"></i></div>
                    <div class="value"><?php echo $templates_inativos; ?></div>
                    <div class="label">Inativos</div>
                </div>
            </section>

            <!-- ===== FILTROS ===== -->
            <div class="filtros-container">
                <div class="filtros-grid">
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-search"></i> Buscar</label>
                        <input type="text" class="form-control" id="searchEmail" placeholder="Nome ou descrição..." onkeyup="filtrarEmails()">
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-tag"></i> Status</label>
                        <select class="form-control" id="filtroStatus" onchange="filtrarEmails()">
                            <option value="todos">Todos os status</option>
                            <option value="ativo">Ativo</option>
                            <option value="pendente">Pendente</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                    <div class="filtro-group">
                        <label class="filtro-label"><i class="fas fa-layer-group"></i> Categoria</label>
                        <select class="form-control" id="filtroCategoria" onchange="filtrarEmails()">
                            <option value="todos">Todas as categorias</option>
                            <option value="Onboarding">Onboarding</option>
                            <option value="Segurança">Segurança</option>
                            <option value="Financeiro">Financeiro</option>
                            <option value="Assinaturas">Assinaturas</option>
                            <option value="Projetos">Projetos</option>
                            <option value="Relatórios">Relatórios</option>
                        </select>
                    </div>
                    <div class="filtro-group filtro-actions">
                        <button class="btn btn-outline" onclick="limparFiltros()">
                            <i class="fas fa-times"></i> Limpar
                        </button>
                        <span class="resultados-count" id="resultadosCount"><?php echo $total_templates; ?> resultados</span>
                    </div>
                </div>
            </div>

            <!-- ===== TABELA DE TEMPLATES ===== -->
            <div class="emails-container">
                <div class="section-header">
                    <h3><i class="fas fa-envelope"></i> Lista de Templates</h3>
                    <div class="section-actions">
                        <span class="emails-total">Total: <strong><?php echo $total_templates; ?> templates</strong></span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-emails" id="tabelaEmails">
                        <thead>
                            <tr>
                                <th>Template</th>
                                <th>Assunto</th>
                                <th>Categoria</th>
                                <th>Variáveis</th>
                                <th>Status</th>
                                <th>Última Modificação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="emailsBody">
                            <?php foreach ($templates as $template): ?>
                                <tr data-status="<?php echo $template['status']; ?>"
                                    data-categoria="<?php echo strtolower($template['categoria']); ?>"
                                    data-nome="<?php echo strtolower($template['nome']); ?>"
                                    data-desc="<?php echo strtolower($template['descricao']); ?>">
                                    <td>
                                        <div class="email-info">
                                            <span class="email-nome"><?php echo $template['nome']; ?></span>
                                            <span class="email-desc"><?php echo $template['descricao']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="email-assunto"><?php echo $template['assunto']; ?></span>
                                    </td>
                                    <td>
                                        <span class="badge-categoria <?php echo strtolower($template['categoria']); ?>">
                                            <i class="fas <?php echo getCategoriaIcon($template['categoria']); ?>"></i>
                                            <?php echo $template['categoria']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php foreach ($template['variaveis'] as $var): ?>
                                            <span class="badge-variavel">{{ <?php echo $var; ?> }}</span>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <span class="badge-status status-<?php echo $template['status']; ?>">
                                            <i class="fas <?php echo getStatusIcon($template['status']); ?>"></i>
                                            <?php echo $template['status_label']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="data-cell">
                                            <span class="data-principal"><?php echo formatDate($template['ultima_modificacao']); ?></span>
                                            <span class="data-hora" style="font-size: var(--text-xs); color: var(--text-muted);">
                                                por <?php echo $template['modificado_por']; ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="email-visualizar.php?id=<?php echo $template['id']; ?>" class="btn" title="Visualizar">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="email-editar.php?id=<?php echo $template['id']; ?>" class="btn" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn" title="Testar" onclick="testarEmail(<?php echo $template['id']; ?>)">
                                                <i class="fas fa-paper-plane"></i>
                                            </a>
                                            <?php if ($template['status'] === 'inativo' || $template['status'] === 'pendente'): ?>
                                                <a href="#" class="btn btn-success" title="Ativar" onclick="ativarTemplate(<?php echo $template['id']; ?>)">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                            <?php elseif ($template['status'] === 'ativo'): ?>
                                                <a href="#" class="btn btn-danger" title="Desativar" onclick="desativarTemplate(<?php echo $template['id']; ?>)">
                                                    <i class="fas fa-pause"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- ===== PAGINAÇÃO ===== -->
                <div class="paginacao-container">
                    <div class="paginacao-info">
                        Mostrando <strong id="paginacaoInicio">1</strong> - <strong id="paginacaoFim"><?php echo min(10, $total_templates); ?></strong> de <strong id="paginacaoTotal"><?php echo $total_templates; ?></strong> templates
                    </div>
                    <div class="paginacao-controles" id="paginacaoControles">
                        <button class="btn" id="paginaAnterior" onclick="mudarPagina(-1)" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <span class="pagina-atual" id="paginaAtual">1 / <?php echo ceil($total_templates / 10); ?></span>
                        <button class="btn" id="paginaProxima" onclick="mudarPagina(1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="paginacao-por-pagina">
                        <label>Por página:</label>
                        <select id="itensPorPagina" onchange="mudarItensPorPagina()">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
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

            inicializarPaginacao();
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
        // FILTRAR EMAILS
        // ==========================================
        function filtrarEmails() {
            const search = document.getElementById('searchEmail').value.toLowerCase();
            const status = document.getElementById('filtroStatus').value;
            const categoria = document.getElementById('filtroCategoria').value;

            const rows = document.querySelectorAll('#emailsBody tr');
            let visiveis = 0;

            rows.forEach(row => {
                const nome = row.dataset.nome || '';
                const desc = row.dataset.desc || '';
                const rowStatus = row.dataset.status || '';
                const rowCategoria = row.dataset.categoria || '';

                let mostrar = true;

                if (search) {
                    const match = nome.includes(search) || desc.includes(search);
                    if (!match) mostrar = false;
                }

                if (status !== 'todos' && rowStatus !== status) mostrar = false;
                if (categoria !== 'todos' && rowCategoria !== categoria.toLowerCase()) mostrar = false;

                row.style.display = mostrar ? '' : 'none';
                if (mostrar) visiveis++;
            });

            document.getElementById('resultadosCount').textContent = visiveis + ' resultados';
            paginaAtual = 1;
            atualizarPaginacao();
        }

        function limparFiltros() {
            document.getElementById('searchEmail').value = '';
            document.getElementById('filtroStatus').value = 'todos';
            document.getElementById('filtroCategoria').value = 'todos';
            filtrarEmails();
        }

        // ==========================================
        // PAGINAÇÃO
        // ==========================================
        let paginaAtual = 1;
        let itensPorPagina = 10;

        function inicializarPaginacao() {
            atualizarPaginacao();
        }

        function atualizarPaginacao() {
            const rows = document.querySelectorAll('#emailsBody tr');
            const visiveis = Array.from(rows).filter(row => row.style.display !== 'none');
            const total = visiveis.length;
            const totalPaginas = Math.ceil(total / itensPorPagina) || 1;

            if (paginaAtual > totalPaginas) paginaAtual = totalPaginas;
            if (paginaAtual < 1) paginaAtual = 1;

            const inicio = (paginaAtual - 1) * itensPorPagina;
            const fim = Math.min(inicio + itensPorPagina, total);

            rows.forEach((row) => {
                const visivel = row.style.display !== 'none';
                if (visivel) {
                    const posicao = visiveis.indexOf(row);
                    row.style.display = (posicao >= inicio && posicao < fim) ? '' : 'none';
                }
            });

            document.getElementById('paginacaoInicio').textContent = total > 0 ? inicio + 1 : 0;
            document.getElementById('paginacaoFim').textContent = total > 0 ? fim : 0;
            document.getElementById('paginacaoTotal').textContent = total;
            document.getElementById('paginaAtual').textContent = paginaAtual + ' / ' + totalPaginas;

            document.getElementById('paginaAnterior').disabled = paginaAtual <= 1;
            document.getElementById('paginaProxima').disabled = paginaAtual >= totalPaginas;
        }

        function mudarPagina(direcao) {
            const total = document.querySelectorAll('#emailsBody tr:not([style*="display: none"])').length;
            const totalPaginas = Math.ceil(total / itensPorPagina) || 1;

            const novaPagina = paginaAtual + direcao;
            if (novaPagina < 1 || novaPagina > totalPaginas) return;

            paginaAtual = novaPagina;
            atualizarPaginacao();
        }

        function mudarItensPorPagina() {
            itensPorPagina = parseInt(document.getElementById('itensPorPagina').value);
            paginaAtual = 1;
            atualizarPaginacao();
        }

        // ==========================================
        // AÇÕES DOS TEMPLATES
        // ==========================================
        function testarEmail(id) {
            mostrarToast('A enviar email de teste...', 'info');
            setTimeout(() => {
                mostrarToast('Email de teste enviado com sucesso!', 'success');
            }, 1500);
        }

        function ativarTemplate(id) {
            if (confirm('Tem certeza que deseja ativar este template?')) {
                mostrarToast('Template ativado com sucesso!', 'success');
                setTimeout(() => location.reload(), 1500);
            }
        }

        function desativarTemplate(id) {
            if (confirm('Tem certeza que deseja desativar este template?')) {
                mostrarToast('Template desativado com sucesso!', 'warning');
                setTimeout(() => location.reload(), 1500);
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
        /* EMAILS - CSS COMPLETO                      */
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
        .emails-container {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            margin-bottom: var(--space-lg);
        }

        .emails-container:hover {
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

        .stat-card .icon.yellow {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
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
            grid-template-columns: 2fr 1fr 1fr auto;
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

        /* ===== TABELA ===== */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: 0;
            padding: 0;
        }

        .table-emails {
            width: 100%;
            border-collapse: collapse;
            font-size: var(--text-sm);
            min-width: 900px;
        }

        .table-emails thead {
            background: var(--bg-input);
        }

        .table-emails thead th {
            color: var(--text-muted);
            font-weight: 600;
            font-size: var(--text-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 10px 14px;
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .table-emails tbody td {
            padding: 8px 14px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-emails tbody tr:hover {
            background: var(--bg-card-hover);
        }

        .table-emails tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== EMAIL INFO ===== */
        .email-info {
            display: flex;
            flex-direction: column;
        }

        .email-nome {
            font-weight: 600;
            color: var(--text-primary);
        }

        .email-desc {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .email-assunto {
            font-size: var(--text-xs);
            color: var(--text-muted);
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

        .badge-variavel {
            display: inline-block;
            padding: 1px 6px;
            border-radius: var(--radius-full);
            font-size: 8px;
            font-weight: 500;
            background: rgba(0, 210, 255, 0.1);
            color: #00D2FF;
            margin: 1px;
            font-family: 'Courier New', monospace;
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
            min-width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
        }

        .action-buttons .btn:hover {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .action-buttons .btn-success {
            border-color: rgba(0, 255, 163, 0.3);
            color: #00FFA3;
        }

        .action-buttons .btn-success:hover {
            border-color: #00FFA3;
            color: #00FFA3;
            background: rgba(0, 255, 163, 0.1);
        }

        .action-buttons .btn-danger {
            border-color: rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
        }

        .action-buttons .btn-danger:hover {
            border-color: #FF6B6B;
            color: #FF6B6B;
            background: rgba(255, 107, 107, 0.1);
        }

        /* ===== SECTION HEADER ===== */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .section-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .section-header h3 i {
            color: #00D2FF;
        }

        .section-actions {
            display: flex;
            gap: var(--space-sm);
            align-items: center;
        }

        .emails-total {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .emails-total strong {
            color: #00D2FF;
            font-weight: 700;
        }

        /* ========================================== */
        /* PAGINAÇÃO                                 */
        /* ========================================== */

        .paginacao-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: var(--space-lg);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .paginacao-info {
            font-size: var(--text-sm);
            color: var(--text-secondary);
        }

        .paginacao-info strong {
            color: var(--text-primary);
        }

        .paginacao-controles {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .paginacao-controles .btn {
            padding: 4px 12px;
            min-width: 36px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            background: transparent;
            color: var(--text-secondary);
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .paginacao-controles .btn:hover:not(:disabled) {
            background: var(--bg-card-hover);
            border-color: var(--text-primary);
            color: var(--text-primary);
        }

        .paginacao-controles .btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .pagina-atual {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-primary);
            min-width: 80px;
            text-align: center;
        }

        .paginacao-por-pagina {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .paginacao-por-pagina label {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .paginacao-por-pagina select {
            width: 60px;
            padding: 4px 8px;
            font-size: var(--text-xs);
            min-height: 30px;
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-sm);
            color: var(--text-primary);
            font-family: var(--font-body);
            cursor: pointer;
        }

        .paginacao-por-pagina select:focus {
            outline: none;
            border-color: #00D2FF;
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

        @media (max-width: 992px) {
            .table-emails {
                min-width: 700px;
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

            .paginacao-container {
                flex-direction: column;
                align-items: stretch;
                gap: var(--space-sm);
            }

            .paginacao-controles {
                justify-content: center;
            }

            .paginacao-por-pagina {
                justify-content: center;
            }

            .table-emails {
                min-width: 600px;
            }

            .emails-container {
                padding: var(--space-sm);
            }

            .filtros-container {
                padding: var(--space-sm);
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-sm);
            }

            .stat-card .value {
                font-size: var(--text-h3);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .emails-container {
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

            .action-buttons .btn {
                padding: 4px 6px;
                min-width: 26px;
                height: 26px;
                font-size: 10px;
            }

            .table-emails tbody td {
                padding: 6px 8px;
                font-size: var(--text-xs);
            }

            .table-emails thead th {
                padding: 8px 8px;
                font-size: 9px;
            }

            .paginacao-container {
                gap: var(--space-xs);
            }

            .paginacao-info {
                font-size: var(--text-xs);
                text-align: center;
            }

            .paginacao-controles .btn {
                min-width: 32px;
                height: 28px;
                font-size: var(--text-xs);
                padding: 2px 8px;
            }

            .pagina-atual {
                min-width: 60px;
                font-size: var(--text-xs);
            }

            .paginacao-por-pagina select {
                width: 50px;
                min-height: 26px;
                font-size: 10px;
                padding: 2px 6px;
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