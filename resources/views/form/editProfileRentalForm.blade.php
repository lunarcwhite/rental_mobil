@cannot('Konsumen')
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
@push('js')
<script>
    // URL API Anda

    const loadKecamatanRental = `https://www.emsifa.com/api-wilayah-indonesia/api/districts/3203.json`;

    // Fungsi untuk memuat data dari API
    async function loadDataKecamatanRental() {
        const kecamatan = document.getElementById('kecamatan');
        const kecamatanRental = document.getElementById('kecamatanRental');
        await fetch(loadKecamatanRental)
            .then(response => response.json())
            .then(data => {
                // Asumsikan data adalah array of objects

                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id; // atau properti lain yang Anda inginkan seperti id
                    option.textContent = item
                        .name; // atau properti lain yang Anda inginkan seperti text
                    if (kecamatan.value == item.id) {
                        option.selected = true;
                    }
                    kecamatan.appendChild(option);
                });

                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id; // atau properti lain yang Anda inginkan seperti id
                    option.textContent = item
                        .name; // atau properti lain yang Anda inginkan seperti text
                    if (kecamatanRental.value == item.id) {
                        option.selected = true;
                    }
                    kecamatanRental.appendChild(option);
                });


            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    async function loadDataDesa() {
    const desa = document.getElementById('desa');
        const loadDesa = `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatan.value}.json`;
        const loadDesaRental =
            `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanRental.value}.json`;

        await fetch(loadDesa)
            .then(response => response.json())
            .then(data => {
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id; // atau properti lain yang Anda inginkan sebagai value
                    option.textContent = item
                        .name; // atau properti lain yang Anda inginkan sebagai teks
                    if (desa.value == item.id) {
                        option.selected = true;
                    }
                    desa.appendChild(option);
                });


            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        await fetch(loadDesaRental)
            .then(response => response.json())
            .then(data => {
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id; // atau properti lain yang Anda inginkan sebagai value
                    option.textContent = item
                        .name; // atau properti lain yang Anda inginkan sebagai teks
                    if (desaRental.value == item.id) {
                        option.selected = true;
                    }
                    desaRental.appendChild(option);
                });


            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    async function resetDesa() {
        desa.innerHTML = '';
        await loadDataDesa();
    }

    async function resetDesaRental() {
        desaRental.innerHTML = '';
        await loadDataDesa();
    }

    kecamatan.addEventListener('change', resetDesa);
    kecamatanRental.addEventListener('change', resetDesaRental);

    async function onLoadFunctions() {
        await loadDataKecamatanRental();
        await loadDataDesa();
    }

    window.onload = onLoadFunctions;
</script>
@endpush
@endcannot
