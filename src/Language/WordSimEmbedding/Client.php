<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Language\WordSimEmbedding;

use Strays\BaiDuAi\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 词义相似度
     * @param string $word_1
     * @param string $word_2
     * @param int $dem
     * @return string
     */
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
