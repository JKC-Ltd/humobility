<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use App\Models\SensorModel;
use App\Services\SensorOfflineService;
use DB;
use Illuminate\Http\Request;
use Response;
use Illuminate\Validation\Rule;

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
        return view('pages.configurations.sensorModels.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::formRule(), self::errorMessage(), self::changeAttributes());

        DB::enableQueryLog();

        $sensor_model = new SensorModel($request->all());
        $sensor_model->save();

        $gateways = Gateway::all();

        foreach ($gateways as $key => $gateway) {
            (new SensorOfflineService())->store(DB::getQueryLog(), $gateway->id, 'sensor_model');
        }

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
        return view('pages.configurations.sensorModels.form', compact('sensorModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SensorModel $sensorModel)
    {
        $request->validate(self::formRule($sensorModel->id), self::errorMessage(), self::changeAttributes());

        DB::enableQueryLog();

        $sensorModel->update($request->all());

        $gateways = Gateway::all();

        foreach ($gateways as $key => $gateway) {
            (new SensorOfflineService())->store(DB::getQueryLog(), $gateway->id, 'sensor_model');
        }

        return redirect()->route('sensorModels.index')->with('success', 'Sensor Model updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::enableQueryLog();

        $id = $request->id;
        $sensorModel = $sensorModel = SensorModel::findOrFail($id);
        $sensorModel->save();
        $sensorModel->delete();

        $gateways = Gateway::all();

        foreach ($gateways as $key => $gateway) {
            (new SensorOfflineService())->delete(DB::getQueryLog(), $gateway->id);
        }

        return Response::json($sensorModel);
    }
    public function formRule($id = false)
    {
        return [
            'sensor_model' => ['required', 'string', 'min:3', 'max:200', Rule::unique('sensor_models')->ignore($id ? $id : '')],
            'sensor_brand' => ['required', 'string', 'min:3', 'max:200'],
        ];
    }
    public function errorMessage()
    {
        return [
            'sensor_model.required' => 'Sensor Model is required',
            'sensor_brand.required' => 'Sensor Brand is required',
        ];
    }
    public function changeAttributes()
    {
        return [
            'sensor_model' => 'Sensor Model',
            'sensor_brand' => 'Sensor Brand',
        ];
    }
}
