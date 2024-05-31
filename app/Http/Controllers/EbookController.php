<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EbookController extends Controller
{

    protected $dir = 'pages.ebook';

    public function index(){
        return view("$this->dir.index");
    }
}
