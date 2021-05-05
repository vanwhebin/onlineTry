<?php
/**
 * Description:
 * file name: BaseService.php
 * author: vanwhebin
 * create time: 2021-05-02
 */

namespace App\Http\Services;


class BaseService
{
    protected static $instance = null;

    public static function getInstance()
    {
        if ((static::$instance[static::class] ?? null) instanceof static) {
            return static::$instance[static::class];
        }
        return static::$instance[static::class] = new static();
    }

    public function __clone()
    {
    }

    public function __call($name, $arguments)
    {
    }


}