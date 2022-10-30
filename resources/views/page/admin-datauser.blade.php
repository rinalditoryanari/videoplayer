@extends('layouts.app')

@section('title', 'Data User')

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
                <h1>Data User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
                    <div class="breadcrumb-item">Data User</div>
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
                                                <th scope="col">Nama</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user => $data)
                                        <tr>
                                            <td>{{ $user + $users->firstItem()}}</td>                                              
                                            <td>{{$data->name}}</td>
                                            <td>
                                                <span class="badge badge-info">{{$data->role}}</span>
                                            </td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->def_password}}</td>
                                            <td>
                                                <button class="btn btn-icon btn-warning m-1" id="editBtn" url="{{route('getEdit',['id' => $data['id']])}}" onclick="tolak_btn()"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-icon btn-danger m-1" id="deleteBtn" url="{{route('deleteUser')}}" ><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer row">
                                <div class="col-sm-12 col-md-5">
                                    <p> {{ $users->firstItem() }} of {{ $users->lastItem() }} from {{ $users->total() }} contents</p>
                                </div>
                                <div class="col-sm-12 col-md-5 pagination">
                                {{ $users->links("pagination::bootstrap-4")}}
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

