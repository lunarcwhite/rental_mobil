@extends('layouts.desktop.master')
@section('pageTitle')
    Kelola Akun
@endsection
@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAkun">
    Tambah
  </button>
  <hr/>
    <div class="table-responsive">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Verifikasi Akun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $no => $user)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->namaRole }}</td>
                        <td>
                            @if ($user->accountVerified == 0)
                                Belum Terverifikasi
                            @else
                                Terverifikasi
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editAkun" onclick="getDataAkun('{{ $user->id }}')">
                                    Edit
                                </button>
                                <form action="{{ route('superAdmin.kelolaAkun.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="formConfirmation('Hapus akun {{ $user->name }}')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h1>Data kosong</h1>
                    <hr />
                @endforelse
            </tbody>
        </table>
    </div>
@include('SuperAdmin.KelolaAkun.create')
@include('SuperAdmin.KelolaAkun.edit')
@endsection
