/**
 * GeoNexus - Painel Empresarial
 * JavaScript específico da Empresa
 * 
 * @version 1.0.0
 * @author GeoNexus Team
 */

'use strict';

const Empresarial = {
    config: {
        toastDuration: 5000,
        tablePerPage: 15,
        refreshInterval: 30000,
        chatPollingInterval: 5000
    },
    
    state: {
        notifications: [],
        currentPage: 1,
        loading: false,
        chatActive: null,
        chatMessages: []
    },
    
    init() {
        console.log('[Empresarial] Inicializando painel...');
        
        this.initSidebar();
        this.initNotifications();
        this.initDataTables();
        this.initCharts();
        this.initModals();
        this.initTooltips();
        this.initDropdowns();
        this.initChat();
        this.initRH();
        this.initCRM();
        
        this.startNotificationPolling();
        this.bindEvents();
        
        console.log('[Empresarial] Painel inicializado com sucesso!');
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
        fetch('/api/empresarial/notificacoes-marcar-lidas.php', {
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
        .catch(error => console.error('[Empresarial] Erro:', error));
    },
    
    startNotificationPolling() {
        setInterval(() => {
            this.checkNotifications();
        }, this.config.refreshInterval);
    },
    
    checkNotifications() {
        fetch('/api/empresarial/verificar-notificacoes.php')
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
            .catch(error => console.error('[Empresarial] Erro:', error));
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
            
            if (i === 1) btn.classList.add('active');
            
            btn.addEventListener('click', function() {
                const page = parseInt(this.dataset.page);
                Empresarial.showTablePage(table, page, perPage);
                pagination.dataset.current = page;
                Empresarial.updatePaginationButtons(pagination, totalPages);
            });
            
            pagination.appendChild(btn);
        }
        
        // Botão Próximo
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
            console.warn('[Empresarial] Chart.js não carregado');
            return;
        }
        
        this.initRevenueChart();
        this.initProjectsChart();
        this.initTeamChart();
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
                    backgroundColor: 'rgba(230, 57, 70, 0.08)',
                    borderColor: '#E63946',
                    borderWidth: 3,
                    pointBackgroundColor: '#E63946',
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
    
    initProjectsChart() {
        const canvas = document.getElementById('chartProjects');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const data = this.getChartData('projects');
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Em Andamento', 'Concluídos', 'Pendentes'],
                datasets: [{
                    data: data.values || [15, 10, 5],
                    backgroundColor: ['#E63946', '#2ECC71', '#F39C12'],
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
    
    initTeamChart() {
        const canvas = document.getElementById('chartTeam');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const data = this.getChartData('team');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels || ['Departamento A', 'Departamento B', 'Departamento C'],
                datasets: [{
                    label: 'Funcionários',
                    data: data.values || [0, 0, 0],
                    backgroundColor: ['#E63946', '#F6AD55', '#3498DB'],
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
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    },
    
    getChartData(type) {
        const mockData = {
            revenue: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                values: [50000, 65000, 72000, 80000, 95000, 110000]
            },
            projects: {
                values: [15, 10, 5]
            },
            team: {
                labels: ['Engenharia', 'Topografia', 'GIS', 'Administração'],
                values: [12, 8, 5, 6]
            }
        };
        
        return mockData[type] || { labels: [], values: [] };
    },
    
    // ============================================
    // CHAT
    // ============================================
    initChat() {
        const chatContainer = document.querySelector('.chat-container-empresarial');
        if (!chatContainer) return;
        
        // Carregar conversas
        this.loadChatConversations();
        
        // Input de mensagem
        const input = chatContainer.querySelector('.chat-input-empresarial input');
        const sendBtn = chatContainer.querySelector('.chat-input-empresarial .btn-send');
        
        if (input && sendBtn) {
            const sendMessage = () => {
                const message = input.value.trim();
                if (message) {
                    this.sendChatMessage(message);
                    input.value = '';
                }
            };
            
            sendBtn.addEventListener('click', sendMessage);
            input.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') sendMessage();
            });
        }
        
        // Polling para novas mensagens
        setInterval(() => {
            this.pollNewMessages();
        }, this.config.chatPollingInterval);
    },
    
    loadChatConversations() {
        fetch('/api/empresarial/chat-listar-conversas.php')
            .then(response => response.json())
            .then(data => {
                if (data.conversations) {
                    this.renderChatConversations(data.conversations);
                }
            })
            .catch(error => console.error('[Empresarial] Erro ao carregar conversas:', error));
    },
    
    renderChatConversations(conversations) {
        const sidebar = document.querySelector('.chat-sidebar-empresarial');
        if (!sidebar) return;
        
        sidebar.innerHTML = conversations.map(conv => `
            <div class="chat-conversation-item" data-id="${conv.id}" onclick="Empresarial.selectChatConversation(${conv.id})">
                <img src="${conv.avatar || '/assets/images/avatar-default.png'}" alt="${conv.name}">
                <div class="conv-info">
                    <h5>${conv.name}</h5>
                    <p>${conv.last_message || 'Nenhuma mensagem'}</p>
                </div>
                ${conv.unread_count > 0 ? `<span class="badge">${conv.unread_count}</span>` : ''}
            </div>
        `).join('');
    },
    
    selectChatConversation(id) {
        this.state.chatActive = id;
        
        // Atualizar UI
        document.querySelectorAll('.chat-conversation-item').forEach(item => {
            item.classList.toggle('active', parseInt(item.dataset.id) === id);
        });
        
        // Carregar mensagens
        this.loadChatMessages(id);
    },
    
    loadChatMessages(conversationId) {
        fetch(`/api/empresarial/chat-carregar-mensagens.php?id=${conversationId}`)
            .then(response => response.json())
            .then(data => {
                if (data.messages) {
                    this.renderChatMessages(data.messages);
                }
            })
            .catch(error => console.error('[Empresarial] Erro ao carregar mensagens:', error));
    },
    
    renderChatMessages(messages) {
        const container = document.querySelector('.chat-messages-empresarial');
        if (!container) return;
        
        container.innerHTML = messages.map(msg => `
            <div class="chat-message-item ${msg.sender === 'me' ? 'sent' : 'received'}">
                <div class="message-bubble">
                    ${msg.message}
                    <span class="message-time">${this.formatTime(msg.time)}</span>
                </div>
            </div>
        `).join('');
        
        // Scroll para o final
        container.scrollTop = container.scrollHeight;
    },
    
    sendChatMessage(message) {
        if (!this.state.chatActive) {
            this.showToast('Selecione uma conversa primeiro!', 'warning');
            return;
        }
        
        fetch('/api/empresarial/chat-enviar-mensagem.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                conversation_id: this.state.chatActive,
                message: message
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Adicionar mensagem à lista
                const container = document.querySelector('.chat-messages-empresarial');
                const msgDiv = document.createElement('div');
                msgDiv.className = 'chat-message-item sent';
                msgDiv.innerHTML = `
                    <div class="message-bubble">
                        ${message}
                        <span class="message-time">${this.formatTime(new Date())}</span>
                    </div>
                `;
                container.appendChild(msgDiv);
                container.scrollTop = container.scrollHeight;
            } else {
                this.showToast(data.message || 'Erro ao enviar mensagem', 'error');
            }
        })
        .catch(error => {
            console.error('[Empresarial] Erro ao enviar mensagem:', error);
            this.showToast('Erro ao enviar mensagem', 'error');
        });
    },
    
    pollNewMessages() {
        if (!this.state.chatActive) return;
        
        fetch(`/api/empresarial/chat-novas-mensagens.php?id=${this.state.chatActive}`)
            .then(response => response.json())
            .then(data => {
                if (data.messages && data.messages.length > 0) {
                    const container = document.querySelector('.chat-messages-empresarial');
                    data.messages.forEach(msg => {
                        const msgDiv = document.createElement('div');
                        msgDiv.className = `chat-message-item ${msg.sender === 'me' ? 'sent' : 'received'}`;
                        msgDiv.innerHTML = `
                            <div class="message-bubble">
                                ${msg.message}
                                <span class="message-time">${this.formatTime(msg.time)}</span>
                            </div>
                        `;
                        container.appendChild(msgDiv);
                    });
                    container.scrollTop = container.scrollHeight;
                }
            })
            .catch(error => console.error('[Empresarial] Erro ao verificar novas mensagens:', error));
    },
    
    formatTime(date) {
        return new Intl.DateTimeFormat('pt-AO', {
            hour: '2-digit',
            minute: '2-digit'
        }).format(new Date(date));
    },
    
    // ============================================
    // RH - Recursos Humanos
    // ============================================
    initRH() {
        // Inicializar módulo RH
        this.loadRHData();
        this.initFeriados();
        this.initAssiduidade();
        this.initAvaliacoes();
    },
    
    loadRHData() {
        fetch('/api/empresarial/rh-dashboard-dados.php')
            .then(response => response.json())
            .then(data => {
                if (data) {
                    this.updateRHDashboard(data);
                }
            })
            .catch(error => console.error('[Empresarial] Erro ao carregar RH:', error));
    },
    
    updateRHDashboard(data) {
        // Atualizar cards de RH
        document.querySelectorAll('.rh-stat').forEach(el => {
            const key = el.dataset.key;
            if (data[key] !== undefined) {
                el.textContent = data[key];
            }
        });
    },
    
    initFeriados() {
        const feriasBtn = document.querySelector('.rh-ferias-btn');
        if (feriasBtn) {
            feriasBtn.addEventListener('click', () => {
                this.openFeriasModal();
            });
        }
    },
    
    openFeriasModal() {
        // Abrir modal de férias
        this.showToast('Módulo de férias em desenvolvimento', 'info');
    },
    
    initAssiduidade() {
        const assiduidadeBtn = document.querySelector('.rh-assiduidade-btn');
        if (assiduidadeBtn) {
            assiduidadeBtn.addEventListener('click', () => {
                this.openAssiduidadeModal();
            });
        }
    },
    
    openAssiduidadeModal() {
        this.showToast('Módulo de assiduidade em desenvolvimento', 'info');
    },
    
    initAvaliacoes() {
        const avaliacoesBtn = document.querySelector('.rh-avaliacoes-btn');
        if (avaliacoesBtn) {
            avaliacoesBtn.addEventListener('click', () => {
                this.openAvaliacoesModal();
            });
        }
    },
    
    openAvaliacoesModal() {
        this.showToast('Módulo de avaliações em desenvolvimento', 'info');
    },
    
    // ============================================
    // CRM - Gestão de Clientes
    // ============================================
    initCRM() {
        this.loadCRMData();
    },
    
    loadCRMData() {
        fetch('/api/empresarial/crm-listar-clientes.php')
            .then(response => response.json())
            .then(data => {
                if (data.clientes) {
                    this.renderCRMTable(data.clientes);
                }
            })
            .catch(error => console.error('[Empresarial] Erro ao carregar CRM:', error));
    },
    
    renderCRMTable(clientes) {
        const table = document.querySelector('.table-crm tbody');
        if (!table) return;
        
        table.innerHTML = clientes.map(cliente => `
            <tr>
                <td>
                    <div class="cliente-info">
                        <img src="${cliente.avatar || '/assets/images/avatar-default.png'}" alt="${cliente.nome}">
                        <div>
                            <strong>${cliente.nome}</strong>
                            <span class="cliente-email">${cliente.email}</span>
                        </div>
                    </div>
                </td>
                <td>${cliente.empresa || '-'}</td>
                <td>
                    <span class="badge badge-${cliente.status === 'ativo' ? 'success' : 'danger'}">
                        ${cliente.status === 'ativo' ? 'Ativo' : 'Inativo'}
                    </span>
                </td>
                <td>${this.formatDate(cliente.ultimo_contato)}</td>
                <td>
                    <button class="btn btn-sm btn-outline" onclick="Empresarial.verCliente(${cliente.id})">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline" onclick="Empresarial.editarCliente(${cliente.id})">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
            </tr>
        `).join('');
    },
    
    verCliente(id) {
        this.showToast(`Visualizando cliente ${id}`, 'info');
    },
    
    editarCliente(id) {
        this.showToast(`Editando cliente ${id}`, 'info');
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
    Empresarial.init();
});