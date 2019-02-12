<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 23:00
 */

namespace Strays\BaiDuAia\Language\SentimentClassify;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['sentimentClassify'] = function ($app) {
            return new Client($app);
        };
    }
}