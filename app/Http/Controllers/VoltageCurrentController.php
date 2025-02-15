<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoltageCurrentController extends Controller
{
    public function index()
    {

        return view('pages.voltageCurrent');

    }
}
