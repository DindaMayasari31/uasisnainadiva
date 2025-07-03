<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plate_number' => 'required|unique:vehicles',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
        ], [
            'plate_number.required' => 'Plat nomor wajib diisi.',
            'plate_number.unique' => 'Plat nomor sudah terdaftar.',
            'brand.required' => 'Merk wajib diisi.',
            'model.required' => 'Model wajib diisi.',
            'year.required' => 'Tahun wajib diisi.',
            'year.integer' => 'Tahun harus berupa angka.',
            'color.required' => 'Warna wajib diisi.',
        ]);

        Vehicle::create($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'plate_number' => 'required|unique:vehicles,plate_number,' . $vehicle->id,
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
        ], [
            'plate_number.required' => 'Plat nomor wajib diisi.',
            'plate_number.unique' => 'Plat nomor sudah terdaftar.',
            'brand.required' => 'Merk wajib diisi.',
            'model.required' => 'Model wajib diisi.',
            'year.required' => 'Tahun wajib diisi.',
            'year.integer' => 'Tahun harus berupa angka.',
            'color.required' => 'Warna wajib diisi.',
        ]);

        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
