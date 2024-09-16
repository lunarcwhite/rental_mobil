@extends('layouts.desktop.master')
@section('pageTitle')
    Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-6 mb-3">
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
    <div class="col-6 mb-3">
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
    <div class="col-6 mb-3">
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
    <div class="col-6 mb-3">
        <div class="card shadow-sm" style="border-radius: 10px;">
            <div class="card-body d-flex align-items-center">
                <div class="rounded bg-secondary text-white p-3 mr-3" style="border-radius: 10px;">
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                </div>
                <div>
                    <h3 class="mb-0">Total Rental</h3>
                    <h1 class="font-weight-bold mb-0">Rp. {{ $rental }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection