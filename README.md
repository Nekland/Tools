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

### StringTools class

**Encoding arguments are optionals.**

#### ::camelize

```php
StringTools::camelize($str, $from) : string
```

* `$str` string input
* `$from` (optional, default "\_") string entry format (can be "-" or "\_")

#### ::startsWith

```php
StringTools::startsWith($str, $start) : bool
```

* `$str` string input
* `$start` string it should starts with

#### ::endsWith

```php
StringTools::endsWith($str, $end, $encoding) : bool
```

* `$str` string input
* `$end` string it should ends with

#### ::removeStart

```php
StringTools::removeStart($str, $toRemove, $encoding) : string
```

* `$str` string input
* `$toRemove` string to remove at the start of `$str`

#### ::contains

```php
StringTools::contains($str, $needle, $encoding) : bool
```

* `$str` string input
* `$needle` potentially contained string

### EqualableInterface

Helps you equals on objects on a similar way as [java](http://stackoverflow.com/questions/1643067/whats-the-difference-between-equals-and).

#### equals

Method that you must implements to check if the object taking as parameter is equals or not.
