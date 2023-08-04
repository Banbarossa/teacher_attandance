<?php

namespace App\Exports;

use App\Models\Presence;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class PersonalReportExport implements FromCollection, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $id, $month, $year;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->month = $data['month'];
        $this->year = $data['year'];

    }
    public function collection()
    {

        return Presence::where('teacher_id', $this->id)
            ->whereYear('tanggal', $this->year)
            ->whereMonth('tanggal', $this->month)
            ->with('rombel', 'schedule', 'teacher')
            ->paginate(20);
    }

    public function map($row): array
    {
        // Access the "rombel" and "schedule" relationships for each row
        $rombelName = $row->rombel->nama_rombel;
        $scheduleName = $row->schedule->jam_ke;
        $teacherName = $row->teacher->nama;

        // Process the row data as needed before exporting
        return [
            'Teacher Name' => $row->teacher->name,
            'Date' => $row->tanggal,
            'Date' => $row->waktu,
            'Date' => $row->status,
            'jumlah Jam' => $row->jumlah_jam,
            'Rombel Name' => $rombelName,
            'Schedule Name' => $scheduleName,
            'tingkat' => $row->rombel->tingkat,
        ];
    }
}
