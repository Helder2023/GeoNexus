<?php
// includes/individual/notificacoes-financeiro-count.php
// Contador de notificações para o módulo Financeiro

// ============================================
// DADOS MOCKADOS - NOTIFICAÇÕES FINANCEIRAS
// ============================================
$notificacoes = [
    [
        'id' => 1,
        'icon' => 'fa-money-bill-wave',
        'icon_class' => 'green',
        'mensagem' => '<strong>Pagamento</strong> de Kz 350.000 recebido',
        'tempo' => 'há 5 minutos',
        'lida' => false,
        'link' => 'pagamentos.php'
    ],
    [
        'id' => 2,
        'icon' => 'fa-file-invoice',
        'icon_class' => 'aurora',
        'mensagem' => 'Fatura <strong>#FT-2026-0156</strong> foi paga',
        'tempo' => 'há 25 minutos',
        'lida' => false,
        'link' => 'faturas.php'
    ],
    [
        'id' => 3,
        'icon' => 'fa-exclamation-triangle',
        'icon_class' => 'red',
        'mensagem' => 'Fatura <strong>#FT-2026-0150</strong> está vencida há 3 dias',
        'tempo' => 'há 2 horas',
        'lida' => false,
        'link' => 'faturas.php'
    ],
    [
        'id' => 4,
        'icon' => 'fa-handshake',
        'icon_class' => 'geo',
        'mensagem' => 'Nova <strong>comissão</strong> de Kz 45.000 disponível',
        'tempo' => 'há 5 horas',
        'lida' => false,
        'link' => 'transacoes.php'
    ],
    [
        'id' => 5,
        'icon' => 'fa-bullseye',
        'icon_class' => 'yellow',
        'mensagem' => 'Meta mensal <strong>85% atingida</strong>! Continue!',
        'tempo' => 'há 1 dia',
        'lida' => true,
        'link' => 'metas.php'
    ],
    [
        'id' => 6,
        'icon' => 'fa-file-signature',
        'icon_class' => 'aurora',
        'mensagem' => 'Orçamento <strong>#ORC-2026-0089</strong> foi aprovado',
        'tempo' => 'há 2 dias',
        'lida' => true,
        'link' => 'orcamentos.php'
    ],
    [
        'id' => 7,
        'icon' => 'fa-chart-line',
        'icon_class' => 'green',
        'mensagem' => 'Faturamento deste mês <strong>+23%</strong> face ao anterior',
        'tempo' => 'há 3 dias',
        'lida' => true,
        'link' => 'relatorios-financeiros.php'
    ],
];

// ============================================
// CALCULAR CONTADORES
// ============================================
$notificacoes_count = count(array_filter($notificacoes, function($n) {
    return $n['lida'] === false;
}));

// ============================================
// CONTADORES FINANCEIROS
// ============================================
$total_transacoes = 156;
$total_pagamentos_pendentes = 8;
$total_faturas_pendentes = 12;
$total_orcamentos = 24;
$total_clientes = 18;
$total_metas = 5;

// ============================================
// VALORES FINANCEIROS
// ============================================
$faturamento_mes = 3450000;
$faturamento_total = 28500000;
$valor_receber = 850000;
$valor_pagar = 320000;
$saldo_atual = 2150000;

// ============================================
// DADOS DO PROFISSIONAL
// ============================================
$profissional_atual = [
    'id' => 1,
    'nome' => 'Carlos Mendes',
    'email' => 'carlos.mendes@email.com',
    'avatar' => 'avatar-1.png',
    'profissao' => 'Engenheiro Topógrafo',
    'plano' => 'Pro',
    'plano_status' => 'ativo',
    'nivel' => 'Profissional Certificado',
    'avaliacao' => 4.8,
    'total_avaliacoes' => 42
];
?>