<?php

namespace App\Http\Controllers;

class WellcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
