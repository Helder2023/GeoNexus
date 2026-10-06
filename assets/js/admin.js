/**
 * GeoNexus - Painel Admin
 * JavaScript específico do Super Admin
 * 
 * @version 1.0.0
 * @author GeoNexus Team
 */

'use strict';

// ============================================
// ADMIN GLOBAL OBJECT
// ============================================
const Admin = {
    // Configurações
    config: {
        toastDuration: 5000,
        tablePerPage: 15,
        refreshInterval: 30000
    },
    
    // Estado
    state: {
        notifications: [],
        currentPage: 1,
        loading: false
    },
    
    // ============================================
    // INITIALIZATION
    // ============================================
    init() {
        console.log('[Admin] Inicializando painel Admin...');
        
        // Inicializar componentes
        this.initSidebar();
        this.initNotifications();
        this.initDataTables();
        this.initFilters();
        this.initCharts();
        this.initModals();
        this.initTooltips();
        this.initDropdowns();
        
        // Iniciar polling de notificações
        this.startNotificationPolling();
        
        // Event Listeners
        this.bindEvents();
        
        console.log('[Admin] Painel Admin inicializado com sucesso!');
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
                if (overlay) {
                    overlay.classList.toggle('active');
                }
            });
        }
        
        // Fechar sidebar ao clicar no overlay
        if (overlay) {
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
            });
        }
        
        // Fechar sidebar em resize para desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768 && sidebar) {
                sidebar.classList.remove('open');
                if (overlay) {
                    overlay.classList.remove('active');
                }
            }
        });
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
            
            // Fechar dropdown ao clicar fora
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target) && !btnNotif.contains(e.target)) {
                    dropdown.classList.remove('active');
                }
            });
        }
    },
    
    markNotificationsAsRead() {
        fetch('/api/admin/notificacoes-marcar-lidas.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const badge = document.querySelector('.btn-notificacoes .badge');
                if (badge) {
                    badge.style.display = 'none';
                }
            }
        })
        .catch(error => console.error('[Admin] Erro ao marcar notificações:', error));
    },
    
    startNotificationPolling() {
        setInterval(() => {
            this.checkNotifications();
        }, this.config.refreshInterval);
    },
    
    checkNotifications() {
        fetch('/api/admin/verificar-notificacoes.php')
            .then(response => response.json())
            .then(data => {
                if (data.count > 0) {
                    this.updateNotificationBadge(data.count);
                    if (data.notifications && data.notifications.length > 0) {
                        data.notifications.forEach(notif => {
                            this.showToast(notif.message, 'info');
                        });
                        this.playNotificationSound();
                    }
                }
            })
            .catch(error => console.error('[Admin] Erro ao verificar notificações:', error));
    },
    
    updateNotificationBadge(count) {
        const badge = document.querySelector('.btn-notificacoes .badge');
        if (badge) {
            if (count > 0) {
                badge.textContent = count;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        }
    },
    
    playNotificationSound() {
        try {
            const audio = new Audio('/assets/sounds/notificacao.mp3');
            audio.play().catch(e => console.log('[Admin] Erro ao tocar som:', e));
        } catch (e) {
            console.log('[Admin] Erro ao reproduzir som:', e);
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
        
        // Criar controles de paginação
        const pagination = document.createElement('div');
        pagination.className = 'table-pagination';
        
        // Botão Anterior
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
        
        // Botões de página
        for (let i = 1; i <= totalPages; i++) {
            const btn = document.createElement('button');
            btn.className = 'page-btn';
            btn.textContent = i;
            btn.dataset.page = i;
            
            if (i === 1) {
                btn.classList.add('active');
            }
            
            btn.addEventListener('click', () => {
                const page = parseInt(this.dataset.page);
                this.showTablePage(table, page, perPage);
                pagination.dataset.current = page;
                this.updatePaginationButtons(pagination, totalPages);
            });
            
            pagination.appendChild(btn);
        }
        
        // Botão Próximo
        const nextBtn = document.createElement('button');
        nextBtn.className = 'page-btn next';
        nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
        if (totalPages <= 1) nextBtn.disabled = true;
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
        
        // Mostrar primeira página
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
        
        // Atualizar navegação
        const prevBtn = pagination.querySelector('.prev');
        const nextBtn = pagination.querySelector('.next');
        
        if (prevBtn) {
            prevBtn.disabled = current <= 1;
        }
        if (nextBtn) {
            nextBtn.disabled = current >= totalPages;
        }
    },
    
    // ============================================
    // FILTERS
    // ============================================
    initFilters() {
        const filters = document.querySelectorAll('.filter-bar-admin select, .filter-bar-admin input');
        filters.forEach(filter => {
            filter.addEventListener('change', () => {
                this.applyFilters();
            });
        });
    },
    
    applyFilters() {
        const filters = document.querySelectorAll('.filter-bar-admin select, .filter-bar-admin input');
        const filterData = {};
        
        filters.forEach(filter => {
            if (filter.value) {
                filterData[filter.name || filter.id] = filter.value;
            }
        });
        
        // Disparar evento de filtro
        const event = new CustomEvent('admin-filter', { detail: filterData });
        document.dispatchEvent(event);
    },
    
    // ============================================
    // CHARTS
    // ============================================
    initCharts() {
        if (typeof Chart === 'undefined') {
            console.warn('[Admin] Chart.js não carregado');
            return;
        }
        
        // Gráfico de Faturamento
        this.initRevenueChart();
        
        // Gráfico de Utilizadores
        this.initUsersChart();
        
        // Gráfico de Setores
        this.initSectorsChart();
    },
    
    initRevenueChart() {
        const canvas = document.getElementById('chartRevenue');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const data = this.getChartData('revenue');
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels || ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Faturamento (Kz)',
                    data: data.values || [0, 0, 0, 0, 0, 0],
                    backgroundColor: 'rgba(108, 43, 217, 0.08)',
                    borderColor: '#6C2BD9',
                    borderWidth: 3,
                    pointBackgroundColor: '#6C2BD9',
                    pointRadius: 4,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Kz ' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    },
    
    initUsersChart() {
        const canvas = document.getElementById('chartUsers');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const data = this.getChartData('users');
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Individuais', 'Empresas', 'Instituições', 'Clientes'],
                datasets: [{
                    data: data.values || [25, 30, 15, 10],
                    backgroundColor: [
                        '#2ECC71',
                        '#E63946',
                        '#F9A825',
                        '#00BCD4'
                    ],
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
    
    initSectorsChart() {
        const canvas = document.getElementById('chartSectors');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const data = this.getChartData('sectors');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels || ['Topografia', 'Engenharia', 'GIS', 'Agricultura', 'Mineração'],
                datasets: [{
                    label: 'Projetos',
                    data: data.values || [0, 0, 0, 0, 0],
                    backgroundColor: [
                        '#E87A2E',
                        '#F6AD55',
                        '#00BCD4',
                        '#2E7D32',
                        '#E65100'
                    ],
                    borderRadius: 6,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    },
    
    getChartData(type) {
        // Dados mock - substituir por dados reais da API
        const mockData = {
            revenue: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                values: [150000, 180000, 220000, 200000, 250000, 300000, 280000, 320000, 350000, 380000, 420000, 450000]
            },
            users: {
                values: [35, 28, 18, 12]
            },
            sectors: {
                labels: ['Topografia', 'Engenharia', 'GIS', 'Agricultura', 'Mineração', 'Petróleo', 'Energia'],
                values: [12, 18, 8, 15, 6, 4, 10]
            }
        };
        
        return mockData[type] || { labels: [], values: [] };
    },
    
    // ============================================
    // MODALS
    // ============================================
    initModals() {
        // Abrir modals
        document.querySelectorAll('[data-modal]').forEach(trigger => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                const modalId = trigger.dataset.modal;
                const modal = document.getElementById(modalId);
                if (modal) {
                    this.openModal(modal);
                }
            });
        });
        
        // Fechar modals
        document.querySelectorAll('.modal-close, .modal-overlay').forEach(el => {
            el.addEventListener('click', () => {
                const modal = el.closest('.modal');
                if (modal) {
                    this.closeModal(modal);
                }
            });
        });
        
        // Fechar modal com ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const openModal = document.querySelector('.modal.active');
                if (openModal) {
                    this.closeModal(openModal);
                }
            }
        });
    },
    
    openModal(modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Animação de entrada
        const content = modal.querySelector('.modal-content');
        if (content) {
            content.style.animation = 'slideUp 0.3s ease';
        }
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
                
                // Fechar ao clicar fora
                document.addEventListener('click', () => {
                    dropdown.classList.remove('open');
                });
            }
        });
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
        
        // Animação de entrada
        requestAnimationFrame(() => {
            toast.style.transform = 'translateX(0)';
            toast.style.opacity = '1';
        });
        
        // Auto-fechar
        setTimeout(() => {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, this.config.toastDuration);
        
        // Fechar ao clicar no X
        toast.querySelector('.toast-close').addEventListener('click', () => {
            toast.remove();
        });
    },
    
    // ============================================
    // CONFIRM DIALOG
    // ============================================
    confirmAction(message, callback) {
        const modal = document.createElement('div');
        modal.className = 'modal confirm-modal active';
        modal.innerHTML = `
            <div class="modal-overlay"></div>
            <div class="modal-content" style="max-width: 420px;">
                <div class="modal-header">
                    <h3 class="modal-title">
                        <i class="fas fa-exclamation-triangle" style="color: #EF4444;"></i>
                        Confirmar Ação
                    </h3>
                </div>
                <div class="modal-body">
                    <p>${message}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline btn-cancel">Cancelar</button>
                    <button class="btn btn-danger btn-confirm">Confirmar</button>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        document.body.style.overflow = 'hidden';
        
        modal.querySelector('.btn-cancel').addEventListener('click', () => {
            modal.remove();
            document.body.style.overflow = '';
        });
        
        modal.querySelector('.btn-confirm').addEventListener('click', () => {
            modal.remove();
            document.body.style.overflow = '';
            if (typeof callback === 'function') {
                callback();
            }
        });
        
        // Fechar com ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                modal.remove();
                document.body.style.overflow = '';
            }
        }, { once: true });
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
    },
    
    timeAgo(date) {
        const now = new Date();
        const past = new Date(date);
        const diff = Math.floor((now - past) / 1000);
        
        if (diff < 60) return 'há ' + diff + ' segundos';
        if (diff < 3600) return 'há ' + Math.floor(diff / 60) + ' minutos';
        if (diff < 86400) return 'há ' + Math.floor(diff / 3600) + ' horas';
        if (diff < 604800) return 'há ' + Math.floor(diff / 86400) + ' dias';
        
        return this.formatDate(date);
    },
    
    // ============================================
    // BIND EVENTS
    // ============================================
    bindEvents() {
        // Filtros com debounce
        let filterTimeout;
        document.addEventListener('admin-filter', (e) => {
            clearTimeout(filterTimeout);
            filterTimeout = setTimeout(() => {
                console.log('[Admin] Aplicando filtros:', e.detail);
                // Aqui viria a chamada à API para filtrar os dados
            }, 300);
        });
        
        // Refresh manual
        document.querySelectorAll('[data-refresh]').forEach(btn => {
            btn.addEventListener('click', () => {
                this.showToast('Dados atualizados com sucesso!', 'success');
            });
        });
    }
};

// ============================================
// INITIALIZE ON DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    Admin.init();
});

// ============================================
// EXPORT FOR MODULE USAGE
// ============================================
if (typeof module !== 'undefined' && module.exports) {
    module.exports = Admin;
}