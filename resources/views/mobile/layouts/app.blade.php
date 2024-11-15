<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="author" content="Dinas Kebudayaan dan Pariwisata Provinsi Gorontalo" />
    <meta name="keywords"
        content="Warisan Budaya, Siwaya App, Siwaya, WBTB, Warisan Budaya Tak Benda, Provinsi Gorontalo" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Siwaya App adalah aplikasi Warisan Budaya Tak Benda di Provinsi Gorontalo" />
    <meta property="og:title" content="Siwaya App - Aplikasi Warisan Budaya Tak Benda di Provinsi Gorontalo" />
    <meta property="og:description"
        content="Siwaya App adalah aplikasi Warisan Budaya Tak Benda di Provinsi Gorontalo" />
    <meta property="og:image" content="{{ asset('assets/images/siwaya.png') }}" />
    <meta name="format-detection" content="telephone=no">

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/siwaya.png') }}" />

    <!-- Title -->
    <title>@yield('title') | {{ env('APP_NAME') }}</title>

    @include('mobile.layouts.partials.style')

    @stack('style')
</head>

<body>

    @include('sweetalert::alert')

    <div class="page-wraper">

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- Preloader end-->



        <div id="pjax-container">
            {{-- HEADER --}}
            @include('mobile.layouts.partials.header')
            {{-- HEADER --}}

            @yield('content')

            @include('mobile.layouts.partials.menubar')

            @include('mobile.layouts.partials.theme')

        </div>

        {{-- Modal Form Tambah--}}
        <div class="modal fade" id="formTambah">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@yield('modalTitle')</h5>
                        <button class="btn-close" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    @yield('modalForm')
                </div>
            </div>
        </div>
        {{-- End Modal Form --}}



    </div>

    @include('mobile.layouts.partials.script')

    @stack('script')

</body>

</html>