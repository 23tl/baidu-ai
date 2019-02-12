<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 23:08
 */

namespace Strays\BaiDuAia\Language\Topic;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['topic'] = function ($app) {
            return new Client($app);
        };
    }
}