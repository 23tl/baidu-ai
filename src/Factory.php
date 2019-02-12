<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
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
