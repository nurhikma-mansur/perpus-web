<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class EbookController extends Controller
{

    protected $dir = 'pages.ebook';

    public function index(){
        return view("$this->dir.index");
    }

    public function create(){
    
        return view("$this->dir.form");
    }

}
