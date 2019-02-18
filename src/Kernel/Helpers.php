<?php

namespace Strays\BaiDuAi\Kernel;

function hasBase64(string $base)
{
    if (substr(trim($base), 0, 4) === 'http') {
        return false;
    }

    return true;
}