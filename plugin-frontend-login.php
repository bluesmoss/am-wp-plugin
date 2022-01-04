<?php
/**
 * Plugin Name:       Front end plugin
 * Plugin URI:        https://github.com/bluesmoss
 * Description:       Handle the front end login
 * Version:           1.1.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Alfredo Morales
 * Author URI:        https://github.com/bluesmoss
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       front-end-plugin
 * Domain Path:       /frontend
 */

define("PLZ_PATHS", plugin_dir_path(__FILE__));

//API Rest
require_once PLZ_PATHS."/includes/API/api-registro.php";
require_once PLZ_PATHS."/includes/API/api-login.php";

//Shortcodes
require_once PLZ_PATHS."/public/shortcode/form-registro.php";
require_once PLZ_PATHS."/public/shortcode/form-login.php";

function plz_plugin_activate(){
  add_role('client', 'Client', "read_only");
}

register_activation_hook(__FILE__, 'plz_plugin_activate');

function plz_plugin_disable(){
  remove_role('client');
}

register_deactivation_hook(__FILE__, 'plz_plugin_disable');

//Blocks
require_once PLZ_PATHS . '/blocks/register/index.php';
require_once PLZ_PATHS . '/blocks/news/index.php';
