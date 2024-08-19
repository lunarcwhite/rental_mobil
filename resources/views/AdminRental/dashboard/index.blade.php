@extends('layouts.admin.master')
@section('pageTitle')
    Dashboard
@endsection
@section('content')
    @can('accountNotVerified')
        @can('createProfile')
        <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-light">Pesan dari admin</h6>
        </div>
        <div>
            <div class="customer-message align-items-center m-3">
                <div class="text message-title">
                    <p> Hallo {{ Auth::user()->name }} segera lengkapi profile rental anda agar
                        dapat memulai merentalkan mobil.</p>
                </div>
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#buatProfile"">Klik disini untuk melengkapi profile</button>
            </div>
        </div>
        @include('profile.create')
        @endcan
        @can('accountPending')
        <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-light">Pesan dari admin</h6>
        </div>
        <div>
            <div class="customer-message align-items-center m-3">
                @if ($penolakans->count() > 0)
                <div class="text message-title">
                    <p> Hallo {{ Auth::user()->name }} mohon maaf profile kamu ditolak. Silahkan cek kembali profile yang kamu buat.</p>
                </div> 
                @else
                <div class="text message-title">
                    <p> Hallo {{ Auth::user()->name }} admin sedang memverfikasi profile kamu, proses verifikasi membutuhkan waktu maksimal 1x24 jam.</p>
                </div>                    
                @endif
                <a class="btn btn-sm btn-info" href="{{ route('profile.index') }}">Klik disini untuk melihat profile kamu</a>
            </div>
        </div>
        @endcan
    @endcan
@endsection
