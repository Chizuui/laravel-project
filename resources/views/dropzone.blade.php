<!DOCTYPE html>
<html>
<head>
    <title>Dropzone Image Upload in Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
</head>
<body>

<div class="container">
    <h3 class="text-center">Dropzone Image Upload in Laravel</h3>

    <form action="{{ route('dropzone.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="imageUpload">
        @csrf
        <div class="dz-message">
            Upload Multiple Images
        </div>
    </form>

    <button type="button" id="button" class="btn btn-primary mt-3">Upload</button>
</div>

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        autoProcessQueue: false,
        maxFilesize: 2,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        parallelUploads: 10,

        init: function () {
            var myDropzone = this;

            $("#button").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });

            this.on("sending", function (file, xhr, formData) {
                formData.append("_token", "{{ csrf_token() }}");
            });
        }
    };
</script>

</body>
</html>