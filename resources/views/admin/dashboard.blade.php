@extends('layouts.template')
@section('content')


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="row row-cols-1">
           <div class="overflow-hidden d-slider1 ">
              <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                             <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Jumlah Hari Hadir</p>
                             {{-- <h4 class="counter">{{$presence->groupBy('tanggal')->count()}}</h4> --}}
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Total Jam</p>
                             {{-- <h4 class="counter">{{$presence->sum('jumlah_jam')}}</h4> --}}
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Total Terlambat</p>
                             {{-- <h4 class="counter">{{$presence->sum('terlambat')}} Menit</h4> --}}
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-04" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Revenue</p>
                             <h4 class="counter">$742K</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-05" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Net Income</p>
                             <h4 class="counter">$150K</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1200">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-06" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                             <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Today</p>
                             <h4 class="counter">$4600</h4>
                          </div>
                       </div>
                    </div>
                 </li>
                 <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1300">
                    <div class="card-body">
                       <div class="progress-widget">
                          <div id="circle-progress-07" class="text-center circle-progress-01 circle-progress circle-progress-primary" data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                             <svg class="card-slie-arrow icon-24 " width="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                             </svg>
                          </div>
                          <div class="progress-detail">
                             <p  class="mb-2">Members</p>
                             <h4 class="counter">11.2M</h4>
                          </div>
                       </div>
                    </div>
                 </li>
              </ul>
              <div class="swiper-button swiper-button-next"></div>
              <div class="swiper-button swiper-button-prev"></div>
           </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Dalam Proses Pengembangan</h3>
            </div>
            <div class="card-body">
               
            </div>
        </div>
    </div>
</div>




@endsection


