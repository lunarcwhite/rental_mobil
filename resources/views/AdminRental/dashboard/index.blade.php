@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Dashboard
@endsection
@section('pageTitle')
    Dashboard
@endsection
@section('content')
    <div class="section mt-2">
        @can('accountNotVerified')
            @can('createProfile')
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-light">Pesan dari admin</h3>
                </div>
                <div>
                    <div class="customer-message align-items-center m-3">
                        <div class="text message-title">
                            <p> Hallo {{ Auth::user()->name }} segera lengkapi profile rental anda agar
                                dapat memulai merentalkan mobil.</p>
                        </div>
                        <a href="{{ route('profile.create') }}" class="btn btn-sm btn-info">Klik disini
                            untuk melengkapi profile</a>
                    </div>
                </div>
            @endcan
            @can('accountPending')
                <div class="card-header py-3 bg-primary d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-light">Pesan dari admin</h6>
                </div>
                <div>
                    <div class="customer-message align-items-center m-3">
                        @if ($penolakans->count() > 0)
                            <div class="text message-title">
                                <p> Hallo {{ Auth::user()->name }} mohon maaf profile kamu ditolak. Silahkan cek kembali profile
                                    yang
                                    kamu buat.</p>
                            </div>
                        @else
                            <div class="text message-title">
                                <p> Hallo {{ Auth::user()->name }} admin sedang memverfikasi profile kamu, proses verifikasi
                                    membutuhkan
                                    waktu maksimal 1x24 jam.</p>
                            </div>
                        @endif
                        <a class="btn btn-sm btn-info" href="{{ route('profile.index') }}">Klik disini untuk melihat profile
                            kamu</a>
                    </div>
                </div>
            @endcan
        @endcan
        @can('accountVerified')
            <div class="row">
                <div class="col-md-6 mb-1">
                    <div class="card shadow-sm" style="border-radius: 10px;">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded bg-primary text-white p-3 mr-3" style="border-radius: 10px;">
                                <i class="fas fa-car fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="mb-0">Total Mobil</h3>
                                <h1 class="font-weight-bold mb-0">{{ $mobil }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <div class="card shadow-sm" style="border-radius: 10px;">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded bg-info text-white p-3 mr-3" style="border-radius: 10px;">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="mb-0">Total Konsumen</h3>
                                <h1 class="font-weight-bold mb-0">{{ $konsumen }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <div class="card shadow-sm" style="border-radius: 10px;">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded bg-success text-white p-3 mr-3" style="border-radius: 10px;">
                                <i class="fas fa-money-check-alt fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="mb-0">Total Transaksi</h3>
                                <h1 class="font-weight-bold mb-0">{{ $transaksi }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <div class="card shadow-sm" style="border-radius: 10px;">
                        <div class="card-body d-flex align-items-center">
                            <div class="rounded bg-secondary text-white p-3 mr-3" style="border-radius: 10px;">
                                <i class="fas fa-wallet fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="mb-0">Pendapatan Bulan Ini</h3>
                                <h2 class="font-weight-bold mb-0">Rp. {{ $pendapatan }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection
