@extends('layouts.admin-app-master')
@section('title')
    Create About Us
@endsection
@section('page_header')
    @push('page_header')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>About-Us Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">About-Us Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    @endpush
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('admin.aboutus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">banner Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Banner Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Enter Banner Title">
                        </div>
                        <div class="form-group">
                            <label for="title"> Sub-Title</label>
                            <input type="text" name="subtitle" class="form-control" id="subtitle"
                                placeholder="Enter Sub Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Enter Banner description">
                        </div>
                        <div class="form-group">
                            <label for="description">Button 1</label>
                            <input type="text" name="button1" class="form-control" id="button1"
                                placeholder="Enter Button Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Button 2</label>
                            <input type="text" name="button2" class="form-control" id="button2"
                                placeholder="Enter Button Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Button 3</label>
                            <input type="text" name="button3" class="form-control" id="button3"
                                placeholder="Enter Button Name">
                        </div>
                        <div class="form-group">
                            <label for="description">Button 4</label>
                            <input type="text" name="button4" class="form-control" id="button4"
                                placeholder="Enter Button Name">
                        </div>
                        <div class="form-group">
                            <label for="title">Box Title</label>
                            <input type="text" name="boxtitle" class="form-control" id="boxtitle"
                                placeholder="Enter Box Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Box Description</label>
                            <input type="text" name="boxdescription" class="form-control" id="boxdescription"
                                placeholder="Enter Box Description">
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <!-- Image preview element -->
                            <img id="image_preview" style="max-width: 100%; margin-top: 10px;" />
                            <label for="upload_file">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="upload_file">
                                    <label class="custom-file-label" for="upload_file">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                        <a href="{{route('admin.aboutus')}}" class="btn btn-danger btn-block">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Function to handle file input change event
            $('#upload_file').on('change', function() {
                var fileName = $(this).val().split('\\').pop(); // Get the file name
                $(this).next('.custom-file-label').html(fileName); // Update the label with the file name

                // Show image preview (optional)
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Assuming you have an image element with id 'image_preview'
                        $('#image_preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush
