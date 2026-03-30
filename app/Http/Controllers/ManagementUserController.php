<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementUserController extends Controller {
    public function index() {
        return "Halaman Management User";
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