<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Location;
use App\Models\Gateway;
use App\Models\SensorRegister;
use App\Models\SensorType;
use App\Models\SensorModel;
use Illuminate\Http\Request;
use Auth;
use Response;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sensor = Sensor::all();
        return view('pages.sensors.index')
        ->with('sensors', $sensor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location =  Location::all();
        $gateway =  Gateway::all();
        $SensorRegister =  SensorRegister::all();
        return view('pages.sensors.form')
        ->with('locations', $location)
        ->with('gateways', $gateway)
        ->with('sensorRegisters', $SensorRegister);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slave_address' => 'required',
            'description' => 'required',
            'location_id' => 'required',
            'gateway_id' => 'required',
            'sensor_register_id' => 'required',
        ]);

        $sensor = new Sensor($request->all());
        $sensor->save();

        return redirect()->route('sensors.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Sensor $sensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $sensor = Sensor::find($id);
       $location =  Location::all();
       $gateway =  Gateway::all();
       $SensorRegister =  SensorRegister::all();
        return view('pages.sensors.form')
        ->with('sensor', $sensor)
        ->with('locations', $location)
        ->with('gateways', $gateway)
        ->with('sensorRegisters', $SensorRegister);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sensor $sensor)
    {

        $request->validate([
            'slave_address' => 'required',
            'description' => 'required',
            'location_id' => 'required',
            'gateway_id' => 'required',
            'sensor_register_id' => 'required',
        ]);
        $sensor->update($request->all());
        return redirect()->route('sensors.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
  
  
        $id                     = $request->id;
        $sensor               = $sensor = Sensor::findOrFail($id);       
        $sensor->save();
        $sensor->delete();

        return Response::json($sensor);
    }
}
