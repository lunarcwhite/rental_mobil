<div class="modal fade" id="tambahAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('superAdmin.kelolaAkun.store') }}" method="post" id="formTambahAkun">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" name="name"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect1">Role Akun</label>
                        <select class="form-control" name="roleId" >
                            <option>--> Pilih Role Akun <-- </option>
                                    @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->namaRole }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" name="password" aria-describedby="passwordHelp">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="formConfirmation('Tambah Akun Baru?')"
                    class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>