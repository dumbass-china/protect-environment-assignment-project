@extends('layouts.admin-app-master')
@section('title')
    Achievements Info
@endsection
@section('page_header')
@push('page_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Info Achievements</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Achievements List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endpush
@section('content')
    <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Achievements Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                value="{{ $achievements->title }}" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                value="{{ $achievements->description }}" placeholder="Enter Description">
                        </div>
                        <div class="form-group">
                            <label for="boxtitle">Box-Title</label>
                            <input type="text" name="boxtitle" class="form-control" id="boxtitle"
                                value="{{ $achievements->boxtitle }}" placeholder="Enter Box-Title">
                        </div>

                        <div class="form-group">
                            <label for="boxsubtitle">Box-Subtitle</label>
                            <input type="text" name="boxsubtitle" class="form-control" id="boxsubtitle"
                                value="{{ $achievements->boxsubtitle }}" placeholder="Enter Box-Subtitle">
                        </div>
                        <div class="form-group">
                            <label for="button1">Button</label>
                            <input type="text" name="button" class="form-control" id="button"
                                value="{{ $achievements->button }}" placeholder="Enter Button Name">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" name="icon" class="form-control" id="icon"
                                value="{{ $achievements->icon }}" placeholder="Enter icon">
                        </div>
                    </div>

                    <!-- /.card-body -->

                </div>

            </div>

    </form>
@endsection
