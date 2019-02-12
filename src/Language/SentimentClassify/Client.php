<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:58
 */

namespace Strays\BaiDuAia\Language\SentimentClassify;


use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text)
    {
        $body = [
            'text' => $text,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v1/sentiment_classify', $body);
    }
}