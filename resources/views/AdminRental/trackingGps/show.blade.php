@extends('layouts.mobile.master')
@section('topbarPageTitle')
    Lacak Mobil
@endsection
@section('topbarRightButton')
    <a href="{{ route('adminRental.trackingGps.index') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('pageTitle')
    Lacak Mobil {{ $gps->mobil->namaMobil }} {{ $gps->mobil->platMobil }}
@endsection
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            /* Atur tinggi peta */
            width: 100%;
        }
    </style>

    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        const key = '{{ $gps->key }}'
        const imei = '{{ $gps->imei }}'
        const url =
            `https://cors-anywhere.herokuapp.com/https://tracker.id/api/api.php?api=user&ver=1.0&key=${key}&cmd=OBJECT_GET_LOCATIONS,${imei}`;
        async function fetchData() {
            await fetch(url)
                .then(response => response.json())
                .then(data => {
                    const latitude = data[imei].lat; // Ambil latitude dari API
                    const longitude = data[imei].lng; // Ambil longitude dari API
                    const jam = data[imei].dt_server;
                    tampilkanPeta(latitude, longitude, jam); // Panggil fungsi untuk menampilkan peta
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        function tampilkanPeta(latitude, longitude, jam) {
            // Inisialisasi peta dan atur posisi pusatnya
            var map = L.map('map').setView([latitude, longitude], 13);

            // Gunakan tile layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Tambahkan marker pada koordinat yang diambil dari API
            var marker = L.marker([latitude, longitude]).addTo(map);

            // Tambahkan popup pada marker
            marker.bindPopup('<b>Lokasi Anda!</b><br>Pembaruan terakhir: ' + jam + '</br><br>Latitude: ' + latitude +
                '<br>Longitude: ' + longitude).openPopup();
        }

        fetchData();
    </script>
@endpush
