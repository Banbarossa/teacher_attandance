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
                           <label for="hari" class="form-label">Hari</label>
                           <input type="text" class="form-control @error('hari') is-invalid @enderror" name="hari" id="hari" aria-describedby="helpId" placeholder="hari" value="{{old('hari',$data['schedule']->hari)}}">
                              @error('hari')
                              <div class="invalid-feedback">
                                 {{$message}}
                              </div>
                              @enderror
                        </div>




                        <div class="mb-3">
                           <label for="jam_ke" class="form-label">Jam Ke</label>
                           <select class="form-select @error('jam_ke') is-invalid @enderror" name="jam_ke" id="jam_ke" value="{{old('jam_ke',$data['schedule']->jam_ke)}}">
                               <option value="">Jam Ke</option>
                               <option value="1" {{$data['schedule']->jam_ke == '1' ? 'selected' :''}}>1</option>
                               <option value="2" {{$data['schedule']->jam_ke == '2' ? 'selected' :''}}>2</option>
                               <option value="3" {{$data['schedule']->jam_ke == '3' ? 'selected' :''}}>3</option>
                               <option value="4" {{$data['schedule']->jam_ke == '4' ? 'selected' :''}}>4</option>
                               <option value="5" {{$data['schedule']->jam_ke == '5' ? 'selected' :''}}>5</option>
                               <option value="6" {{$data['schedule']->jam_ke == '6' ? 'selected' :''}}>6</option>
                               <option value="7" {{$data['schedule']->jam_ke == '7' ? 'selected' :''}}>7</option>
                               <option value="8" {{$data['schedule']->jam_ke == '8' ? 'selected' :''}}>8</option>
                               <option value="9" {{$data['schedule']->jam_ke == '9' ? 'selected' :''}}>9</option>
                           </select>
                                 @error('jam_ke')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                         </div>

                          <div class="mb-3">
                              <label for="jam_masuk" class="form-label">jam Masuk</label>
                              <input type="time" class="form-control @error('jam_masuk') is-invalid @enderror" name="jam_masuk" id="jam_masuk" aria-describedby="helpId" placeholder="Jam masuk" value="{{old('jam_masuk',$data['schedule']->jam_masuk)}}">
                                 @error('jam_masuk')
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