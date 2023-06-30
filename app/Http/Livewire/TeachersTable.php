<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TeachersTable extends DataTableComponent
{
    protected $model = Teacher::class;

    public function builder(): Builder
    {
        return Teacher::query()
            ->select('id', 'nama', 'peg_id')
            ->orderBy('nama');
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

            Column::make('Nama', 'nama')
                ->sortable()
                ->searchable(),
            Column::make("password", 'peg_id'),
            Column::make('Action', 'id')
                ->label(
                    function ($row, Column $column) {
                        $route['edit'] = Route('teacher.edit', $row);
                        $route['delete'] = Route('teacher.destroy', $row);
                        return view('components.delete-item', ['route' => $route]);
                    }),
        ];
    }

}
