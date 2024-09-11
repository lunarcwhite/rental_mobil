<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Mobilekit Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="{{ asset('mobile/assets/img/favicon.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('mobile/assets/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('mobile/assets/css/style.css') }}">
    <link rel="manifest" href="{{ asset('mobile/__manifest.json') }}">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="{{ url()->previous() }}" class="headerButton">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">{{ $mobil->profileRental->namaRental }}</div>
        <div class="right">
            <a href="javascript:;" class="headerButton">
                <ion-icon name="videocam-outline"></ion-icon>
            </a>
            <a href="javascript:;" class="headerButton">
                <ion-icon name="call-outline"></ion-icon>
                <span class="badge badge-danger">1</span>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section">
            <div class="message-divider">
                {{ now() }}
            </div>
            <div class="card p-2 mb-2" style="border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <!-- Image Section -->
                    @if ($mobil->gambar == 'test')
                        <img src="{{ asset('img/mobil.jpg') }}" class="rounded mr-3" alt="Product Image"
                            style="width: 60px; height: 80px;">
                    @else
                        <img src="{{ url(Storage::url('mobil/' . $mobil->gambar)) }}" class="rounded mr-3"
                            alt="Product Image" style="width: 60px; height: 80px;">
                    @endif
                    <!-- Product Info -->
                    <div class="flex-grow-1">
                        <div class="flex-grow-1">
                            <h3 class="mb-1 text-truncate" style="max-width: 200px;">{{ $mobil->namaMobil }}</h3>
                            @php
                                $harga = $mobil->harga + ($mobil->harga * 10) / 100;
                            @endphp
                            <p class="mb-0 text-muted small">Rp. {{ $harga }}</p>
                        </div>
                    </div>
                    <!-- Track Button -->
                    <a href="{{ route('landingPage.show', $mobil->id) }}" class="btn btn-primary ml-auto"
                        style="border-radius: 10px;">Lihat</a>
                </div>
            </div>

            <!-- Chat -->
            <div class="messages">
                @include('Pesan.receive', ['message' => 'Hallo  👋'])
            </div>
            <!-- End Chat -->

        </div>
    </div>
    <!-- * App Capsule -->

    <!-- Share Action Sheet -->
    <div class="modal fade action-sheet inset" id="addActionSheet" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share</h5>
                </div>
                <div class="modal-body">
                    <ul class="action-button-list">
                        <li>
                            <a href="page-chat.html#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="camera-outline"></ion-icon>
                                    Take a photo
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="videocam-outline"></ion-icon>
                                    Video
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="image-outline"></ion-icon>
                                    Upload from Gallery
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="document-outline"></ion-icon>
                                    Documents
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="page-chat.html#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="musical-notes-outline"></ion-icon>
                                    Sound file
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- * Share Action Sheet -->

    <!-- chat footer -->
    <div class="chatFooter">
        <form>
            <a href="javascript:;" class="btn btn-icon btn-secondary rounded" data-toggle="modal"
                data-target="#addActionSheet">
                <ion-icon name="add"></ion-icon>
            </a>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" id="message" name="message" class="form-control"
                        placeholder="Type a message...">
                    <i class="clear-input">
                        <ion-icon name="close-circle"></ion-icon>
                    </i>
                </div>
            </div>
            <button type="submit" class="btn btn-icon btn-primary rounded">
                <ion-icon name="send"></ion-icon>
            </button>
        </form>
    </div>
    <!-- * chat footer -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="{{ asset('mobile/assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('mobile/assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('mobile/assets/js/lib/bootstrap.min.js') }}"></script>
    <!-- Ionicons -->
    {{-- <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script> --}}
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('mobile/assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('mobile/assets/js/base.js') }}"></script>

    <script>
        const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
            cluster: 'ap1'
        });
        const channel = pusher.subscribe('public');

        //Receive messages
        channel.bind('chat', function(data) {
            $.post("/receive", {
                    _token: '{{ csrf_token() }}',
                    message: data.message,
                })
                .done(function(res) {
                    $(".messages > .message").last().after(res);
                    $(document).scrollTop($(document).height());
                });
        });

        //Broadcast messages
        $("form").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: "/broadcast",
                method: 'POST',
                headers: {
                    'X-Socket-Id': pusher.connection.socket_id
                },
                data: {
                    _token: '{{ csrf_token() }}',
                    message: $("form #message").val(),
                    mobilId: '{{ $mobil->id }}'
                }
            }).done(function(res) {
                $(".messages > .message").last().after(res);
                $("form #message").val('');
                $(document).scrollTop($(document).height());
            });
        });
    </script>

</body>

</html>
