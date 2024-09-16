<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('img/logo/logo.png') }}" rel="icon">
    <title>Ruang Admin Login</title>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ruang-admin.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-login">
    <!-- Register Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="name"
                                                id="exampleInputFirstName" placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <label>Mendaftar Sebagai</label>
                                            <br />
                                            @foreach ($roles as $role)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="roleId"
                                                        id="inlineRadio1" value="{{ $role->id }}">
                                                    <label class="form-check-label"
                                                        for="inlineRadio1">{{ $role->namaRole }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPasswordRepeat" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                          <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Saya menyetujui <a href="{{ route('landingPage.syaratKetentuan') }}" target="_blank">syarat dan ketentuan aplikasi</a></label>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="buttonDaftar" disabled
                                                class="btn btn-primary btn-block">Daftar</button>
                                        </div>
                                        {{-- <hr>
                    <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a> --}}
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="font-weight-bold small" href="{{ route('login') }}">Sudah punya
                                            akun?</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
    @include('layouts.alert')

    <script>
      const checkbox = document.getElementById('customCheck');
      const button = document.getElementById('buttonDaftar');

      // Tambahkan event listener pada checkbox untuk mendeteksi perubahan
      checkbox.addEventListener('change', function() {
          if (checkbox.checked) {
              // Jika checkbox dicentang, aktifkan tombol
              button.disabled = false;
          } else {
              // Jika checkbox tidak dicentang, nonaktifkan tombol
              button.disabled = true;
          }
      });
  </script>
</body>

</html>
