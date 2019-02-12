<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-02-01
 * Time: 22:30
 */

namespace Strays\BaiDuAia\Language\WordSimEmbedding;


use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $word_1, string $word_2, int $dem = 0)
    {
        $body = [
            'word_1' => $word_1,
            'word_2' => $word_2,
            'mode' => $dem,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/word_emb_sim', $body);
    }
}