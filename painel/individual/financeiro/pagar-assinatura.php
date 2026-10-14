<?php
// painel/individual/financeiro/pagar-assinatura.php - Pagar Assinatura
include "../../../includes/individual/notificacoes-financeiro-count.php";

// ============================================
// DEFINIÇÃO DA PÁGINA
// ============================================
$titulo_pagina = 'Pagar Assinatura';
$pagina_atual = 'assinatura';

// ============================================
// FALLBACK DE VARIÁVEIS
// ============================================
if (!isset($valor_receber)) $valor_receber = 850000;
if (!isset($total_faturas_pendentes)) $total_faturas_pendentes = 12;

// ============================================
// DADOS MOCKADOS - ASSINATURA ATUAL
// ============================================
$assinatura = [
    'id' => 1,
    'plano' => 'Pro',
    'plano_icon' => 'fa-crown',
    'plano_color' => '#FFD93D',
    'valor' => 25000,
    'periodo' => 'Mensal',
    'status' => 'ativo',
    'status_label' => 'Ativo',
    'data_inicio' => '2025-06-15',
    'data_proximo_pagamento' => '2026-02-28',
    'dias_restantes' => 10,
    'metodo_pagamento_atual' => 'Multicaixa',
    'referencia_atual' => 'MCX-2026-0156',
    'renovacao_automatica' => true,
    'features' => [
        'Acesso a 20 projetos',
        '3 utilizadores',
        '20 GB de armazenamento',
        'Suporte prioritário',
        'Relatórios avançados'
    ]
];

// ============================================
// MÉTODOS DE PAGAMENTO (APENAS 2)
// ============================================
$metodos_pagamento = [
    [
        'id' => 'multicaixa',
        'nome' => 'Multicaixa Express',
        'descricao' => 'Pagamento via aplicação Multicaixa Express',
        'icon' => 'fa-credit-card',
        'color' => '#00D2FF',
        'tempo' => 'Confirmação em minutos',
        'codigo_servico' => 'GEONEXUS-2026',
        'instrucoes' => [
            'Abra a aplicação Multicaixa Express no seu telemóvel',
            'Selecione a opção "Pagar Serviços"',
            'Introduza o código de serviço abaixo',
            'Introduza a referência que será gerada',
            'Confirme o valor e o pagamento',
            'Guarde o comprovativo para upload'
        ]
    ],
    [
        'id' => 'transferencia',
        'nome' => 'Transferência Bancária',
        'descricao' => 'Transferência para conta bancária GeoNexus',
        'icon' => 'fa-university',
        'color' => '#6C2BD9',
        'tempo' => 'Confirmação em 1-2 dias úteis',
        'dados_bancarios' => [
            'Banco' => 'Banco BAI',
            'IBAN' => 'AO06 0040 0000 1234 5678 9012 3',
            'Titular' => 'GeoNexus - Tecnologias Lda',
            'NIF' => '5417896321',
            'Referência' => 'ASSINATURA-' . strtoupper('PRO')
        ],
        'instrucoes' => [
            'Aceda ao seu homebanking ou app do banco',
            'Escolha a opção "Transferência"',
            'Introduza os dados bancários abaixo',
            'Use a referência indicada',
            'Confirme o valor e efetue a transferência',
            'Guarde o comprovativo para upload'
        ]
    ]
];

// ============================================
// FATURAS PENDENTES DE ASSINATURA
// ============================================
$faturas_pendentes = [
    [
        'id' => 1,
        'numero' => 'FT-2026-0156',
        'periodo' => 'Fevereiro 2026',
        'valor' => 25000,
        'vencimento' => '2026-02-28',
        'dias_restantes' => 10,
        'status' => 'pendente'
    ]
];

// ============================================
// HISTÓRICO DE PAGAMENTOS
// ============================================
$historico_pagamentos = [
    [
        'id' => 1,
        'periodo' => 'Janeiro 2026',
        'valor' => 25000,
        'data_pagamento' => '2026-01-28 10:30:00',
        'metodo' => 'Multicaixa',
        'referencia' => 'MCX-2026-0125',
        'comprovativo' => 'comprovativo-001.pdf',
        'status' => 'confirmado'
    ],
    [
        'id' => 2,
        'periodo' => 'Dezembro 2025',
        'valor' => 25000,
        'data_pagamento' => '2025-12-28 14:20:00',
        'metodo' => 'Transferência',
        'referencia' => 'TRF-2025-0892',
        'comprovativo' => 'comprovativo-002.pdf',
        'status' => 'confirmado'
    ],
    [
        'id' => 3,
        'periodo' => 'Novembro 2025',
        'valor' => 25000,
        'data_pagamento' => '2025-11-28 09:15:00',
        'metodo' => 'Multicaixa',
        'referencia' => 'MCX-2025-0745',
        'comprovativo' => 'comprovativo-003.pdf',
        'status' => 'confirmado'
    ]
];

// ============================================
// FUNÇÕES AUXILIARES
// ============================================
if (!function_exists('formatMoney')) {
    function formatMoney($value) {
        return number_format($value, 0, ',', '.');
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date) {
        if (empty($date)) return 'N/A';
        return date('d/m/Y', strtotime($date));
    }
}

if (!function_exists('formatDateTime')) {
    function formatDateTime($datetime) {
        if (empty($datetime)) return 'N/A';
        return date('d/m/Y H:i', strtotime($datetime));
    }
}

if (!function_exists('getAvatarUrl')) {
    function getAvatarUrl($name) {
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=00D2FF&color=fff&size=80';
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<?php include "../../../includes/individual/financeiro-head.php" ?>

<body>
    <div class="app-container">
        <div id="toast-container" class="toast-container"></div>
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <?php include "../../../includes/individual/financeiro-sidebar.php" ?>

        <main class="main-content">
            <!-- ===== PAGE HEADER ===== -->
            <header class="page-header">
                <div class="header-left">
                    <h1>
                        <i class="fas fa-crown icon" style="color: #FFD93D;"></i>
                        <?php echo $titulo_pagina; ?>
                    </h1>
                    <p class="breadcrumb">
                        <a href="../index.php">Dashboard</a>
                        <span class="separator">/</span>
                        <a href="index.php">Financeiro</a>
                        <span class="separator">/</span>
                        <span>Pagar Assinatura</span>
                    </p>
                </div>
                <div class="header-right">
                    <button class="btn-theme" id="btnTheme" title="Alternar tema">
                        <i class="fas fa-sun theme-icon sun"></i>
                        <i class="fas fa-moon theme-icon moon"></i>
                    </button>

                    <?php include "../../../includes/individual/notificacoes-financeiro.php" ?>

                    <a href="index.php" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </header>

            <!-- ===== AVISO DE PAGAMENTO PENDENTE ===== -->
            <?php if (!empty($faturas_pendentes)): ?>
                <section class="aviso-pendente animate-fade-up">
                    <div class="aviso-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="aviso-conteudo">
                        <h3>Atenção! Tem uma fatura pendente</h3>
                        <p>
                            A sua assinatura <strong><?php echo $assinatura['plano']; ?></strong> tem uma fatura pendente no valor de 
                            <strong>Kz <?php echo formatMoney($faturas_pendentes[0]['valor']); ?></strong> que vence em 
                            <strong><?php echo $faturas_pendentes[0]['dias_restantes']; ?> dias</strong>.
                        </p>
                    </div>
                </section>
            <?php endif; ?>

            <!-- ===== STATS CARDS ===== -->
            <section class="stats-grid animate-fade-up" style="animation-delay: 0.1s;">
                <div class="stat-card">
                    <div class="icon yellow">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="value"><?php echo $assinatura['plano']; ?></div>
                    <div class="label">Plano Atual</div>
                    <div class="trend up">
                        <i class="fas fa-check-circle"></i> Ativo
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon green">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="value">Kz <?php echo formatMoney($assinatura['valor']); ?></div>
                    <div class="label">Valor Mensal</div>
                    <div class="trend neutral">
                        <i class="fas fa-calendar"></i> <?php echo $assinatura['periodo']; ?>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon blue">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="value"><?php echo $assinatura['dias_restantes']; ?> dias</div>
                    <div class="label">Próximo Pagamento</div>
                    <div class="trend up">
                        <i class="fas fa-clock"></i> <?php echo formatDate($assinatura['data_proximo_pagamento']); ?>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon aurora">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="value" style="font-size: var(--text-h4);"><?php echo $assinatura['metodo_pagamento_atual']; ?></div>
                    <div class="label">Método Atual</div>
                    <div class="trend up">
                        <i class="fas fa-check"></i> Verificado
                    </div>
                </div>
            </section>

            <!-- ===== CONTEÚDO PRINCIPAL ===== -->
            <div class="pagamento-grid">

                <!-- ===== COLUNA PRINCIPAL ===== -->
                <div class="pagamento-coluna-principal">

                    <!-- ===== CARD DO PLANO ATUAL ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.15s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-crown" style="color: #FFD93D;"></i>
                                Assinatura Atual
                            </h3>
                        </div>
                        <div class="plano-detalhe">
                            <div class="plano-header">
                                <div class="plano-icon" style="background: <?php echo $assinatura['plano_color']; ?>20; color: <?php echo $assinatura['plano_color']; ?>;">
                                    <i class="fas <?php echo $assinatura['plano_icon']; ?>"></i>
                                </div>
                                <div class="plano-info">
                                    <h4 class="plano-nome">Plano <?php echo $assinatura['plano']; ?></h4>
                                    <span class="plano-status">
                                        <i class="fas fa-check-circle"></i> <?php echo $assinatura['status_label']; ?>
                                    </span>
                                </div>
                                <div class="plano-valor">
                                    <span class="plano-valor-numero">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                                    <span class="plano-valor-periodo">/ <?php echo $assinatura['periodo']; ?></span>
                                </div>
                            </div>

                            <div class="plano-features">
                                <h5><i class="fas fa-list-check"></i> O que está incluído</h5>
                                <ul class="features-list">
                                    <?php foreach ($assinatura['features'] as $feature): ?>
                                        <li>
                                            <i class="fas fa-check-circle"></i>
                                            <span><?php echo $feature; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="plano-datas">
                                <div class="plano-data-item">
                                    <span class="plano-data-label">
                                        <i class="fas fa-calendar-plus"></i> Início
                                    </span>
                                    <span class="plano-data-value"><?php echo formatDate($assinatura['data_inicio']); ?></span>
                                </div>
                                <div class="plano-data-item">
                                    <span class="plano-data-label">
                                        <i class="fas fa-calendar-check"></i> Próximo Pagamento
                                    </span>
                                    <span class="plano-data-value" style="color: #FFD93D;">
                                        <?php echo formatDate($assinatura['data_proximo_pagamento']); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== MÉTODOS DE PAGAMENTO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.2s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-credit-card" style="color: #00D2FF;"></i>
                                Escolher Método de Pagamento
                            </h3>
                        </div>
                        <div class="metodos-container">
                            <div class="metodos-grid" id="metodosGrid">
                                <?php foreach ($metodos_pagamento as $metodo): ?>
                                    <div class="metodo-card" 
                                         data-metodo="<?php echo $metodo['id']; ?>"
                                         onclick="selecionarMetodo('<?php echo $metodo['id']; ?>')"
                                         style="--metodo-color: <?php echo $metodo['color']; ?>;">
                                        <div class="metodo-radio">
                                            <span class="radio-mark"></span>
                                        </div>
                                        <div class="metodo-icon" style="background: <?php echo $metodo['color']; ?>20; color: <?php echo $metodo['color']; ?>;">
                                            <i class="fas <?php echo $metodo['icon']; ?>"></i>
                                        </div>
                                        <div class="metodo-info">
                                            <span class="metodo-nome"><?php echo $metodo['nome']; ?></span>
                                            <span class="metodo-descricao"><?php echo $metodo['descricao']; ?></span>
                                            <div class="metodo-meta">
                                                <span class="metodo-tempo">
                                                    <i class="fas fa-clock"></i> <?php echo $metodo['tempo']; ?>
                                                </span>
                                                <span class="metodo-taxa" style="color: #00FFA3;">
                                                    <i class="fas fa-check"></i> Sem taxa
                                                </span>
                                            </div>
                                        </div>
                                        <div class="metodo-check">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DADOS MULTICAIXA ===== -->
                    <div class="card metodo-especifico animate-fade-up" id="dadosMulticaixa" style="display: none; animation-delay: 0.25s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-credit-card" style="color: #00D2FF;"></i>
                                Dados do Multicaixa Express
                            </h3>
                        </div>
                        <div class="metodo-dados">
                            <div class="metodo-dados-info">
                                <i class="fas fa-info-circle"></i>
                                <div>
                                    <strong>Como pagar com Multicaixa Express:</strong>
                                    <ol>
                                        <?php foreach ($metodos_pagamento[0]['instrucoes'] as $passo): ?>
                                            <li><?php echo $passo; ?></li>
                                        <?php endforeach; ?>
                                    </ol>
                                </div>
                            </div>

                            <div class="dados-grid-2">
                                <div class="dados-item">
                                    <span class="dados-label">Código de Serviço</span>
                                    <div class="codigo-box">
                                        <span id="codigoServico"><?php echo $metodos_pagamento[0]['codigo_servico']; ?></span>
                                        <button class="btn-copy" onclick="copiarCodigo('codigoServico')" title="Copiar">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="dados-item">
                                    <span class="dados-label">Referência de Pagamento</span>
                                    <div class="codigo-box">
                                        <span id="referenciaMulticaixa">MCX-<?php echo date('Ymd'); ?>-<?php echo rand(1000, 9999); ?></span>
                                        <button class="btn-copy" onclick="copiarCodigo('referenciaMulticaixa')" title="Copiar">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="metodo-valor-destaque">
                                <span class="metodo-valor-label">Valor a Pagar</span>
                                <span class="metodo-valor-numero">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== DADOS TRANSFERÊNCIA ===== -->
                    <div class="card metodo-especifico animate-fade-up" id="dadosTransferencia" style="display: none; animation-delay: 0.25s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-university" style="color: #6C2BD9;"></i>
                                Dados da Transferência Bancária
                            </h3>
                        </div>
                        <div class="metodo-dados">
                            <div class="metodo-dados-info">
                                <i class="fas fa-info-circle"></i>
                                <div>
                                    <strong>Como efetuar a transferência:</strong>
                                    <ol>
                                        <?php foreach ($metodos_pagamento[1]['instrucoes'] as $passo): ?>
                                            <li><?php echo $passo; ?></li>
                                        <?php endforeach; ?>
                                    </ol>
                                </div>
                            </div>

                            <div class="dados-bancarios-grid">
                                <?php foreach ($metodos_pagamento[1]['dados_bancarios'] as $label => $valor): ?>
                                    <div class="dados-bancarios-item">
                                        <span class="dados-label"><?php echo $label; ?></span>
                                        <div class="dados-value-wrapper">
                                            <span class="dados-value" id="dados_<?php echo strtolower(str_replace(' ', '_', $label)); ?>">
                                                <?php echo $valor; ?>
                                            </span>
                                            <button class="btn-copy" onclick="copiarCodigo('dados_<?php echo strtolower(str_replace(' ', '_', $label)); ?>')" title="Copiar">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="metodo-valor-destaque">
                                <span class="metodo-valor-label">Valor a Transferir</span>
                                <span class="metodo-valor-numero">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== UPLOAD DE COMPROVATIVO ===== -->
                    <div class="card metodo-especifico animate-fade-up" id="dadosComprovativo" style="display: none; animation-delay: 0.3s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-cloud-upload-alt" style="color: #00FFA3;"></i>
                                Enviar Comprovativo
                                <span class="badge-required">Obrigatório</span>
                            </h3>
                        </div>
                        <div class="metodo-dados">
                            <div class="comprovativo-info">
                                <i class="fas fa-info-circle"></i>
                                <div>
                                    <strong>Após efetuar o pagamento, envie o comprovativo</strong>
                                    <p>O seu pagamento será validado assim que recebermos o comprovativo. Formatos aceites: PDF, JPG, PNG (máx. 5MB).</p>
                                </div>
                            </div>

                            <div class="upload-area" id="uploadArea" onclick="document.getElementById('comprovativoInput').click()">
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="upload-content">
                                    <span class="upload-title">Clique para anexar o comprovativo</span>
                                    <span class="upload-subtitle">PDF, JPG ou PNG até 5MB</span>
                                </div>
                                <input type="file" id="comprovativoInput" accept=".pdf,.jpg,.jpeg,.png" style="display: none;" onchange="previewComprovativo(event)">
                            </div>

                            <!-- Preview do Comprovativo -->
                            <div class="comprovativo-preview" id="comprovativoPreview" style="display: none;">
                                <div class="comprovativo-preview-header">
                                    <span class="comprovativo-preview-titulo">
                                        <i class="fas fa-check-circle" style="color: #00FFA3;"></i>
                                        Comprovativo Anexado
                                    </span>
                                    <button class="btn-remover-comprovativo" onclick="removerComprovativo()" title="Remover">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="comprovativo-preview-content">
                                    <div class="comprovativo-file-icon" id="comprovativoFileIcon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="comprovativo-file-info">
                                        <span class="comprovativo-file-nome" id="comprovativoNome">-</span>
                                        <span class="comprovativo-file-tamanho" id="comprovativoTamanho">-</span>
                                    </div>
                                    <div class="comprovativo-file-check">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="comprovativo-nota">
                                <i class="fas fa-shield-alt"></i>
                                <span>Os dados do comprovativo são processados de forma segura e apenas utilizados para validar o seu pagamento.</span>
                            </div>
                        </div>
                    </div>

                    <!-- ===== RESUMO DO PAGAMENTO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.35s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-receipt" style="color: #00FFA3;"></i>
                                Resumo do Pagamento
                            </h3>
                        </div>
                        <div class="resumo-pagamento">
                            <div class="resumo-item">
                                <span class="resumo-label">
                                    <i class="fas fa-crown"></i> Plano <?php echo $assinatura['plano']; ?>
                                </span>
                                <span class="resumo-value">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                            </div>

                            <div class="resumo-item">
                                <span class="resumo-label">
                                    <i class="fas fa-calendar"></i> Período
                                </span>
                                <span class="resumo-value"><?php echo $assinatura['periodo']; ?></span>
                            </div>

                            <div class="resumo-item">
                                <span class="resumo-label">
                                    <i class="fas fa-credit-card"></i> Método
                                </span>
                                <span class="resumo-value" id="resumoMetodo">Não selecionado</span>
                            </div>

                            <div class="resumo-item">
                                <span class="resumo-label">
                                    <i class="fas fa-paperclip"></i> Comprovativo
                                </span>
                                <span class="resumo-value" id="resumoComprovativo" style="color: #FF6B6B;">
                                    <i class="fas fa-times-circle"></i> Não anexado
                                </span>
                            </div>

                            <div class="resumo-divider"></div>

                            <div class="resumo-item resumo-total">
                                <span class="resumo-label">
                                    <i class="fas fa-coins"></i> Total a Pagar
                                </span>
                                <span class="resumo-value">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== COLUNA LATERAL ===== -->
                <div class="pagamento-coluna-lateral">

                    <!-- ===== CARD DE AÇÃO ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.4s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-bolt" style="color: #FFD93D;"></i>
                                Confirmar Pagamento
                            </h3>
                        </div>
                        <div class="acao-pagamento">
                            <div class="acao-valor">
                                <span class="acao-valor-label">Total a Pagar</span>
                                <span class="acao-valor-numero">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                            </div>

                            <div class="acao-checklist">
                                <div class="checklist-item" id="checkMetodo">
                                    <i class="fas fa-circle"></i>
                                    <span>Método de pagamento selecionado</span>
                                </div>
                                <div class="checklist-item" id="checkComprovativo">
                                    <i class="fas fa-circle"></i>
                                    <span>Comprovativo anexado</span>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" id="btnPagar" onclick="confirmarPagamento()" disabled>
                                <i class="fas fa-lock"></i>
                                Confirmar Pagamento
                            </button>

                            <div class="acao-info">
                                <div class="acao-info-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Validação em até 24 horas</span>
                                </div>
                                <div class="acao-info-item">
                                    <i class="fas fa-clock"></i>
                                    <span>Renovação automática ativa</span>
                                </div>
                                <div class="acao-info-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Cancelamento a qualquer momento</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===== FATURA PENDENTE ===== -->
                    <?php if (!empty($faturas_pendentes)): ?>
                    <div class="card animate-fade-up" style="animation-delay: 0.45s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-file-invoice" style="color: #FFD93D;"></i>
                                Fatura Pendente
                            </h3>
                        </div>
                        <div class="fatura-pendente-detalhe">
                            <?php foreach ($faturas_pendentes as $fatura): ?>
                                <div class="fatura-pendente-item">
                                    <div class="fatura-pendente-header">
                                        <span class="fatura-pendente-numero"><?php echo $fatura['numero']; ?></span>
                                        <span class="badge-status status-pendente">
                                            <i class="fas fa-clock"></i> Pendente
                                        </span>
                                    </div>
                                    <div class="fatura-pendente-info">
                                        <div class="fatura-info-row">
                                            <span class="fatura-info-label">Período</span>
                                            <span class="fatura-info-value"><?php echo $fatura['periodo']; ?></span>
                                        </div>
                                        <div class="fatura-info-row">
                                            <span class="fatura-info-label">Vencimento</span>
                                            <span class="fatura-info-value"><?php echo formatDate($fatura['vencimento']); ?></span>
                                        </div>
                                        <div class="fatura-info-row">
                                            <span class="fatura-info-label">Dias restantes</span>
                                            <span class="fatura-info-value" style="color: #FFD93D;">
                                                <?php echo $fatura['dias_restantes']; ?> dias
                                            </span>
                                        </div>
                                        <div class="fatura-info-row fatura-info-total">
                                            <span class="fatura-info-label">Valor</span>
                                            <span class="fatura-info-value" style="color: #00FFA3;">
                                                Kz <?php echo formatMoney($fatura['valor']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- ===== HISTÓRICO RECENTE ===== -->
                    <div class="card animate-fade-up" style="animation-delay: 0.5s;">
                        <div class="card-header">
                            <h3>
                                <i class="fas fa-history" style="color: #6C2BD9;"></i>
                                Histórico Recente
                            </h3>
                        </div>
                        <div class="historico-list">
                            <?php foreach ($historico_pagamentos as $pagamento): ?>
                                <div class="historico-item">
                                    <div class="historico-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="historico-info">
                                        <span class="historico-periodo"><?php echo $pagamento['periodo']; ?></span>
                                        <span class="historico-data">
                                            <?php echo formatDateTime($pagamento['data_pagamento']); ?>
                                        </span>
                                        <span class="historico-metodo">
                                            <i class="fas fa-credit-card"></i> <?php echo $pagamento['metodo']; ?>
                                        </span>
                                    </div>
                                    <div class="historico-valor">
                                        Kz <?php echo formatMoney($pagamento['valor']); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="historico-footer">
                            <a href="faturas.php" class="btn btn-sm btn-outline" style="width: 100%; justify-content: center;">
                                <i class="fas fa-list"></i> Ver Todo o Histórico
                            </a>
                        </div>
                    </div>

                    <!-- ===== INFO SEGURANÇA ===== -->
                    <div class="card card-info animate-fade-up" style="animation-delay: 0.55s;">
                        <div class="info-seguranca">
                            <i class="fas fa-shield-alt"></i>
                            <h4>Pagamento Seguro</h4>
                            <p>Após o envio do comprovativo, a nossa equipa valida o pagamento em até 24 horas úteis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE CONFIRMAÇÃO FINAL                 -->
    <!-- ========================================== -->
    <div class="modal" id="modalConfirmacaoPagamento">
        <div class="modal-overlay" onclick="fecharModal('modalConfirmacaoPagamento')"></div>
        <div class="modal-content modal-content-pagamento">
            <div class="modal-header modal-header-success">
                <h3 class="modal-title modal-title-success">
                    <i class="fas fa-check-circle"></i>
                    Confirmar Envio
                </h3>
                <button class="modal-close" onclick="fecharModal('modalConfirmacaoPagamento')">&times;</button>
            </div>
            <div class="modal-body">
                <div class="pagamento-confirmacao">
                    <div class="pagamento-confirmacao-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Confirme os dados do pagamento</h4>
                    
                    <div class="pagamento-confirmacao-resumo">
                        <div class="confirmacao-item">
                            <span class="confirmacao-label">Plano</span>
                            <span class="confirmacao-value"><?php echo $assinatura['plano']; ?></span>
                        </div>
                        <div class="confirmacao-item">
                            <span class="confirmacao-label">Método</span>
                            <span class="confirmacao-value" id="confirmacaoMetodo">-</span>
                        </div>
                        <div class="confirmacao-item">
                            <span class="confirmacao-label">Comprovativo</span>
                            <span class="confirmacao-value" id="confirmacaoComprovativo" style="color: #00FFA3;">
                                <i class="fas fa-check-circle"></i> Anexado
                            </span>
                        </div>
                        <div class="confirmacao-item confirmacao-total">
                            <span class="confirmacao-label">Total a Pagar</span>
                            <span class="confirmacao-value">Kz <?php echo formatMoney($assinatura['valor']); ?></span>
                        </div>
                    </div>

                    <p class="pagamento-confirmacao-aviso">
                        <i class="fas fa-info-circle"></i>
                        Ao confirmar, o comprovativo será enviado para validação. Receberá uma notificação quando o pagamento for aprovado.
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline" onclick="fecharModal('modalConfirmacaoPagamento')">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <button class="btn btn-success" id="btnConfirmarPagamento" onclick="executarPagamento()">
                    <i class="fas fa-paper-plane"></i> Enviar Comprovativo
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE PROCESSAMENTO                     -->
    <!-- ========================================== -->
    <div class="modal" id="modalProcessando">
        <div class="modal-overlay"></div>
        <div class="modal-content modal-content-processando">
            <div class="processando-conteudo">
                <div class="processando-spinner">
                    <div class="spinner-ring"></div>
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>
                <h3>A enviar comprovativo...</h3>
                <p id="processandoTexto">A validar o ficheiro. Por favor, aguarde.</p>
                <div class="processando-progresso">
                    <div class="processando-progresso-fill" id="processandoProgresso"></div>
                </div>
                <span class="processando-percent" id="processandoPercent">0%</span>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL DE SUCESSO                           -->
    <!-- ========================================== -->
    <div class="modal" id="modalSucesso">
        <div class="modal-overlay"></div>
        <div class="modal-content modal-content-sucesso">
            <div class="sucesso-conteudo">
                <div class="sucesso-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2>Comprovativo Enviado!</h2>
                <p>O seu pagamento está em análise. Receberá uma notificação quando for aprovado.</p>
                
                <div class="sucesso-info">
                    <div class="sucesso-info-item">
                        <span class="sucesso-info-label">Referência</span>
                        <span class="sucesso-info-value" id="sucessoReferencia">-</span>
                    </div>
                    <div class="sucesso-info-item">
                        <span class="sucesso-info-label">Valor</span>
                        <span class="sucesso-info-value" id="sucessoValor">-</span>
                    </div>
                    <div class="sucesso-info-item">
                        <span class="sucesso-info-label">Método</span>
                        <span class="sucesso-info-value" id="sucessoMetodo">-</span>
                    </div>
                    <div class="sucesso-info-item">
                        <span class="sucesso-info-label">Estado</span>
                        <span class="sucesso-info-value" style="color: #FFD93D;">
                            <i class="fas fa-clock"></i> Em Análise
                        </span>
                    </div>
                </div>

                <div class="sucesso-acoes">
                    <a href="faturas.php" class="btn btn-outline">
                        <i class="fas fa-file-invoice"></i> Ver Fatura
                    </a>
                    <a href="index.php" class="btn btn-primary">
                        <i class="fas fa-check"></i> Concluir
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- SCRIPTS                                    -->
    <!-- ========================================== -->
    <script>
        // ============================================
        // TOGGLE SIDEBAR
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.toggle('open');
                    if (overlay) overlay.classList.toggle('active');
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                });
            }
        });

        // ============================================
        // PERFIL DROPDOWN
        // ============================================
        document.addEventListener('DOMContentLoaded', function() {
            const btnPerfil = document.getElementById('btnPerfil');
            const dropdown = document.getElementById('perfilDropdown');

            if (btnPerfil && dropdown) {
                btnPerfil.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('active');
                });

                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !btnPerfil.contains(e.target)) {
                        dropdown.classList.remove('active');
                    }
                });
            }
        });

        // ============================================
        // THEME
        // ============================================
        (function() {
            const savedTheme = localStorage.getItem('geonnexus-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const btnTheme = document.getElementById('btnTheme');
            if (btnTheme) {
                btnTheme.addEventListener('click', function() {
                    const currentTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('geonnexus-theme', newTheme);

                    mostrarToast('Tema ' + (newTheme === 'dark' ? 'escuro' : 'claro') + ' ativado', 'info');
                });
            }
        })();

        // ============================================
        // TOAST
        // ============================================
        if (typeof window.mostrarToast === 'undefined') {
            window.mostrarToast = function(mensagem, tipo = 'success') {
                const container = document.getElementById('toast-container');
                if (!container) return;

                const icons = {
                    success: 'fa-check-circle',
                    error: 'fa-exclamation-circle',
                    warning: 'fa-exclamation-triangle',
                    info: 'fa-info-circle'
                };

                const colors = {
                    success: '#00FFA3',
                    error: '#FF6B6B',
                    warning: '#FFD93D',
                    info: '#00D2FF'
                };

                const existingToasts = container.querySelectorAll('.toast');
                if (existingToasts.length >= 5) existingToasts[0].remove();

                const toast = document.createElement('div');
                toast.className = 'toast toast-' + tipo;
                toast.innerHTML = `
                    <div class="toast-content">
                        <i class="fas ${icons[tipo] || icons.info}" style="color: ${colors[tipo] || colors.info};"></i>
                        <span>${mensagem}</span>
                    </div>
                    <button class="toast-close" onclick="this.parentElement.remove()" aria-label="Fechar">&times;</button>
                `;

                container.appendChild(toast);

                requestAnimationFrame(function() {
                    requestAnimationFrame(function() {
                        toast.classList.add('show');
                    });
                });

                const timeout = setTimeout(function() {
                    if (toast.parentElement) {
                        toast.classList.remove('show');
                        setTimeout(function() {
                            if (toast.parentElement) toast.remove();
                        }, 400);
                    }
                }, 4000);

                const closeBtn = toast.querySelector('.toast-close');
                if (closeBtn) {
                    closeBtn.addEventListener('click', function() {
                        clearTimeout(timeout);
                    });
                }
            };
        }
        var mostrarToast = window.mostrarToast;

        // ============================================
        // ESTADO
        // ============================================
        let metodoSelecionado = null;
        let comprovativoAnexado = null;
        const valorAssinatura = <?php echo $assinatura['valor']; ?>;

        // ============================================
        // SELECIONAR MÉTODO DE PAGAMENTO
        // ============================================
        function selecionarMetodo(metodoId) {
            metodoSelecionado = metodoId;

            // Atualizar cards
            document.querySelectorAll('.metodo-card').forEach(card => {
                card.classList.toggle('selected', card.dataset.metodo === metodoId);
            });

            // Esconder todos os blocos de método
            document.querySelectorAll('.metodo-especifico').forEach(el => {
                if (el.id !== 'dadosComprovativo') {
                    el.style.display = 'none';
                }
            });

            // Mostrar o bloco específico + comprovativo
            const mapa = {
                'multicaixa': 'dadosMulticaixa',
                'transferencia': 'dadosTransferencia'
            };

            if (mapa[metodoId]) {
                const bloco = document.getElementById(mapa[metodoId]);
                if (bloco) bloco.style.display = 'block';
            }

            // Mostrar área de comprovativo (sempre que um método é selecionado)
            document.getElementById('dadosComprovativo').style.display = 'block';

            // Atualizar resumo
            const metodoNome = document.querySelector(`.metodo-card[data-metodo="${metodoId}"] .metodo-nome`).textContent;
            document.getElementById('resumoMetodo').textContent = metodoNome;

            // Atualizar checklist
            actualizarChecklist();

            // Scroll suave para o comprovativo
            setTimeout(() => {
                const comprovativoSection = document.getElementById('dadosComprovativo');
                if (comprovativoSection) {
                    comprovativoSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }, 200);
        }

        // ============================================
        // PREVIEW COMPROVATIVO
        // ============================================
        function previewComprovativo(event) {
            const file = event.target.files[0];
            if (!file) return;

            // Validações
            const extensoesPermitidas = ['.pdf', '.jpg', '.jpeg', '.png'];
            const extensao = '.' + file.name.split('.').pop().toLowerCase();

            if (!extensoesPermitidas.includes(extensao)) {
                mostrarToast('Formato não suportado. Use PDF, JPG ou PNG.', 'error');
                event.target.value = '';
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                mostrarToast('O ficheiro excede 5MB.', 'error');
                event.target.value = '';
                return;
            }

            comprovativoAnexado = file;

            // Mostrar preview
            const preview = document.getElementById('comprovativoPreview');
            const nome = document.getElementById('comprovativoNome');
            const tamanho = document.getElementById('comprovativoTamanho');
            const icon = document.getElementById('comprovativoFileIcon');

            nome.textContent = file.name;
            tamanho.textContent = formatFileSize(file.size);

            // Ícone por tipo
            let iconHTML = '<i class="fas fa-file"></i>';
            if (extensao === '.pdf') {
                iconHTML = '<i class="fas fa-file-pdf"></i>';
                icon.style.background = 'rgba(255, 107, 107, 0.15)';
                icon.style.color = '#FF6B6B';
            } else if (extensao === '.jpg' || extensao === '.jpeg' || extensao === '.png') {
                iconHTML = '<i class="fas fa-file-image"></i>';
                icon.style.background = 'rgba(0, 210, 255, 0.15)';
                icon.style.color = '#00D2FF';
            }
            icon.innerHTML = iconHTML;

            preview.style.display = 'block';
            document.getElementById('uploadArea').style.display = 'none';

            // Atualizar resumo
            document.getElementById('resumoComprovativo').innerHTML = '<i class="fas fa-check-circle"></i> Anexado';
            document.getElementById('resumoComprovativo').style.color = '#00FFA3';

            // Atualizar checklist
            actualizarChecklist();

            mostrarToast('Comprovativo anexado com sucesso!', 'success');
        }

        // ============================================
        // REMOVER COMPROVATIVO
        // ============================================
        function removerComprovativo() {
            comprovativoAnexado = null;
            document.getElementById('comprovativoInput').value = '';
            document.getElementById('comprovativoPreview').style.display = 'none';
            document.getElementById('uploadArea').style.display = 'flex';

            document.getElementById('resumoComprovativo').innerHTML = '<i class="fas fa-times-circle"></i> Não anexado';
            document.getElementById('resumoComprovativo').style.color = '#FF6B6B';

            actualizarChecklist();
            mostrarToast('Comprovativo removido', 'info');
        }

        // ============================================
        // FORMATAR TAMANHO DO FICHEIRO
        // ============================================
        function formatFileSize(bytes) {
            if (bytes < 1024) return bytes + ' B';
            if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }

        // ============================================
        // ATUALIZAR CHECKLIST
        // ============================================
        function actualizarChecklist() {
            const checkMetodo = document.getElementById('checkMetodo');
            const checkComprovativo = document.getElementById('checkComprovativo');
            const btnPagar = document.getElementById('btnPagar');

            // Método
            if (metodoSelecionado) {
                checkMetodo.classList.add('check-ok');
                checkMetodo.querySelector('i').className = 'fas fa-check-circle';
            } else {
                checkMetodo.classList.remove('check-ok');
                checkMetodo.querySelector('i').className = 'fas fa-circle';
            }

            // Comprovativo
            if (comprovativoAnexado) {
                checkComprovativo.classList.add('check-ok');
                checkComprovativo.querySelector('i').className = 'fas fa-check-circle';
            } else {
                checkComprovativo.classList.remove('check-ok');
                checkComprovativo.querySelector('i').className = 'fas fa-circle';
            }

            // Botão
            btnPagar.disabled = !(metodoSelecionado && comprovativoAnexado);
        }

        // ============================================
        // CONFIRMAR PAGAMENTO
        // ============================================
        function confirmarPagamento() {
            if (!metodoSelecionado) {
                mostrarToast('Selecione um método de pagamento!', 'warning');
                return;
            }

            if (!comprovativoAnexado) {
                mostrarToast('Anexe o comprovativo de pagamento!', 'warning');
                return;
            }

            // Preparar modal
            const metodoNome = document.querySelector(`.metodo-card[data-metodo="${metodoSelecionado}"] .metodo-nome`).textContent;
            document.getElementById('confirmacaoMetodo').textContent = metodoNome;

            // Abrir modal
            document.getElementById('modalConfirmacaoPagamento').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // ============================================
        // EXECUTAR PAGAMENTO
        // ============================================
        function executarPagamento() {
            fecharModal('modalConfirmacaoPagamento');

            const modalProcessando = document.getElementById('modalProcessando');
            modalProcessando.classList.add('active');

            let progresso = 0;
            const progressoFill = document.getElementById('processandoProgresso');
            const progressoPercent = document.getElementById('processandoPercent');
            const processandoTexto = document.getElementById('processandoTexto');

            const etapas = [
                { perc: 25, texto: 'A validar o ficheiro...' },
                { perc: 50, texto: 'A carregar o comprovativo...' },
                { perc: 75, texto: 'A registar o pagamento...' },
                { perc: 100, texto: 'Comprovativo enviado!' }
            ];

            const interval = setInterval(() => {
                progresso += 2;
                if (progresso > 100) progresso = 100;

                progressoFill.style.width = progresso + '%';
                progressoPercent.textContent = progresso + '%';

                for (let i = etapas.length - 1; i >= 0; i--) {
                    if (progresso >= etapas[i].perc) {
                        processandoTexto.textContent = etapas[i].texto;
                        break;
                    }
                }

                if (progresso >= 100) {
                    clearInterval(interval);

                    setTimeout(() => {
                        modalProcessando.classList.remove('active');

                        // Preparar modal de sucesso
                        const metodoNome = document.querySelector(`.metodo-card[data-metodo="${metodoSelecionado}"] .metodo-nome`).textContent;

                        document.getElementById('sucessoReferencia').textContent = 'PAG-' + Date.now();
                        document.getElementById('sucessoValor').textContent = 'Kz ' + formatMoney(valorAssinatura);
                        document.getElementById('sucessoMetodo').textContent = metodoNome;

                        document.getElementById('modalSucesso').classList.add('active');
                    }, 800);
                }
            }, 60);
        }

        // ============================================
        // FORMATAR DINHEIRO
        // ============================================
        function formatMoney(value) {
            return Math.round(value).toLocaleString('pt-AO').replace(/,/g, '.');
        }

        // ============================================
        // COPIAR CÓDIGO
        // ============================================
        function copiarCodigo(elementId) {
            const el = document.getElementById(elementId);
            if (!el) return;

            const texto = el.textContent || el.value;
            navigator.clipboard.writeText(texto).then(() => {
                mostrarToast('Copiado para a área de transferência!', 'success');
            }).catch(() => {
                mostrarToast('Erro ao copiar. Copie manualmente.', 'error');
            });
        }

        // ============================================
        // FECHAR MODAL
        // ============================================
        function fecharModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                fecharModal('modalConfirmacaoPagamento');
            }
        });
    </script>

    <!-- ========================================== -->
    <!-- CSS ESPECÍFICO                             -->
    <!-- ========================================== -->
    <style>
        /* ========================================== */
        /* TOAST                                      */
        /* ========================================== */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 999999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 400px;
            width: calc(100% - 40px);
            pointer-events: none;
        }

        .toast {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 18px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            transform: translateX(120%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: auto;
            position: relative;
            overflow: hidden;
            min-width: 280px;
        }

        .toast::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
        }

        .toast.toast-success::before { background: #00FFA3; }
        .toast.toast-error::before { background: #FF6B6B; }
        .toast.toast-warning::before { background: #FFD93D; }
        .toast.toast-info::before { background: #00D2FF; }

        .toast .toast-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .toast .toast-content i { font-size: 1.3rem; flex-shrink: 0; }
        .toast .toast-content span { font-size: var(--text-sm); color: var(--text-primary); font-weight: 500; }
        .toast .toast-close {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 1.4rem;
            cursor: pointer;
            padding: 0 4px;
            line-height: 1;
            flex-shrink: 0;
        }
        .toast .toast-close:hover { color: var(--text-primary); }
        .toast.show { transform: translateX(0); opacity: 1; }

        /* ========================================== */
        /* PAGE HEADER                                */
        /* ========================================== */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: var(--space-lg);
            padding: var(--space-lg);
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            flex-wrap: wrap;
            position: relative;
            overflow: visible;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #FFD93D 0%, #FF9F43 100%);
            border-radius: var(--radius-lg) 0 0 var(--radius-lg);
        }

        .header-left {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .header-left h1 {
            font-family: var(--font-title);
            font-size: var(--text-h1);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left h1 .icon { color: #FFD93D; font-size: 0.85em; }

        .header-left .breadcrumb {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .header-left .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: var(--transition-smooth); }
        .header-left .breadcrumb a:hover { color: #FFD93D; }
        .header-left .breadcrumb .separator { color: var(--text-muted); opacity: 0.5; }

        .header-right {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-shrink: 0;
            flex-wrap: wrap;
        }

        .btn-theme {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            background: var(--bg-input);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: var(--transition-smooth);
            position: relative;
        }

        .btn-theme:hover { border-color: #FFD93D; color: #FFD93D; }
        .btn-theme .theme-icon { position: absolute; transition: var(--transition-smooth); }
        .btn-theme .theme-icon.sun { opacity: 1; transform: rotate(0deg); }
        .btn-theme .theme-icon.moon { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.sun { opacity: 0; transform: rotate(180deg); }
        [data-theme="light"] .btn-theme .theme-icon.moon { opacity: 1; transform: rotate(0deg); }

        /* ========================================== */
        /* AVISO PENDENTE                             */
        /* ========================================== */
        .aviso-pendente {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-lg);
            background: linear-gradient(135deg, rgba(255, 217, 61, 0.12) 0%, rgba(255, 217, 61, 0.04) 100%);
            border: 2px solid rgba(255, 217, 61, 0.3);
            border-radius: var(--radius-lg);
            margin-bottom: var(--space-lg);
        }

        .aviso-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: rgba(255, 217, 61, 0.2);
            color: #FFD93D;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            animation: pulse 2s ease-in-out infinite;
        }

        .aviso-conteudo h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: #FFD93D;
            margin: 0 0 4px 0;
        }

        .aviso-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
        }

        .aviso-conteudo p strong { color: #FFD93D; }

        /* ========================================== */
        /* STATS CARDS                                */
        /* ========================================== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--space-md);
            margin-bottom: var(--space-lg);
        }

        .stat-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            padding: var(--space-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .stat-card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .stat-card .icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-card .icon.yellow { background: rgba(255, 217, 61, 0.15); color: #FFD93D; }
        .stat-card .icon.green { background: rgba(0, 255, 163, 0.15); color: #00FFA3; }
        .stat-card .icon.blue { background: rgba(0, 210, 255, 0.15); color: #00D2FF; }
        .stat-card .icon.aurora { background: rgba(108, 43, 217, 0.15); color: #6C2BD9; }

        .stat-card .value {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1.1;
        }

        .stat-card .label {
            font-size: var(--text-sm);
            color: var(--text-muted);
        }

        .stat-card .trend {
            font-size: var(--text-xs);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 8px;
            border-radius: var(--radius-full);
            font-weight: 600;
            width: fit-content;
        }

        .stat-card .trend.up { background: rgba(0, 255, 163, 0.12); color: #00FFA3; }
        .stat-card .trend.neutral { background: rgba(107, 122, 143, 0.12); color: #6B7A8F; }

        /* ========================================== */
        /* PAGAMENTO GRID                             */
        /* ========================================== */
        .pagamento-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 380px);
            gap: var(--space-lg);
            align-items: start;
        }

        .pagamento-coluna-principal,
        .pagamento-coluna-lateral {
            min-width: 0;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        /* ========================================== */
        /* CARDS                                      */
        /* ========================================== */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
            overflow: hidden;
            max-width: 100%;
        }

        .card:hover {
            background: var(--bg-card-hover);
            box-shadow: var(--glass-shadow);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: var(--space-sm);
        }

        .card-header h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex-wrap: wrap;
        }

        .badge-required {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            background: rgba(255, 107, 107, 0.15);
            color: #FF6B6B;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ========================================== */
        /* PLANO DETALHE                              */
        /* ========================================== */
        .plano-detalhe {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        .plano-header {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding-bottom: var(--space-lg);
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .plano-icon {
            width: 64px;
            height: 64px;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        .plano-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .plano-nome {
            font-family: var(--font-title);
            font-size: var(--text-h3);
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .plano-status {
            font-size: var(--text-xs);
            color: #00FFA3;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
        }

        .plano-valor {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
        }

        .plano-valor-numero {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: #FFD93D;
        }

        .plano-valor-periodo {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .plano-features h5 {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-sm) 0;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .plano-features h5 i { color: #00FFA3; }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-sm);
        }

        .features-list li {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-sm);
            color: var(--text-secondary);
            padding: var(--space-sm) var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
        }

        .features-list li i { color: #00FFA3; font-size: 12px; flex-shrink: 0; }

        .plano-datas {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .plano-data-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .plano-data-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .plano-data-label i { color: #00D2FF; }

        .plano-data-value {
            font-size: var(--text-sm);
            color: var(--text-primary);
            font-weight: 600;
        }

        /* ========================================== */
        /* MÉTODOS DE PAGAMENTO                       */
        /* ========================================== */
        .metodos-container { padding: var(--space-lg); }

        .metodos-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: var(--space-sm);
        }

        .metodo-card {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            position: relative;
        }

        .metodo-card:hover {
            border-color: var(--metodo-color);
            background: var(--bg-card-hover);
            transform: translateX(4px);
        }

        .metodo-card.selected {
            border-color: var(--metodo-color);
            background: linear-gradient(135deg, var(--metodo-color)10 0%, transparent 100%);
            box-shadow: 0 0 0 3px var(--metodo-color)20;
        }

        .metodo-radio {
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: var(--transition-smooth);
        }

        .metodo-card.selected .metodo-radio { border-color: var(--metodo-color); }

        .metodo-card.selected .radio-mark {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--metodo-color);
        }

        .metodo-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .metodo-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .metodo-nome {
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .metodo-descricao {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .metodo-meta {
            display: flex;
            gap: var(--space-md);
            margin-top: 4px;
            flex-wrap: wrap;
        }

        .metodo-tempo, .metodo-taxa {
            font-size: 10px;
            color: var(--text-muted);
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
        }

        .metodo-check {
            width: 24px;
            height: 24px;
            color: var(--metodo-color);
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transform: scale(0);
            transition: var(--transition-bounce);
            flex-shrink: 0;
        }

        .metodo-card.selected .metodo-check {
            opacity: 1;
            transform: scale(1);
        }

        /* ========================================== */
        /* MÉTODO ESPECÍFICO                          */
        /* ========================================== */
        .metodo-dados {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-lg);
        }

        .metodo-dados-info {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(0, 210, 255, 0.05);
            border: 1px solid rgba(0, 210, 255, 0.2);
            border-radius: var(--radius-md);
        }

        .metodo-dados-info > i {
            font-size: 20px;
            color: #00D2FF;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .metodo-dados-info > div {
            flex: 1;
            min-width: 0;
        }

        .metodo-dados-info strong {
            display: block;
            font-size: var(--text-sm);
            color: var(--text-primary);
            margin-bottom: var(--space-sm);
        }

        .metodo-dados-info ol {
            padding-left: var(--space-lg);
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .metodo-dados-info ol li {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.5;
        }

        .dados-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-md);
        }

        .dados-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .dados-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .codigo-box {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border: 2px dashed #00D2FF;
            border-radius: var(--radius-md);
        }

        .codigo-box span {
            flex: 1;
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00D2FF;
            letter-spacing: 1px;
            text-align: center;
            word-break: break-all;
        }

        .dados-bancarios-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: var(--space-sm);
        }

        .dados-bancarios-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            flex-wrap: wrap;
        }

        .dados-value-wrapper {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            flex: 1;
            justify-content: flex-end;
        }

        .dados-value {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: 0.5px;
            word-break: break-all;
            text-align: right;
        }

        .btn-copy {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: var(--transition-smooth);
            flex-shrink: 0;
        }

        .btn-copy:hover {
            border-color: #00D2FF;
            color: #00D2FF;
            background: rgba(0, 210, 255, 0.05);
        }

        .metodo-valor-destaque {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-md) var(--space-lg);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.08) 0%, rgba(0, 210, 255, 0.08) 100%);
            border: 2px solid rgba(0, 255, 163, 0.25);
            border-radius: var(--radius-md);
            flex-wrap: wrap;
        }

        .metodo-valor-label {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .metodo-valor-numero {
            font-family: var(--font-display);
            font-size: var(--text-h3);
            font-weight: 700;
            color: #00FFA3;
        }

        /* ========================================== */
        /* COMPROVATIVO UPLOAD                        */
        /* ========================================== */
        .comprovativo-info {
            display: flex;
            gap: var(--space-md);
            padding: var(--space-md);
            background: rgba(0, 255, 163, 0.05);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-md);
        }

        .comprovativo-info > i {
            font-size: 20px;
            color: #00FFA3;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .comprovativo-info > div {
            flex: 1;
            min-width: 0;
        }

        .comprovativo-info strong {
            display: block;
            font-size: var(--text-sm);
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .comprovativo-info p {
            font-size: var(--text-xs);
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.5;
        }

        .upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-2xl) var(--space-lg);
            background: var(--bg-input);
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: center;
        }

        .upload-area:hover {
            border-color: #00FFA3;
            background: rgba(0, 255, 163, 0.02);
        }

        .upload-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: rgba(0, 255, 163, 0.1);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            transition: var(--transition-smooth);
        }

        .upload-area:hover .upload-icon {
            transform: scale(1.1);
            background: rgba(0, 255, 163, 0.15);
        }

        .upload-content {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .upload-title {
            font-size: var(--text-body);
            font-weight: 600;
            color: var(--text-primary);
        }

        .upload-subtitle {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-preview {
            padding: var(--space-md);
            background: rgba(0, 255, 163, 0.05);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-md);
        }

        .comprovativo-preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-md);
            gap: var(--space-sm);
        }

        .comprovativo-preview-titulo {
            font-size: var(--text-sm);
            font-weight: 700;
            color: #00FFA3;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-remover-comprovativo {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: rgba(255, 107, 107, 0.1);
            border: 1px solid rgba(255, 107, 107, 0.3);
            color: #FF6B6B;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: var(--transition-smooth);
        }

        .btn-remover-comprovativo:hover {
            background: rgba(255, 107, 107, 0.2);
            transform: scale(1.05);
        }

        .comprovativo-preview-content {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-card);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .comprovativo-file-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            background: rgba(0, 210, 255, 0.15);
            color: #00D2FF;
            flex-shrink: 0;
        }

        .comprovativo-file-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .comprovativo-file-nome {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .comprovativo-file-tamanho {
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .comprovativo-file-check {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .comprovativo-nota {
            display: flex;
            align-items: flex-start;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: rgba(0, 210, 255, 0.05);
            border-radius: var(--radius-md);
            font-size: var(--text-xs);
            color: var(--text-muted);
            line-height: 1.5;
        }

        .comprovativo-nota i {
            color: #00D2FF;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* ========================================== */
        /* RESUMO PAGAMENTO                           */
        /* ========================================== */
        .resumo-pagamento {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .resumo-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: var(--space-sm) 0;
            gap: var(--space-sm);
        }

        .resumo-label {
            font-size: var(--text-sm);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .resumo-label i { color: #6C2BD9; }

        .resumo-value {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
            text-align: right;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .resumo-divider {
            height: 1px;
            background: var(--border-color);
            margin: var(--space-sm) 0;
        }

        .resumo-total { padding: var(--space-md) 0 0 0; }

        .resumo-total .resumo-label {
            font-size: var(--text-body);
            font-weight: 700;
            color: var(--text-primary);
        }

        .resumo-total .resumo-value {
            font-size: var(--text-h3);
            color: #00FFA3;
        }

        /* ========================================== */
        /* AÇÃO PAGAMENTO                             */
        /* ========================================== */
        .acao-pagamento {
            padding: var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-md);
        }

        .acao-valor {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            padding: var(--space-md);
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.06) 0%, rgba(0, 210, 255, 0.06) 100%);
            border: 1px solid rgba(0, 255, 163, 0.2);
            border-radius: var(--radius-md);
        }

        .acao-valor-label {
            font-size: var(--text-xs);
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .acao-valor-numero {
            font-family: var(--font-display);
            font-size: var(--text-h2);
            font-weight: 700;
            color: #00FFA3;
        }

        .acao-checklist {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .checklist-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-muted);
            transition: var(--transition-smooth);
        }

        .checklist-item i {
            font-size: 10px;
            color: var(--text-muted);
            transition: var(--transition-smooth);
        }

        .checklist-item.check-ok {
            color: #00FFA3;
            font-weight: 600;
        }

        .checklist-item.check-ok i {
            font-size: 14px;
            color: #00FFA3;
        }

        .btn-block {
            width: 100%;
            justify-content: center;
        }

        .btn-lg {
            padding: 16px 24px;
            font-size: var(--text-body);
            font-weight: 700;
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        .acao-info {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding-top: var(--space-md);
            border-top: 1px solid var(--border-color);
        }

        .acao-info-item {
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-xs);
            color: var(--text-muted);
        }

        .acao-info-item i {
            color: #00FFA3;
            font-size: 12px;
        }

        /* ========================================== */
        /* FATURA PENDENTE                            */
        /* ========================================== */
        .fatura-pendente-detalhe { padding: var(--space-lg); }

        .fatura-pendente-item { display: flex; flex-direction: column; gap: var(--space-sm); }

        .fatura-pendente-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            padding-bottom: var(--space-sm);
            border-bottom: 1px solid var(--border-color);
        }

        .fatura-pendente-numero {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: var(--text-primary);
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: var(--radius-full);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-status.status-pendente {
            background: rgba(255, 217, 61, 0.12);
            color: #FFD93D;
        }

        .fatura-pendente-info { display: flex; flex-direction: column; gap: var(--space-sm); }

        .fatura-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            font-size: var(--text-sm);
        }

        .fatura-info-label { color: var(--text-muted); }

        .fatura-info-value {
            font-weight: 600;
            color: var(--text-primary);
        }

        .fatura-info-total {
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            margin-top: var(--space-sm);
        }

        .fatura-info-total .fatura-info-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
        }

        /* ========================================== */
        /* HISTÓRICO                                  */
        /* ========================================== */
        .historico-list {
            padding: var(--space-md) var(--space-lg);
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
        }

        .historico-item {
            display: flex;
            align-items: center;
            gap: var(--space-md);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            transition: var(--transition-smooth);
        }

        .historico-item:hover { border-color: #00FFA3; }

        .historico-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .historico-info {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .historico-periodo {
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
        }

        .historico-data { font-size: 10px; color: var(--text-muted); }

        .historico-metodo {
            font-size: 10px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .historico-valor {
            font-family: var(--font-display);
            font-size: var(--text-sm);
            font-weight: 700;
            color: #00FFA3;
            white-space: nowrap;
        }

        .historico-footer { padding: 0 var(--space-lg) var(--space-lg) var(--space-lg); }

        /* ========================================== */
        /* INFO SEGURANÇA                             */
        /* ========================================== */
        .card-info {
            background: linear-gradient(135deg, rgba(0, 210, 255, 0.05) 0%, rgba(108, 43, 217, 0.05) 100%);
            border-color: rgba(0, 210, 255, 0.2);
        }

        .info-seguranca { padding: var(--space-lg); text-align: center; }

        .info-seguranca i {
            font-size: 40px;
            color: #00D2FF;
            margin-bottom: var(--space-sm);
            display: block;
        }

        .info-seguranca h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .info-seguranca p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            line-height: 1.5;
            margin: 0;
        }

        /* ========================================== */
        /* MODAL                                      */
        /* ========================================== */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999999;
            align-items: center;
            justify-content: center;
        }

        .modal.active { display: flex; }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(6px);
            cursor: pointer;
        }

        .modal-content {
            position: relative;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        .modal-content-pagamento {
            max-width: 520px;
            border: 2px solid rgba(0, 255, 163, 0.3);
        }

        .modal-content-processando {
            max-width: 420px;
            border: 1px solid var(--border-color);
        }

        .modal-content-sucesso {
            max-width: 480px;
            border: 2px solid rgba(0, 255, 163, 0.4);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-success {
            background: linear-gradient(135deg, rgba(0, 255, 163, 0.15) 0%, rgba(0, 255, 163, 0.05) 100%);
            border-bottom-color: rgba(0, 255, 163, 0.3);
        }

        .modal-title {
            font-family: var(--font-title);
            font-weight: 700;
            font-size: var(--text-h4);
            color: #00FFA3;
            display: flex;
            align-items: center;
            gap: var(--space-sm);
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-muted);
            transition: var(--transition-smooth);
            padding: 4px;
            line-height: 1;
        }

        .modal-close:hover { color: var(--text-primary); transform: rotate(90deg); }

        .modal-body { padding: 24px; }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer .btn { min-width: 140px; justify-content: center; }

        .btn-success {
            background: linear-gradient(135deg, #00FFA3 0%, #00D2FF 100%);
            color: #0A1628;
            border: none;
            font-weight: 700;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 255, 163, 0.4);
        }

        /* ========================================== */
        /* CONFIRMAÇÃO PAGAMENTO                      */
        /* ========================================== */
        .pagamento-confirmacao { text-align: center; }

        .pagamento-confirmacao-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto var(--space-lg);
        }

        .pagamento-confirmacao h4 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 var(--space-lg) 0;
        }

        .pagamento-confirmacao-resumo {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
        }

        .confirmacao-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) 0;
            font-size: var(--text-sm);
        }

        .confirmacao-label { color: var(--text-muted); }

        .confirmacao-value {
            font-weight: 700;
            color: var(--text-primary);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .confirmacao-total {
            padding-top: var(--space-sm);
            border-top: 1px solid var(--border-color);
            margin-top: var(--space-sm);
        }

        .confirmacao-total .confirmacao-label {
            font-size: var(--text-body);
            font-weight: 700;
            color: var(--text-primary);
        }

        .confirmacao-total .confirmacao-value {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            color: #00FFA3;
        }

        .pagamento-confirmacao-aviso {
            font-size: var(--text-xs);
            color: var(--text-muted);
            margin: 0;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 6px;
            line-height: 1.5;
        }

        .pagamento-confirmacao-aviso i { color: #00D2FF; flex-shrink: 0; margin-top: 2px; }

        /* ========================================== */
        /* PROCESSAMENTO                              */
        /* ========================================== */
        .processando-conteudo { padding: var(--space-2xl); text-align: center; }

        .processando-spinner {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto var(--space-lg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .spinner-ring {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 4px solid transparent;
            border-top-color: #00FFA3;
            border-right-color: #00FFA3;
            animation: spin 1.5s linear infinite;
        }

        .processando-spinner i {
            font-size: 32px;
            color: #00FFA3;
            animation: pulse 1.5s ease-in-out infinite;
        }

        .processando-conteudo h3 {
            font-family: var(--font-title);
            font-size: var(--text-h4);
            color: var(--text-primary);
            margin: 0 0 var(--space-sm) 0;
        }

        .processando-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin: 0 0 var(--space-lg) 0;
            min-height: 20px;
        }

        .processando-progresso {
            height: 8px;
            background: var(--bg-input);
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: var(--space-sm);
        }

        .processando-progresso-fill {
            height: 100%;
            background: linear-gradient(90deg, #00FFA3 0%, #00D2FF 100%);
            border-radius: 4px;
            width: 0%;
            transition: width 0.3s ease;
        }

        .processando-percent {
            font-family: var(--font-display);
            font-size: var(--text-h4);
            font-weight: 700;
            color: #00FFA3;
        }

        /* ========================================== */
        /* SUCESSO                                    */
        /* ========================================== */
        .sucesso-conteudo { padding: var(--space-2xl); text-align: center; }

        .sucesso-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(0, 255, 163, 0.15);
            color: #00FFA3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 44px;
            margin: 0 auto var(--space-lg);
            animation: pulse 2s ease-in-out infinite;
        }

        .sucesso-conteudo h2 {
            font-family: var(--font-title);
            font-size: var(--text-h2);
            color: #00FFA3;
            margin: 0 0 var(--space-sm) 0;
        }

        .sucesso-conteudo p {
            font-size: var(--text-sm);
            color: var(--text-secondary);
            margin: 0 0 var(--space-lg) 0;
        }

        .sucesso-info {
            display: flex;
            flex-direction: column;
            gap: var(--space-sm);
            padding: var(--space-md);
            background: var(--bg-input);
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            margin-bottom: var(--space-lg);
            text-align: left;
        }

        .sucesso-info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: var(--space-sm);
            padding: var(--space-sm) 0;
            font-size: var(--text-sm);
        }

        .sucesso-info-label { color: var(--text-muted); }

        .sucesso-info-value {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--text-primary);
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .sucesso-acoes {
            display: flex;
            gap: var(--space-sm);
            justify-content: center;
            flex-wrap: wrap;
        }

        .sucesso-acoes .btn { flex: 1; justify-content: center; min-width: 140px; }

        /* ========================================== */
        /* ANIMAÇÕES                                  */
        /* ========================================== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .animate-fade-up {
            animation: fadeUp 0.5s ease forwards;
            opacity: 0;
        }

        /* ========================================== */
        /* RESPONSIVIDADE                             */
        /* ========================================== */
        @media (max-width: 1200px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .pagamento-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 992px) {
            .page-header { flex-direction: column; align-items: stretch; }
            .header-right { justify-content: flex-end; width: 100%; }
            .plano-header { flex-direction: column; align-items: flex-start; }
            .plano-valor { align-items: flex-start; }
            .features-list { grid-template-columns: 1fr; }
            .dados-grid-2 { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; gap: var(--space-sm); }
            .stat-card { padding: var(--space-md); }
            .stat-card .value { font-size: var(--text-h3); }
            
            .page-header { padding: var(--space-md); }
            .header-left h1 { font-size: var(--text-h3); }

            .aviso-pendente { flex-direction: column; text-align: center; }
            .aviso-icon { width: 48px; height: 48px; font-size: 20px; }

            .plano-datas { grid-template-columns: 1fr; }

            .modal-footer { flex-direction: column-reverse; }
            .modal-footer .btn { width: 100%; }

            .sucesso-acoes { flex-direction: column; }
            .sucesso-acoes .btn { width: 100%; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .plano-header { text-align: center; align-items: center; }
            .plano-valor { align-items: center; }
            .metodo-card { flex-wrap: wrap; }
            .metodo-icon { width: 40px; height: 40px; font-size: 18px; }
            .dados-bancarios-item { flex-direction: column; align-items: flex-start; }
            .dados-value-wrapper { width: 100%; justify-content: space-between; }
            .modal-content { width: 95%; }
        }
    </style>

</body>

</html>