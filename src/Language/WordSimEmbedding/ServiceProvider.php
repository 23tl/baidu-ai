<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:43
 */

namespace Strays\BaiDuAia\Language\WordSimEmbedding;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['wordSimEmbedding'] = function ($app) {
            return new Client($app);
        };
    }
}