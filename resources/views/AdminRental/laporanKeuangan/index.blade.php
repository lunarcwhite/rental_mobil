@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Laporan Keuangan
@endsection
@section('topbarRightButton')
    <a href="{{ route('dashboard') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
Laporan Keuangan
@endsection
@section('content')
    <div class="section mt-2">
        <!-- Card Header -->
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Ringkasan Laporan Bulanan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('adminRental.laporanKeuangan.index') }}" method="get">
                    <div class="form-row justify-content-center">
                        <!-- Filter Bulan -->
                        <div class="form-group col-md-3">
                            <label for="filterBulan">Pilih Bulan dan Tahun</label>
                            <input type="month" name="filter" class="form-control">
                        </div>

                        <!-- Tombol Filter -->
                        <div class="form-group col-md-2 align-self-end">
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">

            <!-- Card Body: Tabel Laporan Keuangan -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTableWithExportButton">
                        <thead class="thead">
                            <tr>
                                <th>No</th>
                                <th>No Order</th>
                                <th>Mobil</th>
                                <th>Perental</th>
                                <th>Pendapatan</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalPendapatan = 0;
                            @endphp
                            @foreach ($pendapatans as $no => $pendapatan)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $pendapatan->pembayaran->kodePembayaran }}</td>
                                <td>{{ $pendapatan->mobil->namaMobil }}</td>
                                <td>{{ $pendapatan->user->profile->namaLengkap }}</td>
                                <td>Rp. {{ $pendapatan->pembayaran->pendapatanRental }}</td>
                                <td>
                                    <a href="{{ route('adminRental.riwayatTransaksi.invoice', $pendapatan->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                </td>
                            </tr>
                            @php
                                $totalPendapatan += $pendapatan->pembayaran->pendapatanRental;
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td colspan="3" class="text-right">Total Transaksi</td>
                                <td colspan="3" class="text-right">{{ $pendapatans->count() }}</td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td colspan="3" class="text-right">Total Pendapatan</td>
                                <td colspan="3" class="text-right">Rp. {{ $totalPendapatan }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
