@extends('layouts.desktop.master')
@section('pageTitle')
    Data Mobil
@endsection
@section('content')
@include('layouts.desktop.content.alasanPenolakan')
    <div class="card">
        <div class="card-body">
            <form id="setujuiAkun">
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
    @include('')
    @include('SuperAdmin.persetujuanMobil.tolak')
    @push('js')
    <script>
        let kyc = document.getElementById('kyc');
        let kycHelp = document.getElementById('kycHelp');

        if (kyc) {
            kyc.remove(); // Menghapus elemen dari DOM
            kycHelp.remove(); // Menghapus elemen dari DOM
        }

        const formElements = document.querySelectorAll('#setujuiAkun input');

        // Tambahkan atribut disabled ke semua elemen
        formElements.forEach(element => {
            element.disabled = true;
        });

        const kecamatanDisable = document.getElementById('kecamatan');

        // Tambahkan atribut disabled
        kecamatanDisable.disabled = true;

        const desaDisable = document.getElementById('desa');

        // Tambahkan atribut disabled
        desaDisable.disabled = true;

        const desaRentalDisable = document.getElementById('desaRental');

        // Tambahkan atribut disabled
        desaRentalDisable.disabled = true;

        const kecamatanRentalDisable = document.getElementById('kecamatanRental');

        // Tambahkan atribut disabled
        kecamatanRentalDisable.disabled = true;
    </script>
    @endpush
@endsection
