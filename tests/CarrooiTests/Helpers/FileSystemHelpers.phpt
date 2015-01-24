<?php

/**
 * Test: Carrooi\Helpers\FileSystemHelpers
 *
 * @testCase CarrooiTests\Helpers\FileSystemHelpersTest
 * @author David Kudera
 */

namespace CarrooiTests\Helpers;

use Carrooi\Helpers\FileSystemHelpers;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__. '/../bootstrap.php';

/**
 *
 * @author David Kudera
 */
class FileSystemHelpersTest extends TestCase
{


	public function testExpandFiles()
	{
		$paths = [
			__DIR__. '/files/js',
			__DIR__. '/files/css/style.css',
			[
				'mask' => '*.css',
				'from' => __DIR__. '/files/css/components',
			],
			[
				'mask' => '*.css',
				'in' => __DIR__. '/files/css/core',
			]
		];

		$expect = [
			__DIR__. '/files/js/menu.js',
			__DIR__. '/files/js/web.js',
			__DIR__. '/files/css/style.css',
			__DIR__. '/files/css/components/widgets/favorite.css',
			__DIR__. '/files/css/components/footer.css',
			__DIR__. '/files/css/components/menu.css',
			__DIR__. '/files/css/core/mixins.css',
			__DIR__. '/files/css/core/variables.css',
		];

		$actual = FileSystemHelpers::expandFiles($paths);

		sort($expect);
		sort($actual);

		Assert::same($expect, $actual);
	}

}


run(new FileSystemHelpersTest);
