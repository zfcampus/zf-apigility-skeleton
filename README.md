Apigility Skeleton Application
==============================

Installation
------------

```bash
    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev --repository-url="https://packages.zendframework.com/" zfcampus/zf-apigility-skeleton path/to/install
    cd path/to/install
    php public/index.php development enable # put the skeleton in development mode
    mkdir -p data/db/
    cp vendor/zfcampus/zf-apigility-example/data/status.db data/db/ # copy the example API database
```

Now, fire it up! Do one of the following:

- Create a vhost in your web server that points to the `public/` directory of
  the project
- Fire up the built-in web server in PHP (5.4+) (**note**: do not use this for
  production!)

In the latter case, do the following:

```bash
    cd path/to/install
    php -S 0.0.0.0:8080 -t public/ public/index.php
```

You can then visit the site at http://localhost:8080/ - which will bring up a
welcome page and the ability to visit the dashboard in order to create and
inspect your APIs.
