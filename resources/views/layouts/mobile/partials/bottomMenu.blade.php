<div class="appBottomMenu" id="bottomMenu">
    <a href="{{ route('dashboard') }}" class="item">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Dashboard</strong>
        </div>
    </a>
    <a href="{{ route('adminRental.transaksi.index') }}" class="item">
        <div class="col">
            <ion-icon name="wallet-outline"></ion-icon>
            <span class="badge badge-danger">{{ $transaksiBerjalan }}</span>
            <strong>Transaksi</strong>
        </div>
    </a>
    <a href="{{ route('adminRental.kelolaMobil.index') }}" class="item">
        <div class="col">
            <ion-icon name="car-outline"></ion-icon>
            <strong>Mobil</strong>
        </div>
    </a>
    <a href="{{ route('adminRental.trackingGps.index') }}" class="item">
        <div class="col">
            <ion-icon name="map-outline"></ion-icon>
            <strong>GPS</strong>
        </div>
    </a>
</div>
