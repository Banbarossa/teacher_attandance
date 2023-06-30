@extends('layouts.template')
@section('content')

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
      <x-alert type="error">
         {{session('error')}}
      </x-alert>
   </div>
</div>
@endif


<div class="row">
    <div class="col-sm-12">
       <div class="card">
          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
                <h4 class="card-title">Pengaturan Jam Masuk</h4>
            </div>
            <a href="{{route('schedule.create')}}" class="btn btn-primary">Tambah Data</a>
          </div>
          <div class="card-body">
             <div class="table-responsive">

               <livewire:schedules-table/>
               
             </div>
          </div>
       </div>
    </div>
</div>
@endsection


