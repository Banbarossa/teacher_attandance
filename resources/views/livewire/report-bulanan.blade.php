<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form wire:submit="render">
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
                </form>
                
            </div>
        </div>

    </div>
 
 
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header d-flex justify-content-between">
              <div class="header-title">
                 <h4 class="card-title">Daftar Kehadiran</h4>
             </div>
           </div>
           <div class="card-body">
             <div class="table-responsive">
                <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>No</th>
                           <th>Tanggal</th>
                           <th>Guru</th>
                           <th>Rombel</th>
                           <th>Jam Ke</th>
                           <th>Jumlah Jam</th>
                           <th>Waktu Absensi</th>
                           <th>Terlambat</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($presences as $index=>$presence)
                       <tr>
                           <td>{{ $index  + 1 }}</td>
                           <td>{{ \Carbon\Carbon::parse($presence->tanggal)->format('d/m/Y') }}</td>
                           <td>{{ $presence->teacher->nama }}</td>
                           <td>{{ $presence->rombel->nama_rombel }}</td>
                           <td>{{ $presence->schedule->jam_ke }}</td>
                           <td>{{ $presence->jumlah_jam }}</td>
                           <td>{{ $presence->waktu }}</td>
                           <td>{{ $presence->terlambat }} Menit</td>
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