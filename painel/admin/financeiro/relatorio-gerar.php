<?php
// painel/admin/financeiro/relatorio-gerar.php - Gerar Relatório
include "../../../includes/notificacoes-financeiro-count.php";

// ===== DEFINIÇÃO DA PÁGINA ATUAL =====
$titulo_pagina = 'Gerar Relatório';
$pagina_atual = 'relatorio-gerar';

// Dados mockados - Estatísticas Financeiras
$stats = [
    'assinaturas_ativas' => 156,
    'pagamentos_pendentes' => 23,
    'faturas_emitidas' => 342,
    'comissoes_pendentes' => 15000,
];

// ===== FUNÇÕES AUXILIARES =====
function formatMoney($value) {
    return number_format($value, 0, ',', '.');
}

// Verificar página atual para o sidebar
$pagina_atual_sidebar = $pagina_atual;
?>
<!DOCTYPE html>
<html lang="pt">
<?php include "../../../includes/admin-financeiro-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- ========================================== -->
        <!-- SIDEBAR FINANCEIRO                         -->
        <!-- ========================================== -->
        <?php include "../../../includes/admin-financeiro-sidebar.php"; ?>

        <!-- ========================================== -->
        <!-- MAIN CONTENT                              -->
        <!-- ========================================== -->
        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-file-alt icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../../../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <a href="relatorios-financeiros.php">Relatórios</a>
                        <span class="separator">/</span>
                        <span>Gerar</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                                        <?php include "../../../includes/notificacoes-finaceiro.php" ?>


                    <div class="header-actions">
                        <button class="btn btn-outline" onclick="window.location.reload()">
                            <i class="fas fa-sync-alt"></i> Atualizar
                        </button>
                    </div>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- FORMULÁRIO DE GERAÇÃO                     -->
            <!-- ========================================== -->
            <div class="gerar-container">
                <div class="gerar-grid">
                    <!-- Coluna Principal -->
                    <div class="gerar-coluna-principal">
                        <!-- Card: Configurações do Relatório -->
                        <div class="gerar-card">
                            <div class="gerar-card-header">
                                <h3><i class="fas fa-sliders-h"></i> Configurações do Relatório</h3>
                            </div>
                            <div class="gerar-card-body">
                                <form id="formGerarRelatorio" onsubmit="gerarRelatorio(event)">
                                    
                                    <!-- Tipo de Relatório -->
                                    <div class="form-group">
                                        <label class="form-label">Tipo de Relatório <span class="required">*</span></label>
                                        <select class="form-control" id="tipoRelatorio" required>
                                            <option value="">Selecione o tipo...</option>
                                            <option value="financeiro">Financeiro</option>
                                            <option value="vendas">Vendas</option>
                                            <option value="clientes">Clientes</option>
                                            <option value="assinaturas">Assinaturas</option>
                                            <option value="pagamentos">Pagamentos</option>
                                            <option value="faturas">Faturas</option>
                                            <option value="comissoes">Comissões</option>
                                            <option value="personalizado">Personalizado</option>
                                        </select>
                                    </div>

                                    <!-- Período -->
                                    <div class="form-group">
                                        <label class="form-label">Período <span class="required">*</span></label>
                                        <select class="form-control" id="periodoRelatorio" required onchange="toggleDatasPersonalizadas()">
                                            <option value="hoje">Hoje</option>
                                            <option value="ontem">Ontem</option>
                                            <option value="ultima_semana">Última Semana</option>
                                            <option value="ultimo_mes">Último Mês</option>
                                            <option value="ultimo_trimestre">Último Trimestre</option>
                                            <option value="ultimo_semestre">Último Semestre</option>
                                            <option value="ultimo_ano">Último Ano</option>
                                            <option value="personalizado">Personalizado</option>
                                        </select>
                                    </div>

                                    <!-- Datas Personalizadas -->
                                    <div class="form-row datas-personalizadas" id="datasPersonalizadas" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label">Data Início</label>
                                            <input type="date" class="form-control" id="dataInicio">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Data Fim</label>
                                            <input type="date" class="form-control" id="dataFim">
                                        </div>
                                    </div>

                                    <!-- Formato -->
                                    <div class="form-group">
                                        <label class="form-label">Formato <span class="required">*</span></label>
                                        <div class="formato-grid">
                                            <label class="formato-option">
                                                <input type="radio" name="formato" value="pdf" checked>
                                                <div class="formato-card">
                                                    <i class="fas fa-file-pdf" style="color: #FF6B6B;"></i>
                                                    <span>PDF</span>
                                                </div>
                                            </label>
                                            <label class="formato-option">
                                                <input type="radio" name="formato" value="excel">
                                                <div class="formato-card">
                                                    <i class="fas fa-file-excel" style="color: #00B894;"></i>
                                                    <span>Excel</span>
                                                </div>
                                            </label>
                                            <label class="formato-option">
                                                <input type="radio" name="formato" value="csv">
                                                <div class="formato-card">
                                                    <i class="fas fa-file-csv" style="color: #2E86DE;"></i>
                                                    <span>CSV</span>
                                                </div>
                                            </label>
                                            <label class="formato-option">
                                                <input type="radio" name="formato" value="print">
                                                <div class="formato-card">
                                                    <i class="fas fa-print" style="color: #6C2BD9;"></i>
                                                    <span>Imprimir</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Opções Adicionais -->
                                    <div class="form-group">
                                        <label class="form-label">Opções Adicionais</label>
                                        <div class="opcoes-grid">
                                            <label class="opcao-checkbox">
                                                <input type="checkbox" id="incluirGraficos" checked>
                                                <span>Incluir Gráficos</span>
                                            </label>
                                            <label class="opcao-checkbox">
                                                <input type="checkbox" id="incluirTabelas" checked>
                                                <span>Incluir Tabelas</span>
                                            </label>
                                            <label class="opcao-checkbox">
                                                <input type="checkbox" id="incluirResumo" checked>
                                                <span>Incluir Resumo</span>
                                            </label>
                                            <label class="opcao-checkbox">
                                                <input type="checkbox" id="incluirLogo">
                                                <span>Incluir Logo</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Observações -->
                                    <div class="form-group">
                                        <label class="form-label">Observações</label>
                                        <textarea class="form-control" id="observacoes" rows="3" 
                                                  placeholder="Observações adicionais para o relatório..."></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Coluna Lateral -->
                    <div class="gerar-coluna-lateral">
                        <!-- Card: Resumo da Configuração -->
                        <div class="gerar-card">
                            <div class="gerar-card-header">
                                <h3><i class="fas fa-info-circle"></i> Resumo</h3>
                            </div>
                            <div class="gerar-card-body">
                                <div class="resumo-item">
                                    <span class="resumo-label">Tipo</span>
                                    <span class="resumo-value" id="resumoTipo">—</span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Período</span>
                                    <span class="resumo-value" id="resumoPeriodo">—</span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Formato</span>
                                    <span class="resumo-value" id="resumoFormato">PDF</span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Gráficos</span>
                                    <span class="resumo-value" id="resumoGraficos">Sim</span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Tabelas</span>
                                    <span class="resumo-value" id="resumoTabelas">Sim</span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Resumo</span>
                                    <span class="resumo-value" id="resumoResumo">Sim</span>
                                </div>
                                <div class="resumo-item">
                                    <span class="resumo-label">Data Geração</span>
                                    <span class="resumo-value"><?php echo date('d/m/Y H:i'); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Ações -->
                        <div class="gerar-card">
                            <div class="gerar-card-header">
                                <h3><i class="fas fa-tools"></i> Ações</h3>
                            </div>
                            <div class="gerar-card-body">
                                <div class="acoes-lista">
                                    <button class="btn btn-primary" style="width: 100%; justify-content: center;" onclick="document.getElementById('formGerarRelatorio').submit()">
                                        <i class="fas fa-file-export"></i> Gerar Relatório
                                    </button>
                                    <button class="btn btn-outline" style="width: 100%; justify-content: center;" onclick="limparFormulario()">
                                        <i class="fas fa-undo"></i> Limpar
                                    </button>
                                    <a href="relatorios-financeiros.php" class="btn btn-outline" style="width: 100%; justify-content: center;">
                                        <i class="fas fa-arrow-left"></i> Voltar
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Relatórios Recentes -->
                        <div class="gerar-card">
                            <div class="gerar-card-header">
                                <h3><i class="fas fa-history"></i> Relatórios Recentes</h3>
                            </div>
                            <div class="gerar-card-body">
                                <div class="relatorios-recentes">
                                    <div class="relatorio-recente">
                                        <i class="fas fa-file-pdf" style="color: #FF6B6B;"></i>
                                        <div>
                                            <span class="relatorio-nome">Relatório Financeiro 2025</span>
                                            <span class="relatorio-data">15/02/2025</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline" onclick="baixarRelatorio('Relatório Financeiro 2025')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </div>
                                    <div class="relatorio-recente">
                                        <i class="fas fa-file-excel" style="color: #00B894;"></i>
                                        <div>
                                            <span class="relatorio-nome">Vendas Mensais</span>
                                            <span class="relatorio-data">10/02/2025</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline" onclick="baixarRelatorio('Vendas Mensais')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </div>
                                    <div class="relatorio-recente">
                                        <i class="fas fa-file-pdf" style="color: #FF6B6B;"></i>
                                        <div>
                                            <span class="relatorio-nome">Assinaturas Ativas</span>
                                            <span class="relatorio-data">05/02/2025</span>
                                        </div>
                                        <button class="btn btn-sm btn-outline" onclick="baixarRelatorio('Assinaturas Ativas')">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        // TOGGLE DATAS PERSONALIZADAS
        // ==========================================
        function toggleDatasPersonalizadas() {
            const periodo = document.getElementById('periodoRelatorio').value;
            const datasDiv = document.getElementById('datasPersonalizadas');
            
            if (periodo === 'personalizado') {
                datasDiv.style.display = 'grid';
            } else {
                datasDiv.style.display = 'none';
            }
            
            atualizarResumo();
        }

        // ==========================================
        // ATUALIZAR RESUMO
        // ==========================================
        function atualizarResumo() {
            const tipo = document.getElementById('tipoRelatorio');
            const periodo = document.getElementById('periodoRelatorio');
            const formatos = document.querySelectorAll('input[name="formato"]');
            const graficos = document.getElementById('incluirGraficos');
            const tabelas = document.getElementById('incluirTabelas');
            const resumo = document.getElementById('incluirResumo');
            
            const tipoTexto = tipo.options[tipo.selectedIndex]?.text || '—';
            const periodoTexto = periodo.options[periodo.selectedIndex]?.text || '—';
            
            let formatoTexto = 'PDF';
            formatos.forEach(f => {
                if (f.checked) {
                    formatoTexto = f.parentElement.querySelector('.formato-card span').textContent;
                }
            });
            
            document.getElementById('resumoTipo').textContent = tipoTexto;
            document.getElementById('resumoPeriodo').textContent = periodoTexto;
            document.getElementById('resumoFormato').textContent = formatoTexto;
            document.getElementById('resumoGraficos').textContent = graficos.checked ? 'Sim' : 'Não';
            document.getElementById('resumoTabelas').textContent = tabelas.checked ? 'Sim' : 'Não';
            document.getElementById('resumoResumo').textContent = resumo.checked ? 'Sim' : 'Não';
        }

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
                    document.querySelectorAll('.modal.active').forEach(modal => {
                        fecharModal(modal.id);
                    });
                }
            });

            // Atualizar resumo ao mudar campos
            document.getElementById('tipoRelatorio').addEventListener('change', atualizarResumo);
            document.getElementById('periodoRelatorio').addEventListener('change', atualizarResumo);
            document.querySelectorAll('input[name="formato"]').forEach(el => {
                el.addEventListener('change', atualizarResumo);
            });
            document.getElementById('incluirGraficos').addEventListener('change', atualizarResumo);
            document.getElementById('incluirTabelas').addEventListener('change', atualizarResumo);
            document.getElementById('incluirResumo').addEventListener('change', atualizarResumo);

            // Inicializar resumo
            atualizarResumo();
        });

        // ==========================================
        // TOGGLE SIDEBAR MOBILE
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
                    icon.className = sidebar.classList.contains('open') ? 'fas fa-times' : 'fas fa-bars';
                }
            }
        }

        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.getElementById('bottomMenuToggle');

            if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('open')) {
                if (!sidebar.contains(e.target) && !menuBtn?.contains(e.target)) {
                    sidebar.classList.remove('open');
                    document.getElementById('sidebarOverlay')?.classList.remove('active');
                    if (menuBtn) {
                        const icon = menuBtn.querySelector('i');
                        if (icon) icon.className = 'fas fa-bars';
                    }
                }
            }
        });

        // ==========================================
        // NOTIFICAÇÕES
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
                badge.textContent = naoLidas;
                badge.style.display = naoLidas > 0 ? 'flex' : 'none';
            }

            if (bottomBadge) {
                bottomBadge.textContent = naoLidas;
                bottomBadge.style.display = naoLidas > 0 ? 'flex' : 'none';
            }
        }

        function closeNotifications() {
            const dropdown = document.getElementById('notificacoesDropdown');
            if (dropdown) {
                dropdown.classList.remove('active');
            }
        }

        // ==========================================
        // PERFIL
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
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    const themeLabel = document.querySelector('.perfil-dropdown .theme-toggle');
                    if (themeLabel) {
                        themeLabel.innerHTML = newTheme === 'dark' ?
                            '<i class="fas fa-moon"></i> Tema Escuro' :
                            '<i class="fas fa-sun"></i> Tema Claro';
                    }

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

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

        // ==========================================
        // GERAR RELATÓRIO
        // ==========================================
        function gerarRelatorio(event) {
            event.preventDefault();

            const tipo = document.getElementById('tipoRelatorio').value;
            const periodo = document.getElementById('periodoRelatorio').value;
            const formato = document.querySelector('input[name="formato"]:checked');

            if (!tipo) {
                mostrarToast('Por favor, selecione o tipo de relatório.', 'error');
                document.getElementById('tipoRelatorio').focus();
                return;
            }

            if (!periodo) {
                mostrarToast('Por favor, selecione o período.', 'error');
                document.getElementById('periodoRelatorio').focus();
                return;
            }

            if (!formato) {
                mostrarToast('Por favor, selecione o formato.', 'error');
                return;
            }

            const formatoLabel = formato.parentElement.querySelector('.formato-card span').textContent;
            const periodoTexto = document.getElementById('periodoRelatorio').options[document.getElementById('periodoRelatorio').selectedIndex].text;

            mostrarToast('A gerar relatório...', 'info');

            setTimeout(() => {
                mostrarToast('Relatório gerado com sucesso! (' + formatoLabel + ')', 'success');
                setTimeout(() => {
                    window.location.href = 'relatorios-financeiros.php';
                }, 1500);
            }, 2000);
        }

        // ==========================================
        // LIMPAR FORMULÁRIO
        // ==========================================
        function limparFormulario() {
            document.getElementById('tipoRelatorio').value = '';
            document.getElementById('periodoRelatorio').value = 'ultimo_ano';
            document.querySelector('input[name="formato"][value="pdf"]').checked = true;
            document.getElementById('incluirGraficos').checked = true;
            document.getElementById('incluirTabelas').checked = true;
            document.getElementById('incluirResumo').checked = true;
            document.getElementById('incluirLogo').checked = false;
            document.getElementById('observacoes').value = '';
            document.getElementById('dataInicio').value = '';
            document.getElementById('dataFim').value = '';
            document.getElementById('datasPersonalizadas').style.display = 'none';
            
            mostrarToast('Formulário limpo', 'info');
            atualizarResumo();
        }

        // ==========================================
        // BAIXAR RELATÓRIO RECENTE
        // ==========================================
        function baixarRelatorio(nome) {
            mostrarToast('A baixar ' + nome + '...', 'info');
            setTimeout(() => {
                mostrarToast(nome + ' baixado com sucesso!', 'success');
            }, 1500);
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

        function abrirModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }
    </script>

    <style>
        /* ========================================== */
        /* GERAR RELATÓRIO - CSS                      */
        /* ========================================== */

        /* ===== CONTAINER ===== */
        .gerar-container {
            margin-bottom: var(--space-lg);
        }

        .gerar-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: var(--space-lg);
        }

        /* ===== CARDS ===== */
        .gerar-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            overflow: hidden;
            margin-bottom: var(--space-lg);
            transition: var(--transition-smooth);
        }

        .gerar-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .gerar-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .gerar-card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
        }

        .gerar-card-header h3 i {
            color: #FFD93D;
        }

        .gerar-card-body {
            padding: 20px;
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
        }

        .form-control:focus {
            outline: none;
            border-color: #FFD93D;
            box-shadow: 0 0 0 3px rgba(255, 217, 61, 0.1);
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

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
            font-family: var(--font-body);
        }

        /* ===== FORMATO GRID ===== */
        .formato-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-sm);
        }

        .formato-option {
            cursor: pointer;
        }

        .formato-option input {
            display: none;
        }

        .formato-option input:checked + .formato-card {
            border-color: #FFD93D;
            background: rgba(255, 217, 61, 0.08);
            transform: translateY(-2px);
            box-shadow: var(--glass-shadow);
        }

        .formato-option input:checked + .formato-card i {
            transform: scale(1.1);
        }

        .formato-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 12px 8px;
            border: 2px solid var(--border-color);
            border-radius: var(--radius-sm);
            transition: var(--transition-smooth);
            background: var(--bg-input);
            gap: 4px;
        }

        .formato-card:hover {
            border-color: var(--text-muted);
        }

        .formato-card i {
            font-size: 24px;
            transition: var(--transition-smooth);
        }

        .formato-card span {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* ===== OPÇÕES GRID ===== */
        .opcoes-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-sm);
        }

        .opcao-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-size: var(--text-sm);
            color: var(--text-secondary);
            padding: 4px 0;
        }

        .opcao-checkbox input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #FFD93D;
            cursor: pointer;
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

        /* ===== AÇÕES ===== */
        .acoes-lista {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .acoes-lista .btn {
            justify-content: center;
        }

        /* ===== RELATÓRIOS RECENTES ===== */
        .relatorios-recentes {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .relatorio-recente {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: 8px 12px;
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .relatorio-recente:hover {
            border-color: var(--text-muted);
        }

        .relatorio-recente i {
            font-size: 20px;
            flex-shrink: 0;
        }

        .relatorio-recente div {
            flex: 1;
        }

        .relatorio-nome {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 500;
            display: block;
        }

        .relatorio-data {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */

        @media (max-width: 1024px) {
            .gerar-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: var(--space-sm);
            }

            .formato-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .opcoes-grid {
                grid-template-columns: 1fr;
            }

            .gerar-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: var(--space-sm);
            }

            .header-actions {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .page-header h1 {
                font-size: var(--text-h3);
                flex-wrap: wrap;
            }

            .relatorio-recente {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .gerar-card-body {
                padding: 14px;
            }

            .gerar-card-header {
                padding: 12px 14px;
            }

            .formato-grid {
                grid-template-columns: 1fr 1fr;
                gap: var(--space-xs);
            }

            .formato-card {
                padding: 8px 4px;
            }

            .formato-card i {
                font-size: 18px;
            }

            .formato-card span {
                font-size: 10px;
            }
        }
    </style>
</body>
</html>