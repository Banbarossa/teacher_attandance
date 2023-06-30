<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teacher::orderBy('nama', 'asc')->get();
        return view('admin.teacher.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['teacher'] = new Teacher();
        $data['method'] = 'post';
        $data['route'] = route('teacher.store');
        return view('admin.teacher.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $peg_id = Str::random(8);
        $request->validate([
            'nama' => 'required|unique:teachers,nama',
        ]);

        Teacher::create([
            'nama' => $request->nama,
            'peg_id' => $peg_id,
            'password' => Hash::make('123456789'),
        ]);

        return redirect()->route('teacher.index')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $id = $teacher->id;

        $data['route'] = route('teacher.update', $id);
        $data['teacher'] = $teacher;
        $data['method'] = 'put';

        return view('admin.teacher.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        if ($request->nama == $teacher->nama) {
            $request->validate([
                'nama' => 'required',
                'peg_id' => 'required',
            ]);

        } else {
            $request->validate([
                'nama' => 'required|unique:teachers,nama',
                'peg_id' => 'required',
            ]);
        }

        $teacher->update([
            'nama' => $request->nama,
            'peg_id' => $request->peg_id,
        ]);

        return redirect()->route('teacher.index')->with('success', ' Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Data berhasil dihapus');

    }
}
