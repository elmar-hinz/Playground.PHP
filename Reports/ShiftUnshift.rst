
===================================
Unshift is Getting Worse with PHP 7
===================================

PHP 5
=====

::

     1000 times with array of length    100
    =======================================
           []= /pop:      0.25 milliseconds
           push/pop:      0.47 milliseconds
        unshift/pop:      0.76 milliseconds
      unshift/shift:      0.98 milliseconds

     1000 times with array of length   1000
    =======================================
           []= /pop:      0.34 milliseconds
           push/pop:      0.53 milliseconds
        unshift/pop:      6.19 milliseconds
      unshift/shift:     13.03 milliseconds

     1000 times with array of length  10000
    =======================================
           []= /pop:      2.54 milliseconds
           push/pop:      1.51 milliseconds
        unshift/pop:     78.65 milliseconds
      unshift/shift:    156.35 milliseconds

     1000 times with array of length 100000
    =======================================
           []= /pop:     14.03 milliseconds
           push/pop:     15.31 milliseconds
        unshift/pop:   1340.53 milliseconds
      unshift/shift:   2677.00 milliseconds


PHP 7
=====

::

     1000 times with array of length    100
    =======================================
           []= /pop:      0.15 milliseconds
           push/pop:      0.27 milliseconds
        unshift/pop:      1.29 milliseconds
      unshift/shift:      1.57 milliseconds

     1000 times with array of length   1000
    =======================================
           []= /pop:      0.12 milliseconds
           push/pop:      0.22 milliseconds
        unshift/pop:     12.48 milliseconds
      unshift/shift:     14.00 milliseconds

     1000 times with array of length  10000
    =======================================
           []= /pop:      0.28 milliseconds
           push/pop:      0.43 milliseconds
        unshift/pop:    109.61 milliseconds
      unshift/shift:    138.84 milliseconds

     1000 times with array of length 100000
    =======================================
           []= /pop:      2.28 milliseconds
           push/pop:      2.64 milliseconds
        unshift/pop:   2859.93 milliseconds
      unshift/shift:   3375.90 milliseconds


