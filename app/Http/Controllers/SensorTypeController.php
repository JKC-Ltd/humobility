<?php

namespace App\Http\Controllers;

use App\Models\SensorType;
use Illuminate\Http\Request;

class SensorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sensorTypes = SensorType::all();

        return view('pages.configurations.sensorTypes.index')
            ->with('sensorTypes', $sensorTypes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.configurations.sensorTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $sensorType = new SensorType($request->all());
        $sensorType->save();

        return redirect()->route('sensorTypes.index')->with('success', 'Sensor Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SensorType $sensorType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SensorType $sensorType)
    {
        return view('pages.configurations.sensorTypes.create', compact('sensorType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SensorType $sensorType)
    {

        $sensorType->update($request->all());

        return redirect()->route('sensorTypes.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SensorType $sensorType)
    {
        //
    }
}
