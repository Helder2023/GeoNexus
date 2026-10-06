/**
 * GeoNexus - Editor CAD
 * Editor de desenhos técnicos com Konva.js
 * 
 * @version 1.0.0
 * @author GeoNexus Team
 */

'use strict';

const CADEditor = {
    config: {
        width: 800,
        height: 500,
        backgroundColor: '#F8FAFC',
        gridSize: 20,
        snapToGrid: true
    },
    
    state: {
        stage: null,
        layer: null,
        shapes: [],
        selectedShape: null,
        currentTool: 'select',
        isDrawing: false,
        startPoint: null,
        history: [],
        historyIndex: -1
    },
    
    init(containerId = 'cad-container') {
        console.log('[CAD Editor] Inicializando...');
        
        const container = document.getElementById(containerId);
        if (!container) {
            console.error('[CAD Editor] Container não encontrado:', containerId);
            return;
        }
        
        if (typeof Konva === 'undefined') {
            console.warn('[CAD Editor] Konva.js não carregado');
            return;
        }
        
        // Criar stage
        this.state.stage = new Konva.Stage({
            container: containerId,
            width: container.clientWidth || this.config.width,
            height: container.clientHeight || this.config.height,
            draggable: false
        });
        
        // Criar layer
        this.state.layer = new Konva.Layer();
        this.state.stage.add(this.state.layer);
        
        // Configurar grid
        this.drawGrid();
        
        // Configurar eventos
        this.bindEvents();
        
        // Redimensionar
        window.addEventListener('resize', () => {
            this.resize();
        });
        
        console.log('[CAD Editor] Inicializado com sucesso!');
    },
    
    drawGrid() {
        const gridLayer = new Konva.Layer();
        const { width, height, gridSize } = this.config;
        
        // Linhas verticais
        for (let x = 0; x <= width; x += gridSize) {
            const line = new Konva.Line({
                points: [x, 0, x, height],
                stroke: '#E5E7EB',
                strokeWidth: 0.5,
                listening: false
            });
            gridLayer.add(line);
        }
        
        // Linhas horizontais
        for (let y = 0; y <= height; y += gridSize) {
            const line = new Konva.Line({
                points: [0, y, width, y],
                stroke: '#E5E7EB',
                strokeWidth: 0.5,
                listening: false
            });
            gridLayer.add(line);
        }
        
        this.state.stage.add(gridLayer);
        gridLayer.moveToBottom();
    },
    
    bindEvents() {
        const { stage, layer } = this.state;
        
        stage.on('mousedown', (e) => {
            const pos = stage.getPointerPosition();
            this.handleMouseDown(e, pos);
        });
        
        stage.on('mousemove', (e) => {
            const pos = stage.getPointerPosition();
            this.handleMouseMove(e, pos);
        });
        
        stage.on('mouseup', (e) => {
            this.handleMouseUp(e);
        });
        
        stage.on('click', (e) => {
            this.handleClick(e);
        });
        
        // Atalhos de teclado
        document.addEventListener('keydown', (e) => {
            this.handleKeyboard(e);
        });
    },
    
    handleMouseDown(e, pos) {
        if (this.state.currentTool === 'select') return;
        
        this.state.isDrawing = true;
        this.state.startPoint = pos;
        
        // Criar forma temporária
        this.createTempShape(pos);
    },
    
    handleMouseMove(e, pos) {
        // Atualizar posição do cursor
        this.updateCursor(pos);
        
        if (!this.state.isDrawing || this.state.currentTool === 'select') return;
        
        // Atualizar forma temporária
        this.updateTempShape(pos);
    },
    
    handleMouseUp(e) {
        if (!this.state.isDrawing) return;
        
        this.state.isDrawing = false;
        
        // Finalizar forma
        this.finalizeShape();
        
        // Salvar histórico
        this.saveHistory();
    },
    
    handleClick(e) {
        if (this.state.currentTool === 'select') {
            const target = e.target;
            if (target && target !== this.state.layer) {
                this.selectShape(target);
            } else {
                this.deselectShape();
            }
        }
    },
    
    handleKeyboard(e) {
        // Delete/Backspace para remover
        if ((e.key === 'Delete' || e.key === 'Backspace') && this.state.selectedShape) {
            this.deleteSelected();
            e.preventDefault();
        }
        
        // Ctrl+Z para desfazer
        if (e.ctrlKey && e.key === 'z') {
            this.undo();
            e.preventDefault();
        }
        
        // Ctrl+Y para refazer
        if (e.ctrlKey && e.key === 'y') {
            this.redo();
            e.preventDefault();
        }
        
        // Escape para desselecionar
        if (e.key === 'Escape') {
            this.deselectShape();
            this.state.currentTool = 'select';
            this.updateToolUI('select');
        }
    },
    
    createTempShape(pos) {
        const tool = this.state.currentTool;
        const snapPos = this.snapToGrid(pos);
        
        let shape;
        switch(tool) {
            case 'rect':
                shape = new Konva.Rect({
                    x: snapPos.x,
                    y: snapPos.y,
                    width: 0,
                    height: 0,
                    fill: 'rgba(46, 204, 113, 0.3)',
                    stroke: '#2ECC71',
                    strokeWidth: 2,
                    cornerRadius: 4
                });
                break;
                
            case 'circle':
                shape = new Konva.Circle({
                    x: snapPos.x,
                    y: snapPos.y,
                    radius: 0,
                    fill: 'rgba(46, 204, 113, 0.3)',
                    stroke: '#2ECC71',
                    strokeWidth: 2
                });
                break;
                
            case 'line':
                shape = new Konva.Line({
                    points: [snapPos.x, snapPos.y, snapPos.x, snapPos.y],
                    stroke: '#2ECC71',
                    strokeWidth: 2,
                    lineCap: 'round',
                    lineJoin: 'round'
                });
                break;
                
            case 'text':
                shape = new Konva.Text({
                    x: snapPos.x,
                    y: snapPos.y,
                    text: 'Texto',
                    fontSize: 16,
                    fontFamily: 'Inter',
                    fill: '#1A2D4A',
                    draggable: true
                });
                break;
                
            default:
                return;
        }
        
        shape.listening = false;
        this.state.tempShape = shape;
        this.state.layer.add(shape);
        this.state.layer.draw();
    },
    
    updateTempShape(pos) {
        const shape = this.state.tempShape;
        if (!shape) return;
        
        const start = this.state.startPoint;
        const snapPos = this.snapToGrid(pos);
        const tool = this.state.currentTool;
        
        switch(tool) {
            case 'rect':
                const x = Math.min(start.x, snapPos.x);
                const y = Math.min(start.y, snapPos.y);
                const width = Math.abs(snapPos.x - start.x);
                const height = Math.abs(snapPos.y - start.y);
                shape.setAttrs({ x, y, width, height });
                break;
                
            case 'circle':
                const radius = Math.sqrt(
                    Math.pow(snapPos.x - start.x, 2) +
                    Math.pow(snapPos.y - start.y, 2)
                );
                shape.setAttrs({ radius });
                break;
                
            case 'line':
                const points = shape.points();
                points[2] = snapPos.x;
                points[3] = snapPos.y;
                shape.setAttrs({ points });
                break;
        }
        
        this.state.layer.draw();
    },
    
    finalizeShape() {
        const shape = this.state.tempShape;
        if (!shape) return;
        
        // Validar forma (não pode ser muito pequena)
        const tool = this.state.currentTool;
        let isValid = false;
        
        switch(tool) {
            case 'rect':
                isValid = shape.width() > 10 && shape.height() > 10;
                break;
            case 'circle':
                isValid = shape.radius() > 10;
                break;
            case 'line':
                const points = shape.points();
                const dx = points[2] - points[0];
                const dy = points[3] - points[1];
                isValid = Math.sqrt(dx*dx + dy*dy) > 10;
                break;
            default:
                isValid = true;
        }
        
        if (!isValid) {
            shape.destroy();
            this.state.layer.draw();
            this.state.tempShape = null;
            return;
        }
        
        // Tornar interativo
        shape.listening = true;
        shape.draggable = true;
        shape.on('click', () => this.selectShape(shape));
        shape.on('dragend', () => this.saveHistory());
        
        // Adicionar à lista de formas
        this.state.shapes.push(shape);
        this.state.tempShape = null;
        
        this.state.layer.draw();
    },
    
    selectShape(shape) {
        this.deselectShape();
        
        this.state.selectedShape = shape;
        shape.strokeWidth(4);
        shape.stroke('#6C2BD9');
        
        // Adicionar transformadores
        const tr = new Konva.Transformer({
            nodes: [shape],
            enabledAnchors: ['top-left', 'top-right', 'bottom-left', 'bottom-right'],
            borderColor: '#6C2BD9',
            anchorStrokeColor: '#6C2BD9',
            anchorFillColor: 'white',
            anchorSize: 8
        });
        
        this.state.selectedTransformer = tr;
        this.state.layer.add(tr);
        this.state.layer.draw();
    },
    
    deselectShape() {
        if (this.state.selectedTransformer) {
            this.state.selectedTransformer.destroy();
            this.state.selectedTransformer = null;
        }
        
        if (this.state.selectedShape) {
            this.state.selectedShape.strokeWidth(2);
            this.state.selectedShape.stroke('#2D3436');
            this.state.selectedShape = null;
            this.state.layer.draw();
        }
    },
    
    deleteSelected() {
        if (!this.state.selectedShape) return;
        
        this.state.selectedShape.destroy();
        this.state.shapes = this.state.shapes.filter(s => s !== this.state.selectedShape);
        this.state.selectedShape = null;
        this.state.layer.draw();
        this.saveHistory();
    },
    
    snapToGrid(pos) {
        if (!this.config.snapToGrid) return pos;
        
        const grid = this.config.gridSize;
        return {
            x: Math.round(pos.x / grid) * grid,
            y: Math.round(pos.y / grid) * grid
        };
    },
    
    updateCursor(pos) {
        // Atualizar informações do cursor
        const info = document.querySelector('.cad-cursor-info');
        if (info) {
            info.textContent = `X: ${Math.round(pos.x)} | Y: ${Math.round(pos.y)}`;
        }
    },
    
    updateToolUI(toolName) {
        document.querySelectorAll('.cad-tool').forEach(el => {
            el.classList.toggle('active', el.dataset.tool === toolName);
        });
    },
    
    setTool(toolName) {
        this.state.currentTool = toolName;
        this.updateToolUI(toolName);
        
        // Atualizar cursor
        const cursors = {
            select: 'default',
            rect: 'crosshair',
            circle: 'crosshair',
            line: 'crosshair',
            text: 'text'
        };
        this.state.stage.container().style.cursor = cursors[toolName] || 'default';
    },
    
    addShape(type, options = {}) {
        const pos = this.state.stage.getPointerPosition() || { x: 100, y: 100 };
        const snapPos = this.snapToGrid(pos);
        
        let shape;
        const colors = ['#2ECC71', '#3498DB', '#E74C3C', '#F39C12', '#9B59B6'];
        const color = options.color || colors[Math.floor(Math.random() * colors.length)];
        
        switch(type) {
            case 'rect':
                shape = new Konva.Rect({
                    x: snapPos.x,
                    y: snapPos.y,
                    width: options.width || 100,
                    height: options.height || 60,
                    fill: options.fill || color,
                    stroke: '#2D3436',
                    strokeWidth: 2,
                    cornerRadius: 4,
                    draggable: true
                });
                break;
                
            case 'circle':
                shape = new Konva.Circle({
                    x: snapPos.x,
                    y: snapPos.y,
                    radius: options.radius || 40,
                    fill: options.fill || color,
                    stroke: '#2D3436',
                    strokeWidth: 2,
                    draggable: true
                });
                break;
                
            case 'line':
                shape = new Konva.Line({
                    points: [
                        snapPos.x - 50, snapPos.y,
                        snapPos.x + 50, snapPos.y
                    ],
                    stroke: color,
                    strokeWidth: 3,
                    draggable: true,
                    lineCap: 'round',
                    lineJoin: 'round'
                });
                break;
                
            case 'text':
                shape = new Konva.Text({
                    x: snapPos.x,
                    y: snapPos.y,
                    text: options.text || 'Texto',
                    fontSize: options.fontSize || 16,
                    fontFamily: 'Inter',
                    fill: options.fill || '#1A2D4A',
                    draggable: true
                });
                break;
                
            default:
                return;
        }
        
        // Eventos
        shape.on('click', () => this.selectShape(shape));
        shape.on('dblclick', () => this.editShape(shape));
        shape.on('dragend', () => this.saveHistory());
        
        this.state.layer.add(shape);
        this.state.shapes.push(shape);
        this.state.layer.draw();
        
        this.selectShape(shape);
        this.saveHistory();
        
        return shape;
    },
    
    editShape(shape) {
        // Abrir modal de edição
        const modal = document.getElementById('cad-edit-modal');
        if (!modal) return;
        
        // Preencher dados
        const fill = document.querySelector('#cad-edit-fill');
        const stroke = document.querySelector('#cad-edit-stroke');
        const strokeWidth = document.querySelector('#cad-edit-stroke-width');
        
        if (fill) fill.value = shape.fill() || '#2ECC71';
        if (stroke) stroke.value = shape.stroke() || '#2D3436';
        if (strokeWidth) strokeWidth.value = shape.strokeWidth() || 2;
        
        // Salvar referência
        this.state.editingShape = shape;
        
        // Abrir modal
        modal.classList.add('active');
    },
    
    saveShapeEdit() {
        const shape = this.state.editingShape;
        if (!shape) return;
        
        const fill = document.querySelector('#cad-edit-fill');
        const stroke = document.querySelector('#cad-edit-stroke');
        const strokeWidth = document.querySelector('#cad-edit-stroke-width');
        
        if (fill) shape.fill(fill.value);
        if (stroke) shape.stroke(stroke.value);
        if (strokeWidth) shape.strokeWidth(parseFloat(strokeWidth.value));
        
        this.state.layer.draw();
        this.saveHistory();
        
        // Fechar modal
        const modal = document.getElementById('cad-edit-modal');
        if (modal) modal.classList.remove('active');
    },
    
    saveHistory() {
        const state = this.state.layer.toJSON();
        this.state.history = this.state.history.slice(0, this.state.historyIndex + 1);
        this.state.history.push(state);
        this.state.historyIndex++;
    },
    
    undo() {
        if (this.state.historyIndex <= 0) return;
        
        this.state.historyIndex--;
        const state = this.state.history[this.state.historyIndex];
        this.loadState(state);
    },
    
    redo() {
        if (this.state.historyIndex >= this.state.history.length - 1) return;
        
        this.state.historyIndex++;
        const state = this.state.history[this.state.historyIndex];
        this.loadState(state);
    },
    
    loadState(state) {
        this.state.layer.destroyChildren();
        this.state.shapes = [];
        
        // Carregar estado
        const tempLayer = Konva.Node.create(state, 'layer');
        tempLayer.getChildren().forEach(child => {
            if (child instanceof Konva.Shape) {
                child.on('click', () => this.selectShape(child));
                child.on('dblclick', () => this.editShape(child));
                child.on('dragend', () => this.saveHistory());
                this.state.shapes.push(child);
                this.state.layer.add(child);
            }
        });
        
        this.state.layer.draw();
        this.deselectShape();
    },
    
    clearAll() {
        if (!this.state.shapes.length) return;
        
        if (confirm('Tem certeza que deseja limpar o desenho?')) {
            this.state.layer.destroyChildren();
            this.state.shapes = [];
            this.state.layer.draw();
            this.saveHistory();
        }
    },
    
    exportImage(format = 'png') {
        const uri = this.state.stage.toDataURL({
            mimeType: `image/${format}`,
            pixelRatio: 2
        });
        
        const link = document.createElement('a');
        link.download = `desenho.${format}`;
        link.href = uri;
        link.click();
    },
    
    resize() {
        const container = this.state.stage.container();
        const rect = container.getBoundingClientRect();
        this.state.stage.width(rect.width);
        this.state.stage.height(rect.height);
        this.state.layer.draw();
    }
};

// ============================================
// EXPOSE GLOBALLY
// ============================================
window.CADEditor = CADEditor;

// ============================================
// INITIALIZE WHEN DOM READY
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('cad-container')) {
        CADEditor.init();
    }
});

// ============================================
// EXPORT FOR MODULE USAGE
// ============================================
if (typeof module !== 'undefined' && module.exports) {
    module.exports = CADEditor;
}