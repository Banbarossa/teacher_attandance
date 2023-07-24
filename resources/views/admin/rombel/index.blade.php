@extends('layouts.template')
@section('content')

@push('mystyle')
    @livewireStyles
@endpush
@push('myscript')
    @livewireScripts
@endpush

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
                <h4 class="card-title">Data Rombel</h4>
            </div>
            <a href="{{route('rombel.create')}}" class="btn btn-primary">Tambah Rombel</a>
          </div>
          <div class="card-body">
             <div>

               <livewire:rombel-table/>

               
             </div>
          </div>
       </div>
    </div>
</div>
@endsection


