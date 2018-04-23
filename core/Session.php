<?php
/**
 * Created by PhpStorm.
 * User: Conta
 * Date: 22/04/2018
 * Time: 19:19
 */

namespace Core;


class Session
{
    public static function set($key , $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];

        return false;
    }

    public static function destroy($keys)
    {
        if(is_array($keys))
            foreach ($keys as $key)
                unset($_SESSION[$key]);

        unset($_SESSION[$keys]);
    }
}