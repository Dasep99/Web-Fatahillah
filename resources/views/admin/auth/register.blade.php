@extends('admin.includes.default')
@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Register</h2>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Form Register</h4>
                        <a href="{{route('useradmin.index')}}" class="btn btn-warning btn-sm ml-auto"><i
                                class="fas fa-solid fas fa-rotate-right"></i>
                            Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="register" method="POST">
                        @csrf
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Registrasi Berhasil</strong>
                                {{ session('success') }}

                            </div>
                        @endif




                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    Please choose a username
                                </div>
                            @enderror
                            <input type="text" name="name"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                id="name" aria-describedby="emailHelp" required>
                            <div id="name" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
