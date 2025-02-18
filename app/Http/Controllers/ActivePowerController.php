<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use App\Models\Sensor;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Response;

class ActivePowerController extends Controller
{
    public function index()
    {
        $sensors = Sensor::all();
        $gateways = Gateway::all();
        $users = User::all();

        return view('pages.activePower')
            ->with('gateways', $gateways)
            ->with('sensors', $sensors)
            ->with('users', $users);

    }

    public function getActivePowerProfile(Request $request)
    {
        $query = Sensor::with(['location', 'gateway', 'sensorRegister'])
            ->select(
                'sensors.*',
                'locations.location_name as location_name',
                'gateways.gateway_code',
                'sensor_registers.sensor_reg_address',
                'sensor_logs.energy',
                'sensor_logs.voltage_ab',
                'sensor_logs.voltage_bc',
                'sensor_logs.voltage_ca',
                'sensor_logs.current_a',
                'sensor_logs.current_b',
                'sensor_logs.current_c',
                'sensor_logs.real_power',
                'sensor_logs.datetime_created',
                DB::raw("ROUND(sensor_logs.energy - LAG(sensor_logs.energy) OVER(
                PARTITION BY sensors.id 
                ORDER BY sensor_logs.datetime_created
            ), 2) AS energy_difference"),
                DB::raw('DATE(sensor_logs.datetime_created) AS date_created')
            )
            ->leftJoin('locations', 'locations.id', '=', 'sensors.location_id')
            ->leftJoin('gateways', 'gateways.id', '=', 'sensors.gateway_id')
            ->leftJoin('sensor_registers', 'sensor_registers.id', '=', 'sensors.sensor_register_id')
            ->leftJoin('sensor_logs', 'sensor_logs.sensor_id', '=', 'sensors.id')
            ->whereRaw('HOUR(sensor_logs.datetime_created) = 9');

        if ($request->sensor_id) {
            $query->where('sensors.id', $request->sensor_id);
        }

        $energyConsumption = $query->groupBy('sensors.description', 'date_created')
            ->orderBy('sensors.id')
            ->orderBy('sensor_logs.datetime_created')
            ->get();

        return Response::json($energyConsumption);
    }
}
