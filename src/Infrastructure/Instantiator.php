<?php declare( strict_types=1 );

/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.alainschlesser.com/asmp
 */

namespace ASMP\WordPressIntegration\Infrastructure;

/**
 * Interface to make the act of instantiation extensible/replaceable.
 *
 * This way, a more elaborate mechanism can be plugged in, like using
 * ProxyManager to instantiate proxies instead of actual objects.
 */
interface Instantiator {

	/**
	 * Make an object instance out of an interface or class.
	 *
	 * @param string $class        Class to make an object instance out of.
	 * @param array  $dependencies Optional. Dependencies of the class.
	 * @return object Instantiated object.
	 */
	public function instantiate( string $class, array $dependencies = [] ): object;
}