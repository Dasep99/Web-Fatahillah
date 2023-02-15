@extends('frontend')
@section('isicontent')
    <!-- ======= carousel ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">


                    @foreach ($carousel as $data)
                        <div class="carousel-item active"
                            style="background-image: url({{ asset('uploads/' . $data->gambar) }})">
                            <div class="carousel-container">
                                <div class="container">
                                    <h2 class="animate__animated animate__fadeInDown">{{ $data->judul }} </h2>
                                    <p class="animate__animated animate__fadeInUp">{!!  $data->deskripsi !!} </p>
                                    <a href="#about"
                                        class="btn-get-started scrollto animate__animated animate__fadeInUp">Selamat
                                        Datang</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section>

    <!-- carousel -->

    <main id="main">

        <!-- ======= selamat datang ======= -->

        <div id="about" class="about-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Selamat Datang</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single-well start-->
                    @foreach ($sambutan as $data)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="well-left">
                                <div class="single-well">

                                    <img height="20" src="{{ asset('uploads/' . $data->gambar_sambutan) }}"
                                        alt="">

                                </div>
                            </div>
                        </div>
                        <!-- single-well end-->

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="well-middle">
                                <div class="single-well">
                                    <a href="#">
                                        <h4 class="sec-head">{{ $data->judul }}</h4>
                                    </a>
                                    <p>
                                        {!! $data->deskripsi = Str::of($data->deskripsi)->substr(0, 1000) !!}


                                        <br>
                                        <span class="">
                                            <b><a style="color: black" href="{{ route('detail-sambutan', $data->id) }}">
                                                    Baca Selengkapnya..</a></b> </span>




                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End col-->
                </div>
            </div>
        </div>

        <!-- selamat datang -->

        <!-- ======= Profil pelajar ======= -->

        <div id="services" class="services-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline services-head text-center">
                            <h2>Profil Pelajar</h2>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <!-- Start Left services -->
                    @foreach ($profil as $data)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="about-move">
                                <div class="services-details">
                                    <div class="single-services">
                                        <a class="services-icon">
                                            <i class="bi bi-briefcase"></i>
                                        </a>

                                        <h4>{{ $data->judul }}</h4>
                                        <p>
                                            {{ $data->deskripsi }}
                                        </p>


                                    </div>
                                </div>
                                <!-- end about-details -->
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </main>
    <!-- Profil pelajar -->

    <!--  -->
    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Berita Terbaru</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach ($informasi as $data)
                        <div class="col-md-4 col-sm-4 col-xs-12 border-1">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="{{ route('detail-informasi', $data->id) }}">
                                        <img class="mt-3" src="{{ asset('uploads/' . $data->gambar_informasi) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">

                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>{{ $data->date }}
                                    </span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="{{ route('detail-informasi', $data->id) }}">{{ $data->judul }}</a>
                                    </h4>
                                    <p>
                                       {!! $data->deskripsi = Str::of($data->deskripsi)->substr(0, 150) !!}
                                    </p>
                                </div>
                                <span class="">
                                    <a href="{{ route('detail-informasi', $data->id) }}" class="ready-btn">Lihat Berita</a>
                                </span>

                            </div>
                            <!-- Start single blog -->
                        </div>
                    @endforeach


                    <!-- informasi-->
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi -->

    <!-- ======= Galeri ======= -->

    <div id="blog" class="blog-area">
        <div class="blog-inner area-padding">
            <div class="blog-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Galeri Kegiatan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Left Blog -->
                    @foreach ($kegiatan as $data)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="single-blog">
                                <div class="single-blog-img">
                                    <a href="{{ route('detail-kegiatan', $data->id) }}">
                                        <img class="mt-3" src="{{ asset('uploads/' . $data->gambar_informasi) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="blog-meta">

                                    <span class="date-type">
                                        <i class="fa fa-calendar"></i>{{ $data->date }}
                                    </span>
                                </div>
                                <div class="blog-text">
                                    <h4>
                                        <a href="{{ route('detail-kegiatan', $data->id) }}">{{ $data->judul }}</a>
                                    </h4>
                                    <!-- <p>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </p> -->

                                </div>
                                <span class="">
                                    <a href="{{ route('detail-kegiatan', $data->id) }}" class="ready-btn">Lihat Kegiatan</a>
                                </span>

                            </div>
                            <!-- Start single blog -->
                        </div>
                    @endforeach
                    <!-- End Left Blog-->

                    <!-- End Right Blog-->
                </div>
            </div>
        </div>
    </div>
@endsection
