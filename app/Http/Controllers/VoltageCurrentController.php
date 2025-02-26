<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class VoltageCurrentController extends Controller
{
    public function index()
    {

        $sensors = Sensor::all();

        return view('pages.voltage-current')
            ->with('sensors', $sensors);

    }
}
