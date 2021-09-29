<?php

namespace Core;

class Session
{
    public static function getSession($name)
    {
        return $_SESSION[$name] ?? false;

    }
    public static function setSession($name,$value)
    {
        $_SESSION[$name] = $value;
    }
    public static function removeSession()
    {
        session_start();
        session_destroy();
    }

    public static function getAllSession()
    {
        return $_SESSION;
    }
}