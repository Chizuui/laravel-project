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
    <h3 class="text-center my-4">Dropzone Image Upload in Laravel</h3>

    <div id="success-message" class="alert alert-success d-none">
        All files uploaded
    </div>

    <form action="{{ route('dropzone.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="imageUpload">
        @csrf
        <div class="dz-message">
            DRag here to upload image
        </div>
    </form>

    <div class="mt-3">
        <button type="button" id="button" class="btn btn-primary">Start Upload</button>
        <button type="button" id="clear-dropzone" class="btn btn-secondary">Clean</button>
    </div>
</div>

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        autoProcessQueue: false,
        maxFilesize: 2,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        parallelUploads: 10,
        dictRemoveFile: "Hapus File",

        init: function () {
            var myDropzone = this;

            $("#button").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });

            $("#clear-dropzone").click(function () {
                myDropzone.removeAllFiles();
                $("#success-message").addClass("d-none");
            });

            this.on("sending", function (file, xhr, formData) {
                formData.append("_token", "{{ csrf_token() }}");
            });

            this.on("success", function (file, response) {
                console.log("Berhasil: ", response);
                $("#success-message").removeClass("d-none").text("File " + file.name + " Uploaded!");
            });

            this.on("queuecomplete", function () {
                $("#success-message").removeClass("d-none").text("All files uploaded!");
            });

            this.on("error", function (file, message) {
                console.error("Gagal: ", message);
                $(file.previewElement).find('.dz-error-message').text(message.error || "Failed to uploaded");
            });
        }
    };
</script>

</body>
</html>