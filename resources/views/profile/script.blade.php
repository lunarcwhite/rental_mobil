<script>
    // URL API Anda
    const kecamatan = document.getElementById('kecamatan');
    const kecamatanRental = document.getElementById('kecamatanRental');
    const desa = document.getElementById('desa');

    const loadKecamatan = `https://www.emsifa.com/api-wilayah-indonesia/api/districts/3203.json`;

    // Fungsi untuk memuat data dari API
    async function loadDataKecamatan() {
        await fetch(loadKecamatan)
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
        await loadDataKecamatan();
        await loadDataDesa();
    }

    window.onload = onLoadFunctions;
</script>