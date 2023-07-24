<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function index()
    {

        $teachers = Teacher::all();
        $rombels = Rombel::all();
        return view('admin.dashboard', compact('teachers', 'rombels'));
    }
}
