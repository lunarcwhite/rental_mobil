    <div class="form-group">
        <label for="exampleInputEmail1">NIK</label>
        <input type="number" name="profile[nik]" required class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="NIK">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nama Lengkap</label>
        <input type="text" name="profile[namaLengkap]" required class="form-control" id="exampleInputPassword1"
            placeholder="Contoh Muhamad Setiaji">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tanggal Lahir</label>
        <input type="date" name="profile[tanggalLahir]" required class="form-control" id="exampleInputPassword1"
            placeholder="Contoh Muhamad Setiaji">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Alamat Tenggal Tinggal Sekarang</label>
        <input type="text" name="profile[alamatTempatTinggal]" required class="form-control" id="exampleInputPassword1"
            placeholder="Isi dengan nama jalan dan nomor rumah">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Kecamatan</label>
        <select class="form-control kecamatan" name="profile[kecamatan]" id="kecamatan">
            <option>Pilih Kecamatan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Desa / Kelurahan</label>
        <select class="form-control desa" name="profile[desa]" id="desa">
            <option>Pilih Desa / Kelurahan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">RT</label>
        <input type="number" name="profile[rt]" required class="form-control" id="exampleInputPassword1"
            placeholder="Nomor RT">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">RW</label>
        <input type="number" name="profile[rw]" required class="form-control" id="exampleInputPassword1"
            placeholder="Nomor RW">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nomor yang dapat dihubungi</label>
        <input type="text" name="profile[noHp]" required class="form-control" id="exampleInputPassword1"
            placeholder="Nomor yang dapat dihubungi">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Foto Jelas Kartu Identitas</label>
        <input type="file" name="profile[kyc]" class="form-control" id="customFile">
    </div>
    @push('js')
        <script>
            // URL API Anda
            const loadKecamatan = 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/3203.json';

            // Fungsi untuk memuat data dari API
            async function loadDataKecamatan() {
                await fetch(loadKecamatan)
                    .then(response => response.json())
                    .then(data => {
                        // Asumsikan data adalah array of objects
                        const kecamatan = document.getElementById('kecamatan');

                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id; // atau properti lain yang Anda inginkan sebagai value
                            option.textContent = item
                                .name; // atau properti lain yang Anda inginkan sebagai teks
                            kecamatan.appendChild(option);
                        });

                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }

            const kecamatan = document.getElementById('kecamatan');

            async function loadDesa() {
                const desa = document.getElementById('desa');
                // Hapus semua opsi yang ada di sub-category select
                desa.innerHTML = '<option value="">Pilih Desa / Kelurahan</option>';

                // Ambil nilai kategori yang dipilih
                const kecamatanId = kecamatan.value;

                const dataDesa = `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`;

                await fetch(dataDesa)
                    .then(response => response.json())
                    .then(data => {
                        // Asumsikan data adalah array of objects

                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id; // atau properti lain yang Anda inginkan sebagai value
                            option.textContent = item
                                .name; // atau properti lain yang Anda inginkan sebagai teks
                            desa.appendChild(option);
                        });


                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }

            kecamatan.addEventListener('change', loadDesa);
            // Panggil fungsi untuk memuat data setelah halaman dimuat

            window.onload = loadDataKecamatan;
        </script>
    @endpush