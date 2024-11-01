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
    <title>@yield('title')</title>

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

        @include('mobile.layouts.partials.header')

        @include('mobile.layouts.partials.sidebar')


        @yield('content')

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

        {{-- @switch(auth()->user()->role->slug)
        @case('admin')
        @include('mobile.admin.menubar')
        @break
        @case('p2pl')
        @include('mobile.p2pl.menubar')
        @break
        @case('farmamin')
        @include('mobile.farmamin.menubar')
        @break
        @case('perencanaan')
        @include('mobile.perencanaan.menubar')
        @break
        @case('kepeg')
        @include('mobile.kepeg.menubar')
        @break
        @default
        @php
        Auth::logout();
        @endphp
        @endswitch --}}
        @include('mobile.layouts.partials.menubar')

        @include('mobile.layouts.partials.theme')

    </div>

    @include('mobile.layouts.partials.script')

    @stack('script')

</body>

</html>