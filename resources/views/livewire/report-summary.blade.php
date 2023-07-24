<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="month">Bulan:</label>
                        <select name="month" wire:model="month" id="month" class="form-select">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="year" class="d-inline">Tahun:</label>
                        <input type="number" wire:model="year" class="form-control d-inline" name="year" id="year" min="1900" max="2099" value="{{ date('Y') }}">
                    </div>              
                </div>
            </div>
        </div>

    </div>
 
 
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex justify-content-between">
              <div class="header-title">
                 <h4 class="card-title">Rekap Kehadiran</h4>
                 <div>
                    Mulai Tanggal: {{\Carbon\Carbon::parse($startOfMonth)->format('d/m/Y')}} sampai dengan : {{\Carbon\Carbon::parse($endOfMonth)->format('d/m/Y')}}
                 </div>
             </div>
           </div>
           <div class="card-body">
             <div class="table-responsive">
                <table class="table table-striped">
                   <thead>
                       <tr>
                            <th>Nomor</th>
                            <th>Nama Guru</th>
                            <th>Jumlah Hari Hadir</th>
                            <th>Jam Hadir</th>
                            <th>Jam Tidak Hadir</th>
                            <th>Total terlambat</th>
                            <th>view detail</th>
                       </tr>
                   </thead>
                   <tbody>
                        @foreach ($presences as $index => $teacher)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $teacher->teacher->nama }}</td>
                            <td>{{ $teacher->jumlah_tanggal }}</td>
                            <td>{{ $teacher->jam_hadir}}</td>
                            <td>{{ $teacher->jam_tidak_hadir}}</td>
                            <td>{{ $teacher->total_terlambat }} menit</td>
                            <td>
                                <form action="{{route('report.show')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="teacher_id" value="{{$teacher->teacher_id}}">
                                    <input type="hidden" name="month" value="{{$month}}">
                                    <input type="hidden" name="year" value="{{$year}}">
                                    <button type="submit" class="btn btn-outline-info d-block">View Detail</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                   </tbody>
               </table>

               {{$presences->links()}}
             </div>
 
           </div>
        </div>
     </div>
</div>