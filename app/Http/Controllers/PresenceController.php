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
            'schedule' => 'required',
        ]);

        $teacher = Teacher::where('peg_id', $request->password)->first();

        $waktu_sekarang = Carbon::now();

        if ($waktu_sekarang->isMonday()) {
            $jam_masuk = Schedule::where('jam_ke', $request->schedule)
                ->where('hari', 'senin')
                ->first();
        } elseif ($waktu_sekarang->isFriday()) {
            $jam_masuk = Schedule::where('jam_ke', $request->schedule)
                ->where('hari', 'jumat')
                ->first();
        } else {
            $jam_masuk = Schedule::where('jam_ke', $request->schedule)
                ->where('hari', 'jumat')
                ->first();
        }

        $waktu_masuk = Carbon::createFromFormat('H:i:s', $jam_masuk);

        $keterlambatan = 0;

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

        $allowedRadius = env('JARAK');
        if ($distance > $allowedRadius) {
            return back()->with('error', 'Anda berada di luar radius yang diizinkan');
        }

        $validasi = $id . '-' . $request->schedule . '-' . $teacher->id . '-' . Carbon::now()->toDateString();
        $presence = Presence::where('validasi', $validasi)->first();
        $schedule_id = Schedule::where('jam_ke', $request->schedule)->first();

        if ($presence) {
            return back()->with('error', 'Anda Sudah Melakukan Absen di kelas ini');
        } else {

            Presence::create([
                'teacher_id' => $teacher->id,
                'schedule_id' => $schedule_id->id,
                'rombel_id' => $id,
                'jumlah_jam' => 2,
                'tanggal' => Carbon::now()->toDateString(),
                'waktu' => Carbon::now()->format('H:i:s'),
                'terlambat' => $keterlambatan,
                // validasi= rombel-jamKe-idGuru-tanggal
                'validasi' => $validasi,
                'status' => 'H',
            ]);

            return redirect('/')->with('success', 'Absen Anda Telah Direcord');
        }
    }
}
