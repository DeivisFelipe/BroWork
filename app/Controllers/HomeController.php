<?php
/**
 * Created by PhpStorm.
 * User: outra conta
 * Date: 31/03/2018
 * Time: 16:48
 */

namespace App\Controllers;


use Core\BaseController;

class HomeController extends BaseController
{

    public function index()
    {
        $this->setPageTitle("Home");
        $this->view->nome = "deivis felipe";
        $this->renderView('home/index','layout');
    }
}