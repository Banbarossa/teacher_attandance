<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rombel::latest()->get();
        return view('admin.rombel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['rombel'] = new Rombel();
        $data['method'] = 'post';
        $data['route'] = route('rombel.store');
        return view('admin.rombel.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_rombel' => 'required|unique:rombels,nama_rombel',
            'tingkat_kelas' => 'required',
            'jenjang' => 'required',
        ]);

        Rombel::create($validatedData);

        return redirect()->route('rombel.index')->with('success', 'Data Berhasil Di Tambahkan');

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
        $data['method'] = 'put';
        $data['route'] = route('rombel.update', $id);
        $data['rombel'] = Rombel::findOrFail($id);
        return view('admin.rombel.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'nama_rombel' => 'required',
            'tingkat_kelas' => 'required',
            'jenjang' => 'required',
        ]);

        Rombel::findOrFail($id)->update($validatedData);
        return redirect()->route('rombel.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rombel::findOrFail($id)->delete();
        return redirect()->route('rombel.index')->with('success', 'Data Berhasil hapus');

    }
}
