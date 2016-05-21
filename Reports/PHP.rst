A billion objects test
======================

PHP5
----

::

    1.000.000 times $objects[] = new A():                      332.08 milliseconds
    1.000.000 times $objects[] = new B() extends A:            336.15 milliseconds
    1.000.000 times $objects[] = new C() with constructor:     480.02 milliseconds
    1.000.000 times $objects[] = new V() with variable:        382.93 milliseconds
    1.000.000 times $objects[] = new I(i++) uniqe identity:    683.41 milliseconds
    1.000.000 times array_push($objects, new A()):            3294.01 milliseconds

PHP7
----

::

    1.000.000 times $objects[] = new A():                      136.29 milliseconds
    1.000.000 times $objects[] = new B() extends A:            129.66 milliseconds
    1.000.000 times $objects[] = new C() with constructor:     204.74 milliseconds
    1.000.000 times $objects[] = new V() with variable:        139.93 milliseconds
    1.000.000 times $objects[] = new I(i++) uniqe identity:    238.19 milliseconds
    1.000.000 times array_push($objects, new A()):             239.61 milliseconds

A thousand classes test
=======================

PHP5
----

::


    1.) Read (by file()):                                   135.77 milliseconds

    2.) 1 + parse (by require_once()):                      710.76 milliseconds

    3.) 2 + initialise each of 1000 classes one time:       784.40 milliseconds

    4.) 2 + initialise each of 1000 classes 1000 times:    1661.83 milliseconds

    5.) 3. + execute each of 1000 objects 1000 lines each: 5422.88 milliseconds


PHP7
----

::

    1.) Read (by file()):                                    69.05 milliseconds

    2.) 1 + parse (by require_once()):                      570.47 milliseconds

    3.) 2 + initialise each of 1000 classes one time:       579.80 milliseconds

    4.) 2 + initialise each of 1000 classes 1000 times:     962.78 milliseconds

    5.) 3. + execute each of 1000 objects 1000 lines each: 4041.35 milliseconds


