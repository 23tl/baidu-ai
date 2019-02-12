<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:46
 */

namespace Strays\BaiDuAia\Language\Simnet;


use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text_1, string $text_2, string $model = 'BOW')
    {
        $body = [
            'text_1' => $text_1,
            'text_2' => $text_2,
            'model' => $model,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/simnet', $body);
    }
}