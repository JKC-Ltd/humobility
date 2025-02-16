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

        // $energyConsumption = Sensor::leftJoin('locations', 'locations.id', '=', 'sensors.location_id')
        //     ->leftJoin('gateways', 'gateways.id', '=', 'sensors.gateway_id')
        //     ->leftJoin('sensor_registers', 'sensor_registers.id', '=', 'sensors.sensor_register_id')
        //     ->leftJoin('sensor_logs', 'sensor_logs.sensor_id', '=', 'sensors.id')
        //     ->select(
        //         'sensors.*',
        //         'locations.location_name as location_name',
        //         'gateways.gateway_code',
        //         'sensor_registers.sensor_reg_address',
        //         'sensor_logs.voltage_ab',
        //         'sensor_logs.voltage_bc',
        //         'sensor_logs.voltage_ca',
        //         'sensor_logs.current_a',
        //         'sensor_logs.current_b',
        //         'sensor_logs.current_c',
        //         'sensor_logs.real_power',
        //         'sensor_logs.apparent_power',
        //         'sensor_logs.energy',
        //         'sensor_logs.temperature',
        //         'sensor_logs.humidity',
        //         'sensor_logs.volume',
        //         'sensor_logs.flow',
        //         'sensor_logs.pressure',
        //         'sensor_logs.co2',
        //         'sensor_logs.pm25_pm10',
        //         'sensor_logs.o2',
        //         'sensor_logs.nox',
        //         'sensor_logs.co',
        //         'sensor_logs.s02',
        //         'sensor_logs.datetime_created'
        //     )
        //     ->get();

        // dd($energyConsumption);

        return view('pages.dashboard')
            ->with('gateways', $gateways)
            ->with('sensors', $sensors)
            ->with('users', $users);
    }
}
