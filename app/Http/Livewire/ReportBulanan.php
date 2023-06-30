<?php

namespace App\Http\Livewire;

use App\Models\Presence;
use Carbon\Carbon;
use function Termwind\render;
use Livewire\Component;
use Livewire\WithPagination;

class ReportBulanan extends Component
{
    public $month;
    public $year;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->month = Carbon::now()->format('n');
        $this->year = Carbon::now()->format('Y');
    }

    public function render()
    {

        $presences = Presence::whereMonth('tanggal', $this->month)
            ->whereYear('tanggal', $this->year)
            ->with(['rombel', 'schedule', 'teacher'])
            ->latest()
            ->paginate(20);

        return view('livewire.report-bulanan', ['presences' => $presences]);
    }

    public function updatedMonth()
    {
        $this->render();
    }

    public function updatedYear()
    {
        $this->render();
    }

}
