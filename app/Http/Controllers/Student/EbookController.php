<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    protected $dir = 'pages.students.ebook';

    public function index(){
        return view("$this->dir.index");
    }

    public function create(){
        return view("$this->dir.form");
    }
}
