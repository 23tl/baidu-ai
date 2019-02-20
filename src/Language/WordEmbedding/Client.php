<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Language\WordEmbedding;

use Strays\BaiDuAi\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 词向量
     * @param string $text
     * @param int $dem
     * @return string
     */
    public function send(string $text, int $dem = 0)
    {
        $body = [
            'text' => $text,
            'dem' => $dem,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/word_emb_vec', $body);
    }
}
