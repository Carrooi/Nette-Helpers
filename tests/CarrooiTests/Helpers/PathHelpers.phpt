<?php

/**
 * Test: Carrooi\Helpers\PathHelpers
 *
 * @testCase CarrooiTests\Helpers\PathHelpersTest
 * @author David Kudera
 */

namespace CarrooiTests\Helpers;

use Carrooi\Helpers\PathHelpers;
use Tester\Assert;
use Tester\TestCase;

require_once __DIR__. '/../bootstrap.php';

/**
 *
 * @author David Kudera
 */
class PathHelpersTest extends TestCase
{


	/**
	 * @return array
	 */
	public function getNormalizePaths()
	{
		return [
			['/files/.././', '/'],
			['/files/css/./components/.././../packages.json', '/files/packages.json'],
			['file:///files/css/../packages.json', 'file:///files/packages.json']
		];
	}


	/**
	 * @dataProvider getNormalizePaths
	 * @param string $actual
	 * @param string $expected
	 */
	public function testNormalize($actual, $expected)
	{
		Assert::same($expected, PathHelpers::normalize($actual));
	}

}


run(new PathHelpersTest);
