<!DOCTYPE html>
<html>
<head>
    <title>Request dengan Input Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h3>Form Validation dengan Laravel</h3>
        <form action="/formulir/proses" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <div class="text-danger">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
            </div>

            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</div>

</body>
</html>