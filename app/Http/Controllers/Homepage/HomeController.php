<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage.home');
    }
}