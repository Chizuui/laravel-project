<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user (GET /user)
     */
    public function index()
    {
        return "Ini halaman user";
    }

    /**
     * Menyimpan data user baru (POST /user)
     */
    public function store(Request $request)
    {
        $nama = $request->input('nama');
        return "Data diterima: " . $nama;
    }
}