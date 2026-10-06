/**
 * GeoNexus - Painel Institucional
 * JavaScript específico da Instituição
 * 
 * @version 1.0.0
 * @author GeoNexus Team
 */

'use strict';

const Institucional = {
    config: {
        toastDuration: 5000,
        tablePerPage: 15,
        refreshInterval: 30000
    },
    
    state: {
        notifications: [],
        currentPage: 1,
        loading: false,
        currentTurma: null
    },
    
    init() {
        console.log('[Institucional] Inicializando painel...');
        
        this.initSidebar();
        this.initNotifications();
        this.initDataTables();
        this.initCharts();
        this.initModals();
        this.initTooltips();
        this.initDropdowns();
        this.initCursos();
        this.initTurmas();
        this.initAlunos();
        this.initSetores();
        this.initCertificados();
        
        this.startNotificationPolling();
        this.bindEvents();
        
        console.log('[Institucional] Painel inicializado com sucesso!');
    },
    
    // ============================================
    // SIDEBAR
    // ============================================
    initSidebar() {
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.querySelector('.sidebar-overlay');
        
        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('open');
                if (overlay) overlay.classList.toggle('active');
            });
        }
        
        if (overlay) {
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
            });
        }
    },
    
    // ============================================
    // NOTIFICATIONS
    // ============================================
    initNotifications() {
        const btnNotif = document.querySelector('.btn-notificacoes');
        const dropdown = document.getElementById('notificacoesDropdown');
        
        if (btnNotif && dropdown) {
            btnNotif.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdown.classList.toggle('active');
                if (dropdown.classList.contains('active')) {
                    this.markNotificationsAsRead();
                }
            });
            
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) {
                    dropdown.classList.remove('active');
                }
            });
        }
    },
    
    markNotificationsAsRead() {
        fetch('/api/institucional/notificacoes-marcar-lidas.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const badge = document.querySelector('.btn-notificacoes .badge');
                if (badge) badge.style.display = 'none';
            }
        })
        .catch(error => console.error('[Institucional] Erro:', error));
    },
    
    startNotificationPolling() {
        setInterval(() => {
            this.checkNotifications();
        }, this.config.refreshInterval);
    },
    
    checkNotifications() {
        fetch('/api/institucional/verificar-notificacoes.php')
            .then(response => response.json())
            .then(data => {
                if (data.count > 0) {
                    this.updateNotificationBadge(data.count);
                    if (data.notifications) {
                        data.notifications.forEach(notif => {
                            this.showToast(notif.message, 'info');
                        });
                        this.playNotificationSound();
                    }
                }
            })
            .catch(error => console.error('[Institucional] Erro:', error));
    },
    
    updateNotificationBadge(count) {
        const badge = document.querySelector('.btn-notificacoes .badge');
        if (badge) {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
        }
    },
    
    playNotificationSound() {
        try {
            const audio = new Audio('/assets/sounds/notificacao.mp3');
            audio.play().catch(e => console.log('Erro ao tocar som:', e));
        } catch (e) {
            console.log('Erro ao reproduzir som:', e);
        }
    },
    
    // ============================================
    // DATA TABLES
    // ============================================
    initDataTables() {
        const tables = document.querySelectorAll('.table-data');
        tables.forEach(table => {
            this.setupTablePagination(table);
        });
    },
    
    setupTablePagination(table) {
        const tbody = table.querySelector('tbody');
        if (!tbody) return;
        
        const rows = tbody.querySelectorAll('tr');
        const perPage = parseInt(table.dataset.perPage) || this.config.tablePerPage;
        const totalPages = Math.ceil(rows.length / perPage);
        
        if (totalPages <= 1) return;
        
        const pagination = document.createElement('div');
        pagination.className = 'table-pagination';
        
        const prevBtn = document.createElement('button');
        prevBtn.className = 'page-btn prev';
        prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prevBtn.disabled = true;
        prevBtn.addEventListener('click', () => {
            const current = parseInt(pagination.dataset.current || 1);
            if (current > 1) {
                this.showTablePage(table, current - 1, perPage);
                pagination.dataset.current = current - 1;
                this.updatePaginationButtons(pagination, totalPages);
            }
        });
        pagination.appendChild(prevBtn);
        
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.className = 'page-btn';
            btn.textContent = i;
            btn.dataset.page = i;
            if (i === 1) btn.classList.add('active');
            
            btn.addEventListener('click', function() {
                const page = parseInt(this.dataset.page);
                Institucional.showTablePage(table, page, perPage);
                pagination.dataset.current = page;
                Institucional.updatePaginationButtons(pagination, totalPages);
            });
            
            pagination.appendChild(btn);
        }
        
        const nextBtn = document.createElement('button');
        nextBtn.className = 'page-btn next';
        nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
        nextBtn.addEventListener('click', () => {
            const current = parseInt(pagination.dataset.current || 1);
            if (current < totalPages) {
                this.showTablePage(table, current + 1, perPage);
                pagination.dataset.current = current + 1;
                this.updatePaginationButtons(pagination, totalPages);
            }
        });
        pagination.appendChild(nextBtn);
        
        pagination.dataset.current = 1;
        table.parentNode.appendChild(pagination);
        this.showTablePage(table, 1, perPage);
    },
    
    showTablePage(table, page, perPage) {
        const tbody = table.querySelector('tbody');
        const rows = tbody.querySelectorAll('tr');
        const start = (page - 1) * perPage;
        const end = start + perPage;
        
        rows.forEach((row, index) => {
            row.style.display = (index >= start && index < end) ? '' : 'none';
        });
    },
    
    updatePaginationButtons(pagination, totalPages) {
        const current = parseInt(pagination.dataset.current || 1);
        const buttons = pagination.querySelectorAll('.page-btn');
        
        buttons.forEach(btn => {
            btn.classList.remove('active');
            if (btn.dataset.page && parseInt(btn.dataset.page) === current) {
                btn.classList.add('active');
            }
        });
        
        const prevBtn = pagination.querySelector('.prev');
        const nextBtn = pagination.querySelector('.next');
        
        if (prevBtn) prevBtn.disabled = current <= 1;
        if (nextBtn) nextBtn.disabled = current >= totalPages;
    },
    
    // ============================================
    // CHARTS
    // ============================================
    initCharts() {
        if (typeof Chart === 'undefined') {
            console.warn('[Institucional] Chart.js não carregado');
            return;
        }
        
        this.initStudentsChart();
        this.initCoursesChart();
        this.initPerformanceChart();
    },
    
    initStudentsChart() {
        const canvas = document.getElementById('chartStudents');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const data = this.getChartData('students');
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels || ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Alunos',
                    data: data.values || [0, 0, 0, 0, 0, 0],
                    backgroundColor: 'rgba(249, 168, 37, 0.08)',
                    borderColor: '#F9A825',
                    borderWidth: 3,
                    pointBackgroundColor: '#F9A825',
                    pointRadius: 4,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 10 }
                    }
                }
            }
        });
    },
    
    initCoursesChart() {
        const canvas = document.getElementById('chartCourses');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const data = this.getChartData('courses');
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: data.labels || ['Engenharia', 'Topografia', 'GIS', 'Agricultura'],
                datasets: [{
                    data: data.values || [30, 25, 20, 15],
                    backgroundColor: ['#F9A825', '#FBC02D', '#F57F17', '#FFD54F'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    }
                },
                cutout: '65%'
            }
        });
    },
    
    initPerformanceChart() {
        const canvas = document.getElementById('chartPerformance');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const data = this.getChartData('performance');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels || ['Turma A', 'Turma B', 'Turma C', 'Turma D'],
                datasets: [{
                    label: 'Média',
                    data: data.values || [0, 0, 0, 0],
                    backgroundColor: ['#F9A825', '#FBC02D', '#F57F17', '#FFD54F'],
                    borderRadius: 6,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });
    },
    
    getChartData(type) {
        const mockData = {
            students: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                values: [120, 135, 150, 165, 180, 200]
            },
            courses: {
                labels: ['Engenharia', 'Topografia', 'GIS', 'Agricultura', 'Mineração'],
                values: [30, 25, 20, 15, 10]
            },
            performance: {
                labels: ['Turma A', 'Turma B', 'Turma C', 'Turma D'],
                values: [85, 78, 92, 70]
            }
        };
        
        return mockData[type] || { labels: [], values: [] };
    },
    
    // ============================================
    // CURSOS
    // ============================================
    initCursos() {
        this.loadCursos();
    },
    
    loadCursos() {
        fetch('/api/institucional/listar-cursos.php')
            .then(response => response.json())
            .then(data => {
                if (data.cursos) {
                    this.renderCursos(data.cursos);
                }
            })
            .catch(error => console.error('[Institucional] Erro ao carregar cursos:', error));
    },
    
    renderCursos(cursos) {
        const container = document.querySelector('.cursos-container');
        if (!container) return;
        
        container.innerHTML = cursos.map(curso => `
            <div class="curso-card-institucional">
                <div class="curso-header">
                    <div class="curso-icon">
                        <i class="fas ${curso.icone || 'fa-graduation-cap'}"></i>
                    </div>
                    <div class="curso-info">
                        <h4>${curso.nome}</h4>
                        <span>${curso.duracao || '4 Semestres'}</span>
                    </div>
                </div>
                <div class="curso-body">
                    <p>${curso.descricao || 'Curso de formação profissional'}</p>
                    <div class="curso-stats">
                        <span><i class="fas fa-users"></i> ${curso.alunos || 0} alunos</span>
                        <span><i class="fas fa-chalkboard-teacher"></i> ${curso.professores || 0} professores</span>
                    </div>
                </div>
                <div class="curso-footer">
                    <button class="btn btn-sm btn-outline" onclick="Institucional.verCurso(${curso.id})">
                        <i class="fas fa-eye"></i> Ver
                    </button>
                    <button class="btn btn-sm btn-outline" onclick="Institucional.editarCurso(${curso.id})">
                        <i class="fas fa-edit"></i> Editar
                    </button>
                </div>
            </div>
        `).join('');
    },
    
    verCurso(id) {
        this.showToast(`Visualizando curso ${id}`, 'info');
    },
    
    editarCurso(id) {
        this.showToast(`Editando curso ${id}`, 'info');
    },
    
    // ============================================
    // TURMAS
    // ============================================
    initTurmas() {
        this.loadTurmas();
    },
    
    loadTurmas() {
        fetch('/api/institucional/listar-turmas.php')
            .then(response => response.json())
            .then(data => {
                if (data.turmas) {
                    this.renderTurmas(data.turmas);
                }
            })
            .catch(error => console.error('[Institucional] Erro ao carregar turmas:', error));
    },
    
    renderTurmas(turmas) {
        const container = document.querySelector('.turmas-container');
        if (!container) return;
        
        container.innerHTML = turmas.map(turma => `
            <div class="turma-item-institucional" onclick="Institucional.verTurma(${turma.id})">
                <div class="turma-info">
                    <h5>${turma.nome}</h5>
                    <span>${turma.curso || 'Curso não definido'}</span>
                    <span class="turma-periodo">${turma.periodo || 'Manhã'}</span>
                </div>
                <div class="turma-stats">
                    <span><i class="fas fa-users"></i> ${turma.alunos || 0}</span>
                    <span class="turma-status badge badge-${turma.status === 'ativa' ? 'success' : 'danger'}">
                        ${turma.status === 'ativa' ? 'Ativa' : 'Inativa'}
                    </span>
                </div>
            </div>
        `).join('');
    },
    
    verTurma(id) {
        this.state.currentTurma = id;
        this.loadTurmaDetalhes(id);
    },
    
    loadTurmaDetalhes(id) {
        fetch(`/api/institucional/turma-detalhes.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    this.showTurmaModal(data);
                }
            })
            .catch(error => console.error('[Institucional] Erro ao carregar turma:', error));
    },
    
    showTurmaModal(data) {
        // Abrir modal com detalhes da turma
        this.showToast(`Turma: ${data.nome} - ${data.alunos} alunos`, 'info');
    },
    
    // ============================================
    // ALUNOS
    // ============================================
    initAlunos() {
        this.loadAlunos();
    },
    
    loadAlunos() {
        fetch('/api/institucional/listar-alunos.php')
            .then(response => response.json())
            .then(data => {
                if (data.alunos) {
                    this.renderAlunos(data.alunos);
                }
            })
            .catch(error => console.error('[Institucional] Erro ao carregar alunos:', error));
    },
    
    renderAlunos(alunos) {
        const container = document.querySelector('.alunos-container');
        if (!container) return;
        
        container.innerHTML = alunos.map(aluno => `
            <div class="aluno-card-institucional">
                <div class="aluno-avatar">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="aluno-info">
                    <h5>${aluno.nome}</h5>
                    <span>${aluno.curso || 'Curso não definido'}</span>
                    <div class="aluno-progresso">
                        <div class="progresso-bar" style="width: ${aluno.progresso || 0}%"></div>
                    </div>
                    <span class="aluno-progresso-text">${aluno.progresso || 0}% concluído</span>
                </div>
                <div class="aluno-actions">
                    <button class="btn btn-sm btn-outline" onclick="Institucional.verAluno(${aluno.id})">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        `).join('');
    },
    
    verAluno(id) {
        this.showToast(`Visualizando aluno ${id}`, 'info');
    },
    
    // ============================================
    // SETORES
    // ============================================
    initSetores() {
        this.loadSetores();
    },
    
    loadSetores() {
        fetch('/api/institucional/listar-setores.php')
            .then(response => response.json())
            .then(data => {
                if (data.setores) {
                    this.renderSetores(data.setores);
                }
            })
            .catch(error => console.error('[Institucional] Erro ao carregar setores:', error));
    },
    
    renderSetores(setores) {
        const container = document.querySelector('.setores-container');
        if (!container) return;
        
        container.innerHTML = setores.map(setor => `
            <div class="setor-turma-item" style="border-color: ${setor.cor || '#F9A825'}">
                <span class="setor-color" style="background: ${setor.cor || '#F9A825'}"></span>
                <div class="setor-info">
                    <h5>${setor.nome}</h5>
                    <span>${setor.descricao || 'Setor de atuação'}</span>
                </div>
                <div class="setor-actions">
                    <button class="btn btn-sm btn-outline" onclick="Institucional.configurarSetor(${setor.id})">
                        <i class="fas fa-cog"></i>
                    </button>
                </div>
            </div>
        `).join('');
    },
    
    configurarSetor(id) {
        this.showToast(`Configurando setor ${id}`, 'info');
    },
    
    // ============================================
    // CERTIFICADOS
    // ============================================
    initCertificados() {
        this.loadCertificados();
    },
    
    loadCertificados() {
        fetch('/api/institucional/listar-certificados.php')
            .then(response => response.json())
            .then(data => {
                if (data.certificados) {
                    this.renderCertificados(data.certificados);
                }
            })
            .catch(error => console.error('[Institucional] Erro ao carregar certificados:', error));
    },
    
    renderCertificados(certificados) {
        const container = document.querySelector('.certificados-container');
        if (!container) return;
        
        container.innerHTML = certificados.map(cert => `
            <div class="certificado-card">
                <i class="fas fa-certificate"></i>
                <h5>${cert.nome}</h5>
                <p>${cert.aluno || 'Aluno'}</p>
                <span class="certificado-data">${this.formatDate(cert.data_emissao)}</span>
                <button class="btn btn-sm btn-primary" onclick="Institucional.baixarCertificado(${cert.id})">
                    <i class="fas fa-download"></i> Baixar
                </button>
            </div>
        `).join('');
    },
    
    baixarCertificado(id) {
        this.showToast(`Baixando certificado ${id}...`, 'success');
    },
    
    // ============================================
    // TOAST NOTIFICATIONS
    // ============================================
    showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;
        
        const icons = {
            success: 'fa-check-circle',
            error: 'fa-exclamation-circle',
            warning: 'fa-exclamation-triangle',
            info: 'fa-info-circle'
        };
        
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <div class="toast-content">
                <i class="fas ${icons[type] || icons.info}"></i>
                <span>${message}</span>
            </div>
            <button class="toast-close">&times;</button>
        `;
        
        container.appendChild(toast);
        
        setTimeout(() => {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, this.config.toastDuration);
        
        toast.querySelector('.toast-close').addEventListener('click', () => {
            toast.remove();
        });
    },
    
    // ============================================
    // MODALS
    // ============================================
    initModals() {
        document.querySelectorAll('[data-modal]').forEach(trigger => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                const modalId = trigger.dataset.modal;
                const modal = document.getElementById(modalId);
                if (modal) this.openModal(modal);
            });
        });
        
        document.querySelectorAll('.modal-close, .modal-overlay').forEach(el => {
            el.addEventListener('click', () => {
                const modal = el.closest('.modal');
                if (modal) this.closeModal(modal);
            });
        });
        
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const openModal = document.querySelector('.modal.active');
                if (openModal) this.closeModal(openModal);
            }
        });
    },
    
    openModal(modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    },
    
    closeModal(modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    },
    
    // ============================================
    // TOOLTIPS
    // ============================================
    initTooltips() {
        document.querySelectorAll('[data-tooltip]').forEach(el => {
            el.addEventListener('mouseenter', (e) => {
                const tooltip = document.createElement('div');
                tooltip.className = 'tooltip-custom';
                tooltip.textContent = el.dataset.tooltip;
                document.body.appendChild(tooltip);
                
                const rect = el.getBoundingClientRect();
                tooltip.style.top = (rect.top - tooltip.offsetHeight - 8) + 'px';
                tooltip.style.left = (rect.left + rect.width/2 - tooltip.offsetWidth/2) + 'px';
                tooltip.style.opacity = '1';
                
                el.addEventListener('mouseleave', () => {
                    tooltip.remove();
                }, { once: true });
            });
        });
    },
    
    // ============================================
    // DROPDOWNS
    // ============================================
    initDropdowns() {
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            const trigger = dropdown.querySelector('.dropdown-trigger');
            const menu = dropdown.querySelector('.dropdown-menu');
            
            if (trigger && menu) {
                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    dropdown.classList.toggle('open');
                });
                
                document.addEventListener('click', () => {
                    dropdown.classList.remove('open');
                });
            }
        });
    },
    
    // ============================================
    // BIND EVENTS
    // ============================================
    bindEvents() {
        document.querySelectorAll('[data-refresh]').forEach(btn => {
            btn.addEventListener('click', () => {
                this.showToast('Dados atualizados com sucesso!', 'success');
            });
        });
    },
    
    // ============================================
    // UTILITY FUNCTIONS
    // ============================================
    formatCurrency(value) {
        return new Intl.NumberFormat('pt-AO', {
            style: 'currency',
            currency: 'AOA',
            minimumFractionDigits: 2
        }).format(value);
    },
    
    formatDate(date) {
        return new Intl.DateTimeFormat('pt-AO', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric'
        }).format(new Date(date));
    },
    
    formatDateTime(date) {
        return new Intl.DateTimeFormat('pt-AO', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }).format(new Date(date));
    }
};

// ============================================
// INITIALIZE ON DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    Institucional.init();
});