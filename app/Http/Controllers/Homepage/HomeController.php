<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage.home');
    }
}