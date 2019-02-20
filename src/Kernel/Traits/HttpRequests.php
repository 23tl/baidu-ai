<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Kernel\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

trait HttpRequests
{
    /**
     * @var
     */
    protected $httpClient;

    /**
     * @param $url
     * @param $method
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request($url, $method, array $options = [])
    {
        $options = $this->fixJsonIssue($options);

        $response = $this->getHttpClient()->request($method, $url, $options);

        return $response;
    }

    /**
     * @param ClientInterface $client
     * @return $this
     */
    public function setHttpClient(ClientInterface $client)
    {
        $this->httpClient = $client;

        return $this;
    }

    /**
     * @return Client|ClientInterface
     */
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

    /**
     * @param array $options
     * @return array
     */
    protected function fixJsonIssue(array $options): array
    {
        if (isset($options['json']) && is_array($options['json'])) {
            $options['headers'] = array_merge($options['headers'] ?? [], ['Content-Type' => 'application/json;charset=utf-8']);

            if (!empty($options['json'])) {
                $options['body'] = mb_convert_encoding(\GuzzleHttp\json_encode($options['json']), 'GBK', 'UTF8');
            }

            unset($options['json']);
            unset($options['query']);
        }

        if (isset($options['from']) && is_array($options['from'])) {
            $options['headers'] = array_merge($options['headers'] ?? [], ['Content-Type' => 'application/x-www-form-urlencoded']);
            $options['form_params'] = array_merge($options['body'] ?? [], $options['from']);

            unset($options['from']);
            unset($options['query']);
        }

        if (!$this->app['config']->get('ssl')) {
            $options['verify'] = false;
        }

        return $options;
    }
}
