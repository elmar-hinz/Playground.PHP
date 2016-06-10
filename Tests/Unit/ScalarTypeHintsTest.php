<?php

declare(strict_types=1);

class ScalarTypeHintsTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->fixture = new \ElmarHinz\ScalarTypeHints();
	}

	/**
	 * @test
	 * @expectedException TypeError
	 * @expectedExceptionMessage Argument
	 * @expectedExceptionMessage integer given
	 */
	public function setString()
	{
		$this->fixture->setString(1);
	}
}


