@extends('admin.includes.default')

@section('content')
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Data Pesan Sekolah</h2>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Pesan</h4>



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
                                                    aria-label="Action: activate to sort column ascending">Nama</th>

                                                <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">No Telepon</th>

                                                <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Subject</th>
                                                <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Pesan</th>
                                                <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Tanggal</th>

                                                <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Aksi</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                                $no = 1;
                                            @endphp

                                            @forelse ($pesan as $index => $row)
                                                <tr role="row" class="odd">

                                                    <td>{{ $index + $pesan->firstItem() }}</td>
                                                    <td>{{ $row->nama }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->subject }}</td>
                                                    <td>{{ $data = Str::of($row->deskripsi)->substr(0, 50) }}
                                                    </td>
                                                    <td>{{ $row->created_at }}</td>

                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{ route('detail-pesan-admin', $row->id) }}"
                                                                class="btn btn-primary btn-sm mt-2 mr-2">Lihat</a>

                                                            <form action="{{ route('Pesan.destroy', $row->id) }}"
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
                                    {{ $pesan->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
