@extends('layouts.admin.master')
@section('pageTitle')
    Profile
@endsection
@section('content')
    @include('SuperAdmin.persetujuanAkun.alasanPenolakan')
    @cannot('Super Admin')
        <div class="card">
            <div class="card-body">
                <form id="updateProfile" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('profile.profileForm')
                    <button type="button" onclick="formConfirmation('Perbarui Data Profile')"
                        class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    @endcannot
    <div class="card mt-2 mb-3">
        <div class="card-body">
            <h4 class="m-0 font-weight-bold text-primary">Informasi Akun</h4>
            <hr />
            <form action="{{ route('profile.akunUpdate') }}" method="post" id="formUpdateAkun">
                @csrf
                @method('patch')
                @include('profile.akunForm')
                <button type="button" onclick="formConfirmation('Perbarui Data Akun')"
                    class="btn btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
    @cannot('Super Admin')
        @include('profile.deleteForm')
        @include('profile.kyc')
    @endcannot
    @push('js')
        @include('profile.script')
    @endpush
@endsection
