@extends('layouts.template')
@section('content')


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="row row-cols-1">
            <div class="overflow-hidden d-slider1 ">
                <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">

                    <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                        <div class="card-body">
                            <div class="progress-widget">
                                <div id="circle-progress-01"
                                    class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                    data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                                    <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                    </svg>
                                </div>
                                <div class="progress-detail">
                                    <p class="mb-2">Total Guru</p>
                                    <h4 class="counter">{{ $teachers->count() }}
                                        Orang</h4>

                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                        <div class="card-body">
                            <div class="progress-widget">
                                <div id="circle-progress-02"
                                    class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                    data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                                    <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                    </svg>
                                </div>
                                <div class="progress-detail">
                                    <p class="mb-2">Total Kelas</p>
                                    <h4 class="counter">{{ $rombels->count() }}
                                        Kelas</h4>
                                    {{-- <h4 class="counter">{{$presence->sum('terlambat') }}
                                    Menit</h4> --}}
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-primary">Absensi KBM Pesantren Imam Syafi'i</h3>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>




@endsection
