<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">

                <div class="info">
                    <a data-toggle="collapse" aria-expanded="true">
                        <span>
                            <h3>{{ auth()->user()->name }}</h3>
                            <span class="user-level">Administrator</span>

                        </span>
                    </a>
                    <div class="clearfix"></div>


                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="/adminHome" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>

                    </a>

                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('informasi.index') }}">
                        <i class="fas fa-desktop"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminprofil.index') }}">
                        <i class="fas fa-solid fa-user"></i>
                        <p>Profil Pelajar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Profile Sekolah</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('sambutans.index') }}">
                                    <span class="sub-item">Sambutan Kepala Sekolah</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admintentang.index') }}">
                                    <span class="sub-item">Visi Misi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('ekstrakurikuleradmin.index') }}">
                                    <span class="sub-item">Ekstrakurikuler</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('strukturadmin.index') }}">
                                    <span class="sub-item">Struktur Organisasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('prestasiadmin.index') }}">
                                    <span class="sub-item">Prestasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminfasilitas.index') }}">
                                    <span class="sub-item">Fasilitas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminguru.index') }}">
                                    <span class="sub-item">Guru</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('adminsiswa.index') }}">
                                    <span class="sub-item">Siswa</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Galeri</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('kegiatan.index') }}">
                                    <span class="sub-item">Foto</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('adminvideo.index') }}">
                                    <span class="sub-item">Video</span>
                                </a>
                            </li>
                            \
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('Pesan.index') }}">
                        <i class="fas fa-solid fa-folder"></i>
                        <p>Pesan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('carousel.index') }}">
                        <i class="fas fa-solid fa-image"></i>
                        <p>Carousel</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('file.index') }}">
                        <i class="fas fa-solid fa-folder"></i>
                        <p>File Dokument</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminkontak.index') }}">
                        <i class="fas fa-solid fa-address-book"></i>
                        <p>Kontak</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('useradmin.index')}}">
                        <i class="fas fa-solid fa-users"></i>
                        <p>Tambah Admin</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="logout"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-undo"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </div>
</div>
