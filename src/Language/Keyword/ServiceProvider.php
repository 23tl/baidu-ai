<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 23:04
 */

namespace Strays\BaiDuAia\Language\Keyword;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['keyword'] = function ($app) {
            return new Client($app);
        };
    }
}