@extends('layouts.mobile.master')
@section('topbarPageTitle')
    CaRent
@endsection
@section('topbarRightButton')
    <a href="javascript:;" class="headerButton" data-toggle="modal" data-target="#cariMobil">
        <ion-icon name="search-outline"></ion-icon>
    </a>
@endsection
@section('pageTitle')
    CaRent
@endsection
@section('content')
    <div class="section mt-2">
        @forelse ($mobils as $mobil)
            @auth
                @if ($blacklists->where('userId', Auth::user()->id)->where('profileRentalId', $mobil->profileRentalId)->count() < 1)
                    <div class="card mb-2 mt-2">
                        @if ($mobil->gambar == 'test')
                            <img src="{{ asset('img/mobil.jpg') }}" class="card-img-top" height="200px" alt="image">
                        @else
                            <img src="{{ url(Storage::url('mobil/' . $mobil->gambar)) }}" class="card-img-top"
                                height="200px" alt="image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $mobil->namaMobil }}</h5>
                            <h6 class="card-subtitle">{{ $mobil->profileRental->alamatRental }}</h6>
                            <p class="card-title">
                                @php
                                    $harga = $mobil->harga + ($mobil->harga * 10) / 100;
                                @endphp
                                Rp. {{ $harga }} / Hari
                            </p>
                            <a href="{{ route('landingPage.show', $mobil->id) }}" class="btn btn-primary">
                                <ion-icon name="layers-outline" role="img" class="md hydrated"
                                    aria-label="layers outline"></ion-icon>
                                Rental Sekarang
                            </a>
                        </div>
                    </div>
                @endif
            @endauth
            @guest
                <div class="card mb-2 mt-2">
                    @if ($mobil->gambar == 'test')
                        <img src="{{ asset('img/mobil.jpg') }}" class="card-img-top" height="200px" alt="image">
                    @else
                        <img src="{{ url(Storage::url('mobil/' . $mobil->gambar)) }}" class="card-img-top" height="200px"
                            alt="image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $mobil->namaMobil }}</h5>
                        <h6 class="card-subtitle">{{ $mobil->profileRental->alamatRental }}</h6>
                        <p class="card-title">
                            @php
                                $harga = $mobil->harga + ($mobil->harga * 10) / 100;
                            @endphp
                            Rp. {{ $harga }} / Hari
                        </p>
                        <a href="{{ route('landingPage.show', $mobil->id) }}" class="btn btn-primary">
                            <ion-icon name="layers-outline" role="img" class="md hydrated"
                                aria-label="layers outline"></ion-icon>
                            Rental Sekarang
                        </a>
                    </div>
                </div>
            @endguest
        @empty
            Data Kosong
        @endforelse
    </div>
    {{ $mobils->withQueryString()->links('pagination::bootstrap-4') }}
    <br />
    @include('LandingPage.cari')
@endsection
@section('footer')
    @include('layouts.mobile.partials.footer')
@endsection
