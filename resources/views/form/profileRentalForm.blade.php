                    <hr />
                    <h4 class="m-0 font-weight-bold text-primary">Profile Rental</h4>
                    <hr />
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Rental</label>
                        <input type="text" name="profileRental[namaRental]" value="{{ $profileRental->namaRental }}"
                            required class="form-control" id="exampleInputPassword1" placeholder="Contoh Muhamad Setiaji">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat Rental</label>
                        <input type="text" name="profileRental[alamatRental]"
                            value="{{ $profileRental->alamatRental }}" required class="form-control"
                            id="exampleInputPassword1" placeholder="Isi dengan nama jalan dan nomor rumah">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kecamatan</label>
                        <select class="form-control" required name="profileRental[kecamatanRental]"
                            value="{{ $profileRental->kecamatanRental }}" id="kecamatanRental">
                            <option value="{{ $profileRental->kecamatanRental }}"></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Desa / Kelurahan</label>
                        <select class="form-control" required name="profileRental[desaRental]"
                            value="{{ $profileRental->desaRental }}" id="desaRental">
                            <option value="{{ $profileRental->desaRental }}"></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">RT</label>
                        <input type="number" name="profileRental[rtRental]" required class="form-control"
                            value="{{ $profileRental->rtRental }}" id="exampleInputPassword1" placeholder="Nomor RT">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">RW</label>
                        <input type="number" name="profileRental[rwRental]" required class="form-control"
                            value="{{ $profileRental->rwRental }}" id="exampleInputPassword1" placeholder="Nomor RW">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor yang dapat dihubungi</label>
                        <input type="text" name="profileRental[noHpRental]" required class="form-control"
                            value="{{ $profileRental->noHpRental }}" id="exampleInputPassword1"
                            placeholder="Nomor yang dapat dihubungi">
                    </div>
