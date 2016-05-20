<?php

namespace ElmarHinz\BehaviourTests;

class ErrorTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 */
	public function divisionByZero() {
		@$a = 1/0;
		$last = error_get_last();
		$this->assertSame(INF, $a);
		$this->assertSame('Division by zero', $last['message']);
		$this->assertSame(E_WARNING, $last['type']);
	}

	/**
	 * @test
	 */
	public function notice() {
		$a = [];
		@$b = $a['x'];
		$last = error_get_last();
		$this->assertSame(E_NOTICE, $last['type']);
	}

	/**
	 * @test
	 */
	public function helloError() {
		$this->assertTrue(true);
	}
}
