<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;

class TestController extends Controller
{

   public function index() {
    return ['test' => 'test'];
   }

}


