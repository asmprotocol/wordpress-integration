<?php

namespace ASMP\WordPressIntegration\Tests\Integration;

use ASMP\WordPressIntegration\Infrastructure\View;
use ASMP\WordPressIntegration\Infrastructure\View\TemplatedView;
use ASMP\WordPressIntegration\Infrastructure\View\TemplatedViewFactory;
use ASMP\WordPressIntegration\Tests\ViewHelper;

final class TemplatedViewFactoryTest extends TestCase {

	public function test_it_can_create_views(): void {
		$factory = new TemplatedViewFactory( ViewHelper::LOCATIONS );

		$view = $factory->create( 'static-view' );
		$this->assertInstanceOf( TemplatedView::class, $view );
	}

	public function test_created_views_implement_the_interface(): void {
		$factory = new TemplatedViewFactory( ViewHelper::LOCATIONS );

		$view = $factory->create( 'static-view' );
		$this->assertInstanceOf( View::class, $view );
	}
}
