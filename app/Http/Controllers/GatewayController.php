<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use App\Models\Location;
use Illuminate\Http\Request;

class GatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gateways = Gateway::all() ?? collect();
        
        return view('pages.configurations.gateways.index', compact('gateways'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $locations = Location::all();
        // dd($locations);
        return view('pages.configurations.gateways.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'customer_code' => 'required',
            'gateway' => 'required',
            'gateway_code' => 'required|unique:gateways,gateway_code',
            'description' => 'max:150',

        ]);

        $gateway = new Gateway($request->all());
        $gateway->save();

        return redirect()->route('gateways.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gateway $gateway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gateway $gateway)
    {
        $locations = Location::all();
        return view('pages.configurations.gateways.create', compact('gateway'), compact('locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gateway $gateway)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'gateway_code' => 'required|unique:gateways,gateway_code,' . $gateway->id,

        ]);

        $gateway->update($request->all());

        return redirect()->route('gateways.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gateway $gateway)
    {
        $gateway->delete();
        return redirect()->route('gateways.index');
    }
}
