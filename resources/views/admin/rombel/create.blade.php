@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-sm-12">
       <div class="card">
          <div class="card-header d-flex justify-content-between">
             <div class="header-title">
               @if ($data['method'] == 'put')
               <h4 class="card-title">Edit Data</h4>
               @else
               <h4 class="card-title">Tambah Data</h4>
               @endif
             </div>
          </div>
          <div class="card-body">
             <div class="row">
                <div class="col-8">
                    <form action="{{$data['route']}}" method="post">
                        @if ($data['method'] == 'put')
                        @method('put')
                        @endif
                        @csrf


                        <div class="mb-3">
                          <label for="nama_rombel" class="form-label">Name</label>
                          <input type="text" class="form-control @error('nama_rombel') is-invalid @enderror" name="nama_rombel" id="nama_rombel" aria-describedby="helpId" placeholder="Nama Rombel" value="{{old('nama_rombel',$data['rombel']->nama_rombel)}}">
                           @error('nama_rombel')
                           <div class="invalid-feedback">
                              {{$message}}
                           </div>
                           @enderror
                        </div>


                        <div class="mb-3">
                           <label for="tingkat_kelas" class="form-label">Tingkat kelas</label>
                           <select class="form-select @error('tingkat_kelas') is-invalid @enderror" name="tingkat_kelas" id="tingkat_kelas" value="{{old('tingkat_kelas',$data['rombel']->tingkat_kelas)}}">
                               <option value="">Pilih tingkat kelas</option>
                               <option value="7" {{$data['rombel']->tingkat_kelas == '7' ? 'selected' :''}}>7</option>
                               <option value="8" {{$data['rombel']->tingkat_kelas == '8' ? 'selected' :''}}>8</option>
                               <option value="9" {{$data['rombel']->tingkat_kelas == '9' ? 'selected' :''}}>9</option>
                               <option value="10" {{$data['rombel']->tingkat_kelas == '10' ? 'selected' :''}}>10</option>
                               <option value="11" {{$data['rombel']->tingkat_kelas == '11' ? 'selected' :''}}>11</option>
                               <option value="12" {{$data['rombel']->tingkat_kelas == '12' ? 'selected' :''}}>12</option>
                           </select>
                                 @error('tingkat_kelas')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                         </div>



                        <div class="mb-3">
                          <label for="jenjang" class="form-label">Jenjang</label>
                          <select class="form-select @error('jenjang') is-invalid @enderror" name="jenjang" id="jenjang" value="{{old('jenjang')}}">
                              <option value="">Pilih Jenjang</option>
                              <option value="SMP" {{$data['rombel']->jenjang == 'SMP' ? 'selected' :''}}>SMP</option>
                              <option value="MA" {{$data['rombel']->jenjang == 'MA' ? 'selected' : ''}}>MA</option>
                          </select>
                                @error('jenjang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>


                        <div class="mt-4">
                           <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>

                    </form>
                </div>





                
             </div>
          </div>
       </div>
    </div>
</div>
@endsection


s