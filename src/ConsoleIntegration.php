<?php
/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.alainschlesser.com/asmp
 */

namespace ASMP\WordPressIntegration;

use ASMP\WordPressIntegration\Infrastructure\Registerable;
use ASMP\WordPressIntegration\Infrastructure\Service;
use WP_CLI;

/**
 *
 */
final class ConsoleIntegration implements Service, Registerable {

	/**
	 * Register the service.
	 *
	 * @return void
	 */
	public function register(): void {
		if ( ! class_exists( 'WP_CLI' ) ) {
			return;
		}

		WP_CLI::add_command( 'asmp', Console\AsmpCommand::class );
	}
}
