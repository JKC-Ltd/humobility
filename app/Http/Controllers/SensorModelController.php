<?php

namespace App\Http\Controllers;

use App\Models\SensorModel;
use Illuminate\Http\Request;
use Response;

class SensorModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sensor_models = SensorModel::all();

        return view('pages.configurations.sensorModels.index')
            ->with('sensor_models', $sensor_models);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.configurations.sensorModels.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sensor_model = new SensorModel($request->all());
        $sensor_model->save();

        return redirect()->route('sensorModels.index')->with('success', 'Sensor Model created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SensorModel $sensorModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SensorModel $sensorModel)
    {
        return view('pages.configurations.sensorModels.create', compact('sensor_model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SensorModel $sensorModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        $id                         = $request->id;
        $sensorModel                = $sensorModel = SensorModel::findOrFail($id);       
        $sensorModel->save();
        $sensorModel->delete();

        return Response::json($sensorModel);
    }
}
