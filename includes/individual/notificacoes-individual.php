<?php
// includes/notificacoes-individual.php
// Dropdown de notificações para a sessão Individual

// ============================================
// GARANTIR QUE AS NOTIFICAÇÕES ESTEJAM DISPONÍVEIS
// ============================================
if (!isset($notificacoes)) {
    include_once __DIR__ . "/notificacoes-individual-count.php";
}

// ============================================
// GARANTIR QUE O CONTADOR ESTEJA DEFINIDO
// ============================================
if (!isset($notificacoes_count)) {
    $notificacoes_count = 0;
    if (isset($notificacoes) && is_array($notificacoes)) {
        foreach ($notificacoes as $n) {
            if (isset($n['lida']) && $n['lida'] === false) {
                $notificacoes_count++;
            }
        }
    }
}

// ============================================
// FUNÇÃO AUXILIAR - COR DO ÍCONE
// ============================================
if (!function_exists('individualIconColor')) {
    function individualIconColor($class) {
        $colors = [
            'aurora' => '#6C2BD9',
            'geo' => '#00D2FF',
            'green' => '#00FFA3',
            'yellow' => '#FFD93D',
            'red' => '#FF6B6B',
            'blue' => '#00D2FF',
        ];
        return isset($colors[$class]) ? $colors[$class] : '#6B7A8F';
    }
}

// ============================================
// SEPARAR NOTIFICAÇÕES LIDAS E NÃO LIDAS
// ============================================
$notif_nao_lidas = [];
$notif_lidas = [];

if (isset($notificacoes) && is_array($notificacoes)) {
    foreach ($notificacoes as $notif) {
        if (isset($notif['lida']) && $notif['lida'] === true) {
            $notif_lidas[] = $notif;
        } else {
            $notif_nao_lidas[] = $notif;
        }
    }
}

// ============================================
// GARANTIR QUE O ID ÚNICO EXISTA (para múltiplos includes na mesma página)
// ============================================
if (!isset($notif_unique_id)) {
    $notif_unique_id = 'notif_' . uniqid();
}
?>

<!-- ========================================== -->
<!-- NOTIFICAÇÕES - DROPDOWN                    -->
<!-- ========================================== -->
<div class="notifications-wrapper" data-notif-id="<?php echo $notif_unique_id; ?>">
    <button class="btn-notificacoes" id="btnNotificacoes_<?php echo $notif_unique_id; ?>" title="Notificações">
        <i class="fas fa-bell"></i>
        <?php if ($notificacoes_count > 0): ?>
            <span class="badge" id="notifBadge_<?php echo $notif_unique_id; ?>"><?php echo $notificacoes_count; ?></span>
        <?php else: ?>
            <span class="badge" id="notifBadge_<?php echo $notif_unique_id; ?>" style="display: none;">0</span>
        <?php endif; ?>
    </button>

    <div class="notifications-dropdown" id="notificacoesDropdown_<?php echo $notif_unique_id; ?>">
        <!-- Header -->
        <div class="dropdown-header">
            <h3>
                <i class="fas fa-bell"></i>
                Notificações
                <?php if ($notificacoes_count > 0): ?>
                    <span class="badge-count" id="notifBadgeCount_<?php echo $notif_unique_id; ?>"><?php echo $notificacoes_count; ?></span>
                <?php endif; ?>
            </h3>
            <button class="btn-close-dropdown" onclick="closeNotifications('<?php echo $notif_unique_id; ?>')" title="Fechar">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="dropdown-body" id="notifList_<?php echo $notif_unique_id; ?>">
            <?php if (empty($notificacoes)): ?>
                <div class="notificacao-vazia">
                    <i class="fas fa-bell-slash"></i>
                    <p>Nenhuma notificação</p>
                </div>
            <?php else: ?>

                <?php if (!empty($notif_nao_lidas)): ?>
                    <div class="notif-group">
                        <span class="notif-group-label">Não lidas</span>
                        <?php foreach ($notif_nao_lidas as $notif): ?>
                            <?php 
                            $cor_icon = individualIconColor(isset($notif['icon_class']) ? $notif['icon_class'] : 'geo');
                            ?>
                            <div class="notificacao-item nao-lida" 
                                 onclick="marcarNotificacaoLida(<?php echo $notif['id']; ?>, '<?php echo $notif_unique_id; ?>')"
                                 data-id="<?php echo $notif['id']; ?>">
                                <div class="notif-icon" style="background: <?php echo $cor_icon; ?>20; color: <?php echo $cor_icon; ?>;">
                                    <i class="fas <?php echo isset($notif['icon']) ? $notif['icon'] : 'fa-bell'; ?>"></i>
                                </div>
                                <div class="notif-conteudo">
                                    <p><?php echo isset($notif['mensagem']) ? $notif['mensagem'] : ''; ?></p>
                                    <span class="notif-tempo">
                                        <i class="far fa-clock"></i> <?php echo isset($notif['tempo']) ? $notif['tempo'] : ''; ?>
                                    </span>
                                </div>
                                <span class="notif-dot"></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($notif_lidas)): ?>
                    <div class="notif-group">
                        <span class="notif-group-label">Lidas</span>
                        <?php foreach ($notif_lidas as $notif): ?>
                            <?php 
                            $cor_icon = individualIconColor(isset($notif['icon_class']) ? $notif['icon_class'] : 'geo');
                            ?>
                            <div class="notificacao-item lida" 
                                 onclick="marcarNotificacaoLida(<?php echo $notif['id']; ?>, '<?php echo $notif_unique_id; ?>')"
                                 data-id="<?php echo $notif['id']; ?>">
                                <div class="notif-icon" style="background: <?php echo $cor_icon; ?>20; color: <?php echo $cor_icon; ?>;">
                                    <i class="fas <?php echo isset($notif['icon']) ? $notif['icon'] : 'fa-bell'; ?>"></i>
                                </div>
                                <div class="notif-conteudo">
                                    <p><?php echo isset($notif['mensagem']) ? $notif['mensagem'] : ''; ?></p>
                                    <span class="notif-tempo">
                                        <i class="far fa-clock"></i> <?php echo isset($notif['tempo']) ? $notif['tempo'] : ''; ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Footer -->
        <div class="dropdown-footer">
            <button class="btn btn-sm btn-link" onclick="marcarTodasLidas('<?php echo $notif_unique_id; ?>')">
                <i class="fas fa-check-double"></i>
                Marcar todas como lidas
            </button>
            <a href="notificacoes.php" class="btn btn-sm btn-primary">
                Ver todas
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- JAVASCRIPT DAS NOTIFICAÇÕES                -->
<!-- ========================================== -->
<script>
// ============================================
// PREVENIR MÚLTIPLAS INICIALIZAÇÕES
// ============================================
if (typeof window.notificacoesIndividualInit === 'undefined') {
    window.notificacoesIndividualInit = true;

    // ============================================
    // TOGGLE DO DROPDOWN DE NOTIFICAÇÕES
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar todos os wrappers de notificações na página
        const wrappers = document.querySelectorAll('.notifications-wrapper[data-notif-id]');
        
        wrappers.forEach(function(wrapper) {
            const notifId = wrapper.getAttribute('data-notif-id');
            const btn = document.getElementById('btnNotificacoes_' + notifId);
            const dropdown = document.getElementById('notificacoesDropdown_' + notifId);

            if (btn && dropdown) {
                // Remover listeners anteriores (se existirem)
                btn.replaceWith(btn.cloneNode(true));
                const newBtn = document.getElementById('btnNotificacoes_' + notifId);
                
                newBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    
                    // Fechar outros dropdowns abertos
                    document.querySelectorAll('.notifications-dropdown.active').forEach(function(d) {
                        if (d.id !== 'notificacoesDropdown_' + notifId) {
                            d.classList.remove('active');
                        }
                    });
                    
                    dropdown.classList.toggle('active');
                });
            }
        });

        // Fechar ao clicar fora
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.notifications-wrapper')) {
                document.querySelectorAll('.notifications-dropdown.active').forEach(function(d) {
                    d.classList.remove('active');
                });
            }
        });

        // Fechar com tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.notifications-dropdown.active').forEach(function(d) {
                    d.classList.remove('active');
                });
            }
        });
    });
}

// ============================================
// FECHAR NOTIFICAÇÕES
// ============================================
function closeNotifications(notifId) {
    if (notifId) {
        const dropdown = document.getElementById('notificacoesDropdown_' + notifId);
        if (dropdown) dropdown.classList.remove('active');
    } else {
        document.querySelectorAll('.notifications-dropdown.active').forEach(function(d) {
            d.classList.remove('active');
        });
    }
}

// ============================================
// MARCAR NOTIFICAÇÃO COMO LIDA
// ============================================
function marcarNotificacaoLida(id, notifId) {
    // Encontrar o item
    const wrapper = document.querySelector('.notifications-wrapper[data-notif-id="' + notifId + '"]');
    if (!wrapper) return;

    const item = wrapper.querySelector('.notificacao-item[data-id="' + id + '"]');
    if (item && item.classList.contains('nao-lida')) {
        item.classList.remove('nao-lida');
        item.classList.add('lida');
        
        // Remover o dot
        const dot = item.querySelector('.notif-dot');
        if (dot) dot.remove();
        
        // Decrementar o contador
        atualizarContadorNotif(notifId, -1);
        
        // Mover para o grupo de "Lidas"
        const lidasGroup = wrapper.querySelector('.notif-group:last-child');
        const naoLidasGroup = wrapper.querySelector('.notif-group:first-child');
        
        if (lidasGroup && lidasGroup.querySelector('.notif-group-label') && 
            lidasGroup.querySelector('.notif-group-label').textContent.trim() === 'Lidas') {
            // Já existe grupo de lidas
            lidasGroup.appendChild(item);
        } else if (naoLidasGroup) {
            // Criar grupo de lidas
            const newGroup = document.createElement('div');
            newGroup.className = 'notif-group';
            newGroup.innerHTML = '<span class="notif-group-label">Lidas</span>';
            newGroup.appendChild(item);
            wrapper.querySelector('.dropdown-body').appendChild(newGroup);
        }
        
        // Se o grupo de não lidas ficar vazio, remover
        if (naoLidasGroup && naoLidasGroup.querySelectorAll('.notificacao-item').length === 0) {
            naoLidasGroup.remove();
        }
    }
    
    // Mostrar toast
    if (typeof mostrarToast === 'function') {
        mostrarToast('Notificação marcada como lida', 'info');
    }
}

// ============================================
// MARCAR TODAS COMO LIDAS
// ============================================
function marcarTodasLidas(notifId) {
    const wrapper = document.querySelector('.notifications-wrapper[data-notif-id="' + notifId + '"]');
    if (!wrapper) return;

    const naoLidas = wrapper.querySelectorAll('.notificacao-item.nao-lida');
    
    if (naoLidas.length === 0) {
        if (typeof mostrarToast === 'function') {
            mostrarToast('Todas já estão lidas!', 'info');
        }
        return;
    }
    
    naoLidas.forEach(function(item) {
        item.classList.remove('nao-lida');
        item.classList.add('lida');
        const dot = item.querySelector('.notif-dot');
        if (dot) dot.remove();
    });
    
    // Atualizar contador
    const badge = document.getElementById('notifBadge_' + notifId);
    const badgeCount = document.getElementById('notifBadgeCount_' + notifId);
    
    if (badge) badge.style.display = 'none';
    if (badgeCount) badgeCount.remove();
    
    // Reorganizar grupos
    const dropdownBody = wrapper.querySelector('.dropdown-body');
    const naoLidasGroup = wrapper.querySelector('.notif-group:first-child');
    const lidasGroup = wrapper.querySelector('.notif-group:last-child');
    
    // Se o grupo de não lidas existir, mover todos os itens para o grupo de lidas
    if (naoLidasGroup && naoLidasGroup.querySelector('.notif-group-label') && 
        naoLidasGroup.querySelector('.notif-group-label').textContent.trim() === 'Não lidas') {
        
        const lidasItems = naoLidasGroup.querySelectorAll('.notificacao-item');
        
        if (lidasGroup && lidasGroup.querySelector('.notif-group-label') &&
            lidasGroup.querySelector('.notif-group-label').textContent.trim() === 'Lidas') {
            // Mover para o grupo de lidas existente
            lidasItems.forEach(function(item) {
                lidasGroup.appendChild(item);
            });
        } else {
            // Renomear o grupo para "Lidas"
            naoLidasGroup.querySelector('.notif-group-label').textContent = 'Lidas';
        }
    }
    
    if (typeof mostrarToast === 'function') {
        mostrarToast('Todas as notificações marcadas como lidas', 'success');
    }
    
    // Fechar dropdown
    closeNotifications(notifId);
}

// ============================================
// ATUALIZAR CONTADOR DE NOTIFICAÇÕES
// ============================================
function atualizarContadorNotif(notifId, delta) {
    const badge = document.getElementById('notifBadge_' + notifId);
    const badgeCount = document.getElementById('notifBadgeCount_' + notifId);
    
    if (badge) {
        let current = parseInt(badge.textContent) || 0;
        let newValue = Math.max(0, current + delta);
        
        if (newValue > 0) {
            badge.textContent = newValue;
            badge.style.display = 'flex';
        } else {
            badge.style.display = 'none';
        }
    }
    
    if (badgeCount) {
        let current = parseInt(badgeCount.textContent) || 0;
        let newValue = Math.max(0, current + delta);
        
        if (newValue > 0) {
            badgeCount.textContent = newValue;
        } else {
            badgeCount.remove();
        }
    }
    
    // Atualizar badge do bottom nav se existir
    const bottomBadge = document.getElementById('bottomNotifBadge');
    if (bottomBadge && delta < 0) {
        let current = parseInt(bottomBadge.textContent) || 0;
        let newValue = Math.max(0, current + delta);
        bottomBadge.textContent = newValue;
        bottomBadge.style.display = newValue > 0 ? 'flex' : 'none';
    }
}
</script>

<style>
/* ========================================== */
/* NOTIFICAÇÕES - CSS                         */
/* ========================================== */

.notifications-wrapper {
    position: relative;
    display: inline-block;
}

.btn-notificacoes {
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    background: var(--bg-card);
    color: var(--text-secondary);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    transition: var(--transition-smooth);
}

.btn-notificacoes:hover {
    border-color: #00D2FF;
    color: #00D2FF;
    background: rgba(0, 210, 255, 0.05);
}

.btn-notificacoes .badge {
    position: absolute;
    top: -6px;
    right: -6px;
    background: #FF6B6B;
    color: #FFFFFF;
    font-size: 9px;
    font-weight: 700;
    min-width: 18px;
    height: 18px;
    padding: 0 4px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid var(--bg-card);
}

/* ===== DROPDOWN ===== */
.notifications-dropdown {
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    width: 380px;
    max-width: calc(100vw - 20px);
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-lg);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 9999;
    overflow: hidden;
}

.notifications-dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* ===== HEADER ===== */
.dropdown-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
    background: var(--bg-card);
}

.dropdown-header h3 {
    font-family: var(--font-title);
    font-size: 15px;
    font-weight: 600;
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}

.dropdown-header h3 i {
    color: #00D2FF;
}

.dropdown-header .badge-count {
    background: #FF6B6B;
    color: #FFFFFF;
    font-size: 10px;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: var(--radius-full);
    min-width: 20px;
    text-align: center;
}

.btn-close-dropdown {
    background: none;
    border: none;
    color: var(--text-muted);
    cursor: pointer;
    width: 28px;
    height: 28px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition-smooth);
    font-size: 14px;
}

.btn-close-dropdown:hover {
    background: var(--bg-card-hover);
    color: var(--text-primary);
}

/* ===== BODY ===== */
.dropdown-body {
    max-height: 400px;
    overflow-y: auto;
    padding: 8px;
}

.dropdown-body::-webkit-scrollbar {
    width: 4px;
}

.dropdown-body::-webkit-scrollbar-thumb {
    background: #00D2FF;
    border-radius: 2px;
}

.notif-group {
    margin-bottom: 8px;
}

.notif-group-label {
    display: block;
    padding: 8px 12px 4px;
    font-size: 10px;
    font-weight: 600;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.notificacao-item {
    display: flex;
    gap: 12px;
    padding: 12px;
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: var(--transition-smooth);
    position: relative;
    margin-bottom: 2px;
}

.notificacao-item:hover {
    background: var(--bg-card-hover);
}

.notificacao-item.nao-lida {
    background: rgba(0, 210, 255, 0.04);
}

.notificacao-item.nao-lida:hover {
    background: rgba(0, 210, 255, 0.08);
}

.notif-icon {
    width: 36px;
    height: 36px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
}

.notif-conteudo {
    flex: 1;
    min-width: 0;
}

.notif-conteudo p {
    font-size: 13px;
    color: var(--text-secondary);
    margin: 0 0 4px 0;
    line-height: 1.4;
}

.notif-conteudo p strong {
    color: var(--text-primary);
    font-weight: 600;
}

.notif-tempo {
    font-size: 11px;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 4px;
}

.notif-dot {
    position: absolute;
    top: 16px;
    right: 12px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #00D2FF;
    animation: pulse 2s ease-in-out infinite;
}

/* ===== VAZIO ===== */
.notificacao-vazia {
    text-align: center;
    padding: 40px 20px;
    color: var(--text-muted);
}

.notificacao-vazia i {
    font-size: 40px;
    opacity: 0.3;
    margin-bottom: 12px;
    display: block;
}

.notificacao-vazia p {
    font-size: 13px;
    margin: 0;
}

/* ===== FOOTER ===== */
.dropdown-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    border-top: 1px solid var(--border-color);
    background: var(--bg-card);
    gap: 8px;
}

.btn-link {
    background: none;
    border: none;
    color: var(--text-muted);
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: var(--radius-sm);
    transition: var(--transition-smooth);
}

.btn-link:hover {
    color: #00D2FF;
    background: rgba(0, 210, 255, 0.05);
}

.dropdown-footer .btn-primary {
    background: linear-gradient(135deg, #00D2FF 0%, #00FFA3 100%);
    color: #0A1628;
    border: none;
    font-weight: 600;
    font-size: 12px;
    padding: 6px 14px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.dropdown-footer .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 210, 255, 0.3);
}

/* ========================================== */
/* RESPONSIVIDADE                             */
/* ========================================== */

@media (max-width: 768px) {
    .notifications-dropdown {
        width: 320px;
        right: -60px;
    }
}

@media (max-width: 480px) {
    .notifications-dropdown {
        position: fixed;
        top: 60px;
        left: 10px;
        right: 10px;
        width: auto;
        max-width: none;
    }
    
    .dropdown-footer {
        flex-direction: column;
    }
    
    .dropdown-footer .btn-link,
    .dropdown-footer .btn-primary {
        width: 100%;
        justify-content: center;
    }
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(0.9); }
}
</style>