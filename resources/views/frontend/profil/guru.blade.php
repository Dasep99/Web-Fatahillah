@extends('frontend')

@section('isicontent')
    <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                    <div class="section-headline text-center">
                        <h2>Guru SMPIT Fatahillah</h2>
                    </div>
                </div>
            </div>


            <div class="row awesome-project-content portfolio-container">

                <!-- portfolio-item start -->
                @foreach ($guru as $data)
                    <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app portfolio-item">
                        <div class="single-awesome-project">
                            <div class="awesome-img">
                                <a href="#"><img src="{{ asset('uploads/' . $data->gambar) }}" alt="" /></a>
                                <div class="add-actions text-center">
                                    <div class="project-dec">

                                        <h5>{{ $data->nama }}</h5>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- portfolio-item end -->


            </div>
            {{ $guru->links() }}
        </div>
    </div>
@endsection
