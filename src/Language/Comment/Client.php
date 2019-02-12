<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAia\Language\Comment;

use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text, int $type = 4)
    {
        $body = [
            'text' => $text,
            'type' => $type,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/comment_tag', $body);
    }
}
