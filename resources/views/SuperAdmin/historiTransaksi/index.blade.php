@extends('layouts.desktop.master')
@section('pageTitle')
    Histori Transaksi
@endsection
@section('content')
  <hr/>
  <div class="table-responsive mt-3">
    <table class="table table-striped" id="dataTableLandscape">
        <thead>
            <tr>
                <th>#</th>
                <th>No Order</th>
                <th>Mobil</th>
                <th>Nama Rental</th>
                <th>Nama Perental</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Kembali</th>
                <th>Status Pembayaran</th>
                <th>Total Pembayaran</th>
                <th>Pendapatan Aplikasi</th>
                <th>Pendapatan Rental</th>
                <th>Status Rental</th>
                <th>Invoice</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayarans as $no => $pembayaran)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $pembayaran->kodePembayaran }}</td>
                    <td>{{ $pembayaran->mobil->namaMobil }}</td>
                    <td>{{ $pembayaran->profileRental->namaRental }}</td>
                    <td>{{ $pembayaran->user->profile->namaLengkap }}</td>
                    <td>{{ $pembayaran->tanggalMulai }}</td>
                    <td>{{ $pembayaran->tanggalKembali }}</td>
                    <td>
                        @if ($pembayaran->statusPembayaran == 0)
                            <span class="badge badge-danger">Belum Dibayar</span>
                        @else
                            <span class="badge badge-success">Sudah Dibayar</span>
                        @endif
                    </td>
                    <td>{{ $pembayaran->totalBayar }}</td>
                    <td>{{ $pembayaran->pendapatanRental }}</td>
                    <td>{{ $pembayaran->pendapatanAplikasi }}</td>
                    <td>
                        @if ($pembayaran->rental && $pembayaran->rental->statusSelesai == 1)
                        <span class="badge badge-success">Rental selesai</span>   
                        @elseif ($pembayaran->rental)
                        <span class="badge badge-primary">Mobil sedang direntalkan</span>
                        @elseif (date('Y-m-d') >= $pembayaran->tanggalMulai && date('Y-m-d') <= $pembayaran->tanggalKembali)
                            <span class="badge badge-primary">Dalam periode rental</span>
                        @else
                        <span class="badge badge-primary">Menunggu masuk periode rental</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('superAdmin.historiTransaksi.invoice', $pembayaran->id) }}"
                            class="btn btn-sm btn-info">Lihat</a>
                    </td>
                </tr>
            @empty
                Tidak Memiliki Histori Transaksi
            @endforelse
        </tbody>
    </table>
</div>
@endsection
