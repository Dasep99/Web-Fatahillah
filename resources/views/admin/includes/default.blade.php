<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Web Informasi</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon" />



    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['../assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">




    <!-- Sumernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
</head>

<body>





    <div class="wrapper">
        <!-- Header -->
        @include('admin.includes.header')



        <!-- Sidebar -->
        @include('admin.includes.sidebar')



        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">

                @yield('content')

            </div>
            {{-- Footer --}}
            @include('admin.includes.footer')
        </div>

        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    @include('admin.includes.js')

    @include('sweetalert::alert')




</body>

</html>
