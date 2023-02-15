@extends('frontend')

@section('isicontent')
    <div class="blog-page area-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                    <div class="section-headline text-center">
                        <h2>Visi dan Misi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <section id="events" class="events">
                    <div class="container" data-aos="fade-up">

                        <div class="row">

                            @foreach ($tentang as $data)
                                <div class="col-md-6 d-flex align-items-stretch">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{ asset('uploads/' . $data->gambar_tentang) }}" alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="">{{ $data->judul }}</a></h5>

                                            <p class="card-text">{!! $data->deskripsi !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>

                    </div>
                </section>

            </div>
        </div>
    </div><!-- End Blog Page -->
@endsection
