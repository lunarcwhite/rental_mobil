<div class="modal fade" id="editAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formEditAkun">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" name="name" id="name"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlSelect1">Role Akun</label>
                        <select class="form-control" name="roleId" id="roleId">
                            <option>--> Pilih Role Akun <-- </option>
                                    @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->namaRole }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" aria-describedby="passwordHelp">
                        <small id="passwordHelp" class="form-text text-muted text-black">Tidak perlu mengisi kolom ini jika tidak ingin mengubah password.</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="formConfirmation('Perbarui data akun?')"
                    class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        async function getDataAkun(id) {
            document.getElementById('formEditAkun').reset();
            const url = `{{ url('dashboard/superAdmin/kelolaAkun/${id}/edit') }}`;
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const json = await response.json();
                document.getElementById('name').value = json.name;
                document.getElementById('email').value = json.email;
                document.getElementById('roleId').value = json.roleId;
                document.getElementById('formEditAkun').action = `{{ url('dashboard/superAdmin/kelolaAkun/${json.id}') }}`;
            } catch (error) {
                console.error(error.message);
            }
        }
    </script>
@endpush