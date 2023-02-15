@extends('admin.includes.default')

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Video</h2>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Video</h4>
                        <a href="{{ route('adminvideo.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                class="fas fa-plus"></i> Tambah Video</a>


                    </div>
                </div>
                <div class="card-body">


                    <!-- Tabel -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="add-row" class="display table table-striped table-hover dataTable"
                                        role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width:5px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">No</th>
                                                <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Judul</th>



                                                <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Gambar</th>
                                                <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Aksi</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                                $no = 1;
                                            @endphp

                                            @forelse ($video as $index => $row)
                                                <tr role="row" class="odd">

                                                    <td>{{ $index + $video->firstItem() }}</td>
                                                    <td>{{ $row->judul }}</td>

                                                    <td><img src="{{ asset('uploads/' . $row->gambar_video) }}"
                                                            width="50" alt=""></td>

                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ route('detail-video-admin', $row->id) }}"
                                                                class="btn btn-primary btn-sm mt-2 mr-2">Lihat</a>

                                                            <a href="{{ route('adminvideo.edit', $row->id) }}"
                                                                class="btn btn-warning btn-sm mt-2">Edit</a>
                                                            <form action="{{ route('adminvideo.destroy', $row->id) }}"
                                                                method="POST"
                                                                class="
                                                            d-inline">
                                                                @csrf
                                                                @method('delete')
                                                                <button
                                                                    wire:click.prevent='deleteConfirmation({
                                                                        $row->id
                                                                    })'
                                                                    class="btn btn-danger btn-sm mt-2 ml-2">
                                                                    Hapus
                                                                </button>


                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Data Masih Kosong</td>
                                                </tr>
                                            @endforelse





                                        </tbody>
                                    </table>
                                    {{ $video->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
