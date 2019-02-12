<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAia\Kernel;

use Pimple\Container;
use Strays\BaiDuAia\Kernel\Providers\ConfigServiceProvider;
use Strays\BaiDuAia\Kernel\Providers\HttpClientServiceProvider;

class ServiceContainer extends Container
{
    protected $providers = [];

    protected $config = [];

    protected $defaultConfig = [];

    public function __construct(array $config = [], $prepends = [])
    {
        $this->registerProviders($this->getProviders());

        parent::__construct($prepends);

        $this->config = $config;
    }

    /**
     * 返回配置信息.
     *
     * @return array
     */
    public function getConfig()
    {
        $base = [
            'http' => [
                'timeout' => 5,
                'base_uri' => 'https://aip.baidubce.com',
            ],
        ];

        return array_replace_recursive($base, $this->defaultConfig, $this->config);
    }

    /**
     * 将核心服务注入劲容器.
     *
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }

    /**
     * 将服务合并成一个数组.
     *
     * @return array
     */
    public function getProviders()
    {
        return array_merge([
            ConfigServiceProvider::class,
            HttpClientServiceProvider::class,
        ], $this->providers);
    }

    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }
}
