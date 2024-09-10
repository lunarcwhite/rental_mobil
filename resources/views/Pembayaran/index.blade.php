@extends('layouts.mobile.master')
@section('topbarPageTitle')
    CaRent
@endsection
@section('topbarRightButton')
    <a href="{{ route('landingPage') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('content')
    <div class="section mt-2">
        <div class="wide-block p-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Order</th>
                            <th>Total Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembayarans as $no => $pembayaran)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $pembayaran->kodePembayaran }}</td>
                            <td>Rp. {{ $pembayaran->harusBayar }}</td>
                            <td>
                                @if ($pembayaran->statusPembayaran == 0)
                                    <span class="badge badge-danger">Belum Dibayar</span>
                                @else
                                <span class="badge badge-success">Sudah Dibayar</span>
                                @endif
                            </td>
                            <td>
                                @if ($pembayaran->statusPembayaran == 0)
                                    <a href="{{ route('pembayaran.checkout', $pembayaran->id) }}" class="btn btn-sm btn-warning">Bayar</a>                               
                                @else
                                <a href="{{ route('pembayaran.invoice', $pembayaran->id) }}" class="btn btn-sm btn-primary">Lihat</a>                                
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
@section('footer')
    @include('layouts.mobile.partials.footer')
@endsection

