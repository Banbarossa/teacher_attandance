<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Rombel;
use App\Models\Schedule;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttandanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Presence::latest()->with(['rombel', 'teacher', 'schedule'])->get();
        return view('admin.attandance.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['guru'] = Teacher::orderBy('nama', 'asc')->get();
        $data['schedule'] = Schedule::orderBy('jam_ke', 'asc')->get();
        $data['rombel'] = Rombel::orderBy('tingkat_kelas', 'asc')->get();
        $data['user'] = new Presence();
        $data['method'] = 'post';
        $data['route'] = route('attandance.store');
        return view('piket.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'schedule_id' => 'required',
            'rombel_id' => 'required',
            'jumlah_jam' => 'required',
            'status' => 'required',
        ]);

        Presence::create([
            'teacher_id' => $request->teacher_id,
            'schedule_id' => $request->schedule_id,
            'rombel_id' => $request->rombel_id,
            'jumlah_jam' => $request->jumlah_jam,
            'tanggal' => Carbon::now()->toDateString(),
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('report.harian')->with('success', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
