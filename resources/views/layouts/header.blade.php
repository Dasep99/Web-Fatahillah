<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div class="logo">

            <h1><a href="/home"> <img class="ms-1" src="{{ asset('assets/users/img/logo.png') }}" alt=""></a><a
                    class="m-2" href="/">SMP IT <span>FATAHILLAH</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Profil Sekolah</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/visi-misi">Visi Misi</a></li>

                        <li><a href="/ekstrakurikuler">Ekstrakurikuler</a></li>
                        <li><a href="/struktur">Struktur Organisasi</a></li>
                        <li><a href="/prestasi">Prestasi</a></li>
                        <li><a href="/fasilitas">Fasilitas</a></li>
                        <li><a href="/guru">Guru</a></li>
                        <li><a href="/siswa">Siswa</a></li>
                    </ul>

                </li>

                <li><a class="nav-link scrollto" href="/berita">Berita</a></li>
                <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/galeri">Galari Foto</a></li>
                        <li><a href="/video">Galeri Video</a></li>



                    </ul>

                </li>

                <li><a class="nav-link scrollto" href="{{ route('kontak.index') }}">Kontak</a></li>


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
