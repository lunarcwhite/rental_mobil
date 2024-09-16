@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Riwayat Transaksi
@endsection
@section('topbarRightButton')
    <a href="{{ route('dashboard') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
Riwayat Transaksi
@endsection
@section('content')
    <div class="section mt-2">
        <div class="wide-block p-0">
            <div class="table-responsive mt-3">
                <table class="table table-striped" id="dataTableWithExportButton">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Order</th>
                            <th>Nama Konsumen</th>
                            <th>Mobil</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Kembali</th>
                            <th>Status Pembayaran</th>
                            <th>Status Rental</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembayarans as $no => $pembayaran)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $pembayaran->kodePembayaran }}</td>
                                <td>{{$pembayaran->user->profile->namaLengkap}}</td>
                                <td>{{ $pembayaran->mobil->namaMobil }}</td>
                                <td>{{ $pembayaran->tanggalMulai }}</td>
                                <td>{{ $pembayaran->tanggalKembali }}</td>
                                <td>
                                    @if ($pembayaran->statusPembayaran == 0)
                                    <span class="badge badge-danger">Belum Dibayar</span>
                                    @else
                                    <span class="badge badge-success">Sudah Dibayar</span>
                                @endif
                                </td>
                                <td>
                                    @if ($pembayaran->statusPembayaran == 2)
                                    <span class="badge badge-danger">Dibatalkan</span>
                                    @elseif ($pembayaran->rental && $pembayaran->rental->statusSelesai == 1)
                                    <span class="badge badge-success">Rental selesai</span>
                                    @elseif ($pembayaran->rental && $pembayaran->rental->statusSelesai == 0 && $pembayaran->rental->statusBerjalan == 1)
                                    <span class="badge badge-primary">Mobil sedang direntalkan</span>
                                    @else
                                    <span class="badge badge-primary">Menunggu masuk periode rental</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('adminRental.riwayatTransaksi.invoice', $pembayaran->id) }}"
                                        class="btn btn-sm btn-primary">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            Tidak Memiliki Riwayat Pembayaran
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
