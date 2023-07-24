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
               <h4 class="card-title">Tambah data Ketidakhadiran</h4>
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
                            <label for="teacher_id" class="form-label">Guru</label>
                            <select name="teacher_id" id="teacher_id" class="form-select">
                               <option value="">Pilih Guru</option>
                                @foreach ($data['guru'] as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                    
                                @endforeach
                            </select>
                             @error('teacher_id')
                             <div class="invalid-feedback">
                                {{$message}}
                             </div>
                             @enderror
                         </div>
                        <div class="mb-3">
                            <label for="schedule_id" class="form-label">Mulai Masuk Jam ke</label>
                            <select name="schedule_id" id="schedule_id" class="form-select">
                               <option value="">Jam Ke</option>
                                @foreach ($data['schedule'] as $item)
                                <option value="{{$item->id}}">{{$item->jam_ke}}</option>
                                    
                                @endforeach
                            </select>
                             @error('schedule_id')
                             <div class="invalid-feedback">
                                {{$message}}
                             </div>
                             @enderror
                         </div>

                         @php
                            $jumlah_jam=[1,2,3,4,5,6]
                           
                        @endphp
                        
                        <div class="mb-3">
                            <label for="jumlah jam" class="form-label">Jumlah Jam</label>
                            <select name="jumlah_jam" id="jumlah jam" class="form-select">
                               <option value="">Jumlah jam Mengajar</option>
                                @foreach ($jumlah_jam as $item)
                                <option value="{{$item}}">{{$item}}</option>
                                    
                                @endforeach
                            </select>
                             @error('jumlah jam')
                             <div class="invalid-feedback">
                                {{$message}}
                             </div>
                             @enderror
                        </div>


                        <div class="mb-3">
                            <label for="rombel_id" class="form-label">Nama Kelas</label>
                            <select name="rombel_id" id="rombel_id" class="form-select">
                               <option value="">Kelas</option>
                                @foreach ($data['rombel'] as $item)
                                <option value="{{$item->id}}">{{$item->nama_rombel}}</option>
                                    
                                @endforeach
                            </select>
                             @error('rombel_id')
                             <div class="invalid-feedback">
                                {{$message}}
                             </div>
                             @enderror
                         </div>

                        

                        @php
                             $status=[
                                [
                                    'value'=>'I',
                                    'name'=>'Izin'
                                ],
                                [
                                    'value'=>'A',
                                    'name'=>'Alpa'
                                ],
                                [
                                    'value'=>'S',
                                    'name'=>'Sakit'
                                ],
                            ]

                        @endphp
                        <div class="mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                               <option value="">Status Ketidak hadiran</option>
                                @foreach ($status as $item)
                                <option value="{{$item['value']}}">{{$item['name']}}</option>
                                    
                                @endforeach
                            </select>
                             @error('status')
                             <div class="invalid-feedback">
                                {{$message}}
                             </div>
                             @enderror
                        </div>



                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan Ketidakhadiran" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Keterangan Tidak hadir</label>
                              </div>
                            @error('keterangan')
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