<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:50
 */

namespace Strays\BaiDuAia\Language\Simnet;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['simnet'] = function ($app) {
            return new Client($app);
        };
    }
}