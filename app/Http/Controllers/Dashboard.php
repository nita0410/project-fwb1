<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class Dashboard extends Controller
{
    public function Index()
    {
        return view('index');
    }
}
