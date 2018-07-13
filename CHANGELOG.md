# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

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
