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
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Plat Nomor</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Model</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Aksi</th>
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
</div>
@endsection