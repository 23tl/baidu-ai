<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-29
 * Time: 20:07
 */

namespace Strays\BaiDuAia\Kernel\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Strays\BaiDuAia\Kernel\Config;

class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * 将配置信息注入到容器中
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