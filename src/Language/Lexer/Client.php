<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAia\Language\Lexer;

use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 词法分析.
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

        return $this->httpPostJson('/rpc/2.0/nlp/v1/lexer', $body);
    }

    /**
     * 词法分析定制.
     *
     * @param string $text
     *
     * @return string
     */
    public function custom(string $text)
    {
        $body = [
            'text' => $text,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v1/lexer_custom', $body);
    }
}
