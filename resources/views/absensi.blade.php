<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title></title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}" />
      
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{asset('')}}assets/css/core/libs.min.css" />
      
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="{{asset('')}}assets/css/hope-ui.min.css?v=2.0.0" />
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{asset('')}}assets/css/custom.min.css?v=2.0.0" />
      
      <!-- Dark Css -->
      <link rel="stylesheet" href="{{asset('')}}assets/css/dark.min.css"/>
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{asset('')}}assets/css/customizer.min.css" />
      
      <!-- RTL Css -->
      <link rel="stylesheet" href="{{asset('')}}assets/css/rtl.min.css"/>

      <style>
         .text-maroon{
            color:maroon;
         }
      </style>
      
      
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
    
      <div class="wrapper">

      <section class="login-content">


         <div class="row d-flex m-0 align-items-center justify-content-center vh-100">            
            <div class="col-md-6 p-0">
               
               <div class="card shadow-lg d-flex justify-content-center mb-0">
                  <div class="card-body p-5">
                      @if (session()->has('success'))
                      <div class="row">
                         <div class="col-12">
                            <x-alert type="success">
                               {{session('success')}}
                            </x-alert>
                         </div>
                      </div>
                      @endif
                     @if (session()->has('error'))
                     <div class="row">
                        <div class="col-12">
                           <x-alert type="danger">
                              {{session('error')}}
                           </x-alert>
                        </div>
                     </div>
                     @endif


                     <a href="https://pis.sch.id/">
                        <div>
                           <img src="{{asset('assets/images/logo.png')}}" alt="" class="rounded avatar-80 mb-3">
                        </div>
                     </a>

                     <p class="text-success mb-5">Silahkan Masukkan Password Untuk Absensi.</p>


                     <form action="{{route('presence.store',$data)}}" method="post">
                        @csrf
                        
                        <input type="hidden" name="class_id" value="{{$data}}">
                       
                        <p id="alamat"></p>


                        <div class="row mb-4">
                           <div class="col-lg-12">
                              <div class="floating-label form-group">
                                 <label for="password" class="form-label">Password</label>
                                 <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="password" placeholder=" ">
                              </div>
                           </div>
                           @error('password')
                           <div class="col-lg-12">
                              <small class="text-danger">{{$message}}</small>
                           </div>
                           @enderror
                        </div>

                        {{-- jam Ke --}}
                        <div class="form-group mb-5">
                           <label for="" class="form-label d-block">Jam ke</label>
                           @foreach ($schedules as $item)
                           <div class="form-check form-check-inline me-4">
                              <input class="form-check-input" type="radio" name="schedule" id="flexRadioDefault1" value="{{$item->id}}">
                              <label class="form-check-label" for="flexRadioDefault1">
                                {{$item->jam_ke}}
                              </label>
                           </div>
                           @endforeach
                           @error('schedule')
                           <div class="col-lg-12">
                              <small class="text-danger">{{$message}}</small>
                           </div>
                           @enderror
                           
                        </div>

                        {{-- Jumlah jam --}}

                        <div class="form-group mb-4">
                           <label for="" class="form-label d-block">Jumlah Jam</label>
                           <div class="form-check form-check-inline me-4">
                              <input class="form-check-input" type="radio" name="jumlah_jam" id="flexRadioDefault1" value="1">
                              <label class="form-check-label" for="flexRadioDefault1">
                                1
                              </label>
                           </div>  

                           <div class="form-check form-check-inline me-4">
                              <input class="form-check-input" type="radio" name="jumlah_jam" id="flexRadioDefault1" value="2">
                              <label class="form-check-label" for="flexRadioDefault1">
                                2
                              </label>
                           </div>                           
                           <div class="form-check form-check-inline me-4">
                              <input class="form-check-input" type="radio" name="jumlah_jam" id="flexRadioDefault1" value="3">
                              <label class="form-check-label" for="flexRadioDefault1">
                                3
                              </label>
                           <div class="form-check form-check-inline me-4">
                              <input class="form-check-input" type="radio" name="jumlah_jam" id="flexRadioDefault1" value="4">
                              <label class="form-check-label" for="flexRadioDefault1">
                                4
                              </label>
                           </div>
                           
                        </div>
                        @error('jumlah_jam')
                           <div class="col-lg-12">
                              <small class="text-danger">{{$message}}</small>
                           </div>
                       @enderror
                        
                        
                        <!--latitudo-->
                          <div class="row">
                            <div class="col-6">
                                <input type="text" id="latitude-input" name="latitude"  class="form-control"  required>
                            </div>
                        
                            <!-- Tambahkan input untuk longitude -->
                            <div class="col-6">
                                <input type="text" id="longitude-input" name="longitude" class="form-control" required>
                            </div>
                        </div>

                        <div class="mt-4 d-grid">
                           <button type="submit" class="btn btn-outline-info rounded-pill">Absen Sekarang</button>

                        </div>
                     </form>



                  </div>
               </div>
               {{-- <div class="sign-bg">
                  <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                     <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"></rect>
                     <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"></rect>
                     <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"></rect>
                     <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"></rect>
                     </g>
                  </svg>
               </div> --}}
            </div>

         </div>
      </section>
      </div>
    
    <!-- Library Bundle Script -->
    <script src="{{asset('')}}assets/js/core/libs.min.js"></script>
    
    <!-- External Library Bundle Script -->
    <script src="{{asset('')}}assets/js/core/external.min.js"></script>
    
    <!-- Widgetchart Script -->
    <script src="{{asset('')}}assets/js/charts/widgetcharts.js"></script>
    
    <!-- mapchart Script -->
    <script src="{{asset('')}}assets/js/charts/vectore-chart.js"></script>
    <script src="{{asset('')}}assets/js/charts/dashboard.js" ></script>
    
    <!-- fslightbox Script -->
    <script src="{{asset('')}}assets/js/plugins/fslightbox.js"></script>
    
    <!-- Settings Script -->
    <script src="{{asset('')}}assets/js/plugins/setting.js"></script>
    
    <!-- Slider-tab Script -->
    <script src="{{asset('')}}assets/js/plugins/slider-tabs.js"></script>
    
    <!-- Form Wizard Script -->
    <script src="{{asset('')}}assets/js/plugins/form-wizard.js"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src="{{asset('')}}assets/js/hope-ui.js" defer></script>

    <script>
      if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(
            function(position) {
               var latitude = position.coords.latitude;
               var longitude = position.coords.longitude;

               // Mengisi nilai latitude dan longitude pada input
              document.getElementById('latitude-input').value = latitude;
                //   document.getElementById('latitude-input').value = 100000;
              document.getElementById('longitude-input').value = longitude;

        
             
            },
            function(error) {
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