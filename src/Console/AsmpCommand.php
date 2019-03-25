<?php
/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.alainschlesser.com/asmp
 */

namespace ASMP\WordPressIntegration\Console;

use WP_CLI;

final class AsmpCommand {

	/**
	 * Run a check against ASMP.
	 *
	 * @param array $args Positional arguments.
	 * @param array $assoc_args Associative arguments.
	 */
	public function check( array $args, array $assoc_args ) {
		WP_CLI::error( 'Not implemented yet' );
	}

	/**
	 * Request a change through ASMP.
	 *
	 * @param array $args Positional arguments.
	 * @param array $assoc_args Associative arguments.
	 */
	public function change( array $args, array $assoc_args ) {
		WP_CLI::error( 'Not implemented yet' );
	}

	/**
	 * Roll back a change through ASMP.
	 *
	 * @param array $args Positional arguments.
	 * @param array $assoc_args Associative arguments.
	 */
	public function rollback( array $args, array $assoc_args ) {
		WP_CLI::error( 'Not implemented yet' );
	}

	/**
	 * Run a check against ASMP.
	 *
	 * ## OPTIONS
	 *
	 * <id>
	 * : ID of the change to roll back.
	 *
	 * @param array $args Positional arguments.
	 * @param array $assoc_args Associative arguments.
	 */
	public function status( array $args, array $assoc_args ) {
		WP_CLI::error( 'Not implemented yet' );
	}
}
