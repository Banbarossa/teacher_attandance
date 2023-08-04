<?php

namespace App\Http\Controllers;

use App\Exports\PersonalReportExport;
use App\Models\Presence;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function report(Request $request)
    {
        return view('admin.report.index');
    }

    public function show(Request $request)
    {
        $teacher = Teacher::findOrFail($request->teacher_id);
        $presence = Presence::where('teacher_id', $request->teacher_id)
        // ->where('status', 'H')
            ->whereYear('tanggal', $request->year)
            ->whereMonth('tanggal', $request->month)
            ->with('rombel', 'schedule')
            ->paginate(20);

        return view('admin.report.show', compact('teacher', 'presence'));
    }

    public function destroy($id)
    {
        $presence = Presence::find($id);

        if ($presence) {
            $presence->delete();
            return redirect()->route('report.harian')->with('success', 'Data presences berhasil dihapus!');
        }

        return redirect()->route('report.harian')->with('error', 'Data presences tidak ditemukan!');
    }

    public function exportExcel(Request $request)
    {

        // dd($request->all());
        $data['id'] = $request->teacher_id;
        $data['month'] = $request->month;
        $data['year'] = $request->year;
        return Excel::download(new PersonalReportExport($data), 'report.xlsx');

    }
}
