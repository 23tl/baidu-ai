<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:23
 */

namespace Strays\BaiDuAia\Language\Dnnlm;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['dnnlm'] = function ($app) {
            return new Client($app);
        };
    }
}