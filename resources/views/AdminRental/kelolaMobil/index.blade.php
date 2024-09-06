@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Kelola Mobil
@endsection
@section('topbarRightButton')
    <a href="{{ route('adminRental.kelolaMobil.create') }}" class="headerButton">
        <span class="btn btn-outline-primary">Tambah</span>
    </a>
@endsection
@section('pageTitle')
    Kelola Mobil
@endsection
@section('content')
    @forelse ($mobils as $mobil)
        <div class="card mb-2">
            <img src="{{ url(Storage::url('mobil/' . $mobil->gambar)) }}" class="card-img-top" height="200px" alt="">
            <div class="card-body">
                @if ($mobil->statusPersetujuan == 0)
                    <h6 class="card-subtitle text-warning">Mobil sedang ditinjau oleh admin</h6>
                @endif
                <h5 class="card-title">{{ $mobil->namaMobil }}</h5>
                <h3 class="card-text">
                    Harga Rental Rp. {{ $mobil->harga }}
                </h3>
                <form action="{{ route('adminRental.kelolaMobil.destroy', $mobil->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <a href="{{ route('adminRental.kelolaMobil.edit', $mobil->id) }}" class="btn btn-sm btn-primary">
                        <ion-icon name="pencil-outline" role="img" class="md hydrated"
                            aria-label="cube outline"></ion-icon>
                        Edit
                    </a>
                    <a href="app-components.html" class="btn btn-sm btn-warning">
                        <ion-icon name="cube-outline" role="img" class="md hydrated"
                            aria-label="cube outline"></ion-icon>
                        Nonaktifkan
                    </a>
                    <button type="button" class="btn btn-sm btn-danger"
                        onclick="formConfirmation('Hapus mobil {{ $mobil->namaMobil }}')">
                        <ion-icon name="trash-outline" role="img" class="md hydrated"
                            aria-label="cube outline"></ion-icon>
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        Rental belum memiliki mobil
    @endforelse
@endsection
