<?php

namespace ElmarHinz;

class PerformanceTestCase extends \PHPUnit_Framework_TestCase
{
	protected static $_reportFile = 'Reports/Report.txt';

	protected function timeIt($callback)
	{
		$start = microtime(true);
		$callback();
		$stop = microtime(true);
		return $stop - $start;
	}

	protected static function newReport($file = "Reports/Report.txt")
	{
		self::$_reportFile = $file;
		file_put_contents($file, '');
	}

	protected function writeLn($string)
	{
		$string = $string . "\n";
		file_put_contents(self::$_reportFile, $string, FILE_APPEND);
	}

}

