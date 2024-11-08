<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ env('APP_NAME') }}</title>

    @include('landing.layouts.partials.style')

    @stack('style')

</head>

<body>

    @include('sweetalert::alert')

    @include('landing.layouts.partials.header')

    @yield('content')



    @include('landing.layouts.partials.footer')

    {{-- Login --}}
    @include('landing.auth.login')

    {{-- Register --}}
    @include('landing.auth.register')

    {{-- Forgot Password --}}
    @include('landing.auth.forgot-password')

    {{-- OTP --}}
    @include('landing.auth.otp')

    {{-- Reset Password --}}
    @include('landing.auth.reset-password')

    @include('landing.layouts.partials.script')

    @stack('script')

</body>

</html>