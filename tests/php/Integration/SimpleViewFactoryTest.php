<?php

namespace ASMP\WordPressIntegration\Tests\Integration;

use ASMP\WordPressIntegration\Infrastructure\View;
use ASMP\WordPressIntegration\Infrastructure\View\SimpleView;
use ASMP\WordPressIntegration\Infrastructure\View\SimpleViewFactory;
use ASMP\WordPressIntegration\Tests\ViewHelper;

final class SimpleViewFactoryTest extends TestCase {

	public function test_it_can_create_views(): void {
		$factory = new SimpleViewFactory();

		$view = $factory->create( ViewHelper::VIEWS_FOLDER . 'static-view' );
		$this->assertInstanceOf( SimpleView::class, $view );
	}

	public function test_created_views_implement_the_interface(): void {
		$factory = new SimpleViewFactory();

		$view = $factory->create( ViewHelper::VIEWS_FOLDER . 'static-view' );
		$this->assertInstanceOf( View::class, $view );
	}
}
