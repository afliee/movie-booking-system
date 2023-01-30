<?php

namespace Libraries\Response\HttpResponse;

use RuntimeException;

trait HttpException
{

    public static function abort(int $code): void
    {
        $codes = self::getCodes();
        if (! in_array($code, $codes, true)) {
            throw new RuntimeException('Mã trạng thái không hợp lệ');
        }

        http_response_code($code);
        $message = str_replace('_', ' ', array_search($code, $codes, true));

    }
    
}