@extends('layouts.desktop.master')
@section('pageTitle')
    Data Mobil
@endsection
@section('content')
@include('layouts.content.alasanPenolakan')
    <div class="card">
        <div class="card-body">
            <form id="setujuiMobil">
                @include('form.editMobilForm')
            </form>
            <form action="{{ route('superAdmin.persetujuanMobil.setujui', $mobil->id) }}" method="post">
                @csrf
                <button type="button" onclick="formConfirmation('Setujui Mobil Ini?')"
                    class="btn btn-primary float-right">Setujui</button>
            </form>
                <button type="button" data-toggle="modal"
                data-target="#tolakMobil" class="mr-3 ml-3 btn btn-danger float-right">Tolak</button>
        </div>
    </div>
    @include('AdminRental.kelolaMobil.foto')
    @include('SuperAdmin.persetujuanMobil.tolak')
    @push('js')
    <script>
        let gambarMobil = document.getElementById('gambarMobil');

        if (gambarMobil) {
            gambarMobil.remove(); // Menghapus elemen dari DOM
        }

        const formElements = document.querySelectorAll('#setujuiMobil input');

        // Tambahkan atribut disabled ke semua elemen
        formElements.forEach(element => {
            element.disabled = true;
        });

    </script>
    @endpush
@endsection
