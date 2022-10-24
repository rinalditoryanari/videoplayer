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
            <div class="section-header">
                <h1>Data Video</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Video</div>
                </div>
            </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header my-2">
                                <h4>Tabel Preview</h4>
                            </div>
                            <div class="card-body">
                                @if(session()->has('error1'))
                                    <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                                        <div class="alert-icon"><i class="fas fa-exclamation"></i></div>
                                        <div class="alert-body">
                                            <div class="alert-title">Data Tidak Ditemukan</div>
                                            {{session('error1')}}
                                        </div>
                                        <button class="close" data-dismiss="alert">
                                            <i class="fas fa-times fa-lg"></i>
                                        </button>
                                    </div>
                                @endif
                                
                                <div class="table-responsive">
                                    <table class="table-hover table display nowrap" id="table" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Desc</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Video</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($videos as $video => $data)
                                        <tr>
                                            <td class="align-middle">{{ $video + $videos->firstItem()}}</td>                                              
                                            <td class="align-middle">
                                                <a href="{{route('playVideo',['id' => $data['id']])}}">{{$data['title']}}</a>
                                            </td>
                                            <td class="align-middle">{{$data['description']}}</td>
                                            <td class="align-middle">{{$data['category']}}</td>
                                            <td class="align-middle">
                                                <div class="chocolat-parent">
                                                    <a href="{{url('storage/'.$data['link_thumbnail'])}}"
                                                        class="chocolat-image"
                                                        title="{{$data['title']}}">
                                                        <div>
                                                            <img alt="image"
                                                                src="{{url('storage/'.$data['link_thumbnail'])}}"
                                                                class="img-fluid" style="height: 10em;">
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route('playVideo',['id' => $data['id']])}}">
                                                    <button class="btn btn-icon btn-success m-1" id="editBtn" ><i class="fas fa-play"></i></button>
                                                </a>
                                                <button class="btn btn-icon btn-warning m-1" id="editBtn" ><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-icon btn-danger m-1" id="deleteBtn" ><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer row">
                                <div class="col-sm-12 col-md-5">
                                    <p> {{ $videos->firstItem() }} of {{ $videos->lastItem() }} from {{ $videos->total() }} contents</p>
                                </div>
                                <div class="col-sm-12 col-md-5 pagination">
                                {{ $videos->links("pagination::bootstrap-4")}}
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

