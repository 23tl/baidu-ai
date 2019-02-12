<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-29
 * Time: 21:27
 */

namespace Strays\BaiDuAia\Kernel\Traits;

use Symfony\Component\Cache\Simple\FilesystemCache;

trait InteractsWithCache
{
    /**
     * 缓存实例
     *
     * @var
     */
    protected $cache;

    /**
     * 获取缓存
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
     * 设置缓存
     *
     * @param $cache
     * @return $this
     */
    public function setCache($cache)
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * 创建默认缓存
     *
     * @return FilesystemCache
     */
    public function createDefaultCache()
    {
        return new FilesystemCache();
    }
}
