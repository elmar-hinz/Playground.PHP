<?php

namespace ElmarHinz\BehaviourTests;

class JsonTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 */
	public function helloCycle() {
		$input = ['hello' => 'world'];
		$output = json_decode(json_encode($input), true);
		$this->assertSame($input, $output);
	}

	/**
	 * Show that the default settings process unicode.
	 *
	 * @test
	 */
	public function unicodeCycle() {
		$input = ['é' => 'é'];
		$output = json_decode(json_encode($input), true);
		$this->assertSame($input, $output);
	}

	/**
	 * @test
	 */
	public function simpleOverride() {
		$input = '{ "x":"a", "x":"b" }';
		$expected = ['x' => 'b'];
		$this->assertEquals($expected, json_decode($input, true));
	}

	/**
	 * @test
	 */
	public function recursiveOverrideFails() {
		$input = '{ "a":{"aa":"aa", "bb":"bb"}, "a":{"cc":"cc"}}';
		$wrong = ['a' => ['cc' => 'cc']];
		$output = json_decode($input, true);
		$this->assertEquals($output, $wrong);
	}

}
