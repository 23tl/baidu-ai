<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:30
 */

namespace Strays\BaiDuAia\Language\WordEmbedding;


use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text, int $dem = 0)
    {
        $body = [
            'text' => $text,
            'dem' => $dem,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/word_emb_vec', $body);
    }
}