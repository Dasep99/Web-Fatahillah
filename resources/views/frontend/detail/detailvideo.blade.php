@extends('frontend')

@section('isicontent')


        <!-- ======= Blog Page ======= -->
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="style.css">
            <title>Bootstrap demo</title>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        </head>
        <body>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
           <div class="row">

               <div  class="embed-responsive embed-responsive-16by9">
                   <video class="embed-responsive-item" src="{{ asset('uploads/' . $video->video) }}" controls autoplay></video>
               </div>
               <div class="blog-meta">
                                        <span class="date-type">
                                            <i class="bi bi-calendar"></i>{{ $video->created_at }}
                                        </span>
                   <hr>
                   <h4>
                       {{ $video->judul }}
                   </h4>
                   <p>
                       {!! $video->deskripsi !!}
                   </p>
               </div>

           </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </body>
        </html>
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="embed-responsive embed-responsive-16by9">--}}
{{--                        <video controls class="embed-responsive-item">--}}
{{--                            <source src="{{ asset('uploads/' . $video->video) }}" type="video/mp4">--}}
{{--                        </video>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-8 col-sm-8 col-xs-12">--}}
{{--                        <div class="row">--}}

{{--                            <div class="col-md-12 col-sm-12 col-xs-12">--}}
{{--                                <div class="single-blog">--}}

{{--                                    <div class="single-blog-img">--}}


{{--                                    </div>--}}
{{--                                    <div class="blog-meta">--}}

{{--                                        <span class="date-type">--}}
{{--                                            <i class="bi bi-calendar"></i>{{ $video->created_at }}--}}
{{--                                        </span>--}}
{{--                                        <hr>--}}
{{--                                    </div>--}}
{{--                                    <div class="blog-text">--}}
{{--                                        <h4>--}}
{{--                                            {{ $video->judul }}--}}
{{--                                        </h4>--}}
{{--                                        <p>--}}
{{--                                            {!! $video->deskripsi !!}--}}
{{--                                        </p>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- End single blog -->--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-4 col-md-4 mt-2">--}}
{{--                        <div class="page-head-blog">--}}
{{--                            <div class="single-blog-page">--}}
{{--                                <!-- recent start -->--}}
{{--                                <div class="left-blog">--}}
{{--                                    <h4>Informasi Terbaru</h4>--}}
{{--                                    <div class="recent-post">--}}
{{--                                        <!-- start single post -->--}}
{{--                                        @foreach ($videoterbaru as $data)--}}
{{--                                            <div class="recent-single-post">--}}
{{--                                                <div class="post-img">--}}
{{--                                                    <a href="#">--}}
{{--                                                        <img src="{{ asset('uploads/' . $data->gambar_video) }}"--}}
{{--                                                             alt="">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="pst-content mt-2">--}}
{{--                                                    <p><a href="{{ route('detail-video', $data->id) }}">--}}
{{--                                                            {{ $data->judul }} </a>--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                        <!-- End single post -->--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- recent end -->--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Start single blog -->--}}

{{--                </div>--}}
{{--            </div>--}}
        <!-- End Blog Page -->


@endsection
