@extends('layouts.mobile.master')
@section('topbarPageTitle')
    CaRent
@endsection
@section('topbarRightButton')
    <a href="{{ route('adminRental.riwayatTransaksi.index') }}" class="headerButton">
        <span class="btn btn-secondary">Kembali</span>
    </a>
@endsection
@section('content')
    <div class="section mt-2">
            @include('layouts.content.invoice')
    </div>
@endsection
@section('footer')
    @include('layouts.mobile.partials.footer')
@endsection
@push('js')
    <script>
        function hapusTotalBayar() {
            document.getElementById('biayaRental').remove();
        }
        window.onload = hapusTotalBayar;
    </script>
@endpush
