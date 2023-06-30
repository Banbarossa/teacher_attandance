@extends('layouts.template')
@section('content')

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


