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

@push('mystyle')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @livewireStyles
@endpush

@push('myscript')
    @livewireScripts
@endpush


@if (request()->routeIs('report.bulanan'))
<livewire:report-bulanan/>
@endif


@if (request()->routeIs('report.harian'))
<livewire:report-harian/>
@endif


@if (request()->routeIs('report.summary'))
<livewire:report-summary/>
@endif


@endsection


