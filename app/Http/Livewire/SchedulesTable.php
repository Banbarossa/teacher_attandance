<?php

namespace App\Http\Livewire;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SchedulesTable extends DataTableComponent
{
    protected $model = Schedule::class;

    public function builder(): Builder
    {
        return Schedule::query()
            ->select('id', 'hari', 'jam_ke', 'jam_masuk')
            ->orderBy('hari')
            ->orderBy('jam_ke');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setThAttributes(function (Column $column) {
            if ($column->isField('id')) {
                return [
                    'class' => 'd-none',
                ];
            }

            return [];
        });

        $this->setTdAttributes(function (Column $column) {
            if ($column->isField('id')) {
                return [
                    'class' => 'd-none',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("hari", "hari")
                ->sortable()
                ->searchable(),
            Column::make("Jam Ke", "jam_ke")
                ->sortable()
                ->searchable(),
            Column::make("Jam Masuk", "jam_masuk")
                ->sortable()
                ->searchable(),
            Column::make('Action')
                ->label(
                    function ($row) {
                        $route['edit'] = route('schedule.edit', $row);
                        $route['delete'] = route('schedule.destroy', $row);
                        return view('components.delete-item', ['route' => $route]);
                    }
                ),

        ];
    }
}
