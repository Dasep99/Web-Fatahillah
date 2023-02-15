@extends('frontend')

@section('isicontent')
    <main id="main" data-aos="fade-in">
        <br>
        <br>
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                    <div class="section-headline text-center">
                        <h2>Galeri Kegiatan</h2>
                    </div>
                </div>
            </div>
            <section id="courses" class="courses">
                <div class="container" data-aos="fade-up">

                    <div class="row" data-aos="zoom-in" data-aos-delay="100">

                        @foreach ($kegiatan as $data)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 mb-2">
                                <div class="course-item">
                                    <img src="{{ asset('uploads/' . $data->gambar_informasi) }}" class="img-fluid"
                                        alt="...">
                                    <div class="course-content">
                                        <h3><a href="{{ route('detail-kegiatan', $data->id) }}">{{ $data->judul }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>

                </div>
            </section><!-- End Courses Section -->
            {{ $kegiatan->links() }}
            <br>
        </div>

    </main>
@endsection
