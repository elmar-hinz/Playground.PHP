<?php

namespace ElmarHinz\BehaviourTests;

class ArrayTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @test
	 */
	public function returnFromNoneExistingKey() {
		$array = [];
		$result = $array['nope'];
		$this->assertSame(null, $result);
	}

	/**
	 * @test
	 */
	public function test_array_intersect_key() {
		$order = [
			'alpha' => 'alpha',
			'beta' => 'beta',
			'gamma' => 'gamma',
			'delate' => 'delate',
		];
		$selection = [
			'delate' => 'd',
			'beta' => 'b',
			'gamma' => 'g',
		];
		$expected = [
			'beta' => 'beta',
			'gamma' => 'gamma',
			'delate' => 'delate',
		];
		$result = array_intersect_key($order, $selection);
		$this->assertSame($expected, $result);
	}


	/**
	 * @test
	 */
	public function returnReferenceToReferenceKeepsSameArray() {
		$a = [1, 2];
		$r =& $this->returnByReference($a);
		$this->assertSame($a, $r);
		array_shift($r);
		$this->assertSame($a, $r);
	}

	/**
	 * @test
	 */
	public function returnReferenceToCopyIsDifferent() {
		$a = [1, 2];
		$r = $this->returnByReference($a);
		// This doesn't test for identity of memory
		$this->assertSame($a, $r);
		array_shift($r);
		$this->assertNotSame($a, $r);
	}

	/**
	 * @test
	 */
	public function returnCopyToCopysDifferent() {
		$a = [1, 2];
		$r = $this->returnWithoutReference($a);
		$this->assertSame($a, $r);
		array_shift($r);
		$this->assertNotSame($a, $r);
	}

	/**
	 * @test
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function returnCopyToReferenceFails() {
		$a = [1, 2];
		$r =& $this->returnWithoutReference($a);
	}

	/**
	 * @helper
	 */
	protected function &returnByReference(&$array)
	{
		$array[] = 3;
		return $array;
	}

	/**
	 * @helper
	 */
	protected function returnWithoutReference(&$array)
	{
		$array[] = 3;
		return $array;
	}
}
