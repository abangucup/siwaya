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
    <meta name="description" content="Super Applikasi Untuk Dinas Kesehatan" />
    <meta property="og:title" content="Dinkes App" />
    <meta property="og:description" content="Super Applikasi Untuk Dinas Kesehatan" />
    {{--
    <meta property="og:image" content="https://jobie.dexignzone.com/mobile-app/xhtml/social-image.png" /> --}}
    <meta name="format-detection" content="telephone=no">

    <!-- Title -->
    <title>Splash | {{ env('APP_NAME') }}</title>

    @include('mobile.layouts.partials.style')

    @stack('style')
</head>

<body>

    @include('sweetalert::alert')

    <div class="page-wraper">

        <!-- Splashcreen -->
        <div class="loader-screen" id="splashscreen">
            <div class="main-screen"></div>
            <div class="logo-icon">
                <div class="wow slideInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                    <img src="{{ asset('assets/images/siwaya.png') }}" alt="" />
                </div>
            </div>
        </div>
        <!-- Splashcreen End -->

        <!-- Page Content -->
        <div class="page-content page page-onboading">
            <!-- Onboading Start -->
            <div class="started-swiper-box">
                <div class="swiper-container get-started">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slide-info">
                                <div class="dz-media">
                                    <img src="{{ asset('assets/images/search.svg') }}" alt="" />
                                </div>
                                <div class="slide-content">
                                    <h1 class="dz-title">Temukan Warisan <br> Budaya Tak Benda</h1>
                                    <p>Temukan dan pelajari warisan budaya tak benda yang tersebar di Provinsi
                                        Gorontalo.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-info">
                                <div class="dz-media">
                                    <img src="{{ asset('assets/images/insert.svg') }}" alt="" />
                                </div>
                                <div class="slide-content">
                                    <h1 class="dz-title">Tambahkan Warisan Budaya</h1>
                                    <p>Tambahkan warisan budaya yang dikenal di daerah Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-info">
                                <div class="dz-media">
                                    <img src="{{ asset('assets/images/get.svg') }}" alt="" />
                                </div>
                                <div class="slide-content">
                                    <h1 class="dz-title">Dapatkan Informasi Warisan Budaya</h1>
                                    <p>Dapatkan informasi yang lebih lengkap dan akurat mengenai warisan budaya tak
                                        benda yang tersebar di Provinsi Gorontalo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-btn">
                    <div class="swiper-pagination-started pagination-dots style-1"></div>
                </div>
            </div>
            <!-- Onboading End-->
        </div>
        <!-- Page Content End-->

        <!-- Footer -->
        <footer class="footer fixed border-0">
            <div class="container">
                <a href="{{ route('mobile.login') }}"
                    class="btn btn-primary light btn-rounded text-primary d-block">Lewati</a>
            </div>
        </footer>

    </div>

    @include('mobile.layouts.partials.script')

</body>

</html>