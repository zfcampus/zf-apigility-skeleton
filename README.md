Apigility Skeleton Application
==============================

Installation
------------

### Via release tarball

Grab the latest release via the [Apigility website](http://apigility.org/)
and/or the [releases page](https://github.com/zfcampus/zf-apigility-skeleton/releases).
At the time of this writing, that URI is:

- https://github.com/zfcampus/zf-apigility-skeleton/releases/download/0.6.0/zf-apigility-skeleton.tgz

Untar it:

```bash
    tar xzf zf-apigility-skeleton.tgz
```

### Via Composer (create-project)

You can use the `create-project` command from [Composer](http://getcomposer.org/)
to create the project in one go:

```bash
    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev zfcampus/zf-apigility-skeleton path/to/install
```

### Via Git (clone)

First, clone the repository:

```bash
    git clone https://github.com/zfcampus/zf-apigility-skeleton.git # optionally, specify the directory in which to clone
    cd path/to/install
```

At this point, you need to use [Composer](https://getcomposer.org/) to install
dependencies. Assuming you already have Composer:

```bash
    composer.phar install
```

### All methods

Once you have the basic installation, you need to put it in development mode:

```bash
    cd path/to/install
    php public/index.php development enable # put the skeleton in development mode
```

Now, fire it up! Do one of the following:

- Create a vhost in your web server that points the DocumentRoot to the
  `public/` directory of the project
- Fire up the built-in web server in PHP (5.4.8+) (**note**: do not use this for
  production!)

In the latter case, do the following:

```bash
    cd path/to/install
    php -S 0:8080 -t public/ public/index.php
```

You can then visit the site at http://localhost:8080/ - which will bring up a
welcome page and the ability to visit the dashboard in order to create and
inspect your APIs.

### NOTE ABOUT USING PHP BUILT-IN WEB SERVER

PHP's built-in web server did not start supporting the `PATCH` HTTP method until
5.4.8. Since the admin API makes use of this HTTP method, you must use a version
&gt;= 5.4.8 when using the built-in web server.
