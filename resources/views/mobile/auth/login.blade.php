@extends('mobile.auth.layouts.app')

@section('title', 'Login')
    
@section('content')
    <!-- Page Content -->
    <div class="page-content">

        <!-- Banner -->
        <div class="banner-wrapper shape-1">
            <div class="container inner-wrapper text-center">
                <h1 class="dz-title">Halaman Login</h1>
                <p class="mb-0">Selamat Datang di <br>Aplikasi Warisan Budaya Tak Benda (Siwaya App)
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
                            <input type="text" placeholder="Email atau Username" class="form-control" name="email_or_username" value="{{ old('email_or_username') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group">
                            <input type="password" placeholder="Password" id="dz-password" class="form-control be-0"
                                name="password" value="{{ old('password') }}" required>
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
            <a href="{{ route('mobile.register') }}" class="btn btn-primary light text-primary d-block"
                data-confirm-delete="true">Buat Akun</a>
        </div>
    </footer>
@endsection