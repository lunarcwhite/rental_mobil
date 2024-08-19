@extends('layouts.admin.master')
@section('pageTitle')
    Kelola Mobil
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
                    <th>Nama Mobil</th>
                    <th>No Plat</th>
                    <th>Harga</th>
                    <th>Ketersediaan</th>
                    <th>Status Persetujuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mobils as $no => $mobil)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $mobil->namaMobil }}</td>
                        <td>{{ $mobil->plat }}</td>
                        <td>{{ $mobil->harga }}</td>
                        <td>
                            @if ($mobil->statusKetersediaan == 0)
                                Tidak tersedia
                            @else
                                Tersedia
                            @endif
                        </td>
                        <td>
                            @if ($mobil->statusPersetujuan == 0)
                                Tidak disetujui
                            @else
                                Disetujui
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
@endsection
