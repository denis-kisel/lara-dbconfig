# DBConfig

Storage extra configs in DB. Uses `serialization`.

## Demo/Usage
``` php
use DenisKisel\DBConfig\DBConfig;
...

//PUT
DBConfig::put($key, $value); # Value is anyway type(string|array|object|etc..)

//GET
DBConfig::get($key) # null if not exists;
DBConfig::get($key, $default) # $default if not exists;

//Has
DBConfig::has($key) # (true|false);

//Forget
DBConfig::forget($key) # remove by key;
```

## Installation

Via Composer

``` bash
$ composer require denis-kisel/lara-dbconfig
```

Public config if you need to change table name.
``` bash
$ php artisan vendor:publish --provider="DenisKisel\DBConfig\DBConfigServiceProvider"
```

Install DB Table. By default is `settings` table.
``` bash
$ php artisan dbconfig:install
```

Its all. Enjoy to use!

## Extra Commands
```bash
//Show all configs
$ php artisan dbconfig:show

//Show config by key
$ php artisan dbconfig:show --key=conf_key
```

## License
This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)

## Contact
Developer: Denis Kisel
* Email: denis.kisel92@gmail.com
* Skype: live:denis.kisel92

