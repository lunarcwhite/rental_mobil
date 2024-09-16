@extends('layouts.mobile.master')
@section('topbarPageTitle')
Cianjur Rental Mobil
@endsection
@section('pageTitle')
    Cianjur Rental Mobil
@endsection
@section('content')
   <div class="section mt-2">
    <p>CRM adalah aplikasi marketplace untuk rental mobil yang berfokus di Cianjur, dengan tujuan membantu para pemilik usaha rental mobil di daerah tersebut agar dikenal lebih luas.</p>

    <p>Aplikasi ini memiliki ketentuan sebagai berikut:</p>
    
    <p>1. Aplikasi tidak bertanggung jawab atas kehilangan kendaraan yang dimiliki oleh pemilik usaha.</p>
    <p>2. Aplikasi hanya menyediakan sarana untuk mendukung bisnis rental mobil di Cianjur.</p>
    <p>3. Setiap transaksi akan dikenakan kenaikan harga sebesar 10% sebagai keuntungan bagi pemilik aplikasi, yang digunakan untuk perawatan aplikasi dan server.</p>
    <p>4. Pengusaha yang ingin menambah pengamanan kendaraan dengan pelacak GPS akan dikenakan biaya sebesar Rp 1.500.000,- untuk pendaftaran akun GPS serta pemasangannya di kendaraan.</p>
   </div>
@endsection
@section('footer')
    @include('layouts.mobile.partials.footer')
@endsection
