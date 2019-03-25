<?php declare( strict_types=1 );

/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.asmprotocol.org/
 */

namespace ASMP\WordPressIntegration\Infrastructure\View;

use ASMP\WordPressIntegration\Infrastructure\Service;
use ASMP\WordPressIntegration\Infrastructure\View;
use ASMP\WordPressIntegration\Infrastructure\ViewFactory;

/**
 * A factory to create templated views.
 *
 * If you don't provide the optional locations array, it will default to (in
 * this exact order):
 *  1. child theme folder
 *  2. parent theme folder
 *  3. plugin folder
 */
final class TemplatedViewFactory implements Service, ViewFactory {

	/** @var array<string> */
	private $locations;

	/**
	 * Instantiate a TemplatedViewFactory object.
	 *
	 * @param array $locations Array of locations to use.
	 */
	public function __construct( array $locations = [] ) {
		if ( empty( $locations ) ) {
			$locations = $this->get_default_locations();
		}

		$this->locations = $locations;
	}

	/**
	 * Create a new view object for a given relative path.
	 *
	 * @param string $relative_path Relative path to create the view for.
	 * @return View Instantiated view object.
	 */
	public function create( string $relative_path ): View {
		return new TemplatedView( $relative_path, $this, $this->locations );
	}


	/**
	 * Get the default locations for the templated view.
	 *
	 * @return array Array of default locations.
	 */
	private function get_default_locations(): array {
		return [
			\get_stylesheet_directory(),
			\get_template_directory(),
			\dirname( __DIR__, 3 ),
		];
	}
}
