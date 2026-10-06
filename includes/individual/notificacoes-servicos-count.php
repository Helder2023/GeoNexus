<?php
// includes/individual/notificacoes-servicos-count.php
// Contador de notificações para o módulo de Serviços

// ============================================
// DADOS MOCKADOS - NOTIFICAÇÕES DE SERVIÇOS
// ============================================
$notificacoes = [
    [
        'id' => 1,
        'icon' => 'fa-check-circle',
        'icon_class' => 'green',
        'mensagem' => '<strong>Serviço "Levantamento Topográfico"</strong> foi aprovado',
        'tempo' => 'há 10 minutos',
        'lida' => false,
        'link' => 'index.php'
    ],
    [
        'id' => 2,
        'icon' => 'fa-star',
        'icon_class' => 'yellow',
        'mensagem' => 'Nova <strong>avaliação 5 estrelas</strong> no seu portfólio',
        'tempo' => 'há 30 minutos',
        'lida' => false,
        'link' => 'portfolio.php'
    ],
    [
        'id' => 3,
        'icon' => 'fa-dollar-sign',
        'icon_class' => 'aurora',
        'mensagem' => 'Preço do serviço <strong>"Mapeamento GIS"</strong> foi atualizado',
        'tempo' => 'há 2 horas',
        'lida' => false,
        'link' => 'precos.php'
    ],
    [
        'id' => 4,
        'icon' => 'fa-user-plus',
        'icon_class' => 'geo',
        'mensagem' => 'Novo <strong>cliente interessado</strong> no serviço de Drones',
        'tempo' => 'há 5 horas',
        'lida' => false,
        'link' => 'index.php'
    ],
    [
        'id' => 5,
        'icon' => 'fa-eye',
        'icon_class' => 'blue',
        'mensagem' => 'O seu portfólio teve <strong>45 visualizações</strong> esta semana',
        'tempo' => 'há 1 dia',
        'lida' => true,
        'link' => 'portfolio.php'
    ],
    [
        'id' => 6,
        'icon' => 'fa-edit',
        'icon_class' => 'aurora',
        'mensagem' => '<strong>Serviço "Cadastro Rural"</strong> foi editado com sucesso',
        'tempo' => 'há 2 dias',
        'lida' => true,
        'link' => 'index.php'
    ],
    [
        'id' => 7,
        'icon' => 'fa-chart-line',
        'icon_class' => 'green',
        'mensagem' => 'Os seus serviços tiveram <strong>+23% de procura</strong> este mês',
        'tempo' => 'há 3 dias',
        'lida' => true,
        'link' => 'index.php'
    ],
];

// ============================================
// CALCULAR CONTADORES
// ============================================
$notificacoes_count = count(array_filter($notificacoes, function($n) {
    return $n['lida'] === false;
}));

// ============================================
// OUTROS CONTADORES ÚTEIS
// ============================================
$total_servicos = 8;
$servicos_ativos = 6;
$servicos_inativos = 2;
$total_portfolio = 12;
$total_precos = 8;

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