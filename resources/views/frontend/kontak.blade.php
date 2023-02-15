@extends('frontend')
@section('isicontent')
    <br>
    <br>


    <div class="container">
        <div class="row">
            <section id="contact" class="contact mt-5">
                <div data-aos="fade-up">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.66731668466207!2d108.54563877479936!3d-6.686864499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee3b5adcae1b9%3A0x71f7451035b0aba0!2sSDIT%20Fatahillah%20Cirebon!5e0!3m2!1sid!2sid!4v1673237628258!5m2!1sid!2sid"
                        width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

                <div class="container" data-aos="fade-up">

                    <div class="row mt-5">

                        @foreach ($kontak as $data)
                            <div class="col-lg-4">
                                <div class="info">
                                    <div class="address">
                                        <i class="bi bi-geo-alt"></i>
                                        <h4>Lokasi:</h4>
                                        <p>{{ $data->alamat }}</p>
                                    </div>

                                    <div class="email">
                                        <i class="bi bi-envelope"></i>
                                        <h4>Email:</h4>
                                        <p>{{ $data->email }}</p>
                                    </div>

                                    <div class="phone">
                                        <i class="bi bi-phone"></i>
                                        <h4>Telepon:</h4>
                                        <p>{{ $data->telepon }}</p>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                        <div class="col-lg-8 mt-5 mt-lg-0">

                            <form action="{{ route('kontak.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="nama" class="form-control" id="name"
                                            placeholder="Nama" required>
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0">
                                        <input type="text" class="form-control" name="email" id=""
                                            placeholder="No Telepon" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="deskripsi" rows="5" placeholder="Pesan.." required></textarea>
                                </div>


                                <div class="text-center mt-3 "><button class="btn btn-info" type="submit">Kirim
                                        Pesan</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </section>
        </div>
    </div>
    <br>
    <br>
@endsection
