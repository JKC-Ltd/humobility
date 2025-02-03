<?php

namespace App\Http\Controllers;

use App\Models\SensorRegister;
use App\Models\SensorType;
use App\Models\SensorModel;
use Illuminate\Http\Request;

class SensorRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sensorRegisters = SensorRegister::all();

        return view('pages.configurations.sensorRegisters.index', compact('sensorRegisters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sensorTypes = SensorType::all();
        $sensorModels = SensorModel::all();

        return view('pages.configurations.sensorRegisters.create', compact('sensorTypes', 'sensorModels'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'sensor_model_id' => 'required',
            'sensor_type_id' => 'required', 
            'sensor_reg_address' => 'required|string',              
        ]);

        $sensorRegister = new SensorRegister($request->all());
        
        $sensorRegister->save();

        return redirect()->route('sensorRegisters.index')->with('success', 'Sensor Register created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SensorRegister $sensorRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SensorRegister $sensorRegister)
    {
        $sensorTypes = SensorType::all();
        $sensorModels = SensorModel::all();

        return view('pages.configurations.sensorRegisters.create', compact('sensorRegister','sensorTypes', 'sensorModels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SensorRegister $sensorRegister)
    {
        $sensorRegister->update($request->all());

        return redirect()->route('sensorRegisters.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SensorRegister $sensorRegister)
    {
        //
    }
}
