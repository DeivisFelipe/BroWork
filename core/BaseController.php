<?php
/**
 * Created by PhpStorm.
 * User: outra conta
 * Date: 31/03/2018
 * Time: 20:48
 */

namespace Core;


abstract class BaseController
{

    protected $view;
    private $viewPath;
    private $layoutPath;
    private $pageTitle = null;
    public  function __construct()
    {
        $this->view = new \stdClass;
    }

    protected  function renderView($viewPath,$layoutPath = null)
    {
        $this->viewPath = $viewPath;
        $this->layoutPath = $layoutPath;
        if($layoutPath){
            $this->layout();
        }else{
            $this->content();
        }
    }

    protected function content()
    {
        if (file_exists(__DIR__ . "/../app/Views/{$this->viewPath}.phtml")){
            require_once __DIR__ . "/../app/Views/{$this->viewPath}.phtml";
        }else{
            echo "Error: View path not found";
        }
    }
    protected function layout()
    {
        if (file_exists(__DIR__ . "/../app/Views/{$this->layoutPath}.phtml")){
            require_once __DIR__ . "/../app/Views/{$this->layoutPath}.phtml";
        }else{

            echo "Error: Layout path not found";
        }
    }
    protected function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
    }
    protected function getPageTitle($separador = null)
    {
        if ($separador){
            echo $this->pageTitle . " " . $separador . " ";
        }else{
            echo $this->pageTitle;
        }
    }
}