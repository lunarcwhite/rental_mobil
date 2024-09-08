@extends('layouts.desktop.master')
@section('pageTitle')
    Profile
@endsection
@section('content')
    @include('layouts.content.alasanPenolakan')
    <form id="setujuiAkun">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile Pengguna</h4>
            </div>
            <div class="card-body">
                @include('form.editProfileForm')
            </div>
        </div>
        @if ($profile->user->roleId == 2)
            @cannot('Konsumen')
                <div class="card mt-2 mb-2">
                    <div class="card-header">
                        <h4 class="card-title">Profile Rental</h4>
                    </div>
                    <div class="card-body">
                        @include('form.editProfileRentalForm')
                    </div>
                </div>
            @endcannot
        @endif
    </form>
    <form action="{{ route('superAdmin.persetujuanAkun.setujui', $profile->userId) }}" method="post">
        @csrf
        <button type="button" onclick="formConfirmation('Setujui Akun Ini?')"
            class="btn btn-primary float-right">Setujui</button>
    </form>
    <button type="button" data-toggle="modal" data-target="#tolakAkun"
        class="mr-3 ml-3 btn btn-danger float-right">Tolak</button>

    @include('profile.kyc')
    @include('SuperAdmin.persetujuanAkun.tolak')
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
