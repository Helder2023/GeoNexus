/**
 * GeoNexus - Base dos Painéis
 * Funções globais compartilhadas entre todos os perfis
 * 
 * @version 1.0.0
 * @author GeoNexus Team
 */

'use strict';

// ============================================
// GEONEXUS BASE OBJECT
// ============================================
const GeoNexus = {
    // Configurações globais
    config: {
        siteUrl: window.location.origin,
        apiUrl: window.location.origin + '/api',
        version: '1.0.0',
        debug: true
    },
    
    // ============================================
    // INITIALIZATION
    // ============================================
    init() {
        console.log('[GeoNexus] Inicializando...');
        
        // Verificar se o usuário está logado
        this.checkSession();
        
        // Inicializar helpers
        this.initHelpers();
        
        console.log('[GeoNexus] Inicializado com sucesso!');
    },
    
    // ============================================
    // SESSION
    // ============================================
    checkSession() {
        fetch(this.config.apiUrl + '/auth/verificar-sessao.php')
            .then(response => response.json())
            .then(data => {
                if (!data.logged) {
                    // Redirecionar para login se não estiver logado
                    window.location.href = this.config.siteUrl + '/public/login.php';
                }
            })
            .catch(error => {
                console.error('[GeoNexus] Erro ao verificar sessão:', error);
            });
    },
    
    // ============================================
    // HELPERS
    // ============================================
    initHelpers() {
        // Debounce helper
        this.debounce = this.debounce.bind(this);
        
        // Throttle helper
        this.throttle = this.throttle.bind(this);
        
        // Format helpers
        this.formatCurrency = this.formatCurrency.bind(this);
        this.formatDate = this.formatDate.bind(this);
        this.formatDateTime = this.formatDateTime.bind(this);
        this.timeAgo = this.timeAgo.bind(this);
        
        // DOM helpers
        this.qs = this.qs.bind(this);
        this.qsa = this.qsa.bind(this);
        this.on = this.on.bind(this);
    },
    
    // ============================================
    // UTILITY FUNCTIONS
    // ============================================
    debounce(func, wait = 300) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },
    
    throttle(func, limit = 300) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    },
    
    formatCurrency(value, currency = 'AOA') {
        return new Intl.NumberFormat('pt-AO', {
            style: 'currency',
            currency: currency,
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
    // DOM HELPERS
    // ============================================
    qs(selector, context = document) {
        return context.querySelector(selector);
    },
    
    qsa(selector, context = document) {
        return context.querySelectorAll(selector);
    },
    
    on(element, event, handler, options = {}) {
        if (typeof element === 'string') {
            element = this.qs(element);
        }
        if (element) {
            element.addEventListener(event, handler, options);
        }
        return element;
    },
    
    // ============================================
    // API HELPERS
    // ============================================
    async fetchAPI(endpoint, options = {}) {
        const url = this.config.apiUrl + endpoint;
        const defaultOptions = {
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin'
        };
        
        const finalOptions = { ...defaultOptions, ...options };
        
        try {
            const response = await fetch(url, finalOptions);
            const data = await response.json();
            
            if (!response.ok) {
                throw new Error(data.message || 'Erro na requisição');
            }
            
            return data;
        } catch (error) {
            console.error('[GeoNexus API] Erro:', error);
            throw error;
        }
    },
    
    // ============================================
    // THEME FUNCTIONS
    // ============================================
    toggleTheme() {
        const currentTheme = localStorage.getItem('geonnexus-theme') || 'light';
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('geonnexus-theme', newTheme);
        
        // Disparar evento
        const event = new CustomEvent('theme-change', { detail: { theme: newTheme } });
        document.dispatchEvent(event);
        
        return newTheme;
    },
    
    getCurrentTheme() {
        return localStorage.getItem('geonnexus-theme') || 'light';
    },
    
    // ============================================
    // LOADING FUNCTIONS
    // ============================================
    showLoading(container) {
        if (typeof container === 'string') {
            container = this.qs(container);
        }
        if (!container) return;
        
        const overlay = document.createElement('div');
        overlay.className = 'loading-overlay';
        overlay.innerHTML = `
            <div class="loading-spinner"></div>
        `;
        
        container.style.position = 'relative';
        container.appendChild(overlay);
    },
    
    hideLoading(container) {
        if (typeof container === 'string') {
            container = this.qs(container);
        }
        if (!container) return;
        
        const overlay = container.querySelector('.loading-overlay');
        if (overlay) {
            overlay.remove();
        }
    }
};

// ============================================
// INITIALIZE ON DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    GeoNexus.init();
});

// ============================================
// EXPORT FOR MODULE USAGE
// ============================================
if (typeof module !== 'undefined' && module.exports) {
    module.exports = GeoNexus;
}