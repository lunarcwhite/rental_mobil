@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Tambah Mobil
@endsection
@section('topbarRightButton')
    <a href="{{ route('adminRental.kelolaMobil.index') }}" class="headerButton">
        <span class="btn btn-outline-primary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
    Tambah Mobil
@endsection
@section('content')
    <form action="{{ route('adminRental.kelolaMobil.store') }}" id="formCreateMobil" method="POST"
        enctype="multipart/form-data">
        @csrf
        @include('form.createMobilForm')
        <button type="button" class="btn btn-primary btn-block btn-lg"
            onclick="formConfirmation('Simpan Data?')">Simpan</button>
    </form>
    <hr />
@endsection
