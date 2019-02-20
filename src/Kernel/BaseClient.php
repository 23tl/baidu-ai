<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Kernel;

use Strays\BaiDuAi\Kernel\Contracts\AccessTokenInterface;
use Strays\BaiDuAi\Kernel\Traits\HttpRequests;

class BaseClient
{
    use HttpRequests { request as performRequest; }

    /**
     * @var ServiceContainer
     */
    protected $app;

    /**
     * @var mixed|AccessTokenInterface
     */
    protected $accessToken;

    /**
     * @var array
     */
    protected static $defaults = [
        'charset' => 'UTF-8',
    ];

    /**
     * BaseClient constructor.
     * @param ServiceContainer $app
     * @param AccessTokenInterface|null $accessToken
     */
    public function __construct(ServiceContainer $app, AccessTokenInterface $accessToken = null)
    {
        $this->app = $app;

        $this->accessToken = $accessToken ?? $this->app['access_token'];
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $query
     * @return string
     */
    public function httpPostJson(string $url, array $data = [], array $query = [])
    {
        return $this->request($this->getBaseUrl($url), 'POST', ['query' => $query, 'json' => $data]);
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $query
     * @return string
     */
    public function httpPostFrom(string $url, array $data = [], array $query = [])
    {
        return $this->request($this->getBaseUrl($url), 'POST', ['query' => $query, 'from' => $data]);
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $options
     * @return string
     */
    protected function request(string $url, string $method, array $options = [])
    {
        if (!$this->accessToken) {
            $this->getAccessToken();
        }

        $response = $this->performRequest($url, $method, $options);

        return $response->getBody()->getContents();
    }

    /**
     * @return mixed
     */
    protected function getAccessToken()
    {
        return $this->accessToken->applyToRequest();
    }

    /**
     * 组装根url
     * @param string $url
     * @return string
     */
    protected function getBaseUrl(string $url)
    {
        return $url.'?'.http_build_query(array_merge(self::$defaults, $this->getAccessToken()));
    }
}
