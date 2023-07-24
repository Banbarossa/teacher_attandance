<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
        @if (session()->has('success'))
        Congratulations
        @else
        {{config('app.name','Pesantren Imam Syafii')}}
        @endif
    </title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/hope-ui.css')}}">
    <style>
        .thumbnail{
            height: 100px;
            width: 100px;
        }
        .title{
            font-size: 20pt;
            color: maroon;
            font-weight: 800;
            margin-top:50px;
        }
        .text-muted{
            color: rgb(83, 83, 83);
            font-size: 10pt;
        }
        .text-maroon{
            color: maroon;
        }
        .container{
            position: relative;
        }

        .container::before{
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background-repeat: none;
            backdrop-filter: ;
            background-size: 50%;
            /* background: url({{asset('assets/images/wp.png')}}); */
            
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center min-vh-100 align-items-center">
            <div class="col-12 col-lg-8 text-center {{session()->has('success') ? 'd-none' : ''}}">
                <img src="{{asset('assets/images/logo.png')}}" alt="" class="thumbnail">
                <h1 class="title">Absensi Pesantren Imam Syafii</h1>
                <p class="mt-4"> Anda admin ?</p>
                <a href="{{route('login')}}" class="btn btn-primary">Login di sini</a>
            </div>

            @if (session()->has('success'))
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body text-center">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" class="thumbnail mb-3">
                        <h1 class="mb-4 text-maroon">Congratulations!</h1>
                        <p>{{session('success')}}</p>
                        <small class="text-muted d-block">Silahkan beraktifitas!!</small>
                        <img src="{{asset('assets/images/yes.png')}}" class="img-fluid mt-4 thumbnail" alt="Congratulations Image">
                        {{-- <a href="#" class="btn btn-primary mt-4">Continue</a> --}}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{asset('assets/js/hope-ui.js')}}"></script>
</body>
</html>