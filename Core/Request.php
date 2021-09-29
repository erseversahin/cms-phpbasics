<?php

namespace Core;

class Request
{
    public function get()
    {
        return self::filter($_GET);
    }
    public function post()
    {
        return self::filter($_POST);
    }

    public static function filter($data)
    {
        return is_array($data) ? array_map('\Core\Request::filter', $data) : htmlspecialchars(trim($data));
    }

}