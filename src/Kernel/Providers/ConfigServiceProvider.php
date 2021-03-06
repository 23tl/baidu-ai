<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Kernel\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Strays\BaiDuAi\Kernel\Config;

class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * 将配置信息注入到容器中.
     *
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['config'] = function ($app) {
            return new Config($app->getConfig());
        };
    }
}
