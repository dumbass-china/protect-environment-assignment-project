@extends('layouts.admin-app-master')
@section('title')
What We Do Edit
@endsection
@section('page_header')
    @push('page_header')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>What We Do Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">What We Do Edit</li>
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
    <form action="{{ route('admin.donation.update', $donation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">What We Do Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $donation->title }}" class="form-control" id="title" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Sub-Title</label>
                            <input type="text" name="subtitle" value="{{ $donation->subtitle }}" class="form-control" id="subtitle" placeholder="Enter Sub Title">
                        </div>

                        <div class="form-group">
                            <label for="picturetitle">Picture Title</label>
                            <input type="text" name="picturetitle" value="{{ $donation->picturetitle }}" class="form-control" id="picturetitle" placeholder="Enter Picture Sub-Title1">
                        </div>

                        <div class="form-group">
                            <label for="picturesubtitle">Picture Sub-Title1</label>
                            <input type="text" name="picturesubtitle" value="{{ $donation->picturesubtitle }}" class="form-control" id="picturesubtitle" placeholder="Enter Picture Sub-Title1">
                        </div>

                        <div class="form-group">
                            <label for="picturesubtitle2">Picture Sub-Title2</label>
                            <input type="text" name="picturesubtitle2" value="{{ $donation->picturesubtitle2 }}" class="form-control" id="picturesubtitle2" placeholder="Enter Picture Sub-Title2">
                        </div>

                        <div class="form-group">
                            <label for="picturedescription">Picture Description</label>
                            <input type="text" name="picturedescription" value="{{ $donation->picturedescription }}" class="form-control" id="picturedescription" placeholder="Enter Picture Description">
                        </div>

                        <div class="form-group">
                            <label for="picturebutton">Picture Button</label>
                            <input type="text" name="picturebutton" value="{{ $donation->picturebutton }}" class="form-control" id="picturebutton" placeholder="Enter Picture Button Name">
                        </div>

                        <div class="form-group">
                            <label for="button">Button</label>
                            <input type="text" name="button" value="{{ $donation->button }}" class="form-control" id="button" placeholder="Enter Button Name">
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
                            <img id="image_preview" src="{{ asset('storage/uploads/' . $donation->image) }}" width="100%"
                                alt="">
                            <label for="upload_file">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="upload_file">
                                    <input type="hidden" name="old_image" value="{{ $donation->image }}">
                                    <label class="custom-file-label" for="upload_file">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block">Save</button>
                            <a href="{{ route('admin.donation') }}" class="btn btn-danger btn-block">Cancel</a>
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
                var fileName = $(this).val().split('\\').pop();
                $(this).closest('.custom-file').find('.custom-file-label').html(fileName);

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
