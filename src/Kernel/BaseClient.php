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

    protected $app;

    protected $accessToken;

    protected static $defaults = [
        'charset' => 'UTF-8',
    ];

    public function __construct(ServiceContainer $app, AccessTokenInterface $accessToken = null)
    {
        $this->app = $app;

        $this->accessToken = $accessToken ?? $this->app['access_token'];
    }

    public function postClient(string $url, array $body)
    {
    }

    public function httpPostJson(string $url, array $data = [], array $query = [])
    {
        return $this->request($this->getBaseUrl($url), 'POST', ['query' => $query, 'json' => $data]);
    }

    public function httpPostFrom(string $url, array $data = [], array $query = [])
    {
        return $this->request($this->getBaseUrl($url), 'POST', ['query' => $query, 'from' => $data]);
    }

    protected function request(string $url, string $method, array $body = [], array $options = [])
    {
        if (!$this->accessToken) {
            $this->getAccessToken();
        }

        $response = $this->performRequest($url, $method, $body, $options);

        return $response->getBody()->getContents();
    }

    protected function getAccessToken()
    {
        return $this->accessToken->applyToRequest();
    }

    protected function getBaseUrl(string $url)
    {
        return $url.'?'.http_build_query(array_merge(self::$defaults, $this->getAccessToken()));
    }
}
