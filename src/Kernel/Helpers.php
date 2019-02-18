<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Kernel;

function hasBase64(string $base)
{
    if ('http' === substr(trim($base), 0, 4)) {
        return false;
    }

    return true;
}
