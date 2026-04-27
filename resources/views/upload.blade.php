<!DOCTYPE html>
<html>
<head>
    <title>Upload File Dengan Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="row">
    <div class="container">
        <div class="col-lg-8 mx-auto my-5">

            <h3 class="text-center my-5">Upload File Dengan Laravel</h3>

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('upload.proses') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <b>File Gambar</b><br>
                    <input type="file" name="file">
                </div>

                <div class="form-group">
                    <b>Keterangan</b>
                    <textarea class="form-control" name="keterangan"></textarea>
                </div>

                <input type="submit" value="Upload" class="btn btn-primary">
            </form>

            <hr>

            <h5>Upload Resize Gambar</h5>

            <form action="{{ route('upload.resize') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <b>File Gambar</b><br>
                    <input type="file" name="file">
                </div>

                <div class="form-group">
                    <b>Keterangan</b>
                    <textarea class="form-control" name="keterangan"></textarea>
                </div>

                <input type="submit" value="Upload Resize" class="btn btn-success">
            </form>

        </div>
    </div>
</div>

</body>
</html>