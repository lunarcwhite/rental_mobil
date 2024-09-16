@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Daftar Transaksi Berjalan
@endsection
@section('topbarRightButton')
    <a href="{{ route('dashboard') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
    Daftar Transaksi Berjalan
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
                            <th>Mobil</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Kembali</th>
                            <th>Status Pembayaran</th>
                            <th>Status Rental</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembayarans as $no => $pembayaran)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $pembayaran->kodePembayaran }}</td>
                                <td>{{ $pembayaran->mobil->namaMobil }}</td>
                                <td>{{ $pembayaran->tanggalMulai }}</td>
                                <td>{{ $pembayaran->tanggalKembali }}</td>
                                <td>
                                    @if ($pembayaran->statusPembayaran == 0)
                                        <span class="badge badge-danger">Belum Dibayar</span>
                                    @elseif($pembayaran->statusPembayaran == 1)
                                        <span class="badge badge-success">Sudah Dibayar</span>
                                    @else
                                        <span class="badge badge-warning">Dibatalkan</span>
                                    @endif
                                </td>
                                <td>
                                    @if (date('Y-m-d') < $pembayaran->tanggalMulai)
                                        <span class="badge badge-primary">Menunggu masuk periode rental</span>
                                    @elseif ($pembayaran->rental && $pembayaran->rental->statusSelesai == 1)
                                        <span class="badge badge-success">Rental selesai</span>
                                    @elseif ($pembayaran->rental && $pembayaran->rental->statusBerjalan == 1)
                                        <span class="badge badge-primary">Mobil sedang direntalkan</span>
                                    @else
                                        <span class="badge badge-primary">Menunggu masuk periode rental</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($pembayaran->rental && $pembayaran->rental->statusBerjalan == 1)
                                        <form action="{{ route('adminRental.transaksi.finish', $pembayaran->id) }}"
                                            method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="button" onclick="formConfirmation('Selesaikan Periode Rental?')"
                                                class="btn btn-sm btn-secondary">Selesaikan Rental</button>
                                        </form>
                                    @elseif (date('Y-m-d') >= $pembayaran->tanggalMulai && date('Y-m-d') <= $pembayaran->tanggalKembali)
                                        <form action="{{ route('adminRental.transaksi.mulai', $pembayaran->id) }}"
                                            method="post">
                                            @csrf
                                            <button type="button" onclick="formConfirmation('Mulai Periode Rental?')"
                                                class="btn btn-sm btn-warning">Mulai Rental</button>
                                        </form>
                                        <form action="{{ route('adminRental.transaksi.batalkan', $pembayaran->id) }}"
                                            method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="button" onclick="formConfirmation('Batalkan Rental Ini?')"
                                                class="btn btn-sm btn-danger">Batalkan Order</button>
                                        </form>
                                    @else
                                        <form action="{{ route('adminRental.transaksi.batalkan', $pembayaran->id) }}"
                                            method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="button" onclick="formConfirmation('Batalkan Rental Ini?')"
                                                class="btn btn-sm btn-danger">Batalkan Order</button>
                                        </form>
                                    @endif
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
