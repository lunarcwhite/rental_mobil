<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">

                <!-- profile box -->
                <div class="profileBox">
                    <div class="image-wrapper">
                        <img src="{{ asset('img/profile.jpg') }}" alt="image" class="imaged rounded">
                    </div>
                    <div class="in">
                        @auth
                        @if (Auth::user()->accountVerified == 1)
                            @if (Auth::user()->roleId == 2)
                            <strong>{{ Auth::user()->profileRental->namaRental }}</strong>
                            @else
                            <strong>{{ Auth::user()->profile->namaLengkap }}</strong>
                            @endif
                        @else
                            <strong>{{ Auth::user()->nama }}</strong>
                        @endif
                            <div class="text-muted">
                            @if (Auth::user()->accountVerified == 1)
                            Profile Terverifikasi
                            <ion-icon name="shield-checkmark-outline"></ion-icon>
                            @else
                            Profile Belum Terverifikasi
                            <ion-icon name="alert-circle-outline"></ion-icon>
                            @endif
                            </div>
                        @endauth
                    </div>
                    <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <!-- * profile box -->
                <ul class="listview flush transparent no-line image-listview mt-2">
                    @guest
                        <li>
                            <a href="{{ route('login') }}" class="item">
                                <div class="icon-box">
                                    <ion-icon name="log-in-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Login
                                </div>
                            </a>
                        </li>
                    @endguest
                    @auth
                    @cannot('accountVerified')
                    <li>
                        <a href="{{ route('profile.create') }}" class="item">
                            <div class="icon-box">
                                <ion-icon name="person-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Verifikasi Profile
                            </div>
                        </a>
                    </li>
                    @endcannot
                    <li>
                        <div class="item">
                            <div class="icon-box">
                                <ion-icon name="wallet-outline"></ion-icon>
                            </div>
                            <div class="in">
                                <div>Rp. @php $retVal = (Auth::user()->keuangan !== null) ? Auth::user()->keuangan->saldoTersimpan : '0' ; echo $retVal @endphp</div>
                                <button class="btn btn-sm btn-primary">Withdraw</button>
                            </div>
                        </div>
                    </li>
                    @endauth
                    <li>
                        <a href="{{ route('landingPage') }}" class="item">
                            <div class="icon-box">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Beranda
                            </div>
                        </a>
                    </li>
                    @can('accountVerified')
                    @can('Konsumen')
                    <li>
                        <a href="{{ route('pembayaran.index') }}" class="item">
                            <div class="icon-box">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Pembayaran
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('konsumen.riwayatRental.index') }}" class="item">
                            <div class="icon-box">
                                <ion-icon name="archive-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Riwayat Rental
                            </div>
                        </a>
                    </li>
                    @endcan
                    @can('Admin Rental')
                    <li>
                        <a href="{{ route('adminRental.riwayatTransaksi.index') }}" class="item">
                            <div class="icon-box">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Riwayat Transaksi
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminRental.monitoringKonsumen.index') }}" class="item">
                            <div class="icon-box">
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Monitoring Konsumen
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('adminRental.laporanKeuangan.index') }}" class="item">
                            <div class="icon-box">
                                <ion-icon name="cash-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Laporan Keuangan
                            </div>
                        </a>
                    </li>
                    @endcan
                    @endcan
                    <li>
                        <div class="item">
                            <div class="icon-box">
                                <ion-icon name="moon-outline"></ion-icon>
                            </div>
                            <div class="in">
                                <div>Dark Mode</div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input dark-mode-switch"
                                        id="darkmodesidebar">
                                    <label class="custom-control-label" for="darkmodesidebar"></label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            @auth
                <form action="{{ route('logout') }}" method="post" id="logoutForm">
                    @csrf
                    <!-- sidebar buttons -->
                    <div class="sidebar-buttons">
                        @can('accountVerified')
                            <a href="{{ route('profile.index') }}" data-toggle="tooltip" data-placement="right" title="Profile"
                                class="button">
                                <ion-icon name="person-outline"></ion-icon>
                            </a>
                        @endcan
                        <a href="javascript:;" class="button">
                            <ion-icon name="settings-outline"></ion-icon>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Logout"
                            onclick="formConfirmation2('Anda akan logout?')" class="button">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </a>
                    </div>
                </form>
            @endauth
            <!-- * sidebar buttons -->
        </div>
    </div>
</div>
