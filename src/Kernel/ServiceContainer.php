<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-29
 * Time: 19:55
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
     * 返回配置信息
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
     * 将核心服务注入劲容器
     *
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider)
        {
            parent::register(new $provider());
        }
    }

    /**
     * 将服务合并成一个数组
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