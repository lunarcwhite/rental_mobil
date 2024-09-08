@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Profile
@endsection
@section('topbarRightButton')
    <a href="{{ route('dashboard') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
    Profile
@endsection
@section('content')
<div class="section mt-2">
    @cannot('Super Admin')
        @include('layouts.content.alasanPenolakan')
        <form id="updateProfile" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Pengguna</h4>
                </div>
                <div class="card-body">
                    @include('form.editProfileForm')
                </div>
            </div>
            @cannot('Konsumen')
                <div class="card mt-2">
                    <div class="card-header">
                        <h4 class="card-title">Profile Rental</h4>
                    </div>
                    <div class="card-body">
                        @include('form.editProfileRentalForm')
                    </div>
                </div>
            @endcannot
            <button type="button" class="btn btn-primary btn-block btn-lg mt-1"
                onclick="formConfirmation('Simpan Data?')">Simpan</button>
            <hr />
        </form>
    @endcannot
    <div class="card mt-2">
        <div class="card-header">
            <h4 class="card-title">Informasi Akun</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.akunUpdate') }}" method="post" id="formUpdateAkun">
                @csrf
                @method('patch')
                @include('form.editAkunForm')
                <button type="button" class="btn btn-primary btn-block btn-lg mt-1"
                    onclick="formConfirmation('Simpan Data?')">Simpan</button>
            </form>
        </div>
    </div>
    @cannot('Super Admin')
        @include('profile.delete')
        @include('profile.kyc')
    @endcannot
</div>
@endsection
