<?php

namespace ElmarHinz\PerformanceTests;

require_once('vendor/autoload.php');

class AThousandClassesTest extends \ElmarHinz\PerformanceTestCase
{

	protected $randId = 0;
	protected $tmpDir = '/tmp/a1000classes';
	protected $classPattern = '/tmp/a1000classes/*/*.php';

	protected $format1
		= "1.) Read (by file()):                                  %4d milliseconds";
	protected $format2
		= "2.) 1. + parse (by require_once()):                    %4d milliseconds";
	protected $format3
		= "3.) 2. + initialise each of 1000 classes one time:     %4d milliseconds";
	protected $format4
		= "4.) 2. + initialise each of 1000 classes 1000 times:   %4d milliseconds";
	protected $format5
		= "5.) 3. + execute each of 1000 objects 1000 lines each: %4d milliseconds";

	public function setUp() {
		$this->randId = "d" . rand(1000, 1000000);
		passthru('mkdir -p ' . $this->getDir());
		$this->createClasses();
	}

	public function tearDown() {
		passthru('rm -rf ' . $this->tmpDir);
	}

	protected function getDir()
	{
		return $this->tmpDir . '/' . $this->randId;
	}

	protected function createClasses() {
		for($i = 1; $i <= 1000; $i++) {
			$className = 'A'.$i;
			$content = $this->getClassContent($className);
			$path = sprintf("%s/%s.php", $this->getDir(), $className);
			file_put_contents($path, $content);
		}
	}

	protected function getClassContent($className)
	{
		$main = '';
		for($i = 1; $i <= 1000; $i++) {
			$main .= sprintf("        \$var=%d;\n", $i);
		}
		$format = '<?php
class %s
{
	protected $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

	function main()
	{
%s
	}
}
';
		return sprintf($format, $className, $main);
	}

	protected function findFiles()
	{
		return glob($this->classPattern);
	}

	/**
	 * @test
	 */
	public function setupDone() {
		$this->assertEquals(1000, count($this->findFiles()));
	}

	/**
	 * @test
	 */
	public function read() {
		$duration = $this->timeIt(function() {
			foreach($this->findFiles() as $file) file($file);
		});
		$this->writeLn(sprintf("\n".$this->format1, $duration));
	}

	/**
	 * @test
	 */
	public function parse() {
		$duration = $this->timeIt(function() {
			foreach($this->findFiles() as $file) require($file);
		});
		$this->writeLn(sprintf("\n".$this->format2, $duration));
	}

	/**
	 * @test
	 */
	public function singletons() {
		$duration = $this->timeIt(function() {
			$objects = [];
			foreach($this->findFiles() as $file) {
				require($file);
				$Class = basename($file, '.php');
				$objects[] = new $Class($Class);
			}
			$this->assertEquals(1000, count($objects));
		});
		$this->writeLn(sprintf("\n".$this->format3, $duration));
	}

	/**
	 * @test
	 */
	public function mulitple() {
		$duration = $this->timeIt(function() {
			$objects = [];
			foreach($this->findFiles() as $file) {
				require($file);
				$Class = basename($file, '.php');
				for($i = 1; $i <= 1000; $i++) {
					$objects[] = new $Class($Class);
				}
			}
			$this->assertEquals(1000000, count($objects));
		});
		$this->writeLn(sprintf("\n".$this->format4, $duration));
	}

	/**
	 * @test
	 */
	public function executeSingletons() {
		$duration = $this->timeIt(function() {
			$objects = [];
			foreach($this->findFiles() as $file) {
				require($file);
				$Class = basename($file, '.php');
				$objects[] = new $Class($Class);
				foreach($objects as $object) {
					$object->main();
				}
			}
		});
		$this->writeLn(sprintf("\n".$this->format5, $duration));
	}

}

