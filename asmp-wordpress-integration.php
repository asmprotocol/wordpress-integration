<?php
/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.asmprotocol.org/
 *
 * @wordpress-plugin
 * Plugin Name:  ASMP WordPress Integration Plugin
 * Plugin URI:   https://www.asmprotocol.org/
 * Description:  WordPress Integration Plugin for ASMP.
 * Version:      0.1.0
 * Requires PHP: 7.2
 * Text Domain:  asmp
 * Domain Path:  /languages
 * License:      MIT
 * License URI:  https://opensource.org/licenses/MIT
 */

namespace ASMP\WordPressIntegration;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

$composer_autoloader = __DIR__ . '/vendor/autoload.php';

if ( is_readable ( $composer_autoloader ) ) {
	require $composer_autoloader;
}

$plugin = PluginFactory::create();


\register_activation_hook( __FILE__, function () use ( $plugin ) {
	$plugin->activate();
} );

\register_deactivation_hook( __FILE__, function () use ( $plugin ) {
	$plugin->deactivate();
} );

$plugin->register();
