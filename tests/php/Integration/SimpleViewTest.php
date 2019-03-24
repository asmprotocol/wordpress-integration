<?php

namespace ASMP\WordPressIntegration\Tests\Integration;

use ASMP\WordPressIntegration\Infrastructure\View\SimpleView;
use ASMP\WordPressIntegration\Infrastructure\View\SimpleViewFactory;
use ASMP\WordPressIntegration\Tests\ViewHelper;

final class SimpleViewTest extends TestCase {

	public function test_it_loads_partials_across_overrides(): void {
		$view = new SimpleView(
			ViewHelper::VIEWS_FOLDER . 'static-view',
			new SimpleViewFactory()
		);

		$this->assertStringStartsWith(
			'<p>Rendering works.</p>',
			$view->render()
		);
	}
}
