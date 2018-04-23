<?php
/**
 * Created by PhpStorm.
 * User: outra conta
 * Date: 13/04/2018
 * Time: 16:29
 */

namespace Core;


class Redirect
{

    public static function route($rota , $with = []){
        if (count($with) > 0)
            foreach ($with as $key => $value)
                Session::set($key,$value);
        return header("location:$rota");
    }
}