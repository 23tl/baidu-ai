<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-29
 * Time: 19:38
 */

namespace Strays\BaiDuAia\Language;

use Strays\BaiDuAia\Kernel\ServiceContainer;

class Application extends ServiceContainer
{
    protected $providers = [
        Lexer\ServiceProvider::class,
        Depparser\ServiceProvider::class,
        WordEmbedding\ServiceProvider::class,
        Dnnlm\ServiceProvider::class,
        WordSimEmbedding\ServiceProvider::class,
        Simnet\ServiceProvider::class,
        Comment\ServiceProvider::class,
        SentimentClassify\ServiceProvider::class,
        Keyword\ServiceProvider::class,
        Topic\ServiceProvider::class,

        // 认证
        \Strays\BaiDuAia\Kernel\Auth\ServiceProvider::class,
    ];
}