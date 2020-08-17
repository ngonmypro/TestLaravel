<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    function Show(){
      return view('create.home')
        ->with('name', 'Pongpichan')
        ->with('title', 'Laravel Test Basic To Advance');
    }
}
