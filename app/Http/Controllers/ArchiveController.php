<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    protected $dir = 'pages.archive';

    public function index(){
        return view("$this->dir.index");
    }

    public function create(){
        return view("$this->dir.form");
    }
}
