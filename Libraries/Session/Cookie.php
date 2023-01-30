<?php

namespace Libraries\Cookie;

class Cookie
{
    public function __construct()
    {
    }

    public static function get($key = null) {
        return empty($key) ? $_COOKIE : $_COOKIE[$key];
    }

    public static function put(string $key, $value = null): void
    {
        setcookie($key, $value, time() + (86400 * 30));
    }

    public static function forget(string $key): void
    {
        setcookie($key, null, -1);
    }

    public static function exists(string $key): bool
    {
        return isset($_COOKIE[$key]);
    }
}