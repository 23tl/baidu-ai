<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:33
 */

namespace Strays\BaiDuAia\Language\WordEmbedding;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['wordEmbedding'] = function ($app) {
            return new Client($app);
        };
    }
}