<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:30
 */

namespace Strays\BaiDuAia\Language\Dnnlm;


use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text)
    {
        $body = [
            'text' => $text,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/dnnlm_cn', $body);
    }
}