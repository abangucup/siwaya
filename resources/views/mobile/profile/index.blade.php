@extends('mobile.layouts.app')

@section('title', 'Profile')

@section('header', 'Profile')

@section('content')

<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">

            <!-- Dashboard Area -->
            <div class="dashboard-area card shadow-sm p-3">
                <div class="row px-2">
                    <div class="col-12 text-center py-3 mb-4">
                        <img src="{{ auth()->user()->biodata->foto ?? asset('assets/images/profile.svg') }}"
                            class="rounded-circle w-50 shadow-sm" alt="{{ auth()->user()->nama_lengkap }}">
                    </div>
                    <div class="col-12 mt-4 mb-4">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('mobile.profile.show', auth()->user()->biodata->slug) }}" class="text-dark d-flex justify-content-between align-items-center">Profile
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('mobile.wbtb.pengajuan') }}" class="text-dark d-flex justify-content-between align-items-center">Pengajuan Saya
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('mobile.wbtb.pengajuan') }}" class="text-dark d-flex justify-content-between align-items-center">Update Biodata
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('mobile.wbtb.pengajuan') }}" class="text-dark d-flex justify-content-between align-items-center">Reset Password
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 mt-4">
                        <form action="{{ route('mobile.logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-block">Logout</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection