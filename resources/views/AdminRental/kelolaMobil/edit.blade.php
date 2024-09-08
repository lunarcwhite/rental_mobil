@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Edit Mobil
@endsection
@section('topbarRightButton')
    <a href="{{ route('adminRental.kelolaMobil.index') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
    Edit Mobil
@endsection
@section('content')
@include('layouts.content.alasanPenolakan')
<div class="section mt-2">

    <form action="{{ route('adminRental.kelolaMobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('form.editMobilForm')
        <button type="button" class="btn btn-primary btn-block btn-lg"
            onclick="formConfirmation('Simpan Data?')">Simpan</button>
    </form>
    <hr/>
    @include('AdminRental.kelolaMobil.foto')
</div>

@endsection
