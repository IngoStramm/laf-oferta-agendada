<?php

add_action('wp_enqueue_scripts', 'laf_oa_frontend_scripts');

function laf_oa_frontend_scripts()
{
    global $loa_random_number;

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) ? '' : '.min';
    $random_version = empty($min) ? null : $loa_random_number;

    if (empty($min)) :
        wp_enqueue_script('laf-oferta-agendada-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
    endif;

    wp_enqueue_script('glider-script', LAF_OA_URL . 'assets/js/glider' . $min . '.js', array(), '1.7.4', true);

    wp_register_script('laf-oferta-agendada-script', LAF_OA_URL . 'assets/js/laf-oferta-agendada' . $min . '.js', array('jquery', 'glider-script'), $random_version, true);

    wp_enqueue_script('laf-oferta-agendada-script');

    wp_localize_script('laf-oferta-agendada-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    wp_enqueue_style('glider-style', LAF_OA_URL . 'assets/css/glider' . $min . '.css', array(), '1.7.4', 'all');

    wp_enqueue_style('laf-oferta-agendada-style', LAF_OA_URL . 'assets/css/laf-oferta-agendada.css', array(), $random_version, 'all');
}
