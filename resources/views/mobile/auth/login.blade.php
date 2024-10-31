<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#2196f3">
    <meta name="author" content="DexignZone" />
    <meta name="keywords" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Jobie - Job Portal Mobile App Template ( Bootstrap 5 + PWA )" />
    <meta property="og:title" content="Jobie - Job Portal Mobile App Template ( Bootstrap 5 + PWA )" />
    <meta property="og:description" content="Jobie - Job Portal Mobile App Template ( Bootstrap 5 + PWA )" />
    <meta property="og:image" content="https://jobie.dexignzone.com/mobile-app/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

    <!-- Title -->
    <title>Login | {{ env('APP_NAME') }}</title>

    @include('mobile.layouts.partials.style')

</head>

<body>

    @include('sweetalert::alert')

    <div class="page-wraper">

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- Preloader end-->

        <!-- Page Content -->
        <div class="page-content">

            <!-- Banner -->
            <div class="banner-wrapper shape-1">
                <div class="container inner-wrapper text-center">
                    <h1 class="dz-title">Masuk</h1>
                    <p class="mb-0">Selamat Datang Siwaya App <br>(Aplikasi Warisan Budaya Tak Benda)
                    </p>
                </div>
            </div>
            <!-- Banner End -->

            <div class="container">
                <div class="account-area">
                    <form action="{{ route('mobile.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            @error('email_or_username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group">
                                <input type="text" placeholder="Email atau Username" class="form-control" name="email_or_username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group">
                                <input type="password" placeholder="Password" id="dz-password" class="form-control be-0"
                                    name="password" required>
                                <span class="input-group-text show-pass">
                                    <i class="fa fa-eye-slash"></i>
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <a href="#" class="btn-link d-block text-center">Anda Lupa Password?</a>
                        <div class="input-group">
                            <button class="btn mt-2 btn-primary w-100">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Page Content End -->

        <!-- Footer -->
        <footer class="footer fixed">
            <div class="container">
                <a href="#" class="btn btn-primary light text-primary d-block"
                    data-confirm-delete="true">Buat Akun</a>
            </div>
        </footer>
        <!-- Footer End -->
    </div>

    @include('mobile.layouts.partials.script')

</body>

</html>