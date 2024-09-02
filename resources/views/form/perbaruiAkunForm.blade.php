
        <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" required
                class="form-control" id="exampleInputPassword1" placeholder="Contoh Muhamad Setiaji">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                required class="form-control" id="exampleInputPassword1"
                placeholder="Isi dengan nama jalan dan nomor rumah">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password Saat Ini</label>
            <input type="password" name="current_password" required class="form-control" id="exampleInputPassword1" placeholder="Password Saat Ini">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password Baru</label>
            <input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="Password Baru">
        </div>