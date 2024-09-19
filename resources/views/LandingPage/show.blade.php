@extends('layouts.mobile.master')
@section('topbarPageTitle')
    CaRent
@endsection
@section('topbarRightButton')
    <a href="page-blogpost.html#" class="headerButton" data-toggle="modal" data-target="#actionSheetShare">
        <ion-icon name="share-social-outline"></ion-icon>
    </a>
    {{-- <form action="" method="post">
        <a href="{{ route('chat', encrypt($mobil->id)) }}" class="headerButton">
            <ion-icon name="chatbubbles-outline"></ion-icon>
        </a>
    </form> --}}
@endsection
@section('content')
    <div class="blog-post">
        <div class="mb-2">
            @if ($mobil->gambar == 'test')
                <img src="{{ asset('img/mobil.jpg') }}" class="imaged square w-100" alt="image">
            @else
                <img src="{{ url(Storage::url('mobil/' . $mobil->gambar)) }}" class="imaged square w-100" alt="image">
            @endif
        </div>
        <h1 class="title">{{ $mobil->namaMobil }}</h1>
        <div class="text-muted title">
            <ion-icon name="location"></ion-icon>
            {{ $mobil->profileRental->alamatRental }}
        </div>
        <div class="title">
            @php
                $harga = $mobil->harga + ($mobil->harga * 10) / 100;
            @endphp
            <h2> Rp. {{ $harga }} / Hari </h2>
        </div>
        <div class="post-header">
            <div>
                <a>
                    <img src="{{ asset('img/profile.jpg') }}" alt="avatar" class="imaged w24 rounded mr-05">
                    {{ $mobil->profileRental->namaRental }} &nbsp; &nbsp; &nbsp; &nbsp;<span><i class="fab fa-whatsapp"></i> {{ $mobil->profileRental->noHpRental }}</span>
                </a>
            </div>
            Bergabung sejak {{ $mobil->profileRental->created_at->format('m-Y') }}
        </div>

        <div class="section mb-2">
            <div class="row">
                <div class="col-4">
                    <span><i class="fas fa-cogs"></i> {{ $mobil->gigi }}</span>
                </div>
                <div class="col-4">
                    <span><i class="fas fa-users"></i> {{ $mobil->jumlahKursi }}+ Kursi</span>
                </div>
                <div class="col-4">
                    <span><i class="fas fa-gas-pump"></i> {{ $mobil->bahanBakar }}</span>
                </div>
            </div>
        </div>
        <div class="divider mb-1"></div>

        <div class="post-body">
            {{ $mobil->deskripsi }}
        </div>
    </div>


    <div class="section mt-4">
        @auth

        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
            data-target="#durasiRental">
            Rental Sekarang
        </button>
        @endauth

    </div>

    <div class="divider mt-4 mb-3"></div>

    <div class="section">
        <div class="section-title mb-1">
            <h3 class="mb-0">Review ({{ $ratings->count() }})</h3>
        </div>
        <div class="pt-2 pb-2">
            <!-- comment block -->
            @forelse ($ratings as $rating)
            <div class="comment-block">
                <!--item -->
                <div class="item">
                    <div class="avatar">
                        <img src="{{ asset('mobile/assets/img/sample/avatar/avatar1.jpg') }}" alt="avatar"
                            class="imaged w32 rounded">
                    </div>
                    <div class="in">
                        <div class="comment-header">
                            <h4 class="title">{{ $rating->user->profile->namaLengkap }}</h4>
                            <span class="time">{{ $rating->created_at }}</span>
                        </div>
                        <div class="text">
                            {{ $rating->ulasan }}
                        </div>
                        <div class="comment-footer">
                            @for ($i = 1; $i <= $rating->bintang; $i++)
                            <ion-icon name="star"></ion-icon>
                            @endfor
                        </div>
                    </div>
                </div>
                <!-- * item -->
            </div>
            @empty

            @endforelse
            <!-- * comment block -->
        </div>
    </div>
    @include('LandingPage.share')
    @include('LandingPage.durasiRental')
@endsection
@section('footer')
    @include('layouts.mobile.partials.footer')
@endsection
