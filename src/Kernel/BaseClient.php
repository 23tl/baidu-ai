<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-30
 * Time: 14:23
 */

namespace Strays\BaiDuAia\Kernel;

use Strays\BaiDuAia\Kernel\Contracts\AccessTokenInterface;
use Strays\BaiDuAia\Kernel\Traits\HttpRequests;

class BaseClient
{
    use HttpRequests { request as performRequest; }

    protected $app;

    protected $accessToken;

    protected static $defaults = [
        'charset' => 'UTF-8',
    ];

    public function __construct(ServiceContainer $app, AccessTokenInterface $accessToken= null)
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