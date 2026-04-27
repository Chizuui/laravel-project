<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');

        echo "File Name: " . $file->getClientOriginalName();
        echo "<br>";
        echo "File Extension: " . $file->getClientOriginalExtension();
        echo "<br>";
        echo "File Real Path: " . $file->getRealPath();
        echo "<br>";
        echo "File Size: " . $file->getSize();
        echo "<br>";
        echo "File Mime Type: " . $file->getMimeType();
        echo "<br>";

        $tujuan_upload = public_path('data_file');

        if (!File::isDirectory($tujuan_upload)) {
            File::makeDirectory($tujuan_upload, 0777, true, true);
        }

        $file->move($tujuan_upload, $file->getClientOriginalName());
    }

    public function resize_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required',
        ]);

        $path = public_path('img/logo');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $file = $request->file('file');

        $fileName = time() . '_' . $file->getClientOriginalName();

        $manager = new ImageManager(new Driver());

        $image = $manager->read($file->getRealPath());

        $image->cover(200, 200);

        $image->save($path . '/' . $fileName);

        return redirect()
            ->route('upload')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function dropzone()
    {
        return view('dropzone');
    }

    public function dropzone_store(Request $request)
    {
        $image = $request->file('file');

        $path = public_path('img/dropzone');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $imageName = time() . '.' . $image->extension();

        $image->move($path, $imageName);

        return response()->json(['success' => $imageName]);
    }

    public function pdf_upload()
    {
        return view('pdf_upload');
    }

    public function pdf_store(Request $request)
    {
        $pdf = $request->file('file');

        $path = public_path('pdf/dropzone');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $pdfName = 'pdf_' . time() . '.' . $pdf->extension();

        $pdf->move($path, $pdfName);

        return response()->json(['success' => $pdfName]);
    }
}