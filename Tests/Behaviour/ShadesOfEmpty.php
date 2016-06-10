<?php

namespace ElmarHinz\BehaviourTests;

class ShadesOfEmpty extends \PHPUnit_Framework_TestCase
{

	/**
	 * @test
	 */
	public function FalseIsFalse() {
		$this->assertFalse(false);
	}

	/**
	 * @test
	 */
	public function NullIsNeitherFalseNorTrue() {
		$this->assertNotFalse(null);
		$this->assertNotTrue(null);
	}

	/**
	 * @test
	 */
	public function ZeroIsNeitherFalseNorTrue() {
		$this->assertNotFalse(0);
		$this->assertNotTrue(0);
	}

	/**
	 * @test
	 */
	public function EmptyStringIsNeitherFalseNorTrue() {
		$this->assertNotFalse('');
		$this->assertNotTrue('');
	}

	/**
	 * @test
	 */
	public function StringZeroIsNeitherFalseNorTrue() {
		$this->assertNotFalse('0');
		$this->assertNotTrue('0');
	}

	/**
	 * @test
	 */
	public function NullEvalsToFalse() {
		if(null) $bool = true;
		else $bool = false;
		$this->assertFalse($bool);
	}

	/**
	 * @test
	 */
	public function ZeroEvalsToFalse() {
		if(0) $bool = true;
		else $bool = false;
		$this->assertFalse($bool);
	}

	/**
	 * @test
	 */
	public function EmptyStringEvalsToFalse() {
		if('') $bool = true;
		else $bool = false;
		$this->assertFalse($bool);
	}

	/**
	 * @test
	 */
	public function StringZeroEvalsToFalse() {
		if('0') $bool = true;
		else $bool = false;
		$this->assertFalse($bool);
	}

}

