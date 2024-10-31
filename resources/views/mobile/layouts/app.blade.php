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