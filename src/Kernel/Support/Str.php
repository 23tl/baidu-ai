<?php
/**
 * Created by PhpStorm.
 * User: fcdna
 * Date: 2019-01-29
 * Time: 19:30
 */

namespace Strays\BaiDuAia\Kernel\Support;


class Str
{
    protected static $snakeCache = [];

    protected static $camelCache = [];

    protected static $studlyCache = [];



    public static function camel($value)
    {
        if (isset(static::$camelCache[$value])) {
            return static::$camelCache[$value];
        }
        return static::$camelCache[$value] = lcfirst(static::studly($value));
    }

    public static function random($length = 16)
    {
        $string = '';
        while (($len = strlen($string)) < $length) {
            $size = $length - $len;
            $bytes = static::randomBytes($size);
            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }
        return $string;
    }

    public static function randomBytes($length = 16)
    {
        if (function_exists('random_bytes')) {
            $bytes = random_bytes($length);
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes($length, $strong);
            if (false === $bytes || false === $strong) {
               // throw new RuntimeException('Unable to generate random string.');
            }
        } else {
            // throw new RuntimeException('OpenSSL extension is required for PHP 5 users.');
        }
        return $bytes;
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public static function upper($value)
    {
        return mb_strtoupper($value);
    }

    public static function title($value)
    {
        return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
    }

    public static function snake($value, $delimiter = '_')
    {
        $key = $value.$delimiter;
        if (isset(static::$snakeCache[$key])) {
            return static::$snakeCache[$key];
        }
        if (!ctype_lower($value)) {
            $value = strtolower(preg_replace('/(.)(?=[A-Z])/', '$1'.$delimiter, $value));
        }
        return static::$snakeCache[$key] = trim($value, '_');
    }

    public static function studly($value)
    {
        $key = $value;
        if (isset(static::$studlyCache[$key])) {
            return static::$studlyCache[$key];
        }
        $value = ucwords(str_replace(['-', '_'], ' ', $value));
        return static::$studlyCache[$key] = str_replace(' ', '', $value);
    }

}