@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Profile
@endsection
@section('pageTitle')
    Profile
@endsection
@section('content')
<div class="section mt-2">
    <form id="createProfile" action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile Pengguna</h4>
            </div>
            <div class="card-body">
                @include('form.createProfileForm')
            </div>
        </div>
        @cannot('Konsumen')
            <div class="card mt-2">
                <div class="card-header">
                    <h4 class="card-title">Profile Rental</h4>
                </div>
                <div class="card-body">
                    @include('form.createProfileRentalForm')
                </div>
            </div>
        @endcannot
        <button type="button" class="btn btn-primary btn-block btn-lg mt-1"
            onclick="formConfirmation('Simpan Data?')">Simpan</button>
        <hr />
    </form>
</div>
@endsection
