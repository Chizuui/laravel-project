<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('AdminPage.admin');
    }
}