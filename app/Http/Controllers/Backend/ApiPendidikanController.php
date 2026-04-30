<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        $pendidikan = Pendidikan::all();

        return response()->json([
            'status' => true,
            'message' => 'Data Pendidikan berhasil ditampilkan',
            'data' => $pendidikan
        ], 200);
    }

    public function getPen($id)
    {
        $pendidikan = Pendidikan::find($id);

        return response()->json([
            'status' => true,
            'message' => 'Data Pendidikan berhasil ditampilkan',
            'data' => $pendidikan
        ], 200);
    }

    public function createPen(Request $request)
    {
        Pendidikan::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data Pendidikan berhasil ditambahkan'
        ], 200);
    }

    public function updatePen(Request $request, $id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data Pendidikan berhasil diubah'
        ], 200);
    }

    public function deletePen($id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Pendidikan berhasil dihapus'
        ], 200);
    }
}