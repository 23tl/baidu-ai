<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-29
 * Time: 22:54
 */

namespace Strays\BaiDuAia\Kernel\Providers;


use GuzzleHttp\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class HttpClientServiceProvider implements ServiceProviderInterface
{
    /**
     * 注册响应到容器
     *
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['http_client'] = function ($app) {
            return new Client($app['config']->get('http', []));
        };
    }
}