<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-30
 * Time: 14:22
 */

namespace Strays\BaiDuAia\Language\Lexer;


use Strays\BaiDuAia\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 词法分析
     *
     * @param string $text
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
     * 词法分析定制
     * @param string $text
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