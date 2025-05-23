<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dash extends Controller
{
    public function Index(){
        return view('index');
    }
}
