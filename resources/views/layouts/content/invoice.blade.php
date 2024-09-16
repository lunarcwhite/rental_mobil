<h1 class="h3 mb-3">
    Invoice Pembayaran</h1>
<div class="row">
    <div class="col-12">
        <div class="card mb-2">
            <div class="card-body m-sm-3 m-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4 font-weight-bold">
                            <h4>Rincian Pembayaran</h4>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-right">
                        @if ($pembayaran->statusPembayaran == 2)
                        <span class="badge badge-danger">Rental Dibatalkan</span>
                    @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-muted">Pembayaran Rental No. <strong>{{ $pembayaran->kodePembayaran }}</strong>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <div class="text-muted">Tanggal Order <strong>{{ $pembayaran->created_at }}</strong>
                        </div>
                    </div>
                </div>
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
                            <td>Nama Rental</td>
                            <td>{{ $pembayaran->profileRental->namaRental }}</td>
                        </tr>
                        <tr>
                            <td>Nama Perental</td>
                            <td>{{ $pembayaran->user->profile->namaLengkap }}</td>
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
                        <div id="biayaRental">
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
                        </div>
                    </tbody>
                </table>
                <span class="btn btn-block btn-success mt-2">
                    Pembayaran Selesai
                </span>
            </div>
        </div>
    </div>
</div>
