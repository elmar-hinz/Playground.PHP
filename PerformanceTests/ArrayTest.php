<?php

namespace ElmarHinz\PerformanceTests;

require_once('vendor/autoload.php');

class ArrayTest extends \ElmarHinz\PerformanceTestCase
{
	protected $format
		= "%15s: %9.2f milliseconds";

	protected function getArrayOfLenght($length)
	{
		$array = [];
		for($i = 1; $i <= $length; $i++) {
			$array[] = $i;
		}
		return $array;
	}

	/**
	 * @test
	 */
	public function extendingAnArray()
	{
		$times = 1000;
		foreach([100, 1000, 10000, 100000] as $length) {
			$this->writeLn("");
			$this->writeLn(sprintf("%5d times with array of length %6d", $times, $length));
			$this->writeLn("=======================================");
			$array = $this->getArrayOfLenght($length);
			$duration = $this->timeIt(function() use($times, $array) {
				for($i = 1; $i < $times; $i++) {
					$array[] = 1;
					array_pop($array);
				}
			});
			$this->assertEquals($length, count($array));
			$this->writeLn(sprintf($this->format, '[]= /pop', $duration));

			$array2 = $this->getArrayOfLenght($length);
			$duration = $this->timeIt(function() use($times, $array2) {
				for($i = 1; $i < $times; $i++) {
					array_push($array2, 1);
					array_pop($array2);
				}
			});
			$this->assertEquals($length, count($array2));
			$this->writeLn(sprintf($this->format, 'push/pop', $duration));

			$array3 = $this->getArrayOfLenght($length);
			$duration = $this->timeIt(function() use($times, $array3) {
				for($i = 1; $i < $times; $i++) {
					array_unshift($array3, 1);
					array_pop($array3);
				}
			});
			$this->assertEquals($length, count($array3));
			$this->writeLn(sprintf($this->format, 'unshift/pop', $duration));

			$array4 = $this->getArrayOfLenght($length);
			$duration = $this->timeIt(function() use($times, $array4) {
				for($i = 1; $i < $times; $i++) {
					array_unshift($array4, 4);
					array_shift($array4);
				}
			});
			$this->assertEquals($length, count($array4));
			$this->writeLn(sprintf($this->format, 'unshift/shift', $duration));
		}
	}

}

