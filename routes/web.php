<?php

use App\Http\Controllers\AttandanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WellcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
route::get('/', [WellcomeController::class, 'index'])->name('home');

// Auth Controller

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('login.auth');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
    Route::resource('rombel', RombelController::class)->middleware('can:isAdmin');
    Route::resource('schedule', ScheduleController::class)->middleware('can:isAdmin');
    Route::resource('teacher', TeacherController::class)->middleware('can:isAdmin');
    Route::resource('attandance', AttandanceController::class);
    Route::resource('user', UserController::class)->middleware('can:isAdmin');

    // report
    Route::get('/report/bulanan', [ReportController::class, 'report'])->name('report.bulanan');
    Route::get('/report/harian', [ReportController::class, 'report'])->name('report.harian');
    Route::get('/report/summary', [ReportController::class, 'report'])->name('report.summary');
    Route::post('/report/summary', [ReportController::class, 'show'])->name('report.show');

    // profile update (personal)
    Route::post('profile', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('changepassword', [ProfileController::class, 'changePassword'])->name('password.update');

    // Home
    Route::get('admin', [HomeController::class, 'index'])->name('admin.home');
    // Route::get('admin', [HomeController::class, 'index'])->name('admin.home');

});

// Persense Controller
Route::get('/absen/{id}', [PresenceController::class, 'index'])->name('presence.index');
Route::post('/absen/{id}', [PresenceController::class, 'store'])->name('presence.store');

// Route::get('/abc', function () {

//     $schedules = Schedule::orderBy('jam_ke', 'asc')->get();
//     return view('absensi', ['data' => 'gfahdgjagdhgajda', 'schedules' => $schedules]);
// });
