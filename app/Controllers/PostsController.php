<?php
/**
 * Created by PhpStorm.
 * User: outra conta
 * Date: 31/03/2018
 * Time: 17:31
 */

namespace App\Controllers;


use Core\BaseController;
use Core\Container;
use Core\Redirect;
use Core\Session;

class PostsController extends BaseController
{
    private $post;

    public function __construct()
    {
        parent::__construct();
        $this->post = Container::getModel("Post");
    }

    public function index()
    {
        if (Session::get("success")){
            $this->view->success = Session::get("success");
            Session::destroy("success");
        }
        if (Session::get("errors")){
            $this->view->errors = Session::get("errors");
            Session::destroy("errors");
        }
        $this->view->posts = $this->post->All();
        $this->setPageTitle("Posts");
        $this->renderView("posts/index","layout");
    }
    public function show($id){

        $this->view->post = $this->post->find($id);
        $this->setPageTitle("{$this->view->post->title}");
        $this->renderView("posts/show","layout");
    }
    public function create(){

        $this->setPageTitle("New Post");
        $this->renderView("posts/create","layout");
    }
    public function store($request){

        $data = [
            "title" => $request->post->title,
            "content" => $request->post->content
        ];
        if($this->post->create($data)){
            Redirect::route("/posts");
        }else{
            echo "Erro ao publicar";
        }
    }
    public function edit($id){

        $this->view->post = $this->post->find($id);
        $this->setPageTitle("Edit Post - {$this->view->post->title}");
        $this->renderView("posts/edit","layout");
    }

    public function update($id,$request){

        $data = [
            "title" => $request->post->title,
            "content" => $request->post->content
        ];
        if(!$this->post->update($data,$id)){
            return Redirect::route("/posts",[
                'success' => ['post atualizado com sucesso!']
            ]);
        }else{
            return Redirect::route("/posts",[
                'errors' => ['Erro ao atualizar!']
            ]);
        }
    }
    public function delete($id){

        if($this->post->delete($id)){
            return Redirect::route("/posts");
        }else{
            return  "Erro ao excluir";
        }
    }


}