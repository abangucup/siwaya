<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') | {{ env('APP_NAME') }}</title>

    @include('dashboard.layouts.partials.style')

    @stack('style')

</head>

<body>

    @include('sweetalert::alert')

    <div class="preloader" id="preloader">
        <div class="preloader">
            <div class="waviy position-relative">
                <span class="d-inline-block">S</span>
                <span class="d-inline-block">I</span>
                <span class="d-inline-block">W</span>
                <span class="d-inline-block">A</span>
                <span class="d-inline-block">Y</span>
                <span class="d-inline-block">A</span>
            </div>
        </div>
    </div>


    @include('dashboard.layouts.partials.sidebar')


    <div class="container-fluid">
        <div class="main-content d-flex flex-column">

            
            @include('dashboard.layouts.partials.header')

            <div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
                <h3 class="mb-sm-0 mb-1 fs-18">@yield('pageTitle')</h3>
                <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
                    @if (!request()->is('dashboard'))
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-decoration-none">
                            <i class="ri-command-line" style="position: relative; top: -1px;"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    @endif

                    <li>
                        @yield('pageContent')
                    </li>
                </ul>
            </div>

            @yield('content')

            <div class="flex-grow-1"></div>

            @include('dashboard.layouts.partials.footer')

        </div>
    </div>


    @include('dashboard.layouts.partials.script')

    @stack('script')

</body>

</html>