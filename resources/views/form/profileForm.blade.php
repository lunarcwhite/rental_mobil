
            <h4 class="m-0 font-weight-bold text-primary">Profile Pengguna</h4>
            <hr />
            <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input type="number" name="profile[nik]" value="{{ $profile->nik }}" required class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIK">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Lengkap</label>
                <input type="text" name="profile[namaLengkap]" value="{{ $profile->namaLengkap }}" required
                    class="form-control" id="exampleInputPassword1" placeholder="Contoh Muhamad Setiaji">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Lahir</label>
                <input type="date" name="profile[tanggalLahir]" value="{{ $profile->tanggalLahir }}" required
                    class="form-control" id="exampleInputPassword1" placeholder="Contoh Muhamad Setiaji">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat Tenggal Tinggal Sekarang</label>
                <input type="text" name="profile[alamatTempatTinggal]" value="{{ $profile->alamatTempatTinggal }}"
                    required class="form-control" id="exampleInputPassword1"
                    placeholder="Isi dengan nama jalan dan nomor rumah">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kecamatan</label>
                <select class="form-control kecamatan" name="profile[kecamatan]" id="kecamatan">
                    <option value="{{ $profile->kecamatan }}" selected></option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Desa / Kelurahan</label>
                <select class="form-control desa" name="profile[desa]" id="desa">
                    <option value="{{ $profile->desa }}"></option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">RT</label>
                <input type="number" name="profile[rt]" required class="form-control" value="{{ $profile->rt }}"
                    id="exampleInputPassword1" placeholder="Nomor RT">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">RW</label>
                <input type="number" name="profile[rw]" required class="form-control" value="{{ $profile->rw }}"
                    id="exampleInputPassword1" placeholder="Nomor RW">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nomor yang dapat dihubungi</label>
                <input type="text" name="profile[noHp]" required class="form-control" value="{{ $profile->noHp }}"
                    id="exampleInputPassword1" placeholder="Nomor yang dapat dihubungi">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Foto Kartu Identitas</label>
                <br />
                <button type="button" class="btn btn-sm btn-info mb-3" data-toggle="modal"
                    data-target="#lihatKyc">Lihat KTP</button>
                <input type="file" name="profile[kyc]" class="form-control" id="kyc">
                <small id="kycHelp" class="form-text text-muted">*Tidak perlu mengisi kolom ini jika tidak ingin
                    memperbarui foto KTP.</small>
            </div>
            @cannot('Konsumen')
                @include('profile.profileRentalForm')
            @endcannot
