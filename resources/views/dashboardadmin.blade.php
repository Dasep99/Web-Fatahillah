@extends('admin.includes.default')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">SELAMAT DATANG DI SISTEM INFORMASI SMP IT FATAHILLAH</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    {{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">User</p>
                                    <h4 class="card-title">{{$user}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="far fa-newspaper"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Berita</p>
                                    <h4 class="card-title">{{$informasi}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-tags"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Galeri</p>
                                    <h4 class="card-title">{{$kegiatan}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="fas fa-file-video"></i>

                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Video</p>
                                    <h4 class="card-title">{{$video}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="card full-height">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="card-head-row">--}}
{{--                            <div class="card-title">Kegiatan Video</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="card full-height">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="card-head-row">--}}
{{--                            <div class="card-title">Foto Kegiatan</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="card full-height">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="card-head-row">--}}
{{--                            <div class="card-title">File Dokumen</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}


{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Berita Terbaru</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                @php
                                    $no = 1;
                                @endphp
                                <thead>
                                <tr>

                                    <th scope="col">Nama Berita</th>
                                    <th scope="col">Gambar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($informasiterbaru as $index => $data)
                                <tr>

                                    <td>  {{ $data->judul }}</td>
                                    <td><img src="{{ asset('uploads/' . $data->gambar_informasi) }}"
                                             width="50" alt=""></td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
