Nekland Tools
=============

[![Build Status](https://travis-ci.org/Nekland/Tools.svg?branch=master)](https://travis-ci.org/Nekland/Tools)

Just some classes helping to code with PHP in general.

**This repository follows semver.**

Installation
------------

```bash
composer require "nekland/tools"
```

Reference
---------

This library provide some tools to help you with your developments.

Here is the list of tools it provides:
- [StringTools](#stringtools-class)
- [ArrayTools](#arraytools-class)
- [EqualableInterface](#equalableinterface)
- [DateTimeComparator](#datetimecomparator-class)

### StringTools class

**Encoding arguments are optionals.**

#### ::camelize

```php
StringTools::camelize($str, $from, $encoding) : string
```

* `$str` string input
* `$from` (optional, default "\_") input string format (can be "-" or "\_")
* `$encoding` (optional, default "UTF-8") encoding of your input string

#### ::startsWith

Say if the given string starts with needle or not.

```php
StringTools::startsWith($str, $start) : bool
```

* `$str` string input
* `$start` string it should starts with

#### ::endsWith

Say if the given string ends with needle or not.

```php
StringTools::endsWith($str, $end) : bool
```

* `$str` string input
* `$end` string it should ends with

#### ::removeStart

Removes the start of the string if it matches with the given one.

```php
StringTools::removeStart($str, $toRemove) : string
```

* `$str` string input
* `$toRemove` string to remove at the start of `$str`

#### ::contains

```php
StringTools::contains($str, $needle) : bool
```

* `$str` string input
* `$needle` potentially contained string

#### ::mb_ucfirst

Adds missing multi-byte PHP function for `ucfirst` standard function.

```
StringTools::mb_ucfirst($str, $encoding) : string
```

* `$str` string input
* `$encoding` (optional, default "UTF-8") encoding of your input string

### ArrayTools class

#### ::removeValue

```php
ArrayTools::removeValue($array, $value) : void
```

* `$array` input array passed by reference
* `$value` The value to remove from the $array

### EqualableInterface

Helps you equals on objects on a similar way as [java](http://stackoverflow.com/questions/1643067/whats-the-difference-between-equals-and).

#### equals

Method that you must implements to check if the object taking as parameter is equals or not.

### DateTimeComparator class

#### ::greatest

Compare two \DateTimeInterface and return the greatest
_If one of given \DateTimeInterface parameters is null, return is the other one \DateTimeInterface_
_If both \DateTimeInterface parameters are null, return is null_

```php
DateTimeComparator::greatest($dateTime1, $dateTime2) : ?\DateTimeInterface
```

* `$dateTime1` The first \DateTimeInterface or null
* `$dateTime2` The second \DateTimeInterface or null

#### ::lowest

Compare two \DateTimeInterface and return the lowest
_If one of given \DateTimeInterface parameters is null, return is the other one \DateTimeInterface_
_If both \DateTimeInterface parameters are null, return is null_

```php
DateTimeComparator::lowest($dateTime1, $dateTime2) : ?\DateTimeInterface
```

* `$dateTime1` The first \DateTimeInterface or null
* `$dateTime2` The second \DateTimeInterface or null