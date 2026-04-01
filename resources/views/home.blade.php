@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Home Page</h1>
            <p class="lead">Selamat Datang</p>

            <p><strong>Nama :</strong> {{ $nama }}</p>

            <p><strong>Mata Kuliah</strong></p>
            <ul>
                @foreach($matkul as $p)
                    <li>{{ $p }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection