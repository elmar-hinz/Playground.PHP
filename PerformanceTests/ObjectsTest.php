<?php

namespace ElmarHinz\PerformanceTests;

require_once('vendor/autoload.php');

class A { }
class B extends A { }
class C { public function __construct() { 1; } }
class I {
	protected $id;
	public function __construct($id) { $this->id = $id; }
}
class V { protected $a = 1; }

/**
 * Despite the tests have the same pattern I don't put them into a common
 * function, because the creation of a class from a varible $className
 * approximately doubles the creation time.
 */
class ObjectsTest extends \ElmarHinz\PerformanceTestCase
{

	protected $formatA
		= "1.000.000 times \$objects[] = new A():                     %f";
	protected $formatAP
		= "1.000.000 times array_push(\$objects, new A()):            %f";
	protected $formatB
		= "1.000.000 times \$objects[] = new B() extends A:           %f";
	protected $formatC
		= "1.000.000 times \$objects[] = new C() with constructor:    %f";
	protected $formatI
		= "1.000.000 times \$objects[] = new I(i++) uniqe identity:   %f";
	protected $formatV
		= "1.000.000 times \$objects[] = new V() with variable:       %f";

	/**
	 * @test
	 */
	public function billionTimesObjectsOfOneClass() {
		$objects = [];
		$duration = $this->timeIt(function() use(&$objects) {
			for($i = 0; $i < 1000000; $i++) {
				$objects[] = new A();
			}
		});
		$this->assertEquals(1000000, count($objects));
		$this->writeLn(sprintf($this->formatA, $duration));
	}

	/**
	 * @test
	 */
	public function billionTimesObjectsOfOneClassWithParent() {
		$objects = [];
		$duration = $this->timeIt(function() use(&$objects) {
			for($i = 0; $i < 1000000; $i++) {
				$objects[] = new B();
			}
		});
		$this->assertEquals(1000000, count($objects));
		$this->writeLn(sprintf($this->formatB, $duration));
	}

	/**
	 * @test
	 */
	public function billionTimesObjectsOfOneClassWithConstructor() {
		$objects = [];
		$duration = $this->timeIt(function() use(&$objects) {
			for($i = 0; $i < 1000000; $i++) {
				$objects[] = new C();
			}
		});
		$this->assertEquals(1000000, count($objects));
		$this->writeLn(sprintf($this->formatC, $duration));
	}

	/**
	 * @test
	 */
	public function billionTimesObjectsOfOneClassWithVariable() {
		$objects = [];
		$duration = $this->timeIt(function() use(&$objects) {
			for($i = 0; $i < 1000000; $i++) {
				$objects[] = new V();
			}
		});
		$this->assertEquals(1000000, count($objects));
		$this->writeLn(sprintf($this->formatV, $duration));
	}

	/**
	 * @test
	 */
	public function billionTimesObjectsOfOneClassWithIdentity() {
		$objects = [];
		$duration = $this->timeIt(function() use(&$objects) {
			for($i = 0; $i < 1000000; $i++) {
				$objects[] = new I($i);
			}
		});
		$this->assertEquals(1000000, count($objects));
		$this->writeLn(sprintf($this->formatI, $duration));
	}

	/**
	 * @test
	 */
	public function billionTimesObjectsOfOneClassWith_ArrayPush() {
		$objects = [];
		$duration = $this->timeIt(function() use(&$objects) {
			for($i = 0; $i < 1000000; $i++) {
				array_push($objects, new A());
			}
		});
		$this->assertEquals(1000000, count($objects));
		$this->writeLn(sprintf($this->formatAP, $duration));
	}

}

