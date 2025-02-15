<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Http\Request;

class EnergyConsumptionController extends Controller
{
    public function index()
    {
        $gateways = Gateway::all();
        $sensors = Sensor::all();
        $users = User::all();

        return view('pages.dashboard')
            ->with('gateways', $gateways)
            ->with('sensors', $sensors)
            ->with('users', $users);

    }
}
