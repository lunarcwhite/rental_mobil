@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Daftar Konsumen
@endsection
@section('topbarRightButton')
    <a href="{{ route('dashboard') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
    Daftar Konsumen
@endsection
@section('content')
    <div class="section mt-2">
        <div class="wide-block p-0">
            <div class="table-responsive mt-3">
                <table class="table table-striped" id="dataTableWithExportButton">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Konsumen</th>
                            <th>Alamat Tempat Tinggal</th>
                            <th>Jumlah Riwayat Rental</th>
                            <th>Rating</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $no => $user)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $user->user->profile->namaLengkap }}</td>
                                <td>{{ $user->user->profile->alamatTempatTinggal }}</td>
                                <td>{{ $user->count() }}</td>
                                <td>
                                    @if ($ratingKonsumens->where('userId', $user->userId)->first() == null)
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#ratingKonsumen">Beri
                                            Rating</button>
                                        @include('AdminRental.monitoringKonsumen.createRatingKonsumen')
                                    @else
                                        @php
                                            $dataRating = $ratingKonsumens->where('userId', $user->userId)->first();
                                        @endphp
                                        @include('AdminRental.monitoringKonsumen.editratingKonsumen')
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#ratingKonsumen">Lihat
                                            Rating</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($blokirs->where('userId', $user->user->id)->first() == null)
                                        <form action="{{ route('adminRental.monitoringKonsumen.blokir', $user->user->id) }}"
                                            method="post">
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="formConfirmation('Masukan konsumen {{ $user->user->profile->namaLengkap }} ke dalam daftar blokir?')">Blokir</button>
                                        </form>
                                    @else
                                        <form
                                            action="{{ route('adminRental.monitoringKonsumen.bukaBlokir', $user->user->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="formConfirmation('Hapus konsumen {{ $user->user->profile->namaLengkap }} dari daftar blokir?')">Buka
                                                Blokir</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            Belum ada konsumen
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
