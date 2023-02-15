@extends('frontend')

@section('isicontent')
    <main id="main">

        <!-- ======= Blog Page ======= -->

        <div class="blog-page area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                        <div class="section-headline text-center">
                            <h2>Ekstrakurikulker</h2>
                        </div>
                    </div>
                </div>
                <div class="container">

                    <div class="row">

                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="row">

                                @foreach ($ekstrakurikuler as $data)
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="single-blog">
                                            <div class="single-blog-img">
                                                <a href="blog-details.html">
                                                    <img class="mt-3" src="" alt="">
                                                </a>
                                            </div>
                                            <h4>
                                                {{ $data->judul }}
                                            </h4>
                                            <hr>

                                            <div class="blog-text">

                                                <p>
                                                    {!! $data->deskripsi !!}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                <!-- End single blog -->

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 mt-2">
                            <div class="page-head-blog">
                                <div class="single-blog-page">
                                    <!-- recent start -->
                                    <div class="left-blog">
                                        <h4>Informasi Terbaru</h4>
                                        <div class="recent-post">
                                            <!-- start single post -->
                                            @foreach ($informasiterbaru as $data)
                                                <div class="recent-single-post">
                                                    <div class="post-img">
                                                        <a href="#">
                                                            <img src="{{ asset('uploads/' . $data->gambar_informasi) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="pst-content mt-2">
                                                        <p><a href="{{ route('detail-informasi', $data->id) }}">
                                                                {{ $data->judul }} </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- End single post -->

                                        </div>
                                    </div>
                                    <!-- recent end -->
                                </div>


                            </div>
                        </div>

                        <!-- Start single blog -->

                    </div>
                </div>
            </div><!-- End Blog Page -->

    </main><!-- End #main -->
@endsection
