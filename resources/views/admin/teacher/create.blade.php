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
                           <label for="nama" class="form-label">Nama Asatizah</label>
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama guru" value="{{old('nama',$data['teacher']->nama)}}">
                            @error('nama')
                            <div class="invalid-feedback">
                               {{$message}}
                            </div>
                            @enderror
                        </div>


                        @if ($data['method'] == 'put')
                        <div class="mb-3">
                           <label for="peg_id" class="form-label">Password</label>
                           <input type="text" class="form-control @error('peg_id') is-invalid @enderror" name="peg_id" id="peg_id" aria-describedby="helpId" placeholder="Password guru" value="{{old('peg_id',$data['teacher']->peg_id)}}">
                            @error('peg_id')
                            <div class="invalid-feedback">
                               {{$message}}
                            </div>
                            @enderror
                        </div>
                        @endif
 



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