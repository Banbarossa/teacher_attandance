<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Rombel;
use App\Models\Schedule;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Env;

class PresenceController extends Controller
{
    public function index($id)
    {

        $schedules = Schedule::orderBy('jam_ke', 'asc')->get();
        return view('absensi',
            [
                'data' => $id,
                'schedules' => $schedules,
            ]);
    }

    public function store(Request $request, $id)
    {

        $request->validate([
            'password' => 'required|exists:teachers,peg_id',
            'jumlah_jam' => 'required',
        ]);

        $teacher = Teacher::where('peg_id', $request->password)->first();

        $jam_masuk = Schedule::where('id', $request->schedule)->first()->jam_masuk;

        $waktu_sekarang = Carbon::now();
        $waktu_masuk = Carbon::createFromFormat('H:i:s', $jam_masuk);

        $keterlambatan = '';
        if ($waktu_sekarang->gt($waktu_masuk)) {
            $keterlambatan = $waktu_sekarang->diffInMinutes($waktu_masuk);
        }

        $rombel_id = Rombel::find($id);
        if ($rombel_id == null) {
            return back()->with('error', 'Data gagal di Input, pastikan anda memiliki akses yang benar');
        }

        // Menghitung jarak menggunakan formula Haversine
        $userLatitude = $request->latitude;
        $userLongitude = $request->longitude;
        // $allowedLatitude = 5.464579845613735;
        // $allowedLongitude = 95.38644196930774;
        $allowedLatitude = env('LATITUDE');
        $allowedLongitude = env('LONGITUDE');
        $earthRadius = 6371; // Radius bumi dalam kilometer

        $latDiff = deg2rad($allowedLatitude - $userLatitude);
        $lonDiff = deg2rad($allowedLongitude - $userLongitude);

        $a = sin($latDiff / 2) * sin($latDiff / 2) +
        cos(deg2rad($userLatitude)) * cos(deg2rad($allowedLatitude)) *
        sin($lonDiff / 2) * sin($lonDiff / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c; // Jarak dalam kilometer

        // $allowedRadius = 1; // Radius yang diizinkan dalam kilometer
        $allowedRadius = env('JARAK');
        if ($distance > $allowedRadius) {
            return back()->with('error', 'Anda berada di luar radius yang diizinkan');
        }

        Presence::create([
            'teacher_id' => $teacher->id,
            'schedule_id' => $request->schedule,
            'rombel_id' => $id,
            'jumlah_jam' => $request->jumlah_jam,
            'tanggal' => Carbon::now()->toDateString(),
            'waktu' => Carbon::now(),
            'terlambat' => $keterlambatan,
            'status' => 'H',
        ]);

        return redirect('/')->with('success', 'Absen Anda Telah Direcord');

    }
}
