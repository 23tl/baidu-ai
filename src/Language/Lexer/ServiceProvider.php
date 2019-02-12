<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-30
 * Time: 15:11
 */

namespace Strays\BaiDuAia\Language\Lexer;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['lexer'] = function ($app) {
            return new Client($app);
        };
    }
}