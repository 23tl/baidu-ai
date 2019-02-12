<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-29
 * Time: 21:28
 */

namespace Strays\BaiDuAia\Kernel\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

trait HttpRequests
{
    protected $httpClient;

    public function request($url, $method, array $options = [])
    {
        $options = $this->fixJsonIssue($options);

        $response = $this->getHttpClient()->request($method, $url, $options);

        return $response;
    }

    public function setHttpClient(ClientInterface $client)
    {
        $this->httpClient = $client;

        return $this;
    }

    public function getHttpClient()
    {
        if (!($this->httpClient instanceof ClientInterface)) {
            if (property_exists($this, 'app') && $this->app['http_client']) {
                $this->httpClient = $this->app['http_client'];
            } else {
                $this->httpClient = new Client($this->app->getConfig());
            }
        }

        return $this->httpClient;
    }

    protected function fixJsonIssue(array $options): array
    {
        if (isset($options['json']) && is_array($options['json'])) {
            $options['headers'] = array_merge($options['headers'] ?? [], ['Content-Type' => 'application/json']);

            if (empty($options['json'])) {
                $options['body'] = mb_convert_encoding(\GuzzleHttp\json_encode($options['json'], JSON_UNESCAPED_UNICODE), 'GBK', 'UTF8');
            } else {
                $options['body'] = mb_convert_encoding(\GuzzleHttp\json_encode($options['json'], JSON_FORCE_OBJECT), 'GBK', 'UTF8');
            }

            unset($options['json']);
            unset($options['query']);
        }

        return $options;
    }
}
