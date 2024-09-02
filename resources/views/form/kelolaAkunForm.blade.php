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