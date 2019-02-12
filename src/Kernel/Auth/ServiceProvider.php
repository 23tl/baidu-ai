<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-30
 * Time: 19:59
 */

namespace Strays\BaiDuAia\Kernel\Auth;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        !isset($pimple['access_token']) && $pimple['access_token'] = function ($app) {
            return new Client($app);
        };
    }
}