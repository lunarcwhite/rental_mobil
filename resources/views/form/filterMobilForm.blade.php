<div class="form-group mb-2" id="kecamatanGroup">
    <label for="kecamatanRental">Lokasi Rental</label>
    <select name="kecamatanRental" id="kecamatanRental" class="form-control">
        <option value="">-- Pilih Kecamatan --</option>
    </select>
</div>
<div class="form-group mb-2">
    <label for="">Tanggal Mulai</label>
    <input type="date" name="tanggalMulai" class="form-control">
</div>
<div class="form-group mb-2">
    <label for="">Tanggal Kembali</label>
    <input type="date" name="tanggalKembali" class="form-control">
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
                const kecamatan = document.getElementById('kecamatanRental');

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

    window.onload = loadDataKecamatan;
</script>
@endpush