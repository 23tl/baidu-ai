<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:52
 */

namespace Strays\BaiDuAia\Language\Comment;


use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send (string $text, int $type = 4)
    {
        $body = [
            'text' => $text,
            'type' => $type,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/comment_tag', $body);
    }
}