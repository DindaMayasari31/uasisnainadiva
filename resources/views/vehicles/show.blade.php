{{-- filepath: c:\xampp8_212\htdocs\uasdiva\uasdiva\resources\views\vehicles\show.blade.php --}}
@extends('layout.index')

@section('content')
<div class="container mt-4">
    <h2>Detail Kendaraan</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $vehicle->brand }} {{ $vehicle->model }}</h5>
            <p class="card-text"><strong>Plat Nomor:</strong> {{ $vehicle->plate_number }}</p>
            <p class="card-text"><strong>Merk:</strong> {{ $vehicle->brand }}</p>
            <p class="card-text"><strong>Model:</strong> {{ $vehicle->model }}</p>
            <p class="card-text"><strong>Tahun:</strong> {{ $vehicle->year }}</p>
            <p class="card-text"><strong>Warna:</strong> {{ $vehicle->color }}</p>
            <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection