/**
 * GeoNexus - Portal do Cliente
 * JavaScript específico do Cliente
 * 
 * @version 1.0.0
 * @author GeoNexus Team
 */

'use strict';

const Cliente = {
    config: {
        toastDuration: 5000,
        tablePerPage: 10,
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
        console.log('[Cliente] Inicializando portal...');
        
        this.initSidebar();
        this.initNotifications();
        this.initDataTables();
        this.initModals();
        this.initTooltips();
        this.initDropdowns();
        this.initChat();
        this.initDocumentos();
        this.initFaturas();
        this.initProjetos();
        
        this.startNotificationPolling();
        this.bindEvents();
        
        console.log('[Cliente] Portal inicializado com sucesso!');
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
        fetch('/api/cliente/notificacoes-marcar-lidas.php', {
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
        .catch(error => console.error('[Cliente] Erro:', error));
    },
    
    startNotificationPolling() {
        setInterval(() => {
            this.checkNotifications();
        }, this.config.refreshInterval);
    },
    
    checkNotifications() {
        fetch('/api/cliente/verificar-notificacoes.php')
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
            .catch(error => console.error('[Cliente] Erro:', error));
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
                Cliente.showTablePage(table, page, perPage);
                pagination.dataset.current = page;
                Cliente.updatePaginationButtons(pagination, totalPages);
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
    // CHAT
    // ============================================
    initChat() {
        const chatContainer = document.querySelector('.chat-cliente-container');
        if (!chatContainer) return;
        
        this.loadChatMessages();
        
        const input = chatContainer.querySelector('.chat-cliente-input input');
        const sendBtn = chatContainer.querySelector('.chat-cliente-input .btn-send');
        
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
        
        setInterval(() => {
            this.pollNewMessages();
        }, this.config.chatPollingInterval);
    },
    
    loadChatMessages() {
        fetch('/api/cliente/chat-carregar-mensagens.php')
            .then(response => response.json())
            .then(data => {
                if (data.messages) {
                    this.renderChatMessages(data.messages);
                }
            })
            .catch(error => console.error('[Cliente] Erro ao carregar chat:', error));
    },
    
    renderChatMessages(messages) {
        const container = document.querySelector('.chat-cliente-messages');
        if (!container) return;
        
        container.innerHTML = messages.map(msg => `
            <div class="chat-message-item ${msg.sender === 'me' ? 'sent' : 'received'}">
                <div class="message-bubble">
                    ${msg.message}
                    <span class="message-time">${this.formatTime(msg.time)}</span>
                </div>
            </div>
        `).join('');
        
        container.scrollTop = container.scrollHeight;
    },
    
    sendChatMessage(message) {
        fetch('/api/cliente/chat-enviar-mensagem.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const container = document.querySelector('.chat-cliente-messages');
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
            console.error('[Cliente] Erro ao enviar mensagem:', error);
            this.showToast('Erro ao enviar mensagem', 'error');
        });
    },
    
    pollNewMessages() {
        fetch('/api/cliente/chat-novas-mensagens.php')
            .then(response => response.json())
            .then(data => {
                if (data.messages && data.messages.length > 0) {
                    const container = document.querySelector('.chat-cliente-messages');
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
            .catch(error => console.error('[Cliente] Erro ao verificar novas mensagens:', error));
    },
    
    formatTime(date) {
        return new Intl.DateTimeFormat('pt-AO', {
            hour: '2-digit',
            minute: '2-digit'
        }).format(new Date(date));
    },
    
    // ============================================
    // DOCUMENTOS
    // ============================================
    initDocumentos() {
        this.loadDocumentos();
    },
    
    loadDocumentos() {
        fetch('/api/cliente/listar-documentos.php')
            .then(response => response.json())
            .then(data => {
                if (data.documentos) {
                    this.renderDocumentos(data.documentos);
                }
            })
            .catch(error => console.error('[Cliente] Erro ao carregar documentos:', error));
    },
    
    renderDocumentos(documentos) {
        const container = document.querySelector('.documentos-container');
        if (!container) return;
        
        container.innerHTML = documentos.map(doc => `
            <div class="documento-cliente-item">
                <div class="doc-icon">
                    <i class="fas ${this.getDocIcon(doc.tipo)}"></i>
                </div>
                <div class="doc-info">
                    <h5>${doc.nome}</h5>
                    <span>${this.formatDate(doc.data_upload)}</span>
                </div>
                <div class="doc-actions">
                    <button class="btn btn-sm btn-outline" onclick="Cliente.baixarDocumento(${doc.id})">
                        <i class="fas fa-download"></i>
                    </button>
                </div>
            </div>
        `).join('');
    },
    
    getDocIcon(tipo) {
        const icons = {
            'pdf': 'fa-file-pdf',
            'word': 'fa-file-word',
            'excel': 'fa-file-excel',
            'image': 'fa-file-image',
            'zip': 'fa-file-archive',
            'default': 'fa-file'
        };
        return icons[tipo] || icons.default;
    },
    
    baixarDocumento(id) {
        window.location.href = `/api/cliente/documento-baixar.php?id=${id}`;
    },
    
    // ============================================
    // FATURAS
    // ============================================
    initFaturas() {
        this.loadFaturas();
    },
    
    loadFaturas() {
        fetch('/api/cliente/listar-faturas.php')
            .then(response => response.json())
            .then(data => {
                if (data.faturas) {
                    this.renderFaturas(data.faturas);
                }
            })
            .catch(error => console.error('[Cliente] Erro ao carregar faturas:', error));
    },
    
    renderFaturas(faturas) {
        const table = document.querySelector('.table-faturas tbody');
        if (!table) return;
        
        table.innerHTML = faturas.map(fatura => `
            <tr>
                <td>#${fatura.numero}</td>
                <td>${this.formatDate(fatura.data_emissao)}</td>
                <td>${this.formatCurrency(fatura.valor)}</td>
                <td>
                    <span class="badge badge-${fatura.status === 'paga' ? 'success' : fatura.status === 'vencida' ? 'danger' : 'warning'}">
                        ${fatura.status === 'paga' ? 'Paga' : fatura.status === 'vencida' ? 'Vencida' : 'Pendente'}
                    </span>
                </td>
                <td>
                    <button class="btn btn-sm btn-outline" onclick="Cliente.verFatura(${fatura.id})">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline" onclick="Cliente.baixarFatura(${fatura.id})">
                        <i class="fas fa-download"></i>
                    </button>
                </td>
            </tr>
        `).join('');
    },
    
    verFatura(id) {
        this.showToast(`Visualizando fatura ${id}`, 'info');
    },
    
    baixarFatura(id) {
        window.location.href = `/api/cliente/fatura-baixar.php?id=${id}`;
    },
    
    // ============================================
    // PROJETOS
    // ============================================
    initProjetos() {
        this.loadProjetos();
    },
    
    loadProjetos() {
        fetch('/api/cliente/listar-projetos.php')
            .then(response => response.json())
            .then(data => {
                if (data.projetos) {
                    this.renderProjetos(data.projetos);
                }
            })
            .catch(error => console.error('[Cliente] Erro ao carregar projetos:', error));
    },
    
    renderProjetos(projetos) {
        const container = document.querySelector('.projetos-container');
        if (!container) return;
        
        container.innerHTML = projetos.map(projeto => `
            <div class="projeto-cliente-card" onclick="Cliente.verProjeto(${projeto.id})">
                <div class="projeto-header">
                    <h5>${projeto.nome}</h5>
                    <span class="projeto-status ${projeto.status}">
                        <i class="fas fa-circle"></i>
                        ${projeto.status === 'em_andamento' ? 'Em Andamento' : 
                          projeto.status === 'concluido' ? 'Concluído' : 'Pendente'}
                    </span>
                </div>
                <div class="projeto-body">
                    <p>${projeto.descricao || 'Sem descrição'}</p>
                    <div class="projeto-meta">
                        <span><i class="far fa-calendar"></i> ${this.formatDate(projeto.data_inicio)}</span>
                        <span><i class="far fa-building"></i> ${projeto.empresa || 'Não definida'}</span>
                    </div>
                </div>
                <div class="projeto-footer">
                    <div class="projeto-progresso">
                        <div class="progress-bar" style="width: ${projeto.progresso || 0}%"></div>
                        <span>${projeto.progresso || 0}%</span>
                    </div>
                </div>
            </div>
        `).join('');
    },
    
    verProjeto(id) {
        window.location.href = `/cliente/projeto-detalhe.php?id=${id}`;
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
    }
};

// ============================================
// INITIALIZE ON DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    Cliente.init();
});