A Million Objects Test
======================

PHP5
----

::

    1.000.000 times $objects[] = new A():                      332 milliseconds
    1.000.000 times $objects[] = new B() extends A:            331 milliseconds
    1.000.000 times $objects[] = new C() with constructor:     463 milliseconds
    1.000.000 times $objects[] = new V() with variable:        385 milliseconds
    1.000.000 times $objects[] = new I(i++) uniqe identity:    689 milliseconds
    1.000.000 times array_push($objects, new A()):            3298 milliseconds

PHP7
----

::

    1.000.000 times $objects[] = new A():                      139 milliseconds
    1.000.000 times $objects[] = new B() extends A:            134 milliseconds
    1.000.000 times $objects[] = new C() with constructor:     209 milliseconds
    1.000.000 times $objects[] = new V() with variable:        144 milliseconds
    1.000.000 times $objects[] = new I(i++) uniqe identity:    235 milliseconds
    1.000.000 times array_push($objects, new A()):             213 milliseconds

A Thousand Classes Test
=======================

PHP5
----

::

    1.) Read (by file()):                                   132 milliseconds

    2.) 1. + parse (by require_once()):                     737 milliseconds

    3.) 2. + initialise each of 1000 classes one time:      723 milliseconds

    4.) 2. + initialise each of 1000 classes 1000 times:   1692 milliseconds

    5.) 3. + execute each of 1000 objects 1000 lines each: 5724 milliseconds

PHP7
----

::

    1.) Read (by file()):                                    71 milliseconds

    2.) 1. + parse (by require_once()):                     593 milliseconds

    3.) 2. + initialise each of 1000 classes one time:      589 milliseconds

    4.) 2. + initialise each of 1000 classes 1000 times:    951 milliseconds

    5.) 3. + execute each of 1000 objects 1000 lines each: 4149 milliseconds


Testing environment
===================

  :Model Name:	MacBook Pro
  :Model Identifier:	MacBookPro10,2
  :Processor Name:	Intel Core i5
  :Processor Speed:	2,5 GHz
  :Number of Processors:	1
  :Total Number of Cores:	2
  :L2 Cache (per Core):	256 KB
  :L3 Cache:	3 MB
  :Memory:	8 GB
  :Storage: 251 GB Flash Storage
  :PHP5: PHP 5.6.21 (cli)
  :PHP7: PHP 7.0.6 (cli)
  :php.ini: Default configuration of Homebrew for the given version of PHP

Exexution
=========

::

  vendor/bin/phpunit --process-isolation PerformanceTests/ThousandClassesTest.php && cat Reports/Report.txt && rm Reports/Report.txt
  vendor/bin/phpunit --process-isolation PerformanceTests/MillionObjectsTest.php && cat Reports/Report.txt && rm Reports/Report.txt

