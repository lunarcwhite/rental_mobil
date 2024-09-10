@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Kelola Mobil
@endsection
@section('topbarRightButton')
    <a href="{{ route('adminRental.kelolaMobil.create') }}" class="headerButton">
        <span class="btn btn-secondary">Tambah</span>
    </a>
@endsection
@section('pageTitle')
    Kelola Mobil
@endsection
@section('content')
    <div class="section mt-2">
        @forelse ($mobils as $mobil)
            <div class="card mb-2">
                @if ($mobil->gambar == 'test')
                    <img src="{{ asset('img/mobil.jpg') }}" class="card-img-top" alt="image">
                @else
                    <img src="{{ url(Storage::url('mobil/' . $mobil->gambar)) }}" class="card-img-top" height="200px"
                        alt="">
                @endif
                <div class="card-body">
                    @if ($mobil->statusPersetujuan == 0 && $mobil->persetujuanMobil->count() > 0)
                        <h6 class="card-subtitle text-danger">Mobil ditolak oleh admin. Tekan tombol edit untuk mengetahui
                            detailnya.</h6>
                    @elseif ($mobil->statusPersetujuan == 0)
                        <h6 class="card-subtitle text-warning">Mobil sedang ditinjau oleh admin</h6>
                    @endif
                    @if ($mobil->statusAktif == 1)
                        <h5 class="card-title">{{ $mobil->namaMobil }} <span class="text-success"> Aktif</span></h5>
                    @else
                        <h5 class="card-title">{{ $mobil->namaMobil }} <span class="text-warning"> Nonaktif</span></h5>
                    @endif
                    <h3 class="card-text">
                        Harga Rental Rp. {{ $mobil->harga }} / Hari
                    </h3>
                    <div class="fab-button animate dropdown">
                        <button type="button" class="btn btn-primary" data-toggle="dropdown">Aksi</button>
                        <div class="dropdown-menu">
                            <a href="javascript:void(0)" onclick="bagikan('{{ $mobil->id }}')"
                                class="dropdown-item bg-secondary">
                                <ion-icon name="arrow-redo-outline" role="img" class="md hydrated"
                                    aria-label="cube outline"></ion-icon>
                                <p>Bagikan</p>
                            </a>
                            <a href="{{ route('adminRental.kelolaMobil.edit', $mobil->id) }}"
                                class="dropdown-item bg-primary">
                                <ion-icon name="pencil-outline" role="img" class="md hydrated"
                                    aria-label="cube outline"></ion-icon>
                                <p>Edit</p>
                            </a>
                            <form action="{{ route('adminRental.kelolaMobil.aktif', $mobil->id) }}" method="post"
                                id="formAktif">
                                @method('patch')
                                @csrf
                                <input type="hidden" value="{{ $mobil->id }}" name="mobilId">
                                @if ($mobil->statusAktif == 1)
                                    <input type="hidden" value="0" name="statusAktif">
                                    <button type="button" onclick="formConfirmation2('Nonaktifkan mobil ?')"
                                        class="dropdown-item bg-warning">
                                        <ion-icon name="cube-outline" role="img" class="md hydrated"
                                            aria-label="cube outline"></ion-icon>
                                        <p>Nonaktifkan</p>
                                    </button>
                                @else
                                    <input type="hidden" value="1" name="statusAktif">
                                    <button type="button" onclick="formConfirmation2('Aktifkan mobil ?')"
                                        class="dropdown-item bg-warning">
                                        <ion-icon name="cube-outline" role="img" class="md hydrated"
                                            aria-label="cube outline"></ion-icon>
                                        <p>Aktifkan</p>
                                    </button>
                                @endif
                            </form>
                            <form action="{{ route('adminRental.kelolaMobil.destroy', $mobil->id) }}" method="post"
                                id="formDeleteMobil">
                                @method('delete')
                                @csrf
                                <button type="button" onclick="formConfirmation2('Hapus mobil ?')"
                                    class="dropdown-item bg-danger"
                                    onclick="formConfirmation('Hapus mobil {{ $mobil->namaMobil }}')">
                                    <ion-icon name="trash-outline" role="img" class="md hydrated"
                                        aria-label="cube outline"></ion-icon>
                                    <p>Hapus</p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            Rental belum memiliki mobil
        @endforelse
    </div>
    <div>
        {{ $mobils->links('pagination::bootstrap-4') }}
    </div>
    <br />
    @push('js')
        <script>
            // Fungsi untuk menyalin link
            function bagikan(id) {
                var domain = `{{ request()->getHost() }}`;
                if (domain == 'localhost') {
                    domain = `${domain}:8000/mobil/${id}`;
                } else {
                    domain = `${domain}/mobil/${id}`;
                }

                navigator.clipboard.writeText(domain).then(function() {
                    // Menampilkan pesan setelah menyalin
                    toastbox('toast-12', 1500)
                }).catch(function(err) {
                    // Menampilkan pesan error jika ada masalah
                    var message = document.getElementById("message");
                    message.innerHTML = "Gagal menyalin link: " + err;
                });
            }
        </script>
    @endpush
@endsection
