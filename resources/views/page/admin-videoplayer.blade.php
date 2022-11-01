@extends('layouts.app')

@section('title', 'Data Video')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="row pt-2">
                @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible show fade col-12">
                    <div class="alert-body">
                        <button class="close"
                            data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{session('error')}}
                    </div>
                </div>
                @endif
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-3">
                    <div class="d-flex justtify-content-center align-items-center">
                        <video class="m-auto" src="{{url('storage/'.$video ->link_video)}}" style="max-width: -webkit-fill-available; max-height: -webkit-fill-available; background-color: black;" controls></video>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="card card-primary">
                        <div class="card-header my-2">
                            <h4>{{$video->title}}</h4>
                        </div>
                        <div class="card-body">
                            {{ $video->description ? $video->description : '~no description~' }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>


    <!-- Page Specific JS File -->
    <script src="../../js/table.js"></script>
    <script src="../../js/akun.js"></script>
    <script src="{{ asset('js/page/modules-sweetalert.js') }}"></script>
@endpush

