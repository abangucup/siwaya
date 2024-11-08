@extends('landing.layouts.app')

@section('title', 'Demografis')

@section('content')
<section class="section">
    @if ($demografis->isEmpty())
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="error-content-item text-center">
                <img src="{{ asset('assets/images/no_data.svg') }}" alt="demografis" width="50%">
                <h4>Data Belum Tersedia</h4>
                <a class="btn btn-small btn-outline " href="{{ route('home') }}">
                    <span>Halaman Utama</span>
                    <i class="ph-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    @else
    COMMING SOON
    @endif
</section>
@endsection