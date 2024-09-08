@extends('layouts.mobile.master')
@section('topbarPageTitle')
DaRental
@endsection
@section('pageTitle')
DaRental
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
                        <p> Hallo {{ Auth::user()->name }} segera lengkapi profile anda agar
                            dapat memulai merental mobil.</p>
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
                            <p> Hallo {{ Auth::user()->name }} mohon maaf profile kamu ditolak. Silahkan cek kembali profile yang
                                kamu buat.</p>
                        </div>
                    @else
                        <div class="text message-title">
                            <p> Hallo {{ Auth::user()->name }} admin sedang memverfikasi profile kamu, proses verifikasi membutuhkan
                                waktu maksimal 1x24 jam.</p>
                        </div>
                    @endif
                    <a class="btn btn-sm btn-info" href="{{ route('profile.index') }}">Klik disini untuk melihat profile kamu</a>
                </div>
            </div>
        @endcan
    @endcan
</div>
@endsection
