<?php


namespace App\Http\Controllers\Admin;


class ErrorsController
{
    public function index(){
        return view('errors.401');
    }
}