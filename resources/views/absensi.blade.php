<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/rtl.min.css" />

    <style>
        .text-maroon {
            color: maroon;
        }

    </style>


</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper px-2">

        <section class="login-content">


            <div class="row d-flex m-0 align-items-center justify-content-center vh-100">
                <div class="col-md-6 p-0">

                    <div class="card shadow-lg d-flex justify-content-center mb-0">
                        <div class="card-body py-5">
                            @if(session()->has('success'))
                                <div class="row">
                                    <div class="col-12">
                                        <x-alert type="success">
                                            {{ session('success') }}
                                        </x-alert>
                                    </div>
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="row">
                                    <div class="col-12">
                                        <x-alert type="danger">
                                            {{ session('error') }}
                                        </x-alert>
                                    </div>
                                </div>
                            @endif                       
                        


                            <a href="https://pis.sch.id/">
                                <div class="d-flex align-items-center gap-4">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt=""
                                        class="rounded avatar-80 mb-3">
                                        <h1 class="text-success">Absen</h1>
                                </div>
                            </a>

                            <!--<p class="text-success mb-5">Silahkan Masukkan Password Untuk Absensi.</p>-->
                            <p class="text-danger mb-5">Jangan Lupa mengaktifkan GPS pada perangkat anda</p>
                            <hr/>


                            <form action="{{ route('presence.store',$data) }}" method="post">
                                @csrf

                                <input type="hidden" name="class_id" value="{{ $data }}">

                                <p id="alamat"></p>


                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="floating-label form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" aria-describedby="password" placeholder=" ">
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="col-lg-12">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                                {{-- jam Ke --}}

                                @php
                                use Carbon\Carbon;
                                $today = Carbon::now();
                                $current_time = now()->format('H:i');
                                @endphp



                                @if ($today->isMonday())
                                    @include('isMonday')
                                @elseif ($today->isFriday())
                                    @include('isFriday')
                                @else
                                    @include('elseDay')
                                    
                                @endif
                               




                                    <!--latitudo-->
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="hidden" id="latitude-input" name="latitude" class="form-control"
                                                required>
                                        </div>

                                        <!-- Tambahkan input untuk longitude -->
                                        <div class="col-6">
                                            <input type="hidden" id="longitude-input" name="longitude"
                                                class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="mt-4 d-grid">
                                        <button type="submit" class="btn btn-outline-info rounded-pill">Absen
                                            Sekarang</button>
                                    </div>

                            </form>
                        
                        </div>



                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>

    <!-- Library Bundle Script -->
    <script src="{{ asset('') }}assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('') }}assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="{{ asset('') }}assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="{{ asset('') }}assets/js/charts/vectore-chart.js"></script>
    <script src="{{ asset('') }}assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="{{ asset('') }}assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="{{ asset('') }}assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="{{ asset('') }}assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="{{ asset('') }}assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="{{ asset('') }}assets/js/hope-ui.js" defer></script>

    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Mengisi nilai latitude dan longitude pada input
                    document.getElementById('latitude-input').value = latitude;
                    //   document.getElementById('latitude-input').value = 100000;
                    document.getElementById('longitude-input').value = longitude;



                },
                function (error) {
                    alert('Gagal mendapatkan koordinat: ' + error.message);


                }
            );
        } else {
            alert('Geolocation tidak didukung oleh browser ini.')
        }



        // Fungsi untuk mendapatkan alamat IP router Wi-Fi

    </script>

</body>

</html>
