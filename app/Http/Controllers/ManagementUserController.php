<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementUserController extends Controller {
    public function index() {
        $nama = "Desca Rizki Febriant";
        $matkul = [
            "Workshop Infrastruktur Jaringan",
            "Workshop Elektronika Terapan",
            "Workshop Pemrograman Web"
        ];

        return view('home', compact('nama', 'matkul'));
    }

    public function create() {
        return "Halaman Create User";
    }

    public function store(Request $request) {
        return "Halaman Store User";
    }

    public function show($id) {
        return "Halaman Show User";
    }

    public function edit($id) {
        return "Halaman Edit User";
    }

    public function update(Request $request, $id) {
        return "Halaman Update User";
    }

    public function destroy($id) {
        return "Halaman Destroy User";
    }
}