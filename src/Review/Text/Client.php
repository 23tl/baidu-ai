<?php
/**
 * Created by PhpStorm.
 * User: 78449
 * Date: 2019/2/12
 * Time: 17:20
 */

namespace Strays\BaiDuAi\Review\Text;


use Strays\BaiDuAi\Kernel\BaseClient;

class Client extends BaseClient
{
    public function send(string $text)
    {
        $body = [
            'content' => $text
        ];

        return $this->httpPostFrom('/rest/2.0/antispam/v2/spam', $body);
    }
}