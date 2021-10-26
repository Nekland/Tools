Nekland Tools
=============

[![Build Status](https://travis-ci.org/Nekland/Tools.svg?branch=master)](https://travis-ci.org/Nekland/Tools)

Just some classes helping to code with PHP in general. No dependencies. High quality code.

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
- [TemporaryFile](#temporary-file-management)
- [TemporaryDirectory](#temporary-directory-management)

### StringTools class

**Encoding arguments are optionals.**

#### ::camelize

```php
StringTools::camelize($str, $from, $encoding, $normalize = true) : string
```

* `$str` string input
* `$from` (optional, default "\_") input string format (can be "-" or "\_")
* `$encoding` (optional, default "UTF-8") encoding of your input string
* `$normalize` decide either you want to normalize (remove special characters) or not, that's what you want in most cases when camelizing

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

#### ::removeEnd

Removes the end of the string if it matches with the given text to remove.

```php
StringTools::removeEnd($str, $toRemove) : string
```

* `$str` string input
* `$toRemove` string to remove at the end of `$str`

#### ::contains

```php
StringTools::contains($str, $needle) : bool
```

* `$str` string input
* `$needle` potentially contained string

#### ::mb_ucfirst

Adds missing multi-byte PHP function for `ucfirst` standard function.

```php
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

For following methods `lowest` and `greatest`, you can provide unlimited `DateTimeInterface` objects.
Please note that non DateTimeInterface objects will be ignored by functions.

#### ::greatest

Compare \DateTimeInterface from parameters and return the greatest

```php
DateTimeComparator::greatest($dateTime1, $dateTime2, $dateTime3, ...) : ?\DateTimeInterface
```

#### ::lowest

Compare \DateTimeInterface from parameters and return the lowest

```php
DateTimeComparator::lowest($dateTime1, $dateTime2, $dateTime3, ...) : ?\DateTimeInterface
```

### Temporary file management

The class `TemporaryFile` helps you to create temporary file with ease.

#### ::__construct()

```php
TemporaryFile::__construct(TemporaryDirectory $dir = null, string $prefix = '')
```

**Examples:**

```php
// Create a file in temporary folder
$file = new TemporaryFile();

// Create a file inside a temporary directory (see TemporaryDirectory class)
$file = new TemporaryFile($temporaryDir);

// Create a file in a temporary folder with php_ prefix.
$file = new TemporaryFile(null, 'php_');
```

#### ::setContent & ::getContent

```php
TemporaryFile::setContent(string $content)
TemporaryFile::getContent(): string
```

#### ::getPathname()

Returns the complete path to the file (ie: `/tmp/generated-folder/filename`)

```php
TemporaryFile::getPathname(): string
```

#### ::remove()

Removes the file from filesystem.

```php
TemporaryFile::remove()
```

### Temporary directory management

#### ::__construct()

```php
TemporaryDirectory::__construct(string $dir = null, string $prefix = 'phpgenerated')
```

**Examples:**

```php
// create a new directory
$directory = new TemporaryDirectory();
```

#### ::getTemporaryFile()

Create a `TemporaryFile` from the directory generated.

```php
TemporaryDirectory::getTemporaryFile(): TemporaryFile
```

#### ::remove()

Removes the directory.

```php
TemporaryDirectory::remove(bool $force = false): void
```

_If `force` is specified to true, it will remove the directory even if it has files inside._

#### ::getPathname()

Returns the complete path to the folder (ie: `/tmp/folder-name`)

```php
TemporaryDirectory::getPathname(): string
```
