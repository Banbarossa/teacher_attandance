<?php

namespace App\Http\Livewire;

use App\Models\Presence;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ReportHarian extends Component
{
    public $date;
    public $sortBy = 'waktu';
    public $sortDirection = 'desc';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->date = Carbon::today()->format('Y-m-d');
    }

    public function render()
    {
        $presences = Presence::whereDate('tanggal', $this->date)
            ->with(['rombel', 'schedule', 'teacher'])
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.report-harian', ['presences' => $presences]);
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }
}
