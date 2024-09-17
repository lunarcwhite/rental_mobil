@extends('layouts.desktop.master')
@section('pageTitle')
    Perbarui GPS {{ $mobil->namaMobil }} {{ $mobil->platMobil }}
@endsection
@section('content')
<a href="{{ route('superAdmin.gps.index') }}"
        class="btn btn-primary">Kembali</a>
<hr/>
<form method="post" action="{{ route('superAdmin.gps.update', $mobil->id) }}">
    @csrf
    @method('put')
    @include('form.editGpsForm')
    <button type="button" onclick="formConfirmation('Simpan Data?')"
        class="btn btn-primary float-right">Simpan</button>
    </div>
</form>
@endsection