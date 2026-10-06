/**
 * GeoNexus - Painel Individual
 * JavaScript específico do Profissional Autónomo
 * 
 * @version 1.0.0
 * @author GeoNexus Team
 */

'use strict';

// ============================================
// INDIVIDUAL GLOBAL OBJECT
// ============================================
const Individual = {
    // Configurações
    config: {
        toastDuration: 5000,
        tablePerPage: 15,
        refreshInterval: 30000,
        mapCenter: [-8.839988, 13.289437], // Luanda
        mapZoom: 13
    },
    
    // Estado
    state: {
        notifications: [],
        currentPage: 1,
        loading: false,
        map: null,
        cadEditor: null
    },
    
    // ============================================
    // INITIALIZATION
    // ============================================
    init() {
        console.log('[Individual] Inicializando painel...');
        
        this.initSidebar();
        this.initNotifications();
        this.initDataTables();
        this.initCharts();
        this.initModals();
        this.initTooltips();
        this.initDropdowns();
        this.initCalculadora();
        this.initDragDrop();
        this.initMap();
        this.initCAD();
        
        this.startNotificationPolling();
        this.bindEvents();
        
        console.log('[Individual] Painel inicializado com sucesso!');
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
        fetch('/api/individual/notificacoes-marcar-lidas.php', {
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
        .catch(error => console.error('[Individual] Erro:', error));
    },
    
    startNotificationPolling() {
        setInterval(() => {
            this.checkNotifications();
        }, this.config.refreshInterval);
    },
    
    checkNotifications() {
        fetch('/api/individual/verificar-notificacoes.php')
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
            .catch(error => console.error('[Individual] Erro:', error));
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
                Individual.showTablePage(table, page, perPage);
                pagination.dataset.current = page;
                Individual.updatePaginationButtons(pagination, totalPages);
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
            console.warn('[Individual] Chart.js não carregado');
            return;
        }
        
        this.initRevenueChart();
        this.initProjectsChart();
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
                    backgroundColor: 'rgba(46, 204, 113, 0.08)',
                    borderColor: '#2ECC71',
                    borderWidth: 3,
                    pointBackgroundColor: '#2ECC71',
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
                labels: ['Em Andamento', 'Concluídos', 'Pendentes', 'Arquivados'],
                datasets: [{
                    data: data.values || [12, 8, 5, 3],
                    backgroundColor: ['#2ECC71', '#3498DB', '#F39C12', '#95A5A6'],
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
                labels: data.labels || ['Topografia', 'Engenharia', 'GIS', 'Agricultura'],
                datasets: [{
                    label: 'Projetos',
                    data: data.values || [0, 0, 0, 0],
                    backgroundColor: [
                        '#E87A2E', '#F6AD55', '#00BCD4', '#2E7D32'
                    ],
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
                values: [15000, 18000, 22000, 20000, 25000, 30000]
            },
            projects: {
                values: [12, 8, 5, 3]
            },
            sectors: {
                labels: ['Topografia', 'Engenharia', 'GIS', 'Agricultura', 'Mineração'],
                values: [5, 8, 3, 4, 2]
            }
        };
        
        return mockData[type] || { labels: [], values: [] };
    },
    
    // ============================================
    // CALCULADORA
    // ============================================
    initCalculadora() {
        const calcContainer = document.querySelector('.calculadora-container');
        if (!calcContainer) return;
        
        // Área
        const areaBtn = document.getElementById('calc-area');
        if (areaBtn) {
            areaBtn.addEventListener('click', () => {
                this.calcularArea();
            });
        }
        
        // Volume
        const volumeBtn = document.getElementById('calc-volume');
        if (volumeBtn) {
            volumeBtn.addEventListener('click', () => {
                this.calcularVolume();
            });
        }
        
        // Distância
        const distanciaBtn = document.getElementById('calc-distancia');
        if (distanciaBtn) {
            distanciaBtn.addEventListener('click', () => {
                this.calcularDistancia();
            });
        }
    },
    
    calcularArea() {
        const comprimento = parseFloat(document.getElementById('area-comprimento')?.value);
        const largura = parseFloat(document.getElementById('area-largura')?.value);
        const raio = parseFloat(document.getElementById('area-raio')?.value);
        const tipo = document.querySelector('input[name="area-tipo"]:checked')?.value;
        
        let resultado = 0;
        let formula = '';
        
        switch(tipo) {
            case 'retangulo':
                if (comprimento && largura) {
                    resultado = comprimento * largura;
                    formula = `${comprimento} × ${largura}`;
                }
                break;
            case 'circulo':
                if (raio) {
                    resultado = Math.PI * Math.pow(raio, 2);
                    formula = `π × ${raio}²`;
                }
                break;
            case 'triangulo':
                if (comprimento && largura) {
                    resultado = (comprimento * largura) / 2;
                    formula = `(${comprimento} × ${largura}) / 2`;
                }
                break;
        }
        
        if (resultado > 0) {
            this.mostrarResultadoCalculo(
                `Área: ${resultado.toFixed(2)} m²`,
                `Fórmula: ${formula} = ${resultado.toFixed(2)} m²`
            );
        } else {
            this.showToast('Preencha todos os campos corretamente!', 'error');
        }
    },
    
    calcularVolume() {
        const comprimento = parseFloat(document.getElementById('volume-comprimento')?.value);
        const largura = parseFloat(document.getElementById('volume-largura')?.value);
        const altura = parseFloat(document.getElementById('volume-altura')?.value);
        const raio = parseFloat(document.getElementById('volume-raio')?.value);
        const tipo = document.querySelector('input[name="volume-tipo"]:checked')?.value;
        
        let resultado = 0;
        let formula = '';
        
        switch(tipo) {
            case 'cubo':
                if (comprimento && largura && altura) {
                    resultado = comprimento * largura * altura;
                    formula = `${comprimento} × ${largura} × ${altura}`;
                }
                break;
            case 'cilindro':
                if (raio && altura) {
                    resultado = Math.PI * Math.pow(raio, 2) * altura;
                    formula = `π × ${raio}² × ${altura}`;
                }
                break;
        }
        
        if (resultado > 0) {
            this.mostrarResultadoCalculo(
                `Volume: ${resultado.toFixed(2)} m³`,
                `Fórmula: ${formula} = ${resultado.toFixed(2)} m³`
            );
        } else {
            this.showToast('Preencha todos os campos corretamente!', 'error');
        }
    },
    
    calcularDistancia() {
        const x1 = parseFloat(document.getElementById('dist-x1')?.value);
        const y1 = parseFloat(document.getElementById('dist-y1')?.value);
        const x2 = parseFloat(document.getElementById('dist-x2')?.value);
        const y2 = parseFloat(document.getElementById('dist-y2')?.value);
        
        if (x1 && y1 && x2 && y2) {
            const resultado = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
            this.mostrarResultadoCalculo(
                `Distância: ${resultado.toFixed(2)} m`,
                `√((${x2} - ${x1})² + (${y2} - ${y1})²) = ${resultado.toFixed(2)} m`
            );
        } else {
            this.showToast('Preencha todas as coordenadas!', 'error');
        }
    },
    
    mostrarResultadoCalculo(titulo, detalhe) {
        const container = document.querySelector('.resultado-calculo');
        if (!container) return;
        
        container.innerHTML = `
            <div class="resultado-item">
                <h4>${titulo}</h4>
                <p>${detalhe}</p>
                <button class="btn btn-sm btn-outline" onclick="Individual.copiarResultado(this)">
                    <i class="fas fa-copy"></i> Copiar
                </button>
            </div>
        `;
        container.style.display = 'block';
    },
    
    copiarResultado(btn) {
        const texto = btn.closest('.resultado-item').querySelector('h4').textContent;
        navigator.clipboard?.writeText(texto).then(() => {
            Individual.showToast('Resultado copiado!', 'success');
        }).catch(() => {
            // Fallback
            const range = document.createRange();
            range.selectNode(btn.closest('.resultado-item'));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            document.execCommand('copy');
            Individual.showToast('Resultado copiado!', 'success');
        });
    },
    
    // ============================================
    // DRAG & DROP
    // ============================================
    initDragDrop() {
        const dropZones = document.querySelectorAll('.drop-zone');
        
        dropZones.forEach(zone => {
            // Prevenir comportamentos padrão
            zone.addEventListener('dragover', (e) => {
                e.preventDefault();
                zone.classList.add('drag-over');
            });
            
            zone.addEventListener('dragleave', () => {
                zone.classList.remove('drag-over');
            });
            
            zone.addEventListener('drop', (e) => {
                e.preventDefault();
                zone.classList.remove('drag-over');
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    this.handleFileUpload(files, zone);
                }
            });
            
            // Clique para upload
            const input = zone.querySelector('input[type="file"]');
            if (input) {
                zone.addEventListener('click', () => {
                    input.click();
                });
                
                input.addEventListener('change', () => {
                    if (input.files.length > 0) {
                        this.handleFileUpload(input.files, zone);
                    }
                });
            }
        });
    },
    
    handleFileUpload(files, zone) {
        const file = files[0];
        const maxSize = 10 * 1024 * 1024; // 10MB
        
        // Validar tamanho
        if (file.size > maxSize) {
            this.showToast('Arquivo muito grande! Máximo 10MB.', 'error');
            return;
        }
        
        // Validar tipo
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
        if (!allowedTypes.includes(file.type)) {
            this.showToast('Tipo de arquivo não permitido!', 'error');
            return;
        }
        
        // Mostrar preview
        const preview = zone.querySelector('.preview-area');
        if (preview) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <span class="file-name">${file.name}</span>
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = `
                    <i class="fas fa-file-pdf"></i>
                    <span class="file-name">${file.name}</span>
                `;
            }
        }
        
        this.showToast(`Arquivo "${file.name}" carregado!`, 'success');
    },
    
    // ============================================
    // MAP - Leaflet.js
    // ============================================
    initMap() {
        const mapContainer = document.getElementById('map-container');
        if (!mapContainer) return;
        
        if (typeof L === 'undefined') {
            console.warn('[Individual] Leaflet.js não carregado');
            return;
        }
        
        // Inicializar mapa
        this.state.map = L.map(mapContainer, {
            center: this.config.mapCenter,
            zoom: this.config.mapZoom,
            zoomControl: true,
            attributionControl: true
        });
        
        // Adicionar tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(this.state.map);
        
        // Controles de zoom customizados
        L.control.zoom({
            position: 'bottomright'
        }).addTo(this.state.map);
        
        // Adicionar marcador de exemplo
        this.addMarker(this.config.mapCenter, 'Meu Projeto', 'Projeto principal');
        
        // Atualizar tamanho do mapa
        setTimeout(() => {
            this.state.map.invalidateSize();
        }, 100);
        
        // Adicionar controle de localização
        L.control.locate({
            position: 'topright',
            strings: {
                title: 'Minha Localização'
            }
        }).addTo(this.state.map);
        
        console.log('[Individual] Mapa inicializado');
    },
    
    addMarker(latLng, title, description) {
        if (!this.state.map) return;
        
        const marker = L.marker(latLng)
            .addTo(this.state.map)
            .bindPopup(`
                <strong>${title}</strong><br>
                <p>${description || ''}</p>
                <small>Lat: ${latLng[0]}, Lng: ${latLng[1]}</small>
            `);
        
        return marker;
    },
    
    // ============================================
    // CAD - Konva.js
    // ============================================
    initCAD() {
        const cadContainer = document.getElementById('cad-container');
        if (!cadContainer) return;
        
        if (typeof Konva === 'undefined') {
            console.warn('[Individual] Konva.js não carregado');
            return;
        }
        
        // Configuração do canvas
        const stage = new Konva.Stage({
            container: 'cad-container',
            width: cadContainer.clientWidth || 800,
            height: cadContainer.clientHeight || 500
        });
        
        const layer = new Konva.Layer();
        stage.add(layer);
        
        this.state.cadEditor = {
            stage,
            layer,
            shapes: [],
            currentTool: 'select'
        };
        
        // Ferramentas CAD
        this.initCADTools();
        
        console.log('[Individual] CAD Editor inicializado');
    },
    
    initCADTools() {
        const tools = document.querySelectorAll('.cad-tool');
        tools.forEach(tool => {
            tool.addEventListener('click', () => {
                const toolName = tool.dataset.tool;
                this.setCADTool(toolName);
                
                // Atualizar UI
                tools.forEach(t => t.classList.remove('active'));
                tool.classList.add('active');
            });
        });
        
        // Adicionar formas básicas
        const addRect = document.querySelector('.cad-add-rect');
        if (addRect) {
            addRect.addEventListener('click', () => {
                this.addCADShape('rect');
            });
        }
        
        const addCircle = document.querySelector('.cad-add-circle');
        if (addCircle) {
            addCircle.addEventListener('click', () => {
                this.addCADShape('circle');
            });
        }
        
        const addLine = document.querySelector('.cad-add-line');
        if (addLine) {
            addLine.addEventListener('click', () => {
                this.addCADShape('line');
            });
        }
    },
    
    setCADTool(toolName) {
        this.state.cadEditor.currentTool = toolName;
        console.log('[CAD] Ferramenta selecionada:', toolName);
    },
    
    addCADShape(type) {
        const { stage, layer } = this.state.cadEditor;
        if (!stage || !layer) return;
        
        let shape;
        const colors = ['#2ECC71', '#3498DB', '#E74C3C', '#F39C12', '#9B59B6'];
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        switch(type) {
            case 'rect':
                shape = new Konva.Rect({
                    x: 50,
                    y: 50,
                    width: 120,
                    height: 80,
                    fill: color,
                    stroke: '#2D3436',
                    strokeWidth: 2,
                    draggable: true,
                    cornerRadius: 4
                });
                break;
                
            case 'circle':
                shape = new Konva.Circle({
                    x: 100,
                    y: 100,
                    radius: 50,
                    fill: color,
                    stroke: '#2D3436',
                    strokeWidth: 2,
                    draggable: true
                });
                break;
                
            case 'line':
                shape = new Konva.Line({
                    points: [50, 50, 150, 100, 200, 50],
                    stroke: color,
                    strokeWidth: 4,
                    draggable: true,
                    lineCap: 'round',
                    lineJoin: 'round'
                });
                break;
                
            default:
                return;
        }
        
        layer.add(shape);
        layer.draw();
        
        // Selecionar ao clicar
        shape.on('click', () => {
            this.selectCADShape(shape);
        });
        
        this.state.cadEditor.shapes.push(shape);
    },
    
    selectCADShape(shape) {
        // Remover seleção anterior
        this.state.cadEditor.shapes.forEach(s => {
            if (s !== shape) {
                s.strokeWidth(2);
            }
        });
        
        // Selecionar novo
        shape.strokeWidth(4);
        shape.stroke('#6C2BD9');
        this.state.cadEditor.layer.draw();
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
        // Refresh manual
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
    Individual.init();
});