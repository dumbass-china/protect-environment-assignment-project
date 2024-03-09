@extends('layouts.admin-app-master')
@section('title')
    Recentcauses Info
@endsection
@section('page_header')
@push('page_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Info Recentcauses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Recentcauses</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endpush
@section('content')
    <form action="{{ route('admin.recentcauses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Recentcauses List</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title"  value="{{ $recentcauses->title }}" class="form-control" id="title" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" name="subtitle" value="{{ $recentcauses->subtitle }}"  class="form-control" id="subtitle" placeholder="Enter Subtitle">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{ $recentcauses->description }}"  class="form-control" id="description" placeholder="Enter Description">
                        </div>

                        <div class="form-group">
                            <label for="boxtitle">Box Title</label>
                            <input type="text" name="boxtitle" value="{{ $recentcauses->boxtitle }}"  class="form-control" id="boxtitle" placeholder="Enter Boxtitle">
                        </div>


                        <div class="form-group">
                            <label for="boxdescription">Box-Description</label>
                            <input type="text" name="boxdescription" value="{{ $recentcauses->boxdescription }}"  class="form-control" id="boxdescription" placeholder="Enter Box-Description">
                        </div>

                        <div class="form-group">
                            <label for="goal">Goal</label>
                            <input type="text" name="goal"  value="{{ $recentcauses->goal }}" class="form-control" id="goal" placeholder="Enter Goal">
                        </div>

                        <div class="form-group">
                            <label for="raised">Raised</label>
                            <input type="text" name="raised"  value="{{ $recentcauses->raised }}" class="form-control" id="raised" placeholder="Enter Raised">
                        </div>

                        <div class="form-group">
                            <label for="percentage">Percentage</label>
                            <input type="text" name="percentage" value="{{ $recentcauses->percentage }}"  class="form-control" id="percentage" placeholder="Enter Percentage">
                        </div>

                        <div class="form-group">
                            <label for="button1">Button1</label>
                            <input type="text" name="button1" value="{{ $recentcauses->button1 }}"  class="form-control" id="button1" placeholder="Enter Button Name">
                      </div>

                        <div class="form-group">
                            <label for="button2">Button2</label>
                            <input type="text" name="button2" value="{{ $recentcauses->button2 }}"  class="form-control" id="button2" placeholder="Enter Button Name">
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
                            <img src="{{ asset('storage/uploads/' . $recentcauses->image) }}" width="100%" alt="">
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
