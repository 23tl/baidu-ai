<?php

/*
 * This file is part of the strays/baidu-ai.
 *
 * (c) strays <784494731@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Strays\BaiDuAi\Review\Image;

use Strays\BaiDuAi\Kernel\BaseClient;
use function Strays\BaiDuAi\Kernel\hasBase64;

class Client extends BaseClient
{
    /**
     * Gif 图片审核
     * @param string $base
     * @return string
     */
    public function antiPornGif(string $base)
    {
        $body = [
            'image' => $base,
        ];

        return $this->httpPostFrom('/rest/2.0/antiporn/v1/detect_gif', $body);
    }

    /**
     * 用户头像审核
     * @param string $base
     * @return string
     */
    public function faceAudit(string $base)
    {
        $body = [];

        if (hasBase64($base)) {
            $body['images'] = $base;
        } else {
            $body['imgUrls'] = urlencode($base);
        }

        return $this->httpPostFrom('/rest/2.0/solution/v1/face_audit', $body);
    }

    /**
     * 组合服务接口
     * @param string $base
     * @param string $scenes
     * @return string
     */
    public function imageCensorComb(string $base, array $scenes = [])
    {
        $body = [];

        if (hasBase64($base)) {
            $body['images'] = $base;
        } else {
            $body['imgUrl'] = $base;
        }

        $body = array_merge($body, ['scenes' => $scenes]);

        return $this->httpPostJson('/api/v1/solution/direct/img_censor', $body);
    }

    /**
     * 自定义图像审核接口
     * @param string $base
     * @return string
     */
    public function imageCensorUserDefined(string $base)
    {
        $body = [];

        if (hasBase64($base)) {
            $body['image'] = $base;
        } else {
            $body['imgUrl'] = $base;
        }

        return $this->httpPostFrom('/rest/2.0/solution/v1/img_censor/user_defined', $body);
    }
}