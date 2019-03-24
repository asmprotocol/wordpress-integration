<?php declare( strict_types=1 );

/**
 * ASMP WordPress Integration Plugin.
 *
 * @package   ASMP\WordPressIntegration
 * @license   MIT
 * @link      https://www.alainschlesser.com/asmp
 */

namespace ASMP\WordPressIntegration\Tests\Fixture;

final class DummyClassWithDependency implements DummyInterface {

	/** @var DummyClass */
	private $dummy;

	public function __construct( DummyClass $dummy ) {
		$this->dummy = $dummy;
	}

	public function get_dummy(): DummyClass {
		return $this->dummy;
	}
}
