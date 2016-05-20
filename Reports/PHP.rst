A billion objects test
======================

PHP5
----

::

    1.000.000 times $objects[] = new A():                     326.168060
    1.000.000 times $objects[] = new B() extends A:           325.504065
    1.000.000 times $objects[] = new C() with constructor:    465.257883
    1.000.000 times $objects[] = new V() with variable:       366.883039
    1.000.000 times $objects[] = new I(i++) uniqe identity:   670.026064
    1.000.000 times array_push($objects, new A()):            3143.904924

PHP7
----

::

    1.000.000 times $objects[] = new A():                     136.203051
    1.000.000 times $objects[] = new B() extends A:           127.069950
    1.000.000 times $objects[] = new C() with constructor:    197.970152
    1.000.000 times $objects[] = new V() with variable:       136.150837
    1.000.000 times $objects[] = new I(i++) uniqe identity:   233.019829
    1.000.000 times array_push($objects, new A()):            208.152056

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


