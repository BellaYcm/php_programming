<?php

/**
 * 单例模式
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/5
 * Time: 0:06
 */
class Logger
{
    private static $instance = null;

    public function __construct()
    {
    }

    static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    function log()
    {
        return "logging";
    }
}

print Logger::getInstance()->log();
