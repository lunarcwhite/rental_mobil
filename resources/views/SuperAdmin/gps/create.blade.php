@extends('layouts.desktop.master')
@section('pageTitle')
    Pasang GPS {{ $mobil->namaMobil }} {{ $mobil->platMobil }}
@endsection
@section('content')
<a href="{{ route('superAdmin.gps.index') }}"
        class="btn btn-primary">Kembali</a>
<hr/>
<form method="post" action="{{ route('superAdmin.gps.store', $mobil->id) }}" id="createGps">
    @csrf
    @include('form.createGpsForm')
    <input type="hidden" name="profileRentalId" value="{{ $mobil->profileRentalId }}">
    <button type="button" onclick="formConfirmation('Simpan Data?')"
        class="btn btn-primary float-right">Simpan</button>
    </div>
</form>
@endsection