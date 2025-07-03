{{-- filepath: c:\xampp8_212\htdocs\uasdiva\uasdiva\resources\views\vehicles\index.blade.php --}}
@extends('layout.index')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Kendaraan</h2>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Tambah Kendaraan</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Plat Nomor</th>
                <th>Merk</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Warna</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $vehicle->plate_number }}</td>
                <td>{{ $vehicle->brand }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->year }}</td>
                <td>{{ $vehicle->color }}</td>
                <td>
                    <a href="{{ route('vehicles.show', $vehicle) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if($vehicles->isEmpty())
            <tr>
                <td colspan="7" class="text-center">Data kendaraan belum ada.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection