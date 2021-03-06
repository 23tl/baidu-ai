<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Language\SentimentClassify;

use Strays\BaiDuAi\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 情感倾向.
     *
     * @param string $text
     *
     * @return string
     */
    public function send(string $text)
    {
        $body = [
            'text' => $text,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v1/sentiment_classify', $body);
    }
}
