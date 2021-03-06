<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Language\Comment;

use Strays\BaiDuAi\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 评论观点.
     *
     * @param string $text
     * @param int    $type
     *
     * @return string
     */
    public function send(string $text, int $type = 4)
    {
        $body = [
            'text' => $text,
            'type' => $type,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/comment_tag', $body);
    }
}
