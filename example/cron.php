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
