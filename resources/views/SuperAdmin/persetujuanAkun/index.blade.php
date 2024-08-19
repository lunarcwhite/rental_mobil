@extends('layouts.admin.master')
@section('pageTitle')
    Persetujuan Akun
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Profile</th>
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
                        @if ($user->profile && $user->persetujuanAkun->count() > 0)
                        <td>
                            <span class="badge badge-danger">Profile telah ditolak</span>
                        </td>
                        @elseif($user->profile)
                        <td>
                            <span class="badge badge-success">Profile telah diisi</span>
                        </td>
                        @else
                        <td>
                            <span class="badge badge-warning">Profile belum diisi</span>
                        </td>
                        @endif
                        @if ($user->profile)
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('superAdmin.persetujuanAkun.profile', $user->id) }}" class="btn btn-sm btn-info">
                                    Lihat
                                </a>
                            </div>
                        </td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @empty
                    <h1>Data kosong</h1>
                    <hr />
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
