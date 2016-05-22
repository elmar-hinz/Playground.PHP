<?php



class HelloTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 */
	public function main()
	{
		$object = new \ElmarHinz\Hello();
		ob_start();
		$object->world();
		$out = ob_get_contents();
		ob_end_clean();
		$this->assertEquals("Hello world!".PHP_EOL, $out);
	}

}


