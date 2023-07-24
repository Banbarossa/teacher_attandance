<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="date" class="form-label">Tanggal:</label>
                    <input type="date" class="form-control d-inline-block" id="date" class="form-control" wire:model="date">
                </div>              
            </div>
        </div>

    </div>
 
 
     <div class="col-sm-12">
        <div class="card">
           <div class="card-header">
              <div class="header-title d-flex justify-content-between">
                 <h4 class="card-title">Daftar Kehadiran</h4>
                 <a href="{{route('attandance.create')}}" class="btn btn-primary">Tambah Guru Tidak Hadir</a>
             </div>
           </div>
           <div class="card-body">
             <div class="table-responsive">
                <table class="table table-striped">
                   <thead>
                       <tr>
                            <th>No</th>
                            <th>Guru</th>
                            <th>Rombel</th>
                            <th>
                                <button wire:click="sortBy('schedule_id')" class="bg-transparent d-flex justify-content-between" style="border: 0pt">
                                    <span class="text-muted">Jam Ke</span>
                                    <span>
                                        @if ($sortBy === 'schedule_id')
                                            @if ($sortDirection === 'asc')
                                                <i class="fa fa-caret-up"></i>
                                            @else
                                                <i class="fa fa-caret-down"></i>
                                            @endif
                                        @endif
                                    </span>
                                    
                                </button>
                                
                            </th>
                            <th>Jumlah Jam</th>
                            <th>Waktu Absensi</th>
                            <th>
                                <button wire:click="sortBy('terlambat')" class="bg-transparent d-flex justify-content-between" style="border: 0pt">
                                    <span class="text-muted">Terlambat</span>
                                    <span>
                                        @if ($sortBy === 'terlambat')
                                            @if ($sortDirection === 'asc')
                                                <i class="fa fa-caret-up"></i>
                                            @else
                                                <i class="fa fa-caret-down"></i>
                                            @endif
                                        @endif
                                    </span>
                                    
                                </button>
                            </th>
                            <th>
                                <button wire:click="sortBy('status')" class="bg-transparent d-flex justify-content-between" style="border: 0pt">
                                    <span class="text-muted">Status</span>
                                    <span>
                                        @if ($sortBy === 'status')
                                            @if ($sortDirection === 'asc')
                                                <i class="fa fa-caret-up"></i>
                                            @else
                                                <i class="fa fa-caret-down"></i>
                                            @endif
                                        @endif
                                    </span>
                                    
                                </button>
                            </th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($presences as $index=>$presence)
                       <tr>
                            <td>{{ $index  + 1 }}</td>
                            <td>{{ $presence->teacher->nama }}</td>
                            <td>{{ $presence->rombel->nama_rombel }}</td>
                            <td>{{ $presence->schedule->jam_ke }}</td>
                            <td>{{ $presence->jumlah_jam }}</td>
                            <td>{{ $presence->waktu }}</td>
                            <td>{{ $presence->terlambat }}{{$presence->terlambat ? ' Menit':''}}</td>
                            <td>{{ $presence->status }}</td>

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