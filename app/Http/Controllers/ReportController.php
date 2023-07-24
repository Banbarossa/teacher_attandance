<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Teacher;
use Illuminate\Http\Request;

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
}
