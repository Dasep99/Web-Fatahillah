@extends('admin.includes.default')

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Kontak</h2>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Form Kontak</h4>
                        <a href="{{ route('adminkontak.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                class=""></i> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('adminkontak.update', $kontak->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" value="{{ $kontak->email }}" name="email" required>

                        </div>

                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" value="{{ $kontak->telepon }}" name="telepon"
                                required>

                        </div>



                        <div class="form-group">
                            <label for="deskripsi">Alamat</label>
                            <textarea name="alamat" id="" class="form-control">{{ $kontak->alamat }}</textarea>
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
