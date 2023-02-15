@extends('admin.includes.default')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Detail Struktur Organisasi</h4>


                    <a href="{{ route('strukturadmin.index') }}" class="btn btn-warning btn-sm ml-auto"><i class=""></i>
                        Back</a>

                </div>
            </div>
            <div class="card-body">

                <main id="main">

                    <!-- ======= Blog Page ======= -->
                    <div class="blog-page area-padding">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="single-blog">
                                                <div class="single-blog-img">

                                                    <img width="600" class="mt-3 mb-2"
                                                        src="{{ asset('uploads/' . $struktur->gambar_struktur) }}"
                                                        alt="">

                                                </div>
                                                <div class="blog-meta">



                                                </div>
                                                <div class="blog-text">
                                                    <h4>
                                                        {{ $struktur->judul }}
                                                    </h4>
                                                    <hr>
                                                    <p>
                                                        {!! $struktur->deskripsi !!}
                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- End single blog -->

                                    </div>
                                </div>



                                <!-- Start single blog -->

                            </div>
                        </div>
                    </div><!-- End Blog Page -->

                </main><!-- End #main -->
            </div>
        </div>
    </div>
@endsection
