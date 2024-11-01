@extends('mobile.auth.layouts.app')

@section('title', 'Register')

@section('content')

<!-- Page Content -->
<div class="page-content">

    <!-- Banner -->
    <div class="banner-wrapper shape-1">
        <div class="container inner-wrapper text-center">
            <h1 class="dz-title">Halaman Register</h1>
            <p class="mb-0">Silahkan lakukan pendaftaran <br> untuk kenyamanan bersama
            </p>
        </div>
    </div>
    <!-- Banner End -->

    <div class="container">
        <div class="account-area">
            <form action="{{ route('mobile.register') }}" method="POST">
                @csrf
                <div class="form-group">
                    @error('nama_lengkap')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group">
                        <input type="text" placeholder="Nama Lengkap" class="form-control" name="nama_lengkap"
                            value="{{ old('nama_lengkap') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    @error('whatsapp')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group">
                        <input type="text" placeholder="08xxxxxxx" class="form-control" name="whatsapp"
                            value="{{ old('whatsapp') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    @error('username')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group">
                        <input type="text" placeholder="Username" class="form-control" name="username"
                            value="{{ old('username') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group">
                        <input type="email" placeholder="Email" class="form-control" name="email"
                            value="{{ old('email') }}" required>
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
                <div class="input-group">
                    <button class="btn mt-2 btn-primary w-100">Buat Akun</button>
                </div>
                <a href="{{ route('mobile.login') }}" class="btn-link d-block text-center">Sudah Punya Akun? Silahkan<b>
                        Masuk</b></a>
            </form>
        </div>
    </div>
</div>
<!-- Page Content End -->

<!-- Footer -->
{{-- <footer class="footer fixed">
    <div class="container">
        <a href="{{ route('mobile.register') }}" class="btn btn-primary light text-primary d-block"
            data-confirm-delete="true">Buat Akun</a>
    </div>
</footer> --}}

@endsection