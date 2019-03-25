<?php
/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.alainschlesser.com/asmp
 */

namespace ASMP\WordPressIntegration\Console;

use ASMP\WordPressIntegration\ASMP;
use WP_CLI;

final class AsmpCommand {

	/**
	 * Run a check against ASMP.
	 *
	 * @param array $args       Optional. Array of positional arguments.
	 * @param array $assoc_args Optional. Array of associative arguments.
	 */
	public function check( array $args, array $assoc_args ): void {
		$this->ensure_asmp_is_available();

		WP_CLI::error( 'Not implemented yet' );
	}

	/**
	 * Request a change through ASMP.
	 *
	 * @param array $args       Optional. Array of positional arguments.
	 * @param array $assoc_args Optional. Array of associative arguments.
	 */
	public function change( array $args = [], array $assoc_args = [] ): void {
		$this->ensure_asmp_is_available();

		WP_CLI::error( 'Not implemented yet' );
	}

	/**
	 * Roll back a change through ASMP.
	 *
	 * @param array $args       Optional. Array of positional arguments.
	 * @param array $assoc_args Optional. Array of associative arguments.
	 */
	public function rollback( array $args = [], array $assoc_args = [] ): void {
		$this->ensure_asmp_is_available();

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
	 * @param array $args       Optional. Array of positional arguments.
	 * @param array $assoc_args Optional. Array of associative arguments.
	 */
	public function status( array $args = [], array $assoc_args = [] ): void {
		WP_CLI::error( 'Not implemented yet' );
	}

	/**
	 * Check whether ASMP is available.
	 *
	 * @subcommand is-available
	 * @param array $args       Optional. Array of positional arguments.
	 * @param array $assoc_args Optional. Array of associative arguments.
	 */
	public function is_available( array $args = [], array $assoc_args = [] ): void {
		if ( false === \getenv( ASMP::VERSION ) ) {
			exit( 1 );
		}

		exit( 0 );
	}

	/**
	 * Get the supported version of ASMP.
	 *
	 * @param array $args       Optional. Array of positional arguments.
	 * @param array $assoc_args Optional. Array of associative arguments.
	 */
	public function version( array $args = [], array $assoc_args = [] ): void {
		$this->ensure_asmp_is_available();

		WP_CLI::log( \getenv( ASMP::VERSION ) );
	}

	/**
	 * Get the provided endpoint of ASMP.
	 *
	 * @param array $args       Optional. Array of positional arguments.
	 * @param array $assoc_args Optional. Array of associative arguments.
	 */
	public function endpoint( array $args = [], array $assoc_args = [] ): void {
		$this->ensure_asmp_is_available();

		WP_CLI::log( \getenv( ASMP::VERSION ) );
	}

	/**
	 * Check whether ASMP is supported.
	 *
	 * @return bool Whether ASMP is supported.
	 */
	private function is_supported(): bool {
		return false !== \getenv( ASMP::VERSION );
	}

	/**
	 * Ensure that ASMP is available.
	 *
	 * Throws a WP_CLI error and exits the process if not.
	 */
	private function ensure_asmp_is_available(): void {
		if ( ! $this->is_supported() ) {
			WP_CLI::error( 'ASMP is not available.' );
		}
	}
}
