<?php

use App\Models\Users;
use Illuminate\Support\Str;
use Libraries\database_drivers\Model;

if (!function_exists('randint')) {
    function randint($length = 5)  : string
    {
        $code = '';
        for($i = 0; $i < $length; $i++) {
            $code .= random_int(0, 9);
        }
        return $code;
    }
}

if (!function_exists('authed')) {
    function authed() : ?Model
    {
        if (session()->exists('_token')) {
            $token = session()->get('_token');
        } else {
            $token = null;
        }
        return isset($token) ? (new Users())->where('_token', $token)->first() : null;
    }
}

if (!function_exists('login_required')) {
    function login_required() : void {
        if (authed() === null) {
            redirect()->to(url('auth/'));
        }
    }
}

if (! function_exists('breadcrumbs')) {
    function breadcrumbs($separator = ' &raquo; ', $current = '', $home = 'Home') {
        $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        $base = url();
        $breadcrumbs = Array("<a href=\"$base\">$home</a>");

        $crumbs='';

        $array = array_keys($path);
        $last = end($array);

        foreach ($path as $x => $crumb) {
            $title = ucwords(str_replace(Array('.php', '_', '%20'), Array('', ' ', ' '), $crumb));

            if ($x != $last) {
                $breadcrumbs[] = "<a href=\"$base$crumbs$crumb\">$title</a>";
                $crumbs .= $crumb.'/';
            }
            else
                $breadcrumbs[] = $title;
        }
        if (isset($current)) {
            $lastBreadcrumbs = Str::title($current);
        } else {
            $lastBreadcrumbs = Str::title(end($breadcrumbs));
        }
        $breadcrumbs[count($breadcrumbs) -1] = $lastBreadcrumbs;
        // Build our temporary array (pieces of bread) into one big string :)
        return implode($separator, $breadcrumbs);
    }
}


if (!function_exists('flatten')) {
    function flatten(array $array) : array
    {
        $return = array();
        array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
        return $return;
    }
}

if (! function_exists('group')) {
    function group(array $array, string $key) : array
    {
        $result = array();
        foreach ($array as $element) {
            $result[$element[$key]][] = $element;
        }
        return $result;
    }
}

if (!function_exists('formatVND')) {
    function formatVND($price) {
        if (isset($price)) {
            return number_format($price, 0, '', ',');
        }
    }
}