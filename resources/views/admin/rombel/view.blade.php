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


    <style>
        .text-maroon {
            color: maroon;
        }
    
    ul{
        list-style: none;
    }
    .image {
        height:50pt;
        width: 50pt;
    }
    </style>


</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <div class="wrapper container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                       
                    </div>
                    <div class="card-body">
                
                       
                        <div class="mt-4">
                            <h5 class="text-center mb-5">Scan untuk <strong>absen</strong></h5>

                            <div class="visible-print text-center">
                                {!! QrCode::format('svg')->size(250)->generate(URL::to('/absen').'/'.$data->id); !!}
                            </div>

                        </div>
                        <h5 class="mt-5 text-center">Informasi Rombel</h5>
                        <div class="d-flex justify-content-center">
                            <ul class="text-center mt-3">
                                <li>Jenjang : {{$data->jenjang}}</li>
                                <li>Tingkat Kelas : {{$data->tingkat_kelas}}</li>
                                <li>Nama Rombel : {{$data->nama_rombel}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- App Script -->
    <script src="{{ asset('') }}assets/js/hope-ui.js" defer></script>

</body>

</html>
