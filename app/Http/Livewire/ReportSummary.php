<?php

namespace App\Http\Livewire;

use App\Models\Presence;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ReportSummary extends Component
{

    public $month;
    public $year;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->month = Carbon::now()->format('m');
        $this->year = Carbon::now()->format('Y');
    }

    public function render()
    {
        $startOfMonth = Carbon::create($this->year, $this->month)->startOfMonth();
        $endOfMonth = Carbon::create($this->year, $this->month)->endOfMonth();

        $presences = Presence::whereYear('tanggal', $this->year)
            ->whereMonth('tanggal', $this->month)
            ->select('teacher_id')
            ->selectRaw('COUNT(DISTINCT tanggal) AS jumlah_tanggal')
            ->selectRaw('SUM(jumlah_jam) AS total_jam')
            ->selectRaw('sum(terlambat) AS total_terlambat')
            ->groupBy('teacher_id')
            ->with(['teacher' => function ($query) {
                $query->orderBy('nama', 'asc');
            }])
            ->paginate(20);

        return view('livewire.report-summary', compact('presences', 'startOfMonth', 'endOfMonth'));
    }
}
