@extends('layouts.desktop.master')
@section('pageTitle')
    Persetujuan Mobil
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Rental</th>
                    <th>Nama Mobil</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mobils as $no => $mobil)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $mobil->profileRental->namaRental }}</td>
                        <td>{{ $mobil->namaMobil }}</td>
                        @if ($mobil->statusPersetujuan == 0 && $mobil->persetujuanMobil->count() > 0)
                        <td>
                            <span class="badge badge-danger">Telah ditolak</span>
                        </td>
                        @elseif($mobil->statusPersetujuan == 0)
                        <td>
                            <span class="badge badge-warning">Memerlukan Persetujuan</span>
                        </td>
                        @endif
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('superAdmin.persetujuanMobil.mobil', $mobil->id) }}" class="btn btn-sm btn-info">
                                    Lihat
                                </a>
                            </div>
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
