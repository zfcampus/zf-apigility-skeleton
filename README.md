Apigility Skeleton Application
==============================

Installation
------------

Install [Composer](http://http://getcomposer.org/)
```
curl -s https://getcomposer.org/installer | php --
```
Use Composer to create a new project
```
php composer.phar create-project -sdev --repository-url="https://packages.zendframework.com/" zfcampus/zf-apigility-skeleton path/to/install
```
Put the skeleton in development mode
```
cd path/to/install
php public/index.php development enable
```
Copy the example API database
```
mkdir -p data/db/
cp vendor/zfcampus/zf-apigility-example/data/status.db data/db/
```

Now, fire it up! Do one of the following:

- Create a vhost in your web server that points to the `public/` directory of
  the project
- Fire up the built-in web server in PHP (5.4+) (**note**: do not use this for
  production!)

In the latter case, do the following:

```
cd path/to/install
php -S 0.0.0.0:8080 -t public/ public/index.php
```

You can then visit the site at http://localhost:8080/ - which will bring up a
welcome page and the ability to visit the dashboard in order to create and
inspect your APIs.
