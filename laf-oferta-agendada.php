<?php

/**
 * Plugin Name: Laf Oferta Agendada
 * Plugin URI: https://agencialaf.com
 * Description: Plugin para agendamento da publicação de ofertas para o site "Raiz Super Atacado".
 * Version: 1.0.0
 * Author: Ingo Stramm
 * Text Domain: laf-oferta-agendada
 * License: GPLv2
 */

defined('ABSPATH') or die('No script kiddies please!');

define('LAF_OA_DIR', plugin_dir_path(__FILE__));
define('LAF_OA_URL', plugin_dir_url(__FILE__));

function laf_oa_debug($debug)
{
    echo '<pre>';
    var_dump($debug);
    echo '</pre>';
}

function laf_oa_get_random()
{
    $randomizr = rand(100, 999);
    return $randomizr;
}
$loa_random_number = laf_oa_get_random();
global $loa_random_number;

require_once 'tgm/tgm.php';
require_once 'classes/classes.php';
require_once 'scripts.php';
require_once 'functions.php';
require_once 'oferta-post-type.php';
require_once 'oferta-cmb2.php';

require 'plugin-update-checker-4.10/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/laf-oferta-agendada/master/info.json',
    __FILE__,
    'laf-oferta-agendada'
);
