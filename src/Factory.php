<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi;

use Strays\BaiDuAi\Kernel\Support\Str;

class Factory
{
    /**
     * @param $name
     * @param array $config
     *
     * @return mixed
     */
    public static function make($name, array $config)
    {
        $namespace = Str::studly($name);

        $application = "\\Strays\\BaiDuAi\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
