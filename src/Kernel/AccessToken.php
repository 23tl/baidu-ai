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
use Strays\BaiDuAia\Kernel\Contracts\AccessTokenInterface;
use Strays\BaiDuAia\Kernel\Traits\HttpRequests;
use Strays\BaiDuAia\Kernel\Traits\InteractsWithCache;

class AccessToken implements AccessTokenInterface
{
    use InteractsWithCache, HttpRequests;

    protected $app;

    protected $accessToken;

    protected $requestUrl = 'https://aip.baidubce.com/oauth/2.0/token';

    protected $cacheKey = 'BaiDuAia.kernel.access_token';

    protected static $status = false;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function getToken()
    {
        if ($this->accessToken) {
            return $this->accessToken;
        }

        $cache = $this->getCache();
        if (!self::$status && $cache->has($this->cacheKey)) {
            return $cache->get($this->cacheKey);
        }

        $token = $this->requestToken($this->getDefaultConfig());

        $this->setAccessToken($token);

        return $this->accessToken;
    }

    public function requestToken(array $config)
    {
        $response = $this->sendRequest($config);

        $body = json_decode($response->getBody()->getContents());

        return $body;
    }

    protected function setAccessToken($token)
    {
        $cache = [
            'access_token' => $token->access_token,
        ];

        $this->getCache()->set($this->cacheKey, $cache, $token->expires_in);

        return $this->accessToken = $cache;
    }

    public function applyToRequest()
    {
        $token = $this->getToken();

        return $token;
    }

    public function sendRequest(array $config)
    {
        $baseUrl = $this->requestUrl.'?'.http_build_query($config);

        return $this->setHttpClient($this->app['http_client'])->request($baseUrl, 'POST', []);
    }

    protected function getDefaultConfig()
    {
        return [
            'grant_type' => 'client_credentials',
            'client_id' => $this->app['config']->get('client_id'),
            'client_secret' => $this->app['config']->get('client_secret'),
        ];
    }
}
