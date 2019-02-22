<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Review\Text;

use Strays\BaiDuAi\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 内容文本审核.
     *
     * @param string $text
     *
     * @return string
     */
    public function send(string $text)
    {
        $body = [
            'content' => $text,
        ];

        return $this->httpPostFrom('/rest/2.0/antispam/v2/spam', $body);
    }
}
