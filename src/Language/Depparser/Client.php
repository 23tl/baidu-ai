<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:19
 */

namespace Strays\BaiDuAia\Language\DepParser;

use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text, int $mode = 0)
    {
        $body = [
            'text' => $text,
            'mode' => $mode,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v1/depparser', $body);
    }
}