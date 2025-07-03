<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // index
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    // create
    public function create()
    {
        return view('vehicles.create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'plate_number' => 'required|unique:vehicles',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
        ]);

        Vehicle::create($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    // show
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    // edit
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    // update
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'plate_number' => 'required|unique:vehicles,plate_number,' . $vehicle->id,
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
        ]);

        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    // destroy
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
