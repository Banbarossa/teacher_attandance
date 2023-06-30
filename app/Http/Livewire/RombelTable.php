<?php

namespace App\Http\Livewire;

use App\Models\Rombel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RombelTable extends DataTableComponent
{
    protected $model = Rombel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Kode Rombel", "id"),
            Column::make("Nama rombel", "nama_rombel")
                ->sortable()
                ->searchable(),
            Column::make("Tingkat kelas", "tingkat_kelas")
                ->sortable()
                ->searchable(),
            Column::make("Jenjang", "jenjang")
                ->sortable(),
            Column::make('Action')
                ->label(
                    function ($row, Column $column) {
                        $route['edit'] = Route('rombel.edit', $row);
                        $route['delete'] = Route('rombel.destroy', $row);
                        return view('components.delete-item', ['route' => $route]);
                    }),
        ];
    }
}
