@extends('layouts.mobile.master')
@section('topbarPageTitle')
    CaRent
@endsection
@section('topbarRightButton')
    <a href="{{ route('pembayaran.index') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('content')
    <div class="section mt-2">
            <h1 class="h3 mb-3">Invoice</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-2">
                        <div class="card-body m-sm-3 m-md-5">
                            <div class="mb-4">
                                Hallo <strong>{{ Auth::user()->profile->namaLengkap }}</strong>, Ini Adalah Rincian
                                Pembayaran Kamu.
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-muted">Pembayaran No. <strong>{{ $pembayaran->kodePembayaran }}</strong>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <div class="text-muted">Tanggal Order <strong>{{ $pembayaran->created_at }}</strong>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-2" />

                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <th></th>
                                        <th class="text-right"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mobil Yang Dirental</td>
                                        <td>{{ $pembayaran->mobil->namaMobil }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Mulai </td>
                                        <td>{{ $pembayaran->tanggalMulai }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Kembali</td>
                                        <td>{{ $pembayaran->tanggalKembali }}</td>
                                    </tr>
                                    <tr>
                                        <td>Durasi Rental</td>
                                        <td>{{ $pembayaran->durasiRental }} Hari</td>
                                    </tr>
                                    @php
                                        $harga = $pembayaran->mobil->harga + ($pembayaran->mobil->harga * 10) / 100;
                                    @endphp
                                    <tr>
                                        <td>Biaya Rental Per Hari</td>
                                        <td>Rp. {{ $harga }}</td>
                                    </tr>
                                    <tr class="mt-1">
                                        <th>Total Pembayaran</th>
                                        <th class="text-right">Rp. {{ $pembayaran->harusBayar }}</th>
                                    </tr>
                                </tbody>
                            </table>
                            <span class="btn btn-block btn-success mt-2">
                                Pembayaran Selesai
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('footer')
    @include('layouts.mobile.partials.footer')
@endsection
