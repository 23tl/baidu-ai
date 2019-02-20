<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Review;

use Strays\BaiDuAi\Kernel\ServiceContainer;

class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Text\ServiceProvider::class,
        Image\ServiceProvider::class,

        // 认证
        \Strays\BaiDuAi\Kernel\Auth\ServiceProvider::class,
    ];
}
