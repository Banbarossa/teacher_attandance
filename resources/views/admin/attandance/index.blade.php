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
                <h4 class="card-title">Daftar tenaga Pengajar</h4>
            </div>
            <a href="{{route('teacher.create')}}" class="btn btn-primary">Tambah Rombel</a>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table id="datatable" class="table table-striped" data-toggle="data-table">
                   <thead>
                      <tr>
                         <th>No</th>
                         {{-- <th>ID</th> --}}
                         <th>Nama Guru</th>
                         <th>Kelas</th>
                         <th>jam Ke</th>
                         <th>Jumlah Jam</th>
                         <th>terlambat</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     @foreach ($data as $key => $item)
                     <tr>
                        <td>{{$key + 1}}</td>
                        {{-- <td>{{$item->id}}</td> --}}
                        <td>{{$item->teacher->nama}}</td>
                        <td>{{$item->rombel->nama_rombel}}</td>
                        <td>{{$item->schedule->jam_ke}}</td>
                        <td>{{$item->jumlah_jam}}</td>
                        <td>{{$item->terlambat}} Menit</td>
                        <td>
                           <a href="{{route('teacher.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                           <form action="{{route('teacher.destroy',$item->id)}}" method="post" class="d-inline">
                              @method('delete')
                              @csrf
                              <button type="submit" class="btn btn-danger" onclick="return confirm('apakah yakin dihapus?')">Hapus</button>
                           </form>
                        </td>

                     </tr>
                     @endforeach
                   </tbody>
                </table>
             </div>
          </div>
       </div>
    </div>
</div>
@endsection


