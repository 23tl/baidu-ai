<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Language\Simnet;

use Strays\BaiDuAi\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text_1, string $text_2, string $model = 'BOW')
    {
        $body = [
            'text_1' => $text_1,
            'text_2' => $text_2,
            'model' => $model,
        ];

        return $this->httpPostJson('/rpc/2.0/nlp/v2/simnet', $body);
    }
}
