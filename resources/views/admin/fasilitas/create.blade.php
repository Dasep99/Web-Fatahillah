@extends('admin.includes.default')
@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Fasilitas</h2>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Form Fasilitas</h4>
                        <a href="{{ route('adminfasilitas.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                class=""></i> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('adminfasilitas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Fasilitas</label>
                            <input type="text" class="form-control" placeholder="Masukan Judul" name="nama" required>

                        </div>


                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea widht="100" name="deskripsi" class="form-control" id=""></textarea>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                            <button class="btn btn-danger btn-sm" type="submit">Reset</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
