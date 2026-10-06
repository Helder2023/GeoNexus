<?php
// includes/individual/notificacoes-servicos.php
// Dropdown de notificações para o módulo de Serviços

if (!isset($notificacoes)) {
    include_once __DIR__ . "/notificacoes-servicos-count.php";
}

if (!isset($notificacoes_count)) {
    $notificacoes_count = 0;
    if (isset($notificacoes) && is_array($notificacoes)) {
        foreach ($notificacoes as $n) {
            if (isset($n['lida']) && $n['lida'] === false) $notificacoes_count++;
        }
    }
}

if (!function_exists('servicosIconColor')) {
    function servicosIconColor($class) {
        $colors = ['aurora' => '#6C2BD9', 'geo' => '#00D2FF', 'green' => '#00FFA3', 'yellow' => '#FFD93D', 'red' => '#FF6B6B', 'blue' => '#00D2FF'];
        return isset($colors[$class]) ? $colors[$class] : '#6B7A8F';
    }
}

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

if (!isset($notif_unique_id)) {
    $notif_unique_id = 'servicos_' . uniqid();
}
?>

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
        <div class="dropdown-header">
            <h3><i class="fas fa-bell"></i> Notificações de Serviços
                <?php if ($notificacoes_count > 0): ?>
                    <span class="badge-count"><?php echo $notificacoes_count; ?></span>
                <?php endif; ?>
            </h3>
            <button class="btn-close-dropdown" onclick="closeNotifications('<?php echo $notif_unique_id; ?>')" title="Fechar">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="dropdown-body" id="notifList_<?php echo $notif_unique_id; ?>">
            <?php if (empty($notificacoes)): ?>
                <div class="notificacao-vazia"><i class="fas fa-bell-slash"></i><p>Nenhuma notificação</p></div>
            <?php else: ?>
                <?php if (!empty($notif_nao_lidas)): ?>
                    <div class="notif-group">
                        <span class="notif-group-label">Não lidas</span>
                        <?php foreach ($notif_nao_lidas as $notif): 
                            $cor_icon = servicosIconColor(isset($notif['icon_class']) ? $notif['icon_class'] : 'geo');
                        ?>
                            <div class="notificacao-item nao-lida" 
                                 onclick="marcarNotificacaoLida(<?php echo $notif['id']; ?>, '<?php echo $notif_unique_id; ?>')"
                                 data-id="<?php echo $notif['id']; ?>">
                                <div class="notif-icon" style="background: <?php echo $cor_icon; ?>20; color: <?php echo $cor_icon; ?>;">
                                    <i class="fas <?php echo isset($notif['icon']) ? $notif['icon'] : 'fa-bell'; ?>"></i>
                                </div>
                                <div class="notif-conteudo">
                                    <p><?php echo isset($notif['mensagem']) ? $notif['mensagem'] : ''; ?></p>
                                    <span class="notif-tempo"><i class="far fa-clock"></i> <?php echo isset($notif['tempo']) ? $notif['tempo'] : ''; ?></span>
                                </div>
                                <span class="notif-dot"></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($notif_lidas)): ?>
                    <div class="notif-group">
                        <span class="notif-group-label">Lidas</span>
                        <?php foreach ($notif_lidas as $notif): 
                            $cor_icon = servicosIconColor(isset($notif['icon_class']) ? $notif['icon_class'] : 'geo');
                        ?>
                            <div class="notificacao-item lida" 
                                 onclick="marcarNotificacaoLida(<?php echo $notif['id']; ?>, '<?php echo $notif_unique_id; ?>')"
                                 data-id="<?php echo $notif['id']; ?>">
                                <div class="notif-icon" style="background: <?php echo $cor_icon; ?>20; color: <?php echo $cor_icon; ?>;">
                                    <i class="fas <?php echo isset($notif['icon']) ? $notif['icon'] : 'fa-bell'; ?>"></i>
                                </div>
                                <div class="notif-conteudo">
                                    <p><?php echo isset($notif['mensagem']) ? $notif['mensagem'] : ''; ?></p>
                                    <span class="notif-tempo"><i class="far fa-clock"></i> <?php echo isset($notif['tempo']) ? $notif['tempo'] : ''; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="dropdown-footer">
            <button class="btn btn-sm btn-link" onclick="marcarTodasLidas('<?php echo $notif_unique_id; ?>')">
                <i class="fas fa-check-double"></i> Marcar todas como lidas
            </button>
            <a href="../notificacoes.php" class="btn btn-sm btn-primary">
                Ver todas <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<script>
if (typeof window.notificacoesServicosInit === 'undefined') {
    window.notificacoesServicosInit = true;

    document.addEventListener('DOMContentLoaded', function() {
        const wrappers = document.querySelectorAll('.notifications-wrapper[data-notif-id]');
        wrappers.forEach(function(wrapper) {
            const notifId = wrapper.getAttribute('data-notif-id');
            const btn = document.getElementById('btnNotificacoes_' + notifId);
            const dropdown = document.getElementById('notificacoesDropdown_' + notifId);
            if (btn && dropdown) {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    document.querySelectorAll('.notifications-dropdown.active').forEach(function(d) {
                        if (d.id !== 'notificacoesDropdown_' + notifId) d.classList.remove('active');
                    });
                    dropdown.classList.toggle('active');
                });
            }
        });

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.notifications-wrapper')) {
                document.querySelectorAll('.notifications-dropdown.active').forEach(function(d) {
                    d.classList.remove('active');
                });
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.notifications-dropdown.active').forEach(function(d) {
                    d.classList.remove('active');
                });
            }
        });
    });
}

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

function marcarNotificacaoLida(id, notifId) {
    const wrapper = document.querySelector('.notifications-wrapper[data-notif-id="' + notifId + '"]');
    if (!wrapper) return;
    const item = wrapper.querySelector('.notificacao-item[data-id="' + id + '"]');
    if (item && item.classList.contains('nao-lida')) {
        item.classList.remove('nao-lida');
        item.classList.add('lida');
        const dot = item.querySelector('.notif-dot');
        if (dot) dot.remove();
        atualizarContadorNotif(notifId, -1);
        if (typeof mostrarToast === 'function') mostrarToast('Notificação marcada como lida', 'info');
    }
}

function marcarTodasLidas(notifId) {
    const wrapper = document.querySelector('.notifications-wrapper[data-notif-id="' + notifId + '"]');
    if (!wrapper) return;
    const naoLidas = wrapper.querySelectorAll('.notificacao-item.nao-lida');
    if (naoLidas.length === 0) {
        if (typeof mostrarToast === 'function') mostrarToast('Todas já estão lidas!', 'info');
        return;
    }
    naoLidas.forEach(function(item) {
        item.classList.remove('nao-lida');
        item.classList.add('lida');
        const dot = item.querySelector('.notif-dot');
        if (dot) dot.remove();
    });
    const badge = document.getElementById('notifBadge_' + notifId);
    if (badge) badge.style.display = 'none';
    if (typeof mostrarToast === 'function') mostrarToast('Todas as notificações marcadas como lidas', 'success');
    closeNotifications(notifId);
}

function atualizarContadorNotif(notifId, delta) {
    const badge = document.getElementById('notifBadge_' + notifId);
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
}
</script>

<style>
.notifications-wrapper {
    position: relative;
    display: inline-block;
    z-index: 9999;
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
    border-color: #00FFA3;
    color: #00FFA3;
    background: rgba(0, 255, 163, 0.05);
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
    z-index: 99999;
    overflow: hidden;
}

.notifications-dropdown.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

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

.dropdown-header h3 i { color: #00FFA3; }

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

.btn-close-dropdown:hover { background: var(--bg-card-hover); color: var(--text-primary); }

.dropdown-body { max-height: 400px; overflow-y: auto; padding: 8px; }
.dropdown-body::-webkit-scrollbar { width: 4px; }
.dropdown-body::-webkit-scrollbar-thumb { background: #00FFA3; border-radius: 2px; }

.notif-group { margin-bottom: 8px; }

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

.notificacao-item:hover { background: var(--bg-card-hover); }
.notificacao-item.nao-lida { background: rgba(0, 255, 163, 0.04); }
.notificacao-item.nao-lida:hover { background: rgba(0, 255, 163, 0.08); }

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

.notif-conteudo { flex: 1; min-width: 0; }

.notif-conteudo p {
    font-size: 13px;
    color: var(--text-secondary);
    margin: 0 0 4px 0;
    line-height: 1.4;
}

.notif-conteudo p strong { color: var(--text-primary); font-weight: 600; }

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
    background: #00FFA3;
    animation: pulse 2s ease-in-out infinite;
}

.notificacao-vazia {
    text-align: center;
    padding: 40px 20px;
    color: var(--text-muted);
}

.notificacao-vazia i { font-size: 40px; opacity: 0.3; margin-bottom: 12px; display: block; }
.notificacao-vazia p { font-size: 13px; margin: 0; }

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

.btn-link:hover { color: #00FFA3; background: rgba(0, 255, 163, 0.05); }

.dropdown-footer .btn-primary {
    background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
    color: #0A1628;
    border: none;
    font-weight: 600;
    font-size: 12px;
    padding: 6px 14px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.dropdown-footer .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0, 255, 163, 0.3); }

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(0.9); }
}

@media (max-width: 768px) {
    .notifications-dropdown { width: 320px; right: -60px; }
}

@media (max-width: 480px) {
    .notifications-dropdown { position: fixed; top: 60px; left: 10px; right: 10px; width: auto; max-width: none; }
    .dropdown-footer { flex-direction: column; }
    .dropdown-footer .btn-link, .dropdown-footer .btn-primary { width: 100%; justify-content: center; }
}
</style>