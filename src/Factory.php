<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-29
 * Time: 19:25
 */

namespace Strays\BaiDuAia;

use Strays\BaiDuAia\Kernel\Support\Str;

class Factory
{
    public static function make($name, array $config)
    {
        $namespace = Str::studly($name);

        $application = "\\Strays\\BaiDuAia\\{$namespace}\\Application";

        return new $application($config);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}