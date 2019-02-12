<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-30
 * Time: 16:55
 */

namespace Strays\BaiDuAia\Kernel\Contracts;

use Psr\Http\Message\RequestInterface;

interface AccessTokenInterface
{
    public function applyToRequest();
}