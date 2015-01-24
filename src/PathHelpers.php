<?php

namespace Carrooi\Helpers;

use Nette\Object;

/**
 *
 * @author David Kudera
 */
class PathHelpers extends Object
{


	/**
	 * @param string $path
	 * @return string
	 */
	public static function normalize($path)
	{
		$wrapper = '';

		preg_match('/^([a-z]+\:\/\/)?(.*)$/', $path, $match);
		if (count($match) === 3) {
			$wrapper = $match[1];
			$path = $match[2];
		}

		$root = ($path[0] === '/') ? '/' : '';

		$segments = explode('/', trim($path, '/'));
		$ret = [];

		foreach ($segments as $segment) {
			if (($segment == '.') || empty($segment)) {
				continue;
			}

			if ($segment == '..') {
				array_pop($ret);
			} else {
				array_push($ret, $segment);
			}
		}

		return $wrapper. $root. implode('/', $ret);
	}

}
