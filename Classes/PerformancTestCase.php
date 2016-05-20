<?php

namespace ElmarHinz;

class PerformanceTestCase extends \PHPUnit_Framework_TestCase
{
	protected function timeIt($callback)
	{
		$start = microtime(true);
		$callback();
		$stop = microtime(true);
		return $stop - $start;
	}
}

