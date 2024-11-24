@extends('mobile.auth.layouts.app')

@section('title', 'Reset Password')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header text-center">{{ __('Reset Password') }}</h4>

                <div class="card-body">
                    <form method="POST" action="{{ route('mobile.reset-password') }}">
                        @csrf

                        @guest
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endguest

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password Baru')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password_baru"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>

                                @guest

                                <a href="{{ route('mobile.login') }}" class="btn btn-info">Kembali</a>
                                @endguest

                                @auth
                                <a href="{{ route('mobile.profile.index') }}" class="btn btn-info">Kembali</a>
                                @endauth
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection