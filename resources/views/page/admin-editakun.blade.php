@extends('layouts.app')

@section('title', 'Edit Akun')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Akun</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Akun</div>
                </div>
            </div>
            <pre>
                {{var_export($users)}}
            </pre>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="POST" action="{{route('editUser', ['id' => $users->id])}}">
                                <div class="card-header">
                                    <h4>Input Text</h4>
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
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="name">Name</label>
                                            <input id="name"
                                                type="text"
                                                class="form-control"
                                                name="name"
                                                value="{{$users->name}}"
                                                autofocus required>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Role</label>
                                            <div class="selectgroup selectgroup-pills">
                                                <label class="selectgroup-item">
                                                    <input type="radio"
                                                        name="role"
                                                        value="Admin"
                                                        class="selectgroup-input"
                                                        {{ ($users->role=="Admin")? "checked" : "" }}>
                                                    <span class="selectgroup-button selectgroup-button-icon"><i
                                                            class="fas fa-sun"></i> Admin</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio"
                                                        name="role"
                                                        value="User"
                                                        class="selectgroup-input"
                                                        {{ ($users->role=="User")? "checked" : "" }}>
                                                    <span class="selectgroup-button selectgroup-button-icon"><i
                                                            class="fas fa-moon"></i> User</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <input id="email"
                                                type="email"
                                                class="form-control"
                                                name="email" 
                                                value="{{$users->email}}"
                                                required>
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password"
                                                class="d-block">Password</label>
                                            <input id="password"
                                                type="text"
                                                class="form-control pwstrength"
                                                data-indicator="pwindicator"
                                                name="password" 
                                                value="{{$users->def_password}}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group text-right">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg">
                                            Edit Akun
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
