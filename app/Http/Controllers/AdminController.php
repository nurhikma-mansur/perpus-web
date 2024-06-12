<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $dir = 'pages.admin';

    public function index(){
        return view("$this->dir.index");
    }

    public function create(){
        return view("$this->dir.form");
    }
}
