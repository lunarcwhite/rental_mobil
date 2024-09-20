@extends('layouts.desktop.master')
@section('pageTitle')
    Laporan Pendapatan
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('adminRental.laporanKeuangan.index') }}" method="get">
            <div class="form-row">
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
            <table class="table table-bordered table-hover" id="dataTableWithExportButton">
                <thead class="thead">
                    <tr>
                        <th>No</th>
                        <th>No Order</th>
                        <th>Rental</th>
                        <th>Mobil</th>
                        <th>Konsumen</th>
                        <th>Pendapatan</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendapatans as $no => $pendapatan)
                    <tr>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $pendapatan->kodePembayaran }}</td>
                        <td>{{ $pendapatan->profileRental->namaRental }}</td>
                        <td>{{ $pendapatan->mobil->namaMobil }}</td>
                        <td>{{ $pendapatan->user->profile->namaLengkap }}</td>
                        <td>Rp. {{ $pendapatan->pendapatanAplikasi }}</td>
                        <td>
                            <a href="{{ route('superAdmin.historiTransaksi.invoice', $pendapatan->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-weight-bold">
                        <td colspan="3" class="text-right">Total Transaksi</td>
                        <td colspan="4" class="text-right">{{ $pendapatans->count() }}</td>
                    </tr>
                    <tr class="font-weight-bold">
                        <td colspan="3" class="text-right">Total Pendapatan</td>
                        <td colspan="4" class="text-right">Rp. {{ $pendapatans->sum('pendapatanAplikasi') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
