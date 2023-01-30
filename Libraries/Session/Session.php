<?php

namespace Libraries\Session;

class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Lưu vào session theo key và value
     *
     * @param  string  $key
     * @param $value
     * @return void
     */
    public static function put(string $key, $value = null): void
    {
        $_SESSION[$key] = $value;
    }


    /**
     * Lấy session theo key, nếu không truyền key thì lấy toàn bộ
     *
     * @param  string|null  $key
     * @return array|mixed
     */
    public static function get(?string $key = null): mixed
    {
        return $_SESSION[$key] ?? null;
    }


    /**
     * Lấy toàn bộ session
     *
     * @return array
     */
    public static function all(): array
    {
        return $_SESSION;
    }

    /**
     * Xóa session theo key
     *
     * @param  string  $key
     * @return void
     */
    public static function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Xóa toàn bộ session
     *
     * @return void
     */
    public static function flush(): void
    {
        $_SESSION = [];
    }

    /**
     * Kiểm tra một session theo key có tồn tại không
     *
     * @param  string  $key
     * @return bool
     */
    public static function exists(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Lấy giá trị của session theo key truyền vào và xóa nó khỏi session
     *
     * @param  string  $key
     * @return mixed
     */
    public static function pull(string $key): mixed
    {
        $value = $_SESSION[$key];
        unset($_SESSION[$key]);

        return $value;
    }
}