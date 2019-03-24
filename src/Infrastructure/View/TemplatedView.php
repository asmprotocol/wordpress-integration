<?php declare( strict_types=1 );

/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.alainschlesser.com/asmp
 */

namespace ASMP\WordPressIntegration\Infrastructure\View;

use ASMP\WordPressIntegration\Exception\InvalidPath;
use ASMP\WordPressIntegration\Infrastructure\ViewFactory;

/**
 * A templated variation of the simplified view object.
 *
 * It has an ordered list of locations and traverses these until it finds a
 * matching view.
 *
 * If you don't provide specific locations, it looks within the child theme and
 * parent theme folders first for a view, before going to the plugin folder.
 */
final class TemplatedView extends SimpleView {

	/** @var array<string> */
	private $locations = [];

	/**
	 * Instantiate a TemplatedView object.
	 *
	 * @param string      $path         Path to the view file to render.
	 * @param ViewFactory $view_factory View factory instance to use.
	 * @param array       $locations    Optional. Array of locations to use.
	 */
	public function __construct(
		string $path,
		ViewFactory $view_factory,
		array $locations = []
	) {
		$this->set_locations( $locations );
		parent::__construct( $path, $view_factory );
	}

	/**
	 * Set the locations for the templated view.
	 *
	 * @param array $locations Array of locations.
	 * @return self Modified templated view.
	 */
	public function set_locations( array $locations ): self {
		if ( empty( $locations ) ) {
			$locations = $this->get_default_locations();
		}

		$this->locations = array_map( function ( $location ) {
			return $this->ensure_trailing_slash( $location );
		}, $locations );

		return $this;
	}

	/**
	 * Add a location to the templated view.
	 *
	 * @param string $location Location to add.
	 * @return self Modified templated view.
	 */
	public function add_location( string $location ): self {
		$this->locations[] = $this->ensure_trailing_slash( $location );

		return $this;
	}

	/**
	 * Validate a path.
	 *
	 * @param string $path Path to validate.
	 *
	 * @return string Validated Path.
	 * @throws InvalidPath If an invalid path was passed into the View.
	 */
	protected function validate( string $path ): string {
		$path = $this->check_extension( $path, static::VIEW_EXTENSION );

		foreach ( $this->get_locations( $path ) as $location ) {
			if ( \is_readable( $location ) ) {
				return $location;
			}
		}

		if ( ! \is_readable( $path ) ) {
			throw InvalidPath::from_path( $path );
		}

		return $path;
	}

	/**
	 * Get the possible locations for the view.
	 *
	 * @param string $path Path of the view to get the locations for.
	 *
	 * @return array Array of possible locations.
	 */
	private function get_locations( string $path ): array {
		if ( empty( $this->locations ) ) {
			$this->set_default_locations();
		}

		return array_map( function ( $location ) use ( $path ) {
			return "{$location}{$path}";
		}, $this->locations );
	}

	/**
	 * Get the default locations for the templated view.
	 *
	 * @return array Array of default locations.
	 */
	private function get_default_locations(): array {
		return [
			STYLESHEETPATH,
			TEMPLATEPATH,
			\dirname( __DIR__, 2 ),
		];
	}
}
