Combustion
=========
###### Version : v0.3

Combustion is a light weight PHP framework.

  - It's light weight and has very small footprint
  - It uses composer for dependency management
  - Easily extendible

Installation
--------------

> You will need composer to install combustion

```sh
git clone http://github.com/Xk0nSid/combustion.git -b dev
cd combustion
composer install
```
Now goto `http://<your_domain>`
You will see a simple home view. You can check how this view is generated
by going to file `app/controllers/HomeController.php`

Getting Started
------
First let's register a route. Edit `app/routes.php` . Add the following to it.
```php
Route::get('/demo', 'Demo@index');
```

Now create a new file in `app/controllers/DemoController.php` and put the following code in that file.
```php
<?php

class DemoController {
    public function index() {
        echo "Hi I'm a demo controller";
    }
}
```

> You will need a virtual host setup to do this

Now goto your browser `http://<your_domain>/demo` .

### License

The Combustion framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
