@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Lacak Mobil
@endsection
@section('topbarRightButton')
    <a href="{{ route('dashboard') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
Lacak Mobil
@endsection
@section('content')
    <div class="section mt-2">
        <div class="wide-block p-0">
            <div class="table-responsive mt-3">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mobil</th>
                            <th>No Plat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mobils as $no => $mobil)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $mobil->mobil->namaMobil }}</td>
                                <td>{{$mobil->mobil->platMobil}}</td>
                                <td>
                                    <a href="{{ route('adminRental.trackingGps.show', $mobil->id) }}"
                                        class="btn btn-sm btn-primary">Lacak</a>
                                </td>
                            </tr>
                        @empty
                            Belum ada mobil yang dipasangi gps
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
