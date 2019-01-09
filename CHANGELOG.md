# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.5.2 - 2019-01-09

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#168](https://github.com/zfcampus/zf-apigility-skeleton/pull/168) fixes file permissions of the `/var/www` folder when using Vagrant,
  setting them to the `www-data` user.

## 1.5.1 - 2018-08-15

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#165](https://github.com/zfcampus/zf-apigility-skeleton/pull/165) updates the `composer.lock` by running `composer install` using a
  PHP 5.6 release.  This was done as the 1.5.0 release was made using a PHP 7.1+
  binary, and thus installed versions of dependencies that were compatible with
  those release - but not with 5.6.  Once a release is made with this patch,
  users on PHP 5.6 will be able to install the skeleton again.
  
  However, this means that PHP 7.1+ users will need to execute the following
  after an initial skeleton install in order to get newer versions of libraries
  compatible with 7.1:
  
  ```bash
  $ rm -Rf composer.lock vendor
  $ composer install
  ```

## 1.5.0 - 2018-05-08

### Added

- [#159](https://github.com/zfcampus/zf-apigility-skeleton/pull/159) adds a development requirement on zendframework/zend-test, ensuring users
  have the ability to run existing unit tests, as well as write and execute new ones out of the box.

### Changed

- [#164](https://github.com/zfcampus/zf-apigility-skeleton/pull/164) updates all dependencies to versions that will work with PHP 7.2, where possible.

- [#154](https://github.com/zfcampus/zf-apigility-skeleton/pull/154) modifies the `config/autoload/.gitignore` rules to omit `*.local-development.php` files.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.
