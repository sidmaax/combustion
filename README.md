Combustion
=========
###### Version : v0.1

Combustion is a light weight PHP framework.

  - It's light weight and has very small footprint
  - It uses composer for dependency management
  - Easily extendible

Installation
--------------

You will need composer to install combustion

```sh
git clone http://github.com/Xk0nSid/combustion.git
cd combustion
composer install
```

Usage
------
Create a new file in `app/controllers/DemoController.php` and put the following code in that file.
```php
<?php

class DemoController {
    public function index() {
        echo "Hi I'm a demo controller";
    }
}
```
Now goto your browser `<host>/demo/index` .

### License

The Combustion framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
