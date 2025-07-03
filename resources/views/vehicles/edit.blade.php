@extends('layout.index')

@section('content')
<div class="container mt-4">
    <h2>Edit Kendaraan</h2>
    <form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="plate_number" class="form-label">Plat Nomor</label>
            <input type="text" class="form-control @error('plate_number') is-invalid @enderror" id="plate_number" name="plate_number" value="{{ old('plate_number', $vehicle->plate_number) }}">
            @error('plate_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Merk</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $vehicle->brand) }}">
            @error('brand') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model', $vehicle->model) }}">
            @error('model') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $vehicle->year) }}">
            @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Warna</label>
            <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', $vehicle->color) }}">
            @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection