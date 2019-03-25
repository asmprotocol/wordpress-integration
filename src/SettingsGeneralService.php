<?php
/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.asmprotocol.org/
 */

namespace ASMP\WordPressIntegration;

use ASMP\WordPressIntegration\Infrastructure\Registerable;
use ASMP\WordPressIntegration\Infrastructure\Service;
use ASMP\WordPressIntegration\Infrastructure\ViewFactory;

/**
 *
 */
final class SettingsGeneralService implements Service, Registerable {

	/** @var ViewFactory */
	private $view_factory;

	/**
	 * Instantiate a SampleService object.
	 *
	 * @param ViewFactory $view_factory View factory to use for instantiating
	 *                                  the views.
	 */
	public function __construct( ViewFactory $view_factory ) {
		$this->view_factory = $view_factory;
	}

	/**
	 * Register the service.
	 *
	 * @return void
	 */
	public function register(): void {
		if ( ! $this->has_asmp() ) {
			return;
		}

		\add_action( 'admin_init', function () {
			\add_settings_field(
				'asmp',
				esc_html__( 'PHP Versions', 'asmp' ),
				[ $this, 'render' ],
				'general'
			);
		} );
	}

	/**
	 * Render the admin notice.
	 *
	 * @return void
	 */
	public function render(): void {
		echo $this->view_factory->create( 'views/setting' )
		                        ->render( [ 'options' => $this->retrieve_php_version_options() ] );
	}

	/**
	 * Check whether ASMP is available.
	 *
	 * @return bool Whether ASMP is available.
	 */
	private function has_asmp(): bool {
		return true;
		// return isset( $_SERVER[ ASMP::VERSION ] );
	}

	/**
	 * Get the ASMP endpoint to communimcate with.
	 *
	 * @return string ASMP endpoint.
	 */
	private function get_endpoint(): string {
		return '';
		// return $_SERVER[ ASMP::ENDPOINT ];
	}

	/**
	 * Retrieve the available options for the PHP version.
	 *
	 * @return array
	 */
	private function retrieve_php_version_options() {
		// TODO
		return [ '5.6', '7.0', '7.2' ];
	}
}

