@extends('layouts.app')

@section('title', 'Tambah Video')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Video</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Upload Video</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Post Your Video</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close"
                                                data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                            {{ $error }}
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                <form action="{{route('newVideo')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                class="form-control" name="title" id="title" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="category" id="category">
                                                <option>Tech</option>
                                                <option>News</option>
                                                <option>Political</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="desc" id="desc"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Upload</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="custom-file">
                                                <input type="file" name="video" class="custom-file-input" onchange="upVideo(this)" accept="video/*"/>
                                                <label id="label-video" class="custom-file-label" for="video">Choose File..</label>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <video id="preview-video" class="my-2" src=""
                                                style="max-width: -webkit-fill-available; max-height: 16em; background-color: black;" controls>
                                            </video>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" onchange="upImage(this)" accept="image/*"/>
                                                <label id="label-image" class="custom-file-label" for="video">Choose File..</label>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <img id="preview-image" class="my-2" src="" 
                                                style="max-width: -webkit-fill-available; max-height: 16em; background-color: black;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Create Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="../../js/edit-video.js"></script>
@endpush
