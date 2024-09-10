@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Riwayat Rental
@endsection
@section('topbarRightButton')
    <a href="{{ route('landingPage') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
    Riwayat Rental
@endsection
@section('content')
    <div class="section mt-2">
        @forelse ($rentals as $rental)
            <div class="card rounded-lg p-3">
                <div class="d-flex">
                    @if ($rental->mobil->gambar == 'test')
                        <img src="{{ asset('img/mobil.jpg') }}" class="mr-3 img-thumbnail" width="5px" alt="product-image">
                    @else
                        <img src="{{ url(Storage::url('mobil/' . $rental->mobil->gambar)) }}" width="120px"
                            class="mr-3 img-thumbnail" alt="product-image">
                    @endif
                    <div>
                        <h2><a href="{{ route('landingPage.show', $rental->mobil->id) }}"
                                class="mb-1 font-weight-bold">{{ $rental->mobil->namaMobil }}</a></h2>
                        <span class="mb-1">Mulai rental :</span>
                        <p class="lead">{{ $rental->pembayaran->tanggalMulai }}</p>
                        <span class="mb-1">Selesai rental :</span>
                        <p class="lead">{{ $rental->pembayaran->tanggalKembali }}</p>
                    </div>
                </div>

                <hr />

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0">Total Pembayaran</p>
                        <h2 class="font-weight-bold mb-0">Rp. {{ $rental->pembayaran->totalBayar }} </h2>
                    </div>
                    @if ($rental->statusSelesai == 1)
                        <span class="badge badge-rounded badge-success">Selesai</span>
                    @else
                        <span class="badge badge-rounded badge-info">Berjalan</span>
                    @endif
                </div>
                <div class="mt-2">
                    @if ($rating->where('mobilId', $rental->mobil->id)->first() == null)
                        <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#ratingMobilModal">Beri
                            Rating Mobil</button>
                        @include('Konsumen.riwayatRental.createRatingMobil')
                    @elseif($rating->where('mobilId', $rental->mobil->id)->first())
                    @php
                    $dataRating = $rating->where('mobilId', $rental->mobil->id)->first();
                    @endphp
                        @include('Konsumen.riwayatRental.editRatingMobil')
                        <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#ratingMobilModal">Lihat
                            Rating Mobil</button>
                    @endif
                </div>
            </div>
        @empty
            <h2>Belum memiliki riwayat rental</h2>
        @endforelse
    </div>
@endsection
@section('footer')
    @include('layouts.mobile.partials.footer')
@endsection
