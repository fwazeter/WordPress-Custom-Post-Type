<?php
/*
 * Plugin Name: CPT Boilerplate
 * Plugin URI: https://wazfactor.com/wazframe
 * Description: Boilerplate for PHP Class based Custom Post Types & Block Editor Templates.
 * Version: 0.1.0
 * Author: Frank Wazeter
 * Author URI: https://wazeter.com
 * Text Domain: cpt-boilerplate
 * Domain Path: /i18n/languages
 * Requires at least: 5.9
 * Requires PHP: 7.4
 *
 * @package WazFrame
 */
defined( 'ABSPATH' ) || exit;


require_once dirname( __FILE__ ) . '/src/Autoloader.php';
\WazFactor\CPT\Autoloader::register();

$load_plugin = new \WazFactor\CPT\Plugin( __FILE__ );
add_action( 'after_setup_theme', array( $load_plugin, 'load' ) );