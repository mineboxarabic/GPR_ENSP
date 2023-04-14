<?php

class Controller
{
   
    public function model($model){
        require_once '../app/Models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []){
        extract($data);
        require_once '../app/Vue/' . $view . '.php';
    }
}