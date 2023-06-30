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
                           <label for="name" class="form-label">User Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Nama" value="{{old('name',$data['user']->name)}}">
                            @error('name')
                            <div class="invalid-feedback">
                               {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                           <label for="email" class="form-label">email</label>
                           <input type="email" class="form-control @error('email') is-invalid @enderror" nama="email" id="email" aria-describedby="helpId" placeholder="email" value="{{old('email',$data['user']->email)}}">
                            @error('email')
                            <div class="invalid-feedback">
                               {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                           <label for="role" class="form-label">Role</label>
                           <select name="roler" id="role" class="form-select">
                              <option value="">Pilih Role</option>
                              <option value="admin">admin</option>
                              <option value="piket">Petugast Piket</option>
                              
                           </select>
                            @error('role')
                            <div class="invalid-feedback">
                               {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                           <label for="password" class="form-label">Password</label>
                           <input type="text" class="form-control @error('password') is-invalid @enderror" nama="password" id="password" aria-describedby="helpId" placeholder="Password" value="{{old('password',$data['user']->password)}}">
                            @error('password')
                            <div class="invalid-feedback">
                               {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                           <label for="password_confirmation" class="form-label">Password Confirmation</label>
                           <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" nama="password_confirmation" id="password_confirmation" aria-describedby="helpId" placeholder="Password Confirmation" value="{{old('password_confirmation',$data['user']->password_confirmation)}}">
                            @error('password_confirmation')
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