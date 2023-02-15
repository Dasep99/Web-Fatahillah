@extends('admin.includes.default')

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Carousel</h2>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Form Carousel</h4>
                        <a href="{{ route('carousel.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                class="fas fa-plus"></i> Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('carousel.update', $carousel->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" value="{{ $carousel->judul }}" name="judul"
                                required>

                        </div>

                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            <br>
                            <label for="gambar">Gambar Saat Ini</label> <br>
                            <img src="{{ asset('uploads/' . $carousel->gambar) }}" width="100" alt="">
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="" class="form-control">{{ $carousel->deskripsi }}</textarea>
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
