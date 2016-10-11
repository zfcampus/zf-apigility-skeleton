Apigility Skeleton Application
==============================

Requirements
------------

Please see the [composer.json](composer.json) file.

Installation
------------

### Via release tarball

Grab the latest release via the [Apigility website](http://apigility.org/)
and/or the [releases page](https://github.com/zfcampus/zf-apigility-skeleton/releases); each release
has distribution tarballs and zipballs available.

Untar it:

```bash
$ tar xzf zf-apigility-skeleton-{version}.tgz
```

(Where `{version}` is the version you downloaded.)

Or unzip, if you chose the zipball:

```bash
$ unzip zf-apigility-skeleton-{version}.zip
```

(Where `{version}` is the version you downloaded.)

### Via Composer (create-project)

You can use the `create-project` command from [Composer](http://getcomposer.org/)
to create the project in one go (you need to install [composer](https://getcomposer.org/doc/00-intro.md#downloading-the-composer-executable)):

```bash
$ curl -s https://getcomposer.org/installer | php -- --filename=composer
$ composer create-project -sdev zfcampus/zf-apigility-skeleton path/to/install
```

### Via Git (clone)

First, clone the repository:

```bash
# git clone https://github.com/zfcampus/zf-apigility-skeleton.git # optionally, specify the directory in which to clone
$ cd path/to/install
```

At this point, you need to use [Composer](https://getcomposer.org/) to install
dependencies. Assuming you already have Composer:

```bash
$ composer install
```

### All methods

Once you have the basic installation, you need to put it in development mode:

```bash
$ cd path/to/install
$ composer development-enable
```

Now, fire it up! Do one of the following:

- Create a vhost in your web server that points the DocumentRoot to the
  `public/` directory of the project
- Fire up the built-in web server in PHP(**note**: do not use this for
  production!)

In the latter case, do the following:

```bash
$ cd path/to/install
$ php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
# OR use the composer alias:
$ composer serve
```

You can then visit the site at http://localhost:8080/ - which will bring up a
welcome page and the ability to visit the dashboard in order to create and
inspect your APIs.

### NOTE ABOUT USING APACHE

Apache forbids the character sequences `%2F` and `%5C` in URI paths. However, the Apigility Admin
API uses these characters for a number of service endpoints. As such, if you wish to use the
Admin UI and/or Admin API with Apache, you will need to configure your Apache vhost/project to
allow encoded slashes:

```apacheconf
AllowEncodedSlashes On
```

This change will need to be made in your server's vhost file (it cannot be added to `.htaccess`).

### NOTE ABOUT OPCACHE

**Disable all opcode caches when running the admin!**

The admin cannot and will not run correctly when an opcode cache, such as APC or
OpCache, is enabled. Apigility does not use a database to store configuration;
instead, it uses PHP configuration files. Opcode caches will cache these files
on first load, leading to inconsistencies as you write to them, and will
typically lead to a state where the admin API and code become unusable.

The admin is a **development** tool, and intended for use a development
environment. As such, you should likely disable opcode caching, regardless.

When you are ready to deploy your API to **production**, however, you can
disable development mode, thus disabling the admin interface, and safely run an
opcode cache again. Doing so is recommended for production due to the tremendous
performance benefits opcode caches provide.

### NOTE ABOUT DISPLAY_ERRORS

The `display_errors` `php.ini` setting is useful in development to understand what warnings,
notices, and error conditions are affecting your application. However, they cause problems for APIs:
APIs are typically a specific serialization format, and error reporting is usually in either plain
text, or, with extensions like XDebug, in HTML. This breaks the response payload, making it unusable
by clients.

For this reason, we recommend disabling `display_errors` when using the Apigility admin interface.
This can be done using the `-ddisplay_errors=0` flag when using the built-in PHP web server, or you
can set it in your virtual host or server definition. If you disable it, make sure you have
reasonable error log settings in place. For the built-in PHP web server, errors will be reported in
the console itself; otherwise, ensure you have an error log file specified in your configuration.

`display_errors` should *never* be enabled in production, regardless.

### Vagrant

If you prefer to develop with Vagrant, there is a basic vagrant recipe included with this project.

This recipe assumes that you already have Vagrant installed. The virtual machine will try to use localhost:8080 by
default, so if you already have a server on this port of your host machine, you need to shut down the conflicting
server first, or if you know how, you can reconfigure the ports in Vagrantfile.

Assuming you have Vagrant installed and assuming you have no port conflicts, you can bring up the Vagrant machine
with the standard `up` command:

```bash
$ vagrant up
```

When the machine comes up, you can ssh to it with the standard ssh forward agent:

```bash
$ vagrant ssh
```

The web root is inside the shared directory, which is at `/var/www`; this is
also the home directory for the vagrant issue, which will be the initial
directory you land in once you connect via SSH.

The image installs composer during provisioning, meaning you can use it to
install and update dependencies:

```bash
# Install dependencies:
$ vagrant ssh -c 'composer install'
# Update dependencies:
$ vagrant ssh -c 'composer update'
```

You can also manipulate development mode:

```bash
$ vagrant ssh -c 'composer development-enable'
$ vagrant ssh -c 'composer development-disable'
$ vagrant ssh -c 'composer development-status'
```

> #### Vagrant and VirtualBox
>
> The vagrant image is based on `bento/ubuntu-16.04`. If you are using VirtualBox as
> a provider, you will need:
>
> - Vagrant 1.8.5 or later
> - VirtualBox 5.0.26 or later

For vagrant documentation, please refer to [vagrantup.com](https://www.vagrantup.com/)

### Docker

If you develop or deploy using Docker, we provide configuration for you.

Prepare your development environment using [docker compose](https://docs.docker.com/compose/install/):

```bash
$ git clone https://github.com/zfcampus/zf-apigility-skeleton
$ cd zf-apigility-skeleton
$ docker-compose build
# Install dependencies via composer, if you haven't already:
$ docker-compose run apigility composer install
# Enable development mode:
$ docker-compose run apigility composer development-enable
```

Start the container:

```bash
$ docker-compose up
```

Access Apigility from `http://localhost:8080/` or `http://<boot2docker ip>:8080/` if on Windows or Mac.

You may also use the provided `Dockerfile` directly if desired.

Once installed, you can use the container to update dependencies:

```bash
$ docker-compose run apigility composer update
```

Or to manipulate development mode:

```bash
$ docker-compose run apigility composer development-enable
$ docker-compose run apigility composer development-disable
$ docker-compose run apigility composer development-status
```

QA Tools
--------

The skeleton does not come with any QA tooling by default, but does ship with
configuration for each of:

- [phpcs](https://github.com/squizlabs/php_codesniffer)
- [phpunit](https://phpunit.de)

Additionally, it comes with some basic tests for the shipped
`Application\Controller\IndexController`.

If you want to add these QA tools, execute the following:

```bash
$ composer require --dev phpunit/phpunit squizlabs/php_codesniffer zendframework/zend-test
```

We provide aliases for each of these tools in the Composer configuration:

```bash
# Run CS checks:
$ composer cs-check
# Fix CS errors:
$ composer cs-fix
# Run PHPUnit tests:
$ composer test
```
