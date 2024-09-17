@extends('layouts.desktop.master')
@section('pageTitle')
    Kelola GPS
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Mobil</th>
                    <th>No Plat</th>
                    <th>Status GPS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mobils as $no => $mobil)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $mobil->namaMobil }}</td>
                        <td>{{ $mobil->platMobil }}</td>
                        <td>
                            @if ($mobil->gps == null)
                                <span class="badge badge-danger">GPS Belum Dipasang</span>
                            @else
                                <span class="badge badge-success">GPS Sudah Dipasang</span>
                            @endif
                        </td>
                        <td>
                            @if ($mobil->gps == null)
                                <a href="{{ route('superAdmin.gps.create', $mobil->id) }}" class="btn btn-primary">Pasang</a>
                            @else
                                <a href="{{ route('superAdmin.gps.edit', $mobil->id) }}" class="btn btn-info">Perbarui</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <h1>Data kosong</h1>
                    <hr />
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
