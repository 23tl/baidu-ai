<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:56
 */

namespace Strays\BaiDuAia\Language\Comment;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['comment'] = function ($app) {
            return new Client($app);
        };
    }
}