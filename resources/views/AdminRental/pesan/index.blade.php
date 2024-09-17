@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Pesan
@endsection
@section('pageTitle')
    Pesan
@endsection
@section('content')
    <div class="section mt-2">
        <ul class="listview image-listview">
            @forelse ($pesans as $pesan)
            <li>
                <a href="{{ route('adminRental.pesan.show', $pesan->channel) }}" class="item">
                    <img src="{{ asset('mobile/assets/img/sample/avatar/avatar3.jpg') }}" alt="image" class="image">
                    <div class="in">
                        <div>{{ $pesan->user->profile->namaLengkap }}</div>
                        {{-- <span class="text-muted">Designer</span> --}}
                    </div>
                </a>
            </li>
            @empty
                <p>Tidak ada pesan masuk</p>
            @endforelse
        </ul>
    </div>
@endsection
