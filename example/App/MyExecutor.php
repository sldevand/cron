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
