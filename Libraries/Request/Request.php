<?php

namespace Libraries\Request;

class Request
{
    use HandleRequest;

    public $url = '/';
    public $method = 'index';

    public function __construct()
    {
        $this->getRequest();
    }

    /**
     * find parameters
     *
     * @return array
     */
    public function all(): array
    {
        return $this->method === 'GET' ? $_GET : array_merge($_POST, $_FILES);
    }

    /**
     * Trả về giá trị của của key truyền vào
     *
     * @param $key
     * @return array|mixed|null
     */
    public function get($key): mixed
    {
        return $this->method === 'GET' ?
            ($_GET[$key] ?? null) :
            (array_merge($_POST, $_FILES)[$key] ?? null);
    }

    /**
     * Trả về các tham số trên query param
     * Có thể truyền key vào để lấy giá trị của key đó
     *
     * @param $key
     * @return string|array|null
     */
    public function query($key = null): string|array|null
    {
        return $key === null ? $_GET : ($_GET[$key] ?? null);
    }

    /**
     * Trả về các tham số trong form
     * Có thể truyền key vào để lấy giá trị của key đó
     *
     * @param $key
     * @return string|array|null
     */
    public function input($key = null): string|array|null
    {
        return $key === null ?
            array_merge($_POST, $_FILES) :
            (array_merge($_POST, $_FILES)[$key] ?? null);
    }

}