<?php
/**
 * Created by PhpStorm.
 * User: outra conta
 * Date: 31/03/2018
 * Time: 16:49
 */

namespace Core;


class Container
{
    public static function newController($controller)
    {
        $controller = "App\\Controllers\\" .  $controller;
        return new $controller;
    }

    public static function getModel($model)
    {
        $objModel = "\\App\\Models\\" . $model;
        return new $objModel(Database::getDataBase());
    }

    public  static function pageNotFound(){
        if(file_exists(__DIR__ . "/../app/Views/404.phtml")){
            return require_once __DIR__ . "/../app/Views/404.phtml";
        }else{
            echo "Page 404 not found";
        }
    }
}