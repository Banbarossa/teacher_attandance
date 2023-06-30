<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Schedule::orderBy('jam_ke', 'asc')->get();
        return view('admin.schedule.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['route'] = route('schedule.store');
        $data['schedule'] = new Schedule();
        $data['method'] = 'post';

        return view('admin.schedule.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jam_ke' => 'required|numeric|digits_between:1,9|unique:schedules,jam_ke',
            'jam_masuk' => 'required',
        ]);

        Schedule::create($validatedData);
        return redirect()->route('schedule.index')->with('success', ' Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {

        $id = $schedule->id;

        $data['route'] = route('schedule.update', $id);
        // $data['schedule'] = Schedule::findOrFail($id);
        $data['schedule'] = $schedule;
        $data['method'] = 'put';

        return view('admin.schedule.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'jam_ke' => 'required|numeric|digits_between:1,9',
            'jam_masuk' => 'required',
        ]);

        Schedule::findOrFail($schedule->id)->update($validatedData);
        return redirect()->route('schedule.index')->with('success', ' Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        Schedule::findOrFail($schedule->id)->delete();
        return redirect()->route('schedule.index')->with('success', 'Data berhasil dihapus');
    }
}
