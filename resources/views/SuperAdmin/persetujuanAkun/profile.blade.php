@extends('layouts.desktop.master')
@section('pageTitle')
    Profile
@endsection
@section('content')
    @include('SuperAdmin.persetujuanAkun.alasanPenolakan')
    <div class="card">
        <div class="card-body">
            <form id="setujuiAkun">
                @include('form.profileForm')
            </form>
            <form action="{{ route('superAdmin.persetujuanAkun.setujui', $profile->userId) }}" method="post">
                @csrf
                <button type="button" onclick="formConfirmation('Setujui Akun Ini?')"
                    class="btn btn-primary float-right">Setujui</button>
            </form>
                <button type="button" data-toggle="modal"
                data-target="#tolakAkun" class="mr-3 ml-3 btn btn-danger float-right">Tolak</button>
        </div>
    </div>
    @include('profile.kyc')
    @include('SuperAdmin.persetujuanAkun.tolak')
    @push('js')
        @include('SuperAdmin.persetujuanAkun.script')
    @endpush
    @push('js')
        @include('profile.script')
    @endpush
@endsection
