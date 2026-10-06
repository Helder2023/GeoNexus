/**
 * GeoNexus - Sistema de Notificações
 * Gerenciamento centralizado de notificações
 * 
 * @version 1.0.0
 * @author GeoNexus Team
 */

'use strict';

const NotificationSystem = {
    config: {
        pollingInterval: 30000,
        toastDuration: 5000,
        maxNotifications: 50
    },
    
    state: {
        notifications: [],
        unreadCount: 0,
        isPolling: false,
        soundEnabled: true,
        toastContainer: null
    },
    
    init() {
        console.log('[Notifications] Inicializando sistema...');
        
        // Criar container de toasts
        this.createToastContainer();
        
        // Carregar preferências
        this.loadPreferences();
        
        // Verificar notificações iniciais
        this.checkNotifications();
        
        // Iniciar polling
        this.startPolling();
        
        // Bind de eventos
        this.bindEvents();
        
        console.log('[Notifications] Sistema inicializado!');
    },
    
    createToastContainer() {
        let container = document.getElementById('toast-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toast-container';
            container.className = 'toast-container';
            document.body.appendChild(container);
        }
        this.state.toastContainer = container;
    },
    
    loadPreferences() {
        const saved = localStorage.getItem('geonnexus_notifications');
        if (saved) {
            try {
                const prefs = JSON.parse(saved);
                this.state.soundEnabled = prefs.soundEnabled !== false;
            } catch (e) {
                console.warn('[Notifications] Erro ao carregar preferências:', e);
            }
        }
    },
    
    savePreferences() {
        localStorage.setItem('geonnexus_notifications', JSON.stringify({
            soundEnabled: this.state.soundEnabled
        }));
    },
    
    startPolling() {
        if (this.state.isPolling) return;
        this.state.isPolling = true;
        
        setInterval(() => {
            this.checkNotifications();
        }, this.config.pollingInterval);
    },
    
    async checkNotifications() {
        try {
            const response = await fetch('/api/notificacoes/verificar.php');
            const data = await response.json();
            
            if (data.count > 0) {
                this.updateBadge(data.count);
                
                if (data.notifications && data.notifications.length > 0) {
                    data.notifications.forEach(notif => {
                        this.addNotification(notif);
                        this.showToast(notif.message, 'info');
                    });
                    
                    if (this.state.soundEnabled) {
                        this.playSound();
                    }
                }
            }
        } catch (error) {
            console.error('[Notifications] Erro ao verificar:', error);
        }
    },
    
    addNotification(notification) {
        // Adicionar ao início
        this.state.notifications.unshift({
            id: notification.id,
            message: notification.message,
            icon: notification.icon || 'fa-bell',
            link: notification.link,
            read: false,
            createdAt: notification.created_at || new Date().toISOString()
        });
        
        // Limitar quantidade
        if (this.state.notifications.length > this.config.maxNotifications) {
            this.state.notifications.pop();
        }
        
        // Atualizar contador
        this.state.unreadCount++;
        
        // Disparar evento
        const event = new CustomEvent('notification:new', {
            detail: notification
        });
        document.dispatchEvent(event);
    },
    
    markAsRead(notificationId) {
        const notif = this.state.notifications.find(n => n.id === notificationId);
        if (notif && !notif.read) {
            notif.read = true;
            this.state.unreadCount--;
            this.updateBadge(this.state.unreadCount);
            
            // Marcar no servidor
            fetch('/api/notificacoes/marcar-lida.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: notificationId })
            }).catch(error => console.error('[Notifications] Erro ao marcar como lida:', error));
        }
    },
    
    markAllAsRead() {
        this.state.notifications.forEach(n => n.read = true);
        this.state.unreadCount = 0;
        this.updateBadge(0);
        
        fetch('/api/notificacoes/marcar-todas-lidas.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' }
        }).catch(error => console.error('[Notifications] Erro ao marcar todas como lidas:', error));
    },
    
    updateBadge(count) {
        const badges = document.querySelectorAll('.btn-notificacoes .badge');
        badges.forEach(badge => {
            if (count > 0) {
                badge.textContent = count;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        });
        
        // Atualizar título da página
        if (count > 0) {
            document.title = `(${count}) ${document.title.replace(/^\(\d+\)\s*/, '')}`;
        } else {
            document.title = document.title.replace(/^\(\d+\)\s*/, '');
        }
    },
    
    showToast(message, type = 'info') {
        const container = this.state.toastContainer;
        if (!container) return;
        
        const icons = {
            success: 'fa-check-circle',
            error: 'fa-exclamation-circle',
            warning: 'fa-exclamation-triangle',
            info: 'fa-info-circle'
        };
        
        const colors = {
            success: '#10B981',
            error: '#EF4444',
            warning: '#F59E0B',
            info: '#3B82F6'
        };
        
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.style.borderLeftColor = colors[type] || colors.info;
        toast.innerHTML = `
            <div class="toast-content">
                <i class="fas ${icons[type] || icons.info}" style="color: ${colors[type] || colors.info}"></i>
                <span>${message}</span>
            </div>
            <button class="toast-close">&times;</button>
        `;
        
        container.appendChild(toast);
        
        // Animar entrada
        requestAnimationFrame(() => {
            toast.style.transform = 'translateX(0)';
            toast.style.opacity = '1';
        });
        
        // Auto-fechar
        const timeout = setTimeout(() => {
            this.closeToast(toast);
        }, this.config.toastDuration);
        
        // Fechar ao clicar no X
        toast.querySelector('.toast-close').addEventListener('click', () => {
            clearTimeout(timeout);
            this.closeToast(toast);
        });
        
        // Fechar ao passar o mouse
        toast.addEventListener('mouseenter', () => {
            clearTimeout(timeout);
        });
        
        toast.addEventListener('mouseleave', () => {
            setTimeout(() => {
                this.closeToast(toast);
            }, 2000);
        });
    },
    
    closeToast(toast) {
        if (!toast.parentNode) return;
        
        toast.style.transform = 'translateX(100%)';
        toast.style.opacity = '0';
        
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 300);
    },
    
    playSound() {
        try {
            const audio = new Audio('/assets/sounds/notificacao.mp3');
            audio.volume = 0.5;
            audio.play().catch(() => {
                // Fallback para quando o áudio não pode ser reproduzido
                console.log('[Notifications] Som não pôde ser reproduzido');
            });
        } catch (e) {
            console.log('[Notifications] Erro ao reproduzir som:', e);
        }
    },
    
    toggleSound() {
        this.state.soundEnabled = !this.state.soundEnabled;
        this.savePreferences();
        
        const event = new CustomEvent('notification:sound-toggle', {
            detail: { enabled: this.state.soundEnabled }
        });
        document.dispatchEvent(event);
        
        return this.state.soundEnabled;
    },
    
    getUnreadCount() {
        return this.state.unreadCount;
    },
    
    getAllNotifications() {
        return this.state.notifications;
    },
    
    getUnreadNotifications() {
        return this.state.notifications.filter(n => !n.read);
    },
    
    bindEvents() {
        // Evento para marcar notificações como lidas
        document.addEventListener('notification:read', (e) => {
            if (e.detail && e.detail.id) {
                this.markAsRead(e.detail.id);
            }
        });
        
        // Evento para marcar todas como lidas
        document.addEventListener('notification:read-all', () => {
            this.markAllAsRead();
        });
        
        // Evento para alternar som
        document.addEventListener('notification:toggle-sound', () => {
            this.toggleSound();
        });
    }
};

// ============================================
// EXPOSE GLOBALLY
// ============================================
window.NotificationSystem = NotificationSystem;

// ============================================
// INITIALIZE ON DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    NotificationSystem.init();
});

// ============================================
// EXPORT FOR MODULE USAGE
// ============================================
if (typeof module !== 'undefined' && module.exports) {
    module.exports = NotificationSystem;
}