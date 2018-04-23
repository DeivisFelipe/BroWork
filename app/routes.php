<?php

$route[] = ['/',"HomeController@index"];
$route[] = ['/posts',"PostsController@index"];
$route[] = ['/posts/{id}/show',"PostsController@show"];
$route[] = ['/posts/create',"PostsController@create"];
$route[] = ['/posts/store',"PostsController@store"];
$route[] = ['/posts/{id}/edit',"PostsController@edit"];
$route[] = ['/posts/{id}/update',"PostsController@update"];
$route[] = ['/posts/{id}/delete',"PostsController@delete"];



return $route;