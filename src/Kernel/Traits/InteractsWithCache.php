<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAia\Kernel\Traits;

use Symfony\Component\Cache\Simple\FilesystemCache;

trait InteractsWithCache
{
    /**
     * 缓存实例.
     *
     * @var
     */
    protected $cache;

    /**
     * 获取缓存.
     *
     * @return FilesystemCache
     */
    public function getCache()
    {
        if ($this->cache) {
            return $this->cache;
        }

        return $this->cache = $this->createDefaultCache();
    }

    /**
     * 设置缓存.
     *
     * @param $cache
     *
     * @return $this
     */
    public function setCache($cache)
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * 创建默认缓存.
     *
     * @return FilesystemCache
     */
    public function createDefaultCache()
    {
        return new FilesystemCache();
    }
}
