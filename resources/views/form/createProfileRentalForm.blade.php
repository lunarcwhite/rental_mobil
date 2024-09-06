@cannot('Konsumen')
<div class="form-group">
    <label for="exampleInputPassword1">Nama Rental</label>
    <input type="text" name="profileRental[namaRental]" required class="form-control" id="exampleInputPassword1"
        placeholder="Contoh Muhamad Setiaji">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Alamat Rental</label>
    <input type="text" name="profileRental[alamatRental]" required class="form-control" id="exampleInputPassword1"
        placeholder="Isi dengan nama jalan dan nomor rumah">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Kecamatan</label>
    <select class="form-control" required name="profileRental[kecamatanRental]" id="kecamatanRental">
        <option>Pilih Kecamatan</option>
    </select>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Desa / Kelurahan</label>
    <select class="form-control" required name="profileRental[desaRental]" id="desaRental">
        <option>Pilih Desa / Kelurahan</option>
    </select>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">RT</label>
    <input type="number" name="profileRental[rtRental]" required class="form-control" id="exampleInputPassword1"
        placeholder="Nomor RT">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">RW</label>
    <input type="number" name="profileRental[rwRental]" required class="form-control" id="exampleInputPassword1"
        placeholder="Nomor RW">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Nomor yang dapat dihubungi</label>
    <input type="text" name="profileRental[noHpRental]" required class="form-control" id="exampleInputPassword1"
        placeholder="Nomor yang dapat dihubungi">
</div>
@push('js')
            <script>
                // URL API Anda
                const loadKecamatanRental = 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/3203.json';
    
                async function loadDataKecamatanRental() {
                    await fetch(loadKecamatanRental)
                        .then(response => response.json())
                        .then(data => {
                            // Asumsikan data adalah array of objects
                            const kecamatanRental = document.getElementById('kecamatanRental');
                            const kecamatan = document.getElementById('kecamatan');
    
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id; // atau properti lain yang Anda inginkan sebagai value
                                option.textContent = item
                                    .name; // atau properti lain yang Anda inginkan sebagai teks
                                kecamatanRental.appendChild(option);
                            });
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
    
                const kecamatanRental = document.getElementById('kecamatanRental');
    
                async function loadDesaRental() {
                    const desaRental = document.getElementById('desaRental');
                    // Hapus semua opsi yang ada di sub-category select
                    desaRental.innerHTML = '<option value="">Pilih Desa / Kelurahan</option>';
    
                    // Ambil nilai kategori yang dipilih
                    const kecamatanId = kecamatanRental.value;
    
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
                                desaRental.appendChild(option);
                            });
    
    
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
    
                kecamatanRental.addEventListener('change', loadDesaRental);
    
                window.onload = loadDataKecamatanRental;
            </script>
            @endpush
@endcannot