<?php

namespace Libraries\Request;

use Closure;
use Error;
use Exception;
use JetBrains\PhpStorm\ArrayShape;
use Libraries\Response\Response;
use Throwable;

trait HandleRequest
{

    public function action($route_groups)
    {
        $routes = $this->getRoutes($route_groups);
        $key = $this->method.','.$this->url;
        if (empty($routes[$key])) {
            // Nếu route hiện tại không khớp với cái nào trong route.php thì kiểm tra trường hợp url tùy chọn
            $arr_keys = array_keys($routes);
            $url_optional = $this->getUrlOptional();
            foreach ($arr_keys as $arr_key) {
                if (str_starts_with($arr_key, $url_optional['str_starts_with'])) {
                    preg_match('/\/{[a-z]+}/', $arr_key, $match);
                    $optional_key = substr($match[0], 2, -1);
                    $key = $url_optional['no_optional_url'].$match[0];
                    $this->$optional_key = $url_optional['optional_value'];
                }
            }
            // Nếu trường hợp tùy chọn vẫn không thỏa mãn thì trả về lỗi
            if (empty($routes[$key])) {
                abort(Response::HTTP_NOT_FOUND);
            }
        }

        // Nếu action là 1 Closure
        if ($routes[$key] instanceof Closure) {
            return call_user_func($routes[$key], $this);
        }

        // Nếu action là 1 hàm của Controller
        $arr_action = explode(',', $routes[$key]);
        $controller_name = str_replace('App\Http\Controllers\\', '', $arr_action[0]);
        $method_name = $arr_action[1];
        $controller_path = assets('/app/Http/Controllers/'.$controller_name.'.php');
        if (! file_exists($controller_path)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $class_name = '\App\Http\Controllers\\'.$controller_name;
        require assets($class_name.'.php');
        $class = new $class_name();
        if (! method_exists($class, $method_name)) {
            abort(Response::HTTP_METHOD_NOT_ALLOWED);
        }

        try {
            $class->$method_name($this);

        } catch (Throwable|Exception $e) {
            $message = $e->getMessage();
            $file = $e->getFile();
            $line = $e->getLine();
            $errors = $e->getTrace();
            require assets('Libraries/Response/views/debug.php');
        }
    }

    /**
     * Convert array từ mảng có hình dạng như file route.php thành mảng 1 chiều
     *
     * @param $route_groups
     * @return array
     */
    private function getRoutes($route_groups): array
    {
        $routes = [];
        foreach ($route_groups as $key => $route_group) {
            if (str_starts_with($key, 'GET') || str_starts_with($key, 'POST') ||
                str_starts_with($key, 'PUT') || str_starts_with($key, 'DELETE')
            ) {
                $routes[$key] = $route_group instanceof Closure ? $route_group : implode(',', $route_group);
            } else {
                foreach($route_group as $uri_method => $action) {
                    $explode = explode(',', $uri_method);
                    $arr_key = $explode[0].',/'.$key.($explode[1] === '/' ? '' : $explode[1]);
                    $routes[$arr_key] = $action instanceof Closure ? $action : implode(',', $action);
                }
            }
        }

        return $routes;
    }

    /**
     * Lấy những biến cho trường hợp đường dẫn tùy chọn trên URL
     * Ví dụ như: domain.com/post/xin_chao_cac_ban thì xin_chao_cac_ban là phần tùy chọn
     */
    #[ArrayShape([
        'optional_value' => "null|string", 'no_optional_url' => "string", 'str_starts_with' => "string"
    ])]
    private function getUrlOptional(): array
    {
        $key = $this->method.','.$this->url;
        $arr = explode('/', $key);
        $optional_value = array_pop($arr);
        if (empty($optional_value)) {
            abort(Response::HTTP_NOT_FOUND);
        }
        $url = implode('/', $arr);

        return [
            'optional_value' => $optional_value,
            'no_optional_url' => $url,
            'str_starts_with' => $url.'/{',
        ];
    }

    /**
     * Thiết lập cho mỗi request đến máy chủ:
     * Khởi tạo URL và METHOD của mỗi request
     *
     * @return void
     */
    private function getRequest(): void
    {
        $url = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
        if (! str_starts_with($_SERVER['PHP_SELF'], '/index.php')) {
            $url = str_replace(substr($_SERVER['PHP_SELF'], 0, -10), '', $url);
        }
        $this->url = $url;
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
}