<?php

include __DIR__ . '/../vendor/autoload.php';

$crontab = [
    'hello_world' => [
        'expression' => '* * * * *',
        'executor' => '\App\MyExecutor'
    ]
];

$launcher = new \Sldevand\Cron\Launcher($crontab);
$launcher->launch();
