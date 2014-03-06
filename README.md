# UltraFacade

In the context of UltraFacade, a Facade is an object-oriented creational design
pattern to implement the concept of facades and deals with the problem of
creating objects without specifying the exact class of object that will be
created.

## A Concrete Implementation

The concrete implentation in this library,
`JeremyKendall\UltraFacade\SplIteratorFacade`, is an example of how to properly
use a Facade.  It creates SPL Iterators based on a type string passed in at
runtime. The type string is the name of the SPL Iterator with 'Iterator'
removed (less typing FTW).  The second optional argument is used to pass
required params the the iterator's constructor.

``` php
$iterator = new SplIteratorFacade::facade('RecursiveDirectory', array(__DIR__));
```

While this specific facade implementation is production ready and should be
used if you have a use case for it, the intent is simply to demonstrate how the
Facade should be used.

## Installation

Installation is handled via [Composer][1].

``` json
{
    "require": {
        "jeremykendall/ultra-facade": "1.*"
    }
}
```
Please check the [UltraFacade page][2] at Packagist for the latest version.

[1]: http://getcomposer.org
[2]: https://packagist.org/packages/jeremykendall/ultra-facade
