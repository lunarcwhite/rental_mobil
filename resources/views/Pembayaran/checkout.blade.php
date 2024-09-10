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
        @if ($pembayaran != null)
            <h1 class="h3 mb-3">Rincian Pembayaran</h1>

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
                                    <div class="text-muted">Pembayaran No.
                                        <strong>{{ $pembayaran->kodePembayaran }}</strong>
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
                                        <th>Total Harus Dibayar</th>
                                        <th class="text-right">Rp. {{ $pembayaran->harusBayar }}</th>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($pembayaran->statusPembayaran == 0)
                                <div class="text-center mt-3">

                                    <button id="pay-button" class="btn btn-block btn-primary">
                                        Bayar Sekarang
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            Anda Tidak Memiliki Order
        @endif
    </div>
@endsection
@section('footer')
    @include('layouts.mobile.partials.footer')
@endsection
@push('js')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    setTimeout(function() {
                        window.location.href = "{{ route('pembayaran.invoice', $pembayaran->id) }}";
                    }, 1000);
                    //   alert("payment success!"); console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endpush
