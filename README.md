# Cron
Manage your php application cron jobs

## Dependencies
This library depends on :  
- [dragonmantank/cron-expression](https://packagist.org/packages/dragonmantank/cron-expression)  : CRON for PHP: Calculate the next or previous run date and determine if a CRON expression is due

## Install

In your composer.json, add :

```json
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:sldevand/cron.git"
        }
    ],
    "require": {
        "sldevand/cron": "^1.0"
    }
```
Install command
```bash
composer install
```

## Usage

### Example

#### MyExecutor.php
```php
<?php

namespace App;

use Sldevand\Cron\ExecutorInterface;

/**
 * Class MyExecutor
 * @package App
 */
class MyExecutor implements ExecutorInterface
{
    public function execute()
    {
        echo "Hello world" . PHP_EOL;
        echo "Executing amazing things ..." . PHP_EOL;
        echo "Done!" . PHP_EOL;
    }

    /**
     * return string
     */
    public function getDescription()
    {
        return "Hello world executor";
    }
}

```

Then add the class name in the cron tab array in your cron.php file

#### cron.php
```php
<?php

include __DIR__ . '/../vendor/autoload.php';

$crontab = [
    'hello_world' => [
        'expression' => '55 12 * * *',
        'executor' => '\App\MyExecutor'
    ]
];

$launcher = new \Sldevand\Cron\Launcher($crontab);
$launcher->launch();


```

### Cronjobs
You can add as many cronjobs you want, you just have to add a new item to $crontab array.

A cronjob is an array item as follow:
```php
'key' => [
    'expression' => '* * * * *',
    'executor'   => '\Vendor\Namespace\ClassName'
]
```

If you don't know how cron expressions work, you can go to [crontab.guru](https://crontab.guru)

You can have an implementation [example](./example) in this repository

### Launch
You can test this file with this command (change the time of cron expression to now)
```bash
php -f cron.php
```

### Add the script to the crontab of your system
In a terminal, type
```bash
crontab -e
```

This will open your favorite text editor, then add this line
```text
* * * * * php -f /path/to/your/cron.php
```

Save and exit the crontab, a message tells you that a new crontab was installed.

### Author
- Sebastien Lorrain
