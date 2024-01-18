@extends('layouts.admin-app-master')
@section('title')
    Banner Info
@endsection
@section('page_header')
@push('page_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Banners Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banners Info</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endpush
@section('content')
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" name="title" value="{{ $banner->title }}" class="form-control"
                                id="title" placeholder="Enter Banner Title">
                        </div>
                        <div class="form-group">
                            <label for="title"> Sub-Title</label>
                            <input type="text" name="subtitle" value="{{ $banner->subtitle }}" class="form-control"
                                id="subtitle" placeholder="Enter Sub Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Banner Description</label>
                            <input type="text" name="description" value="{{ $banner->description }}" class="form-control"
                                id="description" placeholder="Enter Banner description">
                        </div>
                        <div class="form-group">
                            <label for="description">Button Name</label>
                            <input type="text" name="button" value="{{ $banner->button }}" class="form-control"
                                id="button" placeholder="Enter Button Name">
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
                            <img src="{{ asset('storage/uploads/' . $banner->image) }}" width="100%" alt="">
                            {{--<label for="upload_file">File input</label>
                             <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="upload_file">
                                    <input type="hidden" name="old_image" value="{{ $banner->image }}">
                                    <label class="custom-file-label" for="upload_file">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->

                        {{-- <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block">Save</button>
                            <a href="{{ route('admin.banners') }}" class="btn btn-danger btn-block">Cancel</a>
                        </div> --}}

                    </div>
                </div>
            </div>
    </form>
@endsection
