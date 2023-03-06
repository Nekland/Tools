# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.6.2] - 2022-03-06

## Added

- Completed support for PHP 8.2 (deprecation notice removal)

## Misc

- Code cleaning

## [2.6.1] - 2021-08-25
### Fix
- Fix constructor of TemporaryDir in the case the directory already exists
- Better error management while getting content of TemporaryFile

## [2.6.0] - 2020-12-17
### Added
- Ability to normalize or not the camelize text
- Support for PHP 8.x

### Changed
- The camelize method normalize by default. It makes a lot of sense, but the old behavior changed, and it may break in some cases

# Removed
- Support for PHP 5.x

## [2.5.1] - 2019-09-22
### Changed
- Camelize method now allow larger usages (thanks to removal of an exception)

## [2.5.0] - 2019-02-19
### Changed
- Update the DateTimeComparator functions to handle N parameters

## [2.4.0] - 2019-01-07
### Added
- New Temporary file (and directory) features

## [2.3.0] - 2018-12-18
### Added
- New feature `StringTools::removeEnd`

## [2.2.0] - 2018-07-13
### Added
- New `ArrayTools` class helper
- `ArrayTools::removeValue` method to remove a value from given array

## [2.1.0] - 2018-04-23
### Added
- New `DateTimeComparator` class helper

## [2.0.0] - 2017-08-01

### Added
- New method `mb_ucfirst`.

### Changed
- Sources are now located inside `src` folder.
- [Minor BC Break] many parameters `encoding` are suppressed because processing is faster without and they are not
  mandatory. _This change doesn't break your code but may in the future if we add new parameters._

### Fixed
- Unicode usage for `camelize` method.

## [1.0.0] - 2016-11-3

### Added

- StringTools class.
- EqualableInterface interface.
