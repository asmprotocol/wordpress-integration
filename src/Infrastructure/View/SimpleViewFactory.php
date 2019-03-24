<?php declare( strict_types=1 );

/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.alainschlesser.com/asmp
 */

namespace ASMP\WordPressIntegration\Infrastructure\View;

use ASMP\WordPressIntegration\Infrastructure\Service;
use ASMP\WordPressIntegration\Infrastructure\View;
use ASMP\WordPressIntegration\Infrastructure\ViewFactory;

/**
 * Factory to create the simplified view objects.
 */
final class SimpleViewFactory implements Service, ViewFactory {

	/**
	 * Create a new view object for a given relative path.
	 *
	 * @param string $relative_path Relative path to create the view for.
	 * @return View Instantiated view object.
	 */
	public function create( string $relative_path ): View {
		return new SimpleView( $relative_path, $this );
	}
}
