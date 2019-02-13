<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Language\DepParser;

use Strays\BaiDuAi\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text, int $mode = 0)
    {
        $body = [
            'text' => $text,
            'mode' => $mode,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v1/depparser', $body);
    }
}
