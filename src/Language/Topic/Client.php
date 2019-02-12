<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 23:06
 */

namespace Strays\BaiDuAia\Language\Topic;


use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $title, string $content)
    {
        $body = [
            'title' => $title,
            'content' => $content,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v1/topic', $body);
    }
}